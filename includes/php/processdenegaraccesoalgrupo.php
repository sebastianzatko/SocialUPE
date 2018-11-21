<?php
session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("autorizar solicitudes de usuarios",$_SESSION["permisos"]) and $user->puede("eliminar miembros del grupo",$_SESSION["permisos"])){
			if(isset($_POST["id_grupo"]) and is_numeric($_POST["id_grupo"]) and isset($_POST["id_usuario"]) and is_numeric($_POST["id_usuario"])){
				$idgrupo=$_POST["id_grupo"];
				$idusuario=$_POST["id_usuario"];
				require_once ("../../blogic/Grupo.php");
				$grupo=new grupo;
				if($grupo->datamodificaracesso($idgrupo,$idusuario,2)){
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