<?php

require_once "conexion.php";

class ConciliacionModel{

    public static function cargarCuentas($tabla,$tabla2,$tabla3,$tabla4,$activos){
        $condicion = $activos  ? "WHERE activo = 1" : "";
        $stmt = Conexion::conectar()->prepare("SELECT $tabla.*,CONCAT($tabla2.nombre,' ',paterno,' ',materno) AS responsable,$tabla3.nombre AS nempresa,$tabla4.nombre AS nbanco 
                                               FROM $tabla 
                                               INNER JOIN $tabla2 ON $tabla.tesorero = $tabla2.id_usuario
                                               INNER JOIN $tabla3 ON $tabla.empresa = $tabla3.id
                                               INNER JOIN $tabla4 ON $tabla.banco = $tabla4.id
                                               $condicion ORDER BY cuenta");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function cargarCuentasLayout($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT cuenta FROM $tabla WHERE activo = 1 ORDER BY cuenta");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function cargarCuentas2($tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla.*,CONCAT($tabla2.nombre,' ',paterno,' ',materno) AS responsable,id_sucursal
                                               FROM $tabla 
                                               INNER JOIN $tabla2 ON $tabla.tesorero = $tabla2.id_usuario
                                               WHERE activo = 1 ORDER BY cuenta");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function nuevaCuenta($data,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cuenta,banco,empresa,tesorero) VALUES(:cuenta,:banco,:empresa,:tesorero)");	
        $stmt = self::validarFormularioCuenta($stmt,$data);
        return $stmt->execute();
		$stmt->close();
    }

    public static function nuevoMovimiento($data,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo,nombre,descripcion,nota) VALUES(:tipo,:nombre,:descripcion,:nota)");	
        $stmt = self::validarFormularioMovimiento($stmt,$data);
        return $stmt->execute();
		$stmt->close();
    }

    public static function actualizarMovimiento($data,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo=:tipo,nombre=:nombre,descripcion=:descripcion,nota=:nota WHERE id = :id");	
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        $stmt = self::validarFormularioMovimiento($stmt,$data);
        return $stmt->execute();
		$stmt->close();
    }

    public static function nuevoBeneficiario($data,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre)");	
        $stmt->bindParam(':nombre',$data['beneficiario'],PDO::PARAM_STR);
        return $stmt->execute();
		$stmt->close();
    }

    public static function nuevoConcepto($data,$tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre)");	
        $stmt->bindParam(':nombre',$data['concepto'],PDO::PARAM_STR);
        return $stmt->execute();
		$stmt->close();
    }

    public static function actualizarCuenta($data,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cuenta=:cuenta,banco =:banco,empresa=:empresa,tesorero=:tesorero  WHERE id = :id");	
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        $stmt = self::validarFormularioCuenta($stmt,$data);
        return $stmt->execute();
		$stmt->close();
    }

    public static function validarFormularioMovimiento($stmt,$data){
         $stmt->bindParam(':tipo',$data['tipo'],PDO::PARAM_STR);
         $stmt->bindParam(':nombre',$data['concepto'],PDO::PARAM_STR);
         $stmt->bindParam(':descripcion',$data['descripcion'],PDO::PARAM_STR);
         $stmt->bindParam(':nota',$data['nota'],PDO::PARAM_STR);
         return $stmt;
    }

    public static function validarFormularioCuenta($stmt,$data){
        $stmt->bindParam(':cuenta',$data['cuenta'],PDO::PARAM_STR);
        $stmt->bindParam(':banco',$data['banco'],PDO::PARAM_INT);
        $stmt->bindParam(':empresa',$data['empresa'],PDO::PARAM_INT);
        $stmt->bindParam(':tesorero',$data['tesorero'],PDO::PARAM_INT);
        return $stmt;
   }

    public static function actualizarBeneficiario($data,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");	
        $stmt->bindParam(':nombre',$data['beneficiario'],PDO::PARAM_STR);
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        return $stmt->execute();
		$stmt->close();
    }

    public static function actualizarConcepto($data,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");	
        $stmt->bindParam(':nombre',$data['concepto'],PDO::PARAM_STR);
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        return $stmt->execute();
		$stmt->close();
    }

    public static function cargarBancos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function cargarEmpresas($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla  WHERE status_intranet = 1 ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function actualizarEstado($id,$valor,$tabla){
        $valor = $valor === 'true' ? 1 : 0;
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET activo = $valor WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close(); 	
    }

    public static function cargarBeneficiarios($tabla,$activos){
        $condicion = $activos  ? "WHERE activo = 1" : "";
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla $condicion ORDER BY nombre ");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function cargarMovimientos($tabla,$activos,$tipo=0){
        $condicion = $activos  ? " WHERE activo = 1 " : "";
       if($tipo > 0)
           $condicion .= $tipo == 1 ? " AND tipo < 3" : " AND tipo = 3";
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla $condicion ORDER BY tipo,nombre");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function obtenerDatosNomina($id,$tabla,$tabla2,$tabla3){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS nominista,C.nombre AS cliente,esquema 
                                                FROM $tabla AS N 
                                                INNER JOIN $tabla2 AS U ON N.id_nominista = U.id_usuario 
                                                INNER JOIN $tabla3 AS C ON N.id_cliente = C.id 
                                                WHERE N.id =:id AND liberacion_nominas = 1 AND status_nominas = 1");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close(); 	
    }

    public static function obtenerDatosNomina2($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM $tabla WHERE id = :id AND status_nominas = 1 AND liberacion_nominas = 1");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close(); 	
    }

    public static function registroAvalidar($data,$tabla,$tabla2){
        $sql = self::dataNuevaConciliacion();
        $conexion = Conexion::conectar();
        $flag;
        $id=0;
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $conexion->beginTransaction();
                $stmt = $conexion->prepare("INSERT INTO $tabla($sql)");
                $stmt = self::validarFormularioConciliacion($stmt,$data);
                //$stmt->bindParam(':autorizacion_extemporanea',$data['autorizacion_extemporanea'],PDO::PARAM_INT);
                $stmt->execute();
                $id = $conexion->lastInsertId();
            
                $stmt = $conexion->prepare("INSERT INTO $tabla2(id_conciliacion,fecha) VALUES(:id,:fecha)");
                $stmt->bindParam(":id",$id, PDO::PARAM_INT);
                $stmt->bindParam(':fecha',$data['fechaMovimiento'],PDO::PARAM_STR);
                $stmt->execute();
            $conexion->commit();
            $flag = true;
        } 
        catch (Exception $e){
            $conexion->rollBack();
            $flag = false;
        }
        finally{
            return array('error'=>$flag,'id'=>$id);
            $conexion->close();
        }
    }

    public static function registroSinValidar($data,$tabla){
        $sql = self::dataNuevaConciliacion();
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO $tabla($sql)");	
        $stmt = self::validarFormularioConciliacion($stmt,$data);
        return array('error'=>$stmt->execute(),'id'=>$conexion->lastInsertId());
        $conexion->close();
    }

    public static function dataNuevaConciliacion(){
        return "id_cuenta,
                fecha_movimiento,
                tipo_movimiento,
                monto,
                estatus,
                fecha_cobro,
                numero_poliza,
                id_concepto,
                id_beneficiario,
                id_clasificacion_movimiento,
                numero_factura,
                numero_folio,
                comentarios,
                capturo,
                autorizacion_extemporanea) 
                VALUES(
                :cuenta,
                :fechaMovimiento,
                :tipo,
                :monto,
                :estatus,
                :fechaCobro,
                :poliza,
                :concepto,
                :beneficiario,
                :clasificacionCargos,
                :factura,
                :folio,
                :descripcion,
                :capturo,
                :autorizacion_extemporanea";
    }

    
    public static function actualizarConciliacion($data,$tabla){
        $sql = self::dataActualizarConciliacion();
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $sql");	
        $stmt = self::validarFormularioConciliacion($stmt,$data);
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close();
    }

    public static function actualizarConciliacionAvalidar($data,$tabla,$tabla2){
        $sql = self::dataActualizarConciliacion();
        $conexion = Conexion::conectar();
        $flag;
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $conexion->beginTransaction();
                $stmt = $conexion->prepare("UPDATE $tabla SET $sql");
                $stmt = self::validarFormularioConciliacion($stmt,$data);
                $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
                $stmt->execute();
               
                $stmt = $conexion->prepare("INSERT INTO $tabla2(id_conciliacion,fecha,tipo_movimiento,monto) VALUES(:id,:fecha,:tipo_movimiento,:monto)");
                $stmt->bindParam(":id",$data['id'], PDO::PARAM_INT);
                $stmt->bindParam(':fecha',$data['oldFechaMovimiento'],PDO::PARAM_STR);
                $stmt->bindParam(':tipo_movimiento',$data['oldTipoMovimiento'],PDO::PARAM_INT);
                $stmt->bindParam(':monto',$data['oldMonto'],PDO::PARAM_STR);
                $stmt->execute();
            $conexion->commit();
            $flag = true;
        } 
        catch (Exception $e){
            $conexion->rollBack();
            $flag = false;
        }
        finally{
            return $flag;
            $conexion->close();
        }
    }

    public static function dataActualizarConciliacion(){
        return "id_cuenta = :cuenta,
                fecha_movimiento = :fechaMovimiento,
                tipo_movimiento = :tipo,
                monto = :monto,
                estatus = :estatus,
                fecha_cobro = :fechaCobro,
                numero_poliza = :poliza,
                id_concepto = :concepto,
                id_beneficiario = :beneficiario,
                id_clasificacion_movimiento = :clasificacionCargos,
                numero_factura = :factura,
                numero_folio = :folio,
                comentarios = :descripcion,
                fecha_ultima_actualizacion = NOW(),
                capturo = :capturo,
                autorizacion_extemporanea = :autorizacion_extemporanea
                WHERE id = :id";
    }

    public static function validarFormularioConciliacion($stmt,$data){
        $stmt->bindParam(':cuenta',$data['cuenta'],PDO::PARAM_INT);
        $stmt->bindParam(':fechaMovimiento',$data['fechaMovimiento'],PDO::PARAM_STR);
        $stmt->bindParam(':tipo',$data['tipo'],PDO::PARAM_INT);
        $stmt->bindParam(':monto',$data['monto'],PDO::PARAM_STR);
        $stmt->bindParam(':estatus',$data['estatus'],PDO::PARAM_INT);
        $stmt->bindParam(':fechaCobro',$data['fechaCobro'],PDO::PARAM_STR);
        $stmt->bindParam(':poliza',$data['poliza'],PDO::PARAM_STR);
        $stmt->bindParam(':concepto',$data['concepto'],PDO::PARAM_INT);
        $stmt->bindParam(':beneficiario',$data['beneficiario'],PDO::PARAM_INT);
        $stmt->bindParam(':clasificacionCargos',$data['clasificacionCargos'],PDO::PARAM_INT);
        $stmt->bindParam(':factura',$data['factura'],PDO::PARAM_STR);
        $stmt->bindParam(':folio',$data['folio'],PDO::PARAM_INT);
        $stmt->bindParam(':descripcion',$data['descripcion'],PDO::PARAM_STR);
        $stmt->bindParam(':capturo',$_SESSION['identificador'],PDO::PARAM_INT);
        $stmt->bindParam(':autorizacion_extemporanea',$data['autorizacion_extemporanea'],PDO::PARAM_INT);
        return $stmt;
   }

   public static function getDatosComprobatorios($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT fecha_movimiento,tipo_movimiento,monto FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close(); 	
   }

   //(autorizacion_extemporanea IS NULL OR autorizacion_extemporanea = 1) AND CO.activa = 1 AND (CO.autorizacion_extemporanea IS NULL OR CO.autorizacion_extemporanea = 1)
   public static function mostrar_registros($tabla,$tabla2,$tabla3,$limite,$data){
        $where=self::where($data);
        $stmt = Conexion::conectar()->prepare("SELECT CO.id,CU.cuenta,monto,E.nombre,CO.activa,autorizacion_extemporanea
                                                FROM $tabla AS CO
                                                INNER JOIN $tabla2 AS CU ON CO.id_cuenta = CU.id
                                                INNER JOIN $tabla3 AS E ON CU.empresa = E.id
                                                $where ORDER BY CO.id DESC $limite");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function contarRegistros($tabla,$tabla2,$tabla3,$data){
        $where=self::where($data);
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(CO.id) FROM $tabla AS CO $where");
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close(); 
    }
    // $clientes = self::seleccionarClientes($tabla2);
    // $clientes = $clientes == '' ? '' : " AND id_cliente IN ($clientes)";

    public static function where($data){
        $where='WHERE 1';
        if(!empty($data['cuenta']))
            $where .= " AND CO.id = ".intval($data['cuenta']);
        if(!empty($data['monto']))
            $where .= " AND CO.monto = ".$data['monto'];
        if(!empty($data['folio']))
            $where .= " AND CO.id =".intval($data['folio']);
        if(!empty($data['tipo'])){
            if($data['tipo'] == 3)
                $where .= " AND CO.activa = 0";
            else if($data['tipo'] == 1)
                $where .= " AND (CO.autorizacion_extemporanea IS NULL OR CO.autorizacion_extemporanea = 1) AND CO.activa = 1";
            else//$data['tipo'] == 2
                $where .= " AND CO.autorizacion_extemporanea = 0 AND CO.activa = 1";    
        }
        if(!empty($data['fecha']))
            $where .= " AND CO.fecha_movimiento =".$data['fecha'];
        return $where;
    }

    public static function mostrarRegistro($id,$tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6){
        $stmt = Conexion::conectar()->prepare(" SELECT C.*,CONCAT(U.nombre,' ',paterno,' ',materno) AS responsable,B.nombre AS banco,E.nombre AS empresa,
                                                (SELECT CONCAT(U.nombre,' ',paterno,' ',materno) FROM $tabla2 AS U WHERE id_usuario = C.capturo) AS capturo,
                                                (SELECT S.nombre FROM $tabla6 AS S INNER JOIN $tabla2 AS U ON U.id_sucursal = S.id_sucursal WHERE U.id_usuario = C.capturo) AS sucursal_capturo
                                                FROM $tabla AS C 
                                                INNER JOIN $tabla5 AS CU ON C.id_cuenta = CU.id
                                                INNER JOIN $tabla2 AS U ON CU.tesorero = U.id_usuario
                                                INNER JOIN $tabla4 AS B ON CU.banco = B.id
                                                INNER JOIN $tabla3 AS E ON CU.empresa = E.id
                                                WHERE C.id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close(); 	
    }

    public static function usuarioActualizacion($tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS responsable,S.nombre AS sucursal
                                                FROM $tabla AS U INNER JOIN $tabla2 AS S ON U.id_sucursal = S.id_sucursal WHERE U.id_usuario = :id");
        $stmt->bindParam(':id',$_SESSION['identificador'],PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch();
        $stmt -> close(); 
    }

    public static function verificarValidacion($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT fecha,tipo_movimiento,monto FROM $tabla WHERE id_conciliacion = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch();
        $stmt -> close(); 
    }

    public static function autorizarRegistro($id,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET autorizacion_extemporanea = 1 WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt -> execute();
        $stmt -> close(); 
    }

    public static function eliminarRegistro($id,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET activa = 0  WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt -> execute();
        $stmt -> close(); 
    }

    public static function obtenerNombre($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
       return $stmt -> fetch()[0];
        $stmt -> close(); 
    }

    public static function obtenerClasificacion($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre,descripcion,nota FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
       return $stmt -> fetch();
        $stmt -> close(); 
    }

    public static function obtenerId($nombre,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE nombre = :nombre");
        $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close(); 
    }

    public static function obtenerIdCuenta($cuenta,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE cuenta = :cuenta");
        $stmt->bindParam(':cuenta',$cuenta,PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close(); 
    }

    

    

    /****************************************BORRAR */
    public static function actualizar($data,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
           /* ejercicio=:ejercicio,*/
            mes=:mes,
            cliente=:cliente,
           /* nombre_comercial=:nombre_comercial,*/
            promotor=:promotor,
            subcomisionista=:subcomisionista,
            codigo_cliente=:codigo_cliente,
            empleados=:empleados,
            imss=:imss,
            real_imss=:real_imss,
            ajuste_imss=:ajuste_imss,
            rcv=:rcv,
            real_rcv=:real_rcv,
            ajuste_rcv=:ajuste_rcv,
            infonavit=:infonavit,
            real_infonavit=:real_infonavit,
            ajuste_infonavit=:ajuste_infonavit,
            /*impuesto_estatal=:impuesto_estatal,
            gmma=:gmma,
            vida_invalidez=:vida_invalidez,
            gmme=:gmme,
            otros=:otros,*/
            subtotal=:subtotal,
            imss_obrero=:imss_obrero,
            real_imss_obrero=:real_imss_obrero,
            ajuste_imss_obrero=:ajuste_imss_obrero,
            rcv_obrero=:rcv_obrero,
            real_rcv_obrero=:real_rcv_obrero,
            ajuste_rcv_obrero=:ajuste_rcv_obrero,
            amortizacion=:amortizacion,
            real_amortizacion=:real_amortizacion,
            ajuste_amortizacion=:ajuste_amortizacion,
            total=:total,
            empresa=:empresa,
            registro_imss=NOW(),
            comentarios_imss=:comentarios,
            id_imss=:id_imss
            WHERE id = :id");
        $stmt = self::validarFormularioImss($stmt,$data);
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close();
    }

    
    public static function actualizarGm($data,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            gmma=:gmma,
            vida_invalidez=:vida_invalidez,
            gmme=:gmme,
            otros=:otros,
            subtotal=:subtotal,
            total=:total,
            registro_gm=NOW(),
            comentarios_gm=:comentarios,
            id_gm=:id_gm
            WHERE id = :id");
        $stmt->bindParam(':gmma',$data['gmma'],PDO::PARAM_STR);
        $stmt->bindParam(':vida_invalidez',$data['vida_invalidez'],PDO::PARAM_STR);
        $stmt->bindParam(':gmme',$data['gmme'],PDO::PARAM_STR);
        $stmt->bindParam(':otros',$data['otros'],PDO::PARAM_STR);
        $stmt->bindParam(':subtotal',$data['subtotal'],PDO::PARAM_STR);
        $stmt->bindParam(':total',$data['total'],PDO::PARAM_STR);
        $stmt->bindParam(':comentarios',$data['comentarios'],PDO::PARAM_STR);
        $stmt->bindParam(':id_gm',$_SESSION['identificador'],PDO::PARAM_INT);
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close();
    }

    public static function actualizarNominas($data,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            impuesto_estatal=:impuesto_estatal,
            subtotal=:subtotal,
            total=:total,
            registro_nominas=NOW(),
            comentarios_nominas=:comentarios,
            id_nominas=:id_nominas
            WHERE id = :id");
        $stmt->bindParam(':impuesto_estatal',$data['impuesto_estatal'],PDO::PARAM_STR);
        $stmt->bindParam(':subtotal',$data['subtotal'],PDO::PARAM_STR);
        $stmt->bindParam(':total',$data['total'],PDO::PARAM_STR);
        $stmt->bindParam(':comentarios',$data['comentarios'],PDO::PARAM_STR);
        $stmt->bindParam(':id_nominas',$_SESSION['identificador'],PDO::PARAM_INT);
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
        return $stmt->execute();
        $stmt->close();
    }

    //Mostrar los datos de un registro en particular
    public static function mostrar($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt->fetch();
        $stmt -> close(); 
    }

    //Mostrar los datos de los registros en la administración de registros
    public static function mostrar2($id,$cliente,$tabla){
        $limite='';
        $where=self::where($id,$cliente);
        $stmt = Conexion::conectar()->prepare("SELECT id,id_gm,id_nominas,cliente FROM $tabla WHERE estatus = 1 $where ORDER BY id desc $limite");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close(); 
    }

    //obtenemos los datos del capturista
    public static function obtenerCapturista($id,$tabla,$tabla2,$tabla3){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS nombre,S.nombre AS sucursal,P.nombre AS puesto FROM $tabla AS U 
                                               INNER JOIN $tabla2 AS S ON U.id_sucursal = S.id_sucursal 
                                               INNER JOIN $tabla3 AS P ON U.id_puesto = P.id_puesto WHERE id_usuario = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close(); 
    }

    //Eliminar un registro
    public static function eliminar($id,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = 0 WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
        $stmt -> close(); 
    }

    //Englobamos las condiciones de busqueda para utilizarlas en distintos metodos
    
    //indicamos mediante contadores el estado de los registros
    public static function marcadores($estado,$tabla){
        if($estado < 4)
            $where = "WHERE observaciones = ".intval($estado) ." AND liberacion_nominas = 1 ";
        else if($estado === 4)
            $where = "WHERE tesoreria_estatus = 1 AND observaciones = 2";
        else if($estado == 10)
            $where = "WHERE liberacion_nominas = 1 AND estatus_factura = 1";
        else
            $where = "WHERE tesoreria_estatus = ".(intval($estado) - 3);

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM $tabla $where AND status_nominas = 1");
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close(); 
    }

    public static function cargarSelect2($tabla,$activos){
        $condicion = $activos  ? "WHERE activo = 1" : "";
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla $condicion ORDER BY nombre ");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 	
    }

    public static function getRegistro($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close(); 	
    }

    public static function nuevoCliente($nombre,$nombreComercial,$tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,nombre_comercial) VALUES (:n,:n2)");
        $stmt->bindParam(':n',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':n2',$nombreComercial,PDO::PARAM_STR);
        return $stmt->execute();
        $stmt -> close(); 	
    }

    public static function nuevoPromotor($nombre,$tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:n)");
        $stmt->bindParam(':n',$nombre,PDO::PARAM_STR);
        return $stmt->execute();
        $stmt -> close(); 	
    }

    public static function actualizarCliente($id,$nombre,$nombreComercial,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :n,nombre_comercial = :n2 WHERE id = :id");
        $stmt->bindParam(':n',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':n2',$nombreComercial,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
        $stmt -> close(); 	
    }

    public static function actualizarPromotor($id,$nombre,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :n WHERE id = :id");
        $stmt->bindParam(':n',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
        $stmt -> close(); 	
    }

    public static function getNombreComercial($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre_comercial FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close(); 	
    }

    public static function getNombrePromotor($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close(); 	
    }

    /********************************************* */
    public static function insersionManual($data,$tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla$data");
        return array('respuesta'=>$stmt->execute(),'total'=>$stmt->rowCount());
        $conexion -> close();	
    }

    public static function insersionManualFinanzas($data,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $data AND (id_finanzas = :id OR id_finanzas IS NULL) ");
        $stmt->bindParam(':id',$_SESSION['identificador'],PDO::PARAM_INT);
        return array('respuesta'=>$stmt->execute(),'total'=>$stmt->rowCount());
        $conexion -> close();	
    }

    public static function actualizarFinanzasLiberacion($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id_finanzas,captura_finanzas FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close(); 	
    }

}
