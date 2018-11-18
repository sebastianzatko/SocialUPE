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
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="includes/js/jquery-3.3.1.min.js" ></script>
		<link rel="stylesheet" href="includes/css/bootstrap.min.css"/>
		<script type="text/javascript" src="includes/js/bootstrap.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
		<script type="application/javascript" src="includes/js/notify.js"></script>
		<link rel="stylesheet" href="includes/css/singupAlumno.css">
	</head>
	<body>
	
			<?php
				require "templates/menu.php";
    
				echo $htmlmenu;
			
			?>
		<div class="container">
			

			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 "></div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-6 ">
					<h1>Codigo de grupo</h1>
					<form action="home.html" class="form-group">
						<div class="form-group">
							<h3>Ingrese Codigo de grupo</h3>
							<input class="form-control" type="text" required>
							<hr/>
							<button class="form-conotrol btn btn-lg btn-success">Validar Codigo</button>
						</div>
					</form>
					
				</div>
			</div>
		</div>


		
	</body>
	<script type="application/javascript" src="includes/js/registro.js"></script>
</html>