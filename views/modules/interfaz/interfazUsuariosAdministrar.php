
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title">ADMINISTRACIÓN DE EMPLEADOS <!--<i class="fa fa-users icono-encabezado"></i> <i class="fa fa-pencil text-blue" aria-hidden="true"></i>--></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body administrar-usuarios">
          <!--=====================================
          USUARIOS         
          ======================================-->
          <?php 
            $sucursal = isset($_POST["mostrarSucursal"]) ? $_POST["mostrarSucursal"] : 0;
            $datos = array( 'nombreBuscar'=>'', //vacio al cargar la pagina
                            'sucursal'=>$sucursal, 
                            'situacion'=>1 //Activo = 1 ó baja = 0
            ); 

            $paginacion = new Paginacion(30);
            $paginacion->target('usuarios');
            $paginacion->totalPaginas(Datos::totalRegistros('usuarios_ae',$sucursal,1));
          ?>

            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total de empleados activos: </span>
                            <span class="info-box-number"><?php $total = Datos::totalRegistros('usuarios_ae',0,1); echo $total ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-user-times"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total de empleados baja: </span>
                            <span class="info-box-number"><?php $total = Datos::totalRegistros('usuarios_ae',0,0); echo $total; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

          <div class="barraBuscador">
            <div class="barraBuscador-izquierda"> 
            
            </div>
            <div class="barraBuscador-derecha"><input type="text" id="buscadorUsuarios" class="buscador" placeholder="Buscar..."></div>
          </div>


           <div class="barraBuscador">
                <div class="barraBuscador-izquierda"> 
                    <span>Sucursal: </span>
                    <select class="select-style textoMay" name="cargarAjaxSucursal" id="cargarAjaxSucursal">
                        <?php
                        echo'<option value="0">Todas</option>';
                        $sucursales= new gestionSucursales();
                        //$sucursales -> vistaSucursalesController($sucursal);
                        if(AccesoRHespecial::pertenece($_SESSION['identificador']))
                            $sucursales->vistaSucursalesSelectModelRHespecial(0);
                        else
                            $sucursales->vistaSucursalesController($sucursal);
                        ?>
                    </select>
                   
                    <!--<span>Departamento: </span>
                    <span id="targetDepartamentoUsuariosAdministrar">
                        <select class="select-style textoMay" name="cargarAjaxDepartamento" id="cargarAjaxDepartamento">
                            <?php //echo'<option value="0">TODOS</option>';?>
                        </select>
                    </span>-->            
                </div>
                <div class="barraBuscador-derecha">
                    <span>Situación: </span>
                    <select class="select-style textoMay" name="cargarAjaxSituacion" id="cargarAjaxSituacion">
                        <option value="1">Activos</option>
                        <option value="0">Baja</option>
                    </select>
                </div>
          </div>


          <span id="paginacionUsuariosMostrar"><?php echo $paginacion->mostrar();?></span> 

          <div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoNombreEncabezado">Nombre</div>
            <div class="campoSucursalEncabezado">Sucursal</div>
            <div class="campoAccesoEncabezado">Acceso</div>
            <div class="campoOpcionesEncabezado">Opciones</div>
          </div>

          <div id="mostrarDatosUsuarios">
            <?php
                $usuarios = new gestionUsuarios();
                $respuesta = $usuarios->buscarUsuariosController($datos,$paginacion->limitRegistros());
                echo $respuesta;
            ?>
          </div>

          <span id="paginacionUsuariosMostrar2"><?php echo $paginacion->mostrar();?></span> 


          <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DATOS DE PERSONAL</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>


                      <div class="modal-body">
                          <div class="contenedorUsuario">
                              <div class="first-div"> 
                                  <span id="target"></span>
                              </div>
                              <div class="second-div estilos-centrar">
                                  <img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuario" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                              </div>
                          </div>
                          <div id="calendar" class="divCalendario limpiardiv"></div>
                      </div>
                      <div class="modal-footer estilos-centrar limpiardiv" id="targetBotones">
                        <!--Botones javascript-->
                      </div>


                </div>
            </div>
        </div>
          <!--Ventana modal-->


         <!--Ventana modal 2-->
        <div class="modal fade bd-example-modal-lg fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle2">ASIGNAR NUEVA CONTRASEÑA</h5>
                          <button type="button" class="close" id="limpiarPass" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                            <span id="target2"></span>
                      </div>
                  </div>
              </div>
        </div>
          <!--Ventana modal 2-->

           <!--Ventana modal 3-->
         <div class="modal fade bd-example-modal-lg fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle3">FORMULARIO DE SALIDA</h5>
                          <button type="button" class="close" id="limpiarPass" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                            <span id="target3"></span>
                      </div>
                  </div>
            </div>
        </div>
          <!--Ventana modal 3-->

      </div><!-- /.box-body -->
        
      <div class="box-footer">
      </div>

    </div>
  </section>
</div>
<!-- =============================================== -->