<?php
// Creamos la tabla
$strCreatePlanesTableSQL = 'CREATE TABLE vadmon_planes (';
$strCreatePlanesTableSQL .= 'id SERIAL PRIMARY KEY, usuario VARCHAR(30) NOT NULL, contrasenia VARCHAR(32) NOT NULL, planusuarios BOOLEAN, planpermisos BOOLEAN,';
$strCreatePlanesTableSQL .= 'planarticulos BOOLEAN, plannoticias BOOLEAN, planencuestas BOOLEAN, planpromociones BOOLEAN,';
$strCreatePlanesTableSQL .= 'plandisenio BOOLEAN, planregistro BOOLEAN, servidor VARCHAR(255) NOT NULL, servidordb VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorusuario VARCHAR(255) NOT NULL, servidorpass VARCHAR(255) NOT NULL, servidorftpdirectorio VARCHAR(255) NOT NULL,';
$strCreatePlanesTableSQL .= 'servidorftpusuario VARCHAR(255) NOT NULL, servidorftppass VARCHAR(255) NOT NULL, activo BOOLEAN);';
$strCreatePlanesTableSQLName = 'createPlanes';
echo $strCreatePlanesTableSQL;
$rslt = pq_query($planconexion, $strCreatePlanesTableSQLName);
echo $rslt;
?>
