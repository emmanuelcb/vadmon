<?php
/* //////////////////////
	MOSTRAR IMAGENES
////////////////////// */
$strImagenesTableExistsSQLName = 'isThereExistingImagenesTable';
$strImagenesTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
$strImagenesTableExistsSQL .= 'WHERE table_schema = \'vadmon_imagenes\'';
if(pg_prepare($conexion, $strImagenesTableExistsSQLName, $strImagenesTableExistsSQL))
{
	$rslImagenesTableExists = pg_execute($conexion, $strImagenesTableExistsSQLName);
	$fetchImagenesTableExists = pg_fetch_all($rslImagenesTableExists);
	if(sizeof($fetchImagenesTableExists) == 0)
    {
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
	$mostrarContenido.='<div class="encabezadoSeccion"><span class="tituloSeccion">Im&aacute;genes</span><br/><br/>';
	$mostrarContenido.='<span style="color:#999999;"><a href="inicio.php?mostrarImagenes=listar&carpeta=contenidos" title="Contenidos">Contenidos</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=banners" title="Banners">Banners</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=diseno" title="Diseno">Dise&ntilde;o</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=usuarios" title="Usuarios">Usuarios</a>';
	$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=promociones" title="Promociones">Promociones</a>';
	$mostrarContenido.='</span></div>';
}
?>
