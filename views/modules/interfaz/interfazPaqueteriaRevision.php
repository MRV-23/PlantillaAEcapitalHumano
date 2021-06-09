<?php  
    $privilegios = false;
    $situacionInternos = 8;
    if($_SESSION['identificador2'] == Configuraciones::recepcion() || AccesoEspecialPaqueteria::pertenece($_SESSION['identificador']) ){
        $privilegios = true;
        $situacionInternos =1;
    }
    
    #PAQUETES INTERNOS
    $datos = array('fecha'=>'',
                    'situacion'=>$situacionInternos, 
                    'idUsuario'=>$_SESSION['identificador']
              ); 

    $paginacion = new Paginacion(25);
    $totalRegistros=0;
    if($privilegios)
        $totalRegistros = Paqueteria::totalPaquetesInternosPlus($datos); //cuento todos los registros
    else
        $totalRegistros = Paqueteria::totalPaquetesInternos($datos); //cuento todos los registros
    $paginacion->totalPaginas($totalRegistros);
    $paginacion->target('paquetesInternos');

    #PAQUETES EXTERNOS
    $datos2 = array('fecha'=>'',
                    'situacion'=>'1', 
                    'idUsuario'=>$_SESSION['identificador']
              ); 
    $paginacion2 = new Paginacion(25);
    $totalRegistros2 = Paqueteria::totalPaquetesExternos($datos2); //cuento todos los registros
    $paginacion2->totalPaginas($totalRegistros2);
    $paginacion2->target('paquetesExternos');

    $activarPestanaExterna='';
    $activarPestanaInterna='active';
    if(isset($_POST['expandirPestanaExterna'])){
        $activarPestanaExterna = 'active';
        $activarPestanaInterna='';
    }
?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
           <h3 class="box-title">ADMINISTRACIÓN DE PAQUETES</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

      <!--pestañas-->
        <div role="tabpanel">
            <ul class="nav nav-tabs">
                <li role="presentation" class="<?php echo $activarPestanaInterna; ?>">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Paquetes internos</a>
                </li>
                <li role="presentation" class="<?php echo $activarPestanaExterna; ?>">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Paquetes externos</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane <?php echo $activarPestanaInterna; ?> administrar-paquetesInternos" id="home">

                <div class="row"  style="margin-top:2%;">
                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon marcadoresExtra bg-aqua"><i class="fa fa-sign-out"></i></span>
                            <div class="info-box-content" style="padding-bottom:0px;">
                                <span class="info-box-text"><b><u>SALIENTES:</u></b> <?php echo Paqueteria::marcadoresInternos(0)?></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-question-circle-o text-blue"></i> Pendientes: <b><?php echo Paqueteria::marcadoresInternos(1)?></b></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-window-close text-red"></i> Cancelados: <b><?php echo Paqueteria::marcadoresInternos(2)?></b></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-clock-o text-yellow"></i> Por recolectar: <b><?php echo Paqueteria::marcadoresInternos(3)?></b></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-truck text-black"></i> En ruta: <b><?php echo Paqueteria::marcadoresInternos(5)?></b></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-check-square text-green"></i> Recibidos: <b><?php echo Paqueteria::marcadoresInternos(4)?></b></span>
                                
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-6">
                        <div class="info-box" style="height:110px;">
                            <span class="info-box-icon marcadoresExtra bg-green"><i class="fa fa-sign-in"></i></span>
                            <div class="info-box-content" style="padding-bottom:35px;">
                                <span class="info-box-text"><b><u>ENTRANTES:</u></b> <?php echo Paqueteria::marcadoresInternos(0,true)?></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-clock-o text-yellow"></i> Por recolectar: <b><?php echo Paqueteria::marcadoresInternos(3,true)?></b></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-truck text-black"></i> En ruta: <b><?php echo Paqueteria::marcadoresInternos(5,true)?></b></span>
                                <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-check-square text-green"></i> Recibidos: <b><?php echo Paqueteria::marcadoresInternos(4,true)?></b></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
               
                <!--PAQUETES INTERNOS USUARIO SIN PRIVILEGIOS DE PAQUETERIA-->
                        <div class="row">
                            <div class="col-md-3" style="margin-top:2%;">
                                <span><b>Fecha de registro: </b></span>
                                <input type="date" class="select-style textoMay" name="fechaPaquetesInternos" id="fechaPaquetesInternos">
                            </div>
                           
                            <div class="col-md-3 text-left" style="margin-top:2%;">
                                <?php if($privilegios): ?>
                                <span><b>Estado actual: </b></span>
                                    <select class="selectpicker" name="situacionPaquetesInternos" id="situacionPaquetesInternos">
                                            <optgroup label="SALIENTES">
                                                <option value="0" data-icon="fa fa-arrows-alt text-yellow fa-2x">Salientes - Todos</option>
                                                <option value="1" data-icon="fa fa-question-circle-o text-blue fa-2x" selected>Pendientes</option>
                                                <option value="2" data-icon="fa fa-window-close text-red fa-2x">Cancelados</option>
                                                <option value="3" data-icon="fa fa-clock-o text-yellow fa-2x">Salientes - Por recolectar</option>
                                                <option value="8" data-icon="fa fa-truck text-black fa-2x">Salientes - En ruta</option>
                                                <option value="4" data-icon="fa fa-check-square text-green fa-2x">Salientes - Recibidos</option>
                                            </optgroup>
                                            <optgroup label="ENTRANTES">
                                                <option value="5" data-icon="fa fa-arrows-alt text-yellow fa-2x">Entrantes - Todos</option>
                                                <option value="9" data-icon="fa fa-clock-o text-yellow fa-2x">Entrantes - Por recolectar</option>
                                                <option value="6" data-icon="fa fa-truck text-black fa-2x">Entrantes - En ruta</option>
                                                <option value="7" data-icon="fa fa-check-square text-green fa-2x">Entrantes - Recibidos</option>
                                            </optgroup>
                                    </select>   
                                <?php else: ?> 
                                    <span><b>Estado actual: </b></span>
                                    <select class="selectpicker" name="situacionPaquetesInternos" id="situacionPaquetesInternos">
                                            <optgroup label="">
                                                <option value="0" data-icon="fa fa-arrows-alt text-yellow fa-2x">Todos</option>
                                            </optgroup>
                                            <optgroup label="SALIENTES">
                                                <option value="1" data-icon="fa fa-question-circle-o text-blue fa-2x">Pendientes</option>
                                                <option value="2" data-icon="fa fa-window-close text-red fa-2x">Cancelados</option>
                                                <option value="3" data-icon="fa fa-clock-o text-yellow fa-2x">Salientes - Por recolectar</option>
                                                <option value="7" data-icon="fa fa-truck text-black fa-2x">Salientes - En ruta</option>
                                                <option value="4" data-icon="fa fa-check-square text-green fa-2x">Salientes - Recibidos</option>
                                            </optgroup>
                                            <optgroup label="ENTRANTES">
                                                <option value="8" data-icon="fa fa-clock-o text-yellow fa-2x" selected>Entrantes - Por recolectar</option>
                                                <option value="5" data-icon="fa fa-truck text-black fa-2x">Entrantes - En ruta</option>
                                                <option value="6" data-icon="fa fa-check-square text-green fa-2x">Entrantes - Recibidos</option>
                                            </optgroup>
                                    </select>
                                <?php endif?>   
                            </div>
                            <div class="col-md-3" style="margin-top:2%;">
                                
                            </div>
                            <div class="col-md-3 text-right" style="margin-top:2%;">
                                <button class="btn btn-lg btn-info" id="aplicarFiltrosPaquetesInternos"><i class="fa fa-eraser"></i> Limpiar filtros</button>
                            </div>
                        </div>

                        <span id="paginacionPaquetesInternos"><?php  echo $paginacion->mostrar();?></span>

                        <div class="renglonEncabezado" style="margin-top:2%;">
                            <div class="campoIdEncabezado">No. Envio</div>
                            <div class="campoDestinatarioEncabezado">Destinatario / Remitente</div>
                            <div class="campoTipoEncabezado">Saliente / Entrante</div>
                            <div class="campoSituacionEncabezado">Estado actual</div>
                            <div class="campoFechaEncabezado">Fecha de registro</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                        <div id="mostrarDatosPaquetesInternos">
                            <?php
                                $paquetesInternos = new Paqueteria();
                                if($privilegios)
                                    echo $paquetesInternos->buscarPaquetesInternosPlus($datos,$paginacion->limitRegistros());
                                else
                                    echo $paquetesInternos->buscarPaquetesInternos($datos,$paginacion->limitRegistros());
                            ?>
                        </div>

                        <span id="paginacionPaquetesInternos2"><?php  echo $paginacion->mostrar();?></span>
                <!--FIN PAQUETES INTERNOS USUARIO SIN PRIVILEGIOS DE PAQUETERIA-->
                
                </div>
                <div role="tabpanel" class="tab-pane <?php echo $activarPestanaExterna; ?> administrar-paquetesExternos" id="profile">

                        <div class="row"  style="margin-top:2%;">
                            <div class="col-md-12">
                                <div class="info-box" style="height:110px;">
                                    <span class="info-box-icon marcadoresExtra bg-aqua"><i class="fa fa-sign-out"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><b><u>Salientes:</u></b> <?php echo Paqueteria::marcadoresExternos(0)?></span>
                                        <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-question-circle-o text-blue"></i> Pendientes: <b><?php echo Paqueteria::marcadoresExternos(1)?></b></span>
                                        <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-window-close text-red"></i> Cancelados: <b><?php echo Paqueteria::marcadoresExternos(2)?></b></span>
                                        <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-clock-o text-yellow"></i> Por recolectar: <b><?php echo Paqueteria::marcadoresExternos(3)?></b></span>
                                        <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-truck text-black"></i> En ruta: <b><?php echo Paqueteria::marcadoresExternos(5)?></b></span>
                                        <span class="info-box-text" style="font-size:12px;margin-left:20px;"><i class="fa fa-check-square text-green"></i> Recibidos: <b><?php echo Paqueteria::marcadoresExternos(4)?></b></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>

                 <!--PAQUETES EXTERNOS-->
                        <div class="row">
                            <div class="col-md-2" style="margin-top:2%;">
                                <span><b>Fecha de registro: </b></span>
                                <input type="date" class="select-style textoMay" name="fechaPaquetesExternos" id="fechaPaquetesExternos">
                            </div>
                            
                            <div class="col-md-2" style="margin-top:2%;">
                                <span><b>Estado actual: </b></span>
                                <select class="selectpicker" name="situacionPaquetesExternos" id="situacionPaquetesExternos">
                                        <optgroup label="">
                                            <option value="0" data-icon="fa fa-arrows-alt text-yellow fa-2x">Todos</option>
                                        </optgroup>
                                        <optgroup label="">
                                            <option value="1" data-icon="fa fa-question-circle-o text-blue fa-2x" selected>Pendientes</option>
                                            <option value="2" data-icon="fa fa-window-close text-red fa-2x">Cancelados</option>
                                            <option value="3" data-icon="fa fa-clock-o text-yellow fa-2x">Por recolectar</option>
                                            <option value="5" data-icon="fa fa-truck text-black fa-2x">En ruta</option>
                                            <option value="4" data-icon="fa fa-check-square text-green fa-2x">Recibidos</option>
                                        </optgroup>
                                </select>
                            </div>
                            <div class="col-md-6" style="margin-top:2%;">
                            </div>
                            <div class="col-md-2" style="margin-top:4%;">
                                <button class="btn btn-lg btn-info" id="aplicarFiltrosPaquetesExternos"><i class="fa fa-eraser"></i> Limpiar filtros</button>
                            </div>
                        </div>

                        

                        <span id="paginacionPaquetesExternos"><?php  echo $paginacion2->mostrar();?></span>

                        <div class="renglonEncabezado" style="margin-top:2%;">
                            <div class="campoIdEncabezado">No. Envio</div>
                            <div class="campoDestinatarioEncabezado">Compañia</div>
                            <div class="campoFechaEncabezado">Contacto</div>
                            <div class="campoTipoEncabezado">Fecha de registro</div>
                            <div class="campoSituacionEncabezado">Estado actual</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                        <div id="mostrarDatosPaquetesExternos">
                            <?php
                                $paquetesExternos = new Paqueteria();
                                echo $paquetesExternos->buscarPaquetesExternos($datos2,$paginacion2->limitRegistros());
                            ?>
                        </div>

                        <span id="paginacionPaquetesExternos2"><?php  echo $paginacion2->mostrar();?></span>
                <!--FIN PAQUETES EXTERNOS-->
                </div>
            </div>
        </div>
        <!--fin pestañas-->
       
        <!--Ventana modal modal-lg-->
        <div class="modal fade bd-example-modal-lg fade" id="mostrarPaqueteriaInternaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Tipo de paquete <b><span id="labelTipoPaquete"></span></b></h5>
                          <span id='quitarBoton'><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                      <div class="modal-body">
                          <div class="contenedorUsuario">
                              <div class="first-div-mini"> 
                                  <br>
                                  <span id="targetPaqueteInterno"></span>
                              </div>
                              <div class="second-div-mini estilos-centrar">
                                  <img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuario" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                              </div>
                          </div>
                      </div>
                      <div class="limpiardiv" style="margin-left:12px;">
                            <span id="targetPaqueteInterno2"></span>
                      </div>
                      <div class="modal-footer">

                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->


          <!--Ventana modal modal-lg-->
        <div class="modal fade bd-example-modal-lg fade" id="mostrarPaqueteriaExternaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Paquete Externo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                      <div class="modal-body">
                            <?php if($privilegios): ?>
                                <div class="contenedorUsuario">
                                    <div class="first-div-mini"> 
                                        <br>
                                        <span id="targetPaqueteExterno"></span>
                                    </div>
                                    <div class="second-div-mini estilos-centrar">
                                        <img class="sangriaPermisos visor-crow-imagen-mini" id="fotografiaUsuario2" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                                    </div>
                                </div>
                            <?php endif ?>

                      </div>
                     
                      <div class="limpiardiv" style="margin-left:12px;">
                            <span id="targetDetallePaqueteExterno"></span>
                      </div>

                      <div class="modal-footer">
                            <form id="activarPestanaExternos" action="paqueteriaRevision" method="post">
                                <input type="hidden" name="expandirPestanaExterna" value="true"/>
                            </form>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->


          <!--Ventana modal-->
          <div class="modal fade bd-example-modal-lg fade" id="cuestionarioPaqueteInterno" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Evaluación del contenido del paquete</h5>
                    </div>

                    <div class="modal-body">
                        <form method="POST" id="formularioRecepcionPaqueteInterno">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">1.-Esta completo:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <select class="form-control textoMay" name="completoInterno" id="completoInterno" required>
                                        <option value=""></option>
                                        <option value="1">Sí</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">2.-Esta en buen estado:</label>
                                    <i class="fa fa-check-circle text-green"></i>
                                    <select class="form-control textoMay" name="estadoInterno" id="estadoInterno" required>
                                        <option value=""></option>  
                                        <option value="1">Sí</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <div class="col-md-12">
                                <label for="" >3.-Cometarios:</label>
                                <textarea name="descripcionRecepcionInterna" class="form-control textoMay textAreaImportante" id="descripcionRecepcionInterna" rows="4" style="resize:vertical;" placeholder="..."></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 estilos-centrar">
                                <button type="submit" class="btn btn-success btn-lg">Finalizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                     
                      <div class="modal-footer">
                        
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->



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



