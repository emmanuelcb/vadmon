<?php
// Creamos la tabla
$strCreateVersionTableSQL = 'CREATE TABLE vadmon_version(id SERIAL PRIMARY KEY, version VARCHAR(255) NOT NULL)';
pg_query($conexion, $strCreateVersionTableSQL);
// Colocamos la version actual
$strInsertVersionSQL = 'INSERT INTO vadmon_version (version) VALUES ($1)';
if($rslInsertVersion = pg_query_params($conexion, $strInsertVersionSQL, array($version_vadmon)))
{
  	// To do...
}
?>
