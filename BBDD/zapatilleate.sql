-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2022 a las 13:02:35
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zapatilleate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias`
(
  `idCategoria` int
(11) NOT NULL,
  `nombre` varchar
(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`
idCategoria`,
`nombre
`) VALUES
(1, 'deportistas'),
(2, 'aventureros'),
(3, 'fiesteros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas`
(
  `idCita` int
(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `fk_idUsuario` int
(11) NOT NULL,
  `fk_idProyecto` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias`
(
  `idNoticia` int
(11) NOT NULL,
  `autor` varchar
(20) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar
(50) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar
(300) COLLATE utf8_spanish_ci NOT NULL,
  `fk_idCategoria` int
(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp
()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`
idNoticia`,
`autor
`, `titulo`, `cuerpo`, `imagen`, `fk_idCategoria`, `fecha`) VALUES
(1, 'Nike', 'Nuevas Nike hechas con materiales sostenibles', 'Vivamus rutrum arcu non mauris laoreet ultrices. Quisque dignissim viverra velit, et eleifend velit finibus quis. Vivamus et cursus nisl. Integer luctus arcu sapien, a consequat enim feugiat sit amet. Aliquam tristique metus elementum vehicula pretium. Ut nunc magna, maximus non tellus id, vestibulum fermentum leo. Quisque sed dignissim massa, sed commodo justo. Ut maximus velit augue, a venenatis tortor tincidunt sit amet. Praesent eget imperdiet nisi, at porta nibh.', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/d8456b17-5d3a-4f87-8c41-9b4e25c03674/air-max-dawn-zapatillas-NbHFzR.png', 1, '2022-09-14 13:56:37'),
(2, 'Solomon', 'Oferta de cierre de temporada', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas ut bibendum ante. Donec at suscipit massa. Quisque id vulputate nisl. Aliquam venenatis, tortor sed molestie efficitur, massa velit interdum leo, in viverra lorem sapien at nulla. Nunc sem nibh, posuere ac elit quis, egestas laoreet lorem. Cras ac nisi sem. Praesent velit leo, egestas ac efficitur sit amet, fringilla in eros. Etiam convallis, augue nec faucibus sollicitudin, nibh tellus finibus ipsum, vitae vehicula lectus sem ut est. Ut laoreet magna ac iaculis dictum. Quisque dignissim eget metus sit amet aliquam. Curabitur id neque ut tortor pellentesque mattis. Aenean vestibulum efficitur sollicitudin. Aenean nulla leo, tempus sed vulputate at, hendrerit eu odio. Maecenas rutrum orci eu libero molestie laoreet. Ut dignissim ante congue ligula ultricies, et pellentesque urna accumsan.', 'https://www.skioccas.com/3738-large_default/botas-de-ski-salomon-evolucion-80-beige.jpg', 2, '2022-09-14 13:57:06'),
(3, 'Converse', 'Wedding Shoes', 'Donec iaculis quis lorem ac fermentum. Praesent hendrerit ex ac ex tempor, eu molestie tortor varius. Duis quis quam sapien. Aliquam ornare ex vel nunc vehicula feugiat. Donec venenatis congue felis, sit amet hendrerit ex vehicula et. Nullam at vestibulum sapien, eget congue quam. Vivamus condimentum felis quis sapien pretium condimentum. Suspendisse vel lorem ac nisi finibus ultrices non id urna.\r\n\r\nVestibulum cursus lacus mi. Proin interdum tellus vel metus congue ultricies. Vestibulum est lectus, tempus dignissim rhoncus at, porta id mauris. Cras vel leo dui. Aenean nisl justo, suscipit id placerat a, euismod vitae sem. Mauris a egestas risus. Quisque ut molestie nisi. Mauris mattis, magna a aliquet semper, tortor eros posuere quam, eu sodales est nisi eu leo. Nunc pharetra risus nunc, in posuere neque dignissim sit amet. Sed et imperdiet ex. Aenean gravida lectus a neque consequat consequat.', 'https://i.etsystatic.com/21641783/r/il/635c21/3693903439/il_794xN.3693903439_8hwv.jpg', 3, '2022-09-14 13:57:17'),
(5, 'Nike', 'J Balvin', 'Disponible el 15/9 a las 9:00\r\nSigue adelante y deslumbra todo el día con estas chanclas Jordan, que derrochan la actitud positiva y motivadora de J Balvin. La increíble combinación de colores Celestine Blue es el fondo perfecto para los paneles acolchados y los estampados transpirables de nubes de las correas. Los detalles de arcoíris y el logotipo de carita sonriente exclusivo de J Balvin enamoran a cada paso. Puedes ponértelas incluso por la noche, ya que la espuma supersuave que brilla en la oscuridad situada en la planta del pie está diseñada para que destaques.Disponible el 15/9 a las 9:00\r\nSigue adelante y deslumbra todo el día con estas chanclas Jordan, que derrochan la actitud positiva y motivadora de J Balvin. La increíble combinación de colores Celestine Blue es el fondo perfecto para los paneles acolchados y los estampados transpirables de nubes de las correas. Los detalles de arcoíris y el logotipo de carita sonriente exclusivo de J Balvin enamoran a cada paso. Puedes ponértelas incluso por la noche, ya que la espuma supersuave que brilla en la oscuridad situada en la planta del pie está diseñada para que destaques.', 'https://static.nike.com/a/images/t_prod_ss/w_640,c_limit,f_auto/c126785e-fab2-4a99-b718-fd2cb16d9381/fecha-de-lanzamiento-de-las-jordan-super-play-j-balvin-dr1330-413.jpg', 1, '2022-09-14 13:57:28'),
(6, 'Solomon', 'Plogga, la forma más ecológica de correr', 'Cada persona tiene sus propias razones para correr: ser más rápido, descubrir un nuevo sendero en plena montaña, perder peso o disfrutar de una cerveza o una pizza cuando apetezca, sin rastro de culpa. Sin embargo, para otros, correr significa mucho más, ya que puede darles un propósito cuando se levantan por la mañana o motivarles durante una enfermedad. Erik Ahlström entendió el poder del running cuando empezó el movimiento “plogga” (también llamado “plogging”). El nombre procede de la combinación de dos palabras suecas: “plocka upp”, que significa “recoger”, y la palabra “jogging”. Básicamente, el plogga consiste en correr y recoger basura.', 'https://www.salomon.com/sites/default/files/2020-01/PIC_plogga_iADC2.jpg?fit=cover&orientation=1&optimize=low&bg-color=f5f5f5&format=pjpg&auto=webp&dpr=1.25&width=870', 2, '2022-09-14 13:57:39'),
(12, 'Converse', '¿Cómo lavar los tenis blancos?', 'Es importante saber cómo lavar los tenis blancos, existen varias opciones, pero lo importante es que en ese proceso el calzado no se desgaste. ¡Te contamos cómo hacerlo!\r\n- Lavar tenis blancos de tela: normalmente están hechos de lona, un material que es muy resistente. Para lavarlos puedes ayudarte de un tipo de detergente para limpiar tenis blancos, lo más importante es que no tenga ninguna fragancia, porque así garantizas que cuando los zapatos se sequen, no se queden con un mal olor.\r\n\r\n- Lavar tenis blancos sintéticos: generalmente este tipo de tenis están hechos de goma o materiales parecidos. Debido a su material de fabricación, suelen ser más delicados que los tenis de tela. Por otra parte, normalmente tienden a tomar un color amarillento con más facilidad. Para lavar tenis blancos sintéticos, te recomendamos humedecer un paño con un poco de amoníaco, sólo tienes que frotar por las manchas para deshacerte de ellas.\r\n\r\n- Lavar tenis blancos de piel: para este tipo de material debes de tener un cuidado superior, lo ideal es que los limpies con mucha frecuencia. Para hacerlo te puedes ayudar de un cepillo de dientes, frotando suavemente por la zona afectada, y retirando el exceso con un algodón.\r\n', 'https://imagenes.elpais.com/resizer/PYl722LPCLWwziM6f9vrKc4rhU8=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/HHBLTKZKDNBLXA73L7JWTA7HWQ.png', 3, '2022-09-14 14:01:44'),
(13, 'Solomon', '¿Cómo nació la calidad de esta marca?', 'Los amantes del senderismo y de la montaña eligen lo mejor para sus pies.Los amantes del senderismo y de la montaña eligen lo mejor para sus pies.Freepik\r\nExisten marcas que se hacen famosas por su relación calidad precio o porque sus materiales y resultados superan todas las expectativas de calidad. Una de estas es Salomon, firma francesa cuyas zapatillas las eligen año tras año los amantes de la montaña, el senderismo y los deportes al aire libre. No es de extrañar porque sus zapatillas son ligeras, pero resistentes, y sus suelas ayudan a que se agarre el pie a cualquier terreno y se pueda realizar cualquier deporte de montaña. Pero, ¿cómo nació la calidad de esta marca?\r\n\r\nEl ciclismo es un deporte que se adapta a todo tipo de público.\r\n¿De montaña o de carretera? Tres rutas para disfrutar de la bicicleta con el navegador GPS mejor valorado de Amazon\r\nEn el año 1947, George Salomon creó un pequeño taller en los Alpes franceses donde inventó una máquina para producir material de esquí hasta que se convirtió en líder mundial del sector. De esto, pasamos al año 1997, cuando Adidas compra la marca para reforzar su área de deporte de montaña, hasta 2005, año en el que se independiza. Desde entonces, pertenece a Amer Sports Corporation y su calidad no deja de crecer. \r\nLos amantes del senderismo y de la montaña eligen lo mejor para sus pies.Los amantes del senderismo y de la montaña eligen lo mejor para sus pies.Freepik\r\nExisten marcas que se hacen famosas por su relación calidad precio o porque sus materiales y resultados superan todas las expectativas de calidad. Una de estas es Salomon, firma francesa cuyas zapatillas las eligen año tras año los amantes de la montaña, el senderismo y los deportes al aire libre. No es de extrañar porque sus zapatillas son ligeras, pero resistentes, y sus suelas ayudan a que se agarre el pie a cualquier terreno y se pueda realizar cualquier deporte de montaña. Pero, ¿cómo nació la calidad de esta marca?\r\n\r\nEl ciclismo es un deporte que se adapta a todo tipo de público.\r\n¿De montaña o de carretera? Tres rutas para disfrutar de la bicicleta con el navegador GPS mejor valorado de Amazon\r\nEn el año 1947, George Salomon creó un pequeño taller en los Alpes franceses donde inventó una máquina para producir material de esquí hasta que se convirtió en líder mundial del sector. De esto, pasamos al año 1997, cuando Adidas compra la marca para reforzar su área de deporte de montaña, hasta 2005, año en el que se independiza. Desde entonces, pertenece a Amer Sports Corporation y su calidad no deja de crecer. \r\n\r\n\r\nY es que, Salomon es eficacia comprobada, innovación y es perfección para los amantes del deporte al aire libre, sea cual sea su preparación y nivel. Por eso, cada vez que hay rebajas de la marca en el gigante de las ventas online arrasan. Esta semana podemos disfrutar en Amazon de hasta un 37% de descuentos en zapatillas de montaña como esta ideal para aventuras en cualquier terreno. La XA PRO 3D GTX es una zapatilla emblemática, pensadas para proteger los pies cuando se corre por superficies irregulares y garantizar la máxima comodidad', 'https://imagenes.20minutos.es/files/article_default_content/uploads/imagenes/2022/08/22/salomon-x-hombre.jpeg', 2, '2022-09-14 14:05:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos`
(
  `idProducto` int
(11) NOT NULL,
  `nombre` varchar
(40) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar
(120) COLLATE utf8_spanish_ci NOT NULL,
  `idCategoria` int
(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`
idProducto`,
`nombre
`, `precio`, `imagen`, `idCategoria`) VALUES
(1, 'nike1', 96, '', 1),
(2, 'salomon1', 96, '', 2),
(3, 'converse1', 96, '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos`
(
  `idProyecto` int
(11) NOT NULL,
  `nombre` varchar
(40) COLLATE utf8_spanish_ci NOT NULL,
  `color` tinyint
(1) NOT NULL DEFAULT 0,
  `logo` tinyint
(1) NOT NULL DEFAULT 0,
  `tipografia` tinyint
(1) NOT NULL DEFAULT 0,
  `entrega` date NOT NULL,
  `precio` float DEFAULT NULL,
  `fk_idUsuario` int
(11) NOT NULL,
  `fk_idProducto` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol`
(
  `idRol` int
(11) NOT NULL,
  `nombre` varchar
(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`
idRol`,
`nombre
`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios`
(
  `idUsuario` int
(11) NOT NULL,
  `fk_idRol` int
(11) NOT NULL,
  `usuario` varchar
(15) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar
(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar
(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar
(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar
(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar
(50) COLLATE utf8_spanish_ci NOT NULL,
  `fnac` date NOT NULL,
  `telefono` int
(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`
idUsuario`,
`fk_idRol
`, `usuario`, `password`, `nombre`, `apellido1`, `apellido2`, `email`, `fnac`, `telefono`) VALUES
(1, 1, 'rosanaAdmin', 'rosanaAdmin', 'Rosana', 'Lopez', 'Lopez', 'rosana.lpz.lpz@gmail.com', '1993-02-15', NULL),
(6, 2, 'patatoide', 'patata', 'patata', 'patata', '', 'patata@gmail.com', '2022-09-02', 652489956);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
ADD PRIMARY KEY
(`idCategoria`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
ADD PRIMARY KEY
(`idCita`),
ADD KEY `fk_idUsuario`
(`fk_idUsuario`),
ADD KEY `fk_idProyecto`
(`fk_idProyecto`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
ADD PRIMARY KEY
(`idNoticia`),
ADD KEY `fk_idCategoria`
(`fk_idCategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
ADD PRIMARY KEY
(`idProducto`),
ADD KEY `fk_idcategoria`
(`idCategoria`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
ADD PRIMARY KEY
(`idProyecto`),
ADD KEY `fk_idUsuario`
(`fk_idUsuario`),
ADD KEY `fk_idProducto`
(`fk_idProducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
ADD PRIMARY KEY
(`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD PRIMARY KEY
(`idUsuario`),
ADD KEY `fk_idRol`
(`fk_idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idProyecto` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY
(`fk_idUsuario`) REFERENCES `usuarios`
(`idUsuario`),
ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY
(`fk_idProyecto`) REFERENCES `proyectos`
(`idProyecto`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY
(`fk_idCategoria`) REFERENCES `categorias`
(`idCategoria`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_idcategoria` FOREIGN KEY
(`idCategoria`) REFERENCES `categorias`
(`idCategoria`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY
(`fk_idUsuario`) REFERENCES `usuarios`
(`idUsuario`),
ADD CONSTRAINT `proyectos_ibfk_2` FOREIGN KEY
(`fk_idProducto`) REFERENCES `productos`
(`idProducto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY
(`fk_idRol`) REFERENCES `rol`
(`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE zapatilleate.usuarios MODIFY password VARCHAR
(100);
UPDATE zapatilleate.usuarios set password = 'da248eeaffa573da8c323c3eb56aaf32ec6ce244e401a24c55f30c907d0bbfb5';
ALTER TABLE zapatilleate.citas MODIFY fecha Date;
ALTER TABLE zapatilleate.citas ADD hora Time;
ALTER TABLE usuarios RENAME users_data;
ALTER TABLE users_data ADD direccion VARCHAR(200);
ALTER TABLE users_data ADD sexo VARCHAR(50);
ALTER TABLE users_data ADD apellidos VARCHAR(200);
ALTER TABLE users_data drop apellido1;
ALTER TABLE users_data drop apellido2;

CREATE TABLE `zapatilleate`.`users_login`
(
  `idLogin` INT NOT NULL AUTO_INCREMENT,
  `fk_idUsuario` INT NOT NULL,
  `usuario` VARCHAR
(100) NOT NULL,
  `password` VARCHAR
(100) NOT NULL,
  `fk_idRol` INT NOT NULL,
  PRIMARY KEY
(`idLogin`),
  UNIQUE INDEX `idLogin_UNIQUE`
(`idLogin` ASC) VISIBLE,
  UNIQUE INDEX `idUsuario_UNIQUE`
(`fk_idUsuario` ASC) VISIBLE,
  UNIQUE INDEX `usuario_UNIQUE`
(`usuario` ASC) VISIBLE,
  INDEX `fk_idRol_idx`
(`fk_idRol` ASC) VISIBLE,
  CONSTRAINT `fk_idUsuario`
    FOREIGN KEY
(`fk_idUsuario`)
    REFERENCES `zapatilleate`.`users_data`
(`idUsuario`)
    ON
DELETE NO ACTION
    ON
UPDATE NO ACTION,
  CONSTRAINT `fk_idRol`
    FOREIGN KEY
(`fk_idRol`)
    REFERENCES `zapatilleate`.`rol`
(`idRol`)
    ON
DELETE NO ACTION
    ON
UPDATE NO ACTION);

INSERT INTO `users_login` (
  `
fk_idUsuario`,
`fk_idRol
`,
  `usuario`,
  `password`
) VALUES
(1, 1, 'rosanaAdmin', 'da248eeaffa573da8c323c3eb56aaf32ec6ce244e401a24c55f30c907d0bbfb5'),
(2, 2, 'patatoide', 'da248eeaffa573da8c323c3eb56aaf32ec6ce244e401a24c55f30c907d0bbfb5');


ALTER TABLE users_data drop usuario;
ALTER TABLE users_data drop password;
ALTER TABLE users_data DROP CONSTRAINT users_data_ibfk_1;
ALTER TABLE users_data DROP fk_idRol;
ALTER TABLE citas ADD motivo VARCHAR(200);


ALTER TABLE noticias drop autor;
ALTER TABLE `zapatilleate`.`noticias`
ADD COLUMN `fk_idUsuario` INT NOT NULL AFTER `fecha`,
ADD INDEX `fk_idUsuario_idx`
(`fk_idUsuario` ASC) VISIBLE;
;
ALTER TABLE `zapatilleate`.`noticias`
ADD CONSTRAINT `noticias_ibfk_2`
  FOREIGN KEY
(`fk_idUsuario`)
  REFERENCES `zapatilleate`.`users_data`
(`idUsuario`)
  ON
DELETE NO ACTION
  ON
UPDATE NO ACTION;

