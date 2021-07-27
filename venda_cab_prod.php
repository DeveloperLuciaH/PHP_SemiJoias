
<?php
include("conexao.php");

// criar função onde vai pegar para fazer a listagem dos clientes
function listarClientes($conexao)
{ 
    $listadeclientes = array();
    $resultado = mysqli_query($conexao,"select * from cliente order by nome");

 // percorrer a lista
    while($cliente = mysqli_fetch_assoc($resultado)){

    array_push($listadeclientes, $cliente);         

    }

    return $listadeclientes; 
}

// variável que recebe o retorno da lista da função
$listacli = listarClientes($conexao);

?>

<html>    
<head>
  <title>GESTÃO DE VENDAS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>   
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
        <div class="row mt-5">
            <div class="col-md-5" style="background-color: darkred; color:white">
                <br><br><br><br><br><br><br>
                <div class="text-center">
                   <h1> Módulo de Vendas </h1> <br>
                   <i class="fas fa-barcode" style="font-size: 150px;"></i><br><br>
                    <button type="button" class="btn btn-outline-light mt-4 mb-5 mr-2" value="Voltar" onclick="javascript: location.href='index.php';" style="border-radius: 25px;">Voltar</button>
                    <!--redireciona para a tela indicada-->
                </div>
            </div>

            <div class="col-md-7 p-5">
                <h2 class="text-center" style="color: darkred;"> <i class="fas fa-barcode"></i> Informações da Venda </h2>
                <hr class="mb-5">
                <form method="post" action="cad_venda.php" style="margin-left: 70px;">
                    <!-- Ele envia os dados para tela de cadastro-->
                    <div class="form-row">
                        <div class="form-group col-md-10 mb-3">
                            <b><label for="exampleInputUsuario">Nome do Cliente</label></b>
                            <select style="font-size:18px" class="form-control" name="txtcliente">
                                <?php foreach ($listacli as $cli) { ?>
                                    <option value="<?php echo $cli['id'] ?>"><?php echo $cli['nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 mt-3 mb-3">
                            <b><label for="exampleInputVenda">Observação</label></b>
                            <textarea name="txtobs" cols="30" rows="6" class="form-control" placeholder="Observação"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn mt-3 text-center" style="background-color: darkred; color:white; border-radius: 25px;" value="Iniciar Venda"> Iniciar Venda </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>