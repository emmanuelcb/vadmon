<?php
$id=$_POST['id'];
$imagenbanner=$_POST['imagenbanner']; 
$urlbanner=$_POST['urlbanner'];
$titulobanner=$_POST['titulobanner'];
$textobanner=$_POST['textobanner'];
$tipobanner=$_POST['tipobanner'];
$modificador=$_POST['modificador'];
$fechamodificacion=$_POST['fechamodificacion'];
$activo=$_POST['activo'];
mysql_query("UPDATE `".$db."`.`vadmon_banners` 
SET `imagenbanner` = '".$imagenbanner."',
`urlbanner` = '".$urlbanner."',
`titulobanner` = '".$titulobanner."',
`textobanner` = '".$textobanner."',
`tipobanner` = '".$tipobanner."',
`modificador` = '".$modificador."',
`fechamodificacion` = '".$fechamodificacion."',
`activo` = '".$activo."' WHERE `vadmon_banners`.`id` = '".$id."' LIMIT 1 ;");

header("Location: ../inicio.php?idcontenido=banners&mensaje=correctoEditarBanner");
?>