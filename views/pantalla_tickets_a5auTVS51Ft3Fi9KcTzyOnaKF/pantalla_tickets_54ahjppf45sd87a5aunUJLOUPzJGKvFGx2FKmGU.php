<?php
require_once "../../models/config.php";
require_once "../../models/TicketsModel.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/AdminLTE.min.css"><!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/font-awesome/css/font-awesome.min.css">
        <style>

            body{
                background:#212121;
                background-image: url("../img/backTickets.jpg");
                /*background-position: center;*/ /* Center the image */
                /*background-repeat: no-repeat;*/ /* Do not repeat the image */
                background-size: cover; /* Resize the background image to cover the entire container */
            }
            .info-box-icon-custom {
                border-top-left-radius: 2px;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 2px;
                display: block;
                float: left;
                height: 240px;
                width: 245px;
                text-align: center;
                font-size: 100px;
                line-height: 250px;
                background: rgba(0,0,0,0.2);
                margin-right:10px;
            }

            .shadowBox{
                -webkit-box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);
                box-shadow: 0px 10px 15px -4px rgba(0,0,0,0.75);
            }

            .shadowBox2{
                -webkit-box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);
                -moz-box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);
                box-shadow: inset 2px -18px 18px 5px rgba(0,0,0,0.32);
            }

            .encabezado{
                margin:20px auto;
                background:rgba(51,134,255,.3);
                color:#fff;
                width:1000px;
                text-align:center;
                border:2px solid #fff;
                border-top-right-radius:20px;
                border-top-left-radius:20px;
            }

            h1{
                font-size:50px;
            }

            .total{
                float:right;
                width: 60px;
                height: 60px;
                border-radius: 4px;
                color: #fff;
                line-height: 60px;
                text-align: center;
                background:rgba(255,153,0,.6);
                border:2px solid #fff;
                font-size:40px;
                margin-left:5px;
                margin-right:5px;
                margin-bottom:15px;
            }

            .total2{
                background:rgba(27,141,15,.6);
            }

             .total3{
                background:rgba(208,56,23,.6);
            }

            .total4{
                background:rgba(0,192,239,.6);
            }

            .info-box-content-custom{
                display:block;
                border: 2px solid #000;
            }
           
        </style>
    </head>
    <body>
   
     <div class="encabezado shadowBox2"><h1>Sistema de Tickets Asesores Empresariales!</h1></div>

            <audio src="<?php echo Ruta::ruta_server(); ?>views/sonidos/lambada_.mp3" preload="auto" id="customTicketUriel"></audio>
            <audio src="<?php echo Ruta::ruta_server(); ?>views/sonidos/rebelde_.mp3" preload="auto" id="customTicketChava"></audio>
            <audio src="<?php echo Ruta::ruta_server(); ?>views/sonidos/cartel_.mp3" preload="auto" id="customTicketUlises"></audio>

              <div style="margin:20px auto;width:1280px;">

                    <div class="shadowBox">
                          <div class="titulo-color text-center shadowBox shadowBox2" style="font-size:45px;border-top-right-radius:30px;background:rgba(0,192,239,.5);color:#fff;">SOPORTE TÉCNICO</div>
                          <div class="info-box" style="border: 3px solid #fff; border-bottom: 3px solid #fff; height:250px; background:rgba(255,255,255,.4);">
                                <div class="info-box-icon-custom shadowBox2" style="float: left; width: 250px;background:rgba(0,192,239,.3);color:#fff;"><i class="fa fa-wrench"></i></div>
                                <div style="float:left; width: 500px;margin-top:10px;" id="grupoSoporteTecnico">
                                    <span class="info-box-text" style="font-size:35px;"><u>TICKETS GENERADOS: </u><b><span id="labelTotalTicketsTecnico" class="total shadowBox" style="margin-bottom:25px;">0</span> </b></span>
                                    <span class="info-box-text" style="margin-top:-20px;"><b style="font-size:30px;">Rogelio:</b> <span style="font-size:20px;">atiende el ticket</span> <b><span class="labelTicket" style="font-size:35px;" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Rogelio');?>">0</span></b> </span>
                                    <span class="info-box-text"><b style="font-size:30px;">Ulises:</b> <span style="font-size:20px;">atiende el ticket</span> <b><span class="labelTicket" style="font-size:35px;" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Ulises');?>">0</span></b> </span>
                                    <span class="info-box-text"><b style="font-size:30px;">Juan:</b> <span style="font-size:20px;">atiende el ticket</span> <b><span class="labelTicket" style="font-size:35px;" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Juan');?>">0</span></b> </span>
                                </div>
                                <div style="float: left; width: 450px;text-align:right;margin-top:10px;"> 
                                    <span style="font-size:25px;"><b>ATENDIDOS:</b></span> <b><span id="atendidosSoporte" class="total total2 shadowBox">0</span></b>
                                    <br><br><br>
                                    <span style="font-size:25px;"><b>PENDIENTES POR ATENDER:</b></span> <b><span id="pendientesSoporte" class="total total3 shadowBox">0</span></b>
                                    <br><br><br>
                                    <span style="font-size:25px;padding:"><b>PENDIENTES POR ABRIR:</b></span> <b><span id="pendientesAbrirSoporte" class="total total4 shadowBox"><?php echo TicketsModel::totalPorReabrir2(Tablas::tickets(),1); ?></span></b>
                                </div>
                                <br style="clear: left;">
                          </div>
                    </div>

                    <div class="shadowBox">
                          <div class="titulo-color text-center shadowBox2" style="font-size:45px;border-top-right-radius:30px;background:rgba(243,156,18,.5);color:#fff;">GIRO</div>
                          <div class="info-box shadowBox" style="border: 3px solid #fff; border-bottom: 3px solid #fff; height:250px; background:rgba(255,255,255,.4);">
                                <div class="info-box-icon-custom shadowBox2 shadowBox" style="float: left; width: 250px;background:rgba(243,156,18,.3);color:#fff;"><i class="fa fa-chrome"></i></div>
                                <div style="float:left; width: 500px;margin-top:10px;" id="grupoGiro">
                                    <span class="info-box-text" style="font-size:35px;"><u>TICKETS GENERADOS: </u><b><span id="labelTotalTicketsGiro" class="total shadowBox" style="margin-bottom:25px;">0</span> </b></span>
                                    <span class="info-box-text" style="margin-top:-20px;"><b style="font-size:30px;">Miguel:</b> <span style="font-size:20px;">atiende el ticket</span> <b><span class="labelTicket" style="font-size:35px;" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Miguel');?>">0</span></b> </span>
                                    <span class="info-box-text"><b style="font-size:30px;">Salvador:</b> <span style="font-size:20px;">atiende el ticket</span> <b><span class="labelTicket" style="font-size:35px;" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Salvador');?>">0</span></b> </span>
                                </div>
                                <div style="float: left; width: 450px;text-align:right;margin-top:10px;"> 
                                    <span style="font-size:25px;"><b>ATENDIDOS:</b></span> <b><span id="atendidosGiro" class="total total2 shadowBox">0</span></b>
                                    <br><br><br>
                                    <span style="font-size:25px;"><b>PENDIENTES POR ATENDER:</b></span> <b><span id="pendientesGiro" class="total total3 shadowBox">0</span></b>
                                    <br><br><br>
                                    <span style="font-size:25px;padding:"><b>PENDIENTES POR ABRIR:</b></span> <b><span id="pendientesAbrirGiro" class="total total4 shadowBox"><?php echo TicketsModel::totalPorReabrir2(Tablas::tickets(),2); ?></span></b>
                                </div>
                                <br style="clear: left;">
                          </div>
                    </div>

                      <div class="shadowBox">
                          <div class="titulo-color text-center shadowBox shadowBox2" style="font-size:45px;border-top-right-radius:30px;background:rgba(0,166,90,.5);color:#fff;">DESARROLLO DE SOFTWARE</div>
                          <div class="info-box" style="border: 3px solid #fff; border-bottom: 3px solid #fff; height:250px; background:rgba(255,255,255,.3);">
                              <div class="info-box-icon-custom shadowBox2" style="float: left; width: 250px;background:rgba(0,166,90,.4);color:#fff;"><i class="fa fa-file-code-o"></i></div>
                                <div style="float:left; width: 500px;margin-top:10px;" id="grupoDesarrollo">
                                    <span class="info-box-text" style="font-size:35px;"><u>TICKETS GENERADOS: </u><b><span id="labelTotalTicketsDesarrollo" class="total shadowBox" style="margin-bottom:25px;">0</span> </b></span>
                                    <span class="info-box-text" style="margin-top:-20px;"><b style="font-size:30px;">Uriel:</b> <span style="font-size:20px;">atiende el ticket</span> <b><span class="labelTicket" style="font-size:35px;" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Uriel');?>">0</span></b> </span>
                                </div>
                                <div style="float: left; width: 450px;text-align:right;margin-top:10px;"> 
                                    <span style="font-size:25px;"><b>ATENDIDOS:</b></span> <b><span id="atendidosDesarrollo" class="total total2 shadowBox">0</span></b>
                                    <br><br><br>
                                    <span style="font-size:25px;"><b>PENDIENTES POR ATENDER:</b></span> <b><span id="pendientesDesarrollo" class="total total3 shadowBox">0</span></b>
                                    <br><br><br>
                                    <span style="font-size:25px;padding:"><b>PENDIENTES POR ABRIR:</b></span> <b><span id="pendientesAbrirDesarrollo" class="total total4 shadowBox"><?php echo TicketsModel::totalPorReabrir2(Tablas::tickets(),3); ?></span></b>
                                </div>
                                <br style="clear: left;">
                          </div>
                      </div>
              </div>
      

        <script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.min.js"></script><!-- jQuery 3 -->
        <script src="<?php echo Ruta::ruta_server(); ?>views/js/bootstrap.min.js"></script><!-- Bootstrap 3.3.7 -->
        <script src="<?php echo Ruta::ruta_server(); ?>views/js/socket.io.js"></script>
	    <script src="<?php echo Ruta::ruta_server(); ?>views/js/sockets-configuraciones.js"></script>
        <script>
            let ruta_server = window.location.protocol + '//' + window.location.host + '/asesores/';
            class Tickets{

                static actualizarQuienAtiendeSoporteTecnico(respuesta,grupo){
                    console.log(respuesta);
                    grupo.find(".labelTicket").eq(0).text(respuesta.ultimos3[0].numero);
                    grupo.find(".labelTicket").eq(1).text(respuesta.ultimos3[1].numero);
                    grupo.find(".labelTicket").eq(2).text(respuesta.ultimos3[2].numero);
                    $('#atendidosSoporte').text(respuesta.atendidos);
                    $('#pendientesSoporte').text(parseInt(respuesta.actual - respuesta.atendidos));
                }

                static actualizarQuienAtiendeGiro(respuesta,grupo){
                    console.log(respuesta);
                    grupo.find(".labelTicket").eq(0).text(respuesta.ultimos2[0].numero);
                    grupo.find(".labelTicket").eq(1).text(respuesta.ultimos2[1].numero);
                    $('#atendidosGiro').text(respuesta.atendidos);
                    $('#pendientesGiro').text(parseInt(respuesta.actual - respuesta.atendidos));
                }

                static actualizarQuienAtiendeDesarrollo(respuesta,grupo){
                    console.log('atiende desarrollo');
                    grupo.find(".labelTicket").eq(0).text(respuesta.ultimos1[0].numero);
                    $('#atendidosDesarrollo').text(respuesta.atendidos);
                    $('#pendientesDesarrollo').text(parseInt(respuesta.actual - respuesta.atendidos));
                }

                static actualizarListaAbiertos(){
                    $.ajax({
                        type: "POST",
                        url: ruta_server + "controllers/Tickets.php",
                        dataType: "json",
                        data: { totalReabiertosPantalla : true
                        }
                    }).done(function(respuesta) {
                        $('#pendientesAbrirSoporte').text(respuesta.soporte);
                        $('#pendientesAbrirGiro').text(respuesta.giro);
                        $('#pendientesAbrirDesarrollo').text(respuesta.desarrollo);
                    }).fail(function(error) {
                        console.log(error);
                    });         
                }

                static inicarClase(){

                    let grupoSoporte = $('#grupoSoporteTecnico');
                    let grupoGiro = $('#grupoGiro');
                    let grupoDesarrollo = $('#grupoDesarrollo');
                
                    socket.on('ticketsGenerados', function(respuesta){
                        if(respuesta.categoria == 1){
                            let media = $('#customTicketUlises')[0];
                            const playPromise = media.play(); 
                            if (playPromise !== null){ 
                                playPromise.catch(() => { 
                                    media.play(); 
                                });
                            } 
                            $('#labelTotalTicketsTecnico').text(respuesta.ticket);
                            $('#pendientesSoporte').text(parseInt(respuesta.actual - respuesta.atendidos));
                        }
                        else if(respuesta.categoria == 2){
                            let media = $('#customTicketChava')[0];
                            const playPromise = media.play(); 
                            if (playPromise !== null){ 
                                playPromise.catch(() => { 
                                    media.play(); 
                                });
                            } 
                            $('#labelTotalTicketsGiro').text(respuesta.ticket);
                            $('#pendientesGiro').text(parseInt(respuesta.actual - respuesta.atendidos));
                        }
                        else if(respuesta.categoria == 3){
                            let media = $('#customTicketUriel')[0];
                            const playPromise = media.play(); 
                            if (playPromise !== null){ 
                                playPromise.catch(() => { 
                                    media.play(); 
                                });
                            } 
                            $('#labelTotalTicketsDesarrollo').text(respuesta.ticket);
                            $('#pendientesDesarrollo').text(parseInt(respuesta.actual - respuesta.atendidos));
                        } 
                    });
                
                    socket.on('actualizarMarcadoresSoporteTecnico', function(respuesta){
                        $('#labelTotalTicketsTecnico').text(respuesta.actual);
                        $('#atendidosSoporte').text(respuesta.atendidos);
                        $('#pendientesSoporte').text(parseInt(respuesta.actual - respuesta.atendidos))
                        Tickets.actualizarQuienAtiendeSoporteTecnico(respuesta,grupoSoporte);
                    });
                    socket.on('actualizarMarcadoresGiro', function(respuesta){
                        $('#labelTotalTicketsGiro').text(respuesta.actual);
                        $('#atendidosGiro').text(respuesta.atendidos);
                        $('#pendientesGiro').text(parseInt(respuesta.actual - respuesta.atendidos))
                        Tickets.actualizarQuienAtiendeGiro(respuesta,grupoGiro);
                    });
                    socket.on('actualizarMarcadoresDesarrollo', function(respuesta){
                        $('#labelTotalTicketsDesarrollo').text(respuesta.actual);
                        $('#atendidosDesarrollo').text(respuesta.atendidos);
                        $('#pendientesDesarrollo').text(parseInt(respuesta.actual - respuesta.atendidos));
                        Tickets.actualizarQuienAtiendeDesarrollo(respuesta,grupoDesarrollo);
                    });

                    //INDICA CUAL ES EL ÚLTIMO TICKET QUE ATIENDE CADA QUIEN EN SOPORTE TÉCNICO
                    socket.on('ultimos3', function(respuesta){
                        Tickets.actualizarQuienAtiendeSoporteTecnico(respuesta,grupoSoporte);
                    });

                    socket.on('ultimos2', function(respuesta){
                        Tickets.actualizarQuienAtiendeGiro(respuesta,grupoGiro);
                    });

                    socket.on('ultimos1', function(respuesta){
                        Tickets.actualizarQuienAtiendeDesarrollo(respuesta,grupoDesarrollo);
                    });

                     socket.on('reabrirTicket',function(){
                        console.log('respuesta');
                        Tickets.actualizarListaAbiertos();
                    });
                }
            }

            Tickets.inicarClase();
        </script>
    </body>
</html>