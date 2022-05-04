-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Jan 2022 pada 20.49
-- Versi server: 10.3.32-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1125077_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1 = ADMIN\r\n2 = CS',
  `chunk` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `api_key`, `level`, `chunk`) VALUES
(7, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'e3655e3db3aab8e6c016458ac80f83aa6d5f3c23', '1', 67),
(94, 'dsd', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99', '3aa23f9a7e12b709668509a0fdcfaee4c37db97b', '1', 60),
(95, 'admin1212', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'f357b1fbd8b785744cc447b62d6d2f37578f566c', '1', 100),
(96, 'respecker', '6c01d6c4d1e582be289df7733a9f1830ace80a7e', '4fbe6e84feadd0c347744e205c918e18608e8bcf', '1', 60),
(97, 'ucilkecil387', '23e38487d443d85c4f78903932e18ca930194aea', '5e986cd5bb7b6b1dddc8e0e34e82a2547846b590', '1', 60),
(98, 'noname', 'e21bfc14ad6d40e861c7ffaeba574bb61e9ae49f', '63e6686d51d744cd2e6c19a43c9595b4aa08d2ab', '1', 60),
(99, 'admin123', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2cff9ba72ffcaecaf606718a1cebef77f4c639f4', '1', 60),
(100, 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'fa458507fd54266e98db255b2a707e3f1eea0d3a', '1', 60),
(101, 'administerator', 'c45022dff98e693edcad8017212558dda92b6e6c', '7b290faa841100dd15c47d66ab78002770eff05c', '1', 60),
(102, 'alvinno', '8cb2237d0679ca88db6464eac60da96345513964', 'd09f37c364e1ea82d0392d04f97127338b8be947', '1', 60),
(103, 'alvinno31', '8cb2237d0679ca88db6464eac60da96345513964', '908b04a3c497cdc58313998d11e930322cc2c98e', '1', 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `all_contacts`
--

CREATE TABLE `all_contacts` (
  `id` int(11) NOT NULL,
  `sender` varchar(111) NOT NULL,
  `number` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `type` enum('Personal','Group') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `autoreply`
--

CREATE TABLE `autoreply` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8 NOT NULL,
  `response` varchar(255) CHARACTER SET utf8 NOT NULL,
  `media` text NOT NULL,
  `nomor` varchar(15) NOT NULL DEFAULT '0',
  `make_by` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `autoreply`
--

INSERT INTO `autoreply` (`id`, `keyword`, `response`, `media`, `nomor`, `make_by`) VALUES
(7, 'halo', 'Halo juga', '', '6282231376068', 'admin1212'),
(8, 'hi', 'lama bngetb sajdhsdjfhsdf', '', '6282231376068', 'admin1212'),
(9, 'Siang', 'Mantap', '', '6282231376068', 'admin1212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `sender` varchar(111) NOT NULL,
  `number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Personal','Group','','') NOT NULL,
  `make_by` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `pemilik` varchar(111) NOT NULL,
  `nomor` varchar(14) NOT NULL,
  `link_webhook` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`id`, `pemilik`, `nomor`, `link_webhook`) VALUES
(23, 'respecker', '6285840300674', ''),
(26, 'Admin1212', '6285746693074', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomor`
--

CREATE TABLE `nomor` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `make_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nomor`
--

INSERT INTO `nomor` (`id`, `nama`, `nomor`, `pesan`, `make_by`) VALUES
(9, 'Mas imron', '085230279990', '085230279990', 'Admin1212'),
(12, 'Djobs Cleaning', '081112300184', 'Tes', 'ucilkecil387'),
(13, 'Sakti Buana', '085720502217', 'Assalamualaikum kak Sakti!', 'admin1212'),
(16, 'B. SUPIYA', '082140561392', '', 'admin1212'),
(17, 'B. RAHNA', '081230917327', '', 'admin1212'),
(18, 'B. JUMAIYA', '082330230919', '', 'admin1212'),
(19, 'B. SAMAI', '085335137773', '', 'admin1212'),
(20, 'B. SUDARSO', '081230163620', '', 'admin1212'),
(21, 'B. SHALEHATI', '081233939409', '', 'admin1212'),
(22, 'B. JUNIO', '085236544585', '', 'admin1212'),
(23, 'B. KARYO', '082232070413', '', 'admin1212'),
(24, 'TOYATI DULLA', '082318207967', '', 'admin1212'),
(25, 'B. SATI', '082325646362', '', 'admin1212'),
(26, 'SIRI NARYO', '089602007450', '', 'admin1212'),
(27, 'TI SUNAI', '085235206866', '', 'admin1212'),
(28, 'MARIA B. NIPA', '082359386590', '', 'admin1212'),
(29, 'ARMINA', '082299347822', '', 'admin1212'),
(30, 'AT NAMA', '082336419824', '', 'admin1212'),
(31, 'MUYAMI', '085204862189', '', 'admin1212'),
(32, 'SARINA', '082335488874', '', 'admin1212'),
(33, 'SALATI', '082330876002', '', 'admin1212'),
(34, 'AMRIYA', '085232299660', '', 'admin1212'),
(35, 'PATIMA', '082337080099', '', 'admin1212'),
(36, 'B. JARNO', '082211970359', '', 'admin1212'),
(37, 'SUS DARMO', '085259707548', '', 'admin1212'),
(38, 'MUHARI', '085204558703', '', 'admin1212'),
(39, 'ISA YANTO', '082301506781', '', 'admin1212'),
(40, 'SAYATI', '083852188299', '', 'admin1212'),
(41, 'SAFIUNA', '085204600841', '', 'admin1212'),
(42, 'SUGIA SUNAR', '082234744146', '', 'admin1212'),
(43, 'ATI SUNARDI', '089162834500', '', 'admin1212'),
(44, 'FATIMA B. JUPRI', '085231267753', '', 'admin1212'),
(45, 'ATINA', '08980490213', '', 'admin1212'),
(46, 'BU INI', '082330611046', '', 'admin1212'),
(47, 'BUNIMA', '085235564334', '', 'admin1212'),
(48, 'NYI SANATI', '085858907690', '', 'admin1212'),
(49, 'SANIMA', '082325570260', '', 'admin1212'),
(50, 'SARINTEN', '081321983062', '', 'admin1212'),
(51, 'HJ BAIHAQI AMA', '082301279946', '', 'admin1212'),
(52, 'MAATI', '085292224793', '', 'admin1212'),
(53, 'HALIMAH', '085232806357', '', 'admin1212'),
(54, 'TORIMA', '082272332156', '', 'admin1212'),
(55, 'SUHARI', '082330103705', '', 'admin1212'),
(56, 'SARI', '082347078269', '', 'admin1212'),
(57, 'MUHAMMAD', '082335982203', '', 'admin1212'),
(58, 'DURA', '082331600399', '', 'admin1212'),
(59, 'TI ASIK', '085330789398', '', 'admin1212'),
(60, 'SUWADI', '082330425756', '', 'admin1212'),
(61, 'NITI GATOT', '085259001628', '', 'admin1212'),
(62, 'NITI KARDI', '085336154500', '', 'admin1212'),
(63, 'KAMSURI', '085258884155', '', 'admin1212'),
(64, 'NIPA', '082331600401', '', 'admin1212'),
(65, 'KASUNI', '085219346975', '', 'admin1212'),
(66, 'MUJO', '082316338701', '', 'admin1212'),
(67, 'TIJA', '082248165079', '', 'admin1212'),
(68, 'KARSUMO', '085347983324', '', 'admin1212'),
(69, 'TILA', '082245809839', '', 'admin1212'),
(70, 'B. GUSPO', '085334806730', '', 'admin1212'),
(71, 'B. PIYA COKRO', '082336176087', '', 'admin1212'),
(72, 'ADIYA', '085336950514', '', 'admin1212'),
(73, 'B. SUMRATI', '082331600316', '', 'admin1212'),
(74, 'B. SUNARSI', '085236764242', '', 'admin1212'),
(75, 'B. MARYATI', '082323580054', '', 'admin1212'),
(76, 'B. MARSO', '085232067294', '', 'admin1212'),
(77, 'B. MARI', '082257433161', '', 'admin1212'),
(78, 'B. NASI', '085258884342', '', 'admin1212'),
(79, 'B. TIPYO', '085253419721', '', 'admin1212'),
(80, 'B. MAHROYO', '082231736671', '', 'admin1212'),
(81, 'B. SUGITO', '085258601418', '', 'admin1212'),
(82, 'B. MISRAMI', '085258992820', '', 'admin1212'),
(83, 'B. SADRINA', '082330870499', '', 'admin1212'),
(84, 'B. ROHAYA', '085204225677', '', 'admin1212'),
(85, 'B. NOTOYATI', '082334094710', '', 'admin1212'),
(86, 'B. SUTOMO', '082266297778', '', 'admin1212'),
(87, 'B. RI TILA', '081946692866', '', 'admin1212'),
(88, 'B. SUMO', '085334806740', '', 'admin1212'),
(89, 'B. WAR', '085257266168', '', 'admin1212'),
(90, 'B. SAHRI', '083173850848', '', 'admin1212'),
(91, 'B. SURYO', '085235442281', '', 'admin1212'),
(92, 'B. SAPPA', '082336107472', '', 'admin1212'),
(93, 'B. MADAR', '085330709013', '', 'admin1212'),
(94, 'B. SUDOSO', '085258446237', '', 'admin1212'),
(95, 'B. NASIR', '085258987569', '', 'admin1212'),
(96, 'B. SU', '082231407664', '', 'admin1212'),
(97, 'B. BURWO', '085230286881', '', 'admin1212'),
(98, 'B. DARTO', '085259458520', '', 'admin1212'),
(99, 'B. SADINI', '082133465715', '', 'admin1212'),
(100, 'B. TINA', '085115348280', '', 'admin1212'),
(101, 'B. YON', '085257618024', '', 'admin1212'),
(102, 'B. SUKI', '085204591547', '', 'admin1212'),
(103, 'B. MUSRIYA', '085235440476', '', 'admin1212'),
(104, 'B. SUBANDRI', '082331115234', '', 'admin1212'),
(105, 'B. MARIA', '085231626383', '', 'admin1212'),
(106, 'B. TO SAKI', '082325580207', '', 'admin1212'),
(107, 'B. MISNARI', '082301284448', '', 'admin1212'),
(108, 'B. NURKHALID', '085226535371', '', 'admin1212'),
(109, 'B. YA SURYO', '085330889353', '', 'admin1212'),
(110, 'B. LAKSUNA', '083850165635', '', 'admin1212'),
(111, 'B. PANALI', '082302313891', '', 'admin1212'),
(112, 'B. SE', '082143020031', '', 'admin1212'),
(113, 'B. BUYATI', '082233702567', '', 'admin1212'),
(114, 'B. TIROZI', '081231941651', '', 'admin1212'),
(115, 'B. SUMITRO', '085236413498', '', 'admin1212'),
(116, 'B. NATUN', '085226679101', '', 'admin1212'),
(117, 'B. TIMA MIN', '085230225561', '', 'admin1212'),
(118, 'B. MARYAM NIRANI', '085236308477', '', 'admin1212'),
(119, 'B. MARLINA', '082331041950', '', 'admin1212'),
(120, 'B. NIMA CITO', '085292208118', '', 'admin1212'),
(121, 'B. PANALI SIRUN ', '085339936073', '', 'admin1212'),
(122, 'B. SUPTILA', '085335092640', '', 'admin1212'),
(123, 'B. MARYA', '082338621899', '', 'admin1212'),
(124, 'B. SUTRIYAMI', '083853398713', '', 'admin1212'),
(125, 'B. ETI', '082237233235', '', 'admin1212'),
(126, 'B. JUMANTEN', '083139285349', '', 'admin1212'),
(127, 'B. MISRANI', '083131146802', '', 'admin1212'),
(128, 'B. SULA', '081336235560', '', 'admin1212'),
(129, 'B. SUPIK', '081336483094', '', 'admin1212'),
(130, 'B. PA', '081321983076', '', 'admin1212'),
(131, 'B. ANI', '085257540950', '', 'admin1212'),
(132, 'B. TI', '082337170318', '', 'admin1212'),
(133, 'B. RUSYANI', '085233076354', '', 'admin1212'),
(134, 'B. MUNA', '082261504872', '', 'admin1212'),
(135, 'B. TARSUS', '082302316650', '', 'admin1212'),
(136, 'B. WI', '082229288554', '', 'admin1212'),
(137, 'B. SUKADIR', '081334275711', '', 'admin1212'),
(138, 'B. LIYES', '085231099095', '', 'admin1212'),
(139, 'B. SANTO', '085231099085', '', 'admin1212'),
(140, 'B. HAR', '082331486530', '', 'admin1212'),
(141, 'B. NU', '087836686160', '', 'admin1212'),
(142, 'B. MUKTI', '081336640777', '', 'admin1212'),
(143, 'B. MURTIPA', '082315575577', '', 'admin1212'),
(144, 'Arif', '082301843483', 'test aplikasi fifin', 'admin1212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `sender` varchar(15) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `pesan` text CHARACTER SET utf8 NOT NULL,
  `media` varchar(255) DEFAULT NULL,
  `status` enum('MENUNGGU JADWAL','GAGAL','TERKIRIM') NOT NULL DEFAULT 'MENUNGGU JADWAL',
  `jadwal` datetime NOT NULL,
  `make_by` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `receive_chat`
--

CREATE TABLE `receive_chat` (
  `id` int(11) NOT NULL,
  `id_pesan` varchar(200) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `from_me` enum('0','1') NOT NULL DEFAULT '0',
  `nomor_saya` varchar(255) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `all_contacts`
--
ALTER TABLE `all_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `autoreply`
--
ALTER TABLE `autoreply`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nomor`
--
ALTER TABLE `nomor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `receive_chat`
--
ALTER TABLE `receive_chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `all_contacts`
--
ALTER TABLE `all_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `autoreply`
--
ALTER TABLE `autoreply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `nomor`
--
ALTER TABLE `nomor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `receive_chat`
--
ALTER TABLE `receive_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
