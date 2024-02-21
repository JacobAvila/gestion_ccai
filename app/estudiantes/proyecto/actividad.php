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
                <div class="text-start">
                    <h2>Proyecto (Plan de Trabajo)</h2>
                    <div class="col-11">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start text-start bg-success text-white">
                                <div class="ms-2 me-auto">
                                    <div ><?php echo $proy->titulo_esp; ?></div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <strong>Coordinador:</strong> <?php echo $proy->titulo." ".$proy->nombres." ".$proy->apellido_1." ".$proy->apellido_2; ?>
                                    <p>
                                        <span class="mt-5 fw-bold">Objetivo</span>
                                        <?php echo $proy->objetivo; ?>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="6">Plan de Trabajo </th>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <select class="form-select" name="actividadTurno" id="actividadTurno" onchange="verActividad(this.options[this.selectedIndex].value)">
                                            <?php foreach($actividades as $act){ 
                                                $sel = "";
                                                if($act->id_actividad === $id_actividad){
                                                    $sel = "selected";
                                                }
                                            ?>
                                                <option value="<?php echo $act->id_actividad; ?>" <?php echo $sel; ?>><?php echo $act->id_actividad." - ".$act->actividad; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No.</th>
                                    <th>Objetivo (Actividad a desarrollar)</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha Finalización</th>
                                    <th>Estatus</th>
                                    <th><button type="button" class="btn btn-warning btn-sm">
                                            <i class="fa fa-plus fa-lg"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($misActividades as $act){ ?>
                                    <tr>
                                        <td><?php echo $act->id_actividad; ?></td>
                                        <td><?php echo $act->actividad; ?></td>
                                        <td><?php echo date_format(new DateTime($act->fecha_inicio), "d/m/Y"); ?></td>
                                        <td><?php echo date_format(new DateTime($act->fecha_fin), "d/m/Y"); ?></td>
                                        <td><?php echo $act->avance; ?>%</td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cargar Documento -->
    <div class="modal fade" id="docModal" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5" id="docModalLabel">Documento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre del Documento</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="documento">Archivo</label>
                        <input type="file" class="form-control" name="documento" id="documento">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-mail-reply"></i> Close</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-save"></i> Agregar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>