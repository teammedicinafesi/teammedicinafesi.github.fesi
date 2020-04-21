<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("funciones.php"); ?>
    <?php include("componentes/head.php"); ?>
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <style>
        .inciso{
            cursor: default;
        }
        .prueba{
            font-weight:500;
        }
    </style>

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
                            <?php include("formato.php"); ?>
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php include("componentes/footer.php"); ?>

    <script>    
        $(document).ready(function(){
            var reactivo = $(".reactivo").val()
            $(".numerito").html(reactivo+" - ") 

        })

        $(document).on("click",".inciso",function(){
            var opcion = $(this).attr("data")
            var controlador = parseInt($(".controlador").val())
             $(".evaluar").prop( "disabled",false)
            if (controlador == 0) {
                $(".momo i").removeClass("fa fa-circle")
                $(".momo i").addClass("fa fa-circle-o")
                $(".momo").removeClass("momo")
                $(this).addClass("momo")
                $(".momo i").addClass("fa fa-circle")                
            }
            else{
            }          
        })

        $(document).on("click",".evaluar",function(){
            var momo = $(".momo").html()
            opcion = $(".momo").attr("data")
            var contador = parseInt($(".contador").val())
            var controlador = parseInt($(".controlador").val())
            if (controlador == 0) {
                $(".controlador").val(1)
                if (opcion == "este") {
                    var nuevo_valor = parseInt(contador + 1)
                    $(".contador").val(nuevo_valor)
                    $(this).addClass("correcto")
                    $(".mensaje").html('<div class="alert alert-info" role="alert" style="margin-top:12px;font-size:0.9em;"><i class="fa fa-check"></i> Respuesta correcta &nbsp;&nbsp;<a href="#" class="siguiente"> Siguiente</a></div>');
                }
                else{
                    $(this).addClass("incorrecto")
                    $(".mensaje").html('<div class="alert alert-danger" role="alert" style="margin-top:12px;font-size:0.9em;"><i class="fa fa-times"></i> Respuesta incorrecta &nbsp;&nbsp;<a href="#" class="siguiente"> Siguiente</a></li> </ul></div>');
                }   
            }
            else{
            }
        })

        $(document).on("click",".siguiente",function(){
                var reactivo = parseInt($(".reactivo").val())
                var suma_reactivo = reactivo + 1;
                $(".reactivo").val(suma_reactivo)
                $(".numerito").html(suma_reactivo+" - ")

                var control_pregunta = $(".actual").attr("data")
                $(".controlador").val(0)
                if (control_pregunta == "ultima") {
                    var contador = parseInt($(".contador").val())
                    var num_reactivos = $(".preguntas .pregunta").length
                    var texto_regresar = $(".texto_regresar").val()
                    var ruta_regresar = $(".ruta_regresar").val()

                    var modulo_return = $(".modulo_return").val()
                    var link_return = $(".link_return").val()

                    $(".mensaje").html("")
                    $(".actual").html('Reactivos del cuestionario <strong>'+num_reactivos+'</strong> <br> Numero de aciertos <strong>'+contador+'</strong><br><br> <a href="'+link_return+'"> Regresar a reactivos '+modulo_return+'</a><br><a href="index.html" style="margin-top:4px"> Ir a Panel Principal&nbsp;&nbsp;</a><br>') 
                }   
                else{
                    $(".actual").hide()
                    var siguiente_pregunta = $(".actual").next().show()
                    $(".actual").removeClass("actual")
                    siguiente_pregunta.addClass("actual")
                    $(".mensaje").html('<button class="btn btn-outline-primary btn-sm evaluar" disabled="disabled">Evaluar</button>')      
                }
        })

        $(document).ready(function(){
            var num_reactivos = $(".preguntas .pregunta").length
            $(".num_reactivos").html(num_reactivos)
        })
    </script>

</body>

</html>
<!-- end document-->
