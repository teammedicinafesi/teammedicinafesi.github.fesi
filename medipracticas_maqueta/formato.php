<?php  
	$id_cuestionario = $_GET['id_cuestionario'];
	$array = consulta_array("SELECT * FROM cuestionarios WHERE id_cuestionario = '$id_cuestionario'");
	$id_modulo = $array['id_modulo'];
	$cuestionario = $array['cuestionario'];

	$modulo = consulta_txt("SELECT modulo FROM modulos WHERE id_modulo = '$id_modulo'","modulo");
	$link = amigables($cuestionario).".html";
?>

<input type="hidden" class="modulo_return" value="<?php echo $modulo ?>">
<input type="hidden" class="link_return" value="<?php echo $link ?>">


<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <i class="mr-2 fa fa-align-justify"></i>
            <strong class="card-title" v-if="headerText">
                <span class="num_reactivos"></span>-R |     
                <?php echo $cuestionario ?>  - <?php echo $modulo ?>
            </strong>
        </div>

        <div class="card-body">
            <!-- CUADRO DEL CUESTIONARIO-->
            <div class="preguntas" style="font-size:.98em">                                      
                <?php  
					$control  = consulta_val("SELECT * FROM preguntas WHERE id_cuestionario = '$id_cuestionario'");
					$consulta = mysqli_query($q_sec,"SELECT * FROM preguntas WHERE id_cuestionario='$id_cuestionario' order by id_pregunta asc");
					$contador = 1; 
					while ($array =  mysqli_fetch_array($consulta)) {
						
						$pregunta = $array['pregunta'];
						$opcion_a = $array['opcion_a'];
						$opcion_b = $array['opcion_b'];
						$opcion_c = $array['opcion_c'];
						$opcion_d = $array['opcion_d'];
						$opcion_e = $array['opcion_e'];
						$correcto = $array['correcto'];


						if ($contador == 1) {
							?>
								<div class="pregunta actual">     
							<?php	
						}
						if ($contador != 1 && $contador != $control) {
							?>
				        	    <div class="pregunta" style="display:none">     
							<?php
						}
						if ($contador == $control ) {
							?>
			        	        <div class="pregunta"  data="ultima" style="display:none"> 
							<?php
						}

							?>
									<p class="pregunta_texto">
				                        <strong><span class="numerito"></span><?php echo $pregunta ?></strong>
				                    </p>

				                    <p class="inciso" <?php if($correcto == 'a'){echo "data='este'";} ?>> 
				                        <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp;
				                        a) <?php echo $opcion_a ?>
				                    </p>
				                    
				                    <p class="inciso" <?php if($correcto == 'b'){echo "data='este'";} ?>> 
				                        <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp;
				                        b) <?php echo $opcion_b ?>
				                    </p>
				                  
				                    <p class="inciso" <?php if($correcto == 'c'){echo "data='este'";} ?>> 
				                        <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp;
				                        c) <?php echo $opcion_c ?>
				                    </p>
				                    
				                    <p class="inciso" <?php if($correcto == 'd'){echo "data='este'";} ?>> 
				                        <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp;
				                        d) <?php echo $opcion_d ?>
				                    </p>
				                    
				                    <?php  
				                    	if ($opcion_e != '') {
				                    	?>
											<p class="inciso" <?php if($correcto == 'e'){echo "data='este'";} ?>> 
						                        <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp;
						                        e) <?php echo $opcion_e ?>
						                    </p>  
				                    	<?php
				                    	}
				                    ?>
					                                            
		                		</div>
							<?php




						$contador++;
					}
				?>                                                
                
                <input type="hidden" class="contador" value="0">
                <input type="hidden" class="controlador" value="0">
                <input type="hidden" class="reactivo" value="1">
            </div>
            <hr style="margin-top:5px;margin-bottom:10px;">
            <div>
                <div class="mensaje">
                    <button class="btn btn-outline-primary btn-sm evaluar" disabled="disabled">Evaluar</button>     
                </div>
            </div>
            <!-- FIN DEL CUADRO DEL CUESTIONARIO-->
        </div>
    </div>

</div>

