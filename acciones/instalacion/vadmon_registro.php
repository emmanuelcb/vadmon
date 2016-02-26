<?php
mysql_query("CREATE TABLE `vadmon_registro` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(255) collate latin1_spanish_ci default NULL,
  `password` varchar(255) collate latin1_spanish_ci default NULL,
  `nombre` varchar(255) collate latin1_spanish_ci default NULL,
  `apellidopaterno` varchar(255) collate latin1_spanish_ci default NULL,
  `apellidomaterno` varchar(255) collate latin1_spanish_ci default NULL,
  `email` varchar(255) collate latin1_spanish_ci default NULL,
  `telefono` int(20) default NULL,
  `celular` int(20) default NULL,
  `calle` varchar(255) collate latin1_spanish_ci default NULL,
  `colonia` varchar(255) collate latin1_spanish_ci default NULL,
  `delegacion` varchar(255) collate latin1_spanish_ci default NULL,
  `estado` varchar(255) collate latin1_spanish_ci default NULL,
  `codigopostal` int(20) default NULL,
  `empresa` varchar(255) collate latin1_spanish_ci default NULL,
  `pormediode` varchar(255) collate latin1_spanish_ci default NULL,
  `fecharegistro` date default NULL,
  `imagenusuario` varchar(255) collate latin1_spanish_ci default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>