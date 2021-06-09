<?php


class Costos{

    public static function nuevo_actualizar($data){
        if($data['id'] !== NULL){
            if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del ID no es correcto');
        }
        /*if( ($data['ejercicio'] = MetodosDiversos::validarFormatoEntero($data['ejercicio']))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo Año no es correcto');*/
        if( ($data['mes'] = MetodosDiversos::validarFormatoEntero($data['mes']))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo mes no es correcto');
        if( ($data['empleados'] = MetodosDiversos::validarFormatoEntero($data['empleados']))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo empleados no es correcto');
        if( ($data['imss'] = MetodosDiversos::validarFormatoMoneda($data['imss'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo imss no es correcto');
        if( ($data['real_imss'] = MetodosDiversos::validarFormatoMoneda($data['real_imss'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo real_imss no es correcto');
        if( ($data['ajuste_imss'] = MetodosDiversos::validarFormatoMoneda($data['ajuste_imss'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo ajuste_imss no es correcto');
        if( ($data['rcv'] = MetodosDiversos::validarFormatoMoneda($data['rcv'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo rcv no es correcto');
        if( ($data['real_rcv'] = MetodosDiversos::validarFormatoMoneda($data['real_rcv'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo real_rcv no es correcto');
        if( ($data['ajuste_rcv'] = MetodosDiversos::validarFormatoMoneda($data['ajuste_rcv'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo ajuste_rcv no es correcto');
        if( ($data['infonavit'] = MetodosDiversos::validarFormatoMoneda($data['infonavit'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo infonavit no es correcto');
        if( ($data['real_infonavit'] = MetodosDiversos::validarFormatoMoneda($data['real_infonavit'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo real_infonavit no es correcto');
        if( ($data['ajuste_infonavit'] = MetodosDiversos::validarFormatoMoneda($data['ajuste_infonavit'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo ajuste_infonavit no es correcto');
        /*if( ($data['impuesto_estatal'] = MetodosDiversos::validarFormatoMoneda($data['impuesto_estatal'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo impuesto_estatal no es correcto');
        if( ($data['gmma'] = MetodosDiversos::validarFormatoMoneda($data['gmma'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo gmma no es correcto');
        if( ($data['vida_invalidez'] = MetodosDiversos::validarFormatoMoneda($data['vida_invalidez'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo vida_invalidez no es correcto');
        if( ($data['gmme'] = MetodosDiversos::validarFormatoMoneda($data['gmme'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo gmme no es correcto');
        if( ($data['otros'] = MetodosDiversos::validarFormatoMoneda($data['otros'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo otros no es correcto');
        */
        if( ($data['subtotal'] = MetodosDiversos::validarFormatoMoneda($data['subtotal'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo subtotal no es correcto');
        if( ($data['imss_obrero'] = MetodosDiversos::validarFormatoMoneda($data['imss_obrero'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo imss_obrero no es correcto');
        if( ($data['real_imss_obrero'] = MetodosDiversos::validarFormatoMoneda($data['real_imss_obrero'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo real_imss_obrero no es correcto');
        if( ($data['ajuste_imss_obrero'] = MetodosDiversos::validarFormatoMoneda($data['ajuste_imss_obrero'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo ajuste_imss_obrero no es correcto');
        if( ($data['rcv_obrero'] = MetodosDiversos::validarFormatoMoneda($data['rcv_obrero'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo rcv_obrero no es correcto');
        if( ($data['real_rcv_obrero'] = MetodosDiversos::validarFormatoMoneda($data['real_rcv_obrero'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo real_rcv_obrero no es correcto');
        if( ($data['ajuste_rcv_obrero'] = MetodosDiversos::validarFormatoMoneda($data['ajuste_rcv_obrero'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo ajuste_rcv_obrero no es correcto');
        if( ($data['amortizacion'] = MetodosDiversos::validarFormatoMoneda($data['amortizacion'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo amortizacion no es correcto');
        if( ($data['real_amortizacion'] = MetodosDiversos::validarFormatoMoneda($data['real_amortizacion'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo real_amortizacion no es correcto');
        if( ($data['ajuste_amortizacion'] = MetodosDiversos::validarFormatoMoneda($data['ajuste_amortizacion'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo ajuste_amortizacion no es correcto');
        if( ($data['total'] = MetodosDiversos::validarFormatoMoneda($data['total'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo amortizacion no es correcto');
        if( ($data['comentarios'] = MetodosDiversos::validarFormatoTexto($data['comentarios'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El campo comentarios no debe tener ninguno de los siguientes caracteres especiales: < > " \''); 

        if($data['id'] !== NULL){//actualizamos
            
            if(CostosModel::actualizar($data,Tablas::costos())){
                return array('error'=>false,'tipo'=>'success','titulo'=>'El registro se actualizó correctamente','subtitulo'=>'Número de registro actualizado: '.$data['id'],'registroImss'=>date('d-m-Y H:i:s')); 
            }
                
        }
        else {
            if($respuesta = CostosModel::nuevo($data,Tablas::costos()))
                return array('error'=>false,'tipo'=>'success','titulo'=>'El registro se guardó correctamente','subtitulo'=>'Número de registro: '.$respuesta,'registros'=>self::mostrar2()); 
        }
        return array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error','subtitulo'=>'La operación no se realizó, por favor ¡intentelo nuevamente!'); 
        
    }

    public static function actualizarGm($data){
       
        if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del ID no es correcto');
        if( ($data['gmma'] = MetodosDiversos::validarFormatoMoneda($data['gmma'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo gmma no es correcto: '.$data['gmma']);
        if( ($data['vida_invalidez'] = MetodosDiversos::validarFormatoMoneda($data['vida_invalidez'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo vida_invalidez no es correcto');
        if( ($data['gmme'] = MetodosDiversos::validarFormatoMoneda($data['gmme'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo gmme no es correcto');
        if( ($data['otros'] = MetodosDiversos::validarFormatoMoneda($data['otros'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo otros no es correcto');
        if( ($data['subtotal'] = MetodosDiversos::validarFormatoMoneda($data['subtotal'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo subtotal no es correcto');
        if( ($data['total'] = MetodosDiversos::validarFormatoMoneda($data['total'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo amortizacion no es correcto');
        if( ($data['comentarios'] = MetodosDiversos::validarFormatoTexto($data['comentarios'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El campo comentarios no debe tener ninguno de los siguientes caracteres especiales: < > " \''); 

        if(CostosModel::actualizarGm($data,Tablas::costos())){
            $capturista = CostosModel::obtenerCapturista($_SESSION['identificador'],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
            return array('error'=>false,'tipo'=>'success','titulo'=>'El registro se actualizó correctamente','subtitulo'=>'Número de registro actualizado: '.$data['id'],'registroGm'=>date('d-m-Y H:i:s'),'nombre'=>$capturista['nombre'],'sucursal'=>$capturista['sucursal'],'puesto'=>$capturista['puesto']); 
        }
        return array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error','subtitulo'=>'La operación no se realizó, por favor ¡intentelo nuevamente!'); 
    }

    public static function actualizarNominas($data){
       
        if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del ID no es correcto');
        if( ($data['impuesto_estatal'] = MetodosDiversos::validarFormatoMoneda($data['impuesto_estatal'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo impuesto_estatal no es correcto');
        if( ($data['subtotal'] = MetodosDiversos::validarFormatoMoneda($data['subtotal'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo subtotal no es correcto');
        if( ($data['total'] = MetodosDiversos::validarFormatoMoneda($data['total'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo amortizacion no es correcto');
        if( ($data['comentarios'] = MetodosDiversos::validarFormatoTexto($data['comentarios'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El campo comentarios no debe tener ninguno de los siguientes caracteres especiales: < > " \''); 

        if(CostosModel::actualizarNominas($data,Tablas::costos())){
            $capturista = CostosModel::obtenerCapturista($_SESSION['identificador'],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
            return array('error'=>false,'tipo'=>'success','titulo'=>'El registro se actualizó correctamente','subtitulo'=>'Número de registro actualizado: '.$data['id'],'registroNominas'=>date('d-m-Y H:i:s'),'nombre'=>$capturista['nombre'],'sucursal'=>$capturista['sucursal'],'puesto'=>$capturista['puesto']); 
        }
            
        return array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error','subtitulo'=>'La operación no se realizó, por favor ¡intentelo nuevamente!'); 
    }

    public static function mostrar($id){
        $respuesta = CostosModel::mostrar($id,Tablas::costos());
        $respuesta['nombre_comercial'] = CostosModel::getNombreComercial($respuesta['cliente'],Tablas::costos_clientes());
        $capturista = CostosModel::obtenerCapturista($respuesta['id_imss'],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
        $respuesta['capturoImss'] = $capturista['nombre'];
        $respuesta['sucursalImss'] = $capturista['sucursal'];
        $respuesta['puestoImss'] = $capturista['puesto'];
        if($respuesta['id_gm'] != NULL){
            $capturista = CostosModel::obtenerCapturista($respuesta['id_gm'],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
            $respuesta['capturoGm'] = $capturista['nombre'];
            $respuesta['sucursalGm'] = $capturista['sucursal'];
            $respuesta['puestoGm'] = $capturista['puesto'];
        }
        else{
            $respuesta['capturoGm'] = '';
            $respuesta['sucursalGm'] = '';
            $respuesta['puestoGm'] = '';
        }
        if($respuesta['id_nominas'] != NULL){
            $capturista = CostosModel::obtenerCapturista($respuesta['id_nominas'],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
            $respuesta['capturoNominas'] = $capturista['nombre'];
            $respuesta['sucursalNominas'] = $capturista['sucursal'];
            $respuesta['puestoNominas'] = $capturista['puesto'];
        }
        else{
            $respuesta['capturoNominas'] = '';
            $respuesta['sucursalNominas'] = '';
            $respuesta['puestoNominas'] = '';
        }
        return $respuesta;
    }

    public static function mostrar2($id='',$cliente=''){
        $respuesta = CostosModel::mostrar2($id,$cliente,Tablas::costos());
        $colorFila=false;
        $html='';
        $acceso = GrupoCostos::modulo($_SESSION['identificador']);
        if($_SESSION['identificador2'] == 6 || $_SESSION['identificador'] == 201 ){
            $boton='<div class="btn-group">
                    <a class="btn btn-success botonMostrarImss" href="#" style="padding-left:4px;padding-right:5px;font-size:13px;"> Mostrar</a>
                    <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="font-size:13px;" href="#">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="botonMostrarGm"><i class="fa fa-lock fa-fw"></i> GM</a></li>
                        <li><a href="#" class="botonMostrarNominas"><i class="fa fa-lock fa-fw"></i> Nóminas</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="botonEliminar"><i class="fa fa-trash-o"></i> Eliminar</a></li>
                    </ul>
                </div>';
        }
        else if($acceso === 'imss'){
            $boton='<div class="btn-group">
                        <a class="btn btn-success botonMostrarImss" href="#" style="padding-left:4px;padding-right:5px;font-size:13px;"> Mostrar</a>
                        <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="font-size:13px;" href="#">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="botonEliminar"><i class="fa fa-trash-o"></i> Eliminar</a></li>
                        </ul>
                    </div>';
        }
        else if($acceso === 'gm'){
            $boton='<div class="btn-group">
                        <a class="btn btn-success botonMostrarGm" href="#" style="padding-left:4px;padding-right:5px;font-size:13px;"> Mostrar</a>
                    </div>';
        }
        else{ //nóminas
            $boton='<div class="btn-group">
                        <a class="btn btn-success botonMostrarNominas" href="#" style="padding-left:4px;padding-right:5px;font-size:13px;"> Mostrar</a>
                    </div>';
        }
        

        foreach($respuesta as $row=>$item){
            $iconoGm = self::icono($item['id_gm'] == NULL ? 1 : 2);
            $iconoNominas = self::icono($item['id_nominas'] == NULL ? 1 : 2); 
            $html .='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;">
                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768"><b>'.$item['id'].'</b></div>
                        <div class="col-sm-7 col-xs-12 columna-div"><span class="ocultar768 encabezado-min"><b>Cliente:</b></span>'.self::getRegistro($item['cliente']).'</div>
                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 gmIcono'.$item['id'].'"><span class="ocultar768 encabezado-min"><b>GMM:</b></span>'.$iconoGm.'</div>
                        <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 nominasIcono'.$item['id'].'"><span class="ocultar768 encabezado-min"><b>Nóminas:</b></span>'.$iconoNominas.'</div>
                        <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768" data="'.$item['id'].'" ><span class="ocultar768 encabezado-min"><b>Opciones:</b></span>'.$boton.'</div>
                    </div>';
        }
        return $html;
    }

    public static function contarRegistros($id='',$cliente=''){
        return CostosModel::contarRegistros($id,$cliente,Tablas::costos());
    }

    private static function getRegistro($id){
        return CostosModel::getRegistro($id,Tablas::costos_clientes());
    }

    private static function icono($n){
        if($n === 1)
            return '<i class="fa fa-clock-o fa-2x text-yellow"></i>';
        else
            return '<i class="fa fa-check-square-o fa-2x text-green"></i>';
    }

    public static function eliminar($id){
         if(CostosModel::eliminar($id,Tablas::costos()))
            return array('error'=>false,'data'=>self::mostrar2());
         else
            return array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error','subtitulo'=>'La operación no se realizó, por favor ¡intentelo nuevamente!','data'=>self::mostrar2()); 
    }

    public static function ejercicio(){
        $anio = date('Y');
        $html='';
        for($i=0;$i<5;$i++){
            $incrementar=date("Y",strtotime($anio."+ ".$i." year"));
            $html.='<option value="'.$incrementar.'">'.$incrementar.'</option>';
        }
        return $html;    
    }

    public static function cargarSelect($tipo,$editar=false){
        $respuesta=$html='';
        if($tipo===3){
            $respuesta = CostosModel::cargarSelect(Tablas::costos_promotor(),true);
            $html= $editar ? '<option value=""></option><option value="edit">--EDITAR LISTA--</option>' : '';
        } 
        else if($tipo===4){
            $respuesta = CostosModel::cargarSelect(Tablas::costos_subcomisionista(),true);
            $html= $editar ? '<option value=""></option><option value="edit">--EDITAR LISTA--</option>' : '';
        }
        else{
            $respuesta = CostosModel::cargarSelect(Tablas::empresas(),false);
            $html= $editar ? '<option value=""></option><option value="edit">--EDITAR LISTA--</option>' : '';
        }
           
        foreach($respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        
        return $html;
    }

    public static function cargarSelect2($editar=false){
        $html= $editar ? '<option value=""></option><option value="edit">--EDITAR LISTA--</option>' : '';
        $respuesta = CostosModel::cargarSelect2(Tablas::costos_clientes(),true);
        foreach($respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'" alias="'.$item['nombre_comercial'].'">'.$item['nombre'].'</option>';
        return $html;
    }

    public static function recargarListaClientes(){
        $respuesta = CostosModel::cargarSelect2(Tablas::costos_clientes(),false);
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-9 col-xs-12 columna-div columna-div-centrar">Nombre</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarClientesCostos" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickSeleccionClientesCostos seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickSeleccionClientesCostos fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                    <div class="col-sm-9 col-xs-12 columna-div getData" alias="'.$item["nombre_comercial"].'"><span class="ocultar768 encabezado-min">Nombre:</span><span class="textoMay">'.$item["nombre"].'</span></div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
            </div>';
        }
        return $html;
    }

    public static function recargarListaPromotores(){
        $respuesta = CostosModel::cargarSelect2(Tablas::costos_promotor(),false);
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-9 col-xs-12 columna-div columna-div-centrar">Nombre</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarPromotoresCostos" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickSeleccionPromotoresCostos seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickSeleccionPromotoresCostos fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                    <div class="col-sm-9 col-xs-12 columna-div getData"><span class="ocultar768 encabezado-min">Nombre:</span><span class="textoMay">'.$item["nombre"].'</span></div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
            </div>';
        }
        return $html;
    }

    public static function recargarListaSubcomisionistas(){
        $respuesta = CostosModel::cargarSelect2(Tablas::costos_subcomisionista(),false);
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-9 col-xs-12 columna-div columna-div-centrar">Nombre</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarSubcomisionistasCostos" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickSeleccionSubcomisionistasCostos seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickSeleccionSubcomisionistasCostos fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                    <div class="col-sm-9 col-xs-12 columna-div getData"><span class="ocultar768 encabezado-min">Nombre:</span><span class="textoMay">'.$item["nombre"].'</span></div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
            </div>';
        }
        return $html;
    }

    public static function actualizarEstado($id,$valor,$campo){
        if($campo === 'cliente')
            $respuesta = CostosModel::actualizarEstado($id,$valor,Tablas::costos_clientes());
        else if($campo === 'promotor')
            $respuesta = CostosModel::actualizarEstado($id,$valor,Tablas::costos_promotor());
        else
            $respuesta = CostosModel::actualizarEstado($id,$valor,Tablas::costos_subcomisionista());
        
        if($respuesta){
            if($campo === 'cliente')
                return array('error'=>false,'data'=>self::cargarSelect2(true));
            else if($campo === 'promotor')
                return array('error'=>false,'data'=>self::cargarSelect(3,true));
            else 
                return array('error'=>false,'data'=>self::cargarSelect(4,true));
        }
        else
            return array('error'=>true);
    }

    public static function cargarMes(){
        $html='';
        $mes=date("m");
        for($i=1;$i<=12;$i++){
            if($mes==$i)
                $html.=" <option value='$i' selected>".self::traducirMes($i)."</option>";
            else
                $html.=" <option value='$i'>".self::traducirMes($i)."</option>";
        }
        return $html;
    }

    public static function cargarMes2(){
        $html='';
        for($i=1;$i<=12;$i++)
                $html.=" <option value='$i'>".self::traducirMes($i)."</option>";
        return $html;
    }

    public static function traducirMes($mes){
        $array = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octumbre','Noviembre','Diciembre'];
        return $array[$mes-1];
    }

    public static function nuevoCliente($nombre,$nombreComercial,$id){
        if($id !== NULL)
            $respuesta = CostosModel::actualizarCliente($id,$nombre,$nombreComercial,Tablas::costos_clientes());
        else
            $respuesta = CostosModel::nuevoCliente($nombre,$nombreComercial,Tablas::costos_clientes());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarSelect2());
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'Verifica que el nombre del cliente no exista, Intentelo nuevamente','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function nuevoPromotor($nombre,$id){
        if($id !== NULL)
            $respuesta = CostosModel::actualizarPromotor($id,$nombre,Tablas::costos_promotor());
        else
            $respuesta = CostosModel::nuevoPromotor($nombre,Tablas::costos_promotor());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarSelect(3));
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'Verifica que el nombre del cliente no exista, Intentelo nuevamente','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function nuevoSubcomisionista($nombre,$id){
        if($id !== NULL)
            $respuesta = CostosModel::actualizarPromotor($id,$nombre,Tablas::costos_subcomisionista());
        else
            $respuesta = CostosModel::nuevoPromotor($nombre,Tablas::costos_subcomisionista());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarSelect(4));
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'Verifica que el nombre del cliente no exista, Intentelo nuevamente','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }


    public static function cargarLayout(){
        
    }

}
