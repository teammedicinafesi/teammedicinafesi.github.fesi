$(document).on('click','.btn',function(){

})

$(document).on('click','.btn',function(){
    //$(".btn_agregar_subir").prop( "disabled",true)
    $.ajax({
        type:"POST",
        url:"",
        data:$(".").serialize(),
        success:function(data){
            
        }
    });
})

$(document).on('click','.btn_confirmar_eliminacion_bibliografia',function(){ 

	$.ajax({
        type:"GET",
        url:"componentes_panel/bibliografia/process_eliminar_bibliografia.php?&id_bibliografia="+id_bibliografia+"&id_codigo="+id_codigo,
        success:function(data){
        	
        }
    });	
})