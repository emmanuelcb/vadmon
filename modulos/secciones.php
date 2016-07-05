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
	include("modulos/secciones/seccionesAgregar.php");
}
?>
