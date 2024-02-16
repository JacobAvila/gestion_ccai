<?php

class Image{
	
	function eliminaEspacios($nombre){
	
		$datos = explode(" ", $nombre);
		$nuevo = "";
		for($i= 0; $i < count($datos); $i++){
			$nuevo .= $datos[$i];
			$j = $i + 1;
			if(($datos[$j] != NULL) || ($datos[$j] != ""))
				$nuevo .= "_";
		}
		return $nuevo;
	}
	
	function createThumbnail($sourceImagePath, $thumbImagePath, $thumbWidth, $thumbHeigth){
	
		$datosImg = getimagesize($sourceImagePath);
		
		$thumb = imagecreatetruecolor($thumbWidth, $thumbHeigth);
		imagesavealpha($thumb, true);
		$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
    	imagefill($thumb, 0, 0, $trans_colour);
		imagecolorallocate($thumb, 255, 0, 0);
		
		switch($datosImg[2]){
			case IMAGETYPE_JPEG:
				$source = imagecreatefromjpeg($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagejpeg($thumb, $thumbImagePath, 100);
				break;
			case IMAGETYPE_GIF:
				$source = imagecreatefromgif($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagesavealpha($thumb, true);
				$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
				imagecolortransparent ($thumb, $trans_colour);
				imagefill($thumb, 0, 0, $trans_colour);
				imagegif($thumb, $thumbImagePath);
				break;
			case IMAGETYPE_PNG:
				/*
				$source = imagecreatefrompng($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagesavealpha($thumb, true);
				$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
				imagefill($thumb, 0, 0, $trans_colour);
				imagepng($thumb, $thumbImagePath, 100);
				*/
				break;
			case IMAGETYPE_BMP:
				$source = imagecreatefromwbmp($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagewbmp($thumb, $thumbImagePath, 100);
				break;
		}
	
	
	}
	
	function reduceSize($sourceImagePath, $thumbImagePath, $thumbWidth, $thumbHeigth){
	
		$datosImg = getimagesize($sourceImagePath);
		
		$thumb = imagecreatetruecolor($thumbWidth, $thumbHeigth);
		imagesavealpha($thumb, true);
		$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
    	imagefill($thumb, 0, 0, $trans_colour);
		imagecolorallocate($thumb, 255, 0, 0);
		
		switch($datosImg[2]){
			case IMAGETYPE_JPEG:
				$source = imagecreatefromjpeg($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagejpeg($thumb, $thumbImagePath, 100);
				break;
			case IMAGETYPE_GIF:
				$source = imagecreatefromgif($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagesavealpha($thumb, true);
				$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
				imagecolortransparent ($thumb, $trans_colour);
				imagefill($thumb, 0, 0, $trans_colour);
				imagegif($thumb, $thumbImagePath);
				break;
			case IMAGETYPE_PNG:
				/*
				$source = imagecreatefrompng($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagesavealpha($thumb, true);
				$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
				imagefill($thumb, 0, 0, $trans_colour);
				imagepng($thumb, $thumbImagePath, 100);
				*/
				break;
			case IMAGETYPE_BMP:
				$source = imagecreatefromwbmp($sourceImagePath);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeigth, $datosImg[0], $datosImg[1]);
				imagewbmp($thumb, $thumbImagePath, 100);
				break;
		}
	
	
	}

}
?>