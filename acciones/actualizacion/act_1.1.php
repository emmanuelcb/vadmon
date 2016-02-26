<?php
//include("../../conexion.php");

if(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'vadmon_imagenes'"))==''){ include("instalacion/vadmon_imagenes.php"); }

// GALERIA
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/galeria/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'galeria')"); 
	}}
}
ftp_close($conexion);

// CONTENIDOS
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/contenidos/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'contenidos')"); 
	}}
}
ftp_close($conexion);

// BANNERS
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/banners/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'banners')"); 
	}}
}
ftp_close($conexion);

// DISEÑO
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/diseno/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'diseno')"); 
	}}
}
ftp_close($conexion);

// USUARIOS
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/usuarios/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'usuarios')"); 
	}}
}
ftp_close($conexion);

// PROMOCIONES - PROMOCIONES
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/promociones/promociones/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'promociones/promociones')"); 
	}}
}
ftp_close($conexion);

// PROMOCIONES - THUMBS
$galeria_imgs='';
$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/promociones/thumbs/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		mysql_query("insert into vadmon_imagenes (nombreimg, carpeta) values ('$archivo', 'promociones/thumbs')"); 
	}}
}
ftp_close($conexion);

// ACTUALIZAR VERSION CMS
mysql_query("UPDATE `".$db."`.`vadmon_version` SET `version` = '1.1' LIMIT 1 ;");

echo "<script type='text/javascript'> \$('#txtEstado').html('Parche ".$versionFinalPost." instalado <br/><a href=\'../inicio.php\' style=\'font-size:11px;\'>REGRESAR</a>'); </script>";
?>