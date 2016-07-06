<?php
// Creamos la tabla
$strCreatePermisosTableSQL = 'CREATE TABLE vadmon_permisos (';
$strCreatePermisosTableSQL .= 'id SERIAL PRIMARY KEY, nivelusuario VARCHAR(255) DEFAULT NULL, contenidos BOOLEAN DEFAULT FALSE, noticias BOOLEAN DEFAULT FALSE,';
$strCreatePermisosTableSQL .= 'articulos BOOLEAN DEFAULT FALSE, promociones BOOLEAN DEFAULT FALSE, banners BOOLEAN DEFAULT FALSE, usuarios BOOLEAN DEFAULT FALSE,';
$strCreatePermisosTableSQL .= 'configuracion BOOLEAN DEFAULT FALSE, diseno BOOLEAN DEFAULT FALSE, encuestas BOOLEAN DEFAULT FALSE, basededatos BOOLEAN DEFAULT FALSE,';
$strCreatePermisosTableSQL .= 'permisos BOOLEAN DEFAULT FALSE, papelera BOOLEAN DEFAULT FALSE, editar BOOLEAN DEFAULT FALSE, crear BOOLEAN DEFAULT FALSE, eliminar BOOLEAN DEFAULT FALSE);';
pg_query($conexion, $strCreatePermisosTableSQL);
  
// Creamos limite de contenidos principales
$strInsertBasicPermisosSQL = 'INSERT INTO vadmon_permisos (';
$strInsertBasicPermisosSQL .= 'nivelusuario, contenidos, noticias, articulos, promociones, banners, usuarios, configuracion, diseno, encuestas, basesdedatos, permisos, papelera, editar, crear, eliminar)';
$strInsertBasicPermisosSQL .= ' VALUES ';
$strInsertBasicPermisosSQL .= '(\'maestro\', TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE ,TRUE),';
$strInsertBasicPermisosSQL .= '(\'invitado\', TRUE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE ,FALSE);';
if($rslInsertBasicPermisos = pg_query($conexion, $strInsertBasicPermisosSQL))
{
	echo 'BasicPermisosCreated<br/>';
}
?>
