<?php 
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}
require_once "../../../models/config.php";
require_once "../../../controllers/Chat.php";
require_once "../../../models/ChatModel.php";

$usuarios = new Chat();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chat Asesores Empresariales!</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="Shortcut Icon" href="<?php echo Ruta::ruta_server(); ?>views/img/asesores.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/AdminLTE.min.css"><!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/sweetalert2.min.css">
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/css/chat.css?3">
        <link rel="stylesheet" href="<?php echo Ruta::ruta_server(); ?>views/js/visor-crow/visor.min.css">
    </head> 
    <body class="hold-transition skin-blue sidebar-mini">

    <div class="box direct-chat direct-chat-primary direct-chat-contacts-open tamanoChat" id="blackBox">
        <div class="box-header with-border"> 
                <div class="conversandoCon">
                    <div id="options">
                        <h3 class="box-title" id="estadoIcono"><i class="fa fa-user text-green" style="font-size:5px;"></i></h3>
                        <select id="estadoChat" style="margin-right:10px;">
                             <option value="1">Activo</option>
                            <option value="2">Ausente</option>
                        </select>
                        <div class="box-tools pull-right">
                            <span style="margin-right:10px;font-size:14px;"><i class="fa fa-address-book-o fa-2x" title="Total de contactos"></i><?php echo Chat::totalUsuarios();?></span>
                            <span style="margin-right:10px;font-size:14px;"><i class="fa fa-user fa-2x text-green" title="Conectados"></i> <span id="totalChatConectados">0</span></span>
                            <span style="margin-right:10px;font-size:14px;">
                                <i class="iconoMarcador fa fa-envelope fa-2x" style="color:#ffb52f;" title="Mensajes">
                                    <span id="totalMensajesSinLeer">   
                                        <?php if($total = intval(Chat::totalMensajes())): ?> 
                                            <span class="globoMarcador label label-warning">
                                                <?php echo $total; ?>
                                            </span>
                                        <?php endif; ?>
                                    </span> 
                                </i> 
                            </span>
                            <button class="btn btn-box-tool ocultarUsuariosSlide" data-toggle="tooltip" title="Mostrar u ocultar contactos" data-widget="chat-pane-toggle"><i class="fa fa-address-book-o text-black fa-2x"></i></button>
                        </div>  

                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-12">
                                <!--<div style="margin-top:5px;color:gray;">
                                    <b>Conversando actualmente con:</b>
                                </div>-->

                                <img id="imagenSeleccionadoChat" class="direct-chat-img" src="<?php echo Ruta::ruta_server();?>views/img/user2.png" alt="User Image">
                                <p style="margin-left:50px;">
                                    <b><span id="nombreSeleccionadoChat" style="padding-top:8px;">SELECCIONA A UN USUARIO</span></b> 
                                    <span id="iconoSeleccionadoChat" class="">
                                        <i class="fa fa-user fa-2x text-gray" aria-hidden="true"></i>
                                    </span>
                                    <br>
                                    <span id="sucursalSeleccionadoChat"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center" style="cursor:pointer;" id="menuChat"><i class="fa fa-bars" aria-hidden="true"></i></div>

                </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="idUsuarioChat" value="<?php echo $_SESSION['identificador']; ?>" src="<?php echo Ruta::ruta_server();?>views/imagenes-usuarios/mini/<?php echo $_SESSION["imagen"]; ?>" list="<?php echo Chat::nombrePila();?>">
           
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" id="direct-chat-messages">
              
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" style="position:sticky;top:0px;background:#222d32;margin-bottom:-10px;">
                            <li class="active"><a href="#fa-icons" data-toggle="tab">Chats</a></li>
                            <li><a href="#glyphicons" data-toggle="tab">Contactos</a></li>
                        </ul>
                        <div class="tab-content">
                       
                            <div class="tab-pane active" id="fa-icons">
                                <div  style="height:30px;position:sticky;top:45px;background:#222d32"></div>
                                <div id="dataChat2">
                                        <?php echo $usuarios->grupos();?>   
                                </div> 
                            </div>
                            
                            <div class="tab-pane" id="glyphicons">
                                <div class="buscadorChat">
                                    <div class="row" style="margin-top:-8px;margin-bottom:10px;">
                                        <div class="col-xs-9"></div>
                                        <div class="col-xs-3">
                                            <div id="menuOpciones" style="display:flex;align-items:center;justify-content:flex-end;cursor:pointer;">
                                                <span style="margin-right:3px;"> Opciones </span> 
                                                <i class="fa fa-chevron-circle-down fa-2x" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="listaOpciones" style="display:none;margin-bottom:25px;">
                                        <div class="row" style="margin-top:-10px;">
                                            <div class="col-xs-6" style="display:flex;align-items:center;">
                                                <i id="crearGrupo" class="fa fa-plus-circle fa-3x" style="cursor:pointer;color:#037e8c;margin-right:10px;"></i> <span> Crear nuevo grupo</span>
                                            </div>
                                            <div class="col-xs-6">
                                                <i id="guardarGrupo" class="fa fa-check-square fa-3x icon-hide" style="cursor:pointer;color:#00a65a;display:none;margin-right:20px;"></i>
                                                <i id="cancelarGrupo" class="fa fa-ban fa-3x icon-hide" style="cursor:pointer;color:#ff2301;display:none;"></i>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" name="buscadorChat" id="buscadorChat" placeholder="Nombre de usuario..." autocomplete="off" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary btn-flat" style="cursor:text;"><i class="fa fa-search"></i> Buscar</button>
                                        </span>
                                    </div>
                                </div>
                                <div id="dataChat">
                                        <?php echo $usuarios->usuarios();?>   
                                </div> 
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.direct-chat-pane -->


                <!--Ventana modal-->
            <div class="modal fade bd-example-modal-lg fade" id="opcionesGrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><b>OPCIONES PARA GESTIONAR EL GRUPO</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin-top:-10px;">
                                <div class="col-xs-3" >
                                    <a class="btn btn-app" id="actualizarImagenGrupo">
                                        <i class="fa fa-picture-o"></i> Imagen
                                    </a>         
                                </div>
                                <div class="col-xs-9" style="min-height:70px;display:flex;align-items:center;justify-content:flex-start">
                                    <p>Actualiza la imagen del grupo (Administrador)</p>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3" >
                                    <a class="btn btn-app" id="integrantesGrupo">
                                        <i class="fa fa-users"></i> Integrantes
                                    </a>         
                                </div>
                                <div class="col-xs-9" style="min-height:70px;display:flex;align-items:center;justify-content:flex-start">
                                    <p>Ver la lista de integrantes del grupo</p>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3" >
                                    <a class="btn btn-app" id="eliminarGrupo">
                                        <i class="fa fa-trash-o"></i> Eliminar
                                    </a>         
                                </div>
                                <div class="col-xs-9" style="min-height:70px;display:flex;align-items:center;justify-content:flex-start">
                                    <p>Salir del grupo / Eliminar el grupo (Administrador)</p>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Ventana modal-->
                <!--Ventana modal-->
                <div class="modal fade bd-example-modal-lg fade" id="usuariosGrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><b>Integrantes del grupo</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--Ventana modal-->



        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="input-group">
                <input type="text" name="message" id="inputChat" placeholder="Escribir mensaje ..." class="form-control" autocomplete="off">
                <span class="input-group-btn">
                    <button type="button" id="enviarChat" class="btn btn-primary btn-flat">Enviar</button>
                </span>
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!--/.direct-chat -->

    <script src="<?php echo Ruta::ruta_server(); ?>views/js/jquery.min.js"></script><!-- jQuery 3 -->
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/bootstrap.min.js"></script><!-- Bootstrap 3.3.7 -->
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/adminlte.min.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/sweetalert2.min.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/configuraciones.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/visor-crow/visor.min.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/socket.io.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/sockets-configuraciones.js"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/metodosDiversos.min.js?1"></script>
    <script src="<?php echo Ruta::ruta_server(); ?>views/js/chat2.js?90"></script>
    <!--<script src="<?php echo Ruta::ruta_server(); ?>views/js/push.min.js"></script>-->

    </body>
</html>



