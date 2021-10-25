<?php namespace App\Controllers;

class User extends BaseController
{

    public  function index()
    {
        $data=[
			'active'=>['active','']
		];
		return view('users/consulta',$data);
    }
    public  function consulta()
    {
        $data=[
			'active'=>['active','']
		];
		return view('users/consulta',$data);
    }

    public function login() {
      $data['active'] = ['',''];
      helper('url');

      if ($this->request->getMethod() === 'get') {
        return view('index/login', $data);
      }
      
      if ($this->request->getMethod() === 'post') {
        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');

        $db = \Config\Database::connect();
        $query= $db->query('SELECT  * FROM usuarios where email=\''.$email.'\' and password = \''.$password.'\';');
        $result = $query->getResult();

        if (empty($result)) {
          $data['error'] = 'Credenciales incorrectas';
          return view('index/login', $data);
        }
        $session = \Config\Services::session();
        $session->set([
          'name' => $result[0]->name,
          'lastname' => $result[0]->lastname,
          'role' => $result[0]->role,
        ]);
        $role = $result[0]->role;
        if ($role == 'ROLE_ADMIN') {
          return redirect()->to('/admin');
        }
        
        if ($role == 'ROLE_USER') {
          return redirect()->to('/user');
        }

      }

    }

    public function register() {
      $data['active'] = ['',''];
      helper('url');

      if ($this->request->getMethod() === 'get') {
        return view('index/register', $data);
      }

      if ($this->request->getMethod() === 'post') {
        $email=$this->request->getPost('email');
        $db = \Config\Database::connect();
        $query = $db->query('SELECT email FROM usuarios WHERE email = \''.$email.'\';');
        $results = $query->getResult();
        if (!empty($results)) {
          $data['error'] = 'Usuario ya Registrado';
          return view('index/register', $data);
        }
        $name=$this->request->getPost('name');
        $lastname=$this->request->getPost('lastname');
        $password=$this->request->getPost('password');
        $db->query('INSERT INTO public.usuarios( name, lastname, role, email, password) VALUES ( \''.$name.'\', \''.$lastname.'\', \'ROLE_USER\', \''.$email.'\', \''.$password.'\');');
        return redirect()->to('/login');
      }
    }

    public function provincia_nac()
    {
      $db = \Config\Database::connect();
      $query= $db->query('SELECT  provincia FROM provincia order by provincia;');
      $result = $query->getResult();
      $data=[
        'active'=>['active',''],
        'results' => $result,
        'flag' => 0

      ];
      if ($this->request->getMethod() === 'post')
      {
        $select=$this->request->getPost('provincia');
        $select = urldecode($select);
        $query = $db->query('SELECT  "Provincia","Canton", "Nacidos" FROM mv_nac_canton  WHERE "Provincia"=\''.$select.'\';');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'provincia' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }
    return view('users/consultas/nacimientos/provincia',$data);
    }

    public  function estado_nac()
    {

    $db = \Config\Database::connect();
    $query= $db->query('SELECT  estado_civil FROM estado_civil order by estado_civil');
		$result = $query->getResult();
    $data=[
        'active'=>['active',''],
        'results' => $result,
        'flag' => 0
    ];

    if ($this->request->getMethod() === 'post')
      {
        $table = new \CodeIgniter\View\Table();
        $select=$this->request->getPost('estado');
        $select=urldecode($select);
        $query = $db->query('SELECT  "ESTADO","Provincia","Canton","Nacidos" FROM mv_nac_canton_estado WHERE "ESTADO"=\''.$select.'\';');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'estado' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }
    return view('users/consultas/nacimientos/estado',$data);

    }



    

    public  function educacion_nac()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT nivel_inst FROM nivel_insti order by nivel_inst;');
		$result = $query->getResult();
    $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
  ];

  if ($this->request->getMethod() === 'post')
      {
        $table = new \CodeIgniter\View\Table();
        $select=$this->request->getPost('estudio');
        $select=urldecode($select);
        $query = $db->query('SELECT "Nivel Instruccion","Provincia", "Canton",  "Nacidos" FROM mv_nac_canton_inst where "Nivel Instruccion"=\''.$select.'\';');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'estudio' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }

    return view('users/consultas/nacimientos/estudio',$data);
    
    }

    public  function ocurrencia_nac()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT  ocurrencia FROM ocurrencia ORDER by ocurrencia;');
		$result = $query->getResult();
    $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
  ];

  if ($this->request->getMethod() === 'post')
      {
        $table = new \CodeIgniter\View\Table();
        $select=$this->request->getPost('ocurrencia');
        $select=urldecode($select);
        // print_r($select);
        $query = $db->query('SELECT "Ocurrencia", "Provincia","Canton",  "Nacidos" FROM mv_nac_canton_ocu WHERE "Ocurrencia" = \''.$select.'\';');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'ocurrencia' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }

    return view('users/consultas/nacimientos/ocurrencia',$data);
    
    }

    public  function asistencia_nac()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT asistido_por FROM asistido_por ORDER by asistido_por;');
		$result = $query->getResult();
    $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
  ];

  if ($this->request->getMethod() === 'post')
      {
        $table = new \CodeIgniter\View\Table();
        $select=$this->request->getPost('asistido');
        $select=urldecode($select);
        // print_r($select);
        $query = $db->query('SELECT  "Asistido Por", "Provincia", "Canton","Nacidos" FROM mv_nac_canton_asis WHERE  "Asistido Por"=\''.$select.'\' ;');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'asistido' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }

    return view('users/consultas/nacimientos/asistencia',$data);
    
    }

    public  function producto_nac()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT producto FROM producto_emb ORDER by producto ;');
		$result = $query->getResult();
    $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
  ];

  if ($this->request->getMethod() === 'post')
      {
        $table = new \CodeIgniter\View\Table();
        $select=$this->request->getPost('producto');
        $select=urldecode($select);
        // print_r($select);
        $query = $db->query('SELECT "Producto Embarazo",  "Provincia", "Canton",  "Nacidos" FROM mv_nac_canton_prod WHERE "Producto Embarazo" = \''.$select.'\';');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'producto' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }
    return view('users/consultas/nacimientos/producto',$data);
    }



    #####################################################################################
    ################             DEFUNCIONES                       ######################
    #####################################################################################
    public  function provincia_def() {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT  provincia FROM provincia order by provincia;');
		$result = $query->getResult();
     $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
    ];

    if ($this->request->getMethod() === 'post')
      {
        $select=$this->request->getPost('provincia');
        $select = urldecode($select);
        $query = $db->query('SELECT "PROVINCIA","CANTON",  "TOTAL" FROM vm_def_canton  WHERE "PROVINCIA"=\''.$select.'\';');
        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'provincia' => $select,
          'table'=> $table
        ];  
        $data['flag']=1;
      }

    return view('users/consultas/defunciones/provincia',$data);
    }
    
    public  function estado_def()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT  estado_civil FROM estado_civil order by estado_civil');
		$result = $query->getResult();
     $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
    ];

    if ($this->request->getMethod() === 'post')
      {
        $select=$this->request->getPost('estado');
        $select = urldecode($select);
        $query = $db->query('SELECT  "ESTADO","PROVINCIA","CANTON",  "TOTAL" FROM vm_def_canton_estado WHERE "ESTADO"=\''.$select.'\';');

        $template = [
          'table_open' => '<table class="table table-hover">',
          'thead_open' => '<thead class="thead-dark">',
        ];

        $table = new \CodeIgniter\View\Table($template);
        $table = $table->generate($query);

        $data+=[
          'estado' => $select,
          'table'=> $table
        ];
        $data['flag']=1;
      }
    return view('users/consultas/defunciones/estado',$data);

    }



    public  function educacion_def()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT nivel_inst FROM nivel_insti order by nivel_inst;');
		$result = $query->getResult();
     $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
    ];

    if ($this->request->getMethod() === 'post') {
      
      $select=$this->request->getPost('edu');
      $select = urldecode($select);
      $query = $db->query('SELECT "EDUCACION","PROVINCIA","CANTON", "TOTAL" FROM vm_def_canton_educacion WHERE "EDUCACION"=\''.$select.'\';');

      $template = [
        'table_open' => '<table class="table table-hover my-3">',
        'thead_open' => '<thead class="thead-dark">',
      ];

      $table = new \CodeIgniter\View\Table($template);
      $table = $table->generate($query);

      $data+=[
        'edu' => $select,
        'table'=> $table
      ];
      $data['flag']=1;
    }

    return view('users/consultas/defunciones/estudio',$data);
    
    }

    public  function ocurrencia_def()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT  ocurrencia FROM ocurrencia ORDER by ocurrencia;');
		$result = $query->getResult();
     $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
    ];

    if ($this->request->getMethod() === 'post') {
      
      $select=$this->request->getPost('ocurrencia');
      $select = urldecode($select);
      $query = $db->query('SELECT "OCURRENCIA","PROVINCIA","CANTON","TOTAL" FROM vm_def_canton_ocurrencia WHERE "OCURRENCIA"=\''.$select.'\';');
      $template = [
        'table_open' => '<table class="table table-hover my-3">',
        'thead_open' => '<thead class="thead-dark">',
      ];

      $table = new \CodeIgniter\View\Table($template);
      $table = $table->generate($query);

      $data+=[
        'ocurrencia' => $select,
        'table'=> $table
      ];
      $data['flag']=1;
    }

    return view('users/consultas/defunciones/ocurrencia',$data);
    
    }

    public  function causa_def()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT causa_fet FROM causa_fetal ORDER by causa_fet;');
		$result = $query->getResult();
     $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
    ];

    if ($this->request->getMethod() === 'post') {

      $select=$this->request->getPost('causa');
      $select = urldecode($select);
      $query = $db->query('SELECT "CAUSA","PROVINCIA","CANTON","TOTAL" FROM vm_def_canton_causa WHERE "CAUSA"=\''.$select.'\';');
      $template = [
        'table_open' => '<table class="table table-hover my-3">',
        'thead_open' => '<thead class="thead-dark">',
      ];

      $table = new \CodeIgniter\View\Table($template);
      $table = $table->generate($query);

      $data+=[
        'causa' => $select,
        'table'=> $table
      ];

      $data['flag']=1;
      
    }

      return view('users/consultas/defunciones/causa',$data);
    


    }
    
    public  function semana_def()
    {
    $db = \Config\Database::connect();
    $query= $db->query('SELECT sem_gest FROM sem_gest ORDER by sem_gest;');
		$result = $query->getResult();
     $data=[
      'active'=>['active',''],
      'results' => $result,
      'flag' => 0
    ];

    if ($this->request->getMethod() === 'post') {

      $select=$this->request->getPost('semana');
      $select = urldecode($select);
      $query = $db->query('SELECT "SEMANA","PROVINCIA","CANTON","TOTAL" FROM vm_def_canton_semana WHERE "SEMANA"=\''.$select.'\';');
      $template = [
        'table_open' => '<table class="table table-hover my-3">',
        'thead_open' => '<thead class="thead-dark">',
      ];

      $table = new \CodeIgniter\View\Table($template);
      $table = $table->generate($query);

      $data+=[
        'sem' => $select,
        'table'=> $table
      ];

      $data['flag']=1;
      
    }


    return view('users/consultas/defunciones/semana',$data);

    }

    public  function graficas()
    {
        $data=[
			'active'=>['','active']
		];
		return view('users/grafica',$data);
    }

}
