-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2023 pada 08.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id` int(11) NOT NULL,
  `saldo` double NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id`, `saldo`, `bonus`) VALUES
(1, 100000, 10),
(2, 30000, 3),
(3, 10000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `nama_kurir` varchar(45) NOT NULL,
  `nomor_telepon` varchar(45) DEFAULT NULL,
  `jadwal` varchar(45) DEFAULT NULL,
  `layanan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `nama_kurir`, `nomor_telepon`, `jadwal`, `layanan_id`) VALUES
(1, 'Achbar', '081234567890', 'Senin - Jumat, 08.00 - 17.00 WIB', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(45) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `biaya`) VALUES
(1, 'Reguler', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `berat` double NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `berat`, `deskripsi`) VALUES
(1, 1, 'Buku Tulis'),
(2, 2, 'Buku Pelajaran'),
(3, 3, 'Elektronik'),
(4, 4, 'Makanan'),
(5, 5, 'Pakaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `metode` enum('dompetku','COD') NOT NULL,
  `harga_total` double NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `pengiriman_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `metode`, `harga_total`, `keterangan`, `pengiriman_id`, `users_id`) VALUES
(1, 'dompetku', 5000, 'Pembayaran untuk paket buku tulis', 1, 1),
(2, 'dompetku', 10000, 'Pembayaran untuk paket buku pelajaran', 2, 1),
(3, 'COD', 15000, 'Pembayaran untuk paket barang elektronik', 3, 2),
(4, 'COD', 20000, 'Pembayaran untuk paket makanan', 4, 2),
(5, 'COD', 25000, 'Pembayaran untuk paket pakaian', 5, 2);

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `potong_saldo` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
    IF NEW.metode IN ('dompetku') 
    THEN
        UPDATE dompet
        SET saldo = saldo - NEW.harga_total
        WHERE id = NEW.users_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `nomor_telepon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerima`
--

INSERT INTO `penerima` (`id`, `nama`, `nomor_telepon`) VALUES
(1, 'John Doe', '081234567890'),
(2, 'Jane Doe', '082145678901'),
(3, 'Peter Smith', '083856789012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi_tujuan` varchar(255) NOT NULL,
  `status` enum('penjemputan','pengiriman','terkirim') NOT NULL,
  `paket_id` int(11) NOT NULL,
  `layanan_id` int(11) NOT NULL,
  `penerima_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `kode`, `tanggal`, `lokasi_tujuan`, `status`, `paket_id`, `layanan_id`, `penerima_id`, `users_id`) VALUES
(1, '1234567890', '2023-11-12', 'Jakarta', 'penjemputan', 1, 1, 1, 1),
(2, '9876543210', '2023-11-13', 'Bandung', 'pengiriman', 2, 1, 2, 1),
(3, '0987654321', '2023-11-14', 'Semarang', 'pengiriman', 3, 1, 2, 2),
(4, '1987654320', '2023-11-15', 'Surabaya', 'terkirim', 4, 1, 1, 2),
(5, '0198765432', '2023-11-16', 'Yogyakarta', 'penjemputan', 5, 1, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `topup_no` varchar(45) DEFAULT NULL,
  `saldo` double NOT NULL,
  `bonus` double DEFAULT NULL,
  `topup_status` varchar(45) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topup_token` varchar(80) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `dompet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('user','admin','kurir') NOT NULL DEFAULT 'user',
  `alamat` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `dompet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `level`, `alamat`, `foto`, `dompet_id`) VALUES
(1, 'Khoirul Huda', 'huda', 'huda@gmail.com', '$2y$12$bedxw3sxUuaNxGplxaUHD.dq8FRRfof.Ux35lYuJ3WBc/0Mpmp.ym', 'user', 'Bandung', NULL, 1),
(2, 'Achbar', 'Achbar', 'achbar@gmail.com', '$2y$12$xsak/ThtDeYZQE19NBPineACLVAh1B2T9/H/enLU1sIERlSPa./lG', 'kurir', 'Semarang', NULL, 2),
(3, 'Michail', 'Michail', 'michail@gmail.com', '$2y$12$DdhaeFU8nHOZC4XHj7qd0.JwYze46R98xGsDvKFhoeC2VAhKnAsS2', 'admin', 'Jakarta', NULL, 3);

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `create_item_kurir` AFTER INSERT ON `users` FOR EACH ROW BEGIN
	IF NEW.level IN ('kurir')
    THEN
    	INSERT INTO kurir (nama_kurir) VALUES (NEW.fullname);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_saldo_user` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
	IF NEW.id IS NOT NULL THEN
        INSERT INTO dompet (saldo, bonus) VALUES ('10000', '1');

        SET @dompet_id = LAST_INSERT_ID();

        SET NEW.dompet_id = @dompet_id;
	END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kurir_layanan1_idx` (`layanan_id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_layanan_UNIQUE` (`nama_layanan`);

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
  ADD KEY `fk_pembayaran_akun1_idx` (`users_id`);

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
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_pengiriman_paket_idx` (`paket_id`),
  ADD KEY `fk_pengiriman_layanan1_idx` (`layanan_id`),
  ADD KEY `fk_pengiriman_penerima1_idx` (`penerima_id`),
  ADD KEY `fk_pengiriman_akun1_idx` (`users_id`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_topup_dompet1_idx` (`dompet_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_akun_dompet1_idx` (`dompet_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD CONSTRAINT `fk_kurir_layanan1` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_akun1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembayaran_pengiriman1` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_pengiriman_akun1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_layanan1` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_paket` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengiriman_penerima1` FOREIGN KEY (`penerima_id`) REFERENCES `penerima` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `fk_topup_dompet1` FOREIGN KEY (`dompet_id`) REFERENCES `dompet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_akun_dompet1` FOREIGN KEY (`dompet_id`) REFERENCES `dompet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
