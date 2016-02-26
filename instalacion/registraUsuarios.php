<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db("".$baseDatos."", $conexion);

// Insertamos la informacion de veme
mysql_query("insert into vadmon_usuarios values 
('1', 'vemeweb', 'vemeWEB532', 'vemeweb', 'admon', 'veme@vemeweb.com', 'imagenDefault_usuario.png', 'maestro', '1')")
or die("Could not insert data because ".mysql_error());
	
// Insertamos la informacion del usuario
$newNick = $_GET["nombreUsuario"];
$newPassword = $_GET["password"];
$newNombre = $_GET["nombre"];
$newApellidos = $_GET["apellidos"];
$newEmail = $_GET["email"];
$newAvatar = $_GET["avatar"];
$newNivelUs = $_GET["nivelusuario"];
mysql_query("insert into vadmon_usuarios values 
('2', '$newNick', '$newPassword', '$newNombre', '$newApellidos', '$newEmail', '$newAvatar', '$newNivelUs', '1')")
or die("Could not insert data because ".mysql_error());
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>