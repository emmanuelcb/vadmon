<?php
include("../conexion.php");
include('../ivariables.php');
$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
   $edicionseleccionada=$_POST['edicionseleccionada'];
   
   // Editar contenidos
   if($edicionseleccionada=="contenidos"){ include("editar/contenidos.php"); }
   
   // Editar banners
   else if($edicionseleccionada=="banners"){ include("editar/banners.php"); }
   
   // Si lo que deseamos editar es un artículo
   else if($edicionseleccionada=="articulos"){ include("editar/articulos.php"); }
   
   // Si lo que deseamos es editar una noticia
   else if($edicionseleccionada=="noticias")
   {
	   $id=$_POST['id'];
	   $titulonoticia=$_POST['titulonoticia']; 
	   $textonoticia=$_POST['textonoticia'];
	   $imagen1noticia=$_POST['imagen1noticia'];
	   $imagen2noticia=$_POST['imagen2noticia'];
	   $imagen3noticia=$_POST['imagen3noticia'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $fechanoticia=$_POST['fechanoticia'];
	   $keywordsnoticia=$_POST['keywordsnoticia'];
	   $descripcionnoticia=$_POST['descripcionnoticia'];
	   $activo=$_POST['activo'];
	   mysql_query("UPDATE `".$db."`.`vadmon_noticias` 
	   SET `titulonoticia` = '".$titulonoticia."',
	   `imagen1noticia` = '".$imagen1noticia."',
	   `imagen2noticia` = '".$imagen2noticia."',
	   `imagen3noticia` = '".$imagen3noticia."',
	   `modificador` = '".$modificador."',
	   `fechamodificacion` = '".$fechamodificacion."',
	   `textonoticia` = '".$textonoticia."',
	   `fechanoticia` = '".$fechanoticia."',
	   `keywordsnoticia` = '".$keywordsnoticia."',
	   `descripcionnoticia` = '".$descripcionnoticia."',
	   `activo` = '".$activo."' WHERE `vadmon_noticias`.`id` = '".$id."' LIMIT 1 ;");
	   
	   header("Location: ../inicio.php?idcontenido=noticias&mensaje=correctoEditarNoticia");
   }
   
   // Si lo que deseamos editar es una promocion
   else if($edicionseleccionada=="promociones")
   {
	   $id=$_POST['id'];
	   $titulopromo=$_POST['titulopromo']; 
	   $basespromo=$_POST['basespromo'];
	   $imagenpromo=$_POST['imagenpromo'];
	   $thumbpromo=$_POST['thumbpromo'];
	   $fechainicio=$_POST['fechainicio'];
	   $fechatermino=$_POST['fechatermino'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $keywordspromo=$_POST['keywordspromo'];
	   $descripcionpromo=$_POST['descripcionpromo'];
	   $activo=$_POST['activo'];
	   mysql_query("UPDATE `".$db."`.`vadmon_promociones` 
	   SET `titulopromo` = '".$titulopromo."',
	   `basespromo` = '".$basespromo."',
	   `imagenpromo` = '".$imagenpromo."',
	   `thumbpromo` = '".$thumbpromo."',
	   `fechainicio` = '".$fechainicio."',
	   `fechatermino` = '".$fechatermino."',
	   `modificador` = '".$modificador."',
	   `fechamodificacion` = '".$fechamodificacion."',
	   `keywordspromo` = '".$keywordspromo."',
	   `descripcionpromo` = '".$descripcionpromo."',
	   `activo` = '".$activo."' WHERE `vadmon_promociones`.`id` = '".$id."' LIMIT 1 ;");
	   
	   header("Location: ../inicio.php?idcontenido=promociones&mensaje=correctoEditarPromocion");
   }
   
   // Si lo que deseamos es editar una configuracion
   else if($edicionseleccionada=="configuracion")
   {
	   $id=$_POST['id'];
	   $herramienta=$_POST['herramienta']; 
	   $campo1=$_POST['campo1'];
	   $campo2=$_POST['campo2'];
	   $modificador=$_POST['modificador'];
	   $fechamodificacion=$_POST['fechamodificacion'];
	   $activo=$_POST['activo'];
	   mysql_query("UPDATE `".$db."`.`vadmon_configuracion` 
	   SET `herramienta` = '".$herramienta."',
	   `campo1` = '".$campo1."',
	   `campo2` = '".$campo2."',
	   `modificador` = '".$modificador."',
	   `fechamodificacion` = '".$fechamodificacion."',
	   `activo` = '".$activo."' WHERE `vadmon_configuracion`.`id` = '".$id."' LIMIT 1 ;");
	   
	   header("Location: ../inicio.php?idcontenido=configuracion");
   }
   
   // Si lo que deseamos es editar un permiso
   else if($edicionseleccionada=="permisos")
   {
	   $id=$_POST['id'];
	   $nivelusuario=$_POST["nivelusuario"];
	   $contenidos=$_POST["contenidos"];
	   $noticias=$_POST["noticias"];
	   $articulos=$_POST["articulos"];
	   $promociones=$_POST["promociones"];
	   $banners=$_POST["banners"];
	   $usuarios=$_POST["usuarios"];
	   $configuracion=$_POST["configuracion"];
	   $diseno=$_POST["diseno"];
	   $encuestas=$_POST["encuestas"];
	   $basesdedatos=$_POST["basesdedatos"];
	   $papelera=$_POST["papelera"];
	   $editar=$_POST["editar"];
	   $crear=$_POST["crear"];
	   $eliminar=$_POST["eliminar"];
	   mysql_query("UPDATE `".$db."`.`vadmon_permisos` 
	   SET `nivelusuario` = '".$nivelusuario."',
	   `contenidos` = '".$contenidos."',
	   `noticias` = '".$noticias."',
	   `articulos` = '".$articulos."',
	   `promociones` = '".$promociones."',
	   `banners` = '".$banners."',
	   `configuracion` = '".$configuracion."',
	   `diseno` = '".$diseno."',
	   `encuestas` = '".$encuestas."',
	   `basesdedatos` = '".$basesdedatos."',
	   `papelera` = '".$papelera."',
	   `editar` = '".$editar."',
	   `crear` = '".$crear."',
	   `eliminar` = '".$eliminar."' WHERE `vadmon_permisos`.`id` = '".$id."' LIMIT 1 ;");
	   
	   header("Location: ../inicio.php?idcontenido=permisos");
   }
   else{echo "No se realizo la edicion";}
}
?> 