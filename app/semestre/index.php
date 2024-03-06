<?php
$home = "../../";
include($home."api/lib.php");
$dao = new DAOSemestre();

$listado = $dao->listado();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link href="../../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../../js/jquery-3.7.1.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="../../js/axios.js"></script>
    
    <title>Sistema Estudiantes</title>
</head>
<body>
    <?php include("../investigadores/topbar.php"); ?>
    <div class="row">
        <div class="col-2">
            <?php include("../investigadores/sidebar.php"); ?>
        </div>
        <div class="col-10">
            <div class="main">
                <div class="text-start">
                    <h2>Semestres</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Semestre</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Estatus</th>
                                <th><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo semestre</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listado as $sem){ ?>
                            <tr>
                                <td><?php echo $sem->nombre; ?></td>
                                <td><?php echo date_format(new DateTime($sem->fecha_inicio), "d/m/Y"); ?></td>
                                <td><?php echo date_format(new DateTime($sem->fecha_fin), "d/m/Y"); ?></td>
                                <td><?php echo $sem->estatus; ?></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>