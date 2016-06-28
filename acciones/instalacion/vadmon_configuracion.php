<?php
$strCreateConfiguracionTableSQL = 'CREATE TABLE vadmon_configuracion (';
$strCreateConfiguracionTableSQL .= 'id SERIAL PRIMARY KEY, herramienta VARCHAR(255) NOT NULL, campo1 VARCHAR(255) NOT NULL, campo2 VARCHAR(255) NOT NULL,';
$strCreateConfiguracionTableSQL .= 'creador VARCHAR(255) DEFAULT NULL, fechacreacion DATE DEFAULT CURRENT_DATE, modificador VARCHAR(255) DEFAULT NULL, fechamodificacion DATE DEFAULT CURRENT_DATE, fijo BOOLEAN DEFAULT FALSE, activo BOOLEAN DEFAULT TRUE);';
$strCreateConfiguracionTableSQL .= '';
$strCreateConfiguracionTableSQL .= '';
$strCreateConfiguracionTableSQL .= '';
$strCreateConfiguracionTableSQL .= '';
$strCreateConfiguracionTableSQL .= '';
pg_query($conexion, $strCreateConfiguracionTableSQL);

// Creamos limite de contenidos principales
mysql_query("insert into vadmon_configuracion 
(id, herramienta, campo1, campo2) values 
('1','limitecontenidos', '20', '1')")
or die("Could not insert data because ".mysql_error());
?>
