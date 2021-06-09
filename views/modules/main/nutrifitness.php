<?php
    //  session_start();
    if(!$_SESSION["validar"] || Configuraciones::especial() == $_SESSION['identificador2'] || !AccesoNutrifitness::pertenecePrograma($_SESSION['identificador'])){
        header("location:ingreso");
        exit();
      }
      
      include_once('views/modules/estructura/head.php');
      include_once('views/modules/estructura/asideSwitch.php');
      include_once('views/modules/interfaz/interfazActivate.php');
      include_once('views/modules/estructura/footer.php');
      include_once('views/modules/estructura/config.php');