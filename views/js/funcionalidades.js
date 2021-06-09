//let ruta_server = window.location.protocol + '//' + window.location.host + '/asesores/';


let formulario = document.getElementById('formularioNuevoUsuario');

$("#formularioNuevoUsuario").submit(function(e) { //guardarUsuarioNuevo
    e.preventDefault(); //no envio el formulario

    swal({
        title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
        text: ' Por favor espere...',
        type: '',
        showConfirmButton: false,
        allowOutsideClick: false
    });

    let datosFormulario = new FormData(formulario); /*for([key,value] of datosFormulario.entries()) console.log(key + ":" + value);*/
    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        //dataType:"json",
        success: function(respuesta) {

            if (respuesta == 1) {
                swal("Verifica que el nombre del empleado sólo tenga letras y espacios", "", "warning");
            } else if (respuesta == 2) {
                swal("Verifica que el apellido paterno del empleado sólo tenga letras y espacios", "", "warning");
            } else if (respuesta == 3) {
                swal("Verifica que el apellido materno del empleado sólo tenga letras y espacios", "", "warning");
            } else if (respuesta == 4) {
                swal("Selecciona una sucursal", "", "warning");
            } else if (respuesta == 5) {
                swal("Selecciona un departamento", "", "warning");
            } else if (respuesta == 6) {
                swal("Selecciona un puesto", "", "warning");
            } else if (respuesta == 7) {
                swal("Captura la fecha de ingreso", "", "warning");
            } else if (respuesta == 8) {
                swal("Verifica que el formato del CURP sea correcto", "", "warning");
            } else if (respuesta == 9) {
                swal("Verifica que el formato del RFC sea correcto", "", "warning");
            } else if (respuesta == 10) {
                swal("Verifica que el formato del NSS sea correcto", "", "warning");
            } else if (respuesta == 11) {
                swal("Selecciona el Estado de nacimiento", "", "warning");
            } else if (respuesta == 12) {
                swal("Selecciona el Municipio de nacimiento", "", "warning");
            } else if (respuesta == 13) {
                swal("Captura la fecha de nacimiento", "", "warning");
            } else if (respuesta == 14) {
                swal("Selecciona el estado civil", "", "warning");
            } else if (respuesta == 15) {
                swal("Selecciona el nivel de estudios", "", "warning");
            } else if (respuesta == 16) {
                swal("Captura el domicilio", "", "warning");
            } else if (respuesta == 17) {
                swal("Captura el código postal", "", "warning");
            } else if (respuesta == 18) {
                swal("Selecciona el municipio donde se encuentra ubicado el domicilio", "", "warning");
            } else if (respuesta == 19) {
                swal("Selecciona la colonia donde se encuentra ubicado el domicilio", "", "warning");
            } else if (respuesta == 20) {
                swal("Selecciona sí cuenta  o no con credito Infonavit", "", "warning");
            } else if (respuesta == 21) {
                swal("Selecciona sí cuenta  o no con credito Fonacot", "", "warning");
            } else if (respuesta == 22) {
                swal("Captura correctamente el telefono móvil a 10 digitos", "", "warning");
            } else if (respuesta == 23) {
                swal("Captura correctamente el telefono fijo a 10 digitos", "", "warning");
            } else if (respuesta == 24) {
                swal("captura el nombre del usuario", "", "warning");
            } else if (respuesta == 25) {
                swal("Captura el correo electrónico del usuario", "", "warning");
            } else if (respuesta == 26) {
                swal("Genera una contraseña para el usuario", "", "warning");
            } else if (respuesta == 27) {
                swal("Selecciona los permisos que el usuario tendra para acceder", "", "warning");
            } else if (respuesta == 28) {
                swal("Verifica que el nombre del contacto sólo tenga letras y espacios", "", "warning");
            } else if (respuesta == 29) {
                swal("Verifica que el parentesco del contacto sólo tenga letras y espacios", "", "warning")
            } else if (respuesta == 30) {
                swal("Captura correctamente el telefono móvil del contacto a 10 digitos", "", "warning");
            } else if (respuesta == 31) {
                swal("Captura correctamente el telefono fijo del contacto a 10 digitos", "", "warning");
            } else if (respuesta == 32) {
                swal("Debes completar la información del contacto de emergencia", "", "warning");
            } else if (respuesta == 33) {
                swal("Captura el nombre del contacto de emergencia", "", "warning");
            } else if (respuesta == 34) {
                swal("Captura el parentesco entre el empleado y el contacto de emergencia", "", "warning");
            } else if (respuesta == 35) {
                swal("Captura al menos un teléfono de contacto", "", "warning");
            } else if (respuesta == 36) {
                swal("El archivo debe ser una imagen en formato .jpg, .jpeg o .png", "", "warning");
            } else if (respuesta == 40) {
                swal("Debes seleccionar el genero", "", "warning");
            } else if (respuesta == 41) {
                swal("Debes seleccionar el número de hijos", "", "warning");
            } else if (respuesta == 42) {
                swal("Debes seleccionar el tipo de sangre", "", "warning");
            } else if (respuesta == 43) {
                swal("Captura los tipos de alergias, en caso de NO tener ninguna especificalo.", "", "warning");
            } else if (respuesta == 37) {
                swal({ type: 'success', title: 'El registro se realizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            formulario.reset();
                            $('#imgenSalida').attr("src", ruta_server + "views/img/user.png");
                            location.href = ruta_server + "usuarios";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 38) {
                swal("Ocurrio un erro, intentelo nuevamente", "", "error");
            } else if (respuesta == 39) {
                swal({ type: 'success', title: 'El registro se actualizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = ruta_server + "usuariosAdministrar";
                        }
                    }).catch(swal.noop);
            } else
                swal(respuesta, "", "error");
        }
    });
});

/****************************************** cargar imagenes ****************************************/


$("#formularioCancelarUsuario").click(function() {
    formulario.reset();
    $('#imgenSalida').attr("src", ruta_server + "views/img/user.png");
});

$('#imagenNuevoUsuario').change(function(e) {
    let file = e.target.files[0];
    let valido = (/\.(?=jpg|png|jpeg)/gi).test(file.name);

    if (!valido) {
        swal("Sólo se permiten imagenes", "Formato: .jpg, .jpeg y .png", "error").catch(swal.noop);
        $('#imagenNuevoUsuario').val('');
        $('#imgenSalida').attr("src", $('#imgenSalida').attr("alt"));
        return;
    }

    let fileSizeLimit = 2; // In MB
    if (file.size > fileSizeLimit * 1024 * 1024) {
        swal("La imagen tiene un tamaño mayor al permitido", "El peso máximo es de 2 MB", "error").catch(swal.noop);
        $('#imagenNuevoUsuario').val('');
        $('#imgenSalida').attr("src", $('#imgenSalida').attr("alt"));
        return;
    }

    let reader = new FileReader();
    reader.onload = fileOnload;
    reader.readAsDataURL(file);
});

function fileOnload(e) {
    var result = e.target.result;
    $('#imgenSalida').attr("src", result);
}

/**************************************USUARIO ADMINISTRAR********************/
/*****************************************************************************/
let mostrar = document.getElementById('target');
let mostrar2 = document.getElementById('target2');
let botonesOpciones = document.getElementById('targetBotones');

$(".mostrarUsuario").click(function() {
    mostrarUsuario($(this).parent().parent().attr("id"));
});

$(".borrarUsuario").click(function() {
    eliminarUsuario($(this).parent().parent().attr("id"));
});

$(".actualizarPassUsuario").click(function() {
    actualizarPassUsuario($(this).parent().parent().attr("id"));
});

/**************Eliminar Usuario*******************/
function eliminarUsuario(e) {
    let usuario = e;
    swal({
        title: '¿Estas seguro de borrar el registro?',
        text: "El registro sera eliminado de empleados activos y se deberá llenar una entrevista de salida",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!'
    }).then((result) => {
        if (result) {
            
            let eliminarRegistro = new FormData();
            eliminarRegistro.append("idRegistroEliminar", usuario);
            $.ajax({
                url: ruta_server + "controllers/ajaxUsuarios.php",
                method: "POST",
                data: eliminarRegistro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    $('#exampleModalCenter3').modal('show');
                    $('#target3').html(respuesta);

                    let formulario = document.getElementById('formularioSalida');

                    $("#formularioSalida").submit(function(e) {
                        e.preventDefault();

                        swal({
                            title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                            text: ' Por favor espere...',
                            type: '',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });


                        let datosFormulario = new FormData(formulario); /*for([key,value] of datosFormulario.entries()) console.log(key + ":" + value);*/
                        datosFormulario.append("idRegistroEliminar2", usuario);
                        $.ajax({
                            url: ruta_server + "controllers/ajaxUsuarios.php",
                            method: "POST",
                            data: datosFormulario,
                            cache: false,
                            contentType: false,
                            processData: false,
                            //dataType:"json",
                            success: function(respuesta) {

                                if (respuesta == 0) {
                                    swal({
                                        type: 'error',
                                        title: 'Ocurrio un error',
                                        text: '¡El registro no pudo ser borrado!'
                                    });
                                } else if (respuesta == 1) {
                                    swal({ type: 'success', title: 'El registro se ha borrado correctamente', text: '', allowOutsideClick: false })
                                        .then((result) => {
                                            if (result) {
                                                window.location.reload();
                                            }
                                        }).catch(swal.noop);
                                } else
                                    swal(respuesta, "", "error");
                            }
                        });
                    });
                }
            });
        }
    }).catch(swal.noop);
}

/**************Mostrar Usuario*******************/
function mostrarUsuario(e) {
    $('.divCalendario').hide();
    let mostrarRegistro = new FormData();
    mostrarRegistro.append("idRegistro", e);
    $.ajax({
        url: ruta_server + "controllers/usuarios.php",
        method: "POST",
        data: mostrarRegistro,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            mostrar.innerHTML = respuesta["datos"];
            if (respuesta["imagen"] != null) {
                $("#fotografiaUsuario").attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta["imagen"] + "");
                $("#fotografiaUsuario").attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
            } else {
                $("#fotografiaUsuario").attr("src", ruta_server + "views/img/user.png");
                $("#fotografiaUsuario").attr("alt", ruta_server + "views/img/user.png");
            }

            if (respuesta["situacion"] == 1) {
                botonesOpciones.innerHTML = '<form action="' + ruta_server + 'usuarios" method="post"> <button type="submit" name="actualizarUsuario" value="' + e + '" class="btn btn-primary">Actualizar</button></form>';
            } else {
                botonesOpciones.innerHTML = '';
            }

            $('.activarCalendario').on('click', function() {
                $('.divCalendario').show();
            });
            $('.desactivarCalendario').on('click', function() {
                $('.divCalendario').hide();
            });
            actualizarCalendario();
            
            /*$('#actualizarCalendario').click(function(){
                 actualizarCalendario();
             });*/
        }
    });
}

/**************************************USUARIO CAMBIAR PASS********************/
/*****************************************************************************/
let formulario2 = document.getElementById('cambiarContrasena');

$("#formularioPassCancelarUsuario").click(function(){
    formulario2.reset();
    $("#passActual").attr("type", "password");
    $("#passNueva").attr("type", "password");
    $("#passConfirmacion").attr("type", "password");
});

$("#cambiarContrasena").submit(function(e) {
    e.preventDefault();
    let datosFormulario = new FormData();
    datosFormulario.append('passActual',md5($('#passActual').val()));
    datosFormulario.append('passNueva',md5($('#passNueva').val()));
    datosFormulario.append('passConfirmacion',md5($('#passConfirmacion').val()));
    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        //dataType:"json",
        success: function(respuesta) {
            if (respuesta == 0) {
                swal("Verifica que los campos sólo tenga números y letras", "", "warning");
            } else if (respuesta == 1) {
                swal("La nueva contraseña no coincide con la confirmación", "", "warning");
            } else if (respuesta == 2) {
                swal("La contraseña actual no coincide", "", "warning");
            } else if (respuesta == 3) {
                swal("La contraseña se actualizó correctamente", "", "success");
                formulario2.reset();
                $("#passActual").attr("type", "password");
                $("#passNueva").attr("type", "password");
                $("#passConfirmacion").attr("type", "password");
            } else if (respuesta == 4) {
                swal("Ocurrio un erro, intentelo nuevamente", "", "error");
            } else if (respuesta == 5) {
                swal("La contraseña no tiene el formato requerido", "", "warning");
            }
        }
    });
});


function myFunctionPass(valor) {
    var x = document.getElementById(valor);
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$('#limpiarPass').click(function() { //elimino la pass del campo en caso de que no presionaron el botón actualizar
    $('#passNueva2').val('');
});


function actualizarPassUsuario(e2) {

    mostrar2.innerHTML = '<form method="POST" style="margin-top: 2%;" id="cambiarContrasena2"><div class="form-group"><div class="row"><div class="col-md-4"></div><div class="col-md-4"><label for="">Nueva contraseña:</label> <i class="fa fa-lock text-green"></i><input  class="form-control" type="text" id="passNueva2" name="passNueva2" placeholder="Presiona el botón generar" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" title="8 a 12 caracteres; mínimo 1 mayúscula, 1 minúscula y 1 número" required readonly></div></div></div><br><div class="estilos-centrar"><button type="button" class="btn btn-default" id="generarPassUsuario2">Generar</button> <button type="submit" class="btn btn-primary">Actualizar</button></div></form>'

    let llenarCampo = document.getElementById("passNueva2");
    $("#generarPassUsuario2").click(function() {
        let valor1 = "";
        valor1 += generarPasswordMinusculas();
        valor1 += generarPasswordMayusculas();
        valor1 += generarPasswordNumeros();
        llenarCampo.value = valor1;
    });

    //let formulario3 = document.getElementById('cambiarContrasena2');

    $("#cambiarContrasena2").submit(function(e) { //guardarUsuarioNuevo
        e.preventDefault(); //no envio el formulario
        let datosFormulario = new FormData();
        datosFormulario.append("passNueva2",md5(llenarCampo.value));
        datosFormulario.append("idRegistro2", e2);
        $.ajax({
            url: ruta_server + "controllers/ajaxUsuarios.php",
            method: "POST",
            data: datosFormulario,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                if (respuesta == 3) {
                    swal({ type: 'success', title: 'La contraseña se actualizó correctamente', text: '', allowOutsideClick: false })
                        .then((result) => {
                            if (result) {
                                location.href = "usuariosAdministrar";
                            }
                        }).catch(swal.noop);
                } else if (respuesta == 4) {
                    swal({ type: 'error', title: 'Ocurrio un error', text: 'intentelo nuevamente', allowOutsideClick: false })
                } else if (respuesta == 0) {
                    swal({ type: 'info', title: 'Escriba la contraseña', text: 'intentelo nuevamente', allowOutsideClick: false })
                } else if (respuesta == 1) {
                    swal({ type: 'info', title: 'La contraseña no tiene el formato correcto', text: 'intentelo nuevamente', allowOutsideClick: false })
                }

            }
        });
    });
}

/**************************************CONTADOR DE CAMPOS USUARIOS********************/
/**********************************************************************************/
$("#campoCurp").keyup(function() {
    $("#curpRestante").text("(" + (18 - ($("#campoCurp").val().length)) + " caracteres restantes)");
});

$("#seguroSocial").keyup(function() {
    $("#nssRestante").text("(" + (11 - ($("#seguroSocial").val().length)) + " dÍgitos restantes)");
});

$("#campoRfc").keyup(function() {
    $("#rfcRestante").text("(" + (13 - ($("#campoRfc").val().length)) + " caracteres restantes)");
    /*let inicio = 12 - ($("#campoRfc").val().length);
    if (inicio == -1) {
        inicio = 0;
    }
    $("#rfcRestante").text("(" + inicio + " a " + (13 - ($("#campoRfc").val().length)) + " caracteres restantes)");*/
});


/**************************************CARGAR CAMPOS ********************/
/*****************************************************************************/
/*********************************************ESTADO Y MUNICIPIO*********** */
$('#lugarNacimiento').change(function() {
    let datos = new FormData();
    let estado = $("#lugarNacimiento").val();
    datos.append("nombreEstado", estado);
    $.ajax({
        url: ruta_server + "controllers/ajaxEstados.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#target2').html(respuesta);
        }
    });
});

/*********************************************CARGAR DEPARTAMENTOS*********** */
$('#sucursalUsuario').change(function() {
    if ($("#sucursalUsuario").val() !== "") {

        $('#puestoUsuario').val("");
        $("#puestoUsuario").attr("readonly", "readonly");

        let datos = new FormData();
        let sucursal = $("#sucursalUsuario").val();
        datos.append("sucursalDepartamento", sucursal);
        $.ajax({
            url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $('#targetDepartamento').html(respuesta);
                $('#departamentoUsuario').change(function() {
                    cargarPuestos();
                });
            }
        });
    } else {
        $('#targetDepartamento').html('<select class="form-control"  name="departamentoUsuario" id="departamentoUsuario" readonly required></select>');
        $('#targetPuesto').html('<select class="form-control" name="puestoUsuario" id="puestoUsuario" readonly required></select>');
    }
});


$('#departamentoUsuario').change(function() {
    cargarPuestos();
});


function cargarPuestos() {
    let datos = new FormData();
    let sucursal = $("#sucursalUsuario").val();
    let sucursalDepartamento = $('#departamentoUsuario').val();
    datos.append("sucursalDepartamentoPuesto", sucursal);
    datos.append("sucursalDepartamentoPuesto2", sucursalDepartamento);
    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#targetPuesto').html(respuesta);
        }
    });
}
/*********************************************CODIGO POSTAL Y DOMICILIO*************/
$('#codigoPostal').blur(function() {
    if ($("#codigoPostal").val() !== "") {
        let url = "http://"+window.location.host+"/api-codigos-postales-v1/index.php/Codigo/codigo/" + $("#codigoPostal").val() + "";
        fetch(url)
            .then((resp) => resp.json())
            .then((data) => {
                $('#recargarColonia').html('<select class="form-control textoMay" id="colonia" name="colonia" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" readonly required><option></option></select>');
                //$("#colonia").html("");
                $("#municipio").val(data.municipio);
                let arreglo = data.colonias;
                arreglo.sort();
                let select = document.getElementById("colonia");
                for (value in arreglo) {
                    let option = document.createElement("option");
                    option.text = arreglo[value];
                    select.add(option);
                }
                $("#colonia").removeAttr("readonly");
            })
            .catch(function(error) {
                console.log(JSON.stringify(error));
            });
    } else {
        $('#recargarColonia').html('<select class="form-control textoMay" id="colonia" name="colonia" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" readonly required><option></option></select>');
        //$("#colonia").html("");
        //$("#colonia").attr("readonly","readonly");
        $("#municipio").val("");
    }
});

/*********************************************USUARIO*************************** */
$('#nickUsuarioAgregar').keyup(function() {
    if ($('#nickUsuarioAgregar').val() !== "") {
        $("#correoUsuario").val($('#nickUsuarioAgregar').val() + "@asesoresempresariales.com.mx");
    } else {
        $("#correoUsuario").val("");
    }
});
/**************************************MASCARAS*******************************/
/*****************************************************************************/
$('.celular').mask('00-00-00-00-00');
$('.codigoPostal').mask('00000');
/*  var re = /^([A-Z]        1 LETRA
                [AEIOUX]     1 VOCAL
                [A-Z]{2}     2 LETRAS
                \d{2}        2 DIGITOS
                (?:0[1-9]|1[0-2])   
                (?:0[1-9]|[12]\d|3[01])
                
                [HM]
                (?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)
                [B-DF-HJ-NP-TV-Z]{3}
                [A-Z\d])(\d)$/
L = letra, 
D= digito,
V= vocal, 
S=sexo (H=hombre,M=mujer)
*/
$('.curp').mask('LVLLDDDDDDSLLLLLDD', {
    translation: {
        'L': { pattern: /[a-zA-Z]/, optional: false },
        'V': { pattern: /[AEIOUXaeioux]/, optional: false },
        'D': { pattern: /[0-9]/, optional: false },
        'S': { pattern: /[MHmh]/, optional: false }
    }
});

$('.rfc').mask('LLLLDDDDDDCCC', {
    translation: {
        'L': { pattern: /[a-zA-Z]/, optional: false },
        'C': { pattern: /[a-zA-Z0-9]/, optional: false },
        'D': { pattern: /[0-9]/, optional: false }
    }
});

$('.nss').mask('00000000000');

/**************************************INICIO DE SESIÓN********************/
/*****************************************************************************/
$("#passwordIngreso").focus(function() {
    $(".verPass").css("display", "inline");
});

$("#passwordIngreso").blur(function() {
    $(".verPass").css("display", "none");
});

$(".verPass").hover(function() {
    myFunctionPass("passwordIngreso");
});

$('.cb-value').click(function() {
    var mainParent = $(this).parent('.toggle-btn');
    if ($(mainParent).find('input.cb-value').is(':checked')) {
        $(mainParent).removeClass('active');
        $(this).attr('checked', false);

    } else {
        $(mainParent).addClass('active');
        $(this).attr('checked', true);

    }
});



/**************************************NUEVO(REGISTRO) EQUIPO********************/
/********************************************************************************/
$(".marcaRegistrada").on('change', function() {
    if ($(this).val() == 0) {
        $('#targetMarcaEquipo').html('<input class="form-control" type="text" id="marcaEquipo" name="marcaEquipo" placeholder="Ej. Lenovo" title="Escribe la marca del equipo de cómputo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-.\\s]{2,}" required autocomplete="off">');
    } else if ($(this).val() == 1) {
        let datos = new FormData();
        let marca = "activar";
        datos.append("marcaEquipo", marca);
        $.ajax({
            url: ruta_server + "controllers/ajaxEquipos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $('#targetMarcaEquipo').html(respuesta);
            }
        });
    }
});

$("#botonAdjuntarEquiposImagen").change(function(e){
    if($(this).val()!=""){
        let file = e.target.files[0];

        let image = (/\.(?=jpg|jpeg|png|JPG|JPEG|PNG)/gi).test(file.name);
        if (!image) {
            $(this).val('');
            Utilidades.alertaPersonalizada("warning","Formato no válido","Formatos válidos: .jpg, .jpeg, y .png",60000,true);
            return;
        }
    
        let fileSizeLimit = 5; // In MB
        if (file.size > fileSizeLimit * 1024 * 1024) {
            $(this).val('');
            Utilidades.alertaPersonalizada("warning","La imagen tiene un tamaño mayor al permitido","El peso máximo es de 2 MB",60000,true);
            return;
        }
    
        let reader = new FileReader();
        reader.onload = function(e){
            swal({
                title: '',
                text: '',
                imageUrl: e.target.result,
                imageWidth: 220,
                imageHeight: 300,
                imageAlt: 'Custom image',
                animation: false
            });
        }
        reader.readAsDataURL(file);
        $('#nombreImagenEquipos').text('Nombre:' + file["name"]);
    }
    else
        $('#nombreImagenEquipos').text("Sin imagen.");
    
});


$(".modeloRegistrado").on('change', function() {
    if ($(this).val() == 0) {
        $('#targetModeloEquipo').html('<input  class="form-control" type="text" id="modeloEquipo" name="modeloEquipo" placeholder="Ej. ProOne 400 G1 Aio" title="Escribe el modelo del equipo de cómputo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\\s]{2,}" required autocomplete="off">');
    } else if ($(this).val() == 1) {
        let datos = new FormData();
        let marca = "activar";
        datos.append("modeloEquipo", marca);
        $.ajax({
            url: ruta_server + "controllers/ajaxEquipos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $('#targetModeloEquipo').html(respuesta);
            }
        });
    }
});

$("#equipoSucursalUsuario").on('change', function() {
        let sucursal = $(this).val();
        if(sucursal == 0){
            $('#targetEquipoUsuarioCargo').html('<select class="form-control textoMay" name="equipoUsuarioCargo" id="equipoUsuarioCargo" requerid readonly>'+
                                                    '<option value="0"></option>'+
                                                '</select>');
        }
        else{
            let datos = new FormData();
            datos.append("asignarEquipoAUsuario", sucursal);
            $.ajax({
                url: ruta_server + "controllers/ajaxEquipos.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta) {
                    $('#targetEquipoUsuarioCargo').html(respuesta.html);
                    console.log(respuesta.html)
                }
            });
        }
});

let camposDinamicosServidores = $('#camposDinamicosServidores');
$('#anexarServidores').click(function(){
    camposDinamicosServidores.append('<div class="form-group">'+
                                            '<div class="row">'+
                                                '<div class="col-md-1">'+
                                                    '<button type="button" class="btn btn-danger borrarServidorLocal"><i class="fa fa-trash-o fa-2x"></i></button>'+
                                                '</div>'+
                                                '<div class="col-md-3">'+
                                                    ' <li>'+
                                                        '<input class="form-control" type="text" name="servidorIp[]" placeholder="Ej: 192.168.0.20">'+
                                                    '</li>'+
                                                '</div>'+
                                                '<div class="col-md-2">'+
                                                    '<input class="form-control textoMay" type="text" name="servidorAlias[]" placeholder="Ej: Nomipaq" >'+
                                                '</div>'+
                                                '<div class="col-md-3">'+
                                                    '<input class="form-control" type="text" name="servidorUsuario[]">'+
                                                '</div>'+
                                                '<div class="col-md-3">'+
                                                    '<input class="form-control" type="text" name="servidorPass[]">'+
                                                '</div>'+
                                            '</div>'+
                                    '</div>')
});

camposDinamicosServidores.on('click','.borrarServidorLocal',function(){
    $(this).parent().parent().parent().remove();
});

let credencialesBorrables=Array();
camposDinamicosServidores.on('click','.borrarServidorLocalActualiar',function(){
    credencialesBorrables.push($(this).parent().parent().attr('value'));
    $(this).parent().parent().parent().remove();
});

let formularioEquiposComputo = document.getElementById('formularioEquposComputo');
$('#formularioEquposComputo').submit(function(e){
    e.preventDefault();
    let datos = new FormData(formularioEquiposComputo);
    if(credencialesBorrables.length > 0)
        datos.append('borrables',JSON.stringify(credencialesBorrables));    
    //for([key,value] of datos.entries()) console.log(key + ":" + value);
    swal({ type: '' , title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>', text:'Por favor espere...', showConfirmButton: false,allowOutsideClick: false });
         $.ajax({
            url: ruta_server + "controllers/ajaxEquipos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success: function(respuesta) {
                if(respuesta['status'] == 'success'){
                    swal({ type: respuesta['status'] , title: respuesta['mensaje'], text: respuesta['mensaje2'], allowOutsideClick: false })
                        .then((result) => {
                            if (result) {
                                location.href = ruta_server + "equipos";
                            }
                        }).catch(swal.noop);
                    credencialesBorrables=[];
                }
                else
                    swal(respuesta['mensaje'], respuesta['mensaje2'], respuesta['status']);
            }
        });
});

$('#formularioCancelarEquipo').click(function(){
    formularioEquiposComputo.reset();
    camposDinamicosServidores.html('');
    credencialesBorrables=[];
    $('#nombreImagenEquipos').text("Sin imagen.");
    $("#botonAdjuntarEquiposImagen").val('');
    $('#targetMarcaEquipo').html('<input class="form-control" type="text" id="marcaEquipo" name="marcaEquipo" placeholder="Ej. Lenovo" title="Escribe la marca del equipo de cómputo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-.\\s]{2,}" required>');
    $('#targetModeloEquipo').html('<input  class="form-control" type="text" id="" name="modeloEquipo" placeholder="Ej. ProOne 400 G1 Aio" title="Escribe el modelo del equipo de cómputo" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9-_.\\s]{2,}" required>');
    $('#targetEquipoUsuarioCargo').html('<select class="form-control textoMay" name="equipoUsuarioCargo" id="equipoUsuarioCargo" requerid readonly>'+
                                            '<option value="0"></option>'+
                                        '</select>');
    $('#mouseEquipo,#monitorEquipo,#mochilaEquipo,#equipoUps').parent().addClass('active');
});

$('#buscadorEquipos').on('input',function(){
    filtrosEquipos();
});

$('#cargarAjaxSucursalEquipos').change(function(){
    filtrosEquipos();
});

$('#cargarAjaxSituacionEquipos').change(function(){
    filtrosEquipos();
    if($(this).val() == 2){
        $('#cargarAjaxSucursalEquipos,#buscadorEquipos').prop("disabled", true);
        $('#cargarAjaxSucursalEquipos').css('background', 'rgba(0,0,0,0.1)');
    }
    else{
        $('#cargarAjaxSucursalEquipos,#buscadorEquipos').prop("disabled", false);
        $('#cargarAjaxSucursalEquipos').css('background', '');
    }
});

function filtrosEquipos(){
    let datos = new FormData();
    datos.append("buscadorUsuariosEquipos", $('#buscadorEquipos').val());
    datos.append("buscadorSucursalEquipos", $('#cargarAjaxSucursalEquipos').val());
    datos.append("buscadorSituacionEquipos", $('#cargarAjaxSituacionEquipos').val());
   
    datos.append("paginaActual", '1');
    datos.append("registrosPorPagina", $('#paginacionEquiposMostrar').find('ul').attr('registros'));
    datos.append("target", $('#paginacionEquiposMostrar').find('ul').attr('target'));

    $.ajax({
        url: ruta_server + "controllers/ajaxEquipos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta) {
            $('#mostrarDatosEquipos').html(respuesta['data']);
            $('#paginacionEquiposMostrar2,#paginacionEquiposMostrar').html(respuesta['mostrar']);

            $(".mostrarEquipo").click(function() {
                mostrarEquipo($(this).parent().parent().attr("id"));
            });
            $(".eliminarEquipo").click(function() {
                eliminarEquipo($(this).parent().parent().attr("id"));
            });
           
            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });

           $(window).resize(function(){ //reajustar contenido despues de que la resolucion haya sido menor a la definida
                actualizarResolucion($(window).width())
            });

            $('.formularioDinamico').click(function(e) {
                switch ($(this).parent().parent().attr("target")) {
                    case 'solicitudes':
                        paginador(e, this);
                    break;
                    case 'usuarios':
                        paginador2(e, this);
                    break;
                    case 'correos':
                        paginador3(e, this);
                    break;
                    case 'equipos':
                        paginador4(e, this);
                    break;
                    case 'usuariosPass':
                        paginador5(e, this);
                    break;
                    case 'paquetesInternos':
                        paginador6(e, this);
                    break;
                    case 'paquetesExternos':
                        paginador7(e, this);
                    break;
                    case 'tickets':
                        paginador8(e, this);
                    break;
                }
            });
        }
    });
}
/**************Mostrar Detalles de Equipos*******************/
$(".mostrarEquipo").click(function() {
    mostrarEquipo($(this).parent().parent().attr("id"));
});

function mostrarEquipo(e) {

    let datos = new FormData();
    datos.append("idDatosEquipoComputo", e);
    $.ajax({
        url: ruta_server + "controllers/ajaxEquipos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#targetDetalleEquiposComputo').html(respuesta["datos"]);
            if (respuesta["imagen"] != null) {
                $("#fotografiaUsuarioEquipo").attr("src", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"]);
            } 
            else {
                $("#fotografiaUsuarioEquipo").attr("src", ruta_server + "views/img/user.png");
            }
            if (respuesta["imagen2"] != null) {
                $("#fotografiaUsuarioEquipo2").attr("src", ruta_server + "intranet/imagenes-equipos/" + respuesta["imagen2"]);
            } 
            else {
                $("#fotografiaUsuarioEquipo2").attr("src", ruta_server + "views/img/logo-computadora.jpg");
            }

            $('#targetBotonesEquipoComputo').html('<form action="' + ruta_server + 'equipos" method="post"> <button type="submit" name="actualizarEquipo" value="' + e + '" class="btn btn-primary">Actualizar</button></form>');
        }
    });
}

$(".eliminarEquipo").click(function() {
    eliminarEquipo($(this).parent().parent().attr("id"));
});

function eliminarEquipo(e) {
    swal({
        title: '¿Estas seguro de borrar el registro?',
        text: "Realiza este proceso únicamente si vas a dar de baja el equipo, en caso contario se recomienda reasignarlo o dejarlo en situación de no asignado.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!'
    }).then((result) => {
        if (result) {
            let datos = new FormData();
            datos.append("idSucursalEliminar", e);
            $.ajax({
                url: ruta_server + "controllers/ajaxEquipos.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta) {
                     if (respuesta['status'] == 'success') {
                        swal({ type: 'success', title: respuesta['mensaje'], text: respuesta['mensaje2'], allowOutsideClick: false })
                            .then((result) => {
                                if (result) {
                                    window.location.reload();
                                }
                            }).catch(swal.noop);
                    }
                    else {
                        swal({
                            type: respuesta['status'],
                            title: respuesta['mensaje'],
                            text: respuesta['mensaje2']
                        });
                    } 
                }
            });
        }
    }).catch(swal.noop);
}

/******************************************************SUCURSAL AGREGAR***********************************************************/
/*********************************************************************************************************************************/
let formularioSucursal = document.getElementById('formularioNuevoSucursal');

$("#formularioNuevoSucursal").submit(function(e) { //guardarUsuarioNuevo
    let cadena = "";
    e.preventDefault(); //no envio el formulario
    let datosFormulario = new FormData(formularioSucursal);

    $('#mylist').each(function(i) { //leemos el total de telefonos
        cadena = $(this).text();
    });

    datosFormulario.append("telefonos", cadena);
    $.ajax({
        url: ruta_server + "controllers/ajaxSucursales.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 0) {
                swal({ type: 'success', title: 'El registro se realizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            formularioSucursal.reset();
                            $('#recargarColoniaSucursal').html('<select class="form-control textoMay" id="coloniaSucursal" name="coloniaSucursal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" readonly required><option></option></select>');
                            $("#mylist").empty();
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 1) {
                swal("Ocurrio un erro, intentelo nuevamente", "", "error");
            } else if (respuesta == 2) {
                swal({ type: 'success', title: 'El registro se actualizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "sucursalesAdministrar";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 3) {
                swal("El número de teléfono no tiene el formato correcto", "", "warning");
            } else if (respuesta == 4) {
                swal("Escribe un nombre. Sólo letras, números, espacios y guiones", "", "warning");
            } else if (respuesta == 5) {
                swal("Escribe una calle. Sólo letras, números, espacios y guiones", "", "warning");
            } else if (respuesta == 6) {
                swal("Escribe el número exterior. Sólo letras, números, espacios y guiones", "", "warning");
            } else if (respuesta == 7) {
                swal("Escribe el número interior. Sólo letras, números, espacios y guiones", "", "warning");
            } else if (respuesta == 8) {
                swal("Escribe el código postal. Debe contener 5 digitos", "", "warning");
            } else if (respuesta == 9) {
                swal("Selecciona una colonia. Sólo letras, números y espacios", "", "warning");
            } else if (respuesta == 10) {
                swal("Escribe un municipio. Sólo letras y espacios", "", "warning");
            } else if (respuesta == 11) {
                swal("Escribe un estado. Sólo letras y espacios", "", "warning");
            } else {
                swal(respuesta, "", "warning");
            }
        }
    });
});

/*******************************NUEVO(INTERFAZ) SUCURSAL**************************** */
$("#anadirTelefono").click(function(e) {
    e.preventDefault();
    var valor = $("#telefonoSucursal").val();
    if (valor !== '' && valor.length == 14) {
        var elem = $("<li></li>").text('01 ' + valor);
        $(elem).append("<button class='rem'>X</button>");
        $("#mylist").append(elem);
        $("#telefonoSucursal").val("");
        $(".rem").on("click", function() {
            $(this).parent().remove();
        });
    }
});

$(".rem").on("click", function(e) {
    e.preventDefault();
    $(this).parent().remove();
});

$("#cancelarSucursal").click(function() {
    $("#mylist").empty();
    $('#recargarColoniaSucursal').html('<select class="form-control textoMay" id="coloniaSucursal" name="coloniaSucursal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" readonly required><option></option></select>');
});


$('#codigoSucursal').blur(function() {
    let valor = $("#codigoSucursal").val();
    if (valor !== "" && valor.length == 5) {
        let url = "http://"+window.location.host+"/api-codigos-postales-v1/index.php/Codigo/codigo/" + $("#codigoSucursal").val() + "";
        fetch(url)
            .then((resp) => resp.json())
            .then((data) => {
                $('#recargarColoniaSucursal').html('<select class="form-control textoMay" id="coloniaSucursal" name="coloniaSucursal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" readonly required><option></option></select>');
                $("#municipioSucursal").val(data.municipio);
                $("#estadoSucursal").val(data.estado);
                let arreglo = data.colonias;
                arreglo.sort();
                let select = document.getElementById("coloniaSucursal");
                for (value in arreglo) {
                    let option = document.createElement("option");
                    option.text = arreglo[value];
                    select.add(option);
                }
                $("#coloniaSucursal").removeAttr("readonly");
            })
            .catch(function(error) {
                console.log(JSON.stringify(error));
            });
    } else {
        $('#recargarColoniaSucursal').html('<select class="form-control textoMay" id="coloniaSucursal" name="coloniaSucursal" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" readonly required><option></option></select>');
        $("#municipioSucursal").val("");
        $("#estadoSucursal").val("");
    }
});

/************************Eliminar sucursal*************************************/
$(".borrarSucursal").click(function(e) {

    let id = $(this).parent().parent().attr("id");

    swal({
        title: '¿Estas seguro de borrar el registro?',
        text: "Si borra una sucursal la cual tenga empleados relacionados, deberá reasignar a otra sucursal a los empleados",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!'
    }).then((result) => {
        if (result) {
            let eliminarRegistro = new FormData();
            eliminarRegistro.append("idSucursalEliminar", id);
            $.ajax({
                url: ruta_server + "controllers/ajaxSucursales.php",
                method: "POST",
                data: eliminarRegistro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    if (respuesta == 0) {
                        swal({
                            type: 'error',
                            title: 'Ocurrio un error',
                            text: '¡El registro no pudo ser borrado!'
                        });
                    } else if (respuesta == 1) {
                        swal({ type: 'success', title: 'El registro se ha borrado correctamente', text: '', allowOutsideClick: false })
                            .then((result) => {
                                if (result) {
                                    window.location.reload();
                                }
                            }).catch(swal.noop);
                    }
                }
            });
        }
    }).catch(swal.noop);
});

$('.telefonoFijo').mask('(00) 0000-0000');

$('.telefonoFijo').keyup(function() {
    if ($(this).val().length > 2) {
        if ($(this).val().substring(1, 3) == '33' || $(this).val().substring(1, 3) == '55' || $(this).val().substring(1, 3) == '81') {
            $('.telefonoFijo').mask('(00) 0000-0000');
        } else {
            $('.telefonoFijo').mask('(000) 000-0000');
        }
    }
});


/*$("#campoCurp").keyup(function(){
	$("#curpRestante").text( "(" + (18 - ($("#campoCurp").val().length)) + " caracteres restantes)" );
});*/

/******************************CARGAR SUCURSAL**************************************/
$('#cargarAjaxSucursal,#cargarAjaxSituacion').change(function() {
    filtrosAdministrarUsuarios();
});

$('#buscadorUsuarios').on('input', function() {
    filtrosAdministrarUsuarios();
});

function filtrosAdministrarUsuarios(){
    let datos = new FormData();
    datos.append("busqueda", $('#buscadorUsuarios').val());
    datos.append("cargarSucursalActual", $('#cargarAjaxSucursal').val());
    datos.append("cargarSituacionActual", $('#cargarAjaxSituacion').val());

    datos.append("paginaActual", '1');
    datos.append("registrosPorPagina", $('#paginacionUsuariosMostrar').find('ul').attr('registros'));
    datos.append("target", $('#paginacionUsuariosMostrar').find('ul').attr('target'));

    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta) {
    
            $('#mostrarDatosUsuarios').html(respuesta['data']);
            $('#paginacionUsuariosMostrar2,#paginacionUsuariosMostrar').html(respuesta['mostrar']);

            $(".mostrarUsuario").click(function() {
                mostrarUsuario($(this).parent().parent().attr("id"));
            });
            $(".borrarUsuario").click(function() {
                eliminarUsuario($(this).parent().parent().attr("id"));
            });
            $(".actualizarPassUsuario").click(function() {
                actualizarPassUsuario($(this).parent().parent().attr("id"));
            });

            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });

            $(window).resize(function(){ //reajustar contenido despues de que la resolucion haya sido menor a la definida
                actualizarResolucion($(window).width())
            });


            ///////////////remplazar
            $('.formularioDinamico').click(function(e) {
                switch ($(this).parent().parent().attr("target")) {
                    case 'solicitudes':
                        paginador(e, this);
                    break;
                    case 'usuarios':
                        paginador2(e, this);
                    break;
                    case 'correos':
                        paginador3(e, this);
                    break;
                    case 'equipos':
                        paginador4(e, this);
                    break;
                    case 'usuariosPass':
                        paginador5(e, this);
                    break;
                    case 'paquetesInternos':
                        paginador6(e, this);
                    break;
                    case 'paquetesExternos':
                        paginador7(e, this);
                    break;
                    case 'tickets':
                        paginador8(e, this);
                    break;
                }
            });
        }
    });
}

/******************************************************DEPARTAMENTO AGREGAR***********************************************************/
/*********************************************************************************************************************************/
let formularioDepartamento = document.getElementById('formularioNuevoDepartamento');

$("#formularioNuevoDepartamento").submit(function(e) { //guardarUsuarioNuevo
    let cadena = "";
    e.preventDefault(); //no envio el formulario
    let datosFormulario = new FormData(formularioDepartamento);

    $('#misDepartamentos li').each(function(i) { //leemos el total de telefonos
        cadena += $(this).text() + ',';
    });

    datosFormulario.append("arregloSucursales", cadena);

    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 0) {
                formularioDepartamento.reset();
                $("#misDepartamentos").empty();
                /*swal({
                    title: 'El registro se realizo correctamente',
                    text: "¿Deseas vincular el nuevo departamento a una sucursal?",
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, vincular!',
                    allowOutsideClick: false
                  }).then((result) => {
                    if (result){
                        location.href="vincularDepartamento";
                    }     
                }).catch(swal.noop); */
                swal({ type: 'success', title: 'El registro se realizo correctamente', text: 'Paso 1 de 2, ahora deberas vincular el o los DEPARTAMENTOS nuevos a una o a diversas SUCURSALES', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "vincularDepartamento";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 1) {
                swal({ type: 'error', title: 'Ocurrio un error, intentalo nuevamente', text: 'Asegurate que no exista un departamento con el mismo nombre', allowOutsideClick: false });
            } else if (respuesta == 2) {
                swal({ type: 'success', title: 'El registro se actualizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "departamento";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 3) {
                swal("Selecciona una sucursal", "", "warning");
            } else if (respuesta == 4) {
                swal("Verifica que el campo Departamento no contenga caracteres especiales, sólo letras, números y espacios", "", "warning");
            } else {
                swal(respuesta, "", "warning");
            }
        }
    });
});


$("#anadirDepartamento").click(function(e) {
    e.preventDefault();
    var valor = $("#departamentoNuevoDepartamento").val().toUpperCase();
    if (valor !== '') {
        let flag = false;
        $('#misDepartamentos li').each(function() { //leemos el total de puestos
            if ($(this).text() == valor) {
                //$(this).remove();
                flag = true;
            }
        });
        if (!flag) {
            var elem = $("<li></li>").text(valor);
            $(elem).append("<button class='rem'><i class='fa fa-times'></i></button>");
            $("#misDepartamentos").append(elem);
            $(".rem").on("click", function() {
                $(this).parent().remove();
            });
        }
        $("#departamentoNuevoDepartamento").val("");
    }
});

$("#formularioCancelarDepartamento").click(function() {
    $("#misDepartamentos").empty();
});


$('#listarPuestos').click(function(e) {
    e.preventDefault();

    let datos = new FormData();
    datos.append("listaTotalidadDePuestos", true);
    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#targetTotalidadPuestos').html(respuesta);
        }
    });

});

/******************************************************PUESTOS AGREGAR***********************************************************/
/*********************************************************************************************************************************/
let formularioPuestos = document.getElementById('formularioNuevoPuesto');

$("#formularioNuevoPuesto").submit(function(e) { //guardarUsuarioNuevo
    let cadena = "";
    e.preventDefault(); //no envio el formulario
    let datosFormulario = new FormData(formularioPuestos);

    $('#misPuestos li').each(function(i) { //leemos el total de puestos
        cadena += $(this).text() + ',';
    });

    datosFormulario.append("arregloPuestos", cadena);

    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 0) {
                formularioPuestos.reset();
                $("#misPuestos").empty();
                swal({ type: 'success', title: 'El registro se realizo correctamente', text: 'Paso 1 de 2, ahora deberas vincular el o los PUESTOS nuevos a uno o a diversos DEPARTAMENTOS.', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "vincularPuesto";
                        }
                    }).catch(swal.noop);

            } else if (respuesta == 1) {
                swal({ type: 'error', title: 'Ocurrio un error, intentalo nuevamente', text: 'Asegurate que no exista un puesto con el mismo nombre', allowOutsideClick: false });
            } else if (respuesta == 2) {
                swal({ type: 'success', title: 'El registro se actualizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "puesto";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 3) {
                swal("Verifica que el campo Puesto no contenga caracteres especiales, sólo letras, números y espacios", "", "warning");
            } else {
                swal(respuesta, "", "warning");
            }
        }
    });
});


$("#anadirPuesto").click(function(e) {
    e.preventDefault();
    var valor = $("#nombreNuevoPuesto").val().toUpperCase();
    if (valor !== '') {
        let flag = false;
        $('#misPuestos li').each(function() { //leemos el total de puestos
            if ($(this).text() == valor) {
                //$(this).remove();
                flag = true;
            }
        });
        if (!flag) {
            var elem = $("<li></li>").text(valor);
            $(elem).append("<button class='rem'><i class='fa fa-times'></i></button>");
            $("#misPuestos").append(elem);
            $(".rem").on("click", function() {
                $(this).parent().remove();
            });
        }
        $("#nombreNuevoPuesto").val("");
    }
});

$("#formularioCancelarPuesto").click(function() {
    $("#misPuestos").empty();
});

$('#listarDepartamentos').click(function(e) {
    e.preventDefault();
    let datos = new FormData();
    datos.append("listaTotalidadDeDepartamentos", true);
    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#targetTotalidadDepartamentos').html(respuesta);
        }
    });
});
/*******************************VINCULAR SUCURSAL---PUESTO ************************************************************************/
/*********************************************************************************************************************************/
let formularioVinculacionSucursalDepartamento = document.getElementById('formularioVinculacionSucursalDepartamento');

$("#formularioVinculacionSucursalDepartamento").submit(function(e) { //guardarUsuarioNuevo
    let cadena = "";
    e.preventDefault(); //no envio el formulario
    let datosFormulario = new FormData(formularioVinculacionSucursalDepartamento);

    $('#misVinculosSucursalDepartamento li').each(function() { //leemos el total de puestos
        cadena += $(this).attr('id');
        cadena += ",";
    });


    datosFormulario.append("arregloVinculacionSucursalDepartamento", cadena);

    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 0) {
                swal({ type: 'success', title: 'El registro se realizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            formularioVinculacionSucursalDepartamento.reset();
                            $("#misVinculosSucursalDepartamento").empty();
                            $('#targetVincularDepartamento').html('<select class="form-control textoMay" name="departamentoVincularDepartamento" id="departamentoVincularDepartamento" readonly><option></option></select>');
                            $('#listarDepartamentosVinculados').hide();
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 1) {

                swal({ type: 'error', title: 'Ocurrio un error, intentalo nuevamente', text: 'Asegurate que no exista previamente una vinculación entre la sucursal y el departamento seleccionado', allowOutsideClick: false });
                // swal("Ocurrio un error, intentalo nuevamente", "Asegurate que no exista previamente una vinculación entre la sucursal y el departamento seleccionado", "error");
            } else if (respuesta == 2) {
                swal({ type: 'success', title: 'El registro se actualizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "puesto";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 3) {
                swal("Verifica que al menos un departamento este añadido", "", "warning");
            } else {
                swal(respuesta, "", "warning");
            }
        }
    });
});


$('#listarDepartamentosVinculados').hide();

$('#departamentoVincularSucursal').change(function() {
    let valor = $("#departamentoVincularSucursal").val();
    if (valor !== "") {
        let datos = new FormData();
        datos.append("activarDepartamento", valor);
        $.ajax({
            url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $('#targetVincularDepartamento').html(respuesta);
                $('#listarDepartamentosVinculados').show();
            }
        });
    } else {
        $('#targetVincularDepartamento').html('<select class="form-control textoMay" name="departamentoVincularDepartamento" id="departamentoVincularDepartamento" readonly><option></option></select>');
        $("#misVinculosSucursalDepartamento").empty();
        $('#listarDepartamentosVinculados').hide();
    }
});

/*******************************************añadir departamentos al cuadro de carga**********************************************/
$("#anadirVinculoSucursalDepartamento").click(function(e) {
    e.preventDefault();
    let valor = $("#departamentoVincularDepartamento option:selected").text().toUpperCase();
    if (valor !== '') {
        let flag = false;
        $('#misVinculosSucursalDepartamento li').each(function() { //leemos el total de puestos
            if ($(this).text() == valor) {
                flag = true;
            }
        });
        if (!flag) {
            let elem = $("<li></li>").text(valor);
            $(elem).attr("id", $("#departamentoVincularDepartamento").val());
            $(elem).append("<button class='rem'><i class='fa fa-times'></i></button>");
            $("#misVinculosSucursalDepartamento").append(elem);
            $(".rem").on("click", function() {
                $(this).parent().remove();
            });
        }
        $("#departamentoVincularDepartamento").val("");
    }
});

$("#formularioCancelarDepartamento").click(function() {
    $("#misVinculosSucursalDepartamento").empty();
    $('#targetVincularDepartamento').html('<select class="form-control textoMay" name="departamentoVincularDepartamento" id="departamentoVincularDepartamento" readonly><option></option></select>');
    $('#listarDepartamentosVinculados').hide();
});


$('#listarDepartamentosVinculados').click(function(e) {
    e.preventDefault();
    $('#tituloDepartamento').text($('#departamentoVincularSucursal option:selected').text());
    let valor = $("#departamentoVincularSucursal").val();
    let datos = new FormData();
    datos.append("activarDepartamentosVinculados", valor);
    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#cargarRelacionSucursalDepartamento').html(respuesta);
            $('#totalDepAjax').text($('#cargarRelacionSucursalDepartamento option').length);
            $('#totalNoDepAjax').text($('#departamentoVincularDepartamento option').length);
            $('#totalDepAjaxTodos').text($('#departamentoVincularDepartamento option').length + $('#cargarRelacionSucursalDepartamento option').length);

            $('#desvincularSucursal').click(function(e) {
                e.preventDefault();
                if ($('#ventanaModalDesvincularDepartamento').val() != null) {
                    swal({
                        title: '¿Deseas desvincular el departamento seleccionado?',
                        text: "Antes de continuar verifica que no existan empleados asociados a la SUCURSAL-DEPARTAMENTO seleccionado, ya que los empleados estarán vinculados a una sucursal, pero a ningun departamento.",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, desvincular!',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result) {
                            let datos = new FormData();
                            datos.append("ventanaModaldepartamento", $('#ventanaModalDesvincularDepartamento').val());
                            datos.append("ventanaModalSucursal", $('#departamentoVincularSucursal').val());
                            $.ajax({
                                url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                                method: "POST",
                                data: datos,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(respuesta) {
                                    if (respuesta == 0) {
                                        swal({
                                            type: 'error',
                                            title: 'Ocurrio un error',
                                            text: '¡La desvinculación no pudo realizarse!'
                                        });
                                    } else if (respuesta == 1) {
                                        let valor = $("#departamentoVincularSucursal").val();
                                        let datos = new FormData();
                                        datos.append("activarDepartamentosVinculados", valor);
                                        $.ajax({
                                            url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                                            method: "POST",
                                            data: datos,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(respuesta) {
                                                $('#cargarRelacionSucursalDepartamento').html(respuesta);
                                                let datos = new FormData();
                                                datos.append("activarDepartamento", $("#departamentoVincularSucursal").val());
                                                console.log(valor);
                                                $.ajax({
                                                    url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                                                    method: "POST",
                                                    data: datos,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(respuesta) {
                                                        $('#targetVincularDepartamento').html(respuesta);
                                                        $('#totalDepAjax').text($('#cargarRelacionSucursalDepartamento option').length);
                                                        $('#totalNoDepAjax').text($('#departamentoVincularDepartamento option').length);
                                                        $('#totalDepAjaxTodos').text($('#departamentoVincularDepartamento option').length + $('#cargarRelacionSucursalDepartamento option').length);
                                                    }
                                                });
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    }).catch(swal.noop);
                } else {
                    swal({
                        type: 'error',
                        title: 'Selecciona un departamento',
                        text: ''
                    });
                }
            });
        }
    });
});


$(".borrarPuesto").click(function() {
    let id = $(this).parent().parent().attr("id");
    swal({
        title: '¿Estas seguro de borrar el registro?',
        text: "Antes de continuar verifica que ninguna sucursal-departamento tenga vinculado este puesto",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!'
    }).then((result) => {
        if (result) {
            let eliminarRegistro = new FormData();
            eliminarRegistro.append("idPuestoEliminar", id);
            $.ajax({
                url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                method: "POST",
                data: eliminarRegistro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    if (respuesta == 0) {
                        swal({
                            type: 'error',
                            title: 'Ocurrio un error',
                            text: '¡El registro no pudo ser borrado!'
                        });
                    } else if (respuesta == 1) {
                        swal({ type: 'success', title: 'El registro se ha borrado correctamente', text: '', allowOutsideClick: false })
                            .then((result) => {
                                if (result) {
                                    window.location.reload();
                                }
                            }).catch(swal.noop);
                    }
                }
            });
        }
    }).catch(swal.noop);

});


/*******************************VINCULAR SUCURSAL---PUESTO---DEPARTAMENTO ************************************************************************/
/*********************************************************************************************************************************/
let formularioVincularSucursalDepartamentoPuesto = document.getElementById('formularioVincularSucursalDepartamentoPuesto');

$("#formularioVincularSucursalDepartamentoPuesto").submit(function(e) { //guardarUsuarioNuevo
    let cadena = "";
    e.preventDefault(); //no envio el formulario
    let datosFormulario = new FormData(formularioVincularSucursalDepartamentoPuesto);

    $('#misVinculosSucursalDepartamentoPuesto li').each(function() { //leemos el total de puestos
        cadena += $(this).attr('id') + ',';
    });

    datosFormulario.append("arregloVinculacionSucursalDepartamentoPuesto", cadena);

    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 0) {
                swal({ type: 'success', title: 'El registro se realizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            formularioVincularSucursalDepartamentoPuesto.reset();
                            $('#targetDepartamentoPuesto').html('<select class="form-control" name="departamentoNuevoPuesto" id="departamentoNuevoPuesto" readonly required><option></option></select>');
                            $('#targetPuestoPuesto').html('<select class="form-control" name="mostrarTodosPuestos" id="mostrarTodosPuestos" readonly><option></option></select>');
                            $("#misVinculosSucursalDepartamentoPuesto").empty();
                            $('#listarPuestosVinculados').hide();
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 1) {
                swal({ type: 'error', title: 'Ocurrio un error, intentalo nuevamente', text: 'Asegurate que no exista previamente una vinculación entre la sucursal, departamento y el puesto seleccionado', allowOutsideClick: false });
            } else if (respuesta == 2) {
                swal({ type: 'success', title: 'El registro se actualizo correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = "puesto";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 3) {
                swal("Selecciona un departamento", "", "warning");
            } else if (respuesta == 4) {
                swal("Verifica que al menos un puesto este añadido", "", "warning");
            } else {
                swal(respuesta, "", "warning");
            }
        }
    });
});

$('#listarPuestosVinculados').hide();

$('#sucursalNuevaPuesto').change(function() {
    let sucursal = $("#sucursalNuevaPuesto").val();
    if (sucursal !== "") {
        $('#targetDepartamentoPuesto').html('<select class="form-control" name="departamentoNuevoPuesto" id="departamentoNuevoPuesto" required><option></option></select>');
        let datos = new FormData();
        datos.append("sucursalDepartamento", sucursal);
        datos.append("interfazVincularPuesto", true);
        $.ajax({
            url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $('#targetDepartamentoPuesto').html(respuesta);
                $('#departamentoNuevoPuesto').change(function() {
                    cargarVinculacionPuestos();
                });
            }
        });
    } else {
        $('#targetDepartamentoPuesto').html('<select class="form-control" name="departamentoNuevoPuesto" id="departamentoNuevoPuesto" readonly required><option></option></select>');
        $('#targetPuestoPuesto').html('<select class="form-control" name="mostrarTodosPuestos" id="mostrarTodosPuestos" readonly><option></option></select>');
        $("#misVinculosSucursalDepartamentoPuesto").empty();
        $('#listarPuestosVinculados').hide();
    }
});


$('#departamentoNuevoPuesto').change(function() {
    cargarVinculacionPuestos();
});


function cargarVinculacionPuestos() {
    if ($("#departamentoNuevoPuesto").val() !== "") {
        let datos = new FormData();

        datos.append("activarPuestoSucursal", $("#sucursalNuevaPuesto").val());
        datos.append("activarPuestoDepartamento", $('#departamentoNuevoPuesto').val());
        $.ajax({
            url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $('#targetPuestoPuesto').html(respuesta);
                $('#listarPuestosVinculados').show();
            }
        });
    } else {
        $('#targetPuestoPuesto').html('<select class="form-control" name="mostrarTodosPuestos" id="mostrarTodosPuestos" readonly><option></option></select>');
        $("#misVinculosSucursalDepartamentoPuesto").empty();
        $('#listarPuestosVinculados').hide();
    }
}


$("#anadirVinculoSucursalDepartamentoPuesto").click(function(e) {
    e.preventDefault();
    let valor = $("#mostrarTodosPuestos option:selected").text().toUpperCase();
    if (valor !== '') {
        let flag = false;
        $('#misVinculosSucursalDepartamentoPuesto li').each(function() { //leemos el total de puestos
            if ($(this).text() == valor) {
                flag = true;
            }
        });
        if (!flag) {
            let elem = $("<li></li>").text(valor);
            $(elem).attr("id", $("#mostrarTodosPuestos").val());
            $(elem).append("<button class='rem'><i class='fa fa-times'></i></button>");
            $("#misVinculosSucursalDepartamentoPuesto").append(elem);
            $(".rem").on("click", function() {
                $(this).parent().remove();
            });
        }
        $("#mostrarTodosPuestos").val("");
    }
});

$("#formularioCancelarPuesto").click(function() {
    $("#misVinculosSucursalDepartamentoPuesto").empty();
    $('#targetDepartamentoPuesto').html('<select class="form-control" name="departamentoNuevoPuesto" id="departamentoNuevoPuesto" readonly required><option></option></select>');
    $('#targetPuestoPuesto').html('<select class="form-control" name="mostrarTodosPuestos" id="mostrarTodosPuestos" readonly><option></option></select>');
    $('#listarPuestosVinculados').hide();
});

$('#listarPuestosVinculados').click(function(e) {
    e.preventDefault();
    let datos = new FormData();
    $('#tituloPuesto').text($('#departamentoNuevoPuesto option:selected').text());
    $('#tituloPuesto2').text($('#sucursalNuevaPuesto option:selected').text());
    datos.append("sucursalDepartamentoPuesto2", $("#departamentoNuevoPuesto").val());
    datos.append("sucursalDepartamentoPuesto", $("#sucursalNuevaPuesto").val());
    datos.append("indicarInterfaz", true); //indica que el selec debe ser distinto debido a que se mostrar en otra interfaz
    $.ajax({
        url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#cargarRelacionSucursalDepartamentoPuesto').html(respuesta);
            $('#totalPueAjax').text($('#ventanaModalDesvincularPuesto option').length);
            $('#totalNoPueAjax').text($('#mostrarTodosPuestos option').length);
            $('#totalPueAjaxTodos').text($('#ventanaModalDesvincularPuesto option').length + $('#mostrarTodosPuestos option').length);
            $('#desvincularPuesto').click(function(e) {
                e.preventDefault();
                if ($('#ventanaModalDesvincularPuesto').val() != null) {
                    swal({
                        title: '¿Deseas desvincular el puesto seleccionado?',
                        text: "Antes de continuar verifica que no existan empleados asociados a la SUCURSAL-DEPARTAMENTO-PUESTO seleccionado, ya que los empleados estarán vinculados a una SUCURSAL-DEPARTAMENTO, pero a ningun puesto.",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, desvincular!',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result) {
                            let datos = new FormData();
                            datos.append("ventanaModalSucursal2", $('#sucursalNuevaPuesto').val());
                            datos.append("ventanaModaldepartamento2", $('#departamentoNuevoPuesto').val());
                            datos.append("ventanaModalPuesto", $('#ventanaModalDesvincularPuesto').val());
                            $.ajax({
                                url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                                method: "POST",
                                data: datos,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(respuesta) {
                                    if (respuesta == 0) {
                                        swal({
                                            type: 'error',
                                            title: 'Ocurrio un error',
                                            text: '¡La desvinculación no pudo realizarse!'
                                        });
                                    } else if (respuesta == 1) {

                                        let datos = new FormData();
                                        datos.append("sucursalDepartamentoPuesto2", $("#departamentoNuevoPuesto").val());
                                        datos.append("sucursalDepartamentoPuesto", $("#sucursalNuevaPuesto").val());
                                        datos.append("indicarInterfaz", true); //indica que el selec debe ser distinto debido a que se mostrar en otra interfaz
                                        $.ajax({
                                            url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                                            method: "POST",
                                            data: datos,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function(respuesta) {
                                                $('#cargarRelacionSucursalDepartamentoPuesto').html(respuesta);
                                                let datos = new FormData();
                                                datos.append("activarPuestoSucursal", $("#sucursalNuevaPuesto").val());
                                                datos.append("activarPuestoDepartamento", $('#departamentoNuevoPuesto').val());
                                                $.ajax({
                                                    url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                                                    method: "POST",
                                                    data: datos,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(respuesta) {
                                                        $('#targetPuestoPuesto').html(respuesta);
                                                        $('#totalPueAjax').text($('#ventanaModalDesvincularPuesto option').length);
                                                        $('#totalNoPueAjax').text($('#mostrarTodosPuestos option').length);
                                                        $('#totalPueAjaxTodos').text($('#ventanaModalDesvincularPuesto option').length + $('#mostrarTodosPuestos option').length);
                                                    }
                                                });
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    }).catch(swal.noop);
                } else {
                    swal({
                        type: 'error',
                        title: 'Selecciona un puesto',
                        text: ''
                    });
                }
            });
        }
    });
});


$(".borrarDepartamento").click(function() {
    let id = $(this).parent().parent().attr("id");
    swal({
        title: '¿Estas seguro de borrar el registro?',
        text: "Antes de continuar verifica que ninguna sucursal tenga vinculado este departamento",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!'
    }).then((result) => {
        if (result) {
            let eliminarRegistro = new FormData();
            eliminarRegistro.append("idDepartamentoEliminar", id);
            $.ajax({
                url: ruta_server + "controllers/ajaxDepartamentosPuestos.php",
                method: "POST",
                data: eliminarRegistro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    if (respuesta == 0) {
                        swal({
                            type: 'error',
                            title: 'Ocurrio un error',
                            text: '¡El registro no pudo ser borrado!'
                        });
                    } else if (respuesta == 1) {
                        swal({ type: 'success', title: 'El registro se ha borrado correctamente', text: '', allowOutsideClick: false })
                            .then((result) => {
                                if (result) {
                                    window.location.reload();
                                }
                            }).catch(swal.noop);
                    }
                }
            });
        }
    }).catch(swal.noop);

});

/*******************************INTERFAZ TICKETS ************************************************************************/
/*********************************************************************************************************************************/



/****************************************** cargar imagenes ****************************************/
$('#imagenTicketNuevo').change(function(e) {
    formatear(e);
});

function formatear(e) {
    var file = e.target.files[0];
    imageType = /image.*/;
    if (!file.type.match(imageType))
        return;
    var reader = new FileReader();
    reader.onload = fileOnload2;
    reader.readAsDataURL(file);
}

function fileOnload2(e) {
    var result = e.target.result;
    $('#imgenSalidaTicket').attr("src", result);
    $('#targetAdjuntar').html('<div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> Cancelar<input type="file" id="imagenTicketCancelar" name="imagenTicketCancelar" accept="image/*"></div>');

    $('#imagenTicketCancelar').click(function(e) {
        e.preventDefault();
        $('#targetAdjuntar').html('<div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> Adjuntar<input type="file" id="imagenTicketNuevo" name="imagenTicketNuevo" accept="image/*"></div><p class="help-block">Max. 1MB</p>');
        $('#imgenSalidaTicket').attr("src", "views/img/ticket.jpg");
        $('#imagenTicketNuevo').change(function(e) {
            formatear(e);
        });
    });
}

/****************************************** formulario ****************************************/

let formularioNuevoTicket = document.getElementById('formularioNuevoTicket');
$('#formularioCancelarTicket').click(function() {
    $('#targetAdjuntar').html('<div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> Adjuntar<input type="file" id="imagenTicketNuevo" name="imagenTicketNuevo" accept="image/*"></div><p class="help-block">Max. 1MB</p>');
    $('#imgenSalidaTicket').attr("src", "views/img/ticket.jpg");
    $('#imagenTicketNuevo').change(function(e) {
        formatear(e);
    });


});



/*******************************CORREOS ELECTRÓNICOS ************************************************************************/
/*********************************************************************************************************************************/

$('#cargarAjaxCorreos').change(function() {
    correosAdministrarFiltros();
});

$('#buscadorUsuariosCorreos').on('input', function() {
    correosAdministrarFiltros();
});

$(".mostrarUsuarioCorreos").click(function() {
    mostrarUsuarioCorreos($(this).parent().parent().attr("id"));
});

function correosAdministrarFiltros(){
    let datos = new FormData();
    datos.append("buscadorCorreos", $('#buscadorUsuariosCorreos').val());
    datos.append("cargarCorreosActual", $('#cargarAjaxCorreos').val());

    datos.append("paginaActual", '1');
    let paginacion = $('#paginacionCorreosMostrar');
    datos.append("registrosPorPagina", paginacion.find('ul').attr('registros'));
    datos.append("target", paginacion.find('ul').attr('target'));
    datos.append("apuntar",paginacion.find('ul').attr("apuntar"));

    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta) {
            $('#mostrarDatosUsuariosCorreos').html(respuesta['data']);
            $('#paginacionCorreosMostrar2,#paginacionCorreosMostrar').html(respuesta['mostrar']);

            $(".mostrarUsuarioCorreos").click(function() {
                mostrarUsuarioCorreos($(this).parent().parent().attr("id"));
            });

            $('.detalleUsuarioNutrifitness').click(function(){
                $(this).parent().siblings(".campoVisto").children("input").prop('checked', true);
                Nutricion.detalleUsuario($(this).parent().parent().attr("id"));
            });

            $('.grupoChecked').click(function(){
                Nutricion.seleccionarRegistros($(this).prop('checked'),$(this).parent().parent().attr("id"));
            });

             ///////////////remplazar
             $('.formularioDinamico').click(function(e) {
                switch ($(this).parent().parent().attr("target")) {
                    case 'solicitudes':
                        paginador(e, this);
                    break;
                    case 'usuarios':
                        paginador2(e, this);
                    break;
                    case 'correos':
                        paginador3(e, this);
                    break;
                    case 'equipos':
                        paginador4(e, this);
                    break;
                    case 'usuariosPass':
                        paginador5(e, this);
                    break;
                    case 'paquetesInternos':
                        paginador6(e, this);
                    break;
                    case 'paquetesExternos':
                        paginador7(e, this);
                    break;
                    case 'tickets':
                        paginador8(e, this);
                    break;
                }
            });

            $('.botonMaxMin').click(function(){
                botonMaxMin($(this));
            });

            $(window).resize(function(){
                actualizarResolucion($(window).width())
            });
            
        }
    });
}

function mostrarUsuarioCorreos(e) {
    let datos = new FormData();
    datos.append("detallesModalCorreos", e);
    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
           $('#modalInformacionCorreos').html(respuesta["datos"]);
            if (respuesta["imagen"] != null) {
                $("#fotografiaUsuarioCorreo").attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta["imagen"] + "");
                $("#fotografiaUsuarioCorreo").attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
            } else {
                $("#fotografiaUsuarioCorreo").attr("src", ruta_server + "views/img/user.png");
                $("#fotografiaUsuarioCorreo").attr("alt", ruta_server + "views/img/user.png");
            }
        }
    });
}

/*******************************CALENDARIO************************************************************************/
/*********************************************************************************************************************************/
var currentYear = new Date().getFullYear();
let aniversario;
//estos datos de días desactivados debemos de crear un tabla donde RH realicé las actualizaciones
$('#calendar').calendar({
    displayWeekNumber: true,
    enableContextMenu: true,
    enableRangeSelection: true,
    style: 'background',
    disabledDays: [
        new Date(2019,11,25),
        new Date(2020,0,1),
        new Date(2020,1,3),
        new Date(2020,2,16),
        new Date(2020,4,1),
        new Date(2020,8,16),
        new Date(2020,10,16),
        new Date(2020,11,25)
    ],
    yearChanged: function(e) {
        /* e.preventRendering = true;

         $(e.target).append('<div style="text-align:center"><img src="your-loading-image.gif" /></div>');

         $.ajax({ 
             url:ruta_server+ "your-url", 
             success: function(dataSource) {  
                 $(e.target).data('calendar').setDataSource(dataSource);
             } 
         });*/
    },
    mouseOnDay: function(e) {
        if (e.events.length > 0) {
            var content = '';

            /*for(var i in e.events) {
                content += '<div class="event-tooltip-content">'
                                + '<div class="event-name" style="color:' + e.events[i].color + '">' + e.events[i].name + '</div>'
                                + '<div class="event-location">' + e.events[i].location + '</div>'
                            + '</div>';
            }*/

            for (var i in e.events) {
                content += '<div class="event-tooltip-content">' +
                    '<div class="event-name" style="white-space:nowrap;">' + e.events[i].name + '</div>' +
                    '<div class="event-location">' + e.events[i].location + '</div>' +
                    '</div>';
            }

            $(e.element).popover({
                trigger: 'manual',
                container: 'body',
                html: true,
                content: content,
                placement: 'auto' //agregar linea para corregir, tambien se agrego: style="white-space:nowrap;"
            });

            $(e.element).popover('show');
        }
    },
    mouseOutDay: function(e) {
        if (e.events.length > 0) {
            $(e.element).popover('hide');
        }
    },
    dayContextMenu: function(e) {
        $(e.element).popover('hide');
    },
    customDayRenderer: function(element, date) {
        if(date.getTime() == aniversario) {
            $(element).css('border', '4px solid #ff0080');
        }
    }
});


function formatoHora(hora) {
    let hours = parseInt(hora);
    let prefijo = " AM"
    if (hours >= 12) {
        if (hours != 12)
            hours = hours - 12;
        prefijo = " PM"
    }
    let sHours = hours.toString();
    if (hours < 10)
        sHours = "0" + sHours;
    return (sHours + ":" + hora.substring(3) + prefijo);
}



function actualizarCalendario() {

    let formulario = new FormData();
    formulario.append("cargarCalendario", true);
    formulario.append("cargarDatosId", $('#actualizarCalendario').attr('name'));

    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: formulario,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            $("#calendar").prepend('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
        },
        success: function(respuesta) {
            let datos = [];
            aniversario = '';
            console.log(respuesta);
            let total = respuesta.length - 1;
            let aniversary = respuesta[total];
            aniversary = aniversary.aniversario.split('-');
            if(currentYear > aniversary[0]){
                aniversario =  new Date(currentYear, aniversary[1] -1, aniversary[2]).getTime();
                datos.push({
                    id: '',
                    name: '',
                    location: 'ANIVERSARIO',
                    startDate: new Date(currentYear, aniversary[1] -1, aniversary[2]),
                    endDate: new Date(currentYear, aniversary[1] -1, aniversary[2]),
                    color: ''
                });
            }
            
            for (let i = 0; i < total; i++) {
                if (respuesta[i].autorizacion_jefe != 3 && respuesta[i].autorizacion_rh != 3) { //fue denegado el permiso por el Jefe o por RH

                    let color = '';
                    let fechaInicial = respuesta[i].fecha_inicio.split('-');
                    let fechaFinal = respuesta[i].fecha_fin.split('-');

                    let tipoPermiso = '';
                    if (respuesta[i].tipo_solicitud == 1) {
                        switch (respuesta[i].tipo_permiso) {
                            case '1':
                                color = '#605CA8';
                                tipoPermiso = 'Justificante de IMSS';
                                tipoPermiso += ' (De ' + '<b>' + formatoHora(respuesta[i].horario_inicio) + '</b>' + ' A ' + '<b>' + formatoHora(respuesta[i].horario_fin) + '</b>' + ')';
                                break;
                            case '2':
                                color = '#605CA8';
                                tipoPermiso = 'Justificante del médico particular';
                                tipoPermiso += ' (De ' + '<b>' + formatoHora(respuesta[i].horario_inicio) + '</b>' + ' A ' + '<b>' + formatoHora(respuesta[i].horario_fin) + '</b>' + ')';
                                break;
                            case '3':
                                color = '#605CA8';
                                tipoPermiso = 'Día completo';
                                break;
                            case '4':
                                color = '#605CA8';
                                tipoPermiso = 'Medio día';
                                tipoPermiso += ' (De ' + '<b>' + formatoHora(respuesta[i].horario_inicio) + '</b>' + ' A ' + '<b>' + formatoHora(respuesta[i].horario_fin) + '</b>' + ')';
                                break;
                            case '5':
                                color = '#605CA8';
                                tipoPermiso = 'Periodo de ausencia por horas';
                                tipoPermiso += ' (De ' + '<b>' + formatoHora(respuesta[i].horario_inicio) + '</b>' + ' A ' + '<b>' + formatoHora(respuesta[i].horario_fin) + '</b>' + ')';
                                break;
                            case '6':
                                color = '#605CA8';
                                tipoPermiso = 'Salida temprano';
                                tipoPermiso += ' (De ' + '<b>' + formatoHora(respuesta[i].horario_inicio) + '</b>' + ' A ' + '<b>' + formatoHora(respuesta[i].horario_fin) + '</b>' + ')';
                                break;
                            case '7':
                                color = '#00A65A';
                                tipoPermiso = 'Bono bimestral';
                                break;
                            case '8':
                                color = '#605CA8';
                                tipoPermiso = 'Luto';
                                break;
                            case '9':
                                color = '#DD4B39';
                                tipoPermiso = 'Falta injustificada';
                                break;
                            case '10':
                                color = '#605CA8';
                                tipoPermiso = 'Suspensión';
                                break;
                            case '11':
                                color = '#605CA8';
                                tipoPermiso = 'Permiso de paternidad';
                                break;
                            case '12':
                                color = '#605CA8';
                                tipoPermiso = 'Permiso de maternidad';
                                break;
                        }

                    } else if (respuesta[i].tipo_solicitud == 2) {
                        color = '#00C0EF';
                        tipoPermiso = 'Vacaciones';
                    } else if (respuesta[i].tipo_solicitud == 3) {
                        color = '#605CA8';
                        tipoPermiso = 'Cambio de guardia';
                    }


                    let autorizacion = "",
                        autorizacion_jefe = "",
                        autorizacion_rh = "";
                    if (respuesta[i].autorizacion_rh < 2)  { //ambos deben autorizar, aunque si lo hace sólo RH, igual se autoriza.
                        if (respuesta[i].autorizacion_jefe == 0) {
                            autorizacion_jefe = 'No vista';
                        } else if (respuesta[i].autorizacion_jefe == 1) {
                            autorizacion_jefe = 'Vista';
                        } else if (respuesta[i].autorizacion_jefe == 2) {
                            autorizacion_jefe = 'Autorizada';
                        }
                        

                        if (respuesta[i].autorizacion_rh == 0) {
                            autorizacion_rh = 'No vista';
                        } else if (respuesta[i].autorizacion_rh == 1) {
                            autorizacion_rh = 'Vista';
                        } else if (respuesta[i].autorizacion_rh == 2) {
                            autorizacion_rh = 'Autorizada';
                        }
                        
                        autorizacion = 'Autorización Jefe: ' + '<b>' + autorizacion_jefe + '</b>' + '<br/>' + 'Autorización RH: ' + '<b>' + autorizacion_rh + '</b>';
                        color = '#F39C12';
                    }

                    if(respuesta[i].tipo_solicitud == 2){

                        let dtInicial = new Date(fechaInicial[0], fechaInicial[1] - 1, fechaInicial[2]);
                        let dtFinal =new Date(fechaFinal[0], fechaFinal[1] - 1, fechaFinal[2]);
                        let dia,mes;

                        let sabados =  respuesta[i].cuenta_sabado != null ? respuesta[i].cuenta_sabado : 0;

                        if(sabados > 0)
                            console.log('tenemos sabados: ', sabados);

                        while(dtInicial <= dtFinal){

                            if(dtInicial.getDay()!==0){//Nunca marcar los Domingos
                                if(sabados > 0 || dtInicial.getDay()!==6){
                                    if(dtInicial.getDay()===6)
                                        sabados--;
                                    dia = dtInicial.getDate() <= 9 ? 0 : '';
                                    mes = (dtInicial.getMonth() + 1) <= 9 ? 0 : '';
                                    
                                    datos.push({
                                        id: respuesta[i].id_permiso,
                                        name: autorizacion,
                                        location: tipoPermiso,
                                        startDate: new Date(dtInicial.getFullYear(), mes+(dtInicial.getMonth()), dia+(dtInicial.getDate()) ),
                                        endDate: new Date(dtInicial.getFullYear(), mes+(dtInicial.getMonth()), dia+(dtInicial.getDate()) ),
                                        color: color
                                    });
                                }    
                            }
                            dtInicial.setDate(dtInicial.getDate() + 1);
                        }
                    }

                    else if(respuesta[i].tipo_solicitud == 3) { //para evitar que seleccione los días intermedios entre inicio y fin
                        datos.push({
                            id: respuesta[i].id_permiso,
                            name: autorizacion,
                            location: tipoPermiso,
                            startDate: new Date(fechaInicial[0], fechaInicial[1] - 1, fechaInicial[2]),
                            endDate: new Date(fechaInicial[0], fechaInicial[1] - 1, fechaInicial[2]),
                            color: color
                        });
                        datos.push({
                            id: respuesta[i].id_permiso,
                            name: autorizacion,
                            location: tipoPermiso,
                            startDate: new Date(fechaFinal[0], fechaFinal[1] - 1, fechaFinal[2]),
                            endDate: new Date(fechaFinal[0], fechaFinal[1] - 1, fechaFinal[2]),
                            color: color
                        });
                    } 

                    else {
                        datos.push({
                            id: respuesta[i].id_permiso,
                            name: autorizacion,
                            location: tipoPermiso,
                            startDate: new Date(fechaInicial[0], fechaInicial[1] - 1, fechaInicial[2]),
                            endDate: new Date(fechaFinal[0], fechaFinal[1] - 1, fechaFinal[2]),
                            color: color
                        });
                    }

                }
            }

            $('#calendar').data('calendar').setDataSource(datos);
        }
    });
}


/*(function(){ //cargamos la información del calendario
	
}());*/

$('#actualizarCalendario').click(function() {
    actualizarCalendario();
});

/*******************************PERMISOS************************************************************************/
/*********************************************************************************************************************************/

$('#tipoSolicitud').change(function() {

    let datosFormulario = new FormData();
    datosFormulario.append("tipoSolicitud", $('#tipoSolicitud').val());
    datosFormulario.append("idPrincipalPermuta", $('#identificadorUsuarioPermuta').val());
    $('#cargarTipoSolicitud').html('<div style="text-align:center"><img src=' + ruta_server + 'views/img/status.gif></div>');
    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $('#cargarTipoSolicitud').html(respuesta);

            $('#timepicker').timepicki({ start_time: ["09", "00", "AM"] });
            $('#timepicker2').timepicki({ start_time: ["07", "00", "PM"] });

            $('#reservationtime').daterangepicker({
                // timePicker: true, 
                // timePickerIncrement: 1, 
                locale: {
                    format: 'DD-MM-YYYY',
                    separator: " / ",
                    applyLabel: "Aceptar",
                    cancelLabel: "Cancelar",
                    daysOfWeek: [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    monthNames: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agusto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ]
                }
            });

            $('#periodoVacacional,#cambioGuardia').daterangepicker({
                showCustomRangeLabel: false,
                locale: {
                    format: 'DD-MM-YYYY',
                    separator: " / ",
                    applyLabel: "Aceptar",
                    cancelLabel: "Cancelar",
                    daysOfWeek: [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    monthNames: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agusto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ]
                }
            });

            $('#cargarImagenPermiso').change(function(e) {

                let file = e.target.files[0];
                let valido = (/\.(?=jpg|png|jpeg|pdf)/gi).test(file.name);
                
                if (!valido) {
                    $('#cargarImagenPermiso').val('');
                    swal("Sólo se permiten archivos en formato:", ".jpg .jpeg .png .pdf", "error").catch(swal.noop);
                    return;
                }
            
                let fileSizeLimit = 2; // In MB
                if (file.size > fileSizeLimit * 1024 * 1024) {
                    $('#cargarImagenPermiso').val('');
                    swal("El archivo tiene un tamaño mayor al permitido", "El peso máximo es de 2 MB", "error").catch(swal.noop);
                    return;
                }
            
                $('#lienzoArchivosPermisos').html('<i class="icon fa fa-check fa-2x"></i> ARCHIVO: '+ 
                                                    file.name +
                                                  '<button type="button" id="cancelarImagen" class="close" aria-hidden="true">&times;</button>'          
                );
                
                 $('#cancelarImagen').click(function(){
                    $('#cargarImagenPermiso').val('');
                    $('#lienzoArchivosPermisos').html('Si lo deseas puedes adjuntar algún archivo en formato: .jpg, .jpeg, .png o .pdf');
                });
    
            });
        }
    });

});


let formularioPermisos= document.getElementById('multiformato');

$("#formularioCancelarPermiso").click(function() {
    formularioPermisos.reset();
    $('#cargarTipoSolicitud').html('');
});

$("#multiformato").submit(function(e) {
    e.preventDefault();
    swal({
        title: '¿La información proporcionada es correcta?',
        text: "Antes de continuar verifica que todos los campos esten llenados correctamente",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, continuar!'
    }).then((result) => {
        if (result) {
            let datosFormulario = new FormData(formularioPermisos);
            datosFormulario.append("extemporaneo", $('#condicionesYterminos:checked').val());
            $.ajax({
                url: ruta_server + "controllers/ajaxPermisos.php",
                method: "POST",
                data: datosFormulario,
                cache: false,
                contentType: false,
                processData: false,
                //dataType:"json",
                success: function(respuesta) {
                    if (respuesta == 0) {
                        swal("Selecciona el tipo de permiso", "", "warning");
                    } else if (respuesta == 1) {
                        swal("Selecciona la fecha", "", "warning");
                    } else if (respuesta == 2) {
                        swal("Escribe el motivo para solicitar el permiso", "No escribas caracteres especiales", "warning");
                    } else if (respuesta == 3) {
                        swal({ type: 'success', title: 'El registro se realizo correctamente', text: '', allowOutsideClick: false })
                        .then((result) => {
                            if (result) {
                                formularioPermisos.reset();
                                $('#cargarTipoSolicitud').html('');
                                location.href = ruta_server + "usuariosPass";
                            }
                        }).catch(swal.noop);
                    } else if (respuesta == 4) {
                        swal("Ocurrio un error", "", "error");
                    } else if (respuesta == 5) {
                        swal("Selecciona al empleado con el que realizaras el cambio de guardia", "", "warning");
                    } else if (respuesta == 6) {
                        swal("Selecciona un formato de hora correcto", "", "warning");
                    } 
                    else if (respuesta == 7) {
                        swal({ type: 'warning', title: 'El usuario con el que quieres realizar el cambio, tiene una solicitud pendiente', text: 'No podra aceptar otra solicitud, hasta que responda a la solicitud pendiente', allowOutsideClick: false })
                        .then((result) => {
                            if (result) {
                                formularioPermisos.reset();
                                $('#cargarTipoSolicitud').html('');
                                location.href = ruta_server + "usuariosPass";
                            }
                        }).catch(swal.noop);
                    }
                    else
                        swal(respuesta, "", "error");
                }
            });
        }
    }).catch(swal.noop);
});

/*******************************ACTUALIZA MENSAJES PERMISOS************************************************************************/
/*********************************************************************************************************************************/
//##############################################  notificaciones  ##############################################################
setInterval(function() {
    recargar_solicitudes();//también notificaciones
}, 120000);

function recargar_solicitudes() {
    let datosFormulario = new FormData();
    datosFormulario.append("actualizarSolicitudes", $('#cargarTotalSolicitudes').attr('name'));

    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta) {
            let cadena = '',link = '';

            /*se imprime el total de solicitudes*/
            if (respuesta['solicitudes'] > 0) {
                cadena = respuesta['solicitudes'] > 1 ? 'Tienes ' + respuesta['solicitudes'] + ' nuevas solicitudes sin leer' : 'Tienes ' + respuesta['solicitudes'] + ' nueva solicitud sin leer';
                link = '<a href=' + ruta_server + 'solicitudes>Mostrar</a>';
                $('#cargarTotalSolicitudes').addClass("label label-success");
            } 
            else {
                cadena = "No hay solicitudes nuevas";
                respuesta['solicitudes'] = '';
                link = '';
                $('#cargarTotalSolicitudes').removeClass("label label-success");
            }
            $('#cargarTotalSolicitudes2').text(cadena);
            $('#cargarTotalSolicitudes').text(respuesta['solicitudes']);
            $('#linkPermisos').html(link);

            /*Se imprime el total de notificaciones*/
            if (respuesta['totalNotificaciones'] > 0) {
                cadena = respuesta['totalNotificaciones'] > 1 ? 'Tienes ' + respuesta['totalNotificaciones'] + ' notificaciones sin ver' : 'Tienes ' + respuesta['totalNotificaciones'] + ' notificación sin ver';
                $('#cargarNotificacionesTotal').addClass("label label-warning");
            } 
            else {
                cadena = "No hay notificaciones nuevas";
                respuesta['totalNotificaciones'] = '';
                $('#cargarNotificacionesTotal').removeClass("label label-warning");
            }
            $('#cargarNotificacionesTotal2').text(cadena);
            $('#cargarNotificacionesTotal').text(respuesta['totalNotificaciones']);
            /*se imprime el tipo de notificacion (respuesta de solicitud)*/
            if (respuesta['notificacionesSolicitudes'] > 0){
                cadena = respuesta['notificacionesSolicitudes'] > 1 ? respuesta['notificacionesSolicitudes'] + ' Respuestas a tus solicitudes' : respuesta['notificacionesSolicitudes'] + ' Respuesta a tu solicitud';
                $('#cargarnotificacionesSolicitudes').html('<form id="expandirformularioSolicitudes" action="usuariosPass" method="post">'+
                                                                '<input type="hidden" name="expandirSolicitudes" value="true"/>'+
                                                                '<a href="#" id="expandirVentanaSolicitudes"><i class="fa fa-file-o text-aqua"></i>'+ cadena +'</a>'+
                                                            '</form>');
            }
            else{
                $('#cargarnotificacionesSolicitudes').html('');
            }
            /*se imprime el tipo de notificacion (cambio de guardia)*/
            if (respuesta['cambioGuardia'] > 0){
                cadena = respuesta['cambioGuardia'] > 1 ? respuesta['cambioGuardia'] + ' Cambios de guardia' : respuesta['cambioGuardia'] + ' Cambio de guardia';
                $('#cargarCambioGuardia').html('<a href="usuariosPass" class="cambio-guardia"><i class="fa fa-handshake-o text-aqua"></i>'+ cadena +'</a>');
            }
            else{
                $('#cargarCambioGuardia').html('');
            }

            /*se imprime el tipo de notificacion (paqueteria interna)*/
            if (respuesta['paquetes'] > 0){
                cadena = respuesta['paquetes'] > 1 ? respuesta['paquetes'] + ' Notificaciones paquetería interna' : respuesta['paquetes'] + ' Notificación paquetería interna';
                $('#notificacionPaquete').html('<a href="paqueteriaRevision"><i class="fa fa-truck text-black"></i>'+ cadena +'</a>');
            }
            else{
                $('#notificacionPaquete').html('');
            }

            if (respuesta['paquetesExternos'] > 0){
                cadena = respuesta['paquetesExternos'] > 1 ? respuesta['paquetesExternos'] + ' Notificaciones paquetería externa' : respuesta['paquetesExternos'] + ' Notificación paquetería externa';
                //$('#notificacionPaqueteExterno').html('<a href="paqueteriaRevision"><i class="fa fa-truck text-black"></i>'+ cadena +'</a>');
                $('#notificacionPaqueteExterno').html('<form id="expandirPestanaPaqueteExternoFormulario" action="paqueteriaRevision" method="post">'+
                                                                '<input type="hidden" name="expandirPestanaExterna" value="true"/>'+
                                                                '<a href="#" id="expandirPestanaPaqueteExterno"><i class="fa fa-truck text-black"></i>'+ cadena +'</a>'+
                                                            '</form>');
            }
            else{
                $('#notificacionPaqueteExterno').html('');
            }

            if (respuesta['tickets'] > 0){
                if(respuesta['mensajesTickets'] > 0){
                    PushMensajes.crearMensaje('Notificaciones Intranet AE!','Tienes una respuesta a tu ticket');

                    $.ajax({
                        type: "POST",
                        url: ruta_server + "controllers/AjaxTickets.php",
                        dataType: "json",
                        data: { resetearMensajes : true}
                    }).done(function(respuesta) {
                        console.log(respuesta);
                    }).fail(function(error) {console.log('Ocurrio un error:', error);});
                }
                cadena = respuesta['tickets'] > 1 ? respuesta['tickets'] + ' Respuestas a tus tickets' : respuesta['tickets'] + ' Respuesta a tu ticket';
                $('#notificacionTickets').html(' <form id="expandirPestanaTicketFormulario" action="tickets-soporte" method="post">'+
                                                                '<input type="hidden" name="expandirPestanaHistorial" value="true" />'+
                                                                '<a href="#" id="expandirPestanaTicketHistorial"><i class="fa fa-ticket text-black"></i>'+ cadena +'</a>'+
                                                            '</form>');
            }
            else{
                $('#notificacionTickets').html('');
            }

            $('.cambio-guardia').click(function(e){
                e.preventDefault();
                $('#ventanaPreguntaCambioGuardia').modal('show'); // abrir
                $('#nombreUsuarioCambioGuardia').html('<br>Tienes una solicitud para cambiar guardia con: <br> <b>'+ respuesta['permuta'] +'</b> <hr>El día: <b>'+ respuesta['inicio'] +'</b> (fecha de guardia del peticionario).<br>Por el día: <b>'+ respuesta['fin']  +'</b> <br><br><p class="callout callout-info">¿Deseas aceptarla? <i class="fa fa-question-circle-o fa-2x"></i></p>');
                $('#botonesFormularioCambioGuardia').html('<button type="button" class="btn btn-success aceptarCambiodeGuardia" name="aceptar" value="'+ respuesta['idPermiso'] +'">Sí, aceptar</button>' +
                                                          ' <button type="button" class="btn btn-danger aceptarCambiodeGuardia" name="cancelar" value="'+ respuesta['idPermiso'] +'">No, rechazar</button>');
                if (respuesta["imagen"] != null) {
                    $("#fotografiaUsuarioPermuta").attr("src", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
                } else {
                    $("#fotografiaUsuarioPermuta").attr("src", ruta_server + "views/img/user.png");
                }
            });

            $('.aceptarCambiodeGuardia').click(function(){
                formularioGuardia(this);
             });

             $('#expandirVentanaSolicitudes').click(function(){
                $("#expandirformularioSolicitudes").submit();
             });

             $('#expandirPestanaPaqueteExterno').click(function(){
                $("#expandirPestanaPaqueteExternoFormulario").submit();
             });

             $('#expandirPestanaTicketHistorial').click(function(){//subir
                $("#expandirPestanaTicketFormulario").submit();
             });
        }
    });
}
//####################################################################################################

$('#expandirVentanaSolicitudes').click(function(){
    $("#expandirformularioSolicitudes").submit();
});

$('#expandirPestanaPaqueteExterno').click(function(){
    $("#expandirPestanaPaqueteExternoFormulario").submit();
 });
 
 $('#expandirPestanaTicketHistorial').click(function(){////subir
    $("#expandirPestanaTicketFormulario").submit();
 });


$('.cambio-guardia').click(function(e){
    e.preventDefault();
    $('#ventanaPreguntaCambioGuardia').modal('show');
});

$('.aceptarCambiodeGuardia').click(function(){
   formularioGuardia(this);
});

function formularioGuardia(e){
    let respuesta=0;
    if($(e).attr('name') == 'aceptar'){
        respuesta=1;
    }
    else{
        respuesta=2;
    }

    if(respuesta > 0){
        let datosFormulario = new FormData();
        datosFormulario.append("respuestaFormularioCambioGuardia", respuesta);
        datosFormulario.append("idSolicitudCambioGuardia", $(e).attr('value'));
                $.ajax({
                    url: ruta_server + "controllers/ajaxPermisos.php",
                    method: "POST",
                    data: datosFormulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"json",
                    success: function(respuesta) {
                        if(!respuesta['error']) {
                            swal({ type: respuesta['tipo'], title:respuesta['mensaje'], text:respuesta['mensaje2'], allowOutsideClick: false })
                            .then((result) => {
                                if (result) {
                                    //$('#ventanaPreguntaCambioGuardia').modal('hide');
                                    location.href = ruta_server + "usuariosPass";
                                }
                            }).catch(swal.noop);
                        }
                        else{
                            swal(respuesta['mensaje'],  respuesta['mensaje2'],  respuesta['tipo']);
                        }
                    }
                });
    }
}
/*******************************ACTUALIZAR IMAGEN DE PERFIL PERSONAL************************************************************************/
/*********************************************************************************************************************************/
$('#imagenPerfilUsuario').change(function(e) {
    let file = e.target.files[0];
    let valido = (/\.(?=jpg|png|jpeg)/gi).test(file.name);

    if (!valido) {
        swal("Sólo se permiten imagenes", "Formato: .jpg, .jpeg y .png", "error").catch(swal.noop);
        $('#imagenPerfilUsuario').val('');
        $('#imgenSalidaPerfil').attr("src", $('#imgenSalidaPerfil').attr("alt"));
        return;
    }

    let fileSizeLimit = 2; // In MB
    if (file.size > fileSizeLimit * 1024 * 1024) {
        swal("La imagen tiene un tamaño mayor al permitido", "El peso máximo es de 2 MB", "error").catch(swal.noop);
        $('#imagenPerfilUsuario').val('');
        $('#imgenSalidaPerfil').attr("src", $('#imgenSalidaPerfil').attr("alt"));
        return;
    }

    let reader = new FileReader();
    reader.onload = fileOnload3;
    reader.readAsDataURL(file);
});

function fileOnload3(e) {
    let result = e.target.result;
    $('#imgenSalidaPerfil').attr("src", result);
}

let formularioImagenPerfil = document.getElementById('formularioImagenPerfil');
$("#formularioImagenPerfil").submit(function(e) {
    e.preventDefault();
    if ($('#imagenPerfilUsuario').val() == "") {
        swal("Selecciona una nueva imagen de perfil", "", "error").catch(swal.noop);
        return;
    }
    let datosFormulario = new FormData(formularioImagenPerfil);
    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datosFormulario,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == 0) {
                swal("Selecciona una nueva imagen de perfil", "", "error");
            } else if (respuesta == 1) {
                swal("Sólo se permiten imagenes", "Formato: .jpg, .jpeg y .png", "error");
            } else if (respuesta == 2) {
                swal({ type: 'error', title: 'La imagen tiene un tamaño mayor al permitido', text: 'El peso máximo es de 2 MB', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = ruta_server + "usuariosPass";
                        }
                    }).catch(swal.noop);
            } else if (respuesta == 3) {
                swal({ type: 'success', title: 'La imagen se actualizó correctamente', text: '', allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = ruta_server + "usuariosPass";
                        }
                    }).catch(swal.noop);
            } else
                swal("Ocurrio un error: ", respuesta, "error").catch(swal.noop);
        }
    });
});
/*******************************BUSCAR SOLICITUDES RH********************************************************************************/
/*********************************************************************************************************************************/
$(".mostrarPermisoUsuario").click(function() {
    mostrarPermisoUsuario($(this).parent().parent().attr("id"));
});

function mostrarPermisoUsuario(e) {
    let mostrarRegistro = new FormData();
    let idGlobal;
    mostrarRegistro.append("idRegistroPermiso", e);
    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: mostrarRegistro,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#target4').html($(respuesta["datos"]));
            idGlobal = respuesta["campoAcualizar"];
            if (respuesta["status"] > 0) {
                recargar_solicitudes();
               $('#' + respuesta["campoAcualizar"]).find('.'+ respuesta['icono']).html('<i class="fa fa-eye text-green fa-2x"></i>');
                let mostrarRegistro = new FormData();
                mostrarRegistro.append("tipoSolicitudMostrar", 4);
                $.ajax({
                    url: ruta_server + "controllers/ajaxPermisos.php",
                    method: "POST",
                    data: mostrarRegistro,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        $('#actualizarSolicitudesVistas').text(respuesta);
                    }
                });
            }

            if (respuesta["imagen"] != null) {
                $("#fotografiaUsuario").attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta["imagen"] + "");
                $("#fotografiaUsuario").attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
            } else {
                $("#fotografiaUsuario").attr("src", ruta_server + "views/img/user.png");
                $("#fotografiaUsuario").attr("alt", ruta_server + "views/img/user.png");
            }

            if(respuesta["status2"]){ //muestro el formulario de autorizacion para RH
                $("#autorizarSolicitud").change(function() {
                    if (parseInt($('#autorizarSolicitud').val()) === 0) {
                        $('#targetDenegarSolicitud').html('<label>Motivo de negación:</label> <i class="fa fa-check-circle text-green"></i><textarea name="negacionPermiso" class="form-control bloquear-textarea textoMay" rows="8" required></textarea><br>');
                        $('#ocultarSueldo,#ocultarJustificante,#ocultarReincorporacion,#ocultarMensaje,#ocultarFechaSolicitada,#ocultarFechaFin').html('');
                    } else {
                        $('#targetDenegarSolicitud').html('');
                        $('#ocultarSueldo').html('<label for="">Goce de sueldo: </label> <i class="fa fa-check-circle text-green"></i><select class="form-control textoMay" name="autorizarGoceSueldo" required><option value=""></option><option value="1">SÍ</option><option value="0">NO</option></select>');
                        $('#ocultarJustificante').html('<label for="">Presentó justificante: </label> <i class="fa fa-check-circle text-green"></i><select class="form-control textoMay" name="presentarJustificante" required><option value=""></option><option value="1">SÍ</option><option value="0">NO</option></select>');
                        $('#ocultarReincorporacion').html('<label for="">Fecha de reincorporación: </label><input  class="form-control" type="date" name="fechaReincorporacion">');
                        $('#ocultarMensaje').html('<p class="callout callout-success">¿Deseas modificar datos de la solicitud? <i class="fa fa-question-circle-o fa-2x"></i></p>');
                        $('#ocultarFechaSolicitada').html('<label for="">Fecha solicitada: </label> <input type="date" class="select-style" name="actualizarFechaSolicitada" value="' + respuesta['fechaInicio'] + '">');
                        $('#ocultarFechaFin').html('<label for="">Fecha finalización: </label> <input type="date" class="select-style" name="actualizarFechaFin" value="' + respuesta['fechaFin'] + '">');
                    }
                });
    
                let formulario = document.getElementById('formularioSolicitudAutorizacion');
                $("#formularioSolicitudAutorizacion").submit(function(e) {
                    e.preventDefault();
                    let datosFormulario = new FormData(formulario); /*for([key,value] of datosFormulario.entries()) console.log(key + ":" + value);*/
                    datosFormulario.append("idPermisoAutorizar", respuesta["campoAcualizar"]);
                    datosFormulario.append("tipo_permiso", respuesta["tipoSolicitud"]);
                    datosFormulario.append("idSolicitante", respuesta["usuarioSolicitante"]);
                    $.ajax({
                        url: ruta_server + "controllers/ajaxPermisos.php",
                        method: "POST",
                        data: datosFormulario,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            if (respuesta == 0) {
                                swal({
                                    type: 'error',
                                    title: 'Ocurrio un error',
                                    text: '¡Intentalo de nuevo!'
                                });
                            } 
                            else if (respuesta == 1) {
                                if ($("#autorizarSolicitud").val() == 1) {
                                    $('#' + idGlobal).find('.campoRH').html('<i class="fa fa-check-square text-green fa-2x"></i>');
                                    let mostrarRegistro = new FormData();
                                    mostrarRegistro.append("tipoSolicitudMostrar", 2);
                                    $.ajax({
                                        url: ruta_server + "controllers/ajaxPermisos.php",
                                        method: "POST",
                                        data: mostrarRegistro,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        dataType: "json",
                                        success: function(respuesta) {
                                            $('#actualizarSolicitudesAutorizadas').text(respuesta);
                                        }
                                    });
                                } else {
                                    $('#' + idGlobal).find('.campoRH').html('<i class="fa fa-window-close text-red fa-2x"></i>');
                                    let mostrarRegistro = new FormData();
                                    mostrarRegistro.append("tipoSolicitudMostrar", 3);
                                    $.ajax({
                                        url: ruta_server + "controllers/ajaxPermisos.php",
                                        method: "POST",
                                        data: mostrarRegistro,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        dataType: "json",
                                        success: function(respuesta) {
                                            $('#actualizarSolicitudesCanceladas').text(respuesta);
                                        }
                                    });
                                }
                                swal({ type: 'success', title: 'La solicitud se registró correctamente', text: '', allowOutsideClick: false })
                                    .then((result) => {
                                        if (result) {
                                            $("#mostrarPermisosModal .close").click();
                                        }
                                    }).catch(swal.noop);
                            } else if (respuesta == 8) {
                                swal({
                                    type: 'warning',
                                    title: 'No escribas caracteres especiales',
                                    text: 'Sólo letras, números, paréntesis y espacios'
                                });
                            } else
                                swal("Ocurrio un error", respuesta, "error");
                        }
                    });
                });
            }
           
           else {

                $("#autorizarSolicitud2").change(function() { //muestro el formulario de autorizacion para JEFE
                    if (parseInt($('#autorizarSolicitud2').val()) === 0) {
                        $('#targetDenegarSolicitud2').html('<label>Motivo de negación:</label> <i class="fa fa-check-circle text-green"></i><textarea name="negacionPermiso2" class="form-control bloquear-textarea textoMay" rows="8" required></textarea><br>');
                    } else  if (parseInt($('#autorizarSolicitud2').val()) === 1){
                        $('#targetDenegarSolicitud2').html('<label>Observaciones:</label><textarea name="observacionesAutorizarPermiso" class="form-control bloquear-textarea textoMay" rows="8" placeholder="Si lo deseas puedes indicarle a Recursos Humanos si este permiso se solicita con o sin goce de sueldo"></textarea><br>');
                    }
                    else{
                        $('#targetDenegarSolicitud2').html('');
                    }
                });

                let formulario = document.getElementById('formularioSolicitudAutorizacionJefe');
                $("#formularioSolicitudAutorizacionJefe").submit(function(e) {
                    e.preventDefault();
                    let datosFormulario = new FormData(formulario); 
                    datosFormulario.append("idPermisoAutorizar2", respuesta["campoAcualizar"]);
                    $.ajax({
                        url: ruta_server + "controllers/ajaxPermisos.php",
                        method: "POST",
                        data: datosFormulario,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            if (respuesta == 0) {
                                swal({
                                    type: 'error',
                                    title: 'Ocurrio un error',
                                    text: '¡Intentalo de nuevo!'
                                });
                            } 
                            else if (respuesta == 1) {
                                if ($("#autorizarSolicitud2").val() == 1) {
                                    $('#' + idGlobal).find('.campoJefe').html('<i class="fa fa-check-square text-green fa-2x"></i>');
                                    let mostrarRegistro = new FormData();
                                    mostrarRegistro.append("tipoSolicitudMostrar", 2);
                                    $.ajax({
                                        url: ruta_server + "controllers/ajaxPermisos.php",
                                        method: "POST",
                                        data: mostrarRegistro,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        dataType: "json",
                                        success: function(respuesta) {
                                            $('#actualizarSolicitudesAutorizadas').text(respuesta);
                                        }
                                    });
                                } 
                                else {
                                    $('#' + idGlobal).find('.campoJefe').html('<i class="fa fa-window-close text-red fa-2x"></i>');
                                    let mostrarRegistro = new FormData();
                                    mostrarRegistro.append("tipoSolicitudMostrar", 3);
                                    $.ajax({
                                        url: ruta_server + "controllers/ajaxPermisos.php",
                                        method: "POST",
                                        data: mostrarRegistro,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        dataType: "json",
                                        success: function(respuesta) {
                                            $('#actualizarSolicitudesAutorizadas').text(respuesta);
                                        }
                                    });
                                }
                                swal({ type: 'success', title: 'La solicitud se registró correctamente', text: '', allowOutsideClick: false })
                                    .then((result) => {
                                        if (result) {
                                            $("#mostrarPermisosModal .close").click();
                                        }
                                    }).catch(swal.noop);
                            } else if (respuesta == 8) {
                                swal({
                                    type: 'warning',
                                    title: 'No escribas caracteres especiales',
                                    text: 'Sólo letras, signos de puntuación, números, paréntesis y espacios'
                                });
                            } else
                                swal("Ocurrio un error", respuesta, "error");
                        }
                    });
                });
            }

            let ruta = ruta_server + "views/pdf/generarPdfSolicitud.php";
            $(".formatoPdf").click(function() {
                window.open(ruta + '?idPermiso=' + $(this).attr('id'), "nombre de la ventana")
            });

        }
    });
}

/****************************************BOTONES SOLICITUDES INDIVIDUAL*********************************/

$(".detallesSolicitudUsuario").click(function() {
    detallesPermisoUsuarios($(this).parent().parent().attr("id"),$(this));
});

function detallesPermisoUsuarios(valor,referencia) {
    let datos = new FormData();
    datos.append("detallesSolicitudUsuario", valor);
    $('#targetDetallesSolicitud').html('<div style="text-align:center"><img src=' + ruta_server + '"views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#targetDetallesSolicitud').html(respuesta['datos']);
            if(respuesta['icono']==1)
                $(referencia).children().html('<i class="fa fa-eye text-black"></i>');
            recargar_solicitudes();

            
            let ruta = ruta_server + "views/pdf/generarPdfSolicitud.php";
            $(".formatoPdf").click(function() {
                window.open(ruta + '?idPermiso=' + $(this).attr('id'), "nombre de la ventana")
            });
        }
    });
}

$(".borrarPermisoUsuario").click(function() {
    borrarPermisoUsuario($(this).parent().parent().parent().parent().attr("id"));
});

function borrarPermisoUsuario(valor) {
    
    swal({
        title: '¿Quieres borrar tu solicitud?',
        text: "",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/ajaxPermisos.php",
            dataType: "json",
            data: { borrarPermisoUsuario: valor
            }
        }).done(function(respuesta) {
            if(!respuesta['error']){
                swal({ type: respuesta['tipo'], title: respuesta['mensaje'], text: respuesta['mensaje2'], allowOutsideClick: false })
                .then((result) => {
                    let f = document.createElement("form");
                    f.setAttribute('method',"post");
                    f.setAttribute('action',"usuariosPass");
                    f.setAttribute('id',"expandirformularioSolicitudes");
                    let i = document.createElement("input");
                    i.setAttribute('type',"hidden");
                    i.setAttribute('name',"expandirSolicitudes");
                    i.setAttribute('value',"true");
                    f.appendChild(i);
                    document.getElementsByTagName('body')[0].appendChild(f);
                    $('#expandirformularioSolicitudes').submit();
                }).catch(swal.noop);
            }
            else
                swal({ type: respuesta['tipo'], title:respuesta['mensaje'], text:respuesta['mensaje2']});
        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }).catch((result)=> {
    });
}

/*<form id="expandirformularioSolicitudes" action="usuariosPass" method="post">'+
                                                                '<input type="hidden" name="expandirSolicitudes" value="true"/>'+
                                                                '<a href="#" id="expandirVentanaSolicitudes"><i class="fa fa-file-o text-aqua"></i>'+ cadena +'</a>'+
                                                            '</form>*/

/******************************FILTROS SOLICITUDES PERMISOS JEFE Y RH**************************************/
/*$('#fechaOrdenarSolicitudes').blur(function() {
    filtrosSolicitudes();
});

$('#cargarAjaxSituacionSolicitudes,#cargarAjaxSucursalSolicitudes').change(function() {
    filtrosSolicitudes();
});

$('#buscadorUsuariosPermisos').on('input', function() {
    filtrosSolicitudes();
});*/

$('#aplicarFiltrosSolicitudes').click(function(){
    filtrosSolicitudes();
});

function filtrosSolicitudes() {
    let datos = new FormData();
    datos.append("buscadorPermisos", $('#buscadorUsuariosPermisos').val());
    datos.append("cargarSituacionSolicitudes", $('#cargarAjaxSituacionSolicitudes').val());
    datos.append("cargarSucursalSolicitudes", $('#cargarAjaxSucursalSolicitudes').val());
    datos.append("cargarFechaSolicitudes", $('#fechaOrdenarSolicitudes').val());

    datos.append("paginaActual", '1');
    datos.append("registrosPorPagina", $('#paginacionSolicitudesMostrar').find('ul').attr('registros'));
    datos.append("tipoUsuario", $('#paginacionSolicitudesMostrar').find('ul').attr('nivel'));
    datos.append("idUsuario", $('#paginacionSolicitudesMostrar').find('ul').attr('idusuario'));
    datos.append("target", $('#paginacionSolicitudesMostrar').find('ul').attr('target'));

    $('#mostrarDatosUsuariosSolicitudes').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#mostrarDatosUsuariosSolicitudes').html(respuesta['data']);
            $('#paginacionSolicitudesMostrar2,#paginacionSolicitudesMostrar').html(respuesta['mostrar']);

            $(".mostrarPermisoUsuario").click(function() {
                mostrarPermisoUsuario($(this).parent().parent().attr("id"));
            });

            $('.formularioDinamico').click(function(e) {
                switch ($(this).parent().parent().attr("target")) {
                    case 'solicitudes':
                        paginador(e, this);
                    break;
                    case 'usuarios':
                        paginador2(e, this);
                    break;
                    case 'correos':
                        paginador3(e, this);
                    break;
                    case 'equipos':
                        paginador4(e, this);
                    break;
                    case 'usuariosPass':
                        paginador5(e, this);
                    break;
                    case 'paquetesInternos':
                        paginador6(e, this);
                    break;
                    case 'paquetesExternos':
                        paginador7(e, this);
                    break;
                    case 'tickets':
                        paginador8(e, this);
                    break;
                }
            });
        }
    });
}
/*******************PAGINADOR*****************************************/
/*********************************************************************/
$('.formularioDinamico').click(function(e) {
    switch ($(this).parent().parent().attr("target")) {
        case 'solicitudes':
            paginador(e, this);
        break;
        case 'usuarios':
            paginador2(e, this);
        break;
        case 'correos':
            paginador3(e, this);
        break;
        case 'equipos':
            paginador4(e, this);
        break;
        case 'usuariosPass':
            paginador5(e, this);
        break;
        case 'paquetesInternos':
            paginador6(e, this);
        break;
        case 'paquetesExternos':
            paginador7(e, this);
        break;
        case 'tickets':
            paginador8(e, this);
        break;
    }
});

function paginador(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("buscadorPermisos", encodeURIComponent($('#buscadorUsuariosPermisos').val()));
    datos.append("cargarSituacionSolicitudes", $('#cargarAjaxSituacionSolicitudes').val());
    datos.append("cargarSucursalSolicitudes", $('#cargarAjaxSucursalSolicitudes').val());
    datos.append("cargarFechaSolicitudes", $('#fechaOrdenarSolicitudes').val());

    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("tipoUsuario", $(elemento).parent().parent().attr("nivel"));
    datos.append("idUsuario", $(elemento).parent().parent().attr("idusuario"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarDatosUsuariosSolicitudes').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');

    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#mostrarDatosUsuariosSolicitudes').html(respuesta['data']);
            $('#paginacionSolicitudesMostrar2,#paginacionSolicitudesMostrar').html(respuesta['mostrar']);

            $('.formularioDinamico').click(function(x) {
                paginador(x, this);
            });

            $(".mostrarPermisoUsuario").click(function() {
                mostrarPermisoUsuario($(this).parent().parent().attr("id"));
            });

            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });
        }
    });
}

function paginador2(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("busqueda", encodeURIComponent($('#buscadorUsuarios').val()));
    datos.append("cargarSucursalActual", $('#cargarAjaxSucursal').val());
    datos.append("cargarSituacionActual", $('#cargarAjaxSituacion').val());

    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarDatosUsuarios').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');

    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#mostrarDatosUsuarios').html(respuesta['data']);
            $('#paginacionUsuariosMostrar2,#paginacionUsuariosMostrar').html(respuesta['mostrar']);

            $(".mostrarUsuario").click(function() {
                mostrarUsuario($(this).parent().parent().attr("id"));
            });
            $(".borrarUsuario").click(function() {
                eliminarUsuario($(this).parent().parent().attr("id"));
            });
            $(".actualizarPassUsuario").click(function() {
                actualizarPassUsuario($(this).parent().parent().attr("id"));
            });

            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });

            $(window).resize(function(){ //reajustar contenido despues de que la resolucion haya sido menor a la definida
                actualizarResolucion($(window).width())
            });


            $('.formularioDinamico').click(function(x) {
                paginador2(x, this);
            });       
        }
    });
}

function paginador3(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("buscadorCorreos", encodeURIComponent($('#buscadorUsuariosCorreos').val()));
    datos.append("cargarCorreosActual", $('#cargarAjaxCorreos').val());

    let paginacion = $(elemento);
    datos.append("paginaActual", paginacion.parent().attr("actual"));
    datos.append("registrosPorPagina", paginacion.parent().parent().attr("registros"));
    datos.append("target", paginacion.parent().parent().attr("target"));
    datos.append("apuntar", paginacion.parent().parent().attr("apuntar"));
    $('#mostrarDatosUsuariosCorreos').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');

    $.ajax({
        url: ruta_server + "controllers/ajaxUsuarios.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#mostrarDatosUsuariosCorreos').html(respuesta['data']);
            $('#paginacionCorreosMostrar2,#paginacionCorreosMostrar').html(respuesta['mostrar']);

            $('.formularioDinamico').click(function(x) {
                paginador3(x, this);
            });   

            $(".mostrarUsuarioCorreos").click(function() {
                mostrarUsuarioCorreos($(this).parent().parent().attr("id"));
            });

            $('.detalleUsuarioNutrifitness').click(function(){
                $(this).parent().siblings(".campoVisto").children("input").prop('checked', true);
                Nutricion.detalleUsuario($(this).parent().parent().attr("id"));
            });

            $('.grupoChecked').click(function(){
                Nutricion.seleccionarRegistros($(this).prop('checked'),$(this).parent().parent().attr("id"));
            });
        }
    });
}

function paginador4(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("buscadorUsuariosEquipos", encodeURIComponent($('#buscadorEquipos').val()));
    datos.append("buscadorSucursalEquipos", $('#cargarAjaxSucursalEquipos').val());
    datos.append("buscadorSituacionEquipos", $('#cargarAjaxSituacionEquipos').val());

    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarDatosEquipos').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/ajaxEquipos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#mostrarDatosEquipos').html(respuesta['data']);
            $('#paginacionEquiposMostrar2,#paginacionEquiposMostrar').html(respuesta['mostrar']);

            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });

            $(window).resize(function(){ //reajustar contenido despues de que la resolucion haya sido menor a la definida
                actualizarResolucion($(window).width())
            });

            $(".mostrarEquipo").click(function() {
                mostrarEquipo($(this).parent().parent().attr("id"));
            });

            $(".eliminarEquipo").click(function() {
                eliminarEquipo($(this).parent().parent().attr("id"));
            });
            
            $('.formularioDinamico').click(function(x) {
                paginador4(x, this);
            });       
        }
    });
}




function paginador5(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("banderaPaginadorUsuarioStandar",true);
    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarDatosSolicitante').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/ajaxPermisos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#mostrarDatosSolicitante').html(respuesta['data']);
            $('#paginacionPermisosSolicitante2,#paginacionPermisosSolicitante').html(respuesta['mostrar']);

            /*$('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });

            $(window).resize(function(){ //reajustar contenido despues de que la resolucion haya sido menor a la definida
                actualizarResolucion($(window).width())
            });*/
            $(".borrarPermisoUsuario").click(function() {
                borrarPermisoUsuario($(this).parent().parent().parent().parent().attr("id"));
            });            

            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });

            $(".detallesSolicitudUsuario").click(function() {
                detallesPermisoUsuarios($(this).parent().parent().attr("id"));
                recargar_solicitudes();
            });
            
            $('.formularioDinamico').click(function(x) {
                paginador5(x, this);
            });       
        }
    });
}


function paginador6(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("fechaPaqueteInterno", $('#fechaPaquetesInternos').val());
    datos.append("situacionPaqueteInterno", $('#situacionPaquetesInternos').val());
  
    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarDatosPaquetesInternos').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/AjaxPaqueteria.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#mostrarDatosPaquetesInternos').html(respuesta['data']);
            $('#paginacionPaquetesInternos,#paginacionPaquetesInternos2').html(respuesta['mostrar']);        
            $('.formularioDinamico').click(function(x) {
                paginador6(x, this);
            });    
            
            $(".mostrarDetallesPaqueteInterno").click(function() {
                Paqueteria.detallesPaqueteInterno($(this).parent().parent().attr("id"));
            });

            $('.botonMaxMin').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });
        }
    });
}

function paginador7(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("fechaPaqueteExterno", $('#fechaPaquetesExternos').val());
    datos.append("situacionPaqueteExterno", $('#situacionPaquetesExternos').val());
  
    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarDatosPaquetesExternos').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/AjaxPaqueteria.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $('#mostrarDatosPaquetesExternos').html(respuesta['data']);
            $('#paginacionPaquetesExternos,#paginacionPaquetesExternos2').html(respuesta['mostrar']);        
            $('.formularioDinamico').click(function(x) {
                paginador7(x, this);
            });    
            
            $(".mostrarDetallesPaqueteExterno").click(function() {
                Paqueteria.detallesPaqueteExterno($(this).parent().parent().attr("id"));
            });

            $('.botonMaxMin2').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });
        }
    });
}



function paginador8(e, elemento) {  
    e.preventDefault();
    let datos = new FormData();
    datos.append("fechaTicketCerrado", $('#fechasTickets').val());
    datos.append("nombrePersonaRegistroTicket", $('#buscadorUsuariosTickets').val());

    datos.append("paginaActual", $(elemento).parent().attr("actual"));
    datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
    datos.append("target", $(elemento).parent().parent().attr("target"));
    $('#mostrarHistorialTickets').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
    $.ajax({
        url: ruta_server + "controllers/AjaxTickets.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $('#mostrarHistorialTickets').html(respuesta['data']);
            $('#paginacionTickets,#paginacionTickets2').html(respuesta['mostrar']);        
            $('.formularioDinamico').click(function(x) {
                paginador8(x, this);
            });    
          
            $('.mostrarDatosTicketFinalizados').click(function(){
                Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
            });

            $('.mostrarDatosHistorialTickets').click(function(){
                Tickets.historialTicket($(this).attr('value'));
            });

           /* $('.botonMaxMin2').click(function(){//activar boton más cuando la resolución de la pantalla sea poca
                botonMaxMin($(this));
            });*/
        }
    });
}


/*************************************BOTONES DE MOSTRAR MENOS O MÁS EN RESPONSIVE*************************************************/
/**********************************************************************************************************************************/
$('.botonMaxMin,.botonMaxMin2').click(function(){
    botonMaxMin($(this));
});

function botonMaxMin(valor){
    if(valor.attr("src") == "views/img/circle-max.png" ){
        valor.parent().parent().siblings('.divContenedorHijo').show();
        valor.attr("src", "views/img/circle-min.png");
    }
    else{
        valor.parent().parent().siblings('.divContenedorHijo').hide();
        valor.attr("src", "views/img/circle-max.png");
    }
}

$(window).resize(function(){
    actualizarResolucion($(window).width())
});

function actualizarResolucion(ancho){
    if( ancho >= 1201 && $('.divContenedorHijo').is(':hidden')) {
        $('.divContenedorHijo').show();
        $('.botonMaxMin').attr("src", "views/img/circle-max.png");
        $('.divContenedorHijo').css({'display':'flex','flex-wrap':'wrap','flex-direction':'row','justify-content':'center','align-items':'center'});
        $('.campoTelefono,.campoDireccion').css('justify-content','flex-start');
    }
    else if( ancho < 1201 && $('.divContenedorHijo').is(':visible')) {
        $('.divContenedorHijo').hide();
        $('.botonMaxMin').attr("src", "views/img/circle-max.png");
    }
}
/******************************************************DESCARGAR ARCHIVOS***********************************************************************/
class RutasDescargar{

    static iniciar(data){
        $('#recargarPeriodos').html('<img src="'+ ruta_server + 'views/img/status.gif" id="status" class="statusCrow">');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxRutasDescargas.php",
            dataType: "json",
            data: { anioFiscal : data}
        }).done(function(respuesta) {
            $('#recargarPeriodos').html(respuesta.data);
            $('#periodoNomina').change(function(){
                if( $(this).val() != '' ){
                    buscarReciboCFDI();
                }
                else{
                    $('#nombreArchivoDescargar').prop("disabled", true );
                    $('#nombreArchivoDescargar').removeClass('btn-info');
                }
            })
        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }
}

$('#anoFiscal').change(function(){
    if($('#tipoRecibo').val() != '' && $(this).val() != ''){
            RutasDescargar.iniciar($('#anoFiscal option:selected').text());
    }
    else{
        $('#recargarPeriodos').html('<select class="form-control textoMay" name="periodoNomina" id="periodoNomina" required readonly><option value=""></option></select>');
        $('#nombreArchivoDescargar').prop("disabled", true );
        $('#nombreArchivoDescargar').removeClass('btn-info');
        $('#tipoRecibo').val("");
        $('#tipoRecibo').change();
    }
 });

 $('#tipoRecibo').change(function(){
    if($('#anoFiscal').val() != '' && $(this).val() != ''){
            RutasDescargar.iniciar($('#anoFiscal option:selected').text());
    }
    else{
        $('#recargarPeriodos').html('<select class="form-control textoMay" name="periodoNomina" id="periodoNomina" required readonly><option value=""></option></select>');
        $('#nombreArchivoDescargar').prop("disabled", true );
        $('#nombreArchivoDescargar').removeClass('btn-info');
    }
 });

 $('#formatoNomina').change(function(){
    buscarReciboCFDI()
 });

 function buscarReciboCFDI(){
    let ruta= $('#anoFiscal').val(); 
    let periodo= $('#periodoNomina').val();
    let tipo = $('#tipoRecibo').val();
    let formato = $('#formatoNomina').val();
    let fragmento = 'SYS/S033 ';
    if(tipo == 1){
        fragmento = 'ASIM/S033 ';
        let errorGiro = $("#anoFiscal option:selected").text();
        if(errorGiro == '2019' && periodo < 6){
            periodo = '202'+periodo;
        }
        else{
            periodo = '90'+periodo;
        }
    }
    $('#nombreArchivoDescargar').prop("disabled", true );
    $('#nombreArchivoDescargar').removeClass('btn-info');    

    $.ajax({
        type: "POST",
        url: ruta_server + "controllers/AjaxRutasDescargas.php",
        dataType: "json",
        data: { completarRuta : ruta,
                periodo,
                tipo,
                formato
        }
    }).done(function(respuesta2) {
        if(respuesta2.existe) {
            if(respuesta2.orden == "sindicato"){
                $('#nombreArchivoDescargar').attr('value', ( ruta +fragmento +periodo + ' Sindicato/' + 'ASIM 1 PRUEBA_'+ respuesta2.clave));
                $('#formatoArchivoNomina').attr('value',formato);
            }
            else if(respuesta2.orden == "sindicato2"){
                $('#nombreArchivoDescargar').attr('value', ( ruta +fragmento +periodo + ' Sindicato/' + 'S033 '+ periodo +'_'+ respuesta2.clave));
                $('#formatoArchivoNomina').attr('value',formato);
            }
            else if(respuesta2.orden==true){
                let rp="/RP ";
                if(respuesta2.registro === "")
                    rp="/RP";
                $('#nombreArchivoDescargar').attr('value', ( ruta +fragmento +periodo + rp +respuesta2.registro+'/Depto '+respuesta2.departamento+'/NOM S033 '+ periodo +' - '+ respuesta2.clave +'_'+respuesta2.retimbrado) );
                $('#formatoArchivoNomina').attr('value',formato);
            }
               
            else{
                $('#nombreArchivoDescargar').attr('value', ( ruta +fragmento +periodo +'/NOM S033 '+ periodo +' - '+ respuesta2.clave +'_'+respuesta2.retimbrado) );
                $('#formatoArchivoNomina').attr('value',formato);
            }
            $('#nombreArchivoDescargar').prop("disabled", false );
            $('#nombreArchivoDescargar').addClass('btn-info');
       }
       else{
        swal({ type: 'error', title:'No se encontró el archivo', text:'Comunicate con el departamento de RH'});
        console.log(respuesta2);
       }

    }).fail(function(error) {
        console.log('Ocurrio un error:', error);
    });
 }




 /*****************************PAQUETERIA ************************************/
 class Paqueteria{

    static listarEmpleados(id){
        let datos = new FormData();
        datos.append("asignarEquipoAUsuario", id);
        $.ajax({
            url: ruta_server + "controllers/ajaxEquipos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $('#targetdestinatarioPaquete').html(respuesta.html);
                if(respuesta.verificarSucursalLocal > 0){
                    $.ajax({
                        type: "POST",
                        url: ruta_server + "controllers/AjaxPaqueteria.php",
                        dataType: "json",
                        data: { getMensajerosInternos: respuesta.verificarSucursalLocal
                        }
                    }).done(function(data) {
                        $('#cargarMensajeroLocal').html('<div class="row">'+
                                                            '<div class="col-md-6">'+
                                                                '<p class="callout callout-success">Tu paquete tiene como destino una sucursal local, ¿quieres asignar el paquete a alguno de nuestros mensajeros?, en caso de no hacerlo el personal de recepción lo asignará:</p>'+
                                                            '</div>'+
                                                            '<div class="col-md-6">'+
                                                                '<label for="">8.-Asignar paquete a:</label>'+
                                                                '<select class="form-control textoMay" name="mensajeroInterno" id="mensajeroInterno">'+
                                                                '<option value=""></option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</div>');
                        let arreglo = data.mensajeros;
                        let select = document.getElementById('mensajeroInterno');
                        for (let value in arreglo) {
                            let option = document.createElement("option");
                            option.text = arreglo[value][1];
                            option.value = arreglo[value][0];
                            select.add(option);
                        }
                    }).fail(function(error) {
                        console.log('Ocurrio un error:', error);
                    });
                }
                else{
                    $('#cargarMensajeroLocal').html('');
                }
                
            }
        });
    }

    static cargarCodigoPostal(codigo){
        $('#estadoPaqueteria').html('<img src="'+ ruta_server + 'views/img/status.gif" id="status" class="statusCrow">');
        $("#municipioPaqueteria").html('<img src="'+ ruta_server + 'views/img/status.gif" id="status" class="statusCrow">');
        let url = "http://"+window.location.host+"/api-codigos-postales-v1/index.php/Codigo/codigo/" + codigo + "";
        fetch(url)
            .then((resp) => resp.json())
            .then((data) => {
                $("#municipioPaqueteria").val(data.municipio);
                $("#estadoPaqueteria").val(data.estado);
                $('#targetColoniaPaqueteria').html('<select class="form-control textoMay" id="coloniaPaqueteria" name="coloniaPaqueteria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\\s.]{2,}" required><option></option></select>');
                let arreglo = data.colonias;
                let value;
                arreglo.sort();
                let select = document.getElementById('coloniaPaqueteria');
                for (value in arreglo) {
                    let option = document.createElement("option");
                    option.text = arreglo[value];
                    select.add(option);
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    static envioInterno(datos){
        let formulario = new FormData(datos);
        $.ajax({
            url: ruta_server + "controllers/AjaxPaqueteria.php",
            method: "POST",
            data: formulario,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                if(respuesta.error){
                    swal(respuesta['mensaje'],  respuesta['mensaje2'],  respuesta['tipo']);
                }
                else{
                    swal({ type: respuesta['tipo'], title:respuesta['mensaje'], text:respuesta['mensaje2'], allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = ruta_server + "paqueteriaCaptura";
                            datos.reset();
                        }
                    }).catch(swal.noop);
                }
            }
        });
            
    }

    static envioExterno(datos){
        let formulario = new FormData(datos);
        $.ajax({
            url: ruta_server + "controllers/AjaxPaqueteria.php",
            method: "POST",
            data: formulario,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                if(respuesta.error){
                    swal(respuesta['mensaje'],  respuesta['mensaje2'],  respuesta['tipo']);
                }
                else{
                    swal({ type: respuesta['tipo'], title:respuesta['mensaje'], text:respuesta['mensaje2'], allowOutsideClick: false })
                    .then((result) => {
                        if (result) {
                            location.href = ruta_server + "paqueteriaCaptura";
                            datos.reset();
                        }
                    }).catch(swal.noop);
                }
            }
        });
    }

    static detallesPaqueteInterno(id_paquete){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxPaqueteria.php",
            dataType: "json",
            data: { noEnvioInterno : id_paquete}
        }).done(function(respuesta) {
                $('#targetPaqueteInterno').html(respuesta["datos"]);
                $('#targetPaqueteInterno2').html(respuesta["datos2"]);
                $('#labelTipoPaquete').html(respuesta["tipo"]);
                if (respuesta["imagen"] != null) {
                    $("#fotografiaUsuario").attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta["imagen"] + "");
                    $("#fotografiaUsuario").attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
                } else {
                    $("#fotografiaUsuario").attr("src", ruta_server + "views/img/user.png");
                    $("#fotografiaUsuario").attr("alt", ruta_server + "views/img/user.png");
                }

                if(respuesta['icono'] == 1){
                    recargar_solicitudes();
                    $('#' + id_paquete).find('.campoDetalle').children().children().html('<i class="fa fa-eye text-black"></i>');
                }
                
                $('#paqueteEntregado').click(function(){
                    swal({
                        title: 'Sí haz recibido el paquete presiona el boton aceptar, para que nos indiques sí llego completo y en buen estado',
                        text: "",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar'
                    }).then((resultado) => {
                        //$('#mostrarPaqueteriaInternaModal').attr('data-backdrop','static');
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { finalizacionPaqueteInterno: id_paquete
                            }
                        }).done(function(resp) {
                            if(resp.error){
                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                            }
                            else{
                                    $('#mostrarPaqueteriaInternaModal').modal('hide');
                                    $('#cuestionarioPaqueteInterno').modal('show');
                                    $('#formularioRecepcionPaqueteInterno').submit(function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            type: "POST",
                                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                                            dataType: "json",
                                            data: { recibidoCompletoInterno: $('#completoInterno').val(),
                                                    recibidoEstadoInterno: $('#estadoInterno').val(),
                                                    recibidoComentariosInterno: $('#descripcionRecepcionInterna').val(),
                                                    paqueterecibidoInterno: id_paquete
                                            }
                                        }).done(function(resp) {
                                            if(resp.error){
                                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                                            }
                                            else{
                                                    $('#mostrarPaqueteriaInternaModal').modal('hide');
                                                    swal({
                                                        title: 'Se finalizó el proceso correctamente',
                                                        text: "",
                                                        type: 'success',
                                                        timer:2000,
                                                        showConfirmButton: false
                                                    })
                                                    location.href = ruta_server + "paqueteriaRevision";
                                            }
                                        }).fail(function(error) {
                                            console.log('Ocurrio un error:', error);
                                        });
                                    });
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });
                    }).catch((error) => {
                        $('#mostrarPaqueteriaInternaModal').modal('hide');
                    });
                });
            
                $('#paqueteCancelarInterno').click(function(){
                    
                    swal({
                        title: '¿ Deseas cancelar el envio de este paquete ?',
                        text: "",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, cancelar',
                        cancelButtonText: 'No'
                    }).then((resultado) => {

                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { cancelarPaqueteInterno: id_paquete
                            }
                        }).done(function(resp) {
                            if(resp.error){
                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                            }
                            else{
                                    $('#mostrarPaqueteriaInternaModal').modal('hide');
                                    swal({
                                        title: 'Se canceló el envio correctamente',
                                        text: "",
                                        type: 'success',
                                        timer:2000,
                                        showConfirmButton: false
                                    })
                                    location.href = ruta_server + "paqueteriaRevision";
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });


                    }).catch((error) => {
                        $('#mostrarPaqueteriaInternaModal').modal('hide');
                    });

                });

                $('#paqueteRecolectadoInterno').click(function(){
                    
                    swal({
                        title: 'Presiona el botón aceptar para avisar al remitente y al destinatario que el paquete ya va en camino',
                        text: "",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar'
                    }).then((resultado) => {

                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { enCaminoPaqueteInterno: id_paquete
                            }
                        }).done(function(resp) {
                            if(resp.error){
                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                            }
                            else{
                                    $('#mostrarPaqueteriaInternaModal').modal('hide');
                                    swal({
                                        title: 'Se actualizó el registro correctamente',
                                        text: "",
                                        type: 'success',
                                        timer:2000,
                                        showConfirmButton: false
                                    })
                                    location.href = ruta_server + "paqueteriaRevision";
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });


                    }).catch((error) => {
                        $('#mostrarPaqueteriaInternaModal').modal('hide');
                    });

                });
               

                $('#actualizarPaqueteRecepcionInterna').click(function(){
                    $('#actualizarMensajeriaInterna').html(respuesta['paqueterias']); 
                    $('#actualizarGuiaInterna').html('<input class="textoMay miSelect" type="text" id="guiaInterna" name="guiaInterna">');
                    
                    $('#nombrePaqueteria').change(function(){
                        if($(this).val()==2){
                            console.log('Paquete:' + id_paquete);
                             $.ajax({
                                type: "POST",
                                url: ruta_server + "controllers/AjaxPaqueteria.php",
                                dataType: "json",
                                data: { getMensajerosInternos2: true
                                }
                            }).done(function(data) {
                                $('#actualizarGuiaInterna').html('<select class="textoMay miSelect" style="max-width:194px;" name="guiaInterna" id="guiaInterna">'+
                                                                    '<option value=""></option>'+
                                                                 '</select>');
                                let arreglo = data.mensajeros;
                                console.log(arreglo);
                                let select = document.getElementById('guiaInterna');
                                for (let value in arreglo) {
                                    let option = document.createElement("option");
                                    option.text = arreglo[value][1];
                                    option.value = arreglo[value][0];
                                    select.add(option);
                                }
                            }).fail(function(error) {
                                console.log('Ocurrio un error:', error);
                            });
                        }
                          
                        else{
                            $('#actualizarGuiaInterna').html('<input class="textoMay miSelect" type="text" id="guiaInterna" name="guiaInterna">');
                        }
                            
                    });

                    $('#cambiarBotonInterna').html('<button type="submit" class="btn btn-success">Aceptar</button>');
                    $('#formularioEnviarPaqueteInterno').submit(function(e){
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { nombrePaqueteriaEnvioInterno: $('#nombrePaqueteria').val(),
                                    numeroGuiaEnvioInterno : $('#guiaInterna').val(),
                                    numeroPaqueteEnvioInterno : respuesta["paquete"]
                            }
                        }).done(function(respuestaActualizacion) {
                            if(respuestaActualizacion.error){
                                swal(respuestaActualizacion['mensaje'], respuestaActualizacion['mensaje2'],  respuestaActualizacion['tipo']);
                            }
                            else{
                                swal({ type: respuestaActualizacion['tipo'], title:respuestaActualizacion['mensaje'], text:respuestaActualizacion['mensaje2'], allowOutsideClick: false })
                                .then((result) => {
                                    if (result) {
                                        $('#mostrarPaqueteriaInternaModal').modal('hide');
                                        location.href = ruta_server + "paqueteriaRevision";
                                    }
                                }).catch(swal.noop);
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });

                    });

                });

        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static detallesPaqueteExterno(id_paquete){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxPaqueteria.php",
            dataType: "json",
            data: { noEnvioExterno : id_paquete}
        }).done(function(respuesta) {
               $('#targetDetallePaqueteExterno').html(respuesta["datos"]);
               $('#targetPaqueteExterno').html(respuesta["datos2"]);
               if (respuesta["imagen"] != null) {
                    $("#fotografiaUsuario2").attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta["imagen"] + "");
                    $("#fotografiaUsuario2").attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
                } 
                else {
                    $("#fotografiaUsuario2").attr("src", ruta_server + "views/img/user.png");
                    $("#fotografiaUsuario2").attr("alt", ruta_server + "views/img/user.png");
                }

                if(respuesta['icono'] == 1){
                    recargar_solicitudes();
                    $('#' + id_paquete).find('.campoDetalle').children().children().html('<i class="fa fa-eye text-black"></i>');
                }

                $('#paqueteEntregadoExterno').click(function(){
                    
                    swal({
                        title: 'Sí el paquete fue recibido presiona el boton aceptar para finalizar el proceso',
                        text: "",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar'
                    }).then((resultado) => {

                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { finalizacionPaqueteExterno: id_paquete
                            }
                        }).done(function(resp) {
                            if(resp.error){
                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                            }
                            else{
                                    $('#mostrarPaqueteriaExternaModal').modal('hide');
                                    swal({
                                        title: 'Se finalizó el proceso correctamente',
                                        text: "",
                                        type: 'success',
                                        timer:2000,
                                        showConfirmButton: false
                                    })
                                    $('#activarPestanaExternos').submit();
                                    //location.href = ruta_server + "paqueteriaRevision";
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });


                    }).catch((error) => {
                        $('#mostrarPaqueteriaExternaModal').modal('hide');
                    });

                });

                $('#paqueteRecolectadoExterno').click(function(){
                    swal({
                        title: 'Presiona el botón aceptar para avisar al remitente que el paquete ya va en camino',
                        text: "",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar'
                    }).then((resultado) => {

                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { enCaminoPaqueteExterno: id_paquete
                            }
                        }).done(function(resp) {
                            if(resp.error){
                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                            }
                            else{
                                    $('#mostrarPaqueteriaExternaModal').modal('hide');
                                    swal({
                                        title: 'Se actualizó el registro correctamente',
                                        text: "",
                                        type: 'success',
                                        timer:2000,
                                        showConfirmButton: false
                                    })
                                    location.href = ruta_server + "paqueteriaRevision";
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });

                    }).catch((error) => {
                        $('#mostrarPaqueteriaExternaModal').modal('hide');
                    });
                });

                $('#paqueteCancelarExterno').click(function(){
                    
                    swal({
                        title: '¿ Deseas cancelar el envio de este paquete ?',
                        text: "",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, cancelar',
                        cancelButtonText: 'No'
                    }).then((resultado) => {

                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { cancelarPaqueteExterno: id_paquete
                            }
                        }).done(function(resp) {
                            if(resp.error){
                                swal(resp['mensaje'], resp['mensaje2'],  resp['tipo']);
                            }
                            else{
                                    $('#mostrarPaqueteriaExternaModal').modal('hide');
                                    swal({
                                        title: 'Se canceló el envio correctamente',
                                        text: "",
                                        type: 'success',
                                        timer:2000,
                                        showConfirmButton: false
                                    })
                                    $('#activarPestanaExternos').submit();
                                    //location.href = ruta_server + "paqueteriaRevision";
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });


                    }).catch((error) => {
                        $('#mostrarPaqueteriaExternaModal').modal('hide');
                    });

                });

                $('#actualizarPaqueteRecepcion').click(function(){
                    $('#actualizarMensajeriaExterna').html(respuesta['paqueterias']);                                 
                    $('#actualizarGuiaExterna').html('<input class="textoMay miSelect" type="text" id="guia" name="guia">');
                    $('#cambiarBoton').html('<button type="submit" class="btn btn-success">Aceptar</button>');
                    $('#formularioEnviarPaqueteExterno').submit(function(e){
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxPaqueteria.php",
                            dataType: "json",
                            data: { nombrePaqueteriaEnvio: $('#nombrePaqueteria').val(),
                                    numeroGuiaEnvio : $('#guia').val(),
                                    numeroPaqueteEnvio : respuesta["paquete"]
                            }
                        }).done(function(respuestaActualizacion) {
                            if(respuestaActualizacion.error){
                                swal(respuestaActualizacion['mensaje'], respuestaActualizacion['mensaje2'],  respuestaActualizacion['tipo']);
                            }
                            else{
                                swal({ type: respuestaActualizacion['tipo'], title:respuestaActualizacion['mensaje'], text:respuestaActualizacion['mensaje2'], allowOutsideClick: false })
                                .then((result) => {
                                    if (result) {
                                        $('#mostrarPaqueteriaExternaModal').modal('hide');
                                        $('#activarPestanaExternos').submit();
                                    }
                                }).catch(swal.noop);
                            }
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });

                    });

                });

        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static filtrosPaquetesInternos(){
        $('#mostrarDatosPaquetesInternos').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxPaqueteria.php",
            dataType: "json",
            data: { fechaPaqueteInterno : $('#fechaPaquetesInternos').val(),
                    situacionPaqueteInterno : $('#situacionPaquetesInternos').val(),
                    paginaActual : 1,
                    registrosPorPagina : $('#paginacionPaquetesInternos').find('ul').attr('registros'),
                    target : $('#paginacionPaquetesInternos').find('ul').attr('target')
            }
        }).done(function(respuesta) {
            $('#mostrarDatosPaquetesInternos').html(respuesta['data']);
            $('#paginacionPaquetesInternos,#paginacionPaquetesInternos2').html(respuesta['mostrar']);
            $('.formularioDinamico').click(function(e) {
                switch ($(this).parent().parent().attr("target")) {
                    case 'solicitudes':
                        paginador(e, this);
                    break;
                    case 'usuarios':
                        paginador2(e, this);
                    break;
                    case 'correos':
                        paginador3(e, this);
                    break;
                    case 'equipos':
                        paginador4(e, this);
                    break;
                    case 'usuariosPass':
                        paginador5(e, this);
                    break;
                    case 'paquetesInternos':
                        paginador6(e, this);
                    break;
                    case 'paquetesExternos':
                        paginador7(e, this);
                    break;
                    case 'tickets':
                        paginador8(e, this);
                    break;
                }
            });
            
            $(".mostrarDetallesPaqueteInterno").click(function() {
                Paqueteria.detallesPaqueteInterno($(this).parent().parent().attr("id"));
            });

            $(".botonMaxMin").click(function(){
                botonMaxMin($(this));
            });

        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static filtrosPaquetesExternos(){
        $('#mostrarDatosPaquetesExternos').html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxPaqueteria.php",
            dataType: "json",
            data: { fechaPaqueteExterno : $('#fechaPaquetesExternos').val(),
                    situacionPaqueteExterno : $('#situacionPaquetesExternos').val(),
                    paginaActual : 1,
                    registrosPorPagina : $('#paginacionPaquetesExternos').find('ul').attr('registros'),
                    target : $('#paginacionPaquetesExternos').find('ul').attr('target')
            }
        }).done(function(respuesta) {
            $('#mostrarDatosPaquetesExternos').html(respuesta['data']);
            $('#paginacionPaquetesExternos,#paginacionPaquetesExternos2').html(respuesta['mostrar']);
            $('.formularioDinamico').click(function(e) {
                switch ($(this).parent().parent().attr("target")) {
                    case 'solicitudes':
                        paginador(e, this);
                    break;
                    case 'usuarios':
                        paginador2(e, this);
                    break;
                    case 'correos':
                        paginador3(e, this);
                    break;
                    case 'equipos':
                        paginador4(e, this);
                    break;
                    case 'usuariosPass':
                        paginador5(e, this);
                    break;
                    case 'paquetesInternos':
                        paginador6(e, this);
                    break;
                    case 'paquetesExternos':
                        paginador7(e, this);
                    break;
                    case 'tickets':
                        paginador8(e, this);
                    break;
                }
            });

            $(".mostrarDetallesPaqueteExterno").click(function() {
                Paqueteria.detallesPaqueteExterno($(this).parent().parent().attr("id"));
            });

            $(".botonMaxMin2").click(function(){
                botonMaxMin($(this));
            });

        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static iniciarClase(){

        $('#sucursalDestinoPaquete').change(function(){
            if($(this).val() != ''){
               Paqueteria.listarEmpleados($(this).val());
            }
            else{
                 $('#targetdestinatarioPaquete').html('<select class="form-control textoMay" name="equipoUsuarioCargo" readonly><option></option></select>');
            }
       });
       
       $('#codigoPostalPaquete').on('input',function() {
           if($(this).val().length == 5){
               Paqueteria.cargarCodigoPostal($(this).val());
           }
           else{
               $("#estadoPaqueteria").val('');
               $("#municipioPaqueteria").val('');
               $('#targetColoniaPaqueteria').html('<select class="form-control textoMay" name="coloniaPaqueteria" readonly required><option></option></select>');
           }
       });
       
       $('#formularioPaqueteInterno').submit(function(e){
           e.preventDefault();
           Paqueteria.envioInterno($(this)[0]);
       });
       
       $('#formularioPaqueteExterno').submit(function(e){
           e.preventDefault();
           Paqueteria.envioExterno($(this)[0]);
       });
       
       $("#formularioCancelarPaqueteInterno").click(function() {
           $('#formularioPaqueteInterno')[0].reset();
           $('#targetdestinatarioPaquete').html('<select class="form-control textoMay" name="equipoUsuarioCargo"  readonly><option></option></select>');
           $('#cargarMensajeroLocal').html('');
       });
       
       $("#formularioCancelarPaqueteExterno").click(function() {
           $('#formularioPaqueteExterno')[0].reset();
           $("#estadoPaqueteria").val('');
           $("#municipioPaqueteria").val('');
           $('#targetColoniaPaqueteria').html('<select class="form-control textoMay" name="coloniaPaqueteria" readonly required><option></option></select>');
       });
       
       $(".mostrarDetallesPaqueteInterno").click(function() {
           Paqueteria.detallesPaqueteInterno($(this).parent().parent().attr("id"));
       });
       
       $('#aplicarFiltrosPaquetesInternos').click(function(){
            if( $('#fechaPaquetesInternos').val() !== '' || $('#situacionPaquetesInternos').val() != 1){
                $('#fechaPaquetesInternos').val('');
                $('#situacionPaquetesInternos').val(1);
                $('#situacionPaquetesInternos').change();
                Paqueteria.filtrosPaquetesInternos();
            }
       });

       $('#fechaPaquetesInternos').change(function(){
            if(MetodosDiversos.init_validate_date($(this).val())){
                Paqueteria.filtrosPaquetesInternos();
            }    
        });

        $('#situacionPaquetesInternos').change(function(){
            Paqueteria.filtrosPaquetesInternos();
        });


       $('#aplicarFiltrosPaquetesExternos').click(function(){
            if( $('#fechaPaquetesExternos').val() !== '' || $('#situacionPaquetesExternos').val() != 1){
                $('#fechaPaquetesExternos').val('');
                $('#situacionPaquetesExternos').val(1);
                $('#situacionPaquetesExternos').change();
                Paqueteria.filtrosPaquetesInternos();
            }
            Paqueteria.filtrosPaquetesExternos();
        });

        $('#fechaPaquetesExternos').change(function(){
            if(MetodosDiversos.init_validate_date($(this).val())){
                Paqueteria.filtrosPaquetesExternos();
            }    
        });

        $('#situacionPaquetesExternos').change(function(){
            Paqueteria.filtrosPaquetesExternos();
        });

       $(".mostrarDetallesPaqueteExterno").click(function() {
        Paqueteria.detallesPaqueteExterno($(this).parent().parent().attr("id"));
      });

    }
 }

Paqueteria.iniciarClase();


$('.formularioInicio').click(function(){
    if($('#usuarioIngreso').val() != ""){
        let input = document.createElement("input");
        input.type = 'hidden';
        input.name = 'solicitarLinkAcceso';
        input.value = true;
        $('#formIngreso')[0].appendChild(input);
        $('#formIngreso').submit();
    }
    else{
        swal({
            title: '',
            text: 'Escribe el nombre de usuario y vuelve a dar click en esta opción',
            type: 'error',
            timer: 20000,
            showConfirmButton: true,
            allowOutsideClick: false
        }).catch(swal.noop);
    }
   
});


$('#mibonX').click(function(){
    console.log('inicia descargar')
   
});



/*window.onload = function() {
    console.log('cargar finalizada');
 }*/

/**************************************************CONSULTAS GIRO*********************************/
/*$('#desacargasGiro').click(function(){
    $.ajax({
        type: "POST",
        url: ruta_server + "controllers/ConsultasGiro.php",
        dataType: "json",
        data: { ejecutarConsulta : true
        }
    }).done(function(respuesta) {
        console.log(respuesta.respuesta);
    
    }).fail(function(error) {
        console.log('Ocurrio un error:', error);
    });    
})*/


/******************************************************************************************************/
/*(function(){//Función anónima autoejecutable
    $('#ventanaNotificaciones').modal('show');
 }());*/
