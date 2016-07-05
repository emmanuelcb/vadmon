$seccionSeleccionada = $_GET["idcontenido"];
$strDynamicExistsSQLName = 'isThereDynamicTable';
$strDynamicExistsSQL = 'SELECT table_name FROM information_schema.tables ';
$strDynamicExistsSQL .= 'WHERE table_schema = \'vadmon_'.$_GET["idcontenido"].'\'';
if(pg_prepare($conexion, $strDynamicExistsSQLName, $strDynamicExistsSQL))
{
  $rslDynamicExists = pg_execute($conexion, $strDynamicExistsSQLName);
  $fetchDynamicExists = pg_fetch_all($rslDynamicExists);
  if(sizeof($fetchDynamicExists) == 0) {
    include("acciones/instalacion/vadmon_".$_GET["idcontenido"].".php");
  }
}
$strDynamicDetailsSQLName = 'getDynamicDetails';
$strDynamicDetailsSQL = 'SELECT * FROM vadmon_'.$_GET["idcontenido"].' ORDER BY id DESC';
if(pg_prepare($conexion, $strDynamicDetailsSQLName, $strDynamicDetailsSQL))
{
  $rslDynamicDetails = pg_execute($conexion, $strDynamicDetailsSQLName);
  $fetchDynamicDetails = pg_fetch_all($rslDynamicDetails);
  if(sizeof($fetchDynamicDetails) > 0)
  {
    // Si la seleccion es "contenidos"
    if($seccionSeleccionada=="contenidos" && $pcontenidos==1)
    {
      include("modulos/secciones/mostrarContenidos.php");
    }

    // Si la seleccion es "banners"
    else if($seccionSeleccionada=="banners" && $pbanners==1)
    {
      include("modulos/secciones/mostrarBanners.php");
    }

    // Si la seleccion es "articulos"
    else if($seccionSeleccionada=="articulos" && $particulos==1)
    {
      include("modulos/secciones/mostrarArticulos.php");
    }

    // Si la seleccion es "noticias"
    else if($seccionSeleccionada=="noticias" && $pnoticias==1)
    {
      include("modulos/secciones/mostrarNoticias.php");
    }

    // Si la seleccion es "promociones"
    else if($seccionSeleccionada=="promociones" && $ppromociones==1)
    {
      include("modulos/secciones/mostrarPromociones.php");
    }

    // Si la seleccion es "configuracion"
    else if($seccionSeleccionada=="configuracion" && $pconfiguracion==1)
    {
      include("modulos/secciones/mostrarConfiguracion.php");
    }

    // Si la seleccion es "permisos"
    else if($seccionSeleccionada=="permisos" && $ppermisos==1)
    {
      include("modulos/secciones/mostrarPermisos.php");
    }

    // Si la seleccion es "papelera"
    else if($seccionSeleccionada=="papelera" && $ppapelera==1)
    {
      include("modulos/secciones/mostrarPapelera.php");
    }

    // Si la seleccion es "registro"
    else if($seccionSeleccionada=="registro" && $pbasesdedatos==1)
    {
      include("modulos/secciones/mostrarRegistro.php");
    }else{
      header("Location: inicio.php?mensaje=sinPermiso");
    }	
  }
}else{
  $mostrarContenido.='<div class="encabezadoSeccion">';
  $mostrarContenido.='<span class="tituloSeccion">'.$seccionSeleccionada.'</span><br/></div>';
  if($pcrear==1){
    $mostrarContenido.='<a href="inicio.php?accion=agregarContenido&tablaseleccion='.$seccionSeleccionada.'" ';
    $mostrarContenido.='title="agregar" class="btnNuevo">Agregar '.$seccionSeleccionada.'</a><br/><br/><br/>';
  }
}