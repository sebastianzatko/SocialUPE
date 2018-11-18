<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		
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
			
			?>
		
		
		
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 principal">
					<a href="grupo.html" class="nodeclink"><div class="row hija">
						<div class="card">
						  <div class="card-header">
							 <span class="unhiglight">Fecha de creacion: 19/03/2017</span>
							 <div class="pull-right">
								<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
								<b>Juan Garrido</b>
							</div>
						  </div>
						  <div class="card-body">
							<h3 class="card-title">Seguridad e Higierene</h3>
							<small class="unhiglight">Ya perteneces a este grupo</small>
							<div class="pull-right">
								<h5 class="card-title">Licenciatura en Seguridad e Higierene</h5>
							</div>
						  </div>
						</div>
					
					</div></a>
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							 <span class="unhiglight">Fecha de creacion: 19/03/2017</span>
							 <div class="pull-right">
								<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
								<b>Natalia Lorenza</b>
							</div>
						  </div>
						  <div class="card-body">
							<h3 class="card-title">Matematica 1</h3>
							<button type="button" class="btn btn-success">Solicitar Acceso</button>
							<div class="pull-right">
								<h5 class="card-title">Ciclo Introductorio</h5>
							</div>
						  </div>
						</div>
					
					</div>
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							 <span class="unhiglight">Fecha de creacion: 19/03/2017</span>
							 <div class="pull-right">
								<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
								<b>Gabriel Guzman</b>
							</div>
						  </div>
						  <div class="card-body">
							<h3 class="card-title">Fisica</h3>
							<button type="button" class="btn btn-success">Solicitar Acceso</button>
							<div class="pull-right">
								<h5 class="card-title">Ciclo Introductorio</h5>
							</div>
						  </div>
						</div>
					
					</div>
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							 <span class="unhiglight">Fecha de creacion: 19/03/2017</span>
							 <div class="pull-right">
								<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
								<b>Valentin Molina</b>
							</div>
						  </div>
						  <div class="card-body">
							<h3 class="card-title">Fiestas y alimentos 1</h3>
							<button type="button" class="btn btn-success disabled">Esperando aceptacion</button>
							<div class="pull-right">
								<h5 class="card-title">Turismo y hoteleria</h5>
							</div>
						  </div>
						</div>
					
					</div>
					<div class="row hija">
					
					
					</div>
				</div>
			
			</div>
		</div>
	</body>
</html>