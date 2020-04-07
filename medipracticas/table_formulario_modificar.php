<?php 
	include("funciones.php");
	echo $id_cuestionario = sanitizar_post("id_cuestionario");
	$consulta = mysqli_query($q_sec, "SELECT * FROM preguntas where id_cuestionario = '$id_cuestionario'");
	while ($array = mysqli_fetch_array($consulta)) {
		$id_pregunta = $array['id_pregunta'];
		$pregunta = $array['pregunta'];
		$opcion_a = $array['opcion_a'];
		$opcion_b = $array['opcion_b'];
		$opcion_c = $array['opcion_c'];
		$opcion_d = $array['opcion_d'];
		$opcion_e = $array['opcion_e'];
		$correcta = $array['correcto'];
		?>
			<tr>
				<td data='<?php echo $id_pregunta ?>'><?php echo $pregunta ?></td>
				<td><?php echo $opcion_a ?></td>
				<td><?php echo $opcion_b ?></td>
				<td><?php echo $opcion_c ?></td>
				<td><?php echo $opcion_d ?></td>
				<td><?php echo $opcion_e ?></td>
				<td><?php echo $correcta ?></td>
				<td><i class='fa  fa-times tachesito'> </i></td>
			</tr>
		<?php
	}
?>