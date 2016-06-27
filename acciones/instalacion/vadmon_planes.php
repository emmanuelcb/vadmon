<?php
// Creamos la tabla
$strCreatePlanesTableSQL = 'CREATE TABLE vadmon_planes (';
$strCreatePlanesTableSQL .= 'id SERIAL PRIMARY KEY, usuario VARCHAR(30) NOT NULL, contrasenia VARCHAR(32) NOT NULL, planusuarios BOOLEAN DEFAULT \'false\', planpermisos BOOLEAN DEFAULT \'false\',';
$strCreatePlanesTableSQL .= 'planarticulos BOOLEAN DEFAULT \'false\', plannoticias BOOLEAN DEFAULT \'false\', planencuestas BOOLEAN \'false\', planpromociones BOOLEAN DEFAULT \'false\',';
$strCreatePlanesTableSQL .= 'plandisenio BOOLEAN DEFAULT \'false\', planregistro BOOLEAN DEFAULT \'false\', servidor VARCHAR(255) NOT NULL, servidordb VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorusuario VARCHAR(255) NOT NULL, servidorpass VARCHAR(255) NOT NULL, servidorftpdirectorio VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorftpusuario VARCHAR(255) NOT NULL, servidorftppass VARCHAR(255) NOT NULL, activo BOOLEAN DEFAULT true';
$strCreatePlanesTableSQL .= ');';
$strCreatePlanesTableSQLName = 'createPlanes';
if(pg_prepare($planconexion, $strCreatePlanesTableSQLName, $strCreatePlanesTableSQL))
{
	$result = pg_execute($planconexion, $strCreatePlanesTableSQLName);
}
?>
