      <a href="" title=""><img src="imagenes/vemeweb_logo.png" alt="Vemeweb&reg;" /></a>
      <div class="lineaSeparacion"></div>
      <?php if (!isset($_COOKIE['loggedin'])) {
        include('identificacion.php');
      }else{ ?>
      <table cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
          <?php if($pconfiguracion==1){ ?>
          <a href="inicio.php?idcontenido=configuracion" title=""><img src="imagenes/btnConfig.png" alt="Configuración"/></a>
          <?php }else{ ?>
          <a class="btnDeshabilitado"><img src="imagenes/btnConfig.png" alt="Configuración"/></a>
          <?php } ?></td>
          <td><div class="lineaSeparacionColumnas"></div></td>
          <td>
          <?php if($pusuarios==1){ ?>
          <a href="inicio.php?idperfil=lista" title=""><img src="imagenes/btnPerfil.png" alt="Usuarios"/></a>
          <?php }else{ ?>
          <a class="btnDeshabilitado"><img src="imagenes/btnPerfil.png" alt="Usuarios"/></a>
          <?php } ?></td>
          <td><div class="lineaSeparacionColumnas"></div></td>
          <td><a href="logout.php" title=""><img src="imagenes/btnCerrarSesion.png" alt="Cerrar Sesion"/></a></td>
        </tr>
      </table>
      <div class="lineaSeparacion"></div>
      <table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td align="center">
        <table cellpadding="0" cellspacing="0" border="0">
          <tr>
          	<?php
			$imagenes='';
			$servidorImg = $HostDominio;
			if($servidorImg == "localhost"){ $servidorImg = 'vemeweb.com'; }
			$conexion = ftp_connect($servidorImg);
			$resultado = ftp_login($conexion, $_COOKIE['servidorFtpUsuario'], $_COOKIE['servidorFtpPass']);
			$archivos = ftp_nlist($conexion, $_COOKIE['servidorFtpDirectorio']."/recursos/".$carpeta."/");
			?>
            <td width="50"><a href="inicio.php?idperfil=<?php echo $_COOKIE['idUsuario'] ?>" title="Perfil" class="imgPerfilThumb"><img src="http://<?php echo $servidorImg ?>/recursos/usuarios/<?php echo $usuarioavatar ?>" alt=""/></a></td>
            <td align="right"><p><span class="usuarioNombre"><?php echo $usuarionombre ?> <?php echo $usuarioapellidos ?></span><br/>
            <span class="usuarioNivel"><?php echo $usuarionivel ?></span></p></td>
          </tr>
        </table>
      </td></tr></table>
      <div class="lineaSeparacion"></div>
      <ul class="menuLateral">
        <?php if($pcontenidos==1){ ?>
        <li><a href="inicio.php?idcontenido=contenidos" title="" <?php if($estiloActivo==1) echo 'class="selected"';?>>Contenidos</a></li>
        <?php } if($pcontenidos==1){ ?>
        <li><a href="inicio.php?mostrarImagenes=listar&carpeta=galeria" title="" <?php if($estiloActivo==13) echo 'class="selected"';?>>Galer&iacute;a</a></li>
		<?php } if($pnoticias==1){ ?>
        <li><a href="inicio.php?idcontenido=noticias" title="" <?php if($estiloActivo==4) echo 'class="selected"';?>>Noticias</a></li>
        <?php } if($particulos==1){ ?>
        <li><a href="inicio.php?idcontenido=articulos" title="" <?php if($estiloActivo==3) echo 'class="selected"';?>>Art&iacute;culos</a></li>
        <?php } if($ppromociones==1){ ?>
        <li><a href="inicio.php?idcontenido=promociones" title="" <?php if($estiloActivo==5) echo 'class="selected"';?>>Promociones</a></li>
        <?php } if($pbanners==1){ ?>
        <li><a href="inicio.php?idcontenido=banners" title="" <?php if($estiloActivo==2) echo 'class="selected"';?>>Banners</a></li>
        <?php } if($pencuestas==1){ ?>
        <li><a href="inicio.php?idcontenido=encuestas" title="" <?php if($estiloActivo==8) echo 'class="selected"';?>>Encuestas</a></li>
        <?php } if($pcrear==1){ ?>
        <li><a href="inicio.php?mostrarImagenes=listar" title="" <?php if($estiloActivo==6) echo 'class="selected"';?>>Im&aacute;genes</a></li>
        <?php } if($pbasesdedatos==1){ ?>
        <li><a href="inicio.php?idcontenido=registro" title="" <?php if($estiloActivo==11) echo 'class="selected"';?>>Registro</a></li>
        <?php } if($pdiseno==1){ ?>
        <li><a href="inicio.php?diseno=mostrar" title="" <?php if($estiloActivo==7) echo 'class="selected"';?>>Dise&ntilde;o</a></li>
        <?php } if($ppapelera==1){ ?>
        <li><a href="inicio.php?idcontenido=papelera" title="" <?php if($estiloActivo==12) echo 'class="selected"';?>>Papelera</a></li>
        <?php } if($ppermisos==1){ ?>
        <li><a href="inicio.php?idcontenido=permisos" title="" <?php if($estiloActivo==10) echo 'class="selected"';?>>Permisos</a></li>
        <?php } ?>
      </ul>
      <?php } ?>