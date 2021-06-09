
  <?php 
      $verificar = new Eventos();
      $validacion = $verificar->verificarRegistro();

      if(intval($validacion)){
        $expandirLista=' ';
        $expandirBases=' collapsed-box';
        $botonBases='fa-plus';
        $botonLista='fa-minus';
      }
      else{
        $expandirLista=' collapsed-box';
        $expandirBases=' ';
        $botonBases='fa-minus';
        $botonLista='fa-plus';

      }
  ?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


      <!-- Default box collapsed-box-->
      <div class="box <?php echo $expandirBases;?>">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-leaf fa-rotate-270 icono-encabezado"></i> PROGRAMA NUTRIFITNESS</h3>
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa <?php echo $botonBases;?>"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
         
                  <!-- Banner -->
                <section id="banner">
                  <div class="inner">
                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri-mini.png" class="user-image" alt="User Image">
                    <p>Decidete a cambiar hoy mismo</p>
                  </div>
                  <video autoplay loop muted playsinline src="intranet/videos-nutri/banner2.mp4"></video>
                </section>

                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <!-- small box -->
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
                </div>


                <div class="row">
                  <div class="col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>1</h3>

                        <p><h4>Estudios de Laboratorio</h4></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                      </div>
                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <h3 class="box-title">Saber más...</h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-aqua"><b>Perfil metabólico:</b></p>
                            <ul class="text-black">
                              <li>Glucosa</li>
                              <li>Colesterol total</li>
                              <li>Colesterol bueno</li>
                              <li>Colesterol malo</li>
                              <li>Triglicéridos</li>
                            </ul>
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3>2</h3>

                        <p><h4>Plan Nutricional</h4></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-envira" aria-hidden="true"></i>
                      </div>
                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <h3 class="box-title">Saber más...</h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                          <p class="text-aqua"><b>Nutrióloga:</b></p>
                            <ul class="text-black">
                              <li>Consulta personalizada</li>
                              <li>Interpretación de análisis bioquímicos </li>
                              <li>Plan de alimentación</li>
                              <li>Análisis de composición corporal</li>
                              <ul>
                                <li>Porcentaje de grasa</li>
                                <li>Músculo</li>
                                <li>Agua</li>
                                <li>Hueso</li>
                                <li>Cintura</li>
                                <li>Estatura</li>
                              </ul>
                             
                            </ul>
                          </div>
                          <!-- /.box-body -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h3>3</h3>

                        <p><h4>Activador Físico</h4></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>

                      <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <h3 class="box-title">Saber más...</h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <p class="text-aqua"><b>Entrenador físico:</b></p>
                            <p class="text-black">Se realizan 3 pruebas para evaluar las capacidades físicas del paciente:</p>
                            <ol class="text-black">
                              <li>Flexibilidad</li>
                              <li>Adaptación cardiovascular</li>
                              <li>Fuerza</li>
                            </ol>
                            <p class="text-black">Recomendación de rutina o inicio de ejercicio acorde a resultados. </p>
                          </div>
                          <!-- /.box-body -->
                      </div>
                     
                    </div>
                  </div>
                </div>

                <div class="box box-info collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-clock-o icono-encabezado"></i> <b>Duración</b></h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                              <i class="fa fa-plus"></i></button>
                          </div>
                        </div>
                        <div class="box-body">

                            <div class="row">
                              <div class="col-md-12">
                                <p><h4 style="text-align:center;"><b>Programa de 6 meses</b></h4></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <ul class="timeline">

                                      <!-- timeline time label -->
                                      <li class="time-label">
                                          <span class="bg-red">
                                              INICIO
                                          </span>
                                      </li>
                                      <!-- /.timeline-label -->

                                      <!-- timeline item -->
                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-hourglass bg-blue"></i>
                                          <div class="timeline-item">
                                              
                                              <h3 class="timeline-header"><a href="#">MAYO</a> <b>(del 02 al 09)</b></h3>

                                              <div class="timeline-body">
                                                Bioquímicos.
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>
                                      
                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-calendar-check-o bg-blue"></i>
                                          <div class="timeline-item">
                              
                                              <h3 class="timeline-header"><a href="#">MAYO</a><b>(del 20 al 25)</b></h3>

                                              <div class="timeline-body">
                                                Consulta nutrición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Consulta activador físico. 
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-calendar-check-o bg-blue"></i>
                                          <div class="timeline-item">
                    
                                              <h3 class="timeline-header"><a href="#">JUNIO</a> <b>(del 24 al 29)</b></h3>

                                              <div class="timeline-body">
                                                Consulta nutrición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Clase de gym en casa. 
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-calendar-check-o bg-blue"></i>
                                          <div class="timeline-item">
                        
                                              <h3 class="timeline-header"><a href="#">JULIO</a> <b>(del 22 al 27)</b></h3>

                                              <div class="timeline-body">
                                                Consulta de nutrición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Clase de entrenamiento funcional. 
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-calendar-check-o bg-blue"></i>
                                          <div class="timeline-item">
                                          
                                              <h3 class="timeline-header"><a href="#">AGOSTO</a> <b>(del 19 al 24)</b></h3>

                                              <div class="timeline-body">
                                                Consulta de nutrición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Bioquímicos solamente quien salió alterado en primer medición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Consulta con activador físico.
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-calendar-check-o bg-blue"></i>
                                          <div class="timeline-item">

                                              <h3 class="timeline-header"><a href="#">SEPTIEMBRE</a> <b>(del 17 al 21)</b></h3>

                                              <div class="timeline-body">
                                                Consulta nutrición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Taller de nutrición (tema a elección) &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Clase de kick boxing y/o ritmos latinos.
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-calendar-check-o bg-blue"></i>
                                          <div class="timeline-item">

                                              <h3 class="timeline-header"><a href="#">OCTUBRE</a> <b>(del 21 al 26)</b></h3>

                                              <div class="timeline-body">
                                                Consulta nutrición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Bioquímicos solamente quien salió alterado en primer o segunda medición &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Consulta con activador físico &nbsp;&nbsp;<i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp; Clase de insanity. 
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li>
                                          <!-- timeline icon -->
                                          <i class="fa fa-hourglass-o bg-blue"></i>
                                          <div class="timeline-item">
                                          
                                              <h3 class="timeline-header"><a href="#">NOVIEMBRE</a></h3>

                                              <div class="timeline-body">
                                                Cierre del programa y reconocimiento a los mejores resultados. 
                                              </div>

                                              <div class="timeline-footer">
                                                
                                              </div>
                                          </div>
                                          
                                      </li>

                                      <li class="time-label">
                                          <span class="bg-red">
                                              CIERRE
                                          </span>
                                      </li>
                                      <!-- END timeline item -->
                                  </ul>


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
                 

                <div class="box box-info collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-question-circle-o icono-encabezado"></i> <b>¿Cómo funciona?</b></h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                              <i class="fa fa-plus"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">
                                <p><h4 style="text-align:center;"><b>Dinámica del Programa.</b></h4></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="box box-solid">
                                    <div class="box-header with-border"></div>
                                    <div class="box-body no-padding">
                                      <ol>
                                        <br>
                                        <li>Al aceptar participar en el programa debes estar <b>100% comprometido</b> y trabajar en equipo para lograr mejores resultados.</li>
                                        <hr>
                                        <li>Cada sucursal formara un <b>equipo</b>: Guadalajara, Monterrey, Ciudad de México y Puerto Vallarta.</li>
                                        <hr>
                                        <li>Deberás aceptar las condiciones generales del concurso mensual entre sucursales.</li>
                                        <hr>
                                        <li>Cada equipo definirá lo siguiente: <b>nombre del equipo, color del equipo </b> y un integrante como el <b>tesorero</b>.</li>
                                      </ol>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <div class="col-md-8">
                                  <img src="<?php echo Ruta::ruta_server();?>views/img/nutri8.jpg" class="img-responsive">
                              </div>
                              <div class="col-md-2">
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


                <div class="box box-info collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-smile-o icono-encabezado"></i> <b>Labor Social</b></h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                              <i class="fa fa-plus"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">
                                <p><h4 style="text-align:center;"><b>Cada equipo definirá en conjunto una labor social a la que le gustaría apoyar</b></h4></p>
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                              <div class="col-md-3">
                                  <div class="box box-danger">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <p><h4 style="text-align:center;">Team</h4></p>
                                            <p><h3 style="text-align:center;">Monterrey</h3></p>
                                            <p style="text-align:center;"><i class="fa fa-users text-red fa-3x"></i></p>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="box box-info">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <p><h4 style="text-align:center;">Team</h4></p>
                                            <p><h3 style="text-align:center;">Guadalajara</h3></p>
                                            <p style="text-align:center;"><i class="fa fa-users text-aqua fa-3x"></i></p>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="box box-gray">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <p><h4 style="text-align:center;">Team</h4></p>
                                            <p><h3 style="text-align:center;">Vallarta</h3></p>
                                            <p style="text-align:center;"><i class="fa fa-users text-gray fa-3x"></i></p>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="box box-warning">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <p><h4 style="text-align:center;">Team</h4></p>
                                            <p><h3 style="text-align:center;">Cd. México</h3></p>
                                            <p style="text-align:center;"><i class="fa fa-users text-yellow fa-3x"></i></p>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row margin-bottom">
                              <div class="col-sm-3">
                                <img src="<?php echo Ruta::ruta_server();?>views/img/nutri1.jpg" class="img-responsive">
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri2.jpg" class="img-responsive">
                                    <br>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri3.jpg" class="img-responsive">
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4">
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri4.jpg" class="img-responsive">
                                    <br>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri5.jpg" class="img-responsive">
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4">
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri6.jpg" class="img-responsive">
                                    <br>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/nutri7.jpg" class="img-responsive">
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                              <!-- /.col -->
                            </div>




                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <!--Footer-->
                        </div>
                        <!-- /.box-footer-->
                </div>
                      <!-- /.box -->


                 <div class="box box-info collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-check-square-o icono-encabezado"></i> <b>Terminos y condiciones</b></h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                              <i class="fa fa-plus"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">
                                <p><h4 style="text-align:center;"><b>¿Estás dispuesto a crear un nuevo estilo de vida para ti?</b></h4></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                 
                                      <ol>
                                        <br>
                                        <li>Cada fin de mes, se tomarán los resultados individuales de perdida de % de grasa.</li>
                                        <hr>
                                        <li>Se obtendrá un promedio por equipo del % de perdida de grasa.</li>
                                        <hr>
                                        <li>El equipo con mayor perdida de % de grasa será el equipo ganador.</li>
                                         <hr>
                                        <li>Los equipos perdedores de ese mes, deberán dar $50 por cada integrante.</li>
                                         <hr>
                                        <li>Aquellas personas que no logren resultados individuales, es decir que no hayan tenido perdida de % de grasa, deberán dar $100 (aún y que estés en el equipo ganador).</li>
                                         <hr>
                                        <li>El tesorero de cada sucursal que no haya ganado en el mes, deberá de recaudar el dinero de cada participante.</li>
                                         <hr>
                                        <li>El dinero será entregado al tesorero del equipo ganador.</li>
                                         <hr>
                                        <li>El equipo ganador destinará ese dinero a la labor social que este apoyando, ya sea entregando el dinero integro en efectivo o en especie.</li>
                                        <hr>
                                      </ol>

                                
                              </div>
                            </div>
                            

                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <div class="col-md-8">
                                  <img src="<?php echo Ruta::ruta_server();?>views/img/nutri9.jpg" class="img-responsive">
                              </div>
                              <div class="col-md-2">
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
                     
               

                  <div id="cargarValidacionFitness">  
                      <?php  if(!intval($validacion)):?>      
                        <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title"><i class="fa fa-file-text-o icono-encabezado"></i> <b>Encuesta de hábitos saludables y ejercicio</b></h3>
                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                      <i class="fa fa-plus"></i></button>
                                  </div>
                                </div>
                                <div class="box-body">
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                        <p><h4 style="text-align:center;"><b>Señala la respuesta que corresponde a tus hábitos actuales</b></h4></p>
                                      </div>
                                    </div>
                                    <hr>
                                    <br>

                                    <form method="POST" style="margin-top: 2%;"  id="formularioSalud">
                                      <div class="max1000">
                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">1. <i class="fa fa-question fa-rotate-180"></i>Cuántas comidas realizas al día<i class="fa fa-question"></i> (contando las comidas fuertes y/o colaciones):</label>
                                                    <select class="form-control textoMay" name="reto1" required>
                                                      <option value=""></option> 
                                                      <option value="1">1-2</option> 
                                                      <option value="2">3-4</option> 
                                                      <option value="3">5 o más</option>                                         
                                                    </select>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">2. <i class="fa fa-question fa-rotate-180"></i>Cuánta agua natural tomas al día<i class="fa fa-question"></i></label>
                                                    <select class="form-control textoMay" name="reto2" required>
                                                      <option value=""></option> 
                                                      <option value="1">Menos de 1 litro</option> 
                                                      <option value="2">1 a 1.5 litros</option> 
                                                      <option value="3">Más de 2 litros</option>                                         
                                                    </select>
                                                </div>
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">3. <i class="fa fa-question fa-rotate-180"></i>Con que frecuencia consumes bebidas industrializadas<i class="fa fa-question"></i> (refrescos, jugos, aguas frescas)</label>
                                                    <select class="form-control textoMay" name="reto3" required>
                                                      <option value=""></option> 
                                                      <option value="1">Diario</option> 
                                                      <option value="2">Cada tercer día</option> 
                                                      <option value="3">Fines de semana</option>                                         
                                                    </select>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">4. Describe detalladamente tus horarios  de alimentación y  describe de acuerdo al tiempo de comida los platillos,  alimentos y bebidas que comúnmente consumes:</label>
                                                    <textarea name="reto4" class="form-control textoMay textAreaImportante" rows="8" style="resize:vertical;" required placeholder="...Ejemplo: desayuno 7:00am – un sándwich con pan blanco y 2 rebanadas de jamón de pierna , mayonesa 1 cucharada, 1 rebanada de jitomate y 1 hoja de lechuga, de tomar 1 vaso de leche entera (INCLUYE: DESAYUNO, COMIDA, CENA Y COLACIONES)"></textarea>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">5. De los 7 días de la semana, en promedio, <i class="fa fa-question fa-rotate-180"></i>Con que frecuencia consumes verduras<i class="fa fa-question"></i></label>
                                                    <select class="form-control textoMay" name="reto5" required>
                                                      <option value=""></option> 
                                                      <option value="0">Ninguno</option> 
                                                      <option value="1">1 día</option> 
                                                      <option value="2">2 días</option>    
                                                      <option value="3">3 días</option> 
                                                      <option value="4">4 días</option>  
                                                      <option value="5">5 días</option>    
                                                      <option value="6">6 días</option> 
                                                      <option value="7">Todos los días</option>                                         
                                                    </select>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">6. <i class="fa fa-question fa-rotate-180"></i>Tomas algún medicamento y/o suplemento<i class="fa fa-question"></i>, Si tu respuesta es sí, anota cuál y en qué dosis.</label>
                                                    <br>
                                                    <label><input type="radio" name="reto6" value="0" checked=""> No</label>
                                                    <br>
                                                    <label><input type="radio" name="reto6" value="1"> Sí</label>
                                                    <textarea name="reto6a" id="reto6a" class="form-control textoMay" rows="3" style="resize:vertical;" disabled></textarea>
                                                </div>
                                            </div>
                                          </div>

                                           <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">7. <i class="fa fa-question fa-rotate-180"></i> Tienes algún diagnostico médico<i class="fa fa-question"></i> (Diabetes, hipertensión, embarazo, etc.), Si tu respuesta es sí, anota cuál.</label>
                                                    <br>
                                                    <label><input type="radio" name="reto13" value="0" checked=""> No</label>
                                                    <br>
                                                    <label><input type="radio" name="reto13" value="1">Sí</label>
                                                    <textarea name="reto13a" id="reto13a" class="form-control textoMay" rows="3" style="resize:vertical;" disabled></textarea>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">8. <i class="fa fa-question fa-rotate-180"></i>Tienes alguna lesión<i class="fa fa-question"></i>, Si tu respuesta es sí, anota en dónde.</label>
                                                    <br>
                                                    <label><input type="radio" name="reto7" value="0" checked=""> No</label>
                                                    <br>
                                                    <label><input type="radio" name="reto7" value="1">Sí</label>
                                                    <textarea name="reto7a" id="reto7a" class="form-control textoMay" rows="3" style="resize:vertical;" disabled></textarea>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">9. <i class="fa fa-question fa-rotate-180"></i>Cuántos días a la semana realizas ejercicio<i class="fa fa-question"></i>:</label>
                                                    <select class="form-control textoMay" name="reto8" id="reto8" required>
                                                      <option value=""></option> 
                                                      <option value="0">Ninguno</option> 
                                                      <option value="1">1 a 2</option> 
                                                      <option value="2">3 a 4</option>  
                                                      <option value="3">5 a más</option>                                         
                                                    </select>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">10. <i class="fa fa-question fa-rotate-180"></i>Qué ejercicio realizas<i class="fa fa-question"></i></label>
                                                    <textarea name="reto9" id="reto9" class="form-control textoMay" rows="3" style="resize:vertical;" disabled></textarea>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">11. <i class="fa fa-question fa-rotate-180"></i>Sobre qué tema de alimentación y/o ejercicio te gustaría aprender más<i class="fa fa-question"></i></label>
                                                    <textarea name="reto10" class="form-control textoMay textAreaImportante" rows="3" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">12. <i class="fa fa-question fa-rotate-180"></i>Qué es lo que te motiva a cambiar<i class="fa fa-question"></i></label>
                                                    <textarea name="reto11" class="form-control textoMay textAreaImportante" rows="3" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">13. <i class="fa fa-question fa-rotate-180"></i>Cuales son tus metas<i class="fa fa-question"></i></label>
                                                    <textarea name="reto12" class="form-control textoMay textAreaImportante" rows="3" style="resize:vertical;"></textarea>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                    </form>

                                </div> <!-- /.box-body -->
                                <div class="box-footer">
                                </div>  
                        </div><!-- /.box -->
                      <?php endif; ?>
                      <br>
                      <br>
                    
                            <?php  if(intval($validacion)):?>
                                <div class="row">
                                    <div class="col-md-12">
                                      <p class="callout callout-success" style="font-size:30px;"> ¡Ya estas registrado en el programa Nutrifitness, gracias por participar! </p>
                                    </div>
                                </div>
                            <?php else:?>
                                <div style="border:2px dotted gray; padding:15px;">
                                  <p>
                                      <b>Para poder inscribirte deberas:</b>
                                      <ol>
                                        <li>Llenar correctamente la encuesta.</li>
                                        <li>Aceptar los terminos y condiciones.</li>
                                      </ol>

                                      <br>

                                      <p> <label class="container">Acepto los terminos y condiciones
                                          <input type="checkbox" id="condicionesYterminos">
                                          <span class="checkmark"></span>
                                          </label>
                                      </p>
                                      <div class="estilos-centrar">
                                          <button type="bottom" class="btn btn-success btn-lg" id="enviarFormularioNutrifitnes">Sí, deseo participar <i class="fa fa-check"></i></button>
                                      </div>
                                  </p>
                                </div>
                            <?php endif;?>
                  </div><!--  <div id="cargarValidacionFitness">-->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

<?php if(true): ?>
      <div class="box <?php //echo $expandirLista;?>">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-list icono-encabezado"></i> HORARIO DE CITAS</h3>
                          <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus<?php //echo $botonLista;?>"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="row max1000">
                                <div class="col-md-12">
                
                                  <div class="text-center textoMay"><h3>Próximas fechas de consulta con la nutrióloga</h2></div>
                                  <br>
                                    <table class="table table-bordered" style="box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                                      <tr style="background:rgb(0,166,90);color:#fff;box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);">
                                        <th style="width: 10px"></th>
                                        <th class="text-center">SUCURSAL</th>
                                        <th colspan="2" class="text-center">FECHA</th>    
                                      </tr>
                                      <tr>
                                        <td>1.</td>
                                        <td><b>CIUDAD DE MÉXICO</b></td>
                                        <td colspan="2"><span class="textoMay"><b>MIERCOLES 6 DE NOVIEMBRE </b></span> </td>
                                      </tr>

                                    <tr><td></td><td></td><td style="background:#3c8dbc;color:#fff;"><span class="textoMay">TOMA DE MEDIDAS</span></td><td><span class="textoMay">09:00 AM</span></td></tr>
                                     <!--<tr><td></td><td></td><td style="background:#00a65a;color:#fff;"><span class="textoMay">TALLER NUTICIONAL</span></td><td><span class="textoMay">09:45 AM A 10:30 AM</span></td></tr>-->
                                     <tr><td></td><td></td><td><span class="textoMay">DE LA CRUZ HERNANDEZ GLADYS</span></td><td><span class="textoMay">09:30 a.m.</span></td></tr>
                                     <tr><td></td><td></td><td><span class="textoMay">DE LA CRUZ SUAREZ JUANA</span></td><td><span class="textoMay">09:40 a.m.</span></td></tr>
                                     <tr><td></td><td></td><td><span class="textoMay">SANCHEZ ESPINOZA ANDREA</span></td><td><span class="textoMay">09:50 a.m.</span></td></tr>
                                     <tr><td></td><td></td><td><span class="textoMay">MAGAÑA RIOS MARTHA LETICIA</span></td><td><span class="textoMay">10:00 a.m.</span></td></tr>
                                     <tr><td></td><td></td><td><span class="textoMay">MEJIA HERNANDEZ IVETT</span></td><td><span class="textoMay">10:10 a.m.</span></td></tr>
                                     <tr><td></td><td></td><td><span class="textoMay">MARTINEZ GONZALEZ LAURA ISABEL</span></td><td><span class="textoMay">10:20 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">SANCHEZ SANCHEZ OMAR</span></td><td><span class="textoMay">10:30 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ALFARO RUIZ CLAUDIA</span></td><td><span class="textoMay">10:40 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ROBLEDO GARCIA ERIKA MONSERRAT</span></td><td><span class="textoMay">10:50 a.m.</span></td></tr>
                                      
                                  
                                     
                                      <tr style="background:#DDD5D3;">
                                        <td>2.</td>
                                        <td><b>GDL AURA PISO 12</b></td>
                                        <td colspan="2"><span class="textoMay"><b> LUNES 21 DE OCTUBRE</b></span> </td>
                                      </tr>
                                      <!--<tr><td></td><td></td><td style="background:#3c8dbc;color:#fff;"><span class="textoMay">TOMA DE MEDIDAS</span></td><td><span class="textoMay">09:00 AM</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">SALAZAR PATIÑO BRENDA NAIELY</span></td><td><span class="textoMay">10:00 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ROSALES JUAREZ NORMA ALEJANDRA</span></td><td><span class="textoMay">10:10 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">FRANCO HERNANDEZ SIMON</span></td><td><span class="textoMay">10:20 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MORENO SANDOVAL VERONICA SELENE</span></td><td><span class="textoMay">10:30 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MUÑOZ ESQUIVIAS DANIEL ANTONIO</span></td><td><span class="textoMay">10:40 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">DUARTE COTA SHAMARA ITZCHELT</span></td><td><span class="textoMay">10:50 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ARMENTA CASTRO BRIANDA MARCELIA</span></td><td><span class="textoMay">11:00 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MOYA MIJANGOS SELENE VIRIDIANA</span></td><td><span class="textoMay">11:10 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GUTIERREZ RIOS NORMA GRISELDA</span></td><td><span class="textoMay">11:20 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">RUIZ ORTEGA LAURA VIOLETA </span></td><td><span class="textoMay">11:30 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">DELGADILLO PEREZ JUAN CUAUHTEMOC</span></td><td><span class="textoMay">11:40 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">RUBIO VEGA MARTHA MARIA</span></td><td><span class="textoMay">11:50 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">CASTILLO GARCIA SALVADOR </span></td><td><span class="textoMay">12:00 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MARTTELO ALVARADO KARLA GABRIELA</span></td><td><span class="textoMay">12:10 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">HERNANDEZ MEZA ANDREA GUADALUPE</span></td><td><span class="textoMay">12:20 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">RODRIGUEZ MACIEL IRMA JEANETTE</span></td><td><span class="textoMay">12:30 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">EDGAR ALEJANDRO OROZCO</span></td><td><span class="textoMay">12:40 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ORTIZ ROSALES MONICA</span></td><td><span class="textoMay">12:50 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">TORIZ MAGALLON CLAUDIA LIZBETH</span></td><td><span class="textoMay">01:00 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">LOZANO NAPOLES MIGUEL ANTONIO</span></td><td><span class="textoMay">01:10 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ALMANZA ROJO ANDREA OLIVIA</span></td><td><span class="textoMay">01:20 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">DOMINGUEZ CHAVEZ MARIA FERNANDA</span></td><td><span class="textoMay">01:30 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ULLOA BONNO RENE SEBASTIAN</span></td><td><span class="textoMay">01:40 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ROSALES GONZALEZ URIEL ALEJANDRO</span></td><td><span class="textoMay">01:50 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td style="background:#00a65a;color:#fff;"><span class="textoMay">COMIDA</span></td><td><span class="textoMay">02:00 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">FRUTACIO MUÑOZ HUGO</span></td><td><span class="textoMay">03:00 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">TOPETE SANCHEZ JESUS ULISES</span></td><td><span class="textoMay">03:10 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">DELGADILLO LEYVA ROGELIO</span></td><td><span class="textoMay">03:20 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">RODRIGUEZ CORTES ADRIANA MARIA</span></td><td><span class="textoMay">03:30 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">TORRES GUZMAN DIANA MARGARITA</span></td><td><span class="textoMay">03:40 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GUTIERREZ DELGADO ELIA ADRIANA</span></td><td><span class="textoMay">03:50 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MICHEL GUZMAN MITZEA</span></td><td><span class="textoMay">04:00 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GASPAR LIMON KEILA BERENICE</span></td><td><span class="textoMay">04:10 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">PACHECO CARPIO REYNA ELENA</span></td><td><span class="textoMay">04:20 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">RABAGO REYNOSO HUGO</span></td><td><span class="textoMay">04:30 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">CASADOS HID BORJA BEATRIZ</span></td><td><span class="textoMay">04:40 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MAGALLANES BAYARDO CELIA LILIANA</span></td><td><span class="textoMay">04:50 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">LEMUS RUIZ MARCELA JUDITH</span></td><td><span class="textoMay">05:00 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">BERNAL GUILLEN LAURA MARGARITA</span></td><td><span class="textoMay">05:10 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">CRUZ PEREZ FLOR DE MARIA</span></td><td><span class="textoMay">05:20 p. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">CERVANTES MENDOZA LORENA MONSERRATH</span></td><td><span class="textoMay">05:30 p. m.</span></td></tr>-->


                              
                                      <tr style="background:#DDD5D3;">
                                        <td>3.</td>
                                        <td><b>GDL ADMINISTRADORES</b></td>
                                        <td colspan="2"><span class="textoMay"><b>MARTES 22 DE OCTUBRE</b></span></td>
                                      </tr>
                                      <!--<tr><td></td><td></td><td style="background:#3c8dbc;color:#fff;"><span class="textoMay">TOMA DE MEDIDAS</span></td><td><span class="textoMay">08:30 A.M.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">FIGUEROA CARDONA KAREN ANDREA</span></td><td><span class="textoMay">09:00 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GONZALEZ PEREZ GABRIELA</span></td><td><span class="textoMay">09:10 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">SERRANO SEDANO DANIELA</span></td><td><span class="textoMay">09:20 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">TELLEZ LAZO JOSE ARMANDO</span></td><td><span class="textoMay">09:30 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GARCIA MARTINEZ JORGE ADRIAN</span></td><td><span class="textoMay">09:40 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">RUVALCABA LOPEZ MARCO ANTONIO</span></td><td><span class="textoMay">09:50 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GONZALEZ ARVIZU MARTHA LETICIA</span></td><td><span class="textoMay">10:00 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">REYES ACOSTA LILIANA BEATRIZ</span></td><td><span class="textoMay">10:10 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">SANCHEZ GUTIERREZ JUAN CESAR</span></td><td><span class="textoMay">10:20 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ORTEGA RUIZ GUSTAVO ADAN</span></td><td><span class="textoMay">10:30 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">FLORES ANTONIO NATALY</span></td><td><span class="textoMay">10:40 a. m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ALEMAN RAMOS BRITTANY LORELEY</span></td><td><span class="textoMay">10:50 a. m.</span></td></tr>-->


                                      <tr style="background:#DDD5D3;">
                                        <td>4.</td>
                                        <td><b>MONTERREY</b></td>
                                        <td colspan="2"><span class="textoMay"><b>VIERNES 25 DE OCTUBRE</b></span> </td>
                                      </tr>
                                     <!-- <tr><td></td><td></td><td style="background:#3c8dbc;color:#fff;"><span class="textoMay">TOMA DE MEDIDAS</span></td><td><span class="textoMay">10:00 AM</span></td></tr>
                                      <tr><td></td><td></td><td style="background:#00a65a;color:#fff;"><span class="textoMay">TALLER NUTICIONAL</span></td><td><span class="textoMay">09:45 AM A 10:30 AM</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">TORRES CASILLAS LINDA XOCHITL</span></td><td><span class="textoMay">10:30 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">CORONADO GALINDO JUAN MANUEL</span></td><td><span class="textoMay">10:40 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MERAZ LOPEZ JOSE AURELIO</span></td><td><span class="textoMay">10:50 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GARCIA MAITRET KAREN</span></td><td><span class="textoMay">11:00 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MIRANDA BAEZA RUTH GUADALUPE</span></td><td><span class="textoMay">11:10 A.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">PEDROZA SOLIS LIZETH MAGDALENA</span></td><td><span class="textoMay">11:20 A.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">GAYTAN DE LEON ANA MARLEN</span></td><td><span class="textoMay">11:30 a.m.</span></td></tr>                         
                                      <tr><td></td><td></td><td><span class="textoMay">CORONADO HERNANDEZ ESMERALDA</span></td><td><span class="textoMay">11:40 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">SAUCEDO GONZALEZ GRISEL ALMA	</span></td><td><span class="textoMay">11:50 A.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">CRUZ ALVAREZ DANIELA ELIZABETH</span></td><td><span class="textoMay">12:00 p.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">Garcia De La Cruz Irasema Del Rosario</span></td><td><span class="textoMay">12:10 p.m.</span></td></tr>-->

                                     


                                      <tr style="background:#DDD5D3;">
                                        <td>5.</td>
                                        <td><b>VALLARTA</b></td>
                                        <td colspan="2"><span class="textoMay"><b>MARTES 5 DE NOVIEMBRE</b></span> </td>                                       
                                      </tr>
                                    <!-- <tr><td></td><td></td><td style="background:#3c8dbc;color:#fff;"><span class="textoMay">TOMA DE MEDIDAS</span></td><td><span class="textoMay">09:00 AM</span></td></tr>
                                    
                                      <tr><td></td><td></td><td><span class="textoMay">BUSTOS NAJERA YAHAIRA </span></td><td><span class="textoMay">09:30 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">ROSALES PELAYO SANDRA ELISABETH</span></td><td><span class="textoMay">09:40 a.m.</span></td></tr>                             
                                      <tr><td></td><td></td><td><span class="textoMay">MARTINEZ RODRIGUEZ MARIA ELENA</span></td><td><span class="textoMay">09:50 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">FIGUEROA PEÑA DALIA DEL CARMEN</span></td><td><span class="textoMay">10:00 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MARTINEZ BECERRA ANGELICA</span></td><td><span class="textoMay">10:10 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MONDRAGON ESPINOZA SILVIA MARISOL</span></td><td><span class="textoMay">10:20 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MALDONADO RODRIGUEZ ELIZABETH ALEJANDRA</span></td><td><span class="textoMay">10:30 a.m.</span></td></tr>
                                      <tr><td></td><td></td><td><span class="textoMay">MONDRAGON ESPINOZA NORMA LETICIA </span></td><td><span class="textoMay">10:40 a.m.</span></td></tr>-->
  
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                        <div class="box-footer">
                       
                        </div>
                      
       </div>
    <?php endif; ?>




      <div class="box collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-youtube-play icono-encabezado"></i> NUTRICIÓN</h3>
                          <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">

                       
                            <div role="tabpanel"> 
                                    <ul class="nav nav-tabs">
                                        <li role="presentation" class="active">
                                            <a href="#nutriologa" aria-controls="nutriologa" role="tab" data-toggle="tab">Nutrióloga</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#informacion" aria-controls="informacion" role="tab" data-toggle="tab">Información</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#talleres" aria-controls="talleres" role="tab" data-toggle="tab">Talleres</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="margin-top: 1%;">
                                        
                                        <div role="tabpanel" class="tab-pane active" id="nutriologa"> 
                                                <div class="box box-success">
                                                  <div class="box-body box-profile">
                                                    <img src="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/mini/XXXXXXXX8529.jpg" class="profile-user-img img-responsive img-circle visor-crow-imagen-mini" alt="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/XXXXXXXX8529.jpg" style="cursor: pointer;">
                                                    <h3 class="profile-username text-center">GABRIELA VALENCIA</h3>
                                                    <p class="textAreaImportante max1000" style="padding:15px;"><?php echo EventosModel::descripcion(357,Tablas::especiales())?></p>
                                                  </div>
                                                </div>
                                        </div>
                              
                                        <div role="tabpanel" class="tab-pane" id="informacion"> 
                                            <div class="box-body col-md-6">
                                                <?php
                                                  echo GestorImagenes::mostrarCarrusel(false);
                                                ?>
                                            </div>

                                            <div class="box-body col-md-6">
                                                <?php
                                                  echo GestorImagenes::mostrarTextoCarrusel(false);
                                                ?>
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="videos"> 
                                            <div class="videoTutoriales">
                                              <div class="sub-videos"><img alt="intranet/videos-nutri/rutina-pierna.mp4" src="views/img/pierna.jpg" class="visor-crow-video"></div>
                                              <div class="sub-videos"><img alt="intranet/videos-nutri/rutina-brazos.mp4" src="views/img/brazo.jpg" class="visor-crow-video"></div>
                                              <div class="sub-videos"><img alt="intranet/videos-nutri/calentamiento6.mp4" src="views/img/cardio6.jpg" class="visor-crow-video"></div>
                                              <div class="sub-videos"><img alt="intranet/videos-nutri/cardio15.mp4" src="views/img/cardio15.jpg" class="visor-crow-video"></div>
                                              <div class="sub-videos"><img alt="intranet/videos-nutri/cardio30.mp4" src="views/img/cardio30.jpg" class="visor-crow-video"></div>
                                              <div class="sub-videos"><img alt="intranet/videos-nutri/gluteo.mp4" src="views/img/gluteo.jpg" class="visor-crow-video"></div>
                                            </div>     
                                        </div>


                                        <div role="tabpanel" class="tab-pane" id="talleres"> 
                                              <div class="max1000">

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
                                                
                                                <?php echo Eventos::talleres();?>
                                            
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


     <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-users icono-encabezado"></i> EQUIPOS</h3>
                          <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">


                            <div class="row">
                              <div class="col-md-8">
                                    <p><h3 style="text-align:center;"><b>REGIOS FIT</b></h3></p>
                                    <p><h4 style="text-align:center;">GANADORES DEL MES DE JUNIO</h4></p>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/ganadorJunio.jpg" class="img-responsive center-block" style="border-radius:10px;box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                              </div>
                              <div class="col-md-4">
                                  <p><h3 style="opacity:0"><b>A</b></h3></p>
                                  <p><h4 style="opacity:0">A</h4></p>
                                  <table class="table table-bordered" style="box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                                      <tr style="background:rgb(0,166,90);color:#fff;box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);">
                                        <th class="text-center">POSICIÓN</th>
                                        <th class="text-center">EQUIPO</th>    
                                      </tr>
                                      <tr>
                                        <td class="text-center">1.</td>
                                        <td><b>REGIOS FIT</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">2.</td>
                                        <td><b>TAPATIOS FIT</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">3.</td>
                                        <td><b>FITNESS SQUAD</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">4.</td>
                                        <td><b>TITANES DE ASESORES</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">5.</td>
                                        <td><b>GOLDEN GIRLS</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">6.</td>
                                        <td><b>LOS INCREIBLES</b></td>
                                      </tr>
                                  </table>
                              </div>
                              <br>
                            </div>


                            <div class="row">
                              <div class="col-md-8">
                                    <p><h3 style="text-align:center;"><b>FITNESS SQUAD</b></h3></p>
                                    <p><h4 style="text-align:center;">GANADORES DEL MES DE JULIO</h4></p>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/ganadorJulio.jpg" class="img-responsive center-block" style="border-radius:10px;box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                              </div>
                              <div class="col-md-4">
                                  <p><h3 style="opacity:0"><b>A</b></h3></p>
                                  <p><h4 style="opacity:0">A</h4></p>
                                  <table class="table table-bordered" style="box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                                      <tr style="background:rgb(0,166,90);color:#fff;box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);">
                                        <th class="text-center">POSICIÓN</th>
                                        <th class="text-center">EQUIPO</th>    
                                      </tr>
                                      <tr>
                                        <td class="text-center">1.</td>
                                        <td><b>FITNESS SQUAD</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">2.</td>
                                        <td><b>GOLDEN GIRLS</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">3.</td>
                                        <td><b>REGIOS FIT</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">4.</td>
                                        <td><b>TAPATIOS FIT</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">5.</td>
                                        <td><b>TITANES DE ASESORES</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">6.</td>
                                        <td><b>LOS INCREIBLES</b></td>
                                      </tr>
                                  </table>
                              </div>
                              <br>
                            </div>

                            <div class="row">
                              <div class="col-md-8">
                                    <p><h3 style="text-align:center;"><b>TAPATIOS FIT</b></h3></p>
                                    <p><h4 style="text-align:center;">GANADORES DEL MES DE AGOSTO</h4></p>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/ganadorAgosto.jpg" class="img-responsive center-block" style="border-radius:10px;box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                              </div>
                              <div class="col-md-4">
                                  <p><h3 style="opacity:0"><b>A</b></h3></p>
                                  <p><h4 style="opacity:0">A</h4></p>
                                  <table class="table table-bordered" style="box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                                      <tr style="background:rgb(0,166,90);color:#fff;box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);">
                                        <th class="text-center">POSICIÓN</th>
                                        <th class="text-center">EQUIPO</th>    
                                      </tr>
                                      <tr>
                                        <td class="text-center">1.</td>
                                        <td><b>TAPATIOS FIT</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">2.</td>
                                        <td><b>GOLDEN GIRLS</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">3.</td>
                                        <td><b>TITANES DE ASESORES</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">4.</td>
                                        <td><b>FITNESS SQUAD</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">5.</td>
                                        <td><b>REGIOS FIT</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">6.</td>
                                        <td><b>LOS INCREIBLES</b></td>
                                      </tr>
                                  </table>
                              </div>
                              <br>
                            </div>


                            <div class="row">
                              <div class="col-md-8">
                                    <p><h3 style="text-align:center;"><b>GOLDEN GIRLS</b></h3></p>
                                    <p><h4 style="text-align:center;">GANADORES DEL MES DE SEPTIEMBRE</h4></p>
                                    <img src="<?php echo Ruta::ruta_server();?>views/img/ganadorSeptiembre.jpeg" class="img-responsive center-block" style="border-radius:10px;box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                              </div>
                              <div class="col-md-4">
                                  <p><h3 style="opacity:0"><b>A</b></h3></p>
                                  <p><h4 style="opacity:0">A</h4></p>
                                  <table class="table table-bordered" style="box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);">
                                      <tr style="background:rgb(0,166,90);color:#fff;box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);">
                                        <th class="text-center">POSICIÓN</th>
                                        <th class="text-center">EQUIPO</th>    
                                      </tr>
                                      <tr>
                                        <td class="text-center">1.</td>
                                        <td><b>GOLDEN GIRLS</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">2.</td>
                                        <td><b>FITNESS SQUAD</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">3.</td>
                                        <td><b>TAPATIOS FIT</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">4.</td>
                                        <td><b>TITANES DE ASESORES</b></td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">5.</td>
                                        <td><b>REGIOS FIT</b></td>
                                      </tr>
                                      <tr style="background:#DDD5D3;">
                                        <td class="text-center">6.</td>
                                        <td><b>LOS INCREIBLES</b></td>
                                      </tr>
                                  </table>
                              </div>
                              <br>
                            </div>


                          <hr>
                            <div class="row">
                            <br>
                              <div class="col-md-4">
                                  <div class="box box-danger">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <!--<p><h4 style="text-align:center;">LOS INCREIBLES</h4></p>-->
                                            <p><h3 style="text-align:center;">LOS INCREIBLES</h3></p>
                                            <p style="font-size:25px;text-align:center;"><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></p>
                                            <br><br><br><br>
                                            <!--<p style="text-align:center;"><i class="fa fa-users text-red fa-3x"></i></p>-->
                                            <img src="<?php echo Ruta::ruta_server();?>views/img/nutri9.jpg" class="img-responsive visor-crow-imagen-nutri center-block" fecha="" position="0" rel="grupo-1" alt="<?php echo Ruta::ruta_server();?>views/img/nutri9.jpg" style="cursor:pointer;">
                                            <p style="text-align:center;"><b>Tesorero: </b>GLADYS DE LA CRUZ</p>
                                            <p style="text-align:center;"><button type="button" value="LOS INCREIBLES" class="btn btn-danger btn-lg botonEquipo" style="-webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);-moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);">Integrantes</button></p>

                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-4">

                                  <div class="box" style="border-top-color: #03bb85;">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                         
                                            <p><h3 style="text-align:center;">TAPATIOS FIT</h3></p>
                                            <p style="font-size:25px;text-align:center;"><span>☆</span><span>☆</span><span style="color:#efb810;">&#9733;</span><span>☆</span><span>☆</span><span>☆</span></p>
                                            <p style="text-align:center;"><b>Apoya a la fundación:</b> ASILO DE ANCIANOS ASUNCIÓN DE MARÍA A.C.</p>
                                            <!--<p style="text-align:center;"><i class="fa fa-users fa-3x" style="color:#03bb85"></i></p>-->
                                            <img src="<?php echo Ruta::ruta_server();?>views/img/logoEquipo1.jpg" class="img-responsive visor-crow-imagen-nutri center-block" fecha="Hogar de retiro y asilo para ancianos en calidad de abandono con necesidad de cuidados." position="1" title="ASILO DE ANCIANOS ASUNCIÓN DE MARÍA A.C." rel="grupo-1" alt="<?php echo Ruta::ruta_server();?>views/img/logoEquipo1.jpg" style="cursor:pointer;">
                                            <p style="text-align:center;"><b>Tesorero: </b>REYNA PACHECO</p>
                                            <p style="text-align:center;"><button type="button" value="TAPATIOS FIT" class="btn btn-default btn-lg botonEquipo" style="background:#03bb85;color:#fff; -webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);-moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);">Integrantes</button></p>
    
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                  
                              </div>
                              <div class="col-md-4">
                                  
                                <div class="box" style="border-top-color: #000;">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                         
                                            <p><h3 style="text-align:center;">TITANES DE ASESORES</h3></p>
                                            <p style="font-size:25px;text-align:center;"><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></p>
                                            <p style="text-align:center;"><b>Apoya a la fundación:</b>CASA HOGAR EL REFUGIO</p>
                                            <!--<p style="text-align:center;"><i class="fa fa-users fa-3x" style="color:#000"></i></p>-->
                                            <img src="<?php echo Ruta::ruta_server();?>views/img/logoEquipo2.jpg" class="img-responsive visor-crow-imagen-nutri center-block" fecha="" position="2" title="CASA HOGAR EL REFUGIO" rel="grupo-1" alt="<?php echo Ruta::ruta_server();?>views/img/logoEquipo2.jpg" style="cursor:pointer;">
                                            <p style="text-align:center;"><b>Tesorero: </b>HUGO RABAGO</p>
                                            <p style="text-align:center;"><button type="button" value="TITANES DE ASESORES" class="btn btn-lg botonEquipo" style="background:#000;color:#fff;-webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);-moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);">Integrantes</button></p>
                                           
                                          </div>
                                        </div>
                                    </div>
                                </div>

                              </div>
                            </div>

                            
                            <div class="row">
                             
                              <div class="col-md-4">

                                  <div class="box" style="border-top-color: #e4007c;">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                         
                                            <p><h3 style="text-align:center;">FITNESS SQUAD</h3></p>
                                            <p style="font-size:25px;text-align:center;"><span>☆</span><span style="color:#efb810;">&#9733;</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></p>
                                            <p style="text-align:center;"><b>Apoya a la fundación:</b> REMAR</p>
                                            <br>
                                            <!--<p style="text-align:center;"><i class="fa fa-users fa-3x" style="color:#e4007c"></i></p>-->
                                            <img src="<?php echo Ruta::ruta_server();?>views/img/logoEquipo3.jpg" class="img-responsive visor-crow-imagen-nutri center-block" title="REMAR" position="3" fecha="Organización No Gubernamental Internacional que ayuda a niños y niñas marginados con problemas de maltrato, madres solteras y jóvenes con problemas de adicciones." rel="grupo-1" alt="<?php echo Ruta::ruta_server();?>views/img/logoEquipo3.jpg" style="cursor:pointer;">
                                            <p style="text-align:center;"><b>Tesorero: </b>GRISELDA GUTIERREZ</p>
                                            <p style="text-align:center;"><button type="button" value="FITNESS SQUAD" class="btn btn-lg botonEquipo" style="background:#e4007c;color:#fff;-webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);-moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);">Integrantes</button></p>

                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                  
                              </div>
                              <div class="col-md-4">
                                  
                                <div class="box" style="border-top-color: #0F0C68;">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                         
                                            <p><h3 style="text-align:center;">REGIOS FIT</h3></p>
                                            <p style="font-size:25px;text-align:center;"><span style="color:#efb810;">&#9733;</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></p>
                                            <p style="text-align:center;"><b>Apoya a la fundación:</b> IMPERIO DE AMOR A.C</p>
                                            <!--<p style="text-align:center;"><i class="fa fa-users fa-3x" style="color:#0F0C68"></i></p>-->
                                            <img src="<?php echo Ruta::ruta_server();?>views/img/logoMonterrey.jpg" class="img-responsive visor-crow-imagen-nutri center-block" title="IMPERIO DE AMOR A.C" position="4" fecha="Tenemos la misión de rescatar a niñas, niños y adolescentes en situaciones de riesgo, brindar educación, alimento, vestimenta, albergue, apoyo psicológico, emocional y espiritual. Buscamos abrirle las puertas a más infantes en situación de abandono, para que tengan un desarrollo sano y que el día de mañana, sean mujeres y hombres de éxito, capaces de enfrentar al mundo." rel="grupo-1" alt="<?php echo Ruta::ruta_server();?>views/img/logoMonterrey.jpg" style="cursor:pointer;">
                                            <p style="text-align:center;"><b>Tesorero: </b>NIDIA MANRIQUEZ</p>
                                            <p style="text-align:center;"><button type="button" value="REGIOS FIT" class="btn btn-lg botonEquipo" style="background:#0F0C68;color:#fff;-webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);-moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);">Integrantes</button></p>
                                            
                                          </div>
                                        </div>
                                    </div>
                                  </div>

                              </div>

                               <div class="col-md-4">
                                  
                                  <div class="box" style="border-top-color: #E8B110;">
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                         
                                            <p><h3 style="text-align:center;">GOLDEN GIRLS</h3></p>
                                            <p style="font-size:25px;text-align:center;"><span>☆</span><span>☆</span><span>☆</span><span style="color:#efb810;">&#9733;</span><span>☆</span><span>☆</span></p>
                                            <p style="text-align:center;"><b>Apoya a la fundación:</b><span class="textoMay">Centro de Atención Integral al Adulto Mayor</span></p>
                                            <!--<p style="text-align:center;"><i class="fa fa-users fa-3x" style="color:#E8B110"></i></p>-->
                                            <img src="<?php echo Ruta::ruta_server();?>views/img/logoVallarta.jpg" class="img-responsive visor-crow-imagen-nutri center-block" rel="grupo-1" position="5" title="CENTRO DE ATENCIÓN INTEGRAL AL ADULTO MAYOR" fecha="" alt="<?php echo Ruta::ruta_server();?>views/img/logoVallarta.jpg" style="cursor:pointer;">
                                            <p style="text-align:center;"><b>Tesorero: </b>NORMA MONDRAGON</p>
                                            <p style="text-align:center;"><button type="button" value="GOLDEN GIRLS" class="btn btn-lg botonEquipo" style="background:#E8B110;color:#fff;-webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);-moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.65);">Integrantes</button></p>
                                           
                                          </div>
                                        </div>
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


 <!-- Default box -->
 <?php if(Eventos::verificarMiConsulta($_SESSION['identificador'])): ?>
      <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-folder-open-o icono-encabezado"></i> MIS RESULTADOS</i></h3>
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-plus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
         
            <?php echo Eventos::datosUsuario($_SESSION['identificador'],true); ?>
         
        </div>

        <!--Ventana modal-->
        <div class="modal fade bd-example-modal-lg" id="modalLeche" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                     <div class="modal-header" style="background:#92CDDC">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>LECHE</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/leche.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalCereal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header" style="background:#C0B2D2">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>CEREALES</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/cereales.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalLeguminosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#FABF8F">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>LEGUMINOSAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/leguminosas.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalCarne" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header" style="background:#EEECE1">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>CARNES</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/carnes.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalFruta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#FF99CC">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>FRUTAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/frutas.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

            <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalVerdura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#BFE985">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>VERDURAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/verduras.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->

            <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg" id="modalGrasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#C4BC96">
                           <h5 class="modal-title" id="exampleModalLongTitle"><b>GRASAS</b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                    <img src="views/img/grasas.jpg" >
                                </div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
          <!--Ventana modal-->


        <!-- /.box-body -->
        <div class="box-footer"></div>
        <!-- /.box-footer-->
      </div>
<?php endif;?>
      <!-- /.box -->


       <!--Ventana modal-->
       <div class="modal fade bd-example-modal-lg" id="listaEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                     <div id='claseEquipos' class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Integrantes del equipo: <b><span id="nombreMiequipo"></span></b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 estilos-centrar">
                                   <div id="cargarIntegrantes"></div>
                                </div>
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