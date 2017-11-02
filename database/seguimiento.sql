--
-- Versión del servidor: 10.1.26-MariaDB
-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Crear un usuario para la base de datos: `seguimiento`
--

CREATE USER 'psg'@'localhost' IDENTIFIED BY 'segu1m1ent0';

-- --------------------------------------------------------

--
-- Base de datos: `seguimiento`
--

-- CREATE DATABASE seguimiento;

-- --------------------------------------------------------

--
-- Otorgar permisos al nuevo usuario: `psg`
--

GRANT ALL PRIVILEGES ON seguimiento . * TO 'psg'@'localhost';

-- --------------------------------------------------------

FLUSH PRIVILEGES;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
