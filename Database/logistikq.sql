-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2023 pada 01.25
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistikq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `dompet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `fullname`, `username`, `email`, `password`, `level`, `alamat`, `dompet_id`) VALUES
(1, 'huda', 'huda', 'huda@gmail.com', 'huda', 'admin', 'lamongan', 1),
(2, 'achbar', 'achbar', 'achbar@gmail.com', 'achbar', 'admin', 'jakarta', 2),
(3, 'mchail', 'michail', 'michail@gmail.com', 'miachil', 'admin', 'jakarta', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id` int(11) NOT NULL,
  `saldo` varchar(20) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id`, `saldo`, `bonus`) VALUES
(1, '50.000', 5000),
(2, '50.000', 5000),
(3, '50.000', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `nama_kurir` varchar(45) NOT NULL,
  `nomor_telepon` varchar(45) NOT NULL,
  `jadwal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `nama_kurir`, `nomor_telepon`, `jadwal`) VALUES
(1, 'michail', '0987654321', 'pagi'),
(2, 'huda', '1234567890', 'siang'),
(3, 'achbar', '1234567890', 'malam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(45) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `biaya`) VALUES
(1, 'cod', 10),
(2, 'JKJ', 5000),
(3, 'JJJ', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `berat`, `deskripsi`) VALUES
(1, 2, 'paket elektronik'),
(2, 2, 'paket alat rumah tangga'),
(3, 1, 'paket elektronik'),
(4, 1, 'paket peternakan'),
(5, 1, 'makanan'),
(6, 1, 'minuman'),
(7, 3, 'magicom'),
(8, 2, 'perkakas'),
(9, 5, 'mesin'),
(10, 1, 'mesin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `metode` varchar(45) NOT NULL,
  `harga_total` double NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `pengiriman_id` int(11) NOT NULL,
  `akun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `metode`, `harga_total`, `keterangan`, `pengiriman_id`, `akun_id`) VALUES
(1, 'BRI', 400, 'Lunas', 1, 1),
(2, 'BCA', 200, 'Lunas', 2, 2),
(3, 'BNI', 50, 'lunas', 3, 3),
(4, 'BCA', 500000, 'Lunas', 9, 1),
(5, 'MANDIRI', 200000, 'Lunas', 12, 1),
(6, 'BNI', 400000, 'Lunas', 13, 2),
(7, 'BRI', 200000, 'Lunas', 14, 2),
(8, 'BNI', 100000, 'Lunas', 15, 1),
(10, 'BRI', 100000, 'Lunas', 16, 1),
(11, 'MANDIRI', 200000, 'Lunas', 17, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `nomor_telepon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerima`
--

INSERT INTO `penerima` (`id`, `nama`, `nomor_telepon`) VALUES
(1, 'akhmad', '1234567890'),
(2, 'anam', '1234567890'),
(3, 'nana', '1234567890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi_tujuan` varchar(255) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `layanan_id` int(11) NOT NULL,
  `penerima_id` int(11) NOT NULL,
  `akun_id` int(11) NOT NULL,
  `kurir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `kode`, `tanggal`, `lokasi_tujuan`, `paket_id`, `layanan_id`, `penerima_id`, `akun_id`, `kurir_id`) VALUES
(1, 'BBA1', '2023-11-23', 'jakarta', 1, 3, 1, 1, 1),
(2, 'BBA2', '2023-11-01', 'Lamongan', 2, 2, 1, 2, 2),
(3, 'BBA4', '2023-11-10', 'jakarta', 3, 2, 3, 3, 1),
(9, 'BBA5', '2023-11-23', 'jakarta', 4, 2, 2, 3, 2),
(12, 'BBA6', '2023-11-15', 'jakarta', 5, 2, 3, 2, 2),
(13, 'BBA7', '2023-08-16', 'jakarta', 6, 1, 1, 2, 2),
(14, 'BBA8', '2022-10-21', 'jakarta', 7, 2, 1, 3, 2),
(15, 'BBA9', '2023-02-09', 'semarang', 8, 1, 2, 3, 3),
(16, 'BBA10', '2023-11-09', 'depok', 9, 1, 2, 2, 2),
(17, 'BBA11', '2020-11-07', 'denpasar', 10, 2, 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_akun_dompet1_idx` (`dompet_id`);

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_pengiriman1_idx` (`pengiriman_id`),
  ADD KEY `fk_pembayaran_akun1_idx` (`akun_id`);

--
-- Indeks untuk tabel `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengiriman_paket_idx` (`paket_id`),
  ADD KEY `fk_pengiriman_layanan1_idx` (`layanan_id`),
  ADD KEY `fk_pengiriman_penerima1_idx` (`penerima_id`),
  ADD KEY `fk_pengiriman_akun1_idx` (`akun_id`),
  ADD KEY `fk_pengiriman_kurir1_idx` (`kurir_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_akun_dompet1` FOREIGN KEY (`dompet_id`) REFERENCES `dompet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_akun1` FOREIGN KEY (`akun_id`) REFERENCES `akun` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembayaran_pengiriman1` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_pengiriman_akun1` FOREIGN KEY (`akun_id`) REFERENCES `akun` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_kurir1` FOREIGN KEY (`kurir_id`) REFERENCES `kurir` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_layanan1` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_paket` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_penerima1` FOREIGN KEY (`penerima_id`) REFERENCES `penerima` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
