
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
           <h3 class="box-title"><i class="fa fa-archive icono-encabezado"></i> REGISTRAR PAQUETE</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
      <!--pestañas-->
        <div role="tabpanel">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Envio interno</a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Envio externo</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
              <!-- Formulario paquetes internos-->
              <form method="GET" style="margin-top: 2%;" id="formularioPaqueteInterno">
                    <!-- primera fila -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="">1.-Sucursal destino:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <select class="form-control textoMay" name="sucursalDestinoPaquete" id="sucursalDestinoPaquete" required>
                          <option value=""></option>
                            <?php
                              $sucursales= new gestionSucursales();
                              $sucursales -> vistaSucursalesControllerPaqueteria();
                            ?>
                          </select>
                        </div>
                        <!--tercera columna -->
                        <div class="col-md-6">
                            <label for="">2.-Destinatario:</label>
                            <i class="fa fa-check-circle text-green"></i>
                            <span id="targetdestinatarioPaquete">
                                <select class="form-control textoMay" name="equipoUsuarioCargo" readonly>
                                  <option></option>
                                </select>
                            </span>
                        </div>
                      </div>
                    </div>
                    <!-- segunda fila -->
                    <div class="form-group">
                      <div class="row">
                        <!-- primera columna -->
                        <div class="col-md-6">
                        <label for="">3.-Tipo de envio:</label>
                        <i class="fa fa-check-circle text-green"></i>
                          <select class="form-control textoMay" name="tipoEnvio" required>
                            <option value="1">Estandar</option>
                            <option value="2">Express</option>
                          </select>
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-6">
                        <label for="">4.-Seguro de envio:</label>
                        <i class="fa fa-check-circle text-green"></i>
                          <select class="form-control textoMay" name="seguroEnvio" required>
                            <option value="1">No</option>
                            <option value="2">Sí</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- tercera fila -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                        <label for="" >6.-Descripción del contenido:</label>
                        <i class="fa fa-check-circle text-green"></i>
                          <textarea name="descripcion" class="form-control textoMay textAreaImportante" rows="4" style="resize:vertical;" placeholder="...Describe detalladamente el contenido de tu paquete, es muy importante que sea lo más explícito posible, esto con la finalidad de que el destinatario corrobore que el contenido recibido es exactamente lo que esperaba recibir."></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                        <label for="">7.-Comentarios:</label>
                          <textarea name="comentarios" class="form-control textoMay" rows="2" style="resize:vertical;"></textarea>
                        </div>
                      </div>
                    </div>


                    <div class="form-group" id="cargarMensajeroLocal">
                     
                    </div>

                    <div class="estilos-centrar">
                    <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                      <button type="submit" class="btn btn-success">Aceptar</button>
                      <button type="button" class="btn btn-danger" id="formularioCancelarPaqueteInterno">Cancelar</button>     
                    </div>  
                  </form>
                <!-- Fin Formulario -->
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                  <!-- Formulario paquetes externos-->
                  <form method="POST" style="margin-top: 2%;" id="formularioPaqueteExterno">
                    <!-- primera fila -->
                    <div class="form-group">
                      <div class="row">
                      <div class="col-md-4">
                          <label for="">1.-Compañia:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input  class="form-control textoMay"type="text" name="compania" required>
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                        <label for="">2.-Contacto:</label>
                        <i class="fa fa-check-circle text-green"></i>
                          <input  class="form-control textoMay"type="text" name="destinatario" required>
                        </div>
                        <!-- tercera columna -->
                        <div class="col-md-4">
                            <label for="">3.-Correo electrónico:</label>
                            <input  class="form-control" type="text" name="correo" pattern="[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" title="Escribe un correo valido">
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="row">
                      <div class="col-md-4">
                          <label for="">4.-Teléfono:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input  class="form-control celular" type="text" name="telefono" placeholder="10 digitos" pattern="[0-9()\s-]{14}" required>
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                            <label for="">5.-Código postal:</label>
                            <i class="fa fa-check-circle text-green"></i>
                            <input  class="form-control codigoPostal" type="text" id="codigoPostalPaquete" name="codigoPostalPaquete"  title="Debe contener 5 digitos" minlength="5" maxlength="5" pattern="[0-9]{5}" autocomplete="off" required>
                        </div>
                        <!-- tercera columna -->
                        <div class="col-md-4">
                            <label for="">6.-Estado:</label>
                            <i class="fa fa-check-circle text-green"></i>
                            <input class="form-control textoMay" type="text" name="estado" id="estadoPaqueteria" readonly required>
                        </div>
                      </div>
                    </div>

                    <!-- segunda fila -->
                    <div class="form-group">
                      <div class="row">
                        <!-- primera columna -->
                        <div class="col-md-4">
                          <label for="">7.-Municipio:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input class="form-control textoMay" type="text" name="municipio" id= "municipioPaqueteria" readonly required>
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="">8.-Colonia:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <span id="targetColoniaPaqueteria">
                              <select class="form-control textoMay" name="coloniaPaqueteria" readonly required>
                                  <option></option>
                              </select>
                          </span>
                        </div>
                        <!-- tercera columna -->    
                        <div class="col-md-4">	
                          <label for="">9.-Dirección:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input class="form-control textoMay" type="text" name="direccion" required>
                        </div>
                      </div>
                    </div>
                    <!-- tercera fila -->
                    <div class="form-group">
                      <div class="row">
                        <!-- primera columna -->
                        <div class="col-md-2">
                          <label for="">10.-No Exterior:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input class="form-control" type="text" name="numeroExterior" required>
                        </div>
                        <div class="col-md-2">
                          <label for="">11.-No Interior:</label>
                          <input class="form-control" type="text" name="numeroInterior">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="">12.-Tipo de envio:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <select  class="form-control textoMay" name="tipoEnvio" required>
                            <option value="1">Estandar</option>
                            <option value="2">Express</option>
                          </select>
                        </div>
                        <!-- tercera columna -->
                        <div class="col-md-4">
                        <label for="">13.-Seguro de envio:</label>
                        <i class="fa fa-check-circle text-green"></i>
                          <select  class="form-control textoMay" name="tipoSeguro" required>
                            <option value="1">No</option>
                            <option value="2">Sí</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- cuarta fila -->
                    <div class="form-group">
                      <div class="row">
                        <!-- primera columna -->
                        <div class="col-md-12">
                        <label for="">14.-Comentarios:</label>
                          <textarea name="comentarios" class="form-control textoMay" style="resize:vertical;" rows="4"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="estilos-centrar">
                      <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                      <button type="submit" class="btn btn-success">Aceptar</button>
                      <button type="button" class="btn btn-danger" id="formularioCancelarPaqueteExterno">Cancelar</button>  
                    </div>
                  </form>
              <!-- Fin Formulario -->
                </div>
            </div>
        </div>
      <!--fin pestañas-->
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