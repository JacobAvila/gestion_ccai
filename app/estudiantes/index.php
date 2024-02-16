<?php
$home = "../../";
include($home."api/lib.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link href="../../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <script src="../../js/axios.js"></script>
    
    <title>Sistema Estudiantes</title>
</head>
<body>
    <?php include("topbar.php"); ?>
    <div class="row">
        <div class="col-2">
            <?php include("sidebar.php"); ?>
        </div>
        <div class="col-10">
            <div class="main">
                <div class="text-start">
                    <h2>Inicio</h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>