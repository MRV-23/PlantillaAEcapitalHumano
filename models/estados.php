<?php

require_once "conexion.php";

class Estados {

	#VISTA SUCURSALES CAMPOS SELECT
	#-------------------------------------
	public function vistaEstadosSelectModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_estado,nombre FROM $tabla ORDER BY id_estado");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	 #MOSTRAR ESTADO EN BASE A SU ID
	#-------------------------------------
	public static function vistaEstadosModel($dato,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_estado = :estado");	
        $stmt->bindParam(":estado", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	#MOSTRAR ESTADO EN BASE A SU NOMBRE (SE UTILIZA AL INSERTAR UNA SUCURSAL NUEVA)
	#-------------------------------------
	public static function vistaEstados2Model($dato,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id_estado FROM $tabla WHERE nombre = :estado");	
        $stmt->bindParam(":estado", $dato, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}
}

