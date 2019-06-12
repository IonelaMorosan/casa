-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Oct 2018 la 07:58
-- Versiune server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab4`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `permisiune`
--

CREATE TABLE `permisiune` (
  `id_permisiune` int(11) NOT NULL,
  `descriere_perm` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `permisiune`
--

INSERT INTO `permisiune` (`id_permisiune`, `descriere_perm`) VALUES
(1, 'Nepermis'),
(2, 'Vizualizare'),
(3, 'Editare');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `denumire_rol` char(20) NOT NULL,
  `produs_acces` int(11) NOT NULL,
  `user_acces` int(11) NOT NULL,
  `roles_acces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `rol`
--

INSERT INTO `rol` (`id_rol`, `denumire_rol`, `produs_acces`, `user_acces`, `roles_acces`) VALUES
(1, 'Administrator', 3, 3, 3),
(2, 'Manager', 2, 2, 2),
(3, 'Vanzator', 3, 1, 1),
(4, 'Nimeni', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `status` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`, `id_rol`) VALUES
(1, 'Admin1', 'Admin1', 1, 1),
(2, 'Manager1', 'Manager1', 1, 2),
(3, 'Vanzator1', 'Vanzator1', 1, 3),
(4, 'Nimeni1', 'Nimeni1', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permisiune`
--
ALTER TABLE `permisiune`
  ADD PRIMARY KEY (`id_permisiune`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `produs_acces` (`produs_acces`),
  ADD KEY `roles_acces` (`roles_acces`),
  ADD KEY `user_acces` (`user_acces`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permisiune`
--
ALTER TABLE `permisiune`
  MODIFY `id_permisiune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`produs_acces`) REFERENCES `permisiune` (`id_permisiune`),
  ADD CONSTRAINT `rol_ibfk_2` FOREIGN KEY (`roles_acces`) REFERENCES `permisiune` (`id_permisiune`),
  ADD CONSTRAINT `rol_ibfk_3` FOREIGN KEY (`user_acces`) REFERENCES `permisiune` (`id_permisiune`);

--
-- Restrictii pentru tabele `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
