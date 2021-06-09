/*=============================================
GENERAR USUARIO Y CONTRASEÑA: USUARIOS-AGREGAR  
=============================================*/
//let nickUsuarioAgregar=document.getElementById("nickUsuarioAgregar");
let passUsuarioAgregar=document.getElementById("passUsuarioAgregar");

$('#nickUsuarioAgregar').change(function(){
	if(this.value !== "" ){
		let valor1 ="";
		valor1 += generarPasswordMinusculas();
		valor1 += generarPasswordMayusculas();
		valor1 += generarPasswordNumeros();
		passUsuarioAgregar.value = valor1;
	}
	else{
		passUsuarioAgregar.value ="";
	}	
});

function generarPasswordMinusculas() {
	let strCaracteresPermitidos = 'a,b,c,d,e,f,g,h,i,j,k,m,n,p,q,r,s,t,u,v,w,x,y,z';
	let strArrayCaracteres = new Array(strCaracteresPermitidos.length);
	strArrayCaracteres = strCaracteresPermitidos.split(',');
	let length = 4;
	let i = 0;
	let j;
	let tmpstr = "";
	do {
		let randscript = -1
		while (randscript < 1 || randscript > strArrayCaracteres.length || isNaN(randscript)) {
			randscript = parseInt(Math.random() * strArrayCaracteres.length)
		}

		j = randscript;
		tmpstr = tmpstr + strArrayCaracteres[j];
		i = i + 1;
	} while (i < length)
	//passUsuarioAgregar.value = tmpstr;
	return tmpstr;
}

function generarPasswordMayusculas() {
	let strCaracteresPermitidos = 'A,B,C,D,E,F,G,H,I,J,K,M,N,P,Q,R,S,T,U,V,W,X,Y,Z';
	let strArrayCaracteres = new Array(strCaracteresPermitidos.length);
	strArrayCaracteres = strCaracteresPermitidos.split(',');
	let length = 4;
	let i = 0;
	let j;
	let tmpstr = "";
	do {
		let randscript = -1
		while (randscript < 1 || randscript > strArrayCaracteres.length || isNaN(randscript)) {
			randscript = parseInt(Math.random() * strArrayCaracteres.length)
		}

		j = randscript;
		tmpstr = tmpstr + strArrayCaracteres[j];
		i = i + 1;
	} while (i < length)
	//passUsuarioAgregar.value += tmpstr;
	return tmpstr;
}

function generarPasswordNumeros() {
	let strCaracteresPermitidos = '1,2,3,4,5,6,7,8,9';
	let strArrayCaracteres = new Array(strCaracteresPermitidos.length);
	strArrayCaracteres = strCaracteresPermitidos.split(',');
	let length = 4;
	let i = 0;
	let j;
	let tmpstr = "";
	do {
		let randscript = -1
		while (randscript < 1 || randscript > strArrayCaracteres.length || isNaN(randscript)) {
			randscript = parseInt(Math.random() * strArrayCaracteres.length)
		}

		j = randscript;
		tmpstr = tmpstr + strArrayCaracteres[j];
		i = i + 1;
	} while (i < length)
	//passUsuarioAgregar.value += tmpstr;
	return tmpstr;
}
