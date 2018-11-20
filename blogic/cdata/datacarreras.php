<?php
require_once('conexion/conectionpdo.php');
class dataCarreras{
	public function obtenerCarreras(){
		$con = new Conexion();
		$sql="SELECT carrera.id_carrera,carrera.descripcion FROM `carrera` ";
		$query=$con->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		$datos = array();
		foreach($result as $row){
			array_push($datos,[$row["id_carrera"],$row["descripcion"]]);
		}
		return $datos;
	}
}



?>