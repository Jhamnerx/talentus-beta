<?php


class Utiles{

	static public function diferenciaFechas($fechaInicial, $fechaFinal)
	{
		$dias = (strtotime($fechaInicial)-strtotime($fechaFinal))/(60*60*24);
		// $dias =abs($dias);
		$dias = floor($dias);
		return $dias;
	}

	static public function is_email($str)
	{
	  return (false !== strpos($str, "@") && false !== strpos($str, "."));
	}


/**
 *  Given a file, i.e. /css/base.css, replaces it with a string containing the
 *  file's mtime, i.e. /css/base.1221534296.css.
 *
 *  @param $file  The file to be loaded.  Must be an absolute path (i.e.
 *                starting with slash).
 */

	static public function auto_version($url){

	    $path = pathinfo($url);

	    if (file_exists($url)) {
	   		$ver = '.'.filemtime($url).'.';
	    	echo $path['dirname'].'/'.str_replace('.', $ver, $path['basename']);
	    }else{
	    	echo $url;
	    }

	}


	static public function versionFile($url){

	    $path = pathinfo($url);

	    if (file_exists($url)) {
	   		$ver = '.'.filemtime($url).'.';
	    	return $path['dirname'].'/'.str_replace('.', $ver, $path['basename']);
	    }else{
	    	return $url;
	    }

	}

	static public function SubirImagen($valor, $idTareaImagen){


		/*=============================================
		SUBIR IMAGEN
		=============================================*/	

		$valorNuevo = $valor;

		if(isset($valor["tmp_name"])){

			list($ancho, $alto) = getimagesize($valor["tmp_name"]);

			/*=============================================
			CAMBIANDO LOGOTIPO
			=============================================*/	
			$nuevoAncho = 1200;
			$nuevoAlto = 350;

			$destino = imagecreatetruecolor($ancho, $alto);

			if($valor["type"] == "image/jpeg"){

				$ruta = "../vistas/img/tecnico/imagen_".$idTareaImagen.".jpg";

				$origen = imagecreatefromjpeg($valor["tmp_name"]);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

				imagejpeg($destino, $ruta);

			}

			if($valor["type"] == "image/png"){

				$ruta = "../vistas/img/tecnico/imagen_".$idTareaImagen.".png";

				$origen = imagecreatefrompng($valor["tmp_name"]);

				imagealphablending($destino, FALSE);

				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

				imagepng($destino, $ruta);

			}

			



			$valorNuevo = substr($ruta, 3);

		}


		return $valorNuevo;

	}

}






 ?>
