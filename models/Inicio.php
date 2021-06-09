<?php
class InicioModel{
    public static function cumpleanos($tabla){
        $consulta = '';
        $orden = '';
        $mes = date('m');
        if(date('d') >= 26){ //Los dias 25 muestro los cumpleañeros del próximo mes
            if($mes != 12)
                    $consulta = " OR MONTH(fecha_nacimiento) = ($mes + 1)";
            else{
                    $consulta = " OR MONTH(fecha_nacimiento) = 1";
                    $orden = "DESC";
            }    
        }  
        $stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,DAY(fecha_nacimiento) AS dia,MONTH(fecha_nacimiento) AS mes,imagen,id_sucursal FROM $tabla WHERE situacion=1 AND (MONTH(fecha_nacimiento) = $mes $consulta) ORDER BY MONTH(fecha_nacimiento) $orden,DAY(fecha_nacimiento)");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
    }

    public static function aniversarios($tabla){
        $consulta = '';
        $orden = '';
        $mes = date('m');
        if(date('d') >= 26){ //Los dias 25 muestro los cumpleañeros del próximo mes
            if($mes != 12)
                    $consulta = " OR MONTH(fecha_ingreso) = ($mes + 1)";
            else{
                    $consulta = " OR MONTH(fecha_ingreso) = 1";
                    $orden = "DESC";
            }    
        }  
        $stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,DAY(fecha_ingreso) AS dia, MONTH(fecha_ingreso) AS mes,YEAR(fecha_ingreso) AS anio,imagen,id_sucursal FROM $tabla WHERE situacion=1 AND (MONTH(fecha_ingreso) = $mes $consulta) ORDER BY MONTH(fecha_ingreso) $orden,DAY(fecha_ingreso)");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
    }
}