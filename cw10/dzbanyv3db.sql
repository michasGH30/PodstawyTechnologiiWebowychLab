-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Mar 2023, 12:05
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dzbanyv3db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzbany`
--

CREATE TABLE `dzbany` (
  `ID` int(10) UNSIGNED NOT NULL,
  `idKategorii` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `obrazek` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL,
  `pojemnosc` int(11) NOT NULL,
  `wysokosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dzbany`
--

INSERT INTO `dzbany` (`ID`, `idKategorii`, `nazwa`, `obrazek`, `opis`, `pojemnosc`, `wysokosc`) VALUES
(1, 1, 'Okrągły', 'dzban1.jpg', 'Jaki piękny okrągły dzban.', 3, 35),
(2, 2, 'Sześcienny', 'dzban2.jpg', 'Jaki piękny dzban w kształcie sześcianu.', 6, 90);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`ID`, `nazwa`, `opis`) VALUES
(1, 'Płaskie', 'Są to dzbany płaskie. Proste jak 2 + 2 = 5.'),
(2, 'Przestrzenne', 'Są to dzbany przestrzenne. Proste jak 1 = 2.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `ID` int(10) UNSIGNED NOT NULL,
  `idDzbana` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `ocena` int(11) NOT NULL,
  `tresc` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `recenzje`
--

INSERT INTO `recenzje` (`ID`, `idDzbana`, `nick`, `ocena`, `tresc`, `data`) VALUES
(1, 1, 'Nieznajomy', 2, 'Słabo trzyma wodę. Nie polecam.', '2023-03-08 06:58:49'),
(2, 2, 'Anonymous', 4, 'Dobrze trzyma wodę. Trochę kanciasty.', '2023-03-08 06:59:33'),
(3, 1, 'Bezimienny', 2, 'No taki se.', '2023-03-08 07:35:50'),
(4, 1, 'michasGH30', 1, 'Taki se. nie podoba mi się. Nie polecam alegrowicza.', '2023-03-08 08:51:37');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `rola` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'user',
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID`, `login`, `haslo`, `email`, `rola`, `data`) VALUES
(1, 'michasGH30', '81dc9bdb52d04dc20036dbd8313ed055', 'michal.zuk30601@gmail.com', 'user', '2023-03-08 08:50:02');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dzbany`
--
ALTER TABLE `dzbany`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idKategorii` (`idKategorii`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idDzbana` (`idDzbana`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dzbany`
--
ALTER TABLE `dzbany`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dzbany`
--
ALTER TABLE `dzbany`
  ADD CONSTRAINT `dzbany_ibfk_1` FOREIGN KEY (`idKategorii`) REFERENCES `kategorie` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`idDzbana`) REFERENCES `dzbany` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
