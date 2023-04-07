<?php
require_once "utiles.php";
class ControladorTareas{

	/*=============================================
	MOSTRAR PLACAS AYUDA
	=============================================*/

	static public function ctrMostrarPlacas(){
        $placas = [];
		$tabla = "vehiculo";

        $respuesta = ModeloVehiculos::mdlMostrarVehiculos($tabla, null, null);

        if($respuesta){
            
            for ($i=0; $i < count($respuesta) ; $i++) { 

      			 $placas += [$respuesta[$i]['id'] => $respuesta[$i]['placa']];
            }
            // $texto = substr($texto, 0, -1);
            // $texto.='}';

        }
        return json_encode($placas);
        

    }
	/*=============================================
	MOSTRAR TAREAS
	=============================================*/

	static public function ctrMostrarTareas($item, $valor){

		$tabla = "tareas";

		$respuesta = ModeloTarea::mdlMostrarTareas($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR TAREAS
	=============================================*/

	static public function ctrMostrarTarea($item, $valor){

		$tabla = "tareas";

		$respuesta = ModeloTarea::mdlMostrarTarea($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR REPORTE TAREAS
	=============================================*/

	static public function ctrMostrarReporteTareas($item, $fechaInicio, $fechaFin, $estado){

		$tabla = "tareas";

		$respuesta = ModeloTarea::mdlMostrarReporteTareas($tabla, $item, $fechaInicio, $fechaFin, $estado);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR TIPO TAREAS
	=============================================*/

	static public function ctrMostrarTipoTareas($item, $valor){

		$tabla = "tipotarea";

		$respuesta = ModeloTarea::mdlMostrarTipoTarea($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	CREAR TAREAS
	=============================================*/

	static public function ctrCrearTarea(){

		if(isset($_POST["tipoTarea"])){



			if ($_POST["placaIdVehiculo"] == "") {

				$datosVehiculo = array("placa"=>trim(strtoupper($_POST["idVehiculo"])),
							   "marca"=>"",
							   "modelo"=>"",
							   "tipo"=>"",
							   "year"=>"",
							   "color"=>"",
							   "motor"=>"",
							   "serie"=>"",
							   "idflota"=>"",
							   "sim"=>"",
							   "operador"=>"",
							   "descripcion"=>"",
							   "dispositivo"=>$_POST["dispositivo"],
							   "idgps"=>"",
							   "estado"=> 1);

				$resp = ModeloVehiculos::mdlCrearVehiculosTarea("vehiculo", $datosVehiculo);

				$datos = array("tipo"=>trim($_POST["tipoTarea"]),
							   "id_admin"=>$_SESSION["idUsuario"],
							   "id_empleado"=>$_SESSION["idUsuario"],
							   "dispositivo"=>$_POST["dispositivo"],
							   "vehiculo"=>trim($resp),
							   "sim"=>$_POST["simTarea"],
							   "sim_card"=>$_POST["simCardTarea"],
							   "nuevo_sim"=>$_POST["nuevoSimTarea"],
							   "nuevo_card"=>$_POST["nuevoSimCardTarea"],
							   "cliente"=>1,
							   "fecha"=>$_POST["fechaTarea"],
							   "hora"=>$_POST["horaTarea"],
							   "estado"=> 1);
  

					$respuesta = ModeloTarea::mdlCrearTarea("tareas", $datos);
                    

						if($respuesta == 1){

							echo'<script>

							swal({
								  type: "success",
								  title: "La Tarea ha sido creada",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {

									window.location = "tareas";

									}
								})

							</script>';

						}else{

						echo'<script>

							swal({
								  type: "error",
								  title: "¡Los datos no pueden ir vacía o llevar caracteres especiales!",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  })

					  	</script>';

					  	return;

					}
				
			}else{

			$datos = array("tipo"=>trim($_POST["tipoTarea"]),
						   "id_admin"=>$_SESSION["idUsuario"],
						   "id_empleado"=>$_SESSION["idUsuario"],
						   "dispositivo"=>$_POST["dispositivo"],
						   "vehiculo"=>trim($_POST["placaIdVehiculo"]),
						   "sim"=>$_POST["simTarea"],
						   "sim_card"=>$_POST["simCardTarea"],
						   "nuevo_sim"=>$_POST["nuevoSimTarea"],
						   "nuevo_card"=>$_POST["nuevoSimCardTarea"],
						   "cliente"=>1,
						   "fecha"=>$_POST["fechaTarea"],
						   "hora"=>$_POST["horaTarea"],
						   "estado"=> 1);
						   
						   var_dump($datos);

				$respuesta = ModeloTarea::mdlCrearTarea("tareas", $datos);


					if($respuesta == 1){

						echo'<script>

						swal({
							  type: "success",
							  title: "La Tarea ha sido creada",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "tareas";

								}
							})

						</script>';

					}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡Los datos no pueden ir vacía o llevar caracteres especiales!",
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
	EDITAR TAREAS
	=============================================*/

	static public function ctrEditarTarea(){

		if(isset($_POST["idEditarTarea"])){


			if ($_POST["EditarTipoTarea"] == "2") {

			    $datos = array("tipo"=>trim($_POST["EditarTipoTarea"]),
						   "id"=>$_POST["idEditarTarea"],
						   "dispositivo"=>$_POST["editarDispositivo"],
						   "vehiculo"=>trim($_POST["editarIdVehiculo"]),
						   "sim"=>$_POST["editarSimTarea"],
						   "sim_card"=>$_POST["editarSimCardTarea"],
						   "nuevo_sim"=>$_POST["editarNuevoSimTarea"],
						   "nuevo_card"=>$_POST["editarNuevoSimCardTarea"],
						   "fecha"=>$_POST["editarFechaTarea"],
						   "hora"=>$_POST["editarHoraTarea"]);


			}else{

				$tarea = ModeloTarea::mdlMostrarTarea("tareas", "id", $_POST["idEditarTarea"]);

				$datos = array("tipo"=>trim($_POST["EditarTipoTarea"]),
						   "id"=>$_POST["idEditarTarea"],
						   "dispositivo"=>$_POST["editarDispositivo"],
						   "vehiculo"=>trim($_POST["editarIdVehiculo"]),
						   "sim"=>$_POST["editarSimTarea"],
						   "sim_card"=>$_POST["editarSimCardTarea"],
						   "nuevo_sim"=>$tarea["nuevo_sim"],
						   "nuevo_card"=>$tarea["nuevo_card"],
						   "fecha"=>$_POST["editarFechaTarea"],
						   "hora"=>$_POST["editarHoraTarea"]);	
			}


			$respuesta = ModeloTarea::mdlEditarTarea("tareas", $datos);


				if($respuesta == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "Tarea Actualizada",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tareas";

							}
						})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos no pueden ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}
		}
	}

	/*=============================================
	CREAR TIPO TAREAS
	=============================================*/

	static public function ctrCrearTipoTarea(){

		if(isset($_POST["crearTipoTarea"])){
			$datos = array("tipo"=>trim($_POST["crearTipoTarea"]),
						   "costo"=>trim($_POST["costoTarea"])
						);

			$respuesta = ModeloTarea::mdlCrearTipoTarea("tipotarea", $datos);

				if($respuesta == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Tarea ha sido creada",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tareas";

							}
						})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos no pueden ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}
		}
	}

	/*=============================================
	EDITAR TIPO TAREAS
	=============================================*/

	static public function ctrEditarTipoTarea(){

		if(isset($_POST["editarIdTipoTarea"])){
			$datos = array("tipo"=>trim($_POST["editarTipoTarea"]),
						   "id"=>trim($_POST["editarIdTipoTarea"]),
						   "costo"=>trim($_POST["editarCostoTarea"])
						);

			$respuesta = ModeloTarea::mdlEditarTipoTarea("tipotarea", $datos);

				if($respuesta == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "Actualizacion Exitosa",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tareas";

							}
						})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos no pueden ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}
		}
	}

	/*=============================================
	ELIMINAR TAREA
	=============================================*/

	static public function ctrEliminarTarea(){

		if(isset($_GET["idTarea"])){


			/*=============================================
			QUITAR LAS TAREAS DE LOS PRODUCTOS
			=============================================*/
			$tabla = "tareas";
			$valor = $_GET["idTarea"];


			$respuesta = ModeloTarea::mdlEliminarTarea("tareas", $_GET["idTarea"]);


			if($respuesta == 1){

				echo'<script>
				swal({
					  type: "success",
					  title: "La tarea ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "tareas";

								}
							})

				</script>';
				
			}
			
		}

	}


	/*=============================================
	SUBIR IMAGEN TECNICO
	=============================================*/

	static public function ctrSubirImagen($idTareaImagen, $subirImagen){


		$subirImagenResult = Utiles::SubirImagen($subirImagen, $idTareaImagen);


		$respuesta = ModeloTarea::mdlActualizarTarea("tareas", "imagen", $subirImagenResult, "id", $idTareaImagen);

		echo $respuesta;


	}

	
}
