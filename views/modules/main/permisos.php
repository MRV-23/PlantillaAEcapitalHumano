<?php
    if(!$_SESSION["validar"]){
        header("location:ingreso");
        exit();
      }
      
      include_once('views/modules/estructura/head.php');
      include_once('views/modules/estructura/asideSwitch.php');
      include_once('views/modules/interfaz/interfazPermisos.php');
      include_once('views/modules/estructura/footer.php');
      include_once('views/modules/estructura/config.php');