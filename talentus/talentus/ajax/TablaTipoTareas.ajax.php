<?php

require_once "../controladores/tarea.controlador.php";
require_once "../modelos/tarea.modelo.php";

class TablaTareas{

  /*=============================================
  MOSTRAR LA TABLA DE TAREAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$Tareas = ControladorTareas::ctrMostrarTipoTareas($item, $valor);	
 	
 	if(count($Tareas) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($Tareas); $i++){


			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarTipoTarea' idTipoTarea='".$Tareas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarTipoTarea'><i class='fa fa-pencil'></i></button></div>";






			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$Tareas[$i]["tipo"].'",
				      "S/ '.$Tareas[$i]["costo"].'",
				      "'.$acciones.'"
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE TAREAS
=============================================*/ 
$activar = new TablaTareas();
$activar -> mostrarTabla();