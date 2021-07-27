<?php

date_default_timezone_set('America/Sao_Paulo');

define('FPDF_FONTPATH', 'font/');
require('pdf/fpdf.php');

$data = date('d/m/Y H:i:s');
$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '12');
$pdo = new PDO('mysql:host=localhost; dbname=semijoias', 'root', '');

$sql2 = $pdo->prepare("SELECT max(id) as id FROM venda");
$sql2->execute();
foreach ($sql2 as $res) {
    $id = $res['id'];
}
$idini = 1;

$pdf->cell(18, 1, utf8_decode("RELATÓRIO GERAL DE VENDAS"), 1, 1, 'C');
$pdf->cell(18, 1, $data, 1, 2, 'C');

while ($idini <= $id) {

    $sql = $pdo->prepare("select itens_venda.id_venda,venda.id_cliente, 
    cliente.nome from venda, cliente,itens_venda 
    where venda.id =$idini and venda.id_cliente=cliente.id
    and venda.id = itens_venda.id_venda group by itens_venda.id_venda");
    $sql->execute();


    foreach ($sql as $resultado) {
        $pdf->cell(18, 1, "DATA: ", $data, 1, 2, 'C'); //ficou uma tarja preta
        $pdf->cell(3, 1, utf8_decode("CÓDIGO"), 1, 0, 'C');
        $pdf->cell(12, 1, "NOME", 1, 0, 'C');
        $pdf->cell(3, 1, utf8_decode("COD.VENDA"), 1, 1, 'C');
        $pdf->cell(3, 1, $resultado['id_cliente'], 1, 0, 'C');
        $pdf->cell(12, 1, utf8_decode($resultado['nome']), 1, 0, 'C');
        $pdf->cell(3, 1, $resultado['id_venda'], 1, 1, 'C');
        $pdf->cell(12, 1, utf8_decode("DESCRIÇÃO"), 1, 0, 'C');
        $pdf->cell(3, 1, utf8_decode("PREÇO"), 1, 0, 'C');
        $pdf->cell(3, 1, "QUANTIDADE", 1, 1, 'C');
    }


    $sql1 = $pdo->prepare("select venda.id, produto.descricao, 
    itens_venda.preco,itens_venda.qtd 
    from cliente,venda,produto,itens_venda 
    WHERE produto.id=itens_venda.id_produto and venda.id=itens_venda.id_venda
     and cliente.id = venda.id_cliente and venda.id =$idini ORDER BY venda.id");

    $sql1->execute();

    foreach ($sql1 as $resultado1) {

        $pdf->cell(12, 1, utf8_decode($resultado1['descricao']), 1, 0, 'C');
        $pdf->cell(3, 1, $resultado1['preco'], 1, 0, 'C');
        $pdf->cell(3, 1, $resultado1['qtd'], 1, 1, 'C');
      
    }
    $idini = $idini + 1;
}
$pdf->OutPut();
