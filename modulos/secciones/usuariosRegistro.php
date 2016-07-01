$nivelUsuario = $_COOKIE['nivelUsuario'];
if($pusuarios<>1){
echo 'Lo sentimos no tienes permiso para agregar nuevos usuarios.';
}else{
$javascriptExtra='
function setFocus(aField) {
document.forms[0][aField].focus();
}

function isAnEmailAddress(aTextField) {
if(document.forms[0][aTextField].value.length<5){
return false;
}else if(document.forms[0][aTextField].value.indexOf("@") < 1){
return false;
}else if (document.forms[0][aTextField].value.length - document.forms[0][aTextField].value.indexOf("@") < 4){
return false;
}else{ return true; }
}

function isEmpty(aTextField) {
if((document.forms[0][aTextField].value.length==0) || (document.forms[0][aTextField].value==null)) {
return true;
}else{ return false; }
}

function validate() {
if (isEmpty("nombreUsuario")) {
alert("Please fill your username.");
setFocus("nombreUsuario");
return false;
}
if (isEmpty("password")) {
alert("Please fill in your password.");
setFocus("password");
return false;
}
if (!isAnEmailAddress("email")) {
alert("The entered email address is invalid.");
setFocus("email");
return false;
}
return true;
}

function recargar() {
var imagenSrc = document.agregarUsuario.Avatar.value;
document.getElementById("actualizar").innerHTML=\'\';
document.getElementById("actualizar").innerHTML=\'<img src="http://'.$HostDominio.'/recursos/usuarios/\'+imagenSrc+\'" alt="" class="imagenAvatar"/>\';
}';
//Traemos lo archivos imagenes
$servidorImgUsr = $HostDominio;
if($servidorImgUsr == "localhost"){ $servidorImgUsr = 'vemeweb.com'; }
$conexionftp = ftp_connect($servidorImgUsr);
$resultado = ftp_login($conexionftp, $FTPUsuario, $FTPPass);
$archivos = ftp_nlist($conexionftp, $FTPDominioDir."/recursos/usuarios/");
sort($archivos);
$imagenOption='';
$avatarDefault='imagenDefault_usuario.png';
$imagenOption.='<select name="Avatar" onChange="recargar();">';
$imagenOption.='<option>'.$avatarDefault.'</option>';				
foreach($archivos as $img){
if($img <> "." && $img <> ".."){
$extension = $claseFunciones->obtenerExtension($img);
if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" ||$extension=="gif" ||
$extension=="JPG" || $extension=="PNG" ||$extension=="JPEG" ||$extension=="GIF"){
$imagenOption.= '<option>'.$img.'</option>';
}
}
}
$imagenOption.='</select><br />'; 
$mostrarContenido.='<h1>Agregar Usuario</h1>';
$mostrarContenido.='<form action="acciones/registraUsuarios.php" method="post" name="agregarUsuario" onSubmit="return validate()">';
$mostrarContenido.='<table cellpadding="3" cellspacing="0" border="0"><tr>';
$mostrarContenido.='<td width="250" valign="top"><h3>Elige tu avatar</h3>';
$mostrarContenido.='<div id="actualizar"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$avatarDefault.'" alt="" class="imagenAvatar"/>
</div><br />'.$imagenOption.'<br />';
$mostrarContenido.='<span class="textoDescriptivo"><small><b>NOTA:</b> La imagen debe medir 150px x 150px</small></span><br /></td>';
$mostrarContenido.='<td><table cellpadding="5" cellspacing="0" border="0">';
$mostrarContenido.='<tr><td width="200"><h3>Datos de Usuario</h3></td><td width="200"></td></tr>';
$mostrarContenido.='<tr><td><span class="textoDescriptivo">Nombre de Usuario(nick)*:</span><br />';
$mostrarContenido.='<input type="text" name="nombreUsuario" size="20" class="inputWidth"></td>';
$mostrarContenido.='<td><span class="textoDescriptivo">Password*:</span><br />';
$mostrarContenido.='<input type="password" name="password" size="20" class="inputWidth"></td></tr>';
$mostrarContenido.='<tr><td><h3>Detalles Personales</h3></td><td></td></tr>';
$mostrarContenido.='<tr><td><span class="textoDescriptivo">Nombre(s):</span><br />';
$mostrarContenido.='<input type="text" name="nombre" size="20" class="inputWidth"></td>';
$mostrarContenido.='<td><span class="textoDescriptivo">Email*:</span><br />';
$mostrarContenido.='<input type="text" name="email" size="20" class="inputWidth"></td></tr>';
$mostrarContenido.='<tr><td><span class="textoDescriptivo">Apellidos:</span><br />';
$mostrarContenido.='<input type="text" name="apellidos" size="20" class="inputWidth"></td>';
$mostrarContenido.='<td></td></tr>';
$mostrarContenido.='<tr><td><h3>Nivel de Usuario</h3></td><td></td></tr>';
$mostrarContenido.='<tr><td><select name="nivelusuario">';
// Traemos las opciones
if($stmtNivelesUsuario = $conexion->prepare("SELECT id, nivelusuario FROM vadmon_permisos ORDER BY id ASC")){
$stmtNivelesUsuario->execute();
$stmtNivelesUsuario->store_result();
$stmtNivelesUsuario->bind_result($id_rslt, $nivelusuario_rslt);
if($stmtNivelesUsuario->num_rows()>0){
$opcionNivel='';
while($stmtNivelesUsuario->fetch())	{
if($nivelusuario_rslt<>'maestro')	{
$opcionNivel.='<option>'.$nivelusuario_rslt.'</option>';
}
}
}
}
$mostrarContenido.=$opcionNivel;
$mostrarContenido.='</select></td><td><input type="submit" value="Agregar Usuario" class="botonAzul bordesRedondos"></td></tr></table></td></tr></table>';
$mostrarContenido.='';
$mostrarContenido.='</form>';
}