<?php
    $home = "../";
    include($home."api/api.php");
    $dao = new DAOInvestigador();

    $id_investigador = $_REQUEST["id"];
    $inv = $dao->registro($id_investigador);

    $estatues = ['Activo', 'Inactivo'];

    $daoP = new DAOProyecto();
    $proyectosCoor = $daoP->listadoPorInvestigador($id_investigador);
    $proyectosCol = $daoP->listadoComoColaborador($id_investigador);
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
    <script src="../js/investigador.js"></script>
</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-user-circle-o fa-lg"></i> Investigador</h2>
            <div class="row mt-5 mb-3 align-top">
                <div class="col-2"></div>
                    <div class="col-3">
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Detalles del Investigador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form id="editar" class="needs-validation" novalidate onsubmit="return actualizarInvestigador();">
                                        <div class="row g-2 align-items-start text-start">
                                            <div class="col-2">
                                                <label  class="col-form-label" for="id_investigador"><strong>ID Investigador</strong></label >
                                            </div>
                                            <div class="col-auto">
                                                <input class="form-control form-control-sm" type="text" name="id_investigador" id="id_investigador" value="<?php echo $inv->id_investigador; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="titulo"><strong>Título</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control form-control-sm" name="titulo" id="titulo" value="<?php echo $inv->titulo; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="nombres"><strong>Nombres</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control form-control-sm" name="nombres" id="nombres" value="<?php echo $inv->nombres; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="apellido_1"><strong>Apellido 1</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control form-control-sm" name="apellido_1" id="apellido_1" value="<?php echo $inv->apellido_1; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="apellido_2"><strong>Apellido 2</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control form-control-sm" name="apellido_2" id="apellido_2" value="<?php echo $inv->apellido_2; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="correo"><strong>Correo</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control form-control-sm" name="correo" id="correo" value="<?php echo $inv->correo; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="telefono"><strong>Telefono</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" class="form-control form-control-sm" name="telefono" id="telefono" value="<?php echo $inv->telefono; ?>"  readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 align-items-start text-start mt-1">
                                            <div class="col-2">
                                                <label class="form-label" for="coordinador"><strong>Estatus</strong></label>
                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select" name="estatus" id="estatus" required disabled>
                                                    <option></option>
                                                    <?php foreach($estatues as $est){ 
                                                        $sel = "";
                                                        if($est == $inv->estatus){
                                                            $sel = "selected";
                                                        }
                                                    ?>
                                                    <option value="<?php echo $est; ?>" <?php echo $sel; ?>><?php echo $est; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="editarbtn" class="text-center visible">
                                            <button class="btn btn-sm btn-primary mt-3" type="button" onClick="editarInvestigador()"><i class="fa fa-edit"></i> Editar</button>
                                        </div>
                                        <div id="actualizarbtn" class="text-center invisible">
                                            <button class="btn btn-sm btn-secondary mt-3 mx-3" type="reset" onclick="cancelarEditarInvestigador()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                                            <button class="btn btn-sm btn-success mt-3" type="sumbit" onclick="actualizarInvestigador()"><i class="fa fa-save"></i> Actualizar</button>
                                        </div>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead class="table">
                                    <tr class="table-dark">
                                        <th>Coordinador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php foreach($proyectosCoor as $coor){ ?>
                                                <table class="table table-bordered table-sm table-hover">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Título</th>
                                                            <th>Estatus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $coor->id_proyecto; ?></td>
                                                            <td class="text-start"><?php echo $coor->titulo_esp; ?></td>
                                                            <td><?php echo $coor->estatus; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead class="table-warning">
                                    <tr class="table-dark">
                                        <th>Colaborador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                        <?php foreach($proyectosCol as $col){ ?>
                                                <table class="table table-bordered table-sm table-hover">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Título</th>
                                                            <th>Estatus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $col->id_proyecto; ?></td>
                                                            <td class="text-start"><?php echo $col->titulo_esp; ?></td>
                                                            <td><?php echo $col->estatus; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </td>
                                    </tr>
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