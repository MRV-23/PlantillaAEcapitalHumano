class Tickets{

    static declaraciones(){
        Tickets.formulario = $('#formularioTickets');
        Tickets.botonCancelar = $('#cancelarTickets');
        Tickets.botonAdjuntar = $('#botonAdjuntarArchivos');
        Tickets.contenedorDocumentos = $("#contenedorDocumentos");
        Tickets.archivos = [];
        Tickets.pesoMaximo = 5; //MB
        Tickets.area = $('select[name="area"]');
        Tickets.categoria = $('select[name="categoria"]');
        Tickets.subcategoria = $('select[name="subcategoria"]');
        Tickets.asunto = $('input[name="asunto"]');
        Tickets.descripcion = $('textarea[name="descripcion"]');
        Tickets.validarIcono = $('.fa-check-circle');
        Tickets.expreg= Array(/[#<>"']{1,}/,
                              /[1-9]{1,}/);
        Tickets.especiales = "' < > # \" _";
        Tickets.listarTickets = $("#listarTickets");
        Tickets.modalDatosTicket = $('#modalDatosTicket');
        Tickets.mostrarDatosTicket = $('#cargarDataTicket');
        Tickets.botonActualizarListaTickets = $('#botonActualizarListaTickets');
        Tickets.numeroTicket = 0;
        Tickets.numeroTicketLabel = $('#numeroTicketLabel');
        Tickets.botonAbrirTicket = $('#botonAbrirTicket');
        Tickets.labelContenedorDocumentos = '<h2>Arrastra y sulta los archivos que desees adjuntar o <button type="button" class="btn adjuntarArchivos" style="background:#1F61A1;color:#fff;"><i class="fa fa-paperclip"></i> Presiona</button></h2>';
        Tickets.modalAperturaTicket = $('#modalAperturaTicket');
        Tickets.formularioMotivo = $('#formularioMotivo');
        Tickets.fechas = $('#fechasTicket');
        
    }

    static resetFormulario(){
        Tickets.formulario[0].reset();
        Tickets.validarIcono.removeClass("text-green");
        Tickets.resetDocumentTickets2();
    }

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
        if(!Tickets.expreg[1].test(Tickets.area.val())){
            MetodosDiversos.mostrarRespuesta("warning","El campo área no tiene el formato correcto","",60000,true);
            return false;
        } 
        if(!Tickets.expreg[1].test(Tickets.categoria.val())){
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
        let total = Tickets.archivos.length;
        if(total > 0){
            for(let i=0;i<total;i++)
                form.append("archivo"+i, Tickets.archivos[i]);
            form.append("total",total); 
        }
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxTickets.php", form,(error,resp)=>{
            MetodosDiversos.mostrarRespuesta(resp.tipo,resp.titulo,resp.subtitulo,60000,true);
            if(error)return;
            socket2.emit('nuevo',null);
            Tickets.actualizarListaTickets();
            Tickets.resetFormulario();
        });
    }


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
                    MetodosDiversos.mostrarRespuesta("warning","El archivo tiene un tamaño mayor al permitido","El peso máximo es de "+ Tickets.pesoMaximo +" MB",60000,true);
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

    static datosTicket(){
        Tickets.modalDatosTicket.modal('show');
        Tickets.numeroTicketLabel.text(Tickets.numeroTicket);
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{datosTicketUsuario:Tickets.numeroTicket},(error,respuesta)=>{
            if(error){Tickets.modalDatosTicket.modal('hide');console.log(error);return;}
            if(respuesta.situacion==2)
                Tickets.botonAbrirTicket.show();
            else
                Tickets.botonAbrirTicket.hide();
            if(respuesta.leido==1){
                $('#'+Tickets.numeroTicket).find('.ticketVisto').removeClass("fa-eye-slash");
                $('#'+Tickets.numeroTicket).find('.ticketVisto').addClass("fa-eye text-black");
            }
            Tickets.fechas.html(respuesta.fechas);
            Tickets.mostrarDatosTicket.html(respuesta.data);
            //$("#loadImageDatos").remove();
        });
    }

    static estadoBoton(data){
        if(data == 2 || data == 5)
            Tickets.botonAbrirTicket.show();
        else
            Tickets.botonAbrirTicket.hide();
    }

    static actualizarListaTickets(){
        Tickets.listarTickets.html('<div style="margin-top:30px;" class="text-center"><i class="fa fa-refresh fa-spin fa-5x text-blue"></i></div>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php", {actualizarHistorialUsuario:true},(error,resp)=>{
            if(!error)
                Tickets.listarTickets.html(resp.html); 
        });
    }

    static verificarApertura(){
        MetodosDiversos.crearRegistro('¿Estas seguro que deseas abrir el ticket?','',(resp)=>{
            if(resp){
                Tickets.modalAperturaTicket.modal('show');
            }
        });
    }

    static aceptarApertura(){
        let form = new FormData(Tickets.formularioMotivo[0]);
        form.append('reabrirTicketUsuario',Tickets.numeroTicket)
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxTickets.php", form,(error,resp)=>{
            if(error)return;
            $('#'+Tickets.numeroTicket).find('.iconoActualizable').children(1).remove();
            $('#'+Tickets.numeroTicket).find('.iconoActualizable').append('<i class="fa fa-clock-o fa-2x text-yellow"></i>');
            MetodosDiversos.mostrarRespuesta('success','Ticket No. '+Tickets.numeroTicket+' abierto','El equipo de soporte técnico se pondra en contacto a la brevedad.',60000,true);
            Tickets.modalAperturaTicket.modal('hide');
            Tickets.modalDatosTicket.modal('hide');
            socket2.emit('solicitarAbrir',null);
            Tickets.formularioMotivo[0].reset();
        });
        
    }

    static cargarCategorias(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{cargarCategorias:Tickets.area.val(),tipo:2},(error,respuesta)=>{
            if(!error){
                Tickets.categoria.html(respuesta.categorias);
            }
        });
    }

    static cargarSubCategorias(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxTickets.php",{cargarSubcategorias:true,area:Tickets.area.val(),categoria:Tickets.categoria.val(),tipo:2},(error,respuesta)=>{
            if(!error && respuesta.subcategorias !== '<option value=""></option>'){
                Tickets.subcategoria.prop("disabled",false);
                Tickets.subcategoria.prev().css("visibility","visible");
                Tickets.subcategoria.prop("required",true);
                Tickets.subcategoria.html(respuesta.subcategorias);
            }
            else
                Tickets.subcategoria.html('<option value=""></option>');
        });
    }

    static main(){
        Tickets.declaraciones();
//////////////////////////Validaciones/////////////////////////
        Tickets.area.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
            Tickets.subcategoria.prop("disabled",true);
            Tickets.subcategoria.prev().css("visibility","hidden");
            Tickets.subcategoria.prop("required",false);
            Tickets.subcategoria.html('<option value=""></option>');  
            Tickets.subcategoria.parent().children('i').removeClass("text-green");
            Tickets.categoria.parent().children('i').removeClass("text-green");
            if($(this).val() != 0){
                Tickets.categoria.html('<option value="">CARGANDO...</option>');
                Tickets.cargarCategorias(); 
            }
                
            else
                Tickets.categoria.html('<option value=""></option>');    
        });

        Tickets.categoria.change(function(){
            Tickets.validarSelect($(this),Tickets.expreg[1]);
            Tickets.subcategoria.prop("disabled",true);
            Tickets.subcategoria.prev().css("visibility","hidden");
            Tickets.subcategoria.prop("required",false);
            Tickets.subcategoria.html('<option value=""></option>');
            Tickets.subcategoria.parent().children('i').removeClass("text-green");
            if($(this).val() != 0){
                Tickets.subcategoria.html('<option value="">CARGANDO...</option>');
                Tickets.cargarSubCategorias(); 
            }
                
            else{
                Tickets.subcategoria.html('<option value=""></option>');
            } 
        });

        Tickets.subcategoria.change(function(){
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
            if(Tickets.validarFormulario()){
                MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',240000,true);
                Tickets.crearTicket($(this)[0]);
            }   
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
            /*let eliminar = $(this).parent().children('span').text();
            Tickets.archivos = Tickets.archivos.filter(function(file){
                return file.name != eliminar;
            });
            $(this).parent().remove();
            if(Tickets.archivos.length === 0)
               Tickets.resetDocumentTickets2();*/
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
      
////////////////////////////////////////Botones///////////////////////////////////////////////
        Tickets.botonCancelar.click(function(){
            Tickets.resetFormulario();
        });

        Tickets.listarTickets.on('click','.botonDatosTicketUsuario',function(e){
            e.preventDefault();
            Tickets.numeroTicket = $(this).parent().parent().parent().attr('id');
            Tickets.datosTicket()
        });

        Tickets.botonActualizarListaTickets.click(function(){
            Tickets.actualizarListaTickets();
        });

        Tickets.botonAbrirTicket.click(function(){
            Tickets.verificarApertura();
        });

        Tickets.formularioMotivo.submit(function(e){
            e.preventDefault();
            Tickets.aceptarApertura();
        });

    }
}

Tickets.main();
