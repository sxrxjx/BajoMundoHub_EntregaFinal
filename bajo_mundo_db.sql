-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2026 at 08:16 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bajo_mundo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id` int NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversaciones`
--

INSERT INTO `conversaciones` (`id`, `creado_en`) VALUES
(1, '2026-06-01 15:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_evento` datetime NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'img/prox-1.png',
  `promotor_id` int NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descripcion`, `fecha_evento`, `ubicacion`, `ruta_imagen`, `promotor_id`, `creado_en`) VALUES
(1, 'El Corito Sano Opening', 'La gran noche de apertura oficial de Bajo Mundo Hub. Vive el dembow puro.', '2026-07-15 22:00:00', 'Santo Domingo, Club Subterráneo', 'img/4.png', 3, '2026-06-01 15:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `eventos_artistas`
--

CREATE TABLE `eventos_artistas` (
  `evento_id` int NOT NULL,
  `artista_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventos_artistas`
--

INSERT INTO `eventos_artistas` (`evento_id`, `artista_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `galerias_privadas`
--

CREATE TABLE `galerias_privadas` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `ruta_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerias_privadas`
--

INSERT INTO `galerias_privadas` (`id`, `usuario_id`, `ruta_foto`, `descripcion`, `creado_en`) VALUES
(1, 2, 'img/foto-1.png', 'Preparando la sesión de mezcla para el Opening.', '2026-06-01 15:57:29'),
(2, 2, 'img/foto-2.png', 'Backstage en la última presentación en directo.', '2026-06-01 15:57:29'),
(3, 4, 'img/foto-3.png', 'Recuerdo inolvidable con el corito.', '2026-06-01 15:57:29'),
(22, 6, 'img/upload_6_1780392222_382503312_4ba0e5ed-0bdf-4831-90c4-9c1b175a324a copia 14.png', '', '2026-06-02 09:23:42'),
(27, 6, 'img/upload_6_1780392271_AFTER-3.gif', '', '2026-06-02 09:24:31'),
(28, 6, 'img/upload_6_1780392279_after-1.gif', '', '2026-06-02 09:24:39'),
(29, 6, 'img/upload_6_1780392295_AFTER-6.gif', '', '2026-06-02 09:24:55'),
(30, 6, 'img/upload_6_1780404801_382503312_4ba0e5ed-0bdf-4831-90c4-9c1b175a324a copia 8.png', '', '2026-06-02 12:53:21'),
(32, 6, 'img/upload_6_1780404820_382503312_4ba0e5ed-0bdf-4831-90c4-9c1b175a324a copia 20.png', '', '2026-06-02 12:53:40'),
(33, 6, 'img/upload_6_1780404827_382503312_4ba0e5ed-0bdf-4831-90c4-9c1b175a324a copia 19.png', '', '2026-06-02 12:53:47'),
(34, 6, 'img/upload_6_1780404835_382503312_4ba0e5ed-0bdf-4831-90c4-9c1b175a324a copia 27.png', '', '2026-06-02 12:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `glosario`
--

CREATE TABLE `glosario` (
  `id` int NOT NULL,
  `termino` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `definicion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `letra` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `glosario`
--

INSERT INTO `glosario` (`id`, `termino`, `definicion`, `letra`, `creado_en`) VALUES
(1, 'Abusador', 'Alguien que destaca mucho, que rompe en la pista o en la música.', 'a', '2026-06-01 15:57:29'),
(2, 'Acelerao', 'Con mucha intensidad o prisa, sin bajar el ritmo.', 'a', '2026-06-01 15:57:29'),
(3, 'Activao', 'Encendido, con energía y listo para la acción.', 'a', '2026-06-01 15:57:29'),
(4, 'A fuego', 'Algo que está muy bueno, intenso o duro.', 'a', '2026-06-01 15:57:29'),
(5, 'Corito Sano', 'Grupo de amigos de confianza que se junta para pasarla bien, vibrar alto y compartir de forma auténtica.', 'c', '2026-06-01 15:57:29'),
(6, 'Dembow', 'Ritmo acelerado, sincopado y repetitivo originario de Jamaica, que define la base del movimiento urbano dominicano.', 'd', '2026-06-01 15:57:29'),
(7, 'Klk', 'Abreviatura de \"¿Qué lo qué?\". El saludo dominicano por excelencia, informal y directo.', 'k', '2026-06-01 15:57:29'),
(106, 'Alante', 'Hacia adelante, actitud de seguir y no frenar.', 'a', '2026-06-02 17:21:08'),
(107, 'Al garete', 'Sin control, dejándose llevar por el momento.', 'a', '2026-06-02 17:21:08'),
(108, 'A lo loco', 'Sin pensar, con desenfreno y actitud libre.', 'a', '2026-06-02 17:21:08'),
(109, 'Aperísimo', 'Muy bueno, de alto nivel.', 'a', '2026-06-02 17:21:08'),
(110, 'Arriba', 'Expresión para subir la energía o animar la pista.', 'a', '2026-06-02 17:21:08'),
(111, 'Bandidaje', 'Actitud de fiesta intensa, rebelde, callejera y sin complejos.', 'b', '2026-06-02 17:21:08'),
(112, 'Flow', 'Estilo personal, carisma, ritmo y actitud única al expresarse, vestir o bailar.', 'f', '2026-06-02 17:21:08'),
(113, 'Pámpara', 'Estar encendido, destacar sobre los demás, estar en el punto máximo de estilo o éxito.', 'p', '2026-06-02 17:21:08'),
(114, 'Rulay', 'Estar de fiesta, relajado, disfrutando de la vida sin ningún tipo de preocupación.', 'r', '2026-06-02 17:21:08'),
(115, 'Vaina', 'Palabra comodín que puede referirse a un objeto, situación, problema o cosa cualquiera.', 'v', '2026-06-02 17:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int NOT NULL,
  `conversacion_id` int NOT NULL,
  `remitente_id` int NOT NULL,
  `texto_mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enviado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `leido` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id`, `conversacion_id`, `remitente_id`, `texto_mensaje`, `enviado_en`, `leido`) VALUES
(1, 1, 1, '¡Hola Dj Topo! Quería confirmar tu setlist para el evento del 15 de julio.', '2026-06-01 15:57:29', 0),
(2, 1, 2, '¡Klk Sara! Sí, ya tengo listo el dembow más duro del Bajo Mundo. Va a ser a fuego.', '2026-06-01 15:57:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `miembros_conversacion`
--

CREATE TABLE `miembros_conversacion` (
  `conversacion_id` int NOT NULL,
  `usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `miembros_conversacion`
--

INSERT INTO `miembros_conversacion` (`conversacion_id`, `usuario_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `tipo` enum('seguimiento','mensaje') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remitente_id` int NOT NULL,
  `referencia_id` int DEFAULT NULL,
  `leido` tinyint(1) DEFAULT '0',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `usuario_id`, `tipo`, `remitente_id`, `referencia_id`, `leido`, `creado_en`) VALUES
(1, 2, 'seguimiento', 4, NULL, 0, '2026-06-01 15:57:29'),
(2, 2, 'mensaje', 1, 1, 0, '2026-06-01 15:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles_artistas`
--

CREATE TABLE `perfiles_artistas` (
  `usuario_id` int NOT NULL,
  `genero` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spotify_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_contratacion` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perfiles_artistas`
--

INSERT INTO `perfiles_artistas` (`usuario_id`, `genero`, `spotify_url`, `instagram_url`, `precio_contratacion`) VALUES
(2, 'Dembow / Reggaetón', 'https://open.spotify.com/artist/example', 'https://instagram.com/dj_topo_real', 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles_promotores`
--

CREATE TABLE `perfiles_promotores` (
  `usuario_id` int NOT NULL,
  `nombre_empresa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitio_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perfiles_promotores`
--

INSERT INTO `perfiles_promotores` (`usuario_id`, `nombre_empresa`, `sitio_web`) VALUES
(3, 'Alfa Events dominicana', 'https://alfaevents.com');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `imagen_portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_disco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'img/disc-1.png',
  `spotify_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `nombre`, `descripcion`, `imagen_portada`, `imagen_disco`, `spotify_url`, `creado_en`) VALUES
(1, 'BANDIDAJE INTENSO', 'Una playlist de @bajomundo0_ Sonidos intensos y Dembow duro, pensados para cuando la noche está en su peak.', 'img/play-1.png', 'img/disc-1.png', 'https://open.spotify.com/playlist/43InkDvS6eu8cbPp7sH4fI?si=e95c522802d749b7', '2026-06-01 17:39:51'),
(2, 'PARA SUFRIDOS', 'Una playlist de @bajomundo0_ Entre la bachata contemporánea, la salsa suave y el perreo con sentimiento.', 'img/play-2.png', 'img/disc-2.png', 'https://open.spotify.com/playlist/43InkDvS6eu8cbPp7sH4fI?si=e95c522802d749b7', '2026-06-01 17:39:51'),
(3, 'CHIEFING CHIEF', 'Una playlist de @djchief Revive los Dj sets de nuestro DJ residente Chief con esta playlist deluxe.', 'img/play-3.png', 'img/disc-3.png', 'https://open.spotify.com/playlist/43InkDvS6eu8cbPp7sH4fI?si=e95c522802d749b7', '2026-06-01 17:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `proximos_eventos`
--

CREATE TABLE `proximos_eventos` (
  `id` int NOT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_corta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `miniatura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/prox-1.png',
  `fecha` date NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proximos_eventos`
--

INSERT INTO `proximos_eventos` (`id`, `titulo`, `descripcion_corta`, `miniatura`, `fecha`, `creado_en`) VALUES
(1, 'Bajo Mundo X Planta Baja', 'Con nuestra dj residente VICKY y dos special guests: 8LEGGG desde Almería y GIGI284 directa de Madrid.', 'img/prox-1.png', '2026-06-09', '2026-06-01 17:16:17'),
(2, 'Bajo Mundo intenso x G10', 'Déjate sorprender por nuestra edición Intensa. Lineup y artista principal por anunciar.', 'img/prox-2.png', '2026-06-25', '2026-06-01 17:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `seguidores`
--

CREATE TABLE `seguidores` (
  `seguidor_id` int NOT NULL,
  `seguido_id` int NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seguidores`
--

INSERT INTO `seguidores` (`seguidor_id`, `seguido_id`, `creado_en`) VALUES
(2, 4, '2026-06-01 15:57:29'),
(4, 1, '2026-06-01 15:57:29'),
(4, 2, '2026-06-01 15:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('usuario','artista','promotor','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usuario',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'img/perfil-pred.png',
  `biografia` text COLLATE utf8mb4_unicode_ci,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ciudad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibilidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Público, usuario, visible.',
  `preferencias_musicales` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `clave`, `rol`, `avatar`, `biografia`, `telefono`, `creado_en`, `ciudad`, `visibilidad`, `preferencias_musicales`) VALUES
(1, 'sara_admin', 'admin@bajomundo.com', '$2y$10$tExz6H1z9gU.0dI6mD4sdeXwN2s4.8K9bZ82d2fH8d.cM1dE4hZ0W', 'admin', 'img/perfil-3.png', 'Administradora principal de la plataforma.', '600111222', '2026-06-01 15:57:29', 'Granada', 'Público, usuario, visible.', 'Dembow, Reggaetón, R&B, Trap, Hip Hop'),
(2, 'dj_topo', 'topo@bajomundo.com', '$2y$10$tExz6H1z9gU.0dI6mD4sdeXwN2s4.8K9bZ82d2fH8d.cM1dE4hZ0W', 'artista', 'img/perfil-1.png', 'Pionero de los ritmos urbanos callejeros.', '600222333', '2026-06-01 15:57:29', 'Granada', 'Público, usuario, visible.', 'Dembow, Reggaetón, R&B, Trap, Hip Hop'),
(3, 'el_alfa_promotor', 'contacto@alfaevents.com', '$2y$10$tExz6H1z9gU.0dI6mD4sdeXwN2s4.8K9bZ82d2fH8d.cM1dE4hZ0W', 'promotor', 'img/perfil-2.png', 'Organizador de festivales y eventos del género urbano.', '600333444', '2026-06-01 15:57:29', 'Granada', 'Público, usuario, visible.', 'Dembow, Reggaetón, R&B, Trap, Hip Hop'),
(4, 'carlos_user', 'carlos@comunidad.com', '$2y$10$tExz6H1z9gU.0dI6mD4sdeXwN2s4.8K9bZ82d2fH8d.cM1dE4hZ0W', 'usuario', 'img/perfil-4.png', 'Fiel seguidor de las noches de Bajo Mundo Hub.', '600444555', '2026-06-01 15:57:29', 'Granada', 'Público, usuario, visible.', 'Dembow, Reggaetón, R&B, Trap, Hip Hop'),
(5, 'admin_sara', 'sara@bajomundo.com', '$2y$10$0KV/PqMMIAtpN.Y/R5conu2Wi9RcQ3k89CpLnAfIWFakcGzKRK/pe', 'admin', 'img/perfil-3.png', 'Administradora principal de Bajo Mundo Hub.', '600000000', '2026-06-01 16:14:53', 'Granada', 'Público, usuario, visible.', 'Dembow, Reggaetón, R&B, Trap, Hip Hop'),
(6, 'sxrxjx', 'sara@gmail.com', '$2y$10$U.e8OqNXcZ.b/pdTHZm.uOI6HitH3FIW5DFH/UCKjvuZYXY0pvwmW', 'usuario', 'img/avatar_6_1780414579.png', 'Fiel seguidora de las noches de Bajo Mundo Hub.', '', '2026-06-01 16:27:54', 'Granada', 'Público, usuario, visible.', 'Dembow, Reggaetón, Trap, Hip Hop'),
(7, 'maria123', 'maria@gmail.com', '$2y$10$axUxTa/5xRf8uv8iY7gztuUgVFsAYlpbL.o9Cp1Kp174o0dsG2Tou', 'usuario', 'img/perfil-pred.png', '', '', '2026-06-02 18:24:59', '', 'Público, usuario, visible.', 'Dembow, Reggaetón');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotor_id` (`promotor_id`);

--
-- Indexes for table `eventos_artistas`
--
ALTER TABLE `eventos_artistas`
  ADD PRIMARY KEY (`evento_id`,`artista_id`),
  ADD KEY `artista_id` (`artista_id`);

--
-- Indexes for table `galerias_privadas`
--
ALTER TABLE `galerias_privadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `glosario`
--
ALTER TABLE `glosario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `termino` (`termino`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversacion_id` (`conversacion_id`),
  ADD KEY `remitente_id` (`remitente_id`);

--
-- Indexes for table `miembros_conversacion`
--
ALTER TABLE `miembros_conversacion`
  ADD PRIMARY KEY (`conversacion_id`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `remitente_id` (`remitente_id`);

--
-- Indexes for table `perfiles_artistas`
--
ALTER TABLE `perfiles_artistas`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indexes for table `perfiles_promotores`
--
ALTER TABLE `perfiles_promotores`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proximos_eventos`
--
ALTER TABLE `proximos_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`seguidor_id`,`seguido_id`),
  ADD KEY `seguido_id` (`seguido_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galerias_privadas`
--
ALTER TABLE `galerias_privadas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `glosario`
--
ALTER TABLE `glosario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proximos_eventos`
--
ALTER TABLE `proximos_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`promotor_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `eventos_artistas`
--
ALTER TABLE `eventos_artistas`
  ADD CONSTRAINT `eventos_artistas_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventos_artistas_ibfk_2` FOREIGN KEY (`artista_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galerias_privadas`
--
ALTER TABLE `galerias_privadas`
  ADD CONSTRAINT `galerias_privadas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`conversacion_id`) REFERENCES `conversaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`remitente_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `miembros_conversacion`
--
ALTER TABLE `miembros_conversacion`
  ADD CONSTRAINT `miembros_conversacion_ibfk_1` FOREIGN KEY (`conversacion_id`) REFERENCES `conversaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `miembros_conversacion_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`remitente_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perfiles_artistas`
--
ALTER TABLE `perfiles_artistas`
  ADD CONSTRAINT `perfiles_artistas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perfiles_promotores`
--
ALTER TABLE `perfiles_promotores`
  ADD CONSTRAINT `perfiles_promotores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`seguidor_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`seguido_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
