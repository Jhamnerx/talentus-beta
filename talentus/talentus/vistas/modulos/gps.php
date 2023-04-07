<div class="content-wrapper">

   <section class="content-header">

      <h1>
         Almacen GPS's
      </h1>

      <ol class="breadcrumb">

         <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
         <li><a href="gps"><i class="fa fa-laptop"></i> GPS's</a></li>

         <li class="active">Almacen GPS's</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">

         <div class="box-header with-border">

            <button class="btn btn-primary modalAgregarGps" data-toggle="modal" data-target="#modalAgregarGps">

               AÑADIR

            </button>

         </div>

         <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaGps" width="100%">

               <thead>

                  <tr>

                     <th style="width:10px">#</th>
                     <th>IMEI</th>
                     <th>MODELO</th>
                     <th>MARCA</th>
                     <th>ESTADO</th>
                     <th>ACCIONES</th>

                  </tr>

               </thead>

            </table>

         </div>

      </div>

   </section>

</div>

<!--=====================================
MODAL AGREGAR DISPOSITIVO
======================================-->

<div id="modalAgregarGps" class="modal fade" role="dialog">

   <div class="modal-dialog modal-md">

      <div class="modal-content">

         <form method="post" enctype="multipart/form-data">

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Agregar</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

               <div class="box-body">

                  <!--=====================================
                  ENTRADA PARA LA MARCA DEL DISPOSITIVO
                  ======================================-->

                  <div class="form-group col-md-6 col-xs-12">
                     <label>IMEI:</label>
                     <div class="input-group">

                        <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></i></span>

                        <input onkeypress="return validarNumeros(event);" type="tel" class="form-control input-lg validarGps imeiGps" placeholder="INGRESAR IMEI" name="imei" maxlength="26" required>

                     </div>

                  </div>

                  <!--=====================================
                  ENTRADA MODELO DEL GPS
                  ======================================-->
                  <div class="form-group col-md-6 col-xs-12">

                     <label>MODELO:</label>

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fas fa-location-arrow"></i></span>
                        <select name="modeloGps" class="form-control input-lg select2 dispositivo" data-live-search="true" required>

                        </select>
                        <!-- /btn-group -->

                     </div>

                  </div>

               </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

         </form>
         <?php


         $crear = new ControladorGps();
         $crear->ctrCrearGps();

         ?>

      </div>

   </div>

</div>
<?php


$eliminarGps = new ControladorGps();
$eliminarGps->ctrEliminarGps();

?>

<script src="<?php echo $url;
               Utiles::auto_version('vistas/js/gestorGps.js'); ?>"></script>