class Salud{
    constructor(){
        this.realizasEjercicio= $('#reto8');
        this.tipoEjercicio= $('#reto9');
        this.tomaMedicamentos= $("input[name=reto6]");
        this.tipoMedicamentos= $('#reto6a');
        this.tieneLesiones= $("input[name=reto7]");
        this.diagnosticoMedico= $("input[name=reto13]");
        this.diagnostico= $('#reto13a');
        this.tipoLesiones= $('#reto7a');
        this.cancelarFormulario = $('#formularioCancelarSalud');
        this.formularioSalud = $('#formularioSalud');
        this.enviar=$('#enviarFormularioNutrifitnes');
        this.recargar=$('#cargarValidacionFitness');
    }

    static enviarFormulario(data){
        
        let formulario = new FormData(data.formularioSalud[0]);
        formulario.append("terminos", $('#condicionesYterminos:checked').val());
         $.ajax({
            url: ruta_server + "controllers/AjaxEventos.php",
            method: "POST",
            data: formulario,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                 if(!respuesta.error){
                    data.recargar.html('<div class="row">'+
                                        '<div class="col-md-12">'+
                                        '<p class="callout callout-success" style="font-size:30px;"> ¡Ya estas registrado en el programa Nutrifitness, gracias por participar! </p>'+
                                        '</div>'+
                                    '</div>');
                    data.formularioSalud[0].reset();
                }
            }
        });
    }

    static iniciar(){
        let valores = new Salud();
        
        valores.realizasEjercicio.change(function(){
            if( valores.realizasEjercicio.val() > 0){
                valores.tipoEjercicio.addClass("textAreaImportante");
                valores.tipoEjercicio.prop('disabled', false);
                valores.tipoEjercicio.prop('required', true); 
            }
            else{
                valores.tipoEjercicio.removeClass("textAreaImportante");
                valores.tipoEjercicio.prop('disabled', true); 
                valores.tipoEjercicio.prop('required', false); 
                valores.tipoEjercicio.val(''); 
            }
        });

        valores.tomaMedicamentos.click(function () {    
            if($('input:radio[name=reto6]:checked').val() > 0){
                valores.tipoMedicamentos.addClass("textAreaImportante");
                valores.tipoMedicamentos.prop('disabled', false); 
                valores.tipoMedicamentos.prop('required', true); 
            }
            else{
                valores.tipoMedicamentos.removeClass("textAreaImportante");
                valores.tipoMedicamentos.prop('disabled', true); 
                valores.tipoMedicamentos.prop('required', false); 
                valores.tipoMedicamentos.val(''); 
            }
        });

        valores.tieneLesiones.click(function () {    
            if($('input:radio[name=reto7]:checked').val() > 0){
                valores.tipoLesiones.addClass("textAreaImportante");
                valores.tipoLesiones.prop('disabled', false); 
                valores.tipoLesiones.prop('required', true); 
            }
            else{
                valores.tipoLesiones.removeClass("textAreaImportante");
                valores.tipoLesiones.prop('disabled', true); 
                valores.tipoLesiones.prop('required', false); 
                valores.tipoLesiones.val(''); 
            }
        });

        valores.diagnosticoMedico.click(function () {    
            if($('input:radio[name=reto13]:checked').val() > 0){
                valores.diagnostico.addClass("textAreaImportante");
                valores.diagnostico.prop('disabled', false); 
                valores.diagnostico.prop('required', true); 
            }
            else{
                valores.diagnostico.removeClass("textAreaImportante");
                valores.diagnostico.prop('disabled', true); 
                valores.diagnostico.prop('required', false); 
                valores.diagnostico.val(''); 
            }
        });



        valores.cancelarFormulario.click(function(){
            valores.formularioSalud[0].reset();
            valores.tipoEjercicio.removeClass("textAreaImportante");
            valores.tipoEjercicio.prop('disabled', false);
            valores.tipoEjercicio.prop('required', true); 
            valores.tipoMedicamentos.removeClass("textAreaImportante");
            valores.tipoMedicamentos.prop('disabled', true); 
            valores.tipoMedicamentos.prop('required', false);
            valores.tipoLesiones.removeClass("textAreaImportante"); 
            valores.tipoLesiones.prop('disabled', true); 
            valores.tipoLesiones.prop('required', false); 
            valores.diagnostico.removeClass("textAreaImportante"); 
            valores.diagnostico.prop('disabled', true); 
            valores.diagnostico.prop('required', false); 
        });

        valores.enviar.click(function(){
            Salud.enviarFormulario(valores);
        });

    }
}


Salud.iniciar();