
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box <?php echo $_SESSION['identificador2'] == 10 ? 'collapsed-box' : ''?>">
        <div class="box-header with-border">
        <?php if($_SESSION['identificador2'] == 10):?>
          <h3 class="box-title"><i class="fa fa-newspaper-o icono-encabezado"></i> GESTOR DE INFORMACIÓN</h3>
        <?php else:?>
          <h3 class="box-title"><i class="fa fa-newspaper-o icono-encabezado"></i> GESTOR DE SECCIÓN NOTICIAS Y EVENTOS</h3>
        <?php endif; ?>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
         
            <div class="row" >
                <div class="col-md-12">
                    <p class="text-center"><b>Área que será visble por el usuario</b></p>
                </div>
              </div>

            <div class="col-md-12" style="border:2px dotted #000">
                        <div class="box-body col-md-6" id='recargarContenedorSlide'>
                            <?php
                            $flag = $_SESSION['identificador'] == 357 ? false : true;
                              echo GestorImagenes::mostrarCarrusel($flag);
                            ?>
                        </div>
                        <div class="box-body col-md-6" id='recargarContenedorTextoSlide'>
                            <?php
                              echo GestorImagenes::mostrarTextoCarrusel($flag);
                            ?>
                        </div>
            </div>

            <div class="col-md-12">

                  <div class="gestorSlideCrow">
                      <p class="encabezadoGestorSlideCrow">Arrastra las imagenes que quieras agregar  <i class="fa fa-arrow-down fa-2x text-yellow"></i>, debe ser una imagen rectangular (automáticamente se redimencionara a <b>1920px X 1080px</b>), peso máximo 2 MB </p>
                      <ul id="columnasSlide">
                          <?php
                              GestorImagenes::mostrarImagenes($flag);
                          ?>
                      </ul>
                      <button type="button" id="ordenarSlide" class="btn btn-info">Ordenar</button> 
                      <button type="button" id="guardarSlide" class="btn btn-success botonDesactivado">Guardar</button> 
                      
                      <!--<input type="button" id="ordenarSlide" class="botonClase" value="Ordenar">
                      <input type="button" id="guardarSlide" class="botonClase botonDesactivado" value="Guardar">-->
                </div>
            <br>
            <br>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      <?php if($_SESSION['identificador2'] == 10):?>
 
      <div class="box collapsed-box"><!-- Default box -->
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle icono-encabezado"></i> GESTOR DE TALLERES</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">

            <div class="col-md-12">
                   <form method="POST" style="margin-top: 2%;margin-bottom:40px;"  id="formularioCargarNutricion" enctype="multipart/form-data">
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                  <label for="">1.- Título del taller:</label> <i class="fa fa-check-circle text-green"></i>
                                  <input  class="form-control textoMay" type="text" name="titulo" autocomplete="off" required>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                            <br>

                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <label for="">2.-Descripción:</label> <i class="fa fa-check-circle text-green"></i>
                                <textarea name="descripcion" class="form-control textoMay textAreaImportante" rows="3" style="resize:vertical;" required placeholder="...Te pedimos que seas lo más específico posible, detallando exactamente cual es tu problema; y en caso de que aplique nos indiques cual es la solución o resultado que esperas obtener."></textarea>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                            <br>

                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <label for="">3.- Selecciona el archivo (formato PDF) que deseas subir al sistema</label> <i class="fa fa-check-circle text-green"></i>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                            
                            <div id="lienzoDocumentoNutricion"> </div>

                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <span class="btn btn-default btn-lg btn-file" style="width:200px;">
                                  <i class="fa fa-file-pdf-o text-red"></i> Seleccionar 
                                  <input type="file" name="documento" id="documento" title="Selecciona un archivo pdf" required>
                                </span>                               
                              </div>
                            </div>

                            <br>
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <label for="">4.- ¿Deseas agregar alguna imagen para la portada?</label>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>

                             <div id="lienzoImagenNutricion"> </div>
                           
                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <span class="btn btn-default btn-lg btn-file" style="width:200px;">
                                  <i class="fa fa-file-image-o text-green"></i> Seleccionar 
                                  <input type="file" name="portada" id="portada">
                                </span>                               
                              </div>
                            </div>
                            <br>
                      
                        <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                        <div class="estilos-centrar">
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                          <hr style="border-top: 2px solid #00a65a;">
                          <br>
                        </div>
                   </form>
            </div>
          
             <div class="row">
                   <br>
                  <div class="col-md-12">
                      <p class="text-center"><b>Área que será visble por el usuario</b></p>
                  </div>
            </div>

            <div class="col-md-12" style="border:2px dotted #000; padding-top:10px;padding-bottom:10px;">
                <div class="row max1000">
                    <div class="col-md-6">
                        <b>Nombre del taller</b>
                    </div>
                    <div class="col-md-2">
                        <b>Fecha</b>
                    </div>
                    <div class="col-md-4">
                                                        
                    </div>
                </div>
                
                <div id="contenedoresTalleres">
                      <?php echo Eventos::talleres();?>
                </div>
            </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer"></div>  <!--Footer-->
        <!-- /.box-footer-->
      </div> <!-- /.box -->
     
      <?php endif;?>


       
      <?php if($_SESSION['identificador2'] == 10):?>
        <div class="row" >
          <div class="col-md-12">
              <p class="callout callout-success">Si deseas subir videos a la plataforma, por favor envia el link al área de Recursos Humanos.</p>
          </div>
        </div>
      <?php endif; ?>
           

    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->