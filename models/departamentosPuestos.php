<?php

require_once "conexion.php";

class Departamentos {

	#AGREGAR UN NUEVO DEPARTAMENTO 
	#----------------OK---------------------
	public function NuevoDepartamentoModel($dato, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");		
		$stmt->bindParam(":nombre", $dato, PDO::PARAM_STR);
		if($stmt->execute())
			return 0;
		else
			return 1;//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}
	
	#AGREGAR UN NUEVO PUESTO 
	#------------------OK-------------------
	public static function NuevoPuestoModel($dato, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");		
		$stmt->bindParam(":nombre", $dato, PDO::PARAM_STR);
		if($stmt->execute())
			return 0;
		else
			return 1;//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}

	#MOSTRAR TODOS LOS DEPARTAMENTOS CAMPOS SELECT 
	#------------------OK-------------------
	public static function departamentosTodosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_departamento,nombre FROM $tabla ORDER BY nombre");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#MOSTRAR TODOS LOS DEPARTAMENTOS QUE LA SUCURSAL NO TENGA VINCULADOS CAMPOS SELECT 
	#------------------OK-------------------
	public static function departamentosNoVinculadosModel($tabla,$tabla2,$sucursal){
		$stmt = Conexion::conectar()->prepare("SELECT id_departamento,nombre FROM $tabla WHERE id_departamento NOT IN(SELECT id_departamento FROM $tabla2 WHERE id_sucursal = :sucursal) ORDER BY nombre");	
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#MOSTRAR TODOS LOS PUESTOS CAMPOS SELECT 
	#------------------OK-------------------
	public static function puestosTodosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_puesto,nombre FROM $tabla ORDER BY nombre");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#MOSTRAR TODOS LOS PUESTOS NO VINCULADOS CAMPOS SELECT 
	#------------------OK-------------------
	public static function puestosNoVinculadosModel($tabla,$tabla2,$tabla3,$sucursal,$departamento){
		$stmt = Conexion::conectar()->prepare("SELECT id_puesto,nombre FROM $tabla WHERE id_puesto NOT IN( SELECT puesto FROM $tabla3 WHERE id_dpto_suc_puesto = (SELECT id_sucursal_departamento FROM $tabla2 WHERE id_sucursal = :sucursal AND id_departamento = :departamento)) ORDER BY nombre");	
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#AGREGAR LA RELACIÓN ENTRE SUCURSAL Y DEPARTAMENTO 
	#------------------OK-------------------
	public static function vinculacionSucursalDepartamentoModel($sucursal,$departamento,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_sucursal,id_departamento) VALUES (:sucursal,:departamento)");		
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		if($stmt->execute())
			return 0;
		else
			return 1;//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}

	#AGREGAR LA RELACIÓN ENTRE SUCURSAL, DEPARTAMENTO y PUESTO 
	#------------------OK-------------------
	public static function vinculacionSucursalDepartamentoPuestoModel($idRelacion,$puesto,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_dpto_suc_puesto,puesto) VALUES (:id,:puesto)");		
		$stmt->bindParam(":id", $idRelacion, PDO::PARAM_INT);
		$stmt->bindParam(":puesto", $puesto, PDO::PARAM_INT);
		if($stmt->execute())
			return 0;
		else
			return 1;//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}

	
	public static function obtenerIdSucursalDepartamentoModel($sucursal,$departamento,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal_departamento FROM $tabla WHERE id_sucursal = :sucursal AND id_departamento = :departamento");	
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}
	#--------------------------------------------

	
    #MOSTRAR EL NOMBRE DE UN DEPARTEMENTO EN BASE A SU ID
	#-------------------------------------
	public static function vistaDepartamentos2Model($dato,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_departamento = :departamento");	
        $stmt->bindParam(":departamento", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	#MOSTRAR TODOS LOS DEPARTEMENTOS PERTENECIENTES A UNA SUCURSAL DETERMINADA
	#------------------OK-------------------
	public static function vistaDepartamentosModel($dato,$tabla1,$tabla2){	
		//$respuesta = Departamentos::vistaDepartamentosModel($dato,"departamentos_ae","sucursales_departamentos"); 
		$stmt = Conexion::conectar()->prepare("SELECT nombre,id_departamento FROM $tabla1 WHERE id_departamento IN(SELECT id_departamento FROM $tabla2 WHERE id_sucursal = :sucursal) ORDER BY nombre ASC");	
        $stmt->bindParam(":sucursal", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }

	 #MOSTRAR EL NOMBRE DE UN PUESTO EN BASE A SU ID
	#-------------------------------------
	public static function vistaPuestos2Model($dato,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_puesto = :puesto");	
        $stmt->bindParam(":puesto", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	#MOSTRAR TODOS LOS PUESTOS DE UN DEPARTAMENTO PERTENECIENTE A UNA SUCURSAL DETERMINADA
	#------------------OK-------------------
	public static function vistaPuestosModel($sucursal,$departamento,$tabla1,$tabla2,$tabla3){ 
	   	$stmt = Conexion::conectar()->prepare("SELECT id_puesto,nombre FROM $tabla1 WHERE id_puesto IN (SELECT puesto FROM $tabla3 WHERE id_dpto_suc_puesto = (SELECT id_sucursal_departamento FROM $tabla2 WHERE id_sucursal = :sucursal AND id_departamento = :departamento))");	
	   	$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#ELIMINAR VINCULACIÓN SUCURSAL-DEPARTAMENTO
	#--------------OK----------------------
	public static function desvinculacionSucursalDepartamentoModel($sucursal, $departamento, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :sucursal AND id_departamento = :departamento");
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

	#ELIMINAR VINCULACIÓN SUCURSAL-DEPARTAMENTO
	#--------------OK----------------------
	public static function desvinculacionSucursalDepartamentoPuestoModel($sucursal, $departamento, $puesto, $tabla, $tabla2){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla2 WHERE id_dpto_suc_puesto = (SELECT id_sucursal_departamento FROM $tabla WHERE id_sucursal = :sucursal AND id_departamento = :departamento) AND puesto = :puesto");
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		$stmt->bindParam(":puesto", $puesto, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

	public function departamentoEliminarModel($idDepartamento, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_departamento = :departamento");
		$stmt->bindParam(":departamento", $idDepartamento, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

	public function puestoEliminarModel($idPuesto, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_puesto = :puesto");
		$stmt->bindParam(":puesto", $idPuesto, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

	#OBTENER EL TOTAL DE REGISTROS
	#------------------------------------------------------------
	static public function totalModel($tabla){
        $statement = Conexion::conectar()->prepare('SELECT COUNT(*) FROM '. $tabla);
        $statement->execute();
        return $statement->fetch()[0];
	}

}

