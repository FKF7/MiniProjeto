-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Mar-2022 às 19:09
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lista`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `dataInicio` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `emailUsuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `nome`, `dataInicio`, `status`, `emailUsuario`) VALUES
(3, 'Fazer Apoios', '2022-03-02', 'Aberta', 'fkf2@gmail.com'),
(4, 'Comprar Bolo', '2022-03-03', 'Completa', 'fkf3@gmail.com'),
(5, 'Lavar a Louça', '2022-03-03', 'Aberta', 'teteu@gmail.com'),
(6, 'Ser Feliz', '2003-05-07', 'Aberta', 'fkf@gmail.com'),
(7, 'Ver Ao no Exorcism ou se tem novel sla', '2022-03-04', 'Completa', 'fkf@gmail.com'),
(14, 'b', '2022-03-04', 'Aberta', 'fkf@gmail.com'),
(17, 'd', '2022-03-04', 'Aberta', 'fkf@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('FKF2', 'fkf2@gmail.com', '79c18384cf773acee28d9de9f507560d'),
('FKF3', 'fkf3@gmail.com', '79c18384cf773acee28d9de9f507560d'),
('FKF', 'fkf@gmail.com', '79c18384cf773acee28d9de9f507560d'),
('Teteu', 'teteu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUsuarioTarefa` (`emailUsuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fkUsuarioTarefa` FOREIGN KEY (`emailUsuario`) REFERENCES `usuario` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
