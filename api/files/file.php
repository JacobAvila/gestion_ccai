<?php
class File{
	
	var $handle;
	var $handle2;

	function crearDirectorio($nombre){
		$creo = FALSE;
		if(!is_dir($nombre)){
			$creo = mkdir($nombre, 0777);
			$creo = chmod($nombre, 0777);
		}
		return $creo;
	}
	
	function borrarArchivo($nombre){
	
		if(is_file($nombre))
			return unlink($nombre);
	
	}
	
	function uploadFile($file, $destino, $nombre){
	
		$name = $destino."/".$nombre;
		
		$subio = TRUE;
		
		if (is_uploaded_file($file['tmp_name'])) 
		{
			move_uploaded_file($file['tmp_name'], $name);
			chmod($name, 0644);
		} 
		else
			$subio = FALSE;
	
		return $subio;
	
	}
	
	function datosBinariosArchivo($arch){
		
		$file = fopen($arch,'rb'); 
		$data = fread($file, filesize($arch)); 
		fclose($file); 
		$data = chunk_split(base64_encode($data)); 
	
		return $data;
	}
	
	function crearArchivo($path, $nombre, $contenido){
		$file = fopen($path."/".$nombre, 'w');
		fwrite($file, $contenido);
		fclose($file);
	}
	function leerArchivo($path, $nombre){
		$file = fopen($path."/".$nombre, 'r');
		$contenido = fread($file, filesize($path."/".$nombre));
		fclose($file);
		
		return $contenido;
	}
	
	function openFileR($path, $nombre){
		$this->handle = fopen($path."/".$nombre, 'r');	
	}
	function openFileW($path, $nombre){
		$this->handle2 = fopen($path."/".$nombre, 'a');	
	}
	function leerLineaArchivoCSV(){
		return fgetcsv($this->handle);
	}
	function escribirLineaArchivoCSV($linea){
		fputcsv($this->handle2, $linea);
	}
	function cerrarR(){
		fclose($this->handle);
	}
	function cerrarW(){
		fclose($this->handle2);
	}
	function leerArchivos($path){
		$dir = dir($path);
		$archivos = array();
		while($arch = $dir->read()){
			$archivos[count($archivos)] = $arch;
		}
		$dir->close();
		return $archivos;
	}
	
	function agregarAlArchivo($archivo, $contenido){
		$file = fopen($archivo, 'a');
		fwrite($file, $contenido);
		fclose($file);
	}
	
	function postBackgroung($url){
		$partes = parse_url($url);
		
		$fp = fsockopen($partes['host'], 80, $errorno, $errorstr, 30);
		
		if(!$fp){
			return false;
		}else{
			$out  = "POST ".$partes['path']." HTTP/1.1\r\n";
			$out .= "Host: ".$partes['host']."\r\n";
			$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$out .= "Content-Length: ".strlen($partes['query'])."\r\n";
			$out .= "Connection: Close\r\n\r\n";
			
			if(isset($partes['query']))
				$out .= $partes['query'];
			
			fwrite($fp, $out);
			fclose($fp);
			
			return true;
		}
	}
}

?>
