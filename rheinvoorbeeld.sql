-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 nov 2020 om 01:36
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
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruiker_ID` int(11) NOT NULL,
  `voor_naam` varchar(255) NOT NULL,
  `achter_naam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '874e0cc1eb15bdaf323800180d19d69fe4ba2cedd2954ab332e25a2a85ab3248',
  `afdeling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruiker_ID`, `voor_naam`, `achter_naam`, `tussenvoegsel`, `username`, `password`, `afdeling`) VALUES
(1, 'Bart', 'Rooijakkers', NULL, 'bart.ar', '874e0cc1eb15bdaf323800180d19d69fe4ba2cedd2954ab332e25a2a85ab3248', 1),
(2, 'Admin', 'istrator', NULL, 'admin', '874e0cc1eb15bdaf323800180d19d69fe4ba2cedd2954ab332e25a2a85ab3248', 12);

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
(15, 70, '2020-11-19 00:00:00', 4.00, 111.00, 222.00, 3131.00, 1313.00, 13123, 12312.00, 123123.00, 132123.00, 12312.00, 3213.00, 0),
(16, 2131321, '2020-11-19 00:00:00', 12313.00, 12312312.00, 312312.00, 3123123.00, 213123.00, 2132, 13123.00, 12312.00, 21312.00, 21312.00, 31231.00, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kabelchecklisten`
--

CREATE TABLE `kabelchecklisten` (
  `opdracht_nummer` int(11) NOT NULL,
  `kabel_ID` int(11) NOT NULL,
  `draadbreuk_6D` int(11) NOT NULL,
  `draadbreuk_30D` int(11) NOT NULL,
  `beschadiging_buitzenzijde` int(11) NOT NULL,
  `beschadiging_roest_corrosie` int(11) NOT NULL,
  `verminderde_kabeldiameter` int(11) NOT NULL,
  `positie_meetpunten` int(11) NOT NULL,
  `beschadiging_totaal` int(11) NOT NULL,
  `type_beschadiging_roest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `kabelchecklisten`
--

INSERT INTO `kabelchecklisten` (`opdracht_nummer`, `kabel_ID`, `draadbreuk_6D`, `draadbreuk_30D`, `beschadiging_buitzenzijde`, `beschadiging_roest_corrosie`, `verminderde_kabeldiameter`, `positie_meetpunten`, `beschadiging_totaal`, `type_beschadiging_roest`) VALUES
(17, 9, 5, 5, 5, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keuringsitems`
--

CREATE TABLE `keuringsitems` (
  `opdracht_nummer` int(11) NOT NULL,
  `keurings_onderdeel` int(11) NOT NULL,
  `directe_voorziening` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `keuringsitems`
--

INSERT INTO `keuringsitems` (`opdracht_nummer`, `keurings_onderdeel`, `directe_voorziening`) VALUES
(1, 28, 4);

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
  `opstelling_kraan` int(11) NOT NULL,
  `uitvoering_toren_haakhoogte` int(11) NOT NULL,
  `soort_giek` int(11) NOT NULL,
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
(15, 80, 1, '2020-11-07 00:00:00', 1, 'Thomas', 0, 80, 0, 4.00, 1.00, 3.00, 43, 21.00, 22.00, 0, 0, 8, 13, '2020-11-13 00:00:00', 'Hoertje', 'Hoertje', 'Hoertje', 'Hoertje', 'Hoertje', 11.00, 'Hoertje'),
(16, 11221, 1, '2020-11-07 00:00:00', 1, '231231', 0, 123123, 0, 123123.00, 12312.00, 3123123.00, 123123, 123123.00, 213123.00, 0, 0, 3123123, 127, '2020-11-27 00:00:00', '123123', '123123', '213213', '3123', '12312', 2313.00, '123'),
(17, 77, 2, '2020-11-10 01:26:20', 1, 'Thom', 122, 333, 12, 4.00, 4.00, 4.00, 4, 4.00, 4.00, 8, 8, 88, 8, '2020-10-21 00:00:00', 'ssadsd', 'sdasdsa', 'dasdasd', 'sadsad', 'asdsadsa', 11.00, 'sadasd');

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruiker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `voorbladen`
--
ALTER TABLE `voorbladen`
  MODIFY `opdracht_nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
