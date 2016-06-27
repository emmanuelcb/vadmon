<?php
// Creamos la tabla
$strCreatePlanesIniciosTable = '';
$strCreatePlanesIniciosTable .= 'CREATE TABLE vadmon_planesinicios (';
$strCreatePlanesIniciosTable .= 'id SERIAL PRIMARY KEY, idusuario VARCHAR(30) NOT NULL, tiempo TIME';
$strCreatePlanesIniciosTable .= ');';
$strCreatePlanesIniciosTableName = 'createPlanesIniciosTable';
if(pg_prepare($planconexion, $strCreatePlanesIniciosTableName, $strCreatePlanesIniciosTable))
{
	$result = pg_execute($planconexion, $strCreatePlanesIniciosTableName);
}
?>
