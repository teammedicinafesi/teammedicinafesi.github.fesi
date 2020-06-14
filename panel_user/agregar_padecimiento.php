<section class="content">
	<div class="row">
		<div class="col-md-7">
			<h3>Agregar Padecimiento</h3>
			<form class="form-horizontal form_nombre_padecimiento">
				  	<button type="button" class="btn btn-primary guardar_datos">Aceptar</button>
				  	<button type="button" class="btn btn-primary btn_agregar_nombre">+ Añadir nombre</button>
				  	<button type="button" class="btn btn-success btn_refresh">Limpiar campos</button>
				  	<br>		
					<div class="input-group" style="margin-top:8px">
					  	<input type="text" class="form-control input_nombre_padecimiento focus" placeholder="Nombre del Padecimiento">
					  	<span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
					</div>		    
			</form>
			<div class="mensaje"></div>
		</div>

	</div>
</section>


<script>
	$(document).ready(function(){
        $(".input_nombre_padecimiento").focus()
    })


	$(document).on('click','.btn_agregar_nombre',function(){
		contador = $(".form_nombre_padecimiento").find(".input-group").length

		if (contador <= 2) {

			$(".form_nombre_padecimiento").append(`
				<div class="input-group groups_limpiar" style='margin-top:5px'>
			      <input type="text" placeholder="Nombre del padecimiento" class='form-control input_nombre_padecimiento'>
			      <span class="input-group-btn">
			        <button class="btn btn-default btn_remover" type="button">
						<span class='glyphicon glyphicon-remove-circle'>

						</span>
			        </button>
			      </span>
			    </div>

			`)
	    }
	    else
	    {
	    	alert('Solo puede agregar 3 nombre diferentes para un mismo padecimiento')
	    }
    })


	$(document).on('click','.btn_remover',function(){
		$(this).parent().parent().remove()
    })


	$(document).on('click','.btn_refresh',function(){
		$(".groups_limpiar").remove()
		$(".focus").val('')
		$(".focus").focus()
		$(".mensaje").html('')
    })


	

    $(document).on('click','.guardar_datos',function(){
        var arreglo 	= []
		

        var caja_nombre = []
        $(".form_nombre_padecimiento .input-group").each(function(){
	      	item = {};
			name = $(this).find(".input_nombre_padecimiento").val()

			if (name != '') {
				item ["name"] 	= name;
			    caja_nombre.push(item);	
			}

		    
		});
		arreglo.push(caja_nombre)

		console.log(arreglo);

	    info 	= new FormData();
		ainfo 	= JSON.stringify(arreglo);

		info.append('data', ainfo);

        $.ajax({
			data: info,
			type: 'POST',
			url : 'panel_user/padecimientos/process_agregar_padecimiento.php',
			processData: false, 
			contentType: false,
			success: function(data){
				$(".mensaje").html(data)
				//Una vez que se haya ejecutado de forma exitosa hacer el código para que muestre esto mismo.
			}
		});            

    })




</script>