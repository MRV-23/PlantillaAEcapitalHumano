const mysql = require('mysql');

/*let conexion = mysql.createConnection({
    host: "127.0.0.1",
    user: "rootasesores",
    password: "mayomariselaroselee1984",
    database: "asesores_empresariales"
});

conexion.connect(err => {
    if (err) throw err;
});*/

const pool = mysql.createPool({
    host: "127.0.0.1",
    user: "rootasesores",
    password: "mayomariselaroselee1984",
    database: "asesores_empresariales"
});

let query = (sql,callback)=>{
    pool.getConnection(function(err,conn){
        if(err){
            callback(err,null);
        }else{
            conn.query(sql,function(err,results){
                callback(err,results);
            });
            conn.release();
        }
    });
};
 

module.exports = {
    query
}