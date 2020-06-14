<?php 
	include("../../funciones.php");
	$sistema = sanitizar_post("sistema");
	$slug_sistema = sanitizar_post("slug_sistema");

	if ($sistema == '' or $slug_sistema == '') {
		echo "No dejar campos vacios";
		return false;
	}

	$validar = consulta_val("SELECT NULL FROM sistemas WHERE sistema = '$sistema'");
	if ($validar == 0) {
		consulta_gen("INSERT INTO sistemas(sistema, slug_sistema) values('$sistema','$slug_sistema')");
		echo "Se registro nuevo sistema";
	}
	else{
		echo "El sistema ya estaba registrado";
	}

?>