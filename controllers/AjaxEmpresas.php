<?php

session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Empresas.php';
require_once '../models/EmpresasModel.php';
require_once '../models/config.php';
require_once "ajaxPaginacion.php";
require_once "MetodosDiversos.php";

class AjaxEmpresas{
    Public $rfc;
    Public $razon;
    Public $regimen;
    Public $nombre;
    Public $inicio;
    Public $status;
    Public $ultimo_cambio;
    Public $codigo;
    Public $tipo_vialidad;
    Public $nombre_vialidad;
    Public $numero_exterior=NULL;
    Public $numero_interior;
    Public $colonia;
    Public $localidad;
    Public $municipio;
    Public $entidad;
    Public $entre_calle1=NULL;
    Public $entre_calle2=NULL;
    Public $mail;
    Public $statusIntranet = 1;
    Public $facturadora = 0;
    Public $imss = 0;
    Public $asimilados = 0;
    Public $sucursalesDireccion=array();
    Public $sucursalesMotivo=array();
    Public $actualizarSucursal = array();
    Public $responsablesCalculo=array();
    Public $responsablesLiberacion=array();
    Public $responsablesDispersion=array();
    Public $responsablesFacturacion=array();
    public $documentoNombre = NULL;
    public $documentoTemporal =NULL;
    public $imagenNombre = NULL;
    public $imagenTemporal =NULL;
    public $sellosNombre = NULL;
    public $sellosTemporal =NULL;
    public $documentoSucursalNombre = array();
    public $documentoSucursalTemporal = array();
    Public $id=NULL;
    Public $paginaActual;
    Public $registrosPorPagina;
    Public $target;
    Public $cliente;//nombre
    Public $liberado;//situacion
    Public $marcadores = NULL;
    Public $marcadores2 = NULL;

    
    Public $constitutiva = NULL;
    Public $fechaProtocolizacionConstitutiva = NULL;
    Public $notariaConstitutiva = NULL;
    Public $notarioConstitutiva = NULL;
    Public $fmeConstitutiva = NULL;
    Public $fechaRegistroConstitutiva = NULL;
    Public $lugarRegistroConstitutiva = NULL;
    Public $administrador = NULL;
    Public $accionistas = NULL;
    Public $escritura = NULL;
    Public $fechaProtocolizacionAdministrador = NULL;
    Public $fechaAsamblea = NULL;
    Public $notariaAdministrador = NULL;
    Public $notarioAdministrador = NULL;
    Public $fmeAdministrador = NULL;
    Public $fechaRegistroAdministrador = NULL;
    Public $lugarRegistroAdministrador = NULL;
    Public $capitalSocial = 0;
    Public $objeto = 0;
    Public $denominacion = 0;
    Public $poder = NULL;
    Public $fechaPoder = NULL;
    Public $rppc = 0;
    Public $apoderados = NULL;
    Public $facultades = NULL;
    Public $documentosAdministrador = array();
    Public $documentosConstitutiva = array();
    


    public function guardar(){
        $data = array(
            'id'=>$this->id,
            'rfc'=>$this->rfc,
            'razon'=>$this->razon,
            'regimen'=>$this->regimen,
            'nombre'=>$this->nombre,
            'inicio'=>$this->inicio,
            'status'=>$this->status,
            'ultimo_cambio'=>$this->ultimo_cambio,
            'codigo'=>$this->codigo,
            'tipo_vialidad'=>$this->tipo_vialidad,
            'nombre_vialidad'=>$this->nombre_vialidad,
            'numero_exterior'=>$this->numero_exterior,
            'numero_interior'=>$this->numero_interior,
            'colonia'=>$this->colonia,
            'localidad'=>$this->localidad,
            'municipio'=>$this->municipio,
            'entidad'=>$this->entidad,
            'entre_calle1'=>$this->entre_calle1,
            'entre_calle2'=>$this->entre_calle2,
            'mail'=>$this->mail,
            'statusIntranet'=>$this->statusIntranet,
            'documentoNombre'=>$this->documentoNombre,
            'documentoTemporal'=>$this->documentoTemporal,
            'imagenNombre'=>$this->imagenNombre,
            'imagenTemporal'=>$this->imagenTemporal,
            'sellosNombre'=>$this->sellosNombre,
            'sellosTemporal'=>$this->sellosTemporal,
            'asimilados'=>$this->asimilados,
            'imss'=>$this->imss,
            'facturadora'=>$this->facturadora,
            'sucursales'=>$this->sucursalesDireccion,
            'motivos'=>$this->sucursalesMotivo,
            'archivoSucursal'=>$this->documentoSucursalNombre,
            'temporalSucursal'=>$this->documentoSucursalTemporal,
            'actualizarSucursal'=>$this->actualizarSucursal,
            'responsablesCalculo'=>$this->responsablesCalculo,
            'responsablesLiberacion'=>$this->responsablesLiberacion,
            'responsablesDispersion'=>$this->responsablesDispersion,
            'responsablesFacturacion'=>$this->responsablesFacturacion
        );

        $respuesta = Empresas::guardar($data);
        if($respuesta['bandera'] == 3)
            echo json_encode(array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error SQL','subtitulo'=>'Intentalo de nuevo'));
        else if($respuesta['bandera'] == 2)
            echo json_encode(array('error'=>false,'tipo'=>'success','titulo'=>'El registro se realizo correctamente','subtitulo'=>''));
        else if($respuesta['bandera'] == 1)
            echo json_encode(array('error'=>false,'tipo'=>'warning','titulo'=>'La datos de la empresa se guardaron correctamente','subtitulo'=>'Pero la sucursal en la posición: '.$respuesta['posicion'].' NO pudo ser guardada'));  
        else if($respuesta['bandera'] == 4)    
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'El archivo PDF no pudo ser subido al servidor', "subtitulo"=>'error de carga'));
        else if($respuesta['bandera'] == 5)   
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Documento no válido', "subtitulo"=>'Formatos válidos: .pdf'));
        else if($respuesta['bandera'] == 6)    
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'El logo no pudo ser subido al servidor', "subtitulo"=>'error de carga'));
        else if($respuesta['bandera'] == 7)   
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Logo no válido', "subtitulo"=>'Formatos válidos: .jpg, .jpeg, .png'));
        else if($respuesta['bandera'] == 8)   
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Archivo comprimido no válido', "subtitulo"=>'Formatos válidos: .zip, .7zip, .rar'));
        else if($respuesta['bandera'] == 9)    
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'El archivo comprimido no pudo ser subido al servidor', "subtitulo"=>'error de carga'));
        else  
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Verifica el tamaño de los archivos', "subtitulo"=>'INDEFINIDO'));
       // echo json_encode(array('error'=>false,'tipo'=>'success','titulo'=>'El registro se realizo correctamente','subtitulo'=>'','pdf'=>$respuesta['pdf'],'logo'=>$respuesta['logo'],'sellos'=>$respuesta['sellos']));
        
    }

    public function guardar2(){
        $data = array(
            'id'=>$this->id,
            'rfc'=>$this->rfc,
            'razon'=>$this->razon,
            'regimen'=>$this->regimen,
            'nombre'=>$this->nombre,
            'inicio'=>$this->inicio,
            'status'=>$this->status,
            'ultimo_cambio'=>$this->ultimo_cambio,
            'codigo'=>$this->codigo,
            'tipo_vialidad'=>$this->tipo_vialidad,
            'nombre_vialidad'=>$this->nombre_vialidad,
            'numero_exterior'=>$this->numero_exterior,
            'numero_interior'=>$this->numero_interior,
            'colonia'=>$this->colonia,
            'localidad'=>$this->localidad,
            'municipio'=>$this->municipio,
            'entidad'=>$this->entidad,
            'entre_calle1'=>$this->entre_calle1,
            'entre_calle2'=>$this->entre_calle2,
            'mail'=>$this->mail,
            'statusIntranet'=>$this->statusIntranet,
            'documentoNombre'=>$this->documentoNombre,
            'documentoTemporal'=>$this->documentoTemporal,
            'imagenNombre'=>$this->imagenNombre,
            'imagenTemporal'=>$this->imagenTemporal,
            'sellosNombre'=>$this->sellosNombre,
            'sellosTemporal'=>$this->sellosTemporal,
            'asimilados'=>$this->asimilados,
            'imss'=>$this->imss,
            'facturadora'=>$this->facturadora,
            'sucursales'=>$this->sucursalesDireccion,
            'motivos'=>$this->sucursalesMotivo,
            'archivoSucursal'=>$this->documentoSucursalNombre,
            'temporalSucursal'=>$this->documentoSucursalTemporal,
            'actualizarSucursal'=>$this->actualizarSucursal,
            'responsablesCalculo'=>$this->responsablesCalculo,
            'responsablesLiberacion'=>$this->responsablesLiberacion,
            'responsablesDispersion'=>$this->responsablesDispersion,
            'responsablesFacturacion'=>$this->responsablesFacturacion,
            'constitutiva'=>$this->constitutiva,
            'fechaProtocolizacionConstitutiva'=>$this->fechaProtocolizacionConstitutiva,
            'notariaConstitutiva'=>$this->notariaConstitutiva,
            'notarioConstitutiva'=>$this->notarioConstitutiva,
            'fmeConstitutiva'=>$this->fmeConstitutiva,
            'fechaRegistroConstitutiva'=>$this->fechaRegistroConstitutiva,
            'lugarRegistroConstitutiva'=>$this->lugarRegistroConstitutiva,
            'documentosConstitutiva'=>$this->documentosConstitutiva,
            'administrador'=>$this->administrador,
            'accionistas'=>$this->accionistas,
            'escritura'=>$this->escritura,
            'fechaProtocolizacionAdministrador'=>$this->fechaProtocolizacionAdministrador,
            'fechaAsamblea'=>$this->fechaAsamblea,
            'notariaAdministrador'=>$this->notariaAdministrador,
            'notarioAdministrador'=>$this->notarioAdministrador,
            'fmeAdministrador'=>$this->fmeAdministrador,
            'fechaRegistroAdministrador'=>$this->fechaRegistroAdministrador,
            'lugarRegistroAdministrador'=>$this->lugarRegistroAdministrador,
            'capitalSocial'=>$this->capitalSocial,
            'objeto'=>$this->objeto,
            'denominacion'=>$this->denominacion,
            'documentosAdministrador'=>$this->documentosAdministrador,
            'poder'=>$this->poder,
            'fechaPoder'=>$this->fechaPoder,
            'rppc'=>$this->rppc,
            'apoderados'=>$this->apoderados,
            'facultades'=>$this->facultades
        );

        $respuesta = Empresas::guardar($data);
        if($respuesta['bandera'] == 3)
            echo json_encode(array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error SQL','subtitulo'=>'Intentalo de nuevo'));
        else if($respuesta['bandera'] == 2)
            echo json_encode(array('error'=>false,'tipo'=>'success','titulo'=>'El registro se realizo correctamente','subtitulo'=>''));
        else if($respuesta['bandera'] == 1)
            echo json_encode(array('error'=>false,'tipo'=>'warning','titulo'=>'La datos de la empresa se guardaron correctamente','subtitulo'=>'Pero la sucursal en la posición: '.$respuesta['posicion'].' NO pudo ser guardada'));  
        else if($respuesta['bandera'] == 4)    
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'El archivo PDF no pudo ser subido al servidor', "subtitulo"=>'error de carga'));
        else if($respuesta['bandera'] == 5)   
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Documento no válido', "subtitulo"=>'Formatos válidos: .pdf'));
        else if($respuesta['bandera'] == 6)    
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'El logo no pudo ser subido al servidor', "subtitulo"=>'error de carga'));
        else if($respuesta['bandera'] == 7)   
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Logo no válido', "subtitulo"=>'Formatos válidos: .jpg, .jpeg, .png'));
        else if($respuesta['bandera'] == 8)   
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Archivo comprimido no válido', "subtitulo"=>'Formatos válidos: .zip, .7zip, .rar'));
        else if($respuesta['bandera'] == 9)    
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'El archivo comprimido no pudo ser subido al servidor', "subtitulo"=>'error de carga'));
        else  
            echo json_encode(array('error'=>true,'tipo'=>'error',"titulo"=>'Verifica el tamaño de los archivos', "subtitulo"=>'INDEFINIDO'));   
    }

    public function mostrarData(){
        $respuesta = Empresas::mostrarData($this->id);
        $validacion = GrupoEmpresas::privilegios($_SESSION['identificador']) || intval($_SESSION['identificador2']) === 6 ? true : false;
        echo json_encode(array('error'=>false,'html'=>$respuesta,'status'=>$validacion));
    }

    public function borrarSucursal(){
        $respuesta = Empresas::borrarSucursal($this->id);
        echo json_encode(array('error'=>!$respuesta));
    }

    public function borrarResponsable(){
        $respuesta = Empresas::borrarResponsable($this->id);
        echo json_encode(array('error'=>!$respuesta));
    }

    public function cargarSucursales(){
        $respuesta = Empresas::cargarSucursales();
        echo json_encode(array('error'=>false,'html'=>$respuesta));
    }

    public function cargarUsuarios(){
        $respuesta = Empresas::cargarUsuarios($this->id,$this->target);
        echo json_encode(array('error'=>false,'html'=>$respuesta));
    }
    
    public function paginador(){
        $data = array( 'nombre'=>$this->cliente,'situacion'=>$this->liberado); 
        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $paginacion->paginaActual($this->paginaActual);
        $paginacion->parametroCliente($this->cliente);
        $paginacion->parametroLiberado($this->liberado);
        $respuesta=Empresas::mostrarEmpresas($data,$paginacion->limitRegistros());
        $paginacion->totalPaginas($respuesta['total']);
        $mostrar = $paginacion->mostrar();
        if($this->marcadores !==NULL){
            $this->marcadores = Empresas::marcadores(1);
            $this->marcadores2 = Empresas::marcadores(0);
        }

        echo json_encode(array("error"=>false,"paginador"=>$mostrar,"html"=>$respuesta['data'],'total'=>$respuesta['total'],'activas'=>$this->marcadores,'inactivas'=>$this->marcadores2));
    }

    public function archivosAdjuntos(){
        $respuesta = Empresas::archivosAdjuntos($this->id,$this->target);
        echo json_encode(array('error'=>false,'html'=>$respuesta['html'],'total'=>$respuesta['total']));
    }

    public function eliminarArchivo(){
        if(!Empresas::eliminarArchivo($this->id,$this->target))
            echo json_encode(array('error'=>true,'titulo'=>'El archivo no puede ser borrado','subtitulo'=>'¡Intentalo nuevamente!'));
        else
            echo json_encode(array('error'=>false));
    }
   
}

if(isset($_POST['rfc'])){

    if( !GrupoEmpresas::privilegios($_SESSION['identificador']) AND intval($_SESSION['identificador2']) !== 6  ){
        echo json_encode(array('error'=>true,'tipo'=>'error','titulo'=>'Error','subtitulo'=>'No tienes privilegios para este proceso '.$valor));
        return;
    }

    $a = new AjaxEmpresas();
    if(isset($_POST['actualizarEmpresa']))
        $a->id = $_POST['actualizarEmpresa'];
    $a->rfc=$_POST['rfc'];
    $a->razon=$_POST['razon'];
    $a->regimen=$_POST['regimen'];
    $a->nombre=$_POST['nombre'];
    $a->inicio=$_POST['inicio'];
    $a->status=$_POST['status'];
    $a->ultimo_cambio=$_POST['ultimo_cambio'];
    $a->codigo=$_POST['codigo'];
    $a->tipo_vialidad=$_POST['tipo_vialidad'];
    $a->nombre_vialidad=$_POST['nombre_vialidad'];
    $a->numero_exterior=$_POST['numero_exterior'];
    $a->numero_interior=$_POST['numero_interior'];
    $a->colonia=$_POST['colonia'];
    $a->localidad=$_POST['localidad'];
    $a->municipio=$_POST['municipio'];
    $a->entidad=$_POST['entidad'];
    $a->entre_calle1=$_POST['entre_calle1'];
    $a->entre_calle2=$_POST['entre_calle2'];
    $a->mail=$_POST['mail'];
    $a->statusIntranet=$_POST['statusIntranet'];
    if(isset($_POST['asimilados']))
        $a->asimilados = $_POST['asimilados'];
    if(isset($_POST['imss']))
        $a->imss = $_POST['imss'];
    if(isset($_POST['facturadora']))
        $a->facturadora=$_POST['facturadora'];

    if(isset($_POST['sucursalDireccion'])){
        $a->sucursalesDireccion = $_POST['sucursalDireccion'];
        $a->sucursalesMotivo = $_POST['sucursalMotivo'];
        $a->actualizarSucursal = $_POST['actualizarSucursal'];
    }  

    if(isset($_POST['responsableCalculo'])){
        $a->responsablesCalculo = $_POST['responsableCalculo'];
    } 
    
    if(isset($_POST['responsableLiberacion'])){
        $a->responsablesLiberacion = $_POST['responsableLiberacion'];
    } 

    if(isset($_POST['responsableDispersion'])){
        $a->responsablesDispersion = $_POST['responsableDispersion'];
    } 

    if(isset($_POST['responsableFacturacion'])){
        $a->responsablesFacturacion = $_POST['responsableFacturacion'];
    } 

    if(isset($_FILES["sucursalCif"]["name"])){
        $a->documentoSucursalNombre = $_FILES["sucursalCif"]["name"];
        $a->documentoSucursalTemporal = $_FILES["sucursalCif"]["tmp_name"];
    }

    if(!empty($_FILES["documento"]["name"])){
        $a->documentoNombre = $_FILES["documento"]["name"];
        $a->documentoTemporal = $_FILES["documento"]["tmp_name"];
    }
    if(!empty($_FILES["logo"]["name"])){
        $a->imagenNombre = $_FILES["logo"]["name"];
        $a->imagenTemporal = $_FILES["logo"]["tmp_name"];
    }
    if(!empty($_FILES["sellos"]["name"])){
        $a->sellosNombre = $_FILES["sellos"]["name"];
        $a->sellosTemporal = $_FILES["sellos"]["tmp_name"];
    }
    
        //$a->guardar();
  
        if(!empty($_POST['constitutiva']))
            $a->constitutiva =  $_POST['constitutiva'];
        if(!empty($_POST['fechaProtocolizacionConstitutiva']))
            $a->fechaProtocolizacionConstitutiva = $_POST['fechaProtocolizacionConstitutiva'];
        if(!empty($_POST['notariaConstitutiva']))
            $a->notariaConstitutiva = $_POST['notariaConstitutiva'];
        if(!empty($_POST['notarioConstitutiva']))
            $a->notarioConstitutiva = $_POST['notarioConstitutiva'];
        if(!empty($_POST['fmeConstitutiva']))
            $a->fmeConstitutiva = $_POST['fmeConstitutiva'];
        if(!empty($_POST['fechaRegistroConstitutiva']))
            $a->fechaRegistroConstitutiva = $_POST['fechaRegistroConstitutiva'];
        if(!empty($_POST['lugarRegistroConstitutiva']))
            $a->lugarRegistroConstitutiva = $_POST['lugarRegistroConstitutiva'];
        if(!empty($_POST['administrador']))
            $a->administrador = $_POST['administrador'];
        if(!empty($_POST['accionistas']))
            $a->accionistas = $_POST['accionistas'];
        if(!empty($_POST['escrituras']))
            $a->escritura = $_POST['escrituras'];
        if(!empty($_POST['fechaProtocolizacionAdministrador']))
            $a->fechaProtocolizacionAdministrador = $_POST['fechaProtocolizacionAdministrador'];
        if(!empty($_POST['fechaAsamblea']))
            $a->fechaAsamblea = $_POST['fechaAsamblea'];
        if(!empty($_POST['notariaAdministrador']))
            $a->notariaAdministrador = $_POST['notariaAdministrador'];
        if(!empty($_POST['notarioAdministrador']))
            $a->notarioAdministrador = $_POST['notarioAdministrador'];
        if(!empty($_POST['fmeAdministrador']))
            $a->fmeAdministrador = $_POST['fmeAdministrador'];
        if(!empty($_POST['fechaRegistroAdministrador']))
            $a->fechaRegistroAdministrador = $_POST['fechaRegistroAdministrador'];
        if(!empty($_POST['lugarRegistroAdministrador']))
            $a->lugarRegistroAdministrador = $_POST['lugarRegistroAdministrador'];
        if(!empty($_POST['capitalSocial']))
            $a->capitalSocial = $_POST['capitalSocial'];
        if(!empty($_POST['objeto']))
            $a->objeto = $_POST['objeto'];
        if(!empty($_POST['denominacion']))
            $a->denominacion = $_POST['denominacion'];
        if(!empty($_POST['poder']))
            $a->poder = $_POST['poder'];
        if(!empty($_POST['fechaPoder']))
            $a->fechaPoder = $_POST['fechaPoder'];
        if(!empty($_POST['rppc']))
            $a->rppc = $_POST['rppc'];
        if(!empty($_POST['apoderados']))
            $a->apoderados = $_POST['apoderados'];
        if(!empty($_POST['facultades']))
            $a->facultades = $_POST['facultades'];

        if(isset($_POST['totalDocumentosConstitutiva'])){
            for($i=0;$i<intVal($_POST['totalDocumentosConstitutiva']);$i++)
                $a->documentosConstitutiva[$i]=array($_FILES["documentosConstitutiva".$i]["name"],$_FILES["documentosConstitutiva".$i]["tmp_name"],$_FILES["documentosConstitutiva".$i]["size"]);
        }
        if(isset($_POST['totalDocumentosAdministrador'])){
            for($i=0;$i<intVal($_POST['totalDocumentosAdministrador']);$i++)
                $a->documentosAdministrador[$i]=array($_FILES["documentosAdministrador".$i]["name"],$_FILES["documentosAdministrador".$i]["tmp_name"],$_FILES["documentosAdministrador".$i]["size"]);
        }
        
        $a->guardar2();
    
}

else if(isset($_POST['mostrarData'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['mostrarData'];
    $a->mostrarData();
}

else if(isset($_POST['paginaActual'])){
    $a = New AjaxEmpresas();
    $a->paginaActual=$_POST['paginaActual'];
    $a->registrosPorPagina=$_POST['registrosPorPagina'];
    $a->target=$_POST['target'];
    $a->cliente=$_POST['cliente'];
    $a->liberado=$_POST['liberado'];
    if(isset($_POST['marcadores'])){
        $a->marcadores=true;
        $a->marcadores2=true;
    }
       
    $a->paginador();
}

/*else if(isset($_POST['mostrarData'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['mostrarData'];
    $a->mostrarData();
}*/

else if(isset($_POST['borrarSucursal'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['borrarSucursal'];
    $a->borrarSucursal();
}

else if(isset($_POST['borrarResponsable'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['borrarResponsable'];
    $a->borrarResponsable();
}

else if(isset($_POST['cargarSucursales'])){
    $a = new AjaxEmpresas();
    $a->cargarSucursales();
}

else if(isset($_POST['cargarUsuarios'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['cargarUsuarios'];
    $a->target = $_POST['tipo'];
    $a->cargarUsuarios();
}

else if(isset($_POST['archivosAdjuntos'])){
    $a = New AjaxEmpresas();
    $a->id = $_POST['archivosAdjuntos'];
    $a->target =  $_POST['location'];
    $a->archivosAdjuntos();
}

else if(isset($_POST['eliminarArchivo'])){
    if( !GrupoEmpresas::privilegios($_SESSION['identificador']) AND intval($_SESSION['identificador2']) !== 6  ){
        echo json_encode(array('error'=>true,'tipo'=>'error','titulo'=>'Error','subtitulo'=>'No tienes privilegios para este proceso '.$valor));
        return;
    }
    $a = New AjaxEmpresas();
    $a->id = $_POST['eliminarArchivo'];
    $a->target = $_POST['rutaCarpeta'];
    $a->eliminarArchivo();
}

