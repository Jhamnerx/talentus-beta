<?php

require_once "../controladores/lineas.controlador.php";
require_once "../controladores/flotas.controlador.php";

require_once "../modelos/lineas.modelo.php";
require_once "../modelos/vehiculos.modelo.php";
require_once "../modelos/flotas.modelo.php";

class TablaLineas
{

	/*=============================================
  MOSTRAR LA TABLA DE LINEAS
  =============================================*/

	public function mostrarTabla()
	{

		$item = null;
		$valor = null;

		$lineas = ControladorLineas::ctrMostrarLineas($item, $valor);

		if (count($lineas) == 0) {

			$datosJson = '{ "data":[]}';

			echo $datosJson;

			return;
		}

		$datosJson = '{

		  "data": [ ';

		for ($i = 0; $i < count($lineas); $i++) {

			/*=============================================
		REVISAR ESTADO
		=============================================*/

			if ($lineas[$i]["estado"] == 1) {

				$colorEstado = "danger";
				$textoEstado = "Suspendido";
			}
			if ($lineas[$i]["estado"] == 0) {

				$colorEstado = "success";
				$textoEstado = "Libre";
			}
			if ($lineas[$i]["estado"] == 2) {

				$colorEstado = "info";
				$textoEstado = "Ocupado";
			}

			$estado = "<div style='padding: 5px; margin-bottom: 10px; text-align: center' class='alert alert-" . $colorEstado . "'> " . $textoEstado . " </div>";

			/*=============================================
		CREAR LAS ACCIONES
		=============================================*/


			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarLinea' idLinea='" . $lineas[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarLinea'><i class='fa fa-pencil'></i></button></div>";
			$numero = "";
			$sim_card = "";
			$vehiculo = ModeloVehiculos::mdlMostrarVehiculos("vehiculo", "id", $lineas[$i]["id_vehiculo"]);
			$placa = "Sin Asignar";

			if ($lineas[$i]["numero"] != "") {

				$numero = $lineas[$i]["numero"];
			}
			if ($lineas[$i]["sim_card"] != "") {

				$sim_card = $lineas[$i]["sim_card"];
			}
			if ($vehiculo) {

				$flota = ControladorFlotas::ctrMostrarFlotas("id", $vehiculo["flota"]);

				$placa = "<b>" . $flota["nombre"] . "</b><br> " . $vehiculo["placa"];
			}

			//$cambios = ControladorLineas::ctrMostrarCambiosLinea("id_linea", $lineas[$i]["id"]);

			$vercambios = "<div class='btn-group'><div class='tooltipb'><button class='btn btn-success btnVerCambiosLinea tooltipb' idLinea='" . $lineas[$i]["id"] . "' data-toggle='modal' data-target='#modalVerCambiosLinea'><i class='fa fa-eye'></i> </button><span class='tooltipbtext'>Ver Cambios</span></div> <div class='tooltipb'><button class='btn btn-warning btnRegistrarCambiosLinea tooltipb' idLinea='" . $lineas[$i]["id"] . "' data-toggle='modal' data-target='#modalRegistrarCambiosLinea'><i class='fa fa-file'></i> </button><span class='tooltipbtext'>Registrar Cambios</span></div></div>";


			$datosJson	 .= '[
				      "' . ($i + 1) . '",
				      "' . $numero . '",
				      "' . $sim_card . '",
				      "' . $placa . '",
				      "' . $lineas[$i]["operador"] . '",
				      "' . $estado . '",
				      "' . $vercambios . '",
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
ACTIVAR TABLA DE LINEAS
=============================================*/
$activar = new TablaLineas();
$activar->mostrarTabla();
