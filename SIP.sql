-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 21 Lis 2021, 19:35
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
-- Baza danych: `SIP`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `pswd` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `avatar` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `name`, `surname`, `login`, `pswd`, `email`, `avatar`) VALUES
(1, 'Daniel', 'Pater', 'wertalus', '$2y$10$lHZJDDCvQsCEwbFwu8vRiOy9KdnOXadwakSTgIvKebJWlhPGkpUta', 'wertalus@gmail.com', ''),
(3, 'Barotsz', 'Kowalski', 'kowalboy', '$2y$10$Ycw36UzIljuDgE4No5J6Z.777sUVpLzHv8NkH38OlOyoWFD9B0Qoa', 'kowalboy@gmail.com', ''),
(4, 'Ola', 'Kowalska', 'koala', '$2y$10$U4jrGgJuayWBrfEkv9fNBuA.1GWqXaHwFwgBZLsDxLCw8MeYpxByu', 'koala@gmail.com', ''),
(5, 'Monika', 'Pater', 'monpa', '$2y$10$8eII0H9Q6P2BAY8y/HU1VeJOvTW0MVeXqiuLaMkIYoh6yULto4eIe', 'monpa@gmail.com', ''),
(6, 'Wojtek', 'Kowalski', 'kowojtek', '$2y$10$cmYCh6j3y8URBqmgtvUMFeV6qr/vEZTmyNaBngKeiwxIZbkBn4Elq', 'kowojtek@gmail.com', ''),
(7, 'żmija', 'domowa', 'zmija@domowa', '$2y$10$5kKZTzc7viAbZ5SBC2NYmOOMvv..1ns1Q0Sa2g5Qm2ZpSH/o/zNuS', 'zmija@domowa.pl', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
