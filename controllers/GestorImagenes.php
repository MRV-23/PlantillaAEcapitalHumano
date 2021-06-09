<?php

class GestorImagenes{

	#INSERTA LA IMAGEN CUANDO LA ARRASTRAMOS AL CUADRO DE CARGAR OK
	#----------------------------------------------------------
	public static function agregarImagen($ruta){ 
		if($_SESSION['identificador2'] == 10)
			$respuesta = GestorImagenesModel::agregarImagen($ruta,'slide_nutrifitness');
		else
			$respuesta = GestorImagenesModel::agregarImagen($ruta,'slide');
		echo json_encode(array("error"=>false,"id" => $respuesta["id"],"ruta" => $respuesta["ruta"],"orden" =>$respuesta["orden"] ));
	}
	
	#IMPRIME TODOS LOS REGISTROS EN LA PAGINA, FUNCION LLAMADA DESDE LA PLANTILLA
	#----------------------------------------------------------
	public static function mostrarImagenes($target=true){ //muestro todas las rutas de mi tabla y ademas añado '../' lo cual le quite en javascript, por cuestiones de referencias de rutas
		if($target)
			$respuesta = GestorImagenesModel::mostrarImagenesModel("slide");
		else
			$respuesta = GestorImagenesModel::mostrarImagenesModel("slide_nutrifitness");
		$posicion=1;
		foreach($respuesta as $fila){
			echo '<li id="'.$fila["id"].'" class="bloqueSlide"><span ruta="'.$fila['ruta'].'" class="eliminarItemSlide"><i class="fa fa-trash" aria-hidden="true"></i></span> <span class="editarItemSlide"><i class="fa fa-pencil" aria-hidden="true"></i></span>  <span class="posicionSlide">'.($posicion++).'</span><img src="' .substr($fila['ruta'],3). '" class="handleImg"></li>';
		}
	}
	
	#SELECCIONO DATOS PARA MOSTRARLOS EN LA VENTANA MODAL
	#----------------------------------------------------------
	public function mostrarDatos($idImagen){
		if($_SESSION['identificador2'] == 10)
			$respuesta = GestorImagenesModel::mostrarDatos($idImagen,'slide_nutrifitness');
		else
			$respuesta = GestorImagenesModel::mostrarDatos($idImagen,'slide');
		//$respuesta = GestorImagenesModel::mostrarDatos($idImagen,'slide');
		echo json_encode(array("ruta" => $respuesta["ruta"],"titulo" => $respuesta["titulo"],"descripcion" => $respuesta["descripcion"]));
	}

	#ACTUALIZAR ITEM SLIDE
	#----------------------------------------------------------
	public function actualizarSlide($datos){
		if($_SESSION['identificador2'] == 10)
			GestorImagenesModel::actualizarSlide($datos,'slide_nutrifitness');
		else
			GestorImagenesModel::actualizarSlide($datos,'slide');
		//GestorImagenesModel::actualizarSlide($datos,'slide');
		echo '';
	}

	#ELIMINAR ITEM SLIDE
	#----------------------------------------------------------
	public function eliminarSlide($datos){
		if($_SESSION['identificador2'] == 10)
			GestorImagenesModel::eliminarSlide($datos,'slide_nutrifitness');
		else
			GestorImagenesModel::eliminarSlide($datos,'slide');
		//GestorImagenesModel::eliminarSlide($datos,'slide');
		echo '';
	}

	#ACTUALIZAR ORDEN
	#----------------------------------------------------------
	public static function actualizarOrden($datos){
		if($_SESSION['identificador2'] == 10)
			GestorImagenesModel::actualizarOrden($datos,'slide_nutrifitness');
		else
			GestorImagenesModel::actualizarOrden($datos,'slide');
		//GestorImagenesModel::actualizarOrden($datos,'slide');
		echo '';
	}


	#MOSTRAR CARRUSEL
	#------------------------------------------------------------
	public static function mostrarCarrusel($target=true){ //muestro todas las rutas de mi tabla y ademas añado '../' lo cual le quite en javascript, por cuestiones de referencias de rutas
		if($target)
			$respuesta = GestorImagenesModel::mostrarImagenesModel("slide");
		else
			$respuesta = GestorImagenesModel::mostrarImagenesModel("slide_nutrifitness");
		$indice = 0;
		$class = 'active';
		$encabezado='';
		$cuerpo='';
		$html='';
		
		foreach($respuesta as $fila){
			if(!AccesoGuadalajara::pertenecePrograma($_SESSION['identificador']) && ($fila['titulo'] == 'CAMPAÑA DE VACUNACION INFLUENZA 2019') && $target){
				continue;
			}
			$encabezado.='<li data-target="#carousel-example-generic" data-slide-to="'.$indice.'" class="'.$class.'"></li>';
			$indice++;
			$class = '';
		}

		$class = 'active';
		foreach($respuesta as $fila){
			if(!AccesoGuadalajara::pertenecePrograma($_SESSION['identificador']) && ($fila['titulo'] == 'CAMPAÑA DE VACUNACION INFLUENZA 2019') && $target){
				continue;
			}
			if($fila['titulo'] === "Sin título"){
				$fila['titulo'] = '';
			}
			$cuerpo.='<div class="item '.$class.'">
						<img rel="slide" src="'.substr($fila['ruta'],3).'" alt="'.substr($fila['ruta'],3).'" class="visor-crow-imagen-slide" style="cursor:ne-resize;">
						<div class="carousel-caption">
							'.$fila['titulo'].'
						</div>
					  </div>';
			$class = '';				
		}
				
		$html= '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						'.$encabezado.'
					</ol>
					<div class="carousel-inner">
						'.$cuerpo.'
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="fa fa-angle-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="fa fa-angle-right"></span>
					</a>
			 </div>';
		return $html;
	}

	public static function mostrarTextoCarrusel($target=true){
		if($target)
			$respuesta = GestorImagenesModel::mostrarImagenesModel("slide");
		else
			$respuesta = GestorImagenesModel::mostrarImagenesModel("slide_nutrifitness");
		$indice = 1;
		$cuerpo='';
		$html='';
		$in='in';
		
		foreach($respuesta as $fila){
			if(!AccesoGuadalajara::pertenecePrograma($_SESSION['identificador']) && ($fila['titulo'] == 'CAMPAÑA DE VACUNACION INFLUENZA 2019') && $target){
				continue;
			}

			if($fila['titulo'] !== "Sin título"){
				$cuerpo.='<div class="panel box">
								<div class="box-header with-border">
									<h4 class="box-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseSlide'.$indice.'">'.$fila['titulo'].'</a>
									</h4>
								</div>
								<div id="collapseSlide'.$indice.'" class="panel-collapse collapse '.$in.'">
									<div class="box-body">
										'.$fila['descripcion'].'
									</div>
								</div>
						</div>';
				$in='';
				$indice++;
			}

		}
			$html.='<div class="box-group" id="accordion">';
			$html.=$cuerpo;
			$html.='</div>';

			return $html;
	}
	


}





