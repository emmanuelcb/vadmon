<?php
class inicioSesionDominioClass {
	function revisaInicioDominio(){
		if (isset($_COOKIE['loggedin'])) {
			return true;
		}else{
			return false;
		}
	}
}
?>