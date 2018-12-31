-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2018 pada 16.05
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `imageInsert` (IN `naDep` VARCHAR(150), IN `naBel` VARCHAR(150), IN `dob` VARCHAR(20), IN `telpon` VARCHAR(20), IN `email` VARCHAR(200), IN `provinsi` VARCHAR(100), IN `kota` VARCHAR(100), IN `jalan` VARCHAR(200), IN `kdPos` VARCHAR(10), IN `noKtp` VARCHAR(25), IN `jabatan` VARCHAR(25), IN `rekBank` VARCHAR(50), IN `noRek` VARCHAR(50), IN `name` VARCHAR(100), IN `path` VARCHAR(200))  BEGIN
INSERT INTO employee (naDep, naBel, dob, telpon, email, provinsi, kota, jalan, kdPos, noKtp, rekBank, noRek, name, path) VALUES (naDep, naBel, dob, telpon, email, provinsi, kota, jalan, kdPos, noKtp, rekBank, noRek, name, path);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `naDep` varchar(150) NOT NULL,
  `naBel` varchar(150) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `jalan` varchar(200) NOT NULL,
  `kdPos` varchar(10) NOT NULL,
  `noKtp` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `rekBank` varchar(50) NOT NULL,
  `noRek` varchar(50) NOT NULL,
  `dateNow` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`naDep`, `naBel`, `dob`, `telpon`, `email`, `provinsi`, `kota`, `jalan`, `kdPos`, `noKtp`, `jabatan`, `rekBank`, `noRek`, `dateNow`, `name`, `path`) VALUES
('Hengky', 'Ramadhano', '1997-01-11', '085319323869', 'hengkyramadhano@gmail.com', 'Jakarta', 'Jakarta Pusat', 'Jalan Awaludin II No.19A RT/RW 002/017, Kelurahan Kebon Melati, Tanah Abang, Jakarta Pusat, DKI Jakarta. 10230', '10230', '180109110119970004', 'cto', 'mandiri', '00866455', '2018-12-02 09:50:23', 'hengky1.jpeg.jpeg', 'pics/hengky1.jpeg.jpeg'),
('Hengky', 'Ramadhano', '1997-01-11', '085319323869', 'hengkyramadhano@gmail.com', 'Jakarta', 'Jakarta Pusat', 'Jalan Awaludin II No.19A RT/RW 002/017, Kelurahan Kebon Melati, Tanah Abang, Jakarta Pusat, DKI Jakarta. 10230', '10230', '1809011019700054', 'cto', 'bni', '00645533325', '2018-12-02 10:08:11', 'image001.png', 'pics/image001.png'),
('Hengky', 'Ramadhano', '2018-12-01', '085319323869', 'hengkyramadhano@gmail.com', 'Jakarta', 'Jakarta Pusat', 'Jalan Awaludin II No.19A RT/RW 002/017, Kelurahan Kebon Melati, Tanah Abang, Jakarta Pusat, DKI Jakarta. 10230', '10230', '1809011019700054', 'cto', 'bca', '00866455665', '2018-12-02 10:19:16', '30april18BIP.jpg', 'pics/30april18BIP.jpg'),
('Hengky', 'Ramadhano', '1997-01-11', '085319323869', 'hengkyramadhano@gmail.com', 'Jakarta', 'Jakarta Pusat', 'Jalan Awaludin II No.19A RT/RW 002/017, Kelurahan Kebon Melati, Tanah Abang, Jakarta Pusat, DKI Jakarta. 10230', '10230', '1809011019700054', 'cto', 'bca', '008664553337', '2018-12-02 10:38:31', 'myw3schoolsimage.jpg', 'pics/myw3schoolsimage.jpg'),
('Hengky', 'Ramadhano', '1997-01-11', '085319323869', 'hengkyramadhano@gmail.com', 'Jakarta', 'Jakarta Barat', 'Jalan Awaludin II No.19A RT/RW 002/017, Kelurahan Kebon Melati, Tanah Abang, Jakarta Pusat, DKI Jakarta. 10230', '10230', '1809011019700054', 'cto', 'bca', '00645533325', '2018-12-02 10:41:15', 'IMG-20180824-WA0004.jpg', 'pics/IMG-20180824-WA0004.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `prov_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`, `prov_id`) VALUES
(1, 'Jakarta Barat', 1),
(2, 'Jakarta Pusat', 1),
(3, 'Bandung', 2),
(4, 'Sumedang', 2),
(5, 'Surabaya', 3),
(6, 'Kendari', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama_prov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_prov`) VALUES
(1, 'Jakarta'),
(2, 'Jawa Barat'),
(3, 'Jawa Timur'),
(4, 'Sulawesi Tenggara');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
