<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    SERVICIO
    <small>TECNICO</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Servicio Tecnico</li>

    </ol>

  </section>
  <!-- content-header -->
    <div class="box-header with-border">
      <button class="btn btn-success btnObtenerReporteTareas" data-toggle="modal" data-target="#modalReporteTareas">

        Reporte de tareas

      </button>
    </div>
  <!-- content -->
  <section class="content">
    
    <!-- row -->
    <div class="row">

       <?php


        include "tecnico/cajas-superiores.php";

      
      ?>

    </div>
    <!-- row -->

    <!-- row -->
    <div class="row">

       <div class="col-lg-12">

        <?php

         include "tecnico/cajas-medias.php";

        ?>

      </div>

    </div>
    <!-- row -->


    <!-- row TECNICOS AÑADIR Y MAS -->
    <div class="row">

       <div class="col-lg-12">

        <?php

         include "tecnico/tecnicos.php";

        ?>

      </div>

    </div>
    <!-- row -->


 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->

<script type="text/javascript">

$(".TareasNoLeidasclick").on("click", function(){

  var myVar = 0;
  myVar = setInterval(ciclo, 5000);

  $('.close').blur(function () {

    clearInterval(myVar);

  });

})


function ciclo (){

 $.get("ajax/tarea.ajax.php?verTareasNoleidas=1", function( data ) {

    const tarea = JSON.parse(data);

    if (tarea.success==true) {

      //console.log("actualizado exitosamente")

      tarea.registro.map((columna)=>{
        //console.log(columna)
        $( "#bodytable" ).append('<tr role="row" class="odd task'+columna.id+'">'+
                '<td class="sorting_1">'+columna.key+'</td>'+
                '<td>'+columna.tipo+'</td>'+
                '<td>'+columna.id_admin+'</td>'+
                '<td>'+columna.descripcion+'</td>'+
                '<td>'+
                  '<div class="btn-group"><button class="btn btn-danger btnCancelarTarea idtarea="'+columna.id+'"><i class="fa fa-times"></i></button></div>'+
                '</td>'+
              '</tr>');
        //$("#bodytable").hide().appendTo("<tr><td>"+columna.titulo+"</td><td>"+columna.mensaje+"</td><td>"+columna.desde+"</td></tr>").show('normal');

      })

    }
    else{
      // console.log("no hay datos "+tarea.success)
       //$( "#bodytable" ).append('<tr role="row" class="odd"> <td class="sorting_1" colspan="6">No hay Datos</td>  </tr>')
    }

  });

} 
 

</script>

   <?php


    $eliminarTarea = new ControladorTareas();
    $eliminarTarea -> ctrEliminarTarea();

  ?>



  <!--=====================================
MODAL REPORTE RECIBO PAGADO
======================================-->

<div id="modalReporteTareas" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">REPORTE DE TAREAS</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="col-md-12">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">SELECCIONAR FECHAS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


              <div class="form-group col-xs-6">
                <label>Fecha Inicio(*):</label>
                <input type="date" class="form-control fechaTareaChange fechaReporteTareaInicio" name="fechaReporteTareaInicio" id="fechaReporteTareaInicio" required="">
              </div>

              <div class="form-group col-xs-6">
                <label>Fecha Fin(*):</label>
                <input type="date" class="form-control fechaTareaChange fechaReporteTareaFin" name="fechaReporteTareaFin" id="fechaReporteTareaFin" required="">
              </div>

              <div class="form-group col-xs-6">
                <label>Estado:</label>

                <select type="text" class="form-control fechaTareaChange input-md estadoReporteTarea" name="estadoReporteTarea" required="">

                  <option value="2">TERMINADO</option>

                  <option value="0">CANCELADO</option>


                </select>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


        <div class="modal-body">

          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped dt-responsive table-hover tablaReporteTarea" width="100%">

              <thead>

                <tr>

                   <th style="width:10px">#</th>
                   <th>Tecnico</th>
                   <th>Tarea</th>
                   <th>Descripcion</th>
                   <th>Empresa</th>
                   <th>Info Sim</th>
                   <th>Costo</th>
                   <th>Imagen</th>
                   <th>Validacion</th>
                   <th>Fecha</th>
                   <th>Estado</th>

                </tr>

              </thead>

            </table>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>


        </div>

      </form>



    </div>

  </div>

</div>
