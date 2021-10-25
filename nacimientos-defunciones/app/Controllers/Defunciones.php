<?php namespace App\Controllers;

use Config\Database;

class Defunciones extends BaseController
{
  public function index() {
    $db = \Config\Database::connect();
		$query= $db->query('select * from vm_defunciones');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }

  public function provincia() {
    $db = \Config\Database::connect();
		$query= $db->query('select cant."PROVINCIA", count(cant."TOTAL") as "Nacidos" from vm_def_canton cant group by cant."PROVINCIA";');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }

  public function causa() {
    $db = \Config\Database::connect();
		$query= $db->query('select * from vm_def_causa');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }

  public function nivel() {
    $db = \Config\Database::connect();
		$query= $db->query('select * from vm_def_nivel');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }

  public function semana() {
    $db = \Config\Database::connect();
		$query= $db->query('select * from vm_def_semana');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }

  public function estado() {
    $db = \Config\Database::connect();
		$query= $db->query('select * from vm_estado');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }
  
  public function ocurrencia() {
    $db = \Config\Database::connect();
		$query= $db->query('select * from vm_ocurrencia');
		$result = $query->getResult();
		return $this->response->setJSON($result);
  }

}