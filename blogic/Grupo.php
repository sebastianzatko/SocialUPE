<?php
error_reporting(0);
include_once('cdata/datagrupo.php');
class Grupo{
	public function obtenerGrupos($idusuario){
		$grupo=new datagrupo();
		$data=$grupo->obtenerGrupos($idusuario);
		return $data;
	}
	public function solicitaringresogrupo($idusuario,$idgrupo,$idsolicitante){
		$grupo=new datagrupo();
		$data=$grupo->insertarengrupo($idgrupo,$idusuario,0,$idsolicitante);
		return $data;
	}
	public function datamodificaracesso($idgrupo,$idusuario,$habilitado){
		$grupo=new datagrupo();
		$data=$grupo->datamodificaracesso($idusuario,$idgrupo,$habilitado);
		return $data;
	}
	public function invitaragrupo($idgrupo,$email,$idsolicitante){
		include_once('cdata/datauser.php');
		$dtuser=new d_User();
		if(!$dtuser->verificarUsuarioExistente($email)){
			//cargarlo
			$idusuario=$dtuser->obtenerusuarioconmail($email,$idgrupo,1);
			$idusuaritito=$idusuario[0][0];
			$data=$this->solicitaringresogrupo($idusuaritito,$idgrupo,$idsolicitante);
			return $data;
		}else{
			//enviar invitacionpor mail (tiene que ser una especial para que cuando se cree la cuenta con ese mismo email lo registre puta vida)
			include_once('cdata/datatoken.php');
			$dttoken=new datatoken();
			$resultado=$dttoken->obtenertokensfiltrados(1);
			if(count($resultado)==0){
				$dttoken->insertartoken(1);
				$resultado=$dttoken->obtenertokensfiltrados(1);
			}
			$tokenusable=$resultado[0][0];
			//require_once('cdata/email2.php');
			//$s_email = new changeromail2();
                   
			
			//$nombreusuario = "Usuario";
		   
			//$s_email->validaremail($email,$nombreusuario,$tokenusable);
			return true;
			
		}
	}
	public function creargrupo($nombregrupo,$idcarrera,$idcreador){
		$grupo=new datagrupo();
		$data=$grupo->creargrupo($nombregrupo,$idcarrera,$idcreador);
		return $data;
	}
	public function buscargrupo($textoabuscar,$idusuario){
		$grupo=new datagrupo();
		$data=$grupo->buscargrupo($textoabuscar,$idusuario);
		return $data;
	}
	public function obtenersolicitudesagrupos($idusuario){
		$grupo=new datagrupo();
		$data=$grupo->obtenersolicitudesdegrupo($idusuario);
		return $data;
	}
	public function obtenersolicitesdeusuarios($idgrupo,$idusuario){
		$grupo=new datagrupo();
		$data=$grupo->solicitudesdeusuario($idusuario,$idgrupo);
		return $data;
	}
	public function obtenerdatosdelgrupo($idgrupo){
		$grupo=new datagrupo();
		$data=$grupo->obtenerredatosgrupo($idgrupo);
		return $data;
	}
}

?>