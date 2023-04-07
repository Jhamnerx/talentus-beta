<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Gestor Mensajes
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="mensajes"><i class="fa fa-laptop"></i> Mensajes</a></li>

      <li class="active">Gestor Mensajes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <?php 


      if ($_SESSION["administracion"] == "true") {
        
       ?>
       
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaMensajes" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">#</th>
               <th>Nombre</th>
               <th>Email</th>
               <th>Empresa</th>
               <th>Telefono</th>
               <th>Mensaje</th>
               <th>Fecha</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

      <?php 
        }else{


          echo '<div class="alert alert-danger alert-dismissible">
                
                <h4><i class="icon fa fa-ban"></i> No tienes permisos!</h4>
                Lo Sentimos no tienes permisos para acceder a esta pagina.
              </div>';
        }
       ?>

    </div>

  </section>

</div>


