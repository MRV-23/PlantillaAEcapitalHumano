
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title">AGENDA ASESORES EMPRESARIALES</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body administrar-correos">
          <!--=====================================
          USUARIOS         
          ======================================-->
          <?php 
            $datos = array( 'nombreBuscar'=>'', //vacio al cargar la pagina
                'sucursal'=>0//mostrar todas las sucursales
            ); 

            $paginacion = new Paginacion(30);
            $paginacion->target('correos');
            $totalRegistros = Datos::totalRegistros('usuarios_ae',0,1);
            $paginacion->totalPaginas($totalRegistros);
          ?>


          <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Total: </span>
                            <span class="info-box-number"><?php echo $totalRegistros ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

          <div class="barraBuscador">
            <div class="barraBuscador-izquierda"></div>
            <div class="barraBuscador-derecha"><input type="text" id="buscadorUsuariosCorreos" class="buscador" placeholder="Buscar..."></div>
          </div>


          <div class="barraBuscador">
            <div class="barraBuscador-izquierda"> 
                <span>Sucursal: </span>
                <select class="select-style textoMay" name="cargarAjaxCorreos" id="cargarAjaxCorreos" required>
                    <?php
                    echo'<option value="0">Todas</option>';
                    $sucursales= new gestionSucursales();
                    $sucursales -> vistaSucursalesController();
                    ?>
                </select>
            </div>
            <div class="barraBuscador-derecha">
            </div>
          </div>



          <span id="paginacionCorreosMostrar"><?php echo $paginacion->mostrar();?></span>

          <div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoNombreEncabezado">Nombre</div>
            <div class="campoSucursalEncabezado">Correo electrónico</div>
            <div class="campoDireccionEncabezado">Opciones</div>
          </div>

          <div id="mostrarDatosUsuariosCorreos" name='mostrarDatosUsuariosCorreos'>
            <?php
                $usuarios = new gestionUsuarios();
                echo $usuarios -> buscarCorreosUsuariosController($datos,$paginacion->limitRegistros());
            ?>
          </div>

          <span id="paginacionCorreosMostrar2"><?php echo $paginacion->mostrar();?></span>



        <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg fade" id="ModalCenterCorreos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">DATOS DE PERSONAL</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="contenedorUsuario">
                              <div class="first-div-mini"> 
                                  <span id="modalInformacionCorreos"></span>
                              </div>
                              <div class="second-div-mini estilos-centrar">
                                  <img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuarioCorreo" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                              </div>
                          </div>
                          <div class="limpiardiv"></div>
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