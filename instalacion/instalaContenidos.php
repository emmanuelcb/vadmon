<?php
$qryCreateContenidos = "CREATE TABLE vadmon_contenidos (";
$qryCreateContenidos .="id SERIAL PRIMARY KEY, subcontenido VARCHAR(255), menucontenido VARCHAR(255) DEFAULT NULL, ordencontenido INTEGER DEFAULT 0,";
$qryCreateContenidos .="titulocontenido VARCHAR(255) DEFAULT NULL,textocontenido TEXT, imagen1contenido VARCHAR(255) DEFAULT NULL,";
$qryCreateContenidos .="imagen2contenido VARCHAR(255) DEFAULT NULL, imagen3contenido VARCHAR(255) DEFAULT NULL, creador VARCHAR(255) DEFAULT NULL,";
$qryCreateContenidos .="fechacreacion DATE DEFAULT CURRENT_DATE, modificador VARCHAR(255) DEFAULT NULL, fechamodificacion DATE DEFAULT CURRENT_DATE,";
$qryCreateContenidos .="keywordscontenido VARCHAR(255) DEFAULT NULL, descripcioncontenido TEXT, fijo INTEGER DEFAULT 0, activo INTEGER DEFAULT 1);";
pg_query($conexion, $qryCreateContenidos);
?>
