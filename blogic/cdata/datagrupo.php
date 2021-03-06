<?php
require_once('conexion/conectionpdo.php');
class datagrupo{
	public function creargrupo($nombregrupo,$idcarrera,$idcreador){
		$con = new Conexion();
		$sql="INSERT INTO grupo (nombregrupo,carrera) VALUES (?,?)";
		$query=$con->prepare($sql);
		if($query->execute(array($nombregrupo,$idcarrera))){
			$id=$con->lastInsertId();
			$this->insertarengrupo($id,$idcreador,1,$idcreador);
			return true;
		}
		else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function insertarengrupo($idgrupo,$idusuario,$habilitado,$idsolicitante){
		$con = new Conexion();
		$sql="INSERT INTO miembro (id_usuario,id_grupo,habilitado,id_solicitante) VALUES (?,?,?,?)";
		$query=$con->prepare($sql);
		if($query->execute(array($idusuario,$idgrupo,$habilitado,$idsolicitante))){
			return true;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function obtenerGrupos($idusuario){
		$con = new Conexion();
		$sql="SELECT grupo.id_grupo,grupo.nombregrupo,miembro.habilitado FROM grupo,miembro WHERE grupo.id_grupo IN (SELECT grupo.id_grupo FROM grupo,miembro WHERE grupo.id_grupo=miembro.id_grupo AND miembro.id_usuario=? and miembro.habilitado<>2) AND grupo.id_grupo=miembro.id_grupo AND miembro.id_usuario=? AND grupo.id_grupo<>10";
		$query=$con->prepare($sql);
		if($query->execute(array($idusuario,$idusuario))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_grupo"],$row["nombregrupo"],$row["habilitado"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function obtenerredatosgrupo($idgrupo){
		$con = new Conexion();
		$sql="SELECT grupo.nombregrupo,miembro.id_usuario,usuario.id_usuario,usuario.nombre,usuario.apellido,usuario.fotoperfil,rol.descripcion FROM `grupo`,miembro,usuario,rol WHERE grupo.id_grupo=? AND miembro.id_grupo=grupo.id_grupo AND usuario.id_usuario=miembro.id_usuario AND usuario.tipousuario=rol.id_rol AND miembro.habilitado=1";
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
	public function solicitudesdeusuario($idusuario,$idgrupo){
		$con = new Conexion();
		$sql="SELECT
				usuario.id_usuario,
				usuario.nombre,
				usuario.apellido,
				usuario.fotoperfil
			FROM
				`miembro`,
				usuario
			WHERE
				miembro.id_usuario = usuario.id_usuario AND miembro.habilitado = 0  and miembro.id_grupo=? AND miembro.id_solicitante NOT IN (SELECT usuario.id_usuario FROM usuario,miembro where miembro.id_usuario=usuario.id_usuario AND usuario.tipousuario=3 and miembro.id_grupo=? and miembro.habilitado=1)";
		$query=$con->prepare($sql);
		if($query->execute(array($idgrupo,$idgrupo))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_usuario"],$row["nombre"],$row["apellido"],$row["fotoperfil"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
		 
	}
	public function buscargrupo($texto,$idusuario){
		$con = new Conexion();
		$sql="SELECT `grupo`.`id_grupo`, `grupo`.`nombregrupo`, carrera.descripcion, `grupo`.`fechadecreacion` FROM `grupo`,carrera  WHERE grupo.nombregrupo LIKE ? AND grupo.carrera=carrera.id_carrera AND grupo.id_grupo<>10 AND grupo.id_grupo NOT IN (SELECT miembro.`id_grupo` FROM `miembro` WHERE miembro.id_usuario=? AND miembro.habilitado=2) ORDER BY grupo.fechadecreacion DESC";
		$query=$con->prepare($sql);
		if($query->execute(array("%".$texto."%",$idusuario))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_grupo"],$row["nombregrupo"],$row["descripcion"],$row["fechadecreacion"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	
	public function obtenersolicitudesdegrupo($idusuario){
		$con = new Conexion();
		$sql="SELECT `grupo`.`id_grupo`, `grupo`.`nombregrupo`, carrera.descripcion, `grupo`.`fechadecreacion` FROM `grupo`,carrera,miembro  WHERE  grupo.carrera=carrera.id_carrera  AND grupo.id_grupo<>10 AND miembro.id_grupo=grupo.id_grupo AND miembro.habilitado=0 AND miembro.id_usuario=? AND miembro.id_solicitante<>?";
		$query=$con->prepare($sql);
		if($query->execute(array($idusuario,$idusuario))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_grupo"],$row["nombregrupo"],$row["descripcion"],$row["fechadecreacion"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function datamodificaracesso($idusuario,$idgrupo,$habilitado){
		$con = new Conexion();
		$sql="UPDATE miembro SET miembro.habilitado=? WHERE miembro.id_usuario=? AND miembro.id_grupo=?";
		$query=$con->prepare($sql);
		if($query->execute(array($habilitado,$idusuario,$idgrupo))){
			return true;
		}else{
			return false;
		}
		
	}
}




?>