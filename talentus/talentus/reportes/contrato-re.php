<?php 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
require_once "../controladores/contratos.controlador.php";
require_once "../controladores/persona.controlador.php";
require_once "../controladores/vehiculos.controlador.php";
require_once "../modelos/contratos.modelo.php";
require_once "../modelos/persona.modelo.php";
require_once "../modelos/vehiculos.modelo.php";


require_once "../modelos/plantilla.modelo.php";

if (isset($_SERVER["REQUEST_URI"])) {
	/**
	 * OBTENER ID CONTRATO
	 * DESDE URL
	 */
	$dir= $_SERVER["REQUEST_URI"];
	$url = explode("/", $dir);

	/**
	 * CONSULTAR
	 * CONTRATO
	 */
	$item = "id";
	$valor = $url[4];
	$count = 1;

    $contrato = ControladorContratos::ctrMostrarContratos($item, $valor, 1);


    $detalle = ControladorContratos::ctrMostrarDetalleContratos("idcontrato", $contrato["id"], 0);


	$cliente = ControladorPersona::ctrMostrarPersona($item, $contrato["idcliente"], $count);


    $plantilla = ModeloPlantilla::mdlSeleccionarPlantilla("plantilla");

if (count($detalle) <= 75) {
	# code...




$html = "<!DOCTYPE html>
				<html>";

    $html.='
	<head>
		<title>Contrato N°'.$contrato["idcliente"].'</title>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta http-equiv="content-type" content="text-html; charset=utf-8">
	  	<script src="../../vistas/bower_components/jquery/dist/jquery.min.js"></script>
	  	<link rel="stylesheet" type="text/css" href="../../reportes/contrato.css">
		<script src="../kendo.all.min.js"></script>
	    <script>

	      function exportPDF() {
	        kendo.drawing.drawDOM(".contrato", {
	          forcePageBreak: ".new-page",
	          paperSize: "A4",
	          margin: {top: "0cm", bottom: "0cm", left: "0cm"},
	          scale: 0.75,
	          height: 500
	        }).then(function(group){
	          kendo.drawing.pdf.saveAs(group, "contrato_'.$contrato["id"].'-'.$contrato["idcliente"].'");
	        });
	      }
	      kendo.pdf.defineFont({
	        "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
	        "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
	        "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
	        "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
	        "WebComponentsIcons"      : "https://kendo.cdn.telerik.com/2017.1.223/styles/fonts/glyphs/WebComponentsIcons.ttf"
	    });


		$( document ).ready(function() {
		 
		   console.log( "ready!" );
		   //exportPDF();
		});
	    </script>
	</head>
	';




  $empresa = json_decode($plantilla["empresa"], true);
  $nombre = $empresa[0]["nombre"];

  $ruc = $empresa[0]["ruc"];
  $direccion = $empresa[0]["direccion"];
  $telefono = $empresa[0]["telefono"];
  $email = $empresa[0]["correo"];
  $cuenta = $empresa[0]["cuenta"];

  if ($contrato["fondo"] == 1) {

    $fondo = $plantilla["fondoContrato"];
  }else{

    $fondo = "";
  }

	if ($cliente["tipo_documento"] == "RUC"){

	    $tipo_cliente="La Empresa";

	}else{

	    $tipo_cliente="el/la Sr/Sra";
	}

	if($contrato["sello"] == 1) {

	    $sello = '<div class="sello" style="position: absolute;top: 635px; right: 155px;margin-left: 90px; margin-right: 80px;">
	        	<img src="../../'.$plantilla["fondoFirma"].'" width="150px">
	        </div>"';

	}else{

		$sello = '<div class="sello"></>';
	}

	$fecha = '<p> '.$contrato["ciudad"].', '.iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($contrato["fecha"]))).'</p>';

    if ($cliente["apellido"] == "null") {

        $nombre_cliente = $cliente["nombre"];

    }else{

        $nombre_cliente = $cliente["nombre"]. " ".$cliente["apellido"];
    }

  $html.='
	<body>

	<div class="container-fluid center">
	    <div class="row">

	    <!--=====================================
	    SEGUNDO DIV CERTIFICADO
	    ======================================-->

	    <div class="contrato">

		    <div class="page1" style="background-image: url(../../'.$fondo.')">

		    <div class="titulo" style="position: absolute; top: 125px; left: 25%; margin-right: 100px; font-size: 16px;">

		      <center><b>CONTRATO DE PRESTACIÓN DE SERVICIO AVL</b></center>

		    </div>

		    <div class="descripcion" style="position: absolute; top: 160px; margin-left: 100px; margin-right: 100px;">

		      <p  align="justify">Conste por el presente documento de prestación del servicio AVL (el Contrato) que celebran
		      <b>'.$nombre.'</b>, con RUC Nº '.$ruc.', domiciliada en el Jr. Santa María N°
		      209, Cajamarca, y '.$tipo_cliente.' '.$nombre_cliente.' con '.$cliente["tipo_documento"].' '.$cliente["num_documento"].', con domicilio
		      en '.$cliente["direccion"].' el Cliente, da acuerdo a los siguientes términos:</p>

		    </div>

		    <div class="primera_titulo" style="position: absolute;  top: 260px; margin-left: 100px;	margin-right: 100px;">
		        <p><b>PRIMERA: OBJETO DEL CONTRATO</b></p>

		    </div>

		    <div class="primera" style="position: absolute; top: 290px; margin-left: 100px; margin-right: 100px;">

		      <p  align="justify">
		        <b> T&T </b> se obliga a prestar al <b>Cliente</b> el servicio <b>AVL</b> (que incluye el acceso a la Plataforma de Monitoreo GPS con su respectiva credencial y la previa instalación del equipo GPS)  y sus servicios incorporados dentro del sistema, Alertas de Exceso de velocidad, Botón de pánico, Ubicación en tiempo real, Control de paradas, Reportes e Historiales hasta 30 días de antigüedad, Posición, Corte y Encendido de energía, Soporte y asesoría online o presencial.
		        Así mismo se encuentra habilitada la opción de migrar sus equipos ya instalados con otro
		        proveedor a la Plataforma Talentus. Para efectos del presente contrato, el Cliente autoriza a <b>T&T</b> a verificar su historial crediticio a las Centrales de Riesgos y a reportar a las mismas su eventual morosidad o incumplimiento de las obligaciones asumidas por el Cliente bajo el Contrato. Así mismo el cliente podrá solicitar la habilitación de más de una credencial y configuración en los dispositivos con acceso a internet para el monitoreo de la(las) siguientes unidades de placa (s):
		      </p>';

		      	//tabla
		     if (count($detalle) <= 10) {
		 		
		      	$html.='<table border="1" align="center" style="margin-left: 35px; margin-top: 10px" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="80px" align="center">Item</td>
					      <td width="80px" align="center">Tipo</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="40px" align="center">Plan</td>


					    </tr>';

			    foreach ($detalle as $key => $value) {

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $value["idvehiculo"]);
		    		$html.='<tr>

				        <td width="50px" align="center">'.($key+1).'</td>
				        <td width="180px" align="center">'.$vehiculo["tipo"].'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="120px" align="center">'.$value["plan"].'</td>
				        </tr>
				        ';
			    }




				$html.='</table>';

		     } 


		     if(count($detalle) <= 20 && count($detalle) >= 11) {

		      	$html.='<table border="1" align="center" style="margin-top: 15px;margin-left: 20px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="40px" align="center">Item</td>
					       <td width="80px" align="center">Tipo</td>
					      <td width="40px" align="center">Placa</td>

					    </tr>';

			    for ($i=0; $i < 10 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="50px" align="center">'.($i+1).'</td>
				        <td width="100px" align="center">'.$vehiculo["tipo"].'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        
				        </tr>
				        ';
			    }

			    $html.='</table>';

		      	$html.='<table border="1" align="center" style="margin-top: -320px;margin-left: 299px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="40px" align="center">Item</td>
					      <td width="80px" align="center">Tipo</td>
					      <td width="40px" align="center">Placa</td>
					       

					    </tr>';

			    for ($i=10; $i < count($detalle) ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="50px" align="center">'.($i+1).'</td>
				        <td width="180px" align="center">'.$vehiculo["tipo"].'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        </tr>
				        ';
			    }

				$html.='</table>';
		     }



		     //MAS DE 20 VEHICULOS
		     if(count($detalle) >= 21 && count($detalle) <= 30) {

		      	$html.='<table border="1" align="center" style="margin-top: 15px;margin-left: 0px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="60px" align="center">Plan</td>
					      <td width="80px" align="center">Placa</td>
					      

					    </tr>';

			    for ($i=0; $i < 10 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        
				        </tr>
				        ';
			    }

			    $html.='</table>';


		      	$html.='<table border="1" align="center" style="margin-top: -225px;margin-left: 190px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="60px" align="center">Plan</td>
					      <td width="80px" align="center">Placa</td>
					      

					    </tr>';

			    for ($i=10; $i < count($detalle) && $i < 20 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        
				        </tr>
				        ';
			    }

			    $html.='</table>';


			    //TERCERA TABLA
			    if(count($detalle) >= 21) {

		      	$html.='<table border="1" align="center" style="margin-top: -225px;margin-left: 380px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="60px" align="center">Plan</td>
					      <td width="80px" align="center">Placa</td>
					      

					    </tr>';

			    }

			    for ($i=20; $i < count($detalle); $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				      
				        </tr>
				        ';
			    }





				$html.='</table>';
		     }

		     	//mas de 30

		     //MAS DE 30 VEHICULOS
		     if(count($detalle) >= 31 && count($detalle) < 60) {

		      	$html.='<table border="1" align="center" style="margin-top: 13px;margin-left: 0px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=0; $i < 20 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }

			    $html.='</table>';
			    if(count($detalle) >= 31) {
		      	$html.='<table border="1" align="center" style="margin-top: -425px;margin-left: 200px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';
					   }
			    for ($i=20; $i < count($detalle) && $i < 40 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }


			    $html.='</table>';

			    //TERCERA TABLA
			    if(count($detalle) >= 41) {
		      	$html.='<table border="1" align="center" style="margin-top: -425px;margin-left: 400px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';
					}
			    for ($i=40; $i < count($detalle); $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }





				$html.='</table>';
		     }




				///MAS DE 60 MENOR QUE 75
		     if(count($detalle) >= 61 && count($detalle) < 75) {

		      	$html.='<table border="1" align="center" style="margin-top: 13px;margin-left: 0px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=0; $i < 25 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }

			    $html.='</table>';

		      	$html.='<table border="1" align="center" style="margin-top: -525px;margin-left: 200px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=25; $i < count($detalle) && $i < 50 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }


			    $html.='</table>';

			    //TERCERA TABLA

		      	$html.='<table border="1" align="center" style="margin-top: -525px;margin-left: 400px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=50; $i < count($detalle); $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }





				$html.='</table>';
		     }
















		      $html.='</div>




		    </div>


		    <div class="page2 new-page" style="background-image: url(../../'.$fondo.')">
		      <div class="segunda_titulo" style="position: absolute;top: 180px;margin-left: 100px;margin-right: 100px;">
		        <p><b>SEGUNDA: OBLIGACIONES DEL CLIENTE</b></p>

		      </div>

		      <div class="segunda" style="position: absolute; top: 210px; margin-left: 100px; margin-right: 100px;">
		        <p align="justify">Son obligaciones del <b>Cliente</b> además de las establecidas en la normativa vigente: <b>(I)</b> Utilizar adecuadamente y conforme a las Leyes vigentes el servicio contratado, <b>(II)</b> Pagar puntualmente por el Servicio y/o los otros servicios contratados en la forma y plazo acordados por adelantado, <b>(III)</b> Comunicar a <b>T&T</b> su cambio de domicilio o de número telefónico, <b>(IV)</b> Comunicar el ingreso de la unidad a taller de servicio o la inhabilitación del servicio a tiempo.</p>

		      </div>

		      <div class="tercera_titulo" style="position: absolute; top: 310px; margin-left: 100px; margin-right: 100px;">

		        <p><b>TERCERA: PLAZO DEL CONTRATO</b></p>

		      </div>

		      <div class="tercera" style="position: absolute; top: 340px; margin-left: 100px; margin-right: 100px;">
		        <p align="justify">El plazo se encuentra sujeto a 12 meses contabilizados a la firma de la presente.</p>

		      </div>

		     <div class="cuarta_titulo" style="position: absolute; top: 450px; margin-left: 100px; margin-right: 100px;">
		        <p><b>CUARTA: FACTURACIÓN Y PAGOS</b></p>

		      </div>

		      <div class="cuarta" style ="position: absolute; top: 480px; margin-left: 100px; margin-right: 100px;">

		        <p align="justify">El Cliente pagará a <b>T&T</b> las tarifas vigentes con sujeción al plan tarifario contratado por el Servicio y/o por los otros servicios contratados. Los conceptos detallados serán pagados por ciclo de facturación ADELANTADO, de ser el caso: (i) renta fija mensual por el uso de la Plataforma  y chip datos el monto detallado en la tabla superior por vehículo más IGV, (ii) la reactivación del servicio estará sujeta a la tarifa establecida por T&T, S/. 50.00 más IGV, el cual incluye cambio de chip, configuración y actualización en la plataforma, (iii) por mantenimientos o revisión del equipo debido a la manipulación de tercero o fallas ajenas a T&T. (iv) por desinstalación o instalación del equipo GPS S/. 50.00 más IGV.
		        Para los casos de adquisición de equipos GPS  que el <b>CLIENTE</b> no cancele en la fecha acordada <b>T&T</b> procederá a retirar el equipo instalado sin derecho a devolución de adelantos otorgados por el <b>CLIENTE</b>.
		        </p>
		        <p align="justify"><b>T&T</b> dispone de su Cta. Cte. En el BCP en Soles Nº  <b>'.$cuenta.'</b>, titular TALENTUS TECHNOLOGY EIRL para realizar el pago por los servicios prestados y enviar Voucher  escaneado al correo '.$email.'</p>

		      </div>

		      <div class="quinta_titulo" style="position: absolute;top: 740px; margin-left: 100px; margin-right: 100px;">

		        <p><b>QUINTA: COBERTURA DE LOS SERVICIOS</b></p>
		      </div>

		      <div class="quinta" style="position: absolute; top: 770px; margin-left: 100px; margin-right: 100px;">

		        <p align="justify">Nuestra cobertura de Monitoreo es a nivel nacional e internacional dependiendo de la señal radio eléctrica propagada por la red de los operadores Claro, Movistar, Entel o Bitel para enviar la actualización de datos a la Plataforma.</p>
		      </div>

		      <div class="sexta_titulo" style="position: absolute; top: 870px;margin-left: 100px; margin-right: 100px;">
		        <p><b>SEXTA: EVENTUALIDADES</b></p>

		      </div>

		      <div class="sexta" style="position: absolute; top: 900px;  margin-left: 100px; margin-right: 100px;">
		        <p align="justify"><b>T&T</b>, no se responsabiliza por los eventuales cortes de Transmisión de la señal por causas ajenas a nuestra responsabilidad, falta de reportes o historiales (si estos fueran ocurridos por fallas en la señal radioeléctrica propagadas en la red celular de Claro, Movistar, Entel o Bitel) lo que dificultará el cumplimiento del servicio, Los cortes de energía de los vehículos (al estacionarse o al ingresar al taller), Falta de coordinación en la reparación, Falla del vehículo, Retiro de Batería, Cruce de chip, manipulación de terceros, Soldaduras, Energización a otro vehículo.</p>
		      </div>





		   </div>

		  <div class="page3 new-page" style="background-image: url(../../'.$fondo.')">
		      <div class="septima_titulo" style="position: absolute; top: 180px; margin-left: 100px; margin-right: 100px;">
		        <p><b>SEPTIMA: HURTO, ROBO O PERDIDA DE LA UNIDAD</b></p>

		      </div>

		      <div class="septima" style="position: absolute; top: 210px; margin-left: 100px; margin-right: 100px;">

		        <p align="justify">En caso de robo, perdida u otra circunstancia equivalente, el Cliente deberá reportar el hecho inmediatamente a la Central de Monitoreo y a las autoridades de seguridad (PNP).
		        <b>T&T</b>, deja plenamente establecido que el servicio que presta es el señalado en la Primera cláusula, por lo cual no está obligada a resarcir por los daños directos e indirectos o por la pérdida total o parcial del vehículo o vehículos por los que transporta o por los daños personales (lesiones o muerte) del cliente o del personal autorizado o de terceros, como consecuencia de intento o comisión de hurto simple, hurto agravado, robo agravado, secuestro y de apropiación ilícita de LOS VEHICULOS. Cualquier póliza de seguros, de ser requerida, será responsabilidad del el <b>CLIENTE</b>.
		        </p>
		      </div>

		      <div class="octava_titulo" style="position: absolute; top: 380px; margin-left: 100px; margin-right: 100px;">

		        <p><b>OCTAVA: LEY Y JURISDICCIÓN APLICABLE</b></p>
		      </div>

		      <div class="octava" style="position: absolute; top: 410px; margin-left: 100px; margin-right: 100px;">
		        <p align="justify">Todas las desavenencias o controversias que pudieran derivarse de la ejecución de este contrato incluidas las de su nulidad o invalidez se regirán por el código civil y demás leyes del ordenamiento jurídico de la República del Perú que resulten aplicables, sometiéndose ambas partes a la competencia de los jueces del distrito judicial.</p>

		        <p align="justify">Suscrito por las partes contratantes en señal de conformidad, en la ciudad de:</p>
		      </div>

		      <div class="fecha" style="position: absolute; top: 550px; margin-left: 80px; margin-right: 100px;">
		        '.$fecha.'

		      </div>

		      <div class="cliente" style="position: absolute; top: 680px; margin-left: 100px; text-align: center;">
		        <p>------------------------------------</p>
		        <p>CLIENTE</p>
		      </div>

		      <div class="empresa" style="position: absolute; top: 680px; right: 100px; margin-left: 100px; margin-right: 100px;
			  text-align: center;">
		        <p>------------------------------------</p>
		        <p> REPRESENTANTE LEGAL DE T&T </p>
		      </div>



		        '.$sello.'

		  	</div>


		</div>
	</div>



  ';











  $html .='

		</body>

	</html>
	';

}
if (count($detalle) >= 76) {

$html = "<!DOCTYPE html>
				<html>";

    $html.='
	<head>
		<title>Contrato N°'.$contrato["idcliente"].'</title>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta http-equiv="content-type" content="text-html; charset=utf-8">
	  	<script src="../../vistas/bower_components/jquery/dist/jquery.min.js"></script>
	  	<link rel="stylesheet" type="text/css" href="../../reportes/contrato.css">
		<script src="../kendo.all.min.js"></script>
	    <script>

	      function exportPDF() {
	        kendo.drawing.drawDOM(".contrato", {
	          forcePageBreak: ".new-page",
	          paperSize: "A4",
	          margin: {top: "0cm", bottom: "0cm", left: "0cm"},
	          scale: 0.75,
	          height: 500
	        }).then(function(group){
	          kendo.drawing.pdf.saveAs(group, "contrato_'.$contrato["id"].'-'.$contrato["idcliente"].'");
	        });
	      }
	      kendo.pdf.defineFont({
	        "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
	        "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
	        "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
	        "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
	        "WebComponentsIcons"      : "https://kendo.cdn.telerik.com/2017.1.223/styles/fonts/glyphs/WebComponentsIcons.ttf"
	    });


		$( document ).ready(function() {
		 
		   console.log( "ready!" );
		 // exportPDF();
		});
	    </script>
	</head>
	';




  $empresa = json_decode($plantilla["empresa"], true);
  $nombre = $empresa[0]["nombre"];

  $ruc = $empresa[0]["ruc"];
  $direccion = $empresa[0]["direccion"];
  $telefono = $empresa[0]["telefono"];
  $email = $empresa[0]["correo"];
  $cuenta = $empresa[0]["cuenta"];

  if ($contrato["fondo"] == 1) {

    $fondo = $plantilla["fondoContrato"];
  }else{

    $fondo = "";
  }

	if ($cliente["tipo_documento"] == "RUC"){

	    $tipo_cliente="La Empresa";

	}else{

	    $tipo_cliente="el/la Sr/Sra";
	}

	if($contrato["sello"] == 1) {

	    $sello = '<div class="sello" style="position: absolute;top: 775px; right: 155px;margin-left: 90px; margin-right: 80px;">
	        	<img src="../../'.$plantilla["fondoFirma"].'" width="150px">
	        </div>';

	}else{

		$sello = '<div class="sello"></>';
	}

	$fecha = '<p> '.$contrato["ciudad"].', '.iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($contrato["fecha"]))).'</p>';

    if ($cliente["apellido"] == "null") {

        $nombre_cliente = $cliente["nombre"];

    }else{

        $nombre_cliente = $cliente["nombre"]. " ".$cliente["apellido"];
    }

  $html.='
	<body>

	<div class="container-fluid center">
	    <div class="row">

	    <!--=====================================
	    SEGUNDO DIV CERTIFICADO
	    ======================================-->

	    <div class="contrato">

		    <div class="page1" style="background-image: url(../../'.$fondo.')">

		    <div class="titulo" style="position: absolute; top: 125px; left: 25%; margin-right: 100px; font-size: 16px;">

		      <center><b>CONTRATO DE PRESTACIÓN DE SERVICIO AVL</b></center>

		    </div>

		    <div class="descripcion" style="position: absolute; top: 160px; margin-left: 100px; margin-right: 100px;">

		      <p  align="justify">Conste por el presente documento de prestación del servicio AVL (el Contrato) que celebran
		      <b>'.$nombre.'</b>, con RUC Nº '.$ruc.', domiciliada en el Jr. Santa María N°
		      209, Cajamarca, y '.$tipo_cliente.' '.$nombre_cliente.' con '.$cliente["tipo_documento"].' '.$cliente["num_documento"].', con domicilio
		      en '.$cliente["direccion"].' el Cliente, da acuerdo a los siguientes términos:</p>

		    </div>

		    <div class="primera_titulo" style="position: absolute;  top: 260px; margin-left: 100px;	margin-right: 100px;">
		        <p><b>PRIMERA: OBJETO DEL CONTRATO</b></p>

		    </div>

		    <div class="primera" style="position: absolute; top: 290px; margin-left: 100px; margin-right: 100px;">

		      <p  align="justify">
		        <b> T&T </b> se obliga a prestar al <b>Cliente</b> el servicio <b>AVL</b> (que incluye el acceso a la Plataforma de Monitoreo GPS con su respectiva credencial y la previa instalación del equipo GPS)  y sus servicios incorporados dentro del sistema, Alertas de Exceso de velocidad, Botón de pánico, Ubicación en tiempo real, Control de paradas, Reportes e Historiales hasta 30 días de antigüedad, Posición, Corte y Encendido de energía, Soporte y asesoría online o presencial.
		        Así mismo se encuentra habilitada la opción de migrar sus equipos ya instalados con otro
		        proveedor a la Plataforma Talentus. Para efectos del presente contrato, el Cliente autoriza a <b>T&T</b> a verificar su historial crediticio a las Centrales de Riesgos y a reportar a las mismas su eventual morosidad o incumplimiento de las obligaciones asumidas por el Cliente bajo el Contrato. Así mismo el cliente podrá solicitar la habilitación de más de una credencial y configuración en los dispositivos con acceso a internet para el monitoreo de la(las) siguientes unidades de placa (s):
		      </p>';

		      	//tabla

				///MAS DE 60 MENOR QUE 75
		     if(count($detalle) >= 76) {

		      	$html.='<table border="1" align="center" style="margin-top: 13px;margin-left: 0px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=0; $i < 25 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }

			    $html.='</table>';

		      	$html.='<table border="1" align="center" style="margin-top: -525px;margin-left: 200px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=25; $i < count($detalle) && $i < 50 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }


			    $html.='</table>';

			    //TERCERA TABLA

		      	$html.='<table border="1" align="center" style="margin-top: -525px;margin-left: 400px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=50; $i < count($detalle) && $i < 75 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }





				$html.='</table>';
		     }






		      $html.='</div>




		    </div>


		    <div class="page2 new-page" style="background-image: url(../../'.$fondo.')">
		    ';



		      	//tabla

				///MAS DE 60 MENOR QUE 75
		     if(count($detalle) >= 76) {

		      	$html.='<table border="1" align="center" style="position: absolute;margin-top: 180px;margin-left: 100px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=75; $i < count($detalle) && $i < 100 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }

			    $html.='</table>';

		      	$html.='<table border="1" align="center" style="position: absolute;margin-top: 180px;margin-left: 300px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=100; $i < count($detalle) && $i < 125 ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }


			    $html.='</table>';

			    //TERCERA TABLA

		      	$html.='<table border="1" align="center" style="position: absolute;margin-top: 180px;margin-left: 500px;" bordercolor="#000">

					    <tr bgcolor="#F2F374">
					      <td width="30px" align="center">Item</td>
					      <td width="80px" align="center">Placa</td>
					      <td width="60px" align="center">Plan</td>

					    </tr>';

			    for ($i=125; $i < count($detalle) ; $i++) { 

			    	$vehiculo = ControladorVehiculos::ctrMostrarVehiculos("id", $detalle[$i]["idvehiculo"]);
		    		$html.='<tr>

				        <td width="30px" align="center">'.($i+1).'</td>
				        <td width="80px" align="center">'.$vehiculo["placa"].'</td>
				        <td width="60px" align="center">'.$detalle[$i]["plan"].'</td>
				        </tr>
				        ';
			    }





				$html.='</table>';
		     }



		    $html.='


		   </div>


		   	<!-- page 3 inici-->
		    <div class="page3 new-page" style="background-image: url(../../'.$fondo.')">
			<div class="segunda_titulo" style="position: absolute;top: 180px;margin-left: 100px;margin-right: 100px;">



		        <p><b>SEGUNDA: OBLIGACIONES DEL CLIENTE</b></p>

		      </div>



		      <div class="segunda" style="position: absolute; top: 210px; margin-left: 100px; margin-right: 100px;">
		        <p align="justify">Son obligaciones del <b>Cliente</b> además de las establecidas en la normativa vigente: <b>(I)</b> Utilizar adecuadamente y conforme a las Leyes vigentes el servicio contratado, <b>(II)</b> Pagar puntualmente por el Servicio y/o los otros servicios contratados en la forma y plazo acordados por adelantado, <b>(III)</b> Comunicar a <b>T&T</b> su cambio de domicilio o de número telefónico, <b>(IV)</b> Comunicar el ingreso de la unidad a taller de servicio o la inhabilitación del servicio a tiempo.</p>

		      </div>

		      <div class="tercera_titulo" style="position: absolute; top: 320px; margin-left: 100px; margin-right: 100px;">

		        <p><b>TERCERA: PLAZO DEL CONTRATO</b></p>

		      </div>

		      <div class="tercera" style="position: absolute; top: 350px; margin-left: 100px; margin-right: 100px;">
		        <p align="justify">El plazo se encuentra sujeto a 12 meses contabilizados a la firma de la presente.</p>

		      </div>

		     <div class="cuarta_titulo" style="position: absolute; top: 400px; margin-left: 100px; margin-right: 100px;">
		        <p><b>CUARTA: FACTURACIÓN Y PAGOS</b></p>

		      </div>

		      <div class="cuarta" style ="position: absolute; top: 430px; margin-left: 100px; margin-right: 100px;">

		        <p align="justify">El Cliente pagará a <b>T&T</b> las tarifas vigentes con sujeción al plan tarifario contratado por el Servicio y/o por los otros servicios contratados. Los conceptos detallados serán pagados por ciclo de facturación ADELANTADO, de ser el caso: (i) renta fija mensual por el uso de la Plataforma  y chip datos el monto detallado en la tabla superior por vehículo más IGV, (ii) la reactivación del servicio estará sujeta a la tarifa establecida por T&T, S/. 50.00 más IGV, el cual incluye cambio de chip, configuración y actualización en la plataforma, (iii) por mantenimientos o revisión del equipo debido a la manipulación de tercero o fallas ajenas a T&T. (iv) por desinstalación o instalación del equipo GPS S/. 50.00 más IGV.
		        Para los casos de adquisición de equipos GPS  que el <b>CLIENTE</b> no cancele en la fecha acordada <b>T&T</b> procederá a retirar el equipo instalado sin derecho a devolución de adelantos otorgados por el <b>CLIENTE</b>.
		        </p>
		        <p align="justify"><b>T&T</b> dispone de su Cta. Cte. En el BCP en Soles Nº  <b>'.$cuenta.'</b>, titular TALENTUS TECHNOLOGY EIRL para realizar el pago por los servicios prestados y enviar Voucher  escaneado al correo '.$email.'</p>

		      </div>

		      <div class="quinta_titulo" style="position: absolute;top: 680px; margin-left: 100px; margin-right: 100px;">

		        <p><b>QUINTA: COBERTURA DE LOS SERVICIOS</b></p>
		      </div>

		      <div class="quinta" style="position: absolute; top: 710px; margin-left: 100px; margin-right: 100px;">

		        <p align="justify">Nuestra cobertura de Monitoreo es a nivel nacional e internacional dependiendo de la señal radio eléctrica propagada por la red de los operadores Claro, Movistar, Entel o Bitel para enviar la actualización de datos a la Plataforma.</p>
		      </div>


		  	</div>
		  	<!-- page fin-->

	<!-- page 3 inici-->
		    <div class="page4 new-page" style="background-image: url(../../'.$fondo.')">


		      <div class="sexta_titulo" style="position: absolute; top: 180px;margin-left: 100px; margin-right: 100px;">
		        <p><b>SEXTA: EVENTUALIDADES</b></p>

		      </div>

		      <div class="sexta" style="position: absolute; top: 210px;  margin-left: 100px; margin-right: 100px;">
		        <p align="justify"><b>T&T</b>, no se responsabiliza por los eventuales cortes de Transmisión de la señal por causas ajenas a nuestra responsabilidad, falta de reportes o historiales (si estos fueran ocurridos por fallas en la señal radioeléctrica propagadas en la red celular de Claro, Movistar, Entel o Bitel) lo que dificultará el cumplimiento del servicio, Los cortes de energía de los vehículos (al estacionarse o al ingresar al taller), Falta de coordinación en la reparación, Falla del vehículo, Retiro de Batería, Cruce de chip, manipulación de terceros, Soldaduras, Energización a otro vehículo.</p>
		      </div>




		      <div class="septima_titulo" style="position: absolute; top: 350px; margin-left: 100px; margin-right: 100px;">
		        <p><b>SEPTIMA: HURTO, ROBO O PERDIDA DE LA UNIDAD</b></p>

		      </div>

		      <div class="septima" style="position: absolute; top: 380px; margin-left: 100px; margin-right: 100px;">

		        <p align="justify">En caso de robo, perdida u otra circunstancia equivalente, el Cliente deberá reportar el hecho inmediatamente a la Central de Monitoreo y a las autoridades de seguridad (PNP).
		        <b>T&T</b>, deja plenamente establecido que el servicio que presta es el señalado en la Primera cláusula, por lo cual no está obligada a resarcir por los daños directos e indirectos o por la pérdida total o parcial del vehículo o vehículos por los que transporta o por los daños personales (lesiones o muerte) del cliente o del personal autorizado o de terceros, como consecuencia de intento o comisión de hurto simple, hurto agravado, robo agravado, secuestro y de apropiación ilícita de LOS VEHICULOS. Cualquier póliza de seguros, de ser requerida, será responsabilidad del el <b>CLIENTE</b>.
		        </p>
		      </div>

		      <div class="octava_titulo" style="position: absolute; top: 550px; margin-left: 100px; margin-right: 100px;">

		        <p><b>OCTAVA: LEY Y JURISDICCIÓN APLICABLE</b></p>
		      </div>

		      <div class="octava" style="position: absolute; top: 580px; margin-left: 100px; margin-right: 100px;">
		        <p align="justify">Todas las desavenencias o controversias que pudieran derivarse de la ejecución de este contrato incluidas las de su nulidad o invalidez se regirán por el código civil y demás leyes del ordenamiento jurídico de la República del Perú que resulten aplicables, sometiéndose ambas partes a la competencia de los jueces del distrito judicial.</p>

		        <p align="justify">Suscrito por las partes contratantes en señal de conformidad, en la ciudad de:</p>
		      </div>

		      <div class="fecha" style="position: absolute; top: 720px; margin-left: 80px; margin-right: 100px;">
		        '.$fecha.'

		      </div>

		      <div class="cliente" style="position: absolute; top: 820px; margin-left: 100px; text-align: center;">
		        <p>------------------------------------</p>
		        <p>CLIENTE</p>
		      </div>

		      <div class="empresa" style="position: absolute; top: 820px; right: 100px; margin-left: 100px; margin-right: 100px;
			  text-align: center;">
		        <p>------------------------------------</p>
		        <p> REPRESENTANTE LEGAL DE T&T </p>
		      </div>



		        '.$sello.'

		  	</div>
		  	<!-- page fin-->
		</div>
	</div>



  ';











  $html .='

		</body>

	</html>
	';




}





echo $html;



}





?>








