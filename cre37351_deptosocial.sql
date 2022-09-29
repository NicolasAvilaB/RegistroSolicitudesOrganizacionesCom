-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-09-2022 a las 08:46:57
-- Versión del servidor: 5.7.30-cll-lve
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cre37351_deptosocial`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Registro_Organ` (IN `a` VARCHAR(100))  NO SQL
delete from registro_organ where Rut = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Sector` (IN `a` VARCHAR(80))  NO SQL
delete from peralillo_sectores where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Sesion` (IN `a` VARCHAR(60))  NO SQL
delete from historial_sesiones where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Solicitud` (IN `a` VARCHAR(200), IN `bb` VARCHAR(200))  NO SQL
BEGIN
DECLARE a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13 VARCHAR(200);
DECLARE accion INT DEFAULT 0;
DECLARE traza1 CURSOR FOR SELECT * FROM solicitudes WHERE ID = a;
DECLARE CONTINUE HANDLER FOR SQLSTATE '20000' SET accion = 1;
OPEN traza1;
REPEAT
   FETCH traza1 INTO a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13;
insert into historial_solicitud values(a1,a2,bb,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13);
delete from solicitudes where ID = a;
UNTIL accion END REPEAT;
CLOSE traza1;
END$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Solicitud_Anterior` (IN `a` VARCHAR(100))  NO SQL
delete from historial_solicitud where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Tipo_Org` (IN `a` VARCHAR(100))  NO SQL
delete from tipo_org where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Borrar_Usuario` (IN `a` VARCHAR(70))  NO SQL
delete from admin where Identificador = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_AnteriorSoli` (IN `a` VARCHAR(200))  NO SQL
select * from historial_solicitud where Organizacion like a or Tipo_Solicitud like a or Direccion like a or Sector like a or Descripcion like a or Estado like a or Observacion like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Correos_Externos` ()  NO SQL
select * from correos_externos$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Correos_Solicitud` ()  NO SQL
select Email from admin$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_ID` (IN `a` VARCHAR(45))  NO SQL
select * from admin where Identificador = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_ID_Sectores` (IN `a` VARCHAR(80))  NO SQL
select * from peralillo_sectores where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_ID_Solicitud` (IN `a` VARCHAR(100))  NO SQL
SELECT ID, Estado, Fecha_Hasta, Observacion from solicitudes where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_ID_Tipo_Org` (IN `a` VARCHAR(100))  NO SQL
select * from tipo_org where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Inicio_Sesion` (IN `a` VARCHAR(200))  NO SQL
SELECT * from historial_sesiones where Usuario like a or Hora_Inicio like a or Fecha_Inicio like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_LimiteFecha` ()  NO SQL
SELECT Descripcion, Fecha_Hasta from solicitudes$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Organizacion` (IN `a` VARCHAR(100))  NO SQL
select * from tipo_org where Organizacion like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Registro_Organizacion` (IN `a` VARCHAR(200))  NO SQL
select * from registro_organ where Nombre_Organizacion like a or Tipo_Organizacion like a or Direccion like a or Clasificacion_Organizacion like a or Estado_Directiva like a or Sector like a or Rut like a or Telefono like a or Telefono2 like a or Telefono3 like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Registro_Personal` (IN `a` VARCHAR(100))  NO SQL
select * from admin where Usuario like a or Email like a or Tipo_Usuario like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Rut_Registro_Org` (IN `a` VARCHAR(100))  NO SQL
select * from registro_organ where Rut = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Sectores` (IN `a` VARCHAR(80))  NO SQL
select * from peralillo_sectores where Sectores like a or SubSectores like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Solicitudes` (IN `a` VARCHAR(200))  NO SQL
select * from solicitudes where Nombre_Organizacion like a or Tipo_Solicitud like a or Direccion like a or Sector like a or Descripcion like a or Estado like a or Observacion like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Buscar_Solo_ID_Solicitud` (IN `a` VARCHAR(200))  NO SQL
SELECT * FROM solicitudes where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Cerrar_Sesion` (IN `a` VARCHAR(40), IN `b` DATE, IN `c` VARCHAR(100), IN `d` INT(11))  NO SQL
Update historial_sesiones set Hora_Cierre = a, Fecha_Cierre = b, Usuario = c where ID = d$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consultar_Email_Admin` (IN `a` VARCHAR(200))  NO SQL
SELECT Email FROM admin WHERE Email = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Clave_Admin` (IN `a` VARCHAR(100))  NO SQL
SELECT Clave FROM admin WHERE Clave = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_ID` ()  NO SQL
select max(ID)as ID from historial_sesiones$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_ID_Admin` ()  NO SQL
select max(ID)as ID from admin$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Nombre_Admin` (IN `a` VARCHAR(100))  NO SQL
SELECT Usuario FROM admin WHERE Usuario = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Organizacion` ()  NO SQL
select Organizacion from tipo_org$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Rut` (IN `a` VARCHAR(45))  NO SQL
select Rut from registro_organ where Rut = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Sector` (IN `a` VARCHAR(150))  NO SQL
select Sector from registro_organ where CONCAT(Tipo_Organizacion, ' ',Nombre_Organizacion) = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Sectores` ()  NO SQL
select Sectores, SubSectores from peralillo_sectores$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Solicitud` (IN `a` VARCHAR(200))  NO SQL
select Fecha_Ingreso, Nombre_Organizacion, Direccion, Sector, Descripcion, Tipo_Solicitud, Latitud, Longitud, Estado, Fecha_Desde, Fecha_Hasta, Observacion from solicitudes where Fecha_Ingreso = a or Nombre_Organizacion like a or Direccion like a or Sector like a or Descripcion like a or Tipo_Solicitud like a or Estado like a or Fecha_Desde = a or Fecha_Hasta = a or Observacion like a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Consulta_Tipo_Usuario` (IN `a` VARCHAR(100), IN `b` VARCHAR(100))  NO SQL
select Tipo_Usuario from admin where Usuario = a and Clave = b$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingresar_Organizacion` (IN `a` VARCHAR(13), IN `b` VARCHAR(200), IN `c` VARCHAR(100), IN `d` VARCHAR(200), IN `e` VARCHAR(200), IN `e2` VARCHAR(200), IN `e3` VARCHAR(200), IN `e4` VARCHAR(200), IN `e5` VARCHAR(200), IN `f` DATE, IN `g` VARCHAR(20), IN `h` VARCHAR(20), IN `i` VARCHAR(100))  NO SQL
insert into registro_organ (Rut, Nombre_Organizacion, Tipo_Organizacion, Direccion, Telefono, Telefono2, Telefono3, Telefono4, Telefono5, Fecha, Clasificacion_Organizacion, Estado_Directiva, Sector) values(a,b,c,d,e,e2,e3,e4,e5,f,g,h,i)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingresar_Sectores` (IN `a` VARCHAR(80), IN `b` VARCHAR(80), IN `c` VARCHAR(80))  NO SQL
insert into peralillo_sectores (ID, Sectores,SubSectores) VALUES(a,b,c)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingresar_Solicitud` (IN `o` VARCHAR(100), IN `a` DATE, IN `b` VARCHAR(100), IN `c` VARCHAR(100), IN `d` VARCHAR(100), IN `e` VARCHAR(300), IN `f` VARCHAR(25), IN `g` VARCHAR(45), IN `h` VARCHAR(45), IN `i` VARCHAR(25), IN `j` DATE, IN `k` DATE, IN `l` VARCHAR(300))  NO SQL
insert into solicitudes (ID,Fecha_Ingreso, Nombre_Organizacion, Direccion, Sector, Descripcion, Tipo_Solicitud, Latitud, Longitud, Estado, Fecha_Desde, Fecha_Hasta, Observacion) 
values(o,a,b,c,d,e,f,g,h,i,j,k,l)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingresar_Solicitud_Antigua` (IN `a` VARCHAR(200), IN `b` DATE, IN `c` DATE, IN `d` VARCHAR(100), IN `e` VARCHAR(100), IN `f` VARCHAR(100), IN `g` VARCHAR(300), IN `h` VARCHAR(25), IN `i` VARCHAR(45), IN `j` VARCHAR(45), IN `k` VARCHAR(25), IN `l` DATE, IN `m` DATE, IN `n` VARCHAR(300))  NO SQL
insert into historial_solicitud (ID, Fecha_Ingreso_Solicitud, Fecha_Eliminacion_Solicitud, Organizacion, Direccion, Sector, Descripcion, Tipo_Solicitud, Latitud, Longitud, Estado, Fecha_Desde, Fecha_Hasta, Observacion)
values(a,b,c,d,e,f,g,h,i,j,k,l,m,n)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingresar_Tipo_Org` (IN `a` VARCHAR(100), IN `b` VARCHAR(100))  NO SQL
insert into tipo_org (ID, Organizacion) VALUES(a,b)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingresar_Usuario` (IN `a` VARCHAR(40), IN `b` VARCHAR(100), IN `c` VARCHAR(100), IN `d` VARCHAR(45), IN `e` VARCHAR(100))  NO SQL
insert into admin (Identificador, Usuario, Clave, Tipo_Usuario, Email) values(a,b,c,d,e)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Ingreso_Sesion` (IN `d` VARCHAR(100), IN `a` VARCHAR(100), IN `b` VARCHAR(80), IN `c` DATE)  NO SQL
insert into historial_sesiones (ID, Usuario, Hora_Inicio, Fecha_Inicio) VALUES(d,a,b,c)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Insertar_Correos_Externos` (IN `a` VARCHAR(200), IN `b` VARCHAR(200))  NO SQL
insert into correos_externos VALUES (a,b)$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Login` (IN `a` VARCHAR(60), IN `b` VARCHAR(60))  NO SQL
select Usuario, Clave from admin where Usuario = a and Clave = b$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Modificar_Organizacion` (IN `b` VARCHAR(100), IN `a` VARCHAR(100))  NO SQL
UPDATE tipo_org SET Organizacion = b WHERE ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Modificar_Registro_Organizacion` (IN `b` VARCHAR(200), IN `c` VARCHAR(100), IN `d` VARCHAR(200), IN `e` VARCHAR(200), IN `e2` VARCHAR(200), IN `e3` VARCHAR(200), IN `e4` VARCHAR(200), IN `e5` VARCHAR(200), IN `f` DATE, IN `g` VARCHAR(20), IN `h` VARCHAR(20), IN `i` VARCHAR(100), IN `a` VARCHAR(13))  NO SQL
update registro_organ set 
Nombre_Organizacion = b, 
Tipo_Organizacion = c,
Direccion = d, 
Telefono = e, 
Telefono2 = e2,
Telefono3 = e3,
Telefono4 = e4,
Telefono5 = e5,
Fecha = f, 
Clasificacion_Organizacion = g, 
Estado_Directiva = h, 
Sector = i
where Rut = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Modificar_Sectores` (IN `b` VARCHAR(100), IN `c` VARCHAR(100), IN `a` VARCHAR(100))  NO SQL
update peralillo_sectores set
Sectores = b,
SubSectores = c
where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Modificar_Solicitud` (IN `b` VARCHAR(300), IN `c` VARCHAR(300), IN `d` VARCHAR(300), IN `a` VARCHAR(300))  NO SQL
UPDATE solicitudes SET Estado = b, Fecha_Hasta = c, Observacion = d where ID = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Modificar_Usuario` (IN `b` VARCHAR(100), IN `c` VARCHAR(100), IN `d` VARCHAR(100), IN `e` VARCHAR(100), IN `a` VARCHAR(100))  NO SQL
update admin set 
Usuario = b,
Clave = c, 
Tipo_Usuario = d, 
Email = e 
where Identificador = a$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `MostrarAdmin` ()  NO SQL
select * from admin$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Mostrar_Nombre_Tipo_Org` ()  NO SQL
select Tipo_Organizacion, Nombre_Organizacion from registro_organ$$

CREATE DEFINER=`cre37351`@`localhost` PROCEDURE `Recuperar_Usuario_Clave` (IN `a` VARCHAR(100))  NO SQL
select Usuario, Clave, Tipo_Usuario, Email from admin where Usuario = a or Email = a$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Identificador` varchar(40) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Clave` varchar(100) NOT NULL,
  `Tipo_Usuario` varchar(45) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`Identificador`, `Usuario`, `Clave`, `Tipo_Usuario`, `Email`) VALUES
('ezyam4qcmmiq3sb', 'Mauricio', 'mauricio', 'Administrador', 'mauricio@muniperalillo.cl'),
('ftwp9slw72vl5vu', 'Administrador', 'peralillo2019', 'Administrador', 'roavila@muniperalillo.cl'),
('3d98d4dumqs0jwy', 'Mauricio2', 'mauricio2', 'Operario', 'mauricio@muniperalillo.cl'),
('czw0ddtgsywwvc8', 'Peralillo', 'muniperalillo2020', 'Administrador', 'nicolasab1996@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos_externos`
--

CREATE TABLE `correos_externos` (
  `Correo` varchar(200) NOT NULL,
  `ID_Solicitud` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_sesiones`
--

CREATE TABLE `historial_sesiones` (
  `ID` varchar(80) NOT NULL,
  `Usuario` varchar(80) NOT NULL,
  `Hora_Inicio` varchar(80) NOT NULL,
  `Fecha_Inicio` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_sesiones`
--

INSERT INTO `historial_sesiones` (`ID`, `Usuario`, `Hora_Inicio`, `Fecha_Inicio`) VALUES
('s6y0hyt6g7ogdau', 'Domenica', '16:20:11', '2019-03-10'),
('jrnvpm0k8cn545p', 'Domenica', '09:30:51', '2019-03-11'),
('wn9gw1gg3y1dle6', 'Domenica', '11:09:49', '2019-03-11'),
('pfd5r2c2wxzvvwg', 'Domenica', '11:12:52', '2019-03-11'),
('24rmtr6uh9842i8', 'Domenica', '08:46:19', '2019-03-12'),
('xcmjx4q40f4yxc1', 'Domenica', '09:41:04', '2019-03-12'),
('6t0s3dptm3j4skm', 'Domenica', '12:21:39', '2019-03-12'),
('bc3o1whfzwo4ct6', 'Domenica', '14:28:16', '2019-03-12'),
('en9766iwo9v9fp7', 'Domenica', '16:09:05', '2019-03-12'),
('riqqb5bvqzgxaud', 'Domenica', '16:18:14', '2019-03-12'),
('ske7rci1obtdmo2', 'Domenica', '17:11:51', '2019-03-12'),
('4nqbdenvilp9ppl', 'Domenica', '09:27:18', '2019-03-13'),
('4p5fezwqgbw8h61', 'Domenica', '10:54:07', '2019-03-13'),
('j9tzq1mo3s8qiux', 'Domenica', '11:33:49', '2019-03-13'),
('zqywa8epp9e6qk6', 'Domenica', '14:41:29', '2019-03-13'),
('0febbnlneeys6st', 'Domenica', '00:01:20', '2019-03-14'),
('pgb03n91o6mwhmq', 'Domenica', '09:02:54', '2019-03-14'),
('zy2b2n7mn7ulkls', 'Domenica', '10:50:43', '2019-03-14'),
('0h9szrweoal68nc', 'Domenica', '14:23:01', '2019-03-14'),
('37irtcmshrvtlza', 'Domenica', '20:57:51', '2019-03-14'),
('sb8ujn530h75qm7', 'Domenica', '21:31:05', '2019-03-14'),
('kqrot057nsp5ow6', 'Domenica', '08:49:52', '2019-03-15'),
('uxt5le92md5sf6c', 'Domenica', '14:07:47', '2019-03-15'),
('hyhu5042n3084lb', 'Domenica', '10:27:18', '2019-03-21'),
('ec7hgspycffn8bs', 'Domenica', '10:32:48', '2019-03-21'),
('4uz96c0phmsgdlv', 'Domenica', '09:10:31', '2019-03-22'),
('5we7wlpa9ef4024', 'Domenica', '09:22:55', '2019-03-22'),
('lx31m0geqeovfho', 'Tamara', '11:29:48', '2019-03-22'),
('jpa8kdrcgqwol7p', 'Tamara', '09:07:52', '2019-03-25'),
('gd9my0t7q42js2s', 'Tamara', '15:27:09', '2019-03-25'),
('dy9hfb8qreept3b', 'Tamara', '15:33:52', '2019-03-26'),
('cojp884ibocg7hd', 'Tamara', '10:51:22', '2019-03-27'),
('i4477djv7s3fbir', 'Tamara', '16:16:54', '2019-03-27'),
('re5kuum1u34jzzj', 'Tamara', '10:31:17', '2019-03-29'),
('ed0z5o5srnamodf', 'Tamara', '13:04:08', '2019-03-29'),
('syrl4va0jqhwphv', 'Tamara', '13:55:33', '2019-03-29'),
('7o5c4fbuoejlu5r', 'Tamara', '15:02:50', '2019-03-29'),
('dwg77bf2dae1jcd', 'Tamara', '11:49:00', '2019-04-02'),
('w21i4jccsmphjjy', 'Tamara', '11:54:42', '2019-04-02'),
('x5sr4jggm6wd82p', 'Tamara', '12:04:35', '2019-04-02'),
('laby5zb902n67zl', 'Tamara', '14:40:02', '2019-04-02'),
('dc0bp61qyj65khg', 'Tamara', '09:48:58', '2019-04-03'),
('rul632bkaogkv69', 'Tamara', '12:18:25', '2019-04-03'),
('8mlfe45ooby6zvg', 'Tamara', '09:11:18', '2019-04-04'),
('3tykb6t2eiwn7vx', 'Tamara', '12:09:35', '2019-04-05'),
('13mz0zd8tts2oet', 'Tamara', '09:21:55', '2019-04-08'),
('u69h542gr0it2a8', 'Tamara', '15:00:39', '2019-04-08'),
('p6fucmgt2lv7stz', 'Tamara', '15:24:51', '2019-04-08'),
('c8aoh28oo0q7q4p', 'Tamara', '16:14:09', '2019-04-09'),
('jfbuhh1vmsa1eoh', 'Tamara', '16:14:57', '2019-04-09'),
('zboq6fezzutpwuu', 'Tamara', '11:41:38', '2019-04-10'),
('6g1qpv6l9m3n8mr', 'Tamara', '16:43:55', '2019-04-10'),
('v760c0uohoxy5c0', 'Tamara', '17:18:23', '2019-04-11'),
('38xig2b7wz55z8f', 'Tamara', '15:25:40', '2019-04-12'),
('otgpbj633x09q0p', 'Tamara', '20:12:28', '2019-04-15'),
('pa82tvn8zjppi5v', 'Tamara', '13:08:15', '2019-04-18'),
('rkax991kbg5mxq3', 'Mauricio', '16:32:16', '2019-11-07'),
('4420tvrgk6jlq56', 'Mauricio', '15:50:16', '2019-11-07'),
('01dsl06wjou0m3n', 'Mauricio', '16:09:48', '2020-01-15'),
('lg875timqnczg7t', 'Mauricio', '16:42:11', '2020-01-15'),
('o9clxb3fx4m48rx', 'Mauricio', '11:30:04', '2021-12-13'),
('s98k4ybchovd6tm', 'Mauricio2', '11:32:58', '2021-12-13'),
('g55upyg488gqh18', 'Mauricio', '11:35:46', '2021-12-13'),
('6v2w64zg42a59sq', 'Mauricio2', '11:50:49', '2021-12-13'),
('x6k76av8rmisopq', 'Mauricio', '12:23:33', '2021-12-13'),
('ykjan4sufl213wx', 'Mauricio', '22:17:27', '2022-02-08'),
('mreheceu0suvr2y', 'Mauricio', '15:25:12', '2022-02-09'),
('018fad7bih26cbk', 'Peralillo', '15:26:26', '2022-02-09'),
('61bkjcyjz33wwmj', 'Peralillo', '15:37:11', '2022-03-07'),
('zjz4qe9d41gmktg', 'Peralillo', '15:38:47', '2022-03-07'),
('dhuukh5k0vaubm3', 'Mauricio', '12:16:24', '2022-03-08'),
('mwa0gyqkckiowxk', 'Mauricio', '12:19:02', '2022-03-08'),
('emsbsa9aa2xykw1', 'Mauricio', '14:50:45', '2022-03-09'),
('ki8ej4z4erk7x9i', 'Peralillo', '18:06:53', '2022-04-28'),
('0yjs9w2oe7pnxcr', 'Mauricio', '09:54:21', '2022-08-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_solicitud`
--

CREATE TABLE `historial_solicitud` (
  `ID` varchar(200) NOT NULL,
  `Fecha_Ingreso_Solicitud` date NOT NULL,
  `Fecha_Eliminacion_Solicitud` date NOT NULL,
  `Organizacion` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Sector` varchar(100) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Tipo_Solicitud` varchar(25) NOT NULL,
  `Latitud` varchar(45) NOT NULL,
  `Longitud` varchar(45) NOT NULL,
  `Estado` varchar(25) NOT NULL,
  `Fecha_Desde` date NOT NULL,
  `Fecha_Hasta` date NOT NULL,
  `Observacion` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peralillo_sectores`
--

CREATE TABLE `peralillo_sectores` (
  `ID` varchar(80) NOT NULL,
  `Sectores` varchar(45) NOT NULL,
  `SubSectores` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peralillo_sectores`
--

INSERT INTO `peralillo_sectores` (`ID`, `Sectores`, `SubSectores`) VALUES
('1', 'Calleuque', 'San Miguel De Calleuque'),
('2', 'Calleuque', 'Santa Blanca'),
('3', 'Calleuque', 'La Viroca'),
('4', 'Calleuque', 'Santa Victoria'),
('5', 'Los Cardos', 'Patria Nueva'),
('6', 'Los Cardos', 'El Barco'),
('7', 'Los Cardos', '21 de Mayo'),
('8', 'Rinconada de Molineros', 'Los Mayos'),
('9', 'Rinconada de Molineros', 'Rincon los Caceres'),
('10', 'Mata Redonda', 'Molineros'),
('11', 'Puquillay', 'Puquillay'),
('12', 'Poblacion', 'San Isidro La Bomba'),
('13', 'Poblacion', 'Poblacion'),
('14', 'Santa Ana', 'Santa Ana'),
('15', 'El Cortijo', 'El Cortijo'),
('16', 'Rinconada De Peralillo', 'Rinconada De Peralillo'),
('17', 'El Olivar', 'El Olivar'),
('18', 'Troya Sur', 'Troya Sur'),
('19', 'Parrones', 'Parrones'),
('20', 'Peralillo', 'Troya Centro'),
('21', 'Peralillo', 'Troya Norte'),
('22', 'Peralillo', 'Peralillo Centro'),
('23', 'Poblacion', 'Calle Arturo Prat'),
('24', 'Peralillo', 'Peralillo'),
('e3mjsonsgw55c9n', 'Calleuque', 'Calleuque'),
('mkdj48erxvbpcnw', 'Rinconada De Molineros', 'Rinconada De Molineros'),
('3wfl3h49sy13eih', 'Molineros', 'Molineros'),
('ninvl5bndbhex54', 'Peralillo', 'El Barco'),
('mmgjf2w57riuojb', 'Poblacion', 'Santa Ana'),
('cc41c4n64ru51bt', 'Peralillo', 'San Isidro La Bomba'),
('2vayxeta60yu2kf', 'Peralillo', 'El Olivar'),
('696urvveviwwsaf', 'Peralillo', 'Urbano'),
('mkxmn6bmv9zy16e', 'Poblacion', 'Villa El Esfuerzo'),
('65qid9rk6nyd2w2', 'San Isidro', 'Villa Lomas'),
('810hysrbviscf89', 'Peralillo', 'Villa San Jose Obrero'),
('iaju4kc35um7wbp', 'Lihueimo', 'San Javier'),
('9r4f9i9fwc90e88', 'Calleuque', 'El Progreso De San Miguel'),
('8g7zdp7acacr5fv', 'Peralillo', 'San Miguel'),
('hinc98q3gcikzna', 'Peralillo', 'Troya Sur'),
('ergert546', 'Los Cardos', 'Los Cardos'),
('fhjty67', 'Rinconada de Molineros', 'Rinconada de Molineros'),
('ergert546', 'Los Cardos', 'Los Cardos'),
('fhjty67', 'Rinconada de Molineros', 'Rinconada de Molineros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_organ`
--

CREATE TABLE `registro_organ` (
  `Rut` varchar(13) NOT NULL,
  `Nombre_Organizacion` varchar(200) NOT NULL,
  `Tipo_Organizacion` varchar(100) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(200) NOT NULL,
  `Telefono2` varchar(200) NOT NULL,
  `Telefono3` varchar(200) NOT NULL,
  `Telefono4` varchar(200) NOT NULL,
  `Telefono5` varchar(200) NOT NULL,
  `Fecha` date NOT NULL,
  `Clasificacion_Organizacion` varchar(20) NOT NULL,
  `Estado_Directiva` varchar(20) NOT NULL,
  `Sector` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_organ`
--

INSERT INTO `registro_organ` (`Rut`, `Nombre_Organizacion`, `Tipo_Organizacion`, `Direccion`, `Telefono`, `Telefono2`, `Telefono3`, `Telefono4`, `Telefono5`, `Fecha`, `Clasificacion_Organizacion`, `Estado_Directiva`, `Sector`) VALUES
('75970330-8', 'Edad Sin Fronteras ', 'Club Adulto Mayor', 'Colo Colo Sin Numero ', 'Presidente/a - Irma Zuñiga Guajardo 953743978', 'Secretario/a - Patricia Santis Cardenas 985333709', 'Tesorero/a - Rafael Fuentes Flores 722861042', 'Director1 - Blanca Becerra 722861042', 'Director2 - Irma Perez Guajardo 994019807 O 993647535', '1998-10-01', 'Funcionales', 'Vigente', 'Peralillo - Peralillo Centro'),
('65134870-6', 'Eterna Juventud ', 'Club Adulto Mayor', 'Colo Colo Sin Numero', 'Presidente/a - Adriana Perez Brito 962996433', 'Secretario/a - Juana Videla Nuñez 722861282', 'Tesorero/a - Patricia Salinas Perez 722861282', 'Director1 - Pedro Antonio Castro Rojas 722861282', 'Director2 - Gabriela Del Carmen Arevalo Osorio 722861282', '2001-09-05', 'Funcionales', 'Vigente', 'Peralillo - Peralillo Centro'),
('65491520-2', 'Dejando Huellas ', 'Club Adulto Mayor', 'Errazuriz Sin Numero Palmilla ', 'Presidente/a - Miguel Antonio Lecaros Garrido 974648791', 'Secretario/a - Maria Luisa Castro Orellana 994749114', 'Tesorero/a - Estercilia De Las Mercedes Vargas Garrido 997189784', 'Director1 - Imelda Narciza Huerta Parraguez 992676506', 'Director2 - Maria Dina Vargas Cornejo 997951466', '2004-10-15', 'Funcionales', 'Vigente', 'Peralillo - Peralillo Centro'),
('65494320-6', 'Corazones Alegres (poblacion) ', 'Club Adulto Mayor', 'Poblacion', 'Presidente/a - Elba Ravelo Silva 985242155', 'Secretario/a - Pedro Piña Muñoz 722940045', 'Tesorero/a - Gabriela Silva Huerta 961558020', 'Director1 - Elba Ravelo 722940045', 'Director2 - Mireya Nuñez Guerrero 722940045', '2005-02-08', 'Funcionales', 'Vigente', 'Poblacion - Calle Arturo Prat'),
('65564370-2', 'Union Comunal De Adultos Mayores ', 'Club Adulto Mayor', 'Errazuriz Sin Numero ', 'Presidente/a - Sergio Astudillo Leiva 982454509', 'Secretario/a - Maria Gladys Gonzalez 976543970', 'Tesorero/a - Gloria Soto Tobar 961134585', 'Director1 - Manuel Galvez Donoso 958815036', 'Director2 - Elba Rabello Silva 985242155', '2005-05-31', 'Funcionales', 'Vigente', 'Peralillo - Peralillo Centro'),
('65983200-3', 'Los Años Dorados ', 'Club Adulto Mayor', 'Ex Escuela Los Parrones', 'Presidente/a - Sergio Astudillo 971757496', 'Secretario/a - Elba Caceres Cruz 971750097', 'Tesorero/a - Blanca Castro Molina 994691555', 'Director1 - Luis Valenzuela Garrido 997601152', 'Director2 - Yolanda Leoiz Acevedo 974185518', '2005-11-30', 'Funcionales', 'Vigente', 'Parrones - Parrones'),
('65670710-0', 'Juan Pablo Ii', 'Club Adulto Mayor', 'Sector Santa Blanca Calleuque', 'Presidente/a - Yolanda Farias Leyton 988421515', 'Secretario/a - Maria Farias Morales 999809817', 'Tesorero/a - Josefina Farias Galvez 997489914', 'Director1 - Bernarda Leon Castro 985320104', 'Director2 - Berta Leon Castro 9884211515 ', '2005-12-07', 'Funcionales', 'Vigente', 'Calleuque - Santa Blanca'),
('65654450-3', 'Alegrias De San Francisco', 'Club Adulto Mayor', 'Sede Pob San Francisco ', 'Presidente/a - Marta Ravelo Lorca 989613768', 'Secretario/a - Miriam Cuevas Osorio 983924767', 'Tesorero/a - Margarita Caceres Arevalo 971050506', 'Director1 - Olga Hernandez Cordero 996597723', 'Director2 - Ester Tobar Morales 992706231 ', '2006-02-13', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65788000-0', 'Despertar Colchaguino', 'Club Adulto Mayor', 'Miguel De Calleuque Sin Numero ', 'Presidente/a - Petronila Orellana Gaete 997288821', 'Secretario/a - Eva Cabello Pereira 931887971', 'Tesorero/a - Rafael Perez Abarca 991692141', 'Director1 - Luis Vargas Gonzalez 932142320', 'Director2 - Maria Lorca Abarca 998715147', '2006-12-22', 'Funcionales', 'Vigente', 'Calleuque - San miguel de calleuque'),
('65011262-8', 'Las Palmas De Calleuque ', 'Club Adulto Mayor', 'Sede Ex Colegio Calleuque ', 'Presidente/a - Maria Guajardo 988514759', 'Secretario/a - Maria Orellana Serrano 988514759', 'Tesorero/a - Jose Ramon Caceres 988531798', 'Director1 - Belarmino Gaete Martinez 988514759', 'Director2 - Cristina Lorca Abaraca 988514759', '2009-06-04', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65014143-1', 'Vida Bella ', 'Club Adulto Mayor', 'Loudes 950', 'Presidente/a - Neftaly Maritnez 989413403', 'Secretario/a - Yolanda Gaete Fuentes 722861576', 'Tesorero/a - Manuel Soto Lorca  722861011', 'Director1 - Isabel Abarca Gonzalez 968490468', 'Director2 - Maria Lorca Villalon 998304077', '2009-07-10', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65019107-2', 'Sagrado Corazon De Jesus', 'Club Adulto Mayor', 'Sede Del Club Santa Victoria ', 'Presidente/a - German Diaz Diaz 997444624', 'Secretario/a - Rosa Cabello Sandoval 997444624', 'Tesorero/a - Herminia Sanchez Orellana 997444624', 'Director1 - Maria Perez Carrasco 997444624 ', 'Director2 - Manuel Diaz Donoso 989138440', '2009-08-27', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65102062-K', 'Cristo Joven ', 'Club Adulto Mayor', 'Sede Comunitaria Villa Cristo Joven ', 'Presidente/a - Jose Iturriaga Muñoz 931199095', 'Secretario/a - Dorila Canales Cabello 931189157', 'Tesorero/a - Luz Angeliza Peña 941467609', 'Director1 - Sergio Gonzalez Cautivo 931199095 ', 'Director2 - Mario Vargas 931199095', '2014-11-17', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65124132-4', 'Sueños De San Agustin ', 'Club Adulto Mayor', 'Sede Ucam Errazuriz Sin Numero ', 'Presidente/a - Blanca Becerra Martinez 722861042', 'Secretario/a - Irma Campo Garcia 9977130129', 'Tesorero/a - Gloria Soto Tobar 961134585', ' - 0', ' - 0', '2016-06-22', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65125173-7', 'Amigos De Siempre ', 'Club Adulto Mayor', 'Casa De La Presidenta ', 'Presidente/a - Nora Nuñez Osorio 971225591', 'Secretario/a - Maria Gonzalez Cornejo 976543970', 'Tesorero/a - Carmen Gonzalez Cornejo 964974002', 'Director1 - Ramon Gutierres Soto 993236598', 'Director2 - Mario Garrido Gonzalez 976152219', '2016-08-08', 'Funcionales', 'Vigente', 'Troya Sur - Troya Sur'),
('65124527-3', 'Los Leones Renovados ', 'Club Adulto Mayor', 'Sede Comunitaria Los Leones ', 'Presidente/a - Audomira Moreno Padilla 722861242', 'Secretario/a - Marta Diaz Labbe 953157978', 'Tesorero/a - Maria Suarez Gomez 989447585', 'Tesorero/a - Silvia Ayudante 993233598', 'Director1 - Maria Aravelo Navarro 983470202', '2016-07-29', 'Funcionales', 'Vigente', 'Puquillay - Puquillay'),
('65157767-5', 'Los Pequenes Calleuque ', 'Club Adulto Mayor', 'Casa Del Tesorero Calleuque ', 'Presidente/a - Maria Cabello Rojas 97441497', 'Secretario/a - Cristina Lorca Abarca 99509276', 'Tesorero/a - Pacifico Salas Sandoval 983745803', 'Director1 - Humberto Vargas Gomez 992290777', 'Director2 - Julio Martinez Flores 994631768', '2018-01-03', 'Funcionales', 'Vigente', 'Calleuque - Calleuque'),
('65056771-4', 'Villa Poblacio', 'Juntas de Vecinos', 'Calle Santisima Trinidad Poblacion ', 'Secretario/a - 968416840', ' - 0', ' - 0', '- 0', '- 0', '1976-01-08', 'Territoriales', 'No Vigente', 'Poblacion - Poblacion'),
('72195500-1', 'Rinconada De Molineros', 'Juntas De Vecinos', 'Sector Rinconada De Molineros Comuna Peralillo', 'Presidente/a - 994674203', 'Secretario/a - 959692949', 'Tesorero/a - 961670551', '- 0', '- 0', '1984-04-12', 'Territoriales', 'No Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('71902300-2', 'Molineros ', 'Juntas De Vecinos', 'Sector Molineros Sin Numero Comuna Peralillo', 'Presidente/a - 961059246', 'Tesorero/a - 958815036', ' - 0', '- 0', '- 0', '1991-02-28', 'Territoriales', 'No Vigente', 'Molineros - Molineros'),
('65174260-9', 'San Diego De Puquillay', 'Juntas De Vecinos', 'Cumuna De Peralillo Provincia De Colchagua Region Sexta ', 'Presidente/a - 997441977', 'Secretario/a - 992810422', 'Tesorero/a - 994064017', '- 0', '- 0', '1991-02-28', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('75964540-5', 'Leones De Puquillay', 'Juntas De Vecinos', 'Sector Puquillay Comuna Peralillo', 'Presidente/a - 993233598', ' - 0', ' - 0', '- 0', '- 0', '1991-04-05', 'Territoriales', 'Vigente', 'Puquillay - Puquillay'),
('65514990-2', 'Los Parrones ', 'Juntas De Vecinos', 'Sector Los Parrones Comuna Peralillo', 'Presidente/a - 994285980', 'Secretario/a - 994691555', 'Tesorero/a - 985710720', '- 0', '- 0', '1991-10-02', 'Territoriales', 'Vigente', 'Parrones - Parrones'),
('65540930-0', 'San Javier De La Troya ', 'Juntas De Vecinos', 'Comuna De Peralillo La Troya Sur', 'Presidente/a - 985473934', ' - 0', ' - 0', '- 0', '- 0', '1992-06-22', 'Territoriales', 'Vigente', 'Troya Sur - Troya Sur'),
('65057418-4', 'El Barco', 'Juntas De Vecinos', 'El Barco Comuna Peralillo', 'Presidente/a - 982623322', 'Presidente/a - 967028566', 'Secretario/a - 974487545', '- 0', '- 0', '1992-09-01', 'Territoriales', 'Vigente', 'Peralillo - El Barco'),
('65071298-6', 'Santa Victoria ', 'Juntas De Vecinos', 'Santa Victoria Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1992-08-10', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('75984520-K', 'Los Jardines De Peralillo', 'Juntas De Vecinos', 'Los Jardines Comuna Peralillo', 'Presidente/a - 946758670', 'Secretario/a - 989613768', ' - 0', '- 0', '- 0', '1993-02-22', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65671740-8', 'La Troya Centro De Peralillo', 'Juntas De Vecinos', 'La Troya Centro De Peralillo', 'Presidente/a - 990205485', 'Secretario/a - 989167241', 'Tesorero/a - 989709241', '- 0', '- 0', '1994-02-16', 'Territoriales', 'Vigente', 'Peralillo - Peralillo Centro'),
('65660530-8', 'Cañetenes De Puquillay', 'Juntas De Vecinos', 'Puquillay Comuna Peralillo', 'Presidente/a - 991619411', 'Tesorero/a - 944202751', ' - 0', '- 0', '- 0', '1994-08-04', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65735760-K', 'Santa Ana De Poblacion ', 'Juntas De Vecinos', 'Comuna De Peralilllo', 'Presidente/a - 985951850', 'Tesorero/a - 983390378', ' - 0', '- 0', '- 0', '1994-08-23', 'Territoriales', 'Vigente', 'Poblacion - Santa Ana'),
('65135020-4', 'Mata Redonda ', 'Juntas De Vecinos', 'Mata Redonda Comuna De Peralilllo', 'Presidente/a - 999828348', 'Secretario/a - 997705785', 'Tesorero/a - 986155993', '- 0', '- 0', '1996-01-26', 'Territoriales', 'Vigente', 'Mata Redonda - Molineros'),
('73936500-7', 'La Troya Norte De Peralilllo', 'Juntas De Vecinos', 'Comuna De Peralillo', 'Secretario/a - 968340007', ' - 0', ' - 0', '- 0', '- 0', '1996-11-04', 'Territoriales', 'No Vigente', 'Troya Sur - Troya Sur'),
('65159320-4', 'La Posada Centro De Poblacion', 'Juntas De Vecinos', 'Comuna De Peralilllo', 'Presidente/a - 722940045', 'Secretario/a - 983274826', ' - 0', '- 0', '- 0', '1997-05-12', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65396670-9', 'San Isidro La Bomba Peralillo', 'Juntas De Vecinos', 'San Isidro La Bomba Peralillo', 'Presidente/a - 994906882', 'Secretario/a - 994407793', 'Tesorero/a - 996662587', '- 0', '- 0', '1998-10-01', 'Territoriales', 'Vigente', 'Peralillo - San Isidro La Bomba'),
('65136590-2', 'El Olivar Peralillo', 'Juntas De Vecinos', 'El Olivar Comuna Peralillo', 'Presidente/a - 988767600', 'Tesorero/a - 988486602', ' - 0', '- 0', '- 0', '1998-10-16', 'Territoriales', 'Vigente', 'Peralillo - El Olivar'),
('65038837-2', 'Los Pequenes De Calleuque Peralillo', 'Juntas De Vecinos', 'Comuna De Peralillo', 'Presidente/a - Maria Cabello Rojas 997441497', 'Secretario/a - Cristina Lorca Abarca 99509276', 'Tesorero/a - Pacifico Salas Sandoval 983745803', 'Director1 - Humberto Vargas Gomez 992290777', 'Director2 - Julio Martinez Flores 994631768', '1998-12-24', 'Territoriales', 'No Vigente', 'Calleuque - Calleuque'),
('65612940-9', 'Los Aromos De Los Vascos ', 'Juntas De Vecinos', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1999-04-01', 'Territoriales', 'No Vigente', 'Peralillo - Peralillo'),
('65479480-4', 'Villa El Esfuerzo', 'Juntas De Vecinos', 'Comuna De Peralillo', 'Presidente/a - 968247142', 'Secretario/a - 961132561', 'Tesorero/a - 956735719', '- 0', '- 0', '1999-12-25', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65724490-2', 'Villalomas De San Isidro ', 'Juntas De Vecinos', 'Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2001-04-25', 'Territoriales', 'No Vigente', 'Peralillo - Peralillo'),
('65115530-4', 'Villa San Jose Obrero ', 'Juntas De Vecinos', 'Comuna Peralillo', 'Tesorero/a - 997532410', ' - 0', ' - 0', '- 0', '- 0', '2001-05-07', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65653330-7', 'San Javier De Lihueimo', 'Juntas De Vecinos', 'Sector San Javier De Lihueimo Comuna Peralilllo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2005-11-21', 'Territoriales', 'No Vigente', 'Lihueimo - San Javier'),
('65692740-2', 'Las Golondrinas De San Isidro', 'Juntas De Vecinos', 'Comuna Peralillo', 'Presidente/a - 963162680', 'Secretario/a - 985741138', 'Tesorero/a - 984266260', '- 0', '- 0', '2006-03-01', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65733960-1', 'El Cortijo El Carmen ', 'Juntas De Vecinos', 'Poblacion San Jose Del Carmen Pasaje Los Copihues N16', 'Secretario/a - 989412623', 'Tesorero/a - 969925049', 'Director1 - 992527117', '- 0', '- 0', '2006-10-20', 'Territoriales', 'Vigente', 'Poblacion - Poblacion'),
('65772090-9', 'El Progreso De San Miguel ', 'Juntas De Vecinos', 'Sector San Miguel De Calleuque Comuna Peralimo', 'Presidente/a - 986099023', ' - 0', ' - 0', '- 0', '- 0', '2006-12-18', 'Territoriales', 'No Vigente', 'Peralillo - Peralillo'),
('65854250-8', 'Hermanos Carrera ', 'Juntas De Vecinos', 'Avenida Hermano Carrera Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2007-08-16', 'Territoriales', 'No Vigente', 'Peralillo - Peralillo'),
('65003885-1', 'Parronal', 'Juntas De Vecinos', 'Caballeros Del Fuego Edgardo Morales N124 Peralillo', 'Presidente/a - 998263163', 'Secretario/a - 995854122', 'Tesorero/a - 999523021', '- 0', '- 0', '2008-12-18', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65004661-7', 'San Agustin ', 'Juntas De Vecinos', 'Poblacion San Agustin Arturo Pratt  N1035 Peralillo', 'Presidente/a - 944759623', 'Secretario/a - 981687332', ' - 0', '- 0', '- 0', '2009-02-05', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65025892-4', 'Barrio Alto', 'Juntas De Vecinos', 'Manuel Rodriguez N44 Comuna Peralillo', 'Presidente/a - 956383813', 'Secretario/a - 963882313', 'Tesorero/a - 963268521', '- 0', '- 0', '2010-05-10', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('65044633-K', 'Padre Vicente Troyasur San Isidro ', 'Juntas De Vecinos', 'Sector La Troya Sur Comuna De Peralillo', 'Presidente/a - 722861094', 'Secretario/a - 989633072', 'Tesorero/a - 996255779', '- 0', '- 0', '2011-07-13', 'Territoriales', 'Vigente', 'Troya Sur - Troya Sur'),
('65052046-7', 'Sagrado Corazon De Rinconada De Peralillo', 'Juntas De Vecinos', 'Sector  Rinconanada De Peralillo ', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2011-09-09', 'Territoriales', 'No Vigente', 'Rinconada De Peralillo - Rinconada De Peralillo'),
('65109925-0', 'Las Parcelas Troya Norte ', 'Juntas De Vecinos', 'Parcelas N19 Troya Norte Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2015-08-26', 'Territoriales', 'Vigente', 'Troya Sur - Troya Sur'),
('65150581-K', 'Los Cardos Veitiuno De Mayo ', 'Juntas De Vecinos', 'Veitiuno De Mayo Los Cardos ', ' - 0', 'Secretario/a - 994271749', ' - 0', '- 0', '- 0', '2017-08-16', 'Territoriales', 'Vigente', 'Peralillo - Peralillo'),
('74083200-K', 'Union Peralillo', 'Club Deportivo', 'Comuna Peralillo Provincia De Colchagua Region Sexta ', 'Presidente/a - 999007579', 'Secretario/a - 933783301', 'Tesorero/a - 965464145', '- 0', '- 0', '1955-06-07', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('71296500-2', 'Juvenil Peralillo', 'Club Deportivo', 'Comuna Peralillo ', 'Presidente/a - 961285703', 'Secretario/a - 981550180', 'Tesorero/a - 965798227', '- 0', '- 0', '1975-06-02', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('73571700-6', 'America Juvenil Poblacion ', 'Club Deportivo', 'Comuna De Peralillo', 'Presidente/a - 974256257', 'Secretario/a - 999604050', ' - 0', '- 0', '- 0', '1978-11-15', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('75911600-3', 'Union Poblacion ', 'Club Deportivo', 'Comuna Peralillo', 'Presidente/a - 983361070', 'Secretario/a - 974244620', 'Tesorero/a - 995478234', '- 0', '- 0', '1978-11-15', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('61107120-5', 'Deportes Peralillo', 'Consejo Local Deportes', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1982-07-05', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65154020-8', 'Rinconada De Peralillo', 'Club Deportivo', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1986-08-04', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65733220-8', 'Santa Marta De Calleuque ', 'Club Deportivo', 'Comuna De Peralillo', 'Presidente/a - 997281143', 'Secretario/a - 965419110', 'Tesorero/a - 988444178', '- 0', '- 0', '1987-02-18', 'Funcionales', 'Vigente', 'Calleuque - Calleuque'),
('65032210-K', 'Leonel Sanchez', 'Club Deportivo', 'Comuna Se Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1987-07-01', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('75150600-7', 'San Francisco Javier La Troya ', 'Club Deportivo Y Cultural', 'Comuna De Peralillo', 'Presidente/a - 968068167', 'Secretario/a - 965283246', 'Tesorero/a - 985333310', '- 0', '- 0', '1990-11-13', 'Funcionales', 'Vigente', 'Troya Sur - Troya Sur'),
('73615700-4', 'Alcoholicos Nuevo Horizontes De Peralillo', 'Club De Rehabilitados', 'Manuel Rodriguez  Sin Numero Peralillo ', 'Presidente/a - 996412060', 'Secretario/a - 997142198', 'Tesorero/a - 968325269', 'Director1 - 989132075', 'Director2 - 996217526', '1990-12-05', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65007200-6', 'Futbol Peralillo', 'Asociacion De Futbol', 'Comuna De Peralillo', 'Presidente/a - 996261295', 'Secretario/a - 988554857', 'Tesorero/a - 977488558', '- 0', '- 0', '1992-06-26', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65169560-0', 'Estrella Roja ', 'Club Deportivo', 'Comuna De Peralillo', 'Presidente/a - 932265289', ' - 0', ' - 0', '- 0', '- 0', '1992-09-01', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65130980-8', 'Union Molineros', 'Club Deportivo', 'Comuna De Peralillo', 'Presidente/a - 941127362', 'Secretario/a - 987083710', 'Tesorero/a - 948193475', '- 0', '- 0', '1993-03-19', 'Funcionales', 'Vigente', 'Molineros - Molineros'),
('71615100-K', 'Agua Potable Rural El Barco', 'Comite Agua Potable', 'Comuna De Peralillo', 'Presidente/a - 993515014', 'Secretario/a - 965220262', 'Tesorero/a - 994825110', '- 0', '- 0', '1993-03-23', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65170870-2', 'Santa Victoria ', 'Club Deportivo', 'Comuna De Peralillo', 'Presidente/a - 995732461', 'Secretario/a - 944630318', 'Tesorero/a - 995276760', '- 0', '- 0', '1994-02-03', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('75149300-2', 'Rinconada De Molineros ', 'Club De Huasos', 'Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1996-06-21', 'Funcionales', 'No Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('74899400-9', 'Valle De Peralillo', 'Conjunto Folclorico', 'Los Boldos N268 Poblacion San Francisco Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1996-07-30', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65313040-6', 'Jorge Toro Rinconada De Molineros ', 'Club Deportivo', 'Comuna De Peralillo', 'Presidente/a - 962824484', ' - 0', ' - 0', '- 0', '- 0', '1997-07-01', 'Funcionales', 'Vigente', 'Rinconada De Peralillo - Rinconada De Peralillo'),
('69264300-3', 'Agua Potable Ruralde Puquillay ', 'Comite', 'Sector Puquillay Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1998-10-01', 'Funcionales', 'Vigente', 'Puquillay - Puquillay'),
('65060290-0', 'Aficionados De Peralillo', 'Club De Huasos', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1998-10-01', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('75025800-K', 'Rodeo Ramon Rey Castillo De Poblacion ', 'Club', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1999-04-29', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('75581600-0', 'Agua Potable Rural Calleuque ', 'Comite Agua Potable', 'Sector Calleuque  Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1999-11-12', 'Funcionales', 'Vigente', 'Calleuque - Calleuque'),
('65020480-8', 'Agua Potable Rural Molineros Mata Redonda ', 'Comite Agua Potable', 'Sector Molinero Mata Redonda  Comuna Peralillo', 'Secretario/a - 996631734', 'Tesorero/a - 993342545', ' - 0', '- 0', '- 0', '1999-11-12', 'Funcionales', 'Vigente', 'Mata Redonda - Molineros'),
('65011340-3', 'Parronal De Peralillo', 'Conjunto Folclorico', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2000-05-11', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('75975990-7', 'Agua Potable Rural La Troya Sur San Javier ', 'Comite Agua Potable', 'Localidad De Troya Sur Comuna De Peralillo', 'Tesorero/a - 997446656', ' - 0', ' - 0', '- 0', '- 0', '2000-05-23', 'Funcionales', 'Vigente', 'Troya Sur - Troya Sur'),
('65173370-7', 'Futbol Rural  Anfur Peralillo', 'Asociacion De Futbol', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2000-12-04', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65169950-9', 'Tenis Peralillo', 'Club', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2001-01-10', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65238610-5', 'Villa Amanecer ', 'Comite De Vivienda', 'Sector Rinconada De Molineros La Escuerla ', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2001-12-12', 'Funcionales', 'Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65179600-8', 'El Progreso ', 'Comite De Vivienda', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2002-03-05', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65126100-7', 'Las Rosas ', 'Comite De Vivienda', 'Poblacion Comuna De Peralillo', 'Presidente/a - 976543970', 'Secretario/a - 989887189', ' - 0', '- 0', '- 0', '2002-04-12', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65121310-K', 'Bernardo Ohiggns ', 'Comite De Pavimentacion', 'Poblacion Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2002-06-27', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65247990-1', 'Pesca Y Caza Arco Iris', 'Club', 'Comuna Peralillo', 'Tesorero/a - 939583240', ' - 0', ' - 0', '- 0', '- 0', '2002-10-08', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65187280-4', 'Los Grillitos ', 'Jardin Infantil', 'Calle Colo Colo Sin Numer Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2002-10-09', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65104949-0', 'La Esperanza ', 'Jardin Familiar', 'Rinconada De Molineros Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2002-10-18', 'Funcionales', 'No Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65784050-5', 'San Gerardo ', 'Jardin Infantil', 'Rinconada De Peralillo ', 'Presidente/a - 950593068', 'Secretario/a - 977834589', 'Tesorero/a - 993646431', '- 0', '- 0', '2003-06-02', 'Funcionales', 'Vigente', 'Rinconada De Peralillo - Rinconada De Peralillo'),
('65408250-2', 'Cueca Viñedos De Colchagua', 'Club', 'Casa Particular Del Secretario Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2004-02-12', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65610830-4', 'Agua Potable El Cortijo El Carmen', 'Comite Agua Potable', 'Sector El Cortijo Comuna De Peralillo', 'Presidente/a - 992504917', 'Secretario/a - 988514772', 'Tesorero/a - 974037324', '- 0', '- 0', '2004-03-18', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65734370-6', 'Escuela Sarta Ravello Parraguez', 'Centro De Padres', 'Escuela Marta Ravello Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2004-09-13', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65549980-6', 'Cristo Joven ', 'Comite De Vivienda', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2005-06-15', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65565540-9', 'Jardines De Colchagua ', 'Comite De Vivienda', 'Poblacion Santa Victoria Colo Colo Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2005-08-23', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65593470-7', 'Villa Los Acacios ', 'Comite De Vivienda', 'Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2005-08-31', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65620960-7', 'Pablo Neruda ', 'Comite De Vivienda', 'Manuel Rodriguez Sin Numero Poblacion Comuna Peralillo', 'Presidente/a - 967403989', ' - 0', ' - 0', '- 0', '- 0', '2005-10-12', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65619590-8', 'Agua Potable Rural Los Parrones ', 'Comite Agua Potable', 'Sector Los Parrones Comuna Peralillo', 'Presidente/a - 996584840', 'Tesorero/a - 985716489', ' - 0', '- 0', '- 0', '2005-11-17', 'Funcionales', 'Vigente', 'Parrones - Parrones'),
('65609630-6', 'Acevedo ', 'Comite De Pavimentacion', 'Calle Acevedo Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2005-11-23', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65612080-0', 'Pedro De Valdivia ', 'Comite De Pavimentacion', 'Almirante Latorre Poblacion ', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2005-11-30', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65618410-8', 'Centro De Padre Y Apoderados Escuela Basica ', 'Centro De Padres', 'Camino Santisima Trinidad Sector El Cortijo Poblacion  Comun', 'Secretario/a - 961581459', 'Tesorero/a - 974037324', ' - 0', '- 0', '- 0', '2005-12-07', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65801580-K', 'Valles De Molineros ', 'Club Adulto Mayor', 'Sector Mata Redonda Comuna Peralillo', 'Presidente/a - Manuel Galvez Donoso 958815036', 'Secretario/a - Eucarpia Acevedo Bustamantem 958815036', 'Tesorero/a - Pablo Ayala Rojas 978043320', 'Director1 - Hermosina Duque Duque 958815036', 'Director2 - Zulema Parraguez Galaz 958815036', '2006-05-15', 'Funcionales', 'Vigente', 'Mata Redonda - Molineros'),
('65001663-7', 'Nuevo Amanecer Rinconada De Molineros ', 'Club Adulto Mayor', 'Sector Rinconada De Molineros Comuna Peralillo', 'Presidente/a - Mireya Silva Huerta 996284031', 'Secretario/a - Usurla Orellana Jargas 722489138', 'Tesorero/a - Luis Galvez Madariaga 963928097', 'Director1 - Elisa Pino Pino 996631734', 'Director2 - Marina Caceres Padilla  989630118', '2008-10-23', 'Funcionales', 'Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65052694-5', 'Jesus Maria Y Jose ', 'Club Adulto Mayor', 'Comuna De Peralillo', 'Presidente/a - Maria Gonzalez Cornejo  998126495', 'Secretario/a - Maria Lorca Tobar 998126495', 'Tesorero/a - Edelmira Muñoz Flores 998126495', 'Director1 - Raul Tobar Gonzalez 998126495 ', 'Director2 - Rolando Salas Ceron 998126495', '2012-03-19', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65063931-6', 'El Molino De San Isidro Norte ', 'Juntas De Vecinos', 'Sector San Isidro Sin Numero De Peralillo', 'Presidente/a - 981258124', ' - 971518145', ' - 0', '- 0', '- 0', '2012-11-29', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65661390-4', 'El Alero', 'Promuseo', 'Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2006-03-22', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65653930-5', 'Damas Basquetdam', 'Basquetbol', 'San Isidro N528 Peralillo ', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2006-05-04', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65875740-7', 'Tierra De Galgos ', 'Club', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2006-07-10', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65737670-1', 'Juanita Y Mercedes', 'Centro De Padres', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2006-07-10', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65830550-6', 'Puquillay', 'Comite De Pavimentacion', 'Sector Puquillay Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2007-02-06', 'Funcionales', 'No Vigente', 'Puquillay - Puquillay'),
('65804100-2', 'Villa Molineros ', 'Comite De Vivienda', 'Sector Molineros, Comuna De Peralillo', 'Secretario/a - 987603198', ' - 0', ' - 0', '- 0', '- 0', '2007-02-07', 'Funcionales', 'Vigente', 'Molineros - Molineros'),
('65181960-1', 'Apoderados Girasol', 'Centro De Padres', 'Psje, Bernardo O,higgins N789, Peralillo', 'Secretario/a - 997532410', ' - 0', ' - 0', '- 0', '- 0', '2007-08-28', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65894000-7', 'Apoderados Molineros', 'Centro De Padres', 'Sector Molineros Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2007-10-25', 'Funcionales', 'No Vigente', 'Molineros - Molineros'),
('65913820-4', 'Esfurzo Joven', 'Comite De Vivienda', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2007-12-07', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65889440-4', 'Nueva Esperanza', 'Comite De Vivienda', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2007-12-20', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65915040-9', 'Molineros ', 'Comite De Pavimentacion', 'Sector Molineros ,comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2008-02-08', 'Funcionales', 'No Vigente', 'Molineros - Molineros'),
('65925210-4', 'Propavimentacion Troya Sur ', 'Comite De Pavimentacion', 'Sector La Troya Sur , Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2008-02-19', 'Funcionales', 'No Vigente', 'Troya Sur - Troya Sur'),
('65927260-1', 'Apoderados Colegio Violeta ', 'Centro De Padres', 'Poblacion San Francisco, Comuna Peralilllo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2008-04-11', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65991960-5', 'Maria De Fatima ', 'Centro De Madres', 'Calle Balmaceda, Pueblo Poblacion , Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2008-08-28', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65002578-4', ' Rayuela Simon Silva ', 'Club', 'Sectore Poblacion , Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '1989-12-02', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65003133-4', 'Villa Hermanos ', 'Comite De Vivienda', 'Sector Poblacion, Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2008-12-17', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65007979-5', 'Barros Luco Caupolican ', 'Comite De Pavimentacion', 'Sector Poblacion , Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2009-04-07', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65017184-5', 'Apoderados Jardin Infantil', 'Centro De Padres', 'Sala Cuna Rinconcito De Amor, Losquillayes  N445 Peralillo', 'Presidente/a - 992245732', 'Tesorero/a - 993725447', ' - 0', '- 0', '- 0', '2009-07-30', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65016736-8', 'Reservistas De Apoyo A La Comuna ', 'Centro', 'Poblacion, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2009-08-06', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65019085-8', 'Rayuela Las Aguilas ', 'Agrupación', 'Villa El Esfuerzo, Pasaje Los Lirios N26 Poblacion ', 'Secretario/a - 983274826', 'Tesorero/a - 993855468', ' - 0', '- 0', '- 0', '2009-10-09', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65166314-8', 'Amigos Capilla Troya Sur', 'Agrupación', 'Troya Sur ,comuna De Peralillo', 'Presidente/a - 985139023', ' - 0', ' - 0', '- 0', '- 0', '2018-06-08', 'Funcionales', 'Vigente', 'Troya Sur - Troya Sur'),
('65162369-3', 'Adelanto Dejando Huellas Rinconada De Molineros ', 'Comite', 'Rinconada De Molineros, Comuna De Peralillo', 'Presidente/a - 961670551', 'Tesorero/a - 977251843', ' - 0', '- 0', '- 0', '2018-04-04', 'Funcionales', 'Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65155678-3', 'Basica Rural Los Leones Puquillay', 'Comite', 'Puquillay, Sector Los Leones ', 'Presidente/a - 993233598', ' - 0', ' - 0', '- 0', '- 0', '2017-12-22', 'Funcionales', 'Vigente', 'Puquillay - Puquillay'),
('65736020-1', 'Adelanto Rincon Los Caceres ', 'Comite', 'Rincon Los Caceres , Comunal De Peralillo', 'Presidente/a - 984579084', ' - 0', ' - 0', '- 0', '- 0', '2017-10-23', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65150052-4', 'Los Robles De Peralillo', 'Comite', 'La Troya Norte Sin Numero Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2017-09-05', 'Funcionales', 'Vigente', 'Peralillo - Troya Norte'),
('65148622-K', 'San Francisco De Asi De Peralillo', 'Fundación', 'Comuna De Peralillo', 'Presidente/a - 990205485', 'Secretario/a - 971403953', ' - 0', '- 0', '- 0', '2017-08-04', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65145593-6', 'Juntos Por El Deporte Peralillo', 'Agrupación', 'La Troya Norte Sin Numero Peralillo', 'Secretario/a - 981905556', ' - 0', ' - 0', '- 0', '- 0', '2017-06-28', 'Funcionales', 'Vigente', 'Peralillo - Troya Norte'),
('65146333-5', 'Guatitas Delantal Peralillo', 'Agrupación', 'La Troya Norte N3 , Comuna Peralillo', 'Presidente/a - 994680702', 'Secretario/a - 983888788', 'Tesorero/a - 971808298', '- 0', '- 0', '2017-06-27', 'Funcionales', 'Vigente', 'Peralillo - Troya Norte'),
('65148023-K', 'Cultura Cocheros Alma Colchaguina ', 'Agrupación', 'Poblacion San Jose Obrero Sin Numero Peralillo', 'Presidente/a - 944954448', 'Secretario/a - 971341469', ' - 988307779', '- 0', '- 0', '2017-08-03', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65124623-7', 'Rural Comunal Asfurco', 'Asociación', 'Santa Victoria, Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2016-08-03', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65020772-6', 'Rayuela Los Aromos Los Vascos', 'Club', 'Sector Los Vascos Puquillay, Comuna Peralillo', 'Presidente/a - 979763240', 'Secretario/a - 990467337', 'Tesorero/a - 996566081', '- 0', '- 0', '2009-11-24', 'Funcionales', 'No Vigente', 'Puquillay - Puquillay'),
('65124772-1', 'Amigos Del Folclore', 'Agrupación', 'La Troya Norte , Psje N5 Peralillo', 'Presidente/a - 997472361', ' - 0', ' - 0', '- 0', '- 0', '2016-06-04', 'Funcionales', 'Vigente', 'Peralillo - Troya Norte'),
('65121592-7', 'Sumbadictas De Poblacion ', 'Club', 'Calle Bernardo O,higgins N114, Poblacion ', 'Presidente/a - 961769565', 'Secretario/a - 961920028', ' - 0', '- 0', '- 0', '2016-06-06', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65020206-6', 'Desarrollo Local De Peralillo', 'Consejo', 'San Diego De Puquillay ,comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2009-11-26', 'Funcionales', 'No Vigente', 'Puquillay - Puquillay'),
('65026155-0', 'Real Independiente', 'Club Deportivo', 'Pasaje Daniel Bargas N743 Peralillo', 'Presidente/a - 978393441', 'Secretario/a - 983164883', 'Tesorero/a - 986867204', '- 0', '- 0', '2010-05-17', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65034621-1', 'Campo Antiguo Colchagua Poniente ', 'Coorporación', 'Acevedo N798, Pueblo Poblacion , Comuna Peralillo', ' - 0', ' - 0', ' - 0', ' - 0', ' - 0', '2010-07-08', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65028609-K', 'Renacer De Peralillo', 'Comite De Vivienda', 'Los Boldos N375,peralillo', 'Presidente/a - 983267231', ' - 973165539', ' - 0', '- 0', '- 0', '2010-08-05', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65029302-9', 'Comunitarias De Reconstrucion Y Preservacion Cultural Y Educ', 'Organización ', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2010-08-20', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65031263-5', 'Renacer De Población ', 'Comite De Pavimentacion', 'Santisima Trinidad N399, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2010-08-26', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65034751-K', 'Apoderados Escuela De Futbol Colo Colo De Peralillo', 'Agrupación de padres ', 'Calle Echeñique, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2010-12-22', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65039632-4', 'Apoderados Colegio Padre Pio ', 'Centro De Padres', 'Calle Comercio N120, Pueblo Poblacion , Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2011-05-02', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65040686-9', 'Apoderados Escuela Hakuna Matata De Peralillo', 'Centro De Padres', 'Calle Nueva Dos N19 Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2011-05-13', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65041114-5', 'Proreconstruccion Preservacion Y Promocion Cultural De Peral', 'Agrupación', 'Casa Vieja Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2011-06-01', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65473540-9', 'General De Padres Y Apoderados Liceo Victor Jara', 'Centro', 'Comuna De Peralillo', 'Presidente/a - 989613768', 'Tesorero/a - 976462574', ' - 0', '- 0', '- 0', '2011-07-12', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65050151-9', 'Cultural Jacha Pacha', 'Agrupación ', 'Sector Rinconada De Molineros , Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2011-05-02', 'Funcionales', 'No Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65059883-0', 'Renacer De Peralillo', 'Agrupación ', 'La Troya Nortesin Numero Peralillo', 'Presidente/a - 989982521', 'Tesorero/a - 983681230', ' - 0', '- 0', '- 0', '2012-08-29', 'Funcionales', 'Vigente', 'Peralillo - Troya Norte'),
('65060083-5', 'Padres Y Amigos Escuela De Futbol', 'Agrupación', 'Calle Balmaceda Sin Numero Pueblo De Poblacion, Comuna Peral', 'Presidente/a - 962977029', 'Secretario/a - 986018492', 'Tesorero/a - 961581459', '- 0', '- 0', '2012-08-29', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65060814-3', 'Los Encinos ', 'Comite De Vivienda', 'Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2012-09-03', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65118605-6', 'Villa Hermoso', 'Comite De Vivienda', 'Calle Alto Campnario Sin Numero Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2016-03-31', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65112303-8', 'Federados Deperalillo', 'Club De Huasos', 'Calle Cardenal Caro N578,peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2015-11-12', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65104864-8', 'Apoderados Sala Cuna Valle Asito ', 'Centro De Padres', 'Caballeros Del Furgo, Pasaje Olaf Valenzuela N 856 Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2015-06-08', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65110223-5', 'Deportiva Las Zumberas De Calleuque ', 'Agrupación', 'Sector De Calleuque  Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2015-09-03', 'Funcionales', 'Vigente', 'Calleuque - Calleuque'),
('65109035-0', 'Villa Nueva Ilución ', 'Comite De Vivienda', 'Calle Alto Campanario N165, Peralillo', 'Secretario/a - 976365531', 'Tesorero/a - 971952293', ' - 0', '- 0', '- 0', '2015-08-31', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65107678-1', 'Amigos Pasajes Los Encinos ', 'Agrupación', 'Psje Los Encinos , Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2015-07-10', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65106055-9', 'Rinconada De Molineros ', 'Comite De Pavimentacion', 'Rinconada De Molineros , Comuna De Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2015-05-12', 'Funcionales', 'No Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65085552-3', 'Apoderados Gustavo Rivera Bustos', 'Centro De Padres', 'Sector El Barco, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2014-05-27', 'Funcionales', 'Vigente', 'Peralillo - El Barco'),
('65086001-2', 'Cultural Alicia Cornejo', 'Grupo De Cultura', 'Villa El Esfuerzo, Psje N5 Casa 34, Pueblo Población ', 'Presidente/a - 992996633', 'Secretario/a - 944465319', 'Tesorero/a - 989409036', '- 0', '- 0', '2014-05-15', 'Funcionales', 'Vigente', 'Poblacion - Poblacion'),
('65085779-8', 'Las Palmas ', 'Comite De Vivienda', 'Sector Los Cardos, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2014-05-15', 'Funcionales', 'Vigente', 'Peralillo - Peralillo'),
('65080587-9', 'Las Almendras ', 'Comite De Vivienda', 'La Troya Norte N3, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2014-02-26', 'Funcionales', 'No Vigente', 'Peralillo - Troya Norte'),
('65080631-K', 'Las Almendras ', 'Comite De Vivienda', 'Calle Colo Colo N29, Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2014-01-23', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65079197-5', 'Osvaldo Muñoz ', 'Escuela de Fulbol', 'Sector Los Vascos, Puquillay, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2014-01-23', 'Funcionales', 'No Vigente', 'Puquillay - Puquillay'),
('65078218-6', 'Marcela Grohnert Barahona ', 'Club De Huasos', 'Sector La Viroca, Comuna De Peralillo', 'Tesorero/a - 988543364', ' - 0', ' - 0', '- 0', '- 0', '2014-01-06', 'Funcionales', 'Vigente', 'Calleuque - La Viroca'),
('65060752-K', 'Apoderados Sala Cuna Y Jardin Infantil Orugita ', 'Centro De Padres', 'Sector Los Cardos, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2012-09-05', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65061278-7', 'Sos Mascotas Peralillo', 'SOS', 'Calle Bernardo O,higgins, Peralillo', 'Presidente/a - 998494702', 'Secretario/a - 961122266', 'Tesorero/a - 985511663', '- 0', '- 0', '2012-10-04', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65062637-0', 'Pesca Y Caza El Chequen ', 'Club', 'Calle Iquique N583, Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2012-11-12', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65062665-6', 'Social  De Jovenes Por Peralillo', 'Organización ', 'La Troya Sin Numero, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2012-11-15', 'Funcionales', 'No Vigente', 'Peralillo - Troya Centro'),
('65068023-5', 'Ampliacion Poblacion Caballeros Del Fuego ', 'Comite', 'Caballeros Del Fuego, Pasaje Saul Hidalgo N866, Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2013-04-11', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65070674-9', 'Santa Gemita ', 'Centro De Madres', 'Sector La Troya Sur , Comuna Peralillo', 'Tesorero/a - 989633072', ' - 0', ' - 0', '- 0', '- 0', '2013-04-16', 'Funcionales', 'Vigente', 'Peralillo - Troya Sur'),
('65068897-K', 'Cultural Deportivo Recreativo Cuento Contigo Para Aprender', 'Centro Cultural', 'Villa El Esfuerzo, Pasaje Los Tulipanes,sector  Poblacion ', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2013-04-23', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65072688-K', 'Villa La Ilusion Comuna De Peralillo', 'Comite De Vivienda', 'Sector De Rinconada De Molineros , Comuna Peralillo', 'Presidente/a - 990679913', 'Secretario/a - 964092433', 'Director2 - 941536500', '- 0', '- 0', '2013-06-24', 'Funcionales', 'Vigente', 'Rinconada De Molineros - Rinconada De Molineros'),
('65080098-2', 'Peralillo (danza Conmigo)', 'Cultura', 'Alto Campanario, Pasaje Orlando Leyn, Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2013-09-24', 'Funcionales', 'No Vigente', 'Peralillo - Peralillo'),
('65042726-2', 'Brotes Y Raice De Rinconada ', 'Conjunto Folclorico', 'Rinconada De Peralillo, Comuna Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2009-06-03', 'Funcionales', 'No Vigente', 'Rinconada De Peralillo - Rinconada De Peralillo'),
('65014026-5', 'El Estado', 'Comite', 'Poblacion  San Gustin Calle Miraflores N 340,  Peralillo', ' - 0', ' - 0', ' - 0', '- 0', '- 0', '2009-07-15', 'Funcionales', 'No Vigente', 'Poblacion - Poblacion'),
('65177185-4', 'Deportivo Zumba De San Miguel', 'Agrupación', 'San Miguel Comuna De Peralillo', 'Presidente/a - 983475194', 'Secretario/a - 986099023', 'Tesorero/a - 965220262', '- 0', '- 0', '2019-02-11', 'Funcionales', 'Vigente', 'Peralillo - San Miguel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `ID` varchar(200) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Nombre_Organizacion` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Sector` varchar(100) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Tipo_Solicitud` varchar(25) NOT NULL,
  `Latitud` varchar(45) NOT NULL,
  `Longitud` varchar(45) NOT NULL,
  `Estado` varchar(25) NOT NULL,
  `Fecha_Desde` date NOT NULL,
  `Fecha_Hasta` date NOT NULL,
  `Observacion` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_org`
--

CREATE TABLE `tipo_org` (
  `ID` varchar(80) NOT NULL,
  `Organizacion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_org`
--

INSERT INTO `tipo_org` (`ID`, `Organizacion`) VALUES
('1', 'Club'),
('2', 'Juntas De Vecinos'),
('3', 'Fundación'),
('4', 'Agrupación'),
('5', 'Coorporación'),
('6', 'Asociación'),
('7', 'Club Adulto Mayor'),
('zzp9awfdriz8n4m', 'Club Deportivo'),
('dr7iti5ectrha9m', 'Club De Rehabilitados'),
('cjx46a9aiwyaw86', 'Consejo Local Deportes'),
('j2mrq8i8pitwvrl', 'Asociacion De Futbol'),
('ruk1rai3bh73629', 'Comite Agua Potable'),
('3mucv7563pvlazv', 'Club De Huasos'),
('y2zj2kc234g5iaw', 'Conjunto Folclorico'),
('lo08bs98w7ltwu5', 'Agrupacion De Padres Y Amigos'),
('7wiir3t566sz95k', 'Club De Rodeo'),
('dfrwvqouknst1r2', 'Club De Tenis'),
('c20hnu32ccounej', 'Comite De Vivienda'),
('mot1wf1tjzflk2z', 'Club De Pesca Y Caza'),
('qw4h3x4vsxfrfi2', 'Comite De Pavimentacion'),
('ceoe8yvper5wx8b', 'Jardin Infantil'),
('ul6e67hkxxa3y98', 'Jardin Familiar'),
('rxn5pc0mhsam95s', 'Club De Cueca'),
('d6jxhxp5yb36648', 'Centro De Padres'),
('12k1zp16qiqcylh', 'Union Comunal'),
('n7e0c6urb8axee7', 'Promuseo'),
('oxhkjbp441ve345', 'Basquetbol'),
('sf86lb40wnaqqlm', 'Club Tierra'),
('y6fet4034z19g6i', 'Centro De Madres'),
('x11zxy3pxden1w0', 'Asociacion Profesores'),
('eo43d947dyrhty0', 'Club De Rayuela'),
('vkmf0glz1nukyua', 'Consejo Desarrollo Local'),
('gml6cvohbm4d459', 'Agrupacion Pro Reconstruccion'),
('7mtbybuepmsirx0', 'Organizacion Comunitaria'),
('twtoflay0d3fw6x', 'Organizacion'),
('ckbntet4d5xdgwz', 'Comite'),
('tib6po4yb9disjl', 'Sos Mascotas'),
('92e4yioenkgjcvc', 'Sos'),
('nanei7sv9u8noas', 'Centro'),
('dlvtvavqobcertv', 'Centro Cultural'),
('dez2jn9w7050jz0', 'Cultural'),
('34jhtaub2iyc2fx', 'Grupo'),
('r1bejtkjp14lmm4', 'Escuela'),
('mxs4nc4ffdxormc', 'Escuela De Futbol'),
('vlhukqlle92t1mg', 'Grupo De Cultura'),
('po2m9pv2pvei8dq', 'Consejo'),
('svvw7d5y5jeyioa', 'Ong'),
('qh4rgsp5q01yh8a', 'Club Deportivo Y Cultural'),
('9lhycr0kfj0evno', 'Amigos Del Folclore');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
