<?php

require_once "../controladores/mensajes.controlador.php";
require_once "../modelos/mensajes.modelo.php";

class TablaMensajes{

  /*=============================================
  MOSTRAR LA TABLA DE MENSAJES
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$mensajes = ControladorMensajes::ctrMostrarMensajes($item, $valor);	
 	
 	if(count($mensajes) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($mensajes); $i++){
	
	    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$mensajes[$i]["nombre"].'",
				      "'.$mensajes[$i]["email"].'",
				      "'.$mensajes[$i]["empresa"].'",
				      "'.$mensajes[$i]["telefono"].'",
				      "'.$mensajes[$i]["mensaje"].'",
				      "'.$mensajes[$i]["fecha"].'"
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE MENSAJES
=============================================*/ 
$activar = new TablaMensajes();
$activar -> mostrarTabla();