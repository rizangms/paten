-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2020 pada 16.34
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_14_050122_create_surat_table', 1),
(5, '2020_09_14_050156_create_permohonan_table', 1),
(6, '2020_09_14_050221_create_permohonan_meta_table', 1),
(7, '2020_09_14_050250_create_post_table', 1),
(8, '2020_09_14_050424_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `notify` smallint(6) NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `kode`, `nama`, `nik`, `alamat`, `no_hp`, `jenis`, `status`, `notify`, `alasan`, `created_at`, `updated_at`) VALUES
(1, 'A98054', 'Agus Budi', '1234567890123456', 'Kalidawir 123', '', 'A', 9, 0, '', '2019-04-03 03:23:08', '2019-04-03 03:26:10'),
(2, 'B39717', 'Arif Bagus', '1234567890123456', 'Jl Bunga Melati 123', '', 'B', 1, 0, '', '2019-04-02 23:39:32', '2019-04-03 03:26:10'),
(3, 'E23111', 'Ana Ani', '1234567890123457', 'Kalidawir 234', '', 'E', 1, 0, '', '2019-04-03 04:36:50', '2019-04-10 15:40:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_meta`
--

CREATE TABLE `permohonan_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_permohonan` bigint(20) UNSIGNED NOT NULL,
  `meta_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan_meta`
--

INSERT INTO `permohonan_meta` (`id`, `id_permohonan`, `meta_name`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 2, 'content', 'a:16:{s:3:\"nik\";s:16:\"1234567890123456\";s:2:\"kk\";s:16:\"1234487676787897\";s:4:\"nama\";s:10:\"Arif Bagus\";s:12:\"tempat_lahir\";s:11:\"TULUNGAGUNG\";s:13:\"tanggal_lahir\";s:15:\"01 Januari 1989\";s:6:\"alamat\";s:19:\"Jl Bunga Melati 123\";s:13:\"jenis_kelamin\";s:1:\"1\";s:15:\"status_hubungan\";s:1:\"2\";s:10:\"pendidikan\";s:1:\"5\";s:12:\"warga_negara\";s:1:\"1\";s:5:\"agama\";s:1:\"1\";s:9:\"pekerjaan\";s:3:\"PNS\";s:13:\"alamat_tujuan\";s:35:\"Desa Tunggangri Kecamatan Kalidawir\";s:10:\"keterangan\";s:37:\"Pindah karena menikah mengikuti istri\";s:10:\"kk_anggota\";a:1:{i:0;a:6:{s:3:\"nik\";s:16:\"1234567890122345\";s:4:\"nama\";s:7:\"Ani Ana\";s:13:\"jenis_kelamin\";s:1:\"2\";s:12:\"tempat_lahir\";s:11:\"Tulungagung\";s:13:\"tanggal_lahir\";s:13:\"15 April 2019\";s:6:\"status\";s:1:\"3\";}}s:9:\"file_foto\";a:2:{s:8:\"foto_ktp\";s:23:\"B39717_ktp_Scan KTP.jpg\";s:7:\"foto_kk\";s:24:\"B39717_kk_Scan KTP 1.jpg\";}}', '2019-04-02 23:39:32', '2019-04-02 23:39:32'),
(2, 1, 'content', 'a:14:{s:3:\"nik\";s:16:\"1234567890123456\";s:2:\"kk\";s:16:\"1234487676787897\";s:4:\"nama\";s:9:\"Agus Budi\";s:12:\"tempat_lahir\";s:11:\"TULUNGAGUNG\";s:13:\"tanggal_lahir\";s:15:\"01 Januari 1990\";s:6:\"alamat\";s:13:\"Kalidawir 123\";s:13:\"jenis_kelamin\";s:1:\"1\";s:15:\"status_hubungan\";s:1:\"2\";s:10:\"pendidikan\";s:1:\"4\";s:12:\"warga_negara\";s:1:\"1\";s:5:\"agama\";s:1:\"1\";s:9:\"pekerjaan\";s:3:\"pns\";s:9:\"keperluan\";s:4:\"SKCK\";s:9:\"file_foto\";a:2:{s:8:\"foto_ktp\";s:23:\"A98054_ktp_Scan KTP.jpg\";s:7:\"foto_kk\";s:24:\"A98054_kk_Scan KTP 1.jpg\";}}', '2019-04-03 03:23:08', '2019-04-03 03:23:08'),
(3, 3, 'content', 'a:14:{s:3:\"nik\";s:16:\"1234567890123457\";s:2:\"kk\";s:16:\"1234487676787897\";s:4:\"nama\";s:7:\"Ana Ani\";s:12:\"tempat_lahir\";s:11:\"TULUNGAGUNG\";s:13:\"tanggal_lahir\";s:14:\"1 Januari 1991\";s:6:\"alamat\";s:13:\"Kalidawir 234\";s:13:\"jenis_kelamin\";s:1:\"2\";s:15:\"status_hubungan\";s:1:\"2\";s:10:\"pendidikan\";s:1:\"5\";s:12:\"warga_negara\";s:1:\"1\";s:5:\"agama\";s:1:\"1\";s:9:\"pekerjaan\";s:6:\"Swasta\";s:9:\"keperluan\";s:19:\"Keterangan Penduduk\";s:9:\"file_foto\";a:2:{s:8:\"foto_ktp\";s:23:\"E23111_ktp_Scan KTP.jpg\";s:7:\"foto_kk\";s:24:\"E23111_kk_Scan KTP 1.jpg\";}}', '2019-04-03 04:36:50', '2019-04-03 04:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjudul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `subjudul`, `foto`, `created_at`, `updated_at`) VALUES
(3274, 'Permohonan Kartu Keluarga', 'Mekanisme pengurusan berkas', '03274 - 40aba73c-6f22-4825-9e74-d0857a4ba55f.jpg', '2019-01-22 06:29:31', '2019-01-22 06:29:31'),
(17874, 'Permohonan Akte Lahir', 'Mekanisme pengurusan berkas', '17874 - 68bed3be-7773-4e5c-8d10-5e2e8f9830ef.jpg', '2019-01-22 06:29:16', '2019-01-22 06:29:16'),
(56710, 'Berkas Surat Nikah dan Numpang Nikah', 'Mekanisme pengurusan berkas', '56710 - 06-Alur-Pindah-Nikah-02.jpg', '2019-01-22 06:30:19', '2019-01-22 06:30:19'),
(56909, 'Surat Keterangan Kematian', 'Mekanisme pengurusan berkas', '56909 - 3d9edc00-646f-4259-aa5e-7f916cda9029.jpg', '2019-01-22 06:28:57', '2019-01-22 06:28:57'),
(80535, 'Surat Pindah Domisili Dalam Satu Provinsi', 'Mekanisme pengurusan berkas', '80535 - 05-Pindah-Domisili-1-Prov.jpg', '2019-01-22 06:30:01', '2019-01-22 06:30:01'),
(96893, 'Surat Keterangan Tidak Mampu', 'Mekanisme pengurusan berkas', '96893 - post1.jpeg', '2019-01-22 06:29:46', '2019-01-22 06:29:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `meta_name`, `meta_value`, `created_at`, `updated_at`) VALUES
(2, 'provinsi', 'Jawa Timur', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(3, 'kecamatan', 'Kalidawir', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(4, 'kabupaten', 'Tulungagung', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(5, 'alamat kantor', 'Jl. Ikan Layur No.1, Tunjungsekar', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(6, 'telp kantor', '089123823', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(7, 'email kantor', 'admin@kecamatan.id', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(8, 'kode pos', '98798', '2018-12-11 17:00:00', '2019-04-02 23:42:20'),
(9, 'nama camat', 'Hari Prastijo', '2018-12-13 22:37:21', '2019-04-02 23:42:20'),
(10, 'nip camat', '12323 3423 123123 1', '2018-12-13 22:37:21', '2019-04-02 23:42:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@spora.id', 'admin', NULL, '$2y$10$w501Bzoavnp1cLx6YEO4KOw2JcCm4jA6EaQV4r87Fcr4MPI40uaG2', NULL, '2020-09-14 02:25:30', '2020-09-14 02:25:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permohonan_kode_unique` (`kode`);

--
-- Indeks untuk tabel `permohonan_meta`
--
ALTER TABLE `permohonan_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan_meta_id_permohonan_foreign` (`id_permohonan`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permohonan_meta`
--
ALTER TABLE `permohonan_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96894;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permohonan_meta`
--
ALTER TABLE `permohonan_meta`
  ADD CONSTRAINT `permohonan_meta_id_permohonan_foreign` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
