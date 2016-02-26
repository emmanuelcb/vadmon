<?php
mysql_query("CREATE TABLE `vadmon_articulos` (
  `id` int(2) NOT NULL auto_increment,
  `tituloarticulo` varchar(255) collate latin1_spanish_ci default NULL,
  `textoarticulo` text collate latin1_spanish_ci,
  `imagen1articulo` varchar(255) collate latin1_spanish_ci default NULL,
  `imagen2articulo` varchar(255) collate latin1_spanish_ci default NULL,
  `imagen3articulo` varchar(255) collate latin1_spanish_ci default NULL,
  `fechaarticulo` date default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
  `keywordsnoticia` varchar(255) collate latin1_spanish_ci default NULL,
  `descripcionarticulo` varchar(255) collate latin1_spanish_ci default NULL,
  `fijo` int(11) default '0',
  `activo` int(1) default '0',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>