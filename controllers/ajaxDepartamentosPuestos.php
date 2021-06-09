<?php
include_once 'departamentosPuestos.php';
include_once '../models/departamentosPuestos.php';

class SucursalesDepartamentosAjax{

    /****OK*****/
    public $departamentoCargar;
    public function departamentoAjax($valor){
        $respuesta = gestionSucursalesDepartamentos::mostrarDepartamentosController($this->departamentoCargar,$valor);
        echo $respuesta;
    }

    public $departamentoPuesto;
    public $sucursalDepartamento;
    public function puestoAjax($variable=0){
        $respuesta = gestionSucursalesDepartamentos::mostrarPuestosController($this->sucursalDepartamento,$this->departamentoPuesto,$variable);
        //echo $respuesta;
    }

    /***OK***/
    public $idSucursal;
    public $datosDepartamentos;
    public function vinculacionSucursalDepartamentoAjax(){
        $respuesta = gestionSucursalesDepartamentos::vinculacionSucursalDepartamentoController($this->idSucursal,$this->datosDepartamentos);
        echo $respuesta;
    }

    /***OK***/
    public $datosPuestos;
    public function vinculacionSucursalDepartamentoPuestoAjax(){
        $respuesta = gestionSucursalesDepartamentos::vinculacionSucursalDepartamentoPuestoController($this->idSucursal,$this->datosDepartamentos,$this->datosPuestos);
        echo $respuesta;
        //echo $this->datosPuestos;
    }


    /***OK***/
    public function nuevoDepartamento(){
        if(isset($_POST["arregloSucursales"])){
            $datos = mb_strtoupper($_POST["arregloSucursales"],'utf-8');
            $respuesta = gestionSucursalesDepartamentos::nuevoDepartamento($datos);
            echo $respuesta;
        }
    }

    /***OK***/
    public function nuevoPuesto(){
        if(isset($_POST["arregloPuestos"])){
            $datos = mb_strtoupper($_POST["arregloPuestos"],'utf-8');
            $respuesta = gestionSucursalesDepartamentos::nuevoPuesto($datos);
            echo $respuesta;
        }
    }

    /***OK***/
    public $idDepartamento;
    public function cargarDepartamentosTodos(){
        $respuesta = gestionSucursalesDepartamentos::departamentosTodosController($this->idDepartamento);
        //echo $respuesta;
    }

     /***OK***/
     public function cargarPuestosNoVinculados(){
        $respuesta = gestionSucursalesDepartamentos::puestosNoVinculadosController($this->idSucursal,$this->idDepartamento);
        echo $respuesta;
    }

     /***OK***/
     public function desvinculacionSucursalDepartamentoAjax(){
         $respuesta = gestionSucursalesDepartamentos::desvinculacionSucursalDepartamentoController($this->idSucursal, $this->datosDepartamentos);
         echo $respuesta;
     }

    /***OK***/
     public function desvinculacionSucursalDepartamentoPuestoAjax(){
        $respuesta = gestionSucursalesDepartamentos::desvinculacionSucursalDepartamentoPuestoController($this->idSucursal, $this->idDepartamento, $this->datosPuestos);
        echo $respuesta;
     }

     /***OK***/
     public function departamentoEliminarAjax(){
        $respuesta = gestionSucursalesDepartamentos::departamentoEliminarController($this->idDepartamento);
        echo $respuesta;
     }

     /***OK***/
     public function listaTotalidadDePuestosAjax(){
        $respuesta = gestionSucursalesDepartamentos::puestosTodosController();
        echo $respuesta;
     }

     /***OK***/
     public function  listaTotalidadDeDepartamentosAjax(){
        $respuesta = gestionSucursalesDepartamentos::departamentosTodosController();
        echo $respuesta;
     }
    
     /***OK***/
     public function puestoEliminarAjax(){
        $respuesta = gestionSucursalesDepartamentos::puestoEliminarController($this->idPuesto);
        echo $respuesta;
     }
}


/*Cargar departamentos vinculados a una sucursal (INTERFAZ: usuarios, vincularPuesto)*/
/********************OK****************/
if(isset($_POST["sucursalDepartamento"])){
    $a = new SucursalesDepartamentosAjax();
    $a->departamentoCargar = $_POST["sucursalDepartamento"];
    if(isset($_POST["interfazVincularPuesto"]))//la petición viene de la interfaz vincularPuesto, esto para cambiar el nombre del campo select y no genere conflictos con el de la interfaz usuarios
        $a-> departamentoAjax(1);	
    else
        $a-> departamentoAjax(0);
}

/*Cargar puestos vinculados a un departamento-sucursal (INTERFAZ: usuarios, vincularPuesto)*/
/********************OK****************/
else if(isset($_POST["sucursalDepartamentoPuesto"])){
    $b = new SucursalesDepartamentosAjax();
    $b->sucursalDepartamento = $_POST["sucursalDepartamentoPuesto"];
    $b->departamentoPuesto= $_POST["sucursalDepartamentoPuesto2"];
    if(isset($_POST['indicarInterfaz']))
        $b->puestoAjax(1);
    else
	    $b->puestoAjax();	
}

/*Vincular Sucursal--Departamentos (INTERFAZ: vincularDepartamento)*/
/****************OK********************/
else if(isset($_POST["arregloVinculacionSucursalDepartamento"])){
    $c = new SucursalesDepartamentosAjax();
    $c->idSucursal = $_POST["departamentoVincularSucursal"];
    $c->datosDepartamentos= $_POST["arregloVinculacionSucursalDepartamento"];
    $c->vinculacionSucursalDepartamentoAjax();	
}

/*Nuevo departamento (INTERFAZ: departamento)*/
/***************OK*********************/
else if(isset($_POST["arregloSucursales"])){
    $d = new SucursalesDepartamentosAjax();
    $d-> nuevoDepartamento();	
}

/*Nuevo puesto (INTERFAZ: puesto)*/
/***************OK*********************/
else if(isset($_POST["arregloPuestos"])){
    $e = new SucursalesDepartamentosAjax();
    $e-> nuevoPuesto();	
}


/*Activar departamentos, cargar todos los departamentos (INTERFAZ: vincularDepartamento)*/
/***************OK*********************/
else if(isset($_POST["activarDepartamento"])){
    $f = new SucursalesDepartamentosAjax();
    $f->idDepartamento = $_POST["activarDepartamento"];
    $f -> cargarDepartamentosTodos();	
}

/*Cargar departamentos vinculados a una sucursal (INTERFAZ: usuarios, vincularPuesto)*/
/***************OK*********************/
else if(isset($_POST["activarDepartamentosVinculados"])){
    $i = new SucursalesDepartamentosAjax();
    $i->departamentoCargar = $_POST["activarDepartamentosVinculados"];
    $i-> departamentoAjax(2);	
}

/*Activar puestos, cargar todos los puestos que no estan vinculados (INTERFAZ: vincularPuesto)*/
/***************OK*********************/
else if(isset($_POST["activarPuestoSucursal"])){
    $g = new SucursalesDepartamentosAjax();
    $g->idSucursal=$_POST["activarPuestoSucursal"];
    $g->idDepartamento=$_POST["activarPuestoDepartamento"];
    $g -> cargarPuestosNoVinculados();
}

/*Vincular Sucursal--Departamento--Puesto (INTERFAZ: vincularPuesto)*/
/****************OK********************/
else if(isset($_POST["arregloVinculacionSucursalDepartamentoPuesto"])){
    $h = new SucursalesDepartamentosAjax();
    $h->idSucursal = $_POST["sucursalNuevaPuesto"];
    $h->datosDepartamentos = $_POST["departamentoNuevoPuesto"];
    $h->datosPuestos = $_POST["arregloVinculacionSucursalDepartamentoPuesto"];
    $h->vinculacionSucursalDepartamentoPuestoAjax();
}


/*Desvincular Sucursal--Departamento (INTERFAZ: vincularDepartamento)*/
/****************OK********************/
else if(isset($_POST["ventanaModaldepartamento"])){
    $j = new SucursalesDepartamentosAjax();
    $j->idSucursal = $_POST["ventanaModalSucursal"];
    $j->datosDepartamentos = $_POST["ventanaModaldepartamento"];
    $j->desvinculacionSucursalDepartamentoAjax();
}

/*Desvincular Sucursal--Departamento--puesto (INTERFAZ: vincularPuesto)*/
/****************OK********************/
else if(isset($_POST["ventanaModalSucursal2"])){
    $k = new SucursalesDepartamentosAjax();
    $k->idSucursal = $_POST["ventanaModalSucursal2"];
    $k->idDepartamento = $_POST["ventanaModaldepartamento2"];
    $k->datosPuestos = $_POST["ventanaModalPuesto"];
    $k->desvinculacionSucursalDepartamentoPuestoAjax();
}

/*Eliminar departamento (INTERFAZ: eliminarDepartamento)*/
/****************OK********************/
else if(isset($_POST["idDepartamentoEliminar"])){
    $h = new SucursalesDepartamentosAjax();
    $h->idDepartamento = $_POST["idDepartamentoEliminar"];
    $h->departamentoEliminarAjax();
}

/*Mostrar la totalidad de puestos(INTERFAZ: puesto)*/
/****************OK********************/
else if(isset($_POST["listaTotalidadDePuestos"])){
    $i = new SucursalesDepartamentosAjax();
    $i->listaTotalidadDePuestosAjax();
}

/*Mostrar la totalidad de departamentos(INTERFAZ: departamento)*/
/****************OK********************/
else if(isset($_POST["listaTotalidadDeDepartamentos"])){
    $l = new SucursalesDepartamentosAjax();
    $l->listaTotalidadDeDepartamentosAjax();
}

/*Eliminar puesto (INTERFAZ: eliminarPuesto)*/
/****************OK********************/
else if(isset($_POST["idPuestoEliminar"])){
    $m = new SucursalesDepartamentosAjax();
    $m->idPuesto = $_POST["idPuestoEliminar"];
    $m->puestoEliminarAjax();
}







