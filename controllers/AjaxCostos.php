<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Costos.php';
require_once '../models/CostosModel.php';
require_once '../models/config.php';
require_once 'MetodosDiversos.php';
require_once "ajaxPaginacion.php";
require_once "Informativos.php";
require_once "../models/InformativosModel.php";

//require '../views/excel/vendor/autoload.php';

class AjaxCostos{
    public $archivo;//Layout excel
    public $id = NULL;
 
    /******Formulario IMSS */
   // public $ejercicio;
    public $mes;
    public $cliente;
    //public $nombre_comercial;
    public $promotor;
    public $subcomisionista;
    public $codigo_cliente;
    public $empleados;
    public $imss;
    public $real_imss;
    public $ajuste_imss;
    public $rcv;
    public $real_rcv;
    public $ajuste_rcv;
    public $infonavit;
    public $real_infonavit;
    public $ajuste_infonavit;
    public $impuesto_estatal;
    public $gmma;
    public $vida_invalidez;
    public $gmme;
    public $otros;
    public $subtotal;
    public $imss_obrero;
    public $real_imss_obrero;
    public $ajuste_imss_obrero;
    public $rcv_obrero;
    public $real_rcv_obrero;
    public $ajuste_rcv_obrero;
    public $amortizacion;
    public $real_amortizacion;
    public $ajuste_amortizacion;
    public $total;
    public $empresa;
    public $comentarios;
    /*******Paginador*/
    public $paginaActual;
    public $registrosPorPagina;
    public $target;
    //public $cliente="";
    public $nomina="";
    public $facturado="";
    public $liberado="";
    public $nominista="";
    public $autorizacion="";

    public function nuevo_actualizar(){
        $data = array(  'id'=>$this->id,
                        //'ejercicio'=>$this->ejercicio,
                        'mes'=>$this->mes,
                        'cliente'=>$this->cliente,
                        //'nombre_comercial'=>$this->nombre_comercial,
                        'promotor'=>$this->promotor,
                        'subcomisionista'=>$this->subcomisionista,
                        'codigo_cliente'=>$this->codigo_cliente,
                        'empleados'=>$this->empleados,
                        'imss'=>$this->imss,
                        'real_imss'=>$this->real_imss,
                        'ajuste_imss'=>$this->ajuste_imss,
                        'rcv'=>$this->rcv,
                        'real_rcv'=>$this->real_rcv,
                        'ajuste_rcv'=>$this->ajuste_rcv,
                        'infonavit'=>$this->infonavit,
                        'real_infonavit'=>$this->real_infonavit,
                        'ajuste_infonavit'=>$this->ajuste_infonavit,
                        /*'impuesto_estatal'=>$this->impuesto_estatal,
                        'gmma'=>$this->gmma,
                        'vida_invalidez'=>$this->vida_invalidez,
                        'gmme'=>$this->gmme,
                        'otros'=>$this->otros,*/
                        'subtotal'=>$this->subtotal,
                        'imss_obrero'=>$this->imss_obrero,
                        'real_imss_obrero'=>$this->real_imss_obrero,
                        'ajuste_imss_obrero'=>$this->ajuste_imss_obrero,
                        'rcv_obrero'=>$this->rcv_obrero,
                        'real_rcv_obrero'=>$this->real_rcv_obrero,
                        'ajuste_rcv_obrero'=>$this->ajuste_rcv_obrero,
                        'amortizacion'=>$this->amortizacion,
                        'real_amortizacion'=>$this->real_amortizacion,
                        'ajuste_amortizacion'=>$this->ajuste_amortizacion,
                        'total'=>$this->total,
                        'empresa'=>$this->empresa,
                        'comentarios'=>$this->comentarios
        );
        echo json_encode(Costos::nuevo_actualizar($data));
    }

    public function actualizarGm(){
        $data = array(  'id'=>$this->id,
                        'gmma'=>$this->gmma,
                        'vida_invalidez'=>$this->vida_invalidez,
                        'gmme'=>$this->gmme,
                        'otros'=>$this->otros,
                        'subtotal'=>$this->subtotal,
                        'total'=>$this->total,
                        'comentarios'=>$this->comentarios
                    );
        echo json_encode(Costos::actualizarGm($data));
    }

    public function actualizarNominas(){
                $data = array(  'id'=>$this->id,
                                'impuesto_estatal'=>$this->impuesto_estatal,
                                'subtotal'=>$this->subtotal,
                                'total'=>$this->total,
                                'comentarios'=>$this->comentarios
                            );
        echo json_encode(Costos::actualizarNominas($data));
    }

    public function mostrar(){
        echo json_encode(array('data'=>Costos::mostrar($this->id)));
    }

    public function refrescar(){
        echo json_encode(array('data'=>Costos::mostrar2($this->id,$this->cliente),'total'=>Costos::contarRegistros($this->id,$this->cliente) ));
    }

    public function eliminar(){
        echo json_encode(Costos::eliminar($this->id));
    }

    public function cargarLayout(){
        Costos::cargarLayout($this->archivo);
    }

    public function paginador(){
       
    }

    public function actualizarInformativo(){
        echo json_encode(Informativos::actualizarInformativo($this->target,$this->comentarios));
    }
    public function nuevoCliente(){
        echo json_encode(Costos::nuevoCliente($this->cliente,$this->nombre_comercial,$this->target));
    }
    public function nuevoPromotor(){
        echo json_encode(Costos::nuevoPromotor($this->promotor,$this->target));
    }
    public function nuevoSubcomisionista(){
        echo json_encode(Costos::nuevoSubcomisionista($this->subcomisionista,$this->target));
    }

    public function recargarListaClientes(){
        echo json_encode(Costos::recargarListaClientes());
    }
    public function recargarListaPromotores(){
        echo json_encode(Costos::recargarListaPromotores());
    }
    public function recargarListaSubcomisionistas(){
        echo json_encode(Costos::recargarListaSubcomisionistas());
    }

    public function actualizarEstado(){
        echo json_encode(Costos::actualizarEstado($this->id,$this->nomina,$this->target));
    }

}

//Nuevo registro o actualización 
if(isset($_POST['Mes'])){
    $a = new AjaxCostos();
    if(isset($_POST['actualizar']))
        $a->id = $_POST['actualizar'];
    //$a->ejercicio = $_POST['Ejercicio'];
    $a->mes = $_POST['Mes'];
    $a->cliente = $_POST['Clientes'];
    //$a->nombre_comercial = $_POST['NombreComercial'];
    $a->promotor = $_POST['NombrePromotor'];
    $a->subcomisionista = $_POST['Subcomisionista'];
    $a->codigo_cliente = $_POST['CodigoCliente'];
    $a->empleados = $_POST['Empleados'];
    $a->imss = $_POST['Imss'];
    $a->real_imss = $_POST['RealPagadoImss'];
    $a->ajuste_imss = $_POST['AjusteImss'];
    $a->rcv = $_POST['Rcv'];
    $a->real_rcv = $_POST['RealPagadoRcv'];
    $a->ajuste_rcv = $_POST['AjustesRcv'];
    $a->infonavit = $_POST['Infonavit'];
    $a->real_infonavit = $_POST['RealPagadoInf'];
    $a->ajuste_infonavit = $_POST['AjusteInf'];
    //$a->impuesto_estatal = $_POST['ImpuestoEstatal'];
    //$a->gmma = $_POST['Gmma'];
    //$a->vida_invalidez = $_POST['VidaEI'];
    //$a->gmme = $_POST['Gmme'];
    //$a->otros = $_POST['Otros'];
    $a->subtotal = $_POST['SubtotalPatronal'];
    $a->imss_obrero = $_POST['ImssObr'];
    $a->real_imss_obrero = $_POST['RealPO'];
    $a->ajuste_imss_obrero = $_POST['AjustesObr'];
    $a->rcv_obrero = $_POST['RcvObr'];
    $a->real_rcv_obrero = $_POST['RealPRcv'];
    $a->ajuste_rcv_obrero = $_POST['AjustesRcvObr'];
    $a->amortizacion = $_POST['Amortizacion'];
    $a->real_amortizacion = $_POST['RealPAm'];
    $a->ajuste_amortizacion = $_POST['AjustesAm'];
    $a->total = $_POST['Total'];
    $a->empresa = $_POST['Empresa'];
    $a->comentarios = trim(($_POST['Comentarios']));
    $a->nuevo_actualizar();
}
//Actualizar formulario gastos médicos
else if(isset($_POST['actualizarGm'])){
    $a = New AjaxCostos();
    $a->id = $_POST['actualizarGm'];
    $a->gmma = $_POST['gmma'];
    $a->vida_invalidez = $_POST['invalidez'];
    $a->gmme = $_POST['gmme'];
    $a->otros = $_POST['otros'];
    $a->subtotal = $_POST['subtotal'];
    $a->total = $_POST['total'];
    $a->comentarios = trim($_POST['comentarios']);
    $a->actualizarGm();
}

//Actualizar formulario nóminas
else if(isset($_POST['actualizarNominas'])){
    $a = New AjaxCostos();
    $a->id = $_POST['actualizarNominas'];
    $a->impuesto_estatal = $_POST['impuesto'];
    $a->subtotal = $_POST['subtotal'];
    $a->total = $_POST['total'];
    $a->comentarios = trim($_POST['comentarios']);
    $a->actualizarNominas();
}

//Mostrar información de un registro
else if(isset($_POST['registro'])){
    $a = New AjaxCostos();
    $a->id = $_POST['registro'];
    $a->mostrar();
}

//Refrescar el área de los registros
/*else if(isset($_POST['refrescar'])){
    $a = New AjaxCostos();
    $a->refrescar();
}*/

else if(isset($_POST['cliente'])){
    $a = New AjaxCostos();
    $a->id = $_POST['nomina'];
    $a->cliente = $_POST['cliente'];
    $a->refrescar();
}



else if(isset($_POST['recargarListaClientes'])){
    $a = New AjaxCostos();
    $a->recargarListaClientes();
}

else if(isset($_POST['recargarListaPromotores'])){
    $a = New AjaxCostos();
    $a->recargarListaPromotores();
}

else if(isset($_POST['recargarListaSubcomisionistas'])){
    $a = New AjaxCostos();
    $a->recargarListaSubcomisionistas();
}

//Eliminar registro
else if(isset($_POST['eliminar'])){
    $a = New AjaxCostos();
    $a->id = $_POST['eliminar'];
    $a->eliminar();
}

else if(isset($_POST['cargarLayout'])){
    $a = New AjaxCostos();
    $a->archivo = $_FILES["cargarLayout"];
    $a->cargarLayout();
}

else if(isset($_POST['nombreCliente'])){
    $a = New AjaxCostos();
    $a->cliente = trim($_POST['nombreCliente']);
    $a->nombre_comercial = trim($_POST['nombreClienteComercial']);
    isset($_POST['actualizar']) ? $a->target = $_POST['actualizar'] : $a->target = NULL;
    $a->nuevoCliente();
}

else if(isset($_POST['nombrePromotor'])){
    $a = New AjaxCostos();
    $a->promotor = trim($_POST['nombrePromotor']);
    isset($_POST['actualizar']) ? $a->target = $_POST['actualizar'] : $a->target = NULL;
    $a->nuevoPromotor();
}

else if(isset($_POST['subcomisionistaNombre'])){
    $a = New AjaxCostos();
    $a->subcomisionista = trim($_POST['subcomisionistaNombre']);
    isset($_POST['actualizar']) ? $a->target = $_POST['actualizar'] : $a->target = NULL;
    $a->nuevoSubcomisionista();
}


else if(isset($_POST['paginaActual'])){
    $a = New AjaxCostos();
    $a->paginaActual=$_POST['paginaActual'];
    $a->registrosPorPagina=$_POST['registrosPorPagina'];
    $a->target=$_POST['target'];
    /*$a->cliente=$_POST['cliente'];
    $a->nomina=$_POST['nomina'];
    $a->facturado=$_POST['facturado'];
    $a->liberado=$_POST['liberado'];
    $a->observaciones=$_POST['pago'];
    $a->url = $_POST['url'];
    $a->nominista = $_POST['nominista'];
    $a->autorizacion = $_POST['autorizacion'];*/
    $a->paginador();
}

else if(isset($_POST['informativo'])){

    $a = New AjaxCostos();
    $a->comentarios = $_POST['valor'];
    if($_POST['informativo'] == 'Ejercicio')
        $a->target = 'ejercicio';
    else if($_POST['informativo'] == 'Mes')
        $a->target = 'mes';
    else if($_POST['informativo'] == 'Clientes')
        $a->target = 'cliente';
    else if($_POST['informativo'] == 'CodigoCliente')
        $a->target = 'codigo_cliente';
    else if($_POST['informativo'] == 'NombreComercial')
        $a->target = 'nombre_comercial';
    else if($_POST['informativo'] == 'Empresa')
        $a->target = 'empresa';
    else if($_POST['informativo'] == 'NombrePromotor')
        $a->target = 'promotor';
    else if($_POST['informativo'] == 'Subcomisionista')
        $a->target = 'subcomisionista';
    else if($_POST['informativo'] == 'Empleados')
        $a->target = 'empleados';
    else if($_POST['informativo'] == 'Imss')
        $a->target = 'imss';
    else if($_POST['informativo'] == 'RealPagadoImss')
        $a->target = 'real_imss';
    else if($_POST['informativo'] == 'AjusteImss')
        $a->target = 'ajuste_imss';
    else if($_POST['informativo'] == 'Rcv')
        $a->target = 'rcv';
    else if($_POST['informativo'] == 'RealPagadoRcv')
        $a->target = 'real_rcv';
    else if($_POST['informativo'] == 'AjustesRcv')
        $a->target = 'ajuste_rcv';
    else if($_POST['informativo'] == 'Infonavit')
        $a->target = 'infonavit';
    else if($_POST['informativo'] == 'RealPagadoInf')
        $a->target = 'real_infonavit';
    else if($_POST['informativo'] == 'AjusteInf')
        $a->target = 'ajuste_infonavit';
    else if($_POST['informativo'] == 'Gmma')
        $a->target = 'gmma';
    else if($_POST['informativo'] == 'VidaEI')
        $a->target = 'vida_invalidez';
    else if($_POST['informativo'] == 'Gmme')
        $a->target = 'gmme';
    else if($_POST['informativo'] == 'Otros')
        $a->target = 'otros';
    else if($_POST['informativo'] == 'ImpuestoEstatal')
        $a->target = 'impuesto_estatal';
    else if($_POST['informativo'] == 'SubtotalPatronal')
        $a->target = 'subtotal';
    else if($_POST['informativo'] == 'ImssObr')
        $a->target = 'imss_obrero';
    else if($_POST['informativo'] == 'RealPO')
        $a->target = 'real_imss_obrero';
    else if($_POST['informativo'] == 'AjustesObr')
        $a->target = 'ajuste_imss_obrero';
    else if($_POST['informativo'] == 'RcvObr')
        $a->target = 'rcv_obrero';
    else if($_POST['informativo'] == 'RealPRcv')
        $a->target = 'real_rcv_obrero';
    else if($_POST['informativo'] == 'AjustesRcvObr')
        $a->target = 'ajuste_rcv_obrero';
    else if($_POST['informativo'] == 'Amortizacion')
        $a->target = 'amortizacion';
    else if($_POST['informativo'] == 'RealPAm')
        $a->target = 'real_amortizacion';
    else if($_POST['informativo'] == 'AjustesAm')
        $a->target = 'ajuste_amortizacion';
    else if($_POST['informativo'] == 'Total')
        $a->target = 'total';
    $a->actualizarInformativo();
}

else if(isset($_POST['actualizarEstado'])){
    $a = New AjaxCostos();
    $a->id = $_POST['id'];
    $a->nomina = $_POST['tipoMovimiento'];//tipo: true o false
    $a->target = $_POST['campo'];
    $a->actualizarEstado();
}
