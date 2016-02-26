<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_registro` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(255) collate ".$cotejamiento." default NULL,
  `password` varchar(255) collate ".$cotejamiento." default NULL,
  `nombre` varchar(255) collate ".$cotejamiento." default NULL,
  `apellidopaterno` varchar(255) collate ".$cotejamiento." default NULL,
  `apellidomaterno` varchar(255) collate ".$cotejamiento." default NULL,
  `email` varchar(255) collate ".$cotejamiento." default NULL,
  `telefono` int(20) default NULL,
  `celular` int(20) default NULL,
  `calle` varchar(255) collate ".$cotejamiento." default NULL,
  `colonia` varchar(255) collate ".$cotejamiento." default NULL,
  `delegacion` varchar(255) collate ".$cotejamiento." default NULL,
  `estado` varchar(255) collate ".$cotejamiento." default NULL,
  `codigopostal` int(20) default NULL,
  `pormediode` varchar(255) collate ".$cotejamiento." default NULL,
  `fecharegistro` date default NULL,
  `imagenusuario` varchar(255) collate ".$cotejamiento." default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>