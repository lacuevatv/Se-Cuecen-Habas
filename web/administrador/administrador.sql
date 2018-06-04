-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2018 a las 13:28:03
-- Versión del servidor: 5.6.30
-- Versión de PHP: 5.6.36-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `administrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `contacto_id` int(10) NOT NULL,
  `contacto_nombre` varchar(250) NOT NULL DEFAULT '',
  `contacto_telefono` varchar(250) NOT NULL DEFAULT '',
  `contacto_email` varchar(250) NOT NULL DEFAULT '',
  `contacto_mensaje` text NOT NULL,
  `contacto_contestado` varchar(10) NOT NULL DEFAULT '0',
  `contacto_notas` text NOT NULL,
  `form_type` varchar(30) NOT NULL,
  `fecha_formulario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `medio_id` int(10) NOT NULL,
  `medio_nombre` varchar(100) DEFAULT '',
  `medio_tipo` varchar(50) DEFAULT '',
  `medio_url` varchar(250) DEFAULT '',
  `medio_orden` int(10) DEFAULT '0',
  `medio_post_type` varchar(30) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `OPTIONS_ID` int(10) NOT NULL,
  `options_name` varchar(250) NOT NULL DEFAULT '',
  `options_value` text NOT NULL,
  `options_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`OPTIONS_ID`, `options_name`, `options_value`, `options_note`) VALUES
(1, 'popupValue', '0', ''),
(3, 'urlPopup', '#', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_ID` int(20) UNSIGNED NOT NULL,
  `post_autor` int(20) UNSIGNED NOT NULL DEFAULT '1',
  `post_fecha` date NOT NULL,
  `post_titulo` varchar(200) NOT NULL,
  `post_url` varchar(200) NOT NULL DEFAULT '',
  `post_contenido` longtext NOT NULL,
  `post_resumen` text NOT NULL,
  `post_imagen` varchar(200) NOT NULL,
  `post_video` varchar(200) NOT NULL,
  `post_categoria` varchar(200) NOT NULL,
  `post_galeria` varchar(20) NOT NULL DEFAULT '0',
  `post_imagenesGal` longtext NOT NULL,
  `post_status` varchar(50) NOT NULL,
  `post_type` varchar(100) NOT NULL DEFAULT 'post',
  `post_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_imagen` varchar(200) NOT NULL,
  `slider_titulo` varchar(250) NOT NULL DEFAULT '',
  `slider_link` varchar(300) NOT NULL DEFAULT '',
  `slider_textoLink` varchar(200) NOT NULL DEFAULT 'Leer más',
  `slider_texto` varchar(250) NOT NULL DEFAULT '',
  `slider_ubicacion` varchar(100) NOT NULL DEFAULT '',
  `slider_orden` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(10) NOT NULL,
  `user_usuario` varchar(50) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_nombre` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_usuario`, `user_password`, `user_nombre`, `user_status`) VALUES
(0, 'coco@lacueva.tv', '$2y$10$FPGfZ6q0KX96/66Cz9XgVuP.wXHYzMMiBkeHJXgHz0pfhEz2vd/ym', 'coco', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`contacto_id`);

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`medio_id`);

--
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`OPTIONS_ID`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `post_titulo` (`post_titulo`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_usuario` (`user_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `contacto_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `medio_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `OPTIONS_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
