<?php
// Creamos la tabla
$strCreateContenidosTable = 'CREATE TABLE vadmon_contenidos (';
$strCreateContenidosTable .= 'id SERIAL PRIMARY KEY, subcontenido VARCHAR(255) DEFAULT 0, menucontenido VARCHAR(255) DEFAULT NULL, ordencontenido INTEGER DEFAULT 0,';
$strCreateContenidosTable .= 'titulocontenido VARCHAR(255) DEFAULT NULL, textocontenido TEXT, imagen1contenido VARCHAR(255) DEFAULT NULL,';
$strCreateContenidosTable .= 'imagen2contenido VARCHAR(255) DEFAULT NULL, image3contenido VARCHAR(255) DEFAULT NULL, creador VARCHAR(255) DEFAULT NULL,';
$strCreateContenidosTable .= 'fechacreacion DATE DEFAULT CURRENT_DATE, modificador VARCHAR(255) DEFAULT NULL, fechamodificacion DATE DEFAULT CURRENT_DATE,';
$strCreateContenidosTable .= 'keywordscontenido VARCHAR(255) DEFAULT NULL, descripcioncontenido TEXT, fijo BOOLEAN DEFAULT FALSE, activo BOOLEAN DEFAULT FALSE);';
pg_query($conexion, $strCreateContenidosTable);
?>
