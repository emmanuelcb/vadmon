<?php
$imagenes1='';
$servidorImg = $HostDominio;
if($servidorImg == "localhost"){ $servidorImg = 'vemeweb.com'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $FTPUsuario, $FTPPass);
$archivos = ftp_nlist($conexion, $FTPDominioDir."/recursos/".$carpeta."/promociones/");
sort($archivos);
foreach($archivos as $img){
	if($img <> "." && $img <> ".."){
		$extension = $claseFunciones->obtenerExtension($img);
		if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" ||$extension=="gif" ||
		   $extension=="JPG" || $extension=="PNG" ||$extension=="JPEG" ||$extension=="GIF"){
			$imagenes1.='<div class="divImagenImg">';
			$imagenes1.='<div class="btnBorrarImg" id="btnBorrarImg">';
			$imagenes1.='<a href="acciones/eliminarImagen.php?eliminarImagen='.$img.'&carpeta='.$carpeta.'" title="Eliminar imagen">X</a></div>';
			$imagenes1.='<img src="http://'.$HostDominio.'/recursos/'.$carpeta.'/promociones/'.$img.'" height="170" alt=""/></div>';
		}
	}
}

$mostrarContenido.='<div class="encabezadoSeccion"><span class="tituloSeccion">Imágenes</span><br/><br/>';
$mostrarContenido.='<span style="color:#999999;"><a href="inicio.php?mostrarImagenes=listar&carpeta=contenidos" title="Contenidos">Contenidos</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=banners" title="Banners">Banners</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=diseno" title="Diseño">Diseño</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=usuarios" title="Usuarios">Usuarios</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=promociones" title="Promociones" class="activo">Promociones</a>';
$mostrarContenido.='</span></div>';

$javascriptExtra.='function cerrarDiv(fd, div){ $("."+fd).hide(); $("."+div).hide();}';
$elementosVolatiles.='<div class="fdDivVolatil2"></div><div class="divVolatilSubirImg2"><div class="btnCerrarDiv" onclick="cerrarDiv(\'fdDivVolatil2\',\'divVolatilSubirImg2\')">CERRAR</div>';
$elementosVolatiles.='<p class="tituloDivVolatil">Subir una nueva imagen</p><div class="lineaDivVolatil"></div>';
$elementosVolatiles.='<form action="acciones/subirImagen.php?carpeta='.$carpeta.'&subcarpeta=promociones" method="post" enctype="multipart/form-data" style="line-height:30px;">';
$elementosVolatiles.='<center><span style="font-size:10px; color:#999999;">Selecciona tu imagen</span><br/><input name="upfile" id="upfile" type="file"/><br/>';
$elementosVolatiles.='<span style="font-size:10px; color:#999999;">Nombra tu imagen:</span><br/><input name="nombre" type="text" size="20" style="width:300px;" />';
$elementosVolatiles.='<br /><input type="submit" value="Enviar Foto" class="btnNuevo"/></center></form>';
$elementosVolatiles.='</div>';

$javascriptExtra.='function abrirDiv(fd, div){ $("."+fd).show(); $("."+div).show();}';
$mostrarContenido.='<h1 style="color:#999999;">Promociones</h1>';
$mostrarContenido.='<span class="btnNuevo" onclick="abrirDiv(\'fdDivVolatil2\',\'divVolatilSubirImg2\')">Subir Nueva imagen</span><br/><br/></div><div class="contenedorRegistros">';
$mostrarContenido.=$imagenes1.'</div>';

$imagenes2='';
$servidorImg = $HostDominio;
if($servidorImg == "localhost"){ $servidorImg = 'vemeweb.com'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $FTPUsuario, $FTPPass);
$archivos = ftp_nlist($conexion, $FTPDominioDir."/recursos/".$carpeta."/thumbs/");
sort($archivos);
foreach($archivos as $img){
	if($img <> "." && $img <> ".."){
		$extension = $claseFunciones->obtenerExtension($img);
		if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" ||$extension=="gif" ||
		   $extension=="JPG" || $extension=="PNG" ||$extension=="JPEG" ||$extension=="GIF"){
			$imagenes2.='<div class="divImagenImg">';
			$imagenes2.='<div class="btnBorrarImg" id="btnBorrarImg">';
			$imagenes2.='<a href="acciones/eliminarImagen.php?eliminarImagen='.$img.'&carpeta='.$carpeta.'" title="Eliminar imagen">X</a></div>';
			$imagenes2.='<img src="http://'.$HostDominio.'/recursos/'.$carpeta.'/thumbs/'.$img.'" height="170" alt=""/></div>';
		}
	}
}
		 
$javascriptExtra.='function cerrarDiv(fd, div){ $("."+fd).hide(); $("."+div).hide();}';
$elementosVolatiles.='<div class="fdDivVolatil"></div><div class="divVolatilSubirImg"><div class="btnCerrarDiv" onclick="cerrarDiv(\'fdDivVolatil\',\'divVolatilSubirImg\')">CERRAR</div>';
$elementosVolatiles.='<p class="tituloDivVolatil">Subir una nueva imagen</p><div class="lineaDivVolatil"></div>';
$elementosVolatiles.='<form action="acciones/subirImagen.php?carpeta='.$carpeta.'&subcarpeta=thumbs" method="post" enctype="multipart/form-data" style="line-height:30px;">';
$elementosVolatiles.='<center><span style="font-size:10px; color:#999999;">Selecciona tu imagen</span><br/><input name="upfile" id="upfile" type="file"/><br/>';
$elementosVolatiles.='<span style="font-size:10px; color:#999999;">Nombra tu imagen:</span><br/><input name="nombre" type="text" size="20" style="width:300px;" />';
$elementosVolatiles.='<br /><input type="submit" value="Enviar Foto" class="btnNuevo"/></center></form>';
$elementosVolatiles.='</div>';

$javascriptExtra.='function abrirDiv(fd, div){ $("."+fd).show(); $("."+div).show();}';
$mostrarContenido.='<h1 style="color:#999999;">Thumbs</h1>';
$mostrarContenido.='<span class="btnNuevo" onclick="abrirDiv(\'fdDivVolatil\',\'divVolatilSubirImg\')">Subir Nueva imagen</span><br/><br/></div><div class="contenedorRegistros">';
$mostrarContenido.=$imagenes2.'</div>';
?>