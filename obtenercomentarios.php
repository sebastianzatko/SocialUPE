<?php
	if(isset($_POST["id_publicacion"])){
		require_once("blogic/Comentario.php");
		$idpublicacion=$_POST["id_publicacion"];
		$comments=new Comentario();
		$comentariesofpublicacions=$comments->obtenercomentarios($idpublicacion);
		$comentarios="";
		foreach($comentariesofpublicacions as $comment){
			$comentarios=$comentarios."<li class='list-group-item' data-idcomentario='".$comment[0]."'><img src='".$comment[2]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/> <b>".$comment[3]." ".$comment[4]."</b> ".$comment[1]." <div class='pull-right'><span class='unhiglight'>".$comment[5]."</span></div></li>";
		}
		echo $comentarios;
	}
	
?>