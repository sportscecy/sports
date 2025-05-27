<?php
require('../fpdf/fpdf.php');
include("conexion.php");
class PDF extends FPDF
{
// Cabecera de página
function Header()
{

   // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    $this->Cell(100,10,'TICKET',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->Ln(20);
$this->Cell(38,10,'id',1,0,'C',0);
$this->Cell(38,10,'email_cliente',1,0,'C',0);
$this->Cell(38,10,'crear',1,1,'C',0);




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
require("conexion.php");
$consulta= "SELECT * FROM carro";
$resultado= mysqli_query($mysqli, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while($row=$resultado->fetch_assoc()){
$pdf->Cell(38,10,$row['id'],1,0,'C',0);
$pdf->Cell(38,10,$row['email_cliente'],1,0,'C',0);
$pdf->Cell(38,10,$row['crear'],1,1,'C',0);



}

$pdf->Output();
?>