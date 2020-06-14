<?php 
  //$principal_get = sanitizar_get("principal");
  //$secundario_get = sanitizar_get("secundario");
  
  if ($principal_get == '') {
      
  }
  if ($principal_get == 'sistemas') {
 		include("panel_admin/sistemas/index.php");
  }
  if ($principal_get == 'especialidades') {
 		include("panel_admin/especialidades/index.php");
  }

?>