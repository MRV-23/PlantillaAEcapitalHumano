
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title">ADMINISTRACIÓN DE EQUIPOS DE CÓMPUTO Y CREDENCIALES <!--<i class="fa fa-users icono-encabezado"></i> <i class="fa fa-pencil text-blue" aria-hidden="true"></i>--></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body administrar-equipos">
          <!--=====================================
          USUARIOS         
          ======================================-->
          <?php 
            $datos = array( 'nombreBuscar'=>'', //vacio al cargar la pagina
                            'sucursal'=>0, //todas las sucursales
                            'situacion'=>1 
            ); 

            $paginacion = new Paginacion(30);
            $paginacion->target('equipos');
            $paginacion->totalPaginas(EquiposModel::totalRegistros('equipos_ae',1)); //checar
          ?>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-laptop"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total de equipos: </span>
                            <span class="info-box-number"><?php $total = EquiposModel::totalRegistros('equipos_ae',4); echo $total ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-laptop"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Equipos vinculados a</span>
                            <span class="info-box-text"> Usuarios dados de baja:</span>
                            <span class="info-box-text"><span class="texto-marcador"> <?php $total = EquiposModel::totalRegistros('equipos_ae',2); echo $total ?></span></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-laptop"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Equipos que no están</span>
                            <span class="info-box-text"> asignados (en stock):</span>
                            <span class="info-box-text"><span class="texto-marcador"> <?php $total = EquiposModel::totalRegistros('equipos_ae',3); echo $total ?></span></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

          <div class="barraBuscador">
            <div class="barraBuscador-izquierda"> 
            
            </div>
            <div class="barraBuscador-derecha"><input type="text" id="buscadorEquipos" class="buscador" placeholder="Buscar..."></div>
          </div>


           <div class="barraBuscador">
                <div class="barraBuscador-izquierda"> 
                    <span>Sucursal: </span>
                    <select class="select-style textoMay" name="cargarAjaxSucursalEquipos" id="cargarAjaxSucursalEquipos">
                        <?php
                        echo'<option value="0">Todas</option>';
                        $sucursales= new gestionSucursales();
                        $sucursales -> vistaSucursalesController();
                        ?>
                    </select>     
                </div>
                <div class="barraBuscador-derecha">
                    <span>Situación: </span>
                    <select class="select-style textoMay" name="cargarAjaxSituacionEquipos" id="cargarAjaxSituacionEquipos">
                        <option value="1">Todos los usuarios</option>
                        <option value="0">Usuarios dados de baja</option>
                        <option value="2">No siagnados</option>

                    </select>
                </div>
          </div>


          <span id="paginacionEquiposMostrar"><?php echo $paginacion->mostrar();?></span> 

          <div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoNombreEncabezado">Nombre</div>
            <div class="campoSucursalEncabezado">Sucursal</div>
            <div class="campoOpcionesEncabezado">Opciones</div>
          </div>

          <div id="mostrarDatosEquipos">
            <?php
                $equipos = new EquiposComputo();
                $respuesta = $equipos->buscarEquiposController($datos,$paginacion->limitRegistros());
                echo $respuesta;
            ?>
          </div>

          <span id="paginacionEquiposMostrar2"><?php echo $paginacion->mostrar();?></span> 


          <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg fade" id="detalleEquiposComputo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DATOS DEL EQUIPO</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>


                      <div class="modal-body">
                          <div class="contenedorUsuario">
                              <div class="first-div"> 
                                  <span id="targetDetalleEquiposComputo"></span>
                              </div>
                              <div class="second-div estilos-centrar">
                                  <img class="sangriaPermisos" id="fotografiaUsuarioEquipo" src="views/img/user.png" alt="imagen-usuario" height="140" width="110">
                                 
                                  <img class="sangriaPermisos" style="margin-top:50px;" id="fotografiaUsuarioEquipo2" src="views/img/logo-computadora.jpg" alt="imagen-usuario" height="140" width="110">
                              </div>
                          </div>

                      </div>
                      <div class="modal-footer estilos-centrar limpiardiv" id="targetBotonesEquipoComputo">
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