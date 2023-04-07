<?php
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
require_once "../controladores/tarea.controlador.php";
require_once "../controladores/dispositivos.controlador.php";
require_once "../controladores/vehiculos.controlador.php";
require_once "../controladores/flotas.controlador.php";
require_once "../controladores/persona.controlador.php";


require_once "../modelos/tarea.modelo.php";
require_once "../modelos/dispositivos.modelo.php";
require_once "../modelos/vehiculos.modelo.php";
require_once "../modelos/flotas.modelo.php";
require_once "../modelos/persona.modelo.php";

class TablaTarea{

  /*=============================================
  MOSTRAR LA TABLA DE TAREAS TERMINADAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$tareas = ModeloTarea::mdlMostrarTareas("tareas", null, null);
 	
 	if(count($tareas) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($tareas); $i++){

		$dispositivo = ControladorDispositivos::ctrMostrarDispositivos("id", $tareas[$i]["dispositivo"]);
		$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $tareas[$i]["vehiculo"]);	
    $tipo = ControladorTareas::ctrMostrarTipoTareas("id", $tareas[$i]["tipo"]);



			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

      if ($tareas[$i]["estado"] == 0) {
        
        $estadoTarea = "<span class='label label-danger'>Cancelada</span>";


      }if ($tareas[$i]["estado"] == 1) {

        $estadoTarea = "<span class='label label-warning'>En Progreso</span>";

      }if ($tareas[$i]["estado"] == 2) {

        $estadoTarea = "<span class='label label-success'>Completada</span>";

      }

      if ($tareas[$i]["leido"] == 0) {

        $estadoTarea = "<span class='label label-info'>Sin Leer</span>";

      }

      if ($vehiculo) {

      	$placa = $vehiculo["placa"];
      	
				$flota = ControladorFlotas::ctrMostrarFlotas("id", $vehiculo["flota"]);
				$cliente = ControladorPersona::ctrMostrarPersona("id", $flota["idcliente"], 1);

      }else{

      	$placa = "'unidad eliminada'";
      }


      if ($dispositivo) {

      	$modelo = $dispositivo["modelo"];
      }else{

      	$modelo = "modelo no encontrado";

      }

      if ($cliente) {
      	if ($cliente["apellido"] == "") {

      	  $empresa = $cliente["nombre"];

	      }else{

	      	$empresa = $cliente["nombre"]." ".$cliente["apellido"];


	      }
      }else{

      	$empresa = "No existe datos [Actualizar]";
      }


      $fecha = iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($tareas[$i]["fecha"]))).'</p>';

          
      $descripcion = "<p>".$tipo["tipo"]." de GPS ".$modelo." en el vehiculo ".$placa.",</p> <p>Fecha y Hora de instalacion ".$fecha." ".$tareas[$i]["hora"]."</p>";
          
          $tareaT = "Instalar GPS";
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarTarea' idTarea='".$tareas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarTarea'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTarea' idTarea='".$tareas[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";


  			$notificar = "<div class='tooltipb'> <button id='btnNotificarTecnico' idTarea='".$tareas[$i]["id"]."' placa='".$placa."' tipoTarea='".$tipo["tipo"]."' dispositivo='".$modelo."' cliente='".$empresa."' fecha='".$tareas[$i]["fecha"]."' hora='".$tareas[$i]["hora"]."' class='btn btn-success btnNotificarTecnico'><i class='fa fa-whatsapp'></i> </button> <span class='tooltipbtext'>Notificar Tecnico</span></div>";

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$descripcion.'",
				      "'.$estadoTarea.'",
				      "S/ '.$tipo["costo"].'",
				      "'.$acciones.'",
				      "'.$notificar.'"
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
$activar = new TablaTarea();
$activar -> mostrarTabla();