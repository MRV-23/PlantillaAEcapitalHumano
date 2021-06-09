/**************Buscar Usuario*******************/
let buscadorCorreos = document.getElementById('buscadorUsuariosCorreos');//input para buscar
let contenedorConsultasCorreos = document.getElementById('mostrarDatosUsuariosCorreos');//area que recargamos buscadorUsuariosCorreos mostrarDatosUsuariosCorreos
buscadorCorreos.oninput = function(){
	var query = this.value;
	let sucursal = $('#cargarAjaxCorreos').val();
	var ajax = new XMLHttpRequest();
	ajax.open("GET","controllers/ajaxUsuarios.php?buscadorCorreos="+encodeURIComponent(query)+"&&cargarCorreosActual="+sucursal,true);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status == 200){
             contenedorConsultasCorreos.innerHTML = ajax.responseText;
		}   
	}
	ajax.send();
};


