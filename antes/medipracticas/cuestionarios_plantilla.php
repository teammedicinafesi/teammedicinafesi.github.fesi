<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("funciones.php"); ?>
    <?php include("componentes/head.php"); ?>
    <script src="vendor/jquery-3.2.1.min.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <?php include("componentes/header_movil.php"); ?>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <?php include("componentes/menu_sidebar.php"); ?>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <?php include("componentes/header_desktop.php"); ?>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Reactivos - Modulos</h3>
                                        
                                        <p style="margin-top: 15px;font-size: .9em">Seleccione el modulo para el cual quiere observar los ejercicios disponibles con los que se cuenta</p>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <?php 
                                                        $consulta = mysqli_query($q_sec,"SELECT * FROM modulos order by id_modulo asc");
                                                        $control_color = 0;
                                                        while  ($array  = mysqli_fetch_array($consulta)) {
                                                                $modulo = $array['modulo'];
                                                                $direccion = amigables($modulo)."/$index_modulos";
                                                                if ($control_color == '0') {
                                                                    $color         =  "dot--blue";
                                                                    $control_color =  1;
                                                                    $otro_control  =  "nop";
                                                                }
                                                                if ($control_color == '1' && $otro_control == 'yes') {
                                                                    $color         =  "dot--red";
                                                                    $control_color =  0;
                                                                }
                                                                $otro_control = 'yes';
                                                                ?>
                                                                <div class="chart-note mr-0 d-block">
                                                                    <span class="dot <?php echo $color ?>"></span>
                                                                    <span>
                                                                        <a href="<?php echo $direccion ?>" style="color:#666">
                                                                            <?php echo $modulo ?>
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                                <?php

                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <?php include("componentes/footer.php"); ?>

</body>

</html>
<!-- end document-->
