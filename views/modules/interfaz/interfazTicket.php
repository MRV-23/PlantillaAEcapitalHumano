
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">



      <!-- Default box collapsed-box-->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-list-ol"></i> CONTADORES DE TICKETS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              <div class="row">
                  <?php $categoria = AccesoSoporte::usuarios($_SESSION['identificador']);?>

                    <?php if($categoria==1 || Configuraciones::administrador() == $_SESSION['identificador2']):?>
                      <div class="col-md-4 col-xs-12">
                          <div class="titulo-color bg-aqua">SOPORTE TÉCNICO</div>
                          <div class="info-box" style="border-right: 1px solid #00c0ef; border-bottom: 1px solid #00c0ef; height:80px;">
                              <span class="info-box-icon bg-aqua"><i class="fa fa-wrench"></i></span>
                              <div class="info-box-content" id="grupoSoporteTecnico">
                                  <span class="info-box-text" style="font-size:12px;"><u>TICKETS GENERADOS HOY: </u><b style="font-size:18px;"><span id="labelTotalTicketsTecnico"></span></b></span>
                                  <span class="info-box-text"><b>Rogelio:</b> <span style="font-size:11px;">atiende el ticket</span> <b><span class="labelTicket" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Rogelio');?>">0</span></b> </span>
                                  <span class="info-box-text"><b>Ulises:</b> <span style="font-size:11px;">atiende el ticket</span> <b><span class="labelTicket" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Ulises');?>">0</span></b> </span>
                                  <span class="info-box-text"><b>Juan:</b> <span style="font-size:11px;">atiende el ticket</span> <b><span class="labelTicket" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Juan');?>">0</span></b> </span>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>

                  <?php if($categoria==2 || Configuraciones::administrador() == $_SESSION['identificador2']):?>
                      <div class="col-md-4 col-xs-12">
                          <div class="titulo-color bg-yellow">GIRO</div>
                          <div class="info-box" style="border-right: 1px solid #f39c12; border-bottom: 1px solid #f39c12;">
                              <span class="info-box-icon bg-yellow"><i class="fa fa-chrome"></i></span>
                              <div class="info-box-content" id="grupoGiro">
                                <span class="info-box-text" style="font-size:12px;"><u>TICKETS GENERADOS HOY: </u><b style="font-size:18px;"><span id="labelTotalTicketsGiro"></span></b></span>
                                <!--<span class="info-box-text"><b>Miguel:</b> <span style="font-size:11px;">atiende el ticket</span> <b><span class="labelTicket" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Miguel');?>">0</span></b> </span>-->
                                <span class="info-box-text"><b>Salvador:</b> <span style="font-size:11px;">atiende el ticket</span> <b><span class="labelTicket" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Salvador');?>">0</span></b></span>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>

                  <?php if($categoria==3 || Configuraciones::administrador() == $_SESSION['identificador2']):?>
                      <div class="col-md-4 col-xs-12">
                          <div class="titulo-color bg-green">DESARROLLO DE SOFTWARE</div>
                          <div class="info-box" style="border-right: 1px solid #00a65a; border-bottom: 1px solid #00a65a;">
                              <span class="info-box-icon bg-green"><i class="fa fa-file-code-o"></i></span>
                              <div class="info-box-content" id="grupoDesarrollo">
                                    <span class="info-box-text" style="font-size:12px;"><u>TICKETS GENERADOS HOY: </u><b style="font-size:18px;"><span id="labelTotalTicketsDesarrollo"></span></b></span>
                                  <span class="info-box-text"><b>Uriel:</b> <span style="font-size:11px;">atiende el ticket</span> <b><span class="labelTicket" id="labelTicket<?php echo AccesoSoporte::idUsuarios('Uriel');?>">0</span></b></span>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>

              </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-ticket"></i> GESTIÓN DE TICKETS</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          

            <!--pestañas-->
          <div role="tabpanel">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a href="#cola" aria-controls="cola" role="tab" data-toggle="tab">Cola de tickets</a>
                </li>
                <li role="presentation">
                    <a href="#actuales" aria-controls="actuales" role="tab" data-toggle="tab">Tickets actualmente atendidos</a>
                </li>
                <li role="presentation">
                    <a href="#terminados" aria-controls="terminados" role="tab" data-toggle="tab">Tickets finalizados</a>
                </li>
                <li role="presentation">
                    <a href="#consulta" aria-controls="consulta" role="tab" data-toggle="tab">Historial tickets</a>
                </li>
                <li role="presentation">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Generar ticket</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                
                   
                    <div role="tabpanel" class="tab-pane active administrar-tickets" id="cola">


                        <div class="row" style="margin-top: 25px;">
                      

                        <?php if($categoria == 1): ?>
                           
                              <div class="col-md-4">
                                    <button type="button" id="atenderTicketSoporte" value="" class="btn btn-info btn-lg"><i class="fa fa-wrench fa-lg"></i> Atender Ticket Soporte Técnico</button>
                              </div>
                            
                        <?php elseif($categoria == 2): ?>
                         
                            <div class="col-md-4">
                                  <button type="button" id="atenderTicketGiro" value="" class="btn btn-warning btn-lg"><i class="fa fa-chrome fa-lg"></i> Atender Ticket Giro</button>
                            </div>
                         
                        <?php else: ?>
                         
                            <div class="col-md-4">
                                  <button type="button" id="atenderTicketDesarrollo" value="" class="btn btn-success btn-lg"><i class="fa fa-file-code-o fa-lg"></i> Atender Ticket Desarrollo</button>
                            </div>
                          
                        <?php endif; ?>
                          
                            <div class="col-md-4">
                                  <br>
                            </div>
                            <div class="col-md-4">
                                <div id="recargarBotonTicketReabrir">
                                    <?php $total = Tickets::totalPorReabrir(); ?>
                                    <button type="button" id="ticketPendientesPorReabrir" value="" class="btn btn-default btn-lg" <?php echo $total >0 ? '' : 'disabled'; ?> ><b style="font-size:22px;"><?php echo $total; ?></b> Ticket por abrir <?php echo $total > 0 ? '<i class="fa fa-circle fa-lg text-green"></i>' : '<i class="fa fa-circle fa-lg text-gray"></i>'; ?></button>
                                </div>
                            </div>
                    </div>

                  
                        <!--<div class="col-md-8">
                                <button type="button" id="atenderTicketDesarrollo" value="" class="btn btn-success btn-lg"><i class="fa fa-file-code-o fa-lg"></i> Atender Ticket Desarrollo</button>
                        </div>-->
                        <!--<div class="row" style="margin-top: 2%;" >
                          <div class="col-md-4">
                                <input type="button" value="Alerta" class="btn btn-default btn-lg" id="activarAlerta">
                          </div>
                        </div>-->


                         <div class="renglonEncabezado" style="margin-top: 25px;">
                            <div class="campoIdTicketEncabezado">Ticket</div>
                            <div class="campoNombreTicketEncabezado" style="justify-content: center;">Nombre</div>
                            <div class="campoAsuntoEncabezado" style="justify-content: center;">Asunto</div>
                            <div class="campoSituacionEncabezado">Prioridad</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                        <div id="mostrarDatosTickets">
                          <?php
                              $tickets = new Tickets();
                              echo $tickets->mostrarColaTickets(0);
                          ?>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane administrar-tickets" id="actuales">

                    
                        <div class="row" style="margin-top: 2%;" >
                            <div class="col-md-12">
                                 <p><i class="fa fa fa-stop fa-lg text-orange"></i> Tickets reabiertos</p>
                            </div>
                            <div class="col-md-12">
                                 <p><i class="fa fa-exclamation-triangle text-red"></i> Tickets que llevan al menos un día en espera por ser cerrados</p>
                            </div>
                        </div>

                         <div class="renglonEncabezado">
                            <div class="campoIdTicketEncabezado">Ticket</div>
                            <div class="campoNombreTicketEncabezado" style="justify-content: center;">Nombre</div>
                            <div class="campoAsuntoEncabezado" style="justify-content: center;">Asunto</div>
                            <div class="campoSituacionEncabezado">Prioridad</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                        <div id="mostrarDatosTicketsPorAtender">
                          <?php
                              echo $tickets->mostrarColaTickets(1,true);
                          ?>
                        </div>

                    </div>

                     <div role="tabpanel" class="tab-pane administrar-tickets" id="terminados">

                        
                        <div class="row" style="margin-top: 2%;" >
                            <div class="col-md-12">
                                 <p><i class="fa fa fa-stop fa-lg text-orange"></i> Tickets reabiertos</p>
                            </div><div class="col-md-12">
                                 <p><i class="fa fa-exclamation-triangle text-red"></i> Tickets que tardaron al menos un día en ser cerrados</p>
                            </div>
                        </div>

                        <div class="renglonEncabezado">
                            <div class="campoIdTicketEncabezado">Ticket</div>
                            <div class="campoNombreTicketEncabezado" style="justify-content: center;">Nombre</div>
                            <div class="campoAsuntoEncabezado" style="justify-content: center;">Asunto</div>
                            <div class="campoSituacionEncabezado">Prioridad</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                        <div id="mostrarDatosTicketsFinalizados">
                          <?php
                              echo $tickets->mostrarColaTickets(2);
                          ?>
                        </div>


                    </div>


                    <div role="tabpanel" class="tab-pane administrar-tickets-finalizados" id="consulta">

                          <?php 
                           $paginacion = new Paginacion(30);
                            $totalRegistros = Tickets::totalHistorialTickets();
                            $paginacion->totalPaginas($totalRegistros);
                            $paginacion->target('tickets');
                        ?>

                        <div class="row" style="margin-top: 2%;" >
                          
                          <div class="col-md-4">
                              <span><b>Finalizado: </b></span>
                              <input type="date" class="select-style textoMay" id="fechasTickets">
                          </div>
                          <div class="col-md-4">
                                <input type="text" id="buscadorUsuariosTickets" class="buscador" placeholder="Buscar..." autocomplete="off"  style="width:200px;height:35px;padding:5px;"> 
                          </div>

                          <div class="col-md-4" style="text-align:right">
                                <button class="btn btn-lg btn-info" id="aplicarFiltrosTickets"><i class="fa fa-eraser"></i> Limpiar filtros</button>
                          </div>
                        </div>

                         <span id="paginacionTickets"><?php  echo $paginacion->mostrar();?></span>

                         <div class="renglonEncabezado" style="margin-top: 25px;">
                            <div class="campoIdTicketEncabezado">Ticket</div>
                            <div class="campoNombreTicketEncabezado" style="justify-content: center;">Nombre</div>
                            <div class="campoAsuntoEncabezado" style="justify-content: center;">Asunto</div>
                            <div class="campoCierreEncabezado" style="justify-content: center;">Fecha</div>
                            <div class="campoSituacionEncabezado">Prioridad</div>
                            <div class="campoDetalleEncabezado">Detalles</div>
                        </div>

                        <div id="mostrarHistorialTickets">
                          <?php 
                              $tickets = new Tickets();
                              echo $tickets->historialTickets('','',$paginacion->limitRegistros());
                          ?>
                        </div>

                         <span id="paginacionTickets2"><?php  echo $paginacion->mostrar();?></span>

                    </div>



                    <div role="tabpanel" class="tab-pane administrar-paquetesInternos" id="home">
                      <!-- Formulario-->
                      <form method="POST" style="margin-top: 2%;"  id="formularioNuevoTicket">
                        <div class="max1000">

                            <div class="row">
                              <div class="col-md-6">
                                <label for="">1.-Sucursal:</label>
                                <i class="fa fa-check-circle text-green"></i>
                                <select class="form-control textoMay" id="sucursalGenerarTicket" required>
                                    <?php
                                      echo'<option></option>';
                                      $sucursales= new gestionSucursales();
                                      $sucursales -> vistaSucursalesController();
                                    ?>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label for="usuarioEquipo">2.-Usuario:</label>
                                <i class="fa fa-check-circle text-green"></i>
                                <div id="targetGenerarTicketUsuario">
                                      <select class="form-control textoMay" name="usuarioTicketCreado" id="usuarioTicketCreado" required readonly>
                                        <option></option>
                                      </select>
                                </div>
                              </div>
                            </div>
                        
                        <!-- primera fila -->
                         
                            <div class="row">
                              <!-- segunda columna -->
                              <div class="col-md-6">
                                <label for="passActual">3.-Categoria</label> <i class="fa fa-check-circle text-green"></i>
                                <select class="form-control textoMay" name="areaSistemas" id="areaSistemas" required>
                                    <option value=""></option>
                                    <option value="1">Soporte técnico</option>
                                    <option value="2">Giro</option>
                                    <option value="3">Desarrollo (Intranet)</option>
                                </select>
                              </div>

                              <div class="col-md-6">
                                  <label for="passActual">4.-Subcategoria</label> <i class="fa fa-check-circle text-green"></i>
                                  <div id="cargarSubCategoriaTickets">
                                    <select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required readonly>
                                        <option></option>
                                    </select>
                                  </div>
                              </div>

                            </div>

                            <div id="segmentoTickets"></div>
                          <!-- segunda fila -->
                        
                            <div class="row">
                              <div class="col-md-12">
                                  <label for="">5.-Asunto:</label> <i class="fa fa-check-circle text-green"></i>
                                  <input  class="form-control textoMay" type="text" name="asuntoTicket" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" autocomplete="off" title="Sólo letras,números y espacios" required>
                              </div>
                            </div>
                         

                          <!-- segunda fila -->
                         
                            <div class="row">
                              <div class="col-md-12">
                                <label for="">6.-Descripción:</label> <i class="fa fa-check-circle text-green"></i>
                                <textarea name="descripcionTicket" class="form-control textoMay textAreaImportante" rows="8" style="resize:vertical;" required placeholder="...Te pedimos que seas lo más específico posible, detallando exactamente cual es tu problema; y en caso de que aplique nos indiques cual es la solución o resultado que esperas obtener."></textarea>
                              </div>
                            </div>
                        

                        </div><!--max1000-->
                      
                        <hr>
                        <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                        <div class="estilos-centrar">
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                          <button type="button" class="btn btn-danger" id="formularioCancelarTicket"><i class="fa fa-times"></i> Cancelar</button>  
                        </div>
                      </form>
                    <!-- Fin Formulario -->
                    </div>

                </div>
            </div>
            <!--fin pestañas-->

             <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="mostrarHistorialTicketsLista" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Historial del ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body administrar-tickets-historial">

                            <div class="renglonEncabezado" style="margin-top: 25px;">
                                <div class="campoIdTicketEncabezado">No.</div>
                                <div class="campoNombreTicketEncabezado" style="justify-content: center;">Atendio anteriormente</div>
                                <div class="campoAsuntoEncabezado" style="justify-content: center;">Registrado</div>
                                <div class="campoCierreEncabezado" style="justify-content: center;">Atendido</div>
                                <div class="campoSituacionEncabezado">Cerrado</div>
                                <div class="campoDetalleEncabezado">Detalles</div>
                            </div>

                            <div id="datosTicketsHistorial">
                        
                            </div>
                        </div>

                        <div class="modal-footer estilos-centrar limpiardiv"></div>
                  </div>
              </div>
          </div>
          <!--Ventana modal-->




            <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="mostrarTicketsPorReabrir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tickets que se solicita sean reabiertos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body administrar-tickets-finalizados">

                            <div class="renglonEncabezado" style="margin-top: 25px;">
                                <div class="campoIdTicketEncabezado">Folio</div>
                                <div class="campoNombreTicketEncabezado" style="justify-content: center;">Nombre</div>
                                <div class="campoAsuntoEncabezado" style="justify-content: center;">Asunto</div>
                                <div class="campoCierreEncabezado" style="justify-content: center;">Cerrado</div>
                                <div class="campoSituacionEncabezado">Tipo</div>
                                <div class="campoDetalleEncabezado">Detalles</div>
                            </div>

                            <div id="datosTicketsReabiertos">
                                <?php
                                    echo $tickets->mostrarColaTicketsReabiertos();
                                ?>
                            </div>
                        </div>

                        <div class="modal-footer estilos-centrar limpiardiv"></div>
                  </div>
              </div>
          </div>
          <!--Ventana modal-->



            <!--Ventana modal-->
            <div class="modal fade bd-example-modal-lg fade" id="ventanaReabrirTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <button type="button" class="btn btn-primary btn-lg reabrirTicketModal">Reabrir ticket</button>
                          <button type="button" id="noReabrirTicketModal" class="btn btn-warning btn-lg">NO reabrir ticket</button>
                        </div>

                  </div>
              </div>
          </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="mostrarTicketSoporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Información sobre el ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" id="tipoUsuarioTicket" value="<?php echo $categoria;?>">
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

                          <button type="button" id="atenderNumeroTicketModal" value="" class="btn btn-primary btn-lg">Atender Ticket</button>
                        </div>

                  </div>
              </div>
          </div>
          <!--Ventana modal-->


           <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="mostrarDatosTicketAtendidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <button type="button" id="atenderNumeroTicketModal2" value="" class="btn btn-danger btn-lg">Cerrar Ticket</button>
                          <button type="button" id="atenderNumeroTicketModal3" class="btn btn-danger btn-lg" >Cerrar Ticket Nuevamente</button>
                        </div>

                  </div>
              </div>
          </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="mostrarDatosTicketFinalizados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <button type="button" class="btn btn-primary btn-lg reabrirTicketModal">Reabrir ticket</button>
                            <button type="button" id="mostrarSolucionTicket" class="btn btn-default btn-lg">Mostrar solución</button>
                        </div>

                  </div>
              </div>
          </div>
          <!--Ventana modal-->


          <!--Ventana modal-->
          <div class="modal fade bd-example-modal-lg fade" id="solucionTicketPorCerrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><b>Solución aplicada al ticket</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <label for=""><i class="fa fa-question-circle-o fa-lg text-red" aria-hidden="true"></i> 1.-Problema:</label>
                                        <textarea name="problemaTicket" id="problemaTicket" class="form-control textoMay" rows="6" style="resize:vertical;border-left:4px solid rgba(255,51,51,.5);" placeholder="..."></textarea>
                                        <label for=""><i class="fa fa-user-secret fa-lg text-yellow"></i> 2.-Causa:</label>
                                        <textarea name="causaTicket" id="causaTicket" class="form-control textoMay" rows="6" style="resize:vertical;border-left:4px solid rgba(213,176,25,.5);" placeholder="..."></textarea>
                                        <label for=""><i class="fa fa-check fa-lg text-green" aria-hidden="true"></i> 3.-Solución:</label>
                                        <textarea name="descripcionTicket" id="descripcionTicket" class="form-control textoMay" rows="6" style="resize:vertical;border-left:4px solid rgba(49,194,37,.5);" placeholder="..."></textarea>
                                       
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer estilos-centrar">
                          <button type="button" id="guardarSolucionTicket" class="btn btn-success btn-lg">Guardar</button>
                        </div>

                  </div>
              </div>
          </div>
          <!--Ventana modal-->



           <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="motivoAbrirTicket" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"> <b>¿ Cuál es el motivo ?</b></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <textarea name="motivoTicket" id="motivoTicket" class="form-control textoMay" rows="10" style="resize:vertical;" placeholder="..."></textarea>       
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer estilos-centrar">
                          <button type="button" id="guardarMotivoReabrirTicket" class="btn btn-success btn-lg">Guardar y continuar</button>
                        </div>
                  </div>
              </div>
          </div>
          <!--Ventana modal-->

           <!--Ventana modal-->
           <div class="modal fade bd-example-modal-lg fade" id="motivoAperturaCierreTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="exampleModalLongTitle"> <b>Motivo para reabrir el ticket (o para no reabrirlo en caso de que el usuario lo solicitara).</b></h5>
                           
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <textarea id="historialMotivoAperturaCierre" class="form-control textoMay" rows="10" style="resize:vertical;" placeholder="..." readonly></textarea>       
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer estilos-centrar">
                          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-default btn-lg">Aceptar</button>
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
      <?php if(Configuraciones::administrador() == $_SESSION['identificador2']):?>
        <!-- Default box collapsed-box-->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart-o "></i>  INDICADORES DE TICKETS</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                    <i class="fa fa-minus" id="minimizarGraficasTickets"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                  <div class="row"> 
                    <div class="col-md-12">
                      <div class="estilos-centrar bg-aqua" style="margin-bottom:10px;"><h3>SOPORTE TÉCNICO</h3></div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                        <div>
                          <div class="estilos-centrar"><h4>Categorias más atendidas</h4></div>
                          <div id="bar-chart" style="height:300px;"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                          <div class="estilos-centrar"><h4>Total de tickets atendidos</h4></div>
                          <div id="donut-chart" style="height:300px;"></div>
                        </div>
                    </div>

                  </div>
                  
                  
                  <div class="row"> 
                    <div class="col-md-12">
                      <div class="estilos-centrar bg-yellow" style="margin-bottom:10px;"><h3>GIRO</h3></div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                        <div>
                          <div class="estilos-centrar"><h4>Categorias más atendidas</h4></div>
                          <div id="bar-chart2" style="height:300px;"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                          <div class="estilos-centrar"><h4>Total de tickets atendidos</h4></div>
                          <div id="donut-chart2" style="height:300px;"></div>
                        </div>
                    </div>

                  </div>    


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <!--Footer-->
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
      <?php endif;?>













    </section>
    <!-- /.content -->
  </div>
  <!-- =============================================== -->
  









     