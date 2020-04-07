    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php 
            if ($titulo != '' ) {
                echo "$titulo";
            } 
            else{
                echo "Medipracticas";
            }
        ?>">
    <meta name="author" content="csmfesi">
    <meta name="keywords" content="<?php 
            if ($modulo != '' ) {
                echo "$modulo";
            } 
            else{
                echo "Medipracticas";
            }
        ?>  ">

    <!-- Title Page-->
    <title>
        <?php 
            if ($titulo != '' ) {
                echo "$titulo";
            } 
            else{
                echo "Medipracticas";
            }
        ?>        
    </title>

    <!-- Fontfaces CSS-->
    <link href="<?php  echo $salto; ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="<?php  echo $salto; ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php  echo $salto; ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php  echo $salto; ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php  echo $salto; ?>css/theme.css" rel="stylesheet" media="all">
    <script src="<?php  echo $salto; ?>vendor/jquery-3.2.1.min.js"></script>