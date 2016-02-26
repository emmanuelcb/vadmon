<?php
include("../conexion.php");

$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
$fechahoy=date("Y-m-d"); 

if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{ 
	$edicionseleccionada=$_GET['seccionSeleccionada'];

	// Si lo que deseamos editar es un contenido
	if($edicionseleccionada=="contenidos"){
		$id=$_GET['id'];
		$activo=1;

		mysql_query("UPDATE `".$db."`.`vadmon_contenidos` 
		SET `activo` = '".$activo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_contenidos`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=contenidos&mensaje=activarContenido");
	}
	
	// Si lo que deseamos editar es una promocion
	if($edicionseleccionada=="promociones"){
		$id=$_GET['id'];
		$activo=1;

		mysql_query("UPDATE `".$db."`.`vadmon_promociones` 
		SET `activo` = '".$activo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_promociones`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=promociones&mensaje=activarContenido");
	}

	// Si lo que deseamos editar es un banner
	else if($edicionseleccionada=="banners"){
		$id=$_GET['id'];
		$activo=1;
		mysql_query("UPDATE `".$db."`.`vadmon_banners` 
		SET `activo` = '".$activo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_banners`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=banners&mensaje=activarBanner");
	}

	// Si lo que deseamos editar es un artículo
	else if($edicionseleccionada=="articulos"){
		$id=$_GET['id'];
		$activo=1;
		mysql_query("UPDATE `".$db."`.`vadmon_articulos` 
		SET `activo` = '".$activo."' ,
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_articulos`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=articulos&mensaje=activarArticulo");
	}

	// Si lo que deseamos es editar una noticia
	else if($edicionseleccionada=="noticias"){
		$id=$_GET['id'];
		$activo=1;
		mysql_query("UPDATE `".$db."`.`vadmon_noticias` 
		SET `activo` = '".$activo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."'	   WHERE `vadmon_noticias`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=noticias&mensaje=activarNoticia");
	}

	// Si lo que deseamos es editar una configuracion
	else if($edicionseleccionada=="configuracion"){
		$id=$_GET['id'];
		$activo=1;
		mysql_query("UPDATE `".$db."`.`vadmon_configuracion` 
		SET `activo` = '".$activo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_configuracion`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=configuracion&mensaje=activarConfiguracion");
	}else{echo "No se realizo la edicion";}
}
?> 
