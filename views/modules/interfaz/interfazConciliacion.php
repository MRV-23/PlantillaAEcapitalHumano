<?php 
    $data = array(  'cuenta'=>'',
                    'monto'=>'',
                    'folio'=>'',
                    'tipo'=>2,
                    'fecha'=>''
                ); 
    $paginacion = new Paginacion(30);
    $paginacion->target('conciliacion');
    $paginacion->parametrosPaginador($data);
    //$paginacion->parametroPago('');
    $totalRegistros=Conciliacion::contarRegistros($data);
    $paginacion->totalPaginas($totalRegistros);
?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="contenedorPadre">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-handshake-o icono-encabezado-conciliacion" ></i> CONCILIACION</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div role="tabpanel"> 
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#captura" aria-controls="captura" role="tab" data-toggle="tab">Nueva Catura</a>
                            </li>
                            <li role="presentation">
                                <a href="#consultar" aria-controls="Consultar" role="tab" data-toggle="tab">Consultar</a>
                            </li>                
                              <!--<li role="presentation">
                                <a href="#autorizados" aria-controls="eautorizados" role="tab" data-toggle="tab">Configuracion de Personal</a>
                            </li>--> 
                            <li role="presentation">
                                <a href="#descargarchivos" aria-controls="descargarchivos" role="tab" data-toggle="tab">Cargar - Descargar archivos</a>
                            </li>
                            <li role="presentation">
                                <a href="#personalautorizados" aria-controls="Personalautorizados" role="tab" data-toggle="tab">Personal Autorizado</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="captura"> 
                                    <form method="post" style="margin-top: 2%;"  id="formularioConciliacion"  class="max1000" name="formularioConciliacion"><!-- INICIO FORM DE FORMULARIO CONTROL DE GASTOS -->                                      
                                                <div class="row form-group rowColor filas" >
                                                    <div class="col-md-6">
                                                        <label for="">1.-Cuenta</label><br>                                         
                                                        <div class="input-group">
                                                            <div class="input-group-addon  infocolor" >
                                                                <i class="fa fa-building-o"></i>        
                                                            </div>                                         
                                                            <select  id="Cuenta" class="form-control inputBorder" name="Cuenta">
                                                                <?php echo Conciliacion::cargarCuentas(true);?>                                    
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" >
                                                        <label for="">2.-Responsable</label><br>                                      
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                                <i class="fa fa-id-card-o"></i>                                
                                                            </div>
                                                            <input type="text" class="form-control textoMay" name="Responsable" id="Responsable" disabled>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="row form-group rowColor">
                                                    <div class="col-md-6">
                                                        <?php //MetodoMartin::Imprimir();?> 
                                                        <label for="">3.-Banco</label> <br>                                  
                                                        <div class="input-group">
                                                            <div class="input-group-addon iluminarIconoInput infocolor" >
                                                                <i class="fa fa-hospital-o "></i>    
                                                            </div>
                                                            <input type="text" class="form-control textoMay" name="Banco" id="Banco" disabled> 
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">4.-Empresa</label><br>                                      
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                                <i class="fa fa-id-card-o"></i>                                
                                                            </div>
                                                            <div ></div>
                                                            <input type="text" class="form-control textoMay" name="Empresa" id="Empresa" disabled> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group rowColor filas" > 
                                                    <div class="col-md-4">
                                                        <label for="">5.-Fecha Movimiento</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                            <i class="fa fa-calendar-plus-o"></i>        
                                                            </div>
                                                            <input type="date" class=" textoMay form-control inputBorder" name="FechaMovimiento" id="FechaMovimiento" value="<?php echo date("Y-m-d");?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">6.-Tipo de Movimiento</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon  infocolor" >
                                                                <i class="fa fa-exchange"></i>        
                                                            </div>
                                                            <select  class="form-control inputBorder"  name="Tmovimiento" id="Tmovimiento">
                                                                <option value=""></option> 
                                                                <option value="1">CHEQUE</option> 
                                                                <option value="2">INGRESO</option>
                                                                <option value="3">EGRESO</option>                                            
                                                            </select>
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="Status">7.- Status</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                                <i class="fa fa-list-ol"></i>        
                                                            </div>
                                                            <select class="form-control inputBorder"  name="Status" id="Status" disabled>
                                                                <option value=""></option>                                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group rowColor">   
                                                    <div class="col-md-4">
                                                        <label for="">8.-Monto</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor">
                                                                <i class="fa fa-money"></i>        
                                                            </div>
                                                            <input class="form-control cal inputBorder monetario" name="MontoCheque" id="MontoCheque"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">9.-Fecha Cobro</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor">
                                                            <i class="fa fa-calendar-plus-o"></i>        
                                                            </div>
                                                            <input type="date" class=" textoMay form-control inputBorder" name="FechaCobro" id="FechaCobro" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="movimiento">
                                                        <label>10.-Número de poliza</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                            <i class="fa fa-hashtag"></i>        
                                                            </div>
                                                            <input class=" form-control inputBorder"  name="NuPoliza" id="NuPoliza" disabled>
                                                        </div>  
                                                    </div>
                                                </div> 
                                                <div class="row form-group rowColor filas">
                                                    <div class="col-md-4">
                                                        <label for="">11.-Concepto</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                                <i class="fa fa fa-edit"></i>        
                                                            </div>
                                                            <select  class="form-control inputBorder textoMay"  name="Concepto" id="Concepto"> 
                                                                                                  
                                                            </select>                                                                                          
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">12.-Beneficiario</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                                <i class="fa fa-user-o"></i>        
                                                            </div>
                                                            <select class="form-control inputBorder textoMay" name="Beneficiario" id="Beneficiario">
                                                                                                                                                      
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>13.-Clasificacion de Movimiento</label> <br>                                         
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor" >
                                                                <i class="fa fa-list-ol"></i>        
                                                            </div>
                                                            <select id="ClasificacionCargos" class="form-control inputBorder textoMay" name="ClasificacionCargos"> 
                                                                                                     
                                                            </select>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="row form-group rowColor">
                                                    <div class="col-md-5"> <!--id="FacturaCampo" name="FacturaCampo"-->
                                                        <label for="">14.-Número Factura</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor">
                                                                <i class="fa fa-hashtag"></i>        
                                                            </div>
                                                            <input class="form-control" name="Factura" id="Factura" disabled> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5"> <!-- name="FolioCampo" id="FolioCampo">-->
                                                        <label for="">15.-Número nómina</label><br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon infocolor">
                                                                <i class="fa fa-hashtag"></i>        
                                                            </div>
                                                            <input class="form-control" name="Folio" id="Folio" disabled> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 text-center"> <!-- name="FolioCampo" id="FolioCampo">-->
                                                        <label for="">Detalle nómina</label>
                                                        <button type="button" class="btn btn-success" id="detalleNomina" disabled>Validar</button> 
                                                    </div>
                                                </div>

                                                <div class="row form-group rowColor">
                                                    <div class="col-md-12 ">
                                                        <label for="">16.-Comentarios: </label> 
                                                        <textarea name="Comentarios" id="Comentarios" class="form-control inputBorder " rows="8" style="resize:vertical;border: .1px solid#00a65a;" placeholder="..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <button type="submit" class="btn btn-success btn-lg">Enviar</button> 
                                                    <button type="button" class="btn btn-danger btn-lg" id="CancelarFormConciliacion">Cancelar</button>                                        
                                                </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="consultar">
                                    <br>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="">Folio:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                </div>
                                                <input class="form-control iluminarIconoInput" type="text" id="filtroFolio">
                                            </div>   
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Monto:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                </div>
                                                <input class="form-control iluminarIconoInput monetario" type="text" id="filtroMonto">
                                            </div>  
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Tipo de registro:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select class="form-control textoMay iluminarIconoInput" id="filtroTipo" >
                                                    <option value="2">Pendientes</option>
                                                    <option value="1">Autorizados</option>
                                                    <option value="3">Eliminados</option>
                                                    <option value="">Todos</option>
                                                </select>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="">Cuenta:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select class="form-control textoMay iluminarIconoInput" id="filtroCuenta" >
                                                    <?php echo Conciliacion::cargarCuentas();?> 
                                                </select>
                                            </div>   
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="">Fecha movimiento:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                </div>
                                                <input class="form-control iluminarIconoInput" type="date" id="filtroFecha">
                                            </div>  
                                        </div> -->
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-8">
                                            <b>Total de registros que coinciden: </b>  <span id="labelTotalRegistros" style="font-size:20px;"><?php echo Conciliacion::contarRegistros($data); ?> </span>
                                        </div>   

                                        <div class="col-md-4" style="text-align:right;">
                                                <button class="btn btn-lg btn-info" id="limpiarFiltros"><i class="fa fa-refresh"></i> Actualizar</button>
                                        </div>   
                                    </div>
                                    <br>
                                    <span class="paginadorConciliacion"><?php echo $paginacion->mostrar();?></span> 
                                    <div class="row renglon-encabezado mostrar768" style="margin:1px;">
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Folio.</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar">Cuenta</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar">Monto</div>
                                        <div class="col-sm-4 col-xs-12 columna-div columna-div-centrar">Empresa</div>
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Tipo</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                                    </div>
                                    <div id="mostrarRegistros">
                                        <?php echo Conciliacion::mostrar_registros($paginacion->limitRegistros(),$data); ?>
                                    </div>
                                    <span class="paginadorConciliacion"><?php echo $paginacion->mostrar();?></span> 

                                </div>
                                <div role="tabpanel" class="tab-pane" id="personalautorizados">
                                    <h3 class="text-center">Personal con autorización para visualizar este módulo</h3>
                                    <br>
                                    <div class="row renglon-encabezado mostrar768" style="margin:1px;">
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                                        <div class="col-sm-4 col-xs-12 columna-div columna-div-centrar">Nombre</div>
                                        <div class="col-sm-3 col-xs-12 columna-div columna-div-centrar">sucursal</div>
                                        <div class="col-sm-4 col-xs-12 columna-div columna-div-centrar">Puesto</div>
                                    </div>
                                    <?php echo Nominas::mostrarNoministas2($_SERVER['REQUEST_URI']); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="descargarchivos">
                                    <br>
                                    <div class="box box-success collapsed-box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"> <i class="fa fa-download fa-3x" style="color:#00A65A"></i> Reportes</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                <i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <form method="post">  
                                                <div class="max1000">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="">Descargar reporte de los registros almacenados en el sistema:</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Fecha inicio:</label>
                                                                    <i class="fa fa-check-circle text-green"></i>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input class="form-control textoMay iluminarIconoInput" name="fechaInicio" type="date" value="<?php echo date("Y-m-d"); ?>" required>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Fecha de fin</label>
                                                                    <i class="fa fa-check-circle text-green"></i>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input class="form-control textoMay iluminarIconoInput" name="fechaFinal" type="date" value="<?php echo date("Y-m-d"); ?>" required>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-md-2">
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Tipo de registro:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                    <select class="form-control textoMay iluminarIconoInput" name="tipo" >
                                                                        <option value="2">Pendientes</option>
                                                                        <option value="1">Autorizados</option>
                                                                        <option value="3">Eliminados</option>
                                                                        <option value="">Todos</option>
                                                                    </select>
                                                                </div>   
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12 estilos-centrar">
                                                                <button type="submit" name="reporteModuloConciliacion" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                                                            </div>
                                                        </div>
                                                </div>    
                                            </form> 
                                        </div>
                                    </div>

                                    <div class="box box-info collapsed-box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"> <i class="fa fa-upload fa-3x" style="color:#00C0EF"></i> Layout</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                <i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                        
                                                <div class="max1000">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="">Descargar layout para registrar movimientos de manera masiva:</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <form method="get" enctype="multipart/form-data" id="formularioCargarLayout"> 
                                                                <div class="col-md-12 estilos-centrar">
                                                                    <span class="btn btn-info btn-lg btn-file" style="width:139px;"><i class="fa fa-upload"></i> Cargar<input type="file" name="cargarRegistros" id="cargarRegistrosConciliacion" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></span>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="row">
                                                            <form method="post">  
                                                                <div class="col-md-12 estilos-centrar">
                                                                    <p>
                                                                        <hr>
                                                                        <i class="fa fa-exclamation-circle fa-2x text-yellow"></i>
                                                                        <b>Descargar archivo para llenado de datos</b>
                                                                        <button type="submit" name="formatoLlenadoCociliacion001" value="" class="btn btn-success"><i class="fa fa-download"></i> Conciliación</button>
                                                                    </p>
                                                                </div>
                                                            </form> 
                                                        </div>
                                                </div>    
                                        </div>
                                    </div>
                                </div>

                        </div>
                </div>
            </div>
     
        </div>
    <!-- =============================================== -->
    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->

 <!-- =======================MODALES CUENTA======================== -->

    <div class="modal fade" id="modalOpcionesCuenta">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista Cuenta</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="agregarNuevaCuenta">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarCuenta">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                    </a>  
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalEditarCuenta" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar cuentas de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaCuentas">
                            <div style="text-align:center">
                                <i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i>
                                <br>
                                <span>Espere...</span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalNuevaCuenta">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelTipoCuenta"></h3>
                        </div>
                        <div class="modal-body">
                            <form action="" name="formularioAgregarCuenta" id="formularioAgregarCuenta">
                                <div class="row form-group rowColor  ">
                                    <div class="col-md-6 ">
                                    <label for="">1.-Cuenta</label> <br>                                         
                                        <div class="input-group " >
                                            <div class="input-group-addon borderGreen" >
                                                <i class="fa fa-building-o"></i>        
                                            </div>
                                            <input class="form-control inputBorder borderGreen" style="" name="NewCuenta" id="NewCuenta">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">2.-Banco</label> <br>                                  
                                        <div class="input-group">
                                            <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                <i class="fa fa-hospital-o "></i>    
                                            </div>
                                            <select  id="NewBanco" class="form-control  inputBorder borderGreen textoMay" name="NewBanco">
                                                <?php echo Conciliacion::cargarSelect(1);?>   
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12">
                                            <label for="">3.-Empresa</label> <br>                                  
                                            <div class="input-group">
                                                <div class="input-group-addon iluminarIconoInput borderGreen " >
                                                    <i class="fa fa-hospital-o "></i>    
                                                </div>                                                       
                                                <select  id="NewEmpresa" class="form-control inputBorder borderGreen textoMay" name="NewEmpresa">
                                                    <?php echo Conciliacion::cargarSelect(2);?>                                           
                                                </select>                                       
                                            </div>  
                                    </div>                                                           
                                </div>

                                <div class="row form-group rowColor ">
                                    <div class="col-md-6">
                                        <label for="">4.-Sucursal</label><br>                                      
                                        <div class="input-group">
                                            <div class="input-group-addon borderGreen" >
                                                <i class="fa fa-id-card-o"></i>                                
                                            </div>                                                                  
                                            <select  id="NewSucursal" class="form-control inputBorder borderGreen" name="NewSucursal">
                                                <option value=""></option>
                                                <?php
                                                    $sucursales= new gestionSucursales();
                                                    $sucursales->vistaSucursalesController();
                                                ?>                          
                                            </select>                                                   
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">5.-Tesorero</label><br>                                      
                                        <div class="input-group">
                                            <div class="input-group-addon borderGreen" >
                                                <i class="fa fa-id-card-o"></i>                                
                                            </div> 
                                            <select  id="NewTesorero" class="form-control inputBorder borderGreen" name="NewTesorero">                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">                                           
                                    <button type="submit" class="btn btn-success btn-lg" id="AgregarNewCuenta" id="AgregarNewCuenta">Enviar</button>                                                   
                                </div>
                            </form>                           
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
 
<!-- =======================FIN MODALES CUENTA======================== -->


<!-- =======================MODALES BENEFICIARIOS======================== -->

    <div class="modal fade" id="modalOpcionesBeneficiarios">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista Beneficiarios</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="agregarNuevoBeneficiario">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarBenificiario">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                    </a>  
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalEditarBeneficiario" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar cuentas de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaBeneficiarios">
                            <div style="text-align:center">
                                <i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i>
                                <br>
                                <span>Espere...</span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalNuevoBeneficiario">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelTipoBeneficiario"></h3>
                        </div>
                        <div class="modal-body">
                            <form action="" name="FormularioNewBeneficiario" id="FormularioNewBeneficiario">
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12"> 
                                        <label >Beneficiario</label> <br>                                       
                                        <div class="input-group">
                                            <div class="input-group-addon iluminarIconoInput  borderGreen" >
                                                <i class="fa fa-building-o"></i>        
                                            </div>
                                            <input class="form-control inputBorder borderGreen" name="Newbeneficiario" id="Newbeneficiario">
                                        </div>
                                    </div>
                                </div>    
                                <div class="row text-center">
                                    <button type="submit" class="btn btn-success btn-lg">Enviar</button>                                                                                        
                                </div>
                            </form>                     
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
 
<!-- =======================MODALES BENEFICIARIOS======================== -->

<!-- =======================MODALES CONCEPTOS======================== -->

    <div class="modal fade" id="modalOpcionesConceptos">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista Conceptos</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="agregarNuevoConcepto">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarConcepto">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                    </a>  
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalEditarConcepto" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar conceptos de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaConceptos">
                            <div style="text-align:center">
                                <i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i>
                                <br>
                                <span>Espere...</span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalNuevoConcepto">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelTipoConcepto"></h3>
                        </div>
                        <div class="modal-body">
                            <form action="" name="FormularioConceptoMovimiento" id="FormularioConceptoMovimiento">
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12">
                                    <label >Concepto Movimiento</label> <br>                                        
                                        <div class="input-group">
                                            <div class="input-group-addon iluminarIconoInput borderGreen ">
                                                <i class="fa fa-building-o"></i>        
                                            </div>
                                            <input class="form-control  inputBorder borderGreen" name="NewconceptoMovimiento" id="NewconceptoMovimiento">
                                        </div>
                                    </div>
                                </div>    
                                <div class="row text-center">                                           
                                    <button type="submit" class="btn btn-success btn-lg" id="AgregarConceptoMovimiento" id="AgregarConceptoMovimiento">Enviar</button>                                                    
                                </div>
                            </form>                  
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
 
<!-- =======================MODALES CONCEPTOS======================== -->


<!-- =======================MODALES MOVIMIENTOS======================== -->

    <div class="modal fade" id="modalOpcionesMovimientos">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista Movimientos</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="agregarNuevoMovimiento">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarMovimiento">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                    </a>  
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalEditarMovimiento" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar movimientos de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaMovimientos">
                            <div style="text-align:center">
                                <i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i>
                                <br>
                                <span>Espere...</span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

    <div class="modal fade" id="modalNuevoMovimiento">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelTipoMovimiento"></h3>
                        </div>
                        <div class="modal-body">
                            <form name="formularioClasificacionCargos" id="formularioClasificacionCargos">
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12">
                                        <label for="">1.-Tipo de Movimiento</label> <br>                                  
                                        <div class="input-group">
                                            <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                <i class="fa fa-hospital-o "></i>    
                                            </div>
                                            <select  class="form-control inputBorder" name="NewtipomMovimiento" id="NewtipomMovimiento">
                                                <option value=""></option> 
                                                <option value="2">INGRESO</option>
                                                <option value="3">EGRESO</option>                                            
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12">
                                        <label for="">2.-Nombre de Concepto</label> <br>                                  
                                        <div class="input-group">
                                            <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                <i class="fa fa-hospital-o "></i>    
                                            </div>
                                            <input  class="form-control inputBorder borderGreen"name="NewnombreConcepto" id="NewnombreConcepto">                                           
                                        </div>  
                                    </div>
                                </div>
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12">
                                    <label for="">3.-Descripcion</label><br>                                      
                                        <div class="input-group">
                                            <div class="input-group-addon borderGreen">
                                                <i class="fa fa-id-card-o"></i>                                
                                            </div>
                                            <textarea class="form-control inputBorder borderGreen" name="Newdescripcion" id="Newdescripcion" rows="3" style="resize:vertical;"></textarea>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group rowColor ">
                                    <div class="col-md-12">
                                        <label for="">4.-Nota</label><br>                                      
                                        <div class="input-group">
                                            <div class="input-group-addon borderGreen" >
                                                <i class="fa fa-id-card-o"></i>                                
                                            </div>
                                            <textarea class="form-control inputBorder borderGreen" name="Newnota" id="Newnota" rows="3" style="resize:vertical;"></textarea>                                           
                                        </div>  
                                    </div>
                                </div>
                                <div class="row text-center">                                           
                                    <button type="submit" class="btn btn-success btn-lg">Enviar</button>                                                     
                                </div>
                            </form>               
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
 
<!-- =======================MODALES FIN MOVIMIENTOS======================== -->

<!-- =======================MODALES ACTUALIZAR DATOS=========================== -->

<div class="modal fade" id="modalActualizarDatos" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Datos del movimiento <b><span id="labelNoMovimiento"></b></h3>
                           
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Capturo: </b><span id="dataCapturo"></span>                                     
                                </div>
                                <div class="col-md-6">
                                    <b>Sucursal: </b><span id="dataSucursal"></span>                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Fecha: </b><span id="dataFecha"></span>                                        
                                </div>
                                <div class="col-md-6">
                                    <b>Hora: </b><span id="dataHora"></span>                                        
                                </div>
                            </div>
                            <hr>
                            <div id="mostrarDatosAautorizar">
                                <div><b>Datos a autorizar (Se muestran los datos que inicialmente fueron capturados)</b></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Fecha de movimiento: </b><span id="verificacionFecha"></span>                                     
                                    </div>
                                    <div class="col-md-6">
                                        <b>Tipo de movimiento: </b><span id="verificacionTipo"></span>                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Monto: </b><span id="verificacionMonto"></span>                                        
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <form method="post" style="margin-top: 2%;" id="formularioConciliacionAC"  class="max1000"><!-- INICIO FORM DE FORMULARIO CONTROL DE GASTOS -->                                      
                                <div class="row form-group rowColor filas" >
                                    <div class="col-md-6">
                                        <label for="">1.-Cuenta</label><br>                                         
                                        <div class="input-group">
                                            <div class="input-group-addon  infocolor" >
                                                <i class="fa fa-building-o"></i>        
                                            </div>                                         
                                            <select  id="CuentaAC" class="form-control inputBorder formato-visualizacion" name="Cuenta">
                                                <?php echo Conciliacion::cargarCuentas();?>                                    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" >
                                        <label for="">2.-Responsable</label><br>                                      
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                                <i class="fa fa-id-card-o"></i>                                
                                            </div>
                                            <input type="text" class="form-control textoMay" name="Responsable" id="ResponsableAC" disabled>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row form-group rowColor">
                                    <div class="col-md-6">
                                        <?php //MetodoMartin::Imprimir();?> 
                                        <label for="">3.-Banco</label> <br>                                  
                                        <div class="input-group">
                                            <div class="input-group-addon iluminarIconoInput infocolor" >
                                                <i class="fa fa-hospital-o "></i>    
                                            </div>
                                            <input type="text" class="form-control textoMay" name="Banco" id="BancoAC" disabled> 
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">4.-Empresa</label><br>                                      
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                                <i class="fa fa-id-card-o"></i>                                
                                            </div>
                                            <div ></div>
                                            <input type="text" class="form-control textoMay" name="Empresa" id="EmpresaAC" disabled> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group rowColor filas" > 
                                    <div class="col-md-4">
                                        <label for="">5.-Fecha Movimiento</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                            <i class="fa fa-calendar-plus-o"></i>        
                                            </div>
                                            <input type="date" class=" textoMay form-control inputBorder formato-visualizacion" name="FechaMovimiento" id="FechaMovimientoAC" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">6.-Tipo de Movimiento</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon  infocolor" >
                                                <i class="fa fa-exchange"></i>        
                                            </div>
                                            <select  class="form-control inputBorder formato-visualizacion"  name="Tmovimiento" id="TmovimientoAC">
                                                <option value=""></option> 
                                                <option value="1">CHEQUE</option> 
                                                <option value="2">INGRESO</option>
                                                <option value="3">EGRESO</option>                                            
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Status">7.-Status</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                                <i class="fa fa-list-ol"></i>        
                                            </div>
                                            <select class="form-control inputBorder formato-visualizacion" name="Status" id="StatusAC">
                                                <option value=""></option>                                     
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group rowColor">   
                                    <div class="col-md-4">
                                        <label for="">8.-Monto</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor">
                                                <i class="fa fa-money"></i>        
                                            </div>
                                            <input class="form-control cal inputBorder monetario formato-visualizacion" name="MontoCheque" id="MontoChequeAC"> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">9.-Fecha Cobro</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor">
                                            <i class="fa fa-calendar-plus-o"></i>        
                                            </div>
                                            <input type="date" class=" textoMay form-control inputBorder formato-visualizacion2" name="FechaCobro" id="FechaCobroAC" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="movimiento">
                                        <label>10.-Número de poliza</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                            <i class="fa fa-hashtag"></i>        
                                            </div>
                                            <input class=" form-control inputBorder formato-visualizacion2"  name="NuPoliza" id="NuPolizaAC" disabled>
                                        </div>  
                                    </div>
                                </div> 
                                <div class="row form-group rowColor filas">
                                    <div class="col-md-4">
                                        <label for="">11.-Concepto</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                                <i class="fa fa fa-edit"></i>        
                                            </div>
                                            <select  class="form-control inputBorder textoMay formato-visualizacion"  name="Concepto" id="ConceptoAC"> 
                                                <?php echo Conciliacion::cargarConceptos();?>                                         
                                            </select>                                                                                          
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">12.-Beneficiario</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                                <i class="fa fa-user-o"></i>        
                                            </div>
                                            <select class="form-control inputBorder textoMay formato-visualizacion" name="Beneficiario" id="BeneficiarioAC">
                                                <?php echo Conciliacion::cargarBeneficiarios();?>                                                                                       
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>13.-Clasificacion de Movimiento</label> <br>                                         
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                                <i class="fa fa-list-ol"></i>        
                                            </div>
                                            <select id="ClasificacionCargosAC" class="form-control inputBorder textoMay formato-visualizacion" name="ClasificacionCargos"> 
                                                <?php echo Conciliacion::cargarMovimientos(); ?>                                       
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row form-group rowColor">
                                    <div class="col-md-5"> <!--id="FacturaCampo" name="FacturaCampo"-->
                                        <label for="">14.-Número Factura</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor">
                                                <i class="fa fa-hashtag"></i>        
                                            </div>
                                            <input class="form-control formato-visualizacion2" name="Factura" id="FacturaAC" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-md-5"> <!-- name="FolioCampo" id="FolioCampo">-->
                                        <label for="">15.-Número nómina</label><br>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor">
                                                <i class="fa fa-hashtag"></i>        
                                            </div>
                                            <input class="form-control formato-visualizacion2" name="Folio" id="FolioAC" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center"> <!-- name="FolioCampo" id="FolioCampo">-->
                                        <label for="">Detalle nómina</label>
                                        <button type="button" class="btn btn-success formato-visualizacion2" id="detalleNominaAC" disabled>Validar</button> 
                                    </div>
                                </div>

                                <div class="row form-group rowColor">
                                    <div class="col-md-12 ">
                                        <label for="">16.-Comentarios: </label> 
                                        <textarea name="Comentarios" id="ComentariosAC" class="form-control inputBorder formato-visualizacion" rows="8" style="resize:vertical;border: .1px solid#00a65a;" placeholder="..."></textarea>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <button type="button" class="btn btn-success btn-lg" id="botonEditar">Editar</button>
                                    <button type="submit" class="btn btn-primary btn-lg" style="display:none" id="botonGuardarEdicion">Guardar cambios</button>      
                                    <button type="button" class="btn btn-info btn-lg" style="display:" id="botonAutorizar">Autorizar</button> 
                                    <button type="button" class="btn btn-danger btn-lg" style="display:" id="botonNoAutorizar">No autorizar</button>                                                                                                              
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>

<!-- =======================MODALES FIN ACTUALIZAR DATOS=========================== -->

<!-- =======================MODALES DATOS DE NÓMINA======================== -->
<div class="modal fade" id="modalDatosNominas" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Datos nómina</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarDatosNomina">
                            <div style="text-align:center">
                                <i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i>
                                <br>
                                <span>Espere...</span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
<!-- =======================MODALES FIN DATOS DE NÓMINA======================== -->











                                  








