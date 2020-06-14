<?php 
	include("../../funciones.php");
	$id_especialidad = sanitizar_post("id_especialidad");

	consulta_gen("DELETE FROM especialidades WHERE id_especialidad='$id_especialidad'");

	echo "Se elimino la especialidad";
?>