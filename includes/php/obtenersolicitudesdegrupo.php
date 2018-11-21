<?php
	session_start();
	if(isset($_SESSION["permisos"]) and $_SESSION["id"]){
		require_once("../../blogic/User.php");
		$user=new b_user();
		if($user->puede("aceptar solicitudes de grupo",$_SESSION["permisos"])){
			
			
			
			require_once("../../blogic/Grupo.php");
			$filezilla=new Grupo();
			$resultado=$filezilla->obtenersolicitudesagrupos($_SESSION["id"]);
			echo json_encode($resultado);
				
			
		}else{
			echo "No puede realizar esta operacion";
		}
	}else{
		echo "Debe estar logeado para hacer esta operacion";
	}


?>