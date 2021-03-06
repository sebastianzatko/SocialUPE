<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="includes/js/jquery-3.3.1.min.js" ></script>
    <link rel="stylesheet" href="includes/css/bootstrap.min.css"/>
    <script type="text/javascript" src="includes/js/bootstrap.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script type="application/javascript" src="includes/js/notify.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="includes/css/home.css">  -->
    <link rel="stylesheet" href="includes/css/registro.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 id="titulo">Registro Alumno</h2>
            </div>
            <div class="col-md-2"></div>
        </div>
            <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="includes/php/processnewuser.php" enctype="multipart/form-data" id="Registro" class="form-group" method="POST">
                                    <div class="form-group">
                                        
										<label for="">Codigo de ingreso</label>
                                        <input type="text" name="Token" class="form-control" placeholder="x4as5" minlength="5" maxlength="5" required >
										
                                        <label for="">Nombre</label>
                                        <input type="text" name="Nombre" class="form-control" placeholder="Juanito" minlength="4" maxlength="45" pattern="^([a-zA-Z]{2,})$" required >
                                        
        
                                        <label for="">Apellido</label>
                                        <input type="text" id="Apellido" name="Apellido" class="form-control" placeholder="Arcoiris" minlength="4" maxlength="45" pattern="^([a-zA-Z]{2,})$" required>
        
                                        <label for="">Email</label>
                                        <input class="form-control" type="email" placeholder="yoelarcoiris@yahoo.com" name="email" minlength="10" maxlength="200" id="email" required>

        
                                        <label class="titulo"  for="NumDoc">Numero Documento</label>
                                        <input type="text" placeholder="205789632" name="NumeroDocumento" class="form-control" id="NumDoc" required minlength="7" maxlength="8">
        
                                        <label for="">Contraseña</label>
                                        <input type="password" name="contrasena" class="form-control" minlength="8" maxlength="120" required>
										<br>
										<label for="file-upload" class="custom-file-upload">
											<i class="fas fa-camera btn btn-success"></i> Foto de perfil
											  
										</label>
										<input id="file-upload" name="imagen" type="file" />
										
										<br>
        
                                        <button type="submit" id="registrar"   class="form-control btn btn-primary">Registrar</button>
                            </form>
        
                        </div>        
                    </div>
                </div>
    </div>

   

     <script src="includes/js/registro.js"></script>
</body>
</html>
