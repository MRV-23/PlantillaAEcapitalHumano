<?php
require_once "conexion.php";
class TicketsModel{
   
    public static function nuevoTicket($data,$tabla){
		$segmento='';
		$segmento2='';
		$imagen='';
		$imagen2='';
		$documento='';
		$documento2='';
		$usuarioCreaTicket='';
		$usuarioCreaTicket2='';
		if($data['segmento'] != NULL){
			$segmento='segmento,';
			$segmento2=':segmento,';
		}
		if($data['imagenNombre'] != NULL){
			$imagen='imagen,';
			$imagen2=':imagen,';
		}
		if($data['documentoNombre'] != NULL){
			$documento='documento,';
			$documento2=':documento,';
		}
		if($data['idEmpleado'] != NULL){
			$usuarioCreaTicket='genera,';
			$usuarioCreaTicket2="1,";
		}
		$conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla 
		(area,
		subcategoria,
		$segmento
		$imagen
		$documento
		asunto,
		descripcion,
        fecha_registro,
		$usuarioCreaTicket
		id_usuario) 
		VALUES 
		(:area,
		:subcategoria,
		$segmento2
		$imagen2
		$documento2
		:asunto,
		:descripcion,
		NOW(),
		$usuarioCreaTicket2
		:usuario)");		
		$stmt->bindParam(":area", $data["area"], PDO::PARAM_INT);
		$stmt->bindParam(":subcategoria", $data["subCategoria"], PDO::PARAM_INT);
		$stmt->bindParam(":asunto", $data["asunto"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);
		if($data['idEmpleado'] != NULL)
			$stmt->bindParam(":usuario", $data['idEmpleado'], PDO::PARAM_INT);
		else
			$stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
		if($data['segmento'] != NULL)
			$stmt->bindParam(":segmento", $data['segmento'], PDO::PARAM_INT);
		if($data['imagenNombre'] != NULL)
			$stmt->bindParam(":imagen", $data['imagenNombre'], PDO::PARAM_STR);
		if($data['documentoNombre'] != NULL)
			$stmt->bindParam(":documento", $data['documentoNombre'], PDO::PARAM_STR);
		if($stmt->execute()){
			$ultimo_id = $conexion->lastInsertId();
			return json_encode(array('error'=>false,'mensaje'=>"Ticket: $ultimo_id",'mensaje2'=>'El departamento de sistemas pronto se pondra en contacto contigo','tipo'=>'success','folio'=>$ultimo_id));
		}
		else{
			if($data['imagenNombre'] != NULL)
				unlink("../views/imagenes-tickets/".$data["imagenNombre"]);
			if($data['documentoNombre'] != NULL)
				unlink("../views/documentos-tickets/".$data["documentoNombre"]);
			return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error','folio'=>NULL));
		}	
		$conexion->close();
	}
	

	public static function mostrarColaTickets($situacion,$asignados,$tabla){
		$categoria='';

		$ticketSinCerrar='AND ( (DATE(fecha_finalizado) = CURDATE()  AND (reabrir <> 2 OR reabrir IS NULL) ) OR ( DATE(ultima_fecha_cierre) = CURDATE() AND reabrir = 0) )';
		
		if($situacion < 2){ // 2 = FINALIZADOS
			if($situacion==0)
				$ticketSinCerrar='';
			else
				$ticketSinCerrar='OR reabrir = 2 ';
		}
		
		if(Configuraciones::administrador() != $_SESSION['identificador2']){//super usuario
			$categoria = 'AND area = '.AccesoSoporte::usuarios($_SESSION['identificador']);
			if($asignados)
				$asignados = 'AND id_atiende_ticket ='.$_SESSION['identificador'];
			else
				$asignados='';
		}
		else{
			$asignados='';
		}
		
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,id_usuario,asunto,prioridad,area,id_atiende_ticket,fecha_finalizado,fecha_atendido,reabrir,ultima_fecha_cierre FROM $tabla WHERE ( situacion = :situacion $ticketSinCerrar) $categoria $asignados ORDER BY id_ticket");	
		$stmt->bindParam(":situacion", $situacion, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function historialTickets($fecha,$usuario,$limit,$tabla,$tabla2){
		$consulta='';

		if(!empty($fecha)){
			$consulta.=' AND DATE(fecha_finalizado) = :fecha';
			if($fecha == date('Y-m-d'))
				$consulta=" AND DATE(fecha_finalizado) = '2099-01-01'";
		}

		if(Configuraciones::administrador() != $_SESSION['identificador2'])
			$consulta = ' AND area = '.AccesoSoporte::usuarios($_SESSION['identificador']);
	
		if(!empty($usuario)){
			$consulta .=" AND (CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$usuario%' COLLATE utf8_general_ci OR asunto LIKE '%$usuario%' COLLATE utf8_general_ci OR descripcion LIKE '%$usuario%' COLLATE utf8_general_ci )";
			//$consulta .= ' AND (nombre LIKE "%'.$usuario.'%" COLLATE utf8_general_ci OR paterno LIKE "%'.$usuario.'%"  COLLATE utf8_general_ci OR materno LIKE "%'.$usuario.'%"  COLLATE utf8_general_ci OR asunto LIKE "%'.$usuario.'%"  COLLATE utf8_general_ci OR descripcion LIKE "%'.$usuario.'%"  COLLATE utf8_general_ci)';
		}
		

		/*$stmt = Conexion::conectar()->prepare("SELECT id_ticket,$tabla.id_usuario,asunto,numero_ticket,prioridad,area,id_atiende_ticket,fecha_finalizado,fecha_atendido,nombre,paterno,materno FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario
												WHERE $tabla.situacion=2 AND DATE(fecha_finalizado) != CURDATE()  $consulta ORDER BY DATE(fecha_finalizado) DESC,$tabla.area,numero_ticket $limit");*/
												
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,$tabla.id_usuario,asunto,prioridad,area,id_atiende_ticket,fecha_finalizado,fecha_atendido,nombre,paterno,materno FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario
												WHERE $tabla.situacion=2 AND DATE(fecha_finalizado) != CURDATE()  $consulta ORDER BY id_ticket DESC,DATE(fecha_finalizado) DESC $limit");	
												
		if(!empty($fecha) AND $fecha != date('Y-m-d'))
			$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function historialTicketsUsuario($tabla,$tabla2){//fecha_finalizado,fecha_atendido,prioridad,$tabla.id_usuario
		$limit = 'LIMIT 0,30';
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,asunto,area,id_atiende_ticket,fecha_registro,nombre,paterno,materno,$tabla.situacion,visto FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario
												WHERE $tabla.id_usuario = :user ORDER BY fecha_registro DESC $limit");						
		$stmt->bindParam(":user", $_SESSION['identificador'], PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}
	
	public static function mostaraDatosTicket($data,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $data, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}
	
	public static function asignarTicket($ticket,$area,$atiende,$tabla){
		//$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_atiende_ticket = :atiende,situacion=1,fecha_atendido = NOW() WHERE numero_ticket = :id AND DATE(fecha_registro) = CURDATE() AND area=:area");	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_atiende_ticket = :atiende,situacion=1,visto=1,mensaje=1,fecha_atendido = NOW() WHERE id_ticket = :id AND fecha_atendido IS NULL AND area=:area");
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		//$stmt->bindParam(":atiende",$_SESSION['identificador'], PDO::PARAM_INT);
		$stmt->bindParam(":atiende",$atiende, PDO::PARAM_INT);
		$stmt->bindParam(":area",$area, PDO::PARAM_INT);
		if($stmt -> execute())
			return 1;
		else
			return 0;
		$stmt -> close();
	}
	
	public static function cerrarTicket($ticket,$solucion,$causa,$problema,$tabla){//cerrar ticket por primera vez
		$condicion='';
		if(!empty($solucion))
			$condicion.=',solucion = :solucion';
		if(!empty($causa))
			$condicion.=',causa = :causa';
		if(!empty($problema))
			$condicion.=',problema = :problema';

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET situacion=2,visto=1,mensaje=1,fecha_finalizado = NOW() $condicion WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		if(!empty($solucion))
			$stmt->bindParam(":solucion", $solucion, PDO::PARAM_STR);
		if(!empty($causa))
			$stmt->bindParam(":causa", $causa, PDO::PARAM_STR);
		if(!empty($problema))
			$stmt->bindParam(":problema", $problema, PDO::PARAM_STR);

		if($stmt -> execute())
			return 1;
		else
			return 0;
		$stmt -> close();
	}

	public static function actualizarSolucion($ticket,$solucion,$causa,$problema,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET solucion = :solucion,causa = :causa, problema = :problema WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		$stmt->bindParam(":solucion", $solucion, PDO::PARAM_STR);
		$stmt->bindParam(":causa", $causa, PDO::PARAM_STR);
		$stmt->bindParam(":problema", $problema, PDO::PARAM_STR);

		if($stmt -> execute())
			return 1;
		else
			return 0;
		$stmt -> close();
	}

	public static function datosParaGraficar($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) FROM $tabla WHERE id_atiende_ticket = :id AND DATE(fecha_registro) = CURDATE() AND situacion = 2");	
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function datosGraficasBarras($categoria,$tabla){
		//$stmt = Conexion::conectar()->prepare("SELECT subcategoria,COUNT(id_ticket) AS total FROM $tabla WHERE DATE(fecha_registro) = CURDATE() AND situacion = 2 AND area = :cat GROUP BY subcategoria LIMIT 6");
		if($categoria == 2){
			$stmt = Conexion::conectar()->prepare("SELECT subcategoria,segmento,COUNT(id_ticket) AS total FROM $tabla WHERE DATE(fecha_registro) = CURDATE() AND situacion = 2 AND area = :cat GROUP BY subcategoria,segmento LIMIT 6");
		}
		else{
			$stmt = Conexion::conectar()->prepare("SELECT subcategoria,COUNT(id_ticket) AS total FROM $tabla WHERE DATE(fecha_registro) = CURDATE() AND situacion = 2 AND area = :cat GROUP BY subcategoria LIMIT 6");
		}
		$stmt->bindParam(":cat", $categoria, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function reabrirTicket($ticket,$tabla){ //usuario solicita se reabra ticket
		$conexion = Conexion::conectar();
		$stmt = $conexion->prepare("SELECT reabrir from $tabla WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		$stmt -> execute();
		$condicion = intval($stmt -> fetch()[0]);
		if( $condicion === 1 || $condicion === 2){
			return json_encode(array('error'=>false,'mensaje'=>'¡La solicitud ya esta siendo atendida!','mensaje2'=>'El departamento de sistemas pronto se pondra en contacto contigo','tipo'=>'success','status'=>false));
		}
		else{
			$stmt = $conexion->prepare("UPDATE $tabla SET reabrir=1,fecha_registro_reapertura=NOW() WHERE id_ticket = :id");	
			$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
			if($stmt -> execute())
				return json_encode(array('error'=>false,'mensaje'=>'Tu solicitud ha sido registrada correctamente, ticket con el folio no. '.$ticket,'mensaje2'=>'El departamento de sistemas pronto se pondra en contacto contigo','tipo'=>'success','status'=>true));
			else
				return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error','status'=>false));
		}
		$conexion -> close();
	}

	public static function reabrirTicketSoporte($ticket,$flag,$motivo,$tabla){//Soporte reabrir Ticket
			if(intval($flag)){//reabro el ticket
				$aperturaTicket=''; //en caso de que el ticket se abrio por solicitud del usuario conservo la fecha de reapertura
				$conexion=Conexion::conectar();
				$stmt = $conexion->prepare("SELECT id_atiende_ticket,fecha_registro_reapertura from $tabla WHERE id_ticket = :id");	
				$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
				$stmt -> execute();
				$respuesta = $stmt -> fetch();
				if( $respuesta['fecha_registro_reapertura'] == NULL )
					$aperturaTicket = ',fecha_registro_reapertura=NOW()';
			
				$usuarioAnteriorSoporte=intval($respuesta['id_atiende_ticket']);
				$stmt = $conexion->prepare("UPDATE $tabla SET reabrir = 2,fecha_registro_reatendido=NOW(),motivo_apertura=:motivo,id_atiende_ticket=:user,id_usuario_anterior=$usuarioAnteriorSoporte $aperturaTicket WHERE id_ticket = :id");		
				$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
				$stmt->bindParam(":motivo", $motivo, PDO::PARAM_STR);
				$stmt->bindParam(":user", $_SESSION['identificador'], PDO::PARAM_INT);

				if($stmt -> execute())
					return json_encode(array('error'=>false,'mensaje'=>'ok','mensaje2'=>'','tipo'=>'success'));
				else
					return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error'));
				$conexion -> close();
			}
			else{//no reabro el ticket he inmediatamente lo cierro
				$conexion=Conexion::conectar();
				$stmt = $conexion->prepare("SELECT id_atiende_ticket,fecha_registro_reapertura from $tabla WHERE id_ticket = :id");	
				$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
				$stmt -> execute();
				$respuesta = $stmt -> fetch();

				$usuarioAnteriorSoporte=intval($respuesta['id_atiende_ticket']);
				$stmt = $conexion->prepare("UPDATE $tabla SET fecha_registro_reatendido=NOW(),id_atiende_ticket=:user,motivo_apertura=:motivo,id_usuario_anterior=$usuarioAnteriorSoporte WHERE id_ticket = :id");		
				$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
				$stmt->bindParam(":user", $_SESSION['identificador'], PDO::PARAM_INT);
				$stmt->bindParam(":motivo", $motivo, PDO::PARAM_STR);

				if($stmt -> execute())
					return self::CerraTicketReabierto($ticket,$tabla);
				else
					return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error'));
				$conexion -> close();
			}
	}

	public static function CerraTicketReabierto($ticket,$tabla){ //finalizamos el ticket que se reabrio o que se solicito por parte del usuario que se reabriera
		$conexion=Conexion::conectar();
		$stmt = $conexion->prepare("SELECT fecha_registro_reapertura,fecha_registro_reatendido,id_usuario_anterior,motivo_apertura from $tabla WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		if($stmt -> execute())
			$respuesta = $stmt -> fetch();
		else{
			return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error'));
			$conexion -> close();
		}
				
		$usuarioAnterior= intval($respuesta["id_usuario_anterior"]);
		$ticket = intval($ticket);
		
		if( $respuesta['fecha_registro_reatendido'] == NULL )
			$fechaAtendido = date('Y-m-d H:i:s');
		else
			$fechaAtendido = $respuesta["fecha_registro_reatendido"];
		$motivo =  $respuesta['motivo_apertura'];
		
		$stmt = $conexion->prepare("CALL historialaperturatickets(:anterior,:registrado,:atendido,:motivo,:id)");				
		$stmt->bindParam(":anterior", $usuarioAnterior, PDO::PARAM_INT);
		$stmt->bindParam(":registrado", $respuesta["fecha_registro_reapertura"], PDO::PARAM_STR);
		$stmt->bindParam(":atendido", $fechaAtendido, PDO::PARAM_STR);
		$stmt->bindParam(":motivo", $motivo, PDO::PARAM_STR);
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		if($stmt -> execute())
			return json_encode(array('error'=>false,'mensaje'=>'ok','mensaje2'=>'','tipo'=>'success'));
		else
			return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error'));
		$conexion -> close();
	}

	public static function totalPorReabrir($tabla){ //saber cuantas solicitudes para reabrir tickets por área existen
		$categoria = ' WHERE reabrir = 1';
		if(Configuraciones::administrador() != $_SESSION['identificador2'])//super usuario omite las 3 líneas siguientes
			$categoria.= ' AND area = '.AccesoSoporte::usuarios($_SESSION['identificador']);
		
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) AS total FROM $tabla $categoria");
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function totalPorReabrir2($tabla,$tipo){ //saber cuantas solicitudes para reabrir tickets por área existen
		$categoria = ' WHERE reabrir = 1';
		$categoria.= ' AND area = '.$tipo;
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) AS total FROM $tabla $categoria");
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function mostrarSolucionTicket($id,$tabla){ 
		$stmt = Conexion::conectar()->prepare("SELECT solucion,causa,problema FROM $tabla WHERE id_ticket = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}
	
	public static function mostrarColaTicketsReabiertos($tabla){
		$categoria = ' WHERE reabrir = 1';
		if(Configuraciones::administrador() != $_SESSION['identificador2'])//super usuario omite las 3 líneas siguientes
			$categoria.= ' AND area = '.AccesoSoporte::usuarios($_SESSION['identificador']);
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,id_usuario,asunto,prioridad,area,fecha_finalizado FROM $tabla $categoria");						
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	
	public static function mostrarListaHistorial($id,$tabla,$tabla2){ 
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,id_registro,usuario_anterior,fecha_apertura,fecha_atendido,fecha_cierre FROM $tabla INNER JOIN $tabla2 ON $tabla.usuario_anterior = $tabla2.id_usuario WHERE id_ticket_referencia = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function detallesAperturaCierre($id,$tabla){ 
		$stmt = Conexion::conectar()->prepare("SELECT motivo FROM $tabla WHERE id_registro = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function verificarSituacionTicket($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT reabrir from $tabla WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			$condicion = intval($stmt -> fetch()[0]);
			if( $condicion === 2)
				return json_encode(array('error'=>true,'mensaje'=>'El Ticket ya se encuentra reabierto','mensaje2'=>'','tipo'=>'info'));
			else
				return json_encode(array('error'=>false,'valor'=>$condicion));
		}
		else
			return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'¡Intentelo nuevamente!','tipo'=>'error','status'=>false));
		$stmt -> close();
	}

	public static function comprobarRespuestaTickets($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) FROM $tabla WHERE id_usuario =:usuario AND visto = 1");	
		$stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function comprobarRespuestaTicketsMensajes($tabla){///////////TEMPORAL
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) FROM $tabla WHERE id_usuario =:usuario AND mensaje = 1");	
		$stmt->bindParam(":usuario", $_SESSION['identificador'], PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function resetearMensajes($tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET mensaje = 0 WHERE id_usuario = :id");	
		$stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
		$stmt -> execute();
		return ;
		$stmt -> close();
	}

	


	###########################NUEVA VERSÍON ###############################
	public static function ticketVisto($id,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET visto = 0 WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		return $stmt->execute();
		$stmt->close();
	}

	public static function totalTickets($situacion,$area,$tabla){//Muestra cuantos tickest existen en cada situación (Contadores)
		if($area!=="")//En los contadores hacemos conteo por área (soporte, giro o desarrollo)
			$area=" AND area = ".intval($area);

        if($situacion === 2)//Tickets cerrados en el día
			$where = " DATE(fecha_finalizado) = CURDATE()";
		else if($situacion === 1)//atendiendose y atendiendose despues de ser abiertos
			$where = " (situacion = 1 OR reabrir = 2)";
		else//Total: por atender y abiertos
			$where = " situacion = $situacion $area";
			
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) FROM $tabla WHERE $where");
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function totalAbiertos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_registro) FROM $tabla WHERE DATE(fecha_cierre) = CURDATE()");
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function ticketsTotalAbiertos($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_registro) FROM $tabla WHERE DATE(fecha_cierre) = CURDATE() AND usuario_anterior = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function ticketsTotalNuevos($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) FROM $tabla WHERE DATE(fecha_finalizado) = CURDATE() AND id_atiende_ticket = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function ticketsFinalizados($tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT $tabla.id_usuario AS id,nombre, $tabla.imagen,COUNT($tabla2.id_ticket) AS total FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_atiende_ticket WHERE (DATE(fecha_finalizado) = CURDATE() OR ultima_fecha_cierre = CURDATE() ) GROUP BY nombre ORDER BY total DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function personalSoporte($tabla){//Listado del personal de soporte vigente
        $stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombre,imagen FROM $tabla WHERE id_departamento = 18 AND situacion=1 ORDER BY nombre");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function listaTicketsAtendiendo($usuario,$tabla){//Especifica que tickets esta siendo atendido por cada persona
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket FROM $tabla WHERE situacion = 1 AND id_atiende_ticket = :usuario");
		$stmt->bindParam(":usuario", $usuario, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function getDetalleTicket($id,$tabla,$tabla2,$tabla3,$tabla4,$tabla5){
		$stmt = Conexion::conectar()->prepare("SELECT subcategoria,segmento,asunto,descripcion,correo,extension,T.situacion,reabrir,U.imagen,U.id_sucursal,CONCAT(U.nombre, ' ',paterno,' ',materno) AS nombre,fecha_registro,fecha_atendido,fecha_finalizado,S.nombre AS sucursal,D.nombre AS departamento,P.nombre AS puesto
											   FROM $tabla AS T 
											   INNER JOIN $tabla2 AS U  ON T.id_usuario = U.id_usuario 
											   INNER JOIN $tabla3 AS S ON U.id_sucursal = S.id_sucursal 
											   INNER JOIN $tabla4 AS D ON U.id_departamento = D.id_departamento 
											   INNER JOIN $tabla5 AS P ON U.id_puesto = P.id_puesto
											   WHERE id_ticket = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function getDetalleTicket2($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT subcategoria,segmento,asunto,descripcion,situacion,reabrir,fecha_registro,fecha_atendido,fecha_finalizado,id_atiende_ticket,visto
											   FROM $tabla
											   WHERE id_ticket = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function soporteTecnico($id,$tabla,$tabla2,$tabla3,$tabla4){
		$stmt = Conexion::conectar()->prepare("SELECT imagen,correo,extension,imagen,CONCAT(U.nombre, ' ',paterno,' ',materno) AS nombre,S.nombre AS sucursal,D.nombre AS departamento,P.nombre AS puesto
											   FROM $tabla AS U
											   INNER JOIN $tabla2 AS S ON U.id_sucursal = S.id_sucursal 
											   INNER JOIN $tabla3 AS D ON U.id_departamento = D.id_departamento 
											   INNER JOIN $tabla4 AS P ON U.id_puesto = P.id_puesto
											   WHERE id_usuario = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function mostrarColaTickets_($situacion,$mostrarAsignados,$tabla,$tabla2){
		$categoria='';
		$asignados='';

		$ticketSinCerrar='AND ( (DATE(fecha_finalizado) = CURDATE()  AND (reabrir <> 2 OR reabrir IS NULL) ) OR ( DATE(ultima_fecha_cierre) = CURDATE() AND reabrir = 0) )';
		
		if($situacion < 2){ // 2 = FINALIZADOS
			if($situacion==0)
				$ticketSinCerrar='';
			else
				$ticketSinCerrar='OR reabrir = 2 ';
		}
		
		if(Configuraciones::administrador() != $_SESSION['identificador2']){//super usuario
			if($mostrarAsignados)
				$asignados = 'AND id_atiende_ticket ='.$_SESSION['identificador'];
		}
		
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,CONCAT(nombre,' ',paterno,' ',materno) AS usuario,asunto,area,id_atiende_ticket,fecha_registro,fecha_finalizado,fecha_atendido,reabrir,ultima_fecha_cierre FROM $tabla AS T INNER JOIN $tabla2 AS U ON T.id_usuario = U.id_usuario WHERE ( T.situacion = :situacion $ticketSinCerrar) $asignados ORDER BY id_ticket");	
		$stmt->bindParam(":situacion", $situacion, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function totalPorReabrir_($tabla){ //saber cuantas solicitudes para reabrir tickets por área existen
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_ticket) AS total FROM $tabla WHERE reabrir = 1");
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function mostrarColaTicketsReabiertos_($tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,CONCAT(nombre,' ',paterno,' ',materno) as nombre,asunto,prioridad,area,fecha_finalizado FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario WHERE reabrir = 1");						
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function motivoApertura($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT motivo_apertura FROM $tabla WHERE id_ticket = :id");
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	public static function motivoApertura2($id,$tabla){//en el historial de tickets saber porqué se abrio el ticket
		$stmt = Conexion::conectar()->prepare("SELECT motivo FROM $tabla WHERE id_registro = :id");
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	public static function historialTickets_($buscar,$limit,$tabla,$tabla2){
		$consulta='';

		if(!empty($buscar))
			$consulta .=" AND (CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$buscar%' COLLATE utf8_general_ci OR asunto LIKE '%$buscar%' COLLATE utf8_general_ci OR descripcion LIKE '%$buscar%' COLLATE utf8_general_ci )";
												
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,$tabla.id_usuario,asunto,prioridad,area,id_atiende_ticket,fecha_finalizado,fecha_atendido,CONCAT(nombre,' ',paterno,' ',materno) AS usuario FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario
												WHERE $tabla.situacion=2 AND DATE(fecha_finalizado) != CURDATE()  $consulta ORDER BY id_ticket DESC,DATE(fecha_finalizado) DESC $limit");	
												
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function mostrarSolucion($id,$tabla){ 
		$stmt = Conexion::conectar()->prepare("SELECT solucion,causa,problema FROM $tabla WHERE id_ticket = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function cargarCategorias($area,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla WHERE id_area = :a ORDER BY nombre");
		$stmt->bindParam(":a", $area, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function cargarSubCategorias($area,$categoria,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla WHERE id_area = :a AND id_categoria = :b ORDER BY nombre");
		$stmt->bindParam(":a", $area, PDO::PARAM_INT);
		$stmt->bindParam(":b", $categoria, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function agregarCategoria($area,$nombre,$tabla){
		$conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla(id_area,nombre) VALUES(:a,:b)");
		$stmt->bindParam(":a", $area, PDO::PARAM_INT);
		$stmt->bindParam(":b", $nombre, PDO::PARAM_STR);
		if($stmt->execute())
			return $conexion->lastInsertId();
		else
			return false;
		$conexion->close();
	}

	public static function agregarSubCategoria($area,$categoria,$nombre,$tabla){
		$conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla(id_area,id_categoria,nombre) VALUES(:a,:c,:b)");
		$stmt->bindParam(":a", $area, PDO::PARAM_INT);
		$stmt->bindParam(":c", $categoria, PDO::PARAM_INT);
		$stmt->bindParam(":b", $nombre, PDO::PARAM_STR);
		if($stmt->execute())
			return $conexion->lastInsertId();
		else
			return false;
		$conexion->close();
	}

	public static function traducirCategoriaSubcategoria($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :b");
		$stmt->bindParam(":b", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function crearTicket($data,$tabla){//Registra Nuevo ticket
		if($data["usuario"] === null) {
			$usuario=$_SESSION["identificador"];
			$quienCreoTicket='';
			$quienCreoTicket2='';
		}	
		else{
			$usuario=$data["usuario"];
			$quienCreoTicket=',genera';
			$quienCreoTicket2=',1';
		}
		
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO $tabla (id_usuario,area,subcategoria,segmento,asunto,descripcion,fecha_registro$quienCreoTicket) VALUES (:a,:b,:c,:d,:e,:f,NOW()$quienCreoTicket2)");
		$stmt->bindParam(":a", $usuario, PDO::PARAM_INT);	
		$stmt->bindParam(":b", $data["area"], PDO::PARAM_INT);
		$stmt->bindParam(":c", $data["categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":d", $data["subcategoria"], PDO::PARAM_INT);
		$stmt->bindParam(":e", $data["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":f", $data["descripcion"], PDO::PARAM_STR);
        if($stmt->execute())
           return array('error'=>false,'ticket'=>$conexion->lastInsertId());
        else
           return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error');
		$conexion->close();
	}
	
	public static function historialTicketsUsuario_($tabla,$tabla2){//fecha_finalizado,fecha_atendido,prioridad,$tabla.id_usuario
		$limit = 'LIMIT 0,10';
		$stmt = Conexion::conectar()->prepare("SELECT id_ticket,asunto,area,id_atiende_ticket,fecha_registro,nombre,paterno,materno,$tabla.situacion,reabrir,visto FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario
												WHERE $tabla.id_usuario = :user ORDER BY fecha_registro DESC $limit");						
		$stmt->bindParam(":user", $_SESSION['identificador'], PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function redirigirTicket($id,$area,$tabla){
		$categoriaOtros='';
		if($area==1)
			$categoriaOtros=18;
		else if($area==2)
			$categoriaOtros=6;
		else
			$categoriaOtros=26;

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET area = :a, subcategoria = $categoriaOtros, segmento = NULL WHERE id_ticket = :b");
		$stmt->bindParam(":a", $area, PDO::PARAM_INT);
		$stmt->bindParam(":b", $id, PDO::PARAM_INT);
		return $stmt->execute();
		$stmt->close();
	}

	public static function tomarTicket($id,$usuario,$tabla){
		$usuario = $usuario === NULL ? $_SESSION['identificador'] : $usuario;

		$conexion=Conexion::conectar();
		$stmt = $conexion->prepare("SELECT situacion FROM $tabla WHERE id_ticket = :b");
		$stmt->bindParam(":b", $id, PDO::PARAM_INT);

		if(!$stmt->execute())
			return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error','tiempo'=>60000,'boton'=>true);     
		if($stmt->fetch()[0] != 0)
			return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'El ticket: '. $id .' ya fue tomado','tipo'=>'warning','tiempo'=>60000,'boton'=>true);     
		
		$stmt = $conexion->prepare("UPDATE $tabla SET id_atiende_ticket = :a,situacion = 1,fecha_atendido = NOW() WHERE id_ticket = :b");
		$stmt->bindParam(":a", $usuario, PDO::PARAM_INT);
		$stmt->bindParam(":b", $id, PDO::PARAM_INT);

		if(!$stmt->execute())
			return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error','tiempo'=>60000,'boton'=>true);     
		return array('error'=>false);

		$conexion->close();
	}

	public static function guardarSolucion($data,$tabla){
		//Pueden pasar 2 cosas 
		//1) cerrar un ticket que se abrio//cerrarlo por segunda vez o más;
		//2) que se actualicen los campos: problema,causa,solución,situación,fecha finalización y quien cerró el ticket; esto para cerrar el ticket por primera vez
		//3) que sólo se actualice el problema,causa y solución; esto para un ticket que ya se cerró pero se quiere actualizar alguno de los 3 campos antes mencionados
		$conexion = Conexion::conectar();
		$flag='';
		$stmt = $conexion->prepare("SELECT situacion,reabrir FROM $tabla WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $data['id'], PDO::PARAM_INT);

		if(!$stmt->execute())
			return array('error'=>true,'titulo'=>'Ocurrio un error: 001','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error','tiempo'=>60000,'boton'=>true);     
		
		$resultado = $stmt->fetch();

		if($resultado['reabrir'] == 2){//Cerraremos un ticket que fue reabierto
			$stmt = $conexion->prepare("SELECT fecha_registro_reapertura,fecha_registro_reatendido,id_usuario_anterior,motivo_apertura from $tabla WHERE id_ticket = :id");	
			$stmt->bindParam(":id", $data['id'], PDO::PARAM_INT);
			if($stmt->execute())
				$respuesta = $stmt->fetch();
			else
				return array('error'=>true,'titulo'=>'Ocurrio un error: 002','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error','tiempo'=>60000,'boton'=>true);     
					
			$fechaAtendido = $respuesta['fecha_registro_reatendido'] == NULL ? date('Y-m-d H:i:s') : $respuesta["fecha_registro_reatendido"];
			
			$stmt = $conexion->prepare("CALL historialaperturatickets2(:anterior,:registrado,:atendido,:motivo,:id,:problema,:causa,:solucion)");				
			$stmt->bindParam(":anterior", $respuesta["id_usuario_anterior"], PDO::PARAM_INT);
			$stmt->bindParam(":registrado", $respuesta["fecha_registro_reapertura"], PDO::PARAM_STR);
			$stmt->bindParam(":atendido", $fechaAtendido, PDO::PARAM_STR);
			$stmt->bindParam(":motivo", $respuesta['motivo_apertura'], PDO::PARAM_STR);
			$stmt->bindParam(":id",$data['id'], PDO::PARAM_INT);
			$stmt->bindParam(":problema", $data['problema'], PDO::PARAM_STR);
			$stmt->bindParam(":causa", $data['causa'], PDO::PARAM_STR);
			$stmt->bindParam(":solucion", $data['solucion'], PDO::PARAM_STR);
			$flag=1;
		}
		else if($resultado['situacion']!= 2){//El ticket aún no está cerrado
			$stmt = $conexion->prepare("UPDATE $tabla SET solucion = :solucion,causa = :causa, problema = :problema, situacion = 2,fecha_finalizado = NOW(),id_atiende_ticket = :a,visto = 1 WHERE id_ticket = :id");	
			$stmt->bindParam(":id", $data['id'], PDO::PARAM_INT);
			$stmt->bindParam(":solucion", $data['solucion'], PDO::PARAM_STR);
			$stmt->bindParam(":causa", $data['causa'], PDO::PARAM_STR);
			$stmt->bindParam(":problema", $data['problema'], PDO::PARAM_STR);
			$stmt->bindParam(":a", $_SESSION['identificador'], PDO::PARAM_INT);
			$flag=2;
		}
		else{//el ticket ya esta cerrado, sólo se quiere actualizar, motivo, causa y/o solución
			$stmt = $conexion->prepare("UPDATE $tabla SET solucion = :solucion,causa = :causa, problema = :problema WHERE id_ticket = :id");	
			$stmt->bindParam(":id", $data['id'], PDO::PARAM_INT);
			$stmt->bindParam(":solucion", $data['solucion'], PDO::PARAM_STR);
			$stmt->bindParam(":causa", $data['causa'], PDO::PARAM_STR);
			$stmt->bindParam(":problema", $data['problema'], PDO::PARAM_STR);
		}
			
		if(!$stmt->execute())
			return array('error'=>true,'titulo'=>'Ocurrio un error 003','subtitulo'=>'¡ Intentalo de nuevo !','tipo'=>'error','tiempo'=>60000,'boton'=>true);     
		return array('error'=>false,'flag'=>$flag);
		$conexion->close();
	}

	public static function reabrirTicketUsuario($id,$motivo,$tabla){ //usuario solicita se reabra ticket
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET reabrir=1,fecha_registro_reapertura=NOW(),motivo_apertura = :apertura WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->bindParam(":apertura", $motivo, PDO::PARAM_STR);
		if($stmt -> execute())
			return array('error'=>false,'titulo'=>'Tu solicitud ha sido registrada correctamente, ticket con el folio no. '.$ticket,'subtitulo'=>'El departamento de sistemas pronto se pondra en contacto contigo','tipo'=>'success');
		return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'¡Intentelo nuevamente!','tipo'=>'error','status'=>false);
		$conexion->close();
	}
	
	public static function autorizarApertura($ticket,$tabla){//la persona de soporte autorizá la apertura
		$aperturaTicket=''; //en caso de que el ticket se abrio por solicitud del usuario conservo la fecha de reapertura
		$conexion=Conexion::conectar();
		$stmt = $conexion->prepare("SELECT id_atiende_ticket,fecha_registro_reapertura from $tabla WHERE id_ticket = :id");	
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		$stmt->execute();
		$respuesta = $stmt->fetch();
		if( $respuesta['fecha_registro_reapertura'] == NULL )
			$aperturaTicket = ',fecha_registro_reapertura=NOW()';
		$usuarioAnteriorSoporte=intval($respuesta['id_atiende_ticket']);
		$stmt = $conexion->prepare("UPDATE $tabla SET reabrir = 2,fecha_registro_reatendido=NOW(),id_atiende_ticket=:user,id_usuario_anterior=$usuarioAnteriorSoporte $aperturaTicket WHERE id_ticket = :id");		
		$stmt->bindParam(":id", $ticket, PDO::PARAM_INT);
		$stmt->bindParam(":user", $_SESSION['identificador'], PDO::PARAM_INT);
		if($stmt -> execute())
			return array('error'=>false);
		else
			return array('error'=>true,'titulo'=>'Ocurrio un error','subtitulo'=>'¡ Intentelo nuevamente !','tipo'=>'error','boton'=>true,'tiempo'=>60000);
		$conexion->close();
	}

	public static function mostrarListaHistorial_($id,$tabla,$tabla2){ 
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,id_registro,usuario_anterior,fecha_apertura,fecha_atendido,fecha_cierre FROM $tabla INNER JOIN $tabla2 ON $tabla.usuario_anterior = $tabla2.id_usuario WHERE id_ticket_referencia = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	public static function saberSiTicketTieneHistorial($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_registro) FROM $tabla WHERE id_ticket_referencia = :id ");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function traducirReferencia($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id ");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch()[0];
		$stmt -> close();
	}

	public static function getData($id,$tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT nombre AS atiende,T.id_usuario AS atendido 
												FROM $tabla AS U 
												INNER JOIN $tabla2 AS T ON U.id_usuario = T.id_atiende_ticket
												WHERE id_ticket = :id ");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

}
