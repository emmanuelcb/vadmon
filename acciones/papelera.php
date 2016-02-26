<?php
include("../conexion.php");
$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
	$seleccion=$_GET["id"];
	$tabla=$_GET["tabla"];
	$usuario=$_COOKIE['idUsuario'];
	mysql_query("insert into vadmon_papelera
			   (id, seleccion, tabla, usuario) values
			   ('$id', '$seleccion', '$tabla', '$usuario')");
}
header("Location: ../inicio.php?idcontenido=contenidos&mensaje=correctoEliminar");
?> 