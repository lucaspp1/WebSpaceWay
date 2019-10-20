-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Out-2019 às 19:22
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webspaceways`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locaisvisitados`
--

CREATE TABLE `locaisvisitados` (
  `roteiro` int(11) NOT NULL,
  `objetoSeleste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `FaixaEtaria` varchar(45) NOT NULL,
  `Interesse` varchar(45) NOT NULL,
  `Risco_idRisco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `Tipo`, `FaixaEtaria`, `Interesse`, `Risco_idRisco`) VALUES
(1, 'leis ure ', '15-27', 'New and fun things', 1),
(2, 'A New Experience ', '20-33', 'Learn and try new things', 2),
(3, 'hards Challenges ', 'sick', 'prove masculinity', 5),
(4, 'Scientific ', '> 35', 'biology and chemistry', 4),
(5, 'entrepreneurship ', '25-35', 'New solutions and learning', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id`, `descricao`) VALUES
(1, 'What is your interest with the trip ?'),
(2, 'What would you do if your oxygen was running low ?'),
(3, 'There was a technical failure on the ship, what would you do ?'),
(4, 'What is the first thing you would do on a new planet ?'),
(5, 'What would be your relationship with the native inhabitants on a new planet ?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `idPergunta` int(11) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`id`, `valor`, `idPergunta`, `descricao`) VALUES
(1, 1, 1, 'Just to distract'),
(2, 2, 1, 'Know something new'),
(3, 3, 1, 'I want to challenge myself'),
(4, 4, 1, 'Want to Explore New Bodies'),
(5, 5, 1, 'I want to grow my business'),
(6, 1, 2, 'Ask for help'),
(7, 2, 2, 'Find some tool that helps me'),
(8, 3, 2, 'I will hold on as long as possible until I reach the destination'),
(9, 4, 2, 'I will calm down, control my breathing to slow my heart rate and save maximum oxygen'),
(10, 5, 2, 'Would have already bought extra charges'),
(11, 1, 3, 'Would try to ask for help'),
(12, 2, 3, 'I will try to find out what happened'),
(13, 3, 3, 'I will fix'),
(14, 4, 3, 'I will identify the fault, and depending on the degree of malfunction I will fix or call to inform someone with high rank to assist me'),
(15, 5, 3, 'I will look for alternative solutions'),
(16, 1, 4, 'would look for something to have fun with'),
(17, 2, 4, 'Explore something new'),
(18, 3, 4, 'would look for new challenges'),
(19, 4, 4, 'Search for new elements / Organisms I do not know'),
(20, 5, 4, 'Analyze a market possibility'),
(21, 1, 5, 'would try to create new friends ties'),
(22, 2, 5, 'Try to know about the culture'),
(23, 3, 5, 'I will propose challenges where I have more aptitude'),
(24, 4, 5, 'Learn new ways to learn about local science'),
(25, 5, 5, 'Try to Establish Trade Routes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `risco`
--

CREATE TABLE `risco` (
  `idRisco` int(11) NOT NULL,
  `TipoRisco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roteiro`
--

CREATE TABLE `roteiro` (
  `idRoteiro` int(11) NOT NULL,
  `observacao` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `roteiro`
--

INSERT INTO `roteiro` (`idRoteiro`, `observacao`, `descricao`, `url`) VALUES
(1, 0, 'Travel to classical kbo', '/videos/Classical kbo.mp4'),
(2, 0, 'Travel to Resonat KBO', '/videos/Resonant KBOs.mp4'),
(3, 0, 'Travel to centaurs', '/videos/Centurian.mp4'),
(4, 0, 'Travel to Scatter Disk', '/videos/Skaterred Disk.mp4'),
(5, 0, 'Travel to neptune trojans', '/video/trojan.mp4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `DataNascimento` varchar(150) NOT NULL,
  `sexo` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `DataNascimento`, `sexo`, `senha`, `email`, `idPerfil`) VALUES
(9, 'banZinho', '0011-11-11', 'm', '202cb962ac59075b964b07152d234b70', 'lucaspp1@ucl.br', 2),
(10, 'lllÃ§lÃ§', '1995-10-10', 'm', '562b530cff1f5bca3b1a4c1ad4ad9962', 'testepp1coutinho@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viajem`
--

CREATE TABLE `viajem` (
  `idViajem` int(11) NOT NULL,
  `dataSaida` varchar(150) NOT NULL,
  `dataChegada` varchar(150) NOT NULL,
  `roteiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices para tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `risco`
--
ALTER TABLE `risco`
  ADD PRIMARY KEY (`idRisco`);

--
-- Índices para tabela `roteiro`
--
ALTER TABLE `roteiro`
  ADD PRIMARY KEY (`idRoteiro`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `viajem`
--
ALTER TABLE `viajem`
  ADD PRIMARY KEY (`idViajem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `risco`
--
ALTER TABLE `risco`
  MODIFY `idRisco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `roteiro`
--
ALTER TABLE `roteiro`
  MODIFY `idRoteiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `viajem`
--
ALTER TABLE `viajem`
  MODIFY `idViajem` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
