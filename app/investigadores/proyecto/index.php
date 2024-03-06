<?php
$home = "../../../";
include($home."api/lib.php");
$dao = new DAOProyecto();

$tipo = (isset($_REQUEST['tipo']))?$_REQUEST['tipo']:"";

$listado = [];
if($tipo == "" || $tipo == "Coordinador"){
    $listado = $dao->listadoPorInvestigadorEstatus($user->id_investigador, "Activo");
}else{
    $listado = $dao->listadoComoColaborador($user->id_investigador);
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
    <script src="../../../js/jquery-3.7.1.js"></script>
    <script src="../../../js/bootstrap.bundle.js"></script>
    <script src="../../../js/axios.js"></script>
    <script src="../js/proyectos.js"></script>
    
    <title>Sistema CCAI</title>
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
                    <div class="col-3">
                        <select class="form-select" name="tipo" id="tipo" onchange="tipoProyecto()">
                            <?php 
                                $valores = ['Coordinador', 'Colaborador'];
                                foreach($valores as $val){
                                    $sel = "";
                                    if($val === $tipo){
                                        $sel = "selected";
                                    }
                            ?>
                            <option value="<?php echo $val; ?>" <?php echo $sel; ?>><?php echo $val; ?></option>
                            <?php } ?>
                        </select>
                    </div>
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
                                        <tr style="cursor: pointer;" onclick="detalles('<?php echo $proy->id_proyecto; ?>')">
                                            <td><?php echo $proy->id_proyecto; ?></td>
                                            <td><?php echo $proy->titulo_esp; ?></td>
                                            <td><?php echo date_format(new DateTime($proy->fecha_inicio), "d/m/Y"); ?></td>
                                            <td></td>
                                            <td><i class="fa fa-file-text-o" onclick="detalles('<?php echo $proy->id_proyecto; ?>')"></i></td>
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