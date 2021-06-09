const { io } = require('../server');

const {Usuarios} = require('../Clases/Usuarios');
const {query} = require('../conexion/conexion');

let usuarios = new Usuarios();

io.on('connection', (client) => {
    
    client.emit('servidorLevantado',null);//En caso de que suceda algo con el servidor, les envio apetición a todos los usuarios para que vuelvan a mandar sus credenciales

    client.on('peticionDeConexion',(idIntranet,callback)=>{//cada que se conecta un usuario nuevo lo agrego al arreglo de usuarios activos 
        
        if(idIntranet === undefined)
            return;

        let conectados = usuarios.agregar(client.id,idIntranet);
        let data = {
            idIntranet,
            conectados:conectados.length,
            situacion:true //un nuevo usuario se conecto
        };

        let data2 = {
            idIntranet,
            conectados,
            situacion:true //un nuevo usuario se conecto
        };

        console.log(data2);
        client.broadcast.emit('actualizacionDeUsuarios',data);
        callback(data);

    });

    client.on('disconnect',()=>{ //cada que se desconecta un usuario lo saco del arreglo de usuarios activos
        let salio = usuarios.eliminarPersona(client.id);////falta cambiar el estado de la persona que salio
        
        if(salio === undefined)
            return;
        
        let conectados = usuarios.getPersonas();
        
        let data = {
            idIntranet:salio.id_intranet,
            conectados:conectados.length,
            situacion:false //un usuario abandono el chat
        };

        /*conexion.query(`UPDATE usuarios_ae SET situacion_chat = 0 WHERE id_usuario = ${salio.id_intranet }`,(err, result) {
            if (err) throw err;
        });*/

        query(`UPDATE usuarios_ae SET situacion_chat = 0 WHERE id_usuario = ${salio.id_intranet }`,(err,result)=>{
            if (err) throw err;
        });
       
        console.log(conectados);
        client.broadcast.emit('actualizacionDeUsuarios',data);
    });

    client.on('cambiarEstado',(data)=>{ //aviso a todos los usuarios activos cada que alguien cambie su estado (activo, ausente, etc.)
        client.broadcast.emit('cambiarEstado',data);
    });

    client.on('nuevoMensaje',(data)=>{

        let identificador = usuarios.getIdentificador(data.destinatario)
        
        if(identificador !== 0){
               
            let data2= {
                identificadorRemitente:data.id,
                remitente:data.remitente,
                mensaje:data.mensaje,
                fecha:data.fecha,
                avatar:data.avatar
            }

            client.to(`${identificador}`).emit('nuevoMensaje',data2);    
        }
    });

});
