<?php
// Creamos la tabla
if($stmtCrearVersion = $conexion->prepare("CREATE TABLE `vadmon_version` (
																					`id` int(11) NOT NULL auto_increment,
																					`version` varchar(255) NOT NULL,
																					PRIMARY KEY(`id`)) ENGINE=MyISAM")){
	$stmtCrearVersion->execute();
}
// Colocamos la version actual
if($stmtInsertarVersion = $conexion->prepare("INSERT INTO vadmon_version (version) VALUES (?)")){
	$stmtInsertarVersion->bind_param("i",$version_vadmon);
	$stmtInsertarVersion->execute();
}
?>
