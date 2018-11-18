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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/css/home.css">
	</head>
	<body>
			<?php
				require "templates/menu.php";
    
				echo $htmlmenu;
			
			?>
		
		
		<div class="container">
			<div class="row">
			<div class="row hija">
			
				<div class="col-md-5 d-sm-none d-none d-md-block">
					<div class="card" style="width: 18rem;">
					  <div class="card-body">
						<h5 class="card-title">Archivos (4)</h5>
						
					  </div>
					  <ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="#"><div class="archivo card-link"><button type="button" data-toggle="modal" data-target="#EliminarArchivo" class="close">&times;</button><p class="card-text"><i class="far fa-file fa-2x"></i> Introduccion seguridad e higiene.rar</p></div></a></li>
						<li class="list-group-item"><a href="#"><div class="archivo card-link"><button type="button" data-toggle="modal" data-target="#EliminarArchivo" class="close">&times;</button><p class="card-text"><i class="fas fa-file-powerpoint fa-2x"></i> Presentacion power point.pptx</p></div></a></li>
						<li class="list-group-item"><a href="#"><div class="archivo card-link"><button type="button" data-toggle="modal" data-target="#EliminarArchivo" class="close">&times;</button><p class="card-text"><i class="fas fa-file-word fa-2x"></i> Trabajo Practico.doc</p></div></a></li>
						<li class="list-group-item"><a href="#"><div class="archivo card-link"><button type="button" data-toggle="modal" data-target="#EliminarArchivo" class="close">&times;</button><p class="card-text"><i class="fas fa-file-word fa-2x"></i> Proyecto de catedra.doc</p></div></a></li>
						<li class="list-group-item">
							<button data-toggle="modal" data-target="#Subir_Archivo" class="btn btn-success">Subir nuevos archivos</button>
						</li>
					  </ul>
					</div>
					<div class="card hija" style="width: 18rem;">
					  <div class="card-body">
						<h5 class="card-title">Miembros (6)</h5>
						
					  </div>
					  <ul class="list-group list-group-flush">
						<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Juan Garrido</b><span class="unhiglight">(Profesor)</span></li>
						<li class="list-group-item"><button type="button" data-toggle="modal" data-target="#EliminarMiembro" class="close">&times;</button><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Julieta Maria</b><span class="unhiglight">(Alumno)</span></li>
						<li class="list-group-item"><button type="button" data-toggle="modal" data-target="#EliminarMiembro" class="close">&times;</button><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Diego Torres</b><span class="unhiglight">(Alumno)</span></li>
						<li class="list-group-item"><button type="button" data-toggle="modal" data-target="#EliminarMiembro" class="close">&times;</button><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Sandra Solari</b><span class="unhiglight">(Alumno)</span></li>
						<li class="list-group-item"><button type="button" data-toggle="modal" data-target="#EliminarMiembro" class="close">&times;</button><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Martin Dominguez</b><span class="unhiglight">(Alumno)</span></li>
						<li class="list-group-item"><button type="button" data-toggle="modal" data-target="#EliminarMiembro" class="close">&times;</button><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Mario Casas</b><span class="unhiglight">(Alumno)</span></li>
						<li class="list-group-item"><button data-toggle="modal" data-target="#Invitar_Alumno" class="btn btn-success">Invitar alumnos</button></li>
					  </ul>
					</div>
					<div class="card hija" style="width: 18rem;">
					  <div class="card-body">
						<h5 class="card-title">Solicitudes</h5>
						
					  </div>
					  <ul class="list-group list-group-flush">
						<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Susana Villaveloz</b><button type="button" class="btn btn-primary"><i class="far fa-thumbs-up"></i> Aceptar</button><button type="button" class="btn btn-danger pull-right"><i class="fas fa-ban"></i> Rechazar</button></li>
						<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/><b>Fernando Lapida</b><button type="button" class="btn btn-primary"><i class="far fa-thumbs-up"></i> Aceptar</button><button type="button" class="btn btn-danger pull-right"><i class="fas fa-ban"></i> Rechazar</button></li>
					  </ul>
					</div>
				</div>
				
				
				<div class="col-md-7 principal">
				
					<div class="row hija">
						<div class="card">
							<div class="card-body">
								<center><h2 class="card-title">Seguridad e Higiene</h2></center>
							</div>
						</div>
					</div>
					<div class="row hija">
						<div class="card">
							<form id="formpublicacion">
								
									<div class="card-body">
										<textarea name="contenido" cols="64" rows="10" id="publicacion" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea>
									</div>
									<div class="card-footer">
										<input type="submit" class="btn btn-primary pull-right" value="Compartir" id="publicarestado"/>
									</div>
								
							</form>
						</div>
					</div>
					
					<div class="row hija">
						<div class="card">
						  <div class="card-header">
							<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
							
							
							<b>Juan Garrido</b>
							<span class="unhiglight pull-right">19/03/2017</span>
						  </div>
						  <div class="card-body">
							<div class="pull-right"></div>
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
							
							<img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/>
							
							
							<b>Mario Casas</b>
							<span class="unhiglight pull-right">19/03/2017</span>
						  </div>
						  <div class="card-body">
							<div class="pull-right"></div>
							<p class="card-text">Profe no voy a poder ir el viernes</p>
							
						  </div>
						  <ul class="list-group list-group-flush comentarios">
							<li class="list-group-item"><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/> <b>Juan Garrido</b> Hablame por privado <div class="pull-right"><span class="unhiglight">19/03/2017</span></div></li>
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
							
							
							<b>Juan Garrido</b>
							<span class="unhiglight pull-right">19/03/2017</span>
						  </div>
						  <div class="card-body">
							<div class="pull-right"></div>
							<p class="card-text">Estimados en los proximos dias estare subiendo un archivo con la introduccion a la materia</p>
							
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
					
				</div>
				
				
				
				
				
			</div>
		</div>
		</div>
	
		<div id="Invitar_Alumno" class="modal fade">

		<div class="modal-dialog">

				<div class="modal-content">
								
						<div class="modal-header">
								<h3 class="modal-title">Invitar Participante</h3>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								
						</div>
						<div class="modal-body">
						
								<form action="" class="form-group">
								<label for="">Ingrese Email</label>
								<input type="email" class="form-control">
								
								

						</div>
						<div class="modal-footer">
								<button  type="submit" class="btn btn-primary">Enviar Invitacion</button>
								</form> 
						</div>
				</div>
		</div>
		</div>
		
				<div id="Subir_Archivo" class="modal fade">

						<div class="modal-dialog">
				
								<div class="modal-content">
												
										<div class="modal-header">
												<h3 class="modal-title">Subir Archivo</h3>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												
										</div>
										<div class="modal-body">
												<form action="" class="form-group">
												<label for="file-upload" class="custom-file-upload">
													<i class="fas fa-file-upload btn btn-success"></i>  Subir nuevo archivo
												</label>
												<input id="file-upload" type="file"/>
												
												
				
										</div>
										<div class="modal-footer">
												<button  type="button" class="btn btn-primary">Subir Archivo</button>
												</form> 
											</div>
										</div>
									</div>
				</div>

				<div id="EliminarArchivo" class="modal fade">

					<div class="modal-dialog">
			
							<div class="modal-content">
											
									<div class="modal-header">

										<h4 class="modal-title">Eliminar Archivo</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
											
											
									</div>
									<div class="modal-body">
										<h3>	<i class="fas fa-exclamation fa-3x"></i>¿Esta seguro que desea eliminar?</h3>
											
											
											
			
									</div>
									<div class="modal-footer">
											<button  type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
											<button type="button" class="btn btn-success">SI	</button>
											 
										</div>
									</div>
								</div>
			</div>

			<div id="EliminarMiembro" class="modal fade">

				<div class="modal-dialog">
		
						<div class="modal-content">
										
								<div class="modal-header">

									<h4 class="modal-title">Eliminar Miembro</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
										
										
								</div>
								<div class="modal-body">
									<h3>	<i class="fas fa-exclamation fa-3x"></i>¿Esta seguro que desea eliminar?</h3>
										
										
										
		
								</div>
								<div class="modal-footer">
										<button  type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
										<button type="button" class="btn btn-success">SI	</button>
										 
									</div>
								</div>
							</div>
		</div>

	</body>
</html>