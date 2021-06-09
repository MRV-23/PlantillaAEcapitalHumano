<?php

require_once "conexion.php";

class EvaluacionesModel{

    public static function preguntasEncuesta($pregunta,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :pregunta");
        $stmt->bindParam(":pregunta", $pregunta, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close(); 
    }

    public static function respuestasEncuestados($pregunta,$tabla){
    
        if($pregunta == 1){
            $campo="uno_comentario,uno_calificacion";
        }
        else if($pregunta == 2){
            $campo="dos_comentario,dos_calificacion";
        }
        else if($pregunta == 3){
            $campo="tres_comentario,tres_calificacion";
        }
        else if($pregunta == 4){
            $campo="cuatro_comentario,cuatro_calificacion";
        }
        else if($pregunta == 5){
            $campo="cinco_comentario,cinco_calificacion";
        }
        else if($pregunta == 6){
            $campo="seis_comentario,seis_calificacion";
        }
        else if($pregunta == 7){
            $campo="siete_comentario,siete_calificacion";
        }
        else if($pregunta == 8){
            $campo="ocho_comentario,ocho_calificacion";
        }
        else if($pregunta == 9){
            $campo="nueve_comentario";
        }
        else if($pregunta == 10){
            $campo="diez_comentario";
        }
        else if($pregunta == 11){
            $campo="once_comentario,once_calificacion";
        }
        else if($pregunta == 12){
            $campo="doce_comentario";
        }
        else if($pregunta == 13){
            $campo="trece_comentario";
        }
        else if($pregunta == 14){
            $campo="catorce_comentario,catorce_calificacion";
        }

        $stmt = Conexion::conectar()->prepare("SELECT $campo FROM $tabla WHERE realizo = :usuario");
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close(); 
    }

    public static function guardarRespuesta($pregunta,$calificacion,$comentario,$tabla){
        if($pregunta == 1){
            $campo="uno_calificacion = $calificacion ,uno_comentario = '$comentario'";
        }
        else if($pregunta == 2){
            $campo="dos_calificacion = $calificacion,dos_comentario = '$comentario'";
        }
        else if($pregunta == 3){
            $campo="tres_calificacion = $calificacion,tres_comentario = '$comentario'";
        }
        else if($pregunta == 4){
            $campo="cuatro_calificacion = $calificacion,cuatro_comentario = '$comentario'";
        }
        else if($pregunta == 5){
            $campo="cinco_calificacion = $calificacion,cinco_comentario = '$comentario'";
        }
        else if($pregunta == 6){
            $campo="seis_calificacion = $calificacion,seis_comentario = '$comentario'";
        }
        else if($pregunta == 7){
            $campo="siete_calificacion = $calificacion,siete_comentario = '$comentario'";
        }
        else if($pregunta == 8){
            $campo="ocho_calificacion = $calificacion,ocho_comentario = '$comentario'";
        }
        else if($pregunta == 9){
            $campo="nueve_comentario = '$comentario'";
        }
        else if($pregunta == 10){
            $campo="diez_comentario = '$comentario'";
        }
        else if($pregunta == 11){
            $campo="once_calificacion = $calificacion,once_comentario = '$comentario' ";
        }
        else if($pregunta == 12){
            $campo="doce_comentario = '$comentario'";
        }
        else if($pregunta == 13){
            $campo="trece_comentario = '$comentario'";
        }
        else if($pregunta == 14){
            $campo="catorce_calificacion = $calificacion,catorce_comentario = '$comentario'";
        }

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $campo WHERE realizo = :id");
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close(); 
    }

    public static function registrarHoraEncuesta($tabla){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT fecha FROM $tabla WHERE realizo = :usuario");
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt -> execute();
        $fecha = $stmt -> fetch()[0];
        if($fecha === NULL){
            $nuevaFecha = date("Y-m-d H:i:s");  
            $stmt = $conexion->prepare("UPDATE $tabla SET fecha = '$nuevaFecha' WHERE realizo = :id");
            $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
            if($stmt->execute())
                return $nuevaFecha;
            else
                return NULL;
        }
        else
            return $fecha;
        $conexion -> close(); 
    }

    public static function finalizarEncuesta($tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status = 1 WHERE realizo = :id");
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close(); 
    }

    public static function verificarTotalPreguntas($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE realizo = :id");
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close(); 
    }

    public static function usuarios($data,$limit,$tabla,$tabla2){
        $consulta = " WHERE situacion = 1";
        
		if($data['situacion'] != 0)
			$consulta= " INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.realizo $consulta AND status = ".intval($data['situacion']);

		if(!empty($data['nombre'])){
			$cadena = $data['nombre'];
			$consulta .=" AND (CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$cadena%' COLLATE utf8_general_ci)";
        }
        
		$conexion=Conexion::conectar();
		$stmt = $conexion->prepare("SELECT id_usuario,CONCAT(nombre,' ',paterno,' ',materno) AS nombre FROM $tabla $consulta ORDER BY nombre $limit");
		$stmt->execute();
        $data = $stmt->fetchAll();
        $stmt = $conexion->prepare("SELECT COUNT(id_usuario) FROM $tabla $consulta");
		$stmt->execute();
        return array('data'=>$data,'total'=>$stmt->fetch()[0]);
		$conexion->close();
    }
    
    public static function status($usuario,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT status FROM $tabla WHERE realizo = :id");
        $stmt->bindParam(":id", $usuario, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close(); 
    }

    public static function marcadores($situacion,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(realizo) FROM $tabla WHERE status = :situacion");
        $stmt->bindParam(":situacion", $situacion, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close(); 
    }

    public static function resultadosEncuesta($usuario,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE realizo = :usuario");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close(); 
    }

    public static function preguntasEncuesta2($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close(); 
    }


}

