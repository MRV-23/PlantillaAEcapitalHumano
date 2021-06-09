const fs = require('fs');

/*class AsignarTicket{
    constructor(numero,persona){
        this.numero = numero;
        this.persona = persona;
    }

}*/

class Ticket{

    constructor(){
        this.usuarios=[187,223,271]
        this.ultimo = 0;
        this.atendidos = 0;
        this.hoy = new Date().getDate();
        this.tickets = [];
        this.ultimos3 = [];

        let data= require('../data/data.json');
       
        if(data.hoy === this.hoy){
            this.ultimo = data.ultimo;
            this.tickets = data.tickets;
            this.ultimos3 = data.ultimos3;
            this.atendidos = data.atendidos;
        }
        else{
            if(data.tickets.length > 0){
                this.actualizarCola(data);
            }
            else{
                this.reiniciar();
            }
        }
    }

    siguiente(folio){
        this.ultimo++;
        let ticket = {numero:folio,persona:null};
        this.tickets.push(ticket);
        this.guardar();
        return this.ultimo;
    }

    reiniciar(){
        this.ultimo = 0;
        this.atendidos = 0;
        this.tickets = [];
        this.ultimos3 = [{"numero":0,"persona":this.usuarios[0]},{"numero":0,"persona":this.usuarios[1]},{"numero":0,"persona":this.usuarios[2]}];
        this.guardar();
    }

    actualizarCola(data){
        this.ultimo = data.tickets.length;
        this.atendidos = 0;
		this.tickets = data.tickets;
        this.ultimos3 = [{"numero":0,"persona":this.usuarios[0]},{"numero":0,"persona":this.usuarios[1]},{"numero":0,"persona":this.usuarios[2]}];
        this.guardar(); 
    }

    guardar(){
        let data = {
            ultimo: this.ultimo,
            atendidos:this.atendidos,
            hoy : this.hoy,
            tickets: this.tickets,
            ultimos3: this.ultimos3
        };
        fs.writeFileSync('./node/data/data.json',JSON.stringify(data));
    }

    getUltimoTicket(){
        return this.ultimo;
    }

    getAtendidos(){
        return this.atendidos;
    }

    getUltimos3(){
        return this.ultimos3;
    }

    atenderTicket(persona,numero){

        let person = parseInt(persona);

        if(this.tickets.length === 0){
            return {numero:0}
        }

        let numeroTicket;
        if(numero < 1){//Asigno los ticket en el orden de la cola
            numeroTicket = this.tickets[0].numero; //obtengo el primer elemento del arreglo (los tickets por atender)
            this.tickets.shift(); //elimino el primer elemento de un arreglo (extraigo el primer ticket que voy a atender)
        }
        else{//Tomo un ticket en particular
            numeroTicket = numero;
            this.tickets = this.tickets.filter(valor => {
                return valor.numero != numero;
            });
        }
        

        let atenderTicket = {numero:numeroTicket,persona:person};

        if(person === this.usuarios[0]){
            this.ultimos3[0] = atenderTicket;
        }
        else if(person === this.usuarios[1]){
            this.ultimos3[1] = atenderTicket;
        }
        else if(person === this.usuarios[2]){
            this.ultimos3[2] = atenderTicket;
        }

        this.atendidos++;
        
        this.guardar();

        return atenderTicket;
    }

    cerrarTicket(persona){

        let person = parseInt(persona);

        let atenderTicket = {numero:0,persona:person};

        if(person === this.usuarios[0]){
            this.ultimos3[0] = atenderTicket;
        }
        else if(person === this.usuarios[1]){
            this.ultimos3[1] = atenderTicket;
        }
        else if(person === this.usuarios[2]){
            this.ultimos3[2] = atenderTicket;
        }
        
        this.guardar();
        
        //return atenderTicket;
    }
}


class TicketGiro{
    constructor(){
        this.usuarios=[200,180];
        this.ultimo = 0;
        this.atendidos = 0;
        this.hoy = new Date().getDate();
        this.tickets = [];
        this.ultimos2 = [];

        let data= require('../data/dataGiro.json');
       
        if(data.hoy === this.hoy){
            this.ultimo = data.ultimo;
            this.tickets = data.tickets;
            this.ultimos2 = data.ultimos2;
            this.atendidos = data.atendidos;

        }
        else{
            if(data.tickets.length > 0){
                this.actualizarCola(data);
            }
            else{
                this.reiniciar();
            }
        }
    }

    siguiente(folio){
        this.ultimo++;
        let ticket = {numero:folio,persona:null};
        this.tickets.push(ticket);
        this.guardar();
        return this.ultimo;
    }

    reiniciar(){
        this.ultimo = 0;
        this.atendidos = 0;
        this.tickets = [];
        this.ultimos2 = [{"numero":0,"persona":this.usuarios[0]},{"numero":0,"persona":this.usuarios[1]}];
        this.guardar();
    }

    actualizarCola(data){
        this.ultimo = data.tickets.length;
        this.atendidos = 0;
		this.tickets = data.tickets;
        this.ultimos2 = [{"numero":0,"persona":this.usuarios[0]},{"numero":0,"persona":this.usuarios[1]}];
        this.guardar(); 
    }

    guardar(){
        let data = {
            ultimo: this.ultimo,
            atendidos:this.atendidos,
            hoy : this.hoy,
            tickets: this.tickets,
            ultimos2: this.ultimos2
        };
        fs.writeFileSync('./node/data/dataGiro.json',JSON.stringify(data));
    }

    getUltimoTicket(){
        return this.ultimo;
    }

    getAtendidos(){
        return this.atendidos;
    }

    getUltimos2(){
        return this.ultimos2;
    }

    atenderTicket(persona,numero){

        let person = parseInt(persona);

        if(this.tickets.length === 0){
            return {numero:0}
        }

        let numeroTicket;
        if(numero < 1){//Asigno los ticket en el orden de la cola
            numeroTicket = this.tickets[0].numero; //obtengo el primer elemento del arreglo (los tickets por atender)
            this.tickets.shift(); //elimino el primer elemento de un arreglo (extraigo el primer ticket que voy a atender)
        }
        else{//Tomo un ticket en particular
            numeroTicket = numero;
            this.tickets = this.tickets.filter(valor => {
                return valor.numero != numero;
            });
        }
        
        let atenderTicket = {numero:numeroTicket,persona:person};

        if(person === this.usuarios[0]){
            this.ultimos2[0] = atenderTicket;
        }
        else if(person === this.usuarios[1]){
            this.ultimos2[1] = atenderTicket;
        }
       
        this.atendidos++;
        this.guardar();
        return atenderTicket;
    }

    cerrarTicket(persona){

        let person = parseInt(persona);

        let atenderTicket = {numero:0,persona:person};

        if(person === this.usuarios[0]){
            this.ultimos2[0] = atenderTicket;
        }
        else if(person === this.usuarios[1]){
            this.ultimos2[1] = atenderTicket;
        }
        
        this.guardar();
        
        //return atenderTicket;
    }
}



class TicketDesarrollo{
    constructor(){
        this.usuarios=[168];
        this.ultimo = 0;
        this.atendidos = 0;
        this.hoy = new Date().getDate();
        this.tickets = [];
        this.ultimos1 = [];

        let data= require('../data/dataDesarrollo.json');
       
        if(data.hoy === this.hoy){
            this.ultimo = data.ultimo;
            this.tickets = data.tickets;
            this.ultimos1 = data.ultimos1;
            this.atendidos = data.atendidos;
        }
        else{
	     
           if(data.tickets.length > 0){
                this.actualizarCola(data);
            }
            else{
                this.reiniciar();
            }
        }
    }

    siguiente(folio){
        this.ultimo++;
        let ticket = {numero:folio,persona:null};
        this.tickets.push(ticket);
        this.guardar();
        return this.ultimo;
    }

    reiniciar(){
        this.ultimo = 0;
        this.atendidos = 0;
        this.tickets = [];
        this.ultimos1 = [{"numero":0,"persona": this.usuarios[0]}];
        this.guardar();
    }

    actualizarCola(data){
        this.ultimo = data.tickets.length;
        this.atendidos = 0;
		this.tickets = data.tickets;
        this.ultimos1 = [{"numero":0,"persona": this.usuarios[0]}];
        this.guardar(); 
    }

    guardar(){
        let data = {
            ultimo: this.ultimo,
            atendidos:this.atendidos,
            hoy : this.hoy,
            tickets: this.tickets,
            ultimos1: this.ultimos1
        };
        fs.writeFileSync('./node/data/dataDesarrollo.json',JSON.stringify(data));
    }

    getUltimoTicket(){
        return this.ultimo;
    }

    getAtendidos(){
        return this.atendidos;
    }

    getUltimos1(){
        return this.ultimos1;
    }

    atenderTicket(persona,numero){

        let person = parseInt(persona);

        if(this.tickets.length === 0){
            return {numero:0}
        }

        let numeroTicket;
        if(numero < 1){//Asigno los ticket en el orden de la cola
            numeroTicket = this.tickets[0].numero; //obtengo el primer elemento del arreglo (los tickets por atender)
            this.tickets.shift(); //elimino el primer elemento de un arreglo (extraigo el primer ticket que voy a atender)
        }
        else{//Tomo un ticket en particular
            numeroTicket = numero;
            this.tickets = this.tickets.filter(valor => {
                return valor.numero != numero;
            });
        }
        
        let atenderTicket = {numero:numeroTicket,persona:person};
      
        this.ultimos1[0] = atenderTicket;
        this.atendidos++;
        this.guardar();

        return atenderTicket;
    }

    cerrarTicket(persona){

        let person = parseInt(persona);

        let atenderTicket = {numero:0,persona:person};
        this.ultimos1[0] = atenderTicket;
        
        this.guardar();
        
        //return atenderTicket;
    }

}

module.exports={
    Ticket,
    TicketGiro,
    TicketDesarrollo
}
