<?php

session_start();
if(!$_SESSION["validar"]){
  header("location:ingreso");
  exit();
}

include_once 'Reportes.php';
include_once '../models/usuarios.php';
include_once '../models/config.php';

class AjaxReportes{
    public $sucursal;
    public $nombreCampo;
  
    public function usuarios(){
        $respuesta = Reportes::usuarios($this->sucursal);
        echo json_encode($respuesta);
    }

    public function usuarios2(){
        $respuesta = Reportes::usuarios2($this->sucursal);
        echo json_encode($respuesta);
    }
}


if(isset($_POST["listaUsuarios"])){
    $c=new AjaxReportes();
    $c->sucursal = $_POST["listaUsuarios"];
    $c->usuarios();
}

else if(isset($_POST["listaUsuarios2"])){
    $c=new AjaxReportes();
    $c->sucursal = $_POST["listaUsuarios2"];
    $c->usuarios2();
  }