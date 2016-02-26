<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_usuarios` (
  `id` smallint(5) NOT NULL auto_increment,
  `nick` varchar(30) collate ".$cotejamiento." NOT NULL default '',
  `password` varchar(32) collate ".$cotejamiento." NOT NULL default '',
  `nombre` varchar(32) collate ".$cotejamiento." NOT NULL default '',
  `apellidos` varchar(32) collate ".$cotejamiento." NOT NULL default '',
  `email` varchar(62) collate ".$cotejamiento." NOT NULL default '',
  `avatar` varchar(255) collate ".$cotejamiento." NOT NULL default '',
  `nivelusuario` varchar(255) collate ".$cotejamiento." default 'invitado',
  `activo` int(11) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>