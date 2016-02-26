<?php
mysql_query("CREATE TABLE `vadmon_preguntas` (
  `id` int(11) NOT NULL auto_increment,
  `imagenpregunta` varchar(255) collate latin1_spanish_ci default '0',
  `textopregunta` text collate latin1_spanish_ci,
  `totalvotos` int(11) default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>