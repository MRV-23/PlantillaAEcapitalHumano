
  
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-th icono-encabezado"></i> REGISTRAR PUESTO</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        <!-- Formulario-->
        <form method="POST" style="margin-top: 2%;"  id="formularioNuevoPuesto">
                     <!-- segunda fila -->
                     <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                        <label for="">1.-Puesto:</label> <i class="fa fa-check-circle text-green"></i>
                             <input  class="form-control textoMay" type="text" id="nombreNuevoPuesto" name="nombreNuevoPuesto" autocomplete="off" title="Sólo letras, números y espacios">
                        </div>
                        <div class="col-md-4">
                        <br>
                          <button class="btn btn-info" id="anadirPuesto">Añadir</button>
                        </div>
                      </div>
                    </div>
                
                    <!-- segunda fila -->
                    <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <div class="agregarDepartamentos">
                            <ol id="misPuestos">
                            </ol>
                          </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                      </div>
                    </div>


                      <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                        <button class="btn btn-default" id="listarPuestos" data-toggle="modal" data-target="#listarPuestosModal">Puestos Existentes</button>
                        </div>
                        <div class="col-md-4">
                        </div>
                      </div>
                    </div>


                      <!--Ventana modal-->
                    <div class="modal fade bd-example-modal-lg fade" id="listarPuestosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                      <div class="col-xs-12">
                                          <div class="info-box">
                                              <span class="info-box-icon bg-aqua"><i class="fa fa-th "></i></span>
                                              <div class="info-box-content">
                                                  <span class="info-box-text">Total de puestos existentes: </span>
                                                  <span class="info-box-number"><?php echo gestionSucursalesDepartamentos::totalPuestosController(); ?></span>
                                              </div>
                                              <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                      </div>
                                    </div>

                                  <div id ="targetTotalidadPuestos">
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Ventana modal-->

                    <hr>
                    <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                    <div class="estilos-centrar">
                      <button type="submit" class="btn btn-success" id="formularioGuardarPuesto">Aceptar</button>
                      <button type="reset" class="btn btn-danger" id="formularioCancelarPuesto">Cancelar</button>  
                    </div>
                  </form>
                <!-- Fin Formulario -->
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