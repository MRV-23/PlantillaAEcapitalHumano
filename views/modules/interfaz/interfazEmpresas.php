<?php 
    $data = array('nombre'=>'','situacion'=>1); 
    $paginacion = new Paginacion(30);
    $paginacion->target('empresas');
    $paginacion->parametroCliente('');
    $paginacion->parametroLiberado($data['situacion']);
    $respuesta=Empresas::mostrarEmpresas($data,$paginacion->limitRegistros());
    $paginacion->totalPaginas($respuesta['total']);

    if(GrupoEmpresas::privilegios($_SESSION['identificador']) || intval($_SESSION['identificador2']) === 6){
        $nueva='active';
        $administrar='';
    }
    else{
        $nueva='';
        $administrar='active';
    }
       

?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="controlEmpresas">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-cubes icono-encabezado"></i> ADMINISTRACIÓN DE EMPRESAS</h3>
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
                        <?php if($nueva === 'active'): ?>
                            <li role="presentation" class="<?php echo $nueva; ?>">
                                <a href="#nueva" aria-controls="encuesta" role="tab" data-toggle="tab">Nueva</a>
                            </li>
                        <?php endif; ?>
                        <li role="presentation" class="<?php echo $administrar; ?>">
                            <a href="#administrar" aria-controls="examen" role="tab" data-toggle="tab">Administrar</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="margin-top: 2%;">

                    <?php if($nueva === 'active'): ?>
                        <div role="tabpanel" class="tab-pane <?php echo $nueva; ?>" id="nueva"> 
                            <form method="POST" id="formularioEmpresas" enctype="multipart/form-data">
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>A) Datos de Identificación del Contribuyente</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">1.-RFC:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay inputIconBg" type="text" name="rfc" minlength="12" maxlength="12" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">2.-Denominación/Razón Social:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="razon" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">3.-Régimen Capital:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="regimen" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">4.-Nombre Comercial:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="nombre" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">5.-Fecha inicio de operaciones:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="inicio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">6.-Estatus en el padrón:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-toggle-on"></i>
                                                    </div>
                                                    <select class="form-control textoMay" name="status" required>
                                                        <option value=""></option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Suspendido</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">7.-Fecha de último cambio de estado:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="ultimo_cambio" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        
                                <div style="background:#3c8dbc;color:#fff;padding:5px;margin-top:2%;border-top-right-radius:20px"><h4>B) Datos de Ubicación</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">8.-Código Postal:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay codigoPostal" type="text" id="codigoPostalEmpresas" name="codigo" title="Debe contener 5 digitos" minlength="5" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">9.-Tipo de Vialidad:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="tipo_vialidad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">10.-Nombre de Vialidad:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="nombre_vialidad" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">11.-Número Exterior:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="numero_exterior" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">12.-Número Interior:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="numero_interior">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">13.-Colonia: </label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <input type="checkbox" id="coloniaManual" class="modeloRegistrado with-font" value="1"><label class="hola" for="coloniaManual">Manual</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <div id="targetColoniaEmpresa">
                                                        <input class="form-control textoMay" type="text" id="coloniaEmpresas" name="colonia" required>
                                                    </div>
                                                </div>
                                            </div>            
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">14.-Localidad:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay municipioEmpresa" type="text" name="localidad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">15.-Municipio o Demarcación Territorial:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay municipioEmpresa" type="text" name="municipio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">16.-Entidad Federativa: </label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" id="estadoEmpresa" name="entidad" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">17.-Entre Calle:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="entre_calle1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">18.-Y Calle:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="entre_calle2">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">19.-Correo Electrónico: </label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                    </div>
                                                    <input class="form-control" type="text" name="mail" pattern="[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" title="Escribe un correo valido" required>
                                                </div>
                                            </div>
                                    </div>
                                </div> 
                                <br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>C) Tipo de empresa</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-12">
                                                <label for="" >20.-Status de la empresa:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-toggle-on"></i>
                                                    </div>
                                                    <select class="form-control textoMay textAreaImportante" name="statusIntranet" required>
                                                        <option value="1">Activa</option>
                                                        <option value="0">Inactiva</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="idFactura" style="cursor:pointer;">21.-La empresa factura:</label>
                                                <br>
                                        
                                                <label class="switch">
                                                    <input type="checkbox" id="idFactura" value="1">
                                                    <span class="slider round"></span>
                                                </label>

                                            </div>
                                            <div class="col-md-4">
                                                <label for="idImss" style="cursor:pointer;">22.-La empresa es pagadora IMSS:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="idImss" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="idAsimilados" style="cursor:pointer;">23.-La empresa es pagadora asimilados:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="idAsimilados" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                    </div>
                                </div>
                                <br>

                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>D) Responsables</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <h4>24.- <button type="button" class="btn btn-success" id="responsableCalculo"> Añadir responsables</button>  Calculo de nómina</h4>
                                    <div id="areaCalculo"></div>
                                    <h4>25.- <button type="button" class="btn btn-success" id="responsableLiberacionFondeo"> Añadir responsables</button> Liberación y fondeo</h4>
                                    <div id="areaLiberacionFondeo"></div>
                                    <h4>26.- <button type="button" class="btn btn-success" id="responsableDispersion"> Añadir responsables</button> Dispersión de nómina</h4>
                                    <div id="areaDispersion"></div>
                                    <h4>27.- <button type="button" class="btn btn-success" id="responsablesFacturacion"> Añadir responsables</button> Facturación</h4>
                                    <div id="areaFacturacion"></div>
                                </div>
                                <br>

                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>E) Sucursales</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <p class="estilos-izquierda"> <i class="fa fa-info-circle fa-2x text-yellow"></i> <b>En caso de que la empresa tenga sucursales puedes añadir las direcciones de las mismas.</b> <button type="button" class="btn btn-success" id="nuevaSucursal"><i class="fa fa-home fa-lg"></i> Añadir sucursal</button></p>
                                   <div id="areaNuevaSucursal"></div>
                                </div>
                                <br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>F) Archivos</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">28.-CIF:</label>                                              
                                                <span class="btn btn-primary btn-lg btn-file" style="width:140px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documento <input type="file" name="documento" id="documentoEmpresas" accept="application/pdf"></span>          
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">29.-Logo:</label>
                                                <span class="btn btn-success btn-lg btn-file" style="width:140px;"><i class="fa fa-file-image-o" aria-hidden="true"></i> Imagen <input type="file" name="logo" id="logoEmpresas" accept="image/*"></span> 
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">30.-Sellos:</label>
                                                <span class="btn btn-warning btn-lg btn-file" style="width:140px;"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Sellos <input type="file" name="sellos" id="sellosEmpresas" accept=".zip,.rar,.7zip"></span> 
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4" style="padding: 0 40px;" id="documentoLienzo"></div>
                                            <div class="col-md-4" style="padding: 0 40px;" id="logoLienzo"></div>
                                            <div class="col-md-4" style="padding: 0 40px;" id="sellosLienzo"></div>
                                    </div>
                                </div>
      
                                <br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>G) Jurídico</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-8">
                                                <label for="">31.-Constitutiva:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="constitutiva">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">32.-Fecha protocolización:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="fechaProtocolizacionConstitutiva">
                                                </div>
                                            </div>
                                    </div>                                  
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">33.-Notaría:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-university" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="notariaConstitutiva">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">34.-Notario titular:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-gavel" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="notarioConstitutiva">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">35.-Folio mercantil electrónico (FME):</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="fmeConstitutiva">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">36.-Fecha de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="fechaRegistroConstitutiva">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">37.-Lugar de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="lugarRegistroConstitutiva">
                                                </div>
                                            </div>
                                    </div>
                                    <p>
                                        <span>Total de archivos adjuntos: <b><span id="totalAdjuntosConstitutiva" style="font-size:20px;">0</span></b></span>
                                    </p>
                                    <div>
                                        <ol id="documentosConstitutiva" class="alert alert-info loadDocuments"><h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas1">Presiona</button></h2></ol>
                                    </div>
                                    <hr style="border:1px solid #000;">
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">38.-Administrador único:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="administrador">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">39.-Accionistas/socios:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="accionistas">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">40.-Escritura:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="escrituras">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">41.-Fecha de protocolización:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="fechaProtocolizacionAdministrador">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">42.-Fecha de asamblea:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="fechaAsamblea">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">43.-Notaría:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-university" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="notariaAdministrador">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">44.-Notario titular:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-gavel" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="notarioAdministrador">
                                                </div>
                                            </div>
                                    </div>
                                   
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">45.-Folio mercantil Electrónico (FME):</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="fmeAdministrador">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">46.-Fecha de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="fechaRegistroAdministrador">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">47.-Lugar de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="lugarRegistroAdministrador">
                                                </div>
                                            </div>
                                    </div>

                                     <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="capitalSocial" style="cursor:pointer;">48.-Aumento de capital social:</label>
                                                <br>
                                        
                                                <label class="switch">
                                                    <input type="checkbox" id="capitalSocial" value="1">
                                                    <span class="slider round"></span>
                                                </label>

                                            </div>
                                            <div class="col-md-4">
                                                <label for="objeto" style="cursor:pointer;">49.-Cambio de objeto:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="objeto" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="denominacion" style="cursor:pointer;">50.-Cambio de denominación:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="denominacion" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                    </div>

                                    <p>
                                        <span>Total de archivos adjuntos: <b><span id="totalAdjuntosAdministrador" style="font-size:20px;">0</span></b></span>
                                    </p>
                                    <div>
                                        <ol id="documentosAdministrador" class="alert alert-info loadDocuments"><h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas2">Presiona</button></h2></ol>
                                    </div>

                                    <hr style="border:1px solid #000;">

                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label style="cursor:pointer;">51.-Poder:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="text" name="poder">
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <label>52.-Fecha:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay" type="date" name="fechaPoder">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="rppc" style="cursor:pointer;">53.-Inscrito en el RPPC:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="rppc" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                    </div>

                                     <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="capitalSocial" style="cursor:pointer;">54.-Apoderados:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="apoderados" class="form-control" rows="8" style="resize:vertical;"></textarea>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cambioObjeto" style="cursor:pointer;">55.-Facultades:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-book" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="facultades" class="form-control" rows="8" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                    </div>

                                   
                                </div>

                                <br>
                                <p class="estilos-izquierda"> <i class="fa fa-check-circle fa-2x text-green"></i> Campos obligatorios.</p>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <input type="file" id="archivosPdf1" accept="application/pdf" multiple>
                                        <input type="file" id="archivosPdf2" accept="application/pdf" multiple>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Guardar</button>
                                        <button type="button" id="cancelarEmpresas" class="btn btn-danger"><i class="fa fa-ban fa-lg"></i> Cancelar</button> 
                                    </div>
                                </div>
                            </form>   
                        </div>

                    <?php endif; ?>

                        <div role="tabpanel" class="tab-pane administrar-empresas <?php echo $administrar; ?>" id="administrar"> 
                            
                                <div class="row"  style="margin-top: 2%;">
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

                        </div>
                    </div>
                </div>
                              
                        
        </div>


      <!--Ventana modal-->
      <div class="modal fullscreen-modal fade bd-example-modal-lg fade" id="empresasDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" style="overflow-y:auto;">
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

        <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg" id="modalArchivosAdjuntosEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">TOTAL DE ARCHIVOS ADJUNTOS: <b><span id="labelArchivosAdjuntosEmpresas" style="font-size:21px;"></span></b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                                <i class="fa fa-window-close fa-lg text-red" aria-hidden="true"></i>
                          </button>
                      </div>

                      <div class="modal-body">
                            <div id="dataArchivosAdjuntosEmpresas" style="text-align:center">
                                <div>
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





               