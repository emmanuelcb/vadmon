<?php
/* //////////////////////
	MOSTRAR SESIONES
////////////////////// */

// Si la pagina actual trae especificación de contenido
if(isset($_GET["idcontenido"]) && !isset($_GET["accion"])){
	$seccionSeleccionada = $_GET["idcontenido"];
	
	if($stmtExiste = $conexion->prepare("SHOW TABLES LIKE 'vadmon_".$_GET["idcontenido"]."'")) {
		$stmtExiste->execute();
		$stmtExiste->store_result();
		if($stmtExiste->num_rows == '') {
			include("acciones/instalacion/vadmon_".$_GET["idcontenido"].".php");
		}
	}
	if($stmtQuery = $conexion->query("SELECT * FROM vadmon_".$_GET["idcontenido"]." ORDER BY id DESC")){
		if($stmtQuery->num_rows>0){
			// Si la seleccion es "contenidos"
			if($seccionSeleccionada=="contenidos" && $pcontenidos==1)
			{
				include("modulos/secciones/mostrarContenidos.php");
			}
			
			// Si la seleccion es "banners"
			else if($seccionSeleccionada=="banners" && $pbanners==1)
			{
				include("modulos/secciones/mostrarBanners.php");
			}
			
			// Si la seleccion es "articulos"
			else if($seccionSeleccionada=="articulos" && $particulos==1)
			{
				include("modulos/secciones/mostrarArticulos.php");
			}
			
			// Si la seleccion es "noticias"
			else if($seccionSeleccionada=="noticias" && $pnoticias==1)
			{
				include("modulos/secciones/mostrarNoticias.php");
			}
			
			// Si la seleccion es "promociones"
			else if($seccionSeleccionada=="promociones" && $ppromociones==1)
			{
				include("modulos/secciones/mostrarPromociones.php");
			}
			
			// Si la seleccion es "configuracion"
			else if($seccionSeleccionada=="configuracion" && $pconfiguracion==1)
			{
				include("modulos/secciones/mostrarConfiguracion.php");
			}
			
			// Si la seleccion es "permisos"
			else if($seccionSeleccionada=="permisos" && $ppermisos==1)
			{
				include("modulos/secciones/mostrarPermisos.php");
			}
			
			// Si la seleccion es "papelera"
			else if($seccionSeleccionada=="papelera" && $ppapelera==1)
			{
				include("modulos/secciones/mostrarPapelera.php");
			}
			
			// Si la seleccion es "registro"
			else if($seccionSeleccionada=="registro" && $pbasesdedatos==1)
			{
				include("modulos/secciones/mostrarRegistro.php");
			}else{
				header("Location: inicio.php?mensaje=sinPermiso");
			}	
		}
	}else{
		$mostrarContenido.='<div class="encabezadoSeccion">';
		$mostrarContenido.='<span class="tituloSeccion">'.$seccionSeleccionada.'</span><br/></div>';
		if($pcrear==1){
			$mostrarContenido.='<a href="inicio.php?accion=agregarContenido&tablaseleccion='.$seccionSeleccionada.'" ';
			$mostrarContenido.='title="agregar" class="btnNuevo">Agregar '.$seccionSeleccionada.'</a><br/><br/><br/>';
		}
	}
}else if(isset($_GET["idperfil"])){
	$mostrarContenido.="";
}

/* //////////////////////////////
		EDITAR SESIONES
////////////////////////////// */
if(isset($_GET["accion"])=="editarContenido")
{
	$seccionSeleccionada="";
	if(isset($_GET["tabla"])){
		$seccionSeleccionada=$_GET["tabla"];
		
		// SI LA SELECCION ES "contenidos"
		if($seccionSeleccionada=="contenidos" && $pcontenidos==1)
		{
			include("modulos/secciones/editarContenidos.php");
		}
		
		// SI LA SELECCION ES "banners"
		else if($seccionSeleccionada=="banners" && $pbanners==1)
		{
			include("modulos/secciones/editarBanners.php");
		}
		
		// SI LA SELECCION ES "articulos"
		else if($seccionSeleccionada=="articulos" && $particulos==1)
		{
			include("modulos/secciones/editarArticulos.php");
		}
		
		// SI LA SELECCION ES "noticias"
		else if($seccionSeleccionada=="noticias" && $pnoticias==1)
		{
			include("modulos/secciones/editarNoticias.php");
		}
		
		// SI LA SELECCION ES "promociones"
		else if($seccionSeleccionada=="promociones" && $ppromociones==1)
		{
			include("modulos/secciones/editarPromociones.php");
		}
		
		// SI LA SELECCION ES "configuracion"
		else if($seccionSeleccionada=="configuracion" && $pconfiguracion==1)
		{
			include("modulos/secciones/editarConfiguracion.php");
		}
		
		// SI LA SELECCION ES "permisos"
		else if($seccionSeleccionada=="permisos" && $ppermisos==1)
		{
			include("modulos/secciones/editarPermisos.php");
		}
		else{ $mostrarContenido = "No hay nada que modificar";}
	}
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