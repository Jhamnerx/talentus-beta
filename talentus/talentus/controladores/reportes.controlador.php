<?php

class ControladorReportes
{

	/*=============================================
	MOSTRAR REPORTES
	=============================================*/

	static public function ctrMostrarReportes($item, $valor)
	{

		$tabla = "reportes";

		$respuesta = ModeloReportes::mdlMostrarReportes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR DETALLES
	=============================================*/

	static public function ctrMostrarDetallesReportes($item, $valor)
	{

		$tabla = "reporte_detalle";

		$respuesta = ModeloReportes::mdlMostrarDetalleReportes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	CREAR REPORTES
	=============================================*/

	static public function ctrCrearReporte()
	{

		if (isset($_POST["idvehiculoreporte"])) {
			$datos = array(
				"vehiculo" => trim(strtoupper($_POST["idvehiculoreporte"])),
				"fecha_t" => trim($_POST["fechaReporte"]),
				"hora_t" => trim($_POST["horaReporte"]),
				"fecha" => date('d-m-Y'),
				"detalle" => trim($_POST["descripcionReporte"]),
				"usuario" => $_SESSION["idUsuario"]
			);

			$respuesta = ModeloReportes::mdlIngresarReporte("reportes", $datos);

			if ($respuesta == 1) {

				echo '<script>

					swal({
						  type: "success",
						  title: "El reporte se guardo",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

					</script>';
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡No se pudo guardar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

				return;
			}
		}
	}

	/*=============================================
	CREAR DETALLE REPORTES
	=============================================*/

	static public function ctrCrearDetalleReporte()
	{

		if (isset($_POST["idReporteEditar"])) {
			$datos = array(
				"id_reporte" => trim(strtoupper($_POST["idReporteEditar"])),
				"detalle" => trim($_POST["accionReporte"])
			);

			$datos1 = array(
				"id_reporte" => trim(strtoupper($_POST["idReporteEditar"])),
				"detalle" => trim($_POST["informeReporte"]),
				"usuario" => $_SESSION["idUsuario"],
				"fechaReporte" => $_POST["fechaReporteEditar"],
				"horaReporte" => $_POST["horaReporteEditar"]

			);

			$respuesta = ModeloReportes::mdlIngresarDetalleReporte("reporte_detalle", $datos);

			$editar = ModeloReportes::mdlEditarReporte("reportes", $datos1);

			if ($respuesta == 1) {

				echo '<script>

					swal({
						  type: "success",
						  title: "El reporte se guardo",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "reporte";

							}
						})

					</script>';
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡No se pudo guardar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

				return;
			}
		}
	}


	/*=============================================
	EDITAR REPORTES NO SIRVE
	=============================================*/

	static public function ctrEditarReporte()
	{

		if (isset($_POST["editarNombreReporte"])) {

			$datos = array(
				"vehiculo" => trim(strtoupper($_POST["idvehiculoreporte"])),
				"id" => trim($_POST["idReporte"]),
				"fecha_t" => trim($_POST["fechaReporteEditar"]),
				"hora_t" => trim($_POST["horaReporteEditar"]),
				"detalle" => trim($_POST["descripcionReporte"]),
				"usuario" => $_SESSION["idUsuario"]
			);

			$respuesta = ModeloReportes::mdlEditarReporte("reportes", $datos);


			if ($respuesta == 1) {

				echo '<script>

				swal({
					  type: "success",
					  title: "El reporte ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "reporte";

						}
					})

				</script>';
			}
		}
	}


	/*=============================================
	ELIMINAR REPORTE
	=============================================*/

	static public function ctrEliminarReporte()
	{

		if (isset($_GET["idReporte"])) {


			$respuesta = ModeloReportes::mdlEliminarReporte("reportes", $_GET["idReporte"]);


			if ($respuesta == 1) {

				echo '<script>
				swal({
					  type: "success",
					  title: "El reporte ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "reporte";

								}
							})

				</script>';
			}
		}
	}
}
