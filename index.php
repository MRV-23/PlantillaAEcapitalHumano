<?php

require_once "models/enlaces.php";
require_once "models/usuarios.php";
require_once "models/sucursales.php";
require_once "models/departamentosPuestos.php";
require_once "models/estados.php";
require_once "models/Paqueteria.php"; 
require_once "models/ingreso.php";
require_once "models/permisos.php";
require_once "models/ConfiguracionesModel.php";
require_once "models/EquiposModel.php";
require_once "models/Inicio.php";
require_once "models/RutasDescargasModel.php";
require_once "models/GestorImagenesModel.php";
require_once "models/TicketsModel.php";
require_once "models/EventosModel.php";
require_once "models/ReportesModel.php";
require_once "models/ConsultasGiroModel.php";
require_once "models/CursosModel.php";
require_once "models/NominasModel.php";
require_once "models/EvaluacionesModel.php";
require_once "models/EmpresasModel.php";
require_once "models/ClientesModel.php";
require_once "models/CostosModel.php";
require_once "models/SoftwareModel.php";
require_once "models/InformativosModel.php";
require_once "models/ConciliacionModel.php";
require_once "models/AsistenciasModel.php";

require_once "controllers/enlaces.php";
require_once "controllers/usuarios.php";
require_once "controllers/sucursales.php";
require_once "controllers/departamentosPuestos.php";
require_once "controllers/estados.php";
require_once "controllers/Paqueteria.php";
require_once "controllers/ingreso.php";
require_once "controllers/permisos.php";
require_once "controllers/ConfiguracionesController.php";
require_once "controllers/equipos.php";
require_once "controllers/Inicio.php";
require_once "controllers/RutasDescargas.php";
require_once "controllers/GestorImagenes.php";
require_once "controllers/Tickets.php";
require_once "controllers/Eventos.php";
require_once "controllers/Reportes.php";
require_once "controllers/ConsultasGiro.php";
require_once "controllers/Cursos.php";
require_once "controllers/Nominas.php";
require_once "controllers/Evaluaciones.php";
require_once "controllers/Empresas.php";
require_once "controllers/Clientes.php";
require_once "controllers/Costos.php";
require_once "controllers/Software.php";
require_once "controllers/Informativos.php";
require_once "controllers/Conciliacion.php";
require_once "controllers/Asistencias.php";


require_once "controllers/MetodosDiversos.php";
require_once "models/config.php";
require_once "models/ConexionGiro.php";
require_once "controllers/template.php";
require_once "controllers/ajaxPaginacion.php";
require_once "views/excel/vendor/autoload.php";

$template = new TemplateController();
$template -> template();
