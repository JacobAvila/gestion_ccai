<?php
$home = "../../../";
include($home."api/lib.php");
$dao = new DAOProyecto();

$listado = $dao->listadoPorInvestigadorEstatus($user->id_investigador, "Activo");
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
                    <h2>Proyectos</h2>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-8">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Fecha Inicio</th>
                                        <th>Avance</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listado as $proy){ ?>
                                        <tr style="cursor: pointer;" onclick="detalles.php?id=<?php echo $proy->id_proyecto; ?>">
                                            <td><?php echo $proy->id_proyecto; ?></td>
                                            <td><?php echo $proy->titulo_esp; ?></td>
                                            <td><?php echo date_format(new DateTime($proy->fecha_inicio), "d/m/Y"); ?></td>
                                            <td></td>
                                            <td><i class="fa fa-file-text-o"></i> Detalles</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>