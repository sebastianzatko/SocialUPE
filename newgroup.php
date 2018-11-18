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
		<link rel="stylesheet" href="includes/css/newgroup.css">
		<script src="includes/js/newgroup.js"></script>
	</head>
	<body>
		<?php
				require "templates/menu.php";
    
				echo $htmlmenu;
			
			?>
			
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default casirecuadro">
						<div class="panel-heading recuadro">
							<h3 class="panel-title">Nuevo grupo</h3>
						</div>
						<hr/>
						<div class="panel-body recuadro">
							<form accept-charset="UTF-8" role="form" id="frmCrearGrupo">
							<fieldset>
								<div class="form-group">
									<label>Nombre del grupo: </label><input class="form-control" placeholder="Nombre del grupo" name="nombreGrupo" type="text" required>
								</div>
								<div class="form-group">
									<label>Carrera del grupo:</label>
									<select class="form-control" name="carrera" required >
										<option value="" selected>Tecnicatura en desarrollo de software</option>
										<option value="" >Licenciatura en seguridad e higiene</option>
										<option value="" >Licenciatura en Turismo y hoteleria</option>
										<option value="" >Despachante de aduana</option>
										<option value="" >Desapachante en aeronaves</option>
									</select>
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" id="btnCrearGrupo" value="Crear nuevo grupo">
							</fieldset>
							</form>
							
							  <hr/>

							
						</div>
					</div>
					</div>
				</div>
			</div>
	</body>
</html>