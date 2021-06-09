var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
app.get('/', function(req, res){
    res.send('<span style="color: green">Asesores Empresariales!</span>');
});
module.exports.io = io;
require('./sockets/socket');

http.listen(49002, function(){
    console.log('Ejecutando chat en puerto:49002');
});
