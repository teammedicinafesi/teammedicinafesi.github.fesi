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
                            <div class="col-md-12">
                                <div class="card">
                                    <img class="card-img-top" src="img/portad.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Medipracticas</h4>
                                        <p class="card-text">Un proyecto que nace con la finalidad de crear un espacio en linea para la preparacion en nuestros estudios de los primeros años como futuros medicos
                                        </p>
                                    </div>
                                </div>
                            </div>
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
                                                    $consulta = mysqli_query($q_sec, "SELECT * FROM cuestionario ORDER BY id_cuestionario desc LIMIT 4");
                                                    $contador = 1;
                                                    while ($array = mysqli_fetch_array($consulta)) {
                                                        $id_modulo = $array['id_modulo'];
                                                        $nombre = $array['nombre'];
                                                        $modulo = consulta_txt("SELECT modulo FROM modulos WHERE id_modulo='$id_modulo'","modulo");
                                                        $url = amigables($modulo)."/".amigables($nombre).".html";

                                                        $color;
                                                        if ($contador == 1) {$color = 'au-task__item--danger';}
                                                        if ($contador == 2) {$color = 'au-task__item--warning';}
                                                        if ($contador == 3) {$color = 'au-task__item--primary';}
                                                        if ($contador == 4) {$color = 'au-task__item--success';}

                                                        ?>
                                                        <div class="au-task__item <?php echo $color ?>">
                                                            <div class="au-task__item-inner">
                                                                <h5 class="task">
                                                                    <a href="<?php echo $url ?>"><?php echo $nombre ?></a>
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

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2><i class="fa fa-book"></i>  10 Modulos</h2>
                                                <span><a href="" style="color:white">Sistema Nervioso</a></span><br>
                                                <span><a href="" style="color:white">Sistema Endocrino</a></span><br>
                                                <span><a href="" style="color:white">Sistema O.M.A</a></span><br>
                                                <span><a href="" style="color:white">Sistema Cardiovascular</a></span><br>
                                                <span><a href="" style="color:white">Sistema Respiratorio</a></span><br>
                                                <span><a href="" style="color:white">Sistema Hematologico</a></span><br>
                                                <span><a href="" style="color:white">Sistema Digestivo</a></span><br>
                                                <span><a href="" style="color:white">Sistema Reproductor</a></span><br>
                                                <span><a href="" style="color:white">Sistema Urinario</a></span><br>
                                                <span><a href="" style="color:white">Sistema Tegumentario</a></span><br>
                                                <span><a href="" style="color:white">Sistema Inmunologico</a></span><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2>Siguenos en Redes Sociales</h2>
                                                <span><a href="https://www.facebook.com/Comité-Social-Medicina-FESI-592118774549805/" target="_blank" style="color: white"><i class="fa fa-facebook-square"></i> CSM FESI</a></span><br><br>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Medipracticas. <a href="csmfesi.github.io"> Comite Social de Medicina</a>.</p>
                                    <br>
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
