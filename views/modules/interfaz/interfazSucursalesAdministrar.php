
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ADMINISTRAR SUCURSALES</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body administrar-sucursales">

          <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total de sucursales: </span>
                            <span class="info-box-number"><?php echo gestionSucursales::totalRegistrosControllers(); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
          </div>

       
          <div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoSucursalEncabezado">Nombre</div>
            <div class="campoDireccionEncabezado">Dirección</div>
            <div class="campoTelefonoEncabezado">Telefono</div>
            <div class="campoOpcionesEncabezado">Opciones</div>
          </div>

          <div id="mostrarDatosSucursal">
            <?php
                $sucursales = new gestionSucursales();
                $sucursales -> mostrarSucursalesController();
            ?>
          </div>

        </div><!-- /.box-body -->
        
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->