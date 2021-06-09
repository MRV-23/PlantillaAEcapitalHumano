<?php
require_once "conexion.php";
require_once "ConexionGiro.php";

class RutasDescargasModel{

    public static function primerSegmento($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT ruta,fiscal FROM $tabla WHERE fiscal <> '2017' ORDER BY id_ruta");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }

    public static function getPeriodos($anio,$tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT periodo,periodo_fecha FROM $tabla INNER JOIN $tabla2 WHERE $tabla.id_ruta = $tabla2.ruta_primer_segmento AND $tabla.fiscal = :anio AND timbrado = 1 ORDER BY periodo");	
        $stmt->bindParam(":anio", $anio, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
    }

    public static function obtenerClave($idUsuario,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT clave FROM $tabla WHERE id_usuario = :id");
        $stmt->bindParam(":id", $idUsuario, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
    }

    /*public static function obtenerIdUsuarioGiro($curp,$tabla){
        $stmt = ConexionGiro::conectar()->prepare("SELECT clave FROM $tabla WHERE CURP = :curp");
        $stmt->bindParam(":curp",$curp, PDO::PARAM_STR);	
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	
    } */
    
    public static function obtenerRegistro($clave,$tabla){
        $stmt = ConexionGiro::conectar()->prepare("SELECT REGISTRO_PATRONAL FROM $tabla WHERE CLAVE = :clave ORDER BY FECHA DESC");
        $stmt->bindParam(":clave",$clave, PDO::PARAM_STR);	
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();	
    } 
    
    public static function obtenerDepartamento($clave,$tabla){
        $stmt = ConexionGiro::conectar()->prepare("SELECT CATALOGO FROM $tabla WHERE CLAVE = :clave ORDER BY FECHA_ENTRADA DESC");
        $stmt->bindParam(":clave",$clave, PDO::PARAM_STR);	
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();	
	} 

}
