-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/01/2020 às 10:03
-- Versão do servidor: 10.4.10-MariaDB
-- Versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `auth`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `c_data`
--

CREATE TABLE `c_data` (
  `c_uid` int(11) NOT NULL,
  `c_username` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `c_data`
--
ALTER TABLE `c_data`
  ADD PRIMARY KEY (`c_uid`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `c_data`
--
ALTER TABLE `c_data`
  MODIFY `c_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
