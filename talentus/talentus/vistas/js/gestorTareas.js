/*=============================================
CARGAR LA TABLA DINÁMICA DE TAREAS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaHistorialTareas.ajax.php",
// 	success:function(respuesta){

// 		console.log("respuesta", respuesta);

// 	}

// })

var taskComplete = $(".tablaVerTareaCompletadas").DataTable({
	 "ajax": "ajax/tablaTareas.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un totalr de _TOTAL_",
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



var taskProgress = $(".tablaVerTareaProgreso").DataTable({
	 "ajax": "ajax/tablaTareasProgreso.ajax.php",
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


var taskCancel = $(".tablaVerTareaCancelada").DataTable({
	 "ajax": "ajax/tablaTareasCancelada.ajax.php",
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



var tasks = $(".tablaVerTareas").DataTable({
	 "ajax": "ajax/tablaHistorialTareas.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "iDisplayLength": 3,
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

var tipTareas = $(".tablaVerTipoTareas").DataTable({
	 "ajax": "ajax/TablaTipoTareas.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "iDisplayLength": 5,
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

function cargarVehiculosTarea(){
$('#modalCrearTarea .idVehiculo').html('');
 	var datos = new FormData();
 	//
 	datos.append("idvehiculoc", "null");
 	datos.append("item", "");
	$.ajax({
		url:"ajax/vehiculos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			//console.log(respuesta);

			var datosFlota = JSON.parse(respuesta);

			 datosFlota.forEach(forEachFlota);

			 function forEachFlota(vehiculo, index){
				//$(".editaridvehiculo").val(null).trigger("change");
				var newOption = new Option(vehiculo.placa, vehiculo.id, false, false);
				//$(".idvehiculo").append('<option value="'+vehiculo.id+'">'+vehiculo.nombre+'</option>');
				$('#modalCrearTarea .idVehiculo').append(newOption).trigger('change');
				//var selectVehiculos = $("#modalCrearTarea .idVehiculo").select2();


				//$('.editaractavehiculo').append(newOption).trigger('change');



			 }


		}

	})

}

$(".modalCrearTarea").on("click", function(){

cargarVehiculosTarea();

})
//CANCELAR TAREA NO LEIDA A CANCELADAS
$(".tablaVerTareaNoLeida").on("click", ".btnCancelarTarea", function(){

	idTarea = $(this).attr("idtarea");
	//console.log("cancelar tarea "+idTarea);

	var actualizarItemTarea = "estado";
	var actualizarId = idTarea;
	var valorTarea = 0


	var datos = new FormData();
	datos.append("actualizarItemTarea", actualizarItemTarea);
	datos.append("actualizarId", actualizarId);
	datos.append("valorTarea", valorTarea);

	swal({
		title: "¿Está usted seguro(a)?",
		text: "¡La tarea se marcara como cancelada!",
		type: "warning",
		showConfirmButton: true,
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "¡Si, Cancelarla!",
		}).then(function(result){
				if (result.value) {

					$.ajax({

				  		url:"ajax/tarea.ajax.php",
				  		method: "POST",
					  	data: datos,
					  	cache: false,
				      	contentType: false,
				      	processData: false,
				      	success: function(respuesta){

				      		console.log(respuesta);
				      		iziToast.show({
				            	title: '<h4>TAREA CANCELADA</h4>',
				             	message: '<br>Se ha cancelado la tarea, disponible en Tareas canceladas',
				             	theme: 'light',
				             	layout: 2,
				              	displayMode: 2,
				              	progressBar: false,
				              	imageWidth: 325,
				             	 timeout: 3000,
				              	transitionIn: 'bounceInLeft',
				             	onClosed: function () {
				                	location.reload();
				              	}
				     		});

				     		taskProgress.ajax.reload();
				     		taskCancel.ajax.reload();


				      	}

				  	});

				}
			})


})


//TAREA EN PROGRESO A CANCELADA

$(".tablaVerTareaProgreso").on("click", ".btnCancelarTarea", function(){

	idTarea = $(this).attr("idtarea");
	console.log("cancelar tarea "+idTarea);

	var actualizarItemTarea = "estado";
	var actualizarId = idTarea;
	var valorTarea = 0


	var datos = new FormData();
	datos.append("actualizarItemTarea", actualizarItemTarea);
	datos.append("actualizarId", actualizarId);
	datos.append("valorTarea", valorTarea);

	swal({
		title: "¿Está usted seguro(a)?",
		text: "¡La tarea se marcara como cancelada!",
		type: "warning",
		showConfirmButton: true,
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "¡Si, Cancelarla!",
		}).then(function(result){
				if (result.value) {

					$.ajax({

				  		url:"ajax/tarea.ajax.php",
				  		method: "POST",
					  	data: datos,
					  	cache: false,
				      	contentType: false,
				      	processData: false,
				      	success: function(respuesta){

				      		console.log(respuesta);
				      		iziToast.show({
				            	title: '<h4>TAREA CANCELADA</h4>',
				             	message: '<br>Se ha cancelado la tarea, disponible en Tareas canceladas',
				             	theme: 'light',
				             	layout: 2,
				              	displayMode: 2,
				              	progressBar: false,
				              	imageWidth: 325,
				             	 timeout: 3000,
				              	transitionIn: 'bounceInLeft',
				             	onClosed: function () {
				                	location.reload();
				              	}
				     		});

				     		taskProgress.ajax.reload();
				     		taskCancel.ajax.reload();


				      	}

				  	});

				}
			})


})
//PROGRESO A TERMINADA
$(".tablaVerTareaProgreso").on("click", ".btnTerminarTarea", function(){

	idTarea = $(this).attr("idtarea");
	//console.log("cancelar tarea "+idTarea);

	var actualizarItemTarea = "estado";
	var actualizarId = idTarea;
	var valorTarea = 2


	var datos = new FormData();
	datos.append("actualizarItemTarea", actualizarItemTarea);
	datos.append("actualizarId", actualizarId);
	datos.append("valorTarea", valorTarea);
	swal({
		  title: "¿Está usted seguro(a)?",
		  text: "¡La tarea se marcara como terminada!",
		  type: "success",
		  showCancelButton: true,
		  confirmButtonColor: "#3da165",
		  confirmButtonText: "¡Si, Terminarla!",
		  closeOnConfirm: true
		}).then(function(result){
				if (result.value) {

					$.ajax({

				  		url:"ajax/tarea.ajax.php",
				  		method: "POST",
					  	data: datos,
					  	cache: false,
				      	contentType: false,
				      	processData: false,
				      	success: function(respuesta){

				      		console.log(respuesta);
				      		iziToast.show({
				            	title: '<h4>TAREA TERMINADA</h4>',
				             	message: '<br>Se ha cancelado la tarea, disponible en Tareas terminadas',
				             	theme: 'light',
				             	layout: 2,
				              	displayMode: 2,
				              	progressBar: false,
				              	imageWidth: 325,
				             	 timeout: 3000,
				              	transitionIn: 'bounceInLeft',
				             	onClosed: function () {
				                	location.reload();
				              	}
				     		});

				     		taskProgress.ajax.reload();
				     		taskCancel.ajax.reload();
				     		taskComplete.ajax.reload();


				      	}

				  	});

				}
			})



})


/*=============================================
EDITAR TAREA
=============================================*/

$(".tablaVerTareas tbody").on("click", ".btnEditarTarea", function(){

	var idTarea = $(this).attr("idTarea");

	var datos = new FormData();
	datos.append("idTarea", idTarea);

	$.ajax({

		url:"ajax/tarea.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

		  var datos = new FormData();
		  datos.append("idVehiculo", respuesta["vehiculo"]);

		  	$.ajax({
			    url:"ajax/vehiculos.ajax.php",
			    method: "POST",
			    data: datos,
			    cache: false,
			    contentType: false,
			    processData: false,
			    dataType: "json",
			    success: function(vehiculo){

			    	$("#modalEditarTarea .tareaVerPlaca").val(vehiculo["placa"]);



			    }

			})



			$("#modalEditarTarea .idEditarTarea").val(respuesta["id"]);
			$("#modalEditarTarea .EditarTipoTarea").val(respuesta["tipo"]);
			$("#modalEditarTarea .editarIdVehiculo").val(respuesta["vehiculo"]);
			$("#modalEditarTarea .editarDispositivo").val(respuesta["dispositivo"]);
			$("#modalEditarTarea .editarSimTarea").val(respuesta["sim"]);
			$("#modalEditarTarea .editarSimCardTarea").val(respuesta["sim_card"]);
			$("#modalEditarTarea .editarFechaTarea").val(respuesta["fecha"]);
			$("#modalEditarTarea .editarHoraTarea").val(respuesta["hora"]);

			if (respuesta["tipo"] == "2") {


				$("#modalEditarTarea .divEditarNuevo").css("display","block")
				$("#modalEditarTarea .editarNuevoSimTarea").css("border-color","green")
				$("#modalEditarTarea .editarNuevoSimTarea").val(respuesta["nuevo_sim"]);

				$("#modalEditarTarea .editarNuevoSimCardTarea").css("border-color","green")
				$("#modalEditarTarea .editarNuevoSimCardTarea").val(respuesta["nuevo_card"]);

			}else{

				$("#modalEditarTarea .divEditarNuevo").css("display","none")

			}



		}

	})



})



/*=============================================
EDITAR TIPO TAREA
=============================================*/

$(".tablaVerTipoTareas tbody").on("click", ".btnEditarTipoTarea", function(){

	var idTipoTarea = $(this).attr("idTipoTarea");

	var datos = new FormData();
	datos.append("idTipoTarea", idTipoTarea);

	$.ajax({

		url:"ajax/tarea.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#modalEditarTipoTarea .editarIdTipoTarea").val(respuesta["id"]);
			$("#modalEditarTipoTarea .editarTipoTarea").val(respuesta["tipo"]);
			$("#modalEditarTipoTarea .editarCostoTarea").val(respuesta["costo"]);


		}

	})



})




$('#modalCrearTarea .idVehiculo').on('select2:select', function (e) {
  var data = e.params.data;

 	var datos = new FormData();
 	//
 	datos.append("placaVehiculo", data.text);
 	datos.append("item", "placa");


	$.ajax({
		url:"ajax/vehiculos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			//console.log(respuesta["sim"]);

			$("#modalCrearTarea .simTarea").val(respuesta["sim"]);

			var idLinea = respuesta["sim"];

			var datos = new FormData();
		 	datos.append("editarIdLinea", idLinea);


			$.ajax({

				url:"ajax/lineas.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(lineas){

					//console.log(lineas);
					$("#modalCrearTarea .simCardTarea").val(lineas["sim_card"]);

				}

			})

		}

	})



});



//Cambiar tipo de Tarea


$("#modalCrearTarea .tipoTarea").change(function(){

	tipoTarea = $(this).val();
	console.log(tipoTarea);

	if (tipoTarea == "2") {

		//console.log("cambiar")


		$("#modalCrearTarea .divNuevo").css("display","block")
		$("#modalCrearTarea .nuevoSimTarea").css("border-color","green")
		$("#modalCrearTarea .nuevoSimCardTarea").css("border-color","green")

	}else{

		$("#modalCrearTarea .divNuevo").css("display","none")

	}



})
/*************************
CAMBIAR TIPO TAREAS EN EDITAR

**************************/
$("#modalEditarTarea .EditarTipoTarea").change(function(){

	tipoTarea = $(this).val();
	//console.log(tipoTarea);

	if (tipoTarea == "2") {

		//console.log("cambiar")


		$("#modalEditarTarea .divEditarNuevo").css("display","block")
		$("#modalEditarTarea .editarNuevoSimTarea").css("border-color","green")
		$("#modalEditarTarea .editarNuevoSimCardTarea").css("border-color","green")

	}else{

		$("#modalEditarTarea .divEditarNuevo").css("display","none")

	}



})
$("#modalEditarTarea .editarFechaTarea").change(function(){

	console.log($(this).val());

})


function cargarDispositivo(){
	$('#modalCrearTarea .dispositivo').html('');
 	var datos = new FormData();
 	datos.append("mostrar", "null");
	$.ajax({
		url:"ajax/dispositivos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			//console.log(respuesta);

			var datosDispositivo = JSON.parse(respuesta);

			 datosDispositivo.forEach(forEachDispositivo);

			 function forEachDispositivo(dispositivo, index){


				//$(".dispositivo").append('<option value="'+dispositivo.id+'">'+dispositivo.modelo+'</option>');
				var newOption = new Option(dispositivo.modelo, dispositivo.id, false, false);
				//console.log(newOption);
				$('.dispositivo').append(newOption).trigger('change');

			 }


		}

	})

}

$(".modalCrearTarea").on("click", function(){

cargarDispositivo();

})

/**

FUNCION ENVIAR MENSAJE A WHATSAPP

**/
$(".tablaVerTareaProgreso tbody").on("click", ".btnEnviarMensaje", function(){

  var elemento = document.getElementById("whatsapp");
  while (elemento.firstChild) {
    elemento.removeChild(elemento.firstChild);
  }
  var tareaId = $(this).attr("idTarea");
  var tipoTarea = $(this).attr("tipoTarea");
  var dispositivo = $(this).attr("dispositivo");
  var fecha = $(this).attr("fecha");
  var placa = $(this).attr("placa");
  var cliente = $(this).attr("cliente");

    $(function () {
        $('#whatsapp').floatingWhatsApp({
            number: '+51 ',
            popupMessage: 'Estimado escribe tu mensaje y numero',
            message: "🔸**SERVICIO TERMINADO**🔸\n 🛠_"+tipoTarea+"_ del dispositivo "+dispositivo+".\nEn el vehículo de placa: **"+placa+"**🚗 \nPara dar conformidad al servicio brindado el Dia: \n"+fecha+" \nIngresar al siguiente enlace: \n🌐 http://talentustechnology.com/confirmar/"+tareaId,
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Bienvenido!',
            headerColor: '#075e54',
            backgroundColor: '#128C7E',
            buttonImage: '<img src="'+rutaOculta+'vistas/img/whatsapp.svg"/>'
        });
    });

})


$(".tablaVerTareaCompletadas tbody").on("click", ".btnEnviarMensaje", function(){

  var elemento = document.getElementById("whatsapp");
  while (elemento.firstChild) {
    elemento.removeChild(elemento.firstChild);
  }
  var tareaId = $(this).attr("idTarea");
  var tipoTarea = $(this).attr("tipoTarea");
  var dispositivo = $(this).attr("dispositivo");
  var fecha = $(this).attr("fecha");
  var placa = $(this).attr("placa");
  var cliente = $(this).attr("cliente");

    $(function () {
        $('#whatsapp').floatingWhatsApp({
            number: '+51 ',
            popupMessage: 'Estimado escribe tu mensaje y numero',
            message: "🔸**SERVICIO TERMINADO**🔸\n 🛠_"+tipoTarea+"_ del dispositivo "+dispositivo+".\nEn el vehículo de placa: **"+placa+"**🚗 \nPara dar conformidad al servicio brindado el Dia: \n"+fecha+" \nIngresar al siguiente enlace: \n🌐 http://talentustechnology.com/confirmar/"+tareaId,
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Bienvenido!',
            headerColor: '#075e54',
            backgroundColor: '#128C7E',
            buttonImage: '<img src="'+rutaOculta+'vistas/img/whatsapp.svg"/>'
        });
    });

})



/*=============================================
ELIMINAR TAREA
=============================================*/
$(".tablaVerTareas tbody").on("click", ".btnEliminarTarea", function(){

	var idTarea = $(this).attr("idTarea");

  	swal({
    	title: '¿Está seguro de borrar la tarea?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar tarea!'
	 }).then(function(result){

    	if(result.value){

      	window.location = "index.php?ruta=tareas&idTarea="+idTarea;

    	}

  	})

})


$("#modalReporteTareas").on("change", ".fechaTareaChange", function(){

	var fechaReporteTareaInicio = $(".fechaReporteTareaInicio").val();
	var fechaReporteTareaFin = $(".fechaReporteTareaFin").val();
	var estadoReporteTarea = $(".estadoReporteTarea").val();

	CargarReporteTarea(fechaReporteTareaInicio, fechaReporteTareaFin, estadoReporteTarea);


})


$(".btnObtenerReporteTareas").click(function(){

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day);
    $('.fechaReporteTareaInicio').val(today);
    $('.fechaReporteTareaFin').val(today);
    CargarReporteTarea(today, today, "2");

})





function CargarReporteTarea(fechaReporteTareaInicio, fechaReporteTareaFin, estadoReporteTarea){

// $.ajax({

// 	url:"ajax/tablaReporteTareas.ajax.php?fechaReporteTareaInicio="+fechaReporteTareaInicio+"&fechaReporteTareaFin="+fechaReporteTareaFin+"&estadoReporteTarea="+estadoReporteTarea,
// 	success:function(respuesta){

// 		console.log("respuesta", respuesta);

// 	}

// })


	var tablaReporteTareas = $("#modalReporteTareas .tablaReporteTarea").DataTable({
		dom: 'Bfrtip', //Definimos Los elementos del control de tabla
		buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [ 0, 1, 2,3,4, 5,8,9 ]
                        }
                    }
		],
		 "ajax": "ajax/tablaReporteTareas.ajax.php?fechaReporteTareaInicio="+fechaReporteTareaInicio+"&fechaReporteTareaFin="+fechaReporteTareaFin+"&estadoReporteTarea="+estadoReporteTarea,
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

	tablaReporteTareas.ajax.url("ajax/tablaReporteTareas.ajax.php?fechaReporteTareaInicio="+fechaReporteTareaInicio+"&fechaReporteTareaFin="+fechaReporteTareaFin+"&estadoReporteTarea="+estadoReporteTarea).load();

}

/**
 * CARGAR PLACAS
 */

function autocompletePlacas(){

    var availableTags = $(".autocompletePlaca").val();
    var names = availableTags.split(",");
    var obj = JSON.parse(availableTags);
    //console.log(names);

    var anames = $.map(obj, function (value, key) { return { value: value, data: key }; });


    // Initialize ajax autocomplete:
    $('#autocompletePlaca-ajax').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".placaIdVehiculo").val(suggestion.data);

        },
        onHint: function (hint) {
            $(".placaIdVehiculo").val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
    // Initialize ajax autocomplete:
    $('#autocompletePlaca-ajax-linea').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".placaIdVehiculo").val(suggestion.data);

        },
        onHint: function (hint) {
            $(".placaIdVehiculo").val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
}


$(".modalCrearTarea").on("click", function(){

 autocompletePlacas();
});











$(".tablaVerTareas tbody").on("click", ".btnNotificarTecnico", function(){

  var elemento = document.getElementById("whatsapp");
  while (elemento.firstChild) {
    elemento.removeChild(elemento.firstChild);
  }
  var tareaId = $(this).attr("idTarea");
  var tipoTarea = $(this).attr("tipoTarea");
  var dispositivo = $(this).attr("dispositivo");
  var fecha = $(this).attr("fecha");
  var hora = $(this).attr("hora");
  var placa = $(this).attr("placa");
  var cliente = $(this).attr("cliente");


	if ($(".permisoAdministrador").val() == "true") {
    $(function () {
        $('#whatsapp').floatingWhatsApp({
            number: '+51 ',
            popupMessage: 'AVISO DE NUEVA TAREA',
            message: "🔸**AVISO DE NUEVA TAREA**🔸\n 🛠_"+tipoTarea+"_ del dispositivo "+dispositivo+".\nNombre Cliente: **"+cliente+"**🚗 \nFecha y Hora "+fecha+" "+hora+" \n",
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Bienvenido!',
            headerColor: '#075e54',
            backgroundColor: '#128C7E',
            buttonImage: '<img src="'+rutaOculta+'vistas/img/whatsapp.svg"/>'
        });
    });



	}else{


		$(".tablaVerTareas tbody .btnNotificarTecnico").attr("disabled", "");
		
	}





})