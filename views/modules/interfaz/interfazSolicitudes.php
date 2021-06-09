
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title">ADMINISTRACIÓN DE SOLICITUDES <!--<i class="fa fa-users icono-encabezado"></i> <i class="fa fa-pencil text-blue" aria-hidden="true"></i>--></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body administrar-solicitudes">
          <!--=====================================
          USUARIOS         
          ======================================-->
       <?php  
              $situacion = 4;
              $recursosHumanos=false;
              $rh = PermisosModels::obtenerIdRecursosHumanos('dependencias_rh_ae', $_SESSION["identificador"]);//obtengo el id de la persona encargada de RH (aprobar permisos) 
              //$idSucursal=Sucursales::mostrarSucursalUsuario('usuarios_ae',$_SESSION["identificador"]); //obtener la sucursal del jefe
              if($rh === TRUE){
                   $recursosHumanos = true;//muestra todas las opciones en el select
                   $situacion = 0;//inicia el select en la posicon 0 en caso de ser rh 
                   $idSucursal=0;//todas las sucursales
              } //si eres Recursos HUmanos(Administrador)
               
              $datos = array('nombreBuscar'=>'', //vacio al cargar la pagina
                    'situacion'=>$situacion, //las solicitudes que no han sido vistas
                    'sucursal'=>0,//$idSucursal, 
                    'fecha'=>'', // vacia al cargar la pagina
                    'tipoUsuario'=>$recursosHumanos, //saber si eres jefe o Recursos Humanos (administrador)
                    'usuarioPrincipal'=>$_SESSION["identificador"]
              ); 

              $paginacion = new Paginacion(30);
              $totalRegistros = PermisosControllers::totalSolicitudes2Controllers($datos); //cuento todos los registros(sin importar el estado RH)
              $paginacion->parametrosPaginadorSolicitudes($recursosHumanos,$_SESSION["identificador"]);//metodo para mandar las configuraciones propias de cada paginador nivel de autorización,idUsuario RH
              $paginacion->totalPaginas($totalRegistros);
              $paginacion->target('solicitudes');
        ?>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-file-text-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total de solicitudes: </span>
                            <span class="info-box-number"><?php echo PermisosControllers::totalSolicitudesControllers($_SESSION["identificador"],-1);?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-eye"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Vistas: <span class="texto-marcador" id="actualizarSolicitudesVistas"> <?php echo PermisosControllers::totalSolicitudesControllers($_SESSION["identificador"],4); ?></span></span>
                            <span class="info-box-text"> Autorizadas: <span class="texto-marcador" id="actualizarSolicitudesAutorizadas"> <?php echo PermisosControllers::totalSolicitudesControllers($_SESSION["identificador"],2); ?></span></span>
                            <span class="info-box-text"> Canceladas: <span class="texto-marcador" id="actualizarSolicitudesCanceladas"> <?php echo PermisosControllers::totalSolicitudesControllers($_SESSION["identificador"],3); ?></span></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>


          <div class="barraBuscador">
            <div class="barraBuscador-izquierda"> 
            
            </div>
            <div class="barraBuscador-derecha"><input type="text" id="buscadorUsuariosPermisos" class="buscador" placeholder="Buscar..." autocomplete="off"></div>
          </div>

            <div class="row">
                <div class="col-md-3" style="margin-top:1%;">
                    <span><b>Situación: </b></span>
                    <select class="selectpicker" name="cargarAjaxSituacionSolicitudes" id="cargarAjaxSituacionSolicitudes">
                       <?php if($recursosHumanos):?>
                            <optgroup label="Recursos Humanos">
                                <option value="0" data-icon="fa fa-eye-slash text-blue fa-2x">No vista</option>
                                <option value="1" data-icon="fa fa-eye text-green fa-2x"> Vista</option>
                                <option value="2" data-icon="fa fa-check-square text-green fa-2x">Autorizada</option>
                                <option value="3" data-icon="fa fa-window-close text-red fa-2x">No autorizada</option>
                            </optgroup>
                        <?php endif ?>
                        <optgroup label="Jefes de departamento">
                            <option value="4" data-icon="fa fa-eye-slash text-blue fa-2x">No vista</option>
                            <option value="5" data-icon="fa fa-eye text-green fa-2x"> Vista</option>
                            <option value="6" data-icon="fa fa-check-square text-green fa-2x">Autorizada</option>
                            <option value="7" data-icon="fa fa-window-close text-red fa-2x">No autorizada</option>
                        </optgroup>
                        <optgroup label="">
                            <option value="8" data-icon="fa fa-arrows-alt text-yellow fa-2x">Todas</option>
                        </optgroup>
                    </select>
                </div>
                <?php if($recursosHumanos):?>
                <div class="col-md-3" style="margin-top:1%;">
                    <span><b>Sucursal:</b></span>
                    <select class="select-style textoMay" name="cargarAjaxSucursalSolicitudes" id="cargarAjaxSucursalSolicitudes" <?php //echo $recursosHumanos==false ? 'disabled' : ''?>>
                        <?php
                            echo'<option value="0">Todas</option>';
                            $sucursales= new gestionSucursales();
                            if(AccesoRHespecial::pertenece($_SESSION['identificador']))
                                $sucursales->vistaSucursalesSelectModelRHespecial($idSucursal);
                            else
                                $sucursales->vistaSucursalesController($idSucursal);
                        ?>
                    </select>
                </div>
                <?php endif;?>
                <div class="col-md-2" style="margin-top:1%;">
                    <span><b>Fecha: &nbsp;&nbsp;&nbsp;</b></span>
                    <input type="date" class="select-style textoMay" name="fechaOrdenarSolicitudes" id="fechaOrdenarSolicitudes">
                </div>
                <?php if(!$recursosHumanos): ?>
                <div class="col-md-3" style="margin-top:1%;">
                </div>
                <?php endif;?>
                <div class="col-md-4" style="margin-top: 30px;text-align: right;">
                    <button class="btn btn-lg btn-info" id="aplicarFiltrosSolicitudes"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div> 

          <span id="paginacionSolicitudesMostrar"><?php  echo $paginacion->mostrar();?></span>

          <div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoNombreEncabezado">Nombre</div>
            <div class="campoSucursalEncabezado">Sucursal</div>
            <div class="campoAccesoEncabezado">Tipo de solicitud</div>
            <div class="campoFechaEncabezado">Fecha</div>
            <div class="campoJefeEncabezado">Jefe</div>
            <div class="campoRHEncabezado">RH</div>
            <div class="campoOpcionesEncabezado">Detalles</div>
          </div>

          <div id="mostrarDatosUsuariosSolicitudes">
            <?php
                $permisos = new PermisosControllers();
                echo $permisos->buscarUsuariosPermisosController($datos,$paginacion->limitRegistros());
            ?>
          </div>

          <span id="paginacionSolicitudesMostrar2"><?php echo $paginacion->mostrar(); ?></span>

          <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg fade" id="mostrarPermisosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Detalles de solicitud</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                      <div class="modal-body">
                          <div class="contenedorUsuario">
                              <div class="first-div"> 
                                  <span id="target4"></span>
                              </div>
                              <div class="second-div estilos-centrar">
                                  <!--<img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuario" src="<?php //echo Ruta::ruta_server();?>views/img/user.png" alt="<?php //echo Ruta::ruta_server();?>views/img/user.png" height="140" width="110" style="cursor: pointer;">-->
                                  <img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuario" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <!--Botones javascript-->
                      </div>

                </div>
            </div>
        </div>
          <!--Ventana modal-->
      </div><!-- /.box-body -->
        
      <div class="box-footer">
      </div>

    </div>
  </section>
</div>
<!-- =============================================== -->