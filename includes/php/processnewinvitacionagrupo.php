<?php
session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("invitar usuarios",$_SESSION["permisos"])){
			if(isset($_POST["id_grupo"]) and is_numeric($_POST["id_grupo"]) and isset($_POST["email"])){
				$idgrupo=$_POST["id_grupo"];
				$email=$_POST["email"];
				require_once ("../../blogic/Grupo.php");
				$grupo=new grupo;
				if($grupo->invitaragrupo($idgrupo,$email,(int)$_SESSION["id"])){
					echo "Se ha invitado al usuario";
					
				}else{
					echo "No se ha podido invitar al usuario";
				}
				
			}else{
				echo "No estan todos los datos completos";
			}
		}else{
			echo "No tiene permiso para esto";
		}
	}else{
		echo $_SESSION["id"];
		echo "No ha iniciado sesion";
	}

?>