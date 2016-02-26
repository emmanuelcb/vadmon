<?php
$servidorImg = $HostDominio;
if($servidorImg == "localhost"){ $servidorImg = 'vemeweb.com'; }
if($stmtContenidos = $conexion->prepare("SELECT id, imagen1contenido, subcontenido, menucontenido, fijo, activo, titulocontenido, ordencontenido, textocontenido, fechamodificacion, modificador FROM vadmon_contenidos WHERE subcontenido=0 ORDER BY ordencontenido")){
	$stmtContenidos->execute();
	$stmtContenidos->store_result();
	$stmtContenidos->bind_result($id_rslt, $imagen1contenido_rslt, $subcontenido_rslt, $menucontenido_rslt, $fijo_rslt, $activo_rslt, $titulocontenido_rslt, $ordencontenido_rslt, $textocontenido_rslt, $fechamodificacion_rslt, $modificador_rslt);
	if($stmtContenidos->num_rows > 0){
		$jsUrlExtra.='<script src="js/jquery-1.6.2.js" type="text/javascript"></script>';
		$javascriptExtra.='
			function abreDialogo(valor){
				$("#dialog").load(valor);
				$("#dialog").fadeIn();
				$("#btnCerrarDialog").fadeIn();
			}
			function cerrarDialogo(){
				$("#dialog").fadeOut();
				$("#dialog").empty();
				$("#btnCerrarDialog").fadeOut();
			}
			function confirmaDialogo(valor){
				$("#dialogConfirm").fadeIn();
				//$("#dialogConfirm").innerHTML="";
				//$("#dialogConfirm").innerHTML="¿Seguro que desea eliminar este contenido?<br /><a href=\'"+valor+"\' class=\'botonRojo bordesRedondos\'>eliminar</a>";
				//$("#dialogConfirm").load(valor);
			}
			function cerrarConfirmacion(){
				$("#dialogConfirm").fadeOut();
				$("#dialogConfirm").empty();
				$("#btnCerrarConfirmacion").fadeOut();
			}';
		// Div para abrir confirmación con .dialog
		$elementosVolatiles.='<a onclick="cerrarConfirmacion();" title="Cerrar la ventana" id="btnCerrarConfirmacion" class="botonCerrarConfirmacion" style="display:none;"></a>';
		$elementosVolatiles.='<div id="dialogConfirm" title="" class="dialogoConfirmar" style="display:none;"></div>';
		// Div para abrir editar con .dialog				
		$elementosVolatiles.='<a onclick="cerrarDialogo();" title="Cerrar" id="btnCerrarDialog" class="botonCerrarDialogo" style="display:none;"></a>';
		$elementosVolatiles.='<div id="dialog" title="" class="dialogo" style="display:none;"></div>';
		
		$mostrarContenido.='<div class="encabezadoSeccion">';
		$mostrarContenido.='<span class="tituloSeccion">Contenidos</span><br/>';
		
		if($stmtConfiguracion = $conexion->prepare("SELECT herramienta, campo1, campo2, activo FROM vadmon_configuracion WHERE herramienta='limitecontenidos'")){
			$stmtConfiguracion->execute();
			$stmtConfiguracion->store_result();
			$stmtConfiguracion->bind_result($herramienta_rslt, $campo1_rslt, $campo2_rslt, $activo_rslt);
			while($stmtConfiguracion->fetch()){
				$numLimiteContenidos = $campo1_rslt;
			}
		}
		if($stmtContenidosB = $conexion->prepare("SELECT id, menucontenido, subcontenido, activo FROM vadmon_contenidos WHERE subcontenido=0")){
			$stmtContenidosB->execute();
			$stmtContenidosB->store_result();
			$actualContenidosB = $stmtContenidosB->num_rows;
			$contenidosDisponibles = $numLimiteContenidos - $actualContenidos;
		}
		$mostrarContenido.='<span class="infoSeccion">'.$actualContenidosB.' contenidos principales / '.$contenidosDisponibles.' disponibles</span></div>';
		if($pcrear==1){
			$mostrarContenido.='<a href="inicio.php?accion=agregarContenido&tablaseleccion='.$seccionSeleccionada.'" title="agregar" class="btnNuevo">Agregar Nuevo Contenido</a><br/><br/><br/>';
		}
		$mostrarContenido.='<div class="contenedorRegistros">';
		// Imprimimos los contenidos
		while($stmtContenidos->fetch()){
			//Revisamos que el contenido no este en la PAPELERA
			if($stmtPapelera = $conexion->query("SELECT seleccion FROM vadmon_papelera WHERE seleccion=".$id_rslt)){
				if($stmtPapelera->num_rows == 0){
					//Limpiamos variables
					$textoContenido='';
					//Mostramos encabezado
					$mostrarContenido.='<div class="divRegistro contenidoNivel0">';
					$mostrarContenido.='<table cellpadding="0" cellspacing="0" border="0"><tr>';
					$mostrarContenido.='<td class="tdImagen">';
					if($imagen1contenido_rslt<>''){
						$mostrarContenido.='<div class="ImgImagen"><img src="http://'.$HostDominio.'/recursos/contenidos/'.$imagen1contenido_rslt.'" alt="" width="320"/></div>';
					}else{
						$mostrarContenido.='<div class="ImgImagen"><img src="imagenes/sinimagen.jpg" alt="" width="320"/></div>';	
					}
					$mostrarContenido.='<div class="divImagen">';
					$mostrarContenido.='<div class="opcionesOcultas" id="btnOpciones'.$id_rslt.'" onclick="mostrarOpciones(\'opciones'.$id_rslt.'\')"></div>';
					$mostrarContenido.='<div class="opcionesRegistro" id="opciones'.$id_rslt.'">';
					if($peditar==1){
						$mostrarContenido.='<a href="inicio.php?accion=editarContenido&idcontenido='.$id_rslt;
						if($subcontenido_rslt<>0){
							if($stmtEsSubcontenido = $conexion->query("SELECT id, menucontenido, FROM vadmon_contenidos WHERE id=".$subcontenido_rslt)){
								while($objA = $stmtEsSubcontenido->fetch_object()){
									$mostrarContenido.='&menucontenido='.$objA->menucontenido.'&tabla='.$seccionSeleccionada.'" ';
								}
							}		
						}else{
							$mostrarContenido.='&menucontenido=normal&tabla='.$seccionSeleccionada.'" ';
						}
						$mostrarContenido.='title="Editar" class="btnEditar"></a>';
					}else{
						$mostrarContenido.='<a title="Editar" class="btnEditar btnDeshabilitado"></a>';
					}
					if($_COOKIE['loggedin'] == "vemeweb"){
						$bloqueado = '';
						if($fijo_rslt==1){
							$bloqueado = '<a href="acciones/desbloquear.php?id='.$id_rslt.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Desbloquear" class="btnDesbloquear"></a>';
						}
						$desbloqueado = '';
						if($fijo_rslt==0){ 
							$desbloqueado = '<a href="acciones/bloquear.php?id='.$id_rslt.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Bloquear" class="btnBloquear"></a>';
						}
						$mostrarContenido.=$bloqueado.$desbloqueado;
					}else{
						$bloqueado = '';
						if($fijo_rslt==1){
							$bloqueado = '<a title="Desbloquear" class="btnDesbloquear btnDeshabilitado"></a>';
						}
						$desbloqueado = '';
						if($fijo_rslt==0){ $desbloqueado = '<a title="Bloquear" class="btnBloquear btnDeshabilitado"></a>'; }
						$mostrarContenido.=$bloqueado.$desbloqueado;
					}
					if($fijo_rslt==0){
						$activado = '';
						if($activo_rslt==1){
							$activado = '<a href="acciones/desactivar.php?id='.$id_rslt.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Desactivar" class="btnDesactivar"></a>';
						}
						$desactivado = '';
						if($activo_rslt==0){
							$desactivado = '<a href="acciones/activar.php?id='.$id_rslt.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Activar" class="btnActivar"></a>';
						}
						$mostrarContenido.=$activado.$desactivado;
						if($peliminar==1){
							$mostrarContenido.='<a href="acciones/papelera.php?id='.$id_rslt.'&tabla='.$seccionSeleccionada.'" title="Eliminar" class="btnBorrar"></a>';
						}else{
							$mostrarContenido.='<a title="Eliminar" class="btnBorrar btnDeshabilitado"></a>';
						}
					}else{
						$activado = '';
						if($activo_rslt==1){
							$activado = '<a title="Desactivar" class="btnDesactivar btnDeshabilitado"></a>';
						}
						$desactivado = '';
						if($activo_rslt==0){
							$desactivado = '<a title="Activar" class="btnActivar btnDeshabilitado"></a>';
						}
						$mostrarContenido.=$activado.$desactivado;
						$mostrarContenido.='<a title="Eliminar" class="btnBorrar btnDeshabilitado"></a>';
					}
					$mostrarContenido.='<a onclick="mostrarOpciones(\'ninguno\')" class="btnOcultar"></a></div>';
					$mostrarContenido.='<img src="imagenes/sombraTitular.png" alt="" class="sombraTitular"/>';
					$mostrarContenido.='<div class="titularesRegistro"><span class="tituloRegistro">'.$id_rslt.' |  ' .$titulocontenido_rslt.'</span><br/>';
					$mostrarContenido.='<span class="nivelRegistro">Contenido principal</span></div>';
					$mostrarContenido.='<div class="ordenRegistro">'.$ordencontenido_rslt.'</div>';
					if($textocontenido_rslt<>""){
						$subString=$textocontenido_rslt;
						$textoContenido=substr($subString, 0, 200);
					}
					$mostrarContenido.='</div></td></tr><td class="tdTexto">'.$textoContenido.'</td></tr>';
					$mostrarContenido.='<tr><td class="tdInfoModificacion">Editado el <b>'.$fechamodificacion_rslt.'</b> por <b>'.$modificador_rslt.'</b></td></tr></table></div>';
					// SUBCONTENIDOS DE CONTENIDO
					if($stmtEsSubcontenido = $conexion->query("SELECT id, imagen1contenido, subcontenido, menucontenido, fijo, activo, titulocontenido, ordencontenido, textocontenido, fechamodificacion, modificador FROM vadmon_contenidos WHERE subcontenido=".$id_rslt." ORDER BY ordencontenido")){
						while($objA = $stmtEsSubcontenido->fetch_object()){
							//Revisamos que el subcontenido no este en la PAPELERA
							if($stmtPapeleraA = $conexion->query("SELECT * FROM vadmon_papelera WHERE seleccion=".$objA->id)){
								if($stmtPapeleraA->num_rows == 0){
									//Imprimimos subcontenidos
									$mostrarContenido.='<div class="divRegistro contenidoNivel1">';
									$mostrarContenido.='<table cellpadding="0" cellspacing="0" border="0"><tr>';
									$mostrarContenido.='<td class="tdImagen">';
									if($objA->imagen1contenido<>''){
										$mostrarContenido.='<div class="ImgImagen"><img src="http://'.$HostDominio.'/recursos/contenidos/'.$objA->imagen1contenido.'" alt="" width="320"/></div>';
									}else{
										$mostrarContenido.='<div class="ImgImagen"><img src="imagenes/sinimagen.jpg" alt="" width="320"/></div>';	
									}
									$mostrarContenido.='<div class="divImagen">';
									$mostrarContenido.='<div class="opcionesOcultas" id="btnOpciones'.$objA->id.'" onclick="mostrarOpciones(\'opciones'.$objA->id.'\')"></div>';
									$mostrarContenido.='<div class="opcionesRegistro" id="opciones'.$objA->id.'">';
									if($peditar==1){
										$mostrarContenido.='<a href="inicio.php?accion=editarContenido&idcontenido='.$objA->id;
										if($objA->subcontenido<>0){
											if($stmtEsSubsubcontenido = $conexion->query("SELECT id, menucontenido FROM vadmon_contenidos WHERE id=".$objA->subcontenido)){
												while($objB = $stmtEsSubsubcontenido->fetch_object()){
													$mostrarContenido.='&menucontenido='.$objB->menucontenido.'&tabla='.$seccionSeleccionada.'" ';
												}
											}		
										}else{
											$mostrarContenido.='&menucontenido=normal&tabla='.$seccionSeleccionada.'" ';
										}
										$mostrarContenido.='title="Editar" class="btnEditar"></a>';
									}else{
										$mostrarContenido.='<a title="Editar" class="btnEditar btnDeshabilitado"></a>';
									}
									if($_COOKIE['loggedin'] == "vemeweb"){
										$bloqueado = '';
										if($objA->fijo==1){
											$bloqueado = '<a href="acciones/desbloquear.php?id='.$objA->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Desbloquear" class="btnDesbloquear"></a>';
										}
										$desbloqueado = '';
										if($objA->fijo==0){
											$desbloqueado = '<a href="acciones/bloquear.php?id='.$objA->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Bloquear" class="btnBloquear"></a>'; 				
										}
										$mostrarContenido.=$bloqueado.$desbloqueado;
									}else{
										$bloqueado = '';
										if($objA->fijo==1){
											$bloqueado = '<a title="Desbloquear" class="btnDesbloquear btnDeshabilitado"></a>';
										}
										$desbloqueado = '';
										if($objA->fijo==0){
											$desbloqueado = '<a title="Bloquear" class="btnBloquear btnDeshabilitado"></a>';
										}
										$mostrarContenido.=$bloqueado.$desbloqueado;
									}
									if($objA->fijo==0){
										$activado = '';
										if($objA->activo==1){
											$activado = '<a href="acciones/desactivar.php?id='.$objA->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Desactivar" class="btnDesactivar"></a>';
										}
										$desactivado = '';
										if($objA->activo==0){
											$desactivado = '<a href="acciones/activar.php?id='.$objA->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Activar" class="btnActivar"></a>';
										}
										$mostrarContenido.=$activado.$desactivado;
										if($peliminar==1){
											$mostrarContenido.='<a href="acciones/papelera.php?id='.$objA->id.'&tabla='.$seccionSeleccionada.'" title="Eliminar" class="btnBorrar"></a>';
										}else{
											$mostrarContenido.='<a title="Eliminar" class="btnBorrar btnDeshabilitado"></a>';
										}
									}else{
										$activado = '';
										if($objA->activo==1){
											$activado = '<a title="Desactivar" class="btnDesactivar btnDeshabilitado"></a>';
										}
										$desactivado = '';
										if($objA->activo==0){
											$desactivado = '<a title="Activar" class="btnActivar btnDeshabilitado"></a>';
										}
										$mostrarContenido.=$activado.$desactivado;
										$mostrarContenido.='<a title="Eliminar" class="btnBorrar btnDeshabilitado"></a>';
									}
									$mostrarContenido.='<a onclick="mostrarOpciones(\'ninguno\')" class="btnOcultar"></a></div>';
									$mostrarContenido.='<img src="imagenes/sombraTitular.png" alt="" class="sombraTitular"/>';
									$mostrarContenido.='<div class="titularesRegistro"><span class="tituloRegistro">'.$objA->titulocontenido.'</span><br/>';
									$mostrarContenido.='<span class="nivelRegistro">Subcontenido de "'.$titulocontenido_rslt.'"</span></div>';
									$mostrarContenido.='<div class="ordenRegistro">'.$objA->ordencontenido.'</div>';
									if($imagen1contenido_rslt<>''){
										$mostrarContenido.='<div class="registroPadre"><img src="http://'.$HostDominio.'/recursos/contenidos/'.$imagen1contenido_rslt.'" alt=""/></div>';
									}else{
										$mostrarContenido.='<div class="registroPadre"><img src="imagenes/sinimagen.jpg" alt=""/></div>';
									}
									if($objA->textocontenido<>""){
										$subString=$objA->textocontenido;
										$textoContenido=substr($subString, 0, 200);
									}
									$mostrarContenido.='</div></td></tr><td class="tdTexto">'.$textoContenido.'</td></tr>';
									$mostrarContenido.='<tr><td class="tdInfoModificacion">Editado el <b>'.$objA->fechamodificacion.'</b> por <b>'.$objA->modificador.'</b></td></tr></table></div>';
							
									// SUBCONTENIDOS DE SUBCONTENIDO
									if($stmtEsSubsubcontenido = $conexion->query("SELECT id, imagen1contenido, subcontenido, menucontenido, fijo, activo, titulocontenido, ordencontenido, textocontenido, fechamodificacion, modificador FROM vadmon_contenidos WHERE subcontenido=".$objA->id." ORDER BY ordencontenido")){
										while($objB = $stmtEsSubsubcontenido->fetch_object()){
											//Revisamos que el subsubcontenido no este en la PAPELERA
											if($stmtPapeleraB = $conexion->query("SELECT * FROM vadmon_papelera WHERE seleccion=".$objB->id)){
												if($stmtPapeleraB->num_rows == 0){
													//Imprimimos subsubcontenidos
													$mostrarContenido.='<div class="divRegistro contenidoNivel2">';
													$mostrarContenido.='<table cellpadding="0" cellspacing="0" border="0"><tr>';
													$mostrarContenido.='<td class="tdImagen">';
													if($objB->imagen1contenido<>''){
														$mostrarContenido.='<div class="ImgImagen"><img src="http://'.$servidorImg.'/recursos/contenidos/'.$objB->imagen1contenido.'" alt="" width="320"/></div>';
													}else{
														$mostrarContenido.='<div class="ImgImagen"><img src="imagenes/sinimagen.jpg" alt="" width="320"/></div>';	
													}
													$mostrarContenido.='<div class="divImagen">';
													$mostrarContenido.='<div class="opcionesOcultas" id="btnOpciones'.$objB->id.'" onclick="mostrarOpciones(\'opciones'.$objB->id.'\')"></div>';
													$mostrarContenido.='<div class="opcionesRegistro" id="opciones'.$objB->id.'">';
													if($peditar==1){
														$mostrarContenido.='<a href="inicio.php?accion=editarContenido&idcontenido='.$objB->id;
														if($objB->subcontenido<>0){
															if($stmtEsSubsubsubcontenido = $conexion->query("SELECT id, menucontenido FROM vadmon_contenidos WHERE id=".$objB->subcontenido)){
																while($objC = $stmtEsSubsubsubcontenido->fetch_object()){
																	$mostrarContenido.='&menucontenido='.$objC->menucontenido.'&tabla='.$seccionSeleccionada.'" ';
																}
															}
															$mostrarContenido.='&menucontenido='.$objA->menucontenido.'&tabla='.$seccionSeleccionada.'" ';		
														}else{
															$mostrarContenido.='&menucontenido=normal&tabla='.$seccionSeleccionada.'" ';
														}
														$mostrarContenido.='title="Editar" class="btnEditar"></a>';
													}else{
														$mostrarContenido.='<a title="Editar" class="btnEditar btnDeshabilitado"></a>';
													}
													if($_COOKIE['loggedin'] == "vemeweb"){
														$bloqueado = '';
														if($objB->fijo==1){ 
															$bloqueado = '<a href="acciones/desbloquear.php?id='.$objB->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Desbloquear" class="btnDesbloquear"></a>';
														}
														$desbloqueado = '';
														if($objB->fijo==0){
															$desbloqueado = '<a href="acciones/bloquear.php?id='.$objB->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Bloquear" class="btnBloquear"></a>';
														}
														$mostrarContenido.=$bloqueado.$desbloqueado;
													}else{
														$bloqueado = '';
														if($objB->fijo==1){
															$bloqueado = '<a title="Desbloquear" class="btnDesbloquear btnDeshabilitado"></a>';
														}
														$desbloqueado = '';
														if($objB->fijo==0){
															$desbloqueado = '<a title="Bloquear" class="btnBloquear btnDeshabilitado"></a>';
														}
														$mostrarContenido.=$bloqueado.$desbloqueado;
													}
													if($objB->fijo==0){
														$activado = '';
														if($objB->activo==1){
															$activado = '<a href="acciones/desactivar.php?id='.$objB->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Desactivar" class="btnDesactivar"></a>'; }
														$desactivado = '';
														if($objB->activo==0){
															$desactivado = '<a href="acciones/activar.php?id='.$objB->id.'&seccionSeleccionada='.$seccionSeleccionada.'" title="Activar" class="btnActivar"></a>';
														}
														$mostrarContenido.=$activado.$desactivado;
														if($peliminar==1){
															$mostrarContenido.='<a href="acciones/papelera.php?id='.$objB->id.'&tabla='.$seccionSeleccionada.'" title="Eliminar" class="btnBorrar"></a>';
														}else{
															$mostrarContenido.='<a title="Eliminar" class="btnBorrar btnDeshabilitado"></a>';
														}
													}else{
														$activado = '';
														if($objB->activo==1){
															$activado = '<a title="Desactivar" class="btnDesactivar btnDeshabilitado"></a>';
														}
														$desactivado = '';
														if($objB->activo==0){
															$desactivado = '<a title="Activar" class="btnActivar btnDeshabilitado"></a>';
														}
														$mostrarContenido.=$activado.$desactivado;
														$mostrarContenido.='<a title="Eliminar" class="btnBorrar btnDeshabilitado"></a>';
													}
													$mostrarContenido.='<a onclick="mostrarOpciones(\'ninguno\')" class="btnOcultar"></a></div>';
													$mostrarContenido.='<img src="imagenes/sombraTitular.png" alt="" class="sombraTitular"/>';
													$mostrarContenido.='<div class="titularesRegistro"><span class="tituloRegistro">'.$objB->titulocontenido.'</span><br/>';
													$mostrarContenido.='<span class="nivelRegistro">Subcontenido de "'.$objA->titulocontenido.'"</span></div>';
													$mostrarContenido.='<div class="ordenRegistro">'.$objB->ordencontenido.'</div>';
													if($objA->imagen1contenido<>''){
														$mostrarContenido.='<div class="registroPadre"><img src="http://'.$HostDominio.'/recursos/contenidos/'.$objA->imagen1contenido.'" alt=""/></div>';
													}else{
														$mostrarContenido.='<div class="registroPadre"><img src="imagenes/sinimagen.jpg" alt=""/></div>';	
													}
													if($objB->textocontenido<>""){
														$subString=$objB->textocontenido;
														$textoContenido=substr($subString, 0, 200);
														$textoContenido.='...';
													}
													$mostrarContenido.='</div></td></tr><td class="tdTexto">'.$textoContenido.'</td></tr>';
													$mostrarContenido.='<tr><td class="tdInfoModificacion">Editado el <b>'.$objB->fechamodificacion;
													$mostrarContenido.='</b> por <b>'.$objB->modificador.'</b></td></tr></table></div>';	
												}
											}
										}
									}// SUBCONTENIDOS DE SUBCONTENIDOS FIN
								}
							}
						}
					}// SUBCONTENIDOS DE CONTENIDO FIN
				}
			}
		}// CONTENIDOS FIN
	}
}
$mostrarContenido.='</div>';
?>