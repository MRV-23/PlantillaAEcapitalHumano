<?php

Class Empresas{

    public static function guardar($data){

     
        $temp = array('documento'=>NULL,'logo'=>NULL,'sellos'=>NULL);

    
        if($data['id'] !== NULL){//actualización
            $registros = EmpresasModel::archivo($data['id'],Tablas::empresas());

            if($registros['documento'] !== NULL){
                $nombreDocumento = explode ( ".", $registros['documento']);
                $temp['documento'] = $nombreDocumento[0];//documento sin extension
            }

            if($registros['logo'] != NULL){
                $nombreLogo = explode ( ".", $registros['logo']);
                $temp['logo'] = $nombreLogo[0];//documento sin extension
            }

            if($registros['sellos'] != NULL){
                $nombreSellos = explode ( ".", $registros['sellos']);
                $temp['sellos'] = $nombreSellos[0];//documento sin extension
            }

            //return array('bandera'=>$temp['documento']);
        }

        if( $data["documentoNombre"] !== NULL || $data['id'] !== NULL ){
            if( $data["documentoNombre"] !== NULL ){
                if($temp['documento'] === NULL ){ // si no existia un archivo en la bd
                    $info = new SplFileInfo($data["documentoNombre"]);
                    $extensionImagen = $info->getExtension();
                    if(self::validarFormato(1,$extensionImagen))
                        return array('bandera'=>5);//tipo de archivo no valido
                    $cargar = self::cargarArchivo($data['documentoTemporal'],'pdf');
                    if( $cargar === false) 
                        return array('bandera'=>4); //el archivo no pudo subirse
                    $data["documentoNombre"]=$cargar;
                }
                else{//si ya se tenia un nombre de archivo en la bd
                    $cargar = self::cargarArchivo($data['documentoTemporal'],'pdf',$temp['documento']);
                    if( $cargar === false) 
                        return array('bandera'=>4); //el archivo no pudo subirse
                    $data["documentoNombre"]=$temp['documento'].'.pdf';
                }
           }
           else if($registros['documento'] !== NULL)
                $data["documentoNombre"] = $registros['documento'];
        }

        if( $data["imagenNombre"] !== NULL ||  $data['id'] !== NULL ){
            if( $data["imagenNombre"] !== NULL ){
                if($temp['logo'] === NULL){ // si no existia un archivo en la bd
                    $info = new SplFileInfo($data["imagenNombre"]);
                    $extensionImagen = $info->getExtension();
                    if(self::validarFormato(2,$extensionImagen))
                        return array('bandera'=>7);//tipo de archivo no valido
                    $cargar = self::cargarArchivo($data['imagenTemporal'],$extensionImagen);
                    if( $cargar === false) 
                        return array('bandera'=>6); //el archivo no pudo subirse
                    $data["imagenNombre"]=$cargar;
                }
                else{//si ya se tenia un nombre de archivo en la bd
                    $info = new SplFileInfo($data["imagenNombre"]);
                    $extensionImagen = $info->getExtension();
                    $cargar = self::cargarArchivo($data['imagenTemporal'],$extensionImagen,$temp['logo']);
                    if( $cargar === false) 
                        return array('bandera'=>6); //el archivo no pudo subirse
                    $data["imagenNombre"]=$temp['logo'].'.'.$extensionImagen;
                }
            }
            else if($registros['logo'] !== NULL)
                $data["imagenNombre"] = $registros['logo'];
        }


        if( $data["sellosNombre"] !== NULL ||  $data['id'] !== NULL ){
            if( $data["sellosNombre"] !== NULL ){
                if($temp['sellos'] === NULL){ // si no existia un archivo en la bd
                    $info = new SplFileInfo($data["sellosNombre"]);
                    $extensionImagen = $info->getExtension();
                    if(self::validarFormato(3,$extensionImagen))
                        return array('bandera'=>8);//tipo de archivo no valido
                    $cargar = self::cargarArchivo($data['sellosTemporal'],$extensionImagen);
                    if( $cargar === false) 
                        return array('bandera'=>9); //el archivo no pudo subirse
                    $data["sellosNombre"]=$cargar;
                }
                else{//si ya se tenia un nombre de archivo en la bd
                    $info = new SplFileInfo($data["sellosNombre"]);
                    $extensionImagen = $info->getExtension();
                    $cargar = self::cargarArchivo($data['sellosTemporal'],$extensionImagen,$temp['sellos']);
                    if( $cargar === false) 
                        return array('bandera'=>9); //el archivo no pudo subirse
                    $data["sellosNombre"]=$temp['sellos'].'.'.$extensionImagen;
                }
            }
            else if($registros['sellos'] !== NULL)
                $data["sellosNombre"] = $registros['sellos'];
        }

        
        if( $data["archivoSucursal"] !== NULL){
            foreach ($data['archivoSucursal'] as $indice=>$nombre){
               
                    $info = new SplFileInfo($nombre);
                    $extension = $info->getExtension();

                    if($extension === 'pdf'){
                        $aleatorio = mt_rand(100,99999999);
                        $hoy = date("YmdHis"); 
                        $nombre = $hoy.$aleatorio.'.'.$extension;
                        $ruta = "../intranet/documentos-empresas/".$nombre;       
                        move_uploaded_file($data['temporalSucursal'][$indice], $ruta);
                        $data['archivoSucursal'][$indice] = $nombre;
                    }
                    else
                        $data['archivoSucursal'][$indice] = NULL;
            }
        }

        $respuesta;

        if($data['id'] !== NULL){
            /*if($_SESSION['identificador'] != 168)
                return EmpresasModel::actualizar($data,Tablas::empresas(),Tablas::empresas_sucursales(),Tablas::responsables());
            else*/
                $respuesta = EmpresasModel::actualizar2($data,Tablas::empresas(),Tablas::empresas_sucursales(),Tablas::responsables());
        } 
        else{
            /*if($_SESSION['identificador'] != 168)
                return EmpresasModel::guardar($data,Tablas::empresas(),Tablas::empresas_sucursales(),Tablas::responsables());
            else*/
                $respuesta =  EmpresasModel::guardar2($data,Tablas::empresas(),Tablas::empresas_sucursales(),Tablas::responsables());  
        }

        if($respuesta['bandera'] == 2){
            self::cargarDocumentos($respuesta['id'],1,$data['documentosConstitutiva']);
            self::cargarDocumentos($respuesta['id'],2,$data['documentosAdministrador']);
        }
        
        return $respuesta;
    }

    private static $fileType = array('pdf');

    private static function cargarDocumentos($id,$destino,$archivos){
        if(!empty($archivos)){
            $ruta = "../intranet/documentos-empresas/".$id;
            if(!file_exists($ruta))
                mkdir($ruta, 0777, true);

            if($destino == 1)
                $departamento = 'apartado-constitutiva';
            else
                $departamento = 'apartado-administrador';

            $sizeMax = 25;
            $total = count($archivos);
            $extension = array();

            for($i=0;$i<$total;$i++){
                $info = new SplFileInfo($archivos[$i][0]);
                $extension[$i] = $info->getExtension();
                if(in_array($extension[$i] ,self::$fileType) AND $archivos[$i][2] <= $sizeMax * 1024 * 1024){
                    $hoy = date("Y-m-d-His");
                    $name = $id.'-'.$departamento.'-'.$hoy.'-'.$i.'.'.$extension[$i];
                    $src = $ruta."/".$name;       
                    move_uploaded_file($archivos[$i][1], $src);
                    $archivos[$i] = $name;   
                }
            }
        }
        return true;
    }

    private static function quitarTildes($cadena) { //
		$cadBuscar = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú","ñ","Ñ"," "); 
		$cadPoner = array("a", "A", "e", "E", "i", "I", "o", "O", "u", "U","n","N","-"); 
		$cadena = str_replace ($cadBuscar, $cadPoner, $cadena); 
		return $cadena; 
	} 


    public static function validarFormato($tipo,$extension){
        switch($tipo){
            case 1:
                    if($extension === 'pdf' || $extension === 'PDF')
                        return false;
                    else
                        return true;
            break;
            case 2:
                    if($extension === 'jpg' || $extension === 'JPG' || $extension === 'jpeg' || $extension === 'JPEG' || $extension === 'png' || $extension === 'PNG')
                        return false;
                    else
                        return true;
            break;
            case 3:
                    if($extension === 'zip' || $extension === 'ZIP' || $extension === 'rar' || $extension === 'RAR' || $extension === '7zip' || $extension === '7ZIP')
                        return false;
                    else
                        return true;
            break;
        }
    }

    public static function cargarArchivo($temporal,$extension,$nombre=""){
        if(empty($nombre)){
            $aleatorio = mt_rand(100,99999999);
            $hoy = date("YmdHis"); 
            $nombre = $hoy.$aleatorio;
        }

        $ruta = "../intranet/documentos-empresas/".$nombre.'.'.$extension;       
        if(!move_uploaded_file($temporal, $ruta))
            return false;
        return $nombre.'.'.$extension;
    }

    public static function marcadores($tipo){
        return EmpresasModel::marcadores($tipo,Tablas::empresas());
    }

    public static function borrarSucursal($id){
        return EmpresasModel::borrarSucursal($id,Tablas::empresas_sucursales());
    }

    public static function borrarResponsable($id){
        return EmpresasModel::borrarResponsable($id,Tablas::responsables());
    }

    public static function mostrarEmpresas($data,$limit){
        $html = '';
        $respuesta = EmpresasModel::mostrarEmpresas($data,$limit,Tablas::empresas());
		$colorFila= true;
		$contador=MetodosDiversos::indice($limit);
		foreach ($respuesta['data'] as $row => $item){
            if(intval($item["empresa_facturadora"]))
                $factura = '<i class="fa fa-check-square-o fa-2x text-green" aria-hidden="true"></i>';
            else
                $factura = '<i class="fa fa-ban fa-2x text-red" aria-hidden="true"></i>';
            if(intval($item["empresa_imss"]))
                $imss = '<i class="fa fa-check-square-o fa-2x text-green" aria-hidden="true"></i>';
            else
                $imss = '<i class="fa fa-ban fa-2x text-red" aria-hidden="true"></i>';
            if(intval($item["empresa_asimilados"]))
                $asimilados = '<i class="fa fa-check-square-o fa-2x text-green" aria-hidden="true"></i>';
            else
                $asimilados = '<i class="fa fa-ban fa-2x text-red" aria-hidden="true"></i>';

            $html .='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id"].'">
                        <div class="campoId">'.$contador.'</div>
                        <div class="campoNombre textoMay">'.$item["nombre"].'</div>
                        <div class="campoFactura">'.$factura.'</div>
                        <div class="campoImss">'.$imss.'</i></div>
                        <div class="campoAsimilados">'.$asimilados.'</i></div>
                        <div class="campoOpciones"><button class="btn btn-success mostrarDatosEmpresa">Mostrar</button></div>
                    </div>';
			$contador++;
        }
        return (array('data'=> $html, 'total'=>$respuesta['total']));
    }

    public static function cargarSucursales(){
        $respuesta = EmpresasModel::cargarSucursales(Tablas::sucursales());
        $html='';
		foreach($respuesta as $row => $item)
            $html.='<option value="'.$item["id_sucursal"].'">'.$item["nombre"].'</option>';
        return $html;	
    }

    public static function cargarUsuarios($sucursal,$tipo){
        $respuesta = EmpresasModel::cargarUsuarios($sucursal,Tablas::usuarios());
        $html='';
        if($tipo == 1)
            $html.='<select class="form-control textoMay" name="responsableCalculo[]" required>';
        else if($tipo == 2)
            $html.='<select class="form-control textoMay" name="responsableLiberacion[]" required>';
        else if($tipo == 3)
            $html.='<select class="form-control textoMay" name="responsableDispersion[]" required>';
        else
            $html.='<select class="form-control textoMay" name="responsableFacturacion[]" required>';
        $html.='<option value=""></option>';
		foreach($respuesta as $row => $item)
            $html.='<option value="'.$item["id_usuario"].'">'.$item["nombre"].'</option>';
        $html.='</select>';
        return $html;
    }

    static public function archivosAdjuntos($id,$seccion){
        $ruta = "../intranet/documentos-empresas/".$id."/".$id;
        $files = '';
        $indexFile = 0;

        $seccion = $seccion == 1 ? '-apartado-constitutiva' : '-apartado-administrador' ;

        foreach (glob($ruta.$seccion."*") as $nombre_fichero) {
            $files .= self::crearArchivo($nombre_fichero,$id,++$indexFile);
        }

        $files.='<div class="row">
                    <form method="post">  
                        <div class="col-md-12 estilos-centrar">
                            <p>
                                <hr>
                                <input type="hidden" value="'.$seccion.'" name="seccion">
                                <input type="hidden" value="'.$id.'" name="idEmpresa">
                                <button type="submit" name="descargarDocumentosEmpresas" value="" section="'.$seccion.'" id="botonTargetAdjuntos" class="btn btn-success"><i class="fa fa-download"></i> Descargar todos</button>
                            </p>
                        </div>
                    </form> 
                </div>';

        return array('html'=>$files,'total'=>$indexFile);
    }

    static public function mostrarArchivos($id,$seccion){
        $ruta = "../intranet/documentos-empresas/".$id."/".$id;
        $files = '';
        $indexFile = 0;

        $seccion2 = $seccion == 1 ? '-apartado-constitutiva' : '-apartado-administrador' ;

        foreach (glob($ruta.$seccion2."*") as $nombre_fichero) {
            if($indexFile++ < 4)
                $files .= self::crearArchivo($nombre_fichero,$id,$indexFile,$seccion);
        }

        if($indexFile > 4)
            $files .= '<a class="btn btn-default botonArchivosAdjuntos'.$seccion.'" href="#" title="Visualizar todos los archivos adjuntos"><b>Mostrar todos...</b></a>';

        return array('archivos'=>$files,'total'=>$indexFile);
    }

    static public function eliminarArchivo($id,$nombre){
        $respuesta = "../intranet/documentos-empresas/".$id."/".$nombre; 
        return unlink($respuesta);
    }

    static public function crearArchivo($ruta,$id,$indice = 1,$seccion=""){
        $peso = self::filesize_formatted($ruta);
        $nombre = basename($ruta);
        $nombre2 = substr($nombre, -9);
        $clase = str_replace('.','-', $nombre2);
        //$info = new SplFileInfo($nombre);
        //$extension = $info->getExtension();
        $ext = '<i class="fa fa-file-pdf-o fa-2x text-red"></i>';
        $visualizar = '<li><a href="#" class="visor-pdf-crow-empresas" alt="intranet/documentos-empresas/'.$id.'/'.$nombre.'"><i class="fa fa-eye"></i> Visualizar</a></li>';
        if(GrupoEmpresas::privilegios($_SESSION['identificador']) || intval($_SESSION['identificador2']) === 6 )
            $eliminar = '<li><a href="#" class="eliminarArchivoEmpresa" name="'.$nombre.'" target="'.$id.'" delete="'.$id.'-'.$clase.'"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>';
        return  '<div class="btn-group adjuntosContador '.$id.'-'.$clase.'" style="margin-right:8px;margin-bottom:8px" section="'.$seccion.'">
                    <a class="btn btn-default visor-pdf-crow-empresas" href="#" alt="intranet/documentos-empresas/'.$id.'/'.$nombre.'"  title="Visualizar">'.$ext.' '.'<b style="font-size:12px;">'.$id.'-'.$nombre2.'</b><div style="margin-bottom:-8px;margin-top:-2px;font-size:11px;margin-left:20px;">'.$peso.'</div></a>
                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="fa fa-caret-down" title="Opciones" style="padding-bottom:17px;"></span>
                    </a>
                    <ul class="dropdown-menu">
                        '.$visualizar.'
                        <li><a href="intranet/documentos-empresas/'.$id.'/'.$nombre.'" download="'.$id.'-'.$nombre2.'"><i class="fa fa-download fa-fw"></i> Descargar</a></li>
                        '.$eliminar.'
                    </ul>
                </div>';
    }

    static public function filesize_formatted($path) { 
        $bytes = filesize($path);
        if ($bytes >= 1073741824) 
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        elseif ($bytes >= 1048576) 
            $bytes = number_format($bytes / 1048576, 2) . ' MB'; 
        elseif ($bytes >= 1024) 
            $bytes = number_format($bytes / 1024, 2) . ' KB';  
        elseif ($bytes >= 1) 
            $bytes = $bytes . ' bytes';  
        else  
            $bytes = '0 bytes'; 
        
        return $bytes; 
    }

    public static function mostrarData($id){
            $html='';
            $respuesta = EmpresasModel::mostrarData($id,Tablas::empresas());
            $sucursales = EmpresasModel::mostrarSucursales($respuesta['id'],Tablas::empresas_sucursales());

            $responsableCalculo = EmpresasModel::responsables($id,1,Tablas::responsables());
            $responsableLiberacion = EmpresasModel::responsables($id,2,Tablas::responsables());
            $responsableDispersion = EmpresasModel::responsables($id,3,Tablas::responsables());
            $responsableFacturacion = EmpresasModel::responsables($id,4,Tablas::responsables());

            if($respuesta['status'] == 1){
                $status1 = 'selected';
                $status2 = '';
            }
            else{
                $status1 = '';
                $status2 = 'selected';
            }

            if($respuesta['status_intranet'] == 0){
                $status_intranet0 = 'selected';
                $status_intranet1 = '';
            }
            else{
                $status_intranet0 = '';
                $status_intranet1 = 'selected';
            }
            
            $facturarValor = $respuesta['empresa_facturadora'] == 1 ? 'checked' : '';
            $imssValor = $respuesta['empresa_imss'] == 1 ? 'checked': '' ;
            $asimiladosValor = $respuesta['empresa_asimilados'] == 1 ? 'checked': '' ;

            $denominacionValor = $respuesta['denominacion'] == 1 ? 'checked' : '';
            $objetoValor = $respuesta['objeto'] == 1 ? 'checked': '' ;
            $capitalValor = $respuesta['capital_social'] == 1 ? 'checked': '' ;
            $rppcValor = $respuesta['rppc'] == 1 ? 'checked': '' ;

            if($respuesta['documento'] != NULL)
                $existeCif = '<li><a href="#" class="visor-pdf-crow-empresas" alt="intranet/documentos-empresas/'.$respuesta['documento'].'"><i class="fa fa-eye"></i> Visualizar</a></li><li><a href="intranet/documentos-empresas/'.$respuesta['documento'].'" download="documento-'.$respuesta['razon'].'-'.$respuesta['rfc'].'" id="linkPdf"><i class="fa fa-download fa-fw"></i> Descargar</a></li>';
            else
                $existeCif ='<li><a href="#">No se ha cargado la CIF</a></li>';

            if($respuesta['logo'] != NULL)
                $existeLogo = '<li><a href="#" class="visor-crow-imagen-mini" alt="intranet/documentos-empresas/'.$respuesta['logo'].'"><i class="fa fa-eye"></i> Visualizar</a></li><li><a href="intranet/documentos-empresas/'.$respuesta['logo'].'" download="documento-'.$respuesta['razon'].'-'.$respuesta['rfc'].'" id="linkLogo"><i class="fa fa-download fa-fw"></i> Descargar</a></li>';
            else
                $existeLogo ='<li><a href="#">No se ha cargado el logo</a></li>';

            if($respuesta['sellos'] != NULL){
                $info = new SplFileInfo($respuesta['sellos']);
                $extension = $info->getExtension();
                 $existeSellos = '<li><a href="intranet/documentos-empresas/'.$respuesta['sellos'].'" download="documento-'.$respuesta['razon'].'-'.$respuesta['rfc'].'.'.$extension.'" id="linkSellos"><i class="fa fa-download fa-fw"></i> Descargar</a></li>';
            }  
            else
                $existeSellos ='<li><a href="#">No se han cargado los sellos</a></li>';

            $archivosConstitutiva =  self::mostrarArchivos($id,1);
            $archivosAdministrador =  self::mostrarArchivos($id,2);

            if( !GrupoEmpresas::privilegios($_SESSION['identificador']) AND intval($_SESSION['identificador2']) !== 6  ){
                $class='campo-read-only';
                $clase2 = 'campo-read-only2';
                $class3='background:#fff;border-top:0;border-right:0;cursor:default;';
                $slider2 = 'slider2';
                $class4='';
            }
            else{
                $class4='style="border: 2px dotted;padding:0 10px;margin-bottom:10px;"';
                $class=$clase2=$class3=$slider2='';
            }
                
            
          
                    $html.=  '<form method="POST" id="formularioEmpresas2" enctype="multipart/form-data">
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>A) Datos de Identificación del Contribuyente</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">1.-RFC:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="rfc" minlength="12" value="'.$respuesta['rfc'].'" maxlength="12" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">2.-Denominación/Razón Social:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['razon'].'" name="razon" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">3.-Régimen Capital:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['regimen'].'" name="regimen" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">4.-Nombre Comercial:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['nombre'].'" name="nombre" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">5.-Fecha inicio de operaciones:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" value="'.$respuesta['inicio'].'" name="inicio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">6.-Estatus en el padrón:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-toggle-on"></i>
                                                    </div>
                                                    <select class="form-control textoMay actualizarEmpresa" style="'.$class3.'" name="status" required>
                                                        <option value=""></option>
                                                        <option value="1" '.$status1.'>Activo</option>
                                                        <option value="2" '.$status2.'>Suspendido</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">7.-Fecha de último cambio de estado:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" value="'.$respuesta['ultimo_cambio'].'" name="ultimo_cambio" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        
                                <div style="background:#3c8dbc;color:#fff;padding:5px;margin-top:2%;border-top-right-radius:20px"><h4>B) Datos de Ubicación</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">8.-Código Postal:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay codigoPostal actualizarEmpresa '.$class.'" type="text" name="codigo" value="'.$respuesta['codigo'].'" title="Debe contener 5 digitos" minlength="5" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">9.-Tipo de Vialidad:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['tipo_vialidad'].'" name="tipo_vialidad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">10.-Nombre de Vialidad:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['nombre_vialidad'].'" name="nombre_vialidad" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">11.-Número Exterior:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['numero_exterior'].'" name="numero_exterior" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">12.-Número Interior:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['numero_interior'].'" name="numero_interior">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">13.-Nombre de la Colonia: </label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['colonia'].'" name="colonia" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">14.-Nombre de la Localidad:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['localidad'].'" name="localidad" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">15.-Municipio o Demarcación Territorial:</label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['municipio'].'" name="municipio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">16.-Nombre de la Entidad Federativa: </label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['entidad'].'" name="entidad" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">17.-Entre Calle:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['entre_calle1'].'" name="entre_calle1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">18.-Y Calle:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" value="'.$respuesta['entre_calle2'].'" name="entre_calle2">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">19.-Correo Electrónico: </label>
                                                <i class="fa fa-check-circle text-green"></i>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                    </div>
                                                    <input class="form-control actualizarEmpresa '.$class.'" type="text" name="mail" value="'.$respuesta['mail'].'" pattern="[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" title="Escribe un correo valido" required>
                                                </div>
                                            </div>
                                    </div>
                                </div> 
                                <br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>C) Tipo de empresa</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-12">
                                                <label for="" >20.-Status de la empresa:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-toggle-on"></i>
                                                    </div>
                                                    <select class="form-control textoMay textAreaImportante actualizarEmpresa" style="'.$class3.'" name="statusIntranet" required>
                                                        <option value="1" '.$status_intranet1.'>Activa</option>
                                                        <option value="0" '.$status_intranet0.'>Inactiva</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="idFactura2" style="cursor:pointer;">21.-La empresa factura:</label>
                                                <br>
                                                <label class="switch actualizarEmpresa2">
                                                    <input type="checkbox" id="idFactura2" value="1" '.$facturarValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="idImss2" style="cursor:pointer;">22.-La empresa es pagadora IMSS:</label>
                                                <br>
                                                <label class="switch actualizarEmpresa2">
                                                    <input type="checkbox" id="idImss2" value="1" '.$imssValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="idAsimilados2" style="cursor:pointer;">23.-La empresa es pagadora asimilados:</label>
                                                <br>
                                                <label class="switch actualizarEmpresa2">
                                                    <input type="checkbox" id="idAsimilados2" value="1" '.$asimiladosValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>
                                            </div>
                                    </div>
                                </div>
                                <br>

                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>D) Responsables</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <h4>24.- <button type="button" class="btn btn-success actualizarEmpresa '.$clase2.'" id="responsableCalculo2"> Añadir responsables</button>  Calculo de Nómina</h4>
                                    <div id="areaCalculo2">';
                                    
                                    foreach ($responsableCalculo as $row => $item){
                                        $html.= '<div '.$class4.'>
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="">Sucursal:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::sucursal($item['id_responsable'],Tablas::usuarios(),Tablas::sucursales()).'" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Responsable:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::nombreResponsable($item['id_responsable'],Tablas::usuarios()).'" disabled>
                                                            <input type="hidden" value="'.$item["id"].'">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger borrarResponsable actualizarEmpresa '.$clase2.'" value="'.$item["id"].'"><i class="fa fa-trash-o fa-2x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>';
                                    }
                                    
                                    
                $html.=            '</div>
                                    <h4>25.- <button type="button" class="btn btn-success actualizarEmpresa '.$clase2.'" id="responsableLiberacionFondeo2"> Añadir responsables</button> Liberación y fondeo</h4>
                                    <div id="areaLiberacionFondeo2">';
                                    
                                    foreach ($responsableLiberacion as $row => $item){
                                        $html.= '<div '.$class4.'>
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="">Sucursal:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::sucursal($item['id_responsable'],Tablas::usuarios(),Tablas::sucursales()).'" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Responsable:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::nombreResponsable($item['id_responsable'],Tablas::usuarios()).'" disabled>
                                                            <input type="hidden" value="'.$item["id"].'">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger borrarResponsable actualizarEmpresa '.$clase2.'" value="'.$item["id"].'"><i class="fa fa-trash-o fa-2x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>';
                                    }
                                    
                                    
                $html.=            '</div>
                                    <h4>26.- <button type="button" class="btn btn-success actualizarEmpresa '.$clase2.'" id="responsableDispersion2"> Añadir responsables</button> Dispersión de nómina</h4>
                                    <div id="areaDispersion2">';
                                    
                                    foreach ($responsableDispersion as $row => $item){
                                        $html.= '<div '.$class4.'>
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="">Sucursal:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::sucursal($item['id_responsable'],Tablas::usuarios(),Tablas::sucursales()).'" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Responsable:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::nombreResponsable($item['id_responsable'],Tablas::usuarios()).'" disabled>
                                                            <input type="hidden" value="'.$item["id"].'">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger borrarResponsable actualizarEmpresa '.$clase2.'" value="'.$item["id"].'"><i class="fa fa-trash-o fa-2x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>';
                                    }
                                    
                $html.=             '</div>
                                    <h4>27.- <button type="button" class="btn btn-success actualizarEmpresa '.$clase2.'" id="responsablesFacturacion2"> Añadir responsables</button> Facturación</h4>
                                    <div id="areaFacturacion2">';
                                    
                                    
                                    foreach ($responsableFacturacion as $row => $item){
                                        $html.= '<div '.$class4.'>
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="">Sucursal:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::sucursal($item['id_responsable'],Tablas::usuarios(),Tablas::sucursales()).'" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">Responsable:</label><br>
                                                            <input class="form-control textoMay '.$class.'" type="text" value="'.EmpresasModel::nombreResponsable($item['id_responsable'],Tablas::usuarios()).'" disabled>
                                                            <input type="hidden" value="'.$item["id"].'">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger borrarResponsable actualizarEmpresa '.$clase2.'" value="'.$item["id"].'"><i class="fa fa-trash-o fa-2x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>';
                                    }
                                    
            $html.=                  '</div>
                                </div>

                                <br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>E) Sucursales</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <p class="estilos-izquierda"> <i class="fa fa-info-circle fa-2x text-yellow"></i> <b>En caso de que la empresa tenga sucursales puedes añadir las direcciones de las mismas.</b> <button type="button" class="btn btn-success actualizarEmpresa '.$clase2.'" id="nuevaSucursal2"><i class="fa fa-home fa-lg"></i> Añadir sucursal</button></p>
                                   <div id="areaNuevaSucursal2">';
                                        foreach ($sucursales as $row => $item){
                                            $html.= '<div '.$class4.'>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="">Sucursal:</label><br>
                                                                <input class="form-control textoMay '.$class.'" type="text" value="'.$item['direccion'].'" disabled>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Motivo:</label><br>
                                                                <input class="form-control textoMay '.$class.'" type="text" value="'.$item['motivo'].'" disabled>
                                                                <input type="hidden" value="'.$item["id"].'">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <br>
                                                                <div class="btn-group">
                                                                   <!-- <span class="btn btn-info btn-lg btn-file" style="width:140px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documento <input type="file" name="sucursalCif[]" accept="application/pdf" value="'.$item['documento'].'" disabled></span>-->
                                                                    <a class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown" href="#">
                                                                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                                                    </a>                        
                                                                    <ul class="dropdown-menu">
                                                                        <!--<li><a href="#"><i class="fa fa-eye"></i> Visualizar</a></li>-->
                                                                        <li><a href="intranet/documentos-empresas/'.$item['documento'].'" download="sucursal-'.$respuesta['razon'].'-'.$respuesta['rfc'].'"><i class="fa fa-download fa-fw"></i> Descargar</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-1">
                                                                <button type="button" class="btn btn-danger borrarSucursal actualizarEmpresa '.$clase2.'" value="'.$item["id"].'"><i class="fa fa-trash-o fa-2x"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>';
                                        }
                                        
                $html.=           '</div>
                                </div>
                                <br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>F) Archivos</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">28.-CIF:</label>
                                                <div class="btn-group">
                                                    <span class="btn btn-primary btn-lg btn-file"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documento <input type="file" name="documento" id="documentoEmpresas2" class="actualizarEmpresa actualizarEmpresa3" accept="application/pdf"></span>          
                                                    <a class="btn btn-primary btn-lg dropdown-toggle actualizarEmpresa4" data-toggle="dropdown" href="#">
                                                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                                    </a>                        
                                                    <ul class="dropdown-menu">
                                                        '.$existeCif.'
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">29.-Logo:</label>
                                                <div class="btn-group">
                                                    <span class="btn btn-success btn-lg btn-file"><i class="fa fa-file-image-o" aria-hidden="true"></i> Imagen <input type="file" name="logo" id="logoEmpresas2" class="actualizarEmpresa actualizarEmpresa3" accept="image/*"></span> 
                                                    <a class="btn btn-success btn-lg dropdown-toggle actualizarEmpresa4" data-toggle="dropdown" href="#">
                                                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                                    </a>                        
                                                    <ul class="dropdown-menu">
                                                        '.$existeLogo.'
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">30.-Sellos:</label>
                                                <div class="btn-group">
                                                    <span class="btn btn-warning btn-lg btn-file"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Sellos <input type="file" name="sellos" id="sellosEmpresas2" class="actualizarEmpresa actualizarEmpresa3" accept=".zip,.rar,.7zip"></span> 
                                                    <a class="btn btn-warning btn-lg dropdown-toggle actualizarEmpresa4" data-toggle="dropdown" href="#">
                                                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                                    </a>                        
                                                    <ul class="dropdown-menu">
                                                        '.$existeSellos.'
                                                    </ul>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4" style="padding: 0 40px;" id="documentoLienzo2"></div>
                                            <div class="col-md-4" style="padding: 0 40px;" id="logoLienzo2"></div>
                                            <div class="col-md-4" style="padding: 0 40px;" id="sellosLienzo2"></div>
                                    </div>
                                </div>';


                                

                    $html.=    '<br>
                                <div style="background:#3c8dbc;color:#fff;padding:5px;border-top-right-radius:20px;"><h4>G) Jurídico</h4></div>
                                <div style="border:1px solid #222d32;padding:5px;">
                                <span>Total de archivos adjuntos: <b><span id="totalArchivosConstitutiva" style="font-size:20px;">'.$archivosConstitutiva['total'].'</span></b></span>'.' '.$archivosConstitutiva['archivos'].'
                                <hr>
                                    <div class="row form-group">
                                            <div class="col-md-8">
                                                <label for="">31.-Constitutiva:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="constitutiva" value="'.$respuesta['constitutiva'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">32.-Fecha protocolización:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" name="fechaProtocolizacionConstitutiva" value="'.$respuesta['fecha_proto_constitutiva'].'">
                                                </div>
                                            </div>
                                    </div>                                  
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">33.-Notaría:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-university" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="notariaConstitutiva" value="'.$respuesta['notaria_constitutiva'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">34.-Notario titular:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-gavel" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="notarioConstitutiva" value="'.$respuesta['notario_constitutiva'].'">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">35.-Folio mercantil electrónico (FME):</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="fmeConstitutiva" value="'.$respuesta['fme_constitutiva'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">36.-Fecha de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" name="fechaRegistroConstitutiva" value="'.$respuesta['fecha_registro_constitutiva'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">37.-Lugar de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="lugarRegistroConstitutiva" value="'.$respuesta['lugar_registro_constitutiva'].'">
                                                </div>
                                            </div>
                                    </div>
                                   <hr>
                                    <p class="'.$clase2.'">
                                        <span>Total de archivos por adjuntar: <b><span id="totalAdjuntosConstitutiva2" style="font-size:20px;">0</span></b></span>
                                    </p>
                                    <div id="ocultarLienzoAdjuntos">
                                        <ol id="documentosConstitutiva2" class="alert alert-info loadDocuments"><h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas3">Presiona</button></h2></ol>
                                    </div>
                                    <div class="'.$clase2.'" id="ocultarLienzoAdjuntos2"><ol class="alert alert-default text-center" style="background:#eee;cursor:not-allowed;"><h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default" disabled>Presiona</button></h2></ol></div>
                                    <hr style="border:1px solid #000;">
                                    <span>Total de archivos adjuntos: <b><span id="totalArchivosAdministrador" style="font-size:20px;">'.$archivosAdministrador['total'].'</span></b></span>'.' '.$archivosAdministrador['archivos'].'
                                    <hr>
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">38.-Administrador único:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="administrador" value="'.$respuesta['administrador'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">39.-Accionistas/socios:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-address-card-o"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="accionistas" value="'.$respuesta['accionistas'].'">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">40.-Escritura:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="escrituras" value="'.$respuesta['escrituras'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">41.-Fecha de protocolización:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" name="fechaProtocolizacionAdministrador" value="'.$respuesta['fecha_proto_administrador'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">42.-Fecha de asamblea:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" name="fechaAsamblea" value="'.$respuesta['fecha_asamblea'].'">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="">43.-Notaría:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-university" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="notariaAdministrador" value="'.$respuesta['notaria_administrador'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">44.-Notario titular:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-gavel" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="notarioAdministrador" value="'.$respuesta['notario_administrador'].'">
                                                </div>
                                            </div>
                                    </div>
                                   
                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="">45.-Folio mercantil Electrónico (FME):</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="fmeAdministrador" value="'.$respuesta['fme_administrador'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">46.-Fecha de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" name="fechaRegistroAdministrador" value="'.$respuesta['fecha_registro_administrador'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">47.-Lugar de registro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="lugarRegistroAdministrador" value="'.$respuesta['lugar_registro_administrador'].'">
                                                </div>
                                            </div>
                                    </div>

                                     <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="capitalSocial" style="cursor:pointer;">48.-Aumento de capital social:</label>
                                                <br>
                                        
                                                <label class="switch">
                                                    <input type="checkbox" id="capitalSocial2" value="1" '.$capitalValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>

                                            </div>
                                            <div class="col-md-4">
                                                <label for="objeto" style="cursor:pointer;">49.-Cambio de objeto:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="objeto2" value="1" '.$objetoValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="denominacion" style="cursor:pointer;">50.-Cambio de denominación:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="denominacion2" value="1" '.$denominacionValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>
                                            </div>
                                    </div>

                                    <p class="'.$clase2.'">
                                        <span>Total de archivos por adjuntar: <b><span id="totalAdjuntosAdministrador2" style="font-size:20px;">0</span></b></span>
                                    </p>
                                    <div id="ocultarLienzoAdjuntos3">
                                        <ol id="documentosAdministrador2" class="alert alert-info loadDocuments"><h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas4">Presiona</button></h2></ol>
                                    </div>
                                    <div class="'.$clase2.'" id="ocultarLienzoAdjuntos4"><ol class="alert alert-default text-center" style="background:#eee;cursor:not-allowed;"><h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default" disabled>Presiona</button></h2></ol></div>


                                    <hr style="border:1px solid #000;">

                                    <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="capitalSocial" style="cursor:pointer;">51.-Poder:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-hashtag"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="text" name="poder" value="'.$respuesta['poder'].'">
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <label>52.-Fecha:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control textoMay actualizarEmpresa '.$class.'" type="date" name="fechaPoder" value="'.$respuesta['fecha_poder'].'">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="rppc" style="cursor:pointer;">53.-Inscrito en el RPPC:</label>
                                                <br>
                                                <label class="switch">
                                                    <input type="checkbox" id="rppc2" value="1" '.$rppcValor.' class="actualizarEmpresa">
                                                    <span class="slider '.$slider2.' round"></span>
                                                </label>
                                            </div>
                                    </div>

                                     <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="capitalSocial" style="cursor:pointer;">54.-Apoderados:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="apoderados" class="form-control actualizarEmpresa '.$class.'" rows="8" style="resize:vertical;">'.$respuesta['apoderados'].'</textarea>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cambioObjeto" style="cursor:pointer;">55.-Facultades:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="fa fa-book" aria-hidden="true"></i>
                                                    </div>
                                                    <textarea name="facultades" class="form-control actualizarEmpresa '.$class.'" rows="8" style="resize:vertical;">'.$respuesta['facultades'].'</textarea>
                                                </div>
                                            </div>
                                    </div>

                                </div>';
              


                $html.=         '<br>
                                <p class="estilos-izquierda"> <i class="fa fa-check-circle fa-2x text-green"></i> Campos obligatorios.</p>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <input type="file" id="archivosPdf3" accept="application/pdf" multiple>
                                        <input type="file" id="archivosPdf4" accept="application/pdf" multiple>
                                        <a id="botonActualizar" class="btn btn-info"><i class="fa fa-refresh fa-lg"></i> Actualizar</a>
                                        <button type="submit" id="botonGuardarActualizacion" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i> Guardar</button>
                                    </div>
                                </div>
                            </form>';   
                return $html;
    }


}