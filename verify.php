<html>
    <head>
        <title>Confirma tu correo electronico</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?php
			if(isset($_GET['mail']) and isset($_GET['codigo'])){
				$mail=$_GET['mail'];
				$codigo=$_GET['codigo'];
				require "blogic/User.php";

				$user=new b_user;
				
				if($user->confirmaremail($mail,$codigo)){
					echo "<div class='panel panel-success'>
					  <div class='panel-heading'><h1>Tu cuenta se ha creado con exito :D</h1></div>
					  <div class='panel-body'>
							<p>Ya se ha registrado tu casilla de correo en nuestro servidor</p>
							<p>Ahora puedes disfrutar de todos los beneficios de esta maravillosa aplicacion</p>
							<p>Para continuar ingresa</p>
							<a href='login.php'><button class='btn btn-primary'>Empezar a Socializar</button></a>
					  </div>
					</div>";
				}else{
					echo "<div class='panel panel-danger'>
					  <div class='panel-heading'><h1>No se puede verificar esta cuenta</h1></div>
					  <div class='panel-body'>
						<p>Por algun motivo tu cuenta no puede ser activada en este momento</p>
						<p>Es posible que todavia no haya llegado tu peticion de registro a nuestros servidores</p>
						<p>Por favor intenta mas tarde</p>
					  </div>
					</div>";
				}
			}else{
				header("Location:registro.php");
			}
        ?>
    <body>  
</html>