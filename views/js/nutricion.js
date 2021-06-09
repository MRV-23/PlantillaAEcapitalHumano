class Nutricion{

    constructor(){
        this.cambiarPerfil = $('#botonCambiarPerfil');
        this.guardarPerfil = $('#guardarCambiarPerfil');
        this.detalleUsuario = $('.detalleUsuarioNutrifitness');
        this.leche = $('.grupoLeche');
        this.cereales = $('.grupoCereales');
        this.leguminosas = $('.grupoLeguminosas');
        this.carne = $('.grupoCarne');
        this.fruta = $('.grupoFruta');
        this.verdura = $('.grupoVerdura');
        this.grasa = $('.grupoGrasa');
        this.ventanaLeche = $('#modalLeche');
        this.ventanaCereal = $('#modalCereal');
        this.ventanaLeguminosa = $('#modalLeguminosa');
        this.ventanaCarne = $('#modalCarne');
        this.ventanaFruta = $('#modalFruta');
        this.ventanaVerdura = $('#modalVerdura');
        this.ventanaGrasa = $('#modalGrasa');
        this.modificarPlan = $('#modificarPlan');
        this.guardarPlan = $('#guardarPlan');
        this.claseInputPlan = $('.input-nutrifitness');
        this.claseInputLaboratorio = $('.input-nutrifitness-laboratorio');
        this.claseInputComposicion = $('.input-nutrifitness-composicion');
        this.claseInputFisicoEvaluacion = $('.input-nutrifitness-fisico-evaluacion');
        this.claseInputFisicoPlan = $('.input-nutrifitness-fisico-plan');
        this.colasion = $('#colasion');
        this.comentariosLaboratorio = $('#comentariosLaboratorio');
        this.comentariosComposicion = $('#comentariosComposicion');
        this.formularioPlan = $('#formularioPlan');
        this.formularioLaboratorio = $('#formularioLaboratorio');
        this.modificarLaboratorio = $('#modificarLaboratorio');
        this.guardarLaboratorio = $('#guardarLaboratorio');
        this.formularioComposicion = $('#formularioComposicion');
        this.modificarComposicion = $('#modificarComposicion');
        this.guardarComposicion = $('#guardarComposicion');
        this.descripcionEspecial = $('#descripcionUsuarioEspecial');
        this.documentoCargar = $('#documento');
        this.portada = $('#portada');
        this.lienzo = $('#lienzoDocumentoNutricion');
        this.lienzo2 = $('#lienzoImagenNutricion');
        this.formularioArchivo = $('#formularioCargarNutricion');
        this.formularioEvaluacionFisica = $('#formularioResultadosFisico');
        this.modificarEvaluacionFisica = $('#modificarResultadosFisico');
        this.guardarEvaluacionFisica = $('#guardarResultadosFisico');
        this.formularioPlanFisico = $('#formularioPlanFisico');
        this.modificarPlanFisico = $('#modificarPlanFisico');
        this.guardarPlanFisico = $('#guardarPlanFisico');
        this.semana = $('.planFisico');
        this.imc = $('#imc');
        this.clasificacionImc = $('#clasificacionImc');
        this.cintura = $('#cintura');
        this.clasificacionCintura = $('#clasificacionCintura');
        this.contenedoresTalleres = $('#contenedoresTalleres');
        this.checkedJefe = $('#checkedJefe');
        this.subordinados = $('.grupoChecked');
        this.pdf = $(".planAlimenticio");
        this.comentariosEvaluacion = $('#comentariosEvaluacionFisica');
        this.botonEquipo =  $('.botonEquipo');
        this.listaEquipo = $('#listaEquipo');
        this.cargarIntegrantes = $('#cargarIntegrantes');
        this.nombreMiequipo = $('#nombreMiequipo');
        this.claseEquipos = $('#claseEquipos');
        this.comentariosPlan = $('#comentariosPlan');

        this.nuevoRegistroLaboratorio = $('#nuevoRegistroLaboratorio');
        this.laboratorioAnterior = $('#laboratorioAnterior');
        this.laboratorioSiguiente = $('#laboratorioSiguiente');
        this.totalRegistrosLaboratorio = $('#totalRegistrosLaboratorio');
        this.totalRegistrosLaboratorio2 = $('#totalRegistrosLaboratorio2');
        this.totalRegistrosLaboratorio3 = $('#totalRegistrosLaboratorio3');
        this.actualizarRegistroLaboratorio = $('#actualizarRegistroLaboratorio');

        this.nuevoRegistroComposicion = $('#nuevoRegistroComposicion');
        this.composicionAnterior = $('#composicionAnterior');
        this.composicionSiguiente = $('#composicionSiguiente');
        this.totalRegistrosComposicion = $('#totalRegistrosComposicion');
        this.totalRegistrosComposicion2 = $('#totalRegistrosComposicion2');
        this.totalRegistrosComposicion3 = $('#totalRegistrosComposicion3');
        this.actualizarRegistroComposicion = $('#actualizarRegistroComposicion');

        this.nuevoRegistroAlimentacion = $('#nuevoRegistroAlimentacion');
        this.alimentacionAnterior = $('#alimentacionAnterior');
        this.alimentacionSiguiente = $('#alimentacionSiguiente');
        this.totalRegistrosAlimentacion = $('#totalRegistrosAlimentacion');
        this.totalRegistrosAlimentacion2 = $('#totalRegistrosAlimentacion2');
        this.totalRegistrosAlimentacion3 = $('#totalRegistrosAlimentacion3');
        this.actualizarRegistroAlimentacion = $('#actualizarRegistroAlimentacion');

        this.nuevoRegistroFisica = $('#nuevoRegistroFisica');
        this.fisicaAnterior = $('#fisicaAnterior');
        this.fisicaSiguiente = $('#fisicaSiguiente');
        this.totalRegistrosFisica = $('#totalRegistrosFisica');
        this.totalRegistrosFisica2 = $('#totalRegistrosFisica2');
        this.totalRegistrosFisica3 = $('#totalRegistrosFisica3');
        this.actualizarRegistroFisica = $('#actualizarRegistroFisica');

        this.nuevoRegistroPlan = $('#nuevoRegistroPlan');
        this.planAnterior = $('#planAnterior');
        this.planSiguiente = $('#planSiguiente');
        this.totalRegistrosPlan = $('#totalRegistrosPlan');
        this.totalRegistrosPlan2 = $('#totalRegistrosPlan2');
        this.totalRegistrosPlan3 = $('#totalRegistrosPlan3');
        this.actualizarRegistroPlan = $('#actualizarRegistroPlan');

        this.rutaPdf = $('#rutaPdf');

    }

    static detalleUsuario(id) {
        $('body').append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxEventos.php",
            dataType: "json",
            data: { idUsuario : id
            }
        }).done(function(respuesta) {
            let genero = respuesta.genero;

            $('#modalDetalleUsuarioNutrifitness').html(respuesta.data);
            $('#modalDetalleUsuarioNutrifitness2').html(respuesta.data2);

            if (respuesta.imagen != null) {
                $("#fotografiaUsuarioNutrifitness").attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta["imagen"] + "");
                $("#fotografiaUsuarioNutrifitness").attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta["imagen"] + "");
            } else {
                $("#fotografiaUsuarioNutrifitness").attr("src", ruta_server + "views/img/user.png");
                $("#fotografiaUsuarioNutrifitness").attr("alt", ruta_server + "views/img/user.png");
            }

            let data = new Nutricion();
            data.guardarPlan.hide();
            data.guardarLaboratorio.hide();
            data.guardarComposicion.hide();
            data.guardarEvaluacionFisica.hide();
            data.guardarPlanFisico.hide();

            $("#loadImageDatos").remove();

            data.leche.click(function(){
                data.ventanaLeche.modal('show');
            });
    
            data.cereales.click(function(){
                data.ventanaCereal.modal('show');
            });
    
            data.leguminosas.click(function(){
                data.ventanaLeguminosa.modal('show');
            });
    
            data.carne.click(function(){
                data.ventanaCarne.modal('show');
            });
    
            data.fruta.click(function(){
                data.ventanaFruta.modal('show');
            });
    
            data.verdura.click(function(){
                data.ventanaVerdura.modal('show');
            });
    
            data.grasa.click(function(){
                data.ventanaGrasa.modal('show');
            });  

            data.modificarPlan.click(function(){
                data.modificarPlan.hide();
                data.guardarPlan.show();
                data.claseInputPlan.addClass('input-nutrifitness2');
                data.claseInputPlan.removeAttr("readonly");
                data.colasion.removeAttr("readonly");
                data.colasion.addClass('detalleUsuarioEspecial2');
                data.nuevoRegistroAlimentacion.prop('disabled',true);
                data.alimentacionAnterior.prop('disabled',true);
                data.alimentacionSiguiente.prop('disabled',true);
            });

            data.modificarLaboratorio.click(function(){
                data.modificarLaboratorio.hide();
                data.guardarLaboratorio.show();
                data.claseInputLaboratorio.addClass('input-nutrifitness2-laboratorio');
                data.claseInputLaboratorio.removeAttr("readonly");
                data.comentariosLaboratorio.removeAttr("readonly");
                data.comentariosLaboratorio.addClass('detalleUsuarioEspecial2');
                data.nuevoRegistroLaboratorio.prop('disabled',true);
                data.laboratorioAnterior.prop('disabled',true);
                data.laboratorioSiguiente.prop('disabled',true);
            });

            data.modificarComposicion.click(function(){
                data.modificarComposicion.hide();
                data.guardarComposicion.show();
                data.claseInputComposicion.addClass('input-nutrifitness2-composicion');
                data.claseInputComposicion.removeAttr("readonly");
                data.comentariosComposicion.removeAttr("readonly");
                data.comentariosComposicion.addClass('detalleUsuarioEspecial2');
                data.nuevoRegistroComposicion.prop('disabled',true);
                data.composicionAnterior.prop('disabled',true);
                data.composicionSiguiente.prop('disabled',true);
            });

            data.modificarEvaluacionFisica.click(function(){
                data.modificarEvaluacionFisica.hide();
                data.guardarEvaluacionFisica.show();
                data.claseInputFisicoEvaluacion.addClass('input-nutrifitness2-fisico-evaluacion');
                data.claseInputFisicoEvaluacion.removeAttr("readonly");
                data.comentariosEvaluacion.removeAttr("readonly");
                data.comentariosEvaluacion.addClass('detalleUsuarioEspecial2');
                data.nuevoRegistroFisica.prop('disabled',true);
                data.fisicaAnterior.prop('disabled',true);
                data.fisicaSiguiente.prop('disabled',true);
            });

            data.modificarPlanFisico.click(function(){
                data.modificarPlanFisico.hide();
                data.guardarPlanFisico.show();
                data.claseInputFisicoPlan.addClass('input-nutrifitness2-fisico-plan');
                data.claseInputFisicoPlan.removeAttr("readonly");
                data.semana.removeAttr("readonly");
                data.semana.addClass('detalleUsuarioEspecial2');
                data.nuevoRegistroPlan.prop('disabled',true);
                data.planAnterior.prop('disabled',true);
                data.planSiguiente.prop('disabled',true);
            });


            data.formularioPlan.submit(function(e){
                e.preventDefault();
                data.modificarPlan.show();
                data.guardarPlan.hide();
                data.claseInputPlan.removeClass('input-nutrifitness2');
                data.claseInputPlan.prop("readonly",true);
                data.colasion.prop("readonly",true);
                data.colasion.removeClass('detalleUsuarioEspecial2');
                data.nuevoRegistroAlimentacion.prop('disabled',false);
                data.alimentacionAnterior.prop('disabled',false);
                data.alimentacionSiguiente.prop('disabled',false);

                let formulario = new FormData($(this)[0]);
                formulario.append("idUsuarioDetalles", id);
                $.ajax({
                    url: ruta_server + "controllers/AjaxEventos.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(respuesta.respuesta){
                            swal({
                                title: '',
                                text: 'Guardado',
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).catch(swal.noop);
                        }
                        else{
                            swal({
                                title: 'Ocurrio un error',
                                text: 'Intente guardar otra vez',
                                type: 'error',
                                showConfirmButton: false
                            }).catch(swal.noop);
                        }   
                    }
                });
            });

            data.formularioLaboratorio.submit(function(e){
                e.preventDefault();
                data.modificarLaboratorio.show();
                data.guardarLaboratorio.hide();
                data.claseInputLaboratorio.removeClass('input-nutrifitness2-laboratorio');
                data.claseInputLaboratorio.prop("readonly",true);
                data.comentariosLaboratorio.prop("readonly",true);
                data.comentariosLaboratorio.removeClass('detalleUsuarioEspecial2');
                data.nuevoRegistroLaboratorio.prop('disabled',false);
                data.laboratorioAnterior.prop('disabled',false);
                data.laboratorioSiguiente.prop('disabled',false);

                let formulario = new FormData($(this)[0]);
                formulario.append("idUsuarioDetalles", id);
                $.ajax({
                    url: ruta_server + "controllers/AjaxEventos.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(respuesta.respuesta){
                            swal({
                                title: '',
                                text: 'Guardado',
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).catch(swal.noop);
                        }
                        else{
                            swal({
                                title: 'Ocurrio un error',
                                text: 'Intente guardar otra vez',
                                type: 'error',
                                showConfirmButton: false
                            }).catch(swal.noop);
                        }   
                    }
                });
            });

            data.formularioComposicion.submit(function(e){
                e.preventDefault();
                data.modificarComposicion.show();
                data.guardarComposicion.hide();
                data.claseInputComposicion.removeClass('input-nutrifitness2-composicion');
                data.claseInputComposicion.prop("readonly",true);
                data.comentariosComposicion.prop("readonly",true);
                data.comentariosComposicion.removeClass('detalleUsuarioEspecial2');
                data.nuevoRegistroComposicion.prop('disabled',false);
                data.composicionAnterior.prop('disabled',false);
                data.composicionSiguiente.prop('disabled',false);

                let formulario = new FormData($(this)[0]);
                formulario.append("idUsuarioDetalles", id);
                /*let key,value;
                for([key,value] of formulario.entries()) 
                console.log(key + ":" + value);*/
                $.ajax({
                    url: ruta_server + "controllers/AjaxEventos.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(respuesta.respuesta){
                            swal({
                                title: '',
                                text: 'Guardado',
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).catch(swal.noop);
                        }
                        else{
                            swal({
                                title: 'Ocurrio un error',
                                text: 'Intente guardar otra vez',
                                type: 'error',
                                showConfirmButton: false
                            }).catch(swal.noop);
                        }   
                    }
                });
            });

            data.formularioEvaluacionFisica.submit(function(e){
                e.preventDefault();
                data.modificarEvaluacionFisica.show();
                data.guardarEvaluacionFisica.hide();
                data.claseInputFisicoEvaluacion.removeClass('input-nutrifitness2-fisico-evaluacion');
                data.claseInputFisicoEvaluacion.prop("readonly",true);
                data.comentariosEvaluacion.prop("readonly",true);
                data.comentariosEvaluacion.removeClass('detalleUsuarioEspecial2');
                data.nuevoRegistroFisica.prop('disabled',false);
                data.fisicaAnterior.prop('disabled',false);
                data.fisicaSiguiente.prop('disabled',false);
                
                let formulario = new FormData($(this)[0]);
                formulario.append("idUsuarioDetalles", id);
 
                $.ajax({
                    url: ruta_server + "controllers/AjaxEventos.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(respuesta.respuesta){
                            swal({
                                title: '',
                                text: 'Guardado',
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).catch(swal.noop);
                        }
                        else{
                            swal({
                                title: 'Ocurrio un error',
                                text: 'Intente guardar otra vez',
                                type: 'error',
                                showConfirmButton: false
                            }).catch(swal.noop);
                        }   
                    }
                });
            });

            data.formularioPlanFisico.submit(function(e){
                e.preventDefault();
                data.modificarPlanFisico.show();
                data.guardarPlanFisico.hide();
                data.claseInputFisicoPlan.removeClass('input-nutrifitness2-fisico-plan');
                data.claseInputFisicoPlan.prop("readonly",true);
                data.semana.prop("readonly",true);
                data.semana.removeClass('detalleUsuarioEspecial2');
                data.nuevoRegistroPlan.prop('disabled',false);
                data.planAnterior.prop('disabled',false);
                data.planSiguiente.prop('disabled',false);
                
                let formulario = new FormData($(this)[0]);
                formulario.append("idUsuarioDetalles", id);

                $.ajax({
                    url: ruta_server + "controllers/AjaxEventos.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(respuesta.respuesta){
                            swal({
                                title: '',
                                text: 'Guardado',
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).catch(swal.noop);
                        }
                        else{
                            swal({
                                title: 'Ocurrio un error',
                                text: 'Intente guardar otra vez',
                                type: 'error',
                                showConfirmButton: false
                            }).catch(swal.noop);
                        }   
                    }
                });
            });

            data.imc.on('input',function(){
                data.clasificacionImc.text(Nutricion.imc(data.imc.val()));
            });

            data.cintura.on('input',function(){
                data.clasificacionCintura.text(Nutricion.cintura(data.cintura.val(),genero));
            });

/********************************************************** */
let totalAlimentacion = data.alimentacionAnterior.parent().attr('value');
            data.nuevoRegistroAlimentacion.click(function(){
                Nutricion.crearRegistro('¿Quieres crear un nuevo registro de "PLAN ALIMENTICIO" para este usuario?',(respuesta)=>{
                    if(respuesta){
                        let data2={ nuevoRegistro : $(this).val(),
                                    tabla: 3
                        };
                       Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
                            if(error){
                                 Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
                            }  
                            else {
                                let nuevoValor = parseInt(data.alimentacionAnterior.parent().attr('value')) + 1;
                                data.totalRegistrosAlimentacion.text(nuevoValor);
                                data.totalRegistrosAlimentacion2.text(nuevoValor);  
                                data.totalRegistrosAlimentacion3.attr('value',nuevoValor);
                                totalAlimentacion = nuevoValor;
                                data.alimentacionAnterior.prop('disabled',false);
                                data.alimentacionSiguiente.prop('disabled',false);
                                Nutricion.mostrarRespuesta('success','Hecho',1000);
                                $(".input-nutrifitness").val(0);
                                data.colasion.val('');  
                                data.actualizarRegistroAlimentacion.val(respuesta.idRegistro);
                                data.modificarPlan.click();
                            }
                       });
                    }          
               });          
            });
            data.alimentacionAnterior.click(function(){
                if(totalAlimentacion  > 1){
                    data.totalRegistrosAlimentacion.text(--totalAlimentacion);
                    Nutricion.cargarDatosAlimentacion(data,id,totalAlimentacion);
                }
            });
            data.alimentacionSiguiente.click(function(){
                if(totalAlimentacion  < data.alimentacionAnterior.parent().attr('value')){
                    data.totalRegistrosAlimentacion.text(++totalAlimentacion);
                    Nutricion.cargarDatosAlimentacion(data,id,totalAlimentacion);
                }  
            });
/*********************************************************** */
            let totalLaboratorio = data.laboratorioAnterior.parent().attr('value');
            data.nuevoRegistroLaboratorio.click(function(){
                Nutricion.crearRegistro('¿Quieres crear un nuevo registro de "RESULTADOS DE LABORATORIO" para este usuario?',(respuesta)=>{
                    if(respuesta){
                        let data2={ nuevoRegistro : $(this).val(),
                                    tabla: 1
                        };
                       Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
                            if(error){
                                 Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
                            }  
                            else {
                                let nuevoValor = parseInt(data.laboratorioAnterior.parent().attr('value')) + 1;
                                data.totalRegistrosLaboratorio.text(nuevoValor);
                                data.totalRegistrosLaboratorio2.text(nuevoValor);  
                                data.totalRegistrosLaboratorio3.attr('value',nuevoValor);
                                totalLaboratorio = nuevoValor;
                                data.laboratorioAnterior.prop('disabled',false);
                                data.laboratorioSiguiente.prop('disabled',false);
                                Nutricion.mostrarRespuesta('success','Hecho',1000);
                                $(".input-nutrifitness-laboratorio").val(0);
                                data.comentariosLaboratorio.val('');  
                                data.actualizarRegistroLaboratorio.val(respuesta.idRegistro);
                                data.modificarLaboratorio.click();
                            }
                       });
                    }          
               });          
            });
            data.laboratorioAnterior.click(function(){
                if(totalLaboratorio  > 1){
                    data.totalRegistrosLaboratorio.text(--totalLaboratorio);
                    Nutricion.cargarDatosLaboratorio(data,id,totalLaboratorio);
                }
            });
            data.laboratorioSiguiente.click(function(){
                if(totalLaboratorio  < data.laboratorioAnterior.parent().attr('value')){
                    data.totalRegistrosLaboratorio.text(++totalLaboratorio);
                    Nutricion.cargarDatosLaboratorio(data,id,totalLaboratorio);
                }  
            });

/***************************************************************** */

            let totalComposicion = data.composicionAnterior.parent().attr('value');
            data.nuevoRegistroComposicion.click(function(){
                Nutricion.crearRegistro('¿Quieres crear un nuevo registro de "COMPOSICIÓN CORPORAL" para este usuario?',(respuesta)=>{
                    if(respuesta){
                        let data2={ nuevoRegistro : $(this).val(),
                                    tabla : 2
                        };
                       Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
                            if(error){
                                 Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
                            }  
                            else {
                                let nuevoValor = parseInt(data.composicionAnterior.parent().attr('value')) + 1;
                                data.totalRegistrosComposicion.text(nuevoValor);
                                data.totalRegistrosComposicion2.text(nuevoValor);  
                                data.totalRegistrosComposicion3.attr('value',nuevoValor);
                                totalComposicion = nuevoValor;
                                data.composicionAnterior.prop('disabled',false);
                                data.composicionSiguiente.prop('disabled',false);
                                Nutricion.mostrarRespuesta('success','Hecho',1000);
                                $(".input-nutrifitness-composicion").val(0);
                                data.comentariosComposicion.val('');  
                                data.actualizarRegistroComposicion.val(respuesta.idRegistro);
                                data.modificarComposicion.click();
                            }
                       });
                    }          
               });          
            });
            data.composicionAnterior.click(function(){
                if(totalComposicion  > 1){
                    data.totalRegistrosComposicion.text(--totalComposicion);
                    Nutricion.cargarDatosComposicion(data,id,totalComposicion);
                }
            });
            data.composicionSiguiente.click(function(){
                if(totalComposicion  < data.composicionAnterior.parent().attr('value')){
                    data.totalRegistrosComposicion.text(++totalComposicion);
                    Nutricion.cargarDatosComposicion(data,id,totalComposicion);
                }  
            });
/********************************************************** */
let totalFisica = data.fisicaAnterior.parent().attr('value');
            data.nuevoRegistroFisica.click(function(){
                Nutricion.crearRegistro('¿Quieres crear un nuevo registro de "EVALUACIÓN FÍSICA" para este usuario?',(respuesta)=>{
                    if(respuesta){
                        let data2={ nuevoRegistro : $(this).val(),
                                    tabla: 4
                        };
                       Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
                            if(error){
                                 Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
                            }  
                            else {
                                let nuevoValor = parseInt(data.fisicaAnterior.parent().attr('value')) + 1;
                                data.totalRegistrosFisica.text(nuevoValor);
                                data.totalRegistrosFisica2.text(nuevoValor);  
                                data.totalRegistrosFisica3.attr('value',nuevoValor);
                                totalFisica = nuevoValor;
                                data.fisicaAnterior.prop('disabled',false);
                                data.fisicaSiguiente.prop('disabled',false);
                                Nutricion.mostrarRespuesta('success','Hecho',1000);
                                $(".input-nutrifitness-fisico-evaluacion").val(0);
                                data.comentariosEvaluacion.val('');  
                                data.actualizarRegistroFisica.val(respuesta.idRegistro);
                                data.modificarEvaluacionFisica.click();
                            }
                       });
                    }          
               });          
            });
            data.fisicaAnterior.click(function(){
                if(totalFisica  > 1){
                    data.totalRegistrosFisica.text(--totalFisica);
                    Nutricion.cargarDatosFisica(data,id,totalFisica);
                }
            });
            data.fisicaSiguiente.click(function(){
                if(totalFisica  < data.fisicaAnterior.parent().attr('value')){
                    data.totalRegistrosFisica.text(++totalFisica);
                    Nutricion.cargarDatosFisica(data,id,totalFisica);
                }  
            });

/********************************************************** */
let totalPlan = data.planAnterior.parent().attr('value');
            data.nuevoRegistroPlan.click(function(){
                Nutricion.crearRegistro('¿Quieres crear un nuevo registro de "ACONDICIONAMIENTO FÍSICO" para este usuario?',(respuesta)=>{
                    if(respuesta){
                        let data2={ nuevoRegistro : $(this).val(),
                                    tabla: 5
                        };
                        Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
                            if(error){
                                 Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
                            }  
                            else {
                                let nuevoValor = parseInt(data.planAnterior.parent().attr('value')) + 1;
                                data.totalRegistrosPlan.text(nuevoValor);
                                data.totalRegistrosPlan2.text(nuevoValor);  
                                data.totalRegistrosPlan3.attr('value',nuevoValor);
                                totalPlan = nuevoValor;
                                data.planAnterior.prop('disabled',false);
                                data.planSiguiente.prop('disabled',false);
                                Nutricion.mostrarRespuesta('success','Hecho',1000);
                                $(".input-nutrifitness-fisico-plan").val(0);
                                data.comentariosPlan.val('');  
                                data.actualizarRegistroPlan.val(respuesta.idRegistro);
                                data.modificarPlanFisico.click();
                            }
                       });
                    }          
               });          
            });
            data.planAnterior.click(function(){
                if(totalPlan  > 1){
                    data.totalRegistrosPlan.text(--totalPlan);
                    Nutricion.cargarDatosPlan(data,id,totalPlan);
                }
            });
            data.planSiguiente.click(function(){
                if(totalPlan  < data.planAnterior.parent().attr('value')){
                    data.totalRegistrosPlan.text(++totalPlan);
                    Nutricion.cargarDatosPlan(data,id,totalPlan);
                }  
            });
/*********************************************************** */

        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static cargarDatosAlimentacion(data,id,total){
        data.formularioPlan.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        let data2={ actualAlimentacion : total,
                    identificadorUsuario : id
        };
        Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
            if(error){
                $("#loadImageDatos").remove();
                Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
            }
            else {            
                data.formularioPlan.find(".input-nutrifitness").eq(0).val(respuesta.leche1);
                data.formularioPlan.find(".input-nutrifitness").eq(1).val(respuesta.cereales1); 
                data.formularioPlan.find(".input-nutrifitness").eq(2).val(respuesta.leguminosas1); 
                data.formularioPlan.find(".input-nutrifitness").eq(3).val(respuesta.carnes1); 
                data.formularioPlan.find(".input-nutrifitness").eq(4).val(respuesta.frutas1); 
                data.formularioPlan.find(".input-nutrifitness").eq(5).val(respuesta.verduras1); 
                data.formularioPlan.find(".input-nutrifitness").eq(6).val(respuesta.grasas1); 
                data.formularioPlan.find(".input-nutrifitness").eq(7).val(respuesta.leche2);
                data.formularioPlan.find(".input-nutrifitness").eq(8).val(respuesta.cereales2); 
                data.formularioPlan.find(".input-nutrifitness").eq(9).val(respuesta.leguminosas2); 
                data.formularioPlan.find(".input-nutrifitness").eq(10).val(respuesta.carnes2); 
                data.formularioPlan.find(".input-nutrifitness").eq(11).val(respuesta.frutas2); 
                data.formularioPlan.find(".input-nutrifitness").eq(12).val(respuesta.verduras2); 
                data.formularioPlan.find(".input-nutrifitness").eq(13).val(respuesta.grasas2); 
                data.formularioPlan.find(".input-nutrifitness").eq(14).val(respuesta.leche3);
                data.formularioPlan.find(".input-nutrifitness").eq(15).val(respuesta.cereales3); 
                data.formularioPlan.find(".input-nutrifitness").eq(16).val(respuesta.leguminosas3); 
                data.formularioPlan.find(".input-nutrifitness").eq(17).val(respuesta.carnes3); 
                data.formularioPlan.find(".input-nutrifitness").eq(18).val(respuesta.frutas3); 
                data.formularioPlan.find(".input-nutrifitness").eq(19).val(respuesta.verduras3); 
                data.formularioPlan.find(".input-nutrifitness").eq(20).val(respuesta.grasas3); 
                data.rutaPdf.attr('href','views/pdf/planAlimenticio.php?count=' + total);
                data.colasion.val(respuesta.colasion.replace(/<br \/>/gi, ""));
                data.actualizarRegistroAlimentacion.val(respuesta.id);
                $("#loadImageDatos").remove();
            }
        });
        
    }

    static cargarDatosLaboratorio(data,id,total){
        data.formularioLaboratorio.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        let data2={ actualLaboratorio : total,
                    identificadorUsuario : id
        };
        Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
            if(error){
                $("#loadImageDatos").remove();
                Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
            }
                
            else {            
                data.formularioLaboratorio.find(".input-nutrifitness-laboratorio").eq(0).val(respuesta.colesterol);
                data.formularioLaboratorio.find(".input-nutrifitness-laboratorio").eq(1).val(respuesta.glucosa); 
                data.formularioLaboratorio.find(".input-nutrifitness-laboratorio").eq(2).val(respuesta.HDL); 
                data.formularioLaboratorio.find(".input-nutrifitness-laboratorio").eq(3).val(respuesta.LDL); 
                data.formularioLaboratorio.find(".input-nutrifitness-laboratorio").eq(4).val(respuesta.trigliceridos); 
                data.comentariosLaboratorio.val(respuesta.comentarios.replace(/<br \/>/gi, ""));
                data.actualizarRegistroLaboratorio.val(respuesta.id);
                $("#loadImageDatos").remove();
            }
        });
        
    }

    static cargarDatosComposicion(data,id,total){
        data.formularioComposicion.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        let data2={ actualComposicion : total,
                    identificadorUsuario : id
        };
        Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
            if(error){
                $("#loadImageDatos").remove();
                Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
            }
                
            else {            
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(0).val(respuesta.peso);
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(1).val(respuesta.estatura); 
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(2).val(respuesta.musculo); 
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(3).val(respuesta.imc); 
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(4).val(respuesta.grasa_porcentaje); 
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(5).val(respuesta.grasa_kilos);
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(6).val(respuesta.grasa_biceral); 
                data.formularioComposicion.find(".input-nutrifitness-composicion").eq(7).val(respuesta.cintura);   
                data.clasificacionImc.text(Nutricion.imc(respuesta.imc)); 
                data.clasificacionCintura.text(Nutricion.cintura(respuesta.cintura,respuesta.genero)); 
                data.comentariosComposicion.val(respuesta.comentarios.replace(/<br \/>/gi, ""));
                data.actualizarRegistroComposicion.val(respuesta.id);
                $("#loadImageDatos").remove();
            }
        });
        
    }

    static cargarDatosFisica(data,id,total){
        data.formularioEvaluacionFisica.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        let data2={ actualFisica : total,
                    identificadorUsuario : id
        };
        Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
            if(error){
                $("#loadImageDatos").remove();
                Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
            }
                
            else {            
                data.formularioEvaluacionFisica.find(".input-nutrifitness-fisico-evaluacion").eq(0).val(respuesta.fc_inicial);
                data.formularioEvaluacionFisica.find(".input-nutrifitness-fisico-evaluacion").eq(1).val(respuesta.fc_final); 
                data.formularioEvaluacionFisica.find(".input-nutrifitness-fisico-evaluacion").eq(2).val(respuesta.flexibilidad); 
                data.formularioEvaluacionFisica.find(".input-nutrifitness-fisico-evaluacion").eq(3).val(respuesta.fuerza); 
                data.formularioEvaluacionFisica.find(".input-nutrifitness-fisico-evaluacion").eq(4).val(respuesta.sentadillas); 
                data.comentariosEvaluacion.val(respuesta.comentarios.replace(/<br \/>/gi, ""));
                data.actualizarRegistroFisica.val(respuesta.id);
                $("#loadImageDatos").remove();
            }
        });
        
    }

    static cargarDatosPlan(data,id,total){
        data.formularioPlanFisico.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        let data2={ actualPlan : total,
                    identificadorUsuario : id
        };
        Nutricion.consultaAjax("controllers/AjaxEventos.php", data2,(error,respuesta)=>{                          
            if(error){
                $("#loadImageDatos").remove();
                Nutricion.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
            }
                
            else {            
                data.formularioPlanFisico.find(".input-nutrifitness-fisico-plan").eq(0).val(respuesta.lunes_tiempo);
                data.formularioPlanFisico.find(".input-nutrifitness-fisico-plan").eq(1).val(respuesta.lunes_intensidad); 
                data.comentariosPlan.val(respuesta.lunes.replace(/<br \/>/gi, ""));
                data.actualizarRegistroPlan.val(respuesta.id);
                $("#loadImageDatos").remove();
            }
        });
        
    }


    static mostrarRespuesta(tipo,texto,tiempo,confirmacion=false){
        swal({
            title: '',
            text: texto,
            type: tipo,
            timer: tiempo,
            showConfirmButton: confirmacion,
            allowOutsideClick: false
        }).catch(swal.noop);
    }

    static consultaAjax(ruta,data,callback){
        $.ajax({
            type: "POST",
            url: ruta_server + ruta,
            dataType: "json",
            data: data
        }).done(function(respuesta) {
            callback(respuesta.error,respuesta);
        }).fail(function(error) {
            callback(true,error);
        });  
    }

    static crearRegistro(titulo,callback){
        swal({
            title: titulo,
            text: "",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, continuar!',
            cancelButtonText: '¡No!'
        }).then((result) => {
            callback(true);            
        }).catch((result)=> {
            callback(false);
        });
    }

    static imc(data){
        let categoriaImc = "";
        let valor = parseFloat(data);
        if(valor > 0 && valor < 18.5)
            categoriaImc = "PESO BAJO";
        else if(valor >= 18.5 && valor < 25)
            categoriaImc = "PESO NORMAL";
        else if(valor >= 25 && valor < 30)
            categoriaImc = "SOBREPESO";
        else if(valor >= 30)
            categoriaImc = "OBESIDAD";
        return categoriaImc;
    }

    static cintura(data,genero){
        let categoriaCintura = "";
        let valor = parseFloat(data);
        if(valor > 0  && (valor < 90 && genero == 'M') || (valor < 80 && genero == 'F'))
            categoriaCintura = "SALUDABLE";
        else if ((valor >= 90 && genero == 'M') || (valor >= 80 && genero == 'F'))
            categoriaCintura = "RIESGO CARDIOVASCULAR";
        return categoriaCintura;
    }

    static actualizarPerfil(data){
        data.guardarPerfil.show();
        data.cambiarPerfil.hide();
        data.descripcionEspecial.removeAttr("readonly");
        data.descripcionEspecial.addClass('detalleUsuarioEspecial2');    
    }

    static guardarPerfil(data){
        data.guardarPerfil.hide();
        data.cambiarPerfil.show();
        data.descripcionEspecial.prop("readonly",true);
        data.descripcionEspecial.removeClass('detalleUsuarioEspecial2');
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxEventos.php",
                dataType: "json",
                data: { descripcionUsuario : data.descripcionEspecial.val()
                }
            }).done(function(respuesta) {
                console.log(respuesta);
            }).fail(function(error) {
                console.log('Ocurrio un error:', error);
            });
    }

    static seleccionarRegistros(valor,id){
        if(id===0)
            $('.grupoChecked').prop('checked', valor);
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxEventos.php",
            dataType: "json",
            data: { estadoRegistros : valor,
                    todosOuno: id
            }
        }).done(function(respuesta) {
            console.log(respuesta);
         }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });        
    }
    
    static inicarClase(){
        let data = new Nutricion();
        let totalLaboratorio = data.laboratorioAnterior.parent().attr('value');
        let totalComposicion = data.composicionAnterior.parent().attr('value');
        let totalAlimentacion = data.alimentacionAnterior.parent().attr('value');
        let totalFisica = data.fisicaAnterior.parent().attr('value');
        let totalPlan = data.planAnterior.parent().attr('value');

        data.guardarPerfil.hide();

        data.botonEquipo.click(function(){
            data.listaEquipo.modal('show');
            data.nombreMiequipo.text($(this).val());
            
            if($(this).val() == 'LOS INCREIBLES')
                data.claseEquipos.css({"background-color":"#dd4b39","color":"#fff"});
            else if($(this).val() == 'REGIOS FIT')
                data.claseEquipos.css({"background-color":"#0F0C68","color":"#fff"});
            else if($(this).val() == 'TITANES DE ASESORES')
                data.claseEquipos.css({"background-color":"#000","color":"#fff"});
            else if($(this).val() == 'GOLDEN GIRLS')
                data.claseEquipos.css({"background-color":"#E8B110","color":"#fff"});
            else if($(this).val() == 'FITNESS SQUAD')
                data.claseEquipos.css({"background-color":"#e4007c","color":"#fff"});
            else if($(this).val() == 'TAPATIOS FIT')
                data.claseEquipos.css({"background-color":"#03bb85","color":"#fff"});
            else
                data.claseEquipos.css({"background-color":"#fff","color":"#000"});
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxEventos.php",
                dataType: "json",
                data: { mostrarEquipo : $(this).val()
                }
            }).done(function(respuesta) {
                data.cargarIntegrantes.html(respuesta.html);
            }).fail(function(error) {
                console.log('Ocurrio un error:', error);
            });
        });
       
        data.cambiarPerfil.click(function(){
            Nutricion.actualizarPerfil(data);
        });

        data.guardarPerfil.click(function(){
            Nutricion.guardarPerfil(data);
        });

        data.detalleUsuario.click(function(){
            $(this).parent().siblings(".campoVisto").children("input").prop('checked', true);
            Nutricion.detalleUsuario($(this).parent().parent().attr("id"));
        });

        data.laboratorioAnterior.click(function(){
            if(totalLaboratorio  > 1){
                data.totalRegistrosLaboratorio.text(--totalLaboratorio);
                Nutricion.cargarDatosLaboratorio(data,0,totalLaboratorio);
            }
                
        });
        data.laboratorioSiguiente.click(function(){
            if(totalLaboratorio  < data.laboratorioAnterior.parent().attr('value')){
                data.totalRegistrosLaboratorio.text(++totalLaboratorio);
                Nutricion.cargarDatosLaboratorio(data,0,totalLaboratorio);
            }  
        });

        data.composicionAnterior.click(function(){
            if(totalComposicion  > 1){
                data.totalRegistrosComposicion.text(--totalComposicion);
                Nutricion.cargarDatosComposicion(data,0,totalComposicion);
            }
        });
        data.composicionSiguiente.click(function(){
            if(totalComposicion  < data.composicionAnterior.parent().attr('value')){
                data.totalRegistrosComposicion.text(++totalComposicion);
                Nutricion.cargarDatosComposicion(data,0,totalComposicion);
            }  
        });

        data.alimentacionAnterior.click(function(){
            if(totalAlimentacion  > 1){
                data.totalRegistrosAlimentacion.text(--totalAlimentacion);
                Nutricion.cargarDatosAlimentacion(data,0,totalAlimentacion);
            }
        });
        data.alimentacionSiguiente.click(function(){
            if(totalAlimentacion  < data.alimentacionAnterior.parent().attr('value')){
                data.totalRegistrosAlimentacion.text(++totalAlimentacion);
                Nutricion.cargarDatosAlimentacion(data,0,totalAlimentacion);
            }  
        });

        data.fisicaAnterior.click(function(){
            if(totalFisica  > 1){
                data.totalRegistrosFisica.text(--totalFisica);
                Nutricion.cargarDatosFisica(data,0,totalFisica);
            }
        });
        data.fisicaSiguiente.click(function(){
            if(totalFisica  < data.fisicaAnterior.parent().attr('value')){
                data.totalRegistrosFisica.text(++totalFisica);
                Nutricion.cargarDatosFisica(data,0,totalFisica);
            }  
        });

        data.planAnterior.click(function(){
            if(totalPlan  > 1){
                data.totalRegistrosPlan.text(--totalPlan);
                Nutricion.cargarDatosPlan(data,0,totalPlan);
            }
        });
        data.planSiguiente.click(function(){
            if(totalPlan  < data.planAnterior.parent().attr('value')){
                data.totalRegistrosPlan.text(++totalPlan);
                Nutricion.cargarDatosPlan(data,0,totalPlan);
            }  
        });

        data.checkedJefe.click(function(){
            Nutricion.seleccionarRegistros($(this).prop('checked'),0);
        });

        data.subordinados.click(function(){
            Nutricion.seleccionarRegistros($(this).prop('checked'),$(this).parent().parent().attr("id"));
        });

        data.leche.click(function(){
            data.ventanaLeche.modal('show');
        });

        data.cereales.click(function(){
            data.ventanaCereal.modal('show');
        });

        data.leguminosas.click(function(){
            data.ventanaLeguminosa.modal('show');
        });

        data.carne.click(function(){
            data.ventanaCarne.modal('show');
        });

        data.fruta.click(function(){
            data.ventanaFruta.modal('show');
        });

        data.verdura.click(function(){
            data.ventanaVerdura.modal('show');
        });

        data.grasa.click(function(){
            data.ventanaGrasa.modal('show');
        });  


        data.documentoCargar.change(function(e) {

            let file = e.target.files[0];
            let valido = (/\.(?=pdf)/gi).test(file.name);
            
            if (!valido) {
                data.documentoCargar.val('');
                swal("Formato no válido", "Formato válido: .pdf", "error").catch(swal.noop);
                return;
            }
        
            let fileSizeLimit = 5; // In MB
            if (file.size > fileSizeLimit * 1024 * 1024) {
                data.documentoCargar.val('');
                swal("El documento tiene un tamaño mayor al permitido", "El peso máximo es de 5 MB", "error").catch(swal.noop);
                return;
            }
        
            data.lienzo.html('<div class="row">'+
                            '<div class="col-md-2">'+
                            '</div>'+                                          
                            '<div class="col-md-8" >'+ 
                                '<div class="alert alert-info alert-dismissible">'+
                                    '<i class="icon fa fa-check"></i> DOCUMENTO: '+ 
                                    file.name +
                                    '<button type="button" id="cancelarImagen" class="close" aria-hidden="true">&times;</button>'+
                                '</div>'+           
                            '</div>'+
                        '</div>'
            );
            
             $('#cancelarImagen').click(function(){
                data.documentoCargar.val('');
                data.lienzo.html('');
            });

        });


        data.portada.change(function(e) {

            let file = e.target.files[0];
            let valido = (/\.(?=jpg|jpeg|png)/gi).test(file.name);
            
            if (!valido) {
                data.portada.val('');
                swal("Formato no válido", "Formatos válidos: .jpg, .jpeg y .png", "error").catch(swal.noop);
                return;
            }
        
            let fileSizeLimit = 2; // In MB
            if (file.size > fileSizeLimit * 1024 * 1024) {
                data.portada.val('');
                swal("El documento tiene un tamaño mayor al permitido", "El peso máximo es de 2 MB", "error").catch(swal.noop);
                return;
            }
        
            data.lienzo2.html('<div class="row">'+
                            '<div class="col-md-2">'+
                            '</div>'+                                          
                            '<div class="col-md-8" >'+ 
                                '<div class="alert alert-success alert-dismissible">'+
                                    '<i class="icon fa fa-check"></i> IMAGEN: '+ 
                                    file.name +
                                    '<button type="button" id="cancelarImagen2" class="close" aria-hidden="true">&times;</button>'+
                                '</div>'+           
                            '</div>'+
                        '</div>'
            );
            
             $('#cancelarImagen2').click(function(){
                data.portada.val('');
                data.lienzo2.html('');
            });

        });

        data.formularioArchivo.submit(function(e){
            e.preventDefault();
            swal({
                title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                text: ' Por favor espere...',
                type: '',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            let formulario = new FormData($(this)[0]);
                $.ajax({
                    url: ruta_server + "controllers/AjaxEventos.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(!respuesta.error){
                            data.portada.val('');
                            data.lienzo2.html('');
                            data.documentoCargar.val('');
                            data.lienzo.html('');
                            data.formularioArchivo[0].reset();
                        } 
                        swal(respuesta.mensaje, respuesta.mensaje2, respuesta.tipo);
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxEventos.php",
                            dataType: "json",
                            data: { cargarTalleres : true
                            }
                        }).done(function(respuesta) {
                            data.contenedoresTalleres.html(respuesta.html);
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                        });

                    }
                });
        });

        let ruta = ruta_server + "views/pdf/planAlimenticio.php";
        data.pdf.click(function(e) {
            e.preventDefault();
            window.open(ruta + '?numero=1', "Plan alimenticio")
        });
 
    }
}

Nutricion.inicarClase();










