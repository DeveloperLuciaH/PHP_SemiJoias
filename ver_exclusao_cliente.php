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
    //recuperando
    $codigo = $_GET['codigo'];

    //criando a linha do select
    $sqlconsulta = "select * from cliente where id = '$codigo'";

    //executando instrucão SQL

    $resultado = @mysqli_query($conexao, $sqlconsulta);

    if (!$resultado) {
        echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
        die('<b>Query Invalida:</b>' . @mysqli_error($conexao));
    } else {
        $num = @mysqli_num_rows($resultado);
        if ($num == 0) {
            echo "<b>Codigo: </b>nao localizado !!!!<br><br>";
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
                        <h1> Exclusão de Cliente </h1> <br>
                        <i class="fas fa-user-times" style="font-size: 150px;"></i><br><br>
                        <button type="button" class="btn btn-outline-light mt-4 mb-5 mr-2" value="Voltar" onclick="javascript: location.href='index.php';" style="border-radius: 25px;">Voltar</button>
                    </div>
                </div>
                <!--redireciona para a tela indicada-->
                <div class="col-md-7 p-3">
                    <h3 class="text-center" style="color: darkred;"> <i class="fas fa-user-times"></i> Exclusão de Cliente </h3>
                    <hr class="mb-4">
                    <form method="post" action="exclusao_cliente.php" style="margin-left: 70px;">


                        <div class="form-group">
                            <i class="fas fa-sort-numeric-down"></i>
                            <label class="md-3" for="id">Código</label>
                            <input class="form-control" type="id" name="txtid" id="id" value='<?php echo $dado['id']; ?>' readonly>
                        </div>

                        <div class="form-group">
                            <i class="fas fa-user-times"></i>
                            <label class="md-3 mt-3" for="exampleInptname">Nome do Cliente</label>
                            <input class="form-control" name="txtnome" type="text" id="nome" value='<?php echo $dado['nome']; ?>'>
                        </div>

                        <div class="form-group">
                            <label class="md-3">CPF</label>
                            <input class="form-control" type="text" name="txtcpf" id="cpf" value='<?php echo $dado['cpf']; ?>'>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md mb-3">
                                <label for="exampleInputVenda">Observação</label>
                                <textarea name="txtobs" cols="30" rows="2" class="form-control" placeholder="Observação"></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn mt-3 text-center" style="background-color: darkred; color:white; border-radius: 25px;" value="Excluir"> Excluir </button>
                        </div>


                    </form>

                </div>

            </div>



            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </div>
    </body>

</html>