<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_articulos` (
  `id` int(2) NOT NULL auto_increment,
  `tituloarticulo` varchar(255) collate ".$cotejamiento." default NULL,
  `textoarticulo` text collate ".$cotejamiento.",
  `imagen1articulo` varchar(255) collate ".$cotejamiento." default NULL,
  `imagen2articulo` varchar(255) collate ".$cotejamiento." default NULL,
  `imagen3articulo` varchar(255) collate ".$cotejamiento." default NULL,
  `fechaarticulo` date default NULL,
  `creador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechamodificacion` date default NULL,
  `keywordsnoticia` varchar(255) collate ".$cotejamiento." default NULL,
  `descripcionarticulo` varchar(255) collate ".$cotejamiento." default NULL,
  `fijo` int(11) default '0',
  `activo` int(1) default '0',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>