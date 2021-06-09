class Valores{
    
    static init(){
        Valores.claseValores = $('.valores');
        Valores.guardar = $('#botonGuardarValores');
        Valores.actualizar = $('#botonActualizarValores');
        Valores.nombre1 = $('#nombre1');
        Valores.nombre2 = $('#nombre2');
        Valores.nombre3 = $('#nombre3');
        Valores.nombre4 = $('#nombre4');
        Valores.nombre5 = $('#nombre5');
        Valores.imagen1 = $('#imagen1');
        Valores.imagen2 = $('#imagen2');
        Valores.imagen3 = $('#imagen3');
        Valores.imagen4 = $('#imagen4');
        Valores.imagen5 = $('#imagen5');
        Valores.identificador1 = $('#identificador1');
        Valores.identificador2 = $('#identificador2');
        Valores.identificador3 = $('#identificador3');
        Valores.identificador4 = $('#identificador4');
        Valores.identificador5 = $('#identificador5');
        Valores.formulario = $('#formularioValores');
        Valores.ventanaModal = $('#ventanaModal');
        Valores.botonModal =$('#botonModal');
        Valores.recargarLista = $('#actualizarListaCandidatos');
        Valores.sucursales = $('#filtroSucursalValores');
        Valores.usuarios = $('#filtroUsuarioValores');
       
    }

    static activar(){
        Valores.claseValores.prop('disabled',false);
        Valores.claseValores.css('cursor','text');
        Valores.guardar.show();
        Valores.actualizar.hide();
    }

    static desactivar(){
        Valores.claseValores.prop('disabled',true);
        Valores.claseValores.css('cursor','no-drop');
        Valores.guardar.hide();
        Valores.actualizar.show();
    }

    static guardarFormulario(){

        let data = new FormData (Valores.formulario[0]);
        let flag = false;
        let key,value;
        let comparar = Array();
        for([key,value] of data.entries()) {
            flag = comparar.filter(function(guardado) {
                if( guardado == value)
                    return true;
            })[0];
            if(!flag)
                comparar.push(value);
            else
                break;
        }
        
        if(flag){
            MetodosDiversos.mostrarRespuesta('error','Selecciona nuevamente','No puedes repetir a un participante',30000,true);
            return;
        }
            
        data.append("moduloValores",true);
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxEventos.php", data,(error,respuesta)=>{
            if(error)
                MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
            else{
                MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                Valores.actualizarDatos(respuesta);
                Valores.desactivar();
            }
        });
    }

    static actualizarDatos(respuesta){
        Valores.nombre1.text(Valores.validarTexto(respuesta.nombre1));
        Valores.nombre2.text(Valores.validarTexto(respuesta.nombre2));
        Valores.nombre3.text(Valores.validarTexto(respuesta.nombre3));
        Valores.nombre4.text(Valores.validarTexto(respuesta.nombre4));
        Valores.nombre5.text(Valores.validarTexto(respuesta.nombre5));
        Valores.imagen1.attr('src',Valores.validarImagenMin(respuesta.imagen1));
        Valores.imagen2.attr('src',Valores.validarImagenMin(respuesta.imagen2));
        Valores.imagen3.attr('src',Valores.validarImagenMin(respuesta.imagen3));
        Valores.imagen4.attr('src',Valores.validarImagenMin(respuesta.imagen4));
        Valores.imagen5.attr('src',Valores.validarImagenMin(respuesta.imagen5));
        Valores.imagen1.attr('alt',Valores.validarImagen(respuesta.imagen1));
        Valores.imagen2.attr('alt',Valores.validarImagen(respuesta.imagen2));
        Valores.imagen3.attr('alt',Valores.validarImagen(respuesta.imagen3));
        Valores.imagen4.attr('alt',Valores.validarImagen(respuesta.imagen4));
        Valores.imagen5.attr('alt',Valores.validarImagen(respuesta.imagen5));
        Valores.identificador1.val(respuesta.identificador1);
        Valores.identificador2.val(respuesta.identificador2);
        Valores.identificador3.val(respuesta.identificador3);
        Valores.identificador4.val(respuesta.identificador4);
        Valores.identificador5.val(respuesta.identificador5);
    }

    static validarImagen(imagen){
        if(imagen != null) 
            return "views/imagenes-usuarios/" + imagen;
         else 
            return "views/img/user.png";
    }

    static validarImagenMin(imagen){
        if(imagen != null) 
            return  "views/imagenes-usuarios/mini/" + imagen;
        else 
            return "views/img/user.png";   
    }

    static validarTexto(texto){
        if(texto != null)
            return texto;
        else
            return 'SIN SELECCIONAR';
    }

    static metodoModal(){
        Valores.ventanaModal.modal('show');
    }

    static filtros(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxEventos.php",{filtroValoresSucursal:Valores.sucursales.val(),filtroValoresUsuario:Valores.usuarios.val()},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else 
                Valores.recargarLista.html(respuesta.html);
        });
    }


    static main(){
        Valores.init();
        Notification.requestPermission()

        Valores.desactivar();

        Valores.guardar.click(function(){
            Valores.guardarFormulario();
        });

        Valores.actualizar.click(function(){
            Valores.activar();
        });

        Valores.botonModal.click(function(){
            Valores.metodoModal();
        });

        Valores.sucursales.change(function(){
            Valores.filtros();
        });

        Valores.usuarios.on('input',function(){
            Valores.filtros();
        });

    }
}

Valores.main();



/*let flag = false;
            
            Nominas.files.filter(function(filesave) {
                if( filesave.name == file.name){
                    flag = true
                    return filesave;
                }
            })[0];
    
            if(!flag){
                let valido = (/\.(?=pdf|xml)/gi).test(file.name);
                if (!valido) 
                    console.log('No valido');
                else if (file.size > Tickets.fileSizeLimit * 1024 * 1024)
                    console.log('tamaño mayor al permitido');
                else{
                    Nominas.documentosNominas.append('<li><span>'+file.name+'</span><span class="close2 cancelDocument" aria-hidden="true" style="margin-right:2px;"><i class="fa fa-times fa-lg" style="color:#fff;" aria-hidden="true"></i></span></li>');
                    ++Nominas.totalArchivos;
                    Nominas.files.push(file);
                }  
            }  */