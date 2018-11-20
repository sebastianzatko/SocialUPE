<?php
	
	if(isset($_POST["lblNombreAdmin"]) and isset($_POST["lblApellidoAdmin"]) and isset($_POST["lblEmailAdmin"]) and isset($_POST["lblNumDocAdmin"]) and isset($_POST["lblContraseñaAdmin"])){
		$nombre=$_POST["lblNombreAdmin"];
		$apellido=$_POST["lblApellidoAdmin"];
		$email=$_POST["lblEmailAdmin"];
		$numerodedocumento=$_POST["lblNumDocAdmin"];
		$contrasena=$_POST["lblContraseñaAdmin"];
		$imagen=$_FILES["imagen"];
		
		
		
		if((strlen($nombre)<45 and strlen($nombre)>4) and (strlen($apellido)<45 and strlen($apellido)>4) and (strlen($email)<200 and strlen($email)>10) and (strlen($contrasena)<120 and strlen($contrasena)>=8) and (strlen($numerodedocumento)<25 and strlen($numerodedocumento)>=7)){
			require_once ("../../blogic/User.php");
			$usuario=new b_user;
			if($usuario->registrar($nombre,$apellido,$email,$contrasena,$imagen,2)){
				echo "Se ha registrado correctamente";
				
			}else{
				echo "No se ha podido registrar el administrador";
			}
		}else{
			echo "Algunos campos no cumplen la longuitud";
		}
	}else{
		echo "No estan todos los datos completos";
	}

?>