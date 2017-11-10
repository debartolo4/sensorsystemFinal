-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 09, 2017 alle 16:48
-- Versione del server: 10.1.26-MariaDB
-- Versione PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensorsystem`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partita_IVA` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_data` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`id`, `name`, `partita_IVA`, `t_data`) VALUES
(1, 'IoT Inc', '17283495683', 1),
(2, 'Faraway System', '09787767676', 0),
(3, 'HiTech SPA', '12356675541', 0),
(4, 'Agri SPA', '34921098456', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `errors`
--

CREATE TABLE `errors` (
  `id` int(17) UNSIGNED ZEROFILL NOT NULL,
  `error` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `errors`
--

INSERT INTO `errors` (`id`, `error`) VALUES
(00000000000000001, 'Il dispositivo non è stato installato correttamente.'),
(00000000000000002, 'Il dispositivo non riesce ad inviare i dati.'),
(00000000000000003, 'Il dispositivo non riesce a rilevare i dati correttamente.'),
(00000000000000004, 'Il dispositivo non funziona correttamente, problema non individuato.');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_10_24_192952_create_customers_table', 1),
(3, '2017_10_25_134023_create_usertype_table', 1),
(4, '2017_10_29_193639_create_errors_table', 1),
(5, '2017_10_30_173738_create_sites_table', 1),
(6, '2017_10_31_000000_create_users_table', 1),
(7, '2017_10_31_152742_create_sensor_types_table', 1),
(8, '2017_10_31_153608_create_sensor_brands_table', 1),
(9, '2017_10_31_154213_crate_sensors_table', 1),
(10, '2017_11_02_150452_create_transmissions_table', 1),
(11, '2017_11_02_151435_create_transmission_data_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `sensors`
--

CREATE TABLE `sensors` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_string` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minV` int(11) NOT NULL,
  `maxV` int(11) NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sensors`
--

INSERT INTO `sensors` (`id`, `id_string`, `coordinates`, `minV`, `maxV`, `brand_id`, `type_id`, `site_id`) VALUES
(0001, 'TMP-SMS-0001', '123456:345678', 0, 70, 1, 1, 1),
(0002, 'CUR-LGG-0002', '263544:667788', 20, 980, 3, 5, 2),
(0003, 'TMP-SMS-0003', '543678:456721', 0, 90, 1, 1, 3),
(0004, 'GAS-SNY-0004', '546789:433345', 250, 1500, 4, 4, 5),
(0006, 'CPC-LGG-0006', '657483:467382', 10, 2500, 3, 2, 3),
(0007, 'TMP-SMS-0007', '546143:367845', 0, 90, 1, 1, 6),
(0008, 'CPC-LGG-0008', '876789:765345', 1000, 5000, 3, 2, 6),
(0009, 'CUR-PLS-0009', '765666:845633', 0, 1000, 2, 5, 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `sensor_brands`
--

CREATE TABLE `sensor_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sensor_brands`
--

INSERT INTO `sensor_brands` (`id`, `brand`, `code`) VALUES
(1, 'Samsung', 'SMS'),
(2, 'Philips', 'PLS'),
(3, 'LG', 'LGG'),
(4, 'Sony', 'SNY'),
(5, 'EPSON', 'EPS');

-- --------------------------------------------------------

--
-- Struttura della tabella `sensor_types`
--

CREATE TABLE `sensor_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sensor_types`
--

INSERT INTO `sensor_types` (`id`, `type`, `code`) VALUES
(1, 'Temperatura', 'TMP'),
(2, 'Capacità', 'CPC'),
(3, 'Pressione', 'PRS'),
(4, 'Gas', 'GAS'),
(5, 'Corrente elettrica', 'CUR');

-- --------------------------------------------------------

--
-- Struttura della tabella `sites`
--

CREATE TABLE `sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sites`
--

INSERT INTO `sites` (`id`, `name`, `description`, `address`, `num`, `city`, `province`, `client_id`) VALUES
(1, 'Deposito mezzi pesanti', 'Deposito per TIR e camion di proprietà dell\'azienda', 'Contrada La Macchia', '3', 'Bari', 'BA', 2),
(2, 'Magazzino', 'Deposito per mezzi e oggetti obsoleti o in sovrabbondanza', 'Corso Dante', '10', 'Potenza', 'PT', 3),
(3, 'Serra', 'Serra per coltivazione piante', 'Contrada Pozzo Soldano', '12', 'Ruvo di Puglia', 'BA', 1),
(5, 'Magazzino merci', 'Deposito merci', 'Corso Dante', '1', 'Potenza', 'PT', 1),
(6, 'Silos', 'Silos di proprietà dell\'azienda', 'Via Ruvo', '88', 'Terlizzi', 'BA', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `transmissions`
--

CREATE TABLE `transmissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `trans_string` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `transmissions`
--

INSERT INTO `transmissions` (`id`, `trans_string`) VALUES
(1, 'TMP-SMS-0001-201711101110080TempOk'),
(2, 'CUR-LGG-0002-20171211009471423RelCurrOk'),
(3, 'TMP-SMS-0007-201710300101100TempOk'),
(4, 'CPC-LGG-0008-004565201711111923CapCorrect'),
(5, 'CUR-PLS-0009-00000000000000001Err');

-- --------------------------------------------------------

--
-- Struttura della tabella `transmission_data`
--

CREATE TABLE `transmission_data` (
  `id_trans` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` int(11) DEFAULT NULL,
  `sensor_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `error_id` int(17) UNSIGNED ZEROFILL DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `transmission_data`
--

INSERT INTO `transmission_data` (`id_trans`, `date`, `time`, `val`, `sensor_id`, `type_id`, `brand_id`, `site_id`, `client_id`, `error_id`, `message`) VALUES
(1, '2017-11-10', '11:10', 80, 1, 1, 1, 1, 2, NULL, 'TempOk'),
(2, '2017-12-11', '14:23', 947, 2, 5, 3, 2, 3, NULL, 'RelCurrOk'),
(3, '2017-10-30', '01:01', 100, 7, 1, 1, 6, 4, NULL, 'TempOk'),
(4, '2017-11-11', '19:23', 4565, 8, 2, 3, 6, 4, NULL, 'CapCorrect'),
(5, NULL, NULL, NULL, 9, 5, 2, 6, 4, 00000000000000001, 'Err');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CF` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `firstLog` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `address`, `num`, `tel`, `CF`, `username`, `email`, `password`, `type`, `client_id`, `firstLog`, `remember_token`) VALUES
(1, 'Gianluca', 'de Bartolo', 'C.da S.Antonio', '2', '3314615156', 'DBRGLC95L03H926G', 'laraza37', 'lr37@libero.it', '$2y$10$Jqt0xK/nMoqoCS0g9wdJuObZMRUo78Ktls2zIvkLDTegcJqLiIyia', 1, 1, NULL, '3hnDCZ0muxyh52CREqBEQobQRIrmp3dJdTnRrkecAtrjvdQFtWLcQE4wXLDU'),
(2, 'Davide', 'De Pasquale', 'Contrada Mazzia', '10', '0807878777', 'DPQDVD95L30H926T', 'depa94', 'depa@gmail.com', '$2y$10$kSun1jrm9InNWCWxdRV8seqTGUISspcbp.m0o1pAurjytlACw/.gy', 2, 2, 1, 'JFgHVWWswP4mSlEtpLn34QIX0EZnyb9Wd6SJBhqOkSUovlGBD95zsajBzXvB'),
(3, 'Angelo', 'Baglio', 'Via Brera', '15/B', '3309878666', 'BLOLDO97L22G678T', 'baglio', 'baglio@libero.it', '$2y$10$kAd3jFP5nt2pGV6ivqCcfeNYG2JiQJ36Kky8RtA7j/30/ip1eXYmO', 2, 3, 1, 'O82r8ucxSYXLApyqKi1YBtDCJFbSdYEq7N6jMp43gk79PdNKWo5a5OfYPkG1'),
(4, 'Angela', 'de Manna', 'C.da S.Antonio', '10', '3314615156', 'DMNVTI98L08H926G', 'demanna', 'demanna@libero.it', '$2y$10$CD/YsTaT0R7UESBmGZFrS.lAw6jMFmJ9MQB.2XVKIe0m5Kh/eci0C', 2, 2, 1, 'NRGpPKrMsOK4ooP3fsqiIljl5cN6nAyQ6gtMgK0VFzPH5LksCKQy7QtbZUXz'),
(5, 'Aldo', 'Storti', 'Via Brera', '2', '3309878666', 'SRTGVN00L20H926G', 'storti4', 'lr3@libero.com', '$2y$10$hHTw1n/rMdlsylb4MbfeUeMfePOQarfMmKGHTMeVN4tfVKD8z90Na', 3, 3, 1, 'lHLIbaxwVhA1qQBFnBo0bap1Zjje3XtmT5vot6KP6MPpOmsuRlOC9buHzWD7'),
(6, 'Angelo', 'Abate', 'Piazza Cavour', '1', '0807878777', 'BLOLDO97L22G678T', 'abate', 'ab@gmail.com', '$2y$10$23G1AIwKHj87me0mZML4/u.a2J60cbsxQyopwPltN.RtBbpznga6a', 3, 2, 1, NULL),
(10, 'Matteo', 'Bisci', 'Via Mattarella', '10', '3314615156', 'BSCMTT90L03H926G', 'amministratore', 'bisci@gmail.com', '$2y$10$/NvqhgWg90EeGLHvT6p1OeQzFIpI1hYbjvuXjKvxVMQrfUo4v3c8.', 1, 1, NULL, 'yV7GfnKmXqVDAsOgmHzu3OtjJo16zOC3KZrQ56W4ZZnmlZqImI9Lz1Q8sA4C'),
(11, 'Marcello', 'Rossi', 'Corso Magenta', '2', '3314622354', 'RSSMCL88L04H926F', 'responsabile', 'rossi@libero.it', '$2y$10$ySAkUoELyl0AAdEU1JBT6OQr1pP2e/4heib4ROIBteAgRi2S4Ralq', 2, 4, 1, 'PvNZEAInVKw117DLaCrnMZg6QX53wimqIXWrBbyMY1IoSdebjQVmNYUpEVMA'),
(12, 'Vito', 'Bruni', 'Corso Abate', '1', '3345656789', 'BRNVTO91L02H987T', 'dipendente', 'bruni@alice.it', '$2y$10$63U6YHFRGEjylkk5ip5RW.h5OvP.q/9iIBDEYcsmSREES0o7ot/am', 3, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `usertype`
--

CREATE TABLE `usertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `usertype`
--

INSERT INTO `usertype` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Responsabile Aziendale'),
(3, 'Dipendente');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_name_unique` (`name`),
  ADD UNIQUE KEY `customers_partita_iva_unique` (`partita_IVA`);

--
-- Indici per le tabelle `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sensors_id_string_unique` (`id_string`),
  ADD KEY `sensors_brand_id_foreign` (`brand_id`),
  ADD KEY `sensors_type_id_foreign` (`type_id`),
  ADD KEY `sensors_site_id_foreign` (`site_id`);

--
-- Indici per le tabelle `sensor_brands`
--
ALTER TABLE `sensor_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sensor_brands_brand_unique` (`brand`),
  ADD UNIQUE KEY `sensor_brands_code_unique` (`code`);

--
-- Indici per le tabelle `sensor_types`
--
ALTER TABLE `sensor_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sensor_types_type_unique` (`type`),
  ADD UNIQUE KEY `sensor_types_code_unique` (`code`);

--
-- Indici per le tabelle `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sites_client_id_foreign` (`client_id`);

--
-- Indici per le tabelle `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `transmission_data`
--
ALTER TABLE `transmission_data`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `transmission_data_sensor_id_foreign` (`sensor_id`),
  ADD KEY `transmission_data_type_id_foreign` (`type_id`),
  ADD KEY `transmission_data_brand_id_foreign` (`brand_id`),
  ADD KEY `transmission_data_site_id_foreign` (`site_id`),
  ADD KEY `transmission_data_client_id_foreign` (`client_id`),
  ADD KEY `transmission_data_error_id_foreign` (`error_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_type_foreign` (`type`),
  ADD KEY `users_client_id_foreign` (`client_id`);

--
-- Indici per le tabelle `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(17) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `sensor_brands`
--
ALTER TABLE `sensor_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `sensor_types`
--
ALTER TABLE `sensor_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `sensors`
--
ALTER TABLE `sensors`
  ADD CONSTRAINT `sensors_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `sensor_brands` (`id`),
  ADD CONSTRAINT `sensors_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `sensors_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `sensor_types` (`id`);

--
-- Limiti per la tabella `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `customers` (`id`);

--
-- Limiti per la tabella `transmission_data`
--
ALTER TABLE `transmission_data`
  ADD CONSTRAINT `transmission_data_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `sensor_brands` (`id`),
  ADD CONSTRAINT `transmission_data_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transmission_data_error_id_foreign` FOREIGN KEY (`error_id`) REFERENCES `errors` (`id`),
  ADD CONSTRAINT `transmission_data_id_trans_foreign` FOREIGN KEY (`id_trans`) REFERENCES `transmissions` (`id`),
  ADD CONSTRAINT `transmission_data_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`id`),
  ADD CONSTRAINT `transmission_data_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `transmission_data_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `sensor_types` (`id`);

--
-- Limiti per la tabella `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `users_type_foreign` FOREIGN KEY (`type`) REFERENCES `usertype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
