<?php
mysql_query("CREATE TABLE `vadmon_respuestas` (
  `id` int(11) NOT NULL auto_increment,
  `textorespuesta` text collate latin1_spanish_ci,
  `votosrespuesta` int(11) default NULL,
  `pregunta` int(11) default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>