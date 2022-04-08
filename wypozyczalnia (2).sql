-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Kwi 2022, 12:43
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 150,
  `model` text NOT NULL,
  `year` text NOT NULL,
  `power` int(11) NOT NULL,
  `photo` text NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`id`, `price`, `model`, `year`, `power`, `photo`, `reserved`) VALUES
(2, 150, 'Fiat Bravo', '2007', 97, './upload/fiat.jpg', 0),
(4, 150, 'Bmw', '2000', 150, './upload/625000f419ea8.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `birthDate` text NOT NULL,
  `pesel` text NOT NULL,
  `street` text NOT NULL,
  `buildingNumber` text NOT NULL,
  `city` text NOT NULL,
  `user_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `fullName`, `login`, `password`, `birthDate`, `pesel`, `street`, `buildingNumber`, `city`, `user_type`) VALUES
(3, 'Paweł Słota', 'pawelek212003', '123', '', '', '', '', '', 0),
(4, 'Kacper Przełozny', 'kapri', 'kapri', '2022-04-19', '12345678912', 'Beblo', '69', 'Brak', 0),
(5, 'admin', 'admin', 'admin', '', '', '', '', '', 2),
(6, 'pracownik 1', 'pracownik 1', '', '', '', '', '', '', 1),
(7, 'pracownik 2', 'pracownik 2', '', '', '', '', '', '', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
