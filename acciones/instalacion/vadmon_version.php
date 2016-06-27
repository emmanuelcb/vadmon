<?php
// Creamos la tabla
$strCreateVersionTableSQL = 'CREATE TABLE vadmon_version(id SERIAL PRIMARY KEY, version VARCHAR(255) NOT NULL)';
$strCreateVersionTableSQLName = 'createVersionTable';
if(pg_prepare($conexion, $strCreateVersionTableSQLName, $strCreateVersionTableSQL)) {
	$result = pg_execute($conexion, $strCreateVersionTableSQLName);
}
// Colocamos la version actual
$strInsertVersionSQL = 'INSERT INTO vadmon_version (version) VALUES ($1)';
$strInsertVersionSQLName = 'insertVersion';
if(pg_prepare($conexion, $strInsertVersionSQLName, $strInsertVersionSQL)){
  	$result = pg_execute($conexion, $strCreateVersionTableSQLName, array($version_vadmon));
}
?>
