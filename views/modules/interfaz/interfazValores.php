
  
  <?php 
      $respuesta = Eventos::mostrarCandidatos();
    
      $nombre1 = $respuesta['nombre1'] == "" ? "SIN SELECCIONAR" : $respuesta['nombre1'];
      if($respuesta['imagen1'] === NULL){
        $imagen1 = $imagen1min = "views/img/user.png";
      }
      else{
        $imagen1 = "views/imagenes-usuarios/".$respuesta['imagen1'] ;
        $imagen1min = "views/imagenes-usuarios/mini/".$respuesta['imagen1'] ;
      }
      
     
      $nombre2 = $respuesta['nombre2'] == "" ? "SIN SELECCIONAR" : $respuesta['nombre2'];
      if($respuesta['imagen2'] === NULL){
        $imagen2 = $imagen2min = "views/img/user.png";
      }
      else{
        $imagen2 = "views/imagenes-usuarios/".$respuesta['imagen2'] ;
        $imagen2min = "views/imagenes-usuarios/mini/".$respuesta['imagen2'] ;
      }
     
      
      $nombre3 = $respuesta['nombre3'] == "" ? "SIN SELECCIONAR" : $respuesta['nombre3'];
      if($respuesta['imagen3'] === NULL){
        $imagen3 = $imagen3min = "views/img/user.png";
      }
      else{
        $imagen3 = "views/imagenes-usuarios/".$respuesta['imagen3'] ;
        $imagen3min = "views/imagenes-usuarios/mini/".$respuesta['imagen3'] ;
      }
      
      $nombre4 = $respuesta['nombre4'] == "" ? "SIN SELECCIONAR" : $respuesta['nombre4'];
      if($respuesta['imagen4'] === NULL){
        $imagen4 = $imagen4min = "views/img/user.png";
      }
      else{
        $imagen4 = "views/imagenes-usuarios/".$respuesta['imagen4'] ;
        $imagen4min = "views/imagenes-usuarios/mini/".$respuesta['imagen4'] ;
      }
      
      $nombre5 = $respuesta['nombre5'] == "" ? "SIN SELECCIONAR" : $respuesta['nombre5'];
      if($respuesta['imagen5'] === NULL){
        $imagen5 = $imagen5min = "views/img/user.png";
      }
      else{
        $imagen5 = "views/imagenes-usuarios/".$respuesta['imagen5'] ;
        $imagen5min = "views/imagenes-usuarios/mini/".$respuesta['imagen5'] ;
      }
     
      
  ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


      <!-- Default box collapsed-box-->
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-12">
                <h3 class="box-title"><i class="fa fa-star icono-encabezado"></i> MÓDULO DE RECONOCIMIENTO</h3> 
            </div>
          </div>
        </div>
        
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              El trabajo, esfuerzo y dedicación de quienes conformamos <b>ASESORES EMPRESARIALES</b>, son los principales impulsores para el éxito de esta empresa, por lo que este módulo es creado con el fin de reconocer estos y otros valores que durante todo el año nos han representado.
            </div>
          </div>
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h4 class="box-title"><b>¿Cómo funciona?</b></h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><h3 class="box-title">Leer ...</h3> <i class="fa fa-minus"></i></button>
              </div> 
          </div>
          <div class="box-body">
            <ol>
              <li>
                A continuación encontrarás cinco categorías con las que puedes
                nominar a cualquiera de tus compañeros, ya sea de tu sucursal o
                de alguna otra a nivel nacional. Las categorías están hechas
                pensadas en todos, no olvides leer cada una de ellas antes de
                relizar tu nominación.
              </li>
              <hr>
              <li>
                En los recuadros blancos deberás poner la clave de tu
                nominad@ (para poder escribir en ellos debes presionar el botón <b>"Actualizar mis categorias"</b>), estas claves las encuentras en la esquina superior
                derecha, en el botón “Participantes”, puedes utilizar los filtros
                para encontrar más rápido a tu nominad@.
              </li>
              <hr>
              <li>
                 Una vez agregadas las claves en los recuadros, da clic en “Guardar”.
              </li>
              <hr>
              <li>
                En caso de que cambies de opinión respecto a tus nominados,
                presiona el botón "Actualizar mis categorias", se habilitarán de nuevo los
                recuadros blancos para poder cambiar las claves, una vez que
                hagas los cambios que consideres necesarios, guarda de nuevo
                tus nominaciones.
              </li>
            </ol>

            <br>
            <span style="font-size:15px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">Este módulo estará disponible del 15 al 22 de noviembre.</span>
            <br>
            <br>
           <H3 class="text-center">Los resultados se darán a conocer el día de la posada, ¡¡No Faltes!!</H3>

          </div>
        </div>
      </div>
      <!-- /.box -->


      
      <!-- Default box collapsed-box-->
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-6">
               
            </div>
            <div class="col-md-6">
              <button type="button" id="botonModal" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-users fa-lg"></i> Participantes (Claves)</button>
            </div>
          </div>
        </div>
        
        <div class="box-body">
         
          
                <!--<div class="row">
                  <div class="col-md-12">
                   
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3>¿Qué es Nutri Fitness?</h3>

                        <p><b>Asesores Empresariales!</b> se preocupa por ti, y te propone un programa integral de 6 meses que además de obtener beneficios en tu Salud, también tiene como objetivo hacer una labor social.</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-question-circle"></i>
                      </div>
                      <a href="#" class="small-box-footer"></a>
                    </div>
                  </div>
                </div>-->

            <form method="POST" id="formularioValores">

                <div class="row">

                   <div class="col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div>
                        <div class="inner2">
                          <p id="nombre1"><?php echo $nombre1; ?></p>
                          Clave: <input type="number" value="<?php echo $respuesta['identificador1']; ?>" name="identificador1" id="identificador1" style="width:100px;color:#000;text-align:center;" min="0" max="500" class="valores">
                        </div>
                        <div class="icon2">
                          <img id="imagen1" src="<?php echo Ruta::ruta_server().$imagen1min?>" class="imagenSesion visor-crow-imagen-mini" alt="<?php echo Ruta::ruta_server().$imagen1;?>" style="cursor: pointer;">
                        </div>
                      </div>

                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                          <h4 class="box-title"><b>1) COMPAÑERISMO</b></h4>
                            

                            <div class="box-tools pull-right">
                            
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><h3 class="box-title">Leer ...</h3> <i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-black">Es la capacidad de acompañar, ayudar y apoyar al otro, con el fin de alcanzar juntos un mismo objetivo.</p>
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>

                   <div class="col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div>
                        <div class="inner2">
                          <p id="nombre2"><?php echo $nombre2; ?></p>
                          <p>Clave: <input type="number" value="<?php echo $respuesta['identificador2']; ?>" name="identificador2" id="identificador2" style="width:100px;color:#000;text-align:center;" min="0" max="500" class="valores"></p>
                        </div>
                        <div class="icon2">
                          <img id="imagen2" src="<?php echo Ruta::ruta_server().$imagen2min;?>" class="imagenSesion visor-crow-imagen-mini" alt="<?php echo Ruta::ruta_server().$imagen2;?>" style="cursor: pointer;">
                        </div>
                      </div>

                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                          <h4 class="box-title"><b>2) CALIDAD Y SERVICIO</b></h4>
                            

                            <div class="box-tools pull-right">
                            
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><h3 class="box-title">Leer ...</h3> <i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-black">Se trata de comprometernos con el trabajo realizado, hasta que el resultado sea lo mejor posible y no conformarnos con menos.</p>
                            
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                   <div class="col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div>
                        <div class="inner2">
                          <p id="nombre3"><?php echo $nombre3; ?></p>
                          <p>Clave: <input type="number" value="<?php echo $respuesta['identificador3']; ?>" name="identificador3" id="identificador3" style="width:100px;color:#000;text-align:center;" min="0" max="500" class="valores"></p>
                        </div>
                        <div class="icon2">
                          <img id="imagen3" src="<?php echo Ruta::ruta_server().$imagen3min;?>" class="imagenSesion visor-crow-imagen-mini" alt="<?php echo Ruta::ruta_server().$imagen3;?>" style="cursor: pointer;">
                        </div>
                      </div>

                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                          <h4 class="box-title"><b>3) RESPETO</b></h4>
                            

                            <div class="box-tools pull-right">
                            
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><h3 class="box-title">Leer ...</h3> <i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-black">Es la valoración que nos permite reconocer, aceptar y apreciar las cualidades y derechos de nosotros mismos y de las personas con quienes convivimos.</p>
                            
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>

                   <div class="col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua" style="background:#605ca8 !important;">
                      <div>
                        <div class="inner2">
                          <p id="nombre4"><?php echo $nombre4; ?></p>
                          <p>Clave: <input type="number" value="<?php echo $respuesta['identificador4']; ?>" name="identificador4" id="identificador4" style="width:100px;color:#000;text-align:center;" min="0" max="500" class="valores"></p>
                        </div>
                        <div class="icon2">
                          <img id="imagen4" src="<?php echo Ruta::ruta_server().$imagen4min;?>" class="imagenSesion visor-crow-imagen-mini" alt="<?php echo Ruta::ruta_server().$imagen4;?>" style="cursor: pointer;">
                        </div>
                      </div>

                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                          <h4 class="box-title"><b>4) DISCIPLINA Y CONSTANCIA</b></h4>
                            

                            <div class="box-tools pull-right">
                            
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><h3 class="box-title">Leer ...</h3> <i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-black">Se trata del hábito que podemos desarrollar al llevar a cabo nuestras tareas cotidianas con orden y perseverancia.</p>
                           
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>

                </div>

                 <div class="row">

                <div class="col-md-3">
                   
                   </div>

                  <div class="col-md-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div>
                        <div class="inner2">
                          <p id="nombre5"><?php echo $nombre5; ?></p>
                          <p>Clave: <input type="number" value="<?php echo $respuesta['identificador5']; ?>" name="identificador5" id="identificador5" style="width:100px;color:#000;text-align:center;" min="0" max="500" class="valores"></p>
                        </div>
                        <div class="icon2">
                          <img id="imagen5" src="<?php echo Ruta::ruta_server().$imagen5min;?>" class="imagenSesion visor-crow-imagen-mini" alt="<?php echo Ruta::ruta_server().$imagen5;?>" style="cursor: pointer;">
                        </div>
                      </div>
                     
                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                          <h4 class="box-title"><b>5) RESPONSABILIDAD</b></h4>
                            

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><h3 class="box-title">Leer ...</h3> <i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-black">Es la característica positiva que tenemos para comprometernos y actuar de forma correcta.</p>
                  
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                   
                  </div>

                </div>


                <div class="row text-center">
                  <div class="col-md-12">
                      <a id="botonActualizarValores" class="btn btn-primary btn-lg"><i class="fa fa-refresh fa-lg"></i> Actualizar mis categorias</a>
                      <a id="botonGuardarValores" class="btn btn-success btn-lg"><i class="fa fa-floppy-o fa-lg"></i> Guardar</a>
                  </div>
                </div>

            </form>
   
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="row">
                
            </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


  
       <!--Ventana modal-->
       <div class="modal fullscreen-modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog seccionValores">
                <div class="modal-content">
                     <div id='claseEquipos' class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>Lista de candidatos:</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">

                         <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Sucursal:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-list-ol"></i>
                                        </div>
                                        <select class="form-control textoMay iluminarIconoInput" id="filtroSucursalValores">
                                          <?php
                                            echo'<option value="0">Todas</option>';
                                            $sucursales= new gestionSucursales();
                                            $sucursales->vistaSucursalesController();
                                          ?>
                                        </select>
                                </div> 
                            </div>   
                            <div class="col-md-6">
                                <label for="">Nombre:</label>                               
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input class="form-control iluminarIconoInput" type="text" id="filtroUsuarioValores">
                                </div>
                            </div>   

                          
                        </div>

                        <div class="renglonEncabezado">
                          <div class="campoIdEncabezado">Clave</div>
                          <div class="campoNombreEncabezado">Nombre</div>
                          <div class="campoSucursalEncabezado">Sucursal</div>
                        </div>

                        <div id="actualizarListaCandidatos">
                          <?php echo Eventos::listaCandidatos();?>
                        </div>

                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->