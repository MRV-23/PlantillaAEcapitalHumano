
class Costos{

   static init() 
    {
            $('.monetario').mask('000,000,000.00', {reverse: true}); 
            Costos.formatoMonetario = /[0-9,.]{4,}/; //expresiones regulares
            Costos.textoErrorFormatoMonetario = '0.00';
            Costos.formatoTexto = /["\'<>]{1,}/;////expresiones regulares
            Costos.textoErrorFormatoTexto = 'caracteres especiales: < > " \' ';
            Costos.camposObligatorios = $(".validarObligatorios");
            Costos.camposValidarMonetario = $(".validarMonetario");
            Costos.clientes = $("#Clientes");
            Costos.NombreComercial = $('#NombreComercial');
            Costos.modalEdicion = $('#modalEdicion');
            Costos.fomularioNuevoCliente = $('#formularioClientesCostos');
            Costos.listaClientesModal = $('#cargarListaClientesCostos');
            Costos.actualizarNombreCliente = $('input[name="nombreCliente"]');
            Costos.actualizarNombreClienteComercial = $('input[name="nombreClienteComercial"]');
            Costos.labelTituloCliente = $('#labelClienteTitulo');
            Costos.actualizarId = 0;
            Costos.nombreUltimo = '';
            Costos.nombreComercialUltimo = '';
        /********************************************** */
            Costos.NombrePromotor = $('#NombrePromotor');
            Costos.modalEdicionPromotor = $('#modalEdicionPromotor');
            Costos.fomularioNuevoPromotor = $('#formularioPromotorCostos');
            Costos.labelPromotorTitulo = $('#labelPromotorTitulo');
            Costos.listaPromotorModal = $('#cargarListaPromotorCostos');
            Costos.actualizarNombrePromotor = $('input[name="nombrePromotor"]');
        /********************************************** */
            Costos.Subcomisionista =$('#Subcomisionista');
            Costos.modalEdicionSubcomisionista = $('#modalEdicionSubcomisionista');
            Costos.fomularioNuevoSubcomisionista = $('#formularioSubcomisionistaCostos');
            Costos.labelSubcomisionistaTitulo = $('#labelSubcomisionistaTitulo');
            Costos.listaSubcomisionistaModal = $('#cargarListaSubcomisionistaCostos');
            Costos.actualizarNombreSubcomisionista = $('input[name="subcomisionistaNombre"]');
        /**********CALCULAR AJUSTE IMSS ****************/
            Costos.Imss = $('#Imss');
            Costos.RealPagadoImss = $('#RealPagadoImss');
            Costos.AjusteImss = $('#AjusteImss');
        /**********CALCULAR AJUSTE RCV ****************/
            Costos.Rcv = $('#Rcv');
            Costos.RealPagadoRcv = $('#RealPagadoRcv');
            Costos.AjustesRcv = $('#AjustesRcv');
         /**********CALCULAR AJUSTE INFONAVIT ****************/
            Costos.Infonavit = $('#Infonavit');
            Costos.RealPagadoInf = $('#RealPagadoInf');
            Costos.AjusteInf = $('#AjusteInf');
        /**********CALCULAR AJUSTE IMSS OBRERO****************/
            Costos.ImssObr= $('#ImssObr');
            Costos.RealPO = $('#RealPO');
            Costos.AjustesObr = $('#AjustesObr');
        /**********CALCULAR AJUSTE RCV OBRERO****************/
            Costos.RcvObr = $('#RcvObr');
            Costos.RealPRcv = $('#RealPRcv');
            Costos.AjustesRcvObr = $('#AjustesRcvObr');
        /**********CALCULAR AJUSTE AMORTIZACIÓN ****************/
            Costos.Amortizacion = $('#Amortizacion');
            Costos.RealPAm = $('#RealPAm');
            Costos.AjustesAm = $('#AjustesAm');
        /**********CALCULAR SUBTOTAL Y TOTAL PARCIALES ********/
            Costos.SubtotalPatronal= $('#SubtotalPatronal');
            Costos.Total= $('#Total');
        /********** ID PARA EL CONTROL DEL FORMULARIO DE IMSS ****************/
            Costos.enviar = $('#BotonEnviar');
            Costos.cancelar = $('#cancelarFormularioImss');
            Costos.formulario = $('#formularioControlGastos');
            Costos.camposReadonly = $('.form-control[readonly]');
        /****************OTROS*********************** */
            Costos.Comentarios = $('#Comentarios');//comentarios imss (registro nuevo)
            Costos.Comentarios3 = $('#Comentarios3');//comentarios gastos médicos
            Costos.Comentarios4 = $('#Comentarios4');//comentarios nóminas
        /***********************TODOS LOS CAMPOS ARRIBA DESCRITOS SON LOS NECESARIOS PARA GUARDAR EL FORMULARIO; A PARTIR DE AQUÍ CLONAREMOS LOS CAMPOS DEL FORMULARIO PARA PODER ACTUALIZAR UN REGISTRO YA EXISTENTE */
            Costos.ventanaModal = $('#modalCostos');
            Costos.contenedorModulo = $('#controlFacturacion');
            Costos.registroSeleccionado = 0;//nos va a indicar el número del registro que se tenga seleccionado
            Costos.labelRegistroSeleccionado = $('#labelRegistroSeleccionado');
            Costos.mostrarRegistros = $('#mostrarRegistros');
            Costos.departamento = '';
            Costos.labelDepartamento = $('#labelDepartamento');

        /***************************************CAMPOS QUE SIRVEN PARA LA ACTUALIZACIÓN DEL FORMULARIO IMSS */
        //Duplicamos todos los campos cambiando unicamente el ID el nombre se queda igual
            //Costos.Ejercicio2 = $('#Ejercicio2');
            Costos.Mes2 = $('#Mes2');
            Costos.Clientes2 = $('#Clientes2');
            Costos.NombreComercial2 = $('#NombreComercial2');
            Costos.NombrePromotor2 = $('#NombrePromotor2');
            Costos.Subcomisionista2 =$('#Subcomisionista2');
            Costos.CodigoCliente2 = $('#CodigoCliente2');
            Costos.Empleados2 = $('#Empleados2');
            Costos.Imss2= $('#Imss2');
            Costos.RealPagadoImss2 = $('#RealPagadoImss2');
            Costos.AjusteImss2 = $('#AjusteImss2');
            Costos.Rcv2 = $('#Rcv2');
            Costos.RealPagadoRcv2 = $('#RealPagadoRcv2');
            Costos.AjustesRcv2= $('#AjustesRcv2');
            Costos.Infonavit2= $('#Infonavit2');
            Costos.RealPagadoInf2=$('#RealPagadoInf2');
            Costos.AjusteInf2= $('#AjusteInf2');
            Costos.ImpuestoEstatal2= $('#ImpuestoEstatal2');
            Costos.Gmma2= $('#Gmma2');
            Costos.VidaEI2= $('#VidaEI2');
            Costos.Gmme2= $('#Gmme2');
            Costos.Otros2= $('#Otros2');
            Costos.SubtotalPatronal2= $('#SubtotalPatronal2');
            Costos.ImssObr2= $('#ImssObr2');
            Costos.RealPO2= $('#RealPO2');
            Costos.AjustesObr2= $('#AjustesObr2');
            Costos.RcvObr2= $('#RcvObr2');
            Costos.RealPRcv2= $('#RealPRcv2');
            Costos.AjustesRcvObr2= $('#AjustesRcvObr2');
            Costos.Amortizacion2= $('#Amortizacion2');
            Costos.RealPAm2= $('#RealPAm2');
            Costos.AjustesAm2= $('#AjustesAm2');
            Costos.Total2= $('#Total2');
            Costos.Empresa2= $('#Empresa2');
            Costos.Comentarios2= $('#Comentarios2');

            /********** ID PARA EL CONTROL DE ACTUALIZACIÓN DEL FORMULARIO ****************/
            Costos.enviar2 = $('#BotonEnviar2');
            Costos.botonEditar = $('#BotonEditar');
            Costos.camposDisabledImss =$('.actualizar');//campos actualizables IMSS
            Costos.camposDisabledGm =$('.actualizar2');//campos actualizables GM
            Costos.camposDisabledNominas =$('.actualizar3');//campos actualizables Nóminas
            Costos.formulario2 = $('#formularioControlGastos2');//Forulario de actualización
            Costos.camposObligatorios2 = $(".validarObligatorios2");
            Costos.camposValidarMonetario2 = $(".validarMonetario2");//actualizables imss
            Costos.camposValidarMonetario3 = $(".validarMonetario3");//actualizables gastos médicos
            Costos.camposValidarMonetario4 = $(".validarMonetario4");//actualizables nóminas
            /***************DATOS DE QUIEN CAPTURA LOS FORMULARIOS********************************* */
            Costos.capturoImss = $('#capturoImss');
            Costos.sucursalImss = $('#sucursalImss');
            Costos.puestoImss = $('#puestoImss');
            Costos.fechaImss = $('#fechaImss');
            Costos.capturoGm = $('#capturoGm');
            Costos.sucursalGm = $('#sucursalGm');
            Costos.puestoGm = $('#puestoGm');
            Costos.fechaGm = $('#fechaGm');
            Costos.capturoNominas = $('#capturoNominas');
            Costos.sucursalNominas = $('#sucursalNominas');
            Costos.puestoNominas = $('#puestoNominas');
            Costos.fechaNominas = $('#fechaNominas');
            /*******************FILTROS Y PAGINADOR************************************************** */
            Costos.botonRefrescar = $('#botonRefrescar');//vuelve a cargar el área d contenido de los registros y limpia los filtros
            Costos.filtroRegistro = $('#filtroRegistro');
            Costos.filtroCliente = $('#filtroCliente');
            Costos.labelTotalRegistros = $('#labelTotalRegistros');
           
    }

    //convertirDecimal: quito la comas; de 54,895,890.00 paso a 54895890.00
    //parseFloat: para que maneje el resultado como un número flotante y no como texto
    //mascaraMoneda: vuelvo a regresar el valor calculado en formato moneda; de 54895890.00 paso a 54,895,890.00. El primer parametro es la cantidad, el segundo parametro por defecto es 1, puede variar ya que en otras ocaciones lo utilizaba para calcular el iva, en lugar de 1 mandaba 1.16
    //Este metodo lo utilizan distintos campos por eso mando las referencias de los campos en los parametros; se volvera a usar cuando se actualice un registro
    static calcularAjuste(a,b,c){
        let mayor = parseFloat(MetodosDiversos.convertirDecimal(a.val()));
        let menor = parseFloat(MetodosDiversos.convertirDecimal(b.val()));
        let total = Math.abs(mayor - menor);//En caso de que b sea mayor siempre se debe obtener un valor positivo ya que la mascara monetario no admite negativos
        if(mayor < menor)//en caso de que se diera un número negativo marcamos en color rojo el campo
            c.css({'background':'#dd4b39','color':'#fff'});
        else
            c.css({'background':'#eee','color':'#000'});
        if(total > 0)
            c.val( MetodosDiversos.mascaraMoneda(total,1) );   
        else//sino existe valor en a y/o en b dejamos vacio el campo
            c.val(''); 
    }

    static calculos(valor){
        switch(valor){
            case 'AJUSTE IMSS'://calculamos el ajuste de IMSS en el formulario registro nuevo
                Costos.calcularAjuste(Costos.Imss,Costos.RealPagadoImss,Costos.AjusteImss);//mandamos las referencias de cada campo
            break;
            case 'AJUSTE IMSS 2'://calculamos el ajuste de IMSS en el formulario de actualización
                Costos.calcularAjuste(Costos.Imss2,Costos.RealPagadoImss2,Costos.AjusteImss2);
            break;
            case 'SUBTOTAL'://calculamos el subtotal en el formulario registro nuevo
                Costos.calcularSubtotalPatronalParcial(Costos.Imss,Costos.Rcv,Costos.Infonavit,Costos.SubtotalPatronal);//cada que existe un cambio en este cambio afecta al subtotal
            break
            case 'SUBTOTAL 2'://calculamos el subtotal en el formulario de actualizacion
                Costos.calcularSubtotalPatronalParcial(Costos.Imss2,Costos.Rcv2,Costos.Infonavit2,Costos.SubtotalPatronal2,Costos.Gmma2,Costos.VidaEI2,Costos.Gmme2,Costos.Otros2,Costos.ImpuestoEstatal2);
            break;
            case 'TOTAL'://calculamos el total en el formulario registro nuevo
                Costos.calcularTotalParcial(Costos.ImssObr,Costos.RcvObr,Costos.Amortizacion,Costos.SubtotalPatronal,Costos.Total);//cada que existe un cambio en este cambio afecta al total
            break;
            case 'TOTAL 2'://calculamos el total en el formulario de actualización
                Costos.calcularTotalParcial(Costos.ImssObr2,Costos.RcvObr2,Costos.Amortizacion2,Costos.SubtotalPatronal2,Costos.Total2);
            break;
            case 'AJUSTE RCV':
                Costos.calcularAjuste(Costos.Rcv,Costos.RealPagadoRcv,Costos.AjustesRcv);
            break;
            case 'AJUSTE RCV 2':
                Costos.calcularAjuste(Costos.Rcv2,Costos.RealPagadoRcv2,Costos.AjustesRcv2);
            break;
            case 'AJUSTE INFONAVIT':
                Costos.calcularAjuste(Costos.Infonavit,Costos.RealPagadoInf,Costos.AjusteInf);//mandamos las referencias de cada campo
            break;
            case 'AJUSTE INFONAVIT 2':
                Costos.calcularAjuste(Costos.Infonavit2,Costos.RealPagadoInf2,Costos.AjusteInf2);//mandamos las referencias de cada campo
            break;
            case 'AJUSTE IMSS OBRERO':
                Costos.calcularAjuste(Costos.ImssObr,Costos.RealPO,Costos.AjustesObr)//mandamos las referencias de cada campo
            break;
            case 'AJUSTE IMSS OBRERO 2':
                Costos.calcularAjuste(Costos.ImssObr2,Costos.RealPO2,Costos.AjustesObr2)//mandamos las referencias de cada campo
            break;
            case 'RCV OBRERO':
                Costos.calcularAjuste(Costos.RcvObr,Costos.RealPRcv,Costos.AjustesRcvObr);//mandamos las referencias de cada campo
            break;
            case 'RCV OBRERO 2':
                Costos.calcularAjuste(Costos.RcvObr2,Costos.RealPRcv2,Costos.AjustesRcvObr2);//mandamos las referencias de cada campo
            break;
            case 'AMORTIZACION':
                Costos.calcularAjuste(Costos.Amortizacion,Costos.RealPAm,Costos.AjustesAm);//mandamos las referencias de cada campo
            break;
            case 'AMORTIZACION 2':
                Costos.calcularAjuste(Costos.Amortizacion2,Costos.RealPAm2,Costos.AjustesAm2);//mandamos las referencias de cada campo
            break;
        }
  
    }

    //Este metodo lo utilizaremos cuando se genere un nuevo registro y tambien cuando se vaya a actualizar un registro
    static calcularSubtotalPatronalParcial(a,b,c,i,d=0,e=0,f=0,g=0,h=0){//desde el parametro d,e,f,g,h no se utilizan en la creación del registro, únicamente se utilizan en la actualización del registro
        let total =
        parseFloat(MetodosDiversos.convertirDecimal(a.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(b.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(c.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(d == 0 ? 0 : d.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(e == 0 ? 0 : e.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(f == 0 ? 0 : f.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(g == 0 ? 0 : g.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(h == 0 ? 0 : h.val()));
        if(total > 0)
            i.val( MetodosDiversos.mascaraMoneda(total,1) );   
        else
            i.val(''); 
    }

     //Este metodo lo utilizaremos cuando se genere un nuevo registro y tambien cuando se vaya a actualizar un registro
    static calcularTotalParcial(a,b,c,d,e){
        let total =
        parseFloat(MetodosDiversos.convertirDecimal(a.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(b.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(c.val())) +
        parseFloat(MetodosDiversos.convertirDecimal(d.val()));
        if(total > 0)
            e.val( MetodosDiversos.mascaraMoneda(total,1) );   
        else
            e.val(''); 
    }

    //aqui enviaremos todo el formulario de IMSS (Registro nuevo y actualización)
    static guardarFormularioImss(formulario,actualizar=false){  
        let form = new FormData(formulario);
        if(actualizar)//si se trata de una actualización vamos a añadir el id del registro
            form.append('actualizar',Costos.registroSeleccionado);
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php",form,(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);//Mostramos la respuesta del servidor
            if(error)return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
            if(actualizar){
                Costos.fechaImss.text((respuesta.registroImss)); //actualizamos la fecha de la última modificación
                Costos.camposDisabledImss.prop('disabled',true);//Desactivamos todos los campos para obligar a que utilicen el botón actualizar 
                Costos.botonEditar.show();//mostramos el boton actualizar
                Costos.enviar2.hide();//ocultamos el boton para actualizar el registro
            } 
            else{//si se trata de registro nuevo actualizamos para añadir el registro, en caso de ser una actualización no es necesario actualizar
                Costos.enviar.prop('disabled',false);//activamos el botón de enviar por si el usuario quiere hacer un nuevo registro
                Costos.resetFormularioImss();//limpiamos el formulario
                Costos.mostrarRegistros.html(respuesta.registros);//actualiamos la lista de nuestros registros
            }
        });
    } 

    static resetFormularioImss(){
        Costos.camposReadonly.css({'background':'#eee','color':'#000'});//En caso de que algún campo readonly este de color rojo lo reseteamos a su estado normal
        Costos.formulario[0].reset();
    }

    static formularioGm(){
        let form = new FormData();
        form.append('actualizarGm',Costos.registroSeleccionado);
        form.append('gmma',Costos.Gmma2.val());
        form.append('gmme',Costos.Gmme2.val());
        form.append('invalidez',Costos.VidaEI2.val());
        form.append('otros',Costos.Otros2.val());
        form.append('subtotal',Costos.SubtotalPatronal2.val());
        form.append('total',Costos.Total2.val());
        form.append('comentarios',Costos.Comentarios3.val());

        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php",form,(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);//Mostramos la respuesta del servidor
            if(error)return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
            Costos.capturoGm.text(respuesta.nombre);
            Costos.sucursalGm.text(respuesta.sucursal);
            Costos.puestoGm.text(respuesta.puesto);
            Costos.fechaGm.text(respuesta.registroGm); //actualizamos la fecha de la última modificación
            Costos.camposDisabledGm.prop('disabled',true);//Desactivamos todos los campos para obligar a que utilicen el botón actualizar 
            Costos.botonEditar.show();//mostramos el boton actualizar
            Costos.enviar2.hide();//ocultamos el boton para actualizar el registro
            Costos.mostrarRegistros.find('.gmIcono'+Costos.registroSeleccionado).children(1).remove();
            Costos.mostrarRegistros.find('.gmIcono'+Costos.registroSeleccionado).append('<i class="fa fa-check-square-o fa-2x text-green"></i>');
        });
        
    }

    static formularioNominas(){
        let form = new FormData();
        form.append('actualizarNominas',Costos.registroSeleccionado);
        form.append('impuesto',Costos.ImpuestoEstatal2.val());
        form.append('subtotal',Costos.SubtotalPatronal2.val());
        form.append('total',Costos.Total2.val());
        form.append('comentarios',Costos.Comentarios4.val());
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php",form,(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);//Mostramos la respuesta del servidor
            if(error)return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
            Costos.capturoNominas.text(respuesta.nombre);
            Costos.sucursalNominas.text(respuesta.sucursal);
            Costos.puestoNominas.text(respuesta.puesto);
            Costos.fechaNominas.text((respuesta.registroNominas)); //actualizamos la fecha de la última modificación
            Costos.camposDisabledNominas.prop('disabled',true);//Desactivamos todos los campos para obligar a que utilicen el botón actualizar 
            Costos.botonEditar.show();//mostramos el boton actualizar
            Costos.enviar2.hide();//ocultamos el boton para actualizar el registro
            Costos.mostrarRegistros.find('.nominasIcono'+Costos.registroSeleccionado).children(1).remove();
            Costos.mostrarRegistros.find('.nominasIcono'+Costos.registroSeleccionado).append('<i class="fa fa-check-square-o fa-2x text-green"></i>');
        });
    }

    static validarObligatorios(obligatorios){
        let flag = true;
        obligatorios.each(function(){ //Vamos a recorrer todos los campos con la clase validarObligatorios; estos campos son obligatorios
            if($(this).val() ==="" ){
                MetodosDiversos.mostrarRespuesta("warning","El campo "+$(this).parent().parent().children('label').text()+" es obligatorio","Es necesario que este campo sea llenado",60000,true);
                return flag = false;
            }   
        });
        return flag;
    }

    static validarTexto(texto){
        if(Costos.formatoTexto.test(texto.val())){//Validamos que el campo comentarios no tenga caracteres especiales
            MetodosDiversos.mostrarRespuesta("warning","El campo comentarios no debe contener caracteres especiales",Costos.textoErrorFormatoTexto,60000,true);
            return false;
        } 
        return true;
    }

    static validarFormatoMonetario(monetarios){
        let flag = true;
        monetarios.each(function(){ //Vamos a recorrer todos los campos con la clase validarMonetario estariamos incluyendo a todos los monetarios exceptuando los campos calculados
            if($(this).val() !=="" && !Costos.formatoMonetario.test($(this).val())){//sino esta vacio y el valor del campo no es conforme al formato activamos la alerta
                MetodosDiversos.mostrarRespuesta("warning","El campo "+$(this).parent().prev().text()+" no tiene el formato correcto","Fomato : "+Costos.textoErrorFormatoMonetario+"",60000,true);// $(this).parent().prev().text() vamos al elemento padre luego al hermano ( <label for="">9.-Imss</label> ) y obtenemos su contenido
                return flag = false;
            }   
        });
        return flag;
    }

    static mostrarVentanaModal(){
        Costos.ventanaModal.modal('show');//mostramos la ventana modal
        Costos.labelRegistroSeleccionado.text(Costos.registroSeleccionado);//indicamos el número de registro seleccionado
        Costos.labelDepartamento.text(Costos.departamento);
        MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{registro:Costos.registroSeleccionado},(error,respuesta)=>{ 
            if(error){ console.log(respuesta);return;}//si el servido marca algún error
            Costos.camposPorActualizar(respuesta.data);//cargamos los campos
        });
    }

    static camposPorActualizar(data){
        //Costos.Ejercicio2.val(data.ejercicio);
        Costos.Mes2.val(data.mes);
        Costos.Clientes2.val(data.cliente);
        Costos.NombreComercial2.val(data.nombre_comercial);
        Costos.NombrePromotor2.val(data.promotor);
        Costos.Subcomisionista2.val(data.subcomisionista);
        Costos.CodigoCliente2.val(data.codigo_cliente);
        Costos.Empleados2.val(data.empleados);
        Costos.Imss2.val(MetodosDiversos.mascaraMoneda(data.imss,1));
        Costos.RealPagadoImss2.val(MetodosDiversos.mascaraMoneda(data.real_imss,1));
        Costos.AjusteImss2.val(MetodosDiversos.mascaraMoneda(data.ajuste_imss,1));
        Costos.Rcv2.val(MetodosDiversos.mascaraMoneda(data.rcv,1));
        Costos.RealPagadoRcv2.val(MetodosDiversos.mascaraMoneda(data.real_rcv,1));
        Costos.AjustesRcv2.val(MetodosDiversos.mascaraMoneda(data.ajuste_rcv,1));
        Costos.Infonavit2.val(MetodosDiversos.mascaraMoneda(data.infonavit,1));
        Costos.RealPagadoInf2.val(MetodosDiversos.mascaraMoneda(data.real_infonavit,1));
        Costos.AjusteInf2.val(MetodosDiversos.mascaraMoneda(data.ajuste_infonavit,1));
        Costos.ImpuestoEstatal2.val(MetodosDiversos.mascaraMoneda(data. impuesto_estatal,1));
        Costos.Gmma2.val(MetodosDiversos.mascaraMoneda(data.gmma,1));
        Costos.VidaEI2.val(MetodosDiversos.mascaraMoneda(data.vida_invalidez,1));
        Costos.Gmme2.val(MetodosDiversos.mascaraMoneda(data.gmme,1));
        Costos.Otros2.val(MetodosDiversos.mascaraMoneda(data.otros,1));
        Costos.SubtotalPatronal2.val(MetodosDiversos.mascaraMoneda(data.subtotal,1));
        Costos.ImssObr2.val(MetodosDiversos.mascaraMoneda(data.imss_obrero,1));
        Costos.RealPO2.val(MetodosDiversos.mascaraMoneda(data.real_imss_obrero,1));
        Costos.AjustesObr2.val(MetodosDiversos.mascaraMoneda(data.ajuste_imss_obrero,1));
        Costos.RcvObr2.val(MetodosDiversos.mascaraMoneda(data.rcv_obrero,1));
        Costos.RealPRcv2.val(MetodosDiversos.mascaraMoneda(data.real_rcv_obrero,1));
        Costos.AjustesRcvObr2.val(MetodosDiversos.mascaraMoneda(data.ajuste_rcv_obrero,1));
        Costos.Amortizacion2.val(MetodosDiversos.mascaraMoneda(data.amortizacion,1));
        Costos.RealPAm2.val(MetodosDiversos.mascaraMoneda(data.real_amortizacion,1));
        Costos.AjustesAm2.val(MetodosDiversos.mascaraMoneda(data.ajuste_amortizacion,1));
        Costos.Total2.val(MetodosDiversos.mascaraMoneda(data.total,1));
        Costos.Empresa2.val(data.empresa);
        Costos.Comentarios2.val(data.comentarios_imss);
        Costos.capturoImss.text(data.capturoImss);
        Costos.sucursalImss.text(data.sucursalImss); 
        Costos.puestoImss.text(data.puestoImss);
        Costos.fechaImss.text((MetodosDiversos.formatDateTime(data.registro_imss)));
        Costos.capturoGm.text(data.capturoGm);
        Costos.sucursalGm.text(data.sucursalGm); 
        Costos.puestoGm.text(data.puestoGm);
        Costos.Comentarios3.val(data.comentarios_gm);
        Costos.Comentarios4.val(data.comentarios_nominas);

        if(data.registro_gm != null)
            Costos.fechaGm.text((MetodosDiversos.formatDateTime(data.registro_gm)));
        else
            Costos.fechaGm.text('');
        Costos.capturoNominas.text(data.capturoNominas);
        Costos.sucursalNominas.text(data.sucursalNominas); 
        Costos.puestoNominas.text(data.puestoNominas);
        if(data.registro_nominas != null)
            Costos.fechaNominas.text((MetodosDiversos.formatDateTime(data.registro_nominas)));
        else
            Costos.fechaNominas.text('');
    }

    static resetearOpciones(){
        Costos.camposDisabledImss.prop('disabled',true);
        Costos.camposDisabledGm.prop('disabled',true);
        Costos.camposDisabledNominas.prop('disabled',true);
        Costos.botonEditar.show();
        Costos.enviar2.hide();
    }

    static eliminar(){
        Costos.mostrarRegistros.html('<div style="text-align:center"><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i></div>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{eliminar:Costos.registroSeleccionado},(error,respuesta)=>{ 
            Costos.mostrarRegistros.html(respuesta.data);
            if(error){ MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,60000,true);return;}//si el servido marca algún error
        });
    }

    static actualizarInformativo(campo,valor,referencia){
        MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{informativo:campo,valor},(error,respuesta)=>{ 
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
            if(!respuesta.error)
                referencia.attr('info',valor);
        });
    }

    static realizarCambios(tipo,referencia,target){
        MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{actualizarEstado:true,campo:target,id:referencia.parent().parent().attr('data'),tipoMovimiento:tipo},(error,respuesta)=>{ 
            if(respuesta.error || error){
                referencia.prop('checked',false);
                MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','Intentalo de nuevo',60000,true);
                return;
            }
            if(tipo){
                referencia.css('color','#00a65a');
                referencia.removeClass('fa-rotate-180');
            }
            else{
                referencia.css('color','#dd4b39');
                referencia.addClass('fa-rotate-180');
            } 
            if(target==='cliente')
                Costos.clientes.html(respuesta.data)  
            else if(target==='promotor')
                Costos.NombrePromotor.html(respuesta.data)  
            else
                Costos.Subcomisionista.html(respuesta.data)     
        });
    }

    static filtros(){
        let datos = new FormData();
        datos.append("cliente", Costos.filtroCliente.val());
        datos.append("nomina", Costos.filtroRegistro.val().trim());
        Costos.recargarPaginador(datos);
    }

    static recargarPaginador(datos){
        Costos.mostrarRegistros.html('<div style="text-align:center"><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i></div>');
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php", datos,(error,respuesta)=>{
            if(error){console.log('error',error);return;}
            //Facturacion.mostrarPaginador.html(respuesta.paginador);
            Costos.labelTotalRegistros.html(respuesta.total);
            Costos.mostrarRegistros.html(respuesta.data);
        });
    }

    static main(){
            Costos.init()  
            /**********GUARDAR FORMULARIO IMSS ****************/
            Costos.enviar.click(function(){ 
                if(Costos.validarObligatorios(Costos.camposObligatorios) && Costos.validarFormatoMonetario(Costos.camposValidarMonetario) && Costos.validarTexto(Costos.Comentarios)){//SI SE CUMPLE CON LOS CAMPOS OBLIGATORIOS Y CON LOS FORMATOS DE LOS CAMPOS ENTONCES DISPARAMOS EL FORMULARIO
                    MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                    Costos.enviar.prop('disabled',true); //descativamos el boton de enviar para evitar que lo vuelvan a pulsar en caso de que el servidor tarde en responder
                    Costos.guardarFormularioImss(Costos.formulario[0]);
                }
            });
            /**********CANCELAR FORMULARIO IMSS ****************/
             Costos.cancelar.click(function(){                   
                Costos.resetFormularioImss();
            });

/**********CALCULAR AJUSTE IMSS ****************/
            //ESTE CÓDIGO VENDRIA A SUSTITUIR LA FUNCIÓN QUE MANEJAS EN HTML onKeyUp="Costos.validarnumeros()"
            //SI TE FIJAS PRACTICAMENTE SE REPITEN LAS LLAMADAS AL METODO Costos.calcularAjuste UNICAMENTE CAMBIAMOS EL ID AL QUE SE HACE REFERENCIA
            Costos.Imss.on('input',function(){
                Costos.calculos('AJUSTE IMSS');
                Costos.calculos('SUBTOTAL');
                Costos.calculos('TOTAL');
            });
            Costos.RealPagadoImss.on('input',function(){
                Costos.calculos('AJUSTE IMSS');
            });
            /**********CALCULAR AJUSTE IMSS 2 (ATUALIZAR) ****************/
            Costos.Imss2.on('input',function(){
                Costos.calculos('AJUSTE IMSS 2');
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.RealPagadoImss2.on('input',function(){
                Costos.calculos('AJUSTE IMSS 2');
            });
/**********CALCULAR AJUSTE RCV ****************/
            Costos.Rcv.on('input',function(){
                Costos.calculos('AJUSTE RCV');
                Costos.calculos('SUBTOTAL');
                Costos.calculos('TOTAL');
            });
            Costos.RealPagadoRcv.on('input',function(){
                Costos.calculos('AJUSTE RCV');
            });

            /**********CALCULAR AJUSTE RCV 2****************/
            Costos.Rcv2.on('input',function(){
                Costos.calculos('AJUSTE RCV 2');
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.RealPagadoRcv2.on('input',function(){
                Costos.calculos('AJUSTE RCV 2');
            });
/**********CALCULAR AJUSTE INFONAVIT ****************/
            Costos.Infonavit.on('input',function(){
                Costos.calculos('AJUSTE INFONAVIT');
                Costos.calculos('SUBTOTAL');
                Costos.calculos('TOTAL');
            });
            Costos.RealPagadoInf.on('input',function(){
                Costos.calculos('AJUSTE INFONAVIT');
            });

            /**********CALCULAR AJUSTE INFONAVIT 2****************/
            Costos.Infonavit2.on('input',function(){
                Costos.calculos('AJUSTE INFONAVIT 2');
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.RealPagadoInf2.on('input',function(){
                Costos.calculos('AJUSTE INFONAVIT 2');
            });
/**********CALCULAR AJUSTE IMSS OBRERO****************/
            Costos.ImssObr.on('input',function(){
                Costos.calculos('AJUSTE IMSS OBRERO');
                Costos.calculos('TOTAL');
            });
            Costos.RealPO.on('input',function(){
                Costos.calculos('AJUSTE IMSS OBRERO');
            });

            /**********CALCULAR AJUSTE IMSS OBRERO 2****************/
            Costos.ImssObr2.on('input',function(){
                Costos.calculos('AJUSTE IMSS OBRERO 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.RealPO2.on('input',function(){
                Costos.calculos('AJUSTE IMSS OBRERO 2');
            });
/**********CALCULAR AJUSTE RCV OBRERO****************/
            Costos.RcvObr.on('input',function(){
                Costos.calculos('RCV OBRERO');
                Costos.calculos('TOTAL');
            });
            Costos.RealPRcv.on('input',function(){
                Costos.calculos('RCV OBRERO');
            });
            /**********CALCULAR AJUSTE RCV OBRERO****************/
            Costos.RcvObr2.on('input',function(){
                Costos.calculos('RCV OBRERO 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.RealPRcv2.on('input',function(){
                Costos.calculos('RCV OBRERO 2');
            });
/**********CALCULAR AJUSTE AMORTIZACIÓN ****************/
            Costos.Amortizacion.on('input',function(){
                Costos.calculos('AMORTIZACION');
                Costos.calculos('TOTAL');
            });
            Costos.RealPAm.on('input',function(){
                Costos.calculos('AMORTIZACION');
            });
            /**********CALCULAR AJUSTE AMORTIZACIÓN ****************/
            Costos.Amortizacion2.on('input',function(){
                Costos.calculos('AMORTIZACION 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.RealPAm2.on('input',function(){
                Costos.calculos('AMORTIZACION 2');
            });
/**********COMPLEMENTO(DEPARTAMENTOS GM Y NÓMINAS) PARA CALCULAR EL SUBTOTAL****************/
            Costos.Gmma2.on('input',function(){
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.VidaEI2.on('input',function(){
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.Gmme2.on('input',function(){
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.Otros2.on('input',function(){
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            Costos.ImpuestoEstatal2.on('input',function(){
                Costos.calculos('SUBTOTAL 2');
                Costos.calculos('TOTAL 2');
            });
            /********************************BOTONES PARA HABILITAR LA VENTANA MODAL Y DETERMINAR QUE DEPARTAMENTO ESTÁ SOLICITANDO LA INFORMACIÓN */
            Costos.contenedorModulo.on('click','.botonMostrarImss',function(){
                Costos.registroSeleccionado = $(this).parent().parent().attr('data');//La referencia no cambia al entrar en modo administrador o en modo IMSS
                Costos.departamento = 'IMSS';
                Costos.resetearOpciones();
                Costos.mostrarVentanaModal();
            });
            Costos.contenedorModulo.on('click','.botonMostrarGm',function(){
                Costos.registroSeleccionado = $(this).parent().parent().parent().parent().attr('data');
                if(Costos.registroSeleccionado === undefined)//al entrar en modo administrador o en modo GM las referencias cambian
                    Costos.registroSeleccionado = $(this).parent().parent().attr('data');
                Costos.departamento = 'GASTOS MÉDICOS';
                Costos.resetearOpciones();
                Costos.mostrarVentanaModal();
            });
            Costos.contenedorModulo.on('click','.botonMostrarNominas',function(){
                Costos.registroSeleccionado = $(this).parent().parent().parent().parent().attr('data');
                if(Costos.registroSeleccionado === undefined)//al entrar en modo administrador o en modo NÓMINAS las referencias cambian
                    Costos.registroSeleccionado = $(this).parent().parent().attr('data');
                Costos.departamento = 'NÓMINAS';
                Costos.resetearOpciones();
                Costos.mostrarVentanaModal();
            });
            Costos.contenedorModulo.on('click','.botonEliminar',function(){
                let referencia = $(this);
                MetodosDiversos.crearRegistro('<i class="fa fa-trash text-red fa-3x fa-fw"></i>',`¿ Estas seguro que deseas ELIMINAR el archivo ?`,callback=>{
                    if(callback){
                        Costos.registroSeleccionado = referencia.parent().parent().parent().parent().attr('data');
                        Costos.eliminar();
                    }
                },false);
            });

            //Boton para habilitar los campos y habilitar el formulario para actualizar IMSS
            Costos.botonEditar.click(function(){
                $(this).hide();//ocultamos el boton actualizar
                Costos.enviar2.show();//mostramos el boton para guardar el formulario (actualizar el registro)
                if(Costos.departamento === "IMSS")
                    Costos.camposDisabledImss.prop('disabled',false); //los campos del formulario IMSS ahora seran editables
                else if(Costos.departamento === "GASTOS MÉDICOS")
                    Costos.camposDisabledGm.prop('disabled',false); //los campos del formulario GM ahora seran editables
                else if(Costos.departamento === "NÓMINAS")
                    Costos.camposDisabledNominas.prop('disabled',false); //los campos del formulario NÖMINAS ahora seran editables
            });

            /**********ACTUALIZAR FORMULARIO IMSS ****************/
            Costos.enviar2.click(function(){ 
                //MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                if(Costos.departamento === "IMSS"){
                    if( Costos.validarObligatorios(Costos.camposObligatorios2) && Costos.validarFormatoMonetario(Costos.camposValidarMonetario2) && Costos.validarTexto(Costos.Comentarios2)){//SI SE CUMPLE CON LOS CAMPOS OBLIGATORIOS Y CON LOS FORMATOS DE LOS CAMPOS ENTONCES DISPARAMOS EL FORMULARIO
                        MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                        Costos.guardarFormularioImss(Costos.formulario2[0],true);
                    }
                }
                else if(Costos.departamento === "GASTOS MÉDICOS"){
                    if( Costos.validarFormatoMonetario(Costos.camposValidarMonetario3) && Costos.validarTexto(Costos.Comentarios3)){
                        MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                        Costos.formularioGm();
                    }
                }
                else if(Costos.departamento === "NÓMINAS"){
                    if( Costos.validarFormatoMonetario(Costos.camposValidarMonetario4) && Costos.validarTexto(Costos.Comentarios4)){
                        MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                        Costos.formularioNominas();
                    }
                }
            });

            Costos.botonRefrescar.click(function(){
                Costos.filtroCliente.val('');
                Costos.filtroRegistro.val('');
                Costos.filtros();
            });

            //#region metodo informativo
            $('.informativo-a,.informativo2-a').click(function(){
                let r = $(this);
                let campo = r.next().attr('name');
                let valorActual = r.attr('info');
                MetodosDiversos.alertTextArea(r.parent().parent().children('label').text(),r.attr('info'),function(nuevoValor){
                    if(valorActual !== nuevoValor)
                        Costos.actualizarInformativo(campo,nuevoValor,r);
                });
            });
            //#endregion

            Costos.clientes.change(function(){
                if($(this).val()==='edit'){
                    $(this).val('');
                    Costos.modalEdicion.modal('show');
                }
                Costos.NombreComercial.val($('option:selected',this).attr('alias'));
            });

            Costos.Clientes2.change(function(){
                Costos.NombreComercial2.val($('option:selected',this).attr('alias'));
            });

            Costos.NombrePromotor.change(function(){
                if($(this).val()==='edit'){
                    $(this).val('');
                    Costos.modalEdicionPromotor.modal('show');
                }
            });
            Costos.Subcomisionista.change(function(){
                if($(this).val()==='edit'){
                    $(this).val('');
                    Costos.modalEdicionSubcomisionista.modal('show');
                }
            });



            $('#nuevoClienteCostos').click(function(){
                Costos.actualizarId = 0;
                Costos.modalEdicion.modal('hide');
                Costos.fomularioNuevoCliente[0].reset();
                $('#modalNuevoClienteCostos').modal('show');
                Costos.labelTituloCliente.text('Agregar nuevo cliente a la lista');
            });

            $('#editarClienteCostos').click(function(){
                Costos.modalEdicion.modal('hide');
                $('#modalEditarClienteCostos').modal('show');
                MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{recargarListaClientes:true},(error,respuesta)=>{ 
                    Costos.listaClientesModal.html(respuesta);
                });
            });

            $('#nuevoPromotorCostos').click(function(){
                Costos.actualizarId = 0;
                Costos.modalEdicionPromotor.modal('hide');
                Costos.fomularioNuevoPromotor[0].reset();
                $('#modalNuevoPromotorCostos').modal('show');
                Costos.labelPromotorTitulo.text('Agregar nuevo promotor a la lista');
            });

            $('#editarPromotorCostos').click(function(){
                Costos.modalEdicionPromotor.modal('hide');
                $('#modalEditarPromotorCostos').modal('show');
                MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{recargarListaPromotores:true},(error,respuesta)=>{ 
                    Costos.listaPromotorModal.html(respuesta);
                });
            });

            $('#nuevoSubcomisionistaCostos').click(function(){
                Costos.actualizarId = 0;
                Costos.modalEdicionSubcomisionista.modal('hide');
                Costos.fomularioNuevoSubcomisionista[0].reset();
                $('#modalNuevoSubcomisionistaCostos').modal('show');
               Costos.labelSubcomisionistaTitulo.text('Agregar nuevo subcomisionista a la lista');
            });

            $('#editarSubcomisionistaCostos').click(function(){
                Costos.modalEdicionSubcomisionista.modal('hide');
                $('#modalEditarSubcomisionistaCostos').modal('show');
                MetodosDiversos.consultaAjaxData("controllers/AjaxCostos.php",{recargarListaSubcomisionistas:true},(error,respuesta)=>{ 
                    Costos.listaSubcomisionistaModal.html(respuesta);
                });
            });

          
            Costos.fomularioNuevoCliente.submit(function(e){
                e.preventDefault();
                MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                let data = new FormData($(this)[0]);
                if(Costos.actualizarId > 0)
                    data.append('actualizar', Costos.actualizarId)
                MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php",data,(error,respuesta)=>{ 
                    MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                    if(!respuesta.error){
                        if(Costos.actualizarId > 0){//se realizó una actualización
                            Costos.nombreUltimo.text(Costos.actualizarNombreCliente.val());
                            Costos.nombreComercialUltimo.attr('alias',Costos.actualizarNombreClienteComercial.val());
                            $('#modalNuevoClienteCostos').modal('hide');
                        }  
                        Costos.clientes.html(respuesta.data);
                        $(this)[0].reset();
                    }  
                });
            });

            Costos.fomularioNuevoPromotor.submit(function(e){
                e.preventDefault();
                MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                let data = new FormData($(this)[0]);
                if(Costos.actualizarId > 0)
                    data.append('actualizar', Costos.actualizarId)
                MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php",data,(error,respuesta)=>{ 
                    MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                    if(!respuesta.error){
                        if(Costos.actualizarId > 0){//se realizó una actualización
                            Costos.nombreUltimo.text(Costos.actualizarNombrePromotor.val());
                            $('#modalNuevoPromotorCostos').modal('hide');
                        }  
                        Costos.NombrePromotor.html(respuesta.data);
                        $(this)[0].reset();
                    }  
                });
            });

            Costos.fomularioNuevoSubcomisionista.submit(function(e){
                e.preventDefault();
                MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',60000,false);
                let data = new FormData($(this)[0]);
                if(Costos.actualizarId > 0)
                    data.append('actualizar', Costos.actualizarId)
                MetodosDiversos.consultaAjaxFormulario("controllers/AjaxCostos.php",data,(error,respuesta)=>{ 
                    MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                    if(!respuesta.error){
                        if(Costos.actualizarId > 0){//se realizó una actualización
                            Costos.nombreUltimo.text(Costos.actualizarNombreSubcomisionista.val());
                            $('#modalNuevoSubcomisionistaCostos').modal('hide');
                        } 
                        Costos.Subcomisionista.html(respuesta.data);
                        $(this)[0].reset();
                    }  
                });
            });

            Costos.listaClientesModal.on('click','.clickSeleccionClientesCostos',function(){
                $(this).toggleClass('seleccion-On');
                $(this).hasClass('seleccion-On') ? Costos.realizarCambios(true,$(this),'cliente') : Costos.realizarCambios(false,$(this),'cliente'); 
            });

            Costos.listaPromotorModal.on('click','.clickSeleccionPromotoresCostos',function(){
                $(this).toggleClass('seleccion-On');
                $(this).hasClass('seleccion-On') ? Costos.realizarCambios(true,$(this),'promotor') : Costos.realizarCambios(false,$(this),'promotor'); 
            });

            Costos.listaSubcomisionistaModal.on('click','.clickSeleccionSubcomisionistasCostos',function(){
                $(this).toggleClass('seleccion-On');
                $(this).hasClass('seleccion-On') ? Costos.realizarCambios(true,$(this),'subcomisionista') : Costos.realizarCambios(false,$(this),'subcomisionista'); 
            });

            Costos.listaClientesModal.on('click','.actualizarClientesCostos',function(){
                Costos.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                Costos.nombreUltimo = $(this).parent().siblings('.getData').children(1);
                Costos.nombreComercialUltimo = $(this).parent().siblings('.getData');
                Costos.fomularioNuevoCliente[0].reset();
                Costos.labelTituloCliente.text('Actualizar datos del cliente');
                $('#modalNuevoClienteCostos').modal('show');
                Costos.actualizarNombreCliente.val(Costos.nombreUltimo.text().substr(7));
                Costos.actualizarNombreClienteComercial.val(Costos.nombreComercialUltimo.attr('alias'));
            });

            Costos.listaPromotorModal.on('click','.actualizarPromotoresCostos',function(){
                Costos.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                Costos.nombreUltimo = $(this).parent().siblings('.getData').children(1);
                Costos.fomularioNuevoPromotor[0].reset();
                Costos.labelPromotorTitulo.text('Actualizar nombre del promotor');
                $('#modalNuevoPromotorCostos').modal('show');
                Costos.actualizarNombrePromotor.val(Costos.nombreUltimo.text().substr(7));
            });

            Costos.listaSubcomisionistaModal.on('click','.actualizarSubcomisionistasCostos',function(){
                Costos.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                Costos.nombreUltimo = $(this).parent().siblings('.getData').children(1);
                Costos.fomularioNuevoSubcomisionista[0].reset();
                Costos.labelPromotorTitulo.text('Actualizar nombre del subcomisionista');
                $('#modalNuevoSubcomisionistaCostos').modal('show');
                Costos.actualizarNombreSubcomisionista.val(Costos.nombreUltimo.text().substr(7));
            });

            Costos.filtroRegistro.on('input',function(){
                Costos.filtros();
            });
            Costos.filtroCliente.change(function(){
                Costos.filtros();
            });


    }
}
            
Costos.main();

