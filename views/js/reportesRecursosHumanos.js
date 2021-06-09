class reportesRh{

    static init (){
        reportesRh.sucursalSolicitudes = $('#sucursalPermisoReporte');
        reportesRh.cargarUsuariosSolicitudes = $('#targetUsuarioPermisoReportes');
        reportesRh.sucursalVacaciones = $('#sucursalVacaciones');
        reportesRh.cargarUsuariosVacaciones = $('#targetUsuarioVacacionesReportes'); 
        reportesRh.sucursalVigente =  $('#sucursalVigente'); 
        reportesRh.cargarUsuariosVigentes = $('#targetUsuarioVigente');
    }

    static listarEmpleados(valor,target){
        target.empty();
        target.append('<option value="0">TODOS</option>');
        $.ajax({
            type: "POST",
            url: ruta_server + "controllers/AjaxReportes.php",
            dataType: "json",
            data: { listaUsuarios : valor}
        }).done(function(respuesta) {
            let total = respuesta.length;
            for(let i = 0; i<total;i++)
                target.append('<option value='+respuesta[i].id+'>'+respuesta[i].name+'</option>');
        }).fail(function(error) {
            console.log('Ocurrio un error:', error);
        });
    }

    static main(){
        reportesRh.init();

        reportesRh.sucursalSolicitudes.change(function(){
            if($(this).val() != 0)
                reportesRh.listarEmpleados($(this).val(),reportesRh.cargarUsuariosSolicitudes);
            else
                reportesRh.cargarUsuariosSolicitudes.html('<option value="0">TODOS</option>');
        });

        reportesRh.sucursalVacaciones.change(function(){
            if($(this).val() != 0)
                reportesRh.listarEmpleados($(this).val(),reportesRh.cargarUsuariosVacaciones);
            else
                reportesRh.cargarUsuariosVacaciones.html('<option value="0">TODOS</option>');
        });

        reportesRh.sucursalVigente.change(function(){
            if($(this).val() != 0)
                reportesRh.listarEmpleados($(this).val(),reportesRh.cargarUsuariosVigentes);
            else
                reportesRh.cargarUsuariosVigentes.html('<option value="0">TODOS</option>');
        });


    }
}

reportesRh.main();
