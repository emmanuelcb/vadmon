<?php
// Creamos la tabla
$strCreatePlanesTableSQL = 'CREATE TABLE vadmon_planes (';
$strCreatePlanesTableSQL .= 'id SERIAL PRIMARY KEY, usuario VARCHAR(30) NOT NULL, contrasenia VARCHAR(32) NOT NULL, planusuarios BOOLEAN DEFAULT FALSE, planpermisos BOOLEAN DEFAULT FALSE,';
$strCreatePlanesTableSQL .= 'planarticulos BOOLEAN DEFAULT FALSE, plannoticias BOOLEAN DEFAULT FALSE, planencuestas BOOLEAN DEFAULT FALSE, planpromociones BOOLEAN DEFAULT FALSE,';
$strCreatePlanesTableSQL .= 'plandisenio BOOLEAN DEFAULT FALSE, planregistro BOOLEAN DEFAULT FALSE, servidor VARCHAR(255) NOT NULL, servidordb VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorusuario VARCHAR(255) NOT NULL, servidorpass VARCHAR(255) NOT NULL, servidorftpdirectorio VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorftpusuario VARCHAR(255) NOT NULL, servidorftppass VARCHAR(255) NOT NULL, activo BOOLEAN DEFAULT TRUE';
$strCreatePlanesTableSQL .= ');';
$strCreatePlanesTableSQLName = 'createPlanes';
if(pg_prepare($planconexion, $strCreatePlanesTableSQLName, $strCreatePlanesTableSQL))
{
	$result = pg_execute($planconexion, $strCreatePlanesTableSQLName);
}
?>
