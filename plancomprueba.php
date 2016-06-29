<?php
include 'planconexion.php';
include 'inicioSesionVAdmonClass.php';
$claseVAdmon = new inicioSesionVAdmonClass;
$claseVAdmon->sesionSeguraVAdmonInicio();
if(isset($_POST['usuario'], $_POST['contrasenia'])) {
   $usuario = $_POST['usuario'];
   $contrasenia = $_POST['contrasenia'];
   if($claseVAdmon->inicioSesionVAdmon($usuario, $contrasenia, $planconexion) == true) {
        echo TRUE;
     	//header("location: index.php?mensaje=correctoInicio&nombreUsuario=".$_POST["usuario"]);
   } else {
        echo FALSE;
     	//header("location: index.php?mensaje=errorUsuario&nombreUsuario=".$_POST['usuario']);
   }
} else {
	header("location: index.php?mensaje=errorUsuario&nombreUsuario=".$_POST['usuario']);
}
?>
