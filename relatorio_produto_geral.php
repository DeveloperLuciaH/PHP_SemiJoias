<?php

date_default_timezone_set('America/Sao_Paulo');
define ('FPDF_FONTPATH', 'font/');
require ('pdf/fpdf.php');

$data = date ("d/m/Y H:i:s");
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->AddPage();
$pdf -> SetFont('Arial', 'B', '12');
$pdo = new PDO ('mysql:host=localhost; dbname=semijoias', 'root', '');

$sql = $pdo ->prepare("select * from produto order by id");
$sql->execute();

$pdf-> cell(18,1,utf8_decode("RELATÓRIO GERAL DE PRODUTOS"),1,3,'C');
$pdf->cell(18,1,"Data: ",$data,1,2,'C'); //ficou uma tarja preta 
$pdf->cell(18,1,"Data: $data",1,2,'C');
$pdf-> cell(2,1,utf8_decode("CÓD."),1,0,'C');
$pdf-> cell(12,1,utf8_decode("PRODUTO"),1,0,'C');
$pdf-> cell(2,1,"QUANT.",1,0,'C');
$pdf-> cell(2,1,utf8_decode("PREÇO"),1,1,'C');

foreach($sql as $resultado)
{
    $pdf-> cell (2,1,$resultado['id'],1,0,'C');
    $pdf-> cell (12,1,utf8_decode($resultado['descricao']),1,0,'C');
    $pdf-> cell (2,1,utf8_decode($resultado['quant']),1,0,'C');
    $pdf-> cell (2,1,utf8_decode($resultado['preco']),1,1,'C');
}
$pdf-> OutPut();

?>