<?php

Class Asistencias{

    public static function nuevoRegistro($data){
        $data['token'] .= ',NAVEGADOR: '.$_SERVER['HTTP_USER_AGENT'];
        /* $res=AsistenciasModel::nuevaAsistencia($data);
        //echo json_encode('Martin_ajax_Asistencias');;*/
       // $data['token'] .= ',NAVEGADOR: '.$_SERVER['HTTP_USER_AGENT']
        //$data['token'] = Llaves::firmaAcceso($data['token']);
        $resp = AsistenciasModel::nuevoRegistro($data,Tablas::asistencias(),Tablas::asistenciasTokens());
       // $resp = AsistenciasModel::nuevoRegistro($data);
       // return $resp ? array('error'=>false) : array('error'=>true);
        return $resp ? array('error'=>false,'data'=>self::mostrarRegistros(),'token'=>$data['token']) : array('error'=>true);
    }

    public static function mostrarRegistros($fecha=""){
       // $resp = AsistenciasModel::mostrarRegistros($fecha,Tablas::asistencias());mostrarmarin
        $resp = AsistenciasModel::mostrarRegistros();
        //echo json_encode($resp);
        $html='';
        $contador = 1;
        foreach($resp as $row => $item){
            $icon = self::iconoStatus($item['retardo']);
           // $icono ="<span class='label label-success pull-right' title='Equipo autorizado'>".$icon."</span>";
            //$icono = $item['verificacion_token'] ? "<span class='label label-success pull-right' title='Equipo autorizado'><i class='fa fa-check-square-o fa-3x'></i></span>" : "<span class='label label-warning pull-right' title='Equipo no autorizado'><i class='fa fa-question-circle-o fa-3x'></i></span>";
            $date = explode (" ", $item['fecha']);
            $html.=" <li class='item'>
                        <div class='product-img'>
                            <span>".$contador++."</span>
                        </div>
                        <div class='product-info'>
                            <a href='#' class='product-title'>".$date[1]." hrs.  ".$icon."</a>
                            <span class='product-description textoMay'>
                                ".MetodosDiversos::formatearFecha($date[0],true)."
                            </span>
                        </div>
                    </li>";
        }
        return !empty($html) ? $html : '<h3 class="text-center">No exiten registros</h3 class="text-center">';
    }

    public static function iconoStatus($indice){//fa-circle 
        
        $arreglo =  array(  0 => "<span class='label label-success pull-right' title='Equipo autorizado'><i class='fa fa-sign-in fa-3x'></i></span>",
                            1 => "<span class='label label-danger pull-right' title='Equipo autorizado'><i class='fa fa-circle fa-3x'></i></span>",
                            2 => "<span class='label label-warning pull-right' title='Equipo autorizado'><i class='fa fa-pencil-square-o fa-3x'></i></span>",
                            3 => "<span class='label label-primary pull-right' title='Equipo autorizado'><i class='fa fa-cutlery fa-3x'></i></span>",
                            4 => "<span class='label label-warning pull-right' title='Equipo autorizado'><i class='fa fa-circle  fa-3x'></i></span>",
                            5 => "<span class='label label-success pull-right' title='Equipo autorizado'><i class='fa fa-sign-out fa-3x'></i></span>",
                        );
        return $arreglo["$indice"];

    }


}

