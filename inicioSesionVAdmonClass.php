<?php
class inicioSesionVAdmonClass {
	
	function sesionSeguraVAdmonInicio(){
		$nombreSesion = 'sesionSeguraVAdmon';
        $https = false;
		$solohttp = true;
		ini_set('session.use_only_cookies', 1); //Forza a las sesiones a sólo utilizar cookies.
		$cookieParams = session_get_cookie_params(); //Obtén params de cookies actuales.
		session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $https, $solohttp);
		session_name($nombreSesion);
		session_start();
		session_regenerate_id(true);
	}
	
	function inicioSesionVAdmon($usuario, $contrasenia, $planconexion) {
      	$sqlStr = "SELECT id, usuario, contrasenia FROM vadmon_planes WHERE usuario = $1 LIMIT 1";
      	$sqlName = "getUser";
		//Uso de sentencias preparadas significa que la inyección de SQL no es posible.
		if (pg_prepare($planconexion, $sqlName, $sqlStr)) {
			//$contrasenia = hash('sha256', $contrasenia);
          	$result = pg_execute($planconexion, $sqlName, array($usuario));
          	$fetchArr = pg_fetch_all($result);
          	//Si el usuario existe.
			if(sizeof($fetchArr) == 1){
              	while($userRs = pg_fetch_array($result)){
                    //Revisamos si la cuenta está bloqueada de muchos intentos de conexión.
                    if($this->revisarFuerzaBrutaVAdmon($userRs["id"], $planconexion) == true) {
                        //La cuenta está bloqueada
                        //Envia un correo electrónico al usuario que le informa que su cuenta está bloqueada
                        return false;
                    } else {
                        if($userRs["contrasenia"] == $contrasenia) { //Revisa si la contraseña en la base de datos coincide con la contraseña que el usuario envió.
                            //¡La contraseña es correcta!
                            $navegadorUsr = $_SERVER['HTTP_USER_AGENT']; //Obtén el agente de usuario del usuario
                            $idUsuario = preg_replace("/[^0-9]+/", "", $userRs["id"]); //protección XSS ya que podemos imprimir este valor
                            $_SESSION['idUsuarioVAdmon'] = $idUsuario;
                            $nombreUsr = preg_replace("/[^a-zA-Z0-9_\-]+/", "",  $userRs["usuario"]); //protección XSS ya que podemos imprimir este valor
                            $_SESSION['nombreUsrVAdmon'] = $nombreUsr;
                            $_SESSION['cadenaInicioVAdmon'] = hash('sha256',  $userRs["contrasenia"].$navegadorUsr);
                            //Inicio de sesión exitosa
                            return true; 
                        } else {
                            //La conexión no es correcta
                            //Grabamos este intento en la base de datos
                            $ahora = time();
                            pg_query($planconexion,"INSERT INTO vadmon_planesinicios (idusuario, tiempo) VALUES ('$idUsuario', '$ahora')");
                            return false;
                        }
                    }
                }
			} else {
				//No existe el usuario.
				return false;
			}
		}
	}
	
	function revisarFuerzaBrutaVAdmon($idUsuario, $planconexion) {
		//Obtén timestamp en tiempo actual
		$ahora = time();
		//Todos los intentos de inicio de sesión son contados desde las 2 horas anteriores.
		$validaIntentos = $ahora - (2 * 60 * 60);
      	$sqlStr = "SELECT tiempo FROM vadmon_planesinicios WHERE idusuario = $1 AND tiempo > '$validaIntentos'";
      	$sqlName = "insertAttemptToLoggingIn";
		if (pg_prepare($planconexion, $sqlName, $sqlStr)) {
			//Ejecuta la consulta preparada.
          	$result = pg_execute($planconexion, $sqlName, array($idUsuario));
			$fetchArr = pg_fetch_all($result);
			//Si ha habido más de 5 intentos de inicio de sesión fallidos
			if(sizeof($fetchArr) > 5) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	function revisaInicioVAdmon($planconexion) {
		//Revisa si todas las variables de sesión están configuradas.
		if(isset($_SESSION['idUsuarioVAdmon'], $_SESSION['nombreUsrVAdmon'], $_SESSION['cadenaInicioVAdmon'])) {
			$idUsuario = $_SESSION['idUsuarioVAdmon'];
			$cadenaInicio = $_SESSION['cadenaInicioVAdmon'];
			$nombreUsr = $_SESSION['nombreUsrVAdmon'];
			$navegadorUsr = $_SERVER['HTTP_USER_AGENT'];
          	echo 'Cadena Inicio '.$cadenaInicio.'<br/>';
          	//Obtén la cadena de caractéres del agente de usuario
			$sqlStr = "SELECT id, usuario, contrasenia FROM vadmon_planes WHERE usuario = $1 LIMIT 1";
      		$sqlName = "confirmInitialChain";
			if (pg_prepare($planconexion, $sqlName, $sqlStr)) {
              	echo 'Prepare was successful<br/>';
				//Ejecuta la consulta preparada.
				$result = pg_execute($planconexion, $sqlName, array($idUsuario));
              	echo 'Result '.$result.'<br/>';
				$fetchArr = pg_fetch_all($result);
              	echo 'Size '.sizeof($fetchArr).'<br/>';
              	echo $fetchArr;
              	print_r($fetchArr);
              	//Si el usuario existe
				if(sizeof($fetchArr) == 1) {
                  	echo 'Is in...';
                  	while($confirmUser = pg_fetch_array($result)){
                      	echo $confirmUser;
                        $revisarInicio = hash('sha256', $confirmUser['contrasenia'].$navegadorUsr);
                      	echo $revisarInicio.'<br/>';
                        if($revisarInicio == $cadenaInicio) {
                            //¡¡¡¡Conectado!!!!
                            return true;
                        } else {
                            //No conectado
                            return false;
                        }
                    }
				} else {
					//No conectado
				return false;
				}
			} else {
				//No conectado
				return false;
			}
		} else {
			//No conectado
			return false;
		}
	}
}
?>
