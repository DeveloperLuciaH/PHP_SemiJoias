<?php

$id_venda = $_GET ['id_venda'];

date_default_timezone_set('America/Sao_Paulo');
define ('FPDF_FONTPATH', 'font/');
require ('pdf/fpdf.php');

$data = date ("d/m/Y H:i:s");
$pdf = new FPDF ('P', 'cm', 'A4');
$pdf->AddPage();
$pdf -> SetFont('Arial', 'B', '12');
$pdo = new PDO ('mysql:host=localhost; dbname=semijoias', 'root', '');

$sql = $pdo ->prepare("select venda.id_cliente, cliente.nome from venda, cliente where venda.id =$id_venda and venda.id_cliente=cliente.id");
$sql->execute();

$pdf-> cell(18,1,utf8_decode("RELATÓRIO INDIVIDUAL DE VENDAS"),1,1,'C');
$pdf->cell(18,1,"Data: ",$data,1,2,'C'); //ficou uma tarja preta 
$pdf->cell(18,1,"DATA: $data",1,2,'C');
$pdf-> cell(3,1,utf8_decode("CÓDIGO"),1,0,'C');
$pdf-> cell(15,1,utf8_decode(" NOME DO CLIENTE"),1,1,'C');

foreach($sql as $resultado)
{
    $pdf-> cell (3,1,$resultado['id_cliente'],1,0,'C');
    $pdf-> cell (15,1,utf8_decode($resultado['nome']),1,1,'C');
    
}

$sql1 = $pdo ->prepare("select produto.descricao, itens_venda.preco, itens_venda.qtd FROM itens_venda, produto where itens_venda.id_venda = $id_venda and produto.id = itens_venda.id_produto");
$sql1->execute();

$pdf->cell(18,1,"Data: ",$data,1,2,'C'); //ficou uma tarja preta 
$pdf-> cell(12,1,utf8_decode("DESCRIÇÃO"),1,0,'C');
$pdf-> cell(3,1,utf8_decode("PREÇO"),1,0,'C');
$pdf-> cell(3,1,"QUANTIDADE",1,1,'C');
// $pdf-> cell(4,1,utf8_decode("TOTAL"),1,1,'C');

foreach($sql1 as $resultado)
{
    $pdf-> cell (12,1,utf8_decode($resultado['descricao']),1,0);
    $pdf-> cell (3,1,utf8_decode($resultado['preco']),1,0,'C');
    $pdf-> cell (3,1,utf8_decode($resultado['qtd']),1,1,'C');
    // $pdf-> cell (3,1,utf8_decode($resultado['total']),1,0,'C');
    
}
$pdf-> OutPut();

?>