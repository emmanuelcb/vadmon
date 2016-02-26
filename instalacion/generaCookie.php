<?php
setcookie("servidor", "".$_POST["servidor"]."", time()+(3600 * 24));
setcookie("baseDatos", "".$_POST["baseDatos"]."", time()+(3600 * 24));
setcookie("usuarioBase", "".$_POST["usuarioBase"]."", time()+(3600 * 24));
if($_POST["passBase"] <>''){
	setcookie("passBase", "".$_POST["passBase"]."", time()+(3600 * 24));
}else{
	setcookie("passBase", "ninguna", time()+(3600 * 24));
}
setcookie("charset", "".$_POST["charset"]."", time()+(3600 * 24));
setcookie("cotejamiento", "".$_POST["cotejamiento"]."", time()+(3600 * 24));
header("location: instalacion.php");
?>