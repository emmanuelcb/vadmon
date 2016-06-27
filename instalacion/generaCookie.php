<?php
setcookie("servidor", "".$_POST["servidor"]."", time()+(3600 * 24)); // host
setcookie("baseDatos", "".$_POST["baseDatos"]."", time()+(3600 * 24)); // dbName
setcookie("usuarioBase", "".$_POST["usuarioBase"]."", time()+(3600 * 24)); // user
if($_POST["passBase"] <>''){
	setcookie("passBase", "".$_POST["passBase"]."", time()+(3600 * 24)); // pass
}else{
	setcookie("passBase", "ninguna", time()+(3600 * 24));
}
setcookie("charset", "".$_POST["charset"]."", time()+(3600 * 24));
setcookie("cotejamiento", "".$_POST["cotejamiento"]."", time()+(3600 * 24));
header("location: instalacion.php");
?>
