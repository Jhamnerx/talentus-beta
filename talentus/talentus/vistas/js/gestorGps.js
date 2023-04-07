/*=============================================
CARGAR LA TABLA DINÁMICA DE GPS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaGps.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

$(".tablaGps").DataTable({
	 "ajax": "ajax/tablaGps.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }


});


/*=============================================
REVISAR SI DISPOSITIVO YA EXISTE
=============================================*/

$(".validarGps").change(function(){

	$(".alert").remove();

	var gps = $(this).val();
	// console.log("gps", gps);

	var datos = new FormData();
	datos.append("validarGps", gps);

	$.ajax({
	    url:"ajax/gps.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	console.log("respuesta", respuesta);

	    	if(respuesta){

	    		$(".validarGps").parent().after('<div class="alert alert-warning">Esta dispositivo ya existe en la base de datos</div>')
	    		$(".validarGps").val("");
	    	}   

	    }

	  })
});


/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaGps tbody").on("click", ".btnEliminarGps", function(){

	var idGps = $(this).attr("idGps");

  	swal({
    	title: '¿Está seguro de borrar El Registro?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar Dispositivo!'
	 }).then(function(result){

    	if(result.value){

      	window.location = "index.php?ruta=gps&idGps="+idGps;

    	}

  	})

})