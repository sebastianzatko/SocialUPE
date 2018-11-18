<?php
	if((isset($_POST["email"]) and $_POST["email"]!="") and (isset($_POST["password"]) and $_POST["password"]!="")){
		$email=$_POST["email"];
		$contrasena=$_POST["password"];
		if((strlen($email)>=10 and strlen($email)<=200) and (strlen($contrasena)>=8 and strlen($contrasena)<120)){
			require_once ("../../blogic/User.php");
			$usuario=new b_user;
			if($usuario->ingresar($email,$contrasena)){
				echo "Ha ingresado correctamente";
			}else{
				echo "El correo o la contraseña son incorrectas";
			}
		}else{
			echo "Alguno de los campos no cumplen la longuitud correcta";
		}
	}else{
		echo "Alguno de los campos no se ha completado";
	}
	





?>