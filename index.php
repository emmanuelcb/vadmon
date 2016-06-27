<?php
$archivoActual="index.php";
include("planconexion.php");
include("vadmoninstalacion.php");
include("inicioSesionVAdmonClass.php");
$claseVAdmon = new inicioSesionVAdmonClass;
$claseVAdmon->sesionSeguraVAdmonInicio();
if($claseVAdmon->revisaInicioVAdmon($planconexion) == true){
  	echo 'It\'s true';
	include("ivariables.php");
	include('encabezado.php');
	include('contenedor.php');
	include('pie.php');
}else{
  	echo 'It\'s false';
	include("planvariables.php");
	include("planencabezado.php");
	include("plancontenedor.php");
	include("planpie.php");
}
?>
