<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];

$strPgConnection = 'dbname='.$baseDatos.' host='.$servidor.' port=5432 ';	
$strPgConnection .= 'user='.$usuarioBase.' password='.$passBase.' sslmode=require';
$conexion = pg_connect($strPgConnection);

$qryCreateTable = "CREATE TABLE vadmon_contenidos (";
$qryCreateTable .="id SERIAL PRIMARY KEY, subcontenido VARCHAR(255), menucontenido VARCHAR(255) DEFAULT NULL, ordencontenido INTEGER DEFAULT 0,";
$qryCreateTable .="titulocontenido VARCHAR(255) DEFAULT NULL,textocontenido TEXT, imagen1contenido VARCHAR(255) DEFAULT NULL,";
$qryCreateTable .="imagen2contenido VARCHAR(255) DEFAULT NULL, imagen3contenido VARCHAR(255) DEFAULT NULL, creador VARCHAR(255) DEFAULT NULL,";
$qryCreateTable .="fechacreacion DATE DEFAULT NULL, modificador VARCHAR(255) DEFAULT NULL, fechamodificacion DATE DEFAULT NULL,";
$qryCreateTable .="keywordscontenido VARCHAR(255) DEFAULT NULL, descripcioncontenido TEXT, fijo INTEGER DEFAULT 0, activo INTEGER DEFAULT 1);";
$result = pg_query($conexion, $qryCreateTable);
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>
