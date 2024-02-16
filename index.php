<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Gestión de Proyectos CCAI</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/axios.js"></script>
    <script src="js/ccai.js"></script>
</head>
<body>
    <?php include("menu.php"); ?>

    <div class="p-2 mt-2 text-center">
        <div class="text-center">
            <img src="images/logo_ccai.png" width="200">
            <div class="row mt-3 mb-3">
                <div class="col-5"></div>
                <div class="col-2 text-center">
                    <div class="card" >
                        <div class="card-body">
                            <form class="needs-validation" novalidate onsubmit="return login(this);">
                                <div class="form-group text-start">
                                    <label class="form-label" for="correo"><strong>Correo</strong></label>
                                    <input type="email" class="form-control" name="correo" id="correo" required>
                                    <div class="valid-feedback" id="msg">
                                        Correcto
                                    </div>
                                    <div class="invalid-feedback">
                                        Correo no válido
                                    </div>
                                </div>
                                <div class="form-group text-start">
                                    <label class="form-label" for="password"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <div class="valid-feedback" id="msg">
                                        Correcto
                                    </div>
                                    <div class="invalid-feedback" id="msg_pass">
                                        Contraseña no válida
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <button class="btn btn-primary" type="submit" ><i class="fa fa-sign-in"></i> Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5"></div></div>
            </div>
        </div>
    </div>
</body>
</html>