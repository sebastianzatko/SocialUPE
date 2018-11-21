<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("../../blogic/Token.php");
		$tokenzilla=new Token();
		$listadetokens=$tokenzilla->obtenertokenes();
		echo json_encode($listadetokens);
	}else{
		
		header("Location:login.php");
	}


?>