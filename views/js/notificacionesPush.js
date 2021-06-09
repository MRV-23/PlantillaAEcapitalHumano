class PushMensajes{

    static crearMensaje(titulo,mensaje){
        Push.create(titulo, { //Titulo de la notificación
        body: mensaje, //Texto del cuerpo de la notificación
        icon: ruta_server + 'views/img/logo2.png', //Icono de la notificación
        timeout: 10000000 //Tiempo de duración de la notificación
        });
    } 
}



