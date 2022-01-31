-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/01/2022 às 20:45
-- Versão do servidor: 10.4.19-MariaDB
-- Versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empresa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `empresa` varchar(200) NOT NULL,
  `contacto` int(100) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `empresa`, `contacto`, `data`) VALUES
(18, 'Jorge mucavel', 'MTA', 32158458, '2022-01-30 11:04:55'),
(19, 'VUNA', 'MSD', 123458, '2022-01-30 11:05:23'),
(20, 'Ciara', 'Clinic', 14587, '2022-01-30 11:06:09'),
(21, 'Hortencia', 'UTI', 15454897, '2022-01-30 11:06:41'),
(22, 'mazda b3', 'Mazda', 124587, '2022-01-30 11:07:48'),
(23, 'Juia', 'MDS', 4588, '2022-01-30 11:28:23');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
