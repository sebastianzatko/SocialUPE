<?php
	
	if(isset($_POST["lblNombreProf"]) and isset($_POST["lblApellidoProf"]) and isset($_POST["lblEmailProf"]) and isset($_POST["lblNumDocProf"]) and isset($_POST["lblContraseñaProf"])){
		$nombre=$_POST["lblNombreProf"];
		$apellido=$_POST["lblApellidoProf"];
		$email=$_POST["lblEmailProf"];
		$numerodedocumento=$_POST["lblNumDocProf"];
		$contrasena=$_POST["lblContraseñaProf"];
		$imagen=$_FILES["imagen"];
		
		
		
		if((strlen($nombre)<45 and strlen($nombre)>4) and (strlen($apellido)<45 and strlen($apellido)>4) and (strlen($email)<200 and strlen($email)>10) and (strlen($contrasena)<120 and strlen($contrasena)>=8) and (strlen($numerodedocumento)<25 and strlen($numerodedocumento)>=7)){
			require_once ("../../blogic/User.php");
			$usuario=new b_user;
			if($usuario->registrar($nombre,$apellido,$email,$contrasena,$imagen,2)){
				echo "Se ha registrado correctamente";
				
			}else{
				echo "No se ha podido registrar el profesor";
			}
		}else{
			echo "Algunos campos no cumplen la longuitud";
		}
	}else{
		echo "No estan todos los datos completos";
	}

?>