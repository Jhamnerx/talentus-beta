<?php

require_once "../controladores/gps.controlador.php";
require_once "../modelos/gps.modelo.php";


class AjaxGps
{


    /*=============================================
  VALIDAR NO REPETIR CATEGORÍA
  =============================================*/

    public $validarGps;

    public function ajaxValidarGps()
    {

        $item = "imei";
        $valor = $this->validarGps;

        $respuesta = ControladorGps::ctrMostrarGps($item, $valor);

        echo json_encode($respuesta);
    }
}

/*=============================================
VALIDAR NO REPETIR GPS
=============================================*/

if (isset($_POST["validarGps"])) {

    $valGps = new AjaxGps();
    $valGps->validarGps = $_POST["validarGps"];
    $valGps->ajaxValidarGps();
}
