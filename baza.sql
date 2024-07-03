-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 03, 2024 at 07:04 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printersdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostawca`
--

CREATE TABLE `dostawca` (
  `IDDostawcy` int(11) NOT NULL,
  `Nazwa` varchar(100) DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drukarkiinwentaryzacja`
--

CREATE TABLE `drukarkiinwentaryzacja` (
  `IDdrukarki` int(11) NOT NULL,
  `IDDostawcy` int(11) DEFAULT NULL,
  `IDModeluDrukarki` int(11) NOT NULL,
  `IDLokalizacji` int(11) NOT NULL,
  `NumerSeryjny` varchar(50) DEFAULT NULL,
  `AdresIP` varchar(50) DEFAULT NULL,
  `Lokalizacja` varchar(100) DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drukarkimodele`
--

CREATE TABLE `drukarkimodele` (
  `IDdrukarki` int(11) NOT NULL,
  `Producent` varchar(100) DEFAULT NULL,
  `Model` varchar(100) DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzierzawa`
--

CREATE TABLE `dzierzawa` (
  `IDDzierzawy` int(11) NOT NULL,
  `IDDrukarki` int(11) DEFAULT NULL,
  `IDDostawcy` int(11) DEFAULT NULL,
  `KwotaJedNetto` decimal(10,2) DEFAULT NULL,
  `Ilosc` int(11) DEFAULT NULL,
  `StanNaDzisiaj` int(11) DEFAULT NULL,
  `KwotaDzierzawy` decimal(10,2) DEFAULT NULL,
  `Suma` decimal(10,2) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `IDFaktury` int(11) DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktura`
--

CREATE TABLE `faktura` (
  `id` int(11) NOT NULL,
  `numer_faktury` varchar(255) DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lokalizacja`
--

CREATE TABLE `lokalizacja` (
  `IDLokalizacji` int(11) NOT NULL,
  `Kod` varchar(50) DEFAULT NULL,
  `Nazwa_Lokalizacji` varchar(100) DEFAULT NULL,
  `IleDrukarek` int(11) DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawy`
--

CREATE TABLE `naprawy` (
  `IDNaprawy` int(11) NOT NULL,
  `IDDostawcy` int(11) DEFAULT NULL,
  `IDLokalizacji` int(11) DEFAULT NULL,
  `IDFaktury` int(11) DEFAULT NULL,
  `Kwota` decimal(10,2) DEFAULT NULL,
  `DataNaprawy` date DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tonery`
--

CREATE TABLE `tonery` (
  `IDToneru` int(11) NOT NULL,
  `IDLokalizacji` int(11) DEFAULT NULL,
  `IDFaktury` int(11) DEFAULT NULL,
  `Kwota` decimal(10,2) DEFAULT NULL,
  `Ilosc` int(11) DEFAULT NULL,
  `Suma` decimal(10,2) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Utworzono` timestamp NULL DEFAULT NULL,
  `Zmodyfikowano` timestamp NULL DEFAULT NULL,
  `Aktywne` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `UzytkownikID` int(11) NOT NULL,
  `Imie` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL,
  `Login` varchar(50) DEFAULT NULL,
  `Haslo` varchar(32) DEFAULT NULL,
  `Rola` enum('Admin','Uzytkownik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `dostawca`
--
ALTER TABLE `dostawca`
  ADD PRIMARY KEY (`IDDostawcy`);

--
-- Indeksy dla tabeli `drukarkiinwentaryzacja`
--
ALTER TABLE `drukarkiinwentaryzacja`
  ADD PRIMARY KEY (`IDdrukarki`),
  ADD KEY `IDDostawcy` (`IDDostawcy`),
  ADD KEY `DrukarkiCentrala_ibfk_2` (`IDModeluDrukarki`),
  ADD KEY `DrukarkiCentrala_ibfk_4` (`IDLokalizacji`);

--
-- Indeksy dla tabeli `drukarkimodele`
--
ALTER TABLE `drukarkimodele`
  ADD PRIMARY KEY (`IDdrukarki`);

--
-- Indeksy dla tabeli `dzierzawa`
--
ALTER TABLE `dzierzawa`
  ADD PRIMARY KEY (`IDDzierzawy`),
  ADD KEY `IDDostawcy` (`IDDostawcy`),
  ADD KEY `Dzierzawa_ibfk_1` (`IDDrukarki`),
  ADD KEY `fk_faktura_id` (`IDFaktury`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `faktura`
--
ALTER TABLE `faktura`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeksy dla tabeli `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lokalizacja`
--
ALTER TABLE `lokalizacja`
  ADD PRIMARY KEY (`IDLokalizacji`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `naprawy`
--
ALTER TABLE `naprawy`
  ADD PRIMARY KEY (`IDNaprawy`),
  ADD KEY `IDDostawcy` (`IDDostawcy`),
  ADD KEY `Naprawy_ibfk_3` (`IDLokalizacji`),
  ADD KEY `Naprawy_ibfk_4` (`IDFaktury`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeksy dla tabeli `tonery`
--
ALTER TABLE `tonery`
  ADD PRIMARY KEY (`IDToneru`),
  ADD KEY `Lokalizacja` (`IDLokalizacji`),
  ADD KEY `Faktura` (`IDFaktury`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dostawca`
--
ALTER TABLE `dostawca`
  MODIFY `IDDostawcy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drukarkiinwentaryzacja`
--
ALTER TABLE `drukarkiinwentaryzacja`
  MODIFY `IDdrukarki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drukarkimodele`
--
ALTER TABLE `drukarkimodele`
  MODIFY `IDdrukarki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dzierzawa`
--
ALTER TABLE `dzierzawa`
  MODIFY `IDDzierzawy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktura`
--
ALTER TABLE `faktura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokalizacja`
--
ALTER TABLE `lokalizacja`
  MODIFY `IDLokalizacji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `naprawy`
--
ALTER TABLE `naprawy`
  MODIFY `IDNaprawy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tonery`
--
ALTER TABLE `tonery`
  MODIFY `IDToneru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drukarkiinwentaryzacja`
--
ALTER TABLE `drukarkiinwentaryzacja`
  ADD CONSTRAINT `DrukarkiInwentaryzacja_ibfk_1` FOREIGN KEY (`IDDostawcy`) REFERENCES `dostawca` (`IDDostawcy`),
  ADD CONSTRAINT `DrukarkiInwentaryzacja_ibfk_2` FOREIGN KEY (`IDModeluDrukarki`) REFERENCES `drukarkimodele` (`IDdrukarki`),
  ADD CONSTRAINT `DrukarkiInwentaryzacja_ibfk_4` FOREIGN KEY (`IDLokalizacji`) REFERENCES `lokalizacja` (`IDLokalizacji`);

--
-- Constraints for table `dzierzawa`
--
ALTER TABLE `dzierzawa`
  ADD CONSTRAINT `Dzierzawa_ibfk_1` FOREIGN KEY (`IDDrukarki`) REFERENCES `drukarkiinwentaryzacja` (`IDdrukarki`),
  ADD CONSTRAINT `Dzierzawa_ibfk_2` FOREIGN KEY (`IDDostawcy`) REFERENCES `dostawca` (`IDDostawcy`),
  ADD CONSTRAINT `fk_faktura_id` FOREIGN KEY (`IDFaktury`) REFERENCES `faktura` (`id`);

--
-- Constraints for table `naprawy`
--
ALTER TABLE `naprawy`
  ADD CONSTRAINT `Naprawy_ibfk_1` FOREIGN KEY (`IDDostawcy`) REFERENCES `dostawca` (`IDDostawcy`),
  ADD CONSTRAINT `Naprawy_ibfk_3` FOREIGN KEY (`IDLokalizacji`) REFERENCES `lokalizacja` (`IDLokalizacji`),
  ADD CONSTRAINT `Naprawy_ibfk_4` FOREIGN KEY (`IDFaktury`) REFERENCES `faktura` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
