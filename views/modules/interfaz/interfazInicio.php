
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">¬°BIENVENIDO!</i></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
          <?php if($_SESSION['identificador2'] == 6 || $_SESSION['identificador'] == 180 || $_SESSION['identificador2'] == 4):?>
            <div class="col-md-12">
              <div class="box box-warning" style="border-top-color:#5DC1B9">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-clock-o icono-encabezado-yellow" style="background:#5DC1B9"></i> Control de asistencias</h3>
                    <div class="box-tools pull-right">
                      <!--<span class="label label-danger">8 New Members</span>-->
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                </div>
                <div role="tabpanel">
                <!-- -->
                  <ul class="nav nav-tabs">

                      <li role="presentation" class="active">
                          <a href="#captura" aria-controls="captura" role="tab" data-toggle="tab">Reloj Asistencias</a>
                      </li>

                      <li role="presentation">
                          <a href="#consultar" aria-controls="Consultar" role="tab" data-toggle="tab">Ops 1</a>
                      </li>                
                      <li role="presentation">
                          <a href="#descargarchivos" aria-controls="descargarchivos " role="tab" data-toggle="tab">Ops 2</a>
                      </li>
                  </ul>
                  <!-- -->
                  <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="captura">
                        <div class="box-body col-md-6 text-center">
                          <div style="background:#333;margin:15px;border-radius:10px;border:4px solid #000;"> 

                            <div class="col-md-12 estilos-centrar fondo" style="margin-bottom:30px;">
                              <div style="display:none;" id="horaChecador"><?php echo date("Y-n-d H:i:s w A"); ?></div>
                                <div class="row form-group widget" >
                                    <div class="col-md-12 fecha fondo" >
                                        <h4 id="diaSemana" class="diaSemana "></h4>
                                        <h4 id="dia" class="dia"></h4>
                                        <h4>de</h4>
                                        <h4 id="mes" class="mes"></h4>
                                        <h4>del</h4>
                                        <h4 id="anio" class="anio"></h4>
                                    </div>
                                </div>
                              <div class="row form-group fondo" >    
                                  <div class="col-md-12 reloj" >
                                      <p id="horas" class="hora relojNumeros"></p> <b class="puntos">:</b>
                                      <p id="minutos" class="minutos relojNumeros"></p>
                                      <div class="cajaSegundos" > <b class="puntos">:</b>
                                          <p id="segundos" class="segundos relojNumeros"></p>
                                          <p id="ampm" class="ampm relojNumeros"></p>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <div>
                              <img src="views/img/ledoff.png" alt="led" id="led1">
                              <img src="views/img/ledoff.png" alt="led" id="led2">
                              <img src="views/img/ledoff.png" alt="led" id="led3">
                            </div>

                            <div>
                              <button type="button" class="btn" style="border-radius:20px;cursor:pointer;background:#5DC1B9;border:3px solid #dd4b39;margin-bottom:5px;margin-top:15px;" id="btnAsistencia" ><img src="views/img/finger.png" alt="digital" width="100px" style="border-radius:20px;"></button>
                              <button type="button" class="btn" style="dysplay:none;border-radius:20px;background:#CBCBCB  ;border:3px solid #dd4b39;margin-bottom:5px;margin-top:15px;" id="restringido" ><img src="views/img/ban.png" alt="digital" width="100px" style="border-radius:20px;"></button>
                              <br>
                              <span id='spanmobile' style="color:#dd4b39;font-size:12px;margin-bottom:10px;">Presiona durante 2 segundos</span>
                            </div>

                          </div>

                        </div>


                        <div class="box-body col-md-6">
                          <div class="box-body" style="max-height:280px!important;min-height:280px!important;overflow:scroll;">
                            <h4 class="text-center">Asistencias del d√≠a</h4>
                              <ul class="products-list product-list-in-box" id="listaAsistencias">
                                <?php echo Asistencias::mostrarRegistros();?>
                              </ul>
                          </div>
                        </div>

                    </div><!---fin de tap reloj--->
                    <!-- -->
                    <div role="tabpanel" class="tab-pane " id="consultar">
                    <!-- -----descarga de reportes ops1 inicio------- --->
                    <!--<div class="box box-info">------ --->

                          <div class="box-body">
                            <form method="post">  
                              <div class="max1000">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label>Fecha inicial</label>
                                        <i class="fa fa-check-circle text-green"></i>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                            <i class="fa fa-calendar-plus-o"></i>        
                                            </div>
                                            <input type="date" class="textoMay form-control" name="fechaConsultaInicial" value="2021-03-30">
                                           <!-- <input type="date" class="textoMay form-control" name="fechaConsultaInicial" value="<?php echo date("Y-m-d");?>"> -->
                                        </div>
                                      </div>
          
                                      <div class="col-md-6">
                                        <label>Fecha final</label>
                                        <i class="fa fa-check-circle text-green"></i>
                                        <div class="input-group">
                                            <div class="input-group-addon infocolor" >
                                            <i class="fa fa-calendar-plus-o"></i>        
                                            </div>
                                            <!--<input type="date" class="textoMay form-control" name="fechaConsultaFinal" value="2021-04-23"> -->
                                            <input type="date" class="textoMay form-control" name="fechaConsultaFinal" value="<?php echo date("Y-m-d");?>"> 
                                      </div>
                                    </div>
                                    <hr>
                                    <hr>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 estilos-centrar">
                                            <button type="submit" name="reportePersonalAsistencias" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                                            <button type="submit" id='api'name="api" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i>API FUNCION</button> 
                                        </div>
                                    </div>
                                  </div>
                              </div>    
                            </form>  

                          </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- ----fin de ops 1 reporte aistencioas-------- --->
                    <!--</div>--- ops1-->
                    <div role="tabpanel" class="tab-pane " id="descargarchivos">
                      <h4>aqui van los usuarios con filtro de departamento se desplasara otro sewlect y se mostraran los resgistros de asistencia del dia pero solo es opscional </h4>
                    </div><!--- ops1-->
                   <!--  -->
                  </div><!--- fin tap content class-->

                </div>
              </div>
            </div>
          <?php endif;?>

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-info collapsed-box">
                    <?php 
                      $cumpleanos = new Inicio();
                      $cumpleanos->cumpleanos();
                    ?>
              </div>
              <!--/.box -->
            </div>

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-success collapsed-box">
                    <?php 
                      $cumpleanos = new Inicio();
                      $cumpleanos->aniversarios();
                    ?>
              </div>
              <!--/.box -->
            </div>


            <div class="col-md-12">
              <div class="box box-warning">
                      <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-newspaper-o icono-encabezado-yellow"></i> Noticias y eventos</h3>

                          <div class="box-tools pull-right">
                            <!--<span class="label label-danger">8 New Members</span>-->
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                          </div>
                      </div>
                        
                    <!-- /.box-header -->
                        <div class="box-body col-md-6">
                          <?php
                              echo GestorImagenes::mostrarCarrusel();
                            ?>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body col-md-6">
                            <?php
                                /*echo '<video src="intranet/videos-nutri/video-covid.mp4" type="video/mp4" width="100%" id="video-covid" muted controls autoplay loop>
                                        Tu navegador no soporta HTML5 video.
                                      </video>';*/
                            
                              //echo GestorImagenes::mostrarTextoCarrusel();
                            ?>
                        </div>
                        <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>


            <div class="col-md-12">
              <div class="box box-danger"><!--collapsed-box-->
                      <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-check icono-encabezado-red"></i> Politicas Grupo Asesores Empresariales</h3>

                          <div class="box-tools pull-right">
                            <!--<span class="label label-danger">8 New Members</span>-->
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                          </div>
                        </div>
                        
                    <!-- /.box-header -->
                        <!-- /.box-header -->
                        <div class="box-body col-md-12">
                          <div class="box-group" id="accordion3">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3">
                                  POL√ćTICAS COVID-19
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne3" class="panel-collapse collapse in">
                                <div class="box-body">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <p><b>1. RESPONSIVA COVID-19: </b></p>
                                      <div class="btn btn-default btn-file">
                                          <i class="fa fa-file-pdf-o text-red"></i>
                                          <a href="views/pdf/politicas/RESPONSIVA-COVID-19.pdf" download="RESPONSIVA-COVID-19">Descargar</a>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <p><b>2. PROTOCOLOS DE INGRESO DE PERSONAL Y VISITANTES: </b></p>
                                      <div class="btn btn-default btn-file">
                                          <i class="fa fa-file-pdf-o text-red"></i>
                                          <a href="views/pdf/politicas/PROTOCOLOS-DE-INGRESO-DE-PERSONAL-Y-VISITANTES.pdf" download="PROTOCOLOS-DE-INGRESO-DE-PERSONAL-Y-VISITANTES">Descargar</a>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <p><b>3. POL√ćTICA DE LIMPIEZA Y DESINFECCI√ďN: </b></p>
                                      <div class="btn btn-default btn-file">
                                          <i class="fa fa-file-pdf-o text-red"></i>
                                          <a href="views/pdf/politicas/POLITICA-DE-LIMPIEZA-Y-DESINFECCION.pdf" download="POLITICA-DE-LIMPIEZA-Y-DESINFECCION">Descargar</a>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <p><b>4. GU√ćA DE ACTUACI√ďN PARA CASOS EN QUE UN TRABAJADOR MANIFIESTE SINTOMAS DE COVID-19: </b></p>
                                      <div class="btn btn-default btn-file">
                                          <i class="fa fa-file-pdf-o text-red"></i>
                                          <a href="views/pdf/politicas/GUIA-ACTUACION-SINTOMAS-COVID-19.pdf" download="GUIA-ACTUACION-SINTOMAS-COVID-19">Descargar</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--
                            <div class="panel box">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2">
                                  POLITICA DE INCENTIVO A LA PRODUCTIVIDAD: BONO PLUS
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne2" class="panel-collapse collapse">
                                <div class="box-body">
                                  <p><b>1. OBJETIVO: </b></p>
                                  <p>Se establece como INCENTIVO BIMESTRAL, el cual corresponde a 1 d√≠a de descanso adicional, el cual resulta de un desempe√Īo extraordinario, donde se genera un Plus o Extra en sus funciones.</p>
                                  <br>
                                  <p><b>2. ALCANCE: </b></p>
                                  <p>Aplicable a todo el personal que labora en la empresa con excepci√≥n de Becarios, Practicantes, Auxiliar de Limpieza y personal de Medio tiempo.</p>
                                  <br>
                                  <p><b>3. LINEAMIENTOS PARA DISFRUTAR EL INCENTIVO: </b></p>
                                  <p><b>A)</b> El Incentivo se otorga a las personas que alcancen resultados sobresalientes. Se considera EVALUACION SOBRESALIENTE, al evaluado que obtenga una Calificaci√≥n Bimestral MAYOR a 90.</p>
                                  <p><b>B)</b> No se deber√° de tener 3 Retardos acumulados en el Bimestre, se considerara retardo las omisiones de registros de entrada u omisi√≥n de env√≠os de correos de asistencia.</p>
                                  <p><b>C)</b> No deber√°s tener Faltas injustificadas.</p>
                                  <p><b>D)</b> Deber√°s haber laborado todo el bimestre.</p>
                                  <p><b>E)</b> S√≥lo se considerara un Permiso Justificado de Retardos por bimestre, el resto de los permisos quedar√°n invalidados y ser√°n considerados como Retardos para efectos de Bono Plus.</p>
                                  <p><b>F)</b> Para Disfrutar el D√≠a y/o Tiempo de descanso, deber√° estar PLANEADO con m√≠nimo 7 d√≠as de anticipaci√≥n y bajo PREVIA AUTORIZACION del Jefe Inmediato y Recursos Humanos, con el objetivo de no afectar la operaci√≥n y/o pendientes</p>
                                  <p><b>G)</b> El D√≠a y/o Tiempo NO se podr√° disfrutar previo o seguido a d√≠as y/o puentes festivos estipulados.</p>
                                  <p><b>H)</b> El D√≠a y/o Tiempo NO se podr√° disfrutar previo o seguido de un descanso autorizado por concepto de Vacaciones.</p>
                                  <p><b>I)</b> El D√≠a y/o Tiempo NO es acumulable, por tanto en caso de no ser disfrutado dentro del Bimestre posterior al Periodo Evaluado, en autom√°tico se perder√° el Incentivo.</p>
                                  <p><b>J)</b> Por ning√ļn motivo el Incentivo podr√° ser entregado o cambiado en Efectivo.</p>
                                  <p><b>K)</b> El D√≠a y/o Tiempo NO podr√° disfrutarse FRACCIONADO, es decir solo podr√° ser autorizado en un solo evento.</p>
                                  <p><b>L)</b> Queda estrictamente prohibido solicitar Bono plus para justificar una Falta, independiente de la circunstancia no est√° autorizado.</p>
                                  <p><b>K)</b> Para disfrutar el Incentivo se deber√° ENTREGAR el Multiformato MRH01 autorizado por Recursos Humanos, como soporte del d√≠a y/o tiempo a disfrutar, llenado previamente y con las firmas correspondientes.</p>
                                  <br>
                                  <p><b>4. CONSIDERACIONES: </b></p>
                                  <p>El Jefe Directo estar√° a cargo de Evaluar la Productividad + Plus que la persona haya alcanzado en el periodo que corresponda, as√≠ mismo es responsable de entregar las evaluaciones en tiempo y forma de acuerdo a las fechas se√Īalas en la presente pol√≠tica.</p>
                                  <p>Es importante que el jefe Directo evalu√© a su personal de manera puntual, con el objetivo de medir, elevar y mejorar el desempe√Īo del personal. Por tanto el Jefe Directo es un factor importante para cumplir con esta Pol√≠tica.</p>
                                  <p>Todas las Evaluaciones ser√°n revisadas y analizadas por Recursos Humanos con el objetivo de vigilar que se cumplan los lineamientos establecidos de forma objetiva.</p>
                                  <p>En cualquier momento las calificaciones otorgadas al personal deber√°n tener la capacidad de ser evidenciadas con hechos, documentos o testimonios, pues se busca que las mismas sean totalmente objetivas e imparciales.</p>
                                  <p>Corresponde a Recursos Humanos la coordinaci√≥n de la entrega de evaluaciones, as√≠ como el archivo de las mismas y la atenci√≥n de posibles aclaraciones.</p>
                                  <p>Por tanto para seguir disfrutando los beneficios de la Presente Pol√≠tica e Incentivo se solicita a cada Jefe Directo y Personal Evaluado seguir los lineamientos estipulados y con esto asegurar el cumplimiento de los objetivos por los cuales fue creada.</p>
                                  <br>
                                  <p><b>5. VIGENCIA DE LA POLITICA: </b></p>
                                  <p>La Pol√≠tica se establece para el a√Īo 2018 y podr√° ser modificada total o parcialmente por cambiar las circunstancias en que ha sido establecida.</p>
                                  <div class="btn btn-default btn-file">
                                      <i class="fa fa-file-pdf-o text-red"></i>
                                      <a href="views/pdf/politicas/INCENTIVO-BONO-PLUS-2018.pdf" download="INCENTIVO-BONO-PLUS-2018">Descargar</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel box">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2">
                                  BONO DE PRODUCTIVIDAD
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo2" class="panel-collapse collapse">
                                <div class="box-body">
                                <p><b>1. OBJETIVO: </b></p>
                                <p>Incentivar al personal que cumple con los objetivos y resultados del puesto desempe√Īado, promoviendo as√≠ una mejora continua en su desarrollo profesional.</p>
                                <br>
                                <p><b>2. ALCANCE: </b></p>
                                <p>La presente pol√≠tica aplica para todo el personal que labor√© en Asesores Empresariales.</p>
                                <br>
                                <p><b>3. CONDICIONES: </b></p>
                                <p><b>A)</b> El empleado deber√° contar con una antig√ľedad m√≠nima de 6 meses para poder participar en el Bono de Productividad.</p>
                                <p><b>B)</b> En caso de no haber laborado todo el a√Īo natural 2018, se har√° el c√°lculo del Bono de Productividad sobre la parte proporcional de su fecha de ingreso.</p>
                                <p><b>C)</b> En caso de retirarse de la compa√Ī√≠a por decisi√≥n propia o cualquier otra circunstancia antes del 31 de Enero de 2019, no recibir√° el Bono de Productividad aun y que haya logrado los objetivos se√Īalados.</p>
                                <p><b>D)</b> Ser√° obligatorio que la persona registre su Entrada y Salida a trav√©s de los medios previamente autorizados.</p>
                                <p><b>E</b>) El Bono de Productividad se determinara y pagara con base al c√°lculo de:
                                  <ol>
                                    <li><b>Incidencias:</b> Retardos y Faltas acumuladas en el 2018</li>
                                    <li><b>Evaluaciones de Productividad Bimestrales</b>, las cuales se aplicar√°n a cada persona durante el periodo 2018 por parte de sus jefes inmediatos.</li>
                                  </ol>
                                </p>
                                <br>
                                <p><b>4. CALCULO DE BONO DE PRODUCTIVIDAD: </b></p>
                                <p>El c√°lculo del Bono de Productividad esta determinado con base a las Incidencias, las Evaluaciones de Productividad y las Evaluaciones del cliente interno que presente el personal durante el Periodo 2018, siendo de la siguiente manera:</p>
                                <p><b>A) INCIDENCIAS: </b></p>
                                <p><b>A.1)</b> Las faltas generadas por retardos ser√°n derivadas de la acumulaci√≥n de 3 retardos injustificados de manera Bimestral los cuales ser√°n de acuerdo al conteo que indica la Pol√≠tica de Puntualidad y Asistencia (Vigente) (1. Ene.-Feb., 2. Mar.-Abr., 3. May.-Jun., 4. Jul.-Ago., 5. Sep.-Oct., 6. Nov.-Dic.).</p>
                                <br>

                                <div class="box-body table-responsive no-padding">
                                  <table class="table table-hover">
                                    <tr>
                                      <th>Faltas Durante el Periodo 2018</th>
                                      <th>Porcentaje de Bono de Productividad 2018</th>
                                      <th></th>
                                    </tr>
                                    <tr>
                                      <td>0</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-green">100%</span></td>
                                    </tr>
                                    <tr>
                                      <td>1</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-green">90%</span></td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-primary" style="width: 80%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-primary" style="width: 70%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-yellow" style="width: 60%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-red">50%</span></td>
                                    </tr>
                                    <tr>
                                      <td>A partir de 6</td>
                                      <td> 
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar progress-bar-danger" style="width: 0%"></div>
                                        </div>
                                      </td>
                                      <td><span class="badge bg-red">0%</span></td>
                                    </tr>
                                    <tr>
                                      <td>3 retardos Injustificados (Bimestral) =</td>
                                      <td> 
                                      1 Falta Injustificada (Esta se va acumulando al Periodo Anual)
                                      </td>
                                      <td></td>
                                    </tr>
                                  </table>
                                </div>


                                <p><b>A.2)</b> A partir de la sexta falta injustificada o retardos injustificados que generen faltas, ser√°n estos acumulados al periodo anual 2018, Asesores Empresariales NO otorgar√° a la persona ning√ļn porcentaje correspondiente al Bono de Productividad.</p>
                                <p><b>B) PRODUCTIVIDAD: </b></p>
                                <p><b>B.1)</b> El Bono de Productividad estar√° tambi√©n determinado en base a la puntuaci√≥n obtenida de las Evaluaciones de Desempe√Īo que fueron realizadas de manera Bimestral en el periodo 2018 (1. Enero-Febrero 2018, 2. Marzo-Abril 2018, 3. Mayo-Junio 2018, 4. Julio-Agosto 2018, 5. Septiembre-Octubre 2018, 6. Noviembre-Diciembre 2018).</p>
                                <p><b>B.2)</b> Se realizara una suma de los porcentajes obtenidos en las evaluaciones y el resultado se ubicara dentro de los 6 supuestos se√Īalados en la siguiente tabla, de esta manera se determinar√° el monto a otorgar por parte de Asesores Empresariales.</p>
                                
                                <br>
                                <div class="box-body table-responsive no-padding">
                                  <table class="table table-hover">
                                    <tr>
                                      <th>De 59% o menos</th>
                                      <th>De 60% a 64%</th>
                                      <th>De 65% a 74%</th>
                                      <th>De 75% a 85%</th>
                                      <th>De 86% a 95%</th>
                                      <th>De 96% a 100%</th>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-red">0%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                    </tr>
                                  </table>
                                </div>

                                <br>
                                <p><b>Ejemplo: </b></p>
                                <div class="box-body table-responsive no-padding">
                                  <table class="table table-hover">
                                    <tr>
                                      <th>No. evaluaci√≥n</th>
                                      <th>Fecha</th>
                                      <th>Porcentajes obtenidos</th>
                                    </tr>
                                    <tr>
                                      <td>1 ra.</td>
                                      <td>Ene ‚Äď Feb</td>
                                      <td><span class="badge bg-light-blue">78%</span></td>
                                    </tr>
                                    <tr>
                                      <td>2 da.</td>
                                      <td>Mar ‚Äď Abr</td>
                                      <td><span class="badge bg-light-blue">87%</span></td>
                                    </tr>
                                    <tr>
                                      <td>3 ra.</td>
                                      <td>May ‚Äď Jun</td>
                                      <td><span class="badge bg-light-blue">79%</span></td>
                                    </tr>
                                    <tr>
                                      <td>4 ta.</td>
                                      <td>Jul ‚Äď Ago</td>
                                      <td><span class="badge bg-light-blue">88%</span></td>
                                    </tr>
                                    <tr>
                                      <td>5 ta</td>
                                      <td>Sept ‚Äď Oct</td>
                                      <td><span class="badge bg-green">95%</span></td>
                                    </tr>
                                    <tr>
                                      <td>6 ta</td>
                                      <td>Nov ‚Äď Dic</td>
                                      <td><span class="badge bg-light-blue">89%</span></td>
                                    </tr>
                                    <tr>
                                      <td><b>Suma total</b></td>
                                      <td></td>
                                      <td><span class="badge bg-light-blue">86%</span></td>
                                    </tr>
                                    <tr>
                                      <td><b>Calificaci√≥n de Productividad</b></td>
                                      <td></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                    </tr>
                                  </table>
                                </div>

                                <br>
                                <p><b>C)</b> Una vez obtenido el porcentaje de las Evaluaciones de Desempe√Īo e Incidencias generadas en el periodo 2018, se tomar√°n ambas calificaciones las cuales en base a la presente tabla se determinar√° la calificaci√≥n final de Productividad.</p>
                                
                                <br>
                                <div class="box-body table-responsive no-padding">
                                  <table class="table table-hover">
                                    <tr>
                                      <th><b>CALIFICACION INCIDENCIAS</b></th>
                                      <th><b>CALIFICACION PRODUCTIVIDAD</b></th>
                                      <th><b>% BONO DE RESULTADOS FINAL</b></th>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-green">95%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-light-blue">85%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-light-blue">85%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">75%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-light-blue">75%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-yellow">65%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>

                                    <tr>
                                      <td><span class="badge bg-red">50%</span></td>
                                      <td><span class="badge bg-green">100%</span></td>
                                      <td><span class="badge bg-light-blue">75%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-red">50%</span></td>
                                      <td><span class="badge bg-green">90%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-red">50%</span></td>
                                      <td><span class="badge bg-light-blue">80%</span></td>
                                      <td><span class="badge bg-yellow">65%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-red">50%</span></td>
                                      <td><span class="badge bg-light-blue">70%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-red">50%</span></td>
                                      <td><span class="badge bg-yellow">60%</span></td>
                                      <td><span class="badge bg-red">55%</span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="badge bg-red">0%</span></td>
                                      <td><span class="badge bg-red">0%</span></td>
                                      <td><span class="badge bg-red">0%</span></td>
                                    </tr>
                                  </table>
                                </div>
                                
                                <br>
                                <p>Como se menciona anteriormente, si la persona suma 6 o m√°s faltas en el a√Īo o tiene menos de 60% de resultados de las Evaluaciones de Productividad, como consecuencia, no obtiene ning√ļn porcentaje de Bono de Productividad por parte de Asesores Empresariales.</p>
                                <br>
                                <p><b>5. VIGENCIA DE LA POLITICA: </b></p>
                                <P>La Pol√≠tica se establece para el a√Īo 2018 y podr√° ser modificada total o parcialmente por cambiar las circunstancias en que ha sido establecida.</P>
                                <div class="form-group">
                                  <div class="btn btn-default btn-file">
                                    <i class="fa fa-file-pdf-o text-red"></i>
                                    <a href="views/pdf/politicas/BONO-PRODUCTIVIDAD-2018.pdf" download="BONO-PRODUCTIVIDAD-2018">Descargar</a>
                                  </div>
                                </div>
                                </div>
                              </div>
                            </div>
                            -->
                        </div>
                      </div>
                        <!-- /.box-body -->
              </div>
              <!-- /.box -->
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