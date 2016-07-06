<?php
class claseFunciones{
	function obtenerExtension($cadena) {
		return substr(strrchr($cadena,'.'),1);
	}
  
  	function log($cadena){
      	return '<script>alert(\''.$cadena.'\');</script>';
    }
}
?>
