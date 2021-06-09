<?php
session_start();
// Tipo de contenido
header('Content-type: image/png');


// Crear la imagen usando la imagen base
$image = imagecreatefrompng('firmaAsesores.png');

// Asignar el color para el texto
$color = imagecolorallocate($image,0, 0, 98);
$color2 = imagecolorallocate($image,0, 0, 0);

// Asignar la ruta de la fuente
$font_path = 'fonts/arial.ttf';
$font_path2 = 'fonts/arial-black.ttf';
//$font_path = [dirname(__FILE__).'/fonts/Acme-Regular.ttf', dirname(__FILE__).'/fonts/Merriweather-Bold.ttf', dirname(__FILE__).'/fonts/Merriweather-Italic.ttf',  dirname(__FILE__).'/fonts/Merriweather-Light.ttf',  dirname(__FILE__).'/fonts/Ubuntu-Bold.ttf'];
$text = $_GET['u']; // Texto 1
$text2 = $_GET['p']; // Texto 2

/// imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
imagettftext($image, 8.5, 0, 200, 60, $color, $font_path2, $text); // Colocar el texto 1 en la imagen
imagettftext($image, 8.5, 0, 200, 78, $color2, $font_path, $text2); // Colocar el texto 2
imagettftext($image, 8.5, 0, 200, 96, $color, $font_path, "www.asesoresempresariales.com.mx"); 

imagepng($image); // Enviar el contenido al navegador

imagedestroy($image); // Limpiar la memoria