<?php
$qryCreateUsuarios = 'CREATE TABLE vadmon_usuarios (';
$qryCreateUsuarios .= 'id SERIAL PRIMARY KEY, nick VARCHAR(30) NOT NULL, password VARCHAR(32) NOT NULL, nombre VARCHAR(32) NOT NULL, apellidos VARCHAR(32) NOT NULL,';
$qryCreateUsuarios .= 'email VARCHAR(62) NOT NULL, avatar VARCHAR(255) NOT NULL, nivelusuario VARCHAR(255) DEFAULT \'invitado\', activo BOOLEAN DEFAULT TRUE);';
pg_query($conexion, $qryCreateUsuarios);
?>
