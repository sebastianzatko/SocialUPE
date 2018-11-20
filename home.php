<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("blogic/Grupo.php");
		$grupo=new Grupo();
		$listadegrupos=$grupo->obtenerGrupos((int)$_SESSION["id"]);
		require_once("blogic/User.php");
		$user=new b_user();
		$row=$user->obtenerDatosDeUsuario((int)$_SESSION["id"]);
		$datospersonales=mysqli_fetch_assoc($row);
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		
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
				<div class="col-md-6 d-sm-none d-none d-md-block">
					<div class="card" style="width: 18rem;">
						<?php
							echo "<img class='card-img-top' src='".$datospersonales['fotoperfil']."' alt='Foto perfil'><div class='card-body'><h5 class='card-title'>".$datospersonales['nombre']." ".$datospersonales["apellido"]."</h5><p class='card-text'>".$datospersonales["email"]."</p></div>";
						?>
					  
					  
						
						
					  
					  <ul class="list-group list-group-flush">
						<?php
							foreach($listadegrupos as $grupo){
								echo "<li class='list-group-item'><a href='grupo.php?idgroup=".$grupo[0]."' class='card-link'>".$grupo[1]."</a></li>";
							}
						
						?>
						<li class="list-group-item"><a href="logout.php" class="card-link">Salir</a></li>
						
					  </ul>
					</div>
				</div>
				<div class="col-md-6 principal">
					
					
					
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							
							<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
							
							
							<b>Carla Pavon</b> <i class="fas fa-arrow-right"></i> <a href="grupo.html"><b>Matematica 3</b></a>
							<span class="unhiglight pull-right">19/03/2017</span>
						  </div>
						  <div class="card-body">
							
							<p class="card-text">Tenemos clases el lunes?</p>
							
						  </div>
						  <ul class="list-group list-group-flush comentarios">
							<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/> <b>Sandro Juan</b> Creo que si <div class="pull-right"><span class="unhiglight pull-right">19/03/2017</span></div></li>
							<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/> <b>Laura Usaura</b> Buenas, efectivamente tenemos clases <div class="pull-right"><span class="unhiglight pull-right">19/03/2017</span></div></li>
							<li class="list-group-item">
								<form>
								<textarea name="contenido" cols="64" rows="10" id="publicacion" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea>
								<div class="pull-right"><input type="submit" class="btn btn-primary pull-right" value="Comentar" id="publicarestado"/></div>
								</form>
							</li>
						  </ul>
						</div>
					</div>
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
							
							
							<b>Juan Garrido</b> <i class="fas fa-arrow-right"></i> <a href="grupo.html"><b>Seguridad e higiene</b></a>
							<span class="unhiglight pull-right">19/03/2017</span>
						  </div>
						  <div class="card-body">
							
							<h5 class="card-title">Ha subido un nuevo archivo</h5>
							<a href="#"><div class="archivo"><p class="card-text"><i class="far fa-file fa-3x"></i> Introduccion seguridad e higiene.rar</p></div></a>
						  </div>
						  <ul class="list-group list-group-flush comentarios">
							<li class="list-group-item">
								<form>
								<textarea name="contenido" cols="64" rows="10" id="publicacion" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea>
								<div class="pull-right"><input type="submit" class="btn btn-primary pull-right" value="Comentar" id="publicarestado"/></div>
								</form>
							</li>
						  </ul>
						</div>
					</div>
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							<img src="files/images/logo.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
							
							
							<a href="grupo.html">Universidad de Ezeiza</a>
							<span class="unhiglight pull-right">19/03/2017</span>
						  </div>
						  <div class="card-body">
							
							<p class="card-text">Por falta de electricidad se suspenden las clases de hoy.</p>
							
						  </div>
						  <ul class="list-group list-group-flush comentarios">
							<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/> <b>Sandro Juan</b> Siempre lo mismo <span class="unhiglight pull-right">19/03/2017</span></li>
							
							<li class="list-group-item">
								<form>
								<textarea name="contenido" cols="64" rows="10" id="publicacion" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea>
								<div class="pull-right"><input type="submit" class="btn btn-primary pull-right" value="Comentar" id="publicarestado"/></div>
								</form>
							</li>
						  </ul>
						</div>
					</div>
					
				
				</div>
				
			</div>
		</div>
	
	</body>
</html>