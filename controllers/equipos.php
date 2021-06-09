<?php

class EquiposComputo{

	#MOSTRAR SUCURSALES----en campos select
	#------------------------------------
	public static function marcaController(){
		$respuesta = EquiposModel::marcas("equipos_ae");
		$campo='<select class="form-control" id="marcaEquipo" name="marcaEquipo" required>';
		foreach($respuesta as $row => $item){
			$campo.='<option value="'.$item["marca"].'">'.$item["marca"].'</option>';
		}
		$campo.='</select>';
		return $campo;
	}

	public static function modeloController(){
		$respuesta = EquiposModel::modelos("equipos_ae");
		$campo='<select class="form-control" id="modeloEquipo" name="modeloEquipo"required>';
		foreach($respuesta as $row => $item){
			$campo.='<option value="'.$item["modelo"].'">'.$item["modelo"].'</option>';
		}
		$campo.='</select>';
		return $campo;
	}

	public static function usuariosController($sucursal, $usuario = 0){
		$respuesta=Datos::usuariosEquiposComputo($sucursal,'usuarios_ae');
		$campo='<select class="form-control textoMay" id="equipoUsuarioCargo" name="equipoUsuarioCargo" required>';
		foreach($respuesta as $row => $item){
			if($usuario == $item["id_usuario"])
				$campo.='<option value="'.$item["id_usuario"].'" selected="selected">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
			else
				$campo.='<option value="'.$item["id_usuario"].'">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';

		}
		$campo.='</select>';
		return $campo;
	}

	public static function usuariosController2($sucursal, $usuario = 0){
		$verificarSucursalLocal = Sucursales::verificarSucursalLocal($sucursal,'usuarios_ae','dependencias_sucursales_paqueteria_ae');
		$respuesta=Datos::usuariosEquiposComputo($sucursal,'usuarios_ae');
		$campo='<select class="form-control textoMay" id="equipoUsuarioCargo" name="equipoUsuarioCargo" required><option value="300'.$sucursal.'">En stock</option>';
		foreach($respuesta as $row => $item){
			if($usuario == $item["id_usuario"])
				$campo.='<option value="'.$item["id_usuario"].'" selected="selected">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';
			else
				$campo.='<option value="'.$item["id_usuario"].'">'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</option>';

		}
		$campo.='</select>';
		return json_encode(array('html'=>$campo,'verificarSucursalLocal'=>$verificarSucursalLocal));
	}

	public static function formularioController($datos,$equipo){
		if(!preg_match('/^[1-2]{1}$/', $datos["tipo"]))
			return array('status'=>'warning','mensaje'=>'Selecciona el tipo del equipo de cómputo','mensaje2'=>'');
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{2,}$/', $datos["marca"]))
			return array('status'=>'warning','mensaje'=>'Escribe la marca','mensaje2'=>'No utilices caracteres especiales');
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{3,}$/', $datos["modelo"]))
			return array('status'=>'warning','mensaje'=>'Escribe el modelo','mensaje2'=>'No utilices caracteres especiales');
		if(!preg_match('/^[a-zA-Z0-9-_.]{3,}$/', $datos["serie"]))
			return array('status'=>'warning','mensaje'=>'Escribe el número de serie','mensaje2'=>'No utilices caracteres especiales; sólo letras,números, guiones y puntos');
		if(!preg_match('/^[0-9.]{1,3}$/', $datos["ram"]))
			return array('status'=>'warning','mensaje'=>'Escribe la capacidad della memoria RAM','mensaje2'=>'No utilices caracteres especiales');
		if(!preg_match('/^[0-9]{1,3}$/', $datos["hd"]))
			return array('status'=>'warning','mensaje'=>'Escribe la capacidad del disco duro','mensaje2'=>'No utilices caracteres especiales');
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{3,}$/', $datos["userOS"]))
			return array('status'=>'warning','mensaje'=>'Escribe el nombre del usuario del Sistema Operativo','mensaje2'=>'No utilices caracteres especiales');
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.)(?*=¿\s]{2,}$/', $datos["userPass"]))
			return array('status'=>'warning','mensaje'=>'Escribe la contraseña del Sistema Operativo','mensaje2'=>'No utilices caracteres especiales');
		if( !empty($datos["user"])){
			if(!preg_match('/^[0-9]{1,5}$/', $datos["user"]))
			return array('status'=>'warning','mensaje'=>'Selecciona un usuario al cual vincular el equipo','mensaje2'=>'');
		}
		else{
			$datos["user"]=NULL;
		}

		if(empty($datos["usuarioVpn"]))
			$datos["usuarioVpn"]=NULL;
		if(empty($datos["passVpn"]))
			$datos["passVpn"]=NULL;
		if(empty($datos["servidorVpn"]))
			$datos["servidorVpn"]=NULL;
		if(empty($datos["usuarioLogmein"]))
			$datos["usuarioLogmein"]=NULL;
		if(empty($datos["passLogmein"]))
			$datos["passLogmein"]=NULL;


		if($equipo){
			$respuesta = EquiposModel::formularioModelActualizar($datos,$equipo,'equipos_ae','credenciales_servidores_ae');
			if($respuesta['status'] == 'success' AND !empty($datos["imagen"]["name"]))
				$respuesta = self::cargarImagen($datos["imagen"],$equipo);
			return $respuesta;
		}		  
		else{
			$respuesta = EquiposModel::formularioModel($datos,'equipos_ae','credenciales_servidores_ae');
			if($respuesta['status'] == 'success' AND !empty($datos["imagen"]["name"]))
				$respuesta = self::cargarImagen($datos["imagen"],$respuesta['id']);
			return $respuesta;
		}
			
	}

	private static $fileType = array('jpg','jpeg','png');
    private static function cargarImagen($imagen,$id){
        $pesoMaximo = 5;
        $info = new SplFileInfo($imagen["name"]);
        $extension = strtolower($info->getExtension());
        if( in_array($extension ,self::$fileType) AND $imagen["size"] <= $pesoMaximo * 1024 * 1024 ){
            $a = $id.'.'.$extension;
            $src = "../intranet/imagenes-equipos/".$a;       
			if(move_uploaded_file($imagen["tmp_name"], $src))  
				return array('status'=>'success','mensaje'=>'El registro se realizo correctamente','mensaje2'=>'');
			else
				return array('status'=>'success','mensaje'=>'El registro se realizo correctamente, pero la imagen no se cargo','mensaje2'=>'Error al subir la imagen al servidor');
		}
		else
			return array('status'=>'error','mensaje'=>'El registro se realizo correctamente, pero la imagen no se cargo','mensaje2'=>'Puede ser que no era un archivo de tipo imagen o que pesaba más de 5 MB');
    }

	#CONTAR EQUIPOS PARA PAGINADOR
	#------------------------------------------------------------
	public static function contarEquiposPaginadorController($datos,$limit){
		$respuesta = EquiposModel::buscarEquiposModel($datos,$limit,"usuarios_ae","equipos_ae");
		return count($respuesta);
	}

	#MOSTRAR TODOS LOS EQUIPOS REGISTRADOS
	#------------------------------------------------------------
	public function buscarEquiposController($datos,$limit){
		$cadena='';
		$respuesta = EquiposModel::buscarEquiposModel($datos,$limit,"usuarios_ae","equipos_ae");
		$colorFila= true;
		$contador = gestionUsuarios::indice($limit);
		foreach ($respuesta as $row => $item){
			$situacion = isset($item['situacion']) ? ($item['situacion'] == 1 ? '' : 'style="background: rgba(241,11,11,0.8); color: #FFF;"') : 'style="background: rgba(243,143,18,0.8); color: #000;"';
			$sucursal =  isset($item['id_sucursal']) ? (Sucursales::traducirSucursalesModel($item["id_sucursal"],"sucursales_ae")) : (Sucursales::traducirSucursalesModel(substr($item["usuario_propietario"],3),"sucursales_ae"));
			$cadena.='<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_equipo"].'">
					<div class="campoId" '.$situacion.'><span class="max-min"><img class="botonMaxMin" src="views/img/circle-max.png" height="25" width="25"></span>'.$contador.'</div>
					<div class="campoNombre" '.$situacion.'>'.$item["nombre"].' '.$item["paterno"].' '.$item["materno"].'</div>
					<div class="campoSucursal" '.$situacion.'>'.$sucursal.'</div>
					<div class="campoAcceso"></div>
					<div class="campoOpciones1 divContenedorHijo" '.$situacion.'><button class="btn btn-success mostrarEquipo" data-toggle="modal" data-target="#detalleEquiposComputo">Mostrar</button></div>
					<div class="campoOpciones2 divContenedorHijo" '.$situacion.'><button class="btn btn-danger eliminarEquipo">Eliminar</button></div>
				</div>';
			$contador++;
		}
		return $cadena;
		//<div class="campoSucursal" '.$situacion.'>'.Sucursales::traducirSucursalesModel($item["id_sucursal"],"sucursales_ae").'</div>
	}

	public static function servidoresRegistrados($id){
		$servidores=EquiposModel::credencialesServidores($id,'credenciales_servidores_ae');
		$dataServidores='';
		foreach($servidores as $row => $item){
					$dataServidores.='<div class="form-group">
                                            <div class="row" value="'.$item['id'].'">
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger borrarServidorLocalActualiar"><i class="fa fa-trash-o fa-2x"></i></button>
													<input type="hidden" name="servidorId[]" value="'.$item['id'].'">
												</div>
                                                <div class="col-md-3">
                                                    <li>
                                                        <input class="form-control" type="text" name="servidorIpActualizar[]" value="'.$item['servidor'].'" placeholder="Ej: 192.168.0.20">
                                                    </li>
                                                </div>
                                                <div class="col-md-2">
                                                	<input class="form-control textoMay" type="text" name="servidorAliasActualizar[]" value="'.$item['alias'].'" placeholder="Ej: Nomipaq" >
                                                </div>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="text" name="servidorUsuarioActualizar[]" value="'.$item['usuario'].'">
                                                </div>
                                                <div class="col-md-3">
													<input class="form-control" type="text" name="servidorPassActualizar[]" value="'.$item['pass'].'">
                                                </div>
                                            </div>
                                    </div>';
		}
		return $dataServidores;
	}
	
	public static function detalleEquipoController($equipo){
		$equipoSeEncuentraAsignado = EquiposModel::verificarEquipoSeEncuentreAsignado($equipo,'equipos_ae');
		$dataServidores='<div class="row">
							<div class="col-md-12">
								<span class="encabezadoDato">Servidor: </span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<span class="encabezadoDato">Alias: </span>
							</div>
							<div class="col-md-4">
								<span class="encabezadoDato">Usuario: </span>
							</div>
							<div class="col-md-4">
								<span class="encabezadoDato">Contraseña: </span>
						</div>
						</div>
						<br>';
		if($equipoSeEncuentraAsignado < 3000){
			$respuesta = EquiposModel::detalleEquipoModel($equipo,'usuarios_ae','equipos_ae');
			$servidores=EquiposModel::credencialesServidores($respuesta['usuario_propietario'],'credenciales_servidores_ae');
			if(!empty($servidores)){
				$dataServidores='';
				foreach($servidores as $row => $item){
					$dataServidores.=' 	<div class="row">
											<div class="col-md-12">
												<span class="encabezadoDato">Servidor: </span>'.$item['servidor'].'
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<span class="encabezadoDato">Alias: </span>'.$item['alias'].'
											</div>
											<div class="col-md-4">
												<span class="encabezadoDato">Usuario: </span>'.$item['usuario'].'
											</div>
											<div class="col-md-4">
												<span class="encabezadoDato">Contraseña: </span>'.$item['pass'].'
											</div>
										</div>
										<br>';
				}
			}
		}	
		else
			$respuesta = EquiposModel::detalleEquipoModelSinAsignar($equipo,'equipos_ae');

		$respuesta['tipo']=$respuesta['tipo'] == 1 ? 'ESCRITORIO' : 'LAPTOP';
		$respuesta['mouse'] =  $respuesta['mouse'] == 1? '<img src="views/img/check.png" alt="">' : '<img src="views/img/empty.png" alt="">'; 
		$respuesta['monitor'] =  $respuesta['monitor'] == 1? '<img src="views/img/check.png" alt="">' : '<img src="views/img/empty.png" alt="">'; 
		$respuesta['mochila'] =  $respuesta['mochila'] == 1? '<img src="views/img/check.png" alt="">' : '<img src="views/img/empty.png" alt="">'; 
		$respuesta['ups'] =  $respuesta['ups'] == 1? '<img src="views/img/check.png" alt="">' : '<img src="views/img/empty.png" alt="">'; 

		$nombre = isset($respuesta["nombre"]) ? $respuesta["nombre"].' '.$respuesta["paterno"].' '.$respuesta["materno"] : 'Sin asignar';
		$sucursal = isset($respuesta["id_sucursal"]) ? (Sucursales::traducirSucursalesModel($respuesta["id_sucursal"],"sucursales_ae")) :(Sucursales::traducirSucursalesModel(substr($respuesta["usuario_propietario"],3),"sucursales_ae"));
		$departamento = isset($respuesta["id_departamento"]) ? (Departamentos::vistaDepartamentos2Model($respuesta['id_departamento'],"departamentos_ae")) : 'Sin asignar';
		$puesto = isset($respuesta["id_puesto"]) ? (Departamentos::vistaPuestos2Model($respuesta['id_puesto'],"puestos_ae")) : 'Sin asignar';
		


		$salida='';
		$salida=' <div role="tabpanel"> 
					<ul class="nav nav-tabs">
							<li role="presentation" class="active">
								<a href="#equipos" aria-controls="encuesta" role="tab" data-toggle="tab">Equipos de cómputo</a>
							</li>
							<li role="presentation">
								<a href="#credenciales" aria-controls="archivos" role="tab" data-toggle="tab">Credenciales de acceso</a>
							</li>
					</ul>
					<div class="tab-content" style="margin-top: 2%;">
						<div role="tabpanel" class="tab-pane active" id="equipos"> 		
		
								<div class="row">
									<div class="col-md-6">
										<span class="encabezadoDato">Nombre: </span> '.$nombre.'
									</div>
									<div class="col-md-6">
										<span class="encabezadoDato">Sucursal:</span> '.$sucursal.'
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
										<span class="encabezadoDato">Departamento: </span>'.$departamento .'
									</div>
									<div class="col-md-6">
										<span class="encabezadoDato">Puesto: </span>'.$puesto .'
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<span class="encabezadoDato">Tipo: </span>'.$respuesta['tipo'].'
									</div>
									<div class="col-md-6">
										<span class="encabezadoDato">Marca: </span>'.$respuesta['marca'].'
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
										<span class="encabezadoDato">Modelo: </span>'.$respuesta['modelo'].'
									</div>
									<div class="col-md-6">
										<span class="encabezadoDato">Serie: </span>'.$respuesta['serie'].'
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
										<span class="encabezadoDato">Memoria RAM: </span>'.$respuesta['ram'].' GB
									</div>
									<div class="col-md-6">
										<span class="encabezadoDato">Disco Duro: </span>'.$respuesta['hd'].' '.$respuesta['hd_capacidad'].'
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
										<span class="encabezadoDato">Nombre de usuario SO: </span>'.$respuesta['usuario_so'].' 
									</div>
									<div class="col-md-6">
										<span class="encabezadoDato">Contraseña SO: </span>'.$respuesta['pass_so'].'
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<span class="encabezadoDato">Accesorios</span> 
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-3">
										<span class="encabezadoDato">Mouse: </span>'.$respuesta['mouse'].'
									</div>
									<div class="col-md-3">
										<span class="encabezadoDato">Monitor: </span>'.$respuesta['monitor'].'
									</div>
									<div class="col-md-3">
										<span class="encabezadoDato">Mochila: </span>'.$respuesta['mochila'].'
									</div>
									<div class="col-md-3">
										<span class="encabezadoDato">No-break: </span>'.$respuesta['ups'].'
									</div>
								</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="credenciales">
							<h3 class="text-center">LOGMEIN</h3>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<span class="encabezadoDato">Usuario: </span> '.$respuesta['usuario_logmein'].'
								</div>
								<div class="col-md-6">
									<span class="encabezadoDato">Contraseña:</span> '.$respuesta['pass_logmein'].'
								</div>
							</div>
							<hr>
							<h3 class="text-center">VPN</h3>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<span class="encabezadoDato">Usuario: </span> '.$respuesta['usuario_vpn'].'
								</div>
								<div class="col-md-4">
									<span class="encabezadoDato">Contraseña:</span> '.$respuesta['pass_vpn'].'
								</div>
								<div class="col-md-4">
									<span class="encabezadoDato">Servidor:</span> '.$respuesta['servidor_vpn'].'
								</div>
							</div>
							<hr>
							<h3 class="text-center">SERVIDORES</h3><hr>
							'.$dataServidores.'
						</div>
					</div>
			</div>			
			<br>';
		$imagen2 = NULL;
		foreach (glob("../intranet/imagenes-equipos/".$equipo.".*") as $nombre)
                        $imagen2 = basename($nombre);
		$imagen = isset($respuesta['imagen']) ? $respuesta['imagen'] : NULL;
		echo json_encode(array('datos'=>$salida,'imagen'=>$imagen,'imagen2'=>$imagen2));
	}

	public static function actualizarEquipo($equipo){
		$respuesta = EquiposModel::actualizarEquipoModel($equipo,"usuarios_ae","equipos_ae");
		return $respuesta;
	}

	public static function actualizarEquipoSinAsignar($equipo){
		$respuesta = EquiposModel::actualizarEquipoSinAsignarModel($equipo,"equipos_ae");
		return $respuesta;
	}

	public static function eliminarEquipoController($equipo){
		if(!preg_match('/^[0-9]{1,5}$/', $equipo))
			return array('status'=>'warning','mensaje'=>'El id del equipo a eliminar no es valido','mensaje2'=>'');
		$respuesta = EquiposModel::eliminarEquipoModel($equipo,'equipos_ae');
		return $respuesta;
	}


}

