<?php
session_start();
if(!$_SESSION["validar"]){
  header("location:ingreso");
  exit();
}

require_once 'Tickets.php';
require_once '../models/TicketsModel.php';
require_once '../models/config.php';
require_once '../models/usuarios.php';
require_once '../models/sucursales.php';
require_once 'sucursales.php';
require_once '../models/departamentosPuestos.php';
require_once 'MetodosDiversos.php';
require_once "ajaxPaginacion.php";


class AjaxTickets{

    
    public $numeroTicket;
    public $sucursal;
     
    public $segmento;
    public $fechaTicket;
    public $nombreUsuario;


    public $imagenNombre = NULL;
    public $imagenTipo = NULL;
    public $imagenTemporal =NULL;
    public $imagenTamano = NULL;

    public $documentoNombre = NULL;
    public $documentoTipo = NULL;
    public $documentoTemporal =NULL;
    public $documentoTamano = NULL;


    public $flag=0;

    public function nuevoTicket(){
        $data=array(    'area'=>$this->area,
                        'subCategoria'=>$this->subCategoria,
                        'asunto'=>trim($this->asunto),
                        'descripcion'=>trim($this->descripcion),
                        //'numero'=>$this->numeroTicket,
                        'idEmpleado'=>$this->idEmpleado,
                        'segmento'=>$this->segmento,
                        'imagenNombre'=>$this->imagenNombre,
                        'imagenTipo'=>$this->imagenTipo,
                        'imagenTemporal'=>$this->imagenTemporal,
                        'imagenTamano'=>$this->imagenTamano,
                        'documentoNombre'=>$this->documentoNombre,
                        'documentoTipo'=>$this->documentoTipo,
                        'documentoTemporal'=>$this->documentoTemporal,
                        'documentoTamano'=>$this->documentoTamano
                    );
        $respuesta = Tickets::nuevoTicket($data);
        echo $respuesta;
    }

    public function actualizarColaTickets(){
        $respuesta =  Tickets::mostrarColaTickets(0);
        echo json_encode(array('html'=>$respuesta));
    }

    public function actualizarColaTicketsAbiertos(){
        $asignados =  Tickets::mostrarColaTickets(1,true);
        //if($this->flag == 0){//asignar un ticket nuevo
            $sinAsignar =  Tickets::mostrarColaTickets(0);
            echo json_encode(array('html'=>$sinAsignar,'html2'=>$asignados));
        //}
       // else//reabrir un ticket
          //  echo json_encode(array('html2'=>$asignados));
        
    }

    public function actualizarColaTicketsCerrados(){
        $asignados =  Tickets::mostrarColaTickets(1,true);
        $cerrados =  Tickets::mostrarColaTickets(2);
        echo json_encode(array('html'=>$asignados,'html2'=>$cerrados));
    }

    public function mostaraDatosTicket(){
        Tickets::mostaraDatosTicket($this->idTicket);
    }

    public function resetearMensajes(){
        $respuesta = Tickets::resetearMensajes();
        echo json_encode(array('response'=>'ok'));
    }
    
    public function mostaraDatosTicket2(){
        Tickets::mostaraDatosTicket2($this->idTicket);
    }

    public function asignarTicket(){
        Tickets::asignarTicket($this->idTicket,$this->area,$this->idEmpleado);
    }

    public function cerrarTicket(){//cerrar ticket por primera vez
        Tickets::cerrarTicket($this->idTicket,$this->descripcion,$this->causa,$this->problema);
    }

    public function cerrarTicket2(){//cerrar nuevamente el ticket
        Tickets::cerrarTicket2($this->idTicket);
    }

    public function usuarios(){
        $respuesta = Tickets::usuarios($this->sucursal);
        echo $respuesta;
    }

    public function datosParaGraficar($grupo,$tipo){
        if($grupo == 1){
            if($tipo == 1){
                $data=array();
                $respuesta = Tickets::datosGraficasBarras(1);

                if($respuesta){
                    foreach($respuesta as $row => $item){
                        if($item['subcategoria'] == 1)
                            $item['subcategoria'] = 'Carpetas en red';
                        else if($item['subcategoria'] == 2)
                            $item['subcategoria'] = 'CONTPAQi Adminpaq';
                        else if($item['subcategoria'] == 3)
                            $item['subcategoria'] = 'CONTPAQi Contabilidad y Bancos';
                        else if($item['subcategoria'] == 4)
                            $item['subcategoria'] = 'CONTPAQi Facturación';
                        else if($item['subcategoria'] == 5)
                            $item['subcategoria'] = 'CONTPAQi Nomipaq';
                        else if($item['subcategoria'] == 6)
                            $item['subcategoria'] = 'Correo electrónico';
                        else if($item['subcategoria'] == 7)
                            $item['subcategoria'] = 'Impresoras y Toner';
                        else if($item['subcategoria'] == 8)
                            $item['subcategoria'] = 'Paquetería Office';
                        else if($item['subcategoria'] == 9)
                            $item['subcategoria'] = 'Red e Internet';
                        else if($item['subcategoria'] == 10)
                            $item['subcategoria'] = 'Spark';
                        else if($item['subcategoria'] == 11)
                            $item['subcategoria'] = 'XML';
                        else if($item['subcategoria'] == 12)
                            $item['subcategoria'] = 'Otros';
                        array_push($data, array($item['subcategoria'],$item['total']));
                    }
                }

                if(count($data)<6){
                    while(count($data) < 6){
                        array_push($data, array('---',0));
                    }
                }
                echo json_encode($data);
            }
            else if($tipo == 2){
                $uno = Tickets::datosParaGraficar(AccesoSoporte::idUsuarios('Rogelio'));
                $dos = Tickets::datosParaGraficar(AccesoSoporte::idUsuarios('Ulises'));
                $tres = Tickets::datosParaGraficar(AccesoSoporte::idUsuarios('Juan'));
                $array= json_encode(array($uno,$dos,$tres));
                echo $array;
            }
        }
        else if($grupo == 2){
            if($tipo == 1){
                
                $data=array();
                $respuesta = Tickets::datosGraficasBarras(2);

                if($respuesta){
                    foreach($respuesta as $row => $item){
                        if($item['subcategoria'] == 1){
                            $item['subcategoria'] = 'Nóminas';
                            switch($item["segmento"]){
                                case 1: $item["segmento"]='Cálculos Extraordinarios';
                                        break;
                                case 2: $item["segmento"]='Finiquitos';
                                        break;
                                case 3: $item["segmento"]='Aguinaldos';
                                        break;
                                case 4: $item["segmento"]='Conexión a escritorio remoto';
                                        break;
                                case 5: $item["segmento"]='Usuarios y contraseñas';
                                        break;
                                case 6: $item["segmento"]='Reportes';
                                        break;
                                case 7: $item["segmento"]='Cálculos Extraordinarios';
                                        break;
                                case 8: $item["segmento"]='Timbrado';
                                        break;
                                case 9: $item["segmento"]='Alta de Clientes / Tipos de Nómina';
                                        break;
                                case 10: $item["segmento"]='Alta de Puestos';
                                        break;
                                case 11: $item["segmento"]='Alta de Turnos';
                                        break;
                                case 12: $item["segmento"]='Movimientos masivos';
                                        break;
                                case 13: $item["segmento"]='Otros';
                                        break;
                            }
                        }
                        else if($item['subcategoria'] == 2){
                            $item['subcategoria'] = 'Procesos IMSS';
                            switch($item["segmento"]){
                                case 1: $item["segmento"]='Altas';
                                        break;
                                case 2: $item["segmento"]='Bajas';
                                        break;
                                case 3: $item["segmento"]='Modificaciones salariales';
                                        break;
                                case 4: $item["segmento"]='Reingresos';
                                        break;
                                case 5: $item["segmento"]='Alta de Registros patronales';
                                        break;
                                case 6: $item["segmento"]='INFONAVIT';
                                        break;
                                case 7: $item["segmento"]='FONACOT';
                                        break;
                                case 8: $item["segmento"]='Movimientos masivos';
                                        break;
                                case 9: $item["segmento"]='Otros';
                                        break;
                            }
                        }
                        else if($item['subcategoria'] == 3){
                             $item['subcategoria'] = 'Módulo Pre Alta';
                             switch($item["segmento"]){
                                case 1: $item["segmento"]='Captura de información';
                                        break;
                                case 2: $item["segmento"]='Correo electrónico';
                                        break;
                                case 3: $item["segmento"]='Exportación de empleados';
                                        break;
                                case 4: $item["segmento"]='Otros';
                                        break;
                            }
                        }
                           
                        else if($item['subcategoria'] == 4){
                            $item['subcategoria'] = 'Módulo Recibos CFDI';
                            switch($item["segmento"]){
                                case 1: $item["segmento"]='Error en timbre';
                                        break;
                                case 2: $item["segmento"]='XML y PDF';
                                        break;
                                case 3: $item["segmento"]='Reportes';
                                        break;
                                case 4: $item["segmento"]='Falta de timbres';
                                        break;
                                case 5: $item["segmento"]='Otros';
                                        break;
                            }
                        }
                            
                        else if($item['subcategoria'] == 5){
                             $item['subcategoria'] = 'Módulo Archivo Electrónico';
                            switch($item["segmento"]){
                                case 1: $item["segmento"]='Alta de nuevos documentos';
                                        break;
                                case 2: $item["segmento"]='Otros';
                                        break;
                            }
                        }
                           
                        else if($item['subcategoria'] == 6)
                            $item['subcategoria'] = 'Otras';
                        array_push($data, array($item['subcategoria'],$item['total'],$item['segmento']));
                    }
                }

                if(count($data)<6){
                    while(count($data) < 6){
                        array_push($data, array('',0,''));
                    }
                }
                echo json_encode($data);

            }
            else if($tipo == 2){
                $uno = Tickets::datosParaGraficar(AccesoSoporte::idUsuarios('Miguel'));
                $dos = Tickets::datosParaGraficar(AccesoSoporte::idUsuarios('Salvador'));
                $array= json_encode(array($uno,$dos));
                echo $array;
            }
        }
        else if($grupo == 3){

        }
    }

    public function historialTickets(){

        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $totalRegistros = Tickets::totalHistorialTickets($this->fechaTicket,$this->nombreUsuario);

        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);

        $mostrar =  $paginacion->mostrar();
        $data = Tickets::historialTickets($this->fechaTicket,$this->nombreUsuario,$paginacion->limitRegistros());
        $respuesta = array("mostrar"=>$mostrar,"data"=>$data);
        echo json_encode($respuesta);
    }

    public function reabrirTicket(){
        $respuesta = Tickets::reabrirTicket($this->idTicket);
        echo $respuesta;
    }

    public function reabrirTicketSoporte(){
        $respuesta = Tickets::reabrirTicketSoporte($this->idTicket,$this->flag,$this->descripcion);
        echo $respuesta;
    }

    public function totalReabiertos(){
        $respuesta = Tickets::totalPorReabrir();
        $respuesta2 = Tickets::mostrarColaTicketsReabiertos();
        echo json_encode(array('total'=>$respuesta,'lista'=>$respuesta2));
    }

    public function actualizarSolucion(){
        Tickets::actualizarSolucion($this->idTicket,$this->descripcion,$this->causa,$this->problema);
    }

    public function mostrarSolucionTicket(){
       $respuesta =  Tickets::mostrarSolucionTicket($this->idTicket);
       $respuesta = str_replace('<br />','',$respuesta);
       echo json_encode(array('solucion'=>$respuesta['solucion'],'causa'=>$respuesta['causa'],'problema'=>$respuesta['problema']));
    }

    public function mostrarListaHistorial(){
        $respuesta =  Tickets:: mostrarListaHistorial($this->idTicket);
        echo json_encode(array('html'=>$respuesta));
     }

    public function detallesAperturaCierre(){
        $respuesta =  Tickets::detallesAperturaCierre($this->idTicket);
        echo json_encode(array('valor'=>$respuesta));
    }

    public function verificarSituacionTicket(){
        $respuesta =  Tickets::verificarSituacionTicket($this->idTicket);
        echo $respuesta;
    }

    public function actualizarHistorialUsuario(){
        $respuesta = Tickets::historialTicketsUsuario();
        echo json_encode(array('html'=>$respuesta));
    }

    /******************************NUEVA VERSIÓN***********************************/
    public $paginaActual;
    public $registrosPorPagina;
    public $target;
    public $cadena;
    public $idTicket;
    public $area;
    public $categoria;
    public $subCategoria=null; 
    public $asunto;
    public $descripcion;//y solucion
    public $archivo=array();
    public $tipoCampo;
    public $causa;
    public $problema;
    public $idEmpleado=null;


    public function crearTicket(){
        $data=array('usuario'=>$this->idEmpleado,
                    'area'=>$this->area,
                    'categoria'=>$this->categoria,
                    'subcategoria'=>$this->subCategoria,
                    'asunto'=>$this->asunto,
                    'descripcion'=>$this->descripcion,
                    'archivos'=>$this->archivo
        );
        echo json_encode(Tickets::crearTicket($data));
    }

    public function modalPorAtender(){
        echo json_encode(Tickets::modalPorAtender());
    }

    public function modalFinalizados(){
        echo json_encode(Tickets::estadisticas());
    }

    public function modalPorAbrir(){
        echo json_encode(Tickets::mostrarColaTicketsReabiertos_());
    }

    public function modalAtendiendose(){
        echo json_encode(Tickets::personalSoporte());
    }

    public function modalAsignarTicket(){
        echo json_encode(Tickets::personalSoporte2());
    }

    public function datosTicket(){
        echo json_encode(Tickets::datosTicket($this->idTicket));
    }

    public function datosTicket2(){
        echo json_encode(Tickets::datosTicket2($this->idTicket));
    }

    public function motivoApertura(){
        echo json_encode(Tickets::motivoApertura($this->idTicket,$this->tipoCampo));
    }

    public function paginador(){
        $paginacion = new Paginacion($this->registrosPorPagina);
        $paginacion->target($this->target);
        $totalRegistros = Tickets::totalHistorialTickets_($this->cadena);
        $paginacion->totalPaginas($totalRegistros);
        $paginacion->paginaActual($this->paginaActual);
        $paginacion->parametroNombre($this->cadena);
        $paginador =  $paginacion->mostrar();
        $data = Tickets::historialTickets_($this->cadena,$paginacion->limitRegistros());
        echo json_encode(array("paginador"=>$paginador,"html"=>$data,'total'=>$totalRegistros));
    }

    public function mostrarSolucion(){
        $respuesta = Tickets::mostrarSolucion($this->idTicket);
        $respuesta = str_replace('<br />','',$respuesta);
        echo json_encode(array('solucion'=>$respuesta['solucion'],'causa'=>$respuesta['causa'],'problema'=>$respuesta['problema'],'anexos'=>Tickets::getArchivosSoporte($this->idTicket)));
    }

    public function cargarCategorias(){
        echo json_encode(Tickets::cargarCategorias($this->area,$this->tipoCampo));
    }

    public function cargarSubCategorias(){
        echo json_encode(Tickets::cargarSubCategorias($this->area,$this->categoria,$this->tipoCampo));
    }

    public function agregarCategoria(){
        echo json_encode(Tickets::agregarCategoria($this->area,$this->cadena));
    }

    public function agregarSubCategoria(){
        echo json_encode(Tickets::agregarSubCategoria($this->area,$this->categoria,$this->cadena));
    }

    public function sonido(){
        echo json_encode(Tickets::sonido($this->archivo));
    }

    public function sonido2(){
        echo json_encode(Tickets::sonido2($this->area));
    }

    public function actualizarHistorialUsuario_(){
        echo json_encode(array('error'=>false,'html'=>Tickets::historialTicketsUsuario_()));
    }

    public function listarUsuarios(){
        echo json_encode(Tickets::listarUsuarios($this->sucursal));
    }

    public function redirigirTicket(){
        echo json_encode(Tickets::redirigirTicket($this->idTicket,$this->area));
    }

    public function tomarTicket(){
        echo json_encode(Tickets::tomarTicket($this->idTicket,$this->idEmpleado));
    }

    public function guardarSolucion(){
        $data = array('id'=>$this->idTicket,
                      'solucion'=>$this->descripcion,
                      'causa'=>$this->causa,
                      'problema'=>$this->problema,
                      'archivos'=>$this->archivo

                    );
        echo json_encode(Tickets::guardarSolucion($data));
    }

    public function reabrirTicketUsuario(){
        echo json_encode(Tickets::reabrirTicketUsuario($this->idTicket,$this->descripcion));
    }

    public function autorizarApertura(){
        echo json_encode(Tickets::autorizarApertura($this->idTicket));
    }

    public function mostrarListaHistorial_(){
        echo json_encode(array('error'=>false,'html'=>Tickets::mostrarListaHistorial_($this->idTicket)));
    }

    public function actualizarCola(){
        if($this->tipoCampo == 0)
            $data = array('error'=>false,'nuevos'=>Tickets::mostrarColaTickets_(0),'contadorPorAtender'=>Tickets::totalTickets(0));
        else if($this->tipoCampo == 1)
            $data = array('error'=>false,'nuevos'=>Tickets::mostrarColaTickets_(0),'atendiendose'=>Tickets::mostrarColaTickets_(1),'contadorPorAtender'=>Tickets::totalTickets(0),'contadorAtendiendose'=>Tickets::totalTickets(1));
        else if($this->tipoCampo == 2)
            $data = array('error'=>false,'finalizados'=>Tickets::mostrarColaTickets_(2),'atendiendose'=>Tickets::mostrarColaTickets_(1),'contadorFinalizados'=>(Tickets::totalTickets(2) + Tickets::totalAbiertos()),'contadorAtendiendose'=>Tickets::totalTickets(1));
        else if($this->tipoCampo == 3)
            $data = array('error'=>false,'abiertos'=>Tickets::mostrarColaTicketsReabiertos_(),'atendiendose'=>Tickets::mostrarColaTickets_(1),'contadorPorAbrir'=>Tickets::totalPorReabrir_(),'contadorAtendiendose'=>Tickets::totalTickets(1));
        else if($this->tipoCampo == 4)
            $data = array('error'=>false,'abiertos'=>Tickets::mostrarColaTicketsReabiertos_(),'contadorPorAbrir'=>Tickets::totalPorReabrir_());
        else{//En caso de que se pierda la conexión, el sistema de tickets al restableceral volvera a pedir todos los datos por si ocurrierron actualizaciones durante ese periodo
            $data = array(  'error'=>false,
                            'nuevos'=>Tickets::mostrarColaTickets_(0),
                            'contadorPorAtender'=>Tickets::totalTickets(0),
                            'atendiendose'=>Tickets::mostrarColaTickets_(1),
                            'contadorAtendiendose'=>Tickets::totalTickets(1),
                            'finalizados'=>Tickets::mostrarColaTickets_(2),
                            'contadorFinalizados'=>(Tickets::totalTickets(2) + Tickets::totalAbiertos()),
                            'contadorPorAbrir'=>Tickets::totalPorReabrir_()
                        );
        } 
        echo json_encode($data);
    }

}


 if(isset($_POST["areaSistemas"])){
    $a = new AjaxTickets();
    $a->area=$_POST["areaSistemas"];
    $a->subCategoria = $_POST['subCategoriaTickets'];
    $a->asunto=trim(mb_strtoupper($_POST["asuntoTicket"],'utf-8'));
    $a->descripcion=trim(nl2br($_POST["descripcionTicket"]));
    //$a->numeroTicket = $_POST['numeroTicket'];
    $a->idEmpleado = isset($_POST['idEmpleado']) ? $_POST['idEmpleado'] : NULL;
    $a->segmento = isset($_POST['segmentoTickets']) ? $_POST['segmentoTickets'] : NULL;
    if( isset($_FILES["cargarImagenTicket"]["name"])){
      $a->imagenNombre = $_FILES["cargarImagenTicket"]["name"];
      $a->imagenTipo = $_FILES["cargarImagenTicket"]["type"];
      $a->imagenTemporal = $_FILES["cargarImagenTicket"]["tmp_name"];
      $a->imagenTamano = $_FILES["cargarImagenTicket"]["size"];
    }
    if( isset($_FILES["cargarDocumentoTicket"]["name"])){
        $a->documentoNombre = $_FILES["cargarDocumentoTicket"]["name"];
        $a->documentoTipo = $_FILES["cargarDocumentoTicket"]["type"];
        $a->documentoTemporal = $_FILES["cargarDocumentoTicket"]["tmp_name"];
        $a->documentoTamano = $_FILES["cargarDocumentoTicket"]["size"];
    }
    $a->nuevoTicket();
}

else if(isset($_POST['actualizarColaTickets'])){
    $a = new AjaxTickets();
    $a->actualizarColaTickets();
}

else if(isset($_POST['actualizarColaTicketsAbiertos'])){
    $a = new AjaxTickets();
    //if(isset($_POST['flagReabrir']))
     //  $a->flag=1;
    $a->actualizarColaTicketsAbiertos();
}

else if(isset($_POST['actualizarColaTicketsCerrados'])){
    $a = new AjaxTickets();
    $a->actualizarColaTicketsCerrados();
}

//muestro la informacion de un ticket en particular
else if(isset($_POST['idTicket'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['idTicket'];
    $a->mostaraDatosTicket();
}

else if(isset($_POST['numeroTicket'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['numeroTicket'];
    $a->area = $_POST['categoria'];
    $a->idEmpleado = $_POST['atiende'];
    $a->asignarTicket();
}

else if(isset($_POST['idTicketCerrar'])){
    $a=new AjaxTickets();
    $a->idTicket =$_POST['idTicketCerrar'];
    $a->descripcion = trim(nl2br($_POST['solucion']));
    $a->causa = trim(nl2br($_POST['causa']));
    $a->problema = trim(nl2br($_POST['problema']));
    $a->cerrarTicket();
}

else if(isset($_POST['idVolverAcerrar'])){////////////////////////////////idTicketCerrar
    $a = new AjaxTickets();
    $a->idTicket =$_POST['idVolverAcerrar'];
    $a->cerrarTicket2();
}

else if(isset($_POST["asignarUsuarioTicket"])){
    $c=new AjaxTickets();
    $c->sucursal = $_POST["asignarUsuarioTicket"];
    $c->usuarios();
}

else if(isset($_POST["GraficaPastelGiro"])){
   $c = new AjaxTickets();
   $c-> datosParaGraficar(2,2);
}

else if(isset($_POST["GraficaPastelSoporte"])){
    $c=new AjaxTickets();
    $c->datosParaGraficar(1,2);
 }

 else if(isset($_POST["GraficaBarrasSoporte"])){
    $c=new AjaxTickets();
    $c->datosParaGraficar(1,1);
 }

 else if(isset($_POST["GraficaBarrasGiro"])){
    $c=new AjaxTickets();
    $c->datosParaGraficar(2,1);
 }

 else if(isset($_POST["fechaTicketCerrado"])){
    $c=new AjaxTickets();
    $c->fechaTicket = $_POST['fechaTicketCerrado'];;
    $c->nombreUsuario = $_POST['nombrePersonaRegistroTicket'];

    $c->paginaActual = $_POST["paginaActual"];
    $c->registrosPorPagina = $_POST["registrosPorPagina"];
    $c->target = $_POST["target"];

    $c->historialTickets();
 }

//muestro la informacion de un ticket en particular
else if(isset($_POST['idTicketRevision'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['idTicketRevision'];
    $a->mostaraDatosTicket2();
}

//el usuario solicita reabrir un ticket
else if(isset($_POST['idReabrirTicket'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['idReabrirTicket'];
    $a->reabrirTicket();
}

//soporte reabrir un ticket
else if(isset($_POST['idReabrirTicket2'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['idReabrirTicket2'];
    $a->flag = $_POST['flag'];//false = no se reabre el ticket, true = sí
    $a->descripcion = $_POST['motivo'];
    $a->reabrirTicketSoporte();
}

//recargar el total de tickets por reabrir
else if(isset($_POST['totalReabiertos'])){
    $a = new AjaxTickets();
    $a->totalReabiertos();
}

//actualizar la solución
else if(isset($_POST['actualizarSolucion'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['ticketAactualizar'];
    $a->descripcion = trim(nl2br($_POST['actualizarSolucion']));
    $a->causa = trim(nl2br($_POST['actualizarCausa']));
    $a->problema = trim(nl2br($_POST['actualizarProblema']));
    $a->actualizarSolucion();
}

//mostrar solución
else if(isset($_POST['mostrarSolucionTicket'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['mostrarSolucionTicket'];
    $a->mostrarSolucionTicket();
}

else if(isset($_POST['historialTickets'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['historialTickets'];
    $a->mostrarListaHistorial();
}

else if(isset($_POST['detallesAperturaCierre'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['detallesAperturaCierre'];
    $a->detallesAperturaCierre();
}

else if(isset($_POST['verificarSituacionTicket'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['verificarSituacionTicket'];
    $a->verificarSituacionTicket();
}

else if(isset($_POST['actualizarHistorial'])){
    $a = new AjaxTickets();
    $a->actualizarHistorialUsuario();
}

else if(isset($_POST['resetearMensajes'])){
    $a = new AjaxTickets();
    $a->resetearMensajes();
}

/**********************NUEVA VERSIÓN*************/
else if(isset($_POST['modalPorAtender'])){
    $a = new AjaxTickets();
    $a->modalPorAtender();
}

else if(isset($_POST['modalAtendiendose'])){
    $a = new AjaxTickets();
    $a->modalAtendiendose();
}

else if(isset($_POST['modalFinalizados'])){
    $a = new AjaxTickets();
    $a->modalFinalizados();
}

else if(isset($_POST['modalPorAbrir'])){
    $a = new AjaxTickets();
    $a->modalPorAbrir();
}

else if(isset($_POST['modalAsignarTicket'])){
    $a = new AjaxTickets();
    $a->modalAsignarTicket();
}

else if(isset($_POST['datosTicket'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['datosTicket'];
    $a->datosTicket();
}

else if(isset($_POST['datosTicketUsuario'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['datosTicketUsuario'];
    $a->datosTicket2();
}

else if(isset($_POST['motivoApertura'])){
    $a = New AjaxTickets();
    $a->idTicket = $_POST['motivoApertura'];
    if(isset($_POST['tipo']))
        $a->tipoCampo=true;
    $a->motivoApertura();
}

else if(isset($_POST["buscar"])){
    $c=new AjaxTickets();
    $c->cadena = $_POST['buscar'];
    $c->paginaActual = $_POST["paginaActual"];
    $c->registrosPorPagina = $_POST["registrosPorPagina"];
    $c->target = $_POST["target"];
    $c->paginador();
 }

 else if(isset($_POST['mostrarSolucion'])){
    $a = New AjaxTickets();
    $a->idTicket = $_POST['mostrarSolucion'];
    $a->mostrarSolucion();
}

else if(isset($_POST['cargarCategorias'])){
    $a = New AjaxTickets();
    $a->area = $_POST['cargarCategorias'];
    $a->tipoCampo = $_POST['tipo'];
    $a->cargarCategorias();
}

else if(isset($_POST['cargarSubcategorias'])){
    $a = New AjaxTickets();
    $a->area = $_POST['area'];
    $a->categoria = $_POST['categoria'];
    $a->tipoCampo = $_POST['tipo'];
    $a->cargarSubCategorias();
}

else if(isset($_POST['agregarCategoria'])){
    $a = New AjaxTickets();
    $a->area = $_POST['agregarCategoria'];
    $a->cadena = $_POST['nombre'];
    $a->agregarCategoria();
}

else if(isset($_POST['agregarSubCategoria'])){
    $a = New AjaxTickets();
    $a->area = $_POST['agregarSubCategoria'];
    $a->categoria = $_POST['categoria'];
    $a->cadena = $_POST['nombre'];
    $a->agregarSubCategoria();
}

else if(isset($_POST['sonidoPersonalizado'])){
    $a = New AjaxTickets();
    $a->archivo=$_FILES['sonido'];
    $a->sonido();
}

else if(isset($_POST['sonidoPersonalizado2'])){
    $a = New AjaxTickets();
    $a->area=$_POST['sonidoPersonalizado2'];
    $a->sonido2();
}

else if(isset($_POST["redirigirTicket"])){
    $c=new AjaxTickets();
    $c->idTicket = $_POST["redirigirTicket"];
    $c->area= $_POST["area"];
    $c->redirigirTicket();
}

else if(isset($_POST['area'])){
    $a = New AjaxTickets();
    if(isset($_POST['usuario']))
        $a->idEmpleado=$_POST['usuario'];
    $a->area = $_POST['area']; 
    $a->categoria= $_POST['categoria'];
    if(isset($_POST['subcategoria']))
        $a->subCategoria= $_POST['subcategoria'];
    $a->asunto= $_POST['asunto'];
    $a->descripcion = trim(nl2br($_POST['descripcion']));
    if(isset($_POST['total'])){
        $total = $_POST['total'];
        for($i=0;$i<$total;$i++)
            $a->archivo[$i] =$_FILES["archivo".$i];
    }
    $a->crearTicket();
}

else if(isset($_POST['actualizarHistorialUsuario'])){
    $a = new AjaxTickets();
    $a->actualizarHistorialUsuario_();
}

else if(isset($_POST["listarUsuarios"])){
    $c=new AjaxTickets();
    $c->sucursal = $_POST["listarUsuarios"];
    $c->listarUsuarios();
}

else if(isset($_POST["tomarTicket"])){
    $c=new AjaxTickets();
    $c->idTicket = $_POST["tomarTicket"];
    if($_POST["asignado"]!=0){
        $idEmpleado=$_POST["asignado"];
        if(Configuraciones::administrador() != $_SESSION['identificador2']){
            echo json_encode(array('error'=>true,'tipo'=>error,'titulo'=>'Error','subtitulo'=>'No tiene privilegios para asignar tickets','tiempo'=>60000,'boton'=>true));
            return;
        }
    }
        
    $c->tomarTicket();
}

else if(isset($_POST['guardarSolucion'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['guardarSolucion'];
    $a->descripcion = trim(nl2br($_POST['solucion']));
    $a->causa = trim(nl2br($_POST['causa']));
    $a->problema = trim(nl2br($_POST['problema']));
    if(isset($_POST['total'])){
        $total = $_POST['total'];
        for($i=0;$i<$total;$i++)
            $a->archivo[$i] =$_FILES["archivo".$i];
    }
    $a->guardarSolucion();
}

else if(isset($_POST['reabrirTicketUsuario'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['reabrirTicketUsuario'];
    $a->descripcion = trim(nl2br($_POST['motivoParaAbrir']));
    $a->reabrirTicketUsuario();
}

else if(isset($_POST['autorizarApertura'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['autorizarApertura'];
    $a->autorizarApertura();
}

else if(isset($_POST['historialTickets_'])){
    $a = new AjaxTickets();
    $a->idTicket =$_POST['historialTickets_'];
    $a->mostrarListaHistorial_();
}

else if(isset($_POST['actualizarCola'])){
    $a = New AjaxTickets();
    $a->tipoCampo = $_POST['valor'];
    $a->actualizarCola();
}










