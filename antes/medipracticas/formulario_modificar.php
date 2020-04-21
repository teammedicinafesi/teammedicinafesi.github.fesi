<div class="col-md-6 form_registro_cuestionario">
    <form class="form-horizontal form_datos_cuestionario">

        <!-- Modulo--> 
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="select" class="form-control-label">Modulo</label>
            </div>
            <div class="col-12 col-md-9">
                <select name="select" id="select" class="form-control id_modulo modulo_select">
                    <option value="">--</option>
                    <?php 
                        $consulta = mysqli_query($q_sec,"SELECT * FROM modulos order by id_modulo asc");
                        while ($array = mysqli_fetch_array($consulta)) {
                            $id_modulo = $array['id_modulo'];
                            $modulo = $array['modulo'];
                            echo "<option value='$id_modulo'>$modulo</option>";
                        }
                    ?>
                </select>
            </div>

        </div>

                <!-- Modulo--> 
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="select" class="form-control-label">Cuestionario</label>
            </div>
            <div class="col-12 col-md-9">
                <select name="id_cuestionario" id="select" class="form-control cuestionario_select">
                    <option value="">--</option>
                    
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="select" class="form-control-label">Pa cambiar</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control nombresillo">
            </div>

        </div>
        <!-- Botones-->
        <div class="row form-group">
            <div class="col col-md-3">
            </div>
            <div class="col-12 col-md-9">
                <button class="btn btn-primary btn-sm btn_siguiente">
                    <i class="fa fa-dot-circle-o"></i> Siguiente
                </button>
            </div>
        </div> 

    </form>    
</div>
<div class="row form_registro_campos" style="display: none">
    <div class="col-md-6">
        <form class="form-horizontal">
            <!-- Preguntas-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Pregunta</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control pregunta s">
                </div>
            </div>
            <!-- Opcion A-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Opcion A</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control opcion_a s">
                </div>
            </div>
            <!-- Opcion B-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Opcion B</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control opcion_b s">
                </div>
            </div>
            <!-- Opcion C-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class="form-control-label">Opcion C</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control opcion_c s">
                </div>
            </div>
            <!-- Opcion D-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class="form-control-label">Opcion D</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control opcion_d s">
                </div>
            </div>
            <!-- Opcion E opcional-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class="form-control-label">Opcion E</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control opcion_e s">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5" style="margin-left:20px">
        <form class="form-horizontal">
            <!-- Opciones correctas-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Opcion Correcta</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" name="correcto" value="a" class="form-check-input correcto">A &nbsp;&nbsp;
                        </label>
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" name="correcto" value="b" class="form-check-input correcto">B &nbsp;&nbsp;
                        </label>
                        <label for="inline-radio3" class="form-check-label ">
                            <input type="radio" name="correcto" value="c" class="form-check-input correcto">C &nbsp;&nbsp;
                        </label>
                        <label for="inline-radio3" class="form-check-label ">
                            <input type="radio" name="correcto" value="d" class="form-check-input correcto">D &nbsp;&nbsp;
                        </label>
                        <label for="inline-radio3" class="form-check-label ">
                            <input type="radio" name="correcto" value="e" class="form-check-input correcto">E 
                        </label>
                    </div>
                </div>
            </div>
            <!-- Botones-->
            <button class="btn btn-primary btn-sm registrar_pregunta">
                <i class="fa fa-dot-circle-o"></i> Registrar Pregunta
            </button>
            <button class="btn btn-primary btn-sm otra_pregunta"style="margin-top: 10px">
                <i class="fa fa-dot-circle-o"></i> Limpiar campos del formulario
            </button>
            <button class="btn btn-success btn-sm guardar_cambios" style="margin-top: 10px">
                <i class="fa fa-dot-circle-o"></i> Guardar Cambios
            </button>

            <button class="btn btn-warning btn-sm btn_regresar" style="margin-top: 10px">
                <i class="fa fa-dot-circle-o"></i> Regresar
            </button>
        </form>
    </div>
</div>

