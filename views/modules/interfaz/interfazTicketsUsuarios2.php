<?php
$activarPestanaHistorial='';
$activarPestanaFormulario='active';
if(isset($_POST['expandirPestanaHistorial'])){
    $activarPestanaHistorial = 'active';
    $activarPestanaFormulario='';
}
?>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="controlTickets">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-ticket icono-encabezado"></i>SISTEMA DE TICKETS</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                        <div role="tabpanel"> 
                                <ul class="nav nav-tabs">
                                        <li role="presentation" class="<?php echo $activarPestanaFormulario; ?>">
                                            <a href="#cola" aria-controls="cola" role="tab" data-toggle="tab">Nuevo ticket</a>
                                        </li>
                                        <li role="presentation" class="<?php echo $activarPestanaHistorial; ?>">
                                            <a href="#atendidos" aria-controls="atendidos" role="tab" data-toggle="tab">Tickets generados</a>
                                        </li>
                                </ul>
                                <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane <?php echo $activarPestanaFormulario; ?> contenedor-div" style="background:#fff;padding-top:2%;" id="cola"> 
                                            <form method="POST" style="margin-top: 2%;"  id="formularioTickets" enctype="multipart/form-data" class="max800">
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>1.-Área</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <select class="form-control textoMay" name="area" required>
                                                            <option value=""></option>
                                                            <option value="1">Soporte técnico</option>
                                                            <option value="2">Giro</option>
                                                            <option value="3">Desarrollo de sofware (Intranet)</option> 
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>2.-Categoria</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <select class="form-control textoMay" name="categoria" required>
                                                            <option value=""></option>
                                                        </select> 
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label>3.-Subcategoria</label> 
                                                        <i class="fa fa-check-circle" style="font-size:20px;visibility: hidden;"></i>
                                                        <select class="form-control textoMay" name="subcategoria" disabled>
                                                            <option value=""></option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-6" style="margin-top:10px;">
                                                        <label for="">4.-Asunto:</label> <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <input class="form-control" type="text" name="asunto" minlength="10" placeholder="...Escribe brevemente de que trata el problema"required>
                                                    </div>
                                                </div>                             
                                                <div class="row" style="margin-top:10px;">
                                                    <div class="col-md-12" >
                                                        <label for="">5.-Descripción:</label>  <i class="fa fa-check-circle" style="font-size:20px;"></i>
                                                        <textarea name="descripcion" class="form-control" rows="6" style="resize:vertical;" minlength="20" placeholder="...Te pedimos que seas lo más específico posible, detallando exactamente cual es tu problema; y en caso de que aplique nos indiques cual es la solución o resultado que esperas obtener." required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:10px;">
                                                    <label for="" style="margin-left:15px;">6.-Documentos adjuntos:</label>
                                                    <div class="col-sm-12" >
                                                        <div class="alert alert-secondary" role="alert">
                                                        <i class="fa fa-info-circle"></i> Documentos validos: Txt - Pdf - Word - Excel - Power point - Imagenes (.jpg, .jpeg, .png)
                                                        <br>
                                                        <i class="fa fa-info-circle"></i> Peso máximo por documento: 5 MB
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-top:-15px;">
                                                    <ol id="contenedorDocumentos" class="alert alert-info loadDocuments"><h2>Arrastra y sulta los archivos que desees adjuntar o <button type="button" class="btn adjuntarArchivos" style="background:#1F61A1;color:#fff;"><i class="fa fa-paperclip"></i> Presiona</button></h2></ol>
                                                </div>
                                                <hr>
                                                <p><i class="fa fa-check-circle fa-2x"></i> Obligatorio</p>
                                                <div class="text-center">
                                                    <input type="file" id="botonAdjuntarArchivos" multiple style="display:none;">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                                                    <button type="reset" class="btn btn-danger" id="cancelarTickets"><i class="fa fa-times"></i> Cancelar</button>  
                                                </div>
                                            </form>
                                        </div>

                                        <div role="tabpanel" class="tab-pane <?php echo $activarPestanaHistorial;?> contenedor-div" style="background:#fff;padding-top:2%;" id="atendidos"> 
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="callout callout-warning2"><i class="fa fa-clock-o fa-2x text-yellow"></i> 1.- En espera</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="callout callout-success2"><i class="fa fa-cogs fa-2x text-green"></i> 2.- Atendiendose</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="callout callout-info2"><i class="fa fa-check-square fa-2x text-blue"></i> 3.- Finalizado</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <p class="callout callout-success">Una vez finalizado tu ticket y consideres que tu problema no fue resuelto puedes solicitar al equipo de sistemas que abra el ticket para dar seguimiento al caso.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>Sólo se muestran los últimos 10 tickets</span>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <button type="button" class="btn btn-primary btn-lg" id="botonActualizarListaTickets"><i class="fa fa-refresh fa-2x"></i></button>
                                                </div>
                                            </div>
                                            <br>
                                            

                                            <div class="row renglon-encabezado mostrar768">
                                                <div class="col-sm-1 columna-div columna-div-centrar">No.</div>
                                                <div class="col-sm-3 columna-div columna-div-centrar">Sistemas</div>
                                                <div class="col-sm-3 columna-div columna-div-centrar">Asunto</div>
                                                <div class="col-sm-2 columna-div columna-div-centrar">Fecha</div>
                                                <div class="col-sm-1 columna-div columna-div-centrar">Status</div>
                                                <div class="col-sm-2 columna-div columna-div-centrar">Opciones</div>
                                            </div>

                                            <div id="listarTickets">
                                                <?php echo Tickets::historialTicketsUsuario_(); ?>
                                            </div>
                                        </div>

                                </div>
                        </div>
            </div>
     
            <!-- ===================MODALES===================== -->   
        
            <div class="modal fade" id="modalDatosTicket" style="overflow-y:auto;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-xs-11">
                                    <h4 class="modal-title">Datos del ticket: <span id="numeroTicketLabel" style="font-size:25px;background:#00a65a;padding:10px;color:#fff;border-radius:5px;">0</span> <span style="padding:8px;color:#fff;font-size:18px;" id="textoCategoria"></span></h4>
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row" id="fechasTicket"></div>
                           
                        </div>
                        <div class="modal-body" id="cargarDataTicket">

                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <button type="button" class="btn btn-danger btn-lg" style="" id="botonAbrirTicket"> <i class="fa fa-retweet" style="margin-right:5px;"></i> Abrir ticket</button>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalAperturaTicket">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title text-center" id="exampleModalLongTitle">Motivo para abrir el ticket.</h3>
                                
                                </div>
                                <form id="formularioMotivo">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea name="motivoParaAbrir" class="form-control" rows="5" style="resize:vertical;" placeholder="..." required></textarea>       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <button type="submit" class="btn btn-success btn-lg" style="" > <i class="fa fa-retweet" style="margin-right:5px;"></i> Abrir ticket</button>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
            </div>

        </div>
    <!-- =============================================== -->
    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->





        
