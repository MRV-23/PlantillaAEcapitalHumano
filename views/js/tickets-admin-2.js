class Tickets{
    static setup(){
        Tickets.contenedorPrincipal = $('#controlTickets');//Contenedor padre
        Tickets.numeroTicket = 0;//Número de ticket seleccionado
        Tickets.areaTicket='';//Saber el área o categoria del ticket
        /***************************LABELS**********************/
        Tickets.labelTicketModalAsignarTicket = $('#labelTicketModalAsignarTicket');//Muestro el número de ticket en la ventana modal asignar ticket 
        Tickets.labelTicketModalDatosTicket = $('#labelTicketModalDatosTicket');
        Tickets.labelPorAtenderMarcadorSoporte = $('#modalPorAtenderMarcadorSoporte');//Indica total de tickets por atender soporte
        Tickets.labelPorAtenderMarcadorGiro = $('#modalPorAtenderMarcadorGiro');//Indica total de tickets por atender Giro
        Tickets.labelPorAtenderMarcadorDesarrollo = $('#modalPorAtenderMarcadorDesarrollo');//Indica total de tickets por atender desarrollo
        Tickets.labelCategoria = $('#textoCategoria');
        Tickets.totalRegistros = $('#totalRegistros');
        Tickets.contadorPorAtender= $('#contadorPorAtender');
        Tickets.contadorAtendiendose= $('#contadorAtendiendose');
        Tickets.contadorPorAbrir= $('#contadorPorAbrir');
        Tickets.contadorFinalizados= $('#contadorFinalizados');
        Tickets.archivosAnexosSoporte = $('#archivosAnexosSoporte');
        /*************************VENTANAS MODAL****************/
        Tickets.modalDatosTicket = $('#modalDatosTicket');//Modal datos del ticket
        Tickets.modalAsignarTicket = $('#modalAsignarTicket');//Modal asignar ticket
        Tickets.modalAtendiendose = $('#modalAtendiendose');//Modal lista de los tickets que se estan atendiendo
        Tickets.modalFinalizados = $('#modalFinalizados');//Modal muestra los tickets finalizados con estadisticas
        Tickets.modalPorAbrir = $('#modalPorAbrir');//Modal que muestra los tickets por abrir ya sea por parte del usuario o por soporte técnico
        Tickets.modalPorAtender = $('#modalPorAtender');//Modal muestra cuantos tickets por área existen por atender
        Tickets.modalMotivoAbrirTicket = $('#modalMotivoAperturaTicket');//Muestra en ventana modal el motivo del por que el usuario quiere abrir el ticket
        Tickets.modalSolucion =$('#modalSolucion');
        Tickets.modalHistorialTicket = $('#listaHistorialTicket');
        /**********BOTONOS ACTIVAN VENTANAS MODALES*************/
        Tickets.botonModalAtendiendose = $('#botonModalAtendiendose');
        Tickets.botonModalFinalizados = $('#botonModalFinalizados');
        Tickets.botonModalPorAbrir = $('#botonModalPorAbrir');
        Tickets.botonModalPorAtender = $('#botonModalPorAtender');
        Tickets.botonSolucion = $('#botonSolucion');
        /****************AREAS DE CARGA DE DATOS****************/
        Tickets.listaPersonalAtiende = $('#listaPersonalAtiende');//cargar la lista del personal que atiende tickets (Modal atendiendose)
        Tickets.listaPersonalAsignar = $('#listaPersonalAsignar');//cargar la lista del personal para asignar un ticket en particular(Modal asiganar ticket)
        Tickets.cargarDataTicket = $('#cargarDataTicket');//cargar la información de un ticket (Modal datos del ticket)
        Tickets.infoEstadisticas = $('#infoEstadisticas');//la list de quien fienalizo tickets en el día
        Tickets.listaTicketsAbrir = $('#listaTicketsAbrir');//lista de ticket abiertos que estan pendientes por ser atendidos
        Tickets.fechas = $('#fechasTicket');
        Tickets.tiempoRespuesta = $('#tiempoRespuesta');
        Tickets.motivoApertura = $('#motivoApertura');//mostramos la respuesta del usuario para solicitar abrir el ticket
        Tickets.mostrarDatosTicketsHistorial = $('#mostrarHistorialTickets');//mostramos la lista de tickets que estan en el historial
        Tickets.problema = $('textarea[name="problema"]');
        Tickets.causa = $('textarea[name="causa"]');
        Tickets.solucion = $('textarea[name="solucion"]');
        Tickets.mostrarDatosTickets0 = $('#mostrarDatosTickets0');//mostramos la cola de ticket pendintes por ser atendidos
        Tickets.mostrarDatosTickets1 = $('#mostrarDatosTickets1');//mostramos la cola de ticket que se estan atendiendo
        Tickets.mostrarDatosTickets2 = $('#mostrarDatosTickets2');//mostramos la cola de ticket finalizados
        Tickets.cargarHistorialTicket = $('#datosTicketsHistorial');//cargamos el historial que tenga un ticket en especifico
        /*******************BOTONES DIVERSOS********************/
        Tickets.botonTomarTicketDesorden = $('#botonTomarTicketDesorden');
        Tickets.botonTomarTicketOrden = $('#botonTomarTicketOrden');
        Tickets.botonMotivoApertura = $('#botonMotivoApertura');
        Tickets.botonTomarTicketAbierto = $('#botonTomarTicketAbierto');
        Tickets.botonCerrarTicket = $('#botonCerrarTicket');
        Tickets.botonCerrarTicketAbierto = $('#botonCerrarTicketAbierto');
        Tickets.botonVentanaFlotante = $('#botonVentanaFlotante');
         /*******************PAGINADOR********************/
        Tickets.buscador = $('#buscador');
        Tickets.paginador = $('.paginador');
        /*************************OTROS********************/
        Tickets.formularioGuardarSolucion=$('#formularioGuardarSolucion');
        Tickets.area = $('#categoriaConfiguraciones');
        Tickets.botonCategorias = $('#nuevasCategorias');
        Tickets.botonSubCategorias = $('#nuevasSubCategorias');
        Tickets.categoria = $('input[name="nuevaCategoria"]');
        Tickets.subCategoria = $('input[name="nuevaSubCategoria"]');
        Tickets.contenedorCategorias = $('#contenedorCategorias');
        Tickets.contenedorSubCategorias = $('#contenedorSubCategorias');
        Tickets.botonSonidoPersonalizado = $('#cargarSonidoPersonalizado');
        Tickets.nombreSonidoPersonalizado = $("#nombreSonidoPersonalizado");
        Tickets.sonido1=$('#sonido1');
        Tickets.sonido2=$('#sonido2');
        Tickets.sonido3=$('#sonido3');
        Tickets.sonido4=$('#sonido4');
        Tickets.sonido5=$('#sonido5');
        Tickets.sonido6=$('#sonido6');
        Tickets.sonido7=$('#sonido7');
        Tickets.id = $('#credencialesUsuario').attr('value');//id de la persona
        Tickets.areaDefault = Tickets.contenedorPrincipal.attr('data');//categoria que por defecto atiende
        Tickets.areaDefaultIcono='';
        if(Tickets.areaDefault == 1){
            Tickets.areaDefaultIcono=1;
            Tickets.areaDefault = '.fa-wrench';
        }
        else if(Tickets.areaDefault == 2){
            Tickets.areaDefaultIcono=2;
            Tickets.areaDefault = '.fa-chrome';
        }
        else{
            Tickets.areaDefaultIcono=3;
            Tickets.areaDefault = '.fa-file-code-o';
        }
        Tickets.imagenStatusOn = $('#statusSistemaOn');
        Tickets.imagenStatusOff = $('#statusSistemaOff');
        /**************************FORMULARIO***************/
        Tickets.formulario = $('#formularioTickets');
        Tickets.botonCancelar = $('#cancelarTickets');
        Tickets.botonAdjuntar = $('#botonAdjuntarArchivos');
        Tickets.contenedorDocumentos = $("#contenedorDocumentos");
        Tickets.archivos = [];
        Tickets.pesoMaximo = 5; //MB
        Tickets.usuario = $('select[name="usuario"]');
        Tickets.sucursal = $('select[name="sucursal"]');
        Tickets.areaF = $('select[name="area"]');
        Tickets.categoriaF = $('select[name="categoria"]');
        Tickets.subcategoriaF = $('select[name="subcategoria"]');
        Tickets.asunto = $('input[name="asunto"]');
        Tickets.descripcion = $('textarea[name="descripcion"]');
        Tickets.validarIcono = $('.fa-check-circle');
        Tickets.expreg= Array(/[#<>"']{1,}/,/[1-9]{1,}/);
        Tickets.especiales = "' < > # \" _";
        Tickets.labelContenedorDocumentos = '<h2>Arrastra y sulta los archivos que desees adjuntar o <button type="button" class="btn adjuntarArchivos" style="background:#1F61A1;color:#fff;"><i class="fa fa-paperclip"></i> Presiona</button></h2>';
    }

    static activarModalFinalizados(){
        Tickets.modalFinalizados.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{modalFinalizados:true},(error,respuesta)=>{
            if(error){console.log(error);return;}
            Tickets.infoEstadisticas.html(respuesta.data);
        });
    }

    static activarModalPorAbrir(){
        Tickets.modalPorAbrir.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{modalPorAbrir:true},(error,respuesta)=>{
            if(error){console.log(error);return;}
            Tickets.listaTicketsAbrir.html(respuesta.data);
        });
    }

    static activarModalAtendiendose(){
        Tickets.modalAtendiendose.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{modalAtendiendose:true},(error,respuesta)=>{
            if(error){console.log(error);return;}
            Tickets.listaPersonalAtiende.html(respuesta.data);
        });
    }

    static activarModalPorAtender(){
        Tickets.modalPorAtender.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{modalPorAtender:true},(error,respuesta)=>{
            if(error){console.log(error);return;}
            Tickets.labelPorAtenderMarcadorSoporte.text(respuesta.soporte);
            Tickets.labelPorAtenderMarcadorGiro.text(respuesta.giro);
            Tickets.labelPorAtenderMarcadorDesarrollo.text(respuesta.desarrollo);
        });

    }

    static activarModalDatosTicket(){
        Tickets.labelTicketModalDatosTicket.text(Tickets.numeroTicket)
        Tickets.label(Tickets.areaTicket);
        Tickets.modalDatosTicket.modal('show');
       MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{datosTicket:Tickets.numeroTicket},(error,respuesta)=>{
            if(error){Tickets.modalDatosTicket.modal('hide');console.log(error);return;}
            Tickets.situacionBoton(parseInt(respuesta.situacion));
            Tickets.fechas.html(respuesta.fechas);
            Tickets.tiempoRespuesta.html(respuesta.tiempoRespuesta);
            Tickets.cargarDataTicket.html(respuesta.data);
            $("#loadImageDatos").remove();
        });
    }

    static activarModalAsignarTicket(){
        Tickets.modalAsignarTicket.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{modalAsignarTicket:true},(error,respuesta)=>{
            if(error){console.log(error);return;}
            Tickets.listaPersonalAsignar.html(respuesta.data);
        });
    }

    static situacionBoton(data){
        if(data == 0){//por atender
            Tickets.botonTomarTicketAbierto.hide();
            Tickets.botonCerrarTicket.hide();
            Tickets.botonMotivoApertura.hide();
            Tickets.botonTomarTicketDesorden.show();
            Tickets.botonCerrarTicketAbierto.hide()
            Tickets.botonSolucion.hide();
        }
        else if(data == 1){//siendo atendido
            Tickets.botonTomarTicketAbierto.hide();
            Tickets.botonCerrarTicket.show();
            Tickets.botonMotivoApertura.hide();
            Tickets.botonTomarTicketDesorden.hide();
            Tickets.botonCerrarTicketAbierto.hide()
            Tickets.botonSolucion.hide();
        }
        else if(data == 2 /*|| data == 5*/){//atendido ok
            Tickets.botonTomarTicketAbierto.hide();
            Tickets.botonCerrarTicket.hide();
            Tickets.botonMotivoApertura.hide();
            Tickets.botonTomarTicketDesorden.hide();
            Tickets.botonCerrarTicketAbierto.hide()
            Tickets.botonSolucion.show();
        }
        else if(data == 3){//abierto siendo atendido
            Tickets.botonTomarTicketAbierto.show();
            Tickets.botonCerrarTicket.hide();
            Tickets.botonMotivoApertura.show();
            Tickets.botonTomarTicketDesorden.hide();
            Tickets.botonCerrarTicketAbierto.hide()
            Tickets.botonSolucion.hide();
        }
        else{//abierto atendido
            Tickets.botonTomarTicketAbierto.hide();
            Tickets.botonCerrarTicket.hide();
            Tickets.botonMotivoApertura.hide();
            Tickets.botonTomarTicketDesorden.hide();
            Tickets.botonCerrarTicketAbierto.show();
            Tickets.botonSolucion.hide();
        }
    }

    static icono(n){
        if(n==1)
            return '<i class="fa fa-wrench fa-3x text-blue"></i>';
        else if(n==2)
            return '<i class="fa fa-chrome fa-3x text-yellow"></i>';
        else
            return '<i class="fa fa-file-code-o fa-3x text-green"></i>';
    }

    static label(n){
        if(n==1){
            Tickets.labelCategoria.text('Soporte Técnico');
            Tickets.labelCategoria.css('background','#00c0ef');
        }
        else if(n==2){
            Tickets.labelCategoria.text('GIRO');
            Tickets.labelCategoria.css('background','#f39c12');
        }
        else{
            Tickets.labelCategoria.text('Desarrollo Sofware');
            Tickets.labelCategoria.css('background','#00a65a');
        } 
    }

    static paginar(elemento){
        let datos = new FormData();
        datos.append("paginaActual", $(elemento).parent().attr("actual"));
        datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
        datos.append("target", $(elemento).parent().parent().attr("target"));
        datos.append("buscar", $(elemento).parent().parent().attr("buscar"));
        Tickets.recargarPaginador(datos);
    }

    static filtros(){
        let datos = new FormData();
        datos.append("paginaActual", 1);
        datos.append("registrosPorPagina", Tickets.paginador.find('ul').attr('registros'));
        datos.append("target", Tickets.paginador.find('ul').attr('target'));
        datos.append("buscar", Tickets.buscador.val());
        Tickets.recargarPaginador(datos);
    }

    static recargarPaginador(datos){
        Tickets.mostrarDatosTicketsHistorial.html('<div style="text-align:center"><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i></div>');
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxTickets.php",datos,(error,respuesta)=>{
            if(error){console.log('Ocurrio un error: ',respuesta);return;}
            Tickets.mostrarDatosTicketsHistorial.html(respuesta.html);
            Tickets.paginador.html(respuesta.paginador);
            Tickets.totalRegistros.html(respuesta.total);
        });
    }

    static MaysPrimera(string){
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    static agregarCategoria(id){
        if(Tickets.categoria.val() == ""){
            MetodosDiversos.mostrarRespuesta('warning','Escribe el nombre de la categoria','',30000,true);
            return;
        }
        let nombreCategoria = Tickets.categoria.val().trim();
        nombreCategoria = Tickets.MaysPrimera(nombreCategoria.toLowerCase());
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{agregarCategoria:id,nombre:nombreCategoria},(error,respuesta)=>{
            if(!respuesta.error){
                Tickets.categoria.val(''); 
                Tickets.contenedorCategorias.append('<li class="categoria-padre" name="'+respuesta.id+'">'+nombreCategoria+'</li>');
                Tickets.contenedorCategorias.html(Tickets.contenedorCategorias.find('li').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));  
            }
        });     
    }

    static agregarSubCategoria(area,categoria){
        let nombre = Tickets.subCategoria.val().trim();
        nombre = Tickets.MaysPrimera(nombre.toLowerCase());
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{agregarSubCategoria:area,categoria,nombre},(error,respuesta)=>{
            if(!respuesta.error){
                Tickets.subCategoria.val(''); 
                Tickets.contenedorSubCategorias.append('<li name="'+respuesta.id+'">'+nombre+'</li>');
                Tickets.contenedorSubCategorias.html(Tickets.contenedorSubCategorias.find('li').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));  
            }
        });     
    }

    static cargarCategorias(tipo){
        let area = tipo==1 ? Tickets.area.val() : Tickets.areaF.val();
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{cargarCategorias:area,tipo},(error,respuesta)=>{
            if(!error){
                if(tipo==1)
                    Tickets.contenedorCategorias.html(respuesta.categorias);
                else
                    Tickets.categoriaF.html(respuesta.categorias);
            }
        });
    }

    static cargarSubCategorias(tipo,id = 0){
        let area = '', categoria = '',subcategoria='';
        if(tipo==1){
            area = Tickets.area.val();
            categoria = id;
            subcategoria = Tickets.contenedorSubCategorias;
        }
        else{
            area = Tickets.areaF.val()
            categoria = Tickets.categoriaF.val();
            subcategoria = Tickets.subcategoriaF;
        }
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{cargarSubcategorias:true,area,categoria,tipo},(error,respuesta)=>{
            if(!error && respuesta.subcategorias !== '<option value=""></option>' && respuesta.subcategorias !== ''){
                if(tipo==2){
                    subcategoria.prop("disabled",false)
                    subcategoria.prev().css("visibility","visible");
                    subcategoria.prop("required",true);
                }
                subcategoria.html(respuesta.subcategorias);
            }
            else{
                if(tipo==2)
                    subcategoria.html('<option value=""></option>');
                else
                    subcategoria.html('');
            }
                
        });
    }

    static cargarFormulario(data){//cargar el sonido personalizado
        MetodosDiversos.mostrarRespuesta('','<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#811363"><br><div class="knob-label" id="loaded_n_total"></div>',' Por favor espere... ',120000,true); 
        
        $("#progressBar").knob({
            change : function (value) {
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Tickets.progressHandler, false);
        ajax.addEventListener("load", function(e){
            Tickets.botonSonidoPersonalizado.val('');
            let respuesta = JSON.parse(e.srcElement.response);
            if(respuesta.error){
                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,30000,true); 
                return;
            }
            MetodosDiversos.mostrarRespuesta("success","","",2000,false);
            Tickets.sonido7.prop("checked",true);
            Tickets.nombreSonidoPersonalizado.attr('src','views/sonidos/tickets/'+Tickets.id+'/sonido-personalizado.mp3');
        }, false);
        ajax.addEventListener("error", Tickets.errorHandler, false);
        ajax.addEventListener("abort", Tickets.abortHandler, false);
        ajax.open("POST", "controllers/AjaxTickets.php");
        ajax.send(data);
    }

    static progressHandler(e){
        $('#loaded_n_total').text( MetodosDiversos.formatBytes(e.loaded) + " de " + MetodosDiversos.formatBytes(e.total));
       let percent = (e.loaded / e.total) * 100;
       let redondeo = Math.round(percent);
       Tickets.knobfunction(redondeo);
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

    static cargarFormulario2(n,input){//cargar sonido de los predeterminados
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{sonidoPersonalizado2:n},(error,respuesta)=>{
            if(respuesta.error){
                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,30000,true); 
                return;
            }
            input.prop("checked",true);
            Tickets.nombreSonidoPersonalizado.attr('src','');
            MetodosDiversos.mostrarRespuesta("success","","",2000,false);
        });
    }

/************************************************************FORMULARIO DE GENERAR TICKETS**********************/
    static validarTexto(input,expreg,count = 10){
        if( input.val().length >= count ){
            if(expreg.test(input.val()))
                input.parent().children('i').removeClass("text-green");
            else 
                input.parent().children('i').addClass("text-green");
        }
        else
            input.parent().children('i').removeClass("text-green");
    }

    static validarSelect(select,expreg){
            if(!expreg.test(select.val()) && select.val() === "")
                select.parent().children('i').removeClass("text-green");  
            else
                select.parent().children('i').addClass("text-green");   
    }

    static validarFormulario(){
        if(!Tickets.expreg[1].test(Tickets.areaF.val())){
            MetodosDiversos.mostrarRespuesta("warning","El campo área no tiene el formato correcto","",60000,true);
            return false;
        } 
        if(!Tickets.expreg[1].test(Tickets.categoriaF.val())){
            MetodosDiversos.mostrarRespuesta("warning","El campo categoria no tiene el formato correcto","",60000,true);
            return false;
        }       
        if(Tickets.expreg[0].test(Tickets.asunto.val())){
            MetodosDiversos.mostrarRespuesta("warning","El campo asunto no debe contener caracteres especiales",Tickets.especiales,60000,true);
            return false;
        } 
        if(Tickets.expreg[0].test(Tickets.descripcion.val())){
            MetodosDiversos.mostrarRespuesta("warning","El campo descripción no debe contener caracteres especiales",Tickets.especiales,60000,true);
            return false;
        }
        return true;
    }

    static crearTicket(data){
        let form = new FormData(data);
        //let key,value;
        //for([key,value] of form.entries()) console.log(key + ":" + value);
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxTickets.php", form,(error,resp)=>{
            if(error){MetodosDiversos.mostrarRespuesta(resp.tipo,resp.titulo,resp.subtitulo,60000,true);return;}
            socket2.emit('nuevo',null);
            Tickets.actualizarCola(0,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets0.html(respuesta.nuevos);
                    Tickets.contadorPorAtender.html(respuesta.contadorPorAtender);
                }
            });
            MetodosDiversos.mostrarRespuesta(resp.tipo,resp.titulo,"Se generó correctamente",60000,true);
            Tickets.resetFormulario();
        });
    }

    static resetFormulario(){
        Tickets.formulario[0].reset();
        Tickets.validarIcono.removeClass("text-green");
        Tickets.resetDocumentTickets2();
    }

    static listarUsuarios(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{listarUsuarios:Tickets.sucursal.val()},(error,respuesta)=>{
            if(!error){
                    Tickets.usuario.html(respuesta.data)
            }
        });
    }
    /************************************************************************************************************ */
    /************************************************CARGAR DOCUMENTOS******************************************* */
    static cargarDocumentos(files){
        Tickets.contenedorDocumentos.css({"opacity":"1"});
        for(let i=0;i<files.length;i++ ){
            let file = files[i];
            let flag = false;
            
            Tickets.archivos.filter(function(f) {
                if( f.name == file.name)
                    return flag = true
            })[0];
    
            if(!flag){
                let valido = (/\.(?=pdf|docx|doc|xlsx|xls|pptx|ppt|jpg|jpeg|png|txt)/gi).test(file.name.toLowerCase());
                if (!valido) 
                    MetodosDiversos.mostrarRespuesta("warning","Formato no válido","Formatos válidos: .txt, .pdf, .docx, .doc, .xlsx, .xls, .pptx, .ppt, .jpg, .jpeg y .png",60000,true);
                else if (file.size > Tickets.pesoMaximo * 1024 * 1024)
                    MetodosDiversos.mostrarRespuesta("warning","El archivo tiene un tamaño mayor al permitido","El peso máximo es de " + Tickets.pesoMaximo + " MB",60000,true);
                else{
                    Tickets.contenedorDocumentos.append('<li><span>'+file.name+'</span><span class="close2 cancelDocument" aria-hidden="true" style="margin-right:2px;"><i class="fa fa-times fa-lg" style="color:#fff;" aria-hidden="true"></i></span><span style="color:#fff;margin-right:40px;float:right;font-weight: 700;">'+' Tamaño: ' + MetodosDiversos.formatBytes(file.size) +' </span></li>');
                    Tickets.archivos.push(file);
                }  
            }  
        }
        Tickets.resetDocumentTickets();
    }

    static resetDocumentTickets(){ 
        if(Tickets.contenedorDocumentos.html() === ""){
            Tickets.contenedorDocumentos.html(Tickets.labelContenedorDocumentos);
            Tickets.contenedorDocumentos.css({"padding-left":"0","padding-right":"0"});
        }
        Tickets.contenedorDocumentos.css({"opacity":"1"});
    }

    static resetDocumentTickets2(){
        Tickets.contenedorDocumentos.html(Tickets.labelContenedorDocumentos);
        Tickets.contenedorDocumentos.css({"padding-left":"0","padding-right":"0"});
        Tickets.archivos = [];
    }
    /*************************************************************************************** */

    static redirigirTicket(id,area){
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{redirigirTicket:id,area},(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
            if(error)return;
            socket2.emit('nuevo',null);
            Tickets.actualizarCola(0,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets0.html(respuesta.nuevos);
                    Tickets.contadorPorAtender.html(respuesta.contadorPorAtender);
                }
            });
            
        });
    }

    static tomarTicket(asignado=0){
         MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{tomarTicket:Tickets.numeroTicket,asignado},(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
            if(error){Tickets.modalDatosTicket.modal('hide'); return;};
            if(asignado!=0)
                Tickets.modalAsignarTicket.modal('hide');
            else
                Tickets.situacionBoton(1);
            socket2.emit('atendidos',null);//Informó a todos que actualicen la cola de atendidos
            Tickets.mensajes(respuesta.id_destino,1,respuesta.nombreAtiende); //Aviso al usuario que su ticket se está atendiendo crow
            Tickets.actualizarCola(1,function(respuesta){//YO actualizo la cola de atendidos
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets0.html(respuesta.nuevos); 
                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                    Tickets.contadorPorAtender.html(respuesta.contadorPorAtender);
                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                }
            });            
        });
    }

    static guardarSolucion(){
        let form = new FormData(Tickets.formularioGuardarSolucion[0]);
        form.append('guardarSolucion',Tickets.numeroTicket);
        let total = Tickets.archivos.length;
        if(total > 0){
            for(let i=0;i<total;i++)
                form.append("archivo"+i, Tickets.archivos[i]);
            form.append("total",total);
        } 

        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxTickets.php", form,(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
            if(error)return;
            Tickets.resetDocumentTickets2();
            socket2.emit('finalizados',null);////Esto no se debe ejecutar sí sólo se quiere actualizar la info, sólo se debe actualizar al cerrar el ticket
            if(respuesta.flag)
                Tickets.mensajes(respuesta.id_destino,2,respuesta.nombreAtiende); //Aviso al usuario que su ticket se está atendiendo crow
            Tickets.actualizarCola(2,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                    Tickets.mostrarDatosTickets2.html(respuesta.finalizados);
                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                    Tickets.contadorFinalizados.html(respuesta.contadorFinalizados);
                }
            });

            Tickets.modalSolucion.modal('hide');
            Tickets.modalDatosTicket.modal('hide');
            Tickets.formularioGuardarSolucion[0].reset();
        });
    }

    static obtenerProblemaCausaSolucion(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{mostrarSolucion:Tickets.numeroTicket},(error,respuesta)=>{
            if(!error){
                Tickets.problema.val(respuesta.problema);
                Tickets.causa.val(respuesta.causa);
                Tickets.solucion.val(respuesta.solucion);
                Tickets.archivosAnexosSoporte.html(respuesta.anexos);
                Tickets.modalSolucion.modal('show');
            }
        });
    }

    static actualizarCola(valor,callback){
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{actualizarCola:true,valor},(error,respuesta)=>{
            callback(respuesta);
        });
    }

    static iniciarTono(){
        $('input[name="tono"]:checked').each(function() {
            let media = $(this).parent().next()[0];
            const playPromise = media.play(); 
            if (playPromise !== null){ 
                playPromise.catch(function(){ 
                    media.play(); 
                });
            }

            /*let audio = new Audio($(this).parent().next().attr('src'));
            audio.play();*/
        });
    }

    static mensajes(id_destino,tipo,usuarioSoporte){
        let mensaje;
        if(tipo == 1)
            mensaje ="Tu ticket No. " + Tickets.numeroTicket + " ya esta siendo atendido por: " + usuarioSoporte; 
        else
            mensaje =usuarioSoporte +" finalizó tu ticket No. " + Tickets.numeroTicket;
        
        socket.emit('respuestaTicket',{mensaje,id_destino});
    }

    static main(){
        Tickets.setup();
        /*****************************SOCKETS */
        socket2.on('connect',function(){
            Tickets.imagenStatusOn.show();
            Tickets.imagenStatusOff.hide();
            Tickets.actualizarCola(5,function(respuesta){
                if(!respuesta.error){
                    console.log(respuesta);
                    Tickets.mostrarDatosTickets0.html(respuesta.nuevos); 
                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                    Tickets.mostrarDatosTickets2.html(respuesta.finalizados);
                    Tickets.contadorPorAtender.html(respuesta.contadorPorAtender);
                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                    Tickets.contadorFinalizados.html(respuesta.contadorFinalizados);
                    Tickets.contadorPorAbrir.html(respuesta.contadorPorAbrir);
                }
            }); 
        });

        socket2.on('disconnect',function(){
            Tickets.imagenStatusOff.show();
            Tickets.imagenStatusOn.hide();
        });

        socket2.on('nuevo',()=> {
            Tickets.actualizarCola(0,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets0.html(respuesta.nuevos);
                    Tickets.contadorPorAtender.html(respuesta.contadorPorAtender);
                    Tickets.iniciarTono()
                }
            });
        });

        socket2.on('atendidos',()=> {
            Tickets.actualizarCola(1,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets0.html(respuesta.nuevos); 
                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                    Tickets.contadorPorAtender.html(respuesta.contadorPorAtender);
                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                }
            });
        });

        socket2.on('cerrados',()=>{
            Tickets.actualizarCola(2,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                    Tickets.mostrarDatosTickets2.html(respuesta.finalizados);
                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                    Tickets.contadorFinalizados.html(respuesta.contadorFinalizados);
                }
            });
        });

        socket2.on('aceptarAbrir',()=>{
            Tickets.actualizarCola(3,function(respuesta){
                if(!respuesta.error){
                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                    Tickets.listaTicketsAbrir.html(respuesta.abiertos);
                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                    Tickets.contadorPorAbrir.html(respuesta.contadorPorAbrir);
                }
            });
        });

        socket2.on('solicitarAbrir',()=>{
            Tickets.actualizarCola(4,function(respuesta){
                if(!respuesta.error){
                    Tickets.listaTicketsAbrir.html(respuesta.abiertos);
                    Tickets.contadorPorAbrir.html(respuesta.contadorPorAbrir);
                    Tickets.iniciarTono();
                }
            });
        });
        /************************************ */


        Tickets.botonModalFinalizados.click(function(){Tickets.activarModalFinalizados();});
        Tickets.botonModalPorAbrir.click(function(){Tickets.activarModalPorAbrir();});
        Tickets.botonModalAtendiendose.click(function(){Tickets.activarModalAtendiendose();});
        Tickets.botonModalPorAtender.click(function(){Tickets.activarModalPorAtender();});

        Tickets.contenedorPrincipal.on('click','.botonDatosTicket',function(e){
            e.preventDefault();
            $('body').append('<div id="loadImageDatos" style="z-index:9000;width:100%;height:120%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;background: rgba(255,255,255,0.5);"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-60px;margin-left:-60px;"><h2 style="margin-left:12px;">Cargando</h2><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;color:#3489df;"></i></div></div>');
            Tickets.numeroTicket = $(this).parent().parent().parent().attr('data');
            Tickets.areaTicket = $(this).parent().parent().prev().attr('data');
            Tickets.activarModalDatosTicket();
        });
        Tickets.contenedorPrincipal.on('click','.botonAsignarTicket',function(e){
            e.preventDefault();
            Tickets.numeroTicket = $(this).parent().parent().parent().parent().parent().attr('data');
            Tickets.labelTicketModalAsignarTicket.text(Tickets.numeroTicket);
            Tickets.activarModalAsignarTicket();
        });
        Tickets.contenedorPrincipal.on('click','.botonAsignarTicket2',function(){
            let nombre = $(this).parent().prev().text();
            let idUsuario = $(this).parent().prev().attr('data');
            MetodosDiversos.crearRegistro('Ticket ' + Tickets.numeroTicket + ' a ' + nombre,'¿ Deseas asignarlo ?',callback=>{
                if(callback){
                    Tickets.tomarTicket(idUsuario);
                }
            },true);
        });

        Tickets.botonTomarTicketDesorden.click(function(){
            MetodosDiversos.crearRegistro('Ticket: ' + Tickets.numeroTicket + '<br>' + Tickets.icono(Tickets.areaTicket) +'<hr>','¿ Deseas tomarlo ?',callback=>{
                if(callback){
                    Tickets.tomarTicket();
                }
            },false);
        });

        Tickets.botonTomarTicketOrden.click(function(){
            let id = Tickets.mostrarDatosTickets0.find(Tickets.areaDefault).eq(0).parent().parent().attr('data');
            if(id === undefined)
                MetodosDiversos.mostrarRespuesta("success","No hay tickets de tu área","Para tomar tickets de otra área seleccionalo de la lista.",30000,true);
            else{
                Tickets.numeroTicket = id;
                let icono = 
                MetodosDiversos.crearRegistro('Ticket: ' + Tickets.numeroTicket + '<br>' + Tickets.icono(Tickets.areaDefaultIcono) +'<hr>','¿ Deseas tomarlo ?',callback=>{
                    if(callback){
                        Tickets.tomarTicket();
                    }
                },false);
            }  
        });

        Tickets.botonCerrarTicket.click(function(){
            MetodosDiversos.crearRegistro('Ticket ' + Tickets.numeroTicket,'¿ Deseas cerrarlo ?',callback=>{
                if(callback){
                    Tickets.causa.val('');
                    Tickets.solucion.val('');
                    Tickets.problema.val($('#asuntoProblema').text());
                    Tickets.modalSolucion.modal('show');  
                }
            },true);
        });

        Tickets.botonCerrarTicketAbierto.click(function(){
            MetodosDiversos.crearRegistro('Ticket ' + Tickets.numeroTicket,'¿ Deseas cerrarlo ?',callback=>{
                if(callback){
                    Tickets.obtenerProblemaCausaSolucion();
                }
            },true);
        });

        Tickets.botonTomarTicketAbierto.click(function(){
            MetodosDiversos.crearRegistro('Ticket: ' + Tickets.numeroTicket + '<br>' + Tickets.icono(Tickets.areaTicket) +'<hr>','¿ Deseas tomarlo ?',callback=>{
                if(callback){
                    MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{autorizarApertura:Tickets.numeroTicket},(error,respuesta)=>{
                        if(!error){
                            Tickets.situacionBoton(4);
                            socket2.emit('aceptarAbrir',null);
                            Tickets.mensajes(respuesta.id_destino,1,respuesta.nombreAtiende); //Aviso al usuario que su ticket se está atendiendo crow
                            Tickets.actualizarCola(3,function(respuesta){
                                if(!respuesta.error){
                                    Tickets.mostrarDatosTickets1.html(respuesta.atendiendose);
                                    Tickets.listaTicketsAbrir.html(respuesta.abiertos);
                                    Tickets.contadorAtendiendose.html(respuesta.contadorAtendiendose);
                                    Tickets.contadorPorAbrir.html(respuesta.contadorPorAbrir);
                                }
                            });
                        }
                    });
                }
            },false);
        });

        Tickets.botonMotivoApertura.click(function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{motivoApertura:Tickets.numeroTicket},(error,respuesta)=>{
                if(!error){
                    Tickets.motivoApertura.val(respuesta.motivo);
                    Tickets.modalMotivoAbrirTicket.modal('show');
                }
            });
        });

        Tickets.contenedorPrincipal.on('click','.botonRedirigirTicket',function(e){
            e.preventDefault();
            Tickets.numeroTicket = $(this).parent().parent().parent().parent().parent().attr('data');
            MetodosDiversos.inputSelectAreaSistemas(Tickets.numeroTicket,function(area){
                Tickets.redirigirTicket(Tickets.numeroTicket,area);
            });
        });

        Tickets.botonSolucion.click(function(){
            Tickets.obtenerProblemaCausaSolucion();
        });

        Tickets.formularioGuardarSolucion.submit(function(e){
            e.preventDefault();
            MetodosDiversos.crearRegistro('Ticket: ' + Tickets.numeroTicket,'¿ Deseas guardar la información ?',callback=>{
                if(callback){
                   Tickets.guardarSolucion();
                }
            },true);
        });

        Tickets.buscador.on('input',function(){
            Tickets.filtros();
        });

        Tickets.contenedorPrincipal.on('click','.ticketsHistorial',function(e){//paginador (cada que se da click en un número de pagina)
            e.preventDefault();
            Tickets.paginar($(this));
        });

        Tickets.botonVentanaFlotante.click(function(){
            window.open( ruta_server + "views/pantalla_tickets_a5auTVS51Ft3Fi9KcTzyOnaKF/pantalla_tickets_54ahjppf45sd87a5aunUJLOUPzJGKvFGx2FKmGU.php", "Tickets");
        });

        Tickets.botonCategorias.click(function(){
            if(Tickets.area.val()!=="")
                Tickets.agregarCategoria(Tickets.area.val());
            else
                MetodosDiversos.mostrarRespuesta("warning","Selecciona un área","",30000,true);
        });
        Tickets.botonSubCategorias.click(function(){
            if(Tickets.area.val()==="")
                MetodosDiversos.mostrarRespuesta("warning","Selecciona un área","",30000,true);
            else if(Tickets.contenedorCategorias.html()==="")
                MetodosDiversos.mostrarRespuesta("warning","Selecciona una categoria","",30000,true);
            else if(Tickets.subCategoria.val()==="")
                MetodosDiversos.mostrarRespuesta('warning','Selecciona una categoria y escribe el nombre de la subcategoria','',30000,true);
            else{
                let categoria=Tickets.contenedorCategorias.find('.categoria-padre2').attr('name');
                Tickets.agregarSubCategoria(Tickets.area.val(),categoria);
            }
                
        });
        Tickets.area.change(function(){
            if(Tickets.area.val()!==""){
                Tickets.contenedorCategorias.html('<div style="text-align:center"><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i></div>');
                Tickets.categoria.prop('disabled',false);
                Tickets.subCategoria.prop('disabled',true);
                Tickets.contenedorSubCategorias.html('');
                Tickets.subCategoria.val('');
                Tickets.cargarCategorias(1);
            }   
            else{
                Tickets.categoria.prop('disabled',true);
                Tickets.subCategoria.prop('disabled',true);
                Tickets.categoria.val('');
                Tickets.subCategoria.val('');
                Tickets.contenedorCategorias.html('');
                Tickets.contenedorSubCategorias.html('');
            }
        });
        Tickets.contenedorPrincipal.on('click','.categoria-padre',function(){
            Tickets.contenedorSubCategorias.html('<div style="text-align:center"><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i></div>');
            Tickets.subCategoria.prop('disabled',false);
            $('.categoria-padre').removeClass('categoria-padre2');
            $(this).addClass('categoria-padre2');
            Tickets.cargarSubCategorias(1,$(this).attr('name')); 
        });
        Tickets.botonSonidoPersonalizado.change(function(e){
            let file = e.target.files[0];
            let valido = (/\.(?=mp3)/gi).test(file.name);
            
            if (!valido) {
                $(this).val('');
                swal("Formato no válido", "Formatos válido: .mp3", "error").catch(swal.noop);
                return;
            }
            let formulario = new FormData ();
            formulario.append("sonidoPersonalizado",true);
            formulario.append("sonido",e.target.files[0]);
            Tickets.cargarFormulario(formulario);
        });

        Tickets.sonido1.change(function(){
            Tickets.cargarFormulario2(1,$(this));
        });
        Tickets.sonido2.change(function(){
            Tickets.cargarFormulario2(2,$(this));
        });
        Tickets.sonido3.change(function(){
            Tickets.cargarFormulario2(3,$(this));
        });
        Tickets.sonido4.change(function(){
            Tickets.cargarFormulario2(4,$(this));
        });
        Tickets.sonido5.change(function(){
            Tickets.cargarFormulario2(5,$(this));
        });
        Tickets.sonido6.change(function(){
            Tickets.cargarFormulario2(6,$(this));
        });

        Tickets.contenedorPrincipal.on('click','.botonHistorial',function(e){
            e.preventDefault();
            Tickets.numeroTicket = $(this).parent().parent().parent().attr('data');
            Tickets.modalHistorialTicket.modal('show');
            MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{historialTickets_:Tickets.numeroTicket},(error,respuesta)=>{
                if(!error){
                    Tickets.cargarHistorialTicket.html(respuesta.html);
                }
            });
        });

        Tickets.contenedorPrincipal.on('click','.detalleBitacoraHistorialTicket',function(e){
            e.preventDefault();
            Tickets.numeroTicket = $(this).parent().parent().parent().attr('data');
            MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{motivoApertura:Tickets.numeroTicket,tipo:1},(error,respuesta)=>{
                if(!error){
                    Tickets.motivoApertura.val(respuesta.motivo);
                    Tickets.modalMotivoAbrirTicket.modal('show');
                }
            });
        });

        /*******************FORMULARIO GENERAR TICKETS*******/
        Tickets.areaF.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
            Tickets.subcategoriaF.prop("disabled",true);
            Tickets.subcategoriaF.prev().css("visibility","hidden");
            Tickets.subcategoriaF.prop("required",false);
            Tickets.subcategoriaF.html('<option value=""></option>');  
            Tickets.subcategoriaF.parent().children('i').removeClass("text-green");
            Tickets.categoriaF.parent().children('i').removeClass("text-green");
            if($(this).val() != 0){
                Tickets.categoriaF.html('<option value="">CARGANDO...</option>');
                Tickets.cargarCategorias(2); 
            }
                
            else
                Tickets.categoriaF.html('<option value=""></option>');    
        });

        Tickets.categoriaF.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
            Tickets.subcategoriaF.prop("disabled",true);
            Tickets.subcategoriaF.prev().css("visibility","hidden");
            Tickets.subcategoriaF.prop("required",false);
            Tickets.subcategoriaF.html('<option value=""></option>');
            Tickets.subcategoriaF.parent().children('i').removeClass("text-green");
            if($(this).val() != 0){
                Tickets.subcategoriaF.html('<option value="">CARGANDO...</option>');
                Tickets.cargarSubCategorias(2); 
            }
                
            else{
                Tickets.subcategoriaF.html('<option value=""></option>');
            } 
        });

        Tickets.subcategoriaF.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
        });

        Tickets.asunto.keyup(function(){
            Tickets.validarTexto($(this),Tickets.expreg[0]);
        });

        Tickets.descripcion.keyup(function(){
            Tickets.validarTexto($(this),Tickets.expreg[0],20);
        });

        Tickets.formulario.submit(function(e){
            e.preventDefault();
            if(Tickets.validarFormulario())
                Tickets.crearTicket($(this)[0]);
        });

        Tickets.sucursal.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
            Tickets.usuario.parent().children('i').removeClass("text-green");
            if($(this).val() != 0){
                Tickets.usuario.html('<option value="">CARGANDO...</option>');
                Tickets.listarUsuarios(); 
            }
            else
                Tickets.usuario.html('<option value=""></option>');
        });

        Tickets.usuario.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
        });

        ////////////////////Carga de archivos//////////////////////////////

        $('body').on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if(Tickets.archivos.length === 0)
               Tickets.resetDocumentTickets2();
        });
        $('body').on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            if(Tickets.archivos.length === 0)
               Tickets.resetDocumentTickets2();
        });
        $('body').on("ondragstart", function(e){
            e.preventDefault();
            e.stopPropagation();
            if(Tickets.archivos.length === 0)
               Tickets.resetDocumentTickets2();
        });
        $('body').on("dragleave", function(e){
            e.preventDefault();
            e.stopPropagation();
            if(Tickets.archivos.length === 0)
               Tickets.resetDocumentTickets2();
        });

        Tickets.contenedorDocumentos.on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if($(this).html() === Tickets.labelContenedorDocumentos){
                $(this).html('');
                $(this).css({"padding-left":"30px","padding-right":"30px"});
            }
            $(this).css({"background":"#007BFF","opacity":".6"});
        });

	    Tickets.contenedorDocumentos.on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            let files = e.originalEvent.dataTransfer.files;  
            Tickets.cargarDocumentos(files);
        });

        Tickets.contenedorDocumentos.on("dragleave", function(e){
            Tickets.resetDocumentTickets();
        });

        Tickets.contenedorDocumentos.on('click','.cancelDocument',function(){
            let eliminar = $(this).parent().children('span').text();

            let total = eliminar.length;
            let temp;

            eliminar = eliminar.substring( 0, total-17 );
            temp = Tickets.archivos.filter(function(file){
                return file.name === eliminar;
            })[0];

            if(temp === undefined){
                eliminar = eliminar.substring( 0, total-18 );
                temp = Tickets.archivos.filter(function(file){
                return file.name === eliminar;
                })[0];
            }

            Tickets.archivos = Tickets.archivos.filter(function(file){
                return file.name !== eliminar;
            });

            $(this).parent().remove();
            if(Tickets.archivos.length === 0)
               Tickets.resetDocumentTickets2();
            console.log('archivo eliminado: ' + eliminar)
            console.log('total de archivos: ' + Tickets.archivos.length)
        });

        Tickets.contenedorDocumentos.on('click','.adjuntarArchivos',function(){
            Tickets.botonAdjuntar.click();
        });

        Tickets.botonAdjuntar.change(function(e){
            let files = e.target.files;
            if(Tickets.contenedorDocumentos.html() === Tickets.labelContenedorDocumentos){
                Tickets.contenedorDocumentos.html('');
                Tickets.contenedorDocumentos.css({"padding-left":"30px","padding-right":"30px"});
            }
            Tickets.cargarDocumentos(files);
            Tickets.botonAdjuntar.val('');
        });

        

    }
}

Tickets.main();