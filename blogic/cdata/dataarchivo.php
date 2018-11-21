<?php
require_once('conexion/conectionpdo.php');
class dataArchivo{
	public function subirarchivo($rutaarchivo,$nombrearchivo,$idgrupo,$idusuario){
		$notificacion="<a href='".$rutaarchivo."'><i class='far fa-file fa-3x'></i> ".$nombrearchivo."</p></a>";
		$con2 = new Conexion();
		$sql2="INSERT INTO publicacion (publicaciondetalle,id_usuario,id_grupo,habilitado) VALUES (?,?,?,1)";
		$query2=$con2->prepare($sql2);
		$query2->execute(array($notificacion,$idusuario,$idgrupo));
		$idpublicacion=$con2->lastInsertId();
		$con = new Conexion();
		$sql="INSERT INTO archivo (nombrearchivo,rutaarchivo,id_grupo,habilitado,id_publicacion) VALUES (?,?,?,1,?)";
		$query=$con->prepare($sql);
		if($query->execute(array($nombrearchivo,$rutaarchivo,$idgrupo,$idpublicacion))){
			
			
			return true;
		}
		else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function eliminararchivo($idarchivo){
		$con = new Conexion();
		$sql="UPDATE `archivo` SET habilitado=0 WHERE id_archivo=?";
		$query=$con->prepare($sql);
		if($query->execute(array($idarchivo))){
			require_once('datapublicacion.php');
			$publi=new datapublicacion();
			$sql2="SELECT id_publicacion FROM archivo WHERE id_archivo=?";
			$query2=$con->prepare($sql2);
			$query2->execute(array($idarchivo));
			$result=$query2->fetchAll();
			$idpublicacion=$result[0]['id_publicacion'];
			$publi->borrarpublicacion($idpublicacion);
			return true;
		}
		else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function obtenerarchivos($id_grupo){
		$con = new Conexion();
		$sql="SELECT `id_archivo`, `rutaarchivo`, `nombrearchivo` FROM `archivo` WHERE id_grupo=? and habilitado=1";
		$query=$con->prepare($sql);
		$query->execute(array($id_grupo));
		$result = $query->fetchAll();
		$datos = array();
		foreach($result as $row){
			array_push($datos,[$row["id_archivo"],$row["rutaarchivo"],$row["nombrearchivo"]]);
		}
		return $datos;
		
	}
}


?>