<?php
// Creamos la tabla
$strCreatePlanesTableSQL = 'CREATE TABLE vadmon_planes (';
$strCreatePlanesTableSQL .= 'id SERIAL PRIMARY KEY, usuario VARCHAR(30) NOT NULL, contrasenia VARCHAR(32) NOT NULL, planusuarios BOOLEAN DEFAULT FALSE, planpermisos BOOLEAN DEFAULT FALSE,';
$strCreatePlanesTableSQL .= 'planarticulos BOOLEAN DEFAULT FALSE, plannoticias BOOLEAN DEFAULT FALSE, planencuestas BOOLEAN FALSE, planpromociones BOOLEAN DEFAULT FALSE,';
$strCreatePlanesTableSQL .= 'plandisenio BOOLEAN DEFAULT FALSE, planregistro BOOLEAN DEFAULT FALSE, servidor VARCHAR(255) NOT NULL, servidordb VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorusuario VARCHAR(255) NOT NULL, servidorpass VARCHAR(255) NOT NULL, servidorftpdirectorio VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorftpusuario VARCHAR(255) NOT NULL, servidorftppass VARCHAR(255) NOT NULL, activo BOOLEAN DEFAULT TRUE';
$strCreatePlanesTableSQL .= ');';
$strCreatePlanesTableSQLName = 'createPlanes';
echo 'vadmon_planes';
echo pg_prepare($planconexion, $strCreatePlanesTableSQLName, $strCreatePlanesTableSQL);
if(pg_prepare($planconexion, $strCreatePlanesTableSQLName, $strCreatePlanesTableSQL))
{
  	echo 'i\'m in';
	$result = pg_execute($planconexion, $strCreatePlanesTableSQLName);
}
?>
