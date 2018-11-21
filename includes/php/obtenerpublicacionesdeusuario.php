<?php

	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("../../blogic/Publicacion.php");
		$publicationz=new Publicacion();
		$publicacionesdeuser=$publicationz->obtenerpublicacionesrelacionadasconusuario((int)$_SESSION["id"],"");
		echo json_encode($publicacionesdeuser);
		
	}
?>