<?php
session_start();
if(!$_SESSION["validar"]){
  header("location:ingreso");
  exit();
}

include_once 'RutasDescargas.php';
include_once '../models/RutasDescargasModel.php';
include_once '../models/config.php';

class AjaxRutasDescargas{
public $anio;
public $ruta;
public $periodo;
public $tipo;
public $formato;
#MUESTRA TODOS LOS PERIODOS PARA EL AÑO SELECCIONADO
    public function anioFiscal(){
        $respuesta = RutasDescargas::getPeriodos($this->anio);
        echo json_encode(array('data' => $respuesta));
       
    }

    public function completarRuta(){
        $respuesta = RutasDescargas::completarRuta($this->ruta,$this->periodo,$this->tipo,$this->formato,$_SESSION['identificador']);
    }

    public function completarRuta2(){
        $respuesta = RutasDescargas::completarRuta2($this->ruta,$this->periodo,$this->tipo,$this->formato,$_SESSION['identificador']);
    }

}

#MUESTRA TODOS LOS PERIODOS PARA EL AÑO SELECCIONADO
if(isset($_POST['anioFiscal'])){
    $a = new AjaxRutasDescargas();
    $a->anio = $_POST['anioFiscal'];
    $a->anioFiscal();
}

#MUSTRA EL REGISTRO PATRONAL Y EL DEPARTAMENTO AL QUE PERTENECE UN EMPLEADO
else if(isset($_POST['completarRuta'])){
    $b = new AjaxRutasDescargas();
    $b->ruta = $_POST['completarRuta'];
    $b->periodo = $_POST['periodo'];
    $b->tipo = $_POST['tipo'];
    $b->formato = $_POST['formato']; 
   
    if($b->ruta == '/media/recibos/2018/SEMANAL/RESPALDO 2018/' AND (intval($b->periodo) < 4 || ( intval($b->periodo) > 900  AND intval($b->periodo) < 904 ))  )
        $b->completarRuta();
    else if($b->ruta == '/media/recibos/2018/SEMANAL/RESPALDO 2018/' AND (intval($b->periodo) == 28 || intval($b->periodo) == 9028 ))
        $b->completarRuta();
    else if($b->ruta == '/media/recibos/2018/SEMANAL/RESPALDO 2018/' AND (intval($b->periodo) <=34 || ( intval($b->periodo) > 900  AND intval($b->periodo) < 9035 )) )
        $b->completarRuta2();
    else
        $b->completarRuta();
}