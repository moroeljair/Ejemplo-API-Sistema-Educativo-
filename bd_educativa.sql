-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2024 a las 00:54:47
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_educativa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `ID_CURSO` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`ID_CURSO`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Álgebra I', 'El álgebra es la rama de la matemática que estudia la combinación de elementos como números, letras y signos para elaborar diferentes operaciones aritméticas elementales.'),
(2, 'Álgebra II', NULL),
(3, 'Física I', NULL),
(4, 'Física II', NULL),
(5, 'Cálculo Integral', 'Aplicar los métodos numéricos en los cálculos aproximados de integrales definidas. 4. Formular, interpretar y aplicar los conceptos principales del Cálculo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_estudiante`
--

CREATE TABLE `curso_estudiante` (
  `ID_CURSO_ESTUDIANTE` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `ID_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso_estudiante`
--

INSERT INTO `curso_estudiante` (`ID_CURSO_ESTUDIANTE`, `ID_ESTUDIANTE`, `ID_CURSO`) VALUES
(3, 1, 3),
(4, 1, 1),
(5, 4, 5),
(6, 3, 3),
(7, 2, 5),
(8, 3, 2),
(9, 4, 3),
(10, 5, 1),
(11, 6, 2),
(12, 7, 3),
(13, 8, 4),
(14, 9, 5),
(15, 10, 1),
(16, 11, 2),
(17, 12, 3),
(18, 13, 4),
(19, 14, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_profesor`
--

CREATE TABLE `curso_profesor` (
  `ID_CURSO_PROFESOR` int(11) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  `ID_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso_profesor`
--

INSERT INTO `curso_profesor` (`ID_CURSO_PROFESOR`, `ID_PROFESOR`, `ID_CURSO`) VALUES
(1, 2, 3),
(2, 2, 4),
(3, 1, 1),
(4, 1, 2),
(5, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `TELEFONO` varchar(255) NOT NULL,
  `CORREO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTUDIANTE`, `NOMBRE`, `TELEFONO`, `CORREO`) VALUES
(1, 'Jair Alexis ', '0987819452', 'jairmorocho99@gmail.com'),
(2, 'Miguel Guara', '0987865234', 'miguelguara@gmail.com'),
(3, 'Josue Morales', '0976723432', 'josuemorales@gmail.com'),
(4, 'Jorge Mena', '0965425362', 'jorgemena@gmail.com'),
(5, 'Juan Pérez', '0987819453', 'juan.perez@gmail.com'),
(6, 'María López', '0987654321', 'maria.lopez@yahoo.com'),
(7, 'Carlos García', '0987543210', 'carlos.garcia@hotmail.com'),
(8, 'Ana Martínez', '0981234567', 'ana.martinez@outlook.com'),
(9, 'Pedro González', '0989876543', 'pedro.gonzalez@gmail.com'),
(10, 'Sofía Rodríguez', '0986543210', 'sofia.rodriguez@yahoo.com'),
(11, 'Luis Fernández', '0983216547', 'luis.fernandez@hotmail.com'),
(12, 'Laura Torres', '0981597534', 'laura.torres@outlook.com'),
(13, 'Javier Morales', '0984567891', 'javier.morales@gmail.com'),
(14, 'Valentina Castro', '0989871234', 'valentina.castro@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `ID_PROFESOR` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `TELEFONO` varchar(255) NOT NULL,
  `CORREO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID_PROFESOR`, `NOMBRE`, `TELEFONO`, `CORREO`) VALUES
(1, 'Alexis Duran', '0987819450', 'alexisduran@gmail.com'),
(2, 'Alberto Duchi', '0987819458', 'albertoduchi@gmail.com'),
(3, 'Jorge Bartolo Numpy', '0965425362', 'jorgebartolo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_CURSO`);

--
-- Indices de la tabla `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  ADD PRIMARY KEY (`ID_CURSO_ESTUDIANTE`,`ID_ESTUDIANTE`,`ID_CURSO`),
  ADD KEY `curso_curso_estudiante_fk` (`ID_CURSO`),
  ADD KEY `estudiante_curso_estudiante_fk` (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `curso_profesor`
--
ALTER TABLE `curso_profesor`
  ADD PRIMARY KEY (`ID_CURSO_PROFESOR`,`ID_PROFESOR`,`ID_CURSO`),
  ADD KEY `curso_curso_profesor_fk` (`ID_CURSO`),
  ADD KEY `profesor_curso_profesor_fk` (`ID_PROFESOR`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`ID_PROFESOR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  MODIFY `ID_CURSO_ESTUDIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `curso_profesor`
--
ALTER TABLE `curso_profesor`
  MODIFY `ID_CURSO_PROFESOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_ESTUDIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `ID_PROFESOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  ADD CONSTRAINT `curso_curso_estudiante_fk` FOREIGN KEY (`ID_CURSO`) REFERENCES `curso` (`ID_CURSO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiante_curso_estudiante_fk` FOREIGN KEY (`ID_ESTUDIANTE`) REFERENCES `estudiante` (`ID_ESTUDIANTE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso_profesor`
--
ALTER TABLE `curso_profesor`
  ADD CONSTRAINT `curso_curso_profesor_fk` FOREIGN KEY (`ID_CURSO`) REFERENCES `curso` (`ID_CURSO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profesor_curso_profesor_fk` FOREIGN KEY (`ID_PROFESOR`) REFERENCES `profesor` (`ID_PROFESOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
