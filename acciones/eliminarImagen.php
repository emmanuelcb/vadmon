<?php
include("../conexion.php");
$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
	if(isset($_GET["carpeta"])){
		$carpeta = $_GET["carpeta"];
		//Si la carpeta es "contenidos"
		if($carpeta=="contenidos"){
			if(isset($_GET["eliminarImagen"])){
				$imagenSeleccionada=$_GET["eliminarImagen"];
				$directorioImagen='../../recursos/contenidos/'.$imagenSeleccionada;
				$directorioImagenThumb='../../recursos/contenidos/thumbs/'.$imagenSeleccionada;
				unlink($directorioImagen);
				unlink($directorioImagenThumb);
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=contenidos");
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=contenidos");
			}
		}
		
		//Si la carpeta es "promociones"
		if($carpeta=="promociones"){
			if(isset($_GET["eliminarImagen"])){
				if($_GET["subcarpeta"] == "promociones"){
					$imagenSeleccionada=$_GET["eliminarImagen"];
					$directorioImagen='../../recursos/promociones/promociones/'.$imagenSeleccionada;
					$directorioImagenThumb='../../recursos/promociones/promociones/thumbs/'.$imagenSeleccionada;
					unlink($directorioImagen);
					unlink($directorioImagenThumb);
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=promociones");
				}else if($_GET["subcarpeta"] == "thumbs"){
					$imagenSeleccionada=$_GET["eliminarImagen"];
					$directorioImagen='../../recursos/promociones/thumbs/'.$imagenSeleccionada;
					unlink($directorioImagen);
					header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=promociones");
				}
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=promociones");
			}
		}
		
		//Si la carpeta es "banners"
		if($carpeta=="banners"){
			if(isset($_GET["eliminarImagen"])){
				$imagenSeleccionada=$_GET["eliminarImagen"];
				$directorioImagen='../../recursos/banners/'.$imagenSeleccionada;
				$directorioImagenThumb='../../recursos/banners/thumbs/'.$imagenSeleccionada;
				unlink($directorioImagen);
				unlink($directorioImagenThumb);
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=banners");
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=banners");
			}
		}
		
		//Si la carpeta es "diseno"
		if($carpeta=="diseno"){
			if(isset($_GET["eliminarImagen"])){
				$imagenSeleccionada=$_GET["eliminarImagen"];
				$directorioImagen='../../recursos/diseno/'.$imagenSeleccionada;
				unlink($directorioImagen);
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=diseno");
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=diseno");
			}
		}
		
		//Si la carpeta es "usuarios"
		if($carpeta=="usuarios"){
			if(isset($_GET["eliminarImagen"])){
				$imagenSeleccionada=$_GET["eliminarImagen"];
				$directorioImagen='../../recursos/usuarios/thumbs/'.$imagenSeleccionada;
				$directorioImagenO='../../recursos/usuarios/'.$imagenSeleccionada;
				unlink($directorioImagen);
				unlink($directorioImagenO);
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=usuarios");
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=usaurios");
			}
		}
		
		//Si la carpeta es "galeria"
		if($carpeta=="galeria"){
			if(isset($_GET["eliminarImagen"])){
				$imagenSeleccionada=$_GET["eliminarImagen"];
				$conexion=ftp_connect($_COOKIE['servidor']);
				ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
				ftp_pasv($conexion,true);
				ftp_chdir($conexion,'/public_html/recursos/'.$carpeta.'/');
				ftp_delete($conexion, $imagenSeleccionada);
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=galeria");
			}else{
				header("Location: ../inicio.php?mostrarImagenes=listar&carpeta=galeria");
			}
		}
	}
}
?> 