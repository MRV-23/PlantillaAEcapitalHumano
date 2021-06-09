class TicketsUsuarios{

    constructor(){
        this.formulario = $('#formularioNuevoTicketUsuario');
        this.categorias = $('#areaSistemas');
        this.subcategorias = $('#cargarSubCategoriaTickets');
        this.cargarSegmento = $('#segmentoTickets'); 
        this.imagenTicket = $('#cargarImagenTicket');
        this.documentoTicket = $('#cargarDocumentoTicket');
        this.lienzo = $('#lienzoArchivosTickets');
        this.lienzoDocumentos = $('#lienzoDocumentosTickets');
        this.imagen = $(".imagenTicket");
        this.abrirTicket = $('#reabrirTicketSoporte');
        this.folio = $('#folioTicket');
        this.cargarTickets = $('#actualizarTicketsUsuarios');
        this.actualizarHistorial = $('#actualizarHistorialTickets');
        this.mostrarRegistro = $('.mostrarDatosTicketUsuario');
        
    }

    static generarNuevoTicket(data){
        let formulario = new FormData(data.formulario[0]);
            swal({
                title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                text: ' Por favor espere...',
                type: '',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            
                //formulario.append("numeroTicket", respuestaUltimoTicket);
                $.ajax({
                    url: ruta_server + "controllers/AjaxTickets.php",
                    method: "POST",
                    data: formulario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if(!respuesta.error){
                            swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                            TicketsUsuarios.resetear(data);
                            socket.emit('nuevoTicket',{categoria:formulario.entries().next().value[1],folio:respuesta.folio},(response)=>{});
                            socket.emit('actualizarColaTickets',null);
                            TicketsUsuarios.actualizarHistorial(data);
                        }
                        else{
                            swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                        }  
                    }
                });
           
    }

    static reabrirTicket(id,tipo){
        swal({
            title: '¿Deseas abrir el ticket?',
            text: "",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, continuar!'
        }).then((result) => {
            swal({
                title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                text: ' Por favor espere...',
                type: '',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            $.ajax({
                type: "POST",
                url: ruta_server + "controllers/AjaxTickets.php",
                dataType: "json",
                data: { idReabrirTicket : id
                }
            }).done(function(respuesta) {
                swal({ type: respuesta.tipo, title: respuesta.mensaje, text: respuesta.mensaje2}).catch(swal.noop);
                $('#mostrarDatosTicket').modal('hide');
                if(respuesta.status)
                    socket.emit('reabrirTicket',tipo);
            }).fail(function(error) {
                console.log('Ocurrio un error:', error);
                swal({ type: 'error', title: 'Ocurrio un error', text: 'No se encontró la ruta del archivo'}).catch(swal.noop);
                $('#mostrarDatosTicket').modal('hide');
            });
        }).catch(result=>{
        });
    }

     //Muestro toda la información de un ticket en particular
     static mostrarDatosTicket(referencia,data){
         let id=referencia.parent().parent().attr('id');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { idTicketRevision : id}
        }).done(function(respuesta) {
            recargar_solicitudes();
            $(referencia).children().html('<i class="fa fa-eye text-black"></i>');
            $('.divDatosTicketEncabezado').html(respuesta.html);
            $('.divDatosTicket').html(respuesta.html2);
            $('.divDatosTicket2').html(respuesta.html3);
            if (respuesta.imagen != null) {
                data.imagen.attr("src", ruta_server + "views/imagenes-usuarios/mini/" + respuesta.imagen + "");
                data.imagen.attr("alt", ruta_server + "views/imagenes-usuarios/" + respuesta.imagen + "");
            } 
            else {
                data.imagen.attr("src", ruta_server + "views/img/user.png");
                data.imagen.attr("alt", ruta_server + "views/img/user.png");
            }
            if(respuesta.estadoBoton < 2)
                 data.abrirTicket.hide();
            else 
                data.abrirTicket.show();
               
        }).fail(function(error) {console.log('Ocurrio un error:', error);});
    }

    static resetear(valores){
        valores.formulario[0].reset();
        valores.subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required readonly><option></option></select>');
        valores.cargarSegmento.html('');
        valores.imagenTicket .val('');
        valores.documentoTicket.val('');
        valores.lienzo.html('');
        valores.lienzoDocumentos.html('');
    }

    static actualizarHistorial(valores){
        valores.cargarTickets.html('<div style="text-align:center"><img src="' + ruta_server + 'views/img/status.gif"></div>');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxTickets.php",
            dataType: "json",
            data: { actualizarHistorial : true}
        }).done(function(respuesta) {
            valores.cargarTickets.html(respuesta.html);

            $('.mostrarDatosTicketUsuario').click(function(){
                TicketsUsuarios.mostrarDatosTicket($(this),valores);
            });
        }).fail(function(error) {console.log('Ocurrio un error:', error);});
    }


    static inicarClase(){
        let valores = new TicketsUsuarios();
      
        valores.formulario.submit(function(e){
            e.preventDefault();
            TicketsUsuarios.generarNuevoTicket(valores);
        });

        valores.categorias.change(function(){

            if($(this).val() != ''){
                if($(this).val() == 1){
                    valores.cargarSegmento.html('');
                    valores.subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required>'+
                                            '<option></option>'+
                                            '<option value="1">Carpetas en Red</option>'+
                                            '<option value="2">CONTPAQi Adminpaq</option>'+
                                            '<option value="3">CONTPAQi Contabilidad y Bancos</option>'+
                                            '<option value="4">CONTPAQi Facturación</option>'+
                                            '<option value="5">CONTPAQi Nomipaq</option>'+
                                            '<option value="6">Correo electrónico</option>'+
                                            '<option value="7">Impresoras y Toner</option>'+
                                            '<option value="8">Paquetería Office(Excel,Word, Power Point, etc.)</option>'+
                                            '<option value="9">Red e Internet</option>'+
                                            '<option value="10">Spark</option>'+
                                            '<option value="11">XML</option>'+
                                            '<option value="12">Otra</option>'+
                                        '</select>');
                }
                else if($(this).val() == 2){
                    valores.subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required>'+
                                            '<option></option>'+
                                            '<option value="1">Nóminas</option>'+
                                            '<option value="2">Procesos IMSS</option>'+
                                            '<option value="3">Módulo Pre Alta</option>'+
                                            '<option value="4">Módulo Recibos CFDI</option>'+
                                            '<option value="5">Módulo Archivo Electrónico</option>'+
                                            '<option value="6">Otra</option>'+
                                        '</select>');

                    let sub = $('#subCategoriaTickets');
                    sub.change(function(){
                        if(sub.val()!= ""){
                            if(sub.val() == 1){
                                valores.cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-2">'+
                                                    '</div>'+
                                                    '<div class="col-md-8">'+
                                                        '<label for="passActual">2.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Cálculos Ordinarios</option>'+
                                                                '<option value="2">Cálculos Extraordinarios</option>'+
                                                                '<option value="3">Finiquitos</option>'+
                                                                '<option value="4">Aguinaldos</option>'+
                                                                '<option value="5">Conexión a escritorio remoto</option>'+
                                                                '<option value="6">Usuarios y contraseñas</option>'+
                                                                '<option value="7">Reportes</option>'+
                                                                '<option value="8">Timbrado</option>'+
                                                                '<option value="9">Alta de Clientes / Tipos de Nómina</option>'+
                                                                '<option value="10">Alta de Puestos</option>'+
                                                                '<option value="11">Alta de Turnos</option>'+
                                                                '<option value="12">Movimientos masivos</option>'+
                                                                '<option value="13">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 2){
                                valores.cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-2">'+
                                                    '</div>'+
                                                    '<div class="col-md-8">'+
                                                        '<label for="passActual">2.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                 '<option value="1">Altas</option>'+
                                                                 '<option value="2">Bajas</option>'+
                                                                 '<option value="3">Modificaciones salariales</option>'+
                                                                 '<option value="4">Reingresos</option>'+
                                                                 '<option value="5">Alta de Registros patronales</option>'+
                                                                 '<option value="6">INFONAVIT</option>'+
                                                                 '<option value="7">FONACOT</option>'+
                                                                 '<option value="8">Movimientos masivos</option>'+
                                                                 '<option value="9">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 3){
                                valores.cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-2">'+
                                                    '</div>'+
                                                    '<div class="col-md-8">'+
                                                        '<label for="passActual">2.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Captura de información</option>'+
                                                                '<option value="2">Correo electrónico</option>'+
                                                                '<option value="3">Exportación de empleados</option>'+
                                                                '<option value="4">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 4){
                                valores.cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-2">'+
                                                    '</div>'+
                                                    '<div class="col-md-8">'+
                                                        '<label for="passActual">2.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Error en timbre</option>'+
                                                                '<option value="2">XML y PDF</option>'+
                                                                '<option value="3">Reportes</option>'+
                                                                '<option value="4">Falta de timbres</option>'+
                                                                '<option value="5">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else if(sub.val() == 5){
                                valores.cargarSegmento.html('<div class="row">'+
                                                    '<div class="col-md-2">'+
                                                    '</div>'+
                                                    '<div class="col-md-8">'+
                                                        '<label for="passActual">2.1.-Segmento: </label> <i class="fa fa-check-circle text-green"></i>'+
                                                        '<div id="cargarSubCategoriaTickets">'+
                                                            '<select class="form-control textoMay" name="segmentoTickets" required>'+
                                                                '<option></option>'+
                                                                '<option value="1">Alta de nuevos documentos</option>'+
                                                                '<option value="2">Otros</option>'+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>');
                            }
                            else{
                                valores.cargarSegmento.html('');
                            }
                        }
                        else{
                            valores.cargarSegmento.html('');
                        }
                    });
                }
                else if($(this).val() == 3){
                    valores.cargarSegmento.html('');
                    valores.subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required>'+
                                            '<option></option>'+
                                            '<option value="1">Ingreso al sistema</option>'+
                                            '<option value="2">Módulo agenda empresarial</option>'+
                                            '<option value="3">Módulo inicio</option>'+
                                            '<option value="4">Módulo mi cuenta</option>'+
                                            '<option value="5">Módulo paquetería</option>'+
                                            '<option value="6">Módulo solicitudes</option>'+
                                            '<option value="7">Módulo tickets</option>'+
                                            '<option value="8">Otra</option>'+
                                        '</select>');
                }
            }
            else{
                valores.subcategorias.html('<select class="form-control textoMay" name="subCategoriaTickets" id="subCategoriaTickets" required readonly><option></option></select>');
                valores.cargarSegmento.html('');
            }

       });

       $('#formularioCancelarTicketUsuario').click(function(){
            TicketsUsuarios.resetear(valores);
        });

        valores.mostrarRegistro.click(function(){
            TicketsUsuarios.mostrarDatosTicket($(this),valores);
        });

        valores.imagenTicket.change(function(e) {

            let file = e.target.files[0];
            let valido = (/\.(?=jpg|png|jpeg)/gi).test(file.name);
            
            if (!valido) {
                valores.imagenTicket.val('');
                swal("Sólo se permiten imagenes", "Formato: .jpg, .jpeg y .png", "error").catch(swal.noop);
                return;
            }
        
            let fileSizeLimit = 2; // In MB
            if (file.size > fileSizeLimit * 1024 * 1024) {
                valores.imagenTicket.val('');
                swal("La imagen tiene un tamaño mayor al permitido", "El peso máximo es de 2 MB", "error").catch(swal.noop);
                return;
            }
        
            valores.lienzo.html('<div class="row">'+
                            '<div class="col-md-2">'+
                            '</div>'+                                          
                            '<div class="col-md-8" >'+ 
                                '<div class="alert alert-success alert-dismissible">'+
                                    '<i class="icon fa fa-check"></i> IMAGEN: '+ 
                                    file.name +
                                    '<button type="button" id="cancelarImagen" class="close" aria-hidden="true">&times;</button>'+
                                '</div>'+           
                            '</div>'+
                        '</div>'
            );
            
             $('#cancelarImagen').click(function(){
                valores.imagenTicket.val('');
                valores.lienzo.html('');
            });

        });


        valores.documentoTicket.change(function(e) {

            let file = e.target.files[0];
            let valido = (/\.(?=docx|doc|xlsx|xls|pdf)/gi).test(file.name);
            
            if (!valido) {
                valores.documentoTicket.val('');
                swal("Formato no válido", "Formatos válidos: .doc, .docx, .xls, .xlsx, y .pdf", "error").catch(swal.noop);
                return;
            }
        
            let fileSizeLimit = 2; // In MB
            if (file.size > fileSizeLimit * 1024 * 1024) {
                valores.documentoTicket.val('');
                swal("El documento tiene un tamaño mayor al permitido", "El peso máximo es de 2 MB", "error").catch(swal.noop);
                return;
            }
        
            valores.lienzoDocumentos.html('<div class="row">'+
                            '<div class="col-md-2">'+
                            '</div>'+                                          
                            '<div class="col-md-8" >'+ 
                                '<div class="alert alert-info alert-dismissible">'+
                                    '<i class="icon fa fa-check"></i> DOCUMENTO: '+ 
                                    file.name +
                                    '<button type="button" id="cancelarImagen2" class="close" aria-hidden="true">&times;</button>'+
                                '</div>'+           
                            '</div>'+
                        '</div>'
            );
            
             $('#cancelarImagen2').click(function(){
                valores.documentoTicket.val('');
                valores.lienzoDocumentos.html('');
            });

        });

        valores.abrirTicket.click(function(){
            TicketsUsuarios.reabrirTicket($('#folioTicket').attr('value'),$('#categoriaTicketModal').attr('value'));
        });

        valores.actualizarHistorial.click(function(){
           TicketsUsuarios.actualizarHistorial(valores);
        });

    }
}

TicketsUsuarios.inicarClase();










