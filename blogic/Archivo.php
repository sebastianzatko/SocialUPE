<?php
	include_once('cdata/dataarchivo.php');
	class Archivo{
		public function subirarchivo($archivo,$idgrupo,$idusuario){
			$ruta='files/groups/'.$idgrupo."/";
			$rutadb='files/groups/'.$idgrupo."/";
			mkdir($ruta,0777,true);//tal vez no hace falta
			$archivox=$ruta.$archivo["name"];
			@move_uploaded_file($fotoperfil["tmp_name"],$archivo);
			$archivox="includes/php/".$rutadb.$archivo["name"];
			
			$file=new dataArchivo();
			$result=$file->subirarchivo($archivox,$archivo["name"],$idgrupo,$idusuario);
			return result;
			
		}
		public function eliminararchivo($idarchivo){
			
		}
		public function obtenerarchivos($idgrupo);
	}


?>