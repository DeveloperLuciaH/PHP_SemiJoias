
<?php


include("conexao.php");

$prod=$_GET ['codigo'];
$preco=$_GET ['preco'];
$qtd=$_GET ['qtd'];
$id_venda=$_GET ['id_venda'];

$sqlinsert="insert into itens_venda values (0, '$id_venda', '$prod', '$qtd', '$preco')";

$resultado = @mysqli_query($conexao, $sqlinsert);

    if (!$resultado) {

        die('Query Inválida: ' . @mysqli_error($conexao));  

    } else {

        header('Location:venda_prod.php');

    } 

    mysqli_close($conexao);

?>
