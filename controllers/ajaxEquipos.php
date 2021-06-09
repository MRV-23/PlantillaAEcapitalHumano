<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include_once 'equipos.php';
include_once '../models/sucursales.php';
include_once '../models/usuarios.php';
include_once 'usuarios.php';
include_once '../models/EquiposModel.php';
require_once "ajaxPaginacion.php";
include_once '../models/departamentosPuestos.php';


class Equipos{
    //public $marca;
    public $sucursal;

    public $tipo;
    public $marca;
    public $modelo;
    public $serie;
    public $ram;
    public $hd;
    public $hdTipo;
    public $userOS;
    public $userPass;
    public $mouse;
    public $monitor;
    public $mochila;
    public $ups;
    public $user;

    public $paginaActual;
	public $registrosPorPagina;
    public $target;
    
    public $idEquipo;
    public $situacion;

    public $usuarioVpn;
    public $servidorVpn;
    public $passVpn;

    public $usuarioLogmein;
    public $passLogmein;

    public $servidorIp = array();
    public $servidorAlias=array();
    public $servidorUsuario=array();
    public $servidorPass=array();

    public $borrables=array();

    public $servidorId = array();
    public $servidorIpActualizar = array();
    public $servidorAliasActualizar = array();
    public $servidorUsuarioActualizar = array();
    public $servidorPassActualizar = array();

    public $imagen = array();

    public function marcaControllers(){
        $respuesta = EquiposComputo::marcaController();
        echo $respuesta;
    }

    public function modeloControllers(){
        $respuesta = EquiposComputo::modeloController();
        echo $respuesta;
    }

    public function usuarios(){
        $respuesta = EquiposComputo::usuariosController2($this->sucursal);
        echo $respuesta;
    }

    public function formulario($equipo){
        $datos=array(   'tipo'=>$this->tipo,
                        'marca'=>trim($this->marca),
                        'modelo'=>trim($this->modelo),
                        'serie'=>trim($this->serie),
                        'ram'=>trim($this->ram),
                        'hd'=>trim($this->hd),
                        'hdTipo'=>$this->hdTipo,
                        'userOS'=>trim($this->userOS),
                        'userPass'=>trim($this->userPass),
                        'mouse'=>$this->mouse,
                        'monitor'=>$this->monitor,
                        'mochila'=>$this->mochila,
                        'ups'=>$this->ups,
                        'user'=>$this->user,
                        'usuarioVpn'=>$this->usuarioVpn,
                        'passVpn'=>$this->passVpn,
                        'servidorVpn'=>$this->servidorVpn,
                        'usuarioLogmein'=>$this->usuarioLogmein,
                        'passLogmein'=>$this->passLogmein,
                        'servidorIp'=>$this->servidorIp,
                        'servidorAlias'=>$this->servidorAlias,
                        'servidorUsuario'=>$this->servidorUsuario,
                        'servidorPass'=>$this->servidorPass,
                        'borrables'=>$this->borrables,
                        'servidorId'=>$this->servidorId,
                        'servidorIpActualizar'=>$this->servidorIpActualizar,
                        'servidorAliasActualizar'=>$this->servidorAliasActualizar,
                        'servidorUsuarioActualizar'=>$this->servidorUsuarioActualizar,
                        'servidorPassActualizar'=>$this->servidorPassActualizar,
                        'imagen'=>$this->imagen
                    );
        echo json_encode(EquiposComputo::formularioController($datos,$equipo));
    }

    public function buscador(){
        $data = array( 'nombreBuscar'=>$this->user,
                       'sucursal'=>$this->sucursal,
                       'situacion'=>$this->situacion
        ); 

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        
        $totalRegistros = EquiposComputo::contarEquiposPaginadorController($data,'');
        $paginacion->totalPaginas($totalRegistros);

        $paginacion->paginaActual($this->paginaActual);
        $mostrar = $paginacion->mostrar();

        //obtenemos los rgistros que conincidan con la busqueda
        $buscar = new EquiposComputo();
        $datos = $buscar->buscarEquiposController($data,$paginacion->limitRegistros());

        $respuesta = array("mostrar"=>$mostrar,"data"=>$datos);
        //$respuesta = array("data"=>$datos);
        echo json_encode($respuesta);
    }

    public function detalleEquipo(){
        $respuesta = EquiposComputo::detalleEquipoController($this->idEquipo);
    }

    public function eliminarEquipo(){
        $respuesta = EquiposComputo::eliminarEquipoController($this->idEquipo);
        echo json_encode($respuesta);
    }
}

/*Recibir datos del formulario equipo*/
/************************************/
if(isset($_POST["tipoEquipo"])){
    $d = new Equipos();
    $d->tipo=$_POST["tipoEquipo"];
    $d->marca=$_POST["marcaEquipo"];
    $d->modelo=$_POST["modeloEquipo"];
    $d->serie=$_POST["serieEquipo"];
    $d->ram=$_POST["memoriaEquipo"];
    $d->hd=$_POST["discoEquipo"];
    $d->hdTipo=$_POST["capacidadHd"];
    $d->userOS=$_POST["usuarioSistemaOperativo"];
    $d->userPass=$_POST["passSistemaOperativo"];
    $d->mouse=isset($_POST["mouseEquipo"]) ? 1 : 0;
    $d->monitor=isset($_POST["monitorEquipo"]) ? 1 : 0;
    $d->mochila=isset($_POST["mochilaEquipo"]) ? 1 : 0;
    $d->ups=isset($_POST["equipoUps"]) ? 1 : 0;
    $d->user=$_POST["equipoUsuarioCargo"];

    $d->usuarioVpn=$_POST["usuarioVpn"];
    $d->passVpn=$_POST["passVpn"];
    $d->servidorVpn=$_POST["servidorVpn"];
    $d->usuarioLogmein=$_POST["usuarioLogmein"];
    $d->passLogmein=$_POST["passLogmein"];

    if(isset($_POST['servidorIp'])){
        $d->servidorIp=$_POST["servidorIp"];
        $d->servidorAlias=$_POST["servidorAlias"];
        $d->servidorUsuario=$_POST["servidorUsuario"];
        $d->servidorPass=$_POST["servidorPass"];
    }

    if(isset($_POST['servidorId'])){
        $d->servidorId=$_POST["servidorId"];
        $d->servidorIpActualizar=$_POST["servidorIpActualizar"];
        $d->servidorAliasActualizar=$_POST["servidorAliasActualizar"];
        $d->servidorUsuarioActualizar=$_POST["servidorUsuarioActualizar"];
        $d->servidorPassActualizar=$_POST["servidorPassActualizar"];
    }

    if(isset($_POST['borrables']))
        $d->borrables=json_decode($_POST['borrables']);

    if(isset($_FILES["imagen"]))
        $d->imagen = $_FILES["imagen"];
    
    if(empty($_POST['idEquipoComputoActualizar']))
        $d-> formulario(0);//registro nuevo
    else
        $d-> formulario($_POST['idEquipoComputoActualizar']);//registro actualizar
    
    
}

/*Cargar marca de equipos*/
/************************************/
else if(isset($_POST["marcaEquipo"])){
    $a = new Equipos();
    $a-> marcaControllers();
}

/*Cargar modelo de equipos*/
/************************************/
else if(isset($_POST["modeloEquipo"])){
    $b = new Equipos();
    $b-> modeloControllers();
}

/*Cargar usuarios dependiendo de la sucrsal seleccionada*/
/************************************/
else if(isset($_POST["asignarEquipoAUsuario"])){
    $c = new Equipos();
    $c->sucursal = $_POST["asignarEquipoAUsuario"];
    $c-> usuarios();
}

/*Buscar en correos usuarios*/
/************************************/
else if(isset($_POST["buscadorUsuariosEquipos"])){
	$f = new Equipos();
	$f->user = $_POST["buscadorUsuariosEquipos"];
    $f->sucursal = $_POST["buscadorSucursalEquipos"];
    $f->situacion = $_POST["buscadorSituacionEquipos"];
	$f->paginaActual = $_POST["paginaActual"];
	$f->registrosPorPagina = $_POST["registrosPorPagina"];
	$f->target = $_POST["target"];
    $f->buscador();	
}

/*Mostrar datos equipo cómputo*/
/************************************/
else if(isset($_POST["idDatosEquipoComputo"])){
    $d = new Equipos();
    $d->idEquipo = $_POST["idDatosEquipoComputo"];
    $d->detalleEquipo();
}

/*Eliminar equipo de cómputo */
else if(isset($_POST["idSucursalEliminar"])){
    $e = new Equipos();
    $e->idEquipo = $_POST["idSucursalEliminar"];
    $e->eliminarEquipo();
}





