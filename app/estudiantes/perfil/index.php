<?php
$home = "../../../";
include($home."api/lib.php");

$daoE = new DAOEstudiante();
$est = $daoE->registro($user->id_estudiante);

$daoP = new DAOPrograma();
$programa = $daoP->registroEstatus($user->id_estudiante, "Activo");
$prog = (count($programa) > 0)?$programa[0]:new Programa();


$divisiones = ['Sistemas Computacionales', 'Informática', 'Mecánica, Mecatrónica, Industrial', 'Electrónica', 'Química, Bioquímica', 'Gestión Empresarial', 'Contaduria'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../../../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../../../js/jquery-3.7.1.js"></script>
    <script src="../../../js/bootstrap.bundle.js"></script>
    <script src="../../../js/axios.js"></script>
    <script src="../js/estudiante.js"></script>
    
    <title>Sistema Estudiantes</title>
</head>
<body>
    <?php include("../topbar.php"); ?>
    <div class="row">
        <div class="col-2">
            <?php include("../sidebar.php"); ?>
        </div>
        <div class="col-10">
            <div class="main">
                <div class="text-start">
                    <h2>Mi Perfil</h2>
                    <div class="row">
                        <div class="col-4">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-10">Datos Personales</div>
                                                <div class="col-2">
                                                    <div class="form-group text-center" id="editarbtn">
                                                        <button type="button" class="btn btn-primary btn-sm" onclick="editarPerfil()">Editar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <form id="editar" class="needs-validation" novalidate>
                                                <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $est->id_estudiante; ?>">
                                                <div class="form-group">
                                                    <label class="form-label" for="matricula"><strong>Matricula</stong></label>
                                                    <input type="text" class="form-control" name="matricula" id="matricula" value="<?php echo $est->matricula; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="nombres"><strong>Nombres</stong></label>
                                                    <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $est->nombres; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="apellido_1">Apellido 1</label>
                                                    <input type="text" class="form-control" name="apellido_1" id="apellido_1" value="<?php echo $est->apellido_1; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="apellido_2">Apellido 2</label>
                                                    <input type="text" class="form-control" name="apellido_2" id="apellido_2" value="<?php echo $est->apellido_2; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="correo">Correo Institucional</label>
                                                    <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $est->correo; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="correo_adicional">Correo Adicional</label>
                                                    <input type="text" class="form-control" name="correo_adicional" id="correo_adicional" value="<?php echo $est->correo_adicional; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="telefono">Teléfono</label>
                                                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $est->telefono; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="division">División</label>
                                                    <select class="form-select" name="division" id="division" disabled>
                                                        <?php foreach($divisiones as $div){ 
                                                            $sel = ($est->division == $div)?"selected":"";
                                                        ?>
                                                            <option value="<?php echo $div; ?>" <?php echo $sel; ?>><?php echo $div; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div id="actualizarbtn" class="text-center invisible">
                                                    <button class="btn btn-sm btn-secondary mt-3 mx-3" type="reset" onclick="cancelarEditarPerfil()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                                                    <button class="btn btn-sm btn-success mt-3" type="sumbit" onclick="actualizarPerfil()"><i class="fa fa-save"></i> Actualizar</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-3">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-9"><?php echo $user->tipo; ?></div>
                                                <div class="col-2">
                                                    <div class="form-group text-center" id="editarProgbtn">
                                                        <button type="button" class="btn btn-primary btn-sm" onclick="editarPrograma()">Editar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <form id="editarProg" class="needs-validation" novalidate>
                                                <div class="form-group">
                                                    <label class="form-label" for="semestre"><strong>Semestre</stong></label>
                                                    <input type="text" class="form-control" name="semestre" id="semestre" value="<?php echo $prog->semestre; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="fecha_inicio"><strong>Fecha de Inicio</stong></label>
                                                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $prog->fecha_inicio; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="fecha_fin"><strong>Fecha de Fin</stong></label>
                                                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo $prog->fecha_fin; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="estatus"><strong>Estatus</stong></label>
                                                    <input type="text" class="form-control" name="estatus" id="estatus" value="<?php echo $prog->estatus; ?>" readonly>
                                                </div>
                                                <div id="actualizarProgbtn" class="text-center invisible">
                                                    <button class="btn btn-sm btn-secondary mt-3 mx-3" type="reset" onclick="cancelarEditarPrograma()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                                                    <button class="btn btn-sm btn-success mt-3" type="sumbit" onclick="actualizarPrograma()"><i class="fa fa-save"></i> Actualizar</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                    Cambiar Contraseña
                                </button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--- Modal Cambio de Contraseña -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="passwordModalLabel">Cambio de Contraseña</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                </div>
                <div class="modal-body">
                    <form id="cambio" class="needs-validation" novalidate onsubmit="return validarPassword()">
                        <div class="form-group">
                            <label class="form-label" for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password2">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password2" id="password2" required>
                            <div class="invalid-feedback">
                                Las contraseñas no coinciden
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="sumbit" class="btn btn-primary" onClick="validarPassword()">Guardar Contraseña</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>