<?php
if($paginaActual=="index.php"){
	include("conexion.php");
}
// VERSION DEL SISTEMA
$version_vadmon= 1.1;

include("funciones.php");
$claseFunciones = new claseFunciones;

$meses= array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$dias_agenda= array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$dias= array("Sa","Do","Lu","Ma","Mi","Ju","Vi");

// VARIABLES GENERALES
$mensaje="";
$fechahoy=date("Y-m-d");      // lee la fecha
$horaactual=date("H:i");
$diahoy=date("d");
$meshoy=date("m");
$anohoy=date("Y");

// DEFINO VARIABLES DEL SISTEMA
$cssExtra='';
$javascriptExtra='';
$jsUrlExtra='';
$cssUrlExtra='';
$bodyExtra='';
$elementosVolatiles='';
$mostrarContenido='';
$nombreUsuario='';
$idUsuario='';
$nivelUsuario='';
$botonActivo='';
$ubicacionCarpeta='..';
//$ubicacionCarpeta='..';
$numeroContenidos='';
$limiteContenidos='';
$paginaActual='';
$nivelUsuario='';

// VARIABLES DE USUARIO
$usuarionombre='';
$usuarioapellidos='';
$usuarioavatar='';
$usuarionivel='';

// DEFINO VARIABLES DE PERMISOS
$pcontenidos='';
$pnoticias='';
$particulos='';
$ppromociones='';
$pbanners='';
$pusuarios='';
$pconfiguracion='';
$pdiseno='';
$pencuestas='';
$pbasesdedatos='';
$ppermisos='';
$ppapelera='';
$peditar='';
$pcrear='';
$peliminar='';

if($archivoActual <> "index.php")
{
	// REVISO SI EL SISTEMA ESTA ACTUALIZADO
	$versionCliente = '';
  	$strVersionTableExistsSQL = "SELECT table_name FROM information_schema.tables ';
    $strVersionTableExistsSQL .= "WHERE table_schema = 'vadmon_version'";
  	$strVersionTableExistsSQLName = 'isThereExistingVersionTable'
	if(pg_prepare($planconexion, $strVersionTableExistsSQLName, $strVersionTableExistsSQL)) {
      	$result = pg_execute($conexion, $strVersionTableSQLName);
  		$fetchArr = pg_fetch_all($result);
		if(sizeof($fecthArray) == 0) {
			include("acciones/instalacion/vadmon_version.php");
		}
	}
  	$strVersionDetailsSQL = 'SELECT version FROM vadmon_version LIMIT 1';
    $strVersionDetailsSQLName = 'GetVersionDetails';
	if(pg_prepare($conexion, $strVersionDetailsSQLName, $strVersionDetailsSQL)){
		$result = pg_execute($conexion, $strVersionDetailsSQLName);
		while($row = pg_fetch_array($result)){
			$versionCliente = $row['version'];
		}
		if(!isset($_GET["version"])){
			if($versionCliente < $version_vadmon){
				$actSig = $versionCliente;
				header( "location:inicio.php?mensaje=actualizacion&version=".$actSig);
			}
		}
	}
/*
	// TRAIGO LOS DATOS DEL USUARIO
	if(isset($_COOKIE['nivelUsuario'])){
      	$strUserDetailsSQL = 'SELECT nombre, apellidos, avatar, nivelusuario ';
      	$strUserDetailsSQL .= 'FROM vadmon_usuarios WHERE id = $1';
      	$strUserDetailsSQLName = 'GetUserDetails';
		if(pg_prepare($conexion, $strUserDetailsSQLName, $strUserDetailsSQL){
			$result = pg_execute($conexion, $strUserDetailsSQLName, array($_COOKIE["idUsuario"]));
			$fetchArr = pg_fetch_all($result);
			while($row = pg_fetch_array($result)){
				$usuarionombre 		= $row['nombre'];
				$usuarioapellidos 	= $row['apellidos'];
				$usuarioavatar 		= $row['avatar'];
				$usuarionivel 		= $row['nivelusuario'];
			}
		}
	}

	// REVISO PERMISOS
	if(isset($_COOKIE['nivelUsuario'])){
      	$strPermisosTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    	$strPermisosTableExistsSQL .= "WHERE table_schema = 'vadmon_permisos'";
      	$strPermisosTableExistsSQLName = 'isThereExistingPermisosTable';
		if(pg_prepare($conexion, $strPermisosTableExistsSQLName, $strPermisosTableExistsSQL)) {
			$result = pg_execute($conexion, $strPermisosTableExistsSQLName);
          	$fetchArr = pg_fetch_all($result);
			if(sizeof($fetchArr) == 0) {
				include("acciones/instalacion/vadmon_permisos.php");
			}
		}
      	$strPermisosDetailsSQL = 'SELECT contenidos, noticias, articulos, promociones, banners, usuarios, configuracion, diseno, encuestas, basesdedatos, permisos, papelera, editar, crear, eliminar FROM vadmon_permisos WHERE nivelusuario = $1';
      	$strPermisosDetailsSQLName = 'getPermisosDetails';
		if(pg_prepare($conexion, $strPermisosDetailsSQLName, $strPermisosDetailsSQL)){
			$result = pg_execute($conexion, $strPermisosDetailsSQLName, array($_COOKIE['nivelUsuario']));
			while($row = pg_fetch_array($result)){
				$pcontenidos	= $row['contenidos'];
				$pnoticias		= $row['noticias'];
				$particulos		= $row['articulos'];
				$ppromociones	= $row['promociones'];
				$pbanners		= $row['banners'];
				$pusuarios		= $row['usuarios'];
				$pconfiguracion	= $row['configuracion'];
				$pdiseno		= $row['diseno'];
				$pencuestas		= $row['encuestas'];
				$pbasesdedatos	= $row['basesdedatos'];
				$ppermisos		= $row['permisos'];
				$ppapelera		= $row['papelera'];
				$peditar		= $row['editar'];
				$pcrear			= $row['crear'];
				$peliminar		= $row['eliminar'];
			}
		}
	}

	// REVISO NUMERO DE CONTENIDOS Y EL LIMITE
    $strContenidosTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    $strContenidosTableExistsSQL .= 'WHERE table_schema = \'vadmon_contenidos\'';
    $strContenidosTableExistsSQLName = 'isThereExistingContenidosTable';
	if(pg_prepare($conexion, $strContenidosTableExistsSQLName, $strContenidosTableExistsSQL)) {
		$result = pg_execute($conexion, $strContenidosTableExistsSQLName);
		$fetchArr = pg_fetch_all($result);
		if(sizeof($fetchArr) == 0) {
			include("acciones/instalacion/vadmon_contenidos.php");
		}
	}
    $strTotalContenidosSQL = 'SELECT id, menucontenido, subcontenido, activo ';
    $strTotalContenidosSQL .= 'FROM vadmon_contenidos WHERE subcontenido=0 and activo=1';
    $strTotalContenidosSQLName = 'GetTotalContenidos';
	if(pg_prepare($conexion, $strTotalContenidosSQLName, $strTotalContenidosSQL)){
		$result = pg_execute($conexion, $strTotalContenidosSQLName);
		$fetchArr = pg_fetch_all($result);
		$numeroContenidos = sizeof($fetchArr);
	}
           
    $strConfigurationTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    $strConfigurationTableExistsSQL .= 'WHERE table_schema = \'vadmon_configuracion\'';
    $strConfigurationTableExistsSQLName = 'isThereExistingConfiguracionTable';
	if(pg_prepare($conexion, $strConfigurationTableExistsSQLName, $strConfigurationTableExistsSQL)) {
		$result = pg_execute($conexion, $strConfigurationTableExistsSQLName);
		$fetchArr = pg_fetch_all($result);
		if(sizeof($fetchArr) == 0) {
			include("acciones/instalacion/vadmon_configuracion.php");
		}
	}
    $strConfiguracionDetailsSQL = 'SELECT herramienta, campo1, campo2, activo FROM vadmon_configuracion ';
    $strConfiguracionDetailsSQL .= 'WHERE herramient = \'limitecontenidos\' AND activo = TRUE LIMIT0,1';
    $strConfiguracionDetailsSQLName = 'GetConfiguracionDetails';
	if(pg_prepare($conexion, $strConfiguracionDetailsSQLName, $strConfiguracionDetailsSQL)){
		$result = pg_execute($conexion, $strConfiguracionDetailsSQLName);
		while($row = pg_fetch_array($result)){
			$limiteContenidos = $row['campo1'];
		}
	}

	// LEE SUBCONTENIDOS
	$opcionSubcontenidos="";
    $strContenidosDetailsSQL = 'SELECT id, menucontenido FROM vadmon_contenidos WHERE activo = TRUE AND subcontenido = 0 ORDER BY ordencontenido';
    $strContenidosDetailsSQLName = 'GetContenidosDetails';
	if(pg_prepare($conexion, $strContenidosDetailsSQLName, $strContenidosDetailsSQL)){
		$contenidos = pg_execute($conexion, $strContenidosDetailsSQLName);
      	$fetchArr = pg_fetch_all($contenidos);
		if(sizeof($fetchArr) > 0){
			$opcionSubcontenidos.='<select name="subcontenido" style="width:210px;">';
			if($numeroContenidos < $limiteContenidos){
				$opcionSubcontenidos.='<option value="0">ninguna</option>';
			}
			//CONTENIDOS PRINCIPALES
			while($contenido = pg_fetch_array($contenidos))
            {
				$opcionSubcontenidos.='<option value="'.$rowA["id"].'">'.$rowA["menucontenido"].'</option>';
              	$strSubcontenidosDetailsSQL = 'SELECT id, menucontenido FROM vadmon_contenidos WHERE activo = TRUE AND subcontenido = \''.$contenido['id'].'\' ORDER BY ordercontenido';
              	$strSubcontenidosDetailsSQLName = 'GetSubcontenidosDetails';
				if(pg_prepare($conexion, $strSubcontenidosDetailsSQLName, $strSubcontenidosDetailsSQL))
                {
                  	$subcontenidos = pg_execute($conexion, $strSubcontenidosDetailsSQLName);
					//SUBCONTENIDOS DE CONTENIDO
					while($subcontenido = pg_fetch_array($subcontenidos)){
						$opcionSubcontenidos.='<option value="'.$subcontenido['id'].'">&nbsp;&nbsp;&nbsp;'.$subcontenido['menucontenido'].'</option>';
					}
				}
			}
			$opcionSubcontenidos.='</select>';
		}else{
			$opcionSubcontenidos.='<select name="subcontenido">';
			$opcionSubcontenidos.='<option value="0">ninguna</option>';
			$opcionSubcontenidos.='</select>';
		}
	}

	// MENSAJES
	include("modulos/mensajes.php");

	// USUARIOS
	include("modulos/usuarios.php");

	// MENUS
	include("modulos/menus.php");

	// SECCIONES
	include("modulos/secciones.php");

	// IMAGENES
	include("modulos/imagenes.php");
*/
}
?>
