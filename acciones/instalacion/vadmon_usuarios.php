<?php
mysql_query("CREATE TABLE `vadmon_usuarios` (
  `id` smallint(5) NOT NULL auto_increment,
  `nick` varchar(30) collate latin1_spanish_ci NOT NULL default '',
  `password` varchar(32) collate latin1_spanish_ci NOT NULL default '',
  `nombre` varchar(32) collate latin1_spanish_ci NOT NULL default '',
  `apellidos` varchar(32) collate latin1_spanish_ci NOT NULL default '',
  `email` varchar(62) collate latin1_spanish_ci NOT NULL default '',
  `avatar` varchar(255) collate latin1_spanish_ci NOT NULL default '',
  `nivelusuario` varchar(255) collate latin1_spanish_ci default 'invitado',
  `activo` int(11) default '1',
  PRIMARY KEY  (`id`))
  ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ") ;
?>