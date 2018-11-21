<?php

	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("../../blogic/Publicacion.php");
		$publicationz=new Publicacion();
		$publicacionesdeuser=$publicationz->obtenerpublicacionesrelacionadasconusuario((int)$_SESSION["id"],"");
		require_once("../../blogic/Comentario.php");
		$comments=new Comentario();
		foreach($publicacionesdeuser as $publicacion){
			$comentariesofpublicacions=$comments->obtenercomentarios($publicacion[0]);
			$comentarios="";
			foreach($comentariesofpublicacions as $comment){
				$comentarios=$comentarios."<li class='list-group-item' data-idcomentario='".$comment[0]."'><img src='".$comment[2]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/> <b>".$comment[3]." ".$comment[4]."</b> ".$comment[1]." <div class='pull-right'><span class='unhiglight'>".$comment[5]."</span></div></li>";
			}
			array_push($publicacion,$comentarios);
		}
		echo json_encode($publicacionesdeuser);
		
	}
?>