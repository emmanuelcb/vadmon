<?php
  $headerBarraLateral = '<a href="" title=""><img src="imagenes/vemeweb_logo.png" alt="Vemeweb&reg;" /></a>';
  $headerBarraLateral .= '<div class="lineaSeparacion"></div>';
  echo $headerBarraLateral;
  if($existeCookie != true){
    include('identificacion.php');
  }else{
    include('menuLateral.php');
  }
?>