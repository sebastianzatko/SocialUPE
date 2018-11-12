<?php


    class b_user

    {
        public $idusuario;
        public $nombre;
        public $apellido;
        public $fotoperfil;
        public $mail;
        public $telefono;
        public $direccion;
        



        public function ingresar($email,$contrasena,$lat,$long){
            include "cdata/datauser.php";

            $datos=new d_user;
            if(strlen($email)<120){
                if($datos->dataIngresar($email,$contrasena,$lat,$long)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function registrar($nombre,$apellido,$mail,$contrasena,$fotoperfil){
           
            include "cdata/datauser.php";

            function obtenerExtencion($str){
                $nose=explode('.',$str);
                $se=end($nose);
                return $se;
            }
            
            $datos=new d_user;
			if($datos->verificarUsuarioExistente($mail)){
				//subir foto
				$ruta='/files/user/'.$mail."/";
				$rutadb='/files/user/'.$mail."/";
				mkdir($ruta,0777,true);
				$extension=obtenerExtencion($fotoperfil['name']);
				$archivo=$ruta."perfil.".$extension;
				@move_uploaded_file($fotoperfil["tmp_name"],$archivo);
				$archivo="/includes/php/".$rutadb."perfil.".$extension;
				
				
				$datos->registrarNuevoUsuario($nombre,$apellido,$archivo,$mail,$contrasena);
				return true;
			}else{
				return false;
			}
            
        }
        public function confirmaremail($mail,$codigo){
            include "cdata/datauser.php";

            $datos=new d_user;
            
            if(strlen($mail)<120 and strlen($codigo)<200){
                if($datos->verificarCuenta($mail,$codigo)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        
        public function obtenerDatosDeUsuario($idUsuario){
			
			function obtenerExtencion($str){
				$nose=explode('.',$str);
				$se=end($nose);
				return $se;
			}
            include "cdata/datauser.php";
            $datos=new d_user;
            $resultado=$datos->obtenerDatosDeUsuario($idUsuario);
            return $resultado;
        }
		
		public function logout(){
			session_unset($_SESSION["id"]);
			session_unset($_SESSION["nombre"]);
			session_unset($_SESSION["foto"]);
			session_destroy();
		}

    }





?>
