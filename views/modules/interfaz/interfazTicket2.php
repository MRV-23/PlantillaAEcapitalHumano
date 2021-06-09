
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="controlTickets" data="<?php echo AccesoSoporte::usuarios($_SESSION['identificador'])?>">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">SISTEMA DE TICKETS</h3>
                <span style="margin-left:20px;"><b>Status:</b> <img src="views/img/switchoff.png" height="40" width="80" alt="status del sistema" id="statusSistemaOff"> <img src="views/img/switchon.png" height="40" width="80" alt="status del sistema" id="statusSistemaOn" style="display:none;"></span>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 id="contadorPorAtender">0<?php //echo Tickets::totalTickets(0);?></h3>
                                <p>Por atender</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <a href="#" class="small-box-footer" id="botonModalPorAtender">Mostrar más <i class="fa fa fa-plus"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3 id="contadorAtendiendose">0<?php //echo Tickets::totalTickets(1);?></h3>

                        <p>Atendiendose</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <a href="#" class="small-box-footer" id="botonModalAtendiendose">Mostrar más <i class="fa fa fa-plus"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                        <h3 id="contadorPorAbrir">0<?php //echo Tickets::totalPorReabrir_();?></h3>

                        <p>Por abrir</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-retweet"></i>
                        </div>
                        <a href="#" class="small-box-footer" id="botonModalPorAbrir">Mostrar más <i class="fa fa fa-plus"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3 id="contadorFinalizados">0<?php //echo Tickets::totalTickets(2) + Tickets::totalAbiertos();?></h3>

                        <p>Finalizados</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-check-circle-o"></i>
                        </div>
                        <a href="#" class="small-box-footer" id="botonModalFinalizados">Mostrar más <i class="fa fa fa-plus"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                </div>                                 
            </div>
        </div>


        <div class="box-body">
                    <div role="tabpanel"> 
                            <ul class="nav nav-tabs color-tickets-tabs">
                                    <li role="presentation" class="active">
                                        <a href="#cola" aria-controls="cola" role="tab" data-toggle="tab">Tickets por atender</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#atendidos" aria-controls="atendidos" role="tab" data-toggle="tab">Tickets siendo atendidos</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#finalizados" aria-controls="finalizados" role="tab" data-toggle="tab">Tickets finalizados</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#historial" aria-controls="historial" role="tab" data-toggle="tab">historial de tickets</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#generar" aria-controls="generar" role="tab" data-toggle="tab">Generar ticket</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#configurar" aria-controls="configurar" role="tab" data-toggle="tab">Opciones</a>
                                    </li>

                            </ul>
                            <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active contenedor-div" style="background:#fff;padding-top:2%;" id="cola"> 
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <button type="button" class="btn btn-primary btn-lg" style="margin:10px 0;display:flex;align-items:center;" id="botonTomarTicketOrden"> <i class="fa fa-ticket fa-2x" style="margin-right:5px;"></i> Tomar ticket</button>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="callout" style="color:#fff;background:#454545;border-left: 5px solid #000">
                                                    <h4 style="margin-top:-6px;">Más de un día</h4>
                                                    <p style="margin-top:-6px;margin-bottom:-6px;">Tickets que llevan más de 1 día en espera por ser atendidos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row renglon-encabezado mostrar768">
                                            <div class="col-sm-1 columna-div columna-div-centrar">Ticket</div>
                                            <div class="col-sm-4 columna-div columna-div-centrar">Nombre</div>
                                            <div class="col-sm-4 columna-div columna-div-centrar">Asunto</div>
                                            <div class="col-sm-1 columna-div columna-div-centrar">Área</div>
                                            <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
                                        </div>

                                        <div id="mostrarDatosTickets0">
                                            <?php
                                                //echo Tickets::mostrarColaTickets_(0);
                                            ?>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane contenedor-div" style="background:#fff;padding-top:2%;" id="atendidos"> 
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="callout" style="color:#fff;background:#454545;border-left: 5px solid #000">
                                                    <h4 style="margin-top:-6px;">Más de un día</h4>
                                                    <p style="margin-top:-6px;margin-bottom:-6px;">Tickets que llevan más de un día en espera por ser cerrados</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="callout" style="color:#fff;background:#dd4b39;border-left: 5px solid #D11F03">
                                                    <h4 style="margin-top:-6px;">Abiertos</h4>
                                                    <p style="margin-top:-6px;margin-bottom:-6px;">Tickets que fueron abiertos y se estan atendiendo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row renglon-encabezado mostrar768">
                                            <div class="col-sm-1 columna-div columna-div-centrar">Ticket</div>
                                            <div class="col-sm-4 columna-div columna-div-centrar">Nombre</div>
                                            <div class="col-sm-4 columna-div columna-div-centrar">Asunto</div>
                                            <div class="col-sm-1 columna-div columna-div-centrar">Área</div>
                                            <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
                                        </div>

                                        <div id="mostrarDatosTickets1">
                                            <?php
                                                //echo Tickets::mostrarColaTickets_(1);
                                            ?>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane contenedor-div" style="background:#fff;padding-top:2%;" id="finalizados"> 
                                        <div class="row renglon-encabezado mostrar768">
                                            <div class="col-sm-1 columna-div columna-div-centrar">Ticket</div>
                                            <div class="col-sm-4 columna-div columna-div-centrar">Nombre</div>
                                            <div class="col-sm-4 columna-div columna-div-centrar">Asunto</div>
                                            <div class="col-sm-1 columna-div columna-div-centrar">Área</div>
                                            <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
                                        </div>

                                        <div id="mostrarDatosTickets2">
                                            <?php
                                                //echo Tickets::mostrarColaTickets_(2);
                                            ?>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane contenedor-div" style="background:#fff;padding-top:2%;" id="historial"> 
                                            <?php 
                                                $paginacion = new Paginacion(30);
                                                $totalRegistros = Tickets::totalHistorialTickets_();
                                                $paginacion->totalPaginas($totalRegistros);
                                                $paginacion->target('ticketsHistorial');
                                                $paginacion->parametroNombre('');
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span>Total de tickets: <b id="totalRegistros" style="font-size:24px;"><?php echo $totalRegistros; ?></b></span>
                                                    <input style="margin-top:20px;" class="form-control" type="text" placeholder="Buscar..." id="buscador">
                                                </div>
                                            </div> 
                                            
                                            <span class="paginador"><?php  echo $paginacion->mostrar();?></span>

                                            <div class="row renglon-encabezado mostrar768">
                                                <div class="col-sm-1 columna-div columna-div-centrar">Ticket</div>
                                                <div class="col-sm-3 columna-div columna-div-centrar">Nombre</div>
                                                <div class="col-sm-3 columna-div columna-div-centrar">Asunto</div>
                                                <div class="col-sm-2 columna-div columna-div-centrar">Fecha</div>
                                                <div class="col-sm-1 columna-div columna-div-centrar">Área</div>
                                                <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
                                            </div>

                                            <div id="mostrarHistorialTickets">
                                                <?php 
                                                    echo Tickets::historialTickets_('',$paginacion->limitRegistros());
                                                ?>
                                            </div>

                                            <span class="paginador"><?php  echo $paginacion->mostrar();?></span>
                                    </div>

                                    <div role="tabpanel" class="tab-pane contenedor-div" style="background:#fff;padding-top:2%;" id="generar"> 
                                            <form method="POST" style="margin-top: 2%;"  id="formularioTickets" enctype="multipart/form-data" class="max800">
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>1.-Sucursal</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <select class="form-control textoMay" name="sucursal" required>
                                                            <option value=""></option>
                                                            <?php
                                                                $sucursales= new gestionSucursales();
                                                                $sucursales -> vistaSucursalesController();
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>2.-Usuario</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <select class="form-control textoMay" name="usuario" required>
                                                            <option value=""></option>
                                                        </select> 
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>3.-Área</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <select class="form-control textoMay" name="area" required>
                                                            <option value=""></option>
                                                            <option value="1">Soporte técnico</option>
                                                            <option value="2">Giro</option>
                                                            <option value="3">Desarrollo de sofware (Intranet)</option> 
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>4.-Categoria</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <select class="form-control textoMay" name="categoria" required>
                                                            <option value="6"> Otra</option>
                                                            <option value="5">Módulo archivo electrónico</option>
                                                            <option value="3">Módulo pre alta</option>
                                                            <option value="4">Módulo recibos cfdi</option>
                                                            <option value="1">Nóminas</option>
                                                            <option value="2">Procesos imss</option></select>
                                                        </select> 
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>5.-Subcategoria</label> 
                                                        <i class="fa fa-check-circle" style="font-size:20px;visibility: hidden;"></i>
                                                        <select class="form-control textoMay" name="subcategoria" disabled>
                                                            <option value=""></option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label for="">6.-Asunto:</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <input class="form-control" type="text" name="asunto" minlength="10" placeholder="...Escribe brevemente de que trata el problema"required>
                                                    </div>
                                                </div>                             
                                                <div class="row" style="margin-top:10px;">
                                                    <div class="col-md-12" >
                                                        <label for="">7.-Descripción:</label>  <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <textarea name="descripcion" class="form-control" rows="6" style="resize:vertical;" minlength="20" placeholder="...Te pedimos que seas lo más específico posible, detallando exactamente cual es tu problema; y en caso de que aplique nos indiques cual es la solución o resultado que esperas obtener." required></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p><i class="fa fa-check-circle fa-2x"></i> Obligatorio</p>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                                                    <button type="reset" class="btn btn-danger" id="cancelarTickets"><i class="fa fa-times"></i> Cancelar</button>  
                                                </div>
                                            </form>
                                    </div>

                                    <div role="tabpanel" class="tab-pane contenedor-div" style="background:#fff;padding-top:2%;" id="configurar"> 

                                            <div class="box" style="border-top-color:#315980">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> <i class="fa fa-download fa-3x" style="color:#315980"></i> Descargar Reportes</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                        <i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <form method="post">  
                                                        <div class="max1000">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="">Descarga la relación de tickets:</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label for="">1.Área:</label>
                                                                            <i class="fa fa-check-circle text-green"></i>
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-list-ol"></i>
                                                                                </div>
                                                                                <select class="form-control textoMay" name="area2">
                                                                                    <option value="0" class="textoMay">Todas</option>
                                                                                    <option value="1" class="textoMay">Soporte técnico</option>
                                                                                    <option value="2" class="textoMay">GIRO</option>
                                                                                    <option value="3" class="textoMay">Desarrollo de software</option>
                                                                                </select>
                                                                            </div>      
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="">1.-Fecha de inicio:</label>
                                                                            <i class="fa fa-check-circle text-green"></i>
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                                </div>
                                                                                <input class="form-control iluminarIconoInput" type="date" value="<?php echo date("Y-m-d");?>" name="fechaInicio" required>
                                                                            </div>      
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="">2.-Fecha de fin:</label>
                                                                            <i class="fa fa-check-circle text-green"></i>
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                                </div>
                                                                                <input class="form-control iluminarIconoInput" type="date" value="<?php echo date("Y-m-d");?>" name="fechaFinal" required>
                                                                            </div>     
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12 estilos-centrar">
                                                                        <button type="submit" name="reportesTickets" value="" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Descargar</button> 
                                                                    </div>
                                                                </div>
                                                        </div>    
                                                    </form> 
                                                </div>
                                            </div>

                                            <div class="box" style="border-top-color:#808B96">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> <i class="fa fa-volume-up fa-3x" style="color:#808B96"></i> Tonos de alerta</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                        <i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <?php 
                                                        //Verificar si el usuario tiene algún tono seleccionado
                                                        $sonido=array("","","","","","","");
                                                        $personalizado="";
                                                        $ruta="views/sonidos/tickets/".$_SESSION['identificador']."/";
                                                        if(!file_exists($ruta))
                                                            $sonido[0]="checked";
                                                        else{
                                                            foreach (glob($ruta."*") as $nombre) {
                                                                $nombre=basename($nombre);
                                                                if($nombre==="Alert-notification.mp3")
                                                                    $sonido[0]="checked";
                                                                else if($nombre==="Cosmic-ringtone.mp3")
                                                                    $sonido[1]="checked";
                                                                else if($nombre==="Notification-tone.mp3")
                                                                    $sonido[2]="checked";
                                                                else if($nombre==="Sci-fi-device-high-tone.mp3")
                                                                    $sonido[3]="checked";
                                                                else if($nombre==="Short-sms-tone.mp3")
                                                                    $sonido[4]="checked";
                                                                else if($nombre==="Soft-alarm-tone.mp3")
                                                                    $sonido[5]="checked";
                                                                else{
                                                                    $sonido[6]="checked";
                                                                    $personalizado = Ruta::ruta_server().$ruta.$nombre;
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                        <div class="max1000">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">1.-Alert-notification</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido1" style="cursor:pointer;" <?php echo $sonido[0]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" src="<?php echo Ruta::ruta_server();?>views/sonidos/tickets/Alert-notification.mp3" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">2.-Cosmic-ringtone</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido2" style="cursor:pointer;" <?php echo $sonido[1]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" src="<?php echo Ruta::ruta_server();?>views/sonidos/tickets/Cosmic-ringtone.mp3" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">3.-Notification-tone</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido3" style="cursor:pointer;" <?php echo $sonido[2]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" src="<?php echo Ruta::ruta_server();?>views/sonidos/tickets/Notification-tone.mp3" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">4.-Sci-fi-device-high-tone</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido4" style="cursor:pointer;" <?php echo $sonido[3]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" src="<?php echo Ruta::ruta_server();?>views/sonidos/tickets/Sci-fi-device-high-tone.mp3" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">5.-Short-sms-tone</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido5" style="cursor:pointer;" <?php echo $sonido[4]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" src="<?php echo Ruta::ruta_server();?>views/sonidos/tickets/Short-sms-tone.mp3" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">6.-Soft-alarm-tone</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido6" style="cursor:pointer;" <?php echo $sonido[5]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" src="<?php echo Ruta::ruta_server();?>views/sonidos/tickets/Soft-alarm-tone.mp3" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label style="cursor:pointer;">7.-Personalizado</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon" style="border:none;">
                                                                            <input type="radio" name="tono" id="sonido7" <?php echo $sonido[6]; ?>>
                                                                        </div>
                                                                        <audio controls preload="auto" id="nombreSonidoPersonalizado" src="<?php echo $personalizado;?>" preload="auto" style="width:100%;"></audio>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4"> 
                                                                    <br>
                                                                    <span class="btn  btn-lg btn-file" style="background:#808B96;color:#fff;"><i class="fa fa-volume-up"></i> Personalizado<input type="file" id="cargarSonidoPersonalizado" accept="audio/mp3"></span>
                                                                    <br>
                                                                    <b>Formato mp3</b>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                </div>
                                            </div>

                                            <div class="box" style="border-top-color:#900c3f">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> <i class="fa fa-list fa-3x" style="color:#900c3f"></i> Administrar categorias</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                        <i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                        <div class="max1000">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>1.-Área</label> <i class="fa fa-check-circle"></i>
                                                                    <select class="form-control" id="categoriaConfiguraciones">
                                                                        <option value=""></option>
                                                                        <option value="1" class="textoMay">Soporte técnico</option>
                                                                        <option value="2" class="textoMay">GIRO</option>
                                                                        <option value="3" class="textoMay">Desarrollo de software</option>
                                                                    </select>
                                                                </div>
                                                            </div>  
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label for="">2.-Categoria:</label>
                                                                    <div class="input-icon">
                                                                        <input class="form-control" type="text" name="nuevaCategoria" style="padding-right:40px;" disabled>
                                                                        <i class="fa fa-plus-circle add-item fa-2x" id="nuevasCategorias" style="cursor:pointer"></i>
                                                                    </div>
                                                                    <ol class="agregarCategoriasTickets" id="contenedorCategorias"></ol>
                                                                </div>   
                                                                <div class="col-md-6">
                                                                    <label for="">3.-Subcategoria:</label>
                                                                    <div class="input-icon">
                                                                        <input class="form-control" type="text" name="nuevaSubCategoria" style="padding-right:40px;" disabled>
                                                                        <i class="fa fa-plus-circle add-item fa-2x" id="nuevasSubCategorias" style="cursor:pointer"></i>
                                                                    </div>
                                                                    <ol class="agregarCategoriasTickets" id="contenedorSubCategorias"></ol>
                                                                    
                                                                </div>     
                                                            </div>   
                                                        </div>    
                                                </div>
                                            </div>

                                            <div class="box" style="border-top-color:#7D3C98">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"> <i class="fa fa-window-restore fa-3x" style="color:#7D3C98"></i> Ventana flotante</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                                                        <i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                        <div class="max1000">
                                                        <p>La venta flotante permite desplegar un ventana independiente del sistema de intranet en donde se te notificara información del módulo de tickets.</p>
                                                            <button type="button" class="btn btn-lg" id="botonVentanaFlotante" style="background:#7D3C98;color:#fff;"> <i class="fa fa-window-restore" style="margin-right:5px;"></i> Activar ventana</button>
                                                        </div>    
                                                </div>
                                            </div>
                            
                                    </div>
                            </div>
                    </div>
        </div>
     
    <!-- ===================MODALES===================== -->   
    <div class="modal fade" id="modalPorAbrir">
        <div class="modal-dialog modal-lg">
          <div class="modal-content tickets">

            <div class="modal-header" style="background:#dd4439;color:#fff;">
                <h4 class="modal-title" style="margin-bottom:-20px"><i class="fa fa-retweet fa-2x"></i> Tickets por abrir:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">
                <div class="row renglon-encabezado mostrar768">
                    <div class="col-sm-1 columna-div columna-div-centrar">Ticket</div>
                    <div class="col-sm-3 columna-div columna-div-centrar">Nombre</div>
                    <div class="col-sm-4 columna-div columna-div-centrar">Asunto</div>
                    <div class="col-sm-2 columna-div columna-div-centrar">Finalizado</div>
                    <div class="col-sm-1 columna-div columna-div-centrar">Área</div>
                    <div class="col-sm-1 columna-div columna-div-centrar"></div>
                </div> 

                <div id="listaTicketsAbrir"></div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </div>
        </div>
    </div>

    <div class="modal fade" id="modalAtendiendose">
        <div class="modal-dialog">
          <div class="modal-content tickets">

            <div class="modal-header" style="background:#f39c12;color:#fff;">
                <h4 class="modal-title" style="margin-bottom:-20px"><i class="fa fa-clock-o fa-2x"></i> Tickets siendo atendidos:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">
                <div class="row" id="listaPersonalAtiende">
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </div>
        </div>
    </div>

    <div class="modal fade" id="modalAsignarTicket">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <div class="modal-header" style="background:#3D3938;color:#fff;">
                <h4 class="modal-title" style="margin-bottom:-20px">Asignar ticket: No. <span id="labelTicketModalAsignarTicket">0</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">
                <div class="row" id="listaPersonalAsignar">
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </div>
        </div>
    </div>

    <div class="modal fade" id="modalPorAtender">
        <div class="modal-dialog modal-lg">
          <div class="modal-content tickets">

            <div class="modal-header" style="background:#00c0fe;color:#fff;">
                <h4 class="modal-title" style="margin-bottom:-20px"><i class="fa fa-ticket fa-2x"></i> Tickets por atender:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">
                

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="info-box shadow-crow">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-wrench"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Soporte técnico</span>
                                <span class="info-box-number" id="modalPorAtenderMarcadorSoporte">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4  col-xs-12">
                        <div class="info-box shadow-crow">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-chrome"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">GIRO</span>
                                <span class="info-box-number" id="modalPorAtenderMarcadorGiro">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-4 col-xs-12">
                        <div class="info-box shadow-crow">
                            <span class="info-box-icon bg-green"><i class="fa fa-file-code-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Desarrollo software</span>
                                <span class="info-box-number" id="modalPorAtenderMarcadorDesarrollo">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                  
                   
                  
                </div>


            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </div>
        </div>
    </div>

    <div class="modal fade" id="modalDatosTicket" data-backdrop="static" style="overflow-y:auto;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-5 col-xm-12">
                        <h4 class="modal-title">Datos del ticket: <span id="labelTicketModalDatosTicket" style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">0</span></h4>
                        <button type="button" class="close ocultar768" style="margin-top:-25px;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-sm-5 col-xm-12 espacio-vertical">
                        <h4><span style="padding:8px;color:#fff;font-size:18px;" id="textoCategoria"></span></h4>
                    </div>
                    <div class="col-sm-1 col-xm-12 text-right">
                        <button type="button" class="close mostrar768" style="margin-right:-40px;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <br>
                <div class="row" id="fechasTicket"></div>
                <div class="row" id="tiempoRespuesta"></div>

             </div>
            <div class="modal-body" id="cargarDataTicket">

            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <button type="button" class="btn btn-primary btn-lg" style="" id="botonTomarTicketAbierto"> <i class="fa fa-ticket"></i> Tomar ticket</button>
                        <button type="button" class="btn btn-primary btn-lg" id="botonTomarTicketDesorden"> <i class="fa fa-ticket" style="margin-right:5px;"></i> Tomar ticket</button>
                        <button type="button" class="btn btn-success btn-lg" id="botonCerrarTicket"> <i class="fa fa-check-circle" style="margin-right:5px;"></i> Cerrar ticket</button>
                        <button type="button" class="btn btn-success btn-lg" id="botonCerrarTicketAbierto"> <i class="fa fa-check-circle" style="margin-right:5px;"></i> Cerrar ticket</button>
                        <button type="button" class="btn btn-dark btn-lg" id="botonSolucion"> <i class="fa fa-list-alt" style="margin-right:5px;"></i> Solución</button>     
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-danger btn-lg" style="" id="botonMotivoApertura"> <i class="fa fa-retweet" style="margin-right:5px;"></i> Motivo de apertura</button>
                        <hr style="opacity:0;">
                        <button style="margin-top:-10px;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>

    <div class="modal fade" id="modalFinalizados">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background:#00a65a;color:#fff;">
                <h4 class="modal-title" style="margin-bottom:-20px"><i class="fa fa-check-circle-o fa-2x"></i> Tickets finalizados</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
            <div class="modal-body" id="infoEstadisticas"></div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </div>
        </div>
    </div>

   <!-- <div class="modal fade" id="modalHistorial">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-secondary tickets">

            <div class="modal-header">
                <h4 class="modal-title">Historial del ticket: <span class="numberTicketLabel"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">
                <div class="mainRow">
                  <div class="mainCol1b">No.</div>
                  <div class="mainCol2b">Atendio</div>
                  <div class="mainCol3b">Asunto</div>
                </div>  

                
                <div id="listaTicketsHistorial">
                
                </div>
              

            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

          </div>
        </div>
    </div> -->

    <div class="modal fade" id="modalSolucion" data-backdrop="static" style="overflow-y:auto;">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#00a65a;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" id="exampleModalLongTitle">Problema, causa y solución.</h3>
                           
                        </div>
                        <form id="formularioGuardarSolucion">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12" id="archivosAnexosSoporte"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label style="cursor:pointer;">1.-Problema: </label>
                                        <div class="input-group">
                                            <div class="input-group-addon" style="background-color:#dd4b39">
                                                <i class="fa fa-question-circle-o fa-2x" style="color:#fff;" aria-hidden="true"></i>
                                            </div>
                                            <textarea name="problema" class="form-control iluminarIconoInput" rows="3" style="resize:vertical;" required></textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label style="cursor:pointer;">2.-Causa: </label>
                                        <div class="input-group">
                                            <div class="input-group-addon" style="background-color:#f39c12">
                                                <i class="fa fa-user-secret fa-2x" style="color:#fff;" aria-hidden="true"></i>
                                            </div>
                                            <textarea name="causa" class="form-control iluminarIconoInput" rows="3" style="resize:vertical;" required></textarea>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label style="cursor:pointer;">3.-Solución: </label>
                                        <div class="input-group">
                                            <div class="input-group-addon" style="background-color:#00a65a">
                                                <i class="fa fa-check fa-2x" style="color:#fff;" aria-hidden="true"></i>
                                            </div>
                                            <textarea  name="solucion" class="form-control iluminarIconoInput" rows="3" style="resize:vertical;" required></textarea>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div style="margin-top:5px;margin-left:15px;margin-right:15px;">
                                <input type="file" id="botonAdjuntarArchivos" multiple style="display:none;">
                                <ol id="contenedorDocumentos" class="alert alert-info loadDocuments"><h2>Arrastra y sulta los archivos que desees adjuntar o <button type="button" class="btn adjuntarArchivos" style="background:#1F61A1;color:#fff;"><i class="fa fa-paperclip"></i> Presiona</button></h2></ol>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <button type="submit" class="btn btn-primary btn-lg" style=""> <i class="fa fa-floppy-o"></i> Guardar</button>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <hr style="opacity:0;">
                                        <button style="margin-top:-10px;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                  </div>
              </div>
    </div>
     
    <div class="modal fade" id="listaHistorialTicket">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#99A3A4;color:#fff;">
                            <h4 class="modal-title" style="margin-bottom:-20px"><i class="fa fa-history fa-2x"></i> Historial del ticket (Bitacora)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row renglon-encabezado mostrar768">
                                <div class="col-sm-1 columna-div columna-div-centrar">No.</div>
                                <div class="col-sm-4 columna-div columna-div-centrar">Atendio anteriormente</div>
                                <div class="col-sm-2 columna-div columna-div-centrar">Registrado</div>
                                <div class="col-sm-2 columna-div columna-div-centrar">Atendido</div>
                                <div class="col-sm-2 columna-div columna-div-centrar">Cerrado</div>
                                <div class="col-sm-1 columna-div columna-div-centrar">Detalles</div>
                            </div> 

                            <div id="datosTicketsHistorial">
                        
                            </div>
                        </div>

                        <div class="modal-footer estilos-centrar limpiardiv"></div>
                  </div>
              </div>
    </div>
    
    <div class="modal fade" id="modalMotivoAperturaTicket">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background:#FF5733;color:#fff;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title text-center" style="margin-bottom:-20px"><i class="fa fa-question-circle-o fa-2x"></i> Motivo para abrir el ticket.</h3>
                           
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <textarea id="motivoApertura" class="form-control" rows="5" style="resize:vertical;" placeholder="..." disabled></textarea>       
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                  </div>
              </div>
    </div>
    <!-- =============================================== -->
    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->





        
