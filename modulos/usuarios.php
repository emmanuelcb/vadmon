<?php
/*//////////////
	USUARIOS
//////////////*/
// Si la pagina actual trae idperfil
if(isset($_GET["idperfil"]))
{
	if($_GET["idperfil"]<>"lista")
	{
		$idPerfil=$_GET["idperfil"];
		if($idPerfil!=$_COOKIE['idUsuario'])
		{
			header("location: contenido.php?idperfil=".$_COOKIE['idUsuario']);
		}
		// REVISO Usuarios
      	$strUsuariosTableExistsSQLName = 'isThereExistingUsuariosTable';
      	$strUsuariosTableExistsSQL = 'SELECT table_name FROM information_schema.tables WHERE table_schema = \'vadmon_usuarios\'';
		if(pg_prepare($conexion, $strUsuariosTableExistsSQLName, $strUsuariosTableExistsSQL)) {
			$result = pg_execute($conexion, $strUsuariosTableExistsSQLName);
			$fetchArr = pg_fetch_all($result);
			if(sizeof($fetchArr) == 0) {
				include("acciones/instalacion/vadmon_usuarios.php");
			}
		}
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
	}
	// Si la pagina actual es idperfil = lista
	if($_GET["idperfil"]=="lista")
	{
		$nombreUsuario = $_COOKIE['loggedin'];
      	$strUsuarioDetailSQLName = '';
      	$strUsuarioDetailSQL = 'SELECT id, nick, password, nombre, apellidos, email, avatar, nivelusuario FROM vadmon_usuarios WHERE nick<>\''.$nombreUsuario.'\' AND activo = TRUE ORDER BY id DESC';
		if(pg_prepare($conexion, $strUsuarioDetailSQLName, $strUsuarioDetailSQL)){
			$stmtListaUsuarios->execute();
			$stmtListaUsuarios->store_result();
			$stmtListaUsuarios->bind_result($id_rslt, $nick_rslt, $password_rslt, $nombre_rslt, $apellidos_rslt, $email_rslt, $avatar_rslt, $nivelusuario_rslt);
			if($stmtListaUsuarios->num_rows()>0){
				$mostrarContenido.='<a href="inicio.php?accion=registraUsuario" title="Registrar Usuario" class="botonRegistrarUs bordesRedondos">
												  Registrar nuevo usuario</a>';
				$mostrarContenido.='<h1>Usuarios Registrados:</h1>';
				$mostrarContenido.='<table cellpadding="10" cellspacing="0" border="0" width="980">';
				$cuenta=1;
				while($stmtListaUsuarios->fetch()){
					if($nick_rslt<>"vemeweb"){
						if($cuenta==1)$mostrarContenido.='<tr>';
						$mostrarContenido.='<td width="150"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$avatar_rslt.'" alt="avatar" width="150" height="150"/></td>';
						$mostrarContenido.='<td width="830" style="font-size:14px; line-height:18px;" valign="top">';
						$mostrarContenido.='<span class="textoDescriptivo">Nombre de Usuario:</span> '.$nick_rslt.'<br />';
						$mostrarContenido.='<span class="textoDescriptivo">Permisos de Usuario:</span> '.$nivelusuario_rslt.'<br />';
						$mostrarContenido.='<span class="textoDescriptivo">Nombre y Apellidos:</span> '.$nombre_rslt.' '.$rowB["apellidos"].'<br />';
						$mostrarContenido.='<span class="textoDescriptivo">Email:</span> '.$email_rslt.'<br />';
						$mostrarContenido.='<br /><a href="inicio.php?accion=editarUsuario&idusuario='.$id_rslt.'" title="Editar Usuario" 
											class="botonVerde bordesRedondos">Editar usuario</a> ';
						$mostrarContenido.=' <a href="acciones/eliminar.php?accion=eliminarUsuario&idusuario='.$id_rslt.'" title="Eliminar Usuario" 
											class="botonRojo bordesRedondos">Eliminar usuario</a></td>';
						
						//$mostrarContenido.='<td class="listContainer" valign="top">';
						//$mostrarContenido.='<img src="imagenes/usuarios/'.$rowB["avatar"].'" width="150" height="150" alt="'.$rowB["nick"].'" />';
						//$mostrarContenido.='<div class="listContainerTxt">';
						//$mostrarContenido.='<b>Nombre de Usuario:</b> '.$rowB["nick"].'<br />';
						//$mostrarContenido.='<b>URL:</b> <a href="'.$rowB["website"].'" target="_blank">'.$rowB["website"].'</a></div></td>';
						if($cuenta<2){$cuenta=$cuenta+1;} else {$mostrarContenido.='</tr><tr><td><br /><br /></td><td></td></tr>'; $cuenta=1;}
					}
				}
			}else{
				if($pusuarios==1){
					$mostrarContenido.='<a href="inicio.php?accion=registraUsuario">Registrar nuevo usuario</a>';
				}
			}
		}
	}
}

/* //////////////////////////////
		REGISTRA USUARIOS
////////////////////////////// */
if(isset($_GET["accion"]))
{
	if($_GET["accion"]=="registraUsuario")
	{
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
	}
}

/* //////////////////////////////
		EDITAR USUARIOS
////////////////////////////// */
if(isset($_GET["accion"]) && isset($_GET["idusuario"]))
{
	if($_GET["accion"]=="editarUsuario")
	{
		$idUsuario = $_GET["idusuario"];
		
		if($stmtEditarUsuario = $conexion->prepare("SELECT id, nick, password, nombre, apellidos, email, avatar, nivelusuario FROM vadmon_usuarios WHERE id=".$idUsuario)){
			$stmtEditarUsuario->execute();
			$stmtEditarUsuario->store_result();
			$stmtEditarUsuario->bind_result($id_rslt, $nick_rslt, $password_rslt, $nombre_rslt, $apellidos_rslt, $email_rslt, $avatar_rslt, $nivelusuario_rslt);
			if($stmtEditarUsuario->num_rows>0){
				while($stmtEditarUsuario->fetch()){
					$javascriptExtra.='
					function recargar() {
						var imagenSrc = document.editarPerfil.avatar.value;
						document.getElementById("actualizar").innerHTML=\'\';
						document.getElementById("actualizar").innerHTML=\'<img src="http://'.$HostDominio.'/recursos/usuarios/\'+imagenSrc+\'" alt="" class="imagenAvatar"/>\';
					}
					';
					$mostrarContenido.='<h1>Perfil de '.$nick_rslt.'</h1>';
					$mostrarContenido.='<form name="editarPerfil" action="acciones/update.php?actualizarUsuario='.$idUsuario.'" method="post">';
					$mostrarContenido.='<input type="hidden" name="nick" value="'.$nick_rslt.'"/>';
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
									if($img == $ravatar_rslt){ $selectedImagen='selected="selected"';}else{ $selectedImagen=''; }
									$imagenOption.= '<option '.$selectedImagen.'>'.$img.'</option>';
								}
							}
						}
						$imagenOption.='</select><br />';
					$mostrarContenido.='<div id="actualizar"><img src="http://'.$HostDominio.'/recursos/usuarios/'.$avatar_rslt.'" alt="" class="imagenAvatar"/>
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
					$mostrarContenido.='<input type="text" name="nombre" value="'.$nombre_rslt.'" class="inputWidth"/></td>';
					$mostrarContenido.='<td><span class="textoDescriptivo">Email:</span><br />';
					$mostrarContenido.='<input type="text" name="email" value="'.$email_rslt.'" class="inputWidth"/></td></tr>';
					$mostrarContenido.='<tr><td><span class="textoDescriptivo">Apellidos:</span><br />';
					$mostrarContenido.='<input type="text" name="apellidos"	value="'.$apellidos_rslt.'" class="inputWidth"/></td>';
					$mostrarContenido.='<td></td></tr>';
					$mostrarContenido.='<tr><td><h3>Nivel y Estado de Usuario</h3></td><td></td></tr>';
					// Traemos las opciones
					$opcionNivel='';
					if($stmtNivelesUsuario = $conexion->query("SELECT id, nivelusuario FROM vadmon_permisos ORDER BY id ASC")){
						if($stmtNivelesUsuario->num_rows>0){
							$opcionNivel='';
							$opcionNivel.='<option>'.$nivelusuario_rslt.'</option>';
							while($obj = $stmtNivelesUsuario->fetch_object()){
								if($obj->nivelusuario<>$nivelusuario_rslt){
									if($sobj->nivelusuario<>"maestro"){
										$opcionNivel.='<option>'.$obj->nivelusuario.'</option>';
									}
								}
							}
						}
					}
					$mostrarContenido.='<tr><td><span class="textoDescriptivo">Permisos de:</span> <select name="nivelusuario">'.$opcionNivel.'</select></td>';
						$selectEstado='';
						$selectEstado.='<select name="activo">';
						if($rowA["activo"]==1){$selectEstado.='<option value="1">activo</option><option value="0">inactivo</option>';}
						else if($rowA["activo"]==0){$selectEstado.='<option value="0">inactivo</option><option value="1">activo</option>';}
						$selectEstado.='</select>';
					$mostrarContenido.='<td><span class="textoDescriptivo">Estado:</span> '.$selectEstado.'</td></tr>';
					$mostrarContenido.='<tr><td><input type="submit" name="Submit" value="Guardar" class="botonAzul bordesRedondos" 
										style="border:none;"/></td>';
					$mostrarContenido.='<td></td></tr></table></td></tr></table>';
					$mostrarContenido.='</form></div>';	
				}
			}
		}
	}
}
?>
