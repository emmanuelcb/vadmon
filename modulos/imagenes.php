<?php
/* //////////////////////
	MOSTRAR IMAGENES
////////////////////// */
if($stmtExisteVersion = $conexion->prepare("SHOW TABLES LIKE 'vadmon_imagenes'")) {
	$stmtExisteVersion->execute();
	$stmtExisteVersion->store_result();
	if($stmtExisteVersion->num_rows == '') {
		include("acciones/instalacion/vadmon_imagenes.php");
	}
}
if(isset($_GET["mostrarImagenes"]) && isset($_GET["carpeta"])){
	$carpeta = $_GET["carpeta"];
	// Si carpeta es igual a "contenidos"
	if($carpeta=="contenidos"){ include("modulos/imagenes/contenidos.php"); }
	// Si carpeta es igual a "banners"
	if($carpeta=="banners"){ include("modulos/imagenes/banners.php"); }	
	// Si carpeta es igual a "diseno"
	if($carpeta=="diseno"){ include("modulos/imagenes/diseno.php"); }	
	// Si carpeta es igual a "usuarios"
	if($carpeta=="usuarios"){ include("modulos/imagenes/usuarios.php"); }
	// Si carpeta es igual a "promociones"
	if($carpeta=="promociones"){ include("modulos/imagenes/promociones.php"); }
	// Si carpeta es igual a "galeria"
	if($carpeta=="galeria"){ include("modulos/imagenes/galeria.php"); }
}else if(isset($_GET["mostrarImagenes"])){
	$mostrarContenido.='<div class="encabezadoSeccion"><span class="tituloSeccion">Imágenes</span><br/><br/>';
	$mostrarContenido.='<span style="color:#999999;"><a href="inicio.php?mostrarImagenes=listar&carpeta=contenidos" title="Contenidos">Contenidos</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=banners" title="Banners">Banners</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=diseno" title="Diseño">Diseño</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=usuarios" title="Usuarios">Usuarios</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=promociones" title="Promociones">Promociones</a>';
	$mostrarContenido.='</span></div>';
}
?>