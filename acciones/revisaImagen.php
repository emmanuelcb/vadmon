<?php
$img=$_POST["img"];

$servidorImg = $_COOKIE['servidor'];
if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/".$carpeta."/");
sort($archivos);
foreach ($archivos as $archivo) {
	if($archivo <> "."){ if($archivo <> ".."){
		if($archivo == $img){
			echo 'existe';
		}
	}}
}
?>