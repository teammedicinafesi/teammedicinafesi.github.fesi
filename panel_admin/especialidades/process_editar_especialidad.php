<?php 
	include("../../funciones.php");
	$id_especialidad = sanitizar_post("id_especialidad");
	$especialidad = sanitizar_post("especialidad");
	$slug_especialidad = sanitizar_post("slug_especialidad");

	$comprobar = consulta_array("SELECT especialidad,slug_especialidad FROM especialidades WHERE id_especialidad='$id_especialidad'");
	$especialidad_combrobar = $comprobar['especialidad'];
	$slug_especialidad_combrobar = $comprobar['slug_especialidad'];

	
	if ($especialidad_combrobar != $especialidad) {
		$validar_especialidad = consulta_val("SELECT null FROM especialidades WHERE especialidad = '$especialidad'");
		if ($validar_especialidad == 0) {
			consulta_gen("UPDATE especialidades SET especialidad='$especialidad' WHERE id_especialidad='$id_especialidad'");
			echo "Se modifico el nombre de la especialidad <br>";
		}
		else{
			echo "Especialidad ya registrada<br>";
		}
	}

	if ($slug_especialidad_combrobar != $slug_especialidad) {
		$validar_slug = consulta_val("SELECT null FROM especialidades WHERE slug_especialidad = '$slug_especialidad'");
		if ($validar_slug == 0) {
			consulta_gen("UPDATE especialidades SET slug_especialidad='$slug_especialidad' WHERE id_especialidad='$id_especialidad'");
			echo "Se modifico el nombre del slug<br>";
		}
		else{
			echo "Slug ya registrado<br>";
		}
	}
	

?>