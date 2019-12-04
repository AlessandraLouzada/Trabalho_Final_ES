-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2019 às 20:37
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vila nova`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `email` varchar(60) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`email`, `senha`) VALUES
('funcionarioVila@gmail.com', 'vila123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospede`
--

CREATE TABLE `hospede` (
  `cpf` char(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nasc` date DEFAULT NULL,
  `telefone` char(17) DEFAULT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que contem as informacoes dos hospedes';

--
-- Extraindo dados da tabela `hospede`
--

INSERT INTO `hospede` (`cpf`, `email`, `nasc`, `telefone`, `nome`, `senha`) VALUES
('08670073827', 'lilianasabato6@gmail.com', '1997-05-16', '37999893279', 'Ana luiza sabato', 'frango1234'),
('11111111111', 'alessandra.terra@sistemas.ufla.br', '2019-11-01', '+55(37)99953-4110', 'Alessandra', '1234'),
('11501250689', 'ynaraFaria@gmail.com', '1999-10-18', '37998741853', 'Ynara de Faria', 'senha12'),
('123', 'guilherme.vieira@sistemas.ufla.br', '1998-05-05', '31984351797', 'guilherme', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `numQuarto` int(3) NOT NULL,
  `precoQuarto` decimal(6,2) NOT NULL,
  `tipoQuarto` varchar(20) NOT NULL,
  `reservado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que contem as informacoes dos quartos';

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`numQuarto`, `precoQuarto`, `tipoQuarto`, `reservado`) VALUES
(100, '958.00', 'Contemporanea', 1),
(101, '958.00', 'Contemporanea', 0),
(102, '958.00', 'Contemporanea', 0),
(103, '958.00', 'Contemporanea', 0),
(104, '958.00', 'Contemporanea', 0),
(105, '958.00', 'Contemporanea', 0),
(106, '958.00', 'Contemporanea', 0),
(107, '958.00', 'Contemporanea', 0),
(108, '958.00', 'Contemporanea', 0),
(109, '958.00', 'Contemporanea', 0),
(110, '958.00', 'Contemporanea', 0),
(200, '2186.00', 'Luxo', 0),
(201, '2186.00', 'Luxo', 0),
(202, '2186.00', 'Luxo', 0),
(203, '2186.00', 'Luxo', 0),
(204, '2186.00', 'Luxo', 0),
(205, '2186.00', 'Luxo', 0),
(206, '2186.00', 'Luxo', 0),
(207, '2186.00', 'Luxo', 0),
(208, '2186.00', 'Luxo', 0),
(209, '2186.00', 'Luxo', 0),
(210, '2186.00', 'Luxo', 0),
(300, '3891.00', 'Presidencial', 1),
(301, '3891.00', 'Presidencial', 1),
(302, '3891.00', 'Presidencial', 0),
(303, '3891.00', 'Presidencial', 0),
(304, '3891.00', 'Presidencial', 0),
(305, '3891.00', 'Presidencial', 0),
(306, '3891.00', 'Presidencial', 0),
(307, '3891.00', 'Presidencial', 0),
(308, '3891.00', 'Presidencial', 0),
(309, '3891.00', 'Presidencial', 0),
(310, '3891.00', 'Presidencial', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartoreservado`
--

CREATE TABLE `quartoreservado` (
  `numReserva` int(4) NOT NULL,
  `numQuarto` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quartoreservado`
--

INSERT INTO `quartoreservado` (`numReserva`, `numQuarto`) VALUES
(13, 101),
(15, 301);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservar`
--

CREATE TABLE `reservar` (
  `numReserva` int(4) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `cpf` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reservar`
--

INSERT INTO `reservar` (`numReserva`, `dataEntrada`, `dataSaida`, `cpf`) VALUES
(15, '2019-12-18', '2019-12-25', '11111111111'),
(13, '2020-01-01', '2020-01-04', '11111111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(4) NOT NULL,
  `precoServico` decimal(5,2) NOT NULL,
  `tipoServico` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `precoServico`, `tipoServico`) VALUES
(1, '225.00', 'Pacote 1'),
(2, '250.00', 'Pacote 2'),
(3, '300.00', 'Pacote 3'),
(4, '400.00', 'Pacote 4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicocontratado`
--

CREATE TABLE `servicocontratado` (
  `idServico` int(11) NOT NULL,
  `numReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicocontratado`
--

INSERT INTO `servicocontratado` (`idServico`, `numReserva`) VALUES
(4, 13),
(4, 15);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`numQuarto`);

--
-- Índices para tabela `quartoreservado`
--
ALTER TABLE `quartoreservado`
  ADD PRIMARY KEY (`numReserva`,`numQuarto`),
  ADD KEY `numQuarto` (`numQuarto`);

--
-- Índices para tabela `reservar`
--
ALTER TABLE `reservar`
  ADD PRIMARY KEY (`numReserva`),
  ADD UNIQUE KEY `uk_res` (`dataEntrada`,`dataSaida`,`cpf`),
  ADD KEY `fk_res_hos` (`cpf`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices para tabela `servicocontratado`
--
ALTER TABLE `servicocontratado`
  ADD PRIMARY KEY (`idServico`,`numReserva`),
  ADD KEY `numReserva` (`numReserva`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reservar`
--
ALTER TABLE `reservar`
  MODIFY `numReserva` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `quartoreservado`
--
ALTER TABLE `quartoreservado`
  ADD CONSTRAINT `quartoreservado_ibfk_1` FOREIGN KEY (`numQuarto`) REFERENCES `quarto` (`numQuarto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quartoreservado_ibfk_2` FOREIGN KEY (`numReserva`) REFERENCES `reservar` (`numReserva`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `reservar`
--
ALTER TABLE `reservar`
  ADD CONSTRAINT `fk_res_hos` FOREIGN KEY (`cpf`) REFERENCES `hospede` (`cpf`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `servicocontratado`
--
ALTER TABLE `servicocontratado`
  ADD CONSTRAINT `fk_servc_serv` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`) ON DELETE CASCADE,
  ADD CONSTRAINT `servicocontratado_ibfk_1` FOREIGN KEY (`numReserva`) REFERENCES `reservar` (`numReserva`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
