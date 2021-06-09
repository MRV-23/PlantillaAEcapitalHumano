<?php

Class Evaluaciones{

    public static function cargarEncuesta(){

        $iniciar = ' <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <p style="font-size:25px;text-align:center;">
                                Asesores Empresariales agradece su participación en la realización de la siguiente encuesta con el propósito de mejorar los procesos de trabajo aplicados a bien de la empresa y sus colaboradores.
                            </p>
                            <p style="text-align:center;">
                                <img src="'. Ruta::ruta_server().'views/img/logo-giro.png" alt="">
                            </p>
                        </div>
                    </div>';


       return '<div class="modal fullscreen-modal fade bd-example-modal-lg fade" id="modalMostrarEvaluacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           
                            <div class="modal-header" style="background:#28a745;color:#fff;">
                                
                                <div class="modal-title col-md-4">
                                    <h3><b>Encuesta GIRO</b></h3>
                                </div>

                                <div class="modal-title col-md-4" style="display:flex;align-items;justify-content: center;">
                                    <span id="temporizadorEncuesta" style="background:rgba(0,0,0,0.5);padding:15px;font-size:25px;border:2px solid #000;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                </div>

                                <div class="modal-title col-md-4 text-right">
                                    <img src="'. Ruta::ruta_server().'views/img/asesores.png" alt="">
                                </div>
                            </div>

                            <div class="modal-body" id="areaContenido">
                                    '.$iniciar.'
                            </div>

                            <div class="estilos-centrar" style="margin-bottom: 15px;">
                                <button class="btn btn-primary btn-lg" href="#" id="finalizarEncuesta">Finalizar encuesta</button>
                            </div>

                            <div class="modal-footer estilos-centrar limpiardiv">

                                    <div id="areaBotonEncuesta">
                                        <button class="btn btn-primary btn-lg" href="#" id="iniciarEncuesta">
                                            Iniciar encuesta
                                        </button>
                                    </div>

                                    <div id="areaBotonesNavegacion">
                                        <span id="preguntaActual" style="font-size:18px;"></span>
                                        <br>
                                        <button class="btn btn-success" href="#" id="anterior">
                                            <i class="fa fa-arrow-circle-o-left fa-2x"></i> Anterior
                                        </button>
                                        <button class="btn btn-success" href="#" id="siguiente">
                                            Siguiente <i class="fa fa-arrow-circle-o-right fa-2x"></i>
                                        </button>

                                    </div>

                            </div>
                        </div>
                    </div>
                </div>';
    }

    public static function iniciarEncuesta($numero=1){
        $respuesta = EvaluacionesModel::preguntasEncuesta($numero,Tablas::encuesta_giro());
        $respuesta= self::formulario($numero,$respuesta);
        return $respuesta;
    }

    public static function formulario($numero,$data){
            if($numero != 9 AND $numero != 10 AND $numero != 12 AND  $numero != 13){
                $valor=array();
                for($i=0;$i<5;$i++)
                    $valor[$i]="";
            }

            $respuesta = EvaluacionesModel::respuestasEncuestados($numero,Tablas::encuestados_giro());
            $respuesta[0]= str_replace('<br />','',$respuesta[0]);

            $html ='<div style="min-height:380px;">
                        <hr style="border-top: 1px solid #000;">
                        <div class="row form-group">
                            <div class="col-md-12" style="font-size:20px;">
                                <b>'.$numero.'.-</b> '.$data['pregunta'].'
                            </div>
                        </div>';
                if($numero != 9 AND $numero != 10 AND $numero != 12 AND  $numero != 13){
                $valor[$respuesta[1]-1]="checked";
                $html.= '<div class="row form-group">
                            <div class="col-md-1" style="font-size:18px;">
                
                            </div>
                            <div class="col-md-2" style="font-size:17px;">
                                <input type="radio" name="evaluacion" value="1" id="malo" style="cursor:pointer;" '.$valor[0].'> <label for="malo" style="cursor:pointer;"> MALO</label>
                            </div>
                            <div class="col-md-2" style="font-size:17px;">
                                <input type="radio" name="evaluacion" value="2" id="deficiente" style="cursor:pointer;" '.$valor[1].'> <label for="deficiente" style="cursor:pointer;"> DEFICIENTE</label>
                            </div>
                            <div class="col-md-2" style="font-size:17px;">
                                <input type="radio" name="evaluacion" value="3" id="regular" style="cursor:pointer;" '.$valor[2].'> <label for="regular" style="cursor:pointer;"> REGULAR</label>
                            </div>
                            <div class="col-md-2" style="font-size:17px;">
                                <input type="radio" name="evaluacion" value="4" id="bueno" style="cursor:pointer;" '.$valor[3].'> <label for="bueno" style="cursor:pointer;"> MUY BUENO</label>
                            </div>
                            <div class="col-md-2" style="font-size:17px;">
                                <input type="radio" name="evaluacion" value="5" id="excelente" style="cursor:pointer;" '.$valor[4].'> <label for="excelente" style="cursor:pointer;"> EXCELENTE</label>
                            </div>
                        </div>';
                }
                $html.= '<br>
                        <div class="row">
                            <div class="col-md-12">
                                <span><b>Comentarios: </b></span>
                                <textarea id="comentarios" class="form-control textoMay textAreaImportante iluminarIconoInput" rows="8" style="resize:vertical;" placeholder="...">'.$respuesta[0].'</textarea>
                            </div>
                        </div>

                </div>';
        
        return $html;
    }

    public static function guardarRespuesta($numero,$calificacion,$comentario){
        return EvaluacionesModel::guardarRespuesta($numero,$calificacion,$comentario,Tablas::encuestados_giro());
    }

    public static function registrarHoraEncuesta(){
        return EvaluacionesModel::registrarHoraEncuesta(Tablas::encuestados_giro());
    }

    public static function finalizarEncuesta(){
        return EvaluacionesModel::finalizarEncuesta(Tablas::encuestados_giro());
    }

    public static function verificarTotalPreguntas(){
        $respuesta = EvaluacionesModel::verificarTotalPreguntas(Tablas::encuestados_giro());
        $preguntas='';
        if( ($respuesta[1] == NULL || empty($respuesta[1])) || ($respuesta[2] == NULL || empty($respuesta[2])) )
            $preguntas.='1,';
        if( ($respuesta[3] == NULL || empty($respuesta[3])) || ($respuesta[4] == NULL || empty($respuesta[4])) )
            $preguntas.='2,';
        if( ($respuesta[5] == NULL || empty($respuesta[5])) || ($respuesta[6] == NULL || empty($respuesta[6])) )
            $preguntas.='3,';
        if( ($respuesta[7] == NULL || empty($respuesta[7])) || ($respuesta[8] == NULL || empty($respuesta[8])) )
            $preguntas.='4,';
        if( ($respuesta[9] == NULL || empty($respuesta[9])) || ($respuesta[10] == NULL || empty($respuesta[10])) )
            $preguntas.='5,';
        if( ($respuesta[11] == NULL || empty($respuesta[11])) || ($respuesta[12] == NULL || empty($respuesta[12])) )
            $preguntas.='6,';
        if( ($respuesta[13] == NULL || empty($respuesta[13])) || ($respuesta[14] == NULL || empty($respuesta[14])) )
            $preguntas.='7,';
        if( ($respuesta[15] == NULL || empty($respuesta[15])) || ($respuesta[16] == NULL || empty($respuesta[16])) )
            $preguntas.='8,';
        if ($respuesta[17] == NULL || empty($respuesta[17]))
            $preguntas.='9,';
        if ($respuesta[18] == NULL || empty($respuesta[18]))
            $preguntas.='10,';
        if( ($respuesta[19] == NULL || empty($respuesta[19])) || ($respuesta[20] == NULL || empty($respuesta[20])) )
            $preguntas.='11,';
        if ($respuesta[21] == NULL || empty($respuesta[21]))
            $preguntas.='12,';
        if ($respuesta[22] == NULL || empty($respuesta[22]))
            $preguntas.='13,';
        if( ($respuesta[23] == NULL || empty($respuesta[23])) || ($respuesta[24] == NULL || empty($respuesta[24])) )
            $preguntas.='14';
        return $preguntas;
    }

    public static function usuarios($data,$limit){
        $html = '';
        $respuesta = EvaluacionesModel::usuarios($data,$limit,Tablas::usuarios(),Tablas::encuestados_giro());
		$colorFila= true;
		$contador=MetodosDiversos::indice($limit);
		foreach ($respuesta['data'] as $row => $item){
            $temp = intval(EvaluacionesModel::status($item['id_usuario'],Tablas::encuestados_giro()));
            if($temp === 1)
                $status = '<i class="fa fa-clock-o fa-2x text-yellow" aria-hidden="true"></i>';
            else if($temp === 2)
                $status = '<i class="fa fa-check-square-o fa-2x text-green" aria-hidden="true"></i>';
            else
                $status = '<i class="fa fa-window-minimize fa-lg" aria-hidden="true"></i>';
            $html .='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_usuario"].'">
                        <div class="campoId"><span class="max-min"><img class="botonMaxMin" src="views/img/circle-max.png" height="25" width="25"></span>'.$contador.'</div>
                        <div class="campoNombre">'.$item["nombre"].'</div>
                        <div class="campoEncuesta">'.$status.'</div>
                        <div class="campoEvaluacion"><i class="fa fa-window-minimize fa-lg" aria-hidden="true"></i></div>
                        <div class="campoOpciones"><button class="btn btn-success mostrarEncuesta">Mostrar</button></div>
                    </div>';
			$contador++;
        }
        return (array('data'=> $html, 'total'=>$respuesta['total']));
    }

    public static function marcadores($situacion){
        return EvaluacionesModel::marcadores($situacion,Tablas::encuestados_giro());
    }

    public static function resultadosEncuesta($usuario){
        $html = '';
        $data =  EvaluacionesModel::resultadosEncuesta($usuario,Tablas::encuestados_giro());
        $preguntas = EvaluacionesModel::preguntasEncuesta2(Tablas::encuesta_giro());

        $html.='<div role="tabpanel"> 
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#encuesta" aria-controls="encuesta" role="tab" data-toggle="tab">Encuesta</a>
                        </li>
                        <li role="presentation">
                            <a href="#examen" aria-controls="examen" role="tab" data-toggle="tab">Evaluación</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="margin-top: 2%;">';

                $html.='<div role="tabpanel" class="tab-pane active" id="encuesta"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>1.-</b>'.$preguntas[0][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['uno_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['uno_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>2.-</b>'.$preguntas[1][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['dos_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['dos_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>3.-</b>'.$preguntas[2][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['tres_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['tres_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>4.-</b>'.$preguntas[3][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['cuatro_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['cuatro_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>5.-</b>'.$preguntas[4][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['cinco_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['cinco_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>6.-</b>'.$preguntas[5][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['seis_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['seis_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>7.-</b>'.$preguntas[6][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['siete_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['siete_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>8.-</b>'.$preguntas[7][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['ocho_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['ocho_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>9.-</b>'.$preguntas[8][1].'</p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['nueve_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>10.-</b>'.$preguntas[9][1].'</p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['diez_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>11.-</b>'.$preguntas[10][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['once_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['once_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>12.-</b>'.$preguntas[11][1].'</p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['doce_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>13.-</b>'.$preguntas[12][1].'</p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['trece_comentario']).'</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>14.-</b>'.$preguntas[13][1].'</p>
                                    <p class="text-right"><span style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$data['catorce_calificacion'].'</span></p>
                                    <textarea class="form-control textoMay textAreaImportante" rows="6" style="resize:vertical;" placeholder="..." readonly>'.str_replace('<br />','',$data['catorce_comentario']).'</textarea>
                                </div>
                            </div>
                        </div>';

                $html.='<div role="tabpanel" class="tab-pane" id="examen"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <span></span>
                                </div>
                            </div>
                        </div>';


        $html.='    </div>
                </div>';
              
        return $html;
    }


} 
