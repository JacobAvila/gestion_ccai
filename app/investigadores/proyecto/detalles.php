<?php
$home = "../../../";
include($home."api/lib.php");
$dao = new DAOProyecto();

$id_proyecto = $_REQUEST['id'];

$proy = $dao->registro($id_proyecto)[0];

$daoP = new DAOParticipante();

$ss = $daoP->listadoPorProyectoPrograma($id_proyecto, "Servicio Social");
$res = $daoP->listadoPorProyectoPrograma($id_proyecto, "Residencias");

$daoSe = new DAOSemestre();
$sem = $daoSe->registroEstatus('Activo');

$daoPT = new DAOPlanTrabajo();
$plan = $daoPT->listado($id_proyecto, $sem->nombre);

$daoAP = new DAOActividadParticipante();


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
                        <div class="col-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $proy->id_proyecto; ?><br>
                                            <span class="lead"><?php echo $proy->titulo; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Objetivo</strong><br>
                                            <span class="small"><?php echo $proy->objetivo; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Descripción</strong><br>
                                            <span class="small"><?php echo $proy->descripcion; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Integrantes</strong><br>
                                            <?php foreach($ss as $s){ ?>
                                                <div class="row small">
                                                    <div class="col-4"><?php echo $s->nombre; ?></div>
                                                    <div class="col-4"><?php echo $s->division; ?></div>
                                                    <div class="col-4"><?php echo $s->programa; ?></div>
                                                </div>
                                            <?php } ?>
                                            <hr/>
                                            <?php foreach($res as $r){ ?>
                                                <div class="row small">
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
                        <div class="col-7">
                            <table class="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th colspan="5">Plan de Trabajo</th>
                                        <th>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#actividadModal">
                                                <i class="fa fa-plus"></i> Actividad
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Actividad</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Asignado</th>
                                        <th class="text-center">Avance</th>
                                        <th></th>
                                    </tr>
                                    <?php 
                                        $count = 1; 
                                        foreach($plan as $pl){ 
                                            $alum = $pl->asignado;
                                            if($pl->asignado != "todos" && $pl->asignado != "servicio" && $pl->asignado != "residencias"){
                                                $alum = $daoP->registroPorEstudiante($pl->asignado)->nombre;
                                            }
                                    ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $pl->actividad; ?></td>
                                            <td class="text-center"><?php echo $pl->fecha_fin; ?></td>
                                            <td class="text-center small"><?php echo $alum; ?></td>
                                            <td class="text-center"><?php echo $pl->avance."%"; ?></td>
                                            <td class="text-end">
                                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $pl->id_actividad; ?>" aria-expanded="false" aria-controls="collapse<?php echo $pl->id_actividad; ?>" onclick="mostrarActividad('<?php echo $pl->id_proyecto; ?>', '<?php echo $pl->id_actividad; ?>')">
                                                    <i class="fa fa-caret-right fa-lg" id="ico<?php echo $pl->id_actividad; ?>"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <div class="collapse" id="collapse<?php echo $pl->id_actividad; ?>">
                                                    <div class="text-start" id="content<?php echo $pl->id_actividad; ?>">
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $count++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-1"></div>
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
                        <label class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
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
                            <option value="servicio">Servicio Social</option>
                            <option value="residencias">Residencias</option>
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
                <button type="button" class="btn btn-primary" onclick="guardarActividad('<?php echo $id_proyecto; ?>')">Guardar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>