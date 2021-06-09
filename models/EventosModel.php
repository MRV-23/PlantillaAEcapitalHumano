<?php
require_once "conexion.php";


class EventosModel{

    public static function validarFormulario($datos,$tabla){
        $seis=$seisA='';
        $siete=$sieteA='';
        $nueve=$nueveA='';
        $trece=$treceA='';

        if($datos["seisA"] == 1){
            $seis=',seis';
            $seisA=',:seis';
        } 
        if($datos["sieteA"] == 1){
            $siete=',siete';
            $sieteA=',:siete';
        } 
        if($datos["ocho"] > 0){
            $nueve=',nueve';
            $nueveA=',:nueve';
        }

        if($datos["treceA"] == 1){
            $trece=',trece';
            $treceA=',:trece';
        } 

        $conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla 
		(id_usuario,
		uno,
		dos,
		tres,
		cuatro,
        cinco,
        ocho,
        diez,
        once,
        doce
        $seis
        $siete
        $nueve
        $trece) 
		VALUES 
		(:id,
		:uno,
		:dos,
		:tres,
		:cuatro,
        :cinco,
        :ocho,
        :diez,
        :once,
        :doce
        $seisA
        $sieteA
        $nueveA
        $treceA)");		

		$stmt->bindParam(":id", $_SESSION["identificador"], PDO::PARAM_INT);
		$stmt->bindParam(":uno", $datos["uno"], PDO::PARAM_INT);
		$stmt->bindParam(":dos", $datos["dos"], PDO::PARAM_INT);
		$stmt->bindParam(":tres", $datos["tres"], PDO::PARAM_INT);
		$stmt->bindParam(":cuatro", $datos["cuatro"], PDO::PARAM_STR);
        $stmt->bindParam(":cinco", $datos["cinco"], PDO::PARAM_INT);
        if($datos["seisA"] == 1)
            $stmt->bindParam(":seis", $datos["seis"], PDO::PARAM_STR);
        if($datos["sieteA"] == 1)
		    $stmt->bindParam(":siete", $datos["siete"], PDO::PARAM_STR);
        $stmt->bindParam(":ocho", $datos["ocho"], PDO::PARAM_INT);
        if($datos["ocho"] > 0)
            $stmt->bindParam(":nueve", $datos["nueve"], PDO::PARAM_STR);
        $stmt->bindParam(":diez", $datos["diez"], PDO::PARAM_STR);
        $stmt->bindParam(":once", $datos["once"], PDO::PARAM_STR);
        $stmt->bindParam(":doce", $datos["doce"], PDO::PARAM_STR);
        if($datos["treceA"] == 1)
		    $stmt->bindParam(":trece", $datos["trece"], PDO::PARAM_STR);

		if($stmt->execute()){
            $ultimo_id = $conexion->lastInsertId();
            $usuario = $_SESSION['identificador'];

			$stmt = $conexion->prepare("INSERT INTO nutrifitness_alimentacion(id_usuario,fecha) VALUES ($usuario,NOW())");		
            if(!$stmt->execute())
                return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error'));//"No se realizó el registro, intentelo nuevamente";

			$stmt = $conexion->prepare("INSERT INTO nutrifitness_composicion(id_usuario,fecha) VALUES ($usuario,NOW())");		
            if(!$stmt->execute())
                return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error'));//"No se realizó el registro, intentelo nuevamente";

			$stmt = $conexion->prepare("INSERT INTO nutrifitness_laboratorio(id_usuario,fecha) VALUES ($usuario,NOW())");		
            if(!$stmt->execute())
                return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error'));//"No se realizó el registro, intentelo nuevamente";

            $stmt = $conexion->prepare("INSERT INTO nutrifitness_fisica_evaluacion(id_usuario,fecha) VALUES ($usuario,NOW())");		
            if(!$stmt->execute())
                return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error'));//"No se realizó el registro, intentelo nuevamente";
            
            $stmt = $conexion->prepare("INSERT INTO nutrifitness_fisica_plan(id_usuario,fecha) VALUES ($usuario,NOW())");		
            if(!$stmt->execute())
                return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error'));//"No se realizó el registro, intentelo nuevamente";
            
            return json_encode(array('error'=>false,'mensaje'=>'El registro se realizó correctamente','Bienvenido al programa Nutrifitness'=>'','tipo'=>'success'));
		}
		else
            return json_encode(array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error'));//"No se realizó el registro, intentelo nuevamente";
		$stmt->close();
	}

    public static function verificarRegistro($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$_SESSION['identificador'], PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();
    }

    static public function totalRegistrosNutrifitness($tabla){
		$statement = Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla");
        $statement->execute();
        return $statement->fetch()[0];
        $statement->close();
    }

    #BUSCAR CORREOS DE USUARIOS EN "ADMINISTAR USUARIOS"
	#------------------------------------------------------------
	public static function buscarUsuariosNutrifitness($data,$limit,$tabla,$tabla2){
		$consulta = " WHERE situacion = 1";
		if($data['sucursal'] != 0){
            if($data['sucursal'] == 1)
                $consulta.= " AND id_sucursal IN (1,2,3,4,5,6,7,8,9)";
            if($data['sucursal'] == 2)
                $consulta.= " AND id_sucursal IN (13,14,15)";
            if($data['sucursal'] == 3)
                $consulta.= " AND id_sucursal = 21";
            if($data['sucursal'] == 4)
                $consulta.= " AND id_sucursal = 17";
        }
			
		if(!empty($data['nombreBuscar'])){
			$cadena = $data['nombreBuscar'];
			$consulta .=" AND (CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$cadena%' COLLATE utf8_general_ci OR correo LIKE '%$cadena%')";
		}
			
		$stmt = Conexion::conectar()->prepare("SELECT $tabla.id_usuario,$tabla.vistoNutricion,$tabla.vistoFisico,nombre,paterno,materno,correo,id_sucursal,imagen FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_usuario $consulta ORDER BY nombre $limit");
		
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
    }
    
    public static function datosUsuario($id,$tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla.nombre,paterno,materno,fecha_nacimiento,imagen,$tabla2.nombre AS sucursal,genero FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
    }

    public static function visto($id,$tabla){
        $quienAccede='';
        if($_SESSION['identificador'] == 357)
            $quienAccede='vistoNutricion';
        else if($_SESSION['identificador'] == 358)
            $quienAccede='vistoFisico';
        else
            return;
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $quienAccede=1 WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
        return;
        $stmt -> close();
    }

    public static function datos($id,$tabla,$flag=true){
        $consulta='';
        if($flag)
            $consulta = 'ORDER BY id DESC';
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :usuario $consulta");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
    }

    public static function actualizarFormularioPlanAlimenticio($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		leche1 = :leche1, 
        cereales1 =:cereales1,
        leguminosas1 = :leguminosas1,
        carnes1 = :carnes1,
        frutas1 = :frutas1,
        verduras1 = :verduras1,
        grasas1 = :grasas1,
        leche2 = :leche2, 
        cereales2 =:cereales2,
        leguminosas2 = :leguminosas2,
        carnes2 = :carnes2,
        frutas2 = :frutas2,
        verduras2 = :verduras2,
        grasas2 = :grasas2,
        leche3 = :leche3, 
        cereales3 =:cereales3,
        leguminosas3 = :leguminosas3,
        carnes3 = :carnes3,
        frutas3 = :frutas3,
        verduras3 = :verduras3,
        grasas3 = :grasas3,
        colasiones = :colasiones
		WHERE id = :id");

        $stmt->bindParam(":leche1", $datosModel["leche1"], PDO::PARAM_STR);
        $stmt->bindParam(":leche2", $datosModel["leche2"], PDO::PARAM_STR);
        $stmt->bindParam(":leche3", $datosModel["leche3"], PDO::PARAM_STR);
         $stmt->bindParam(":cereales1", $datosModel["cereales1"], PDO::PARAM_STR);
        $stmt->bindParam(":cereales2", $datosModel["cereales2"], PDO::PARAM_STR);
        $stmt->bindParam(":cereales3", $datosModel["cereales3"], PDO::PARAM_STR);
        $stmt->bindParam(":leguminosas1", $datosModel["leguminosas1"], PDO::PARAM_STR);
        $stmt->bindParam(":leguminosas2", $datosModel["leguminosas2"], PDO::PARAM_STR);
        $stmt->bindParam(":leguminosas3", $datosModel["leguminosas3"], PDO::PARAM_STR);
        $stmt->bindParam(":carnes1", $datosModel["carnes1"], PDO::PARAM_STR);
        $stmt->bindParam(":carnes2", $datosModel["carnes2"], PDO::PARAM_STR);
        $stmt->bindParam(":carnes3", $datosModel["carnes3"], PDO::PARAM_STR);
        $stmt->bindParam(":frutas1", $datosModel["frutas1"], PDO::PARAM_STR);
        $stmt->bindParam(":frutas2", $datosModel["frutas2"], PDO::PARAM_STR);
        $stmt->bindParam(":frutas3", $datosModel["frutas3"], PDO::PARAM_STR);
        $stmt->bindParam(":verduras1", $datosModel["verduras1"], PDO::PARAM_STR);
        $stmt->bindParam(":verduras2", $datosModel["verduras2"], PDO::PARAM_STR);
        $stmt->bindParam(":verduras3", $datosModel["verduras3"], PDO::PARAM_STR);
        $stmt->bindParam(":grasas1", $datosModel["grasas1"], PDO::PARAM_STR);
        $stmt->bindParam(":grasas2", $datosModel["grasas2"], PDO::PARAM_STR);
        $stmt->bindParam(":grasas3", $datosModel["grasas3"], PDO::PARAM_STR);
        $stmt->bindParam(":colasiones", $datosModel["colasiones"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id_registro"], PDO::PARAM_INT);

		return array('respuesta'=>$stmt->execute());//"Actualización exitosoa";
        $stmt->close();
        
    }
    
    public static function actualizarFormularioLaboratorio($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		colesterol = :colesterol, 
        glucosa =:glucosa,
        hdl = :hdl,
        ldl = :ldl,
        trigliceridos = :trigliceridos,
        comentarios = :comentarios
		WHERE id = :id");

        $stmt->bindParam(":colesterol", $datosModel["colesterol"], PDO::PARAM_STR);
        $stmt->bindParam(":hdl", $datosModel["hdl"], PDO::PARAM_STR);
        $stmt->bindParam(":ldl", $datosModel["ldl"], PDO::PARAM_STR);
        $stmt->bindParam(":glucosa", $datosModel["glucosa"], PDO::PARAM_STR);
        $stmt->bindParam(":trigliceridos", $datosModel["trigliceridos"], PDO::PARAM_STR);
        $stmt->bindParam(":comentarios", $datosModel["comentarios"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id_registro"], PDO::PARAM_INT);

		return array('respuesta'=>$stmt->execute());//"Actualización exitosoa";
        $stmt->close();
        
    }

    public static function actualizarFormularioPlanFisico($datosModel,$tabla){
        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        lunes_tiempo =:lunest,
        lunes_intensidad = :lunesi, 
        lunes = :lunes
       /* ,martes_tiempo = :martest,
        martes_intensidad = :martesi,
        martes = :martes, 
        miercoles_tiempo = :miercolest, 
        miercoles_intensidad = :miercolesi, 
        miercoles = :miercoles, 
        jueves_tiempo = :juevest, 
        jueves_intensidad = :juevesi,
        jueves = :jueves,
        viernes_tiempo = :viernest, 
        viernes_intensidad = :viernesi, 
        viernes = :viernes,
        sabado_tiempo = :sabadot,
        sabado_intensidad = :sabadoi,
        sabado = :sabado,
        domingo_tiempo = :domingot,
        domingo_intensidad = :domingoi,
        domingo = :domingo*/
		WHERE id = :id");

        $stmt->bindParam(":lunest", $datosModel["lunest"], PDO::PARAM_INT);
        $stmt->bindParam(":lunesi", $datosModel["lunesi"], PDO::PARAM_STR);
        $stmt->bindParam(":lunes", $datosModel["lunes"], PDO::PARAM_STR);
        /*$stmt->bindParam(":martest", $datosModel["martest"], PDO::PARAM_INT);
        $stmt->bindParam(":martesi", $datosModel["martesi"], PDO::PARAM_STR);
        $stmt->bindParam(":martes", $datosModel["martes"], PDO::PARAM_STR);
        $stmt->bindParam(":miercolest", $datosModel["miercolest"], PDO::PARAM_INT);
        $stmt->bindParam(":miercolesi", $datosModel["miercolesi"], PDO::PARAM_STR);
        $stmt->bindParam(":miercoles", $datosModel["miercoles"], PDO::PARAM_STR);
        $stmt->bindParam(":juevest", $datosModel["juevest"], PDO::PARAM_INT);
        $stmt->bindParam(":juevesi", $datosModel["juevesi"], PDO::PARAM_STR);
        $stmt->bindParam(":jueves", $datosModel["jueves"], PDO::PARAM_STR);
        $stmt->bindParam(":viernest", $datosModel["viernest"], PDO::PARAM_INT);
        $stmt->bindParam(":viernesi", $datosModel["viernesi"], PDO::PARAM_STR);
        $stmt->bindParam(":viernes", $datosModel["viernes"], PDO::PARAM_STR);
        $stmt->bindParam(":sabadot", $datosModel["sabadot"], PDO::PARAM_INT);
        $stmt->bindParam(":sabadoi", $datosModel["sabadoi"], PDO::PARAM_STR);
        $stmt->bindParam(":sabado", $datosModel["sabado"], PDO::PARAM_STR);
        $stmt->bindParam(":domingot", $datosModel["domingot"], PDO::PARAM_INT);
        $stmt->bindParam(":domingoi", $datosModel["domingoi"], PDO::PARAM_STR);
        $stmt->bindParam(":domingo", $datosModel["domingo"], PDO::PARAM_STR);*/
        $stmt->bindParam(":id", $datosModel["id_registro"], PDO::PARAM_INT);
        
		return array('respuesta'=>$stmt->execute());//"Actualización exitosoa";
        $stmt->close();
        
    }
    

    public static function actualizarFormularioComposicion($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		peso = :peso, 
        estatura =:estatura,
        musculo = :musculo,
        imc = :imc,
        grasa_porcentaje = :grasa_porcentaje,
        grasa_kilos = :grasa_kilos,
        grasa_biceral = :grasa_biceral,
        comentarios = :comentarios,
        cintura = :cintura
		WHERE id = :id");

        $stmt->bindParam(":peso", $datosModel["peso"], PDO::PARAM_STR);
        $stmt->bindParam(":estatura", $datosModel["estatura"], PDO::PARAM_STR);
        $stmt->bindParam(":musculo", $datosModel["musculo"], PDO::PARAM_STR);
         $stmt->bindParam(":imc", $datosModel["imc"], PDO::PARAM_STR);
        $stmt->bindParam(":grasa_porcentaje", $datosModel["grasaPorcentaje"], PDO::PARAM_STR);
        $stmt->bindParam(":grasa_kilos", $datosModel["grasaKilos"], PDO::PARAM_STR);
        $stmt->bindParam(":grasa_biceral", $datosModel["grasaBiceral"], PDO::PARAM_STR);
        $stmt->bindParam(":comentarios", $datosModel["comentarios"], PDO::PARAM_STR);
        $stmt->bindParam(":cintura", $datosModel["cintura"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id_registro"], PDO::PARAM_INT);
        
        return array('respuesta'=>$stmt->execute());//"Actualización exitosoa";
        $stmt->close();
    }
    
    public static function actualizarDescripcionUsuario($data,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :comentarios WHERE id_usuario = :id");

        $stmt->bindParam(":comentarios", $data, PDO::PARAM_STR);
        $stmt->bindParam(":id", $_SESSION["identificador"], PDO::PARAM_INT);

		if($stmt->execute())
			return array('respuesta','ok ');//"Actualización exitosoa";
		else
			return array('respuesta','bad ');//"No se realizó la actualización, intentelo nuevamente";
        $stmt->close();
    }
    
    public static function descripcion($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT descripcion FROM $tabla WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
            return $stmt -> fetch()[0];
        $stmt -> close();
    }


    public static function actualizarFormularioEvaluacionFisica($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		fc_inicial = :fc_inicial, 
        fc_final =:fc_final,
        flexibilidad = :flexibilidad,
        fuerza = :fuerza,
        sentadillas = :sentadillas,
        comentarios = :comentarios
		WHERE id = :id");

        $stmt->bindParam(":fc_inicial", $datosModel["fc_inicial"], PDO::PARAM_INT);
        $stmt->bindParam(":fc_final", $datosModel["fc_final"], PDO::PARAM_INT);
        $stmt->bindParam(":flexibilidad", $datosModel["flexibilidad"], PDO::PARAM_STR);
        $stmt->bindParam(":fuerza", $datosModel["fuerza"], PDO::PARAM_STR);
        $stmt->bindParam(":sentadillas", $datosModel["sentadillas"], PDO::PARAM_INT);
        $stmt->bindParam(":comentarios", $datosModel["comentarios"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id_registro"], PDO::PARAM_INT);
		return array('respuesta'=>$stmt->execute());//"Actualización exitosoa";
        $stmt->close();
    }


    public static function cargarDocumento($datos,$tabla){
        

        $conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla 
		(fecha,
		titulo,
		descripcion,
		portada,
        documento) 
		VALUES 
		(NOW(),
		:titulo,
		:descripcion,
		:portada,
		:documento)
        ");		

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["nombre2"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["nombre"], PDO::PARAM_STR);
      
		if($stmt->execute())
            return array('error'=>false,'mensaje'=>'El registro se realizó correctamente','mensaje2'=>'','tipo'=>'success');
		else
            return array('error'=>true,'mensaje'=>'Ocurrio un error','mensaje2'=>'Intentalo nuevamente','tipo'=>'error');
		$stmt->close();
    }
    
    public static function talleres($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function verificarMiConsulta($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT colesterol FROM $tabla WHERE id_usuario = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();
    }

    public static function  mostrarEquipo($equipo,$tabla){
        if($equipo == 'LOS INCREIBLES')
            $equipo = "'250','256','257','259','261','265','336','348'";
        else if($equipo == 'TAPATIOS FIT')
            $equipo = "236,245,206,175,224,195,243,200,193,218,179,172,225,199,196,246,168,210,231,324";
        else if($equipo == 'TITANES DE ASESORES')
            $equipo = "244,188,185,184,228,208,189,248,181,185,180,207,305,219,223,191,242,204,187,217,201";
        else if($equipo == 'FITNESS SQUAD')
            $equipo = "190,215,241,239,198,197,307,171,202,212,233,249,251,237,346,232,240,235,182";
        else if($equipo == 'REGIOS FIT')
           $equipo = "'366','270','271','276','277','279','281','282','283','285','287','288','291','343','351'";
        else if($equipo == 'GOLDEN GIRLS')
            $equipo = "314,345,295,315,304,312,308,309,313";
        $stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno FROM $tabla WHERE id_usuario IN ($equipo) ORDER BY nombre,paterno,materno");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function actualizarVistos($data,$id,$tabla){
        $quienAccede='';
        $condicion='';

        if($_SESSION['identificador'] == 357)
            $quienAccede='vistoNutricion';
        else if($_SESSION['identificador'] == 358)
            $quienAccede='vistoFisico';

        $valor = $data=='true' ? 1 : 0;
        
        if($id !=0)
            $condicion = ' WHERE id_usuario = :registro';

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $quienAccede = :valor $condicion");
        $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
        if($id !=0)
            $stmt->bindParam(":registro", $id, PDO::PARAM_INT);
        $stmt->execute();
		return array('Response: '=> $id);
        $stmt->close();
    }

    /****************************************************************************************/
    public static function nuevoRegistro($id,$tabla){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO $tabla(id_usuario,fecha) VALUES (:user,NOW())");
        $stmt->bindParam(":user", $id, PDO::PARAM_INT);
        return array('error'=>!$stmt->execute(),"idRegistro"=>$conexion->lastInsertId());
        $stmt -> $conexion();
    }

    public static function totalRegistros($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM $tabla WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();
    }

    public static function getRegistro($id,$inicio,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :usuario ORDER BY id ASC LIMIT $inicio,1");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
    }

    public static function getGenero($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT genero FROM $tabla WHERE id_usuario = :usuario");
        $stmt->bindParam(":usuario",$id, PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();
    }

    public static function actualizarCandidatos($data,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        usuario1 = :usuario1,
        usuario2 = :usuario2,
        usuario3 = :usuario3,
        usuario4 = :usuario4,
        usuario5 = :usuario5,
        fecha = NOW()
        WHERE id_usuario = :id");

        $stmt->bindParam(":usuario1", $data['candidato1'], PDO::PARAM_INT);
        $stmt->bindParam(":usuario2", $data['candidato2'], PDO::PARAM_INT);
        $stmt->bindParam(":usuario3", $data['candidato3'], PDO::PARAM_INT);
        $stmt->bindParam(":usuario4", $data['candidato4'], PDO::PARAM_INT);
        $stmt->bindParam(":usuario5", $data['candidato5'], PDO::PARAM_INT);
        $stmt->bindParam(":id", $_SESSION['identificador'], PDO::PARAM_INT);
        
        return $stmt->execute();
        $stmt->close();
    }

    public static function mostrarCandidatos($categoria,$tabla,$tabla2){
        $usuario = "usuario".$categoria;
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(nombre,' ',paterno,' ',materno) AS nombre,$tabla2.id_usuario,imagen FROM $tabla INNER JOIN $tabla2 ON $tabla.$usuario =$tabla2.id_usuario WHERE $tabla.id_usuario = :usuario AND $tabla2.situacion = 1");
        $stmt->bindParam(":usuario",$_SESSION['identificador'], PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
    }

    public static function listaCandidatos($data,$tabla,$tabla2){
        $where = ' situacion = 1';
        
        if($data['candidato'] != ""){
            $cadena = $data['candidato'];
            $where .=" AND CONCAT_WS(' ',$tabla.nombre,paterno,materno) LIKE '%$cadena%' COLLATE utf8_general_ci";
        }
        if($data['sucursal'] != 0)
            $where .= " AND $tabla.id_sucursal =".intval($data['sucursal']);

        $stmt = Conexion::conectar()->prepare("SELECT id_usuario, CONCAT($tabla.nombre,' ',paterno,' ',materno) AS nombre,$tabla2.nombre AS sucursal FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal WHERE $where ORDER BY $tabla2.nombre,$tabla.nombre,paterno,materno");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function verificarSiExisteUsuario($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla WHERE id_usuario = :id");
        $stmt->bindParam(":id",$_SESSION['identificador'], PDO::PARAM_INT);	
        $stmt -> execute();
        return $stmt -> fetch()[0];
        $stmt -> close();
    }

    public static function agregarVotante($tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario) VALUES(:id)");
        $stmt->bindParam(":id",$_SESSION['identificador'], PDO::PARAM_INT);	
        return $stmt -> execute();
        $stmt -> close();
    }
    
}
