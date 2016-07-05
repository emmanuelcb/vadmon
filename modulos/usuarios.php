<?php
/*//////////////
	USUARIOS
//////////////*/
// Si la pagina actual trae idperfil
if(isset($_GET["idperfil"]))
{
	if($_GET["idperfil"]<>"lista")
	{
      	include("secciones/usuariosPerfil.php");
	}
	// Si la pagina actual es idperfil = lista
	if($_GET["idperfil"]=="lista")
	{
      	include("secciones/usuariosLista.php");
	}
}

/* //////////////////////////////
		REGISTRA USUARIOS
////////////////////////////// */
if(isset($_GET["accion"]))
{
	if($_GET["accion"]=="registraUsuario")
	{
		include("secciones/usuariosRegistro.php");
	}
}

/* //////////////////////////////
		EDITAR USUARIOS
////////////////////////////// */
if(isset($_GET["accion"]) && isset($_GET["idusuario"]))
{
	if($_GET["accion"]=="editarUsuario")
	{
		include("secciones/usuariosEditar.php");
	}
}
?>
