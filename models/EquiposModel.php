<?php
require_once "conexion.php";

class EquiposModel{
    
    public static function formularioModel($datos,$tabla,$tabla2){
        $conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla 
		(tipo,
		marca,
		modelo,
		serie,
		ram,
        hd,
        hd_capacidad,
        usuario_so,
        pass_so,
        mouse,
        monitor,
        mochila,
        ups,
        usuario_propietario,
		usuario_vpn,
		pass_vpn,
		servidor_vpn,
		usuario_logmein,
		pass_logmein) 
		VALUES 
		(:tipo,
		:marca,
		:modelo,
		:serie,
		:ram,
        :hd,
        :hd_capacidad,
        :usuario_so,
        :pass_so,
        :mouse,
        :monitor,
        :mochila,
        :ups,
        :usuario_propietario,
		:usuarioVpn,
		:passVpn,
		:servidorVpn,
		:usuarioLogmein,
		:passLogmein)");		

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":ram", $datos["ram"], PDO::PARAM_INT);
        $stmt->bindParam(":hd", $datos["hd"], PDO::PARAM_INT);
		$stmt->bindParam(":hd_capacidad", $datos["hdTipo"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario_so", $datos["userOS"], PDO::PARAM_STR);
		$stmt->bindParam(":pass_so", $datos["userPass"], PDO::PARAM_STR);
        $stmt->bindParam(":mouse", $datos["mouse"], PDO::PARAM_INT);
        $stmt->bindParam(":monitor", $datos["monitor"], PDO::PARAM_INT);
		$stmt->bindParam(":mochila", $datos["mochila"], PDO::PARAM_INT);
		$stmt->bindParam(":ups", $datos["ups"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario_propietario", $datos["user"], PDO::PARAM_INT);
		$stmt->bindParam(":usuarioVpn", $datos["usuarioVpn"], PDO::PARAM_STR);
		$stmt->bindParam(":passVpn", $datos["passVpn"], PDO::PARAM_STR);
		$stmt->bindParam(":servidorVpn", $datos["servidorVpn"], PDO::PARAM_STR);
		$stmt->bindParam(":usuarioLogmein", $datos["usuarioLogmein"], PDO::PARAM_STR);
		$stmt->bindParam(":passLogmein", $datos["passLogmein"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			foreach ($datos['servidorIp'] as $indice=>$servidor) {
					$stmt = $conexion->prepare("INSERT INTO $tabla2(id_usuario,servidor,alias,usuario,pass) VALUES(:idUsuario,:servidor,:alias,:usuario,:pass)");	
					$stmt->bindParam(":idUsuario", $datos["user"], PDO::PARAM_INT);
					$stmt->bindParam(":servidor",$servidor, PDO::PARAM_STR);
					$stmt->bindParam(":alias",$datos['servidorAlias'][$indice], PDO::PARAM_STR);
					$stmt->bindParam(":usuario", $datos['servidorUsuario'][$indice], PDO::PARAM_STR);
					$stmt->bindParam(":pass", $datos['servidorPass'][$indice], PDO::PARAM_STR);
					if(!$stmt->execute())
						return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'Las credenciales de los servidores no se registraron correctamente');
			}
			return array('status'=>'success','mensaje'=>'El registro se realizo correctamente','mensaje2'=>'','id'=>$conexion->lastInsertId());//"Registro exitoso";
		}
		else
			return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!');//"No se realizó el registro, intentelo nuevamente";
		$conexion->close();
	}

	public static function formularioModelActualizar($datos,$equipo,$tabla,$tabla2){
		$conexion=Conexion::conectar();
        $stmt = $conexion->prepare("UPDATE $tabla SET 
		tipo = :tipo,
		marca =:marca,
		modelo =:modelo,
		serie =:serie,
		ram =:ram,
        hd =:hd,
        hd_capacidad =:hd_capacidad,
        usuario_so =:usuario_so,
        pass_so =:pass_so,
        mouse =:mouse,
        monitor =:monitor,
        mochila =:mochila,
        ups=:ups,
        usuario_propietario =:usuario_propietario,
		usuario_vpn=:usuarioVpn,
		pass_vpn=:passVpn,
		servidor_vpn=:servidorVpn,
		usuario_logmein=:usuarioLogmein,
		pass_logmein=:passLogmein
		WHERE id_equipo = :id");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt->bindParam(":ram", $datos["ram"], PDO::PARAM_INT);
		$stmt->bindParam(":hd", $datos["hd"], PDO::PARAM_INT);
		$stmt->bindParam(":hd_capacidad", $datos["hdTipo"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario_so", $datos["userOS"], PDO::PARAM_STR);
		$stmt->bindParam(":pass_so", $datos["userPass"], PDO::PARAM_STR);
		$stmt->bindParam(":mouse", $datos["mouse"], PDO::PARAM_INT);
		$stmt->bindParam(":monitor", $datos["monitor"], PDO::PARAM_INT);
		$stmt->bindParam(":mochila", $datos["mochila"], PDO::PARAM_INT);
		$stmt->bindParam(":ups", $datos["ups"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario_propietario", $datos["user"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $equipo, PDO::PARAM_INT);
		$stmt->bindParam(":usuarioVpn", $datos["usuarioVpn"], PDO::PARAM_STR);
		$stmt->bindParam(":passVpn", $datos["passVpn"], PDO::PARAM_STR);
		$stmt->bindParam(":servidorVpn", $datos["servidorVpn"], PDO::PARAM_STR);
		$stmt->bindParam(":usuarioLogmein", $datos["usuarioLogmein"], PDO::PARAM_STR);
		$stmt->bindParam(":passLogmein", $datos["passLogmein"], PDO::PARAM_STR);

		if($stmt->execute()){
			foreach ($datos['servidorIp'] as $indice=>$servidor) {
				$stmt = $conexion->prepare("INSERT INTO $tabla2(id_usuario,servidor,alias,usuario,pass) VALUES(:idUsuario,:servidor,:alias,:usuario,:pass)");	
				$stmt->bindParam(":idUsuario", $datos["user"], PDO::PARAM_INT);
				$stmt->bindParam(":servidor",$servidor, PDO::PARAM_STR);
				$stmt->bindParam(":alias",$datos['servidorAlias'][$indice], PDO::PARAM_STR);
				$stmt->bindParam(":usuario", $datos['servidorUsuario'][$indice], PDO::PARAM_STR);
				$stmt->bindParam(":pass", $datos['servidorPass'][$indice], PDO::PARAM_STR);
				if(!$stmt->execute())
					return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'Alguna de las credenciales de los servidores no se guardó correctamente');
			}
			foreach ($datos['borrables'] as $row=>$id) {
				$stmt = $conexion->prepare("DELETE FROM $tabla2 WHERE id=:id");
				$stmt->bindParam(":id",$id, PDO::PARAM_INT);
				if(!$stmt->execute())
					return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'Alguna de las credenciales de los servidores no se eliminó correctamente');
			}
			foreach ($datos['servidorId'] as $row=>$id) {
				$stmt = $conexion->prepare("UPDATE $tabla2 SET servidor=:servidor,alias=:alias,usuario=:usuario,pass=:pass WHERE id = :id");	
				$stmt->bindParam(":id",$id, PDO::PARAM_INT);
				$stmt->bindParam(":servidor",$datos['servidorIpActualizar'][$row], PDO::PARAM_STR);
				$stmt->bindParam(":alias",$datos['servidorAliasActualizar'][$row], PDO::PARAM_STR);
				$stmt->bindParam(":usuario", $datos['servidorUsuarioActualizar'][$row], PDO::PARAM_STR);
				$stmt->bindParam(":pass", $datos['servidorPassActualizar'][$row], PDO::PARAM_STR);
				if(!$stmt->execute())
					return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'Alguna de las credenciales de los servidores no se actualizó correctamente');
			}
			return array('status'=>'success','mensaje'=>'La actualización se realizó correctamente','mensaje2'=>'');//"Registro exitoso";
		}	
		else
			return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!');//"No se realizó el registro, intentelo nuevamente";
		$conexion->close();
	}

  
    #BUSCAR USUARIOS EN "ADMINISTAR USUARIOS"
	#------------------------------------------------------------
	public static function buscarEquiposModel($datos,$limit,$tabla,$tabla2){
		//$consulta = 'AND usuario_propietario = 0'; //cambiar a NULL
		if($datos['situacion'] != 2){
			$consulta='';
			if($datos['situacion'] == 0)
				$consulta = 'AND situacion = 0';
			
			if( $datos['sucursal'] != 0)
				$consulta .= ' AND id_sucursal = :sucursal';

			if(!empty($datos['nombreBuscar'])){
				//$consulta .= ' AND (nombre LIKE "%'.$datos['nombreBuscar'].'%" COLLATE utf8_general_ci OR paterno LIKE "%'.$datos['nombreBuscar'].'%"  COLLATE utf8_general_ci OR materno LIKE "%'.$datos['nombreBuscar'].'%"  COLLATE utf8_general_ci)';
				$cadena = $datos['nombreBuscar'];
				$consulta .=" AND CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$cadena%' COLLATE utf8_general_ci";
			}
				
			//$stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombre,paterno,materno,id_sucursal,tipo_acceso,situacion FROM $tabla WHERE $consulta ORDER BY nombre $limit");
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.id_usuario,$tabla.nombre,$tabla.paterno,$tabla.materno,$tabla.id_sucursal,$tabla.situacion,$tabla2.* FROM $tabla INNER JOIN $tabla2 WHERE $tabla.id_usuario=$tabla2.usuario_propietario $consulta ORDER BY nombre $limit");
			if( $datos['sucursal'] != 0)
				$stmt->bindParam(":sucursal", $datos['sucursal'], PDO::PARAM_INT);
		}
		else{
			$stmt = Conexion::conectar()->prepare("SELECT id_equipo, usuario_propietario,IF(tipo=1,'(ESCRITORIO)','(LAPTOP)') AS nombre , marca AS paterno , modelo AS materno ,serie FROM $tabla2 WHERE usuario_propietario > 3000 ORDER BY marca $limit");
		}

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
    }
    
    #OBTENER EL TOTAL DE REGISTROS EN LOS MARCADORES
	#------------------------------------------------------------
	public static function totalRegistros($tabla,$tipo,$tabla2 ='usuarios_ae'){
		if($tipo==1)//contar todos los equipos (asignados,asignados a usuarios dados de baja, NO SE INCLUYEN LOS QUE NO ESTAN ASIGNADOS) para el paginador inicial
			$statement = Conexion::conectar()->prepare("SELECT COUNT(id_equipo) FROM $tabla WHERE usuario_propietario IS NOT NULL"); //cambiar a NULL todos los 0's
		else if($tipo==2)//contar los que esten vinculados a usuarios dados de baja
			$statement = Conexion::conectar()->prepare("SELECT COUNT($tabla.id_equipo) FROM $tabla INNER JOIN $tabla2 WHERE $tabla.usuario_propietario = $tabla2.id_usuario AND $tabla2.situacion = 0");
		else if($tipo==3)//contar equipos que no esten asignados a ningun empleado (se encuentren en stock)
			$statement = Conexion::conectar()->prepare("SELECT COUNT(id_equipo) FROM $tabla WHERE usuario_propietario > 3000");
		else if($tipo==4)//contar la totalidad de los equipos para mostrar el contador (asignados, no asignados, asignados a usuarios dados de baja)
			$statement = Conexion::conectar()->prepare("SELECT COUNT(id_equipo) FROM $tabla");

        $statement->execute();
        return $statement->fetch()[0];
    }

	public static function detalleEquipoModel($equipo,$tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT $tabla.nombre,$tabla.paterno,$tabla.materno,$tabla.id_sucursal,$tabla.imagen,$tabla.id_departamento,$tabla.id_puesto,$tabla2.* FROM $tabla INNER JOIN $tabla2 WHERE $tabla.id_usuario=$tabla2.usuario_propietario AND id_equipo=:id_equipo");
		$stmt->bindParam(":id_equipo", $equipo, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function verificarEquipoSeEncuentreAsignado($equipo,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT usuario_propietario FROM $tabla WHERE id_equipo=:id_equipo");
		$stmt->bindParam(":id_equipo", $equipo, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function detalleEquipoModelSinAsignar($equipo,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_equipo=:id_equipo");
		$stmt->bindParam(":id_equipo", $equipo, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}


	public static function actualizarEquipoModel($equipo,$tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT $tabla2.*, $tabla.id_sucursal FROM $tabla INNER JOIN $tabla2 WHERE $tabla.id_usuario = $tabla2.usuario_propietario AND id_equipo=:id_equipo");
		$stmt->bindParam(":id_equipo", $equipo, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function actualizarEquipoSinAsignarModel($equipo,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_equipo=:id_equipo");
		$stmt->bindParam(":id_equipo", $equipo, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function modelos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT(modelo) FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function marcas($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT(marca) FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		
	}

	/***************************Eliminar equipo */

	public static function eliminarEquipoModel($equipo,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_equipo=:id_equipo");
		$stmt->bindParam(":id_equipo", $equipo, PDO::PARAM_INT);
		if($stmt->execute())
			return array('status'=>'success','mensaje'=>'El registro se eliminó correctamente','mensaje2'=>'');//"Registro exitoso";
		else
			return array('status'=>'error','mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!');//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}

	public static function credencialesServidores($usuario,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario=:id");
		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}


	


}