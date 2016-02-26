<?php
include("../conexion.php");

$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
	// Revisamos si el usuario ya existe
	$consulta = "select id from $tableusers where nick = '".$_POST['nombreUsuario']."';"; 
	$resultA = mysql_query($consulta)
	or die ("Could not match data because ".mysql_error());
	$num_rows = mysql_num_rows($resultA);
	if ($num_rows != 0) { ?>
    
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
<div class="msgErrorUs">
<br /><span class="textomsgErrorUs">Lo sentimos, el nick de usuario <b><?=$_POST['nombreUsuario']?></b> ya existe<br /><br /></span>
<a href="../contenido.php?accion=registraUsuario" class="botonUsRojo bordesRedondos">Intentalo nuevamente</a>
</div>
</div>
</body>
</html>

<?  exit; 
	} else {
	// Insertamos la informacion
	$insert = mysql_query("insert into $tableusers values ('NULL', '".$_POST['nombreUsuario']."', '".$_POST['password']."', '".$_POST['nombre']."', '".$_POST['apellidos']."', '".$_POST['email']."', '".$_POST['website']."', '".$_POST['avatar']."', '".$_POST['nivelusuario']."', '1')")
	or die("Could not insert data because ".mysql_error());?>

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
<div class="msgInfoUs">
Tu cuenta de usuario ha sido creada<br />
puedes accesar a ella<br /><br />
<a href="../logout.php" class="botonIDInfoUs bordesRedondos">cerrando sesión</a><br /><br />
o<br /><br />
<a href="../contenido.php" class="botonIDInfoUs bordesRedondos">Regresa a tu administrador</a>
</div>
</div>
</body>
</html>
<?  }
}
?>