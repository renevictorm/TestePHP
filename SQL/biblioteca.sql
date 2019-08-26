-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 25/08/2019 às 22:07
-- Versão do servidor: 5.7.27
-- Versão do PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `retangulos`
--

CREATE TABLE `retangulos` (
  `id` int(11) NOT NULL,
  `x1` float NOT NULL,
  `y1` float NOT NULL,
  `altura` float NOT NULL,
  `largura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `retangulos`
--

INSERT INTO `retangulos` (`id`, `x1`, `y1`, `altura`, `largura`) VALUES
(2, 0, 10, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `triangulos`
--

CREATE TABLE `triangulos` (
  `x1` float NOT NULL,
  `y1` float NOT NULL,
  `x2` float NOT NULL,
  `y2` float NOT NULL,
  `x3` float NOT NULL,
  `y3` float NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `triangulos`
--

INSERT INTO `triangulos` (`x1`, `y1`, `x2`, `y2`, `x3`, `y3`, `id`) VALUES
(4, 0, 0, 0, 0, 6, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `retangulos`
--
ALTER TABLE `retangulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `triangulos`
--
ALTER TABLE `triangulos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `retangulos`
--
ALTER TABLE `retangulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `triangulos`
--
ALTER TABLE `triangulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
