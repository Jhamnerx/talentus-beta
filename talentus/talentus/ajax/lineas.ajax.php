<?php

require_once "../controladores/lineas.controlador.php";
require_once "../modelos/lineas.modelo.php";


class AjaxLineas{

  /*=============================================
  ACTIVAR LINEAS
  =============================================*/	

  public $activarLinea;
  public $activarId;

  public function ajaxActivarLinea(){



    $estado = ModeloLineas::mdlActualizarLinea("lineas", "estado", $this->activarLinea, "id", $this->activarId);
  

    echo $estado;


  }


  /*=============================================
  EDITAR LINEAS
  =============================================*/ 

  public $idLinea;

  public function ajaxEditarLinea(){

    $item = "id";
    $valor = $this->idLinea;

    $respuesta = ControladorLineas::ctrMostrarLineas($item, $valor);

    echo json_encode($respuesta);

  }
  /*=============================================
  VER LINEA
  =============================================*/ 

  public $idVerLinea;

  public function ajaxVerLinea(){

    $item = "id";
    $valor = $this->idVerLinea;

    $respuesta = ControladorLineas::ctrMostrarLineas($item, $valor);

    echo json_encode($respuesta);

  }



  /*=============================================
  VER CAMBIOS LINEAS
  =============================================*/ 

  public $idLineaCambio;

  public function ajaxVerCambiosLinea(){

    $item = "id_linea";
    $valor = $this->idLineaCambio;

    $respuesta = ControladorLineas::ctrMostrarCambiosLineas($item, $valor);

    echo json_encode($respuesta);

  }




  /*=============================================
  VERIFICAR LINEA
  =============================================*/ 

  public $sim_card;
  public $itemv;

  public function ajaxVerificarLinea(){

    $tabla = "lineas";

    $item = $this->itemv;
    $valor = $this->sim_card;


    $respuesta = ModeloLineas::mdlMostrarLineas($tabla, $item, $valor);

    echo json_encode($respuesta);

  }



}

/*=============================================
ACTIVAR LINEAS
=============================================*/

if(isset($_POST["activarLinea"])){

	$activarLinea = new AjaxLineas();
	$activarLinea -> activarLinea = $_POST["activarLinea"];
	$activarLinea -> activarId = $_POST["activarId"];
	$activarLinea -> ajaxActivarLinea();

}


/*=============================================
EDITAR LINEAS
=============================================*/
if(isset($_POST["editarIdLinea"])){

  $editar = new AjaxLineas();
  $editar -> idLinea = $_POST["editarIdLinea"];
  $editar -> ajaxEditarLinea();

}



/*=============================================
 VER LINEA
=============================================*/
if(isset($_POST["idLinea"])){

  $ver = new AjaxLineas();
  $ver -> idVerLinea = $_POST["idLinea"];
  $ver -> ajaxVerLinea();

}


/*=============================================
 VER CAMBIOS LINEAS
=============================================*/
if(isset($_POST["idLineaCambio"])){

  $verCambios = new AjaxLineas();
  $verCambios -> idLineaCambio = $_POST["idLineaCambio"];
  $verCambios -> ajaxVerCambiosLinea();

}

/*=============================================
VERIFICAR LINEA
=============================================*/
if(isset($_POST["sim_card"])){

  $verificar = new AjaxLineas();
  $verificar -> sim_card = $_POST["sim_card"];
  $verificar -> itemv = $_POST["item"];
  $verificar -> ajaxVerificarLinea();

}

