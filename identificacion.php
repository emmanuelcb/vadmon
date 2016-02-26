<?php
$javascriptExtra.='
function validarDatos() {
	if (isEmpty("username")) {
		alert("Please fill your username.");
		setFocus("username");
		return false;
	}
	if (isEmpty("password")) {
		alert("Please fill in your password.");
		setFocus("password");
		return false;
	}
	return true;
}';
?>
<center><a href="planlogout.php" title=""><img src="imagenes/btnCerrarSesion.png" alt="Cerrar Sesion"/></a></center>
<div class="lineaSeparacion"></div>
<p><strong>Inicia Sesi&oacute;n</strong></p>
<form action="comprueba.php" method="post" onSubmit="return validarDatos()">
<span style="font-size:11px; color:#666666;">Nombre de Usuario(nick):</span><br/>
<input type="text" name="usuario" style="width:250px; padding:5px;"><br /><br/>
<span style="font-size:11px; color:#666666;">Contrase&ntilde;a:</span><br/>
<input type="password" name="contrasenia" style="width:250px; padding:5px;"><br />
<input type="submit" value="Iniciar sesi&oacute;n">
</form>
<div class="lineaSeparacion"></div>
<form action="acciones/forgotpass.php" method="post">
<p><strong>&iquest;Olvidaste tu contrase&ntilde;a?</strong></p>
<span style="font-size:11px; color:#666666;">Nombre de Usuario(nick):</span>
<input type="text" name="nombreUsuario" style="width:250px; padding:5px;">
<input type="submit" value="Enviar">
</form>
