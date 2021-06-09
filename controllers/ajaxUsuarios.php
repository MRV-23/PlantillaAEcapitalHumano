<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include_once 'usuarios.php';
include_once '../models/usuarios.php';
include_once '../models/sucursales.php';
include_once '../models/estados.php';
require_once "ajaxPaginacion.php";
require_once "../models/config.php";
require_once "../models/departamentosPuestos.php";
require_once "../models/estados.php";
require_once "estados.php";
require_once "sucursales.php";
include_once 'Eventos.php';
include_once '../models/EventosModel.php';

class ajaxUsuarios{

	#REGISTRO DE USUARIOS---usuario Nuevo
	#------------------------------------
	public function registroUsuarioController($valor){

		if(isset($_POST["genero"])){
				$usuario= !empty($_POST["nickUsuarioAgregar"]) ? trim($_POST["nickUsuarioAgregar"]) : '';
				$correo= !empty($_POST["correo"]) ? $_POST["correo"] : '';
				$pass= !empty($_POST["contrasena"]) ? $_POST["contrasena"] : '';
				$acceso= !empty($_POST["tipoUsuario"]) ? $_POST["tipoUsuario"] : '';
				$usuarioFormulario = array("nombre"=>trim(mb_strtoupper($_POST["nombre"],'utf-8')), 
										  "paterno"=>trim(mb_strtoupper($_POST["paterno"],'utf-8')),
										  "materno"=>trim(mb_strtoupper($_POST["materno"],'utf-8')),
										  "sucursal"=>$_POST["sucursal"],
										  "departamento"=>$_POST["departamentoUsuario"],
										  "puesto"=>$_POST["puestoUsuario"],
										  "fechaIngreso"=>$_POST["fechaIngreso"],
										  "curp"=>mb_strtoupper($_POST["curp"],'utf-8'),
										  "rfc"=>mb_strtoupper($_POST["rfc"],'utf-8'),
										  "seguroSocial"=>$_POST["seguroSocial"],
										  "lugarNacimiento"=>$_POST["lugarNacimiento"],
										  "municipios"=>mb_strtoupper($_POST["municipios"],'utf-8'),
										  "fechaNacimiento"=>$_POST["fechaNacimiento"],
										  "estadoCivil"=>$_POST["estadoCivil"],
										  "escolaridad"=>$_POST["escolaridad"],
										  "domicilio"=>trim(mb_strtoupper($_POST["domicilio"],'utf-8')),
										  "codigoPostal"=>$_POST["codigoPostal"],
										  "municipio"=>mb_strtoupper($_POST["municipio"],'utf-8'),
										  "colonia"=>mb_strtoupper($_POST["colonia"],'utf-8'),
										  "infonavit"=>$_POST["infonavit"],
										  "fonacot"=>$_POST["fonacot"],
										  "usuarioMovil"=>$_POST["usuarioMovil"],
										  "usuarioFijo"=>$_POST["usuarioFijo"],
										  "usuario"=>$usuario,
										  "correo"=>$correo,
										  "contrasena"=>$pass,
										  "tipoUsuario"=>$acceso, 
										  "contacto"=>trim(mb_strtoupper($_POST["contacto"],'utf-8')),
										  "parentesco"=>trim(mb_strtoupper($_POST["parentesco"],'utf-8')),
										  "contactoMovil"=>$_POST["contactoMovil"],
										  "contactoFijo"=>$_POST["contactoFijo"],
										  "nombreImagen"=>$_FILES["imagenNuevoUsuario"]["name"], 
										  "tipoImagen"=>$_FILES["imagenNuevoUsuario"]["type"],
										  "temporalImagen"=>$_FILES["imagenNuevoUsuario"]["tmp_name"],
										  "tamano"=>$_FILES["imagenNuevoUsuario"]["size"],
										  "genero"=>$_POST["genero"],
										  "hijos"=>$_POST["hijos"],
										  "sangre"=>$_POST["sangre"],
										  "jefe"=>$_POST["jefeInmediato"],
										  "alergias"=>trim(mb_strtoupper($_POST["alergias"],'utf-8')));

				$usuarioFormulario['lugarNacimiento'] = Estados::vistaEstados2Model($usuarioFormulario['lugarNacimiento'], "estados_ae"); //obtenemos el id del estado
				$respuesta = gestionUsuarios::registroUsuarioController($usuarioFormulario, $valor, intval($_SESSION["identificador2"]));//necesito el identificador para garantizar que no sea manipulado el HTML y únicamente asignen los privilegios de administrador el personal autorizado
				echo $respuesta;	
		}

		else
			echo 40; //no se ha selecionado el genero
	}


	#CAMBIAR CONTRASEÑA
	#------------------------------------
	public function cambiarPassController(){
			$usuarioFormulario = array( "passActual"=>$_POST["passActual"], 
										"passNueva"=>$_POST["passNueva"],
										"passConfirmacion"=>$_POST["passConfirmacion"]);
				$respuesta = gestionUsuarios::cambiarPassController($usuarioFormulario);
				echo $respuesta;
	}

	#CAMBIAR CONTRASEÑA (DESDE ADMINISTRADOR)
	#------------------------------------
	public function cambiarPass2Controller(){
			$usuarioFormulario = array( "identificador"=> $_POST["idRegistro2"], 
									"passNueva"=>$_POST["passNueva2"]);
			$respuesta = gestionUsuarios::cambiarPass2Controller($usuarioFormulario);
			echo $respuesta;
	}

	#BUSCAR USUARIO
	#------------------------------------
	public $usuarioBuscar;
	public $sucursalBuscar;
	public $situacionUsuario;
	public $paginaActual;
	public $registrosPorPagina;
	public $target;
	public $target2;

	public function buscarUsuarioController(){
			$data = array( 'nombreBuscar'=>$this->usuarioBuscar, //vacio al cargar la pagina
							'sucursal'=>$this->sucursalBuscar, 
							'situacion'=>$this->situacionUsuario //Activo = 1 ó baja = 0
			); 

			
			$paginacion = new Paginacion($this->registrosPorPagina);
			$paginacion->target($this->target);

			$totalRegistros = gestionUsuarios::contarUsuariosPaginadorController($data,'');
			$paginacion->totalPaginas($totalRegistros);
			
			$paginacion->paginaActual($this->paginaActual);
			$mostrar = $paginacion->mostrar();
			

			//obtenemos los rgistros que conincidan con la busqueda
			$buscar = new gestionUsuarios();
			$datos = $buscar->buscarUsuariosController($data,$paginacion->limitRegistros());

			//regresamos a javascript los rsultados
			$respuesta = array("mostrar"=>$mostrar,"data"=>$datos);
			echo json_encode($respuesta);
	}

	#BUSCAR CORREOS USUARIO
	#------------------------------------
	public function buscarCorreoUsuarioController(){
			$data = array( 'nombreBuscar'=>$this->usuarioBuscar,
							'sucursal'=>$this->sucursalBuscar
			); 

			$paginacion = new Paginacion($this->registrosPorPagina);
			$paginacion->target($this->target);

			if($this->target2 == 'nutricion'){ //interfaz nutriologo
				$totalRegistros = Eventos::totalPaginasNutrifitness($data,'');
				$paginacion->parametrosPaginadorNutricion($this->target2);
				$paginacion->totalPaginas($totalRegistros);
			}
			else{ ////agenda empresarial
				$totalRegistros = gestionUsuarios::contarCorreosPaginadorController($data,'');
				$paginacion->totalPaginas($totalRegistros);
			}
			
			$paginacion->paginaActual($this->paginaActual);
			$mostrar = $paginacion->mostrar();
	
			if($this->target2 == 'nutricion'){//interfaz nutriologo
				$buscar = new Eventos();
				$datos = $buscar->buscarUsuariosNutrifitness($data,$paginacion->limitRegistros());
			}
			else{//agenda empresarial
				$buscar = new gestionUsuarios();
				$datos = $buscar->buscarCorreosUsuariosController($data,$paginacion->limitRegistros());
			}

			//regresamos a javascript los rsultados
			$respuesta = array("mostrar"=>$mostrar,"data"=>$datos);
			echo json_encode($respuesta);
	}

	#ELIMINAR USUARIO
	#------------------------------------
	public $eliminarUsuario;
	public $motivo_salida;
	public $fecha_salida;
	public function eliminarUsuarioController(){
			//Eliminar fotografia del registro
			//$respuesta = gestionUsuarios::eliminarFotografiaUsuariosController($this->eliminarUsuario);//En lugar de eliminar, deshabilitamos el registro
			//@unlink("../views/imagenes-usuarios/".$respuesta);
			//Eliminar registro
			$respuesta = gestionUsuarios::eliminarUsuariosController($this->eliminarUsuario);
			echo $respuesta;
	}

	public function eliminarUsuario2Controller(){
		$respuesta = gestionUsuarios::eliminarUsuarios2Controller($this->eliminarUsuario,$this->motivo_salida,$this->fecha_salida);
		echo $respuesta;
	}

	#CAMBIAR IMAGEN DE PERFIL
	#------------------------------------
	public $identificador;
	public $nombre;
	public $tipo;
	public $tamano;
	public $nombreTemporal;

	public function imagenPerfilAjax(){
		$datos = array( "identificador"=> $this->identificador, 
						"nombre"=> $this->nombre, 
						"tipo"=> $this->tipo, 
						"tamano"=> $this->tamano, 
						"temporal"=>$this->nombreTemporal);
		$respuesta = gestionUsuarios::imagenPerfilController($datos);
		echo $respuesta;
	}

	#MUESTRO LOS DATOS DE EMPLEADO EN INTERFAZ CORREOS
	public function mostrarDatosEmpleadoAgenda(){
		gestionUsuarios::mostrarDatosEmpleadoAgenda($this->usuarioBuscar);
		//echo json_encode(array('datos'=>$this->usuarioBuscar));
	}
}

/*Nuevo registro*/
/************************************/
if(isset($_POST["nombre"])){
	$a = new ajaxUsuarios();
	if(empty($_POST["id_usuario"]))
		$a->registroUsuarioController(0);//nuevo
	else
		$a->registroUsuarioController($_POST["id_usuario"]);//actualizar
}

/*Cambiar contraseña*/
/************************************/
else if(isset($_POST["passActual"])){
	$b = new ajaxUsuarios();
	$b->cambiarPassController();	
}

/*Buscar en usuarios*/
/************************************/
else if(isset($_POST["busqueda"])){
	$c = new ajaxUsuarios();
	$c->usuarioBuscar = $_POST["busqueda"];
	$c->sucursalBuscar = $_POST["cargarSucursalActual"];
	$c->situacionUsuario = $_POST["cargarSituacionActual"];

	$c->paginaActual = $_POST["paginaActual"];
	$c->registrosPorPagina = $_POST["registrosPorPagina"];
	$c->target = $_POST["target"];

	$c->buscarUsuarioController();	
}

/*Buscar en correos usuarios*/
/************************************/
else if(isset($_POST["buscadorCorreos"])){
	$f = new ajaxUsuarios();
	$f->usuarioBuscar = $_POST["buscadorCorreos"];
	$f->sucursalBuscar = $_POST["cargarCorreosActual"];

	$f->paginaActual = $_POST["paginaActual"];
	$f->registrosPorPagina = $_POST["registrosPorPagina"];
	$f->target = $_POST["target"];
	$f->target2 = $_POST["apuntar"];

	$f->buscarCorreoUsuarioController();	
}

/*Eliminar usuarios*/
/************************************/
else if(isset($_POST["idRegistroEliminar"])){
	$d = new ajaxUsuarios();
	$d ->eliminarUsuario = $_POST["idRegistroEliminar"];
	$d ->eliminarUsuarioController();	
}

else if(isset($_POST["idRegistroEliminar2"])){
	$g = new ajaxUsuarios();
	$g ->eliminarUsuario = $_POST["idRegistroEliminar2"];
	$g->motivo_salida = $_POST["motivoSalida"];
	$g->fecha_salida = $_POST["fechaSalida"];
	$g ->eliminarUsuario2Controller();
}

/*Actualizar Pass (desde administrador)*/
/************************************/
else if(isset($_POST["passNueva2"])){
	$e = new ajaxUsuarios();
	$e ->cambiarPass2Controller();	
}


else if(isset($_POST["identificador"])){
	$h = new ajaxUsuarios();
 	$h->identificador = $_POST["identificador"];
	$h->nombre = $_FILES["imagenPerfilUsuario"]["name"];
	$h->tamano = $_FILES["imagenPerfilUsuario"]["size"];
 	$h->tipo = $_FILES["imagenPerfilUsuario"]["type"];
 	$h->nombreTemporal = $_FILES["imagenPerfilUsuario"]["tmp_name"];
	$h->imagenPerfilAjax();
}

else if(isset($_POST["detallesModalCorreos"])){ 
	$i = new ajaxUsuarios();
	$i->usuarioBuscar = $_POST["detallesModalCorreos"];
	$i->mostrarDatosEmpleadoAgenda();	
}


