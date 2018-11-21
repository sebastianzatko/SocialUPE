<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("comentar",$_SESSION["permisos"])){
			if(isset($_POST["comentario"]) and isset($_POST["id_publicacion"])){
				$comentario=$_POST["comentario"];
				$idpublicacion=$_POST["id_publicacion"];
				require_once("../../blogic/Comentario.php");
				$comentary=new Comentario();
				if($comentary->comentar((int)$_SESSION["id"],(int)$idpublicacion,$comentario)){
					echo "Comentario realizado con exito";
				}else{
					echo "Faltan datos necesarios para realizar la operacion";
				}
			}else{
				echo "No estan todas las variables seteadas";
			}
		}else{
			echo "No puede realizar esta operacion";
		}
	}else{
		echo "Debe estar logeado para hacer esta operacion";
	}


?>