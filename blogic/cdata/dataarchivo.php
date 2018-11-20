<?php
require_once('conexion/conectionpdo.php');
class dataArchivo{
	public function subirarchivo($rutaarchivo,$nombrearchivo,$idgrupo,$idusuario){
		$con = new Conexion();
		$sql="INSERT INTO archivo (nombrearchivo,rutaarchivo,id_grupo,habilitado) VALUES (?,?,?,1)";
		$query=$con->prepare($sql);
		if($query->execute(array($nombrearchivo,$rutaarchivo,$idgrupo))){
			$notificacion="<a href='".$rutaarchivo."'><i class='far fa-file fa-3x'></i> ".$nombrearchivo."</p></a>"
			require_once('datapublicacion.php');
			$publi=new datapublicacion();
			$publi->($idusuario,$idgrupo,$notificacion);
			return true;
		}
		else{
			print_r($query->errorInfo());
			return false;
		}
	}
	public function eliminararchivo(){
		
	}
}


?>