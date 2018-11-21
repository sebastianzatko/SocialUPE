<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("invitar usuarios",$_SESSION["permisos"])){
			
			if((isset($_POST["id_grupo"]) and is_numeric($_POST["id_grupo"])) and isset($_POST["email"])){
				$email=$_POST["email"];
				$idgrupo=$_POST["id_grupo"];
				require_once("../../blogic/User.php");
				$filezilla=new b_user();
				$resultado=$filezilla->obtenerusuarioconmail($email,$idgrupo,5);
				echo json_encode($resultado);
				
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


