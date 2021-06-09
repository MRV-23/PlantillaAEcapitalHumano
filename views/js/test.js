class Test{

    static init(){

        Test.usuarioInicio = $('#usuarioIngreso');
        Test.usuarioPassword = $('#passwordIngreso');
        Test.htmlUsuarios = $('#dataPermisosUser');
        Test.html = "";
        Test.nombre=localStorage.getItem("nombreUser");
        Test.tabla=[];
        Test.totalRegistros=0;
        Test.lista=["item 1",
                    "item 2",
                    "item 3",
                    "item 4",
                    "item 5",
                    "item 6",
                    "item 7",
                    "item 8",
                    "item 9",
                    "item 10",
                    "item 11",
                    "item 12",
                    "item 13",
                    "item 14",
                    "item 15"
        ]          
        //current_page
        Test.botton_pagina =1; //page
        Test.row=10; //rows_por_page

        
    }

    static validarUsuario(){   ///hacer que todo el paginador sea estatico no dependa de otro lado por que cada pagina saca el calculo de los botones dependiendo lista 
        
        var renglon=0; 
        fetch("http://192.168.0.249/sts-backend/backend/api/v1/usuarios",{// metodo fetch que te regresa una llamas con todo los usuario y el numero de usuario encontrado
            
            method:"GET",
            headers:{
               // "Content-Type":"application/json",
                "x-api-key":localStorage.getItem("x-api-key")
            }
        })
        .then(response => response.json())
        .then( data => {
            console.log("status = "+data.status), console.log("code = "+data.result.code )
            if (data.status == "success" && data.result.code == 200) {// respuesta de la solicidtud enviada al ws que verificara si si paso la llamada
               // Test.recursos()
               
               var renglon=1;// renglon que se ultiliza para color de las columnas tengan colo0r de fondo o no
               var Testhtml='';
               let ArrayData = data.result.msg.result.data;
               for (let valor of ArrayData){
                    Test.totalRegistros =data.result.msg.result.total;
                    console.log("total: "+data.result.msg.result.total)
                    Testhtml='';
                    renglon == 1 ? renglon =0 : renglon=1;;// renglon que se ultiliza para color de las columnas tengan colo0r de fondo o no
                    Testhtml+="<div class='divContenedorPadre renglon"+renglon+"'>"
                                               +"<div class='encabezadoNumero'><b>"+valor.id+"</b></div>"
                                               +"<div class='encabezadoNombre' style='justify-content: flex-start;'>"+valor.nombre+" "+valor.paterno+" "+valor.paterno+"</div>"     
                                               +"<div class='encabezadoPuesto' style='justify-content: flex-start;'>"+valor.puesto+"</div>"
                                               +"<div class='encabezadoPermisos ' style='justify-content: flex-start;'><a class='btn btn-success mostrarPermisos mostrar' href='#modal_permisos' data-toggle='modal' data-target='#modal_permisos' id='permisos_form'>Mostrar</a></div>"
                                                 //<div class="encabezadoPermisos " style="justify-content: flex-start;"><a class="btn btn-success mostrarPermisos mostrar" href="#modal_permisos" data-toggle="modal" data-target="#modal_permisos" id="permisos_form">Mostrar</a></div>
                                           +"</div>"
                Test.tabla.push(Testhtml)// Este metodo push inserta en el arreglo cada una de las filas  que va creando en el for of
               }
               console.log("total: "+Test.tabla.length)
               //Test.htmlUsuarios.html(Testhtml)
               // Test.lis_paginador(Test.lista,Test.row,Test.botton_pagina)
               //Test.lis_paginador(Test.tabla,Test.row,Test.botton_pagina)
               Paginador.paginadorJS(Test.tabla,Test.row,Test.botton_pagina,document.getElementById('paginador'),Test.totalRegistros,document.getElementById('dataPermisosUser'))
                    //Test.lis_paginador(Test.tabla,Test.row,Test.botton_pagina)// este  funcion lo quye hace el paginador para crear lo botones de la paginacion}
                    
            } else {
                
               alert("error fech tabla")
            }

        })
        .catch(error => {
            console.log(error)
        });

    }

    static recursos(){ // esta funcion es para pintar lo que es el abatar y el nombre en la respuiesta del api fech
        document.getElementById("nombre").innerHTML =localStorage.getItem("nombreUser");
        $('#imagenuno').attr('src',localStorage.getItem("avatar"))
        $('#imagendos').attr('src',localStorage.getItem("avatar"))
    }

    static recursosmartin(){
        fetch("http://192.168.0.249/sts-backend/backend/api/v1/autenticacion",{
            //                     /sts-backend/backend/api/v1/autenticacion
            
                method:"POST",
                body: JSON.stringify({
                //usuario:Login.usuarioInicio.val(),
                //pass:Login.usuarioPassword.val()
                usuario:"jesus.rubio",
                pass:"pruebas123"
            
            })
        })
        .then(response => response.json())
        .then( data =>{
            if (data.status =='success' && data.result.code == 200) {
                
                localStorage.setItem("x-api-key", data.result.msg.result.token);
                localStorage.setItem("nombreUser", data.result.msg.result.nombre);
                localStorage.setItem("avatar", data.result.msg.result.avatar);

                //Login.recursos(data.result.msg.result.total,data.result.msg.result.nombre,data.result.msg.result.acceso,data.result.msg.result.avatar);
                
            } else {
                alert("error en fech")

            }

        })
        .catch(error => {
            console.log(error)
        });
        Test.validarUsuario();
    }

    static lis_paginador(items,rows_por_page,page){


        //const wrapper = document.getElementById('paginador');dataPermisosUser}
        const wrapper = document.getElementById('dataPermisosUser');
        wrapper.innerHTML = "";
	    page--;

	    let start = rows_por_page * page;
	    let end = start + rows_por_page;
        console.log("start: "+start+" end: "+end)
        end > Test.totalRegistros? end=Test.totalRegistros : end=end;
        
        //let end = Test.totalRegistros;
	    let paginatedItems = items.slice(start, end);
        //console.log("paginaItem =: "+paginatedItems)
      //  console.log("start: "+start+" end: "+end)
	    for (let i = 0; i < paginatedItems.length; i++) {
	    	let item = paginatedItems[i];

	    	let item_element = document.createElement('div');
	    	item_element.classList.add('item');
	    	item_element.innerHTML = item;

           // console.log("Res: "+item_element)
        
	    	wrapper.append(item_element);
	    }
        Test.paginador(paginatedItems,Test.row)

    }

    static paginador(items,row_por_page){
        console.log("largo es: "+items.length+" rows: "+row_por_page)

        const wrapper = document.getElementById('paginador');

        let page_count = Math.ceil(Test.totalRegistros/row_por_page)
        //let page_count = Math.ceil(row_por_page/items.length)
        console.log("resultado de math.ceil ="+page_count)
        for (let i = 0; i < page_count; i++) {
            let btn = Test.paginadorbutton(i+1)
            wrapper.append(btn)
            
        }
        

    }

    static paginadorbutton(pagina){

       // let button = document.createElement('button');
       let button = document.createElement('a');
        button.className = "btn btn-info";
        button.innerText = pagina;
        if (Test.botton_pagina == pagina) button.classList.add('active');

        button.addEventListener('click', function (e) {
          //  e.preventDefault()
            Test.botton_pagina = pagina;
           // DisplayList(items, list_element, rows, current_page);
            //Test.validarUsuario()
    
            let current_btn = document.querySelector('a.active');
            current_btn.classList.remove('active');
    
            button.classList.add('active');
            const wrapper = document.getElementById('paginador');
        wrapper.innerHTML="";
        //Test.validarUsuario()
        });
        
        return button;//
        

    }

    static main(){
        Test.init()
  
        //Test.lis_paginador(Test.lista,Test.row,Test.botton_pagina)

        Test.recursosmartin()
        //Test.lis_paginador(Test.tabla,Test.row,Test.botton_pagina) 
        //Test.paginador()
        //Test.validarUsuario();
        //Test.usuarioInicio.on('input', function(){Test.validarIngreso(this);});
    }

}

$( document ).ready(function(){
    Test.main();
});