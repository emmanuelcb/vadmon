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
<?php echo $cssExtra?>
</style>
<script type="text/javascript">
<?php echo $javascriptExtra?>
</script>
</head>
<body <?php echo $bodyExtra?>>
<div class="contenedorPagina">

<?php
$nombreUsuario = $_POST['nombreUsuario'];

include "../conexion.php";
$result = mysql_db_query($db, "select * from $tableusers WHERE nick = '$nombreUsuario'") or die (mysql_error()); 

   while ($row = mysql_fetch_array($result)) { 
     // echo "$row[email]";
	 // echo "$row[password]";
	  
$sendto = $row["email"];

$mymail = "$sendto";
$cc = 'Recordatorio de Password';
$FrOm = "$sendto";
$BoDy = '';
$BoDy .= "Estimado ";
$BoDy .= $_POST['nombreUsuario'];
$BoDy .= "\n";
$BoDy .= "\n";
$BoDy .= "Usted ha olvidado su contraseña";
$BoDy .= "\n";
$BoDy .= 'Una petición fue enviada para reenviarle su contraseña a esta dirección, si usted no realizó esta petición por favor reportelo a su administrador del sitio';
$BoDy .= "\n";
$BoDy .= "\n";
$BoDy .= 'Tu contraseña es:';
$BoDy .= "\n";
$BoDy .= $row["password"];
$BoDy .= "\n";

$send = mail("$mymail", "$cc", "$BoDy", "From: $FrOm");
if($send)
{?>
<div class="msgInfoFP">
Un correo electrónico ha sido enviado correctamente a tu correo con tu contraseña olvidada,<br /><br />
<small><strong>NOTA:</strong> Puede que el correo demore una hora en llegar</small>
<br /><br />
<a href="../index.php" class="botonIDInfo bordesRedondos">Regresar</a>
</div>
<?php }
	  
   }
?>
</div>
</body>
</html>
