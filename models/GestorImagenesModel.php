<?php
require_once "conexion.php";

class GestorImagenesModel{

	#INSERTA LA IMAGEN CUANDO LA ARRASTRAMOS AL CUADRO DE CARGAR OK
	#----------------------------------------------------------
	public static function agregarImagen($ruta,$tabla){ 

		$stmt = Conexion::conectar()->prepare("SELECT MAX(orden) FROM $tabla");
		$stmt -> execute();
		$siguiente = ($stmt -> fetch()[0]) + 1;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta,orden) VALUES(:ruta,:orden)");
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
		$stmt -> bindParam(":orden", $siguiente, PDO::PARAM_INT);
		$stmt -> execute();
			
		$stmt = Conexion::conectar()->prepare("SELECT id,ruta,orden FROM $tabla WHERE ruta = :ruta");
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt->fetch();
		$stmt -> close();

	}
	
	
	#SELECCIONA TODOS LOS REGISTROS DE LA BASE DE DATOS
	#----------------------------------------------------------
	public static function mostrarImagenesModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	#SELECCIONO DATOS PARA MOSTRARLOS EN LA VENTANA MODAL
	#----------------------------------------------------------
	public static function mostrarDatos($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT ruta,titulo,descripcion FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt ->close();
	}


	#ACTUALIZAR ITEM SLIDE
	#----------------------------------------------------------
	public static function actualizarSlide($datos,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion WHERE id=:id");
		$stmt -> bindParam(":titulo", $datos["enviarTitulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["enviarDescripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);
		$stmt->execute();
			return;
		$stmt ->close();
	}


	#ELIMINAR ITEM SLIDE
	#----------------------------------------------------------
	public static function eliminarSlide($datos,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
		$stmt -> bindParam(":id", $datos['idSlide'], PDO::PARAM_INT);
		$stmt -> execute();
		if($stmt -> execute())
			unlink( $datos['rutaSlide']);
		return;
		$stmt ->close();
		
	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public static function actualizarOrden($datos,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id=:id");
		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenSlide"], PDO::PARAM_INT);
		$stmt -> execute();
		return;
		$stmt ->close();
	}
	



}






