
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"> <i class="fa fa-server icono-encabezado"></i> <i class="fa fa-link text-blue" aria-hidden="true"></i><i class="fa fa-building icono-encabezado"></i> VINCULAR DEPARTAMENTOS A SUCURSAL</h3>
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
        <form method="POST" style="margin-top: 2%;"  id="formularioVinculacionSucursalDepartamento">
                     <!-- primera fila -->
                    <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="passActual">1.-Sucursal:</label> <i class="fa fa-check-circle text-green"></i>
                           <select class="form-control textoMay" name="departamentoVincularSucursal" id="departamentoVincularSucursal" required>
                              <?php                             
                              echo'<option></option>';
                              $sucursales = new gestionSucursales();
                              $sucursales -> vistaSucursalesController();
                              ?>
                          </select>
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
                            <label for="">2.-Departamentos no vinculados:</label> <i class="fa fa-check-circle text-green"></i>
                              <div id="targetVincularDepartamento">
                                <select class="form-control textoMay" name="departamentoVincularDepartamento" id="departamentoVincularDepartamento" readonly>               
                                    <option></option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-4">
                        <br>
                          <button class="btn btn-info" id="anadirVinculoSucursalDepartamento">Añadir</button>
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
                            <ol id="misVinculosSucursalDepartamento">
                             
                            </ol>
                          </div>
                        </div>
                        <div class="col-md-4">
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
                        <button class="btn btn-default" id="listarDepartamentosVinculados" data-toggle="modal" data-target="#listarDepartamentosVinculadosModal">Departamentos vinculados a la sucursal seleccionada</button>
                        </div>
                        <div class="col-md-4">
                        </div>
                      </div>
                    </div>


                    
                      <!--Ventana modal-->
          <div class="modal fade bd-example-modal-lg fade" id="listarDepartamentosVinculadosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DEPARTAMENTOS DE SUCURSAL: <b><span id="tituloDepartamento"></span></b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                    

                      <div class="modal-body">
                       <div class="row">

                         <div class="col-md-4">
                              <div class="info-box">
                                  <span class="info-box-icon bg-aqua"><i class="fa fa-server "></i></span>
                                  <div class="info-box-content">
                                      <span class="info-box-text">Total: </span>
                                      <span class="info-box-number" id="totalDepAjaxTodos"></span>
                                  </div>
                                  <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                          </div>
                         
                          <div class="col-md-4">
                              <div class="info-box">
                                  <span class="info-box-icon bg-green"><i class="fa fa-link "></i></span>
                                  <div class="info-box-content">
                                      <span class="info-box-text">Vinculados: </span>
                                      <span class="info-box-number" id="totalDepAjax"></span>
                                  </div>
                                  <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                          </div>
                        
                          <div class="col-md-4">
                              <div class="info-box">
                                  <span class="info-box-icon bg-yellow"><i class="fa fa-chain-broken "></i></span>
                                  <div class="info-box-content">
                                      <span class="info-box-text">No vinculados: </span>
                                      <span class="info-box-number" id="totalNoDepAjax"></span>
                                  </div>
                                  <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                          </div>
                        </div>  

                        <div id="cargarRelacionSucursalDepartamento">
                        </div>
                      </div>
                      <div class="modal-footer estilos-centrar" id="targetBotones">
                      <button class="btn btn-warning" id="desvincularSucursal" name="desvincularSucursal">Desvincular sucursal</button>
                      </div>
                  </div>
              </div>
          </div>
          <!--Ventana modal-->

                    <hr>
                    <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                    <div class="estilos-centrar">
                      <button type="submit" class="btn btn-success" id="formularioGuardarPuesto">Aceptar</button>
                      <button type="reset" class="btn btn-danger" id="formularioCancelarDepartamento">Cancelar</button>  
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