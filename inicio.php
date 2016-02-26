<?php
$archivoActual="inicio.php";
include("planconexion.php");
include("inicioSesionVAdmonClass.php");
$claseVAdmon = new inicioSesionVAdmonClass;
$claseVAdmon->sesionSeguraVAdmonInicio();
if($claseVAdmon->revisaInicioVAdmon($planconexion) == true){
	include("conexion.php");
	include("inicioSesionDominioClass.php");
	$claseDominio = new inicioSesionDominioClass;
	$existeCookie = $claseDominio->revisaInicioDominio();
	if($existeCookie != true){
		header("location:index.php");
	}else{
		include("ivariables.php");
		echo "ivariables included<br/>";
		include('encabezado.php');
		include('contenedor.php');
		include('pie.php');
	}
}else{
	header("location:index.php");
}
?>
