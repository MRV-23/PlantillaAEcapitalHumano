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
        <li><a href="<?php echo Ruta::ruta_server();?>inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <?php if($_SESSION['identificador'] == 357): ?>
          <li><a href="<?php echo Ruta::ruta_server();?>gestorNoticiasEventos"><i class="fa fa-newspaper-o"></i> <span>Gestores</span></a></li>
          <li><a href="<?php echo Ruta::ruta_server();?>resultadosNutrifitness"><i class="fa fa-newspaper-o"></i> <span>Reportes</span></a></li>

        <?php endif; ?>
        <!--<li><a href="<?php echo Ruta::ruta_server();?>resultados"><i class="fa fa-upload"></i> <span>Cargar resultados</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>