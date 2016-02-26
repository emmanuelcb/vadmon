<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$conexion=mysql_connect($servidor, $usuarioBase, $passBase);
mysql_select_db($baseDatos, $conexion);

mysql_query("CREATE TABLE `vadmon_permisos` (
  `id` int(11) NOT NULL auto_increment,
  `nivelusuario` varchar(255) collate ".$cotejamiento." default NULL,
  `contenidos` int(11) default '0',
  `noticias` int(11) default '0',
  `articulos` int(11) default '0',
  `promociones` int(11) default '0',
  `banners` int(11) default '0',
  `usuarios` int(11) default '0',
  `configuracion` int(11) default '0',
  `diseno` int(11) default '0',
  `encuestas` int(11) default '0',
  `basesdedatos` int(11) default '0',
  `permisos` int(11) default '0',
  `papelera` int(11) default '0',
  `editar` int(11) default '0',
  `crear` int(11) default '0',
  `eliminar` int(11) default '0',
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=".$charset." COLLATE=".$cotejamiento." ") ;
  
// Creamos limite de contenidos principales
mysql_query("insert into vadmon_permisos
(id, nivelusuario, contenidos, noticias, articulos, promociones, banners, usuarios, configuracion, diseno, encuestas, basesdedatos, permisos, papelera, editar, crear, eliminar) values 
('1', 'maestro', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1','1')")
or die("Could not insert data because ".mysql_error());
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>