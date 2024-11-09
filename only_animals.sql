-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/11/2024 às 13:42
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `only_animals`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `finalidade`
--

CREATE TABLE `finalidade` (
  `id` int(1) NOT NULL,
  `finalidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `finalidade`
--

INSERT INTO `finalidade` (`id`, `finalidade`) VALUES
(1, 'procriação'),
(2, 'interação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `idade` int(2) NOT NULL,
  `descrição` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dono` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `relacionamento`
--

CREATE TABLE `relacionamento` (
  `id` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `pet1` int(11) NOT NULL,
  `pet2` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `resultado` int(1) NOT NULL,
  `finalidade` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int(1) NOT NULL,
  `resultado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `resultados`
--

INSERT INTO `resultados` (`id`, `resultado`) VALUES
(1, 'sucesso'),
(2, 'em andamento'),
(3, 'fracasso');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `id` int(1) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'em andamento'),
(2, 'encerrado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `endereço` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `finalidade`
--
ALTER TABLE `finalidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dono` (`dono`);

--
-- Índices de tabela `relacionamento`
--
ALTER TABLE `relacionamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet1` (`pet1`),
  ADD KEY `pet2` (`pet2`),
  ADD KEY `status` (`status`),
  ADD KEY `resultado` (`resultado`),
  ADD KEY `finalidade` (`finalidade`);

--
-- Índices de tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `finalidade`
--
ALTER TABLE `finalidade`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`dono`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `relacionamento`
--
ALTER TABLE `relacionamento`
  ADD CONSTRAINT `relacionamento_ibfk_1` FOREIGN KEY (`pet1`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `relacionamento_ibfk_2` FOREIGN KEY (`pet2`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `relacionamento_ibfk_3` FOREIGN KEY (`resultado`) REFERENCES `resultados` (`id`),
  ADD CONSTRAINT `relacionamento_ibfk_4` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `relacionamento_ibfk_5` FOREIGN KEY (`finalidade`) REFERENCES `finalidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
