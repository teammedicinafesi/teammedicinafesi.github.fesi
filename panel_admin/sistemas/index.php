<section class="content">
	<div class="marco">
		<br>
		<button class="btn btn-success btn_agregar_sistema">Agregar Sistema</button>
		<div class="marco_listado" style="margin-top:15px">
			<table class="table table_sistema" style="background-color: white;">
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
			</table>
			<form class="form_agregar_sistema" style="display: none;">
				<label for="">Nombre del sistema</label>
				<input type="text" class="form-control focus" name="sistema">
				<label for="">Slug</label>
				<input type="text" class="form-control " name="slug_sistema" style="margin-bottom: 8px">
				<button type="button" class="btn btn-primary btn_guardar_sistema">Guardar</button>
				<button type="button" class="btn btn-primary btn_limpiar_campos">Limpiar Campos</button>
				<button type="button" class="btn btn-primary btn-success btn_regresar">Regresar al listado</button>
				<p class="mensaje_sistema" style="margin-top:8px"> </p>
			</form>
			<form class="form_eliminar_sistema" style="display: none"> 
				<label for="">Solo en prueba no en produccion</label>
				<h4 class="sistema_texto"></h5>
				<input type="hidden" class="form-control input_id_eliminar" name="id_sistema" style="margin-bottom: 8px">
				<button type="button" class="btn btn-danger btn_eliminar_sistema">Eliminar</button>
				<button type="button" class="btn btn-primary btn-success btn_regresar">Regresar al listado</button>
				<p class="mensaje_sistema_eliminar" style="margin-top:8px"> </p>
			</form>

			<form class="form_editar_sistema" style="display: none;">
				<h4>Editar: <span class="sistema_texto_editar"></span></h4>
				<input type="hidden" class="id_sistema_editar" name="id_sistema">
				<label for="">Nombre del sistema</label>
				<input type="text" class="form-control sistema_editar" name="sistema">
				<label for="">Slug</label>
				<input type="text" class="form-control slug_editar" name="slug_sistema" style="margin-bottom: 8px">
				<button type="button" class="btn btn-primary btn_editar_sistema">Guardar</button>
				<button type="button" class="btn btn-primary btn-success btn_regresar">Regresar al listado</button>
				<p class="mensaje_sistema_editar" style="margin-top:8px"> </p>
			</form>
			

		</div>
	</div>
</section>

<script>
	$(document).on('click','.btn_vista_editar',function(){
		$(".table_sistema").hide()
		$(".form_editar_sistema").show()
		id_sistema = $(this).attr('data')
		sistema = $(this).data("sistema")
		slug = $(this).data("slug")
		$(".sistema_texto_editar").html(sistema)
		$(".id_sistema_editar").val(id_sistema)
		$(".sistema_editar").val(sistema)
		$(".slug_editar").val(slug)
		$(".mensaje_sistema_editar").html('')
	})

	$(document).on('click','.btn_vista_eliminar',function(){
		$(".table_sistema").hide()
		$(".form_eliminar_sistema").show()
		id_sistema = $(this).attr('data')
		sistema = $(this).data("sistema")
		$(".input_id_eliminar").val(id_sistema)
		$(".sistema_texto").html(sistema)
		$(".mensaje_sistema_eliminar").html('')
	})

	$(document).on('click','.btn_limpiar_campos',function(){
		$(".form-control").val('')
		$(".mensaje_sistema").html('')
		$(".focus").focus()
	})

	$(document).on('click','.btn_agregar_sistema',function(){
		$(".table_sistema").hide()
		$(".form_eliminar_sistema").hide()
		$(".form_editar_sistema").hide()
		$(".form_agregar_sistema").show()
		$(".mensaje_sistema").html('')
		$(".form-control").val('')

	})
	$(document).on('click','.btn_regresar',function(){
		$(".form_agregar_sistema").hide()
		$(".form_eliminar_sistema").hide()
		$(".form_editar_sistema").hide()
		$(".table_sistema").show()

	})

	$(document).on('click','.btn_guardar_sistema',function(){
	    $(".btn_guardar_sistema").prop( "disabled",true)
	    $.ajax({
	        type:"POST",
	        url:"panel_admin/sistemas/process_agregar_sistema.php",
	        data:$(".form_agregar_sistema").serialize(),
	        success:function(data){
	            $(".mensaje_sistema").html(data)
	        	$(".btn_guardar_sistema").prop( "disabled",false)
	        	
	        	$.ajax({
			        type:"GET",
			        url:"panel_admin/sistemas/vista_sistemas",
			        success:function(data){
			        	$(".table_sistema").html(data)
			        }
			    });	
	        }
	    });
	})

	$(document).on('click','.btn_eliminar_sistema',function(){
    //$(".btn_agregar_subir").prop( "disabled",true)
	    $.ajax({
	        type:"POST",
	        url:"panel_admin/sistemas/process_eliminar_sistema.php",
	        data:$(".form_eliminar_sistema").serialize(),
	        success:function(data){
	            $(".mensaje_sistema_eliminar").html(data)
	            $.ajax({
			        type:"GET",
			        url:"panel_admin/sistemas/vista_sistemas",
			        success:function(data){
			        	$(".table_sistema").html(data)
			        }
			    });	
	        }
	    });
	})

	$(document).on('click','.btn_editar_sistema',function(){
	    //$(".btn_agregar_subir").prop( "disabled",true)
	    $.ajax({
	        type:"POST",
	        url:"panel_admin/sistemas/process_editar_sistema.php",
	        data:$(".form_editar_sistema").serialize(),
	        success:function(data){
	            $(".mensaje_sistema_editar").html(data)
	         	$.ajax({
			        type:"GET",
			        url:"panel_admin/sistemas/vista_sistemas",
			        success:function(data){
			        	$(".table_sistema").html(data)
			        }
			    });	   
	        }
	    });
	})

</script>