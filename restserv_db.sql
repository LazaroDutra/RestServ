-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Out-2016 às 18:53
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restserv_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bebidas`
--

CREATE TABLE `tb_bebidas` (
  `id_bebida` int(11) NOT NULL,
  `nome_bebida` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `fornecedor_bebida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_entrada` date NOT NULL,
  `data_validade` date DEFAULT NULL,
  `qtde_bebida` int(11) NOT NULL,
  `valor_bebida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cargos`
--

CREATE TABLE `tb_cargos` (
  `id` int(11) NOT NULL,
  `nome_cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cargos`
--

INSERT INTO `tb_cargos` (`id`, `nome_cargo`) VALUES
(4, 'Auxiliar de Cozinha'),
(3, 'Cheff'),
(2, 'Garçon'),
(1, 'Gerente'),
(5, 'Serviços Gerais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rg_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `emai_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nome_cliente`, `sexo_cliente`, `rg_cliente`, `cpf_cliente`, `data_nasc`, `emai_cliente`) VALUES
(1, 'Nome Completo', 'Outros', 'MG00000', '999.999.999-99', '2016-10-04', 'admin@restserv.com'),
(2, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(3, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(4, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(5, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(6, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(7, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(8, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(9, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(10, 'Nome Completo', 'Masculino', 'MG00000', '111.111.111-11', '2016-09-29', 'marlon-20-12@hotmail.com'),
(11, 'Joao', 'Masculino', '', '000.000.000-00', '2016-10-04', ''),
(12, 'rui', 'Masculino', 'MG00000', '999.999.999-99', '2016-10-04', 'admin@restserv.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id_endereco` int(11) NOT NULL,
  `rua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CEP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_cliente` int(11) DEFAULT NULL,
  `fk_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco`, `rua`, `numero`, `bairro`, `cidade`, `CEP`, `estado`, `fk_cliente`, `fk_funcionario`) VALUES
(0, ' Rua', 0, 'Bairro', 'Brasiléia', '39830-000', 'Acre', NULL, 903),
(0, 'Rua', 123, 'Bairro', 'Cidade', '123', 'Estado', NULL, 904);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionarios`
--

CREATE TABLE `tb_funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `rg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `est_civil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_conj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_pai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_mae` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_cargo` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_funcionarios`
--

INSERT INTO `tb_funcionarios` (`id`, `nome`, `data_nasc`, `rg`, `cpf`, `sexo`, `est_civil`, `nome_conj`, `nome_pai`, `nome_mae`, `fk_cargo`, `email`) VALUES
(903, 'Marlon Santos', '2016-12-31', 'MG000000000', ' 123.456.789-00', 'Masculino', 'Casado', 'Nome do Conjuge', 'Nome do Pai', 'Nome da Mãe', 5, 'marlon-20-12@hotmail.com'),
(904, 'Completo', '0123-12-12', 'RG', '123.123.123-12', 'Masculino', 'Casado', 'Conjuge', 'Pai', 'Mae', 4, 'email@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `id_iten` int(11) NOT NULL,
  `fk_prato` int(11) NOT NULL,
  `fk_bebida` int(11) NOT NULL,
  `fk_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesas`
--

CREATE TABLE `tb_mesas` (
  `id_mesa` int(11) NOT NULL,
  `numero_mesa` int(11) NOT NULL,
  `status_mesa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_mesas`
--

INSERT INTO `tb_mesas` (`id_mesa`, `numero_mesa`, `status_mesa`) VALUES
(5, 5, 'Disponível');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `hora_inicial_p` time NOT NULL,
  `hora_final_p` time NOT NULL,
  `fk_mesa` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_status_mesa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pratos`
--

CREATE TABLE `tb_pratos` (
  `id_prato` int(11) NOT NULL,
  `nome_prato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_prato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_prato` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_pratos`
--

INSERT INTO `tb_pratos` (`id_prato`, `nome_prato`, `desc_prato`, `valor_prato`) VALUES
(1, 'Nome Prato 33', 'Descrição do Prato33', 933),
(2, 'Nome Prato', 'Descrição do Prato', 11),
(3, 'pizza', 'erererer', 12),
(4, 'Prato', 'Desc', 5),
(5, 'AAA', 'BBB', 111);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_telefones`
--

CREATE TABLE `tb_telefones` (
  `id_telefone` int(11) NOT NULL,
  `fk_cliente` int(11) DEFAULT NULL,
  `fk_funcionario` int(11) DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_telefones`
--

INSERT INTO `tb_telefones` (`id_telefone`, `fk_cliente`, `fk_funcionario`, `telefone`, `tipo_telefone`) VALUES
(3, NULL, 903, '(00) 0000-0000', '(11) 11111-1111'),
(4, NULL, 904, '(12) 3123-123', '(12) 31231-2312');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `Id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `senha` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`Id`, `usuario`, `email`, `senha`) VALUES
(1, 'admin', 'admin@restser,com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bebidas`
--
ALTER TABLE `tb_bebidas`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Indexes for table `tb_cargos`
--
ALTER TABLE `tb_cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_cargo` (`nome_cargo`);

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD KEY `id_cliente` (`fk_cliente`),
  ADD KEY `fk_funcionario` (`fk_funcionario`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indexes for table `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo_id` (`fk_cargo`);

--
-- Indexes for table `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD PRIMARY KEY (`id_iten`),
  ADD KEY `fk_prato` (`fk_prato`),
  ADD KEY `fk_bebida` (`fk_bebida`),
  ADD KEY `fk_pedido` (`fk_pedido`);

--
-- Indexes for table `tb_mesas`
--
ALTER TABLE `tb_mesas`
  ADD PRIMARY KEY (`id_mesa`),
  ADD UNIQUE KEY `numero_mesa` (`numero_mesa`),
  ADD KEY `status_mesa` (`status_mesa`);

--
-- Indexes for table `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_mesa` (`fk_mesa`),
  ADD KEY `id_cliente` (`fk_cliente`),
  ADD KEY `status_mesa` (`fk_status_mesa`);

--
-- Indexes for table `tb_pratos`
--
ALTER TABLE `tb_pratos`
  ADD PRIMARY KEY (`id_prato`);

--
-- Indexes for table `tb_telefones`
--
ALTER TABLE `tb_telefones`
  ADD PRIMARY KEY (`id_telefone`),
  ADD KEY `id_usuario` (`fk_cliente`),
  ADD KEY `fk_funcionario` (`fk_funcionario`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bebidas`
--
ALTER TABLE `tb_bebidas`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tb_cargos`
--
ALTER TABLE `tb_cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=905;
--
-- AUTO_INCREMENT for table `tb_itens`
--
ALTER TABLE `tb_itens`
  MODIFY `id_iten` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_mesas`
--
ALTER TABLE `tb_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pratos`
--
ALTER TABLE `tb_pratos`
  MODIFY `id_prato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_telefones`
--
ALTER TABLE `tb_telefones`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `tb_endereco_ibfk_1` FOREIGN KEY (`fk_funcionario`) REFERENCES `tb_funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_endereco_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_funcionarios`
--
ALTER TABLE `tb_funcionarios`
  ADD CONSTRAINT `tb_funcionarios_ibfk_1` FOREIGN KEY (`fk_cargo`) REFERENCES `tb_cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD CONSTRAINT `tb_itens_ibfk_1` FOREIGN KEY (`fk_bebida`) REFERENCES `tb_bebidas` (`id_bebida`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_itens_ibfk_2` FOREIGN KEY (`fk_pedido`) REFERENCES `tb_pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_itens_ibfk_3` FOREIGN KEY (`fk_prato`) REFERENCES `tb_pratos` (`id_prato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD CONSTRAINT `tb_pedidos_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pedidos_ibfk_3` FOREIGN KEY (`fk_mesa`) REFERENCES `tb_mesas` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pedidos_ibfk_4` FOREIGN KEY (`fk_status_mesa`) REFERENCES `tb_mesas` (`status_mesa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_telefones`
--
ALTER TABLE `tb_telefones`
  ADD CONSTRAINT `tb_telefones_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_telefones_ibfk_2` FOREIGN KEY (`fk_funcionario`) REFERENCES `tb_funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
