/**************Buscar Usuario*******************/
let buscador = document.getElementById('buscadorUsuarios');//input para buscar
let contenedorConsultas = document.getElementById('mostrarDatosUsuarios');//area que recargamos
buscador.oninput = function(){
	var query = this.value;

	//console.log('Sucursal: '+ $('#cargarAjaxSucursal').val() + '  Usuario: ' + query);

	let sucursal = $('#cargarAjaxSucursal').val();
	let situacion = $('#cargarAjaxSituacion').val();
	var ajax = new XMLHttpRequest();
	ajax.open("GET","controllers/ajaxUsuarios.php?busqueda="+encodeURIComponent(query)+"&&cargarSucursalActual="+sucursal+"&&cargarSituacionActual="+situacion,true);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status == 200){
             contenedorConsultas.innerHTML = ajax.responseText;
             $(".mostrarUsuario").click(function(){
                mostrarUsuario($(this).parent().parent().attr("id"));
             });
             $(".borrarUsuario").click(function(){
                eliminarUsuario($(this).parent().parent().attr("id"));
			});
			$(".actualizarPassUsuario").click(function(){
                actualizarUsuario($(this).parent().parent().attr("id"));
			});
		}   
	}
	ajax.send();
};




