<?php

require_once "conexion.php";

class SoftwareModel{

    public static function nuevo($data,$tabla){
        $conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla(nombre,descripcion,fecha) VALUES(:nombre,:descripcion,NOW())");	
        $stmt->bindParam(':nombre',$data['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(':descripcion',$data['descripcion'],PDO::PARAM_STR);    
        if($stmt->execute())
            return intval($conexion->lastInsertId());
        else
            return false;
		$conexion->close();
    }

    public static function mostrarRegistros($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");	
        $stmt->execute();
        return $stmt -> fetchAll();
		$stmt->close();
    }
}
