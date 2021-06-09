<?php

require_once "conexion.php";

class Sucursales {

	#NUEVOS USUARIOS
	#-------------------------------------
	public static function nuevaSucursalModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_estado,nombre,calle,exterior,interior,codigo,colonia,municipio) VALUES (:id_estado,:nombre,:calle,:exterior,:interior,:codigo,:colonia,:municipio)");		
		
		$stmt->bindParam(":id_estado", $datosModel["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":calle", $datosModel["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":exterior", $datosModel["exterior"], PDO::PARAM_STR);
		$stmt->bindParam(":interior", $datosModel["interior"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":municipio", $datosModel["municipio"], PDO::PARAM_STR);
	
		if($stmt->execute())
			return 0;//"Registro exitoso";
		else
			return 1;//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}

	#ACTUALIZAR SUCURSAL
	#-------------------------------------
	public static function actualizarSucursalModel($datosModel, $id_sucursal, $tabla){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		id_estado = :estado, 
		nombre = :nombre, 
		calle = :calle, 
		exterior = :exterior, 
		interior = :interior, 
		codigo = :codigo, 
		colonia = :colonia, 
		municipio = :municipio
		WHERE id_sucursal = :id");

		$stmt->bindParam(":id", $id_sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":calle", $datosModel["calle"], PDO::PARAM_STR);
		$stmt->bindParam(":exterior", $datosModel["exterior"], PDO::PARAM_STR);
		$stmt->bindParam(":interior", $datosModel["interior"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":municipio", $datosModel["municipio"], PDO::PARAM_STR);

		if($stmt->execute())
			return 0;//"Actualización exitosoa";
		else
			return 1;//"No se realizó la actualización, intentelo nuevamente";
		$stmt->close();
	}

	#INGRESAR NUMEROS DE TELEFONO
	#------------------------------------------------------------------
	public static function nuevoTelefonoSucursalModel($datoModel, $datoModel2, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_sucursal,telefono) VALUES (:sucursal,:telefono)");		
		
		$stmt->bindParam(":sucursal", $datoModel, PDO::PARAM_INT);
		$stmt->bindParam(":telefono", $datoModel2, PDO::PARAM_STR);
	
		$stmt->execute();
		return 0;
		
		$stmt->close();
	}

	#VISTA SUCURSALES CAMPOS SELECT
	#-------------------------------------
	public function vistaSucursalesSelectModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal,nombre FROM $tabla ORDER BY nombre");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#VISTA SUCURSALES CAMPOS SELECT
	#-------------------------------------
	public function vistaSucursalesSelectModelRHespecial($sucursales,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal,nombre FROM $tabla WHERE id_sucursal IN ($sucursales) ORDER BY nombre");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#VISTA SUCURSALES CAMPOS SELECT
	#-------------------------------------
	public function vistaSucursalesSelectModelPaqueteria($tabla,$tabla2,$tabla3){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal,nombre FROM $tabla WHERE id_sucursal NOT IN (SELECT sucursal_secundaria FROM $tabla2 WHERE sucursal_primaria = (SELECT id_sucursal FROM $tabla3 WHERE id_usuario = :user)) ORDER BY nombre");	
		$stmt->bindParam(":user", $_SESSION['identificador'], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}


	#MOSTRAR SUCURSALES 
	#------------------------------------------------------------
	public static function mostrarSucursalesModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	#TRADUCIR SUCURSALES
	#------------------------------------------------------------
	public static function traducirSucursalesModel($dato,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_sucursal = :sucursal");	
		$stmt->bindParam(":sucursal", $dato, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

#BORRAR SUCURSAL
	#------------------------------------
	public static function eliminarSucursalModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

#MOSTRAR UNICA SUCURSAL EN BASE A SU ID
#-------------------------------------
	public static function mostrarSucursalActualizarModel($id_mostrar, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_sucursal = :id");	
		$stmt->bindParam(":id", $id_mostrar, PDO::PARAM_INT);
		
		if($stmt -> execute()){
			return $stmt->fetch();
		}
		else{
			return "error";
		}
		$stmt ->close();
	}

	public static function obtenerIdSucursalModel($nombre, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal FROM $tabla WHERE nombre = :nombre");	
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function mostrarTelefonosModel($id_sucursal,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT telefono FROM $tabla WHERE id_sucursal = :id_sucursal");
		$stmt->bindParam(":id_sucursal", $id_sucursal, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function eliminarTelefonosModel($id_sucursal, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :id");
		$stmt->bindParam(":id", $id_sucursal, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

	#OBTENER EL TOTAL DE REGISTROS
	#------------------------------------------------------------
	static public function totalRegistrosModels($tabla){
        $statement = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla");
        $statement->execute();
		return $statement->fetch()[0];
		$$statement->close();
	}
	
	public static function mostrarSucursalUsuario($tabla,$idUsuario){
		$statement = Conexion::conectar()->prepare("SELECT id_sucursal FROM $tabla WHERE id_usuario = :usuario");
		$statement->bindParam(":usuario", $idUsuario, PDO::PARAM_INT);
        $statement->execute();
		return $statement->fetch()[0];
		$statement->close();
	}

	public static function verificarSucursalLocal($sucursal,$tabla,$tabla2){
		$statement = Conexion::conectar()->prepare("SELECT relacion FROM $tabla2 WHERE id_sucursal = :sucursal AND relacion = (SELECT relacion FROM $tabla2 INNER JOIN $tabla ON $tabla2.id_sucursal = $tabla.id_sucursal WHERE $tabla.id_usuario = :usuario)");
		$statement->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
		$statement->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
        $statement->execute();
		return $statement->fetch()[0];
		$statement->close();
	}

}

