class Paginador{

    static init(){
        Paginador.paginador = $('.paginadorDinamico2');
        Paginador.arrayitems=[];
        Paginador.rowsTabla=0;
        Paginador.pagina=1;
        Paginador.elementoButtons=undefined;
        Paginador.totalRegistros=0;
        Paginador.elementoTabla=undefined;
        //Paginador.mostrarPaginador = $('.paginador');
    }
     // MetodosDiversos.paginadorJS(Test.tabla,Test.row,Test.botton_pagina,document.getElementById('paginador'),Test.totalRegistros,document.getElementById('dataPermisosUser'))
     static paginadorJS(items,rows_por_page,page,elemento,totalRegistros,elementoPaginador){ // falta mandar por parametri ek dic donde se imprimiera el registro, el total de registros de la lista , cuantas  row tendra la tabla
        
        Paginador.arrayitems=items;
        Paginador.rowsTabla=rows_por_page;
        Paginador.pagina=page;
        Paginador.elementoButtons=elemento;
        Paginador.totalRegistros=totalRegistros;
        Paginador.elementoTabla=elementoPaginador;

        const wrapper = elementoPaginador;
        wrapper.innerHTML = "";
        page--;

	    let start = rows_por_page * page;
        let end = start + rows_por_page;
        end > totalRegistros? end=totalRegistros : end=end;

        let paginatedItems = items.slice(start, end);
        for (let i = 0; i < paginatedItems.length; i++){
            let item = paginatedItems[i];

            let item_element = document.createElement('div');
            item_element.classList.add('item');
            item_element.innerHTML = item;
            wrapper.append(item_element);
        }
        //MetodosDiversos.paginadorJS(Test.lista,Test.row,Test.botton_pagin,document.getElementById('paginador'),Test.totalRegistros,document.getElementById('dataPermisosUser'))
        //Test.lis_paginador(Test.tabla,Test.row,Test.botton_pagina)
        Paginador.buttonsPaginador(paginatedItems,rows_por_page,elemento,totalRegistros,page)

    }

    static buttonsPaginador(items,row_por_page,elemento,totalRegistros,pagina){


        const wrapper = document.getElementById('paginador');
        let page_count = Math.ceil(totalRegistros/row_por_page)

        for(let i = 0; i < page_count; i++){
            let btn = Paginador.buttonSetting(i+1,pagina,elemento)
            wrapper.append(btn)
        }
        
    }

    static buttonSetting(pagina,NumeroPagina,elemento){

        let button = document.createElement('a');
        button.className = "btn btn-info";
        button.innerText = pagina;
        if (NumeroPagina == pagina) button.classList.add('active');

            button.addEventListener('click',function(e){
                e.preventDefault()
                NumeroPagina = pagina;
                let current_btn = document.querySelector('.active');
                current_btn.classList.remove('.active');
                button.classList.add('active');
                const wrapper = elemento
                wrapper.innerHTML="";
                Paginador.paginadorJS(Paginador.arrayitems,Paginador.rowsTabla,NumeroPagina,Paginador.elementoButtons,Paginador.totalRegistros,Paginador.elementoTabla)
            });
        return button;
    }

    static main(){
        Paginador.init();
    }
}

//Paginador.main();