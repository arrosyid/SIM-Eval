-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2021 pada 09.01
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_eval`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pelajaran`
--

CREATE TABLE `r_pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `semester` varchar(7) NOT NULL,
  `thn_pelajaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `r_pelajaran`
--

INSERT INTO `r_pelajaran` (`id_pelajaran`, `id_kelas`, `id_mapel`, `semester`, `thn_pelajaran`) VALUES
(1, 3, 1, 'GANJIL', '2020/2021'),
(2, 1, 1, 'GENAP', '2020/2021'),
(3, 4, 1, 'GANJIL', '2020/2021'),
(4, 2, 1, 'GENAP', '2020/2021'),
(5, 3, 3, 'GANJIL', '2020/2021\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_analis_soalpg`
--

CREATE TABLE `tb_analis_soalpg` (
  `id_analispg` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `no_soal` int(3) NOT NULL,
  `jml_jwbA` int(3) NOT NULL,
  `jml_jwbB` int(3) NOT NULL,
  `jml_jwbC` int(3) NOT NULL,
  `jml_jwbD` int(3) NOT NULL,
  `jml_jwbE` int(3) NOT NULL,
  `jml_jwbBenar` int(3) NOT NULL,
  `jml_BenarAts` int(3) NOT NULL,
  `jml_BenarBwh` int(3) NOT NULL,
  `pengecoh_a` float NOT NULL,
  `pengecoh_b` float NOT NULL,
  `pengecoh_c` float NOT NULL,
  `pengecoh_d` float NOT NULL,
  `pengecoh_e` float NOT NULL,
  `tingkat_kesukaran` float NOT NULL,
  `daya_pembeda` float NOT NULL,
  `ket_soal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_analis_soalpg`
--

INSERT INTO `tb_analis_soalpg` (`id_analispg`, `id_ujian`, `no_soal`, `jml_jwbA`, `jml_jwbB`, `jml_jwbC`, `jml_jwbD`, `jml_jwbE`, `jml_jwbBenar`, `jml_BenarAts`, `jml_BenarBwh`, `pengecoh_a`, `pengecoh_b`, `pengecoh_c`, `pengecoh_d`, `pengecoh_e`, `tingkat_kesukaran`, `daya_pembeda`, `ket_soal`) VALUES
(1, 1, 1, 2, 0, 0, 1, 0, 2, 1, 1, 66.67, 0, 0, 33.33, 0, 0.67, 0, 'Sedang, Ditolak'),
(2, 1, 2, 1, 1, 1, 0, 0, 1, 1, 0, 33.33, 33.33, 33.33, 0, 0, 0.33, 0.33, 'Sulit, Diterima dan Diperbaiki'),
(3, 1, 3, 0, 1, 0, 2, 0, 1, 0, 0, 0, 33.33, 0, 66.67, 0, 0, 0, 'Sangat Sulit, Ditolak'),
(4, 1, 4, 0, 1, 2, 0, 0, 2, 1, 0, 0, 33.33, 66.67, 0, 0, 0.33, 0.33, 'Sulit, Diterima dan Diperbaiki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_analis_soaluo`
--

CREATE TABLE `tb_analis_soaluo` (
  `id_analisuo` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `no_soal` int(3) NOT NULL,
  `rerata_skor` float NOT NULL,
  `rerata_skorats` float NOT NULL,
  `rerata_skorbwh` float NOT NULL,
  `tingkat_kesukaran` float NOT NULL,
  `daya_pembeda` float NOT NULL,
  `ket_soal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_analis_soaluo`
--

INSERT INTO `tb_analis_soaluo` (`id_analisuo`, `id_ujian`, `no_soal`, `rerata_skor`, `rerata_skorats`, `rerata_skorbwh`, `tingkat_kesukaran`, `daya_pembeda`, `ket_soal`) VALUES
(1, 1, 1, 0.88, 0.38, 0.27, 0.29, 0.0367, 'Sangat Sulit, Ditolak'),
(2, 1, 2, 0.54, 0.1, 0.19, 0.18, -0.03, 'Sangat Sulit, Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dist_jwb`
--

CREATE TABLE `tb_dist_jwb` (
  `id_jawab` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jenis_soal` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  `no_1` varchar(255) NOT NULL,
  `no_2` varchar(255) NOT NULL,
  `no_3` varchar(255) NOT NULL,
  `no_4` varchar(255) NOT NULL,
  `no_5` varchar(255) NOT NULL,
  `no_6` varchar(255) NOT NULL,
  `no_7` varchar(255) NOT NULL,
  `no_8` varchar(255) NOT NULL,
  `no_9` varchar(255) NOT NULL,
  `no_10` varchar(255) NOT NULL,
  `no_11` varchar(255) NOT NULL,
  `no_12` varchar(255) NOT NULL,
  `no_13` varchar(255) NOT NULL,
  `no_14` varchar(255) NOT NULL,
  `no_15` varchar(255) NOT NULL,
  `no_16` varchar(255) NOT NULL,
  `no_17` varchar(255) NOT NULL,
  `no_18` varchar(255) NOT NULL,
  `no_19` varchar(255) NOT NULL,
  `no_20` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dist_jwb`
--

INSERT INTO `tb_dist_jwb` (`id_jawab`, `id_siswa`, `id_ujian`, `jenis_soal`, `status`, `no_1`, `no_2`, `no_3`, `no_4`, `no_5`, `no_6`, `no_7`, `no_8`, `no_9`, `no_10`, `no_11`, `no_12`, `no_13`, `no_14`, `no_15`, `no_16`, `no_17`, `no_18`, `no_19`, `no_20`) VALUES
(2, 2, 1, 'PILIHAN GANDA', 0, 'D', 'B', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 1, 'URAIAN', 1, 'sadasd', 'qweqs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 3, 1, 'PILIHAN GANDA', 0, 'A', 'C', 'D', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 2, 1, 'URAIAN', 1, 'ini jawaban', 'erwe', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 1, 1, 'PILIHAN GANDA', 0, 'A', 'A', 'D', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dist_nilai`
--

CREATE TABLE `tb_dist_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jml_skor_ujian` int(3) NOT NULL,
  `nilai_ujian` int(3) NOT NULL,
  `ranking` int(3) NOT NULL,
  `kelompok` varchar(3) NOT NULL,
  `tuntas_belajar` int(1) NOT NULL,
  `tindak_lanjut` varchar(128) NOT NULL,
  `jenis_tindak_lanjut` varchar(255) NOT NULL,
  `jenis_tugas` varchar(255) NOT NULL,
  `nilai_perbaikan` int(3) NOT NULL,
  `nilai_akhir` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dist_nilai`
--

INSERT INTO `tb_dist_nilai` (`id_nilai`, `id_ujian`, `id_siswa`, `jml_skor_ujian`, `nilai_ujian`, `ranking`, `kelompok`, `tuntas_belajar`, `tindak_lanjut`, `jenis_tindak_lanjut`, `jenis_tugas`, `nilai_perbaikan`, `nilai_akhir`) VALUES
(1, 1, 1, 33, 63, 1, 'ATS', 0, 'PB1', 'mengerjakan soal yang belum dijawab dengan benar', 'TIDAK TUNTAS II', 0, 0),
(2, 1, 2, 31, 60, 2, 'TGH', 0, 'PB1', 'mengerjakan soal yang belum dijawab dengan benar', 'TIDAK TUNTAS II', 0, 0),
(3, 1, 3, 28, 54, 3, 'BWH', 0, 'PB2', 'mengerjakan soal yang belum dijawab dengan benar', 'TIDAK TUNTAS II', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_guru` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `id_mapel`, `id_user`, `nm_guru`, `nip`) VALUES
(1, 2, 2, 'Mustiani', '030368 010521 001 12'),
(2, 3, 3, 'iqbal', '230200 010521 001 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `bidang` varchar(128) NOT NULL,
  `nomor_kelas` int(3) NOT NULL,
  `jml_siswa` int(3) NOT NULL,
  `jml_kelAtsBwh` int(2) NOT NULL,
  `jml_kelTengah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `id_guru`, `kelas`, `bidang`, `nomor_kelas`, `jml_siswa`, `jml_kelAtsBwh`, `jml_kelTengah`) VALUES
(1, 2, 'VIII', '', 2, 20, 4, 0),
(2, 1, 'VIII', '', 1, 30, 0, 0),
(3, 2, 'IX', '', 2, 28, 0, 0),
(4, 2, 'IX', '', 3, 28, 9, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(3, 'Ilmu Pengetahuan Alam'),
(4, 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_record_login`
--

CREATE TABLE `tb_record_login` (
  `id_record` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nm_sekolah` varchar(255) NOT NULL,
  `nm_kepsek` varchar(255) NOT NULL,
  `nm_admin` varchar(255) NOT NULL,
  `akreditasi` varchar(1) NOT NULL,
  `kurikulum` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `npsn` int(15) NOT NULL,
  `bentuk_pendidikan` varchar(128) NOT NULL,
  `sk_pendirian` varchar(128) NOT NULL,
  `tgl_sk_pendirian` int(11) NOT NULL,
  `sk_izin` varchar(128) NOT NULL,
  `tgl_sk_izin` int(11) NOT NULL,
  `telfon` int(13) NOT NULL,
  `website` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nm_sekolah`, `nm_kepsek`, `nm_admin`, `akreditasi`, `kurikulum`, `alamat`, `npsn`, `bentuk_pendidikan`, `sk_pendirian`, `tgl_sk_pendirian`, `sk_izin`, `tgl_sk_izin`, `telfon`, `website`, `email`) VALUES
(1, 'SMP NEGERI 2 SUGIO', 'syafi\'i', 'nanik', 'B', 'KTSP', 'biting sugio ', 123456, 'smp negeri', '1231', 1619669588, '123', 1619669588, 812627, 'hjhj', 'hjhjh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_siswa` varchar(255) NOT NULL,
  `nis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_kelas`, `id_user`, `nm_siswa`, `nis`) VALUES
(1, 2, 5, 'iqbal', '12315'),
(2, 2, 4, 'mood', 'FDS'),
(3, 1, 6, 'asu', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skor`
--

CREATE TABLE `tb_skor` (
  `id_skor` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jenis_soal` varchar(128) NOT NULL,
  `jml_skor` int(3) NOT NULL,
  `kelompok` varchar(4) NOT NULL,
  `nilai` int(3) NOT NULL,
  `no_1` int(2) NOT NULL,
  `no_2` int(2) NOT NULL,
  `no_3` int(2) NOT NULL,
  `no_4` int(2) NOT NULL,
  `no_5` int(2) NOT NULL,
  `no_6` int(2) NOT NULL,
  `no_7` int(2) NOT NULL,
  `no_8` int(2) NOT NULL,
  `no_9` int(2) NOT NULL,
  `no_10` int(2) NOT NULL,
  `no_11` int(2) NOT NULL,
  `no_12` int(2) NOT NULL,
  `no_13` int(2) NOT NULL,
  `no_14` int(2) NOT NULL,
  `no_15` int(2) NOT NULL,
  `no_16` int(2) NOT NULL,
  `no_17` int(2) NOT NULL,
  `no_18` int(2) NOT NULL,
  `no_19` int(2) NOT NULL,
  `no_20` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_skor`
--

INSERT INTO `tb_skor` (`id_skor`, `id_siswa`, `id_ujian`, `jenis_soal`, `jml_skor`, `kelompok`, `nilai`, `no_1`, `no_2`, `no_3`, `no_4`, `no_5`, `no_6`, `no_7`, `no_8`, `no_9`, `no_10`, `no_11`, `no_12`, `no_13`, `no_14`, `no_15`, `no_16`, `no_17`, `no_18`, `no_19`, `no_20`) VALUES
(3, 2, 1, 'PILIHAN GANDA', 6, 'TGH', 50, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2, 1, 'URAIAN', 25, 'ATS', 63, 20, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 'URAIAN', 24, 'BWH', 60, 14, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 3, 1, 'URAIAN', 25, 'TGH', 63, 12, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 1, 'PILIHAN GANDA', 9, 'ATS', 75, 3, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 3, 1, 'PILIHAN GANDA', 3, 'BWH', 25, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jenis_soal` varchar(125) NOT NULL,
  `nomor_soal` int(2) NOT NULL,
  `skor_soal` int(3) NOT NULL,
  `soal` varchar(1000) NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `pilihan_a` varchar(255) NOT NULL,
  `pilihan_b` varchar(255) NOT NULL,
  `pilihan_c` varchar(255) NOT NULL,
  `pilihan_d` varchar(255) NOT NULL,
  `pilihan_e` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `id_ujian`, `jenis_soal`, `nomor_soal`, `skor_soal`, `soal`, `kunci`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`, `status`) VALUES
(2, 1, 'PILIHAN GANDA', 1, 5, 'ini soal pilihan ganda nomor 1', 'A', 'ini jawabannya', 'ini bukan jawabannya', 'ini bukan jawabannya', 'ini bukan jawabannya', '', 0),
(3, 1, 'PILIHAN GANDA', 2, 5, 'ini soal pilihan ganda nomor 2', 'A', 'ini jawabannya', 'ini bukan jawabannya', 'ini bukan jawabannya', 'ini bukan jawabannya', '', 0),
(4, 1, 'URAIAN', 1, 20, 'INI soal uraian nomor 1', 'ini jawabannya', '', '', '', '', '', 0),
(5, 1, 'URAIAN', 2, 20, 'ini soal uraian nomor 2', 'ini jawabannya', '', '', '', '', '', 0),
(6, 1, 'PILIHAN GANDA', 3, 5, 'ini soal pilihan ganda nomor 3', 'B', 'ini bukan jawabannya', 'ini jawabannya', 'ini bukan jawabannya', 'ini bukan jawabannya', '', 0),
(7, 1, 'PILIHAN GANDA', 4, 5, 'ini soal pilihan ganda nomor 4', 'C', 'ini bukan jawabannya', 'ini bukan jawabannya', 'ini jawabannya', 'ini bukan jawabannya', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ujian`
--

CREATE TABLE `tb_ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `jenis_ujian` varchar(255) NOT NULL,
  `jml_soal_ujian` int(2) NOT NULL,
  `skor_max_ujian` int(3) NOT NULL,
  `skor_maxpg` int(3) NOT NULL,
  `skor_maxuo` int(3) NOT NULL,
  `jml_soalpg` int(3) NOT NULL,
  `jml_soaluo` int(3) NOT NULL,
  `kd` varchar(11) NOT NULL,
  `kkm` int(3) NOT NULL,
  `tgl_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ujian`
--

INSERT INTO `tb_ujian` (`id_ujian`, `id_kelas`, `id_pelajaran`, `jenis_ujian`, `jml_soal_ujian`, `skor_max_ujian`, `skor_maxpg`, `skor_maxuo`, `jml_soalpg`, `jml_soaluo`, `kd`, `kkm`, `tgl_ujian`) VALUES
(1, 4, 3, 'PAS', 6, 52, 12, 40, 4, 2, '3.1', 75, 1629151200),
(2, 2, 1, 'UH', 10, 100, 60, 40, 6, 4, 'asda', 75, 1626127200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  `picture` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `email`, `level`, `picture`, `status`, `date_created`) VALUES
(2, 'admin', '$2y$10$.ZU.GL9Qfch0OmuhbiQIJevQ2J1L5PFyDBGhFGfI6ZZpGppm55yZq', 'admin@mail.com', 1, '', 1, 1619669551),
(3, 'guru', '$2y$10$R3GdxGGMzAFRDVRif0lize5LPhMYsBdff3m74L1Xpq0Hfq0L5HX4q', 'guru@mail.com', 2, '', 1, 1619669588),
(4, 'siswa1', '$2y$10$.ZU.GL9Qfch0OmuhbiQIJevQ2J1L5PFyDBGhFGfI6ZZpGppm55yZq', 'siswa1@mail.com', 3, '', 1, 1619669588),
(5, 'siswa2', '$2y$10$.ZU.GL9Qfch0OmuhbiQIJevQ2J1L5PFyDBGhFGfI6ZZpGppm55yZq', 'siswa2@mail.com', 3, '', 1, 1619669588),
(6, 'siswa3', '$2y$10$.ZU.GL9Qfch0OmuhbiQIJevQ2J1L5PFyDBGhFGfI6ZZpGppm55yZq', 'siswa3@mail.com', 3, '', 1, 1619669588),
(7, 'guru1', '$2y$10$R3GdxGGMzAFRDVRif0lize5LPhMYsBdff3m74L1Xpq0Hfq0L5HX4q', 'guru@mail.com', 2, '', 1, 1619669588);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `r_pelajaran`
--
ALTER TABLE `r_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `tb_analis_soalpg`
--
ALTER TABLE `tb_analis_soalpg`
  ADD PRIMARY KEY (`id_analispg`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_analis_soaluo`
--
ALTER TABLE `tb_analis_soaluo`
  ADD PRIMARY KEY (`id_analisuo`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_dist_jwb`
--
ALTER TABLE `tb_dist_jwb`
  ADD PRIMARY KEY (`id_jawab`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_dist_nilai`
--
ALTER TABLE `tb_dist_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_soal` (`id_ujian`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_record_login`
--
ALTER TABLE `tb_record_login`
  ADD PRIMARY KEY (`id_record`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `r_pelajaran`
--
ALTER TABLE `r_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_analis_soalpg`
--
ALTER TABLE `tb_analis_soalpg`
  MODIFY `id_analispg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_analis_soaluo`
--
ALTER TABLE `tb_analis_soaluo`
  MODIFY `id_analisuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_dist_jwb`
--
ALTER TABLE `tb_dist_jwb`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_dist_nilai`
--
ALTER TABLE `tb_dist_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_record_login`
--
ALTER TABLE `tb_record_login`
  MODIFY `id_record` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `r_pelajaran`
--
ALTER TABLE `r_pelajaran`
  ADD CONSTRAINT `r_pelajaran_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_pelajaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tb_analis_soalpg`
--
ALTER TABLE `tb_analis_soalpg`
  ADD CONSTRAINT `tb_analis_soalpg_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_analis_soaluo`
--
ALTER TABLE `tb_analis_soaluo`
  ADD CONSTRAINT `tb_analis_soaluo_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_dist_jwb`
--
ALTER TABLE `tb_dist_jwb`
  ADD CONSTRAINT `tb_dist_jwb_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dist_jwb_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_dist_nilai`
--
ALTER TABLE `tb_dist_nilai`
  ADD CONSTRAINT `tb_dist_nilai_ibfk_4` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dist_nilai_ibfk_5` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `tb_guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`),
  ADD CONSTRAINT `tb_guru_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel `tb_record_login`
--
ALTER TABLE `tb_record_login`
  ADD CONSTRAINT `tb_record_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD CONSTRAINT `tb_skor_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_skor_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_3` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD CONSTRAINT `tb_ujian_ibfk_1` FOREIGN KEY (`id_pelajaran`) REFERENCES `r_pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ujian_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
