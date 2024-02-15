<?php
    $home = "../";
    include($home."api/lib.php");
    $dao = new DAOProyecto();

    $id = $_REQUEST["id"];
    $proy = $dao->registro($id)[0];

    $id_coor = $proy->coordinador_id_investigador;

    $daoI = new DAOInvestigador();
    $investigadores = $daoI->listado();
    $estatus = ["Activo", "Finalizado", "Cancelado"];

    $daoC = new DAOColaborador();
    $colaboradores = $daoC->listado($id);
    $lista_colabs = array();
    foreach($colaboradores as $co){
        array_push($lista_colabs, $co->id_investigador);
    }

    $daoP = new DAOParticipante();
    $servicio_social = $daoP->listadoPorProyectoPrograma($id, "Servicio Social");
    $lista_ss = array();
    foreach($servicio_social as $ss){
        array_push($lista_ss, $ss->id_estudiante);
    }

    $residencias = $daoP->listadoPorProyectoPrograma($id, "Residencias");
    $lista_res = array();
    foreach($residencias as $res){
        array_push($lista_res, $res->id_estudiante);
    }

    $daoE = new DAOEstancia();
    $estancias = $daoE->listadoPorProyecto($id);
    $lista_est = array();
    foreach($estancias as $est){
        array_push($lista_est, $est->id_estancia_residente);
    }
    
    $daoEst = new DAOEstudiante();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos CCAI</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="../js/axios.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/js.js"></script>
</head>
<body>
    <?php include("../menu.php"); ?>

    <div class="p-2 mt-2">
        <div class="text-center">
            <h2><i class="fa fa-file-o fa-lg"></i> Proyecto</h2>
            <div class="row mt-3 mb-3 align-top">
                <div class="col-2"></div>
                    <div class="col-5">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>Datos del Proyecto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form id="editar" class="needs-validation" novalidate onsubmit="return actualizarProyecto();">
                                        <div class="form-group text-start">
                                            <figcaption  class="form-label" for="id_proyecto"><strong>ID Proyecto</strong></figcaption >
                                            <input class="form-control form-control-sm" type="text" name="id_proyecto" id="id_proyecto" value="<?php echo $proy->id_proyecto; ?>" readonly>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label" for="titulo"><strong>Título</strong></label>
                                            <textarea class="form-control form-control-sm" type="text" name="titulo" id="titulo" rows="2" readonly><?php echo $proy->titulo; ?></textarea>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label" for="objetivo"><strong>Objetivo</strong></label>
                                            <textarea class="form-control form-control-sm" name="objetivo" id="objetivo" rows="2" readonly><?php echo $proy->objetivo; ?></textarea>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label" for="descripcion"><strong>Descripción</strong></label>
                                            <textarea class="form-control form-control-sm" name="descripcion" id="descripcion" rows="6" readonly><?php echo $proy->descripcion; ?></textarea>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label" for="coordinador"><strong>Coordinador</strong></label>
                                            <select class="form-select" name="coordinador" id="coordinador" required disabled>
                                                <option></option>
                                                <?php foreach($investigadores as $inv){ 
                                                    $sel = "";
                                                    if($inv->id_investigador == $id_coor){
                                                        $sel = "selected";
                                                    }
                                                ?>
                                                <option value="<?php echo $inv->id_investigador; ?>" <?php echo $sel; ?>><?php echo $inv->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label" for="fecha_inicio"><strong>Fecha de Inicio</strong></label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_inicio" id="fecha_inicio" value="<?php echo $proy->fecha_inicio; ?>" readonly>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label" for="estatus"><strong>Estatus</strong></label>
                                            <select class="form-select" name="estatus" id="estatus" required disabled>
                                                <?php foreach($estatus as $est){ 
                                                    $sel = "";
                                                    if($proy->estatus == $est){
                                                        $sel = "selected";
                                                    }
                                                ?>
                                                <option value="<?php echo $est; ?>" <?php echo $sel; ?> ><?php echo $est; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div id="editarbtn" class="text-end visible">
                                            <button class="btn btn-sm btn-primary mt-3" type="button" onClick="editarProyecto()"><i class="fa fa-edit"></i> Editar</button>
                                        </div>
                                        <div id="actualizarbtn" class="text-end invisible">
                                            <button class="btn btn-sm btn-secondary mt-3 mx-3" type="reset" onclick="cancelarEditarProyecto()"><i class="fa fa-mail-reply"></i> Cancelar</button>
                                            <button class="btn btn-sm btn-success mt-3" type="sumbit" onclick="actualizarProyecto()"><i class="fa fa-save"></i> Actualizar</button>
                                        </div>
                                    </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Colaboradores</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text-start">
                                            <ul class="list-group">
                                                <?php foreach($colaboradores as $colab){ ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <?php echo $colab->nombre; ?>
                                                        </div>
                                                        <span class="text-end col-2">
                                                            <a href="javascript:eliminarColaborador('<?php echo $id ?>', '<?php echo $colab->id_investigador; ?>')" class="text-end">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="text-end visible">
                                            <button type="button" class="btn btn-sm btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#colabsModal"><i class="fa fa-address-book"></i> Agregar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Servicio Social</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text-start">
                                            <ul class="list-group">
                                                <?php foreach($servicio_social as $est_ss){ ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <?php echo $est_ss->nombre; ?>
                                                        </div>
                                                        <div class="col-5">
                                                            <?php echo $est_ss->division; ?>
                                                        </div>
                                                        <span class="text-end col-1">
                                                            <a href="javascript:eliminarServicioSocial('<?php echo $id ?>', '<?php echo $est_ss->id_estudiante; ?>', '<?php echo $est_ss->correo; ?>')" class="text-end">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="text-end visible">
                                            <button type="button" class="btn btn-sm btn-success mt-3" data-bs-toggle="modal" data-bs-target="#servicioModal"><i class="fa fa-address-book"></i> Agregar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                        <table class="table table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>Residentes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text-start">
                                            <ul class="list-group">
                                                <?php foreach($residencias as $est_res){ ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <?php echo $est_res->nombre; ?>
                                                        </div>
                                                        <div class="col-5">
                                                            <?php echo $est_res->division; ?>
                                                        </div>
                                                        <span class="text-end col-1">
                                                            <a href="javascript:eliminarResidente('<?php echo $id ?>', '<?php echo $est_res->id_estudiante; ?>', '<?php echo $est_res->correo; ?>')" class="text-end">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="text-end visible">
                                            <button type="button" class="btn btn-sm btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#residenteModal"><i class="fa fa-address-book"></i> Agregar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                        <table class="table table-bordered">
                            <thead class="table-danger">
                                <tr>
                                    <th>Estancias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text-start">
                                            <ul class="list-group">
                                                <?php foreach($estancias as $est_est){ ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <?php echo $est_est->nombre; ?>
                                                        </div>
                                                        <span class="text-end col-2">
                                                            <a href="javascript:eliminarEstancia('<?php echo $id ?>', '<?php echo $est_est->id_estancia_residente; ?>', '<?php echo $est_est->correo; ?>')" class="text-end">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="text-end visible">
                                            <button type="button" class="btn btn-sm btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#estanciaModal"><i class="fa fa-address-book"></i> Agregar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>            
            </div>
        </div>
    </div>


    <!--- Modal sections -->
    <!--- Modal Colaboradores -->
    <div class="modal fade" id="colabsModal" tabindex="-1" aria-labelledby="colabsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="colabsModalLabel">Investigadores</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php $i = 0; foreach($investigadores as $inv){ 
                        if($inv->id_investigador != $id_coor && !in_array($inv->id_investigador, $lista_colabs)){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $inv->id_investigador."&".$inv->correo; ?>" id="<?php echo "colab_".$i; ?>">
                                <label class="form-check-label" for="<?php echo "colab_".$i; ?>">
                                    <?php echo $inv->nombre; ?>
                                </label>
                            </div>  
                    <?php $i++;} ?>
                    <?php      } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onClick="agregarColaboradores('<?php echo $i; ?>')">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal colaboradores -->

    <!--- Modal Servicio Social -->
    <?php
        $estud_ss =$daoEst->listadoPrograma("2024-1", "Servicio Social", "No Asignado");
        
    ?>
    <div class="modal fade" id="servicioModal" tabindex="-1" aria-labelledby="servicioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="servicioModalLabel">Estudiantes Servicio Social</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php $i = 0; foreach($estud_ss as $est_ss){ 
                        if(!in_array($est_ss->id_estudiante, $lista_ss)){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $est_ss->id_estudiante."&".$est_ss->correo; ?>" id="<?php echo "ss_".$i; ?>">
                                <label class="form-check-label" for="<?php echo "ss_".$i; ?>">
                                    <div><?php echo $est_ss->nombre; ?></div>
                                    <div class="form-text smal mt-0"><?php echo $est_ss->division; ?></div>
                                </label>
                            </div>  
                    <?php $i++;} ?>
                    <?php      } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onClick="agregarServicioSocial('<?php echo $i; ?>')">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!--- Modal Residentes -->
    <?php
        $estud_rs =$daoEst->listadoPrograma("2024-1", "Residencias", "No Asignado");
        
    ?>
    <div class="modal fade" id="residenteModal" tabindex="-1" aria-labelledby="residenteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="residenteModalLabel">Estudiantes Residentes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php $i = 0; foreach($estud_rs as $est_res){ 
                        if(!in_array($est_res->id_estudiante, $lista_res)){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $est_res->id_estudiante."&".$est_res->correo; ?>" id="<?php echo "res_".$i; ?>">
                                <label class="form-check-label" for="<?php echo "res_".$i; ?>">
                                    <div><?php echo $est_res->nombre; ?></div>
                                    <div class="form-text smal mt-0"><?php echo $est_res->division; ?></div>
                                </label>
                            </div>  
                    <?php $i++;} ?>
                    <?php      } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onClick="agregarResidente('<?php echo $i; ?>')">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!--- Modal Estancias -->
    <div class="modal fade" id="estanciaModal" tabindex="-1" aria-labelledby="estanciaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="estanciaModalLabel">Investigadores en Estancia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php $i = 0; foreach($estancias as $est_est){ 
                        if(!in_array($est_est->id_estancia_residente, $lista_est)){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $est_est->id_estancia."&".$est_est->id_estancia_residente."&".$est_est->correo; ?>" id="<?php echo "est_".$i; ?>">
                                <label class="form-check-label" for="<?php echo "est_".$i; ?>">
                                    <?php echo $est_est->nombre; ?>
                                </label>
                            </div>  
                    <?php $i++;} ?>
                    <?php      } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onClick="agregarEstancia('<?php echo $i; ?>')">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>