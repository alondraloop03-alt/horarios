-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2026 a las 22:39:58
-- Versión del servidor: 5.6.20-log
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `horarios_universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE IF NOT EXISTS `disponibilidad` (
`id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` time NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad_docente`
--

CREATE TABLE IF NOT EXISTS `disponibilidad_docente` (
`id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` time NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `disponibilidad_docente`
--

INSERT INTO `disponibilidad_docente` (`id`, `docente_id`, `grupo_id`, `dia`, `hora`) VALUES
(56, 3, 2, 'Lunes', '09:00:00'),
(55, 3, 2, 'Lunes', '08:00:00'),
(3, 5, 4, 'Lunes', '07:00:00'),
(4, 5, 4, 'Lunes', '08:00:00'),
(5, 5, 4, 'Lunes', '09:00:00'),
(6, 5, 4, 'Miercoles', '12:00:00'),
(7, 5, 4, 'Miercoles', '13:00:00'),
(37, 4, 4, 'Lunes', '10:00:00'),
(36, 4, 4, 'Miercoles', '08:00:00'),
(35, 4, 4, 'Miercoles', '07:00:00'),
(34, 4, 4, 'Martes', '07:00:00'),
(13, 8, 4, 'Martes', '08:00:00'),
(14, 8, 4, 'Martes', '09:00:00'),
(15, 8, 4, 'Lunes', '13:00:00'),
(16, 8, 4, 'Lunes', '14:00:00'),
(17, 8, 4, 'Lunes', '15:00:00'),
(18, 9, 4, 'Miercoles', '09:00:00'),
(19, 9, 4, 'Miercoles', '10:00:00'),
(20, 9, 4, 'Martes', '11:00:00'),
(21, 9, 4, 'Martes', '12:00:00'),
(22, 9, 4, 'Martes', '13:00:00'),
(23, 10, 4, 'Viernes', '07:00:00'),
(24, 10, 4, 'Jueves', '08:00:00'),
(25, 10, 4, 'Viernes', '08:00:00'),
(26, 10, 4, 'Jueves', '09:00:00'),
(27, 10, 4, 'Jueves', '10:00:00'),
(44, 7, 3, 'Viernes', '07:00:00'),
(43, 7, 3, 'Martes', '07:00:00'),
(42, 7, 4, 'Jueves', '13:00:00'),
(41, 7, 4, 'Jueves', '12:00:00'),
(40, 7, 4, 'Jueves', '11:00:00'),
(39, 7, 4, 'Miercoles', '11:00:00'),
(38, 4, 4, 'Martes', '10:00:00'),
(45, 7, 3, 'Martes', '08:00:00'),
(46, 7, 3, 'Miercoles', '10:00:00'),
(47, 7, 3, 'Miercoles', '11:00:00'),
(48, 7, 3, 'Miercoles', '12:00:00'),
(49, 6, 3, 'Miercoles', '07:00:00'),
(50, 6, 3, 'Jueves', '07:00:00'),
(51, 6, 3, 'Miercoles', '08:00:00'),
(52, 6, 3, 'Jueves', '08:00:00'),
(53, 6, 3, 'Viernes', '08:00:00'),
(54, 6, 3, 'Miercoles', '09:00:00'),
(61, 10, 2, 'Jueves', '08:00:00'),
(60, 10, 2, 'Miercoles', '07:00:00'),
(62, 10, 2, 'Viernes', '09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `color` varchar(20) DEFAULT '#3498db'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `usuario_id`, `especialidad`, `activo`, `color`) VALUES
(1, 3, 'Contabilidad', 1, '#3498db'),
(2, 4, 'Administracion', 1, '#e74c3c'),
(3, 5, 'Etica', 1, '#2ecc71'),
(4, 6, 'Ingenieria', 1, '#f39c12'),
(5, 7, 'Ingenieria', 1, '#9b59b6'),
(6, 8, 'Matematicas', 1, '#1abc9c'),
(7, 9, 'Matematicas', 1, '#34495e'),
(8, 10, 'Ingles', 1, '#e67e22'),
(9, 11, 'Ingles', 1, '#16a085'),
(10, 12, 'Ingles', 1, '#8e44ad'),
(11, 13, 'Complementarias', 1, '#d35400'),
(12, 14, 'Complementarias', 1, '#7f8c8d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_grupo`
--

CREATE TABLE IF NOT EXISTS `docente_grupo` (
`id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `docente_grupo`
--

INSERT INTO `docente_grupo` (`id`, `docente_id`, `grupo_id`, `materia_id`) VALUES
(1, 5, 4, 55),
(2, 4, 4, 54),
(3, 6, 3, 38),
(4, 6, 3, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_materia`
--

CREATE TABLE IF NOT EXISTS `docente_materia` (
`id` int(11) NOT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Volcado de datos para la tabla `docente_materia`
--

INSERT INTO `docente_materia` (`id`, `docente_id`, `materia_id`) VALUES
(1, 6, 1),
(2, 7, 1),
(3, 13, 1),
(4, 14, 1),
(5, 6, 2),
(6, 7, 2),
(7, 6, 3),
(8, 7, 3),
(9, 8, 3),
(10, 9, 3),
(11, 6, 4),
(12, 7, 4),
(13, 8, 4),
(14, 9, 4),
(15, 6, 5),
(16, 7, 5),
(17, 8, 5),
(18, 9, 5),
(19, 5, 6),
(20, 6, 6),
(21, 7, 6),
(22, 13, 6),
(23, 14, 6),
(24, 6, 7),
(25, 7, 7),
(26, 10, 8),
(27, 11, 8),
(28, 12, 8),
(29, 6, 9),
(30, 7, 9),
(31, 8, 9),
(32, 9, 9),
(33, 6, 10),
(34, 7, 10),
(35, 6, 11),
(36, 7, 11),
(37, 8, 11),
(38, 9, 11),
(39, 6, 12),
(40, 7, 12),
(41, 8, 12),
(42, 9, 12),
(43, 6, 13),
(44, 7, 13),
(45, 13, 13),
(46, 14, 13),
(47, 6, 14),
(48, 7, 14),
(49, 13, 14),
(50, 14, 14),
(51, 10, 15),
(52, 11, 15),
(53, 12, 15),
(54, 4, 16),
(55, 6, 16),
(56, 7, 16),
(57, 13, 16),
(58, 14, 16),
(59, 6, 17),
(60, 7, 17),
(61, 6, 18),
(62, 7, 18),
(63, 6, 19),
(64, 7, 19),
(65, 8, 19),
(66, 9, 19),
(67, 6, 20),
(68, 7, 20),
(69, 8, 20),
(70, 9, 20),
(71, 6, 21),
(72, 7, 21),
(73, 8, 21),
(74, 9, 21),
(75, 10, 22),
(76, 11, 22),
(77, 12, 22),
(78, 6, 23),
(79, 7, 23),
(80, 6, 24),
(81, 7, 24),
(82, 13, 24),
(83, 14, 24),
(84, 6, 25),
(85, 7, 25),
(86, 6, 26),
(87, 7, 26),
(88, 8, 26),
(89, 9, 26),
(90, 6, 27),
(91, 7, 27),
(92, 8, 27),
(93, 9, 27),
(94, 6, 28),
(95, 7, 28),
(96, 8, 28),
(97, 9, 28),
(98, 10, 29),
(99, 11, 29),
(100, 12, 29),
(101, 6, 30),
(102, 7, 30),
(103, 6, 31),
(104, 7, 31),
(105, 6, 32),
(106, 7, 32),
(107, 6, 33),
(108, 7, 33),
(109, 9, 33),
(110, 6, 34),
(111, 7, 34),
(112, 6, 35),
(113, 7, 35),
(114, 10, 36),
(115, 11, 36),
(116, 12, 36),
(117, 6, 37),
(118, 7, 37),
(119, 13, 37),
(120, 14, 37),
(121, 6, 38),
(122, 7, 38),
(123, 6, 39),
(124, 7, 39),
(125, 9, 39),
(126, 6, 40),
(127, 7, 40),
(128, 6, 41),
(129, 7, 41),
(130, 10, 42),
(131, 11, 42),
(132, 12, 42),
(133, 6, 43),
(134, 7, 43),
(135, 6, 44),
(136, 7, 44),
(137, 6, 45),
(138, 7, 45),
(139, 6, 46),
(140, 7, 46),
(141, 3, 47),
(142, 6, 47),
(143, 7, 47),
(144, 13, 47),
(145, 14, 47),
(146, 6, 48),
(147, 7, 48),
(148, 10, 49),
(149, 11, 49),
(150, 12, 49),
(151, 6, 50),
(152, 7, 50),
(153, 13, 50),
(154, 14, 50),
(155, 6, 51),
(156, 7, 51),
(157, 13, 51),
(158, 14, 51),
(159, 6, 52),
(160, 7, 52),
(161, 6, 53),
(162, 7, 53),
(163, 6, 54),
(164, 7, 54),
(165, 6, 55),
(166, 7, 55),
(167, 10, 56),
(168, 11, 56),
(169, 12, 56),
(170, 6, 57),
(171, 7, 57),
(172, 6, 58),
(173, 7, 58),
(174, 10, 59),
(175, 11, 59),
(176, 12, 59),
(177, 7, 55),
(178, 6, 54),
(179, 9, 52),
(180, 10, 15),
(181, 14, 51),
(182, 8, 19),
(183, 9, 5),
(184, 5, 6),
(185, 6, 34),
(186, 12, 15),
(187, 9, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
`id` int(11) NOT NULL,
  `clave_grupo` varchar(20) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `clave_grupo`, `semestre`, `activo`) VALUES
(1, '02SC121', 2, 1),
(2, '02SC141', 4, 1),
(3, '02SC161', 6, 1),
(4, '02SC181', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
`id` int(11) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `dia` varchar(20) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(20) DEFAULT 'ocupado'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_generado`
--

CREATE TABLE IF NOT EXISTS `horario_generado` (
`id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` time NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `horario_generado`
--

INSERT INTO `horario_generado` (`id`, `grupo_id`, `materia_id`, `docente_id`, `dia`, `hora`) VALUES
(1, 4, 55, 5, 'Lunes', '07:00:00'),
(2, 4, 55, 5, 'Lunes', '08:00:00'),
(3, 4, 55, 5, 'Lunes', '09:00:00'),
(4, 4, 55, 5, 'Miercoles', '12:00:00'),
(5, 4, 55, 5, 'Miercoles', '13:00:00'),
(6, 4, 54, 4, 'Lunes', '10:00:00'),
(7, 4, 54, 4, 'Martes', '07:00:00'),
(8, 4, 54, 4, 'Martes', '10:00:00'),
(9, 4, 54, 4, 'Miercoles', '07:00:00'),
(10, 4, 54, 4, 'Miercoles', '08:00:00'),
(11, 3, 38, 6, 'Jueves', '07:00:00'),
(12, 3, 38, 6, 'Jueves', '08:00:00'),
(13, 3, 38, 6, 'Miercoles', '07:00:00'),
(14, 3, 38, 6, 'Miercoles', '08:00:00'),
(15, 3, 38, 6, 'Miercoles', '09:00:00'),
(16, 3, 38, 6, 'Viernes', '08:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `horas_semana` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `semestre`, `horas_semana`, `tipo`) VALUES
(1, 'Dibujo', 1, 3, 'relleno'),
(2, 'Fundamentos de Programacion', 1, 5, 'tecnica'),
(3, 'Matematicas para la Computacion', 1, 4, 'matematica'),
(4, 'Matematicas I', 1, 5, 'matematica'),
(5, 'Fisica I', 1, 5, 'matematica'),
(6, 'Seminario de Etica', 1, 4, 'complementaria'),
(7, 'Introduccion a la Ingenieria en Sistemas Computacionales', 1, 4, 'tecnica'),
(8, 'Ingles I', 1, 5, 'ingles'),
(9, 'Probabilidad y Estadistica', 2, 6, 'matematica'),
(10, 'Programacion Orientada a Objetos', 2, 5, 'tecnica'),
(11, 'Quimica', 2, 6, 'matematica'),
(12, 'Matematicas II', 2, 5, 'matematica'),
(13, 'Fundamentos de Investigacion', 2, 3, 'complementaria'),
(14, 'Desarrollo Sustentable', 2, 5, 'complementaria'),
(15, 'Ingles II', 2, 5, 'ingles'),
(16, 'Administracion', 3, 4, 'relleno'),
(17, 'Topicos Selectos de Programacion', 3, 5, 'tecnica'),
(18, 'Estructura de Datos', 3, 6, 'tecnica'),
(19, 'Matematicas III', 3, 5, 'matematica'),
(20, 'Fisica II', 3, 5, 'matematica'),
(21, 'Matematicas IV', 3, 5, 'matematica'),
(22, 'Ingles III', 3, 5, 'ingles'),
(23, 'Teoria de la Computacion', 4, 5, 'tecnica'),
(24, 'Taller de Investigacion I', 4, 2, 'complementaria'),
(25, 'Fundamentos de Bases de Datos', 4, 5, 'tecnica'),
(26, 'Matematicas V', 4, 5, 'matematica'),
(27, 'Circuitos Electricos y Electronicos', 4, 6, 'matematica'),
(28, 'Investigacion de Operaciones', 4, 4, 'matematica'),
(29, 'Ingles IV', 4, 5, 'ingles'),
(30, 'Programacion de Sistemas', 5, 6, 'tecnica'),
(31, 'Teoria de las Telecomunicaciones', 5, 4, 'tecnica'),
(32, 'Taller de Bases de Datos', 5, 5, 'tecnica'),
(33, 'Metodos Numericos', 5, 5, 'matematica'),
(34, 'Arquitectura de Computadoras', 5, 6, 'tecnica'),
(35, 'Lenguaje Ensamblador', 5, 5, 'tecnica'),
(36, 'Ingles V', 5, 5, 'ingles'),
(37, 'Taller de Investigacion II', 6, 2, 'complementaria'),
(38, 'Redes de Computadoras', 6, 5, 'tecnica'),
(39, 'Simulacion', 6, 5, 'tecnica'),
(40, 'Fundamentos de Desarrollo de Sistemas', 6, 5, 'tecnica'),
(41, 'Interfaces', 6, 6, 'tecnica'),
(42, 'Ingles VI', 6, 5, 'ingles'),
(43, 'Programacion Web', 7, 6, 'tecnica'),
(44, 'Sistemas Operativos', 7, 6, 'tecnica'),
(45, 'Graficacion', 7, 5, 'tecnica'),
(46, 'Planificacion y Modelado', 7, 5, 'tecnica'),
(47, 'Contabilidad Financiera', 7, 5, 'relleno'),
(48, 'Sistemas Operativos Distribuidos I', 7, 6, 'tecnica'),
(49, 'Ingles VII', 7, 5, 'ingles'),
(50, 'Cultura Empresarial', 8, 4, 'relleno'),
(51, 'Formulacion y Evaluacion de Proyectos de Inversion', 8, 4, 'relleno'),
(52, 'Inteligencia Artificial I', 8, 4, 'tecnica'),
(53, 'Desarrollo de Proyectos de Software', 8, 5, 'tecnica'),
(54, 'Sistemas Operativos Distribuidos II', 8, 5, 'tecnica'),
(55, 'Aplicaciones Web', 8, 6, 'tecnica'),
(56, 'Ingles Tecnico I', 8, 5, 'ingles'),
(57, 'Bases de Datos Distribuidas', 9, 5, 'tecnica'),
(58, 'Programacion Web con Bases de Datos', 9, 5, 'tecnica'),
(59, 'Ingles Tecnico II', 9, 5, 'ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` enum('admin','docente') DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `matricula`, `nombre`, `password`, `rol`, `color`) VALUES
(1, 'admin', 'Administrador', '1234', 'admin', NULL),
(3, 'ISC001', 'Calixto Medina Ana Maria', '1234', 'docente', NULL),
(4, 'ISC002', 'Diaz Ubaldo Jose Rodolfo', '1234', 'docente', NULL),
(5, 'ISC003', 'Flores Vera Adan', '1234', 'docente', NULL),
(6, 'ISC004', 'Sotelo Hernandez Blanca', '1234', 'docente', '#ef4444'),
(7, 'ISC005', 'Hernandez Hernandez Angel', '1234', 'docente', '#22c55e'),
(8, 'ISC006', 'Sanchez Rodriguez Daniel', '1234', 'docente', NULL),
(9, 'ISC007', 'Jimenez Jimenez Abel', '1234', 'docente', '#3b82f6'),
(10, 'ISC008', 'Garcia Reza Francisco de Jesus', '1234', 'docente', '#f97316'),
(11, 'ISC009', 'Medina Hernandez Annette Natalie', '1234', 'docente', NULL),
(12, 'ISC010', 'Ramirez Navarrete Juan Carlos', '1234', 'docente', '#a855f7'),
(13, 'ISC011', 'Mendez Gomez Anayeli', '1234', 'docente', '#eab308'),
(14, 'ISC012', 'Reyes Sanchez Ariana', '1234', 'docente', '#ec4899');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disponibilidad_docente`
--
ALTER TABLE `disponibilidad_docente`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
 ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `docente_grupo`
--
ALTER TABLE `docente_grupo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_generado`
--
ALTER TABLE `horario_generado`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `matricula` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `disponibilidad_docente`
--
ALTER TABLE `disponibilidad_docente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `docente_grupo`
--
ALTER TABLE `docente_grupo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario_generado`
--
ALTER TABLE `horario_generado`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
