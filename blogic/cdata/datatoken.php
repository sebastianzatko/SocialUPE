<?php
require_once('conexion/conectionpdo.php');
class datatoken{
	public function insertartoken($tipousuario){
		$bytes = openssl_random_pseudo_bytes(32);
		$hash = base64_encode($bytes);
		$result = substr($hash, 0, 5);
		if($this->verificartokenexistente($result)){
			$this->insertartoken($tipousuario);
		}else{
			$con = new Conexion();
			$sql2="INSERT INTO token (token.token,token.user_tipo,token.habilitado) VALUES (?,?,?)";
			$query2=$con->prepare($sql2);
			if($query2->execute(array($result,(int)$tipousuario,1))){
				return true;
			}else{
				print_r($query2->errorInfo());
				return false;
			}
			
		}
	}
	
	public function verificartokenexistente($token){
		$con = new Conexion();
		$sql2="SELECT id_token FROM token WHERE token=? and habilitado=1";
		$query2=$con->prepare($sql2);
		$query2->execute(array($token));
		$result=$query2->fetchAll();
		if(count($result==0)){
			return false;
		}else{
			return true;
		}
	}
	
	public function usartoken($token){
		if(!$this->verificartokenexistente($token)){
			$con = new Conexion();
			$sql5="SELECT id_token,user_tipo FROM token WHERE token=? and habilitado=1";
			$query5=$con->prepare($sql5);
			$query5->execute(array($token));
			$resulta=$query5->fetchAll();
			$idtoken = $resulta[0]['id_token'];
			$tipo = $resulta[0]['user_tipo'];
			$sql3="UPDATE token set habilitado=0 WHERE id_token=?";
			$query4=$con->prepare($sql3);
			$query4->execute(array($idtoken));
			return $tipo;
		}else{
			return false;
		}
		
	}
	
	public function obtenertokens(){
		$con = new Conexion();
		$sql="SELECT  `token`.`token`,rol.descripcion  FROM `token`,rol WHERE token.user_tipo=rol.id_rol and token.habilitado=1";
		$query=$con->prepare($sql);
		if($query->execute()){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["token"],$row["descripcion"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function obtenertokensfiltrados($tipousuario){
		$con = new Conexion();
		$sql="SELECT  `token`.`token`,rol.descripcion  FROM `token`,rol WHERE token.user_tipo=rol.id_rol and token.habilitado=1 and token.user_tipo=?";
		$query=$con->prepare($sql);
		if($query->execute(array($tipousuario))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["token"],$row["descripcion"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function obtenertiposusuario(){
		$con = new Conexion();
		$sql="SELECT `id_rol`, `descripcion` FROM `rol`";
		$query=$con->prepare($sql);
		if($query->execute()){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_rol"],$row["descripcion"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
}



?>