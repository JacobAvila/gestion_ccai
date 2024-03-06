<?php
$home = "../../../";
include($home."api/lib.php");

$daoP = new DAOParticipante();
$proy = $daoP->registroPorEstudiante($user->id_estudiante);

$daoS = new DAOSemestre();
$sem = $daoS->registroEstatus("Activo");

$ss = $daoP->listadoPorProyectoPrograma($proy->id_proyecto, "Servicio Social");
$res = $daoP->listadoPorProyectoPrograma($proy->id_proyecto, "Residencias");

$equipoR = "";
foreach($res as $r){
    $equipoR .= "<br>".$r->nombre;
}
$equipoSS = "";
foreach($ss as $s){
    $equipoSS .= "<br>".$s->nombre;
}

$daoPT = new DAOPlanTrabajo();
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
                <div class="text-start">
                    <h2>Proyecto (Plan de Trabajo)</h2>
                    <div class="col-11">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start text-start bg-success text-white">
                                <div class="ms-2 me-auto">
                                    <div ><?php echo $proy->id_proyecto.".- ".$proy->titulo_esp; ?></div>
                                </div>
                            </li>
                            <li class="list-group-item  justify-content-between align-items-start">
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Coordinador:</strong> <?php echo $proy->titulo." ".$proy->nombres." ".$proy->apellido_1." ".$proy->apellido_2; ?>
                                        <p>
                                            <span class="mt-5 fw-bold">Objetivo:</span>
                                            <?php echo $proy->objetivo; ?>
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            <span class="mt-5 fw-bold">Residencias:</span>
                                            <?php echo $equipoR; ?>
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            <span class="mt-5 fw-bold">Servicio Social:</span>
                                            <?php echo $equipoSS; ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th colspan="5">Plan de Trabajo  <span  class="blockquote-footer small"> Para agregar sus actividades por cada objetivo dar click en el ícono de signo más</span ></th>
                                </tr>
                                <tr>
                                    <th>No.</th>
                                    <th>Objetivo</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha Finalización</th>
                                    <th>Avance</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($actividades as $act){ ?>
                                    <tr style="cursor:pointer;" onclick="verActividad('<?php echo $act->id_actividad; ?>')">
                                        <td><?php echo $act->id_actividad; ?></td>
                                        <td><?php echo $act->actividad; ?></td>
                                        <td><?php echo date_format(new DateTime($act->fecha_inicio), "d/m/Y"); ?></td>
                                        <td><?php echo date_format(new DateTime($act->fecha_fin), "d/m/Y"); ?></td>
                                        <td><?php echo $act->avance; ?>%</td>
                                        <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                            data-bs-content="Para agregar actividades para este objetivo dar click aquí" onclick="verActividad('<?php echo $act->id_actividad; ?>')">
                                                <i class="fa fa-plus fa-lg"></i>
                                            </button>
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