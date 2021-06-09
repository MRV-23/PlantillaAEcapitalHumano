<?php

class gestionSucursales{

	#MOSTRAR SUCURSALES----en campos select
	#------------------------------------
	public function vistaSucursalesController($valor=0){
		$respuesta = Sucursales::vistaSucursalesSelectModel("sucursales_ae");
		foreach($respuesta as $row => $item){
			if($valor == $item["id_sucursal"])
				echo'<option value="'.$item["id_sucursal"].'" selected="selected">'.$item["nombre"].'</option>';
			else
				echo'<option value="'.$item["id_sucursal"].'">'.$item["nombre"].'</option>';
		}
	}

	#MOSTRAR SUCURSALES
	#------------------------------------
	public function vistaSucursalesControllerPaqueteria(){
		$respuesta = Sucursales::vistaSucursalesSelectModelPaqueteria("sucursales_ae","dependencias_paqueteria_ae","usuarios_ae");
		foreach($respuesta as $row => $item){
				echo'<option value="'.$item["id_sucursal"].'">'.$item["nombre"].'</option>';
		}
	}


	public function vistaSucursalesSelectModelRHespecial(){
		$respuesta = Sucursales::vistaSucursalesSelectModelRHespecial(AccesoRHespecial::pertenece($_SESSION['identificador']),Tablas::sucursales());
		foreach($respuesta as $row => $item){
				echo'<option value="'.$item["id_sucursal"].'">'.$item["nombre"].'</option>';
		}
	}



	#MOSTRAR SUCURSALES
	#------------------------------------------------------------
	public function mostrarSucursalesController(){

		$respuesta = Sucursales::mostrarSucursalesModel("sucursales_ae");
		$colorFila= true;
		$contador=1;
		
		foreach ($respuesta as $row => $item){
			$interior = ($item["interior"] != "" || $item["interior"] != null) ? ', No. INT. '.mb_strtoupper($item["interior"],'utf-8') : "";
		echo'<div class="divContenedorPadre renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_sucursal"].'">
				<div class="campoId"><span class="max-min"><img class="botonMaxMin" src="views/img/circle-max.png" height="25" width="25"></span>'.$contador.'</div>
				<div class="campoSucursal">'.mb_strtoupper($item["nombre"],'utf-8').'</div>
				<div class="campoDireccion">'.mb_strtoupper($item["calle"],'utf-8').', No. '.mb_strtoupper($item["exterior"],'utf-8').$interior.', COLONIA: '.mb_strtoupper($item["colonia"],'utf-8').', '.mb_strtoupper($item["municipio"],'utf-8').', '.mb_strtoupper(gestionEstados::vistaEstadosControllers($item["id_estado"]),'utf-8').', C.P. '.$item["codigo"].'</div>
				<div class="campoTelefono divContenedorHijo"><span class="spanOcultoTelefono"><b>Telefono: </b></span>'.self::mostrarTelefonos2Controllers($item["id_sucursal"]).'</div>
				<div class="campoOpciones1 divContenedorHijo"><form action="sucursales" method="post"><button type="submit" name="actualizarSucursal" value="'.$item["id_sucursal"].'" class="btn btn-primary">Actualizar</button></form></div>
				<div class="campoOpciones2 divContenedorHijo"><button class="btn btn-danger borrarSucursal">Eliminar</button></div>
				<div class="campoOpciones3 divContenedorHijo"><form action="usuariosAdministrar" method="post"><button type="submit" name="mostrarSucursal" value="'.$item["id_sucursal"].'" class="btn btn-success">Empleados</button></form></div>
			</div>';
			$contador++;
		}

		//<div class="divContenedorHijo">;
		//<span>hi</span>
		//</div>';
	}

	#REGISTRO NUEVO SUCURSAL
	#------------------------------------------------------------
	public static function sucursalNuevaController($usuario, $valor, $tabla){

		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.()\s]{2,}$/', $usuario["nombre"]))
			return 4;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{2,}$/', $usuario["calle"]))
			return 5;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{1,}$/', $usuario["exterior"]))
			return 6;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\s]{0,}$/', $usuario["interior"]))
			return 7;
		if(!preg_match('/^[0-9]{5}$/', $usuario["codigo"]))
			return 8;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.]{2,}$/', $usuario["colonia"]))
			return 9;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["municipio"]))
			return 10;
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}$/', $usuario["estado"]))
			return 11;

		$usuario['estado'] = Estados::vistaEstados2Model($usuario['estado'], "estados_ae"); //obtenemos el id del estado
	
		$telefonos = preg_split("/[X]+/",trim($usuario['telefonos']));

		

		if((count($telefonos)) > 1){ //verificamos que cada campo de telefono (mínimo 1) sea correcto en formato sino salimos
			for($i=0;$i<count($telefonos)-1;$i++){
				if(!preg_match('/^[0]{1}[1]{1}[\s]{1}[(]{1}[0-9]{2}[)]{1}[\s]{1}[0-9]{4}[-]{1}[0-9]{4}$/',trim($telefonos[$i])) AND !preg_match('/^[0]{1}[1]{1}[\s]{1}[(]{1}[0-9]{3}[)]{1}[\s]{1}[0-9]{3}[-]{1}[0-9]{4}$/',trim($telefonos[$i])))
					return 3;
			}
		}

		if($valor == 0){//registro nuevo
			$respuesta = Sucursales::nuevaSucursalModel($usuario, "sucursales_ae"); //ingresamos la nueva sucursal
			if($respuesta===1){
				return $respuesta;//si hubo un error salimos
			}
		}
		else if($valor != 0){//actualizar
			$respuesta = Sucursales::actualizarSucursalModel($usuario,$valor,"sucursales_ae");
			if($respuesta===1){
				return $respuesta;//si hubo un error salimos
			}
		}

		if((count($telefonos)) > 1){ //añadimos los numeros teléfonicos si es que existe mínimo 1
			if($valor == 0){//registro nuevo
				$respuesta = Sucursales::obtenerIdSucursalModel($usuario["nombre"], "sucursales_ae");//obtenemos el id de la sucursal
			}
			else if($valor != 0){//actualizar
				Sucursales::eliminarTelefonosModel($valor, "telefonos_ae");//eliminamos los teléfonos existentes para cargar los nuevos
				$respuesta = $valor;
			}

			for($i=0;$i<count($telefonos)-1;$i++){//insertamos los números teléfonicos
				Sucursales::nuevoTelefonoSucursalModel($respuesta, trim($telefonos[$i]), "telefonos_ae");
			}
		}
		
		if($valor == 0)//registro nuevo
			return 0;
		else
			return 2;
	}

	#BORRAR SUCURSAL
	#------------------------------------
	public static function eliminarSucursalController($dato){
		$respuesta = Sucursales::eliminarSucursalModel($dato, "sucursales_ae");
		return $respuesta;
	}

	#MOSTRAR UNA SOLA SUCURSAL PARA ACTUALIZAR
	#------------------------------------------------------------
	public function  mostrarActualizarSucursal($idActualizar){
			$respuesta = Sucursales::mostrarSucursalActualizarModel($idActualizar,"sucursales_ae");
			return $respuesta;	
	}

	#MOSTAR LOS TELÉFONOS DE CADA SUCURSAL EN INTERFAZ ACTULIZAR
	public function mostrarTelefonosControllers($id_sucursal){
		$respuesta = Sucursales::mostrarTelefonosModel($id_sucursal,"telefonos_ae");
		foreach ($respuesta as $row => $item){
	        echo '<li>'.$item['telefono'].'<button class="rem">X</button></li>';
		} 
	}

	#MOSTAR LOS TELÉFONOS DE CADA SUCURSAL EN GESTIONAR SUCURSALES
	public static function mostrarTelefonos2Controllers($id_sucursal){
		$cadena="";
		$respuesta = Sucursales::mostrarTelefonosModel($id_sucursal,"telefonos_ae");
		foreach ($respuesta as $row => $item){
			if($row != 0)
				$cadena.=', ';
	        $cadena.= $item['telefono'];
		} 
		return $cadena;
	}

	public static function totalRegistrosControllers(){
		$respuesta=Sucursales::totalRegistrosModels('sucursales_ae');
		return $respuesta;
	}
}

