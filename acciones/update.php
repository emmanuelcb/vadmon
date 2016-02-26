<?php
include("../conexion.php");

$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
	if(!isset($_GET["actualizarUsuario"])){
		@mysql_query("UPDATE $tableusers SET nombre = '".$_POST['nombre']."'
		WHERE nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET apellidos = '".$_POST['apellidos']."'
		WHERE nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET email = '".$_POST['email']."'
		WHERE nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET password = '".$_POST['newpass']."'
		WHERE password = '".$_POST['oldpass']."'and nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET website = '".$_POST['website']."'
		WHERE nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET avatar = '".$_POST['avatar']."'
		WHERE nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET nivelusuario = '".$_POST['nivelusuario']."'
		WHERE nick = '$nombreUsuario'");
		
		@mysql_query("UPDATE $tableusers SET activo = '".$_POST['activo']."'
		WHERE nick = '$nombreUsuario'");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../css/estilos.css" type="text/css" rel="stylesheet"/>
<title>&copy;Veme | Administrador de Contenidos</title>
<script type="text/javascript" src="../js/funciones.js"></script>
<style type="text/css">
<?=$cssExtra?>
</style>
<script type="text/javascript">
<?=$javascriptExtra?>
</script>
</head>
<body <?=$bodyExtra?>>
<div class="contenedorPagina">
<div class="msgInfoPE">
Se ha modificado correctamente tu perfil <?=$nombreUsuario?>.<br /><br />
<small><strong>Nota:</strong> Si escribiste mal tu password pasado, el nuevo password no cambiará.</small>
<br /><br />
<a href="../contenido.php?idperfil=<?=$idUsuario?>" class="botonIDInfoPE bordesRedondos">Regresar a tu perfil</a>
</div>
</div>
</body>
</html>
<? 
	}else{
		@mysql_query("UPDATE $tableusers SET nombre = '".$_POST['nombre']."'
		WHERE nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET apellidos = '".$_POST['apellidos']."'
		WHERE nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET email = '".$_POST['email']."'
		WHERE nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET password = '".$_POST['newpass']."'
		WHERE password = '".$_POST['oldpass']."'and nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET website = '".$_POST['website']."'
		WHERE nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET avatar = '".$_POST['avatar']."'
		WHERE nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET nivelusuario = '".$_POST['nivelusuario']."'
		WHERE nick = '".$_POST['nick']."'");
		
		@mysql_query("UPDATE $tableusers SET activo = '".$_POST['activo']."'
		WHERE nick = '".$_POST['nick']."'");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../css/estilos.css" type="text/css" rel="stylesheet"/>
<title>&copy;Veme | Administrador de Contenidos</title>
<script type="text/javascript" src="../js/funciones.js"></script>
<style type="text/css">
<?=$cssExtra?>
</style>
<script type="text/javascript">
<?=$javascriptExtra?>
</script>
</head>
<body <?=$bodyExtra?>>
<div class="contenedorPagina">
<div class="msgInfoPE">
Se ha modificado correctamente tu perfil <?=$_POST['nick']?>.<br /><br />
<small><strong>Nota:</strong> Si escribiste mal tu password pasado, el nuevo password no cambiará.</small>
<br /><br />
<a href="../contenido.php?idperfil=lista" class="botonIDInfoPE bordesRedondos">Regresar</a>
</div>
</div>
</body>
</html>
<? 
	}
}
?>