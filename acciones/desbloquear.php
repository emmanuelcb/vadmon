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
		$fijo=0;
		mysql_query("UPDATE `".$db."`.`vadmon_contenidos` 
		SET `fijo` = '".$fijo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_contenidos`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=contenidos&mensaje=desbloquearContenido");
   }
   
   // Si lo que deseamos editar es un banner
   else if($edicionseleccionada=="banners"){
		$id=$_GET['id'];
		$fijo=0;
		mysql_query("UPDATE `".$db."`.`vadmon_banners` 
		SET `fijo` = '".$fijo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_banners`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=banners&mensaje=desbloquearBanner");
   }
   
   // Si lo que deseamos editar es un artículo
   else if($edicionseleccionada=="articulos"){
		$id=$_GET['id'];
		$fijo=0;
		mysql_query("UPDATE `".$db."`.`vadmon_articulos` 
		SET `fijo` = '".$fijo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_articulos`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=articulos&mensaje=desbloquearArticulo");
   }
   
   // Si lo que deseamos es editar una noticia
   else if($edicionseleccionada=="noticias"){
		$id=$_GET['id'];
		$fijo=0;
		mysql_query("UPDATE `".$db."`.`vadmon_noticias` 
		SET `fijo` = '".$fijo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_noticias`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=noticias&mensaje=desbloquearNoticia");
   }
   
   // Si lo que deseamos es editar una configuracion
   else if($edicionseleccionada=="configuracion"){
		$id=$_GET['id'];
		$fijo=0;
		mysql_query("UPDATE `".$db."`.`vadmon_configuracion` 
		SET `fijo` = '".$fijo."',
		`modificador` = '".$nombreUsuario."',
		`fechamodificacion` = '".$fechahoy."' WHERE `vadmon_configuracion`.`id` = '".$id."' LIMIT 1 ;");

		header("Location: ../inicio.php?idcontenido=configuracion&mensaje=desbloquearConfiguracion");
   }
   else{echo "No se realizo la edicion";}
}
?> 
