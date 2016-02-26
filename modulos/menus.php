<?php
/* //////////
	MENU
///////// */

//Activamos del "menu" boton de la página actual
$estiloActivo='';
$textoActivo='';
if(isset($_GET["idcontenido"]) && !isset($_GET["accion"])){
	$botonActivo=$_GET["idcontenido"];
	if($botonActivo=="contenidos"){$estiloActivo='1';}
	if($botonActivo=="banners"){$estiloActivo='2';}
	if($botonActivo=="articulos"){$estiloActivo='3';}
	if($botonActivo=="noticias"){$estiloActivo='4';}
	if($botonActivo=="promociones"){$estiloActivo='5';}
	if($botonActivo=="diseno"){$estiloActivo='7';}
	if($botonActivo=="encuestas"){$estiloActivo='8';}
	if($botonActivo=="configuracion"){$estiloActivo='9';}
	if($botonActivo=="permisos"){$estiloActivo='10';}
	if($botonActivo=="registro"){$estiloActivo='11';}
	if($botonActivo=="papelera"){$estiloActivo='12';}
}else if(isset($_GET["accion"])){
	if($_GET["accion"]=="editarContenido"){
		if(isset($_GET["idcontenido"])){$estiloActivo='1'; $textoActivo='Contenido';}
		if(isset($_GET["idbanner"])){$estiloActivo='2'; $textoActivo='Banner';}
		if(isset($_GET["idarticulo"])){$estiloActivo='3'; $textoActivo='Art&iacute;culo';}
		if(isset($_GET["idnoticia"])){$estiloActivo='4'; $textoActivo='Noticia';}
		if(isset($_GET["idpromocion"])){$estiloActivo='5'; $textoActivo='Promoci&oacute;n';}
		if(isset($_GET["iddiseno"])){$estiloActivo='7'; $textoActivo='Diseño';}
		if(isset($_GET["idencuesta"])){$estiloActivo='8'; $textoActivo='Encuesta';}
		if(isset($_GET["idconfiguracion"])){$estiloActivo='9'; $textoActivo='Configuraci&oacute;n';}
		if(isset($_GET["idpermiso"])){$estiloActivo='10'; $textoActivo='Permiso';}
		if(isset($_GET["idregistro"])){$estiloActivo='11'; $textoActivo='Registro';}
		if(isset($_GET["idpapelera"])){$estiloActivo='12'; $textoActivo='Papelera';}
	}else if($_GET["accion"]=="agregarContenido"){
		if($_GET["tablaseleccion"]=="contenidos"){$estiloActivo='1'; $textoActivo='Contenido';}
		if($_GET["tablaseleccion"]=="banners"){$estiloActivo='2'; $textoActivo='Banner';}
		if($_GET["tablaseleccion"]=="articulos"){$estiloActivo='3'; $textoActivo='Art&iacute;culo';}
		if($_GET["tablaseleccion"]=="noticias"){$estiloActivo='4'; $textoActivo='Noticia';}
		if($_GET["tablaseleccion"]=="promociones"){$estiloActivo='5'; $textoActivo='Promoci&oacute;n';}
		if($_GET["tablaseleccion"]=="diseno"){$estiloActivo='7'; $textoActivo='Diseño';}
		if($_GET["tablaseleccion"]=="encuestas"){$estiloActivo='8'; $textoActivo='Encuesta';}
		if($_GET["tablaseleccion"]=="configuracion"){$estiloActivo='9'; $textoActivo='Configuraci&oacute;n';}
		if($_GET["tablaseleccion"]=="permisos"){$estiloActivo='10'; $textoActivo='Permiso';}
		if($_GET["tablaseleccion"]=="registro"){$estiloActivo='11'; $textoActivo='Registro';}
		if($_GET["tablaseleccion"]=="papelera"){$estiloActivo='12'; $textoActivo='Papelera';}
	}
}else if(isset($_GET["mostrarImagenes"])){
	$botonActivo=$_GET["mostrarImagenes"];
	if($botonActivo=="listar"){$estiloActivo='6';}
}else if(isset($_GET["diseno"])){
	$botonActivo=$_GET["diseno"];
	if($botonActivo=="mostrar"){$estiloActivo='7';}
}else if(isset($_GET["configuracion"])){
	$botonActivo=$_GET["configuracion"];
	if($botonActivo=="mostrar"){$estiloActivo='9';}
}

//Activamos del "submenu" boton de la página actual
$estiloSubactivo='';
$textoSubactivo='';
if(isset($_GET["carpeta"])){
	$botonSubactivo=$_GET["carpeta"];
	if($botonSubactivo=="contenidos"){$estiloSubactivo=1; $textoSubactivo='Contenidos';}
	if($botonSubactivo=="banners"){$estiloSubactivo=2; $textoSubactivo='Banners';}
	if($botonSubactivo=="diseno"){$estiloSubactivo=3; $textoSubactivo='Diseño';}
	if($botonSubactivo=="usuarios"){$estiloSubactivo=4; $textoSubactivo='Usuarios';}
	if($botonSubactivo=="promociones"){$estiloSubactivo=5; $textoSubactivo='Promociones';}
	if($botonSubactivo=="galeria"){$estiloActivo='13'; $textoActivo='Galer&iacute;a';}
}
?>