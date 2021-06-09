<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once "../models/NotificacionesModel.php";
require_once "../models/config.php";
require_once "Notificaciones.php";

class AjaxNotificaciones{

	public function mostrarNotificaciones(){
		$tipo = intval(Notificaciones::mostrarNotificaciones());
		$ventana = NotificacionesConfig::tipo($tipo);
		echo json_encode(array('html'=>$ventana,'status'=>$tipo)) ;
	}

	public function aceptarNotificaciones(){
		$respuesta = Notificaciones::aceptarNotificaciones();
		echo json_encode(array('tipo'=>$respuesta)) ;
	}

}

if(isset($_POST["verificarNotificaciones"])){
	$a = new AjaxNotificaciones();
	$a->mostrarNotificaciones();
}

else if(isset($_POST["aceptarNotificaciones"])){
	$a = new AjaxNotificaciones();
	$a->aceptarNotificaciones();
}


