-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 nov 2020 om 15:06
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

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

--
-- Gegevens worden geëxporteerd voor tabel `afdelingen`
--

INSERT INTO `afdelingen` (`afdeling_ID`, `afdeling_naam`) VALUES
(1, 'Veiligheid en milieu'),
(2, 'Materieel'),
(3, 'Projectbureau'),
(4, 'Engineering'),
(5, 'Verkoop'),
(12, 'ICT');

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
  `account_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruiker_ID`, `voor_naam`, `achter_naam`, `tussenvoegsel`, `username`, `password`, `afdeling`, `account_status`) VALUES
(1, 'Bart', 'Rooijakkers', NULL, 'Bart.ar', '$2y$10$D3MGAq6k1OZsbzbhH7jruuTRzcbhTa0I.skKUS6GxPUT5Y0QuGGOa', 12, 1),
(2, 'Kas', 'van Zanten', NULL, 'KasVZ', '874e0cc1eb15bdaf323800180d19d69fe4ba2cedd2954ab332e25a2a85ab3248', 1, 1),
(5, '33', '55', NULL, 'test', '$2y$10$5k9bUVBTgfCYEXUSuuCuFO/QAVkiQycesCwuPlzMyBT6uxO8gqS1G', 12, 0);

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
  `akkoord` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `hijstesten`
--

INSERT INTO `hijstesten` (`opdracht_nummer`, `volg_nummer`, `datum_opgesteld`, `hoofdgiek_lengte`, `mech_sectie_gieklengte`, `hulpgiek_lengte`, `hoofdgiek_giekhoek`, `hulpgiek_giekhoek`, `hijskabel_aantal_parten`, `zwenkhoek`, `eigen_massa_ballast`, `toelaatbare_bedrijfslast`, `lmb_in_werking`, `proeflast`, `akkoord`) VALUES
(1, 66, '2020-11-06 00:00:00', 5.00, 4.00, 8.00, 6.00, 4.00, 2, 44.00, 6.00, 2222.00, 5.00, 44.00, 1),
(3, 669, '2020-11-18 00:00:00', 55.00, 5.00, 6.00, 8.00, 7.00, 5, 14.00, 8.00, 5.00, 4.00, 55.00, 0);

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

--
-- Gegevens worden geëxporteerd voor tabel `kabelchecklisten`
--

INSERT INTO `kabelchecklisten` (`opdracht_nummer`, `kabel_ID`, `draadbreuk_6D`, `draadbreuk_30D`, `beschadiging_buitenzijde`, `beschadiging_roest_corrosie`, `verminderde_kabeldiameter`, `positie_meetpunten`, `beschadiging_totaal`, `type_beschadiging_roest`) VALUES
(2, 6, 5, 5, 3, 4, 5, 44, 5, 5);

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
  `keurings_datum` datetime NOT NULL DEFAULT current_timestamp(),
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
-- Gegevens worden geëxporteerd voor tabel `voorbladen`
--

INSERT INTO `voorbladen` (`opdracht_nummer`, `TCVT_nummer`, `soort_keuring`, `keurings_datum`, `uitvoerder`, `deskundige`, `opstelling_kraan`, `uitvoering_toren_haakhoogte`, `soort_giek`, `telescoopgiek_delen`, `opbouwgiek_meters`, `hulpgiek_meters`, `fly_jib_delen`, `gieklengte`, `topbaar`, `loopkat`, `verstelbare_giek`, `soort_stempels`, `tekortkomingen`, `afmelden_voor`, `toelichting`, `werk_instructie`, `kabel_leverancier`, `waarnemingen`, `handtekening`, `aantal_bedrijfsuren`, `afleg_redenen`) VALUES
(1, 99, 1, '2020-11-18 17:39:56', 1, 'Jeff', 'Stationair', 8, 'Hulp giek', 6.00, 3.00, 4.00, 88, 6.00, 4.00, 1, 0, 2, 1, '2020-11-26 00:00:00', 'Is goede kraan', 'Testen!', 'Technische Unie', 'Stukk', 'BR', 5.00, 'Ohno'),
(2, 88, 2, '2020-11-18 17:41:58', 1, 'Thomas', 'Railstellen', 77, 'Fly-jib', 5.00, 4.00, 3.00, 88, 4.00, 5.00, 1, 1, 1, 0, '2021-11-18 00:00:00', 'Helemaal in orde', 'Test de kabel', 'BMN', 'Kabel is in wel oke', 'BR', 7.00, 'Test opnieuw'),
(3, 9, 1, '2020-11-18 17:57:07', 2, 'Tom', 'Vrijstaand', 5, 'Hulp giek', 44.00, 5.00, 2.00, 8, 6.00, 8.00, 1, 1, 2, 1, '2020-12-05 00:00:00', 'Testtt', 'Werken!', 'Technische Unie', 'Boi', 'BR', 5.00, '55');

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
  MODIFY `afdeling_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruiker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `voorbladen`
--
ALTER TABLE `voorbladen`
  MODIFY `opdracht_nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
