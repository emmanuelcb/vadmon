<?php
mysql_query("CREATE TABLE `vadmon_contenidos` (
  `id` int(11) NOT NULL auto_increment,
  `subcontenido` varchar(255) collate latin1_spanish_ci default '0',
  `menucontenido` varchar(255) collate latin1_spanish_ci default NULL,
  `ordencontenido` int(11) default '0',
  `titulocontenido` varchar(255) collate latin1_spanish_ci default NULL,
  `textocontenido` text collate latin1_spanish_ci,
  `imagen1contenido` varchar(255) collate latin1_spanish_ci default NULL,
  `imagen2contenido` varchar(255) collate latin1_spanish_ci default NULL,
  `imagen3contenido` varchar(255) collate latin1_spanish_ci default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
  `keywordscontenido` varchar(255) collate latin1_spanish_ci default NULL,
  `descripcioncontenido` text collate latin1_spanish_ci,
  `fijo` int(11) default '0',
  `activo` int(11) default '1',
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>