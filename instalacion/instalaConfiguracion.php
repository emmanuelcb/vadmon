<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_configuracion` ( 
	`id` int(11) NOT NULL auto_increment,
	`herramienta` varchar(255) collate ".$cotejamiento." NOT NULL, 
	`campo1` varchar(255) collate ".$cotejamiento." NOT NULL, 
	`campo2` varchar(255) collate ".$cotejamiento." NOT NULL,
	`creador` varchar(255) collate ".$cotejamiento." default NULL,
	`fechacreacion` date default NULL,
	`modificador` varchar(255) collate ".$cotejamiento." default NULL,
	`fechamodificacion` date default NULL,
	`fijo` int(11) default '0',
	`activo` int(11) default 1, PRIMARY KEY (`id`) ) 
	ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
// Creamos limite de contenidos principales
mysql_query("insert into vadmon_configuracion 
(id, herramienta, campo1, campo2) values 
('1','limitecontenidos', '20', '1')")
or die("Could not insert data because ".mysql_error());
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>