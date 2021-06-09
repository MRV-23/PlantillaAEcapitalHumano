  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:flex;justify-content:start;align-items:center;"><div class="icono-encabezado2" style="margin-right:5px;"><i class="fa fa-phone" style="padding-left:5px;"></i><i class="fa fa-commenting" style="padding-right:5px;"></i></div> LÍNEA DE AYUDA</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
                <!-- Formulario-->
                <form method="POST" style="margin-top:2%;" id="formularioAyuda">
                    <div style="max-width:900px;margin:auto;">
                        <!-- primera fila -->
                          
                            <div class="row">
                              <div class="col-md-6">
                                <label for="passActual">1.-Categoria</label> <i class="fa fa-check-circle text-green"></i>
                                <select class="form-control textoMay" id="categoriaAyuda" name="categoria" required>
                                    <option></option>
                                    <option value="1">Denuncia confidencial</option>
                                    <option value="2">Crisis de estres</option>
                                    <option value="3">Propuesta de mejora o capacitación</option>
                                </select>
                              </div>
                            </div>
                      
                         
                          <div style="border:1px dashed rgba(200,200,200,.8);margin:15px 0;padding:10px;display:none;" id="primerSeccionAyuda">
                              
                              <div class="row" style='margin-bottom:-10px;'>
                                  <div class="col-md-8 text-center">
                                    <b>Pregunta</b>
                                  </div>
                                  <div class="col-md-4 text-center">
                                    <b>Respuesta</b>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 text-center">
                                    </div>
                                    <div class="col-md-2 text-center">
                                      <b>Sí</b>
                                    </div>
                                    <div class="col-md-2 text-center">
                                      <b>No</b>
                                    </div>
                                </div>

                                <hr>


                        <div id="seccionContestada">
                              <div class="row">
                                    <div class="col-md-12">
                                      <p><b>I.- Acontecimiento traumático severo</b></p>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-md-8">
                                      <p>¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:</p>
                                    </div>
                                    <div class="col-md-2 text-center">
                                      
                                    </div>
                                    <div class="col-md-2 text-center">
                                      
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-md-8" style="padding-left:35px;margin-bottom:15px;">
                                    
                                         1.- Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?
                                        
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio1" value="1">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio1" value="0">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8" style="padding-left:35px;margin-bottom:15px;">
                                      
                                       2.- Asaltos?
                                        
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio2" value="1">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2 text-center">
                                      <label class="containerx">
                                          <input type="radio" name="radio2" value="0">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8" style="padding-left:35px;margin-bottom:15px;">
                                      
                                          3.-Actos violentos que derivaron en lesiones graves?
                                      
                                      </ul>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio3" value="1">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio3" value="0">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8" style="padding-left:35px;margin-bottom:15px;">
                                     
                                        4.-Secuestro?
                                        
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio4" value="1">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio4" value="0">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8" style="padding-left:35px;margin-bottom:15px;">
                                     
                                      5.- Amenazas?, o
                                        
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio5" value="1">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio5" value="0">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8" style="padding-left:35px;margin-bottom:15px;">
                              
                                        6.-Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?
                                        
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio6" value="1">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="containerx">
                                          <input type="radio" name="radio6" value="0">
                                          <span class="checkmarkx"></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                      </div>




                            <div id="segundaSeccionAyuda">


                                    <div class="row">
                                          <div class="col-md-12">
                                            <p><b>II.- Recuerdos persistentes sobre el acontecimiento (durante el último mes):</b></p>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>7.-¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio7" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio7" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>8.-¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio8" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio8" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <hr>





                                      <div class="row">
                                          <div class="col-md-12">
                                            <p><b>III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes):</b></p>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>9.-¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio9" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio9" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>10.-¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio10" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio10" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div><div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>11.-¿Ha tenido dificultad para recordar alguna parte importante del evento?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio11" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio11" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>12.-¿Ha disminuido su interés en sus actividades cotidianas?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio12" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio12" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div><div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>13.-¿Se ha sentido usted alejado o distante de los demás?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio13" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio13" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>14.-¿Ha notado que tiene dificultad para expresar sus sentimientos?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio14" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio14" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>15.-¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio15" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio15" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <hr>
                                      


                                      <div class="row">
                                          <div class="col-md-12">
                                            <p><b>IV.- Afectación (durante el último mes):</b></p>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>16.-¿Ha tenido usted dificultades para dormir?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio16" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio16" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>17.-¿Ha estado particularmente irritable o le han dado arranques de coraje?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio17" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio17" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>18.-¿Ha tenido dificultad para concentrarse?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio18" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio18" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>19.-¿Ha estado nervioso o constantemente en alerta?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio19" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio19" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-bottom:15px;">
                                          <div class="col-md-8">
                                            <p>20.-¿Se ha sobresaltado fácilmente por cualquier cosa?</p>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio20" value="1">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                          <div class="col-md-2 text-center">
                                              <label class="containerx">
                                                <input type="radio" name="radio20" value="0">
                                                <span class="checkmarkx"></span>
                                              </label>
                                          </div>
                                      </div>
                              </div>

                          </div>
                           
                        
                          <!-- segunda fila -->
                            
                            <div class="row" style="display:none;" id="comentariosAyudaDiv">
                              <div class="col-md-12">
                                <br>
                                <label for="">2.-Comentarios:</label> <i class="fa fa-check-circle text-green" id="obligatorioComentarios" style="display:none;"></i>
                                <textarea name="comentariosAyuda" id ="comentariosAyuda" class="form-control textAreaImportante" rows="8" style="resize:vertical;"></textarea>
                              </div>
                            </div>
                            <br>
  
                  </div><!--max1000-->
                      
                        <hr>
                        <div class="estilos-centrar">
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Continuar</button>
                          <button type="reset" class="btn btn-danger" id="botonCancelar"><i class="fa fa-times"></i> Cancelar</button>  
                        </div>
                </form>
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
  









     