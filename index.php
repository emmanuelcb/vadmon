<?php
$archivoActual="index.php";
include("planconexion.php");
include("vadmoninstalacion.php");
include("inicioSesionVAdmonClass.php");
$claseVAdmon = new inicioSesionVAdmonClass;
$claseVAdmon->sesionSeguraVAdmonInicio();
if($claseVAdmon->revisaInicioVAdmon($planconexion) == false){
	//include("ivariables.php");
	include('encabezado.php');
	include('contenedor.php');
	include('pie.php');
}else{
	include("planvariables.php");
	include("planencabezado.php");
	include("plancontenedor.php");
	include("planpie.php");
}
?>
