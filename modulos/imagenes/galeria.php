<?php
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
		 
$mostrarContenido.='<div class="encabezadoSeccion"><span class="tituloSeccion">Galer&iacute;a</span></div>';

$javascriptExtra.='function cerrarDiv(fd, div){ $("."+fd).hide(); $("."+div).hide();}';
$elementosVolatiles.='<div class="fdDivVolatil"></div><div class="divVolatilSubirImg"><div class="btnCerrarDiv" onclick="cerrarDiv(\'fdDivVolatil\',\'divVolatilSubirImg\')">CERRAR</div>';
$elementosVolatiles.='<p class="tituloDivVolatil">Subir una nueva imagen</p><div class="lineaDivVolatil"></div>';
$elementosVolatiles.='<form action="acciones/subirImagen.php?carpeta='.$carpeta.'" method="post" enctype="multipart/form-data" style="line-height:30px;">';
$elementosVolatiles.='<center><span style="font-size:10px; color:#999999;">Selecciona tu imagen</span><br/><input name="upfile" id="upfile" type="file"/><br/>';
$elementosVolatiles.='<span style="font-size:10px; color:#999999;">Nombra tu imagen:</span><br/><input name="nombre" type="text" size="20" style="width:300px;" />';
$elementosVolatiles.='<br /><input type="submit" value="Enviar Foto" class="btnNuevo"/></center></form>';
$elementosVolatiles.='</div>';

$javascriptExtra.='function abrirDiv(fd, div){ $("."+fd).show(); $("."+div).show();}';
$mostrarContenido.='<span class="btnNuevo" onclick="abrirDiv(\'fdDivVolatil\',\'divVolatilSubirImg\')">Subir Nueva imagen</span><br/><br/></div><div class="contenedorRegistros">';
$mostrarContenido.=$imagenes.'</div>';
?>