-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: nov. 10, 2018 la 05:47 PM
-- Versiune server: 10.1.36-MariaDB
-- Versiune PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `lab5`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `permisiune`
--

CREATE TABLE `permisiune` (
  `id_permisiune` int(11) NOT NULL,
  `descriere_perm` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `permisiune`
--

INSERT INTO `permisiune` (`id_permisiune`, `descriere_perm`) VALUES
(1, 'Nepermis'),
(2, 'Vizualizare'),
(3, 'Editare');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `denumire_rol` char(20) NOT NULL,
  `produs_acces` int(11) NOT NULL,
  `user_acces` int(11) NOT NULL,
  `roles_acces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `rol`
--

INSERT INTO `rol` (`id_rol`, `denumire_rol`, `produs_acces`, `user_acces`, `roles_acces`) VALUES
(1, 'Administrator', 3, 3, 3),
(2, 'Manager', 2, 2, 2),
(3, 'Vanzator', 3, 1, 1),
(4, 'Nimeni', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(40) NOT NULL,
  `status` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`, `id_rol`) VALUES
(1, 'Admin1', '2ec10e4f7cd2159e7ea65d2454f68287ecf81251', 1, 1),
(2, 'Manager1', '32d17a8c55ec5fabcca0f7486b732250e03bdcfa', 1, 2),
(3, 'Vanzator1', 'ca18e01ad72d4b171eccbd986d7bf8b6138670e2', 1, 3),
(4, 'Nimeni1', 'd68664755557ec54a6162ce1e677038d2b22cce9', 0, 4),
(5, 'Natalia1', '27b0fb83479cfa3510c037d07c25003b2b09e0d1', 1, 2),
(6, 'Anisoara1', '28b2fcc1f6007ac46c043799cf4624368aa35147', 1, 2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `permisiune`
--
ALTER TABLE `permisiune`
  ADD PRIMARY KEY (`id_permisiune`);

--
-- Indexuri pentru tabele `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `produs_acces` (`produs_acces`),
  ADD KEY `roles_acces` (`roles_acces`),
  ADD KEY `user_acces` (`user_acces`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `permisiune`
--
ALTER TABLE `permisiune`
  MODIFY `id_permisiune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`produs_acces`) REFERENCES `permisiune` (`id_permisiune`),
  ADD CONSTRAINT `rol_ibfk_2` FOREIGN KEY (`roles_acces`) REFERENCES `permisiune` (`id_permisiune`),
  ADD CONSTRAINT `rol_ibfk_3` FOREIGN KEY (`user_acces`) REFERENCES `permisiune` (`id_permisiune`);

--
-- Constrângeri pentru tabele `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
