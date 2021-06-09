class Clientes{

    static init(){
        Clientes.contenedorClientes = $('#contenedorClientes');
        Clientes.areaAgregarContacto = $('#areaContacto');
        Clientes.areaAgregarFacturadora = $('#areaFacturadora');
        Clientes.areaAgregarImss = $('#areaImss');
        Clientes.areaAgregarAsimilados = $('#areaAsimilados');
        Clientes.botonCancelarFormulario = $('#cancelarClientes');
        Clientes.formulario = $('#formularioClientes');
        Clientes.facturadoras='';
        Clientes.imss='';
        Clientes.asimilados='';
    }

    static resetear(){
        Clientes.formulario[0].reset();
        Clientes.areaAgregarContacto.html('');
    }

    static cargarClientes(){
        MetodosDiversos.consultaAjaxData("controllers/AjaxClientes.php",{cargarEmpresas:true},(error,respuesta)=>{
            if(!error){
                Clientes.facturadoras=respuesta.facturadoras;
                Clientes.imss=respuesta.imss;
                Clientes.asimilados=respuesta.asimilados;
            }  
        });
    }

    static main(){

        Clientes.init();
        
        Clientes.contenedorClientes.on('click','.agregarContacto',function(){
            Clientes.areaAgregarContacto.append(
                '<div class="row form-group">'+
                        '<div class="col-md-1 text-center">'+ 
                            '<i class="fa fa-minus-circle text-red fa-3x borrarCliente" style="cursor:pointer;"></i>'+
                        '</div>'+
                        '<div class="col-md-5">'+
                            '<li>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-addon">'+
                                        '<i class="fa fa-user"></i>'+
                                    '</div>'+
                                    '<input class="form-control textoMay" type="text" name="regimen" required>'+
                                '</div>'+
                            '</li>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<div class="input-group">'+
                                '<div class="input-group-addon">'+
                                    '<i class="fa fa-envelope-o"></i>'+
                                '</div>'+
                                '<input class="form-control textoMay" type="text" name="nombre" required>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<div class="input-group">'+
                                '<div class="input-group-addon">'+
                                    '<i class="fa fa-phone"></i>'+
                                '</div>'+
                                '<input class="form-control textoMay" type="text" name="nombre" required>'+
                            '</div>'+
                        '</div>'+
                '</div>'
            );
        });

        Clientes.contenedorClientes.on('click','.borrarCliente',function(){
            $(this).parent().parent().remove();
        });


        Clientes.contenedorClientes.on('click','.agregarFacturadora',function(){
            Clientes.areaAgregarFacturadora.append(
                '<div class="row form-group">'+
                    '<div class="col-md-1 text-center">'+ 
                        '<i class="fa fa-minus-circle text-red fa-3x borrarFacturadora" style="cursor:pointer;"></i>'+
                    '</div>'+
                    '<div class="col-md-10">'+
                        '<li>'+
                            '<div class="input-group">'+
                                '<div class="input-group-addon">'+
                                    '<i class="fa fa-user"></i>'+
                                '</div>'+
                                '<select class="form-control textoMay" name="facturadora">'+
                                    '<option></option>'+
                                    Clientes.facturadoras+
                                '</select>'+
                            '</div>'+
                        '</li>'+
                    '</div>'+
                '</div>'
            );
        });

        Clientes.contenedorClientes.on('click','.borrarFacturadora',function(){
            $(this).parent().parent().remove();
        });



        Clientes.contenedorClientes.on('click','.agregarImss',function(){
            Clientes.areaAgregarImss.append(
                '<div class="row form-group">'+
                    '<div class="col-md-1 text-center">'+ 
                        '<i class="fa fa-minus-circle text-red fa-3x borrarImss" style="cursor:pointer;"></i>'+
                    '</div>'+
                    '<div class="col-md-10">'+
                        '<li>'+
                            '<div class="input-group">'+
                                '<div class="input-group-addon">'+
                                    '<i class="fa fa-user"></i>'+
                                '</div>'+
                                '<select class="form-control textoMay" name="facturadora">'+
                                    '<option></option>'+
                                    Clientes.imss+
                                '</select>'+
                            '</div>'+
                        '</li>'+
                    '</div>'+
                '</div>'
            );
        });

        Clientes.contenedorClientes.on('click','.borrarImss',function(){
            $(this).parent().parent().remove();
        });

        Clientes.contenedorClientes.on('click','.agregarAsimilados',function(){
            Clientes.areaAgregarAsimilados.append(
                '<div class="row form-group">'+
                    '<div class="col-md-1 text-center">'+ 
                        '<i class="fa fa-minus-circle text-red fa-3x borrarAsimilados" style="cursor:pointer;"></i>'+
                    '</div>'+
                    '<div class="col-md-10">'+
                        '<li>'+
                            '<div class="input-group">'+
                                '<div class="input-group-addon">'+
                                    '<i class="fa fa-user"></i>'+
                                '</div>'+
                                '<select class="form-control textoMay" name="facturadora">'+
                                    '<option></option>'+
                                    Clientes.asimilados+
                                '</select>'+
                            '</div>'+
                        '</li>'+
                    '</div>'+
                '</div>'
            );
        });

        Clientes.contenedorClientes.on('click','.borrarAsimilados',function(){
            $(this).parent().parent().remove();
        });

        Clientes.botonCancelarFormulario.click(function(){
            Clientes.resetear();
        });

        Clientes.cargarClientes();
    }
}

Clientes.main();