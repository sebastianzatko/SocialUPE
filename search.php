<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("blogic/User.php");
		$user=new b_user();
		if($user->puede("buscar grupos",$_SESSION["permisos"])){
			if(isset($_GET["busqueda"]) and $_GET["busqueda"]!=""){
				$texto=$_GET["busqueda"];
				require_once("blogic/Grupo.php");
				$grupo=new Grupo();
				$listadegrupos=$grupo->obtenerGrupos((int)$_SESSION["id"]);
				$listadegruposencontrados=$grupo->buscargrupo($texto,(int)$_SESSION["id"]);
				$listagrupospertenecientes=array();
				if(count($listadegrupos)!=0){
					foreach($listadegrupos as $groupe){
						array_push($listagrupospertenecientes,[$groupe[0],$groupe[2]]);
					}
				}else{
					
				}
			}else{
				header("Location:home.php");
			}		
		}else{
			header("Location:home.php");
		}
	}else{
		
		header("Location:login.php");
	}


?>
<!doctype html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="includes/js/jquery-3.3.1.min.js" ></script>
		<link rel="stylesheet" href="includes/css/bootstrap.min.css"/>
		<script type="text/javascript" src="includes/js/bootstrap.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
		<script type="application/javascript" src="includes/js/notify.js"></script>
		<link rel="stylesheet" href="includes/css/search.css">
		
		<link rel="stylesheet" href="includes/css/home.css">
	</head>
	<body>
		<?php
				require "templates/menu.php";
    
				echo $htmlmenu;
				if($user->puede("crear grupos",$_SESSION["permisos"])){
					echo $modalcrear;
					echo $scriptcreargrupo;
				}
			
			?>
		
		
		
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 principal">
					<?php
						if(count($listadegruposencontrados)!=0){
							foreach($listadegruposencontrados as $grupoencontrado){
								if(false !== $key = array_search($grupoencontrado[0],array_column($listagrupospertenecientes,0))){
									if($listagrupospertenecientes[$key][1]=="1"){
										echo "<a href='grupo.php?idgroup=".$grupoencontrado[0]."' class='nodeclink'><div class='row hija'>
												<div class='card'>
												  <div class='card-header'>
													 <span class='unhiglight'>Fecha de creacion: ".$grupoencontrado[3]."</span>
													 <div class='pull-right'>
														
													</div>
												  </div>
												  <div class='card-body'>
													<h3 class='card-title'>".$grupoencontrado[1]."</h3>
													<small class='unhiglight'>Ya perteneces a este grupo</small>
													<div class='pull-right'>
														<h5 class='card-title'>".$grupoencontrado[2]."</h5>
													</div>
												  </div>
												</div>
											
											</div></a>";
									}else{
										echo "<div class='row hija'>
												<div class='card'>
												  <div class='card-header'>
													 <span class='unhiglight'>Fecha de creacion: ".$grupoencontrado[3]."</span>
													 <div class='pull-right'>
													</div>
												  </div>
												  <div class='card-body'>
													<h3 class='card-title'>".$grupoencontrado[1]."</h3>
													<button type='button' class='btn btn-success disabled'>Esperando aceptacion</button>
													<div class='pull-right'>
														<h5 class='card-title'>".$grupoencontrado[2]."</h5>
													</div>
												  </div>
												</div>
											
											</div>";
									}
								}else{
									echo "<div class='row hija'>
											<div class='card'>
											  <div class='card-header'>
												 <span class='unhiglight'>Fecha de creacion: ".$grupoencontrado[3]."</span>
												 <div class='pull-right'>
													
												</div>
											  </div>
											  <div class='card-body'>
												<h3 class='card-title'>".$grupoencontrado[1]."</h3>
												<button type='button' data-idgrupo='".$grupoencontrado[0]."' class='btn btn-success access'>Solicitar Acceso</button>
												<div class='pull-right'>
													<h5 class='card-title'>".$grupoencontrado[2]."</h5>
												</div>
											  </div>
											</div>
										
										</div>";
								}
							}
						}else{
							echo "<div class='row hija'><div class='card'><div class='card-body'><center><h3 class='card-title'>Lo sentimos , no hemos encontrado grupos :,(</h3></center></div></div></div>";
						}
					
					?>
					
					
					
					
					<div class="row hija">
					
					
					</div>
				</div>
			
			</div>
		</div>
		<script type="text/javascript" src="includes/js/solicitar.js" ></script>
	</body>
</html>