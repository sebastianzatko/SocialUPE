<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("manejar usuarios",$_SESSION["permisos"])){
			$idusuario=$_POST["id"];
			if(isset($idusuario) and $idusuario!=""){
				$resultado=$user->cambiarestadousuario(1,(int)$idusuario);
				echo $resultado;
			}else{
				echo "Faltan datos necesarios para realizar la operacion";
			}
		}else{
			echo "No puede realizar esta operacion";
		}
	}else{
		echo "Debe estar logeado para hacer esta operacion";
	}



?>