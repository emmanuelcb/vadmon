<?php
include("../conexion.php");
$nombreUsuario = $_COOKIE['loggedin'];
$idUsuario = $_COOKIE['idUsuario'];
$nivelUsuario = $_COOKIE['nivelUsuario'];
if (!isset($_COOKIE['loggedin'])) {
	header("location:../index.php");
}else{
	/*if(isset($_GET["seccionSeleccionada"]) && !isset($_GET["accion"])){
		$edicionseleccionada=$_GET['seccionSeleccionada'];
		$id=$_GET["id"];
		if($id<>1 || $id<>2 || $id<>29 || $id<>30){
		mysql_query("delete from ".$edicionseleccionada." where id='".$id."' limit 1");
		header("Location: ../contenido.php?idcontenido=".$edicionseleccionada);
		}else{
			echo'No puedes eliminar esta seccion fija<br />';
			echo '<a href="../contenido.php?idcontenido=contenidos">Regresar</a>';
		}
	}else*/ if(isset($_GET["accion"]) && $_GET["accion"]=="eliminarUsuario"){
		$usuarioseleccionado=$_GET['idusuario'];
		mysql_query("delete from vadmon_usuarios where id='".$usuarioseleccionado."' limit 1");	
		header("Location: ../contenido.php?idperfil=lista");
	}else if(isset($_GET["accion"]) && isset($_GET["id"]) && isset($_GET["seccionSeleccionada"])){
		$id = $_GET["id"];
		$tablaSeleccionada = $_GET["seccionSeleccionada"];
		if($tablaSeleccionada=="contenidos"){
			/*if($id==1 || $id==2 || $id==35 || $id==36){
				echo'No puedes eliminar esta seccion fija<br />';
				echo'<a href="../contenido.php?idcontenido=contenidos">Regresar</a>';
			}else{*/
				mysql_query("delete from vadmon_".$tablaSeleccionada." where id='".$id."' limit 1");	
				header("Location: ../contenido.php?idcontenido=".$tablaSeleccionada."");
			//}
		}else{
			mysql_query("delete from vadmon_".$tablaSeleccionada." where id='".$id."' limit 1");	
			header("Location: ../inicio.php?idcontenido=".$tablaSeleccionada."");
		}
	}
}
?> 