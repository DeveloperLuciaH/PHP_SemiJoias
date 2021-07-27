

<?php


include("conexao.php");

$id_venda = $_GET['id_venda'];

// fazendo select para mostrar a descrição do produto, preço, quantidade 
$consulta = " SELECT produto.descricao, itens_venda.preco, itens_venda.qtd FROM itens_venda, produto where itens_venda.id_venda = $id_venda and produto.id = itens_venda.id_produto";
$con = @mysqli_query($conexao, $consulta) or die($mysqli->error);

//fazendo select para exibição do total da venda
$preco = "SELECT sum(preco * qtd) as total FROM itens_venda where id_venda = $id_venda";
$con_preco = @mysqli_query($conexao, $preco) or die($mysqli->error);
$total = mysqli_fetch_array($con_preco);

// selecionado o cliente
$nome_cli = "select venda.id_cliente, cliente.nome from venda, cliente where venda.id =$id_venda and venda.id_cliente=cliente.id";
$cliente = @mysqli_query($conexao, $nome_cli) or die($mysqli->error);
$dado_cli = mysqli_fetch_array($cliente);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>


<body>

    <header>
        <?php include("header.php") ?>
    </header>

    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-md-12">

                <!--Inicio Pesquisar-->
                <div class=" text-center mt-5 mb-2 mr-2">
                    <h2 class="ml-2" style="color: darkred;"> <i class="fas fa-cart-plus"></i> Consulte seu Carrinho </h2>
                </div>
                <!--Fim dos botões-->
                <div class="d-flex justify-content-between mt-5 mb-2 mr-2">
                    <div class="form-row col-md-6">

                        <div class="form-group col-md-2">
                            <b><label for="exampleInputCodigo">Código</label></b>
                            <input type="text" class="form-control" name="txtcodigo" value='<?php echo $dado_cli['id_cliente']; ?>' readonly>
                        </div>

                        <div class="form-group col-md-7">
                            <b><label for="exampleInputNome">Nome do Cliente</label></b>
                            <input type="text" class="form-control" name="txtnome" value='<?php echo $dado_cli['nome']; ?>' readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <b><label for="exampleInputTotal">Total</label></b>
                            <input type="number" class="form-control" name="txttotal" value='<?php echo bcdiv($total['total'], 1,2); ?>' readonly>
                        </div>
                    </div>

                    <div style="margin-top: 30px;">
                        <a href="venda_prod.php" class="btn " role="button" style="background-color : darkred; color:white; border-radius: 30px;"> <i class="far fa-arrow-alt-circle-left"></i> Voltar </a>
                        <!-- <a target="_blank"href="relatorio_vendas.php?id_venda=<?php echo $id_cli; ?>" class="btn " role="button" style="background-color : darkred; color:white; border-radius: 30px;">
                        <i class="fas fa-print"></i> Imprimir Venda </a> -->
                    </div>

                </div>

                <!--Inicio da Tabela-->
                <table class="table table-borderless table-responsive-md table-hover">
                    <thead class="table-dark">  
                        <tr>   <!--style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F"> -->
                            <th>PRODUTO</th>
                            <th>PREÇO</th>
                            <th>QUANTIDADE</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>

               <!--Estrutura de repetição, que vai executar de acordo com a quantidade de registros armazenados no fetch_array-->
                    <?php while ($dados = $con->fetch_array()) { ?>
                        <!--Organiza os dados em formato de array-->
                        <tbody>
                            <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F">
                                <!--ele localiza pela nome da variavél-->
                                <td><?php echo $dados['descricao']; ?></td>
                                <td><?php echo $dados['preco']; ?></td>
                                <td><?php echo $dados['qtd']; ?></td>
                                <td><?php echo number_format($dados['preco'] * $dados['qtd'], 2); ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <!--Fim da Tabela-->
                </table>
            </div>
        </div>
    </div>

 
 