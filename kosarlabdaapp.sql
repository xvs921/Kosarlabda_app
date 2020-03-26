-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Már 25. 11:13
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kosarlabdaapp`
--
CREATE DATABASE IF NOT EXISTS `kosarlabdaapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `kosarlabdaapp`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapatok`
--

CREATE TABLE `csapatok` (
  `id` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `lejatszott` int(11) NOT NULL,
  `nyert` int(11) NOT NULL,
  `vesztett` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapatok`
--

INSERT INTO `csapatok` (`id`, `nev`, `lejatszott`, `nyert`, `vesztett`) VALUES
(1, 'Los Angeles Lakers', 4, 3, 0),
(2, 'Los Angeles Clippers', 10, 3, 5),
(3, 'Milwaukee Bucks', 4, 3, 1),
(4, 'Golden State Warriors', 1, 0, 1),
(5, 'Toronto Raptors', 2, 0, 2),
(6, 'Boston Celtics', 1, 0, 0),
(7, 'eladott', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapattagok`
--

CREATE TABLE `csapattagok` (
  `id` int(11) NOT NULL,
  `csapatok.id` int(11) NOT NULL,
  `jatekosok.id` int(11) NOT NULL,
  `sorszam` int(11) NOT NULL,
  `kezdo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapattagok`
--

INSERT INTO `csapattagok` (`id`, `csapatok.id`, `jatekosok.id`, `sorszam`, `kezdo`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 2, 1),
(3, 1, 3, 3, 1),
(4, 1, 4, 4, 1),
(5, 1, 5, 5, 0),
(6, 1, 6, 6, 0),
(7, 1, 7, 7, 0),
(8, 1, 8, 8, 0),
(9, 1, 9, 9, 0),
(10, 1, 10, 10, 0),
(11, 1, 11, 11, 0),
(12, 1, 12, 12, 1),
(13, 2, 13, 1, 1),
(14, 2, 14, 2, 1),
(15, 2, 15, 3, 1),
(16, 2, 16, 4, 1),
(17, 2, 17, 5, 1),
(18, 2, 18, 6, 0),
(19, 2, 19, 7, 0),
(20, 2, 20, 8, 0),
(21, 2, 21, 9, 0),
(22, 2, 22, 10, 0),
(23, 2, 23, 11, 0),
(24, 2, 24, 12, 0),
(25, 3, 25, 1, 1),
(26, 3, 26, 2, 1),
(27, 3, 27, 3, 1),
(28, 3, 28, 4, 1),
(29, 3, 29, 5, 1),
(30, 3, 30, 6, 0),
(31, 3, 31, 7, 0),
(32, 3, 32, 8, 0),
(33, 3, 33, 9, 0),
(34, 3, 34, 10, 0),
(35, 3, 35, 11, 0),
(36, 3, 36, 12, 0),
(37, 3, 37, 13, 0),
(38, 3, 38, 14, 0),
(39, 3, 39, 15, 0),
(40, 4, 40, 1, 1),
(41, 4, 41, 2, 1),
(42, 4, 42, 3, 1),
(43, 4, 43, 4, 1),
(44, 4, 44, 5, 1),
(45, 4, 45, 6, 0),
(46, 4, 46, 7, 0),
(47, 4, 47, 8, 0),
(48, 4, 48, 9, 0),
(49, 4, 49, 10, 0),
(50, 4, 50, 11, 0),
(51, 4, 51, 12, 0),
(52, 5, 52, 1, 1),
(53, 5, 53, 2, 1),
(54, 5, 54, 3, 1),
(55, 5, 55, 4, 1),
(56, 5, 56, 5, 0),
(57, 5, 57, 6, 0),
(58, 5, 58, 7, 0),
(59, 5, 59, 8, 0),
(60, 5, 60, 9, 0),
(61, 5, 61, 10, 1),
(62, 5, 62, 11, 0),
(63, 5, 63, 12, 0),
(64, 5, 64, 13, 0),
(65, 5, 65, 14, 0),
(66, 5, 66, 15, 0),
(67, 6, 67, 1, 1),
(68, 6, 68, 2, 1),
(69, 6, 69, 3, 1),
(70, 6, 70, 4, 1),
(71, 6, 71, 5, 1),
(72, 6, 72, 6, 0),
(73, 6, 73, 7, 0),
(74, 6, 74, 8, 0),
(75, 6, 75, 9, 0),
(76, 6, 76, 10, 0),
(77, 6, 77, 11, 0),
(78, 6, 78, 12, 0),
(79, 6, 79, 13, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `csapatok.id` int(11) NOT NULL,
  `penz` int(11) NOT NULL,
  `aktiv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jatekosok`
--

CREATE TABLE `jatekosok` (
  `id` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `osszPontszam` int(11) NOT NULL,
  `3pontos` int(11) NOT NULL,
  `zsakolas` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `kep` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jatekosok`
--

INSERT INTO `jatekosok` (`id`, `nev`, `osszPontszam`, `3pontos`, `zsakolas`, `ar`, `kep`) VALUES
(1, 'Anthony Davis', 96, 76, 86, 420000, 'anthonydavis.png'),
(2, 'DeMarcus Cousins', 81, 68, 82, 38000, 'demarcuscousins.png'),
(3, 'JaVale McGee', 80, 43, 90, 37000, 'javalemcgee.png'),
(4, 'Dwight Howard', 80, 54, 85, 32000, 'dwighthoward.png'),
(5, 'Kyle Kuzma', 78, 78, 80, 31000, 'kylekuzma.png'),
(6, 'Rajon Rondo', 77, 80, 30, 28000, 'rajonrondo.png'),
(7, 'Danny Green', 77, 82, 63, 25000, 'dannygreen.png'),
(8, 'Avery Bradley', 75, 66, 50, 23000, 'averybradley.png'),
(9, 'Kentavious Caldwell-Pope', 74, 87, 73, 22000, 'kentaviouscaldwell-pope.png'),
(10, 'Alex Caruso', 74, 75, 75, 18000, 'alexcaruso.png'),
(11, 'Quinn Cook', 73, 80, 30, 11000, 'quinncook.png'),
(12, 'LeBron James', 97, 78, 85, 420000, 'lebronjames.png'),
(13, 'Kawhi Leonard', 96, 81, 86, 420000, 'kawhileonard.png'),
(14, 'Paul George', 90, 83, 85, 420000, 'paulgeorge.png'),
(15, 'Montrezl Harrell', 85, 40, 85, 110000, 'montrezlharrell.png'),
(16, 'Lou Williams', 82, 79, 45, 110000, 'louwilliams.png'),
(17, 'Marcus Morris', 81, 87, 70, 110000, 'marcusmorris.png'),
(18, 'Reggie Jackson', 79, 83, 69, 152300, 'reggiejackson.png'),
(19, 'Patrick Beverley', 78, 79, 30, 152300, 'patrickbeverley.png'),
(20, 'Ivica Zubac', 78, 26, 60, 54435, 'ivicazubac.png'),
(21, 'Patrick Patterson', 75, 81, 75, 54435, 'patrickpatterson.png'),
(22, 'Landry Shamet', 74, 84, 75, 154, 'landryshamet.png'),
(23, 'JaMychal Green', 73, 79, 70, 55455, 'jaMychalgreen.png'),
(24, 'Rodney McGruder', 71, 65, 50, 6454, 'rodneymcgruder.png'),
(25, 'Giannis Antetokounmpo', 97, 74, 95, 420000, 'giannisantetokounmpo.png'),
(26, 'Khris Middleton', 87, 87, 55, 145000, 'khrismiddleton.png'),
(27, 'Eric Bledsoe', 84, 78, 75, 54488, 'ericbledsoe.png'),
(28, 'Brook Lopez', 79, 72, 60, 54488, 'brooklopez.png'),
(29, 'George Hill', 79, 89, 45, 1545, 'georgehill.png'),
(30, 'Ersan Ilyasova', 78, 81, 55, 546, 'ersanilyasova.png'),
(31, 'Donte DiVincenzo', 78, 77, 80, 546, 'dontedivincenzo.png'),
(32, 'Wesley Matthews', 75, 81, 70, 24552, 'wesleymatthews.png'),
(33, 'Robin Lopez', 75, 70, 60, 24552, 'robinlopez.png'),
(34, 'Marvin Williams', 75, 81, 66, 534, 'marvinwilliams.png'),
(35, 'Pat Connaughton', 74, 73, 86, 534, 'patconnaughton.png'),
(36, 'Sterling Brown', 73, 77, 50, 44555, 'sterlingbrown.png'),
(37, 'Kyle Korver', 73, 84, 25, 44555, 'kylekorver.png'),
(38, 'D.J. Wilson', 70, 69, 66, 14000, 'djwilson.png'),
(39, 'Thanasis Antetokounmpo', 70, 66, 89, 14000, 'thanasisantetokounmpo.png'),
(40, 'Stephen Curry', 95, 99, 36, 142000, 'StephenCurry.png'),
(41, 'Klay Thompson', 89, 95, 65, 142000, 'KlayThompson.png'),
(42, 'Andrew Wiggins', 82, 77, 94, 420000, 'AndrewWiggins.png'),
(43, 'Draymond Green', 79, 70, 70, 122000, 'DraymondGreen.png'),
(44, 'Eric Paschall', 78, 70, 65, 67000, 'EricPaschall.png'),
(45, 'Kevon Looney', 77, 40, 70, 64000, 'KevonLooney.png'),
(46, 'Marquese Chriss', 77, 60, 90, 64000, 'MarqueseChriss.png'),
(47, 'Damion Lee', 75, 80, 65, 45000, 'DamionLee.png'),
(48, 'Jordan Poole', 72, 66, 65, 34000, 'JordanPoole.png'),
(49, 'Ky Bowman', 72, 76, 35, 34000, 'KyBowman.png'),
(50, 'Alen Smailagic', 71, 59, 65, 43000, 'AlenSmailagic.png'),
(51, 'Dragan Bender', 70, 70, 65, 41000, 'DraganBender.png'),
(52, 'Pascal Siakam', 89, 82, 80, 420000, 'PascalSiakam.png'),
(53, 'Kyle Lowry', 86, 79, 25, 122032, 'KyleLowry.png'),
(54, 'Fred VanVleet', 83, 83, 35, 142365, 'FredVanVleet.png'),
(55, 'Serge Ibaka', 81, 83, 80, 142000, 'SergeIbaka.png'),
(56, 'OG Anunoby', 79, 81, 80, 123231, 'OGAnunoby.png'),
(57, 'Norman Powell', 79, 84, 75, 12351, 'NormanPowell.png'),
(58, 'Terence Davis', 79, 87, 75, 11133, 'TerenceDavis.png'),
(59, 'Chris Boucher', 78, 71, 55, 13513, 'ChrisBoucher.png'),
(60, 'Rondae Hollis-Jefferson', 78, 50, 89, 16531, 'RondaeHollis-Jefferson.png'),
(61, 'Marc Gasol', 77, 84, 58, 135135, 'MarcGasol.png'),
(62, 'Matt Thomas', 74, 92, 55, 15545, 'MattThomas.png'),
(63, 'Patrick McCaw', 73, 81, 75, 5445, 'PatrickMcCaw.png'),
(64, 'Stanley Johnson', 73, 71, 55, 65646, 'StanleyJohnson.png'),
(65, 'Malcolm Miller', 69, 84, 75, 1616, 'MalcolmMiller.png'),
(66, 'Dewan Hernandez', 68, 29, 65, 21000, 'DewanHernandez.png'),
(67, 'Kemba Walker', 87, 82, 30, 350000, 'KembaWalker.png'),
(68, 'Jayson Tatum', 86, 84, 90, 390000, 'JaysonTatum.png'),
(69, 'Jaylen Brown', 85, 82, 85, 340000, 'JaylenBrown.png'),
(70, 'Gordon Hayward', 82, 83, 75, 310000, 'GordonHayward.png'),
(71, 'Marcus Smart', 80, 79, 50, 280000, 'MarcusSmart.png'),
(72, 'Daniel Theis', 80, 73, 87, 280000, 'DanielTheis.png'),
(73, 'Enes Kanter', 80, 55, 58, 240000, 'EnesKanter.png'),
(74, 'Robert Williams III', 76, 25, 80, 240000, 'RobertWilliamsIII.png'),
(75, 'Brad Wanamaker', 74, 80, 54, 180000, 'BradWanamaker.png'),
(76, 'Vincent Poirier', 73, 55, 60, 165000, 'VincentPoirier.png'),
(77, 'Romeo Langford', 72, 70, 73, 125500, 'RomeoLangford.png'),
(78, 'Javonte Green', 73, 71, 87, 120500, 'JavonteGreen.png'),
(79, 'Tacko Fall', 68, 30, 55, 80000, 'TackoFall.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jogok`
--

CREATE TABLE `jogok` (
  `id` int(11) NOT NULL,
  `felhasznalok.id` int(11) NOT NULL,
  `jogosultsagok.id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jogosultsagok`
--

CREATE TABLE `jogosultsagok` (
  `id` int(11) NOT NULL,
  `nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jogosultsagok`
--

INSERT INTO `jogosultsagok` (`id`, `nev`) VALUES
(1, 'admin'),
(2, 'moderartor'),
(3, 'felhasznalo');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `meccsek`
--

CREATE TABLE `meccsek` (
  `id` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `csapat1.id` int(11) NOT NULL,
  `csapat2.id` int(11) NOT NULL,
  `eredmeny1` int(11) NOT NULL,
  `eredmeny2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapatok`
--
ALTER TABLE `csapatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `csapattagok`
--
ALTER TABLE `csapattagok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jatekosok.id` (`jatekosok.id`),
  ADD KEY `csapatok.id` (`csapatok.id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `csapat.id` (`csapatok.id`) USING BTREE;

--
-- A tábla indexei `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `jogok`
--
ALTER TABLE `jogok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo.id` (`felhasznalok.id`,`jogosultsagok.id`),
  ADD KEY `jogosultsagok.id` (`jogosultsagok.id`);

--
-- A tábla indexei `jogosultsagok`
--
ALTER TABLE `jogosultsagok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `meccsek`
--
ALTER TABLE `meccsek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `csapat1.id` (`csapat1.id`,`csapat2.id`),
  ADD KEY `csapat2.id` (`csapat2.id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `csapatok`
--
ALTER TABLE `csapatok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `csapattagok`
--
ALTER TABLE `csapattagok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT a táblához `jatekosok`
--
ALTER TABLE `jatekosok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT a táblához `jogok`
--
ALTER TABLE `jogok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT a táblához `jogosultsagok`
--
ALTER TABLE `jogosultsagok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `meccsek`
--
ALTER TABLE `meccsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `csapattagok`
--
ALTER TABLE `csapattagok`
  ADD CONSTRAINT `csapattagok_ibfk_1` FOREIGN KEY (`csapatok.id`) REFERENCES `csapatok` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `csapattagok_ibfk_2` FOREIGN KEY (`jatekosok.id`) REFERENCES `jatekosok` (`id`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD CONSTRAINT `felhasznalok_ibfk_1` FOREIGN KEY (`csapatok.id`) REFERENCES `csapatok` (`id`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `jogok`
--
ALTER TABLE `jogok`
  ADD CONSTRAINT `jogok_ibfk_1` FOREIGN KEY (`felhasznalok.id`) REFERENCES `felhasznalok` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jogok_ibfk_2` FOREIGN KEY (`jogosultsagok.id`) REFERENCES `jogosultsagok` (`id`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `meccsek`
--
ALTER TABLE `meccsek`
  ADD CONSTRAINT `meccsek_ibfk_1` FOREIGN KEY (`csapat1.id`) REFERENCES `csapatok` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `meccsek_ibfk_2` FOREIGN KEY (`csapat2.id`) REFERENCES `csapatok` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
