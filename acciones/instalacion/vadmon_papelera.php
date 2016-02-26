<?php
mysql_query("CREATE TABLE `vadmon_papelera` (
  `id` int(11) NOT NULL auto_increment,
  `seleccion` int(11) default '0',
  `tabla` varchar(255) collate latin1_spanish_ci default NULL,
  `usuario` int(11) default '0',
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>