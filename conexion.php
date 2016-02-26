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
if($stmtPlan = $planconexion->prepare("SELECT id, usuario, planusuarios, planpermisos, planarticulos, plannoticias, planencuestas, planpromociones, plandisenio, planregistro, servidor, servidorbd, servidorusuario, servidorpass, servidorftpdirectorio, servidorftpusuario, servidorftppass FROM vadmon_planes WHERE id = $idSesion LIMIT 1")) {
	$stmtPlan->execute();
	$stmtPlan->store_result();
	$stmtPlan->bind_result($id_rslt, $usuario_rslt, $planusuarios_rslt, $planpermisos_rslt, $planarticulos_rslt, $plannoticias_rslt, $planencuestas_rslt, $planpromociones_rslt, $plandisenio_rslt,  $planregistro_rslt, $servidor_rslt, $servidorbd_rslt, $servidorusuario_rslt, $servidorpass_rslt, $servidorftpdirectorio_rslt, $servidorftpusuario_rslt, $servidorftppass_rslt); 
	if($stmtPlan->num_rows > 0) {
		while ($stmtPlan->fetch()) {
			$Id_p = $id_rslt;
			$Usuario_p = $usuario_rslt;
			$PlanUsuarios_p = $planusuarios_rslt;
			$PlanPermisos_p = $planpermisos_rslt;
			$PlanArticulos_p = $planarticulos_rslt;
			$PlanNoticias_p = $plannoticias_rslt;
			$PlanEncuestas_p = $planencuestas_rslt;
			$PlanPromociones_p = $planpromociones_rslt;
			$PlanDisenio_p = $plandisenio_rslt;
			$PlanRegistro_p = $planregistro_rslt;
			$HostDominio = $servidor_rslt;
			$DBDominio = $servidorbd_rslt;
			$UserDominio = $servidorusuario_rslt;
			$PassDominio = $servidorpass_rslt;
			$FTPDominioDir = $servidorftpdirectorio_rslt;
			$FTPUsuario = $servidorftpusuario_rslt;
			$FTPPass = $servidorftppass_rslt;
		}
	}
}
$conexion = new mysqli ($HostDominio, $UserDominio, $PassDominio, $DBDominio);
/*if ($conexion->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
echo $conexion->host_info . "\n";*/
?>