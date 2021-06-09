<?php

class ConsultasGiro{
    
	public static function giro_empleados_vigentes(){
		$respuesta = ConsultasGiroModel::giro_empleados_vigentes();
		return $respuesta;
	} 

	public static function usuarios(){
		$respuesta = ConsultasGiroModel::usuarios(TablasGiro::empprin());
		return $respuesta;
	}
}
