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
}





?>