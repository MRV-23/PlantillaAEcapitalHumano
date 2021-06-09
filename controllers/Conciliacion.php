<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

class Conciliacion{

    public static function cargarCuentas($editar=false){
        $respuesta = ConciliacionModel::cargarCuentas(Tablas::Ccuentas(),Tablas::usuarios(),Tablas::empresas(),Tablas::bancos(),true);
        $html= $editar ? '<option value=""></option><option value="edit" style="font-weight:bold">--EDITAR LISTA--</option>' : '<option value=""></option>';
        foreach( $respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'" dataBanco="'.$item['nbanco'].'" dataEmpresa="'.$item['nempresa'].'" dataResponsable="'.$item['responsable'].'">'.$item['cuenta'].'</option>';
        return $html;
    }

    public static function cargarMovimientos($editar=false,$tipo=0,$interfazActualizacion = false){
        $respuesta = ConciliacionModel::cargarMovimientos(Tablas::Cmovimientos(),true,$tipo);
        $html= $editar && !$interfazActualizacion ? '<option value=""></option><option value="edit" style="font-weight:bold">--EDITAR LISTA--</option>' : '<option value=""></option>';
        foreach( $respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        return $html;
    }

    public static function cargarBeneficiarios($editar=false){
        $respuesta = ConciliacionModel::cargarBeneficiarios(Tablas::Cbeneficiarios(),true);
        $html= $editar ? '<option value=""></option><option value="edit" style="font-weight:bold">--EDITAR LISTA--</option>' : '<option value=""></option>';
        foreach( $respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        return $html;
    }

    public static function cargarConceptos($editar=false){
        $respuesta = ConciliacionModel::cargarBeneficiarios(Tablas::Cconceptos(),true);
        $html= $editar ? '<option value=""></option><option value="edit" style="font-weight:bold">--EDITAR LISTA--</option>' : '<option value=""></option>';
        foreach( $respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        return $html;
    }

    public static function cargarSelect($tipo){
        if($tipo === 1)
            $respuesta = ConciliacionModel::cargarBancos(Tablas::bancos());
        else
            $respuesta = ConciliacionModel::cargarEmpresas(Tablas::empresas());
        $html= '<option value=""></option>';
        foreach( $respuesta as $row=>$item)
            $html.='<option value="'.$item['id'].'">'.$item['nombre'].'</option>';
        return $html;
    }

    public static function nuevo_actualizar_cuenta($data){
        if($data['id'] !== NULL){
            if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El ID a actualizar no es correcto','boton'=>true);
        }
        if( ($data['cuenta'] = MetodosDiversos::validarFormatoTexto($data['cuenta'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'La CUENTA no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
        if( ($data['banco'] = MetodosDiversos::validarFormatoEntero($data['banco'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo BANCO no es correcto','boton'=>true);
        if( ($data['empresa'] = MetodosDiversos::validarFormatoEntero($data['empresa'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo EMPRESA no es correcto','boton'=>true);
        if( ($data['tesorero'] = MetodosDiversos::validarFormatoEntero($data['tesorero'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo TESORERO no es correcto','boton'=>true);
        
        if($data['id'] !== NULL)
            $respuesta = ConciliacionModel::actualizarCuenta($data,Tablas::Ccuentas());
        else
            $respuesta = ConciliacionModel::nuevaCuenta($data,Tablas::Ccuentas());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarCuentas(true));
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Verifique que la cuenta sea única','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function nuevo_actualizar_beneficiario($data){
        if($data['id'] !== NULL){
            if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El ID a actualizar no es correcto','boton'=>true);
        }
        if( ($data['beneficiario'] = MetodosDiversos::validarFormatoTexto($data['beneficiario'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El BENEFICIARIO no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
       
        if($data['id'] !== NULL)
            $respuesta = ConciliacionModel::actualizarBeneficiario($data,Tablas::Cbeneficiarios());
        else
            $respuesta = ConciliacionModel::nuevoBeneficiario($data,Tablas::Cbeneficiarios());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarBeneficiarios(true));
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Intente de nuevo','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function nuevo_actualizar_concepto($data){
        if($data['id'] !== NULL){
            if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El ID a actualizar no es correcto','boton'=>true);
        }
        if( ($data['concepto'] = MetodosDiversos::validarFormatoTexto($data['concepto'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El CONCEPTO no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
       
        if($data['id'] !== NULL)
            $respuesta = ConciliacionModel::actualizarConcepto($data,Tablas::Cconceptos());
        else
            $respuesta = ConciliacionModel::nuevoConcepto($data,Tablas::Cconceptos());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarConceptos(true));
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Intente de nuevo','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function nuevo_actualizar_movimiento($data){
        if($data['id'] !== NULL){
            if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El ID a actualizar no es correcto','boton'=>true);
        }
        if( ($data['tipo'] = MetodosDiversos::validarFormatoEntero($data['tipo'],true))  === true ){
            if($data['tipo'] < 2 && $data['tipo'] > 3)
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El tipo de movimiento a actualizar no es correcto','boton'=>true);
        }   
        if( ($data['concepto'] = MetodosDiversos::validarFormatoTexto($data['concepto'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El NOMBRE DEL CONCEPTO no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
        if( ($data['descripcion'] = MetodosDiversos::validarFormatoTexto($data['descripcion'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'La DESCRIPCIÓN no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
        if( ($data['nota'] = MetodosDiversos::validarFormatoTexto($data['nota'],false))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'La NOTA no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
       
        if($data['id'] !== NULL)
            $respuesta = ConciliacionModel::actualizarMovimiento($data,Tablas::Cmovimientos());
        else
            $respuesta = ConciliacionModel::nuevoMovimiento($data,Tablas::Cmovimientos());

        if($respuesta)
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false,'data'=>self::cargarMovimientos(true));
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Intente de nuevo','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function nuevo_actualizar_conciliacion($data){
        /*if($data['id'] !== NULL){
            if( ($data['id'] = MetodosDiversos::validarFormatoEntero($data['id'],true))  === true ) 
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El ID a actualizar no es correcto','boton'=>true);
        }
        if( ($data['tipo'] = MetodosDiversos::validarFormatoEntero($data['tipo'],true))  === true ){
            if($data['tipo'] < 2 && $data['tipo'] > 3)
                return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El tipo de movimiento a actualizar no es correcto','boton'=>true);
        }   
        if( ($data['concepto'] = MetodosDiversos::validarFormatoTexto($data['concepto'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El NOMBRE DEL CONCEPTO no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
        if( ($data['descripcion'] = MetodosDiversos::validarFormatoTexto($data['descripcion'],true))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'La DESCRIPCIÓN no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
        if( ($data['nota'] = MetodosDiversos::validarFormatoTexto($data['nota'],false))  === true ) 
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'La NOTA no debe tener ninguno de los siguientes caracteres especiales: < > " \'','boton'=>true); 
       */
       
        if( $data['folio'] !== NULL AND ( ConciliacionModel::obtenerDatosNomina2($data['folio'],Tablas::nominas_liberacion()) != 1 ) )
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'El folio de la nómina no existe','tipo'=>'error','tiempo'=>60000,'boton'=>true);

        if( ($data['monto'] = MetodosDiversos::validarFormatoMoneda($data['monto'])) === true)
            return array('error'=>true,'tipo'=>'warning','titulo'=>'Ocurrio un error','subtitulo'=>'El formato del campo MONTO no es correcto','boton'=>true);

        $respuesta='';
        $id;
        $dataUsuario = NULL;
        if($data['id'] !== NULL){
            $id=$data['id'];
            $verificacion = ConciliacionModel::getDatosComprobatorios($data['id'],Tablas::conciliacion());
            if( date($verificacion['fecha_movimiento']) != date($data['fechaMovimiento']) || $verificacion['tipo_movimiento'] != $data['tipo'] || $verificacion['monto'] != $data['monto']){
                $data['oldFechaMovimiento'] = $verificacion['fecha_movimiento'];
                $data['oldTipoMovimiento'] = $verificacion['tipo_movimiento'];
                $data['oldMonto'] = $verificacion['monto'];
                $data['autorizacion_extemporanea'] = 0;
                $respuesta = ConciliacionModel::actualizarConciliacionAvalidar($data,Tablas::conciliacion(),Tablas::Cextemporaneos());
            }
            else
                $respuesta = ConciliacionModel::actualizarConciliacion($data,Tablas::conciliacion());

            $dataUsuario = ConciliacionModel::usuarioActualizacion(Tablas::usuarios(),Tablas::sucursales());
            $dataUsuario['fecha'] = date('d-m-Y');
            $dataUsuario['hora'] = date('H:i:s');
        }
        else{
            if( date($data['fechaMovimiento']) != date('Y-m-d') ){
                $data['autorizacion_extemporanea'] = 0;
                $respuesta = ConciliacionModel::registroAvalidar($data,Tablas::conciliacion(),Tablas::Cextemporaneos());
            }
            else
                $respuesta = ConciliacionModel::registroSinValidar($data,Tablas::conciliacion());
            $id=$respuesta['id'];
            $respuesta = $respuesta['error'];
        }
            
        if($respuesta)
            return array('error'=>false,'titulo'=>'Proceso correcto','subtitulo'=>'Registro No. '.$id,'tipo'=>'success','tiempo'=>30000,'boton'=>true,'usuario'=>$dataUsuario);
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Intente de nuevo','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function recargarListaCuentas(){
        $respuesta = ConciliacionModel::cargarCuentas2(Tablas::Ccuentas(),Tablas::usuarios());
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-6 col-xs-12 columna-div columna-div-centrar">Tesorero</div>
                    <div class="col-sm-3 col-xs-12 columna-div columna-div-centrar">Cuenta</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarCuenta" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickStatusCuenta seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickStatusCuenta fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                            <div class="col-sm-6 col-xs-12 columna-div getTesorero" id-tesorero="'.$item["tesorero"].'" id-sucursal="'.$item["id_sucursal"].'" id-banco="'.$item["banco"].'" id-empresa="'.$item["empresa"].'"><span class="ocultar768 encabezado-min">Tesorero:</span><span class="textoMay">'.$item['responsable'].'</span></div>
                            <div class="col-sm-3 col-xs-12 columna-div columna-div-centrar768 textoMay getCuenta"><span class="ocultar768 encabezado-min">Cuenta:</span>'.$item["cuenta"].'</div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
                    </div>';
        }
        return $html;
    }

    public static function recargarListaBeneficiarios(){
        $respuesta = ConciliacionModel::cargarBeneficiarios(Tablas::Cbeneficiarios(),false);
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-9 col-xs-12 columna-div columna-div-centrar">Beneficiario</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarBeneficiario" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickStatusBeneficiario seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickStatusBeneficiario fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                            <div class="col-sm-9 col-xs-12 columna-div getBeneficiario"><span class="ocultar768 encabezado-min">Beneficiario:</span><span class="textoMay">'.$item['nombre'].'</span></div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
                    </div>';
        }
        return $html;
    }

    public static function recargarListaConceptos(){
        $respuesta = ConciliacionModel::cargarBeneficiarios(Tablas::Cconceptos(),false);
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-9 col-xs-12 columna-div columna-div-centrar">Conceptos</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarConcepto" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickStatusConcepto seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickStatusConcepto fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                            <div class="col-sm-9 col-xs-12 columna-div getConcepto"><span class="ocultar768 encabezado-min">Concepto:</span><span class="textoMay">'.$item['nombre'].'</span></div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
                    </div>';
        }
        return $html;
    }

    public static function recargarListaMovimientos(){
        $respuesta = ConciliacionModel::cargarMovimientos(Tablas::Cmovimientos(),false);
        $html=' <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">No.</div>
                    <div class="col-sm-3 col-xs-12 columna-div columna-div-centrar">Tipo movimiento</div>
                    <div class="col-sm-6 col-xs-12 columna-div columna-div-centrar">Nombre concepto</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Activo</div>
                    <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar">Actualizar</div>
                </div>';
        $colorFila= true;
        $numero=1;
        $boton='<i class="fa fa-refresh fa-2x actualizarMovimiento" style="color:#3c8dbc;cursor:pointer;" aria-hidden="true"></i>';
        foreach($respuesta as $row=>$item){
            $status = $item['activo'] == 1 ? '<i class="fa fa-toggle-on fa-2x clickStatusMovimiento seleccion-On" style="color:#00a65a;cursor:pointer;" aria-hidden="true"></i>' : '<i class="fa fa-toggle-on fa-2x clickStatusMovimiento fa-rotate-180" style="color:#dd4b39;cursor:pointer;" aria-hidden="true"></i>';
            $tipo = $item['tipo'] == 2 ? 'INGRESO' : 'EGRESO' ;
            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;" data="'.$item["id"].'">
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$numero++.'</div>
                            <div class="col-sm-3 col-xs-12 columna-div columna-div-centrar768 getData" dataDescripcion="'.$item["descripcion"].'" dataNota="'.$item["nota"].'" dataTipo="'.$item["tipo"].'"><span class="ocultar768 encabezado-min">Tipo movimiento:</span><span class="textoMay">'.$tipo.'</span></div>
                            <div class="col-sm-6 col-xs-12 columna-div columna-div-centrar768 textoMay getNombre"><span class="ocultar768 encabezado-min">Nombre:</span>'.$item['nombre'].'</div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768 textoMay"><span class="ocultar768 encabezado-min">Activo:</span>'.$status.'</div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Actualizar:</span>'.$boton.'</div>
                    </div>';
        }
        return $html;
    }

    public static function mostrar_registros($limite="",$data=""){
        $respuesta = ConciliacionModel::mostrar_registros(Tablas::conciliacion(),Tablas::Ccuentas(),Tablas::empresas(),$limite,$data);
        $colorFila= true;
        $tipo;
        $boton='<div class="btn-group">
                    <a class="btn btn-success botonMostrar" href="#" style="padding-left:4px;padding-right:5px;font-size:13px;"> Mostrar</a>
                    <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="font-size:13px;" href="#">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="botonEliminar"><i class="fa fa-trash-o"></i> Eliminar</a></li>
                    </ul>
                </div>';
        foreach($respuesta as $row=>$item){

            if( $item['activa'] === '0' )
                $tipo = '<i class="fa fa-times fa-2x text-red"></i>';
            else if($item["autorizacion_extemporanea"] === '0')
                $tipo = '<i class="fa fa-clock-o fa-2x text-yellow"></i>';
            else
                $tipo = '<i class="fa fa-check-square-o fa-2x text-green"></i>';
                

            $html.='<div class="row renglon-'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" style="min-height:40px;margin:1px;" data="'.$item["id"].'">
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar color768">'.$item["id"].'</div>
                            <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 getCuenta"><span class="ocultar768 encabezado-min">Cuenta:</span><span class="textoMay">'.$item['cuenta'].'</span></div>
                            <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768 getMonto"><span class="ocultar768 encabezado-min">Monto:</span>'.number_format($item['monto'],2).'</div>
                            <div class="col-sm-4 col-xs-12 columna-div columna-div-centrar768 getEmpresa"><span class="ocultar768 encabezado-min">Empresa:</span><span class="textoMay">'.$item['nombre'].'</span></div>
                            <div class="col-sm-1 col-xs-12 columna-div columna-div-centrar768"><span class="ocultar768 encabezado-min">Tipo:</span>'.$tipo.'</div>
                            <div class="col-sm-2 col-xs-12 columna-div columna-div-centrar768" style="padding-left:0;padding-right:0;"><span class="ocultar768 encabezado-min" style="margin-left:1px;">Opciones:</span>'.$boton.'</div>
                    </div>';
        }
        return $html;
    }

    public static function contarRegistros($data=''){
        return ConciliacionModel::contarRegistros(Tablas::conciliacion(),Tablas::Ccuentas(),Tablas::empresas(),$data);
    }

    public static function actualizarEstado($id,$valor,$campo){
        if($campo === 'cuentas')
            $respuesta = ConciliacionModel::actualizarEstado($id,$valor,Tablas::Ccuentas());
        else if($campo === 'beneficiarios')
            $respuesta = ConciliacionModel::actualizarEstado($id,$valor,Tablas::Cbeneficiarios());
        else if($campo === 'conceptos')
            $respuesta = ConciliacionModel::actualizarEstado($id,$valor,Tablas::Cconceptos());
        else if($campo === 'movimientos')
            $respuesta = ConciliacionModel::actualizarEstado($id,$valor,Tablas::Cmovimientos());
       
        if($respuesta){
            if($campo === 'cuentas')
                return array('error'=>false,'data'=>self::cargarCuentas(true));
            else if($campo === 'beneficiarios')
                return array('error'=>false,'data'=>self::cargarBeneficiarios(true));
            else if($campo === 'conceptos')
                return array('error'=>false,'data'=>self::cargarConceptos(true));
            else if($campo === 'movimientos')
                return array('error'=>false,'data'=>self::cargarMovimientos(true));
        }
        else
            return array('error'=>true);
    }

    public static function obtenerDatosNomina($id){
        $respuesta = ConciliacionModel::obtenerDatosNomina($id,Tablas::nominas_liberacion(),Tablas::usuarios(),Tablas::clientes());
        if(empty($respuesta))
            return $html = '<h3 style="text-align:center;"><u>NO EXISTE el Folio de Nómina: '.$id.'</u></h3>';
        return $html = '<h3 style="text-align:center;"><u>Folio de Nómina: '.$id.'</u></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <span><b>Tipo de esquema: </b>'.self::tipoEsquema($respuesta['esquema']).'</span>
                            </div>
                            <div class="col-md-6">
                                <span><b>Nominista: </b> '.$respuesta['nominista'].'</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span><b>Cliente: </b>'.$respuesta['cliente'].'</span>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>';
    }

    public static function tipoEsquema($valor){
        $tipo_esquema='';
        switch(intval($valor)){
            case 1://asimilados
                $tipo_esquema='ASIMILADOS';
            break;
            case 2://mixto
                $tipo_esquema='MIXTO';
            break;
            case 3://sindicato
                $tipo_esquema='SINDICATO';
            break;
            case 4://sys
                $tipo_esquema='SUELDOS Y SALARIOS';
            break;
            case 5://tarjeta empresarial
                $tipo_esquema='TARJETA EMPRESARIAL';
            break;
            case 6://PRESTAMO
                $tipo_esquema='PRESTAMO';
            break;
            case 7://GASTOS MÉDICOS
                $tipo_esquema='GASTOS MÉDICOS';
            break;
            case 8://PAGADA CON OBSERVACIÓN
                $tipo_esquema='PAGADA CON OBSERVACIÓN';
            break;
        }
        return $tipo_esquema;
    }

    public static function mostrarRegistro($id){
        $respuesta =  ConciliacionModel::mostrarRegistro($id,Tablas::conciliacion(),Tablas::usuarios(),Tablas::empresas(),Tablas::bancos(),Tablas::Ccuentas(),Tablas::sucursales());
        $respuesta['fechaReal'] = date('Y-m-d');//vericamos la fecha real del registro, por si acaso el usuario en su equipo no tuviera la correcta
        if(!empty($verificacion=ConciliacionModel::verificarValidacion($id,Tablas::Cextemporaneos()))){
            $respuesta['fechaValidacion'] = $verificacion['fecha'];
            $respuesta['tipoValidacion'] = $verificacion['tipo_movimiento'];
            $respuesta['montoValidacion'] = $verificacion['monto'];
            $respuesta['verificacion'] = true;
        }
        return $respuesta;
    }

    public static function autorizarRegistro($id){
        $respuesta = ConciliacionModel::autorizarRegistro($id,Tablas::conciliacion());
        if($respuesta)
            return array('error'=>false,'titulo'=>'Proceso correcto','subtitulo'=>'Se autorizó el registro No. '.$id,'tipo'=>'success','tiempo'=>60000,'boton'=>true);
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Intente de nuevo','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function eliminarRegistro($id){
        $respuesta = ConciliacionModel::eliminarRegistro($id,Tablas::conciliacion());
        if($respuesta)
            return array('error'=>false,'titulo'=>'Proceso correcto','subtitulo'=>'Se eliminó el registro No. '.$id,'tipo'=>'success','tiempo'=>60000,'boton'=>true);
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error' ,'subtitulo'=>'Intente de nuevo','tipo'=>'error','tiempo'=>60000,'boton'=>true);
    }

    public static function tipo_movimiento($valor){
        $valores = array('CHEQUE','INGRESO','EGRESO');
        return $valores[$valor-1];
    }
    public static function tipo_movimiento2($valor){
        $valores = array('CHEQUE'=>1,'INGRESO'=>2,'EGRESO'=>3);
        return $valores["$valor"];
    }

    public static function tipo_status($valor,$valor2){
        if($valor < 2 ){
            $valores = array('PRESTAMO','CANCELADO','CIRCULACIÓN','COBRADO');
            return $valores[$valor2-1];
        }
        return 'APLICADO';   
    }

    public static function tipo_status2($valor){
        $valores = array('PRESTAMO'=>1,'CANCELADO'=>2,'APLICADO'=>3,'CIRCULACIÓN'=>4,'COBRADO'=>5);
        return $valores["$valor"];
    }

    public static function tipo_registro($valor,$valor2){
        if( $valor > 0 ){
            if($valor2 === NULL || $valor2 == 1)
                return 'AUTORIZADO';
            if($valor2 == 0)
                return 'PENDIENTE POR AUTORIZAR O ELIMINAR';
        }
        return 'ELIMINADO';   
    }

    public static function registrosMasivos($archivo){
            $info = new SplFileInfo($archivo["name"]);
            $extension = strtolower($info->getExtension());
            if($extension !== 'xlsx')
                return array('error'=>'return',"titulo"=>'Formato no válido', "subtitulo"=>'Formatos válidos: .xlsx');   
            $aleatorio = mt_rand(100,99999999);
            $hoy = date("YmdHis"); 
            $nombreArchivo = $hoy.$aleatorio.'.xlsx';               
            $ruta = "../intranet/documentos-nominas/".$nombreArchivo;       
            if(!move_uploaded_file($archivo['tmp_name'], $ruta))
                return array('error'=>'return',"titulo"=>'El archivo no pudo ser subido al servidor', "subtitulo"=>'error de carga');
            return self::cargarRegistros($ruta);
    }

    public static function cargarRegistros($ruta){
        $inicio = date("d-m-Y H:i:s");
        $start = microtime(true);

        try{
            $documento = IOFactory::load($ruta);
            $hojaActual = $documento->getSheet(1);
            $celda = $hojaActual->getCell('MNN1000');
            $valorRaw = $celda->getValue();
        }
        catch(Exception $e){
            unlink($ruta);
            return array("error"=>true,"data"=>'Necesitas utilizar la última versión del layout de conciliación',"totalCorrectos"=>0,"totalErrores"=>0,"totalAlertas"=>0);
        }

     
        $hojaActual = $documento->getSheet(0);
        $errores='';
        $alertas='';
        $data='';
        $resultado='';
        $nombresColumnas=array();
        $flagOverFlow = false;
        $finalizarLectura = false;
        $totalRegistrosCorrectos=0;
        $totalRegistrosErrores=0;
        $totalRegistrosAlertas=0;
        $log;
        $logError;
        
        foreach ($hojaActual->getRowIterator() as $fila){
           
            if($finalizarLectura)//si antes del máximo de lecturas hay celdas en blanco, entonces salgo
                break;
  
            if($flagOverFlow)
                break;

            $sqlCampos="";
            $sqlValores="";
            $matrizValidacion=array('tipo_movimiento'=>NULL,'status'=>NULL,'clasificacion_movimiento'=>NULL);
            $flag=true;
            $flagObligatorio=false;
           
            foreach ($fila->getCellIterator() as $celda) {
                $fila = $celda->getRow();
                $columna = $celda->getColumn();
                $valor=$celda->getFormattedValue();

                if($fila > 103){
                    $flagOverFlow = true;
                    break;
                }

                if($fila === 3)//leemos el nombre de cada columna
                    $nombresColumnas["$columna"]="$valor";
                
                if( $fila > 3 ){

                    
                    if($columna === 'J' AND !empty($valor))//guardo el nombre de la clasificacion de movimiento para saber si contiene la palabra clave cliente o nómina
                        $matrizValidacion['clasificacion_movimiento'] = $valor;

                    $respuesta = self::validar($columna,$fila,$valor,$nombresColumnas);
                    
                    if(!$respuesta['error']){//en caso de false, quiere decir que es necesario que el campo se capture y que ademas cumpla con el formato, por lo tanto no se realizará ese registro
                        if( $columna === 'A'){
                             $finalizarLectura = true;
                             break;
                        }
                        $errores.= $respuesta['respuesta']."\r\n";
                        ++$totalRegistrosErrores;
                        $flagObligatorio = true;
                        continue;
                    }

                    if($respuesta['alerta']){//Ese campo se guarda en alertas pero permite que los demas campos de su fila se guarden
                        $alertas.=$respuesta['respuesta']."\r\n";
                        ++$totalRegistrosAlertas;
                    } 
                        
                    else if($respuesta['valor']===true){//el campo esta vacio y no es obligatorio
                        if($columna === 'E' AND $matrizValidacion['tipo_movimiento'] !== 1 AND $matrizValidacion['status'] !== 1){
                            $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el monto no fue capturado.'."\r\n";
                            ++$totalRegistrosErrores;
                            $flagObligatorio = true;
                            continue;
                        }
                        else if($columna === 'F' AND $matrizValidacion['tipo_movimiento'] === 1 AND $matrizValidacion['status'] === 5){
                            $errores.= 'La fila: '.$fila.' no pudo ser guardada porque la fecha de cobro no fue capturada.'."\r\n";
                            ++$totalRegistrosErrores;
                            $flagObligatorio = true;
                            continue;
                        }
                        else if($columna === 'G' AND $matrizValidacion['tipo_movimiento'] === 1 AND $matrizValidacion['status'] !== 1){
                            $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el número de poliza no fue capturado.'."\r\n";
                            ++$totalRegistrosErrores;
                            $flagObligatorio = true;
                            continue;
                        }
                        else if( ( $columna === 'H' || $columna === 'I' || $columna === 'J') AND ($matrizValidacion['status'] !== 1) ){
                            if($columna === 'H')
                                $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el concepto no fue capturado.'."\r\n";
                            if($columna === 'I')
                                $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el beneficiario no fue capturado.'."\r\n";
                            if($columna === 'J')
                                $errores.= 'La fila: '.$fila.' no pudo ser guardada porque la clasificacion de movimiento no fue capturada.'."\r\n";
                            
                            ++$totalRegistrosErrores;
                            $flagObligatorio = true;
                            continue;
                        }

                        else if($columna === 'K' AND $matrizValidacion['status'] !== 1 AND $matrizValidacion['clasificacion_movimiento'] !== NULL){
                            if((preg_match('/cliente/i', self::remplazarTildes($matrizValidacion['clasificacion_movimiento'])))){
                                $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el número de factura no fue capturado.'.$matrizValidacion['clasificacion_movimiento']."\r\n";
                                ++$totalRegistrosErrores;
                                $flagObligatorio = true;
                                continue;
                            }
                        }
                        else if($columna === 'L' AND $matrizValidacion['status'] !== 1 AND $matrizValidacion['clasificacion_movimiento'] !== NULL){
                            if((preg_match('/nomina/i', self::remplazarTildes($matrizValidacion['clasificacion_movimiento'])))){
                            $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el número de nómina no fue capturado.'."\r\n";
                            ++$totalRegistrosErrores;
                            $flagObligatorio = true;
                            continue;
                            }
                        }

                        else if($columna === 'M' AND $matrizValidacion['status'] === 1){
                            $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el comentario es obligatorio.'."\r\n";
                            ++$totalRegistrosErrores;
                            $flagObligatorio = true;
                            continue;
                        }

                        true;
                    }
                       
                        
                    else{
                            if($columna === 'C')
                                $matrizValidacion['tipo_movimiento'] = $respuesta['valor'];
                            else if($columna === 'D'){
                                $matrizValidacion['status'] = $respuesta['valor'];
                                if( $matrizValidacion['tipo_movimiento'] === 1 AND $matrizValidacion['status'] === 3 ){
                                    $errores.= 'La fila: '.$fila.' no pudo ser guardada porque para los tipos de movimiento CHEQUE únicamente debes seleccionar el status de: PRESTAMO, CANCELADO, CIRCULACIÓN o COBRADO.'."\r\n";
                                    ++$totalRegistrosErrores;
                                    $flagObligatorio = true;
                                    continue;
                                }
                                else if( $matrizValidacion['tipo_movimiento'] > 1 AND $matrizValidacion['status'] !== 3 ){
                                    $errores.= 'La fila: '.$fila.' no pudo ser guardada porque para los tipos de movimiento INGRESO/EGRESO únicamente debes seleccionar el status de APLICADO.'."\r\n";
                                    ++$totalRegistrosErrores;
                                    $flagObligatorio = true;
                                    continue;
                                }
                            }
                            else if($columna === 'L'){
                                if(ConciliacionModel::obtenerDatosNomina2($respuesta['valor'],Tablas::nominas_liberacion()) != 1){
                                    $errores.= 'La fila: '.$fila.' no pudo ser guardada porque el número de nómina que capturaste no existe.'."\r\n";
                                    ++$totalRegistrosErrores;
                                    $flagObligatorio = true;
                                    continue;
                                }
                            }
                                
                            
                            $separador = $flag === true ? '':',';//al primer campo del registro no le pongo coma para crear el comando sql de inserción
                            $flag=false;
                            $sqlCampos.=$separador.self::convertirEncabezado($columna) ."=".$respuesta['valor'];
                        } 
                }

            }//fin de fila


            if(  ($fila > 3 AND !$flagObligatorio) AND !$finalizarLectura ){
         
                $capturoCampo = ",id_nominista,captura_nominista";
                $capturoValor = ",".$_SESSION['identificador'].",NOW()";

                $capturoCampo = ",capturo = ".$_SESSION['identificador'];
                
                $data .= $sqlCampos.$capturoCampo;
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $respuesta = NominasModel::insersionManualFinanzas($data,Tablas::nominas_liberacion());
                if(!$respuesta['respuesta']){
                    $errores.="La fila: ".$fila." no pudo ser guardada en la base de datos (error SQL).\r\n";
                    ++$totalRegistrosErrores;
                    $logError .= $data."\r";
                }
                else{
                    $totalRegistrosCorrectos  = $totalRegistrosCorrectos + intval($respuesta['total']);
                    if(intval($respuesta['total']) === 1)
                        $log .= $data."\r";//Se manda a labitacora del usuario para referencia de los registro que realizó correctos
                } ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
            }   
        }
        
        $etiquetas = $etiquetas2 = "";

        $etiquetas.="*******************************************************************************************\r\n";
        $etiquetas.="*                                          ERRORES                                        *\r\n";
        $etiquetas.="*******************************************************************************************\r\n";

        if(!empty($errores))
            $resultado.=$etiquetas.$errores."\r\n";

        $etiquetas2.="******************************************************************************************\r\n";
        $etiquetas2.="*                                         ALERTAS                                        *\r\n";
        $etiquetas2.="******************************************************************************************\r\n";

        if(!empty($alertas))
            $resultado.=$etiquetas2.$alertas."\r\n";

        $resultado.=$data;
        //self::crearBitacoraLayout('FINANZAS',$inicio,$start,$totalRegistrosCorrectos,$totalRegistrosErrores,$log,$logError);
        unlink($ruta);
        return array("data"=>$resultado,"totalCorrectos"=>$totalRegistrosCorrectos,"totalErrores"=>$totalRegistrosErrores,"totalAlertas"=>$totalRegistrosAlertas);
    }



    public static function validar($columna,$fila,$valor,$nombresColumnas){
        
        $encabezado = $nombresColumnas["$columna"];
       
        switch($columna){
            case 'A':
                return self::lista(self::traducir($columna,$valor),$fila,$encabezado,true);
            break;
            case 'B':
                return self::fecha($valor,$fila,$encabezado,true);
            break;
            case 'C':
                return self::lista(self::traducir($columna,$valor),$fila,$encabezado,true);
            break;
            case 'D':
                return self::lista(self::traducir($columna,$valor),$fila,$encabezado,true);
            break;
            case 'E':
                return self::numerico($valor,$fila,$encabezado,false);
            break;
            case 'F':
                return self::fecha($valor,$fila,$encabezado,false);
            break;
            case 'G':
                return self::texto($valor,$fila,$encabezado,false);
            break;
            case 'H':
                return self::lista(self::traducir($columna,$valor),$fila,$encabezado,false);
            break;
            case 'I':
                return self::lista(self::traducir($columna,$valor),$fila,$encabezado,false);
            break;
            case 'J':
                return self::lista(self::traducir($columna,$valor),$fila,$encabezado,false);
            break;
            case 'K':
                return self::texto($valor,$fila,$encabezado,false);
            break;
            case 'L':
                return self::texto($valor,$fila,$encabezado,false);
            break;
            case 'M':
                return self::texto($valor,$fila,$encabezado,false);
            break;
            default:  
                return  array('alerta'=>false,'error'=>true,'valor'=>true);
        }
    }

    public static function traducir($columna,$valor){
        if($columna === "A")
            return ConciliacionModel::obtenerIdCuenta($valor,Tablas::Ccuentas());
        else if($columna === "C")
            return self::tipo_movimiento2($valor);
        else if($columna === "D")
            return self::tipo_status2($valor);
        else if($columna === "H")
            return ConciliacionModel::obtenerId($valor,Tablas::Cconceptos());
        else if($columna === "I")
            return ConciliacionModel::obtenerId($valor,Tablas::Cbeneficiarios());
        else if($columna === "J")
            return ConciliacionModel::obtenerId($valor,Tablas::Cmovimientos());
    }

    public static function convertirEncabezado($indice){
        $arreglo =  array(  'A'=>'id_cuenta',
                            'B'=>'fecha_movimiento',
                            'C'=>'tipo_movimiento',
                            'D'=>'estatus',
                            'E'=>'monto',
                            'F'=>'fecha_cobro',
                            'G'=>'numero_poliza',
                            'H'=>'id_concepto',
                            'I'=>'id_beneficiario',
                            'J'=>'id_clasificacion_movimiento',
                            'K'=>'numero_factura',
                            'L'=>'numero_folio',
                            'M'=>'comentarios'  
                        );
            return $arreglo["$indice"];
    }


    ///LOS METODOS AGRUPARLOS EN EL ARCHIVO METODOS DIVERSOS
    public static function numerico($valor,$fila,$campo,$obligatorio){
        $formato = !preg_match('/^[0-9,.]{4,}$/',$valor);

        if( (empty($valor) AND $obligatorio) || ($formato AND $obligatorio))//El campo obligatorio no puede estar vacio y debe cumplir con el formato
            return array('error'=>false,'respuesta'=>'La fila: '.$fila.' no pudo ser guardada, el campo '. $campo .' es obligatorio y debe ser númerico en formato: 000,000,000.00 .');
        
        if($formato AND !empty($valor))//El campo que no es obligatorio y contien un formato que no es permitido sera almacenado en ALERTAS pero dejara que los demas campos de su registro se almacenen
            return array('alerta'=>true,'error'=>true,'respuesta'=>'Fila: '.$fila.', el formato del campo '. $campo .' debe ser númerico en formato: 000,000,000.00 (este campo no contendra valor), sin embargo sino existen errores en la fila se guardará en el sistema.');
        
        if(empty($valor))
            return  array('alerta'=>false,'error'=>true,'valor'=>true);//El campo que no es obligatorio y ademas esta vacio sera ignorado y la base de datos le asignara un NULL

        $valor = str_replace(',','',$valor);
        return  array('alerta'=>false,'error'=>true,'valor'=>'"'.$valor.'"','campo'=>$campo);
    }

    public static function hora($valor,$fila,$campo,$obligatorio){
        $formato = !preg_match('/^[0-9]{2}:{1}[0-9]{2}([:][0]{2})*$/',$valor);

        if( (empty($valor) AND $obligatorio) || ($formato AND $obligatorio))//El campo obligatorio no puede estar vacio y debe cumplir con el formato
            return array('error'=>false,'respuesta'=>'La fila: '.$fila.' no pudo ser guardada, el campo '. $campo .' es obligatorio y debe ser tipo hora en formato: HH:MM .');
        
        if($formato AND !empty($valor))//El campo que no es obligatorio y contien un formato que no es permitido sera almacenado en ALERTAS pero dejara que los demas campos de su registro se almacenen
            return array('alerta'=>true,'error'=>true,'respuesta'=>'Fila: '.$fila.', el formato del campo '. $campo .' debe ser tipo hora en formato: HH:MM (este campo no contendra valor), sin embargo sino existen errores en la fila se guardará en el sistema.');
        
        if(empty($valor))
            return  array('alerta'=>false,'error'=>true,'valor'=>true);//El campo que no es obligatorio y ademas esta vacio sera ignorado y la base de datos le asignara un NULL

        return  array('alerta'=>false,'error'=>true,'valor'=>'"'.$valor.'"','campo'=>$campo);
    }

    public static function fecha($valor,$fila,$campo,$obligatorio){
        //la fecha llega en formato mm-dd-aaaa
        $formato = !preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/',$valor);
       
        if( ($valor==="" AND $obligatorio) || ($formato AND $obligatorio))//El campo obligatorio no puede estar vacio y debe cumplir con el formato
            return array('error'=>false,'respuesta'=>'La fila: '.$fila.' no pudo ser guardada, el campo '. $campo .' es obligatorio y debe ser tipo fecha en formato: DD/MM/AAAA.');
        
        if($formato AND $valor!== "")//El campo que no es obligatorio y contien un formato que no es permitido sera almacenado en ALERTAS pero dejara que los demas campos de su registro se almacenen
            return array('alerta'=>true,'error'=>true,'respuesta'=>'Fila: '.$fila.', el formato del campo '. $campo .' debe ser tipo fecha en formato: DD/MM/AAAA (este campo no contendra valor), sin embargo sino existen errores en la fila se guardará en el sistema.');
        if($valor==="")
            return  array('alerta'=>false,'error'=>true,'valor'=>true);//El campo que no es obligatorio y ademas esta vacio sera ignorado y la base de datos le asignara un NULL

        $fecha = explode("/", $valor);

        $dia=str_pad($fecha[1], 2, "0", STR_PAD_LEFT);//substr($valor,0,2);
        $mes=str_pad($fecha[0], 2, "0", STR_PAD_LEFT);//substr($valor,3,2);
        $anio=$fecha[2];//substr($valor,6,4);
        
        $valor = $anio.'-'.$mes.'-'.$dia;
       
        return  array('alerta'=>false,'error'=>true,'valor'=>'"'.$valor.'"','campo'=>$campo);
    }

    public static function lista($valor,$fila,$campo,$obligatorio/*,$cero=false*/){

        /*if($valor =='0' AND $cero)
            return array('alerta'=>false,'error'=>true,'valor'=>$valor,'campo'=>$campo);*/

        $formato = !preg_match('/^[0-9]{1,}$/',$valor);

        if( (empty($valor) AND $obligatorio) || ($formato AND $obligatorio))//El campo obligatorio no puede estar vacio y debe cumplir con el formato
            return array('error'=>false,'respuesta'=>'La fila: '.$fila.' no pudo ser guardada, el campo '. $campo .' es obligatorio y debe pertenecer a un elemento de la lista.');

        if($formato AND !empty($valor))//El campo que no es obligatorio y contien un formato que no es permitido sera almacenado en ALERTAS pero dejara que los demas campos de su registro se almacenen
            return array('alerta'=>true,'error'=>true,'respuesta'=>'Fila: '.$fila.', el valor del campo '. $campo .' no corresponde a los valores de la lista(este campo no contendra valor), sin embargo sino existen errores en la fila se guardará en el sistema.');
        
        if(empty($valor))
            return  array('alerta'=>false,'error'=>true,'valor'=>true);//El campo que no es obligatorio y ademas esta vacio sera ignorado y la base de datos le asignara un NULL
     
        return array('alerta'=>false,'error'=>true,'valor'=>$valor,'campo'=>$campo);

    }

    public static function texto($valor,$fila,$campo,$obligatorio){
        $formato = preg_match('/[<>"\']{1,}/',$valor);

        if( (empty($valor) AND $obligatorio) || ($formato AND $obligatorio))//El campo obligatorio no puede estar vacio y debe cumplir con el formato
            return array('error'=>false,'respuesta'=>'La fila: '.$fila.' no pudo ser guardada, el campo '. $campo .' es obligatorio y no debe contener ni comillas simples ni dobles .');

        if($formato AND !empty($valor))//El campo que no es obligatorio y contien un formato que no es permitido sera almacenado en ALERTAS pero dejara que los demas campos de su registro se almacenen
            return array('alerta'=>true,'error'=>true,'respuesta'=>'Fila: '.$fila.', el valor del campo '. $campo .' no debe contener ni comillas simples ni dobles(este campo no contendra valor), sin embargo sino existen errores en la fila se guardará en el sistema.');
        
        if(empty($valor))
            return  array('alerta'=>false,'error'=>true,'valor'=>true);//El campo que no es obligatorio y ademas esta vacio sera ignorado y la base de datos le asignara un NULL
   
        $valor = trim($valor);
        return  array('alerta'=>false,'error'=>true,'valor'=>'"'.$valor.'"','campo'=>$campo);
    }
    
    public static function remplazarTildes($cadena){
        $no_permitidas = array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú");
        $permitidas =    array ("a","e","i","o","u","A","E","I","O","U");
        return str_replace($no_permitidas, $permitidas ,$cadena);
    }

}