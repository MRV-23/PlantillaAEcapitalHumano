
	/*=============================================
	SLIDE            
	=============================================*/


	/*=====  Fin de SLIDE  ======*/


/*=============================================
GESTOR SLIDE            
=============================================*/
/*Si la caja se encuentra vacia*/
	if($("#columnasSlide").html() == 0){
		$("#columnasSlide").css({"height" : "200px"});
	}

	/* Poner imagen sobre la caja */
	$("#columnasSlide").on("dragover", function(e){
		e.preventDefault();
		e.stopPropagation();
		$("#columnasSlide").css({"background":"url("+ ruta_server + "views/img/pattern.jpg)"});
	});

	/* Soltar la imagen */
	$("#columnasSlide").on("drop", function(e){
		e.preventDefault();
		e.stopPropagation();
		$("#columnasSlide").css({"background":"white"});
		let archivo = e.originalEvent.dataTransfer.files;
		var imagen = archivo[0];
		

		// Validar tamaño de la imagen
		let imagenSize = imagen.size;
		if(Number(imagenSize) > 2000000){
			$("#columnasSlide").before('<div class="warningCrow">El archivo excede el peso permitido, 2 Mb</div>')
		}
		else{
			$(".warningCrow").remove();
		}
		// Validar tipo de la imagen
		let imagenType = imagen.type;
		if(imagenType == "image/jpeg" || imagenType == "image/png"){
			$(".alertaCrow").remove();
		}
		else{
			$("#columnasSlide").before('<div class="warningCrow">El archivo debe ser formato JPG o PNG</div>')
		}


		//Subir imagen al servidor
		if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){
			let datos = new FormData();
			datos.append("imagenSlide", imagen);
			$("#columnasSlide").before('<img src="'+ ruta_server + 'views/img/status.gif" id="status" class="statusCrow">');
			$.ajax({
				url: ruta_server + "controllers/AjaxGestorImagenes.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){
					$("#status").remove();
					if(respuesta.error){
						$("#columnasSlide").before('<div class="warningCrow">Error</div>')
					}
					else{
						$("#columnasSlide").css({"height":"auto"});
						$("#columnasSlide").append('<li id="'+ respuesta['id'] +'" class="bloqueSlide"><span ruta="'+ respuesta['ruta'] +'" class="eliminarItemSlide"><i class="fa fa-trash" aria-hidden="true"></i></span> <span class="editarItemSlide"><i class="fa fa-pencil" aria-hidden="true"></i></span>  <span class="posicionSlide">'+ respuesta["orden"] +'</span> <img src="'+respuesta["ruta"].slice(3)+'" class="handleImg"></li>'); //.slice(3) suprime caracteres (n), esto porque el gestorSlide.php apunta a una ruta relativa distinta a la de slide.js
						
						//se actualiza la caja del slide inmediatamente al insertar un elemento en el cuadro de arrastre, sin necesidad de refrescar
						actualizarCajaSlide();

						//Se puede llamar a la función eliminar inmediatamente despues de haber sido creado el item, sin necesidad de refrescar 
						$(".eliminarItemSlide").click(function(){
							eliminarItems($(this));
						});	
						
						//Se puede llamar a la función editar inmediatamente despues de haber sido creado el item, sin necesidad de refrescar 
						$(".editarItemSlide").click(function(){
							editarItems($(this).parent().attr("id"),respuesta['ruta'].slice(3));
						});
					}
					actualizarNumeracion();
				}

			});
			
		}
	});

/*********************Actualizar la caja del slide cada que existe una inserción o eliminación********************/

function actualizarCajaSlide(){
	let datos = new FormData();
	datos.append("actualizarArrastrarImagen", true);
	//$('#recargarContenedorSlide').html('<img src="'+ ruta_server + 'views/img/status.gif" id="status" class="statusCrow">');
	//$('#recargarContenedorTextoSlide').html('<img src="'+ ruta_server + 'views/img/status.gif" id="status" class="statusCrow">');
	$.ajax({
		url: ruta_server + "controllers/AjaxGestorImagenes.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$('#recargarContenedorSlide').html(respuesta['carrusel']);
			$('#recargarContenedorTextoSlide').html(respuesta['texto']);
		}
	});
}

/****************************************************************Eliminar**********************************************/
	$(".eliminarItemSlide").click(function(){
		eliminarItems($(this));
	});

	function eliminarItems(e){
		if($(".eliminarItemSlide").length == 1){
			$("#columnasSlide").css({"height" : "200px"});
		}
		let idSlide = e.parent().attr("id");
		let rutaSlide = e.attr("ruta");
		e.parent().remove();
		let borrarItem = new FormData();
		borrarItem.append("idSlide", idSlide);
		borrarItem.append("rutaSlide", rutaSlide);
		$.ajax({
			url: ruta_server + "controllers/AjaxGestorImagenes.php",
			method: "POST",
			data: borrarItem,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				//se actualiza la caja del slide inmediatamente al eliminar un elemento en el cuadro de arrastre, sin necesidad de refrescar
				actualizarCajaSlide();
			}
		});
		actualizarNumeracion();
	}


/*************************************************************actualizar numeración***************************************/
 
function actualizarNumeracion(){
	let totalImagenes = $('#columnasSlide > *').length;
		for(let i=0;i<totalImagenes;i++){
		$('#columnasSlide').children().eq(i).children("span.posicionSlide").text(i+1);
		}
}

/****************************************************Editar Slide*****************************************************/
////Editar lo divido en 2, ya que lo llamo al insertar por primera vez y despues las veces que se requiera	

	$(".editarItemSlide").click(function(){
		let idMostrarDatosEditar = $(this).parent().attr("id");

		let actualizarItem = new FormData();//Obtengo ls datos de la base de datos para mostrarlos en la ventana modal
		actualizarItem.append("idMostrarDatosEditar", idMostrarDatosEditar);
		$.ajax({
			url: ruta_server + "controllers/AjaxGestorImagenes.php",
			method: "POST",
			data: actualizarItem,
			cache: false,
			contentType: false,
			processData: false,
			dataType:"json",
			success: function(respuesta){	
				editarItems(idMostrarDatosEditar,respuesta['ruta'].slice(3),respuesta['titulo'],respuesta['descripcion']);
			}
		});
	});


	function editarItems(id, ruta, titulo='',descripcion=''){
	
		let cajaNegra = '<div class="modalSlideCrow" id="modal"><div class="canvasSlideCrow"> <div class="contenedorEditar">  <img src="'+ ruta +'" alt=""><input type="text" class="formulario" name="titulo" id="titulo" placeholder="Titulo" value="'+ titulo +'"><textarea class="formulario" name="formulario" id="descripcion" placeholder="Descripción" rows="4">'+ descripcion +'</textarea><button type="button" class="btn btn-success" id="guardarItem">Guardar</button>  </div>   <span class="modal__botonSlideCrow" id="modal__boton"></span>  </div></div>';
            $('body').append(cajaNegra);

            $("#targetImagenCrow,#modal__boton,#descripcionCrow").css({"display":"none"});
            $("#targetImagenCrow,#modal__boton,#descripcionCrow").fadeIn(2000);

			$('#modal__boton').click(function(){//cerramos el canvas cuando damos click en el boton cerrar
				//location.reload();
			   $('#modal').remove();
            })

            $("#modal").click(function (e) {//cerramos el canvas cuando damos click fuera de el
			  if (e.target === this)
			  //location.reload();
				$('#modal').remove();	
            });

            $(document).keyup(function(e){//control por medio de las teclas
              if (e.keyCode==27) {
				$(document).off('keyup');//al salir del canvas que ya no detecte la presión de alguna tecla
				//location.reload();
				$('#modal').remove();	
              }
			});
			
			$('#guardarItem').click(function(){
				let actualizarSlide = new FormData();
				actualizarSlide.append('idSlideActualizar',id);
				actualizarSlide.append('tituloActualizar',$('#titulo').val());
				actualizarSlide.append('descripcionActualizar',$('#descripcion').val());
				$.ajax({
					url: ruta_server + "controllers/AjaxGestorImagenes.php",
					method: "POST",
					data: actualizarSlide,
					cache: false,
					contentType: false,
					processData: false,
					success: function(){
						location.reload();
					}
				});
			});
	}

/**************************************************Ordenar Slide*************************************************/
	let almacenarOrdenId= new Array();
	let ordenItem = new Array();

	$("#ordenarSlide").click(function(){
		$("#columnasSlide").css({"cursor":"move"})
		$("#columnasSlide span").hide();
		$("#columnasSlide").sortable({
			disabled: false,
			revert: true,
			connectWith: ".bloqueSlide",
			handle: ".handleImg",	
			stop: function( event) {
				for(let i= 0; i < $( "#columnasSlide li").length; i++){
					almacenarOrdenId[i] = event.target.children[i].id;
					ordenItem[i]= i + 1;					
				}
			}
		});
		$("#ordenarSlide").hide();
		$("#guardarSlide").show();
	});



	$("#guardarSlide").click(function(){
		for(var i = 0; i < $("#columnasSlide li").length; i++){
			let actualizarOrden = new FormData();
			let bandera=false;//para que no imprima en cada vuelta, solo en la última
			actualizarOrden.append("actualizarOrdenSlide", almacenarOrdenId[i]); //elemento
			actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);//orden
			if(i == $("#columnasSlide li").length - 1)
				bandera = true;
			$.ajax({
				url: ruta_server + "controllers/AjaxGestorImagenes.php",
				method: "POST",
				data: actualizarOrden,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					if(bandera == true){
						actualizarCajaSlide();
					}
				}
			})
		}

		actualizarNumeracion();

		$("#columnasSlide").sortable("disable"); 
		$( "#columnasSlide").css({"cursor":"default"})
		$("#ordenarSlide").show();
		$("#guardarSlide").hide();
		$( "#columnasSlide span").show();
	});



