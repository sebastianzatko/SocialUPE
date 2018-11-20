<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		if(isset($_GET["idgroup"])){
			require_once("blogic/Grupo.php");
			$groups=new Grupo();
			$listadegrupos=$groups->obtenerGrupos((int)$_SESSION["id"]);
			$gruposdeusuario=array();
			foreach($listadegrupos as $grupo){
				array_push($listadegrupos,$grupo[0]);
			}
			$idgrupo=$_GET["idgroup"];
			if(in_array($idgrupo,$listadegrupos)){
				require_once("blogic/Publicacion.php");
				$publicacionrepiola=new Publicacion();
				$listadepublicaciones=$publicacionrepiola->obtenerpublicaciones($idgrupo,1);
				require_once("blogic/User.php");
				$user=new b_user();
				$row=$user->obtenerDatosDeUsuario((int)$_SESSION["id"]);
				$datospersonales=mysqli_fetch_assoc($row);
				$miembrosynombre=$groups->obtenerdatosdelgrupo($idgrupo);
			}else{
				header("Location:home.php");
			}
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/css/home.css">
		<link rel="stylesheet" href="includes/css/grupo.css">
		<script src="includes/js/grupo.js"></script>
		
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
			<div class="row hija">

				<div>
				
				<div class=" d-block d-sm-none ">
				<div class="tab">
  					<button class="tablinks" id="btnInfo" >Info</button>
  					<button class="tablinks" id="btnMuro">Muro</button>
				</div>

				<div id="info" class="tabcontent">
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
						<h5 class="card-title">Miembros <?php echo count($miembrosynombre) ?></h5>
						
					  </div>
					  <ul class="list-group list-group-flush">
						<?php
							foreach($miembrosynombre as $miembro){
								if($user->puede("eliminar miembros del grupo",$_SESSION["permisos"])){
									if($miembro[1]==$_SESSION["id"]){
										echo "<li class='list-group-item'><img src='".$miembro[4]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$miembro[2]." ".$miembro[3]."</b><span class='unhiglight'>(".$miembro[5].")</span></li>";
									}
									else{
										echo "<li class='list-group-item'><button type='button' data-toggle='modal' data-iduser='".$miembro[1]."' data-target='#EliminarMiembro' class='close'>&times;</button><img src='".$miembro[4]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$miembro[2]." ".$miembro[3]."</b><span class='unhiglight'>(".$miembro[5].")</span></li>";
									}
								}else{
									echo "<li class='list-group-item'><img src='".$miembro[4]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$miembro[2]." ".$miembro[3]."</b><span class='unhiglight'>(".$miembro[5].")</span></li>";
								}
								
							}
						?>
						
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
				<div id="muro" class="tabcontent">

					<div class="row hija">
						<div class="card">
							<div class="card-body">
								<?php
									echo "<center><h2 class='card-title'>".$miembrosynombre[0][0]."</h2></center>";
								?>
								
							</div>
						</div>
					</div>
					<div class="row hija">
						<div class="card">
							<form id="formpublicacion" action="includes/php/processnewpublicacion.php" method="POST">
								
									<div class="card-body">
										<textarea name="contenido" cols="64" rows="10" id="publicacion" name="publicacion" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea>
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
					
					<?php
						require_once("blogic/Comentario.php");
						$comments=new Comentario();
						
						
						
						
						
						foreach($listadepublicaciones as $publications){
							$comentariesofpublicacions=$comments->obtenercomentarios($publications[0]);
							$comentarios="";
							foreach($comentariesofpublicacions as $comment){
								$comentarios=$comentarios."<li class='list-group-item' data-idcomentario='".$comment[0]."'><img src='".$comment[2]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/> <b>".$comment[3]." ".$comment[4]."</b> ".$comment[1]." <div class='pull-right'><span class='unhiglight'>".$comment[5]."</span></div></li>";
							}
							echo "<div class='row hija'>
									<div class='card'>
									  <div class='card-header'>
										
										<img src='".$publications[5]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/>
										
										
										<b>".$publications[3]." ".$publications[4]."</b>
										<span class='unhiglight pull-right'>".$publications[2]."</span>
									  </div>
									  <div class='card-body'>
										<div class='pull-right'></div>
										<p class='card-text'>".$publications[1]."</p>
										
									  </div>
									  <ul class='list-group list-group-flush comentarios'>
										".$comentarios."
										<li class='list-group-item'>
										
											<form class='comentarito' action='includes/php/processcomentar.php' method='POST'>
											<textarea data-idpublicacion='".$publications[0]."' name='contenido' cols='64' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
											<div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div>
											</form>
										</li>
									  </ul>
									</div>
								</div>";
						}
					
					
					?>					
				
				</div>				
				
				</div>
				<div class="col-md-5 d-sm-none d-none d-md-block d-none d-sm-block ">
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
						<h5 class="card-title">Miembros <?php echo count($miembrosynombre) ?></h5>
						
					  </div>
					  <ul class="list-group list-group-flush">
						<?php
							foreach($miembrosynombre as $miembro){
								if($user->puede("eliminar miembros del grupo",$_SESSION["permisos"])){
									if($miembro[1]==$_SESSION["id"]){
										echo "<li class='list-group-item'><img src='".$miembro[4]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$miembro[2]." ".$miembro[3]."</b><span class='unhiglight'>(".$miembro[5].")</span></li>";
									}
									else{
										echo "<li class='list-group-item'><button type='button' data-toggle='modal' data-iduser='".$miembro[1]."' data-target='#EliminarMiembro' class='close'>&times;</button><img src='".$miembro[4]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$miembro[2]." ".$miembro[3]."</b><span class='unhiglight'>(".$miembro[5].")</span></li>";
									}
								}else{
									echo "<li class='list-group-item'><img src='".$miembro[4]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$miembro[2]." ".$miembro[3]."</b><span class='unhiglight'>(".$miembro[5].")</span></li>";
								}
								
							}
						?>
						
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
				</div>
				

				
				
				<div class="col-md-7 principal d-none d-sm-block">
				
					<div class="row hija">
						<div class="card">
							<div class="card-body">
								<?php
									echo "<center><h2 class='card-title'>".$miembrosynombre[0][0]."</h2></center>";
								?>
								
							</div>
						</div>
					</div>
					<div class="row hija">
						<div class="card">
							<form id="formpublicacion" action="includes/php/processnewpublicacion.php" method="POST">
								
									<div class="card-body">
										<textarea name="contenido" cols="64" rows="10" id="publicacion" name="publicacion" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea>
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
					
					<?php
						require_once("blogic/Comentario.php");
						$comments=new Comentario();
						
						
						
						
						
						foreach($listadepublicaciones as $publications){
							$comentariesofpublicacions=$comments->obtenercomentarios($publications[0]);
							$comentarios="";
							foreach($comentariesofpublicacions as $comment){
								$comentarios=$comentarios."<li class='list-group-item' data-idcomentario='".$comment[0]."'><img src='".$comment[2]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/> <b>".$comment[3]." ".$comment[4]."</b> ".$comment[1]." <div class='pull-right'><span class='unhiglight'>".$comment[5]."</span></div></li>";
							}
							echo "<div class='row hija'>
									<div class='card'>
									  <div class='card-header'>
										
										<img src='".$publications[5]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/>
										
										
										<b>".$publications[3]." ".$publications[4]."</b>
										<span class='unhiglight pull-right'>".$publications[2]."</span>
									  </div>
									  <div class='card-body'>
										<div class='pull-right'></div>
										<p class='card-text'>".$publications[1]."</p>
										
									  </div>
									  <ul class='list-group list-group-flush comentarios'>
										".$comentarios."
										<li class='list-group-item'>
										
											<form class='comentarito' action='includes/php/processcomentar.php' method='POST'>
											<textarea data-idpublicacion='".$publications[0]."' name='contenido' cols='64' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
											<div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div>
											</form>
										</li>
									  </ul>
									</div>
								</div>";
						}
					
					
					?>
					
					
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
		<script src="includes/js/comentar.js"></script>
		<script src="includes/js/publicar.js"></script>
	</body>
</html>