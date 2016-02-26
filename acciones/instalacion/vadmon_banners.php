<?php
mysql_query("CREATE TABLE `vadmon_banners` (
  `id` int(11) NOT NULL auto_increment,
  `imagenbanner` varchar(255) collate latin1_spanish_ci default NULL,
  `urlbanner` varchar(255) collate latin1_spanish_ci default NULL,
  `titulobanner` varchar(255) collate latin1_spanish_ci default NULL,
  `textobanner` text collate latin1_spanish_ci,
  `tipobanner` varchar(255) collate latin1_spanish_ci default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
  `fijo` int(11) default '0',
  `activo` int(11) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>