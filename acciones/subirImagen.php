<?php
include("../conexion.php");
$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
	if(isset($_GET["carpeta"])){
		// DESIGNAMOS LA CARPETA
		$carpeta = $_GET["carpeta"];
		
		// SI LA CARPETA ES "contenidos"
		if($carpeta=="contenidos"){
			include("subirImagen/contenidos.php");
		}
		
		// SI LA CARPETA ES "banners"
		if($carpeta=="banners"){
			$max=3000000; // 3.0MB
			$tamanioArchivo = $_FILES['upfile']['size'];
			if($tamanioArchivo < $max){
				$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
				if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
				   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
					$nombreescrito = $_POST["nombre"];
					$nombrelimpio=htmlspecialchars($nombreescrito);
					$nombrefinal=$nombrelimpio.".".$ext;
					$archivo = $_FILES['upfile']['tmp_name'];
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
				}else{
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
				}
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
			}
		}
		
		// SI LA CARPETA ES "diseno"
		if($carpeta=="diseno"){
			$max=3000000; // 3.0MB
			$tamanioArchivo = $_FILES['upfile']['size'];
			if($tamanioArchivo < $max){
				$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
				if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
				   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
					$nombreescrito = $_POST["nombre"];
					$nombrelimpio=htmlspecialchars($nombreescrito);
					$nombrefinal=$nombrelimpio.".".$ext;
					$archivo = $_FILES['upfile']['tmp_name'];
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
				}else{
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
				}
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
			}
		}
		
		// SI LA CARPETA ES "usuarios"
		if($carpeta=="usuarios"){
			$max=500000; // 0.5MB
			$tamanioArchivo = $_FILES['upfile']['size'];
			if($tamanioArchivo < $max){
				$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
				if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
				   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
					$nombreescrito = $_POST["nombre"];
					$nombrelimpio=htmlspecialchars($nombreescrito);
					$nombrefinal=$nombrelimpio.".".$ext;
					$archivo = $_FILES['upfile']['tmp_name'];
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
				}else{
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
				}
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
			}
		}
			
			// SI LA CARPETA ES "promociones"
		if($carpeta=="promociones"){
			if($_GET["subcarpeta"] == "promociones"){
				$subcarpeta = $_GET["subcarpeta"];
				$max=3000000; // 3.0MB
				$tamanioArchivo = $_FILES['upfile']['size'];
				if($tamanioArchivo < $max){
					$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
					if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
					   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
						$nombreescrito = $_POST["nombre"];
						$nombrelimpio=htmlspecialchars($nombreescrito);
						$nombrefinal=$nombrelimpio.".".$ext;
						$archivo = $_FILES['upfile']['tmp_name'];
						$conexion=ftp_connect($_COOKIE['servidor']);
						ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
						ftp_pasv($conexion,true);
						ftp_chdir($conexion,'/public_html/recursos/'.$carpeta.'/'.$subcarpeta.'/');
						if(ftp_put($conexion,$nombrefinal,$archivo,FTP_BINARY)){
							header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=correctoImagen");
						}else{
							header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen1");
						}
						ftp_close($conexion);
					}else{
						header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
					}
				}else{
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
				}
			}
			else if($_GET["subcarpeta"] == "thumbs"){
				$subcarpeta = $_GET["subcarpeta"];
				$max=3000000; // 3.0MB
				$tamanioArchivo = $_FILES['upfile']['size'];
				if($tamanioArchivo < $max){
					$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
					if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
					   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
						$nombreescrito = $_POST["nombre"];
						$nombrelimpio=htmlspecialchars($nombreescrito);
						$nombrefinal=$nombrelimpio.".".$ext;
						$archivo = $_FILES['upfile']['tmp_name'];
						$conexion=ftp_connect($_COOKIE['servidor']);
						ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
						ftp_pasv($conexion,true);
						ftp_chdir($conexion,'/public_html/recursos/'.$carpeta.'/'.$subcarpeta.'/');
						if(ftp_put($conexion,$nombrefinal,$archivo,FTP_BINARY)){
							header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=correctoImagen");
						}else{
							header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen1");
						}
						ftp_close($conexion);
					}else{
						header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
					}
				}else{
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
				}
			}
		}
		
		// SI LA CARPETA ES "usuarios"
		if($carpeta=="galeria"){
			$max=500000; // 0.5MB
			$tamanioArchivo = $_FILES['upfile']['size'];
			if($tamanioArchivo < $max){
				$ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
				if($ext=="png" || $ext=="PNG" || $ext=="gif" || $ext=="GIF" ||
				   $ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG"){
					$nombreescrito = $_POST["nombre"];
					$nombrelimpio=htmlspecialchars($nombreescrito);
					$nombrefinal=$nombrelimpio.".".$ext;
					$archivo = $_FILES['upfile']['tmp_name'];
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
				}else{
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen2");
				}
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=".$carpeta."&mensaje=errorImagen3");
			}
		}
	}
}
?>