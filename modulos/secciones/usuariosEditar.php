$idUsuario = $_GET["idusuario"];
$strEditarUsuarioSQLName = 'getUsuarioToEdit';
$strEditarUsuarioSQL = 'SELECT id, nick, password, nombre, apellidos, email, avatar, nivelusuario, activo FROM vadmon_usuarios WHERE id=$1;
if(pg_prepare($conexion, $strEditarUsuarioSQLName, $strEditarUsuarioSQL))
{
	$rslEditarUsuario = pg_execute($conexion, $strEditarUsuarioSQLName, array($idUsuario));
  	$fetchEditarUsuario = pg_fetch_all($rslEditarUsuario);
  	if(sizeof($fetchEditarUsuario) > 0)
  	{
    	while($rowEditUsr = pg_fetch_array($rslEditarUsuario))
        {
      		$javascriptExtra.='
        		function recargar() {
        			var imagenSrc = document.editarPerfil.avatar.value;
        			document.getElementById("actualizar").innerHTML=\'\';
          			document.getElementById("actualizar").innerHTML=\'<img src="http://'.$HostDominio.'/recursos/usuarios/\'+imagenSrc+\'" alt="" class="imagenAvatar"/>\';
      			}
      		';
        	$mostrarContenido.='<h1>Perfil de '.$rowEditUsr['nick'].'</h1>';
      		$mostrarContenido.='<form name="editarPerfil" action="acciones/update.php?actualizarUsuario='.$idUsuario.'" method="post">';
      		$mostrarContenido.='<input type="hidden" name="nick" value="'.$rowEditUsr['nick'].'"/>';
      		$mostrarContenido.='<table cellpadding="3" cellspacing="0" border="0"><tr>';
      		$mostrarContenido.='<td width="250" valign="top"><h3>Elige tu avatar</h3>'; 	
      		//Traemos lo archivos imagenes
      		$servidorImgUsr = $HostDominio;
      		if($servidorImgUsr == "localhost"){ $servidorImgUsr = 'vemeweb.com'; }
      		$conexionftp = ftp_connect($servidorImgUsr);
      		$resultado = ftp_login($conexionftp, $FTPUsuario, $FTPPass);
      		$archivos = ftp_nlist($conexionftp, $FTPDominioDir."/recursos/usuarios/");
      		sort($archivos);
      		$imagenOption='';
      		$imagenOption.='<span class="textoDescriptivo">Imagen para Avatar:</span> <select name="avatar" onChange="recargar();">';	
      		foreach($archivos as $img){
        		if($img <> "." && $img <> ".."){
          			$extension = $claseFunciones->obtenerExtension($img);
          			if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" ||$extension=="gif" ||
             		$extension=="JPG" || $extension=="PNG" ||$extension=="JPEG" ||$extension=="GIF"){
            			if($img == $rowEditUsr['avatar']){
                          	$selectedImagen='selected="selected"';
                        }else{ 
                          	$selectedImagen='';
                        }
            			$imagenOption.= '<option '.$selectedImagen.'>'.$img.'</option>';
          			}
        		}
      		}
      		$imagenOption.='</select><br />';
      		$mostrarContenido.='<div id="actualizar"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$rowEditUsr['avatar'].'" alt="" class="imagenAvatar"/>
        </div><br />'.$imagenOption.'<br />';
        	$mostrarContenido.='<span class="textoDescriptivo"><small><b>NOTA:</b> La imagen debe medir 150px x 150px</small></span><br /></td>';
      		$mostrarContenido.='<td valign="top"><table cellpadding="3" cellspacing="0" border="0" width="400">';
      		$mostrarContenido.='<tr><td width="200"><h3>Cambia tu password</h3></td><td width="200"></td></tr>';
      		$mostrarContenido.='<tr><td><span class="textoDescriptivo">Password Anterior:</span><br />';
      		$mostrarContenido.='<input type="password" name="oldpass" class="inputWidth"/></td>';
      		$mostrarContenido.='<td><span class="textoDescriptivo">Nuevo Password:</span><br />';
      		$mostrarContenido.='<input type="password" name="newpass" class="inputWidth"/></td></tr>';
      		$mostrarContenido.='<tr><td><h3>Tus detalles personales</h3></td><td></td></tr>';
      		$mostrarContenido.='<tr><td><span class="textoDescriptivo">Nombre:</span><br />';
      		$mostrarContenido.='<input type="text" name="nombre" value="'.$rowEditUsr['nombre'].'" class="inputWidth"/></td>';
      		$mostrarContenido.='<td><span class="textoDescriptivo">Email:</span><br />';
      		$mostrarContenido.='<input type="text" name="email" value="'.$rowEditUsr['email'].'" class="inputWidth"/></td></tr>';
      		$mostrarContenido.='<tr><td><span class="textoDescriptivo">Apellidos:</span><br />';
      		$mostrarContenido.='<input type="text" name="apellidos"	value="'.$rowEditUsr['apellidos'].'" class="inputWidth"/></td>';
      		$mostrarContenido.='<td></td></tr>';
      		$mostrarContenido.='<tr><td><h3>Nivel y Estado de Usuario</h3></td><td></td></tr>';
      		// Traemos las opciones
      		$opcionNivel='';
          	$strNivelesUsuarioSQLName = 'getListOfPermisos';
          	$strNivelesUsuarioSQL = 'SELECT id, nivelusuario FROM vadmon_permisos ORDER BY id ASC';
      		if(pg_prepare($conexion, $strNivelesUsuarioSQLName, $strNivelesUsuarioSQL))
            {
              	$rslNivelesUsuarios = pg_execute($conexion, $strNivelesUsuarioSQLName);
              	$fetchNivelesUsuarios = pg_fetch_all($rslNivelesUsuarios);
        		if(sizeof($rslNivelesUsuarios) > 0){
          			$opcionNivel='';
          			$opcionNivel.='<option>'.$rowEditUsr['nivelusuario'].'</option>';
          			while($objUsrNivel = pg_fetch_object($rslNivelesUsuarios)){
            			if($objUsrNivel->nivelusuario<>$rowEditUsr['nivelusuario']){
              				if($objUsrNivel->nivelusuario<>"maestro"){
                				$opcionNivel.='<option>'.$objUsrNivel->nivelusuario.'</option>';
              				}
            			}
          			}
        		}
      		}
      		$mostrarContenido.='<tr><td><span class="textoDescriptivo">Permisos de:</span> <select name="nivelusuario">'.$opcionNivel.'</select></td>';
      		$selectEstado='';
      		$selectEstado.='<select name="activo">';
      		if($rowEditUsr["activo"]==1){
              	$selectEstado.='<option value="1">activo</option><option value="0">inactivo</option>';
            }
      		else if($rowEditUsr["activo"]==0){
              	$selectEstado.='<option value="0">inactivo</option><option value="1">activo</option>';
            }
      		$selectEstado.='</select>';
      		$mostrarContenido.='<td><span class="textoDescriptivo">Estado:</span> '.$selectEstado.'</td></tr>';
      		$mostrarContenido.='<tr><td><input type="submit" name="Submit" value="Guardar" class="botonAzul bordesRedondos" style="border:none;"/></td>';
        	$mostrarContenido.='<td></td></tr></table></td></tr></table>';
      		$mostrarContenido.='</form></div>';	
    	}
 	}
}
