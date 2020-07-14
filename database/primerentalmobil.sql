-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2020 pada 06.12
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primerentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_user_id` varchar(11) NOT NULL,
  `admin_address` varchar(128) NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  `admin_birth` date NOT NULL,
  `admin_gender` varchar(20) NOT NULL,
  `admin_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_user_id`, `admin_address`, `admin_phone`, `admin_birth`, `admin_gender`, `admin_created`) VALUES
('1', 'Muhammad Akbar ', '1', 'Bekasi, Jawa Barat', '82344555545    ', '2001-01-11', 'pria', 0),
('admin-01', 'primerental', 'user-0002', 'Jatiwaringin', '0813252588880000', '2000-01-01', 'Laki-laki', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name_of` varchar(50) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `bank_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name_of`, `bank_name`, `bank_number`) VALUES
(1, 'Wahidin', 'BRI', '3888 01 028216 53 5'),
(2, 'Devin Jodi', 'BNI', '5550 222 20002 4252'),
(3, 'Fajar', 'Mandiri', '0700 012 567 788'),
(4, 'Faqih', 'BCA', '731 025 2527');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_brand` varchar(45) NOT NULL,
  `car_type_id` int(11) NOT NULL,
  `car_no_police` varchar(20) NOT NULL,
  `car_price` varchar(45) NOT NULL,
  `car_fine` varchar(45) NOT NULL,
  `car_status` int(11) NOT NULL,
  `car_date_input` int(11) NOT NULL,
  `car_date_update` int(11) NOT NULL,
  `car_fuel` varchar(20) NOT NULL,
  `car_transmission` varchar(20) NOT NULL,
  `car_capacity` int(11) NOT NULL,
  `car_desc` text NOT NULL,
  `car_photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cars`
--

INSERT INTO `cars` (`car_id`, `car_brand`, `car_type_id`, `car_no_police`, `car_price`, `car_fine`, `car_status`, `car_date_input`, `car_date_update`, `car_fuel`, `car_transmission`, `car_capacity`, `car_desc`, `car_photo`) VALUES
(1, 'Agya Kuning', 1, 'AY 4523 DE', '300000', '20000', 0, 1587544311, 1590148812, 'Bensin', 'Manual', 5, 'Baru dari Toyota, Agya hadir dengan 5 varian. Varian teratas Agya, 1.2L TRD A / T a 1197 cc, Mesin bensin 4 silinder menghasilkan tenaga 87 hp dan Torsi 108 Nm. 5 kursi Agya 1.2L TRD A / T memiliki transmisi Otomatis 4-Kecepatan. Perangkat Anti Pencurian & Alarm Anti Pencurian menambah keamanan mobil.', 'car-1587547843-prime.png'),
(2, 'Toyota Yaris', 1, 'TY 5432 IN', '400000', '20000', 1, 1587544392, 1593098461, 'Bensin', 'Otomatis', 5, 'Yaris ditawarkan dengan banyak fitur di semua varian yang membuatnya kompeten di segmen Hatchback. Menghidupkan Yaris TRD Sportivo CVT adalah mesin 1496 cc yang menghasilkan daya maksimum 106 hp sementara torsi puncak berbunyi 140 Nm. Model teratas Yaris cukup efisien dan memberikan angka mengesankan berkisar antara 11,9 kmpl di kota. Kisaran lebih lanjut didorong ke 14,3 kmpl di jalan raya.', 'car1587544392.png'),
(3, 'Honda Brio', 1, 'HB 3439 IN', '450000', '20000', 1, 1587544515, 1593173183, 'Bensin', 'Otomatis', 5, 'Hatchback baru dari Honda, Brio hadir dengan 5 varian. Varian teratas Brio, RS CVT 1199 cc, mesin Bensin 4 silinder menghasilkan tenaga 89 hp dan torsi 110 Nm. Brio RS CVT 5 kursi memiliki transmisi CVT Variable Speed. Perangkat Anti Pencurian & Alarm Anti Pencurian menambah keamanan mobil.\r\n\r\n', 'car1587544515.png'),
(6, 'Toyota Alphard', 22, 'AP 4439 AD', '1200000', '20000', 1, 1587571795, 1590132864, 'Bensin', 'Otomatis', 7, 'MPV baru dari Toyota, Alphard hadir dengan 3 varian. Varian teratas dari Alphard, 3.5 Q A / T a 3456 cc, Mesin bensin 6 silinder menghasilkan tenaga 296 hp dan Torsi 360 Nm. The 7 seater Alphard 3.5 Q A / T memiliki transmisi Otomatis 8-Kecepatan. Perangkat Anti Pencurian & Mesin Immobilizer menambah keamanan mobil.', 'car1587571795.png'),
(9, 'Honda Mobilio', 3, 'ARD 3434 HM', '450000', '', 0, 1590154049, 1592913358, 'Bensin', 'Otomatis', 6, 'Mobilio ditawarkan dengan banyak fitur di semua varian yang membuatnya kompeten di segmen MPV. Memberi daya pada Mobilio RS CVT adalah gilingan 1496 cc yang menghasilkan tenaga maksimum 116 hp sedangkan torsi puncak berbunyi 145 Nm. Model teratas Mobilio cukup efisien dan memberikan angka mengesankan berkisar antara 14,8 kmpl di kota. Kisaran lebih jauh didorong ke 18,9 kmpl di jalan raya.', 'car1590154049.png'),
(10, 'Toyota Fortuner', 22, 'AC 4333 DD', '1250000', '', 0, 1590996090, 0, 'Diesel', 'Manual', 7, 'SUV baru dari Toyota, Fortuner hadir dengan 8 varian. Varian Top Fortuner, 2.4 VRZ AT 4x4 2.393 cc, mesin Diesel 4 silinder menghasilkan tenaga 148 hp dan Torsi 400 Nm. 7 kursi Fortuner 2.4 VRZ AT 4x4 memiliki transmisi Otomatis 6-Kecepatan. Central Locking & Anti Theft Device menambah keamanan mobil.', 'car1590996090.png'),
(11, 'Suzuki APV Luxury', 9, 'ALP 3444 ERD', '350000', '', 0, 1590997571, 1592913295, 'Bensin', 'Manual', 7, 'Minivan baru dari Suzuki, APV Luxury hadir dengan 2 varian. Varian teratas dari APV Luxury, MT R17 yang 1.493 cc, mesin bensin 4 silinder menghasilkan tenaga 92 hp dan torsi 126 Nm. 7 kursi APV Luxury MT R17 memiliki transmisi Otomatis 4-Kecepatan. Perangkat Anti Pencurian & Alarm Anti Pencurian menambah keamanan mobil.', 'car1590997571.png'),
(12, 'Kijang Innova Reborn', 9, 'CFR 2222 JKL', '710000', '', 0, 1590997855, 1592913333, 'Bensin', 'Manual', 7, 'Kijang Innova ditawarkan dengan banyak fitur di semua varian yang membuatnya kompeten di segmen MPV. Menghidupkan Kijang Innova V A / T Diesel adalah 2.393 cc yang menghasilkan daya maksimum 147 hp sedangkan torsi puncak berbunyi 360 Nm. Model teratas Kijang Innova cukup efisien dan memberikan angka mengesankan berkisar antara 12,4 kmpl di kota. Kisaran lebih jauh didorong ke 18,5 kmpl di jalan raya.', 'car1590997855.png'),
(13, 'Daihatsu Gran Max MB', 9, 'DGM 2222 TGD', '440000', '', 0, 1590997953, 1592913314, 'Bensin', 'Manual', 8, 'Van baru dari Daihatsu, Gran Max MB hadir dengan 3 varian. Varian teratas dari Gran Max MB 1.5 D Face To Face 1.495 cc, mesin bensin 4 silinder yang menghasilkan tenaga 96 hp dan Torsi 134 Nm. 9 kursi Gran Max MB 1.5 D Face To Face memiliki transmisi Manual 5-Kecepatan. Entri Kartu Akses Pintar & Perangkat Anti Maling menambah keamanan mobil.', 'car1590997953.png'),
(14, 'Toyota Calya', 3, 'AD 007 DF', '250000', '', 0, 1590998103, 1592913378, 'Bensin', 'Manual', 5, 'MPV baru dari Toyota, Calya hadir dengan 3 varian. Varian teratas Calya, G AT a 1197 cc, mesin bensin 4 silinder menghasilkan tenaga 87 hp dan Torsi 108 Nm. The 7 seater Calya G AT memiliki transmisi Otomatis 4-Kecepatan. Perangkat Anti Pencurian & Alarm Anti Pencurian menambah keamanan mobil.', 'car1590998103.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `car_types`
--

CREATE TABLE `car_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `car_types`
--

INSERT INTO `car_types` (`type_id`, `type_name`) VALUES
(1, 'Hatback'),
(3, 'MPV'),
(9, 'Transporter'),
(10, 'Sedan'),
(22, 'SUV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `client_id` varchar(11) NOT NULL,
  `client_user_id` varchar(11) NOT NULL,
  `client_fullname` varchar(50) NOT NULL,
  `client_ID_num` varchar(30) NOT NULL,
  `client_IDcard_img` varchar(128) NOT NULL,
  `client_address` varchar(128) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`client_id`, `client_user_id`, `client_fullname`, `client_ID_num`, `client_IDcard_img`, `client_address`, `client_phone`, `client_status`) VALUES
('client-0001', 'user-0001', 'The Unit', '000000000000111', 'FOTOKTP-client-0001-20200712.png', 'nothing', 'The Unit', 0),
('client-0002', 'user-0014', 'Client001', '08888282222222', 'FOTOKTP-client-0002-20200712.png', 'Jakarta', 'Client001', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` varchar(15) NOT NULL,
  `driver_user_id` varchar(11) NOT NULL,
  `driver_name` varchar(45) NOT NULL,
  `driver_ID_number` varchar(50) NOT NULL,
  `driver_phone` varchar(20) NOT NULL,
  `driver_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_user_id`, `driver_name`, `driver_ID_number`, `driver_phone`, `driver_status`) VALUES
('D-005', 'user-0009', 'driver-004', '1594441569', '+628-0000-0000-0000', '0'),
('D-006', 'user-0010', 'driver-005', '1594441608', '+628-0000-0000-0000', '0'),
('D-007', 'user-0011', 'driver-006', '1594441721', '+628-0000-0000-0000', '0'),
('D-008', 'user-0012', 'driver-007', '1594452816', '+628-0000-0000-0000', '0'),
('D-009', 'user-0013', 'driver-008', '1594537618', '+628-0000-0000-0000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` varchar(15) NOT NULL,
  `inbox_to` varchar(11) NOT NULL,
  `inbox_from` varchar(40) NOT NULL,
  `inbox_subject` varchar(128) NOT NULL,
  `inbox_title` varchar(128) NOT NULL,
  `inbox_text` longtext NOT NULL,
  `inbox_created_at` int(11) NOT NULL,
  `inbox_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `inbox_to`, `inbox_from`, `inbox_subject`, `inbox_title`, `inbox_text`, `inbox_created_at`, `inbox_status`) VALUES
('inbox00001', 'user-0001', 'primerental@gmail.com', 'Pembayaran anda telah kami dikonfirmasi', 'Konfirmasi pembayaran', '                                            <div class=\"row\">\n                                                <div class=\"col-12\">\n                                                    <br>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"d-flex flex-column justify-content-center align-items-center \">\n                                                        <i class=\"fas text-success  fa-check-circle   fa-4x\">\n                                                        </i>\n                                                        <br>\n                                                        <p class=\" font-18px font-md-25px mt-2 font-w-600 text-success  \">\n                                                            Pembayaran Berhasil\n                                                        </p>\n                                                    </div>\n                                                    <br><br>\n\n\n                                                    <p>Hai <b>The Unit</b></p>\n                                                   \n                                                    <p>Terima kasih atas pembayaran. Kami telah menerima bukti pembayaran dan telah kami konfirmasi sebagai pembayaran yang sukses. untuk langkah selanjutnya silahkan lengkapi data diri anda sebagai syarat dalam transaksi penyewaan ini.\n                                                    </p>\n\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"col-md-7 mx-auto text-center\">\n                                                        <ul class=\"list-group list-group-flush  \">\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                            No Pesanan\n                                                                <span class=\"\">rent-001</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Nama \n                                                                <span class=\"\">The Unit</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Tanggal bayar\n                                                                <span class=\"\">\n                                                                Sunday, 12 07 20 | 00:21 AM</span>\n                                                            </li>\n                                                            <li class=\"list-group-item  d-flex justify-content-between align-items-center\">\n                                                                Metode Pembayaran\n                                                                <span class=\"\">\n                                                                BANK TRANSFER</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Total\n                                                                <span class=\"\">\n                                                                Rp. 2.400.000,00</span>\n                                                            </li>\n                                                        </ul>\n                                                        <br>\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/invoice/pembayaran?rentId=rent-001\" class=\" btn btn-success \" >\n                                                            Lihat Detail Pembayaran\n                                                        </a>\n                                                    </div>\n                                                    \n                                                    <br><br><br>\n\n                                                    <p>\n                                                        Klik Link Dibawah ini untuk mengisi formulir data diri anda\n                                                        <br>\n                                                        <font color=\"#0089F9\">\n                                                        <a  class=\" text-decoration-none \"   href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/transaksi/konfirmasi-data-diri?rent_id=rent-001\">\n                                                            Lengkapi data diri\n                                                        </a>\n                                                        </font>\n                                                        \n                                                    </p>\n                                                    <br><br><br>\n                                                </div>\n\n                                                <div class=\"col-12 px\">\n\n                                                    <p>From</p>\n                                                    <h3>PrimeRental</h3>\n                                                    <br><br><br>\n                                                </div>\n\n                                            </div>\n\n                                        ', 1594488098, 1),
('inbox00002', 'user-0001', 'primerental@gmail.com', 'Bukti pembayaran anda kami tolak', 'Penolakan bukti pembayaran', '                                            <div class=\"row\">\n                                                <div class=\"col-12\">\n                                                    <br>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"d-flex flex-column justify-content-center align-items-center \">\n                                                        <i class=\"fas text-danger fa-times-circle fa-4x\">\n                                                        </i>\n                                                        <br>\n                                                        <p class=\" font-18px font-md-25px mt-2 font-w-600 text-danger  \">\n                                                            Bukti pembayaran kami tolak\n                                                        </p>\n                                                    </div>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"col-md-7 mx-auto text-center\">\n                                                    <p class=\"text-center\" >Hai <b>The Unit</b></p>\n                                                    <p class=\"px-2 text-center\" >Maaf, Pembayaran kami tolak dikarenakan bukti pembayaran anda tidak valid. Silahkan upload bukti pembayaran anda lagi\n                                                    </p>\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/invoice/pembayaran?rentId=rent-002\" class=\" btn btn-danger \" >\n                                                            Upload Bukti Pembayaran\n                                                        </a>\n                                                    </div>\n                                                    \n                                                    <br>\n                                                    <br><br><br>\n                                                </div>\n\n                                                <div class=\"col-12 px\">\n\n                                                    <p>From</p>\n                                                    <h3>PrimeRental</h3>\n                                                    <br><br><br>\n                                                </div>\n\n                                            </div>\n\n                                        ', 1594493918, 1),
('inbox00003', 'user-0014', 'primerental@gmail.com', 'Pembayaran anda telah kami dikonfirmasi', 'Konfirmasi pembayaran', '                                            <div class=\"row\">\n                                                <div class=\"col-12\">\n                                                    <br>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"d-flex flex-column justify-content-center align-items-center \">\n                                                        <i class=\"fas text-success  fa-check-circle   fa-4x\">\n                                                        </i>\n                                                        <br>\n                                                        <p class=\" font-18px font-md-25px mt-2 font-w-600 text-success  \">\n                                                            Pembayaran Berhasil\n                                                        </p>\n                                                    </div>\n                                                    <br><br>\n\n\n                                                    <p>Hai <b>Client001</b></p>\n                                                   \n                                                    <p>Terima kasih atas pembayaran. Kami telah menerima bukti pembayaran dan telah kami konfirmasi sebagai pembayaran yang sukses. untuk langkah selanjutnya silahkan lengkapi data diri anda sebagai syarat dalam transaksi penyewaan ini.\n                                                    </p>\n\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"col-md-7 mx-auto text-center\">\n                                                        <ul class=\"list-group list-group-flush  \">\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                            No Pesanan\n                                                                <span class=\"\">rent-004</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Nama \n                                                                <span class=\"\">Client001</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Tanggal bayar\n                                                                <span class=\"\">\n                                                                Sunday, 12 07 20 | 14:22 PM</span>\n                                                            </li>\n                                                            <li class=\"list-group-item  d-flex justify-content-between align-items-center\">\n                                                                Metode Pembayaran\n                                                                <span class=\"\">\n                                                                BANK TRANSFER</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Total\n                                                                <span class=\"\">\n                                                                Rp. 1.100.000,00</span>\n                                                            </li>\n                                                        </ul>\n                                                        <br>\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/user-0014/dashboard/invoice/pembayaran?rentId=rent-004\" class=\" btn btn-success \" >\n                                                            Lihat Detail Pembayaran\n                                                        </a>\n                                                    </div>\n                                                    \n                                                    <br><br><br>\n\n                                                    <p>\n                                                        Klik Link Dibawah ini untuk mengisi formulir data diri anda\n                                                        <br>\n                                                        <font color=\"#0089F9\">\n                                                        <a  class=\" text-decoration-none \"   href=\"http://localhost/rentalmobil/v4.2/user/user-0014/dashboard/transaksi/konfirmasi-data-diri?rent_id=rent-004\">\n                                                            Lengkapi data diri\n                                                        </a>\n                                                        </font>\n                                                        \n                                                    </p>\n                                                    <br><br><br>\n                                                </div>\n\n                                                <div class=\"col-12 px\">\n\n                                                    <p>From</p>\n                                                    <h3>PrimeRental</h3>\n                                                    <br><br><br>\n                                                </div>\n\n                                            </div>\n\n                                        ', 1594538683, 1),
('inbox00004', 'user-0014', 'primerental@gmail.com', 'Pesanan anda telah mendapat persetujaun ', 'Persetujuan Transaksi', '                                        <div class=\"row\">\r\n                                            <div class=\"col-10 mx-auto\">\r\n                                                <br>\r\n                                                <br>\r\n                                                <br>\r\n                                                <div class=\"d-flex flex-column justify-content-center align-items-center \">\r\n                                                    <p class=\" font-35px font-md-6 text-uppercase text-success font-w-600  \">\r\n                                                        Terima Kasih\r\n                                                    </p>\r\n                                                </div>\r\n                                                <br><br>\r\n\r\n\r\n                                                <p class=\"mb-0\">Halo <b>Client001</b></p>\r\n                                                <p>Terima kasih telah menggunakan layanan kami. dan saat ini kami telah melakukan persetujuan untuk pesanan anda.\r\n                                                </p>\r\n                                                <br>\r\n                                                <div class=\"row mt-2 mb-2\">\r\n                                                    <div class=\"col-6\">\r\n                                                        <div class=\"d-flex flex-column \">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600 \">\r\n                                                                Untuk\r\n                                                            </span>\r\n                                                            <div class=\"d-flex flex-column \">\r\n                                                                <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                    Client001                                                                </span>\r\n                                                                <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                    client001@gmail.com                                                                </span>\r\n                                                            </div>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-6 text-right\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                No Pesanan\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-17px font-md-24px font-w-700\">\r\n                                                                rent-004                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                </div>\r\n                                                <div class=\"row\">\r\n\r\n                                                    <div class=\"col-md-4 mt-2\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Tgl Transaksi\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                12 July 2020                                                            </span>\r\n                                                        </div>\r\n                                                        <div class=\"d-flex flex-column mt-1\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Waktu\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                2 Hari\r\n                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-md-4 mt-2  \">\r\n                                                        <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                            Tgl Sewa\r\n                                                        </span>\r\n                                                        <div class=\"d-flex flex-column\">\r\n                                                            <p class=\"mb-0 \" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Tanggal Mulai\">\r\n                                                                <i class=\"fas font-11px fa-hourglass-start mr-1 fa-fw\"></i>\r\n                                                                12 July 2020                                                            </p>\r\n\r\n                                                            <p class=\"mb-0 text-danger \" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Tanggal Berakhir\">\r\n                                                                <i class=\"fas font-11px fa-hourglass-end mr-1 fa-fw\"></i>\r\n                                                                14 July 2020                                                            </p>\r\n\r\n                                                        </div>\r\n                                                        \r\n                                                    </div>\r\n                                                    <div class=\"col-md-4 text-right mt-2\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Layanan\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                                                                                    <span>All in</span>\r\n                                                                                                                            </span>\r\n                                                        </div>\r\n                                                        <div class=\"d-flex flex-column mt-1\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Total Harga\r\n                                                            </span>\r\n                                                            <span>\r\n                                                                <span class=\"text-info font-16px font-md-20px font-w-700\">\r\n                                                                    Rp. 1.100.000                                                                </span>\r\n                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                </div>\r\n\r\n                                                <div class=\"row mt-2\">\r\n                                                    <div class=\"col-12\">\r\n                                                        <div class=\"rounded pt-3\">\r\n                                                            <table class=\"table\">\r\n                                                                <thead class=\"thead-light\">\r\n                                                                    <tr>\r\n                                                                        <th class=\"text-center\">Mobil</th>\r\n                                                                        <th>Tipe</th>\r\n                                                                        <th>Harga sewa / hari</th>\r\n                                                                    </tr>\r\n                                                                </thead>\r\n                                                                <tbody>\r\n                                                                    <tr>\r\n                                                                        <td>\r\n                                                                            <div class=\"d-flex align-items-center flex-nowrap\"><img height=\"80\" class=\"\" src=\"http://localhost/rentalmobil/v4.2/assets/uploads/cars/car1587544515.png\" alt=\"\">\r\n                                                                                <div class=\"ml-1 text-nowrap\">\r\n                                                                                    <span class=\"font-14px w-100 mb-0 \">\r\n                                                                                        Honda Brio                                                                                    </span>\r\n\r\n                                                                                </div>\r\n                                                                            </div>\r\n                                                                        </td>\r\n                                                                        <td>\r\n                                                                            <p>Hatback</p>\r\n                                                                        </td>\r\n\r\n                                                                        <td>\r\n                                                                            <p>Rp. 450.000/hari</p>\r\n                                                                        </td>\r\n                                                                    </tr>\r\n                                                                </tbody>\r\n                                                            </table>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-12 mt-2\">\r\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/1/dashboard/invoice?rent_id=rent-004\" class=\"btn btn-success\">\r\n                                                            <i class=\"fas fa-file-invoice mr-1\"></i> Lihat lebih Invoice\r\n                                                        </a>\r\n                                                    </div>\r\n                                                </div>\r\n                                                <div class=\"row mt-4\">\r\n                                                    <div class=\"col-12\">\r\n                                                        <p class=\"mb-0\">From</p>\r\n                                                        <h3>PrimeRental</h3>\r\n                                                        <br><br><br>\r\n                                                    </div>\r\n                                                </div>\r\n                                            </div>\r\n                                        </div>\r\n                                        ', 1594540074, 1),
('inbox00005', 'user-0001', 'primerental@gmail.com', 'Pesanan anda telah mendapat persetujaun ', 'Persetujuan Transaksi', '                                        <div class=\"row\">\r\n                                            <div class=\"col-10 mx-auto\">\r\n                                                <br>\r\n                                                <br>\r\n                                                <br>\r\n                                                <div class=\"d-flex flex-column justify-content-center align-items-center \">\r\n                                                    <p class=\" font-35px font-md-6 text-uppercase text-success font-w-600  \">\r\n                                                        Terima Kasih\r\n                                                    </p>\r\n                                                </div>\r\n                                                <br><br>\r\n\r\n\r\n                                                <p class=\"mb-0\">Halo <b>The Unit</b></p>\r\n                                                <p>Terima kasih telah menggunakan layanan kami. dan saat ini kami telah melakukan persetujuan untuk pesanan anda.\r\n                                                </p>\r\n                                                <br>\r\n                                                <div class=\"row mt-2 mb-2\">\r\n                                                    <div class=\"col-6\">\r\n                                                        <div class=\"d-flex flex-column \">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600 \">\r\n                                                                Untuk\r\n                                                            </span>\r\n                                                            <div class=\"d-flex flex-column \">\r\n                                                                <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                    The Unit                                                                </span>\r\n                                                                <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                    unit@gmail.com                                                                </span>\r\n                                                            </div>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-6 text-right\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                No Pesanan\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-17px font-md-24px font-w-700\">\r\n                                                                rent-001                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                </div>\r\n                                                <div class=\"row\">\r\n\r\n                                                    <div class=\"col-md-4 mt-2\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Tgl Transaksi\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                12 July 2020                                                            </span>\r\n                                                        </div>\r\n                                                        <div class=\"d-flex flex-column mt-1\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Waktu\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                2 Hari\r\n                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-md-4 mt-2  \">\r\n                                                        <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                            Tgl Sewa\r\n                                                        </span>\r\n                                                        <div class=\"d-flex flex-column\">\r\n                                                            <p class=\"mb-0 \" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Tanggal Mulai\">\r\n                                                                <i class=\"fas font-11px fa-hourglass-start mr-1 fa-fw\"></i>\r\n                                                                12 July 2020                                                            </p>\r\n\r\n                                                            <p class=\"mb-0 text-danger \" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Tanggal Berakhir\">\r\n                                                                <i class=\"fas font-11px fa-hourglass-end mr-1 fa-fw\"></i>\r\n                                                                12 July 2020                                                            </p>\r\n\r\n                                                        </div>\r\n                                                        \r\n                                                    </div>\r\n                                                    <div class=\"col-md-4 text-right mt-2\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Layanan\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                                                                                    <span>Self Driver</span>\r\n                                                                                                                            </span>\r\n                                                        </div>\r\n                                                        <div class=\"d-flex flex-column mt-1\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Total Harga\r\n                                                            </span>\r\n                                                            <span>\r\n                                                                <span class=\"text-info font-16px font-md-20px font-w-700\">\r\n                                                                    Rp. 2.400.000                                                                </span>\r\n                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                </div>\r\n\r\n                                                <div class=\"row mt-2\">\r\n                                                    <div class=\"col-12\">\r\n                                                        <div class=\"rounded pt-3\">\r\n                                                            <table class=\"table\">\r\n                                                                <thead class=\"thead-light\">\r\n                                                                    <tr>\r\n                                                                        <th class=\"text-center\">Mobil</th>\r\n                                                                        <th>Tipe</th>\r\n                                                                        <th>Harga sewa / hari</th>\r\n                                                                    </tr>\r\n                                                                </thead>\r\n                                                                <tbody>\r\n                                                                    <tr>\r\n                                                                        <td>\r\n                                                                            <div class=\"d-flex align-items-center flex-nowrap\"><img height=\"80\" class=\"\" src=\"http://localhost/rentalmobil/v4.2/assets/uploads/cars/car1587571795.png\" alt=\"\">\r\n                                                                                <div class=\"ml-1 text-nowrap\">\r\n                                                                                    <span class=\"font-14px w-100 mb-0 \">\r\n                                                                                        Toyota Alphard                                                                                    </span>\r\n\r\n                                                                                </div>\r\n                                                                            </div>\r\n                                                                        </td>\r\n                                                                        <td>\r\n                                                                            <p>SUV</p>\r\n                                                                        </td>\r\n\r\n                                                                        <td>\r\n                                                                            <p>Rp. 1.200.000/hari</p>\r\n                                                                        </td>\r\n                                                                    </tr>\r\n                                                                </tbody>\r\n                                                            </table>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-12 mt-2\">\r\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/1/dashboard/invoice?rent_id=rent-001\" class=\"btn btn-success\">\r\n                                                            <i class=\"fas fa-file-invoice mr-1\"></i> Lihat lebih Invoice\r\n                                                        </a>\r\n                                                    </div>\r\n                                                </div>\r\n                                                <div class=\"row mt-4\">\r\n                                                    <div class=\"col-12\">\r\n                                                        <p class=\"mb-0\">From</p>\r\n                                                        <h3>PrimeRental</h3>\r\n                                                        <br><br><br>\r\n                                                    </div>\r\n                                                </div>\r\n                                            </div>\r\n                                        </div>\r\n                                        ', 1594540207, 1),
('inbox00006', 'user-0001', 'primerental@gmail.com', 'Bukti pembayaran anda kami tolak', 'Penolakan bukti pembayaran', '                                            <div class=\"row\">\n                                                <div class=\"col-12\">\n                                                    <br>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"d-flex flex-column justify-content-center align-items-center \">\n                                                        <i class=\"fas text-danger fa-times-circle fa-4x\">\n                                                        </i>\n                                                        <br>\n                                                        <p class=\" font-18px font-md-25px mt-2 font-w-600 text-danger  \">\n                                                            Bukti pembayaran kami tolak\n                                                        </p>\n                                                    </div>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"col-md-7 mx-auto text-center\">\n                                                    <p class=\"text-center\" >Hai <b>The Unit</b></p>\n                                                    <p class=\"px-2 text-center\" >Maaf, Pembayaran kami tolak dikarenakan bukti pembayaran anda tidak valid. Silahkan upload bukti pembayaran anda lagi\n                                                    </p>\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/invoice/pembayaran?rentId=rent-003\" class=\" btn btn-danger \" >\n                                                            Upload Bukti Pembayaran\n                                                        </a>\n                                                    </div>\n                                                    \n                                                    <br>\n                                                    <br><br><br>\n                                                </div>\n\n                                                <div class=\"col-12 px\">\n\n                                                    <p>From</p>\n                                                    <h3>PrimeRental</h3>\n                                                    <br><br><br>\n                                                </div>\n\n                                            </div>\n\n                                        ', 1594564783, 1);
INSERT INTO `inbox` (`inbox_id`, `inbox_to`, `inbox_from`, `inbox_subject`, `inbox_title`, `inbox_text`, `inbox_created_at`, `inbox_status`) VALUES
('inbox00007', 'user-0001', 'primerental@gmail.com', 'Pembayaran anda telah kami dikonfirmasi', 'Konfirmasi pembayaran', '                                            <div class=\"row\">\n                                                <div class=\"col-12\">\n                                                    <br>\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"d-flex flex-column justify-content-center align-items-center \">\n                                                        <i class=\"fas text-success  fa-check-circle   fa-4x\">\n                                                        </i>\n                                                        <br>\n                                                        <p class=\" font-18px font-md-25px mt-2 font-w-600 text-success  \">\n                                                            Pembayaran Berhasil\n                                                        </p>\n                                                    </div>\n                                                    <br><br>\n\n\n                                                    <p>Hai <b>The Unit</b></p>\n                                                   \n                                                    <p>Terima kasih atas pembayaran. Kami telah menerima bukti pembayaran dan telah kami konfirmasi sebagai pembayaran yang sukses. untuk langkah selanjutnya silahkan lengkapi data diri anda sebagai syarat dalam transaksi penyewaan ini.\n                                                    </p>\n\n                                                    <br>\n                                                    <br>\n                                                    <div class=\"col-md-7 mx-auto text-center\">\n                                                        <ul class=\"list-group list-group-flush  \">\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                            No Pesanan\n                                                                <span class=\"\">rent-003</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Nama \n                                                                <span class=\"\">The Unit</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Tanggal bayar\n                                                                <span class=\"\">\n                                                                Sunday, 12 07 20 | 21:40 PM</span>\n                                                            </li>\n                                                            <li class=\"list-group-item  d-flex justify-content-between align-items-center\">\n                                                                Metode Pembayaran\n                                                                <span class=\"\">\n                                                                BANK TRANSFER</span>\n                                                            </li>\n                                                            <li class=\"list-group-item border-0 d-flex justify-content-between align-items-center\">\n                                                                Total\n                                                                <span class=\"\">\n                                                                Rp. 400.000,00</span>\n                                                            </li>\n                                                        </ul>\n                                                        <br>\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/invoice/pembayaran?rentId=rent-003\" class=\" btn btn-success \" >\n                                                            Lihat Detail Pembayaran\n                                                        </a>\n                                                    </div>\n                                                    \n                                                    <br><br><br>\n\n                                                    <p>\n                                                        Klik Link Dibawah ini untuk mengisi formulir data diri anda\n                                                        <br>\n                                                        <font color=\"#0089F9\">\n                                                        <a  class=\" text-decoration-none \"   href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/transaksi/konfirmasi-data-diri?rent_id=rent-003\">\n                                                            Lengkapi data diri\n                                                        </a>\n                                                        </font>\n                                                        \n                                                    </p>\n                                                    <br><br><br>\n                                                </div>\n\n                                                <div class=\"col-12 px\">\n\n                                                    <p>From</p>\n                                                    <h3>PrimeRental</h3>\n                                                    <br><br><br>\n                                                </div>\n\n                                            </div>\n\n                                        ', 1594564840, 1),
('inbox00008', 'user-0001', 'primerental@gmail.com', 'Pesanan anda telah mendapat persetujaun ', 'Persetujuan Transaksi', '                                        <div class=\"row\">\r\n                                            <div class=\"col-10 mx-auto\">\r\n                                                <br>\r\n                                                <br>\r\n                                                <br>\r\n                                                <div class=\"d-flex flex-column justify-content-center align-items-center \">\r\n                                                    <p class=\" font-35px font-md-6 text-uppercase text-success font-w-600  \">\r\n                                                        Terima Kasih\r\n                                                    </p>\r\n                                                </div>\r\n                                                <br><br>\r\n\r\n\r\n                                                <p class=\"mb-0\">Halo <b>The Unit</b></p>\r\n                                                <p>Terima kasih telah menggunakan layanan kami. dan saat ini kami telah melakukan persetujuan untuk pesanan anda.\r\n                                                </p>\r\n                                                <br>\r\n                                                <div class=\"row mt-2 mb-2\">\r\n                                                    <div class=\"col-6\">\r\n                                                        <div class=\"d-flex flex-column \">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600 \">\r\n                                                                Untuk\r\n                                                            </span>\r\n                                                            <div class=\"d-flex flex-column \">\r\n                                                                <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                    The Unit                                                                </span>\r\n                                                                <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                    unit@gmail.com                                                                </span>\r\n                                                            </div>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-6 text-right\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                No Pesanan\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-17px font-md-24px font-w-700\">\r\n                                                                rent-003                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                </div>\r\n                                                <div class=\"row\">\r\n\r\n                                                    <div class=\"col-md-4 mt-2\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Tgl Transaksi\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                12 July 2020                                                            </span>\r\n                                                        </div>\r\n                                                        <div class=\"d-flex flex-column mt-1\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Waktu\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                1 Hari\r\n                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-md-4 mt-2  \">\r\n                                                        <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                            Tgl Sewa\r\n                                                        </span>\r\n                                                        <div class=\"d-flex flex-column\">\r\n                                                            <p class=\"mb-0 \" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Tanggal Mulai\">\r\n                                                                <i class=\"fas font-11px fa-hourglass-start mr-1 fa-fw\"></i>\r\n                                                                13 July 2020                                                            </p>\r\n\r\n                                                            <p class=\"mb-0 text-danger \" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Tanggal Berakhir\">\r\n                                                                <i class=\"fas font-11px fa-hourglass-end mr-1 fa-fw\"></i>\r\n                                                                14 July 2020                                                            </p>\r\n\r\n                                                        </div>\r\n                                                        \r\n                                                    </div>\r\n                                                    <div class=\"col-md-4 text-right mt-2\">\r\n                                                        <div class=\"d-flex flex-column flex-wrap\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Layanan\r\n                                                            </span>\r\n                                                            <span class=\"text-dark font-15px font-md-18px font-w-700\">\r\n                                                                                                                                    <span>Self Driver</span>\r\n                                                                                                                            </span>\r\n                                                        </div>\r\n                                                        <div class=\"d-flex flex-column mt-1\">\r\n                                                            <span class=\"text-black-50 font-14px font-md-15px font-w-600\">\r\n                                                                Total Harga\r\n                                                            </span>\r\n                                                            <span>\r\n                                                                <span class=\"text-info font-16px font-md-20px font-w-700\">\r\n                                                                    Rp. 400.000                                                                </span>\r\n                                                            </span>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                </div>\r\n\r\n                                                <div class=\"row mt-2\">\r\n                                                    <div class=\"col-12\">\r\n                                                        <div class=\"rounded pt-3\">\r\n                                                            <table class=\"table\">\r\n                                                                <thead class=\"thead-light\">\r\n                                                                    <tr>\r\n                                                                        <th class=\"text-center\">Mobil</th>\r\n                                                                        <th>Tipe</th>\r\n                                                                        <th>Harga sewa / hari</th>\r\n                                                                    </tr>\r\n                                                                </thead>\r\n                                                                <tbody>\r\n                                                                    <tr>\r\n                                                                        <td>\r\n                                                                            <div class=\"d-flex align-items-center flex-nowrap\"><img height=\"80\" class=\"\" src=\"http://localhost/rentalmobil/v4.2/assets/uploads/cars/car1587544392.png\" alt=\"\">\r\n                                                                                <div class=\"ml-1 text-nowrap\">\r\n                                                                                    <span class=\"font-14px w-100 mb-0 \">\r\n                                                                                        Toyota Yaris                                                                                    </span>\r\n\r\n                                                                                </div>\r\n                                                                            </div>\r\n                                                                        </td>\r\n                                                                        <td>\r\n                                                                            <p>Hatback</p>\r\n                                                                        </td>\r\n\r\n                                                                        <td>\r\n                                                                            <p>Rp. 400.000/hari</p>\r\n                                                                        </td>\r\n                                                                    </tr>\r\n                                                                </tbody>\r\n                                                            </table>\r\n                                                        </div>\r\n                                                    </div>\r\n                                                    <div class=\"col-12 mt-2\">\r\n                                                        <a href=\"http://localhost/rentalmobil/v4.2/user/1/dashboard/invoice?rent_id=rent-003\" class=\"btn btn-success\">\r\n                                                            <i class=\"fas fa-file-invoice mr-1\"></i> Lihat lebih Invoice\r\n                                                        </a>\r\n                                                    </div>\r\n                                                </div>\r\n                                                <div class=\"row mt-4\">\r\n                                                    <div class=\"col-12\">\r\n                                                        <p class=\"mb-0\">From</p>\r\n                                                        <h3>PrimeRental</h3>\r\n                                                        <br><br><br>\r\n                                                    </div>\r\n                                                </div>\r\n                                            </div>\r\n                                        </div>\r\n                                        ', 1594566095, 1),
('inbox00009', 'user-0001', 'primerental@gmail.com', 'Pesanan anda telah dibatalkan', 'Pembatalan transaksi ', '<div class=\"row mt-5 mb-4\"> \n        <div class=\"col-md-8 mx-auto \">\n        <div class=\"card card-bod p-3 border-0 shadow-sm \">\n            <div class=\"d-flex flex-column justify-content-center align-items-center \">\n                <i class=\"fas text-danger fa-ban  fa-4x\">\n                </i>\n                <br>\n                <p class=\" font-18px font-md-25px font-w-600 text-danger \">Pesanan Anda Ditolak</p>\n            </div>\n            <div class=\"d-flex mt-2 flex-column\">\n\n                <p class=\" text-dark text-center \">Halo The Unit <br>\n                    Maaf pesanan anda atas no pesan <span class=\" text-w-600 font-20px \" >rent-002</span> terpaksa kami tolak. <br> Dikarenakan anda terlambat melakukan pembayaran sesuai batas waktu yg ditentukan\n                </p>\n                <br><br>\n                <div class=\"d-flex text-center justify-content-center \">\n                    <h5>No pesanan:</h5>\n                    <h5 class=\"ml-2 text-black-50\"> rent-002</h5>\n                </div>\n                <div class=\"d-flex text-left justify-content-center\">\n                    <h5> Total Pembyaran : </h5>\n                    <h5 class=\"ml-2 text-black-50 \"> Rp. 450.000</h5>\n                </div>\n            </div>\n            \n            <div class=\"mx-auto mt-3\">\n                <a href=\"http://localhost/rentalmobil/v4.2/user/user-0001/dashboard/transaksi/pembatalan?rentId=rent-002\" class=\"btn btn-danger  \">\n                    Lihat Detail Pesanan\n                </a>\n            </div>\n            <br>\n            <br>\n            <br>\n            <div class=\"d-flex flex-column mt-4 \">\n                <span class=\" text-black-50 \">From</span>\n                <h3>PrimeRental</h3>\n            </div>\n        </div>\n    </div>\n</div>\n    ', 1594604235, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_trans`
--

CREATE TABLE `payment_trans` (
  `payment_id` varchar(11) NOT NULL,
  `payment_rental_id` varchar(11) NOT NULL,
  `payment_user_id` varchar(11) NOT NULL,
  `payment_proof` varchar(128) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `payment_total` varchar(20) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `payment_date_confirm` timestamp NULL DEFAULT NULL,
  `payment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_trans`
--

INSERT INTO `payment_trans` (`payment_id`, `payment_rental_id`, `payment_user_id`, `payment_proof`, `payment_method`, `payment_total`, `payment_status`, `payment_date_confirm`, `payment_date`) VALUES
('pay-001', 'rent-001', '0', 'bukti-pembayaran-pay-001-1594488060.png', 'BANK TRANSFER', '2400000', '1', '2020-07-11 17:21:38', 1594488060),
('pay-003', 'rent-003', '0', 'bukti-pembayaran-pay-003-1594564823.png', 'BANK TRANSFER', '400000', '1', '2020-07-12 14:40:40', 1594564823),
('pay-004', 'rent-004', '0', 'bukti-pembayaran-pay-004-1594538521.png', 'BANK TRANSFER', '1100000', '1', '2020-07-12 07:24:43', 1594538522);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rentalcancel_trans`
--

CREATE TABLE `rentalcancel_trans` (
  `rc_id` varchar(20) NOT NULL,
  `rc_rental_id` varchar(20) NOT NULL,
  `rc_date` int(11) NOT NULL,
  `rc_user_id` varchar(11) NOT NULL,
  `rc_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rentalcancel_trans`
--

INSERT INTO `rentalcancel_trans` (`rc_id`, `rc_rental_id`, `rc_date`, `rc_user_id`, `rc_message`) VALUES
('TC-001', 'rent-002', 1594604259, 'user-0001', 'Keterlambatan pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rental_trans`
--

CREATE TABLE `rental_trans` (
  `rent_id` varchar(20) NOT NULL,
  `rent_car_id` int(11) NOT NULL,
  `rent_user_id` varchar(11) NOT NULL,
  `rent_client_id` varchar(20) NOT NULL,
  `rent_price` varchar(128) NOT NULL,
  `rent_fine` varchar(45) NOT NULL,
  `rent_type` int(11) NOT NULL,
  `rent_service` int(11) NOT NULL,
  `rent_driver_id` varchar(11) DEFAULT NULL,
  `rent_date` datetime NOT NULL,
  `rent_date_start` date NOT NULL,
  `rent_date_end` date NOT NULL,
  `rent_return_status` varchar(40) NOT NULL,
  `rent_status` varchar(40) NOT NULL,
  `rent_order_status` int(11) NOT NULL,
  `rent_city` varchar(40) NOT NULL,
  `rent_city_destin` varchar(50) NOT NULL,
  `rent_pickup_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rental_trans`
--

INSERT INTO `rental_trans` (`rent_id`, `rent_car_id`, `rent_user_id`, `rent_client_id`, `rent_price`, `rent_fine`, `rent_type`, `rent_service`, `rent_driver_id`, `rent_date`, `rent_date_start`, `rent_date_end`, `rent_return_status`, `rent_status`, `rent_order_status`, `rent_city`, `rent_city_destin`, `rent_pickup_address`) VALUES
('rent-001', 6, 'user-0001', 'client-0001', '2400000', '-', 1, 1, NULL, '2020-07-12 00:19:44', '2020-07-12', '2020-07-14', '-', 'jalan', 1, 'jakarta', 'jakarta, bogor', ''),
('rent-002', 9, 'user-0001', 'client-0002', '450000', '-', 1, 1, NULL, '2020-07-12 01:13:21', '2020-07-13', '2020-07-14', '-', 'dibatalkan', 0, 'jakarta', 'jakarta, bogor', ''),
('rent-003', 2, 'user-0001', 'client-0002', '400000', '-', 1, 1, NULL, '2020-07-12 03:27:20', '2020-07-13', '2020-07-14', '-', 'jalan', 1, 'jakarta', 'depok, tanggerang', ''),
('rent-004', 3, 'user-0014', 'client-0002', '1100000', '-', 1, 3, 'D-009', '2020-07-12 14:20:04', '2020-07-12', '2020-07-14', '-', 'jalan', 1, 'jakarta', 'jakarta, bogor', 'Jakarta Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_is_activation` int(11) NOT NULL,
  `user_photo` varchar(128) NOT NULL,
  `user_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `user_status`, `user_is_activation`, `user_photo`, `user_created`) VALUES
('1', '!Special', 'akbar@gmail.com', '$2y$10$O2O2UT0ZmgB7kH1gGf0feed7Wzd8lgZX/L8FJTEG3BfFPR75o7kPy', 1, 'online', 1, 'ava-1592925379.jpg', 1586709933),
('user-0001', 'unit', 'unit@gmail.com', '$2y$10$o.B6NMDVowdbH.ReAF9svu0H3l45XbHKQGPCgmVve1oCEwyARqVO6', 3, 'online', 1, 'ava-1594270504.png', 1594270429),
('user-0002', 'primerental', 'primerental@gmail.com', '$2y$10$rfFNCdINdKK.7cAyTSwlxedWpL0JyQXr.behHn2QYYu6zAe/zu5dy', 1, 'online', 1, 'default.png', 1594489201),
('user-0009', 'driver-004', 'prime.driver004@gmail.com', '$2y$10$63mNOWlNEekEVOuM3f5OCeVin7TZKmkGaE5NPCKtFnLBzg1l9Hi26', 7, 'online', 1, 'default.png', 1594441569),
('user-0010', 'driver-005', 'prime.driver005@gmail.com', '$2y$10$O9mflJfh9NZLOCCn0hMTn.4viEYtoPhJyelLMDnoXo0jupPdGQWii', 7, 'online', 1, 'default.png', 1594441608),
('user-0011', 'driver-006', 'prime.driver006@gmail.com', '$2y$10$KU.ipY23Yt/RB9ejM4WKGOHYxgLgncHMmDTvWduByBDsmRaj75wye', 7, 'online', 1, 'default.png', 1594441721),
('user-0012', 'driver-007', 'prime.driver007@gmail.com', '$2y$10$.CHtmXiHL7Nj7lZ/Qi2u7.ZSmqnNmDiTu3lOaacHIN.piRI865.zO', 7, 'online', 1, 'default.png', 1594452816),
('user-0013', 'driver-008', 'prime.driver008@gmail.com', '$2y$10$uTkbLdlClZ7h9w1y6qpTCOnnoa30WnoCrzdabFZRFNisuwSl5xR/W', 7, 'online', 1, 'default.png', 1594537618),
('user-0014', 'Client001', 'client001@gmail.com', '$2y$10$2gxJEy8Fa0RcSY2PWuG2Ke7nxv5QkuTA3oEmz4YVLtg8qd0SSwszW', 3, 'online', 1, 'ava-1594538350.png', 1594538326);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `access_id` int(11) NOT NULL,
  `access_user_level_id` int(11) NOT NULL,
  `access_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`access_id`, `access_user_level_id`, `access_menu_id`) VALUES
(14, 1, 1),
(30, 1, 2),
(31, 1, 4),
(32, 1, 5),
(33, 1, 6),
(35, 1, 11),
(36, 4, 11),
(37, 4, 4),
(38, 4, 6),
(40, 4, 1),
(41, 4, 12),
(42, 1, 12),
(45, 3, 15),
(47, 3, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_submenu`
--

CREATE TABLE `user_access_submenu` (
  `access_id` int(11) NOT NULL,
  `access_user_level_id` int(11) NOT NULL,
  `access_submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_submenu`
--

INSERT INTO `user_access_submenu` (`access_id`, `access_user_level_id`, `access_submenu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(10, 1, 12),
(11, 1, 15),
(14, 1, 16),
(16, 1, 13),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(21, 1, 22),
(23, 1, 24),
(24, 1, 25),
(25, 1, 26),
(26, 1, 27),
(27, 2, 2),
(28, 5, 2),
(29, 5, 10),
(31, 1, 29),
(32, 1, 9),
(33, 1, 30),
(35, 1, 31),
(37, 1, 32),
(38, 2, 32),
(39, 5, 32),
(40, 1, 33),
(41, 1, 34),
(42, 1, 36),
(43, 1, 35),
(44, 1, 10),
(46, 4, 32),
(47, 4, 2),
(48, 4, 10),
(49, 4, 28),
(50, 4, 29),
(51, 4, 34),
(52, 1, 37),
(53, 4, 37),
(54, 4, 9),
(55, 1, 40),
(56, 1, 41),
(57, 4, 41),
(58, 4, 42),
(60, 1, 42);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `level_id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`level_id`, `level`) VALUES
(1, 'superadmin'),
(3, 'user'),
(4, 'admin'),
(7, 'driver'),
(15, 'clients');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_method` varchar(128) NOT NULL,
  `menu_url` varchar(128) NOT NULL,
  `menu_uri_segment` varchar(128) NOT NULL,
  `menu_name` varchar(128) NOT NULL,
  `menu_icon` varchar(128) NOT NULL,
  `menu_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu_method`, `menu_url`, `menu_uri_segment`, `menu_name`, `menu_icon`, `menu_type_id`) VALUES
(1, 'Dashoard/index', 'administrator/dashboard', 'dashboard', 'Dashboard', 'fad fa-fw fa-home', 1),
(2, 'System/menu', 'administrator/system-management', 'system-management', 'System Menu', 'fad fa-fw fa-sitemap', 1),
(4, 'Master_data/index', 'administrator/master-data', 'master-data', 'Master Data', 'fad fa-fw fa-database', 1),
(6, 'Users/index', 'administrator/users', 'users', 'Users', 'fad fa-fw fa-users', 1),
(11, 'Profile/index', 'administrator/profile', 'profile', 'Profile', 'fad fa-fw fa-user', 2),
(12, 'Transcation/index', 'administrator/transaction', 'transaction', 'Transaction', 'fad fa-fw fa-handshake-alt', 1),
(15, 'Rental/index', 'administrator/rental', 'rental', 'Demo', 'fas fa-user-tag', 1),
(16, 'Rental/rental_receipt', 'admistrator/rental/reset-receipt', 'admistrator/rental/reset-receipt', 'Transactions', 'fad fa-fw fa-list', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu_type`
--

CREATE TABLE `user_menu_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu_type`
--

INSERT INTO `user_menu_type` (`type_id`, `type_name`) VALUES
(1, 'sidebar'),
(2, 'default');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_submenu`
--

CREATE TABLE `user_submenu` (
  `submenu_id` int(11) NOT NULL,
  `submenu_menu_id` int(11) NOT NULL,
  `submenu_name` varchar(50) NOT NULL,
  `submenu_method` varchar(128) NOT NULL,
  `submenu_type_id` int(11) NOT NULL,
  `submenu_icon` varchar(128) NOT NULL,
  `submenu_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_submenu`
--

INSERT INTO `user_submenu` (`submenu_id`, `submenu_menu_id`, `submenu_name`, `submenu_method`, `submenu_type_id`, `submenu_icon`, `submenu_active`) VALUES
(1, 2, 'Menu Mangement', 'menu', 1, 'null', 1),
(2, 4, 'Data Cars', 'cars', 1, 'fa-fw fas fa-road', 1),
(3, 2, 'Submenu Mangement', 'submenu', 1, 'null', 1),
(4, 2, 'User Access Menu', 'user-access-menu', 1, 'null', 1),
(9, 4, 'Data Types Car', 'types-car', 1, 'fas fa-fw fa-car-garage', 1),
(34, 6, 'User', 'general', 1, 'null', 1),
(35, 6, 'Admin', 'admin', 1, 'null', 1),
(39, 1, 'Dashboard', 'dash', 1, 'null', 1),
(40, 6, 'Client', 'customer', 1, 'null', 1),
(41, 12, 'Rental', 'rent', 1, 'null', 1),
(42, 4, 'Data Drivers', 'drivers', 1, 'null', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indeks untuk tabel `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indeks untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indeks untuk tabel `payment_trans`
--
ALTER TABLE `payment_trans`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `rentalcancel_trans`
--
ALTER TABLE `rentalcancel_trans`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indeks untuk tabel `rental_trans`
--
ALTER TABLE `rental_trans`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`access_id`);

--
-- Indeks untuk tabel `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  ADD PRIMARY KEY (`access_id`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `user_menu_type`
--
ALTER TABLE `user_menu_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeks untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `car_types`
--
ALTER TABLE `car_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_menu_type`
--
ALTER TABLE `user_menu_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
