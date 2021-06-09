<?php 
    $data = array('nombre'=>'','situacion'=>1); 
    $paginacion = new Paginacion(30);
    $paginacion->target('empresas');
    $paginacion->parametroCliente('');
    $paginacion->parametroLiberado($data['situacion']);
    $respuesta=Empresas::mostrarEmpresas($data,$paginacion->limitRegistros());
    $paginacion->totalPaginas($respuesta['total']);
?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="contenedorClientes">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-universal-access icono-encabezado"></i> CLIENTES</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

                 <div role="tabpanel"> 
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#nueva" aria-controls="encuesta" role="tab" data-toggle="tab">Nuevo</a>
                        </li>
                        <li role="presentation">
                            <a href="#administrar" aria-controls="examen" role="tab" data-toggle="tab">Administrar</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="margin-top: 2%;">

                        <div role="tabpanel" class="tab-pane active" id="nueva"> 
                            <form method="POST" id="formularioClientes" enctype="multipart/form-data">
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;" class="textoMay">Datos del cliente</div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">1.-Razón social:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay inputIconBg" type="text" name="rfc" minlength="12" maxlength="12" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">2.-Nombre comercial:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="razon" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span><b>3.-Giro:</b></span> <i class="fa fa-check-circle text-green"></i>
                                            <textarea name="nominasComentarios" class="form-control" rows="3" style="resize:vertical;"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <ol>
                                    <div class="row form-group">
                                        <div class="col-md-1 text-center">
                                            <i class="fa fa-plus-circle text-blue fa-3x agregarContacto" style="cursor:pointer;"></i>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="">4.-Contacto y puesto: </label>
                                            <i class="fa fa-check-circle text-green"></i>
                                            <li>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="regimen" required>
                                                </div>
                                            </li> 
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">5.-Correo electrónico:</label>
                                            <i class="fa fa-check-circle text-green"></i>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <input class="form-control textoMay" type="text" name="nombre" required>
                                             </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">6.-Teléfono:</label>
                                             <i class="fa fa-check-circle text-green"></i>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-phone"></i>
                                                 </div>
                                                 <input class="form-control celular textoMay" type="text" name="nombre" required>
                                            </div>
                                        </div>     
                                    </div>
                                    <div id="areaContacto"></div>
                                    </ol>
                                    <div class="row form-group">
                                            <div class="col-md-12">
                                                <label for="">7.-Domicilio:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="regimen" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">8.-RFC:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="regimen" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">9.-Plaza:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="regimen" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">10.-Oficina administra nómina:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="regimen" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">11.-Fecha contrato comercialización:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="inicio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">12.-Fecha contrato outsourcing:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="inicio" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;margin-top:10px;" class="textoMay">Empresas que facturan</div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <ol>
                                        <div class="row form-group">
                                                <div class="col-md-1 text-center">
                                                    <i class="fa fa-plus-circle text-blue fa-3x agregarFacturadora" style="cursor:pointer;"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="">13.-Nombre de la empresa: </label>
                                                    <li>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                            </div>
                                                                <select class="form-control textoMay" name="facturadora">
                                                                    <option></option>
                                                                    <?php echo Nominas::mostrarSelect(0,Tablas::facturadoras()); ?>
                                                                </select>
                                                        </div>
                                                    </li>
                                                </div>
                                        </div>
                                        <div id="areaFacturadora"></div>
                                    </ol>
                                </div>

                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;margin-top:10px;" class="textoMay">Empresas IMSS</div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <ol>
                                        <div class="row form-group">
                                                <div class="col-md-1 text-center">
                                                    <i class="fa fa-plus-circle text-blue fa-3x agregarImss" style="cursor:pointer;"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="">14.-Nombre de la empresa: </label>
                                                    <li>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                            </div>
                                                            <select class="form-control textoMay" name="facturadora">
                                                                <option></option>
                                                                <?php echo Nominas::mostrarSelect(0,Tablas::imss()); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                </div>
                                        </div>
                                        <div id="areaImss"></div>
                                    </ol>
                                </div>

                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;margin-top:10px;" class="textoMay">Empresas asimilados</div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <ol>
                                        <div class="row form-group">
                                                <div class="col-md-1 text-center">
                                                    <i class="fa fa-plus-circle text-blue fa-3x agregarAsimilados" style="cursor:pointer;"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="">15.-Nombre de la empresa: </label>
                                                    <li>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                            </div>
                                                            <select class="form-control textoMay" name="facturadora">
                                                                <option></option>
                                                                <?php echo Nominas::mostrarSelect(0,Tablas::asimilados()); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                </div>
                                        </div>
                                        <div id="areaAsimilados"></div>
                                    </ol>
                                </div>
                                <br>
                                <p class="estilos-izquierda"> <i class="fa fa-check-circle fa-2x text-green"></i> Campos obligatorios.</p>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Guardar</button>
                                        <button type="button" id="cancelarClientes" class="btn btn-danger"><i class="fa fa-ban fa-lg"></i> Cancelar</button> 
                                    </div>
                                </div>
                            </form>   
                        </div>

                        <div role="tabpanel" class="tab-pane administrar-empresas" id="administrar"> 
                            
                            
                            <!--    <div class="row"  style="margin-top: 2%;">
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="fa fa-upload"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"> ACTIVAS: </span>
                                                <span class="info-box-number"><span id="cargarMarcadoresLiberados"><?php echo Empresas::marcadores(1); ?></span></span>
                                            </div>
                                          
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-download"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"> NO ACTIVAS: </span>
                                                <span class="info-box-number"><span id="cargarMarcadoresCancelados"><?php echo Empresas::marcadores(0); ?></span></span>
                                            </div>
                                           
                                        </div>
                                     
                                    </div>
                                </div>
                        
                                <div class="row form-group">

                                    <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-list-ol"></i>
                                                </div>
                                                <select class="form-control textoMay iluminarIconoInput" id="filtroSituacionEmpresas">
                                                    <option value="">TODAS</option>
                                                    <option value="1" selected>ACTIVAS (STATUS INTRANET)</option>
                                                    <option value="0">INACTIVAS (STATUS INTRANET)</option>
                                                </select>
                                        </div> 
                                    </div>   

                                    <div class="col-md-8 text-right">
                                        <div><input type="text" id="buscadorUsuariosEmpresas" class="buscador" placeholder="Nombre..." style="width: 200px;height: 35px;padding: 5px;"></div>
                                    </div>  
                                    
                                </div>
   
                    
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-12"><b>Total de registros que coinciden: </b>  <span id="totalRegistrosEmpresas" style="font-size:20px;"><?php echo $respuesta['total']; ?> </span></div>
                                </div>

                            
                                <span class="paginadorEmpresas"><?php echo $paginacion->mostrar();?></span> 

                                    <div class="renglonEncabezado" style="margin-top: 25px;">
                                        <div class="campoIdEncabezado">No.</div>
                                        <div class="campoNombre" style="justify-content: center;">Empresa</div>
                                        <div class="campoFacturaEncabezado" style="justify-content: center;">Factura</div>
                                        <div class="campoImssEncabezado">IMSS</div>
                                        <div class="campoAsimiladosEncabezado">Asimilados</div>
                                        <div class="campoOpcionesEncabezado">Opciones</div>
                                    </div>

                                    <div id="dataEmpresas">
                                        <?php echo $respuesta['data']; ?>           
                                    </div>

                                <span class="paginadorEmpresas"><?php echo $paginacion->mostrar();?></span>

                        </div> -->
                    </div>
                </div>
                              
                        
        </div>


      <!--Ventana modal-->
      <div class="modal fullscreen-modal fade bd-example-modal-lg fade" id="empresasDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                      <div class="modal-header">
                            <span id="encabezadoNombre" style="font-size:20px;"></span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                                    <i class="fa fa-window-close fa-lg text-red" aria-hidden="true"></i>
                            </button>
                      </div>

                      <div class="modal-body">
                            <div id="dataEmpresasModal">
                                <div style="text-align:center">
                                    <i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i>
                                </div>
                            </div>
                      </div>
                      <div class="modal-footer estilos-centrar limpiardiv">
                        
                      </div>


                </div>
            </div>
        </div>
          <!--Ventana modal-->
          

       
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





               