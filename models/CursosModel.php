<?php
require_once "conexion.php";

class CursosModel{

    public static function inscribirse($curso,$tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_curso,id_usuario,fecha) VALUES (:curso,:usuario,NOW())");
        $stmt->bindParam(":curso", $curso, PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        return !$stmt->execute();
        $stmt->close();
    }

    public static function verificarRegistro($curso,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla WHERE id_curso = :curso AND id_usuario = :usuario");
        $stmt->bindParam(":curso", $curso, PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close();
    }

}