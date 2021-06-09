
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    

       <!-- Default box -->
      <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-file-text-o icono-encabezado"></i> Reporte de solicitudes</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <form action="solicitudesReportes" method="post" id="probandoReportes">  
              <div class="max1000">
                      <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="">1.-Sucursal:</label>
                                <select class="form-control textoMay" name="sucursal" id="sucursalPermisoReporte">
                                    <?php
                                      echo'<option value="0">TODAS</option>';
                                      $sucursales= new gestionSucursales();
                                      if(AccesoRHespecial::pertenece($_SESSION['identificador']))
                                        $sucursales->vistaSucursalesSelectModelRHespecial();
                                      else
                                        $sucursales->vistaSucursalesController();
                                    ?>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label for="">2.-Usuario:</label>
                                <select class="form-control textoMay" name="usuario" id="targetUsuarioPermisoReportes">
                                    <option value="0">TODOS</option>
                                </select> 
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="">3.-Tipo:</label>
                                <select class="form-control textoMay" name="tipo">
                                <option value="0">TODOS</option>
                                <option value="1">PERMISOS</option>
                                <option value="2">VACACIONES</option>
                                <option value="3">CAMBIOS DE GUARDIA</option>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label for="">4.-Autorizados:</label>
                                      <select class="form-control textoMay" name="autorizados">
                                      <option value="0">TODOS</option>
                                      <option value="1">SÍ</option>
                                      <option value="2">NO</option>
                                      </select>
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                             <div class="row">
                              <div class="col-md-6">
                                <span><b>5.-Fecha inicio:</b></span>
                                <br>
                                <input type="date" class="select-style textoMay" name="fechaInicio">
                              </div>

                              <div class="col-md-6">
                                <span><b>6.-Fecha final:</b></span>
                                <br>
                                <input type="date" class="select-style textoMay" name="fechaFinal">
                              </div>
                            </div>
                      </div>

                      <hr>
                      <div class="row">
                          <div class="col-md-12 estilos-centrar">
                              <button type="submit" name="reporteSolicitudes" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                          </div>
                      </div>
              </div>    
            </form> 
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->



      <?php if($_SESSION['identificador'] != 351):?>
       <!-- Default box -->
       <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plane icono-encabezado"></i> Reporte de vacaciones</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form action="solicitudesReportes" method="post" id="probandoReportes2">  
              <div class="max1000">
                      <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="">1.-Sucursal:</label>
                                <select class="form-control textoMay" name="sucursalVacaciones" id="sucursalVacaciones">
                                    <?php
                                      echo'<option value="0">TODAS</option>';
                                      $sucursales= new gestionSucursales();
                                      $sucursales -> vistaSucursalesController();
                                    ?>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label for="usuarioEquipo">2.-Usuario:</label>
                                  <select class="form-control textoMay" name="usuarioVacaciones" id="targetUsuarioVacacionesReportes">
                                        <option value="0">TODOS</option>
                                  </select>
                              </div>
                            </div>
                      </div>

                      <hr>
                      <div class="row">
                          <div class="col-md-12 estilos-centrar">
                              <button type="submit" name="reporteVacaciones" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                          </div>
                      </div>
              </div>    
            </form> 
       
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
     <?php endif;?>

  <?php if($_SESSION['identificador'] == 168): ?>
       <!-- Default box -->
       <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-users icono-encabezado"></i> Reporte de personal vigente</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form method="post">  
              <div class="max1000">
                      <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="">1.-Sucursal:</label>
                                <select class="form-control textoMay" name="sucursalVigente" id="sucursalVigente">
                                    <option value="0">TODAS</option>
                                    <?php
                                      $sucursales= new gestionSucursales();
                                      $sucursales -> vistaSucursalesController();
                                    ?>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label for="usuarioEquipo">2.-Usuario:</label>
                                  <select class="form-control textoMay" name="usuarioVigente" id="targetUsuarioVigente">
                                    <option value="0">TODOS</option>
                                  </select>
                              </div>
                            </div>
                      </div>

                      <hr>
                      <div class="row">
                          <div class="col-md-12 estilos-centrar">
                              <button type="submit" name="reportePersonalVigente" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                          </div>
                      </div>
              </div>    
            </form> 
       
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
<?php endif;?>


    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->


