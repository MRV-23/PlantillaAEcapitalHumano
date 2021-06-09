class Asistencias{

    static init(){
        /**####################### CHECADOR ############################ */
        Asistencias.btnAsistencia = $('#btnAsistencia');
        Asistencias.led1 = $('#led1');
        Asistencias.led2 = $('#led2');
        Asistencias.led3 = $('#led3');
        Asistencias.listaAsistencias = $('#listaAsistencias');
        Asistencias.isTouchDevice = 'ontouchstart' in document.documentElement;
        Asistencias.timer = null;
        Asistencias.acumulador = 0;
        Asistencias.filtroFecha = $('#fechaConsulta');
        Asistencias.fechaActual = Asistencias.filtroFecha.val();
         /**####################### VARIABLES Asistencias ############################ */
        Asistencias.huella = $('#huella');
        Asistencias.restringido = $('#restringido');
        Asistencias.led1 = $('#led1');
        Asistencias.Horas = $("#horas");
        Asistencias.Segundos = $("#segundos");
        Asistencias.Minutos = $("#minutos");
        Asistencias.ampm = $("#ampm");
        Asistencias.DiaSemana = $("#diaSemana");
        Asistencias.Dia = $("#dia");
        Asistencias.Mes = $("#mes");
        Asistencias.Anio = $("#anio");
        Asistencias.semana = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
        Asistencias.meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        Asistencias.span = $('#spanmobile');
    /* ---------------------------------------*/
        Asistencias.fecha = new Date();
        Asistencias.status = '';
        Asistencias.sistemaOP = '';
    /**####################### variables descarga de archivo asistencias ############################ */
        Asistencias.btnDescarga = $("#reportePersonalAsistencias");
    }
    /**####################### funciones Asistencias ############################ */
    static horaAsistencias(){

        var fecha = new Date(),
        ampm,
        hora = fecha.getHours(),
        minutos = fecha.getMinutes(),
        segundos = fecha.getSeconds(),
        diaSemana = fecha.getDay(),
        dia = fecha.getDate(),
        mes = fecha.getMonth(),
        anio = fecha.getFullYear();      
        Asistencias.DiaSemana.text(Asistencias.semana[diaSemana]);
        Asistencias.Dia.text(dia);
        Asistencias.Mes.text(Asistencias.meses[mes]);
        Asistencias.Anio.text(anio);
    
        (hora>=12) ? ampm = "PM" : ampm = "AM";
        if(ampm = "PM"){
            hora - 12;
        }else if(hora == 0){
            hora = 12;
        }
        (hora<10) ? Asistencias.Horas.text("0"+hora) : Asistencias.Horas.text(hora);
        (minutos<10) ? Asistencias.Minutos.text("0"+minutos) : Asistencias.Minutos.text(minutos);
        (segundos<10) ? Asistencias.Segundos.text("0"+segundos) : Asistencias.Segundos.text(segundos);
        Asistencias.ampm.text(ampm);
    }

    static reojMostrar(){
        let ua= navigator.userAgent;
        Asistencias.sistemaOP = ua.match(/Windows/g)
        //console.log("Este es tu sistema: "+Asistencias.sistemaOP)
        //Asistencias.sistemaOP='ios'
        if(Asistencias.sistemaOP == "Windows" ){
            Asistencias.restringido.hide();
            Asistencias.btnAsistencia.show();
        }else{
            Asistencias.btnAsistencia.hide();
            Asistencias.restringido.show();
            Asistencias.span.html('<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error de dispositivo!</h4>Por favor intente registrar en un dispositivo correcto o contacte al equipo de SUPORT</div>');
        } 
    }

    static statusRegistro(){
        var hora = Asistencias.fecha,horaEstatus = hora.getHours();;
        //var horaEstatus = 19;
        try {
            if (horaEstatus >= 7 && horaEstatus < 19 ){
                console.log("La hora es1: "+horaEstatus);
                Asistencias.statusAsistencias(horaEstatus)
                return;
            }else if(horaEstatus >= 19 & horaEstatus < 24){
                console.log("Se marcara como salida");
                Asistencias.statusAsistencias(6)
                return;
            }
            console.log("Error en hora 'desconocida'")
        } catch (error){
            console.log('Error en hora: '+error.message);
        }

    }

    static statusAsistencias(hora){
        var  statushora = new Array();
        
        statushora["8"] = 1;
        statushora["9"] = 2;
        statushora["10"] = 3;
        statushora["11"] = 3;
        statushora["12"] = 3;
        statushora["13"] = 3;
        statushora["14"] = 4;
        statushora["15"] = 4;
        statushora["16"] = 5;
        statushora["17"] = 5;
        statushora["18"] = 5;
        statushora["19"] = 6;

        /*statushora["8"] = 0;
        statushora["9"] = 1;
        statushora["10"] = 2;
        statushora["11"] = 2;
        statushora["12"] = 2;
        statushora["13"] = 2;
        statushora["14"] = 3;
        statushora["15"] = 3;
        statushora["16"] = 4;
        statushora["17"] = 4;
        statushora["18"] = 4;
        statushora["19"] = 4;*/
        for (const key in statushora) {
            if (key == hora)
                Asistencias.status = statushora[key];
                console.log("tu status es. "+ Asistencias.status);
                
        }

    }
    /*########################### CHECADOR ############################### */
    static guardarRegistro(){
        Asistencias.released();
        Asistencias.listaAsistencias.append('<div id="loadData" class="loadData"><div><h2 style="color:#fff;">Espere...</h2><i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;color:#3489df;"></i></div></div>');
        let huellas = 'PLUG: ' + Asistencias.plugins();
        
        setTimeout(function(){
            MetodosDiversos.consultaAjaxData("controllers/AjaxAsistencias.php",{registrar:huellas,statusllegada:Asistencias.status },(error,respuesta)=>{
                console.log(respuesta);
                $("#loadData").fadeOut(300,function(){
                    $(this).remove()
                });
                if(respuesta.error || error){
                    MetodosDiversos.mostrarRespuesta('error','Ocurrio un error','¡Intentelo nuevamente!',60000,true);
                    return;
                }

                Asistencias.filtroFecha.val(Asistencias.fechaActual);
                Asistencias.listaAsistencias.html(respuesta.data);
                console.log("La hora antes de alerta es: "+Asistencias.fecha.getHours());
                Asistencias.fecha.getHours() >= 9 && Asistencias.fecha.getHours() <=14 ?MetodosDiversos.mostrarRespuesta('success','Asistencias en Espera','Tu registro sera activo solo si existe permiso de este',6000,true):MetodosDiversos.mostrarRespuesta('success','Asistencias Registrada','El registro fue guardado exitosamente',3000,true);
                //MetodosDiversos.mostrarRespuesta('success','Asistencias Registrada','El registro fue guardado exitosamente',3000,true);
            });
        },1000);
    }

    static plugins(){
        let num_of_plugins=navigator.plugins.length;
        let plug = '';
        for(let i=0;i<num_of_plugins;i++)
            plug += navigator.plugins[i].name;
        return plug;
    }


    static apagarLeds(){
        Asistencias.led1.attr('src','views/img/ledoff.png');
        Asistencias.led2.attr('src','views/img/ledoff.png');
        Asistencias.led3.attr('src','views/img/ledoff.png');
    }

    static pushed(){
        clearInterval(Asistencias.timer);
        Asistencias.timer = setInterval(function () {
            Asistencias.pushed();
        }, 700);
        Asistencias.verificarContador();
    }

    static verificarContador(){
        Asistencias.acumulador++;
        if(Asistencias.acumulador==1)
            Asistencias.led1.attr('src','views/img/ledon.png');
        if(Asistencias.acumulador==2)
            Asistencias.led2.attr('src','views/img/ledon.png');
        if(Asistencias.acumulador==3)
            Asistencias.led3.attr('src','views/img/ledon.png');
        if(Asistencias.acumulador >= 4){
            Asistencias.statusRegistro();
            Asistencias.guardarRegistro();
        }  
    }

    static released(){
        Asistencias.acumulador = 0;
        clearTimeout(Asistencias.timer);
        Asistencias.apagarLeds();
    }

    static desktop(){
        Asistencias.btnAsistencia.mousedown(function() {
            if(Asistencias.isTouchDevice==false)
            Asistencias.pushed();   
        });
        Asistencias.btnAsistencia.mouseup(function() {
            if(Asistencias.isTouchDevice==false)
            Asistencias.released(); 
        });
    }

    static touch(){
        Asistencias.btnAsistencia.on('touchstart', function(e){
            e.preventDefault();
            if(Asistencias.isTouchDevice)
            Asistencias.pushed();   
        });
        Asistencias.btnAsistencia.on('touchend', function(e){
            e.preventDefault();
            if(Asistencias.isTouchDevice)
            Asistencias.released(); 
        });
    }

    static apis(){
       // console.log("Holaa entro:")
       // fetch('http://192.168.0.10/asesores/apis/clientes.php?id="200"',{}) http://192.168.0.10/asesores/apis/clientes.php
        fetch("http://192.168.0.10/asesores/apis/clientes.php?",{})
        .then(response => response.json())
        .then( data => {
            let ArrayData = data.result.data;
            console.log(ArrayData)
            for (let valor of ArrayData) {
                console.log(valor.nombre)
            }
        })


    }

    static datasapi(datas){ 
        console.log("Holaa entro DATAS API")


        for (let valor of datas) {
                
                console.log(valor)
            }

    }

    static main(){//cargarNotificacionesTotal2
        $("#api").click(function(e) {
            e.preventDefault();
            Asistencias.apis();
        });

        /************************ RELOJ ****************************/
        Asistencias.init();
        Asistencias.reojMostrar();
        Asistencias.horaAsistencias();
        setInterval(Asistencias.horaAsistencias,1000);
        /******************************************************** */
        if (Asistencias.isTouchDevice) 
            Asistencias.touch();
        else
            Asistencias.desktop();

        Asistencias.filtroFecha.change(function(){
            Asistencias.listaAsistencias.html('<div style="text-align:center"><i class="fa fa-cog fa-spin fa-fw" style="font-size:110px;margin-top:10%;margin-bottom:10%;color:#3489df;"></i></div>');
            MetodosDiversos.consultaAjaxData("controllers/AjaxAsistencias.php",{actualizarRegistros:$(this).val()},(error,respuesta)=>{
                Asistencias.listaAsistencias.html(respuesta);
            });
        });
            
    }

}
$(function(){
Asistencias.main();
});