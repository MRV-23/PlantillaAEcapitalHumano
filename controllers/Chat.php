<?php

class Chat{
    
    public static function cargarConectados($sql,$arreglo){
        $respuesta =  ChatModel::cargarConectados($sql,Tablas::usuarios(),Tablas::sucursales());
        $data=array();
        $html='';
        $colorFila= true;
        $contador = 0;
        foreach ($respuesta as $row => $item){
            $contador++;

           /* $html.='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_usuario"].'">
                        <div class="campoId">'.$contador.'</div>
                        <div class="campoNombre">'.$item["nombre"].'</div>
                        <div class="campoSucursal">'.$item["sucursal"].'</div>
                        <div class="campoDireccion"><button class="btn btn-success escribirMensajeUsuarioConectado">Mensaje</button></div>
                    </div>';*/
            
            $html .= '<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="margin:1px;" id="'.$item["id_usuario"].'">
                    <div class="col-sm-1 columna-div columna-div-centrar color768"><b>'.$contador.'</b></div>
                    <div class="col-sm-4 columna-div nombreUsuarioMsj"><span class="ocultar768 encabezado-min"><b>Nombre:</b></span><span>'.$item["nombre"].'</span></div>
                    <div class="col-sm-3 columna-div"><span class="ocultar768 encabezado-min"><b>Sucursal:</b></span>'.$item["sucursal"].'</div>
                    <div class="col-sm-2 columna-div"><span class="ocultar768 encabezado-min"><b>IP:</b></span>'.$arreglo[$item["id_usuario"]].'</div>
                    <div class="col-sm-2 columna-div columna-div-centrar768"><span class="ocultar768 encabezado-min"><b>Mensaje:</b></span><button class="btn btn-success escribirMensajeUsuarioConectado">Mensaje</button></div>
                </div>';

		}
        $data['html'] = $html;
        $data['total'] = $contador;
        return $data;
    }

    /***********************************************************chat***************************************/
    public function usuarios($buscar='',$edicion=0,$candidatos=[]){
        $edicion = $edicion == 1 ? '' : 'none';
        
        $html='<ul class="contacts-list">';
        $respuesta = ChatModel::usuarios($buscar,Tablas::usuarios(),Tablas::sucursales());
        foreach($respuesta as $row => $item){
            if($item['id_usuario'] != $_SESSION['identificador']){
                $imagen  = $item['imagen'] != NULL ? 'imagenes-usuarios/mini/'.$item['imagen'] : 'img/user.png';
                $imagen2  = $item['imagen'] != NULL ? 'imagenes-usuarios/'.$item['imagen'] : 'img/user.png';
                if($item['chat'] == 0)
                    $situacion = 'text-gray';
                else if($item['chat'] == 1)
                    $situacion = 'text-green';
                else if($item['chat'] == 2)
                    $situacion = 'text-yellow';

                $sucursal=$item['sucursal']; 
                $checked = in_array($item['id_usuario'], $candidatos) ? 'checked' : '';
                   
                $html.='<li class="itemChat '.$item['id_usuario'].' claseOverChat">
                            <a href="#">
                                <img class="direct-chat-img visor-crow-imagen-mini" src="'.Ruta::ruta_server().'views/'.$imagen.'" alt="'.Ruta::ruta_server().'views/'.$imagen2.'">
                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        <span>'.$item['nombre'].'</span>
                                        <small class="contacts-list-date pull-right">
                                            <label class="container_chat icon-hide" style="display:'.$edicion.';">
                                                <input type="checkbox" class="checkCandidatosGrupo" key='.$item['id_usuario'].' '.$checked.'>
                                                <span class="checkmark_chat"></span>
                                            </label> 
                                        </small>
                                    </span>
                                    <span class="estadoIconoUsuarioChat" style="margin-left:10px;"><i class="fa fa-user fa-2x '.$situacion.'" aria-hidden="true"></i></span> <span class="contacts-list-msg" list="'.$sucursal.'">'.$sucursal.'</span>
                                </div>
                            </a>
                        </li>';
            }          
        }
       // <span class="contacts-list-name"><span>'.$item['nombre'].'</span><small class="contacts-list-date pull-right"><div class="contadorMensaje">15</div></small></span>
        $html.='</ul>';
        return $html;
    }

    /*public function chats(){
        $respuesta = ChatModel::chats(Tablas::usuarios(),Tablas::sucursales(),Tablas::chat());
        if($respuesta['mensajes'] <= 0)
            return '';
        $html='<ul class="contacts-list">';
        foreach($respuesta as $row => $item){
            if($item['id_usuario'] != $_SESSION['identificador']){
                $imagen  = $item['imagen'] != NULL ? 'imagenes-usuarios/mini/'.$item['imagen'] : 'img/user.png';
                $imagen2  = $item['imagen'] != NULL ? 'imagenes-usuarios/'.$item['imagen'] : 'img/user.png';
                if($item['chat'] == 0)
                    $situacion = 'text-gray';
                else if($item['chat'] == 1)
                    $situacion = 'text-green';
                else if($item['chat'] == 2)
                    $situacion = 'text-yellow';

                $mensajes= intval($item['mensajes']) > 0 ? '<div class="contadorMensaje">'.$item['mensajes'].'</div>'  : '' ;
              
                $sucursal=$item['sucursal']; 
                

                $html.='<li class="itemChat '.$item['id_usuario'].' claseOverChat">
                            <a href="#">
                                <img class="direct-chat-img visor-crow-imagen-mini" src="'.Ruta::ruta_server().'views/'.$imagen.'" alt="'.Ruta::ruta_server().'views/'.$imagen2.'">
                                <div class="contacts-list-info">
                                    <span class="contacts-list-name"><span>'.$item['nombre'].'</span><small class="contacts-list-date pull-right">'.$mensajes.'</small></span>
                                    <span class="estadoIconoUsuarioChat" style="margin-left:10px;"><i class="fa fa-user fa-2x '.$situacion.'" aria-hidden="true"></i></span> <span class="contacts-list-msg" list="'.$sucursal.'">'.substr($sucursal, 0, 16).'...</span>
                                </div>
                            </a>
                        </li>';
            }          
        }
        $html.='</ul>';
        return $html;
    }*/

    public function grupos(){
        $respuesta = ChatModel::grupos(Tablas::grupos(),Tablas::integrantes());
        $html='<ul class="contacts-list">';
        foreach($respuesta as $row => $item){
    
                //$mensajes= intval($item['mensajes']) > 0 ? '<div class="contadorMensaje">'.$item['mensajes'].'</div>'  : '' ;

                $mensajes= '<div class="contadorMensaje">30</div>';
            
                $html.='<li class="itemChat '.$item['id'].' claseOverChat">
                            <a href="#">
                                <img class="direct-chat-img visor-crow-imagen-mini" src="'.Ruta::ruta_server().'views/img/user.png" alt="'.Ruta::ruta_server().'views/img/user.png">
                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        <span>'.$item['nombre'].'</span>
                                        <small class="contacts-list-date pull-right">
                                            '.$mensajes.'
                                            <i class="fa fa-ellipsis-v fa-2x botonOpcionesGrupos" aria-hidden="true"></i>
                                        </small>
                                    </span>
                                    <span class="estadoIconoUsuarioChat" style="margin-left:10px;"><i class="fa fa-users fa-2x" aria-hidden="true" style="color:#3c8dbc;"></i></span> <span class="contacts-list-msg" list=""></span>
                                </div>
                            </a>
                        </li>';        
        }
        $html.='</ul>';
        return $html;
    }
    /*

    SELECT COUNT(chat_ae.id) AS mensajes, id_usuario,CONCAT(usuarios_ae.nombre,' ',paterno,' ',materno) AS nombre,imagen,situacion_chat AS chat, sucursales_ae.nombre AS sucursal 
FROM usuarios_ae 
INNER JOIN sucursales_ae ON usuarios_ae.id_sucursal = sucursales_ae.id_sucursal 
INNER JOIN chat_ae ON usuarios_ae.id_usuario = chat_ae.remitente 
WHERE chat_ae.destinatario = 168 AND visto = 0 
ORDER BY usuarios_ae.nombre

    */

    public static function totalUsuarios(){
        return ChatModel::totalUsuarios(Tablas::usuarios());
    }

    public static function cambiarEstado($estado){
        return ChatModel::cambiarEstado($estado,Tablas::usuarios());
    }

    public static function leerChat($chatCon){
        $usuario1 = ChatModel::datosUsuario($_SESSION['identificador'],Tablas::usuarios());
        $usuario1["imagen"] = Ruta::ruta_server().'views/imagenes-usuarios/mini/'. $usuario1["imagen"];
        
        $usuario2 = ChatModel::datosUsuario($chatCon,Tablas::usuarios());
        $usuario2["imagen"] = Ruta::ruta_server().'views/imagenes-usuarios/mini/'. $usuario2["imagen"];
        
        $respuesta =  ChatModel::leerChat($chatCon,Tablas::chat());

        foreach ($respuesta['mensajes'] as $row => $item){
            if($item["remitente"] == $_SESSION['identificador']){
                $html.= '<div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">'.$usuario1["nombre"].'</span>
                                <span class="direct-chat-timestamp pull-left">'.$item["fecha"].'</span>
                            </div>
                            <img class="direct-chat-img" src="'.$usuario1["imagen"].'" class="user-image" alt="User Image">
                            <div class="direct-chat-text">
                            '.$item["mensaje"].'
                            </div>
                        </div>';
            }
            else{
                $html.= '<div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">'.$usuario2["nombre"].'</span>
                                <span class="direct-chat-timestamp pull-right">'.$item["fecha"].'</span>
                            </div>
                            <img class="direct-chat-img" src="'.$usuario2["imagen"].'" class="user-image" alt="User Image">
                            <div class="direct-chat-text">
                                '.$item["mensaje"].'
                            </div>
                        </div>';
            }
        }
        echo json_encode(array('error'=>false,'mensajes'=>$html,'sinLeer'=>$respuesta['totalMensajes']));

    }

    public static function nuevoMensaje($destinatario,$mensaje){
        $respuesta = ChatModel::nuevoMensaje($destinatario,$mensaje,Tablas::chat());
        date_default_timezone_set('America/Mexico_City');//sin esta función al momento de pasarlo a javascript se desfaza una hora
        echo json_encode(array('error'=>!$respuesta,'fecha'=>date("d-m-Y H:i:s")));
    }

    public static function nombrePila(){
        $respuesta = ChatModel::datosUsuario($_SESSION['identificador'],Tablas::usuarios());
        return $respuesta['nombre'];
    }

    public static function totalMensajes(){
        return ChatModel::totalMensajes(Tablas::chat());
    }

    public static function mensajesVistos($remitente){
        return ChatModel::mensajesVistos($remitente,Tablas::chat());
    }

    public static function crearGrupo($nombre,$integrantes){
         if(ChatModel::crearGrupo($nombre,$integrantes,Tablas::grupos(),Tablas::integrantes()))
            return array('error'=>false,'html'=>self::grupos());  
         else
            return array('error'=>true);  

    }

}

