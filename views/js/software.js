class Software{
    static init(){
        Software.formulario = $('#formSoftware');
        Software.guardar = $('#guardarSoftware');
        Software.cancelar = $('#cancelarSoftware');
        Software.indicador = $('#indicador');
        Software.indicador2 = $('#indicador2');
        Software.nombre = $('input[name=nombre]');
        Software.descripcion = $('textarea[name=descripcion]');
        Software.archivo = $('input[name=archivo]');
        Software.archivo2 = $('input[name=archivo2]');
        Software.areaRegistros = $('#areaRegistros');
    }

    static validar(){
        if(Software.nombre.val()==""){
            MetodosDiversos.mostrarRespuesta("warning","El campo nombre no debe estar vacio",'',60000,true);
            return false
        }
        if(Software.descripcion.val()==""){
            MetodosDiversos.mostrarRespuesta("warning","El campo descripción no debe estar vacio",'',60000,true);
            return false
        }
        if(Software.archivo.val()==""){
            MetodosDiversos.mostrarRespuesta("warning","Debes cargar un archivo",'',60000,true);
            return false
        }
        return true;
    }

    static enviar(){
        let form = new FormData(Software.formulario[0]);
        /*MetodosDiversos.consultaAjaxFormulario("controllers/AjaxSoftware.php", form,(error,resp)=>{
            console.log(resp);
            MetodosDiversos.mostrarRespuesta(resp.tipo,resp.titulo,resp.subtitulo,60000,true);
            if(error)return;
            Software.resetForm();
        });*/


        MetodosDiversos.mostrarRespuesta('','<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#811363"><br><div class="knob-label" id="loaded_n_total"></div>',' Por favor espere... ','',false); 
        
        $("#progressBar").knob({
            change : function (value) {
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Software.progressHandler, false);
        ajax.addEventListener("load", function(e){
            let resp = JSON.parse(e.srcElement.response);
            MetodosDiversos.mostrarRespuesta(resp.tipo,resp.titulo,resp.subtitulo,60000,true);
            if(resp.error)return;
            Software.resetForm();
            Software.areaRegistros.html(resp.data);
        }, false);
        ajax.upload.addEventListener("error", Software.errorHandler, false);
        ajax.addEventListener("abort", Software.abortHandler, false);
        ajax.open("POST", "controllers/AjaxSoftware.php");
        ajax.send(form);
    }

    static progressHandler(e){
        $('#loaded_n_total').text( MetodosDiversos.formatBytes(e.loaded) + " de " + MetodosDiversos.formatBytes(e.total));
       let percent = (e.loaded / e.total) * 100;
       let redondeo = Math.round(percent);
       Software.knobfunction(redondeo);
    }

    static knobfunction(value1){
        $('#progressBar').val(value1).trigger('change');
    }

    static errorHandler(){
        console.log('Algo fallo'); 
    }

    static abortHandler(){
        console.log('Se aborto')
    }

    static resetForm(){
        Software.formulario[0].reset();
        Software.indicador.html('<i class="fa fa-square-o fa-4x" style="color:#3c8dbc;margin-right:8px;" aria-hidden="true"></i>');
        Software.indicador2.html('<i class="fa fa-square-o fa-4x" style="color:#f0ad4e;margin-right:8px;" aria-hidden="true"></i>');
    }

    static main(){
        Software.init();

        Software.archivo.change(function(){
                Software.indicador.html('<i class="fa fa-check-square-o fa-4x" style="color:#3c8dbc" aria-hidden="true"></i>');
                MetodosDiversos.mostrarRespuesta("success","","",1000,false);
        });

        Software.archivo2.change(function(e){
            let file = e.target.files[0];
            let valido = (/\.(?=jpg|png|jpeg)/gi).test(file.name);
            
            if (!valido) {
                valores.imagenTicket.val('');
                swal("Sólo se permiten imagenes", "Formato: .jpg, .jpeg y .png", "error").catch(swal.noop);
                return;
            }
            Software.indicador2.html('<i class="fa fa-check-square-o fa-4x" style="color:#f0ad4e" aria-hidden="true"></i>');
            MetodosDiversos.mostrarRespuesta("success","","",1000,false);
        });

        Software.guardar.click(function(){
            if(Software.validar())
                Software.enviar();
        })

        Software.cancelar.click(function(){
            Software.resetForm();
        })
    }
}

Software.main();