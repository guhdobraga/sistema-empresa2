-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/06/2024 às 05:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `beneficios_empresa`
--

CREATE TABLE `beneficios_empresa` (
  `id_funcionario` int(11) NOT NULL,
  `fundog` varchar(3) NOT NULL,
  `vale_transporte` varchar(3) NOT NULL,
  `ferias` varchar(3) NOT NULL,
  `licença` varchar(3) NOT NULL,
  `terceiro` varchar(3) NOT NULL,
  `vale_alimento` varchar(3) NOT NULL,
  `plano` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `beneficios_empresa`
--

INSERT INTO `beneficios_empresa` (`id_funcionario`, `fundog`, `vale_transporte`, `ferias`, `licença`, `terceiro`, `vale_alimento`, `plano`) VALUES
(24, '1', '0', '0', '0', '1', '1', '0'),
(25, '1', '1', '0', '1', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque_interno`
--

CREATE TABLE `estoque_interno` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `qntd` varchar(255) NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `lote` varchar(255) NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `validade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `estoque_interno`
--

INSERT INTO `estoque_interno` (`id`, `nome`, `qntd`, `fornecedor`, `lote`, `lugar`, `validade`) VALUES
(3, 'bolachinha', '3', 'kawakami', '6', 'Cozinha', '2024-05-15'),
(4, 'Pratos', '12', 'ryan', '2421', 'acrilex', '2024-05-06'),
(5, 'Rolos de Papel Higiênico', '7', 'neve', '123', 'Banheiro', '2024-09-25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `frota_veiculos`
--

CREATE TABLE `frota_veiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `ano` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `frota_veiculos`
--

INSERT INTO `frota_veiculos` (`id`, `marca`, `placa`, `ano`, `tipo`) VALUES
(1, '23', '43', 234, 'NFS-e');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gestao_financeira`
--

CREATE TABLE `gestao_financeira` (
  `id` int(11) NOT NULL,
  `titulo_fatura` varchar(255) NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `gestao_financeira`
--

INSERT INTO `gestao_financeira` (`id`, `titulo_fatura`, `fornecedor`, `cnpj`, `vencimento`, `valor`) VALUES
(1, 'luz', 'energisa', '123123213', '02/06/2025', '1500'),
(3, 'joao', 'cu', '2334343', '234', '3425');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login_empresa`
--

CREATE TABLE `login_empresa` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `login_empresa`
--

INSERT INTO `login_empresa` (`id`, `email`, `senha`, `cargo`) VALUES
(1, 'a@gmail.com', '123', 1),
(2, 'b@gmail.com', '123', 2),
(8, 'joaopedrobordasilva@gmail.com', '1234', 6),
(24, 'sdsdsa@sdsa', '123', 3),
(25, 'dsfdsf@dfdsf', '1234', 4),
(26, 'dsfdsf@dfdsf', '1234', 4),
(27, 'dsfdsf@dfdsf', '1234', 4),
(28, 'e@gmail.com', '123', 5),
(29, 'e@gmail.com', '123', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas_fiscais`
--

CREATE TABLE `notas_fiscais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `notas_fiscais`
--

INSERT INTO `notas_fiscais` (`id`, `nome`, `numero`) VALUES
(6, 'NF-e', '2323'),
(7, 'NFS-e', '234345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `novos_funcionarios`
--

CREATE TABLE `novos_funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `titulo` varchar(6) NOT NULL,
  `pnome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cep` int(8) NOT NULL,
  `cpf` int(11) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `telefone` int(20) NOT NULL,
  `celular` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `datanascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `novos_funcionarios`
--

INSERT INTO `novos_funcionarios` (`id_funcionario`, `titulo`, `pnome`, `sobrenome`, `genero`, `senha`, `endereco`, `cep`, `cpf`, `municipio`, `pais`, `estado`, `telefone`, `celular`, `email`, `cargo`, `datanascimento`) VALUES
(24, 'sra', 'alhos', 'temperinha', 'feminino', '123', 'rua sebastião ribeiro nogueira', 3232, 32324, 'dsad', 'Brasil', 'São Paulo', 2147483647, 344545435, 'sdsdsa@sdsa', '3', '2024-05-15'),
(25, 'sr', 'alhos', 'cebola', 'masculino', '1234', 'rua sebastião ribeiro nogueira', 0, 21414, 'Paraguaçu', 'Brasil', 'São Paulo', 2147483647, 12323432, 'dsfdsf@dfdsf', '4', '2024-05-06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_compras`
--

CREATE TABLE `registro_compras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` int(20) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `ano` int(4) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `inform` varchar(255) NOT NULL,
  `estoque` int(20) NOT NULL,
  `pagamento` varchar(8) NOT NULL,
  `nomtitular` varchar(255) NOT NULL,
  `numcartao` int(30) NOT NULL,
  `mes` int(2) NOT NULL,
  `anoc` int(4) NOT NULL,
  `codigo` int(3) NOT NULL,
  `parcelas` int(2) NOT NULL,
  `depositar` int(10) NOT NULL,
  `valortotal` int(15) NOT NULL,
  `imagem` varchar(15) NOT NULL,
  `cor` varchar(25) NOT NULL,
  `quilometragem` varchar(20) NOT NULL,
  `combustivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `registro_compras`
--

INSERT INTO `registro_compras` (`id`, `nome`, `cpf`, `endereco`, `email`, `telefone`, `modelo`, `ano`, `placa`, `inform`, `estoque`, `pagamento`, `nomtitular`, `numcartao`, `mes`, `anoc`, `codigo`, `parcelas`, `depositar`, `valortotal`, `imagem`, `cor`, `quilometragem`, `combustivel`) VALUES
(41, 'Jp', 21414, '87987879', 'joaopedrobordasilva@gmail.com', 2147483647, 'Gol1', 2000, '3422343223', '1234', 123, 'dinheiro', 'João', 0, 0, 0, 0, 0, 12432, 23421, '', 'Roxo', '23231', '234'),
(42, 'Jp', 21414, 'rua sebastião ribeiro nogueira', 'joaopedrobordasilva@gmail.com', 2147483647, 'Gol', 1243, '3422343223', '1234', 234, 'cheque', 'João', 0, 0, 0, 0, 0, 1432, 345433, '', 'Não Definido', 'Não Definido', 'Não Definido'),
(43, 'Jp', 21414, 'rua sebastião ribeiro nogueira', 'joaopedrobordasilva@gmail.com', 2147483647, 'Gol', 1243, '3422343223', '1234', 234, 'cheque', 'João', 0, 0, 0, 0, 0, 1432, 345433, '', 'Não Definido', 'Não Definido', 'Não Definido'),
(44, 'Jp', 21414, 'rua sebastião ribeiro nogueira', 'joaopedrobordasilva@gmail.com', 2147483647, 'Gol', 1243, '3422343223', '1234', 234, 'cheque', 'João', 0, 0, 0, 0, 0, 1432, 345433, '', 'Não Definido', 'Não Definido', 'Não Definido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_empresa`
--

CREATE TABLE `registro_empresa` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `optante` varchar(4) NOT NULL,
  `empregados` int(11) NOT NULL,
  `sistema` varchar(255) NOT NULL,
  `ponte` varchar(255) NOT NULL,
  `atividade` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(9) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `whatsapp` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome_imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_vendas`
--

CREATE TABLE `registro_vendas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` int(20) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `ano` int(4) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `inform` varchar(255) NOT NULL,
  `estoque` int(20) NOT NULL,
  `numfiscal` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `valor` varchar(255) NOT NULL,
  `pagamento` varchar(8) NOT NULL,
  `nomev` varchar(255) NOT NULL,
  `comissao` varchar(255) NOT NULL,
  `duracao` varchar(255) NOT NULL,
  `cobertura` varchar(255) NOT NULL,
  `termos` varchar(255) NOT NULL,
  `seguro` varchar(3) NOT NULL,
  `texto_seguro` varchar(255) NOT NULL,
  `planomenu` varchar(3) NOT NULL,
  `texto_plano` varchar(255) NOT NULL,
  `nenhum` varchar(3) NOT NULL,
  `status` varchar(15) NOT NULL,
  `datav` date NOT NULL,
  `nomtitular` varchar(255) NOT NULL,
  `numcartao` int(30) NOT NULL,
  `mes` int(2) NOT NULL,
  `anoc` int(4) NOT NULL,
  `codigo` int(3) NOT NULL,
  `parcelas` int(2) NOT NULL,
  `depositar` int(10) NOT NULL,
  `valortotal` varchar(255) NOT NULL,
  `imagem` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `registro_vendas`
--

INSERT INTO `registro_vendas` (`id`, `nome`, `cpf`, `endereco`, `email`, `telefone`, `modelo`, `ano`, `placa`, `inform`, `estoque`, `numfiscal`, `data`, `valor`, `pagamento`, `nomev`, `comissao`, `duracao`, `cobertura`, `termos`, `seguro`, `texto_seguro`, `planomenu`, `texto_plano`, `nenhum`, `status`, `datav`, `nomtitular`, `numcartao`, `mes`, `anoc`, `codigo`, `parcelas`, `depositar`, `valortotal`, `imagem`) VALUES
(1, 'Jp2', 21414, 'rua sebastião ribeiro nogueira', 'joaopedrobordasilva@gmail.com', 2147483647, 'Gol1', 1987, '3422343223', '1234', 123, '2311', '2024-05-14', '123', 'cartao', '1234', '1234', '1234', '1234', '1234', 'sim', '21324', '', '2132134', '', 'processo', '2024-05-05', 'João', 3243, 23, 2345, 234, 23, 0, '23453', 'elo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `beneficios_empresa`
--
ALTER TABLE `beneficios_empresa`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `estoque_interno`
--
ALTER TABLE `estoque_interno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `frota_veiculos`
--
ALTER TABLE `frota_veiculos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `gestao_financeira`
--
ALTER TABLE `gestao_financeira`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login_empresa`
--
ALTER TABLE `login_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `novos_funcionarios`
--
ALTER TABLE `novos_funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `registro_compras`
--
ALTER TABLE `registro_compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registro_empresa`
--
ALTER TABLE `registro_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registro_vendas`
--
ALTER TABLE `registro_vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque_interno`
--
ALTER TABLE `estoque_interno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `frota_veiculos`
--
ALTER TABLE `frota_veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `gestao_financeira`
--
ALTER TABLE `gestao_financeira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `login_empresa`
--
ALTER TABLE `login_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `novos_funcionarios`
--
ALTER TABLE `novos_funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `registro_compras`
--
ALTER TABLE `registro_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `registro_empresa`
--
ALTER TABLE `registro_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `registro_vendas`
--
ALTER TABLE `registro_vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `beneficios_empresa`
--
ALTER TABLE `beneficios_empresa`
  ADD CONSTRAINT `beneficios_empresa_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `novos_funcionarios` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
