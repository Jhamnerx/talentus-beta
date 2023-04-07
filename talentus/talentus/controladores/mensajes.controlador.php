<?php

class ControladorMensajes{

	/*=============================================
	MOSTRAR MENSAJES
	=============================================*/

	static public function ctrMostrarMensajes($item, $valor){

		$tabla = "solicitudes";

		$respuesta = ModeloMensajes::mdlMostrarMensajes($tabla, $item, $valor);

		return $respuesta;

	}



	/*=============================================
	EDITAR MENSAJES
	=============================================*/

	static public function ctrEditarMensaje(){

		if(isset($_POST["editarNombreMensaje"])){

			$datos = array("id"=>$_POST["editarIdMensaje"],
						   "categoria"=>strtoupper($_POST["editarNombreMensaje"]),
						   "descripcion"=>$_POST["descripcionMensaje"]
						);

			$respuesta = ModeloMensajes::mdlEditarMensaje("categorias", $datos);


			if($respuesta == 1){

				echo'<script>

				swal({
					  type: "success",
					  title: "La categoría ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "categorias";

						}
					})

				</script>';

			}
		}
	}



}
