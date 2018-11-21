<?php
include_once('cdata/datapublicacion.php');
class Publicacion{
	
	public function publicar($idusuario,$idgrupo,$publicacion){
		$publicaciones=new datapublicacion();
		$data=$publicaciones->publicar($idusuario,$idgrupo,$publicacion);
		return $data;
	}
	public function obtenerpublicaciones($idgrupo,$paginacion){
		$publicaciones=new datapublicacion();
		$data=$publicaciones->obtenerpublicaciones($idgrupo,$paginacion);
		return $data;
	}
	public function eliminarpublicacion(){
		
	}
	public function obtenerpublicacionesrelacionadasconusuario($idusuario,$paginacion){
		$publicaciones=new datapublicacion();
		$data=$publicaciones->obtenerpublicacionesdeusuario($idusuario,$paginacion);
		return $data;
	}
}




?>