<!DOCTYPE html>
<html lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<head>
  <title>GESTÃO DE VENDAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>

<body>
  <?php
  include_once('conexao.php');
  //recuperandos
  $codigo = $_GET['codigo'];

  //criando a linha do select
  $sqlconsulta = "select * from produto where id = '$codigo'";

  //executando instrucão SQL

  $resultado = @mysqli_query($conexao, $sqlconsulta);

  if (!$resultado) {
    echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
    die('<b>Query Invalida:</b>' . @mysqli_error($conexao));
  } else {
    $num = @mysqli_num_rows($resultado);
    if ($num == 0) {
      echo "<b>Codigo: </b>nao localizado <br><br>";
      echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
      exit;
    } else {
      $dado = mysqli_fetch_array($resultado);
    }
  }
  mysqli_close($conexao);
  ?>

    <body>
        <?php include("header.php") ?>

        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-5" style="background-color: darkred; color:white">
                    <br><br><br><br><br><br><br>

                    <div class="text-center">
                        <h1> Alteração de Produtos </h1> <br>
                        <i class="fas fa-shopping-cart" style="font-size: 150px;"></i><br><br>
                        <button type="button" class="btn btn-outline-light mt-4 mb-5 mr-2" value="Voltar" onclick="javascript: location.href='index.php';" style="border-radius: 25px;">Voltar</button>
                        <!--redireciona para a tela indicada-->
                    </div>
                </div>

                <div class="col-md-7 p-3">
                    <h3 class="text-center" style="color: darkred;"> <i class="fas fa-shopping-cart"></i> Alteração de Produto </h3>
                    <hr class="mb-4">
                    <form method="post" action="alterar_produto.php" style="margin-left: 70px;">
                        <!-- Ele envia os dados para tela de cadastro-->

                        <div class="form-group">
                            <i class="fas fa-sort-numeric-down"></i>
                            <label class="md-3" for="id">Código</label>
                            <input class="form-control" type="id" name="txtid" id="id" value='<?php echo $dado['id']; ?>' readonly>
                        </div>


                        <div class="form-group ">
                            <label class="md-3 mt-3" for="descricao">Descrição do Produto</label>
                            <input class="form-control" name="txtdescricao" type="text" id="descricao" value='<?php echo $dado['descricao']; ?>'>
                        </div>


                        <div class="form-group">
                            <label class="md-3" for="quant">Quantidade</label>
                            <input class="form-control" name="txtquant" type="text" id="quant" value='<?php echo $dado['quant']; ?>'>
                        </div>



                        <div class="form-group">
                            <label class="md-3" for="preco">Preço</label>
                            <input class="form-control" name="txtpreco" type="text" id="preco" value='<?php echo $dado['preco']; ?>'>
                        </div>


                        <div class="form-group">
                            <label class="md-3" for="imagem">Imagem</label>
                            <input type="file" class="form-control" name="txtimagem" id="exampleInputImagem" aria-describedby="imagem">
                        </div>



                        <div class="form-group">
                            <label class="md-3" for="exampleInputVenda">Observação</label>
                            <textarea name="txtobs" cols="30" rows="2" class="form-control" placeholder="Observação"></textarea>
                        </div>
                

                <div class="text-center">
                    <button type="submit" class="btn mt-3 text-center" style="background-color: darkred; color:white; border-radius: 25px;" value="Alterar"> Alterar </button>
                </div>
                </form>
            </div>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

