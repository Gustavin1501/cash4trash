-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 10-Set-2023 às 02:00
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Extraindo dados da tabela `lance`
--

INSERT INTO `lance` (`id`, `lote`, `valor`, `usuario`, `tempo`) VALUES
(1, 22521, 10, 'email@email.com', 1691440332),
(2, 22521, 12, 'email@email.com', 1691440416),
(3, 22521, 17, 'email@email.com', 1692025119),
(4, 22521, 20, 'email@email.com', 1692025182),
(5, 22521, 23, 'email@email.com', 1692025886),
(6, 22521, 26, 'foto1000@email.com', 1692036463),
(7, 22521, 29, 'foto1000@email.com', 1692039867),
(8, 22521, 30, 'foto1000@email.com', 1692039882),
(9, 22521, 33, 'foto1000@email.com', 1692039911),
(10, 22521, 38, 'foto1000@email.com', 1692039930),
(11, 22521, 41, 'foto1000@email.com', 1692040028),
(12, 22521, 44, 'foto1000@email.com', 1692040051),
(13, 22521, 49, 'foto1000@email.com', 1692040065),
(14, 22521, 2132, 'foto1000@email.com', 1692040078),
(15, 22521, 2, 'email@email.com', 1692041722),
(16, 22521, 3, 'email@email.com', 1692041740),
(17, 22521, 2132, 'foto1000@email.com', 1692042085),
(18, 22523, 2133, 'email@email.com', 1692473790),
(19, 22523, 2134, 'email@email.com', 1692473834),
(20, 22521, 2135, 'foto1000@email.com', 1692473895),
(21, 22521, 2136, 'email@email.com', 1692473921),
(22, 22528, 11, 'foto1000@email.com', 1692743155),
(23, 22528, 13, 'email@email.com', 1692743177),
(24, 22528, 14, 'email@email.com', 1692743221),
(25, 22528, 16, 'foto1000@email.com', 1692743275),
(26, 22528, 19, 'email@email.com', 1692743315),
(27, 22528, 21, 'foto1000@email.com', 1692743328),
(28, 22528, 22, 'foto1000@email.com', 1692743581),
(29, 22528, 24, 'email@email.com', 1692743598),
(30, 22528, 25, 'foto1000@email.com', 1692743614),
(31, 22528, 26, 'foto1000@email.com', 1692743779),
(32, 22528, 27, 'foto1000@email.com', 1692743839),
(33, 22528, 28, 'foto1000@email.com', 1692743942),
(34, 22528, 32, 'email@email.com', 1692743954),
(35, 22528, 31, 'email@email.com', 1692744658),
(36, 22528, 34, 'foto1000@email.com', 1692745194),
(37, 22528, 34, 'email@email.com', 1692745219),
(38, 22528, 0, 'email@email.com', 1692745221),
(39, 22528, 32, 'email@email.com', 1692745273),
(40, 22528, 35, 'foto1000@email.com', 1692746648),
(41, 22528, 37, 'email@email.com', 1692746670),
(42, 22528, 37.01, 'email@email.com', 1692753829),
(43, 22528, 37.2, 'email@email.com', 1692753868),
(44, 22528, 37.24, 'email@email.com', 1692754070),
(45, 22528, 38.42, 'foto1000@email.com', 1692754839),
(46, 22529, 8, 'email@email.com', 1693165455),
(47, 22529, 11, 'foto1000@email.com', 1693165468),
(48, 22529, 12, 'foto1000@email.com', 1693165480),
(49, 22529, 17.01, 'email@email.com', 1693166772),
(50, 22529, 17.07, 'email@email.com', 1693171028),
(51, 22529, 17.07, 'foto1000@email.com', 1693171037),
(52, 22529, 17.07, 'foto1000@email.com', 1693171053),
(53, 22529, 17.08, 'email@email.com', 1693173681),
(54, 22896, 61, 'email@email.com', 1694204032),
(55, 22897, 10, 'email@email.com', 1694206999),
(56, 22897, 11, 'email@email.com', 1694207315),
(57, 22897, 14, 'email@email.com', 1694207327);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lixo`
--

CREATE TABLE IF NOT EXISTS `lixo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lote` int(11) DEFAULT NULL,
  `categoria` varchar(20) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(300) CHARACTER SET utf8 NOT NULL,
  `preco` float NOT NULL,
  `statu` varchar(1) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `parceiro` varchar(20) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imagem` (`imagem`),
  KEY `usuario` (`usuario`),
  KEY `parceiro` (`parceiro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `lixo`
--

INSERT INTO `lixo` (`id`, `lote`, `categoria`, `marca`, `nome`, `descricao`, `preco`, `statu`, `usuario`, `parceiro`, `imagem`) VALUES
(12, 22533, 'Fogões', 'Brastemp', 'Fogão grande FX0283', 'Quebrado, não acende', 0, '1', 'email@email.com', 'casa da rosquinha', 'img_lixos./1681069003.jpg'),
(13, 22526, 'Geladeiras', 'Consul', 'Geladeira Branca grande FX0283', 'Teste no diretório', 0, '1', 'email@email.com', 'casa da rosquinha', 'img_lixos/1681069128.jpg'),
(14, 22897, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1680479047.jpg'),
(15, 22897, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551307.jpg'),
(16, 22897, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551354.jpg'),
(17, 22898, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551380.jpg'),
(18, 22898, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1679946974.jpg'),
(19, 22898, 'Baterias', 'Moura', 'M60GO', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551480.jpg'),
(20, 22530, 'Baterias', 'Onbat', 'KK78MP', 'descarregada', 0, '1', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551504.jpg'),
(21, 22523, 'Ventiladores', 'Arco', 'ventiladorzao', 'sem pá', 0, '1', 'email@email.com', 'casa da rosquinha', 'img_lixos/1680478850.jpg'),
(22, 22530, 'Baterias', 'Onbat', 'bateria das boas', 'ta descarregada', 0, '1', 'email@email.com', '', 'img_lixos/1688342511.jpg'),
(23, 22527, 'Fotovoltaicos', 'Lumens', 'teste de png', 'ta descarregada', 0, '1', 'email@email.com', 'minha empresa de sau', 'img_lixos/1688342645.jpg'),
(24, 22528, 'Celulares/ smartphon', 'Samsung', 'A11', 'RUIM', 0, '1', 'foto1000@email.com', 'casa da rosquinha', 'img_lixos/1688407967.jpg'),
(25, 22896, 'Geladeiras', 'Consul', 'Duplex CRM44AB Frost Free com ', 'motor quebrado', 0, '2', 'email@email.com', 'minha empresa tech', 'img_lixos/1693232739.jpg'),
(26, 22896, 'Geladeiras', 'Consul', 'Duplex CRM44AB Frost Free com ', 'motor e painel quebrados', 0, '2', 'email@email.com', 'minha empresa de sau', 'img_lixos/1693233204.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `inicio` double NOT NULL,
  `valor_inicial` float NOT NULL,
  `valor_atual` float NOT NULL,
  `descricao` varchar(1000) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `melhores` int(11) NOT NULL,
  `statu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22899 ;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `nome`, `inicio`, `valor_inicial`, `valor_atual`, `descricao`, `quantidade`, `melhores`, `statu`) VALUES
(22896, 'Geladeiras - Consul - Duplex CRM44AB Frost Free co', 1696116912, 60, 61, 'Consul - Duplex CRM44AB Frost Free com  - motor quebrado</br>Consul - Duplex CRM44AB Frost Free com  - motor e painel quebrados</br>', 2, 0, 1),
(22897, 'Baterias - Moura - M60GE\n', 1694927912, 7, 14, 'Moura - M60GE - descarregada</br>Moura - M60GE - descarregada</br>Moura - M60GE - descarregada</br>', 3, 0, 1),
(22898, 'Baterias - Moura\n', 1694116912, 7, 7, 'Moura - M60GE - descarregada</br>Moura - M60GE - descarregada</br>Moura - M60GO - descarregada</br>', 3, 0, 2);

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
-- Estrutura da tabela `marketplace`
--

CREATE TABLE IF NOT EXISTS `marketplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `anunciador` varchar(50) NOT NULL,
  `valorC` int(11) NOT NULL,
  `valorM_C` int(11) NOT NULL,
  `valorM_R` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `setor` varchar(20) DEFAULT NULL,
  `cpf_cnpj` varchar(14) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `cep` varchar(12) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `logradouro` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `diretorio` varchar(50) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`cpf_cnpj`),
  UNIQUE KEY `email` (`email`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `setor`, `cpf_cnpj`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `senha`, `diretorio`, `tipo`, `saldo`) VALUES
('testandpa', 'servicos', '06.057.223/000', 'varej@emal.com', '78948-787', 'Rua VAVa', 456, '', '123', '', 'G', 0),
('nome teste', NULL, '123.123.123-12', 'email@email.com', '12.123-123', 'rua teste', 123, 'c', '123', '', '', 0),
('casa da rosquinha', 'alimentício', '13.929.711/000', 'cdr@email.com', '14807303', 'rua dos doces', 44, NULL, '123', '', 'L', 0),
('nomedeteste', NULL, '217.399.058-65', 'eu@email.com', '17895-789', 'Rua nossa', 55, '', '123', '', 'U', 0),
('imagem4', NULL, '293.542.720-37', 'ft4@email.com', '42787-557', 'rua da foto', 77, '', '123', 'img_usuarios/semfoto.jpg', 'U', 0),
('Camiluausia', NULL, '306.824.977-54', 'auau@email.com', '15456-984', 'Rua aquela ', 11, '', '123', 'img_usuarios/1692043376.jpg', 'U', 0),
('foto 10008', NULL, '441.570.961-34', 'foto1000@email.com', '78564-687', 'rua do nunes', 11, 'kkkkk', '1234', 'img_usuarios/1688351060.jpg', 'U', 0),
('agora sim tem nome', NULL, '443.065.372-00', 'foto2@email.com', '84645-259', 'rua da fotokkkk', 89, '', '123', 'img_usuarios/semfoto.jpg', 'U', 0),
('Magazine Luiza', 'varejo', '47.960.950/000', 'magazinelu@email.com', '89654-231', 'Rua do MagaLu', 888, '', '123', '', 'M', 0),
('Laura Sthefany Colombo', NULL, '503.621.538-92', 'laurasthefanycolombo@gmail.com', '14807-302', 'Rua Paulino Leite', 166, '', '123', '', 'U', 0),
('minha empresa de saude', 'saude', '53.141.916/000', 'saude@email.com', '58954-742', 'rua da saude', 21, '', '123', '', 'L', 0),
('ultimo teste', NULL, '617.816.524-22', 'ultimo@email.com', '57896-355', 'rua ultima', 2, '', '123123', 'img_usuarios/semfoto.jpg', 'U', 0),
('minha empresa tech', 'tecnologia', '63.319.178/000', 'tech@email.com', '78562-325', 'rua da tech', 778, '', '123', '', 'L', 0),
('teste sem fotot', NULL, '757.003.465-16', 'semfoto@eemail.com', '12354-965', 'rua sem foto', 22, '', '123123', '/semfoto.jpg', 'U', 0),
('teste de foto', NULL, '784.300.686-94', 'foto@email.com', '45621-568', 'rua da foto', 55, '4', '123', 'img_usuarios/semfoto.jpg', 'U', 0),
('novo', NULL, '78978978978', 'novo@gmail.com', '12123456', 'rua nova', 1, '', '123', '', '', 0),
('administrador', NULL, '848.457.880-12', 'adm@email.com', '14807302', 'rua do administrador', 55, NULL, '123', '', 'A', 0),
('foto 3 T-T', NULL, '917.100.334-79', 'foto3@email.com', '84654-565', 'rua da foto', 54, '', '123', 'img_usuarios/semfoto.jpg', 'U', 0);

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
