<?php

require_once "../controladores/tarea.controlador.php";
require_once "../modelos/tarea.modelo.php";


class AjaxTarea{

  /*=============================================
  SUBIR IMAGEN TECNICO
  =============================================*/

  public $imagenTecnico;
  public $idTareaImagen;

  public function ajaxSubirImagenTecnico(){

    $respuesta = ControladorTareas::ctrSubirImagen($this->idTareaImagen, $this->imagenTecnico);

    echo $respuesta;

  }
}

/*=============================================
SUBIR IMAGEN TECNICO
=============================================*/
if(isset($_POST["idTareaImagen"])){

  $subirImagen = new AjaxTarea();
  $subirImagen -> idTareaImagen = $_POST["idTareaImagen"];
  $subirImagen -> imagenTecnico = $_FILES["imagenTecnico"];
  $subirImagen -> ajaxSubirImagenTecnico();

}
