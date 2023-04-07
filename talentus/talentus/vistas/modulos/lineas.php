<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor Lineas
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="lineas"><i class="fa fa-laptop"></i> Administracion</a></li>

      <li class="active">GESTOR LINEAS/SIM CARD</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <?php


      if ($_SESSION["almacen"] == "true") {

      ?>

        <div class="box-header with-border">

          <button class="btn btn-primary btnAgregarLinea" data-toggle="modal" data-target="#modalAgregarLinea">

            Registrar Linea

          </button>

        </div>

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaLineas" width="100%">

            <thead>

              <tr>

                <th style="width:10px">#</th>
                <th># NUMERO</th>
                <th># SIM CARD</th>
                <th>EMPRESA - PLACA</th>
                <th>OPERADOR</th>
                <th>ESTADO</th>
                <!-- <th style="background-color:#7ade95;">Tipo de Cambio</th>
               <th style="background-color:#7ade95;">Fecha</th>
               <th style="background-color:#7ade95;">Fecha Suspension Inicio</th>
               <th style="background-color:#7ade95;">Fecha Suspension Fin</th>
               <th style="background-color:#7ade95;">Sim Card - Nuevo</th> -->
                <th style="background-color:#7ade95;">CAMBIOS</th>
                <th>ACCIONES</th>

              </tr>

            </thead>

          </table>

        </div>

      <?php
      } else {


        echo '<div class="alert alert-danger alert-dismissible">
                
                <h4><i class="icon fa fa-ban"></i> No tienes permisos!</h4>
                Lo Sentimos no tienes permisos para acceder a esta pagina.
              </div>';
      }
      ?>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR LINEAS
======================================-->

<div id="modalAgregarLinea" class="modal fade" role="dialog">

  <div class="modal-dialog modalLineas">

    <div class="modal-content">

      <form class="formularioLineas" method="post" enctype="multipart/form-data" class="style_form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#052c52; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">REGISTRAR LINEA</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            NUMERO
            ======================================-->
            <div class="form-group col-sm-4 col-xs-12">

              <label for="numero">Numero:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input onkeypress="return validarNumeros(event);" type="tel" class="form-control input-md numero" maxlength="9" placeholder="Numero" name="numeroLinea">

              </div>

            </div>
            <!--=====================================
            SIM CARD
            ======================================-->
            <div class="form-group col-sm-5 col-xs-12">

              <label for="simCard">Sim Card:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sim-card"></i></span>

                <input onkeypress="return validarNumeros(event);" type="tel" class="form-control input-md simCard" placeholder="sim Card" name="sim_card" required maxlength="20">

              </div>

            </div>
            <!--=====================================
            SIM OPERADOR
            ======================================-->
            <div class="form-group col-sm-3 col-xs-12">

              <label for="operador">Operador:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fas fa-blender-phone"></i></span>

                <select class="form-control input-md operadorLinea" name="operadorLinea" id="operadorLinea" required>

                  <option value="Claro">Claro</option>
                  <option value="Entel">Entel</option>
                  <option value="Movistar">Movistar</option>
                  <option value="Bitel">Bitel</option>

                </select>

              </div>

            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <!--=====================================
                ENTRADA DE LA PLACA
                ======================================-->
              <?php

              $opciones = ControladorLineas::ctrMostrarVehiculos(null, null);

              ?>

              <input type="hidden" class="autocompleteVehiculosLineas" value='<?php echo $opciones; ?>'>
              <label>Placa:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                <input type="text" id="autocomplete-ajax-lineas" class="form-control input-md vehiculo" placeholder="Placa" name="vehiculo">
                <input type="hidden" class="placaLinea" name="placaLinea">

              </div>

            </div>

            <!--=====================================
            ESTADO
            ======================================-->
            <div class="form-group col-sm-4 col-xs-12">

              <label for="estadoLinea">Estado:</label>

              <select class="form-control input-md estadoLinea" name="estadoLinea" id="estadoLinea">
                <option value="0">LIBRE</option>
                <option value="1">SUSPENDIDO</option>
                <option value="2">OCUPADO</option>
              </select>


            </div>



          </div>

        </div>
        <div class="panel panel-success" style="margin: 20px;">
          <div class="panel-heading">
            <h4>CAMBIOS</h3>
          </div>
          <div class="panel-body">

            <!--=====================================
            TIPO DE CAMBIO
            ======================================-->
            <div class="form-group col-sm-6 col-xs-12">

              <label for="cambio">Tipo de Cambio:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-filter"></i></span>
                <select class="form-control input-md cambioTipo" name="cambio" id="cambio">
                  <option value="0">CAMBIO DE NUMERO</option>
                  <option value="1">SUSPENCION</option>
                </select>

              </div>

            </div>
            <div class="tipoCambioNumero">
              <div class="form-group col-sm-4 col-xs-12">
                <!--=====================================
                  ENTRADA DE LA PLACA NUEVA
                  ======================================-->
                <label for="placa_nueva">Placa:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-car"></i></span>
                  <input type="text" id="autocomplete-ajax-placa-nueva" class="form-control input-md placa_nueva" placeholder="Placa Nueva" name="placa_nueva">
                  <input type="hidden" class="idplaca_nueva" name="idplaca_nueva">

                </div>

              </div>
              <div class="form-group col-sm-6 col-xs-12">
                <!--=====================================
                  ENTRADA DE LA NUEVA SIM CARD
                  ======================================-->
                <label for="sim_card_nuevo">Nuevo Sim Card:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-car"></i></span>

                  <input onkeypress="return validarNumeros(event);" maxlength="20" type="tel" class="form-control input-md sim_card_nuevo" placeholder="Sim Card Nueva" name="sim_card_nuevo">

                </div>

              </div>

              <!--=====================================
            NUMERO
            ======================================-->
              <div class="form-group col-sm-4 col-xs-12">

                <label for="numero_nuevo">Nuevo Numero:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                  <input onkeypress="return validarNumeros(event);" type="tel" class="form-control input-md numero_nuevo" maxlength="9" placeholder="Numero Nuevo" name="numero_nuevo">

                </div>

              </div>
            </div>

            <div class="tipoCambioSuspencion" style="display: none;">
              <!--=====================================
              FECHA INICIO
              ======================================-->
              <div class="form-group col-sm-6 col-xs-12">
                <label for="fechaInicio">Fecha Inicio</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>

                  <input type="date" class="form-control input-md fechaInicio" name="fechaInicio" id="fechaInicio" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <!--=====================================
              FECHA FIN
              ======================================-->

              <?php
              $fecha = date_create(date("Y-m-d"));
              date_add($fecha, date_interval_create_from_date_string("3 months"));
              $fechafin = date_format($fecha, "Y-m-d");
              ?>

              <div class="form-group col-sm-6 col-xs-12">
                <label for="fechaFin">Fecha Fin</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>

                  <input type="date" class="form-control input-md fechaFin" name="fechaFin" id="fechaFin" value="<?php echo $fechafin; ?>">
                </div>
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


      $crearLinea = new ControladorLineas();
      $crearLinea->ctrCrearLinea();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR LINEAS
======================================-->

<div id="modalEditarLinea" class="modal fade" role="dialog">

  <div class="modal-dialog modalLineas">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data" class="style_form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#052c52; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">EDITAR LINEA</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            NUMERO
            ======================================-->
            <div class="form-group col-sm-4 col-xs-12">

              <label for="editarNumeroLinea">Numero:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input readonly onkeypress="return validarNumeros(event);" type="tel" class="form-control input-md editarNumeroLinea" maxlength="9" placeholder="Numero" name="editarNumeroLinea">
                <input type="hidden" class="idEditarLinea" name="idEditarLinea">
              </div>

            </div>
            <!--=====================================
            SIM CARD
            ======================================-->
            <div class="form-group col-sm-5 col-xs-12">

              <label for="editarSimCard">Sim Card:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sim-card"></i></span>

                <input readonly onkeypress="return validarNumeros(event);" type="tel" class="form-control input-md editarSimCard" placeholder="sim Card" name="editarSim_card" maxlength="20">

              </div>

            </div>
            <!--=====================================
            SIM OPERADOR
            ======================================-->
            <div class="form-group col-sm-3 col-xs-12">

              <label for="editarOperadorLinea">Operador:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fas fa-blender-phone"></i></span>

                <select class="form-control input-md editarOperadorLinea" name="editarOperadorLinea" id="editarOperadorLinea">

                  <option value="Claro">Claro</option>
                  <option value="Entel">Entel</option>
                  <option value="Movistar">Movistar</option>
                  <option value="Bitel">Bitel</option>

                </select>

              </div>

            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <!--=====================================
                ENTRADA DE LA PLACA
                ======================================-->
              <?php

              $opciones = ControladorLineas::ctrMostrarVehiculos(null, null);

              ?>

              <input type="hidden" class="autocompleteVehiculosLineasEditar" value='<?php echo $opciones; ?>'>
              <label>Placa:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                <input type="text" id="autocomplete-ajax-lineasEditar" class="form-control input-md editarVehiculo" name="editarVehiculo" onclick="this.select();">
                <input type="hidden" class="editarPlacaLinea" name="editarPlacaLinea">

              </div>

            </div>

            <!--=====================================
            ESTADO
            ======================================-->
            <div class="form-group col-sm-4 col-xs-12">

              <label for="editarEstadoLinea">Estado:</label>

              <select class="form-control input-md editarEstadoLinea" name="editarEstadoLinea" id="editarEstadoLinea">

                <option value="0">LIBRE</option>
                <option value="1">SUSPENDIDO</option>
                <option value="2">OCUPADO</option>

              </select>

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

      $editarLinea = new ControladorLineas();
      $editarLinea->ctrEditarLinea();

      ?>

    </div>

  </div>

</div>



<!--=====================================
MODAL VER
======================================-->

<div id="modalVerCambiosLinea" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#052c52; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">INFORMACION DE CAMBIOS DE LINEA</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <ul class="list-group">
              <li class="list-group-item"><b>Sim Card: </b><span class="simcard"></span></li>
              <li class="list-group-item"><b>Numero: </b><span class="Numero"></span></li>
              <li class="list-group-item"><b>Operador: </b><span class="operador"></span></li>
              <li class="list-group-item"><b>Vehiculo: </b><span class="vehiculo"></span></li>
              <li class="list-group-item"><b>Estado: </b><span class="estado"></span></li>
            </ul>

            <div class="col-md-12">
              <div class="box box-default collapsed-box">

                <div class="box-header with-border">
                  <h3 class="box-title">Lista de cambios</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>

                <div class="box-body tablaListaCambios">
                  <div class="table100 ver4 m-b-110 table-responsive">
                    <table data-vertable="ver4" class="table table-bordered table-striped dt-responsive dataTable no-footer dtr-inline">
                      <thead>
                        <tr class="row100 head">
                          <th class="column100 column1" data-column="column1">#</th>
                          <th class="column100 column2" data-column="column2">Tipo Cambio</th>
                          <th class="column100 column3" data-column="column3">Sim Card</th>
                          <th class="column100 column4" data-column="column4">Numero</th>
                          <th class="column100 column5" data-column="column5">Fecha Suspencion</th>
                          <th class="column100 column6" data-column="column6">&nbsp;Placa </th>
                          <th class="column100 column7" data-column="column7">Usuario</th>
                          <th class="column100 column8" data-column="column8">Fecha</th>
                        </tr>
                      </thead>
                      <tbody class="listaCambiosLinea" id="listaCambiosLinea">

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <!-- <button type="submit" class="btn btn-primary">Marcar Pagado</button> -->

        </div>

      </form>


    </div>

  </div>

</div>



<!--=====================================
MODAL REGISTRAR CAMBIOS LINEAS
======================================-->

<div id="modalRegistrarCambiosLinea" class="modal fade" role="dialog">

  <div class="modal-dialog modalLineas">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data" class="style_form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#052c52; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">REGISTRAR CAMBIOS</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            NUMERO
            ======================================-->
            <div class="form-group col-sm-4 col-xs-12">

              <label for="verNumeroLinea">Numero:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input readonly type="tel" class="form-control input-md verNumeroLinea" maxlength="9" name="verNumeroLinea">
                <input type="hidden" class="idEditarLinea" name="idVerLinea">
              </div>

            </div>
            <!--=====================================
            SIM CARD
            ======================================-->
            <div class="form-group col-sm-5 col-xs-12">

              <label for="verSimCard">Sim Card:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-sim-card"></i></span>

                <input readonly type="tel" class="form-control input-md verSimCard" placeholder="sim Card" name="verSimCard" maxlength="20">

              </div>

            </div>
            <!--=====================================
            SIM OPERADOR
            ======================================-->
            <div class="form-group col-sm-3 col-xs-12">

              <label for="verOperadorLinea">Operador:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fas fa-blender-phone"></i></span>

                <select readonly="" disabled class="form-control input-md verOperadorLinea" name="verOperadorLinea" id="verOperadorLinea">

                  <option value="Claro">Claro</option>
                  <option value="Entel">Entel</option>
                  <option value="Movistar">Movistar</option>
                  <option value="Bitel">Bitel</option>

                </select>

              </div>

            </div>
            <!--=====================================
            PLACA
            ======================================-->
            <div class="form-group col-sm-4 col-xs-12">

              <label for="verPlacaLinea">Placa:</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input readonly type="text" class="form-control input-md verPlacaLinea" maxlength="9" name="verPlacaLinea">
                <input type="hidden" class="idPlacaLinea" name="idPlacaLinea">
              </div>

            </div>

          </div>

        </div>
        <div class="panel panel-success" style="margin: 20px;">
          <div class="panel-heading">
            <h4>CAMBIOS</h3>
          </div>
          <div class="panel-body">

            <!--=====================================
            TIPO DE CAMBIO
            ======================================-->
            <div class="form-group col-sm-6 col-xs-12">

              <label for="addCambioTipo">Tipo de Cambio:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-filter"></i></span>
                <select class="form-control input-md cambioTipo" name="addCambioTipo" id="addCambioTipo">
                  <option value="0">CAMBIO DE NUMERO</option>
                  <option value="1">SUSPENCION</option>
                  <option value="2">CAMBIO DE SIM</option>
                </select>

              </div>

            </div>
            <div class="editartipoCambioNumero">
              <div class="form-group col-sm-4 col-xs-12">
                <!--=====================================
                  ENTRADA DE LA PLACA NUEVA
                  ======================================-->
                <label for="addPlaca">Placa:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-car"></i></span>
                  <input type="text" id="autocomplete-ajax-placa-cambio" class="form-control input-md placa_nueva" placeholder="Placa Nueva" name="addPlaca">
                  <input type="hidden" class="idplaca_cambio" name="idplaca_nueva">

                </div>

              </div>
              <div class="form-group col-sm-6 col-xs-12">
                <!--=====================================
                  ENTRADA DE LA NUEVA SIM CARD
                  ======================================-->
                <label for="AddSimCard">Sim Card:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-sim-card"></i></span>
                  <input onkeypress="return validarNumeros(event);" maxlength="20" type="tel" class="form-control input-md sim_card_nuevo" placeholder="Sim Card Nueva" name="AddSimCard">

                </div>

              </div>

              <!--=====================================
            NUMERO
            ======================================-->
              <div class="form-group col-sm-4 col-xs-12">

                <label for="addNumero">Numero:</label>

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                  <input onkeypress="return validarNumeros(event);" type="tel" class="form-control input-md numero_nuevo" maxlength="9" placeholder="Numero Nuevo" name="addNumero">

                </div>

              </div>
            </div>

            <div class="editartipoCambioSuspencion" style="display: none;">
              <!--=====================================
              FECHA INICIO
              ======================================-->
              <div class="form-group col-sm-6 col-xs-12">
                <label for="addFechaInicio">Fecha Inicio</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>

                  <input type="date" class="form-control input-md fechaInicio" name="addFechaInicio" id="addFechaInicio" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <!--=====================================
              FECHA FIN
              ======================================-->

              <?php
              $fecha = date_create(date("Y-m-d"));
              date_add($fecha, date_interval_create_from_date_string("3 months"));
              $fechafin = date_format($fecha, "Y-m-d");
              ?>

              <div class="form-group col-sm-6 col-xs-12">
                <label for="addFechaFin">Fecha Fin</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>

                  <input type="date" class="form-control input-md fechaFin" name="addFechaFin" id="addFechaFin" value="<?php echo $fechafin; ?>">
                </div>
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

      $registrarCambiosLinea = new ControladorLineas();
      $registrarCambiosLinea->ctrRegistrarCambiosLinea();

      ?>

    </div>

  </div>

</div>

<script type="text/javascript">
  $(function() {
    $(document).on('click', 'input[type=text]', function() {
      this.select();
    });
  });
</script>