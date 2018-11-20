<?php
require_once('conexion/conectionpdo.php');
class datagrupo{
	public function creargrupo($nombregrupo,$idcarrera,$idcreador){
		$con = new Conexion();
		$sql="INSERT INTO grupo (nombregrupo,carrera) VALUES (?,?)";
		$query=$con->prepare($sql);
		if($query->execute(array($nombregrupo,$idcarrera))){
			$id=$con->lastInsertId();
			$this->insertarengrupo($id,$idcreador,1);
			return true;
		}
		else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function insertarengrupo($idgrupo,$idusuario,$habilitado){
		$con = new Conexion();
		$sql="INSERT INTO miembro (id_usuario,id_grupo,habilitado) VALUES (?,?,?)";
		$query=$con->prepare($sql);
		if($query->execute(array($idusuario,$idgrupo,$habilitado))){
			return true;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function obtenerGrupos($idusuario){
		$con = new Conexion();
		$sql="SELECT grupo.id_grupo,grupo.nombregrupo FROM grupo WHERE grupo.id_grupo IN (SELECT grupo.id_grupo FROM grupo,miembro WHERE grupo.id_grupo=miembro.id_grupo AND miembro.id_usuario=?)";
		$query=$con->prepare($sql);
		if($query->execute(array($idusuario))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_grupo"],$row["nombregrupo"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function obtenerredatosgrupo($idgrupo){
		$con = new Conexion();
		$sql="SELECT grupo.nombregrupo,miembro.id_usuario,usuario.id_usuario,usuario.nombre,usuario.apellido,usuario.fotoperfil,rol.descripcion FROM `grupo`,miembro,usuario,rol WHERE grupo.id_grupo=? AND miembro.id_grupo=grupo.id_grupo AND usuario.id_usuario=miembro.id_usuario AND usuario.tipousuario=rol.id_rol";
		$query=$con->prepare($sql);
		if($query->execute(array($idgrupo))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["nombregrupo"],$row["id_usuario"],$row["nombre"],$row["apellido"],$row["fotoperfil"],$row["descripcion"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
}




?>