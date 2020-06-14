<!DOCTYPE html>
<html>
<head>
  <?php 
    session_start();
    include("funciones.php"); 
    if ($_SESSION['accesso'] == "acceso") {
          #header("Location: ./");
          $_SESSION['id_usuario'];
          $_SESSION['nombre'];
          $nombre = $_SESSION['nombre'];
          $id_usuario = $_SESSION['id_usuario'];
      }
      else{
          header("Location: acceso.php");
      }


      $principal_get = sanitizar_get("principal");
      $secundario_get = sanitizar_get("secundario");
  ?>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Plantilla</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include("componentes/estilos.php"); ?>
</head>
<style>
  a{
    text-decoration: none;
  }
  a:hover{
    text-decoration: none;
  }
  a:transition{
    text-decoration: none;
  }
  .margen_tabla{
    border-bottom:1px solid #D7DBDD;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include("componentes/header.php"); ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include("componentes/aside.php"); ?>


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php include("controlador.php"); ?>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("componentes/footer.php"); ?>
  

  <!-- Control Sidebar -->
  <?php //include("componentes/aside_derecha.php"); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include("componentes/scripts.php"); ?>
</body>
</html>
