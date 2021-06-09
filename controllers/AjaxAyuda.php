<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once "../models/AyudaModel.php";
require_once "../models/config.php";
require_once "Ayuda.php";


class AjaxAyuda{

    public $comentarios = NULL;
    public $categoria;
    public $respuestas = array();

    public function primeraSeccion(){
        echo json_encode(Ayuda::primeraSeccion($this->categoria,$this->comentarios));
    }

    public function otraSeccion(){
        echo json_encode(Ayuda::otraSeccion($this->respuestas,$this->comentarios));
    }

}


if(isset($_POST['categoria'])){
    $a = New AjaxAyuda();
    $a->categoria = $_POST['categoria'];
    if(!empty($_POST['comentariosAyuda']))
        $a->comentarios = $_POST['comentariosAyuda'];
    if(isset($_POST['apartado1']) || $a->categoria == 1 || $a->categoria == 3)
         $a->primeraSeccion();
    else{
        for($i=0;$i<20;$i++)
             $a->respuestas[$i] = $_POST["radio".($i+1)];
       $a->otraSeccion();
    }    
}