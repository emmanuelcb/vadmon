<?php
include("planconexion.php");
include("inicioSesionVAdmonClass.php");
$claseVAdmon = new inicioSesionVAdmonClass;
$claseVAdmon->sesionSeguraVAdmonInicio();
include ('conexion.php');

$strCompruebaSQL = 'SELECT id, nivelusuario, nick, password FROM vadmon_usuarios where nick = $1 AND password = $2';
if($rslComprueba = pg_query_params($conexion, $strCompruebaSQL, array($_POST["usuario"], $_POST["contrasenia"])))
{
	if(pg_num_rows($rslComprueba) > 0) {
		while($rowComprueba = pg_fetch_assoc($rslComprueba))
        {
			setcookie("idUsuario", "".$rowComprueba['id']."", time()+(3600 * 24));
			setcookie("nivelUsuario", "".$rowComprueba['nivelusuario']."", time()+(3600 * 24));
			setcookie("loggedin", "".$rowComprueba['nick']."", time()+(3600 * 24));
			header("location: inicio.php?mensaje=correctoUsuario&nombreUsuario=".$rowComprueba['nick']);
		}
	}
}
?>
