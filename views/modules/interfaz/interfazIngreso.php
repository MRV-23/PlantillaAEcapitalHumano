<!--=====================================
FORMULARIO DE INGRESO         
======================================-->
<div class="backIngreso">
	<form method="post" class="formIngreso" id="formIngreso">
		<h1 class="tituloFormIngreso">Inicio de sesión</h1>
		<div class="inputWhitIcon inputIconBg"><input class="form-control formIngreso inputEstilo" type="text" placeholder="Nombre de usuario" name="usuarioIngreso" id="usuarioIngreso" autocomplete='off' required><i class="fa fa-user"></i></div> 
		<div class="inputWhitIcon inputIconBg inputIconBg2"><input class="form-control formIngreso inputEstilo" type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso" required><i class="fa fa-lock"></i><span class="fa fa-eye verPass"></span></div>
		<?php
			if (isset($_COOKIE['userActive']) && isset($_COOKIE['passActive'])) {
				$_POST["usuarioIngreso"]=$_COOKIE['userActive'];
				$_POST["passwordIngreso"]=$_COOKIE['passActive'];
			} 

			if (isset($_COOKIE['configColorScreen'])) {
				unset($_COOKIE['configColorScreen']);
				setcookie('configColorScreen', null, time()-3600);
			} 
			if (isset($_COOKIE['configSideLeft'])) {
				unset($_COOKIE['configSideLeft']);
				setcookie('configSideLeft', null, time()-3600);
			} 
			if (isset($_COOKIE['configScreenSize'])) {
				unset($_COOKIE['configScreenSize']);
				setcookie('configScreenSize', null, time()-3600);
			} 
			if (isset($_COOKIE['hiSystem'])) {
				unset($_COOKIE['hiSystem']);
				setcookie('hiSystem', null, time()-3600);
			} 
			$ingreso = new Ingreso();
			if(isset($_SESSION['captcha_text']))
				$ingreso->captcha = $_SESSION['captcha_text'];
			else
				session_destroy();
			$ingreso -> ingresoController();
			echo '<div class="text-left formularioInicio" style="color:#fff;cursor:pointer;"><u>No recuerdo mi contraseña</u></div><br>';
			//echo '<div class="alert alert-info">Este sitio no funciona correctamente con Internet Explorer</div>';	
		?>
		
        <input class="botonSesion" id="iniciarSesion" name='iniciarSesion'type="submit" value="Iniciar">
        <h1 class="lema"><i class="fa fa-globe"></i> Asesores Empresariales!</h1>
		<p class="derechos"> Todos los Derechos Reservados ©2020 </p>
    </form>
</div>
<!--====  Fin de FORMULARIO DE INGRESO  ====-->

       
    