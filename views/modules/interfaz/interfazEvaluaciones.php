<?php 
    $data = array('nombre'=>'','situacion'=>''); 
    $paginacion = new Paginacion(30);
    $paginacion->target('evaluaciones');
    $paginacion->parametroCliente('');
    $paginacion->parametroLiberado('');
    $respuesta=Evaluaciones::usuarios($data,$paginacion->limitRegistros());
    $paginacion->totalPaginas($respuesta['total']);
?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tasks icono-encabezado"></i> EVALUACIONES Y ENCUESTAS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body administrar-evaluaciones">
                              
                        <div class="row"  style="margin-top: 2%;">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> TERMINADAS: </span>
                                        <span class="info-box-number"><span id="cargarMarcadoresLiberados"><?php echo Evaluaciones::marcadores(2); ?></span></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> PENDIENTES: </span>
                                        <span class="info-box-number"><span id="cargarMarcadoresCancelados"><?php echo Evaluaciones::marcadores(1); ?></span></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                        
                        <div class="row form-group">

                            <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-ol"></i>
                                        </div>
                                        <select class="form-control textoMay iluminarIconoInput" id="filtroSituacionEncuestas" placeholder="Buscar...">
                                            <option value="" selected>TODOS</option>
                                            <option value="1">PENDIENTES</option>
                                            <option value="2">TERMINADAS</option>
                                        </select>
                                </div> 
                            </div>   

                            <div class="col-md-8 text-right">
                                <div><input type="text" id="buscadorUsuariosEncuestas" class="buscador" placeholder="Nombre..." style="width: 200px;height: 35px;padding: 5px;"></div>
                            </div>  

                        </div>
   
                    
                        <div class="row" style="margin-top: 2%;">
                            <div class="col-md-12"><b>Total de registros que coinciden: </b>  <span id="totalRegistrosEvaluacion" style="font-size:20px;"><?php echo $respuesta['total']; ?> </span></div>
                          
                        </div>

                     
                        <span class="paginador"><?php echo $paginacion->mostrar();?></span> 

                            <div class="renglonEncabezado" style="margin-top: 25px;">
                                <div class="campoIdEncabezado">Folio</div>
                                <div class="campoNombre" style="justify-content: center;">Nombre</div>
                                <div class="campoEncuestaEncabezado" style="justify-content: center;">Encuesta</div>
                                <div class="campoEvaluacionEncabezado">Evaluacion</div>
                                <div class="campoOpcionesEncabezado">Opciones</div>
                            </div>

                            <div id="dataEvaluaciones">
                                <?php echo $respuesta['data']; ?>           
                            </div>

                         <span class="paginador"><?php echo $paginacion->mostrar();?></span>
            
        </div>


      <!--Ventana modal-->
      <div class="modal fullscreen-modal fade bd-example-modal-lg fade" id="encuestaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                      <div class="modal-header">
                            <span id="encabezadoNombre" style="font-size:20px;"></span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                                    <i class="fa fa-window-close fa-lg text-red" aria-hidden="true"></i>
                            </button>
                      </div>

                      <div class="modal-body">
                            <div id="mostrarEvaluaciones">
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