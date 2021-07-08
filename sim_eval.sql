-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2021 pada 03.45
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dist_jwb`
--

CREATE TABLE `tb_dist_jwb` (
  `id_jawab` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `kunci` int(1) NOT NULL,
  `no_1` varchar(2) NOT NULL,
  `no_2` varchar(2) NOT NULL,
  `no_3` varchar(2) NOT NULL,
  `no_4` varchar(2) NOT NULL,
  `no_5` varchar(2) NOT NULL,
  `no_6` varchar(2) NOT NULL,
  `no_7` varchar(2) NOT NULL,
  `no_8` varchar(2) NOT NULL,
  `no_9` varchar(2) NOT NULL,
  `no_10` varchar(2) NOT NULL,
  `no_11` varchar(2) NOT NULL,
  `no_12` varchar(2) NOT NULL,
  `no_13` varchar(2) NOT NULL,
  `no_14` varchar(2) NOT NULL,
  `no_15` varchar(2) NOT NULL,
  `no_16` varchar(2) NOT NULL,
  `no_17` varchar(2) NOT NULL,
  `no_18` varchar(2) NOT NULL,
  `no_19` varchar(2) NOT NULL,
  `no_20` varchar(2) NOT NULL,
  `no_21` varchar(2) NOT NULL,
  `no_22` varchar(2) NOT NULL,
  `no_23` varchar(2) NOT NULL,
  `no_24` varchar(2) NOT NULL,
  `no_25` varchar(2) NOT NULL,
  `no_26` varchar(2) NOT NULL,
  `no_27` varchar(2) NOT NULL,
  `no_28` varchar(2) NOT NULL,
  `no_29` varchar(2) NOT NULL,
  `no_30` varchar(2) NOT NULL,
  `no_31` varchar(2) NOT NULL,
  `no_32` varchar(2) NOT NULL,
  `no_33` varchar(2) NOT NULL,
  `no_34` varchar(2) NOT NULL,
  `no_35` varchar(2) NOT NULL,
  `no_36` varchar(2) NOT NULL,
  `no_37` varchar(2) NOT NULL,
  `no_38` varchar(2) NOT NULL,
  `no_39` varchar(2) NOT NULL,
  `no_40` varchar(2) NOT NULL,
  `no_41` varchar(2) NOT NULL,
  `no_42` varchar(2) NOT NULL,
  `no_43` varchar(2) NOT NULL,
  `no_44` varchar(2) NOT NULL,
  `no_45` varchar(2) NOT NULL,
  `no_46` varchar(2) NOT NULL,
  `no_47` varchar(2) NOT NULL,
  `no_48` varchar(2) NOT NULL,
  `no_49` varchar(2) NOT NULL,
  `no_50` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dist_nilai`
--

CREATE TABLE `tb_dist_nilai` (
  `id_skor` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nm_guru` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `id_mapel`, `nm_guru`, `nip`) VALUES
(1, 2, 'Mustiani', '030368 010521 001 12'),
(2, 3, 'iqbal', '230200 010521 001 12');

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
(1, 1, 'VII', '', 1, 20, 0, 0),
(2, 1, 'VIII', '', 1, 30, 0, 0),
(3, 2, 'IX', '', 2, 28, 0, 0),
(4, 2, 'IX', '', 3, 28, 0, 0);

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
(1, 'SMP Negeri 2 Sugio', 'syafi\'i', 'nanik', 'B', 'KTSP', 'biting sugio ', 123456, 'smp negeri', '1231', 1619669588, '123', 1619669588, 812627, 'hjhj', 'hjhjh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nm_siswa` varchar(255) NOT NULL,
  `nis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_kelas`, `nm_siswa`, `nis`) VALUES
(1, 2, 'ds', 'FDS'),
(2, 2, 'ds', 'FDS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skorsoal_uo`
--

CREATE TABLE `tb_skorsoal_uo` (
  `id_skorsoal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jawab` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jenis_soal` varchar(125) NOT NULL,
  `kelompok` varchar(4) NOT NULL,
  `jml_skor` int(3) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
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

INSERT INTO `tb_user` (`id_user`, `id_guru`, `username`, `password`, `email`, `level`, `picture`, `status`, `date_created`) VALUES
(2, 1, 'admin', '$2y$10$.ZU.GL9Qfch0OmuhbiQIJevQ2J1L5PFyDBGhFGfI6ZZpGppm55yZq', 'admin@mail.com', 1, '', 1, 1619669551),
(3, 1, 'guru', '$2y$10$R3GdxGGMzAFRDVRif0lize5LPhMYsBdff3m74L1Xpq0Hfq0L5HX4q', 'guru@mail.com', 2, '', 1, 1619669588);

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
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_dist_nilai`
--
ALTER TABLE `tb_dist_nilai`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_soal` (`id_ujian`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

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
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_skorsoal_uo`
--
ALTER TABLE `tb_skorsoal_uo`
  ADD PRIMARY KEY (`id_skorsoal`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pg` (`id_jawab`),
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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_guru` (`id_guru`);

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
  MODIFY `id_analispg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_analis_soaluo`
--
ALTER TABLE `tb_analis_soaluo`
  MODIFY `id_analisuo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_dist_jwb`
--
ALTER TABLE `tb_dist_jwb`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_dist_nilai`
--
ALTER TABLE `tb_dist_nilai`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_skorsoal_uo`
--
ALTER TABLE `tb_skorsoal_uo`
  MODIFY `id_skorsoal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `tb_dist_jwb_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`);

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
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tb_skorsoal_uo`
--
ALTER TABLE `tb_skorsoal_uo`
  ADD CONSTRAINT `tb_skorsoal_uo_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_soal_ibfk_2` FOREIGN KEY (`id_jawab`) REFERENCES `tb_dist_jwb` (`id_jawab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_soal_ibfk_3` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD CONSTRAINT `tb_ujian_ibfk_1` FOREIGN KEY (`id_pelajaran`) REFERENCES `r_pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ujian_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
