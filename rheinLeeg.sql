-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 dec 2020 om 14:08
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhein`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afdelingen`
--

CREATE TABLE `afdelingen` (
  `afdeling_ID` int(11) NOT NULL,
  `afdeling_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruiker_ID` int(11) NOT NULL,
  `voor_naam` varchar(255) NOT NULL,
  `achter_naam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '874e0cc1eb15bdaf323800180d19d69fe4ba2cedd2954ab332e25a2a85ab3248',
  `afdeling` int(11) NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruiker_ID`, `voor_naam`, `achter_naam`, `tussenvoegsel`, `username`, `password`, `afdeling`, `account_status`, `last_login`) VALUES
(1, 'Bart', 'Rooijakkers', NULL, 'Bart.ar', '$2y$10$D3MGAq6k1OZsbzbhH7jruuTRzcbhTa0I.skKUS6GxPUT5Y0QuGGOa', 12, 1, '2020-12-01 12:59:33'),
(5, '33', '55', NULL, 'test', '$2y$10$5k9bUVBTgfCYEXUSuuCuFO/QAVkiQycesCwuPlzMyBT6uxO8gqS1G', 12, 1, NULL),
(7, 'Kas', 'van Zanten', NULL, 'KasVZ', '$2y$10$PvHcC5YrZ//RjylXM.e8muHfJRS5yytevSRkcaM/XA8wNcjEqhOrG', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hijstesten`
--

CREATE TABLE `hijstesten` (
  `opdracht_nummer` int(11) NOT NULL,
  `volg_nummer` int(11) NOT NULL,
  `datum_opgesteld` datetime NOT NULL,
  `hoofdgiek_lengte` double(11,2) NOT NULL,
  `mech_sectie_gieklengte` double(11,2) NOT NULL,
  `hulpgiek_lengte` double(11,2) NOT NULL,
  `hoofdgiek_giekhoek` double(11,2) NOT NULL,
  `hulpgiek_giekhoek` double(11,2) NOT NULL,
  `hijskabel_aantal_parten` int(11) NOT NULL,
  `zwenkhoek` double(11,2) NOT NULL,
  `eigen_massa_ballast` double(11,2) NOT NULL,
  `toelaatbare_bedrijfslast` double(11,2) NOT NULL,
  `lmb_in_werking` double(11,2) NOT NULL,
  `proeflast` double(11,2) NOT NULL,
  `akkoord` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kabelchecklisten`
--

CREATE TABLE `kabelchecklisten` (
  `opdracht_nummer` int(11) NOT NULL,
  `kabel_ID` int(11) NOT NULL,
  `draadbreuk_6D` int(11) NOT NULL,
  `draadbreuk_30D` int(11) NOT NULL,
  `beschadiging_buitenzijde` int(11) NOT NULL,
  `beschadiging_roest_corrosie` int(11) NOT NULL,
  `verminderde_kabeldiameter` int(11) NOT NULL,
  `positie_meetpunten` int(11) NOT NULL,
  `beschadiging_totaal` int(11) NOT NULL,
  `type_beschadiging_roest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keuringsitems`
--

CREATE TABLE `keuringsitems` (
  `opdracht_nummer` int(11) NOT NULL,
  `keurings_onderdeel` int(11) NOT NULL,
  `directe_voorziening` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voorbladen`
--

CREATE TABLE `voorbladen` (
  `opdracht_nummer` int(11) NOT NULL,
  `TCVT_nummer` int(11) NOT NULL,
  `soort_keuring` int(11) NOT NULL,
  `keurings_datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uitvoerder` int(11) NOT NULL,
  `deskundige` varchar(255) NOT NULL,
  `opstelling_kraan` varchar(52) NOT NULL,
  `uitvoering_toren_haakhoogte` int(11) NOT NULL,
  `soort_giek` varchar(52) NOT NULL,
  `telescoopgiek_delen` double(11,2) NOT NULL,
  `opbouwgiek_meters` double(11,2) NOT NULL,
  `hulpgiek_meters` double(11,2) NOT NULL,
  `fly_jib_delen` int(11) NOT NULL,
  `gieklengte` double(11,2) NOT NULL,
  `topbaar` double(11,2) NOT NULL,
  `loopkat` tinyint(1) NOT NULL,
  `verstelbare_giek` tinyint(1) NOT NULL,
  `soort_stempels` int(11) NOT NULL,
  `tekortkomingen` tinyint(1) NOT NULL,
  `afmelden_voor` datetime NOT NULL,
  `toelichting` varchar(255) NOT NULL,
  `werk_instructie` varchar(500) NOT NULL,
  `kabel_leverancier` varchar(255) NOT NULL,
  `waarnemingen` varchar(500) NOT NULL,
  `handtekening` varchar(255) NOT NULL,
  `aantal_bedrijfsuren` double(11,2) NOT NULL,
  `afleg_redenen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afdelingen`
--
ALTER TABLE `afdelingen`
  ADD PRIMARY KEY (`afdeling_ID`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruiker_ID`);

--
-- Indexen voor tabel `hijstesten`
--
ALTER TABLE `hijstesten`
  ADD PRIMARY KEY (`opdracht_nummer`,`volg_nummer`);

--
-- Indexen voor tabel `kabelchecklisten`
--
ALTER TABLE `kabelchecklisten`
  ADD PRIMARY KEY (`opdracht_nummer`,`kabel_ID`);

--
-- Indexen voor tabel `voorbladen`
--
ALTER TABLE `voorbladen`
  ADD PRIMARY KEY (`opdracht_nummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afdelingen`
--
ALTER TABLE `afdelingen`
  MODIFY `afdeling_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruiker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `voorbladen`
--
ALTER TABLE `voorbladen`
  MODIFY `opdracht_nummer` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
