<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("crear grupos",$_SESSION["permisos"])){
			if(isset($_POST["nombreGrupo"]) and isset($_POST["carrera"])){
				$nombregrupo=$_POST["nombreGrupo"];
				$idcarrera=$_POST["carrera"];
				require_once ("../../blogic/Grupo.php");
				$grupo=new grupo;
				if($grupo->creargrupo($nombregrupo,$idcarrera,(int)$_SESSION["id"])){
					echo "Se ha creado un grupo correctamente";
					
				}else{
					echo "No se ha podido crear el grupo";
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