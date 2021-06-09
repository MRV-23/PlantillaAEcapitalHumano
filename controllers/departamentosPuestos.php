<?php

class gestionSucursalesDepartamentos{

	#MOSTRAR LOS DEPARTAMENTOS DE UNA SUCURSAL DETERMINADA
	#--------------------OK--------------------------
	public static function mostrarDepartamentosController($dato,$valor){
		if(!empty($dato)){
			$respuesta = Departamentos::vistaDepartamentosModel($dato,"departamentos_ae","sucursales_departamentos"); 
			$contenido="";
			if($valor === 0){
				$contenido='<select class="form-control" name="departamentoUsuario" id="departamentoUsuario" required>';
				$contenido.='<option value=""></option>';
			}
				
			else if($valor === 1){
				$contenido='<select class="form-control" name="departamentoNuevoPuesto" id="departamentoNuevoPuesto" required>';
				$contenido.='<option value=""></option>';
			}
				
			else{
				$contenido='<select class="form-control" id="ventanaModalDesvincularDepartamento" name="ventanaModalDesvincularDepartamento" size="10">';
			}
				
			foreach($respuesta as $row => $item){
				$contenido.='<option value="'.$item["id_departamento"].'">'.$item["nombre"].'</option>';
			}
			$contenido .='</select>';
			return $contenido; 
		}
		else
			return '<select class="form-control"  name="departamentoUsuario" id="departamentoUsuario" readonly required></select>';
	}

	#MOSTRAR PUESTOS DE UN DEPARTAMENTO DETERMINADO----en campos select
	#------------------------------------
	public static function mostrarPuestosController($sucursal,$departamento,$valor){
		if(!empty($departamento) && !empty($sucursal)){
			$respuesta = Departamentos::vistaPuestosModel($sucursal,$departamento,"puestos_ae","sucursales_departamentos","sucursales_departamentos_puestos");
			$contenido="";
			if($valor==0)
				$contenido='<select class="form-control" name="puestoUsuario" id="puestoUsuario" required><option value=""></option>';
			else
				$contenido='<select class="form-control" name="ventanaModalDesvincularPuesto" id="ventanaModalDesvincularPuesto" size="10">';

			foreach($respuesta as $row => $item){
				$contenido.='<option value="'.$item["id_puesto"].'">'.$item["nombre"].'</option>';
			}
			$contenido .='</select>';
			echo $contenido; 
		}
		else
			echo '<select class="form-control" name="puestoUsuario" id="puestoUsuario" readonly required></select>';  
	}

	#MOSTRAR DEPARTAMENTOS CUANDO SE ACTUALIZA USUARIO
	#---------------OK--------------------------------------------
	public function actualizarDepartamentosController($dato,$departamento){
			//$respuesta = Departamentos::vistaDepartamentosModel($sucursal,"sucursales_departamentos");
			$respuesta = Departamentos::vistaDepartamentosModel($dato,"departamentos_ae","sucursales_departamentos"); 
			
			$contenido="";
			$contenido='<select class="form-control textoMay" name="departamentoUsuario" id="departamentoUsuario" required>';
			$contenido.='<option value=""></option>';
			foreach($respuesta as $row => $item){
				if($departamento == $item["id_departamento"])
					$contenido.='<option value="'.$item["id_departamento"].'" selected="selected">'.$item["nombre"].'</option>';
				else
					$contenido.='<option value="'.$item["id_departamento"].'">'.$item["nombre"].'</option>';
			}
			$contenido .='</select>';
			echo $contenido; 
	}

	#MOSTRAR PUESTOS CUANDO SE ACTUALIZA USUARIO
	#------------------------------------
	public function actualizarPuestoController($sucursal,$departamento,$puesto){
		//$respuesta = Departamentos::vistaPuestosModel($sucursal,$departamento,"depto_sucursal_puestos");
		$respuesta = Departamentos::vistaPuestosModel($sucursal,$departamento,"puestos_ae","sucursales_departamentos","sucursales_departamentos_puestos");
		$contenido="";
		$contenido='<select class="form-control" name="puestoUsuario" id="puestoUsuario" required>';
		$contenido.='<option value=""></option>';
		foreach($respuesta as $row => $item){
			if($puesto == $item["id_puesto"])
				$contenido.='<option value="'.$item["id_puesto"].'" selected="selected">'.$item["nombre"].'</option>';
			else
				$contenido.='<option value="'.$item["id_puesto"].'">'.$item["nombre"].'</option>';
		}
		$contenido .='</select>';
		echo $contenido; 
	}


	#SE CREA LA RELACION ENTRE SUCURSAL-DEPARTAMENTO (ARCHIVO: ajaxDepartamentosPuestos.php)
	#NUEVO--------------------------OK----------------------------
	public function vinculacionSucursalDepartamentoController($sucursal,$departamento){

		if(!preg_match('/^[0-9]{1,3}$/', $sucursal))
			return 2;
		if(!preg_match('/^[0-9,]{2,}$/', trim($departamento)))
			return 3;

		$nombre = preg_split("/[,]+/",trim($departamento));

		if((count($nombre)) > 1){ //verificamos que cada departamento sea correcto en formato sino salimos
			for($i=0;$i<count($nombre)-1;$i++){
				if(!preg_match('/^[0-9]{1,}$/',trim($nombre[$i])))
					return 3;
			}
		}

		for($i=0;$i<count($nombre)-1;$i++){
			$respuesta = Departamentos::vinculacionSucursalDepartamentoModel($sucursal,trim($nombre[$i]),"sucursales_departamentos");
			if($respuesta == 1)
				return $respuesta;
		}
		return 0;
	}



	#SE CREA LA RELACION ENTRE SUCURSAL-DEPARTAMENTO-PUESTO (ARCHIVO: ajaxDepartamentosPuestos.php)
	#NUEVO--------------------------OK----------------------------
	public function vinculacionSucursalDepartamentoPuestoController($sucursal,$departamento,$puesto){
	
		if(!preg_match('/^[0-9]{1,3}$/', $sucursal))
			return 2;
		if(!preg_match('/^[0-9]{1,3}$/', $departamento))
			return 3;
		if(!preg_match('/^[0-9,]{2,}$/', trim($puesto)))
			return 4;

		$nombre = preg_split("/[,]+/",trim($puesto));

		if((count($nombre)) > 1){ //verificamos que cada departamento sea correcto en formato sino salimos
			for($i=0;$i<count($nombre)-1;$i++){
				if(!preg_match('/^[0-9]{1,}$/',trim($nombre[$i])))
					return 4;
			}
		}

		//obtener el id de la tupla sucursal-departamento
		$id_sucursal_departamento = Departamentos::obtenerIdSucursalDepartamentoModel($sucursal,$departamento,"sucursales_departamentos");
	
		for($i=0;$i<count($nombre)-1;$i++){
			$respuesta = Departamentos::vinculacionSucursalDepartamentoPuestoModel($id_sucursal_departamento,trim($nombre[$i]),"sucursales_departamentos_puestos");
			if($respuesta == 1)
				return $respuesta;
		}

		return 0;
	}


	#NUEVO DEPARTAMENTO (ARCHIVO: ajaxDepartamentosPuestos.php)
	#--------------------------OK----------------------------------
	public static function nuevoDepartamento($datos){
		
		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,\s]{4,}$/', trim($datos)))
			return 4;

		$nombre = preg_split("/[,]+/",trim($datos));

		if((count($nombre)) > 1){ //verificamos que cada departamento sea correcto en formato sino salimos
			for($i=0;$i<count($nombre)-1;$i++){
				if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{4,}$/',trim($nombre[$i])))
					return 4;
			}
		}

		for($i=0;$i<count($nombre)-1;$i++){
			$respuesta = Departamentos::NuevoDepartamentoModel(trim($nombre[$i]), "departamentos_ae");
			if($respuesta == 1)
				return $respuesta;
		}
		return 0;
	}

	#NUEVO PUESTO (ARCHIVO: ajaxDepartamentosPuestos.php)
	#----------------------------OK--------------------------------
	public static function nuevoPuesto($datos){

		if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,\s]{4,}$/', trim($datos)))
			return 3;

		$nombre = preg_split("/[,]+/",trim($datos));

		if((count($nombre)) > 1){ //verificamos que cada puesto sea correcto en formato sino salimos
			for($i=0;$i<count($nombre)-1;$i++){
				if(!preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{4,}$/',trim($nombre[$i])))
					return 3;
			}
		}

		for($i=0;$i<count($nombre)-1;$i++){
			$respuesta = Departamentos::NuevoPuestoModel(trim($nombre[$i]), "puestos_ae");
			if($respuesta == 1)
				return $respuesta;
		}
		return 0;
	}

	#MOSTRAR TODOS LOS DEPARTAMENTOS CAMPOS SELECT (ARCHIVO: ajaxDepartamentosPuestos.php)
	#-------------------OK-----------------
	public function departamentosTodosController($idSucursal=0){
		$campo='';
		$campo.='<select class="form-control textoMay" name="departamentoVincularDepartamento" id="departamentoVincularDepartamento" size="10">';

		if($idSucursal === 0)
			$respuesta = Departamentos::departamentosTodosModel("departamentos_ae");
		else
			$respuesta = Departamentos::departamentosNoVinculadosModel("departamentos_ae","sucursales_departamentos",$idSucursal);
	
		foreach($respuesta as $row => $item){
			$campo.='<option value="'.$item["id_departamento"].'">'.$item["nombre"].'</option>';
		}
		$campo .= '</select>';
		echo $campo;
	}


	#MOSTRAR TODOS LOS PUESTOS CAMPOS SELECT (ARCHIVO: ajaxDepartamentosPuestos.php)
	#-----------------OK-------------------
	public function puestosTodosController(){
		$campo='';
		$campo.='<select class="form-control textoMay" name="mostrarTodosPuestosVinculados" id="mostrarTodosPuestosVinculados" size="10">';
		$respuesta = Departamentos::puestosTodosModel("puestos_ae");
		foreach($respuesta as $row => $item){
			$campo.='<option value="'.$item["id_puesto"].'">'.$item["nombre"].'</option>';
		}
		$campo .= '</select>';
		echo $campo;
	}

	#MOSTRAR TODOS LOS PUESTOS NO VINCULADOS CAMPOS SELECT (ARCHIVO: ajaxDepartamentosPuestos.php)
	#-----------------OK-------------------
	public function puestosNoVinculadosController($sucursal,$departamento){
		$campo='';
		$campo.='<select class="form-control textoMay" name="mostrarTodosPuestos" id="mostrarTodosPuestos" size="10">';
		$respuesta = Departamentos::puestosNoVinculadosModel("puestos_ae", "sucursales_departamentos","sucursales_departamentos_puestos",$sucursal,$departamento);
		foreach($respuesta as $row => $item){
			$campo.='<option value="'.$item["id_puesto"].'">'.$item["nombre"].'</option>';
		}
		$campo .= '</select>';
		echo $campo;
	}


#DESVINCULAR DEPARTAMENTOS DE SUCURSALES
#-----------------OK-------------------
	public static function desvinculacionSucursalDepartamentoController($sucursal, $departamento){
		$respuesta = Departamentos::desvinculacionSucursalDepartamentoModel($sucursal,$departamento,"sucursales_departamentos");
		return $respuesta;
	}

#DESVINCULAR PUESTOS DE SUCURSAL-DEPARTAMENTO
#-----------------OK-------------------
	public static function 	desvinculacionSucursalDepartamentoPuestoController($sucursal, $departamento,$puesto){
		$respuesta = Departamentos::desvinculacionSucursalDepartamentoPuestoModel($sucursal,$departamento,$puesto,"sucursales_departamentos","sucursales_departamentos_puestos");
		return $respuesta;
	}


	#MOSTRAR SUCURSALES
	#------------------------------------------------------------
	public function mostrarDepartamentosTodosEliminar(){
		
		$respuesta = Departamentos::departamentosTodosModel('departamentos_ae');
		$colorFila= true;
		$contador=1;
		
		foreach ($respuesta as $row => $item){
		echo'<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_departamento"].'">
				<div class="campoId">'.$contador.'</div>
				<div class="campoDepartamento">'.mb_strtoupper($item["nombre"],'utf-8').'</div>
				<div class="campoOpciones"><button class="btn btn-danger borrarDepartamento">Eliminar</button></div>
			</div>';
			$contador++;
		}
	}

	#ELIMINAR DEPARTAMENTO
	#------------------------------------------------------------
	public function departamentoEliminarController($idDepartamento){
		$respuesta = Departamentos::departamentoEliminarModel($idDepartamento, 'departamentos_ae');
		return $respuesta;
	}


	#MOSTRAR SUCURSALES
	#------------------------------------------------------------
	public function mostrarPuestosTodosEliminar(){
		
		$respuesta = Departamentos::puestosTodosModel('puestos_ae');
		$colorFila= true;
		$contador=1;
		
		foreach ($respuesta as $row => $item){
		echo'<div class="renglon'.(boolval($colorFila=!$colorFila) ? 1 : 0).'" id="'.$item["id_puesto"].'">
				<div class="campoId">'.$contador.'</div>
				<div class="campoDepartamento">'.mb_strtoupper($item["nombre"],'utf-8').'</div>
				<div class="campoOpciones"><button class="btn btn-danger borrarPuesto">Eliminar</button></div>
			</div>';
			$contador++;
		}
	}

	#ELIMINAR DEPARTAMENTO
	#------------------------------------------------------------
	public function puestoEliminarController($idPuesto){
		$respuesta = Departamentos::puestoEliminarModel($idPuesto, 'puestos_ae');
		return $respuesta;
	}

	#TOTAL DE DEPARTAMENTOS
	#------------------------------------------------------------
	public function totalDepartamentosController(){
		$respuesta = Departamentos::totalModel('departamentos_ae');
		return $respuesta;
	}

	#TOTAL DE PUESTOS
	#------------------------------------------------------------
	public function totalPuestosController(){
		$respuesta = Departamentos::totalModel('puestos_ae');
		return $respuesta;
	}


}


	