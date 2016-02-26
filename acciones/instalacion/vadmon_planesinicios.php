<?php
// Creamos la tabla
if($stmtCrearVadmonPlanesInicios = $planconexion->prepare(  "CREATE TABLE `vadmon_planesinicios` (
                                                            `id` smallint(5) NOT NULL auto_increment,
                                                            `idusuario` varchar(30) NOT NULL,
                                                            `tiempo` time,
                                                            PRIMARY KEY (`id`)) ENGINE=MyISAM"  ))
{
	$stmtCrearVadmonPlanesInicios->execute();
}
?>
