<?php
    if(!$_SESSION["validar"] || $_SESSION['identificador'] != 168){
        header("location:ingreso");
        exit();
      }
      
      include_once('views/modules/estructura/head.php');
      include_once('views/modules/estructura/asideSwitch.php');
      include_once('views/modules/interfaz/interfazValores.php');
      include_once('views/modules/estructura/footer.php');
      include_once('views/modules/estructura/config.php');