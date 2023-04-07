<?php 

require_once "../controladores/recibo.controlador.php";
require_once "../controladores/persona.controlador.php";

require_once "../modelos/recibo.modelo.php";
require_once "../modelos/persona.modelo.php";
require_once "../modelos/servicios.modelo.php";
require_once "../modelos/plantilla.modelo.php";

if (isset($_SERVER["REQUEST_URI"])) {
	/**
	 * OBTENER ID recibo
	 * DESDE URL
	 */
	$dir= $_SERVER["REQUEST_URI"];
	$url = explode("/", $dir);
	$html = "<!DOCTYPE html>
				<html>";
	/**
	 * CONSULTAR
	 * recibo
	 */

	$item = "id";
	$valor = $url[4];
	$recibo = ControladorRecibos::ctrMostrarRecibo($item, $valor);

	$plantilla = ModeloPlantilla::mdlSeleccionarPlantilla("plantilla");
	$empresa = json_decode($plantilla["empresa"], true);

	$html.='
	<head>
		<title>Recibo N°'.$recibo["num_recibo"].' </title>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta http-equiv="content-type" content="text-html; charset=utf-8">
	  <script src="../../vistas/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="../kendo.all.min.js"></script>
	    <script>

	      function exportPDF() {
	        kendo.drawing.drawDOM(".factura", {
	          forcePageBreak: ".new-page",
	          paperSize: "A4",
	          margin: {top: "0cm", bottom: "0cm", left: "0cm"},
	          scale: 0.75,
	          height: 500
	        }).then(function(group){
	          kendo.drawing.pdf.saveAs(group, "recibo '.$recibo["num_recibo"].'");
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
	    //console.log( "ready!" );
	    exportPDF();
	});
	    </script>
	<style type="text/css">
			html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			b, u, i, center,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, embed,
			figure, figcaption, footer, header, hgroup,
			menu, nav, output, ruby, section, summary,
			time, mark, audio, video {
				margin: 0;
				padding: 0;
				border: 0;
				font: inherit;
				font-size: 100%;
				vertical-align: baseline;
			}

			html {
				line-height: 1;
			}

			ol, ul {
				list-style: none;
			}

			table {
				border-collapse: collapse;
				border-spacing: 0;
			}

			caption, th, td {
				text-align: left;
				font-weight: normal;
				vertical-align: middle;
			}

			q, blockquote {
				quotes: none;
			}
			q:before, q:after, blockquote:before, blockquote:after {
				content: "";
				content: none;
			}

			a img {
				border: none;
			}

			article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
				display: block;
			}

			body {
				font-family: "Source Sans Pro", sans-serif;
				font-weight: 300;
				font-size: 12px;
				margin: 0;
				padding: 0;
				color: #777777;
			}
			body a {
				text-decoration: none;
				color: inherit;
			}
			body a:hover {
				color: inherit;
				opacity: 0.7;
			}
			body .container {
				min-width: 500px;
				margin: 0 auto;
				padding: 0 30px;
			}
			body .clearfix:after {
				content: "";
				display: table;
				clear: both;
			}
			body .left {
				float: left;
			}
			body .right {
				float: right;
			}
			body .helper {
				height: 100%;
			}

			header {
				height: 40px;
				margin-top: 20px;
				margin-bottom: 40px;
				padding: 0px 5px 0;
			}
			header figure {
				float: left;
				width: 40px;
				margin-right: 10px;
			}
			header figure img {
				height: 40px;
			}
			header .company-info {
				color: #BDB9B9;
			}
			header .company-info .title {
				margin-bottom: 5px;
				color: #052c52;
				font-weight: 600;
				font-size: 2em;
			}
			header .company-info .line {
				display: inline-block;
				height: 9px;
				margin: 0 4px;
				border-left: 1px solid #052c52;
			}

			section .details {
				min-width: 500px;
				margin-bottom: 40px;
				padding: 10px 35px;
				background-color: #052c52;
				color: #ffffff;
			}
			section .details .client {
				width: 50%;
				line-height: 16px;
			}
			section .details .client .name {
				font-weight: 600;
			}
			section .details .data {
				width: 50%;
				text-align: right;
			}
			section .details .title {
				margin-bottom: 15px;
				font-size: 2.1em;
				font-weight: 400;
				text-transform: uppercase;
			}
			section .table-wrapper {
				position: relative;
				overflow: hidden;
			}
			section .table-wrapper:before {
				content: "";
				display: block;
				position: absolute;
				top: 33px;
				left: 30px;
				width: 90%;
				height: 100%;
				border-top: 2px solid #000;
				border-left: 2px solid #000;
				z-index: -1;
			}
			section .no-break {
				page-break-inside: avoid;
			}
			section table {
				width: 100%;
				margin-bottom: -20px;
				table-layout: fixed;
				border-collapse: separate;
				border-spacing: 5px 20px;
			}
			section table .no {
				width: 50px;
			}
			section table .desc {
				width: 55%;
			}
			section table .qty, section table .unit, section table .total {
				width: 15%;
			}
			section table tbody.head {
				vertical-align: middle;
				border-color: inherit;
			}
			section table tbody.head th {
				text-align: center;
				color: white;
				font-weight: 600;
				text-transform: uppercase;
			}
			section table tbody.head th div {
				display: inline-block;
				padding: 7px 0;
				width: 100%;
				background: #BDB9B9;
			}
			section table tbody.head th.desc div {
				width: 115px;
				margin-left: -110px;
			}
			section table tbody.body td {
				padding: 10px 5px;
				background: #F3F3F3;
				text-align: center;
			}
			section table tbody.body h3 {
				margin-bottom: 5px;
				color: #052c52;
				font-weight: 600;
			}
			section table tbody.body .no {
				padding: 0px;
				background-color: #052c52;
				color: #ffffff;
				font-size: 1.66666666666667em;
				font-weight: 600;
				line-height: 50px;
			}
			section table tbody.body .desc {
				padding-top: 0;
				padding-bottom: 0;
				background-color: transparent;
				color: #777787;
				text-align: left;
			}
			section table tbody.body .total {
				color: #052c52;
				font-weight: 600;
			}
			section table tbody.body tr.total td {
				padding: 5px 10px;
				background-color: transparent;
				border: none;
				color: #777777;
				text-align: right;
			}
			section table tbody.body tr.total .empty {
				background: white;
			}
			section table tbody.body tr.total .total {
				font-size: 1.18181818181818em;
				font-weight: 600;
				color: #052c52;
			}
			section table.grand-total {
				margin-top: 40px;
				margin-bottom: 0;
				border-collapse: collapse;
				border-spacing: 0px 0px;
				margin-bottom: 40px;
			}
			section table.grand-total tbody td {
				padding: 0 10px 10px;
				background-color: #052c52;
				color: #ffffff;
				font-weight: 400;
				text-align: right;
			}
			section table.grand-total tbody td.no, section table.grand-total tbody td.desc, section table.grand-total tbody td.qty {
				background-color: transparent;
			}
			section table.grand-total tbody td.total, section table.grand-total tbody td.grand-total {
				border-right: 5px solid #ffffff;
			}
			section table.grand-total tbody td.grand-total {
				padding: 0;
				font-size: 1.16666666666667em;
				font-weight: 600;
				background-color: transparent;
			}
			section table.grand-total tbody td.grand-total div {
				float: right;
				padding: 10px 5px;
				background-color: #21BCEA;
			}
			section table.grand-total tbody td.grand-total div span {
				margin-right: 5px;
			}
			section table.grand-total tbody tr:first-child td {
				padding-top: 10px;
			}

			footer {
				margin-bottom: 20px;
				padding: 0 5px;
			}
			footer .thanks {
				margin-bottom: 40px;
				color: #052c52;
				font-size: 1.16666666666667em;
				font-weight: 600;
			}
			footer .notice {
				margin-bottom: 25px;
			}
			footer .end {
				padding-top: 5px;
				border-top: 2px solid #052c52;
				text-align: center;
			}

	</style>
	</head>
		';
	/**
	 * CONSULTAR
	 * CLIENTE
	 */
	$item = "id";
    $valor = $recibo["idcliente"];
    $count = 1;
    $cliente = ControladorPersona::ctrMostrarPersona($item, $valor, $count);

    $katary = array(
    				"nombre"=>"Katary servicios generales",
    				"telefono"=>"951718056",
    				"direccion"=>"Calle Santa María Nº 209, Cajamarca.",
    				"provincia"=>"Cajamarca",
    				"pais"=>"Perú",
    				"logo"=>"vistas/img/katary.png",
    				"lema"=>"Marcando la Diferencia",
    				"cuenta"=>"245-2172979-0-27",
    				"ruc"=>"20605873783",
    				"correo"=>"gerencia@talentustechnology.com"
    			);



$html.='
<body class="factura">
	<header class="clearfix">
		<div class="container">
			<figure>
				';

			if ($recibo["empresa"] == "Talentus") {
				
				$html.='<img class="logo" src="../../'.$plantilla["icono"].'" alt="">';
			}else{

				$html.='<img class="logo" src="../../'.$katary["logo"].'" alt="">';
			}
				


		$html.='</figure>
			<div class="company-info">

				';

				if ($recibo["empresa"] == "Talentus") {
					$html.='<h2 class="title">'.$empresa[0]["nombre"].'</h2>';

				}else{

					$html.='<h2 class="title">'.$katary["nombre"].'</h2>';
				}

				$html.='<span>'.$empresa[0]["direccion"].'</span>

				<span class="line"></span>

				<a class="phone" href="tel:'.$empresa[0]["telefono"].'">'.$empresa[0]["telefono"].'</a>
				<span class="line"></span>
				<a class="email" href="mailto:'.$empresa[0]["correo"].'">'.$empresa[0]["correo"].'</a>
			</div>
		</div>
	</header>


';
	if ($cliente["apellido"] == "null") {	 

	    $nombre_cliente = $cliente["nombre"];

	}else{

	    $nombre_cliente = $cliente["nombre"]. " ".$cliente["apellido"];
	}


$html.='
	<section>
		<div class="details clearfix">
			<div class="client left">

				<p><b class ="name">SEÑOR: </b>'.$nombre_cliente.'';




			$html.='</p>
				<p>
					DIRECCION: '.$cliente["direccion"].',<br>
				</p>
				<a href="mailto:'.$cliente["email"].'">'.$cliente["email"].'</a>
			</div>
			<div class="data right">
				<div class="title">RECIBO '.$recibo["num_recibo"].' </div>
				<div class="date">
					Fecha: '.$fecha=date_format(date_create($recibo["fecha"]),"d/m/Y").'<br>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="table-wrapper">
				<table>
					<tbody class="head">
						<tr>
							<th class="no"></th>
							<th class="desc"><div>DESCRIPCION</div></th>
							<th class="qty"><div>CANTIDAD</div></th>
							<th class="unit"><div>P. UNIT</div></th>
							<th class="total"><div>IMPORTE</div></th>
						</tr>
					</tbody>
					<tbody class="body">
';
	/**
	 * CONSULTAR
	 * DETALLE recibo
	 */
	$item = "idrecibo";
	$valor = $recibo["id"];
	$total = 0;

	$detalle = "";

	$reciboDetalle = ControladorRecibos::ctrDetalleRecibo($item, $valor);

	/**
	 * CONSULTAR
	 * DETALLE recibo
	 */
	$descuento = 0;
    	if ($recibo["divisa"] == "PEN") {

			$simbolo = "S/";

		}else if($recibo["divisa"] == "USD"){

			$simbolo = "$";

		}else if($recibo["divisa"] == "EUR"){

			$simbolo = "€";

		}else{

			$simbolo = "MXN";
		}
	 foreach ($reciboDetalle as $key => $value) {

    	$item = "id";
	    $valor = $value["item"];
	    $tabla = "servicios";


	    $articulo = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);


		$html.='<tr>
					<td class="no">'.($key+1).'</td>
					<td class="desc">'.$value["item"].'</td>
					<td class="qty">'.$value["cantidad"].'</td>
					<td class="unit">'.$simbolo.' '.$value["precio"].'</td>
					<td class="total">'.$simbolo.' '.round(($value["cantidad"]*$value["precio"]), 2).'</td>
				</tr>';


	}
    
$html.=' 
					</tbody>
				</table>
			</div>
			<div class="no-break">
				<table class="grand-total">
					<tbody>
						<tr>
							<td class="no"></td>
							<td class="desc"></td>
							<td class="qty"></td>
							<td class="unit">SUBTOTAL:</td>
							<td class="total">'.$simbolo.' '.($recibo["total_recibo"]).'</td>
						</tr>
						<tr>
							<td class="no"></td>
							<td class="desc"></td>
							<td class="qty"></td>
							<td class="unit">IGV 18%:</td>';


							$total = $recibo["total_recibo"];
							$igv = 0;


					$html.='<td class="total">$'.round($igv, 2).'</td>
						</tr>
						<tr>
							<td class="grand-total" colspan="5"><div><span>TOTAL:</span>'.$simbolo.' '.round($total, 2).'</div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
';
$html .='
	<footer>
		<div class="container">
			<div class="thanks">Gracias por su compra</div>

		</div>
	</footer>

</body>

</html>
';
echo $html;
}else{


}
	
	


	
// require_once '../vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf();
// $mpdf->WriteHTML($html);
// $mpdf->Output();
// $mpdf = new \Mpdf\Mpdf([
// 	'margin_left' => 20,
// 	'margin_right' => 15,
// 	'margin_top' => 48,
// 	'margin_bottom' => 25,
// 	'margin_header' => 10,
// 	'margin_footer' => 10
// ]);
// 
?>





