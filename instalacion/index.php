<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../css/estilos.css" type="text/css" rel="stylesheet"/>
<title>&copy;Veme | Administrador de Contenidos</title>
<script type="text/javascript" src="../js/funciones.js"></script>
</head>
<body>
<div class="contenedorPagina">
<table cellpadding="10" cellspacing="0" border="0" style="margin:50px 0 0 0; width:100%;">
	<tr>
		<td width="50%">
        	<img src="../imagenes/logotipo_inicio.png" alt="&copy;Veme 2011" title="&copy;Veme 2011"/>
        </td>
        <td width="50%">
            <h1>Instalación del sistema</h1>
            Específique los siguientes datos:           
            <form action="generaCookie.php" method="post">
                <table cellpadding="5" cellspacing="0" border="0" width="400">
                	<tr>
                    	<td width="150"><span class="cNaranja">Servidor:</span></td><td><input type="text" name="servidor" class="inputNormal"><br /></td>
                    </tr>
                    <tr>
                    	<td width="150"><span class="cNaranja">Base de datos:</span></td><td><input type="text" name="baseDatos" class="inputNormal"><br /></td>
                    </tr>
                    <tr>
                    	<td width="150"><span class="cNaranja">Usuario:</span></td><td><input type="text" name="usuarioBase" class="inputNormal"><br /></td>
                    </tr>
                    <tr>
                        <td width="150"><span class="cNaranja">Contraseña:</span></td><td><input type="text" name="passBase" class="inputNormal"><br /></td>
                    </tr>
                    <tr>
                        <td width="150"><span class="cNaranja">Charset:</span></td>
                        <td>
                          <select name="charset" class="inputNormal">
                          	<option value="utf8">utf8</option>
                          	<option value="latin1">latin1</option>
                          	<option value="ASCII">ASCII</option>
                          </select><br />
                        </td>
                    </tr>
                    <tr>
                        <td width="150"><span class="cNaranja">Cotejamiento:</span></td>
                        <td>
                          <select name="cotejamiento" class="inputNormal">
                          	<option value="utf8_unicode_ci">utf8_unicode_ci</option>
                          	<option value="latin1_general_cs">latin1_general_cs</option>
                          	<option value="ascii_general_ci">ascii_general_ci</option>
                          	<option value="utf8_bin">utf8_bin</option>
                          	<option value="latin1_bin">latin1_bin</option>
                          	<option value="ascii_bin">ascii_bin</option>
                          </select><br />
                        </td>
                    </tr>
                	<tr>
                    	<td></td>
                        <td><input type="submit" value="Siguiente" class="botonNaranja bordesRedondos"></td>
                </table>
            </form>
        </td>
    </tr>
</table>
</div>
</body>
</html>
