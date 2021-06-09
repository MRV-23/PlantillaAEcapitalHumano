<?php
include_once "configuracionesMenu.php";
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="<?php echo $inicio;?>"><a href="<?php echo Ruta::ruta_server();?>inicio"><i class="fa fa-home"></i> <span>Iniciop</span></a></li>
        <li class="<?php echo $agenda;?>"><a href="<?php echo Ruta::ruta_server();?>correos"><i class="fa fa-address-book"></i> <span>Agenda Empresarial</span></a></li>

       <!-- <li><a href="<?php echo Ruta::ruta_server();?>paqueteria"><i class="fa fa-truck"></i> <span>Paqueteria</span></a></li>-->
        <li class="treeview <?php echo $paqueteria;?>">
          <a href="#">
            <i class="fa fa-truck"></i> <span> Paqueteria</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li class="<?php echo $paqueteNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>paqueteriaCaptura"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                <li class="<?php echo $paqueteAdministrar;?>"><a href="<?php echo Ruta::ruta_server();?>paqueteriaRevision"><i class="fa fa-info text-blue"></i> Administrar</a></li>
          </ul>
        </li>
      



         <li class="<?php echo $solicitudes;?>"><a href="<?php echo Ruta::ruta_server();?>solicitudes"><i class="fa fa-file-text-o"></i> <span>Solicitudes</span></a></li>
         <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span> Solicitudes </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="<?php echo Ruta::ruta_server();?>solicitudes"><i class="fa fa-plus text-green"></i> Administrar </a></li>
                <li><a href="<?php echo Ruta::ruta_server();?>solicitudesReportes"><i class="fa fa-info text-blue"></i> Reportes </a></li>
          </ul>
        </li>-->



        <li class="treeview <?php echo $rh;?>">
          <a href="#">
            <i class="fa fa-user"></i> <span>Recursos Humanos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview <?php echo $personal;?>">
              <a href="#"><i class="fa fa-user-circle-o"></i> Personal
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $personalNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>usuarios"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                <li class="<?php echo $personalAdministrar;?>"><a href="<?php echo Ruta::ruta_server();?>usuariosAdministrar"><i class="fa fa-info text-blue"></i> Administrar</a></li>
              </ul>
            </li>


            <li class="treeview <?php echo $sucursales;?>">
              <a href="#"><i class="fa fa-building"></i> Sucursales
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview <?php echo $sucursal;?>">
                  <a href="#"><i class="fa fa-building-o"></i> Sucursal
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo $sucursalNueva;?>"><a href="<?php echo Ruta::ruta_server();?>sucursales"><i class="fa fa-plus text-green"></i> Nueva</a></li>
                    <li class="<?php echo $sucursalAdministrar;?>"><a href="<?php echo Ruta::ruta_server();?>sucursalesAdministrar"><i class="fa fa-info text-blue"></i> Administrar</a></li>
                  </ul>
                </li>
                <li class="treeview <?php echo $departamento;?>">
                  <a href="#"><i class="fa fa-server"></i> Departamento
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo $departamentoNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>departamento"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                    <li class="<?php echo $departamentoVincular;?>"><a href="<?php echo Ruta::ruta_server();?>vincularDepartamento"><i class="fa fa-link text-yellow"></i> Vincular</a></li>
                    <li class="<?php echo $departamentoEliminar;?>"><a href="<?php echo Ruta::ruta_server();?>eliminarDepartamento"><i class="fa fa-window-close text-red"></i> Eliminar</a></li>
                  </ul>
                </li>
                <li class="treeview <?php echo $puesto;?>">
                  <a href="#"><i class="fa fa-th"></i> Puesto
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo $puestoNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>puesto"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                    <li class="<?php echo $puestoVincular;?>"><a href="<?php echo Ruta::ruta_server();?>vincularPuesto"><i class="fa fa-link text-yellow"></i> Vincular</a></li>
                    <li class="<?php echo $puestoEliminar;?>"><a href="<?php echo Ruta::ruta_server();?>eliminarPuesto"><i class="fa fa-window-close text-red"></i> Eliminar</a></li>
                  </ul>
                </li>
              </ul>
            </li>


            <li class="treeview <?php echo $paginaInicio;?>">
              <a href="#"><i class="fa fa-home"></i> Pagina Inicio
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $noticiasEventos;?>"><a href="<?php echo Ruta::ruta_server();?>gestorNoticiasEventos"><i class="fa fa-newspaper-o  text-yellow"></i> Noticias-Eventos</a></li>
              </ul>
            </li>

             <li class="<?php echo $reportes;?>"><a href="<?php echo Ruta::ruta_server();?>reportesRecursosHumanos"><i class="fa fa-download"></i> <span>Reportes</span></a></li>

            <li class="treeview <?php echo $nutriRh;?>">
              <a href="#"><i class="fa fa-pagelines"></i> Nutrifitness
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $participantesNutri;?>"><a href="<?php echo Ruta::ruta_server();?>listaNutrifitness"><i class="fa fa-plus text-green"></i> Participantes</a></li>
                <li class="<?php echo $reportesNutri;?>"><a href="<?php echo Ruta::ruta_server();?>resultadosNutrifitness"><i class="fa fa-info text-blue"></i> Reportes</a></li>
              </ul>
            </li>

          </ul>
        </li>

        <li class="treeview <?php echo $sistemas;?>">
          <a href="#">
            <i class="fa fa-laptop"></i> <span> Sistemas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $conexiones;?>"><a href="<?php echo Ruta::ruta_server();?>conexiones"><i class="fa fa-star"></i> <span>Conexiones</span></a></li>
            <li class="treeview <?php echo $inventario;?>">
              <a href="#"><i class="fa fa-user-circle-o"></i> Usuarios
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $inventarioNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>equipos"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                <li class="<?php echo $inventarioAdministrar;?>"><a href="<?php echo Ruta::ruta_server();?>equiposAdministrar"><i class="fa fa-info text-blue"></i> Administrar</a></li>

              </ul>
            </li>
              <li class="<?php echo $software;?>"><a href="<?php echo Ruta::ruta_server();?>software"><i class="fa fa-database" aria-hidden="true"></i>Biblioteca software</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-chrome"></i> <span> GIRO </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li class="<?php echo $giro;?>"><a href="<?php echo Ruta::ruta_server();?>giro"><i class="fa fa-database"></i> <span>Consultas</span></a></li>
                <?php if($_SESSION['identificador'] == 168): ?>
                  <li><a href="<?php echo Ruta::ruta_server();?>evaluaciones"><i class="fa fa-tasks" aria-hidden="true"></i>Evaluaciones</a></li>
                <?php endif; ?>
          </ul>
        </li>


        <li class="treeview <?php echo $moduloTickets;?>">
          <a href="#">
            <i class="fa fa-ticket"></i> <span> Tickets </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?php echo $tickets;?>"><a href="<?php echo Ruta::ruta_server();?>tickets-soporte"><i class="fa fa-ticket text-green"></i> <span>Usuario Tickets</span></a></li>
          <li class="<?php echo $ticketsAdministrador;?>"><a href="<?php echo Ruta::ruta_server();?>tickets-administrador"><i class="fa fa-ticket" style="color:#f39c12"></i> <span>Control tickets</span></a></li>
          <!--<li class=""><a href="ticketNuevo"><i class="fa fa-ticket text-green"></i> <span>Tickets old</span></a></li>-->
          <!--<li class=""><a href="ticket"><i class="fa fa-ticket" style="color:rgb(14, 124, 155);"></i> <span>Tickets Administrador old</span></a></li>-->
          </ul>
        </li>

      
        <li class="treeview <?php echo $eventos;?>">
          <a href="#">
            <i class="fa fa-bullhorn"></i> <span> Eventos </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php echo $cursos;?>"><a href="<?php echo Ruta::ruta_server();?>cursos"><i class="fa fa-play text-red" aria-hidden="true"></i>Cursos</a></li>
              <li class="<?php echo $nutrifitness;?>"><a href="<?php echo Ruta::ruta_server();?>nutrifitness"><i class="fa fa-pagelines text-green"></i>Nutrifitness</a></li>
              <?php if($_SESSION['identificador'] == 168):?>
                <li class="<?php echo $reconocimientos;?>"><a href="<?php echo Ruta::ruta_server();?>reconocimientos"><i class="fa fa-star" style="color:rgb(14, 124, 155);"></i> <span>Reconocimiento</span></a></li>
              <?php endif; ?>
          </ul>
        </li>

     
        <li class="treeview <?php echo $controlOperaciones;?>">
          <a href="#">
            <i class="fa fa-gg"></i> <span>Control de operaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">


            <li class="treeview <?php echo $moduloNominas;?>">
              <a href="#"><i class="fa fa-dollar"></i> Control de nóminas
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $nominas;?>"><a href="<?php echo Ruta::ruta_server();?>nominas"><i class="fa fa-dot-circle-o" style="color:#FC1F00 "></i> <span>Nominas</span></a></li>
                <li class="<?php echo $finanzas;?>"><a href="<?php echo Ruta::ruta_server();?>finanzas"><i class="fa fa-dot-circle-o" style="color:#E57E10"></i> <span>Finanzas</span></a></li>
                <li class="<?php echo $facturacion;?>"><a href="<?php echo Ruta::ruta_server();?>facturacion"><i class="fa fa-dot-circle-o" style="color:#811363 "></i> <span>Facturación</span></a></li>
                <li class="<?php echo $tesoreria;?>"><a href="<?php echo Ruta::ruta_server();?>tesoreria"><i class="fa fa-dot-circle-o text-green"></i> <span>Tesoreria</span></a></li>
                <li class="<?php echo $liberacion;?>"><a href="<?php echo Ruta::ruta_server();?>liberacion"><i class="fa fa-dot-circle-o" style="color:rgb(14, 124, 155);"></i> <span>Tabla de liberación</span></a></li>
              </ul>
            </li>


            <li class="<?php echo $empresas;?>"><a href="<?php echo Ruta::ruta_server();?>empresas"><i class="fa fa-cubes"></i> <span>Control de empresas</span></a></li>
            <!--<li class="<?php echo $clientes;?>"><a href="<?php echo Ruta::ruta_server();?>clientes"><i class="fa fa-universal-access"></i> <span>Control de clientes</span></a></li>-->
            <!--<li class="<?php echo $costos;?>"><a href="<?php echo Ruta::ruta_server();?>costos"><i class="fa fa-calculator"></i> <span>Control de costos</span></a></li>-->
            <!--<li class="<?php echo $conciliacion;?>"><a href="<?php echo Ruta::ruta_server();?>conciliacion"><i class="fa fa-handshake-o"></i> <span>Conciliación</span></a></li>-->
          </ul>
        </li>


        <li class="treeview <?php echo $proyectos;?>">
          <a href="#">
            <i class="fa fa-code"></i> <span> Proyectos </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="treeview <?php echo $espera;?>">
              <a href="#"><i class="fa fa-angle-up"></i> En espera
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $clientes;?>"><a href="<?php echo Ruta::ruta_server();?>clientes"><i class="fa fa-universal-access"></i> <span>Control de clientes</span></a></li>
                <li class="<?php echo $permisos;?>"><a href="<?php echo Ruta::ruta_server();?>permisos"><i class="fa fa-universal-access"></i> <span>Permisos</span></a></li>
              </ul>
            </li>

            <li class="treeview <?php echo $desarrollo;?>">
              <a href="#"><i class="fa fa-angle-double-up"></i> En desarrollo
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $conciliacion;?>"><a href="<?php echo Ruta::ruta_server();?>conciliacion"><i class="fa fa-handshake-o"></i> <span>Conciliación</span></a></li>
              </ul>
            </li>

            <li class="treeview <?php echo $prueba;?>">
              <a href="#"><i class="fa fa-chevron-up"></i> En prueba
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $costos;?>"><a href="<?php echo Ruta::ruta_server();?>costos"><i class="fa fa-calculator"></i> <span>Control de costos</span></a></li>
              </ul>
            </li>

          </ul>
        </li>


        <li class="<?php echo $tutoriales;?>"><a href="<?php echo Ruta::ruta_server();?>tutoriales"><i class="fa fa-thumbs-o-up"></i> <span>Tutoriales</span></a></li>

        <li class="<?php echo $test;?>"><a href="<?php echo Ruta::ruta_server();?>test"><i class="fa fa-file-text-o"></i> <span>TestMartin</span></a></li>
        
        <hr>
        <li class="<?php echo $ayuda;?>"><a href="<?php echo Ruta::ruta_server();?>linea-ayuda"><i class="fa fa-phone"></i><i class="fa fa-commenting" style="margin-left:-9px;"></i> <span>Línea de ayuda</span></a></li>
       

       
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>