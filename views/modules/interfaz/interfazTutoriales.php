
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-thumbs-o-up icono-encabezado"></i> TUTORIALES</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <p>Tutoriales para aprender a utilizar el sistema de intranet de Asesores Empresariales, en esta sección aprenderás a utilizar cada uno de los módulos a los que tienes acceso, únicamente selecciona el video o descarga el tutorial correspondiente.</p>
        </div>

        <!--<div class="videoTutoriales">
          <div class="sub-videos"><img src="views/img/vincular.jpg" alt=""></div>
          <div class="sub-videos"><img src="views/img/vincular.jpg" alt=""></div>
          <div class="sub-videos"><img src="views/img/vincular.jpg" alt=""></div>
          <div class="sub-videos"><img src="views/img/vincular.jpg" alt=""></div>
          <div class="sub-videos"><img src="views/img/vincular.jpg" alt=""></div>
          <div class="sub-videos"><img src="views/img/vincular.jpg" alt=""></div>
        </div>-->
        <!-- /.box-body -->

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 estilos-centrar">
                    <div class="btn btn-default btn-lg" style="width:300px;text-align:left;">
                        <i class="fa fa-download"></i>
                        <a href="views/tutoriales/Tickets.pdf" download="Módulo tickets">Módulo tickets</a>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 estilos-centrar">
                  <div class="btn btn-default btn-lg" style="width:300px;text-align:left;">
                          <i class="fa fa-download"></i>
                          <a href="views/tutoriales/Permisos.pdf" download="Módulo permisos">Módulo permisos</a>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>

            <?php if($_SESSION['identificador'] > 2): ?>
            <br>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 estilos-centrar">
                  <div class="btn btn-default btn-lg" style="width:300px;text-align:left;">
                          <i class="fa fa-download"></i>
                          <a href="views/tutoriales/PermisosAutorizar.pdf" download="Módulo permisos">Módulo autorizar permisos</a>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <?php endif;?>

            <br>
            <div class="row">
                <div class="col-md-4"> 
                </div>
                <div class="col-md-4 estilos-centrar">
                    <div class="btn btn-default btn-lg" style="width:300px;text-align:left;">
                          <i class="fa fa-download"></i>
                          <a href="views/tutoriales/Paqueteria.pdf" download="Módulo paquetería">Módulo paquetería</a>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>

        </div>




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