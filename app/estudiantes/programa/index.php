<?php
$home = "../../../";
include($home."api/lib.php");

$daoE = new DAOEstudiante();
$est = $daoE->registro($user->id_estudiante);

$daoP = new DAOPrograma();
$programa = $daoP->registroEstatus($user->id_estudiante, "Activo");
$prog = (count($programa) > 0)?$programa[0]:new Programa();

$daoD = new DAODocumentosPrograma();
$archivos = $daoD->listado($est->id_estudiante, $prog->tipo, $prog->semestre);
$documentos = array();
foreach($archivos as $arch){
    $documentos[$arch->nombre] = $arch->archivo;
}
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
                    <h2>Programa Activo</h2>
                    <div class="row bg-secondary text-white" style="height: 30px;">
                        <div class="col-3">
                            <?php echo $user->tipo; ?>
                        </div>
                        <div class="col-3">
                            Semestre: <?php echo $prog->semestre; ?>
                        </div>
                        <div class="col-3">
                            Fecha de Inicio: <?php echo date_format(new DateTime($prog->fecha_inicio), "d/m/Y"); ?>
                        </div>
                        <div class="col-3">
                            Fecha de término: <?php echo date_format(new DateTime($prog->fecha_fin), "d/m/Y"); ?>
                        </div>
                    </div>
                    <div class="row mt-3 text-center">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <table class="table table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-9">Documentos</div>
                                                <div class="col-3 text-end">
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#docModal"><i class="fa fa-plus-circle"></i> Otro Documento</button>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-text text-start mb-2">
                                                Documentos oficiales a cargar en formato PDF ya con firmas y sellos correspondientes.
                                            </div>
                                            <ol class="list-group list-group-numbered">
                                                <li class="list-group-item d-flex justify-content-between align-items-start text-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Carta de Presentación</div>
                                                        <?php if(count($documentos)>0 && $documentos['Carta de Presentación']){ ?>
                                                            <a href="<?php echo $documentos['Carta de Presentación']; ?>" target="_bank">Ver Archivo</a>
                                                        <?php }else{ ?>
                                                            <div class="form-group">
                                                                <label class="form-label" for="presentacion">Archivo</label>
                                                                <input type="file" class="form-control" name="presentacion" id="presentacion">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start text-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Carta de Aceptación</div>
                                                        <?php if(count($documentos)>0 && $documentos['Carta de Aceptación']){ ?>
                                                            <a href="<?php echo $documentos['Carta de Aceptación']; ?>" target="_bank">Ver Archivo</a>
                                                        <?php }else{ ?>
                                                            <div class="form-group">
                                                                <label class="form-label" for="aceptacion">Archivo</label>
                                                                <input type="file" class="form-control" name="aceptacion" id="aceptacion">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start text-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Carta de Término</div>
                                                        <?php if(count($documentos)>0 && $documentos['Carta de Término']){ ?>
                                                            <a href="<?php echo $documentos['Carta de Término']; ?>" target="_bank">Ver Archivo</a>
                                                        <?php }else{ ?>
                                                            <div class="form-group">
                                                                <label class="form-label" for="termino">Archivo</label>
                                                                <input type="file" class="form-control" name="termino" id="termino">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start text-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Carta de Agradecimiento</div>
                                                        <?php if(count($documentos)>0 && $documentos['Carta de Agradecimiento']){ ?>
                                                            <a href="<?php echo $documentos['Carta de Agradecimiento']; ?>" target="_bank">Ver Archivo</a>
                                                        <?php }else{ ?>
                                                            <div class="form-group">
                                                                <label class="form-label" for="agradecimiento">Archivo</label>
                                                                <input type="file" class="form-control" name="agradecimiento" id="agradecimiento">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                            </ol>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-3"></div>
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