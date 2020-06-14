<?php include("../../funciones.php"); ?>
<tbody>
	<tr>
		<th style="width: 10px;">#</th> 
		<th>Especialidad</th> 
		<th>Slug</th> 
		<th>Acciones</th>
	</tr> 
	<?php 
		$num = 1;
		$consulta = mysqli_query($q_sec,"SELECT * FROM especialidades");
		while ($array = mysqli_fetch_array($consulta)) {
			$id_especialidad = $array['id_especialidad'];
			$especialidad = $array['especialidad'];
			$slug_especialidad = $array['slug_especialidad'];

			?>
				<tr>
					<td><?php echo $num ?></td>
					<td><?php echo $especialidad ?></td>
					<td><?php echo $slug_especialidad ?></td>
					<td>
						<button class="btn btn-primary btn-xs btn_vista_editar"
						data-especialidad="<?php echo $especialidad ?>" 
						data-slug="<?php echo $slug_especialidad ?>"
						data="<?php echo $id_especialidad ?>"
						>
							<span class="fa fa-edit"></span>
						</button>
						<button class="btn btn-danger btn-xs btn_vista_eliminar" data-especialidad="<?php echo $especialidad ?>" data="<?php echo $id_especialidad ?>"><span class="fa fa-close"></span></button>
					</td>
				</tr>
			<?php
			$num ++;
		}
	?>
	
</tbody>