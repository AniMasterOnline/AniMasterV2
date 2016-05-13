--
-- Base de datos: `DB_AniMaster`
--
CREATE DATABASE IF NOT EXISTS `Java-Examen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Java-Examen`;

--
-- Base de datos: Drop All
--
DROP TABLE IF EXISTS `llibres`;

--
-- TABLE: `llibres`
--
CREATE TABLE `llibres` (
    `isbn` varchar(13) PRIMARY KEY NOT NULL,
    `editorial` varchar(24) NOT NULL,
    `autor` varchar(32) NOT NULL,
    `categoria` varchar(32) NOT NULL,
    `titol` varchar(50) NOT NULL,
    `ubicacio` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
