<?php
include_once "configuracionesMenu.php";
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
     <!-- <form action="#" method="get" class="sidebar-form">
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

        <li style="margin-top:3px;"></li>
        <li class="<?php echo $inicio;?>"><a href="<?php echo Ruta::ruta_server();?>inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li class="<?php echo $agenda;?>"><a href="<?php echo Ruta::ruta_server();?>correos"><i class="fa fa-address-book"></i> <span>Agenda Empresarial</span></a></li>


        <?php if(AccesoReclutamiento::perteneceReclutamiento($_SESSION['identificador'])): ?>
          <li class="<?php echo $personalNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>usuarios"><i class="fa fa-user"></i>Personal Nuevo</a></li>
        <?php endif;?>

        <?php  if(AccesoRHespecial::pertenece($_SESSION['identificador'],true)): ?>
          <li class="<?php echo $solicitudes;?>"><a href="<?php echo Ruta::ruta_server();?>solicitudes"><i class="fa fa-file-text-o"></i> <span>Solicitudes</span></a></li>
          <li class="treeview <?php echo $rh;?>">
            <a href="#">
              <i class="fa fa-user"></i> <span>Recursos Humanos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php echo $personalNuevo;?>"><a href="<?php echo Ruta::ruta_server();?>usuarios"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                <li class="<?php echo $personalAdministrar;?>"><a href="<?php echo Ruta::ruta_server();?>usuariosAdministrar"><i class="fa fa-info text-blue"></i> Administrar</a></li>
                <li class="<?php echo $reportes;?>"><a href="<?php echo Ruta::ruta_server();?>reportesRecursosHumanos"><i class="fa fa-download"></i> <span>Reportes</span></a></li> 
            </ul>
          </li>
        <?php endif;?>

         <?php if(AccesoNoticias::perteneceNoticias($_SESSION['identificador'])): ?>
            <li class="<?php echo $noticiasEventos;?>"><a href="<?php echo Ruta::ruta_server();?>gestorNoticiasEventos"><i class="fa fa-newspaper-o"></i> Noticias-Eventos</a></li>
        <?php endif;?>
       

        <?php if(AccesoSoporte::perteneceAsoporte($_SESSION['identificador'])): ?>
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
          </ul>
        </li>
        <?php else:?>
        <li class="<?php echo $tickets;?>"><a href="<?php echo Ruta::ruta_server();?>tickets-soporte"><i class="fa fa-ticket"></i> <span>Tickets</span></a></li>
        <?php endif;?>
  
        
        <?php if(AccesoSoporte::perteneceAsoporte($_SESSION['identificador'])): ?> 
          <li class="<?php echo $giro;?>"><a href="<?php echo Ruta::ruta_server();?>giro"><i class="fa fa-chrome"></i> <span>Consultas GIRO</span></a></li>
          <li class="treeview <?php echo $sistemas;?>">
            <a href="#">
              <i class="fa fa-laptop"></i> <span> Sistemas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
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
        <?php endif;?>

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
    
       
            <li class="treeview <?php echo $eventos;?>">
              <a href="#">
                <i class="fa fa-bullhorn"></i> <span> Eventos </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $cursos;?>"><a href="<?php echo Ruta::ruta_server();?>cursos"><i class="fa fa-play text-red" aria-hidden="true"></i>Cursos</a></li>
                <?php if(AccesoNutrifitness::pertenecePrograma($_SESSION['identificador'])): ?>
                    <li class="<?php echo $nutrifitness;?>"><a href="<?php echo Ruta::ruta_server();?>nutrifitness"><i class="fa fa-pagelines text-blue"></i>Nutrifitness</a></li>
                <?php endif;?>
              </ul>
            </li>

      
      
       <?php if(GrupoNominas::pertenece2($_SESSION['identificador']) || GrupoFinanzas::pertenece($_SESSION['identificador']) || GrupoTesoreria::pertenece($_SESSION['identificador']) || GrupoLiberacion::pertenece($_SESSION['identificador']) || GrupoEmpresas::pertenece($_SESSION['identificador'])): ?>
        <li class="treeview <?php echo $controlOperaciones;?>">
          <a href="#">
            <i class="fa fa-gg"></i> <span>Control de operaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <?php if(GrupoNominas::pertenece2($_SESSION['identificador']) || GrupoFinanzas::pertenece($_SESSION['identificador']) || GrupoTesoreria::pertenece($_SESSION['identificador']) || GrupoLiberacion::pertenece($_SESSION['identificador']) || GrupoFacturacion::pertenece($_SESSION['identificador'])): ?>
            <li class="treeview <?php echo $moduloNominas;?>">
              <a href="#"><i class="fa fa-dollar"></i> Control de nóminas
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <?php if(GrupoNominas::pertenece2($_SESSION['identificador'])): ?>
                      <li class="<?php echo $nominas;?>"><a href="<?php echo Ruta::ruta_server();?>nominas"><i class="fa fa-dollar" style="color:#FC1F00 "></i> <span>Nominas</span></a></li>
                  <?php endif; ?>

                  <?php if(GrupoFinanzas::pertenece($_SESSION['identificador'])): ?>
                      <li class="<?php echo $finanzas;?>"><a href="<?php echo Ruta::ruta_server();?>finanzas"><i class="fa fa-dollar" style="color:#E57E10"></i> <span>Finanzas</span></a></li>
                  <?php endif; ?>
                  
                  <?php if(GrupoFacturacion::pertenece($_SESSION['identificador'])): ?>
                    <li class="<?php echo $facturacion;?>"><a href="<?php echo Ruta::ruta_server();?>facturacion"><i class="fa fa-dot-circle-o" style="color:#811363 "></i> <span>Facturación</span></a></li>
                  <?php endif; ?>

                  <?php if(GrupoTesoreria::pertenece($_SESSION['identificador'])): ?>
                      <li class="<?php echo $tesoreria;?>"><a href="<?php echo Ruta::ruta_server();?>tesoreria"><i class="fa fa-dollar text-green"></i> <span>Tesoreria</span></a></li>
                  <?php endif; ?>

                  <?php if(GrupoLiberacion::pertenece($_SESSION['identificador'])): ?>
                      <li class="<?php echo $liberacion;?>"><a href="<?php echo Ruta::ruta_server();?>liberacion"><i class="fa fa-dollar" style="color:rgb(14, 124, 155);"></i> <span>Tabla de liberación</span></a></li>
                  <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <?php if(GrupoEmpresas::pertenece($_SESSION['identificador'])): ?>
            <li class="<?php echo $empresas;?>"><a href="<?php echo Ruta::ruta_server();?>empresas"><i class="fa fa-cubes"></i> <span>Control de empresas</span></a></li>
          <?php endif;?>  
          
          </ul>
        </li>
        <?php endif;?>

         <?php if($_SESSION['identificador'] == 441): ?>
            <li class="<?php echo $costos;?>"><a href="<?php echo Ruta::ruta_server();?>costos"><i class="fa fa-calculator"></i> <span>Control de costos</span></a></li>
          <?php endif;?>

        <li class="<?php echo $tutoriales;?>"><a href="<?php echo Ruta::ruta_server();?>tutoriales"><i class="fa fa-thumbs-o-up"></i> <span>Tutoriales</span></a></li>
        <?php if($_SESSION['identificador'] == 365): ?>
          <li class="<?php echo $conexiones;?>"><a href="<?php echo Ruta::ruta_server();?>conexiones"><i class="fa fa-star"></i> <span>Conexiones</span></a></li>
        <?php endif;?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>