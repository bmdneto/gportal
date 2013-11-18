-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 01:56 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `g_portais`
--
CREATE DATABASE IF NOT EXISTS `g_portais` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g_portais`;

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grupo_usuario`
--

CREATE TABLE IF NOT EXISTS `grupo_usuario` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(15) NOT NULL,
  PRIMARY KEY (`id_grupo`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_portal`
--

CREATE TABLE IF NOT EXISTS `menu_portal` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `campo` varchar(30) NOT NULL,
  `menu_pai` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `menu_pai` (`menu_pai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `id_paginas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `url` varchar(150) NOT NULL,
  `admin` int(15) NOT NULL,
  `portal_pai` int(11) NOT NULL,
  `grupo_edita` int(11) NOT NULL,
  `tipo_pagina` int(11) NOT NULL,
  PRIMARY KEY (`id_paginas`),
  KEY `admin` (`admin`),
  KEY `grupo_edita` (`grupo_edita`),
  KEY `portal_pai` (`portal_pai`),
  KEY `tipo_pagina` (`tipo_pagina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portais`
--

CREATE TABLE IF NOT EXISTS `portais` (
  `id_portal` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `url` varchar(150) NOT NULL,
  `admin` int(15) NOT NULL,
  `portal_pai` int(11) NOT NULL,
  `template` int(11) NOT NULL,
  `grupo_edita` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  PRIMARY KEY (`id_portal`),
  KEY `admin` (`admin`),
  KEY `grupo_edita` (`grupo_edita`),
  KEY `portal_pai` (`portal_pai`),
  KEY `menu` (`menu`),
  KEY `template` (`template`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_pagina`
--

CREATE TABLE IF NOT EXISTS `tipo_pagina` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` int(30) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `matricula` int(15) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `permissao_sistema` int(1) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grupo_usuario`
--
ALTER TABLE `grupo_usuario`
  ADD CONSTRAINT `grupo_usuario_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`),
  ADD CONSTRAINT `grupo_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`matricula`);

--
-- Constraints for table `menu_portal`
--
ALTER TABLE `menu_portal`
  ADD CONSTRAINT `menu_portal_ibfk_1` FOREIGN KEY (`menu_pai`) REFERENCES `menu_portal` (`id_menu`);

--
-- Constraints for table `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `paginas_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `usuarios` (`matricula`),
  ADD CONSTRAINT `paginas_ibfk_2` FOREIGN KEY (`grupo_edita`) REFERENCES `grupos` (`id_grupo`),
  ADD CONSTRAINT `paginas_ibfk_3` FOREIGN KEY (`portal_pai`) REFERENCES `portais` (`id_portal`),
  ADD CONSTRAINT `paginas_ibfk_4` FOREIGN KEY (`tipo_pagina`) REFERENCES `tipo_pagina` (`id_tipo`);

--
-- Constraints for table `portais`
--
ALTER TABLE `portais`
  ADD CONSTRAINT `portais_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `usuarios` (`matricula`),
  ADD CONSTRAINT `portais_ibfk_2` FOREIGN KEY (`grupo_edita`) REFERENCES `grupos` (`id_grupo`),
  ADD CONSTRAINT `portais_ibfk_3` FOREIGN KEY (`portal_pai`) REFERENCES `portais` (`id_portal`),
  ADD CONSTRAINT `portais_ibfk_4` FOREIGN KEY (`menu`) REFERENCES `menu_portal` (`id_menu`),
  ADD CONSTRAINT `portais_ibfk_5` FOREIGN KEY (`template`) REFERENCES `template` (`id_template`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
