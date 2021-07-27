<?php

include("conexao.php");
$consulta = "SELECT * FROM produto";

//Verifica se o formulário foi submetido
if (isset($_GET['txtpesquisar'])) {
    $pesquisa = $_GET['txtpesquisar'];
    $consulta = "SELECT * FROM produto WHERE descricao LIKE '%$pesquisa%' ";
}
$con = @mysqli_query($conexao, $consulta) or die($mysql->error);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTÃO DE VENDAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>


<body>

    <header>
        <?php include("header.php") ?>
    </header>

    <br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="h3 text-center mb-3">Consulta de Produto </div>

                <form method="GET" action="lista_produto.php">
                    <div class="d-flex justify-content-between mt-2">
                        <div>
                            
                            <a href="cad_produto.php" class="btn btn-success  mt-3" style="border-radius:30px;"> <i class="fas fa-plus"></i> Incluir </a>
                            <!-- <a href="lista_produto.php" class="btn btn-warning  mt-3" style="border-radius:30px;"> <i class="fas fa-equals"></i> Consultar </a> -->
                        </div>
                        <ul class="list-inline">

                            <li class="list-inline-item">
                                <input type="text" class="form-control mt-3" name="txtpesquisar" id="exampleInputPesquisar" aria-describedby="pesquisa" placeholder="Pesquisa" style="width:400px; border-radius:30px;">
                            </li>
                            <li class="list-inline-item">
                                <button type="submit" class="btn btn-info" style="border-radius:30px;"><i class="fas fa-search"></i> Pesquisar </button>
                            </li>

                        </ul>
                    </div>
                </form>

                <!-- Inicio da Tabela -->
                <div class="d-flex flex-nowrap" style="overflow: auto">
                    <table class="table table-borderless table-responsive-md table-hover mt-2">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Descrição do Produto</th>
                                <th>Quant.</th>
                                <th>Preço</th>                               
                                <th><center>Foto </td></center>
                                <th style="width:50px;"><center>Ação</th></center>
                            </tr>
                        </thead>

                        <?php while ($dado = $con->fetch_array()) { ?>
                            <tbody>
                                <tr>
                                    <td> <?php echo $dado['id']; ?> </td>
                                    <td> <?php echo $dado['descricao']; ?> </td>
                                    <td> <?php echo $dado['quant']; ?> </td>
                                    <td> <?php echo $dado['preco']; ?> </td>                            
                                   
                                    <td> <a><center> <img src="img/<?php echo $dado['imagem']; ?>"width='50px' heigth='50px'></a></center></td>

                                    <td style="display: flex">
                                        <a href="ver_alteracao_produto.php?codigo=<?php echo $dado['id']; ?>" class="btn btn-info btn-alterar btn-sm m-1" style="border-radius:30px;" role="button">
                                            <i class="fas fa-pencil-alt"></i> Alterar </a>

                                        <a href="ver_exclusao_produto.php?codigo=<?php echo $dado['id']; ?>" class="btn btn-danger btn-excluir btn-sm m-1" style="border-radius:30px;" role="button">
                                            <i class="far fa-trash-alt"></i> Excluir </a>

                                        <a href="relatorio_produto.php?codigo=<?php echo $dado['id']; ?>" target="_blank" class="btn btn-secondary btn-imprimir btn-sm m-1" style="border-radius:30px;" role="button">
                                        <i class="fas fa-print"></i> Imprimir </a>           


                                    </td>
                                </tr>
                            </tbody>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>

<!-- 
  
 $descricao = $_POST['txtdescricao'];
 $quantidade = $_POST['txtquantidade'];
 $preco = $_POST['txtpreco'];
 $lote = $_POST['txtlote'];
 $data_validade = $_POST['txtdatavalidade'];
 $cod_barras = $_POST['txtcodbarras'];
 $fornecedor = $_POST['txtfornecedor'];
  -->