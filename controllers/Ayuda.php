<?php
class Ayuda{

    public static function primeraSeccion($categoria,$comentarios){
        $resp =  AyudaModel::primeraSeccion($categoria,$comentarios,'ayuda_ae');
        if(!$resp['error'])
            self::enviarCorreo2($categoria,$comentarios);
        return $resp;
    }

    public static function otraSeccion($respuestas,$comentarios){
        $resp = AyudaModel::otraSeccion($respuestas,$comentarios,'ayuda_ae');
        if(!$resp['error'])
            self::enviarCorreo($comentarios,$respuestas);
        return $resp;
    }

    private static function enviarCorreo2($categoria,$comentarios){
        $data = AyudaModel::datos(Tablas::usuarios(),Tablas::sucursales());

        if($categoria == 1){
            $cat = 'DENUNCIA CONFIDENCIAL';
            $usuario="ANÓNIMO";
        }
        else if($categoria == 2){
            $cat = 'CRISIS DE ESTRES <br> <u>TODAS LAS RESPUESTAS DE LA PRIMERA SECCIÓN FUERON NO</u>';
            $usuario=$data['nombre'];
        }
            
        else{
            $cat = 'PROPUESTA DE MEJORA O CAPACITACIÓN';
            $usuario=$data['nombre'];
        }
            

        $para = 'lineadeayuda10@gmail.com';
		$titulo = 'Sistema de Intranet Asesores Empresariales';
		$mensajeFinal ='
					<html>
						<head>
							<title>Línea de ayuda del sistema de Intranet de Asesores Empresariales!</title>
						</head>
						<body>
							<p style="font-size:18px;">Te informamos que hay un nuevo registro en el módulo de <b>Línea de ayuda</b> del sistema de Intranet de Asesores Empresariales!</p> 
							<br>
							<br>
                            <p>El usuario: <span style="font-size:20px;"><b>'.$usuario.'</b></span> de la sucursal '.$data['sucursal'].'<p/>
                            <hr>
							<p>Categoria: <b>'.$cat.'</b></p>
							<p>Comentarios: <b>'.$comentarios.'</b></p>
							<hr>
							<h3><a href="http://www.intranet.asesoresempresariales.com.mx" target="blank">Asesores Empresariales</a></h3>
							<br>
							<img src="http://www.intranet.asesoresempresariales.com.mx/images/asesores.jpg">
						</body>
					</html>';
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$cabeceras .= 'From: <desarrollo@asesoresempresariales.com.mx>' . "\r\n";
		$cabeceras .= 'CC: <arodriguez@asesoresempresariales.com.mx>' . "\r\n";  

		return mail($para, $titulo, $mensajeFinal, $cabeceras);


    }

    private static function enviarCorreo($comentarios,$respuestas){

        $data = AyudaModel::datos(Tablas::usuarios(),Tablas::sucursales());

        $seccion1=0;
        $seccion2=0;
        $seccion3=0;
        $seccion4=0;
        $diagnostico='';

        for($i=0;$i<6;$i++){
            if($respuestas[$i] == 1)
                $seccion1++;
        }

        for($i=6;$i<8;$i++){
            if($respuestas[$i] == 1)
                $seccion2++;
        }

        for($i=8;$i<15;$i++){
            if($respuestas[$i] == 1)
                $seccion3++;
        }

        for($i=15;$i<20;$i++){
            if($respuestas[$i] == 1)
                $seccion4++;
        }
        
        if($seccion2)
            $diagnostico = '<b>La persona requiere atención clínica</b>';
        if($seccion3 > 2)
            $diagnostico = '<b>La persona requiere atención clínica</b>';
        if($seccion4 > 1)
            $diagnostico = '<b>La persona requiere atención clínica</b>';

        for($i=0;$i<20;$i++){
            $respuesta[$i] = $respuestas[$i] == 1 ? 'SÍ' : 'NO';
        }
        
        $para = 'lineadeayuda10@gmail.com';
		$titulo = 'Sistema de Intranet Asesores Empresariales';
		$mensajeFinal ='
					<html>
						<head>
							<title>Línea de ayuda del sistema de Intranet de Asesores Empresariales!</title>
						</head>
						<body>
							<p style="font-size:18px;">Te informamos que hay un nuevo registro en el módulo de <b>Línea de ayuda</b> del sistema de Intranet de Asesores Empresariales!</p> 
							<br>
							<br>
                            <p>El usuario: <span style="font-size:20px;"><b>'.$data['nombre'].'</b></span> de la sucursal '.$data['sucursal'].'<p/>
                            <hr>
							<p>Primer sección (total de respuestas sí): <b>'.$seccion1.'</b></p>
							<p>Segunda sección (total de respuestas sí): <b>'.$seccion2.'</b></p>
							<p>Tercera sección (total de respuestas sí): <b>'.$seccion3.'</b></p>
							<p>Cuarta sección (total de respuestas sí): <b>'.$seccion4.'</b></p>
                            <br>
                            <p style="font-size:18px;">'.$diagnostico.'</p>
                            <hr>
                            <br>
                            <p><b>Primer sección</b></p>
                            <p>I.- Acontecimiento traumático severo<br>
                                ¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
                                <ol>
                                    <li>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[0].'</b></span>
                                    <li>Asaltos?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[1].'</b></span>
                                    <li>Actos violentos que derivaron en lesiones graves?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[2].'</b></span>
                                    <li>Secuestro?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[3].'</b></span>
                                    <li>Amenazas?, o</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[4].'</b></span>
                                    <li>Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[5].'</b></span>
                                </ol>
                            </p>

                            <br>
                            <p><b>Segunda sección</b></p>
                            <p>II.- Recuerdos persistentes sobre el acontecimiento (durante el último mes)
                                <ol>
                                    <li>¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[6].'</b></span>
                                    <li>¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[7].'</b></span>
                                </ol>
                            </p>

                            <br>
                            <p><b>Tercera sección</b></p>
                            <p>III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes)
                                <ol>
                                    <li>¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[8].'</b></span>
                                    <li>¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[9].'</b></span>
                                    <li>¿Ha tenido dificultad para recordar alguna parte importante del evento?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[10].'</b></span>
                                    <li>¿Ha disminuido su interés en sus actividades cotidianas?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[11].'</b></span>
                                    <li>¿Se ha sentido usted alejado o distante de los demás?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[12].'</b></span>
                                    <li>¿Ha notado que tiene dificultad para expresar sus sentimientos?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[13].'</b></span>
                                    <li>¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[14].'</b></span>
                                </ol>
                            </p>

                            <br>
                            <p><b>Cuarta sección</b></p>
                            <p>IV.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes)
                                <ol>
                                    <li>¿Ha tenido usted dificultades para dormir?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[15].'</b></span>
                                    <li>¿Ha estado particularmente irritable o le han dado arranques de coraje?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[16].'</b></span>
                                    <li>¿Ha tenido dificultad para concentrarse?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[17].'</b></span>
                                    <li>¿Ha estado nervioso o constantemente en alerta?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[18].'</b></span>
                                    <li>¿Se ha sobresaltado fácilmente por cualquier cosa?</li>
                                    <span style="margin-left:15px;"><b>'.$respuesta[19].'</b></span>
                                </ol>
                            </p>

                            <p>Comentarios: <b>'.$comentarios.'</b></p>


							<h3><a href="http://www.intranet.asesoresempresariales.com.mx" target="blank">Asesores Empresariales</a></h3>
							<br>
							<img src="http://www.intranet.asesoresempresariales.com.mx/images/asesores.jpg">
						</body>
					</html>';
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$cabeceras .= 'From: <desarrollo@asesoresempresariales.com.mx>' . "\r\n";
		$cabeceras .= 'CC: <arodriguez@asesoresempresariales.com.mx>' . "\r\n"; 

		return mail($para, $titulo, $mensajeFinal, $cabeceras);
    }

    
}