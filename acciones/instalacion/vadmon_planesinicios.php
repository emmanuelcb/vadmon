<?php
// Creamos la tabla
$strCreatePlanesIniciosTable = 'CREATE TABLE vadmon_planesinicios (';
$strCreatePlanesIniciosTable .= 'id SERIAL PRIMARY KEY, idusuario VARCHAR(30) NOT NULL, tiempo TIME';
$strCreatePlanesIniciosTable .= ');';
pg_query($planconexion, $strCreatePlanesIniciosTable);
?>
