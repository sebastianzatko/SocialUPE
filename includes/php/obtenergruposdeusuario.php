<?php
session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("../../blogic/Grupo.php");
		$grupo=new Grupo();
		$listadegrupos=$grupo->obtenerGrupos((int)$_SESSION["id"]);
		echo json_encode($listadegrupos);
		
	}


?>