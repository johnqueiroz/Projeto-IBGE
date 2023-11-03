-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2023 às 19:55
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
-- Banco de dados: `ibge`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `area`
--

CREATE TABLE `area` (
  `Id` int(11) NOT NULL,
  `nomeArea` varchar(75) NOT NULL,
  `tipoArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `area`
--

INSERT INTO `area` (`Id`, `nomeArea`, `tipoArea`) VALUES
(4, 'João Pessoa', 1),
(5, 'Campina Grande', 2),
(6, 'Catolé do Rocha', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `idEquipamento` int(11) NOT NULL,
  `patrimonio` int(11) NOT NULL,
  `numero_de_serie` varchar(50) NOT NULL,
  `IdTipo` int(11) NOT NULL,
  `IdArea` int(11) NOT NULL,
  `IdStatus` int(11) NOT NULL,
  `IdServidor` int(11) NOT NULL,
  `dataMovimentacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`idEquipamento`, `patrimonio`, `numero_de_serie`, `IdTipo`, `IdArea`, `IdStatus`, `IdServidor`, `dataMovimentacao`) VALUES
(1, 123456, 'ABC123', 3, 4, 3, 1, '2023-11-03');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcao`
--

CREATE TABLE `funcao` (
  `idFuncao` int(11) NOT NULL,
  `funcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcao`
--

INSERT INTO `funcao` (`idFuncao`, `funcao`) VALUES
(1, 'Coordenador de TI'),
(2, 'Gerente de RH');

-- --------------------------------------------------------

--
-- Estrutura para tabela `statusequipamento`
--

CREATE TABLE `statusequipamento` (
  `idStatusEquipamento` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `statusequipamento`
--

INSERT INTO `statusequipamento` (`idStatusEquipamento`, `status`) VALUES
(1, 'Bom'),
(2, 'Precisa de atenção'),
(3, 'Ruim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoarea`
--

CREATE TABLE `tipoarea` (
  `idArea` int(11) NOT NULL,
  `tipoArea` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipoarea`
--

INSERT INTO `tipoarea` (`idArea`, `tipoArea`) VALUES
(1, 'Área'),
(2, 'Subárea'),
(3, 'Posto de Coleta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoequipamento`
--

CREATE TABLE `tipoequipamento` (
  `idTipoEquipamento` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipoequipamento`
--

INSERT INTO `tipoequipamento` (`idTipoEquipamento`, `tipo`) VALUES
(1, 'Notebook Dell'),
(2, 'Monitor AOC'),
(3, 'Placa de vídeo NVIDEA'),
(4, 'Mouse Logitech');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `IdServidor` int(11) NOT NULL,
  `nomeServidor` varchar(100) NOT NULL,
  `siapeServidor` int(11) NOT NULL,
  `emailServidor` varchar(100) NOT NULL,
  `telefoneServidor` bigint(11) NOT NULL,
  `funcaoServidor` int(11) NOT NULL,
  `areaServidor` int(11) NOT NULL,
  `senha` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`IdServidor`, `nomeServidor`, `siapeServidor`, `emailServidor`, `telefoneServidor`, `funcaoServidor`, `areaServidor`, `senha`) VALUES
(1, 'John Emerson Ferreira Regis Filho', 34411188, 'johnemerson67@gmail.com', 83998341257, 1, 4, 'A4D6089C2DB866C9C76B652DF2A57A5F1AD4FC92A0BBF3C124258938FEC13A18140F8CC1BAA040FAFF7D637E5113672874DAB0767E6AD490A4832E52AA20663E');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_tipoArea` (`tipoArea`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`idEquipamento`),
  ADD KEY `fk_equipamento_area` (`IdArea`),
  ADD KEY `fk_equipamento_servidor` (`IdServidor`),
  ADD KEY `fk_equipamento_tipo` (`IdTipo`),
  ADD KEY `fk_equipamento_status` (`IdStatus`);

--
-- Índices de tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`idFuncao`);

--
-- Índices de tabela `statusequipamento`
--
ALTER TABLE `statusequipamento`
  ADD PRIMARY KEY (`idStatusEquipamento`);

--
-- Índices de tabela `tipoarea`
--
ALTER TABLE `tipoarea`
  ADD PRIMARY KEY (`idArea`);

--
-- Índices de tabela `tipoequipamento`
--
ALTER TABLE `tipoequipamento`
  ADD PRIMARY KEY (`idTipoEquipamento`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdServidor`),
  ADD KEY `fk_servidor_area` (`areaServidor`),
  ADD KEY `fk_servidor_funcao` (`funcaoServidor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `idEquipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `idFuncao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `statusequipamento`
--
ALTER TABLE `statusequipamento`
  MODIFY `idStatusEquipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipoarea`
--
ALTER TABLE `tipoarea`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipoequipamento`
--
ALTER TABLE `tipoequipamento`
  MODIFY `idTipoEquipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `IdServidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_tipoArea` FOREIGN KEY (`tipoArea`) REFERENCES `tipoarea` (`idArea`);

--
-- Restrições para tabelas `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `fk_equipamento_area` FOREIGN KEY (`IdArea`) REFERENCES `area` (`Id`),
  ADD CONSTRAINT `fk_equipamento_servidor` FOREIGN KEY (`IdServidor`) REFERENCES `user` (`IdServidor`),
  ADD CONSTRAINT `fk_equipamento_status` FOREIGN KEY (`IdStatus`) REFERENCES `statusequipamento` (`idStatusEquipamento`),
  ADD CONSTRAINT `fk_equipamento_tipo` FOREIGN KEY (`IdTipo`) REFERENCES `tipoequipamento` (`idTipoEquipamento`);

--
-- Restrições para tabelas `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_servidor_area` FOREIGN KEY (`areaServidor`) REFERENCES `area` (`Id`),
  ADD CONSTRAINT `fk_servidor_funcao` FOREIGN KEY (`funcaoServidor`) REFERENCES `funcao` (`idFuncao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
