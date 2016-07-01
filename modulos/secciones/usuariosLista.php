$nombreUsuario = $_COOKIE['loggedin'];
$strUsuarioDetailSQLName = 'GetUsuarioDetail';
$strUsuarioDetailSQL = 'SELECT id, nick, password, nombre, apellidos, email, avatar, nivelusuario FROM vadmon_usuarios WHERE nick<>\''.$nombreUsuario.'\' AND activo = TRUE ORDER BY id DESC';
if(pg_prepare($conexion, $strUsuarioDetailSQLName, $strUsuarioDetailSQL)){
$usuarioRs = pg_execute($conexion, $strUsuarioDetailSQLName);
$usuarioFetchAll = pg_fetch_all($usuarioRs);
if(sizeof($usuarioFetchAll) > 0)
{
$mostrarContenido.='<a href="inicio.php?accion=registraUsuario" title="Registrar Usuario" class="botonRegistrarUs bordesRedondos">Registrar nuevo usuario</a>';
$mostrarContenido.='<h1>Usuarios Registrados:</h1>';
$mostrarContenido.='<table cellpadding="10" cellspacing="0" border="0" width="980">';
$cuenta=1;
while($usrRow = pg_fetch_array($usuarioRs)){
if($usrRow['nick'] <> "vemeweb")
{
if($cuenta==1)$mostrarContenido.='<tr>';
$mostrarContenido.='<td width="150"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$usrRow['avatar'].'" alt="avatar" width="150" height="150"/></td>';
$mostrarContenido.='<td width="830" style="font-size:14px; line-height:18px;" valign="top">';
$mostrarContenido.='<span class="textoDescriptivo">Nombre de Usuario:</span> '.$usrRow['nick'].'<br />';
$mostrarContenido.='<span class="textoDescriptivo">Permisos de Usuario:</span> '.$usrRow['nivelusuario'].'<br />';
$mostrarContenido.='<span class="textoDescriptivo">Nombre y Apellidos:</span> '.$usrRow['nombre'].' '.$usrRow['apellidos'].'<br />';
$mostrarContenido.='<span class="textoDescriptivo">Email:</span> '.$usrRow['email'].'<br />';
$mostrarContenido.='<br /><a href="inicio.php?accion=editarUsuario&idusuario='.$usrRow['id'].'" title="Editar Usuario" 
class="botonVerde bordesRedondos">Editar usuario</a> ';
$mostrarContenido.=' <a href="acciones/eliminar.php?accion=eliminarUsuario&idusuario='.$usrRow['id'].'" title="Eliminar Usuario" 
class="botonRojo bordesRedondos">Eliminar usuario</a></td>';

//$mostrarContenido.='<td class="listContainer" valign="top">';
//$mostrarContenido.='<img src="imagenes/usuarios/'.$rowB["avatar"].'" width="150" height="150" alt="'.$rowB["nick"].'" />';
//$mostrarContenido.='<div class="listContainerTxt">';
//$mostrarContenido.='<b>Nombre de Usuario:</b> '.$rowB["nick"].'<br />';
//$mostrarContenido.='<b>URL:</b> <a href="'.$rowB["website"].'" target="_blank">'.$rowB["website"].'</a></div></td>';
if($cuenta<2){
$cuenta=$cuenta+1;
} else {
$mostrarContenido.='</tr><tr><td><br /><br /></td><td></td></tr>'; 
$cuenta=1;
}
}
}
}else{
if($pusuarios==1){
$mostrarContenido.='<a href="inicio.php?accion=registraUsuario">Registrar nuevo usuario</a>';
}
}
}