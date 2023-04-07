<?php

class ControladorPersona
{

	/*=============================================
	MOSTRAR PERSONA
	=============================================*/

	static public function ctrMostrarPersona($item, $valor, $count)
	{

		$tabla = "persona";

		$respuesta = ModeloPersona::mdlMostrarPersona($tabla, $item, $valor, $count);

		return $respuesta;
	}


	/*=============================================
	CREAR PERSONA
	=============================================*/

	static public function ctrGuardarPersona($datos)
	{

		if (isset($datos["nombre"])) {

			$tabla = "persona";

			$respuesta = ModeloPersona::mdlGuardarPersona($tabla, $datos);

			// if ($respuesta) {

			// 	$datosFlota = array("flota"=>strtoupper($datos["nombre"]),
			// 	"cliente"=>$respuesta,
			// 	"estado"=> 1);

			// 	$flotaRespuesta = ModeloFlotas::mdlIngresarFlota("flota", $datosFlota);

			// }


			return $respuesta;
		}
	}

	/*=============================================
	EITAR PERSONA
	=============================================*/

	static public function ctrEditarPersona($datos)
	{

		if (isset($datos["idPersona"])) {

			$tabla = "persona";

			$respuesta = ModeloPersona::mdlEditarPersona($tabla, $datos);

			return $respuesta;
		}
	}
	/*=============================================
	ELIMINAR PERSONA
	=============================================*/

	static public function ctrEliminarCliente()
	{

		if (isset($_GET["idCliente"])) {

			$respuesta = ModeloPersona::mdlEliminarPersona("persona", $_GET["idCliente"]);


			if ($respuesta == 1) {

				echo '<script>
				swal({
					  type: "success",
					  title: "El Cliente ha sido eliminado",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';
			}
		}
	}
}
