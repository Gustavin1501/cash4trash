-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Ago-2023 às 18:00
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cash4trash`
--
CREATE DATABASE IF NOT EXISTS `cash4trash` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cash4trash`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `valor_inicial` float NOT NULL,
  `duracao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `valor_inicial`, `duracao`) VALUES
(1, 'Celulares/ smartphon', 10, 15),
(2, 'Geladeiras', 60, 30),
(3, 'Fotovoltaicos', 5, 15),
(4, 'Fogões', 50, 30),
(5, 'Baterias', 7, 10),
(6, 'Ventiladores', 15, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lance`
--

CREATE TABLE IF NOT EXISTS `lance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lote` int(11) NOT NULL,
  `valor` float NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `tempo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `lance`
--

INSERT INTO `lance` (`id`, `lote`, `valor`, `usuario`, `tempo`) VALUES
(1, 22521, 10, 'email@email.com', 1691440332),
(2, 22521, 12, 'email@email.com', 1691440416),
(3, 22521, 17, 'email@email.com', 1692025119),
(4, 22521, 20, 'email@email.com', 1692025182),
(5, 22521, 23, 'email@email.com', 1692025886);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lixo`
--

CREATE TABLE IF NOT EXISTS `lixo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lote` int(11) DEFAULT NULL,
  `categoria` varchar(20) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(300) CHARACTER SET utf8 NOT NULL,
  `preco` float DEFAULT NULL,
  `statu` varchar(1) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `parceiro` varchar(20) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imagem` (`imagem`),
  KEY `usuario` (`usuario`),
  KEY `parceiro` (`parceiro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `lixo`
--

INSERT INTO `lixo` (`id`, `lote`, `categoria`, `marca`, `nome`, `descricao`, `preco`, `statu`, `usuario`, `parceiro`, `imagem`) VALUES
(12, 22533, 'Fogões', 'Brastemp', 'Fogão grande FX0283', 'Quebrado, não acende', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos./1681069003jpg'),
(13, 22526, 'Geladeiras', 'Consul', 'Geladeira Branca grande FX0283', 'Teste no diretório', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1681069128jpg'),
(14, 22521, 'Baterias', 'Moura', 'M60GE', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1680479047jpg'),
(15, 22521, 'Baterias', 'Moura', 'M60GE', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551307jpg'),
(16, 22522, 'Baterias', 'Moura', 'M60GE', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551354jpg'),
(17, 22529, 'Baterias', 'Moura', 'M60GE', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551380jpg'),
(18, 22522, 'Baterias', 'Moura', 'M60GE', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1679946974jpg'),
(19, 22529, 'Baterias', 'Moura', 'M60GO', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551480jpg'),
(20, 22530, 'Baterias', 'Onbat', 'KK78MP', 'descarregada', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551504jpg'),
(21, 22523, 'Ventiladores', 'Arco', 'ventiladorzao', 'sem pá', NULL, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1680478850jpg'),
(22, 22530, 'Baterias', 'Onbat', 'bateria das boas', 'ta descarregada', NULL, '2', 'email@email.com', '', 'img_lixos/1688342511.jpg'),
(23, 22527, 'Fotovoltaicos', 'Lumens', 'teste de png', 'ta descarregada', NULL, '2', 'email@email.com', 'minha empresa de sau', 'img_lixos/1688342645.jpg'),
(24, 22528, 'Celulares/ smartphon', 'Samsung', 'A11', 'RUIM', NULL, '2', 'foto1000@email.com', 'casa da rosquinha', 'img_lixos/1688407967.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `inicio` double NOT NULL,
  `valor_inicial` double NOT NULL,
  `valor_atual` double NOT NULL,
  `descricao` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `quantidade` int(11) NOT NULL,
  `melhores` int(11) NOT NULL,
  `statu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22534 ;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `nome`, `inicio`, `valor_inicial`, `valor_atual`, `descricao`, `quantidade`, `melhores`, `statu`) VALUES
(22521, 'Baterias - Moura - M60GE\n', 1687723334, 7, 23, '', 2, 1, 1),
(22522, 'Baterias - Moura - M60GE\n', 1687723333, 7, 7, '', 2, 1, 1),
(22523, 'Ventiladores', 1688674017, 15, 15, '', 1, 1, 1),
(22526, 'Geladeiras', 1690996192, 60, 60, '0', 1, 0, 1),
(22527, 'Fotovoltaicos', 1689700382, 5, 5, '0', 1, 0, 1),
(22528, 'Celulares/ smartphon', 1689704088, 10, 10, '0', 1, 0, 1),
(22529, 'Baterias - Moura\n', 1689272102, 7, 7, '0', 2, 0, 1),
(22530, 'Baterias - Onbat\n', 1689272103, 7, 7, '0', 2, 0, 1),
(22533, 'Fogões', 1691003728, 50, 50, '0', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id`, `nome`, `categoria`) VALUES
(9, 'Brastemp', 'Geladeiras'),
(10, 'Consul', 'Geladeiras'),
(11, 'Brastemp', 'Fogões'),
(12, 'Electrolux', 'Fogões'),
(13, 'Philco', 'Ventiladores'),
(14, 'Arco', 'Ventiladores'),
(15, 'Samsung', 'Celulares/ smartphon'),
(16, 'Motorola', 'Celulares/ smartphon'),
(17, 'Moura', 'Baterias'),
(18, 'Onbat', 'Baterias'),
(19, 'Lumens', 'Fotovoltaicos'),
(20, 'Genérico', 'Fotovoltaicos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `setor` varchar(20) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `cpf_cnpj` varchar(14) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `cep` varchar(12) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `logradouro` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `diretorio` varchar(50) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  PRIMARY KEY (`cpf_cnpj`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nome` (`nome`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `setor`, `nascimento`, `cpf_cnpj`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `senha`, `diretorio`, `tipo`) VALUES
('testandpa', 'servicos', NULL, '06.057.223/000', 'varej@emal.com', '78948-787', 'Rua VAVa', 456, '', '123', '', 'G'),
('nome teste', NULL, '2023-03-08', '123.123.123-12', 'email@email.com', '12.123-123', 'rua teste', 123, 'c', '123', '', ''),
('casa da rosquinha', 'alimentício', NULL, '13.929.711/000', 'cdr@email.com', '14807303', 'rua dos doces', 44, NULL, '123', '', 'L'),
('nomedeteste', NULL, '2004-11-22', '217.399.058-65', 'eu@email.com', '17895-789', 'Rua nossa', 55, '', '123', '', 'U'),
('imagem4', NULL, '2004-04-04', '293.542.720-37', 'ft4@email.com', '42787-557', 'rua da foto', 77, '', '123', 'img_usuarios/semfoto.jpg', 'U'),
('foto 10008', NULL, '2000-07-07', '441.570.961-34', 'foto1000@email.com', '78564-687', 'rua do nunes', 11, 'kkkkk', '1234', 'img_usuarios/1688351060.jpg', 'U'),
('agora sim tem nome', NULL, '1998-04-04', '443.065.372-00', 'foto2@email.com', '84645-259', 'rua da fotokkkk', 89, '', '123', 'img_usuarios/semfoto.jpg', 'U'),
('Laura Sthefany Colombo', NULL, '2004-11-22', '503.621.538-92', 'laurasthefanycolombo@gmail.com', '14807-302', 'Rua Paulino Leite', 166, '', '123', '', 'U'),
('minha empresa de saude', 'saude', NULL, '53.141.916/000', 'saude@email.com', '58954-742', 'rua da saude', 21, '', '123', '', 'L'),
('minha empresa tech', 'tecnologia', NULL, '63.319.178/000', 'tech@email.com', '78562-325', 'rua da tech', 778, '', '123', '', 'L'),
('teste de foto', NULL, '1989-05-22', '784.300.686-94', 'foto@email.com', '45621-568', 'rua da foto', 55, '4', '123', 'img_usuarios/semfoto.jpg', 'U'),
('novo', NULL, '2023-03-05', '78978978978', 'novo@gmail.com', '12123456', 'rua nova', 1, '', '123', '', ''),
('administrador', NULL, '2023-05-01', '848.457.880-12', 'adm@email.com', '14807302', 'rua do administrador', 55, NULL, '123', '', 'A'),
('foto 3 T-T', NULL, '2003-03-31', '917.100.334-79', 'foto3@email.com', '84654-565', 'rua da foto', 54, '', '123', 'img_usuarios/semfoto.jpg', 'U');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
