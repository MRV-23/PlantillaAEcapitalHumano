<!-- =============================================== -->
<?php 
ini_set( "display_errors","0");
if(isset($_POST["actualizarSucursal"])){
   $datos = gestionSucursales::mostrarActualizarSucursal($_POST["actualizarSucursal"]);
}
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-building icono-encabezado"></i> REGISTRAR SUCURSAL</h3>
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
        <form method="POST" style="margin-top: 1%;"  id="formularioNuevoSucursal">

                     <!-- primera fila -->
                    <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                          <label for="nombreSucursal">1.-Nombre:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input class="form-control textoMay" type="text" id="nombreSucursal" name="nombreSucursal" value="<?php echo $datos["nombre"] ?>" title="Sólo letras, números, espacios, parentesis y guiones" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.()\s]{2,}" autocomplete="off" required>
                        </div>
                      
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="calleSucursal">2.-Calle o Avenida:</label>
                          <i class="fa fa-check-circle text-green"></i> 
                          <input class="form-control textoMay" type="text" id="calleSucursal" name="calleSucursal" value="<?php echo $datos["calle"] ?>" placeholder="Escribe si es Calle, Avenida, etc." title="Sólo letras, números, espacios y guiones" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{2,}" autocomplete="off" required>
                        </div>
                        <!--Tercer columna -->
                        <div class="col-md-4">
                          <label for="exteriorSucursal">3.-Número exterior:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <div class="lada"><input  class="form-control textoMay ladaSangria" type="text" id="exteriorSucursal" name="exteriorSucursal" value="<?php echo $datos["exterior"] ?>" title="Sólo letras, números, espacios y guiones" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-.\s]{1,}" autocomplete="off" required><span>No.</span></div>
                        </div>
                      </div>
                    </div>

                     <!-- segunda fila -->
                    <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                          <label for="interiorSucursal">4.-Número interior:</label>
                          <div class="lada"><input class="form-control textoMay numeroExteriorSangria" type="text" id="interiorSucursal" name="interiorSucursal" value="<?php echo $datos["interior"] ?>" title="Sólo letras, números, espacios y guiones" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{0,}" autocomplete="off"><span>No. INT.</span></div>
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="codigoSucursal">5.-Código postal:</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input  class="form-control codigoPostal" type="text" id="codigoSucursal" name="codigoSucursal" value="<?php echo $datos["codigo"] ?>" title="Debe contener 5 digitos" minlength="5" maxlength="5" pattern="[0-9]{5}" autocomplete="off" required>
                        </div>
                        <!--Tercer columna -->
                        <div class="col-md-4">
                          <label for="coloniaSucursal">6.-Colonia:</label>
                          <i class="fa fa-check-circle text-green"></i>
                            <div id="recargarColoniaSucursal">
                                <?php if(isset($_POST["actualizarSucursal"])): ?>
                                    <input  class="form-control textoMay" type="text" id="coloniaSucursal" name="coloniaSucursal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.]{2,}" value="<?php echo $datos["colonia"] ?>"  readonly required>
                                <?php else: ?>
                                    <select class="form-control textoMay" id="coloniaSucursal" name="coloniaSucursal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.]{2,}" readonly required>
                                        <option></option>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                      </div>
                    </div>
                   
                    <div class="form-group ">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                          <label for="municipioSucursal">7.-Municipio</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input  class="form-control textoMay" type="text" id="municipioSucursal" name="municipioSucursal" title="Sólo letras" value="<?php echo $datos["municipio"] ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" readonly required>
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="estadoSucursal">8.-Estado</label>
                          <i class="fa fa-check-circle text-green"></i>
                          <input  class="form-control textoMay" type="text" id="estadoSucursal" name="estadoSucursal" title="Sólo letras" value="<?php echo gestionEstados::vistaEstadosControllers($datos["id_estado"]) ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" readonly required>
                        </div>
                        <!--Tercer columna -->
                        <div class="col-md-4">
                        
                        </div>
                      </div>
                    </div>

                     <div class="form-group ">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4 mis-radios">
                            <label for="telefonoSucursal">9.-Teléfonos (incluye LADA): </label>      
                            <div class="lada"><input  class="form-control telefonoFijo ladaSangria" type="text" id="telefonoSucursal" name="telefonoSucursal" placeholder="Escribe el teléfono y presiona añadir" pattern="[0-9()\s-]{14}" title="debe contener 10 dígitos" autocomplete="off"><span>01</span></div> 
                            <button class="btn btn-info" id="anadirTelefono">Añadir</button>
                        </div>

                        <!-- <div>
                            <input id="box1" type="checkbox" class="with-font" />
                            <label for="box1">Checkbox 1</label>
                          </div>
                          <div>
                            <input id="box2" type="checkbox" class="with-font"/>
                            <label for="box2">Checkbox 2</label>
                          <div>
                          <div>
                            <input id="box3" type="checkbox" class="with-font" />
                            <label for="box3">Checkbox 3</label>
                          </div>-->


                      
                         <!--
                            <span class="miRadiosx"><input id="question1" name="question" type="radio" class="with-font" value="sel"/>
                            <label for="question1">Radio 1</label></span>
                         
                         
                            <span class="miRadiosx"><input id="question2" name="question"type="radio" class="with-font" value="sel"/>
                            <label for="question2">Radio 2</label></span>
                          
                            <span class="miRadiosx"><input id="question3" name="question" type="radio" class="with-font" value="sel"/>
                            <label for="question3">Radio 3</label></span>
                          -->

                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="telefonoSucursal">10.-Lista de teléfonos:</label>
                          <ol id="mylist">
                          <?php  
                            if(isset($_POST["actualizarSucursal"])){
                              $telefonos = new gestionSucursales();
                              $telefonos -> mostrarTelefonosControllers($_POST["actualizarSucursal"]);
                            }
                          ?>
                          </ol>
                        </div>
                        <!--Tercer columna -->
                        <div class="col-md-4">
                        <input type="hidden" name="id_sucursal" value="<?php echo $_POST["actualizarSucursal"] ?>">
                        </div>
                      </div>
                    </div>


                    <hr>
                    <div class="estilos-centrar">
                    <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                      <button type="submit" class="btn btn-success" id="guardarSucursal">Aceptar</button>
                    <?php if(!isset($_POST["actualizarSucursal"])): ?>
                              <button type="reset" class="btn btn-danger" id="cancelarSucursal">Cancelar</button>
                    <?php else: ?>
                              <a class="btn btn-danger" href="sucursales">Cancelar</a>
                   <?php endif; ?>                    
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