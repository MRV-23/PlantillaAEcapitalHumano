<?php
require_once "conexion.php";
require_once "ConexionGiro.php";

class Datos{

	public static function seleccionarClave($curp){
        $stmt = ConexionGiro::conectar()->prepare("SELECT CLAVE FROM Supervisor_giro.Empprin WHERE CURP = '$curp'");
        $stmt -> execute();
			return $stmt -> fetch()[0];
        $stmt->close();	
	} 
	
	#NUEVOS USUARIOS
	#-------------------------------------
	public static function registroUsuarioModel($datosModel, $tabla){

		$respuestaGiro=self::seleccionarClave($datosModel["curp"]);
		if(empty($respuestaGiro))
			return 'No se puede obtener la clave de Giro, verifica que la CURP este correcta.';
		$conexion = Conexion::conectar();
		$stmt = $conexion->prepare("INSERT INTO $tabla 
		(clave,
		id_sucursal,
		id_departamento,
		id_puesto,
		nombre,
		paterno,
		materno,
		fecha_ingreso,
		curp,
		rfc,
		nss,
		estado_nacimiento,
		municipio_nacimiento,
		fecha_nacimiento,
		estado_civil,
		estudios,
		domicilio,
		codigo_postal,
		municipio,
		colonia,
		infonavit_tiene,
		fonacot_tiene,
		telefono_movil,
		telefono_fijo,
		imagen,
		nombre_contacto,
		parentesco,
		contacto_movil,
		contacto_fijo,
		genero,
		hijos,
		sangre,
		alergias) 
		
		VALUES 
		($respuestaGiro,
		:sucursal,
		:departamento,
		:puesto,
		:nombre,
		:paterno,
		:materno,
		:ingreso,
		:curp,
		:rfc,
		:nss,
		:estado,
		:municipio,
		:nacimiento,
		:estado_civil,
		:estudios,
		:domicilio,
		:codigo,
		:municipio2,
		:colonia,
		:infonavit,
		:fonacot,
		:celular,
		:telefono,
		:imagen,
		:contacto,
		:parentesco,
		:celular2,
		:telefono2,
		:genero,
		:hijos,
		:sangre,
		:alergias)");		

		$stmt->bindParam(":sucursal", $datosModel["sucursal"], PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $datosModel["departamento"], PDO::PARAM_INT);
		$stmt->bindParam(":puesto", $datosModel["puesto"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $datosModel["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $datosModel["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":ingreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":curp", $datosModel["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datosModel["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":nss", $datosModel["seguroSocial"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["lugarNacimiento"], PDO::PARAM_INT);
		$stmt->bindParam(":municipio", $datosModel["municipios"], PDO::PARAM_STR);
		$stmt->bindParam(":nacimiento", $datosModel["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_civil", $datosModel["estadoCivil"], PDO::PARAM_INT);
		$stmt->bindParam(":estudios", $datosModel["escolaridad"], PDO::PARAM_INT);
		$stmt->bindParam(":domicilio", $datosModel["domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datosModel["codigoPostal"], PDO::PARAM_STR);
		$stmt->bindParam(":municipio2", $datosModel["municipio"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":infonavit", $datosModel["infonavit"], PDO::PARAM_INT);
		$stmt->bindParam(":fonacot", $datosModel["fonacot"], PDO::PARAM_INT);
		$stmt->bindParam(":celular", $datosModel["usuarioMovil"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["usuarioFijo"], PDO::PARAM_STR);
		/*$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);*/
		$stmt->bindParam(":imagen", $datosModel["nombreImagen"], PDO::PARAM_STR);
		//$stmt->bindParam(":tipo", $datosModel["tipoUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":contacto", $datosModel["contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":parentesco", $datosModel["parentesco"], PDO::PARAM_STR);
		$stmt->bindParam(":celular2", $datosModel["contactoMovil"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono2", $datosModel["contactoFijo"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datosModel["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":hijos", $datosModel["hijos"], PDO::PARAM_STR);
		$stmt->bindParam(":sangre", $datosModel["sangre"], PDO::PARAM_STR);
		$stmt->bindParam(":alergias", $datosModel["alergias"], PDO::PARAM_STR);

		if($stmt->execute()){
			$ultimo_id = $conexion->lastInsertId();
			$stmt = $conexion->prepare("INSERT INTO usuarios_configuracion_ae(id_usuario,color_pantalla,menu_izquierdo,tamano_pantalla) VALUES ($ultimo_id,0,0,0)");
			$stmt->execute();
			/*if(!$stmt->execute())
				return 38;//"No se realizó el registro, intentelo nuevamente";*/
			$stmt = $conexion->prepare("INSERT INTO dependencias_jefe_ae(id_empleado,id_jefe) VALUES ($ultimo_id,:jefe)");	
			$stmt->bindParam(":jefe", $datosModel["jefe"], PDO::PARAM_INT);	
			$stmt->execute();
			/*if(!$stmt->execute())
				return 38;//"No se realizó el registro, intentelo nuevamente";*/
			$sucursal = Sucursales::traducirSucursalesModel($datosModel["sucursal"], Tablas::sucursales());
			$departamento =  Departamentos::vistaDepartamentos2Model($datosModel["departamento"],Tablas::departamentosIntranet());
			$puesto = Departamentos::vistaPuestos2Model($datosModel["puesto"],Tablas::puestos());
			self::informarSistemas(array("tipo"=>"ALTA","clave"=>$respuestaGiro,"nombre"=>$datosModel["nombre"].' '.$datosModel["paterno"].' '.$datosModel["materno"],"puesto"=>$puesto,"sucursal"=>$sucursal,"departamento"=>$departamento));

			return 37;//"Registro exitoso";
		}
		else
			return 38;//"No se realizó el registro, intentelo nuevamente";
		$conexion->close();
	}

	#ACTUALIZAR USUARIOS
	#-------------------------------------
	public static function actualizarUsuarioModel($datosModel, $id_usuario, $tabla){

		$validacionPrivilegios = intval(Configuraciones::administrador()); //verificamos que los siguientes campos sólo sistemas los pueda modificar

		if(intval($_SESSION["identificador2"]) !== $validacionPrivilegios){
			$validar=self::verificarAnteriores($id_usuario,$tabla);
			if($datosModel["usuario"] !== $validar['usuario'])
				return 24;
			if($datosModel["correo"] !== $validar['correo'])
				return 25;
			if($datosModel["tipoUsuario"] !== $validar['tipo_acceso'])
				return 27;
		}
		$conexion = Conexion::conectar();
		$stmt = $conexion->prepare("UPDATE $tabla SET 
		id_sucursal = :sucursal, 
		id_departamento = :departamento, 
		id_puesto = :puesto, 
		nombre = :nombre, 
		paterno = :paterno, 
		materno = :materno, 
		fecha_ingreso = :ingreso, 
		curp = :curp, 
		rfc = :rfc, 
		nss = :nss, 
		estado_nacimiento = :estado, 
		municipio_nacimiento = :municipio, 
		fecha_nacimiento = :nacimiento,
		estado_civil = :estado_civil,
		estudios = :estudios,
		domicilio = :domicilio,
		codigo_postal = :codigo,
		municipio = :municipio2,
		colonia = :colonia,
		infonavit_tiene = :infonavit,
		fonacot_tiene = :fonacot,
		telefono_movil = :celular,
		telefono_fijo = :telefono,
		correo = :correo,
		usuario = :usuario,
		tipo_acceso = :tipo,
		nombre_contacto = :contacto,
		parentesco = :parentesco,
		contacto_movil = :celular2,
		contacto_fijo = :telefono2,
		imagen = :imagen,
		genero = :genero,
		hijos = :hijos,
		sangre = :sangre,
		alergias = :alergias
		WHERE id_usuario = :id");

		$stmt->bindParam(":id", $id_usuario, PDO::PARAM_INT);
		$stmt->bindParam(":sucursal", $datosModel["sucursal"], PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $datosModel["departamento"], PDO::PARAM_INT);
		$stmt->bindParam(":puesto", $datosModel["puesto"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $datosModel["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $datosModel["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":ingreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":curp", $datosModel["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datosModel["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":nss", $datosModel["seguroSocial"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["lugarNacimiento"], PDO::PARAM_INT);
		$stmt->bindParam(":municipio", $datosModel["municipios"], PDO::PARAM_STR);
		$stmt->bindParam(":nacimiento", $datosModel["fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_civil", $datosModel["estadoCivil"], PDO::PARAM_INT);
		$stmt->bindParam(":estudios", $datosModel["escolaridad"], PDO::PARAM_INT);
		$stmt->bindParam(":domicilio", $datosModel["domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datosModel["codigoPostal"], PDO::PARAM_STR);
		$stmt->bindParam(":municipio2", $datosModel["municipio"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":infonavit", $datosModel["infonavit"], PDO::PARAM_INT);
		$stmt->bindParam(":fonacot", $datosModel["fonacot"], PDO::PARAM_INT);
		$stmt->bindParam(":celular", $datosModel["usuarioMovil"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["usuarioFijo"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
				//$stmt->bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datosModel["nombreImagen"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipoUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":contacto", $datosModel["contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":parentesco", $datosModel["parentesco"], PDO::PARAM_STR);
		$stmt->bindParam(":celular2", $datosModel["contactoMovil"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono2", $datosModel["contactoFijo"], PDO::PARAM_STR);

		$stmt->bindParam(":genero", $datosModel["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":hijos", $datosModel["hijos"], PDO::PARAM_STR);
		$stmt->bindParam(":sangre", $datosModel["sangre"], PDO::PARAM_STR);
		$stmt->bindParam(":alergias", $datosModel["alergias"], PDO::PARAM_STR);


		if($stmt->execute()){
			$stmt = $conexion->prepare("UPDATE dependencias_jefe_ae SET id_jefe = :jefe WHERE id_empleado = :usuario");
			$stmt->bindParam(":usuario", $id_usuario, PDO::PARAM_INT);	
			$stmt->bindParam(":jefe", $datosModel["jefe"], PDO::PARAM_INT);	
			$stmt->execute();
			return 39;//"Actualización exitosoa";
		}
			
		else
			return 38;//"No se realizó la actualización, intentelo nuevamente";
		$conexion->close();
	}

	#CAMBIAR CONTRASEÑA DE USUARIO
	#-------------------------------------
	public function obtenerPassModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT contrasena FROM $tabla WHERE id_usuario = :id_usuario");	
		$stmt->bindParam(":id_usuario", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function cambiarPassModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET contrasena = :contrasena WHERE id_usuario = :id_usuario");
		$stmt->bindParam(":contrasena", $datosModel["passNueva"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["identificador"], PDO::PARAM_INT);
		if($stmt->execute())
			return 3;//"Actualización exitosa";
		else
			return 4;//"No se realizó la actualización, intentelo nuevamente";
		$stmt->close();
	}


	#BUSCAR USUARIOS EN "ADMINISTAR USUARIOS"
	#------------------------------------------------------------
	public static function buscarUsuariosModel($datos,$limit,$tabla){

		$consulta = 'situacion = :situacion';
		
		if( $datos['sucursal'] != 0)
			$consulta .= ' AND id_sucursal = :sucursal';
		else if($respuesta=AccesoRHespecial::pertenece($_SESSION['identificador']))
			$consulta .= " AND id_sucursal IN ($respuesta)";


		if(!empty($datos['nombreBuscar'])){
			//$consulta .= ' AND (nombre LIKE "%'.$datos['nombreBuscar'].'%" COLLATE utf8_general_ci OR paterno LIKE "%'.$datos['nombreBuscar'].'%"  COLLATE utf8_general_ci OR materno LIKE "%'.$datos['nombreBuscar'].'%"  COLLATE utf8_general_ci)';
			$cadena = $datos['nombreBuscar'];
			$consulta .=" AND CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$cadena%' COLLATE utf8_general_ci";
		}
			
		
		$stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombre,paterno,materno,id_sucursal,tipo_acceso,situacion FROM $tabla WHERE $consulta ORDER BY nombre $limit");
		$stmt->bindParam(":situacion", $datos['situacion'], PDO::PARAM_INT);
		if( $datos['sucursal'] != 0)
			$stmt->bindParam(":sucursal", $datos['sucursal'], PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	#OBTENER EL TOTAL DE REGISTROS EN LOS MARCADORES, PARA USUARIOS ACTIVOS Y BAJA
	#------------------------------------------------------------
	static public function totalRegistros($tabla,$sucursal,$estado){
		$consulta = 'situacion = :situacion';
		if($sucursal != 0)
			$consulta .= ' AND id_sucursal = :sucursal';
		else if($respuesta=AccesoRHespecial::pertenece($_SESSION['identificador']))
			$consulta .= " AND id_sucursal IN ($respuesta)";

		$statement = Conexion::conectar()->prepare("SELECT COUNT(id_usuario) FROM $tabla WHERE $consulta");
		$statement->bindParam(":situacion", $estado, PDO::PARAM_INT);
		if($sucursal != 0)
			$statement->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch()[0];
    }

	#BUSCAR CORREOS DE USUARIOS EN "ADMINISTAR USUARIOS"
	#------------------------------------------------------------
	public static function buscarCorreosUsuariosModel($data,$limit,$tabla){
		$consulta = " WHERE situacion = 1";
		if($data['sucursal'] != 0)
			$consulta.= " AND id_sucursal = :sucursal";

		if(!empty($data['nombreBuscar'])){
			$cadena = $data['nombreBuscar'];
			//$consulta .= ' AND (nombre LIKE "%'.$data['nombreBuscar'].'%" COLLATE utf8_general_ci OR paterno LIKE "%'.$data['nombreBuscar'].'%"  COLLATE utf8_general_ci OR materno LIKE "%'.$data['nombreBuscar'].'%"  COLLATE utf8_general_ci OR correo LIKE "%'.$data['nombreBuscar'].'%"  COLLATE utf8_general_ci)';
			$consulta .=" AND (CONCAT_WS(' ',nombre,paterno,materno) LIKE '%$cadena%' COLLATE utf8_general_ci OR correo LIKE '%$cadena%')";
		}
			
		$stmt = Conexion::conectar()->prepare("SELECT id_usuario,nombre,paterno,materno,correo,id_sucursal,imagen FROM $tabla $consulta ORDER BY nombre $limit");
		if($data['sucursal'] != 0)
			$stmt->bindParam(":sucursal", $data['sucursal'] , PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}

	#MOSTRAR UNICO USUARIO
		#-------------------------------------
	public static function mostrarUsuarioUnicoModel($id_mostrar, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id");	
		$stmt->bindParam(":id", $id_mostrar, PDO::PARAM_INT);
		
		if($stmt -> execute()){
			return $stmt->fetch();
		}
		else{
			return "error";
		}
		$stmt ->close();
	}


	#MOSTRAR UNICO USUARIO EN ADMINISTRAR SOLICITUDES
		#-------------------------------------
		public static function mostrarUsuarioUnicoModel2($id_mostrar, $tabla){
			$stmt = Conexion::conectar()->prepare("SELECT  nombre, paterno, materno,id_sucursal,imagen,id_puesto, id_departamento,fecha_ingreso,id_usuario,clave FROM $tabla WHERE id_usuario = :id");	
			$stmt->bindParam(":id", $id_mostrar, PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt ->close();
		}

	#MOSTRAR CAMBIO DE SOLICITUD (VENTANA EMERGENTE)
	public static function mostrarUsuarioUnicoModel3($id_mostrar, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT  nombre, paterno, materno, imagen FROM $tabla WHERE id_usuario = :id");	
		$stmt->bindParam(":id", $id_mostrar, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt->fetch();
		$stmt ->close();
	}
	
	#TRADUCIR USUARIOS 
	#------------------------------------------------------------
	public static function traducirUsuariosModel($dato){
		$acceso = array('ESTANDAR','RECEPCIÓN','JEFATURA','GERENCIA','CONTRALORIA','ADMINISTRADOR');
		return $acceso[$dato-1];
	}

	#TRADUCIR USUARIO ESTADO CIVIL
	#------------------------------------------------------------
	public static function traducirSituacionCivilModel($dato){
		$situacionCivil = array("SOLTERO/A","CASADO/A", "UNIÓN LIBRE", "DIVORCIADO/A","VIUDO/A");
		return $situacionCivil[$dato-1];
	}

	#TRADUCIR USUARIO NIVEL DE ESTUDIOS
	#------------------------------------------------------------
	public static function traducirEscolaridadModel($dato){
		$escolaridad = array("PRIMARIA","SECUNDARIA", "BACHILLERATO","LICENCIATURA/INGENIERÍA","MAESTRÍA","DOCTORADO");
		return $escolaridad[$dato-1];
	}

	#TRADUCIR CREDITOS VIVIENDA
	#------------------------------------------------------------
	public static function traducirViviendaModel($dato){
		$escolaridad = array("NO CUENTA CON CREDITO","SÍ CUENTA CON CREDITO");
		return $escolaridad[$dato-1];
	}

	
	#REGRESA EL NOMBRE DE LA IMAGEN PARA ACTUALIZARLA
	#------------------------------------------------------------
	public function  imagenActualizarRegistro($idImagen,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT imagen FROM $tabla WHERE id_usuario = :usuario");	
        $stmt->bindParam(":usuario", $idImagen, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();	
	}

	#OBTENER APELLIDOS PARA ASIGNAR NOMBRE A LA IMAGEN DE PERFIL (EN CASO DE QUE NO SE LE HAYA ASIGNADO IMAGEN EN EL MOMENTO DEL REGISTRO)
	#------------------------------------------------------------
	public function  datosAsignarNombreImagenModels($idImagen,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT paterno,materno FROM $tabla WHERE id_usuario = :usuario");	
        $stmt->bindParam(":usuario", $idImagen, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();	
	}

	#ACTUALIZAR IMAGEN DE PERFIL
	#------------------------------------------------------------
	public function actualizarNombreImagenModels($idImagen,$nombre,$table){
		$stmt = Conexion::conectar()->prepare("UPDATE $table SET imagen = :imagen WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $idImagen, PDO::PARAM_INT);
		$stmt->bindParam(":imagen", $nombre, PDO::PARAM_STR);
		
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();	
	}

	#BORRAR USUARIO
	#------------------------------------
	public static function borrarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
			return 1;
		else
			return 0;
		$stmt->close();
	}

	public static function borrarUsuario2Model($usuario,$motivo,$fecha,$contrasena,$tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		contrasena= :pass,
		situacion = 0,
		correo = 'ninguno@asesoresempresariales.com.mx',
		usuario = 'ninguno',
		fecha_salida = :fecha_salida,
		motivo_salida = :motivo_salida
		WHERE id_usuario = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);
		$stmt->bindParam(":fecha_salida", $fecha, PDO::PARAM_STR);
		$stmt->bindParam(":motivo_salida", $motivo, PDO::PARAM_STR);
		$stmt->bindParam(":pass", $contrasena, PDO::PARAM_STR);
		
		if($stmt->execute()){
			$datosModel = self::getUsuario($usuario,Tablas::usuarios(),Tablas::sucursales(),Tablas::departamentosIntranet(),Tablas::puestos());
			$correo = self::informarSistemas(array("tipo"=>"BAJA",
										"clave"=>$datosModel["clave"],
										"nombre"=>$datosModel["nombre"],
										"puesto"=>$datosModel["puesto"],
										"sucursal"=>$datosModel["sucursal"],
										"departamento"=>$datosModel["departamento"]
										));
			return $correo;
		}
			
		else
			return 0;
		$stmt->close();
	}

	public static function getUsuario($id,$tabla,$tabla2,$tabla3,$tabla4){
		$stmt = Conexion::conectar()->prepare(" SELECT CONCAT($tabla.nombre,' ',paterno,' ',materno) AS nombre,clave,$tabla2.nombre AS sucursal,$tabla3.nombre AS departamento,$tabla4.nombre AS puesto
												FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal
															INNER JOIN $tabla3 ON $tabla.id_departamento = $tabla3.id_departamento
															INNER JOIN $tabla4 ON $tabla.id_puesto = $tabla4.id_puesto
												WHERE $tabla.id_usuario = :usuario");
		$stmt->bindParam(":usuario", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#SELECIONAR NOMBRE DE LA IMAGEN DEL USUARIO A BORRAR
	#-------------------------------------
	public static function borrarFotografiaUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT imagen FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	#SELECIONAMOS A LOS USUARIOS POSIBLES PARA REALIZAR PERMUTA
	#-------------------------------------
	public static function usuariosPermutaModels($dato,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,id_usuario,id_sucursal,id_departamento FROM $tabla WHERE id_sucursal = (SELECT id_sucursal FROM $tabla WHERE id_usuario = :usuario) AND id_departamento = (SELECT id_departamento FROM $tabla WHERE id_usuario = :usuario) AND situacion = 1 ORDER BY nombre");	
		$stmt->bindParam(":usuario", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function permutaExcepcion($sucursal,$departamento,$tabla){//obtenemos todos los id de los posibles usuarios para hacer permuta y que pertenecen a otras suscursales, casos especiales
		$stmt = Conexion::conectar()->prepare("SELECT id_usuario FROM $tabla WHERE id_sucursal = :sucursal AND id_departamento = :departamento");	
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_INT);
		$stmt->bindParam(":departamento", $departamento, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function usuariosPermutaExcepcion($dato,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,id_usuario FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function getNombre($dato,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT CONCAT(nombre,' ',paterno,' ',materno) AS nombre FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}

	public static function getNombre2($dato,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT CONCAT(nombre,' ',paterno,' ',materno) AS nombre,id_sucursal FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function getFirma($dato,$tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT CONCAT(U.nombre,' ',paterno,' ',materno) AS nombre,P.nombre AS puesto FROM $tabla AS U INNER JOIN $tabla2 AS P ON U.id_puesto = P.id_puesto  WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $dato, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	#SELECIONAMOS A LOS USUARIOS PARA ASIGNARLES UN EQUIPO DE CÓMPUTO
	#-------------------------------------
	public static function usuariosEquiposComputo($idSucursal,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,id_usuario FROM $tabla WHERE id_sucursal = :sucursal  AND situacion = 1 ORDER BY nombre");	
		$stmt->bindParam(":sucursal", $idSucursal, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#OBTENEMOS LA CURP PARA LA FIRMA ELECTRÓNICA
	#-------------------------------------
	public static function obtenerCurpModel($usuario,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT curp FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $usuario, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}


	#MUESTRO LOS DATOS DE EMPLEADO EN INTERFAZ CORREOS
	#-------------------------------------
	public static function mostrarDatosEmpleadoAgenda($idEmpleado,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno,correo,id_sucursal,id_departamento,id_puesto,imagen,extension FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $idEmpleado, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	
	#SELECIONAMOS A LOS USUARIOS POSIBLES PARA REALIZAR PERMUTA
	#-------------------------------------
	public static function verificarAnteriores($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT usuario,correo,tipo_acceso FROM $tabla WHERE id_usuario = :usuario");	
		$stmt->bindParam(":usuario", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

		
	#SELECIONAMOS A LOS USUARIOS POSIBLES PARA REALIZAR PERMUTA
	#-------------------------------------
	public static function mostrarJefe($id,$tabla,$tabla2){
		$stmt = Conexion::conectar()->prepare("SELECT nombre,paterno,materno FROM $tabla INNER JOIN $tabla2 ON $tabla.id_usuario = $tabla2.id_jefe WHERE id_empleado = :usuario");	
		$stmt->bindParam(":usuario", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	
	#-------------------------------------
	public static function jefeInmediato($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_usuario AS id, nombre,paterno,materno FROM $tabla WHERE situacion = 1 AND tipo_acceso > 2 AND id_usuario NOT IN (168,171,172) ORDER BY nombre,paterno,materno");	
		//$stmt->bindParam(":usuario", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function obtenerJefeInmediato($id,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_jefe FROM $tabla WHERE id_empleado = :usuario");	
		$stmt->bindParam(":usuario", $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch()[0];
		$stmt->close();
	}



	public static function informarSistemas($data){
		$para = 'helpdesk@asesoresempresariales.com.mx';
		$titulo = 'Sistema de Intranet Asesores Empresariales';
		$mensajeFinal ='
					<html>
						<head>
							<title>Actualización de usuarios</title>
						</head>
						<body>
							<h3>Te informamos que han ocurrido actualizaciones de personal en el sistema de Intranet de Asesores Empresariales!:</h3> 
							<br>
							<br>
							<p>Tipo: <h2>'.$data['tipo'].'</h2><p/>
							<p>Clave de GIRO: <b>'.$data['clave'].'</b></p>
							<p>Nombre: <b>'.$data['nombre'].'</b></p>
							<p>Sucursal: <b>'.$data['sucursal'].'</b></p>
							<p>Departamento: <b>'.$data['departamento'].'</b></p>
							<p>Puesto: <b>'.$data['puesto'].'</b></p>
							<br>
							<br>
							<hr>
							<h3><a href="http://www.intranet.asesoresempresariales.com.mx" target="blank">Asesores Empresariales</a></h3>
							<br>
							<img src="http://www.intranet.asesoresempresariales.com.mx/images/asesores.jpg">
						</body>
					</html>';
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$cabeceras .= 'From: <desarrollo@asesoresempresariales.com.mx>' . "\r\n";
		$cabeceras .= 'CC: <desarrollo@asesoresempresariales.com.mx>' . "\r\n"; 

		return mail($para, $titulo, $mensajeFinal, $cabeceras);
	}

}
