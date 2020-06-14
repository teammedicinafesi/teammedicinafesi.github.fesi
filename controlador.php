<?php 
  //$principal_get = sanitizar_get("principal");
  //$secundario_get = sanitizar_get("secundario");
  
  if ($principal_get == '') {
     	include("panel_user/padecimientos/listado_padecimientos.php");
  }
  if ($principal_get == 'listado_padecimientos') {
     	include("panel_user/padecimientos/listado_padecimientos.php");
  }
  if ($principal_get == 'agregar_padecimiento') {
 		include("panel_user/agregar_padecimiento.php"); 	
  }

?>