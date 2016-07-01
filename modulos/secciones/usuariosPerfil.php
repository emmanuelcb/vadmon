$idPerfil=$_GET["idperfil"];
	if($idPerfil!=$_COOKIE['idUsuario'])
	{
  		header("location: contenido.php?idperfil=".$_COOKIE['idUsuario']);
	}
	// REVISO Usuarios
	$strUsuariosDetailsSQLName = 'GetUsuariosDetails';
	$strUsuariosDetailsSQL = 'SELECT id, avatar, nick, nivelusuario, nombre, email, apellidos FROM vadmon_usuarios WHERE id='.$_GET['idperfil'];
	if(pg_prepare($conexion, $strUsuariosDetailsSQLName, $strUsuariosDetailsSQL)){
  		$result = pg_execute($conexion, $strUsuariosDetailsSQLName);
  		while($usuarios = pg_fetch_array($result)){
    		$javascriptExtra.='
      		function recargar() {
      			var imagenSrc = document.perfilUsuario.Avatar.value;
      			document.getElementById("actualizar").innerHTML=\'\';
        		document.getElementById("actualizar").innerHTML=\'<img src="http://'.$HostDominio.'/recursos/usuarios/\'+imagenSrc+\'" alt="" class="imagenAvatar"/>\';
    		}
    		function muestraCampos() {
      			document.getElementById("moduloOculto").style.display="block";
      			document.getElementById("moduloLectura").style.display="none";
    		}
    		';
      		$mostrarContenido.='<div class="encabezadoSeccion">';
   			$mostrarContenido.='<span class="tituloSeccion">Tu Perfil</span><br/></div>';
    		$mostrarContenido.='<div class="contenedorRegistros">';
    		$mostrarContenido.='<div id="moduloLectura"><table cellpadding="10" cellspacing="0" border="0"><tr>';
    		$mostrarContenido.='<td width="150"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$usuarios['avatar'].'" alt="avatar" width="150" height="150"/></td>';
    		$mostrarContenido.='<td style="font-size:14px; line-height:18px;" valign="top">';
    		$mostrarContenido.='<span style="font-size:24px;">'.$usuarios['nick'].'</span><br />';
    		$mostrarContenido.='<span style="font-size:14px; color:#999999;">'.$usuarios['nivelusuario'].'</span><br /><br/>';
    		$mostrarContenido.='<p style="font-size:12px; color:#999999;">'.$usuarios['nombre'].' '.$usuarios['apellidos'].'<br />';
    		$mostrarContenido.=$usuarios['email'].'<br />';
    		$mostrarContenido.='<br/><a onclick="muestraCampos();" title="agregar" class="btnNuevo">Modifica tu Perfil</a></td>';
    		$mostrarContenido.='</tr></table></div>';
    		$mostrarContenido.='<div id="moduloOculto" style="display:none;"><form name="perfilUsuario" action="acciones/update.php" method="post">';
    		$mostrarContenido.='<table cellpadding="3" cellspacing="0" border="0"><tr>';
    		$mostrarContenido.='<td width="250" valign="top"><h3>Elige tu avatar</h3>';
    		//Traemos lo archivos imagenes
    		$servidorImgUsr = $HostDominio;
    		if($servidorImgUsr == "localhost"){ $servidorImgUsr = 'vemeweb.com'; }
    		$conexionftp = ftp_connect($servidorImgUsr);
    		$resultado = ftp_login($conexionftp, $FTPUsuario, $FTPPass);
    		$archivos = ftp_nlist($conexionftp, $FTPDominioDir."/recursos/usuarios/");
    		sort($archivos);
    		$imagenOption.='<select name="Avatar" onChange="recargar();">';
    		foreach($archivos as $img){
      		if($img <> "." && $img <> ".."){
        		$extension = $claseFunciones->obtenerExtension($img);
        		if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" ||$extension=="gif" ||
           		$extension=="JPG" || $extension=="PNG" ||$extension=="JPEG" ||$extension=="GIF"){
          			if($img == $usuarios['avatar'])
          			{ 
            			$selectedImagen='selected="selected"';
          			}else{
            			$selectedImagen='';
          			}
          			$imagenOption.= '<option '.$selectedImagen.'>'.$img.'</option>';
        		}
      		}
    	}
    	$imagenOption.='</select><br />';
    	$mostrarContenido.='<div id="actualizar"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$usuarios['avatar'].'" alt="" class="imagenAvatar"/>
      </div><br />'.$imagenOption.'<br />';
      	$mostrarContenido.='<span class="textoDescriptivo"><small><b>NOTA:</b> La imagen debe medir 150px x 150px</small></span><br /></td>';
    	$mostrarContenido.='<td valign="top"><table cellpadding="3" cellspacing="0" border="0" width="400">';
    	$mostrarContenido.='<tr><td width="200"><h3>Cambia tu password</h3></td><td width="200"></td></tr>';
    	$mostrarContenido.='<tr><td><span class="textoDescriptivo">Password Anterior:</span><br />';
    	$mostrarContenido.='<input type="password" name="oldpass" class="inputWidth"/></td>';
    	$mostrarContenido.='<td><span class="textoDescriptivo">Nuevo Password:</span><br />';
    	$mostrarContenido.='<input type="password" name="newpass"  class="inputWidth"/></td></tr>';
    	$mostrarContenido.='<tr><td><h3>Tus detalles personales</h3></td><td></td></tr>';
    	$mostrarContenido.='<tr><td><span class="textoDescriptivo">Nombre:</span><br />';
    	$mostrarContenido.='<input type="text" name="nombre" value="'.$usuarios['nombre'].'" class="inputWidth"/></td>';
    	$mostrarContenido.='<td><span class="textoDescriptivo">Email:</span><br />';
    	$mostrarContenido.='<input type="text" name="email" value="'.$usuarios['email'].'" class="inputWidth"/></td></tr>';
    	$mostrarContenido.='<tr><td><span class="textoDescriptivo">Apellidos:</span><br />';
    	$mostrarContenido.='<input type="text" name="apellidos" value="'.$usuarios['apellidos'].'" class="inputWidth"/></td>';
    	$mostrarContenido.='<td></td></tr>';
    	$mostrarContenido.='<tr><td><h3>Nivel y Estado de Usuario</h3></td><td></td></tr>';
    	// Traemos las opciones
    	$strUsuariosAccessDetailsSQLName = 'GetUsuariosAccessDetails';
    	$strUsuariosAccessDetailsSQL = 'SELECT id, nivelusuario FROM vadmon_permisos ORDER BY id ASC';
    	if(pg_prepare($conexion, $strUsuariosAccessDetailsSQLName, $strUsuariosAccessDetailsSQL))
    	{
      		$usuariosAccessRs = pg_execute($conexion, $strUsuariosAccessDetailsSQLName);
      		$usuariosAccessFetchAll = pg_fetch_all($usuariosAccessRs);
      		if(sizeof($usuariosAccessFetchAll) > 0){
        		$opcionNivel='';
        		$opcionNivel.='<option>'.$usuarios['nivelusuario'].'</option>';
        		while($usrAccess = pg_fetch_array($usuariosAccessRs)){
          			if($usrAccess['nivelusuario'] <> $nivelusuario_rslt)
          			{
            			if($usrAccess['nivelusuario'] <> "maestro")
            			{
              				$opcionNivel.='<option>'.$usrAccess['nivelusuario'].'</option>';
            			}
          			}
        		}
      		}
    	}
    	$mostrarContenido.='<tr><td><span class="textoDescriptivo">Permisos de:</span><br/ >';
    	if($ppermisos==1)
    	{
      		$mostrarContenido.='<select name="">'.$opcionNivel.'</select>';
    	}
    	else if($ppermisos==0)
    	{
      		$mostrarContenido.=$usuarios['nivelusuario'].'<input type="hidden" value="'.$usuarios['nivelusuario'].'" name="nivelusuario" />';}
    	$mostrarContenido.='</td>';
    	$selectEstado='';
    	$selectEstado.='<select name="activo">';
    	if($usuarios['activo'] == TRUE)
    	{
      		$selectEstado.='<option value="1">activo</option><option value="0">inactivo</option>';
    	}
    	else if($rowA["activo"]==0)
    	{
      		$selectEstado.='<option value="0">inactivo</option><option value="1">activo</option>';
    	}
    	$selectEstado.='</select>';
    	$mostrarContenido.='<td><span class="textoDescriptivo">Estado:</span><br />'.$selectEstado.'</td></tr>';
    	$mostrarContenido.='<tr><td><input type="submit" name="Submit" value="Guardar" class="botonAzul bordesRedondos" style="border:none;"/></td>';
    	$mostrarContenido.='<td></td></tr></table></td></tr></table>';
    	$mostrarContenido.='</form></div></div>';
    }
}