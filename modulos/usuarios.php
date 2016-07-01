<?php
/*//////////////
	USUARIOS
//////////////*/
// Si la pagina actual trae idperfil
if(isset($_GET["idperfil"]))
{
	if($_GET["idperfil"]<>"lista")
	{
      	include("secciones/usuariosPerfil.php");
	}
	// Si la pagina actual es idperfil = lista
	if($_GET["idperfil"]=="lista")
	{
      	include("secciones/usuariosLista.php");
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
