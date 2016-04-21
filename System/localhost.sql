-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 08:57 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14
--
-- Database: `db_subweb`
--
DROP DATABASE IF EXISTS db_subweb;
CREATE DATABASE IF NOT EXISTS `db_subweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
grant all on `db_subweb`.* to 'subweb'@'localhost' identified by 'master';
USE `db_subweb`;

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Table structure for table `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(32) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `tipus` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Categoria` (`id_categoria`, `tipus`) VALUES
(3, 'Consoles'),
(2, 'Fotografia'),
(6, 'Gran electrodomÃ¨stic'),
(4, 'Imatge i so'),
(1, 'Informatica'),
(7, 'Petit electrodomÃ¨stic'),
(5, 'Telefonia');
-- --------------------------------------------------------

--
-- Table structure for table `Licitacio`
--

CREATE TABLE IF NOT EXISTS `Licitacio` (
  `id_usuari` int(10) NOT NULL,
  `id_subhasta` int(10) NOT NULL,
  `valor` int(10) NOT NULL,
  `id_licitacio` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_licitacio`),
  KEY `id_usuari` (`id_usuari`),
  KEY `id_subhasta` (`id_subhasta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `Factures`
--

CREATE TABLE IF NOT EXISTS `Factura` (
  `id_producte` int(10) NOT NULL,
  `id_usuari` int(10),
  `id_subhasta` int(10) NOT NULL,
  `valor` varchar(50),
  `comprat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_subhasta`),
  KEY `id_usuari` (`id_usuari`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Producte`
--

CREATE TABLE IF NOT EXISTS `Producte` (
  `id_producte` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `descripcio` varchar(200) NOT NULL,
  `caracteristiques` varchar(200) NOT NULL,
  `link_img` varchar(200) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `preu_mercat` int(10) NOT NULL,
  PRIMARY KEY (`id_producte`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Inserts de datos para la tabla `Producte`
--

INSERT INTO `Producte` (`id_producte`, `nom`, `descripcio`, `caracteristiques`, `link_img`, `id_categoria`, `preu_mercat`) VALUES
(1, 'ps4', 'descripcio1', 'caracteristiques1', 'ps4.png', 3, 400),
(2, 'nom2', 'des2', 'car2', 'subwoofer.jpg', 1, 200),
(3, 'nom3', 'des3', 'cr3', 'lavadoraFagor.jpg', 2, 250),
(4, 'ipad', 'descrip4', 'caract4', 'ipad-air.jpg', 4, 150);
-- --------------------------------------------------------

--
-- Table structure for table `Subhasta`
--

CREATE TABLE IF NOT EXISTS `Subhasta` (
  `id_subhasta` int(10) NOT NULL AUTO_INCREMENT,
  `id_producte` int(10) NOT NULL,
  `num_licitacions` int(10) DEFAULT NULL,
  `temps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `completada` int(1) NOT NULL,
  PRIMARY KEY (`id_subhasta`),
  KEY `id_producte` (`id_producte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `Subhasta`
--

INSERT INTO `Subhasta` (`id_subhasta`, `id_producte`, `num_licitacions`, `temps`) VALUES
(1, 1, 0, '2016-04-11 18:41:59'),
(2, 4, 100, '2016-04-18 18:44:43'),
(3, 2, 10, '2016-04-13 18:34:07'),
(4, 4, 5, '2016-04-15 13:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `Tipus`
--

CREATE TABLE IF NOT EXISTS `Tipus` (
  `id_tipus` int(10) NOT NULL AUTO_INCREMENT,
  `rang` varchar(32) NOT NULL,
  `descripcio` varchar(250) NOT NULL,
  PRIMARY KEY (`id_tipus`),
  UNIQUE KEY `rang` (`rang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Tipus` (`id_tipus`, `rang`, `descripcio`) VALUES
(1, 'Admin', 'Administrador de subweb'),
(2, 'User', 'Usuari de subweb');
-- --------------------------------------------------------

--
-- Table structure for table `Usuari`
--

CREATE TABLE IF NOT EXISTS `Usuari` (
  `id_usuari` int(10) NOT NULL AUTO_INCREMENT,
  `saldo` int(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nom` varchar(32),
  `cognom` varchar(32),
  `dni` varchar(9),
  `phone` varchar(16),
  `adreca` varchar(32),
  `pais` varchar(32),
  `poble` varchar(32),
  `provincia` varchar(32),
  `postal` varchar(5),
  `id_tipus` int(10) NOT NULL,
  PRIMARY KEY (`id_usuari`),
  UNIQUE KEY `user` (`user`),
  KEY `id_tipus` (`id_tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `Licitacio`
--
ALTER TABLE `Licitacio`
  ADD CONSTRAINT `Licitacio_1` FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`);

ALTER TABLE `Licitacio`
  ADD CONSTRAINT `Licitacio_2` FOREIGN KEY (`id_subhasta`) REFERENCES `Subhasta` (`id_subhasta`);

--
-- Constraints for table `Pagament`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `Pagament_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`);

--
-- Constraints for table `Producte`
--
ALTER TABLE `Producte`
  ADD CONSTRAINT `Producte_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`);

--
-- Constraints for table `Subhasta`
--
ALTER TABLE `Subhasta`
  ADD CONSTRAINT `Subhasta_ibfk_1` FOREIGN KEY (`id_producte`) REFERENCES `Producte` (`id_producte`);

--
-- Constraints for table `Usuari`
--
ALTER TABLE `Usuari`
ADD CONSTRAINT `Usuari_ibfk_1` FOREIGN KEY (`id_tipus`) REFERENCES `Tipus` (`id_tipus`);



INSERT INTO `Usuari` (`id_usuari`, `saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `phone`, `adreca`, `pais`, `poble`, `provincia`, `postal`, `id_tipus`) VALUES
(1, 50000, 'Admin', 'subweb@gmail.com', 'eb0a191797624dd3a48fa681d3061212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

INSERT INTO `Usuari` (`id_usuari`, `saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `phone`, `adreca`, `pais`, `poble`, `provincia`, `postal`, `id_tipus`) VALUES
(2, 50000, 'test', 'subweb@gmail.com', 'eb0a191797624dd3a48fa681d3061212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);



--
-- Inserts de datos para la tabla `Licitacio`
--

INSERT INTO `Licitacio` (`id_usuari`, `id_subhasta`, `valor`, `id_licitacio`) VALUES
(1, 1, 15, 1),
(2, 1, 10, 2),
(1, 1, 10, 3),
(1, 1, 5, 4),
(2, 1, 5, 5),
(1, 1, 3, 6),
(1, 1, 3, 7),
(2, 1, 17, 8);

