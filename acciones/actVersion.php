<?php
include("../conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../css/estilos.css" type="text/css" rel="stylesheet"/>
<title>VADMON</title>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/funciones.js" type="text/javascript"></script>
<style type="text/css">
.tablaCentradaAct{ 
	position:absolute; 
	top:50%; left:50%;
	margin:-150px 0 0 -200px;
}
.tablaCentradaAct tr td{ 
	vertical-align:middle !important;
	text-align:center !important;
	width:400px;
	height:300px;
	display:table-cell;
 }
</style>
<script type="text/javascript">
</script>
</head>
<body onload="redimensionar();">
<div class="fdpagina" id="fdpagina">
<table cellpadding="0" cellspacing="0" border="0" class="tablaCentradaAct"><tr><td>
<img src="../imagenes/vemeweb_logo.png" alt="Vemeweb&reg;" /><br /><br />
<p style="font-size:12px; color:#999999;" id="txtEstado">
    Instalando parche <?php echo $_POST["versionAct"] ?>
</p>
</td></tr></table>
</div>
</body>
</html>
<?php
$versionActPost = $_POST["versionAct"];
$versionFinalPost = $versionActPost + 0.1;
include('actualizacion/act_'.$versionFinalPost.'.php');
?>