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