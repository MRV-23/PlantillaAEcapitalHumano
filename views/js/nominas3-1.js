
class Nominas{

    static setup(){
        $('.monetario').mask('000,000,000.00', {reverse: true});
        $('.porcentaje').mask('09.09');
        Nominas.comisionMonto = 0;
        Nominas.formulario = $('#formularioNominas');
        Nominas.cancelar = $('#formularioCancelarNominas');
        Nominas.iva = $('#nominasIva');
        Nominas.tipoSindicato = $('#tipoSindicato');
        Nominas.facturaDevengada = $('#facturaDevengada');
        Nominas.styleFacturaDevengada = $('#styleFacturaDevengada');
        Nominas.retencionIva6 = $('#retencionIva');
        Nominas.calcularRetencionIva = $('#calcularRetencionIva');
        Nominas.tipoSindicato.html('');
        Nominas.cargarNumeroNomina = $('#cargarNumeroNomina');
        Nominas.sinFactura = $('select[name="nominasEmpresaFactura"]');
        Nominas.devengada = $('#devengada');
        Nominas.subtotal = $('#nominasSubtotal');
        Nominas.total = $('#nominasTotal');

        Nominas.retencionIsn = $('#retencionIsn');
        Nominas.checkRetencionIsn = $('#checkCalcularIsn');
        Nominas.impuestoEstatal = $('#impuestoEstatal');
       
        Nominas.botonMostrarData = $('.nominasMostrarData');/////////////////////???
        Nominas.consecutivoNomina = $('#consecutivoNomina');
        Nominas.campoActualizar = $(".actualizar");
        Nominas.botonFormularioActualizarNominas = $('#botonFormularioActualizarNominas');
        Nominas.botonFormularioGuardarNominas = $('#botonFormularioGuardarNominas');
        Nominas.formularioActualizarNominas = $('#formularioNominasActualizar');
        Nominas.recargarNominas= $('#recargarNominas');
        Nominas.totalTexto = $('#totalRegistrosNominas');
        Nominas.botonActualizarNominas = $('#actualizarNominas');
        Nominas.nominasComision = $('#nominasComision');
        Nominas.paginador = $('.nominas');
        Nominas.mostrarPaginador = $('.paginadorNominas');
        Nominas.filtroCliente = $('#filtroNombreCliente');
        Nominas.filtroFacturado = $('#filtroMontoFacturado');
        Nominas.filtroObservaciones = $('#filtroObservaciones');
        Nominas.filtroPago = $('#filtroPago');
        Nominas.filtroNumeroNomina = $('#filtroNumeroNomina');
        Nominas.filtroNominista = $('#filtroNombreNominista');
        Nominas.filtroAutorizacion = $('#filtroAutorizacion');
        Nominas.facturado = '';
        Nominas.liberado = '';
        Nominas.formularioActualizarFinanzas = $('#formularioFinanzasActualizar');
        Nominas.botonFormularioActualizarFinanzas = $('#botonFormularioActualizarFinanzas');
        Nominas.botonFormularioGuardarFinanzas = $('#botonFormularioGuardarFinanzas');
        Nominas.financiada = $('#financiada');
        Nominas.fondeoImss = $('#fondeoImss');
        Nominas.fondeoAsimilado = $('#fondeoAsimilados');
        
        Nominas.cargarNominas = $('#cargarRegistrosNominas');
        Nominas.formularioCargarNominasManual = $('#formularioCargarNominas');
        Nominas.modalData = $('#dataNominas');
        Nominas.marcadorPendientes = $('#cargarMarcadoresPendientes');
        Nominas.marcadorLiberadas = $('#cargarMarcadoresLiberados');
        Nominas.marcadorCanceladas = $('#cargarMarcadoresCancelados');
        Nominas.marcadorPendientes2 = $('#cargarMarcadoresPendientes2');
        Nominas.marcadorPagadas = $('#cargarMarcadoresPagadas');
        Nominas.marcadorCanceladas2 = $('#cargarMarcadoresCancelados2');
        Nominas.esquemas = $('#tipoEsquema');
        Nominas.esquemasAjax = $('#tipoEsquemaAjax');
        Nominas.info = $('.info');
        Nominas.recargarFinanzasComentarios = $('#actualizarFinanzasComentarios');
        Nominas.recargarTesoreriaComentarios = $('#actualizarTesoreriaComentarios');
        Nominas.formularioActualizarTesoreria = $('#formularioTesoreriaActualizar');
        Nominas.botonFormularioActualizarTesoreria = $('#botonFormularioActualizarTesoreria');
        Nominas.botonFormularioGuardarTesoreria = $('#botonFormularioGuardarTesoreria');
        Nominas.campoActualizar3 = $(".actualizar3");
        Nominas.documentosNominas = $("#documentosNominas");
        Nominas.botonDocumentosNominas = $('#archivosNominas');
        Nominas.documentosNominas2 = $("#documentosNominas2");
        Nominas.botonDocumentosNominas2 = $('#archivosNominas2');
        Nominas.totalArchivos = 0;
        Nominas.totalArchivosAll = 0;
        Nominas.files = [];
        Nominas.totalArchivos2 = 0;
        Nominas.files2 = [];
        Nominas.totalArchivosAll2 = 0;
        Nominas.fileSizeLimit = 25;
        Nominas.botonNominaPrimaria = $('#botonGuardarNominaPrimaria');
        Nominas.labelAdjuntos = $('#labelAdjuntos');
        Nominas.adjuntosContador = $('.adjuntosContador');
        Nominas.areaAdjuntosLoad = $('#areaAdjuntosLoad');
        Nominas.ocultarLienzoAdjuntos = $('#ocultarLienzoAdjuntos');
        Nominas.ocultarLienzoAdjuntos2 = $('#ocultarLienzoAdjuntos2');
        Nominas.nominista = $('#credencialesUsuario').attr('value');
        Nominas.adjuntarArchivosMasivos = $('#cargarARchivosAdjuntosMasivos');
        Nominas.adjuntarArchivosMasivosRecibos = $('#adjuntarArchivosMasivosRecibos');
        Nominas.adjuntarArchivosMasivosFinanzas = $('#cargarArchivosAdjuntosMasivosFinanzas');
        Nominas.adjuntarArchivosMasivosTesoreria = $('#cargarArchivosAdjuntosMasivosTesoreria');
        Nominas.totalAdjuntos = $('#totalAdjuntos');
        Nominas.totalAdjuntosPeso = $('#totalAdjuntosPeso');
        Nominas.totalAdjuntosPeso2 = $('#totalAdjuntosPeso2');
        Nominas.totalAdjuntos2 = $('#totalAdjuntos2');
        Nominas.botonArchivosAdjuntos = $('.botonArchivosAdjuntos');
        Nominas.modalArchivosAdjuntos = $('#modalArchivosAdjuntos');
        Nominas.dataArchivosAdjuntos = $('#dataArchivosAdjuntos');
        Nominas.labelArchivosAdjuntos = $('#labelArchivosAdjuntos');
        Nominas.nominasCliente = $('select[name="nominasCliente"]');
        Nominas.nominasTipoPago = $('select[name="nominasTipoPago"]');
        Nominas.nominasRegimen = $('select[name="nominasRegimen"]');
        Nominas.nominasComision = $('input[name="nominasComision"]');
        Nominas.nominasEmpresaFactura = $('select[name="nominasEmpresaFactura"]');
        Nominas.nominasSubtotal = $('input[name="nominasSubtotal"]');
        Nominas.nominasIva = $('input[name="nominasIva"]');
        Nominas.nominasTotal = $('input[name="nominasTotal"]');
        Nominas.nominasEmpresaImss = $('select[name="nominasEmpresaImss"]');
        Nominas.nominasTotalImss = $('input[name="nominasTotalImss"]');
        Nominas.nominasEmpresaAsimilados = $('select[name="nominasEmpresaAsimilados"]');
        Nominas.nominasTotalAsimilados = $('input[name="nominasTotalAsimilados"]');
        Nominas.nominasPeriodo = $('select[name="nominasPeriodo"]');
        Nominas.nominasNumeroPeriodo = $('input[name="nominasNumeroPeriodo"]');
        Nominas.nominasSocios = $('input[name="nominasSocios"]');
        Nominas.nominasDescuentosSys = $('input[name="nominasDescuentosSys"]');
        Nominas.nominasDescuentosAsesores = $('input[name="nominasDescuentosAsesores"]');
        Nominas.nominasDescuentosTerceros = $('input[name="nominasDescuentosTerceros"]');
        Nominas.retencionIva = $('input[name="retencionIva"]');

        Nominas.nominasIngreso = $('input[name="nominasIngreso"]');
        Nominas.nominasInfonavit = $('input[name="nominasInfonavit"]');
        Nominas.nominasFonacot = $('input[name="nominasFonacot"]');
        Nominas.nominasDonativo = $('input[name="nominasDonativo"]');
        Nominas.nominasPensionAlimenticia = $('input[name="nominasPensionAlimenticia"]');
        Nominas.nominasExcedenteCargas = $('input[name="nominasExcedenteCargas"]');
        Nominas.nominasCargaPatronal = $('input[name="nominasCargaPatronal"]');
        Nominas.nominasIsn = $('input[name="nominasIsn"]');
        Nominas.nominasComisionMonto = $('input[name="nominasComisionMonto"]');
        Nominas.nominasImssObrera = $('input[name="nominasImssObrera"]');
        Nominas.nominasCargaSocialImss = $('input[name="nominasCargaSocialImss"]');
        Nominas.nominasPrenominaImss = $('input[name="nominasPrenominaImss"]');
        Nominas.nominasIsrIsp = $('input[name="nominasIsrIsp"]');
        Nominas.nominasIsr142 = $('input[name="nominasIsr142"]');
        Nominas.nominasCuotaSindical = $('input[name="nominasCuotaSindical"]');
        Nominas.nominasDespensa = $('input[name="nominasDespensa"]');
        Nominas.nominasCajaAhorro = $('input[name="nominasCajaAhorro"]');
        Nominas.nominasDescuentoImss = $('input[name="nominasDescuentoImss"]');
        Nominas.nominasApoyoSindical = $('input[name="nominasApoyoSindical"]');
        Nominas.nominasDescuentoComedor = $('input[name="nominasDescuentoComedor"]');
        Nominas.nominasHaberes = $('input[name="nominasHaberes"]');
        Nominas.nominasExcedenteSubsidio = $('input[name="nominasExcedenteSubsidio"]');
        Nominas.nominasPrestamosEmpleados = $('input[name="nominasPrestamosEmpleados"]');///NEEEEEEEEEEEEEEEEEEEEEEWWWW
        Nominas.nominasPrestamosAyudate = $('input[name="nominasPrestamosAyudate"]');///NEEEEEEEEEEEEEEEEEEEEEEWWWW
        Nominas.nominasAjusteSubsidioEmpleo = $('input[name="ajusteSubsidioEmpleo"]');///NEEEEEEEEEEEEEEEEEEEEEEWWWW
        Nominas.nominasOtros = $('input[name="nominasOtros"]');
        Nominas.gastos_medicos2 = $('input[name="gastos_medicos2"]');

        Nominas.comprobacionSys = $('#comprobacionSys');

        Nominas.nominasExcedenteIngreso = $('input[name="nominasExcedenteIngreso"]');
        Nominas.nominasExcedenteTerceros = $('input[name="nominasExcedenteTerceros"]');
        Nominas.nominasExcedenteIsr = $('input[name="nominasExcedenteIsr"]');
        Nominas.nominasExcedenteImss = $('input[name="nominasExcedenteImss"]');
        Nominas.nominasExcedenteGmm = $('input[name="nominasExcedenteGmm"]');
        Nominas.nominasExcedenteInfonavit = $('input[name="nominasExcedenteInfonavit"]');
        Nominas.nominasExcedenteFonacot = $('input[name="nominasExcedenteFonacot"]');
        Nominas.nominasExcedentePrestamos = $('input[name="nominasExcedentePrestamos"]');
        Nominas.nominasExcedentePensionAlimencia = $('input[name="nominasExcedentePensionAlimencia"]');
        Nominas.nominasExcedenteIngresosSinTimbrar = $('input[name="nominasExcedenteIngresosSinTimbrar"]');
        Nominas.nominasExcedenteClientes = $('input[name="nominasExcedenteClientes"]');
        Nominas.nominasExcedenteRecuperacion = $('input[name="nominasExcedenteRecuperacion"]');
        Nominas.nominasExcedenteComisionSocio = $('input[name="nominasExcedenteComisionSocio"]');
        Nominas.nominasExcedentePrenominaImss = $('input[name="nominasExcedentePrenominaImss"]');
        Nominas.nominasExcedentePrenominaGmm = $('input[name="nominasExcedentePrenominaGmm"]');
        Nominas.nominasExcedenteCajaAhorro = $('input[name="nominasExcedenteCajaAhorro"]');///NEEEEEEEEEEEEEEEEEEEEEEWWWW
        Nominas.nominasExcedenteDescuentoAyudate= $('input[name="descuentoAyudate"]');
        Nominas.nominasExcedenteOtros = $('input[name="nominasExcedenteOtros"]');

        Nominas.sindicato = $('input[name="sindicato"]');
        Nominas.tarjeta_empresarial = $('input[name="tarjeta_empresarial"]');
        Nominas.modalidad_40 = $('input[name="modalidad_40"]');

        Nominas.comprobacionAsimilados = $('#comprobacionAsimilados');


        Nominas.nominasComentarios = $('textarea[name="nominasComentarios"]');
        Nominas.numeroNominaOrigen=null;
        Nominas.autorizarMasivo = $('#masterAutorizar');
        Nominas.eliminarMasivo = $('#masterEliminar');

        Nominas.retencionIva6Ajax = $('#retencionIva2');
        Nominas.retencionIsnAjax = $('#retencionIsn2');
        Nominas.checkRetencionIsnAjax = $('#checkCalcularIsn2');
        Nominas.impuestoEstatalAjax = $('#impuestoEstatal2');
        Nominas.campoRetencionObligatorioAjax = $('.campoRetencionObligatorio2');

        Nominas.calcularRetencionIvaAjax = $('#calcularRetencionIva2');
        Nominas.campoActualizar2 = $(".actualizar2");
        Nominas.totalAjax = $('#nominasTotalAjax');
        Nominas.subtotalAjax = $('#nominasSubtotalAjax');
        Nominas.devengadaAjax = $('#devengadaAjax');
        Nominas.facturaDevengadaAjax = $('#facturaDevengada2');
        Nominas.styleFacturaDevengadaAjax = $('#styleFacturaDevengada2');
        Nominas.ivaAjax = $('#nominasIvaAjax');
        Nominas.comisionMontoAjax = 0;

        Nominas.nominasPensionAlimenticia2 = $('#nominasPensionAlimenticia2');
        Nominas.nominasPrestamosEmpleados2 = $('#nominasPrestamosEmpleados2');
        Nominas.nominasDescuentosSys2 = $('#nominasDescuentosSys2');
        Nominas.nominasDescuentosTerceros2 =$('#nominasDescuentosTerceros2');
        Nominas.nominasExcedentePensionAlimencia2=$('#nominasExcedentePensionAlimencia2');
        Nominas.nominasExcedenteClientes2=$('#nominasExcedenteClientes2');
        Nominas.nominasExcedenteOtros2=$('#nominasExcedenteOtros2');
        Nominas.nominasExcedenteIsr2 = $('#nominasExcedenteIsr2');
        Nominas.nominasExcedenteImss2 = $('#nominasExcedenteImss2');
        Nominas.nominasExcedenteGmm2 = $('#nominasExcedenteGmm2');
        Nominas.nominasExcedenteInfonavit2 = $('#nominasExcedenteInfonavit2');
        Nominas.nominasExcedenteFonacot2 = $('#nominasExcedenteFonacot2');
        Nominas.nominasExcedentePrestamos2 = $('#nominasExcedentePrestamos2');
        Nominas.nominasExcedenteRecuperacion2 = $('#nominasExcedenteRecuperacion2');
        Nominas.nominasExcedenteComisionSocio2 = $('#nominasExcedenteComisionSocio2');
        Nominas.nominasExcedentePrenominaImss2 = $('#nominasExcedentePrenominaImss2');
        Nominas.nominasExcedentePrenominaGmm2 = $('#nominasExcedentePrenominaGmm2');
        Nominas.nominasExcedenteCajaAhorro2 = $('#nominasExcedenteCajaAhorro2');
        Nominas.nominasDescuentosAsesores2 = $('#nominasDescuentosAsesores2');
        Nominas.nominasExcedenteIngreso2 = $('#nominasExcedenteIngreso2');
        Nominas.nominasExcedenteTerceros2 = $('#nominasExcedenteTerceros2');
        Nominas.descuentoAyudate2 = $('#descuentoAyudate2');

        Nominas.sindicato2 = $('#sindicato');
        Nominas.tarjeta_empresarial2 = $('#tarjeta_empresarial');
        Nominas.modalidad_402 = $('#modalidad_40');

        Nominas.comprobacionAsimilados2 = $('#comprobacionAsimilados2');

        Nominas.nominasOtros2 = $('#nominasOtros2');
        Nominas.nominasAjusteSubsidioEmpleo2 = $('#ajusteSubsidioEmpleo2');
        Nominas.nominasPrestamosAyudate2 = $('#nominasPrestamosAyudate2');
        Nominas.nominasExcedenteSubsidio2 = $('#nominasExcedenteSubsidio2');
        Nominas.nominasHaberes2 = $('#nominasHaberes2');
        Nominas.nominasDescuentoComedor2 = $('#nominasDescuentoComedor2');
        Nominas.nominasApoyoSindical2 = $('#nominasApoyoSindical2');
        Nominas.nominasDescuentoImss2 = $('#nominasDescuentoImss2');
        Nominas.nominasCajaAhorro2 = $('#nominasCajaAhorro2');
        Nominas.nominasDespensa2 = $('#nominasDespensa2');
        Nominas.nominasCuotaSindical2 = $('#nominasCuotaSindical2');
        Nominas.nominasIsr1422 = $('#nominasIsr1422');
        Nominas.nominasIsrIsp2 = $('#nominasIsrIsp2');
        Nominas.nominasPrenominaImss2 = $('#nominasPrenominaImss2');
        Nominas.nominasCargaSocialImss2 = $('#nominasCargaSocialImss2');
        Nominas.nominasImssObrera2 = $('#nominasImssObrera2');
        Nominas.nominasComisionMontoAjax = $('#nominasComisionMontoAjax');
        Nominas.nominasCargaPatronal2 = $('#nominasCargaPatronal2');
        Nominas.nominasExcedenteCargas2 = $('#nominasExcedenteCargas2');
        Nominas.nominasDonativo2 = $('#nominasDonativo2');
        Nominas.nominasFonacot2 = $('#nominasFonacot2');
        Nominas.nominasInfonavit2 = $('#nominasInfonavit2');
        Nominas.nominasIngreso2 = $('#nominasIngreso2');

        Nominas.gastos_medicos22 = $('#gastos_medicos2');


        Nominas.comprobacionSys2 = $('#comprobacionSys2');
    }

    static sumatoriaSys(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIngreso.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasInfonavit.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasFonacot.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDonativo.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPensionAlimenticia.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteCargas.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCargaPatronal.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIsn.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasComisionMonto.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasImssObrera.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCargaSocialImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrenominaImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIsrIsp.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIsr142.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCuotaSindical.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDespensa.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCajaAhorro.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDescuentoImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasApoyoSindical.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDescuentoComedor.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasHaberes.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteSubsidio.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrestamosEmpleados.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrestamosAyudate.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasAjusteSubsidioEmpleo.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasOtros.val())) + 
        parseFloat(Nominas.convertirDecimal(Nominas.gastos_medicos2.val()));
        if(total > 0)
            Nominas.comprobacionSys.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.comprobacionSys.val('');
    }

    static sumatoriaAsimilados(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteIngreso.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteTerceros.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteIsr.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteGmm.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteInfonavit.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteFonacot.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrestamos.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePensionAlimencia.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteClientes.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteRecuperacion.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteComisionSocio.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaGmm.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteCajaAhorro.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteDescuentoAyudate.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteOtros.val())) + 
        parseFloat(Nominas.convertirDecimal(Nominas.sindicato.val())) + 
        parseFloat(Nominas.convertirDecimal(Nominas.tarjeta_empresarial.val())) + 
        parseFloat(Nominas.convertirDecimal(Nominas.modalidad_40.val()));
        if(total > 0)
            Nominas.comprobacionAsimilados.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.comprobacionAsimilados.val('');
    }

    static sumatoriaSys2(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIngreso2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasInfonavit2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasFonacot2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDonativo2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPensionAlimenticia2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteCargas2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCargaPatronal2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.impuestoEstatalAjax.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasComisionMontoAjax.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasImssObrera2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCargaSocialImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrenominaImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIsrIsp2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasIsr1422.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCuotaSindical2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDespensa2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasCajaAhorro2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDescuentoImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasApoyoSindical2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasDescuentoComedor2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasHaberes2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteSubsidio2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrestamosEmpleados2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrestamosAyudate2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasAjusteSubsidioEmpleo2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasOtros2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.gastos_medicos22.val()));
        if(total > 0)
            Nominas.comprobacionSys2.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.comprobacionSys2.val('');
    }

    static sumatoriaAsimilados2(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteIngreso2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteTerceros2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteIsr2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteGmm2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteInfonavit2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteFonacot2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrestamos2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePensionAlimencia2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteClientes2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteRecuperacion2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteComisionSocio2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaGmm2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteCajaAhorro2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.descuentoAyudate2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteOtros2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.sindicato2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.tarjeta_empresarial2 .val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.modalidad_402.val())) ;
        if(total > 0)
            Nominas.comprobacionAsimilados2.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.comprobacionAsimilados2.val('');
    }
    
    static validacionCambioEsquemas(tipo){

        $('.asimilados-icono').css('display','none');
        $('.asimilados-validacion').prop('required',false);
        $('.mixto-icono').css('display','none');
        $('.mixto-validacion').prop('required',false);
        $('.sindicato-icono').css('display','none');
        $('.sindicato-validacion').prop('required',false);
        $('.sys-icono').css('display','none');
        $('.sys-validacion').prop('required',false);
        $('.tarjeta-icono').css('display','none');
        $('.tarjeta-validacion').prop('required',false);

        $('.prestamo-icono').css('display','none');
        $('.prestamo-validacion').prop('required',false);

        $('.especial-icono').css('display','none');
        $('.especial-validacion').prop('required',false);

        Nominas.tipoSindicato.html('');
        Nominas.cargarNumeroNomina.html('');

     switch(tipo){
        case 1://asimilados
            $('.asimilados-icono').css('display','');
            $('.asimilados-validacion').prop('required',true);
            $( ".asimilados-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            });  
        break;
        case 2://mixto
            $('.mixto-icono').css('display','');
            $('.mixto-validacion').prop('required',true);
            $( ".mixto-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            });  
        break;
        case 3://sindicato
            $('.sindicato-icono').css('display','');
            $('.sindicato-validacion').prop('required',true);
            $( ".sindicato-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            }); 
            Nominas.tipoSindicato.html('<div class="row form-group rowColorGray">'+
                                            '<div class="col-md-12">'+
                                             '<label for="">A.-Pagadora sindicato:</label> '+
                                                '<i class="fa fa-check-circle text-green"></i>'+
                                                '<div class="input-group">'+
                                                    '<div class="input-group-addon">'+
                                                    '<i class="fa fa-list-ol"></i>'+
                                                    '</div>'+
                                                    '<select class="form-control textoMay iluminarIconoInput" name="tipoSindicato" required>'+
                                                        '<option value=""></option>'+
                                                        '<option value="1">SINDICATO ASESORES / CROM</option>'+
                                                        '<option value="2">SINDICATO BUDAPEST</option>'+
                                                    '</select>'+
                                                '</div>'+
                                           ' </div>'+
                                        '</div>'); 
        break;
        case 4://sys
            $('.sys-icono').css('display','');
            $('.sys-validacion').prop('required',true);
            $( ".sys-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            });  
        break;
        case 5://tarjeta empresarial
            $('.tarjeta-icono').css('display','');
            $('.tarjeta-validacion').prop('required',true);
            $( ".tarjeta-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            });  
        break;
        case 6://PESTAMO
            $('.prestamo-icono').css('display','');
            $('.prestamo-validacion').prop('required',true);
            $( ".prestamo-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            });  
        break;
        case 7://CONFIDENCIAL
            $('.especial-icono').css('display','');
            $('.especial-validacion').prop('required',true);
            $( ".especial-validacion" ).each(function() {
                if($(this).hasClass("monetario"))
                    $(this).attr('pattern',"[0-9,.]{4,}");
            });  
        break;
     }
           
    }

    static actualizarNominas(sockets=false){
        if(sockets){
            MetodosDiversos.crearRegistro('Hay nuevas nóminas registradas','¿ Deseas actualizar ahora ?',(respuesta)=>{
               if(respuesta){
                    if(window.location.pathname === "/asesores/nominas")
                        Nominas.aceptarActualizar();
                    else
                        location.href = ruta_server + "nominas";
               } 
            });
        }
        else{ 
            Nominas.aceptarActualizar();
        }
    }


    static aceptarActualizar(){
        Nominas.recargarNominas.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{refrescarNominas:true,location:window.location.pathname},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else{
                    Nominas.recargarNominas.html(respuesta.html);
                    Nominas.mostrarPaginador.html(respuesta.paginador);
                    Nominas.totalTexto.html(respuesta.total);
                    Nominas.filtroCliente.val('');
                    Nominas.filtroFacturado.val('');
                    Nominas.filtroNumeroNomina.val('');
                    Nominas.filtroNominista.val( Nominas.valorInicialNominista );
        

                    if(window.location.pathname === "/asesores/finanzas")
                        Nominas.filtroObservaciones.val(1);
                    else if(window.location.pathname === "/asesores/tesoreria"){
                        //Nominas.filtroObservaciones.val(2);
                        Nominas.filtroPago.val(1);
                        //Nominas.filtroAutorizacion.val(1);
                    }
                    else if(window.location.pathname === "/asesores/nominas"){
                        Nominas.filtroAutorizacion.val(0);
                    }
                    else{
                        Nominas.filtroObservaciones.val(0);
                        Nominas.filtroPago.val(0);
                        Nominas.filtroAutorizacion.val('');
                    }

                    Nominas.marcadorPendientes.text(respuesta.pendientes);
                    Nominas.marcadorLiberadas.text(respuesta.liberadas);
                    Nominas.marcadorCanceladas.text(respuesta.canceladas);

                    Nominas.marcadorPendientes2.text(respuesta.pendientes2);
                    Nominas.marcadorPagadas.text(respuesta.pagadas);
                    Nominas.marcadorCanceladas2.text(respuesta.canceladas2);


                    Nominas.setup();
                    

                    Nominas.botonMostrarData.click(function(){
                        Nominas.mostrarDatos($(this).attr('value'));
                    });

                    Nominas.paginador.click(function(e){
                        Nominas.paginar(e,$(this));
                    });
                
            }                   
        });
    }



    /***********************************/

    static progressHandler(e){
         $('#loaded_n_total').text( Nominas.formatBytes(e.loaded) + " de " + Nominas.formatBytes(e.total));
        let percent = (e.loaded / e.total) * 100;
        //Cargar.barra.val(Math.round(percent));
        let redondeo = Math.round(percent);
        Nominas.knobfunction(redondeo);
    }

    static knobfunction(value1){
            $('#progressBar').val(value1).trigger('change');
    }

    static completeHandler(e){
        let respuesta = JSON.parse(e.srcElement.response);
        if(!respuesta.error){
            Nominas.setup();
            Nominas.actualizarNominas();
            //socket.emit('socketsNuevasNominas',null);
            Nominas.botonMostrarData.click(function(){
                Nominas.mostrarDatos($(this).attr('value'));
            });
            Nominas.formulario[0].reset();
            Nominas.resetDocumentos2();
            Nominas.esquemas.val('');
            Nominas.formulario.css('visibility','hidden');
            $('html,body').animate({
                scrollTop: $('#credencialesUsuario').offset().top
            }, 1000);
            Nominas.tipoSindicato.html('');
            Nominas.cargarNumeroNomina.html('');
            Nominas.totalAdjuntos.text(0);
            Nominas.totalAdjuntosPeso.text('0 MB');      
            Nominas.retencionTemporal = 0;
            Nominas.totalConRetencionTemporal = 0;
            Nominas.totalSinRetencionTemporal = 0; 
            MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true); 
        }
        else{
            Nominas.botonNominaPrimaria.attr('disabled',false);
            MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
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

    static enviarFormulario(data){
        
        swal({title: '<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#f56954"><br><div class="knob-label" id="loaded_n_total"></div>',text: ' Por favor espere... ',type: '',showConfirmButton: false,allowOutsideClick: false});
        
        $("#progressBar").knob({
            change : function (value) {
             //console.log("change : " + value);
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Nominas.progressHandler, false);
        ajax.addEventListener("load", Nominas.completeHandler, false);
        ajax.addEventListener("error", Nominas.errorHandler, false);
        ajax.addEventListener("abort", Nominas.abortHandler, false);
        ajax.open("POST", "controllers/AjaxNominas.php");
        ajax.send(data);
        /*MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", data,(error,respuesta)=>{
                if(error){
                    Nominas.botonNominaPrimaria.attr('disabled',false);
                    MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
                }  
                else {
                    Nominas.setup();
                    Nominas.actualizarNominas();
                    //socket.emit('socketsNuevasNominas',null);
                    Nominas.botonMostrarData.click(function(){
                        Nominas.mostrarDatos($(this).attr('value'));
                    });
                    Nominas.formulario[0].reset();
                    Nominas.resetDocumentos2();
                    Nominas.esquemas.val('');
                    Nominas.formulario.css('visibility','hidden');
                    $('html,body').animate({
                        scrollTop: $('#credencialesUsuario').offset().top
                    }, 1000);
                    Nominas.tipoSindicato.html('');
                    Nominas.cargarNumeroNomina.html('');
                    Nominas.totalAdjuntos.text(0);
                    Nominas.totalAdjuntosPeso.text('0 MB');
                    MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);    
                }
        });*/
    }
 
    /***********************/

    static actualizarFormulario(data,callback){
        swal({title: '<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#f56954"><br><div class="knob-label" id="loaded_n_total"></div>',text: ' Por favor espere... ',type: '',showConfirmButton: false,allowOutsideClick: false});
        
        $("#progressBar").knob({
            change : function (value) {
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Nominas.progressHandler, false);
        ajax.addEventListener("load", function(e){
            let respuesta = JSON.parse(e.srcElement.response);
            if(respuesta.error)
                MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
            else{
                MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                if( $('#credencialesUsuario').attr('value') != 168 && $('#credencialesUsuario').attr('value') != 172 )
                    Nominas.actualizarNominas();
            }
            callback(respuesta.error);
        }, false);
        ajax.addEventListener("error", Nominas.errorHandler, false);
        ajax.addEventListener("abort", Nominas.abortHandler, false);
        ajax.open("POST", "controllers/AjaxNominas.php");
        ajax.send(data);
        /*
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", data,(error,respuesta)=>{
                if(error){
                    MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
                    callback(error);
                }  
                else {
                    MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                    if( $('#credencialesUsuario').attr('value') != 168 && $('#credencialesUsuario').attr('value') != 172 )
                    Nominas.actualizarNominas();
                    callback(error);
                }
        });*/
    }

    static mostrarDatos(id){
        let url = window.location.pathname;
        let data={folioNomina:id,url}
        MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php", data,(error,respuesta)=>{
           if(error){
               console.log('Ocurrio un error: ',respuesta);
            }  
            else {
                Nominas.modalData.html(respuesta.html);
                Nominas.consecutivoNomina.text(id);

                Nominas.setup();
                

                if(window.location.pathname === "/asesores/nominas"){
                    let subtotal = Nominas.subtotalAjax.val();
                    Nominas.retencionTemporalAjax = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 0.06 );
                    Nominas.totalConRetencionTemporalAjax = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.10 );
                    Nominas.totalSinRetencionTemporalAjax = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.16 );
                }
                
               
                /***************************************************************************************/
                Nominas.botonDocumentosNominas2.hide();
                Nominas.documentosNominas2.on('click','.attachTickets2',function(){
                    Nominas.botonDocumentosNominas2.click();
                });

                Nominas.ocultarLienzoAdjuntos.hide();

                Nominas.documentosNominas2.on("dragover", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    if($(this).html() === '<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets2"><i class="fa fa-paperclip"></i> Presiona</button></h2>'){
                        $(this).html('');
                        $(this).css({"padding-left":"30px","padding-right":"30px"});
                    }
                    $(this).css({"background":"#007BFF","opacity":".6"});
                });
        
                Nominas.documentosNominas2.on("drop", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    let files = e.originalEvent.dataTransfer.files;  
                    Nominas.cargarDocumentos2(files);
                });
        
                Nominas.documentosNominas2.on("dragleave", function(e){
                    Nominas.resetDocumentos2a();
                });
        
                Nominas.botonDocumentosNominas2.change(function(e){
                    let files = e.target.files;
                    if(Nominas.documentosNominas2.html() === '<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets2"><i class="fa fa-paperclip"></i> Presiona</button></h2>'){
                        Nominas.documentosNominas2.html('');
                        Nominas.documentosNominas2.css({"padding-left":"30px","padding-right":"30px"});
                    }
                    Nominas.cargarDocumentos2(files);
                    Nominas.botonDocumentosNominas2.val('');
                });

                Nominas.documentosNominas2.on('click','.cancelDocument2',function(){
                    let eliminar = $(this).parent().children('span').text();

                    let total = eliminar.length;
                    let temp;

                    eliminar = eliminar.substring( 0, total-17 );
                    temp = Nominas.files2.filter(function(file){
                        return file.name === eliminar;
                    })[0];

                    if(temp === undefined){
                        eliminar = eliminar.substring( 0, total-18 );
                        temp = Nominas.files2.filter(function(file){
                        return file.name === eliminar;
                        })[0];
                    }

                    Nominas.files2 = Nominas.files2.filter(function(file){
                        return file.name != eliminar;
                    });

                    $(this).parent().remove();
                    if(Nominas.totalArchivos2 > 1){
                        Nominas.totalArchivos2--;
                        Nominas.totalAdjuntos2.text(Nominas.totalArchivos2);
                        Nominas.totalAdjuntosPeso2.text( Nominas.convertirAmegas(Nominas.totalArchivosAll2 -= temp.size));
                    }
                    else{
                        Nominas.resetDocumentos2b();
                        Nominas.totalAdjuntos2.text(Nominas.totalArchivos2);
                        Nominas.totalAdjuntosPeso2.text('0 MB');
                    }     
                });
                /************************************************************************************************/

                Nominas.campoActualizar.prop('disabled',true);
                Nominas.campoActualizar2.prop('disabled',true);
                Nominas.campoActualizar3.prop('disabled',true);
                Nominas.botonFormularioGuardarNominas.hide();
                Nominas.botonFormularioGuardarTesoreria.hide();
                Nominas.botonFormularioGuardarFinanzas.hide();

                Nominas.botonFormularioActualizarNominas.click(function(){
                    Nominas.botonFormularioActualizarNominas.hide();
                    Nominas.botonFormularioGuardarNominas.show();
                    Nominas.campoActualizar.prop('disabled',false);
                    Nominas.ocultarLienzoAdjuntos.show();
                    Nominas.ocultarLienzoAdjuntos2.hide();
                    if(Nominas.devengadaAjax.prop('checked'))
                        Nominas.calcularRetencionIvaAjax.prop('disabled',true);
                });

                Nominas.sinFactura.change(function(){
                   
                    if($(this).val() == 65 && Nominas.esquemasAjax.attr('value') != "PRESTAMO"){
                        $('.sin-factura-icono').css('display','none');
                        $('.sin-factura').prop('required',false);
                    }   
                    else if(Nominas.esquemasAjax.attr('value') != "PRESTAMO")   {
                        $('.sin-factura-icono').css('display','');
                        $('.sin-factura').prop('required',true);
                    }
                });

                Nominas.devengadaAjax.change(function(){
                    if($(this).prop('checked')) {
                        Nominas.ivaAjax.val('');
                        Nominas.totalAjax.val('');
                        Nominas.retencionIva6Ajax.val('');
                        Nominas.calcularRetencionIvaAjax.prop('checked',false);
                        Nominas.calcularRetencionIvaAjax.prop('disabled',true);
                        Nominas.facturaDevengadaAjax.prop('disabled',false);
                        Nominas.facturaDevengadaAjax.prop('required',true);
                        Nominas.styleFacturaDevengadaAjax.css('display','');
                    } 
                    else{
                        Nominas.ivaAjax.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(Nominas.subtotalAjax.val()),0.16 ));
                        Nominas.totalAjax.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(Nominas.subtotalAjax.val()), 1.16 ));
                        Nominas.facturaDevengadaAjax.prop('disabled',true);
                        Nominas.facturaDevengadaAjax.prop('required',false);
                        Nominas.calcularRetencionIvaAjax.prop('disabled',false);
                        Nominas.styleFacturaDevengadaAjax.css('display','none');
                        Nominas.facturaDevengadaAjax.val('');
                    }
                });

                Nominas.subtotalAjax.on('input',function(){
                    Nominas.calcularSubtotal2()
                });

                Nominas.retencionIsnAjax.on('input',function(){
                    Nominas.calcularSubtotal2();
                });

              /*  Nominas.clienteActivoAjax.change(function(){
                    Nominas.obtenerPorcentajeAjax($(this).val());
                });*/

               Nominas.botonFormularioActualizarTesoreria.click(function(){
                    Nominas.botonFormularioActualizarTesoreria.hide();
                    Nominas.botonFormularioGuardarTesoreria.show();
                    Nominas.campoActualizar3.prop('disabled',false);
                    Nominas.ocultarLienzoAdjuntos.show();
                    Nominas.ocultarLienzoAdjuntos2.hide();
                    /*if(Nominas.tesoreriaFinanciada.val() == 2)
                        Nominas.dinamico.prop('disabled', false);*/
                });

                Nominas.botonFormularioActualizarFinanzas.click(function(){
                    Nominas.botonFormularioActualizarFinanzas.hide();
                    Nominas.botonFormularioGuardarFinanzas.show();
                    Nominas.campoActualizar2.prop('disabled',false);
                    Nominas.ocultarLienzoAdjuntos.show();
                    Nominas.ocultarLienzoAdjuntos2.hide();
                });

                Nominas.formularioActualizarNominas.submit(function(e){
                    e.preventDefault();

                    if(Nominas.checkRetencionIsnAjax.prop('checked')){
                        if(!Nominas.calcularRetencionIvaAjax.prop('checked') ){
                              MetodosDiversos.mostrarRespuesta('info','Recuerda que toda nómina con retención de ISN debe tener retención de IVA','Selecciona el calculo automático del campo No. 7.-retención IVA',60000,true);
                            return;
                        }   
                    }

                    let datosFormulario = new FormData(Nominas.formularioActualizarNominas[0]); 
                    datosFormulario.append("actualizarNomina", id);

                    let total = Nominas.files2.length;
                    if(total > 0){
                        for(let i=0;i<total;i++)
                            datosFormulario.append("files"+i, Nominas.files2[i]);
                        datosFormulario.append("totalFile",total); 
                    }
                    datosFormulario.append("url",window.location.pathname) 

                    if(Nominas.devengadaAjax.prop('checked')) 
                        datosFormulario.append("devengada",Nominas.devengadaAjax.val());
                    Nominas.actualizarFormulario(datosFormulario,function(respuesta){
                        if(!respuesta){
                            Nominas.botonFormularioActualizarNominas.show();
                            Nominas.botonFormularioGuardarNominas.hide();
                            Nominas.campoActualizar.prop('disabled',true);
                            Nominas.ocultarLienzoAdjuntos.hide();
                            Nominas.ocultarLienzoAdjuntos2.show();
                            
                            Nominas.resetDocumentos2b();
                            Nominas.totalAdjuntos2.text(0);
                            Nominas.totalAdjuntosPeso2.text('0 MB');
                            
                            if(total > 0){
                                MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{archivosNominas:id,nominista:Nominas.nominista},(error,respuesta)=>{
                                    if(!error){
                                        Nominas.labelAdjuntos.text(respuesta.total);
                                        Nominas.areaAdjuntosLoad.html(respuesta.archivos);

                                        $('.botonArchivosAdjuntos').click(function(){
                                            Nominas.botonArchivosAdjuntos2(id,$(this).attr('location'));
                                        });
                                    }  
                                });
                            }

                            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{actualizarExcel:id},(error,respuesta)=>{
                                if(!error){
                                    console.log(respuesta)
                                    $('#labelTotalExcel').html(respuesta.data.archivos);
                                }  
                            });
                        }
                    });
                });

               Nominas.formularioActualizarTesoreria.submit(function(e){
                MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>','Por favor espera...',60000,false);
                    e.preventDefault();
                    let datosFormulario = new FormData(Nominas.formularioActualizarTesoreria[0]); 
                    datosFormulario.append("actualizarTesoreria", id);

                    let total = Nominas.files2.length;
                    if(total > 0){
                        for(let i=0;i<total;i++)
                            datosFormulario.append("files"+i, Nominas.files2[i]);
                        datosFormulario.append("totalFile",total); 
                    }
                    datosFormulario.append("url",window.location.pathname);

                    Nominas.actualizarFormulario(datosFormulario,function(respuesta){
                        if(!respuesta){
                            Nominas.botonFormularioActualizarTesoreria.show();
                            Nominas.botonFormularioGuardarTesoreria.hide();
                            Nominas.campoActualizar3.prop('disabled',true);
                            /*Nominas.dinamico.prop('disabled', true);*/

                            Nominas.ocultarLienzoAdjuntos.hide();
                            Nominas.ocultarLienzoAdjuntos2.show();

                            Nominas.resetDocumentos2b();

                            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{idNominaTesoreria:id},(error,respuesta)=>{
                                if(!error){
                                    Nominas.recargarTesoreriaComentarios.html(respuesta.html);
                                }  
                            });

                            if(total > 0){
                                MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{archivosTesoreria:id,nominista:Nominas.nominista},(error,respuesta)=>{
                                    if(!error){
                                        Nominas.labelAdjuntos.text(respuesta.total);
                                        Nominas.areaAdjuntosLoad.html(respuesta.archivos);

                                        $('.botonArchivosAdjuntos').click(function(){
                                            Nominas.botonArchivosAdjuntos2(id,$(this).attr('location'));
                                        });
                                    }  
                                });
                            }
                        }
                    });
                });

                Nominas.formularioActualizarFinanzas.submit(function(e){
                    e.preventDefault();
                    let datosFormulario = new FormData(Nominas.formularioActualizarFinanzas[0]); 
                    datosFormulario.append("actualizarFinanzas", id);
                    if(Nominas.financiada.prop('checked')) 
                        datosFormulario.append("finanzasFinanciada",Nominas.financiada.val());
                    if(Nominas.fondeoImss.prop('checked')) 
                        datosFormulario.append("finanzasFondeoImss",Nominas.fondeoImss.val());
                    if(Nominas.fondeoAsimilado.prop('checked')) 
                        datosFormulario.append("finanzasFondeoAsimilados",Nominas.fondeoAsimilado.val());

                    let total = Nominas.files2.length;
                    if(total > 0){
                        for(let i=0;i<total;i++)
                            datosFormulario.append("files"+i, Nominas.files2[i]);
                        datosFormulario.append("totalFile",total); 
                    }
                    datosFormulario.append("url",window.location.pathname);
                    
                    Nominas.actualizarFormulario(datosFormulario,function(respuesta){
                        if(!respuesta){
                            Nominas.botonFormularioActualizarFinanzas.show();
                            Nominas.botonFormularioGuardarFinanzas.hide();
                            Nominas.campoActualizar2.prop('disabled',true);

                            Nominas.ocultarLienzoAdjuntos.hide();
                            Nominas.ocultarLienzoAdjuntos2.show();

                            Nominas.resetDocumentos2b();

                            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{idNominaFinanzas:id},(error,respuesta)=>{
                                if(!error){
                                    Nominas.recargarFinanzasComentarios.html(respuesta.html);
                                }                          
                            });

                            if(total > 0){
                                MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{archivosFinanzas:id,nominista:Nominas.nominista},(error,respuesta)=>{
                                    if(!error){
                                        Nominas.labelAdjuntos.text(respuesta.total);
                                        Nominas.areaAdjuntosLoad.html(respuesta.archivos);

                                        $('.botonArchivosAdjuntos').click(function(){
                                            Nominas.botonArchivosAdjuntos2(id,$(this).attr('location'));
                                        });
                                    }  
                                });
                            }
                        }
                    });
                });

                /*Nominas.modalData*/
                $('#contenedorPrincipalNominas').on('click','.eliminarAdjuntoNominas',function(){
                    MetodosDiversos.crearRegistro('<i class="fa fa-trash text-red fa-3x fa-fw"></i>',`¿ Estas seguro que deseas ELIMINAR el archivo ?`,callback=>{
                        if(callback){
                            console.log(`Archivo: ${$(this).attr('name')} carpeta: ${id}`);
                            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{eliminarArchivo:$(this).attr('name'),rutaCarpeta:id},(error,respuesta)=>{
                                
                                if(error)
                                    MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
                                else 
                                {
                                    $(this).parent().parent().parent().remove();
                                    if($('.adjuntosContador').toArray().length == 0)
                                        Nominas.labelAdjuntos.text('');
                                }
                            });
                        }
                    },false);
                });

                $('#contenedorPrincipalNominas').on('click','.eliminarAdjuntoNominas2',function(){
                    MetodosDiversos.crearRegistro('<i class="fa fa-trash text-red fa-3x fa-fw"></i>',`¿ Estas seguro que deseas ELIMINAR el archivo ?`,callback=>{
                        if(callback){
                            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{eliminarArchivo2:$(this).attr('name'),rutaCarpeta:id},(error,respuesta)=>{
                                if(error)
                                    MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
                                else 
                                    $('#labelTotalExcel').html('<b><span style="font-size:20px;margin-right:10px;">0</span></b>');
                            });
                        }
                    },false);
                });

                $('#excelnominas2').change(function(e){
                    let file = e.target.files[0];
                    let valido = (/\.(?=xls|xlsx)/gi).test(file.name);
                    
                    if (!valido) {
                        $(this).val('');
                        swal("Sólo se permiten archivos", "Formato: .xls y .xlsx", "error").catch(swal.noop);
                        return;
                    }
                    $('#indicador2').html('<i class="fa fa-check-square-o fa-4x" style="color:#3c8dbc" aria-hidden="true"></i>');
                    MetodosDiversos.mostrarRespuesta("success","","",1000,false);
                });


                Nominas.botonArchivosAdjuntos.click(function(){
                    Nominas.botonArchivosAdjuntos2(id,$(this).attr('location'));
                });

               /*************************CALCULOS*******************/
                Nominas.nominasPensionAlimenticia2.on('input',function(){
                    Nominas.calcularDescuentosSys2();
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasPrestamosEmpleados2.on('input',function(){
                    Nominas.calcularDescuentosSys2();
                    Nominas.sumatoriaSys2();
                });
                
               
                Nominas.nominasExcedentePensionAlimencia2.on('input',function(){
                    Nominas.calcularDescuentosTerceros2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteClientes2.on('input',function(){
                    Nominas.calcularDescuentosTerceros2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteOtros2.on('input',function(){
                    Nominas.calcularDescuentosTerceros2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteIsr2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteImss2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteGmm2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteInfonavit2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteFonacot2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedentePrestamos2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteRecuperacion2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteComisionSocio2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedentePrenominaImss2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedentePrenominaGmm2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteCajaAhorro2.on('input',function(){
                    Nominas.calcularDescuentosAsesores2();
                    Nominas.sumatoriaAsimilados2();
                });
                

                Nominas.nominasExcedenteIngreso2.on('input',function(){
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.nominasExcedenteTerceros2.on('input',function(){
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.descuentoAyudate2.on('input',function(){
                    Nominas.sumatoriaAsimilados2();
                });


                Nominas.sindicato2.on('input',function(){
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.tarjeta_empresarial2.on('input',function(){
                    Nominas.sumatoriaAsimilados2();
                });
                Nominas.modalidad_402.on('input',function(){
                    Nominas.sumatoriaAsimilados2();
                });

                Nominas.nominasOtros2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasAjusteSubsidioEmpleo2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasPrestamosAyudate2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasExcedenteSubsidio2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasHaberes2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasDescuentoComedor2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasApoyoSindical2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasDescuentoImss2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasCajaAhorro2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasDespensa2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasCuotaSindical2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasIsr1422.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasIsrIsp2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasPrenominaImss2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasCargaSocialImss2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasImssObrera2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasComisionMontoAjax.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasCargaPatronal2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasExcedenteCargas2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasDonativo2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasFonacot2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasInfonavit2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.nominasIngreso2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.comprobacionSys2.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.impuestoEstatalAjax.on('input',function(){
                    Nominas.sumatoriaSys2();
                });
                Nominas.gastos_medicos22.on('input',function(){
                    Nominas.sumatoriaSys2();
                });

                /***************************************************************/
                
                Nominas.calcularRetencionIvaAjax.change(function(){
                    if($(this).prop('checked')) {
                        Nominas.retencionIva6Ajax.val(Nominas.retencionTemporalAjax == 0 ? '' : Nominas.retencionTemporalAjax );
                        Nominas.totalAjax.val(Nominas.totalConRetencionTemporalAjax == 0 ? '' : Nominas.totalConRetencionTemporalAjax);
                    } 
                    else{
                        Nominas.retencionIva6Ajax.val('');
                        Nominas.totalAjax.val(Nominas.totalSinRetencionTemporalAjax == 0 ? '' : Nominas.totalSinRetencionTemporalAjax);
                    }
                    Nominas.calcularIsn2();
                });

                Nominas.checkRetencionIsnAjax.change(function(){
                    if($(this).prop('checked')){
                        Nominas.retencionIsnAjax.val(Nominas.impuestoEstatalAjax.val());
                        Nominas.impuestoEstatalAjax.attr('required',true);
                        Nominas.campoRetencionObligatorioAjax.css('display','');
                    }   
                    else{
                        Nominas.retencionIsnAjax.val('');
                        Nominas.impuestoEstatalAjax.attr('required',false);
                        Nominas.campoRetencionObligatorioAjax.css('display','none');
                    }
                        
                    Nominas.calcularSubtotal2();
                });


                Nominas.impuestoEstatalAjax.on('input',function(){
                    if(Nominas.checkRetencionIsnAjax.prop('checked')){
                        let valor = parseFloat(Nominas.convertirDecimal(Nominas.impuestoEstatalAjax.val()));
                        Nominas.retencionIsnAjax.val( Nominas.mascaraMoneda(valor,1) );
                        Nominas.calcularSubtotal2(); 
                    }
                });

            }
        });
    }

    static botonArchivosAdjuntos2(id,location){
        Nominas.modalArchivosAdjuntos.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{archivosAdjuntos:id,location},(error,respuesta)=>{ 
            if(error)
                MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
            else{
                Nominas.dataArchivosAdjuntos.html(respuesta.html);
                Nominas.labelArchivosAdjuntos.text(respuesta.total);
            }
        });
    }

    static paginar(e,elemento){
        e.preventDefault();
        Nominas.recargarNominas.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        let datos = new FormData();
        datos.append("paginaActual", $(elemento).parent().attr("actual"));
        datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
        datos.append("target", $(elemento).parent().parent().attr("target"));
        datos.append("cliente", $(elemento).parent().parent().attr("cliente"));
        datos.append("nomina", $(elemento).parent().parent().attr("nomina"));
        datos.append("facturado", $(elemento).parent().parent().attr("facturado"));
        datos.append("liberado", $(elemento).parent().parent().attr("liberado"));
        datos.append("pago", $(elemento).parent().parent().attr("pago"));
        datos.append("url", window.location.pathname);
        datos.append("nominista",$(elemento).parent().parent().attr("nominista"));
        datos.append("autorizacion",$(elemento).parent().parent().attr("autorizacion"));
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", datos,(error,respuesta)=>{
            if(error){
                console.log('error',error);
            }  
            else {
                Nominas.recargarNominas.html(respuesta.html);
                Nominas.mostrarPaginador.html(respuesta.paginador);
                Nominas.totalTexto.html(respuesta.total);
                Nominas.setup();
                Nominas.paginador.click(function(x){
                    Nominas.paginar(x,$(this));
                });
                Nominas.botonMostrarData.click(function(){
                    Nominas.mostrarDatos($(this).attr('value'));
                });
            }
        });
    }

    static socketsNuevasNominas(){
        Nominas.actualizarNominas(true);
    }

    static filtros(){
        
        /*if(Nominas.filtroNominista.val() === undefined){
            Nominas.filtroNominista.val(300);
            console.log('Es indefinido');
        }
            
        console.log('valor--: ' + Nominas.filtroNominista.val());*/


        Nominas.recargarNominas.html('<div style="text-align:center"><i class="fa fa-spinner fa-pulse fa-fw" style="font-size:110px;"></i></div>');
        let datos = new FormData();
        datos.append("paginaActual", 1);
        datos.append("registrosPorPagina", Nominas.mostrarPaginador.find('ul').attr('registros'));
        datos.append("target", Nominas.mostrarPaginador.find('ul').attr('target'));
        datos.append("cliente", Nominas.filtroCliente.val());
        datos.append("facturado", Nominas.facturado);
        datos.append("liberado", Nominas.filtroObservaciones.val());
        datos.append("pago", Nominas.filtroPago.val());
        datos.append("nomina", Nominas.filtroNumeroNomina.val());
        datos.append("url", window.location.pathname);
        datos.append("nominista",Nominas.filtroNominista.val());
        datos.append("autorizacion",Nominas.filtroAutorizacion.val());
   
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", datos,(error,respuesta)=>{
            if(error)
                console.log('error',error); 
            else {
                Nominas.recargarNominas.html(respuesta.html);
                Nominas.mostrarPaginador.html(respuesta.paginador);
                Nominas.totalTexto.html(respuesta.total);
                Nominas.setup();
                Nominas.paginador.click(function(x){
                    Nominas.paginar(x,this);
                });
                Nominas.botonMostrarData.click(function(){
                    Nominas.mostrarDatos($(this).attr('value'));
                });   
            }
        });
    }

   static cargaManual(data){

        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", data,(error,respuesta)=>{
           if(error){
               MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
           }  
           else if(respuesta.alerta){
               MetodosDiversos.mostrarRespuesta('warning',respuesta.titulo,respuesta.subtitulo,30000,true);
               Nominas.actualizarNominas();
               //socket.emit('socketsNuevasNominas',null);
           }
           else{
                MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                Nominas.actualizarNominas();
                //socket.emit('socketsNuevasNominas',null);
           }

           Nominas.cargarNominas.val('');
           
           if(respuesta.log){ //si ocurrieron errores o advertencias se genera el archivo de logs
                Nominas.log(respuesta.dataLog);
            }
        });
       
       
    }

   static log(data){

        let texto = data;
      
        let textFileAsBlob = new Blob([texto], {
            type: 'text/plain;charset=utf-8'
        });

        let downloadLink = document.createElement("a");
        downloadLink.download =  "resultados.txt";
        window.URL = window.URL || window.webkitURL;
        downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
        downloadLink.onclick = Nominas.destroyClickedElement;
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    static destroyClickedElement(event) {
        document.body.removeChild(event.target);
        console.log('eliminado');
    }

    static convertirDecimal(numero){ //54,895,890.00 = 54895890.00
        if(numero == '')
            return 0;
        numero = numero.replace(/,/g,'');
        numero = numero.replace('.','');
        numero = numero.substring(0, numero.length-2) + '.' + numero.substring(numero.length-2, numero.length);
        return numero;
    }

    static mascaraMoneda(numero,constante){ //54895890.00 = 54,895,890.00 
        if(numero == null)
            return;
        let tempInput = $(document.createElement("input"));
        tempInput.val((numero * constante).toFixed(2));
        tempInput.mask('000,000,000.00', { reverse: true });
        return tempInput.val();
    }

    static obtenerPorcentaje(valor){
        MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{obtenerPorcentaje:valor},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else {
                 Nominas.nominasComision.val(respuesta.comision);
                 Nominas.comisionMonto = respuesta.comision;
                 Nominas.campoComisionMonto.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(Nominas.subtotal.val()), parseFloat(Nominas.comisionMonto/100) ) );
            }
               
        });
    }

    static obtenerPorcentajeAjax(valor){
        MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{obtenerPorcentaje:valor},(error,respuesta)=>{
            if(error)
                console.log('Ocurrio un error: ',respuesta);
            else {
                 Nominas.nominasComisionAjax.val(respuesta.comision);
                 Nominas.comisionMontoAjax = respuesta.comision;
                 Nominas.campoComisionMontoAjax.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(Nominas.subtotalAjax.val()), parseFloat(Nominas.comisionMontoAjax/100) ) );
            }
               
         });
    }

    static cargarDocumentos(files){
        Nominas.documentosNominas.css({"opacity":"1"});
        for(let i=0;i<files.length;i++ ){
            let file = files[i];
            let flag = false;

            Nominas.files.filter(function(filesave) {
                if( filesave.name == file.name){
                    flag = true
                    return filesave;
                }
            })[0];
    
            if(!flag){
                let valido = (/\.(?=pdf)/gi).test(file.name);
                if(file.name.split('.').pop() === 'xml'){
                     MetodosDiversos.mostrarRespuesta('error','Sólo puedes cargar archivos pdf','recuerda que los xml se cargan en los recibos de nómina, los comprobantes bancarios del cliente deben estar conformados exclusivamente por archivos pdf',30000,true);
                     Nominas.reloadContadores();
                     return;
                }
                if (!valido) {
                    MetodosDiversos.mostrarRespuesta('error','Formato de archivo no valido','Sólo puedes cargar archivos pdf',30000,true);
                    Nominas.reloadContadores();
                    return;
                }
                    
                if (file.size > Nominas.fileSizeLimit * 1024 * 1024){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo permitido de MB por archivo','El tamaño máximo permito por cada archivo pdf es de 25 MB)',30000,true);
                    Nominas.reloadContadores();
                    return
                }

                if(Nominas.totalArchivosAll + file.size  > Nominas.totalMaximo){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
                    Nominas.reloadContadores();
                    return
                }
                    
                Nominas.documentosNominas.append('<li><span>'+file.name+'</span><span class="close2 cancelDocument" aria-hidden="true" style="margin-right:2px;"><i class="fa fa-times fa-lg" style="color:#fff;" aria-hidden="true"></i></span><span style="color:#fff;margin-right:40px;float:right;font-weight: 700;">'+' Tamaño: ' + Nominas.convertirAmegas(file.size) +' </span></li>');
                Nominas.totalArchivosAll += file.size;
                ++Nominas.totalArchivos;
                Nominas.files.push(file);  
            }  
        }
        
        Nominas.reloadContadores();
       
    }

    static reloadContadores(){
        Nominas.totalAdjuntos.text(Nominas.totalArchivos);
        Nominas.totalAdjuntosPeso.text( Nominas.convertirAmegas(Nominas.totalArchivosAll));
        Nominas.resetDocumentos();
    }

    static formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
    
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    
        const i = Math.floor(Math.log(bytes) / Math.log(k));
    
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    static convertirAmegas(peso){
        return (peso / 1024 / 1024).toFixed(2) + ' MB';
    }

    static cargarDocumentos2(files){
        Nominas.documentosNominas2.css({"opacity":"1"});
        for(let i=0;i<files.length;i++ ){
            let file = files[i];
            let flag = false;
            
            Nominas.files2.filter(function(filesave) {
                if( filesave.name == file.name){
                    flag = true
                    return filesave;
                }
            })[0];
    
            if(!flag){
                let valido = (/\.(?=pdf)/gi).test(file.name);
                if(file.name.split('.').pop() === 'xml'){
                    MetodosDiversos.mostrarRespuesta('error','Sólo puedes cargar archivos pdf','recuerda que los xml se cargan en los recibos de nómina, los comprobantes bancarios del cliente deben estar conformados exclusivamente por archivos pdf',30000,true);
                    return;
                }
                if (!valido){
                    MetodosDiversos.mostrarRespuesta('error','Formato de archivo no valido','Sólo puedes cargar archivos pdf',30000,true);
                    Nominas.reloadContadores();
                    return;
                }
                   
                if (file.size > Nominas.fileSizeLimit * 1024 * 1024){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo permitido de MB por archivo','El tamaño máximo permito por cada archivo pdf es de 25 MB)',30000,true);
                    Nominas.reloadContadores();
                    return
                }
                    
                if(Nominas.totalArchivosAll2 + file.size  > Nominas.totalMaximo){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
                    Nominas.reloadContadores();
                    return
                }
                
                Nominas.documentosNominas2.append('<li><span>'+file.name+'</span><span class="close2 cancelDocument2" aria-hidden="true" style="margin-right:2px;"><i class="fa fa-times fa-lg" style="color:#fff;" aria-hidden="true"></i></span><span style="color:#fff;margin-right:40px;float:right;font-weight: 700;">'+' Tamaño: ' + Nominas.convertirAmegas(file.size) +' </span></li>');
                Nominas.totalArchivosAll2 += file.size;
                ++Nominas.totalArchivos2;
                Nominas.files2.push(file);
                 
            }  
        }

        Nominas.reloadContadores2();
    }

    static reloadContadores2(){
        Nominas.totalAdjuntos2.text(Nominas.totalArchivos2);
        Nominas.totalAdjuntosPeso2.text( Nominas.convertirAmegas(Nominas.totalArchivosAll2));
        Nominas.resetDocumentos2a();
    }
 
    static resetDocumentos(){ 
        if(Nominas.documentosNominas.html() === ""){
            Nominas.documentosNominas.html('<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets"><i class="fa fa-paperclip"></i> Presiona</button></h2>');
            Nominas.documentosNominas.css({"padding-left":"0","padding-right":"0"});
            Nominas.documentosNominas.css({"opacity":"1"});
        }
        else
            Nominas.documentosNominas.css({"opacity":"1"});
    }

    static resetDocumentos2a(){ 
        if(Nominas.documentosNominas2.html() === ""){
            Nominas.documentosNominas2.html('<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets2"><i class="fa fa-paperclip"></i> Presiona</button></h2>');
            Nominas.documentosNominas2.css({"padding-left":"0","padding-right":"0"});
            Nominas.documentosNominas2.css({"opacity":"1"});
        }
        else
            Nominas.documentosNominas2.css({"opacity":"1"});
    }

    static resetDocumentos2(){
        Nominas.documentosNominas.html('<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets"><i class="fa fa-paperclip"></i> Presiona</button></h2>');
        Nominas.documentosNominas.css({"padding-left":"0","padding-right":"0"});
        Nominas.totalArchivos = 0;
        Nominas.totalArchivosAll = 0;
        Nominas.files = [];
        Nominas.totalAdjuntos.text(0)
        Nominas.totalAdjuntosPeso.text('0 MB');
        $('#indicador').html('<i class="fa fa-square-o fa-4x" style="color:#3c8dbc;margin-right:8px;" aria-hidden="true"></i>');
    }

    static resetDocumentos2b(){
        Nominas.documentosNominas2.html('<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets2"><i class="fa fa-paperclip"></i> Presiona</button></h2>');
        Nominas.documentosNominas2.css({"padding-left":"0","padding-right":"0"});
        Nominas.totalArchivos2 = 0;
        Nominas.totalArchivosAll2 = 0;
        Nominas.files2 = [];
        Nominas.totalAdjuntos2.text(0)
        Nominas.totalAdjuntosPeso2.text('0 MB');
    }

    static eliminarRegistros(){
        let texto = Nominas.idAeliminar.length > 1 ? 'nóminas' : 'nómina';
        MetodosDiversos.crearRegistro('<i class="fa fa-trash text-red fa-3x fa-fw"></i>',`¿ Estas seguro que deseas ELIMINAR: ${Nominas.idAeliminar.length} ${texto} ?`,callback=>{
            if(callback){
                MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{dataEliminar:JSON.stringify(Nominas.idAeliminar)},(error,respuesta)=>{
                    if(error)
                        console.log('Ocurrio un error: ',respuesta);
                    else 
                    {
                        Nominas.actualizarNominas();  
                        Nominas.idAeliminar = [];
                        Nominas.eliminarMasivo.prop('checked',false);
                    }
                });
            }
        },false);
    }

    static liberarRegistros(){
        let texto = Nominas.idLiberar.length > 1 ? 'nóminas' : 'nómina';
        MetodosDiversos.crearRegistro('<i class="fa fa-check-square-o text-green fa-3x fa-fw"></i>',`¿ Estas seguro que deseas AUTORIZAR: ${Nominas.idLiberar.length} ${texto} ?`,callback=>{
            if(callback){
                MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{dataLiberar:JSON.stringify(Nominas.idLiberar)},(error,respuesta)=>{
                    if(error)
                        console.log('Ocurrio un error: ',respuesta);
                    else 
                    {
                        Nominas.actualizarNominas();  
                        Nominas.idLiberar = [];
                        Nominas.autorizarMasivo.prop('checked',false);
                    }
                });
            }
        },false);
    }

    static cargarMasivos(data){

        swal({title: '<input type="text" id="progressBar" value="0" data-width="120" data-height="120" data-fgColor="#f56954"><br><div class="knob-label" id="loaded_n_total"></div>',text: ' Por favor espere... ',type: '',showConfirmButton: false,allowOutsideClick: false});
        
        $("#progressBar").knob({
            change : function (value) {
            }
        });

        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", Nominas.progressHandler, false);
        ajax.addEventListener("load", function(e){
            let respuesta = e.loaded;
            if(parseInt(respuesta) === 0)
                MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
            else{
                let respuesta = JSON.parse(e.srcElement.response);
                MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
            }
                
        }, false);
        ajax.addEventListener("error", Nominas.errorHandler, false);
        ajax.addEventListener("abort", Nominas.abortHandler, false);
        ajax.open("POST", "controllers/AjaxNominas.php");
        ajax.send(data);

        /*MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", data,(error,respuesta)=>{
            console.log(respuesta);
            if(error)
                console.log(respuesta);
            else
                MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,60000,true);
        });*/
    }

    static verificarCargaNomina(){
        Nominas.formulario.css('visibility','hidden');
        swal({
            title: 'Escibe el número de nómina vinculado a este proceso',
            text: '',
            input: 'text',
            inputPlaceholder: ''
        }).then(function (valor) {
            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{idNominaCargar:valor},(error,respuesta)=>{
                if(error)
                    MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','contacta al administrador',60000,true);
                else {
                    if(respuesta.data==''){
                        MetodosDiversos.mostrarRespuesta('error','Verifica el número de nómina','El número de nómina no existe, la nómina no tiene el concepto pagada con observación (departamento de tesoreria) o no tienes permisos para esa nómina',60000,true);
                        Nominas.esquemas.val('');
                    }   
                    else{
                        Nominas.formulario.css('visibility','');
                        Nominas.cargarData(respuesta.data);
                    }
                }     
            });
        }).catch(function(){});
    }

    static cargarData(data){
        Nominas.validacionCambioEsquemas(parseInt(data.esquema));
        let label = '';
        if(data.esquema == 1)
            label='ASIMILADOS';
        else if(data.esquema == 2)
            label='MIXTO';
        else if(data.esquema == 3)
            label='SINDICATOS';
        else if(data.esquema == 4)
            label='SUELDOS Y SALARIOS';
        else if(data.esquema == 5)
            label='TARJETA EMPRESARIAL';
        else if(data.esquema == 6)
            label='PRESTAMO';
        else if(data.esquema == 7)
            label='CONFIDENCIAL';

        Nominas.numeroNominaOrigen=data.id;
        Nominas.cargarNumeroNomina.html('<div class="row" style="margin-bottom:10px;">'+
                                            '<div class="col-md-6">'+
                                                '<span><b>Número de nómina origen:</b> <span class="textoMay"><span style="font-size:15px;background:#00a65a;padding:5px;color:#fff;border-radius:5px;">'+data.id+' </span></span></span>'+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                                '<span><b>Tipo de esquema de nómina origen:</b> <span class="textoMay"><span style="font-size:15px;background:#00a65a;padding:5px;color:#fff;border-radius:5px;">'+label+' </span></span></span>'+
                                            '</div>'+
                                        '</div>');

        if(data.esquema == 3){
            Nominas.tipoSindicato.html('<div class="row form-group rowColorGray">'+
                                            '<div class="col-md-12">'+
                                                '<label for="">A.-Pagadora sindicato:</label> '+
                                                    '<i class="fa fa-check-circle text-green"></i>'+
                                                    '<div class="input-group">'+
                                                        '<div class="input-group-addon">'+
                                                            '<i class="fa fa-list-ol"></i>'+
                                                        '</div>'+
                                                        '<select class="form-control textoMay iluminarIconoInput" name="tipoSindicato" required>'+
                                                            '<option value=""></option>'+
                                                            '<option value="1">SINDICATO ASESORES / CROM</option>'+
                                                            '<option value="2">SINDICATO BUDAPEST</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                            ' </div>'+
                                        '</div>'); 
            $('select[name="tipoSindicato"]').val(data.tipo_sindicato);
        }

        if(parseInt(data.devengada))
            Nominas.devengada.prop('checked',true);
        else
            Nominas.devengada.prop('checked',false);


        Nominas.nominasCliente.val(data.id_cliente);
        Nominas.nominasTipoPago.val(data.tipo_pago);
        Nominas.nominasRegimen.val(data.regimen);
        Nominas.nominasComision.val(Nominas.mascaraMoneda(data.comision_porcentaje,1));
        Nominas.nominasEmpresaFactura.val(data.empresa_facturadora);
        Nominas.nominasSubtotal.val(Nominas.mascaraMoneda(data.subtotal,1));
        Nominas.nominasIva.val(Nominas.mascaraMoneda(data.iva,1));
        Nominas.nominasTotal.val(Nominas.mascaraMoneda(data.total,1));
        Nominas.nominasEmpresaImss.val(data.empresa_imss);
        Nominas.nominasTotalImss.val(Nominas.mascaraMoneda(data.total_imss,1));
        Nominas.nominasEmpresaAsimilados.val(data.empresa_asimilados);
        Nominas.nominasTotalAsimilados.val(Nominas.mascaraMoneda(data.total_asimilados,1));
        Nominas.nominasPeriodo.val(data.tipo_periodo);
        Nominas.nominasNumeroPeriodo.val(data.numero_periodo);
        Nominas.nominasSocios.val(data.socios);
        Nominas.nominasDescuentosSys.val(Nominas.mascaraMoneda(data.descuentos_sys,1))
        Nominas.nominasDescuentosAsesores.val(Nominas.mascaraMoneda(data.descuentos_asesores,1))
        Nominas.nominasDescuentosTerceros.val(Nominas.mascaraMoneda(data.descuentos_terceros,1))
        Nominas.retencionIva.val(Nominas.mascaraMoneda(data.retencion_iva,1))

        Nominas.nominasIngreso.val(Nominas.mascaraMoneda(data.ingreso,1));
        Nominas.nominasInfonavit.val(Nominas.mascaraMoneda(data.infonavit,1));
        Nominas.nominasFonacot.val(Nominas.mascaraMoneda(data.fonacot,1));
        Nominas.nominasDonativo.val(Nominas.mascaraMoneda(data.donativo,1));
        Nominas.nominasPensionAlimenticia.val(Nominas.mascaraMoneda(data.pension,1));
        Nominas.nominasExcedenteCargas.val(Nominas.mascaraMoneda(data.excedente_cargas,1));
        Nominas.nominasCargaPatronal.val(Nominas.mascaraMoneda(data.cargas_patronal,1));
        Nominas.nominasIsn.val(Nominas.mascaraMoneda(data.isn,1));
        Nominas.nominasComisionMonto.val(Nominas.mascaraMoneda(data.comision_monto,1));
        Nominas.nominasImssObrera.val(Nominas.mascaraMoneda(data.imss_obrera,1));
        Nominas.nominasCargaSocialImss.val(Nominas.mascaraMoneda(data.carga_social_imss,1));
        Nominas.nominasPrenominaImss.val(Nominas.mascaraMoneda(data.prenomina_imss,1));
        Nominas.nominasIsrIsp.val(Nominas.mascaraMoneda(data.isr_isp,1));
        Nominas.nominasIsr142.val(Nominas.mascaraMoneda(data.isr_142,1));
        Nominas.nominasCuotaSindical.val(Nominas.mascaraMoneda(data.cuota_sindical,1));
        Nominas.nominasDespensa.val(Nominas.mascaraMoneda(data.despensa,1));
        Nominas.nominasCajaAhorro.val(Nominas.mascaraMoneda(data.caja_ahorro,1));
        Nominas.nominasDescuentoImss.val(Nominas.mascaraMoneda(data.descuento_imss,1));
        Nominas.nominasApoyoSindical.val(Nominas.mascaraMoneda(data.apoyo_sindical,1));
        Nominas.nominasDescuentoComedor.val(Nominas.mascaraMoneda(data.descuento_comedor,1));
        Nominas.nominasHaberes.val(Nominas.mascaraMoneda(data.haberes,1));
        Nominas.nominasExcedenteSubsidio.val(Nominas.mascaraMoneda(data.excedente_subsidio,1));
        Nominas.nominasPrestamosEmpleados.val(Nominas.mascaraMoneda(data.prestamos_empleados,1));
        Nominas.nominasPrestamosAyudate.val(Nominas.mascaraMoneda(data.prestamos_ayudate,1));
        Nominas.nominasOtros.val(Nominas.mascaraMoneda(data.otros,1));

        
        Nominas.nominasExcedenteIngreso.val(Nominas.mascaraMoneda(data.excedente_ingreso,1));
        Nominas.nominasExcedenteTerceros.val(Nominas.mascaraMoneda(data.excedente_terceros,1));
        Nominas.nominasExcedenteIsr.val(Nominas.mascaraMoneda(data.excedente_isr,1));
        Nominas.nominasExcedenteImss.val(Nominas.mascaraMoneda(data.excedente_imss,1));
        Nominas.nominasExcedenteGmm.val(Nominas.mascaraMoneda(data.excedente_gmm,1));
        Nominas.nominasExcedenteInfonavit.val(Nominas.mascaraMoneda(data.excedente_infonavit,1));
        Nominas.nominasExcedenteFonacot.val(Nominas.mascaraMoneda(data.excedente_fonacot,1));
        Nominas.nominasExcedentePrestamos.val(Nominas.mascaraMoneda(data.excedente_prestamos,1));
        Nominas.nominasExcedentePensionAlimencia.val(Nominas.mascaraMoneda(data.excedente_pension,1));
        Nominas.nominasExcedenteIngresosSinTimbrar.val(Nominas.mascaraMoneda(data.excedente_terceros,1));
        Nominas.nominasExcedenteClientes.val(Nominas.mascaraMoneda(data.excedente_clientes,1));
       
        Nominas.nominasExcedenteRecuperacion.val(Nominas.mascaraMoneda(data.excedente_recuperacion,1));
        Nominas.nominasExcedenteComisionSocio.val(Nominas.mascaraMoneda(data.excedente_comision,1));
        Nominas.nominasExcedentePrenominaImss.val(Nominas.mascaraMoneda(data.excedente_prenomina,1));
        Nominas.nominasExcedentePrenominaGmm.val(Nominas.mascaraMoneda(data.excedente_prenomina_gmm,1));
        Nominas.nominasExcedenteCajaAhorro.val(Nominas.mascaraMoneda(data.excedente_caja_ahorro,1));
        Nominas.nominasExcedenteOtros.val(Nominas.mascaraMoneda(data.excedente_otros,1));
        Nominas.nominasComentarios.val(data.comentarios_nominas.replace(/<br \/>/gi, ""));


        let subtotal = data.subtotal;
        Nominas.retencionTemporal = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 0.06 );
        Nominas.totalConRetencionTemporal = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.10 );
        Nominas.totalSinRetencionTemporal = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.16 );

        if(data.retencion_iva != null)
            Nominas.calcularRetencionIva.prop('checked', true);

    }

    static calcularDescuentosSys(){
        let total = 
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPensionAlimenticia.val())) + 
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrestamosEmpleados.val()));
        if(total > 0)
            Nominas.nominasDescuentosSys.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.nominasDescuentosSys.val('');
    }

    static calcularDescuentosSys2(){
        let total = 
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPensionAlimenticia2.val())) + 
        parseFloat(Nominas.convertirDecimal(Nominas.nominasPrestamosEmpleados2.val()));
        if(total > 0)
            Nominas.nominasDescuentosSys2.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.nominasDescuentosSys2.val('');
        
    }

    static calcularDescuentosAsesores(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteIsr.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteGmm.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteInfonavit.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteFonacot.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrestamos.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteRecuperacion.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteComisionSocio.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaImss.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaGmm.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteCajaAhorro.val()));
        if(total > 0)
            Nominas.nominasDescuentosAsesores.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.nominasDescuentosAsesores.val('');
    }

    static calcularDescuentosAsesores2(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteIsr2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteGmm2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteInfonavit2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteFonacot2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrestamos2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteRecuperacion2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteComisionSocio2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaImss2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePrenominaGmm2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteCajaAhorro2.val()));
        if(total > 0)
            Nominas.nominasDescuentosAsesores2.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.nominasDescuentosAsesores2.val('');
    }

    static calcularDescuentosTerceros(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePensionAlimencia.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteClientes.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteOtros.val()));
        if(total > 0)
            Nominas.nominasDescuentosTerceros.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.nominasDescuentosTerceros.val('');
    }

    static calcularDescuentosTerceros2(){
        let total =
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedentePensionAlimencia2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteClientes2.val())) +
        parseFloat(Nominas.convertirDecimal(Nominas.nominasExcedenteOtros2.val()));
        if(total > 0)
            Nominas.nominasDescuentosTerceros2.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.nominasDescuentosTerceros2.val('');
    }

    static calcularSubtotal(){
        if(Nominas.devengada.prop('checked'))
                return;
            let subtotal = Nominas.subtotal.val();
            if(subtotal != ""){
                Nominas.iva.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal),0.16 ));
                Nominas.retencionTemporal = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 0.06 );
                Nominas.totalConRetencionTemporal = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.10 );
                Nominas.totalSinRetencionTemporal = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.16 );
                if(Nominas.calcularRetencionIva.prop('checked')){
                    Nominas.total.val(Nominas.totalConRetencionTemporal);
                    Nominas.retencionIva6.val(Nominas.retencionTemporal);
                }
                else
                    Nominas.total.val(Nominas.totalSinRetencionTemporal);
                Nominas.calcularIsn();
            }
            else{
                Nominas.iva.val('');
                Nominas.total.val('');
                Nominas.retencionIva6.val('');
                Nominas.retencionTemporal = 0;
                Nominas.totalConRetencionTemporal = 0
                Nominas.totalSinRetencionTemporal = 0;
            }
    }

    static calcularSubtotal2(){
        if(Nominas.devengadaAjax.prop('checked'))
        return;
        let subtotal = Nominas.subtotalAjax.val();
        if(subtotal != ''){
            Nominas.ivaAjax.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal),0.16 ));
            Nominas.retencionTemporalAjax = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 0.06 );
            Nominas.totalConRetencionTemporalAjax = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.10 );
            Nominas.totalSinRetencionTemporalAjax = Nominas.mascaraMoneda( Nominas.convertirDecimal(subtotal), 1.16 );
            if(Nominas.calcularRetencionIvaAjax.prop('checked')){
                Nominas.totalAjax.val(Nominas.totalConRetencionTemporalAjax);
                Nominas.retencionIva6Ajax.val(Nominas.retencionTemporalAjax);
            }
            else
                Nominas.totalAjax.val(Nominas.totalSinRetencionTemporalAjax);
            Nominas.calcularIsn2();
        }
        else{
            Nominas.ivaAjax.val('');
            Nominas.totalAjax.val('');
            Nominas.retencionIva6Ajax.val('');
            Nominas.retencionTemporalAjax = 0;
            Nominas.totalConRetencionTemporalAjax = 0
            Nominas.totalSinRetencionTemporalAjax = 0;
        }    
    }

    static calcularIsn(){
        let total = 
        parseFloat(Nominas.convertirDecimal(Nominas.total.val())) -
        parseFloat(Nominas.convertirDecimal(Nominas.retencionIsn.val()));
        if(total > 0)
            Nominas.total.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.total.val('');
    }

    static calcularIsn2(){
        let total = 
        parseFloat(Nominas.convertirDecimal(Nominas.totalAjax.val())) -
        parseFloat(Nominas.convertirDecimal(Nominas.retencionIsnAjax.val()));
        if(total > 0)
            Nominas.totalAjax.val( Nominas.mascaraMoneda(total,1) );
        else
            Nominas.totalAjax.val('');
    }

    static main(){

        Nominas.setup();
        Nominas.eliminarNominas = $('#eliminarNominas');
        Nominas.idAeliminar = Array();
        Nominas.liberarNominas = $('#liberarNominas');
        Nominas.idLiberar = Array();
        Nominas.totalMaximo = 50 * 1024 * 1024;
        Nominas.retencionTemporal = 0;
        Nominas.totalConRetencionTemporal = 0;
        Nominas.totalSinRetencionTemporal = 0;
        Nominas.campoRetencionObligatorio = $('.campoRetencionObligatorio');

        Nominas.valorInicialNominista = Nominas.filtroNominista.val();
        
        $('#contenedorPrincipalNominas').on('click','.visor-pdf-crow-nominas',function(){
            mostrarVisorCrowPdf($(this));
        });

        if(window.location.pathname === "/asesores/finanzas")
            Nominas.filtroObservaciones.val(1);
        else if(window.location.pathname === "/asesores/tesoreria"){
            //Nominas.filtroObservaciones.val(2);
            Nominas.filtroPago.val(1);
            //Nominas.filtroAutorizacion.val(1);
        }
        else if(window.location.pathname === "/asesores/nominas"){
            Nominas.filtroAutorizacion.val(0);
        }

           
        Nominas.formulario.css('visibility','hidden');

        Nominas.esquemas.change(function(){
            Nominas.numeroNominaOrigen=null;
            Nominas.botonNominaPrimaria.attr('disabled',false);
            if ($(this).val() != "" && $(this).val() != 8){
                Nominas.formulario.css('visibility','');
                Nominas.validacionCambioEsquemas(parseInt($(this).val()));
            }
            else if ($(this).val() == 8){
               Nominas.verificarCargaNomina();
            }
            else
                Nominas.formulario.css('visibility','hidden');
        });

        socket.on('nuevasNominasCreadas', function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{grupoAjax:true},(error,respuesta)=>{
                if(error)
                    console.log('Ocurrio un error: ',respuesta);
                else if(respuesta.validacion)
                    Nominas.socketsNuevasNominas();
            });
        });

        Nominas.paginador.click(function(e){
            Nominas.paginar(e,this);
        });

        Nominas.formulario.submit(function(e){
            e.preventDefault();

            let datosFormulario = new FormData(Nominas.formulario[0]); 
            datosFormulario.append("tipoEsquema", Nominas.esquemas.val());
            if(Nominas.devengada.prop('checked')) 
                datosFormulario.append("devengada",Nominas.devengada.val());
            if(Nominas.numeroNominaOrigen != null)
                datosFormulario.append("nomina_origen",Nominas.numeroNominaOrigen);

            let total = Nominas.files.length;

            if(total > 0){
                for(let i=0;i<total;i++)
                    datosFormulario.append("files"+i, Nominas.files[i]);
                datosFormulario.append("totalFile",total); 
            }

            datosFormulario.append("url",window.location.pathname);

            if(Nominas.checkRetencionIsn.prop('checked')){
                if(!Nominas.calcularRetencionIva.prop('checked') ){
                      MetodosDiversos.mostrarRespuesta('info','Recuerda que toda nómina con retención de ISN debe tener retención de IVA','Selecciona el calculo automático del campo No. 7.-retención IVA',60000,true);
                    return;
                }   
            }
            Nominas.botonNominaPrimaria.attr('disabled',true);
            Nominas.enviarFormulario(datosFormulario);
        });

        Nominas.cancelar.click(function(){
            Nominas.formulario[0].reset();
            Nominas.files = [];
            Nominas.numeroNominaOrigen=null;
            Nominas.resetDocumentos2();
            Nominas.cargarNumeroNomina.html('');
            Nominas.formulario.css('visibility','hidden');
            Nominas.esquemas.val('');
            Nominas.retencionTemporal = 0;
            Nominas.totalConRetencionTemporal = 0;
            Nominas.totalSinRetencionTemporal = 0;
            $('html,body').animate({
                scrollTop: $('#credencialesUsuario').offset().top
            }, 300);
        });

        Nominas.subtotal.on('input',function(){
            Nominas.calcularSubtotal();
        });


        /*Nominas.retencionIsn.on('input',function(){
            Nominas.calcularSubtotal();
        });*/

        Nominas.impuestoEstatal.on('input',function(){
            if(Nominas.checkRetencionIsn.prop('checked')){
                let valor = parseFloat(Nominas.convertirDecimal(Nominas.impuestoEstatal.val()));
                Nominas.retencionIsn.val( Nominas.mascaraMoneda(valor,1) );
                Nominas.calcularSubtotal();
               
            }
        });

        Nominas.checkRetencionIsn.change(function(){
            if($(this).prop('checked')) {
                Nominas.retencionIsn.val(Nominas.impuestoEstatal.val());
                Nominas.campoRetencionObligatorio.css('display','');
                Nominas.impuestoEstatal.attr('required',true);
            } 
            else{
                 Nominas.retencionIsn.val('');
                 Nominas.campoRetencionObligatorio.css('display','none');
                 Nominas.impuestoEstatal.attr('required',false);
            }
               
            Nominas.calcularSubtotal();
        });

        /*Nominas.clienteActivo.change(function(){
            Nominas.obtenerPorcentaje($(this).val());
        });*/

        Nominas.botonMostrarData.click(function(){
            Nominas.mostrarDatos($(this).attr('value'));
        });

        Nominas.botonActualizarNominas.click(function(){
            Nominas.actualizarNominas();
        });

       Nominas.filtroCliente.change(function(){
            Nominas.filtros();
        });

        Nominas.filtroNumeroNomina.on('input',function(){
            Nominas.filtros();
        });

        Nominas.filtroFacturado.on('input',function(){
            if($(this).val().length > 1){
                Nominas.facturado = Nominas.convertirDecimal($(this).val()); 
            }
            else
                Nominas.facturado="";
            
            Nominas.filtros();
        });

       Nominas.filtroObservaciones.change(function(){
            Nominas.filtros();
        });

        Nominas.filtroPago.change(function(){
            Nominas.filtros();
        });

        Nominas.filtroNominista.on('input',function(){
            Nominas.filtros();
        });

        Nominas.filtroAutorizacion.change(function(){
            Nominas.filtros();
        });



        Nominas.cargarNominas.change(function(e){

            swal({
                title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                text: ' Por favor espere...',
                type: '',
                showConfirmButton: false,
                allowOutsideClick: false
            });

            let file = e.target.files[0];
            let valido = (/\.(?=xlsx)/gi).test(file.name);
            
            if (!valido) {
                Nominas.cargarNominas.val('');
                swal("Formato no válido", "Formatos válido: .xlsx", "error").catch(swal.noop);
                return;
            }

            let formulario = new FormData (Nominas.formularioCargarNominasManual[0]);
            formulario.append("cargaManual",window.location.pathname);
            Nominas.cargaManual(formulario);
        });

        /*Nominas.formularioCargarNominasManual.submit(function(e){
            e.preventDefault();
            let formulario = new FormData (Nominas.formularioCargarNominasManual[0]);
            formulario.append("cargaManual",window.location.pathname);
            Nominas.cargaManual(formulario);
        });*/

        Nominas.info.click(function(){
            swal($(this).parent().parent().children('label').text(),$(this).attr('info'), "info").catch(swal.noop);
        });

        Nominas.sinFactura.change(function(){
            if($(this).val() == 65 &&  parseInt(Nominas.esquemas.val()) < 6){
                $('.sin-factura-icono').css('display','none');
                $('.sin-factura').prop('required',false);
            }   
            else if( parseInt(Nominas.esquemas.val()) < 6) {
                $('.sin-factura-icono').css('display','');
                $('.sin-factura').prop('required',true);
            }
        });

        Nominas.devengada.change(function(){
            if($(this).prop('checked')) {
                Nominas.iva.val('');
                Nominas.total.val('');
                Nominas.retencionIva6.val('');
                Nominas.calcularRetencionIva.prop('checked',false);
                Nominas.calcularRetencionIva.prop('disabled',true);
                Nominas.facturaDevengada.prop('disabled',false);
                Nominas.facturaDevengada.prop('required',true);
                Nominas.styleFacturaDevengada.css('display','');
            } 
            else{
                Nominas.iva.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(Nominas.subtotal.val()),0.16 ));
                Nominas.total.val(Nominas.mascaraMoneda( Nominas.convertirDecimal(Nominas.subtotal.val()), 1.16 ));
                Nominas.calcularRetencionIva.prop('disabled',false);
                Nominas.facturaDevengada.prop('disabled',true);
                Nominas.facturaDevengada.prop('required',false);
                Nominas.styleFacturaDevengada.css('display','none');
                Nominas.facturaDevengada.val('');
            }
        });


        Nominas.calcularRetencionIva.change(function(){
            if($(this).prop('checked')) {
                Nominas.retencionIva6.val(Nominas.retencionTemporal == 0 ? '' : Nominas.retencionTemporal);
                Nominas.total.val(Nominas.totalConRetencionTemporal == 0 ? '' : Nominas.totalConRetencionTemporal);
            } 
            else{
                Nominas.retencionIva6.val('');
                Nominas.total.val(Nominas.totalSinRetencionTemporal == 0 ? '' : Nominas.totalSinRetencionTemporal);
            }
            Nominas.calcularIsn();
        });

        $('body').on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
        });
        $('body').on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
        });

        Nominas.botonDocumentosNominas.hide();

        Nominas.documentosNominas.on('click','.attachTickets',function(){
            Nominas.botonDocumentosNominas.click();
        });


        Nominas.documentosNominas.on("dragover", function(e){
            e.preventDefault();
            e.stopPropagation();
            if($(this).html() === '<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets"><i class="fa fa-paperclip"></i> Presiona</button></h2>'){
                $(this).html('');
                $(this).css({"padding-left":"30px","padding-right":"30px"});
            }
            $(this).css({"background":"#007BFF","opacity":".6"});
        });

	    Nominas.documentosNominas.on("drop", function(e){
            e.preventDefault();
            e.stopPropagation();
            let files = e.originalEvent.dataTransfer.files;  
            Nominas.cargarDocumentos(files);
        });

        Nominas.documentosNominas.on("dragleave", function(e){
            Nominas.resetDocumentos();
        });

        Nominas.botonDocumentosNominas.change(function(e){
            let files = e.target.files;
            if(Nominas.documentosNominas.html() === '<h2>Arrastra y suelta los archivos que desees adjuntar o <button type="button" class="btn btn-default attachTickets"><i class="fa fa-paperclip"></i> Presiona</button></h2>'){
                Nominas.documentosNominas.html('');
                Nominas.documentosNominas.css({"padding-left":"30px","padding-right":"30px"});
            }
            Nominas.cargarDocumentos(files);
            Nominas.botonDocumentosNominas.val('');
        });

        Nominas.documentosNominas.on('click','.cancelDocument',function(){
            let eliminar = $(this).parent().children('span').text();

            let total = eliminar.length;
            let temp;

            eliminar = eliminar.substring( 0, total-17 );
            temp = Nominas.files.filter(function(file){
                return file.name === eliminar;
            })[0];

            if(temp === undefined){
                eliminar = eliminar.substring( 0, total-18 );
                temp = Nominas.files.filter(function(file){
                return file.name === eliminar;
                })[0];
            }

            Nominas.files = Nominas.files.filter(function(file){
                return file.name !== eliminar;
            });

            $(this).parent().remove();
            if(Nominas.totalArchivos > 1){
                Nominas.totalArchivos--;
                Nominas.totalAdjuntos.text(Nominas.totalArchivos);
                Nominas.totalAdjuntosPeso.text( Nominas.convertirAmegas(Nominas.totalArchivosAll -= temp.size));
            }
            else{
                Nominas.resetDocumentos2();
                Nominas.totalAdjuntos.text(0);
                Nominas.totalAdjuntosPeso.text('0 MB');
            }
               
        });

        Nominas.recargarNominas.on('click','.grupoCheckedNominas',function(){
            let id = parseInt($(this).parent().parent().siblings('span').text());
            if($(this).prop('checked'))
                Nominas.idAeliminar.push(id);
            else{
                Nominas.idAeliminar = Nominas.idAeliminar.filter(function(nomina){
                    return nomina != id;
                });
            }
        });

        Nominas.eliminarNominas.click(function(){
            let total = Nominas.idAeliminar.length;
            if(total < 1)
                swal('<i class="fa fa-trash text-red fa-3x fa-fw"></i>','Selecciona las nóminas a eliminar (sólo puedes seleccionar las que tú registraste o las de tu personal a cargo).', "").catch(swal.noop);
            else
                Nominas.eliminarRegistros();
        });

        Nominas.recargarNominas.on('click','.grupoCheckedNominas2',function(){
            let id = parseInt($(this).parent().parent().siblings('span').text());
            if($(this).prop('checked'))
                Nominas.idLiberar.push(id);
            else{
                Nominas.idLiberar = Nominas.idLiberar.filter(function(nomina){
                    return nomina != id;
                });
            }
        });

        Nominas.liberarNominas.click(function(){
            let total = Nominas.idLiberar.length;
            if(total < 1)
                swal('<i class="fa fa-check-square-o text-green fa-3x fa-fw"></i>','Selecciona las nóminas a autorizar (sólo puedes seleccionar las que tú registraste o las de tu personal a cargo).', "").catch(swal.noop);
            else
                Nominas.liberarRegistros();
        });
        
        Nominas.adjuntarArchivosMasivos.change(function(e){
            let datosFormulario = new FormData(); 
            let archivos = e.target.files;
            let total = archivos.length;
            let peso = 0;

            if(total > 0){
                //swal({title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',text: ' Por favor espere...',type: '',showConfirmButton: false,allowOutsideClick: false});
                for(let i=0;i<total;i++ ){
                    datosFormulario.append("files"+i, archivos[i]);
                    peso += archivos[i].size;
                    datosFormulario.append("ruta"+i,archivos[i].webkitRelativePath);
                }
                datosFormulario.append("totalArchivosMasivos",total); 
                datosFormulario.append("ruta",window.location.pathname);
                Nominas.adjuntarArchivosMasivos.val('');

               /* if(peso > Nominas.totalMaximo){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
                    return;
                }*/
                Nominas.cargarMasivos(datosFormulario);
            }
        });

        Nominas.adjuntarArchivosMasivosFinanzas.change(function(e){
            let datosFormulario = new FormData(); 
            let archivos = e.target.files;
            let total = archivos.length;
            let peso = 0;

            if(total > 0){
                //swal({title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',text: ' Por favor espere...',type: '',showConfirmButton: false,allowOutsideClick: false});
                for(let i=0;i<total;i++ ){
                    datosFormulario.append("files"+i, archivos[i]);
                    peso += archivos[i].size;
                    datosFormulario.append("ruta"+i,archivos[i].webkitRelativePath);
                }
                datosFormulario.append("totalArchivosMasivos",total); 
                datosFormulario.append("ruta",window.location.pathname);
                Nominas.adjuntarArchivosMasivos.val('');

                if(peso > Nominas.totalMaximo){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
                    return;
                }
                Nominas.cargarMasivos(datosFormulario);
            }
        });

        Nominas.adjuntarArchivosMasivosTesoreria.change(function(e){
            let datosFormulario = new FormData(); 
            let archivos = e.target.files;
            let total = archivos.length;
            let peso = 0;

            if(total > 0){
                //swal({title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',text: ' Por favor espere...',type: '',showConfirmButton: false,allowOutsideClick: false});
                for(let i=0;i<total;i++ ){
                    datosFormulario.append("files"+i, archivos[i]);
                    peso += archivos[i].size;
                    datosFormulario.append("ruta"+i,archivos[i].webkitRelativePath);
                }
                datosFormulario.append("totalArchivosMasivos",total); 
                datosFormulario.append("ruta",window.location.pathname);
                Nominas.adjuntarArchivosMasivos.val('');

                if(peso > Nominas.totalMaximo){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
                    return;
                }
                Nominas.cargarMasivos(datosFormulario);
            }
        });

        Nominas.adjuntarArchivosMasivosRecibos.change(function(e){
            let datosFormulario = new FormData(); 
            let archivos = e.target.files;
            let total = archivos.length;
            let peso = 0;
            if(total > 0){
                //swal({title: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',text: ' Por favor espere...',type: '',showConfirmButton: false,allowOutsideClick: false});
                for(let i=0;i<total;i++ ){
                    datosFormulario.append("files"+i, archivos[i]);
                    peso += archivos[i].size;
                    datosFormulario.append("ruta"+i,archivos[i].webkitRelativePath);
                }
                datosFormulario.append("totalArchivosMasivos",total); 
                datosFormulario.append("ruta",window.location.pathname+2);
                Nominas.adjuntarArchivosMasivosRecibos.val('');

                if(peso > Nominas.totalMaximo){
                    MetodosDiversos.mostrarRespuesta('error','Excediste el máximo total permitido de MB','El máximo permitido es de 50 MB por carga, para continuar con el proceso deberas eliminar archivos, recuerda que puedes anexar los que te falten posteriormente',30000,true);
                    return;
                }
                Nominas.cargarMasivos(datosFormulario);
            }
        });

        /*********CALCULOS************/
        Nominas.nominasPensionAlimenticia.on('input',function(){
            Nominas.calcularDescuentosSys();
            Nominas.sumatoriaSys();
        });
        Nominas.nominasPrestamosEmpleados.on('input',function(){
            Nominas.calcularDescuentosSys();
        });

        Nominas.nominasExcedenteIsr.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteImss.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteGmm.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteInfonavit.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteFonacot.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedentePrestamos.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteRecuperacion.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteComisionSocio.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedentePrenominaImss.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedentePrenominaGmm.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteCajaAhorro.on('input',function(){
            Nominas.calcularDescuentosAsesores();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedentePensionAlimencia.on('input',function(){
            Nominas.calcularDescuentosTerceros();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteClientes.on('input',function(){
            Nominas.calcularDescuentosTerceros();
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteOtros.on('input',function(){
            Nominas.calcularDescuentosTerceros();
            Nominas.sumatoriaAsimilados();
        });



        Nominas.nominasExcedenteIngreso.on('input',function(){
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteTerceros.on('input',function(){
            Nominas.sumatoriaAsimilados();
        });
        Nominas.nominasExcedenteDescuentoAyudate.on('input',function(){
            Nominas.sumatoriaAsimilados();
        });

        Nominas.sindicato.on('input',function(){
            Nominas.sumatoriaAsimilados();
        });
        Nominas.tarjeta_empresarial.on('input',function(){
            Nominas.sumatoriaAsimilados();
        });
        Nominas.modalidad_40.on('input',function(){
            Nominas.sumatoriaAsimilados();
        });


        Nominas.nominasIngreso.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasInfonavit.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasFonacot.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasDonativo.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasExcedenteCargas.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasCargaPatronal.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasIsn.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasComisionMonto.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasImssObrera.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasCargaSocialImss.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasPrenominaImss.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasIsrIsp.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasIsr142.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasCuotaSindical.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasDespensa.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasCajaAhorro.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasDescuentoImss.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasApoyoSindical.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasDescuentoComedor.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasHaberes.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasExcedenteSubsidio.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasPrestamosEmpleados.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasPrestamosAyudate.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasAjusteSubsidioEmpleo.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.nominasOtros.on('input',function(){
            Nominas.sumatoriaSys();
        });
        Nominas.gastos_medicos2.on('input',function(){
            Nominas.sumatoriaSys();
        });
        

      

        /************************************************************************************/

        Nominas.autorizarMasivo.click(function(){
            if($(this).prop('checked')){
                $('.grupoCheckedNominas2').prop('checked', $(this).prop('checked'));
                Nominas.idLiberar = Array();
                $('.grupoCheckedNominas2').each(function() {
                    let id = parseInt($(this).parent().parent().siblings('span').text());
                    Nominas.idLiberar.push(id);
                });
            }
            else{
                $('.grupoCheckedNominas2').prop('checked', $(this).prop('checked'));
                Nominas.idLiberar = Array();
            }
        });

        Nominas.eliminarMasivo.click(function(){
            if($(this).prop('checked')){
                $('.grupoCheckedNominas').prop('checked', $(this).prop('checked'));
                Nominas.idAeliminar = Array();
                $('.grupoCheckedNominas').each(function() {
                    let id = parseInt($(this).parent().parent().siblings('span').text());
                    Nominas.idAeliminar.push(id);
                });
            }
            else{
                $('.grupoCheckedNominas').prop('checked', $(this).prop('checked'));
                Nominas.idAeliminar = Array();
            }
        });

        $('#excelnominas').change(function(e){
            let file = e.target.files[0];
            let valido = (/\.(?=xls|xlsx)/gi).test(file.name);
            
            if (!valido) {
                $(this).val('');
                swal("Sólo se permiten archivos", "Formato: .xls y .xlsx", "error").catch(swal.noop);
                return;
            }
            $('#indicador').html('<i class="fa fa-check-square-o fa-4x" style="color:#3c8dbc" aria-hidden="true"></i>');
            MetodosDiversos.mostrarRespuesta("success","","",1000,false);
        });

    }
}

Nominas.main();


                               