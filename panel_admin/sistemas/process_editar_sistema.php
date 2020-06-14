<?php 
	include("../../funciones.php");
	$id_sistema = sanitizar_post("id_sistema");
	$sistema = sanitizar_post("sistema");
	$slug_sistema = sanitizar_post("slug_sistema");

	$comprobar = consulta_array("SELECT sistema,slug_sistema FROM sistemas WHERE id_sistema='$id_sistema'");
	$sistema_combrobar = $comprobar['sistema'];
	$slug_sistema_combrobar = $comprobar['slug_sistema'];

	
	if ($sistema_combrobar != $sistema) {
		$validar_sistema = consulta_val("SELECT null FROM sistemas WHERE sistema = '$sistema'");
		if ($validar_sistema == 0) {
			consulta_gen("UPDATE sistemas SET sistema='$sistema' WHERE id_sistema='$id_sistema'");
			echo "Se modifico el nombre del sistema <br>";
		}
		else{
			echo "Sistema ya registrado<br>";
		}
	}

	if ($slug_sistema_combrobar != $slug_sistema) {
		$validar_slug = consulta_val("SELECT null FROM sistemas WHERE slug_sistema = '$slug_sistema'");
		if ($validar_slug == 0) {
			consulta_gen("UPDATE sistemas SET slug_sistema='$slug_sistema' WHERE id_sistema='$id_sistema'");
			echo "Se modifico el nombre del slug<br>";
		}
		else{
			echo "slug ya registrado<br>";
		}
	}
	

?>