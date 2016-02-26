<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_banners` (
  `id` int(11) NOT NULL auto_increment,
  `imagenbanner` varchar(255) collate ".$cotejamiento." default NULL,
  `urlbanner` varchar(255) collate ".$cotejamiento." default NULL,
  `titulobanner` varchar(255) collate ".$cotejamiento." default NULL,
  `textobanner` text collate ".$cotejamiento.",
  `tipobanner` varchar(255) collate ".$cotejamiento." default NULL,
  `creador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechamodificacion` date default NULL,
  `fijo` int(11) default '0',
  `activo` int(11) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>