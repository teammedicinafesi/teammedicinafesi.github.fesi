<?php 
	include("../../funciones.php");
?>
	<tbody>
		<tr>
			<th style="width: 10px;">#</th> 
			<th>Sistema</th> 
			<th>Slug</th> 
			<th>Acciones</th>
		</tr> 
		<?php 
			$num = 1;
			$consulta = mysqli_query($q_sec,"SELECT * FROM sistemas");
			while ($array = mysqli_fetch_array($consulta)) {
				$id_sistema = $array['id_sistema'];
				$sistema = $array['sistema'];
				$slug_sistema = $array['slug_sistema'];

				?>
					<tr>
						<td><?php echo $num ?></td>
						<td><?php echo $sistema ?></td>
						<td><?php echo $slug_sistema ?></td>
						<td>
							<button class="btn btn-primary btn-xs btn_vista_editar"
							data-sistema="<?php echo $sistema ?>" 
							data-slug="<?php echo $slug_sistema ?>"
							data="<?php echo $id_sistema ?>"
							>
								<span class="fa fa-edit"></span>
							</button>
							<button class="btn btn-danger btn-xs btn_vista_eliminar" data-sistema="<?php echo $sistema ?>" data="<?php echo $id_sistema ?>"><span class="fa fa-close"></span></button>
						</td>
					</tr>
				<?php
				$num ++;
			}
		?>
		
	</tbody>
