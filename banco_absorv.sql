-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.infinityfree.com
-- Tempo de geração: 16/09/2026 às 08:09
-- Versão do servidor: 11.4.13-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_42268767_banco_absorv`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `senha`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `banheiro`
--

CREATE TABLE `banheiro` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `banheiro`
--

INSERT INTO `banheiro` (`id`, `nome`, `estoque`) VALUES
(1, 'banheiro_Térreo', 18),
(2, 'banheiro_andar_1', 8),
(3, 'banheiro_andar_2', 10),
(4, 'banheiro_andar_3', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `data_hora` datetime NOT NULL,
  `fk_banheiro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `quantidade`, `tipo`, `data_hora`, `fk_banheiro_id`) VALUES
(1, 4, 'doação', '2026-09-09 00:00:00', 1),
(2, 2, 'retira', '2026-09-09 00:00:00', 1),
(3, 10, 'retira', '2026-09-10 07:17:45', 3),
(4, 1, 'retira', '2026-09-10 07:17:51', 1),
(5, 4, 'retira', '2026-09-10 07:17:59', 4),
(6, 4, 'retira', '2026-09-10 07:26:09', 2),
(7, 2, 'retira', '2026-09-10 07:34:45', 3),
(8, 1, 'retira', '2026-09-10 07:48:05', 4),
(9, 20, 'retira', '2026-09-10 07:48:28', 1),
(10, 20, 'retira', '2026-09-10 07:49:23', 1),
(11, 4, 'retira', '2026-09-14 04:38:44', 3),
(12, 30, 'retira', '2026-09-14 07:34:50', 1),
(13, 10, 'retira', '2026-09-14 07:35:10', 2),
(14, 5, 'retira', '2026-09-14 07:35:20', 3),
(15, 6, 'retira', '2026-09-14 07:35:27', 4),
(16, 25, 'retira', '2026-09-14 07:43:15', 1),
(17, 21, 'retira', '2026-09-14 07:51:39', 1),
(20, 2, 'retira', '2026-09-15 04:21:28', 3),
(21, 2, 'retira', '2026-09-15 08:41:59', 1),
(22, 4, 'retira', '2026-09-15 08:42:36', 3),
(23, 3, 'retira', '2026-09-15 09:18:45', 2);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `banheiro`
--
ALTER TABLE `banheiro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_banheiro_id` (`fk_banheiro_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `banheiro`
--
ALTER TABLE `banheiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD CONSTRAINT `fk_banheiro_id` FOREIGN KEY (`fk_banheiro_id`) REFERENCES `banheiro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
