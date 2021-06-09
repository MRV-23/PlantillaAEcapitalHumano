<!-- =============================================== -->
<?php 
//ini_set( "display_errors","0");
if(isset($_POST["actualizarEquipo"])){
    $equipoSeEncuentraAsignado = EquiposModel::verificarEquipoSeEncuentreAsignado($_POST["actualizarEquipo"],'equipos_ae');
    if($equipoSeEncuentraAsignado != NULL)
       $datos = EquiposComputo::actualizarEquipo($_POST["actualizarEquipo"]);
    else
       $datos = EquiposComputo::actualizarEquipoSinAsignar($_POST["actualizarEquipo"]);
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-laptop icono-encabezado"></i> REGISTRAR EQUIPO</h3>
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
              <form method="POST" style="margin-top: 1%;"  id="formularioEquposComputo" enctype="multipart/form-data">

                <div role="tabpanel"> 
                    <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#equipos" aria-controls="encuesta" role="tab" data-toggle="tab">Equipos de cómputo</a>
                            </li>
                            <li role="presentation">
                                <a href="#credenciales" aria-controls="archivos" role="tab" data-toggle="tab">Credenciales de acceso</a>
                            </li>
                    </ul>
                    <div class="tab-content" style="margin-top: 2%;">
                        <div role="tabpanel" class="tab-pane active" id="equipos"> 
                              <!-- primera fila -->
                              <div class="form-group">
                                <div class="row">
                                <!-- primera columna -->
                                  <div class="col-md-4">
                                    <label for="tipoEquipo">1.-Tipo:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <select class="form-control textoMay" name="tipoEquipo" id="tipoEquipo" requerid >
                                      <option value="1"<?php if(isset ($datos)){if ($datos["tipo"]=="1") echo "selected='selected'";} ?>>Escritorio</option>
                                      <option value="2"<?php if(isset ($datos)){if ($datos["tipo"]=="2") echo "selected='selected'";} ?>>Laptop</option>
                                    </select>
                                  </div>
                                
                                  <!-- segunda columna -->
                                  <div class="col-md-4">
                                    <label for="marcaEquipo">2.-Marca:</label>
                                    <i class="fa fa-check-circle text-green"></i> 
                                    <input type="radio" name="seleccionarMarca" id="marcaRegistrada" class="marcaRegistrada with-font" value="0" checked><label class="hola" for="marcaRegistrada">No Registrada</label>
                                    <input type="radio" name="seleccionarMarca" id="marcaNoRegistrada" class="marcaRegistrada with-font" value="1"><label class="hola" for="marcaNoRegistrada">Registrada</label>

                                    <div id="targetMarcaEquipo"><input class="form-control" value="<?php if(isset($datos)) echo $datos['marca'];?>" type="text" id="marcaEquipo" name="marcaEquipo" placeholder="Ej. Lenovo" title="Escribe la marca del equipo de cómputo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{2,}" required autocomplete="off"></div>
                                  </div>
                                  <!--Tercer columna -->
                                  <div class="col-md-4">
                                    <label for="modeloEquipo">3.-Modelo:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <input type="radio" name="seleccionarModelo" id="modeloRegistrado" class="modeloRegistrado with-font" value="0" checked><label class="hola" for="modeloRegistrado">No registrado</label>
                                    <input type="radio" name="seleccionarModelo" id="modeloNoRegistrado" class="modeloRegistrado with-font" value="1"><label class="hola" for="modeloNoRegistrado">Registrado</label>
                                    <div id="targetModeloEquipo"><input  class="form-control" value="<?php if(isset($datos)) echo $datos['modelo'];?>" type="text" id="modeloEquipo" name="modeloEquipo" placeholder="Ej. ProOne 400 G1 Aio" title="Escribe el modelo del equipo de cómputo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{2,}" required autocomplete="off"></div>
                                  </div>
                                </div>
                              </div>

                              <!-- segunda fila -->
                              <div class="form-group">
                                <div class="row">
                                <!-- primera columna -->
                                  <div class="col-md-4">
                                    <label for="serieEquipo">4.-Número de serie:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <input type="hidden" name="idEquipoComputoActualizar" value="<?php if(isset($datos)) echo $datos["id_equipo"]; ?>">
                                    <input  class="form-control" type="text" id="serieEquipo" value="<?php if(isset($datos)) echo $datos['serie'];?>" name="serieEquipo" placeholder="Ej. MXL4321ZXX" title="Escribe el número de serie del equipo" pattern="[a-zA-Z0-9-_.]{2,}" required autocomplete="off">
                                  </div>
                                  <!-- segunda columna -->
                                  <div class="col-md-4">
                                    <label for="memoriaEquipo">5.-Memoria RAM (capacidad GB):</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <input  class="form-control" type="text" id="memoriaEquipo" value="<?php if(isset($datos)) echo $datos['ram'];?>" name="memoriaEquipo" title="Sólo ingresa la capacidad de la memoria RAM, ejm: 5,1.5, etc." placeholder="Ej. 16" pattern="[0-9.]{1,3}" required autocomplete="off">
                                  </div>
                                  <!--Tercer columna -->
                                  <div class="col-md-4">
                                  <?php 
                                    $gb='checked';
                                    $tb='';
                                    if(isset($datos)){
                                      if ($datos['hd_capacidad'] == 'GB'){
                                          $gb='checked';
                                          $tb='';
                                      }
                                      else{
                                          $gb='';
                                          $tb='checked';
                                      }
                                    }
                                  ?>
                                    <label for="discoEquipo">6.-Disco duro:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <input type="radio" name="capacidadHd" id="capacidadHdGB" class="with-font" value="GB" <?php echo $gb;?>><label class="hola" for="capacidadHdGB">GB</label>
                                    <input type="radio" name="capacidadHd" id="capacidadHdTB" class="with-font" value="TB" <?php echo $tb;?>><label class="hola" for="capacidadHdTB">TB</label>
                                    <input  class="form-control" value="<?php if(isset($datos)) echo $datos['hd'];?>" type="text" id="discoEquipo" name="discoEquipo" title="Sólo ingresa la capacidad del disco duro" placeholder="Ej. 320" pattern="[0-9]{1,3}" required autocomplete="off"> 
                                  </div>
                                </div>
                              </div>
                            
                              <div class="form-group ">
                                <div class="row">
                                <!-- primera columna -->
                                  <div class="col-md-4">
                                    <label for="usuarioSistemaOperativo">7.-Nombre de usuario (Sistema Operativo):</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <input  class="form-control" type="text" value="<?php if(isset($datos)) echo $datos['usuario_so'];?>" id="usuarioSistemaOperativo" name="usuarioSistemaOperativo" placeholder="Nombre del usuario Administrador en el SO" title="Escribe el nombre de usuario Administrador" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{3,}" required autocomplete="off">
                                  </div>
                                  <!-- segunda columna -->
                                  <div class="col-md-4">
                                    <label for="passSistmaOperativo">8.-Contraseña (Sistema Operativo):</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <input  class="form-control" type="text" value="<?php if(isset($datos)) echo $datos['pass_so'];?>" id="passSistemaOperativo" name="passSistemaOperativo" placeholder="Contraseña del usuario Administrador en el SO" required title="Escribe la contraseña del Administrador" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.)(?*=¿\s]{2,}" autocomplete="off">
                                  </div>
                                  <!--Tercer columna -->
                                  <div class="col-md-4">
                                    <label>9.-Accesorios:</label>
                                    <br>
                                  
                                  <?php
                                  $mouseClase='active';
                                  $mouseValor='';
                                    if(isset($datos)){
                                        if($datos['mouse']){
                                          $mouseValor='checked';
                                          $mouseClase='';
                                        }
                                        else{
                                          $mouseValor='';
                                          $mouseClase='active';
                                        }
                                    }
                                  ?>
                                    <div class="miCheck"> 
                                      <div class="toggle-btn <?php echo $mouseClase ?>">
                                        <input type="checkbox"  id="mouseEquipo" name="mouseEquipo" class="cb-value" value="si" <?php echo $mouseValor; ?>>
                                        <span class="round-btn"></span>
                                      </div>
                                      <label for="mouseEquipo">Mouse</label>
                                    </div>

                                    <?php
                                      $monitorClase='active';
                                      $monitorValor='';
                                        if(isset($datos)){
                                            if($datos['monitor']){
                                              $monitorValor='checked';
                                              $monitorClase='';
                                            }
                                            else{
                                              $monitorValor='';
                                              $monitorClase='active';
                                            }
                                        }
                                    ?>

                                    <div class="miCheck"> 
                                      <div class="toggle-btn <?php echo $monitorClase ?>">
                                        <input type="checkbox"  id="monitorEquipo" name="monitorEquipo" class="cb-value" value="si" <?php echo $monitorValor; ?>>
                                        <span class="round-btn"></span>
                                      </div>
                                      <label for="monitorEquipo">Monitor</label>
                                    </div>

                                    <?php
                                      $mochilaClase='active';
                                      $mochilaValor='';
                                        if(isset($datos)){
                                            if($datos['mochila']){
                                              $mochilaValor='checked';
                                              $mochilaClase='';
                                            }
                                            else{
                                              $mochilaValor='';
                                              $mochilaClase='active';
                                            }
                                        }
                                    ?>
                                    <div class="miCheck"> 
                                      <div class="toggle-btn <?php echo $mochilaClase ?>">
                                        <input type="checkbox"  id="mochilaEquipo" name="mochilaEquipo" class="cb-value" value="si" <?php echo $mochilaValor; ?>>
                                        <span class="round-btn"></span>
                                      </div>
                                      <label for="mochilaEquipo">Mochila</label>
                                    </div>

                                    <?php
                                      $upsClase='active';
                                      $upsValor='';
                                        if(isset($datos)){
                                            if($datos['ups']){
                                              $upsValor='checked';
                                              $upsClase='';
                                            }
                                            else{
                                              $upsValor='';
                                              $upsClase='active';
                                            }
                                        }
                                    ?>
                                    <div class="miCheck"> 
                                      <div class="toggle-btn <?php echo $upsClase ?>">
                                        <input type="checkbox"  id="equipoUps" name="equipoUps" class="cb-value" value="si" <?php echo $upsValor; ?>>
                                        <span class="round-btn"></span>
                                      </div>
                                      <label for="equipoUps">No break</label>
                                    </div>
                                  
                                  </div>
                                </div>
                              </div>

                              <div class="form-group ">
                                <div class="row">
                                <!-- primera columna -->
                                  <div class="col-md-4">
                                    <label for="">10.-Vincular el equipo a sucursal:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <select class="form-control textoMay" name="equipoSucursalUsuario" id="equipoSucursalUsuario">
                                        <?php
                                        echo'<option></option>';
                                        $sucursales= new gestionSucursales();
                                        $sucursales -> vistaSucursalesController($datos["id_sucursal"]);
                                        ?>
                                    </select>
                                  </div>
                                  <!-- segunda columna -->
                                  <div class="col-md-4">
                                    <label for="usuarioEquipo">11.-A cargo del usuario:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <div id="targetEquipoUsuarioCargo">
                                        <?php
                                          if(isset($datos)){
                                            if(isset($datos['id_sucursal']))
                                              echo EquiposComputo::usuariosController($datos["id_sucursal"],$datos['usuario_propietario']);
                                            else
                                              echo EquiposComputo::usuariosController(0,0);
                                          }
                                        ?>
                                        <?php if(!isset($datos)): ?>
                                          <select class="form-control textoMay" name="equipoUsuarioCargo" id="equipoUsuarioCargo" readonly></select>
                                        <?php endif; ?>
                                    </div>
                                  </div>
                                  <!--Tercer columna -->
                                  <div class="col-md-4">
                                    <br>
                                    <span class="btn btn-default btn-lg btn-file"><i class="fa fa-file-image"></i> Imagen <input type="file" name="imagen" id="botonAdjuntarEquiposImagen" accept="image/*"></span>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group ">
                                <div class="row"> 
                                  <div class="col-md-12">
                                    <span id="nombreImagenEquipos"> Sin imagen.</span>  
                                  </div>
                                </div>
                              </div>
                              
                        </div>

                        <div role="tabpanel" class="tab-pane" id="credenciales">
                              <h3 class="text-center">LOGMEIN</h3>
                              <hr>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>1.-Usuario:</label>
                                    <input class="form-control" value="<?php if(isset($datos)) echo $datos['usuario_logmein'];?>" type="text" name="usuarioLogmein" autocomplete="off">
                                  </div>
                                  <div class="col-md-6">
                                    <label>2.-Contraseña:</label>
                                    <input class="form-control" value="<?php if(isset($datos)) echo $datos['pass_logmein'];?>" type="text" name="passLogmein" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <h3 class="text-center">VPN</h3>
                              <hr>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>1.-Usuario:</label>
                                    <input class="form-control" value="<?php if(isset($datos)) echo $datos['usuario_vpn'];?>" type="text" name="usuarioVpn" autocomplete="off">
                                  </div>
                                  <div class="col-md-4">
                                    <label>2.-Contraseña:</label>
                                    <input class="form-control" value="<?php if(isset($datos)) echo $datos['pass_vpn'];?>" type="text" name="passVpn" autocomplete="off">
                                  </div>
                                  <div class="col-md-4">
                                    <label>3.-IP Servidor:</label>
                                    <input class="form-control" value="<?php if(isset($datos)) echo $datos['servidor_vpn'];?>" type="text" name="servidorVpn" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <h3 class="text-center">SERVIDORES</h3>
                              <hr>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-12">
                                      <button type="button" id="anexarServidores" class="btn btn-primary"><i class="fa fa-plus-circle fa-lg"></i> Añadir nuevo servidor</button>
                                  </div>
                                </div>
                              </div>
                              <ol>
                              <div class="row">
                                        <div class="col-md-1">
                          
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">a) IP Servidor: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">b) Alias:</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">c) Usuario:</label>
                                        </div> 
                                        <div class="col-md-3">
                                            <label for="">d) contaseña:</label>
                                        </div>       
                              </div>

                              <div id="camposDinamicosServidores">
                                <?php if(isset($_POST["actualizarEquipo"])){
                                        echo EquiposComputo::servidoresRegistrados($datos['usuario_propietario']);
                                      }
                                ?>
                              </div>
                              </ol>
                        </div>


                        <hr>
                        <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                        <div class="estilos-centrar">
                          <button type="submit" class="btn btn-success" id="guardarEquipo">Aceptar</button>
                          <?php if(!isset($_POST["actualizarEquipo"])): ?>
                                <button type="button" class="btn btn-danger" id="formularioCancelarEquipo">Cancelar</button>   
                          <?php else: ?>
                                <a class="btn btn-danger" href="equipos">Cancelar</a>
                          <?php endif; ?>                  
                        </div>

                  </div>
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