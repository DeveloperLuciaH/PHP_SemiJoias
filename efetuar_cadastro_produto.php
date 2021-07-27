<?php

include("conexao.php"); //chama o arquivo conexao php

//recebendo os dados tabela produto
$descricao = $_POST['txtdescricao'];
$quant = $_POST['txtquant'];
$preco = $_POST['txtpreco'];
$imagem = $_POST['txtimagem'];
$obs = $_POST['txtobs'];


//essa variavél recebe o comando de inserção
$sqlinsert = "insert into produto values (0, '$descricao', '$quant' ,  '$preco' , '$imagem' ,  now(),  '$obs')"; 

//executando instrução no SQL
//@mysqli_query é um comando que exige dois parametros (conecta ao banco / insere, deleta, consulta e atualiza a informação)
$resultado = @mysqli_query($conexao, $sqlinsert);


if (!$resultado){ 
  //Esse comando só é executado quando não é possivel inserir a informação no banco   
  die('Query Inválido: ' . @mysqli_error($conexao));  
} else {
  include("header.php");
  echo 
    '<div class="p-5"><p><b> Registro Cadastrado com Sucesso </p></b>
    </diV>
    </div>
    <div class="p-5"><a href="index.php" class="btn mx-1 mt-1" style="background-color:darkred; color:white; border-radius: 25px;">Home</a>
    <a href="cad_produto.php" class="btn mx-1 mt-1" style="background-color: darkred; color:white; border-radius: 25px;">Novo Cadastro</a>
    <a href="lista_produto.php" class="btn mt-1" style="background-color: darkred; color:white; border-radius: 25px;">Ver Cadastro</a></div>';
}
mysqli_close($conexao); //Fecha a conexão com o banco

?> <!--Fecha o arquivo php, pois está sendo utilizado outras instruções-->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>
<body>
<br>

<!-- <input class= "btn btn-info mt-2" type='button' onclick="window.location='cad_produto.php';" value="Voltar"> -->

</body>
</html>
