<?php
$max=3000000; // 3.0MB
$tamanioArchivo = $_FILES['upfile']['size'];
if($tamanioArchivo < $max){
	$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
	if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
	   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
		$nombreescrito = $_POST["nombre"];
		$nombrelimpio=htmlspecialchars($nombreescrito);
		$nombrefinal=$nombrelimpio.".".$ext;
		$imagenSubir = $_FILES['upfi le']['tmp_name'];
		//Revisamos si existe la imagen
		$servidorImg = $_COOKIE['servidor'];
		if($servidorImg == "localhost"){ $servidorImg = 'localhost:8888'; }
		$conexion = ftp_connect($servidorImg);
		$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
		$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/".$carpeta."/");
		sort($archivos);
		foreach ($archivos as $archivo) {
			if($archivo <> "."){ if($archivo <> ".."){
				if($archivo == $imagenSubir){
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
				}else{
					//Subimos la Imagen
					$conexion=ftp_connect($_COOKIE['servidor']);
					ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
					ftp_pasv($conexion,true);
					ftp_chdir($conexion,'/public_html/recursos/'.$carpeta.'/');
					if(ftp_put($conexion,$nombrefinal,$archivo,FTP_BINARY)){
						header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=correctoImagen");
					}else{
						header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen1");
					}
					ftp_close($conexion);
				}
			}}
		}		
	}else{
		header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
	}
}else{
	header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
}
?>