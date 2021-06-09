<?php

class EnlacesModels{

	static public function enlacesModel($enlaces){
		if($enlaces == "paqueteriaCaptura" ||
		   $enlaces == "paqueteriaRevision" ||
		   $enlaces == "inicio" ||
		   $enlaces == "usuarios" ||
		   $enlaces == "usuariosAdministrar" ||
		   $enlaces == "usuariosPass" ||
		   $enlaces == "sucursalesAdministrar" ||
		   $enlaces == "equipos" ||
		   $enlaces == "equiposAdministrar" ||
		   $enlaces == "sucursales" ||
		   $enlaces == "puesto" ||
		   $enlaces == "departamento" ||
		   $enlaces == "vincularDepartamento" ||
		   $enlaces == "vincularPuesto" ||
		   $enlaces == "correos" ||
		   $enlaces == "eliminarDepartamento" ||
		   $enlaces == "eliminarPuesto" ||
		   //$enlaces == "ticket" ||
		   $enlaces == "tickets-administrador" ||
		   $enlaces == "tickets-soporte" ||
		   $enlaces == "tutoriales" ||
		   $enlaces == "solicitudes" ||
		   $enlaces == "imprimirSolicitud" ||
		   $enlaces == "gestorNoticiasEventos" ||
		   $enlaces == "giro" ||
		   //$enlaces == "ticketNuevo" ||
		   $enlaces == "nutrifitness" ||
		   $enlaces == "cursos" ||
		   $enlaces == "reportesRecursosHumanos" ||
		   $enlaces == "resultados" ||
		   $enlaces == "resultadosNutrifitness" ||
		   $enlaces == "listaNutrifitness" ||
		   $enlaces == "nominas" ||
		   $enlaces == "finanzas" ||
		   $enlaces == "tesoreria" ||
		   $enlaces == "liberacion" ||
		   $enlaces == "conexiones" ||
		   $enlaces == "evaluaciones" ||
		   $enlaces == "empresas" ||
		   $enlaces == "clientes" ||
		   $enlaces == "reconocimientos" ||
		   $enlaces == "linea-ayuda" ||
		   $enlaces == "facturacion" ||
		   $enlaces == "costos" ||
		   $enlaces == "software" ||
		   $enlaces == "conciliacion" ||
		   $enlaces == "test" ||
		   $enlaces == "salir"){
			$module = "views/modules/main/".$enlaces.".php";
		}	
		else{
		//	session_destroy();
			$module = "views/modules/interfaz/interfazIngreso.php";	
		}

			return $module;
	
	}
}
