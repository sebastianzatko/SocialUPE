<?php
include_once('cdata/datacarreras.php');
class Carrera{
	public function obtenerCarreras(){
		$carreras=new dataCarreras();
		$data=$carreras->obtenerCarreras();
		return $data;
	}
}



?>