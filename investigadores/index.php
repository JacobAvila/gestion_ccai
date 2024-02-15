<?php
    $home = "../";
    include($home."api/api.php");
    $dao = new DAOInvestigador();

    $investigadores = $dao->listado();
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
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    

</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-user-circle-o fa-lg"></i> Investigadores</h2>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-end">
                <a class="btn btn-danger mb-3" href="nuevo.php"><i class="fa fa-user-plus"></i> Nuevo</a>
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>
                            <tr class="table-success">
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($investigadores as $inv){ ?>
                            <tr>
                                <td><?php echo $inv->id_investigador; ?></td>
                                <td><?php echo $inv->titulo; ?></td>
                                <td class="text-start"><?php echo $inv->nombre; ?></td>
                                <td><?php echo $inv->correo; ?></td>
                                <td><?php echo $inv->telefono; ?></td>
                                <td><?php echo $inv->estatus; ?></td>
                                <td><a href="detalles.php?id=<?php echo $inv->id_investigador; ?>"><i class="fa fa-file-text-o"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</body>
</html>