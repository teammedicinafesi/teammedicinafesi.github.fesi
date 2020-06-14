<?php 
	include("../funciones.php");

	$nombre = sanitizar_post("nombre");
	$correo = sanitizar_post('correo');
	$password = sanitizar_post("password");

	$numero = strlen($password);

	if ($numero < 6) {
		echo "La contraseña es de minimo 6 caracteres<br>";
		return false;
	}

	if ($nombre == "" or $correo == "" or $password == "") {
			echo "Llene todos los campos del formulario";
			return false;
	}	

	$validar = consulta_val("SELECT null FROM usuarios WHERE correo = '$correo'");
	if ($validar == 0) {
		consulta_gen("INSERT INTO usuarios(nombre,correo,password) values('$nombre','$correo','$password')");
		$id_usuario = consulta_txt("SELECT id_usuario FROM usuarios WHERE correo = '$correo'","id_usuario");
		session_start();
		$_SESSION['id_usuario'] = $id_usuario;
		$_SESSION['accesso'] = "acceso";
		$_SESSION['nombre'] = $nombre;
		echo "registrado";
	}
	else{
		echo "Usuario ya registrado";
	}

	
?>