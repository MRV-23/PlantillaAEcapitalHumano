<?php

session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Asistencias.php';
//require_once 'MetodoMartin.php';
require_once '../models/AsistenciasModel.php';
require_once '../models/config.php';
require_once "MetodosDiversos.php";

class AjaxAsistencias{

    public $datos = array(),$status = null;

    public function nuevoRegistro(){
        return Asistencias::nuevoRegistro($this->datos);
    }

    public function actualizarRegistros(){
        return Asistencias::mostrarRegistros($this->datos['fecha']);
    } 

    public function obtenerNav(){
        return ',NAVEGADOR: '.$_SERVER['HTTP_USER_AGENT'];
    }
}
if(isset($_POST['registrar'])){

   // $test = $_POST['statusllegada'];
    //$test = $status;
   // echo json_encode('holaaaaaaaaaaaaaa');
    $a = new AjaxAsistencias();
    $a->datos['status'] = $_POST['statusllegada'];
    $a->datos['token'] = $_POST['registrar'];
    //$a->nuevoRegistro($test);
    echo json_encode($a->nuevoRegistro());

}else if(isset($_POST['actualizarRegistros'])){

    $a = new AjaxAsistencias();
    $a->datos['fecha'] = $_POST['actualizarRegistros'];
    echo json_encode($a->actualizarRegistros());

}else if(isset($_POST['obtenerNav'])){

    $a = new AjaxAsistencias();
    echo json_encode($a->obtenerNav());

}



