<?php
/* //////////////////////
	MOSTRAR SESIONES
////////////////////// */

// Si la pagina actual trae especificacion de contenido
if(isset($_GET["idcontenido"]) && !isset($_GET["accion"]))
{
	include("modulos/secciones/seccionesMostrar.php");
}else if(isset($_GET["idperfil"])){
	$mostrarContenido.="";
}

/* //////////////////////////////
		EDITAR SESIONES
////////////////////////////// */
if(isset($_GET["accion"])=="editarContenido")
{
	include("modulos/secciones/seccionesEditar.php");
}

/* //////////////////////////////
		AGREGAR SESIONES
////////////////////////////// */
if(isset($_GET["accion"])=="agregarContenido")
{
	$seccionSeleccionada='';
	if(isset($_GET["tablaseleccion"])){
		$seccionSeleccionada=$_GET["tablaseleccion"];
		
		// SI LA SELECCION ES "contenidos"
		if($seccionSeleccionada=="contenidos" && $pcontenidos==1)
		{
			include("modulos/secciones/agregarContenidos.php");
		}
		
		// SI LA SELECCION ES "banners"
		if($seccionSeleccionada=="banners" && $pbanners==1)
		{
			include("modulos/secciones/agregarBanners.php");
		}
		
		// SI LA SELECCION ES "articulos"
		else if($seccionSeleccionada=="articulos" && $particulos==1)
		{
			include("modulos/secciones/agregarArticulos.php");
		}
		
		// SI LA SELECCION ES "noticias"
		else if($seccionSeleccionada=="noticias" && $pnoticias==1)
		{
			include("modulos/secciones/agregarNoticias.php");
		}
		
		// SI LA SELECCION ES "promociones"
		else if($seccionSeleccionada=="promociones" && $ppromociones==1)
		{
			include("modulos/secciones/agregarPromociones.php");
		}
		
		// SI LA SELECCION ES "configuracion"
		else if($seccionSeleccionada=="configuracion" && $pconfiguracion==1)
		{
			include("modulos/secciones/agregarConfiguracion.php");
		}
		
		// SI LA SELECCION ES "permisos"
		else if($seccionSeleccionada=="permisos" && $ppermisos==1)
		{
			include("modulos/secciones/agregarPermisos.php");
		}
	}
}
?>
