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
            <?php include("componentes/header.php"); ?>
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
                                    <h3 class="title-2 tm-b-5">Crear un cuestionario</h3><br>
                                    <div class="row no-gutters">
                                        <?php include("formulario_registrar_cuestionario.php"); ?>
                                        <div class="col-md-12 mensaje"></div>   
                                    </div>
                                    <br>
                                    <div class="row no-gutters">
                                        <?php include("table_formulario.php"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
        <script>
        $(document).on('click','.btn_siguiente',function(e){
            e.preventDefault()
            $(".form_registro_cuestionario").hide()
            $(".form_registro_campos").show()
        })
        $(document).on('click','.btn_regresar',function(e){
            e.preventDefault()
            $(".form_registro_campos").hide()
            $(".form_registro_cuestionario").show()
        })
        $(document).on('click','.registrar_pregunta',function(e){
            e.preventDefault()
            var pregunta = $(".pregunta").val()
            var opcion_a = $(".opcion_a").val() 
            var opcion_b = $(".opcion_b").val() 
            var opcion_c = $(".opcion_c").val() 
            var opcion_d = $(".opcion_d").val() 
            var opcion_e = $(".opcion_e").val() 
            var correcto = $('input:radio[name=correcto]:checked').val();

            $(".trs").append("<tr><td>M</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>")
            $(".trs tr:last td:eq(0)").html(pregunta)
            $(".trs tr:last td:eq(1)").html(opcion_a)
            $(".trs tr:last td:eq(2)").html(opcion_b)
            $(".trs tr:last td:eq(3)").html(opcion_c)
            $(".trs tr:last td:eq(4)").html(opcion_d)
            $(".trs tr:last td:eq(5)").html(opcion_e)
            $(".trs tr:last td:eq(6)").html(correcto)
            $(".trs tr:last td:eq(7)").html("<input type='text' style='border: 1px solid #D5DBDB;width:40px;text-align:center'>")

        })

        $(document).on('click','.otra_pregunta',function(e){
            e.preventDefault()
            $(".s").val('')
        })

        $(document).on('click','.registrar_cuestionario',function(e){
            e.preventDefault()
            var arreglo = []
            
            var bob = []
            var nombre_cuestionario = $(".nombre_cuestionario").val()
            var id_modulo           = $(".id_modulo").val()
            bob[0] = nombre_cuestionario;
            bob[1] = id_modulo;
            arreglo.push(bob)

            var caja    = []
            $(".trs tr").each(function(){
                item = {};
                
                pregunta = $(this).find("td:eq(0)").html()
                opcion_a = $(this).find("td:eq(1)").html()
                opcion_b = $(this).find("td:eq(2)").html()
                opcion_c = $(this).find("td:eq(3)").html()
                opcion_d = $(this).find("td:eq(4)").html()
                opcion_e = $(this).find("td:eq(5)").html()
                correcto = $(this).find("td:eq(6)").html()

                item ["pregunta"] = pregunta;
                item ["opcion_a"] = opcion_a;
                item ["opcion_b"] = opcion_b;
                item ["opcion_c"] = opcion_c;
                item ["opcion_d"] = opcion_d;
                item ["opcion_e"] = opcion_e;
                item ["correcto"] = correcto;

                caja.push(item); 
            
            });

            arreglo.push(caja)
            console.log(arreglo);

            info      = new FormData();
            procesado = JSON.stringify(arreglo);
            info.append('data', procesado);

            $.ajax({
                data: info,
                type: 'POST',
                url : 'process_cuestionario.php',
                processData: false, 
                contentType: false,
                success: function(data){
                    $(".mensaje").html(data)
                    //Una vez que se haya ejecutado de forma exitosa hacer el código para que muestre esto mismo.
                }
            });
        })
    </script>
    <?php include("componentes/footer.php"); ?>
</body>

</html>
