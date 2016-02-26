<?php
mysql_query("CREATE TABLE `vadmon_configuracion` ( 
	`id` int(11) NOT NULL auto_increment,
	`herramienta` varchar(255) collate latin1_spanish_ci NOT NULL, 
	`campo1` varchar(255) collate latin1_spanish_ci NOT NULL, 
	`campo2` varchar(255) collate latin1_spanish_ci NOT NULL,
	`creador` varchar(255) collate latin1_spanish_ci default NULL,
	`fechacreacion` date default NULL,
	`modificador` varchar(255) collate latin1_spanish_ci default NULL,
	`fechamodificacion` date default NULL,
	`fijo` int(11) default '0',
	`activo` int(11) default 1, PRIMARY KEY (`id`) ) 
	ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
// Creamos limite de contenidos principales
mysql_query("insert into vadmon_configuracion 
(id, herramienta, campo1, campo2) values 
('1','limitecontenidos', '20', '1')")
or die("Could not insert data because ".mysql_error());
?>