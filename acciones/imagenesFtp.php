<?php
function enviarImagen($seccion, $imagen) {
	$server = "www.proyectos23kv.com"; //target server address or domain name from we wana download file
	$user = "proyec29"; //username on target server
	$pass = "1031412"; //password on target server for Ftp
	$file = "/recursos/".$seccion."/".$imagen; /*source file on the server which we wana download ,single file name refers that file is in Home/root*/
	$local_file = '../temporales/'.$seccion."/".$imagen;//download file and store as local.tar
	//================================
	$sessid = ftp_connect($server); //connect
	$login_ok = ftp_login($sessid, $user, "$pass"); //login
	if ((!$sessid) || (!$login_ok)):
	 echo "failed to connect: check hostname, username & password";
	 exit; //failed? Unable to connect!
	endif;
	 
	if (ftp_get($sessid, $local_file, $file, FTP_BINARY)) //Ftp get function which will download file
	{
	 echo "Successfully written to $local_file\n";
	} else {
	 echo "There was a problem\n";
	}
	 
	ftp_close($sessid);
}

function enviarImagenThumb($seccion, $imagen) {
	$directorio='www.vemeweb.com/temporales/'.$seccion.'/thumbs/';
	$conexion=ftp_connect($_COOKIE['servidor']);
	ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
	ftp_pasv($conexion,true);
	ftp_chdir($conexion,'/'.$_COOKIE['servidorFtpDirectorio'].'/recursos/'.$seccion.'/thumbs/');
	ftp_put($conexion,$imagen,$directorio.$archivo,FTP_ASCII);
}
?>