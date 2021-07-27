<!DOCTYPE html>
<html lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  

<head>
  <title>GESTÃO DE VENDAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<?php
    include_once('conexao.php');

    //recuperando
$codigo = $_POST['txtid'];
$nome = $_POST['txtnome'];
$cpf = $_POST['txtcpf'];
$obs = $_POST['txtobs'];



        // criando a linha do  UPDATE
    $sqlupdate =  "update cliente set nome='$nome', cpf='$cpf', obs='$obs' where id=$codigo";



    //executando instrucão SQL

    $resultado = @mysqli_query($conexao, $sqlupdate);

    if (!$resultado)
    {
        echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
        die('<b>Query Invalida:</b>' . @mysqli_error($conexao));
    }else{
        echo '<div class="p-5"><p><b> Registro Alterado com Sucesso </p></b></div>
        <div class="p-5"><a href="index.php" class="btn mx-1 mt-1" style="background-color:darkred; color:white; border-radius: 25px;">Home</a>
        <a href="lista_cliente.php" class="btn mt-1" style="background-color: darkred; color: white; border-radius: 25px;">Nova Alteração</a> </div>';
    
    }
    mysqli_close($conexao);
?>
<br><br>

</body>
</html>