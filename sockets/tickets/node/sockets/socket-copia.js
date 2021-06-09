const { io } = require('../server');
const {Ticket,TicketGiro,TicketDesarrollo} = require('../Clases/Ticket');
const cron = require('node-cron');
const fs = require('fs');

let miTicket = new Ticket();
let miTicketGiro = new TicketGiro();
let miTicketDesarrollo = new TicketDesarrollo();

const {Usuarios} = require('../Clases/Usuarios');
let usuarios = new Usuarios();

cron.schedule('* 1 * * *', () => {


    let data = JSON.parse(fs.readFileSync('./node/data/dataDesarrollo.json'));
    if(data.tickets.length > 0){
        miTicketDesarrollo.actualizarCola(data);
    }
    else{
        miTicketDesarrollo.reiniciar();
    }

    let data2 = JSON.parse(fs.readFileSync('./node/data/data.json'));
    if(data2.tickets.length > 0){
        miTicket.actualizarCola(data2);
    }
    else{
        miTicket.reiniciar();
    }
    
    let data3 = JSON.parse(fs.readFileSync('./node/data/dataGiro.json'));
    if(data3.tickets.length > 0){
        miTicketGiro.actualizarCola(data3);
    }
    else{
        miTicketGiro.reiniciar();
    }

});


io.on('connection', (client) => {

    /*CUANDO ALGUIEN SOLICITA UN TICKET, ACTUALIZÓ EL MARCADOR PARA TODOS*/
    client.on('nuevoTicket',(data,callback)=>{
        let categoria = parseInt(data.categoria);
        let folio = parseInt(data.folio);
        let ticket; 
        let atendidos;
        let actual;

        if(categoria === 1){
            ticket = miTicket.siguiente(folio);
            actual = miTicket.getUltimoTicket();
            atendidos = miTicket.getAtendidos();
        }
        else if(categoria === 2){
            ticket = miTicketGiro.siguiente(folio);
            actual = miTicketGiro.getUltimoTicket();
            atendidos = miTicketGiro.getAtendidos();
        }
        else if(categoria === 3){
            ticket = miTicketDesarrollo.siguiente(folio);
            actual = miTicketDesarrollo.getUltimoTicket();
            atendidos = miTicketDesarrollo.getAtendidos();
        }

        callback(ticket);

        client.broadcast.emit('ticketsGenerados',{
            ticket,
            categoria,
            atendidos,
            actual 
        });
    });

    /*AL RECARGAR LA PAGINA OBTENGO EL TOTAL DE TICKETS SOPORTE TÉCNICO*/
    client.emit('actualizarMarcadoresSoporteTecnico',{
        actual: miTicket.getUltimoTicket(),
        atendidos: miTicket.getAtendidos(),
        ultimos3: miTicket.getUltimos3()
    });

     /*AL RECARGAR LA PAGINA OBTENGO EL TOTAL DE TICKETS GIRO*/
     client.emit('actualizarMarcadoresGiro',{
        actual: miTicketGiro.getUltimoTicket(),
        atendidos: miTicketGiro.getAtendidos(),
        ultimos2: miTicketGiro.getUltimos2()
    });

    /*AL RECARGAR LA PAGINA OBTENGO EL TOTAL DE TICKETS DESARROLLO*/
    client.emit('actualizarMarcadoresDesarrollo',{
        actual: miTicketDesarrollo.getUltimoTicket(),
        atendidos: miTicketDesarrollo.getAtendidos(),
        ultimos1: miTicketDesarrollo.getUltimos1()
    });
   
    /*ACTUALIZO LA GRAFICA DE PASTEL DE GIRO */
    client.emit('GraficasTicktesDonaGiro',null);
     /*ACTUALIZO LA GRAFICA DE PASTEL DE SOPORTE */
    client.emit('GraficasTicktesDonaSistemas',null);
    /*ACTUALIZO LA GRAFICA DE BARRAS DE SOPORTE */
    client.emit('GraficasTicktesBarrasSistemas',null);
     /*ACTUALIZO LA GRAFICA DE BARRAS DE SOPORTE */
     client.emit('GraficasTicktesBarrasGiro',null);
   
    /*CUANDO ALGUIEN TOMA UN TICKET PARA ATENDER SOPORTE TÉCNICO, ACTUALIZÓ LOS CONTADORES*/
    client.on('atenderTicketSoporte',(data,callback)=>{
        if(!data.persona){
            return callback({
                error: true,
                mensaje: 'Debe asignarse una persona para atender el ticket'
            });
        }

        let atenderTicket;
        let categoria = parseInt(data.categoria);

        if(categoria === 1){
            atenderTicket = miTicket.atenderTicket(data.persona,data.numeroPorAtender);
            callback(atenderTicket);
            client.broadcast.emit('ultimos3',{
                ultimos3: miTicket.getUltimos3(),
                atendidos: miTicket.getAtendidos(),
                actual: miTicket.getUltimoTicket()
            });
        }
        else if(categoria === 2){
            atenderTicket = miTicketGiro.atenderTicket(data.persona,data.numeroPorAtender);
            callback(atenderTicket);
            client.broadcast.emit('ultimos2',{
                ultimos2: miTicketGiro.getUltimos2(),
                atendidos: miTicketGiro.getAtendidos(),
                actual: miTicketGiro.getUltimoTicket()
            });
        }
        else if(categoria === 3){
            atenderTicket = miTicketDesarrollo.atenderTicket(data.persona,data.numeroPorAtender);
            callback(atenderTicket);
            client.broadcast.emit('ultimos1',{
                ultimos1: miTicketDesarrollo.getUltimos1(),
                atendidos: miTicketDesarrollo.getAtendidos(),
                actual: miTicketDesarrollo.getUltimoTicket()
            });
        }
    });

/*Avisa cuando hay un nuevo ticket y lo muestra en la cola*/
     client.on('actualizarColaTickets', () => {
        client.broadcast.emit('actualizarColaTicketsEnterado',null);
    });

    /*el ticket sale de la cola de ticket abiertos y pasa a la cola de actualmente atendidos*/
    client.on('actualizarColaTicketsAbiertos', () => {
        client.broadcast.emit('actualizarColaTicketsAbiertos',null);
    });

     /*el ticket sale de la cola de ticket abiertos y pasa a la cola de actualmente atendidos*/
     client.on('actualizarColaTicketsCerrados', (data) => {
        client.broadcast.emit('actualizarColaTicketsCerrados',null);
        if(data == 1){
            client.broadcast.emit('GraficasTicktesDonaSistemas',null);
            client.broadcast.emit('GraficasTicktesBarrasSistemas',null);
        }
        else if(data == 2){
           client.broadcast.emit('GraficasTicktesDonaGiro',null);
           client.broadcast.emit('GraficasTicktesBarrasGiro',null);
        }
        else if(data == 3){
            
        }
    });

    client.on('reabrirTicket',()=>{
        client.broadcast.emit('reabrirTicket',null);
    });


/* ***********************************FIN TICKETS */
    client.on('entrar',(idIntranet,callback)=>{//cada que se conecta un usuario nuevo lo agrego al arreglo de usuarios activos 
       /* if(isNaN(idIntranet) || idIntranet === null)
             callback({recargar:true});
        else{*/
            let conectados = usuarios.agregar(client.id,parseInt(idIntranet));

            let data = {
                idIntranet,
                conectados,
                entro:true,
                recargar:false
            };
    
            callback(data);
            client.broadcast.emit('entrar',data);
      //  }
    });

    client.on('disconnect',()=>{ //cada que se desconecta un usuario lo saco del arreglo de usuarios activos
        
                let salio = usuarios.eliminarPersona(client.id);
                let conectados = usuarios.getPersonas();

                let data = {
                    idIntranet:salio,
                    conectados,
                    entro:false
                };

                client.broadcast.emit('entrar',data);     
        });








        client.on('mensaje',(data,callback)=>{

            let identificador = usuarios.getPersona2(data.id)
        
            if(identificador !== 0){
                client.to(`${identificador}`).emit('mensajePersonal',data.mensaje);    
                callback(true);
            }
            else{
                callback(false);
            }
        
        });


        client.emit('entrar',{conectados:usuarios.getPersonas()});

    
/* *****************************FIN CHAT *********************/

    client.on('socketsNuevasNominas',()=>{
        client.broadcast.emit('nuevasNominasCreadas',null);
    });

});
