const server = require('http').createServer();
const io = require('socket.io')(server);
const puerto = 49001;

io.on('connection', client => {

    client.on('nuevo',()=>{//el usuario crea un nuevo tickect, tambien lo puede crear la persona de soporte a nombre del usuario
        client.broadcast.emit('nuevo',null);
    });

    client.on('atendidos',()=>{//alguien de soporte tomo un ticket, el administrador tambien pude asgnarle un ticket a alguien de soporte
        client.broadcast.emit('atendidos',null);
    });

    client.on('cerrados',()=>{//alguien de soporte cerro un ticket
        client.broadcast.emit('cerrados',null);
    });

    client.on('aceptarAbrir',()=>{//alguien de soporte acepto atender un ticket abierto
        client.broadcast.emit('aceptarAbrir',null);
    });

    client.on('solicitarAbrir',()=>{//el usuario abrio un ticket
        client.broadcast.emit('solicitarAbrir',null);
    });

    /*client.on('disconnect', () => {
        console.log('Se desconecto');
    });*/

});

server.listen(puerto,()=>{
    console.log(`Módulo de tickets corriendo en el puerto: ${puerto}`);
});