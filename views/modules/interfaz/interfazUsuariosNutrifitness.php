
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title">PERSONAL DEL PROGRAMA NUTRIFITNESS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body administrar-correos2">
          <!--=====================================
          USUARIOS         
          ======================================-->
          <?php 
            $datos = array( 'nombreBuscar'=>'', //vacio al cargar la pagina
                'sucursal'=>0//mostrar todas las sucursales
            ); 

            $paginacion = new Paginacion(30);
            $paginacion->target('correos');
            $paginacion->parametrosPaginadorNutricion('nutricion');//para saber a donde apuntar el paginador, utilizar este metodo en lugar del de la línea anterior
            $totalRegistros = EventosModel::totalRegistrosNutrifitness(Tablas::nutrifitness());
            $paginacion->totalPaginas($totalRegistros);
          ?>


          <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
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
                    <option value="0">Todas</option>
                    <option value="1">Guadalajara</option>
                    <option value="2">Cd. México</option>
                    <option value="3">Monterrey</option>
                    <option value="4">Vallarta</option>
                </select>
            </div>
            <div class="barraBuscador-derecha">
            </div>
          </div>



          <span id="paginacionCorreosMostrar"><?php echo $paginacion->mostrar();?></span>

        <?php if($_SESSION['identificador'] == 357|| $_SESSION['identificador'] == 358):?>
          <div class="renglonEncabezado2">
            <div class="campoIdEncabezado" style="border:none;"></div>
            <div class="campoNombreEncabezado" style="border:none;"></div>
            <div class="campoSucursalEncabezado" style="justify-content:flex-end;border:none;"><b>Marcar / desmarcar todos:</b></div>
            <div class="campoVistoEncabezado" style="border:none;"><input type="checkbox" id="checkedJefe" style="cursor:pointer;"></div>
            <div class="campoDireccionEncabezado" style="border:none;"></div>
          </div>
        <?php endif;?>

          <div class="renglonEncabezado">
            <div class="campoIdEncabezado">No.</div>
            <div class="campoNombreEncabezado">Nombre</div>
            <div class="campoSucursalEncabezado">Correo electrónico</div>
            <div class="campoVistoEncabezado">Visto</div>
            <div class="campoDireccionEncabezado">Opciones</div>
          </div>

          <div id="mostrarDatosUsuariosCorreos">
            <?php
                $usuarios = new Eventos();
                echo $usuarios -> buscarUsuariosNutrifitness($datos,$paginacion->limitRegistros());
            ?>
          </div>

          <span id="paginacionCorreosMostrar2"><?php echo $paginacion->mostrar();?></span>



        <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg" id="ModalCenterCorreos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="overflow-y: scroll;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">FICHA DE DATOS</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="contenedorUsuario">
                              <div class="first-div"> 
                                  <span id="modalDetalleUsuarioNutrifitness"></span>
                              </div>
                              <div class="second-div estilos-centrar box box-info" style="margin-bottom: 3px;padding-top: 3px;">
                                  <img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuarioNutrifitness" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                                  <br>
                              </div>
                          </div>
                          <div id="modalDetalleUsuarioNutrifitness2" class="limpiardiv box box-info" ></div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->


         <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalLeche" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header" style="background:#92CDDC">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>LECHE</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/leche.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalCereal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header" style="background:#C0B2D2">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>CEREALES</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/cereales.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalLeguminosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#FABF8F">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>LEGUMINOSAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/leguminosas.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalCarne" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header" style="background:#EEECE1">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>CARNES</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/carnes.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalFruta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#FF99CC">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>FRUTAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/frutas.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

            <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalVerdura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#BFE985">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>VERDURAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/verduras.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

            <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalGrasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#C4BC96">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>GRASAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/grasas.jpg" >
                                </div>
                            </div>
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