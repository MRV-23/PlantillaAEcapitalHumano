<?php
     // session_start();
      if( !$_SESSION["validar"] || $_SESSION["identificador2"] < Configuraciones::recepcion() || $_SESSION["identificador2"] == Configuraciones::especial() ){
          if( !AccesoRHespecial::pertenece($_SESSION['identificador'],true)){
            header("location:".Ruta::ruta_server()."ingreso");
            exit();
          }  
      }

      include_once('views/modules/estructura/head.php');
      include_once('views/modules/estructura/asideSwitch.php');
      include_once('views/modules/interfaz/interfazSolicitudes.php');
      include_once('views/modules/estructura/footer.php');
      include_once('views/modules/estructura/config.php');