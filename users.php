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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/css/home.css">
		<script src="includes/js/users.js"></script>
	</head>
	<body>
		<?php
				require "templates/menu.php";
    
				echo $htmlmenu;
			
			?>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-condensed table-responsive full-width">
						  <thead>
						  <tr>
							  <th>Imagen de perfil</th>
							  <th>Nombre</th>
							  <th>Fecha de ingreso</th>
							  <th>Tipo</th>
							  <th>Estado</th>
							  <th>Desactivar cuenta</th>  
						  </tr>
					  </thead>   
					  <tbody>
						<tr>
							<td><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/></td>
							<td>Donna R. Folse</td>
							<td>2012/05/06</td>
							<td>Profesor</td>
							<td><span class=" p-3 mb-2 text-white bg-primary">Activo</span>
							</td>                                       
							<td><button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Desactivar</button></td>
						</tr>
						<tr>
							<td><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/></td>
							<td>Emily F. Burns</td>
							<td>2011/12/01</td>
							<td>Alumno</td>
							<td><span class="p-3 mb-2 text-white bg-danger">Baneado</span></td>
							<td><button type="button" class="btn btn-primary"><i class="far fa-thumbs-up"></i> Reactivar</button></td>					
						</tr>
						<tr>
							<td><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/></td>
							<td>Andrew A. Stout</td>
							<td>2010/08/21</td>
							<td>Administrador</td>
							<td><span class="p-3 mb-2 text-white bg-warning">Inactivo</span></td> 
							<td><button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Desactivar</button></td>
						</tr>
						<tr>
							<td><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/></td>
							<td>Mary M. Bryan</td>
							<td>2009/04/11</td>
							<td>Profesor</td>
							<td><span class="p-3 mb-2 text-white bg-info">Pendiente</span></td>    
							<td><button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Desactivar</button></td>
						</tr>
						<tr>
							<td><img src="files/images/default.png" class="img-thumbnail rounded img-fluid img-circle profilepic"/></td>
							<td>Mary A. Lewis</td>
							<td>2007/02/01</td>
							<td>Administrador</td>
							<td><span class="p-3 mb-2 text-white bg-primary">Activo</span></td>  
							<td><button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Desactivar</button></td>
						</tr>                                   
					  </tbody>
					</table>
				</div>
				
			</div>
			<div class="row">
					<div class="pull-right">
						<button class="btn btn-success" data-toggle="modal" data-target="#nuevoprofesor"><i class="fas fa-plus"></i> Nuevo Profesor</button>
						<button class="btn btn-success" data-toggle="modal" data-target="#nuevoadministrador"><i class="fas fa-plus"></i> Nuevo Administrador</button>
					</div>
			</div>
			
			
		<div id="nuevoadministrador" class="modal fade">

		<div class="modal-dialog">

				<div class="modal-content">
								
						<div class="modal-header">
								<h3 class="modal-title">Nuevo Administrador</h3>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								
						</div>
						<div class="modal-body">
						
								<form action="" class="form-group" id="frmNuevoAdmin">
									<div class="form-group">
										<label class="form-label">Nombre</label><input required name="lblNombreAdmin" class="form-control" pattern="^([a-zA-Z]{2,})$" type="text"/>
									</div>
									<div class="form-group">
										<label class="form-label">Correo electronico</label><input required name="lblEmailAdmin" class="form-control"  type="email"/>
									</div>
									<div class="form-group">
										<label class="form-label">Contraseña</label><input required name="lblContraseñaAdmin" class="form-control" type="password"/>
									</div>
									
								
								

						</div>
						<div class="modal-footer">
								<button  type="submit" id="btnAgregarAdmin" class="btn btn-primary">Agregar Administrador</button>
								</form> 
						</div>
				</div>
		</div>
		</div>
		
				<div id="nuevoprofesor" class="modal fade">

					<div class="modal-dialog">
			
							<div class="modal-content">
											
									<div class="modal-header">
											<h3 class="modal-title">Nuevo Profesor</h3>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											
									</div>
									<div class="modal-body">
											<form action="" class="form-group" id="frmNuevoProfesor">
												<div class="form-group">
													<label class="form-label">Nombre</label><input required name="lblNombreProf" class="form-control" pattern="^([a-zA-Z]{2,})$" type="text"/>
												</div>
												<div class="form-group">
													<label class="form-label">Correo electronico</label><input required name="lblEmailProf" class="form-control" type="email"/>
												</div>
												<div class="form-group">
													<label class="form-label">Contraseña</label><input required name="lblContraseñaProf" class="form-control" type="password"/>
												</div>
												<div class="form-group">
													<label for="file-upload" class="custom-file-upload">
														<i class="fas fa-camera btn btn-success"></i>Foto de perfil
														  
													</label>
													<input id="file-upload" name="imagen" type="file"/>
												</div>
												
			
									</div>
									<div class="modal-footer">
											<button  type="submit" id="btnAgregarProf" class="btn btn-primary">Agregar Profesor</button>
											</form> 
										</div>
									</div>
								</div>
				</div>
		</div>
	</body>
</html>