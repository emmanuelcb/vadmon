<?php
// Creamos la tabla
$strCreateVersionTableSQL = 'CREATE TABLE vadmon_version(id SERIAL PRIMARY KEY, version VARCHAR(255) NOT NULL)';
$result = pg_execute($conexion, $strCreateVersionTableSQL);
// Colocamos la version actual
$strInsertVersionSQL = 'INSERT INTO vadmon_version (version) VALUES ($1)';
$strInsertVersionSQLName = 'insertVersion';
if(pg_prepare($conexion, $strInsertVersionSQLName, $strInsertVersionSQL))
{
  	pg_execute($conexion, $strCreateVersionTableSQLName, array($version_vadmon));
}
?>
