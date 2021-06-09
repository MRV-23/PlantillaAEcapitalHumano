<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Software.php';
require_once '../models/SoftwareModel.php';
require_once '../models/config.php';
require_once 'MetodosDiversos.php';


class AjaxSoftware{
   
    public $nombre;
    public $descripcion;
    public $software=array();
    public $caratula= array();
   

    public function nuevo(){
        $data = array(  'nombre'=>$this->nombre,
                        'descripcion'=>$this->descripcion,
                        'software'=>$this->software,
                        'caratula'=>$this->caratula 
        );
        echo json_encode(Software::nuevo($data));
    }

}

//Nuevo registro o actualización 
if(isset($_POST['nombre'])){
    $a = new AjaxSoftware();
    $a->nombre = trim($_POST['nombre']);
    $a->descripcion = trim($_POST['descripcion']);
    $a->software = $_FILES["archivo"];
    if(!empty($_FILES["archivo2"]["name"]))
        $a->caratula = $_FILES["archivo2"];

        
    $a->nuevo();
}
