<?php
$home = "../../../";
include($home."api/lib.php");
$dao = new DAOProyecto();

$id_proyecto = $_REQUEST['id'];

$proy = $dao->registro($id_proyecto)[0];

$daoP = new DAOParticipante();

$ss = $daoP->listadoPorProyectoPrograma($id_proyecto, "Servicio Social");
$res = $daoP->listadoPorProyectoPrograma($id_proyecto, "Residencias");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link href="../../../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../../../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/bootstrap.bundle.js"></script>
    <script src="../../../js/axios.js"></script>
    <script src="../js/proyectos.js"></script>
    
    <title>Sistema CCAI</title>
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
                    <h2>Proyecto</h2>
                    <div class="row">
                        <div class="col-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><?php echo $proy->id_proyecto; ?></td>
                                        <td><?php echo $proy->titulo; ?></td>
                                        <td><?php echo date_format(new DateTime($proy->fecha_inicio), "d/m/Y"); ?></td>
                                        <td>Avance</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <strong>Objetivo</strong><br>
                                            <?php echo $proy->objetivo; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <strong>Descripción</strong><br>
                                            <?php echo $proy->descripcion; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <strong>Integrantes</strong><br>
                                            <?php foreach($ss as $s){ ?>
                                                <div class="row">
                                                    <div class="col-4"><?php echo $s->nombre; ?></div>
                                                    <div class="col-4"><?php echo $s->division; ?></div>
                                                    <div class="col-4"><?php echo $s->programa; ?></div>
                                                </div>
                                            <?php } ?>
                                            <hr/>
                                            <?php foreach($res as $r){ ?>
                                                <div class="row">
                                                    <div class="col-4"><?php echo $r->nombre; ?></div>
                                                    <div class="col-4"><?php echo $r->division; ?></div>
                                                    <div class="col-4"><?php echo $r->programa; ?></div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="3">Plan de Trabajo</th>
                                        <th>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#actividadModal">
                                                <i class="fa fa-plus"></i> Actividad
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Actividad</td>
                                        <td>Fecha</td>
                                        <td>Estatus</td>
                                        <td>Detalles</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Modal Actividades -->
    <div class="modal fade" id="actividadModal" tabindex="-1" aria-labelledby="actividadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="actividadModalLabel">Programar Actividad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-label">Actividad</label>
                        <textarea class="form-control" name="actividad" id="actividad" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Fecha Requerida</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asignado a:</label>
                        <select class="form-select" name="asignado" id="asignado">
                            <option value=""></option>
                            <option value="todos">Todos</option>
                            <?php foreach($ss as $s){ ?>
                                <option value="<?php echo $s->id_estudiante; ?>"><?php echo $s->nombre; ?></option>
                            <?php } ?>
                            <?php foreach($res as $r){ ?>
                                <option value="<?php echo $r->id_estudiante; ?>"><?php echo $r->nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarActividad('<?php $id_proyecto; ?>')">Guardar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>