<!DOCTYPE html>
<html>
<head>
  <?php 
    include("funciones.php");
    $principal_get = sanitizar_get("principal");
    $secundario_get = sanitizar_get("secundario");
  ?>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Plantilla</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include("componentes_admin/estilos.php"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include("componentes_admin/header.php"); ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include("componentes_admin/aside.php"); ?>


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php include("controlador_admin.php"); ?>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("componentes_admin/footer.php"); ?>
  

  <!-- Control Sidebar -->
  <?php //include("componentes/aside_derecha.php"); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<?php include("componentes_admin/scripts.php"); ?>
</body>
</html>
