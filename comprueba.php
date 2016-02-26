<?php
include("planconexion.php");
include("inicioSesionVAdmonClass.php");
$claseVAdmon = new inicioSesionVAdmonClass;
$claseVAdmon->sesionSeguraVAdmonInicio();
include ('conexion.php');

if($stmt = $conexion->prepare("SELECT id, nivelusuario, nick, password FROM vadmon_usuarios where nick = ? AND password = ?")){
	$stmt->bind_param("ss", $_POST["usuario"], $_POST["contrasenia"]);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_rslt, $nivelusuario_rslt, $nick_rslt, $password_rslt);
	if($stmt->num_rows > 0) {
		while($stmt->fetch()){
			setcookie("idUsuario", "".$id_rslt."", time()+(3600 * 24));
			setcookie("nivelUsuario", "".$nivelusuario_rslt."", time()+(3600 * 24));
			setcookie("loggedin", "".$nick_rslt."", time()+(3600 * 24));
			header("location: inicio.php?mensaje=correctoUsuario&nombreUsuario=".$nick_rslt);
		}
	}
}
?>
