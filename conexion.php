<?php
//GENERAMOS VARIABLES DEL PLAN
$Id_p = '';
$Usuario_p = '';
$PlanUsuarios_p = '';
$PlanPermisos_p = '';
$PlanArticulos_p = '';
$PlanNoticias_p = '';
$PlanEncuestas_p = '';
$PlanPromociones_p = '';
$PlanDisenio_p = '';
$PlanRegistro_p = '';
$HostDominio = '';
$DBDominio = '';
$UserDominio = '';
$PassDominio = '';
$FTPDominioDir = '';
$FTPUsuario = '';
$FTPPass = '';

//ASIGNAMOS LAS VARIABLES
if(isset($_SESSION["idUsuarioVAdmon"])){
	$idSesion = $_SESSION["idUsuarioVAdmon"];
}else{
	include("inicioSesionVAdmonClass.php");
	$claseVAdmon = new inicioSesionVAdmonClass;
	$claseVAdmon->sesionSeguraVAdmonInicio();
	$idSesion = $_SESSION["idUsuarioVAdmon"];
}
$strGetPlanSQL = 'SELECT * FROM vadmon_planes WHERE id = $1 LIMIT 1';
$strGetPlanSQLName = 'getPlan';
if($rslGetPlan = pg_query_params($planconexion, $strGetPlanSQL, array($idSesion))) 
{
	if(pg_num_rows($rslGetPlan) > 0) {
      	while($row = pg_fetch_assoc($rslGetPlan))
        {
			$Id_p = $row['id'];
			$Usuario_p = $row['usuario'];
			$PlanUsuarios_p = $row['planusuarios'];
			$PlanPermisos_p = $row['planpermisos'];
			$PlanArticulos_p = $row['planarticulos'];
			$PlanNoticias_p = $row['plannoticias'];
			$PlanEncuestas_p = $row['planencuestas'];
			$PlanPromociones_p = $row['planpromociones'];
			$PlanDisenio_p = $row['plandisenio'];
			$PlanRegistro_p = $row['planregistro'];
			$HostDominio = $row['servidor'];
			$DBDominio = $row['servidordb'];
			$UserDominio = $row['servidorusuario'];
			$PassDominio = $row['servidorpass'];
			$FTPDominioDir = $row['servidorftpdirectorio'];
			$FTPUsuario = $row['servidorftpusuario'];
			$FTPPass = $row['servidorftppass'];
		}
	}
}
$strPgConnection = 'dbname='.$DBDominio.' host='.$HostDominio.' port=5432 user='.$UserDominio.' password='.$PassDominio.' sslmode=require';
$conexion = pg_connect($strPgConnection);
?>
