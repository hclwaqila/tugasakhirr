-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 03:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_petualanganrasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user_name` varchar(500) NOT NULL,
  `password` text NOT NULL,
  `nama_admin` varchar(500) NOT NULL,
  `alamat_admin` text NOT NULL,
  `no_telp_admin` int(100) NOT NULL,
  `foto_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user_name`, `password`, `nama_admin`, `alamat_admin`, `no_telp_admin`, `foto_admin`) VALUES
('qila', '1cdac5ad084879e80e5b67c51baa9095', 'qila', 'disinii loh', 12345, '../foto/IMG_20240316_012121_967.jpg'),
('wawa', '96ac0342a3ccf9553e3d4c9da9b821b0', 'wawa', 'dihatimu', 7890, '../foto/halwaa.jpeg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `judul_berita` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_berita` date NOT NULL,
  `foto_berita` text NOT NULL,
  `detail_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `user_name`, `judul_berita`, `tgl_berita`, `foto_berita`, `detail_berita`) VALUES
(4, 'qila', 'hot news oi', '2025-04-08', '../foto/finishh.png', 'KAMU SBNRNYA SAYANG GA SI SM AKU \"Kamu sebenarnya sayang nggak sih sama aku\" adalah pertanyaan yang bisa ditanyakan kepada seseorang untuk mengetahui perasaan mereka. '),
(20, 'wawa', 'wawa', '2025-02-21', '../foto/desainbaruu.png', 'lov u'),
(21, 'qila', 'cak', '2025-02-21', '../foto/tumblr.png', 'damnnn'),
(22, 'qila', 'aku capek bgt bgttt', '2025-05-09', '../foto/indo trs.png', 'mw nangis'),
(23, 'qila', 'oi', '2025-02-24', '../foto/bgtokennn.png', 'oioioio');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `judul_galeri` varchar(100) NOT NULL,
  `tgl_galeri` date NOT NULL,
  `foto_galeri` text NOT NULL,
  `detail_galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `user_name`, `judul_galeri`, `tgl_galeri`, `foto_galeri`, `detail_galeri`) VALUES
(2, 'qila', 'galeri akuuuu oiii', '2025-04-24', '../foto/maximuzbg.png', 'kapok dibooingin tiktok'),
(4, 'qila', 'cantik', '2025-02-24', '../foto/outline5.png', 'hishh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_game`
--

CREATE TABLE `tb_game` (
  `id_game` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `judul_game` varchar(100) NOT NULL,
  `foto_game` text NOT NULL,
  `detail_game` text NOT NULL,
  `versi` int(100) NOT NULL,
  `spesifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_game`
--

INSERT INTO `tb_game` (`id_game`, `user_name`, `judul_game`, `foto_game`, `detail_game`, `versi`, `spesifikasi`) VALUES
(1, 'qila', 'apa gatau ', '../foto/indo trs.png', 'bagus hehehe', 2, 'bagus bgt'),
(5, 'qila', 'How To Play', '../foto/indo trs.png', 'Aturan Bermain:\r\na) Fase melempar dadu menentukan jalannya permainan\r\nb) Fase menjalankan pion, jika pemain berhenti di petak berwarna oranye, maka\r\npemain akan skip 1 putaran, jika pemain berhenti di petak berwarna hijau, maka pemain akan mendapatkan kartu keberuntungan atau special, jika pemain\r\nberhenti di petak berwarna biru maka pemain akan mendapatkan kartu\r\ntantangan, jika pemain berhenti di petak yang sama.. maka pemain yang sedang\r\nbermain akan melewati 1 petak di depannya dan pemain tidak akan\r\nmendapatkan efek aksi apapun.\r\nc) Fase mengambil token rempah, token rempah di dapatkan setelah pemain\r\nmenjalankan pion pemain, jika pemain mendapatkan token rempah yang sama,\r\nmaka token boleh disimpan, jika tidak mendapatkan rempah yang sama token\r\nrempah akan dikembalikan ke deck token paling bawah. pemain dapat\r\nmenyimpan 1 token yang berbeda sebagai cadangan pemain dapat mengambil\r\nkartu makanan tradisional lagi jika kartu yang sebelumnya telah lengkap 1 set.\r\nd) Fase aksi, lalu selanjutnya adalah melakukan aksi sesuai petak pemberhentian,\r\njika berhenti di petak warna hijau maka pemain dapat mengambil kartu\r\nkeberuntungan atau special, lakukan aksi sesuai perintah, lalu kembalikan\r\nkartu yang sudah digunakan ke tumpukkan paling bawah.\r\ne) Jika mendapat kartu special berupa kartu bebas makan, pemain dapat\r\nmenyimpan kartu tersebut. pemain dapat menggunakan kartu tersebut untuk\r\nmenghindari tantangan sebanyak 1 kali. Jika sudah terpakai kembalikan kartu\r\nke tumpukan paling bawah. Beberapa kartu special dapat disimpan oleh\r\npemain dan diakumulasikan menjadi tambahan poin (+1) saat terjadi seri di\r\nakhir permainan.\r\nf) Jika berhenti di petak berwarna biru, pemain harus mengambil kartu tantangan\r\ndan melaksanakan tantangan tersebut, ingat bahwa pemain dapat menghindari\r\ntantangan jika memiliki kartu special berupa kartu bebas makan.', 1, 'bgus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(100) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `tgl_komentar` date NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `nama_tamu`, `tgl_komentar`, `komentar`) VALUES
(1, 'nisa', '2025-02-06', 'hehehehe nis nis'),
(2, 'icis', '2025-02-05', 'icis katanya pgn fk unair');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merchandise`
--

CREATE TABLE `tb_merchandise` (
  `id_merchan` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `nama_merchan` varchar(100) NOT NULL,
  `foto_merchan` text NOT NULL,
  `harga_merchan` varchar(100) NOT NULL,
  `detail_merchan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_merchandise`
--

INSERT INTO `tb_merchandise` (`id_merchan`, `user_name`, `nama_merchan`, `foto_merchan`, `harga_merchan`, `detail_merchan`) VALUES
(2, 'qila', 'klambi lah', '../foto/Screenshot 2025-04-24 142602.png', '100.000', 'belien ae wes kesuen males gue'),
(3, 'qila', 'minum', '../foto/image (8).png', '99.999', 'kiyuttt'),
(4, 'qila', 'Tumblr Karakter', '../foto/IMG_20250225_104443.jpg', '95.000', 'Termos tahan panas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembuat`
--

CREATE TABLE `tb_pembuat` (
  `id_pembuat` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `nama_pembuat` varchar(100) NOT NULL,
  `pendidikan_pembuat` varchar(100) NOT NULL,
  `detail_pembuat` text NOT NULL,
  `foto_pembuat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembuat`
--

INSERT INTO `tb_pembuat` (`id_pembuat`, `user_name`, `nama_pembuat`, `pendidikan_pembuat`, `detail_pembuat`, `foto_pembuat`) VALUES
(1, 'qila', 'aqila', 'smk bg', 'bukan sulap bukan she/her', '../foto/hawa2.jpg'),
(2, 'qila', 'p', 'pp', 'pppp', '../foto/IMG-20250105-WA0025 (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tb_game`
--
ALTER TABLE `tb_game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_merchandise`
--
ALTER TABLE `tb_merchandise`
  ADD PRIMARY KEY (`id_merchan`);

--
-- Indexes for table `tb_pembuat`
--
ALTER TABLE `tb_pembuat`
  ADD PRIMARY KEY (`id_pembuat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_game`
--
ALTER TABLE `tb_game`
  MODIFY `id_game` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_merchandise`
--
ALTER TABLE `tb_merchandise`
  MODIFY `id_merchan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembuat`
--
ALTER TABLE `tb_pembuat`
  MODIFY `id_pembuat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `FK_berita` FOREIGN KEY (`user_name`) REFERENCES `tb_admin` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD CONSTRAINT `FK_galeri` FOREIGN KEY (`user_name`) REFERENCES `tb_admin` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_game`
--
ALTER TABLE `tb_game`
  ADD CONSTRAINT `FK_game` FOREIGN KEY (`user_name`) REFERENCES `tb_admin` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_merchandise`
--
ALTER TABLE `tb_merchandise`
  ADD CONSTRAINT `FK_merchandise` FOREIGN KEY (`user_name`) REFERENCES `tb_admin` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembuat`
--
ALTER TABLE `tb_pembuat`
  ADD CONSTRAINT `FK_pembuat` FOREIGN KEY (`user_name`) REFERENCES `tb_admin` (`user_name`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
