-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 08:57 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14
--
-- Database: `db_animaster`
--
DROP DATABASE IF EXISTS Animaster;
CREATE DATABASE IF NOT EXISTS `Animaster` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
grant all on `Animaster`.* to 'animaster'@'localhost' identified by 'master';
USE `Animaster`;

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Table structure for table `Rol`
--
CREATE TABLE IF NOT EXISTS `Rol` (
  `id_tipo` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Rol` (`id_tipo`,`nombre`) VALUES
(0, 'Administrador'),
(1, 'Usuario'),
(2, 'Master'),
(3, 'Jugador'),
(4, 'Expulsado'),
(5, 'Baneado');
-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--
CREATE TABLE IF NOT EXISTS `Usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nombre` varchar(32),
  `apellido` varchar(32),
  `telefono` varchar(16),
  `imagen` varchar(200),
  `id_tipo` int(10) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nickname` (`nickname`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Table structure for table `Partida`
--
CREATE TABLE IF NOT EXISTS `Partida` (
  `id_partida` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000),
  `imagen` varchar(200),
  `anyo` varchar(5),
  `nv_sobrenatural` int(1),
  PRIMARY KEY (`id_partida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Table structure for table `Partida_Usuario`
--
CREATE TABLE IF NOT EXISTS `Partida_Usuario` (
  `id_partida` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  PRIMARY KEY `id_partida` (`id_partida`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Table structure for table `Personaje`
--
CREATE TABLE IF NOT EXISTS `Personaje` (
  `id_personaje` int(10) NOT NULL AUTO_INCREMENT,
  `id_partida` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `ventaja1` varchar(80),
  `ventaja2` varchar(80),
  `ventaja3` varchar(80),
  `ventaja4` varchar(80),
  `ventaja5` varchar(80),
  `ventaja6` varchar(80),
  `desventaja1` varchar(80),
  `desventaja2` varchar(80),
  `desventaja3` varchar(80),
  `desventaja4` varchar(80),
  `nephelim` varchar(80),
  `cordura` varchar(80),
  `fama` varchar(80),
  PRIMARY KEY (`id_personaje`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_partida` (`id_partida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Table structure for table `Ficha`
--
CREATE TABLE IF NOT EXISTS `Ficha_Comuna` (
  `id_ficha` int(10) NOT NULL,
  `id_personaje` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `nivel` int(2) NOT NULL,
  `edad` int(4) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `pelo` varchar(50) NOT NULL,
  `ojos` varchar(50) NOT NULL,
  `puntos_desarrollo` int(4) NOT NULL,
  `altura` varchar(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `apariencia` int(2) NOT NULL,
  `tamanyo` int(2) NOT NULL,
  `experiencia_actual` int(4) NOT NULL,
  `experiencia_siguiente_nivel` int(4) NOT NULL,
  `AGI` int(2) NOT NULL,
  `CON` int(2) NOT NULL,
  `DES` int(2) NOT NULL,
  `FUE` int(2) NOT NULL,
  `INT` int(2) NOT NULL,
  `PER` int(2) NOT NULL,
  `POD` int(2) NOT NULL,
  `VOL` int(2) NOT NULL,
  `movimiento` int(3),
  `regeneracion` int(2),
  `cansancio` int(2),
  `idomas` varchar(500),
  `RF` int(3) NOT NULL,
  `RE` int(3) NOT NULL,
  `RV` int(3) NOT NULL,
  `RM` int(3) NOT NULL,
  `RP` int(3) NOT NULL,
  `acrobacias` int(3),
  `atletismo` int(3),
  `montar` int(3),
  `nadar` int(3),
  `saltar` int(3),
  `trepar` int(3),
  `frialdad` int(3),
  `proezas_fuerza` int(3),
  `resistir_dolor` int(3),
  `advertir` int(3),
  `buscar` int(3),
  `rastrear` int(3),
  `animales` int(3),
  `ciencia` int(3),
  `herbolaria` int(3),
  `historia` int(3),
  `medicina` int(3),
  `memorizar` int(3),
  `navegacion` int(3),
  `ocultismo` int(3),
  `tasacion` int(3),
  `valoracion_magica` int(3),
  `ley` int(3),
  `tactica` int(3),
  `estilo` int(3),
  `intimidar` int(3),
  `liderazgo` int(3),
  `persuasion` int(3),
  `comerciar` int(3),
  `callejeo` int(3),
  `etiqueta` int(3),
  `cerrajeria` int(3),
  `disfraz` int(3),
  `ocultarse` int(3),
  `robo` int(3),
  `sigilo` int(3),
  `tramperia` int(3),
  `venenos` int(3),
  `arte` int(3),
  `baile` int(3),
  `forja` int(3),
  `truco_manos` int(3),
  `canto` int(3),
  `especial1` int(3),
  `especial2` int(3),
  `especial3` int(3),
  `especial4` int(3),
  `especial5` int(3),
  `especial6` int(3),
  `especial8` int(3),
  `especial9` int(3),
  `puntos_vida` int(5),
  `turno` int(3),
  `ataque` int(3),
  `parada` int(3),
  `esquiva` int(3),
  `llevar_armadura` int(3),
  `arma1` int(3),
  `arma2` int(3),
  `TA_FIL` int(2),
  `TA_CON` int(2),
  `TA_PEN` int(2),
  `TA_CAL` int(2),
  `TA_FRI` int(2),
  `TA_ELE` int(2),
  `TA_ENE` int(2),
  `tablas` varchar(500),
  `artes_marciales` varchar(500),
  PRIMARY KEY `id_ficha` (`id_ficha`),
  KEY `id_personaje` (`id_personaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
