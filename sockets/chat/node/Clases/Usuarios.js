class Usuarios{
    
    constructor(){
        this.personas=[];
    }

    agregar(id_socket,id_intranet){
        this.personas = this.personas.filter(persona =>{//para evitar que se duplique el id, filtramos para eliminar al usuario si ya existe
            return persona.id_intranet != id_intranet;
        });
        this.personas.push({id_socket,id_intranet});
        return this.personas;
    }

    getPersona(id_socket){
        let persona = this.personas.filter( persona =>{
            return persona.id_socket === id_socket;
        })[0];
        return persona;
    }

    getIdentificador(id_intranet){
        let flag = false;
        let persona = this.personas.filter( persona =>{
            if( persona.id_intranet == id_intranet){
                flag = true
                return persona;
           }
        })[0];

        if(flag)
            return persona.id_socket;
        else
            return 0;
    }

    getPersonas(){
        return this.personas;
    }


    eliminarPersona(id_socket){
        let salio = this.getPersona(id_socket);

        this.personas = this.personas.filter(persona =>{
            return persona.id_socket != id_socket;
        });

        return salio;
    }
}

module.exports={
    Usuarios
}