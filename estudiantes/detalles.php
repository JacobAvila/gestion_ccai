<?php
    $home = "../";
    include($home."api/lib.php");
    $dao = new DAOEstudiante();

    $id_estudiante = $_REQUEST["id"];
    $est = $dao->registro($id_estudiante);

    $estatues = ['Activo', 'Inactivo'];
    $programas = ['Servicio Social', 'Residencias'];

    $daoP = new DAOProyecto();
    $proyectosCoor = $daoP->listadoPorEstudianteID($id_estudiante);

    $daoS = new DAOSemestre();
    $sems = $daoS->listado();
    $semestres = [];
    foreach($sems as $se){
        array_push($semestres, $se->nombre);
    }

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
    <script src="../js/axios.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/estudiante.js"></script>
</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-user-circle-o fa-lg"></i> Estudiante</h2>
            <div class="row mt-5 mb-3 align-top">
                <div class="col-2"></div>
                    <div class="col-5">
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Detalles del Estudiante</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form id="editar" class="needs-validation" novalidate onsubmit="return actualizarEstudiante();">
                                        <div class="row g-2 align-items-start text-start">
                                            <div class="col-3">
                                                <label  class="col-form-label" for="id_estudiante"><strong>ID Estudiante</strong></label >
                                            </div>
                                            <div class="col-auto">
                                                <input class="form-control form-control-sm" type="text" name="id_estudiante" id="id_estudiante" value="<?php echo $est->id_estudiante; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="matricula"><strong>Matricula</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="matricula" id="matricula" value="<?php echo $est->matricula; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="nombres"><strong>Nombres</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="nombres" id="nombres" value="<?php echo $est->nombres; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="apellido_1"><strong>Apellido 1</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="apellido_1" id="apellido_1" value="<?php echo $est->apellido_1; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="apellido_2"><strong>Apellido 2</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="apellido_2" id="apellido_2" value="<?php echo $est->apellido_2; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="correo"><strong>Correo</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="correo" id="correo" value="<?php echo $est->correo; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="correo_adicional"><strong>Correo Adicional</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="correo_adicional" id="correo_adicional" value="<?php echo $est->correo_adicional; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="telefono"><strong>Telefono</strong></label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm" name="telefono" id="telefono" value="<?php echo $est->telefono; ?>"  readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="division"><strong>División</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select" name="division" id="division" required disabled>
                                                <option></option>
                                                    <?php foreach($divisiones as $div){ 
                                                        $sel = "";
                                                        if($div == $est->division){
                                                            $sel = "selected";
                                                        }
                                                    ?>
                                                    <option value="<?php echo $div; ?>" <?php echo $sel; ?>><?php echo $div; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="tipo"><strong>Programa</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select" name="tipo" id="tipo" required disabled>
                                                    <option></option>
                                                    <?php foreach($programas as $prog){ 
                                                        $sel = "";
                                                        if($prog == $est->tipo){
                                                            $sel = "selected";
                                                        }
                                                    ?>
                                                    <option value="<?php echo $prog; ?>" <?php echo $sel; ?>><?php echo $prog; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="coordinador"><strong>Estatus</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select" name="estatus" id="estatus" required disabled>
                                                    <option></option>
                                                    <?php foreach($estatues as $estatus){ 
                                                        $sel = "";
                                                        if($estatus == $est->estatus){
                                                            $sel = "selected";
                                                        }
                                                    ?>
                                                    <option value="<?php echo $estatus; ?>" <?php echo $sel; ?>><?php echo $estatus; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-3">
                                                <label class="form-label" for="semestre"><strong>Semestre</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select" name="semestre" id="semestre" required disabled>
                                                    <?php foreach($semestres as $sem){ 
                                                        $sel = "";
                                                        if($sem == $est->semestre){
                                                            $sel = "selected";
                                                        }
                                                    ?>
                                                    <option value="<?php echo $sem; ?>" <?php echo $sel; ?>><?php echo $sem; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="editarbtn" class="text-center visible">
                                            <button class="btn btn-sm btn-primary mt-3" type="button" onClick="editarEstudiante()"><i class="fa fa-edit"></i> Editar</button>
                                        </div>
                                        <div id="actualizarbtn" class="text-center invisible">
                                            <button class="btn btn-sm btn-secondary mt-3 mx-3" type="reset" onclick="cancelarEditarEstudiante()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                                            <button class="btn btn-sm btn-success mt-3" type="sumbit" onclick="actualizarEstudiante()"><i class="fa fa-save"></i> Actualizar</button>
                                        </div>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead class="table-success">
                                    <tr class="table-dark">
                                        <th colspan="3">Proyecto</th>
                                    </tr>
                                    <tr class="table-secondary">
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($proyectosCoor as $coor){ ?>

                                        <tr>
                                            <td><?php echo $coor->id_proyecto; ?></td>
                                            <td class="text-start"><?php echo $coor->titulo_esp; ?></td>
                                            <td><?php echo $coor->estatus; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>