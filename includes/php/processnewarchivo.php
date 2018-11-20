<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("comentar",$_SESSION["permisos"])){
			
			if(isset($_FILES["archivo"]) and $_FILES["archivo"]["name"]!="" and (isset($_POST["idgrupo"]))){
				$archivo=$_FILES["archivo"];
				$idgrupo=$_POST["idgrupo"];
				require_once("../../blogic/Archivo.php");
				$filezilla=new Archivo();
				if($filezilla->subirarchivo($archivo,(int)$idgrupo,(int)$_SESSION["id"])){
					echo "Archivo subido con exito";
				}else{
					echo "Faltan datos necesarios para realizar la operacion";
				}
			}else{
				echo "No estan todas las variables seteadas";
			}
		}else{
			echo "No puede realizar esta operacion";
		}
	}else{
		echo "Debe estar logeado para hacer esta operacion";
	}


?>