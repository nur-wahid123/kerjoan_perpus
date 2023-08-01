-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 15.58
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
-- Database: `perpusweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgllahir` varchar(50) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_lengkap`, `notelp`, `jk`, `tempat`, `tgllahir`, `umur`, `alamat`, `foto`) VALUES
('A0006', 'Admin', '0711421674', 'Perempuan', 'Palembang', '08/11/2018', '25', 'Jl. Kol. H. Burlian Sukajaya, Suka Bangun, Kec. Sukarami, Kota Palembang, Sumatera Selatan 30114', 'stikes.png'),
('A0007', 'Indah Putri Agustina', '08994482446', 'Perempuan', 'Palembang', '08/11/2002', '21', 'Jl. Sukarela Lorong Swadaya I Rt.43 Rw.06 Sukarami Palembang', 'foto_indah.png'),
('A0008', 'Muhammad Rosyidi', '087796079481', 'Laki-laki', 'Palembang', '12/28/2001', '22', 'Jl. Sosial KM 5', 'man.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(20) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `id_penerbit` varchar(20) DEFAULT NULL,
  `id_rak` varchar(20) DEFAULT NULL,
  `judul` varchar(60) DEFAULT NULL,
  `pengarang` varchar(60) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `jmlhal` int(4) DEFAULT NULL,
  `jmlbuku` int(4) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `id_penerbit`, `id_rak`, `judul`, `pengarang`, `isbn`, `jmlhal`, `jmlbuku`, `tahun`, `sinopsis`, `foto`) VALUES
('B0001', 'K0007', 'P0005', 'Rak-01', 'Kehamilan apa yang anda hadapi minggu per minggu', 'Glade B. Curtis', '979-431-394-7', 295, 15, 1999, 'Ebook Kehamilan Apa Yang Ada Hadapi Minggu Perminggu ini membahas tentang :\r\n- Pertumbuhan & perkembangan bayi anda\r\n- Seberapa besar bayi anda\r\n- Bagaimana aktivitas & tindakan anda mempengaruhi bayi anda\r\n- Diet, olahraga, & obat2an yg harus dihindari sebelum & selama kehamilan\r\n- Hal2 khusus: penyakit yg perlu diketahui & menjaga kesehatan', '1.png'),
('B0002', 'K0007', 'P0006', 'Rak-01', 'Paduan Asuhan Kebidanan Ibu Hamil : Dilengkapi dengan chekli', 'Mufdillah', '978-979-1446-12-9', 176, 10, 2018, 'Buku ini berisi tentang standar pelayanan kebidanan pada pelayanan antenatal, pemberian imunisasi pada ibu hamil, pemeriksaan kehamilan (palpasi), inspeksi vulva dan vulva hygine, senam hamil serta pendokumentasian asuhan kebidanan pada ibu hamil', '2.png'),
('B0003', 'K0007', 'P0007', 'Rak-01', 'Modul Kebidanan Kehamilan: Eklampsia', 'WHO M', '9789790442382', 115, 15, 2012, 'Buku ini berisi tentang:\r\n1. Eklampsia\r\n2. Faktor-Faktor Yang Dapat Dihindari\r\n3. Identifikasi Masalah', '3.png'),
('B0004', 'K0007', 'P0007', 'Rak-01', 'Buku Pintar Kehamilan', 'Maya Astuti, SST', '978-979-044-106-4', 162, 12, 2010, 'Buku ini membahas tentang:\r\n1. Kehamilan\r\n2. Perubahan Pada Kehamilan\r\n3. Ketidaknyamanan Dalam Kehamilan', '4.jpg'),
('B0005', 'K0007', 'P0007', 'Rak-01', 'Manajemen Komplikasi Kehamilan & Persalinan', 'Devi Yuliyanti', '979-448-735-X', 363, 10, 2005, 'Buku ini berisi tentang:\r\n- Prinsip Klinis\r\n- Gejala\r\n- Prosedur', '5.png'),
('B0006', 'K0007', 'P0007', 'Rak-01', 'Kehamilan Normal', 'Hj. Saminem, SKM', '978-602-044-970-3', 99, 10, 2008, 'Dalam menghadapi era milenium dan tuntutan masyarakat yang makin kritis, bidan harus makin menyiapkan diri untuk memberikan mutu pelayanan kebidanan yang profesional. Kehamilan Normal Seri Asuhan Kebidanan Kehamilan Normal dalam kurikulum Diploma Kebidanan. Materi yang diuraikan dalam buku ini dipilih untuk memenuhi kebutuhan belajar mengajar mahasiswa kebidanan. ', '6.jpg'),
('B0007', 'K0007', 'P0008', 'Rak-01', 'Perawatan ibu hamil', 'Yuni Kusmiyati, Heni Puji Wahyuningsih, Sujiyatni', '978-979-3734-15-6', 186, 5, 2008, 'Isi buku ini meliputi: Konsep dasar asuhan kehamilan, Proses adaptasi fisiologis dan psikologis dalam kehamilan, Faktor-faktor yang mempengaruhi kehamilan, Mendiagnosa kehamilan, Kebutuhan dasar ibu hamil sesuai tahap perkembangannya, Melakukan asuhan kehamilan, Deteksi dini terhadap komplikasi, Standar asuhan pada ibu hamil, Kajian literatur mengenai asuhan ante natal', '7.png'),
('B0008', 'K0007', 'P0009', 'Rak-01', 'Kehamilan, kelahiran, perawatan Ibu dan bayi Dalam Konteks B', 'Swasono, Meutia F.', '97897 4561836', 340, 5, 1997, 'Buku ini merupakan kumpulan hasil-hasil penelitian antropologis di berbagai suku bangsa diIndonesia yang berkenaan dengan masalah kesehatan reproduksi manusia. Dalam konteks nasional dan internasional, isu-isu kesehatan reproduksi sedang menjadi fokus perhatian - sejak Konperensi Kependudukan dan Pembangunan tahun 1994 di Kairo - yang utama khususnya kondisi kesehatan reproduksi perempuan yang secara umum masih memprihatinkan seperti tingginya angka anemia, tingginya tingkat kematian ibu, kerentanan tertular penyakit infeksisaluran reproduksi, resiko tertular penyakit menular seksual dan HIV/AIDS dll. Masalah yang dihadapi perempuan berkenaan dengan kesehatan reproduksinya merupakan masalah-masalah yang perlu didekati dan dipahami secara sosial-budaya sebelum didekati secara medis.', '8.jpg'),
('B0009', 'K0007', 'P0010', 'Rak-01', 'Asuhan kebidanan kehamilan', 'Tria Eni Rafika Devi', '978-602-6450-32-6', 301, 5, 2019, 'Buku Asuhan kebidanan kehamilan ini mengajak para pembaca untuk mempelajari tentang asuhan kehamilan. Materi yang disajikan mulai dari konsep dasar asuhan kehamilan, anatomi fisiologi proses kehamilan, perubahan anatomi dan adaptasi fisiologi pada ibu hamil, teori--teori/ metode ilmiah menentukan jenis kelamin anak, perubahan dan adaptasi psikologis dalam masa kehamilan, tanda-tanda kehamilan, pemeriksaan diagnostik kehamilan, faktor-faktor yang mempengaruhi kehamilan, kebutuhan fisik dan psikologis pada ibu hamil, kebutuhan gizi pada ibu hamil, persiapan asi eksklusif dan perawatan payudara masa kehamilan, tanda-tanda bahaya pada obu dan janin selama masa hamil dan cara penanganannya, dan masih banyak lagi materi yang bisa dipelajari.', '9.jpg'),
('B0010', 'K0006', 'P0011', 'Rak-01', 'Penyakit-Penyakit Pada Kehamilan: Peran Seorang Internis', 'Purwita W. Laksmi, Arif Mansjoer, Idrus Alwi, Siti Setiadi', '978-979-9455-72-2', 484, 6, 2008, 'Kehamilan merupakan proses alamiah, namun agar proses kehamilan dapat\r\ndilewati oleh ibu hamil, perlu dipahami serba serbi tentang kehamilan, berikut\r\nIni adalah pembahasan seputar kehamilan. ', '101.png'),
('B0011', 'K0007', 'P0007', 'Rak-01', 'Buku Ajar Asuhan Kebidanan Persalinan Normal', 'Ambar Dwi Erawati', '978-979-044-141-5', 122, 5, 2011, 'Buku ajar ini berisi materi tentang Konsep Dasar Persalinan, Faktor-faktor yang Mempengaruhi Proses Persalinan, Perubahan Fisiologi dan Psikologi Ibu Bersalin', '11.jpg'),
('B0012', 'K0006', 'P0012', 'Rak-01', 'Seri Biologi Molekuler Farmasi: Replikasi DNA dan Mutasi', 'Sismindari', '9786022290919', 103, 8, 2012, 'Buku ini memuat proses keseluruhan dan apa itu yang dimaksud dengan replikasi DNA. serta dalam buku ini akan dijelaskan mengenai mutasi yang ditulis oleh penulis secara lengkap dan rinci agar mudah dipahami.', '12.jpg'),
('B0013', 'K0006', 'P0012', 'Rak-02', 'Obat-obat Penting dalam Pembelajaran Ilmu Farma', 'Agung Endro Nugroho', '978-602-229-868-7 (edisi kedua) 978-602-229-038-4 ', 226, 5, 2018, 'Menyajikan materi farmakologi yang meliputi obat-obat yang mempengaruhi sistem syaraf pusat, sistem kardiovaskuler, dan sistem syaraf otonom, serta obat-obat yang bekerja pada sistem endokrin, obat-obat analgesik, anti inflamasi, imunosupresan, antigout, dan kemoterapeutika (antimikrobial). Dalam setiap pembahasan terdapat ulasan ringkas tentang anatomi dan fisiologi manusia yang akan menjadi target terapi obat.', '13.jpg'),
('B0014', 'K0008', 'P0007', 'Rak-02', 'Konsep Dasar Farmakologi Panduan untuk Mahasiswa Edisi 3', 'Janet L. Stringer', '978-979-448-915-4', 333, 5, 2009, 'Buku ini dimaksudkan untuk menolong mahasiswa menghadapi ratusan obat yang tercakup dalam berbagai golongan farmakologi saat ini.', '15.jpg'),
('B0015', 'K0009', 'P0007', 'Rak-02', 'Ilmu Resep', 'H. A. Syamsuni', '979-448-828-1', 358, 7, 2006, 'Buku ini menyajikan dasar-dasar Ilmu Resep atau Farmasetika dan perhitungan yang penting dalam praktik farmasi dalam suatu format yang dirancang agar mudah digunakan sebagai acuan oleh siswa dan mahasiswa', '16.jpg'),
('B0016', 'K0011', 'P0013', 'Rak-02', 'Sistem imun, imunisasi, & penyakit imun', 'Wahab, A. Samik ', '9795190997', 101, 5, 2002, 'Buku ini menyajikan konsep-konsep dasar imunologi dan juga menyajikan secara rinci imunisasi yang biasa diberikan di Indonesia beserta waktu-waktu pemberiannya. Buku ini juga menyajikan paparan mengenai sistem imun, dasar-dasar imunisasi dan beberapa mekanisme respons imun. Buku ini ditujukan bagi para mahasiswa dan residen ilmu kesehatan anak. Selain itu, dokter umum dan dokter anak juga dapat memanfaatkan buku ini untuk mengingat kembali imunisasi karena imunisasi merupakan cara yang sangat efektif untuk mencegah banyak penyakit infeksi yang berbahaya.', '17.png'),
('B0017', 'K0010', 'P0014', 'Rak-02', 'Macam-macam penyakit dan obatnya', 'Isa Jatinegara', '978-602-97687-1-8', 107, 10, 2019, 'Buku ini berisi cerita tentang macam-macam penyakit dan obatnya. Dikisahkan tokoh Ardi dan keluarganya. Ibu menasihati Ardi dan adiknya untuk senantiasa menjaga kesehatan, oleh karena itu Ibu juga selalu memberikan makanan yang sehat dan bergizi. Beberapa hal yang menyebabkan sakit yaitu, bakteri, virus, jamur, kecelakaan, radiasi berbahaya, dan makanan yang dimakan. Buku ini memberikan cerita seputar kesehatan yang bisa sebagai bahan bacaan anak dan orang tua.', '18.png'),
('B0018', 'K0010', 'P0007', 'Rak-02', 'Gizi dan Kesehatan Reproduksi', 'Martini Fairus S,Kep, Ns', '978-979-044-145-3', 107, 8, 2011, 'Gizi dan fertilitas, hubungan status gizi dan menarke, hubungan gizi dan menstruasi, prinsip diet pada menopause, gizi ibu hamil, prinsip diet pada hiperemesis, prinsip diet ibu hamil dengan konstipasi, prinsip diet ibu hamil dengan diabetes militus, prinsip diet ibu hamil dengan pre-eklampsia, prinsip diet ibu hamil dengan obesitas, prinsip diet ibu hamil dengan anemia', 'Gizi.jpg'),
('B0019', 'K0010', 'P0015', 'Rak-02', 'Maag: Kendali, Hindari, dan Obati', 'Nurheti Yuliarti', '978-979-29-0984-5', 150, 6, 2009, 'Buku ini memberikan informasi mengenai penyakit maag secra mendalam, cara, menghindarinya, dan yang terpenting bagi para penderita', '20.jpg'),
('B0020', 'K0013', 'P0017', 'Rak-03', '50 Rahasia alami mengobati sakit kepala', 'Raje Airey', '979-781-086-0', 63, 7, 2005, 'Pengobatan dalam buku ini berdasarkan padfa prinsip-prinsip holistik, artinya berbagai macam pengobatannya mengasumsikan bahwa kesehatan yang prima tergantung dari keseimbangan antara fisik, mental, emosi, dan kesehatan jiwa.', '201.jpg'),
('B0021', 'K0010', 'P0012', 'Rak-02', 'Diet Sehat Golongan Darah B', 'Astrid Savitri ', '978-602-376-038-1', 146, 5, 2016, 'Buku diet sehat mudah berdasarkan golongan darah ini memiliki pesan bahwa banyak orang yang beranggapan diet identik dengan usaha untuk melangsingkan tubuh, padahal orang yang terlalu kurus atau orang sakit pun butuh diet. Bisa dikatakan bahwa diet adalah salah satu cara untuk menjaga kesehatan tubuh secara umum. Pada buku ini dijelaskan bahwa diet adalah salah satu cara untuk menjaga kesehatan tubuh secara umum. Setiap golongan darah itu unik, dan setiap golongan darah seringkali memberi reaksi yang merugikan ketika mengasup tipe-tipe makanan tertentu. Hal itulah yang menyebabkan masalah kesehatan di masa mendatang. Dalam buku ini terdapat pengelompokan jenis makanan yang sangat individual bagi setiap golongan darah. Secara khusus diet golongan darah menyatakan bahwa setiap jenis darah merupakan warisan evolusi yang berbeda. Orang yang memiliki golongan darah O misalnya dianggap memiliki nenek moyang predator atau pemburu. Oleh karena itu, makanan mereka harus tinggi protein hewani. Buku ini juga dilengkapi dengan contoh menu makanan dari makan pagi hingga makan malam serta kudapan.', '21.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) DEFAULT NULL,
  `kategori` varchar(40) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `keterangan`) VALUES
('K0006', 'Farmasi', ''),
('K0007', 'Kehamilan', ''),
('K0008', 'Farmakologi', ''),
('K0009', 'Buku Panduan', ''),
('K0010', 'Kesehatan', ''),
('K0011', 'Kesehatan Masyarakat', ''),
('K0012', 'Penyakit ', ''),
('K0013', 'obat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(10) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `id_anggota` varchar(5) DEFAULT NULL,
  `tempo` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `usr_input` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tempo`, `status`, `ket`, `usr_input`) VALUES
('PJM0001', '2023-06-26', 'A0007', '2023-07-01', 'Pinjam', '', 'Admin'),
('PJM0002', '2023-07-11', 'A0007', '2023-07-16', 'Kembali', '', 'Admin'),
('PJM0003', '2023-08-01', 'A0008', '2023-08-06', 'Pinjam', '', 'Muhammad Rosyidi'),
('PJM0004', '2023-08-01', 'A0008', '2023-08-06', 'Pinjam', '', 'Muhammad Rosyidi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(20) DEFAULT NULL,
  `penerbit` varchar(60) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `penerbit`, `keterangan`) VALUES
('P0005', 'Arcan', ''),
('P0006', 'Nuha Medika', ''),
('P0007', 'PT. EGC', ''),
('P0008', 'Fitramaya', ''),
('P0009', 'Universitas Indonesia Press', ''),
('P0010', 'Salemba Medika', ''),
('P0011', 'Interna Publishing', ''),
('P0012', 'Pustaka Pelajar', ''),
('P0013', 'Widya Medika', ''),
('P0014', 'Adprint Mitra Pustaka', ''),
('P0015', 'Andi', ''),
('P0016', 'FK Farmasi UGM', ''),
('P0017', 'Jakarta Erlangga', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(10) NOT NULL,
  `id_buku` varchar(60) DEFAULT NULL,
  `asal_buku` varchar(60) DEFAULT NULL,
  `jml` int(4) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `tgl` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_buku`, `asal_buku`, `jml`, `ket`, `tgl`) VALUES
('PNG0006', 'B0001', 'Jakarta', 15, 'Buku Baru', '2023-06-19'),
('PNG0007', 'B0002', 'Yogyakarta', 10, 'Buku Baru', '2023-06-19'),
('PNG0008', 'B0003', 'Jakarta', 15, 'Buku Baru', '2023-06-19'),
('PNG0009', 'B0004', 'Jakarta', 12, 'Buku Baru', '2023-06-19'),
('PNG0010', 'B0005', 'Jakarta', 10, 'Tambahan Buku', '2023-06-19'),
('PNG0011', 'B0006', 'Jakarta', 10, 'Buku Baru', '2023-06-19'),
('PNG0012', 'B0007', 'Yogyakarta', 5, 'Buku Baru', '2023-06-19'),
('PNG0013', 'B0008', 'Jakarta', 5, 'Buku Baru', '2023-06-20'),
('PNG0014', 'B0009', 'Jakarta', 5, 'Buku Baru', '2023-06-20'),
('PNG0015', 'B0010', 'Jakarta', 6, 'Buku Baru', '2023-06-20'),
('PNG0016', 'B0011', 'Jakarta', 5, 'Buku Baru', '2023-06-20'),
('PNG0017', 'B0012', 'Yogyakarta', 8, 'Buku Baru', '2023-06-20'),
('PNG0018', 'B0013', 'Yogyakarta', 5, 'Buku Baru', '2023-06-20'),
('PNG0019', 'B0015', 'Jakarta', 7, 'Buku Baru', '2023-06-20'),
('PNG0020', 'B0016', 'Jakarta', 5, 'Buku Baru', '2023-06-20'),
('PNG0021', 'B0017', 'Bandung', 10, 'Buku Baru', '2023-06-20'),
('PNG0022', 'B0018', 'Yogyakarta', 8, 'Buku Baru', '2023-07-26'),
('PNG0023', 'B0019', 'Yogyakarta', 6, 'Buku Baru', '2023-07-26'),
('PNG0024', 'B0020', 'Jakarta', 7, 'Buku Baru', '2023-07-26'),
('PNG0025', 'B0014', 'Jakarta', 5, 'Buku Baru', '2023-07-26'),
('PNG0026', 'B0021', 'Yogyakarta', 5, 'Buku Baru', '2023-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(10) NOT NULL,
  `tgl_kembali` varchar(20) DEFAULT NULL,
  `id_pinjam` varchar(20) DEFAULT NULL,
  `terlambat` varchar(15) DEFAULT NULL,
  `denda` varchar(15) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `tgl_kembali`, `id_pinjam`, `terlambat`, `denda`, `id_admin`) VALUES
(37, '2023-08-01', 'PJM0002', '16 hari', 'Rp.48000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `level` enum('Petugas','Kepala','Administrasi','Mahasiswa') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `id_anggota` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `email`, `pass`, `notelp`, `status`, `level`, `foto`, `id_anggota`) VALUES
('U0001', 'Admin', 'admin@gmail.com', 'admin123', '087892878222', 'Aktif', 'Administrasi', 'user.png', 'A0006'),
('U0004', 'H. Suaidy Arahman, SE., S.Sos, MM', 'Stikesabdurahman@gmail.com', '123456', '087817379229', 'Aktif', 'Kepala', 'ketua.png', NULL),
('U0007', 'Indah Putri Agustina', 'indahpagustina8@gmail.com', 'indah123', '08994482446', 'Aktif', 'Mahasiswa', 'foto_indah.png', 'A0007'),
('U0008', 'Muhammad Rosyidi', 'rosyidim47@gmail.com', '123456', '087796079481', 'Aktif', 'Mahasiswa', 'user.png', 'A0008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_buku`
--

CREATE TABLE `p_buku` (
  `id_pbuku` int(5) NOT NULL,
  `id_pinjam` varchar(50) DEFAULT NULL,
  `id_buku` varchar(50) DEFAULT NULL,
  `qty` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `p_buku`
--

INSERT INTO `p_buku` (`id_pbuku`, `id_pinjam`, `id_buku`, `qty`) VALUES
(72, 'PJM0001', 'B0015', '1'),
(73, 'PJM0002', 'B0017', '1'),
(74, 'PJM0002', 'B0016', '1'),
(75, 'PJM0003', 'B0016', '1'),
(76, 'PJM0001', 'B0015', '1'),
(77, 'PJM0001', 'B0017', '1'),
(78, 'PJM0002', 'B0016', '1'),
(79, 'PJM0003', 'B0021', '1'),
(80, 'PJM0003', 'B0020', '1'),
(81, 'PJM0004', 'B0013', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` varchar(20) DEFAULT NULL,
  `rak` varchar(60) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `rak`, `keterangan`) VALUES
('Rak-01', 'Kebidanan', ''),
('Rak-02', 'Farmasi', ''),
('Rak-03', 'Obat-obatan', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `p_buku`
--
ALTER TABLE `p_buku`
  ADD PRIMARY KEY (`id_pbuku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `p_buku`
--
ALTER TABLE `p_buku`
  MODIFY `id_pbuku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
