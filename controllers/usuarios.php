<?php


class gestionUsuarios{

	#REGISTRO DE USUARIOS---usuario Nuevo
	#------------------------------------
	public static function registroUsuarioController($usuario,$valor,$privilegios){
	
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["nombre"]))
			return 1;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["paterno"]))
			return 2;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["materno"]))
			return 3;
		if(!preg_match('/^[0-9]{1,2}$/', $usuario["sucursal"]))
			return 4;
		if(!preg_match('/^[0-9]{1,2}$/', $usuario["departamento"]))
			return 5;
		if(!preg_match('/^[0-9]{1,3}$/', $usuario["puesto"]))
			return 6;
		if(!preg_match('/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/', $usuario["fechaIngreso"]))
			return 7;
		if(!preg_match('/^[0-9]{1,5}$/', $usuario["jefe"]))
			return 'Debes seleccionar el jefe inmediato';
		if(!preg_match('/^[0-9a-zA-Z]{18}$/', $usuario["curp"]))
			return 8;
		if(!preg_match('/^[0-9a-zA-Z]{13}$/', $usuario["rfc"]))
			return 9;
		if(!preg_match('/^[0-9]{11}$/', $usuario["seguroSocial"]))
			return 10; 
		if(!preg_match('/^[0-9]{1,}$/', $usuario["lugarNacimiento"]))
			return 11;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]+$/', $usuario["municipios"]))
			return 12;
		if(!preg_match('/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/', $usuario["fechaNacimiento"]))
			return 13;
		if(!preg_match('/^[0-9]{1}$/', $usuario["estadoCivil"]))
			return 14;
		if(!preg_match('/^[0-9]{1}$/', $usuario["escolaridad"]))
			return 15;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s-]{2,}$/', $usuario["domicilio"]))
			return 16;
		if(!preg_match('/^[0-9]{5}$/', $usuario["codigoPostal"]))
			return 17;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.]{2,}$/', $usuario["municipio"]))
			return 18;
		if(!preg_match('/^[()a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.-]{2,}$/', $usuario["colonia"]))
			return 19;
		if(!preg_match('/^[0-9]{1}$/', $usuario["infonavit"]))
			return 20;
		if(!preg_match('/^[0-9]{1}$/', $usuario["fonacot"]))
			return 21;
		if(!preg_match('/^[0-9()\s-]{14}$/', $usuario["usuarioMovil"]))
			return 22;
		/****************************CAMPOS PROPORCIONADOS POR SISTEMAS***********************************/
		
		if(!empty($usuario["usuario"])){
			if(!preg_match('/^[a-zA-Z0-9-_]{2,}$/', $usuario["usuario"]))
				return 24;
		}

		if(!empty($usuario["correo"])){
			if(!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $usuario["correo"]))
				return 25;
		}

		if(!empty($usuario["contrasena"])){
			if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}$/', $usuario["contrasena"]))
				return 26;
			$encriptar = Llaves::password($usuario["contrasena"]);	
			$actualizar['passNueva'] = $encriptar;
			$actualizar['identificador'] = $valor;
			Datos::cambiarPassModel($actualizar, "usuarios_ae");
		}

		if(!empty($usuario["tipoUsuario"])){
			if(!preg_match('/^[0-9]{1}$/', $usuario["tipoUsuario"]))
				return 27;
		}
		/******************************************************************************************************/

		if(empty($usuario["usuarioFijo"])){
			$usuario["usuarioFijo"] = NULL;
		}
		else if(!preg_match('/^[0-9()\s-]{14}$/', $usuario["usuarioFijo"])) {
			return 23; //agregar alerta
		}
		if(empty($usuario["contacto"])){
			$usuario["contacto"] = NULL;
		}
		else if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["contacto"])) {
			return 28; //agregar alerta
		}

		if(empty($usuario["parentesco"])){
			$usuario["parentesco"] = NULL;
		}
		else if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["parentesco"])) {
			return 29; //agregar alerta
		}

		if(empty($usuario["contactoMovil"])){
			$usuario["contactoMovil"] = NULL;
		}
		else if(!preg_match('/^[0-9()\s-]{14}$/', $usuario["contactoMovil"])) {
			return 30; //agregar alerta
		}

		if(empty($usuario["contactoFijo"])){
			$usuario["contactoFijo"] = NULL;
		}
		else if(!preg_match('/^[0-9()\s-]{14}$/', $usuario["contactoFijo"])) {
			return 31; //agregar alerta
		}

		if(!empty($usuario["contacto"]) && empty($usuario["parentesco"]) ){
			return 32; //31 Captura el parentesco del contacto de emergencia con el empleado
		}

		else if(empty($usuario["contacto"]) && !empty($usuario["parentesco"])){
			return 33;//28 agregar alerta, Captura el nombre del contacto de emergencia
		}

		else if(empty($usuario["parentesco"]) && (!empty($usuario["contactoMovil"])  || !empty($usuario["contactoFijo"]))){
			return 34;//29 agregar alerta, Captura el parentesco del contacto de emergencia
		}

		else if(!empty($usuario["parentesco"]) && empty($usuario["contactoMovil"])  && empty($usuario["contactoFijo"])){
			return 35;// 30 , Selecciona al menos un telefono de contacto
		}

		/*campos añadidos al final */
		if(!preg_match('/^[FM]{1}$/', $usuario["genero"]))
			return 40  ;
		if(!preg_match('/^[0-9]{1}$/', $usuario["hijos"]))
			return 41  ;
		if(!preg_match('/^[OAB+-]{2,3}$/', $usuario["sangre"]))
			return 42  ;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ,.()\s]{2,}$/', $usuario["alergias"]))
			return 43  ;

		$existeImagen = Datos::imagenActualizarRegistro($valor,'usuarios_ae');


		if(!empty($usuario["nombreImagen"])){
			$sizeMax = 2; // en MB
			if($usuario["tamano"] > $sizeMax * 1024 * 1024){
				return 'La imagen tiene un tamaño mayor al permitido';
			}
			$extensionImagen = explode("/",$usuario["tipoImagen"]);//image/jpg o image/png
			$extensionImagen = $extensionImagen[1];
			if($extensionImagen == "jpeg")
				$extensionImagen = "jpg";
			if($extensionImagen == 'jpg' || $extensionImagen == 'png'){

				if($valor == 0 || $existeImagen == ""){//si el registro es nuevo o sí se quiere actualizar y no se habia asignado una imagen al usuario, entonces generamos un nombre para el archivo
					$aleatorio = mt_rand(100,9999);//en caso de que coincidan los appellidos de 2 empleados
					$paterno = str_replace(' ', '', $_POST["paterno"]);
					$materno = str_replace(' ', '', $_POST["materno"]);
					$paterno = mb_strtoupper($paterno,'utf-8');
					$materno = mb_strtoupper($materno,'utf-8');
					$nombreArchivo = $paterno.$materno.$aleatorio;
					$nombreArchivo = self::quitar_tildes($nombreArchivo).'.'."jpg";
				}
				else{//si actualizamos y sí se tiene asignada una imagen, entonces mantendremos el nombre del archivo
					$nombre_sin_extension = explode(".",$existeImagen);
					$nombreArchivo = $nombre_sin_extension[0].'.'."jpg";
				}
					
				$ruta = "../views/imagenes-usuarios/".$nombreArchivo;
				$rutaMini = "../views/imagenes-usuarios/mini/".$nombreArchivo;

				if($extensionImagen == "jpg")
					$origen = imagecreatefromjpeg($usuario["temporalImagen"]);
				else if($extensionImagen == "png")
					$origen = imagecreatefrompng($usuario["temporalImagen"]);

				$x = imagesx($origen);  
				$y = imagesy($origen);  

				$normal = imagecreatetruecolor(920,920);  /////
				imagecopyresized($normal, $origen, 0, 0, 0, 0, 920, 920, $x, $y);  ////////

				$mini = imagecreatetruecolor(200,200);  
				imagecopyresized($mini, $origen, 0, 0, 0, 0, 200, 200, $x, $y);  
								
				if($extensionImagen== "jpg"){
					//imagejpeg($origen, $ruta);
					imagejpeg($normal, $ruta);
					imagejpeg($mini, $rutaMini);
		
				}
				else if($extensionImagen == "png"){
					//imagepng($origen, $ruta);
					imagepng($normal, $ruta);
					imagepng($mini, $rutaMini);
				}
		

						
				/*if($extensionImagen== "jpg")
					imagejpeg($origen, $ruta);
				else if($extensionImagen == "png")
					imagepng($origen, $ruta);*/
			}
			else{
				return 36; //'El archivo debe ser una imagen en formato .jpg, .jpeg o .png';
			}
		}
		else{	
				if($existeImagen != "" )//ya existe una imagen y no se quiere actualizar
						$nombreArchivo = $existeImagen;
				else
					$nombreArchivo = NULL;
		}

		$usuario["nombreImagen"] = $nombreArchivo;
				
		if($valor == 0){//registro nuevo
			$respuesta = Datos::registroUsuarioModel($usuario, "usuarios_ae");
		}
		else if($valor != 0){//actualizar
			$respuesta = Datos::actualizarUsuarioModel($usuario,$valor,"usuarios_ae");
		}

		return $respuesta;
	}

	#CAMBIAR CONTRASEÑA USUARIOS
	#------------------------------------
	public function cambiarPassController($usuario){
		if(!preg_match('/^[a-z0-9]{32}$/', $usuario["passActual"]) || !preg_match('/^[a-z0-9]{32}$/', $usuario["passNueva"]) || !preg_match('/^[a-z0-9]{32}$/', $usuario["passConfirmacion"]))
			return 5;//no cumplen con el formato requerido
		else{
				if($usuario["passNueva"] === $usuario["passConfirmacion"]){
					$usuario['identificador'] = $_SESSION['identificador'];
					$respuesta = Datos::obtenerPassModel($usuario['identificador'], "usuarios_ae");
					$encriptar = Llaves::password($usuario['passActual']);
					if($respuesta['contrasena'] === $encriptar){
						$encriptar = Llaves::password($usuario['passNueva']);
						$usuario['passNueva'] = $encriptar;
						$respuesta = Datos::cambiarPassModel($usuario, "usuarios_ae");
						return $respuesta;
					}
					else
						return 2;//'La contraseña actual no coincide con la que se tiene registrada';
				}
				else
					return 1;//'La nueva contraseña y la confirmación no coincide';//$respuesta;	
		}
	}


	#CAMBIAR CONTRASEÑA USUARIOS DESDE ADMINISTRADOR
	#------------------------------------
	public function cambiarPass2Controller($usuario){
		if(!preg_match('/^[a-z0-9]{32}$/', $usuario["passNueva"])){
			return 0;//no cumplen con el formato requerido
		} 
		if( preg_match('/^[a-z0-9]{32}$/', $usuario["passNueva"])){
			$encriptar = Llaves::password($usuario['passNueva']);
			$usuario['passNueva'] = $encriptar;
			$respuesta = Datos::cambiarPassModel($usuario, "usuarios_ae");
			return $respuesta;
		}
		else{
			return 1;//'Verifica que los campos sólo contengan números y letras';
		}
	}

	#CONTAR USUARIOS PARA PAGINADOR
	#------------------------------------------------------------
	public static function contarUsuariosPaginadorController($datos,$limit){
		$respuesta = Datos::buscarUsuariosModel($datos,$limit,"usuarios_ae");
		return count($respuesta);
	}
	#MOSTRAR TODOS LOS USUARIOS
	#------------------------------------------------------------
	public function buscarUsuariosController($datos,$limit){
		$cadena='';	
		$estado = $_SESSION['identificador2'] == Configuraciones::administrador() ? '' : ' disabled';
		$respuesta = Datos::buscarUsuariosModel($datos,$limit,"usuarios_ae");
		$colorFila= true;
		$contador = self::indice($limit);
		foreach ($respuesta as $row => $item){
			$situacion = $item["situacion"]==1 ? '' : 'disabled';
			$cadena.='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_usuario"].'">
					<div class="campoId"><span class="max-min"><img class="botonMaxMin" src="views/img/circle-max.png" height="25" width="25"></span>'.$contador.'</div>
					<div class="campoNombre">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>
					<div class="campoSucursal">'.Sucursales::traducirSucursalesModel($item["id_sucursal"],"sucursales_ae").'</div>
					<div class="campoAcceso divContenedorHijo"><span class="spanOcultoTelefono"><b>Acceso: </b></span>'.Datos::traducirUsuariosModel($item["tipo_acceso"]).'</div>
					<div class="campoOpciones1 divContenedorHijo"><button class="btn btn-success mostrarUsuario" data-toggle="modal" data-target="#exampleModalCenter"><span class="spanOcultarTextoMostrar">Mostrar</span><span class="spanOcultarTextoMostrar2"><i class="fa fa-eye bigIcon"></i></span></button></div>
					<div class="campoOpciones3 divContenedorHijo"><button class="btn btn-warning actualizarPassUsuario" data-toggle="modal" data-target="#exampleModalCenter2"  '.$situacion.$estado.' ><span class="spanOcultarTextoContrasena">Contraseña</span><span class="spanOcultarTextoContrasena2"><i class="fa fa-lock bigIcon"></i></span></button></div>
					<div class="campoOpciones2 divContenedorHijo"><button class="btn btn-danger borrarUsuario" '. $situacion .'><span class="spanOcultarTextoEliminar">Eliminar</span><span class="spanOcultarTextoEliminar2"><i class="fa fa-times bigIcon"></i></span></button></div>
				</div>';
			$contador++;
		}
		return $cadena;
	}

	public static function indice($limit){ //ejem. 'LIMIT 0,20'
		$limit=explode(" ",$limit);
		$limit=explode(",",$limit[2]);
		$contador=($limit[0]/$limit[1]) + 1;
		if($contador > 1 )
			$contador = ($limit[1] * ($contador - 1)) + 1;
		return $contador;
	}

	#CONTAR USUARIOS-CORREOS PARA PAGINADOR
	#------------------------------------------------------------
	public static function contarCorreosPaginadorController($datos,$limit){
		$respuesta = Datos::buscarCorreosUsuariosModel($datos,$limit,"usuarios_ae");
		return count($respuesta);
	}
	#MOSTRAR TODOS LOS CORREOS DE LOS USUARIOS
	#------------------------------------------------------------
	public function buscarCorreosUsuariosController($data,$limit){
		$cadena='';
		$respuesta = Datos::buscarCorreosUsuariosModel($data,$limit,"usuarios_ae");
		$colorFila= true;
		$contador=self::indice($limit);
		foreach ($respuesta as $row => $item){
			if($item["correo"] === 'recepcionaura2@asesoresempresariales.com.mx')
				$item["correo"] = 'recepcionaura@asesoresempresariales.com.mx';
			if($item["correo"] === 'giro2@asesoresempresariales.com.mx')
				$item["correo"] = 'giro@asesoresempresariales.com.mx';
			$item["imagen"] = $item["imagen"] != NULL ? 'imagenes-usuarios/'.$item["imagen"] : 'img/user.png';
		$cadena .='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_usuario"].'">
				<div class="campoId"><span class="max-min"><img class="botonMaxMin" src="views/img/circle-max.png" height="25" width="25"></span>'.$contador.'</div>
				<div class="campoNombre">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>
				<div class="campoSucursal">'.$item["correo"].'</div>
				<div class="campoDireccion divContenedorHijo"><button class="btn btn-success mostrarUsuarioCorreos" data-toggle="modal" data-target="#ModalCenterCorreos"><span class="spanOcultarTextoMostrar">Mostrar</span><span class="spanOcultarTextoMostrar2"><i class="fa fa-eye bigIcon"></i></span></button></div>
			</div>';
			$contador++;
		}
		return $cadena;
	}
	
	#MOSTRAR UN SOLO USUARIO VENTANA MODAL
	#------------------------------------------------------------
	public $id_usuario;
	public function  mostarUnicoRegistro(){
		session_start();
		if(!$_SESSION["validar"]){
			header("location:ingreso");
			exit();
		}
		require_once "../models/usuarios.php";
		require_once "../models/sucursales.php";
		require_once "../models/departamentosPuestos.php";
		require_once "../models/estados.php";
		require_once "permisos.php";
		require_once "../models/permisos.php";
		require_once "../models/config.php";
		$respuesta = Datos::mostrarUsuarioUnicoModel($this->id_usuario,"usuarios_ae");
		$jefeDirecto = Datos::mostrarJefe($this->id_usuario,Tablas::usuarios(),Tablas::jefe());
		//echo json_encode($respuesta);
		if($respuesta['hijos'] == 0)
			$respuesta['hijos'] = "NINGUNO";
		else if($respuesta['hijos'] == 9)
			$respuesta['hijos'] = "MÁS DE 8";
		$respuesta['genero'] = $respuesta['genero'] == "F" ? "FEMENINO" : "MASCULINO";
		$cadenaTxt = $respuesta['situacion'] == 1 ? '<b>Situación:</b> ACTIVO' : '<b>Situación:</b> INACTIVO';
		$imagenIcon = $respuesta['situacion'] == 1 ? '<span class="info-box-icon-mini bg-aqua"><i class="fa fa-user"></i></span>' : '<span class="info-box-icon-mini bg-red"><i class="fa fa-user-times"></i></span>';
		
		$salida = "";
				$salida .= '<div class="info-box-mini">
								'. $imagenIcon .'
								<div class="info-box-content-mini">
									<span> '. $cadenaTxt .' </span>
								</div>
							</div>
			
							<div role="tabpanel"> 
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active">
                                        <a href="#laboral" class="desactivarCalendario" aria-controls="laboral" role="tab" data-toggle="tab">Datos laborales</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#personal" class="desactivarCalendario" aria-controls="personal" role="tab" data-toggle="tab">Datos personales</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#intranet" class="desactivarCalendario" aria-controls="intranet" role="tab" data-toggle="tab">Intranet</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#emergencia" class="desactivarCalendario" aria-controls="emergencia" role="tab" data-toggle="tab">Contacto de emergencia</a>
									</li>';
		if($respuesta['situacion'] == 1 ){
				$salida.=			'<li role="presentation">
										<a href="#calendario" class="activarCalendario" aria-controls="calendario" role="tab" data-toggle="tab">Calendario</a>
									</li>';
		}
                $salida.=  		'</ul>
                                <div class="tab-content" style="margin-top: 1%;">
										

										<div role="tabpanel" class="tab-pane active" id="laboral">
											<div class="row" style="margin-top: 3%;">
                                                <div class="col-md-6">
													<span class="encabezadoDato">Nombre: </span>'.$respuesta['nombre'] .' '.$respuesta['paterno'].' '.$respuesta['materno'].'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Sucursal: </span>'.Sucursales::traducirSucursalesModel($respuesta["id_sucursal"],"sucursales_ae").'
												</div>
											</div>
											<br>
											<div class="row">
                                                <div class="col-md-6">
													<span class="encabezadoDato">Fecha de ingreso: </span>'.substr($respuesta['fecha_ingreso'],8,2).'-'.substr($respuesta['fecha_ingreso'],5,2).'-'.substr($respuesta['fecha_ingreso'],0,4) .'
												</div>
												<div class="col-md-6">';
				$salida.= $respuesta['situacion'] == 1 	? '<span class="encabezadoDato">Antiguedad: </span>'.self::antiguedad($respuesta['fecha_ingreso'],date ("Y-m-d")) : '<span class="encabezadoDato">Antiguedad: </span>'.self::antiguedad($respuesta['fecha_ingreso'],$respuesta['fecha_salida']) ;
				$salida.=						'</div>
											</div>';
		if($respuesta['situacion'] == 0 ){
				$salida.=					'<br>
											<div class="row">
                                                <div class="col-md-6">
													<span class="encabezadoDato">Fecha de salida: </span>'.substr($respuesta['fecha_salida'],8,2).'-'.substr($respuesta['fecha_salida'],5,2).'-'.substr($respuesta['fecha_salida'],0,4) .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Motivo de salida: </span>'.mb_strtoupper($respuesta['motivo_salida'],'utf-8') .'
												</div>
                                            </div>';
		}
				$salida.=					'<br>
											<div class="row">
                                                <div class="col-md-6">
													<span class="encabezadoDato">Departamento: </span>'.Departamentos::vistaDepartamentos2Model($respuesta['id_departamento'],"departamentos_ae") .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Puesto: </span>'.Departamentos::vistaPuestos2Model($respuesta['id_puesto'],"puestos_ae") .'
												</div>
											</div>
											<br>
											<div class="row">
                                                <div class="col-md-6">
													<span class="encabezadoDato">Identificador de usuario: </span>'.$respuesta['clave'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Jefe inmediato: </span>'.$jefeDirecto['nombre'].' '.$jefeDirecto['paterno'].' '.$jefeDirecto['materno'].'
												</div>
                                            </div>
										</div>




										<div role="tabpanel" class="tab-pane" id="personal">  

											<div class="row">
												<div class="col-md-12 encabezadoSeccion">
													<span>DATOS DE IDENTIFICACIÓN UNICA</span> <i class="fa fa-id-card bigIcon"></i>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">CURP: </span>'.$respuesta['curp'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">RFC: </span>'.$respuesta['rfc'] .'
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12">
													<span class="encabezadoDato">NSS: </span>'.$respuesta['nss'] .'
												</div>
											</div>
										


											<div class="row">
												<div class="col-md-12 encabezadoSeccion">
													<span>DATOS DE NACIMIENTO</span> <i class="fa fa-globe bigIcon"></i>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Estado: </span>'.mb_strtoupper(Estados::vistaEstadosModel($respuesta['estado_nacimiento'],"estados_ae"),'utf-8').'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Municipio: </span>'.$respuesta['municipio_nacimiento'] .'
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12">
													<span class="encabezadoDato">Fecha: </span>'.substr($respuesta['fecha_nacimiento'],8,2).'-'.substr($respuesta['fecha_nacimiento'],5,2).'-'.substr($respuesta['fecha_nacimiento'],0,4) .'
												</div>
											</div>
											
											
											<div class="row">
												<div class="col-md-12 encabezadoSeccion">
													<span>DATOS GENERALES</span> <i class="fa fa-info-circle bigIcon"></i>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Estado civil: </span>'.Datos::traducirSituacionCivilModel($respuesta['estado_civil']).'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Nivel de estudios: </span>'.Datos::traducirEscolaridadModel($respuesta['estudios']).'
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Hijos: </span>'.$respuesta['hijos'].'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Genero: </span>'.$respuesta['genero'].'
												</div>
											</div>
											


											<div class="row">
												<div class="col-md-12 encabezadoSeccion">
													<span>DOMICILIO ACTUAL</span> <i class="fa fa-home bigIcon"></i>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Calle y número: </span>'.$respuesta['domicilio'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Municipio: </span>'.$respuesta['municipio'] .'
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Colonia: </span>'.$respuesta['colonia'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Código postal: </span>'.$respuesta['codigo_postal'] .'
												</div>
											</div>
											


											<div class="row">
												<div class="col-md-12 encabezadoSeccion">
													<span>CREDITOS PARA VIVIENDA</span> <i class="fa fa-usd bigIcon"></i>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-12">
													<span class="encabezadoDato">Crédito Infonavit: </span>'.Datos::traducirViviendaModel($respuesta['infonavit_tiene']) .' 
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12">
													<span class="encabezadoDato">Crédito Fonacot: </span>'.Datos::traducirViviendaModel($respuesta['fonacot_tiene']).'
												</div>
											</div>



										
											<div class="row">
												<div class="col-md-12 encabezadoSeccion">
													<span>NÚMEROS DE CONTACTO</span> <i class="fa fa-phone bigIcon"></i>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Teléfono móvil: </span>'.$respuesta['telefono_movil'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Teléfono fijo: </span>'.$respuesta['telefono_fijo'] .'
												</div>
											</div>
											
										</div>
										



										<div role="tabpanel" class="tab-pane" id="intranet">  
											<div class="row" style="margin-top: 3%;">
												<div class="col-md-12">
													<span class="encabezadoDato">Permisos de acceso: </span>'.Datos::traducirUsuariosModel($respuesta["tipo_acceso"]).'
												</div>
											</div> 
											<br>
											<div class="row">
												<div class="col-md-12">
													<span class="encabezadoDato">Usuario: </span>'.$respuesta['usuario'] .'
												</div>
											</div>  
											<br>
											<div class="row">	
												<div class="col-md-12">
													<span class="encabezadoDato">Correo electrónico: </span>'.$respuesta['correo'] .'
												</div>
											</div>   
										</div>


										

										<div role="tabpanel" class="tab-pane" id="emergencia"> 

											<div class="row" style="margin-top: 3%;">
												<div class="col-md-6">
													<span class="encabezadoDato">Alergias: </span>'.$respuesta['alergias'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Tipo de sangre: </span>'.$respuesta['sangre'] .'
												</div>
											</div> 
											<br>
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Nombre de contacto: </span>'.$respuesta['nombre_contacto'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Parentesco: </span>'.$respuesta['parentesco'] .'
												</div>
											</div> 
											<br>
											<div class="row">
												<div class="col-md-6">
													<span class="encabezadoDato">Teléfono móvil: </span>'.$respuesta['contacto_movil'] .'
												</div>
												<div class="col-md-6">
													<span class="encabezadoDato">Teléfono fijo: </span>'.$respuesta['contacto_fijo'] .'
												</div>
											</div>
										</div>';
										
		if($respuesta['situacion'] == 1 ){
				$salida.=				'<div role="tabpanel" class="tab-pane" id="calendario" name="'.$this->id_usuario.'"> 
											<div class="row" style="margin-top: 2%;">
												<div class="col-md-6 col-xs-12">
													<div class="info-box">
														<span class="info-box-icon bg-aqua"><i class="fa fa-plane"></i></span>
														<div class="info-box-content">
															<span class="info-box-text"> Vacaciones</span></span>
															<span class="info-box-text"> Disfrutadas ( <span id="asignarAnio"></span> ): <span class="texto-marcador" id="asignarVaccaionesDisfrutadas"></span></span>
															<span class="info-box-text"> Disponibles:  <span class="texto-marcador" id="diasDisponibles_"></span></span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<div class="col-md-6 col-xs-12">
													<div class="info-box">
														<span class="info-box-icon bg-green"><i class="fa fa-plus-circle"></i></span>
														<div class="info-box-content">
															<span class="info-box-text"> Bonos Plus: </span>
															<span class="info-box-number" id="asiganarBonosPlus"></span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<div class="col-md-6 col-xs-12">
													<div class="info-box">
														<span class="info-box-icon bg-purple"><i class="fa fa-file-text-o"></i></span>
														<div class="info-box-content">
															<span class="info-box-text"> Permisos: </span>
															<span class="info-box-number" id="asignarPermisos"></span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<div class="col-md-6 col-xs-12">
													<div class="info-box">
														<span class="info-box-icon bg-red"><i class="fa fa-ban"></i></span>
														<div class="info-box-content">
															<span class="info-box-text"> Faltas: </span>
															<span class="info-box-number" id="asignarFaltas"></span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												</div>
												
												
												<div class="row">
													<div class="col-md-6 col-xs-12">
														<div class="info-box">
															<span class="info-box-icon bg-yellow"><i class="fa fa-question-circle-o"></i></span>
															<div class="info-box-content">
																<span class="info-box-text"> Por autorizar: </span>
																<span class="info-box-number" id="asignarPorAutorizar"></span>
															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<div class="col-md-6 col-xs-12" id="actualizarCalendario" name="'.$this->id_usuario.'">
													</div>
												</div>
												
						
											</div>
                                    	</div>';
				}


                $salida.=	   '</div>
							</div>';
		//echo $salida;
		$informacion = array("datos"=>$salida,"imagen"=>$respuesta["imagen"],"situacion"=>$respuesta['situacion']);
		echo json_encode($informacion);
	}

	#CALCULAR LA ANTIGUEDAD DEL PERSONAL
	#------------------------------------------------------------
	public function antiguedad($fechaInicio,$fechaFinal){

		$fecha_de_nacimiento = $fechaInicio; 
		$fecha_actual = $fechaFinal;//date ("Y-m-d"); 

		// separamos en partes las fechas 
		$array_nacimiento = explode ( "-", $fecha_de_nacimiento ); 
		$array_actual = explode ( "-", $fecha_actual ); 

		$anos =  $array_actual[0] - $array_nacimiento[0]; // calculamos años 
		$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses 
		$dias =  $array_actual[2] - $array_nacimiento[2]; // calculamos días 

		//ajuste de posible negativo en $días 
		if ($dias < 0) 
		{ 
			--$meses; 
			//ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual 
			switch ($array_actual[1]) { 
				case 1:     $dias_mes_anterior=31; break; 
				case 2:     $dias_mes_anterior=31; break; 
				case 3:  
						if (self::bisiesto($array_actual[0])) 
						{ 
							$dias_mes_anterior=29; break; 
						} else { 
							$dias_mes_anterior=28; break; 
						} 
				case 4:     $dias_mes_anterior=31; break; 
				case 5:     $dias_mes_anterior=30; break; 
				case 6:     $dias_mes_anterior=31; break; 
				case 7:     $dias_mes_anterior=30; break; 
				case 8:     $dias_mes_anterior=31; break; 
				case 9:     $dias_mes_anterior=31; break; 
				case 10:    $dias_mes_anterior=30; break; 
				case 11:    $dias_mes_anterior=31; break; 
				case 12:    $dias_mes_anterior=30; break; 
			} 

			$dias=$dias + $dias_mes_anterior; 
		} 

		//ajuste de posible negativo en $meses 
		if ($meses < 0) { 
			--$anos; 
			$meses=$meses + 12; 
		} 

		return "$anos año(s) con $meses mese(s) y $dias día(s)"; 
	}

	public function bisiesto($anio_actual){
		$bisiesto=false; 
			//probamos si el mes de febrero del año actual tiene 29 días 
			if (checkdate(2,29,$anio_actual)) { 
				$bisiesto=true; 
			} 
			return $bisiesto; 
	}

	#MOSTRAR UN SOLO USUARIO PARA ACTUALIZAR
	#------------------------------------------------------------
	public function  mostrarActualizarRegistro($idActualizar){
		$respuesta = Datos::mostrarUsuarioUnicoModel($idActualizar,"usuarios_ae");
		return $respuesta;	
	}


	#BORRAR USUARIO
	#------------------------------------
	public static function eliminarUsuariosController($dato){
			
		$html = '';
		$html.= '<form method="POST" style="margin-top: 2%;" id="formularioSalida">
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<label for="">Motivo de salida</label> <i class="fa fa-check-circle text-green"></i>
								<select class="form-control textoMay" name="motivoSalida" required>
									<option value=""></option>
									<option value="No existen posibilidades de desarrollo">No existen posibilidades de desarrollo</option>
									<option value="Competitividad salarial">Competitividad salarial</option>
									<option value="Sobrecarga laboral">Sobrecarga laboral</option>
									<option value="Falta de motivación">Falta de motivación</option>
									<option value="Mal ambiente laboral">Mal ambiente laboral</option>
									<option value="Problemas familiares">Problemas familiares</option>
									<option value="Otros">Otros</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<label for="">Fecha de salida</label> <i class="fa fa-check-circle text-green"></i>
								<input  class="form-control" type="date" name="fechaSalida" required>
							</div>
						</div>
					</div>
					<br>
					<div class="estilos-centrar">
						<button type="submit" id="guardarFormularioSalida" class="btn btn-success">Aceptar</button>
						<button type="button" id="cancelarFormularioSalida" class="btn btn-danger">Cancelar</button>  
					</div>
				</form>';
			echo $html;
	
			/*$respuesta = Datos::borrarUsuarioModel($dato, "usuarios_ae");
			return $respuesta;*/ // El usuario ya no se elimina, ahora solo cambia su estatis de activo a inactivo
	}


	public static function eliminarUsuarios2Controller($usuario,$motivo,$fecha){
		$contrasena = self::passAleatoria();
		$contrasena = Llaves::password($contrasena);
		$respuesta = Datos::borrarUsuario2Model($usuario,$motivo,$fecha,$contrasena,"usuarios_ae");
		return $respuesta;
	}

	#CUANDO ELIMINO A UN EMPLEADO(CAMBIO SU STATUS) GENERO UN PASS ALEATORIO
	public function passAleatoria(){ 
		$key = '';
		$pattern = '1234567890ABCDEFGHIJKLMNOUPQRSTUVWXYZ-*/%[^{]?¡&%$#!¡abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern)-1;
		for($i=0;$i < 25 ;$i++) 
			$key .= $pattern{mt_rand(0,$max)};
		return $key;
	}

	#SELECIONAR NOMBRE DE LA IMAGEN DEL USUARIO A BORRAR
	#------------------------------------
	public static function eliminarFotografiaUsuariosController($dato){
		$respuesta = Datos::borrarFotografiaUsuarioModel($dato, "usuarios_ae");
		return $respuesta;
	}

	#SELECIONAR JEFE INMEDIATO
	public static function jefeInmediato($id=0){
		$respuesta = Datos::jefeInmediato($id, "usuarios_ae");
		foreach($respuesta as $row => $item){
			if($id== $item["id"])
				echo'<option value="'.$item["id"].'" selected="selected">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
			else
				echo'<option value="'.$item["id"].'">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
		}
	}


	public function  obtenerJefeInmediato($id){
		$respuesta = Datos::obtenerJefeInmediato($id,"dependencias_jefe_ae");
		return $respuesta;	
	}


	#CAMBIAR IMAGEN DE PERFIL
	#------------------------------------
	public static function imagenPerfilController($datos){

		if(empty($datos["nombre"]))
			return 0;

		$sizeMax = 2; // en MB
		if($datos["tamano"] > $sizeMax * 1024 * 1024){
			return 2;
		}

		$extensionImagen = explode("/",$datos["tipo"]);//image/jpg o image/png
		$extensionImagen = $extensionImagen[1];

		if($extensionImagen === "jpeg")
			$extensionImagen = "jpg";

		if($extensionImagen !== 'jpg' && $extensionImagen !== 'png')
			return 1;

		$existeImagen = Datos::imagenActualizarRegistro($datos['identificador'],'usuarios_ae');
	
		if(empty($existeImagen)){
			
			$apellidos = Datos::datosAsignarNombreImagenModels($datos['identificador'],'usuarios_ae');
			$aleatorio = mt_rand(100,9999);//en caso de que coincidan los appellidos de 2 empleados
			$paterno = str_replace(' ', '', $apellidos["paterno"]);
			$materno = str_replace(' ', '', $apellidos["materno"]);
			$paterno = mb_strtoupper($paterno,'utf-8');
			$materno = mb_strtoupper($materno,'utf-8');
			$nombreArchivo = $paterno.$materno.$aleatorio;
			$nombreArchivo = self::quitar_tildes($nombreArchivo).'.'.$extensionImagen;
			$respuesta = Datos::actualizarNombreImagenModels($datos['identificador'],$nombreArchivo,'usuarios_ae');
			if($respuesta == 0)
				return;
			else{
				session_start();
				$_SESSION["imagen"] = $nombreArchivo;
			}			
		}
		else{
			$nombre_sin_extension = explode(".",$existeImagen);
			$nombreArchivo = $nombre_sin_extension[0].'.'.$extensionImagen;

			$respuesta = Datos::actualizarNombreImagenModels($datos['identificador'],$nombreArchivo,'usuarios_ae');
			if($respuesta == 0)
				return;
			else{
				session_start();
				$_SESSION["imagen"] = $nombreArchivo;
			}	

		}
		
		$ruta = "../views/imagenes-usuarios/".$nombreArchivo;
		$rutaMini = "../views/imagenes-usuarios/mini/".$nombreArchivo;

		if($extensionImagen === "jpg")
			$origen = imagecreatefromjpeg($datos["temporal"]);
		else if($extensionImagen === "png")
			$origen = imagecreatefrompng($datos["temporal"]);

		$x = imagesx($origen);  
		$y = imagesy($origen);  
		
		$normal = imagecreatetruecolor(920,920);  
		imagecopyresized($normal, $origen, 0, 0, 0, 0, 920, 920, $x, $y);

		$mini = imagecreatetruecolor(200,200);  
		imagecopyresized($mini, $origen, 0, 0, 0, 0, 200, 200, $x, $y);  

		
		if($extensionImagen== "jpg" || $extensionImagen== "jpeg"){
			imagejpeg($normal, $ruta);
			imagejpeg($mini, $rutaMini);
		}
		else if($extensionImagen == "png"){
			imagepng($normal, $ruta);
			imagepng($mini, $rutaMini);
		}

		return 3;
	}	

	#LISTA DE USUARIOS PARA REALIZAR PERMUTA DE GUARDIA
	#------------------------------------
	public static function usuariosPermutaControllers($dato){
		$lista = '';
		$sucursal='';
		$departamento='';
		$respuesta = Datos::usuariosPermutaModels($dato, "usuarios_ae");
		foreach($respuesta as $row => $item){
				if($item["id_usuario"] != $_SESSION['identificador'])
					$lista .= '<option value="'.$item["id_usuario"].'">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
				$sucursal = $item["id_sucursal"];
				$departamento = $item["id_departamento"];
		}

		/*if($sucursal == 1 AND ($departamento == 4 || $departamento == 2) ) { // en el caso de atención a clientes y comercial Aura 12
			$departamento = $departamento == 4 ? 2 : 4;
		}*/
			
		$verificarExcepciones = Datos::permutaExcepcion($sucursal,$departamento, "permuta_excepciones");//verificar usuarios de otras sucursales con los que se pueda hacer permuta, ejemplo: caso de Juan Monterrey
		if($verificarExcepciones){
			foreach($verificarExcepciones as $row => $item){
				$respuesta = Datos::usuariosPermutaExcepcion($item["id_usuario"], "usuarios_ae");
				$lista .= '<option value="'.$respuesta["id_usuario"].'">'.$respuesta["nombre"].' '.$respuesta["paterno"].' '.$respuesta["materno"].'</option>';
			}
		}
		

		return $lista;
	}

	public function quitar_tildes ($cadena) { //para que los nombres de imagenes no se guarden con palabras acentuadas
		$cadBuscar = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú","ñ","Ñ"); 
		$cadPoner = array("a", "A", "e", "E", "i", "I", "o", "O", "u", "U","n","N"); 
		$cadena = str_replace ($cadBuscar, $cadPoner, $cadena); 
		return $cadena; 
	} 


	public static function mostrarDatosEmpleadoAgenda($idEmpleado){
		$respuesta = Datos::mostrarDatosEmpleadoAgenda($idEmpleado,Tablas::usuarios());
		$sucursal = Sucursales::mostrarSucursalActualizarModel($respuesta["id_sucursal"],"sucursales_ae");
		$interior = ($sucursal["interior"] != "" || $sucursal["interior"] != null) ? ', No. INT. '.mb_strtoupper($sucursal["interior"],'utf-8') : "";
		if($respuesta["correo"] === 'recepcionaura2@asesoresempresariales.com.mx')
			$respuesta["correo"] = 'recepcionaura@asesoresempresariales.com.mx';
		if($respuesta["correo"] === 'giro2@asesoresempresariales.com.mx')
			$respuesta["correo"] = 'giro@asesoresempresariales.com.mx';
		$html='';
		$html.='<div class="row" style="margin-top: 3%;">
					<div class="col-md-12">
						<span class="encabezadoDato">Nombre: </span>'.$respuesta['nombre'] .' '.$respuesta['paterno'].' '.$respuesta['materno'].'
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Sucursal: </span>'.$sucursal['nombre'].'
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Departamento: </span>'.Departamentos::vistaDepartamentos2Model($respuesta["id_departamento"],"departamentos_ae").'
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Puesto: </span>'.Departamentos::vistaPuestos2Model($respuesta["id_puesto"],"puestos_ae").'
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Correo: </span>'.$respuesta["correo"].'
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Teléfono: </span>'.gestionSucursales::mostrarTelefonos2Controllers($sucursal["id_sucursal"]).'
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Extensión: </span>'.$respuesta["extension"].'
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<span class="encabezadoDato">Dirección: </span>'.mb_strtoupper($sucursal["calle"],'utf-8').', No. '.mb_strtoupper($sucursal["exterior"],'utf-8').$interior.', COLONIA: '.mb_strtoupper($sucursal["colonia"],'utf-8').', '.mb_strtoupper($sucursal["municipio"],'utf-8').', '.mb_strtoupper(gestionEstados::vistaEstadosControllers($sucursal["id_estado"]),'utf-8').', C.P. '.$sucursal["codigo"].'
					</div>
				</div>';

		echo json_encode(array('datos'=>$html,'imagen'=>$respuesta['imagen']));
	}

	public static function getFirma($dato){
		return Datos::getFirma($dato,Tablas::usuarios(),Tablas::puestos());
	}

}

/* Consulta para mostrar un registro*/
/************************************/
if(isset($_POST["idRegistro"])){ //cambiar al ajax
	$a = new gestionUsuarios();
	$a->id_usuario = $_POST["idRegistro"];
	$a->mostarUnicoRegistro();	
}


