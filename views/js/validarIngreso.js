	
	alert("hoplaaa1")
	
	$('#formIngreso').submit(function(e){
		e.preventDefault();
		alert("hoplaaa")
		var valor = $('#passwordIngreso');
		//valor.val(md5(valor.val()));
		//$(this).submit();
	});
	$('#iniciarSesion').on('click',function(e){
		e.preventDefault();
		alert("hoplaaa")
		var valor = $('#passwordIngreso');
		//valor.val(md5(valor.val()));
		//$(this).submit();
	});
	
	$('.refrescarCaptcha').click(function(){
		$(".captcha-image").attr('src', ruta_server + 'views/img/captcha.php?' + Date.now());
	});


