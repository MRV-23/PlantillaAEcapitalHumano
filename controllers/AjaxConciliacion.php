<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Conciliacion.php';
require_once '../models/ConciliacionModel.php';
require_once '../models/config.php';
require_once '../models/usuarios.php';
require_once 'MetodosDiversos.php';
require_once "ajaxPaginacion.php";
require_once "Informativos.php";
require_once "../models/InformativosModel.php";
require_once 'ajaxPaginacion.php';
require '../views/excel/vendor/autoload.php';


class AjaxConciliacion{
    public $archivo;//Layout excel
    public $id = NULL;
    public $cuenta;
    public $banco;
    public $empresa;
    public $tesorero;
    public $tipo;
    public $target;
    public $beneficiario=NULL;
    public $concepto=NULL;
    public $descripcion=NULL;
    public $nota;
    public $fechaMovimiento;
    public $monto;
    public $estatus;
    public $fechaCobro = NULL;
    public $poliza = NULL;
    public $clasificacionCargos=NULL;
    public $factura=NULL;
    public $folio=NULL;
    public $autorizacion_extemporanea = NULL;
    public $paginaActual=1;
    public $registrosPorPagina=30;
    const TIPODEFAULT=2;
   
    public function nuevo_actualizar_conciliacion(){
        $data = array ( 'id'=>$this->id,
                        'cuenta'=>$this->cuenta,
                        'fechaMovimiento'=>$this->fechaMovimiento,
                        'tipo'=>$this->tipo,
                        'monto'=>$this->monto,
                        'estatus'=>$this->estatus,
                        'fechaCobro'=>$this->fechaCobro,
                        'poliza'=>$this->poliza,
                        'concepto'=>$this->concepto,
                        'beneficiario'=>$this->beneficiario,
                        'clasificacionCargos'=>$this->clasificacionCargos,
                        'factura'=>$this->factura,
                        'folio'=>$this->folio,
                        'descripcion'=>$this->descripcion,
                        'autorizacion_extemporanea'=>$this->autorizacion_extemporanea
                    );
        $respuesta = Conciliacion::nuevo_actualizar_conciliacion($data);
        
        if($respuesta['error']){
            echo json_encode($respuesta);
            return;
        }
        
        if($data['id']!==NULL){
            echo json_encode($respuesta);
            return;
        }
           
        $data = array( 'cuenta'=>'',
                        'monto'=>'',
                        'folio'=>'',
                        'tipo'=>TIPODEFAULT,
                        'fecha'=>''
                    ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target('conciliacion');
        $paginacion->parametrosPaginador($data);
        $totalRegistros =Conciliacion::contarRegistros($data);
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);

        $respuesta["paginador"] = $paginacion->mostrar();
        $respuesta['data'] = Conciliacion::mostrar_registros($paginacion->limitRegistros(),$data);
        $respuesta['total'] = $totalRegistros;

        echo json_encode($respuesta);
    }

    public function nuevo_actualizar_cuenta(){
        $data = array(  'id'=>$this->id,
                        'cuenta'=>$this->cuenta,
                        'banco'=>$this->banco,
                        'empresa'=>$this->empresa,
                        'tesorero'=>$this->tesorero
        );
        echo json_encode(Conciliacion::nuevo_actualizar_cuenta($data));
    }

    public function nuevo_actualizar_beneficiario(){
        $data = array(  'id'=>$this->id,
                        'beneficiario'=>$this->beneficiario
        );
        echo json_encode(Conciliacion::nuevo_actualizar_beneficiario($data));
    }

    public function nuevo_actualizar_concepto(){
        $data = array(  'id'=>$this->id,
                        'concepto'=>$this->concepto
        );
        echo json_encode(Conciliacion::nuevo_actualizar_concepto($data));
    }

    public function nuevo_actualizar_movimiento(){
        $data = array(  'id'=>$this->id,
                        'tipo'=>$this->tipo,
                        'concepto'=>$this->concepto,
                        'descripcion'=>$this->descripcion,
                        'nota'=>$this->nota     
                    );
        echo json_encode(Conciliacion::nuevo_actualizar_movimiento($data));
    }

    public function recargarListaCuentas(){
        echo json_encode(Conciliacion::recargarListaCuentas());
    }

    public function recargarListaBeneficiarios(){
        echo json_encode(Conciliacion::recargarListaBeneficiarios());
    }

    public function recargarListaConceptos(){
        echo json_encode(Conciliacion::recargarListaConceptos());
    }

    public function recargarListaMovimientos(){
        echo json_encode(Conciliacion::recargarListaMovimientos());
    }

    public function actualizarEstado(){
        echo json_encode(Conciliacion::actualizarEstado($this->id,$this->tipo,$this->target));
    }

    public function autorizarRegistro(){
        $respuesta = Conciliacion::autorizarRegistro($this->id);

        if($respuesta['error']){
            echo json_encode($respuesta);
            return;
        }
        
        $data = array( 'cuenta'=>'',
                        'monto'=>'',
                        'folio'=>'',
                        'tipo'=>TIPODEFAULT,
                        'fecha'=>''
                    ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target('conciliacion');
        $paginacion->parametrosPaginador($data);
        $totalRegistros =Conciliacion::contarRegistros($data);
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);

        $respuesta["paginador"] = $paginacion->mostrar();
        $respuesta['data'] = Conciliacion::mostrar_registros($paginacion->limitRegistros(),$data);
        $respuesta['total'] = $totalRegistros;

        echo json_encode($respuesta);
    }

    public function eliminarRegistro(){
        $respuesta = Conciliacion::eliminarRegistro($this->id);

        if($respuesta['error']){
            echo json_encode($respuesta);
            return;
        }
        
        $data = array( 'cuenta'=>'',
                        'monto'=>'',
                        'folio'=>'',
                        'tipo'=>TIPODEFAULT,
                        'fecha'=>''
                    ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target('conciliacion');
        $paginacion->parametrosPaginador($data);
        $totalRegistros =Conciliacion::contarRegistros($data);
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);

        $respuesta["paginador"] = $paginacion->mostrar();
        $respuesta['data'] = Conciliacion::mostrar_registros($paginacion->limitRegistros(),$data);
        $respuesta['total'] = $totalRegistros;

        echo json_encode($respuesta);
    }

    public function cargarMovimientos(){
        $editar = $this->tipo == 0 ? true : false;
        echo json_encode(Conciliacion::cargarMovimientos($editar,$this->tipo,$this->estatus));
    }

    public function obtenerDatosNomina(){
        echo json_encode(Conciliacion::obtenerDatosNomina($this->id));
    }

    public function mostrarRegistro(){
        echo json_encode(array(Conciliacion::mostrarRegistro($this->id)));
    }

    public function paginador(){
        $data = array(  'cuenta'=>$this->cuenta,
                        'monto'=>$this->monto,
                        'folio'=>$this->id,
                        'tipo'=>$this->tipo,
                        'fecha'=>$this->fecha
                ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $paginacion->parametrosPaginador($data);
        $totalRegistros=Conciliacion::contarRegistros($data);
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);
        $mostrar = $paginacion->mostrar();
        $data = Conciliacion::mostrar_registros($paginacion->limitRegistros(),$data);
        
         echo json_encode(array("error"=>false,"paginador"=>$mostrar,"html"=>$data,'total'=>$totalRegistros));
    }

    public function registrosMasivos(){
         
        $respuesta = Conciliacion::registrosMasivos($this->archivo);

        if($respuesta['error'] === 'return')
            echo json_encode(array('error'=>true,"titulo"=>$respuesta['titulo'], "subtitulo"=>$respuesta['subtitulo']));

        else if($respuesta['totalCorrectos'] === 0){
            if(empty($respuesta['data'])){
                $respuesta['data'] = "1.- Verifica que el archivo que intentas subir tenga el formato correcto."."\r\n";
                $respuesta['data'].= "2.- En caso de que sea un único registro el que intentas guardar, asegurate de que la CUENTA se encuentre seleccionada."."\r\n";
            }
            echo json_encode(array('error'=>true,"alerta"=>false,"titulo"=>'Ocurrio un error', "subtitulo"=>"No se cargó ningún registro, consulta el archivo de texto que se descargó para conocer el motivo",'log'=>true,'dataLog'=>$respuesta['data']));
        }

        else if($respuesta['totalCorrectos'] > 0 AND $respuesta['totalAlertas'] > 0 AND $respuesta['totalErrores'] > 0) 
            echo json_encode(array('error'=>false,"alerta"=>true,"titulo"=>'Proceso correcto, pero con ALERTAS y ERRORES, consulta el archivo de texto que se descargó', "subtitulo"=>"Registro(s) correcto(s): ".$respuesta['totalCorrectos'].", Registro(s) error(es): ".$respuesta['totalErrores'],'log'=>true,'dataLog'=>$respuesta['data']));
        
        else if($respuesta['totalCorrectos'] > 0 AND $respuesta['totalAlertas'] > 0 AND $respuesta['totalErrores'] === 0) 
            echo json_encode(array('error'=>false,"alerta"=>true,"titulo"=>'Proceso correcto, pero con ALERTAS, consulta el archivo de texto que se descargó', "subtitulo"=>"Registro(s) correcto(s): ".$respuesta['totalCorrectos'],'log'=>true,'dataLog'=>$respuesta['data']));

        else if($respuesta['totalCorrectos'] > 0 AND $respuesta['totalAlertas'] === 0 AND $respuesta['totalErrores'] > 0) 
            echo json_encode(array('error'=>false,"alerta"=>true,"titulo"=>'Proceso correcto pero con ERRORES, consulta el archivo de texto que se descargó', "subtitulo"=>"Registro(s) correcto(s): ".$respuesta['totalCorrectos'].", Registro(s) error(es): ".$respuesta['totalErrores'],'log'=>true,'dataLog'=>$respuesta['data']));

        else {
            if($_SESSION['identificador'] == 168)
                echo json_encode(array('error'=>false,"alerta"=>false,"titulo"=>'Proceso correcto', "subtitulo"=>"Se cargargaron correctamente: ".$respuesta['totalCorrectos']." registro(s)",'log'=>true,'dataLog'=>$respuesta['data']));
            else
                echo json_encode(array('error'=>false,"alerta"=>false,"titulo"=>'Proceso correcto', "subtitulo"=>"Se cargargaron correctamente: ".$respuesta['totalCorrectos']." registro(s)",'log'=>false,'dataLog'=>$respuesta['data']));
        }
    }
}

if(isset($_POST['Cuenta'])){
    $a = new AjaxConciliacion();
    if(isset($_POST['actualizarMovimiento']))
        $a->id = $_POST['actualizarMovimiento'];
    $a->cuenta = $_POST['Cuenta'];
    $a->fechaMovimiento = $_POST['FechaMovimiento'];
    $a->tipo = $_POST['Tmovimiento'];
    $a->monto = $_POST['MontoCheque'];
    $a->estatus = $_POST['Status'];
    if(isset($_POST['FechaCobro']) && !empty($_POST['FechaCobro']))
        $a->fechaCobro = $_POST['FechaCobro'];
    if(isset($_POST['NuPoliza']) && !empty($_POST['NuPoliza']))
        $a->poliza = $_POST['NuPoliza'];
    if(!empty($_POST['Concepto']))
        $a->concepto = $_POST['Concepto'];
    if(!empty($_POST['Beneficiario']))
        $a->beneficiario = $_POST['Beneficiario'];
    if(!empty($_POST['ClasificacionCargos']))
        $a->clasificacionCargos = $_POST['ClasificacionCargos'];
    if(isset($_POST['Factura']))
        $a->factura = trim($_POST['Factura']);
    if(isset($_POST['Folio']))
        $a->folio = trim($_POST['Folio']);
    if(!empty($_POST['Comentarios']))
        $a->descripcion = trim($_POST['Comentarios']);

    $a->nuevo_actualizar_conciliacion();
}
 
else if(isset($_POST['NewCuenta'])){
    $a = new AjaxConciliacion();
    if(isset($_POST['actualizarCuenta']))
        $a->id = $_POST['actualizarCuenta'];
    $a->cuenta = trim($_POST['NewCuenta']);
    $a->banco = $_POST['NewBanco'];
    $a->empresa = $_POST['NewEmpresa'];
    $a->tesorero = $_POST['NewTesorero'];   
    $a->nuevo_actualizar_cuenta();
}

else if(isset($_POST['Newbeneficiario'])){
    $a = new AjaxConciliacion();
    if(isset($_POST['actualizarBeneficiario']))
        $a->id = $_POST['actualizarBeneficiario'];
    $a->beneficiario = trim($_POST['Newbeneficiario']);
    $a->nuevo_actualizar_beneficiario();
}


else if(isset($_POST['NewconceptoMovimiento'])){
    $a = new AjaxConciliacion();
    if(isset($_POST['actualizarConcepto']))
        $a->id = $_POST['actualizarConcepto'];
    $a->concepto = trim($_POST['NewconceptoMovimiento']);
    $a->nuevo_actualizar_concepto();
}

else if(isset($_POST['NewtipomMovimiento'])){
    $a = new AjaxConciliacion();
    if(isset($_POST['actualizarMovimiento']))
        $a->id = $_POST['actualizarMovimiento'];
    $a->tipo = trim($_POST['NewtipomMovimiento']);
    $a->concepto = trim($_POST['NewnombreConcepto']);
    $a->descripcion = trim($_POST['Newdescripcion']);
    $a->nota = trim($_POST['Newnota']);
    $a->nuevo_actualizar_movimiento();
}

else if(isset($_POST['recargarListaCuentas'])){
    $a = New AjaxConciliacion();
    $a->recargarListaCuentas();
}

else if(isset($_POST['recargarListaBeneficiarios'])){
    $a = New AjaxConciliacion();
    $a->recargarListaBeneficiarios();
}

else if(isset($_POST['recargarListaConceptos'])){
    $a = New AjaxConciliacion();
    $a->recargarListaConceptos();
}

else if(isset($_POST['recargarListaMovimientos'])){
    $a = New AjaxConciliacion();
    $a->recargarListaMovimientos();
}

else if(isset($_POST['actualizarEstado'])){
    $a = New AjaxConciliacion();
    $a->id = $_POST['id'];
    $a->tipo = $_POST['tipoMovimiento'];//tipo: true o false
    $a->target = $_POST['campo'];
    $a->actualizarEstado();
}

else if(isset($_POST['actualizarMovimiento'])){
    $a = New AjaxConciliacion();
    $a->tipo = intval($_POST['actualizarMovimiento']);
    $a->status = boolval($_POST['actualizacion']);
    $a->cargarMovimientos();
}

else if(isset($_POST['idNomina'])){
    $a = New AjaxConciliacion();
    $a->id = intval($_POST['idNomina']);
    $a->obtenerDatosNomina();
}


else if(isset($_POST['mostrarRegistro'])){
    $a = New AjaxConciliacion();
    $a->id = intval($_POST['mostrarRegistro']);
    $a->mostrarRegistro();
}

else if(isset($_POST['paginaActual'])){
    $a = New AjaxConciliacion();
    $a->paginaActual=$_POST['paginaActual'];
    $a->registrosPorPagina=$_POST['registrosPorPagina'];
    $a->target=$_POST['target'];
    $a->id = $_POST['folio'];
    $a->monto = $_POST['monto'];
    $a->tipo = $_POST['tipo'];
    $a->cuenta = $_POST['cuenta'];
    $a->fechaMovimiento = $_POST['fecha'];
    $a->paginador();
}

else if(isset($_POST['eliminarRegistro'])){
    $a = New AjaxConciliacion();
    $a->id = intval($_POST['eliminarRegistro']);
    $a->eliminarRegistro();
}

else if(isset($_POST['autorizarRegistro'])){
    $a = New AjaxConciliacion();
    $a->id = intval($_POST['autorizarRegistro']);
    $a->autorizarRegistro();
}

else if( isset($_FILES["cargarRegistros"]["name"] )){
    $a = New AjaxConciliacion();
    $a->archivo = $_FILES["cargarRegistros"];
    $a->registrosMasivos();
}

