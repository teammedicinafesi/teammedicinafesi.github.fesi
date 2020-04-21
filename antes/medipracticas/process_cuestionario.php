<?php 
	include("funciones.php");
	$DATA     = json_decode($_POST['data']);
	
	$nombre_cuestionario = $DATA[0][0];
	$id_modulo = $DATA[0][1];
	$modulo = consulta_txt("SELECT modulo FROM modulos WHERE id_modulo='$id_modulo'","modulo");
	$modulo_amigable = amigables($modulo);

	$consulta_val = consulta_val("SELECT null FROM cuestionarios WHERE cuestionario='$nombre_cuestionario'");

	if ($consulta_val == 0) {

		consulta_gen("INSERT INTO cuestionarios(id_modulo,cuestionario,posicion) values('$id_modulo','$nombre_cuestionario','0')");
		$id_cuestionario = consulta_txt("SELECT id_cuestionario FROM cuestionarios WHERE cuestionario='$nombre_cuestionario'","id_cuestionario");
		for ($i=0; $i < count($DATA[1]); $i++) {
			$pregunta = $DATA[1][$i]->pregunta;
			$opcion_a = $DATA[1][$i]->opcion_a;
			$opcion_b = $DATA[1][$i]->opcion_b;
		    $opcion_c = $DATA[1][$i]->opcion_c;
			$opcion_d = $DATA[1][$i]->opcion_d;
			$opcion_e = $DATA[1][$i]->opcion_e;
			$correcto = $DATA[1][$i]->correcto;

			consulta_gen("INSERT INTO preguntas(id_cuestionario,pregunta,opcion_a,opcion_b,opcion_c,opcion_d,opcion_e,correcto) VALUES('$id_cuestionario','$pregunta','$opcion_a','$opcion_b','$opcion_c','$opcion_d','$opcion_e','$correcto')");
			  
		}

		echo "<a href='formato-cuestionario/formato_chingon.php?id_cuestionario=$id_cuestionario' target='_blank'>Ruta para el documento</a><br>" ;
		echo "Nombre que se le tiene que poner al archivo: ".$modulo_amigable."/".amigables($nombre_cuestionario).".html";
	}
	else{
		echo "Se apreto el boton 2 veces";
	}

?>
