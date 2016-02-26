<?php
$servidor = "localhost";
$baseDatos = "vemeweb";
$usuarioBase = "root";
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = "root"; }else{ $passBase = ''; }
$charset = "latin1";
$cotejamiento = "latin1_spanish_ci";

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_planes` (
  `id` smallint(5) NOT NULL auto_increment,
  `usuario` varchar(30) collate ".$cotejamiento." NOT NULL default '',
  `contrasenia` varchar(32) collate ".$cotejamiento." NOT NULL default '',
  `planusuarios` INT(1) NOT NULL DEFAULT '0',
  `planpermisos` INT(1) NOT NULL DEFAULT '0',
  `planarticulos` INT(1) NOT NULL DEFAULT '0',
  `plannoticias` INT(1) NOT NULL DEFAULT '0',
  `planencuestas` INT(1) NOT NULL DEFAULT '0',
  `planpromociones` INT(1) NOT NULL DEFAULT '0',
  `plandisenio` INT(1) NOT NULL DEFAULT '0',
  `planregistro` INT(1) NOT NULL DEFAULT '0',
  `servidor` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `servidorbd` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `servidorusuario` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `servidorpass` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `servidorftpdirectorio` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `servidorftpusuario` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `servidorftppass` VARCHAR(255) collate ".$cotejamiento." NOT NULL,
  `activo` int(11) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
  
mysql_query("CREATE TABLE `vadmon_planesinicios` (
  `id` smallint(5) NOT NULL auto_increment,
  `idusuario` varchar(30) collate ".$cotejamiento." NOT NULL default '',
  `tiempo` time,
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ");
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>