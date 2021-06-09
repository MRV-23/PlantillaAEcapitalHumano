<?php

class gestionEstados{

	#MOSTRAR SUCURSALES----en campos select
	#------------------------------------
	public function vistaEstadosController($estado){
		
		$respuesta = Estados::vistaEstadosSelectModel("estados_ae");

		if(empty($estado)){
			foreach($respuesta as $row => $item){
				echo'<option value="'.$item["nombre"].'">'.$item["nombre"].'</option>';
			}
		}
		else{
			foreach($respuesta as $row => $item){
				if($estado == $item["id_estado"])
					echo'<option value="'.$item["nombre"].'" selected="selected">'.$item["nombre"].'</option>';
				else
					echo'<option value="'.$item["nombre"].'">'.$item["nombre"].'</option>';
			}
		}	
	}

	public function vistaEstadosControllers($idEstado){
		$respuesta = Estados::vistaEstadosModel($idEstado,"estados_ae");
		return $respuesta;
	}

}

