<?php
if($_SESSION["identificador2"] == 1 || $_SESSION["identificador2"] == 2 )
    include_once('views/modules/estructura/aside1.php');
else if($_SESSION["identificador2"] == 3)
    include_once('views/modules/estructura/aside3.php');   
else if($_SESSION["identificador2"] == 4)
    include_once('views/modules/estructura/aside4.php');
else if($_SESSION["identificador2"] == 6)
    include_once('views/modules/estructura/aside6.php');
else if($_SESSION["identificador2"] == 10)
    include_once('views/modules/estructura/aside10.php');