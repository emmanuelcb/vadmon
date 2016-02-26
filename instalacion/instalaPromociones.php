<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_promociones` (
  `id` int(2) NOT NULL auto_increment,
  `titulopromo` varchar(255) collate ".$cotejamiento." default NULL,
  `imagenpromo` varchar(255) collate ".$cotejamiento." default NULL,
  `thumbpromo` varchar(255) collate ".$cotejamiento." default NULL,
  `basespromo` text collate ".$cotejamiento.",
  `creador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechamodificacion` date default NULL,
  `keywordspromo` varchar(255) collate ".$cotejamiento." default NULL,
  `descripcionpromo` text collate ".$cotejamiento.",
  `activo` int(1) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>