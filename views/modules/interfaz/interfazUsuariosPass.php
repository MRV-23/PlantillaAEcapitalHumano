<?php
$estadoSolicitudes='collapsed-box';
$estadoMisDatos='collapsed-box';
$pestanaLaborales="active";
$pestanaImagen="";
if(isset($_POST['expandirSolicitudes'])){
    $estadoSolicitudes = '';
}
else if(isset($_POST['expandirMisDatos'])){
    $estadoMisDatos = '';
    $pestanaLaborales="";
    $pestanaImagen="active";
}
?>
  
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

<?php if($_SESSION['identificador2'] != Configuraciones::especial() ): ?>
        <!-- Default box -->
      <div class="box box-info <?php echo $estadoMisDatos; ?>">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user icono-encabezado"></i> Mis datos</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                  <i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

                <?php $respuesta = Datos::mostrarUsuarioUnicoModel($_SESSION["identificador"],"usuarios_ae");
                      $jefeDirecto = Datos::mostrarJefe($_SESSION["identificador"],Tablas::usuarios(),Tablas::jefe());
                      if($respuesta['hijos'] == 0)
                          $respuesta['hijos'] = "NINGUNO";
                      else if($respuesta['hijos'] == 9)
                          $respuesta['hijos'] = "MÁS DE 8";
                      $respuesta['genero'] = $respuesta['genero'] == "F" ? "FEMENINO" : "MASCULINO";
                ?>
                    <div role="tabpanel"> 
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="<?php echo $pestanaLaborales;?>">
                                <a href="#laboral" class="desactivarCalendario" aria-controls="laboral" role="tab" data-toggle="tab">Datos laborales</a>
                            </li>
                            <li role="presentation">
                                <a href="#personal" class="desactivarCalendario" aria-controls="personal" role="tab" data-toggle="tab">Datos personales</a>
                            </li>
                            <li role="presentation">
                                <a href="#intranet" class="desactivarCalendario" aria-controls="intranet" role="tab" data-toggle="tab">Intranet</a>
                            </li>
                            <li role="presentation">
                                <a href="#emergencia" class="desactivarCalendario" aria-controls="emergencia" role="tab" data-toggle="tab">Contacto de emergencia</a>
                            </li>
                            <li role="presentation" class="<?php echo $pestanaImagen;?>">
                                <a href="#imagen" class="desactivarCalendario" aria-controls="imagen" role="tab" data-toggle="tab">Imagen de perfil</a>
                            </li>
                            <li role="presentation">
                                <a href="#firma" class="desactivarCalendario" aria-controls="firma" role="tab" data-toggle="tab">Firma</a>
                            </li>
                        </ul>
                        <div class="tab-content max1000" style="margin-top: 1%;">
                            <div role="tabpanel" class="tab-pane <?php echo $pestanaLaborales;?>" id="laboral">
                                <div class="row" style="margin-top: 3%;">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Nombre:</span><?php echo ' '.$respuesta['nombre'] .' '.$respuesta['paterno'].' '.$respuesta['materno'];?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Sucursal:</span><?php  echo ' '.Sucursales::traducirSucursalesModel($respuesta["id_sucursal"],"sucursales_ae");?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Fecha de ingreso:</span><?php echo ' '.substr($respuesta['fecha_ingreso'],8,2).'-'.substr($respuesta['fecha_ingreso'],5,2).'-'.substr($respuesta['fecha_ingreso'],0,4);?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Antiguedad:</span><?php echo ' '.gestionUsuarios::antiguedad($respuesta['fecha_ingreso'], date ("Y-m-d"));?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Departamento:</span><?php echo ' '.Departamentos::vistaDepartamentos2Model($respuesta['id_departamento'],"departamentos_ae");?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Puesto:</span><?php echo ' '.Departamentos::vistaPuestos2Model($respuesta['id_puesto'],"puestos_ae");?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Identificador de usuario: </span><?php echo $respuesta['clave'];?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Jefe inmediato: </span><?php echo $jefeDirecto['nombre'].' '.$jefeDirecto['paterno'].' '.$jefeDirecto['materno']; ?>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="personal">  
                                <div class="encabezadoSeccion">
                                      <span>DATOS DE IDENTIFICACIÓN UNICA</span> <i class="fa fa-id-card bigIcon"></i>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">CURP:</span><?php echo ' '.$respuesta['curp']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">RFC:</span><?php echo ' '.$respuesta['rfc']; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">NSS:</span><?php echo ' '.$respuesta['nss']; ?>
                                    </div>
                                </div>
                                <div class="encabezadoSeccion">
                                    <span>DATOS DE NACIMIENTO</span> <i class="fa fa-globe bigIcon"></i>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Estado:</span><?php echo ' '.mb_strtoupper(Estados::vistaEstadosModel($respuesta['estado_nacimiento'],"estados_ae"),'utf-8'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Municipio:</span><?php echo ' '.$respuesta['municipio_nacimiento']; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">Fecha:</span><?php echo ' '.substr($respuesta['fecha_nacimiento'],8,2).'-'.substr($respuesta['fecha_nacimiento'],5,2).'-'.substr($respuesta['fecha_nacimiento'],0,4); ?>
                                    </div>
                                </div>
                                <div class="encabezadoSeccion">
                                    <span>DATOS GENERALES</span> <i class="fa fa-info-circle bigIcon"></i>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Estado civil:</span><?php echo ' '.Datos::traducirSituacionCivilModel($respuesta['estado_civil']); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Nivel de estudios:</span><?php echo ' '.Datos::traducirEscolaridadModel($respuesta['estudios']); ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Hijos:</span><?php echo ' '.$respuesta['hijos']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Genero:</span><?php echo ' '.$respuesta['genero']; ?>
                                    </div>
                                </div>
                                <div class="encabezadoSeccion">
                                    <span>DOMICILIO ACTUAL</span> <i class="fa fa-home bigIcon"></i>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Calle y número:</span><?php echo ' '.$respuesta['domicilio']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Municipio:</span><?php echo ' '.$respuesta['municipio']; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Colonia:</span><?php echo ' '.$respuesta['colonia']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Código postal:</span><?php echo ' '.$respuesta['codigo_postal']; ?>
                                    </div>
                                </div>
                                <div class="encabezadoSeccion">
                                    <span>CREDITOS PARA VIVIENDA</span> <i class="fa fa-usd bigIcon"></i>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">Crédito Infonavit:</span><?php echo ' '.Datos::traducirViviendaModel($respuesta['infonavit_tiene']); ?> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">Crédito Fonacot:</span><?php echo ' '.Datos::traducirViviendaModel($respuesta['fonacot_tiene']); ?>
                                    </div>
                                </div>
                                <div class="encabezadoSeccion">
                                    <span>NÚMEROS DE CONTACTO</span> <i class="fa fa-phone bigIcon"></i>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Teléfono móvil:</span><?php echo ' '.$respuesta['telefono_movil']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Teléfono fijo:</span><?php echo ' '.$respuesta['telefono_fijo']; ?>
                                    </div>
                                </div>
                            </div>
                      
                            <div role="tabpanel" class="tab-pane" id="intranet">  
                                <div class="row" style="margin-top: 3%;">
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">Permisos de acceso:</span><?php echo ' '.Datos::traducirUsuariosModel($respuesta["tipo_acceso"]); ?>
                                    </div>
                                </div> 
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">Usuario:</span><?php echo ' '.$respuesta['usuario']; ?>
                                    </div>
                                </div>  
                                <br>
                                <div class="row">	
                                    <div class="col-md-12">
                                        <span class="encabezadoDato">Correo electrónico:</span><?php echo ' '.$respuesta['correo']; ?>
                                    </div>
                                </div>   
                            </div>
 
                            <div role="tabpanel" class="tab-pane" id="emergencia"> 
                                <div class="row" style="margin-top: 3%;">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Alergias:</span><?php echo ' '.$respuesta['alergias']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Tipo de sangre:</span><?php echo ' '.$respuesta['sangre']; ?>
                                    </div>
                                </div> 
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Nombre de contacto:</span><?php echo ' '.$respuesta['nombre_contacto']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Parentesco:</span><?php echo ' '.$respuesta['parentesco']; ?>
                                    </div>
                                </div> 
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Teléfono móvil:</span><?php echo ' '.$respuesta['contacto_movil']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="encabezadoDato">Teléfono fijo:</span><?php echo ' '.$respuesta['contacto_fijo']; ?>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane <?php echo $pestanaImagen;?>" id="imagen"> 
                                <div class="max1000" style="margin-top: 3%;">
                                    <form method="POST" id="formularioImagenPerfil" enctype="multipart/form-data">
                                        <div class="alineacionCentralFlexBox redondear">
                                            <?php if(!empty($respuesta["imagen"])): ?>
                                                      <img id="imgenSalidaPerfil" src="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/<?php echo $respuesta["imagen"]?>" alt="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/<?php echo $respuesta["imagen"]?>"  height="220" width="220">
                                            <?php else: ?>
                                                      <img id="imgenSalidaPerfil" src="<?php echo Ruta::ruta_server();?>views/img/user.png" alt="<?php echo Ruta::ruta_server();?>views/img/user.png" height="220" width="220">
                                            <?php endif; ?>
                                        </div>
                                        <br>
                                        <div class="form-group alineacionCentralFlexBox">
                                            <div id="targetAdjuntar">
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> Imagen
                                                    <input type="file" id="imagenPerfilUsuario" name="imagenPerfilUsuario" accept="image/*">
                                                    <input type="hidden" name="identificador" value="<?php echo $_SESSION["identificador"];?>">
                                                </div>
                                                <p class="help-block">Max. 2MB</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="alineacionCentralFlexBox">
                                            <button type="submit" id="guardarImagenPerfil" class="btn btn-success">Aceptar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="firma"> 
                                <div class="row" style="margin-top: 3%;">
                                    <div class="col-md-1">
                                       <?php $datos = gestionUsuarios::getFirma($_SESSION['identificador']); ?>
                                    </div>
                                    <div class="col-md-10">
                                        <?php echo '<img src="views/img/firma.php?u='.$datos['nombre'].'&p='.$datos['puesto'].'" alt="firma">'; ?>
                                    </div>
                                    <div class="col-md-1">
                                       
                                    </div>

                                </div> 
                            </div>
                          
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

       <!-- Default box -->
      <div class="box box-info <?php echo $estadoSolicitudes; ?>">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-o icono-encabezado"></i> Solicitudes</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div role="tabpanel">
                <ul class="nav nav-tabs">
                    <li role="presentation">
                        <a href="#nueva" aria-controls="nueva" role="tab" data-toggle="tab">Nueva</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="#administrar" aria-controls="administrar" role="tab" data-toggle="tab">Administrar</a>
                    </li>
                </ul>
                <div class="tab-content" style="margin-top: 1%;">
                    <div role="tabpanel" class="tab-pane" id="nueva">
                    <!-- Formulario-->
                        <form method="POST" style="margin-top: 2%;" id="multiformato" enctype="multipart/form-data">
                                <!-- primera fila -->
                                <div class="form-group max800">
                                    <?php if($_SESSION['identificador'] == 168 || $_SESSION['identificador'] == 171 || $_SESSION['identificador'] == 172):?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">A.-Sucursal:</label>
                                                <select class="form-control textoMay" id="sucursalGenerarTicket">
                                                    <?php
                                                        echo'<option></option>';
                                                        $sucursales= new gestionSucursales();
                                                        $sucursales -> vistaSucursalesController();
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="usuarioEquipo">B.-Usuario:</label>
                                                <div id="targetGenerarTicketUsuario">
                                                    <select class="form-control textoMay" name="usuarioTicketCreado" id="usuarioTicketCreado" readonly>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    <?php endif;?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="passActual">1.-Tipo de solicitud:</label> <i class="fa fa-check-circle text-green"></i>
                                            <select class="form-control textoMay" name="tipoSolicitud" id="tipoSolicitud" required>
                                                <option value=""></option>
                                                <option value="1">Permiso</option>
                                                <option value="2">Vacaciones</option>
                                                <option value="3">Cambio de guardia</option>
                                            </select>
                                        </div> 
                                    </div>
                                </div>

                                <div id="cargarTipoSolicitud">
                                        
                                </div>
                                
                            <!-- <div data-provide="calendar"></div>-->
                                
                                <input type="hidden" name="usuario" id="identificadorUsuarioPermuta" value="<?php echo $_SESSION["identificador"];?>">
                                <br>
                                <div class="estilos-centrar">
                                <button type="submit" class="btn btn-success" id="guardarPermiso">Aceptar</button>
                                <button type="button" class="btn btn-danger" id="formularioCancelarPermiso">Cancelar</button>  
                                </div>
                        </form>
                    <!-- Fin Formulario --> 
                    </div>
                    <div role="tabpanel" class="tab-pane administrar-solicitudes-individual active" id="administrar">
                    <!--Encabezado-->
                            <?php 
                            $paginacion = new Paginacion(25);
                            $paginacion->target('usuariosPass');
                            $total = PermisosControllers::marcadoresPermisosUsuario($_SESSION["identificador"],-1);//totalSolicitudesControllers($_SESSION["identificador"],1,1);
                            $paginacion->totalPaginas($total);
                            ?>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Total de solicitudes : </span>
                                            <span class="info-box-number"><?php echo PermisosControllers::marcadoresPermisosUsuario($_SESSION["identificador"],-1); ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-eye"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Autorizadas: <span class="texto-marcador"> <?php echo PermisosControllers::marcadoresPermisosUsuario($_SESSION["identificador"],5); ?></span></span>
                                            <span class="info-box-text"> Canceladas / Rechazadas: <span class="texto-marcador"> <?php echo PermisosControllers::marcadoresPermisosUsuario($_SESSION["identificador"],6); ?></span></span>
                                            <span class="info-box-text"> Por autorizar: <span class="texto-marcador"> <?php echo $pendientes = PermisosControllers::marcadoresPermisosUsuario($_SESSION["identificador"],0); ?></span></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>
                    <!--Fin Encabezado-->
                    <!--Datos-->
                           
                            <span id="paginacionPermisosSolicitante"><?php echo $paginacion->mostrar();?></span> 
                          
                            <div class="renglonEncabezado">
                                <div class="campoIdEncabezado">No.</div>
                                <div class="campoNombreEncabezado">Tipo de solicitud</div>
                                <div class="campoReferenciaEncabezado">Fecha de solicitud</div>
                                <div class="campoFechaEncabezado">Fecha a otorgarse</div>
                                <div class="campoJefeEncabezado">Jefe</div>
                                <div class="campoRHEncabezado">RH</div>
                                <div class="campoOpcionesEncabezado">Situación</div>
                            </div>

                            <div id="mostrarDatosSolicitante">
                                <?php
                                    //$privilegios=1;
                                    $permisos = new PermisosControllers();
                                    $respuesta = $permisos -> mostrarPermisosController($_SESSION["identificador"],$paginacion->limitRegistros());
                                    echo $respuesta;
                                ?>
                            </div>

                            <span id="paginacionPermisosSolicitante2"><?php echo $paginacion->mostrar();?></span> 
                    <!--Fin Datos-->
                    </div>
                </div>
            </div> 


               <!--Ventana modal 3 data-backdrop="static"-->
            <div class="modal fade bd-example-modal-lg fade" id="detallesSolicitudUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  data-keyboard="false" >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle3">DETALLES DE LA SOLICITUD</h5>
                            <button type="button" class="close" id="limpiarPass" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <span id="targetDetallesSolicitud"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--Ventana modal 3-->


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

            <!-- Default box -->
      <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-calendar icono-encabezado"></i> Calendario</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" id="actualizarCalendario" name="<?php echo $_SESSION["identificador"];?>">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="row" style="margin-top: 2%;">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-plane"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> <b>Vacaciones</b></span>
                            <span class="info-box-text"> Disfrutadas ( <span id="asignarAnio"></span> ): <span class="texto-marcador" id="asignarVaccaionesDisfrutadas"></span></span>
                            <span class="info-box-text"> Disponibles:  <span class="texto-marcador" id="diasDisponibles_"><?php //echo PermisosControllers::vacacionesDisponibles($_SESSION["identificador"]); ?></span></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-plus-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Bonos Plus: </span>
                            <span class="info-box-number" id="asiganarBonosPlus"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple"><i class="fa fa-file-text-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Permisos: </span>
                            <span class="info-box-number" id="asignarPermisos"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            

            <div class="row">

                 <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-ban"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Faltas: </span>
                            <span class="info-box-number" id="asignarFaltas"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-question-circle-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Por autorizar: </span>
                            <span class="info-box-number" id="asignarPorAutorizar"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>


         <div id="calendar" class="divCalendario"></div>
      
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

<?php else: ?>

        <!-- Default box -->
      <div class="box box-info <?php echo $estadoMisDatos; ?>">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user icono-encabezado"></i> Mis datos</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                  <i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

                <?php 
                    $respuesta = Datos::mostrarUsuarioUnicoModel($_SESSION["identificador"],Tablas::usuarios());
                    $especial = EventosModel::datos($_SESSION["identificador"],Tablas::especiales()); 
                ?>
                    <div role="tabpanel"> 
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="<?php echo $pestanaLaborales;?>">
                                <a href="#laboral" class="desactivarCalendario" aria-controls="laboral" role="tab" data-toggle="tab">Datos generales</a>
                            </li>
                            <li role="presentation" class="<?php echo $pestanaImagen;?>">
                                <a href="#imagen" class="desactivarCalendario" aria-controls="imagen" role="tab" data-toggle="tab">Imagen de perfil</a>
                            </li>
                        </ul>
                        <div class="tab-content max1000" style="margin-top: 1%;">
                            <div role="tabpanel" class="tab-pane <?php echo $pestanaLaborales;?>" id="laboral">
                                <div class="row" style="margin-top: 3%;">
                                    <div class="col-md-12">
                                        <p>Hola <span class="encabezadoDato"><?php echo ' '.$respuesta['nombre'] .' '.$respuesta['paterno'].' '.$respuesta['materno'];?></span>, ¿quieres contarnos algo sobre ti, para que el personal de <b>Asesores Empresariales!</b> te conozca?, <button type="button" id="botonCambiarPerfil" class="btn btn-default btn-sm">Sí, modificar mi información</button><button type="button" id="guardarCambiarPerfil" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Guardar mi información&nbsp;&nbsp;&nbsp;&nbsp;</button></p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12" id="cargarPerfil">
                                       <textarea id="descripcionUsuarioEspecial" class="form-control detalleUsuarioEspecial" placeholder="vacio..." rows="3" readonly><?php echo $especial['descripcion']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane <?php echo $pestanaImagen;?>" id="imagen"> 
                                <div class="max1000" style="margin-top: 3%;">
                                    <form method="POST" id="formularioImagenPerfil" enctype="multipart/form-data">
                                        <div class="alineacionCentralFlexBox redondear">
                                            <?php if(!empty($respuesta["imagen"])): ?>
                                                      <img id="imgenSalidaPerfil" src="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/<?php echo $respuesta["imagen"]?>" alt="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/<?php echo $respuesta["imagen"]?>"  height="220" width="220">
                                            <?php else: ?>
                                                      <img id="imgenSalidaPerfil" src="<?php echo Ruta::ruta_server();?>views/img/user.png" alt="<?php echo Ruta::ruta_server();?>views/img/user.png" height="220" width="220">
                                            <?php endif; ?>
                                        </div>
                                        <br>
                                        <div class="form-group alineacionCentralFlexBox">
                                            <div id="targetAdjuntar">
                                                <div class="btn btn-default btn-file">
                                                    <i class="fa fa-paperclip"></i> Imagen
                                                    <input type="file" id="imagenPerfilUsuario" name="imagenPerfilUsuario" accept="image/*">
                                                    <input type="hidden" name="identificador" value="<?php echo $_SESSION["identificador"];?>">
                                                </div>
                                                <p class="help-block">Max. 2MB</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="alineacionCentralFlexBox">
                                            <button type="submit" id="guardarImagenPerfil" class="btn btn-success">Aceptar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          
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

<?php endif; ?>

      <!-- Default box -->
      <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-unlock-alt icono-encabezado"></i> Cambiar contraseña</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        <!-- Formulario-->
        <form method="POST" style="margin-top: 2%;"  id="cambiarContrasena">
                     <!-- primera fila -->
                    <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                          <label for="passActual">Contraseña actual:</label> <i class="fa fa-unlock-alt text-blue"></i>
                          <input  class="form-control" type="password" id="passActual" name="passActual" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" minlength="8" maxlength="12" required title="8 a 12 caracteres; mínimo 1 mayúscula, 1 minúscula y 1 número">
                          <input type="checkbox" onclick="myFunctionPass('passActual')">Mostrar contraseña
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
                        <label for="">Nueva contraseña:</label> <i class="fa fa-lock text-green"></i>
                          <input  class="form-control" type="password" id="passNueva" name="passNueva" placeholder="Escribe únicamente letras y números" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" minlength="8" maxlength="12" required  title="8 a 12 caracteres; mínimo 1 mayúscula, 1 minúscula y 1 número">
                          <input type="checkbox" onclick="myFunctionPass('passNueva')">Mostrar contraseña
                        </div>
                      </div>
                    </div>

                    <!-- tercera fila -->
                    <div class="form-group">
                      <div class="row">
                      <!-- primera columna -->
                        <div class="col-md-4">
                        </div>
                        <!-- segunda columna -->
                        <div class="col-md-4">
                        <label for="">Repite la nueva contraseña:</label> <i class="fa fa-lock text-green"></i>
                          <input  class="form-control" type="password" id="passConfirmacion" name="passConfirmacion" placeholder="Escribe únicamente letras y números" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" minlength="8" maxlength="12" required title="8 a 12 caracteres; mínimo 1 mayúscula, 1 minúscula y 1 número">
                          <input type="checkbox" onclick="myFunctionPass('passConfirmacion')">Mostrar contraseña
                        </div>
                      </div>
                    </div>
                    <br>
                    <p>*La contraseña debe tener de 8 a 12 caracteres; por lo menos 1 mayúscula, 1 minúscula y 1 número</p>
                    <div class="estilos-centrar">
                      <button type="submit" class="btn btn-success" id="guardarPassUsuario">Aceptar</button>
                      <button type="reset" class="btn btn-danger" id="formularioPassCancelarUsuario">Cancelar</button>  
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

    <?php if($_SESSION['identificador2'] != 10 ):?>


    <!-- Default box -->
        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-excel-o icono-encabezado"></i> Recibos de nomina</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                <i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
            <div class="box-body">
                        <!-- primera fila -->
                    <div class="form-group">
                        <div class="row">
                        <!-- primera columna -->
                            <div class="col-md-4">
                                    <label for="passActual">1.-Año fiscal: </label>
                                    <select class="form-control textoMay" name="anoFiscal" id="anoFiscal" required>
                                        <option value=""></option>
                                        <?php RutasDescargas::primerSegmento();?>
                                    </select>
                            </div>
                            <!-- segunda columna -->
                            <div class="col-md-4">
                                    <label for="passActual">2.-Tipo de recibo: </label>
                                    <select class="form-control textoMay" name="tipoRecibo" id="tipoRecibo" required>
                                        <option value=""></option>
                                        <option value="0">Sueldos y salarios</option>
                                        <option value="1">Asimilados</option>
                                    </select>
                            </div>
                            <!-- Tercera columna -->
                            <div class="col-md-4">
                                    <label for="passActual">3.-Perido (semana): </label>
                                    <span id="recargarPeriodos">
                                        <select class="form-control textoMay" name="periodoNomina" id="periodoNomina" required readonly>
                                            <option value=""></option>
                                        </select>
                                    </span>
                            </div>
                        </div>

                        <div class="row">
                        <!-- primera columna -->
                            <div class="col-md-4">
                                    <label for="passActual">4.-Formato: </label>
                                    <select class="form-control textoMay" name="formatoNomina" id="formatoNomina" required>
                                        <option value="0">PDF</option>
                                        <option value="1">XML</option>
                                    </select>
                            </div>
                        
                            <div class="col-md-3">
                                <br>
                                <form action="usuariosPass" method="post">  
                                    <input type="hidden" value=""name="formatoArchivoNomina" id="formatoArchivoNomina">
                                    <span id="botonDescargaRecibos"> <button type="submit" id="nombreArchivoDescargar" name="nombreArchivoDescargar" value="" class="btn btn-lg" disabled><i class="fa fa-download"></i> Descargar</button> </span>
                                </form> 
                            </div>
                            <div class="col-md-5 text-center">
                              
                            </div>

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

    <?php endif; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->
