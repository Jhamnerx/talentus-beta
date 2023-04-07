<?php

class ControladorLineas
{

	/*=============================================
	MOSTRAR VEHICULOS AYUDA
	=============================================*/

	static public function ctrMostrarVehiculos()
	{
		$vehiculos = [];

		$respuesta = ModeloVehiculos::mdlMostrarVehiculos("vehiculo", null, null);

		if ($respuesta) {

			for ($i = 0; $i < count($respuesta); $i++) {

				$vehiculos += [$respuesta[$i]['id'] => $respuesta[$i]['placa']];
			}
			// $texto = substr($texto, 0, -1);
			// $texto.='}';

		}
		return json_encode($vehiculos);
	}

	/*=============================================
	MOSTRAR LINEA
	=============================================*/

	static public function ctrMostrarLineas($item, $valor)
	{

		$tabla = "lineas";

		$respuesta = ModeloLineas::mdlMostrarLineas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR CAMBIOS DE LINEA
	=============================================*/

	static public function ctrMostrarCambiosLineas($item, $valor)
	{

		$tabla = "cambios_lineas";

		$respuesta = ModeloLineas::mdlMostrarCambiosLineas($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CAMBIOS LINEA
	=============================================*/

	static public function ctrMostrarCambiosLinea($item, $valor)
	{

		$tabla = "cambios_lineas";

		$respuesta = ModeloLineas::mdlMostrarCambiosLineas($tabla, $item, $valor);

		return $respuesta;
	}



	/*=============================================
	CREAR LINEA
	=============================================*/

	static public function ctrCrearLinea()
	{

		if (isset($_POST["numeroLinea"])) {

			$datos = array(
				"numero" => $_POST["numeroLinea"],
				"sim_card" => $_POST["sim_card"],
				"placa" => $_POST["placaLinea"],
				"operador" => $_POST["operadorLinea"],
				"estado" => $_POST["estadoLinea"]
			);

			//echo json_encode($datosCambio);


			$respuesta = ModeloLineas::mdlIngresarLinea("lineas", $datos);

			$tipo_cambio = $_POST["cambio"];

			if (!empty($_POST["idplaca_nueva"]) && !empty($_POST["sim_card_nuevo"]) || $_POST["cambio"] == "1") {

				$datosCambio = array(
					"tipo_cambio" => $tipo_cambio,
					"sim_card" => $_POST["sim_card_nuevo"],
					"numero" => $_POST["numero_nuevo"],
					"fecha_suspencion" => $_POST["fechaInicio"],
					"fecha_suspencion_fin" => $_POST["fechaFin"],
					"id_linea" => $respuesta,
					"placa" => $_POST["idplaca_nueva"],
					"usuario" => $_SESSION["id"]
				);



				$cambios = ModeloLineas::mdlIngresarCambios("cambios_lineas", $datosCambio);

				if ($cambios == 1) {

					echo '<script>
	
					swal({
							type: "success",
							title: "Linea Registrada con Cambios",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							if (result.value) {
	
							window.location = "lineas";
	
							}
						})
	
					</script>';
				} else {

					echo '<script>
	
						swal({
								type: "error",
								title: "¡No se ha podido registrar!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								})
	
					</script>';

					return;
				}
			} else {

				if ($respuesta) {

					echo '<script>
	
					swal({
							type: "success",
							title: "Linea Registrada",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							if (result.value) {
	
							window.location = "lineas";
	
							}
						})
	
					</script>';
				} else {

					echo '<script>
	
						swal({
								type: "error",
								title: "¡No se ha podido registrar!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								})
	
					</script>';

					return;
				}
			}
		}
	}



	/*=============================================
	EDITAR LINEA
	=============================================*/

	static public function ctrEditarLinea()
	{

		if (isset($_POST["editarNumeroLinea"])) {

			$datos = array(
				"id" => $_POST["idEditarLinea"],
				"numero" => $_POST["editarNumeroLinea"],
				"sim_card" => $_POST["editarSim_card"],
				"placa" => $_POST["editarPlacaLinea"],
				"operador" => $_POST["editarOperadorLinea"],
				"estado" => $_POST["editarEstadoLinea"]
			);

			//echo json_encode($datos);


			$respuesta = ModeloLineas::mdlEditarLinea("lineas", $datos);

			var_dump($respuesta);


			if ($respuesta != "") {

				echo '<script>

				swal({
					  type: "success",
					  title: "Linea ' . $respuesta . ' Guardada",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "lineas";

						}
					})

				</script>';
			}
		}
	}


	/*=============================================
	REGISTRAR CAMBIOS LINEA
	=============================================*/

	static public function ctrRegistrarCambiosLinea()
	{

		if (isset($_POST["idVerLinea"])) {

			switch ($_POST["addCambioTipo"]) {
				case '0':
					//	cambio numero
					if ($_POST["idplaca_nueva"]) {
						$datos = array(
							"id_linea" => $_POST["idVerLinea"],
							"tipo_cambio" => $_POST["addCambioTipo"],
							"placa" => $_POST["idPlacaLinea"],
							"sim_card" => $_POST["AddSimCard"],
							"numero" => $_POST["verNumeroLinea"],
							"fecha_suspencion" => $_POST["addFechaInicio"],
							"fecha_suspencion_fin" => $_POST["addFechaFin"],
							"usuario" => $_SESSION["id"]
						);

						$cambio = ModeloLineas::mdlActualizar("lineas", "numero", $_POST["addNumero"], "id", $_POST["idVerLinea"]);
						$respuesta = ModeloLineas::mdlIngresarCambios("cambios_lineas", $datos);
						$cambio2 = ModeloLineas::mdlActualizar("lineas", "id_vehiculo", $_POST["idplaca_nueva"], "id", $_POST["idVerLinea"]);
					} else {

						$datos = array(
							"id_linea" => $_POST["idVerLinea"],
							"tipo_cambio" => $_POST["addCambioTipo"],
							"placa" => $_POST["idplaca_nueva"],
							"sim_card" => $_POST["AddSimCard"],
							"numero" => $_POST["verNumeroLinea"],
							"fecha_suspencion" => $_POST["addFechaInicio"],
							"fecha_suspencion_fin" => $_POST["addFechaFin"],
							"usuario" => $_SESSION["id"]
						);

						$cambio = ModeloLineas::mdlActualizar("lineas", "numero", $_POST["addNumero"], "id", $_POST["idVerLinea"]);
						$respuesta = ModeloLineas::mdlIngresarCambios("cambios_lineas", $datos);
					}


					break;
				case '1':
					//cambio suspencion
					$datos = array(
						"id_linea" => $_POST["idVerLinea"],
						"tipo_cambio" => $_POST["addCambioTipo"],
						"placa" => $_POST["idplaca_nueva"],
						"sim_card" => $_POST["AddSimCard"],
						"numero" => $_POST["addNumero"],
						"fecha_suspencion" => $_POST["addFechaInicio"],
						"fecha_suspencion_fin" => $_POST["addFechaFin"],
						"usuario" => $_SESSION["id"]
					);
					$respuesta = ModeloLineas::mdlIngresarCambios("cambios_lineas", $datos);
					break;
				case '2':
					// cambio sim card
					$datos = array(
						"id_linea" => $_POST["idVerLinea"],
						"tipo_cambio" => $_POST["addCambioTipo"],
						"placa" => $_POST["idPlacaLinea"],
						"sim_card" => $_POST["verSimCard"],
						"numero" => $_POST["addNumero"],
						"fecha_suspencion" => $_POST["addFechaInicio"],
						"fecha_suspencion_fin" => $_POST["addFechaFin"],
						"usuario" => $_SESSION["id"]
					);
					$cambio = ModeloLineas::mdlActualizar("lineas", "sim_card", $_POST["AddSimCard"], "id", $_POST["idVerLinea"]);
					$cambio2 = ModeloLineas::mdlActualizar("lineas", "id_vehiculo", $_POST["idplaca_nueva"], "id", $_POST["idVerLinea"]);

					$respuesta = ModeloLineas::mdlIngresarCambios("cambios_lineas", $datos);
					break;
			}

			//echo json_encode($datos);

			if ($respuesta != "") {

				echo '<script>

				swal({
					  type: "success",
					  title: "Linea ' . $respuesta . ' Guardada",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "lineas";

						}
					})

				</script>';
			}
		}
	}
}
