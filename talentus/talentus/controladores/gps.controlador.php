<?php

class ControladorGps
{

    /*=============================================
	MOSTRAR GPS
	=============================================*/

    static public function ctrMostrarGps($item, $valor)
    {

        $tabla = "gps";

        $respuesta = ModeloGps::mdlMostrarGps($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	CREAR DISPOSITIVOS
	=============================================*/

    static public function ctrCrearGps()
    {

        if (isset($_POST["imei"])) {
            $datos = array(
                "modelo" => $_POST["modeloGps"],
                "imei" => trim($_POST["imei"])
            );

            $respuesta = ModeloGps::mdlIngresarGps("gps", $datos);

            echo json_encode($datos);

            if ($respuesta == 1) {

                echo '<script>

					swal({
						  type: "success",
						  title: "La Gps ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gps";

							}
						})

					</script>';
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡Los campos no puede ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

                return;
            }
        }
    }

    /*=============================================
	ELIMINAR GPS
	=============================================*/

    static public function ctrEliminarGps()
    {

        if (isset($_GET["idGps"])) {

            $respuesta = ModeloGps::mdlEliminarGps("gps", $_GET["idGps"]);


            if ($respuesta == 1) {

                echo '<script>
				swal({
					  type: "success",
					  title: "El Gps ha sido eliminado",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "gps";

								}
							})

				</script>';
            }
        }
    }
}
