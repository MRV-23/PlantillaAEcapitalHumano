/**************Buscar Usuario*******************/
let buscadorPermisos = document.getElementById('buscadorUsuariosPermisos');//input para buscar
let contenedorConsultasSolicitudes = document.getElementById('mostrarDatosUsuariosSolicitudes');//area que recargamos buscadorUsuariosCorreos mostrarDatosUsuariosCorreos
buscadorPermisos.oninput = function(){
	//console.log(buscadorPermisos.value);
	let query = this.value;
	let situacion = $('#cargarAjaxSituacionSolicitudes').val();
	let sucursal = $('#cargarAjaxSucursalSolicitudes').val();
	let fecha = $('#fechaOrdenarSolicitudes').val();
	let ajax = new XMLHttpRequest();
	ajax.open("GET","controllers/ajaxPermisos.php?buscadorPermisos="+encodeURIComponent(query)+"&&cargarSituacionSolicitudes="+situacion+"&&cargarSucursalSolicitudes="+sucursal+"&&cargarFechaSolicitudes="+fecha,true);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status == 200){
			 contenedorConsultasSolicitudes.innerHTML = ajax.responseText;
			 $(".mostrarPermisoUsuario").click(function(){
				mostrarPermisoUsuario($(this).parent().parent().attr("id"));
			});
		}   
	}
	ajax.send();
};


