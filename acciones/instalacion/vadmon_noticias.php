<?php
mysql_query("CREATE TABLE `vadmon_noticias` (
  `id` int(2) NOT NULL auto_increment,
  `titulonoticia` varchar(255) collate latin1_spanish_ci default NULL,
  `textonoticia` text collate latin1_spanish_ci,
  `imagen1noticia` varchar(255) collate latin1_spanish_ci default NULL,
  `imagen2noticia` varchar(255) collate latin1_spanish_ci default NULL,
  `imagen3noticia` varchar(255) collate latin1_spanish_ci default NULL,
  `fechanoticia` date default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
  `keywordsnoticia` varchar(255) collate latin1_spanish_ci default NULL,
  `descripcionnoticia` varchar(255) collate latin1_spanish_ci default NULL,
  `fijo` int(11) default '0',
  `activo` int(1) default '0',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>