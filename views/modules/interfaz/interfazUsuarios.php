<!-- =============================================== -->
<?php 
ini_set( "display_errors","0");
if(isset($_POST["actualizarUsuario"])){
    $datos = gestionUsuarios::mostrarActualizarRegistro($_POST["actualizarUsuario"]);
    $jefe = gestionUsuarios::obtenerJefeInmediato($datos["id_usuario"]);
}
$valorAdministrador=Configuraciones::administrador();
?>

  <div class="content-wrapper">
        <form method="POST" id="formularioNuevoUsuario" enctype="multipart/form-data">
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-user-plus icono-encabezado"></i> REGISTRAR USUARIO</h3>
                        </div>
                        <div class="box-body">
                            <div role="tabpanel"> <!--pestañas-->
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active">
                                        <a href="#laboral" aria-controls="laboral" role="tab" data-toggle="tab">Datos laborales</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Datos personales</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#intranet" aria-controls="intranet" role="tab" data-toggle="tab">Intranet</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#emergencia" aria-controls="emergencia" role="tab" data-toggle="tab">Contacto de emergencia</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content" style="margin-top: 1%;">
                                        <div role="tabpanel" class="tab-pane active" id="laboral">
                                            <div class="contenedorUsuario">
                                                <div class="first-div"> 
                                                    <!-- primera fila -->
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <!-- primera columna -->
                                                            <div class="col-md-4">
                                                                <label for="">1.-Nombre:</label>
                                                                <i class="fa fa-check-circle text-green"></i>
                                                                <input  class="form-control textoMay" type="text" id="nombreUsuarioAgregar" value="<?php echo $datos["nombre"] ?>" name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" autocomplete="off" title="Sólo letras y espacios" required>
                                                            </div>
                                                            <!-- segunda columna -->
                                                            <div class="col-md-4">
                                                                <label for="">2.-Apellido Paterno:</label>
                                                                <i class="fa fa-check-circle text-green"></i>
                                                                <input  class="form-control textoMay" type="text" id="paternoUsuarioAgregar" name="paterno" value="<?php echo $datos["paterno"] ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" autocomplete="off" title="Sólo letras y espacios" required>
                                                            </div>
                                                            <!--tercera columna -->
                                                            <div class="col-md-4">
                                                                <label for="">3.-Apellido Materno:</label>
                                                                <i class="fa fa-check-circle text-green"></i>
                                                                <input  class="form-control textoMay" type="text" name="materno" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" value="<?php echo $datos["materno"] ?>"  autocomplete="off" title="Sólo letras y espacios" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- segunda fila -->
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <!-- primera columna -->
                                                            <div class="col-md-4">
                                                                <label for="">4.-Sucursal:</label>
                                                                <i class="fa fa-check-circle text-green"></i>
                                                                <select class="form-control textoMay" name="sucursal" id="sucursalUsuario" required>
                                                                    <?php
                                                                    echo'<option></option>';
                                                                    $sucursales= new gestionSucursales();
                                                                    $sucursales -> vistaSucursalesController($datos["id_sucursal"]);
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <!-- segunda columna -->
                                                            <div class="col-md-4">
                                                                <label for="">5.-Departamento:</label>
                                                                <i class="fa fa-check-circle text-green"></i>
                                                                <div id="targetDepartamento">
                                                                    <?php if(isset($_POST["actualizarUsuario"])): ?>
                                                                        <?php
                                                                            $actualizarDepto = new gestionSucursalesDepartamentos();
                                                                            $actualizarDepto->actualizarDepartamentosController($datos["id_sucursal"],$datos["id_departamento"]);
                                                                        ?> 
                                                                    <?php else: ?>
                                                                        <select class="form-control" name="departamentoUsuario" id="departamentoUsuario" readonly required>
                                                                            <option value=""></option>
                                                                        </select>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <!-- tercera columna -->    
                                                            <div class="col-md-4">	
                                                                <label for="">6.-Puesto:</label>
                                                                <i class="fa fa-check-circle text-green"></i>
                                                                <div id="targetPuesto">
                                                                    <?php if(isset($_POST["actualizarUsuario"])): ?>
                                                                        <?php
                                                                            $actualizarDepto = new gestionSucursalesDepartamentos();
                                                                            $actualizarDepto->actualizarPuestoController($datos["id_sucursal"],$datos["id_departamento"],$datos["id_puesto"]);
                                                                        ?> 
                                                                    <?php else: ?>
                                                                        <select class="form-control" name="puestoUsuario" id="puestoUsuario" readonly required>
                                                                            <option value=""></option>
                                                                        </select>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- tercerafila fila -->
                                                    <div class="form-group">
                                                    <div class="row">
                                                        <!-- primera columna -->
                                                        <div class="col-md-4">
                                                            <label for="">7.-Fecha de ingreso:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <input  class="form-control" type="date" name="fechaIngreso" value="<?php echo $datos["fecha_ingreso"] ?>" required>
                                                        </div>
                                                        <!-- segunda columna -->
                                                        <div class="col-md-8">
                                                            <label for="">7-A.-Jefe Inmediato:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <select class="form-control" name="jefeInmediato" required>
                                                                <?php
                                                                    echo'<option></option>';
                                                                    gestionUsuarios::jefeInmediato($jefe);
                                                                ?>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div><!-- Fin primer DIV -->
                                                <div class="second-div estilos-centrar">
                                                        <?php if(isset($_POST["actualizarUsuario"])): ?>
                                                            <?php if(!empty($datos["imagen"])): ?>
                                                                <img id="imgenSalida" src="views/imagenes-usuarios/<?php echo $datos["imagen"]?>" alt="views/imagenes-usuarios/<?php echo $datos["imagen"]?>" height="140" width="110">
                                                            <?php else: ?>
                                                                <img id="imgenSalida" src="views/img/user.png" alt="views/img/user.png" height="140" width="110">
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <img id="imgenSalida" src="views/img/user.png" alt="views/img/user.png" height="140" width="110">
                                                        <?php endif; ?>
                                                      

                                                        <div class="contenedoFotografia">
                                                            <!--<br>
                                                            <div class="botonImagen">
                                                                <input type="file" class="botonOcultar" id="imagenNuevoUsuario" name="imagenNuevoUsuario" accept="image/*">
                                                                <span>Imagen</span>  
                                                            </div>-->
                                                            <br>
                                                            <div class="form-group">
                                                                <div id="targetAdjuntar">
                                                                    <div class="btn btn-default btn-file">
                                                                        <i class="fa fa-paperclip"></i> Imagen
                                                                        <input type="file" id="imagenNuevoUsuario" name="imagenNuevoUsuario" accept="image/*">
                                                                    </div>
                                                                    <p class="help-block">Max. 2MB</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div><!-- Fin segundo DIV -->
                                            </div><!-- Fin contenedorusuarios -->
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="personal">
                                                <!-- primera fila -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <!-- primera columna -->
                                                        <div class="col-md-4">
                                                            <label for="">8.-Curp:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <span id="curpRestante"><?php echo $valor = isset($datos["curp"]) ? '(0 caracteres restantes)' : '(18 caracteres restantes)' ;?></span>
                                                            <input  class="form-control textoMay curp" type="text" name="curp" autocomplete="off" placeholder="ej. BADD110313HCMLNS09" value="<?php echo $datos["curp"] ?>" maxlength="18" pattern="([0-9a-zA-Z]){18}" title ="Deben ser 18 caracteres alfanuméricos." id="campoCurp" required>
                                                        </div>
                                                        <!-- segunda columna -->
                                                        <div class="col-md-4">
                                                            <label for="">9.-RFC:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <span id="rfcRestante"><?php echo $valor = isset($datos["rfc"]) ? '(0 caracteres restantes)' : '(13 caracteres restantes)' ;?></span>
                                                            <input  class="form-control textoMay rfc" type="text" name="rfc" autocomplete="off" placeholder="ej. MELM8305281H0" id="campoRfc" value="<?php echo $datos["rfc"] ?>" minlength="12" maxlength="13" pattern="([0-9a-zA-Z]){13}" title ="13 caracteres alfanuméricos." required>
                                                        </div>
                                                        <!-- tercera columna -->    
                                                        <div class="col-md-4">
                                                            <label for="">10.-NSS:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <span id="nssRestante"><?php echo $valor = isset($datos["nss"]) ? '(0 digitos restante)' : '(11 dígitos restantes)' ;?></span>
                                                            <input  class="form-control textoMay nss" type="text" name="seguroSocial" id="seguroSocial" placeholder="ej. 72795608040"  value="<?php echo $datos["nss"] ?>" maxlength="11" pattern="([0-9]){11}" title ="Deben ser 11 dígitos." autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- segunda fila -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <!-- primera columna -->
                                                        <div class="col-md-4">
                                                            <label for="">11.-Lugar de nacimiento (Estado):</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <select class="form-control textoMay" name="lugarNacimiento" id="lugarNacimiento" required>
                                                                <?php
                                                                    echo'<option></option>';
                                                                    $estados=new gestionEstados();
                                                                    $estados->vistaEstadosController($datos["estado_nacimiento"]);
                                                                ?>  
                                                            </select>
                                                        </div>
                                                        <!-- segunda columna -->
                                                        <div class="col-md-4">
                                                        <label for="">12.-Lugar de nacimiento (Municipio):</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                            <div id="target2">
                                                                <input  class="form-control" type="text" value="<?php echo $datos["municipio_nacimiento"] ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" name="municipios" readonly required>
                                                            </div>
                                                        </div>
                                                        <!-- tercera columna -->    
                                                        <div class="col-md-4">
                                                            <label for="">13.-Fecha de nacimiento:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                           <input  class="form-control" type="date" value="<?php echo $datos["fecha_nacimiento"] ?>" name="fechaNacimiento" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tercerafila fila -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <!-- primera columna -->
                                                        <div class="col-md-4">
                                                        <label for="">14.-Estado civil:</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                            <select class="form-control textoMay" name="estadoCivil" required>
                                                                <option value=""></option>
                                                                <option value="1" <?php if ($datos["estado_civil"]=="1") echo "selected='selected'" ?>>Soltero/a</option>
                                                                <option value="2" <?php if ($datos["estado_civil"]=="2") echo "selected='selected'" ?>>Casado/a</option>
                                                                <option value="3" <?php if ($datos["estado_civil"]=="3") echo "selected='selected'" ?>>Unión libre</option>
                                                                <option value="4" <?php if ($datos["estado_civil"]=="4") echo "selected='selected'" ?>>Divorciado/a</option>
                                                                <option value="5" <?php if ($datos["estado_civil"]=="5") echo "selected='selected'" ?>>Viudo/a</option>     
                                                            </select>
                                                        </div>
                                                        <!-- segunda columna -->
                                                        <div class="col-md-4">
                                                            <label for="">15.-Nivel de estudios:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <select class="form-control textoMay" name="escolaridad" required>
                                                                <option value=""></option>
                                                                <option value="1" <?php if ($datos["estudios"]=="1") echo "selected='selected'" ?>>Primaria</option>
                                                                <option value="2" <?php if ($datos["estudios"]=="2") echo "selected='selected'" ?>>Secundaria</option>
                                                                <option value="3" <?php if ($datos["estudios"]=="3") echo "selected='selected'" ?>>Bachillerato</option>
                                                                <option value="4" <?php if ($datos["estudios"]=="4") echo "selected='selected'" ?>>Licenciatura/Ingeniería</option>
                                                                <option value="5" <?php if ($datos["estudios"]=="5") echo "selected='selected'" ?>>Maestría</option>
                                                                <option value="6" <?php if ($datos["estudios"]=="6") echo "selected='selected'" ?>>Doctorado</option>
                                                            </select>
                                                        </div>
                                                        <!-- tercera columna -->    
                                                        <div class="col-md-4">
                                                            <label for="">16.-Sexo:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <br>
                                                            <input type="radio" id="sexoFemenino" name="genero" class="with-font" value="F"  <?php if ($datos["genero"]=="F") echo "checked" ?>><label class="sexoUsuario" for="sexoFemenino">Femenino</label>
                                                            <input type="radio" id="sexoMasculino" name="genero" class="with-font" value="M" <?php if ($datos["genero"]=="M") echo "checked" ?>><label class="sexoUsuario" for="sexoMasculino">Masculino</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <!-- tercerafila fila -->
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <!-- primera columna -->
                                                        <div class="col-md-4">
                                                        <label for="">17.-Hijos:</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                            <select class="form-control textoMay" name="hijos" required>
                                                                <option value="0" <?php if ($datos["hijos"]=="0") echo "selected='selected'" ?>>NINGUNO</option>
                                                                <option value="1" <?php if ($datos["hijos"]=="1") echo "selected='selected'" ?>>1</option>
                                                                <option value="2" <?php if ($datos["hijos"]=="2") echo "selected='selected'" ?>>2</option>
                                                                <option value="3" <?php if ($datos["hijos"]=="3") echo "selected='selected'" ?>>3</option>
                                                                <option value="4" <?php if ($datos["hijos"]=="4") echo "selected='selected'" ?>>4</option>
                                                                <option value="5" <?php if ($datos["hijos"]=="5") echo "selected='selected'" ?>>5</option>
                                                                <option value="6" <?php if ($datos["hijos"]=="6") echo "selected='selected'" ?>>6</option>
                                                                <option value="7" <?php if ($datos["hijos"]=="7") echo "selected='selected'" ?>>7</option>
                                                                <option value="8" <?php if ($datos["hijos"]=="8") echo "selected='selected'" ?>>8</option> 
                                                                <option value="9" <?php if ($datos["hijos"]=="9") echo "selected='selected'" ?>>MÁS</option> 
                                                            </select>
                                                        </div>
                                                        <!-- segunda columna -->
                                                        <div class="col-md-4">
                                                            <label for="">18.-Domicilio actual (Calle y número):</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <input  class="form-control textoMay" type="text" name="domicilio" value="<?php echo $datos["domicilio"] ?>" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s-]{2,}" title="Sólo números, letras, espacios y guiones." autocomplete="off" required>
                                                        </div>
                                                        <!-- tercera columna -->    
                                                        <div class="col-md-4">
                                                            <label for="codigoPostal">19.-Código postal:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <input  class="form-control codigoPostal" type="text" name="codigoPostal" id="codigoPostal" value="<?php echo $datos["codigo_postal"]?>" pattern="[0-9]{5}" title="Debe contener 5 digitos" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- cuarta fila -->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <!-- primera columna -->
                                                        <div class="col-md-4">
                                                            <label for="">20.-Municipio:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <input  class="form-control textoMay" type="text" name="municipio"  value="ZAPOPAN" id="municipio" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.]{2,}"  >
                                                        </div>
                                                        <!-- segunda columna -->
                                                        <div class="col-md-4">
                                                            <label for="">21.-Colonia:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <div id="recargarColonia">
                                                               
                                                                    <select class="form-control textoMay" id="colonia" name="colonia" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s.]{2,}"  >
                                                                        <option value='1'>chapalita</option>
                                                                    </select>
                                                             
                                                            </div>
                                                        </div>
                                                        <!-- tercera columna -->    
                                                        <div class="col-md-4">
                                                            <label for="">22.-Infonavit:</label>
                                                            <i class="fa fa-check-circle text-green"></i>
                                                            <select class="form-control textoMay" name="infonavit" requerid>
                                                                    <option value="1"<?php if ($datos["infonavit_tiene"]=="1") echo "selected='selected'" ?>>No cuenta con credito</option>
                                                                    <option value="2"<?php if ($datos["infonavit_tiene"]=="2") echo "selected='selected'" ?>>Sí cuenta con credito</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tercerafila fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                    <!-- primera columna -->
                                                    <div class="col-md-4">
                                                        <label for="">23.-Fonacot:</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                        <select class="form-control textoMay" name="fonacot" requerid>
                                                                <option value="1" <?php if ($datos["fonacot_tiene"]=="1") echo "selected='selected'" ?>>No cuenta con credito</option>
                                                                <option value="2" <?php if ($datos["fonacot_tiene"]=="2") echo "selected='selected'" ?>>Sí cuenta con credito</option>
                                                        </select>
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">24.-Teléfono móvil:</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                        <br>
                                                        <input type="input" name="usuarioMovil" class="form-control celular" value="<?php echo $datos["telefono_movil"] ?>" pattern="[0-9()\s-]{14}" title="debe contener 10 dígitos" placeholder="ej. 11-11-11-11-11" required>                                                 
                                                    </div>
                                                    <!-- tercera columna -->    
                                                    <div class="col-md-4">
                                                        <label for="">25.-Teléfono fijo (incluye LADA):</label>
                                                        <br>
                                                        <input type="input" name="usuarioFijo" class="form-control telefonoFijo" value="<?php echo $datos["telefono_fijo"] ?>" pattern="[0-9()\s-]{14}" title="debe contener 10 dígitos" placeholder="ej. (33) 1111-1111">
                                                    </div>
                                                </div>
                                                </div>
                                        </div>

                                         <div role="tabpanel" class="tab-pane" id="intranet">
                                                 <!-- primera fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">26.-Nombre de usuario:</label>
                                                        <i class="fa fa-shield  text-blue" aria-hidden="true"></i> 
                                                        <input  class="form-control" type="text" id="nickUsuarioAgregar" name="nickUsuarioAgregar" value="<?php echo $datos["usuario"] ?>" autocomplete="off" title="puede contener caracteres alfanuméricos, guiones y guiones bajos" pattern="[a-zA-Z0-9-_]{2,}" <?php if($_SESSION["identificador2"] != $valorAdministrador) echo 'readonly' ?>>
                                                    </div>
                                                </div>
                                                </div>

                                                <!-- segunda fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">27.-Correo electrónico:</label>
                                                        <i class="fa fa-shield  text-blue" aria-hidden="true"></i> 
                                                        <input  class="form-control" type="input" id="correoUsuario" name="correo" title="Ej. usuario@asesoresempresariales.com.mx" value="<?php echo $datos["correo"] ?>" pattern="[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" placeholder="usuario@asesoresempresariales.com.mx" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- tercera fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">28.-Contraseña:</label>
                                                        <i class="fa fa-shield  text-blue" aria-hidden="true"></i> 
                                                        <input class="form-control" type="text" id="passUsuarioAgregar" name="contrasena" title="debe contener de 8 a 12 caracteres, mínimo 1 mínuscula,1 mayúscula y 1 número" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" autocomplete="off" readonly>
                                                    </div>
                                                </div>
                                                </div>

                                                 <!-- tercera fila -->
                                                 <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">29.-Permisos de acceso:</label>
                                                        <i class="fa fa-shield  text-blue" aria-hidden="true"></i> 
                                                        <select class="form-control textoMay" name="tipoUsuario" <?php if($_SESSION["identificador2"] != $valorAdministrador) echo 'readonly' ?>>
                                                            <?php if($_SESSION["identificador2"] == $valorAdministrador): ?>
                                                                <option value="1" <?php if ($datos["tipo_acceso"]=="1") echo "selected='selected'" ?>>Estandar</option>
                                                                <option value="2" <?php if ($datos["tipo_acceso"]=="2") echo "selected='selected'" ?>>Recepción</option>
                                                                <option value="3" <?php if ($datos["tipo_acceso"]=="3") echo "selected='selected'" ?>>Jefatura</option>
                                                                <option value="4" <?php if ($datos["tipo_acceso"]=="4") echo "selected='selected'" ?>>Gerencia</option>
                                                                <option value="5" <?php if ($datos["tipo_acceso"]=="5") echo "selected='selected'" ?>>Contraloria</option>
                                                                <option value="6" <?php if ($datos["tipo_acceso"]=="6") echo "selected='selected'" ?>>Administrador</option>
                                                            <?php else: ?>
                                                                <option value="<?php echo $datos["tipo_acceso"];?>" <?php echo "selected='selected'" ?>><?php echo Datos::traducirUsuariosModel($datos["tipo_acceso"]); ?></option>
                                                            <?php endif ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>
                                         </div>

                                         <div role="tabpanel" class="tab-pane" id="emergencia">
                                                
                                                 <!-- primera fila -->
                                                 <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">30.-Tipo de sangre:</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                        <select class="form-control textoMay" name="sangre" required>
                                                            <option value=""></option>
                                                            <option value="O+" <?php if ($datos["sangre"]=="O+") echo "selected='selected'" ?>>O POSITIVO</option>
                                                            <option value="O-" <?php if ($datos["sangre"]=="O-") echo "selected='selected'" ?>>O NEGATIVO</option>
                                                            <option value="A+" <?php if ($datos["sangre"]=="A+") echo "selected='selected'" ?>>A POSITIVO</option>
                                                            <option value="A-" <?php if ($datos["sangre"]=="A-") echo "selected='selected'" ?>>A NEGATIVO</option>
                                                            <option value="B+" <?php if ($datos["sangre"]=="B+") echo "selected='selected'" ?>>B POSITIVO</option>
                                                            <option value="B-" <?php if ($datos["sangre"]=="B-") echo "selected='selected'" ?>>B NEGATIVO</option>
                                                            <option value="AB+" <?php if ($datos["sangre"]=="AB+") echo "selected='selected'" ?>>AB POSITIVO</option>
                                                            <option value="AB-" <?php if ($datos["sangre"]=="AB-") echo "selected='selected'" ?>>AB NEGATIVO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>
                                                  <!-- primera fila -->
                                                  <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">31.-Alergias:</label>
                                                        <i class="fa fa-check-circle text-green"></i>
                                                        <input  class="form-control textoMay" type="text" name="alergias" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ,.()\s]{2,}" value="<?php if (isset($datos["alergias"])) echo $datos["alergias"]; else echo "NINGUNA"; ?>" autocomplete="off" title="Sólo letras, comas, puntos, parentesis y espacios" required>
                                                    </div>
                                                </div>
                                                </div>

                                                <!-- primera fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">32.-Nombre del contacto:</label>
                                                        <input  class="form-control textoMay" type="text" name="contacto" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" value="<?php echo $datos["nombre_contacto"] ?>" autocomplete="off" title="Sólo letras y espacios">
                                                    </div>
                                                </div>
                                                </div>

                                                <!-- segunda fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">33.-Parentesco:</label>
                                                        <input  class="form-control textoMay" type="text" name="parentesco" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}" value="<?php echo $datos["parentesco"] ?>" autocomplete="off" title="Sólo letras y espacios">
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- tercera fila -->
                                                <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">34.Teléfono móvil:</label>
                                                        <br>
                                                        <input type="input" name="contactoMovil" class="form-control celular" pattern="[0-9()\s-]{14}" value="<?php echo $datos["contacto_movil"] ?>" title="debe contener 10 dígitos" placeholder="ej. (33) 1111-1111">
                                                    </div>
                                                </div>
                                                </div>

                                                 <!-- tercera fila -->
                                                 <div class="form-group">
                                                <div class="row">
                                                <!-- primera columna -->
                                                    <div class="col-md-4">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $datos["id_usuario"] ?>">
                                                    </div>
                                                    <!-- segunda columna -->
                                                    <div class="col-md-4">
                                                        <label for="">35.-Teléfono fijo:</label>
                                                        <br>
                                                        <input type="input" name="contactoFijo" class="form-control telefonoFijo" pattern="[0-9()\s-]{14}" title="debe contener 10 dígitos" value="<?php echo $datos["contacto_fijo"] ?>" placeholder="ej. (33) 1111-1111">
                                                    </div>
                                                </div>
                                                </div>
                                         </div>
                                </div><!-- fin Tab pestañas -->
                            </div><!--fin pestañas-->
                        </div> <!-- /.box-body -->
                
                        <div class="box-footer">
                                <div class="estilos-centrar limpiardiv">
                                    <p class="estilos-izquierda"> <i class="fa fa-check-circle text-green"></i> Campos obligatorios.</p>
                                    <p class="estilos-izquierda"><i class="fa fa-shield  text-blue" aria-hidden="true"></i> Campos proporcionados por el departamento de sistemas.</p>
                                    <button type="submit" id="guardarUsuarioNuevo" class="btn btn-success">Aceptar</button>
                                    <?php if(!isset($_POST["actualizarUsuario"])): ?>
                                        <button type="button" id="formularioCancelarUsuario" class="btn btn-danger">Cancelar</button>  
                                    <?php else: ?>
                                        <a class="btn btn-danger" href="usuarios">Cancelar</a>
                                    <?php endif; ?>
                                </div>
                        </div><!-- /.box-footer-->        
                    </div><!--/ div class="box" -->
                </section>
        </form>
  </div>