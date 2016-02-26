<?php
mysql_query("CREATE TABLE `vadmon_encuestas` (
  `id` int(11) NOT NULL auto_increment,
  `imagenpregunta` varchar(255) collate latin1_spanish_ci default NULL,
  `textopregunta` text collate latin1_spanish_ci,
  `totalvotos` int(11) default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>