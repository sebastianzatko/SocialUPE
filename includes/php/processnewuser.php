<?php
	if(isset($_POST["Nombre"]) and isset($_POST["Apellido"]) and isset($_POST["email"]) and isset($_POST["NumeroDocumento"]) and isset($_POST["contrasena"]) and isset($_POST["imagen"])){
		$nombre=$_POST["Nombre"];
		$apellido=$_POST["Apellido"];
		$email=$_POST["email"];
		$numerodedocumento=$_POST["NumeroDocumento"];
		$contrasena=$_POST["contrasena"];
		$fotoperfil=$_POST["imagen"];
	
		if((strlen($nombre)<45 and strlen($nombre)>10) and (strlen($apellido)<45 and strlen($apellido)>10) and (strlen($email)<200 and strlen($email)>10) and (strlen($contrasena)<120 and strlen($contrasena)>10) and (strlen($numerodedocumento)<25 and strlen($numerodedocumento)>7)){
			require_once ("../../blogic/User.php");
			$usuario=new b_user;
			if($usuario->registrar($nombre,$apellido,$email,$password,$imagen)){
				echo "Se ha registrado correctamente";
				
			}else{
				echo "No se ha podido registrar el usuario";
			}
		}else{
			echo "Algunos campos no cumplen la longuitud";
		}
	}else{
		echo "No estan todos los datos completos";
	}






?>