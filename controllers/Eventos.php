<?php
class Eventos{

    static function validarFormulario($data){
       
        if(!preg_match('/^[1,2,3]{1}$/', $data["uno"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 1','tipo'=>'warning'));
        if(!preg_match('/^[1,2,3]{1}$/', $data["dos"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 2','tipo'=>'warning'));
        if(!preg_match('/^[1,2,3]{1}$/', $data["tres"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 3','tipo'=>'warning'));
        if(empty($data["cuatro"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 4','tipo'=>'warning'));
        if(!preg_match('/^[0-7]{1}$/', $data["cinco"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 5','tipo'=>'warning'));

        if($data["seisA"] == 1){
            if(empty($data["seis"]))
                return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 6','tipo'=>'warning'));
        } 


        if($data["treceA"] == 1){
            if(empty($data["trece"]))
                return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 7','tipo'=>'warning'));
        } 

        if($data["sieteA"] == 1){
            if(empty($data["siete"]))
                return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 8','tipo'=>'warning'));
        } 

        if(!preg_match('/^[0-3]{1}$/', $data["ocho"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 9','tipo'=>'warning'));
        if($data["ocho"] >0){
            if(empty($data["nueve"]))
                return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 10','tipo'=>'warning'));
        }
        if(empty($data["diez"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 11','tipo'=>'warning'));

        if(empty($data["once"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 12','tipo'=>'warning'));
        
        if(empty($data["doce"]))
            return json_encode(array('error'=>true,'mensaje'=>'Contesta la pregunta:','mensaje2'=>'No. 13','tipo'=>'warning'));
        
        if($data["terminos"] === "undefined")
            return json_encode(array('error'=>true,'mensaje'=>'Debes aceptar los terminos y condiciones','mensaje2'=>'','tipo'=>'warning'));

        

        $respuesta = EventosModel::validarFormulario($data,'nutrifitness');
        return $respuesta;
    }

    function verificarRegistro(){
        $respuesta = EventosModel::verificarRegistro('nutrifitness');
        return $respuesta;
    }


	#CONTAR USUARIOS PARA PAGINADOR
	#------------------------------------------------------------
	public static function totalPaginasNutrifitness($datos,$limit){
		$respuesta = EventosModel::buscarUsuariosNutrifitness($datos,$limit,Tablas::nutrifitness(),Tablas::usuarios());
		return count($respuesta);
	}

    #MOSTRAR TODOS LOS USUARIOS REGISTRADOS AL PROGRAMA
	#------------------------------------------------------------
	public function buscarUsuariosNutrifitness($data,$limit){
		$cadena='';
		$respuesta = EventosModel::buscarUsuariosNutrifitness($data,$limit,Tablas::nutrifitness(),Tablas::usuarios());
        $colorFila= true;
		$contador=gestionUsuarios::indice($limit);
		foreach ($respuesta as $row => $item){
          
            $rh='';
            if($_SESSION['identificador']==357){
                $checked= $item["vistoNutricion"] ? 'checked' : '';
                $rh='<input type="checkbox" class="grupoChecked" style="cursor:pointer;" name="" '.$checked.'>';
            }
            else if($_SESSION['identificador']==358){
                $checked= $item["vistoFisico"] ? 'checked' : '';
                $rh='<input type="checkbox" class="grupoChecked" style="cursor:pointer;" name="" '.$checked.'>';
            }

			if($item["correo"] === 'recepcionaura2@asesoresempresariales.com.mx')
				$item["correo"] = 'recepcionaura@asesoresempresariales.com.mx';
			if($item["correo"] === 'giro2@asesoresempresariales.com.mx')
				$item["correo"] = 'giro@asesoresempresariales.com.mx';
			$item["imagen"] = $item["imagen"] != NULL ? 'imagenes-usuarios/'.$item["imagen"] : 'img/user.png';
		$cadena .='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_usuario"].'">
				<div class="campoId"><span class="max-min"><img class="botonMaxMin" src="views/img/circle-max.png" height="25" width="25"></span>'.$contador.'</div>
				<div class="campoNombre">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>
                <div class="campoSucursal">'.$item["correo"].'</div>
                <div class="campoVisto">'.$rh.'</div>
				<div class="campoDireccion divContenedorHijo"><button class="btn btn-success detalleUsuarioNutrifitness" data-toggle="modal" data-target="#ModalCenterCorreos"><span class="spanOcultarTextoMostrar">Mostrar</span><span class="spanOcultarTextoMostrar2"><i class="fa fa-eye bigIcon"></i></span></button></div>
			</div>';
			$contador++;
		}
		return $cadena;
    }
    
    public static function datosUsuario($id,$bandera=false){
        EventosModel::visto($id,Tablas::nutrifitness());
        $respuesta = EventosModel::datosUsuario($id,Tablas::usuarios(),Tablas::sucursales());
        $alimentacion = EventosModel::datos($id,Tablas::alimentacion());
        $laboratorio = EventosModel::datos($id,Tablas::laboratorio());
        $composicion = EventosModel::datos($id,Tablas::composicion());
        $encuesta = EventosModel::datos($id,Tablas::nutrifitness(),false);
        $evaluacionFisica = EventosModel::datos($id,Tablas::fisica_evaluacion());
        $planFisica = EventosModel::datos($id,Tablas::fisica_plan());

        $totalLaboratorio=EventosModel::totalRegistros($id,Tablas::laboratorio());
        $totalLaboratorioSiguiente =  $totalLaboratorio > 1 ? '' : 'disabled' ;

        $totalComposicion=EventosModel::totalRegistros($id,Tablas::composicion());
        $totalComposicionSiguiente =  $totalComposicion > 1 ? '' : 'disabled' ;

        $totalAlimentacion=EventosModel::totalRegistros($id,Tablas::alimentacion());
        $totalAlimentacionSiguiente =  $totalAlimentacion > 1 ? '' : 'disabled' ;

        $totalFisica=EventosModel::totalRegistros($id,Tablas::fisica_evaluacion());
        $totalFisicaSiguiente =  $totalFisica > 1 ? '' : 'disabled' ;

        $totalPlan=EventosModel::totalRegistros($id,Tablas::fisica_plan());
        $totalPlanSiguiente =  $totalPlan > 1 ? '' : 'disabled' ;

        $html=$html2='';
        $genero = $respuesta['genero'] == "M" ? 'MASCULINO' : 'FEMENINO';

        if($encuesta['uno'] == 1)
            $encuesta['uno'] = '1-2';
        else if($encuesta['uno'] == 2)
            $encuesta['uno'] = '3-4';
        else if($encuesta['uno'] == 3)
            $encuesta['uno'] = '5 o más';

        if($encuesta['dos'] == 1)
            $encuesta['dos'] = 'Menos de 1 litro';
        else if($encuesta['dos'] == 2)
            $encuesta['dos'] = '1 a 1.5 litros';
        else if($encuesta['dos'] == 3)
            $encuesta['dos'] = 'Más de 2 litros';

        
        if($encuesta['tres'] == 1)
            $encuesta['tres'] = 'Diario';
        else if($encuesta['tres'] == 2)
            $encuesta['tres'] = 'Cada tercer día';
        else if($encuesta['tres'] == 3)
            $encuesta['tres'] = 'Fines de semana';

        if($encuesta['cinco'] == 0)
            $encuesta['cinco'] = 'Ninguno';
        else if($encuesta['cinco'] == 1)
            $encuesta['cinco'] = '1 día';
        else if($encuesta['cinco'] == 2)
            $encuesta['cinco'] = '2 días';
            else if($encuesta['cinco'] == 3)
            $encuesta['cinco'] = '3 días';
        else if($encuesta['cinco'] == 4)
            $encuesta['cinco'] = '4 días';
        else if($encuesta['cinco'] == 5)
            $encuesta['cinco'] = '5 días';
        else if($encuesta['cinco'] == 6)
            $encuesta['cinco'] = '6 días';
        else if($encuesta['cinco'] == 7)
            $encuesta['cinco'] = 'Todos los días';

        if($encuesta['seis'] == NULL)
            $encuesta['seis'] = 'NO';
        
        if($encuesta['siete'] == NULL)
            $encuesta['siete'] = 'NO';
        
        if($encuesta['trece'] == NULL)
            $encuesta['trece'] = 'NINGUNO';

        if($encuesta['ocho'] == 0)
            $encuesta['ocho'] = 'Ninguno';
        else if($encuesta['ocho'] == 1)
            $encuesta['ocho'] = '1 a 2';
        else if($encuesta['ocho'] == 2)
            $encuesta['ocho'] = '3 a 4';
        else if($encuesta['ocho'] == 3)
            $encuesta['ocho'] = '5 a más';
        
        
        if($encuesta['nueve'] == NULL)
            $encuesta['nueve'] = 'Ninguno';
        
        $categoriaImc = "";
        if($composicion['imc'] > 0 && $composicion['imc'] < 18.5)
            $categoriaImc = "PESO BAJO";
        else if($composicion['imc'] >= 18.5 && $composicion['imc'] < 25)
            $categoriaImc = "PESO NORMAL";
        else if($composicion['imc'] >= 25 && $composicion['imc'] < 30)
            $categoriaImc = "SOBREPESO";
        else if($composicion['imc'] >= 30)
            $categoriaImc = "OBESIDAD";

        $categoriaCintura = '';
        if($composicion['cintura'] > 0 AND ( ($composicion['cintura'] < 90 AND $respuesta['genero'] == "M") || ($composicion['cintura'] < 80 AND $respuesta['genero'] == "F")))
            $categoriaCintura = 'SALUDABLE';
        else if( ($composicion['cintura'] >= 90 AND $respuesta['genero'] == "M") || ($composicion['cintura'] >= 80 AND $respuesta['genero'] == "F"))
            $categoriaCintura = 'RIESGO CARDIOVASCULAR';
       
        $laboratorio['comentarios'] = str_replace('<br />','',$laboratorio['comentarios']);
        $composicion['comentarios'] = str_replace('<br />','',$composicion['comentarios']);
        $alimentacion['colasiones'] = str_replace('<br />','',$alimentacion['colasiones']);
        $planFisica['lunes']= str_replace('<br />','',$planFisica['lunes']);
        $planFisica['martes']= str_replace('<br />','',$planFisica['martes']);
        $planFisica['miercoles']= str_replace('<br />','',$planFisica['miercoles']);
        $planFisica['jueves']= str_replace('<br />','',$planFisica['jueves']);
        $planFisica['viernes']= str_replace('<br />','',$planFisica['viernes']);
        $planFisica['sabado']= str_replace('<br />','',$planFisica['sabado']);
        $planFisica['domingo']= str_replace('<br />','',$planFisica['domingo']);
        $evaluacionFisica['comentarios'] = str_replace('<br />','',$evaluacionFisica['comentarios']);

        $botonDescargar='';
        if($_SESSION['identificador'] == $id){        
            $botonDescargar='<div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-download"></i>
                                    <a href="views/pdf/planAlimenticio.php?count='.$totalAlimentacion.'" download="tabla-alimentos" id="rutaPdf">&nbsp;&nbsp;Plan alimenticio&nbsp;&nbsp;&nbsp;</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-download"></i>
                                    <a href="views/documentos-nutrifitness/tabla-alimentos.pdf" download="tabla-alimentos">Tabla de alimentos</a>
                                </div>
                            </div>';
        }

        $html.='    <div class="box box-info"></div>
                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-12">
                            <span><b>Nombre: </b></span> '.$respuesta['nombre'].' '.$respuesta['paterno'].' '.$respuesta['materno'].'
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span><b>Sucursal: </b></span> '.$respuesta['sucursal'].'
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span><b>Fecha de Nacimiento: </b></span> <span class="textoMay">'.MetodosDiversos::formatearFecha($respuesta['fecha_nacimiento'],true).'</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span><b>Edad: </b></span>'.MetodosDiversos::edad($respuesta['fecha_nacimiento'], date ("Y-m-d")).' AÑOS
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <span><b>Genero: </b></span> '.$genero.'
                        </div>
                    </div>';

            $html2.= '
                  
                        <div class="box-body">
                                <div role="tabpanel"> 
                                    <ul class="nav nav-tabs">
                                        <li role="presentation" class="active">
                                            <a href="#laboratorio" aria-controls="laboratorio" role="tab" data-toggle="tab">Laboratorio</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#corporal" aria-controls="corporal" role="tab" data-toggle="tab">Composición corporal</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#condicion" aria-controls="condicion" role="tab" data-toggle="tab">Prueba física</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#encuesta" aria-controls="encuesta" role="tab" data-toggle="tab">Encuesta</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#alimenticio" aria-controls="alimenticio" role="tab" data-toggle="tab">Plan alimentición</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#acondicionamiento" aria-controls="alimenticio" role="tab" data-toggle="tab">Plan acondicionamiento</a>
                                        </li>
                                        
                                        
                                    </ul>
                                    <div class="tab-content" style="margin-top: 1%;">

                                        <div role="tabpanel" class="tab-pane active" id="laboratorio">
                                            <form method="POST" id="formularioLaboratorio" style="position:relative;">
                                                
                                                <h3 class="estilos-centrar"> Resultados de laboratorio</h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span><b>Colesterol total: </b></span> <input type="text" name="colesterol" size="10" class="input-nutrifitness-laboratorio" value="'.$laboratorio['colesterol'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span><b>Glucosa: </b></span> <input type="text" name="glucosa" size="10" class="input-nutrifitness-laboratorio" value="'.$laboratorio['glucosa'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span><b>HDL: </b></span> <input type="text" name="hdl" size="10" class="input-nutrifitness-laboratorio" value="'.$laboratorio['HDL'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span><b>LDL: </b></span> <input type="text" name="ldl" size="10" class="input-nutrifitness-laboratorio" value="'.$laboratorio['LDL'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span><b>Trigliceridos: </b></span> <input type="text" name="trigliceridos" size="10" class="input-nutrifitness-laboratorio" value="'.$laboratorio['trigliceridos'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span><b>Comentarios: </b></span>
                                                        <textarea name="comentarios" id="comentariosLaboratorio" class="form-control textoMay textAreaImportante" rows="8" style="resize:vertical;" placeholder="..." readonly autocomplete="off">'.$laboratorio['comentarios'].'</textarea>
                                                    </div>
                                                </div>
                                                <br>';
                        if($_SESSION['identificador'] == 357){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-7 text-right" id="totalRegistrosLaboratorio3" value="'.$totalLaboratorio.'">
                                                        <button type="button" id="laboratorioAnterior" class="btn btn-default" '.$totalLaboratorioSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosLaboratorio">'.$totalLaboratorio.'</b> de <b id="totalRegistrosLaboratorio2">'.$totalLaboratorio.'</b> </span>
                                                        <button type="button" id="laboratorioSiguiente" class="btn btn-default" '.$totalLaboratorioSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="col-md-5 text-right">
                                                        <button type="button" class="btn btn-success" value="'.$id.'" id="nuevoRegistroLaboratorio">Crear nuevo registro <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                        }
                        else{
                                 $html2.=        '<div class="row">
                                                    <div class="col-md-12 estilos-centrar" id="totalRegistrosLaboratorio3" value="'.$totalLaboratorio.'">
                                                        <button type="button" id="laboratorioAnterior" class="btn btn-default" '.$totalLaboratorioSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosLaboratorio">'.$totalLaboratorio.'</b> de <b id="totalRegistrosLaboratorio2">'.$totalLaboratorio.'</b> </span>
                                                        <button type="button" id="laboratorioSiguiente" class="btn btn-default" '.$totalLaboratorioSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                        }

                        if($_SESSION['identificador'] == 357){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-12 estilos-centrar">
                                                        <br>
                                                        <input type="hidden" id="actualizarRegistroLaboratorio" name="idRegistro" value="'.$laboratorio['id'].'">
                                                        <button type="button" class="btn btn-primary" id="modificarLaboratorio">Modificar <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                        <button type="submit" class="btn btn-success" id="guardarLaboratorio">Guardar <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>';
                        }
                                $html2.=   '</form>
                                        </div>
            
                                        <div role="tabpanel" class="tab-pane" id="corporal"> 
                                            <form method="POST" id="formularioComposicion">
                                                <h3 class="estilos-centrar">Evaluación de la composición corporal</h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span><b>Peso: </b></span> <input type="text" name="peso" size="10" class="input-nutrifitness-composicion" value="'.$composicion['peso'].'" readonly autocomplete="off"> <b>kg.</b>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Estatura: </b></span> <input type="text" name="estatura" size="10" class="input-nutrifitness-composicion" value="'.$composicion['estatura'].'" readonly autocomplete="off"> <b>mts.</b>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Músculo: </b></span> <input type="text" name="musculo" size="10" class="input-nutrifitness-composicion" value="'.$composicion['musculo'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span><b>IMC: </b></span> <input type="text" name="imc" id="imc" size="10" class="input-nutrifitness-composicion" value="'.$composicion['imc'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Clasificación IMC: </b></span><span id="clasificacionImc">'. $categoriaImc .'</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>% Grasa: </b></span> <input type="text" name="grasaPorcentaje" size="10" class="input-nutrifitness-composicion" value="'.$composicion['grasa_porcentaje'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span><b>Kg. Grasa: </b></span> <input type="text" name="grasaKilos" size="10" class="input-nutrifitness-composicion" value="'.$composicion['grasa_kilos'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Grasa visceral: </b></span> <input type="text" name="grasaBiceral" size="10" class="input-nutrifitness-composicion" value="'.$composicion['grasa_biceral'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Cintura: </b></span> <input type="text" name="cintura" id="cintura" size="8" class="input-nutrifitness-composicion" value="'.$composicion['cintura'].'" readonly autocomplete="off"><b> cm.</b>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span><b>Clasificación cintura: </b></span> <span id="clasificacionCintura">'. $categoriaCintura .'</span>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span><b>Comentarios: </b></span>
                                                        <textarea name="comentarios" id="comentariosComposicion" class="form-control textoMay textAreaImportante" rows="8" style="resize:vertical;" placeholder="..." readonly autocomplete="off">'.$composicion['comentarios'].'</textarea>
                                                    </div>
                                                </div>
                                                <br>';
                    if($_SESSION['identificador'] == 357){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-7 text-right" id="totalRegistrosComposicion3" value="'.$totalComposicion.'">
                                                        <button type="button" id="composicionAnterior" class="btn btn-default" '.$totalComposicionSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosComposicion">'.$totalComposicion.'</b> de <b id="totalRegistrosComposicion2">'.$totalComposicion.'</b> </span>
                                                        <button type="button" id="composicionSiguiente" class="btn btn-default" '.$totalComposicionSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="col-md-5 text-right">
                                                        <button type="button" class="btn btn-success" value="'.$id.'" id="nuevoRegistroComposicion">Crear nuevo registro <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                    }
                    else{
                                $html2.=        '<div class="row">
                                                    <div class="col-md-12 estilos-centrar" id="totalRegistrosComposicion3" value="'.$totalComposicion.'">
                                                        <button type="button" id="composicionAnterior" class="btn btn-default" '.$totalComposicionSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosComposicion">'.$totalComposicion.'</b> de <b id="totalRegistrosComposicion2">'.$totalComposicion.'</b> </span>
                                                        <button type="button" id="composicionSiguiente" class="btn btn-default" '.$totalComposicionSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                    }
                        if($_SESSION['identificador'] == 357){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-12 estilos-centrar">
                                                        <br>
                                                        <input type="hidden" id="actualizarRegistroComposicion" name="idRegistro" value="'.$composicion['id'].'">
                                                        <button type="button" class="btn btn-primary" id="modificarComposicion">Modificar <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                        <button type="submit" class="btn btn-success" id="guardarComposicion">Guardar <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>';
                        }
                                $html2.=   '</form>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="condicion"> 
                                            <form method="POST" id="formularioResultadosFisico">
                                                <h3 class="estilos-centrar">Resultados de la evaluación física</h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span><b>CARDIOVASCULAR (Latidos por minuto)</b></span> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>FC inical: </b></span> <input type="text" name="fc_inicial" size="10" class="input-nutrifitness-fisico-evaluacion" value="'.$evaluacionFisica['fc_inicial'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>FC final: </b></span> <input type="text" name="fc_final" size="10" class="input-nutrifitness-fisico-evaluacion" value="'.$evaluacionFisica['fc_final'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span><b>Flexibilidad</b></span> <input type="text" name="flexibilidad" size="10" class="input-nutrifitness-fisico-evaluacion" value="'.$evaluacionFisica['flexibilidad'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Fuerza</b></span> <input type="text" name="fuerza" size="10" class="input-nutrifitness-fisico-evaluacion" value="'.$evaluacionFisica['fuerza'].'" readonly autocomplete="off">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Sentadillas</b></span> <input type="text" name="sentadillas" size="10" class="input-nutrifitness-fisico-evaluacion" value="'.$evaluacionFisica['sentadillas'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <hr>
                                             
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span><b>Comentarios: </b></span>
                                                        <textarea name="comentarios" id="comentariosEvaluacionFisica" class="form-control textoMay textAreaImportante" rows="4" style="resize:vertical;" placeholder="..." readonly autocomplete="off">'.$evaluacionFisica['comentarios'].'</textarea>
                                                    </div>
                                                </div>
                                                <br>';
                        if($_SESSION['identificador'] == 358){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-7 text-right" id="totalRegistrosFisica3" value="'.$totalFisica.'">
                                                        <button type="button" id="fisicaAnterior" class="btn btn-default" '.$totalFisicaSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosFisica">'.$totalFisica.'</b> de <b id="totalRegistrosFisica2">'.$totalFisica.'</b> </span>
                                                        <button type="button" id="fisicaSiguiente" class="btn btn-default" '.$totalFisicaSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="col-md-5 text-right">
                                                        <button type="button" class="btn btn-success" value="'.$id.'" id="nuevoRegistroFisica">Crear nuevo registro <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                        }
                        else{
                                    $html2.=    '<div class="row">
                                                    <div class="col-md-12 text-center" id="totalRegistrosFisica3" value="'.$totalFisica.'">
                                                        <button type="button" id="fisicaAnterior" class="btn btn-default" '.$totalFisicaSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosFisica">'.$totalFisica.'</b> de <b id="totalRegistrosFisica2">'.$totalFisica.'</b> </span>
                                                        <button type="button" id="fisicaSiguiente" class="btn btn-default" '.$totalFisicaSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                        }
                                            
                        if($_SESSION['identificador'] == 358){
                                $html2.=    '<div class="row">
                                                <div class="col-md-12 estilos-centrar">
                                                    <br>
                                                    <input type="hidden" id="actualizarRegistroFisica" name="idRegistro" value="'.$evaluacionFisica['id'].'">
                                                    <button type="button" class="btn btn-primary" id="modificarResultadosFisico">Modificar <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                    <button type="submit" class="btn btn-success" id="guardarResultadosFisico">Guardar <i class="fa fa-check" aria-hidden="true"></i></button>
                                                </div>
                                            </div>';
                        }                    
                        $html2.=          '</form>
                                        </div>';



                        $html2.=        '<div role="tabpanel" class="tab-pane" id="acondicionamiento"> 
                                            <form method="POST" id="formularioPlanFisico">
                                                <h3 class="estilos-centrar">Plan de acondicionamiento físico</h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <span><b></b></span> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Tiempo: </b></span> <input type="text" name="lunest" size="7" class="input-nutrifitness-fisico-plan" value="'.$planFisica['lunes_tiempo'].'" readonly autocomplete="off"><span><b>Minutos</b></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span><b>Intensidad: </b></span> <input type="text" name="lunesi" size="10" class="input-nutrifitness-fisico-plan" value="'.$planFisica['lunes_intensidad'].'" readonly autocomplete="off">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea name="lunes" id="comentariosPlan" class="form-control textoMay planFisico textAreaImportante" rows="10" style="resize:vertical;" placeholder="..." readonly autocomplete="off">'.$planFisica['lunes'].'</textarea>
                                                    </div>
                                                </div>
                                                <br>';
                    
                        if($_SESSION['identificador'] == 358){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-7 text-right" id="totalRegistrosPlan3" value="'.$totalPlan.'">
                                                        <button type="button" id="planAnterior" class="btn btn-default" '.$totalPlanSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosPlan">'.$totalPlan.'</b> de <b id="totalRegistrosPlan2">'.$totalPlan.'</b> </span>
                                                        <button type="button" id="planSiguiente" class="btn btn-default" '.$totalPlanSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="col-md-5 text-right">
                                                        <button type="button" class="btn btn-success" value="'.$id.'" id="nuevoRegistroPlan">Crear nuevo registro <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                        }
                        else{
                                    $html2.=    '<div class="row">
                                                    <div class="col-md-12 text-center" id="totalRegistrosPlan3" value="'.$totalPlan.'">
                                                        <button type="button" id="planAnterior" class="btn btn-default" '.$totalPlanSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosPlan">'.$totalPlan.'</b> de <b id="totalRegistrosPlan2">'.$totalPlan.'</b> </span>
                                                        <button type="button" id="planSiguiente" class="btn btn-default" '.$totalPlanSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                        }  
                        if($_SESSION['identificador'] == 358){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-12 estilos-centrar">
                                                        <br>
                                                        <input type="hidden" id="actualizarRegistroPlan"  name="idRegistro" value="'.$planFisica['id'].'">
                                                        <button type="button" class="btn btn-primary" id="modificarPlanFisico">Modificar <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                        <button type="submit" class="btn btn-success" id="guardarPlanFisico">Guardar <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>';
                        }
                                $html2.= '  </form>
                                        </div>';

                                $html2.= '<div role="tabpanel" class="tab-pane" id="alimenticio"> 
                                            <form method="POST" id="formularioPlan">
                                                <h3 class="estilos-centrar">Plan alimenticio</h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h4 style="text-align:center;">Desayuno</h4>
                                                        <img class="img-responsive" src="views/img/desayuno.jpg" style="border-radius:50%;border:2px solid #000;">
                                                        <br>
                                                        <ol>
                                                            <li><b class="grupo-enlace grupoLeche">Leche:</b><input type="text" name="1Leche" size="10" class="input-nutrifitness" value="'.$alimentacion['leche1'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoCereales">Cereales:</b> <input type="text" name="1Cereales" size="7" class="input-nutrifitness" value="'.$alimentacion['cereales1'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoLeguminosas">Leguminosas:</b><input type="text" name="1Leguminosas" size="3" class="input-nutrifitness" value="'.$alimentacion['leguminosas1'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoCarne">Carne: </b><input type="text" name="1Carne" size="10" class="input-nutrifitness" value="'.$alimentacion['carnes1'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoFruta">Fruta:</b><input type="text" name="1Frutas" size="11" class="input-nutrifitness" value="'.$alimentacion['frutas1'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoVerdura">Verdura:</b> <input type="text" name="1Verduras" size="8" class="input-nutrifitness" value="'.$alimentacion['verduras1'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoGrasa">Grasa:</b> <input type="text" name="1Grasas" size="10" class="input-nutrifitness" value="'.$alimentacion['grasas1'].'" readonly autocomplete="off"></li>
                                                        </ol>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h4 style="text-align:center;">Comida</h4>
                                                        <img class="img-responsive" src="views/img/comida.jpg" style="border-radius:50%;border:2px solid #000;">
                                                        <br>
                                                        <ol>
                                                            <li><b class="grupo-enlace grupoLeche">Leche:</b><input type="text" name="2Leche" size="10" class="input-nutrifitness" value="'.$alimentacion['leche2'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoCereales">Cereales:</b> <input type="text" name="2Cereales" size="7" class="input-nutrifitness" value="'.$alimentacion['cereales2'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoLeguminosas">Leguminosas:</b><input type="text" name="2Leguminosas" size="3" class="input-nutrifitness" value="'.$alimentacion['leguminosas2'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoCarne">Carne: </b><input type="text" name="2Carne" size="10" class="input-nutrifitness" value="'.$alimentacion['carnes2'].'"  readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoFruta">Fruta:</b><input type="text" name="2Frutas" size="11" class="input-nutrifitness" value="'.$alimentacion['frutas2'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoVerdura">Verdura:</b> <input type="text" name="2Verduras" size="8" class="input-nutrifitness" value="'.$alimentacion['verduras2'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoGrasa">Grasa:</b> <input type="text" name="2Grasas" size="10" class="input-nutrifitness" value="'.$alimentacion['grasas2'].'" readonly autocomplete="off"></li>
                                                        </ol>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h4 style="text-align:center;">Cena</h4>
                                                        <img class="img-responsive" src="views/img/cena.jpg" style="border-radius:50%;border:2px solid #000;">
                                                        <br>
                                                        <ol>
                                                            <li><b class="grupo-enlace grupoLeche">Leche:</b><input type="text" name="3Leche" size="10" class="input-nutrifitness" value="'.$alimentacion['leche3'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoCereales">Cereales:</b> <input type="text" name="3Cereales" size="7" class="input-nutrifitness" value="'.$alimentacion['cereales3'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoLeguminosas">Leguminosas:</b><input type="text" name="3Leguminosas" size="3" class="input-nutrifitness" value="'.$alimentacion['leguminosas3'].'"  readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoCarne">Carne: </b><input type="text" name="3Carne" size="10" class="input-nutrifitness" value="'.$alimentacion['carnes3'].'"  readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoFruta">Fruta:</b><input type="text" name="3Frutas" size="11" class="input-nutrifitness" value="'.$alimentacion['frutas3'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoVerdura">Verdura:</b> <input type="text" name="3Verduras" size="8" class="input-nutrifitness" value="'.$alimentacion['verduras3'].'" readonly autocomplete="off"></li>
                                                            <li><b class="grupo-enlace grupoGrasa">Grasa:</b> <input type="text" name="3Grasas" size="10" class="input-nutrifitness" value="'.$alimentacion['grasas3'].'" readonly autocomplete="off"></li>
                                                        </ol>
                                                    </div>
                                                    <br>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <hr>
                                                            <span><b>Colasión: </b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea name="colasiones" id="colasion" class="form-control textoMay textAreaImportante" rows="8" style="resize:vertical;" placeholder="..." readonly autocomplete="off">'.$alimentacion['colasiones'].'</textarea>
                                                        </div>
                                                    </div>
                                                    <br>';

                    if($_SESSION['identificador'] == 357){
                                $html2.=        '<div class="row">
                                                    <div class="col-md-7 text-right" id="totalRegistrosAlimentacion3" value="'.$totalAlimentacion.'">
                                                        <button type="button" id="alimentacionAnterior" class="btn btn-default" '.$totalAlimentacionSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosAlimentacion">'.$totalAlimentacion.'</b> de <b id="totalRegistrosAlimentacion2">'.$totalAlimentacion.'</b> </span>
                                                        <button type="button" id="alimentacionSiguiente" class="btn btn-default" '.$totalAlimentacionSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                    <div class="col-md-5 text-right">
                                                        <button type="button" class="btn btn-success" value="'.$id.'" id="nuevoRegistroAlimentacion">Crear nuevo registro <i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <br>';
                    }
                    else{
                                $html2.=        '<div class="row">
                                                    <div class="col-md-5 estilos-centrar">
                                                        '. $botonDescargar.'
                                                    </div>
                                                    <div class="col-md-7 text-left" id="totalRegistrosAlimentacion3" value="'.$totalAlimentacion.'">
                                                        <button type="button" id="alimentacionAnterior" class="btn btn-default" '.$totalAlimentacionSiguiente.'><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                        <span> <b id="totalRegistrosAlimentacion">'.$totalAlimentacion.'</b> de <b id="totalRegistrosAlimentacion2">'.$totalAlimentacion.'</b> </span>
                                                        <button type="button" id="alimentacionSiguiente" class="btn btn-default" '.$totalAlimentacionSiguiente.'><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                          
                                                <br>';
                    }
                                        

                    if($_SESSION['identificador'] == 357){
                                    $html2.=        '<div class="row">
                                                        <div class="col-md-12 estilos-centrar">
                                                            <br>
                                                            <input type="hidden" id="actualizarRegistroAlimentacion" name="idRegistro" value="'.$alimentacion['id'].'">
                                                            <button type="button" class="btn btn-primary" id="modificarPlan">Modificar <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-success" id="guardarPlan">Guardar <i class="fa fa-check" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>';
                    }
                                    $html2.=   '</div>
                                            </form>
                                        </div>

                                        
                                        <div role="tabpanel" class="tab-pane" id="encuesta"> 
                                            <h3 class="estilos-centrar">Respuestas de la encuesta de hábitos saludables y ejercicio</h3>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-12">
                                                   <p><b>1.-</b> <i class="fa fa-question fa-rotate-180"></i>Cuántas comidas realizas al día<i class="fa fa-question"></i> (contando las comidas fuertes y/o colaciones):</p>
                                                   <p class="respuestaNutrifitness textoMay">'.$encuesta['uno'].'</p>
                                                   </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>2.-</b> <i class="fa fa-question fa-rotate-180"></i>Cuánta agua natural tomas al día<i class="fa fa-question"></i></p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['dos'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>3.-</b> <i class="fa fa-question fa-rotate-180"></i>Con que frecuencia consumes bebidas industrializadas<i class="fa fa-question"></i> (refrescos, jugos, aguas frescas)</p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['tres'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>4.-</b> Describe detalladamente tus horarios  de alimentación y  describe de acuerdo al tiempo de comida los platillos,  alimentos y bebidas que comúnmente consumes:</p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['cuatro'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>5.-</b> De los 7 días de la semana, en promedio, <i class="fa fa-question fa-rotate-180"></i>Con que frecuencia consumes verduras<i class="fa fa-question"></i></p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['cinco'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>6.-</b> <i class="fa fa-question fa-rotate-180"></i>Tomas algún medicamento y/o suplemento<i class="fa fa-question"></i>, Si tu respuesta es sí, anota cuál y en qué dosis.</p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['seis'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>7.-</b> <i class="fa fa-question fa-rotate-180"></i> Tienes algún diagnostico médico<i class="fa fa-question"></i> (Diabetes, hipertensión, embarazo, etc.), Si tu respuesta es sí, anota cuál.</p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['trece'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>8.-</b> <i class="fa fa-question fa-rotate-180"></i>Tienes alguna lesión<i class="fa fa-question"></i>, Si tu respuesta es sí, anota en dónde.</p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['siete'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>9.-</b> <i class="fa fa-question fa-rotate-180"></i>Cuántos días a la semana realizas ejercicio<i class="fa fa-question"></i>:</p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['ocho'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>10.-</b> <i class="fa fa-question fa-rotate-180"></i>Qué ejercicio realizas<i class="fa fa-question"></i></p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['nueve'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>11.-</b> <i class="fa fa-question fa-rotate-180"></i>Sobre qué tema de alimentación y/o ejercicio te gustaría aprender más<i class="fa fa-question"></i></p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['diez'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>12.-</b> <i class="fa fa-question fa-rotate-180"></i>Qué es lo que te motiva a cambiar<i class="fa fa-question"></i></p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['once'].'</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>13.-</b> <i class="fa fa-question fa-rotate-180"></i>Cuales son tus metas<i class="fa fa-question"></i></p>
                                                    <p class="respuestaNutrifitness textoMay">'.$encuesta['doce'].'</p>
                                                </div>
                                            </div>

                                            
                                        </div>
                                        
                                    </div> 
                                </div>
            
                        </div>';
                    
        if(!$bandera)
            return json_encode(array('data'=>$html,'data2'=>$html2,'imagen'=>$respuesta['imagen'],'genero'=>$respuesta['genero']));
        else
            return $html2;
    }
    
    public static function actualizarFormularioPlanAlimenticio($data){
        //validar campos
        $respuesta = EventosModel::actualizarFormularioPlanAlimenticio($data,Tablas::alimentacion());
        return $respuesta;
    }

    public static function actualizarFormularioLaboratorio($data){
        //validar campos
        $respuesta = EventosModel::actualizarFormularioLaboratorio($data,Tablas::laboratorio());
        return $respuesta;
    }

    public static function actualizarFormularioComposicion($data){
        //validar campos
        $respuesta = EventosModel::actualizarFormularioComposicion($data,Tablas::composicion());
        return $respuesta;
    }

    public static function actualizarDescripcionUsuario($data){
         //validar campos
         $respuesta = EventosModel::actualizarDescripcionUsuario($data,Tablas::especiales());
         return $respuesta;

    }


    public function actualizarFormularioEvaluacionFisica($data){
        $respuesta = EventosModel::actualizarFormularioEvaluacionFisica($data,Tablas::fisica_evaluacion());
        return $respuesta;
    }

    public function actualizarFormularioPlanFisico($data){
        $respuesta = EventosModel::actualizarFormularioPlanFisico($data,Tablas::fisica_plan());
        return $respuesta;
    }

    public static function cargarDocumento($data){
        $sizeMax = 5; // en MB
        if($data["tamano"] > $sizeMax * 1024 * 1024)
            return array('error'=>true,'mensaje'=>"El documento tiene un tamaño mayor al permitido",'mensaje2'=>"El peso máximo es de 5 MB",'tipo'=>'error');
        
        $info = new SplFileInfo($data["nombre"]);
        $extensionImagen = $info->getExtension();
        $nombreArchivo='';
        if( $extensionImagen == 'pdf'){
            $nombre = 'taller-';
            $aleatorio = mt_rand(100,99999999);
            $hoy = date("Y-m-d"); 
            $nombreArchivo = $nombre.$aleatorio.$hoy;
            $nombreArchivoFinal = $nombreArchivo.'.'.$extensionImagen;               
            $ruta = "../intranet/documentos-nutrifitness/".$nombreArchivoFinal;     
            $respuesta = move_uploaded_file($data['temporal'], $ruta);
            $data["nombre"] = $nombreArchivoFinal;
            if(!$respuesta)
                return array('error'=>true,'mensaje'=>'Ocurrio un error, el archivo no se pudo cargar','mensaje2'=>'¡ Intentalo nuevamente ! ','tipo'=>'error');
        }
        else
            return array('error'=>true,'mensaje'=>"Formato no valido",'mensaje2'=>"Formato valido: .pdf",'tipo'=>'error'); 
            
            
        if(($data["nombre2"]) != NULL){
                $sizeMax = 2; // en MB
                if($data["tamano2"] > $sizeMax * 1024 * 1024)
                        return json_encode(array('error'=>true,'mensaje'=>"La imagen tiene un tamaño mayor al permitido",'mensaje2'=>"El peso máximo es de 2 MB",'tipo'=>'error'));
                
                $extensionImagen = explode("/",$data["tipo2"]);//image/jpg o image/png
                $extensionImagen = $extensionImagen[1];
                if($extensionImagen == "jpeg")
                        $extensionImagen = "jpg";
                if($extensionImagen == 'jpg' || $extensionImagen == 'png'){
                        $nombreArchivo2 = $nombreArchivo.'.'.$extensionImagen;
                  
                        $ruta = "../intranet/documentos-nutrifitness/".$nombreArchivo2;
                       
                        if($extensionImagen == "jpg")
                                $origen = imagecreatefromjpeg($data["temporal2"]);
                        else 
                                $origen = imagecreatefrompng($data["temporal2"]);
          
    
                        $x = imagesx($origen);  
                        $y = imagesy($origen);  
                        $mini = imagecreatetruecolor(200,200);  
                        imagecopyresized($mini, $origen, 0, 0, 0, 0, 200, 200, $x, $y);  
        
                        if($extensionImagen== "jpg")
                                imagejpeg($mini, $ruta);
                          
                        else if($extensionImagen == "png")
                                imagepng($mini, $ruta);

                        imagedestroy($origen);//liberar memoria
                        imagedestroy($mini);

                        $data["nombre2"] = $nombreArchivo2;

                }
                else
                        return json_encode(array('error'=>true,'mensaje'=>"Sólo se permiten imagenes",'mensaje2'=>"Formato: .jpg, .jpeg y .png",'tipo'=>'error'));
        }  


        $respuesta = EventosModel::cargarDocumento($data,Tablas::talleres());
        return $respuesta;        
    }

    public static function talleres(){
        $html='';
        $respuesta = EventosModel::talleres(Tablas::talleres());
		foreach ($respuesta as $row => $item){
            if(empty($item["portada"]))
                $item["portada"] = "talleres.jpg";
            $html.='<div class="row textAreaImportante max1000 contenidoFlexbox" style="padding:15px;">
                        <div class="col-md-6">
                            <span class="textoMay">'.$item["titulo"].'</span>
                            <br>
                            <br>
                            <span class="textoMay">'.$item["descripcion"].'</span>
                            <br>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                <i class="fa fa-download"></i>
                                <a href="intranet/documentos-nutrifitness/'.$item["documento"].'" download="'.$item["documento"].'">Descargar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        <span class="textoMay">'.MetodosDiversos::formatearFecha($item["fecha"],true).'</span>
                        </div>
                        <div class="col-md-4">
                            <img src="intranet/documentos-nutrifitness/'.$item["portada"].'" alt="">
                        </div>
                    </div>
                    <br>';  
        }
      return $html;
    }

    public static function actualizarVistos($data,$id){
        $respuesta = EventosModel::actualizarVistos($data,$id,Tablas::nutrifitness());
        return $respuesta;        
    }

    public static function verificarMiConsulta($id){
        $respuesta = EventosModel::verificarMiConsulta($id,Tablas::laboratorio());
        return $respuesta;        
    }


    public static function mostrarEquipo($equipo){
        $respuesta = EventosModel::mostrarEquipo($equipo,Tablas::usuarios());
        $contador = 0;
        foreach ($respuesta as $row => $item){
            $html.='<div style="text-align:left;"><b>'.++$contador.'.-</b> '.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>';  
        }
      return $html;
    }


    public static function nuevoRegistro($id,$tabla){
        if($tabla==1)
            $tabla = Tablas::laboratorio();
        else if($tabla==2)
            $tabla = Tablas::composicion();
        else if($tabla==3)
            $tabla = Tablas::alimentacion();
        else if($tabla==4)
            $tabla = Tablas::fisica_evaluacion();
        else if($tabla==5)
            $tabla = Tablas::fisica_plan();

        $respuesta = EventosModel::nuevoRegistro($id,$tabla);
        return $respuesta;        
    }

    public static function getRegistro($id,$inicio){
        $respuesta = EventosModel::getRegistro($id,$inicio-1,Tablas::laboratorio());
        echo json_encode(array( 'error: '=>false,
                                'id'=>$respuesta['id'],
                                'colesterol'=>$respuesta['colesterol'],
                                'glucosa'=>$respuesta['glucosa'],
                                'HDL'=>$respuesta['HDL'],
                                'LDL'=>$respuesta['LDL'],
                                'trigliceridos'=>$respuesta['trigliceridos'],
                                'comentarios'=>$respuesta['comentarios']
                              )
                        );       
    }

    public static function getRegistro2($id,$inicio){
        $respuesta = EventosModel::getRegistro($id,$inicio-1,Tablas::composicion());
        $genero= EventosModel::getGenero($respuesta['id_usuario'],Tablas::usuarios());
        echo json_encode(array( 'error: '=>false,
                                'id'=>$respuesta['id'],
                                'cintura'=>$respuesta['cintura'],
                                'comentarios'=>$respuesta['comentarios'],
                                'estatura'=>$respuesta['estatura'],
                                'grasa_biceral'=>$respuesta['grasa_biceral'],
                                'grasa_kilos'=>$respuesta['grasa_kilos'],
                                'grasa_porcentaje'=>$respuesta['grasa_porcentaje'],
                                'imc'=>$respuesta['imc'],
                                'musculo'=>$respuesta['musculo'],
                                'peso'=>$respuesta['peso'],
                                'genero'=>$genero
                              )
                        );     
    }

    public static function getRegistro3($id,$inicio){
        $respuesta = EventosModel::getRegistro($id,$inicio-1,Tablas::alimentacion());
        echo json_encode(array( 'error: '=>false,
                                'id'=>$respuesta['id'],
                                'carnes1'=>$respuesta['carnes1'],
                                'carnes2'=>$respuesta['carnes2'],
                                'carnes3'=>$respuesta['carnes3'],
                                'cereales1'=>$respuesta['cereales1'],
                                'cereales2'=>$respuesta['cereales2'],
                                'cereales3'=>$respuesta['cereales3'],
                                'frutas1'=>$respuesta['frutas1'],
                                'frutas2'=>$respuesta['frutas2'],
                                'frutas3'=>$respuesta['frutas3'],
                                'grasas1'=>$respuesta['grasas1'],
                                'grasas2'=>$respuesta['grasas2'],
                                'grasas3'=>$respuesta['grasas3'],
                                'leche1'=>$respuesta['leche1'],
                                'leche2'=>$respuesta['leche2'],
                                'leche3'=>$respuesta['leche3'],
                                'leguminosas1'=>$respuesta['leguminosas1'],
                                'leguminosas2'=>$respuesta['leguminosas2'],
                                'leguminosas3'=>$respuesta['leguminosas3'],
                                'verduras1'=>$respuesta['verduras1'],
                                'verduras2'=>$respuesta['verduras2'],
                                'verduras3'=>$respuesta['verduras3'],
                                'colasion'=>$respuesta['colasiones']
                              )
                        );   
    }

    public static function getRegistro4($id,$inicio){
        $respuesta = EventosModel::getRegistro($id,$inicio-1,Tablas::fisica_evaluacion());
        echo json_encode(array( 'error: '=>false,
                                'id'=>$respuesta['id'],
                                'fc_inicial'=>$respuesta['fc_inicial'],
                                'fc_final'=>$respuesta['fc_final'],
                                'flexibilidad'=>$respuesta['flexibilidad'],
                                'fuerza'=>$respuesta['fuerza'],
                                'sentadillas'=>$respuesta['sentadillas'],
                                'comentarios'=>$respuesta['comentarios']
                              )
                        );    
    }

    public static function getRegistro5($id,$inicio){
        $respuesta = EventosModel::getRegistro($id,$inicio-1,Tablas::fisica_plan());
        echo json_encode(array( 'error: '=>false,
                                'id'=>$respuesta['id'],
                                'lunes_tiempo'=>$respuesta['lunes_tiempo'],
                                'lunes_intensidad'=>$respuesta['lunes_intensidad'],
                                'lunes'=>$respuesta['lunes']
                              )
                        );   
        
    }

    public static function actualizarCandidatos($data){
        if( intval(EventosModel::verificarSiExisteUsuario(Tablas::valores())) === 0 )
            EventosModel::agregarVotante(Tablas::valores());
        EventosModel::actualizarCandidatos($data,Tablas::valores());
        return self::mostrarCandidatos();
    }

    public static function mostrarCandidatos(){

        $respuesta1 = EventosModel::mostrarCandidatos(1,Tablas::valores(),Tablas::usuarios());
        $respuesta2 = EventosModel::mostrarCandidatos(2,Tablas::valores(),Tablas::usuarios());
        $respuesta3 = EventosModel::mostrarCandidatos(3,Tablas::valores(),Tablas::usuarios());
        $respuesta4 = EventosModel::mostrarCandidatos(4,Tablas::valores(),Tablas::usuarios());
        $respuesta5 = EventosModel::mostrarCandidatos(5,Tablas::valores(),Tablas::usuarios());

        return array('titulo'=>'Se actualizó correctamente','subtitulo'=>'',
                     'nombre1'=>$respuesta1['nombre'],'imagen1'=>$respuesta1['imagen'],'identificador1'=>$respuesta1['id_usuario'],
                     'nombre2'=>$respuesta2['nombre'],'imagen2'=>$respuesta2['imagen'],'identificador2'=>$respuesta2['id_usuario'],
                     'nombre3'=>$respuesta3['nombre'],'imagen3'=>$respuesta3['imagen'],'identificador3'=>$respuesta3['id_usuario'],
                     'nombre4'=>$respuesta4['nombre'],'imagen4'=>$respuesta4['imagen'],'identificador4'=>$respuesta4['id_usuario'],
                     'nombre5'=>$respuesta5['nombre'],'imagen5'=>$respuesta5['imagen'],'identificador5'=>$respuesta5['id_usuario']
                    );
    }

    public static function listaCandidatos($data = ''){
        $cadena='';
		$respuesta = EventosModel::listaCandidatos($data,Tablas::usuarios(),Tablas::sucursales());
        $colorFila= true;
		
		foreach ($respuesta as $row => $item){
          
            $cadena .='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'">
                        <div class="campoId">'.$item["id_usuario"].'</div>
                        <div class="campoNombre" style="justify-content: flex-start;">'.$item["nombre"].'</div>
                        <div class="campoSucursal" style="justify-content: flex-start;">'.$item["sucursal"].'</div>
                    </div>';
			
		}
		return $cadena;
    }

    

}
