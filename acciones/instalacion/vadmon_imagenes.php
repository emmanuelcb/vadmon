<?php
mysql_query("CREATE TABLE `vadmon_imagenes` (
  `id` int(11) NOT NULL auto_increment,
  `nombreimg` varchar(255) collate latin1_spanish_ci default '0',
  `carpeta` varchar(255) collate latin1_spanish_ci default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>