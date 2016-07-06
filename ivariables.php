<?php
include("conexion.php");

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
  	$strVersionTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    $strVersionTableExistsSQL .= 'WHERE table_schema = \'vadmon_version\'';
	if($rslVersionTable = pg_query($conexion, $strVersionTableExistsSQL))
    {
		if(pg_num_rows($rslVersionTable) == 0) {
			include("acciones/instalacion/vadmon_version.php");
		}
	}
  	$strVersionDetailsSQL = 'SELECT version FROM vadmon_version LIMIT 1';
    if($rslVersionDetails = pg_query($conexion, $strVersionDetailsSQL))
    {
		while($row = pg_fetch_assoc($rslVersionDetails)){
			$versionCliente = $row['version'];
		}
		if(!isset($_GET["version"])){
			if($versionCliente < $version_vadmon){
				$actSig = $versionCliente;
				header( "location:inicio.php?mensaje=actualizacion&version=".$actSig);
			}
		}
	}

	// TRAIGO LOS DATOS DEL USUARIO
	if(isset($_COOKIE['idUsuario'])){
      	$strUsuariosTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
      	$strUsuariosTableExistsSQL .= 'WHERE table_schema = \'vadmon_usuarios\'';
      	if($rslUsuariosTable = pg_query($conexion, $strUsuariosTableExistsSQL))
        {
          	if(pg_num_rows($rslUsuariosTable) == 0){
              	include("acciones/instalacion/vadmon_usuarios.php");
            }
        }
      	$strUserDetailsSQL = 'SELECT nombre, apellidos, avatar, nivelusuario ';
      	$strUserDetailsSQL .= 'FROM vadmon_usuarios WHERE id = $1';
      	$strUserDetailsSQLName = 'GetUserDetails';
		if(pg_prepare($conexion, $strUserDetailsSQLName, $strUserDetailsSQL)){
			$rslUserDetails = pg_execute($conexion, $strUserDetailsSQLName, array($_COOKIE["idUsuario"]));
			while($row = pg_fetch_assoc($rslUserDetails)){
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
    	$strPermisosTableExistsSQL .= 'WHERE table_schema = \'vadmon_permisos\'';
		if($rslPermisosTable = pg_query($conexion, $strPermisosTableExistsSQL))
        {
			if(pg_num_rows($rslPermisosTable) == 0) {
				include("acciones/instalacion/vadmon_permisos.php");
			}
		}
      	$strPermisosDetailsSQL = 'SELECT * FROM vadmon_permisos WHERE nivelusuario = $1';
		if($rslPermisosDetails = pg_query_params($conexion, $strPermisosDetailsSQL, array($_COOKIE['nivelUsuario'])))
        {
			while($row = pg_fetch_assoc($rslPermisosDetails))
            {
              	print_r($row);
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
	if($rslContenidosTable = pg_query($conexion, $strContenidosTableExistsSQL))
    {
		if(pg_num_rows($rslContenidosTable) == 0) {
			include("acciones/instalacion/vadmon_contenidos.php");
		}
	}
    $strTotalContenidosSQL = 'SELECT id, menucontenido, subcontenido, activo ';
    $strTotalContenidosSQL .= 'FROM vadmon_contenidos WHERE subcontenido=0 and activo=1';
	if($rslTotalContenidos = pg_query($conexion, $strTotalContenidosSQL))
    {
		$numeroContenidos = pg_num_rows($rslTotalContenidos);
	}
    
  	// REVISO LA CONFIGURACION
    $strConfigurationTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    $strConfigurationTableExistsSQL .= 'WHERE table_schema = \'vadmon_configuracion\'';
	if($rslConfigurationTable = pg_query($conexion, $strConfigurationTableExistsSQLName, $strConfigurationTableExistsSQL))
    {
		if(pg_num_rows($rslConfigurationTable) == 0) {
			include("acciones/instalacion/vadmon_configuracion.php");
		}
	}
    $strConfiguracionDetailsSQL = 'SELECT herramienta, campo1, campo2, activo FROM vadmon_configuracion ';
    $strConfiguracionDetailsSQL .= 'WHERE herramient = \'limitecontenidos\' AND activo = TRUE LIMIT0,1';
	if($rslConfiguracionDetails = pg_query($conexion, $strConfiguracionDetailsSQL))
    {
		while($row = pg_fetch_assoc($rslConfiguracionDetails)){
			$limiteContenidos = $row['campo1'];
		}
	}

	// LEE SUBCONTENIDOS
	$opcionSubcontenidos="";
    $strContenidosDetailsSQL = 'SELECT id, menucontenido FROM vadmon_contenidos WHERE activo = TRUE AND subcontenido = 0 ORDER BY ordencontenido';
	if($rslContenidosDetails = pg_query($conexion, $strContenidosDetailsSQL))
    {
		if(pg_num_rows($rslContenidosDetails) > 0){
			$opcionSubcontenidos.='<select name="subcontenido" style="width:210px;">';
			if($numeroContenidos < $limiteContenidos){
				$opcionSubcontenidos.='<option value="0">ninguna</option>';
			}
			//CONTENIDOS PRINCIPALES
			while($contenido = pg_fetch_assoc($contenidos))
            {
				$opcionSubcontenidos.='<option value="'.$rowA["id"].'">'.$rowA["menucontenido"].'</option>';
              	$strSubcontenidosDetailsSQL = 'SELECT id, menucontenido FROM vadmon_contenidos WHERE activo = TRUE AND subcontenido = $1 ORDER BY ordercontenido';
              	$strSubcontenidosDetailsSQLName = 'GetSubcontenidosDetails';
				if(pg_prepare($conexion, $strSubcontenidosDetailsSQLName, $strSubcontenidosDetailsSQL))
                {
                  	$subcontenidos = pg_execute($conexion, $strSubcontenidosDetailsSQLName, array($contenido['id']));
					//SUBCONTENIDOS DE CONTENIDO
					while($subcontenido = pg_fetch_assoc($subcontenidos)){
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
}else{
  	// REVISA SI EXISTE LA TABLA DE PERMISOS
  	$strPermisosTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    $strPermisosTableExistsSQL .= 'WHERE table_schema = \'vadmon_permisos\'';
    if($rslPermisosTable = pg_query($conexion, $strPermisosTableExistsSQL))
    {
      if(pg_num_rows($rslPermisosTable) == 0) {
        include("acciones/instalacion/vadmon_permisos.php");
      }
    }
  	// Creamos limite de contenidos principales
    $strInsertBasicPermisosSQL = 'INSERT INTO vadmon_permisos ';
    $strInsertBasicPermisosSQL .= '(nivelusuario, contenidos, noticias, articulos, promociones, banners, usuarios, configuracion, diseno, encuestas, basesdedatos, permisos, papelera, editar, crear, eliminar)';
    $strInsertBasicPermisosSQL .= ' VALUES ';
    $strInsertBasicPermisosSQL .= '(\'maestro\', TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE ,TRUE)';
  	echo $strInsertBasicPermisosSQL;
    if($rslInsertBasicPermisos = pg_query($conexion, $strInsertBasicPermisosSQL))
    {
        echo 'BasicPermisosCreated<br/>';
        print_r(pg_fetch_all($rslInsertBasicPermisos));
    }
  	// REVISA SI EXISTE LA TABLA DE USUARIOS
  	$needNewUser = false;
    $strUsuariosTableExistsSQL = 'SELECT table_name FROM information_schema.tables ';
    $strUsuariosTableExistsSQL .= 'WHERE table_schema = \'vadmon_usuarios\'';
    if($rslUsuariosTable = pg_query($conexion, $strUsuariosTableExistsSQL))
    {
      if(pg_num_rows($rslUsuariosTable) == 0){
        include("acciones/instalacion/vadmon_usuarios.php");
        $needNewUser = true;
      }
    }
  	// CREAMOS EL PRIMER USUARIO SI ESTE NO EXISTE
  	if($needNewUser)
    {
      // Colocamos la version actual
      $strInsertUsrSQL = 'INSERT INTO vadmon_usuarios (nick, password, nombre, apellidos, email, avatar, nivelusuario, activo) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)';
      if($rslInsertUsr = pg_query_params($conexion, $strInsertUsrSQL, array('admin','admin','Administrador','Cruz','emmanuel.cb@outlook.com','avatar.jpg','maestro', TRUE)))
      {
          //echo 'User Inserted';
      }
    }
}
?>
