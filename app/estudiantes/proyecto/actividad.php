<?php
$home = "../../../";
include($home."api/lib.php");

$id_actividad = $_REQUEST['id'];

$daoP = new DAOParticipante();
$proy = $daoP->registroPorEstudiante($user->id_estudiante);

$daoS = new DAOSemestre();
$sem = $daoS->registroEstatus("Activo");

$daoPT = new DAOPlanTrabajo();
$actividad = $daoPT->registro($id_actividad, $proy->id_proyecto, $sem->nombre)[0];

$actividadesTodos = $daoPT->listadoPorAsignacion($proy->id_proyecto, $sem->nombre, "todos");
$tipo = ($user->tipo == "Servicio Social")?"servicio":(($user->tipo == "Residencias")?"residencias":"");
$actividadesPrograma = [];
if($tipo != ""){
    $actividadesPrograma = $daoPT->listadoPorAsignacion($proy->id_proyecto, $sem->nombre, $tipo);
}
// Actividades para Mi
$actividadesPropias = $daoPT->listadoPorAsignacion($proy->id_proyecto, $sem->nombre, $user->id_estudiante);

$actividades = [];
foreach($actividadesTodos as $act){
    $actividades[$act->id_actividad] = $act;
}
foreach($actividadesPrograma as $act){
    $actividades[$act->id_actividad] = $act;
}
foreach($actividadesPropias as $act){
    $actividades[$act->id_actividad] = $act;
}
ksort($actividades);


$daoA = new DAOActividadParticipante();
$misActividades = $daoA->listadoPorActividad($proy->id_proyecto, $id_actividad);

$daoE = new DAOEstudiante();

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
    <script>
        $(document).ready(function(){
            $('[data-bs-toggle="popover"]').popover(); 
        });
    </script>
</head>
<body>
    <?php include("../topbar.php"); ?>
    <div class="row">
        <div class="col-2">
            <?php include("../sidebar.php"); ?>
        </div>
        <div class="col-10">
            <div class="main">
                <div class="text-start row">
                    <h2>Proyecto (Actividades)</h2>
                    <div class="col-11">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start text-start bg-success text-white">
                                <div class="ms-2 me-auto">
                                    <div ><?php echo $proy->id_proyecto.".- ".$proy->titulo_esp; ?></div>
                                </div>
                            </li>
                            <li class="list-group-item  justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <strong>Coordinador:</strong> <?php echo $proy->titulo." ".$proy->nombres." ".$proy->apellido_1." ".$proy->apellido_2; ?>
                                    <p>
                                        <span class="mt-5 fw-bold">Objetivo</span>
                                        <?php echo $proy->objetivo; ?>
                                    </p>
                                </div>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th colspan="6">Objetivos del Plan de Trabajo </th>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <select class="form-select" name="actividadTurno" id="actividadTurno" onchange="verActividad(this.options[this.selectedIndex].value)">
                                                    <?php 
                                                        $fecha_i = "";
                                                        $fecha_f = "";
                                                        $asignado = "";
                                                        $avance = 0;
                                                        foreach($actividades as $act){ 
                                                            $sel = "";
                                                            if($act->id_actividad === $id_actividad){
                                                                $sel = "selected";
                                                                $fecha_i = date_format(new DateTime($act->fecha_inicio), "d/m/Y");
                                                                $fecha_f = date_format(new DateTime($act->fecha_fin), "d/m/Y");
                                                                $asignado = $act->asignado;
                                                                if($act->asignado != "todos" && $act->asignado != "servicio" && $act->asignado != "residencias"){
                                                                    $estudiante = $daoE->registro($act->asignado);
                                                                    $asignado = $estudiante->nombres." ".$estudiante->apellido_1." ".$estudiante->apellido_2;
                                                                }
                                                                $avance = $act->avance;
                                                            }
                                                    ?>
                                                        <option value="<?php echo $act->id_actividad; ?>" <?php echo $sel; ?>><?php echo $act->id_actividad." - ".$act->actividad; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Término</th>
                                            <th>Asignado a</th>
                                            <th>Avance</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $fecha_i; ?></td>
                                            <td><?php echo $fecha_f; ?></td>
                                            <td><?php echo $asignado; ?></td>
                                            <td><?php echo $avance; ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div><br>
                <div class="text-start row">
                    <div class="col-11">
                        <table class="table">
                            <thead>
                                <tr class="table-primary">
                                    <th>No.</th>
                                    <th>Actividad a desarrollada</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha Finalización</th>
                                    <th>Realizó</th>
                                    <th class="text-end"><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#actModal">
                                            <i class="fa fa-plus fa-sm"></i> Nueva Actividad
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($misActividades as $act){ 
                                    $realizo = $daoE->registro($act->id_estudiante);
                                ?>
                                    <tr>
                                        <td><?php echo $act->id_actividad; ?></td>
                                        <td><?php echo $act->actividad; ?></td>
                                        <td><?php echo date_format(new DateTime($act->fecha_inicio), "d/m/Y"); ?></td>
                                        <td><?php echo date_format(new DateTime($act->fecha_fin), "d/m/Y"); ?></td>
                                        <td><?php echo $realizo->nombres." ".$realizo->apellido_1." ".$realizo->apellido_2; ?></td>
                                        <td class="text-end">
                                            <?php if($realizo->id_estudiante == $user->id_estudiante){ ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="btn"><i class="fa fa-edit fa-sm"></i></button>
                                                </div>
                                                <div class="col-6">
                                                <button class="btn"><i class="fa fa-trash fa-sm"></i></button>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Actividad -->
    <div class="modal fade" id="actModal" tabindex="-1" aria-labelledby="actModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5" id="actModalLabel">Actividad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-label" for="actividad">Descripción de la actividad</label>
                        <textarea class="form-control" name="actividad" id="actividad" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fecha_fin">Fecha de Finalización</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="avance">% de avance del objetivo: <span id="valor"><strong>10%</strong></span></label>
                        <input type="range" class="form-range" min="0" max="100" step="10" value="10" name="avance" id="avance" onchange="porcentaje()">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-mail-reply"></i> Close</button>
                <button type="button" class="btn btn-primary" onclick="agregarActividad('<?php echo $id_actividad; ?>', '<?php echo $proy->id_proyecto; ?>', '<?php echo $user->id_estudiante; ?>', '<?php echo $user->correo; ?>', '<?php echo $user->tipo; ?>', '<?php echo $proy->semestre; ?>')"><i class="fa fa-plus"></i> Agregar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>