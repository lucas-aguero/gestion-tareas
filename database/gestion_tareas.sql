-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2020 a las 06:26:51
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `proyecto_id` int(10) NOT NULL,
  `proyecto_nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `proyecto_titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `proyecto_usuario_id` int(10) NOT NULL,
  `proyecto_deadline` date NOT NULL,
  `proyecto_progreso` int(11) NOT NULL DEFAULT 0,
  `proyecto_creacion_ts` datetime NOT NULL DEFAULT current_timestamp(),
  `proyecto_estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`proyecto_id`, `proyecto_nombre`, `proyecto_titulo`, `proyecto_usuario_id`, `proyecto_deadline`, `proyecto_progreso`, `proyecto_creacion_ts`, `proyecto_estado`) VALUES
(1, 'Java', 'Proyecto Final Java', 1, '2020-11-19', 78, '2020-11-04 00:11:59', 'a'),
(2, 'PHP', 'Proyecto Final - Curso PHP', 4, '2020-11-03', 40, '2020-11-04 13:44:21', 'a'),
(3, 'Administracion', 'Ordenar Bandeja De Entrada', 3, '2021-02-02', 82, '2020-11-04 18:25:51', 'a'),
(4, 'Inventario', 'Actualizar Inventario Oficinas ', 2, '2020-11-25', 18, '2020-11-04 18:50:26', 'a'),
(5, 'Caja Fuerte', 'Vaciar Caja Fuerte', 1, '2020-11-06', 84, '2020-11-04 19:26:42', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_password` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_intentos` int(1) NOT NULL DEFAULT 0,
  `usuario_email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_user`, `usuario_password`, `usuario_intentos`, `usuario_email`, `usuario_estado`) VALUES
(1, 'Lucas', 'Agüero', 'admin', '123456', 0, 'lucasaguero@gmail.com', 'a'),
(2, 'Ruben', 'Martinez', 'rubenm', '123456', 0, 'ruben@hotmail.com', 'a'),
(3, 'Pablo', 'Nello', 'pablon', '123456', 0, 'pablonello@gmail.com', 'a'),
(4, 'Jorge Daniel', 'Perez', 'jperez', '123456', 3, 'peres@hotmail.com', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`proyecto_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `proyecto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
