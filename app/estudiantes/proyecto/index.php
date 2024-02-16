<?php
$home = "../../../";
include($home."api/lib.php");

$daoP = new DAOParticipante();
$proy = $daoP->registroPorEstudiante($user->id_estudiante);

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
                                    <th colspan="5">Plan de Trabajo</th>
                                </tr>
                                <tr>
                                    <th>No.</th>
                                    <th>Actividad</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha Finalización</th>
                                    <th><button class="btn btn-warning btn-sm">Agregar</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
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