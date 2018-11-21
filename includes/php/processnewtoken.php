<?php
session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("crear token",$_SESSION["permisos"])){
			if(isset($_POST["usertype"]) and is_numeric($_POST["usertype"])){
				$idtipouser=$_POST["usertype"];
				require_once ("../../blogic/Token.php");
				$grupo=new Token();
				if($grupo->creartoken($idtipouser)){
					echo "Se ha creado token con exito";
					
				}else{
					echo "No se ha podido crear token";
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