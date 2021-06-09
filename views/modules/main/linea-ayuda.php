<?php
    if(!$_SESSION["validar"] || ($_SESSION['identificador'] != 168 AND $_SESSION['identificador'] != 172 AND $_SESSION['identificador'] != 215 AND $_SESSION['identificador'] != 187) ){
        header("location:ingreso");
        exit();
      }
      
      include_once('views/modules/estructura/head.php');
      include_once('views/modules/estructura/asideSwitch.php');
      include_once('views/modules/interfaz/interfazAyuda.php');
      include_once('views/modules/estructura/footer.php');
      include_once('views/modules/estructura/config.php');