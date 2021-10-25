<?php namespace App\Controllers;


class Home extends BaseController
{
	public function index()
	{
		// $db = \Config\Database::connect();
		// $query= $db->query('select * from mv_nac');
		// $result = $query->getResult();
		// // foreach ($result as $row) {
		// // 	echo $row->sexo."<br/>"; 
		// // }
		$data=[
			'active'=>['active','']
		];
		return view('index/index',$data);
	}
	public function home()
	{
		$data=[
			'active'=>['active','']
		];
		return view('index/index',$data);
	}
	 public function about()
	{
		$data=[
			'active'=>['','active']
		];
		return view('index/about',$data);
	}
	//--------------------------------------------------------------------

}
