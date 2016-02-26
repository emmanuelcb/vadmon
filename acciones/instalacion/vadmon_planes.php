<?php
// Creamos la tabla
if($stmtCrearVadmonPlanes = $planconexion->prepare( "CREATE TABLE `vadmon_planes` (
                                                    `id` smallint(5) NOT NULL auto_increment,
                                                    `usuario` varchar(30) NOT NULL,
                                                    `contrasenia` varchar(32) NOT NULL,
                                                    `planusuarios` INT(1) NOT NULL DEFAULT '0',
                                                    `planpermisos` INT(1) NOT NULL DEFAULT '0',
                                                    `planarticulos` INT(1) NOT NULL DEFAULT '0',
                                                    `plannoticias` INT(1) NOT NULL DEFAULT '0',
                                                    `planencuestas` INT(1) NOT NULL DEFAULT '0',
                                                    `planpromociones` INT(1) NOT NULL DEFAULT '0',
                                                    `plandisenio` INT(1) NOT NULL DEFAULT '0',
                                                    `planregistro` INT(1) NOT NULL DEFAULT '0',
                                                    `servidor` VARCHAR(255) NOT NULL,
                                                    `servidorbd` VARCHAR(255) NOT NULL,
                                                    `servidorusuario` VARCHAR(255) NOT NULL,
                                                    `servidorpass` VARCHAR(255) NOT NULL,
                                                    `servidorftpdirectorio` VARCHAR(255) NOT NULL,
                                                    `servidorftpusuario` VARCHAR(255) NOT NULL,
                                                    `servidorftppass` VARCHAR(255) NOT NULL,
                                                    `activo` int(11) default '1',
                                                    PRIMARY KEY (`id`)) ENGINE=MyISAM" ))
{
	$stmtCrearVadmonPlanes->execute();
}
?>
