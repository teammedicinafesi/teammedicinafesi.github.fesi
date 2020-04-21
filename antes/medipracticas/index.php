<!DOCTYPE html>
<html lang="es">

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
                           
                            <!--Comienza entradas-->
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                            <div class="bg-overlay bg-overlay--blue"></div>
                                            <h3>
                                                <i class="zmdi zmdi-account-calendar"></i>Contenidos Recientes</h3>
                                            <button class="au-btn-plus" style="cursor: context-menu;">
                                                <i class="zmdi zmdi-plus"></i>
                                            </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                            <div class="au-task__title">
                                                <p>Medipracticas</p>
                                            </div>
                                            <div class="au-task-list js-scrollbar3">
                                                <?php  
                                                    $consulta = mysqli_query($q_sec, "SELECT * FROM cuestionarios ORDER BY id_cuestionario desc LIMIT 4");
                                                    $contador = 1;
                                                    while ($array = mysqli_fetch_array($consulta)) {
                                                        $id_modulo = $array['id_modulo'];
                                                        $cuestionario = $array['cuestionario'];
                                                        $modulo = consulta_txt("SELECT modulo FROM modulos WHERE id_modulo='$id_modulo'","modulo");
                                                        $url = amigables($modulo)."/".amigables($cuestionario).".html";

                                                        $color;
                                                        if ($contador == 1) {$color = 'au-task__item--danger';}
                                                        if ($contador == 2) {$color = 'au-task__item--warning';}
                                                        if ($contador == 3) {$color = 'au-task__item--primary';}
                                                        if ($contador == 4) {$color = 'au-task__item--success';}

                                                        ?>
                                                        <div class="au-task__item <?php echo $color ?>">
                                                            <div class="au-task__item-inner">
                                                                <h5 class="task">
                                                                    <a href="<?php echo $url ?>"><?php echo $cuestionario ?></a>
                                                                </h5>
                                                                <span class="time"><?php echo $modulo ?></span>
                                                                
                                                            </div>
                                                        </div> 
                                                        <?php

                                                        $contador++;
                                                    }

                                                ?>
                                            </div>
                                            <br>
                                    </div>
                                </div>
                            </div>
                            <!--Termina entradas-->
                            <div class="col-sm-6">
                                <div class="col-sm-6 col-lg-12">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <?php 
                                                    $num = consulta_val("SELECT null FROM modulos");
                                                ?>
                                                <div class="text">
                                                    <h2 style="font-size:1.65em"><i class="fa fa-book"></i>  <?php echo $num ?> Modulos</h2>
                                                    <?php 
                                                        $consulta_modulos = mysqli_query($q_sec,"SELECT * FROM modulos order by id_modulo asc");
                                                        while ($array = mysqli_fetch_array($consulta_modulos)) {
                                                            $modulo = $array['modulo'];
                                                            $direccion = amigables($modulo)."/$index_modulos";
                                                            ?>
                                                                <span>
                                                                    <a href="<?php echo $direccion ?>" style="color:white"><?php echo $modulo ?></a>
                                                                </span><br>
                                                            <?php
                                                        }
                                                    ?>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="text">
                                                    <h2 style="font-size:1.65em">Siguenos en Redes Sociales</h2>
                                                    <span><a href="https://www.facebook.com/Team-Medicina-FESI-592118774549805/" target="_blank" style="color: white"><i class="fa fa-facebook-square"></i> TEAM MEDICINA</a></span><br><br>
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
                                    <?php include("componentes/copyright.php"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    <?php include("componentes/footer.php"); ?>
</body>

</html>
