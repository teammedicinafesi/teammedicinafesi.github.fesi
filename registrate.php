<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bell Bootstrap Template</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="bell/assets/img/favicon.png" rel="icon">
  <link href="bell/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="bell/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bell/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="bell/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="bell/assets/vendor/jquery/jquery.min.js"></script>


  <!-- Template Main CSS File -->
  <link href="bell/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bell - v2.0.0
  * Template URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section class="hero" style="padding-top:30px">
    <div class="container text-center" >
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="index.html" title="Home"><img alt="Bell Logo" src="bell/assets/img/logo.png"></a>
        </div>
      </div>
      <center>
      <div class="col-md-6" style="margin-top:-20px">
        <h1 style="font-size: 2.7em">
          Registrate
        </h1>
        
        <form class="form_user" action="" style="margin-top: 20px">
          <label for="" style="font-size: 1.1em">Nombre o Alias</label>
          <input type="text" class="form-control" name="nombre" style="margin-bottom: 9px;text-align: center">

          <label for="" style="font-size: 1.1em">Correo</label>
          <input type="text" class="form-control" name="correo" style="margin-bottom: 9px;text-align: center">

          <label for="" style="font-size: 1.1em">Contraseña (min 6 valores)</label>
          <input type="password" class="form-control" name="password" style="margin-bottom:22px;text-align: center">

          <button type="button" class="btn btn-primary btn_registro">Aceptar</button>
          <p style="margin-top:10px;display: none;color:white;font-weight: bolder;" class="mensaje_registro"></p>
        </form>
        
        
      </div>
      </center>
    </div>

  </section><!-- End Hero -->

  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

  <script>
    $(document).on('click','.btn_registro',function(){
        //$(".btn_agregar_subir").prop( "disabled",true)
        $.ajax({
            type:"POST",
            url:"protected/process_new_user.php",
            data:$(".form_user").serialize(),
            success:function(data){
              if (data == 'registrado') {
                $(".mensaje_registro").html("Registro Exitoso !!")
                window.location.href = "user.php";
              }
              else{
                $(".mensaje_registro").show()
                $(".mensaje_registro").html(data)
              }

                
            }
        });
    })
  </script>
  

  <!-- Vendor JS Files -->
  <script src="bell/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bell/assets/vendor/jquery.easing/jquery.easing.min.js"></script>

  <!-- Template Main JS File -->
  <script src="bell/assets/js/main.js"></script>

</body>

</html>