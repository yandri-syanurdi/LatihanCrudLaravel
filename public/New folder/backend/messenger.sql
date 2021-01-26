-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2020 pada 17.26
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `messenger_contacts`
--

CREATE TABLE IF NOT EXISTS `messenger_contacts` (
  `id` int(100) NOT NULL,
  `contact_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messenger_messages`
--

CREATE TABLE IF NOT EXISTS `messenger_messages` (
`message_id` int(100) NOT NULL,
  `from_id` int(100) NOT NULL,
  `to_id` int(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messenger_users`
--

CREATE TABLE IF NOT EXISTS `messenger_users` (
`id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messenger_contacts`
--
ALTER TABLE `messenger_contacts`
 ADD PRIMARY KEY (`id`,`contact_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
 ADD PRIMARY KEY (`message_id`,`from_id`,`to_id`);

--
-- Indexes for table `messenger_users`
--
ALTER TABLE `messenger_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messenger_users`
--
ALTER TABLE `messenger_users`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
