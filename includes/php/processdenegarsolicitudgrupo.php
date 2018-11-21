<?php
session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("aceptar solicitudes de grupo",$_SESSION["permisos"])){
			if(isset($_POST["id_grupo"]) and is_numeric($_POST["id_grupo"])){
				$idgrupo=$_POST["id_grupo"];
				require_once ("../../blogic/Grupo.php");
				$grupo=new grupo;
				if($grupo->datamodificaracesso($idgrupo,$_SESSION["id"],2)){
					echo "Se ha denegado el acceso al grupo";
					
				}else{
					echo "No se ha podido denegar el acceso al grupo";
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