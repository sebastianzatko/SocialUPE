<?php
	include_once('cdata/dataarchivo.php');
	class Archivo{
		public function subirarchivo($archivo,$idgrupo,$idusuario){
			$ruta='files/groups/'.$idgrupo."/";
			$rutadb='files/groups/'.$idgrupo."/";
			mkdir($ruta,0777,true);//tal vez no hace falta
			$archivox=$ruta.$archivo["name"];
			@move_uploaded_file($archivo["tmp_name"],$archivox);
			$archivox="includes/php/".$rutadb.$archivo["name"];
			
			$file=new dataArchivo();
			$result=$file->subirarchivo($archivox,$archivo["name"],$idgrupo,$idusuario);
			return $result;
			
		}
		public function eliminararchivo($idarchivo){
			$file=new dataArchivo();
			$result=$file->eliminararchivo($idarchivo);
			return $result;
		}
		public function obtenerarchivos($idgrupo){
			$filezillaxD=new dataArchivo();
			$data=$filezillaxD->obtenerarchivos($idgrupo);
			return $data;
		}
	}


?>