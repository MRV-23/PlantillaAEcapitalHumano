<?php
class Tickets{
   
    public static function nuevoTicket($data){

        if(($data["imagenNombre"]) != NULL){
                $sizeMax = 2; // en MB
                if($data["imagenTamano"] > $sizeMax * 1024 * 1024)
                        return json_encode(array('error'=>true,'mensaje'=>"La imagen tiene un tamaño mayor al permitido",'mensaje2'=>"El peso máximo es de 2 MB",'tipo'=>'error'));
                
                $extensionImagen = explode("/",$data["imagenTipo"]);//image/jpg o image/png
                $extensionImagen = $extensionImagen[1];
                if($extensionImagen == "jpeg")
                        $extensionImagen = "jpg";
                if($extensionImagen == 'jpg' || $extensionImagen == 'png'){
                        $aleatorio = mt_rand(100,99999999);
                        $hoy = date("YmdHis"); 
                        $nombreArchivo = $aleatorio.$hoy.'.'.$extensionImagen;
                  
                        $ruta = "../intranet/imagenes-tickets/".$nombreArchivo;
                       
                        if($extensionImagen == "jpg")
                                $origen = imagecreatefromjpeg($data["imagenTemporal"]);
                        else 
                                $origen = imagecreatefrompng($data["imagenTemporal"]);
                                                      
                        if($extensionImagen== "jpg")
                                imagejpeg($origen, $ruta);
                          
                        else if($extensionImagen == "png")
                                imagepng($origen, $ruta);

                        imagedestroy($origen);//liberar memoria
                        $data["imagenNombre"]=$nombreArchivo;
                }
                else
                        return json_encode(array('error'=>true,'mensaje'=>"Sólo se permiten imagenes",'mensaje2'=>"Formato: .jpg, .jpeg y .png",'tipo'=>'error'));
        }

        if(($data["documentoNombre"]) != NULL){
                $sizeMax = 2; // en MB
                if($data["documentoTamano"] > $sizeMax * 1024 * 1024)
                        return json_encode(array('error'=>true,'mensaje'=>"El documento tiene un tamaño mayor al permitido",'mensaje2'=>"El peso máximo es de 2 MB",'tipo'=>'error'));
                
                $info = new SplFileInfo($data["documentoNombre"]);
                $extensionImagen = $info->getExtension();

                if($extensionImagen == 'doc' || $extensionImagen == 'docx' || $extensionImagen == 'xls' || $extensionImagen == 'xlsx' || $extensionImagen == 'pdf'){
                        $aleatorio = mt_rand(100,99999999);
                        $hoy = date("YmdHis"); 
                        $nombreArchivo = $aleatorio.$hoy.'.'.$extensionImagen;               
                        $ruta = "../intranet/documentos-tickets/".$nombreArchivo;       
                        move_uploaded_file($data['documentoTemporal'], $ruta);
                        $data["documentoNombre"]=$nombreArchivo;
                }
                else
                        return json_encode(array('error'=>true,'mensaje'=>"Formato no válido",'mensaje2'=>"Formatos válidos: .doc, .docx, .xls, .xlsx, y .pdf", "error",'tipo'=>'error'));
        }              
       
        $respuesta = TicketsModel::nuevoTicket($data,Tablas::tickets());
        return $respuesta;
    }

    public static function mostrarColaTickets($data,$asignados=false){
        $respuesta = TicketsModel::mostrarColaTickets($data,$asignados,Tablas::tickets());
        $html='';
        $colorFila= true;
        //$boton='';
        foreach($respuesta as $row => $item){

          if( intval($_SESSION['identificador2']) === 6 AND $data < 1){      
                if($item["area"]==1){
                        $grupo='<ul id="'.$item["id_ticket"].'" value="1" class="dropdown-menu">
                                        <li><a href="#" id="'.AccesoSoporte::idUsuarios('Ulises').'" class="administradorAsignaTicket">Ulises</a></li>
                                        <li><a href="#" id="'.AccesoSoporte::idUsuarios('Juan').'" class="administradorAsignaTicket">Juan</a></li>
                                </ul>';
                }
                else if($item["area"]==2){
                        $grupo='<ul id="'.$item["id_ticket"].'" value="2" class="dropdown-menu">
                                        <li><a href="#" id="'.AccesoSoporte::idUsuarios('Miguel').'" class="administradorAsignaTicket">Miguel</a></li>
                                        <li><a href="#" id="'.AccesoSoporte::idUsuarios('Salvador').'" class="administradorAsignaTicket">Salvador</a></li>
                                </ul>';
                }
                else if($item["area"]==3){
                         $grupo='<ul id="'.$item["id_ticket"].'" value="3" class="dropdown-menu">
                                        <li><a href="#" id="'.AccesoSoporte::idUsuarios('Uriel').'" class="administradorAsignaTicket">Uriel</a></li>
                                </ul>';
                }
                
                $boton='<div class="btn-group campoDetalleEncabezado">
                                <a class="btn btn-success mostrarDatosTicket" data-toggle="modal" data-target="#mostrarTicketSoporte" href="#">Mostrar</a>
                                <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                </a>
                                '.$grupo.'
                        </div>';
               
          }
          else{
                $boton = '<div class="campoDetalleEncabezado"><button type="button" value="" class="btn btn-success mostrarDatosTicket" data-toggle="modal" data-target="#mostrarTicketSoporte">Mostrar</button></div>';
                if($data == 1){
                        $boton = '<div class="campoDetalleEncabezado"><button type="button" value="" class="btn btn-success mostrarDatosTicketAtendidos" data-toggle="modal" data-target="#mostrarDatosTicketAtendidos">Mostrar</button></div>';
                }
                else if($data == 2){
                        $tieneHistorial=TicketsModel::saberSiTicketTieneHistorial($item["id_ticket"],Tablas::tickets_historial());
                        if($tieneHistorial){
                                $boton='<div class="btn-group campoDetalleEncabezado">
                                                <a class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#mostrarDatosTicketFinalizados" href="#">Mostrar</a>
                                                <a class="btn btn-success dropdown-toggle mostrarDatosHistorialTickets" value="'.$item["id_ticket"].'" data-toggle="modal" href="#" data-target="#mostrarHistorialTicketsLista">
                                                        <span class="fa fa-history" title="Historial del ticket"></span>
                                                </a>
                                        </div>';
                        }             
                        else{
                                $boton='<div class="btn-group campoDetalleEncabezado">
                                                <a class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#mostrarDatosTicketFinalizados" href="#">Mostrar</a>
                                                <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                                                        <span class="fa fa-minus" title="Sin historial"></span>
                                                </a>
                                        </div>';
                        }
                        ////////////////////////////
                        //$boton = '<div class="campoDetalleEncabezado"><button type="button" value="" class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#mostrarDatosTicketFinalizados">Mostrar</button></div>';
                } 
          }

            $prioridad='text-green';
            if($item["prioridad"]==1){
                $prioridad='text-yellow';
            }
            else if($item["prioridad"]==2){
                $prioridad='text-red';
            }

            $icono='<i class="fa fa-wrench fa-2x '.$prioridad.'"></i>';
            if($item["area"]==2){
                $icono='<i class="fa fa-chrome fa-2x '.$prioridad.'"></i>';
            }
            else if($item["area"]==3){
                $icono='<i class="fa fa-file-code-o fa-2x '.$prioridad.'"></i>';
            }

            $usuario = Datos::mostrarUsuarioUnicoModel2($item["id_usuario"],Tablas::usuarios());
            $atiende='<div class="campoNombreTicketEncabezado">'.$usuario['nombre'].' '.$usuario['paterno'].' '.$usuario['materno'].'</div>';
            if($item["fecha_atendido"] != NULL && Configuraciones::administrador() == $_SESSION['identificador2']){
                $usuarioSoporte = Datos::mostrarUsuarioUnicoModel2($item["id_atiende_ticket"],Tablas::usuarios());
                $atiende='<div class="campoNombreTicketEncabezado" style="flex-direction:column"><div style="width:100%">'.$usuario['nombre'].' '.$usuario['paterno'].' '.$usuario['materno'].'</div><div style="width:100%;font-size:12px;background:#186E80;color:#fff;padding-left:10px;border:1px dotted #000">Atendido por: '.$usuarioSoporte['nombre'].'</div></div>';
            }
            else if($item["fecha_finalizado"] != NULL){
                $usuarioSoporte = Datos::mostrarUsuarioUnicoModel2($item["id_atiende_ticket"],Tablas::usuarios());
                $atiende='<div class="campoNombreTicketEncabezado" style="flex-direction:column"><div style="width:100%">'.$usuario['nombre'].' '.$usuario['paterno'].' '.$usuario['materno'].'</div><div style="width:100%;font-size:12px;background:#186E80;color:#fff;padding-left:10px;border:1px dotted #000">Atendido por: '.$usuarioSoporte['nombre'].'</div></div>';
            }

            $ticketDiaAnterior='';
            $reabrir='';

            if($item['reabrir'] == 2 || $item['ultima_fecha_cierre'] == date('Y-m-d')){
                $reabrir = 'style="background:#ff851b;color:#ffffff"';
            }

            else if($item['fecha_atendido']){
                $atendido = explode ( " ", $item['fecha_atendido']);
                if($atendido[0] != date("Y-m-d")){
                        $ticketDiaAnterior = '-<i class="fa fa-exclamation-triangle text-red" title="EL TICKET LEVA AL MENOS UN DÍA EN ESPERA DE SER ATENDIDO" style="cursor:pointer;"></i>';
                }
            }
       
            $html.='<div class="divContenedorPadre renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_ticket"].'">
                    <div class="campoIdTicketEncabezado" '.$reabrir.'>'.$item["id_ticket"].$ticketDiaAnterior.'</div>';
            $html.= $atiende;        
            $html.='<div class="campoAsuntoEncabezado">'.$item["asunto"].'</div>
                    <div class="campoSituacionEncabezado">'.$icono.'</div>';
            $html.=$boton;        
            $html.= '</div>';
        }
        return $html;
    }

    public static function totalHistorialTickets($fecha='',$usuario='',$limite=''){ 
        $respuesta = TicketsModel::historialTickets($fecha,$usuario,$limite,Tablas::tickets(),Tablas::usuarios());
        return count($respuesta);
    }

    public static function historialTickets($fecha,$usuario,$limite=''){
        $respuesta = TicketsModel::historialTickets($fecha,$usuario,$limite,Tablas::tickets(),Tablas::usuarios());
        $html='';
        $colorFila= true;

        foreach($respuesta as $row => $item){
           $tieneHistorial=TicketsModel::saberSiTicketTieneHistorial($item["id_ticket"],Tablas::tickets_historial());
           if($tieneHistorial){
                $boton='<div class="btn-group campoDetalleEncabezado">
                                <a class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#mostrarDatosTicketFinalizados" href="#">Mostrar</a>
                                <a class="btn btn-success dropdown-toggle mostrarDatosHistorialTickets" value="'.$item["id_ticket"].'" data-toggle="modal" href="#" data-target="#mostrarHistorialTicketsLista">
                                        <span class="fa fa-history" title="Historial del ticket"></span>
                                </a>
                        </div>';
           }             
           else{
                $boton='<div class="btn-group campoDetalleEncabezado">
                                <a class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#mostrarDatosTicketFinalizados" href="#">Mostrar</a>
                                <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="fa fa-minus" title="Sin historial"></span>
                                </a>
                        </div>';
           }
                //$boton = '<div class="campoDetalleEncabezado"><button type="button" value="" class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#mostrarDatosTicketFinalizados">Mostrar</button></div>';
           
            
            $prioridad='text-green';
            if($item["prioridad"]==1){
                $prioridad='text-yellow';
            }
            else if($item["prioridad"]==2){
                $prioridad='text-red';
            }

            $icono='<i class="fa fa-wrench fa-2x '.$prioridad.'"></i>';
            if($item["area"]==2){
                $icono='<i class="fa fa-chrome fa-2x '.$prioridad.'"></i>';
            }
            else if($item["area"]==3){
                $icono='<i class="fa fa-file-code-o fa-2x '.$prioridad.'"></i>';
            }

            $finalizado = explode ( " ", $item['fecha_finalizado']);

            $usuarioSoporte = Datos::mostrarUsuarioUnicoModel2($item["id_atiende_ticket"],Tablas::usuarios());
            $atiende='<div class="campoNombreTicketEncabezado" style="flex-direction:column"><div style="width:100%">'.$item['nombre'].' '.$item['paterno'].' '.$item['materno'].'</div><div style="width:100%;font-size:12px;background:#186E80;color:#fff;padding-left:10px;border:1px dotted #000">Atendido por: '.$usuarioSoporte['nombre'].'</div></div>';
            

            $html.='<div class="divContenedorPadre renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_ticket"].'">
                    <div class="campoIdTicketEncabezado">'.$item["id_ticket"].'</div>';
            $html.= $atiende;        
            $html.='<div class="campoAsuntoEncabezado">'.$item["asunto"].'</div>
                    <div class="campoCierreEncabezado textoMay">'.MetodosDiversos::formatearFecha($finalizado[0],true).'</div>
                    <div class="campoSituacionEncabezado">'.$icono.'</div>';
            $html.=$boton;        
            $html.= '</div>';
        }
        return $html;
    }

    public static function historialTicketsUsuario(){
        $respuesta = TicketsModel::historialTicketsUsuario(Tablas::tickets(),Tablas::usuarios());
        $html='';
        $colorFila= true;

        foreach($respuesta as $row => $item){

            $icono2 = '<i class="fa fa-eye text-black"></i>';
            if($item['visto'])
              $icono2 = '<i class="fa fa-eye-slash"></i>';  

            $boton = '<div class="campoDetalleEncabezado"><button type="button" value="" class="btn btn-success mostrarDatosTicketUsuario" data-toggle="modal" data-target="#mostrarDatosTicket"><span>'.$icono2.'</span> Mostrar</button></div>';

            $icono= 'ABIERTO';
            if($item['situacion'] == 1)
                $icono= 'ASIGNADO';
            else if($item['situacion'] == 2)
                $icono= 'CERRADO';
            
           

            $registrado = explode ( " ", $item['fecha_registro']);

            $nombre='<b>PENDIENTE POR SER ATENDIDO</b>';
            if($item["id_atiende_ticket"] != NULL){
                $usuarioSoporte = Datos::mostrarUsuarioUnicoModel2($item["id_atiende_ticket"],Tablas::usuarios());
                $nombre = $usuarioSoporte['nombre'].' '.$usuarioSoporte['paterno'].' '.$usuarioSoporte['materno'];
            }
            
            $atiende='<div class="campoNombreTicketEncabezado">'.$nombre.'</div>';
            
            $html.='<div class="divContenedorPadre renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_ticket"].'">
                    <div class="campoIdTicketEncabezado">'.$item["id_ticket"].'</div>';
            $html.= $atiende;        
            $html.='<div class="campoAsuntoEncabezado">'.$item["asunto"].'</div>
                    <div class="campoCierreEncabezado textoMay">'.MetodosDiversos::formatearFecha($registrado[0],true).'</div>
                    <div class="campoSituacionEncabezado" style="font-size:13px;">'.$icono.'</div>';
            $html.=$boton;        
            $html.= '</div>';
        }
        return $html;     
    }

    public static function mostaraDatosTicket($ticket){
        $html=$html2=$html3='';
        $respuesta = TicketsModel::mostaraDatosTicket($ticket,Tablas::tickets());
        $empleado = Datos::mostrarDatosEmpleadoAgenda($respuesta['id_usuario'],Tablas::usuarios());
        $sucursal = Sucursales::mostrarSucursalActualizarModel($empleado["id_sucursal"],"sucursales_ae");
        $fecha = explode ( " ", $respuesta['fecha_registro']);
        $fAtendido=$horaAtendido='';
        $fFinalizado=$horaFinalizado='';
        $tiempoRespuesta='';
        if($respuesta['fecha_atendido']!= NULL){
             $atendido = explode ( " ", $respuesta['fecha_atendido']);
             $fAtendido = date("g:i a",strtotime($atendido[1]));
             $horaAtendido = MetodosDiversos::formatearFecha($atendido[0],true);
        }
        if($respuesta['fecha_finalizado']!= NULL){
            $finalizado = explode ( " ", $respuesta['fecha_finalizado']);
            $fFinalizado = date("g:i a",strtotime($finalizado[1]));
            $horaFinalizado = MetodosDiversos::formatearFecha($finalizado[0],true);
            $tiempoRespuesta=MetodosDiversos::tiempoRespuesta($respuesta['fecha_registro'],$respuesta['fecha_finalizado']);
       }
       $area='';
       $subcategoria='';
       $segmento='';
       if($respuesta["area"] == 1){
            $area='SOPORTE TÉCNICO';
            switch($respuesta["subcategoria"]){
                case 1: $subcategoria='Carpetas en Red';
                        break;
                case 2: $subcategoria='CONTPAQi Adminpaq';
                        break;
                case 3: $subcategoria='CONTPAQi Contabilidad y Bancos';
                        break;
                case 4: $subcategoria='CONTPAQi Facturación';
                        break;
                case 5: $subcategoria='CONTPAQi Nomipaq';
                        break;
                case 6: $subcategoria='Correo electrónico';
                        break;
                case 7: $subcategoria='Impresoras y Toner';
                        break;
                case 8: $subcategoria='Paquetería Office(Excel,Word, Power Point, etc.)';
                        break;
                case 9: $subcategoria='Red e Internet';
                        break;
                case 10: $subcategoria='Spark';
                        break;
                case 11: $subcategoria='XML';
                        break;
                case 12: $subcategoria='Otra';
                        break;                          
            }
       }
       else if($respuesta["area"] == 2){
            $area='GIRO';
            switch($respuesta["subcategoria"]){
                case 1: $subcategoria='Nóminas';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Cálculos Extraordinarios';
                                    break;
                            case 2: $segmento='Finiquitos';
                                    break;
                            case 3: $segmento='Aguinaldos';
                                    break;
                            case 4: $segmento='Conexión a escritorio remoto';
                                    break;
                            case 5: $segmento='Usuarios y contraseñas';
                                    break;
                            case 6: $segmento='Reportes';
                                    break;
                            case 7: $segmento='Cálculos Extraordinarios';
                                    break;
                            case 8: $segmento='Timbrado';
                                    break;
                            case 9: $segmento='Alta de Clientes / Tipos de Nómina';
                                    break;
                            case 10: $segmento='Alta de Puestos';
                                    break;
                            case 11: $segmento='Alta de Turnos';
                                    break;
                            case 12: $segmento='Movimientos masivos';
                                    break;
                            case 13: $segmento='Otros';
                                    break;
                        }
                        break;
                case 2: $subcategoria='Procesos IMSS';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Altas';
                                    break;
                            case 2: $segmento='Bajas';
                                    break;
                            case 3: $segmento='Modificaciones salariales';
                                    break;
                            case 4: $segmento='Reingresos';
                                    break;
                            case 5: $segmento='Alta de Registros patronales';
                                    break;
                            case 6: $segmento='INFONAVIT';
                                    break;
                            case 7: $segmento='FONACOT';
                                    break;
                            case 8: $segmento='Movimientos masivos';
                                    break;
                            case 9: $segmento='Otros';
                                    break;
                        }
                        break;
                case 3: $subcategoria='Módulo Pre Alta';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Captura de información';
                                    break;
                            case 2: $segmento='Correo electrónico';
                                    break;
                            case 3: $segmento='Exportación de empleados';
                                    break;
                            case 4: $segmento='Otros';
                                    break;
                        }
                        break;
                case 4: $subcategoria='Módulo Recibos CFDI';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Error en timbre';
                                    break;
                            case 2: $segmento='XML y PDF';
                                    break;
                            case 3: $segmento='Reportes';
                                    break;
                            case 4: $segmento='Falta de timbres';
                                    break;
                            case 5: $segmento='Otros';
                                    break;
                        }
                        break;
                case 5: $subcategoria='Módulo Archivo Electrónico';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Alta de nuevos documentos';
                                    break;
                            case 2: $segmento='Otros';
                                    break;
                        }
                        break;
                case 6: $subcategoria='Otra';
                        break;
            }
        }
        else{
            $area='DESARROLLO DE SOFTWARE';
            switch($respuesta["subcategoria"]){
                case 1: $subcategoria='Ingreso al sistema';
                        break;
                case 2: $subcategoria='Módulo agenda empresarial';
                        break;
                case 3: $subcategoria='Módulo inicio';
                        break;
                case 4: $subcategoria='Módulo mi cuenta';
                        break;
                case 5: $subcategoria='Módulo paquetería';
                        break;
                case 6: $subcategoria='Módulo solicitudes';
                        break;
                case 7: $subcategoria='Módulo tickets';
                        break;
                case 8: $subcategoria='Otra';
                        break;
            }
        }

        //$finalizado = explode ( " ", $respuesta['fecha_finalizado']);
        $html.='<div class="row" style="margin-top:10px;" id="situacionApertura" value='.$respuesta['situacion'].'>
                    <div class="col-md-6">
                        <span><b>Ticket: </b><span id="categoriaTicketModal" value="'.$respuesta['area'].'" style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$respuesta['id_ticket'].'</span></span>
                    </div>
                    <div class="col-md-6">
                        <span id="folioTicket" value="'.$respuesta['id_ticket'].'"><b></b><span style="line-height:25px;"></span></span>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-4">
                        <span><b>Registrado: </b><span class="textoMay" style="font-size:13px;">'.date("g:i a",strtotime($fecha[1])).' <i class="fa fa-clock-o text-aqua"></i> - '.MetodosDiversos::formatearFecha($fecha[0],true).' <i class="fa fa-calendar text-yellow"></i></span></span>
                    </div>
                    <div class="col-md-4">
                        <span><b>Atendido: </b><span class="textoMay" style="font-size:13px;">'.$fAtendido .' <i class="fa fa-clock-o text-aqua"></i> - '.$horaAtendido.' <i class="fa fa-calendar text-yellow"></i></span></span>
                    </div>
                    <div class="col-md-4">
                        <span><b>Finalizado: </b><span class="textoMay" style="font-size:13px;">'.$fFinalizado.' <i class="fa fa-clock-o text-aqua"></i> - '.$horaFinalizado.' <i class="fa fa-calendar text-yellow"></i></span></span>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">   
                    <div class="col-md-12">
                        <span><b>Tiempo de respuesta: </b><span class="textoMay" style="font-size:13px;">'.$tiempoRespuesta.'</span></span>
                    </div>
                </div>
                <hr>';
        $html2.='<div class="row" style="margin-top:-15px;">
					<div class="col-md-12">
						<span class="encabezadoDato">Nombre: </span>'.$empleado['nombre'] .' '.$empleado['paterno'].' '.$empleado['materno'].'
					</div>
                </div>
                <div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Sucursal: </span>'.$sucursal['nombre'].'
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Departamento: </span>'.Departamentos::vistaDepartamentos2Model($empleado["id_departamento"],"departamentos_ae").'
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Puesto: </span>'.Departamentos::vistaPuestos2Model($empleado["id_puesto"],"puestos_ae").'
					</div>
                </div>
                <br>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Correo: </span>'.$empleado["correo"].'
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Teléfono: </span>'.gestionSucursales::mostrarTelefonos2Controllers($sucursal["id_sucursal"]).'
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Extensión: </span>'.$empleado["extension"].'
					</div>
                </div>
                <hr>';
        $html3='<div class="row">
                    <div class="col-md-6">
                        <span class="encabezadoDato">Categoria: </span>'.$area.'
                    </div>
                    <div class="col-md-6">
                        <span class="encabezadoDato">Subcategoria: </span><span class="textoMay">'.$subcategoria.'</span>
                    </div>
                </div>';
        if($respuesta["segmento"] != NULL){
        $html3.='<div class="row">
                    <div class="col-md-12">
                        <span class="encabezadoDato">Segmento: </span><span class="textoMay">'.$segmento.'</span>
                    </div>
                </div>';
        }
        $html3.='<div class="row">
                    <div class="col-md-6">
                        <span class="encabezadoDato">Asunto: </span><span id="getAsunto">'.$respuesta["asunto"].'</span>
                    </div>
                    <div class="col-md-6">
                        <span class="encabezadoDato">Archivos: </span>';
        if($respuesta['imagen']!=NULL){
                $html3.='<div class="btn btn-default btn-file">
                                <i class="fa fa-download"></i>
                                <a href="intranet/imagenes-tickets/'.$respuesta['imagen'].'" download="imagen-'.$empleado['nombre'].'-'.$respuesta['id_ticket'].'">Imagen</a>
                        </div>';
        }
        if($respuesta['documento']!=NULL){
                $html3.='<div class="btn btn-default btn-file">
                                <i class="fa fa-download"></i>
                                <a href="intranet/documentos-tickets/'.$respuesta['documento'].'" download="documento-'.$empleado['nombre'].'-'.$respuesta['id_ticket'].'">Documento</a>
                        </div>';
        }
           $html3.='</div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        '.mb_strtoupper($respuesta["descripcion"],'utf-8').'
                    </div>
                </div>';
                
                echo json_encode(array('html'=>$html,'html2'=>$html2,'html3'=>$html3,'imagen'=>$empleado['imagen'],'numero'=>$respuesta['id_ticket']));
    }

    public static function mostaraDatosTicket2($ticket){
        $html=$html2=$html3='';
        $respuesta = TicketsModel::mostaraDatosTicket($ticket,Tablas::tickets());
        $empleado = Datos::mostrarDatosEmpleadoAgenda($respuesta['id_atiende_ticket'],Tablas::usuarios());
        $sucursal = Sucursales::mostrarSucursalActualizarModel($empleado["id_sucursal"],Tablas::sucursales());

        if($respuesta['visto']){
                TicketsModel::ticketVisto($ticket,Tablas::tickets());//el usuario ya leyo la respuesta
                //$icono = 1;
        }

        $fecha = explode ( " ", $respuesta['fecha_registro']);
        $fAtendido=$horaAtendido='';
        $fFinalizado=$horaFinalizado='';
        $tiempoRespuesta='';
        if($respuesta['fecha_atendido']!= NULL){
             $atendido = explode ( " ", $respuesta['fecha_atendido']);
             $fAtendido = date("g:i a",strtotime($atendido[1]));
             $horaAtendido = MetodosDiversos::formatearFecha($atendido[0],true);
        }
        if($respuesta['fecha_finalizado']!= NULL){
            $finalizado = explode ( " ", $respuesta['fecha_finalizado']);
            $fFinalizado = date("g:i a",strtotime($finalizado[1]));
            $horaFinalizado = MetodosDiversos::formatearFecha($finalizado[0],true);
            $tiempoRespuesta=MetodosDiversos::tiempoRespuesta($respuesta['fecha_registro'],$respuesta['fecha_finalizado']);
       }
       $area='';
       $subcategoria='';
       $segmento='';
       if($respuesta["area"] == 1){
            $area='SOPORTE TÉCNICO';
            switch($respuesta["subcategoria"]){
                case 1: $subcategoria='Carpetas en Red';
                        break;
                case 2: $subcategoria='CONTPAQi Adminpaq';
                        break;
                case 3: $subcategoria='CONTPAQi Contabilidad y Bancos';
                        break;
                case 4: $subcategoria='CONTPAQi Facturación';
                        break;
                case 5: $subcategoria='CONTPAQi Nomipaq';
                        break;
                case 6: $subcategoria='Correo electrónico';
                        break;
                case 7: $subcategoria='Impresoras y Toner';
                        break;
                case 8: $subcategoria='Paquetería Office(Excel,Word, Power Point, etc.)';
                        break;
                case 9: $subcategoria='Red e Internet';
                        break;
                case 10: $subcategoria='Spark';
                        break;
                case 11: $subcategoria='XML';
                        break;
                case 12: $subcategoria='Otra';
                        break;                                  
            }
       }
       else if($respuesta["area"] == 2){
            $area='GIRO';
            switch($respuesta["subcategoria"]){
                case 1: $subcategoria='Nóminas';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Cálculos Extraordinarios';
                                    break;
                            case 2: $segmento='Finiquitos';
                                    break;
                            case 3: $segmento='Aguinaldos';
                                    break;
                            case 4: $segmento='Conexión a escritorio remoto';
                                    break;
                            case 5: $segmento='Usuarios y contraseñas';
                                    break;
                            case 6: $segmento='Reportes';
                                    break;
                            case 7: $segmento='Cálculos Extraordinarios';
                                    break;
                            case 8: $segmento='Timbrado';
                                    break;
                            case 9: $segmento='Alta de Clientes / Tipos de Nómina';
                                    break;
                            case 10: $segmento='Alta de Puestos';
                                    break;
                            case 11: $segmento='Alta de Turnos';
                                    break;
                            case 12: $segmento='Movimientos masivos';
                                    break;
                            case 13: $segmento='Otros';
                                    break;
                        }
                        break;
                case 2: $subcategoria='Procesos IMSS';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Altas';
                                    break;
                            case 2: $segmento='Bajas';
                                    break;
                            case 3: $segmento='Modificaciones salariales';
                                    break;
                            case 4: $segmento='Reingresos';
                                    break;
                            case 5: $segmento='Alta de Registros patronales';
                                    break;
                            case 6: $segmento='INFONAVIT';
                                    break;
                            case 7: $segmento='FONACOT';
                                    break;
                            case 8: $segmento='Movimientos masivos';
                                    break;
                            case 9: $segmento='Otros';
                                    break;
                        }
                        break;
                case 3: $subcategoria='Módulo Pre Alta';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Captura de información';
                                    break;
                            case 2: $segmento='Correo electrónico';
                                    break;
                            case 3: $segmento='Exportación de empleados';
                                    break;
                            case 4: $segmento='Otros';
                                    break;
                        }
                        break;
                case 4: $subcategoria='Módulo Recibos CFDI';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Error en timbre';
                                    break;
                            case 2: $segmento='XML y PDF';
                                    break;
                            case 3: $segmento='Reportes';
                                    break;
                            case 4: $segmento='Falta de timbres';
                                    break;
                            case 5: $segmento='Otros';
                                    break;
                        }
                        break;
                case 5: $subcategoria='Módulo Archivo Electrónico';
                        switch($respuesta["segmento"]){
                            case 1: $segmento='Alta de nuevos documentos';
                                    break;
                            case 2: $segmento='Otros';
                                    break;
                        }
                        break;
                case 6: $subcategoria='Otra';
                        break;
            }
        }
        else{
            $area='DESARROLLO DE SOFTWARE';
            switch($respuesta["subcategoria"]){
                case 1: $subcategoria='Ingreso al sistema';
                        break;
                case 2: $subcategoria='Módulo agenda empresarial';
                        break;
                case 3: $subcategoria='Módulo inicio';
                        break;
                case 4: $subcategoria='Módulo mi cuenta';
                        break;
                case 5: $subcategoria='Módulo paquetería';
                        break;
                case 6: $subcategoria='Módulo solicitudes';
                        break;
                case 7: $subcategoria='Módulo tickets';
                        break;
                case 8: $subcategoria='Otra';
                        break;
            }
        }

        $labelAtiende = 'Te atiende: ';
        if($respuesta['situacion'] == 2)
                $labelAtiende = 'Te atendio: ';
        //$finalizado = explode ( " ", $respuesta['fecha_finalizado']);
        $html.='<div class="row" style="margin-top:10px;">
                    <div class="col-md-6">
                        <span><b>Ticket: </b><span id="categoriaTicketModal" value="'.$respuesta['area'].'" style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">'.$respuesta['id_ticket'].'</span></span>
                    </div>
                    <div class="col-md-6">
                        <span id="folioTicket" value="'.$respuesta['id_ticket'].'"><b></b><span style="line-height:25px;"></span></span>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-4">
                        <span><b>Registrado: </b><span class="textoMay" style="font-size:13px;">'.date("g:i a",strtotime($fecha[1])).' <i class="fa fa-clock-o text-aqua"></i> - '.MetodosDiversos::formatearFecha($fecha[0],true).' <i class="fa fa-calendar text-yellow"></i></span></span>
                    </div>
                    <!--<div class="col-md-4">
                        <span><b>Atendidoooo: </b><span class="textoMay" style="font-size:13px;">'.$fAtendido .' <i class="fa fa-clock-o text-aqua"></i> - '.$horaAtendido.' <i class="fa fa-calendar text-yellow"></i></span></span>
                    </div>-->
                    <div class="col-md-4">
                        <span><b>Finalizado: </b><span class="textoMay" style="font-size:13px;">'.$fFinalizado.' <i class="fa fa-clock-o text-aqua"></i> - '.$horaFinalizado.' <i class="fa fa-calendar text-yellow"></i></span></span>
                    </div>
                </div>
                <!--<div class="row" style="margin-top:10px;">   
                    <div class="col-md-12">
                        <span><b>Tiempo de respuesta: </b><span class="textoMay" style="font-size:13px;">'.$tiempoRespuesta.'</span></span>
                    </div>
                </div>-->
                <hr>';
        $html2.='<div class="row" style="margin-top:-15px;">
					<div class="col-md-12">
						<span class="encabezadoDato">'.$labelAtiende.' </span>'.$empleado['nombre'] .' '.$empleado['paterno'].' '.$empleado['materno'].'
					</div>
                </div>
                <div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Sucursal: </span>'.$sucursal['nombre'].'
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Departamento: </span>'.Departamentos::vistaDepartamentos2Model($empleado["id_departamento"],"departamentos_ae").'
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Puesto: </span>'.Departamentos::vistaPuestos2Model($empleado["id_puesto"],"puestos_ae").'
					</div>
                </div>
                <br>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Correo: </span>'.$empleado["correo"].'
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Teléfono: </span>'.gestionSucursales::mostrarTelefonos2Controllers($sucursal["id_sucursal"]).'
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Extensión: </span>'.$empleado["extension"].'
					</div>
                </div>
                <hr>';
        $html3='<div class="row">
                    <div class="col-md-6">
                        <span class="encabezadoDato">Categoria: </span>'.$area.'
                    </div>
                    <div class="col-md-6">
                        <span class="encabezadoDato">Subcategoria: </span><span class="textoMay">'.$subcategoria.'</span>
                    </div>
                </div>';
        if($respuesta["segmento"] != NULL){
        $html3.='<div class="row">
                    <div class="col-md-12">
                        <span class="encabezadoDato">Segmento: </span><span class="textoMay">'.$segmento.'</span>
                    </div>
                </div>';
        }
        $html3.='<div class="row">
                    <div class="col-md-6">
                        <span class="encabezadoDato">Asunto: </span>'.$respuesta["asunto"].'
                    </div>
                    <div class="col-md-6">
                        <span class="encabezadoDato">Archivos: </span>';
        if($respuesta['imagen']!=NULL){
                $html3.='<div class="btn btn-default btn-file">
                                <i class="fa fa-download"></i>
                                <a href="intranet/imagenes-tickets/'.$respuesta['imagen'].'" download="imagen-'.$empleado['nombre'].'-'.$respuesta['id_ticket'].'">Imagen</a>
                        </div>';
        }
        if($respuesta['documento']!=NULL){
                $html3.='<div class="btn btn-default btn-file">
                                <i class="fa fa-download"></i>
                                <a href="intranet/documentos-tickets/'.$respuesta['documento'].'" download="documento-'.$empleado['nombre'].'-'.$respuesta['id_ticket'].'">Documento</a>
                        </div>';
        }
           $html3.='</div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        '.mb_strtoupper($respuesta["descripcion"],'utf-8').'
                    </div>
                </div>';

        if($respuesta['situacion'] == 2){
          $html3.='<hr>
                <div class="row">
                        <div class="col-md-12">
                                <p class="callout callout-success">*En caso de que consideres que tu problema no fue resuelto puedes solicitar al equipo de sistemas que reabran el ticket para dar seguimiento al caso.</p>
                        </div>
                 </div>';
        }        
                echo json_encode(array('html'=>$html,'html2'=>$html2,'html3'=>$html3,'imagen'=>$empleado['imagen'],'numero'=>$respuesta['id_ticket'],'estadoBoton'=>$respuesta['situacion']));
    }

    public static function asignarTicket($ticket,$area,$atiende){
       
        $respuesta = TicketsModel::asignarTicket($ticket,$area,$atiende,Tablas::tickets());
        echo $respuesta;
    }

    public static function cerrarTicket($ticket,$solucion,$causa,$problema){
   
        $respuesta = TicketsModel::cerrarTicket($ticket,$solucion,$causa,$problema,Tablas::tickets());
        echo $respuesta;
    }

    public static function cerrarTicket2($ticket){
       
        $respuesta = TicketsModel::CerraTicketReabierto($ticket,Tablas::tickets());
        echo $respuesta;
    }

    public static function actualizarSolucion($ticket,$solucion,$causa,$problema){
      
        $respuesta = TicketsModel:: actualizarSolucion($ticket,$solucion,$causa,$problema,Tablas::tickets());
        echo $respuesta;
    }
   
    public static function usuarios($sucursal){
		$respuesta=Datos::usuariosEquiposComputo($sucursal,Tablas::usuarios());
		$campo='<select class="form-control textoMay" name="usuarioTicketCreado" id="usuarioTicketCreado" required><option value=""></option>';
		foreach($respuesta as $row => $item){
			$campo.='<option value="'.$item["id_usuario"].'">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
		}
		$campo.='</select>';
		return $campo;
    }
    
    public static function datosParaGraficar($id){
        $respuesta =  TicketsModel::datosParaGraficar($id,Tablas::tickets());
        return $respuesta;
    }

    public static function datosGraficasBarras($categoria){
        $respuesta =  TicketsModel::datosGraficasBarras($categoria,Tablas::tickets());
        return $respuesta;
    }

    public static function reabrirTicket($idTicket){ //usuario solicita se reabra el ticket
        $respuesta =  TicketsModel::reabrirTicket($idTicket,Tablas::tickets());
        return $respuesta;
    }

    public static function reabrirTicketSoporte($idTicket,$flag,$motivo){ //soporte reabrir ticket
        $respuesta =  TicketsModel::reabrirTicketSoporte($idTicket,$flag,$motivo,Tablas::tickets());
        return $respuesta;
    }

    public static function totalPorReabrir(){
        $respuesta =  TicketsModel::totalPorReabrir(Tablas::tickets());
        return $respuesta;
    }

    public static function mostrarSolucionTicket($idTicket){
        $respuesta =  TicketsModel::mostrarSolucionTicket($idTicket,Tablas::tickets());
        return $respuesta;
    }

    public static function mostrarColaTicketsReabiertos(){
        $respuesta = TicketsModel::mostrarColaTicketsReabiertos(Tablas::tickets());
        $html='';
        $colorFila= true;
        foreach($respuesta as $row => $item){
            $boton = '<div class="campoDetalleEncabezado"><button type="button" value="" class="btn btn-success mostrarDatosTicketFinalizados" data-toggle="modal" data-target="#ventanaReabrirTicket">Mostrar</button></div>';
           
            $icono='<i class="fa fa-wrench fa-2x text-green"></i>';

            if($item["area"]==2)
                $icono='<i class="fa fa-chrome fa-2x text-green"></i>';
            
            else if($item["area"]==3)
                $icono='<i class="fa fa-file-code-o fa-2x text-green"></i>';
            
            $finalizado = explode ( " ", $item['fecha_finalizado']);

            $usuario = Datos::mostrarUsuarioUnicoModel2($item["id_usuario"],Tablas::usuarios());
            $atiende='<div class="campoNombreTicketEncabezado">'.$usuario['nombre'].' '.$usuario['paterno'].' '.$usuario['materno'].'</div>';
            
            $html.='<div class="divContenedorPadre renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_ticket"].'">
                    <div class="campoIdTicketEncabezado">'.$item["id_ticket"].'</div>';
            $html.= $atiende;        
            $html.='<div class="campoAsuntoEncabezado">'.$item["asunto"].'</div>
                    <div class="campoCierreEncabezado textoMay">'.MetodosDiversos::formatearFecha($finalizado[0],true).'</div>
                    <div class="campoSituacionEncabezado">'.$icono.'</div>';
            $html.=$boton;        
            $html.= '</div>';
        }
        return $html;     
    }

    public static function mostrarListaHistorial($idTicket){
        $respuesta =  TicketsModel::mostrarListaHistorial($idTicket,Tablas::tickets_historial(),Tablas::usuarios());
        $colorFila= true;
        $numero=1;
        $html="";
        foreach($respuesta as $row => $item){
                $apertura = explode ( " ", $item['fecha_apertura']);
                $atendido = explode ( " ", $item['fecha_atendido']);
                $cierre = explode ( " ", $item['fecha_cierre']);
                $html.='<div class="divContenedorTicket renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" value="'.$item["id_registro"].'">
                                <div class="campoIdTicket">'.$numero.'</div>
                                <div class="campoNombreTicket">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>
                                <div class="campoAsunto textoMay">'.MetodosDiversos::formatearFecha($apertura[0],true).'   '.$apertura[1].'</div>
                                <div class="campoSituacion textoMay">'.MetodosDiversos::formatearFecha($atendido[0],true).' '.$atendido[1].'</div>
                                <div class="campoCierre textoMay">'.MetodosDiversos::formatearFecha($cierre[0],true).' '.$cierre[1].'</div>
                                <div class="campoDetalle"><button type="button" value="'.$item["id_registro"].'" class="btn btn-success motivoAperturaCierreTicket" data-toggle="modal" data-target="#motivoAperturaCierreTicket">Mostrar</button></div>
                        </div>';
                $numero++;
        }
        return $html;
    } 

    public static function detallesAperturaCierre($idTicket){
        $respuesta = TicketsModel::detallesAperturaCierre($idTicket,Tablas::tickets_historial());
        return $respuesta;
    }

    public static function verificarSituacionTicket($idTicket){
        $respuesta = TicketsModel::verificarSituacionTicket($idTicket,Tablas::tickets());
        return $respuesta;
    }

    public static function comprobarRespuestaTickets(){
        $respuesta = TicketsModel::comprobarRespuestaTickets(Tablas::tickets());
        return $respuesta;
    }

    public static function resetearMensajes(){
        $respuesta = TicketsModel::resetearMensajes(Tablas::tickets());
        return $respuesta;
    }

    public static function comprobarRespuestaTicketsMensajes(){
        $respuesta = TicketsModel::comprobarRespuestaTicketsMensajes(Tablas::tickets());
        return $respuesta;
    }

    public static function TotalReabiertosPantalla($area){
        $respuesta = TicketsModel::totalPorReabrir2(Tablas::tickets(),$area);
        return $respuesta;
    } 



##################################NUEVA VERSIÓN TICKETS ############################################
        private static $ruta = "../intranet/documentos-tickets-2/";
        private static $rutaG = "intranet/documentos-tickets-2/";
        
        public static function totalTickets($situacion,$area=""){//contador de status de tickets
                return TicketsModel::totalTickets($situacion,$area,Tablas::tickets());
        }

        public static function modalPorAtender(){//contador de status de tickets por categoria
                return array('soporte'=>self::totalTickets(0,1),'giro'=>self::totalTickets(0,2),'desarrollo'=>self::totalTickets(0,3));//(situacion del ticket,área o categoria)
        }

        public static function personalSoporte(){//Lista de personal que esta atendiendo ticket
                $html='';
                $respuesta = TicketsModel::personalSoporte(Tablas::usuarios());
                foreach($respuesta as $row=>$item){
                        $imagen= $item['imagen'] ? "views/imagenes-usuarios/mini/".$item['imagen'] : 'views/img/user2.png';
                        $tickets=TicketsModel::listaTicketsAtendiendo($item['id_usuario'],Tablas::tickets());
                        $lista = '';
                        foreach($tickets as $row2=>$item2)
                                $lista .=$item2['id_ticket'].' - ';
                        $lista = substr($lista,0,-2);
                        $html.='<div class="col-md-12">
                                        <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><img style="vertical-align:baseline" src="'.$imagen.'"></span>
                                        <div class="info-box-content">
                                                <span class="info-box-text">'.$item['nombre'].'</span>
                                                <span class="info-box-number">Atiende: '.$lista.'</span>
                                        </div>
                                        </div>
                                </div>';
                }
                return array('error'=>false,'data'=>$html);
        }

        public static function personalSoporte2(){//Lista de personal para asignar un ticket (Administrador)
                $html='';
                $respuesta = TicketsModel::personalSoporte(Tablas::usuarios());
                foreach($respuesta as $row=>$item){
                        $imagen= $item['imagen'] ? "views/imagenes-usuarios/mini/".$item['imagen'] : 'views/img/user2.png';
                        $lista = substr($lista,0,-2);
                        $html.='<div class="col-md-12">
                                        <div class="info-box">
                                                <span class="info-box-icon bg-aqua"><img style="vertical-align:baseline" src="'.$imagen.'"></span>
                                                <div class="info-box-content">
                                                        <span class="info-box-text" data="'.$item['id_usuario'].'">'.$item['nombre'].'</span>
                                                        <span class="info-box-number"><button type="button" class="btn btn-primary btn-lg botonAsignarTicket2" style="margin:10px 0;display:flex;align-items:center;"> <i class="fa fa-ticket" style="margin-right:5px;"></i>Asignar ticket</button></span>
                                                </div>
                                        </div>
                                </div>';
                }
                return array('error'=>false,'data'=>$html);
        }

        public static function datosTicket($id){
                $respuesta = TicketsModel::getDetalleTicket($id,Tablas::tickets(),Tablas::usuarios(),Tablas::sucursales(),Tablas::departamentosIntranet(),Tablas::puestos());
                $imagen= $respuesta['imagen'] ? "views/imagenes-usuarios/mini/".$respuesta['imagen'] : 'views/img/user2.png';
                
                $atendido=$finalizado=$tiempo='';
                $registrado =  self::formateoDate($respuesta['fecha_registro']);

                if($respuesta['fecha_finalizado']!= NULL){
                        $finalizado =  self::formateoDate($respuesta['fecha_finalizado']);
                        $tiempo='<b>Tiempo de respuesta: </b>'.MetodosDiversos::tiempoRespuesta($respuesta['fecha_registro'],$respuesta['fecha_finalizado']);
                }
                if($respuesta['fecha_atendido']!= NULL){
                        $atendido = self::formateoDate($respuesta['fecha_atendido']);
                        $tiempo = $tiempo !="" ? $tiempo : '<b>Tiempo de espera: </b>'.MetodosDiversos::tiempoRespuesta($respuesta['fecha_registro'],date('Y-m-d H:i:s'));
                }     
                $tiempo = $tiempo !="" ? $tiempo : '<b>Tiempo de espera: </b>'.MetodosDiversos::tiempoRespuesta($respuesta['fecha_registro'],date('Y-m-d H:i:s'));
                
                $dir = self::$ruta.$id."/";
                foreach (glob($dir."*-usuario"."*") as $f)
                        $anexos .= self::documentos(basename($f),$id);

                $fechas ='<div class="col-sm-4 col-xs-6">
                                <b>Registrado: </b><span class="ocultar768 encabezado-min" style="background:none;color:#000;margin-left:-5px;">'.$registrado['fecha'].'  '.$registrado['hora'].' hrs.</span>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                                <b>Atendido:</b><span class="ocultar768 encabezado-min" style="background:none;color:#000;margin-left:-2px;">'.$atendido['fecha'] .' '.$atendido['hora'].' hrs.</span>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                                <b>Finalizado:</b><span class="ocultar768 encabezado-min" style="background:none;color:#000;margin-left:0;">'.$finalizado['fecha'].'  '.$finalizado['hora'].' hrs.</span>
                        </div>
                        <div class="col-sm-4 col-xs-6 mostrar768">
                                '.$registrado['fecha'].'  '.$registrado['hora'].'
                        </div>
                        <div class="col-sm-4 col-xs-6 mostrar768">
                                '.$atendido['fecha'].'  '.$atendido['hora'].'
                        </div>
                        <div class="col-sm-4 col-xs-6 mostrar768">
                                '.$finalizado['fecha'].'  '.$finalizado['hora'].'
                        </div>';
                $tiempoRespuesta='<div class="col-xs-12">
                                        '.$tiempo.'
                                </div>';
                $data=' <div class="panel box box-primary">
                                <div class="box-header with-border" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="cursor:pointer;">
                                        <h4 class="box-title">
                                                <a>
                                                        '.$respuesta['nombre'].'
                                                </a>
                                        </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="box-body">
                                                <div class="row">
                                                        <div class="col-xs-8">
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Sucursal:</b> '.$respuesta['sucursal'].'
                                                                        </div> 
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Departamento:</b> '.$respuesta['departamento'].'
                                                                        </div>
                                                                </div>
                                                                <div class="row" style="margin-bottom:-14px;">
                                                                        <div class="col-xs-12">
                                                                                <b>Puesto:</b> '.$respuesta['puesto'].' 
                                                                        </div>
                                                                </div>
                                                                <hr border:1px solid #f4f4f4;">
                                                                <div class="row" style="margin-top:-14px;">
                                                                        <div class="col-xs-12">
                                                                                <b>Correo:</b> '.$respuesta['correo'].'
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Teléfono:</b> '.gestionSucursales::mostrarTelefonos2Controllers($respuesta["id_sucursal"]).'
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Extensión:</b> '.$respuesta['extension'].'
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                                <img class="img-normal" src="'.$imagen.'" alt="views/img/user.png" height="140" width="140" style="cursor: pointer;margin-left:-2px;">
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-12">
                                        <b>Anexos: </b>'.$anexos.'
                                </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-xs-6">
                                        <b>Categoria: </b>'.TicketsModel::traducirReferencia($respuesta['subcategoria'],Tablas::tickets_categorias()).'
                                </div>
                                <div class="col-xs-6">
                                        <b>Subcategoria: </b>'.TicketsModel::traducirReferencia($respuesta['segmento'],Tablas::tickets_subcategorias()).'
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-12">
                                        <b>Asunto: </b><span id="asuntoProblema">'.$respuesta['asunto'].'</span>
                                </div>
                        </div>
                         <br>
                        <div class="row">
                                <div class="col-xs-12">
                                        '.$respuesta['descripcion'].'
                                </div>
                        </div>';
                        
                        if(intval($respuesta['reabrir']) === 1)//Tickets abiertos en cola de ser atendidos
                                $respuesta['situacion'] = 3;
                        else if(intval($respuesta['reabrir']) === 2)//Tickets abiertos en cola de ser atendidos
                                $respuesta['situacion'] = 4;

                        
                return array('error'=>false,'data'=>$data,'fechas'=>$fechas,'tiempoRespuesta'=>$tiempoRespuesta,'situacion'=>$respuesta['situacion']);
        }

        public static function datosTicket2($id){
                $respuesta = TicketsModel::getDetalleTicket2($id,Tablas::tickets());
                
                $finalizado='';
                $registrado =  self::formateoDate($respuesta['fecha_registro']);

                if($respuesta['visto']){
                        TicketsModel::ticketVisto($id,Tablas::tickets());//el usuario ya leyo la respuesta
                }

                if($respuesta['fecha_finalizado']!= NULL)
                        $finalizado =  self::formateoDate($respuesta['fecha_finalizado']);
                  
                $fechas ='<div class="col-sm-6 col-xs-6">
                                <b>Registrado: </b><span class="ocultar768 encabezado-min" style="background:none;color:#000;margin-left:-5px;">'.$registrado['fecha'].'  '.$registrado['hora'].' hrs.</span>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                                <b>Finalizado:</b><span class="ocultar768 encabezado-min" style="background:none;color:#000;margin-left:-2px;">'.$finalizado['fecha'].'  '.$finalizado['hora'].' hrs.</span>
                        </div>
                        <div class="col-sm-6 col-xs-6 mostrar768">
                                '.$registrado['fecha'].'  '.$registrado['hora'].'
                        </div>
                        <div class="col-sm-6 col-xs-6 mostrar768">
                                '.$finalizado['fecha'].'  '.$finalizado['hora'].'
                        </div>';
                if($respuesta['id_atiende_ticket'] === NULL){
                        $nombre="TU TICKET ESTA EN ESPERA";
                        $sucursal=$departamento=$puesto=$correo=$extension="";
                        $imagen="views/img/user2.png";
                }
                else{
                        $usuario=TicketsModel::soporteTecnico($respuesta['id_atiende_ticket'],Tablas::usuarios(),Tablas::sucursales(),Tablas::departamentosIntranet(),Tablas::puestos());
                        $imagen= $usuario['imagen'] ? "views/imagenes-usuarios/mini/".$usuario['imagen'] : 'views/img/user2.png';
                        $nombre=$usuario["nombre"];
                        $sucursal=$usuario["sucursal"];
                        $departamento=$usuario["departamento"];
                        $puesto=$usuario["puesto"];
                        $correo=$usuario["correo"];
                        $extension=$usuario["extension"];
                }

                $dir = self::$ruta.$id."/";
                foreach (glob($dir."*-usuario"."*") as $f)
                        $anexos .= self::documentos(basename($f),$id);
                
                $data=' <div class="panel box box-primary">
                                <div class="box-header with-border" data-parent="#accordion" href="#collapseOne">
                                        <h4 class="box-title">
                                                <a>
                                                        '.$nombre.'
                                                </a>
                                        </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse">
                                        <div class="box-body">
                                                <div class="row">
                                                        <div class="col-xs-8">
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Sucursal:</b> '.$sucursal.'
                                                                        </div> 
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Departamento:</b> '.$departamento.'
                                                                        </div>
                                                                </div>
                                                                <div class="row" style="margin-bottom:-14px;">
                                                                        <div class="col-xs-12">
                                                                                <b>Puesto:</b> '.$puesto.' 
                                                                        </div>
                                                                </div>
                                                                <hr border:1px solid #f4f4f4;">
                                                                <div class="row" style="margin-top:-14px;">
                                                                        <div class="col-xs-12">
                                                                                <b>Correo:</b> '.$correo.'
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Teléfono:</b> '.$sucursal.'
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-xs-12">
                                                                                <b>Extensión:</b> '.$extension.'
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-xs-4 text-right">
                                                                <img class="img-normal" src="'.$imagen.'" alt="views/img/user.png" height="140" width="140" style="cursor: pointer;margin-left:-2px;">
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-12">
                                        <b>Anexos: </b>'.$anexos.'
                                </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-xs-6">
                                        <b>Categoria: </b> '.TicketsModel::traducirReferencia($respuesta['sUBCATEGORIA'],Tablas::tickets_categorias()).'
                                </div>
                                <div class="col-xs-6">
                                        <b>Subcategoria: </b>'.TicketsModel::traducirReferencia($respuesta['segmento'],Tablas::tickets_subcategorias()).'
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-12">
                                        <b>Asunto:</b> '.$respuesta['asunto'].'
                                </div>
                        </div>
                         <br>
                        <div class="row">
                                <div class="col-xs-12">
                                        '.$respuesta['descripcion'].'
                                </div>
                        </div>';

               if($respuesta['reabrir'] == 1)
                        $respuesta['situacion'] = 1;
                        
                return array('error'=>false,'data'=>$data,'fechas'=>$fechas,'situacion'=>$respuesta['situacion'],'leido'=>$respuesta['visto']);
        }

        public static function getArchivosSoporte($id){
                $dir = self::$ruta.$id."/";
                foreach (glob($dir."*-soporte"."*") as $f)
                        $anexos .= self::documentos(basename($f),$id);
                return $anexos;
        }

        /*public static function traducirCategoriaSubcategoria($categoria){
                return TicketsModel::traducirCategoriaSubcategoria($categoria,Tablas::tickets_categorias());
        }*/

        private static function formateoDate($date){
                $date = explode ( " ", $date);
                return array('fecha'=>MetodosDiversos::formatearFecha($date[0],NULL,true),'hora'=>date("H:i",strtotime($date[1])));
        }

        private static function icono($area){
                if($area==1)
                        return '<i class="fa fa-wrench fa-2x" style="color:#00c0ef"></i>';
                else if($area==2)
                        return '<i class="fa fa-chrome fa-2x" style="color:#f39c12"></i>';
                else
                        return '<i class="fa fa-file-code-o fa-2x" style="color:#00a65a"></i>';
        }

        private static function boton($estado){
                if($estado == 0){//boton en cola de tickets por atender
                        return '<div class="btn-group">
                                        <a class="btn btn-success botonDatosTicket" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-caret-down" aria-hidden="true"></i> 
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li><a href="#" class="botonAsignarTicket"><i class="fa fa-users fa-fw"></i> Asignar</a></li>
                                                <li><a href="#" class="botonRedirigirTicket"><i class="fa fa-sitemap fa-fw"></i> Redirigir</a></li>
                                        </ul>
                                </div>';
                }
                else if($estado == 3){//Cola de histrial(con historial)
                        return '<div class="btn-group">
                                        <a class="btn btn-success botonDatosTicket" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-success dropdown-toggle botonHistorial" data-toggle="dropdown" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-history" aria-hidden="true"></i> 
                                        </a>
                                </div>';
                }//cola de atendiendose,cola de finalizados y cola de historial (sin historial)
                else{
                        return '<div class="btn-group">
                                        <a class="btn btn-success botonDatosTicket" style="padding-left:30px;padding-right:30px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                </div>';
                }
        }

        private static function labelAtiendeTicket($situacion,$idSoporte,$nombreUsuario){
                if($situacion > 0){
                        $nombreSoporte = Datos::mostrarUsuarioUnicoModel2($idSoporte,Tablas::usuarios());
                        return '<div class="row">
                                        <div class="col-xs-12">
                                                '.$nombreUsuario.'
                                        </div>
                                        <div  class="col-xs-12" style="margin-left:10px;width:95%;font-size:12px;background:#186E80;color:#fff;padding-left:10px;border:1px dotted #000">
                                                Atendido por: '.$nombreSoporte['nombre'].'
                                        </div>
                                </div>';
                }
                else
                        return $nombreUsuario;
                
        }

        public static function totalPorReabrir_(){
                return TicketsModel::totalPorReabrir_(Tablas::tickets());
        }

        public static function mostrarColaTicketsReabiertos_(){
                $respuesta = TicketsModel::mostrarColaTicketsReabiertos_(Tablas::tickets(),Tablas::usuarios());
                $html='';
                $colorFila= true;
                foreach($respuesta as $row => $item){
                        $boton = '<div class="btn-group campoDetalleEncabezado">
                                        <a class="btn btn-success botonDatosTicket" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                </div>';
                        $icono=self::icono($item["area"]);//Indica si el ticket es de sporte,giro o desarrollo
                        $finalizado = explode ( " ", $item['fecha_finalizado']);
                        $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id_ticket"].'">
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768" '.$alerta.'>'.$item["id_ticket"].'</div>
                                        <div class="col-sm-3 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Nombre:</span>'.$item['nombre'].'</div>
                                        <div class="col-sm-4 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Asunto:</span>'.$item["asunto"].'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Cerrado:</span>'.MetodosDiversos::formatearFecha($finalizado[0],true).'</div>
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" data="'.$item["area"].'"><span class="ocultar768 encabezado-min">Área:</span>'.$icono.'</div>
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Opciones:</span>'.$boton.'</div>
                                </div>';
                }
                $html = $html == '' ? '<div style="text-align:center;margin-top:5%;"><span style="font-size:40px;">NO HAY TICKETS POR ABRIR</span><br><i class="fa fa-smile-o" style="font-size:110px;margin-bottom:5%;color:#3489df;"></i></div>' : $html;
                return array('error'=>false,'data'=>$html);     
        }

        public static function mostrarColaTickets_($situacion,$mostrarAsignados=false){
                $respuesta = TicketsModel::mostrarColaTickets_($situacion,$mostrarAsignados,Tablas::tickets(),Tablas::usuarios());
                $html='';
               
                $colorFila= true;
                
                foreach($respuesta as $row => $item){
                        
                        $alerta='';//Indica si un ticket esta más de un día en una cola o es abierto
                        if($situacion == 0){//aplica para la cola de pendientes por atender
                                $fechaRegistrado = explode (" ", $item['fecha_registro']);
                                if($fechaRegistrado[0] != date("Y-m-d"))
                                        $alerta = 'style="background:#454545;color:#ffffff"';
                        }
                        else{//aplica para la cola de atendiendose y finalizados
                                if($item['reabrir'] == 2 || $item['ultima_fecha_cierre'] == date('Y-m-d'))//Saber si el ticket fue abierto (el ticket esta en la cola de atendiendose o el ticket esta en la cola de finalizados)
                                        $alerta = 'style="background:#dd4b39;color:#ffffff"';
                                else{
                                        $atendido = explode (" ", $item['fecha_atendido']);
                                        if($atendido[0] != date("Y-m-d"))
                                                $alerta = 'style="background:#454545;color:#ffffff"';   
                                }
                                
                        }
                        if($situacion < 2)
                                $boton = self::boton($situacion);//Indica el botón que corresponde en relación a los privilegios y situación del ticket
                        else
                                $boton = (TicketsModel::saberSiTicketTieneHistorial($item["id_ticket"],Tablas::tickets_historial()) > 0) ? self::boton(3) : self::boton(1);
                        $icono=self::icono($item["area"]);//Indica si el ticket es de sporte,giro o desarrollo
                        $nombres = self::labelAtiendeTicket($situacion,$item["id_atiende_ticket"],$item['usuario']);//Muestra el nombre de la persona que levanto el ticket y de la persona que lo atiende en relación a los privilegios y situación del ticket

                        $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id_ticket"].'">
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768" '.$alerta.'>'.$item["id_ticket"].'</div>
                                        <div class="col-sm-4 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Nombre:</span>'.$nombres.'</div>
                                        <div class="col-sm-4 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Asunto:</span>'.$item["asunto"].'</div>
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" data="'.$item["area"].'"><span class="ocultar768 encabezado-min">Área:</span>'.$icono.'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Opciones:</span>'.$boton.'</div>
                                </div>';
                }
                return $html == '' ? '<div style="text-align:center;margin-top:5%;"><span style="font-size:40px;">NO HAY TICKETS</span><br><i class="fa fa-smile-o" style="font-size:110px;margin-bottom:5%;color:#3489df;"></i></div>' : $html;
        }

        public static function motivoApertura($id,$target){
                if($target)
                        return array('error'=>false,'motivo'=>TicketsModel::motivoApertura2($id,Tablas::tickets_historial()));
                return array('error'=>false,'motivo'=>TicketsModel::motivoApertura($id,Tablas::tickets()));
        }

        public static function totalHistorialTickets_($buscar='',$limite=''){ //lista de tickets finalizados en días posteriores al actual
                $respuesta = TicketsModel::historialTickets_($buscar,$limite,Tablas::tickets(),Tablas::usuarios());
                return count($respuesta);
        }

        public static function historialTickets_($buscar,$limite=''){ //lista de tickets finalizados en días posteriores al actual
                $respuesta = TicketsModel::historialTickets_($buscar,$limite,Tablas::tickets(),Tablas::usuarios());
                $html='';
                $colorFila= true;
        
                foreach($respuesta as $row => $item){
                        $boton = (TicketsModel::saberSiTicketTieneHistorial($item["id_ticket"],Tablas::tickets_historial()) > 0) ? self::boton(3) : self::boton(1);
                        $finalizado = explode ( " ", $item['fecha_finalizado']);
                        $nombres = self::labelAtiendeTicket(2,$item["id_atiende_ticket"],$item['usuario']);
                        $icono=self::icono($item["area"]);
                        $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id_ticket"].'">
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$item["id_ticket"].'</div>
                                        <div class="col-sm-3 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Nombre:</span>'.$nombres.'</div>
                                        <div class="col-sm-3 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Asunto:</span>'.$item["asunto"].'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Fecha:</span>'.MetodosDiversos::formatearFecha($finalizado[0],true).'</div>
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" data="'.$item["area"].'"><span class="ocultar768 encabezado-min">Área:</span>'.$icono.'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Opciones:</span>'.$boton.'</div>
                                </div>';
                }
                return $html;
        }

        public static function mostrarSolucion($idTicket){
                $respuesta =  TicketsModel::mostrarSolucion($idTicket,Tablas::tickets());
                return $respuesta;
        }

        public static function totalAbiertos(){
                return TicketsModel::totalAbiertos(Tablas::tickets_historial());
        }

        public static function estadisticas(){
                $html='<div class="row">';
                $indice=0;

                $respuesta =  TicketsModel::ticketsFinalizados(Tablas::usuarios(),Tablas::tickets());//obtener a las personas que cerraron ticket por primeraa vez o abiertos

                $total = self::totalTickets(2);
                $porcentaje = $total > 0 ? ( 100 /  $total ) : 0; //por la division entre cero

                $total2 = self::totalAbiertos();
                $porcentaje2 = $total2 > 0 ? ( 100 /  $total2 ) : 0; //por la division entre cero
                
                foreach($respuesta as $row=>$item){
                        $imagen= $item['imagen'] ? "views/imagenes-usuarios/mini/".$item['imagen'] : 'views/img/user2.png';
                        $totalAbiertos = TicketsModel::ticketsTotalAbiertos($item['id'],Tablas::tickets_historial());
                        $totalNuevos = TicketsModel::ticketsTotalNuevos($item['id'],Tablas::tickets());
                        $html.='
                                        <div class="col-md-4">
                                                <div class="box box-widget widget-user">
                                                        <div class="widget-user-header" style="background: url(\'views/img/back-tickets3.jpeg\') center center;">
                                                                <h3 class="widget-user-username" style="color:#fff;">'.$item['nombre'].'</h3>
                                                        </div>
                                                        <div class="widget-user-image">
                                                                <img class="img-circle" src="'.$imagen.'" alt="User Avatar">
                                                        </div>
                                                        <div class="box-footer">
                                                                <div class="row">
                                                                        <div class="col-sm-6 border-right">
                                                                                <div class="description-block">
                                                                                        <h5 class="description-header">
                                                                                                <div class="progress">
                                                                                                        <div class="progress-bar" role="progressbar" style="width: '.intval($porcentaje * $totalNuevos).'%;">'.$totalNuevos.'</div>
                                                                                                </div>
                                                                                        </h5>
                                                                                        <span class="description-text">Tickest del día</span>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                                <div class="description-block">
                                                                                        <h5 class="description-header">
                                                                                                <div class="progress">
                                                                                                        <div class="progress-bar" role="progressbar" style="width: '.intval($porcentaje2 * $totalAbiertos).'%;background:#dd4b39">'.$totalAbiertos.'</div>
                                                                                                </div>
                                                                                        </h5>
                                                                                        <span class="description-text">Tickets abiertos</span>
                                                                                </div>
                                                                        </div>
                                                                
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>';
                        if((++$indice)===3){
                                $indice=0;
                                $html.='</div>
                                        <div class="row">';
                        }
                               
                }

                $html = $html == '<div class="row">' ? '<div style="text-align:center;margin-top:5%;"><span style="font-size:40px;">NO HAY TICKETS FINALIZADOS</span><br><i class="fa fa-smile-o" style="font-size:110px;margin-bottom:5%;color:#3489df;"></i></div>' : $html.'</div>';
                return array('error'=>false,'data'=>$html);
        }

        public static function cargarCategorias($area,$tipo){
                $cat="";
                $categorias = TicketsModel::cargarCategorias($area,Tablas::tickets_categorias());
                if($tipo==1){//Este tipo de campo lo necesito en los tickets de administrador
                        foreach($categorias as $row=>$item)
                                $cat.='<li class="categoria-padre" name="'.$item['id'].'">'.$item['nombre'].'</li>';
                }
                else{//Este tipo lo necesito en el usuario común
                        $cat.='<option value=""></option>';
                        foreach($categorias as $row=>$item)
                                $cat.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
                }
                
                return array('categorias'=>$cat);
        }

        public static function cargarSubCategorias($area,$categoria,$tipo){
                $cat="";
                $categorias = TicketsModel::cargarSubCategorias($area,$categoria,Tablas::tickets_subcategorias());
                if($tipo==1){//Este tipo de campo lo necesito en los tickets de administrador
                        foreach($categorias as $row=>$item)
                                $cat.='<li name="'.$item['id'].'">'.$item['nombre'].'</li>';
                }
                else{//Este tipo lo necesito en el usuario común
                        $cat.='<option value=""></option>';
                        foreach($categorias as $row=>$item)
                                $cat.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
                }
                return array('subcategorias'=>$cat);
        }

        public static function agregarCategoria($area,$nombre){
                $respuesta = TicketsModel::agregarCategoria($area,$nombre,Tablas::tickets_categorias());
                if($respuesta !== false)
                        return array('error'=>false,'id'=>$respuesta);
                return array('error'=>true);
        }

        public static function agregarSubCategoria($area,$categoria,$nombre){
                $respuesta = TicketsModel::agregarSubCategoria($area,$categoria,$nombre,Tablas::tickets_subcategorias());
                if($respuesta !== false)
                        return array('error'=>false,'id'=>$respuesta);
                return array('error'=>true);
        }

        public static function sonido($archivo){
                $ext = new SplFileInfo($archivo["name"]);
                $ext = $ext->getExtension();
                if($ext !== "mp3")
                        return array("error"=>true,"tipo"=>"error","titulo"=>"Formato no válido","subtitulo"=>"Formatos válido: .mp3");
                $ruta = "../views/sonidos/tickets/".$_SESSION["identificador"]."/";
                if(!file_exists($ruta))
                        mkdir($ruta, 0777, true);
                else{
                        foreach (glob($ruta."*") as $nombre){
                                unlink($ruta.basename($nombre));
                        }            
                }
                if (move_uploaded_file($archivo["tmp_name"], $ruta."sonido-personalizado.mp3" ))
                        return array("error"=>false,"tipo"=>"success","titulo"=>"","subtitulo"=>"");
                else
                        return array("error"=>true,"tipo"=>"error","titulo"=>"Ocurrio un error","subtitulo"=>"el archivo no se pudo subir");
     
        }

        public static function sonido2($tipo){
                if($tipo=="1")
                        $tipo="Alert-notification.mp3";
                else if($tipo=="2")
                        $tipo="Cosmic-ringtone.mp3";
                else if($tipo=="3")
                        $tipo="Notification-tone.mp3";
                else if($tipo=="4")
                        $tipo="Sci-fi-device-high-tone.mp3";
                else if($tipo=="5")
                        $tipo="Short-sms-tone.mp3";
                else if($tipo=="6")
                        $tipo="Soft-alarm-tone.mp3";
                
                $ruta = "../views/sonidos/tickets/";

                if(!file_exists($ruta.$_SESSION["identificador"]."/"))
                        mkdir($ruta, 0777, true);
                else{
                        foreach (glob($ruta.$_SESSION["identificador"]."/*") as $nombre){
                                unlink($ruta.$_SESSION["identificador"]."/".basename($nombre));
                        }            
                }

                if(copy($ruta.$tipo, $ruta.$_SESSION["identificador"]."/".$tipo))
                        return array("error"=>false,"tipo"=>"success","titulo"=>"","subtitulo"=>"");
                else
                        return array("error"=>true,"tipo"=>"error","titulo"=>$valor,"subtitulo"=>"No se pudo actualizar");
        }

        public static function crearTicket($data){
                if($data['usuario'] !== null){
                        if( ($data['usuario'] = MetodosDiversos::validarFormatoEntero($data['usuario'],true))  === true ) 
                                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del usuario que levanta el ticket no es correcto');
                }
               if( ($data['area'] = MetodosDiversos::validarFormatoEntero($data['area'],true))  === true ) 
                        return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del área no es correcto');
                if( ($data['categoria'] = MetodosDiversos::validarFormatoEntero($data['categoria'],true))  === true ) 
                        return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato de la categoriaaaaaaaaaaa no es correcto');
                if($data['subcategoria'] !== null){
                        if( ($data['subcategoria'] = MetodosDiversos::validarFormatoEntero($data['subcategoria'],true))  === true ) 
                                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato de la subcategoria no es correcto');
                }
                if( ($data['asunto'] = MetodosDiversos::validarFormatoTexto($data['asunto'],true))  === true ) 
                        return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El campo asunto no debe estar en blanco ni tener ninguno de los siguientes caracteres especiales: < > " \''); 
                
                $data["descripcion"] = str_replace('<br />','~',$data["descripcion"]);
                if( ($data['descripcion'] = MetodosDiversos::validarFormatoTexto($data['descripcion'],true))  === true ) 
                        return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El campo comentarios no debe estar en blanco ni tener ninguno de los siguientes caracteres especiales: < > " \''); 
                $data["descripcion"]= str_replace('~','<br />',$data["descripcion"]);

                $resp = TicketsModel::crearTicket($data,Tablas::tickets());
                if(!$resp['error']){
                        if(!empty($data['archivos']))
                                self::cargarArchivos($data['archivos'],$resp['ticket'],'usuario');
                        return array('error'=>false,'titulo'=>'Ticket No. '.$resp['ticket'],'subtitulo'=>'El equipo de soporte técnico se pondra en contacto a la brevedad.','tipo'=>'success','id'=>$resp['ticket']);
                }
                return $resp;
                //return array('error'=>true,'area'=>$data['area'],'categoria'=>$data['categoria'],'subcategoria'=>$data['subcategoria'],'asunto'=>$data['asunto'],'descripcion'=>$data['descripcion'],'totalarchivos'=>$data['total']);                
        }

        private static $fileType = array('pdf','doc','docx','xls','xlsx','ppt','pptx','jpg','jpeg','png','txt');
        private static function cargarArchivos($arreglo,$id,$usuario){
                $ruta = self::$ruta.$id;
                mkdir($ruta, 0777, true);
        
                $pesoMaximo = 5;
                $total = count($arreglo);
                $extension = array();
        
                for($i=0;$i<$total;$i++){
                    $info = new SplFileInfo($arreglo[$i]["name"]);
                    $extension[$i] = strtolower($info->getExtension());
                    if( in_array($extension[$i] ,self::$fileType) AND $arreglo[$i]["size"] <= $pesoMaximo * 1024 * 1024 ){
                        $a = $id.'-'.$i.'-'.date("Y-m-d-His").'-'.$usuario.'.'.$extension[$i];
                        $src = $ruta."/".$a;       
                        move_uploaded_file($arreglo[$i]["tmp_name"], $src);   
                    }
                }
        }

        static public function documentos($nombre,$id){
                $info = new SplFileInfo($nombre);
                $extension = $info->getExtension();
                $icono = self::tipo($extension,$nombre);
        
                $ruta= self::$rutaG.$id."/".$nombre;
        
                return '<div class="btn btn-default btn-file" style="margin-right:3px; ">
                            <a href="'.$ruta.'" download="'.$nombre.'">'.$icono.substr($nombre,0,6).'</a>
                        </div>';
        }

        static public function tipo($ext,$nombre){
                if($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png')
                    return '<i class="fa fa-file-image-o fa-2x text-purple"></i> ';
                else if($ext === 'ppt' || $ext === 'pptx')
                    return '<i class="fa fa-file-powerpoint-o fa-2x text-orange"></i> ';
                else if($ext === 'xls' || $ext === 'xlsx')
                    return '<i class="fa fa-file-excel-o fa-2x text-green"></i> ';
                else if($ext === 'doc' || $ext === 'docx')
                    return '<i class="fa fa-file-word-o fa-2x text-blue"></i> ';
                else if($ext === 'pdf')
                    return '<i class="fa fa-file-pdf-o fa-2x text-red"></i> ';
                else
                    return '<i class="fa fa-file-text-o fa-2x text-black"></i> ';
        }

        public static function historialTicketsUsuario_(){
                $respuesta = TicketsModel::historialTicketsUsuario_(Tablas::tickets(),Tablas::usuarios());
                $html='';
                $colorFila= true;
        
                foreach($respuesta as $row => $item){
        
                    $visto = $item['visto']==1 ? 'fa fa-eye-slash' : 'fa fa-eye text-black';
                    $boton  = '<div class="btn-group">
                                        <a class="btn btn-success botonDatosTicketUsuario" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="padding-left:1px;padding-right:1px;cursor:none;" href="#">
                                                <i style="font-size:20px;" class="ticketVisto '.$visto.'" aria-hidden="true"></i> 
                                        </a>
                                </div>';

                    if($item['situacion'] == 0 || $item['reabrir'] == 1)//es un ticket nuevo que esta esta en espera de ser atendio o en un ticket que se abrio a la espera de ser atendido
                        $icono= '<i class="fa fa-clock-o fa-2x text-yellow"></i>';
                    else if($item['situacion'] == 1 || $item['reabrir'] == 2)//es un ticket nuevo que se esta atendiendo o es un ticket abierto que se esta atendiendo
                        $icono= '<i class="fa fa-cogs fa-2x text-green"></i>';
                    else// 2
                        $icono= '<i class="fa fa-check-square fa-2x text-blue"></i>';
                    
                    $registrado = explode ( " ", $item['fecha_registro']);
                    $nombre='<b>PENDIENTE POR SER ATENDIDO</b>';
                    if($item["id_atiende_ticket"] != NULL){
                        $usuarioSoporte = Datos::mostrarUsuarioUnicoModel2($item["id_atiende_ticket"],Tablas::usuarios());
                        $nombre = $usuarioSoporte['nombre'].' '.$usuarioSoporte['paterno'].' '.$usuarioSoporte['materno'];
                    }
                   
                    $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" id="'.$item["id_ticket"].'">
                                <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768"><b>'.$item["id_ticket"].'</b></div>
                                <div class="col-sm-3 col-xs-12 columna-div"><span class="ocultar768 encabezado-min"><b>Sistemas:</b></span>'.$nombre.'</div>
                                <div class="col-sm-3 col-xs-12 columna-div columna-div-centrar768"><span class="ocultar768 encabezado-min"><b>Asunto:</b></span>'.$item["asunto"].'</div>
                                <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768"><span class="ocultar768 encabezado-min"><b>Fecha:</b></span><span class="textoMay">'.MetodosDiversos::formatearFecha($registrado[0],true).'</span></div>
                                <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 iconoActualizable"><span class="ocultar768 encabezado-min"><b>Status:</b></span>'.$icono.'</div>
                                <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;"><b>Opciones:</b></span>'.$boton.'</div>
                        </div>';

                }
                return $html;     
        }

        public static function listarUsuarios($sucursal){
                $respuesta=Datos::usuariosEquiposComputo($sucursal,Tablas::usuarios());
                $campo='<option value=""></option>';
		foreach($respuesta as $row => $item)
			$campo.='<option value="'.$item["id_usuario"].'">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
		return array('error'=>false,'data'=>$campo);
        }

        public static function redirigirTicket($id,$area){
                if(TicketsModel::redirigirTicket($id,$area,Tablas::tickets()))
                        return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>2000,'boton'=>false);
                return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error','tiempo'=>60000,'boton'=>true);     
        }

        public static function tomarTicket($id,$usuario){
                $respuesta=TicketsModel::tomarTicket($id,$usuario,Tablas::tickets());
                if(!$respuesta['error']){
                        $info = TicketsModel::getData($id,Tablas::usuarios(),Tablas::tickets());   
                        return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>2000,'boton'=>false,'id_destino'=>$info['atendido'],'nombreAtiende'=>$info['atiende']);
                }
                return $respuesta;
        }

        public static function guardarSolucion($data){
                /***********VALIDAR****************** */
                $resp = TicketsModel::guardarSolucion($data,Tablas::tickets());
                if(!$resp['error']){
                        if(!empty($data['archivos']))
                                self::cargarArchivos($data['archivos'],$data['id'],'soporte');
                        if($resp['flag']==1 || $resp['flag']==2){//cuando se atienda un ticket nuevo o abierto necesito el nombre de quien atiende y el id de quien es el ticket para avisarle de la situación de su ticket
                                $info = TicketsModel::getData($data['id'],Tablas::usuarios(),Tablas::tickets());    
                                return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>2000,'boton'=>false,'flag'=>true,'id_destino'=>$info['atendido'],'nombreAtiende'=>$info['atiende']);
                        }
                        return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>2000,'boton'=>false,'flag'=>false);
                }
                return $resp;
        }

        public static function reabrirTicketUsuario($id,$motivo){
		return TicketsModel::reabrirTicketUsuario($id,$motivo,Tablas::tickets());
        }
        
        public static function autorizarApertura($id){
                $respuesta = TicketsModel::autorizarApertura($id,Tablas::tickets());
                if(!$respuesta['error']){
                        $info = TicketsModel::getData($id,Tablas::usuarios(),Tablas::tickets());   
                        return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>2000,'boton'=>false,'id_destino'=>$info['atendido'],'nombreAtiende'=>$info['atiende']);
                }
                return $respuesta;
               
        }

        public static function mostrarListaHistorial_($id){//mostrar el historia de un ticket
                $respuesta =  TicketsModel::mostrarListaHistorial_($id,Tablas::tickets_historial(),Tablas::usuarios());
                $colorFila= true;
                $numero=1;
                $html="";
                foreach($respuesta as $row => $item){
                        $apertura = explode ( " ", $item['fecha_apertura']);
                        $atendido = explode ( " ", $item['fecha_atendido']);
                        $cierre = explode ( " ", $item['fecha_cierre']);
                        $boton = '<div class="btn-group campoDetalleEncabezado">
                                        <a class="btn btn-success detalleBitacoraHistorialTicket" style="padding-left:10px;padding-right:10px;" href="#">
                                                <i style="font-size:20px;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                </div>';
                        $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id_registro"].'">
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                                        <div class="col-sm-4 col-xs-12 columna-div"><span class="ocultar768 encabezado-min">Nombre:</span>'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Registrado:</span>'.MetodosDiversos::formatearFecha($apertura[0],true).'   '.$apertura[1].'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Atendido:</span>'.MetodosDiversos::formatearFecha($atendido[0],true).' '.$atendido[1].'</div>
                                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Cerrado:</span>'.MetodosDiversos::formatearFecha($cierre[0],true).' '.$cierre[1].'</div>
                                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Opciones:</span>'.$boton.'</div>
                                </div>';
                }
                return $html;
        } 
}

if(isset($_POST['totalReabiertosPantalla'])){
        require_once "../models/TicketsModel.php";
        require_once "../models/config.php";
        $respuesta1 = Tickets::TotalReabiertosPantalla(1);
        $respuesta2 = Tickets::TotalReabiertosPantalla(2);
        $respuesta3 = Tickets::TotalReabiertosPantalla(3);
        echo json_encode(array('soporte'=>$respuesta1,'giro'=>$respuesta2,'desarrollo'=>$respuesta3));
}




