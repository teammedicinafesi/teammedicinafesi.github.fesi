<?php 
	include("../funciones.php");
	$correo = sanitizar_post('correo');
	$password = sanitizar_post("password");

	if ($correo == "" or $password == "") {
			echo "Llene todos los campos del formulario";
			return false;
	}

	$validar = consulta_val("SELECT NULL FROM usuarios where correo='$correo' and password='$password'");
	if ($validar == 1) {
		$array = consulta_array("SELECT * FROM usuarios WHERE correo = '$correo'");
		$id_usuario = $array['id_usuario'];
		$nombre = $array['nombre'];
		session_start();
		$_SESSION['id_usuario'] = $id_usuario;
		$_SESSION['accesso'] = "acceso";
		$_SESSION['nombre'] = $nombre;
		echo "acceso";
	}
	else{
		echo "Correo o contraseña no validos";
	}
?>