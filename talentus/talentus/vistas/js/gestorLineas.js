/*=============================================
CARGAR LA TABLA DINÁMICA DE lineas
=============================================*/

// $.ajax({

// 	url:"ajax/tablaLineas.ajax.php",
// 	success:function(respuesta){

// 		console.log("respuesta", respuesta);

// 	}

// })

$(".tablaLineas").DataTable({
    dom: 'Bfrtip', //Definimos Los elementos del control de tabla
    buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
    ],
	 "ajax": "ajax/tablaLineas.ajax.php",
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
function autocompleteEmpresaLinea(){

    var availableTags = $(".autocomplete").val();
    var names = availableTags.split(",");
    var obj = JSON.parse(availableTags);
    //console.log(names);

    var anames = $.map(obj, function (value, key) { return { value: value, data: key }; });

    //console.log(anames);
    // Setup jQuery ajax mock:
    // $.mockjax({
    //     url: '*',
    //     responseTime: 2000,
    //     response: function (settings) {
    //         var query = settings.data.query,
    //             queryLowerCase = query.toLowerCase(),
    //             re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
    //             suggestions = $.grep(anames, function (country) {
    //                  // return country.value.toLowerCase().indexOf(queryLowerCase) === 0;
    //                 return re.test(country.value);
    //             }),
    //             response = {
    //                 query: query,
    //                 suggestions: suggestions
    //             };

    //         this.responseText = JSON.stringify(response);
    //     }
    // });

    // Initialize ajax autocomplete:
    $('#autocomplete-ajax').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".nameEmpresa").val(suggestion.value);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
    // Initialize ajax autocomplete:
    $('#autocomplete-ajax-linea').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".nameEmpresa").val(suggestion.value);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
}

function autocompletePlaca(){

    var availableTags = $(".autocompleteVehiculosLineas").val();
    var names = availableTags.split(",");
    var obj = JSON.parse(availableTags);
    //console.log(names);

    var anames = $.map(obj, function (value, key) { return { value: value, data: key }; });



    $('#autocomplete-ajax-lineas').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".placaLinea").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
    // Initialize ajax autocomplete:
    $('#autocomplete-ajax-lineas').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".placaLinea").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
}


function autocompletePlacaNueva(){

    var availableTags = $(".autocompleteVehiculosLineas").val();
    var names = availableTags.split(",");
    var obj = JSON.parse(availableTags);
    //console.log(names);

    var anames = $.map(obj, function (value, key) { return { value: value, data: key }; });



    $('#autocomplete-ajax-placa-nueva').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".idplaca_nueva").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
    // Initialize ajax autocomplete:
    $('#autocomplete-ajax-placa-nueva').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".idplaca_nueva").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
}

// AUTO COMPLETE PLACA EDITAR

function autocompletePlacaEditar(){

    var availableTags = $(".autocompleteVehiculosLineasEditar").val();
    var names = availableTags.split(",");
    var obj = JSON.parse(availableTags);
    //console.log(names);

    var anames = $.map(obj, function (value, key) { return { value: value, data: key }; });



    $('#autocomplete-ajax-lineasEditar').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".editarPlacaLinea").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
    // Initialize ajax autocomplete:
    $('#autocomplete-ajax-lineasEditar').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".editarPlacaLinea").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
}

function autocompletePlacaCambio(){

    var availableTags = $(".autocompleteVehiculosLineasEditar").val();
    var names = availableTags.split(",");
    var obj = JSON.parse(availableTags);
    //console.log(names);

    var anames = $.map(obj, function (value, key) { return { value: value, data: key }; });



    $('#autocomplete-ajax-placa-cambio').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".idplaca_cambio").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
    // Initialize ajax autocomplete:
    $('#autocomplete-ajax-placa-cambio').devbridgeAutocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: anames,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
            $(".idplaca_cambio").val(suggestion.data);

        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });
}



$(".btnAgregarLinea").on("click", function(){
     autocompletePlaca();
     autocompletePlacaNueva();
});

// EDITAR
//  LINEA

$(".tablaLineas tbody").on("click", ".btnEditarLinea", function(){

    autocompletePlacaEditar();

	 var idLinea = $(this).attr("idLinea");

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
		success: function(respuesta){

			$("#modalEditarLinea .idEditarLinea").val(respuesta["id"]);
			$("#modalEditarLinea .editarNumeroLinea").val(respuesta["numero"]);
			$("#modalEditarLinea .editarSimCard").val(respuesta["sim_card"]);
			$("#modalEditarLinea .editarOperadorLinea").val(respuesta["operador"]);
			//$("#modalEditarLinea .editarVehiculo").val(respuesta["id_vehiculo"]);
			$("#modalEditarLinea .editarPlacaLinea").val(respuesta["id_vehiculo"]);
			$("#modalEditarLinea .editarEstadoLinea").val(respuesta["estado"]);

            var idVehiculo = respuesta["id_vehiculo"];
            var datosV = new FormData();
            datosV.append("idVehiculo", idVehiculo);
            $.ajax({
    
              url:"ajax/vehiculos.ajax.php",
              method: "POST",
              data: datosV,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(vehiculo){
                    if (vehiculo["placa"]) {

                        $("#modalEditarLinea .editarVehiculo").val(vehiculo["placa"]);
                    } else {


                        $("#modalEditarLinea .editarVehiculo").val("Sin asignar");
                        $("#modalEditarLinea .editarPlacaLinea").val("Sin asignar");
                        
                    }
                  

              }
    
          })


		}

	})
});

// REGISTRAR CAMBIOS

$(".tablaLineas tbody").on("click", ".btnRegistrarCambiosLinea", function(){
    autocompletePlacaCambio();


	 var idLinea = $(this).attr("idLinea");

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
		success: function(respuesta){

			$("#modalRegistrarCambiosLinea .idEditarLinea").val(respuesta["id"]);
			$("#modalRegistrarCambiosLinea .verNumeroLinea").val(respuesta["numero"]);
			$("#modalRegistrarCambiosLinea .idPlacaLinea").val(respuesta["id_vehiculo"]);
			$("#modalRegistrarCambiosLinea .verSimCard").val(respuesta["sim_card"]);
			$("#modalRegistrarCambiosLinea .sim_card_nuevo").val(respuesta["sim_card"]);
			$("#modalRegistrarCambiosLinea .verOperadorLinea").val(respuesta["operador"]);
            var idVehiculo = respuesta["id_vehiculo"];
    
            var datosVehiculo = new FormData();
            datosVehiculo.append("idVehiculo", idVehiculo);
    
            $.ajax({
    
            url:"ajax/vehiculos.ajax.php",
            method: "POST",
            data: datosVehiculo,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(vehiculo){

                console.log(vehiculo);
    
    
                $("#modalRegistrarCambiosLinea .verPlacaLinea").val(vehiculo["placa"]);
    
    
            }
    
            })


		}

	})
});









$(".tablaLineas tbody").on("click", ".btnActivar", function(){

	var idLinea = $(this).attr("idLinea");
	var estadoLinea = $(this).attr("estadoLinea");

	var datos = new FormData();
 	datos.append("activarId", idLinea);
  	datos.append("activarLinea", estadoLinea);

  	$.ajax({

  		 url:"ajax/lineas.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){

      		console.log(respuesta);


      	}

  	});

  	if(estadoLinea == 0){

  		$(this).removeClass('btn-warning');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoLinea',1);

  		//$(".idLinea"+idLinea).removeAttr("disabled");
  		iziToast.show({
              title: '<h4><label class="label-danger">LINEA DESACTIVADA</label></h4>',
              message: '<br>Se ha desactivado',
              theme: 'light',
              layout: 2,
              displayMode: 2,
              progressBar: false,
              imageWidth: 325,
              timeout: 3000,
              transitionIn: 'bounceInLeft',
              onClosed: function () {
                //location.reload();
              }
     	});

  	}if(estadoLinea == 1){

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoLinea',2);
  		//$(".idLinea"+idLinea).attr("disabled", "disabled");
  		iziToast.show({
              title: '<h4><label class="label-success">LINEA ACTIVADA</label></h4>',
              message: '<br>Se ha activado',
              theme: 'light',
              layout: 2,
              displayMode: 2,
              progressBar: false,
              imageWidth: 325,
              timeout: 3000,
              transitionIn: 'bounceInLeft',
              onClosed: function () {
                //location.reload();
              }
     	});

  	}
if(estadoLinea == 2){

  		$(this).addClass('btn-warning');
  		$(this).removeClass('btn-success');
  		$(this).html('Suspendido');
  		$(this).attr('estadoLinea',0);
  		//$(".idLinea"+idLinea).attr("disabled", "disabled");
  		iziToast.show({
              title: '<h4><label class="label-warning">LINEA SUSPENDIDA</label></h4>',
              message: '<br>Se ha suspendido',
              theme: 'light',
              layout: 2,
              displayMode: 2,
              progressBar: false,
              imageWidth: 325,
              timeout: 3000,
              transitionIn: 'bounceInLeft',
              onClosed: function () {
                //location.reload();
              }
     	});

  	}
})

//crear 
$("#modalAgregarLinea").on("change", ".cambioTipo", function(){
    if ($(this).val() == 1) {
        $(".tipoCambioSuspencion").show();
        $(".tipoCambioNumero").hide();
        $(".fechaInicio").attr("required");
        $(".numero_nuevo").removeAttr("required");
    } else {
        $(".tipoCambioSuspencion").hide();
        $(".tipoCambioNumero").show(); 
        $(".fechaInicio").removeAttr("required");
        $(".sim_card_nuevo").attr("required");
        $(".numero_nuevo").attr("required");
    }
    
});

$("#modalAgregarLinea").on("change", "#autocomplete-ajax-lineas", function(){

    

    if ($("#modalAgregarLinea #autocomplete-ajax-lineas").val()) {
        console.log("ocupado")
        $(".estadoLinea").val(2);
    } else {
        $(".estadoLinea").val(0);

    }
    
});

//editar
$("#modalEditarLinea").on("change", "#autocomplete-ajax-lineasEditar", function(){

    //console.log($(this).val());
    if ($("#modalEditarLinea #autocomplete-ajax-lineasEditar").val()) {

        $(".editarPlacaLinea").removeAttr("required");
        $(".editarEstadoLinea").val(2);
    } else {

        $(".editarEstadoLinea").val(0);

    }
    
});

$("#modalRegistrarCambiosLinea").on("change", ".cambioTipo", function(){
    if ($(this).val() == 1) {
        $(".editartipoCambioSuspencion").show();
        $(".editartipoCambioNumero").hide();
        $(".fechaInicio").attr("required");
        $(".numero_nuevo").removeAttr("required");
    } else {
        $(".editartipoCambioSuspencion").hide();
        $(".editartipoCambioNumero").show(); 
        $(".fechaInicio").removeAttr("required");
        $(".sim_card_nuevo").attr("required");
        $(".numero_nuevo").attr("required");
    }
    
});




/*=============================================
VER INFO CAMBIOS
=============================================*/

$(".tablaLineas tbody").on("click", ".btnVerCambiosLinea ", function(){
    $(".tablaListaCambios .listaCambiosLinea").html('');
  
    var idlinea = $(this).attr("idLinea");
  
    //console.log(idcobro);
  
    var datos = new FormData();
    datos.append("idLinea", idlinea);
  
  
    $.ajax({
      url: "ajax/lineas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(linea){
  
        //$("#modalVerInfoCobro .empresa").html(respuesta["empresa"]);
  
        var idVehiculo = linea["id_vehiculo"];
  
        var datosVehiculo = new FormData();
        datosVehiculo.append("idVehiculo", idVehiculo);
  
        $.ajax({
  
          url:"ajax/vehiculos.ajax.php",
          method: "POST",
          data: datosVehiculo,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(vehiculo){

            //console.log(vehiculo);
  
  
            $("#modalVerCambiosLinea .vehiculo").html(vehiculo["placa"]);
  
  
          }
  
        })
  
        $("#modalVerCambiosLinea .simcard").html(linea["sim_card"]);
        $("#modalVerCambiosLinea .numero").html(linea["numero"]);
        $("#modalVerCambiosLinea .operador").html(linea["operador"]);

        //console.log(linea["estado"]);
        switch (linea["estado"]) {
            case '0':
                
                $("#modalVerCambiosLinea .estado").html("LIBRE");
                break;
            case '1':
                
                $("#modalVerCambiosLinea .estado").html("SUSPENDIDO");
                break;
            case '2':
                
                $("#modalVerCambiosLinea .estado").html("OCUPADO");
                break;
        } 
  
        var idLinea = linea["id"];
  
        var datosCambio = new FormData();
        datosCambio.append("idLineaCambio", idLinea);

        $.ajax({
  
          url:"ajax/lineas.ajax.php",
          method: "POST",
          data: datosCambio,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(cambios){
           // console.log(cambios);
  
            if (cambios.length > 0) {
              function ArrayRegistroCobro(element, index, array) {
  
                //console.log("hay");
                var options = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
                var fechaN = new Date(element.fecha)
                var fechaFormat = fechaN.toLocaleDateString("es-ES", options);
                //COMPROBAR TIPO DE CAMBIOS
                if (element.tipo_cambio == 0) {

                    var cambio = "CAMBIO DE NUMERO";
                    var fecha_suspencion = "";
                    var color = "red";                    
                } else if (element.tipo_cambio == 1){

                    var cambio = "SUSPENCION";
                    var fecha_suspencion = element.fecha_suspencion+' - '+element.fecha_suspencion_fin;
                    var color = "black"

                    
                }else{
                    var cambio = "CAMBIO DE SIM";
                    var fecha_suspencion = ""
                    var color = "black"
                    var colorSim = "red";
                }

                //CONSULTAR PLACA
                var idVehiculo = element.placa;
  
                var datosVehiculo = new FormData();
                datosVehiculo.append("idVehiculo", idVehiculo);
          
                $.ajax({
          
                  url:"ajax/vehiculos.ajax.php",
                  method: "POST",
                  data: datosVehiculo,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(vehiculo){
                    var placa = "";
                    if (vehiculo) {
                        placa = vehiculo["placa"];
                    }

                    var usuarioid = element.id_usuario;
                    var datos = new FormData();
                    datos.append("usuario", usuarioid);
                    datos.append("item", "id");
                    //console.log(usuarioid);
                
                    $.ajax({
                
                        url:"ajax/usuarios.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(usuario){
                            console.log(usuario["nombre"]);

                            $(".tablaListaCambios .listaCambiosLinea").append('<tr class="row100">'+
                            '<td class="column100 column1" data-column="column1">'+(index+1)+'</td>'+
                            '<td class="column100 column2" data-column="column2">'+cambio+'</td>'+
                            '<td class="column100 column3" data-column="column3" style="color:'+colorSim+'">'+element.sim_card+'</td>'+
                            '<td class="column100 column4" data-column="column4" style="color:'+color+'">'+element.numero+'</td>'+
                            '<td class="column100 column5" data-column="column5">'+fecha_suspencion+'</td>'+
                            '<td class="column100 column6" data-column="column6"> '+placa+' </td>'+
                            '<td class="column100 column7" data-column="column7">'+usuario["nombre"]+'</td>'+
                            '<td class="column100 column8" data-column="column8">'+fechaFormat+'</td>'+
                            '</tr>');
                
                
                            
                        }
                
                    })


                  }
          
                })
  

  
  
  
  
                }
  
                cambios.forEach(ArrayRegistroCobro);
  
  
  
  
  
            }else{
              $(".tablaListaCambios .listaCambiosLinea").append('<tr class="row100"><td class="column100 column1" data-column="column1"></td>'+
                                                    '<td class="column100 column2" colspan="4" data-column="column2">No existen Registros</td>'+
                                                '</tr>');
  
            }
  
  
          }
  
        })
  
  
  
  
      }
  
  
    })
  
  
})



/**
 * VERIFICAR QUE NO EXISTA SIM CARD
 * 
 */
 $('.formularioLineas .simCard').on('change', function () {

	$(".sim_cardRepetido").remove();

	var sim_card = $(this).val();

	var datos = new FormData();
	datos.append("sim_card", sim_card);
	datos.append("item", "sim_card");

	$.ajax({
	    url:"ajax/lineas.ajax.php",
	    method: "POST",
      	data: datos,
     	cache: false,
     	contentType: false,
        processData: false,
        success: function(respuesta){

            //console.log(respuesta);

	        if(respuesta !== "false"){

	        	$('.formularioLineas .simCard').parent().after('<label class="sim_cardRepetido" style="color:red"><strong>ERROR:</strong> Este Sim Card ya esta registrado</label>');
	      
	        }
	        
	    }

	})

});