class Notificaciones{

    static init(){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxNotificaciones.php",
            dataType: "json",
            data: {  verificarNotificaciones: true}
        }).done(function(respuesta) { 
            $('body').append(respuesta.html);
            let ventana = $('#ventanaModalNotificaciones');
            ventana.modal('show');

            Notificaciones.tipo(respuesta.status,ventana);
        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static tipo(tipo,ventana){
        if(tipo == 1){
            Notificaciones.enterado(ventana);
        }
        else if(tipo == 2){
            Evaluaciones.cargarEncuesta();
        }

    }

    static enterado(ventana){
        $('.botonEnteradoNotificaciones').one('click',function(){
            Notificaciones.finalizarNotificacion(ventana);
        });
    }

    static finalizarNotificacion(ventana = null){
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxNotificaciones.php",
            dataType: "json",
            data: {  aceptarNotificaciones: true}
        }).done(function(respuesta) { 
            if(respuesta.tipo && ventana !== null)
                ventana.modal('hide');
        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static main(){
        let status = $('#credencialesUsuario').attr('notify');
        if(parseInt(status)){
            console.log('Notificacion: ' + status);
            Notificaciones.init();
        }
    }

}

Notificaciones.main();