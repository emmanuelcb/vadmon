<?php
mysql_query("CREATE TABLE `vadmon_promociones` (
  `id` int(2) NOT NULL auto_increment,
  `titulopromo` varchar(255) collate latin1_spanish_ci default NULL,
  `imagenpromo` varchar(255) collate latin1_spanish_ci default NULL,
  `thumbpromo` varchar(255) collate latin1_spanish_ci default NULL,
  `basespromo` text collate latin1_spanish_ci,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
  `keywordspromo` varchar(255) collate latin1_spanish_ci default NULL,
  `descripcionpromo` text collate latin1_spanish_ci,
  `activo` int(1) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>