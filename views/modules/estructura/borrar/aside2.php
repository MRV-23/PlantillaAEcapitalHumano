<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li><a href="<?php echo Ruta::ruta_server();?>inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li><a href="<?php echo Ruta::ruta_server();?>correos"><i class="fa fa-address-book"></i> <span>Agenda</span></a></li>

       <!-- <li><a href="<?php echo Ruta::ruta_server();?>paqueteria"><i class="fa fa-truck"></i> <span>Paqueteria</span></a></li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i> <span> Paqueteria</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="<?php echo Ruta::ruta_server();?>paqueteriaCaptura"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                <li><a href="<?php echo Ruta::ruta_server();?>paqueteriaRevision"><i class="fa fa-info text-blue"></i> Administrar</a></li>
          </ul>
        </li>
      



        <li><a href="<?php echo Ruta::ruta_server();?>solicitudes"><i class="fa fa-file-text-o"></i> <span>Solicitudes</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Recursos Humanos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-user-circle-o"></i> Personal
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Ruta::ruta_server();?>usuarios"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                <li><a href="<?php echo Ruta::ruta_server();?>usuariosAdministrar"><i class="fa fa-info text-blue"></i> Administrar</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#"><i class="fa fa-building"></i> Sucursales
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-building-o"></i> Sucursal
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Ruta::ruta_server();?>sucursales"><i class="fa fa-plus text-green"></i> Nueva</a></li>
                    <li><a href="<?php echo Ruta::ruta_server();?>sucursalesAdministrar"><i class="fa fa-info text-blue"></i> Administrar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-server"></i> Departamento
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Ruta::ruta_server();?>departamento"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                    <li><a href="<?php echo Ruta::ruta_server();?>vincularDepartamento"><i class="fa fa-link text-yellow"></i> Vincular</a></li>
                    <li><a href="<?php echo Ruta::ruta_server();?>eliminarDepartamento"><i class="fa fa-window-close text-red"></i> Eliminar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-th"></i> Puesto
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Ruta::ruta_server();?>puesto"><i class="fa fa-plus text-green"></i> Nuevo</a></li>
                    <li><a href="<?php echo Ruta::ruta_server();?>vincularPuesto"><i class="fa fa-link text-yellow"></i> Vincular</a></li>
                    <li><a href="<?php echo Ruta::ruta_server();?>eliminarPuesto"><i class="fa fa-window-close text-red"></i> Eliminar</a></li>
                  </ul>
                </li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#"><i class="fa fa-home"></i> Pagina Inicio
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Ruta::ruta_server();?>gestorNoticiasEventos"><i class="fa fa-newspaper-o  text-yellow"></i> Noticias-Eventos</a></li>
              </ul>
            </li>


          </ul>
        </li>

        <li><a href="<?php echo Ruta::ruta_server();?>giro"><i class="fa fa-chrome"></i> <span>Consultas GIRO</span></a></li>
        <li><a href="<?php echo Ruta::ruta_server();?>tutoriales"><i class="fa fa-youtube-play"></i> <span>Tutoriales</span></a></li>
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>