//class Chat{
//
//    static init(){
//        Chat.id = $('#credencialesUsuario').attr('value');
//        Chat.mostrarConectados = $('#targetConexionActivas');
//        Chat.contador = $('#totalConexiones');
//        Chat.opciones = $('.escribirMensajeUsuarioConectado');
//       
//        Chat.activar = $('#activarChat');
//        Chat.activarFull = $('#activarChatFull');
//        Chat.cerrar = $('#cerrarChat')
//    }
//
//    static cargarDatos(data){
//        let enviar = Array();
//
//        for(let k in data.conectados)
//            enviar.push({id:data.conectados[k].idIntranet,ip:data.conectados[k].ip})
//
//        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{conectados:JSON.stringify(enviar)},(error,respuesta)=>{
//            if(error)
//                console.log('Ocurrio un error: ',respuesta);
//            else {
//
//                Chat.mostrarConectados.html(respuesta.data.html);
//                Chat.contador.text(respuesta.data.total);
//        
//                Chat.init();
//                
//                Chat.opciones.click(function(){
//                    Chat.mensajes($(this).parent().parent().attr('id'),$(this).parent().siblings('.nombreUsuarioMsj').children().eq(1).text());
//                });
//            } 
//        });
//    }
//
//    static mensajes(id,nombre){
//        swal({
//            title: 'Escibe un mensaje',
//            text: 'Para: ' + nombre,
//            input: 'text',
//            inputPlaceholder: 'Mensaje...'
//        }).then(function (mensaje) {
//            socket.emit('mensaje',{mensaje,id},function(callback){
//                if(callback){
//                    swal({
//                        type: 'success',
//                        title: 'Mensaje enviado',
//                        showConfirmButton: false,
//                        timer: 1000
//                    }).catch(function(){});
//                }
//                else{
//                    swal({
//                        type: 'error',
//                        title: 'Usuario desconectado, no pudo ser enviado el mensaje',
//                        showConfirmButton: true,
//                        allowOutsideClick: false
//                    }).catch(function(){});
//                }
//            });
//        }).catch(function(){});
//    }
//
//
//    static main(){
//
//        Chat.init();
//
//        /*socket.on('connect',function(){ 
//
//            socket.emit('entrar',Chat.id,function(callback){
//                Chat.cargarDatos(callback);
//            });
//            console.log('Conexión establecida...');
//
//        });*/
//
//        socket.emit('entrar',Chat.id,function(callback){//al cargar indico que entro y solicito la lista de conectados
//            Chat.cargarDatos(callback);
//        });
//
//        let ventanaChat,ventanaChatFull;
//
//        Chat.activar.click(function(){
//            if(ventanaChatFull)
//                ventanaChatFull.close();
//            ventanaChat =  window.open( ruta_server + "views/modules/interfaz/interfazChat.php", "miChat", "width=350,height=" + $(window).height() + ", top=0,left=0,menubar=0,status=0,titlebar=0,location=0,toolbar=0");
//        });
//
//        Chat.activarFull.click(function(){
//            if(ventanaChat)
//                ventanaChat.close();
//            ventanaChatFull = window.open( ruta_server + "views/modules/interfaz/interfazChat.php", "miChat2");
//        });
//
//        Chat.cerrar.click(function(){
//            ventanaChat.close();
//        });
//            
//        socket.on('entrar', function(data){//se me notifica cuando alguien se conecta o sale
//            Chat.cargarDatos(data);
//        });
//
//        socket.on('mensajePersonal',function(data){
//            swal({
//                title: 'Administrador dice: ',
//                text: data,
//                showConfirmButton: true,
//                allowOutsideClick: false
//            }).catch(function(){});
//        });
//
//        
//        socket.on('respuestaTicket',function(mensaje){
//            console.log('recibí mensaje tickets');
//            MetodosDiversos.mostrarRespuesta("success","Sistema de tickets Intranet",mensaje,180000,true);
//        });
//
//
//        socket.on('cerraSesion',function(data){// si alguien inicia sesión en otro disposivo, mando la instrucción para cerrar la sesión anterior
//            /*swal({
//                title: 'Administrador dice: ',
//                text: data,
//                showConfirmButton: true,
//                allowOutsideClick: false
//            }).catch(function(){});
//            location.href = 'closed';*/
//            location.reload();
//        });
//        
//
//        socket.on('servidorConexionPerdida',function(){ //al conectarse un usuario o al caerse el servidor pido las credenciale a todos los conectados
//            socket.emit('entrar',Chat.id,function(callback){
//                Chat.cargarDatos(callback);
//            });
//        });
//
//    }
//}
//
//Chat.main();

//location.href = window.location.protocol + '//' + window.location.host + window.location.pathname;

