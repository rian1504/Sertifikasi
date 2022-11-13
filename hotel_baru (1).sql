-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2022 pada 04.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'rian', 'rian1', 'rian0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_hotel` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_hotel`, `id_admin`, `nama_fasilitas`, `keterangan`, `gambar`) VALUES
(1, 1, 'Bar', 'Mini bar yang mewah', 'bar.jpg'),
(2, 1, 'Gym', 'Perlengkapan gym lengkap', 'gym.jpeg'),
(3, 1, 'Dapur', 'Dapur yang digunakan berstandar international', 'kitchen.jpg'),
(4, 1, 'Kolam Renang', 'Berada di lantai 3 dengan luas 50m persegi', 'kolam_renang.jpg'),
(5, 1, 'Ruang Makan', 'Ruang makan yang luas dan cocok untuk keluarga', 'ruang_makan.jpg'),
(6, 1, 'Spa', 'Pemijat professional yang akan melayani anda', 'spa.jpg'),
(8, 1, 'Lobby', 'Lobby untuk tempat menunggu tamu yang nyaman dan bersih', 'lobby.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas_kamar` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tipe_kamar` varchar(30) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas_kamar`, `id_kamar`, `id_admin`, `tipe_kamar`, `nama_fasilitas`) VALUES
(7, 6, 1, 'Superior', 'TV 32 inch'),
(8, 7, 1, 'Deluxe', 'TV 40 inch'),
(9, 7, 1, 'Deluxe', 'Bath Tub'),
(10, 7, 1, 'Deluxe', 'Cofee Maker'),
(11, 8, 1, 'Family', 'Ranjang Panjang'),
(12, 8, 1, 'Family', '4 Ranjang'),
(13, 6, 1, 'Superior', 'Tea Maker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tipe_kamar` varchar(30) NOT NULL,
  `jumlah_kamar` int(2) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_admin`, `tipe_kamar`, `jumlah_kamar`, `gambar`) VALUES
(6, 1, 'Superior', 30, 'superior.jpg'),
(7, 1, 'Deluxe', 40, 'deluxe.jpg'),
(8, 1, 'Family', 20, 'family.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resepsionis`
--

CREATE TABLE `resepsionis` (
  `id_resepsionis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resepsionis`
--

INSERT INTO `resepsionis` (`id_resepsionis`, `nama`, `username`, `password`) VALUES
(1, 'rian', 'rian2', 'rian8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_resepsionis` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_handphone` bigint(15) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `tipe_kamar` varchar(30) NOT NULL,
  `tgl_check_in` date NOT NULL,
  `tgl_check_out` date NOT NULL,
  `jumlah_kamar` int(2) NOT NULL,
  `status_tamu` varchar(10) NOT NULL,
  `kode_reservasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_kamar`, `id_resepsionis`, `nama_pemesan`, `email`, `no_handphone`, `nama_tamu`, `tipe_kamar`, `tgl_check_in`, `tgl_check_out`, `jumlah_kamar`, `status_tamu`, `kode_reservasi`) VALUES
(1, 8, 1, 'Rian', 'rian@gmail.com', 89522718438, 'Rian', 'Family', '2022-10-27', '2022-10-28', 4, 'check_out', 'v7k4fQ5y2Z'),
(6, 6, 1, 'Nadia', 'nadia@gmail.com', 89738247341, 'Nadia', 'Superior', '2022-10-28', '2022-10-29', 5, '', 'HlZ7Gew6VJ'),
(9, 7, 1, 'Engcak', 'engcak@gmail.com', 89738294921, 'Engcak', 'Deluxe', '2022-11-02', '2022-11-07', 1, '', 'Yzt4OLdTrA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas_kamar`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`id_resepsionis`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_resepsionis` (`id_resepsionis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `resepsionis`
--
ALTER TABLE `resepsionis`
  MODIFY `id_resepsionis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD CONSTRAINT `fasilitas_hotel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_kamar_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_resepsionis`) REFERENCES `resepsionis` (`id_resepsionis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
