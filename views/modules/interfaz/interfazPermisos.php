<?php
//session_start();
$privilegios = GrupoCostos::privilegios($_SESSION['identificador']);

    $data = array(  'cliente'=>'',
    'facturado'=>'',
    'liberado'=>'',
    'pago'=>'',
    'valor'=>'',
    'nomina'=>'',
    'nominista'=>'',
    'autorizacion'=>'1'
); 

    $paginacion = new Paginacion(30);
    $paginacion->target('Permisos');
    $paginacion->parametroCliente('');
    $paginacion->parametroFacturado('');
    $paginacion->parametroLiberado('');
    $paginacion->parametroPago('');
    $paginacion->parametroNomina('');
    $paginacion->parametroNominista('');
    $paginacion->parametrosAutorizacion($data['autorizacion']);
    $totalRegistros=Nominas::contarRegistros($data,$_SERVER['REQUEST_URI']);
    $paginacion->totalPaginas($totalRegistros);

?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="permisosUsuarios">
    <!-- Main content -->
    <section class="content-conciliacion">
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border ">
                <h3 class="box-title text"><i class="fa fa-key icono-encabezado-conciliacion" ></i > Permisos </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div role="tabpanel"> 
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#captura" aria-controls="captura" role="tab" data-toggle="tab">Permisos Usuarios</a>
                        </li>
                        <li role="presentation">
                            <a  href="#reportes" aria-controls="reportes" role="tab" data-toggle="tab" class="btn btn-inf"> Alta Permiso </a>
                        </li>  
                    </ul>
                    <div class="tab-content" style="margin-top: 2%;">
                        <div role="tabpanel" class="tab-pane administrar-nominas active" id="captura"><!-- INICIO 1 PESTAÑA --> 
                        <!--**************************************************************************** -->
                        <form action="" name='formularios_permisos' method='POST'>
                        
                            <div class="row form-group">
                                <!--<div class="col-md-6">
                                    <label for="">1.-Razón social:</label>
                                                
                                                <br>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay inputIconBg" type="text" name="rfc" minlength="12" maxlength="12" required>
                                                </div>
                                            </div>-->
                                <div class="col-md-6">
                                    <label for="">Nombre de usuario:</label>
                                    <br>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input class="form-control iluminarIconoInput letras" type="text" id="numerouser" name="" dataname="">
                                        </div>   
                                </div>
                            </div>       
                               <br>
                                <!--SELECT usuarios_ae.nombre,puestos_ae.nombre FROM usuarios_ae INNER JOIN puestos_ae ON puestos_ae.id_puesto= usuarios_ae.id_puesto WHERE usuarios_ae.situacion='1'--> 
                                <span class="paginadorPermisos"><?php echo $paginacion->mostrar();?></span>
                                    <div class="encabezadoTablaUsuarios" style="margin-top: 25px;">
                                        <div class="encabezadoNumero" name="numerousuario" id="numerousuario">No.</div>
                                        <div class="encabezadoNombre">Nombre</div>
                                        <div class="encabezadoPuesto">Puesto</div>
                                        <div class="encabezadoPermisos">Permisos</div>
                                    </div>
                                    <div id="dataPermisosUser" name= "dataPermisosUser"class="dataPermisosUser">  
                                        <?php echo PermisosControllers::mostrarPermisos();?> 
                                    </div>
                                <span class="paginadorFacturacion"><?php echo $paginacion->mostrar();?></span>
                        </form>
                        <!--**************************************************************************** -->  
                        </div>  <!-- FIN 1 PESTAÑA --> 
                        
                        <div role="tabpanel" class="tab-pane seccionPermisosx" id="reportes" name='reportes'> <!-- INICIO 2 COLUMNA -->
                        <!--**************************************************************************** -->
                            <div class="row form-group">
                                <div class="col-md-6">
                                <label for="">Nombre de Permiso:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-hashtag"></i>
                                            </div>
                                        <input class="form-control iluminarIconoInput " type="text" id="namePermiso">
                                    </div>   
                                </div>
                                <div class="col-md-4">
                                    <button type="" value="" class="btn btn-success btn-md pelon" id="guardarNewPermiso " name="guardarNewPermiso"> <i class="fa fa-plus-square fa-lg"></i> GUARDAR</button>
                                </div>
                                
                            </div>
                            
                            <br>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="encabezadoTablaPermisos" style="margin-top: 25px;">
                                            <div class="encabezadoPermisoNumero">No.</div>
                                            <div class="encabezadoPermisoNombre">Permiso</div>
                                            <div class="encabezadoPermisosEliminar">Accion</div>
                                        </div>
                                        <div id="dataFacturacion">  
                                            <?php echo PermisosControllers::TablaUserPermisos($data);?> 
                                        </div>
                                    </div>
                                    
                                </div>
                        <!--**************************************************************************** -->    
                    </div><!-- FIN 2 COLUMNA -->
                    
                </div>
            </div>
        </div>
    </section> 
</div>

    <!--Ventana modal-->
    <div class="modal fade bd-example-modal-lg" id="modal_permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                            <i class="fa fa-window-close fa-lg text-red" aria-hidden="false"></i>
                        </button>
                        <h3>DATOS</h3>
                        <div id='datos' name='datos' value=""></div>    
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id='formulario' name='formulario'>
                            <!--#################################################### -->
                            <div class="box box-danger collapsed-box"></div>
                            <div id="datauser" name="datauser"></div>
                            <div class="row " id="rowbody">
                                <div class="col-sm-12 ">
                                    <p class='titulo'>PERMISO DE ACCESOS</p>                   
                                        <div id="permisostable"></div>
                                    </table>
                                    
                                    <div style="text-align: center;">
                
                                        <button type="submit" value="Submit"   class="btn btn-success btn-lg" id="guardarpermisos" name="guardarpermisos"> <i class="fa fa-floppy-o fa-lg"></i> GUARDAR</button>
                                    </div>
                                </div> 
                            </div>
                            <!--#################################################### -->
                        </form>   
                    </div>
                </div>
            </div>
    </div><!--Ventana modal-->       



