-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 13 Sty 2023, 14:51
-- Wersja serwera: 10.4.26-MariaDB-cll-lve
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zwik_dane`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykulyprojekt`
--

CREATE TABLE `artykulyprojekt` (
  `id` int(111) NOT NULL,
  `data` datetime NOT NULL,
  `autor` int(11) NOT NULL,
  `tytul` tinytext NOT NULL,
  `tekst` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `artykulyprojekt`
--

INSERT INTO `artykulyprojekt` (`id`, `data`, `autor`, `tytul`, `tekst`) VALUES
(87, '2020-12-15 12:11:22', 84, 'Skąd się to wzięło', '<p>W przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych sł&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazł niezaprzeczalne źr&oacute;dło: Lorem Ipsum pochodzi z fragment&oacute;w (1.10.32 i 1.10.33) &bdquo;de Finibus Bonorum et Malorum&rdquo;, czyli &bdquo;O granicy dobra i zła&rdquo;, napisanej właśnie w 45 p.n.e. przez Cycerona. Jest to bardzo popularna w czasach renesansu rozprawa na temat etyki. Pierwszy wiersz Lorem Ipsum, &bdquo;Lorem ipsum dolor sit amet...&rdquo; pochodzi właśnie z sekcji 1.10.32Standardowy blok Lorem Ipsum, używany od XV wieku, jest odtworzo'),
(89, '2021-01-04 12:12:36', 84, 'Do czego tego użyć?', '<p>Og&oacute;lnie znana teza głosi, iż użytkownika może rozpraszać zrozumiała zawartość strony, kiedy ten chce zobaczyć sam jej wygląd. Jedną z mocnych stron używania Lorem Ipsum jest to, że ma wiele r&oacute;żnych &bdquo;kombinacji&rdquo; zdań, sł&oacute;w i akapit&oacute;w, w przeciwieństwie do zwykłego: &bdquo;tekst, tekst, tekst&rdquo;, sprawiającego, że wygląda to &bdquo;zbyt czytelnie&rdquo; po polsku. Wielu webmaster&oacute;w i designer&oacute;w używa Lorem Ipsum jako domyślnego modelu tekstu i wpisanie w internetowej wyszukiwarce &lsquo;lorem ipsum&rsquo; spowoduje znalezienie bardzo wielu stron, kt&oacute;re wciąż są w budowie. Wiele wersji tekstu ewoluowało i zmieniało się przez lata, czasem przez przypadek, czasem specjalnie (humorystyczne wstawki itd)</p>'),
(105, '0000-00-00 00:00:00', 84, 'Czym jest Lorem Ipsum?', '<p>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem pr&oacute;bnej książki. Pięć wiek&oacute;w p&oacute;źniej zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym r&oacute;żne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druk&oacute;w na komputerach osobistych, jak Aldus PageMaker</p>');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykulyprojekt`
--
ALTER TABLE `artykulyprojekt`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `artykulyprojekt`
--
ALTER TABLE `artykulyprojekt`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
