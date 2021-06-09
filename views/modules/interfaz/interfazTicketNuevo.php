
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
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-ticket icono-encabezado"></i> TICKETS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        <div role="tabpanel">
            <ul class="nav nav-tabs">
                <li role="presentation" class="<?php echo $activarPestanaFormulario; ?>">
                    <a href="#nuevo" aria-controls="nuevo" role="tab" data-toggle="tab">Registrar tickets</a>
                </li>
                <li role="presentation" class="<?php echo $activarPestanaHistorial; ?>">
                    <a href="#historial" aria-controls="historial" role="tab" data-toggle="tab">Historial tickets</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">

                  <div role="tabpanel" class="tab-pane <?php echo $activarPestanaFormulario; ?>" id="nuevo">

                      <!-- Formulario-->
                      <form method="POST" style="margin-top: 2%;"  id="formularioNuevoTicketUsuario" enctype="multipart/form-data">
                        <div class="max1000">
                        <!-- primera fila -->
                          
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <label for="passActual">1.-Categoria</label> <i class="fa fa-check-circle text-green"></i>
                                <select class="form-control textoMay" name="areaSistemas" id="areaSistemas" required>
                                    <option value=""></option>
                                    <option value="1">Soporte técnico</option>
                                    <option value="2">Giro</option>
                                    <option value="3">Desarrollo (Intranet)</option>
                                </select>
                              </div>
                            </div>
                         
                           <!-- segunda fila -->
                    
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                  <label for="passActual">2.-Subcategoria</label> <i class="fa fa-check-circle text-green"></i>
                                  <div id="cargarSubCategoriaTickets">
                                    <select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required readonly>
                                        <option></option>
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                         

                          <div id="segmentoTickets"></div>

                          <!-- segunda fila -->
                         
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                  <label for="">3.-Asunto:</label> <i class="fa fa-check-circle text-green"></i>
                                  <input  class="form-control textoMay" type="text" name="asuntoTicket" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" autocomplete="off" title="Sólo letras,números y espacios" required>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                         

                          

                          <!-- segunda fila -->
                         
                            <div class="row">
                            <!-- primera columna -->
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <label for="">4.-Descripción:</label> <i class="fa fa-check-circle text-green"></i>
                                <textarea name="descripcionTicket" class="form-control textoMay textAreaImportante" rows="8" style="resize:vertical;" required placeholder="...Te pedimos que seas lo más específico posible, detallando exactamente cual es tu problema; y en caso de que aplique nos indiques cual es la solución o resultado que esperas obtener."></textarea>
                              </div>
                              <div class="col-md-2">
                              </div>
                            </div>
                            <br>
  
                            <div id="lienzoArchivosTickets"></div>
                            <div id="lienzoDocumentosTickets"></div>

                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <!-- segunda columna -->
                              <div class="col-md-8">
                                <br>
                                <p class="estilos-izquierda"> <i class="fa fa-info text-blue"></i> Puedes adjuntar alguna imagen y archivos de Word, Excel o Pdf.</p>
                                <span class="btn btn-default btn-lg btn-file"><i class="fa fa-file-image-o"></i> Imagen <input type="file" name="cargarImagenTicket" id="cargarImagenTicket" accept="image/*"></span> 
                                <span class="btn btn-default btn-lg btn-file"><i class="fa fa-file-text-o"></i> Documento <input type="file" name="cargarDocumentoTicket" id="cargarDocumentoTicket"></span>                               
                              </div>
                            </div>
                        
                        </div><!--max1000-->
                      
                        <hr>
                        <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                        <div class="estilos-centrar">
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                          <button type="reset" class="btn btn-danger" id="formularioCancelarTicketUsuario"><i class="fa fa-times"></i> Cancelar</button>  
                        </div>
                      </form>
                  </div>

                  <div role="tabpanel" class="tab-pane administrar-tickets-finalizados <?php echo $activarPestanaHistorial; ?>" id="historial">

                        <div class="row" style="margin-top: 2%;" >
                            <div class="col-md-6">
                                <span><b>Últimos tickets solicitados: </b></span>
                            </div>
                            <div class="col-md-6 text-right">
                              <button type="button" id="actualizarHistorialTickets" value="" class="btn btn-info btn-lg"><i class="fa fa-refresh "></i> Actualizar</button>
                            </div>
                        </div>

                        <div class="renglonEncabezado" style="margin-top: 25px;">
                            <div class="campoIdTicketEncabezado">Ticket</div>
                            <div class="campoNombreTicketEncabezado" style="justify-content: center;">Te atendio</div>
                            <div class="campoAsuntoEncabezado" style="justify-content: center;">Asunto</div>
                            <div class="campoCierreEncabezado" style="justify-content: center;">F. registro</div>
                            <div class="campoSituacionEncabezado">Estado</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                          <div id="actualizarTicketsUsuarios">
                            <?php
                                $tickets = new Tickets();
                                echo $tickets->historialTicketsUsuario();
                            ?>
                          </div>


                  </div>

              </div>

         <!--Ventana modal-->
         <div class="modal fade bd-example-modal-lg fade" id="mostrarDatosTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Información sobre el ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <div class="divDatosTicketEncabezado"></div>
                              <div class="contenedorUsuario">
                                <div class="first-div"> 
                                    <div class="divDatosTicket"></div>
                                </div>
                                <div class="second-div estilos-centrar">
                                    <img class="sangriaPermisos visor-crow-imagen-mini imagenTicket" src="views/img/user.png" alt="views/img/user.png" height="140" width="110" style="cursor: pointer;">
                                </div>
                              </div>
                          <div class="divDatosTicket2" class="limpiardiv"></div>
                        </div>
                        <div class="modal-footer estilos-centrar limpiardiv">
                            <button type="button" id="reabrirTicketSoporte" class="btn btn-success btn-lg">Reabrir Ticket</button>
                        </div>
                  </div>
              </div>
          </div>
          <!--Ventana modal-->





        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
          <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->
  









     