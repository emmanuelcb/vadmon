<?php
$strCreateConfiguracionTableSQL = 'CREATE TABLE vadmon_configuracion (';
$strCreateConfiguracionTableSQL .= 'id SERIAL PRIMARY KEY, herramienta VARCHAR(255) NOT NULL, campo1 VARCHAR(255) NOT NULL, campo2 VARCHAR(255) NOT NULL,';
$strCreateConfiguracionTableSQL .= 'creador VARCHAR(255) DEFAULT NULL, fechacreacion DATE DEFAULT CURRENT_DATE, modificador VARCHAR(255) DEFAULT NULL,';
$strCreateConfiguracionTableSQL .= 'fechamodificacion DATE DEFAULT CURRENT_DATE, fijo BOOLEAN DEFAULT FALSE, activo BOOLEAN DEFAULT TRUE);';
pg_query($conexion, $strCreateConfiguracionTableSQL);

// Creamos limite de contenidos principales
$strInsertContenidosLimitsSQL = 'INSERT INTO vadmon_configuration (id, herramienta, campo1, campo2)';
$strInsertContenidosLimitsSQL .= 'VALUES (1, \'limitecontenidos\', 20, TRUE)';
$strInsertContenidosLimitsSQLName = 'insertContenidosLimits';
if(pg_prepare($conexion, $strInsertContenidosLimitsSQLName, $strInsertContenidosLimitsSQL))
{
	pg_execute($conexion, $strInsertContenidosLimitsSQLName);
}
?>
