<?php
include("../conexion.php");
$edicionseleccionada=$_POST['edicionseleccionada'];
$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
   // Si lo que deseamos agregar es un contenido
   if($edicionseleccionada=="contenidos")
   { 
	   $id=$_POST['id'];
	   $subcontenido=$_POST['subcontenido']; 
	   $menucontenido=$_POST['menucontenido'];
	   $ordencontenido=$_POST['ordencontenido'];
	   $titulocontenido=$_POST['titulocontenido'];	
	   $textocontenido=$_POST['textocontenido'];
	   $imagen1contenido=$_POST['imagen1contenido'];
	   $imagen2contenido=$_POST['imagen2contenido'];
	   $imagen3contenido=$_POST['imagen3contenido'];
	   $creador=$_POST['creador'];
	   $fechacreacion=$_POST['fechacreacion'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $keywordscontenido=$_POST['keywordscontenido'];
	   $descripcioncontenido=$_POST['descripcioncontenido'];
	   $activo=$_POST['activo'];
	   
	   if($subcontenido<>0 || $subcontenido <>''){
		   mysql_query("insert into vadmon_contenidos
		   (id, subcontenido, menucontenido, ordencontenido, titulocontenido, textocontenido, imagen1contenido, imagen2contenido, imagen3contenido, creador, fechacreacion, modificador, 
		   fechamodificacion, keywordscontenido, descripcioncontenido, activo) values
		   ('$id', '$subcontenido', '$menucontenido', '$ordencontenido', '$titulocontenido', '$textocontenido', '$imagen1contenido', '$imagen2contenido', '$imagen3contenido', 
		   '$creador', '$fechacreacion', '$modificador', '$fechamodificacion', '$keywordscontenido', '$descripcioncontenido', '$activo')"); 
			
			header("Location: ../inicio.php?idcontenido=contenidos&mensaje=correctoContenido"); 
	   }else{
		   $revisarA = @mysql_query("select * from vadmon_contenidos where subcontenido=0 and activo=1");
	   	   if(mysql_num_rows($revisarA)<$limiteContenidos){
			   mysql_query("insert into vadmon_contenidos
			   (id, subcontenido, menucontenido, ordencontenido, titulocontenido, textocontenido, imagen1contenido, imagen2contenido, imagen3contenido, creador, fechacreacion, modificador, 
			   fechamodificacion, keywordscontenido, descripcioncontenido, activo) values
			   ('$id', '$subcontenido', '$menucontenido', '$ordencontenido', '$titulocontenido', '$textocontenido', '$imagen1contenido', '$imagen2contenido', '$imagen3contenido', 
			   '$creador', '$fechacreacion', '$modificador', '$fechamodificacion', '$keywordscontenido', '$descripcioncontenido', '$activo')");
				
				header("Location: ../inicio.php?idcontenido=contenidos&mensaje=correctoContenido"); 
	   	   }else{
		   		//echo 'No se pudo agregar el registro, número de Contenidos Principales Lleno<br />';
				//echo '<a href="../contenido.php?idcontenido=contenidos">regresar</a>';
				//header("Location: ../inicio.php?idcontenido=contenidos&mensaje=errorContenido"); 
				echo $subcontenido.'  '.$id;
	   	   }
	   }
   }
   
   // Si lo que deseamos agregar es un banner
   else if($edicionseleccionada=="banners")
   {
	   $id=$_POST['id'];
	   $imagenbanner=$_POST['imagenbanner']; 
	   $urlbanner=$_POST['urlbanner'];
	   $titulobanner=$_POST['titulobanner'];
	   $textobanner=$_POST['textobanner'];
	   $tipobanner=$_POST['tipobanner'];
	   $creador=$_POST['creador'];
	   $fechacreacion=$_POST['fechacreacion'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $activo=$_POST['activo'];
	   mysql_query("insert into vadmon_banners
	   (id,imagenbanner,urlbanner,titulobanner,textobanner,tipobanner,creador, fechacreacion, modificador, fechamodificacion,activo) values
	   ('$id','$imagenbanner','$urlbanner','$titulobanner','$textobanner','$tipobanner','$creador', '$fechacreacion', '$modificador', '$fechamodificacion', '$activo')"); 
	   
	   header("Location: ../inicio.php?idcontenido=banners&mensaje=correctoBanner");
   }
   
   // Si lo que deseamos agregar es un artículo
   else if($edicionseleccionada=="articulos")
   {
	   $id=$_POST['id'];
	   $tituloarticulo=$_POST['tituloarticulo']; 
	   $textoarticulo=$_POST['textoarticulo'];
	   $imagen1articulo=$_POST['imagen1articulo'];
	   $imagen2articulo=$_POST['imagen2articulo'];
	   $imagen3articulo=$_POST['imagen3articulo'];
	   $creador=$_POST['creador'];
	   $fechacreacion=$_POST['fechacreacion'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $fechaarticulo=$_POST['fechaarticulo'];
	   $keywordsarticulo=$_POST['keywordsarticulo'];
	   $descripcionarticulo=$_POST['descripcionarticulo'];
	   $activo=$_POST['activo'];
	   mysql_query("insert into vadmon_articulos
	   (id,tituloarticulo,textoarticulo,imagen1articulo,imagen2articulo,imagen3articulo,creador,fechacreacion,modificador,fechamodificacion,fechaarticulo,keywordsarticulo,descripcionarticulo,activo) values
	   ('$id','$tituloarticulo','$textoarticulo','$imagen1articulo','$imagen2articulo','$imagen3articulo','$creador','$fechacreacion','$modificador','$fechamodificacion','$fechaarticulo','$keywordsarticulo','$descripcionarticulo','$activo')"); 
	   
	   header("Location: ../inicio.php?idcontenido=articulos&mensaje=correctoArticulo");
   }
   
   // Si lo que deseamos agregar es un noticia
   else if($edicionseleccionada=="noticias")
   {
	   $id=$_POST['id'];
	   $titulonoticia=$_POST['titulonoticia']; 
	   $textonoticia=$_POST['textonoticia'];
	   $imagen1noticia=$_POST['imagen1noticia'];
	   $imagen2noticia=$_POST['imagen2noticia'];
	   $imagen3noticia=$_POST['imagen3noticia'];
	   $creador=$_POST['creador'];
	   $fechacreacion=$_POST['fechacreacion'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $fechanoticia=$_POST['fechanoticia'];
	   $keywordsnoticia=$_POST['keywordsnoticia'];
	   $descripcionnoticia=$_POST['descripcionnoticia'];
	   $activo=$_POST['activo'];
	   mysql_query("insert into vadmon_noticias
	   (id,titulonoticia,textonoticia,imagen1noticia,imagen2noticia,imagen3noticia,creador,fechacreacion,modificador,fechamodificacion,fechanoticia,keywordsnoticia,descripcionnoticia,activo) values
	   ('$id','$titulonoticia','$textonoticia','$imagen1noticia','$imagen2noticia','$imagen3noticia','$creador','$fechacreacion','$modificador','$fechamodificacion','$fechanoticia','$keywordsnoticia','$descripcionnoticia','$activo')"); 
	   
	   header("Location: ../inicio.php?idcontenido=noticias&mensaje=correctoNoticia");
   }
   
   // Si lo que deseamos agregar es una promocion
   else if($edicionseleccionada=="promociones")
   {
	   $id=$_POST['id'];
	   $titulopromo=$_POST['titulopromo']; 
	   $basespromo=$_POST['basespromo'];
	   $imagenpromo=$_POST['imagenpromo'];
	   $thumbpromo=$_POST['thumbpromo'];
	   $creador=$_POST['creador'];
	   $fechacreacion=$_POST['fechacreacion'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $fechainicio=$_POST['fechainicio'];
	   $fechatermino=$_POST['fechatermino'];
	   $keywordspromo=$_POST['keywordspromo'];
	   $descripcionpromo=$_POST['descripcionpromo'];
	   $activo=$_POST['activo'];
	   mysql_query("insert into vadmon_promociones
	   (id,titulopromo,basespromo,imagenpromo,thumbpromo,creador,fechacreacion,modificador,fechamodificacion,fechainicio,fechatermino,keywordspromo,descripcionpromo,activo) values
	   ('$id','$titulopromo','$basespromo','$imagenpromo','$thumbpromo','$creador','$fechacreacion','$modificador','$fechamodificacion','$fechainicio','$fechatermino','$keywordspromo','$descripcionpromo','$activo')"); 
	   
	   header("Location: ../inicio.php?idcontenido=promociones&mensaje=correctoPromocion");
   }
   
   // Si lo que deseamos agregar es un configuracion
   else if($edicionseleccionada=="configuracion")
   {
	   $id=$_POST['id'];
	   $herramienta=$_POST['herramienta']; 
	   $campo1=$_POST['campo1'];
	   $campo2=$_POST['campo2'];
	   $creador=$_POST['creador'];
	   $fechacreacion=$_POST['fechacreacion'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $activo=$_POST['activo'];
	   mysql_query("insert into vadmon_configuracion
	   (id,herramienta,campo1,campo2,creador,fechacreacion,modificador,fechamodificacion,activo) values
	   ('$id','$herramienta','$campo1','$campo2','$creador','$fechacreacion','$modificador','$fechamodificacion','$activo')"); 
	   
	   header("Location: ../inicio.php?idcontenido=configuracion");
   }
   
   // Si lo que deseamos agregar es un permisos
   else if($edicionseleccionada=="permisos")
   {
	   $id=$_POST['id'];
	   $nivelusuario=$_POST['nivelusuario']; 
	   $contenidos=$_POST['contenidos'];
	   $noticias=$_POST['noticias'];
	   $articulos=$_POST['articulos'];
	   $promociones=$_POST['promociones'];
	   $banners=$_POST['banners'];
	   $usuarios=$_POST['usuarios'];
	   $configuracion=$_POST['configuracion'];
	   $diseno=$_POST['diseno'];
	   $encuestas=$_POST['encuestas'];
	   $basesdedatos=$_POST['basesdedatos'];
	   $editar=$_POST['editar'];
	   $crear=$_POST['crear'];
	   $eliminar=$_POST['eliminar'];
	   mysql_query("insert into vadmon_permisos
	   (id, nivelusuario, contenidos, noticias, articulos, promociones, banners, usuarios, configuracion, diseno, encuestas, basesdedatos, editar, crear, eliminar) values
	   ('$id', '$nivelusuario', '$contenidos', '$noticias', '$articulos', '$promociones', '$banners', '$usuarios', '$configuracion', '$diseno', '$encuestas', '$basesdedatos', 
	   '$editar', '$crear', '$eliminar')"); 
	   
	   header("Location: ../inicio.php?idcontenido=permisos");
   }
}
?>