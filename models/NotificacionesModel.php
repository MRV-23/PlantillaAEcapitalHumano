<?php
require_once "conexion.php";


class NotificacionesModel{

    public static function mostrarNotificaciones($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT avisos FROM $tabla WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$_SESSION['identificador'], PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	
    } 

    public static function aceptarNotificaciones($tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET avisos = 0 WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$_SESSION['identificador'], PDO::PARAM_INT);	
        return $stmt -> execute();
        $stmt -> close();	
    } 
    
}
