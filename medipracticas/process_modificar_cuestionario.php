<?php 
	include("funciones.php");
	$DATA                = json_decode($_POST['data']);
	$cuestionario        = $DATA[0][0];
	$id_cuestionario     = $DATA[0][1];	
	$cuestionario_amigable = amigables($cuestionario);

	consulta_gen("UPDATE cuestionarios SET cuestionario = '$cuestionario' WHERE id_cuestionario = '$id_cuestionario'");

	for ($i=0; $i < count($DATA[1]); $i++) {
		$id_pregunta = $DATA[1][$i]->id_pregunta;
		$pregunta = $DATA[1][$i]->pregunta;
		$opcion_a = $DATA[1][$i]->opcion_a;
		$opcion_b = $DATA[1][$i]->opcion_b;
	    $opcion_c = $DATA[1][$i]->opcion_c;
		$opcion_d = $DATA[1][$i]->opcion_d;
		$opcion_e = $DATA[1][$i]->opcion_e;
		$correcto = $DATA[1][$i]->correcto;
		$tipo     = $DATA[1][$i]->tipo;

		if ($tipo == 'new') {
			consulta_gen("INSERT INTO preguntas(id_cuestionario,pregunta,opcion_a,opcion_b,opcion_c,opcion_d,opcion_e,correcto) VALUES('$id_cuestionario','$pregunta','$opcion_a','$opcion_b','$opcion_c','$opcion_d','$opcion_e','$correcto')");
		}
		if ($tipo == 'borrar') {
			consulta_gen("DELETE FROM preguntas WHERE id_pregunta = '$id_pregunta'");
		}
		else{
			consulta_gen("UPDATE preguntas SET pregunta = '$pregunta',opcion_a='$opcion_a', opcion_b='$opcion_b',opcion_c = '$opcion_c',opcion_d='$opcion_d',opcion_e='$opcion_e',correcto='$correcto' WHERE id_pregunta='$id_pregunta'");		
		}
		
		  
	}

	echo "<a href='formato-cuestionario/formato_chingon.php?id_cuestionario=$id_cuestionario' target='_blank'>Ruta para el documento</a><br>" ;
	echo "Nombre que se le tiene que poner al archivo: $cuestionario_amigable.html";

?>