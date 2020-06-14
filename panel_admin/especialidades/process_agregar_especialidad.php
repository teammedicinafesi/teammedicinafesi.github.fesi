<?php 
	include("../../funciones.php");
	$especialidad = sanitizar_post("especialidad");
	$slug_especialidad = sanitizar_post("slug_especialidad");

	if ($especialidad == '' or $slug_especialidad == '') {
		echo "No dejar campos vacios";
		return false;
	}

	$validar = consulta_val("SELECT NULL FROM especialidades WHERE especialidad = '$especialidad'");
	if ($validar == 0) {
		consulta_gen("INSERT INTO especialidades(especialidad, slug_especialidad) values('$especialidad','$slug_especialidad')");
		echo "Se registro nuevo especialidad";
	}
	else{
		echo "La especialidad ya estaba registrada";
	}

?>