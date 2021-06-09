<?php
include_once 'sucursales.php';
include_once '../models/sucursales.php';
include_once '../models/estados.php';

class SucursalesAjax{
    public function sucursalNuevaControllers($valor){

        if(isset($_POST["nombreSucursal"])){
            $usuarioFormulario = array("nombre"=>mb_strtoupper(trim($_POST["nombreSucursal"]),'utf-8'), 
                                      "calle"=>mb_strtoupper(trim($_POST["calleSucursal"]),'utf-8'),
                                      "exterior"=>mb_strtoupper(trim($_POST["exteriorSucursal"]),'utf-8'),
                                      "interior"=>mb_strtoupper(trim($_POST["interiorSucursal"]),'utf-8'), 
                                      "codigo"=>$_POST["codigoSucursal"],
                                      "colonia"=>mb_strtoupper($_POST["coloniaSucursal"],'utf-8'),
                                      "municipio"=>mb_strtoupper($_POST["municipioSucursal"],'utf-8'),
                                      "estado"=>mb_strtoupper($_POST["estadoSucursal"]),
                                      "telefonos"=>$_POST["telefonos"]);
        $respuesta = gestionSucursales::sucursalNuevaController($usuarioFormulario,$valor,"sucursales_ae");
        echo $respuesta;
        }
    }

    public $eliminarSucursal;
    public function sucursalEliminarControllers(){
			$respuesta = gestionSucursales::eliminarSucursalController($this->eliminarSucursal);
            echo $respuesta;
          
    }

}


/*NUEVO SUCURSAL Y ACTUALIZAR*/
/************************************/
if(isset($_POST["nombreSucursal"])){
    $a = new SucursalesAjax();
    if(empty($_POST["id_sucursal"]))
        $a->sucursalNuevaControllers(0);//nuevo
    else
        $a->sucursalNuevaControllers($_POST["id_sucursal"]);//actualizar
}


/*ELIMINAR SUCURSAL*/
/************************************/
if(isset($_POST["idSucursalEliminar"])){
    $b = new SucursalesAjax();
    $b->eliminarSucursal = $_POST["idSucursalEliminar"];
    $b->sucursalEliminarControllers();
}

