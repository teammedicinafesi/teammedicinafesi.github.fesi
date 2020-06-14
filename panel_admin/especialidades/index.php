<section class="content">
	<br>
	<button class="btn btn-success btn_agregar_especialidad">Agregar Especialidad</button>
	
	<div class="marco_listado" style="margin-top:15px">
		<table class="table table_especialidades ocultar_al_agregar" style="background-color: white;">
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
		</table>

		
		<form class="form_agregar_especialidad ocultar_al_regresar ocultar_al_agregar" style="display: none;">
			<label for="">Nombre de la especialidad</label>
			<input type="text" class="form-control focus" name="especialidad" style="margin-bottom:6px">
			<label for="">Slug</label>
			<input type="text" class="form-control " name="slug_especialidad" style="margin-bottom: 9px">
			
			<button type="button" class="btn btn-primary btn_guardar_especialidad">Guardar</button>
			<button type="button" class="btn btn-primary btn_limpiar_campos">Limpiar Campos</button>
			<button type="button" class="btn btn-primary btn-success btn_regresar">Regresar al listado</button>
			<p class="mensaje_especialidad" style="margin-top:9px"> </p>
		</form>
		
		<form class="form_eliminar_especialidad ocultar_al_regresar ocultar_al_agregar" style="display: none"> 
			<label for="">Solo en prueba no en produccion</label>
			<h4 class="especialidad_texto"></h5>
			<input type="hidden" class="form-control input_id_eliminar" name="id_especialidad" style="margin-bottom: 9px">
			<button type="button" class="btn btn-danger btn_eliminar_especialidad">Eliminar</button>
			<button type="button" class="btn btn-primary btn-success btn_regresar">Regresar al listado</button>
			<p class="mensaje_especialidad_eliminar" style="margin-top:9px"> </p>
		</form>

		<form class="form_editar_especialidad ocultar_al_regresar ocultar_al_agregar" style="display: none;">
			<h4>Editar: <span class="especialidad_texto_editar"></span></h4>
			<input type="hidden" class="id_especialidad_editar" name="id_especialidad">
			<label for="">Nombre de la especialidad</label>
			<input type="text" class="form-control especialidad_editar" name="especialidad" style="margin-bottom:6px">
			<label for="">Slug</label>
			<input type="text" class="form-control slug_editar" name="slug_especialidad" style="margin-bottom: 9px">
			<button type="button" class="btn btn-primary btn_editar_especialidad">Guardar</button>
			<button type="button" class="btn btn-primary btn-success btn_regresar">Regresar al listado</button>
			<p class="mensaje_especialidad_editar" style="margin-top:9px"> </p>
		</form>

	</div>
</section>
<br>

<script>
	$(document).on('click','.btn_vista_editar',function(){
		$(".table_especialidades").hide()
		$(".form_editar_especialidad").show()
		id_especialidad = $(this).attr('data')
		especialidad = $(this).data("especialidad")
		slug = $(this).data("slug")
		$(".especialidad_texto_editar").html(especialidad)
		$(".id_especialidad_editar").val(id_especialidad)
		$(".especialidad_editar").val(especialidad)
		$(".slug_editar").val(slug)
		$(".mensaje_especialidad_editar").html('')
	})

	$(document).on('click','.btn_vista_eliminar',function(){
		$(".table_especialidades").hide()
		$(".form_eliminar_especialidad").show()

		id_especialidad = $(this).attr('data')
		especialidad = $(this).data("especialidad")
		$(".input_id_eliminar").val(id_especialidad)
		$(".especialidad_texto").html(especialidad)
		$(".mensaje_especialidad_eliminar").html('')
	})

	$(document).on('click','.btn_agregar_especialidad',function(){
		$(".ocultar_al_agregar").hide()
		$(".form_agregar_especialidad").show()
		$(".mensaje_especialidad").html('')
		$(".form-control").val('')
		$(".focus").focus()
	})

	$(document).on('click','.btn_regresar',function(){
		$(".ocultar_al_regresar").hide()
		$(".table_especialidades").show()

	})

	$(document).on('click','.btn_limpiar_campos',function(){
		$(".form-control").val('')
		$(".mensaje_especialidad").html('')
		$(".focus").focus()
	})
	
	$(document).on('click','.btn_guardar_especialidad',function(){
	    $(".btn_guardar_especialidad").prop( "disabled",true)
	    $.ajax({
	        type:"POST",
	        url:"panel_admin/especialidades/process_agregar_especialidad.php",
	        data:$(".form_agregar_especialidad").serialize(),
	        success:function(data){
	            $(".mensaje_especialidad").html(data)
	        	$(".btn_guardar_especialidad").prop( "disabled",false)
	        	
	        	$.ajax({
			        type:"GET",
			        url:"panel_admin/especialidades/vista_especialidades.php",
			        success:function(data){
			        	$(".table_especialidades").html(data)
			        }
			    });	
	        }
	    });
	})

	$(document).on('click','.btn_eliminar_especialidad',function(){
    //$(".btn_agregar_subir").prop( "disabled",true)
	    $.ajax({
	        type:"POST",
	        url:"panel_admin/especialidades/process_eliminar_especialidad.php",
	        data:$(".form_eliminar_especialidad").serialize(),
	        success:function(data){
	            $(".mensaje_especialidad_eliminar").html(data)
	            $.ajax({
			        type:"GET",
			        url:"panel_admin/especialidades/vista_especialidades",
			        success:function(data){
			        	$(".table_especialidades").html(data)
			        }
			    });	
	        }
	    });
	})


	$(document).on('click','.btn_editar_especialidad',function(){
	    //$(".btn_agregar_subir").prop( "disabled",true)
	    $.ajax({
	        type:"POST",
	        url:"panel_admin/especialidades/process_editar_especialidad.php",
	        data:$(".form_editar_especialidad").serialize(),
	        success:function(data){
	            $(".mensaje_especialidad_editar").html(data)
	         	$.ajax({
			        type:"GET",
			        url:"panel_admin/especialidades/vista_especialidades",
			        success:function(data){
			        	$(".table_especialidades").html(data)
			        }
			    });	   
	        }
	    });
	})

</script>