<?php
require_once('cdata/datatoken.php');
class Token{
	public function creartoken($tipousuario){
		$tokenza=new datatoken();
		$data=$tokenza->insertartoken($tipousuario);
		return $data;
	}
	
	public function obtenertokenes(){
		$tokenza=new datatoken();
		$data=$tokenza->obtenertokens();
		return $data;
	}
	
	public function obtenertiposusuario(){
		$tokenza=new datatoken();
		$data=$tokenza->obtenertiposusuario();
		return $data;
	}
	
	
	
	
	
}



?>