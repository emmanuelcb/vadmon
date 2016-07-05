<?php
// Creamos la tabla
$strCreateImagenesTable = 'CREATE TABLE vadmon_imagenes (';
$strCreateImagenesTable .= 'id SERIAL PRIMARY KEY, nombreimg TEXT, image OID, filesize BIGINT, carpeta VARCHAR(255));';
pg_query($conexion, $strCreateImagenesTable);
?>
