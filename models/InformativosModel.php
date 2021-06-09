<?php
require_once "conexion.php";

class InformativosModel{
    public static function mostrarInformativos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=1");	
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    public static function actualizarInformativo($campo,$valor,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $campo = :valor WHERE id = 1");
        $stmt->bindParam(':valor',$valor,PDO::PARAM_STR);
        if($stmt->execute())
            return array('error'=>false,'titulo'=>'','subtitulo'=>'','tipo'=>'success','tiempo'=>1000,'boton'=>false);
        else
            return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'Intentelo nuevamente','tipo'=>'error','tiempo'=>60000,'boton'=>true);
        $conexion -> close();	
    }
}