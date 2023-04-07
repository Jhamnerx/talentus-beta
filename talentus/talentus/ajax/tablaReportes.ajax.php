<?php

require_once "../controladores/reportes.controlador.php";
require_once "../controladores/vehiculos.controlador.php";
require_once "../controladores/flotas.controlador.php";
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/reportes.modelo.php";
require_once "../modelos/vehiculos.modelo.php";
require_once "../modelos/flotas.modelo.php";
require_once "../modelos/usuarios.modelo.php";

class TablaReportes
{

	/*=============================================
  MOSTRAR LA TABLA DE REPORTES
  =============================================*/

	public function mostrarTabla()
	{

		$item = null;
		$valor = null;

		$reportes = ControladorReportes::ctrMostrarReportes($item, $valor);

		if (count($reportes) == 0) {

			$datosJson = '{ "data":[]}';

			echo $datosJson;

			return;
		}

		$datosJson = '{

		  "data": [ ';

		for ($i = 0; $i < count($reportes); $i++) {

			/*=============================================
			REVISAR ESTADO
			=============================================*/

			if ($reportes[$i]["estado"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Por Accionar";
				$estadoReporte = 1;
			}
			if ($reportes[$i]["estado"] == 1) {

				$colorEstado = "btn-warning";
				$textoEstado = "En Espera";
				$estadoReporte = 2;
			}
			if ($reportes[$i]["estado"] == 2) {

				$colorEstado = "btn-success";
				$textoEstado = "Solucionado";
				$estadoReporte = 0;
			}

			$estado = "<label value=" . $textoEstado . " class='btn " . $colorEstado . " btn-xs btnActivar' estadoReporte='" . $estadoReporte . "' idReporte='" . $reportes[$i]["id"] . "'>" . $textoEstado . "</label>";

			$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $reportes[$i]["vehiculo"]);

			//var_dump($vehiculo["placa"]);

			//$flota = ControladorFlotas::ctrMostrarFlotas("id", $vehiculo["flota"]);
			$placa = "No existe";
			$NombreFlota = "Sin flota";
			if ($vehiculo != NULL) {

				$placa = $vehiculo["placa"];
				if ($vehiculo["flota"] != NULL) {

					$flota = ControladorFlotas::ctrMostrarFlotas("id", $vehiculo["flota"]);
					$NombreFlota = $flota["nombre"];
				}
			}

			$usuario = ControladorUsuarios::ctrMostrarUsuarios("id", $reportes[$i]["id_usuario"]);





			// if ($flota != NULL) {

			// 	
			// 	//var_dump($NombreFlota);
			// }

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/


			$acciones = "<div class='btn-group'><button class='btn btn-warning btnVerReporte idUsuario" . $usuario["id"] . "'  placa='" . $placa . "' flota='" . $NombreFlota . "' idReporte='" . $reportes[$i]["id"] . "' data-toggle='modal' data-target='#modalVerReporte'><i class='fa fa-eye'></i></button> <button class='btn btn-danger btnEliminarReporte idReporte" . $reportes[$i]["id"] . "' idReporte='" . $reportes[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";


			$datosJson	 .= '[
				      "' . ($i + 1) . '",
				      "' . $placa . '",
				      "' . $NombreFlota . '",
				      "' . $estado . '",
				      "' . $reportes[$i]["fecha_t"] . '",
				      "' . $reportes[$i]["hora_t"] . '",
				      "' . $reportes[$i]["fecha"] . '",
				      "' . $acciones . '",
				      "' . $reportes[$i]["detalle"] . '",
				      "' . $usuario["nombre"] . '"
				    ],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .=  ']

	}';

		echo $datosJson;
	}
}

/*=============================================
ACTIVAR TABLA DE REPORTES
=============================================*/
$activar = new TablaReportes();
$activar->mostrarTabla();
