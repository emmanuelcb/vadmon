<?php
class claseFunciones{
	function obtenerExtension($cadena) {
		return substr(strrchr($cadena,'.'),1);
	}
  
  	function log($cadena){
      $jsLog = '<script>';
      $jsLog .= 'var frag = document.createDocumentFragment();';
      $jsLog .= 'var div = document.createElement(\'div\');';
      $jsLog .= 'var txt = document.createTextNode(\''.$cadena.'\');';
      $jsLog .= 'var HTMLCollection = document.getElementsByTagName(\'body\');';
      $jsLog .= 'console.log(HTMLCollection); ';
      $jsLog .= 'var body = Array.apply(0, HTMLCollection);';
      $jsLog .= 'console.log(body); ';
      $jsLog .= 'div.appendChild(txt);';
      $jsLog .= 'div.setAttribute(\'style\', \'display:block;position:fixed;top:0;left:0;z-index:99;background-color:rgba(0,0,0,0.5);width:100%;height:50px;color:rgba(255,255,255,0.5);text-align:center;\');';
      $jsLog .= 'frag.appendChild(div);';
      $jsLog .= 'body[0].appendChild(frag);';
      $jsLog .= '</script>';
      return $jsLog;
    }
}
?>
