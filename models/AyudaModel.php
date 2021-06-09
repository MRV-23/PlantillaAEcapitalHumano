<?php
require_once "conexion.php";

class AyudaModel{

    public static function primeraSeccion($categoria,$comentarios,$tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,categoria,comentarios,fecha) VALUES (:usuario,:categoria,:comentarios,NOW())");
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);
        $stmt->bindParam(":comentarios", $comentarios, PDO::PARAM_STR);
        if($stmt->execute())
            return array('error'=>false,'title'=>'Te agradecemos la confianza y esperamos ser de ayuda, en breve recibirás una respuesta a tu solicitud.','subtitle'=>'','type'=>'success');
        else
            return array('error'=>true,'title'=>'Ocurrio un error.','subtitle'=>'Intenta guardar nuevamente','type'=>'error');
        $stmt->close();
    }

    public static function otraSeccion($preguntas,$comentarios,$tabla){
        $nombres=',';
        $valores=',';
        for($i=0;$i<20;$i++){
             $nombres.= '_'.($i+1).',';
             $valores.= $preguntas[$i].',';
        }
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,categoria $nombres comentarios,fecha) VALUES (:usuario,2 $valores :comentarios,NOW())");
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt->bindParam(":comentarios", $comentarios, PDO::PARAM_STR);
        if($stmt->execute())
            return array('error'=>false,'title'=>'Te agradecemos la confianza y esperamos ser de ayuda, en breve recibirás una respuesta a tu solicitud.','subtitle'=>'','type'=>'success');
        else
            return array('error'=>true,'title'=>'Ocurrio un error:'.$nombres,'subtitle'=>'Intenta guardar nuevamente','type'=>'error');
        $stmt->close();
    }

    public static function datos($tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT($tabla.nombre,' ',paterno,' ',materno) AS nombre, $tabla2.nombre AS sucursal FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
   

}