<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once "GestorImagenes.php";
require_once "../models/GestorImagenesModel.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------

class AjaxGestorImagenes{

	public $imagenTemporal;
	public $extensionImagen;
	public $idMostrarDatos;
	public $enviarId;
	public $enviarTitulo;
	public $enviarDescripcion;
	public $idSlide;
	public $rutaSlide;
	public $actualizarOrdenSlide;
	public $actualizarOrdenItem;


	#SUBE LA IMAGEN AL SERVIDOR OK
	#----------------------------------------------------------
	public function agregarImagen(){

			$aleatorio = mt_rand(100,9999);
			$aleatorio2 = mt_rand(100,9999);
			
			$extraerExtension = explode("/",$this->extensionImagen);//image/jpg o image/png
			$extension = $extraerExtension[1];
			if($extension == "jpeg")
				$extension = "jpg";
			$ruta = "../views/imagenes-usuarios/slide/slide".$aleatorio.$aleatorio.'.'.$extension; //subir tambien png //esta ruta es la que cambio con .slice(n) en slide.js

			if($extension == "jpg")
				$origen = imagecreatefromjpeg($this->imagenTemporal);
			else if($extension == "png")
				$origen = imagecreatefrompng($this->imagenTemporal);


			$x = imagesx($origen);  
			$y = imagesy($origen);  

			$normal = imagecreatetruecolor(1920,1080);  /////
			imagecopyresized($normal, $origen, 0, 0, 0, 0, 1920, 1080, $x, $y);  ////////


			if($extension == "jpg")
				imagejpeg($normal, $ruta);
			else if($extension == "png")
				imagepng($normal, $ruta);

			GestorImagenes::agregarImagen($ruta);
	}


	#SELECCIONO DATOS PARA MOSTRARLOS EN LA VENTANA MODAL ok
	#----------------------------------------------------------
	public function mostrarDatos(){
		GestorImagenes::mostrarDatos($this->idMostrarDatos);
	}

	

	#ACTUALIZAR ITEM SLIDE ok
	#----------------------------------------------------------
	
	public function actualizarSlide(){
		$datos = array("enviarId" => $this->enviarId, 
			           "enviarTitulo" => $this->enviarTitulo,
			           "enviarDescripcion" => $this->enviarDescripcion);
		GestorImagenes::actualizarSlide($datos);
	}

	

	#ELIMINAR ITEM SLIDE ok
	#----------------------------------------------------------
	public function eliminarSlideAjax(){
		$datos = array("idSlide" => $this->idSlide, 
			           "rutaSlide" => $this->rutaSlide);
		GestorImagenes::eliminarSlide($datos);
	}


	#ACTUALIZAR ORDEN ok
	#---------------------------------------------
	public function actualizarOrden(){
		$datos = array("ordenSlide" => $this->actualizarOrdenSlide,
						"ordenItem" => $this->actualizarOrdenItem);
		GestorImagenes::actualizarOrden($datos);
	}


	#ACTUALIZAR SLIDE AL INSERTAR IMAGEN
	#---------------------------------------------
	public function actualizarArrastrarImagen(){
		if($_SESSION['identificador2'] == 10)
			$flag=false;
		else
			$flag=true;
		$imagenes = GestorImagenes::mostrarCarrusel($flag);
		$texto = GestorImagenes::mostrarTextoCarrusel($flag);
		echo json_encode(array('carrusel'=>$imagenes,'texto'=>$texto));
	}

}

#OBJETOS
#-----------------------------------------------------------
#INSERTAR UNA NUEVA IMAGEN
#----------------------------------------------------------
if(isset($_FILES["imagenSlide"]["name"])){
	$a = new AjaxGestorImagenes();
	$a->imagenTemporal = $_FILES["imagenSlide"]["tmp_name"];
	$a->extensionImagen = $_FILES["imagenSlide"]["type"];
	$a->agregarImagen();
}

#MUESTRO LOS DATOS EN LA VENTANA MODAL
#----------------------------------------------------------
else if(isset($_POST["idMostrarDatosEditar"])){
	$b = new AjaxGestorImagenes();
	$b->idMostrarDatos = $_POST["idMostrarDatosEditar"];
	$b->mostrarDatos();
}

#ACTUALIZAR DATOS DEL ITEM
#----------------------------------------------------------
else if(isset($_POST["idSlideActualizar"])){
	$c= new AjaxGestorImagenes();
	$c->enviarId = $_POST["idSlideActualizar"];
	$c->enviarTitulo = $_POST["tituloActualizar"];
	$c->enviarDescripcion = nl2br($_POST["descripcionActualizar"]);
	$c->actualizarSlide();	
}


#ELIMINAR 
#----------------------------------------------------------
if(isset($_POST["idSlide"])){

	$d=new AjaxGestorImagenes();
	$d->idSlide = $_POST["idSlide"];
	$d->rutaSlide = $_POST["rutaSlide"];
	$d->eliminarSlideAjax();	

}


#ACTUALIZAR ORDEN DEL ITEM
#----------------------------------------------------------
if(isset($_POST["actualizarOrdenSlide"])){

	$e=new AjaxGestorImagenes();
	$e->actualizarOrdenSlide = $_POST["actualizarOrdenSlide"];
	$e->actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$e->actualizarOrden();
}


#ACTUALIZAR EL SLIDE AL INSERTAR O ELIMINAR UNA IMAGEN, Y TAMBIEN AL ORDENAR
#----------------------------------------------------------
if(isset($_POST["actualizarArrastrarImagen"])){
	$f=new AjaxGestorImagenes();
	$f->actualizarArrastrarImagen();	
}
