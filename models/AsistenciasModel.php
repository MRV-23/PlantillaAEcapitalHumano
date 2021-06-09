<?php
require_once "conexion.php";

class AsistenciasModel{

    public static function mostrarRegistros(){
        $fecha = date('Y-m-d');

        if(/*$_SERVER['REQUEST_URI'] === '/asesores/usuariosPass'*/ !empty($fecha)){
            $fecha = explode("-", $fecha);
            $fecha = " AND MONTH(fecha) = $fecha[1] AND YEAR(fecha) = $fecha[0]" ;
        }
        else{
            $fecha = date('Y-m-d');
            $fecha = " AND DATE(fecha) = '$fecha'";
        }
        $stmt = Conexion::conectar()->prepare("SELECT * FROM  asistencias_ae WHERE usuario = :id $fecha ORDER BY DATE(fecha) ASC,TIME(fecha) ASC");
        $stmt->bindParam(':id',$_SESSION['identificador'],PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 
    }

    public static function nuevoRegistro($data,$tabla,$tabla2){
        $conexion = Conexion::conectar();
        $autorizado = 0;
        $flag=false;
        $temp = '';        
        $stts = $data['status'];
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $conexion->beginTransaction();

            $stmt = $conexion->prepare("SELECT id FROM status_asistencias_ae WHERE id = '$stts'");
            $stmt->execute();
            $status = $stmt->fetch()[0];

            $stmt = $conexion->prepare("SELECT token FROM $tabla2 WHERE usuario = :id");	
            $stmt->bindParam(':id',$_SESSION['identificador'],PDO::PARAM_INT);
            $stmt->execute();
            $tokens = $stmt->fetchAll();
            foreach($tokens as $row => $item){
                $temp = $item['token'];
                if($data['token'] === $item['token']){
                    $autorizado = 1;
                    break;
                }

            }

            $stmt = $conexion->prepare("INSERT INTO $tabla (usuario,fecha,verificacion_token,retardo) VALUES (:id,NOW(),:verificacion,:statusA)");
            $stmt->bindParam(':id',$_SESSION['identificador'],PDO::PARAM_INT);
            $stmt->bindParam(':verificacion',$autorizado,PDO::PARAM_INT);
            $stmt->bindParam(':statusA',$status,PDO::PARAM_INT);
            $stmt->execute();

            
            $flag = true;
            $conexion->commit();
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
    public static function reportePersonalAsistencias($inicio,$fin,$tabla,$tabla2,$tabla3,$tabla4,$tabla5){
		$stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS nombre,D.nombre AS departamento,P.nombre AS puesto,S.nombre AS sucursal, DATE(A.fecha) AS fecha, TIME(A.fecha) AS hora 
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
}

