<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once "../models/EventosModel.php";
require_once "../models/config.php";
require_once "Eventos.php";
require_once "MetodosDiversos.php";
//require_once '../views/PHPExcel/Classes/PHPExcel.php';

class AjaxEventos{

	public $candidato1;
	public $candidato2;
	public $candidato3;
	public $candidato4;
	public $candidato5;
	public $sucursal;

	public function actualizarCandidatos(){
		$data = array(
			'candidato1'=>$this->candidato1,
			'candidato2'=>$this->candidato2,
			'candidato3'=>$this->candidato3,
			'candidato4'=>$this->candidato4,
			'candidato5'=>$this->candidato5
		);
		echo json_encode(Eventos::actualizarCandidatos($data));
	}

	public function listaCandidatos(){
		$data = array(
			'candidato'=>$this->candidato1,
			'sucursal'=>$this->sucursal
		);
		echo json_encode(array('html'=>Eventos::listaCandidatos($data)));
	}
}

class Nutrifitness{
	public $id;
	public $uno;
	public $dos;
	public $tres;
	public $cuatro;
	public $cinco;
	public $seis;
	public $seisA;
	public $siete;
	public $sieteA;
	public $ocho;
	public $nueve='';
	public $diez;
	public $once;
	public $doce;
	public $trece;
	public $treceA;
	public $terminos='';

	public $id_registro;
	public $leche1;
	public $cereal1;
	public $leguminosa1;
	public $carne1;
	public $fruta1;
	public $verdura1;
	public $grasa1;
	public $leche2;
	public $cereal2;
	public $leguminosa2;
	public $carne2;
	public $fruta2;
	public $verdura2;
	public $grasa2;
	public $leche3;
	public $cereal3;
	public $leguminosa3;
	public $carne3;
	public $fruta3;
	public $verdura3;
	public $grasa3;
	public $colasiones;

	public $colesterol;
	public $glucosa;
	public $hdl;
	public $ldl;
	public $trigliceridos;

	public $peso;
	public $estatura;
	public $musculo;
	public $imc;
	public $grasaPorcentaje;
	public $grasaKilos;
	public $grasaBiceral;
	public $comentarios;
	public $cintura;

	public $documentoNombre;
	public $documentoTipo;
	public $documentoTemporal;
	public $documentoTamano;

	public $documentoNombre2;
	public $documentoTipo2;
	public $documentoTemporal2;
	public $documentoTamano2;

	public $fcInicial;
	public $fcFinal;
	public $flexibilidad;
	public $fuerza;

	public $lunest;
	public $lunesi;
	public $lunes;
	
	public $valor;


	public $sentadillas;



	public function validarFormulario(){
		$data = array(
			'uno'=>$this->uno,
			'dos'=>$this->dos,
			'tres'=>$this->tres,
			'cuatro'=>$this->cuatro,
			'cinco'=>$this->cinco,
			'seis'=>$this->seis,
			'seisA'=>$this->seisA,
			'siete'=>$this->siete,
			'sieteA'=>$this->sieteA,
			'ocho'=>$this->ocho,
			'nueve'=>$this->nueve,
			'diez'=>$this->diez,
			'once'=>$this->once,
			'doce'=>$this->doce,
			'trece'=>$this->trece,
			'treceA'=>$this->treceA,
			'terminos'=>$this->terminos
		);
		$respuesta = Eventos::validarFormulario($data);
		echo $respuesta;
	}

	public function datosUsuario(){
		$respuesta = Eventos::datosUsuario($this->id);
		echo $respuesta;
	}

	public function actualizarFormularioPlanAlimenticio(){ 
		$data = array(
			'leche1'=>$this->leche1,
			'cereales1'=>$this->cereal1,
			'leguminosas1'=>$this->leguminosa1,
			'carnes1'=>$this->carne1,
			'frutas1'=>$this->fruta1,
			'verduras1'=>$this->verdura1,
			'grasas1'=>$this->grasa1,
			'leche2'=>$this->leche2,
			'cereales2'=>$this->cereal2,
			'leguminosas2'=>$this->leguminosa2,
			'carnes2'=>$this->carne2,
			'frutas2'=>$this->fruta2,
			'verduras2'=>$this->verdura2,
			'grasas2'=>$this->grasa2,
			'leche3'=>$this->leche3,
			'cereales3'=>$this->cereal3,
			'leguminosas3'=>$this->leguminosa3,
			'carnes3'=>$this->carne3,
			'frutas3'=>$this->fruta3,
			'verduras3'=>$this->verdura3,
			'grasas3'=>$this->grasa3,
			'id'=>$this->id,
			'id_registro'=>$this->id_registro,
			'colasiones'=>$this->colasiones
		);

		$respuesta =  Eventos::actualizarFormularioPlanAlimenticio($data);
		echo json_encode($respuesta);
	}

	public function actualizarFormularioLaboratorio(){
		$data = array(
			'colesterol'=>$this->colesterol,
			'glucosa'=>$this->glucosa,
			'hdl'=>$this->hdl,
			'ldl'=>$this->ldl,
			'grasas3'=>$this->grasa3,
			'trigliceridos'=>$this->trigliceridos,
			'comentarios'=>$this->comentarios,
			'id'=>$this->id,
			'id_registro'=>$this->id_registro
		);

		$respuesta =  Eventos::actualizarFormularioLaboratorio($data);
		echo json_encode($respuesta);
	}

	public function actualizarFormularioComposicion(){
		$data = array(
			'peso'=>$this->peso,
			'estatura'=>$this->estatura,
			'musculo'=>$this->musculo,
			'imc'=>$this->imc,
			'grasaPorcentaje'=>$this->grasaPorcentaje,
			'grasaKilos'=>$this->grasaKilos,
			'grasaBiceral'=>$this->grasaBiceral,
			'comentarios'=>$this->comentarios,
			'cintura'=>$this->cintura,
			'id'=>$this->id,
			'id_registro'=>$this->id_registro
		);


		$respuesta =  Eventos::actualizarFormularioComposicion($data);
		echo json_encode($respuesta);
	}

	public function actualizarDescripcionUsuario(){
		$respuesta =  Eventos::actualizarDescripcionUsuario($this->comentarios);
		echo json_encode($respuesta);
	}

	public function mostrarEquipo(){
		$respuesta = Eventos::mostrarEquipo($this->valor);
		echo json_encode(array('html'=>$respuesta));
	}

	

	public function cargarDocumento(){
		$data = array(
			'nombre'=>$this->documentoNombre,
			'tipo'=>$this->documentoTipo,
			'temporal'=>$this->documentoTemporal,
			'tamano'=>$this->documentoTamano,
			'nombre2'=>$this->documentoNombre2,
			'tipo2'=>$this->documentoTipo2,
			'temporal2'=>$this->documentoTemporal2,
			'tamano2'=>$this->documentoTamano2,
			'titulo' =>$this->uno,
			'descripcion' => $this->dos
		);
		$respuesta =  Eventos::cargarDocumento($data);
		echo json_encode($respuesta);
	} 

	public function actualizarFormularioEvaluacionFisica(){
		$data = array(
			'fc_inicial'=>$this->fcInicial,
			'fc_final'=>$this->fcFinal,
			'flexibilidad'=>$this->flexibilidad,
			'fuerza'=>$this->fuerza,
			'sentadillas'=>$this->sentadillas,
			'comentarios'=>$this->comentarios,
			'id'=>$this->id,
			'id_registro'=>$this->id_registro
		);
		$respuesta =  Eventos::actualizarFormularioEvaluacionFisica($data);
		echo json_encode($respuesta);
	}

	public function cargarTalleres(){
		$respuesta = Eventos::talleres();
		echo json_encode(array('html'=>$respuesta));

	}

	public function actualizarFormularioPlanFisico(){
		$data = array(
			'lunest'=>$this->lunest,
			'lunesi'=>$this->lunesi,
			'lunes'=>$this->lunes, 
			'id'=>$this->id,
			'id_registro'=>$this->id_registro
		);
		$respuesta =  Eventos::actualizarFormularioPlanFisico($data);
		echo json_encode($respuesta);
	}

	public function actualizarVistos(){
		//si no eres nutiologa o activador no llamar el metodo
		if($_SESSION['identificador'] == 357 || $_SESSION['identificador'] == 358)
			$respuesta = Eventos::actualizarVistos($this->valor,$this->id);
		else	
			$respuesta=array('Response: '=> 'viewer');
		echo json_encode($respuesta);
	}

	
	public function nuevoRegistro(){
		$respuesta = Eventos::nuevoRegistro($this->id,$this->valor);
		echo json_encode($respuesta);
	}

	public function getRegistro(){
		Eventos::getRegistro($this->id,$this->valor);
	}

	public function getRegistro2(){
		Eventos::getRegistro2($this->id,$this->valor);
	}

	public function getRegistro3(){
		Eventos::getRegistro3($this->id,$this->valor);
	}

	public function getRegistro4(){
		Eventos::getRegistro4($this->id,$this->valor);
	}

	public function getRegistro5(){
		Eventos::getRegistro5($this->id,$this->valor);
	}

	
}




if(isset($_POST["reto1"])){ //llenar el formulario de registro
	$a = new Nutrifitness();
	$a->uno=$_POST["reto1"];
	$a->dos=$_POST["reto2"];
	$a->tres=$_POST["reto3"];
	$a->cuatro=trim(nl2br($_POST["reto4"]));
	$a->cinco=$_POST["reto5"];
	$a->seisA=$_POST["reto6"];
	if(isset($_POST["reto6a"]))
		$a->seis=trim(nl2br($_POST["reto6a"]));
	$a->sieteA=$_POST["reto7"];
	if(isset($_POST["reto7a"]))
		$a->siete=trim(nl2br($_POST["reto7a"]));
	$a->ocho=$_POST["reto8"];
	if(isset($_POST["reto9"]))
		$a->nueve=trim(nl2br($_POST["reto9"]));
	$a->diez=trim(nl2br($_POST["reto10"]));
	if(isset($_POST["terminos"]))
		$a->terminos=$_POST["terminos"];
	$a->once=trim(nl2br($_POST["reto11"]));
	$a->doce=trim(nl2br($_POST["reto12"]));
	$a->treceA=$_POST["reto13"];
	if(isset($_POST["reto13a"]))
		$a->trece=trim(nl2br($_POST["reto13a"]));
	$a->validarFormulario();
}

else if(isset($_POST['idUsuario'])){//validar si el usuario ya esta registrado
	$a = new Nutrifitness();
	$a->id = $_POST['idUsuario'];
	$a->datosUsuario();
}

else if(isset($_POST['1Leche'])){
	$a = new Nutrifitness();
	$a->id = $_POST['idUsuarioDetalles'];
	$a->id_registro = $_POST['idRegistro'];
	$a->leche1 =  $_POST['1Leche'];
	$a->cereal1 =  $_POST['1Cereales'];
	$a->leguminosa1 =  $_POST['1Leguminosas'];
	$a->carne1 =  $_POST['1Carne'];
	$a->fruta1 =  $_POST['1Frutas'];
	$a->verdura1 =  $_POST['1Verduras'];
	$a->grasa1 =  $_POST['1Grasas'];
	$a->leche2 =  $_POST['2Leche'];
	$a->cereal2 =  $_POST['2Cereales'];
	$a->leguminosa2 =  $_POST['2Leguminosas'];
	$a->carne2 =  $_POST['2Carne'];
	$a->fruta2 =  $_POST['2Frutas'];
	$a->verdura2 =  $_POST['2Verduras'];
	$a->grasa2 =  $_POST['2Grasas'];
	$a->leche3 =  $_POST['3Leche'];
	$a->cereal3 =  $_POST['3Cereales'];
	$a->leguminosa3 =  $_POST['3Leguminosas'];
	$a->carne3 =  $_POST['3Carne'];
	$a->fruta3 =  $_POST['3Frutas'];
	$a->verdura3 =  $_POST['3Verduras'];
	$a->grasa3 =  $_POST['3Grasas'];
	$a->colasiones = trim(nl2br($_POST['colasiones']));
	$a->actualizarFormularioPlanAlimenticio();
}

else if(isset($_POST['colesterol'])){
	$a = new Nutrifitness();
	$a->id = $_POST['idUsuarioDetalles'];
	$a->id_registro = $_POST['idRegistro'];
	$a->colesterol = $_POST['colesterol'];
	$a->glucosa = $_POST['glucosa'];
	$a->hdl = $_POST['hdl'];
	$a->ldl = $_POST['ldl'];
	$a->trigliceridos = $_POST['trigliceridos'];
	$a->comentarios = trim(nl2br($_POST['comentarios']));
	$a->actualizarFormularioLaboratorio();
}

else if(isset($_POST['peso'])){
	$a = new Nutrifitness();
	$a->id = $_POST['idUsuarioDetalles'];
	$a->id_registro = $_POST['idRegistro'];
	$a->peso = $_POST['peso'];
	$a->estatura = $_POST['estatura'];
	$a->musculo = $_POST['musculo'];
	$a->imc = $_POST['imc'];
	$a->grasaPorcentaje = $_POST['grasaPorcentaje'];
	$a->grasaKilos = $_POST['grasaKilos'];
	$a->grasaBiceral = $_POST['grasaBiceral'];
	$a->comentarios = trim(nl2br($_POST['comentarios']));
	$a->cintura = $_POST['cintura'];
	$a->actualizarFormularioComposicion();
}

else if(isset($_POST['descripcionUsuario'])){
	$a = new Nutrifitness();
	$a->comentarios = trim(nl2br($_POST['descripcionUsuario']));
	$a->actualizarDescripcionUsuario();
}

else if(isset($_FILES["documento"])){
	$a = new Nutrifitness();
	$a->uno = $_POST['titulo'];
	$a->dos = trim(nl2br($_POST['descripcion']));
	$a->documentoNombre = $_FILES["documento"]["name"];
	$a->documentoTipo = $_FILES["documento"]["type"];
	$a->documentoTemporal = $_FILES["documento"]["tmp_name"];
	$a->documentoTamano = $_FILES["documento"]["size"];
	if(isset($_FILES["portada"])){
		$a->documentoNombre2 = $_FILES["portada"]["name"];
		$a->documentoTipo2 = $_FILES["portada"]["type"];
		$a->documentoTemporal2 = $_FILES["portada"]["tmp_name"];
		$a->documentoTamano2 = $_FILES["portada"]["size"];
	}
	$a->cargarDocumento();
}

else if(isset($_POST['fc_inicial'])){
	$a = new Nutrifitness();
	$a->id = $_POST['idUsuarioDetalles'];
	$a->id_registro = $_POST['idRegistro'];
	$a->fcInicial = $_POST['fc_inicial'];
	$a->fcFinal = $_POST['fc_final'];
	$a->flexibilidad = $_POST['flexibilidad'];
	$a->fuerza = $_POST['fuerza'];
	$a->sentadillas = $_POST['sentadillas'];
	$a->comentarios = trim(nl2br($_POST['comentarios']));
	$a->actualizarFormularioEvaluacionFisica();
}

else if(isset($_POST['lunest'])){
	$a = new Nutrifitness();
	$a->id = $_POST['idUsuarioDetalles'];
	$a->id_registro = $_POST['idRegistro'];
	$a->lunest = $_POST['lunest'];
	$a->lunesi = $_POST['lunesi'];
	$a->lunes = $_POST['lunes'];
	$a->actualizarFormularioPlanFisico();
}

else if(isset($_POST['cargarTalleres'])){
	$a = new Nutrifitness();
	$a->cargarTalleres();
}

else if(isset($_POST['estadoRegistros'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['estadoRegistros'];
	$a->id = $_POST['todosOuno'];
	$a->actualizarVistos();
}

else if(isset($_POST['mostrarEquipo'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['mostrarEquipo'];
	$a->mostrarEquipo();
}

else if(isset($_POST['nuevoRegistro'])){
	$a = new Nutrifitness();
	$a->id = $_POST['nuevoRegistro'];
	$a->valor = $_POST['tabla'];
	$a->nuevoRegistro();
}

else if(isset($_POST['actualLaboratorio'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['actualLaboratorio'];
	if($_POST['identificadorUsuario'] != 0)
		$a->id = $_POST['identificadorUsuario'];
	else
		$a->id = $_SESSION['identificador'];
	$a->getRegistro();
}

else if(isset($_POST['actualComposicion'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['actualComposicion'];
	if($_POST['identificadorUsuario'] != 0)
		$a->id = $_POST['identificadorUsuario'];
	else
		$a->id = $_SESSION['identificador'];
	$a->getRegistro2();
}

else if(isset($_POST['actualAlimentacion'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['actualAlimentacion'];
	if($_POST['identificadorUsuario'] != 0)
		$a->id = $_POST['identificadorUsuario'];
	else
		$a->id = $_SESSION['identificador'];
	$a->getRegistro3();
}

else if(isset($_POST['actualFisica'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['actualFisica'];
	if($_POST['identificadorUsuario'] != 0)
		$a->id = $_POST['identificadorUsuario'];
	else
		$a->id = $_SESSION['identificador'];
	$a->getRegistro4();
}

else if(isset($_POST['actualPlan'])){
	$a = new Nutrifitness();
	$a->valor = $_POST['actualPlan'];
	if($_POST['identificadorUsuario'] != 0)
		$a->id = $_POST['identificadorUsuario'];
	else
		$a->id = $_SESSION['identificador'];
	$a->getRegistro5();
}

else if(isset($_POST['moduloValores'])){
	$a = new AjaxEventos();
	$a->candidato1 = $_POST['identificador1'] != $_SESSION['identificador'] ? intval($_POST['identificador1']) : 0;
	$a->candidato2 = $_POST['identificador2'] != $_SESSION['identificador'] ? intval($_POST['identificador2']) : 0;
	$a->candidato3 = $_POST['identificador3'] != $_SESSION['identificador'] ? intval($_POST['identificador3']) : 0;
	$a->candidato4 = $_POST['identificador4'] != $_SESSION['identificador'] ? intval($_POST['identificador4']) : 0;
	$a->candidato5 = $_POST['identificador5'] != $_SESSION['identificador'] ? intval($_POST['identificador5']) : 0;
	$a->actualizarCandidatos();
}

else if(isset($_POST['filtroValoresSucursal'])){
	$a = new AjaxEventos();
	$a->sucursal = $_POST['filtroValoresSucursal'];
	$a->candidato1 = $_POST['filtroValoresUsuario'];
	$a->listaCandidatos();
}
