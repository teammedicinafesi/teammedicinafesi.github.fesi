    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a href="<?php  echo $salto.$index; ?>" style="color:black;font-size:1.1em">
                    <strong>Medipracticas TM</strong>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">

                <li>
                    <a class="js-arrow" href="<?php  echo $salto.$index; ?>">
                        <i class="fas fa-tachometer-alt"></i>Indice
                    </a>                          
                </li>
                <li>
                    <a href="<?php  echo $salto.$cuestionarios; ?>">
                        <i class="fas fa-list"></i>Cuestionarios</a>
                </li>
                <li>
                    <a href="<?php  echo $salto.$casos; ?>">
                        <i class="fas fa-h-square"></i>Casos Clinicos</a>
                </li>
                <li>
                    <a href="<?php  echo $salto.$recomendaciones; ?>">
                        <i class="fas fa-book"></i>Recomendaciones</a>
                </li>
                <li>
                    <a href="<?php  echo $salto.$contacto; ?>">
                        <i class="fas fa-location-arrow"></i>Contacto</a>
                </li><!--
                <li>
                    <a href="map.html">
                        <i class="fas fa-stethoscope"></i>Cultura Medica
                    </a>
                </li>--><!--desspues meter consejos, cuestiones pedagogicas etc etc-->                  
            </ul>
        </div>
    </nav>