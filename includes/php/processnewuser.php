<?php
	
	if(isset($_POST["Nombre"]) and isset($_POST["Apellido"]) and isset($_POST["email"]) and isset($_POST["NumeroDocumento"]) and isset($_POST["contrasena"]) and isset($_POST["Token"])){
		$nombre=$_POST["Nombre"];
		$apellido=$_POST["Apellido"];
		$email=$_POST["email"];
		$numerodedocumento=$_POST["NumeroDocumento"];
		$contrasena=$_POST["contrasena"];
		$imagen=$_FILES["imagen"];
		$token=$_POST["Token"];
		
		
		if((strlen($nombre)<45 and strlen($nombre)>4) and (strlen($apellido)<45 and strlen($apellido)>4) and (strlen($email)<200 and strlen($email)>10) and (strlen($contrasena)<120 and strlen($contrasena)>=8) and (strlen($numerodedocumento)<9 and strlen($numerodedocumento)>=7) and strlen($token)==5){
			require_once ("../../blogic/User.php");
			$usuario=new b_user;
			if($usuario->registrar($nombre,$apellido,$email,$contrasena,$imagen,$token)){
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
