<?php
$id=$_POST['id'];
$tituloarticulo=$_POST['tituloarticulo']; 
$textoarticulo=$_POST['textoarticulo'];
$imagen1articulo=$_POST['imagen1articulo'];
$imagen2articulo=$_POST['imagen2articulo'];
$imagen3articulo=$_POST['imagen3articulo'];
$modificador=$_POST['modificador'];
$fechamodificacion=$_POST['fechamodificacion'];
$fechaarticulo=$_POST['fechaarticulo'];
$keywordsarticulo=$_POST['keywordsarticulo'];
$descripcionarticulo=$_POST['descripcionarticulo'];
$activo=$_POST['activo'];
mysql_query("UPDATE `".$db."`.`vadmon_articulos` 
SET `tituloarticulo` = '".$tituloarticulo."',
`imagen1articulo` = '".$imagen1articulo."',
`imagen2articulo` = '".$imagen2articulo."',
`imagen3articulo` = '".$imagen3articulo."',
`modificador` = '".$modificador."',
`fechamodificacion` = '".$fechamodificacion."',
`textoarticulo` = '".$textoarticulo."',
`fechaarticulo` = '".$fechaarticulo."',
`keywordsarticulo` = '".$keywordsarticulo."',
`descripcionarticulo` = '".$descripcionarticulo."',
`activo` = '".$activo."' WHERE `vadmon_articulos`.`id` = '".$id."' LIMIT 1 ;");

header("Location: ../inicio.php?idcontenido=articulos&mensaje=correctoEditarArticulo");
?>