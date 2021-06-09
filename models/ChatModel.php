<?php

require_once "conexion.php";

class ChatModel{

    public static function cargarConectados($sql,$tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT id_usuario,CONCAT($tabla.nombre,' ',paterno,' ',materno) AS nombre,$tabla2.nombre AS sucursal FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal WHERE id_usuario IN($sql) ORDER BY $tabla.nombre,paterno,materno");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close(); 
    }

    /*****************************************chat */
    public function usuarios($buscar,$tabla,$tabla2){
        //$consulta = " WHERE $tabla.situacion = 1";
        $consulta=" (CONCAT_WS(' ',$tabla.nombre,paterno,materno) LIKE '%$buscar%' COLLATE utf8_general_ci) AND $tabla.situacion = 1";
        $stmt = Conexion::conectar()->prepare("SELECT id_usuario,CONCAT($tabla.nombre,' ',paterno,' ',materno) AS nombre,imagen,situacion_chat AS chat, $tabla2.nombre AS sucursal FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal WHERE $consulta ORDER BY $tabla.nombre");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
    }

    /*public function chats($tabla,$tabla2,$tabla3){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT($tabla3.id) AS mensajes, id_usuario,CONCAT($tabla.nombre,' ',paterno,' ',materno) AS nombre,imagen,situacion_chat AS chat, $tabla2.nombre AS sucursal FROM $tabla 
                                                INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal 
                                                INNER JOIN $tabla3 ON $tabla.id_usuario = $tabla3.remitente 
                                                WHERE $tabla3.destinatario = :usuario AND visto = 0 
                                                ORDER BY $tabla.nombre");
        $stmt->bindParam(":usuario", $_SESSION["identificador"], PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
    }*/

    public function grupos($tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla 
                                                INNER JOIN $tabla2 ON $tabla.id = $tabla2.grupo
                                                WHERE $tabla2.usuario = :usuario ORDER BY $tabla.nombre");
        $stmt->bindParam(":usuario", $_SESSION["identificador"], PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
    }

    public function totalUsuarios($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla WHERE situacion = 1");
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	
    }

    public static function cambiarEstado($estado,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET situacion_chat = :estado WHERE id_usuario = :usuario ");
        $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $_SESSION["identificador"], PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close();	
    }

    public static function leerChat($chatCon,$tabla){
        $respuesta=array();
        $respuesta['mensajes'] = array();
        $conexion = Conexion::conectar();

       $stmt = $conexion->prepare("UPDATE $tabla SET visto = 1 WHERE destinatario = :usuario AND remitente = :remitente");
        $stmt->bindParam(":remitente", $chatCon, PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $_SESSION["identificador"], PDO::PARAM_INT);
        $stmt -> execute();

        $stmt = $conexion->prepare("SELECT COUNT(id) FROM $tabla WHERE destinatario = :id AND visto = 0");
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt -> execute();
        $respuesta['totalMensajes'] = $stmt -> fetch()[0];

        $stmt = $conexion->prepare("SELECT destinatario,remitente,mensaje,fecha FROM $tabla WHERE (destinatario = :usuario AND remitente = :remitente) OR (remitente = :usuario AND destinatario = :remitente)  ORDER BY fecha");
        $stmt->bindParam(":remitente", $chatCon, PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $_SESSION["identificador"], PDO::PARAM_INT);
        $stmt -> execute();
        $respuesta['mensajes'] = $stmt -> fetchAll();
        return $respuesta;
        $conexion -> close();	
    }

    public static function datosUsuario($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre,imagen FROM $tabla WHERE id_usuario = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();	
    }

    public static function nuevoMensaje($destinatario,$mensaje,$tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(remitente,destinatario,mensaje,fecha) VALUES(:remitente,:destinatario,:mensaje,NOW())");
        $stmt->bindParam(":remitente", $_SESSION["identificador"], PDO::PARAM_INT);
        $stmt->bindParam(":destinatario",$destinatario, PDO::PARAM_INT);
        $stmt->bindParam(":mensaje",$mensaje, PDO::PARAM_STR);
        return $stmt -> execute();
        $stmt -> close();	
    }

    public static function totalMensajes($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM $tabla WHERE destinatario = :id AND visto = 0");
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	
    }

    public static function mensajesVistos($remitente,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET visto = 1 WHERE destinatario = :id AND remitente = :remitente");
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt->bindParam(":remitente",$remitente, PDO::PARAM_INT);
        return $stmt -> execute();
        $stmt -> close();	
    }

    public static function crearGrupo($nombre,$integrantes,$tabla,$tabla2){
        $total = count($integrantes);
        $conexion = Conexion::conectar();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $conexion->beginTransaction();
                $stmt = $conexion->prepare("INSERT INTO $tabla(nombre,administrador) VALUES(:nombre,:administrador)");//Creamos el grupo
                $stmt->bindParam(":nombre",$nombre, PDO::PARAM_STR);
                $stmt->bindParam(":administrador",$_SESSION['identificador'], PDO::PARAM_INT);
                $stmt->execute();
                $id = $conexion->lastInsertId();
                for($i=0;$i<$total;$i++){
                    $stmt = $conexion->prepare("INSERT INTO $tabla2(grupo,usuario) VALUES(:grupo,:usuario)");//registramos a los integrantes del grupo
                    $stmt->bindParam(":grupo",$id, PDO::PARAM_INT);
                    $stmt->bindParam(":usuario",$integrantes[$i], PDO::PARAM_INT);
                    $stmt->execute();
                }
                $stmt = $conexion->prepare("INSERT INTO $tabla2(grupo,usuario) VALUES(:grupo,:usuario)");//Insertamos al creador del grupo
                $stmt->bindParam(":grupo",$id, PDO::PARAM_INT);
                $stmt->bindParam(":usuario",$_SESSION['identificador'], PDO::PARAM_INT);
                $stmt->execute();
            $conexion->commit();
            return true;
        } 
        catch (Exception $e){
            $conexion->rollBack();
            return false;
        }
        finally{
            $conexion->close();
        }
    }

}

