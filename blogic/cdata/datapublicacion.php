<?php
require_once('conexion/conectionpdo.php');
class datapublicacion{
	public function publicar($idusuario,$idgrupo,$publicacion){
		$con = new Conexion();
		$sql="INSERT INTO publicacion (publicaciondetalle,id_usuario,id_grupo,habilitado) VALUES (?,?,?,1)";
		$query=$con->prepare($sql);
		$query->execute(array($publicacion,$idusuario,$idgrupo));
		return true;
		
	}
	
	public function obtenerpublicaciones($idgrupo,$paginacion){
		$con = new Conexion();
		$sql="SELECT
				publicacion.id_publicacion,
				publicacion.publicaciondetalle,
				publicacion.fecha,
				usuario.nombre,
				usuario.apellido,
				usuario.fotoperfil
			FROM
				publicacion
			INNER JOIN usuario ON publicacion.id_usuario = usuario.id_usuario
			WHERE
				publicacion.id_grupo = ? ORDER BY publicacion.fecha DESC";
				$query=$con->prepare($sql);
				if($query->execute(array($idgrupo))){
					$result = $query->fetchAll();
					$datos = array();
					foreach($result as $row){
						array_push($datos,[$row["id_publicacion"],$row["publicaciondetalle"],$row["fecha"],$row["nombre"],$row["apellido"],$row["fotoperfil"]]);
					}
					return $datos;
				}else{
					print_r($query->errorInfo());
					return false;
				}
		
	}
	public function obtenerpublicacionesdeusuario($idusuario,$paginacion){
		$con = new Conexion();
		$sql="SELECT `publicacion`.`id_publicacion`, `publicacion`.`publicaciondetalle`, `publicacion`.`id_usuario`, `publicacion`.`id_grupo`, `publicacion`.`fecha`, `publicacion`.`habilitado`,grupo.nombregrupo,usuario.nombre,usuario.apellido,usuario.fotoperfil FROM
				publicacion
			INNER JOIN usuario ON publicacion.id_usuario = usuario.id_usuario,grupo
			WHERE publicacion.id_grupo=grupo.id_grupo AND grupo.id_grupo IN (SELECT grupo.id_grupo FROM grupo,miembro WHERE miembro.id_usuario=? AND miembro.id_grupo=grupo.id_grupo AND miembro.habilitado=1) ORDER BY publicacion.fecha DESC";
				$query=$con->prepare($sql);
				if($query->execute(array($idusuario))){
					$result = $query->fetchAll();
					$datos = array();
					foreach($result as $row){
						array_push($datos,[$row["id_publicacion"],$row["publicaciondetalle"],$row["fecha"],$row["nombre"],$row["apellido"],$row["fotoperfil"],$row["id_grupo"],$row["nombregrupo"],$row["id_grupo"]]);
					}
					return $datos;
				}else{
					print_r($query->errorInfo());
					return false;
				}
	}
	public function borrarpublicacion($idpublicacion){
		$con = new Conexion();
		$sql="DELETE FROM `publicacion` WHERE id_publicacion=?";
		$query=$con->prepare($sql);
		$query->execute(array($idpublicacion));
		return true;
	}
}





?>