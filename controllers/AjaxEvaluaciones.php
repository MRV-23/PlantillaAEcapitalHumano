<?php

session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Evaluaciones.php';
require_once '../models/EvaluacionesModel.php';
require_once '../models/config.php';
require_once "ajaxPaginacion.php";
require_once "MetodosDiversos.php";

class AjaxEvaluaciones{
  
    Public $numero;
    Public $maxEncuesta = 14;
    Public $calificacion = NULL;
    Public $comentario = NULL;

    Public $horasEncuesta=1;
    Public $minutosEncuesta=10;


    Public $paginaActual;
    Public $registrosPorPagina;
    Public $target;
    Public $cliente;//nombre
    Public $liberado;//situacion

    Public $usuario;

    public function cargarEncuesta(){
        $respuesta = Evaluaciones::cargarEncuesta();
        echo json_encode(array('error'=>false,'html'=>$respuesta));
    }

    public function iniciarEncuesta(){
        $respuesta = Evaluaciones::iniciarEncuesta();
        echo json_encode(array('error'=>false,'formulario'=>$respuesta,'total'=>$this->maxEncuesta));
    }

    public function finalizarEncuesta(){
        $respuesta = Evaluaciones::finalizarEncuesta();
        echo json_encode(array('error'=>!$respuesta));
    }

    public function verificarTotalPreguntas(){
        $respuesta = Evaluaciones::verificarTotalPreguntas();
        if(!empty($respuesta))
            echo json_encode(array('error'=>false,'total'=>true,'titulo'=>'Aún faltan preguntas por responder','subtitulo'=>'No: '.$respuesta));
        else
            echo json_encode(array('error'=>false,'total'=>false,'titulo'=>'<i class="fa fa-smile-o fa-4x" aria-hidden="true"></i>','subtitulo'=>'¡ Gracias por participar !'));
    }
 
    public function registrarHoraEncuesta(){
        $respuesta = Evaluaciones::registrarHoraEncuesta();
        if($respuesta === NULL)
            echo json_encode(array('error'=>true,'respuesta'=>'Error SQL'));
        else{ //2019-08-28 10:30:00     08/28/2019
            $respuesta = explode ( " ", $respuesta);
            $fecha = substr($respuesta[0],5,2).'/'.substr($respuesta[0],8,2) .'/'. substr($respuesta[0],0,4);
            $hora = ( intval(substr($respuesta[1],0,2)) + $this->horasEncuesta).':'.( intval(substr($respuesta[1],3,2)) + $this->minutosEncuesta);
            echo json_encode(array('error'=>false,'fecha'=>$fecha,'hora'=>$hora));
        }
    }

    public function recargarEncuesta(){
        $max=$min=false;
        if($this->numero >= $this->maxEncuesta){
            $this->numero = $this->maxEncuesta;
            $max=true;
        }
        else if ($this->numero <= 1){
            $this->numero = 1;
            $min=true;
        }      
        $respuesta = Evaluaciones::iniciarEncuesta($this->numero);
        echo json_encode(array('error'=>false,'formulario'=>$respuesta,'posicion'=>$this->numero,'max'=>$max,'min'=>$min,'total'=>$this->maxEncuesta));
    }

    public function guardarRespuesta(){
        $respuesta = Evaluaciones::guardarRespuesta($this->numero,$this->calificacion,$this->comentario);
        echo json_encode(array('error'=>!$respuesta,'extra'=>$this->numero.' -- '.$this->calificacion.' -- '.$this->comentario));
    }

    public function paginador(){
        $data = array( 'nombre'=>$this->cliente,'situacion'=>$this->liberado); 
        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $paginacion->paginaActual($this->paginaActual);
        $paginacion->parametroCliente($this->cliente);
        $paginacion->parametroLiberado($this->liberado);
        $respuesta=Evaluaciones::usuarios($data,$paginacion->limitRegistros());
        
        $paginacion->totalPaginas($respuesta['total']);
        $mostrar =  $paginacion->mostrar();

        echo json_encode(array("error"=>false,"paginador"=>$mostrar,"html"=>$respuesta['data'],'total'=>$respuesta['total']));
     }

     public function resultadosEncuesta(){
        $respuesta = Evaluaciones::resultadosEncuesta($this->usuario);
        echo json_encode(array('error'=>false,'html'=>$respuesta));
    }
}

if(isset($_POST['cargarEncuesta'])){
    $a = New AjaxEvaluaciones();
    $a->cargarEncuesta();
}

else if(isset($_POST['iniciarEncuesta'])){
    $a = New AjaxEvaluaciones();
    $a->iniciarEncuesta();
}

else if(isset($_POST['contador'])){
    $a = New AjaxEvaluaciones();
    $a->numero = intval($_POST['contador']);
    $a->recargarEncuesta();
}

else if(isset($_POST['guardarRespuesta'])){
    $a = New AjaxEvaluaciones();
    $a->numero = intval($_POST['guardarRespuesta']);
    if(!empty($_POST['calificacion']))
        $a->calificacion=intval($_POST['calificacion']);
    if(!empty($_POST['comentario']))
        $a->comentario=trim(nl2br($_POST['comentario']));
    $a->guardarRespuesta();
}

else if(isset($_POST['iniciarHora'])){
    $a = New AjaxEvaluaciones();
    $a->registrarHoraEncuesta();
}

else if(isset($_POST['finalizarEncuesta'])){
    $a = New AjaxEvaluaciones();
    $a->finalizarEncuesta();
}

else if(isset($_POST['verificarTotalPreguntas'])){
    $a = New AjaxEvaluaciones();
    $a->verificarTotalPreguntas();
}

else if(isset($_POST['paginaActual'])){
    $a = New AjaxEvaluaciones();
    $a->paginaActual=$_POST['paginaActual'];
    $a->registrosPorPagina=$_POST['registrosPorPagina'];
    $a->target=$_POST['target'];
    $a->cliente=$_POST['cliente'];
    $a->liberado=$_POST['liberado'];
    $a->paginador();
}

else if(isset($_POST['resultadosEncuesta'])){
    $a = New AjaxEvaluaciones();
    $a->usuario = $_POST['resultadosEncuesta'];
    $a->resultadosEncuesta();
}



