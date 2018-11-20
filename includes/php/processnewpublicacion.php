<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once ("../../blogic/User.php");
		$user=new b_user;
		if(($user->puede("publicar en muro de grupo",$_SESSION["permisos"])) or ($user->puede("publicar en muro principal",$_SESSION["permisos"]))){
			if(isset($_POST["publicacion"]) and isset($_POST["id_grupo"])){
				$publicacion=$_POST["publicacion"];
				$idgrupo=$_POST["id_grupo"];
				
				if((strlen($publicacion)<500 and strlen($publicacion)>5)){
					require_once("../../blogic/Publicacion.php");
					$publicacionxd=new Publicacion();
					if($publicacionxd->publicar((int)$_SESSION["id"],(int)$idgrupo,$publicacion)){
						echo "Se ha publicado con exito";
						
					}else{
						echo "No se ha podido publicar";
					}
				}else{
					echo "Algunos campos no cumplen la longuitud";
				}
			}else{
				echo "No estan todos los datos completos";
			}
		}
	}else{
		echo "No ha iniciado sesion";
	}



?>