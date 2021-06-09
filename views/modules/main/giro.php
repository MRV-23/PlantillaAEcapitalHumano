<?php
      //session_start();
      if(!$_SESSION["validar"] || (!AccesoSoporte::perteneceAsoporte($_SESSION['identificador']) /*AND $_SESSION['identificador'] != 372*/)){
        header("location:ingreso");
        exit();
      }
      include_once('views/modules/estructura/head.php');
      include_once('views/modules/estructura/asideSwitch.php');
      include_once('views/modules/interfaz/interfazGiro.php');
      include_once('views/modules/estructura/footer.php');
      include_once('views/modules/estructura/config.php');