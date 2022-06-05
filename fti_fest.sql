-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2021 pada 09.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fti_fest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `nama_admin` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_admin`, `password`, `gambar_admin`) VALUES
(1, 'himatif', 'HIMATIF', 'dd99338b30a91fe756228b409ff9367d4c5843d9', 'HIMATIF_LOGO.png'),
(2, 'hmsi', 'HMSI', 'b82c2a76d1530db76dfd90a9cd129cadf0570a3f', 'LOGO_HMSI.png'),
(3, 'himaster', 'HIMASTER', '6c793441d5db55a3061f91554dbba0f96fa21128', 'LOGO_HIMASTER_PNG.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `provinsi` int(1) NOT NULL,
  `kota_kab` int(1) NOT NULL,
  `kecamatan` int(1) NOT NULL,
  `alamat` text NOT NULL,
  `pt` text NOT NULL,
  `prodi` text NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_lomba` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama_depan`, `nama_belakang`, `jk`, `provinsi`, `kota_kab`, `kecamatan`, `alamat`, `pt`, `prodi`, `hp`, `email`, `foto`, `status_lomba`) VALUES
(1, 'bagus', '2d88f7fe3feff53961afe2bb80674a80192fb4e9', 'Bagus', 'Puji Rahardjo', 'L', 36, 3672, 3672022, 'Jl. Cilegon', 'Universitas Serang Raya', 'Sistem Informasi', '089507456916', 'bagusrahardjo6@gmail.com', 'c570fd682af3ef0fcaa867b8d603eabd.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps`
--

CREATE TABLE `apps` (
  `id_apps` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `apps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `apps`
--

INSERT INTO `apps` (`id_apps`, `id_lomba`, `apps`) VALUES
(1, 1, 'Mobile Apps'),
(2, 1, 'Web Apps'),
(3, 1, 'IOT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_lomba`
--

CREATE TABLE `biaya_lomba` (
  `id_biaya` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_lomba`
--

INSERT INTO `biaya_lomba` (`id_biaya`, `id_lomba`, `biaya`) VALUES
(1, 1, 150000),
(2, 3, 150000),
(3, 2, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_lomba`
--

CREATE TABLE `kategori_lomba` (
  `id_kategori` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_lomba`
--

INSERT INTO `kategori_lomba` (`id_kategori`, `id_lomba`, `kategori`) VALUES
(1, 1, 'Internet of Things'),
(2, 1, 'Digital Traveler and Tourism'),
(3, 1, 'Digital Service and Technology'),
(4, 1, 'Digital Advertising'),
(5, 1, 'Digital Commerce');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lihat_lomba`
--

CREATE TABLE `lihat_lomba` (
  `id` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lihat_lomba`
--

INSERT INTO `lihat_lomba` (`id`, `id_lomba`, `ip`, `waktu`) VALUES
(1, 1, '::1', '2020-01-07 08:57:47'),
(2, 1, '::1', '2020-01-07 08:57:50'),
(3, 2, '::1', '2020-01-07 08:58:09'),
(4, 3, '::1', '2020-01-07 08:58:14'),
(5, 1, '::1', '2020-01-07 09:58:30'),
(6, 1, '::1', '2020-01-07 10:09:14'),
(7, 1, '::1', '2020-01-07 10:09:26'),
(8, 1, '::1', '2020-01-07 10:13:42'),
(9, 1, '::1', '2020-01-07 10:16:50'),
(10, 2, '::1', '2020-01-07 13:13:31'),
(11, 2, '::1', '2020-01-07 13:18:33'),
(12, 1, '::1', '2020-01-07 13:18:40'),
(13, 2, '::1', '2020-01-07 13:18:45'),
(14, 2, '::1', '2020-01-07 13:21:41'),
(15, 2, '::1', '2020-01-07 13:22:54'),
(16, 3, '::1', '2020-01-07 13:22:57'),
(17, 1, '::1', '2020-06-22 15:14:39'),
(18, 1, '::1', '2020-06-22 15:25:44'),
(19, 1, '::1', '2020-06-22 17:59:29'),
(20, 1, '::1', '2020-06-22 22:26:16'),
(21, 1, '::1', '2020-06-22 22:27:34'),
(22, 1, '::1', '2020-06-23 16:03:50'),
(23, 1, '::1', '2020-06-23 16:07:11'),
(24, 1, '::1', '2020-06-25 17:55:48'),
(25, 1, '::1', '2020-06-25 18:10:29'),
(26, 1, '::1', '2021-03-14 14:50:04'),
(27, 1, '::1', '2021-03-14 14:52:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lomba`
--

CREATE TABLE `lomba` (
  `id_lomba` int(10) NOT NULL,
  `nama_lomba` varchar(60) NOT NULL,
  `oleh` text NOT NULL,
  `deskripsi_lomba` text NOT NULL,
  `mulai_pendaftaran` date NOT NULL,
  `akhir_pendaftaran` date NOT NULL,
  `hari_lomba` varchar(6) NOT NULL,
  `waktu_lomba` date NOT NULL,
  `gambar_lomba` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lomba`
--

INSERT INTO `lomba` (`id_lomba`, `nama_lomba`, `oleh`, `deskripsi_lomba`, `mulai_pendaftaran`, `akhir_pendaftaran`, `hari_lomba`, `waktu_lomba`, `gambar_lomba`) VALUES
(1, 'StartUp Digital', 'Himpunan Mahasiswa Teknik Informatika (HIMATIF)', '<p>Sebagai wujud kepedulian serta antusiasme, serta dalam rangka ingin mengembangkan minat dan bakat dibidang tulis menulis, FTI FEST Beserta HMSI Universitas Serang Raya 2019- 2020 mengadakan Lomba Karya Tulis Ilmiah terkait E-Commerce (E-Business).</p><p><br>  Lomba Karya Tulis Ilmiah ini memiliki tema “Sistem Informasi Untuk Efektifitas Layanan”. Lomba ini terbuka untuk umum, yaitu mahasiswa aktif jurusan Sistem Informasi , mahasiswa aktif Fakultas Teknologi Informasi Unsera , serta mahasiswa Sistem Informasi diseluruh Pulau Jawa dan Nasional.</p>', '2019-12-19', '2020-01-13', 'Rabu', '2020-01-22', 'startup.jpeg'),
(2, 'Karya Tulis Ilmiah Terkait E-Commerce (E-Business)', 'Himpunan Mahasiswa Sistem Informasi (HMSI)', '<p>Sebagai wujud kepedulian serta antusiasme, serta dalam rangka ingin mengembangkan minat dan bakat dibidang tulis menulis, FTI FEST Beserta HMSI Universitas Serang Raya 2019- 2020 mengadakan Lomba Karya Tulis Ilmiah terkait E-Commerce (E-Business).</p><p><br>  Lomba Karya Tulis Ilmiah ini memiliki tema “Sistem Informasi Untuk Efektifitas Layanan”. Lomba ini terbuka untuk umum, yaitu mahasiswa aktif jurusan Sistem Informasi , mahasiswa aktif Fakultas Teknologi Informasi Unsera , serta mahasiswa Sistem Informasi diseluruh Pulau Jawa dan Nasional.</p>', '2019-12-16', '2020-01-31', 'Rabu', '2020-01-22', 'si.jpeg'),
(3, 'Teknologi Tepat Guna Berbasis IOT', 'Himpunan Mahasiswa Rekayasa Sistem Komputer (HIMASTER)', '<p>LOMBA TEKNOLOGI TEPAT GUNA BERBASIS IOT pada acara FTI FEST 2020 Tingkat Nasional, merupakan wadah apresiasi terhadap karya-karya teknologi mahasiswa/i. Hasil karya berteknologi ini merupakan solusi praktis dari permasalahan yang timbul di masyarakat atau merupakan pengembangan dari perangkat yang berbasis teknologi yang telah ada, karya teknologi ini lebih menonjolkan sisi keterampilan gunanya. </p><p><br> LOMBA TEKNOLOGI TEPAT GUNA BERBASIS IOT pada acara FTI FEST 2020 Tingkat Nasional mengambil tema “Smart City.</p>', '2019-12-23', '2020-01-10', 'Rabu', '2020-01-22', 'iot.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanisme_lomba`
--

CREATE TABLE `mekanisme_lomba` (
  `id_mekanisme` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `mekanisme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mekanisme_lomba`
--

INSERT INTO `mekanisme_lomba` (`id_mekanisme`, `id_lomba`, `mekanisme`) VALUES
(1, 3, 'Peserta diwajibkan mengirim makalah lengkap hasil karya dalam bentuk soft file dan hard file serta membayar uang pendaftaran sebesar Rp.150.000,-/tim'),
(2, 3, 'Tahap selanjutnya babak final berupa persentase yang dilaksanakan di Universitas Serang Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan_lomba`
--

CREATE TABLE `peraturan_lomba` (
  `id_peraturan` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `peraturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peraturan_lomba`
--

INSERT INTO `peraturan_lomba` (`id_peraturan`, `id_lomba`, `peraturan`) VALUES
(1, 3, 'Perserta yang terdaftar tidak dapat diwakili/diganti oleh orang lain yang menjadi anggota tim'),
(2, 3, 'Peserta diharuskan mengikuti technical meeting'),
(3, 3, 'Hasil keputusan juri tidak dapat diganggu gugat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_login`
--

CREATE TABLE `peserta_login` (
  `id` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `no_peserta` varchar(10) NOT NULL,
  `waktu_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta_login`
--

INSERT INTO `peserta_login` (`id`, `id_lomba`, `no_peserta`, `waktu_login`) VALUES
(1, 1, '001-SUD', '2020-01-07 10:15:59'),
(2, 1, '001-SUD', '2020-01-07 10:37:11'),
(3, 1, '001-SUD', '2020-01-07 11:57:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_lomba`
--

CREATE TABLE `peserta_lomba` (
  `no_peserta` char(7) NOT NULL,
  `id_lomba` int(1) NOT NULL,
  `id_akun` int(10) NOT NULL,
  `nama_tim` text NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `anggota` text NOT NULL,
  `kategori_lomba` int(10) NOT NULL,
  `apps` int(10) NOT NULL,
  `subtema` int(3) NOT NULL,
  `abstrak` text NOT NULL,
  `file_kti` text NOT NULL,
  `file_makalah` text NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `validasi_admin` int(1) NOT NULL,
  `lolos_abstrak` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosedur_lomba`
--

CREATE TABLE `prosedur_lomba` (
  `id_prosedur` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `prosedur` varchar(100) NOT NULL,
  `hari_mulai` varchar(6) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `hari_akhir` varchar(6) NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prosedur_lomba`
--

INSERT INTO `prosedur_lomba` (`id_prosedur`, `id_lomba`, `prosedur`, `hari_mulai`, `tgl_mulai`, `hari_akhir`, `tgl_akhir`) VALUES
(1, 1, 'Pendaftaran Lomba', 'Kamis', '2019-12-19', 'Senin', '2020-01-13'),
(3, 1, 'Pelaksanaan Lomba', 'Rabu', '2020-01-22', '', '0000-00-00'),
(5, 2, 'Pembukaan Registrasi dan Pengiriman Abstrak', 'Senin', '2019-12-16', 'Senin', '2019-12-23'),
(7, 2, 'Pengumuman Abstrak', 'Minggu', '2019-12-29', '', '0000-00-00'),
(8, 2, 'Registrasi Ulang dan Pengiriman Karya Tulis', 'Jumat', '2020-01-03', 'Rabu', '2020-01-08'),
(9, 2, 'Tekmet', 'Selasa', '2020-01-14', '', '0000-00-00'),
(10, 2, 'Presentasi', 'Rabu', '2020-01-22', '', '0000-00-00'),
(11, 3, 'Pendaftaran Lomba', 'Senin', '2019-12-23', 'Jumat', '2020-01-10'),
(12, 3, 'Technical Meeting', 'Sabtu', '2020-01-11', '', '0000-00-00'),
(13, 3, 'Pengumpulan Makalah', 'Minggu', '2020-01-12', 'Rabu', '2020-01-15'),
(14, 3, 'Presentasi Alat', 'Rabu', '2020-01-22', '', '0000-00-00'),
(15, 3, 'Pembagian Hadiah', 'Kamis', '2020-01-23', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rulebook_lomba`
--

CREATE TABLE `rulebook_lomba` (
  `id_rulebook` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `nama_rulebook` varchar(255) NOT NULL,
  `rulebook` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rulebook_lomba`
--

INSERT INTO `rulebook_lomba` (`id_rulebook`, `id_lomba`, `nama_rulebook`, `rulebook`) VALUES
(1, 2, 'Deskripsi Lomba', 'DESKRIPSI LOMBA HMSI.docx'),
(2, 3, 'Peraturan Lomba', 'PERATURAN LOMBA TEKNOLOGI TEPAT GUNA BERBASIS.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subtema`
--

CREATE TABLE `subtema` (
  `id_sub` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `subtema` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subtema`
--

INSERT INTO `subtema` (`id_sub`, `id_lomba`, `subtema`) VALUES
(1, 2, 'Pemanfaatan perkembangan teknologi untuk meningkatkan bisnis e-commerce'),
(2, 2, 'Strategi pengembangan e-commerce di Indonesia dalam menghadapi persaingan global');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_lomba`
--

CREATE TABLE `syarat_lomba` (
  `id_syarat` int(10) NOT NULL,
  `id_lomba` int(10) NOT NULL,
  `syarat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syarat_lomba`
--

INSERT INTO `syarat_lomba` (`id_syarat`, `id_lomba`, `syarat`) VALUES
(1, 1, 'Status peserta adalah seluruh mahasiswa Indonesia'),
(2, 1, 'Setiap perguruan tinggi maksimal mengirimkan 2 tim'),
(3, 1, 'Satu tim minimal terdiri dari 3 orang'),
(4, 1, 'Tidak diperkenankan ada peserta terdaftar dalam 2 tim atau lebih yang berbeda'),
(5, 1, 'Teknik pembuatan StartUp bebas'),
(6, 2, 'Mahasiswa S1 / D3 jurusan Sistem Informasi (SI) perguruan tinggi seluruh Indonesia'),
(7, 2, 'Berupa kelompok (maks. 3 orang dari perguruan tinggi yang sama)'),
(8, 2, 'Setiap peserta hanya diperbolehkan menjadi Ketua Tim dalam 1 Karya Tulis'),
(11, 3, 'Peserta lomba merupakan mahasiswa/i dari perguruan tinggi negeri maupun swasta yang ada di Indonesia'),
(12, 3, 'Satu tim terdiri dari tiga orang dan harus dari instansi yang sama'),
(13, 3, 'Nama tim atau judul alat tidak diperkenankan mengandung unsur penghinaan, pelecehan, ataupun yang dapat menyinggung perasaan orang lain'),
(16, 1, 'Pembuatan StartUp sesuai dengan tema yang ditentukan panitia'),
(17, 1, 'StartUp yang diikutsertakan dalam lomba belum pernah diikutsertakan pada lomba manapun'),
(18, 1, 'StartUp yang diperlombakan menjadi hak milik peserta'),
(19, 1, 'Panitia StartUp Digital berhak mendiskualifikasi peserta jika diketahui hak atas kekayaan intelektualnya diragukan, sedang dalam sengketa, mengambil karya orang lain, atau mendapat klaim dari pihak lain'),
(20, 1, 'Hasil karya tetap akan menjadi milik peserta, namun panitia juga memiliki hak atas karya sebatas arsip panitia dan mempublikasikan karya dengan izin peserta'),
(21, 3, 'Teknologi yang dibuat diperbolehkan berupa Prototype'),
(22, 3, 'Peserta wajib membawa KTM (Kartu Tanda Mahasiswa)'),
(23, 3, 'Peserta wajib menyertakan surat pernyataan orisinalitas karya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_apps`);

--
-- Indeks untuk tabel `biaya_lomba`
--
ALTER TABLE `biaya_lomba`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `kategori_lomba`
--
ALTER TABLE `kategori_lomba`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lihat_lomba`
--
ALTER TABLE `lihat_lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id_lomba`);

--
-- Indeks untuk tabel `mekanisme_lomba`
--
ALTER TABLE `mekanisme_lomba`
  ADD PRIMARY KEY (`id_mekanisme`);

--
-- Indeks untuk tabel `peraturan_lomba`
--
ALTER TABLE `peraturan_lomba`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indeks untuk tabel `peserta_login`
--
ALTER TABLE `peserta_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta_lomba`
--
ALTER TABLE `peserta_lomba`
  ADD PRIMARY KEY (`no_peserta`);

--
-- Indeks untuk tabel `prosedur_lomba`
--
ALTER TABLE `prosedur_lomba`
  ADD PRIMARY KEY (`id_prosedur`);

--
-- Indeks untuk tabel `rulebook_lomba`
--
ALTER TABLE `rulebook_lomba`
  ADD PRIMARY KEY (`id_rulebook`);

--
-- Indeks untuk tabel `subtema`
--
ALTER TABLE `subtema`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `syarat_lomba`
--
ALTER TABLE `syarat_lomba`
  ADD PRIMARY KEY (`id_syarat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `apps`
--
ALTER TABLE `apps`
  MODIFY `id_apps` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `biaya_lomba`
--
ALTER TABLE `biaya_lomba`
  MODIFY `id_biaya` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_lomba`
--
ALTER TABLE `kategori_lomba`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lihat_lomba`
--
ALTER TABLE `lihat_lomba`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id_lomba` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mekanisme_lomba`
--
ALTER TABLE `mekanisme_lomba`
  MODIFY `id_mekanisme` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peraturan_lomba`
--
ALTER TABLE `peraturan_lomba`
  MODIFY `id_peraturan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peserta_login`
--
ALTER TABLE `peserta_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prosedur_lomba`
--
ALTER TABLE `prosedur_lomba`
  MODIFY `id_prosedur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rulebook_lomba`
--
ALTER TABLE `rulebook_lomba`
  MODIFY `id_rulebook` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `subtema`
--
ALTER TABLE `subtema`
  MODIFY `id_sub` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `syarat_lomba`
--
ALTER TABLE `syarat_lomba`
  MODIFY `id_syarat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
