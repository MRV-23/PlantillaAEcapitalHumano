
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="controlFacturacion">
    <!-- Main content -->
    <section class="content-conciliacion">
   
        <div class="box">
            <div class="box-header with-border ">
                <h3 class="box-title text"><i class="fa fa-handshake-o icono-encabezado-conciliacion" ></i >  CONCILIACION</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                    <div role="tabpanel"> 
                        <ul class="nav nav-tabs">
                               
                        </ul>
                        <div class="tab-content" style="margin-top: 2%;">
                            <div role="tabpanel" class="tab-pane administrar-nominas active" id="captura">  <!-- INICIO ROW 1 COLUMNA -->
                                <!-- ***********************FORMULARIO CONCILIACION********************************** --> 
                               
                            </div>              
                         
                            <div role="tabpanel" class="tab-pane seccionPermisosx" id="catalogo">
                                <section class="content">
                                    <!-- Default box -->
                                    <div class="box box-info collapsed-box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title text" ><i class="fa fa-user-plus icono-encabezado-conciliacion" ></i> AGREGAR</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                <i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
                                                <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                                <div role="tabpanel"> 
                                                    <ul class="nav nav-tabs">
                                                        <li role="presentation" class="active">
                                                            <a href="#AGcuenta" class="" aria-controls="AGcuenta" role="tab" data-toggle="tab" aria-expanded="true">Cuenta</a>
                                                        </li>
                                                        <li role="presentation" class="">
                                                            <a href="#AGtipoMovimiento" class="" aria-controls="AGtipoMovimiento" role="tab" data-toggle="tab" aria-expanded="false">Tipo de Movimiento</a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a href="#AGbeneficiario" class="" aria-controls="AGbeneficiario" role="tab" data-toggle="tab">Beneficiario</a>
                                                        </li>
                                                        <li role="presentation">
                                                            <a href="#AGcoceptomovimiento" class="" aria-controls="AGcoceptomovimiento" role="tab" data-toggle="tab">Concepto Movimiento</a>
                                                        </li>
                                                        <li role="presentation" class="">
                                                            <a href="#AGclasificacionCA" class="" aria-controls="AGclasificacionCA" role="tab" data-toggle="tab">Clasificacion de Cargos y Abonos</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content max1000" style="margin-top: 1%;">
                                                        <div role="tabpanel" class="tab-pane active" id="AGcuenta"><br>
                                                            <form action="" name="formularioAgregarCuenta" id="formularioAgregarCuenta">
                                                                <div class="row form-group rowColor  ">
                                                                    <div class="col-md-6 ">
                                                                    <label for="">1.-Cuenta</label> <br>                                         
                                                                        <div class="input-group " >
                                                                            <div class="input-group-addon borderGreen" >
                                                                                <i class="fa fa-building-o"></i>        
                                                                            </div>
                                                                            <input class="form-control inputBorder monetario borderGreen" style="" name="NewCuenta" id="NewCuenta">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="">2.-Banco</label> <br>                                  
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                                                <i class="fa fa-hospital-o "></i>    
                                                                            </div>
                                                                            <select  id="NewBanco" class="form-control  inputBorder borderGreen" name="NewBanco">
                                                                            <option value=""></option> 
                                                                            <?php //MetodoMartin::ImpresionTabla("id","nombre","nominas_empresas_imss_ae");?>                                          
                                                                            </select>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group rowColor ">
                                                                <div class="col-md-4">
                                                                        <label for="">3.-Empresa</label> <br>                                  
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput borderGreen " >
                                                                                <i class="fa fa-hospital-o "></i>    
                                                                            </div>                                                       
                                                                            <select  id="NewEmpresa" class="form-control  inputBorder borderGreen" name="NewEmpresa">
                                                                            <option value=""></option> 
                                                                            <?php //MetodoMartin::ImpresionTabla("id","nombre","nominas_empresas_imss_ae");?>                                          
                                                                            </select>                                       
                                                                        </div>  
                                                                    </div>                                                           
                                                                    <div class="col-md-4">
                                                                    <label for="">4.-Tesorero</label><br>                                      
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon borderGreen" >
                                                                                <i class="fa fa-id-card-o"></i>                                
                                                                            </div> 
                                                                            <select  id="NewTesorero" class="form-control  inputBorder borderGreen" name="NewTesorero">
                                                                            <option value=""></option> 
                                                                            <?php //MetodoMartin::ImpresionTabla("id","nombre","nominas_empresas_imss_ae");?>                                          
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" >
                                                                        <label for="">5.-Sucursal</label><br>                                      
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon borderGreen" >
                                                                                <i class="fa fa-id-card-o"></i>                                
                                                                            </div>                                                                  
                                                                            <select  id="NewSucursal" class="form-control  inputBorder borderGreen" name="NewSucursal">
                                                                            <option value=""></option> 
                                                                            <?php //MetodoMartin::ImpresionTabla("id","nombre","nominas_empresas_imss_ae");?>                                          
                                                                            </select>                                                   
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row text-center">                                           
                                                            <!--  <button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="AgregarNewCuenta" id="AgregarNewCuenta">AGREGAR</button> -->
                                                                <button type="button" class="btn btn-success btn-lg" id="AgregarNewCuenta" id="AgregarNewCuenta">Enviar</button>                                                   
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="AGtipoMovimiento"><br>
                                                            <form action="" name="FormularioNewTmovimiento" id="FormularioNewTmovimiento">
                                                                <div class="row form-group rowColor ">
                                                                    <div class="col-md-12">
                                                                    <label >• Tipo de Movimiento</label> <br>                                         
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput borderGreen">
                                                                                <i class="fa fa-building-o"></i>        
                                                                            </div>
                                                                            <input class="form-control inputBorder borderGreen" name="Newtmovimiento" id="Newtmovimiento">
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                                    <div class="row text-center"> 
                                                                    <button type="button" class="btn btn-success btn-lg" id="AgregarTmoviento" id="AgregarTmoviento">Enviar</button>                                           
                                                                    <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="AgregarTmoviento" id="AgregarTmoviento">AGREGAR</button>      -->
                                                                </div>
                                                            </form>  
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="AGbeneficiario">  
                                                            <br>
                                                            <form action="" name="FormularioNewBeneficiario" id="FormularioNewBeneficiario">
                                                                <div class="row form-group rowColor ">
                                                                    <div class="col-md-12"> 
                                                                    <label >• Beneficiario</label> <br>                                       
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput  borderGreen" >
                                                                                <i class="fa fa-building-o"></i>        
                                                                            </div>
                                                                            <input class="form-control inputBorder borderGreen"name="Newbeneficiario" id="Newbeneficiario">
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                                    <div class="row text-center">
                                                                    <button type="button" class="btn btn-success btn-lg" id="Agregarbeneficiario" id="Agregarbeneficiario">Enviar</button>                                            
                                                                    <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="Agregarbeneficiario" id="Agregarbeneficiario">AGREGAR</button> -->                                                    
                                                                </div>
                                                            </form>                                                       
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="AGcoceptomovimiento"><br>
                                                            <form action="" name="FormularioConceptoMovimiento" id="FormularioConceptoMovimiento">
                                                                <div class="row form-group rowColor ">
                                                                    <div class="col-md-12">
                                                                    <label >• Concepto Movimiento</label> <br>                                        
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput borderGreen ">
                                                                                <i class="fa fa-building-o"></i>        
                                                                            </div>
                                                                            <input class="form-control  inputBorder borderGreen" name="NewconceptoMovimiento" id="NewconceptoMovimiento">
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                                    <div class="row text-center">                                           
                                                                    <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="AgregarConceptoMovimiento" id="AgregarConceptoMovimiento" >AGREGAR</button> -->
                                                                    <button type="button" class="btn btn-success btn-lg" id="AgregarConceptoMovimiento" id="AgregarConceptoMovimiento">Enviar</button>                                                    
                                                                </div>
                                                            </form> 
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane " id="AGclasificacionCA"> 
                                                            <br>
                                                            <form action="" name="formularioClasificacionCargos" id="formularioClasificacionCargos">
                                                                <div class="row form-group rowColor ">
                                                                    <div class="col-md-6">
                                                                        <label for="">2.-Tipo de Movimiento</label> <br>                                  
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                                                <i class="fa fa-hospital-o "></i>    
                                                                            </div>
                                                                            <input class="form-control inputBorder borderGreen"name="NewtipomMovimiento" id="NewtipomMovimiento">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-md-">
                                                                        <label for="">3.-Nombre de Concepto</label> <br>                                  
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                                                <i class="fa fa-hospital-o "></i>    
                                                                            </div>
                                                                            <input  class="form-control inputBorder borderGreen"name="NewnombreConcepto" id="NewnombreConcepto">                                           
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group rowColor ">
                                                                    <div class="col-md-6">
                                                                    <label for="">4.-Descripcion</label><br>                                      
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon borderGreen">
                                                                                <i class="fa fa-id-card-o"></i>                                
                                                                            </div>
                                                                            <input  class="form-control inputBorder borderGreen" name="Newdescripcion" id="Newdescripcion">                                             
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" >
                                                                        <label for="">5.-Nota</label><br>                                      
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon borderGreen" >
                                                                                <i class="fa fa-id-card-o"></i>                                
                                                                            </div>
                                                                            <input class="form-control inputBorder borderGreen" name="Newnota" id="Newnota">                                            
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row text-center">                                           
                                                                    <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="AgregarClasificacionCargos" id="AgregarClasificacionCargos">AGREGAR</button> -->
                                                                    <button type="button" class="btn btn-success btn-lg" id="AgregarClasificacionCargos" id="AgregarClasificacionCargos">Enviar</button>                                                     
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--*****************************FIN DE ULTIMA PESTAÑA DE ??**********************************---->                                               
                                                    </div> 
                                                </div>                                          
                                        </div><!-- /.box-body -->                                  
                                    </div>
                                    <!-- /.box -->
                                    <!-- Default box -->
                                    <div class="box box-info collapsed-box">
                                        <div class="box-header with-border" >
                                            <h3 class="box-title text"><i class="fa fa-pencil-square-o icono-encabezado-conciliacion" ></i> EDITAR </h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                <i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
                                                <i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="box-body" style="display: none;">
                                            <div role="tabpanel"> 
                                                        <ul class="nav nav-tabs">
                                                            <li role="presentation" class="active">
                                                                <a href="#EDcuenta" class="desactivarCalendario" aria-controls="AGcuenta" role="tab" data-toggle="tab" aria-expanded="true">Cuenta</a>
                                                            </li>
                                                            <li role="presentation" class="">
                                                                <a href="#EDtipoMovimiento" class="" aria-controls="EDtipoMovimiento" role="tab" data-toggle="tab" aria-expanded="false">Tipo de Movimiento</a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#EDbeneficiario" class="" aria-controls="EDbeneficiario" role="tab" data-toggle="tab">Beneficiario</a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#EDcoceptomovimiento" class="" aria-controls="EDcoceptomovimiento" role="tab" data-toggle="tab">Concepto Movimiento</a>
                                                            </li>
                                                            <li role="presentation" class="">
                                                                <a href="#EDclasificacionCA" class="" aria-controls="EDclasificacionCA" role="tab" data-toggle="tab">Clasificacion de Cargos y Abonos</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content max1000" style="margin-top: 1%;">
                                                            <div role="tabpanel" class="tab-pane active" id="EDcuenta"><br>
                                                                <form action="" name="formularioEditarCuenta" id="formularioEditarCuenta">
                                                                    <div class="row form-group rowColor ">
                                                                        <div class="col-md-6">
                                                                        <label for="">1.-Cuenta</label> <br>                                         
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen ">
                                                                                    <i class="fa fa-building-o"></i>        
                                                                                </div>
                                                                                <input type="text" class="form-control  inputBorder borderGreen"name="EDITcuenta" id="EDITcuenta">                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">2.-Banco</label> <br>                                  
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen" >
                                                                                    <i class="fa fa-hospital-o "></i>    
                                                                                </div>
                                                                                <input  class="form-control  inputBorder borderGreen "name="EDITbanco" id="EDITbanco">                                           
                                                                            </div>  
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group rowColor ">
                                                                    <div class="col-md-4">
                                                                            <label for="">3.-Empresa</label> <br>                                  
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon  borderGreen" >
                                                                                    <i class="fa fa-hospital-o "></i>    
                                                                                </div>
                                                                                <input  class="form-control inputBorder borderGreen"name="EDITempresa" id="EDITempresa">  
                                                                            </div>  
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label for="">4.-Tesorero</label><br>                                      
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon borderGreen" >
                                                                                    <i class="fa fa-id-card-o"></i>                                
                                                                                </div>
                                                                                <input type="text" class="form-control inputBorder borderGreen"name="EDITtesorero" id="EDITtesorero">                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4" >
                                                                            <label for="">5.-Sucursal</label><br>                                      
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon borderGreen">
                                                                                    <i class="fa fa-id-card-o"></i>                                
                                                                                </div>
                                                                                <input class="form-control inputBorder borderGreen"name="EDITsucursal" id="EDITsucursal">                                         
                                                                            </div>  
                                                                        </div>
                                                                    </div>
                                                                    <div class="row text-center">                                           
                                                                        <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="EDITARcuenta"id="EDITARcuenta">GUARDAR</button>   -->
                                                                        <button type="button" class="btn btn-success btn-lg" id="EDITARcuenta" id="EDITARcuenta">Enviar</button>                                                 
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane" id="EDtipoMovimiento">                                                           
                                                                <br>
                                                                <form action="" name="FormularioTmovimiento" id="FormularioTmovimiento">
                                                                    <div class="row form-group rowColor">
                                                                        <div class="col-md-12">
                                                                        <label >• Tipo de Movimiento</label> <br>                                         
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon  borderGreen" >
                                                                                    <i class="fa fa-building-o"></i>        
                                                                                </div>
                                                                                <input type="text" class="form-control inputBorder borderGreen"name="EDITtmovimiento" id="EDITtmovimiento">
                                                                            </div>
                                                                        </div>
                                                                    </div>    
                                                                        <div class="row text-center">                                           
                                                                        <button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="EDITARtmoviento" id="EDITARtmoviento">GUARDAR</button>                                                    
                                                                    </div>
                                                                </form>  
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane" id="EDbeneficiario">  
                                                                <br>
                                                                <form action="" name="EDITFormularioNewBeneficiario" id="EDITFormularioNewBeneficiario">
                                                                    <div class="row form-group rowColor fila">
                                                                        <div class="col-md-12">
                                                                        <label >• Beneficiario</label> <br>                                       
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen ">
                                                                                    <i class="fa fa-building-o"></i>        
                                                                                </div>
                                                                                <input class="form-control  inputBorder borderGreen "name="EDITbeneficiario" id="EDITbeneficiario">
                                                                            </div>
                                                                        </div>
                                                                    </div>    
                                                                        <div class="row text-center">                                           
                                                                        <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="EDITARbeneficiario" id="EDITARbeneficiario">GUARDAR</button>    -->
                                                                        <button type="button" class="btn btn-success btn-lg" id="EDITARbeneficiario" id="EDITARbeneficiario">Enviar</button> 
                                                                    </div>
                                                                </form>                                                         
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane" id="EDcoceptomovimiento"> 
                                                                <form action="" name="EDITFormularioConceptoMovimiento" id="EDITFormularioConceptoMovimiento">
                                                                    <div class="row form-group rowColor fila">
                                                                        <div class="col-md-12"> 
                                                                            <label>• Concepto Movimiento</label> <br>                                      
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen">
                                                                                    <i class="fa fa-building-o"></i>        
                                                                                </div>
                                                                                <input class="form-control inputBorder borderGreen "name="EDITconceptoMovimiento" id="EDITconceptoMovimiento">
                                                                            </div>
                                                                        </div>
                                                                    </div>    
                                                                        <div class="row text-center">                                           
                                                                        <!--<button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="EDITARconceptoMovimiento" id="EDITARconceptoMovimiento" >GUARDAR</button> -->
                                                                        <button type="button" class="btn btn-success btn-lg" id="EDITARconceptoMovimiento" id="EDITARconceptoMovimiento">Enviar</button>                                                    
                                                                    </div>
                                                                </form> 
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane " id="EDclasificacionCA">
                                                                <form action="" name="formularioClasificacionCargosED" id="formularioClasificacionCargosED">
                                                                    <div class="row form-group rowColor ">
                                                                        <div class="col-md-6">
                                                                        <label for="">1.-Clasificacion de Cargos y Abonos</label> <br>                                         
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen " >
                                                                                    <i class="fa fa-building-o"></i>        
                                                                                </div>
                                                                                <input class="form-control  inputBorder borderGreen" name="EDITClasificacionCargos" id="EDITClasificacionCargos">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">2.-Tipo de Movimiento</label> <br>                                  
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen">
                                                                                    <i class="fa fa-hospital-o "></i>    
                                                                                </div>
                                                                                <input class="form-control inputBorder borderGreen"name="EDITtipomMovimiento" id="EDITtipomMovimiento">                                            
                                                                            </div>  
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group rowColor ">
                                                                    <div class="col-md-4">
                                                                            <label for="">3.-Nombre de Concepto</label> <br>                                  
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon iluminarIconoInput borderGreen">
                                                                                    <i class="fa fa-hospital-o "></i>    
                                                                                </div>
                                                                                <input class="form-control  inputBorder borderGreen"name="EDITnombreConcepto" id="EDITnombreConcepto">                                           
                                                                            </div>  
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <label for="">4.-Descripcion</label><br>                                      
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon borderGreen" >
                                                                                    <i class="fa fa-id-card-o"></i>                                
                                                                                </div>
                                                                                <input  class="form-control  inputBorder borderGreen"name="EDITdescripcion" id="EDITdescripcion">                                           
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4" >
                                                                            <label for="">5.-Nota</label><br>                                      
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon borderGreen" >
                                                                                    <i class="fa fa-id-card-o"></i>                                
                                                                                </div>
                                                                                <input class="form-control  inputBorder borderGreen "name="EDITnota" id="EDITnota">  
                                                                            </div>  
                                                                        </div>
                                                                    </div>
                                                                    <div class="row text-center">                                           
                                                                    <!-- <button type="button" class="btn btn-info btn-lg" style="background-color: #52BE80"  data-toggle="modal" data-target="#myModall"name="EDITARclasificacionCargos" id="EDITARclasificacionCargos" >GUARDAR</button>           -->
                                                                        <button type="button" class="btn btn-success btn-lg" id="EDITARclasificacionCargos" id="EDITARclasificacionCargos">Enviar</button> 
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--*****************************FIN DE ULTIMA PESTAÑA DE ??**********************************---->                                               
                                                        </div> 
                                                    </div> 
                                                    </div><!-- /.box-body -->
                                                    <div class="box-footer" style="display: none;">
                                                    <!--Footer-->
                                                    </div>
                                                    <!-- /.box-footer-->
                                                    </div>
                                                    <!-- /.box -->
                                                </section>
                                            </div>
                                            <!-- ************************* FIN DE SEGUNDA PESTAÑA *****************************-->
                                            <!-- ***************************pestaña autorizadosA****************************** -->
                                            <div role="tabpanel" class="tab-pane seccionPermisosx" id="autorizados">  
                                                <h3 class="text-center">Configuracion de Personal</h3>
                                                    <br>
                                                    <div class="EncabezadoTable">
                                                        <div class="campoIdEncabezado">No.</div>
                                                        <div class="campoNombreEncabezado">Nombre</div>
                                                        <div class="campoSucursalEncabezado">Sucursal</div>
                                                        <div class="campoPuestoEncabezado">Puesto</div>
                                                    </div>
                                                </div>
                                            <!-- ***************************FIN pestaña autorizadosA****************************** -->
                                            <!-- ***************************pestaña autorizadosA****************************** -->
                                            <div role="tabpanel" class="tab-pane seccionPermisosx" id="Personalautorizados">
                                            <h3 class="text-center">Personal con autorización para visualizar este módulo</h3>
                                                <br>
                                                <div class="EncabezadoTable">
                                                    <div class="campoIdEncabezado">No.</div>
                                                    <div class="campoNombreEncabezado">Nombre</div>
                                                    <div class="campoSucursalEncabezado">Sucursal</div>
                                                    <div class="campoPuestoEncabezado">Puesto</div>
                                                </div>
                                            </div>
                                            <!-- ***************************pestaña autorizadosA****************************** -->
                                            <!--***********************INICIO DE CUARTA PESTAÑA*******************************-->
                                                    <div role="tabpanel" class="tab-pane seccionPermisosx" id="descargarchivos"> 
                                            <!-- ************************archivos********************************* -->
                                                <div class="box-header with-border" style=" text-align: center;">
                                                    <h3 class="box-title"> <i class="fa fa-download fa-3x" style="color:#00A65A" ></i> Descargar Archivo</h3>
                                                </div>
                                                <div class="box-body">
                                                    <form method="post">  
                                                        <div class="max1000">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style=" text-align: center;">
                                                                            <label>Descarga de Movimiento Realizados :</label>
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12 estilos-centrar">
                                                                        <button type="submit" name="reporteFacturacionSucursal" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                                                                    </div>
                                                                </div>
                                                        </div>    
                                                    </form> 
                                                </div>                    
                                                <!-- *************************FIN DEL CUARTA PESTAÑA******************************* -->
                                            </div>
                                                <!-------------- termina archivos---------------- -->
                                            </div> <!-- ************************FIN TAB CONTEN FIN********************************* -->
                                        </div> <!-- ************************FIN TAB PANEL********************************* -->               
                                    </div><!-- /.box -->
                                </section>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>
               

