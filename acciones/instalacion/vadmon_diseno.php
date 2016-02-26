<?php
mysql_query("CREATE TABLE `vadmon_diseno` (
  `id` int(11) NOT NULL auto_increment,
  `nombreobjeto` varchar(255) collate latin1_spanish_ci default NULL,
  `anchoobjeto` int(11) default '0',
  `altoobjeto` int(11) default '0',
  `imagenobjeto` varchar(255) collate latin1_spanish_ci default NULL,
  `creador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechacreacion` date default NULL,
  `modificador` varchar(255) collate latin1_spanish_ci default NULL,
  `fechamodificacion` date default NULL,
   PRIMARY KEY (`id`)) 
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>