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
    <title>Gestión de Proyectos CCAI</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/js.js"></script>
</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-file-o fa-lg"></i> Nuevo Proyecto</h2>
            <div class="row mt-3 mb-3">
                <div class="col-3"></div>
                <div class="col-6">
                    <form  class="needs-validation" novalidate onsubmit="return validarNuevoProyecto();">
                        <div class="form-group text-start">
                            <label class="form-label" for="titulo"><strong>Título</strong></label>
                            <input class="form-control" type="text" name="titulo" id="titulo" required>
                            <div class="valid-feedback" id="msg">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Ingresar título del proyecto
                            </div>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="objetivo"><strong>Objetivo</strong></label>
                            <textarea class="form-control" name="objetivo" id="objetivo" rows="2" required></textarea>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="descripcion"><strong>Descripción</strong></label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="6" required></textarea>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="coordinador"><strong>Coordinador</strong></label>
                            <select class="form-select" name="coordinador" id="coordinador" required>
                                <option></option>
                                <?php foreach($investigadores as $inv){ ?>
                                <option value="<?php echo $inv->id_investigador; ?>"><?php echo $inv->nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group text-start">
                            <label class="form-label" for="fecha_inicio"><strong>Fecha de Inicio</strong></label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button class="btn btn-secondary mx-3" type="reset" onClick="cancelarNuevoProyecto()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                            <button class="btn btn-primary" type="submit" onClick="validarNuevoProyecto()"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>            
        </div>
    </div>
</body>
</html>