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
				require_once("blogic/Publicacion.php");
				$publicacionrepiola=new Publicacion();
				$listadepublicaciones=$publicacionrepiola->obtenerpublicaciones($idgrupo,1);
				echo json_encode($listadepublicaciones);
			}
		}
	}

?>