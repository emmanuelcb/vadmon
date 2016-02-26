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
$fechahoy=date("Y-m-d");      // lee la fcha
$horaactual=date("H:i");
$diahoy=date("d");
$meshoy=date("m");
$anohoy=date("Y");

/* DEFINO VARIABLES DEL SISTEMA */
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

/* VARIABLES DE USUARIO */
$usuarionombre='';
$usuarioapellidos='';
$usuarioavatar='';
$usuarionivel='';

/* DEFINO VARIABLES DE PERMISOS */
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
	/*REVISO SI EL SISTEMA ESTA ACTUALIZADO */
	$versionCliente='';
	if($stmtExisteVersion = $conexion->prepare("SHOW TABLES LIKE 'vadmon_version'")) {
		$stmtExisteVersion->execute();
		$stmtExisteVersion->store_result();
		if($stmtExisteVersion->num_rows == '') {
			include("acciones/instalacion/vadmon_version.php");
		}
	}
	if($stmtVersion = $conexion->prepare("SELECT version FROM vadmon_version LIMIT 1")){
		$stmtVersion->bind_param("s", $stmtVersionCampos);
		$stmtVersion->execute();
		$stmtVersion->store_result();
		$stmtVersion->bind_result($version_rslt);
		while($stmtVersion->fetch()){
			$versionCliente = $version_rslt;
		}
		if(!isset($_GET["version"])){
			if($versionCliente < $version_vadmon){
				$actSig = $versionCliente;
				header( "location:inicio.php?mensaje=actualizacion&version=".$actSig);
			}
		}
	}

	/* TRAIGO LOS DATOS DEL USUARIO */
	if(isset($_COOKIE['nivelUsuario'])){
		if($stmtUsuario = $conexion->prepare("SELECT nombre, apellidos, avatar, nivelusuario FROM vadmon_usuarios WHERE id = ?")){
			$stmtUsuario->bind_param("i", $_COOKIE["idUsuario"]);
			$stmtUsuario->execute();
			$stmtUsuario->store_result();
			$stmtUsuario->bind_result($nombre_rslt, $apellidos_rslt, $avatar__rslt, $nivelusuario_rslt);
			while($stmtUsuario->fetch()){
				$usuarionombre=$nombre_rslt;
				$usuarioapellidos=$apellidos_rslt;
				$usuarioavatar=$avatar__rslt;
				$usuarionivel=$nivelusuario_rslt;
			}
		}
	}

	/*REVISO PERMISOS */
	if(isset($_COOKIE['nivelUsuario'])){
		if($stmtExistePermisos = $conexion->prepare("SHOW TABLES LIKE 'vadmon_permisos'")) {
			$stmtExistePermisos->execute();
			$stmtExistePermisos->store_result();
			if($stmtExistePermisos->num_rows == '') {
				include("acciones/instalacion/vadmon_permisos.php");
			}
		}
		if($stmtPermisos = $conexion->prepare("SELECT contenidos, noticias, articulos, promociones, banners, usuarios, configuracion, diseno, encuestas, basesdedatos, permisos, papelera, editar, crear, eliminar FROM vadmon_permisos WHERE nivelusuario = ?")){
			$stmtPermisos->bind_param("s", $_COOKIE['nivelUsuario']);
			$stmtPermisos->execute();
			$stmtPermisos->store_result();
			$stmtPermisos->bind_result($contenidos_rslt, $noticias_rslt, $articulos_rslt, $promociones_rslt, $banners_rslt, $usuarios_rslt, $configuracion_rslt, $diseno_rslt, $encuestas_rslt, $basesdedatos_rslt, $permisos_rslt, $papelera_rslt, $editar_rslt, $crear_rslt, $eliminar_rslt);
			while($stmtPermisos->fetch()){
				$pcontenidos=$contenidos_rslt;
				$pnoticias=$noticias_rslt;
				$particulos=$articulos_rslt;
				$ppromociones=$promociones_rslt;
				$pbanners=$banners_rslt;
				$pusuarios=$usuarios_rslt;
				$pconfiguracion=$configuracion_rslt;
				$pdiseno=$diseno_rslt;
				$pencuestas=$encuestas_rslt;
				$pbasesdedatos=$basesdedatos_rslt;
				$ppermisos=$permisos_rslt;
				$ppapelera=$papelera_rslt;
				$peditar=$editar_rslt;
				$pcrear=$crear_rslt;
				$peliminar=$eliminar_rslt;
			}
		}
	}

	/* REVISO NUMERO DE CONTENIDOS Y EL LIMITE */
	if($stmtExisteContenidos = $conexion->prepare("SHOW TABLES LIKE 'vadmon_contenidos'")) {
		$stmtExisteContenidos->execute();
		$stmtExisteContenidos->store_result();
		if($stmtExisteContenidos->num_rows == '') {
			include("acciones/instalacion/vadmon_contenidos.php");
		}
	}
	if($stmtContenidos = $conexion->prepare("SELECT id, menucontenido, subcontenido, activo FROM vadmon_contenidos WHERE subcontenido=0 and activo=1")){
		$stmtContenidos->execute();
		$stmtContenidos->store_result();
		$numeroContenidos = $stmtContenidos->num_rows;
	}

	if($stmtExisteConfiguracion = $conexion->prepare("SHOW TABLES LIKE 'vadmon_configuracion'")) {
		$stmtExisteConfiguracion->execute();
		$stmtExisteConfiguracion->store_result();
		if($stmtExisteConfiguracion->num_rows == '') {
			include("acciones/instalacion/vadmon_configuracion.php");
		}
	}
	if($stmtConfiguracion = $conexion->prepare("select herramienta, campo1, campo2, activo from vadmon_configuracion where herramienta='limitecontenidos' and activo=1 limit 0,1")){
		$stmtConfiguracion->execute();
		$stmtConfiguracion->store_result();
		$stmtConfiguracion->bind_result($herramienta_rslt, $campo1_rslt, $campo2_rslt, $activo_rslt);
		while($stmtConfiguracion->fetch()){
			$limiteContenidos = $campo1_rslt;
		}
	}

	/* LEE SUBCONTENIDOS */
	$opcionSubcontenidos="";
	if($stmtExisteContenidos = $conexion->prepare("SHOW TABLES LIKE 'vadmon_contenidos'")) {
		$stmtExisteContenidos->execute();
		$stmtExisteContenidos->store_result();
		if($stmtExisteContenidos->num_rows == '') {
			include("acciones/instalacion/vadmon_contenidos.php");
		}
	}
	if($stmtOpcionSubcontenidosA = $conexion->prepare("SELECT id, menucontenido FROM vadmon_contenidos WHERE activo=1 AND subcontenido=0 ORDER BY ordencontenido")){
		$stmtOpcionSubcontenidosA->execute();
		$stmtOpcionSubcontenidosA->store_result();
		$stmtOpcionSubcontenidosA->bind_result($id_rsltA, $menucontenido_rsltA);
		if($stmtOpcionSubcontenidosA->num_rows == ""){
			$opcionSubcontenidos.='<select name="subcontenido" style="width:210px;">';
			if($numeroContenidos < $limiteContenidos){
				$opcionSubcontenidos.='<option value="0">ninguna</option>';
			}
			//CONTENIDOS PRINCIPALES
			while($stmtOpcionSubcontenidos->fetch()){
				$opcionSubcontenidos.='<option value="'.$rowA["id"].'">'.$rowA["menucontenido"].'</option>';
				if($stmtOpcionSubcontenidosB = $conexion->query("SELECT id, menucontenido FROM vadmon_contenidos WHERE activo=1 AND subcontenido=".$id_rsltA." ORDER BY ordencontenido")){
					//SUBCONTENIDOS DE CONTENIDO
					while($objB = $stmtOpcionSubcontenidosB->fetch_object()){
						$opcionSubcontenidos.='<option value="'.$objB->id.'">&nbsp;&nbsp;&nbsp;'.$objB->menucontenido.'</option>';
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

	/* MENSAJES */
	include("modulos/mensajes.php");

	/* USUARIOS */
	include("modulos/usuarios.php");

	/* MENUS */
	include("modulos/menus.php");

	/* SECCIONES */
	include("modulos/secciones.php");

	/* IMAGENES */
	include("modulos/imagenes.php");

}
?>
