const { io } = require('../server');
//const {Ticket,TicketGiro,TicketDesarrollo} = require('../Clases/Ticket');
//const cron = require('node-cron');
//const fs = require('fs');

//let miTicket = new Ticket();
//let miTicketGiro = new TicketGiro();
//let miTicketDesarrollo = new TicketDesarrollo();


/******************************************************* */
const {Usuarios} = require('../Clases/Usuarios');
let usuarios = new Usuarios();


/*cron.schedule('* 1 * * *', () => {

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

});*/


io.on('connection', (client) => {

/*
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

    client.emit('actualizarMarcadoresSoporteTecnico',{
        actual: miTicket.getUltimoTicket(),
        atendidos: miTicket.getAtendidos(),
        ultimos3: miTicket.getUltimos3()
    });


     client.emit('actualizarMarcadoresGiro',{
        actual: miTicketGiro.getUltimoTicket(),
        atendidos: miTicketGiro.getAtendidos(),
        ultimos2: miTicketGiro.getUltimos2()
    });


    client.emit('actualizarMarcadoresDesarrollo',{
        actual: miTicketDesarrollo.getUltimoTicket(),
        atendidos: miTicketDesarrollo.getAtendidos(),
        ultimos1: miTicketDesarrollo.getUltimos1()
    });
   
   
    client.emit('GraficasTicktesDonaGiro',null);
 
    client.emit('GraficasTicktesDonaSistemas',null);
    
    client.emit('GraficasTicktesBarrasSistemas',null);
    
     client.emit('GraficasTicktesBarrasGiro',null);
   
  
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


     client.on('actualizarColaTickets', () => {
        client.broadcast.emit('actualizarColaTicketsEnterado',null);
    });


    client.on('actualizarColaTicketsAbiertos', () => {
        client.broadcast.emit('actualizarColaTicketsAbiertos',null);
    });

   
     client.on('actualizarColaTicketsCerrados', (data) => {
        
        client.broadcast.emit('actualizarColaTicketsCerrados',null);

        if(data.categoria == 1){
                miTicket.cerrarTicket(data.usuario);
                client.broadcast.emit('ultimos3',{
                    ultimos3: miTicket.getUltimos3(),
                    atendidos: miTicket.getAtendidos(),
                    actual: miTicket.getUltimoTicket()
                });
                client.broadcast.emit('GraficasTicktesDonaSistemas',null);
                client.broadcast.emit('GraficasTicktesBarrasSistemas',null);
        }
        else if(data.categoria == 2){
                 miTicketGiro.cerrarTicket(data.usuario);
                 client.broadcast.emit('ultimos2',{
                    ultimos2: miTicketGiro.getUltimos2(),
                    atendidos: miTicketGiro.getAtendidos(),
                    actual: miTicketGiro.getUltimoTicket()
                });
               client.broadcast.emit('GraficasTicktesDonaGiro',null);
               client.broadcast.emit('GraficasTicktesBarrasGiro',null);
        }
        else if(data.categoria == 3){
                 miTicketDesarrollo.cerrarTicket(data.usuario);
                client.broadcast.emit('ultimos1',{
                    ultimos1: miTicketDesarrollo.getUltimos1(),
                    atendidos: miTicketDesarrollo.getAtendidos(),
                    actual: miTicketDesarrollo.getUltimoTicket()
                });
        }
       
    });

    client.on('reabrirTicket',()=>{
        client.broadcast.emit('reabrirTicket',null);
    });*/


/* ***********************************FIN TICKETS */
   client.on('entrar',(idIntranet,callback)=>{//cada que se conecta un usuario nuevo lo agrego al arreglo de usuarios activos 
       
        idIntranet = parseInt(idIntranet)
        if(idIntranet >= 168){
            let data = {
                idIntranet,
                conectados: usuarios.agregar(client.id,idIntranet,client.request.connection.remoteAddress)
            }; 

            //client.join(idIntranet);//lo anexo a sala por si el usuario abre otra sesión
            //client.to(idIntranet).emit('cerraSesion','Se inición sesión en otro dispositivo');//si esxiste otra sesión la cierro
            //187.144.204.197
            
            //let clientIp = client.request.connection.remoteAddress;
            //console.log(`New connection from ${idIntranet} ip: ${clientIp}`);
            console.log(data)
            client.broadcast.emit('entrar',data);
            callback(data);
        }
    });

    client.on('disconnect',()=>{ //cada que se desconecta un usuario lo saco del arreglo de usuarios activos

        let data = {
            idIntranet: usuarios.eliminarPersona(client.id),
            conectados: usuarios.getPersonas()
        };

        client.broadcast.emit('entrar',data);     

    });

    

    client.on('mensaje',(data,callback)=>{

        let identificador = usuarios.getPersona2(data.id)
        
        if(identificador !== 0){
            client.to(`${identificador}`).emit('mensajePersonal',data.mensaje);    
            callback(true);
        }
        else
            callback(false);   
    });


    client.on('respuestaTicket',(data)=>{
       // console.log(data);
        let identificador = usuarios.getPersona2(data.id_destino)
        if(identificador !== 0){
            client.to(`${identificador}`).emit('respuestaTicket',data.mensaje);    
        }
    });


    client.emit('servidorConexionPerdida',null);
/* *****************************FIN CONECTADOS *********************/

   /* client.on('iniciarEvaluacionGiro',(data,callback)=>{

        let identificador = usuarios.getPersona2(data.id)
        
        if(identificador !== 0){
            client.to(`${identificador}`).emit('iniciarEvaluacionGiro',data.mensaje);    
            callback(true);
        }
        else
            callback(false);   
    });

   


    client.on('socketsNuevasNominas',()=>{
        client.broadcast.emit('nuevasNominasCreadas',null);
    });*/

});
