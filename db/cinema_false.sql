-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2016 a las 05:01:30
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinema_false`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_pelicula`, `comentario`, `puntuacion`) VALUES
(80, 23, 'dios que peli', 5),
(83, 23, 'arreloco', 1),
(84, 24, 'otra vez', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombreyapellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombreyapellido`, `email`, `mensaje`) VALUES
(7, 'Juan lorem', 'lorem@lore.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(24, 'terror'),
(25, 'ciencia ficcion'),
(26, 'accion'),
(27, 'aventura'),
(28, 'drama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `fk_pelicula` int(11) NOT NULL,
  `sala` varchar(11) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `fk_pelicula`, `sala`, `horario`) VALUES
(21, 20, '3', '14:14:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `fk_id_pelicula` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `fk_id_pelicula`, `path`) VALUES
(48, 23, 'images/58364099013d2_laslocurasderobinsoncrusoe.png'),
(49, 23, 'images/583640990a074_robinson2.jpg'),
(51, 24, 'images/583644082b569_doctor-strange.jpg'),
(52, 24, 'images/583644082f259_doctor-strange-destacada.jpg'),
(54, 24, 'images/5836442fd27d1_doctor-strange-destacada.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fk_id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `descripcion`, `duracion`, `fk_id_genero`) VALUES
(23, 'LAS AVENTURAS DE ROBINSON CRUSOE', 'la descripcion era muy dificil', 90, 27),
(24, 'DOCTOR EXTRAÑO', 'LOREM NUPSUM', 124, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contrasenia` varchar(250) NOT NULL,
  `privilegio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `contrasenia`, `privilegio`) VALUES
(2, 'weqr@weqr.com', '$2y$10$AeEV/VUYoVhJ24J1gaK9gObykRzNfdV9bWhHWgSteiNeaa8o56Zk2', 'administrador'),
(3, 'qwer@qwer.com', '$2y$10$nrvohUDK7gAdUEpKnxh4YOeHnvDZyUAUDmqO7gtnis3N7dROB3iPm', 'administrador'),
(4, 'sadf@asdf', '$2y$10$TCCsgAK5zZIO0o40o2xmj.Rv7rk1BGq8ToAqCaWIw5mtnsateqzri', 'usuario'),
(5, 'xzcv@zcxv.com', '$2y$10$RQ1XLZkGLh/ejZPJ7bXd0u3o7A9dFJM3QV9xF6QDBrSmkVL0K7l/q', 'administrador'),
(6, 'otromas@gmail.com', '$2y$10$TYWJ2W313rDTAAHe2.yLCedMD4P8/TH.yA1HzaW0HJLKQF.KdHyPO', 'usuario'),
(7, 'martin@poume.com', '$2y$10$apzGoLw8NncVQvx5vGUxzuvT.2Y8AxLHnBD8L0xplVnX1sRc/vpz2', 'usuario'),
(8, 'a@a.com', '$2y$10$1x79Cve8Vyw71wtzREjre./hxUe7QME21GdHL9fXtGMPC1kVN.wbC', 'usuario'),
(9, 'usuario@usuario.com', '$2y$10$NGpw..00bftK.DnQ9.LPWOKDC7zG8adLL6rGpyyeHbYUmCwAGEBXu', 'usuario'),
(10, 'admin@admin.com', '$2y$10$h5ClndH8ZVBaTvLLmJYhROq8XGjQhss/FK.bQoAT/Hv3Cut0zup2C', 'administrador'),
(11, 'asdasd@asdasd.com', '$2y$10$0IpKyyWKK2cjpg3PpbDGL.eyYj6JnjeqiWPWP1ZcrRFUh26tr2hL6', 'usuario'),
(12, 'asdasdasd@asdasdasd.com', '$2y$10$z5LK.EHK2CPSVNtlud9oFemSFK.mN9GmIMm2fCEhFu/aUV4iGsy6i', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
