class Cursos{
    static init(){
        Cursos.inscribirse = $('.CAFIES');
        Cursos.cafies = $('#cursoCAFIES');
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

    static crearRegistro(titulo,subtitulo,callback){
        swal({
            title: titulo,
            text: subtitulo,
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

    static registrarse(value){
        Cursos.crearRegistro('¿Deseas inscribirte al curso?',value.attr('value'),(respuesta)=>{
            if(respuesta){
                let data={ nombreCurso : value.attr('name')};
                Cursos.consultaAjax("controllers/AjaxCursos.php", data,(error,respuesta)=>{                          
                    if(error){
                        Cursos.mostrarRespuesta('error','Error, intente de nuevo',30000,true);
                    }  
                    else {
                        value.prop('disabled',true);
                        location.href = ruta_server + "cursos";
                        Cursos.cafies.html('<div class="row text-center">'+
                                                '<h2>CAFIES Capacitación Fiscal Especializada</h2>'+
                                            '</div>'+
                                            '<div class="videoTutoriales">'+
                                                '<div class="sub-videos"><img alt="views/cursos-asesores/CAFIES - Online - Google Chrome 06_07_19 9_08_37 AM.mp4" src="views/img/pierna.jpg" class="visor-crow-video2"></div>'+
                                                '<div class="sub-videos"><img alt="views/cursos-asesores/CAFIES - Online - Google Chrome 06_07_19 11_24_45 AM.mp4" src="views/img/brazo.jpg" class="visor-crow-video2"></div>'+
                                                '<div class="sub-videos"><img alt="views/cursos-asesores/CAFIES - Online - Google Chrome 06_07_19 1_31_47 PM.mp4" src="views/img/cardio6.jpg" class="visor-crow-video2"></div>'+
                                            '</div>');
                    }
                });
            }
        });
    }

    static main(){
        Cursos.init();

        Cursos.inscribirse.click(function(){
           Cursos.registrarse($(this));
        });
    }
}


Cursos.main();