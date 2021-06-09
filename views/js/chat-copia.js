class Chat{

    static init(){
        Chat.id = $('#credencialesUsuario').attr('value');
        Chat.mostrarConectados = $('#targetConexionActivas');
        Chat.contador = $('#totalConexiones');
        Chat.opciones = $('.escribirMensajeUsuarioConectado');
    }

    static cargarDatos(data){
        console.log(data);
        Chat.contador.text(data.conectados.length)
        let enviar = Array();
        for(let k in data.conectados) 
            enviar[k] = data.conectados[k].idIntranet;
        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{conectados:JSON.stringify(enviar)},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else {
                Chat.mostrarConectados.html(respuesta.data);

                Chat.init();
                Chat.opciones.click(function(){
                    Chat.mensajes($(this).parent().parent().attr('id'),$(this).parent().siblings('.campoNombre').text());
                });

            }      
        });
    }

    static mensajes(id,nombre){
        swal({
            title: 'Escibe un mensaje',
            text: 'Para: ' + nombre,
            input: 'text',
            inputPlaceholder: 'Mensaje...'
        }).then(function (mensaje) {
            socket.emit('mensaje',{mensaje,id},function(callback){
                if(callback){
                    swal({
                        type: 'success',
                        title: 'Mensaje enviado',
                        showConfirmButton: false,
                        timer: 1000
                    }).catch(function(){});
                }
                else{
                    swal({
                        type: 'error',
                        title: 'Usuario desconectado, no pudo ser enviado el mensaje',
                        showConfirmButton: true,
                        allowOutsideClick: false
                    }).catch(function(){});
                }
            });
        }).catch(function(){});
    }

   /* static reloadId(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{obtenerId:true},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else {
                socket.emit('entrar',respuesta.id,function(callback){
                    Chat.cargarDatos(callback);
                });
            }      
         });
    }*/
   
    static main(){
        Chat.init();

        /*socket.on('connect',function(){ 
            console.log('Conexión establecida...');

            //////borrar 
            socket.emit('entrar',Chat.id,function(callback){
                if(callback.recargar){
                    Chat.reloadId();
               }
               else
                   Chat.cargarDatos(callback);
            });
            ///////////////////////////////

        });*/

        socket.emit('entrar',Chat.id,function(callback){
            /*if(callback.recargar){
                Chat.reloadId();
           }
           else*/
               Chat.cargarDatos(callback);
        });

        socket.on('entrar', function(data){//se me notifica cuando alguien se conecta o sale
            //Chat.cargarDatos(data);
           /* socket.emit('entrar',Chat.id,function(callback){
                if(callback.recargar){
                    Chat.reloadId();
               }
               else
                   Chat.cargarDatos(callback);
            });*/
            socket.emit('entrar',Chat.id,function(callback){
                   Chat.cargarDatos(callback);
            });
        });

        //////////////////////////////////////OK

        socket.on('mensajePersonal',function(data){
            swal({
                title: 'Administrador dice: ',
                text: data,
                showConfirmButton: true,
                allowOutsideClick: false
            }).catch(function(){});
        });

        /*socket.on('disconnect', function(){
            console.log('Perdimos conexión con el servidor...');
        });*/

    }
}

Chat.main();

//location.href = window.location.protocol + '//' + window.location.host + window.location.pathname;

 /*static reloadId(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxChat.php",{obtenerId:true},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else {
                socket.emit('entrar',respuesta.id,function(callback){
                    Chat.cargarDatos(callback.conectados);
                });
            }      
         });
    }*/


 /* socket.on('connect',function(){ // al conectarme aviso a todos y envio mi ID
            socket.emit('entrar',Chat.id,function(callback){
                if(callback.recargar){
                     Chat.reloadId();
                }
                else
                    Chat.cargarDatos(callback.conectados);
            });
        });*/
