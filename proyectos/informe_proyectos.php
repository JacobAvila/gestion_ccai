<?php 
$home = "../";
include($home."api/lib.php");
include($home."api/include/fpdf.php");

$semestre = $_REQUEST['semestre'];

$dao = new DAOProyecto();
$proyectos = $dao->listadoPorEstatus("Activo");

$daoC = new DAOColaborador();


$daoP = new DAOParticipante();


class PDF extends FPDF {

// Cabecera de página
function Header()
{
    global $semestre;
    // Logo
    $this->Image('../images/logo_ccai.png',10,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->setTitle("Proyectos de Investigación CCAI", TRUE);
    $this->Cell(30,10, utf8_decode('Proyectos de Investigación CCAI '.$semestre),0,0,'C');
    // Salto de línea
    $this->Ln(23);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',11);

foreach($proyectos as $proy){
    $colaborador = $daoC->listado($proy->id_proyecto)[0];
    $servicio_social = $daoP->listadoPorProyectoPrograma($proy->id_proyecto, "Servicio Social");
    $residencias = $daoP->listadoPorProyectoPrograma($proy->id_proyecto, "Residencias");

    $alumnos_servicio = "";
    foreach($servicio_social as $ss){
        $alumnos_servicio .= $ss->nombre." - ".$ss->division."\n";
    }
    $alumnos_res = "";
    foreach($residencias as $res){
        $alumnos_res .= $res->nombre." - ".$res->division."\n";
    }

    $pdf->setFont('', 'B');
    $pdf->SetFillColor(0, 150, 255);
    $pdf->Cell(30, 7, "No. Proyecto", 1,0,'L', TRUE);
    $pdf->setFont('', '');
    $pdf->Cell(0, 7, '     '.$proy->id_proyecto, 1,0,'L', TRUE);
    $pdf->Ln();
    $pdf->SetFillColor(255);

    $pdf->setFont('', 'B');
    $pdf->Cell(0, 7, utf8_decode("Título"), 1,'L');
    $pdf->setFont('', '');
    $pdf->MultiCell(0, 5, utf8_decode($proy->titulo), 1,1,'J');


    $pdf->setFont('', 'B');
    $pdf->Cell(0, 7, utf8_decode("Objetivo"), 1,'L');
    $pdf->setFont('', '');
    $pdf->MultiCell(0, 7, utf8_decode($proy->objetivo), 1,1,'J'); 

    $pdf->setFont('', 'B');
    $pdf->Cell(0, 7, utf8_decode("Descripción"), 1,'L');
    $pdf->SetFont('Times','',10);
    $pdf->MultiCell(0, 4, utf8_decode($proy->descripcion), 1,'J'); 

    $pdf->setFont('Times', 'B', 11);
    $pdf->Cell(30, 7, utf8_decode("Coordinador"), 1,0,'L');
    $pdf->setFont('', '');
    $pdf->Cell(0, 7, utf8_decode($proy->coordinador), 1,1,'L');
    //$pdf->Ln();

    $pdf->setFont('', 'B');
    $pdf->Cell(30, 7, utf8_decode("Resp. Empresa"), 1,0,'L');
    $pdf->setFont('', '');
    $pdf->Cell(0, 7, utf8_decode($colaborador->nombre), 1,1,'L');
    //$pdf->Ln();


    $pdf->setFont('', 'B');
    $pdf->Cell(0, 7, utf8_decode("Servicio Social"), 1,'L');
    $pdf->setFont('', '');
    $pdf->MultiCell(0, 5, utf8_decode($alumnos_servicio), 1,1,'J');

    $pdf->setFont('', 'B');
    $pdf->Cell(0, 7, utf8_decode("Residencias"), 1,'L');
    $pdf->setFont('', '');
    $pdf->MultiCell(0, 5, utf8_decode($alumnos_res), 1,'J');
    $pdf->Ln(7);
}


$pdf->Output();
?>