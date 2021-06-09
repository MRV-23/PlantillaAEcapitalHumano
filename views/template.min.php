<?php
session_start();
//ini_set( "display_errors","0");
//ini_set('memory_limit', '4G');
use PhpOffice\PhpSpreadsheet\IOFactory;//clases de excel cargadas con el autoload de la libreria
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Shared;

/*class ReporteTickets{
	public function giro_empleados_vigentes(){
		
		//$respuesta = ConsultasGiro::giro_empleados_vigentes();	
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte de vacaciones')
			->setSubject('Reporte de vacaciones')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Recursos Humanos');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Empleados Vigentes");
	
		$hoja->setCellValue("A1", "CLAVE");
		$hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->setCellValue("B1", "NOMBRE");
		$hoja->getColumnDimension('B')->setAutoSize(true);
		$hoja->setCellValue("C1", "RFC");
		$hoja->getColumnDimension('C')->setAutoSize(true);
		$hoja->setCellValue("D1", "CURP");
		$hoja->getColumnDimension('D')->setAutoSize(true);
		$hoja->setCellValue("E1", "No. IMSS");
		$hoja->getColumnDimension('E')->setAutoSize(true);
		$hoja->setCellValue("F1", "F. ALTA");
		$hoja->getColumnDimension('F')->setAutoSize(true);
		$hoja->setCellValue("G1", "CLAVE SUCURSAL");
		$hoja->getColumnDimension('G')->setAutoSize(true);
		$hoja->setCellValue("H1", "NOMBRE SUCURSAL");
		$hoja->getColumnDimension('H')->setAutoSize(true);
		$hoja->setCellValue("I1", "CLAVE NOMINA");
		$hoja->getColumnDimension('I')->setAutoSize(true);
		$hoja->setCellValue("J1", "NOMINA");
		$hoja->getColumnDimension('J')->setAutoSize(true);
		$hoja->setCellValue("K1", "CLAVE DEPARTAMENTO");
		$hoja->getColumnDimension('K')->setAutoSize(true);
		$hoja->setCellValue("L1", "DEPARTAMENTO");
		$hoja->getColumnDimension('L')->setAutoSize(true);
		$hoja->setCellValue("M1", "CLAVE PUESTO");
		$hoja->getColumnDimension('M')->setAutoSize(true);
		$hoja->setCellValue("N1", "PUESTO");
		$hoja->getColumnDimension('N')->setAutoSize(true);
		$hoja->setCellValue("O1", "S. DIARIO");
		$hoja->getColumnDimension('O')->setAutoSize(true);
		$hoja->setCellValue("P1", "S. INTEGRADO");
		$hoja->getColumnDimension('P')->setAutoSize(true);
		$hoja->setCellValue("Q1", "No. CREDITO INFONAVIT");
		$hoja->getColumnDimension('Q')->setAutoSize(true);
		$hoja->setCellValue("R1", "INICIO FECHA DESCUENTO");
		$hoja->getColumnDimension('R')->setAutoSize(true);
		$hoja->setCellValue("S1", "TIPO DESCUENTO");
		$hoja->getColumnDimension('S')->setAutoSize(true);
		$hoja->setCellValue("T1", "VALOR DE DESCUENTO");
		$hoja->getColumnDimension('T')->setAutoSize(true);
		$hoja->setCellValue("U1", "CLAVE TURNO");
		$hoja->getColumnDimension('U')->setAutoSize(true);
		$hoja->setCellValue("V1", "DESCRIPCIÓN TURNO");
		$hoja->getColumnDimension('V')->setAutoSize(true);
		$hoja->setCellValue("W1", "TIPO EMPLEADO");//ESQUEMA
		$hoja->getColumnDimension('W')->setAutoSize(true);
		$hoja->setCellValue("X1", "CLAVE REGIMEN");
		$hoja->getColumnDimension('X')->setAutoSize(true);
		$hoja->setCellValue("Y1", "REGIMEN");
		$hoja->getColumnDimension('Y')->setAutoSize(true);
		$hoja->setCellValue("Z1", "CLAVE TIPO CONTRATO");
		$hoja->getColumnDimension('Z')->setAutoSize(true);
		$hoja->setCellValue("AA1", "TIPO CONTRATO");
		$hoja->getColumnDimension('AA')->setAutoSize(true);
		$hoja->setCellValue("AB1", "FECHA DE BAJA");
		$hoja->getColumnDimension('AB')->setAutoSize(true);
		$hoja->setCellValue("AC1", "PAGADORA SYS");
		$hoja->getColumnDimension('AC')->setAutoSize(true);
		$hoja->setCellValue("AD1", "NOMBRE RP");
		$hoja->getColumnDimension('AD')->setAutoSize(true);
		$hoja->setCellValue("AE1", "REGISTRO PATRONAL");
		$hoja->getColumnDimension('AE')->setAutoSize(true);
		$hoja->setCellValue("AF1", "PAGADORA IAS");
		$hoja->getColumnDimension('AF')->setAutoSize(true);
		$hoja->setCellValue("AG1", "NOMBRE PAGADORA");
		$hoja->getColumnDimension('AG')->setAutoSize(true);
		$hoja->getStyle('A1:AG1')->getFont()->setBold(true);
	
		$columna=1;
		$fila=2;
	
		$nombreDelDocumento = "Reporte-tickets.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
}*/

class Cabeceras{

	public $sucursal;
	public $usuario;
	public $tipo;
	public $autorizados;
	public $fechaInicio;
	public $fechaFinal;
	public $nombre;
	public $formato;
	public $id;
	public $departamento;



	public function descargar_recibos(){
		 //$url= "X:\Giro CFDI\CFDI_2018\S033 45\RP R1275860101R\Depto 0240\\".$nombre;
		$this->formato = $this->formato == 0 ? 'pdf' : 'xml';
		$url= $this->nombre.".".$this->formato;
		$this->nombre =explode("/", $url);
		$this->nombre= $this->nombre[count($this->nombre)-1];
		header ("Content-Disposition: attachment; filename=".$this->nombre."");
		header ("Content-Type: application/octet-stream");
		header ("Content-Length: ".filesize($url));
		readfile($url);
	}

	public static function traducirPermisos($indice){
		$permiso = array('JUSTIFICANTE DE IMSS','JUSTIFICANTE DEL MÉDICO PARTICULAR','DÍA COMPLETO','MEDIO DÍA','PERIODO DE AUSENCIA POR HORAS','SALIDA TEMPRANO','BONO BIMESTRAL','LUTO','FALTA INJUSTIFICADA','SUSPENSIÓN','PATERNIDAD','MATERNIDAD');
		return $permiso[$indice-1];
	}

	public function reportes_permisos(){

		$data = array(
			"sucursal" => $this->sucursal,
			"usuario" => $this->usuario,
			"tipo" => $this->tipo,
			"autorizados" => $this->autorizados,
			"fechaInicio" => $this->fechaInicio,
			"fechaFinal" => $this->fechaFinal
		);
		
		$respuesta = Reportes::reporte_permisos($data);
	
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte de solicitudes')
			->setSubject('Reporte de solicitudes')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Recursos Humanos');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Solicitudes");
	
		$hoja->setCellValue("A1", "NOMBRE");
		$hoja->getColumnDimension('A')->setAutoSize(true);
		//$hoja->getRowDimension(1)->setRowHeight(120);
		$hoja->setCellValue("B1", "SUCURSAL");
		$hoja->getColumnDimension('B')->setAutoSize(true);
		$hoja->setCellValue("C1", "DEPARTAMENTO");
		$hoja->getColumnDimension('C')->setAutoSize(true);
		$hoja->setCellValue("D1", "PUESTO");
		$hoja->getColumnDimension('D')->setAutoSize(true);
		$hoja->setCellValue("E1", "TIPO DE PERMISO");
		$hoja->getColumnDimension('E')->setAutoSize(true);
		$hoja->setCellValue("F1", "FECHA DE SOLICITUD");
		$hoja->getColumnDimension('F')->setAutoSize(true);
		$hoja->setCellValue("G1", "HORARIO DE SOLICITUD");
		$hoja->getColumnDimension('G')->setAutoSize(true);
		$hoja->setCellValue("H1", "MOTIVO");
		$hoja->getColumnDimension('H')->setAutoSize(true);
	
		$hoja->getStyle('A1:H1')->getFont()->setBold(true);
	
		$columna=1;
		$fila=2;
	
		foreach ($respuesta as $row => $item){  
					
					$fechaInicio=$item['fecha_inicio'] != $item['fecha_fin'] ? substr($item['fecha_inicio'],8,2).'-'.substr($item['fecha_inicio'],5,2).'-'.substr($item['fecha_inicio'],0,4).' al '.substr($item['fecha_fin'],8,2).'-'.substr($item['fecha_fin'],5,2).'-'.substr($item['fecha_fin'],0,4) : substr($item['fecha_inicio'],8,2).'-'.substr($item['fecha_inicio'],5,2).'-'.substr($item['fecha_inicio'],0,4);
					
					if($item['tipo_solicitud'] != 1 ){
						if($item['tipo_solicitud'] == 2 ){
							$permiso="VACACIONES";
							$motivo = '';
							$horario='';
						}
						else{
							$permiso="CAMBIO DE GUARDIA";
							$motivo = '';
							$horario='';
						}     
					}
					else{
						$permiso = self::traducirPermisos($item["tipo_permiso"]);
						$motivo=$item['motivo'];
						if($item["tipo_permiso"] == 3 || $item["tipo_permiso"] == 7)
							$horario = '';
						else
							$horario = 'de las '.$item['horario_inicio'].' a las '.$item['horario_fin'];
					}
					
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['nombre'].' '.$item['paterno'].' '.$item['materno']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sucursal']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['departamento']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['puesto']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$permiso);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$fechaInicio);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$horario);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$motivo);
					$columna=1;
					$fila++;
				}  

		$nombreDelDocumento = "Reporte-permisos.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function reportes_vacaciones(){
	
		$data = array(
			"sucursal" => $this->sucursal,
			"usuario" => $this->usuario
		);
		
		$respuesta = Reportes::reporte_vacaciones($data);
	
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte de vacaciones')
			->setSubject('Reporte de vacaciones')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Recursos Humanos');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Vacaciones");
	
		
		$columna=1;
		$hoja->setCellValueByColumnAndRow($columna++,1,"NOMBRE");
		$hoja->setCellValueByColumnAndRow($columna++,1,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,1,"DIAS DISPONIBLES");
		$hoja->setCellValueByColumnAndRow($columna++,1,"DIAS DISFRUTADOS 2019");
		$hoja->setCellValueByColumnAndRow($columna++,1,"DIAS DISFRUTADOS 2020");
		$hoja->setCellValueByColumnAndRow($columna++,1,"TOTAL DE DIAS DISFRUTADOS");


		for ($i = 'A'; $i !== 'G'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		
	
		$columna=1;
		$fila=2;
		foreach ($respuesta as $row => $item){ 
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['paterno'].' '.$item['materno'].' '.$item['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sucursal']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['vacaciones']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Reportes::vacacionesDisponibles($item['id'],2019));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Reportes::vacacionesDisponibles($item['id'],2020));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Reportes::vacacionesDisponibles($item['id'],0));
					$columna=1;
					$fila++;
				}  

		$hoja->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('B1'), 'C1:F'.$fila);
		$hoja->getStyle('A1:F1')->getFont()->setBold(true);
		$documento->getActiveSheet()->freezePane('A2');
		$hoja->getStyle('A1:F1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');

		
		$nombreDelDocumento = "Reporte-vacaciones.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reportes_nutrifitness(){

		$numerosDeHojas=0;
		
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte de resultados Nutrifitness')
			->setSubject('Reporte de resultados Nutrifitness')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo Nutrifitness');

		for($i=1;$i<2;$i++){
			$hoja=$documento->setActiveSheetIndex($numerosDeHojas++);
			$hoja = $documento->getActiveSheet();
			$hoja->setTitle("Laboratorio ".$i);
			
			$hoja->setCellValue("A1", "CLAVE");
			$hoja->getColumnDimension('A')->setAutoSize(true);
			$hoja->setCellValue("B1", "NOMBRE");
			$hoja->getColumnDimension('B')->setAutoSize(true);
			$hoja->setCellValue("C1", "UBICACION");
			$hoja->getColumnDimension('C')->setAutoSize(true);
			$hoja->setCellValue("D1", "SUCURSAL");
			$hoja->getColumnDimension('D')->setAutoSize(true);
			$hoja->setCellValue("E1", "EQUIPO");
			$hoja->getColumnDimension('E')->setAutoSize(true);

			$hoja->setCellValue("F1", "COLESTEROL");
			$hoja->getColumnDimension('F')->setAutoSize(true);
			$hoja->setCellValue("G1", "GLUCOSA");
			$hoja->getColumnDimension('G')->setAutoSize(true);
			$hoja->setCellValue("H1", "HDL");
			$hoja->getColumnDimension('H')->setAutoSize(true);
			$hoja->setCellValue("I1", "LDL");
			$hoja->getColumnDimension('I')->setAutoSize(true);
			$hoja->setCellValue("J1", "TRIGLICERIDOS");
			$hoja->getColumnDimension('J')->setAutoSize(true);
			$hoja->setCellValue("K1", "COMENTARIOS");
			$hoja->getColumnDimension('K')->setAutoSize(true);


			$hoja->getStyle('A1:K1')->getFont()->setBold(true);

			$columna=1;
			$fila=2;

			$respuesta = Reportes::reportes_nutrifitness(1,$i);

			foreach ($respuesta as $row => $item){ 

				$sucursal = self::traducirSucursal($item['sucursal']);
				$equipo = self::equipo($item['id_usuario']);

				$sinSaltos= str_replace('<br />',' , ',$item['comentarios']);

				$hoja->getStyle('A'.$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['clave']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['paterno'].' '.$item['materno'].' '.$item['nombre']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$sucursal);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sucursal']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$equipo);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['colesterol']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['glucosa']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['HDL']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['LDL']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['trigliceridos']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,mb_strtoupper($sinSaltos,'utf-8'));
				$columna=1;
				$fila++;
			} 
		}

		for($i=1;$i<7;$i++){
			$documento->createSheet();//añadimos una nueva hoja

			$hoja = $documento->setActiveSheetIndex($numerosDeHojas++);
			$hoja = $documento->getActiveSheet();
			$hoja->setTitle("Corporal ".$i);
			
			$hoja->setCellValue("A1", "CLAVE");
			$hoja->getColumnDimension('A')->setAutoSize(true);
			$hoja->setCellValue("B1", "NOMBRE");
			$hoja->getColumnDimension('B')->setAutoSize(true);
			$hoja->setCellValue("C1", "UBICACION");
			$hoja->getColumnDimension('C')->setAutoSize(true);
			$hoja->setCellValue("D1", "SUCURSAL");
			$hoja->getColumnDimension('D')->setAutoSize(true);
			$hoja->setCellValue("E1", "EQUIPO");
			$hoja->getColumnDimension('E')->setAutoSize(true);

			$hoja->setCellValue("F1", "PESO");
			$hoja->getColumnDimension('F')->setAutoSize(true);
			$hoja->setCellValue("G1", "ESTATURA");
			$hoja->getColumnDimension('G')->setAutoSize(true);
			$hoja->setCellValue("H1", "MUSCULO");
			$hoja->getColumnDimension('H')->setAutoSize(true);
			$hoja->setCellValue("I1", "IMC");
			$hoja->getColumnDimension('I')->setAutoSize(true);
			$hoja->setCellValue("J1", "% GRASA");
			$hoja->getColumnDimension('J')->setAutoSize(true);
			$hoja->setCellValue("K1", "KG GRASA");
			$hoja->getColumnDimension('K')->setAutoSize(true);
			$hoja->setCellValue("L1", "GRASA VISCERAL");
			$hoja->getColumnDimension('L')->setAutoSize(true);
			$hoja->setCellValue("M1", "CINTURA");
			$hoja->getColumnDimension('M')->setAutoSize(true);
			$hoja->setCellValue("N1", "CLASIFICACIÓN IMC");
			$hoja->getColumnDimension('N')->setAutoSize(true);
			$hoja->setCellValue("O1", "CASIFICACIÓN CINTURA");
			$hoja->getColumnDimension('O')->setAutoSize(true);
			$hoja->setCellValue("P1", "COMENTARIOS");
			$hoja->getColumnDimension('P')->setAutoSize(true);
	
			$hoja->getStyle('A1:P1')->getFont()->setBold(true);

			$columna=1;
			$fila=2;

			$respuesta = Reportes::reportes_nutrifitness(2,$i);

			foreach ($respuesta as $row => $item){ 

				$sucursal = self::traducirSucursal($item['sucursal']);
				$equipo = self::equipo($item['id_usuario']);

				$sinSaltos= str_replace('<br />',' , ',$item['comentarios']);

				$categoriaImc = "";
				if($item['imc'] > 0 && $item['imc'] < 18.5)
					$categoriaImc = "PESO BAJO";
				else if($item['imc'] >= 18.5 && $item['imc'] < 25)
					$categoriaImc = "PESO NORMAL";
				else if($item['imc'] >= 25 && $item['imc'] < 30)
					$categoriaImc = "SOBREPESO";
				else if($item['imc'] >= 30)
					$categoriaImc = "OBESIDAD";
		
				$categoriaCintura = '';
				if($item['cintura'] > 0 AND ( ($item['cintura'] < 90 AND $item['genero'] == "M") || ($item['cintura'] < 80 AND $item['genero'] == "F")))
					$categoriaCintura = 'SALUDABLE';
				else if( ($item['cintura'] >= 90 AND $item['genero'] == "M") || ($item['cintura'] >= 80 AND $item['genero'] == "F"))
					$categoriaCintura = 'RIESGO CARDIOVASCULAR';

				$hoja->getStyle('A'.$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['clave']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['paterno'].' '.$item['materno'].' '.$item['nombre']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$sucursal);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sucursal']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$equipo);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['peso']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['estatura']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['musculo']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['imc']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['grasa_porcentaje']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['grasa_kilos']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['grasa_biceral']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cintura']);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$categoriaImc);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,$categoriaCintura);
				$hoja->setCellValueByColumnAndRow($columna++,$fila,mb_strtoupper($sinSaltos,'utf-8'));
			
				$columna=1;
				$fila++;
			} 
		}
		
	//	$hoja->getStyle('E'.$fila)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER)
		$documento->setActiveSheetIndex(0);//la hoja que aparecera activa
		$nombreDelDocumento = "Reporte-Nutrifitness.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function formatoLlenadoNominas001(){
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales')
			->setTitle('Reporte nóminas')
			->setSubject('Reporte nóminas')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nóminas');

			
	
		$hoja = $documento->getActiveSheet();

		$hoja->setTitle("Captura Nóminas");
	/**************************************************************** */
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:BD1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

	/**********************************************************************************************************************/
		$hoja->setCellValue("A2", "TABLA DE LIBERACIÓN");
		$hoja->mergeCells('A2:R2');
		$hoja->setCellValue("S2", "SUELDOS Y SALARIOS");
		$hoja->mergeCells('S2:AN2');
		$hoja->setCellValue("AO2", "DESCUENTOS AL TRABAJADOR (EXCEDENTE)");
		$hoja->mergeCells('AO2:BC2');
		
		$hoja->getStyle('A2:BD2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A2:BD2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A2:BD2')->getFont()->setBold(true);

		$hoja->getStyle('A2:R2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('S2:AM2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN2:BD2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
	
		$columna=1;
		$fila=3;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESQUEMA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PAGADORA SINDICATO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DEVENGADA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE DEL CLIENTE");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE POR ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DONATIVO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EXCEDENTE DE CARGAS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA PATRONAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS OBRERA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA SOCIAL IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR/ISP(SP)");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR art. 142");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CUOTA SINDICAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESPENSA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAJA DE AHORRO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTO IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"APOYO SINDICAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTOS COMEDOR");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HABERES");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"GMM");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRESTAMOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PAGO A TERCEROS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE");

		//$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)");



		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RECUPERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN COBRADA ASOCIO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA GMM");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS	(NO INCLUYAS COMILLAS SIMPLES NI DOBLES)");
		
		for ($i = 'R'; $i !== 'BD'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getColumnDimension('A')->setWidth(40);
		$hoja->getColumnDimension('B')->setWidth(40);
		$hoja->getColumnDimension('C')->setWidth(25);
		$hoja->getColumnDimension('D')->setWidth(60);
		$hoja->getColumnDimension('E')->setWidth(35);
		$hoja->getColumnDimension('F')->setWidth(35);
		$hoja->getColumnDimension('G')->setWidth(20);
		$hoja->getColumnDimension('H')->setWidth(60);
		$hoja->getColumnDimension('I')->setWidth(20);
		$hoja->getColumnDimension('J')->setWidth(20);
		$hoja->getColumnDimension('K')->setWidth(20);
		$hoja->getColumnDimension('L')->setWidth(70);
		$hoja->getColumnDimension('M')->setWidth(30);
		$hoja->getColumnDimension('N')->setWidth(40);
		$hoja->getColumnDimension('O')->setWidth(36);
		$hoja->getColumnDimension('P')->setWidth(30);
		$hoja->getColumnDimension('Q')->setWidth(30);
		$hoja->getColumnDimension('R')->setWidth(30);
	    $hoja->getColumnDimension('BD')->setWidth(120);

		$hoja->getStyle('A3:BD3')->getFont()->setBold(true);

		$hoja->getStyle('A3:BD3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A3:BD3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A3:R3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('S3:AN3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AO3:BD3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');

		$hoja->getStyle('A4:BD4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFCC');

		
	/**************************************************************** */
		
		$documento->createSheet();//añadimos una nueva hoja
		$hoja2 = $documento->setActiveSheetIndex(1);
		$hoja2= $documento->getActiveSheet();
		$hoja2->setTitle("Options");
		
		//Proteger segunda hoja 
		$hoja2->getProtection()->setPassword('3998202097258335');
		$hoja2->getProtection()->setSheet(true);
		$hoja2->getProtection()->setSort(true);
		$hoja2->getProtection()->setInsertRows(true);
		$hoja2->getProtection()->setInsertColumns(true);
		$hoja2->getProtection()->setFormatCells(true);

		/**********************************************************************************/

		$respuesta = Nominas::mostrarListas(Tablas::clientes());
		$indice=1;
		foreach($respuesta as $row => $item){
			$documento->getSheetByName('Options')->SetCellValue("A".$indice,$item["nombre"]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'clientes', $documento->getSheetByName('Options'), 'A1:A'.$indice ) );


		$respuesta = Nominas::traducirTipoPago(true);
		$indice=1;
		$longitud = sizeof($respuesta);
		for($i=0;$i<$longitud;$i++){
			$documento->getSheetByName('Options')->SetCellValue("B".$indice,$respuesta[$i]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'movimientos', $documento->getSheetByName('Options'), 'B1:B'.$indice ) );


		$respuesta = Nominas::mostrarListas(Tablas::facturadoras());
		$indice=1;
		foreach($respuesta as $row => $item){
			$documento->getSheetByName('Options')->SetCellValue("C".$indice,$item["nombre"]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'facturadoras', $documento->getSheetByName('Options'), 'C1:C'.$indice ) );



		$respuesta = Nominas::mostrarListas(Tablas::imss());
		$indice=1;
		foreach($respuesta as $row => $item){
			$documento->getSheetByName('Options')->SetCellValue("D".$indice,$item["nombre"]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'imss', $documento->getSheetByName('Options'), 'D1:D'.$indice ) );



		$respuesta = Nominas::mostrarListas(Tablas::asimilados());
		$indice=1;
		foreach($respuesta as $row => $item){
			$documento->getSheetByName('Options')->SetCellValue("E".$indice,$item["nombre"]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'asimilados', $documento->getSheetByName('Options'), 'E1:E'.$indice ) );


		$respuesta = Nominas::traducirTipoRegimen(true);
		$indice=1;
		$longitud = sizeof($respuesta);
		for($i=0;$i<$longitud;$i++){
			$documento->getSheetByName('Options')->SetCellValue("F".$indice,$respuesta[$i]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'regimen', $documento->getSheetByName('Options'), 'F1:F'.$indice ) );

		
		$respuesta = Nominas::traducirTipoPeriodo(true);
		$indice=1;
		$longitud = sizeof($respuesta);
		for($i=0;$i<$longitud;$i++){
			$documento->getSheetByName('Options')->SetCellValue("G".$indice,$respuesta[$i]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'periodo', $documento->getSheetByName('Options'), 'G1:G'.$indice ) );


		$respuesta = Nominas::traducirTipoEsquema(true);
		$indice=1;
		$longitud = sizeof($respuesta);
		for($i=0;$i<$longitud;$i++){
			$documento->getSheetByName('Options')->SetCellValue("H".$indice,$respuesta[$i]); 
			$indice++;
		}
		$indice = $indice - 1;
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'esquema', $documento->getSheetByName('Options'), 'H1:H'.$indice ) );

		
		$documento->getSheetByName('Options')->SetCellValue("I1",'NO');
		$documento->getSheetByName('Options')->SetCellValue("I2",'SI');  
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'devengada', $documento->getSheetByName('Options'), 'I1:I2' ) );

		$documento->getSheetByName('Options')->SetCellValue("J1",'SINDICATO ASESORES / CROM');
		$documento->getSheetByName('Options')->SetCellValue("J2",'SINDICATO BUDAPEST');  
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'sindicatos', $documento->getSheetByName('Options'), 'J1:J2' ) );
		
		/**********************************************************************************/
		$documento->setActiveSheetIndex(0);//la hoja que aparecera activa
		$documento->getSheetByName('Options')->setSheetState(Worksheet::SHEETSTATE_HIDDEN); //oculto la hoja de opciones
		/*$documento->getActiveSheet()->freezePane('A1');
		$documento->getActiveSheet()->freezePane('A2');
		$documento->getActiveSheet()->freezePane('A3');
		$documento->getActiveSheet()->freezePane('A4');*/
		$documento->getActiveSheet()->freezePane('A5');
	
		$documento->getActiveSheet()->getProtection()->setPassword('3998202097258335');
		$documento->getActiveSheet()->getProtection()->setSheet(true);
		$documento->getActiveSheet()->getProtection()->setSort(true);
		$documento->getActiveSheet()->getProtection()->setInsertRows(true);
		$documento->getActiveSheet()->getProtection()->setInsertColumns(true);
		$documento->getActiveSheet()->getProtection()->setFormatCells(true);
		
	

		$documento->getActiveSheet()->getStyle('A5:BD104')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);

		/*$documento->getSecurity()->setLockWindows(true);
		$documento->getSecurity()->setLockStructure(true);
		$documento->getSecurity()->setWorkbookPassword("$jhhhsgsgss_tydtuyns65453");*/
	
		$letra='A';
    	$letras=array();
		for($i=0;$i<$columna;$i++) 
        	$letras[$i] = $letra++;    
	
		$columna=1;
		$fila=4;

		for($i=0;$i<6;$i++){
			$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$hoja->setCellValueByColumnAndRow($columna++,$fila,'OPCIÓN MULTIPLE');
		}

		$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
		$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
		$hoja->setCellValueByColumnAndRow($columna++,$fila,'000,000,000.00');

		$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow($columna++,$fila,'OPCIÓN MULTIPLE');

		for($i=0;$i<3;$i++){
			$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$hoja->setCellValueByColumnAndRow($columna++,$fila,'000,000,000.00');
		}

		for($i=0;$i<2;$i++){
			$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$hoja->setCellValueByColumnAndRow($columna++,$fila,'OPCIÓN MULTIPLE');

			$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$hoja->setCellValueByColumnAndRow($columna++,$fila,'000,000,000.00');
		}

		$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow($columna++,$fila,'OPCIÓN MULTIPLE');

		for($i=0;$i<2;$i++){
			$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$hoja->setCellValueByColumnAndRow($columna++,$fila,'NÚMERO ENTERO');
		}

		for($i=0;$i<37;$i++){
			$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
			$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
			$hoja->setCellValueByColumnAndRow($columna++,$fila,'000,000,000.00');
		}

		$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow($columna++,$fila,'TEXTO');
		
		

		$columna=1;
		$fila=5;
		for($i=0;$i<100;$i++){  

						for($j=0;$j<6;$j++){
							$hoja->setCellValueByColumnAndRow($columna++,$fila,'');
						}

						$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
						$hoja->setCellValueByColumnAndRow($columna++,$fila,'');

						$hoja->setCellValueByColumnAndRow($columna++,$fila,'');

						for($j=0;$j<3;$j++){
							$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
							$hoja->setCellValueByColumnAndRow($columna++,$fila,'');
						}

						for($j=0;$j<2;$j++){
							$hoja->setCellValueByColumnAndRow($columna++,$fila,'');
				
							$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
							$hoja->setCellValueByColumnAndRow($columna++,$fila,'');
						}

						$hoja->setCellValueByColumnAndRow($columna++,$fila,'');//TIPO DE PERIODO
					
						for($j=0;$j<2;$j++){
							$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
							$hoja->setCellValueByColumnAndRow($columna++,$fila,'');
						}

						for($j=0;$j<37;$j++){
							$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
							$hoja->setCellValueByColumnAndRow($columna++,$fila,'');
						}

						$hoja->setCellValueByColumnAndRow($columna++,$fila,'');

					
					$objValidation = $documento->getActiveSheet()->getCell('A'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Error de captura'); 
					$objValidation->setError('El valor no existe.'); 
					//$objValidation->setPromptTitle('Selecciona un elemento de la lista'); 
					//$objValidation->setPrompt('Selecciona un elemento de la lista');
					$objValidation->setFormula1("=esquema"); 

					$objValidation = $documento->getActiveSheet()->getCell('B'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=sindicatos"); 

					$objValidation = $documento->getActiveSheet()->getCell('C'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=devengada"); 

					$objValidation = $documento->getActiveSheet()->getCell('D'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=clientes"); 

					$objValidation = $documento->getActiveSheet()->getCell('E'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=movimientos"); 

					$objValidation = $documento->getActiveSheet()->getCell('F'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=regimen"); 

					$objValidation = $documento->getActiveSheet()->getCell('H'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=facturadoras"); 

					$objValidation = $documento->getActiveSheet()->getCell('L'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=imss"); 

					$objValidation = $documento->getActiveSheet()->getCell('N'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=asimilados"); 

					$objValidation = $documento->getActiveSheet()->getCell('P'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					$objValidation->setFormula1("=periodo"); 
							
					$columna=1;
					$fila++;
		}  

		$nombreDelDocumento = "Reporte-nominas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function formatoLlenadoTesoreria001(){
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales')
			->setTitle('Reporte nóminas')
			->setSubject('Reporte nóminas')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nóminas');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Solicitudes");
	/**************************************************************** */
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:S1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

		$hoja->setCellValue("T1", "FINANZAS");
		$hoja->mergeCells('T1:AC1');
		$hoja->getStyle('T1')->getFont()->setBold(true);
		$hoja->getStyle('T1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('T1:AC1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->setCellValue("AD1", "TESORERIA");
		$hoja->mergeCells('AD1:AE1');
		$hoja->getStyle('AD1')->getFont()->setBold(true);
		$hoja->getStyle('AD1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('AD1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AD1:AE1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');

		$columna=1;
		$fila=3;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FINANCIADA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA Y HORA DEL DEPOSITO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO ASMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS	(NO INCLUYAS COMILLAS SIMPLES NI DOBLES)");
	
		$hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->getColumnDimension('B')->setWidth(60);
		$hoja->getColumnDimension('C')->setWidth(30);
		$hoja->getColumnDimension('D')->setWidth(30);

		$hoja->getColumnDimension('E')->setWidth(20);
		$hoja->getColumnDimension('F')->setWidth(60);



		$hoja->getColumnDimension('G')->setWidth(20);
		$hoja->getColumnDimension('H')->setWidth(20);
		$hoja->getColumnDimension('I')->setWidth(20);


		$hoja->getColumnDimension('J')->setWidth(60);
		$hoja->getColumnDimension('K')->setWidth(20);

		$hoja->getColumnDimension('L')->setWidth(60);
		$hoja->getColumnDimension('M')->setWidth(20);

		$hoja->getColumnDimension('N')->setAutoSize(true);
		$hoja->getColumnDimension('O')->setAutoSize(true);
		$hoja->getColumnDimension('P')->setAutoSize(true);
		$hoja->getColumnDimension('Q')->setWidth(100);
		$hoja->getColumnDimension('R')->setWidth(60);
		$hoja->getColumnDimension('S')->setWidth(60);

		for ($i = 'T'; $i !== 'AA'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getColumnDimension('AA')->setWidth(120);
		$hoja->getColumnDimension('AB')->setWidth(60);
		$hoja->getColumnDimension('AC')->setWidth(60);

		$hoja->getColumnDimension('AD')->setWidth(30);
		$hoja->getColumnDimension('AE')->setWidth(120);

		$hoja->getStyle('A3:AE3')->getFont()->setBold(true);
		$hoja->getStyle('A3:AE3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		$hoja->getStyle('A3:S3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('963634');
		$hoja->getStyle('B3:P3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('367fa9');
		$hoja->getStyle('Q3:S3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		$hoja->getStyle('T3:AC3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->getStyle('AA3:AC3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AA3:AC3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');

		//$hoja->getStyle('T3:Z3')->getFont()->getColor()->setARGB(Color::COLOR_BLACK);
		$hoja->getStyle('A2:AE2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFCC');

		$hoja->getStyle('AD3:AE3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AD3:AE3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');

		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
			$letras[$i] = $letra++;  
			
		$columna=1;
		$fila=4;
	/**************************************************************** */

		$documento->createSheet();//añadimos una nueva hoja
		$hoja2 = $documento->setActiveSheetIndex(1);
		$hoja2 = $documento->getActiveSheet();
		$hoja2->setTitle("Options");

		//Proteger segunda hoja 
		$hoja2->getProtection()->setPassword('3998202097258335');
		$hoja2->getProtection()->setSheet(true);
		$hoja2->getProtection()->setSort(true);
		$hoja2->getProtection()->setInsertRows(true);
		$hoja2->getProtection()->setDeleteRows(true);
		$hoja2->getProtection()->setInsertColumns(true);
		$hoja2->getProtection()->setFormatCells(true);
		
		$documento->getSheetByName('Options')->SetCellValue("A1", "");
		$documento->getSheetByName('Options')->SetCellValue("A2", "PENDIENTE"); 
		$documento->getSheetByName('Options')->SetCellValue("A3", "PAGADA"); 
		$documento->getSheetByName('Options')->SetCellValue("A4", "PAGADA CON DEVOLUCIÓN"); 
		$documento->getSheetByName('Options')->SetCellValue("A5", "PAGADA CON OBSERVACIÓN"); 
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'estatus', $documento->getSheetByName('Options'), 'A1:A5' ) );
	
		/**********************************************************************************/
		$documento->setActiveSheetIndex(0);//la hoja que aparecera activa
		$documento->getSheetByName('Options')->setSheetState(Worksheet::SHEETSTATE_HIDDEN); //oculto la hoja de opciones
		$documento->getActiveSheet()->freezePane('A4');

		$documento->getActiveSheet()->getProtection()->setPassword('3998202097258335');
		$documento->getActiveSheet()->getProtection()->setSheet(true);
		$documento->getActiveSheet()->getProtection()->setSort(true);
		$documento->getActiveSheet()->getProtection()->setInsertRows(true);
		$documento->getActiveSheet()->getProtection()->setDeleteRows(true);
		$documento->getActiveSheet()->getProtection()->setInsertColumns(true);
		$documento->getActiveSheet()->getProtection()->setFormatCells(true);

		$respuesta =Reportes::nominas(3);
		$documento->getActiveSheet()->getStyle('AD4:AE'.(count($respuesta) + 3 ) )->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);

		$documento->getActiveSheet()->setAutoFilter('A3:AE3');
		/**********************************************************************************/
		$hoja->getStyle('AD2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(30,2,'OPCIÓN MULTIPLE');
		$hoja->getStyle('AE2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(31,2,'TEXTO');
		
		foreach ($respuesta as $row => $item){  

					$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					/*$capturaNominista = explode ( " ", $item['captura_nominista']);*/
					$finanzas = NominasModel::datos2($item["id_finanzas"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					/*$capturaFinanzas = explode ( " ", $item['captura_finanzas']);*/

					if($item['empresa_asimilados'] !== NULL)
						$item['empresa_asimilados'] = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$item['empresa_imss'] = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					/*$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoEsquema($item['esquema']));*/
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['sucursal']);

					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['financiada'] !== NULL ? Nominas::traducirSiOnoInverso($item['financiada']) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, ($item['fecha_envio'] !== NULL ? substr($item['fecha_envio'],8,2).'/'.substr($item['fecha_envio'],5,2).'/'.substr($item['fecha_envio'],0,4) : '').' - '.($item['hora_envio'] !== NULL ? substr($item['hora_envio'],0,5) : ''));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirObservaciones($item['observaciones']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fecha_liberacion'] !== NULL ? substr($item['fecha_liberacion'],8,2).'/'.substr($item['fecha_liberacion'],5,2).'/'.substr($item['fecha_liberacion'],0,4) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_imss'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_imss']) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_asimilados'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_asimilados']) : '' );
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_finanzas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['sucursal']);


					
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['id_tesoreria'] == NULL ? '' : Nominas::traducirEstatusNominas($item['tesoreria_estatus']) );
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_tesoreria']));

					$objValidation = $documento->getActiveSheet()->getCell('AD'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					//$objValidation->setPrompt('Please pick a value from the drop-down list.'); 
					$objValidation->setFormula1("=estatus"); //note this! 
			
					$columna=1;
					$fila++;
		}  

		
		$nombreDelDocumento = "Formato-Tesoreria.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function formatoLlenadoFinanazas001(){
		
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales')
			->setTitle('Reporte nóminas')
			->setSubject('Reporte nóminas')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nóminas');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Solicitudes");
	/**************************************************************** */
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:S1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

		$hoja->setCellValue("T1", "FINANZAS");
		$hoja->mergeCells('T1:AB1');
		$hoja->getStyle('T1')->getFont()->setBold(true);
		$hoja->getStyle('T1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('T1:AB1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$columna=1;
		$fila=3;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FINANCIADA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DEL DEPOSITO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA DEL DEPOSITO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO ASMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS	(NO INCLUYAS COMILLAS SIMPLES NI DOBLES)");
	
		$hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->getColumnDimension('B')->setWidth(60);
		$hoja->getColumnDimension('C')->setWidth(30);
		$hoja->getColumnDimension('D')->setWidth(30);

		$hoja->getColumnDimension('E')->setWidth(20);
		$hoja->getColumnDimension('F')->setWidth(60);



		$hoja->getColumnDimension('G')->setWidth(20);
		$hoja->getColumnDimension('H')->setWidth(20);
		$hoja->getColumnDimension('I')->setWidth(20);


		$hoja->getColumnDimension('J')->setWidth(60);
		$hoja->getColumnDimension('K')->setWidth(20);


		$hoja->getColumnDimension('L')->setWidth(60);
		$hoja->getColumnDimension('M')->setWidth(20);


		$hoja->getColumnDimension('N')->setAutoSize(true);
		$hoja->getColumnDimension('O')->setAutoSize(true);
		$hoja->getColumnDimension('P')->setAutoSize(true);
		$hoja->getColumnDimension('Q')->setWidth(100);
		$hoja->getColumnDimension('R')->setWidth(60);
		$hoja->getColumnDimension('S')->setWidth(60);

		for ($i = 'T'; $i !== 'AB'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

	    $hoja->getColumnDimension('AB')->setWidth(120);

		$hoja->getStyle('A3:AB3')->getFont()->setBold(true);
		$hoja->getStyle('A3:AB3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		$hoja->getStyle('A3:S3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('963634');
		$hoja->getStyle('B3:P3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('367fa9');
		$hoja->getStyle('Q3:S3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		$hoja->getStyle('T3:AB3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->getStyle('T2:AB2')->getFont()->getColor()->setARGB(Color::COLOR_BLACK);
		$hoja->getStyle('A2:AB2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFCC');
		
		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
			$letras[$i] = $letra++;  
			
		$columna=1;
		$fila=4;
	/**************************************************************** */

		$documento->createSheet();//añadimos una nueva hoja
		$hoja2 = $documento->setActiveSheetIndex(1);
		$hoja2 = $documento->getActiveSheet();
		$hoja2->setTitle("Options");

		//Proteger segunda hoja 
		$hoja2->getProtection()->setPassword('3998202097258335');
		$hoja2->getProtection()->setSheet(true);
		$hoja2->getProtection()->setSort(true);
		$hoja2->getProtection()->setInsertRows(true);
		$hoja2->getProtection()->setDeleteRows(true);
		$hoja2->getProtection()->setInsertColumns(true);
		$hoja2->getProtection()->setFormatCells(true);

		$documento->getSheetByName('Options')->SetCellValue("A1",'NO');
		$documento->getSheetByName('Options')->SetCellValue("A2",'SI');  
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'simple', $documento->getSheetByName('Options'), 'A1:A2' ) );

		$documento->getSheetByName('Options')->SetCellValue("B1", "PENDIENTE"); 
		$documento->getSheetByName('Options')->SetCellValue("B2", "LIBERADA"); 
		$documento->getSheetByName('Options')->SetCellValue("B3", "CANCELADA"); 
		$documento->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange( 'estatus', $documento->getSheetByName('Options'), 'B1:B3' ) ); 
	
		/**********************************************************************************/
		$documento->setActiveSheetIndex(0);//la hoja que aparecera activa
		$documento->getSheetByName('Options')->setSheetState(Worksheet::SHEETSTATE_HIDDEN); //oculto la hoja de opciones
		//$documento->getActiveSheet()->freezePane('A1');
		$documento->getActiveSheet()->freezePane('A4');

		$documento->getActiveSheet()->getProtection()->setPassword('3998202097258335');
		$documento->getActiveSheet()->getProtection()->setSheet(true);
		$documento->getActiveSheet()->getProtection()->setSort(true);
		$documento->getActiveSheet()->getProtection()->setInsertRows(true);
		$documento->getActiveSheet()->getProtection()->setDeleteRows(true);
		$documento->getActiveSheet()->getProtection()->setInsertColumns(true);
		$documento->getActiveSheet()->getProtection()->setFormatCells(true);

		$respuesta =Reportes::nominas(2);
		$documento->getActiveSheet()->getStyle('T4:AB'.(count($respuesta) + 3 ) )->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);

		/*$documento->getActiveSheet()->setAutoFilter(
			$documento->getActiveSheet()->calculateWorksheetDimension()
		);*/

		$documento->getActiveSheet()->setAutoFilter("A3:AB3");

		/**********************************************************************************/
		$hoja->getStyle('T2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(20,2,'OPCIÓN MULTIPLE');
		$hoja->getStyle('U2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(21,2,'DD/MM/AAAA');
		$hoja->getStyle('V2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(22,2,'HH:MM');
		$hoja->getStyle('W2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(23,2,'ALFANÚMERICO');
		$hoja->getStyle('X2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(24,2,'OPCIÓN MULTIPLE');
		$hoja->getStyle('Y2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(25,2,'DD/MM/AAAA');
		$hoja->getStyle('Z2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(26,2,'OPCIÓN MULTIPLE');
		$hoja->getStyle('AA2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(27,2,'OPCIÓN MULTIPLE');
		$hoja->getStyle('AB2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->setCellValueByColumnAndRow(28,2,'TEXTO');
		
		foreach ($respuesta as $row => $item){  

					$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					/*$capturaNominista = explode ( " ", $item['captura_nominista']);
					$finanzas = NominasModel::datos2($item["id_finanzas"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					$capturaFinanzas = explode ( " ", $item['captura_finanzas']);*/

					if($item['empresa_asimilados'] !== NULL)
						$item['empresa_asimilados'] = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$item['empresa_imss'] = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					/*$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoEsquema($item['esquema']));*/
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['sucursal']);


					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['financiada'] !== NULL ? Nominas::traducirSiOnoInverso($item['financiada']) : '' );
					
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fecha_envio'] !== NULL ? substr($item['fecha_envio'],8,2).'/'.substr($item['fecha_envio'],5,2).'/'.substr($item['fecha_envio'],0,4) : '' );
					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['hora_envio'] !== NULL ? substr($item['hora_envio'],0,5) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['numero_factura'] !== NULL ? $item['numero_factura'] : '');
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['observaciones'] !== NULL ? Nominas::traducirObservaciones($item['observaciones']) : '' );



					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fecha_liberacion'] !== NULL ? substr($item['fecha_liberacion'],8,2).'/'.substr($item['fecha_liberacion'],5,2).'/'.substr($item['fecha_liberacion'],0,4) : '' );
					
					
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_imss'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_imss']) : '');
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_asimilados'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_asimilados']) : '');
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['comentarios_finanzas'] !== NULL ? str_replace('<br />','; ',$item['comentarios_finanzas']) : '');
				

					/*$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle('E'.$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle('E'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,' '.$item['fecha_envio']);
					$hoja->getStyle('F'.$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle('F'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['hora_envio']);
					$hoja->getStyle('G'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_facturar']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pagadora_imss']);
					$hoja->getStyle('I'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_dispersion_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pagadora_asimilados']);
					$hoja->getStyle('K'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_dispersion_asimilados']);
					$hoja->getStyle('L'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision']);
					$hoja->getStyle('M'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle('N'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente']);
					$hoja->getStyle('O'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['infonavit']);
					$hoja->getStyle('P'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['carga_patronal']);
					$hoja->getStyle('Q'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['carga_social']);
					$hoja->getStyle('R'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isn']);
					$hoja->getStyle('S'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr']);
					$hoja->getStyle('T'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fonacot']);
					$hoja->getStyle('U'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['gastos_medicos']);
					$hoja->getStyle('V'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['recuperacion']);
					$hoja->getStyle('W'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuentos']);
					$hoja->getStyle('X'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['prenomina_imss']);
					$hoja->getStyle('Y'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['deducciones']);
					$hoja->getStyle('Z'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['factor_ahorro_patronal']);
					$hoja->getStyle('AA'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['factor_integracion']);
					$hoja->getStyle('AB'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['ispt']);
					$hoja->getStyle('AC'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sar']);
					$hoja->getStyle('AD'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['tarjeta_empresarial']);
					$hoja->getStyle('AE'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['prestamos']);
					$hoja->getStyle('AF'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pension_alimenticia']);
					$hoja->getStyle('AG'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subsidio_empleo']);
					$hoja->getStyle('AH'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fondo_ahorro_trabajador']);
					$hoja->getStyle('AI'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['notas_credito']);
					$hoja->getStyle('AJ'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['nomina_devengada']);
					$hoja->getStyle('AK'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['movimiento_sin_factura']);
					$hoja->getStyle('AL'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pago_otra_sucursal']);
					$hoja->getStyle('AM'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['otros']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['sucursal']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fecha_registro_nominista']);


					$hoja->getStyle('AT'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow('AT',$fila,'');
					$hoja->getStyle('AU'.$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle('AU'.$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow('AU',$fila,'');*/

					$objValidation = $documento->getActiveSheet()->getCell('T'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					//$objValidation->setPrompt('Please pick a value from the drop-down list.'); 
					$objValidation->setFormula1("=simple"); //note this! 


					$objValidation = $documento->getActiveSheet()->getCell('X'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					//$objValidation->setPrompt('Please pick a value from the drop-down list.'); 
					$objValidation->setFormula1("=estatus"); //note this! 
			

					$objValidation = $documento->getActiveSheet()->getCell('Z'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					//$objValidation->setPrompt('Please pick a value from the drop-down list.'); 
					$objValidation->setFormula1("=simple"); //note this! 

					$objValidation = $documento->getActiveSheet()->getCell('AA'.$fila)->getDataValidation(); 
					$objValidation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST ); 
					$objValidation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP); 
					$objValidation->setAllowBlank(false); 
					$objValidation->setShowInputMessage(true); 
					$objValidation->setShowErrorMessage(true); 
					$objValidation->setShowDropDown(true); 
					$objValidation->setErrorTitle('Input error'); 
					$objValidation->setError('El valor no existe.'); 
					$objValidation->setPromptTitle('Pick from list'); 
					//$objValidation->setPrompt('Please pick a value from the drop-down list.'); 
					$objValidation->setFormula1("=simple"); //note this! 

					$columna=1;
					$fila++;
		}  

		
		$nombreDelDocumento = "Formato-Finanzas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function giro_empleados_vigentes(){
		
		$respuesta = ConsultasGiro::giro_empleados_vigentes();	
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte de vacaciones')
			->setSubject('Reporte de vacaciones')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Recursos Humanos');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Empleados Vigentes");
	
		$hoja->setCellValue("A1", "CLAVE");
		$hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->setCellValue("B1", "NOMBRE");
		$hoja->getColumnDimension('B')->setAutoSize(true);
		$hoja->setCellValue("C1", "RFC");
		$hoja->getColumnDimension('C')->setAutoSize(true);
		$hoja->setCellValue("D1", "CURP");
		$hoja->getColumnDimension('D')->setAutoSize(true);
		$hoja->setCellValue("E1", "No. IMSS");
		$hoja->getColumnDimension('E')->setAutoSize(true);
		$hoja->setCellValue("F1", "F. ALTA");
		$hoja->getColumnDimension('F')->setAutoSize(true);
		$hoja->setCellValue("G1", "CLAVE SUCURSAL");
		$hoja->getColumnDimension('G')->setAutoSize(true);
		$hoja->setCellValue("H1", "NOMBRE SUCURSAL");
		$hoja->getColumnDimension('H')->setAutoSize(true);
		$hoja->setCellValue("I1", "CLAVE NOMINA");
		$hoja->getColumnDimension('I')->setAutoSize(true);
		$hoja->setCellValue("J1", "NOMINA");
		$hoja->getColumnDimension('J')->setAutoSize(true);
		$hoja->setCellValue("K1", "CLAVE DEPARTAMENTO");
		$hoja->getColumnDimension('K')->setAutoSize(true);
		$hoja->setCellValue("L1", "DEPARTAMENTO");
		$hoja->getColumnDimension('L')->setAutoSize(true);
		$hoja->setCellValue("M1", "CLAVE PUESTO");
		$hoja->getColumnDimension('M')->setAutoSize(true);
		$hoja->setCellValue("N1", "PUESTO");
		$hoja->getColumnDimension('N')->setAutoSize(true);
		$hoja->setCellValue("O1", "S. DIARIO");
		$hoja->getColumnDimension('O')->setAutoSize(true);
		$hoja->setCellValue("P1", "S. INTEGRADO");
		$hoja->getColumnDimension('P')->setAutoSize(true);
		$hoja->setCellValue("Q1", "No. CREDITO INFONAVIT");
		$hoja->getColumnDimension('Q')->setAutoSize(true);
		$hoja->setCellValue("R1", "INICIO FECHA DESCUENTO");
		$hoja->getColumnDimension('R')->setAutoSize(true);
		$hoja->setCellValue("S1", "TIPO DESCUENTO");
		$hoja->getColumnDimension('S')->setAutoSize(true);
		$hoja->setCellValue("T1", "VALOR DE DESCUENTO");
		$hoja->getColumnDimension('T')->setAutoSize(true);
		$hoja->setCellValue("U1", "CLAVE TURNO");
		$hoja->getColumnDimension('U')->setAutoSize(true);
		$hoja->setCellValue("V1", "DESCRIPCIÓN TURNO");
		$hoja->getColumnDimension('V')->setAutoSize(true);
		$hoja->setCellValue("W1", "TIPO EMPLEADO");//ESQUEMA
		$hoja->getColumnDimension('W')->setAutoSize(true);
		$hoja->setCellValue("X1", "CLAVE REGIMEN");
		$hoja->getColumnDimension('X')->setAutoSize(true);
		$hoja->setCellValue("Y1", "REGIMEN");
		$hoja->getColumnDimension('Y')->setAutoSize(true);
		$hoja->setCellValue("Z1", "CLAVE TIPO CONTRATO");
		$hoja->getColumnDimension('Z')->setAutoSize(true);
		$hoja->setCellValue("AA1", "TIPO CONTRATO");
		$hoja->getColumnDimension('AA')->setAutoSize(true);
		$hoja->setCellValue("AB1", "FECHA DE BAJA");
		$hoja->getColumnDimension('AB')->setAutoSize(true);
		$hoja->setCellValue("AC1", "PAGADORA SYS");
		$hoja->getColumnDimension('AC')->setAutoSize(true);
		$hoja->setCellValue("AD1", "NOMBRE RP");
		$hoja->getColumnDimension('AD')->setAutoSize(true);
		$hoja->setCellValue("AE1", "REGISTRO PATRONAL");
		$hoja->getColumnDimension('AE')->setAutoSize(true);
		$hoja->setCellValue("AF1", "PAGADORA IAS");
		$hoja->getColumnDimension('AF')->setAutoSize(true);
		$hoja->setCellValue("AG1", "NOMBRE PAGADORA");
		$hoja->getColumnDimension('AG')->setAutoSize(true);
		$hoja->getStyle('A1:AG1')->getFont()->setBold(true);
	
		$columna=1;
		$fila=2;
	
		foreach ($respuesta as $row => $item){ 
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['RFC']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CURP']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['AFILIACION']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,substr($item['INGRESO'],8,2).'-'.substr($item['INGRESO'],5,2).'-'.substr($item['INGRESO'],0,4));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_SUCURSAL']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE_SUCURSAL']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_NOMINA']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE_NOMINA']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_DEPTO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE_DEPTO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_PUESTO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE_PUESTO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['S_DIARIO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['S_INTEGRADO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CREDITO_INFONAVIT']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['INICIO_DESCUENTO_INF']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['TIPO_DESCUENTO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['VALOR_DESCUENTO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_TURNO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['DESCRIPCION_TURNO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['ESQUEMA']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_REGIMEN']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['DESCRIPCION_REGIMEN']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['CLAVE_TIPO_CONTRATO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['DESCRIPCION_TIPO_CONTRATO']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,substr($item['FECHA_BAJA'],8,2).'-'.substr($item['FECHA_BAJA'],5,2).'-'.substr($item['FECHA_BAJA'],0,4));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['PAGADORA_SYS']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE_RP']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['REG_PATRONAL']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['PAGADORA_IAS']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,trim($item['NOMBRE_PAGADORA']));
					$columna=1;
					$fila++;
				}  
				
		$nombreDelDocumento = "Empleados-vigentes.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function traducirSucursal($sucursal){
		if($sucursal==='AURA (PISO 12)' || $sucursal==='ICON (PISO 21)' || $sucursal==='AURA (PISO 10)' 
					|| $sucursal==='AURA (PISO 7)' || $sucursal==='UNION (PISO 9)' || $sucursal==='ADMINISTRADORES' 
					|| $sucursal==='IMSS MATUTE' || $sucursal==='GUADALUPE' || $sucursal==='IMSS PROVIDENCIA'){
					$sucursal = 'GUADALAJARA';
				}
				else if($sucursal==='CDMX CORPORATIVO DEL BOSQUE (PISO 6)' || $sucursal==='CDMX CORPORATIVO DEL BOSQUE (PISO 7)' || $sucursal==='CDMX CORPORATIVO DEL BOSQUE (PISO 2)'){
					$sucursal = 'CIUDAD DE MÉXICO';
				}
				else if($sucursal==='PUERTO VALLARTA EDIFICIO OBELISCO'){
					$sucursal = 'VALLARTA';
				}
				else if($sucursal==='MONTERREY TORRE AVALANZ'){
					$sucursal = 'MONTERREY';
				}	
		return $sucursal;	
	}

	public function equipo($usuario){
		
		if($usuario == 250|| $usuario ==256 || $usuario ==257 || $usuario ==259 || $usuario ==261 || $usuario ==265|| $usuario ==336 || $usuario ==348)
			$equipo = 'LOS INCREIBLES';
		else if($usuario ==236 || $usuario ==245 || $usuario ==206 || $usuario ==175 || $usuario ==224 || $usuario ==195 || $usuario ==243 || $usuario ==200 || $usuario ==193 || $usuario ==218 || $usuario ==179 || $usuario ==172 || $usuario ==225 || $usuario ==199 || $usuario ==196 || $usuario ==246 || $usuario ==168 || $usuario ==210 || $usuario ==231 || $usuario ==324) 
			$equipo = 'TAPATIOS FIT';
		else if($usuario == 244 || $usuario ==188 || $usuario ==185 || $usuario ==184 || $usuario ==228 || $usuario ==208 || $usuario ==189 || $usuario ==248 || $usuario ==181 || $usuario ==185 || $usuario ==180 || $usuario ==207 || $usuario ==305 || $usuario ==219 || $usuario ==223 || $usuario ==191 || $usuario ==242 || $usuario ==204 || $usuario ==187 || $usuario ==217 || $usuario ==201)
        	$equipo = 'TITANES DE ASESORES';
		else if($usuario == 190 || $usuario ==215 || $usuario ==241 || $usuario ==239 || $usuario ==198 || $usuario ==197 || $usuario ==307 || $usuario ==353 || $usuario ==360 || $usuario ==171 || $usuario ==202 || $usuario ==212 || $usuario ==233 || $usuario ==249 || $usuario ==251 || $usuario ==237 || $usuario ==346 || $usuario ==232 || $usuario ==240 || $usuario ==235 || $usuario ==182)
        	$equipo = 'FITNESS SQUAD';
		else if( $usuario ==366 || $usuario ==270 || $usuario ==271 || $usuario ==276 || $usuario ==277 || $usuario ==279 || $usuario ==281 || $usuario ==282 || $usuario ==283 || $usuario ==285 || $usuario ==287 || $usuario ==288 || $usuario ==291 || $usuario ==343 || $usuario ==351 || $usuario ==355)
        	$equipo = 'REGIOS FIT';
		else if($usuario ==314 || $usuario ==345 || $usuario ==295 || $usuario == 315 || $usuario ==304 || $usuario ==312 || $usuario ==308 || $usuario ==309 || $usuario == 313)
        	$equipo = 'GOLDEN GIRLS';
           
		return $equipo;
	}

	

	public function reporteNominasFinal(){
		
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte tabla de liberacion')
			->setSubject('Tabla de liberacion')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nominas');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Tabla de liberación");
	
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:BI1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

		$hoja->setCellValue("BJ1", "FINANZAS");
		$hoja->mergeCells('BJ1:BV1');
		$hoja->getStyle('BJ1')->getFont()->setBold(true);
		$hoja->getStyle('BJ1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('BJ1:BV1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');
        
        $hoja->setCellValue("BW1", "TESORERÍA");
		$hoja->mergeCells('BW1:CB1');
		$hoja->getStyle('BW1')->getFont()->setBold(true);
        $hoja->getStyle('BW1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('BW1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('BW1:CB1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');


		$hoja->setCellValue("A2", "TABLA DE LIBERACIÓN");
		$hoja->mergeCells('A2:Q2');
		$hoja->setCellValue("R2", "SUELDOS Y SALARIOS");
		$hoja->mergeCells('R2:AM2');
		$hoja->setCellValue("AN2", "DESCUENTOS AL TRABAJADOR (EXCEDENTE)");
		$hoja->mergeCells('AN2:BD2');
		$hoja->setCellValue("BE2", "CAPTURÓ");
		$hoja->mergeCells('BE2:BI2');

		$hoja->getStyle('A2:BV2')->getFont()->setBold(true);
		$hoja->getStyle('A2:BV2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A2:BV2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A2:Q2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('R2:AM2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN2:BD2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
		$hoja->getStyle('BE2:BI2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');

		$hoja->setCellValue("BJ2", "");
		$hoja->mergeCells('BJ2:BQ2');
		$hoja->getStyle('BJ2:BR2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');
		$hoja->setCellValue("BS2", "CAPTURÓ");
		$hoja->mergeCells('BS2:BV2');
        $hoja->getStyle('BS2:BV2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
        
        $hoja->setCellValue("BY2", "");
		$hoja->mergeCells('BY2:CB2');
		$hoja->getStyle('BW2:BX2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');
		$hoja->setCellValue("BY2", "CAPTURÓ");
		$hoja->mergeCells('BY2:CB2');
        $hoja->getStyle('BY2:CB2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
        $hoja->getStyle('BY2:CB2')->getFont()->setBold(true);
        $hoja->getStyle('BY2:CB2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('BY2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);

        $documento->getActiveSheet()->setAutoFilter('A3:CB3');
        $documento->getActiveSheet()->freezePane('A4');

		$columna=1;
		$fila=3;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESQUEMA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE DEL CLIENTE		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN %	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE POR ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DONATIVO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EXCEDENTE DE CARGAS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA PATRONAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN(MONTO)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS OBRERA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA SOCIAL IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR/ISP(SP)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR art. 142		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CUOTA SINDICAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESPENSA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAJA DE AHORRO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTO IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"APOYO SINDICAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTOS COMEDOR		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HABERES		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"GMM		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRESTAMOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PAGO A TERCEROS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE		");
		//$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RECUPERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN COBRADA ASOCIO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA GMM		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS		");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS		");

        $hoja->setCellValueByColumnAndRow($columna++,$fila,"AUTORIZADA	");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE FACTURA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FINANCIADA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE ENVÍO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA DE ENVÍO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS LIBERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE LIBERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA		");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA		");
        

        $hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS PAGO    ");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS     ");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA	");

		for ($i = 'A'; $i !== 'CC'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getStyle('A3:BV3')->getFont()->setBold(true);


		$hoja->getStyle('A3:CB3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A3:BI3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A3:R3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('R3:AM3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN3:BD3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
		$hoja->getStyle('BE3:BI3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		
		$hoja->getStyle('BJ3:BR3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->getStyle('BS3:BV3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $hoja->getStyle('BS3:BV3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
        
        $hoja->getStyle('BY3:CB3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $hoja->getStyle('BW3:CB3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');
		$hoja->getStyle('BY3:CB3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		
		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
        	$letras[$i] = $letra++;    
	
		$columna=1;
		$fila=4;

		$respuesta =Reportes::nominas(0,$this->fechaInicio,$this->fechaFinal);
		foreach ($respuesta as $row => $item){  

					$nominista = $capturaNominista = $finanzas = $capturaFinanzas = $tesoreria = $capturaTesoreria = $empresaAsimilados = $empresaImss = '';

					if($item["id_nominista"] !==NULL){
						$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
						$capturaNominista = explode ( " ", $item['captura_nominista']);
					}
					if($item["id_finanzas"] !==NULL){
						$finanzas = NominasModel::datos2($item["id_finanzas"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
						$capturaFinanzas = explode ( " ", $item['captura_finanzas']);
					}
					if($item["id_tesoreria"] !==NULL){
						$tesoreria = NominasModel::datos2($item["id_tesoreria"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
						$capturaTesoreria = explode ( " ", $item['captura_tesoreria']);
					}

					if($item['empresa_asimilados'] !== NULL)
						$empresaAsimilados = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$empresaImss = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
					


					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoEsquema($item['esquema']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$empresaImss);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$empresaAsimilados);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);

					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['ingreso']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['infonavit']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fonacot']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['donativo']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pension']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_cargas']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cargas_patronal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isn']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_monto']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['imss_obrera']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['carga_social_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['prenomina_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr_isp']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr_142']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cuota_sindical']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['despensa']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['caja_ahorro']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuento_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['apoyo_sindical']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuento_comedor']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['haberes']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_subsidio']);

					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['otros']);

					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_ingreso']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_isr']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_gmm']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_infonavit']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_fonacot']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prestamos']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_pension']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_terceros']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_clientes']);
					
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_recuperacion']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_comision']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prenomina']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prenomina_gmm']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_otros']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['liberacion_nominas'] == 1 ? 'SÍ' : 'NO');

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['sucursal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaNominista[0]);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaNominista[1]);

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirSiOno($item['financiada']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fecha_envio']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['hora_envio']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirObservaciones($item['observaciones']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fecha_liberacion']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirSiOno($item['fondeo_imss']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirSiOno($item['fondeo_asimilados']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_finanzas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['sucursal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaFinanzas[0]);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
                    $hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaFinanzas[1]);


                    $hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirEstatusNominas($item['tesoreria_estatus']));
                    $hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_tesoreria']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$tesoreria['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$tesoreria['sucursal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaTesoreria[0]);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaTesoreria[1]);
                    

					$columna=1;
					$fila++;
		}  
	
		$nombreDelDocumento = "Tabla-liberacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	

	public function reporteNominasFinal2(){
		
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte tabla de liberacion')
			->setSubject('Tabla de liberacion')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nominas');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Tabla de liberación");
	
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:BI1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

		$hoja->setCellValue("BJ1", "FINANZAS");
		$hoja->mergeCells('BJ1:BV1');
		$hoja->getStyle('BJ1')->getFont()->setBold(true);
		$hoja->getStyle('BJ1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('BJ1:BV1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');
        
        $hoja->setCellValue("BW1", "TESORERÍA");
		$hoja->mergeCells('BW1:CB1');
		$hoja->getStyle('BW1')->getFont()->setBold(true);
        $hoja->getStyle('BW1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('BW1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('BW1:CB1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');


		$hoja->setCellValue("A2", "TABLA DE LIBERACIÓN");
		$hoja->mergeCells('A2:Q2');
		$hoja->setCellValue("R2", "SUELDOS Y SALARIOS");
		$hoja->mergeCells('R2:AM2');
		$hoja->setCellValue("AN2", "DESCUENTOS AL TRABAJADOR (EXCEDENTE)");
		$hoja->mergeCells('AN2:BD2');
		$hoja->setCellValue("BE2", "CAPTURÓ");
		$hoja->mergeCells('BE2:BI2');

		$hoja->getStyle('A2:BV2')->getFont()->setBold(true);
		$hoja->getStyle('A2:BV2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A2:BV2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A2:Q2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('R2:AM2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN2:BD2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
		$hoja->getStyle('BE2:BI2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');

		$hoja->setCellValue("BJ2", "");
		$hoja->mergeCells('BJ2:BQ2');
		$hoja->getStyle('BJ2:BR2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');
		$hoja->setCellValue("BS2", "CAPTURÓ");
		$hoja->mergeCells('BS2:BV2');
        $hoja->getStyle('BS2:BV2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
        
        $hoja->setCellValue("BY2", "");
		$hoja->mergeCells('BY2:CB2');
		$hoja->getStyle('BW2:BX2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');
		$hoja->setCellValue("BY2", "CAPTURÓ");
		$hoja->mergeCells('BY2:CB2');
        $hoja->getStyle('BY2:CB2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
        $hoja->getStyle('BY2:CB2')->getFont()->setBold(true);
        $hoja->getStyle('BY2:CB2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('BY2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);

       
		$columna=1;
		$fila=3;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESQUEMA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE DEL CLIENTE		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN %	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE POR ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DONATIVO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EXCEDENTE DE CARGAS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA PATRONAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN(MONTO)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS OBRERA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA SOCIAL IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR/ISP(SP)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR art. 142		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CUOTA SINDICAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESPENSA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAJA DE AHORRO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTO IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"APOYO SINDICAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTOS COMEDOR		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HABERES		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"GMM		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRESTAMOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PAGO A TERCEROS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE		");
		//$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RECUPERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN COBRADA ASOCIO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA GMM		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS		");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS		");

        $hoja->setCellValueByColumnAndRow($columna++,$fila,"AUTORIZADA	");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE FACTURA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FINANCIADA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE ENVÍO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA DE ENVÍO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS LIBERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE LIBERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA		");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA		");
        

        $hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS PAGO    ");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS     ");
        $hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA	");

		for ($i = 'A'; $i !== 'CC'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getStyle('A3:BV3')->getFont()->setBold(true);


		$hoja->getStyle('A3:CB3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A3:BI3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A3:R3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('R3:AM3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN3:BD3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
		$hoja->getStyle('BE3:BI3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		
		$hoja->getStyle('BJ3:BR3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->getStyle('BS3:BV3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $hoja->getStyle('BS3:BV3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
        
        $hoja->getStyle('BY3:CB3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $hoja->getStyle('BW3:CB3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');
		$hoja->getStyle('BY3:CB3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		
		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
        	$letras[$i] = $letra++;    
	
		$columna=1;
		$fila=4;

		$respuesta =Reportes::nominas(0,$this->fechaInicio,$this->fechaFinal);
		foreach ($respuesta as $row => $item){  

					$finanzas = $capturaFinanzas = $tesoreria = $capturaTesoreria = $empresaAsimilados = $empresaImss = '';

					$capturaNominista = explode ( " ", $item['captura_nominista']);
					
					if($item["id_finanzas"] !==NULL){
						$finanzas = NominasModel::datos3($item["id_finanzas"],Tablas::usuarios(),Tablas::sucursales());
						$capturaFinanzas = explode ( " ", $item['captura_finanzas']);
					}
					if($item["id_tesoreria"] !==NULL){
						$tesoreria = NominasModel::datos3($item["id_tesoreria"],Tablas::usuarios(),Tablas::sucursales());
						$capturaTesoreria = explode ( " ", $item['captura_tesoreria']);
					}

					if($item['empresa_asimilados'] !== NULL)
						$empresaAsimilados = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$empresaImss = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
			
					
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoEsquema($item['esquema']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$empresaImss);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$empresaAsimilados);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);

					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['ingreso']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['infonavit']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fonacot']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['donativo']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pension']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_cargas']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cargas_patronal']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isn']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_monto']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['imss_obrera']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['carga_social_imss']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['prenomina_imss']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr_isp']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr_142']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cuota_sindical']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['despensa']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['caja_ahorro']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuento_imss']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['apoyo_sindical']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuento_comedor']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['haberes']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_subsidio']);

					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['otros']);

					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_ingreso']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_isr']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_imss']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_gmm']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_infonavit']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_fonacot']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prestamos']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_pension']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_terceros']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_clientes']);
					
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_recuperacion']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_comision']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prenomina']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prenomina_gmm']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_otros']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['liberacion_nominas'] == 1 ? 'SÍ' : 'NO');

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['nominista']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sucursal']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaNominista[0]);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaNominista[1]);

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_factura']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirSiOno($item['financiada']));
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fecha_envio']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['hora_envio']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirObservaciones($item['observaciones']));
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fecha_liberacion']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirSiOno($item['fondeo_imss']));
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirSiOno($item['fondeo_asimilados']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_finanzas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['sucursal']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaFinanzas[0]);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
                    $hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaFinanzas[1]);

                   // $hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirEstatusNominas($item['tesoreria_estatus']));
                    $hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_tesoreria']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$tesoreria['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$tesoreria['sucursal']);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaTesoreria[0]);
					//$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					//$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaTesoreria[1]);
                    
					$columna=1;
					$fila++;
		}  

		$hoja->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'A5:A'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'B4:B'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'D4:D'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'E4:E'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'O4:O'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'P4:P'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'BH4:BH'.$fila);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('A4'), 'BI4:BI'.$fila);

		$hoja->getStyle('F4')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
		$documento->getActiveSheet()->duplicateStyle($documento->getActiveSheet()->getStyle('F4'), 'F5:F'.$fila);
	

		$documento->getActiveSheet()->setAutoFilter('A3:CB3');
		$documento->getActiveSheet()->freezePane('A4');


		$nombreDelDocumento = "Tabla-liberacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteTesoreriaSucursal(){
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales')
			->setTitle('Reporte tesorería')
			->setSubject('Reporte tesorería')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nóminas');
	
		$hoja = $documento->getActiveSheet();
        $hoja->setTitle("Reporte");
        
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:S1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

		$hoja->setCellValue("T1", "FINANZAS");
		$hoja->mergeCells('T1:AC1');
		$hoja->getStyle('T1')->getFont()->setBold(true);
		$hoja->getStyle('T1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('T1:AC1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->setCellValue("AD1", "TESORERIA");
		$hoja->mergeCells('AD1:AI1');
		$hoja->getStyle('AD1')->getFont()->setBold(true);
		$hoja->getStyle('AD1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('AD1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AD1:AI1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');

		$columna=1;
		$fila=2;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FINANCIADA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA Y HORA DEL DEPOSITO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO ASMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA		");
		
		$hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->getColumnDimension('B')->setWidth(60);
		$hoja->getColumnDimension('C')->setWidth(30);
		$hoja->getColumnDimension('D')->setWidth(30);

		$hoja->getColumnDimension('E')->setWidth(20);
		$hoja->getColumnDimension('F')->setWidth(60);



		$hoja->getColumnDimension('G')->setWidth(20);
		$hoja->getColumnDimension('H')->setWidth(20);
		$hoja->getColumnDimension('I')->setWidth(20);


		$hoja->getColumnDimension('J')->setWidth(60);
		$hoja->getColumnDimension('K')->setWidth(20);

		$hoja->getColumnDimension('L')->setWidth(60);
		$hoja->getColumnDimension('M')->setWidth(20);

		$hoja->getColumnDimension('N')->setAutoSize(true);
		$hoja->getColumnDimension('O')->setAutoSize(true);
		$hoja->getColumnDimension('P')->setAutoSize(true);
		$hoja->getColumnDimension('Q')->setWidth(100);
		$hoja->getColumnDimension('R')->setWidth(60);
		$hoja->getColumnDimension('S')->setWidth(60);

		for ($i = 'T'; $i !== 'AA'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getColumnDimension('AA')->setWidth(120);
		$hoja->getColumnDimension('AB')->setWidth(60);
		$hoja->getColumnDimension('AC')->setWidth(60);

		$hoja->getColumnDimension('AD')->setWidth(30);
		$hoja->getColumnDimension('AE')->setWidth(120);

		$hoja->getColumnDimension('AF')->setWidth(60);
		$hoja->getColumnDimension('AG')->setWidth(60);
		$hoja->getColumnDimension('AH')->setWidth(20);
		$hoja->getColumnDimension('AI')->setWidth(20);
		

		$hoja->getStyle('A2:AI2')->getFont()->setBold(true);
		$hoja->getStyle('A2:AI2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		$hoja->getStyle('A2:S2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('963634');
		$hoja->getStyle('B2:P2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('367fa9');
		$hoja->getStyle('Q2:S2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		$hoja->getStyle('T2:AC2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->getStyle('AA2:AC2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AA2:AC2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');



		$hoja->getStyle('AD2:AI2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AD2:AI2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');

		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
			$letras[$i] = $letra++;  
			
		$columna=1;
		$fila=3;
	

		$respuesta =Reportes::nominas(5,$this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		
		$documento->getActiveSheet()->setAutoFilter(
			$documento->getActiveSheet()->calculateWorksheetDimension()
		);
	
		
		
		foreach ($respuesta as $row => $item){  

					$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					/*$capturaNominista = explode ( " ", $item['captura_nominista']);*/
					$finanzas = NominasModel::datos2($item["id_finanzas"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					/*$capturaFinanzas = explode ( " ", $item['captura_finanzas']);*/

					$tesoreria = NominasModel::datos2($item["id_tesoreria"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					$capturaTesoreria = explode ( " ", $item['captura_tesoreria']);

					if($item['empresa_asimilados'] !== NULL)
						$item['empresa_asimilados'] = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$item['empresa_imss'] = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['sucursal']);

					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['financiada'] !== NULL ? Nominas::traducirSiOnoInverso($item['financiada']) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, ($item['fecha_envio'] !== NULL ? substr($item['fecha_envio'],8,2).'/'.substr($item['fecha_envio'],5,2).'/'.substr($item['fecha_envio'],0,4) : '').' - '.($item['hora_envio'] !== NULL ? substr($item['hora_envio'],0,5) : ''));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirObservaciones($item['observaciones']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fecha_liberacion'] !== NULL ? substr($item['fecha_liberacion'],8,2).'/'.substr($item['fecha_liberacion'],5,2).'/'.substr($item['fecha_liberacion'],0,4) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_imss'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_imss']) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_asimilados'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_asimilados']) : '' );
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_finanzas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['sucursal']);


					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['id_tesoreria'] == NULL ? '' : Nominas::traducirEstatusNominas($item['tesoreria_estatus']) );
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_tesoreria']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$tesoreria['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$tesoreria['sucursal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaTesoreria[0]);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaTesoreria[1]);

					$columna=1;
					$fila++;
		}  

		
		$nombreDelDocumento = "Formato-Tesoreria.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteFinanzasSucursal(){
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales')
			->setTitle('Reporte tesorería')
			->setSubject('Reporte tesorería')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nóminas');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Reporte");
	
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:S1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

		$hoja->setCellValue("T1", "FINANZAS");
		$hoja->mergeCells('T1:AE1');
		$hoja->getStyle('T1')->getFont()->setBold(true);
		$hoja->getStyle('T1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('T1:AE1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		
		$columna=1;
		$fila=2;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL ASIMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FINANCIADA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA Y HORA DEL DEPOSITO");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. FACTURA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESTATUS DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA DE LIBERACIÓN");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO IMSS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONDEO ASMILADOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAPTURÓ");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURSAL");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA");

		$hoja->getColumnDimension('A')->setAutoSize(true);
		$hoja->getColumnDimension('B')->setWidth(60);
		$hoja->getColumnDimension('C')->setWidth(30);
		$hoja->getColumnDimension('D')->setWidth(30);

		$hoja->getColumnDimension('E')->setWidth(20);
		$hoja->getColumnDimension('F')->setWidth(60);



		$hoja->getColumnDimension('G')->setWidth(20);
		$hoja->getColumnDimension('H')->setWidth(20);
		$hoja->getColumnDimension('I')->setWidth(20);


		$hoja->getColumnDimension('J')->setWidth(60);
		$hoja->getColumnDimension('K')->setWidth(20);

		$hoja->getColumnDimension('L')->setWidth(60);
		$hoja->getColumnDimension('M')->setWidth(20);

		$hoja->getColumnDimension('N')->setAutoSize(true);
		$hoja->getColumnDimension('O')->setAutoSize(true);
		$hoja->getColumnDimension('P')->setAutoSize(true);
		$hoja->getColumnDimension('Q')->setWidth(100);
		$hoja->getColumnDimension('R')->setWidth(60);
		$hoja->getColumnDimension('S')->setWidth(60);

		for ($i = 'T'; $i !== 'AA'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getColumnDimension('AA')->setWidth(120);
		$hoja->getColumnDimension('AB')->setWidth(60);
		$hoja->getColumnDimension('AC')->setWidth(60);
		$hoja->getColumnDimension('AD')->setWidth(20);
		$hoja->getColumnDimension('AE')->setWidth(20);

		
		

		$hoja->getStyle('A2:AE2')->getFont()->setBold(true);
		$hoja->getStyle('A2:AE2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		$hoja->getStyle('A2:S2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('963634');
		$hoja->getStyle('B2:P2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('367fa9');
		$hoja->getStyle('Q2:S2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		$hoja->getStyle('T2:AE2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('D6D577');

		$hoja->getStyle('AA2:AE2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('AA2:AE2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');

		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
			$letras[$i] = $letra++;  
			
		$columna=1;
		$fila=3;
	

		$respuesta =Reportes::nominas(6,$this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		
		$documento->getActiveSheet()->setAutoFilter(
			$documento->getActiveSheet()->calculateWorksheetDimension()
		);
	
			
		foreach ($respuesta as $row => $item){  

					$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					/*$capturaNominista = explode ( " ", $item['captura_nominista']);*/
					$finanzas = NominasModel::datos2($item["id_finanzas"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					$capturaFinanzas = explode ( " ", $item['captura_finanzas']);

					if($item['empresa_asimilados'] !== NULL)
						$item['empresa_asimilados'] = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$item['empresa_imss'] = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$nominista['sucursal']);

					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['financiada'] !== NULL ? Nominas::traducirSiOnoInverso($item['financiada']) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, ($item['fecha_envio'] !== NULL ? substr($item['fecha_envio'],8,2).'/'.substr($item['fecha_envio'],5,2).'/'.substr($item['fecha_envio'],0,4) : '').' - '.($item['hora_envio'] !== NULL ? substr($item['hora_envio'],0,5) : ''));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirObservaciones($item['observaciones']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fecha_liberacion'] !== NULL ? substr($item['fecha_liberacion'],8,2).'/'.substr($item['fecha_liberacion'],5,2).'/'.substr($item['fecha_liberacion'],0,4) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_imss'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_imss']) : '' );
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila, $item['fondeo_asimilados'] !== NULL ? Nominas::traducirSiOnoInverso($item['fondeo_asimilados']) : '' );
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_finanzas']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['nombre']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$finanzas['sucursal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaFinanzas[0]);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaFinanzas[1]);

					$columna=1;
					$fila++;
		}  

		
		$nombreDelDocumento = "Formato-Finanzas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteNominasSucursal(){
		
		$documento = new Spreadsheet();
		$documento
			->getProperties()
			->setCreator("Intranet Asesores Empresariales")
			->setLastModifiedBy('Intranet Asesores Empresariales') // última vez modificado por
			->setTitle('Reporte nóminas')
			->setSubject('Reporte nóminas')
			->setDescription('Este documento fue generado por Intranet Asesores Empresariales')
			->setKeywords('')
			->setCategory('Modulo de Nóminas');
	
		$hoja = $documento->getActiveSheet();
		$hoja->setTitle("Nóminas");
	
		
		$hoja->setCellValue("A1", "NÓMINAS");
		$hoja->mergeCells('A1:BH1');
		$hoja->getStyle('A1')->getFont()->setBold(true);
		$hoja->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('3C8DBC');

	
		$hoja->setCellValue("A2", "TABLA DE LIBERACIÓN");
		$hoja->mergeCells('A2:Q2');
		$hoja->setCellValue("R2", "SUELDOS Y SALARIOS");
		$hoja->mergeCells('R2:AM2');
		$hoja->setCellValue("AN2", "DESCUENTOS AL TRABAJADOR (EXCEDENTE)");
		$hoja->mergeCells('AN2:BD2');
		$hoja->setCellValue("BE2", "CAPTURÓ");
		$hoja->mergeCells('BE2:BH2');

		$hoja->getStyle('A2:BU2')->getFont()->setBold(true);
		$hoja->getStyle('A2:BU2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A2:BU2')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A2:Q2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('R2:AM2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN2:BD2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
		$hoja->getStyle('BE2:BH2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');

		

		$columna=1;
		$fila=3;
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"No. NÓMINA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ESQUEMA	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE DEL CLIENTE		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PAGO	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RÉGIMEN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN %	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA QUE FACTURA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBTOTAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IVA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EMPRESA PAGADORA ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TOTAL A DEPOSITARLE POR ASIMILADOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"TIPO DE PERIODO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NÚMERO DE PERIODO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SOCIOS		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DONATIVO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"EXCEDENTE DE CARGAS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA PATRONAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN(MONTO)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS OBRERA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CARGA SOCIAL IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR/ISP(SP)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR art. 142		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CUOTA SINDICAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESPENSA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CAJA DE AHORRO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTO IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"APOYO SINDICAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"DESCUENTOS COMEDOR		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HABERES		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS		");

		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INGRESO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"ISR		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"GMM		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"INFONAVIT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FONACOT		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRESTAMOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PENSIÓN ALIMENTICIA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PAGO A TERCEROS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"CLIENTE		");
		//$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUBSIDIO(SP)		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"RECUPERACIÓN		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMISIÓN COBRADA ASOCIO		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA IMSS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"PRENÓMINA GMM		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"OTROS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"COMENTARIOS		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"NOMBRE	");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"SUCURAL		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"FECHA		");
		$hoja->setCellValueByColumnAndRow($columna++,$fila,"HORA		");


		for ($i = 'A'; $i !== 'BI'; $i++)
			$hoja->getColumnDimension($i)->setAutoSize(true);

		$hoja->getStyle('A3:BH3')->getFont()->setBold(true);


		$hoja->getStyle('A3:BH3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$hoja->getStyle('A3:BH3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
		$hoja->getStyle('A3:Q3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A65A');
		$hoja->getStyle('R3:AM3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('B8570C');
		$hoja->getStyle('AN3:BD3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
		$hoja->getStyle('BE3:BH3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CD6155');
		
		$letra='A';
    	$letras=array();
		for ($i=0;$i<$columna;$i++) 
        	$letras[$i] = $letra++;    
	
		$columna=1;
		$fila=4;

	
		$respuesta = Reportes::nominas(4,$this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		foreach ($respuesta as $row => $item){  

					//$nominista = NominasModel::datos2($item["id_nominista"],Tablas::usuarios(),Tablas::sucursales(),Tablas::puestos());
					$capturaNominista = explode ( " ", $item['captura_nominista']);
					
					if($item['empresa_asimilados'] !== NULL)
						$item['empresa_asimilados'] = NominasModel::obtenerDatoNominas($item['empresa_asimilados'],Tablas::asimilados());
					if($item['empresa_imss'] !== NULL)
						$item['empresa_imss'] = NominasModel::obtenerDatoNominas($item['empresa_imss'],Tablas::imss());
					
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['id']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoEsquema($item['esquema']));
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cliente']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPago($item['tipo_pago']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoRegimen($item['regimen']));
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_00);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_porcentaje']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_factura']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['subtotal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['iva']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_imss']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['empresa_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['total_asimilados']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,Nominas::traducirTipoPeriodo($item['tipo_periodo']));
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['numero_periodo']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['socios']);

					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['ingreso']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['infonavit']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['fonacot']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['donativo']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['pension']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_cargas']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cargas_patronal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isn']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['comision_monto']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['imss_obrera']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['carga_social_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['prenomina_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr_isp']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['isr_142']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['cuota_sindical']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['despensa']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['caja_ahorro']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuento_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['apoyo_sindical']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['descuento_comedor']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['haberes']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_subsidio']);

					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['otros']);

					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_ingreso']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_isr']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_imss']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_gmm']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_infonavit']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_fonacot']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prestamos']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_pension']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_terceros']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_clientes']);
					
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_recuperacion']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_comision']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prenomina']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_prenomina_gmm']);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['excedente_otros']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,str_replace('<br />','; ',$item['comentarios_nominas']));

					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['nominista']);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$item['sucursal']);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_YYYYMMDD2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaNominista[0]);
					$hoja->getStyle($letras[$columna-1].$fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$hoja->getStyle($letras[$columna-1].$fila)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_TIME2);
					$hoja->setCellValueByColumnAndRow($columna++,$fila,$capturaNominista[1]);

					$columna=1;
					$fila++;
		}  
	
		$nombreDelDocumento = "Reporte-nominas-departamento.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteSucursalNominas(){
		//if($_SESSION['identificador'] == 168)
			$documento = Reportes::reporteSucursalNominasNuevaVersion($this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		/*else
			$documento = Reportes::reporteSucursalNominas($this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);*/
		$nombreDelDocumento = "Reporte-departamento-nominas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteModuloCostos(){
		$documento = Reportes::reporteModuloCostos($this->fechaInicio,$this->fechaFinal);
		$nombreDelDocumento = "Reporte-modulo-costos.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteModuloConciliacion(){
		$documento = Reportes::reporteModuloConciliacion($this->fechaInicio,$this->fechaFinal,$this->tipo);
		$nombreDelDocumento = "Reporte-modulo-conciliacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteSucursalFinanzas(){
		$documento = Reportes::reporteSucursalFinanzas($this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		$nombreDelDocumento = "Reporte-departamento-finanzas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteSucursalTesoreria(){
		$documento = Reportes::reporteSucursalTesoreria($this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		$nombreDelDocumento = "Reporte-departamento-tesoreria.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteSucursalFacturacion(){
		$documento = Reportes::reporteSucursalFacturacion($this->fechaInicio,$this->fechaFinal,$this->nombre,$this->tipo);
		$nombreDelDocumento = "Reporte-departamento-facturacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function reporteTablaLiberacion(){
		$documento = Reportes::reporteTablaLiberacionNuevaVersion($this->fechaInicio,$this->fechaFinal);
		//$documento = Reportes::reporteTablaLiberacion($this->fechaInicio,$this->fechaFinal);
		$nombreDelDocumento = "Reporte-tabla-de-liberacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
	
	public function formatoLlenadoNominas(){
		//if($_SESSION['identificador'] == 168)
			$documento = Reportes::formatoLlenadoNominasNuevaVersion();
		//else
			//$documento = Reportes::formatoLlenadoNominas();
		$nombreDelDocumento = "Layout-nominas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function formatoLlenadoFinanzas(){
		$documento = Reportes::formatoLlenadoFinanzas();
		$nombreDelDocumento = "Layout-finanzas.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function formatoLlenadoTesoreria(){
		$documento = Reportes::formatoLlenadoTesoreria();
		$nombreDelDocumento = "Layout-tesoreria.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
	
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function formatoLlenadoFactura(){
		$documento = Reportes::formatoLlenadoFactura();
		$nombreDelDocumento = "Layout-facturacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function formatoLlenadoConciliacion(){
		$documento = Reportes::formatoLlenadoConciliacion();
		//$nombreDelDocumento = "Layout-conciliacion.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="costos.xlsx"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function descargarComprobantesNominas(){
		$nombre = 'comprobantes'.$this->departamento.'-'.$this->id.'.zip';
		$zip = new ZipArchive();
		$zip->open("/var/www/html/asesores/views/temp/".$nombre,ZipArchive::CREATE);
		$contador = 0;
		
		$directorio = "/var/www/html/asesores/intranet/documentos-nominas/comprobantes-nominas/".$this->id."/".$this->id; 
        foreach (glob($directorio.$this->departamento."*") as $nombre_fichero){
			$info = new SplFileInfo(basename($nombre_fichero));
			$extension = $info->getExtension();
			$zip->addFile($nombre_fichero,$this->id.'-'.++$contador.'.'.$extension);
		}
			
		$zip->close();
		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$nombre);
		header('Content-Length: ' . filesize("/var/www/html/asesores/views/temp/".$nombre));
		readfile("/var/www/html/asesores/views/temp/".$nombre);
		unlink("/var/www/html/asesores/views/temp/".$nombre);//Destruye el archivo temporal
	}

	public function descargarRecibosNominas(){
		$nombre = $_SESSION['identificador'].$this->id.'.zip';
		$zip = new ZipArchive();
		$zip->open("/var/www/html/asesores/views/temp/".$nombre,ZipArchive::CREATE);
		
		
		$directorio = "/var/www/html/asesores/intranet/documentos-nominas/recibos-nominas/".$this->id."/".$this->id; 
        foreach (glob($directorio."-nominas"."*") as $nombre_fichero){
			$nombreFile = basename($nombre_fichero);
			/*$info = new SplFileInfo($nombreFile);
			$extension = $info->getExtension();
			$nombreFile2 = basename($nombreFile,'.'.$extension);*/
			$zip->addFile($nombre_fichero,$nombreFile);
		}
			
		$zip->close();
		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$nombre);
		header('Content-Length: ' . filesize("/var/www/html/asesores/views/temp/".$nombre));
		readfile("/var/www/html/asesores/views/temp/".$nombre);
		unlink("/var/www/html/asesores/views/temp/".$nombre);//Destruye el archivo temporal
	}

	public function descargarDocumentosEmpresas(){
		$nombre = 'documentos-empresas'.$this->departamento.'-'.$this->id.'.zip';
		$zip = new ZipArchive();
		$zip->open("/var/www/html/asesores/views/temp/".$nombre,ZipArchive::CREATE);
		$contador = 0;

		$directorio = "/var/www/html/asesores/intranet/documentos-empresas/".$this->id."/".$this->id; 
        foreach (glob($directorio.$this->departamento."*") as $nombre_fichero)
			$zip->addFile($nombre_fichero,$this->id.'-'.substr($nombre_fichero, -9));
		
		$zip->close();
		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$nombre);
		header('Content-Length: ' . filesize("/var/www/html/asesores/views/temp/".$nombre));
		readfile("/var/www/html/asesores/views/temp/".$nombre);
		unlink("/var/www/html/asesores/views/temp/".$nombre);//Destruye el archivo temporal
	}

	public function reporteTickets(){
		$documento = Reportes::reporteTickets($this->fechaInicio,$this->fechaFinal,$this->area);
		$nombreDelDocumento = "Reporte-sistema-tickets-Asesores-Empresariales.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}


	//$a->;
	public function reportePersonalAsistencias(){
		
		$documento = Reportes::reportePersonalAsistencias($this->fechaInicio,$this->fechaFinal);

		header('Content-Disposition: attachment;filename="ReporteAsistencias.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($documento,'Xlsx');
        $writer->save('php://output');
        exit;
	}
}

if(isset($_POST['nombreArchivoDescargar']) && $_SESSION["validar"]){
  $recibo = new Cabeceras();
  $recibo->nombre = $_POST['nombreArchivoDescargar'];
  $recibo->formato = $_POST['formatoArchivoNomina'];
  $recibo->descargar_recibos();
}

else if(isset($_POST['reporteSolicitudes']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->sucursal = $_POST['sucursal'];
	$a->usuario = $_POST['usuario'];
	$a->tipo = $_POST['tipo'];
	$a->autorizados = $_POST['autorizados'];
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->reportes_permisos();
}

else if(isset($_POST['reporteVacaciones']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->sucursal = $_POST['sucursalVacaciones'];
	$a->usuario = $_POST['usuarioVacaciones'];
	$a->reportes_vacaciones();
}

else if(isset($_POST['reportePersonalVigente']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->sucursal = $_POST['usuarioVigente'];
	$a->usuario = $_POST['sucursalVigente'];
	$a->reportePersonalVigente();
}

else if(isset($_POST['resultadosNutrifitness']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->reportes_nutrifitness();
}

else if(isset($_POST['ejecutarConsulta']) && $_SESSION["validar"]){
	$giro = new Cabeceras();
	$giro->giro_empleados_vigentes();
}

else if(isset($_POST['reporteNominasFinal']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->reporteTablaLiberacion();
	//$a->reporteNominasFinal();
}

else if(isset($_POST['formatoLlenadoFinanazas001']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->formatoLlenadoFinanzas();
	//$a->formatoLlenadoFinanazas001();
}

else if(isset($_POST['formatoLlenadoNominas001']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->formatoLlenadoNominas();
	//$a->formatoLlenadoNominas001();
}

else if(isset($_POST['formatoLlenadoTesoreria001']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->formatoLlenadoTesoreria();
	//$a->formatoLlenadoTesoreria001();
}

else if(isset($_POST['formatoLlenadoFactura001']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->formatoLlenadoFactura();
	//$a->formatoLlenadoTesoreria001();
}

else if(isset($_POST['formatoLlenadoCociliacion001']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->formatoLlenadoConciliacion();
}

	
	

else if(isset($_POST['reporteNominasSucursal']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->nombre = $_POST['nominista'];
	$a->tipo = $_POST['statusNominas'];
	$a->reporteSucursalNominas();
	//$a->reporteNominasSucursal();
}

else if(isset($_POST['reporteFinanzasSucursal']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->nombre = $_POST['nominista'];
	$a->tipo = $_POST['statusNominas'];
	$a->reporteSucursalFinanzas();
	//$a->reporteFinanzasSucursal();
}

else if(isset($_POST['reporteTesoreriaSucursal']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->nombre = $_POST['nominista'];
	$a->tipo = $_POST['statusNominas'];
	$a->reporteSucursalTesoreria();
	//$a->reporteTesoreriaSucursal();
}

else if(isset($_POST['reporteFacturacionSucursal']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->nombre = $_POST['nominista'];
	$a->tipo = $_POST['statusNominas'];
	$a->reporteSucursalFacturacion();
}

else if(isset($_POST['reporteModuloCostos']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->reporteModuloCostos();
}

else if(isset($_POST['reporteModuloConciliacion']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->tipo = $_POST['tipo'];
	$a->reporteModuloConciliacion();
}

else if(isset($_POST['descargarComprobantesNominas']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idNomina'];
	$a->departamento = "-nominas";
	$a->descargarComprobantesNominas();
}

else if(isset($_POST['descargarRecibosNominas']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idNomina'];
	$a->descargarRecibosNominas();
}

else if(isset($_POST['descargarComprobantesFinanzas']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idNomina'];
	$a->departamento = "-finanzas";
	$a->descargarComprobantesNominas();
}

else if(isset($_POST['descargarComprobantesTesoreria']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idNomina'];
	$a->departamento = "-tesoreria";
	$a->descargarComprobantesNominas();
}

else if(isset($_POST['descargarComprobantesFacturacion']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idNomina'];
	$a->departamento = "-facturacion";
	$a->descargarComprobantesNominas();
}

else if(isset($_POST['descargarDocumentosEmpresas']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idEmpresa'];
	$a->departamento = $_POST['seccion'];
	$a->descargarDocumentosEmpresas();
}

else if(isset($_POST['reportesTickets'])  && $_SESSION["validar"] ){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaInicio'];
	$a->fechaFinal = $_POST['fechaFinal'];
	$a->area = $_POST['area'];
	$a->reporteTickets();
}

else if(isset($_POST['tablaLiberacionNuveaVersion']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->id = $_POST['idEmpresa'];
	$a->departamento = $_POST['seccion'];
	$a->descargarDocumentosEmpresas();
}
else if(isset($_POST['reportePersonalAsistencias']) && $_SESSION["validar"]){
	$a = new Cabeceras();
	$a->fechaInicio = $_POST['fechaConsultaInicial'];
	$a->fechaFinal = $_POST['fechaConsultaFinal'];
	$a->reportePersonalAsistencias();
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asesores Empresariales</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="Shortcut Icon" href="<?php echo Ruta::ruta_server(); ?>views/img/asesores.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/bootstrap.min.css?23">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/bootstrap-select.css">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/ionicons.min.css">

    <link rel='stylesheet' href='<?php echo Ruta::ruta_server(); ?>views/css/timepicki.css'/>

    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/bootstrap-year-calendar.css">

    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/AdminLTE.min.css"><!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/skins/_all-skins.min.css"><!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/sweetalert2.min.css">
    <!-- estilos personalizados -->
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/estilos.css?3">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/paginacion.min.css">
    <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/js/visor-crow/visor.min.css">
	<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/js/visor-pdf-crow/visor-pdf.css">
	<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/estilosGestor.min.css">
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/tickets-administrador' || $_SERVER['REQUEST_URI'] === '/asesores/tickets-soporte'): ?>
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/estilos-modulos-tickets-usuarios.css?9">
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/estilos-modulos-ticktes.css?1">
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/conciliacion'): ?>
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/conciliacion.css?0">
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/inicio'): ?>
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/reloj.css?0">
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/test'): ?>
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/estilos.css?3">
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/test.css?0">
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/tutoriales'): ?>
		<link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/test.css?0">
	<?php endif;?>
	
	

  </head>
  <body class="hold-transition sidebar-mini <?php  echo ' '.$respuesta = isset($_COOKIE['configColorScreen']) ? $_COOKIE['configColorScreen'] : ''; echo ' '.$respuesta = isset($_COOKIE['configSideLeft']) ? $_COOKIE['configSideLeft'] : ''; echo ' '.$respuesta = isset($_COOKIE['configScreenSize']) ? $_COOKIE['configScreenSize'] : '';?>">
    
    <div class="wrapper">
      <?php
        $modulos=new Enlaces();
        $modulos->enlacesController();
      ?>
    </div>

    <script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.min.js"></script><!-- jQuery 3 -->
    <script src='<?php echo Ruta::ruta_server(); ?>views/js/timepicki.js'></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.mask.min.js"></script><!-- jQuery 3 -->
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/bootstrap.min.js"></script><!-- Bootstrap 3.3.7 -->
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/bootstrap-select.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/fastclick.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/moment/min/moment.min.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/metodosDiversos.min.js?3"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/paginador.js?3"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/bootstrap-year-calendar.js?v2"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/adminlte.min.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/demo.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/sweetalert2.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/push.min.js"></script>
    <!-- custom-->
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/preferencias.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/generarUsuarioPass.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/md5.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/configuraciones.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/funcionalidades.js?1" async="async"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/validarIngreso.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/visor-crow/visor.min.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/visor-pdf-crow/pdfobject.js"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/visor-pdf-crow/visor-pdf.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery-ui.min.js"></script>
	
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/usuariosPass'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/sockets-tickets-admin.min.js"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/ticketNuevo'): ?>
		<!--<script src="<?php echo Ruta::ruta_server(); ?>views/js/sockets-tickets.min.js"></script>-->
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/tickets-administrador'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/tickets-admin-2.js?2"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/tickets-soporte'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/tickets-2.js?2"></script>
	<?php endif;?>
	<?php if(AccesoSoporte::perteneceAsoporte($_SESSION['identificador'])):?>
		<!--<script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.flot.js"></script>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.flot.resize.js"></script>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.flot.pie.js"></script>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.flot.categories.js"></script>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/graficas-tickets.js"></script>-->
	<?php endif;?>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/notificacionesPush.js"></script>
	<?php if(isset($_COOKIE['hiSystem'])):?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/bienvenida.js" async="async"></script>
	<?php endif;?>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/notificaciones.js" async="async"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/saludYejercicio.min.js" async="async"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/reportesRecursosHumanos.js?1" async="async"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/nutricion.min.js" async="async"></script>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.knob.js" async="async"></script>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/cursos'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/cursos.js" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/nominas' || $_SERVER['REQUEST_URI'] === '/asesores/finanzas' || $_SERVER['REQUEST_URI'] === '/asesores/tesoreria' || $_SERVER['REQUEST_URI'] === '/asesores/liberacion'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/nominas3-1.js?1" async="async"></script>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/paginador-clientes.js?1" async="async"></script>
	<?php endif;?>
	<script src="<?php echo Ruta::ruta_server(); ?>views/js/chat.js?3" async="async"></script>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/evaluaciones'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/evaluaciones.js" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/empresas'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/empresas.js" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/clientes'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/clientes.js" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/reconocimientos'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/valores.js" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/linea-ayuda'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/ayuda.js" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/facturacion'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/facturacion-1.js?78" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/costos'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/costos.js?8" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/software'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/software.js?4" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/conciliacion'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/conciliacion.js?2" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/inicio'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/asistencias.js?2" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/test'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/test.js?2" async="async"></script>
	<?php endif;?>
	<?php if($_SERVER['REQUEST_URI'] === '/asesores/tutoriales'): ?>
		<script src="<?php echo Ruta::ruta_server(); ?>views/js/test.js?2" async="async"></script>
	<?php endif;?>
	<!--<script src="<?php echo Ruta::ruta_server(); ?>views/js/activar-videos-inicio.js?1"></script>-->
    <script>
      $(document).ready(function () {
        $('.sidebar-menu').tree()
      });
    </script>
  </body>
</html>
