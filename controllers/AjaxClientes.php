<?php

session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

require_once 'Clientes.php';
require_once 'Nominas.php';
require_once '../models/ClientesModel.php';
require_once '../models/NominasModel.php';
require_once '../models/config.php';
require_once "ajaxPaginacion.php";
require_once "MetodosDiversos.php";

class AjaxClientes{
    
    public function cargarEmpresas(){
            $facturadoras = Nominas::mostrarSelect(0,Tablas::facturadoras());
            $asimilados = Nominas::mostrarSelect(0,Tablas::asimilados());
            $imss = Nominas::mostrarSelect(0,Tablas::imss());
            echo json_encode(array('error'=>false,'facturadoras'=>$facturadoras,'imss'=>$imss,'asimilados'=>$asimilados));
    }
   
}

if(isset($_POST['cargarEmpresas'])){
    $a = new AjaxClientes();
    $a->cargarEmpresas();

}


/*

if(isset($_POST['rfc'])){
    $a = new AjaxEmpresas();
    if(isset($_POST['actualizarEmpresa']))
        $a->id = $_POST['actualizarEmpresa'];
    $a->rfc=$_POST['rfc'];
    $a->razon=$_POST['razon'];
    $a->regimen=$_POST['regimen'];
    $a->nombre=$_POST['nombre'];
    $a->inicio=$_POST['inicio'];
    $a->status=$_POST['status'];
    $a->ultimo_cambio=$_POST['ultimo_cambio'];
    $a->codigo=$_POST['codigo'];
    $a->tipo_vialidad=$_POST['tipo_vialidad'];
    $a->nombre_vialidad=$_POST['nombre_vialidad'];
    $a->numero_exterior=$_POST['numero_exterior'];
    $a->numero_interior=$_POST['numero_interior'];
    $a->colonia=$_POST['colonia'];
    $a->localidad=$_POST['localidad'];
    $a->municipio=$_POST['municipio'];
    $a->entidad=$_POST['entidad'];
    $a->entre_calle1=$_POST['entre_calle1'];
    $a->entre_calle2=$_POST['entre_calle2'];
    $a->mail=$_POST['mail'];
    $a->statusIntranet=$_POST['statusIntranet'];
    if(isset($_POST['asimilados']))
        $a->asimilados = $_POST['asimilados'];
    if(isset($_POST['imss']))
        $a->imss = $_POST['imss'];
    if(isset($_POST['facturadora']))
        $a->facturadora=$_POST['facturadora'];

    if(isset($_POST['sucursalDireccion'])){
        $a->sucursalesDireccion = $_POST['sucursalDireccion'];
        $a->sucursalesMotivo = $_POST['sucursalMotivo'];
        $a->actualizarSucursal = $_POST['actualizarSucursal'];
    }  

    if(isset($_POST['responsableCalculo'])){
        $a->responsablesCalculo = $_POST['responsableCalculo'];
    } 
    
    if(isset($_POST['responsableLiberacion'])){
        $a->responsablesLiberacion = $_POST['responsableLiberacion'];
    } 

    if(isset($_POST['responsableDispersion'])){
        $a->responsablesDispersion = $_POST['responsableDispersion'];
    } 

    if(isset($_POST['responsableFacturacion'])){
        $a->responsablesFacturacion = $_POST['responsableFacturacion'];
    } 




    if(isset($_FILES["sucursalCif"]["name"])){
        $a->documentoSucursalNombre = $_FILES["sucursalCif"]["name"];
        $a->documentoSucursalTemporal = $_FILES["sucursalCif"]["tmp_name"];
    }

    if(!empty($_FILES["documento"]["name"])){
        $a->documentoNombre = $_FILES["documento"]["name"];
        $a->documentoTemporal = $_FILES["documento"]["tmp_name"];
    }
    if(!empty($_FILES["logo"]["name"])){
        $a->imagenNombre = $_FILES["logo"]["name"];
        $a->imagenTemporal = $_FILES["logo"]["tmp_name"];
    }
    if(!empty($_FILES["sellos"]["name"])){
        $a->sellosNombre = $_FILES["sellos"]["name"];
        $a->sellosTemporal = $_FILES["sellos"]["tmp_name"];
    }
    
    $a->guardar();
}

else if(isset($_POST['mostrarData'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['mostrarData'];
    $a->mostrarData();
}


else if(isset($_POST['paginaActual'])){
    $a = New AjaxEmpresas();
    $a->paginaActual=$_POST['paginaActual'];
    $a->registrosPorPagina=$_POST['registrosPorPagina'];
    $a->target=$_POST['target'];
    $a->cliente=$_POST['cliente'];
    $a->liberado=$_POST['liberado'];
    if(isset($_POST['marcadores'])){
        $a->marcadores=true;
        $a->marcadores2=true;
    }
       
    $a->paginador();
}

else if(isset($_POST['mostrarData'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['mostrarData'];
    $a->mostrarData();
}

else if(isset($_POST['borrarSucursal'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['borrarSucursal'];
    $a->borrarSucursal();
}

else if(isset($_POST['borrarResponsable'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['borrarResponsable'];
    $a->borrarResponsable();
}

else if(isset($_POST['cargarSucursales'])){
    $a = new AjaxEmpresas();
    $a->cargarSucursales();
}

else if(isset($_POST['cargarUsuarios'])){
    $a = new AjaxEmpresas();
    $a->id = $_POST['cargarUsuarios'];
    $a->target = $_POST['tipo'];
    $a->cargarUsuarios();
}

*/