<?php 

require('pdf/fpdf.php');


$equipamiento=$_POST['equipamiento'];
$serie=$_POST['s_n'];
$departamento=$_POST['departamento'];
$num_proyecto=$_POST['n_proyecto'];
$detalle=$_POST['detalle'];




$fpdf=new FPDF();
$fpdf->addPage();
$fpdf->SetFont('Arial','',10);
$fpdf->setX(180);
$fpdf->Cell(60,5,date("y-m-d"));
$fpdf->Image('img/UTN_logo.jpg' , 10 ,8, 15 , 20,'JPG');

$fpdf->Ln();
$fpdf->Ln();

$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();

$fpdf->SetFont('Arial','B',16); //Where "U" means underline.
$fpdf->setY(30);$fpdf->setX(75);
$fpdf->Cell(60,5,'ACTA DE ENTREGA');

$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();

$fpdf->SetFont('Arial','',12);
$fpdf->Cell(60,5,'Por intermedio del presente documento se deja constancia de la entrega del siguiente equipamiento');
$fpdf->Ln();
$fpdf->Cell(60,5,'informatico:');
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->SetFont('Arial','',12);
$fpdf->Cell(60,5,'Equipo: '.$equipamiento);

$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(60,5,'S/N: '.$serie);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(60,5,'Departamento: '.$departamento);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(60,5,'Numero de Proyecto: '.$num_proyecto);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(60,5,'Detalles del equipo:');
$fpdf->Ln();
$fpdf->Ln();
$fpdf->MultiCell(190,5,$detalle);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();

$fpdf->Cell(60,5,'...........................................................                                           .............................................................                  ');
$fpdf->Ln();
$fpdf->Ln();

$fpdf->Cell(60,5,'                      Firma                                                                                     Gestion Tecnologica');


   $fpdf->OutPut();








?>