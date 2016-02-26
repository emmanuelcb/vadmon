<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
$passBase = $_COOKIE['passBase'];
$charset = $_COOKIE['charset'];
$cotejamiento = $_COOKIE['cotejamiento'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../css/estilos.css" type="text/css" rel="stylesheet"/>
<title>&copy;Veme | Administrador de Contenidos</title>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript">
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
		var imagenSrc = document.agregarUsuario.avatar.value;
		document.getElementById("actualizar").innerHTML='';
		document.getElementById("actualizar").innerHTML='<img src="imagenes/usuarios/'+imagenSrc+'" alt="" class="imagenAvatar"/>';
	}
	
	function ocultar(valor){
		if(valor=="configuracion"){
			document.getElementById("btnConfig").style.display="none";
		}else if(valor=="usuarios"){
			document.getElementById("btnUsrs").style.display="none";
		}else if(valor=="contenidos"){
			document.getElementById("btnCont").style.display="none";
		}else if(valor=="banners"){
			document.getElementById("btnBan").style.display="none";
		}else if(valor=="articulos"){
			document.getElementById("btnArt").style.display="none";
		}else if(valor=="noticias"){
			document.getElementById("btnNot").style.display="none";
		}
	}
</script>
</head>
<body>
<div class="contenedorPagina">
<table cellpadding="10" cellspacing="0" border="0" style="margin:50px 0 0 0; width:100%;">
	<tr>
		<td width="50%">
        	<img src="../imagenes/logotipo_inicio.png" alt="&copy;Veme 2011" title="&copy;Veme 2011"/>
        </td>
        <td width="50%">
        	<h1>Datos de Instalación</h1> 
            <span class="cNaranja">Servidor:</span> <?php echo $servidor?><br />
            <span class="cNaranja">Base de Datos:</span> <?php echo $baseDatos?><br />
            <span class="cNaranja">Usuario:</span> <?php echo $usuarioBase?><br />
            <span class="cNaranja">Contraseña:</span> <?php echo $passBase?><br />
            <br />
            <a href="index.php" title="Cambiar" class="botonAzul bordesRedondos">Cambiar</a>
            <br /><br /><br />
            <h1>Designar Administrador</h1>         
            <table cellpadding="5" cellspacing="0" border="0" width="400">
                <tr>
                    <td>
                    	<form action="registraUsuarios.php" target="_blank" onSubmit="return validate()">
                        	<input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            Nombre de Usuario(nick)*:<br />
                            <input type="text" name="nombreUsuario" size="20" class="inputWidth"><br />
                            Contraseña:<br />
                            <input type="password" name="password" size="20" class="inputWidth"><br />
                            E-mail:<br />
                            <input type="text" name="email" size="20" class="inputWidth">
                            <br /><br />
                            <input type="hidden" name="nombre" value="-">
                            <input type="hidden" name="apellidos" value="-">
                            <input type="hidden" name="avatar" value="imagenDefault_usuario.png">
							<input type="hidden" name="nivelusuario" value="administrador">
                            <input type="submit" class="botonAzul bordesRedondos" value="Crear">
                        </form>
                    </td>
                </tr>
            </table><br /><br />
            <a href="../index.php" title="Terminar" class="botonNaranja bordesRedondos">Terminar</a>
        </td>
    </tr>
</table>
</div>
</body>
</html>