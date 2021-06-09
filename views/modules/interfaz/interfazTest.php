
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-star icono-encabezado" style='background-color: #000000; color: #B8860B;'></i> Testeo Modulos MRV</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body administrar-correos">
          <br>
          <div class="max1000">
            <!--<button type="button" class="btn btn-info">Info</button>-->
                  <form action="" name='formularios_permisos' method='POST'> <!-- Inicio de for de la tabla-->
                      <div id="paginador" style='display: flex;justify-content:flex-end; '></div>
                      <div class="encabezadoTablaUsuarios" style="margin-top: 25px;">
                          <div class="encabezadoNumero" name="" id="">No.</div>
                          <div class="encabezadoNombre">Nombre</div>
                          <div class="encabezadoPuesto">Puesto</div>
                          <div class="encabezadoPermisos">Modificaciones</div>
                      </div>
                      <!--<div id="paginador"></div>-->
                      <div id="dataPermisosUser" name= "dataPermisosUser"class=""> 
                       
                      </div>
                      <div id="paginador2" class="paginador2" style='display: flex;justify-content:flex-end; '></div>
                  </form>
          </div>   
        </div>   
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->