<?php
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
	public function confirmaracesogrupo($idgrupo,$idusuario){
		
	}
	public function denegaracessogrupo($idgrupo,$idusuario){
		
	}
	public function invitaragrupo($idgrupo,$email,$idsolicitante){
		include_once('cdata/datauser.php');
		$dtuser=new d_User();
		if(!$dtuser->verificarUsuarioExistente($email)){
			//cargarlo
			$idusuario=$dtuser->obtenerusuarioconmail($email);
			$iduser=mysqli_fetch_assoc($idusuario);
			$idusuaritito=$iduser["id_usuario"];
			$data=$this->solicitaringresogrupo($idusuaritito,$idgrupo,0,$idsolicitante);
			return $data;
		}else{
			//enviar invitacionpor mail (tiene que ser una especial para que cuando se cree la cuenta con ese mismo email lo registre puta vida)
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
		$data=$grupo->solicitudesdegrupo($idusuario);
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