<?php
session_start();
if(!$_SESSION["validar"]){
  header("location:ingreso");
  exit();
}
include_once 'ConfiguracionesController.php';
include_once '../models/ConfiguracionesModel.php';

class ConfiguracionesAjax{
    public $option;
    public $valor;
    public function actualizarConfiguracion(){
			$respuesta = ConfiguracionesController::actualizarConfiguracionController($this->option,$this->valor);
    }
}

if(isset($_POST["configurarOpcion"])){
    $a = new ConfiguracionesAjax();
    $a->option = $_POST["configurarOpcion"];
    $a->valor = $_POST["configurarValor"];
    $a->actualizarConfiguracion();
}

