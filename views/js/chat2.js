
class Chat2{

    static init(){
        Chat2.identificador=$('#idUsuarioChat');//acceso al div con la información de usuario
        Chat2.id = Chat2.identificador.attr('value');//obtenemos el id
        Chat2.avatar = Chat2.identificador.attr('src');//obtenemos la imagen
        Chat2.nombrePila=Chat2.identificador.attr('list');//obtenemos el nombre
        Chat2.buscador = $('#buscadorChat');//referencia al input de busqueda de nombre de usuario
        Chat2.botonCrearGrupo = $('#crearGrupo');
        Chat2.botonCancelarGrupo = $('#cancelarGrupo');
        Chat2.botonGuardarGrupo = $('#guardarGrupo');
        Chat2.listaOpciones = $('#listaOpciones');
        Chat2.botonMenuOpciones = $('#menuOpciones');
        Chat2.edicionGrupo = 0;//Nos permite indicar a la hora de refrescar en el buscador si los usuarios tienen habilitada la opción de ser agregados a un grupo
        Chat2.grupoCandidatos = Array();
        Chat2.cargarUsuarios = $('#dataChat');
        Chat2.cargarChats = $('#dataChat2');
        Chat2.contenedorPadre = $('#blackBox');
        Chat2.modalOpcionesGrupo = $('#opcionesGrupos');
       
        Chat2.botonActualizarImagenGrupo = $('#actualizarImagenGrupo');
        Chat2.botonEliminarGrupo = $('#eliminarGrupo');
        Chat2.botonIntegrantesGrupo = $('#integrantesGrupo');


        Chat2.imagenSeleccionado = $('#imagenSeleccionadoChat');
        Chat2.nombreSeleccionado = $('#nombreSeleccionadoChat');
        Chat2.sucursalSeleccionado = $('#sucursalSeleccionadoChat');
        Chat2.iconoSeleccionado = $('#iconoSeleccionadoChat');
        Chat2.totalConectados= $('#totalChatConectados');
        Chat2.botonEnviar = $('#enviarChat');
        Chat2.input = $('#inputChat');
        Chat2.estado=$('#estadoChat');
        Chat2.estadoIcono=$('#estadoIcono');
        Chat2.options=$('#options');
        Chat2.menuChat=$('#menuChat');
        Chat2.mensajesSinLeer = $('#totalMensajesSinLeer');
        Chat2.marcador=$('.globoMarcador');
        Chat2.destinatario = null;
    }

    static buscar(cadenaBuscar){
        Chat2.cargarUsuarios.html('<div style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{cadenaBuscar,edicion:Chat2.edicionGrupo,grupo:JSON.stringify(Chat2.grupoCandidatos)},(error,respuesta)=>{
            if(error){console.log('Ocurrio un error: ',respuesta);return;}
            Chat2.cargarUsuarios.html(respuesta.data);
           
            $(".visor-crow-imagen-mini").click(function() {
                mostrarVisorCrow($(this));
            });
        });
    }

    static iniciarConversacion(seleccionado){
        let imagen = seleccionado.children('a').children('img').attr('src');
        Chat2.imagenSeleccionado.attr('src',imagen);
        Chat2.nombreSeleccionado.text(seleccionado.find('.contacts-list-name').children().eq(0).text());
        Chat2.sucursalSeleccionado.text(seleccionado.find('.contacts-list-msg').attr('list'));
        let clase = seleccionado.attr('class').split(" ");
        Chat2.iconoSeleccionado.attr('class','_'+clase[1])
        $('._'+clase[1]+'').html(seleccionado.find('.estadoIconoUsuarioChat').html());
        if($(window).width() < 900)
        Chat2.contenedorPadre.toggleClass('direct-chat-contacts-open');
        Chat2.destinatario = clase[1];
        Chat2.leerMensaje(clase[1]);
    }

    static leerMensaje(valor){
        $('#direct-chat-messages').html('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;background: rgba(255,255,255,0.5);"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{leerChat:valor,usuario:valor},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else {
                if(parseInt(respuesta.sinLeer))
                    Chat2.marcador.text( respuesta.sinLeer );
                else
                    Chat2.mensajesSinLeer.html('');
                $('#direct-chat-messages').html(respuesta.mensajes);
                $('#direct-chat-messages').scrollTop($('#direct-chat-messages')[0].scrollHeight); 
            }    
        });
    }

    static traducirEstado(valor){
        if(valor == 0)
            return '<i class="fa fa-user fa-2x text-gray"></i>';
        else if(valor == 1)
            return '<i class="fa fa-user fa-2x text-green"></i>';
        else
            return '<i class="fa fa-user fa-2x text-yellow"></i>';
    }

    static cambiarEstado(cambiarEstado){
        let icono=Chat2.traducirEstado(cambiarEstado);
        Chat2.estadoIcono.html(icono);//cambio mi pripio estado
        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{cambiarEstado},(error,respuesta)=>{
            if(error){console.log('Ocurrio un error: ',respuesta);return;}
            socketChat.emit('cambiarEstado',{idIntranet:Chat2.id,estado:icono});//aviso a todos que cambie mi estado  
        });
    }

    static enviarMensaje(mensaje){
        if(mensaje !== ''){
            Chat2.input.val('');
            if(Chat2.destinatario===null){
                MetodosDiversos.mostrarRespuesta('warning','','Selecciona a un usuario para iniciar una conversación',60000,true);
                return;
            }
            
            MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{nuevoMensaje:mensaje,destinatario:Chat2.destinatario},(error,respuesta)=>{
                if(error){
                    MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','Intentalo de nuevo',60000,true);
                    return;
                }
                   
                $('#direct-chat-messages').append('<div class="direct-chat-msg right">'+
                                                        '<div class="direct-chat-info clearfix">'+
                                                            '<span class="direct-chat-name pull-right">'+Chat2.nombrePila+'</span>'+
                                                            '<span class="direct-chat-timestamp pull-left">'+respuesta.fecha+'</span>'+
                                                        '</div>'+
                                                        '<img class="direct-chat-img" src="'+Chat2.avatar+'" class="user-image" alt="User Image">'+
                                                        '<div class="direct-chat-text">'+
                                                            mensaje+
                                                        '</div>'+
                                                    '</div>');
                let data = {
                     id:Chat2.id,
                    remitente:Chat2.nombrePila,
                    destinatario:Chat2.destinatario,
                    mensaje,
                    avatar:Chat2.avatar,
                    fecha:respuesta.fecha
                }

                console.log('hora: ' + respuesta.fecha);
                $('#direct-chat-messages').scrollTop($('#direct-chat-messages')[0].scrollHeight); 
                socketChat.emit('nuevoMensaje',data); 
                    
                });
        }
    }

    static espera(){
        $('body').append('<div id="loadImageDatos" style="width:100%;height:100%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;background: rgba(255,255,255,0.5);"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div></div>');
    }

    static peticionConexion(){
        socketChat.emit('peticionDeConexion',Chat2.id,function(data){
            Chat2.cambiarEstado(1); //cambio mi estado a conectado
            Chat2.totalConectados.text(data.conectados);//obtengo el total de usuarios conectados
            $("#loadImageDatos").remove();//removemos la animación de espera
        });
    }

    static main(){
        //se cargar una animación hasta que se comprueba la conexión
        Chat2.espera();
        //cargamos nuestros elemntos del dom
        Chat2.init();
        
        /***************SOCKETS***********/

        //Aviso al servidor que estoy conectado y envio mi identificador
        Chat2.peticionConexion();
        //Monitoreo a los usuarios que salen o entran al chat
        socketChat.on('actualizacionDeUsuarios', function(data){
            let valor=0;
            Chat2.totalConectados.text(data.conectados);//saber el total de usuarios conectados
            if(Boolean(data.situacion))//si entra cambio su su estado a conectado (icono a color verde)
                valor=1;
            let estado = Chat2.traducirEstado(valor);
            $('.'+data.idIntranet+'').find(".estadoIconoUsuarioChat").html(estado);
            $('.'+'_'+data.idIntranet+'').html(estado);
        });
         //En caso de que se pierda la conexión con el servidor por cualquier motivo se le avisa a los usuarios
        socketChat.on('disconnect',function(){
            Chat2.espera();
        });
        //En caso de que el servidor se caiga, en cuanto se levante solicitara credenciales a todos los usuarios
        socketChat.on('servidorLevantado',function(){
            Chat2.peticionConexion();
        });
         /***************FIN SOCKETS***********/


        //Activamos el campo de busqueda de usuario
        Chat2.buscador.on('input',function(){
            Chat2.buscar($(this).val().trim());
        });
        //selleccionamos a alguien para iniciar chat
        Chat2.contenedorPadre.on('dblclick','.itemChat',function(){
            Chat2.iniciarConversacion($(this));
        });

       /* $('.itemChat').dblclick(function(){
            Chat2.iniciarConversacion($(this));
        });*/


        //al presionar la tecla enter mandamos un mensaje
        Chat2.input.keyup(function(e){
            if (e.which === 13 || e.keyCode === 13) 
                Chat2.enviarMensaje($(this).val());
        });
        //al presionar el botón enviar mandamos un mensaje
        Chat2.botonEnviar.click(function(){
            Chat2.enviarMensaje(Chat2.input.val());
           // $('#blac/kBox').toggleClass('direct-chat-contacts-open');
        });
        
       
        //Metodo para saber cuando un usuario cambia de estado
        socketChat.on('cambiarEstado',function(respuesta){
             $('.'+respuesta.idIntranet+'').find(".estadoIconoUsuarioChat").html(respuesta.estado);
             $('.'+'_'+respuesta.idIntranet+'').html(respuesta.estado);
        });
        //Metodo para cuando quiero cambiar mi estado
        Chat2.estado.change(function(){
            Chat2.cambiarEstado($(this).val());
        });
        //Recibo un mensaje de cualquier usuario
        socketChat.on('nuevoMensaje',function(respuesta){
           if(Chat2.destinatario != respuesta.identificadorRemitente){
                if(Chat2.marcador[0])
                    Chat2.marcador.text( parseInt(Chat2.marcador.text()) + 1);
                else{
                    Chat2.mensajesSinLeer.html('<span class="globoMarcador label label-warning">1</span>');
                    Chat2.marcador=$('.globoMarcador');
                }
           }

            else{
                MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{mensajesVistos:true,remitente:respuesta.identificadorRemitente},(error,respuesta)=>{
                    if(error)
                        console.log('Ocurrio un error: ',respuesta);
                });
                $('#direct-chat-messages').append('<div class="direct-chat-msg">'+
                                                    '<div class="direct-chat-info clearfix">'+
                                                        '<span class="direct-chat-name pull-left">'+respuesta.remitente+'</span>'+
                                                        '<span class="direct-chat-timestamp pull-right">'+respuesta.fecha+'</span>'+
                                                    '</div>'+
                                                    '<img class="direct-chat-img" src="'+respuesta.avatar+'" class="user-image" alt="User Image">'+
                                                    '<div class="direct-chat-text">'+
                                                        respuesta.mensaje+
                                                    '</div>'+
                                                '</div>');
            }
            $('#direct-chat-messages').scrollTop($('#direct-chat-messages')[0].scrollHeight);  
        });
        //Contraer-retraer la cinta de opciones
        Chat2.menuChat.click(function(){
            Chat2.options.toggle("slow");
        });
        //Detectamos la resolución para controlar 
        $(window).resize(function(){
            if($(window).width() < 900){
                if($(this).hasClass('activo'))
                Chat2.contenedorPadre.toggleClass('direct-chat-contacts-open');
            }
        });
        //boton para la creación de un nuevo grupo
        Chat2.botonCrearGrupo.click(function(){
            $('.icon-hide').css('display','');
            Chat2.edicionGrupo = 1;
        });
        //boton para listar las opciones
        Chat2.botonMenuOpciones.click(function(){
            Chat2.listaOpciones.toggle({duration: 600});
        });
        //boton para cancelar la creación de un grupo
        Chat2.botonCancelarGrupo.click(function(){
            $('.checkCandidatosGrupo').prop('checked', false);
            $('.icon-hide').css('display','none');
            Chat2.edicionGrupo = 0;
            Chat2.grupoCandidatos = [];
        });
        //Botón para la creación de un grupo
        Chat2.botonGuardarGrupo.click(function(){
            if(Chat2.grupoCandidatos.length < 2){
                 MetodosDiversos.mostrarRespuesta('warning','','Debes seleccionar al menos a 2 usuarios para formar un grupo',60000,true);
                 return;
            }
            MetodosDiversos.respuestaModal('Escribe el nombre del grupo','',function(nombre){
                MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{crearGrupo:nombre,grupo:JSON.stringify(Chat2.grupoCandidatos)},(error,respuesta)=>{
                    if(error){MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','¡Intentelo de nuevo!',60000,true);return;}
                    Chat2.cargarChats.html(respuesta.html);
                    //refrescar el area de chats de los demas
                    Chat2.grupoCandidatos = [];
                    $('.checkCandidatosGrupo').prop('checked', false);
                    $('.icon-hide').css('display','none');
                });
            });
        });
        //Cada que se va a crear un grupo se registra que usuarios se seleccionaron
        Chat2.cargarUsuarios.on('click','.checkCandidatosGrupo',function(){
            let candidato = $(this).attr('key');
            if($(this).prop('checked'))
                Chat2.grupoCandidatos.push(candidato);
            else{
                Chat2.grupoCandidatos = Chat2.grupoCandidatos.filter((id)=>{
                    return id != candidato;
                });
            }
        });
        //Activo las opciones para la gestión de los grupos
        Chat2.contenedorPadre.on('click','.botonOpcionesGrupos',function(){
            Chat2.modalOpcionesGrupo.modal('show');
        });
        //Actualizamos la imagen de un grupo
        Chat2.botonActualizarImagenGrupo.click(function(){
            Chat2.modalOpcionesGrupo.modal('hide');
        });
        //Eliminamos o salimos de un grupo
        Chat2.botonEliminarGrupo.click(function(){
            Chat2.modalOpcionesGrupo.modal('hide');
            MetodosDiversos.crearRegistro("¿Quieres salir del grupo?","Si tu creaste el grupo al salir este sera eliminado",(callback)=>{
                if(callback){
                     console.log('Haz salido');
                }  
            });
        });
        //Listamos los integrantes de un grupo
        Chat2.botonIntegrantesGrupo.click(function(){
            Chat2.modalOpcionesGrupo.modal('hide');
            
            
        });
    }
}

Chat2.main();


