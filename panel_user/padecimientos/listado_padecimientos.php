<section class="content">
	<div class="row">
		<div class="col-md-11">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="btn-group" role="group">
				<div class="btn-group" role="group">
				    <button type="button" class="btn btn-default" style="background-color: white">Todos</button>
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white">
				      Sistema
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu">
				      	<?php  
							$consulta = mysqli_query($q_sec,"SELECT * FROM sistemas");
							while ($array = mysqli_fetch_array($consulta)) {
								$id_sistema = $array["id_sistema"];
								$sistema = $array['sistema'];
								?><li><a><?php echo $sistema ?></a></li><?php
							}
						?>
				    </ul>
				</div>
				<div class="btn-group" role="group">
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white">
				      Especialidad &nbsp;
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu">
				      	<?php 
				      		$consulta = mysqli_query($q_sec,"SELECT * FROM especialidades");
							while ($array = mysqli_fetch_array($consulta)) {
								$id_especialidad = $array["id_especialidad"];
								$especialidad = $array['especialidad'];
								?><li><a><?php echo $especialidad ?></a></li><?php
							}
				      	?>
				    </ul>
				</div>
				<button type="button" class="btn btn-default" style="background-color: white"><</button>
				<button type="button" class="btn btn-default" style="background-color: white">></button>
			</div>
		</div>
		<div class="col-xs-5 hidden-md hidden-xs" style="text-align: right;">
			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default"><</button>
			  <button type="button" class="btn btn-default">1</button>
			  <button type="button" class="btn btn-default">2</button>
			  <button type="button" class="btn btn-default">3</button>
			  <button type="button" class="btn btn-default">4</button>
			  <button type="button" class="btn btn-default">5</button>
			  <button type="button" class="btn btn-default">></button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-11">
			<table class="table" style="background-color:white;border-top:3px solid #3c8dbc;margin-top: 15px">
        		<tr>
					<th class="margen_tabla" style="width: 10px">#</th>
					<th class="margen_tabla">Padecimiento - Sistema Nervioso (32)</th>
					<th class="margen_tabla">Bibliografia</th>
					<th class="margen_tabla">Acciones</th>
                </tr>
          		<?php 
          			$num = 1;
          			$consulta = mysqli_query($q_sec,"SELECT * FROM codigos_padecimientos WHERE id_usuario = '$id_usuario'");
          			while ($array = mysqli_fetch_array($consulta)) {
          				$id_codigo = $array['id_codigo']
          				?>
						<tr>
							<td class="margen_tabla"><?php echo $num ?></td>
							<td class="margen_tabla">
								<?php 
									$consulta_padecimiento = mysqli_query($q_sec,"SELECT * FROM nombres_padecimientos where id_codigo = '$id_codigo'");
									while ($array_padecimiento = mysqli_fetch_array($consulta_padecimiento)) {
										$padecimiento = $array_padecimiento['padecimiento'];
										echo $padecimiento."<br>";
									}
								?>								
								

							</td>
							<td class="margen_tabla"></td>
							<td class="margen_tabla"><button class="btn btn-xs btn-primary">Informacion</button></td>
						</tr>
          				<?php
          				$num++;
          			}
          		?>
        	</table>
		</div>
		
	</div>
</section>