<?php
$informativos=Informativos::mostrarInformativos();
$privilegios = GrupoCostos::privilegios($_SESSION['identificador']);
if($privilegios || $_SESSION['identificador2'] == 6 || $_SESSION['identificador'] == 201 ){
    $modificarInformativo = "informativo-a";
    $modificarInformativo2 = "informativo2-a";
    $activeNuevo = 'active';
    $activeConsultar = '';
}
else{
    $modificarInformativo = "informativo";
    $modificarInformativo2 = "informativo2";
    $activeNuevo = '';
    $activeConsultar = 'active';
}
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="controlFacturacion">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-calculator icono-encabezado"></i> Control de Costos</h3>
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
                                <?php if($privilegios || $_SESSION['identificador2'] == 6 || $_SESSION['identificador'] == 201): ?>
                                <li role="presentation" class="<?php echo $activeNuevo;?>">
                                    <a href="#nuevo" aria-controls="encuesta" role="tab" data-toggle="tab">Capturar</a>
                                </li>
                                <?php endif;?>
                                <li role="presentation" class="<?php echo $activeConsultar;?>"> 
                                    <a href="#administrar" aria-controls="encuesta" role="tab" data-toggle="tab">Consultar</a>
                                </li>
                                <li role="presentation">
                                    <a href="#archivos" aria-controls="archivos" role="tab" data-toggle="tab">Cargar - Descargar archivos</a>
                                </li>
                                <li role="presentation">
                                    <a href="#autorizados" aria-controls="examen" role="tab" data-toggle="tab">Personal con autorización</a>
                                </li>
                        </ul>
                        <div class="tab-content" style="margin-top: 2%;">

                            <div role="tabpanel" class="tab-pane <?php echo $activeNuevo;?>" id="nuevo"> 
                                
                                <!-- ********************************************************* -->
                                <form method="POST" style="margin-top: 2%;"  id="formularioControlGastos"><!-- INICIO FORM DE FORMULARIO CONTROL DE GASTOS -->                
                                    
                                    <div class="row form-group rowColorWhite"> <!-- INICIO ROW 1 COLUMNA -->
                                    <!--<div class="col-md-2">
                                            <label for="passActual">1.-Año</label> 
                                            <i class="fa fa-check-circle text-green"></i>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['ejercicio'];?>">
                                                    <i class="fa fa-list-ol"></i>        
                                                </div>
                                                <select  id="Ejercicio" class="form-control iluminarIconoInput validarObligatorios" name="Ejercicio">
                                                    <option value=""></option>
                                                    <?php 
                                                        //$ejercicio = Costos::ejercicio();
                                                        //echo $ejercicio; 
                                                    ?>
                                                </select>
                                            </div> 
                                        </div>--> 
                                        <div class="col-md-2">                   
                                            <label for="passActual">1.-Mes</label>  
                                            <i class="fa fa-check-circle text-green"></i>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['mes'];?>">
                                                <i class="fa fa-list-ol"></i>         
                                                </div>
                                                <select class="form-control iluminarIconoInput validarObligatorios textoMay" id="Mes" name="Mes">
                                                    <?php echo Costos::cargarMes()?>
                                                </select>                               
                                            </div>  
                                        </div>                         
                                        <div class="col-md-5">
                                                <label for="passActual">2.-Cliente</label> 
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['cliente'];?>">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                    <select class="form-control iluminarIconoInput validarObligatorios textoMay" id="Clientes" name="Clientes">
                                                        <?php echo Costos::cargarSelect2(true);?>
                                                    </select>
                                                </div>  
                                        </div>
                                        <div class="col-md-5">
                                            <label for="passActual">3.-Nombre Comercial</label> 
                                            <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['nombre_comercial'];?>">
                                                        <i class="fa fa-list-ol"></i>
                                                    </div>
                                                    <input type="text" class="form-control iluminarIconoInput validarObligatorios textoMay" id="NombreComercial" name="NombreComercial" disabled><!--Eliminar-->
                                                </div> 
                                        </div>
                                                           
                                    </div><!-- FIN ROW 1 COLUMNA onKeyUp="Costos.solonumeros()"-->

                                    <div class="row form-group rowColorGray"><!-- INICIO ROW 3 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="passActual">4.-Nombre Promotor</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['promotor'];?>">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select class="form-control iluminarIconoInput textoMay"  id="NombrePromotor" name="NombrePromotor">
                                                    <?php echo Costos::cargarSelect(3,true);?>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <label for="passActual">5.-Subcomisionista</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['subcomisionista'];?>">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select class="form-control iluminarIconoInput textoMay"  id="Subcomisionista" name="Subcomisionista">
                                                    <?php echo Costos::cargarSelect(4,true);?>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">6.-Codigo Cliente:</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['codigo_cliente'];?>">
                                                    <i class="fa fa-hashtag"></i>
                                                </div> 
                                                <input class="form-control iluminarIconoInput" type="text" id="CodigoCliente" name="CodigoCliente" >          
                                            </div>
                                        </div>    
                                        <div class="col-md-2">
                                            <label for="">7.-Empleados:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['empleados'];?>">
                                                    <i class="fa fa-hashtag"></i>         
                                                </div>                               
                                                <input class="form-control iluminarIconoInput" type="text" id="Empleados" name="Empleados"> 
                                            </div> 
                                        </div>  
                                    </div><!-- FIN ROW 3 COLUMNA -->  
                                    
                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 2 COLUMNA --> 
                                        
                                        <div class="col-md-6">
                                            <label for="">8.-Empresa</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['empresa'];?>">
                                                    <i class="fa fa-list-ol"></i> 
                                                </div>  
                                            <!---    <input class="form-control" type="text" id="Empresa" name="Empresa"> --> 
                                                <select class="form-control iluminarIconoInput textoMay"  id="Empresa" name="Empresa">
                                                            <option value=""></option>
                                                            <?php 
                                                                $empresas = Costos::cargarSelect(5);
                                                                echo $empresas; 
                                                            ?>
                                                </select>
                                            </div> 
                                        </div>     
                                    </div><!-- FIN ROW 2 COLUMNA -->
                                    <hr>
                                    <div class="row form-group rowColorGray"><!-- INICIO ROW 3 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">9.-Imss</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['imss'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div>                     
                                                <input class="form-control monetario iluminarIconoInput validarMonetario" type="text" id="Imss" name="Imss" > 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">10.-Real Pagado Imss</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['real_imss'];?>">
                                                    <i class="fa fa-usd"></i>         
                                                </div>  
                                                <input class="form-control monetario iluminarIconoInput validarMonetario" type="text" id="RealPagadoImss" name="RealPagadoImss">  
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">11.-Ajuste Imss</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['ajuste_imss'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div>  
                                                <input class="form-control " type="text" id="AjusteImss" name="AjusteImss" readonly="readonly">               
                                            </div>
                                        </div>
                                    </div><!-- FIN ROW 3 COLUMNA -->  
                                    
                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 4 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">12.-Rcv</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['rcv'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario iluminarIconoInput validarMonetario" type="text" name="Rcv" id="Rcv"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">13.-Real Pagado Rcv</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['real_rcv'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario iluminarIconoInput validarMonetario"  type="text" id="RealPagadoRcv" name="RealPagadoRcv"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">                         
                                            <label for="">14.-Ajuste Rcv</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['ajuste_rcv'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjustesRcv" name="AjustesRcv" readonly="readonly">
                                            </div>
                                        </div>                           
                                    </div> <!-- FIN ROW 4 COLUMNA -->
                                    
                                    <div class="row form-group rowColorGray"> <!-- INICIO ROW 5 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">15.-Infonavit</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['infonavit'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario iluminarIconoInput validarMonetario" type="text" id="Infonavit" name="Infonavit"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">16.-Real Pagado Infonavit</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['real_infonavit'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div>                           
                                                <input class="form-control monetario iluminarIconoInput validarMonetario" type="text" id="RealPagadoInf" name="RealPagadoInf"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4"> 
                                            <label for="">17.-Ajuste Infonavit</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['ajuste_infonavit'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjusteInf" name="AjusteInf" readonly="readonly">             
                                            </div>
                                        </div>              
                                    </div> <!-- FIN ROW 5 COLUMNA -->  
                                    <hr>
                                    <div class="row form-group rowColorGray"> <!-- INICIO ROW 8 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">18.-Imss Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['imss_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput" type="text" id="ImssObr" name="ImssObr"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">19.-Real Pagado Imss Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['real_imss_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput" type="text" id="RealPO" name="RealPO"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">                             
                                            <label for=""> 20.-Ajuste Imss Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['ajuste_imss_obrero'];?>">
                                                    <i class="fa fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjustesObr" name="AjustesObr" readonly="readonly">       
                                            </div>
                                        </div>                  
                                    </div> <!-- FIN ROW 8 COLUMNA -->
                                    <div class="row form-group rowColorWhite"> <!-- INICIO ROW 9 COLUMNA -->
                                        <div class="col-md-4"> 
                                            <label for="">21.-Rcv Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['rcv_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput" type="text" id="RcvObr" name="RcvObr"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">22.-Real Pagado Rcv Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['real_rcv_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput" type="text" id="RealPRcv" name="RealPRcv"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for=""> 23.-Ajuste Rcv Obrero</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['ajuste_rcv_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjustesRcvObr" name="AjustesRcvObr" readonly="readonly"> 
                                            </div>
                                        </div> 
                                    </div><!-- FIN ROW 9 COLUMNA -->

                                    <div class="row form-group rowColorGray"><!-- INICIO ROW 10 COLUMNA -->
                                        <div class="col-md-4"> 
                                            <label for="">24.-Amortizacion</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['amortizacion'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput" type="text" id="Amortizacion" name="Amortizacion"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">25.-Real Pagado Amortizacion</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['real_amortizacion'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput" type="text"  id="RealPAm" name="RealPAm"> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">                                  
                                            <label for="">26.-Ajuste Amortizacion</label>  
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['ajuste_amortizacion'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div>        
                                                <input class="form-control monetario" type="text" id="AjustesAm" name="AjustesAm" readonly="readonly"> 
                                            </div>
                                        </div>                                
                                    </div><!-- FIN ROW 10 COLUMNA -->    
                                    <!--<hr>
                                    <h3 class="text-center">GASTOS MÉDICOS</h3>
                                    <div class="row form-group rowColorWhite">
                                        <div class="col-md-3">
                                            <label for="">19.-Gmma (GM)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['gmma'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control iluminarIconoInput monetario validarMonetario" type="text" id="Gmma" name="Gmma" placeholder="GM" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">20.-Vida e Invalidez (GM)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['vida_invalidez'];?>">
                                                <i class="fa  fa-usd"></i> 
                                                </div>               
                                                <input class="form-control iluminarIconoInput monetario" type="text" id="VidaEI" name="VidaEI" placeholder="GM" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">21.-Gmme (GM)</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['gmme'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control iluminarIconoInput monetario" type="text" id="Gmme" name="Gmme" placeholder="GM" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">22.-Otros (GM)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['otros'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div>  
                                                <input class="form-control iluminarIconoInput monetario" type="text" id="Otros" name="Otros" placeholder="GM" disabled> 
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 class="text-center">NÓMINAS</h3>
                                    <div class="row form-group rowColorGray">
                                        <div class="col-md-3">
                                            <label for="">23.-Impuesto Estatal (NÓMINAS) </label> 
                                                <div class="input-group">
                                                    <div class="input-group-addon <?php echo $modificarInformativo;?>" info="<?php echo $informativos['impuesto_estatal'];?>">
                                                        <i class="fa  fa-usd"></i> 
                                                    </div> 
                                                    <input class="form-control monetario iluminarIconoInput" type="text" id="ImpuestoEstatal" name="ImpuestoEstatal" placeholder="NÓMINAS" disabled> 
                                                </div>
                                        </div>
                                    </div>-->
                                    <hr>
                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 11 COLUMNA -->  
                                        <div class="col-md-6">      
                                            <label for="">A.-Subtotal Patronal</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['subtotal'];?>">
                                                    <i class="fa fa-usd"></i>         
                                                </div> 
                                                <input type="text" class="form-control"  id="SubtotalPatronal" name="SubtotalPatronal" readonly="readonly"> 
                                            </div>
                                        </div>                 
                                        <div class="col-md-6">
                                            <label for="">B.-Total</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon <?php echo $modificarInformativo2;?>" info="<?php echo $informativos['total'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario" type="text" id="Total" name="Total" readonly="readonly">      
                                            </div>
                                        </div> 
                                    </div><!-- FIN ROW 11 COLUMNA -->       
                                
                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <label for="">Comentarios: </label> 
                                            <textarea name="Comentarios" id="Comentarios" class="form-control textAreaImportante iluminarIconoInput" rows="8" style="resize:vertical;" placeholder="..."></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="estilos-izquierda"> <i class="fa fa-check-circle fa-2x text-green"></i> Campos obligatorios.</p>
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <button type="button" id="BotonEnviar" class="btn btn-success btn-lg"> Guardar</button>             
                                            <button type="button" id="cancelarFormularioImss" class="btn btn-danger btn-lg"> Cancelar</button> 
                                        </div>
                                    </div>
                                </form> <!-- FIN FORM DE FORMULARIO CONTROL DE GASTOS -->
                            
                            </div>

                            <div role="tabpanel" class="tab-pane contenedor-div <?php echo $activeConsultar;?>" id="administrar"> 
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="">Número de registro:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-hashtag"></i>
                                            </div>
                                            <input class="form-control iluminarIconoInput" type="text" id="filtroRegistro">
                                        </div>   
                                    </div>

                                    <div class="col-md-8">
                                        <label for="">Nombre del cliente:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <select class="form-control textoMay iluminarIconoInput" id="filtroCliente" >
                                                <option></option>
                                                    <?php $clientes = Costos::cargarSelect2();
                                                          echo $clientes;
                                                    ?>
                                            </select>
                                        </div>   
                                    </div>  
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-8">
                                        <b>Total de registros que coinciden: </b>  <span id="labelTotalRegistros" style="font-size:20px;"><?php echo Costos::contarRegistros(); ?> </span>
                                    </div>   

                                    <div class="col-md-4" style="text-align:right;margin-top:15px;">
                                            <button class="btn btn-lg btn-info" id="botonRefrescar"><i class="fa fa-refresh"></i> Actualizar</button>
                                    </div>   
                                </div>
                                <br>
                                <div class="row renglon-encabezado mostrar768">
                                    <div class="col-sm-1 columna-div columna-div-centrar">No.</div>
                                    <div class="col-sm-7 columna-div columna-div-centrar">Cliente</div>
                                    <div class="col-sm-1 columna-div columna-div-centrar">GMM</div>
                                    <div class="col-sm-1 columna-div columna-div-centrar">Nóminas</div>
                                    <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
                                </div>
                                <div id="mostrarRegistros">
                                    <?php echo Costos::mostrar2(); ?>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane seccionPermisosx" id="archivos"> 
                                <br>
                                <div class="box box-success collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"> <i class="fa fa-download fa-3x" style="color:#00A65A"></i> Descargar Archivo</h3>
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
                                                                <label for="">Descargar reporte:</label>
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

                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12 estilos-centrar">
                                                            <button type="submit" name="reporteModuloCostos" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                                                        </div>
                                                    </div>
                                            </div>    
                                        </form> 
                                    </div>
                                </div>

                                <div class="box box-info collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"> <i class="fa fa-upload fa-3x" style="color:#00C0EF"></i> Cargar Archivos</h3>
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
                                                                <label for="">Cargar registros:</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <form method="post" enctype="multipart/form-data" id="formularioCargarLayout"> 
                                                            <div class="col-md-12 estilos-centrar">
                                                                <span class="btn btn-info btn-lg btn-file" style="width:139px;"><i class="fa fa-upload"></i> Cargar<input type="file" name="cargarRegistrosNominas" id="cargarRegistrosFacturacion" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></span>
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
                                                                    <button type="submit" name="formatoLlenadoFactura001" value="" class="btn btn-success"><i class="fa fa-download"></i> Costos</button>
                                                                </p>
                                                            </div>
                                                        </form> 
                                                    </div>
                                            </div>    
                                    </div>
                                </div>
                        
                            </div>
                    
                            <div role="tabpanel" class="tab-pane" id="autorizados"> 
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
                
                        </div>
                    </div>             
            </div>

            <!--Ventana modal-->
            <div class="modal fullscreen-modal fade bd-example-modal-lg fade" id="modalCostos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" style="overflow-y:auto;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>DATOS DEL REGISTRO No. <span id="labelRegistroSeleccionado" style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;"></span></h4>
                                </div>
                                <div class="col-md-8">
                                    <h4>DEPARTAMENTO: <span id="labelDepartamento" style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;"></span></h4>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                                    <i class="fa fa-window-close fa-lg text-red" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <u>Departamento IMSS</u>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Nombre:</b> <span id="capturoImss" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Sucursal:</b> <span id="sucursalImss" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Puesto:</b> <span id="puestoImss" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Fecha y hora:</b> <span id="fechaImss" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <u>Departamento GM</u>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Nombre:</b> <span id="capturoGm" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Sucursal:</b> <span id="sucursalGm" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Puesto:</b> <span id="puestoGm" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Fecha y hora:</b> <span id="fechaGm" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <u>Departamento Nóminas</u>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Nombre:</b> <span id="capturoNominas" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Sucursal:</b> <span id="sucursalNominas" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Puesto:</b> <span id="puestoNominas" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Fecha y hora:</b> <span id="fechaNominas" style="font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                           
                            <form method="POST" style="margin-top: 2%;" id="formularioControlGastos2"><!-- INICIO FORM DE FORMULARIO CONTROL DE GASTOS -->                
                                    <h3 class="text-center">IMSS</h3>
                                    <div class="row form-group rowColorWhite"> <!-- INICIO ROW 1 COLUMNA -->
                                        <!--<div class="col-md-2">
                                            <label for="passActual">1.-Año</label> 
                                            <i class="fa fa-check-circle text-green"></i>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['ejercicio'];?>">
                                                    <i class="fa fa-list-ol"></i>        
                                                </div>
                                                <select  id="Ejercicio2" class="form-control iluminarIconoInput validarObligatorios2 actualizar" name="Ejercicio" disabled>
                                                    <option value=""></option>
                                                    <?php echo $ejercicio; ?>
                                                </select>
                                            </div>  
                                        </div>-->
                                        <div class="col-md-2">                   
                                            <label for="passActual">1.-Mes</label> 
                                            <i class="fa fa-check-circle text-green"></i> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['mes'];?>">
                                                <i class="fa fa-list-ol"></i>         
                                                </div>
                                                <select class="form-control iluminarIconoInput validarObligatorios2 actualizar textoMay" id="Mes2" name="Mes" disabled>
                                                    <?php echo Costos::cargarMes2(); ?>
                                                </select>                               
                                            </div>  
                                        </div>                         
                                        <div class="col-md-5">
                                            <label for="passActual">2.-Clientes</label> 
                                            <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon informativo" info="<?php echo $informativos['cliente'];?>">
                                                            <i class="fa fa-group"></i>
                                                    </div>
                                                    <select class="form-control iluminarIconoInput validarObligatorios2 actualizar" id="Clientes2" name="Clientes" disabled>
                                                        <?php echo $clientes; ?>
                                                    </select>
                                                </div>  
                                        </div>
                                        <div class="col-md-5">
                                            <label for="passActual">3.-Nombre Comercial</label> 
                                                <div class="input-group">
                                                    <div class="input-group-addon informativo" info="<?php echo $informativos['nombre_comercial'];?>">
                                                        <i class="fa fa-list-ol"></i>
                                                    </div>
                                                    <input class="form-control iluminarIconoInput" id="NombreComercial2" name="NombreComercial" disabled>
                                                </div> 
                                        </div>                    
                                    </div><!-- FIN ROW 1 COLUMNA onKeyUp="Costos.solonumeros()"-->
                                    
                                    <div class="row form-group rowColorGray"><!-- INICIO ROW 2 COLUMNA --> 
                                        <div class="col-md-4">
                                            <label for="passActual">4.-Nombre Promotor</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['promotor'];?>">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select class="form-control iluminarIconoInput actualizar"  id="NombrePromotor2" name="NombrePromotor" disabled>
                                                    <?php echo Costos::cargarSelect(3);?>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <label for="passActual">5.-Subcomisionista</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['subcomisionista'];?>">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <select class="form-control iluminarIconoInput actualizar"  id="Subcomisionista2" name="Subcomisionista" disabled>
                                                    <?php echo Costos::cargarSelect(4);?>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">6.-Codigo del Cliente:</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['codigo_cliente'];?>">
                                                    <i class="fa fa-hashtag"></i>
                                                </div> 
                                                <input class="form-control iluminarIconoInput actualizar" type="text" id="CodigoCliente2" name="CodigoCliente" disabled>          
                                            </div>
                                        </div>   
                                        <div class="col-md-2">
                                            <label for="">7.-Empleados:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['empleados'];?>">
                                                    <i class="fa fa-hashtag"></i>         
                                                </div>                               
                                                <input class="form-control iluminarIconoInput actualizar" type="text" id="Empleados2" name="Empleados" disabled> 
                                            </div> 
                                        </div> 
                                    </div><!-- FIN ROW 2 COLUMNA -->

                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 2 COLUMNA --> 
                                        <div class="col-md-6">
                                            <label for="">8.-Empresa</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['empresa'];?>">
                                                    <i class="fa fa-list-ol"></i> 
                                                </div>  
                                            <!---    <input class="form-control" type="text" id="Empresa" name="Empresa"> --> 
                                                <select class="form-control iluminarIconoInput actualizar textoMay"  id="Empresa2" name="Empresa" disabled>
                                                            <option value=""></option>
                                                            <?php echo $empresas; ?>
                                                </select>
                                            </div> 
                                        </div>   
                                    </div><!-- FIN ROW 2 COLUMNA -->

                                    <div class="row form-group rowColorGray"><!-- INICIO ROW 3 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">9.-Imss</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['imss'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div>                     
                                                <input class="form-control monetario iluminarIconoInput validarMonetario2 actualizar" type="text" id="Imss2" name="Imss" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">10.-Real Pagado Imss</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['real_imss'];?>">
                                                    <i class="fa fa-usd"></i>         
                                                </div>  
                                                <input class="form-control monetario iluminarIconoInput validarMonetario2 actualizar" type="text" id="RealPagadoImss2" name="RealPagadoImss" disabled>  
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">11.-Ajuste Imss</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['ajuste_imss'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div>  
                                                <input class="form-control " type="text" id="AjusteImss2" name="AjusteImss" readonly="readonly">               
                                            </div>
                                        </div>
                                    </div><!-- FIN ROW 3 COLUMNA -->  
                                    
                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 4 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">12.-Rcv</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['rcv'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario validarMonetario2 iluminarIconoInput actualizar" type="text" name="Rcv" id="Rcv2" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">13.-Real Pagado Rcv</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['real_rcv'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario validarMonetario2 iluminarIconoInput actualizar"  type="text" id="RealPagadoRcv2" name="RealPagadoRcv" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">                         
                                            <label for="">14.-Ajuste Rcv</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['ajuste_rcv'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjustesRcv2" name="AjustesRcv" readonly="readonly">
                                            </div>
                                        </div>                           
                                    </div> <!-- FIN ROW 4 COLUMNA -->
                                    
                                    <div class="row form-group rowColorGray"> <!-- INICIO ROW 5 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">15.-Infonavit</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['infonavit'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario2 iluminarIconoInput actualizar" type="text" id="Infonavit2" name="Infonavit" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">16.-Real Pagado Infonavit</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['real_infonavit'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div>                           
                                                <input class="form-control monetario validarMonetario2 iluminarIconoInput actualizar" type="text" id="RealPagadoInf2" name="RealPagadoInf" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4"> 
                                            <label for="">17.-Ajuste Infonavit</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['ajuste_infonavit'];?>">
                                                    <i class="fa  fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjusteInf2" name="AjusteInf" readonly="readonly">             
                                            </div>
                                        </div>              
                                    </div> <!-- FIN ROW 5 COLUMNA -->   
                                    <div class="row form-group rowColorWhite"> <!-- INICIO ROW 8 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">18.-Imss Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['imss_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div>  
                                                <input class="form-control monetario validarMonetario iluminarIconoInput actualizar" type="text" id="ImssObr2" name="ImssObr" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">19.-Real Pagado Imss Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['real_imss_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput actualizar" type="text" id="RealPO2" name="RealPO" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">                             
                                            <label for=""> 20.-Ajuste Imss Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['ajuste_imss_obrero'];?>">
                                                    <i class="fa fa-usd"></i>         
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjustesObr2" name="AjustesObr" readonly="readonly">       
                                            </div>
                                        </div>                  
                                    </div> <!-- FIN ROW 8 COLUMNA -->
                                    
                                    <div class="row form-group rowColorGray"> <!-- INICIO ROW 9 COLUMNA -->
                                        <div class="col-md-4"> 
                                            <label for="">21.-Rcv Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['rcv_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput actualizar" type="text" id="RcvObr2" name="RcvObr" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">22.-Real Pagado Rcv Obrero</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['real_rcv_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput actualizar" type="text" id="RealPRcv2" name="RealPRcv" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for=""> 23.-Ajuste Rcv Obrero</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['ajuste_rcv_obrero'];?>">
                                                    <i class="fa fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario" type="text" id="AjustesRcvObr2" name="AjustesRcvObr" readonly="readonly"> 
                                            </div>
                                        </div> 
                                    </div><!-- FIN ROW 9 COLUMNA -->

                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 10 COLUMNA -->
                                        <div class="col-md-4"> 
                                            <label for="">24.-Amortizacion</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['amortizacion'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput actualizar" type="text" id="Amortizacion2" name="Amortizacion" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">25.-Real Pagado Amortizacion</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['real_amortizacion'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario iluminarIconoInput actualizar" type="text"  id="RealPAm2" name="RealPAm" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">                                  
                                            <label for="">26.-Ajuste Amortizacion</label>  
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['ajuste_amortizacion'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div>        
                                                <input class="form-control monetario" type="text" id="AjustesAm2" name="AjustesAm" readonly="readonly"> 
                                            </div>
                                        </div>                                
                                    </div><!-- FIN ROW 10 COLUMNA -->

                                    <hr>
                                    <h3 class="text-center">GASTOS MÉDICOS</h3>
                            
                                    <div class="row form-group rowColorWhite"><!-- INICIO ROW 6 COLUMNA -->
                                        <div class="col-md-3">
                                            <label for="">27.-Gmma (GM)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['gmma'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario3 actualizar2 iluminarIconoInput" type="text" id="Gmma2" name="" placeholder="GM" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">28.-Vida e Invalidez (GM)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['vida_invalidez'];?>">
                                                <i class="fa  fa-usd"></i> 
                                                </div>               
                                                <input class="form-control monetario validarMonetario3 iluminarIconoInput actualizar2" type="text" id="VidaEI2" name="" placeholder="GM" disabled> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">29.-Gmme (GM)</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['gmme'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario validarMonetario3 iluminarIconoInput actualizar2" type="text" id="Gmme2" name="" placeholder="GM" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">30.-Otros (GM)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon informativo" info="<?php echo $informativos['otros'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div>  
                                                <input class="form-control monetario validarMonetario3 iluminarIconoInput actualizar2" type="text" id="Otros2" name="" placeholder="GM" disabled> 
                                            </div>
                                        </div>
                                    </div>  <!-- FIN ROW 6 COLUMNA -->
                                    <hr>
                                    <h3 class="text-center">NÓMINAS</h3>
                                    <div class="row form-group rowColorWhite"><!-- iINICIO ROW 7 COLUMNA -->
                                        <div class="col-md-4">
                                            <label for="">31.-Impuesto Estatal (NÓMINAS)</label> 
                                                <div class="input-group">
                                                    <div class="input-group-addon informativo" info="<?php echo $informativos['impuesto_estatal'];?>">
                                                        <i class="fa  fa-usd"></i> 
                                                    </div> 
                                                    <input class="form-control monetario validarMonetario4 iluminarIconoInput actualizar3" type="text" id="ImpuestoEstatal2" name="" placeholder="NÓMINAS" disabled> 
                                                </div>
                                        </div>
                                    </div><!-- FIN ROW 7 COLUMNA -->
                                    <hr>
                                    <div class="row form-group rowColorGray"><!-- INICIO ROW 11 COLUMNA --> 
                                        <div class="col-md-6">      
                                            <label for="">A.-Subtotal Patronal</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['subtotal'];?>">
                                                    <i class="fa fa-usd"></i>         
                                                </div> 
                                                <input type="text" class="form-control" id="SubtotalPatronal2" name="SubtotalPatronal" readonly="readonly"> 
                                            </div>
                                        </div>                          
                                        <div class="col-md-6">
                                            <label for="">B.-Total</label> 
                                            <div class="input-group">
                                                <div class="input-group-addon informativo2" info="<?php echo $informativos['total'];?>">
                                                    <i class="fa  fa-usd"></i> 
                                                </div> 
                                                <input class="form-control monetario" type="text" id="Total2" name="Total" readonly="readonly">      
                                            </div>
                                        </div> 
                                    </div><!-- FIN ROW 11 COLUMNA -->       
                                    <hr>
                                    <h3 class="text-center">COMENTARIOS</h3>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label style="cursor:pointer;">I.-IMSS:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" style="color:#fff;background:#0e7c9b!important;">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="Comentarios" id="Comentarios2" class="form-control iluminarIconoInput actualizar" rows="8" style="resize:vertical;"></textarea>
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <label style="cursor:pointer;">II.-GM: </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" style="color:#fff;background:#0e7c9b!important;">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="ComentariosGm" id="Comentarios3" class="form-control iluminarIconoInput actualizar2" rows="8" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label style="cursor:pointer;">III.-Nóminas: </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon" style="color:#fff;background:#0e7c9b!important;">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="ComentariosNominas" id="Comentarios4" class="form-control iluminarIconoInput actualizar3" rows="8" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <hr>
                                    <p class="estilos-izquierda"> <i class="fa fa-check-circle fa-2x text-green"></i> Campos obligatorios.</p>
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <button type="button" id="BotonEnviar2" class="btn btn-success btn-lg" style="display:none;"> Guardar</button> 
                                            <button type="button" id="BotonEditar" class="btn btn-primary btn-lg"> Editar</button>           
                                        </div>
                                    </div>
                            </form> 
                        </div>
                
                    </div>
                </div>
            </div>
            <!--Ventana modal-->
       
            <div class="box-footer">
            </div>
          
        </div>
    </section> 
</div>
  
    <div class="modal fade" id="modalEdicion">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista clientes</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="nuevoClienteCostos">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarClienteCostos">
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

    <div class="modal fade" id="modalEdicionPromotor">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista Promotores</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="nuevoPromotorCostos">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarPromotorCostos">
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

    <div class="modal fade" id="modalEdicionSubcomisionista">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">¿Qué desea hacer?</h3>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center">Lista Subcomisionistas</h4>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="nuevoSubcomisionistaCostos">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo
                                    </a>  
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-app" id="editarSubcomisionistaCostos">
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

    

   

    <div class="modal fade" id="modalEditarClienteCostos" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar clientes de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaClientesCostos">
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

    <div class="modal fade" id="modalNuevoClienteCostos">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelClienteTitulo"></h3>
                           
                        </div>
                        <div class="modal-body">
                            <form id="formularioClientesCostos">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="passActual">1.-Nombre del cliente</label> 
                                        <i class="fa fa-check-circle text-green"></i>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control iluminarIconoInput" name="nombreCliente" required>
                                        </div> 
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <label for="passActual">2.-Nombre Comercial</label> 
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                            <input type="text" class="form-control iluminarIconoInput" name="nombreClienteComercial">
                                        </div> 
                                    </div>
                                </div>
                                <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-success btn-lg"> Guardar</button> 
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>






     <div class="modal fade" id="modalEditarPromotorCostos" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar promotores de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaPromotorCostos">
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
  
    <div class="modal fade" id="modalNuevoPromotorCostos">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelPromotorTitulo"></h3>
                        </div>
                        <div class="modal-body">
                            <form id="formularioPromotorCostos">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label for="passActual">1.-Nombre del promotor</label> 
                                        <i class="fa fa-check-circle text-green"></i>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control iluminarIconoInput" name="nombrePromotor" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-success btn-lg"> Guardar</button> 
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>


    <div class="modal fade" id="modalEditarSubcomisionistaCostos" style="overflow-y:auto;">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px">Editar subcomisionistas de la lista</h3>
                           
                        </div>
                        <div class="modal-body" id="cargarListaSubcomisionistaCostos">
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

    <div class="modal fade" id="modalNuevoSubcomisionistaCostos">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px" id="labelSubcomisionistaTitulo"></h3>
                        </div>
                        <div class="modal-body">
                            <form id="formularioSubcomisionistaCostos">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label for="passActual">1.-Nombre del subcomisionista</label> 
                                        <i class="fa fa-check-circle text-green"></i>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control iluminarIconoInput" name="subcomisionistaNombre" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="text-center" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-success btn-lg"> Guardar</button> 
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
