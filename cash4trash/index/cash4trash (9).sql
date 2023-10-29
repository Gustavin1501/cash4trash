-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Out-2023 às 03:08
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
  `nome` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
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
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `tempo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Extraindo dados da tabela `lance`
--

INSERT INTO `lance` (`id`, `lote`, `valor`, `usuario`, `tempo`) VALUES
(6, 22521, 26, 'foto1000@email.com', 1692036463),
(7, 22521, 29, 'foto1000@email.com', 1692039867),
(8, 22521, 30, 'foto1000@email.com', 1692039882),
(9, 22521, 33, 'foto1000@email.com', 1692039911),
(10, 22521, 38, 'foto1000@email.com', 1692039930),
(11, 22521, 41, 'foto1000@email.com', 1692040028),
(12, 22521, 44, 'foto1000@email.com', 1692040051),
(13, 22521, 49, 'foto1000@email.com', 1692040065),
(14, 22521, 2132, 'foto1000@email.com', 1692040078),
(17, 22521, 2132, 'foto1000@email.com', 1692042085),
(20, 22521, 2135, 'foto1000@email.com', 1692473895),
(22, 22528, 11, 'foto1000@email.com', 1692743155),
(25, 22528, 16, 'foto1000@email.com', 1692743275),
(27, 22528, 21, 'foto1000@email.com', 1692743328),
(28, 22528, 22, 'foto1000@email.com', 1692743581),
(30, 22898, 25, 'foto1000@email.com', 1692743614),
(31, 22528, 26, 'foto1000@email.com', 1692743779),
(32, 22528, 27, 'foto1000@email.com', 1692743839),
(33, 22528, 28, 'foto1000@email.com', 1692743942),
(36, 22528, 34, 'foto1000@email.com', 1692745194),
(40, 22528, 35, 'foto1000@email.com', 1692746648),
(45, 22528, 38.42, 'foto1000@email.com', 1692754839),
(47, 22529, 11, 'foto1000@email.com', 1693165468),
(48, 22529, 12, 'foto1000@email.com', 1693165480),
(51, 22529, 17.07, 'foto1000@email.com', 1693171037),
(52, 22529, 17.07, 'foto1000@email.com', 1693171053),
(61, 22899, 55, 'foto1000@email.com', 1695660771),
(62, 22899, 56.05, 'foto1000@email.com', 1695660785),
(64, 22896, 64.05, 'laurasthefanycolombo@gmail.com', 1695660906),
(66, 22899, 57.07, 'laurasthefanycolombo@gmail.com', 1695664203);

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
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `parceiro` varchar(20) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imagem` (`imagem`),
  KEY `usuario` (`usuario`),
  KEY `parceiro` (`parceiro`),
  FOREIGN KEY (`usuario`) REFERENCES `usuario` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `lixo`
--

INSERT INTO `lixo` (`id`, `lote`, `categoria`, `marca`, `nome`, `descricao`, `preco`, `statu`, `usuario`, `parceiro`, `imagem`) VALUES
(12, 22900, 'Fogões', 'Brastemp', 'Fogão grande FX0283', 'Quebrado, não acende', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos./fogao.jpg'),
(13, 22526, 'Geladeiras', 'Consul', 'Geladeira Branca grande FX0283', 'Teste no diretório', 0, '1', 'email@email.com', 'casa da rosquinha', 'img_lixos/1681069128.jpg'),
(14, 22897, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1680479047.jpg'),
(15, 22897, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551307.jpg'),
(16, 22897, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551354.jpg'),
(17, 22898, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551380.jpg'),
(18, 22898, 'Baterias', 'Moura', 'M60GE', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1679946974.jpg'),
(19, 22898, 'Baterias', 'Moura', 'M60GO', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/1683551480.jpg'),
(20, 22905, 'Baterias', 'Onbat', 'KK78MP', 'descarregada', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/batera.jpg'),
(21, 22899, 'Ventiladores', 'Arco', 'ventiladorzao', 'sem pá', 0, '2', 'email@email.com', 'casa da rosquinha', 'img_lixos/ventilador.jpg'),
(22, 22905, 'Baterias', 'Onbat', 'bateria das boas', 'ta descarregada', 0, '2', 'laurasthefanycolombo', '', 'img_lixos/batera2.jpg'),
(23, 22527, 'Fotovoltaicos', 'Lumens', 'teste de png', 'ta descarregada', 0, '1', 'email@email.com', 'minha empresa de sau', 'img_lixos/1688342645.jpg'),
(24, 22901, 'Celulares/ smartphon', 'Samsung', 'A11', 'RUIM', 0, '2', 'foto1000@email.com', 'casa da rosquinha', 'img_lixos/a11.jpg'),
(25, 22896, 'Geladeiras Duplex CR', 'Consul', 'Duplex CRM44AB Frost Free com ', 'motor quebrado', 0, '2', 'email@email.com', 'minha empresa tech', 'img_lixos/1693232739.jpg'),
(26, 22896, 'Geladeiras', 'Consul', 'Duplex CRM44AB Frost Free com ', 'motor e painel quebrados', 0, '2', 'email@email.com', 'minha empresa de sau', 'img_lixos/1693233204.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `inicio` double NOT NULL,
  `valor_inicial` float NOT NULL,
  `valor_atual` float NOT NULL,
  `descricao` varchar(1000) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `melhores` int(11) NOT NULL,
  `statu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  foreign key (`usuario`) references `usuario` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22906 ;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `usuario`, `nome`, `inicio`, `valor_inicial`, `valor_atual`, `descricao`, `quantidade`, `melhores`, `statu`) VALUES
(22896, 'laurasthefanycolombo@gmail.co', 'Geladeiras - Consul - Duplex CRM44AB Frost Free co', 1696116912, 60, 64.05, 'Consul - Duplex CRM44AB Frost Free com  - motor quebrado</br>Consul - Duplex CRM44AB Frost Free com  - motor e painel quebrados</br>', 2, 0, 3),
-- TEM Q ADICIONAR O EMAIL DO USUARIO
(22897, 'camillacamilla@gmail.com','Baterias - Moura - M60GE\n', 1694927912, 7, 14, 'Moura - M60GE - descarregada</br>Moura - M60GE - descarregada</br>Moura - M60GE - descarregada</br>', 3, 0, 3),
(22898, 'Baterias - Moura\n', 1694116912, 7, 7, 'Moura - M60GE - descarregada</br>Moura - M60GE - descarregada</br>Moura - M60GO - descarregada</br>', 3, 0, 4),
(22899, 'Ventilador Arco', 1696521993, 15, 57.07, 'Arco - ventiladorzao - sem pá</br>', 1, 0, 3),
(22900, 'Fogões Brastemp - Fogão grande FX0283', 1698250005, 50, 50, 'Brastemp - Fogão grande FX0283 - Quebrado, não acende</br>', 1, 1, 1),
(22901, 'Celulares/ smartphone Samsung A11', 1696954113, 10, 11.05, 'Samsung - A11 - RUIM</br>', 1, 0, 1),
(22905, 'Baterias - Onbat\n', 1696528728, 7, 7, 'Onbat - bateria das boas - ta descarregada</br>Onbat - KK78MP - descarregada</br>', 2, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `categoria` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
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
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `statu` varchar(1) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  `marca` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `anunciador` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `valorC` int(11) NOT NULL,
  `valorM_C` int(11) NOT NULL,
  `valorM_R` int(11) NOT NULL,
  `categoria` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marca` (`marca`),
  KEY `categoria` (`categoria`),
  KEY `anunciador` (`anunciador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `nascimento` date NOT NULL,
  `setor` varchar(20) DEFAULT NULL,
  `cpf_cnpj` varchar(14) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `cep` varchar(12) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `logradouro` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `diretorio` varchar(50) CHARACTER SET utf16 COLLATE utf16_swedish_ci NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`cpf_cnpj`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nome` (`nome`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `nascimento`, `setor`, `cpf_cnpj`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `senha`, `diretorio`, `tipo`, `saldo`) VALUES
('testandpa', '0000-00-00', 'servicos', '06.057.223/000', 'varej@emal.com', '78948-787', 'Rua VAVa', 456, '', '123', '', 'G', 0),
('nome teste', '0000-00-00', NULL, '123.123.123-12', 'laurasthefanycolombo@gmail.com', '12.123-123', 'rua teste', 123, 'c', '123', 'img_usuarios/1696882846.jpg', '', 116),
('casa da rosquinha', '0000-00-00', 'alimentício', '13.929.711/000', 'cdr@email.com', '14807303', 'rua dos doces', 44, NULL, '123', '', 'L', 0),
('nomedeteste', '0000-00-00', NULL, '217.399.058-65', 'eu@email.com', '17895-789', 'Rua nossa', 55, '', '123', '', 'U', 0),
('imagem4', '0000-00-00', NULL, '293.542.720-37', 'ft4@email.com', '42787-557', 'rua da foto', 77, '', '123', 'img_usuarios/semfoto.jpg', 'U', 0),
('Camiluausia', '0000-00-00', NULL, '306.824.977-54', 'auau@email.com', '15456-984', 'Rua aquela ', 11, '', '123', 'img_usuarios/1692043376.jpg', 'U', 0),
('foto 10008', '0000-00-00', NULL, '441.570.961-34', 'foto1000@email.com', '78564-687', 'rua do nunes', 11, 'kkkkk', '1234', 'img_usuarios/1688351060.jpg', 'U', 0),
('agora sim tem nome', '0000-00-00', NULL, '443.065.372-00', 'foto2@email.com', '84645-259', 'rua da fotokkkk', 89, '', '123', 'img_usuarios/semfoto.jpg', 'U', 0),
('Empresa1', '0000-00-00', 'saude', '46.061.266/000', 'emp1@email.com', '14683-888', 'Rua 1', 5, '', '123', '', 'L', 0),
('Magazine Luiza', '0000-00-00', 'varejo', '47.960.950/000', 'magazinelu@email.com', '89654-231', 'Rua do MagaLu', 888, '', '123', '', 'M', 13),
('minha empresa de saude', '0000-00-00', 'saude', '53.141.916/000', 'saude@email.com', '58954-742', 'rua da saude', 21, '', '123', '', 'L', 0),
('ultimo teste', '0000-00-00', NULL, '617.816.524-22', 'ultimo@email.com', '57896-355', 'rua ultima', 2, '', '123123', 'img_usuarios/semfoto.jpg', 'U', 0),
('minha empresa tech', '0000-00-00', 'tecnologia', '63.319.178/000', 'tech@email.com', '78562-325', 'rua da tech', 778, '', '123', '', 'L', 0),
('teste sem fotot', '0000-00-00', NULL, '757.003.465-16', 'semfoto@eemail.com', '12354-965', 'rua sem foto', 22, '', '123123', '/semfoto.jpg', 'U', 0),
('teste de foto', '0000-00-00', NULL, '784.300.686-94', 'foto@email.com', '45621-568', 'rua da foto', 55, '4', '123', 'img_usuarios/semfoto.jpg', 'U', 0),
('novo', '0000-00-00', NULL, '78978978978', 'novo@gmail.com', '12123456', 'rua nova', 1, '', '123', '', '', 0),
('administrador', '0000-00-00', NULL, '848.457.880-12', 'adm@email.com', '14807302', 'rua do administrador', 55, NULL, '123', '', 'A', 0),
('foto 3 T-T', '0000-00-00', NULL, '917.100.334-79', 'foto3@email.com', '84654-565', 'rua da foto', 54, '', '123', 'img_usuarios/semfoto.jpg', 'U', 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `lance`
--
ALTER TABLE `lance`
  ADD CONSTRAINT `lance_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nome`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `marketplace`
--
ALTER TABLE `marketplace`
  ADD CONSTRAINT `marketplace_ibfk_1` FOREIGN KEY (`anunciador`) REFERENCES `usuario` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `marketplace_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nome`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `marketplace_ibfk_3` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
