<?php $salto = "../"; $titulo = 'Cuestionarios Sistema Reproductor'; $modulo = 'Sistema Reproductor'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../funciones.php"); ?>
    <?php include("../componentes/head.php"); ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <?php include("../componentes/header_movil.php"); ?>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <?php include("../componentes/menu_sidebar.php"); ?>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <?php include("../componentes/header_desktop.php"); ?>
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
                                        <h3 class="title-2 tm-b-5">Cuestionarios - Sistema Reproductor</h3>
                                        
                                        <p style="margin-top: 15px;font-size: .9em">Materiales disponibles</p>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <?php 
                                                        $consulta = mysqli_query($q_sec,"SELECT * FROM cuestionarios WHERE id_modulo='7' order by id_cuestionario asc");
                                                        $control_color = 0;
                                                        while  ($array  = mysqli_fetch_array($consulta)) {
                                                                $cuestionario = $array['cuestionario'];
                                                                $direccion = amigables($cuestionario).".html";
                                                                $id_cuestionario = $array['id_cuestionario'];
                                                                $num_preguntas = consulta_val("SELECT null FROM preguntas WHERE id_cuestionario='$id_cuestionario'");

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
                                                                <div class="mr-0 d-block">
                                                                    <span>
                                                                        <a href="<?php echo $direccion ?>" style="color:#666">
                                                                            <?php echo $cuestionario ?>
                                                                            <span style="font-size:.8em">
                                                                                <?php echo " (Preguntas: $num_preguntas)" ?>
                                                                            </span>
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
                                    <?php include("../componentes/copyright.php"); ?>
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
    <?php include("../componentes/footer.php"); ?>

</body>

</html>
<!-- end document-->
