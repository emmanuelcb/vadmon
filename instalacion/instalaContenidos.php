<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$strPgConnection = 'dbname='.$baseDatos.' host='.$servidor.' port=5432 ';	
$strPgConnection .= 'user='.$usuarioBase.' password='.$passBase.' sslmode=require';
$conexion = pg_connect($strPgConnection);
//$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
echo $conexion;
/*mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_contenidos` (
  `id` int(11) NOT NULL auto_increment,
  `subcontenido` varchar(255) collate ".$cotejamiento." default '0',
  `menucontenido` varchar(255) collate ".$cotejamiento." default NULL,
  `ordencontenido` int(11) default '0',
  `titulocontenido` varchar(255) collate ".$cotejamiento." default NULL,
  `textocontenido` text collate ".$cotejamiento.",
  `imagen1contenido` varchar(255) collate ".$cotejamiento." default NULL,
  `imagen2contenido` varchar(255) collate ".$cotejamiento." default NULL,
  `imagen3contenido` varchar(255) collate ".$cotejamiento." default NULL,
  `creador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate ".$cotejamiento." default NULL,
  `fechamodificacion` date default NULL,
  `keywordscontenido` varchar(255) collate ".$cotejamiento." default NULL,
  `descripcioncontenido` text collate ".$cotejamiento.",
  `fijo` int(11) default '0',
  `activo` int(11) default '1',
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;*/
?>
<script languaje='javascript' type='text/javascript'>//window.close();</script>
