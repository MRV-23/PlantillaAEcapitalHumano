<?php 
$cafies = Cursos::verificarRegistro(1);
$botonCafies = $cafies == 1 ? 'disabled' : '';
?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-play icono-encabezado"></i> CURSOS DISPONIBLES</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row" style="display:flex; align-items:center;">
              <div class="col-sm-6">
                <button type="button" class="btn btn-success btn-lg btn-block CAFIES" value="CAFIES Capacitación Fiscal Especializada" name="1" <?php echo $botonCafies; ?>>Inscribirme <i class="fa fa-plus" aria-hidden="true"></i></button>
              </div>
              <div class="col-sm-6">
                <h2>CAFIES Capacitación Fiscal Especializada</h2>
              </div>
            </div>
        </div>

       
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-list-ul icono-encabezado"></i> MIS CURSOS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <div id="cursoCAFIES">
            <?php if($cafies):?>
              <div class="row text-center">
                <h2>CAFIES Capacitación Fiscal Especializada</h2>
              </div>
              <div class="videoTutoriales">
                <div class="sub-videos"><img alt="intranet/cursos-asesores/CAFIES - Online - Google Chrome 06_07_19 9_08_37 AM.mp4" src="views/img/modulo_1_1.png" class="visor-crow-video2"></div>
                <div class="sub-videos"><img alt="intranet/cursos-asesores/CAFIES - Online - Google Chrome 06_07_19 11_24_45 AM.mp4" src="views/img/modulo_1_2.png" class="visor-crow-video2"></div>
                <div class="sub-videos"><img alt="intranet/cursos-asesores/CAFIES - Online - Google Chrome 06_07_19 1_31_47 PM.mp4" src="views/img/modulo_1_3.png" class="visor-crow-video2"></div>
                <div class="sub-videos"><img alt="intranet/cursos-asesores/CAFIES - Online - Google Chrome 13_07_19 9_20_20 AM.mp4" src="views/img/modulo_2_1.png" class="visor-crow-video2"></div>
                <div class="sub-videos"><img alt="intranet/cursos-asesores/CAFIES - Online - Google Chrome 13_07_19 11_25_29 AM.mp4" src="views/img/modulo_2_2.png" class="visor-crow-video2"></div>
                <div class="sub-videos"><img alt="intranet/cursos-asesores/CAFIES - Online - Google Chrome 13_07_19 1_25_35 PM.mp4" src="views/img/modulo_2_3.png" class="visor-crow-video2"></div>
              </div>
            <?php endif;?>  
          </div>

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