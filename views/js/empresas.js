class Empresas{

    static init(){
        Empresas.formulario = $('#formularioEmpresas');
        Empresas.botonCancelar = $('#cancelarEmpresas');
        Empresas.botonSucursal = $('#nuevaSucursal');
        Empresas.areaNuevaSucursal = $('#areaNuevaSucursal');
        Empresas.documento = $('#documentoEmpresas');
        Empresas.documentoLienzo = $('#documentoLienzo');
        Empresas.logo = $('#logoEmpresas');
        Empresas.logoLienzo = $('#logoLienzo');
        Empresas.sellos = $('#sellosEmpresas');
        Empresas.sellosLienzo = $('#sellosLienzo');
        Empresas.modal = $('#empresasDataModal');
        Empresas.activarModal = $('.mostrarDatosEmpresa');
        Empresas.dataModal = $('#dataEmpresasModal');
        Empresas.checkFactura = $('#idFactura');
        Empresas.checkImss = $('#idImss');
        Empresas.checkAsimilados = $('#idAsimilados');
        Empresas.marcadorActivas=$('#cargarMarcadoresLiberados');
        Empresas.marcadorInactiva=$('#cargarMarcadoresCancelados');
        Empresas.codigo = $('#codigoPostalEmpresas');
        Empresas.coloniaManual = $('#coloniaManual');
        Empresas.coloniaDinamica = $('#targetColoniaEmpresa');

        Empresas.botonResponsableCalculo = $('#responsableCalculo');
        Empresas.botonResponsableLiberacion = $('#responsableLiberacionFondeo');
        Empresas.botonResponsableDispersion = $('#responsableDispersion');
        Empresas.botonResponsableFacturacion = $('#responsablesFacturacion');
        Empresas.areaCalculo = $('#areaCalculo');
        Empresas.areaLiberacionFondeo = $('#areaLiberacionFondeo');
        Empresas.areaDispersion = $('#areaDispersion');
        Empresas.areaFacturacion = $('#areaFacturacion');
        Empresas.valoresSucursales;
        Empresas.indexCalculo = 0;
        Empresas.indexLiberacion = 0;
        Empresas.indexDispersion = 0;
        Empresas.indexFacturacion = 0;


        Empresas.documentosConstitutiva = $('#documentosConstitutiva');
        Empresas.documentosAdministrador = $('#documentosAdministrador');
        Empresas.botonDocumentos1 = $('#archivosPdf1');
        Empresas.botonDocumentos2 = $('#archivosPdf2');
        Empresas.fileSizeLimit = 25; //MB
        Empresas.totalArchivos = 0;
        Empresas.totalArchivos2 = 0;
        Empresas.files = [];
        Empresas.files2 = [];
        Empresas.totalAdjuntos = $('#totalAdjuntosConstitutiva');
        Empresas.totalAdjuntos2 = $('#totalAdjuntosAdministrador');

        Empresas.checkCapitalSocial = $('#capitalSocial');
        Empresas.checkObjeto = $('#objeto');
        Empresas.checkDenominacion= $('#denominacion');
        Empresas.checkRppc= $('#rppc');

        Empresas.controlEmpresas = $('#controlEmpresas');
        

    }
    
    static initMultiple(){
        Empresas.actualizar = $('.actualizarEmpresa');
        Empresas.actualizar2 = $('.actualizarEmpresa2');
        Empresas.actualizar3 = $('.actualizarEmpresa3');
        Empresas.actualizar4 = $('.actualizarEmpresa4');
        Empresas.botonGuardarActualizacion = $('#botonGuardarActualizacion');
        Empresas.botonActualizar = $('#botonActualizar');
        Empresas.botonSucursal2 = $('#nuevaSucursal2');
        Empresas.areaNuevaSucursal2 = $('#areaNuevaSucursal2');
        Empresas.documento2 = $('#documentoEmpresas2');
        Empresas.documentoLienzo2 = $('#documentoLienzo2');
        Empresas.logo2 = $('#logoEmpresas2');
        Empresas.logoLienzo2 = $('#logoLienzo2');
        Empresas.documento2 = $('#documentoEmpresas2');
        Empresas.documentoLienzo2 = $('#documentoLienzo2');
        Empresas.sellos2 = $('#sellosEmpresas2');
        Empresas.sellosLienzo2 = $('#sellosLienzo2');
        Empresas.formulario2 = $('#formularioEmpresas2');
        Empresas.actualizarLinkPdf = $('#linkPdf');
        Empresas.actualizarLinkLogo = $('#linkLogo');
        Empresas.actualizarLinkSellos = $('#linkSellos');
        Empresas.checkFactura2 = $('#idFactura2');
        Empresas.checkImss2 = $('#idImss2');
        Empresas.checkAsimilados2 = $('#idAsimilados2');
        Empresas.paginador = $('.empresas');
        Empresas.activarModal = $('.mostrarDatosEmpresa');
        Empresas.botonResponsableCalculo2 = $('#responsableCalculo2');
        Empresas.botonResponsableLiberacion2 = $('#responsableLiberacionFondeo2');
        Empresas.botonResponsableDispersion2 = $('#responsableDispersion2');
        Empresas.botonResponsableFacturacion2 = $('#responsablesFacturacion2');
        Empresas.areaCalculo2 = $('#areaCalculo2');
        Empresas.areaLiberacionFondeo2 = $('#areaLiberacionFondeo2');
        Empresas.areaDispersion2 = $('#areaDispersion2');
        Empresas.areaFacturacion2 = $('#areaFacturacion2');

        Empresas.checkCapitalSocial2 = $('#capitalSocial2');
        Empresas.checkObjeto2 = $('#objeto2');
        Empresas.checkDenominacion2= $('#denominacion2');
        Empresas.checkRppc2= $('#rppc2');

        
        Empresas.documentosConstitutiva2 = $('#documentosConstitutiva2');
        Empresas.documentosAdministrador2 = $('#documentosAdministrador2');
        Empresas.botonDocumentos3 = $('#archivosPdf3');
        Empresas.botonDocumentos4 = $('#archivosPdf4');
        Empresas.totalArchivos3 = 0;
        Empresas.totalArchivos4 = 0;
        Empresas.files3 = [];
        Empresas.files4 = [];
        Empresas.totalAdjuntos3 = $('#totalAdjuntosConstitutiva2');
        Empresas.totalAdjuntos4 = $('#totalAdjuntosAdministrador2');

        Empresas.ocultarLienzoAdjuntos = $('#ocultarLienzoAdjuntos');
        Empresas.ocultarLienzoAdjuntos2 = $('#ocultarLienzoAdjuntos2');
        Empresas.ocultarLienzoAdjuntos3 = $('#ocultarLienzoAdjuntos3');
        Empresas.ocultarLienzoAdjuntos4 = $('#ocultarLienzoAdjuntos4');

        Empresas.botonArchivosAdjuntos = $('.botonArchivosAdjuntos1');
        Empresas.botonArchivosAdjuntos2 = $('.botonArchivosAdjuntos2');
        Empresas.modalArchivosAdjuntos = $('#modalArchivosAdjuntosEmpresas');

        Empresas.dataArchivosAdjuntos = $('#dataArchivosAdjuntosEmpresas');
        Empresas.labelArchivosAdjuntos = $('#labelArchivosAdjuntosEmpresas');

        Empresas.labelTotalConstitutiva = $('#totalArchivosConstitutiva');
        Empresas.labelTotalAdministrador = $('#totalArchivosAdministrador');
        Empresas.modalContador = $('#botonTargetAdjuntos');

    }

    static paginadorInit(){
        Empresas.data = $('#dataEmpresas');
        Empresas.totalTexto = $('#totalRegistrosEmpresas');
        Empresas.mostrarPaginador = $('.paginadorEmpresas');
        Empresas.situacion = $('#filtroSituacionEmpresas');
        Empresas.buscar = $('#buscadorUsuariosEmpresas');
        Empresas.paginador = $('.empresas');
    }

    static guardar(form){
       // MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',180000,true);
        
        /******************************************** */
        swal({title: '<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#3085d6"><br><div class="knob-label" id="loaded_n_total"></div>',text: ' Por favor espere... ',type: '',showConfirmButton: false,allowOutsideClick: false});
        
        $("#progressBar").knob({
            change : function (value) {
             //console.log("change : " + value);
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Empresas.progressHandler, false);
        ajax.addEventListener("load", Empresas.completeHandler, false);
        ajax.addEventListener("error", Empresas.errorHandler, false);
        ajax.addEventListener("abort", Empresas.abortHandler, false);
        ajax.open("POST", "controllers/AjaxEmpresas.php");
        ajax.send(form);
        /********************************************** */
        
       /* MetodosDiversos.consultaAjaxFormulario("controllers/AjaxEmpresas.php", formulario,(error,respuesta)=>{
            console.log(respuesta);
            if(error){
                console.log(respuesta);
                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);
            }  
            else {
                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);
               // Empresas.resetear();
               // Empresas.filtros(true);
            }
        });*/
    }

    static progressHandler(e){
        $('#loaded_n_total').text( Empresas.formatBytes(e.loaded) + " de " + Empresas.formatBytes(e.total));
       let percent = (e.loaded / e.total) * 100;
       //Cargar.barra.val(Math.round(percent));
       let redondeo = Math.round(percent);
       Empresas.knobfunction(redondeo);
   }

   static formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

   static knobfunction(value1){
           $('#progressBar').val(value1).trigger('change');
   }

   static completeHandler(e){
       console.log(e);
       let respuesta = JSON.parse(e.srcElement.response);
       if(!respuesta.error){
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);
            Empresas.resetear();
            Empresas.filtros(true);
       }
       else{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);
       }  
   }

    static errorHandler(){
        console.log('Algo fallo');
        //Cargar.situacion.text("Upload Failed");  
    }

    static abortHandler(){
        console.log('Se aborto')
        //Cargar.situacion.text("Upload Aborted"); 
    }

    static resetear(){
        Empresas.formulario[0].reset();
        Empresas.sellosLienzo.html('');
        Empresas.logoLienzo.html('');
        Empresas.documentoLienzo.html('');
        Empresas.documento.val('');
        Empresas.logo.val('');
        Empresas.sellos.val('');
        Empresas.areaNuevaSucursal.html('');
        Empresas.areaCalculo.html('');
        Empresas.areaDispersion.html('');
        Empresas.areaFacturacion.html('');
        Empresas.areaLiberacionFondeo.html('');
        Empresas.indexCalculo = 0;
        Empresas.indexLiberacion = 0;
        Empresas.indexDispersion = 0;
        Empresas.indexFacturacion = 0;

        Empresas.totalArchivos = 0;
        Empresas.totalArchivos2 = 0;
        Empresas.files = [];
        Empresas.files2 = [];
        Empresas.totalAdjuntos.text('0');
        Empresas.totalAdjuntos2.text('0');
        Empresas.documentosConstitutiva.html('<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas1">Presiona</button></h2>');
        Empresas.documentosConstitutiva.css({"padding-left":"0","padding-right":"0"});
        Empresas.documentosAdministrador.html('<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas2">Presiona</button></h2>');
        Empresas.documentosAdministrador.css({"padding-left":"0","padding-right":"0"});

        Empresas.totalArchivos3 = 0;
        Empresas.totalArchivos4 = 0;
        Empresas.files3 = [];
        Empresas.files4 = [];

    }

    static actualizarFormulario(data,callback){
        swal({title: '<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#f56954"><br><div class="knob-label" id="loaded_n_total"></div>',text: ' Por favor espere... ',type: '',showConfirmButton: false,allowOutsideClick: false});
        
        $("#progressBar").knob({
            change : function (value) {
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Empresas.progressHandler, false);
        ajax.addEventListener("load", function(e){
            let respuesta = JSON.parse(e.srcElement.response);
            if(respuesta.error)
                MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
            else{
                    Empresas.modal.modal('hide');
                    MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                    Empresas.filtros(true);
            }
            callback(respuesta.error);
        }, false);
        ajax.addEventListener("error", Empresas.errorHandler, false);
        ajax.addEventListener("abort", Empresas.abortHandler, false);
        ajax.open("POST", "controllers/AjaxEmpresas.php");
        ajax.send(data);

        /*MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',180000,false);
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxEmpresas.php", data,(error,respuesta)=>{
                if(error){
                    MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
                    callback(error);
                }  
                else {
                    Empresas.modal.modal('hide');
                    MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                    Empresas.filtros(true);
                    callback(error);
                }
        });*/
    }

    static cargarDocumentosAjax(){
        Empresas.botonDocumentos3.hide();
        Empresas.botonDocumentos4.hide();

        Empresas.documentosConstitutiva2.on('click','.botonEmpresas3',function(){
            Empresas.botonDocumentos3.click();
        });
        Empresas.documentosAdministrador2.on('click','.botonEmpresas4',function(){
            Empresas.botonDocumentos4.click();
        });


        Empresas.documentosConstitutiva2.on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if( $(this).html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas3">Presiona</button></h2>'){
                $(this).html('');
                $(this).css({"padding-left":"30px","padding-right":"30px"});
            }
            $(this).css({"background":"#007BFF","opacity":".6"});
        });
        Empresas.documentosAdministrador2.on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if( $(this).html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas4">Presiona</button></h2>'){
                $(this).html('');
                $(this).css({"padding-left":"30px","padding-right":"30px"});
            }
            $(this).css({"background":"#007BFF","opacity":".6"});
        });

	    Empresas.documentosConstitutiva2.on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            let files = e.originalEvent.dataTransfer.files;  
            Empresas.cargarDocumentos(files,3);
        });
        Empresas.documentosAdministrador2.on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            let files = e.originalEvent.dataTransfer.files;  
            Empresas.cargarDocumentos(files,4);
        });


        Empresas.documentosConstitutiva2.on("dragleave", function(e){
            Empresas.resetDocumentos(3);
        });
        Empresas.documentosAdministrador2.on("dragleave", function(e){
            Empresas.resetDocumentos(4);
        });

        Empresas.botonDocumentos3.change(function(e){
            let files = e.target.files;
            if(Empresas.documentosConstitutiva2.html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas3">Presiona</button></h2>'){
                Empresas.documentosConstitutiva2.html('');
                Empresas.documentosConstitutiva2.css({"padding-left":"30px","padding-right":"30px"});
            }
            Empresas.cargarDocumentos(files,3);
            Empresas.botonDocumentos3.val('');
        });
        Empresas.botonDocumentos4.change(function(e){
            let files = e.target.files;
            if(Empresas.documentosAdministrador2.html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas4">Presiona</button></h2>'){
                Empresas.documentosAdministrador2.html('');
                Empresas.documentosAdministrador2.css({"padding-left":"30px","padding-right":"30px"});
            }
            Empresas.cargarDocumentos(files,4);
            Empresas.botonDocumentos4.val('');
        });


        Empresas.documentosConstitutiva2.on('click','.cancelDocument3',function(){
            let eliminar = $(this).parent().children('span').text();
            Empresas.files3 = Empresas.files3.filter(function(file){
                return file.name != eliminar;
            });
            $(this).parent().remove();
            if(Empresas.totalArchivos3 > 1){
                Empresas.totalArchivos3--;
                Empresas.totalAdjuntos3.text(Empresas.totalArchivos3);
            }
            else{
                Empresas.resetDocumentos(3);
                Empresas.totalArchivos3 = 0;
                Empresas.totalAdjuntos3.text(0);
            }  
        });
        Empresas.documentosAdministrador2.on('click','.cancelDocument4',function(){
            let eliminar = $(this).parent().children('span').text();
            Empresas.files4 = Empresas.files4.filter(function(file){
                return file.name != eliminar;
            });
            $(this).parent().remove();
            if(Empresas.totalArchivos4 > 1){
                Empresas.totalArchivos4--;
                Empresas.totalAdjuntos4.text(Empresas.totalArchivos4);
            }
            else{
                Empresas.resetDocumentos(4);
                Empresas.totalArchivos4 = 0;
                Empresas.totalAdjuntos4.text(0);
            }  
        });
    }

    static cargarCodigoPostal(codigo){
        let url = "http://"+window.location.host+"/api-codigos-postales-v1/index.php/Codigo/codigo/" + codigo + "";
        fetch(url)
            .then((resp) => resp.json())
            .then((data) => {
                $(".municipioEmpresa").val(data.municipio);
                $("#estadoEmpresa").val(data.estado);
                Empresas.coloniaDinamica.html('<select class="form-control textoMay" id="coloniaEmpresas" name="colonia" required><option></option></select>');
                let arreglo = data.colonias;
                let value;
                arreglo.sort();
                let select = document.getElementById('coloniaEmpresas');
                for (value in arreglo) {
                    let option = document.createElement("option");
                    option.text = arreglo[value];
                    select.add(option);
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    static borrarSucursal(id){
        MetodosDiversos.crearRegistro('¿Desea eliminar la sucursal?','La sucursal se eliminará pese a que no se presione el botón guardar',function(callback){
            if(callback){
                MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{borrarSucursal:id.val()},(error,respuesta)=>{
                    if(error)
                        console.log('Ocurrio un error: ',respuesta);
                    else
                        id.parent().parent().parent().remove();
                });
            }
        });
    }

    static borrarResponsable(id){
        MetodosDiversos.crearRegistro('¿Desea eliminar al usuario?','El usuario se eliminará pese a que no se presione el botón guardar',function(callback){
            if(callback){
                MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{borrarResponsable:id.val()},(error,respuesta)=>{
                    if(error)
                        console.log('Ocurrio un error: ',respuesta);
                    else
                        id.parent().parent().parent().remove();
                });
            }
        });
    }

    static modalShow(id){
        MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{mostrarData:id},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else{
                Empresas.modal.modal('show');
                Empresas.dataModal.html(respuesta.html);
                Empresas.initMultiple();
                Empresas.actualizar.prop('disabled',true);
                Empresas.actualizar2.css({'opacity':'.7','cursor':'no-drop'});
                Empresas.actualizar3.css({'opacity':'.7','cursor':'no-drop'});
                Empresas.botonGuardarActualizacion.hide();
                Empresas.ocultarLienzoAdjuntos.hide();
                Empresas.ocultarLienzoAdjuntos3.hide();

                if(!respuesta['status'])
                    Empresas.botonActualizar.hide();

                Empresas.botonSucursal2.click(function(){
                    let x = Math.floor(Math.random() * 1000)
                    Empresas.agregarSucursal(Empresas.areaNuevaSucursal2,x,true);
                });

                $('.borrarSucursal').click(function(){
                    Empresas.borrarSucursal($(this));
                });

                $('.borrarResponsable').click(function(){
                    Empresas.borrarResponsable($(this));
                });

                Empresas.botonResponsableCalculo2.click(function(){
                    Empresas.responsableCalculo(Empresas.areaCalculo2);
                });
        
                Empresas.botonResponsableLiberacion2.click(function(){
                    Empresas.responsableLiberacion(Empresas.areaLiberacionFondeo2);
                });
        
                Empresas.botonResponsableDispersion2.click(function(){
                    Empresas.ResponsableDispersion(Empresas.areaDispersion2);
                });
        
                Empresas.botonResponsableFacturacion2.click(function(){
                    Empresas.responsableFacturacion(Empresas.areaFacturacion2);
                });

                Empresas.logo2.change(function(e) {
                    Empresas.cargarLogo(Empresas.logo2,Empresas.logoLienzo2,e);
                });
                Empresas.documento2.change(function(e) {
                    Empresas.cargarDocumento(Empresas.documento2,Empresas.documentoLienzo2,e);
                });
                Empresas.sellos2.change(function(e) {
                    Empresas.cargarSellos(Empresas.sellos2,Empresas.sellosLienzo2,e);
                });
                Empresas.botonActualizar.click(function(){
                    Empresas.botonGuardarActualizacion.show();
                    Empresas.botonActualizar.hide();
                    Empresas.actualizar.prop('disabled',false);
                    Empresas.actualizar2.css({'opacity':'1','cursor':''});
                    Empresas.actualizar3.css({'opacity':'0','cursor':''});
                    Empresas.actualizar4.css({'opacity':'.7','cursor':'no-drop'});
                    Empresas.actualizar4.prop('disabled',true);
                    Empresas.ocultarLienzoAdjuntos.show();
                    Empresas.ocultarLienzoAdjuntos2.hide();
                    Empresas.ocultarLienzoAdjuntos3.show();
                    Empresas.ocultarLienzoAdjuntos4.hide();
                });
                Empresas.formulario2.submit(function(e){
                    e.preventDefault();

                    let datosFormulario = new FormData($(this)[0]);
                    if(Empresas.checkFactura2.prop('checked')) 
                        datosFormulario.append("facturadora",Empresas.checkFactura2.val());
                    if(Empresas.checkImss2.prop('checked')) 
                        datosFormulario.append("imss",Empresas.checkImss2.val());
                    if(Empresas.checkAsimilados2.prop('checked')) 
                        datosFormulario.append("asimilados",Empresas.checkAsimilados2.val());
                    if(Empresas.checkCapitalSocial2.prop('checked')) 
                        datosFormulario.append("capitalSocial",Empresas.checkCapitalSocial2.val());
                    if(Empresas.checkObjeto2.prop('checked')) 
                        datosFormulario.append("objeto",Empresas.checkObjeto2.val());
                    if(Empresas.checkDenominacion2.prop('checked')) 
                        datosFormulario.append("denominacion",Empresas.checkDenominacion2.val());
                    if(Empresas.checkRppc2.prop('checked')) 
                        datosFormulario.append("rppc",Empresas.checkRppc2.val());

                    let total = Empresas.files3.length;
                    if(total > 0){
                        for(let i=0;i<total;i++)
                            datosFormulario.append("documentosConstitutiva"+i, Empresas.files3[i]);
                        datosFormulario.append("totalDocumentosConstitutiva",total); 
                    }
                    let total2 = Empresas.files4.length;
                    if(total2 > 0){
                        for(let i=0;i<total2;i++)
                            datosFormulario.append("documentosAdministrador"+i, Empresas.files4[i]);
                        datosFormulario.append("totalDocumentosAdministrador",total2); 
                    }

                    datosFormulario.append("actualizarEmpresa", id);

                    Empresas.actualizarFormulario(datosFormulario,function(respuesta){
                        if(!respuesta){
                            Empresas.botonGuardarActualizacion.hide();
                            Empresas.botonActualizar.show();
                            Empresas.actualizar.prop('disabled',true);
                            Empresas.actualizar2.css({'opacity':'.7','cursor':'no-drop'});
                            Empresas.actualizar3.css({'opacity':'.7','cursor':'no-drop'});
                            Empresas.actualizar4.css({'opacity':'1','cursor':''});
                            Empresas.actualizar4.prop('disabled',false);
                            Empresas.ocultarLienzoAdjuntos.hide();
                            Empresas.ocultarLienzoAdjuntos2.show();
                            Empresas.ocultarLienzoAdjuntos3.hide();
                            Empresas.ocultarLienzoAdjuntos4.show();
                        }
                    });
                });

                $(".visor-crow-imagen-mini").click(function() {
                    mostrarVisorCrow($(this));
                });
                
                $(".visor-pdf-crow-empresas").click(function() {
                    mostrarVisorCrowPdf(this);
                });

                Empresas.cargarDocumentosAjax();

                Empresas.botonArchivosAdjuntos2.click(function(){
                    Empresas.archivosAdjuntos(id,2);
                });

                Empresas.botonArchivosAdjuntos.click(function(){
                    Empresas.archivosAdjuntos(id,1);
                });

                $(".campo-read-only").each(function() {
                        $(this).attr('onfocus',"this.blur()");
                        $(this).prop('readonly',true);
                        $(this).prop('disabled',false);
                        $(this).attr('title',"Para copiar da clic en el icono de la izquierda");
                }); 
                $('.campo-read-only2').hide();
               
            }   
        });
    }

    static archivosAdjuntos(id,location){
        Empresas.modalArchivosAdjuntos.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{archivosAdjuntos:id,location},(error,respuesta)=>{ 
            console.log(respuesta);
            if(error)
                MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
            else 
                {
                    Empresas.dataArchivosAdjuntos.html(respuesta.html);
                    Empresas.labelArchivosAdjuntos.text(respuesta.total);
                    Empresas.modalArchivosAdjuntos.on('click','.visor-pdf-crow-empresas',function(){
                        mostrarVisorCrowPdf($(this));
                    });
                }
        });
    }

    static agregarSucursal(target,x){
        target.append('<div style="border: 2px dotted;padding:0 10px;margin-bottom:10px;">'+
                        '<div class="row form-group">'+
                            '<div class="col-md-5">'+
                                '<label for="">Sucursal:</label><br>'+
                                '<input class="form-control textoMay" type="text" name="sucursalDireccion[]" required>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<label for="">Motivo:</label><br>'+
                                '<input class="form-control textoMay" type="text" name="sucursalMotivo[]" required>'+
                                '<input type="hidden" name="actualizarSucursal[]" value="0">'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<br>'+
                                '<span class="btn btn-info btn-lg btn-file" style="width:140px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documento <input type="file" name="sucursalCif[]" id="archivosSucursales'+x+'" accept="application/pdf" required></span>'+
                            '</div>'+
                            '<br>'+
                            '<div class="col-md-1">'+
                                '<button type="button" class="btn btn-danger borrarSucursal"><i class="fa fa-trash-o fa-2x"></i></button>'+
                            '</div>'+
                        '</div>'+
                        '<div id="archivosSucursalesLienzo'+x+'" style="padding:0 20px;">'+
                        '</div>'+
                    '</div>');

        $('#archivosSucursales'+x).change(function(e){
            let file = e.target.files[0];
            let valido = (/\.(?=pdf)/gi).test(file.name);
            if (!valido) {
                $('.archivosSucursales').val('');
                MetodosDiversos.mostrarRespuesta('error',"Formato no válido","Formatos válidos: .pdf",60000,true);
                return;
            }
            $('#archivosSucursalesLienzo'+x).html('<div class="row">'+
                                '<div class="alert alert-info alert-dismissible">'+
                                    '<i class="icon fa fa-check"></i>'+ 
                                    file.name +
                                '</div>'              
            );
        });

        $('.borrarSucursal').one('click',function(){
            $(this).parent().parent().parent().remove();
        });
    }

    static cargarLogo(valor,lienzo,e){
        let file = e.target.files[0];
        let valido = (/\.(?=jpg|JPG|png|PNG|jpeg|JPEG)/gi).test(file.name);
        if (!valido) {
            valor.val('');
            MetodosDiversos.mostrarRespuesta('error',"Formato no válido","Formatos válidos: .jpg, .jpeg, .png",60000,true);
            return;
        }
        lienzo.html('<div class="row">'+
                        
                            '<div class="alert alert-success alert-dismissible">'+
                                '<i class="icon fa fa-check"></i>'+ 
                                file.name +
                                '<button type="button" class="close cancelarLogo" aria-hidden="true">&times;</button>'+
                            '</div>'              
        );
         $('.cancelarLogo').click(function(){
            valor.val('');
            lienzo.html('');
        });
    }

    static cargarSellos(valor,lienzo,e){
        let file = e.target.files[0];
        let valido = (/\.(?=zip|ZIP|rar|RAR|7zip|7ZIP)/gi).test(file.name);
        if (!valido) {
            valor.val('');
            MetodosDiversos.mostrarRespuesta('error',"Formato no válido","Formatos válidos: .zip, .rar, .7zip",60000,true);
            return;
        }
        lienzo.html('<div class="row">'+
                        
                            '<div class="alert alert-warning alert-dismissible">'+
                                '<i class="icon fa fa-check"></i>'+ 
                                file.name +
                                '<button type="button" class="close cancelarSellos" aria-hidden="true">&times;</button>'+
                            '</div>'              
        );
         $('.cancelarSellos').click(function(){
            valor.val('');
            lienzo.html('');
        });
    }

    static cargarDocumento(valor,lienzo,e){
        let file = e.target.files[0];
        let valido = (/\.(?=pdf|PDF)/gi).test(file.name);
        if (!valido) {
            valor.val('');
            MetodosDiversos.mostrarRespuesta('error',"Formato no válido","Formatos válidos: .pdf",60000,true);
            return;
        }
        lienzo.html('<div class="row">'+
                        
                            '<div class="alert alert-info alert-dismissible">'+
                                '<i class="icon fa fa-check"></i>'+ 
                                file.name +
                                '<button type="button" class="close cancelarDocumento" aria-hidden="true">&times;</button>'+
                            '</div>'              
        );
        $('.cancelarDocumento').click(function(){
            valor.val('');
            lienzo.html('');
        });
    }

    static paginar(e,elemento){
        e.preventDefault();
        Empresas.data.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        let datos = new FormData();
        datos.append("paginaActual", $(elemento).parent().attr("actual"));
        datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
        datos.append("target", $(elemento).parent().parent().attr("target"));
        datos.append("cliente", $(elemento).parent().parent().attr("cliente"));
        datos.append("liberado", $(elemento).parent().parent().attr("liberado"));
        Empresas.recargarPaginador(datos);
    }

    static filtros(marcadores=false){
        Empresas.data.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        let datos = new FormData();
        datos.append("paginaActual", 1);
        datos.append("registrosPorPagina", Empresas.mostrarPaginador.find('ul').attr('registros'));
        datos.append("target", Empresas.mostrarPaginador.find('ul').attr('target'));
        datos.append("cliente", Empresas.buscar.val());
        datos.append("liberado", Empresas.situacion.val());
        if(marcadores)
            datos.append("marcadores", true);
        Empresas.recargarPaginador(datos,marcadores);
    }

    static recargarPaginador(datos,marcadores){
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxEmpresas.php", datos,(error,respuesta)=>{
            if(error){
                console.log('error',error);
            }  
            else {
                Empresas.data.html(respuesta.html);
                Empresas.mostrarPaginador.html(respuesta.paginador);
                Empresas.totalTexto.html(respuesta.total);
                if(marcadores){
                    Empresas.marcadorActivas.text(respuesta.activas);
                    Empresas.marcadorInactiva.text(respuesta.inactivas);
                }
                Empresas.initMultiple();
                Empresas.paginador.click(function(x){
                    Empresas.paginar(x,this);
                });
                Empresas.activarModal.click(function(){
                    Empresas.modalShow($(this).parent().parent().attr('id'));
                });
            }
        });
    }

    static responsableCalculo(target){
        target.append('<div style="border: 2px dotted;padding:0 10px;margin-bottom:10px;">'+
                        '<div class="row form-group">'+
                            '<div class="col-md-5">'+
                                '<label for="">Sucursal:</label><br>'+
                                '<select class="form-control textoMay textAreaImportante" data="'+Empresas.indexCalculo+'" id="sucursalCalculo'+Empresas.indexCalculo+'" required>'+
                                    '<option value=""></option>'+
                                     Empresas.valoresSucursales+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<label for="">Responsable:</label><br>'+
                                '<div id="usuariosAjaxSelectCalculo'+Empresas.indexCalculo+'">'+
                                    ' <select class="form-control textoMay" name="responsableCalculo[]" required>'+
                                        '<option value=""></option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<br>'+
                            '<div class="col-md-1">'+
                                '<button type="button" class="btn btn-danger responsableCalculo"><i class="fa fa-trash-o fa-2x"></i></button>'+
                            '</div>'+
                        '</div>'+
                      '</div>');

        $('.responsableCalculo').one('click',function(){
            $(this).parent().parent().parent().remove();
        });

        $('#sucursalCalculo'+Empresas.indexCalculo).change(function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{cargarUsuarios:$(this).val(),tipo:1},(error,respuesta)=>{
                if(!error)
                    $('#usuariosAjaxSelectCalculo'+$(this).attr('data')).html(respuesta.html);
            });
        });

        Empresas.indexCalculo++;
    }
   
    static responsableLiberacion(target){
        target.append('<div style="border: 2px dotted;padding:0 10px;margin-bottom:10px;">'+
                        '<div class="row form-group">'+
                            '<div class="col-md-5">'+
                                '<label for="">Sucursal:</label><br>'+
                                '<select class="form-control textoMay textAreaImportante" data="'+Empresas.indexLiberacion+'" id="sucursalLiberacion'+Empresas.indexLiberacion+'" required>'+
                                    '<option value=""></option>'+
                                     Empresas.valoresSucursales+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<label for="">Responsable:</label><br>'+
                                '<div id="usuariosAjaxSelectLiberacion'+Empresas.indexLiberacion+'">'+
                                    ' <select class="form-control textoMay" name="responsableLiberacion[]" required>'+
                                        '<option value=""></option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<br>'+
                            '<div class="col-md-1">'+
                                '<button type="button" class="btn btn-danger responsableLiberacion"><i class="fa fa-trash-o fa-2x"></i></button>'+
                            '</div>'+
                        '</div>'+
                      '</div>');

        $('.responsableLiberacion').one('click',function(){
            $(this).parent().parent().parent().remove();
        });

        $('#sucursalLiberacion'+Empresas.indexLiberacion).change(function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{cargarUsuarios:$(this).val(),tipo:2},(error,respuesta)=>{
                if(!error)
                    $('#usuariosAjaxSelectLiberacion'+$(this).attr('data')).html(respuesta.html);
            });
        });

        Empresas.indexLiberacion++;
    }

    static ResponsableDispersion(target){
         target.append('<div style="border: 2px dotted;padding:0 10px;margin-bottom:10px;">'+
                        '<div class="row form-group">'+
                            '<div class="col-md-5">'+
                                '<label for="">Sucursal:</label><br>'+
                                '<select class="form-control textoMay textAreaImportante" data="'+Empresas.indexDispersion+'" id="sucursalDispersion'+Empresas.indexDispersion+'" required>'+
                                    '<option value=""></option>'+
                                     Empresas.valoresSucursales+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<label for="">Responsable:</label><br>'+
                                '<div id="usuariosAjaxSelectDispersion'+Empresas.indexDispersion+'">'+
                                    ' <select class="form-control textoMay" name="responsableDispersion[]" required>'+
                                        '<option value=""></option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<br>'+
                            '<div class="col-md-1">'+
                                '<button type="button" class="btn btn-danger responsableDispersion"><i class="fa fa-trash-o fa-2x"></i></button>'+
                            '</div>'+
                        '</div>'+
                      '</div>');

        $('.responsableDispersion').one('click',function(){
            $(this).parent().parent().parent().remove();
        });

        $('#sucursalDispersion'+Empresas.indexDispersion).change(function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{cargarUsuarios:$(this).val(),tipo:3},(error,respuesta)=>{
                if(!error)
                    $('#usuariosAjaxSelectDispersion'+$(this).attr('data')).html(respuesta.html);
            });
        });

        Empresas.indexDispersion++;
    }

    static responsableFacturacion(target){
        target.append('<div style="border: 2px dotted;padding:0 10px;margin-bottom:10px;">'+
                        '<div class="row form-group">'+
                            '<div class="col-md-5">'+
                                '<label for="">Sucursal:</label><br>'+
                                '<select class="form-control textoMay textAreaImportante" data="'+Empresas.indexFacturacion+'" id="sucursalFacturacion'+Empresas.indexFacturacion+'" required>'+
                                    '<option value=""></option>'+
                                     Empresas.valoresSucursales+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<label for="">Responsable:</label><br>'+
                                '<div id="usuariosAjaxSelectFacturacion'+Empresas.indexFacturacion+'">'+
                                    ' <select class="form-control textoMay" name="responsableFacturacion[]" required>'+
                                        '<option value=""></option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<br>'+
                            '<div class="col-md-1">'+
                                '<button type="button" class="btn btn-danger responsableFacturacion"><i class="fa fa-trash-o fa-2x"></i></button>'+
                            '</div>'+
                        '</div>'+
                      '</div>');

        $('.responsableFacturacion').one('click',function(){
            $(this).parent().parent().parent().remove();
        });

        $('#sucursalFacturacion'+Empresas.indexFacturacion).change(function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{cargarUsuarios:$(this).val(),tipo:4},(error,respuesta)=>{
                if(!error)
                    $('#usuariosAjaxSelectFacturacion'+$(this).attr('data')).html(respuesta.html);
            });
        });

        Empresas.indexFacturacion++;
    }

    static cargarSucursales(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{cargarSucursales:true},(error,respuesta)=>{
            if(!error){
                Empresas.valoresSucursales = respuesta.html;
            }  
        });
    }


    static cargarDocumentos(files,area){
        let arreglos,recargarArea,clase;

            if(area == 1){
                recargarArea = Empresas.documentosConstitutiva;
                arreglos = Empresas.files;
                clase='cancelDocument';
            }
            else if(area == 2){
                recargarArea = Empresas.documentosAdministrador;
                arreglos = Empresas.files2;
                clase='cancelDocument2';
            }
            else if(area == 3){
                recargarArea = Empresas.documentosConstitutiva2;
                arreglos = Empresas.files3;
                clase='cancelDocument3';
            }
            else{
                recargarArea = Empresas.documentosAdministrador2;
                arreglos = Empresas.files4;
                clase='cancelDocument4';
            }

            recargarArea.css({"opacity":"1"});

        for(let i=0;i<files.length;i++ ){
            let file = files[i];
            let flag = false;

            arreglos.filter(function(filesave) {
                if( filesave.name == file.name){
                    flag = true
                    return filesave;
                }
            })[0];
    
            if(!flag){
                let valido = (/\.(?=pdf)/gi).test(file.name);
                if (!valido) 
                    console.log('No valido');
                else if (file.size > Empresas.fileSizeLimit * 1024 * 1024)
                    console.log('tamaño mayor al permitido');
                else{
                    recargarArea.append('<li><span>'+file.name+'</span><span class="close2 '+clase+'" aria-hidden="true" style="margin-right:2px;"><i class="fa fa-times fa-lg" style="color:#fff;" aria-hidden="true"></i></span></li>');
                    if(area == 1)
                        ++Empresas.totalArchivos;
                    else if(area == 2)
                        ++Empresas.totalArchivos2;
                    else if(area == 3)
                        ++Empresas.totalArchivos3;
                    else
                        ++Empresas.totalArchivos4;

                    arreglos.push(file);
                }  
            }  
        }

        if(area == 1)
            Empresas.totalAdjuntos.text(Empresas.totalArchivos);
        else if(area == 2)
            Empresas.totalAdjuntos2.text(Empresas.totalArchivos2);
        else if(area == 3)
            Empresas.totalAdjuntos3.text(Empresas.totalArchivos3);
        else
            Empresas.totalAdjuntos4.text(Empresas.totalArchivos4);
        Empresas.resetDocumentos(area);
    }

    static resetDocumentos(area){ 
        let clase,recargarArea;
        if(area == 1){
            clase = 'botonEmpresas1';
            recargarArea = Empresas.documentosConstitutiva;
        }  
        else if(area == 2){
            clase = 'botonEmpresas2';
            recargarArea = Empresas.documentosAdministrador;
        }
        else if(area == 3){
            clase = 'botonEmpresas3';
            recargarArea = Empresas.documentosConstitutiva2;
        }
        else{
            clase = 'botonEmpresas4';
            recargarArea = Empresas.documentosAdministrador2;
        }
            
        if(recargarArea.html() === ""){
            recargarArea.html('<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default '+clase+'">Presiona</button></h2>');
            recargarArea.css({"padding-left":"0","padding-right":"0"});
            recargarArea.css({"opacity":"1"});
        }
        else
            recargarArea.css({"opacity":"1"});
    }

   
    static main(){
        Empresas.init();
        Empresas.paginadorInit();
        Empresas.formulario.submit(function(e){
            e.preventDefault();

            let formulario = new FormData(Empresas.formulario[0]);
            if(Empresas.checkFactura.prop('checked')) 
                formulario.append("facturadora",Empresas.checkFactura.val());
            if(Empresas.checkImss.prop('checked')) 
                formulario.append("imss",Empresas.checkImss.val());
            if(Empresas.checkAsimilados.prop('checked')) 
                formulario.append("asimilados",Empresas.checkAsimilados.val());
            if(Empresas.checkCapitalSocial.prop('checked')) 
                formulario.append("capitalSocial",Empresas.checkCapitalSocial.val());
            if(Empresas.checkObjeto.prop('checked')) 
                formulario.append("objeto",Empresas.checkObjeto.val());
            if(Empresas.checkDenominacion.prop('checked')) 
                formulario.append("denominacion",Empresas.checkDenominacion.val());
            if(Empresas.checkRppc.prop('checked')) 
                formulario.append("rppc",Empresas.checkRppc.val());


            let total = Empresas.files.length;
            if(total > 0){
                for(let i=0;i<total;i++)
                    formulario.append("documentosConstitutiva"+i, Empresas.files[i]);
                formulario.append("totalDocumentosConstitutiva",total); 
            }
            
            let total2 = Empresas.files2.length;
            if(total2 > 0){
                for(let i=0;i<total2;i++)
                    formulario.append("documentosAdministrador"+i, Empresas.files2[i]);
                formulario.append("totalDocumentosAdministrador",total2); 
            }

            Empresas.guardar(formulario);
        });

        Empresas.botonSucursal.click(function(){
            let x = Math.floor(Math.random() * 1000);
            Empresas.agregarSucursal(Empresas.areaNuevaSucursal,x);
        });
        Empresas.documento.change(function(e) {
            Empresas.cargarDocumento(Empresas.documento,Empresas.documentoLienzo,e);
        });
        Empresas.logo.change(function(e) {
            Empresas.cargarLogo(Empresas.logo,Empresas.logoLienzo,e);
        });
        Empresas.sellos.change(function(e) {
            Empresas.cargarSellos(Empresas.sellos,Empresas.sellosLienzo,e);
        });
        Empresas.activarModal.click(function(){
            Empresas.modalShow($(this).parent().parent().attr('id'));
        });
        Empresas.paginador.click(function(e){
           Empresas.paginar(e,this);
        });
        Empresas.situacion.change(function(){
            Empresas.filtros();
        });
        Empresas.buscar.on('input',function(){
            Empresas.filtros();
        });
        Empresas.botonCancelar.click(function(){
            Empresas.resetear();
        });

        Empresas.codigo.on('input',function() {
            if($(this).val().length == 5){
                Empresas.coloniaManual.prop('disabled',false);
                Empresas.coloniaManual.prop('checked',false);
                Empresas.cargarCodigoPostal($(this).val());
            }
        });

        Empresas.coloniaManual.change(function(){
            Empresas.coloniaDinamica.html('<input class="form-control textoMay" type="text" id="coloniaEmpresas" name="colonia" required>');
            Empresas.coloniaManual.prop('disabled',true);  
        });


        Empresas.botonResponsableCalculo.click(function(){
            Empresas.responsableCalculo(Empresas.areaCalculo);
        });

        Empresas.botonResponsableLiberacion.click(function(){
            Empresas.responsableLiberacion(Empresas.areaLiberacionFondeo);
        });

        Empresas.botonResponsableDispersion.click(function(){
            Empresas.ResponsableDispersion(Empresas.areaDispersion);
        });

        Empresas.botonResponsableFacturacion.click(function(){
            Empresas.responsableFacturacion(Empresas.areaFacturacion);
        });

        Empresas.cargarSucursales();



        $('body').on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
        });

        $('body').on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
        });


        Empresas.botonDocumentos1.hide();
        Empresas.botonDocumentos2.hide();

        Empresas.documentosConstitutiva.on('click','.botonEmpresas1',function(){
            Empresas.botonDocumentos1.click();
        });
        Empresas.documentosAdministrador.on('click','.botonEmpresas2',function(){
            Empresas.botonDocumentos2.click();
        });


        Empresas.documentosConstitutiva.on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if( $(this).html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas1">Presiona</button></h2>'){
                $(this).html('');
                $(this).css({"padding-left":"30px","padding-right":"30px"});
            }
            $(this).css({"background":"#007BFF","opacity":".6"});
        });
        Empresas.documentosAdministrador.on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if( $(this).html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas2">Presiona</button></h2>'){
                $(this).html('');
                $(this).css({"padding-left":"30px","padding-right":"30px"});
            }
            $(this).css({"background":"#007BFF","opacity":".6"});
        });

	    Empresas.documentosConstitutiva.on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            let files = e.originalEvent.dataTransfer.files;  
            Empresas.cargarDocumentos(files,1);
        });
        Empresas.documentosAdministrador.on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            let files = e.originalEvent.dataTransfer.files;  
            Empresas.cargarDocumentos(files,2);
        });


        Empresas.documentosConstitutiva.on("dragleave", function(e){
            Empresas.resetDocumentos(1);
        });
        Empresas.documentosAdministrador.on("dragleave", function(e){
            Empresas.resetDocumentos(2);
        });

        Empresas.botonDocumentos1.change(function(e){
            let files = e.target.files;
            if(Empresas.documentosConstitutiva.html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas1">Presiona</button></h2>'){
                Empresas.documentosConstitutiva.html('');
                Empresas.documentosConstitutiva.css({"padding-left":"30px","padding-right":"30px"});
            }
            Empresas.cargarDocumentos(files,1);
            Empresas.botonDocumentos1.val('');
        });
        Empresas.botonDocumentos2.change(function(e){
            let files = e.target.files;
            if(Empresas.documentosAdministrador.html() === '<h2>Arrastra y suelta los archivos PDF que desees adjuntar o <button type="button" class="btn btn-default botonEmpresas2">Presiona</button></h2>'){
                Empresas.documentosAdministrador.html('');
                Empresas.documentosAdministrador.css({"padding-left":"30px","padding-right":"30px"});
            }
            Empresas.cargarDocumentos(files,2);
            Empresas.botonDocumentos2.val('');
        });


        Empresas.documentosConstitutiva.on('click','.cancelDocument',function(){
            let eliminar = $(this).parent().children('span').text();
            Empresas.files = Empresas.files.filter(function(file){
                return file.name != eliminar;
            });
            $(this).parent().remove();
            if(Empresas.totalArchivos > 1){
                Empresas.totalArchivos--;
                Empresas.totalAdjuntos.text(Empresas.totalArchivos);
            }
            else{
                Empresas.resetDocumentos(1);
                Empresas.totalArchivos = 0;
                Empresas.totalAdjuntos.text(0);
            }  
        });
        Empresas.documentosAdministrador.on('click','.cancelDocument2',function(){
            let eliminar = $(this).parent().children('span').text();
            Empresas.files2 = Empresas.files2.filter(function(file){
                return file.name != eliminar;
            });
            $(this).parent().remove();
            if(Empresas.totalArchivos2 > 1){
                Empresas.totalArchivos2--;
                Empresas.totalAdjuntos2.text(Empresas.totalArchivos2);
            }
            else{
                Empresas.resetDocumentos(2);
                Empresas.totalArchivos2 = 0;
                Empresas.totalAdjuntos2.text(0);
            }  
        });

        Empresas.controlEmpresas.on('click','.eliminarArchivoEmpresa',function(){
            MetodosDiversos.crearRegistro('<i class="fa fa-trash text-red fa-3x fa-fw"></i>',`¿ Estas seguro que deseas ELIMINAR el archivo ?, el archivo se eliminará aún cuando no guardes los cambios`,callback=>{
                if(callback){
                    console.log(`id: ${$(this).attr('target')} y ruta: ${$(this).attr('name')}`)
                    MetodosDiversos.consultaAjaxData("controllers/AjaxEmpresas.php",{rutaCarpeta:$(this).attr('name'),eliminarArchivo:$(this).attr('target')},(error,respuesta)=>{
                        if(error)
                            MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
                        else{
                            let seccion = $(this).parent().parent().parent().attr('section');
                            if(seccion == 1)
                                Empresas.labelTotalConstitutiva.text( parseInt(Empresas.labelTotalConstitutiva.text()) - 1 );
                            else if (seccion == 2)
                                Empresas.labelTotalAdministrador.text( parseInt(Empresas.labelTotalAdministrador.text()) - 1 );
                            else{
                                let target = Empresas.modalContador.attr('section')
                                let total = parseInt(Empresas.labelArchivosAdjuntos.text()) -1;
                                Empresas.labelArchivosAdjuntos.text(total);
                                if(target == '-apartado-constitutiva')
                                    Empresas.labelTotalConstitutiva.text(total);
                                else 
                                    Empresas.labelTotalAdministrador.text(total);
                                console.log($(this).attr('delete'));
                                Empresas.controlEmpresas.find("."+$(this).attr('delete')).remove(); 
                            }
                            $(this).parent().parent().parent().remove();  
                        }
                    });
                }
            },false);
        });
    }
}

Empresas.main();

