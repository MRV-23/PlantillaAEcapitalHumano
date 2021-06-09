
class Tickets{

    static generarNuevoTicket(form,categoria){ 
            let tipo = categoria.val();
            let formulario = new FormData(form);
            formulario.append('idEmpleado', $('#usuarioTicketCreado').val())
            $.ajax({
                url: ruta_server + "controllers/AjaxTickets.php",
                method: "POST",
                data: formulario,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    if(!respuesta.error){
                        swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                        form.reset();
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxTickets.php",
                            dataType: "json",
                            data: { actualizarColaTickets : true}
                        }).done(function(respuesta2) {
                            $('#mostrarDatosTickets').html(respuesta2.html);

                            socket.emit('nuevoTicket',{categoria:tipo,folio:respuesta.folio},(respuestaUltimoTicket)=>{
                                console.log("categoria: " + tipo + "folio: "  + respuesta.folio)
                                console.log("Respuesta: " + respuestaUltimoTicket);
                                if(tipo == 1){
                                    $('#labelTotalTicketsTecnico').text(respuestaUltimoTicket);
                                }
                                else if(tipo == 2){
                                    $('#labelTotalTicketsGiro').text(respuestaUltimoTicket);
                                }
                                else if(tipo == 3){
                                    $('#labelTotalTicketsDesarrollo').text(respuestaUltimoTicket);
                                }
                            });

                            socket.emit('actualizarColaTickets',null);

                            $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                                Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                            });
                            $('.administradorAsignaTicket').click(function(){
                                Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
                             });                           
                        }).fail(function(error) {console.log('Ocurrio un error:', error);});
                    }
                    else{
                        swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                        //Borrar el ticket en caso de un error
                    }  
                }
            });
        //});
    }

    //Muestro toda la información de un ticket en particular
    static mostrarDatosTicket(id){
        let imagen = $(".imagenTicket");
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { idTicket : id}
        }).done(function(respuesta) {
            $('.divDatosTicketEncabezado').html(respuesta.html);
            $('.divDatosTicket').html(respuesta.html2);
            $('.divDatosTicket2').html(respuesta.html3);
            if (respuesta.imagen != null) {
                imagen.attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta.imagen + "");
                imagen.attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta.imagen + "");
            } 
            else {
                imagen.attr("src", ruta_server + "views/img/user.png");
                imagen.attr("alt", ruta_server + "views/img/user.png");
            }
            
            if($('#tipoUsuarioTicket').attr('value')!= $('#categoriaTicketModal').attr('value')){//modo administrador sólo atiende los tickets del grupo al que pertenece
                $('#atenderNumeroTicketModal,#atenderNumeroTicketModal2,#atenderNumeroTicketModal3').prop('disabled', true); 
            }
            else{
                $('#atenderNumeroTicketModal,#atenderNumeroTicketModal2,#atenderNumeroTicketModal3').prop('disabled', false); 
                $('#atenderNumeroTicketModal,#atenderNumeroTicketModal2,#atenderNumeroTicketModal3').attr('value',respuesta.numero);
            }
           
            if($('#situacionApertura').attr('value') == 2){
                $('#atenderNumeroTicketModal3').show(); 
                $('#atenderNumeroTicketModal2').hide(); 
            }
            else{
                $('#atenderNumeroTicketModal3').hide(); 
                $('#atenderNumeroTicketModal2').show(); 
            }

            $('#mostrarSolucionTicket').click(function(){
                $('#solucionTicketPorCerrar').modal('show');

                $.ajax({
                    type: "POST",
                    url: ruta_server + "controllers/AjaxTickets.php",
                    dataType: "json",
                    data: {  mostrarSolucionTicket: $('#folioTicket').attr('value')}
                }).done(function(respuesta3) {     
                    $('#descripcionTicket').val(respuesta3.solucion);
                    $('#causaTicket').val(respuesta3.causa);
                    $('#problemaTicket').val(respuesta3.problema);
                }).fail(function(error) {
                    console.log('Ocurrio un error:', error);
                    swal({ type: 'error', title: 'Ocurrio un error', text: '¡Intentalo nuevamente!'}).catch(swal.noop);
                });

                $('#guardarSolucionTicket').one("click",function(){
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxTickets.php",
                            dataType: "json",
                            data: { actualizarSolucion : $('#descripcionTicket').val(),
                                    actualizarCausa : $('#causaTicket').val(),
                                    actualizarProblema : $('#problemaTicket').val(),
                                    ticketAactualizar: $('#folioTicket').attr('value')
                            }
                        }).done(function(respuesta3) {        
                            $('#solucionTicketPorCerrar').modal('hide');
                            swal({
                                title: '',
                                text: 'Guardado',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).catch(swal.noop);
                        }).fail(function(error) {
                            console.log('Ocurrio un error:', error);
                            swal({ type: 'error', title: 'Ocurrio un error', text: '¡Intentalo nuevamente!'}).catch(swal.noop);
                        });  
                });
            });

        }).fail(function(error) {console.log('Ocurrio un error:', error);});
    }

    static actualizarQuienAtiendeSoporteTecnico(respuesta,grupo){
        grupo.find(".labelTicket").eq(0).text(respuesta.ultimos3[0].numero);
        grupo.find(".labelTicket").eq(1).text(respuesta.ultimos3[1].numero);
        grupo.find(".labelTicket").eq(2).text(respuesta.ultimos3[2].numero);
    }

    static actualizarQuienAtiendeGiro(respuesta,grupo){
        grupo.find(".labelTicket").eq(0).text(respuesta.ultimos2[0].numero);
        grupo.find(".labelTicket").eq(1).text(respuesta.ultimos2[1].numero);
    }

    static actualizarQuienAtiendeDesarrollo(respuesta,grupo){
        grupo.find(".labelTicket").eq(0).text(respuesta.ultimos1[0].numero);
    }
    
    static atenderTicketSoporte(escritorio,numero,categoria){
        socket.emit('atenderTicketSoporte',{
            persona:escritorio,
            numeroPorAtender:numero,
            categoria:categoria
        },(respuesta)=>{
            if(respuesta.numero < 1){
                swal("No hay tickets", "", "info");
            }
            else{
                $('#labelTicket' + escritorio).text(respuesta.numero);
                $.ajax({
                    type: "POST",
                    url: ruta_server + "controllers/AjaxTickets.php",
                    dataType: "json",
                    data: { numeroTicket : respuesta.numero,
                            categoria: categoria,
                            atiende:escritorio
                    }
                }).done(function(respuesta3) {        
                    $.ajax({
                        type: "POST",
                        url: ruta_server + "controllers/AjaxTickets.php",
                        dataType: "json",
                        data: { actualizarColaTicketsAbiertos : true}
                    }).done(function(respuesta2) {
                        $('#mostrarDatosTickets').html(respuesta2.html);
                        $('#mostrarDatosTicketsPorAtender').html(respuesta2.html2);
                        socket.emit('actualizarColaTicketsAbiertos',null);
                        $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                            Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                        });
                        $('.administradorAsignaTicket').click(function(){
                            Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
                         });
                    }).fail(function(error) {console.log('Ocurrio un error:', error);});
                }).fail(function(error) {console.log('Ocurrio un error:', error);});
            }
        });
    }

    static cerrarTicketSoporte(){//cerrar ticket por primera vez
        $('#descripcionTicket').val('');
        $('#problemaTicket').val($('#getAsunto').text());
        $('#causaTicket').val('');
        let solucion='';
        let problema='';
        let causa='';
        $('#solucionTicketPorCerrar').modal('show');
        $('#guardarSolucionTicket').click(function(){
            solucion=$('#descripcionTicket').val();
            problema=$('#problemaTicket').val();
            causa=$('#causaTicket').val();
            Tickets.formularioCerrarTicket(solucion,problema,causa);
        });
        
    }

    static formularioCerrarTicket(solucion,problema,causa){//cerrar ticket por primera vez
        if(solucion.length > 5 && problema.length > 5 && causa.length > 5){

        $('#solucionTicketPorCerrar').modal('hide');
        let categoria = $('#categoriaTicketModal').attr('value');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { idTicketCerrar : $('#folioTicket').attr('value'),
                    solucion,
                    problema,
                    causa
        }
        }).done(function(respuesta) {
            $('#mostrarDatosTicketAtendidos').modal('hide');
            swal({
                title: '',
                text: 'Finalizado',
                type: 'success',
                timer: 2000,
                showConfirmButton: false,
                allowOutsideClick: false
            }).catch(swal.noop);
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { actualizarColaTicketsCerrados : true}
            }).done(function(respuesta2) { //actualizar solo las graficas necesarias
                $('#mostrarDatosTicketsPorAtender').html(respuesta2.html);
                $('#mostrarDatosTicketsFinalizados').html(respuesta2.html2);

                
                let usuario=$('#codigoUnitario').attr('name');

                socket.emit('actualizarColaTicketsCerrados',{categoria,usuario});
                $('#labelTicket' + usuario).text('0');

                if(categoria == 1){
                     GraficasTickets.recargarSistemasPastel();
                     GraficasTickets.recargarSoporteBarras();
                }
                else if(categoria == 2){
                     GraficasTickets.recargarGiroPastel();
                     GraficasTickets.recargarGiroBarras();
                }
                else if(categoria == 3){
                    
                }
                $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                    Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                });
                $('.administradorAsignaTicket').click(function(){
                    Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
                 });
            }).fail(function(error) {console.log('Ocurrio un error:', error);});           
        }).fail(function(error) {console.log('Ocurrio un error:', error);});

        }
        else{
            swal({ type: 'success', title: 'Debes llenar los 3 campos', text: ''}).catch(swal.noop);
        }

        
    }

    static listarEmpleados(id,recargarUsuarios){
        let datos = new FormData();
        datos.append("asignarUsuarioTicket", id);
        $.ajax({
            url: ruta_server + "controllers/AjaxTickets.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                recargarUsuarios.html(respuesta);
            }
        });
    }

    static aplicarFiltros(fecha,nombre){
            let paginas=$('#paginacionTickets');
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { fechaTicketCerrado : fecha,
                        nombrePersonaRegistroTicket : nombre,
                        paginaActual : 1,
                        registrosPorPagina : paginas.find('ul').attr('registros'),
                        target : paginas.find('ul').attr('target')
                }
            }).done(function(respuesta) {
                $('#mostrarHistorialTickets').html(respuesta.data);
                $('#paginacionTickets,#paginacionTickets2').html(respuesta['mostrar']);    
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
                
                /*$(".botonMaxMin").click(function(){
                    botonMaxMin($(this));
                });*/

                $('.mostrarDatosTicketFinalizados').click(function(){
                    Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                });

                $('.mostrarDatosHistorialTickets').click(function(){
                    Tickets.historialTicket($(this).attr('value'));
                });

            }).fail(function(error) {
                console.log('Ocurrio un error:', error);
            });
    }

    static cerrarTicketReabierto(id){ //cerrar el ticket directamente cuando el usuario lo solicita
        swal({
            title: '¿Estas seguro que NO deseas abrir el ticket?',
            text: "El ticket se considerará por cerrado",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, continuar!'
        }).then((result) => {
            $('#ventanaReabrirTicket').modal('hide');
            $('#mostrarTicketsPorReabrir').modal('hide');
            $('#motivoAbrirTicket').modal('show');

            $('#guardarMotivoReabrirTicket').one('click',function(){

                swal({
                    title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                    text: ' Por favor espere...',
                    type: '',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                $.ajax({
                    type: "POST",
                    url: ruta_server + "controllers/AjaxTickets.php",
                    dataType: "json",
                    data: { idReabrirTicket2 : id,
                            flag: 0,
                            motivo: $('#motivoTicket').val()
                    }
                }).done(function(respuesta) {
                    if(respuesta.error){
                        swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                    }
                    else{
                        socket.emit('reabrirTicket');
                        Tickets.actualizarListaAbiertos();
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxTickets.php",
                            dataType: "json",
                            data: { actualizarColaTicketsCerrados : true}
                        }).done(function(respuesta) { 
                            $('#mostrarDatosTicketsPorAtender').html(respuesta.html);
                            $('#mostrarDatosTicketsFinalizados').html(respuesta.html2);
                            socket.emit('actualizarColaTicketsCerrados',{categoria:null});                      
                                    
                            $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                                Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                            });
            
                            $('.mostrarDatosHistorialTickets').click(function(){
                                Tickets.historialTicket($(this).attr('value'));
                            });
                        }).fail(function(error) {console.log('Ocurrio un error:', error);});  
                    }
                    swal.close();
                    $('#motivoTicket').val('');
                    $('#motivoAbrirTicket').modal('hide');
                }).fail(function(error) {
                    console.log(error);
                    swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
                });

            });
        }).catch(result=>{
            
        });
    }

    static actualizarListaAbiertos(){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { totalReabiertos : true
            }
        }).done(function(respuesta) {
            let etiqueta ='disabled';
            let icono = ' <i class="fa fa-circle fa-lg text-grey"></i>';
            if(respuesta.total > 0){
                 etiqueta='';
                 icono = ' <i class="fa fa-circle fa-lg text-green"></i>';
            }
            $('#recargarBotonTicketReabrir').html('<button type="button" id="ticketPendientesPorReabrir" class="btn btn-default btn-lg"' + etiqueta + '><b style="font-size:22px;">'+ respuesta.total +'</b> Ticket por reabrir ' + icono + '</button>');
            $('#datosTicketsReabiertos').html(respuesta.lista);

            $('#ticketPendientesPorReabrir').click(function(){
                Tickets.listaReabiertos();
           });

           $('.mostrarDatosTicketFinalizados').click(function(){
            Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
            });
    
        }).fail(function(error) {
            console.log(error);
            swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
        });         
    }

    static historialTicket(id){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { historialTickets : id
            }
        }).done(function(respuesta) {
           $('#datosTicketsHistorial').html(respuesta.html);
           
        $('.motivoAperturaCierreTicket').click(function(){
            Tickets.mostrarMotivoAperturaOcierreTicket($(this).attr('value'));
        });

        }).fail(function(error) {
            console.log(error);
            swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
        });         
    }

    static mostrarMotivoAperturaOcierreTicket(id){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { detallesAperturaCierre : id
            }
        }).done(function(respuesta) {
           $('#historialMotivoAperturaCierre').val(respuesta.valor);
        }).fail(function(error) {
            console.log(error);
            swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
        });    
    }

    static listaReabiertos(){
        $('#mostrarTicketsPorReabrir').modal('show');
    }

    static reabrirTicket(){
        let id=$('#folioTicket').attr('value');
        swal({
            title: '¿Estas seguro que deseas abrir el ticket?',
            text: "",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, continuar!'
        }).then((result) => {
            $.ajax({ //verificamos que el ticket no este actualmente abierto
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { verificarSituacionTicket : id
                }
            }).done(function(respuesta) {
                if(respuesta.error){
                    swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                }
                else{
                    $('#ventanaReabrirTicket').modal('hide');
                    $('#mostrarTicketsPorReabrir').modal('hide');
                    $('#mostrarDatosTicketFinalizados').modal('hide');
                    $('#motivoAbrirTicket').modal('show');


                    $('#guardarMotivoReabrirTicket').one('click',function(){
                        $.ajax({
                            type: "POST",
                            url: ruta_server + "controllers/AjaxTickets.php",
                            dataType: "json",
                            data: { idReabrirTicket2 : id,
                                flag: 1,
                                motivo: $('#motivoTicket').val()
                            }
                        }).done(function(respuesta) {

                            if(respuesta.error){
                                swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                            }
                            else{
                                //AVISO A LOS DEMAS QUE SE SACO UN TICKET DE LA LISTA POR REABRIR
                                socket.emit('reabrirTicket');
                                Tickets.actualizarListaAbiertos();
                                
                                //CONSULTA PARA ACTUALIZAR EL QUE EJECUTO LA CONSULTA (SE PUEDE REMPLAZAR POR EL CALLBACK EN EL EMIT)
                                $.ajax({
                                    type: "POST",
                                    url: ruta_server + "controllers/AjaxTickets.php",
                                    dataType: "json",
                                    data: { actualizarColaTicketsCerrados : true}
                                }).done(function(respuesta) {
                                    $('#mostrarDatosTicketsPorAtender').html(respuesta.html);
                                    $('#mostrarDatosTicketsFinalizados').html(respuesta.html2);

                                    socket.emit('actualizarColaTicketsCerrados',{categoria:null});
                                
                                    $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                                        Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                                    });
                    
                                }).fail(function(error) {console.log('Ocurrio un error:', error);}); 
        
                                $('#motivoTicket').val('');
                                $('#motivoAbrirTicket').modal('hide');
                            }
                        }).fail(function(error) {
                            swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
                            $('#mostrarDatosTicket').modal('hide');
                        }); 

                    });


                }
            }).fail(function(error) {
                console.log(error);
                swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
            }); 
        }).catch(result=>{
            console.log(result);
        });
    }


/*************************************************************************Revisar************************************************************ */
    static volverAcerrarTicket(){ //cerrar ticket nuevamente
        let id=$('#folioTicket').attr('value');
        $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { idVolverAcerrar : id
                }
        }).done(function(respuesta) {
                $('#mostrarDatosTicketAtendidos').modal('hide');
                if(respuesta.error){
                    swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: ruta_server + "controllers/AjaxTickets.php",
                        dataType: "json",
                        data: { actualizarColaTicketsCerrados : true}
                    }).done(function(respuesta) { 
                        $('#mostrarDatosTicketsPorAtender').html(respuesta.html);
                        $('#mostrarDatosTicketsFinalizados').html(respuesta.html2);
                        socket.emit('actualizarColaTicketsCerrados',{categoria:null});                      
                        
                        $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                            Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                        });

                        $('.mostrarDatosHistorialTickets').click(function(){
                            Tickets.historialTicket($(this).attr('value'));
                        });

                    }).fail(function(error) {console.log('Ocurrio un error:', error);});  
                }
        }).fail(function(error) {
                console.log(error);
                swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
        });
    }

   
    //Inicio todos mis metodos en espera de alguna acción para ser ejecutados
    static inicarClase(){

        let formularioTickets = $('#formularioNuevoTicket');
        let escritorio = $('#codigoUnitario').attr('name');//Saber que usuario de soporte esta atendiendo el ticket
        let recargarUsuarios = $('#targetGenerarTicketUsuario');
        let categorias = $('#areaSistemas');
        let subcategorias = $('#cargarSubCategoriaTickets');
        let cargarSegmento = $('#segmentoTickets'); 
        let grupoSoporte = $('#grupoSoporteTecnico');
        let grupoGiro = $('#grupoGiro');
        let grupoDesarrollo = $('#grupoDesarrollo');
        //Al ser llenado el formulario creo un nuevo ticket
        formularioTickets.submit(function(e){
            e.preventDefault();
            Tickets.generarNuevoTicket($(this)[0],categorias);
        });

        //Obtengo el último ticket solicitado para saber el total de tickets del día
        socket.on('ticketsGenerados', function(respuesta){
            if(respuesta.categoria == 1){
                if($('#credencialesUsuario').attr('value') == 223){
                    let media = $('#customTicketUlises')[0];
                    const playPromise = media.play(); 
                    if (playPromise !== null){ 
                        playPromise.catch(() => { 
                            media.play(); 
                        });
                    } 
                }
                $('#labelTotalTicketsTecnico').text(respuesta.ticket);
            }
            else if(respuesta.categoria == 2){
                if($('#credencialesUsuario').attr('value') == 180){
                    let media = $('#customTicketChava')[0];
                    const playPromise = media.play(); 
                    if (playPromise !== null){ 
                        playPromise.catch(() => { 
                            media.play(); 
                        });
                    } 
                }
                $('#labelTotalTicketsGiro').text(respuesta.ticket);
            }
            else if(respuesta.categoria == 3){
                if($('#credencialesUsuario').attr('value') == 168){
                    let media = $('#customTicketUriel')[0];
                    const playPromise = media.play(); 
                    if (playPromise !== null){ 
                        playPromise.catch(() => { 
                            media.play(); 
                        });
                    } 
                }
                $('#labelTotalTicketsDesarrollo').text(respuesta.ticket);
            } 
        });

        //Agreó el último ticket solicitado a la cola de tickets por ser atendidos
        socket.on('actualizarColaTicketsEnterado', function(){
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { actualizarColaTickets : true}
            }).done(function(respuesta) {
                $('#mostrarDatosTickets').html(respuesta.html);
                $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                    Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                });
                $('.administradorAsignaTicket').click(function(){
                    Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
                 });   
            }).fail(function(error) {console.log('Ocurrio un error:', error);});
        });

        //Actualizo cola de tickets abiertos y cola de tickets atendidos
        socket.on('actualizarColaTicketsAbiertos', function(){
                $.ajax({
                    type: "POST",
                    url: ruta_server + "controllers/AjaxTickets.php",
                    dataType: "json",
                    data: { actualizarColaTicketsAbiertos : true}
                }).done(function(respuesta) {
                    $('#mostrarDatosTickets').html(respuesta.html);
                    $('#mostrarDatosTicketsPorAtender').html(respuesta.html2);
                    
                    $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                        Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                    });
                    $('.administradorAsignaTicket').click(function(){
                        Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
                     });
                }).fail(function(error) {console.log('Ocurrio un error:', error);});
        });

        socket.on('actualizarColaTicketsCerrados', function(){
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { actualizarColaTicketsCerrados : true}
            }).done(function(respuesta) {
                $('#mostrarDatosTicketsPorAtender').html(respuesta.html);
                $('#mostrarDatosTicketsFinalizados').html(respuesta.html2);
            
                $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
                    Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
                });

                $('.administradorAsignaTicket').click(function(){
                    Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
                 });

                 $('.mostrarDatosHistorialTickets').click(function(){
                    Tickets.historialTicket($(this).attr('value'));
                });
            }).fail(function(error) {console.log('Ocurrio un error:', error);}); 
        });


        /*ATENDER TICKET DE SOPORTE TÉCNICO*/
        $('#atenderTicketSoporte').click(function(){
           Tickets.atenderTicketSoporte(escritorio,0,1);
        });
         /*ATENDER TICKET DE GIRO*/
         $('#atenderTicketGiro').click(function(){
            Tickets.atenderTicketSoporte(escritorio,0,2);
         });
          /*ATENDER TICKET DE DESARROLLO*/
        $('#atenderTicketDesarrollo').click(function(){
            Tickets.atenderTicketSoporte(escritorio,0,3);
         });

        /*AL RECARGAR LA PAGINA OBTENGO EL TOTAL DE TICKETS Y QUE TICKET ATIENDE CADA PERSONA*/
        socket.on('actualizarMarcadoresSoporteTecnico', function(respuesta){
            $('#labelTotalTicketsTecnico').text(respuesta.actual);
            Tickets.actualizarQuienAtiendeSoporteTecnico(respuesta,grupoSoporte);
        });
        socket.on('actualizarMarcadoresGiro', function(respuesta){
            $('#labelTotalTicketsGiro').text(respuesta.actual);
            Tickets.actualizarQuienAtiendeGiro(respuesta,grupoGiro);
        });
        socket.on('actualizarMarcadoresDesarrollo', function(respuesta){
            $('#labelTotalTicketsDesarrollo').text(respuesta.actual);
            Tickets.actualizarQuienAtiendeDesarrollo(respuesta,grupoDesarrollo);
        });

        //INDICA CUAL ES EL ÚLTIMO TICKET QUE ATIENDE CADA QUIEN EN SOPORTE TÉCNICO
        socket.on('ultimos3', function(respuesta){
            Tickets.actualizarQuienAtiendeSoporteTecnico(respuesta,grupoSoporte);
        });

        socket.on('ultimos2', function(respuesta){
            Tickets.actualizarQuienAtiendeGiro(respuesta,grupoGiro);
        });

        socket.on('ultimos1', function(respuesta){
            Tickets.actualizarQuienAtiendeDesarrollo(respuesta,grupoDesarrollo);
        });

        socket.on('reabrirTicket',function(){
            console.log('respuesta');
            Tickets.actualizarListaAbiertos();
        });

        //LLAMO AL METODO PARA MOSTRAR LE VENTANA MODAL CON TODOS LOS DATOS DE UN TICKET EN PARTICULAR
        $('.mostrarDatosTicket,.mostrarDatosTicketAtendidos,.mostrarDatosTicketFinalizados').click(function(){
            Tickets.mostrarDatosTicket($(this).parent().parent().attr('id'));
        });

        //EN LA VENTANA MODAL (MOSTRAR DATOS TICKET) PUEDO ATENDER UN TICKET EN PARTICULAR
        $('#atenderNumeroTicketModal').click(function(){
            Tickets.atenderTicketSoporte(escritorio,$('#atenderNumeroTicketModal').attr('value'),$('#categoriaTicketModal').attr('value'));
            $('#mostrarTicketSoporte').modal('hide')
        });

        //ADMINISTRADOR LE ASIGNA EL TICKET A ALGUIEN EN PARTICULAR
        $('.administradorAsignaTicket').click(function(){
           Tickets.atenderTicketSoporte($(this).attr('id'),$(this).parent().parent().attr('id'),$(this).parent().parent().attr('value'));
        });
    
        //EN LA VENTANA MODAL (TICKETS ACTUALMENTE ATENDIDOS ) CIERRO EL TICKET
        $('#atenderNumeroTicketModal2').click(function(){
            Tickets.cerrarTicketSoporte();
        });

        $('#atenderNumeroTicketModal3').click(function(){
            Tickets.volverAcerrarTicket();
        });

        $('#atenderNumeroTicketModal3').hide();//oculto el boton para cerrer ticket que se volvieron a abrir

        $('#sucursalGenerarTicket').change(function(){
            if($(this).val() != ''){
               Tickets.listarEmpleados($(this).val(),recargarUsuarios);
            }
            else{
                recargarUsuarios.html('<select class="form-control textoMay" name="usuarioTicketCreado" id="usuarioTicketCreado" required readonly>');
            }
       });

       $('#formularioCancelarTicket').click(function(){
            formularioTickets[0].reset();
            recargarUsuarios.html('<select class="form-control textoMay" name="usuarioTicketCreado" id="usuarioTicketCreado" required readonly>');
            subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required readonly><option></option></select>');
            cargarSegmento.html('');
       });

       categorias.change(function(){

            if($(this).val() != ''){
                if($(this).val() == 1){
                    cargarSegmento.html('');
                    subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required>'+
                                            '<option></option>'+
                                            '<option value="1">Carpetas en Red</option>'+
                                            '<option value="2">CONTPAQi Adminpaq</option>'+
                                            '<option value="3">CONTPAQi Contabilidad y Bancos</option>'+
                                            '<option value="4">CONTPAQi Facturación</option>'+
                                            '<option value="5">CONTPAQi Nomipaq</option>'+
                                            '<option value="6">Correo electrónico</option>'+
                                            '<option value="7">Impresoras y Toner</option>'+
                                            '<option value="8">Paquetería Office(Excel,Word, Power Point, etc.)</option>'+
                                            '<option value="9">Red e Internet</option>'+
                                            '<option value="10">Spark</option>'+
                                            '<option value="11">XML</option>'+
                                            '<option value="12">Otra</option>'+
                                        '</select>');
                }
                else if($(this).val() == 2){
                    subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required>'+
                                            '<option></option>'+
                                            '<option value="1">Nóminas</option>'+
                                            '<option value="2">Procesos IMSS</option>'+
                                            '<option value="3">Módulo Pre Alta</option>'+
                                            '<option value="4">Módulo Recibos CFDI</option>'+
                                            '<option value="5">Módulo Archivo Electrónico</option>'+
                                            '<option value="6">Otra</option>'+
                                        '</select>');

                    let sub = $('#subCategoriaTickets');
                    sub.change(function(){
                        if(sub.val()!= ""){
                            if(sub.val() == 1){
                                cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<label for="passActual">4.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Cálculos Ordinarios</option>'+
                                                                '<option value="2">Cálculos Extraordinarios</option>'+
                                                                '<option value="3">Finiquitos</option>'+
                                                                '<option value="4">Aguinaldos</option>'+
                                                                '<option value="5">Conexión a escritorio remoto</option>'+
                                                                '<option value="6">Usuarios y contraseñas</option>'+
                                                                '<option value="7">Reportes</option>'+
                                                                '<option value="8">Timbrado</option>'+
                                                                '<option value="9">Alta de Clientes / Tipos de Nómina</option>'+
                                                                '<option value="10">Alta de Puestos</option>'+
                                                                '<option value="11">Alta de Turnos</option>'+
                                                                '<option value="12">Movimientos masivos</option>'+
                                                                '<option value="13">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 2){
                                cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<label for="passActual">4.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                 '<option value="1">Altas</option>'+
                                                                 '<option value="2">Bajas</option>'+
                                                                 '<option value="3">Modificaciones salariales</option>'+
                                                                 '<option value="4">Reingresos</option>'+
                                                                 '<option value="5">Alta de Registros patronales</option>'+
                                                                 '<option value="6">INFONAVIT</option>'+
                                                                 '<option value="7">FONACOT</option>'+
                                                                 '<option value="8">Movimientos masivos</option>'+
                                                                 '<option value="9">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 3){
                                cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<label for="passActual">4.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Captura de información</option>'+
                                                                '<option value="2">Correo electrónico</option>'+
                                                                '<option value="3">Exportación de empleados</option>'+
                                                                '<option value="4">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 4){
                                cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<label for="passActual">4.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Error en timbre</option>'+
                                                                '<option value="2">XML y PDF</option>'+
                                                                '<option value="3">Reportes</option>'+
                                                                '<option value="4">Falta de timbres</option>'+
                                                                '<option value="5">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 5){
                                cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<label for="passActual">4.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Alta de nuevos documentos</option>'+
                                                                '<option value="2">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else{
                                cargarSegmento.html('');
                            }
                        }
                        else{
                            cargarSegmento.html('');
                        }
                    });
                }
                else if($(this).val() == 3){
                    cargarSegmento.html('');
                    subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required>'+
                                            '<option></option>'+
                                            '<option value="1">Ingreso al sistema</option>'+
                                            '<option value="2">Módulo agenda empresarial</option>'+
                                            '<option value="3">Módulo inicio</option>'+
                                            '<option value="4">Módulo mi cuenta</option>'+
                                            '<option value="5">Módulo paquetería</option>'+
                                            '<option value="6">Módulo solicitudes</option>'+
                                            '<option value="7">Módulo tickets</option>'+
                                            '<option value="8">Otra</option>'+
                                        '</select>');
                }
            }
            else{
                subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required readonly><option></option></select>');
                cargarSegmento.html('');
            }

       });

       $('#aplicarFiltrosTickets').click(function(){
        if( $('#fechasTickets').val() !== '' || $('#buscadorUsuariosTickets').val() !== ''){
            $('#fechasTickets').val('');
            $('#buscadorUsuariosTickets').val('');
            Tickets.aplicarFiltros($('#fechasTickets').val(), $('#buscadorUsuariosTickets').val());
        }
        
       });

       $('#buscadorUsuariosTickets').on('input',function(){
            Tickets.aplicarFiltros($('#fechasTickets').val(), $('#buscadorUsuariosTickets').val());
        });
    
       $('#fechasTickets').change(function(){
            if(MetodosDiversos.init_validate_date($(this).val())){
                Tickets.aplicarFiltros($('#fechasTickets').val(), $('#buscadorUsuariosTickets').val());
            }    
        });

       $('#ticketPendientesPorReabrir').click(function(){
            Tickets.listaReabiertos();
       });

       $('.reabrirTicketModal').click(function(){
            Tickets.reabrirTicket();
       });

       $('#noReabrirTicketModal').click(function(){
            Tickets.cerrarTicketReabierto($('#folioTicket').attr('value'));
       });

       $('.mostrarDatosHistorialTickets').click(function(){
            Tickets.historialTicket($(this).attr('value'));
        });

    }
}

Tickets.inicarClase();











