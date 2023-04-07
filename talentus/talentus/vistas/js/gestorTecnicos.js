/*=============================================
CARGAR LA TABLA DINÁMICA DE ACTAS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaTecnicos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log(respuesta);

// 	}

// })

$(".tablaTecnicos").DataTable({
	 "ajax": "ajax/tablaTecnicos.ajax.php",
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
SUBIR IMAGEN
=============================================*/
$(".tablaVerTareaProgreso").on("change", ".fotoTecnico", function(){

    var imagenTecnico = this.files[0];
	var idTareaImagen = $(this).attr("idTarea");

  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagenTecnico["type"] != "image/jpeg" && imagenTecnico["type"] != "image/png"){

      $("#subirTecnico").val("");

      swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    /*=============================================
    VALIDAMOS EL TAMAÑO DE LA IMAGEN
    =============================================*/

    }else if(imagenTecnico["size"] > 4000000){

      $("#subirTecnico").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    /*=============================================
    PREVISUALIZAMOS LA IMAGEN
    =============================================*/

    }else{

		var imagen = new FormData();

		imagen.append("imagenTecnico", imagenTecnico);
		imagen.append("idTareaImagen", idTareaImagen);


	    $.ajax({

	      url:"ajax/tecnico.ajax.php",
	      method: "POST",
	      data: imagen,
	      cache: false,
	      contentType: false,
	      processData: false,
	      success: function(respuesta){

	        console.log(respuesta);

	        if(respuesta == 1){

	          swal({
	              title: "Imagen Cargada",
	              text: "¡Se subio correctamente la imagen!",
	              type: "success",
	              confirmButtonText: "¡Cerrar!"
	            }).then(function(result){
	            if (result.value) {

	            	window.location = "tareas";

	            }
	          });

	        }

	      }

	    });
      var datosImagen = new FileReader;

      datosImagen.readAsDataURL(imagenTecnico);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizarTecnico").attr("src", rutaImagen);

      })

    }


})


$(document).ready(function() {


	// $('.image-popup-vertical-fit').magnificPopup({
	// 	type: 'image',
	// 	closeOnContentClick: true,
	// 	mainClass: 'mfp-img-mobile',
	// 	image: {
	// 		verticalFit: true
	// 	}
		
	// });
	
	$(".tablaVerTareaProgreso").on("click", ".image-popup-vertical-fit", function(){

		$("#modalVerTareaProgreso").modal("toggle");

	})

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		index: '5000',
		closeOnContentClick: true,
		image: {
			verticalFit: true
		}
	});
	$(".tablaVerTareaCompletadas").on("click", ".image-popup-vertical-fit", function(){

		$("#modalVerTareaCompletadas").modal("toggle");

	})

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		index: '5000',
		closeOnContentClick: true,
		image: {
			verticalFit: true
		}
	});


});