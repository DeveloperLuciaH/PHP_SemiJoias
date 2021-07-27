<html>

<head>
    <title>GESTÃO DE VENDAS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <scrip src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></scrip>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">


</head>


<body>
    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-5" style="background-color: darkred; color:white">
                <br><br><br><br><br><br><br>
                <div class="text-center">
                    <h1> Cadastro de Produtos </h1> <br>
                    <i class="fas fa-cart-plus" style="font-size: 150px;"></i><br><br>
                    <button type="button" class="btn btn-outline-light mt-4 mb-5 mr-2" value="Voltar" onclick="javascript: location.href='index.php';" style="border-radius: 25px;">Voltar</button>
                    <!--redireciona para a tela indicada-->
                </div>
            </div>

            <div class="col-md-7 p-3">
                <h3 class="text-center" style="color: darkred;"> <i class="fas fa-cart-plus"></i> Informações do Produto </h3>
                <hr class="mb-4">
                <form method="post" action="efetuar_cadastro_produto.php" style="margin-left: 70px;">
                    <!-- Ele envia os dados para tela de cadastro-->
                    <div class="form-row">
                        <div class="form-group col-md-10 mb-2">
                            <label for="descricao">Descrição do Produto</label>
                            <input class="form-control" aria-label="Sizing example input" name="txtdescricao" type="descricao">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 mb-2">
                            <label for="quant">Quantidade</label>
                            <input class="form-control" aria-label="Sizing example input" name="txtquant" type="quant">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10 mb-2">
                            <label for="preco">Preço</label>
                            <input class="form-control" aria-label="Sizing example input" name="txtpreco" type="preco">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-10 mb-2">
                            <label for="imagem">Imagem</label>
                            <input type="file" class="form-control" name="txtimagem" id="exampleInputImagem" aria-describedby="imagem">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-10 mb-2">
                            <label for="exampleInputVenda">Observação</label>
                            <textarea name="txtobs" cols="30" rows="2" class="form-control" placeholder="Observação"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn mt-2 text-center" style="background-color: darkred; color:white; border-radius: 25px;" value="Cadastrar"> Cadastrar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>