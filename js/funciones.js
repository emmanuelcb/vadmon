function redimensionar() {
	var anchoVentana = 0, altoVentana = 0, anchoContenedor = 0;
	if( typeof( window.innerWidth ) == 'number' ) {
	//Non-IE
	anchoVentana = window.innerWidth;
	altoVentana = window.innerHeight;
	anchoContenedor = document.getElementById('fdpagina').clientWidth;
	altoContenedor = document.getElementById('fdpagina').clientHeight;
	} else if( document.documentElement && ( document.documentElement.clientWidth ) ) {
	//IE 6+ in 'standards compliant mode'
	anchoVentana = document.documentElement.clientWidth;
	altoVentana = document.documentElement.clientHeight;
	anchoContenedor = document.getElementById('fdpagina').clientWidth;
	altoContenedor = document.getElementById('fdpagina').clientHeight;
	} else if( document.body && ( document.body.clientWidth ) ) {
	//IE 4 compatible
	anchoVentana = document.body.clientWidth;
	altoVentana = document.body.clientHeight;
	anchoContenedor = document.getElementById('fdpagina').clientWidth;
	altoContenedor = document.getElementById('fdpagina').clientHeight;
	}
	medicion= anchoVentana - altoVentana;
	if(anchoVentana == 1024  || anchoVentana == 1280 || anchoVentana == 1920){
		document.getElementById('fdpagina').style.backgroundSize = anchoVentana+"px auto";
		//alert("1 | "+anchoVentana+" | "+altoVentana+" | "+medicion);
	}else if(anchoVentana < altoVentana){
		document.getElementById('fdpagina').style.backgroundSize = "auto "+altoVentana+"px";
		//alert("2 | "+anchoVentana+" | "+altoVentana+" | "+medicion);
	}else if(medicion < 240){
		document.getElementById('fdpagina').style.backgroundSize = "auto"+altoVentana+"px";
		//alert("3 | "+anchoVentana+" | "+altoVentana+" | "+medicion);
	}else{
		document.getElementById('fdpagina').style.backgroundSize = anchoVentana+"px "+"auto";
		//alert("4 | "+anchoVentana+" | "+altoVentana+" | "+medicion);
	}
	document.getElementById('fdpagina').style.height = altoVentana+"px";
	document.getElementById('fdpagina').style.width = anchoVentana+"px";
}

function moverFdMenu(x){
	document.getElementById('menubotonera').style.backgroundPosition=x+'px 0';
}

var opcionesActivas = 'ninguno';
function mostrarOpciones(id){
	if(id == 'ninguno'){
		$('#'+opcionesActivas).hide('slide');
		opcionesActivas = 'ninguno';
	}else{
		$('#'+id).show('slide');
		$('#'+opcionesActivas).hide('slide');
		opcionesActivas = id;
	}
}