<?php
require_once('conexion/conectionpdo.php');
class datacomentario{
	public function comentar($idusuario,$idpublicacion,$comentario){
		$con = new Conexion();
		$sql="INSERT INTO comentario (comentario,id_usuario,id_publicacion,habilitado) VALUES (?,?,?,1)";
		$query=$con->prepare($sql);
		$query->execute(array($comentario,$idusuario,$idpublicacion));
		return true;
		

	}
	public function obtenercomentarios($idpublicacion){
		$con = new Conexion();
		$sql="SELECT
					`comentario`.`id_comentario`,
					`comentario`.`comentario`,
					`comentario`.`id_usuario`,
					usuario.fotoperfil,
					usuario.nombre,
					usuario.apellido,
					`comentario`.`fecha`
				FROM
					`comentario`,publicacion,usuario
				WHERE
					`comentario`.id_publicacion = publicacion.id_publicacion AND publicacion.id_publicacion = ? AND 
					publicacion.id_usuario=usuario.id_usuario";
		$query=$con->prepare($sql);
		if($query->execute(array($idpublicacion))){
			$result = $query->fetchAll();
			$datos = array();
			foreach($result as $row){
				array_push($datos,[$row["id_comentario"],$row["comentario"],$row["fotoperfil"],$row["nombre"],$row["apellido"],$row["fecha"]]);
			}
			return $datos;
		}else{
			print_r($query->errorInfo());
			return false;
		}
	}
}

?>