-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2021 às 03:19
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `semijoias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `obs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `obs`) VALUES
(1, 'Lucia Helena Mesquita Viola Tomaz', '252.642.958-75', ''),
(2, 'Henrique Viola', '111.999.888-77', ''),
(3, 'Roberto Tomaz', '063.628.398-46', ''),
(4, 'Maria de Fátima Pinto', '123.456.78-00', ''),
(5, 'Rafaela Tomaz', '012.345.678-90', ''),
(6, 'Vitor Tomaz', '012.345.678-99', ''),
(7, 'Guilherme Tomaz', '456.789-012-34', ''),
(8, 'Fernanda Ingrid Ferreira', '123.444.555-00', ''),
(12, 'teste alterado de cliente1 ', '111.222.333.44', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd` decimal(6,2) NOT NULL,
  `preco` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id`, `id_venda`, `id_produto`, `qtd`, `preco`) VALUES
(1, 2, 1, '1.00', '100.00'),
(2, 2, 2, '1.00', '1680.00'),
(3, 3, 1, '1.00', '100.00'),
(4, 4, 1, '1.00', '100.00'),
(5, 4, 2, '1.00', '1680.00'),
(6, 4, 3, '1.00', '350.00'),
(7, 6, 5, '1.00', '70.00'),
(8, 7, 17, '1.00', '1111.00'),
(9, 7, 18, '1.00', '1212.00'),
(10, 8, 17, '1.00', '1111.00'),
(11, 8, 2, '1.00', '999.99'),
(12, 12, 17, '1.00', '1111.00'),
(13, 12, 18, '1.00', '1212.00'),
(14, 12, 3, '1.00', '350.00'),
(15, 12, 3, '1.00', '350.00'),
(16, 13, 3, '1.00', '350.00'),
(17, 13, 2, '1.00', '999.99'),
(18, 14, 3, '1.00', '350.00'),
(19, 14, 4, '1.00', '60.00'),
(20, 15, 2, '1.00', '999.99'),
(21, 15, 3, '1.00', '350.00'),
(22, 16, 1, '1.00', '100.00'),
(23, 16, 4, '1.00', '60.00'),
(24, 17, 1, '1.00', '100.00'),
(25, 19, 1, '1.00', '100.00'),
(26, 19, 2, '1.00', '999.99'),
(27, 20, 2, '1.00', '999.99'),
(28, 20, 3, '1.00', '350.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `quant` decimal(11,2) NOT NULL,
  `preco` decimal(11,2) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `obs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `descricao`, `quant`, `preco`, `imagem`, `data_cadastro`, `obs`) VALUES
(1, 'Gargantilha Mandala - Banhado a Ródio Negro - 45cm', '1.00', '100.00', 'mandala.png', '2021-05-20 14:11:27', ''),
(2, 'Braceletes em micro zircônia banhados a ouro e ródio', '6.00', '1680.00', 'braceletes.png', '2021-05-25 01:15:26', ''),
(3, 'Conjunto Pérola banhado a ouro', '3.00', '350.00', 'cjperola.png', '2021-05-20 14:29:00', ''),
(4, 'Brinco Cristal banhado a ouro', '1.00', '60.00', 'cristal.png', '2021-05-20 14:29:23', ''),
(5, 'Brinco Ear Hock em micro zircônia banhado a ródio', '1.00', '70.00', 'earhock.png', '2021-05-20 14:30:01', ''),
(6, 'Escapulário com micro zircônia banhado a ouro - 70cm', '1.00', '350.00', 'escapulario.png', '2021-05-20 14:30:44', ''),
(7, 'Gargantilha Fé com micro zircônia - banhado a ouro', '1.00', '180.00', 'fe.png', '2021-05-20 14:31:42', ''),
(8, 'Brinco Infinito com micro zircônia - banhado a ouro', '1.00', '40.00', 'infinito.png', '2021-05-20 14:51:59', ''),
(9, 'Brinco Pérola com micro zircônia banhado a ouro', '1.00', '130.00', 'perola.png', '2021-05-20 14:32:58', ''),
(10, 'Gargantilha Ponto de Luz banhado a ouro', '1.00', '140.00', 'pontoluz.png', '2021-05-20 14:33:36', ''),
(11, 'Brinco Triângulo em Cristal banhado a ouro', '1.00', '40.00', 'triangulo.png', '2021-05-20 14:34:38', ''),
(12, 'Pulseira Pérola com Relicário banhado a ouro', '1.00', '90.00', 'relicario.png', '2021-05-20 14:35:12', ''),
(17, 'teste para alteração 12', '15.00', '1111.00', '', '2021-05-20 18:42:29', ''),
(18, 'teste para alteração 111222', '21.00', '1212.00', '', '2021-05-20 18:42:10', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `obs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `id_cliente`, `data`, `obs`) VALUES
(1, 1, '2021-05-20 18:53:34', ''),
(2, 8, '2021-05-20 19:14:42', ''),
(3, 8, '2021-05-20 19:18:51', ''),
(4, 8, '2021-05-20 19:20:05', ''),
(5, 8, '2021-05-20 19:23:15', ''),
(6, 7, '2021-05-20 19:26:42', ''),
(7, 8, '2021-05-20 19:29:23', ''),
(8, 1, '2021-05-20 19:36:17', ''),
(9, 8, '2021-05-20 19:39:56', ''),
(10, 7, '2021-05-20 19:41:15', ''),
(11, 5, '2021-05-20 19:42:24', ''),
(12, 1, '2021-05-20 20:11:33', ''),
(13, 2, '2021-05-20 20:16:43', ''),
(14, 2, '2021-05-20 20:17:15', ''),
(15, 4, '2021-05-20 23:23:37', ''),
(16, 5, '2021-05-20 23:31:13', ''),
(17, 8, '2021-05-21 02:42:51', ''),
(18, 8, '2021-05-21 02:52:30', ''),
(19, 4, '2021-05-25 00:51:40', ''),
(20, 8, '2021-05-25 01:04:01', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
