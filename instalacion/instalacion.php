<?php
$servidor = $_COOKIE['servidor'];
$baseDatos = $_COOKIE['baseDatos'];
$usuarioBase = $_COOKIE['usuarioBase'];
if($_COOKIE['passBase'] <> 'ninguna'){ $passBase = $_COOKIE['passBase']; }else{ $passBase = ''; }
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
            <span class="cNaranja">Cotejamiento:</span> <?php echo $cotejamiento?><br />
            <br />
            <a href="index.php" title="Cambiar" class="botonAzul bordesRedondos">Cambiar</a>
            <br /><br /><br />
            <h1>Instalación del sistema</h1> 
            Instale los siguientes componentes:            
            <table cellpadding="5" cellspacing="0" border="0" width="400">
                <tr>
                    <td width="150"><span class="cNaranja">Contenidos</span></td>
                    <td>
                    	<form action="instalaContenidos.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Noticias</span></td>
                    <td>
                    	<form action="instalaNoticias.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Artículos</span></td>
                    <td>
                    	<form action="instalaArticulos.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Promociones</span></td>
                    <td>
                    	<form action="instalaPromociones.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Banners</span></td>
                    <td>
                    	<form action="instalaBanners.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Usuarios</span></td>
                    <td>
                    	<form action="instalaUsuarios.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Configuración</span></td>
                    <td>
                    	<form action="instalaConfiguracion.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Preguntas</span></td>
                    <td>
                    	<form action="instalaPreguntas.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Encuestas</span></td>
                    <td>
                    	<form action="instalaEncuestas.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
				<tr>
                    <td width="150"><span class="cNaranja">Respuestas</span></td>
                    <td>
                    	<form action="instalaRespuestas.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Registro</span></td>
                    <td>
                    	<form action="instalaRegistro.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Diseño</span></td>
                    <td>
                    	<form action="instalaDiseno.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Permisos</span></td>
                    <td>
                    	<form action="instalaPermisos.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td width="150"><span class="cNaranja">Papelera</span></td>
                    <td>
                    	<form action="instalaPapelera.php" target="_blank">
                        	<input type="hidden" name="servidor" class="inputNormal" value="<?php echo $servidor?>">
                            <input type="hidden" name="baseDatos" class="inputNormal" value="<?php echo $baseDatos?>">
                            <input type="hidden" name="usuarioBase" class="inputNormal" value="<?php echo $usuarioBase?>">
                            <input type="hidden" name="passBase" class="inputNormal" value="<?php echo $passBase?>">
                            <input type="hidden" name="cotejamiento" class="inputNormal" value="<?php echo $cotejamiento?>">
                            <input type="submit" value="Instalar" class="botonAzul bordesRedondos">
                        </form>
                    </td>
                </tr>
            </table><br /><br />
            <a href="administracion.php" title="siguiente" class="botonNaranja bordesRedondos">Siguiente</a>
        </td>
    </tr>
</table>
</div>
</body>
</html>