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
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-database icono-encabezado"></i> BIBLIOTECA DE SOFTWARE</h3>
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
                        <li role="presentation">
                            <a href="#nueva" aria-controls="encuesta" role="tab" data-toggle="tab">Nuevo</a>
                        </li>
                        <li role="presentation" class="active">
                            <a href="#administrar" aria-controls="examen" role="tab" data-toggle="tab">Biblioteca</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="margin-top: 2%;">

                        <div role="tabpanel" class="tab-pane" id="nueva"> 
                            <form id="formSoftware" method="POST" enctype="multipart/form-data" class="max600">
                                    <div class="row">
                                            <div class="col-md-12">
                                                <label>1.-Nombre del software:</label><i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon info" style="background-color: #E0F8E6">
                                                        <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control iluminarIconoInput" type="text" name="nombre">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <label>2.-Descripción: </label><i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon info" style="background-color: #E0F8E6">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="descripcion" class="form-control iluminarIconoInput" rows="8" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>3.-</label>
                                            <span class="btn btn-primary btn-lg btn-file"><i class="fa fa-cloud-upload"></i> Cargar software <input type="file" name="archivo"></span> 
                                            <i class="fa fa-check-circle text-green"></i>
                                        </div>
                                        <div class="col-xs-6 text-right" id="indicador">
                                            <i class="fa fa-square-o fa-4x" style="color:#3c8dbc;margin-right:8px;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>4.-</label>
                                            <span class="btn btn-warning btn-lg btn-file" style="min-width:186px;"><i class="fa fa-file-image-o"></i> Cargar caratula <input type="file" name="archivo2" accept="image/*"></span> 
                                        </div>
                                        <div class="col-xs-6 text-right" id="indicador2">
                                            <i class="fa fa-square-o fa-4x" style="color:#f0ad4e;margin-right:8px;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <button type="button" id="guardarSoftware" class="btn btn-success"> Guardar</button>             
                                            <button type="button" id="cancelarSoftware" class="btn btn-danger"> Cancelar</button> 
                                        </div>
                                    </div>
                            </form>   
                        </div>

                        <div role="tabpanel" class="tab-pane active administrar-empresas" id="administrar"> 
                            <div id="areaRegistros">
                                <?php echo Software::mostrarRegistros(); ?>
                            </div>
                        </div>
                    </div>
                </div>
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





               