class PaginadorClientes{
    static init(){
        PaginadorClientes.buscador = $('#buscadorClientes');
        PaginadorClientes.dataPrincipal =$('#dataClientes');
        PaginadorClientes.mostrarPaginador = $('.paginadorClientes');
        PaginadorClientes.totalRegistros = $('#totalClientes');
        PaginadorClientes.status = $('#filtroVisualizacionCliente');
        PaginadorClientes.contenedorPrincipal = $('#configurar');
        PaginadorClientes.totalRegistros2 = $('#totalClientesAsignados');
    }


    static paginar(elemento){
        let datos = new FormData();
        datos.append("paginaActual2", $(elemento).parent().attr("actual"));
        datos.append("registrosPorPagina", $(elemento).parent().parent().attr("registros"));
        datos.append("target", $(elemento).parent().parent().attr("target"));
        datos.append("cliente", $(elemento).parent().parent().attr("cliente"));
        datos.append("status", $(elemento).parent().parent().attr("autorizacion"));
        PaginadorClientes.recargarPaginador(datos);
    }

    static filtros(){
        let datos = new FormData();
        datos.append("paginaActual2", 1);
        datos.append("registrosPorPagina", PaginadorClientes.mostrarPaginador.find('ul').attr('registros'));
        datos.append("target", PaginadorClientes.mostrarPaginador.find('ul').attr('target'));
        datos.append("cliente", PaginadorClientes.buscador.val().trim());
        datos.append("status", PaginadorClientes.status.val());
        PaginadorClientes.recargarPaginador(datos);
    }

    static recargarPaginador(datos){
        PaginadorClientes.dataPrincipal.html('<div style="text-align:center"><i class="fa fa-circle-o-notch fa-pulse fa-fw" style="font-size:110px;margin-top:5%;margin-bottom:5%;color:#3489df;"></i></div>');
        MetodosDiversos.consultaAjaxFormulario("controllers/AjaxNominas.php", datos,(error,respuesta)=>{
            if(error)console.log('error',error);
            else {
                console.log(respuesta)
                PaginadorClientes.dataPrincipal.html(respuesta.html);
                PaginadorClientes.mostrarPaginador.html(respuesta.paginador);
                PaginadorClientes.totalRegistros.html(respuesta.total);
                PaginadorClientes.totalRegistros2.html(respuesta.total2);
            }
        });
    }

    static realizarCambios(tipo,referencia){
       
        MetodosDiversos.consultaAjaxData("controllers/AjaxNominas.php",{cambioClientes:referencia.attr('data'),capturista:PaginadorClientes.status.val(),tipoMovimiento:tipo},(error,respuesta)=>{ 
            console.log(respuesta)
            if(respuesta.error || error){
                referencia.prop('checked',false);
                MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','Intentalo de nuevo',30000,true);
            }
            else{
                PaginadorClientes.totalRegistros2.text(respuesta.total);
                if(respuesta.actualizar){
                    Nominas.aceptarActualizar();
                    Nominas.filtroCliente.html(respuesta.clientes);
                }       
            }          
        });
    }

    static main(){
        PaginadorClientes.init();
        PaginadorClientes.buscador.on('input',function(){
            PaginadorClientes.filtros();
        });
        PaginadorClientes.status.change(function(){
            PaginadorClientes.filtros();
        });

        PaginadorClientes.contenedorPrincipal.on('click','.clientes-finanzas',function(e){
            e.preventDefault();
            PaginadorClientes.paginar($(this));
        });

        PaginadorClientes.contenedorPrincipal.on('click','.seleccion-cliente',function(){
            if($(this).prop('checked'))
                PaginadorClientes.realizarCambios(true,$(this));
            else
                PaginadorClientes.realizarCambios(false,$(this));
        });
    }
}

PaginadorClientes.main();