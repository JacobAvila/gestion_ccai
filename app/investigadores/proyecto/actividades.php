<?php
$home = "../../../";
include($home."api/lib.php");
$dao = new DAOActividadParticipante();
$daoE = new DAOParticipante();

$id_actividad = $_REQUEST['ida'];
$id_proyecto = $_REQUEST['idp'];

$actividades = $dao->listadoPorActividad($id_proyecto, $id_actividad);

$html = "";
if(count($actividades) > 0){
    $html .= "<ol class='list-group list-group-numbered'>";
    foreach($actividades as $act){
        $est = $daoE->registroPorEstudiante($act->id_estudiante);
        $html .= "<li class='list-group-item d-flex justify-content-between align-items-start'>"
                    ."<div class='ms-2 me-auto'>"
                    ."<div class='fw-bold'>".$act->actividad."</div>"
                        ."<span class='small'>".$est->nombre."</span>"
                    ."</div>"
                ."</li>";
    }
    $html .= "</ol>";
}

echo $html;