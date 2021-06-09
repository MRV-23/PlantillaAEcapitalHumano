<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once "../models/CursosModel.php";
require_once "../models/config.php";
require_once "Cursos.php";


class AjaxCursos{
    public $id_curso;

    public function inscribirse(){
        $respuesta = Cursos::inscribirse($this->id_curso);
        echo json_encode(array('error'=>$respuesta));
    }

}

if(isset($_POST['nombreCurso'])){
    $a = New AjaxCursos();
    $a->id_curso = $_POST['nombreCurso'];
    $a->inscribirse();

}