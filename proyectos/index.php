<?php
    $home = "../";
    include($home."api/api.php");
    $dao = new DAOProyecto();
    $division = (isset($_POST['division']))?$_POST['division']:"";
    $programa = (isset($_POST['programa']))?$_POST['programa']:"";
    $area = (isset($_POST['area']))?$_POST['area']:"";

    $proyectos = $dao->listado();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Gestión de Proyectos CCAI</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>

</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-files-o fa-lg"></i> Proyectos</h2>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-end">
                <a class="btn btn-danger mb-3" href="nuevo.php"><i class="fa fa-plus-square-o"></i> Nuevo</a>
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>
                            <tr class="table-success">
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Título</th>
                                <th>Coordinador</th>
                                <th>Fecha Registro</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($proyectos as $proy){ ?>
                            <tr>
                                <td><?php echo $proy->id_proyecto; ?></td>
                                <td><?php echo $proy->imagen; ?></td>
                                <td class="text-start"><?php echo $proy->titulo; ?></td>
                                <td><?php echo $proy->coordinador; ?></td>
                                <td><?php echo date_format(new DateTime($proy->fecha_registro), "d/m/Y"); ?></td>
                                <td><?php echo date_format(new DateTime($proy->fecha_inicio), "d/m/Y"); ?></td>
                                <td><?php echo ($proy->fecha_fin == '0000-00-00')?"---":date_format(new DateTime($proy->fecha_fin), "d/m/Y"); ?></td>
                                <td><?php echo $proy->estatus; ?></td>
                                <td><a href="detalles.php?id=<?php echo $proy->id_proyecto; ?>"><i class="fa fa-file-text-o"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a class="btn btn-success mb-3" href="informe_proyectos.php?semestre=2024-1"><i class="fa fa-plus-square-o"></i> Generar Listado</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</body>
</html>