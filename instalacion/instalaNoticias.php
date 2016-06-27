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

$qryCreateTable = "CREATE TABLE vadmon_noticias (";
$qryCreateTable .="id SERIAL PRIMARY KEY, titulonoticia VARCHAR(255) DEFAULT NULL, textonoticia TEXT,";
$qryCreateTable .="imagen1noticia VARCHAR(255) DEFAULT NULL, imagen2noticia VARCHAR(255) DEFAULT NULL, imagen3noticia VARCHAR(255) DEFAULT NULL,";
$qryCreateTable .="fechanoticia DATE DEFAULT NULL, creador VARCHAR(255) DEFAULT NULL, fechacreacion DATE DEFAULT NULL,";
$qryCreateTable .="modificador VARCHAR(255) DEFAULT NULL, fechamodificacion DATE DEFAULT NULL, keywordsnoticia VARCHAR(255) DEFAULT NULL,";
$qryCreateTable .="descripcionnoticia VARCHAR(255) DEFAULT NULL, fijo INTEGER DEFAULT 0, activo INTEGER DEFAULT 0);";
$result = pg_query($conexion, $qryCreateTable);
?>
<script languaje='javascript' type='text/javascript'>window.close();</script>
