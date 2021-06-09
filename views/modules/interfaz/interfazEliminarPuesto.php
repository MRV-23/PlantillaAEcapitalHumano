
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ELIMINAR PUESTOS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body administrar-departamentos">
       
        <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-th "></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total de puestos: </span>
                            <span class="info-box-number"><?php echo gestionSucursalesDepartamentos::totalPuestosController(); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
        </div>

        <div class="form-group">
            <div class="row">
              <!-- primera columna -->
                <div class="col-md-2">
                </div>
                <!-- segunda columna -->
                <div class="col-md-8">     
                    <div class="renglonEncabezado">
                      <div class="campoIdEncabezado">No.</div>
                      <div class="campoDepartamentoEncabezado">Puesto</div>
                      <div class="campoOpcionesEncabezado">Opciones</div>
                    </div>
                    <div id="mostrarSucursal">
                       <?php
                          $departamentos = new gestionSucursalesDepartamentos();
                          $departamentos -> mostrarPuestosTodosEliminar();
                      ?>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
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