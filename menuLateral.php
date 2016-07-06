<?php
  echo 'pconfiguracion '.$pconfiguracion;
  /*$htmlBarraLateral = '<table cellpadding="0" cellspacing="0" border="0"><tr>';
  // CONFIGURACION
  if($pconfiguracion==1){
    $htmlBarraLateral .= '<td><a href="inicio.php?idcontenido=configuracion" title=""><img src="imagenes/btnConfig.png" alt="Configuracion"/></a></td>';
  }else{
    $htmlBarraLateral .= '<td><a class="btnDeshabilitado"><img src="imagenes/btnConfig.png" alt="Configuracion"/></a></td>';
  }
  $htmlBarraLateral .= '<td><div class="lineaSeparacionColumnas"></div></td>';
  //USUARIOS
  if($pusuarios==1){
    $htmlBarraLateral .= '<td><a href="inicio.php?idperfil=lista" title=""><img src="imagenes/btnPerfil.png" alt="Usuarios"/></a></td>';
  }else{
    $htmlBarraLateral .= '<td><a class="btnDeshabilitado"><img src="imagenes/btnPerfil.png" alt="Usuarios"/></a></td>';
  }
  $htmlBarraLateral .= '<td><div class="lineaSeparacionColumnas"></div></td>';
  $htmlBarraLateral .= '<td><a href="logout.php" title=""><img src="imagenes/btnCerrarSesion.png" alt="Cerrar Sesion"/></a></td></tr></table>';
  $htmlBarraLateral .= '<div class="lineaSeparacion"></div>';
  $htmlBarraLateral .= '<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td align="center">';
  $htmlBarraLateral .= '<table cellpadding="0" cellspacing="0" border="0"><tr>';

  $imagenes='';
  $servidorImg = $HostDominio;
  if($servidorImg == "localhost"){ $servidorImg = 'vemeweb.com'; }
  $conexionftp = ftp_connect($servidorImg);
  $resultado = ftp_login($conexionftp, $FTPUsuario, $FTPPass);
  //$archivos = ftp_nlist($conexionftp, $FTPDominioDir."/recursos/".$carpeta."/");

  $htmlBarraLateral .= '<td width="50"><a href="inicio.php?idperfil='.$_COOKIE['idUsuario'].'" title="Perfil" class="imgPerfilThumb"><img src="http://'.$servidorImg.'/recursos/usuarios/.'$usuarioavatar.'" alt=""/></a></td>';
  $htmlBarraLateral .= '<td align="right"><p><span class="usuarioNombre">'.$usuarionombre.' '.$usuarioapellidos.'</span><br/><span class="usuarioNivel">'.$usuarionivel.'</span></p></td>';
  $htmlBarraLateral .= '</tr></table></td></tr></table>';
  $htmlBarraLateral .= '<div class="lineaSeparacion"></div>';
  // INICIA MENU
  $htmlBarraLateral .= '<ul class="menuLateral">';
  // CONTENIDOS
  if($pcontenidos==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=contenidos" title="" ';
    if($estiloActivo==1){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Contenidos</a></li>';
  }
  // GALERIA
  if($pcontenidos==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?mostrarImagenes=listar&carpeta=galeria" title="" ';
    if($estiloActivo==13){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Galer&iacute;a</a></li>';
  }
  // NOTICIAS
  if($pnoticias==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=noticias" title="" ';
    if($estiloActivo==4){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Noticias</a></li>';
  }
  // ARTICULOS
  if($particulos==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=articulos" title="" ';
    if($estiloActivo==3){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Art&iacute;culos</a></li>';
  }
  // PROMOCIONES
  if($ppromociones==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=promociones" title="" ';
    if($estiloActivo==5){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Promociones</a></li>';
  }
  // BANNERS
  if($pbanners==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=banners" title="" ';
    if($estiloActivo==2){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Banners</a></li>';
  }
  // ENCUESTAS
  if($pencuestas==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=encuestas" title="" ';
    if($estiloActivo==8){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Encuestas</a></li>';
  }
  // IMAGENES
  if($pcrear==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?mostrarImagenes=listar" title="" ';
    if($estiloActivo==6){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Im&aacute;genes</a></li>';
  }
  // BASE DE DATOS
  if($pbasesdedatos==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=registro" title="" ';
    if($estiloActivo==11){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Registro</a></li>';
  }
  // DISENO
  if($pdiseno==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?diseno=mostrar" title="" ';
    if($estiloActivo==7){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Dise&ntilde;o</a></li>';
  }
  // PAPELERA
  if($ppapelera==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=papelera" title="" ';
    if($estiloActivo==12){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Papelera</a></li>';
  }
  // PERMISOS
  if($ppermisos==1){
  	$htmlBarraLateral .= '<li><a href="inicio.php?idcontenido=permisos" title="" ';
    if($estiloActivo==10){ $htmlBarraLateral .= 'class="selected"'; }
    $htmlBarraLateral .= '>Permisos</a></li>';
  }
  
  $htmlBarraLateral .= '</ul>';
  echo $htmlBarraLateral;*/
?>
