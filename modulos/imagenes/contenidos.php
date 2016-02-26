<?php
$javascriptExtra.='
function validarImagen() {
	if (document.enviarImagen.upfile.value.length==0) {
		alert("Por favor selecciona una imagen");
		document.enviarImagen.upfile.focus();
		return;
	}
	if (document.enviarImagen.nombre.value.length==0) {
		alert("Por favor escribe un nombre para la imagen");
		document.enviarImagen.nombre.focus();
		return;
	}
	document.enviarImagen.submit();
}';

$imagenes='';
$servidorImg = $HostDominio;
if($servidorImg == "localhost"){ $servidorImg = 'vemeweb.com'; }
$conexion = ftp_connect($servidorImg);
$resultado = ftp_login($conexion, $FTPUsuario, $FTPPass);
$archivos = ftp_nlist($conexion, $FTPDominioDir."/recursos/".$carpeta."/");
sort($archivos);
foreach($archivos as $img){
	if($img <> "." && $img <> ".."){
		$extension = $claseFunciones->obtenerExtension($img);
		if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" ||$extension=="gif" ||
		   $extension=="JPG" || $extension=="PNG" ||$extension=="JPEG" ||$extension=="GIF"){
			$imagenes.='<div class="divImagenImg">';
			$imagenes.='<div class="btnBorrarImg" id="btnBorrarImg">';
			$imagenes.='<a href="acciones/eliminarImagen.php?eliminarImagen='.$img.'&carpeta='.$carpeta.'" title="Eliminar imagen">X</a></div>';
			$imagenes.='<img src="http://'.$HostDominio.'/recursos/'.$carpeta.'/'.$img.'" height="170" alt=""/></div>';
		}
	}
} 
$mostrarContenido.='<div class="encabezadoSeccion"><span class="tituloSeccion">Imágenes</span><br/><br/>';
$mostrarContenido.='<span style="color:#999999;"><a href="inicio.php?mostrarImagenes=listar&carpeta=contenidos" title="Contenidos" class="activo">Contenidos</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=banners" title="Banners">Banners</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=diseno" title="Diseño">Diseño</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=usuarios" title="Usuarios">Usuarios</a>';
$mostrarContenido.='&nbsp;&nbsp;|&nbsp;&nbsp;<a href="inicio.php?mostrarImagenes=listar&carpeta=promociones" title="Promociones">Promociones</a>';
$mostrarContenido.='</span></div>';
 
$javascriptExtra.='function cerrarDiv(fd, div){ $("."+fd).hide(); $("."+div).hide();}';
$elementosVolatiles.='<div class="fdDivVolatil"></div><div class="divVolatilSubirImg"><div class="btnCerrarDiv" onclick="cerrarDiv(\'fdDivVolatil\',\'divVolatilSubirImg\')">CERRAR</div>';
$elementosVolatiles.='<p class="tituloDivVolatil">Subir una nueva imagen</p><div class="lineaDivVolatil"></div>';
$elementosVolatiles.='<form action="acciones/subirImagen.php?carpeta='.$carpeta.'" name="enviarImagen" method="post" enctype="multipart/form-data" style="line-height:30px;">';
$elementosVolatiles.='<center><span style="font-size:10px; color:#999999;">Selecciona tu imagen</span><br/><input name="upfile" id="upfile" type="file"/><br/>';
$elementosVolatiles.='<span style="font-size:10px; color:#999999;">Nombra tu imagen:</span><br/><input name="nombre" type="text" size="20" style="width:300px;" />';
$elementosVolatiles.='<br /><input type="button" onclick="validarImagen();" value="Enviar Foto" class="btnNuevo"/></center></form>';
$elementosVolatiles.='</div>';
 
$javascriptExtra.='function abrirDiv(fd, div){ $("."+fd).show(); $("."+div).show();}';
$mostrarContenido.='<span class="btnNuevo" onclick="abrirDiv(\'fdDivVolatil\',\'divVolatilSubirImg\')">Subir Nueva imagen</span><br/><br/></div><div class="contenedorRegistros">';
$mostrarContenido.=$imagenes.'</div>';
?>