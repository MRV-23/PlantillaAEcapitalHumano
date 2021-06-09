 <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-ticket icono-encabezado"></i> TICKETS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

                      <!-- Formulario-->
                    <form method="POST" style="margin-top: 2%;"  id="formularioCargarNutricion" enctype="multipart/form-data">
                        <div class="max1000">
                      
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <span><b>Descargar formato</b></span>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                  <div class="btn btn-default btn-lg" style="width:200px;">
                                          <i class="fa fa-download"></i>
                                          <a href="views/tutoriales/Formato.xlsx" download="Formato resultados">Formato</a>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            <br>
                            <hr>

                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <span><b>Selecciona el archivo (formato Excel) que deseas subir al sistema</b></span>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                            <br>
  
                            <div id="lienzoDocumentoNutricion"> </div>

                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <span class="btn btn-default btn-lg btn-file" style="width:200px;">
                                  <i class="fa fa-upload"></i> Seleccionar 
                                  <input type="file" name="cargarDocumentoNutricion" id="cargarDocumentoNutricion" required>
                                </span>                               
                              </div>
                            </div>
                        
                        </div><!--max1000-->
                      
                        <hr>
                        <div class="estilos-centrar">
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Procesar</button>
                        </div>
                    </form>
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