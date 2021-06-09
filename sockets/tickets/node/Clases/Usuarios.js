class Usuarios{
    
    constructor(){
        this.personas=[];
    }

    agregar(id,idIntranet,ip){

        /*if(this.getPersona2(idIntranet)){// si el usuario ya se encontraba registrado lo saco y creo uno nuevo; por si inicia sesión en otro equipo
            
            this.personas = this.personas.filter(persona =>{
                return persona.idIntranet != idIntranet;
            });

        }*/

        this.personas.push({idIntranet,id,ip});
        return this.personas;
    }

    getPersona(id){

        let flag = false;

        let persona = this.personas.filter( persona =>{
            if( persona.id === id ){
                flag = true
                return persona;
           }
        })[0];

        if(flag)
            return persona.idIntranet;
        else
            return 0;
    }

    getPersona2(idIntranet){
        let flag = false;
        let persona = this.personas.filter( persona =>{
            if( persona.idIntranet == idIntranet){
                flag = true
                return persona;
           }
        })[0];

        if(flag)
            return persona.id;
        else
            return 0;
    }

   
    getPersonas(){
        return this.personas;
    }


    eliminarPersona(id){
        let salio = this.getPersona(id);

        this.personas = this.personas.filter(persona =>{
            return persona.id != id;
        });

        return salio;
    }
}

module.exports={
    Usuarios
}
