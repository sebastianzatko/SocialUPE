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
        



        public function ingresar($email,$contrasena){
            include "cdata/datauser.php";

            $datos=new d_user;
            if(strlen($email)<120){
                if($datos->dataIngresar($email,$contrasena)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function registrar($nombre,$apellido,$mail,$contrasena,$fotoperfil,$tipousuario){
           
            include "cdata/datauser.php";

            function obtenerExtencion($str){
                $nose=explode('.',$str);
                $se=end($nose);
                return $se;
            }
            
            $datos=new d_user;
            
			if($datos->verificarUsuarioExistente($mail)){
				//subir foto
                if(isset($fotoperfil["tmp_name"]) && $fotoperfil["tmp_name"]!=""){
                    $ruta='files/user/'.$mail."/";
                    $rutadb='files/user/'.$mail."/";
                    mkdir($ruta,0777,true);//tal vez no hace falta
                    $extension=obtenerExtencion($fotoperfil['name']);
                    $archivo=$ruta."perfil.".$extension;
                    @move_uploaded_file($fotoperfil["tmp_name"],$archivo);
                    $archivo="includes/php/".$rutadb."perfil.".$extension;
                }else{
                    $archivo="files/images/default.png";
                }
				
				
				
				
				$datos->registrarNuevoUsuario($nombre,$apellido,$archivo,$mail,$contrasena,$tipousuario);
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
		
		public function puede($permiso,$permisosusuario){
			
			if(in_array($permiso,$permisosusuario)){
				return true;
			}else{
				return false;
			}
			
		}
		
		public function obtenerusuarios($paginacion,$orden,$busqueda){
			include "cdata/datauser.php";
            $datos=new d_user;
            $resultado=$datos->obtenerUsuarios($paginacion,$orden,$busqueda);
            return $resultado;
		}
		
		public function filtrarusuarios(){
			
		}
		
		public function cambiarestadousuario($idestado,$idusuario){
			include "cdata/datauser.php";
			$datos=new d_user;
			$resultado=$user->cambiarestadousuario($idestado,$idusuario);
			return $resultado;
			
		}
    }





?>
