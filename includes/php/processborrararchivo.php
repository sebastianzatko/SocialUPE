<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("eliminar archivos",$_SESSION["permisos"])){
			
			if(isset($_POST["idarchivo"]) and is_numeric($_POST["idarchivo"]) and isset($_POST["ruta"])){
				$idarchivo=$_POST["idarchivo"];
				$ruta=$_POST["ruta"];
				
				require_once("../../blogic/Archivo.php");
				$filezilla=new Archivo();
				if($filezilla->eliminararchivo($idarchivo)){
					unlink("../../".$ruta);
					echo "Archivo eliminado con exito";
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