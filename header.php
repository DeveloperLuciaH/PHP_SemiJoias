<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href=#>
    <h3><i class="fas fa-laptop-code"></i> LUCIAH
  </a></h3>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" role="button" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-id-card"></i> Cadastros </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="cad_cliente.php"><i class="fas fa-user-alt"></i> Clientes</a>
        <a class="dropdown-item" href="cad_produto.php"><i class="fas fa-cart-plus"></i> Produtos</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" role="button" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i> Movimentações </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="venda_cab_prod.php"><i class="fas fa-barcode"></i> Vendas</a>

      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" role="button" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i> Consultas</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="lista_cliente.php"><i class="fas fa-user-alt"></i> Clientes</a>
        <a class="dropdown-item" href="lista_produto.php"><i class="fas fa-cart-plus"></i> Produtos</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" role="button" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-file-pdf"></i> Relatórios </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="relatorio_cliente_geral.php" target="_blank"><i class="fas fa-user-alt"></i> Clientes</a>
        <a class="dropdown-item" href="relatorio_produto_geral.php" target="_blank"><i class="fas fa-cart-plus"></i> Produtos</a>
        <a class="dropdown-item" href="relatorio_vendas_geral.php" target="_blank"><i class="fas fa-barcode"></i> Vendas</a>
      </div>
    </li>

  </ul>

</nav>