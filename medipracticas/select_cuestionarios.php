<option value="">--</option>
<?php  
	include("funciones.php");
	$id_modulo = sanitizar_get("id_modulo");
	$consulta  = mysqli_query($q_sec,"SELECT * FROM cuestionarios WHERE id_modulo ='$id_modulo'");
	while ($array = mysqli_fetch_array($consulta)) {
		$id_cuestionario = $array['id_cuestionario'];
		$cuestionario = $array['cuestionario'];
		echo "<option value='$id_cuestionario' class='$id_cuestionario'>$cuestionario</option>";
	}
?>