<?php
include_once('cdata/datagrupo.php');
class Grupo{
	public function obtenerGrupos($idusuario){
		$grupo=new datagrupo();
		$data=$grupo->obtenerGrupos($idusuario);
		return $data;
	}
	public function solicitaringresogrupo($idusuario,$idgrupo){
		
		
	}
	public function confirmaracesogrupo($idgrupo,$idusuario){
		
	}
	public function denegaracessogrupo($idgrupo,$idusuario){
		
	}
	public function invitaragrupo($idgrupo,$email,$idsolicitante){
		
	}
	public function eliminaracessogrupo($idgrupo,$idusuario){
		
	}
	public function creargrupo($nombregrupo,$idcarrera,$idcreador){
		$grupo=new datagrupo();
		$data=$grupo->creargrupo($nombregrupo,$idcarrera,$idcreador);
		return $data;
	}
	public function buscargrupo($textoabuscar){
		
	}
	public function obtenersolicitudesagrupos($idusuario){
		
	}
	public function obtenersolicitesdeusuarios($idgrupo){
		
	}
	public function obtenerdatosdelgrupo($idgrupo){
		$grupo=new datagrupo();
		$data=$grupo->obtenerredatosgrupo($idgrupo);
		return $data;
	}
}

?>