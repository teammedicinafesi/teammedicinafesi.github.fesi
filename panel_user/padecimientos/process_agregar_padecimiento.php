<?php 
include("../../funciones.php");
	session_start();
	$DATA       = json_decode($_POST['data']);
	$id_usuario = $_SESSION['id_usuario'];

	$val_data = count($DATA[0]);

	if ($val_data == 0) {
		echo "<p style='margin-top:10px'>No a ingresado ningun dato</p>";
		return false;
	}

	if ($val_data == 2) {
		if ( $DATA[0][0]->name == $DATA[0][1]->name ) {
			echo "<p style='margin-top:10px'>Datos repetidos</p>";
			return false;
		}
	}


	if ($val_data == 3) {
		if ( $DATA[0][0]->name == $DATA[0][1]->name ) {
			echo "<p style='margin-top:10px'>Datos repetidos</p>";
			return false;
		}
		if ($DATA[0][0]->name == $DATA[0][2]->name) {
			echo "<p style='margin-top:10px'>Datos repetidos</p>";
			return false;
		}
		if ($DATA[0][1]->name == $DATA[0][2]->name) {
			echo "<p style='margin-top:10px'>Datos repetidos</p>";
			return false;
		}
	}



	for ($i=0; $i < count($DATA[0]); $i++) {
		$padecimiento = $DATA[0][$i]->name;
		$cont = consulta_val("SELECT null FROM nombres_padecimientos WHERE padecimiento ='$padecimiento' and id_usuario='$id_usuario'");
		if ($cont == 0) {
			
		}
		else{
			?>
			<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  	<strong>Warning!</strong> El nombre del padecimiento ya habia sido registrado
			</div>
			<?php
			return false;
		}
		
	}


	$hora        =  date("Y-m-d-H-i-s");
	$aleatorio   =  rand(1000,9999);
	$codigo = $id_usuario."-".$hora."-".$aleatorio;
	consulta_gen("INSERT INTO codigos_padecimientos(codigo,id_usuario,fecha_registro) values('$codigo','$id_usuario','$fecha_hora')");
	$id_codigo = consulta_txt("SELECT id_codigo FROM codigos_padecimientos WHERE codigo = '$codigo'","id_codigo");


	for ($i=0; $i < count($DATA[0]); $i++) {
		$padecimiento = $DATA[0][$i]->name;
		consulta_gen("INSERT INTO nombres_padecimientos(id_codigo,padecimiento,id_usuario,fecha_registro) values('$id_codigo','$padecimiento','$id_usuario','$fecha_hora')");
	}

	?>
		<div class="alert alert-info" role="alert" style="margin-top:10px">
		  	Se registro el padecimiento
		  	<a href="?componente=desarrollar_padecimiento&padecimiento=<?php echo $id_codigo ?>" TARGET="_blank"  class="alert-link" style="text-decoration: none"> - Para continuar con el desarrollo haz click aqui</a>
		</div>
	<?php

 ?>