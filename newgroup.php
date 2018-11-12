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
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary " role="navigation">
									
					<a class="navbar-brand" href="home.html">SocialUPE</a>
					<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
						&#9776;
					</button>
					<div class="collapse navbar-collapse" id="exCollapsingNavbar">
						<ul class="nav navbar-nav">
							<!--<li class="nav-item"><a href="#" class="nav-link">Ayuda</a></li>-->
							<!--<form class="form-inline">-->
								<div class="form-inline">
									<input class="form-control mr-sm-2" type="search" placeholder="Buscar Grupos" aria-label="Buscar Grupos">
									<button class="btn btn-outline-light my-2 my-sm-0" onclick="location.href = 'search.html';" type="submit">Buscar</button>
								</div>
							<!--</form>-->

						</ul>
						<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
							<li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
							<li class="dropdown order-1">
								<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle text-white">Opciones <span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-right mt-2">
									<li class="px-3 py-2">
									
										 <a href="users.html">Usuarios</a>
					
									</li>
									<li class="px-3 py-2">
									
										 <a href="newgroup.html">Crear Grupo</a>
					
									</li>
									 <li class="px-3 py-2">
									
										 <a href="login.html">Cerrar Sesion</a>
					
									</li>
									
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			
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