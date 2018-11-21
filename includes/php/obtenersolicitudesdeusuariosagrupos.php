<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		if(isset($_POST["idgroup"]) and $_POST["idgroup"]!="10" and is_numeric($_POST["idgroup"])){
			require_once("../../blogic/Grupo.php");
			$groups=new Grupo();
			$listadegrupos=$groups->obtenerGrupos((int)$_SESSION["id"]);
			$gruposdeusuario=array();
			foreach($listadegrupos as $grupo){
				array_push($listadegrupos,$grupo[0]);
			}
			$idgrupo=$_POST["idgroup"];
			if(in_array($idgrupo,$listadegrupos)){
				$listadesolicitudes=$groups->obtenersolicitesdeusuarios($idgrupo,$_SESSION["id"]);
				echo json_encode($listadesolicitudes);
			}
		}
	}

?>