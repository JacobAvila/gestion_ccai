<?php
    $home = "../";
    include($home."api/lib.php");
    $divisiones = ['Sistemas Computacionales', 'Informática', 'Mecánica, Mecatrónica, Industrial', 'Electrónica', 'Química, Bioquímica', 'Gestión Empresarial', 'Contaduria'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos CCAI</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/estudiante.js"></script>
</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-user-circle-o fa-lg"></i> Nuevo Estudiante</h2>
            <div class="row mt-3 mb-3">
                <div class="col-3"></div>
                <div class="col-6">
                    <form  class="needs-validation" novalidate onsubmit="return validarNuevoEstudiante();">
                        <div class="form-group text-start">
                            <label class="form-label" for="matricula"><strong>Matricula</strong></label>
                            <input class="form-control" type="text" name="matricula" id="matricula" required>
                            <div class="valid-feedback" id="msg">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Ingresar matricula del estudiante
                            </div>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="nombres"><strong>Nombres</strong></label>
                            <input type="text" class="form-control" name="nombres" id="nombres" required>
                            <div class="valid-feedback" id="msg">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Ingresar Nombre del estudiante
                            </div>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="apellido_1"><strong>Apellido 1</strong></label>
                            <input type="text" class="form-control" name="apellido_1" id="apellido_1" required>
                            <div class="valid-feedback" id="msg">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Ingresar el Apellido del estudiante
                            </div>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="apellido_2"><strong>Apellido 2</strong></label>
                            <input type="text" class="form-control" name="apellido_2" id="apellido_2" required>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="correo"><strong>Correo Institucional</strong></label>
                            <input type="text" class="form-control" name="correo" id="correo" required>
                            <div class="valid-feedback" id="msg">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Ingresar el Correo del estudiante
                            </div>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="correo"><strong>Correo Adicional</strong></label>
                            <input type="text" class="form-control" name="correo_adicional" id="correo_adicional">
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="telefono"><strong>Teléfono</strong></label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="division"><strong>División</strong></label>
                            <select class="form-select" name="division" id="division">
                                <?php foreach($divisiones as $div){ ?>
                                    <option values="<?php echo $div; ?>"><?php echo $div; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="tipo"><strong>Programa</strong></label>
                            <select name="tipo" id="tipo" class="form-select">
                                <option value="Servicio Social">Servicio Social</option>
                                <option value="Residencias">Residencias</option>
                            </select>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="semestre"><strong>Semestre</strong></label>
                            <select name="semestre" id="semestre" class="form-select">
                                <option value="2024-1">2024-1</option>
                                <option value="2024-2">2024-2</option>
                            </select>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="password"><strong>Password</strong></label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="password_2"><strong>Confirmar Password</strong></label>
                            <input type="password" class="form-control" name="password_2" id="password_2" required>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button class="btn btn-secondary mx-3" type="reset" onClick="cancelarNuevoEstudiante()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                            <button class="btn btn-primary" type="submit" onClick="validarNuevoEstudiante()"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>            
        </div>
    </div>
</body>
</html>