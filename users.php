<?php
	session_start();
	if(isset($_SESSION["id"]) and isset($_SESSION["email"])){
		require_once("blogic/User.php");
		$user=new b_user();
		$listadeusuarios=$user->obtenerusuarios("","","");
		require_once("blogic/Token.php");
		$tokenzilla=new Token();
		$listadetokens=$tokenzilla->obtenertokenes();
		$listadetiposusuario=$tokenzilla->obtenertiposusuario();
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/css/home.css">
		<script src="includes/js/users.js"></script>
	</head>
	<body>
		<?php
				require "templates/menu.php";
    
				echo $htmlmenu;
				if($user->puede("crear grupos",$_SESSION["permisos"])){
					echo $modalcrear;
					echo $scriptcreargrupo;
				}
				if($user->puede("publicar en muro principal",$_SESSION["permisos"])){
					echo $modalpublicacionprincipal;
					echo $scriptpublicarprincipal;
				}
				if($user->puede("aceptar solicitudes de grupo",$_SESSION["permisos"])){
					echo $modalinvitacionesgrupo;
					echo $scriptaceptarinvitaciongrupo;
				}
			
			?>
		
		<div class="container">
			<div class="row">
					<div class="pull-right">
						<button class="btn btn-success" data-toggle="modal" data-target="#tokens"><i class="fas fa-plus"></i> Tokens</button>
					</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-condensed table-responsive full-width">
						  <thead>
						  <tr >
							  <th class="d-sm-table-cell d-xs-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell ">Imagen de perfil</th>
							  <th class="d-sm-table-cell d-xs-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">Nombre</th>
							  <th class="d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell mobile">Fecha de ingreso</th>
							  <th class="d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell mobile">Tipo</th>
							  <th class="d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell mobile ">Estado</th>
							  <th class="d-sm-table-cell d-xs-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">Desactivar cuenta</th>  
						  </tr>
					  </thead>   
					  <tbody>
						<?php
							foreach($listadeusuarios as $usuario){
								if($usuario[4]=="Pendiente activacion"){
									$estado="<span class='p-3 mb-2 text-white bg-info'>".$usuario[4]."</span>";
									$botton="<button data-iduser='".$usuario[7]."' type='button' class='btn btn-danger'><i class='fas fa-ban'></i> Desactivar</button>";
								}elseif($usuario[4]=="Baneada"){
									$estado="<span class='p-3 mb-2 text-white bg-danger'>".$usuario[4]."</span>";
									$botton="<button data-iduser='".$usuario[7]."'  type='button' class='btn btn-primary'><i class='far fa-thumbs-up'></i> Reactivar</button>";
								}else{
									$estado="<span class=' p-3 mb-2 text-white bg-primary'>".$usuario[4]."</span>";
									$botton="<button data-iduser='".$usuario[7]."' type='button' class='btn btn-danger'><i class='fas fa-ban'></i> Desactivar</button>";
								}
								echo "<tr><td><img src='".$usuario[0]."' class='img-thumbnail rounded img-fluid img-circle profilepic'/></td><td>".$usuario[1]." ".$usuario[2]."</td><div class='mobile d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell'><td class='d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell'>".$usuario[5]."</td><td class='mobile d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell'>".$usuario[6]."</td><td class='mobile d-sm-none d-xs-none d-md-none d-lg-none d-xl-table-cell'>".$estado."</td></div><td>".$botton."</td></tr>";
							}
						?>
						
			                                  
					  </tbody>
					</table>
				</div>
				
			</div>
			
			
			
		
		</div>
		
				<div id="tokens" class="modal fade">

					<div class="modal-dialog">
			
							<div class="modal-content">
											
									<div class="modal-header">
											<h3 class="modal-title">Tokens disponibles</h3>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											
									</div>
									<div class="modal-body">
											<div class="col-md-12">
												<table class="table table-striped table-condensed table-responsive full-width">
													<thead>
														<tr>
															<th class="col-md-3">Tipo de usuario</th>
															<th class="col-md-1">Token</th>
															
														</tr>
													</thead>
													
													<tbody id="nuevalistadetokens">
														<?php
															if(count($listadetokens)!=0){
																foreach($listadetokens as $token){
																	echo "<tr><td>".$token[1]."</td><td>".$token[0]."</td></tr>";
																}
															}else{
																echo "<tr><td>No hay tokenes habilitados :(</td></tr>";
															}
														?>
													</tbody>
												</table>
											</div>	
			
									</div>
									<div class="modal-footer">
											<form action="includes/php/processnewtoken.php" class="form-group" method="POST" id="newtoken">
												<div class="form-inline">
												<label>Tipo de usuario: </label>
												<select name="usertype" id="chosen">
													<?php
														foreach($listadetiposusuario as $tipousuario){
															echo "<option value='".$tipousuario[0]."'>".$tipousuario[1]."</option>";
														}
													
													?>
												</select>
												<br>
												</div>
												<div class="form-inline">
													<button  type="submit" class="btn btn-primary">Agregar Nuevo Token</button>
												</div>
											</form> 
										</div>
									</div>
								</div>
				</div>
		</div>
		<script src="includes/js/botonesusuarios.js">
		</script>
		<script src="includes/js/newtoken.js">
		</script>
	</body>
</html>