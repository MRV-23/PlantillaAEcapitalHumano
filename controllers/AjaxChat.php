<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Chat.php';
require_once '../models/ChatModel.php';
require_once '../models/config.php';


class AjaxChat{
    Public $conectados;
    public $buscar;
    public $estado;
    public $usuario;
    public $mensaje;
    public $edicion = 0;
    public $grupo = array();
    public $nombreGrupo;
    
    /***********************conectados intranet */

    public function cargarConectados(){
        $tamano = count($this->conectados);
        $sql='0';
        $arrayRelacion=array();
        for($i=0;$i<$tamano;$i++){
            $sql .= ','.$this->conectados[$i]['id'];
            $arrayRelacion[$this->conectados[$i]['id']] = substr($this->conectados[$i]['ip'],7);
        }
        $respuesta =Chat::cargarConectados($sql,$arrayRelacion);
        echo json_encode(array('error'=>false,'data'=>$respuesta));
    }
   
    /***********************Chat */
    public function cambiarEstado(){
        echo json_encode(array('error'=>!Chat::cambiarEstado($this->estado)));
    }

    public function usuarios(){
        $usuarios = new Chat();
        echo json_encode(array('data'=>$usuarios->usuarios($this->buscar,$this->edicion,$this->grupo)));
    }

    public function leerChat(){
        Chat::leerChat($this->usuario);
       // echo json_encode(array('error'=>false,'mensajes'=>$respuesta));
    }

    public function nuevoMensaje(){
        Chat::nuevoMensaje($this->usuario,$this->mensaje);
    }

    public function mensajesVistos(){
        $respuesta = Chat::mensajesVistos($this->usuario);
        echo json_encode(array('error'=>!$respuesta));
    }

    public function crearGrupo(){
        echo json_encode(Chat::crearGrupo($this->nombreGrupo,$this->grupo));
    }



}

//cargamos a los usuarios conectados (Desde el módulo sistemas)
 if(isset($_POST['conectados'])){
    $a = New AjaxChat();
    $a->conectados = json_decode($_POST['conectados'],true);
    $a->cargarConectados();
}

else if(isset($_POST['cadenaBuscar'])){
    $a = new AjaxChat();
    $a->buscar = $_POST['cadenaBuscar'];
    $a->edicion = $_POST['edicion'];
    $a->grupo = json_decode($_POST['grupo']);
    $a->usuarios();
}

else if(isset($_POST['cambiarEstado'])){
    $a = new AjaxChat();
    $a->estado = $_POST['cambiarEstado'];
    $a->cambiarEstado();
}

else if(isset($_POST['leerChat'])){
    $a = new AjaxChat();
    $a->usuario= $_POST['usuario'];
    $a->leerChat();
}

else if(isset($_POST['nuevoMensaje'])){
    $a = new AjaxChat();
    $a->usuario = $_POST['destinatario'];
    $a->mensaje = $_POST['nuevoMensaje'];
    $a->nuevoMensaje();
}

else if(isset($_POST['mensajesVistos'])){
    $a = new AjaxChat();
    $a->usuario= $_POST['remitente'];
    $a->mensajesVistos();
}

//Metodo para la creación de grupos
else if(isset($_POST['crearGrupo'])){
    $a = new AjaxChat();
    $a->nombreGrupo= $_POST['crearGrupo'];
    $a->grupo = json_decode($_POST['grupo']);
    $a->crearGrupo();
}


