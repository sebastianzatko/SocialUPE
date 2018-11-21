<?php
session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("solicitar acceso a grupo",$_SESSION["permisos"])){
			if(isset($_POST["id_grupo"]) and is_numeric($_POST["id_grupo"])){
				$idgrupo=$_POST["id_grupo"];
				require_once ("../../blogic/Grupo.php");
				$grupo=new grupo;
				if($grupo->solicitaringresogrupo($_SESSION["id"],$idgrupo,$_SESSION["id"])){
					echo "Se ha solicitado el acceso al grupo";
					
				}else{
					echo "No se ha podido solicitar el acceso al grupo";
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