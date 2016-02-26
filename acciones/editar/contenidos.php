<?php
$id=$_POST['id'];
$subcontenido=$_POST['subcontenido'];
$menucontenido=$_POST['menucontenido'];
$ordencontenido=$_POST['ordencontenido'];
$titulocontenido=$_POST['titulocontenido'];	
$textocontenido=$_POST['textocontenido'];
$imagen1contenido=$_POST['imagen1contenido'];
$imagen2contenido=$_POST['imagen2contenido'];
$imagen3contenido=$_POST['imagen3contenido'];
$modificador=$_POST['modificador'];
$fechamodificacion=$_POST['fechamodificacion'];
$keywordscontenido=$_POST['keywordscontenido'];
$descripcioncontenido=$_POST['descripcioncontenido'];
$activo=$_POST['activo'];

// Traemos el subcontenido actual
$subcontenidoActual = '';
$revisarSubcontenidoActual = @mysql_query("select id, menucontenido, subcontenido, activo from vadmon_contenidos where id=".$id." and activo=1");
if(mysql_num_rows($revisarSubcontenidoActual) > 0){
	while($celdaRevisarSubcontenidoActual = mysql_fetch_array($revisarSubcontenidoActual)){
		$subcontenidoActual = $celdaRevisarSubcontenidoActual["subcontenido"];
	}
}

//Revisamos si cambiaron el subcontenido y lo comparamos con los limites
if($subcontenidoActual <> $subcontenido){
	if($subcontenido == 0){
		$revisarNumContenidosEditar = mysql_query("select id, menucontenido, subcontenido, activo from vadmon_contenidos where subcontenido=0 and activo=1");
		if(mysql_num_rows($revisarNumContenidosEditar) <= $limiteContenidos ){
			mysql_query("UPDATE `".$db."`.`vadmon_contenidos` 
			SET `subcontenido` = '".$subcontenido."',
			`menucontenido` = '".$menucontenido."',
			`ordencontenido` = '".$ordencontenido."',
			`titulocontenido` = '".$titulocontenido."',
			`textocontenido` = '".$textocontenido."',
			`imagen1contenido` = '".$imagen1contenido."',
			`imagen2contenido` = '".$imagen2contenido."',
			`imagen3contenido` = '".$imagen3contenido."',
			`modificador` = '".$modificador."',
			`fechamodificacion` = '".$fechamodificacion."',
			`keywordscontenido` = '".$keywordscontenido."',
			`descripcioncontenido` = '".$descripcioncontenido."',
			`activo` = '".$activo."' WHERE `vadmon_contenidos`.`id` = '".$id."' LIMIT 1 ;");
			
			header("Location: ../inicio.php?idcontenido=contenidos&mensaje=correctoEditarContenido");
		}else{
			header("Location: ../inicio.php?idcontenido=contenidos&mensaje=errorEditarContenido");
		}
	}else{
		$revisarSubcontenidosVinculados = mysql_query("select id, menucontenido, subcontenido, activo from vadmon_contenidos where subcontenido=".$id." and activo=1");
		if(mysql_num_rows($revisarSubcontenidosVinculados)>0){
			header("Location: ../inicio.php?idcontenido=contenidos&mensaje=errorEditarContenidoSub");
		}else{
			mysql_query("UPDATE `".$db."`.`vadmon_contenidos` 
			SET `subcontenido` = '".$subcontenido."',
			`menucontenido` = '".$menucontenido."',
			`ordencontenido` = '".$ordencontenido."',
			`titulocontenido` = '".$titulocontenido."',
			`textocontenido` = '".$textocontenido."',
			`imagen1contenido` = '".$imagen1contenido."',
			`imagen2contenido` = '".$imagen2contenido."',
			`imagen3contenido` = '".$imagen3contenido."',
			`modificador` = '".$modificador."',
			`fechamodificacion` = '".$fechamodificacion."',
			`keywordscontenido` = '".$keywordscontenido."',
			`descripcioncontenido` = '".$descripcioncontenido."',
			`activo` = '".$activo."' WHERE `vadmon_contenidos`.`id` = '".$id."' LIMIT 1 ;");

			 header("Location: ../inicio.php?idcontenido=contenidos&mensaje=correctoEditarContenido");
		}
	}
}else{
	mysql_query("UPDATE `".$db."`.`vadmon_contenidos` 
	SET `subcontenido` = '".$subcontenido."',
	`menucontenido` = '".$menucontenido."',
	`ordencontenido` = '".$ordencontenido."',
	`titulocontenido` = '".$titulocontenido."',
	`textocontenido` = '".$textocontenido."',
	`imagen1contenido` = '".$imagen1contenido."',
	`imagen2contenido` = '".$imagen2contenido."',
	`imagen3contenido` = '".$imagen3contenido."',
	`modificador` = '".$modificador."',
	`fechamodificacion` = '".$fechamodificacion."',
	`keywordscontenido` = '".$keywordscontenido."',
	`descripcioncontenido` = '".$descripcioncontenido."',
	`activo` = '".$activo."' WHERE `vadmon_contenidos`.`id` = '".$id."' LIMIT 1 ;");

	 header("Location: ../inicio.php?idcontenido=contenidos&mensaje=correctoEditarContenido");
}
?>