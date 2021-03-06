<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="includes/js/jquery-3.3.1.min.js" ></script>
		<link rel="stylesheet" href="includes/css/bootstrap.min.css"/>
		<script type="text/javascript" src="includes/js/bootstrap.min.js" ></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
		<script type="application/javascript" src="includes/js/notify.js"></script>
		<script src="includes/js/login.js"></script>
		
		<link rel="stylesheet" href="includes/css/login.css"/>
	</head>
	<body>
		<div class="container">
			 <div class="row">
				<div class="col-md-3 col-lg-3 col-xl-3"></div>
				<div class="col-md-6 col-sm-12 col-lg-6 col-xl-6"><center><img src="files/images/logo.png" class="img-fluid logo" alt="Logo universidad de Ezeiza"/></center></div>
				<div class="col-md-3 col-lg-3 col-xl-3"></div>
			 </div>
			 
			 <div class="row">
				<div class="col-md-3 col-lg-3 col-xl-3"></div>
				<div class="col-md-6 col-md-offset-6 col-sm-12 col-lg-6 col-xl-6">
					<div class="panel panel-default casirecuadro">
						<div class="panel-heading recuadro">
							<h3 class="panel-title">Ingresar</h3>
						</div>
						<div class="panel-body recuadro">
							<form action="includes/php/processlogin.php" method="POST" id="frmLogin"accept-charset="UTF-8" role="form">
							<fieldset>
								<div class="form-group">
									<input class="form-control" value="<?php  ob_start(); if(isset($_COOKIE["emailusuario"])) { echo $_COOKIE["emailusuario"]; } ?>" placeholder="correoelectronico@ejemplo.com" name="email" type="email" minlength="10" maxlength="200" required>
								</div>
								<div class="form-group">
									<input class="form-control" value="<?php if(isset($_COOKIE["contrasenausuario"])) { echo $_COOKIE["contrasenausuario"]; } ?>" placeholder="Contraseña" name="password" type="password" value="" minlength="8" maxlength="120" required>
								</div>
								
								<div class="checkbox">
									<label>
										<input name="remember" value="1" type="checkbox" <?php if(isset($_COOKIE["emailusuario"])) { echo  "checked";  } ob_end_flush(); ?> value="Remember Me"> Recuerdame
									</label>
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" value="Ingresar" id="logear">
							</fieldset>
							</form>
							<!--<a href="" data-toggle="modal" data-target="#Recuperar_contraseña"><small>Olvide mi contraseña</small></a>-->
							  <hr/>

							<a href="registro.php"><small>No tienes una cuenta? Registrate con tu codigo</small></a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-lg-3 col-xl-3"></div>
			</div>
		</div>

		<div id="Recuperar_contraseña" class="modal fade">
				
     <div class="modal-dialog">

                <div class="modal-content">
                        
                    <div class="modal-header">
						<H3 class="modal-title">Recuperar Contraseña</H3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-group">
                        <label for="">Ingrese Email</label>
                        <input type="email" class="form-control">
                        
                        

                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-primary">Enviar</button>
                        </form> 
                        


</div>
	</body>
</html>