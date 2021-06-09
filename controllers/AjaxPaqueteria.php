<?php
session_start();
if(!$_SESSION["validar"]){
  header("location:ingreso");
  exit();
}

include_once 'Paqueteria.php';
include_once '../models/Paqueteria.php';
include_once '../models/config.php';
include_once '../models/estados.php';
include_once '../models/usuarios.php';
include_once '../models/sucursales.php';
include_once '../models/departamentosPuestos.php';
include_once 'MetodosDiversos.php';
require_once "ajaxPaginacion.php";

class AjaxPaqueteria{

    public $destinatario;
    public $tipoEnvio;
    public $seguroEnvio;
    public $descripcion;
    public $comentarios;

    public $compania;
    public $email;
    public $telefono;
    public $codigoPostal;
    public $estado;
    public $municipio;
    public $colonia;
    public $direccion;
    public $noExterior;
    public $noInterior;

    public $nombrePaqueteria='';
    public $guia;

    public $id_paquete;
    public $estadoRecibido;
    public $completoRecibido;
    public $comentarioRecibido;

    public $fecha;
    public $situacion;
    public $paginaActual;
    public $registrosPorPagina;
    public $target;

    
    #REGISTRAMOS PAQUETE INTERNO
    public function formularioInterno(){
       
        $data = array(
                "remitente" =>$_SESSION['identificador'],
                "destinatario"=>$this->destinatario,
                "envio"=>$this->tipoEnvio,
                "seguro"=>$this->seguroEnvio,
                "comentarios"=>$this->comentarios,
                "descripcion"=>$this->descripcion,
                "mensajero"=>$this->nombrePaqueteria
        );
        $respuesta = Paqueteria::validarFormularioInterno($data);
        echo json_encode($respuesta);
       
    }

    #REGISTRAMOS PAQUETE EXTERNO
    public function formularioExterno(){
        $data = array(
            "remitente" =>$_SESSION['identificador'],
            'compania' => $this->compania,
            'contacto' => $this->destinatario,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'codigo' => $this->codigoPostal,
            'estado' => $this->estado,
            'municipio' => $this->municipio,
            'colonia' => $this->colonia,
            'direccion' => $this->direccion,
            'exterior' => $this->noExterior,
            'interior' => $this->noInterior,
            'envio' => $this->tipoEnvio,
            'seguro' => $this->seguroEnvio,
            'comentarios' => $this->comentarios
        );

        $respuesta = Paqueteria::validarFormularioExterno($data);
        echo json_encode($respuesta);

        //echo json_encode(array('error'=>true,'mensaje'=>'Todo OK','mensaje2'=>'OK','tipo'=>'warning'));
    }

    #DETALLES PAQUETE INTERNO
    public function detallePaqueteInterno(){
            Paqueteria::detallePaqueteInterno($_SESSION['identificador'],$this->id_paquete);
    }

    #DETALLES PAQUETE EXTERNO
    public function detallePaqueteExterno(){
        Paqueteria::detallePaqueteExterno($this->id_paquete);
    }

    public function buscarPaquetesInternos(){

        $datos = array('fecha'=>$this->fecha,
                    'situacion'=>$this->situacion, 
                    'idUsuario'=>$_SESSION['identificador']
                ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $totalRegistros=0;
        if($_SESSION['identificador2'] == Configuraciones::recepcion())
            $totalRegistros = Paqueteria::totalPaquetesInternosPlus($datos);
        else
            $totalRegistros = Paqueteria::totalPaquetesInternos($datos);
        
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);
        
        $mostrar =  $paginacion->mostrar();
        $paquetesInternos = new Paqueteria();
        $data='';
        if($_SESSION['identificador2'] == Configuraciones::recepcion() || AccesoEspecialPaqueteria::pertenece($_SESSION['identificador']) )
            $data = $paquetesInternos->buscarPaquetesInternosPlus($datos,$paginacion->limitRegistros());
        else
            $data = $paquetesInternos->buscarPaquetesInternos($datos,$paginacion->limitRegistros());
  
        $respuesta = array("mostrar"=>$mostrar,"data"=>$data);
        echo json_encode($respuesta);
    }

    public function buscarPaquetesExternos(){

        $datos = array('fecha'=>$this->fecha,
                    'situacion'=>$this->situacion, 
                    'idUsuario'=>$_SESSION['identificador']
                ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $totalRegistros = Paqueteria::totalPaquetesExternos($datos);
        
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);
        
        $mostrar =  $paginacion->mostrar();
        $paquetesExternos = new Paqueteria();
        $data = $paquetesExternos->buscarPaquetesExternos($datos,$paginacion->limitRegistros());

        $respuesta = array("mostrar"=>$mostrar,"data"=>$data);
        echo json_encode($respuesta);
        //echo json_encode(array('data'=>'ok'));
    }

    public function actualizarPaqueteExterno(){
        $respuesta = Paqueteria::actualizarPaqueteExterno($this->id_paquete,$this->nombrePaqueteria,$this->guia);
        echo json_encode($respuesta);
    }

    public function actualizarPaqueteInterno(){
        $respuesta = Paqueteria::actualizarPaqueteInterno($this->id_paquete,$this->nombrePaqueteria,$this->guia);
        echo json_encode($respuesta);
    }

    public function finalizarPaqueteInterno(){
        Paqueteria::finalizarPaqueteInterno($this->id_paquete);
    }

    public function cancelarPaqueteInterno(){
        Paqueteria::cancelarPaqueteInterno($this->id_paquete);
    }

    public function finalizarPaqueteExterno(){
        Paqueteria::finalizarPaqueteExterno($this->id_paquete);
    }

    public function cancelarPaqueteExterno(){
        Paqueteria::cancelarPaqueteExterno($this->id_paquete);
    }

    #CUESTIONARIO RECEPCION PAQUETE INTERNO
    public function formularioPaqueteInterno(){
        $respuesta = Paqueteria::formularioPaqueteInterno($this->id_paquete,$this->estadoRecibido,$this->completoRecibido,$this->comentarioRecibido);
        echo json_encode($respuesta);
    }

    public  function enviadoPaqueteInterno(){
        Paqueteria::enviadoPaqueteInterno($this->id_paquete);
    }
    
    public  function enviadoPaqueteExterno(){
        Paqueteria::enviadoPaqueteExterno($this->id_paquete);
    }
    
    public  function getMensajerosInternos(){
        Paqueteria::getMensajerosInternos($this->target);
    }
    
    public  function getMensajerosInternos2(){
        Paqueteria::getMensajerosInternos2($this->target);
	}
    
}

#REGISTRAMOS PAQUETE INTERNO
if(isset($_POST['equipoUsuarioCargo'])){
    $a = new AjaxPaqueteria();
    $a->destinatario = $_POST['equipoUsuarioCargo'];
    $a->tipoEnvio = $_POST['tipoEnvio'];
    $a->seguroEnvio = $_POST['seguroEnvio'];
    $a->descripcion = trim(mb_strtoupper($_POST['descripcion'],'utf-8'));
    $a->comentarios = trim(mb_strtoupper($_POST['comentarios'],'utf-8'));
    if(isset($_POST['mensajeroInterno']))
        $a->nombrePaqueteria = $_POST['mensajeroInterno'];
    $a->formularioInterno();
}

#REGISTRAMOS PAQUETE EXTERNO
else if(isset($_POST['compania'])){
    $a = new AjaxPaqueteria();
    $a->compania = trim(mb_strtoupper($_POST['compania'],'utf-8'));
    $a->destinatario = trim(mb_strtoupper($_POST['destinatario'],'utf-8'));
    $a->email = trim($_POST['correo']);
    $a->telefono = $_POST['telefono'];
    $a->codigoPostal = $_POST['codigoPostalPaquete'];
    $a->estado = $_POST['estado'];
    $a->municipio = mb_strtoupper($_POST['municipio'],'utf-8');
    $a->colonia =  mb_strtoupper($_POST['coloniaPaqueteria'],'utf-8');
    $a->direccion = trim(mb_strtoupper($_POST['direccion'],'utf-8'));
    $a->noExterior = trim($_POST['numeroExterior']);
    $a->noInterior = trim($_POST['numeroInterior']);
    $a->tipoEnvio = $_POST['tipoEnvio'];
    $a->seguroEnvio = $_POST['tipoSeguro'];
    $a->comentarios =  trim(mb_strtoupper($_POST['comentarios'],'utf-8'));
    $a->formularioExterno();
}

#DETALLES PAQUETE INTERNO
else if(isset($_POST['noEnvioInterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['noEnvioInterno'];
    $a->detallePaqueteInterno();
}

#DETALLES PAQUETE EXTERNO
else if(isset($_POST['noEnvioExterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['noEnvioExterno'];
    $a->detallePaqueteExterno();
}

#MOSTRAR PAQUETES INTERNOS
else if(isset($_POST['situacionPaqueteInterno'])){
    $a = new AjaxPaqueteria();
    $a->fecha = $_POST['fechaPaqueteInterno'];
    $a->situacion = $_POST['situacionPaqueteInterno'];

    $a->paginaActual = $_POST["paginaActual"];
    $a->registrosPorPagina = $_POST["registrosPorPagina"];
    $a->target = $_POST["target"];
    $a->buscarPaquetesInternos();
    //echo json_encode(array('data'=>'ok'));
}

#MOSTRAR PAQUETES EXTERNOS
else if(isset($_POST['situacionPaqueteExterno'])){
    $a = new AjaxPaqueteria();
    $a->fecha = $_POST['fechaPaqueteExterno'];
    $a->situacion = $_POST['situacionPaqueteExterno'];
 
    $a->paginaActual = $_POST["paginaActual"];
    $a->registrosPorPagina = $_POST["registrosPorPagina"];
    $a->target = $_POST["target"];
    $a->buscarPaquetesExternos();
}

#REGISTRAR PAQUETERÍA Y GUÍA PAQUETE EXTERNO
else if(isset($_POST['nombrePaqueteriaEnvio'])){
    $a = new AjaxPaqueteria();
    $a->nombrePaqueteria = $_POST['nombrePaqueteriaEnvio'];
    $a->guia = $_POST['numeroGuiaEnvio'];
    $a->id_paquete = $_POST['numeroPaqueteEnvio'];
    $a->actualizarPaqueteExterno();
}

#REGISTRAR PAQUETERÍA Y GUÍA PAQUETE INTERNO
else if(isset($_POST['nombrePaqueteriaEnvioInterno'])){
    $a = new AjaxPaqueteria();
    $a->nombrePaqueteria = $_POST['nombrePaqueteriaEnvioInterno'];
    $a->guia = $_POST['numeroGuiaEnvioInterno'];
    $a->id_paquete = $_POST['numeroPaqueteEnvioInterno'];
    $a->actualizarPaqueteInterno();
}

#PAQUETE INTERNO RECIBIDO
else if(isset($_POST['finalizacionPaqueteInterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['finalizacionPaqueteInterno'];
    $a->finalizarPaqueteInterno();
}

#PAQUETE INTERNO CANCELAR
else if(isset($_POST['cancelarPaqueteInterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['cancelarPaqueteInterno'];
    $a->cancelarPaqueteInterno();
}

#PAQUETE EXTERNO RECIBIDO
else if(isset($_POST['finalizacionPaqueteExterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['finalizacionPaqueteExterno'];
    $a->finalizarPaqueteExterno();
}

#PAQUETE EXTERNO CANCELAR
else if(isset($_POST['cancelarPaqueteExterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['cancelarPaqueteExterno'];
    $a->cancelarPaqueteExterno();
}

#CUESTIONARIO RECEPCION PAQUETE INTERNO
else if(isset($_POST['recibidoCompletoInterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['paqueterecibidoInterno'];
    $a->estadoRecibido = $_POST['recibidoEstadoInterno'];
    $a->completoRecibido = $_POST['recibidoCompletoInterno'];
    $a->comentarioRecibido = $_POST['recibidoComentariosInterno'];
    $a->formularioPaqueteInterno();
}

#PAQUETE INTERNO EN RUTA
else if(isset($_POST['enCaminoPaqueteInterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['enCaminoPaqueteInterno'];
    $a->enviadoPaqueteInterno();
}

#PAQUETE EXTERNO EN RUTA
else if(isset($_POST['enCaminoPaqueteExterno'])){
    $a = new AjaxPaqueteria();
    $a->id_paquete = $_POST['enCaminoPaqueteExterno'];
    $a->enviadoPaqueteExterno();
}

#OBTENER MENSAJEROS LOCALES
else if(isset($_POST['getMensajerosInternos'])){
    $a = new AjaxPaqueteria();
    $a->target = $_POST['getMensajerosInternos'];
    $a->getMensajerosInternos();
}

else if(isset($_POST['getMensajerosInternos2'])){
    $a = new AjaxPaqueteria();
    $a->target = $_POST['getMensajerosInternos2'];
    $a->getMensajerosInternos2();
}



                                                    