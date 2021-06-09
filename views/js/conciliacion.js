
class Conciliacion{

    static  init() 
 
     {   
         /****************INSERCION FORMULARIO CONCILIACION************************ */
         Conciliacion.FormConciliacion = $('#formularioConciliacion');
         Conciliacion.CancelarFormConciliacion = $('#CancelarFormConciliacion');
         Conciliacion.Cuenta = $('#Cuenta');
         Conciliacion.Banco = $('#Banco');    
         Conciliacion.Empresa = $('#Empresa');
         Conciliacion.Responsable = $('#Responsable');
         Conciliacion.FechaMovimiento = $('#FechaMovimiento');
         Conciliacion.Tmovimiento = $('#Tmovimiento');
         Conciliacion.MontoCheque = $('#MontoCheque');
         Conciliacion.Status = $('#Status');
         Conciliacion.FechaCobro = $('#FechaCobro');
         Conciliacion.NuPoliza = $('#NuPoliza');
         Conciliacion.Concepto = $('#Concepto');
         Conciliacion.Beneficiario = $('#Beneficiario');
         Conciliacion.ClasificacionCargos = $('#ClasificacionCargos');
         Conciliacion.Factura = $('#Factura');
         Conciliacion.Folio = $('#Folio');
         Conciliacion.Comentarios = $('#Comentarios');
         Conciliacion.cliente = 0;
         Conciliacion.nomina = 0;
         /****************AGREGAR NUEVA CUENTA************************ */
         Conciliacion.FormAgregarCuenta =$('#formularioAgregarCuenta');
         Conciliacion.AgregarNewCuenta =$('#AgregarNewCuenta');
         Conciliacion.NewCuenta = $('#NewCuenta');
         Conciliacion.NewBanco = $('#NewBanco');
         Conciliacion.NewEmpresa = $('#NewEmpresa');
         Conciliacion.NewTesorero = $('#NewTesorero');
         Conciliacion.NewSucursal = $('#NewSucursal');
         /****************AGREGAR NUEVO TIPO DE MOVIMIENTO************************ */
         Conciliacion.AgregarTmoviento =$('#AgregarTmoviento');
         Conciliacion.Newtmovimiento =$('#Newtmovimiento');
         /****************AGREGAR NUEVO BENEFICIARIO************************ */
         Conciliacion.FormularioBeneficiario = $('#FormularioNewBeneficiario');
         Conciliacion.Newbeneficiario =$('#Newbeneficiario');
         /****************AGREGAR NUEVO COCEPTO MOVIMIENTO************************ */
         Conciliacion.FormularioConceptoMovimiento =$('#FormularioConceptoMovimiento');
         Conciliacion.NewconceptoMovimiento =$('#NewconceptoMovimiento');
          /****************AGREGAR NUEVA CLASIFICACION DE CARGOS Y ABONOS************************ */
         Conciliacion.formularioClasificacionCargos =$('#formularioClasificacionCargos');
         //Conciliacion.NewclasificacionCargos = $('#NewclasificacionCargos');
         Conciliacion.NewtipomMovimiento = $('#NewtipomMovimiento');
         Conciliacion.NewnombreConcepto = $('#NewnombreConcepto');
         Conciliacion.Newdescripcion = $('#Newdescripcion');
         Conciliacion.Newnota = $('#Newnota');
         /****************EDITAR CUENTA************************ */
         Conciliacion.EDITcuenta =$('#EDITcuenta');
         Conciliacion.EDITbanco = $('#EDITbanco');
         Conciliacion.EDITempresa = $('#EDITempresa');
         Conciliacion.EDITtesorero = $('#EDITtesorero');
         Conciliacion.EDITsucursal = $('#EDITsucursal');
         Conciliacion.EDITARcuenta = $('#EDITARcuenta');
         /****************EDITAR TIPO DE MOVIMIENTO************************ */
         Conciliacion.EDITtmovimiento =$('#EDITtmovimiento');
         Conciliacion.EDITARtmoviento =$('#EDITARtmoviento');
         /****************EDITAR BENEFICIARIO************************ */
         Conciliacion.EDITbeneficiario =$('#EDITbeneficiario');
         Conciliacion.EDITARbeneficiario =$('#EDITARbeneficiario');
         /****************EDITAR CONCEPTO MOVIMIENTO************************ */
         Conciliacion.EDITconceptoMovimiento =$('#EDITconceptoMovimiento');
         Conciliacion.EDITARconceptoMovimiento =$('#EDITARconceptoMovimiento');
         /****************EDITAR CLASIFICACION DE CARGOS************************ */
         Conciliacion.EDITClasificacionCargos =$('#EDITClasificacionCargos');
         Conciliacion.EDITtipomMovimiento = $('#EDITtipomMovimiento');
         Conciliacion.EDITnombreConcepto = $('#EDITnombreConcepto');
         Conciliacion.EDITdescripcion = $('#EDITdescripcion');
         Conciliacion.EDITnota = $('#EDITnota');
         Conciliacion.EDITARclasificacionCargos = $('#EDITARclasificacionCargos');
         /****************FORMULARIO ACLARACION ************************ */
         Conciliacion.FormConciliacionAC = $('#formularioConciliacionAC');
         Conciliacion.CancelarFormConciliacionAC = $('#CancelarFormConciliacionAC');
         Conciliacion.CuentaAC = $('#CuentaAC');
         Conciliacion.BancoAC = $('#BancoAC');    
         Conciliacion.EmpresaAC = $('#EmpresaAC');
         Conciliacion.ResponsableAC = $('#ResponsableAC');
         Conciliacion.FechaMovimientoAC = $('#FechaMovimientoAC');
         Conciliacion.TmovimientoAC = $('#TmovimientoAC');
         Conciliacion.MontoChequeAC = $('#MontoChequeAC');
         Conciliacion.StatusAC = $('#StatusAC');
         Conciliacion.FechaCobroAC = $('#FechaCobroAC');
         Conciliacion.NuPolizaAC = $('#NuPolizaAC');
         Conciliacion.ConceptoAC = $('#ConceptoAC');
         Conciliacion.BeneficiarioAC = $('#BeneficiarioAC');
         Conciliacion.ClasificacionCargosAC = $('#ClasificacionCargosAC');
         Conciliacion.ComentariosAC = $('#ComentariosAC'); 
         Conciliacion.FacturaAC = $('#FacturaAC');
         Conciliacion.FolioAC = $('#FolioAC');
         
         /******************MODALES******************************** */
         Conciliacion.modalOpcionesCuenta = $('#modalOpcionesCuenta');
         Conciliacion.modalEditarCuenta = $('#modalEditarCuenta');
         Conciliacion.modalNuevaCuenta = $('#modalNuevaCuenta');
         Conciliacion.modalOpcionesBeneficiarios = $('#modalOpcionesBeneficiarios');
         Conciliacion.modalEditarBeneficiario = $('#modalEditarBeneficiario');
         Conciliacion.modalNuevoBeneficiario = $('#modalNuevoBeneficiario');
         Conciliacion.modalOpcionesConceptos = $('#modalOpcionesConceptos');
         Conciliacion.modalEditarConcepto = $('#modalEditarConcepto');
         Conciliacion.modalNuevoConcepto = $('#modalNuevoConcepto');
         Conciliacion.modalOpcionesMovimientos = $('#modalOpcionesMovimientos');
         Conciliacion.modalEditarMovimiento = $('#modalEditarMovimiento');
         Conciliacion.modalNuevoMovimiento = $('#modalNuevoMovimiento');
         Conciliacion.modalDatosNominas = $('#modalDatosNominas');
         Conciliacion.modalData = $('#modalActualizarDatos');
         /*******************BOTONES ACTIVAN MODALES*************** */
        Conciliacion.botonModalNuevaCuenta = $('#agregarNuevaCuenta');
        Conciliacion.botonModalEditarCuenta = $('#editarCuenta');
        Conciliacion.botonModalNuevoBeneficiario = $('#agregarNuevoBeneficiario');
        Conciliacion.botonModalEditarBeneficiario = $('#editarBenificiario');
        Conciliacion.botonModalNuevoConcepto= $('#agregarNuevoConcepto');
        Conciliacion.botonModalEditarConcepto= $('#editarConcepto');
        Conciliacion.botonModalNuevoMovimiento= $('#agregarNuevoMovimiento');
        Conciliacion.botonModalEditarMovimiento= $('#editarMovimiento');
        /*************************LISTAS**************************** */
        Conciliacion.listaCuentas = $('#cargarListaCuentas');
        Conciliacion.cargarListaBeneficiarios = $('#cargarListaBeneficiarios');
        Conciliacion.cargarListaConceptos = $('#cargarListaConceptos');
        Conciliacion.cargarListaMovimientos = $('#cargarListaMovimientos');
        Conciliacion.cargarDatosNomina = $('#cargarDatosNomina');
        Conciliacion.listaPrincipal = $('#mostrarRegistros');
        /*************************DIVERSOS************************** */
        Conciliacion.actualizarId = 0;
        Conciliacion.tituloModalCuentas = $('#labelTipoCuenta');
        Conciliacion.dataCuenta = 0;
        Conciliacion.data = 0;
        Conciliacion.tituloModalBeneficiario = $('#labelTipoBeneficiario');
        Conciliacion.tituloModalConcepto = $('#labelTipoConcepto');
        Conciliacion.tituloModalMovimiento = $('#labelTipoMovimiento');
        $('.monetario').mask('000,000,000.00', {reverse: true});
        Conciliacion.detalleNomina = $('#detalleNomina');
        Conciliacion.detalleNominaAC = $('#detalleNominaAC');
        Conciliacion.botonEditar = $('#botonEditar');
        Conciliacion.botonGuardarEdicion = $('#botonGuardarEdicion');
        Conciliacion.labelNoMovimiento = $('#labelNoMovimiento');
        Conciliacion.activarCamposEditables = $('.formato-visualizacion');
        Conciliacion.camposEditablesCondicionados = $('.formato-visualizacion2');
        Conciliacion.fechaComprobacion="0000-00-00";
        Conciliacion.tipoMovimientoComprobacion=0;
        Conciliacion.montoComprobacion=0;
        Conciliacion.cadenaNotificaciones = "";
        Conciliacion.fechaHoy ="0000-00-00";
        Conciliacion.thisReference = null;
        Conciliacion.botonAutorizar = $('#botonAutorizar');
        Conciliacion.botonNoAutorizar = $('#botonNoAutorizar');
        Conciliacion.tiempo = 30000;
        Conciliacion.formularioCargarLayout  = $('#formularioCargarLayout');
        Conciliacion.cargarArchivo = $('#cargarRegistrosConciliacion');
        /**********************PAGINADOR*************** */
        Conciliacion.filtroCuenta = $('#filtroCuenta');
        Conciliacion.filtroMonto = $('#filtroMonto');
        Conciliacion.filtroFolio = $('#filtroFolio');
        Conciliacion.filtroTipo = $('#filtroTipo');
        Conciliacion.filtroFecha = $('#filtroFecha');
        Conciliacion.mostrarPaginador = $('.paginadorConciliacion');
        Conciliacion.labelTotalRegistros = $('#labelTotalRegistros');
        Conciliacion.limpiarFiltros = $('#limpiarFiltros');
        /**********************DATA CAPTURO****************/
        Conciliacion.dataCapturo = $('#dataCapturo');
        Conciliacion.dataSucursal = $('#dataSucursal');
        Conciliacion.dataFecha = $('#dataFecha');
        Conciliacion.dataHora = $('#dataHora');
        Conciliacion.verificacionFecha = $('#verificacionFecha');
        Conciliacion.verificacionTipo = $('#verificacionTipo');
        Conciliacion.verificacionMonto = $('#verificacionMonto');
        Conciliacion.mostrarDatosAautorizar = $('#mostrarDatosAautorizar');
     }
 
     static ValidacioError(e)        // METODO QUE UTILIZO PARA PINTAR EL CONTORNO DEL INPUIT AL DAR ERROR
     {
         document.getElementById(e).style.borderColor="red";
         document.getElementById(e).focus();
         return false;       
     }

    static ValidacioError2(e){
        e.css("borderColor","red");
        e.focus();   
        return false; 
     }
 
     static cancelar()                 
     {
        Conciliacion.Folio.prop('disabled',true);
        Conciliacion.Factura.prop('disabled',true);
        Conciliacion.detalleNomina.prop('disabled',true);
        Conciliacion.FechaCobro.prop('disabled',true);
        Conciliacion.Folio.val('');
        Conciliacion.Factura.val('');
        Conciliacion.Status.html('');
        Conciliacion.Status.prop('disabled',true);
        Conciliacion.FormConciliacion[0].reset();        
     }
 
     static alertaEspacioVacio(titulo,cuerpo)
     {
         swal ( titulo, cuerpo )  ;
     }
 
     static alertaEnviado(titulo,cuerpo)
     {
         swal(titulo, cuerpo, "success");
     }
 
     static focusverdes(e)
     {
         document.getElementById(e).style.borderColor="red";
         document.getElementById(e).focus();
         return false;           
     }
 
     static Tipmovimiento()
     {
         if( $('#Tmovimiento').val() == 1) 
         {
             $('#movimiento').show();
             $('#FacturaCampo').hide();
             $('#FolioCampo').hide();

             document.getElementById("Status").selectedIndex = "4";
            // $('#FacturaCampo').hide();  $('#FolioCampo').hide();
             //Conciliacion.BanderaPOLIZA.val()= 0;
         }else if($('#Tmovimiento').val() == 2 || $('#Tmovimiento').val() == 3){
             document.getElementById("NuPoliza").value = ""
             $('#movimiento').hide()
             document.getElementById("Status").selectedIndex = "3";
           //  Conciliacion.Facturar();
           $('#FacturaCampo').hide();
           $('#FolioCampo').hide();
             
         }else{
             $('#movimiento').hide()
             document.getElementById("Status").selectedIndex = "0";
         }
     }
 
     static estatus()
     {
         if($('#Status').val() == 5)
         {
             document.getElementById("FechaCobro").style.borderColor="orange";
             document.getElementById("FechaCobro").focus();
             return false;
         }else
         {
             document.getElementById("FechaCobro").style.borderColor="#CACFD2";
         }
     }
 
     static validarFormularioCuenta()
     {
         return Conciliacion.validar5cuenta(Conciliacion.NewCuenta,'NewCuenta',"Cuenta",Conciliacion.NewBanco,'NewBanco',"Banco",Conciliacion.NewEmpresa,'NewEmpresa',"Empresa",Conciliacion.NewTesorero,'NewTesorero',"Tesorero",Conciliacion.NewSucursal,'NewSucursal',"Sucursal","formularioAgregarCuenta");
     }
 
     static validarTipodeMovimiento()
     {
         Conciliacion.validar1Campo(Conciliacion.Newtmovimiento,'Newtmovimiento',"Tipo de Movimiento");
     }
 
     static validarBeneficiario()
     {
         return Conciliacion.validar1Campo(Conciliacion.Newbeneficiario,'Newbeneficiario',"Beneficiario");
     }
 
     static validarConceptoMovimiento()
     {
         return Conciliacion.validar1Campo(Conciliacion.NewconceptoMovimiento,'NewconceptoMovimiento',"Concepto");
     }
 
     static validarClasificacionCargos()
     {
         if( Conciliacion.NewtipomMovimiento.length == 0 || Conciliacion.NewtipomMovimiento.val() == "")
             {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo ", "Tipo de Movimiento");
             Conciliacion.ValidacioError("NewtipomMovimiento");             
             return false;
         }else if(Conciliacion.NewnombreConcepto.length == 0 || Conciliacion.NewnombreConcepto.val() == "")
             {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #2","Nombre de Concepto")
             Conciliacion.ValidacioError("NewnombreConcepto");
             return false;
         }else if(Conciliacion.Newdescripcion.val().length == 0 || Conciliacion.Newdescripcion.val() == "")
             {   
           
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #3","Descripcion")
             Conciliacion.ValidacioError("Newdescripcion");
             return false;
         }
         
        Conciliacion.ColorRestar("NewtipomMovimiento"); 
        Conciliacion.ColorRestar("NewnombreConcepto");  
        Conciliacion.ColorRestar("Newdescripcion");  
             
        return true;
         
     }
 
     static ValidarEditarCuenta()
     {
         Conciliacion.validar5cuenta(Conciliacion.EDITcuenta,'EDITcuenta',"Cuenta",Conciliacion.EDITbanco,'EDITbanco',"Banco",Conciliacion.EDITempresa,'EDITempresa',"Epresa",Conciliacion.EDITtesorero,'EDITtesorero',"Tesorero",Conciliacion.EDITsucursal,'EDITsucursal',"Sucursal",);
     }
         
     static validarEditarTipodeMovimiento()
     {
         Conciliacion.validar1Campo(Conciliacion.EDITtmovimiento,'EDITtmovimiento',"FormularioTmovimiento")
     }
         
     static validarEditarBeneficiario()
     {
         return Conciliacion.validar1Campo(Conciliacion.EDITbeneficiario,'EDITbeneficiario',"Benfeficiario")          
     }
 
     static validarditarConceptoMovimiento()
     {
         Conciliacion.validar1Campo(Conciliacion.EDITconceptoMovimiento,'EDITconceptoMovimiento',"Concepto de Movimiento") 
     }
 
     static ValidarEditarClasifecacion()
     {
         Conciliacion.validar5cuenta(Conciliacion.EDITClasificacionCargos,'EDITClasificacionCargos',"Clasificacion de Cargos",Conciliacion.EDITtipomMovimiento,'EDITtipomMovimiento',"Tipo de Movimiento",Conciliacion.EDITnombreConcepto,'EDITnombreConcepto',"Cocepto",Conciliacion.EDITdescripcion,'EDITdescripcion',"Descripcion",Conciliacion.EDITnota,'EDITnota',"Nota");
     }
 
     static ColorRestar(id)
     {
         document.getElementById(id).style.borderColor="#CACFD2"
     }
 
     static validar5cuenta(valor1,id1,mensaje1,valor2,id2,mensaje2,valor3,id3,mensaje3,valor4,id4,mensaje4,valor5,id5,mensaje5,id_formulario,alert)
     {
         if( valor1.length == 0 || valor1.val() == "")
         {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo ", mensaje1);
             Conciliacion.ValidacioError(id1);             
             return false;
         }else if(valor2.length == 0|| valor2.val() == "")
         {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #2",mensaje2)
             Conciliacion.ValidacioError(id2);
             return false;
         }else if(valor3.length == 0 || valor3.val() == "")
         {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #3",mensaje3)
             Conciliacion.ValidacioError(id3);
             return false;
         }else if(valor4.length == 0 || valor4.val() == "")
         {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #4",mensaje4)
             Conciliacion.ValidacioError(id4);
             return false;
         }else if(valor5.length == 0 ||valor5.val() == "")
         {
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #5",mensaje5)
             Conciliacion.ValidacioError(id5);
             return false;
         }
        
        //document.getElementById(id_formulario).reset(); 
        Conciliacion.ColorRestar(id1); 
        Conciliacion.ColorRestar(id2);  
        Conciliacion.ColorRestar(id3);  
        Conciliacion.ColorRestar(id4);  
        Conciliacion.ColorRestar(id5)
        return true;
        //Conciliacion.alertaEnviado("ENVIADO","ELEMENTO ENVIADO CON EXITO");

     }


   
 
     static validar1Campo(valor,id,mensaje)
     {
        if(valor.length == 0 || valor.val() == "")
            {
                Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo ",mensaje)
                Conciliacion.ValidacioError(id);
                return false;
            }
         //document.getElementById(id_formulario).reset(); 
         Conciliacion.ColorRestar(id); 
         return true;
         //Conciliacion.alertaEnviado("ENVIADO","ELEMENTO ENVIADO CON EXITO");
     }
 
    static restablecercolor()
    {
        let form = new FormData(Conciliacion.FormConciliacion[0]);
        let key,value;
        for([key,value] of form.entries())
        {
            document.getElementById(key).style.borderColor="rgb(131, 168, 224) "; 
        // document.getElementById(key+"AC").style.borderColor="rgb(131, 168, 224) ";
        } 
    }
     
    static ValidacionAclaracion(v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,v13)
     {
        if(v1.val() == null || v1.val() == "" ){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #1","CUENTA"); 
            return Conciliacion.ValidacioError2(v1);                  
        }
        if(v2.val() == null || v2.val() == "" ){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #5","FECHA MOVIMIENTO");
            return Conciliacion.ValidacioError2(v2);
        }
        if(v3.val() == null || v3.val() == "" ){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #6","Tipo de movimiento");
            return Conciliacion.ValidacioError2(v3);
        }

        if(v5.val() == null || v5.val() == ""){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #7","Status") 
            return Conciliacion.ValidacioError2(v5);
        }

        if(v3.val()==1 && v5.val()==1){
            if( v4.val() != "" && !/^[0-9,.]{4,}$/.test(v4.val())){
                Conciliacion.alertaEspacioVacio("Porfavor Llene correctamente el Campo #8","Monto Cheque (formato: 0.00)") 
                return Conciliacion.ValidacioError2(v4);
            }
            if( v13.val() == ""){
                Conciliacion.alertaEspacioVacio("Porfavor Llene correctamente el Campo #16","Comentarios") 
                return Conciliacion.ValidacioError2(v13);
            }
            return true;
        }
        else if(v4.val() == null || v4.val() == "" || !/^[0-9,.]{4,}$/.test(v4.val())){
            Conciliacion.alertaEspacioVacio("Porfavor Llene correctamente el Campo #8","Monto Cheque (formato: 0.00)") 
            return Conciliacion.ValidacioError2(v4);
        }


        if( (v3.val() == 1 && v5.val() == 5) && (v6.val() == null || v6.val() == "") ){
             Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #9","Fecha Cobro") 
             return Conciliacion.ValidacioError2(v6);
        }

        if( v3.val() == 1 && v7.val() == ""){  
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #10"," Numero de poliza") 
            return Conciliacion.ValidacioError2(v7); 
        }


        if(  (v8.val() == null || v8.val() == "") ){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #11","Concepto")
            return Conciliacion.ValidacioError2(v8);
        }
        if( (v9.val() == null || v9.val() == "") ){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #12","Beneficiario")
            return Conciliacion.ValidacioError2(v9);
        }


        if(v10.val() == null || v10.val() == ""){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #13","Clasificacion de Cargos")
            return Conciliacion.ValidacioError2(v10);
        }    

        if( !v11.prop('disabled') && v11.val() == ""){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #14","Número de Factura")
            return Conciliacion.ValidacioError2(v11);
        }
        if( !v12.prop('disabled') && v12.val() == ""){
            Conciliacion.alertaEspacioVacio("Porfavor Llene el Campo #15","Número de Folio")
            return Conciliacion.ValidacioError2(v12);
        }
        return true;
    }
 
    static validarpoliza()
     {
        if(Conciliacion.TmovimientoAC.val() == 1)
         { 
             $('#hidePolizaAC').show();
            /* Conciliacion.Status.html(' <option value="1">PRESTAMO</option>' +
                                        '<option value="2">CANCELADO</option>' +
                                       '<option value="4" selected="selected">CIRCULACION</option>' +
                                        '<option value="5">COBRADO</option>');*/
        }
        //Conciliacion.Status.prop('disabled',false);
        if(Conciliacion.TmovimientoAC.val() == 3 || Conciliacion.TmovimientoAC.val()== 2)
        {       
             document.getElementById("NuPolizaAC").value = "";
             $('#hidePolizaAC').hide() 
        }
    }
 
    static Facturar(id_movimiento,movimiento,id_factura,id_folio)
     {
       
         let combo = document.getElementById(id_movimiento);
         let selected = combo.options[combo.selectedIndex].text;
         
         let cliente = "";
         let nomina = "";  
         cliente = selected.indexOf("CLIENTE");
         nomina = selected.indexOf("NOMINA");
         
         if(Conciliacion.Tmovimiento.val() == 2 && cliente != -1)
         {  // alert("entro if");
             $(id_factura).show();
             $(id_folio).hide();
 
         }else if(movimiento.val() == 2 || movimiento.val() == 3 && nomina != -1 )
         {   
             if(movimiento.val() == 2 && nomina == -1)
             {
                 $(id_folio).hide(); $(id_factura).hide();
             }else if(movimiento.val() == 3 && nomina == -1)
             {
                 $(id_folio).hide(); $(id_factura).hide();
             }
             $(id_folio).show();
             $(id_factura).hide();
         }else if(movimiento.val() == 1 )
         {
             $(id_folio).hide(); $(id_factura).hide();
         }
    }


    static realizarCambios(tipo,referencia,target){
        MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{actualizarEstado:true,campo:target,id:referencia.parent().parent().attr('data'),tipoMovimiento:tipo},(error,respuesta)=>{ 
            
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

            if(target==='cuentas')
                Conciliacion.Cuenta.html(respuesta.data)  
            else if(target==='beneficiarios')
                Conciliacion.Beneficiario.html(respuesta.data);
            else if(target==='conceptos')
                Conciliacion.Concepto.html(respuesta.data);
            else if(target==='movimientos')
                Conciliacion.ClasificacionCargos.html(respuesta.data);
        });
    }

    static recargarClasificacionMovimientos(valor,target,actualizacion){
        target.html('<option value="">CARGANDO...</option>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{actualizarMovimiento:valor,actualizacion},(error,respuesta)=>{ 
            target.html(respuesta);
        });
    }

    static obtenerDatosNomina(valor){
        Conciliacion.modalDatosNominas.modal('show');
        MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{idNomina:valor},(error,respuesta)=>{ 
            Conciliacion.cargarDatosNomina.html(respuesta);
        });
    }

    static enviarFormularioPrincipal(formulario){
        let contadorError = setTimeout(Conciliacion.mensajeError,Conciliacion.tiempo);
        MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',240000);
        let datosFormulario = new FormData(formulario[0]);
        if(Conciliacion.actualizarId > 0)
            datosFormulario.append('actualizarMovimiento', Conciliacion.actualizarId);
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php",datosFormulario,(error,respuesta)=>{
            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
            if(error){
                clearTimeout(contadorError);//detenemos el contador de error
                return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
            }
            clearTimeout(contadorError);//detenemos el contador de error
            if(Conciliacion.actualizarId > 0){//se realizó una actualización
                Conciliacion.botonGuardarEdicion.hide();
                Conciliacion.botonEditar.show();
                Conciliacion.activarCamposEditables.prop('disabled',true);
                Conciliacion.camposEditablesCondicionados.prop('disabled',true);
                Conciliacion.fechaComprobacion = Conciliacion.FechaMovimientoAC.val();
                Conciliacion.tipoMovimientoComprobacion = Conciliacion.TmovimientoAC.val();
                Conciliacion.montoComprobacion = Conciliacion.MontoChequeAC.val(); 
                Conciliacion.thisReference.siblings('.getCuenta').text( $('option:selected',Conciliacion.CuentaAC).text());
                Conciliacion.thisReference.siblings('.getMonto').text(Conciliacion.MontoChequeAC.val());
                Conciliacion.thisReference.siblings('.getEmpresa').text(Conciliacion.EmpresaAC.val().toUpperCase());
                Conciliacion.dataCapturo.text(respuesta.usuario.responsable);
                Conciliacion.dataFecha.text(respuesta.usuario.fecha);
                Conciliacion.dataHora.text(respuesta.usuario.hora);
                Conciliacion.dataSucursal.text(respuesta.usuario.sucursal);
            } 
            else{
                Conciliacion.cancelar();
                Conciliacion.listaPrincipal.html(respuesta.data);
                Conciliacion.mostrarPaginador.html(respuesta.paginador);
                Conciliacion.labelTotalRegistros.html(respuesta.total);
                Conciliacion.actualizarId = 0;
            } 
        });
    }

    static mostrarDataActualizar(){
        Conciliacion.mostrarDatosAautorizar.hide();
        Conciliacion.botonAutorizar.hide();
        Conciliacion.botonNoAutorizar.hide();
        Conciliacion.fechaComprobacion="0000-00-00";
        Conciliacion.tipoMovimientoComprobacion=0;
        Conciliacion.montoComprobacion=0;
        Conciliacion.activarCamposEditables.prop('disabled',true);
        Conciliacion.camposEditablesCondicionados.prop('disabled',true);
        Conciliacion.botonGuardarEdicion.hide();
        Conciliacion.botonEditar.show();
        Conciliacion.labelNoMovimiento.text(Conciliacion.actualizarId);
        Conciliacion.modalData.modal('show');
        //Iniciar contador en caso de que tarde más de 1 minuto ocurrio algún error en el servidor y le informamos al usuario
        let contadorError = setTimeout(Conciliacion.mensajeError,Conciliacion.tiempo);
        $('body').append('<div id="loadImageDatos" style="z-index:9000;width:100%;height:120%;position:absolute;top:0;left:0;display: flex;flex-direction: column;justify-content: center;align-items: center;background: rgba(0,0,0,0.9);"><div style="width:120px;height:120px;position:absolute;top:50%;left:50%;margin-top:-120px;margin-left:-60px;"><h2 style="margin-left:12px;color:#fff;">Cargando</h2><i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;color:#3489df;"></i></div></div>');
        MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{mostrarRegistro:Conciliacion.actualizarId},(error,respuesta)=>{ 
            if(error){ console.log(respuesta);return;}//si el servido marca algún error
            Conciliacion.camposPorActualizar(respuesta[0],contadorError);//cargamos los campos
            $("#loadImageDatos").fadeOut(300,function(){
                $(this).remove()
            });
        });
    }

    static mensajeError(){
        $("#loadImageDatos").fadeOut(300,function(){
            $(this).remove()
        });
        Conciliacion.modalData.modal('hide');
        MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','El servidor está tardando bastante en responder, intentelo más tarde por favor',60000,true);
    }

    static camposPorActualizar(data,contadorError){
        Conciliacion.CuentaAC.val(data.id_cuenta);
        Conciliacion.BancoAC.val(data.banco);   
        Conciliacion.EmpresaAC.val(data.empresa);
        Conciliacion.ResponsableAC.val(data.responsable);
        Conciliacion.FechaMovimientoAC.val(data.fecha_movimiento);
        Conciliacion.TmovimientoAC.val(data.tipo_movimiento);
        let monto = MetodosDiversos.mascaraMoneda(data.monto,1);
        Conciliacion.MontoChequeAC.val(monto);
        Conciliacion.FechaCobroAC.val(data.fecha_cobro);
        Conciliacion.NuPolizaAC.val(data.numero_poliza);
        Conciliacion.ConceptoAC.val(data.id_concepto);
        Conciliacion.BeneficiarioAC.val(data.id_beneficiario);
        Conciliacion.ClasificacionCargosAC.val(data.id_clasificacion_movimiento);
        Conciliacion.ComentariosAC.val(data.comentarios);
        Conciliacion.FacturaAC.val(data.numero_factura);
        Conciliacion.FolioAC.val(data.numero_folio);

        if(data.tipo_movimiento == 1)
            Conciliacion.StatusAC.html( '<option value="1">PRESTAMO</option>' +
                                        '<option value="2">CANCELADO</option>' +
                                        '<option value="4" selected="selected">CIRCULACION</option>' +
                                        '<option value="5">COBRADO</option>');    
        else
            Conciliacion.StatusAC.html('<option value="3">APLICADO</option>');
        Conciliacion.StatusAC.val(data.estatus);

        /////COMPROBAMOS LOS VALORES POR SI SE MODIFICAN
        Conciliacion.fechaComprobacion = data.fecha_movimiento;
        Conciliacion.tipoMovimientoComprobacion = data.tipo_movimiento;
        Conciliacion.montoComprobacion = monto; 
        Conciliacion.fechaHoy = data.fechaReal;
        //////DATOS DEL CAPTURISTA
        Conciliacion.dataCapturo.text(data.capturo);
        let registrado = data.fecha_ultima_actualizacion.split(' ');
        Conciliacion.dataFecha.text(Conciliacion.formatoFecha(registrado[0]));
        Conciliacion.dataHora.text(registrado[1]);
        Conciliacion.dataSucursal.text(data.sucursal_capturo);
        if(data.verificacion){
            Conciliacion.mostrarDatosAautorizar.show();
            Conciliacion.botonAutorizar.show();
            Conciliacion.botonNoAutorizar.show();
            let registrado = data.fechaValidacion.split(' ');
            Conciliacion.verificacionFecha.text(Conciliacion.formatoFecha(registrado[0]));
            let tipo = data.tipoValidacion;
            if(tipo == 1)
                tipo = 'CHEQUE';
            else if(tipo == 2)
                tipo = 'INGRESO';
            else 
                tipo = 'EGRESO';
            Conciliacion.verificacionTipo.text(tipo);
            Conciliacion.verificacionMonto.text(data.montoValidacion);
        }
        clearTimeout(contadorError);//detenemos el contador de error
    }

    static formatoFecha(fecha){
        let temp = fecha.split('-');
        return temp[2]+'-'+temp['1']+'-'+temp[0];
    }

    static validacionMovimiento(valor,folio,factura,detalleNomina,status,nuPoliza,target,fechaCobro,interfazActualizacion=false){
        folio.prop('disabled',true);
        factura.prop('disabled',true);
        fechaCobro.prop('disabled',true);
        detalleNomina.prop('disabled',true);
        fechaCobro.val('');
        folio.val('');
        factura.val('');
        if(valor == ""){
            status.html('');
            status.prop('disabled',true);
            nuPoliza.val('');
            nuPoliza.prop('disabled',true);
            Conciliacion.recargarClasificacionMovimientos(0,target,interfazActualizacion);
            return;
        }
        if(valor == 1){
            status.html('<option value="1">PRESTAMO</option>' +
                                    '<option value="2">CANCELADO</option>' +
                                    '<option value="4" selected="selected">CIRCULACION</option>' +
                                    '<option value="5">COBRADO</option>');
            nuPoliza.prop('disabled',false);
            Conciliacion.recargarClasificacionMovimientos(1,target,interfazActualizacion);
            Conciliacion.cargarListaMovimientos.html('');
        }     
        else{
            status.html('<option value="3">APLICADO</option>');
            nuPoliza.prop('disabled',true);
            nuPoliza.val('');
            valor == 2 ? Conciliacion.recargarClasificacionMovimientos(1,target,interfazActualizacion) : Conciliacion.recargarClasificacionMovimientos(2,target,interfazActualizacion);
        }
        status.prop('disabled',false);
    }

    static validacionStatus(status,movimiento,fechaCobro){
        if( movimiento.val() == 1 && status.val() == 5 )
            fechaCobro.prop('disabled',false);
        else {
            fechaCobro.prop('disabled',true);
            fechaCobro.val('');
        }
    }

    static verificarCuenta(valor,banco,empresa,responsable,interfazNuevoRegistro=false){
        if(interfazNuevoRegistro){
            if(valor.val()==='edit'){
                valor.val('');
                Conciliacion.modalOpcionesCuenta.modal('show');
            }
        }
        banco.val($('option:selected',valor).attr('dataBanco'));
        empresa.val($('option:selected',valor).attr('dataEmpresa'));
        responsable.val($('option:selected',valor).attr('dataResponsable'));
    }

    static validarFecha(fechaUsuario,actualizacion){  
        let fechaActual;
        if(!actualizacion){
            let fecha = new Date();
            let dia , mes , anio;
            dia =  fecha.getDate().toString();
            mes = (fecha.getMonth()+1).toString();
            anio =fecha.getFullYear();
            if(mes.length <= 1)
                mes = "0"+ mes;
            if(dia.length <= 1)
                dia = "0"+ dia;
            fechaActual = anio + "-" + mes + "-" + dia;
        }
        else
            fechaActual = Conciliacion.fechaComprobacion;
         
        if(fechaActual !== fechaUsuario){
            if(actualizacion)
                Conciliacion.cadenaNotificaciones += "<div style='text-align:justify;margin-left:15px;'><li style='font-size:20px;'>La fechade movimiento es distinta a la actual.</li></div>";
            return true;
        }
        return false;
    }

    static validarTipo(){
        if(Conciliacion.TmovimientoAC.val() !== Conciliacion.tipoMovimientoComprobacion){
            Conciliacion.cadenaNotificaciones += "<div style='text-align:justify;margin-left:15px;'><li style='font-size:20px;'>El tipo de movimiento es distinto al actual.</li></div>";
            return true;
        }
        return false;
    }

    static validarMonto(){
        if(Conciliacion.MontoChequeAC.val() !== Conciliacion.montoComprobacion){
            Conciliacion.cadenaNotificaciones += "<div style='text-align:justify;margin-left:15px;'><li style='font-size:20px;'>El monto es distinto al actual.</li></div>";
            return true;
        }   
        return false;
    }

    static paginar(elemento){
        let datos = new FormData();
        datos.append("paginaActual", $(elemento).parent().attr("actual"));
        datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
        datos.append("target", $(elemento).parent().parent().attr("target"));
        datos.append("cuenta", $(elemento).parent().parent().attr("cuenta"));
        datos.append("monto", $(elemento).parent().parent().attr("monto"));
        datos.append("folio", $(elemento).parent().parent().attr("folio"));
        datos.append("tipo", $(elemento).parent().parent().attr("tipo"));
        datos.append("fecha", $(elemento).parent().parent().attr("fecha"));
        Conciliacion.recargarPaginador(datos);
    }

    static filtros(){
       let datos = new FormData();
        datos.append("paginaActual", 1);
        datos.append("registrosPorPagina", Conciliacion.mostrarPaginador.find('ul').attr('registros'));
        datos.append("target", Conciliacion.mostrarPaginador.find('ul').attr('target'));
        datos.append("cuenta", Conciliacion.filtroCuenta.val());
        datos.append("monto", MetodosDiversos.convertirDecimal(Conciliacion.filtroMonto.val()));
        datos.append("folio", Conciliacion.filtroFolio.val());
        datos.append("tipo", Conciliacion.filtroTipo.val());
        datos.append("fecha", Conciliacion.filtroFecha.val());
        Conciliacion.recargarPaginador(datos);
    }

    static recargarPaginador(datos){
        Conciliacion.listaPrincipal.html('<div style="text-align:center"><i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:10%;margin-bottom:10%;color:#3489df;"></i></div>');
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php", datos,(error,respuesta)=>{
            if(error)console.log('error',error);
            else {
                Conciliacion.listaPrincipal.html(respuesta.html);
                Conciliacion.mostrarPaginador.html(respuesta.paginador);
                Conciliacion.labelTotalRegistros.html(respuesta.total);
            }
        });
    }

   
    static validarCambioClasificacionMovimientos(clasificacion,folio,factura,detalleNomina,Tmovimiento){
        folio.prop('disabled',true);
        factura.prop('disabled',true);
        detalleNomina.prop('disabled',true);
        folio.val('');
        factura.val('');
      
        if(clasificacion.val()==='edit'){
            clasificacion.val('');
            Conciliacion.modalOpcionesMovimientos.modal('show');
        }
        
        else if(clasificacion.val() !='' && Tmovimiento.val() == 2){
            let cadena = $('option:selected',clasificacion).text().toLowerCase();
            cadena = cadena.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            if( cadena.indexOf("nomina") !== -1)
                folio.prop('disabled',false);
            else if( cadena.indexOf("cliente") !== -1)
                factura.prop('disabled',false);
        }
    }

    static validarBotonDetalleNomina(folio,detalleNomina){
        folio.val().length > 0 ? detalleNomina.prop('disabled',false) : detalleNomina.prop('disabled',true);
    }

    /*static validacionDetalleNomina(Conciliacion.detalleNomina,Conciliacion.Folio){
        if( Conciliacion.Folio.val().length  < 1 ){
            $(this).prop('disabled',false)
                return;
        }
        Conciliacion.obtenerDatosNomina(Conciliacion.Folio.val());
    }*/
                    
    
    static cargaManual(data){
        
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php", data,(error,respuesta)=>{

           if(error){
               MetodosDiversos.mostrarRespuesta('error',respuesta.titulo,respuesta.subtitulo,30000,true);
           }  
           else if(respuesta.alerta){
                MetodosDiversos.mostrarRespuesta('warning',respuesta.titulo,respuesta.subtitulo,30000,true);
                Conciliacion.limpiar();
           }
           else{
                MetodosDiversos.mostrarRespuesta('success',respuesta.titulo,respuesta.subtitulo,30000,true);
                Conciliacion.limpiar();
           }

           Conciliacion.cargarArchivo.val('');

           if(respuesta.log){ //si ocurrieron errores o advertencias se genera el archivo de logs
                Conciliacion.log(respuesta.dataLog);
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
        downloadLink.onclick = Conciliacion.destroyClickedElement;
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    static destroyClickedElement(event) {
        document.body.removeChild(event.target);
    }

    static limpiar(){
        Conciliacion.filtroCuenta.val('');
        Conciliacion.filtroMonto.val('');
        Conciliacion.filtroFolio.val('');
        Conciliacion.filtroTipo.val('2');
        Conciliacion.filtroFecha.val('');
        Conciliacion.filtros();
    }

    
    static main()
     {
        Conciliacion.init();
                 Conciliacion.CancelarFormConciliacion.click(function()
                 { 
                     Conciliacion.cancelar();  //Conciliacion.alertaEnviado("AGREGADA","Cuenta AGREGADA");  
                 });
 
                 Conciliacion.AgregarTmoviento.click(function()
                 { 
                     Conciliacion.validarTipodeMovimiento();//Conciliacion.alertaEnviado("AGREGADO","Tipo de Movimiento");                       
                 });
 
                 Conciliacion.EDITARcuenta.click(function()
                 { 
                     Conciliacion.ValidarEditarCuenta();                       
                 });
 
                 Conciliacion.EDITARtmoviento.click(function()
                 { 
                     Conciliacion.validarEditarTipodeMovimiento();                       
                 });
 
                 Conciliacion.EDITARbeneficiario.click(function()
                 { 
                     Conciliacion.validarEditarBeneficiario();                       
                 });
 
                 Conciliacion.EDITARconceptoMovimiento.click(function()
                 { 
                     Conciliacion.validarditarConceptoMovimiento();                       
                 });
 
                 Conciliacion.EDITARclasificacionCargos.click(function()
                 { 
                     Conciliacion.ValidarEditarClasifecacion();                       
                 });
 
                /*********************************************************/
                Conciliacion.Cuenta.change(function(){
                    Conciliacion.verificarCuenta($(this),Conciliacion.Banco,Conciliacion.Empresa,Conciliacion.Responsable,true);
                });

                Conciliacion.CuentaAC.change(function(){
                    Conciliacion.verificarCuenta($(this),Conciliacion.BancoAC,Conciliacion.EmpresaAC,Conciliacion.ResponsableAC);
                });

                Conciliacion.botonModalNuevaCuenta.click(function(){
                    Conciliacion.actualizarId = 0;
                    Conciliacion.modalOpcionesCuenta.modal('hide');
                    Conciliacion.modalNuevaCuenta.modal('show');
                    Conciliacion.FormAgregarCuenta[0].reset();
                    Conciliacion.tituloModalCuentas.text('Agregar nueva cuenta');
                });
    
                Conciliacion.botonModalEditarCuenta.click(function(){
                    Conciliacion.modalOpcionesCuenta.modal('hide');
                    Conciliacion.modalEditarCuenta.modal('show');
                    MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{recargarListaCuentas:true},(error,respuesta)=>{ 
                        Conciliacion.listaCuentas.html(respuesta);
                    });
                });

                Conciliacion.NewSucursal.change(function(){
                    if($(this).val() != 0){
                        Conciliacion.NewTesorero.html('<option value="">CARGANDO...</option>');
                        MetodosDiversos.consultaAjaxData("controllers/AjaxReportes.php",{listaUsuarios2:$(this).val()},(error,respuesta)=>{ 
                            Conciliacion.NewTesorero.html(respuesta);
                        });
                    }
                    else    
                        Conciliacion.NewTesorero.html('<option value=""></option>');
                });

                Conciliacion.FormAgregarCuenta.submit(function(e){
                    e.preventDefault();
                    if(Conciliacion.validarFormularioCuenta()){
                        let data = new FormData(Conciliacion.FormAgregarCuenta[0]);
                        if(Conciliacion.actualizarId > 0)
                            data.append('actualizarCuenta', Conciliacion.actualizarId)
                        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php",data,(error,respuesta)=>{ 
                            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                            if(!respuesta.error){
                                if(Conciliacion.actualizarId > 0){//se realizó una actualización
                                    Conciliacion.dataCuenta.html('<span class="ocultar768 encabezado-min">Cuenta:</span>'+Conciliacion.NewCuenta.val());
                                    Conciliacion.data.html('<span class="ocultar768 encabezado-min">Tesorero:</span><span class="textoMay">' + $('option:selected',Conciliacion.NewTesorero).text() + '</span>');
                                    Conciliacion.data.attr('id-sucursal',Conciliacion.NewSucursal.val());
                                    Conciliacion.data.attr('id-banco',Conciliacion.NewBanco.val());
                                    Conciliacion.data.attr('id-empresa',Conciliacion.NewEmpresa.val());
                                    Conciliacion.data.attr('id-tesorero',Conciliacion.NewTesorero.val());
                                    Conciliacion.modalNuevaCuenta.modal('hide');;
                                }  
                                Conciliacion.Cuenta.html(respuesta.data);
                                Conciliacion.FormAgregarCuenta[0].reset();
                            }  
                        });
                    }
                });

                Conciliacion.listaCuentas.on('click','.clickStatusCuenta',function(){
                    $(this).toggleClass('seleccion-On');
                    $(this).hasClass('seleccion-On') ? Conciliacion.realizarCambios(true,$(this),'cuentas') : Conciliacion.realizarCambios(false,$(this),'cuentas'); 
                });

                Conciliacion.listaCuentas.on('click','.actualizarCuenta',function(){
                    Conciliacion.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                    Conciliacion.dataCuenta = $(this).parent().siblings('.getCuenta');
                    Conciliacion.data = $(this).parent().siblings('.getTesorero');
                    Conciliacion.FormAgregarCuenta[0].reset();
                    Conciliacion.tituloModalCuentas.text('Actualizar datos de la cuenta');
                    Conciliacion.modalNuevaCuenta.modal('show');
                    MetodosDiversos.consultaAjaxData("controllers/AjaxReportes.php",{listaUsuarios2:Conciliacion.data.attr('id-sucursal')},(error,respuesta)=>{ 
                        Conciliacion.NewTesorero.html(respuesta);
                        Conciliacion.NewTesorero.val(Conciliacion.data.attr('id-tesorero'));

                    });
                    Conciliacion.NewCuenta.val(Conciliacion.dataCuenta.text().substr(7));
                    Conciliacion.NewSucursal.val(Conciliacion.data.attr('id-sucursal'));
                    Conciliacion.NewBanco.val(Conciliacion.data.attr('id-banco'));
                    Conciliacion.NewEmpresa.val(Conciliacion.data.attr('id-empresa'));
                });
    
               /*********************************************************/
                Conciliacion.Beneficiario.change(function(){
                    if($(this).val()==='edit'){
                        $(this).val('');
                        Conciliacion.modalOpcionesBeneficiarios.modal('show');
                    }
                });

                Conciliacion.botonModalNuevoBeneficiario.click(function(){
                    Conciliacion.actualizarId = 0;
                    Conciliacion.modalOpcionesBeneficiarios.modal('hide');
                    Conciliacion.modalNuevoBeneficiario.modal('show');
                    Conciliacion.FormularioBeneficiario[0].reset();
                    Conciliacion.tituloModalBeneficiario.text('Agregar nuevo beneficiario');
                });
    
                Conciliacion.botonModalEditarBeneficiario.click(function(){
                    Conciliacion.modalOpcionesBeneficiarios.modal('hide');
                    Conciliacion.modalEditarBeneficiario.modal('show');
                    MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{recargarListaBeneficiarios:true},(error,respuesta)=>{ 
                        Conciliacion.cargarListaBeneficiarios.html(respuesta);
                    });
                });

                Conciliacion.FormularioBeneficiario.submit(function(e){
                    e.preventDefault();
                    if(Conciliacion.validarBeneficiario()){
                        let data = new FormData(Conciliacion.FormularioBeneficiario[0]);
                        if(Conciliacion.actualizarId > 0)
                            data.append('actualizarBeneficiario', Conciliacion.actualizarId)
                        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php",data,(error,respuesta)=>{ 
                            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                            if(!respuesta.error){
                                if(Conciliacion.actualizarId > 0){//se realizó una actualización
                                    Conciliacion.data.html('<span class="ocultar768 encabezado-min">Beneficiario:</span><span class="textoMay">'+Conciliacion.Newbeneficiario.val()+'</span>');
                                    Conciliacion.modalNuevoBeneficiario.modal('hide');
                                } 
                                Conciliacion.Beneficiario.html(respuesta.data);
                                Conciliacion.FormularioBeneficiario[0].reset();
                            }  
                        });
                    }
                });

                Conciliacion.cargarListaBeneficiarios.on('click','.clickStatusBeneficiario',function(){
                    $(this).toggleClass('seleccion-On');
                    $(this).hasClass('seleccion-On') ? Conciliacion.realizarCambios(true,$(this),'beneficiarios') : Conciliacion.realizarCambios(false,$(this),'beneficiarios'); 
                });

                Conciliacion.cargarListaBeneficiarios.on('click','.actualizarBeneficiario',function(){
                    Conciliacion.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                    Conciliacion.data = $(this).parent().siblings('.getBeneficiario');
                    Conciliacion.FormularioBeneficiario[0].reset();
                    Conciliacion.tituloModalBeneficiario.text('Actualizar datos del beneficiario');
                    Conciliacion.modalNuevoBeneficiario.modal('show');
                    Conciliacion.Newbeneficiario.val(Conciliacion.data.text().substr(13));
                });

                /*********************************************************/
                Conciliacion.Concepto.change(function(){
                    if($(this).val()==='edit'){
                        $(this).val('');
                        Conciliacion.modalOpcionesConceptos.modal('show');
                    }
                });

                Conciliacion.botonModalNuevoConcepto.click(function(){
                    Conciliacion.actualizarId = 0;
                    Conciliacion.modalOpcionesConceptos.modal('hide');
                    Conciliacion.modalNuevoConcepto.modal('show');
                    Conciliacion.FormularioConceptoMovimiento[0].reset();
                    Conciliacion.tituloModalConcepto.text('Agregar nuevo concepto');
                });
    
                Conciliacion.botonModalEditarConcepto.click(function(){
                    Conciliacion.modalOpcionesConceptos.modal('hide');
                    Conciliacion.modalEditarConcepto.modal('show');
                    MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{recargarListaConceptos:true},(error,respuesta)=>{ 
                        Conciliacion.cargarListaConceptos.html(respuesta);
                    });
                });

                Conciliacion.FormularioConceptoMovimiento.submit(function(e){
                    e.preventDefault();
                    if(Conciliacion.validarConceptoMovimiento()){
                        let data = new FormData(Conciliacion.FormularioConceptoMovimiento[0]);
                        if(Conciliacion.actualizarId > 0)
                            data.append('actualizarConcepto', Conciliacion.actualizarId)
                        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php",data,(error,respuesta)=>{ 
                            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                            if(!respuesta.error){
                                if(Conciliacion.actualizarId > 0){//se realizó una actualización
                                    Conciliacion.data.html('<span class="ocultar768 encabezado-min">Concepto:</span><span class="textoMay">'+Conciliacion.NewconceptoMovimiento.val()+'</span>');
                                    Conciliacion.modalNuevoConcepto.modal('hide');
                                } 
                                Conciliacion.Concepto.html(respuesta.data);
                                Conciliacion.FormularioConceptoMovimiento[0].reset();
                            }  
                        });
                    }
                });

                Conciliacion.cargarListaConceptos.on('click','.clickStatusConcepto',function(){
                    $(this).toggleClass('seleccion-On');
                    $(this).hasClass('seleccion-On') ? Conciliacion.realizarCambios(true,$(this),'conceptos') : Conciliacion.realizarCambios(false,$(this),'conceptos'); 
                });

                Conciliacion.cargarListaConceptos.on('click','.actualizarConcepto',function(){
                    Conciliacion.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                    Conciliacion.data = $(this).parent().siblings('.getConcepto');
                    Conciliacion.FormularioConceptoMovimiento[0].reset();
                    Conciliacion.tituloModalConcepto.text('Actualizar conceptos');
                    Conciliacion.modalNuevoConcepto.modal('show');
                    Conciliacion.NewconceptoMovimiento.val(Conciliacion.data.text().substr(9));
                });
                /*********************************************************/
                Conciliacion.ClasificacionCargos.change(function(){
                    Conciliacion.validarCambioClasificacionMovimientos(Conciliacion.ClasificacionCargos,Conciliacion.Folio,Conciliacion.Factura,Conciliacion.detalleNomina,Conciliacion.Tmovimiento,true);

                    /*Conciliacion.Folio.prop('disabled',true);
                    Conciliacion.Factura.prop('disabled',true);
                    Conciliacion.detalleNomina.prop('disabled',true);
                    Conciliacion.Folio.val('');
                    Conciliacion.Factura.val('');
                    
                    if($(this).val()==='edit'){
                        $(this).val('');
                        Conciliacion.modalOpcionesMovimientos.modal('show');18143
                    }

                    else if($(this).val() !='' && Conciliacion.Tmovimiento.val() == 2){
                        let cadena = $('option:selected',Conciliacion.ClasificacionCargos).text().toLowerCase();
                        cadena = cadena.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                        if( cadena.indexOf("nomina") !== -1)
                            Conciliacion.Folio.prop('disabled',false);
                        else if( cadena.indexOf("cliente") !== -1)
                            Conciliacion.Factura.prop('disabled',false);
                    }*/
                });

                Conciliacion.ClasificacionCargosAC.change(function(){
                    Conciliacion.validarCambioClasificacionMovimientos(Conciliacion.ClasificacionCargosAC,Conciliacion.FolioAC,Conciliacion.FacturaAC,Conciliacion.detalleNominaAC,Conciliacion.TmovimientoAC);
                });

                Conciliacion.Folio.on('input',function(){
                    Conciliacion.validarBotonDetalleNomina(Conciliacion.Folio,Conciliacion.detalleNomina);
                    //$(this).val().length > 0 ? Conciliacion.detalleNomina.prop('disabled',false) : Conciliacion.detalleNomina.prop('disabled',true);
                });

                Conciliacion.FolioAC.on('input',function(){
                    Conciliacion.validarBotonDetalleNomina(Conciliacion.FolioAC,Conciliacion.detalleNominaAC);
                });

                Conciliacion.detalleNomina.click(function(){
                    //Conciliacion.validacionDetalleNomina(Conciliacion.detalleNomina,Conciliacion.Folio);

                   /* if( Conciliacion.Folio.val().length  < 1 ){
                        $(this).prop('disabled',false)
                            return;
                    }*/
                    Conciliacion.obtenerDatosNomina(Conciliacion.Folio.val());
                });

                Conciliacion.detalleNominaAC.click(function(){
                    Conciliacion.obtenerDatosNomina(Conciliacion.FolioAC.val());
                });

                Conciliacion.botonModalNuevoMovimiento.click(function(){
                    Conciliacion.actualizarId = 0;
                    Conciliacion.modalOpcionesMovimientos.modal('hide');
                    Conciliacion.modalNuevoMovimiento.modal('show');
                    Conciliacion.formularioClasificacionCargos[0].reset();
                    Conciliacion.tituloModalMovimiento.text('Agregar nueva clasificación de movimiento');
                });
    
                Conciliacion.botonModalEditarMovimiento.click(function(){
                    Conciliacion.modalOpcionesMovimientos.modal('hide');
                    Conciliacion.modalEditarMovimiento.modal('show');
                    MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{recargarListaMovimientos:true},(error,respuesta)=>{ 
                        Conciliacion.cargarListaMovimientos.html(respuesta);
                    });
                });

                Conciliacion.formularioClasificacionCargos.submit(function(e){
                    e.preventDefault();
                    if(Conciliacion.validarClasificacionCargos()){
                        let data = new FormData(Conciliacion.formularioClasificacionCargos[0]);
                        if(Conciliacion.actualizarId > 0)
                            data.append('actualizarMovimiento', Conciliacion.actualizarId)
                        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxConciliacion.php",data,(error,respuesta)=>{ 
                            MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                            if(!respuesta.error){
                                if(Conciliacion.actualizarId > 0){//se realizó una actualización
                                    Conciliacion.data.html('<span class="ocultar768 encabezado-min">Tipo movimiento:</span><span class="textoMay">'+ $('option:selected',Conciliacion.NewtipomMovimiento).text() + '</span>');
                                    Conciliacion.dataNombre.html('<span class="ocultar768 encabezado-min">Nombre:</span>' + Conciliacion.NewnombreConcepto.val());
                                    Conciliacion.data.attr('dataTipo',Conciliacion.NewtipomMovimiento.val());
                                    Conciliacion.data.attr('dataDescripcion',Conciliacion.Newdescripcion.val());
                                    Conciliacion.data.attr('dataNota',Conciliacion.Newnota.val());
                                    Conciliacion.modalNuevoMovimiento.modal('hide');
                                } 
                                Conciliacion.ClasificacionCargos.html(respuesta.data);
                                Conciliacion.formularioClasificacionCargos[0].reset();
                            }  
                        });
                    }
                });

               Conciliacion.cargarListaMovimientos.on('click','.clickStatusMovimiento',function(){
                    $(this).toggleClass('seleccion-On');
                    $(this).hasClass('seleccion-On') ? Conciliacion.realizarCambios(true,$(this),'movimientos') : Conciliacion.realizarCambios(false,$(this),'movimientos'); 
                });

                Conciliacion.cargarListaMovimientos.on('click','.actualizarMovimiento',function(){
                    Conciliacion.actualizarId = parseInt($(this).parent().parent().attr('data'));//id a actualizar
                    Conciliacion.data = $(this).parent().siblings('.getData');
                    Conciliacion.dataNombre = $(this).parent().siblings('.getNombre');
                    Conciliacion.formularioClasificacionCargos[0].reset();
                    Conciliacion.tituloModalConcepto.text('Actualizar clasificación de movimiento');
                    Conciliacion.modalNuevoMovimiento.modal('show');
                    Conciliacion.NewtipomMovimiento.val(Conciliacion.data.attr('dataTipo'));
                    Conciliacion.NewnombreConcepto.val(Conciliacion.dataNombre.text().substr(7));
                    Conciliacion.Newdescripcion.val(Conciliacion.data.attr('dataDescripcion'));
                    Conciliacion.Newnota.val(Conciliacion.data.attr('dataNota')); 
                });
                 
                Conciliacion.Tmovimiento.change(function(){
                    Conciliacion.validacionMovimiento($(this).val(),Conciliacion.Folio,Conciliacion.Factura,Conciliacion.detalleNomina,Conciliacion.Status,Conciliacion.NuPoliza,Conciliacion.ClasificacionCargos,Conciliacion.FechaCobro);
                });

                Conciliacion.TmovimientoAC.change(function(){
                    Conciliacion.validacionMovimiento($(this).val(),Conciliacion.FolioAC,Conciliacion.FacturaAC,Conciliacion.detalleNominaAC,Conciliacion.StatusAC,Conciliacion.NuPolizaAC,Conciliacion.ClasificacionCargosAC,Conciliacion.FechaCobroAC);
                });

                Conciliacion.Status.change(function(){
                    Conciliacion.validacionStatus($(this),Conciliacion.Tmovimiento,Conciliacion.FechaCobro);
                });

                Conciliacion.StatusAC.change(function(){
                    Conciliacion.validacionStatus($(this),Conciliacion.TmovimientoAC,Conciliacion.FechaCobroAC);
                });

                Conciliacion.listaPrincipal.on('click','.botonMostrar',function(){
                    Conciliacion.actualizarId = $(this).parent().parent().parent().attr('data');
                    Conciliacion.thisReference = $(this).parent().parent();                         
                    Conciliacion.mostrarDataActualizar();
                });

                 Conciliacion.botonEditar.click(function(){
                    Conciliacion.activarCamposEditables.prop('disabled',false);
                    $(this).hide();
                    Conciliacion.botonGuardarEdicion.show();

                    if(Conciliacion.FacturaAC.val() !== "")
                        Conciliacion.FacturaAC.prop('disabled',false);
                    if(Conciliacion.FolioAC.val() !== ""){
                        Conciliacion.FolioAC.prop('disabled',false);
                        Conciliacion.detalleNominaAC.prop('disabled',false);
                    }
                    if(Conciliacion.TmovimientoAC.val() == 1){
                        Conciliacion.NuPolizaAC.prop('disabled',false);
                        Conciliacion.FechaCobroAC.prop('disabled',false);
                    }
                
                 });

                Conciliacion.FormConciliacion.submit(function(e){   
                    e.preventDefault();
                    if( Conciliacion.ValidacionAclaracion( Conciliacion.Cuenta,Conciliacion.FechaMovimiento,Conciliacion.Tmovimiento,Conciliacion.MontoCheque,Conciliacion.Status,Conciliacion.FechaCobro,Conciliacion.NuPoliza,Conciliacion.Concepto,Conciliacion.Beneficiario,Conciliacion.ClasificacionCargos,Conciliacion.Factura,Conciliacion.Folio,Conciliacion.Comentarios) ){
                        if( Conciliacion.validarFecha(Conciliacion.FechaMovimiento.val(),false) ){
                            MetodosDiversos.crearRegistro('La fecha de movimiento es distinta a la actual', 'Si deseas guardar el registro así, \n\n\neste no se guardará directamente, necesitará autorización de la persona encargada para guardarse permanentemente' ,function(respuesta){
                                if(respuesta){
                                    MetodosDiversos.crearRegistro('Por favor confirme de nuevo', '' ,function(respuesta){
                                        if(respuesta)
                                            Conciliacion.enviarFormularioPrincipal(Conciliacion.FormConciliacion);
                                    });
                                }
                            });
                        }
                        else
                            Conciliacion.enviarFormularioPrincipal(Conciliacion.FormConciliacion);
                    }   
                });

                Conciliacion.FormConciliacionAC.submit(function(e){
                    Conciliacion.cadenaNotificaciones = "";
                    e.preventDefault();
                    if( Conciliacion.ValidacionAclaracion( Conciliacion.CuentaAC,Conciliacion.FechaMovimientoAC,Conciliacion.TmovimientoAC,Conciliacion.MontoChequeAC,Conciliacion.StatusAC,Conciliacion.FechaCobroAC,Conciliacion.NuPolizaAC,Conciliacion.ConceptoAC,Conciliacion.BeneficiarioAC,Conciliacion.ClasificacionCargosAC,Conciliacion.FacturaAC,Conciliacion.FolioAC,Conciliacion.ComentariosAC) ){
                        
                        let fecha = Conciliacion.validarFecha(Conciliacion.FechaMovimientoAC.val(),true);
                        let tipo=false;
                        let monto=false;
                        if(Conciliacion.fechaHoy !== Conciliacion.FechaMovimientoAC.val()){//Sí el día de hoy se hizo un registro y se actualiza el mismo día de hoy el campo tipo de movimiento (por ejemplo cambiar ingreso por egreso) o cambiar la cantidad, en este caso no me afecta ya que aún no se realiza el corte del día en curso
                            tipo = Conciliacion.validarTipo();
                            monto = Conciliacion.validarMonto();
                        }
                        if( fecha || tipo || monto ){
                            MetodosDiversos.crearRegistro('<ol>'+Conciliacion.cadenaNotificaciones+'</ol>', "Si deseas guardar el registro así, este no se guardará directamente, necesitará autorización de la persona encargada para guardarse permanentemente" ,function(respuesta){
                                if(respuesta){
                                    MetodosDiversos.crearRegistro('Por favor confirme de nuevo', '' ,function(respuesta){
                                        if(respuesta){
                                            Conciliacion.enviarFormularioPrincipal(Conciliacion.FormConciliacionAC);
                                        } 
                                    });
                                }
                            });
                        }
                        else
                            Conciliacion.enviarFormularioPrincipal(Conciliacion.FormConciliacionAC);
                    }   
                });
/**********************************PAginador y filtro**************************/
                $('#consultar').on('click','.conciliacion',function(e){
                    e.preventDefault();
                    Conciliacion.paginar($(this));
                });

                Conciliacion.limpiarFiltros.click(function(){
                    Conciliacion.limpiar();
                });

                Conciliacion.filtroFolio.on('input',function(){
                    Conciliacion.filtros()
                });
                Conciliacion.filtroMonto.on('input',function(){
                    Conciliacion.filtros()
                });
                Conciliacion.filtroCuenta.change(function(){
                    Conciliacion.filtros()
                });
                Conciliacion.filtroTipo.change(function(){
                    Conciliacion.filtros()
                });
/************************************************************************************/

                Conciliacion.botonAutorizar.click(function(){
                    MetodosDiversos.crearRegistro('Está seguro que desea autorizar', '' ,function(respuesta){
                        if(respuesta){
                            let contadorError = setTimeout(Conciliacion.mensajeError,Conciliacion.tiempo);
                            MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',240000);
                            MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{autorizarRegistro:Conciliacion.actualizarId},(error,respuesta)=>{ 
                                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                                if(error){
                                    clearTimeout(contadorError);//detenemos el contador de error
                                    return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
                                }
                                Conciliacion.modalData.modal('hide');
                                clearTimeout(contadorError);//detenemos el contador de error
                                Conciliacion.listaPrincipal.html(respuesta.data);
                                Conciliacion.mostrarPaginador.html(respuesta.paginador);
                                Conciliacion.labelTotalRegistros.html(respuesta.total);
                            });
                        }
                    });
                });

                Conciliacion.botonNoAutorizar.click(function(){
                    MetodosDiversos.crearRegistro('Está seguro que no desea autorizar', 'Este registro será eliminado' ,function(respuesta){
                        if(respuesta){
                            let contadorError = setTimeout(Conciliacion.mensajeError,Conciliacion.tiempo);
                            MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',240000);
                            MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{eliminarRegistro:Conciliacion.actualizarId},(error,respuesta)=>{ 
                                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                                if(error){
                                    clearTimeout(contadorError);//detenemos el contador de error
                                    return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
                                }
                                Conciliacion.modalData.modal('hide');
                                clearTimeout(contadorError);//detenemos el contador de error
                                Conciliacion.listaPrincipal.html(respuesta.data);
                                Conciliacion.mostrarPaginador.html(respuesta.paginador);
                                Conciliacion.labelTotalRegistros.html(respuesta.total);
                            });
                        }
                    });
                });


                Conciliacion.listaPrincipal.on('click','.botonEliminar',function(e){
                    e.preventDefault();
                    Conciliacion.actualizarId = $(this).parent().parent().parent().parent().parent().attr('data');
                    MetodosDiversos.crearRegistro('Estas seguro que deseas eliminar el registro', '' ,function(respuesta){
                        if(respuesta){
                            let contadorError = setTimeout(Conciliacion.mensajeError,Conciliacion.tiempo);
                            MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',240000);
                            MetodosDiversos.consultaAjaxData("controllers/AjaxConciliacion.php",{eliminarRegistro:Conciliacion.actualizarId},(error,respuesta)=>{ 
                                MetodosDiversos.mostrarRespuesta(respuesta.tipo,respuesta.titulo,respuesta.subtitulo,respuesta.tiempo,respuesta.boton);
                                if(error){
                                    clearTimeout(contadorError);//detenemos el contador de error
                                    return;  //En caso de algún error intencionado(validaciones realizadas en el lado del servidor) o que sea una respuesta por parte del servidor(error de sintaxis o cualquier otro tipo por parte de nuestro código) disparamos esta línea y salimos; 
                                }
                                Conciliacion.modalData.modal('hide');
                                clearTimeout(contadorError);//detenemos el contador de error
                                Conciliacion.listaPrincipal.html(respuesta.data);
                                Conciliacion.mostrarPaginador.html(respuesta.paginador);
                                Conciliacion.labelTotalRegistros.html(respuesta.total);
                            });
                        }
                    });
                });

                Conciliacion.cargarArchivo.change(function(e){
                    MetodosDiversos.mostrarRespuesta('','<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',' Por favor espere...',240000,false);
                    let file = e.target.files[0];
                    let valido = (/\.(?=xlsx)/gi).test(file.name);
                    if (!valido) {
                        Conciliacion.cargarArchivo.val('');
                        swal("Formato no válido", "Formatos válido: .xlsx", "error").catch(swal.noop);
                        MetodosDiversos.mostrarRespuesta('error',"Formato no válido", "Formatos válido: .xlsx",60000,true);
                        return;
                    }
                    let formulario = new FormData (Conciliacion.formularioCargarLayout[0]);
                    Conciliacion.cargaManual(formulario);
                });
        }
    }

    
    Conciliacion.main();
             
              
  