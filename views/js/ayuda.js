class Ayuda{
    static init(){
        Ayuda.primerSeccion = $('#primerSeccionAyuda');
        Ayuda.segundaSeccion = $('#segundaSeccionAyuda');
        Ayuda.seccionContestada = $('#seccionContestada');
        Ayuda.categoria = $('#categoriaAyuda');
        Ayuda.botonCancelar = $('#botonCancelar');
        Ayuda.formulario = $('#formularioAyuda');
        Ayuda.uno =$('input:radio[name=radio1]');
        Ayuda.dos =$('input:radio[name=radio2]');
        Ayuda.tres =$('input:radio[name=radio3]');
        Ayuda.cuatro =$('input:radio[name=radio4]');
        Ayuda.cinco =$('input:radio[name=radio5]');
        Ayuda.seis =$('input:radio[name=radio6]');

        Ayuda.siete =$('input:radio[name=radio7]');
        Ayuda.ocho =$('input:radio[name=radio8]');
        Ayuda.nueve =$('input:radio[name=radio9]');
        Ayuda.diez =$('input:radio[name=radio10]');
        Ayuda.once =$('input:radio[name=radio11]');
        Ayuda.doce =$('input:radio[name=radio12]');
        Ayuda.trece =$('input:radio[name=radio13]');
        Ayuda.catorce =$('input:radio[name=radio14]');
        Ayuda.quince =$('input:radio[name=radio15]');
        Ayuda.dieciseis =$('input:radio[name=radio16]');
        Ayuda.diecisiete =$('input:radio[name=radio17]');
        Ayuda.dieciocho =$('input:radio[name=radio18]');
        Ayuda.diecinueve =$('input:radio[name=radio19]');
        Ayuda.veinte =$('input:radio[name=radio20]');

    
        Ayuda.comentarios = $('#comentariosAyuda');
        Ayuda.comentariosDiv = $('#comentariosAyudaDiv');
        Ayuda.obligatorio = $('#obligatorioComentarios');
        Ayuda.contador = 0;
        Ayuda.flag = false;

        Ayuda.flag1 = false;
        Ayuda.flag2 = false;
        Ayuda.flag3 = false;
        Ayuda.flag4 = false;
        Ayuda.flag5 = false;
        Ayuda.flag6 = false;
        Ayuda.flagSeccion = false;
    }

    static validarPrimerSeccion(){
        
            if (!Ayuda.uno.is(':checked')){
                MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 1',30000,true);
                return;
            }
    
            if (!Ayuda.dos.is(':checked')){
                MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 2',30000,true);
                return;
            }
               
             if (!Ayuda.tres.is(':checked')){
                MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 3',30000,true);
                return;
            }
               
            if (!Ayuda.cuatro.is(':checked')){
                MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 4',30000,true);
                return;
            }
                
            if (!Ayuda.cinco.is(':checked')){
                MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 5',30000,true);
                return;
            }
               
            if (!Ayuda.seis.is(':checked')){
                MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 6',30000,true);
                return;
            }

            if(Ayuda.flagSeccion)
                Ayuda.enviarFormulario(1);
            else
                Ayuda.validarOtraSeccion();
            
                
    }

    static enviarFormulario(valor=0){

        swal({
            title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
            text: ' Por favor espera...',
            type: '',
            showConfirmButton: false,
            allowOutsideClick: false
        });

       let data = new FormData(Ayuda.formulario[0]);
        if(valor)
            data.append("apartado1",true);

        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxAyuda.php", data,(error,respuesta)=>{
            if(error){
                console.log(respuesta);
                return;
            }
            MetodosDiversos.mostrarRespuesta(respuesta.type,respuesta.title,respuesta.subtitle,30000,true);
            if(!respuesta.error)
                Ayuda.limpiarFormulario();
        });
    }



    static validarOtraSeccion(){
        if(!Ayuda.flag){
            Ayuda.flag = true;
            MetodosDiversos.mostrarRespuesta('info','Casi finalizamos...','Ayudanos a llenar la segunda y última parte del cuestionario',30000,true);  
            Ayuda.seccionContestada.hide();
            Ayuda.segundaSeccion.show();
            Ayuda.categoria.prop("disabled",true);
            $('html,body').animate({
                scrollTop: $('#primerSeccionAyuda').offset().top
            }, 5000);
            return;
        }


        if (!Ayuda.siete.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 7',30000,true);
            return;
        }
        if (!Ayuda.ocho.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 8',30000,true);
            return;
        }
        if (!Ayuda.nueve.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 9',30000,true);
            return;
        }
        if (!Ayuda.diez.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 10',30000,true);
            return;
        }
        if (!Ayuda.once.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 11',30000,true);
            return;
        }
        if (!Ayuda.doce.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 12',30000,true);
            return;
        }
        if (!Ayuda.trece.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 13',30000,true);
            return;
        }
        if (!Ayuda.catorce.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 14',30000,true);
            return;
        }
        if (!Ayuda.quince.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 15',30000,true);
            return;
        }
        if (!Ayuda.dieciseis.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 16',30000,true);
            return;
        }
        if (!Ayuda.diecisiete.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 17',30000,true);
            return;
        }
        if (!Ayuda.dieciocho.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 18',30000,true);
            return;
        }
        if (!Ayuda.diecinueve.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 19',30000,true);
            return;
        }
        if (!Ayuda.veinte.is(':checked')){
            MetodosDiversos.mostrarRespuesta('info','Debes contestar todas las preguntas','contesta la pregunta 20',30000,true);
            return;
        }

        Ayuda.categoria.prop("disabled",false);
        Ayuda.enviarFormulario();
            
    }

    static validarComentarios(){
        if( Ayuda.flag1 &&  Ayuda.flag2 &&  Ayuda.flag3 &&  Ayuda.flag4 &&  Ayuda.flag5 &&  Ayuda.flag6){
            Ayuda.comentarios.prop('required',true);
            Ayuda.obligatorio.show();
            Ayuda.flagSeccion = true;
        }
        else{
            Ayuda.comentarios.prop('required',false);
            Ayuda.obligatorio.hide();
            Ayuda.flagSeccion = false;
        }
    }

    static limpiarFormulario(){
        Ayuda.formulario[0].reset();
        Ayuda.flag = false;
        Ayuda.primerSeccion.hide();
        Ayuda.segundaSeccion.hide();
        Ayuda.categoria.prop("disabled",false);
        Ayuda.comentarios.prop('required',false);
        Ayuda.comentariosDiv.hide();
    }
    static main(){

        Ayuda.init();
        Ayuda.primerSeccion.hide();
        Ayuda.segundaSeccion.hide();
        Ayuda.categoria.change(function(){
            if($(this).val() == 1){
                Ayuda.comentariosDiv.show();
                Ayuda.primerSeccion.hide();
                Ayuda.comentarios.prop('required',true);
                Ayuda.obligatorio.show();
                Ayuda.comentarios.attr('placeholder','Tu denuncia sera anónima, te solicitamos el nombre o puesto de el agresor y una descripción del suceso...');
            }
            else if($(this).val() == 2){
                 Ayuda.primerSeccion.show();
                 Ayuda.seccionContestada.show();
                 Ayuda.comentarios.prop('required',false);
                 Ayuda.comentariosDiv.show();
                 Ayuda.obligatorio.hide();
                 Ayuda.comentarios.attr('placeholder','Por favor escribe tus comentarios...');
            }
            else if($(this).val() == 3){
                Ayuda.primerSeccion.hide();
                Ayuda.comentarios.prop('required',true);
                Ayuda.comentariosDiv.show();
                Ayuda.obligatorio.show();
                Ayuda.comentarios.attr('placeholder','Por favor escribe tus comentarios y sugerencias de capacitación...');
            }
            else{
                Ayuda.primerSeccion.hide();
                Ayuda.comentarios.prop('required',false);
                Ayuda.comentariosDiv.hide();
                Ayuda.obligatorio.hide();
            }
               
        });

        Ayuda.formulario.submit(function(e){
            e.preventDefault();
            if(Ayuda.categoria.val()==2)
                Ayuda.validarPrimerSeccion();
            else    
                Ayuda.enviarFormulario();
        });

        Ayuda.botonCancelar.click(function(){
           Ayuda.limpiarFormulario();
        });

        Ayuda.uno.change(function(){
            let valor = parseInt($('input:radio[name=radio1]:checked').val());
            if(valor === 1)
                Ayuda.flag1 = false;
            else if(valor === 0)
                Ayuda.flag1 = true;
            Ayuda.validarComentarios();
        });

        Ayuda.dos.change(function(){
            let valor = parseInt($('input:radio[name=radio2]:checked').val());
            if(valor === 1)
                Ayuda.flag2 = false;
            else if(valor === 0)
                Ayuda.flag2 = true;
            Ayuda.validarComentarios();
        });

        Ayuda.tres.change(function(){
            let valor = parseInt($('input:radio[name=radio3]:checked').val());
            if(valor === 1)
                Ayuda.flag3 = false;
            else if(valor === 0)
                Ayuda.flag3 = true;
            Ayuda.validarComentarios();
        });

        Ayuda.cuatro.change(function(){
            let valor = parseInt($('input:radio[name=radio4]:checked').val());
            if(valor === 1)
                Ayuda.flag4 = false;
            else if(valor === 0)
                Ayuda.flag4 = true;
            Ayuda.validarComentarios();
        });

        Ayuda.cinco.change(function(){
            let valor = parseInt($('input:radio[name=radio5]:checked').val());
            if(valor === 1)
                Ayuda.flag5 = false;
            else if(valor === 0)
                Ayuda.flag5 = true;
            Ayuda.validarComentarios();
        });

        Ayuda.seis.change(function(){
            let valor = parseInt($('input:radio[name=radio6]:checked').val());
            if(valor === 1)
                Ayuda.flag6 = false;
            else if(valor === 0)
                Ayuda.flag6 = true;
            Ayuda.validarComentarios();
        });


    }
}

Ayuda.main();
