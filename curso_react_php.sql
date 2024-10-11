-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 09:33:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso_react_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estatus` varchar(10) NOT NULL DEFAULT 'activo',
  `nivel` varchar(50) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `password`, `estatus`, `nivel`, `registro`) VALUES
(1, 'juanperez', '1234567890', 'activo', 'user', '2024-10-11 07:32:51'),
(2, 'mariagonzalez', 'abcdefg123', 'activo', 'admin', '2024-10-11 07:32:52'),
(3, 'carlosdiaz', 'password123', 'inactivo', 'user', '2024-10-11 07:32:52'),
(4, 'lauramendez', 'qwerty123', 'activo', 'user', '2024-10-11 07:32:52'),
(5, 'fernandoherrera', 'passw0rd!', 'activo', 'admin', '2024-10-11 07:32:52'),
(6, 'anitalopez', 'securepass123', 'activo', 'user', '2024-10-11 07:32:52'),
(7, 'pedroramirez', 'supersecret456', 'inactivo', 'user', '2024-10-11 07:32:52'),
(8, 'rodrigosantos', 'pass1234!', 'activo', 'admin', '2024-10-11 07:32:52'),
(9, 'sofiagarcia', 'mypassword789', 'activo', 'user', '2024-10-11 07:32:52'),
(10, 'victorfernandez', '12345password', 'activo', 'user', '2024-10-11 07:32:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
