
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">USUARIOS CONECTADOS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body administrar-correos">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total: </span>
                            <span class="info-box-number"><span id="totalConexiones"></span></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

          <!--<div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoNombreEncabezado">Nombre</div>
            <div class="campoSucursalEncabezado">Sucursal</div>
            <div class="campoDireccionEncabezado">Opciones</div>
          </div>-->

          <div class="row renglon-encabezado mostrar768" style="margin:1px;">
              <div class="col-sm-1 columna-div columna-div-centrar">No.</div>
              <div class="col-sm-4 columna-div columna-div-centrar">Nombre</div>
              <div class="col-sm-3 columna-div columna-div-centrar">Sucursal</div>
              <div class="col-sm-2 columna-div columna-div-centrar">IP</div>
              <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
          </div>

          <div id="targetConexionActivas"></div>
        
          </div>

       
        <!-- /.box-body -->
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