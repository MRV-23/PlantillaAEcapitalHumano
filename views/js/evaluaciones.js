class Evaluaciones{
    static init(){ 
        Evaluaciones.preguntas = $('#areaContenido');
        Evaluaciones.areaBotonesSiguienteAnterior = $('#areaBotonesNavegacion');
        Evaluaciones.botonSiguiente = $('#siguiente');
        Evaluaciones.botonAnterior = $('#anterior');
        Evaluaciones.botonIniciarEncuesta = $('#iniciarEncuesta');
        Evaluaciones.areaBotonIniciarEncuesta = $('#areaBotonEncuesta');
        Evaluaciones.formulario = $('#formularioEvaluacionGiro');
        Evaluaciones.actual = $('#preguntaActual');
        Evaluaciones.finalizar = $('#finalizarEncuesta');
        Evaluaciones.contador=1;  
        Evaluaciones.calificacion = null;
        Evaluaciones.comentario = null;
        Evaluaciones.areaReloj = $('#temporizadorEncuesta');
    }

    static paginadorInitMultiple(){
        Evaluaciones.paginador = $('.paginadorDinamico2');
        Evaluaciones.opciones = $('.mostrarEncuesta');
    }

    static paginadorInit(){
        Evaluaciones.data = $('#dataEvaluaciones');
        Evaluaciones.totalTexto = $('#totalRegistrosEvaluacion');
        Evaluaciones.mostrarPaginador = $('.paginador');
        Evaluaciones.situacion = $('#filtroSituacionEncuestas');
        Evaluaciones.buscar = $('#buscadorUsuariosEncuestas');
        Evaluaciones.ventanaModal = $('#encuestaModal');
        Evaluaciones.mostarData = $('#mostrarEvaluaciones'); 
        Evaluaciones.encabezado = $('#encabezadoNombre');   
    }

    static cargarEncuesta(){
       /* MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{cargarEncuesta:true},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else{
                $('body').append(respuesta.html);
                $('#modalMostrarEvaluacion').modal('show'); */
                 
                Evaluaciones.init();
               
                Evaluaciones.finalizar.hide();
                Evaluaciones.areaReloj.hide();
                Evaluaciones.areaBotonesSiguienteAnterior.hide();

                Evaluaciones.botonIniciarEncuesta.click(function(){
                    
                    MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{iniciarHora:true},(error,respuesta)=>{
                        if(error)
                            console.log('Ocurrio un error: ',respuesta);
                        else
                           Temporizador.main(respuesta.fecha,respuesta.hora,'#temporizadorEncuesta');
                    });

                    Evaluaciones.iniciarEncuesta();
                    Evaluaciones.areaReloj.show();
                    Evaluaciones.areaBotonesSiguienteAnterior.show();
                    Evaluaciones.areaBotonIniciarEncuesta.hide();
                    Evaluaciones.botonAnterior.prop('disabled',true);
                });

                Evaluaciones.botonSiguiente.click(function(){
                    Evaluaciones.guardarRespuesta();
                    Evaluaciones.contador++;
                    Evaluaciones.siguiente();
                });

                Evaluaciones.botonAnterior.click(function(){
                    Evaluaciones.guardarRespuesta();
                    Evaluaciones.contador--;
                    Evaluaciones.siguiente();
                });

                Evaluaciones.finalizar.click(function(){
                    Evaluaciones.guardarRespuesta();
                    MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{verificarTotalPreguntas:true},(error,respuesta)=>{
                        if(error)
                            console.log('Ocurrio un error: ',respuesta);
                        else if(respuesta.total){
                            MetodosDiversos.mostrarRespuesta('warning',respuesta.titulo,respuesta.subtitulo,60000,true); 
                        }
                        else{
                            MetodosDiversos.mostrarRespuesta('',respuesta.titulo,respuesta.subtitulo,5000,false);
                            setTimeout(function(){
                                Evaluaciones.finalizarEncuesta();
                            },4000);
                        }
                    });
                });

           /* }
        });*/
    }

    static guardarRespuesta(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{guardarRespuesta:Evaluaciones.contador,calificacion:Evaluaciones.calificacion,comentario:Evaluaciones.comentario},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
        });
    }

    static iniciarEncuesta(){
        Evaluaciones.preguntas.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;background: rgba(255,255,255,0.5);"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        
        MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{iniciarEncuesta:true},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else{
                $("#loadImageDatos").remove();
                Evaluaciones.preguntas.html(respuesta.formulario);
                Evaluaciones.calificacion = $("input[name='evaluacion']:checked").val();
                $("input[name='evaluacion']").click(function(){
                    Evaluaciones.calificacion = $(this).val();
                });
                Evaluaciones.comentario = $('#comentarios').val();
                $('#comentarios').change(function(){
                    Evaluaciones.comentario = $(this).val();
                })
                Evaluaciones.actual.html('1 de '+ respuesta.total);
            }
        });
    }

    static siguiente(){
        Evaluaciones.preguntas.append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;background: rgba(255,255,255,0.5);"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        Evaluaciones.calificacion = null;
        Evaluaciones.comentario = null;
        MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{contador:Evaluaciones.contador},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else{
                $("#loadImageDatos").remove();
                Evaluaciones.preguntas.html(respuesta.formulario);
                Evaluaciones.contador = respuesta.posicion;
                if(respuesta.max){
                    Evaluaciones.finalizar.show();
                    Evaluaciones.botonSiguiente.prop('disabled',true);
                }
                else {
                    Evaluaciones.finalizar.hide();
                    Evaluaciones.botonSiguiente.prop('disabled',false);
                }
                if(respuesta.min)
                    Evaluaciones.botonAnterior.prop('disabled',true);
                else  
                    Evaluaciones.botonAnterior.prop('disabled',false); 
                
                Evaluaciones.calificacion = $("input[name='evaluacion']:checked").val();
                $("input[name='evaluacion']").click(function(){
                    Evaluaciones.calificacion = $(this).val();
                });

                Evaluaciones.comentario = $('#comentarios').val();
                $('#comentarios').change(function(){
                      Evaluaciones.comentario = $(this).val();
                })
              
                Evaluaciones.actual.html(respuesta.posicion +' de '+ respuesta.total);
            }

        });
    }

    static finalizarEncuesta(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{finalizarEncuesta:true},(error,respuesta)=>{
            if(error) console.log('Ocurrio un error: ',respuesta);
        });
        Notificaciones.finalizarNotificacion();
        location.href = window.location.protocol + '//' + window.location.host + window.location.pathname;
    }


    static paginar(e,elemento){
        e.preventDefault();
        Evaluaciones.data.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        let datos = new FormData();
        datos.append("paginaActual", $(elemento).parent().attr("actual"));
        datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
        datos.append("target", $(elemento).parent().parent().attr("target"));
        datos.append("cliente", $(elemento).parent().parent().attr("cliente"));
        datos.append("liberado", $(elemento).parent().parent().attr("liberado"));
        Evaluaciones.recargarPaginador(datos);
    }

    static filtros(){
        Evaluaciones.data.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        let datos = new FormData();
        datos.append("paginaActual", 1);
        datos.append("registrosPorPagina", $('.paginador').find('ul').attr('registros'));
        datos.append("target", $('.paginador').find('ul').attr('target'));
        datos.append("cliente", Evaluaciones.buscar.val());
        datos.append("liberado", Evaluaciones.situacion.val());
        Evaluaciones.recargarPaginador(datos);
    }

    static recargarPaginador(datos){
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxEvaluaciones.php", datos,(error,respuesta)=>{
            if(error){
                console.log('error',error);
            }  
            else {
                Evaluaciones.data.html(respuesta.html);
                Evaluaciones.mostrarPaginador.html(respuesta.paginador);
                Evaluaciones.totalTexto.html(respuesta.total);
                
                Evaluaciones.paginadorInitMultiple();

                Evaluaciones.paginador.click(function(x){
                    Evaluaciones.paginar(x,this);
                });

                Evaluaciones.opciones.click(function(){
                    let temporal = $(this).parent();
                    Evaluaciones.ventana(temporal.parent().attr('id'),temporal.siblings('.campoEncuesta').html(),temporal.siblings('.campoEvaluacion').html(),temporal.siblings('.campoNombre').text())
                });

            }
        });
    }

    static ventana(id,encuesta,evaluacion,nombre){
        if(encuesta === '<i class="fa fa-window-minimize fa-lg" aria-hidden="true"></i>' && evaluacion === '<i class="fa fa-window-minimize fa-lg" aria-hidden="true"></i>'){
            MetodosDiversos.crearRegistro(nombre,'¿Realizar encuesta y evaluación?',(respuesta)=>{
                if(respuesta){
                    console.log('Iniciar');
                }          
           });          
        }
        else{
            MetodosDiversos.consultaAjaxData("controllers/AjaxEvaluaciones.php",{resultadosEncuesta:id},(error,respuesta)=>{
                if(error) 
                    console.log('Ocurrio un error: ',respuesta);
                else{
                    Evaluaciones.ventanaModal.modal('show');
                    Evaluaciones.encabezado.text(nombre);
                    Evaluaciones.mostarData.html(respuesta.html);
                }
            });
        }
       
    }

    static main(){

        socket.on('iniciarEvaluacionGiro',function(data){
            Notificaciones.init();
        });

        Evaluaciones.paginador.click(function(e){
            Evaluaciones.paginar(e,this);
        });

        Evaluaciones.situacion.change(function(){
            Evaluaciones.filtros();
        });

        Evaluaciones.buscar.on('input',function(){
            Evaluaciones.filtros();
        });

        Evaluaciones.opciones.click(function(){
            let temporal = $(this).parent();
            Evaluaciones.ventana(temporal.parent().attr('id'),temporal.siblings('.campoEncuesta').html(),temporal.siblings('.campoEvaluacion').html(),temporal.siblings('.campoNombre').text())
        })  

    }

}

Evaluaciones.paginadorInit();
Evaluaciones.paginadorInitMultiple();
Evaluaciones.main();




class Temporizador{

    static init(fecha,hora,target){
        Temporizador.end = new Date(fecha +' '+hora);
        Temporizador.second = 1000;
        Temporizador.minute = Temporizador.second * 60;
        Temporizador.hour = Temporizador.minute * 60;
        Temporizador.day = Temporizador.hour * 24;
        Temporizador.timer;
        Temporizador.target = $(target);
    }
    
    static start() {
        let now = new Date();
        let distance = Temporizador.end - now;

        if (distance < 0) {
            clearInterval(Temporizador.timer);
            Temporizador.fin();
            return;
        }

        let hours = Math.floor((distance % Temporizador.day) / Temporizador.hour);
        let minutes = Math.floor((distance % Temporizador.hour) / Temporizador.minute);
        let seconds = Math.floor((distance % Temporizador.minute) / Temporizador.second);

        if (hours<10)
            hours="0"+hours;
        if (minutes<10)
            minutes="0"+minutes;
        if (seconds<10)
            seconds="0"+seconds;

       Temporizador.target.text(hours + ':'+ minutes +':' +seconds);
    }

    static fin(){
        Temporizador.target.text('00:00:00');
        Evaluaciones.finalizarEncuesta();
    }

    static main(fecha,hora,target){
        Temporizador.init(fecha,hora,target);
        Temporizador.timer = setInterval(Temporizador.start, 1000);
    }

}

