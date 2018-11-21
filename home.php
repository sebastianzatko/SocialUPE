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
		require_once("blogic/Publicacion.php");
		$publicationz=new Publicacion();
		$publicacionesdeuser=$publicationz->obtenerpublicacionesrelacionadasconusuario((int)$_SESSION["id"],"");
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
			<div class="container  d-md-none d-sm-block d-xs-block">
				<div class="col-sm-12 col-xs-12">
					<ul class="nav nav-tabs" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" href="#muro" role="tab" data-toggle="tab">Muro</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#data" role="tab" data-toggle="tab">Datos Personales</a>
					  </li>
					</ul>
				</div>
				
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active col-sm-12 col-xs-12" id="muro">
						<div class="col-sm-12 col-xs-12">
							<?php
								require_once("blogic/Comentario.php");
								$comments=new Comentario();
								if(count($publicacionesdeuser)!=0){
									foreach($publicacionesdeuser as $publicacion){
										$comentariesofpublicacions=$comments->obtenercomentarios($publicacion[0]);
										$comentarios="";
										foreach($comentariesofpublicacions as $comment){
											$comentarios=$comentarios."<li class='list-group-item' data-idcomentario='".$comment[0]."'><img src='".$comment[2]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/> <b>".$comment[3]." ".$comment[4]."</b> ".$comment[1]." <div class='pull-right'><span class='unhiglight'>".$comment[5]."</span></div></li>";
										}
										if($publicacion[6]!="10"){
											echo "<div class='row hija'><div class='card'><div class='card-header'><img src='".$publicacion[5]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$publicacion[3]." ".$publicacion[4]."</b> <i class='fas fa-arrow-right'></i> <a href='grupo.php?idgroup=".$publicacion[6]."'><b>".$publicacion[7]."</b></a><span class='unhiglight pull-right'>".$publicacion[2]."</span></div><div class='card-body'><p class='card-text'>".$publicacion[1]."</p></div><ul class='list-group list-group-flush comentarios'>".$comentarios."<li class='list-group-item'><form action='includes/php/processcomentar.php' class='comentarito' method='POST'>
														<textarea cols='64' data-idpublicacion='".$publicacion[0]."' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
														<div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div>
														</form>
													</li></ul>
												</div>
											</div>";
										}else{
											echo "<div class='row hija'>
													<div class='card'>
													  <div class='card-header'>
														<img src='files/images/logo.png' class='img-thumbnail rounded img-fluid img-circle profilepic'/>
														
														
														Universidad de Ezeiza
														<span class='unhiglight pull-right'>".$publicacion[2]."</span>
													  </div>
													  <div class='card-body'>
														
														<p class='card-text'>".$publicacion[1]."</p>
														
													  </div>
													  <ul class='list-group list-group-flush comentarios'>
														".$comentarios."
														
														<li class='list-group-item'>
															<form class='comentarito' action='includes/php/processcomentar.php' method='POST'>
															<textarea cols='64' data-idpublicacion='".$publicacion[0]."' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
															<div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div>
															</form>
														</li>
													  </ul>
													</div>
												</div>";
										}
									}
								}else{
									echo "<div class='row hija'><div class='card'><div class='card-header'><center><h3 class='card-title'>No hay publicaciones :(</h3></center></div></div></div>";
								}
							
							?>
						</div>
					</div>
					
					<div role="tabpanel" class="tab-pane fade in active col-sm-12 col-xs-12" id="data">
						<div class="col-sm-12 col-xs-12">
							<div class="card" style="">
								<?php
									echo "<img class='card-img-top' src='".$datospersonales['fotoperfil']."' alt='Foto perfil'><div class='card-body'><h5 class='card-title'>".$datospersonales['nombre']." ".$datospersonales["apellido"]."</h5><p class='card-text'>".$datospersonales["email"]."</p></div>";
								?>
							  
							  
								
								
							  
							  <ul class="list-group list-group-flush">
								<?php
									foreach($listadegrupos as $grupo){
										if($grupo[2]=="1"){
											echo "<li class='list-group-item'><a href='grupo.php?idgroup=".$grupo[0]."' class='card-link'>".$grupo[1]."</a></li>";
										}
									}
								
								?>
								<li class="list-group-item"><a href="logout.php" class="card-link">Salir</a></li>
								
							  </ul>
							</div>
						</div>
					
					</div>
				
				</div>
			
			
			</div>
				
			<div class="container d-sm-none d-none d-md-block d-lg-block d-xl-block">
			<div class="row">
				<div class="col-md-6 d-sm-none d-none d-md-block">
					<div class="card" style="width: 18rem;">
						<?php
							echo "<img class='card-img-top' src='".$datospersonales['fotoperfil']."' alt='Foto perfil'><div class='card-body'><h5 class='card-title'>".$datospersonales['nombre']." ".$datospersonales["apellido"]."</h5><p class='card-text'>".$datospersonales["email"]."</p></div>";
						?>
					  
					  
						
						
					  
					  <ul class="list-group list-group-flush">
						<?php
							foreach($listadegrupos as $grupo){
								if($grupo[2]=="1"){
									echo "<li class='list-group-item'><a href='grupo.php?idgroup=".$grupo[0]."' class='card-link'>".$grupo[1]."</a></li>";
								}
							}
						
						?>
						<li class="list-group-item"><a href="logout.php" class="card-link">Salir</a></li>
						
					  </ul>
					</div>
				</div>
				<div class="col-md-6 principal">
					
					<?php
						require_once("blogic/Comentario.php");
						$comments=new Comentario();
						if(count($publicacionesdeuser)!=0){
							foreach($publicacionesdeuser as $publicacion){
								$comentariesofpublicacions=$comments->obtenercomentarios($publicacion[0]);
								$comentarios="";
								foreach($comentariesofpublicacions as $comment){
									$comentarios=$comentarios."<li class='list-group-item' data-idcomentario='".$comment[0]."'><img src='".$comment[2]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/> <b>".$comment[3]." ".$comment[4]."</b> ".$comment[1]." <div class='pull-right'><span class='unhiglight'>".$comment[5]."</span></div></li>";
								}
								if($publicacion[6]!="10"){
									echo "<div class='row hija'><div class='card'><div class='card-header'><img src='".$publicacion[5]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/><b>".$publicacion[3]." ".$publicacion[4]."</b> <i class='fas fa-arrow-right'></i> <a href='grupo.php?idgroup=".$publicacion[6]."'><b>".$publicacion[7]."</b></a><span class='unhiglight pull-right'>".$publicacion[2]."</span></div><div class='card-body'><p class='card-text'>".$publicacion[1]."</p></div><ul class='list-group list-group-flush comentarios'>".$comentarios."<li class='list-group-item'><form action='includes/php/processcomentar.php' class='comentarito' method='POST'>
												<textarea cols='64' data-idpublicacion='".$publicacion[0]."' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
												<div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div>
												</form>
											</li></ul>
										</div>
									</div>";
								}else{
									echo "<div class='row hija'>
											<div class='card'>
											  <div class='card-header'>
												<img src='files/images/logo.png' class='img-thumbnail rounded img-fluid img-circle profilepic'/>
												
												
												Universidad de Ezeiza
												<span class='unhiglight pull-right'>".$publicacion[2]."</span>
											  </div>
											  <div class='card-body'>
												
												<p class='card-text'>".$publicacion[1]."</p>
												
											  </div>
											  <ul class='list-group list-group-flush comentarios'>
												".$comentarios."
												
												<li class='list-group-item'>
													<form class='comentarito' action='includes/php/processcomentar.php' method='POST'>
													<textarea cols='64' data-idpublicacion='".$publicacion[0]."' rows='10' id='publicacion' class='form-control message' style='height: 62px; overflow: hidden;' placeholder='What's on your mind ?'></textarea>
													<div class='pull-right'><input type='submit' class='btn btn-primary pull-right' value='Comentar' id='publicarestado'/></div>
													</form>
												</li>
											  </ul>
											</div>
										</div>";
								}
							}
						}else{
							echo "<div class='row hija'><div class='card'><div class='card-header'><center><h3 class='card-title'>No hay publicaciones :(</h3></center></div></div></div>";
						}
					
					?>
					
					
						
					
				
				</div>
				
			</div>
		</div>
	<script src="includes/js/comentar.js"></script>
	</body>
</html>