<?php
require_once "conexion.php";


class ReportesModel{

	public static function reporte_permisos($data,$usuarios,$permisos,$sucursales,$departamentos,$puestos){
		$consulta="WHERE $usuarios.situacion = 1 AND ($permisos.enterado_cambio IS NULL OR $permisos.enterado_cambio > 0)";
		if($data["sucursal"] !=0)
			$consulta.= " AND $usuarios.id_sucursal =".intval($data["sucursal"]);

		if($data["usuario"] !=0 AND $data["usuario"] != 'A'){
			$consulta.= " AND $usuarios.id_usuario =".intval($data["usuario"]);
		}
		if($data["tipo"] !=0)
			$consulta.= " AND $permisos.tipo_solicitud =".intval($data["tipo"]);
		if($data["autorizados"] !=0){
			if($data["autorizados"] ==1)
				$consulta.= " AND $permisos.autorizacion_rh = 2";
			else
				$consulta.= " AND ($permisos.autorizacion_rh = 3 || $permisos.autorizacion_jefe = 3 )";
		}

		if(!empty($data["fechaInicio"]) AND !empty($data["fechaFinal"])){
			$inicio = $data['fechaInicio'];
			$fin = $data['fechaFinal'];
			$consulta.= " AND $permisos.fecha_inicio BETWEEN CAST('$inicio' AS DATE) AND CAST('$fin' AS DATE)";
		}
		else if(!empty($data["fechaInicio"])){
			$inicio = $data["fechaInicio"];
			$consulta.= " AND $permisos.fecha_inicio = '$inicio'";
		}
			
		$stmt = Conexion::conectar()->prepare("SELECT $permisos.id_usuario,$permisos.id_usuario_cambio, $permisos.tipo_solicitud,$permisos.tipo_permiso,$permisos.fecha_inicio,$permisos.fecha_fin,
													  $permisos.horario_inicio,$permisos.horario_fin,$permisos.motivo,$usuarios.nombre AS nombre,paterno,materno,$sucursales.nombre AS sucursal, 
													  $departamentos.nombre AS departamento, $puestos.nombre AS puesto 
													  FROM $permisos INNER JOIN $usuarios ON $permisos.id_usuario = $usuarios.id_usuario 
													  				 INNER JOIN $sucursales ON $usuarios.id_sucursal = $sucursales.id_sucursal 
																	 INNER JOIN $departamentos ON $usuarios.id_departamento = $departamentos.id_departamento 
																	 INNER JOIN $puestos ON $usuarios.id_puesto = $puestos.id_puesto 
																	$consulta 
																	 ORDER BY $permisos.fecha_inicio DESC");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
	} 

	public static function reporte_vacaciones($data,$usuario,$sucursal){
		$consulta = 'WHERE situacion = 1';
		if($data["usuario"] != 0)
			$consulta.= ' AND id_usuario ='.intval($data["usuario"]);
		if($data["sucursal"] !=0)
			$consulta.= " AND $usuario.id_sucursal =".intval($data["sucursal"]);

		$stmt = Conexion::conectar()->prepare("SELECT $usuario.id_usuario AS id, $usuario.nombre,paterno,materno,$sucursal.nombre AS sucursal,vacaciones FROM $usuario INNER JOIN $sucursal ON $usuario.id_sucursal = $sucursal.id_sucursal $consulta ORDER BY $usuario.id_sucursal,paterno,materno,nombre");
		$stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
	}

	public static function vacacionesDisponibles($data,$anio,$tabla){

		$where = $anio !== 0 ? 'AND YEAR(fecha) ='.intval($anio) : '';

		$stmt = Conexion::conectar()->prepare("SELECT IF(SUM(cantidad) > 0,SUM(cantidad),0) FROM $tabla WHERE id_usuario = :id AND signo = 0 $where");
		$stmt->bindParam(':id',$data,PDO::PARAM_INT);
		$stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	
	}

	public static function reporte_nutrifitness($usuario,$nutri,$vuelta,$sucursal){
		$condicion="";
		/*if($vuelta == 1)
			$condicion = "WHERE MONTH($nutri.fecha) = 5";
		else if($vuelta == 2)
			$condicion = "WHERE MONTH($nutri.fecha) = 6";
		else if($vuelta == 3)
			$condicion = "WHERE MONTH($nutri.fecha) = 7";*/

		if($vuelta == 1)
			$condicion = "WHERE DATE($nutri.fecha) BETWEEN '2019-05-15' AND '2019-05-30' ";
		else if($vuelta == 2)
			$condicion = "WHERE DATE($nutri.fecha) BETWEEN '2019-06-19' AND '2019-06-29' ";
		else if($vuelta == 3)
			$condicion = "WHERE DATE($nutri.fecha) BETWEEN '2019-07-22' AND '2019-08-05' ";
		else if($vuelta == 4)
			$condicion = "WHERE DATE($nutri.fecha) BETWEEN '2019-08-22' AND '2019-09-05' ";
		else if($vuelta == 5)
			$condicion = "WHERE DATE($nutri.fecha) BETWEEN '2019-09-23' AND '2019-10-01' ";
		else if($vuelta == 6)
			$condicion = "WHERE DATE($nutri.fecha) BETWEEN '2019-10-21' AND '2019-11-06' ";


		$stmt = Conexion::conectar()->prepare("SELECT $usuario.nombre,paterno,materno,genero,clave,$usuario.id_usuario,$sucursal.nombre AS sucursal,$nutri.* FROM $usuario INNER JOIN $sucursal ON $usuario.id_sucursal = $sucursal.id_sucursal INNER JOIN $nutri ON $usuario.id_usuario = $nutri.id_usuario $condicion ORDER BY $usuario.id_sucursal,paterno,materno,nombre");
		$stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
	}

	/*public static function formatoNominas001($tabla,$tabla2,$tabla3,$tabla4,$tabla5){
		$stmt = Conexion::conectar()->prepare("SELECT t.*,t2.nombre AS cliente,t3.nombre AS empresa_factura 
												FROM $tabla AS t 
												INNER JOIN $tabla2 AS t2 ON t.id_cliente = t2.id 
												INNER JOIN $tabla3 AS t3 ON t.empresa_facturadora = t3.id ");
		$stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
	}*/

	public static function nominas($data,$fechaInicial,$fechaFinal,$nominista,$tipo,$tabla,$tabla2,$tabla3,$tabla4,$tabla5){
		$where='';
	
		if($data == 0)
			$where = " WHERE status_nominas = 1 AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal')";
		else if($data == 2){
			$clientes = NominasModel::seleccionarClientes(Tablas::usuario_cliente());
			$clientes = $clientes == '' ? '' : " AND t2.id IN ($clientes)";
			$where = " WHERE status_nominas = 1 AND liberacion_nominas = 1 AND  t.observaciones = 1 $clientes";
		}
			//$where = " WHERE status_nominas = 1 AND liberacion_nominas = 1 AND esquema != 7 AND t.observaciones = 1";
		else if($data == 8){//LAYOUT FACTURACION
			$where = " WHERE status_nominas = 1 AND liberacion_nominas = 1 AND t.estatus_factura = 1";
			//$where = " WHERE status_nominas = 1 AND liberacion_nominas = 1 AND esquema != 7 AND t.estatus_factura = 1";
		}
		else if($data == 3){
			$clientes = NominasModel::seleccionarClientes(Tablas::usuario_cliente());
			$clientes = $clientes == '' ? '' : " AND t2.id IN ($clientes)";
			$where = " WHERE status_nominas = 1 AND liberacion_nominas = 1 AND t.observaciones = 2 AND t.tesoreria_estatus = 1 $clientes";
		}
			//$where = " WHERE status_nominas = 1 AND liberacion_nominas = 1 AND esquema != 7 AND t.observaciones = 2 AND t.tesoreria_estatus = 1";

		else if($data == 4){//reportes por jefe y sus subordinados NOMINAS

			$respuesta = self::verificarJefatura(Tablas::usuarios());

			#region
			if($_SESSION['identificador'] == 343)//temporal //temporal permiso para daniela en las nóminas de Irasema
				$usuario = "343,277,375";
			else#endregion
				$usuario =$_SESSION['identificador'];

			if($tipo == 1)
				$status=' AND liberacion_nominas = 1';
			else if($tipo == 2)
				$status=' AND liberacion_nominas = 0';
			else
				$status='';

			if($respuesta > 2){
				if($nominista == 100){
					$tabla6 = Tablas::jefe();
					if( $_SESSION['identificador2'] == 6 || $_SESSION['identificador'] == 201)
						$where = " WHERE (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
					else
						$where = " WHERE (id_nominista = $usuario OR id_nominista IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1  $status";
						//$where = " WHERE (id_nominista = $usuario OR id_nominista IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
					}
				else
					$where = " WHERE id_nominista = $nominista AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1  $status";
					//$where = " WHERE id_nominista = $nominista AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
			}
			else
				$where = " WHERE id_nominista IN ($usuario) AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
				//$where = " WHERE id_nominista = $usuario AND (DATE(captura_nominista) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
		}

		else if($data == 5){//reportes por jefe y sus subordinados TESORERIA

			$respuesta = self::verificarJefatura(Tablas::usuarios());
			$usuario =$_SESSION['identificador'];

			if($tipo == 1)
				$status=' AND tesoreria_estatus = 2';
			else if($tipo == 3)
				$status=' AND tesoreria_estatus = 3';
			else if($tipo == 4)
				$status=' AND tesoreria_estatus = 4';
			else if($tipo == 6)
				$status=' AND tesoreria_estatus = 1';
			else
				$status='';

			if($respuesta > 2){
				if($nominista == 100){
					$tabla6 = Tablas::jefe();
					if( $_SESSION['identificador2'] == Configuraciones::administrador() || $_SESSION['identificador'] == 201)
						$where = " WHERE (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND observaciones > 1 $status";
					else
						$where = " WHERE (id_tesoreria = $usuario OR id_tesoreria IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1  $status";
						//$where = " WHERE (id_tesoreria = $usuario OR id_tesoreria IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
				}
				else{
					/*if( GrupoCapturaConfidenciales::pertenece($_SESSION['identificador']) || Configuraciones::administrador() == $_SESSION['identificador2'] )
						$mostrarOcultas = '';
					else
						$mostrarOcultas = ' AND esquema != 7';*/
					$where = " WHERE id_tesoreria = $nominista AND (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
					//$where = " WHERE id_tesoreria = $nominista AND (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $mostrarOcultas $status";
				}
			}
			else
				$where = " WHERE id_tesoreria = $usuario AND (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
				//$where = " WHERE id_tesoreria = $usuario AND (DATE(captura_tesoreria) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
		}

		else if($data == 6){//reportes por jefe y sus subordinados FINANZAS

			$respuesta = self::verificarJefatura(Tablas::usuarios());
			$usuario =$_SESSION['identificador'];

			if($tipo == 1)
				$status=' AND observaciones = 2';
			else if($tipo == 2)
				$status=' AND observaciones = 3';
			else if($tipo == 4)
				$status=' AND observaciones = 1';
			/*else if($tipo == 5)
				$status =' AND esquema = 7';*/
			else
				$status='';

			if($respuesta > 2){
				if($nominista == 100){
					$tabla6 = Tablas::jefe();
					if( $_SESSION['identificador2'] == Configuraciones::administrador() || $_SESSION['identificador'] == 201 )
						$where = " WHERE (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND liberacion_nominas = 1 $status";
					else
						$where = " WHERE (id_finanzas = $usuario OR id_finanzas IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
						//$where = " WHERE (id_finanzas = $usuario OR id_finanzas IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
					}
				else{
					/*if( GrupoCapturaConfidenciales::pertenece($_SESSION['identificador']) || Configuraciones::administrador() == $_SESSION['identificador2'] )
						$mostrarOcultas = '';
					else
						$mostrarOcultas = ' AND esquema != 7';*/
					$where = " WHERE id_finanzas = $nominista AND (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
					//$where = " WHERE id_finanzas = $nominista AND (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $mostrarOcultas $status";
				}
					
			}
			else
				$where = " WHERE id_finanzas = $usuario AND (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
				//$where = " WHERE id_finanzas = $usuario AND (DATE(captura_finanzas) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
		}

		else if($data == 7){//reportes por jefe y sus subordinados FACTURACIÓN

			$respuesta = self::verificarJefatura(Tablas::usuarios());
			$usuario =$_SESSION['identificador'];

			$status = intVal($tipo) < intVal(5) ? ' AND estatus_factura ='.intVal($tipo) : '';

			if($respuesta > 2){
				if($nominista == 100){
					$tabla6 = Tablas::jefe();
					if( $_SESSION['identificador2'] == Configuraciones::administrador() || $_SESSION['identificador'] == 201 )
						$where = " WHERE (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND liberacion_nominas = 1 $status";
					else
						$where = " WHERE (id_facturacion = $usuario OR id_facturacion IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
						//$where = " WHERE (id_facturacion = $usuario OR id_facturacion IN ( SELECT id_empleado FROM $tabla6 WHERE id_jefe = $usuario)) AND (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
				}
				else{
					/*if( GrupoCapturaConfidenciales::pertenece($_SESSION['identificador']) || Configuraciones::administrador() == $_SESSION['identificador2'] )
						$mostrarOcultas = '';
					else
						$mostrarOcultas = ' AND esquema != 7';*/
					$where = " WHERE id_facturacion = $nominista AND (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
					//$where = " WHERE id_facturacion = $nominista AND (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $mostrarOcultas $status";
				}
					
			}
			else
				$where = " WHERE id_facturacion = $usuario AND (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 $status";
				//$where = " WHERE id_facturacion = $usuario AND (DATE(captura_facturacion) BETWEEN '$fechaInicial' AND '$fechaFinal') AND status_nominas = 1 AND esquema != 7 $status";
		}

		$stmt = Conexion::conectar()->prepare( "SELECT t.*,t2.nombre AS cliente,t3.nombre AS empresa_factura,CONCAT(t4.nombre,' ',t4.paterno,' ',t4.materno) AS nominista,t5.nombre AS sucursal 
												FROM $tabla AS t 
												INNER JOIN $tabla2 AS t2 ON t.id_cliente = t2.id 
												INNER JOIN $tabla3 AS t3 ON t.empresa_facturadora = t3.id 
												INNER JOIN $tabla4 AS t4 ON t.id_nominista = t4.id_usuario
												INNER JOIN $tabla5 AS t5 ON t4.id_sucursal = t5.id_sucursal
												$where");
		$stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
	}

	//$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
	
	public static function verificarJefatura($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT tipo_acceso FROM $tabla WHERE id_usuario = :id");
		$stmt->bindParam(':id',$_SESSION['identificador'],PDO::PARAM_INT);
		$stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	
	}

	public static function reporteTickets($inicio,$fin,$area,$tabla,$tabla2,$tabla3){
		$area = $area == 0 ? '' : 'AND area = '.intval($area);
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,CONCAT(U.nombre,' ',paterno,' ',materno) AS nombre,S.nombre AS sucursal,area,subcategoria,segmento,asunto,descripcion,fecha_registro,fecha_atendido,fecha_finalizado,problema,causa,solucion,T.situacion,id_atiende_ticket 
											   FROM $tabla AS T 
											   INNER JOIN $tabla2 AS U 
											   ON T.id_usuario= U.id_usuario 
											   INNER JOIN $tabla3 AS S 
											   ON S.id_sucursal = U.id_sucursal 
											   WHERE (DATE(fecha_registro) BETWEEN :inicio AND :fin) $area
											   ORDER BY id_ticket");
		$stmt->bindParam(':inicio',$inicio,PDO::PARAM_STR);
		$stmt->bindParam(':fin',$fin,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();	
	}
	
	public static function costos($inicio,$fin,$tabla,$tabla2,$tabla3,$tabla4){
		$stmt = Conexion::conectar()->prepare( "SELECT C.*,CONCAT(U.nombre,' ',paterno,' ',materno) AS capturista_imss,S.nombre AS sucursal,CL.nombre AS nombre_cliente, CL.nombre_comercial  
												FROM $tabla AS C 
												INNER JOIN $tabla2 AS U ON C.id_imss = U.id_usuario
												INNER JOIN $tabla3 AS S ON U.id_sucursal = S.id_sucursal
												INNER JOIN $tabla4 AS CL ON C.cliente = CL.id
												WHERE estatus = 1 AND (DATE(registro) BETWEEN :inicio AND :fin)");
		$stmt->bindParam(':inicio',$inicio,PDO::PARAM_STR);
		$stmt->bindParam(':fin',$fin,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
	}

	public static function conciliacion($inicio,$fin,$tipo,$tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$tabla9){
		$where='';
		if(!empty($tipo)){
            if($tipo == 3)
                $where .= " AND CO.activa = 0";
            else if($tipo == 1)
                $where .= " AND (CO.autorizacion_extemporanea IS NULL OR CO.autorizacion_extemporanea = 1) AND CO.activa = 1";
            else//$tipo == 2
                $where .= " AND CO.autorizacion_extemporanea = 0 AND CO.activa = 1";    
        }
		$stmt = Conexion::conectar()->prepare( "SELECT CO.*,CONCAT(US.nombre,' ',paterno,' ',materno) AS responsable,CU.cuenta,BA.nombre AS banco,EM.nombre AS empresa,
												(SELECT CONCAT(U.nombre,' ',paterno,' ',materno) FROM $tabla2 AS U WHERE id_usuario = CO.capturo) AS capturo,
												(SELECT S.nombre FROM $tabla3 AS S INNER JOIN $tabla2 AS U ON U.id_sucursal = S.id_sucursal WHERE U.id_usuario = CO.capturo) AS sucursal
												FROM $tabla AS CO 
												INNER JOIN $tabla4 AS CU ON CO.id_cuenta = CU.id
												INNER JOIN $tabla2 AS US ON CU.tesorero = US.id_usuario
												INNER JOIN $tabla5 AS BA ON BA.id = CU.banco
												INNER JOIN $tabla9 AS EM ON EM.id = CU.empresa
												WHERE (DATE(fecha_movimiento) BETWEEN :inicio AND :fin) $where");
		$stmt->bindParam(':inicio',$inicio,PDO::PARAM_STR);
		$stmt->bindParam(':fin',$fin,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function reportePersonalAsistencias($inicio,$fin){
		//2021-03-30  -> inicio 
		//2021-04-12  -- fin
		//FECHA ADMITIDA POR LA QUERY ---> yy/mm/dd  2021-04-01
		//$stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS nombre,D.nombre AS departamento,P.nombre AS puesto,S.nombre AS sucursal, DATE(A.fecha) AS fecha, TIME(A.fecha) AS hora
		$stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS nombre,D.nombre AS departamento,P.nombre AS puesto,S.nombre AS sucursal, DATE(A.fecha) AS fecha, TIME(A.fecha) AS hora,retardo AS estatus
							FROM asistencias_ae AS A
							INNER JOIN usuarios_ae AS U ON A.usuario = U.id_usuario
							INNER JOIN sucursales_ae AS S ON U.id_sucursal = S.id_sucursal
							INNER JOIN departamentos_ae AS D ON U.id_departamento = D.id_departamento
							INNER JOIN puestos_ae AS P ON U.id_puesto = P.id_puesto
							WHERE DATE(A.fecha) BETWEEN :inicio AND :fin AND U.situacion = 1 ORDER BY S.nombre ASC,D.nombre ASC,U.nombre ASC,U.paterno ASC,U.materno ASC,A.id");
		$stmt->bindParam(':inicio',$inicio,PDO::PARAM_STR);
		$stmt->bindParam(':fin',$fin,PDO::PARAM_STR);									   
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function confirmarPermisos(){
		////SELECT * FROM `permisos_ae` WHERE id_usuario='441' AND tipo_solicitud = '1' AND tipo_permiso = '5' AND fecha_inicio = '2021-03-29'

		//SELECT id_permiso AS id, id_usuario AS USUARIO , tipo_solicitud AS SOLICITUD ,tipo_permiso AS PERMISO, fecha_inicio AS INICIO, fecha_fin AS FIN , hora_inicio AS HORA_INICIO
		$stmt = Conexion::conectar()->prepare("SELECT * FROM `permisos_ae` WHERE id_usuario='441' AND tipo_solicitud = '1' AND tipo_permiso = '5' AND fecha_inicio = '2021-03-29'");
		$stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();	

		
	}
}
