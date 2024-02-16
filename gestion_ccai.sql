-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 12-02-2024 a las 04:44:53
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_ccai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_estancia`
--

DROP TABLE IF EXISTS `actividad_estancia`;
CREATE TABLE IF NOT EXISTS `actividad_estancia` (
  `id_proyecto` int(11) NOT NULL,
  `id_estancia` int(11) NOT NULL,
  `id_estancia_residente` int(11) NOT NULL,
  `correo_residente_estancia` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `actividad` text COLLATE utf8mb4_spanish_ci,
  `observaciones` text COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id_proyecto`,`id_estancia`,`id_estancia_residente`,`correo_residente_estancia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_participante`
--

DROP TABLE IF EXISTS `actividad_participante`;
CREATE TABLE IF NOT EXISTS `actividad_participante` (
  `id_proyecto` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `correo_estudiante` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_programa` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `actividad` text COLLATE utf8mb4_spanish_ci,
  `observaciones` text COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id_proyecto`,`id_estudiante`,`correo_estudiante`,`tipo_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_registro`
--

DROP TABLE IF EXISTS `asistencia_registro`;
CREATE TABLE IF NOT EXISTS `asistencia_registro` (
  `usuario_correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`usuario_correo`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_registro_horas`
--

DROP TABLE IF EXISTS `asistencia_registro_horas`;
CREATE TABLE IF NOT EXISTS `asistencia_registro_horas` (
  `usuario_correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`usuario_correo`,`fecha`,`hora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirantes`
--

DROP TABLE IF EXISTS `aspirantes`;
CREATE TABLE IF NOT EXISTS `aspirantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_envio` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `comunidad` varchar(100) DEFAULT NULL,
  `institucion` varchar(100) DEFAULT NULL,
  `correo_institucional` varchar(100) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `interes_liberacion` varchar(100) DEFAULT NULL,
  `area` text,
  `porque` text,
  `estatus` varchar(20) NOT NULL DEFAULT 'Disponible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aspirantes`
--

INSERT INTO `aspirantes` (`id`, `hora_envio`, `nombre`, `apellido`, `correo_electronico`, `comunidad`, `institucion`, `correo_institucional`, `division`, `interes_liberacion`, `area`, `porque`, `estatus`) VALUES
(1, 'Ene 29, 2024 @ 1:45 PM', 'Alejandro', 'Gutierrez Cedillo', 'ale.gutierrez25012000@gmail.com', 'Comunidad TESE', '', '201911108@tese.edu.mx', 'Sistemas Computacionales', 'Residencias', 'IoT, Impresión 3D, Ciberseguridad, Redes y Servidores', 'Me motiva los conocimientos que puedo adquirir.', 'Aceptado'),
(2, 'Ene 29, 2024 @ 1:45 PM', 'Alejandro Palani', 'Iturburu Saavedra', 'palani.iturburu@outlook.com', 'Comunidad TESE', '', '201820438@tese.edu.mx', 'Sistemas Computacionales', 'Residencias', 'IoT, Ciberseguridad, Redes y Servidores', 'Me motiva los conocimientos que puedo adquirir y las que aprender en el ccai', 'Aceptado'),
(3, 'Ene 25, 2024 @ 2:08 PM', 'JOSHAJANY YAMILET', 'HERNANDEZ MENDEZ', 'yami2001hernandez@gmail.com', 'Comunidad TESE', '', 'HEMJ201920025@tese.edu.mx', 'SISTEMAS COMPUTACIONALES', 'Residencias', 'Ingeniería de Software, Gestión Administrativa, Gestión Académica', 'Quiero ampliar mis conocimientos en los proyectos que integran el CCAI ya que en lo personal creo que es un gran lugar donde puedo poner en practica mis conocimiento y puedo aprender mucho de los mentores y compañeros', 'Aceptado'),
(4, 'Ene 22, 2024 @ 12:09 PM', 'Luis Gerardo', 'Acosta Herrera', 'acostaluis527@gmail.com', 'Comunidad TESE', '', 'aohl201920272@tese.edu.mx', 'Sistemas Computacionales', 'Residencias', 'IoT, Ciberseguridad, Redes y Servidores, Inteligencia Artificial', 'Por qué me motiva trabajar con nuevas tecnologías para generar experiencias para ámbito laboral', 'Disponible'),
(5, 'Ene 16, 2024 @ 12:43 PM', 'Victor Hugo', 'Hernández Cuadros', 'hernandezcuadrosvictorhugo@gmail.com', 'Comunidad TESE', '', '201621262@tese.edu.mx', 'Sistemas Computacionales', 'Residencias', 'Ciberseguridad, Redes y Servidores', 'Me gustaría hacer las recidencias en el CCAI por qué me dará herramientas para la vida laboral', 'Disponible'),
(6, 'Ene 25, 2024 @ 2:13 PM', 'carlos manuel', 'marquez castillo', 'mmarquez55880@gmail.com', 'Comunidad TESE', '', 'macc201921085@tese.edu.mx', 'informatica', 'Residencias', 'Ingeniería de Software', 'quiero aprender a diseñar y programar un sistema informatico con sus funcionalidades como se ve ya creado', 'Rechazado'),
(7, 'Ene 19, 2024 @ 8:17 PM', 'Saul Dael', 'Guzman Hernandez', 'SaulDael@hotmail.com', 'Comunidad TESE', '', 'guhs202011004@tese.edu.mx', 'informatica', 'Residencias', 'Ingeniería de Software, Ciberseguridad, Redes y Servidores', 'Me gustaría participar en proyectos de la escuela y mejorar mis skills', 'Disponible'),
(8, 'Ene 24, 2024 @ 7:11 PM', 'Fernando', 'Molina Uribe', 'fer.160200@gmail.com', 'Comunidad TESE', '', '201910384@tese.edu.mx', 'Informática', 'Residencias', 'Impresión 3D, Ingeniería de Software, Inteligencia Artificial', 'Me interesan los temas que abordan en el centro', 'Aceptado'),
(9, 'Ene 23, 2024 @ 1:16 PM', 'Natalia', 'Ortiz', 'natasha11_53200@icloud.com', 'Comunidad TESE', '', '201821032@tese.edu.mx', 'Informática', 'Residencias', 'Ciberseguridad, Redes y Servidores, Gestión Académica', '', 'Disponible'),
(10, 'Ene 29, 2024 @ 8:00 PM', 'NATANAEL', 'SANCHEZ TRONCOSO', 'nathanaelst@live.com.mx', 'Comunidad TESE', '', 'SATN202011031@tese.edu.mx', 'Informática', 'Residencias', 'Ciberseguridad, Redes y Servidores, Inteligencia Artificial, Gestión Administrativa, Gestión Académica', 'Me gustaría poner en practica mis conocimientos obtenidos en la división y ala vez aprender cosas nuevas de mi área.', 'Disponible'),
(11, 'Ene 24, 2024 @ 6:30 PM', 'Cesar Ivan', 'Melendez Flores', 'cesarmfl9920@gmail.com', 'Comunidad TESE', '', '201920907@tese.edu.mx', 'ingenieria en informatica', 'Residencias', 'Ciberseguridad, Redes y Servidores', 'fue la opcion mas optima en cuestion de tiempo y cercania', 'Disponible'),
(12, 'Ene 24, 2024 @ 11:13 PM', 'Karen Guadalupe', 'Noriega Perez', 'karen.1615.nek@gmail.com', 'Comunidad TESE', '', '202110157@tese.edu.mx', 'Ingenieria en informatica', 'Residencias', 'IoT, Ingeniería de Software, Ciberseguridad, Redes y Servidores', 'Quiero desarrollar mis conocimientos y aplicar los conocimientos que he adquirido en cada una de mis clases ademas de adquirir experiencia para conocer mas alla de lo que ya se. Creo que puedo adquirir mucho que me servira no solo para la carrera si no para el mundo laboral', 'Disponible'),
(13, 'Ene 22, 2024 @ 12:18 PM', 'Andres', 'Zavala Guerrero', 'zavalaguerreroandy@gmail.com', 'Comunidad TESE', '', 'ZAGA202011236@tese.edu.mx', 'Ingeniería en Sistemas Computacionales', 'Residencias', '', 'Trabajar con nuevas tecnologias así como desarrollar proyectos más complejos.', 'Disponible'),
(14, 'Ene 24, 2024 @ 5:02 PM', 'Ruben', 'Crisostomo Hernandez', 'rchdz2009@gmail.com', 'Comunidad TESE', '', 'CIHR202010105@tese.edu.mx', 'Ingeniería Informática', 'Residencias', 'Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores, Inteligencia Artificial', 'Quiero aprender más a detalle la creación y programación de una inteligencia artificial o aprender los principios básicos para poder trabajar en la rama de la ciberseguridad. Esto con el fin de salir lo más preparado posible de la carrera.', 'Disponible'),
(15, 'Ene 25, 2024 @ 2:44 PM', 'Lizbeth', 'Leon Orta', 'lizleot_18@hotmail.com', 'Comunidad TESE', '', '', 'Lizbeth Leon', 'Residencias', 'IoT, Gestión Administrativa, Gestión Académica', 'Me motiva aprender y poder colaborar con el CCAI .', 'Disponible'),
(16, 'Ene 22, 2024 @ 12:24 PM', 'Abner', 'Cházaro Durán', 'abner.chazaro@gmail.com', 'Comunidad TESE', '', '202120243@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ingeniería de Software, Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores, Inteligencia Artificial', 'Porque realmente me interesa practicar los conocimientos que he aprendido dentro de la carrera, además de que dentro del desarrollo de proyectos veo una gran posibilidad para poder desarrollar nuevas habilidades y poner en práctica técnicas que obtenga', 'Aceptado'),
(17, 'Ene 26, 2024 @ 1:56 PM', 'Alan Eduardo', 'Alcantara Perez', 'alancitolalito@yahoo.com.mx', 'Comunidad TESE', '', '202020921@tese.edu.mx', 'Sistemas computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ciberseguridad, Redes y Servidores', 'Me llama la atención el seguir aprendiendo en estás áreas', 'Aceptado'),
(18, 'Ene 25, 2024 @ 10:04 PM', 'Alan Jaziel', 'Avila Hernandez', 'alanavila1fm@gmail.com', 'Comunidad TESE', '', '202020347@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ciberseguridad, Redes y Servidores, Gestión Administrativa, Gestión Académica', 'Me gustaria hacer mi servicio en el CCAI porque siento que podre aprender un poco mas sobre las cosas que me interesan en este caso la impresion 3D y tambien sobre la ciberseguridad', 'Aceptado'),
(19, 'Ene 25, 2024 @ 8:56 PM', 'Arturo', 'Hernández Martínez', 'jeteximon55555@hotmail.com', 'Comunidad TESE', '', '202020600@tese.edu.mx', 'Sistemas computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ciberseguridad, Redes y Servidores, Gestión Administrativa, Gestión Académica', 'Creo que es un área en donde puedo aprender demasiado y desarrollar nuevas habilidades.', 'Aceptado'),
(20, 'Ene 23, 2024 @ 1:14 PM', 'César Enrique', 'Manriquez Torres', 'cesar.manto.02@gmail.com', 'Comunidad TESE', '', '202020466@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'Ingeniería de Software, Ciberseguridad, Redes y Servidores, Robótica y Mecatrónica', 'Me motiva lo que pueda aprender, poner mi creatividad a prueba y aprender más allá de lo que ya se, y eso me puede ayudar en un ambiente laboral.', 'Aceptado'),
(21, 'Ene 22, 2024 @ 12:28 PM', 'Clemente Daniel', 'Morales González', 'clememora596@gmail.com', 'Comunidad TESE', '', '202121619@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'IoT, Ingeniería de Software, Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores, Inteligencia Artificial', 'Por qué tiene las herramientas necesarias para mí desarrollo en la carrera que me van a servir de igual manera en un ámbito laboral', 'Aceptado'),
(22, 'Ene 23, 2024 @ 1:14 PM', 'Dylan Alejandro', 'Fernández Molina', 'dylan_02_002@hotmail.com', 'Comunidad TESE', '', '202021090@tese.edu.mx', 'Sistemas computacionales', 'Servicio Social', 'Ingeniería de Software, Ciberseguridad, Redes y Servidores, Robótica y Mecatrónica', 'Me gustaría aplicar los conocimientos aprendidos de mi profesión en un proyecto real, además de salir de mi zona de confort para explorar nuevas áreas de conocimiento para expandir mi horizontes por interés en mi preparación y ampliar mis conocimientos en el área de sistemas computacionales.', 'Disponible'),
(23, 'Ene 22, 2024 @ 12:24 PM', 'Fatima Odette', 'Jimenez Rivas', 'fatijimenez2414@gmail.com', 'Comunidad TESE', '', '202121762@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ingeniería de Software, Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores, Inteligencia Artificial, Robótica y Mecatrónica', 'Se me hace un área interesante en el cual me puedo desempeñar y lograr expandir mis conocimientos a medida que aprendo mis gustos e intereses', 'Disponible'),
(24, 'Ene 25, 2024 @ 9:14 PM', 'Jose Gerardo', 'Díaz Saavedra', 'chinodiaz116@gmail.com', 'Comunidad TESE', '', '202020283@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ciberseguridad, Redes y Servidores, Gestión Administrativa, Gestión Académica', 'Para poder seguir aprendiendo más sobre estos temas de gran interés para mí &amp; poder poseer más capacidad para ampliar mis conocimientos', 'Disponible'),
(25, 'Ene 22, 2024 @ 12:23 PM', 'Miguel Alberto', 'Mendoza Gómez', 'm_chory@hotmail.com', 'Comunidad TESE', '', '202120877@tese.edu.mx', 'Sistemas computacionales', 'Servicio Social', 'IoT, Impresión 3D, Ingeniería de Software, Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores, Inteligencia Artificial', 'Me motiva realizar proyectos en los cuales tenga que realizar programas y me genere un reto', 'Disponible'),
(26, 'Ene 25, 2024 @ 10:01 AM', 'Rodrigo Axel', 'Castillo Vera', 'axelcastillovera0121@gmail.com', 'Comunidad TESE', '', '201910100@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'Gestión Administrativa, Gestión Académica', 'Por las cosas que puede llegar a prender a hacer en el CCAI', 'Disponible'),
(27, 'Ene 30, 2024 @ 11:33 AM', 'Yair Arturo', 'Ruiz Garcia', 'yairrg68@gmail.com', 'Comunidad TESE', '', '201822090@tese.edu.mx', 'Sistemas computacionales', 'Servicio Social', 'Impresión 3D, Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores', 'Porque me interesa aprender más y tener más conocimientos sobre otras tecnologías.', 'Disponible'),
(28, 'Ene 30, 2024 @ 2:32 PM', 'Cesar', 'Gomez Berrocal', 'hardicesar@gmail.com', 'Comunidad TESE', '', '201811206@tese.edu.mx', 'Sistemas computacionales', 'Servicio Social', 'Ciberseguridad, Redes y Servidores', 'Me parece que los proyectos que realizan en el ccai son bastante interesantes y me gustaría estar dentro de alguno de esos proyectos.', 'Disponible'),
(29, 'Ene 30, 2024 @ 6:00 PM', 'Miguel Ángel', 'Rodríguez Reyes', 'miguel46reyer@gmail.com', 'Comunidad TESE', '', '202121286@tese.edu.mx', 'Sistemas Computacionales', 'Servicio Social', 'Realidad Virtual, Mixta, Aumentada, etc., Inteligencia Artificial, Robótica y Mecatrónica, Gestión Académica', 'Está oportunidad la aprovecharé para adquirir conocimiento y experiencia, me es de valor personal, institucional y laboralmente ya que es de mi área, al igual me ayudaría a crecer y a desarrollarme en un entorno laboral.', 'Disponible'),
(30, 'Ene 23, 2024 @ 1:24 PM', 'Benjamin', 'Mejia Fuerte', 'benmejia120@gmail.com', 'Comunidad TESE', '', '202120206@tese.edu.mx', 'Informática', 'Servicio Social', 'IoT, Ingeniería de Software, Realidad Virtual, Mixta, Aumentada, etc., Ciberseguridad, Redes y Servidores, Inteligencia Artificial', 'Quiero aplicar mis conocimientos y habilidades en entornos prácticos reales', 'Aceptado'),
(31, 'Ene 29, 2024 @ 12:13 AM', 'Carlos', 'Gachuz', 'rluchiha17@gmail.com', 'Comunidad TESE', '', 'gagc202011257', 'Informática', 'Servicio Social', 'Ciberseguridad, Redes y Servidores', '', 'Aceptado'),
(32, 'Ene 29, 2024 @ 5:06 AM', 'Daniel alejandro', 'Flores islas', 'da9832639@gmail.com', 'Comunidad TESE', '', '202120030@tese.edu.mx', 'Informática', 'Servicio Social', '', 'Quiero poder aprender y dar lo mejor en mi con el conocimiento anterior', 'Aceptado'),
(33, 'Ene 23, 2024 @ 12:29 PM', 'Ana Maria', 'Cedeño perez', 'mary.perez180297@gmail.com', 'Comunidad TESE', '', '201721270@tese.edu.mx', 'Ingeniería informática', 'Servicio Social', 'Impresión 3D', 'Estoy interesada en conocer sobre las impresiones en 3D y como se configuran', 'Aceptado'),
(34, 'Ene 23, 2024 @ 12:15 PM', 'Julia Adriana', 'Gaona Lopez lena', 'julieejanee2003@gmail.com', 'Comunidad TESE', '', '202121364@tese.edu.mx', 'Ingeniería informática', 'Servicio Social', 'IoT, Realidad Virtual, Mixta, Aumentada, etc., Inteligencia Artificial', 'Quisiera realizar mi servicio en el ccai porque tiene áreas muy interesantes, donde podemos poner a prueba todos nuestros conocimientos adquiridos hasta el momento y seguir aprendiendo más cosas!', 'Aceptado'),
(35, 'Ene 30, 2024 @ 3:50 PM', 'Marlenne', 'Quiroz becerra', 'marlenne.quiroz@hotmail.com', 'Comunidad TESE', '', '201910217@tese.edu.mx', 'Ingeniería sistemas computacionales', 'Servicio Social', 'Gestión Administrativa', 'Se me hace interesante y es un lugar que por falta de tiempo no he visitado mucho', 'Aceptado'),
(36, 'Ene 30, 2024 @ 10:21 AM', 'alberto', 'manjarrez gonzlez', 'alberto.manjarrez@live.com.mx', 'Comunidad TESE', '', '200821433@tese.edu.mx', 'Licenciatura en Informatica', 'Servicio Social', 'Gestión Académica', 'Poder contribuir al tese con mis conocimientos y servicio', 'Disponible'),
(37, 'Ene 25, 2024 @ 3:59 PM', 'Victor Antonio', 'González Palmas', 'vgonzalezpalmas02@gmail.com', 'Comunidad TESE', '', 'GOPV201921369@tese.edu', 'Mecánica', 'Servicio Social', 'Impresión 3D, Robótica y Mecatrónica', 'Por el plan de estudio que ofrece, y llegar con más conocimiento a la industria.', 'Disponible'),
(38, 'Ene 30, 2024 @ 5:32 PM', 'Nelcy', 'Casanova', 'nejocaol193@gmail.com', 'Comunidad TESE', '', '202120846@tese.edu.mx', '', 'Servicio Social', 'Realidad Virtual, Mixta, Aumentada, etc., Inteligencia Artificial, Robótica y Mecatrónica, Gestión Académica', 'Es un área en la cuál tanto académica como laboralmente es de mi interés, aparte de ser algo que me llama la atención aprender y absorber el mayor conocimiento posible, así como adquirir experiencia, sería una gran oportunidad.', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `id_investigador` int(11) NOT NULL,
  `correo_investigador` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_colaborador`,`id_proyecto`,`id_investigador`,`correo_investigador`),
  KEY `fk_colaborador_proyecto1_idx` (`id_proyecto`),
  KEY `fk_colaborador_investigador1_idx` (`id_investigador`,`correo_investigador`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`id_colaborador`, `id_proyecto`, `id_investigador`, `correo_investigador`) VALUES
(10, 5, 5, 'jmsteinc@tese.edu.mx'),
(11, 5, 4, 'lmoreno@tese.edu.mx'),
(14, 5, 2, 'fjacobavila@tese.edu.mx'),
(7, 6, 5, 'jmsteinc@tese.edu.mx'),
(15, 6, 4, 'lmoreno@tese.edu.mx'),
(16, 6, 3, 'adolfo_melendez@tese.edu.mx');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `colaborador_proyecto`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `colaborador_proyecto`;
CREATE TABLE IF NOT EXISTS `colaborador_proyecto` (
`correo` varchar(60)
,`estatus` varchar(15)
,`id_colaborador` int(11)
,`id_investigador` int(11)
,`id_proyecto` int(11)
,`nombre` varchar(137)
,`telefono` varchar(45)
,`titulo` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalles_proyecto`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `detalles_proyecto`;
CREATE TABLE IF NOT EXISTS `detalles_proyecto` (
`coordinador` varchar(137)
,`coordinador_correo` varchar(60)
,`coordinador_id_investigador` int(11)
,`descripcion` text
,`estatus` varchar(45)
,`estatus_inv` varchar(15)
,`fecha_fin` date
,`fecha_inicio` date
,`fecha_registro` datetime
,`id_proyecto` int(11)
,`imagen` varchar(255)
,`objetivo` varchar(400)
,`telefono` varchar(45)
,`titulo` varchar(250)
,`titulo_inv` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion_programa`
--

DROP TABLE IF EXISTS `documentacion_programa`;
CREATE TABLE IF NOT EXISTS `documentacion_programa` (
  `id_estudiante` int(11) NOT NULL,
  `correo_estudiante` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `programa_tipo` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_documento` int(11) NOT NULL,
  `semestre` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `documento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `archivo` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estudiante`,`correo_estudiante`,`programa_tipo`,`id_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancia`
--

DROP TABLE IF EXISTS `estancia`;
CREATE TABLE IF NOT EXISTS `estancia` (
  `id_estancia` int(11) NOT NULL,
  `id_estancia_residente` int(11) NOT NULL,
  `residente_correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatus` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'activo, concluido, cancelado',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `procedencia` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `patrocinador` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estancia`,`id_estancia_residente`,`residente_correo`),
  KEY `fk_estancia_estancia_residente1_idx` (`id_estancia_residente`,`residente_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estancia_proyecto`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `estancia_proyecto`;
CREATE TABLE IF NOT EXISTS `estancia_proyecto` (
`correo` varchar(60)
,`estatus` varchar(45)
,`estatus_residente` varchar(15)
,`fecha_fin` date
,`fecha_inicio` date
,`id_estancia` int(11)
,`id_estancia_residente` int(11)
,`id_proyecto` int(11)
,`nombre` varchar(137)
,`patrocinador` varchar(45)
,`procedencia` varchar(45)
,`telefono` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancia_residente`
--

DROP TABLE IF EXISTS `estancia_residente`;
CREATE TABLE IF NOT EXISTS `estancia_residente` (
  `id_estancia_residente` int(11) NOT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_1` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_2` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo_adicional` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estatus` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estancia_residente`,`correo`),
  KEY `fk_estancia_usuario1_idx` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_1` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_2` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo_adicional` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `division` varchar(60) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estatus` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estudiante`,`correo`),
  KEY `fk_estudiante_usuario1_idx` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `matricula`, `nombres`, `apellido_1`, `apellido_2`, `correo`, `correo_adicional`, `telefono`, `division`, `estatus`) VALUES
(1, '', 'Alejandro', 'Gutierrez', 'Cedillo', '201911108@tese.edu.mx', 'ale.gutierrez25012000@gmail.com', '', 'Sistemas Computacionales', 'Asignado'),
(2, '', 'Alejandro Palani', 'Iturburu', 'Saavedra', '201820438@tese.edu.mx', 'palani.iturburu@outlook.com', '', 'Sistemas Computacionales', 'Asignado'),
(3, '', 'Abner', 'Cházaro', 'Durán', '202120243@tese.edu.mx', 'abner.chazaro@gmail.com', '', 'Sistemas Computacionales', 'Asignado'),
(4, '', 'Benjamin', 'Mejia', 'Fuerte', '202120206@tese.edu.mx', 'benmejia120@gmail.com', '', 'Informática', 'Asignado'),
(5, '', 'Carlos', 'Gachuz', '', 'gagc202011257', 'rluchiha17@gmail.com', '', 'Informática', 'Asignado'),
(6, '', 'Alan Eduardo', 'Alcantara', 'Perez', '202020921@tese.edu.mx', 'alancitolalito@yahoo.com.mx', '', 'Sistemas Computacionales', 'No Asignado'),
(7, '', 'Alan Jaziel', 'Avila', 'Hernandez', '202020347@tese.edu.mx', 'alanavila1fm@gmail.com', '', 'Sistemas Computacionales', 'Asignado'),
(8, '', 'Arturo', 'Hernández', 'Martínez', '202020600@tese.edu.mx', 'jeteximon55555@hotmail.com', '', 'Sistemas Computacionales', 'Asignado'),
(9, '', 'César Enrique', 'Manriquez', 'Torres', '202020466@tese.edu.mx', 'cesar.manto.02@gmail.com', '', 'Sistemas Computacionales', 'No Asignado'),
(10, '', 'Clemente Daniel', 'Morales', 'González', '202121619@tese.edu.mx', 'clememora596@gmail.com', '', 'Sistemas Computacionales', 'No Asignado'),
(11, '', 'Daniel alejandro', 'Flores', 'islas', '202120030@tese.edu.mx', 'da9832639@gmail.com', '', 'Informática', 'Asignado'),
(12, '', 'Ana María', 'Cedeño', 'Pérez', '201721270@tese.edu.mx', 'mary.perez180297@gmail.com', '', 'Informática', 'Asignado'),
(13, '', 'Julia Adriana', 'Gaona', 'Lopez', '202121364@tese.edu.mx', 'julieejanee2003@gmail.com', '', 'Informática', 'No Asignado'),
(14, '', 'Marlenne', 'Quiroz', 'becerra', '201910217@tese.edu.mx', 'marlenne.quiroz@hotmail.com', '', 'Sistemas Computacionales', 'No Asignado'),
(15, '', 'JOSHAJANY YAMILET', 'HERNANDEZ', 'MENDEZ', 'HEMJ201920025@tese.edu.mx', 'yami2001hernandez@gmail.com', '', 'Sistemas Computacionales', 'Asignado'),
(16, '', 'Fernando', 'Molina', 'Uribe', '201910384@tese.edu.mx', 'fer.160200@gmail.com', '', 'Informática', 'No Asignado'),
(17, '201930215', 'Estudiante de Prueba', 'Prueba 1', 'Prueba 2', 'prueba@tese.edu.mx', 'prueba@gmail.com', '5645789956', 'Química, Bioquímica', 'No Asignado'),
(18, '20201546789', 'Prueba2', 'Apellido 1', 'Apellido 2', 'prueba2.apellido1@tese.edu.mx', 'prueba2@gmail.com', '5545784696', 'Mecánica, Mecatrónica, Industrial', 'Asignado'),
(19, '202113456', 'Prueba3', 'Apellido 3', 'Apellido 4', 'apellido3@tese.edu.mx', 'apellido.nombre@gmail.com', '4555444455', 'Química, Bioquímica', 'Asignado');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estudiante_programa`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `estudiante_programa`;
CREATE TABLE IF NOT EXISTS `estudiante_programa` (
`correo` varchar(60)
,`correo_adicional` varchar(60)
,`division` varchar(60)
,`estatus` varchar(15)
,`estatus_programa` varchar(45)
,`fecha_fin` date
,`fecha_inicio` date
,`id_estudiante` int(11)
,`matricula` varchar(45)
,`nombre` varchar(137)
,`semestre` varchar(10)
,`telefono` varchar(45)
,`tipo` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigador`
--

DROP TABLE IF EXISTS `investigador`;
CREATE TABLE IF NOT EXISTS `investigador` (
  `id_investigador` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'El título del investigador: Dr. Mtro, M. en C., M. en I.S.C., M.A.D.N., Ing. Lic., C.P., etc',
  `nombres` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_1` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_2` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estatus` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_investigador`,`correo`),
  UNIQUE KEY `id_investigador_UNIQUE` (`id_investigador`),
  UNIQUE KEY `correo_UNIQUE` (`correo`),
  KEY `fk_investigador_usuario_idx` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `investigador`
--

INSERT INTO `investigador` (`id_investigador`, `titulo`, `nombres`, `apellido_1`, `apellido_2`, `correo`, `telefono`, `estatus`) VALUES
(2, 'Dr', 'Francisco Jacob', 'Avila', 'Camacho', 'fjacobavila@tese.edu.mx', '5554562870', 'Activo'),
(3, 'Dr.', 'Adolfo', 'Meléndez', 'Ramírez', 'adolfo_melendez@tese.edu.mx', '5555555555', 'Activo'),
(4, 'M en ISC', 'Leonardo Miguel', 'Moreno', 'Villalba', 'lmoreno@tese.edu.mx', '5563175019', 'Activo'),
(5, 'MADN', 'Juan Manuel', 'Stein', 'Carrillo', 'jmsteinc@tese.edu.mx', '5525587973', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

DROP TABLE IF EXISTS `participante`;
CREATE TABLE IF NOT EXISTS `participante` (
  `proyecto_id_proyecto` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `correo_estudiante` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_programa` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`proyecto_id_proyecto`,`id_estudiante`,`correo_estudiante`,`tipo_programa`),
  KEY `fk_Participante_programa1_idx` (`id_estudiante`,`correo_estudiante`,`tipo_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`proyecto_id_proyecto`, `id_estudiante`, `correo_estudiante`, `tipo_programa`) VALUES
(6, 1, '201911108@tese.edu.mx', 'Residencias'),
(5, 2, '201820438@tese.edu.mx', 'Residencias'),
(5, 3, '202120243@tese.edu.mx', 'Servicio Social'),
(6, 4, '202120206@tese.edu.mx', 'Servicio Social'),
(6, 5, 'gagc202011257', 'Servicio Social'),
(5, 7, '202020347@tese.edu.mx', 'Servicio Social'),
(6, 8, '202020600@tese.edu.mx', 'Servicio Social'),
(5, 11, '202120030@tese.edu.mx', 'Servicio Social'),
(6, 12, '201721270@tese.edu.mx', 'Servicio Social'),
(6, 15, 'HEMJ201920025@tese.edu.mx', 'Residencias'),
(5, 18, 'prueba2.apellido1@tese.edu.mx', 'Residencias'),
(6, 19, 'apellido3@tese.edu.mx', 'Servicio Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_estancia`
--

DROP TABLE IF EXISTS `participante_estancia`;
CREATE TABLE IF NOT EXISTS `participante_estancia` (
  `id_proyecto` int(11) NOT NULL,
  `id_estancia` int(11) NOT NULL,
  `id_estancia_residente` int(11) NOT NULL,
  `correo_residente_estancia` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proyecto`,`id_estancia`,`id_estancia_residente`,`correo_residente_estancia`),
  KEY `fk_participante_estancia_estancia1_idx` (`id_estancia`,`id_estancia_residente`,`correo_residente_estancia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `participante_proyecto`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `participante_proyecto`;
CREATE TABLE IF NOT EXISTS `participante_proyecto` (
`correo` varchar(60)
,`division` varchar(60)
,`estatus_estudiante` varchar(15)
,`estatus_programa` varchar(45)
,`fecha_fin` date
,`fecha_inicio` date
,`id_estudiante` int(11)
,`id_proyecto` int(11)
,`matricula` varchar(45)
,`nombre` varchar(137)
,`programa` varchar(45)
,`semestre` varchar(10)
,`telefono` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

DROP TABLE IF EXISTS `programa`;
CREATE TABLE IF NOT EXISTS `programa` (
  `id_estudiante` int(11) NOT NULL,
  `estudiante_correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'tipo: servicio social o residencias',
  `estatus` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'estatus del programa en el que está el estudiante: activo, concluido o canelado',
  `semestre` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_estudiante`,`estudiante_correo`,`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_estudiante`, `estudiante_correo`, `tipo`, `estatus`, `semestre`, `fecha_inicio`, `fecha_fin`) VALUES
(1, '201911108@tese.edu.mx', 'Residencias', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(2, '201820438@tese.edu.mx', 'Residencias', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(3, '202120243@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(4, '202120206@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(5, 'gagc202011257', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(6, '202020921@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(7, '202020347@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(8, '202020600@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(9, '202020466@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(10, '202121619@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(11, '202120030@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(12, '201721270@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(13, '202121364@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(14, '201910217@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(15, 'HEMJ201920025@tese.edu.mx', 'Residencias', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(16, '201910384@tese.edu.mx', 'Residencias', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(17, 'prueba@tese.edu.mx', '', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(18, 'prueba2.apellido1@tese.edu.mx', 'Residencias', 'Activo', '2024-1', '2024-02-26', '2024-07-12'),
(19, 'apellido3@tese.edu.mx', 'Servicio Social', 'Activo', '2024-1', '2024-02-26', '2024-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_esp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `objetivo` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci,
  `coordinador_id_investigador` int(11) NOT NULL,
  `coordinador_correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `estatus` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'pendiente, activo, concluido, cancelado',
  `imagen` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_proyecto`),
  KEY `fk_proyecto_investigador1_idx` (`coordinador_id_investigador`,`coordinador_correo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `titulo_esp`, `objetivo`, `descripcion`, `coordinador_id_investigador`, `coordinador_correo`, `fecha_inicio`, `estatus`, `imagen`, `fecha_registro`, `fecha_fin`) VALUES
(5, 'Implementación de un sistema inteligente para la planeación de rutas en vehículos autónomos robotizados con misiones específicas', 'Implementar un sistema inteligente', 'Descripción\r\nActividades de acuerdo con la metodología\r\n1. Esto', 3, 'adolfo_melendez@tese.edu.mx', '2024-02-14', 'Activo', '', '2024-02-01 19:07:47', '0000-00-00'),
(6, 'Diseño e implementación de un sistema inteligente para la planeación de rutas en vehículos autónomos robotizados con misiones específicas', 'Diseñar un sistema de planeación', 'Diseñar, implementar y probar', 2, 'fjacobavila@tese.edu.mx', '2024-02-15', 'Activo', '', '2024-02-02 23:42:47', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

DROP TABLE IF EXISTS `semestre`;
CREATE TABLE IF NOT EXISTS `semestre` (
  `nombre` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`nombre`, `fecha_inicio`, `fecha_fin`) VALUES
('2024-1', '2024-02-26', '2024-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Tipo de usuario: investigador, estudiante o estancia',
  `foto` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estatus` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`correo`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `password`, `tipo`, `foto`, `estatus`) VALUES
('201721270@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('201820438@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('201910217@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('201910384@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('201911108@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202020347@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202020466@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202020600@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202020921@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202120030@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202120206@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202120243@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202121364@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('202121619@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('adolfo_melendez@tese.edu.mx', '12345678', 'Investigador', NULL, 'Activo'),
('apellido3@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('fjacobavila@tese.edu.mx', '12345678', 'Investigador', NULL, 'Activo'),
('gagc202011257', '12345678', 'Estudiante', '', 'Activo'),
('HEMJ201920025@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('jmsteinc@tese.edu.mx', '12345678', 'Investigador', NULL, 'Activo'),
('lmoreno@tese.edu.mx', '12345678', 'Investigador', NULL, 'Activo'),
('prueba@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo'),
('prueba2.apellido1@tese.edu.mx', '12345678', 'Estudiante', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarioestancia`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuarioestancia`;
CREATE TABLE IF NOT EXISTS `usuarioestancia` (
`apellido_1` varchar(45)
,`apellido_2` varchar(45)
,`correo` varchar(60)
,`correo_adicional` varchar(60)
,`estatus` varchar(15)
,`foto` varchar(255)
,`id_estancia_residente` int(11)
,`nombres` varchar(45)
,`password` varchar(45)
,`telefono` varchar(45)
,`tipo` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarioestudiante`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuarioestudiante`;
CREATE TABLE IF NOT EXISTS `usuarioestudiante` (
`apellido_1` varchar(45)
,`apellido_2` varchar(45)
,`correo` varchar(60)
,`correo_adicional` varchar(60)
,`division` varchar(60)
,`estatus` varchar(15)
,`foto` varchar(255)
,`id_estudiante` int(11)
,`matricula` varchar(45)
,`nombres` varchar(45)
,`password` varchar(45)
,`telefono` varchar(45)
,`tipo` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarioinvestigador`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuarioinvestigador`;
CREATE TABLE IF NOT EXISTS `usuarioinvestigador` (
`apellido_1` varchar(45)
,`apellido_2` varchar(45)
,`correo` varchar(60)
,`estatus` varchar(15)
,`foto` varchar(255)
,`id_investigador` int(11)
,`nombres` varchar(45)
,`password` varchar(45)
,`telefono` varchar(45)
,`tipo` varchar(15)
,`titulo` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `colaborador_proyecto`
--
DROP TABLE IF EXISTS `colaborador_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `colaborador_proyecto`  AS  select `c`.`id_colaborador` AS `id_colaborador`,`c`.`id_proyecto` AS `id_proyecto`,`c`.`id_investigador` AS `id_investigador`,`c`.`correo_investigador` AS `correo`,`i`.`titulo` AS `titulo`,concat(`i`.`nombres`,' ',`i`.`apellido_1`,' ',`i`.`apellido_2`) AS `nombre`,`i`.`telefono` AS `telefono`,`i`.`estatus` AS `estatus` from (`colaborador` `c` join `investigador` `i` on(((`c`.`id_investigador` = `i`.`id_investigador`) and (`c`.`correo_investigador` = `i`.`correo`)))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `detalles_proyecto`
--
DROP TABLE IF EXISTS `detalles_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalles_proyecto`  AS  select `p`.`id_proyecto` AS `id_proyecto`,`p`.`titulo_esp` AS `titulo`,`p`.`objetivo` AS `objetivo`,`p`.`descripcion` AS `descripcion`,`p`.`coordinador_id_investigador` AS `coordinador_id_investigador`,`p`.`coordinador_correo` AS `coordinador_correo`,`p`.`fecha_inicio` AS `fecha_inicio`,`p`.`fecha_registro` AS `fecha_registro`,`p`.`imagen` AS `imagen`,`p`.`estatus` AS `estatus`,`p`.`fecha_fin` AS `fecha_fin`,`i`.`titulo` AS `titulo_inv`,concat(`i`.`nombres`,' ',`i`.`apellido_1`,' ',`i`.`apellido_2`) AS `coordinador`,`i`.`telefono` AS `telefono`,`i`.`estatus` AS `estatus_inv` from (`proyecto` `p` join `investigador` `i` on(((`p`.`coordinador_id_investigador` = `i`.`id_investigador`) and (`p`.`coordinador_correo` = `i`.`correo`)))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `estancia_proyecto`
--
DROP TABLE IF EXISTS `estancia_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estancia_proyecto`  AS  select `pe`.`id_proyecto` AS `id_proyecto`,`pe`.`id_estancia` AS `id_estancia`,`pe`.`id_estancia_residente` AS `id_estancia_residente`,`er`.`correo` AS `correo`,`e`.`estatus` AS `estatus`,`e`.`fecha_inicio` AS `fecha_inicio`,`e`.`fecha_fin` AS `fecha_fin`,`e`.`procedencia` AS `procedencia`,`e`.`patrocinador` AS `patrocinador`,concat(`er`.`nombres`,' ',`er`.`apellido_1`,' ',`er`.`apellido_2`) AS `nombre`,`er`.`telefono` AS `telefono`,`er`.`estatus` AS `estatus_residente` from ((`participante_estancia` `pe` join `estancia` `e`) join `estancia_residente` `er`) where ((`pe`.`id_estancia` = `e`.`id_estancia`) and (`pe`.`id_estancia_residente` = `e`.`id_estancia_residente`) and (`pe`.`correo_residente_estancia` = `e`.`residente_correo`) and (`e`.`id_estancia_residente` = `er`.`id_estancia_residente`) and (`e`.`residente_correo` = `er`.`correo`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `estudiante_programa`
--
DROP TABLE IF EXISTS `estudiante_programa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estudiante_programa`  AS  select `e`.`id_estudiante` AS `id_estudiante`,`e`.`matricula` AS `matricula`,concat(`e`.`nombres`,' ',`e`.`apellido_1`,' ',`e`.`apellido_2`) AS `nombre`,`e`.`correo` AS `correo`,`e`.`correo_adicional` AS `correo_adicional`,`e`.`telefono` AS `telefono`,`e`.`division` AS `division`,`e`.`estatus` AS `estatus`,`p`.`tipo` AS `tipo`,`p`.`estatus` AS `estatus_programa`,`p`.`semestre` AS `semestre`,`p`.`fecha_inicio` AS `fecha_inicio`,`p`.`fecha_fin` AS `fecha_fin` from (`estudiante` `e` join `programa` `p` on(((`e`.`id_estudiante` = `p`.`id_estudiante`) and (`e`.`correo` = `p`.`estudiante_correo`)))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `participante_proyecto`
--
DROP TABLE IF EXISTS `participante_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `participante_proyecto`  AS  select `p`.`proyecto_id_proyecto` AS `id_proyecto`,`p`.`id_estudiante` AS `id_estudiante`,`e`.`correo` AS `correo`,`p`.`tipo_programa` AS `programa`,`pr`.`estatus` AS `estatus_programa`,`pr`.`semestre` AS `semestre`,`pr`.`fecha_inicio` AS `fecha_inicio`,`pr`.`fecha_fin` AS `fecha_fin`,`e`.`matricula` AS `matricula`,concat(`e`.`nombres`,' ',`e`.`apellido_1`,' ',`e`.`apellido_2`) AS `nombre`,`e`.`telefono` AS `telefono`,`e`.`division` AS `division`,`e`.`estatus` AS `estatus_estudiante` from ((`participante` `p` join `programa` `pr`) join `estudiante` `e`) where ((`p`.`id_estudiante` = `pr`.`id_estudiante`) and (`p`.`correo_estudiante` = `pr`.`estudiante_correo`) and (`p`.`tipo_programa` = `pr`.`tipo`) and (`pr`.`id_estudiante` = `e`.`id_estudiante`) and (`pr`.`estudiante_correo` = `e`.`correo`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarioestancia`
--
DROP TABLE IF EXISTS `usuarioestancia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarioestancia`  AS  select `i`.`id_estancia_residente` AS `id_estancia_residente`,`i`.`correo` AS `correo`,`i`.`nombres` AS `nombres`,`i`.`apellido_1` AS `apellido_1`,`i`.`apellido_2` AS `apellido_2`,`i`.`correo_adicional` AS `correo_adicional`,`i`.`telefono` AS `telefono`,`i`.`estatus` AS `estatus`,`u`.`password` AS `password`,`u`.`tipo` AS `tipo`,`u`.`foto` AS `foto` from (`estancia_residente` `i` join `usuario` `u` on((`i`.`correo` = `u`.`correo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarioestudiante`
--
DROP TABLE IF EXISTS `usuarioestudiante`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarioestudiante`  AS  select `e`.`id_estudiante` AS `id_estudiante`,`e`.`correo` AS `correo`,`e`.`matricula` AS `matricula`,`e`.`nombres` AS `nombres`,`e`.`apellido_1` AS `apellido_1`,`e`.`apellido_2` AS `apellido_2`,`e`.`correo_adicional` AS `correo_adicional`,`e`.`telefono` AS `telefono`,`e`.`division` AS `division`,`e`.`estatus` AS `estatus`,`u`.`password` AS `password`,`u`.`tipo` AS `tipo`,`u`.`foto` AS `foto` from (`estudiante` `e` join `usuario` `u` on((`e`.`correo` = `u`.`correo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarioinvestigador`
--
DROP TABLE IF EXISTS `usuarioinvestigador`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarioinvestigador`  AS  select `i`.`id_investigador` AS `id_investigador`,`i`.`correo` AS `correo`,`i`.`titulo` AS `titulo`,`i`.`nombres` AS `nombres`,`i`.`apellido_1` AS `apellido_1`,`i`.`apellido_2` AS `apellido_2`,`i`.`telefono` AS `telefono`,`i`.`estatus` AS `estatus`,`u`.`password` AS `password`,`u`.`tipo` AS `tipo`,`u`.`foto` AS `foto` from (`investigador` `i` join `usuario` `u` on((`i`.`correo` = `u`.`correo`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_estancia`
--
ALTER TABLE `actividad_estancia`
  ADD CONSTRAINT `fk_actividad_estancia_participante_estancia1` FOREIGN KEY (`id_proyecto`,`id_estancia`,`id_estancia_residente`,`correo_residente_estancia`) REFERENCES `participante_estancia` (`id_proyecto`, `id_estancia`, `id_estancia_residente`, `correo_residente_estancia`);

--
-- Filtros para la tabla `actividad_participante`
--
ALTER TABLE `actividad_participante`
  ADD CONSTRAINT `fk_actividad_participante_Participante1` FOREIGN KEY (`id_proyecto`,`id_estudiante`,`correo_estudiante`,`tipo_programa`) REFERENCES `participante` (`proyecto_id_proyecto`, `id_estudiante`, `correo_estudiante`, `tipo_programa`);

--
-- Filtros para la tabla `asistencia_registro`
--
ALTER TABLE `asistencia_registro`
  ADD CONSTRAINT `fk_asistencia_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `asistencia_registro_horas`
--
ALTER TABLE `asistencia_registro_horas`
  ADD CONSTRAINT `fk_actividad_asistencia1` FOREIGN KEY (`usuario_correo`,`fecha`) REFERENCES `asistencia_registro` (`usuario_correo`, `fecha`);

--
-- Filtros para la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `fk_colaborador_investigador1` FOREIGN KEY (`id_investigador`,`correo_investigador`) REFERENCES `investigador` (`id_investigador`, `correo`),
  ADD CONSTRAINT `fk_colaborador_proyecto1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `documentacion_programa`
--
ALTER TABLE `documentacion_programa`
  ADD CONSTRAINT `fk_documentacion_programa_programa1` FOREIGN KEY (`id_estudiante`,`correo_estudiante`,`programa_tipo`) REFERENCES `programa` (`id_estudiante`, `estudiante_correo`, `tipo`);

--
-- Filtros para la tabla `estancia`
--
ALTER TABLE `estancia`
  ADD CONSTRAINT `fk_estancia_estancia_residente1` FOREIGN KEY (`id_estancia_residente`,`residente_correo`) REFERENCES `estancia_residente` (`id_estancia_residente`, `correo`);

--
-- Filtros para la tabla `estancia_residente`
--
ALTER TABLE `estancia_residente`
  ADD CONSTRAINT `fk_estancia_usuario1` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_usuario1` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `investigador`
--
ALTER TABLE `investigador`
  ADD CONSTRAINT `fk_investigador_usuario` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `fk_Participante_programa1` FOREIGN KEY (`id_estudiante`,`correo_estudiante`,`tipo_programa`) REFERENCES `programa` (`id_estudiante`, `estudiante_correo`, `tipo`),
  ADD CONSTRAINT `fk_Participante_proyecto1` FOREIGN KEY (`proyecto_id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `participante_estancia`
--
ALTER TABLE `participante_estancia`
  ADD CONSTRAINT `fk_participante_estancia_estancia1` FOREIGN KEY (`id_estancia`,`id_estancia_residente`,`correo_residente_estancia`) REFERENCES `estancia` (`id_estancia`, `id_estancia_residente`, `residente_correo`),
  ADD CONSTRAINT `fk_participante_estancia_proyecto1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `fk_programa_estudiante1` FOREIGN KEY (`id_estudiante`,`estudiante_correo`) REFERENCES `estudiante` (`id_estudiante`, `correo`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_proyecto_investigador1` FOREIGN KEY (`coordinador_id_investigador`,`coordinador_correo`) REFERENCES `investigador` (`id_investigador`, `correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
