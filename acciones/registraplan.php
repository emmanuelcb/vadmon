<?php
include("../planconexion.php");
// Creamos usuario
$strInsertUsuarioPlanSQLName = 'InsertUsuarioPlan';
$strInsertUsuarioPlanSQL = 'INSERT INTO vadmon_planes (id, usuario, contrasenia, planusuarios, planpermisos, planarticulos, plannoticias, planencuestas, planpromociones, plandisenio, planregistro, servidor, servidordb, servidorusuario, servidorpass, servidorftpdirectorio, servidorftpusuario, servidorftppass, activo)';
$strInsertUsuarioPlanSQL .= 'VALUES(1, $1, $2, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, \'ec2-54-83-5-43.compute-1.amazonaws.com\', \'dau3o208fvurb8\', \'yrlszffmgftqyo\', \'3PbYU_D4huXaZkwcxg8T_CmjOA\', \'test\', \'test\', \'test\', TRUE)';
if(pg_prepare($planconexion, $strInsertUsuarioPlanSQLName, $strInsertUsuarioPlanSQL))
{
  	pg_execute($planconexion, $strInsertUsuarioPlanSQLName, array($_POST["usuario"], $_POST["contrasenia"]));
  	header("location: ../index.php");
}
?>
