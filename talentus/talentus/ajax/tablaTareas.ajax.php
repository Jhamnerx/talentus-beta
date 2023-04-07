<?php
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
require_once "../controladores/tarea.controlador.php";
require_once "../controladores/dispositivos.controlador.php";
require_once "../controladores/vehiculos.controlador.php";
require_once "../controladores/usuarios.controlador.php";

require_once "../modelos/tarea.modelo.php";
require_once "../modelos/dispositivos.modelo.php";
require_once "../modelos/vehiculos.modelo.php";
require_once "../modelos/usuarios.modelo.php";

class TablaTarea{

  /*=============================================
  MOSTRAR LA TABLA DE TAREAS TERMINADAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$tareas = ModeloTarea::mdlMostrarTareas("tareas", "estado", "2");
 	
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
    $usuarios = ControladorUsuarios::ctrMostrarUsuarios("id", $tareas[$i]["id_admin"]);

			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if($tareas[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Cancelada";

			}if($tareas[$i]["estado"] == 1){

				$colorEstado = "btn-warning";
				$textoEstado = "En Proceso";

			}if($tareas[$i]["estado"] == 2){
				$colorEstado = "btn-success";
				$textoEstado = "Terminada";
			}

		 	$estado = "<label value=".$textoEstado." class='btn ".$colorEstado." btn-xs btnActivar' idTarea='".$tareas[$i]["id"]."'>".$textoEstado."</label>";

      if ($vehiculo) {

      	$placa = $vehiculo["placa"];

      }else{

      	$placa = "'unidad eliminada'";
      }

      if ($dispositivo) {

      	$modelo = $dispositivo["modelo"];
      }else{

      	$modelo = "modelo no encontrado";

      }


          $fecha = iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($tareas[$i]["fecha"])));
          $descripcion = "<p>".$tipo["tipo"]." de GPS ".$modelo." en el vehiculo ".$placa.",</p> <p>Fecha y Hora de instalacion ".$fecha." ".$tareas[$i]["hora"]."</p>";


        $fechaMod = iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($tareas[$i]["fecha_mod"])));

        $hora = (explode(" ",$tareas[$i]["fecha_mod"]));

        $horaMod = iconv('ISO-8859-2', 'UTF-8', strftime("%g:%M", strtotime($hora[1])));

			if ($tareas[$i]["imagen"] != "") {

				$imagen = "<a class='image-popup-vertical-fit' href='".$tareas[$i]["imagen"]."' title='Ver imagen'><img src='".$tareas[$i]["imagen"]."' width='75' height='75'></a>";

			}else{

      			$imagen = "<div class='form-group'>  <input type='file' id='subirTecnico' idTarea='".$tareas[$i]["id"]."' class='fotoTecnico' name='fotoTecnico' accept='image/x-png,image/jpeg'> </div>";


			}
			if ($tareas[$i]["respuesta"] == 1) {

				$validacion = "<img src='vistas/img/plantilla/valid.png' width='30'>";
			}else{

				$validacion = "<img src='vistas/img/plantilla/invalid.png' width='30'>";
			}
			

	    $informacion = "<p>Tarea <label value=".$textoEstado." class='btn ".$colorEstado." btn-xs btnActivar' idTarea='".$tareas[$i]["id"]."'>".$textoEstado."</label> el Dia ".$fechaMod." Hora: ".$horaMod."</p>";

		        /*=============================================
		  		CREAR LAS ACCIONES
		  		=============================================*/

			$acciones = "<div class='btn-group'> <div class='tooltipb'> <button idTarea='".$tareas[$i]["id"]."' placa='".$placa."' tipoTarea='".$tipo["tipo"]."' dispositivo='".$modelo."' fecha='".$tareas[$i]["fecha"]."' class='btn btn-info btnEnviarMensaje'><i class='fa fa-share-square'></i> </button> <span class='tooltipbtext'>Enviar Mensaje</span></div></div>";

		if ($usuarios) {
			$name = $usuarios["nombre"];

		}else{

			$name = "no existe";
		}

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$tipo["tipo"].'",
				      "'.$name.'",
				      "'.$descripcion.'",
				      "'.$informacion.'",
				      "'.$acciones.'",
				      "'.$imagen.'",
				      "'.$validacion.'"
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