<?php

date_default_timezone_set('America/Sao_Paulo');
define ('FPDF_FONTPATH', 'font/');
require ('pdf/fpdf.php');

$data = date ("d/m/Y H:i:s");
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->AddPage();
$pdf -> SetFont('Arial', 'B', '12');
$pdo = new PDO ('mysql:host=localhost; dbname=semijoias', 'root', '');

$sql = $pdo ->prepare("select * from cliente order by id");
$sql->execute();

$pdf-> cell(18,1,utf8_decode("RELATÓRIO GERAL DE CLIENTES"),1,3,'C');
$pdf->cell(18,1,"Data: ",$data,1,2,'C'); //ficou uma tarja preta 
$pdf->cell(18,1,"DATA: $data",1,2,'C');
$pdf-> cell(3,1,utf8_decode("CÓDIGO"),1,0,'C');
$pdf-> cell(8,1,"NOME",1,0,'C');
$pdf-> cell(7,1,"CPF",1,1,'C');

foreach($sql as $resultado)
{
    $pdf-> cell (3,1,$resultado['id'],1,0,'C');
    $pdf-> cell (8,1,utf8_decode($resultado['nome']),1,0,'C');
    $pdf-> cell (7,1,utf8_decode($resultado['cpf']),1,1,'C');
}
$pdf-> OutPut();

?>