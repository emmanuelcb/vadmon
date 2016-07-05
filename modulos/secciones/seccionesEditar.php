$seccionSeleccionada="";
if(isset($_GET["tabla"])){
  $seccionSeleccionada=$_GET["tabla"];

  // SI LA SELECCION ES "contenidos"
  if($seccionSeleccionada=="contenidos" && $pcontenidos==1)
  {
    include("modulos/secciones/editarContenidos.php");
  }

  // SI LA SELECCION ES "banners"
  else if($seccionSeleccionada=="banners" && $pbanners==1)
  {
    include("modulos/secciones/editarBanners.php");
  }

  // SI LA SELECCION ES "articulos"
  else if($seccionSeleccionada=="articulos" && $particulos==1)
  {
    include("modulos/secciones/editarArticulos.php");
  }

  // SI LA SELECCION ES "noticias"
  else if($seccionSeleccionada=="noticias" && $pnoticias==1)
  {
    include("modulos/secciones/editarNoticias.php");
  }

  // SI LA SELECCION ES "promociones"
  else if($seccionSeleccionada=="promociones" && $ppromociones==1)
  {
    include("modulos/secciones/editarPromociones.php");
  }

  // SI LA SELECCION ES "configuracion"
  else if($seccionSeleccionada=="configuracion" && $pconfiguracion==1)
  {
    include("modulos/secciones/editarConfiguracion.php");
  }

  // SI LA SELECCION ES "permisos"
  else if($seccionSeleccionada=="permisos" && $ppermisos==1)
  {
    include("modulos/secciones/editarPermisos.php");
  }
  else{ $mostrarContenido = "No hay nada que modificar";}
}