<?php

require_once "../controladores/gps.controlador.php";
require_once "../controladores/dispositivos.controlador.php";
require_once "../controladores/vehiculos.controlador.php";
require_once "../modelos/gps.modelo.php";
require_once "../modelos/dispositivos.modelo.php";
require_once "../modelos/vehiculos.modelo.php";
class TablaGps
{

    /*=============================================
  MOSTRAR LA TABLA DE GPS
  =============================================*/

    public function mostrarTabla()
    {

        $item = null;
        $valor = null;

        $gps = ControladorGps::ctrMostrarGps($item, $valor);

        if (count($gps) == 0) {

            $datosJson = '{ "data":[]}';

            echo $datosJson;

            return;
        }

        $datosJson = '{
		 
		  "data": [ ';

        for ($i = 0; $i < count($gps); $i++) {

            /*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/



            $acciones = "<div class='btn-group'><button class='btn btn-danger btnEliminarGps idGps" . $gps[$i]["id"] . "' idGps='" . $gps[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
            $dispositivo = ControladorDispositivos::ctrMostrarDispositivos("id", $gps[$i]["modelo"]);
            $vehiculo = ControladorVehiculos::ctrMostrarVehiculos("idgps", $gps[$i]["imei"]);

            if ($vehiculo) {

                $estado = "<div style='padding: 5px; margin-bottom: 10px; text-align: center' class='alert alert-danger'> " . $vehiculo["placa"] . " </div>";
                $placa = $vehiculo["placa"];
            } else {

                $estado = "<div style='padding: 5px; margin-bottom: 10px; text-align: center' class='alert alert-success'> Libre </div>";
                $placa = "Libre";
            }

            $datosJson     .= '[
				      "' . ($i + 1) . '",
				      "' . $gps[$i]["imei"] . '",
				      "' . $dispositivo["modelo"] . '",
				      "' . $dispositivo["marca"] . '",
                      "' . $estado . '",
				      "' . $acciones . '"
				    ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=  ']
		  
	}';

        echo $datosJson;
    }
}

/*=============================================
ACTIVAR TABLA DE GPS
=============================================*/
$activar = new TablaGps();
$activar->mostrarTabla();
