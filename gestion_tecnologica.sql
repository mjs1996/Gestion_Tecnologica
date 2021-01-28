-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-01-2021 a las 23:17:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_tecnologica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `materia_curso` varchar(100) DEFAULT NULL,
  `hora_retiro` time DEFAULT NULL,
  `desde_hora` time DEFAULT NULL,
  `hasta_hora` time DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `hora_devolucion` time DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `tipo`, `numero`, `lugar`, `materia_curso`, `hora_retiro`, `desde_hora`, `hasta_hora`, `fecha_retiro`, `fecha_devolucion`, `hora_devolucion`, `estado`, `id_personal`, `id_usuario`) VALUES
(1, 'notebook', '1', 'A.1.2', 'Fisica', '00:00:00', '00:00:00', '18:00:00', '2021-01-21', '2021-01-21', '21:00:00', 'Devuelto', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_nuevo`
--

CREATE TABLE `equipo_nuevo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `detalle` varchar(1000) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `num_proyecto` varchar(100) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `id_usuario_carga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_nuevo`
--

INSERT INTO `equipo_nuevo` (`id`, `id_usuario`, `tipo`, `detalle`, `serie`, `fecha_entrega`, `hora_entrega`, `num_proyecto`, `departamento`, `id_usuario_carga`) VALUES
(1, 2, 'Notebook', '  Marca: Lenovo\r\n\r\nProcesador: Intel i7  7th Gen\r\n\r\nRam: HYPER 8 GB DDR4\r\n\r\nDisco: Seagate  1TB   ', '1487525454GG', '2021-01-29', '16:00:00', '11', 'Gistaq', 4),
(3, 8, 'Impresora', 'Marca: HP 107W \r\nAccesorios: wifi 220V \r\nCaja: blanca y negra', '878454GGHD', '2021-01-22', '16:00:00', '77', 'Tesoreria', 4),
(4, 8, 'Netbook', ' Marca	Lenovo\r\n\r\nLinea	IdeaPad\r\n\r\nModelo	 81VT\r\n\r\nProcesador	Intel Celeron N4020\r\n\r\nMemoria RAM	4 GB\r\n\r\nResolucion de la pantalla	1366 px x 768 px\r\n\r\nGPU	Intel UHD Graphics 600', '787844555555TTR', '2021-01-22', '09:00:00', '31', 'Alumnado', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `dni` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `apellido`, `nombre_usuario`, `dni`) VALUES
(1, 'Nancy', 'chica', NULL, '875454');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `dni` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `nombre_usuario`, `clave`, `dni`) VALUES
(2, 'maximiliano', 'silvera', 'maximiliano', '12345', '39321073'),
(4, 'admin', 'root', 'administrador', 'admin', '00000'),
(7, 'Samuel', 'Gonzalez', 'SamuGonza', '8787', '40256987'),
(8, 'Robert', 'Dominguez', 'Robert', '9898', '87545213');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `equipo_nuevo`
--
ALTER TABLE `equipo_nuevo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipo_nuevo`
--
ALTER TABLE `equipo_nuevo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `equipo_nuevo`
--
ALTER TABLE `equipo_nuevo`
  ADD CONSTRAINT `equipo_nuevo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
