<?php
    $home = "../";
    include($home."api/api.php");
    $dao = new DAOEstudiante();

    $estudiantes = $dao->listado();
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
            <h2><i class="fa fa-user-o fa-lg"></i> Estudiantes</h2>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 text-end">
                    <a class="btn btn-danger mb-3" href="nuevo.php"><i class="fa fa-user-plus"></i> Nuevo</a>
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>
                            <tr class="table-success">
                                <th>ID</th>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Correo Adicional</th>
                                <th>Teléfono</th>
                                <th>División</th>
                                <th>Programa</th>
                                <th>Estatus</th>
                                <th>Semestre</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($estudiantes as $est){ ?>
                            <tr>
                                <td><?php echo $est->id_estudiante; ?></td>
                                <td><?php echo $est->matricula; ?></td>
                                <td class="text-start"><?php echo $est->nombre; ?></td>
                                <td><?php echo $est->correo; ?></td>
                                <td><?php echo $est->correo_adicional; ?></td>
                                <td><?php echo $est->telefono; ?></td>
                                <td><?php echo $est->division; ?></td>
                                <td><?php echo $est->tipo; ?></td>
                                <td><?php echo $est->estatus_programa; ?></td>
                                <td><?php echo $est->semestre; ?></td>
                                <td><?php echo $est->estatus; ?></td>
                                <td><a href="detalles.php?id=<?php echo $est->id_estudiante; ?>"><i class="fa fa-file-text-o"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
</body>
</html>