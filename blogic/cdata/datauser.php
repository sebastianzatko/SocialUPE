<?php
//require_once('email.php');
    
    class d_User{

        public function verificarUsuarioExistente($email){
            require "conexion/conection.php";
            $sql="SELECT id_usuario from usuario WHERE email=? LIMIT 1";    
            
            if($stmt=$mysqli->prepare($sql)){
                
                $stmt->bind_param('s',$email);
                $stmt->execute();
                $resultado=$stmt->get_result();
                
                if(mysqli_num_rows($resultado)>=1){
                    return false;
                }else{
                    return true;
                }
             }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
             }
        }
        public function registrarNuevoUsuario($nombre,$apellido,$fotoperfil,$mail,$password,$tipousuario){
            require "conexion/conection.php";
            $randomsalt=uniqid('', true);;
            $hashcontrasena=sha1($password.$randomsalt);
            $contrasenafinal=$hashcontrasena.",".$randomsalt;

            $bytesxD = openssl_random_pseudo_bytes(32);
            $hashxD = base64_encode($bytesxD);

            $validacionHash=$hashxD;

            $sql="INSERT INTO `usuario` (`nombre`,`apellido`,`email`,`contrasena`,`fotoperfil`,`hash_confirmacion`,`estado`,`habilitado`,`tipousuario`) VALUES (?,?,?,?,?,?,1,0,?)";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param('ssssssi',$nombre,$apellido,$mail,$contrasenafinal,$fotoperfil,$validacionHash,$tipousuario);
                
                
                if($stmt->execute()){
                    
                    //$s_email = new changeromail();
                   
                    //$url = 'http://beta.changero.online/verify.php?mail='.$mail.'&codigo='.$validacionHash;
                    
                    //$nombreusuario = $nombre.' '.$apellido;
                   
                    //$s_email->validaremail($mail,$nombreusuario,$url);
					return true;
                }else{
                   $error = $mysqli->errno . ' ' . $mysqli->error;
					echo $error;
					exit();
                }

                
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
        public function verificarCuenta($email,$condigoDeValidacion){
            require "conexion/conection.php";
            $sql="SELECT `id_usuario`,`hash_confirmacion`` FROM `usuario` WHERE `email`=? LIMIT 1";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("s",$email);
                $stmt->execute();
            

                $resultado=$stmt->get_result();
                
                if(mysqli_num_rows($resultado)==0){
                    return false;
                }else{
                    $row = mysqli_fetch_assoc($resultado);
                    
                    if($row['hash_confirmacion']==$condigoDeValidacion){
                        $id=$row['id_usuario'];
                        $sql2="UPDATE usuario SET hash_confirmacion=NULL,estado=2,habilitado=1 WHERE id_usuario=? ";
                        if($statement=$mysqli->prepare($sql2)){
                            $statement->bind_param("i",$id);
                            $statement->execute();
                            return true;
                        }
                        else{
                            $error = $mysqli->errno . ' ' . $mysqli->error;
                            echo $error;
                        }
                        
                    }else{
                        return false;
                    }

                }
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
        public function dataIngresar($email,$contrasena){
            require "conexion/conection.php";
            $sql="SELECT id_usuario,contrasena,nombre,apellido,documento,tipousuario FROM usuario WHERE email=? AND estado<>0 AND estado<> 3 LIMIT 1";
			
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("s",$email);
                $stmt->execute();

                $resultado=$stmt->get_result();
				
                if(mysqli_num_rows($resultado)==0){
                    return false;
                }else{
                    $row = mysqli_fetch_assoc($resultado);
                    $arr=explode(",",$row['contrasena']);
                    $salt=$arr[1];
                    $pass=$arr[0];

                    $contrasenatemporal=sha1($contrasena.$salt);
                    if($contrasenatemporal==$pass){
                        session_start();
						$sql2="SELECT permisos.id_accion,acciones.descripcion FROM permisos,acciones WHERE permisos.id_accion=acciones.id_accion AND permisos.id_rol=?";
						$stmt=$mysqli->prepare($sql2);
						$stmt->bind_param("i",$row["tipousuario"]);
						$stmt->execute();
						$permisos=array();
						$resultado2=$stmt->get_result();
						while($row2 = $resultado2->fetch_assoc()) {
						   array_push($permisos,$row2["descripcion"]);
						}
						$_SESSION["permisos"]=$permisos;
                        $_SESSION["id"]=$row['id_usuario'];
						$_SESSION["email"]=$email;
                        return true;
                    }else{
                        return false;
                    }

                }
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
        public function obtenerDatosDeUsuario($idUsuario){
            require "conexion/conection.php";
            $sql="SELECT nombre,apellido,email,fotoperfil FROM usuario WHERE id_usuario=?";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("i",$idUsuario);
                $stmt->execute();
                $resultado=$stmt->get_result();
                return $resultado;
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
		//talvez no sirve
		public function modificarDatosUsuario($nombre,$apellido,$telefono,$fotoperfil,$direccion,$provincia,$localidad){
			require "conexion/conection.php";
			$sql="UPDATE USUARIOS SET NOMBRE=?,APELLIDO=?,TELEFONO=?,FOTO_DE_PERFIL=?,DIRECCION=?,PROVINCIA=?,LOCALIDAD=? WHERE idUSUARIO=?";
			
			if($stmt=$mysqli->prepare($sql)){
    			$stmt->bind_param('sssssssi',$nombre,$apellido,$telefono,$fotoperfil,$direccion,$provincia,$localidad,$_SESSION['id']);
    			$stmt->execute();
			}else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
                exit();
            }
		}
		
		public function obtenerUsuarios($paginacion,$orden,$busqueda){
			require "conexion/conection.php";
			$sql="SELECT usuario.id_usuario,usuario.fotoperfil,usuario.nombre,usuario.apellido,usuario.documento,estado.descripcion as descripcionestado,usuario.fechaingreso,rol.descripcion FROM `usuario`,rol,estado WHERE usuario.tipousuario=rol.id_rol AND usuario.estado=estado.id_estado";
			if($stmt=$mysqli->prepare($sql)){
    			$stmt->execute();
				$datos=array();
				$resultado2=$stmt->get_result();
				while($row2 = $resultado2->fetch_assoc()) {
				   array_push($datos,[$row2["fotoperfil"],$row2["nombre"],$row2["apellido"],$row2["documento"],$row2["descripcionestado"],$row2["fechaingreso"],$row2["descripcion"],$row2["id_usuario"]]);
				}
				return $datos;
			}else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
                exit();
            }
		}
		
		public function cambiarestadousuario($idestado,$idusuario){
			require "conexion/conection.php";
			if($idestado==1){
				$habilitado=0;
			}elseif($idestado==2){
				$habilitado=1;
			}
			$sql="UPDATE usuario SET estado=? habilitado=? where id_usuario=?";
			$stmt=$mysqli->prepare($sql);
			$stmt->bind_param('iii',$idestado,$habilitado,$idusuario);
			if($stmt->execute()){
				return "Se ha modificado el usuario con exito";
			}else{
				return "No se ha podido modificar el usuario";
			}
		}

    }


?>
