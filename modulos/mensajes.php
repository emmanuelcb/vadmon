<?php
/* //////////////////////
	MOSTRAR MENSAJES
////////////////////// */
if(isset($_GET["mensaje"])){
	// ERROR USUARIO
	if($_GET["mensaje"]=="errorUsuario"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgErrorID bordesRedondos" id="mensaje">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%"><tr><td>
			<span class="textomsgErrorID">El usuario o password <strong>'.$_GET['nombreUsuario'].'</strong> no existe.</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonIDRojo bordesRedondos">Prueba nuevamente</a>
			</td></tr></table></div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	// CORRECTO USUARIO
	else if($_GET["mensaje"]=="actualizacion"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
			document.actualiza.submit();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgDatosID bordesRedondos" style="text-align:center;" id="mensaje">
			<span style="font-size:24px; line-height:22px; font-weight:bold;">Actualizacion necesaria</span><br /><br />
			Necesitas actualizar tu sistema para su correcto funcionamiento<br /><br/>
			<form name="actualiza" action="acciones/actVersion.php" method="post">
			<input type="hidden" name="versionAct" value="'.$_GET["version"].'" />
			<input type="hidden" name="versionFinal" value="'.$version_vadmon.'" />
			<a onClick="ocultarMensaje();" class="botonIDVerde bordesRedondos">Actualizar</a></form>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//SIN PERMISO
	else if($_GET["mensaje"]=="sinPermiso"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Disculpe</span><br />
			<br />Usted no cuenta con los permisos suficientes para poder visualizar esta secci&oacute;n<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ERROR CONTENIDO
	else if($_GET["mensaje"]=="errorContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenidos Principales Llenos</span><br />
			<br />No se pudo agregar el registro<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO CONTENIDO
	else if($_GET["mensaje"]=="correctoContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Contenido Agregado<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	// DESACTIVAR CONTENIDO
	else if($_GET["mensaje"]=="desactivarContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenido Desactivado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ACTIVAR CONTENIDO
	else if($_GET["mensaje"]=="activarContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenido Activado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//DESBLOQUEAR CONTENIDO
	else if($_GET["mensaje"]=="desbloquearContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenido Desbloqueado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//BLOQUEAR CONTENIDO
	else if($_GET["mensaje"]=="bloquearContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenido Bloqueado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ERROR EDITAR CONTENIDO
	else if($_GET["mensaje"]=="errorEditarContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenidos Principales Llenos</span><br />
			<br />No se pudo editar el registro<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ERROR EDITAR CONTENIDO CON SUBCONTENIDOS VINCULADOS
	else if($_GET["mensaje"]=="errorEditarContenidoSub"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Contenido con Subcontenidos</span><br />
			<br />No se pudo editar el registro porque tiene subcontenidos v&iacute;nculados<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO EDITAR CONTENIDO
	else if($_GET["mensaje"]=="correctoEditarContenido"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Contenido Editado<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO NOTICIA
	else if($_GET["mensaje"]=="correctoNoticia"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Noticia Agregada<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	// DESACTIVAR NOTICIA
	else if($_GET["mensaje"]=="desactivarNoticia"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Noticia Desactivada</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ACTIVAR NOTICIA
	else if($_GET["mensaje"]=="activarNoticia"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Noticia Activada</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//DESBLOQUEAR NOTICIA
	else if($_GET["mensaje"]=="desbloquearNoticia"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Noticia Desbloqueada</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//BLOQUEAR NOTICIA
	else if($_GET["mensaje"]=="bloquearNoticia"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Noticia Bloqueada</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO EDITAR NOTICIA
	else if($_GET["mensaje"]=="correctoEditarNoticia"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Noticia Editada<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO ARTICULO
	else if($_GET["mensaje"]=="correctoArticulo"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Art&iacute;culo Agregado<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	// DESACTIVAR ARTICULO
	else if($_GET["mensaje"]=="desactivarArticulo"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Art&iacute;culo Desactivado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ACTIVAR ARTICULO
	else if($_GET["mensaje"]=="activarArticulo"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Art&iacute;culo Activado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//DESBLOQUEAR ARTICULO
	else if($_GET["mensaje"]=="desbloquearArticulo"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Art&iacute;culo Desbloqueado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//BLOQUEAR ARTICULO
	else if($_GET["mensaje"]=="bloquearArticulo"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Art&iacute;culo Bloqueado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO EDITAR ARTICULO
	else if($_GET["mensaje"]=="correctoEditarArticulo"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Art&iacute;culo Editado<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO PROMOCION
	else if($_GET["mensaje"]=="correctoPromocion"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Promoci&oacute;n Agregada<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	// DESACTIVAR PROMOCION
	else if($_GET["mensaje"]=="desactivarPromocion"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Promoci&oacute;n Desactivada</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ACTIVAR PROMOCION
	else if($_GET["mensaje"]=="activarPromocion"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Promoci&oacute;n Activada</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO EDITAR PROMOCION
	else if($_GET["mensaje"]=="correctoEditarPromocion"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Promoci&oacute;n Editada<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO BANNER
	else if($_GET["mensaje"]=="correctoBanner"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Banner Agregado<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	// DESACTIVAR BANNER
	else if($_GET["mensaje"]=="desactivarBanner"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Banner Desactivado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ACTIVAR BANNER
	else if($_GET["mensaje"]=="activarBanner"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Banner Activado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//DESBLOQUEAR BANNER
	else if($_GET["mensaje"]=="desbloquearBanner"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Banner Desbloqueado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//BLOQUEAR BANNER
	else if($_GET["mensaje"]=="bloquearBanner"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgInfo bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Banner Bloqueado</span><br /><br />
			<a onClick="ocultarMensaje();" class="botonNaranja bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO EDITAR BANNER
	else if($_GET["mensaje"]=="correctoEditarBanner"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Banner Editado<br /> Correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO IMAGEN CARGADA
	else if($_GET["mensaje"]=="correctoImagen"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Listo!!</span><br />
			<br />Archivo subido<br/> correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ERROR IMAGEN NO SUBIDA
	else if($_GET["mensaje"]=="errorImagen1"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Error con Servidor</span><br />
			<br />No se pudo conectar con el servidor<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ERROR IMAGEN FORMATO INVALIDO
	else if($_GET["mensaje"]=="errorImagen2"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Formato Invalido</span><br />
			<br />Sólo se permiten imágenes en formato<br/> .png, .jpg y .gif<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//ERROR IMAGEN TAMAÑO SUPERIOR AL PERMITIDO
	else if($_GET["mensaje"]=="errorImagen3"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgError bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Tama&ntilde;o No Permitido</span><br />
			<br />Imagen superior a lo permitido<br/> cambie el tama&ntilde; y vuelva a intentarlo<br /><br />
			<a onClick="ocultarMensaje();" class="botonRojo bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
	//CORRECTO ELIMINAR CONTENIDO
	else if($_GET["mensaje"]=="correctoEliminar"){
		$javascriptExtra.='
		function ocultarMensaje(){
			$("#contenedorMensajes").hide();
			$("#mensaje").hide();
		}';
		// Contenedor Mensaje
		$elementosVolatiles.='<div id="contenedorMensajes" class="contenedorMensajes">';
		// Mensaje y Estilo
		$elementosVolatiles.='<div class="msgNormal bordesRedondos" id="mensaje">
			<span style="font-size:24px; line-height:22px;">Secci&oacute;n eliminada</span><br />
			<br />La secci&oacute;n fue eliminada correctamente<br /><br />
			<a onClick="ocultarMensaje();" class="botonVerde bordesRedondos">&nbsp&nbspOK&nbsp&nbsp</a>
			</div>';
		// Cerramos el contenedor
		$elementosVolatiles.='</div>';
	}
}
?>
