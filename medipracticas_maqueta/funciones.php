<?php 
	
	$type_produccion = "local";

	if ($type_produccion == "local") {
		$ruta = "http://localhost/seg/";
		/**Datos de conexion a la base de datos---------------------------------------**/
		
		$servidor    = "localhost";
		$usuario_s   = "root";

		$password_bd = "";
		$bd_s        = "medipracticas";
	}

	if ($type_produccion == "serv") {
		$servidor      = "";
		$usuario_s     = "";

		$password_bd   = "";
		$bd_s          = "";
	}

	$nombre_empresa = "";
	$password_s = "1234";

	global $q_sec;
	$q_sec = mysqli_connect($servidor,$usuario_s,$password_bd,$bd_s);


	/**Control de errores en el sistema-------------------------------------------**/

	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	$mens_error = "Surgió un error interno; si esto persiste contactar a sistemas";

	$permiso = "1234";
	/**Sentencias prehechas-------------------------------------------------------**/

	function consulta_val($sentencia){
		global $q_sec;
		global $mens_error;
		$consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		return $consulta_bd = mysqli_num_rows($consulta_bd);
		mysqli_close($q_sec);
	}

	function consulta_array($sentencia){
		global $q_sec;
		global $mens_error;
		$consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		return $consulta_bd = mysqli_fetch_array($consulta_bd);
		mysqli_close($q_sec);	
	}

	function insertar($sentencia){
		global $q_sec;
		global $mens_error;
		return $consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		mysqli_close($q_sec);
	}

	function consulta_gen($sentencia){
		global $q_sec;
		global $mens_error;
		return $consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		mysqli_close($q_sec);
	}

	function consulta_txt($sentencia,$dato_bd){
		global $q_sec;
		global $mens_error;
		       $consulta_bd = mysqli_query($q_sec,$sentencia) or die($mens_error."-".$sentencia);
		       $fetchArray  = mysqli_fetch_array($consulta_bd);
		return $dato        = $fetchArray[$dato_bd];

		mysqli_close($q_sec);
	}

	/**Control de horario-----------------------------------------------------------**/

	date_default_timezone_set('America/Mexico_City');
    $fecha                =  date("Y-m-d");
    $fecha_hora           =  date("Y-m-d H:i:s");
    $hora                 =  date("H:i:s");

    /**Funcion para sanitizar variables de entrada-----------------------------------**/

    function sanitizar_post($var_sn){
		$var_sn = addslashes(htmlspecialchars(strip_tags(trim($_POST[$var_sn]))));
		return $var_sn;
	}

	function sanitizar_get($var_sn){
		$var_sn = addslashes(htmlspecialchars(strip_tags(trim($_GET[$var_sn]))));
		return $var_sn;
	}

	function saber_dia($nombredia) {
		$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
		$fecha_l = $dias[date('N', strtotime($nombredia))];
		return $fecha_l;
	}
	function mes($mes_valor){
		$meses = array(Enero=>'01', Febrero=>'02', Marzo=>'03', Abril=>'04', Mayo=>'05',Junio=>'06',Julio=>'07',Agosto=>'08',Septiembre=>'09',Octubre=>'10',Noviembre=>'11',Diciembre=>'12');
		foreach($meses as $mes_nombre=>$mes_num){
			if ($mes_valor == $mes_num) {
				return $mes_nombre;
				return false;
			}
		}
	}
	function amigables($url) {

		// Tranformamos todo a minusculas

		$url = strtolower($url);

		//Rememplazamos caracteres especiales latinos

		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

		$repl = array('a', 'e', 'i', 'o', 'u', 'n');

		$url = str_replace ($find, $repl, $url);

		// Añaadimos los guiones

		$find = array(' ', '&', '\r\n', '\n', '+'); 
		$url = str_replace ($find, '-', $url);

		// Eliminamos y Reemplazamos demás caracteres especiales

		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

		$repl = array('', '-', '');

		$url = preg_replace ($find, $repl, $url);

		return $url;
	}
	
?>