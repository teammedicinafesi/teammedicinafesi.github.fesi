<?php 
	include("../../funciones.php");
	$id_sistema = sanitizar_post("id_sistema");

	consulta_gen("DELETE FROM sistemas WHERE id_sistema='$id_sistema'");

	echo "Se elimino el sistema";
?>