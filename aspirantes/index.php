<?php
    $home = "../";
    include($home."api/api.php");
    $dao = new DAOAspirante();
    $division = (isset($_POST['division']))?$_POST['division']:"";
    $programa = (isset($_POST['programa']))?$_POST['programa']:"";
    $area = (isset($_POST['area']))?$_POST['area']:"";

    $aspirantes = $dao->listadoFiltro($division, $programa, $area);
?>
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
    <script src="../js/axios.js"></script>
    <script src="../js/aspirantes.js"></script>
</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-users"></i> Aspirantes</h2>
            <div class="row mt-3 mb-3 py-1 bg-warning">
                <form action="." method="POST">
                    <div class="row mt-2 mb-2">
                        <div class="col">
                            <h5>Division</h5>
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <select name="division" class="form-select form-select-sm">
                                            <option value=""></option>
                                            <option value="sistemas">Sistemas</option>
                                            <option value="informatica">Informática</option>
                                            <option value="mecatronica">Mecatrónica</option>
                                            <option value="mecanica">Mecánica</option>
                                            <option value="industrial">Industrial</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                            <h5>Programa</h5>
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <select name="programa" class="form-select form-select-sm">
                                            <option value=""></option>
                                            <option value="servicio social">Servicio Social</option>
                                            <option value="residencias">Residencias</option>
                                            <option value="estancia">Estancia</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                            <h5>Área</h5>
                                <div class="mb-3 row">
                                    <div class="col-sm-12">
                                        <select name="area" class="form-select form-select-sm">
                                            <option value=""></option>
                                            <option value="IoT">IoT</option>
                                            <option value="Impresion 3D">Impresión 3D</option>
                                            <option value="Ciberseguridad">Ciberseguridad</option>
                                            <option value="Redes">Redes y Servidores</option>
                                            <option value="Ingeniaría de Software">Ingeniaría de Software</option>
                                            <option value="Inteligencia Artificial">Inteligencia Artificial</option>
                                            <option value="Robótica y Mecatrónica">Robótica y Mecatrónica</option>
                                            <option value="Realidad Virtual y Mixta">Realidad Virtual y Mixta</option>
                                            <option value="Gestión Administrativa">Gestión Administrativa</option>
                                            <option value="Gestión Académica">Gestión Académica</option>
                                        </select>
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="col">
                            <h5>&nbsp;</h5>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input type="submit" name="submit" class="form-control btn btn-primary btn-sm" value="Mostrar">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-hover table-striped">
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>Hora Envio</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Correo Inst</th>
                    <th>División</th>
                    <th>Interes</th>
                    <th>Area</th>
                    <th>Estatus</th>
                    <th colspan="2">Acción</th>
                </tr>
                <?php 
                    foreach($aspirantes as $as){
                ?>
                <tr>
                    <td><?php echo $as->id; ?></td>
                    <td><?php echo $as->hora_envio; ?></td>
                    <td><?php echo $as->nombre; ?></td>
                    <td><?php echo $as->apellido; ?></td>
                    <td><?php echo $as->correo_electronico; ?></td>
                    <td><?php echo $as->correo_institucional; ?></td>
                    <td><?php echo $as->division; ?></td>
                    <td><?php echo $as->interes_liberacion; ?></td>
                    <td><?php echo $as->area; ?></td>
                    <td id="estatus_<?php echo $as->id; ?>"><?php echo $as->estatus; ?></td>
                    <td><a href="javascript:aceptarAspirante('<?php echo $as->id; ?>', '<?php echo $as->correo_institucional; ?>');" class="btn btn-success"><i class="fa fa-user-plus"></i></a></td>
                    <td><a href="javascript:rechazarAspirante('<?php echo $as->id; ?>', '<?php echo $as->correo_institucional; ?>');" class="btn btn-danger"><i class="fa fa-user-times"></i></a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>