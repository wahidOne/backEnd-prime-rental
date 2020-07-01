-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2020 pada 13.25
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

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
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
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
(1, 'Muhammad Akbar ', 1, 'Bekasi, Jawa Barat', '82344555545    ', '2001-01-11', 'pria', 0),
(17, 'simple admin', 10, '-', '-', '0000-00-00', 'wanita', 0),
(28, 'wahidin', 14, '-', '-', '0000-00-00', 'pria', 0),
(30, 'Willi ', 18, 'New York', '00000000000 ', '0000-00-00', '-', 1592906770);

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
(6, 'Toyota Alphard', 22, 'AP 4439 AD', '1200000', '20000', 0, 1587571795, 1590132864, 'Bensin', 'Otomatis', 7, 'MPV baru dari Toyota, Alphard hadir dengan 3 varian. Varian teratas dari Alphard, 3.5 Q A / T a 3456 cc, Mesin bensin 6 silinder menghasilkan tenaga 296 hp dan Torsi 360 Nm. The 7 seater Alphard 3.5 Q A / T memiliki transmisi Otomatis 8-Kecepatan. Perangkat Anti Pencurian & Mesin Immobilizer menambah keamanan mobil.', 'car1587571795.png'),
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
  `client_user_id` int(11) NOT NULL,
  `client_fullname` varchar(50) NOT NULL,
  `client_ID_num` varchar(30) NOT NULL,
  `client_IDcard_img` varchar(128) NOT NULL,
  `client_fmcard_photo` varchar(128) NOT NULL,
  `client_address` varchar(128) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`client_id`, `client_user_id`, `client_fullname`, `client_ID_num`, `client_IDcard_img`, `client_fmcard_photo`, `client_address`, `client_phone`, `client_status`) VALUES
('client-0002', 22, 'UniitZeroOne', '', 'fotoKTP-client-0002-update-1033AM_29062020.jpg', '', 'D 14', '+6283300003333', 0),
('client-0003', 7, 'mr Micky Mouse', '', 'fotoKTP-client-0003-update-0318AM_29062020.png', '', 'none', '088245634567', 0),
('client-0004', 21, '02', '', 'fotoKTP-client-0004-update-0853AM_30062020.png', '', 'not found', '0024445657678', 0),
('client-0005', 23, 'Wahidin', '', '', '', 'Jatimakmur ', '395656946495865', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE `costumer` (
  `cos_id` int(11) NOT NULL,
  `cos_name` varchar(128) NOT NULL,
  `cos_address` varchar(128) NOT NULL,
  `cos_ID_num` varchar(50) NOT NULL,
  `cos_user_id` int(11) NOT NULL,
  `cos_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`cos_id`, `cos_name`, `cos_address`, `cos_ID_num`, `cos_user_id`, `cos_phone`) VALUES
(5, 'register 2', 'Jakarta', '3456455555', 19, '5565856856'),
(6, 'i am unit', 'Jakarta Timur', '95y8504055', 7, '9544887786'),
(12, 'TheGiant', 'Bogor', '09898738909', 20, '088245634567'),
(13, 'ZeroOne', 'Jakarta', '055555', 22, '0843222254542222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(45) NOT NULL,
  `driver_ID_number` varchar(50) NOT NULL,
  `driver_user_id` int(11) NOT NULL,
  `driver_phone` varchar(20) NOT NULL,
  `driver_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_ID_number`, `driver_user_id`, `driver_phone`, `driver_status`) VALUES
(2, 'driver 1', '-', 11, '0000-0000-0000', 'Bebas'),
(5, 'driver2', '-', 12, '0000-0000-0000', 'Bebas'),
(11, 'driver3', '-', 13, '0000-0000-0000', 'Bebas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_trans`
--

CREATE TABLE `payment_trans` (
  `payment_id` varchar(11) NOT NULL,
  `payment_rental_id` varchar(11) NOT NULL,
  `payment_user_id` int(11) NOT NULL,
  `payment_proof` varchar(128) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `payment_bank_id` int(11) NOT NULL,
  `payment_total` varchar(20) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_trans`
--

INSERT INTO `payment_trans` (`payment_id`, `payment_rental_id`, `payment_user_id`, `payment_proof`, `payment_method`, `payment_bank_id`, `payment_total`, `payment_status`, `payment_date`) VALUES
('pay-002', 'rent-002', 22, '', 'ATM Transfer', 4, '1100000', 0, 1593369878),
('pay-003', 'rent-003', 7, 'bukti-pembayaran-pay-003-1593495422.png', 'ATM Transfer', 2, '400000', 0, 1593495422),
('pay-004', 'rent-004', 22, 'bukti-pembayaran-pay-004-1593509505.png', 'ATM Transfer', 3, '800000', 0, 1593509506),
('pay-005', 'rent-005', 7, 'bukti-pembayaran-pay-005-1593498213.jpg', 'ATM Transfer', 1, '1100000', 0, 1593498213),
('pay-006', 'rent-006', 21, '', 'ATM Transfer', 4, '3900000', 0, 1593481089),
('pay-007', 'rent-007', 7, '', 'ATM Transfer', 2, '900000', 0, 1593491294),
('pay-008', 'rent-008', 21, '', 'ATM Transfer', 4, '1420000', 0, 1593500193),
('pay-009', 'rent-009', 21, '', 'ATM Transfer', 2, '1050000', 0, 1593500287),
('pay-010', 'rent-010', 21, '', 'ATM Transfer', 2, '10000000', 0, 1593510013),
('pay-011', 'rent-011', 22, 'bukti-pembayaran-pay-011-1593542635.png', 'ATM Transfer', 2, '2200000', 0, 1593542635),
('pay-012', 'rent-012', 22, '', 'ATM Transfer', 1, '750000', 0, 1593574698),
('pay-013', 'rent-013', 23, '', 'ATM Transfer', 1, '2000000', 0, 1593602003);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rental_trans`
--

CREATE TABLE `rental_trans` (
  `rent_id` varchar(20) NOT NULL,
  `rent_car_id` int(11) NOT NULL,
  `rent_user_id` int(11) NOT NULL,
  `rent_client_id` varchar(20) NOT NULL,
  `rent_price` varchar(128) NOT NULL,
  `rent_fine` varchar(45) NOT NULL,
  `rent_type` int(11) NOT NULL,
  `rent_service` int(11) NOT NULL,
  `rent_driver_id` int(11) NOT NULL,
  `rent_date` datetime NOT NULL,
  `rent_date_start` date NOT NULL,
  `rent_date_end` date NOT NULL,
  `rent_return_status` varchar(40) NOT NULL,
  `rent_status` varchar(40) NOT NULL,
  `rent_pay_status` int(11) NOT NULL,
  `rent_city` varchar(40) NOT NULL,
  `rent_city_destin` varchar(50) NOT NULL,
  `rent_pickup_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rental_trans`
--

INSERT INTO `rental_trans` (`rent_id`, `rent_car_id`, `rent_user_id`, `rent_client_id`, `rent_price`, `rent_fine`, `rent_type`, `rent_service`, `rent_driver_id`, `rent_date`, `rent_date_start`, `rent_date_end`, `rent_return_status`, `rent_status`, `rent_pay_status`, `rent_city`, `rent_city_destin`, `rent_pickup_address`) VALUES
('rent-002', 3, 22, 'client-0003', '1100000', '-', 1, 3, 0, '2020-06-29 00:00:00', '2020-06-30', '2020-07-02', '-', 'belum selesai', 0, 'tanggerang', 'bogor, tanggerang', 'asdafafafafa'),
('rent-003', 1, 7, 'client-0004', '400000', '-', 1, 3, 0, '2020-06-29 00:00:00', '2020-06-30', '2020-07-01', '-', 'belum selesai', 0, 'bogor', 'jakarta, depok, tanggerang', 'Tes'),
('rent-004', 2, 22, 'client-0004', '800000', '-', 1, 1, 0, '2020-06-29 00:00:00', '2020-06-30', '2020-07-02', '-', 'belum selesai', 0, 'jakarta', 'depok', ''),
('rent-005', 9, 7, 'client-0004', '1100000', '-', 1, 3, 0, '2020-06-29 00:00:00', '2020-06-30', '2020-07-02', '-', 'belum selesai', 0, 'jakarta', 'depok, tanggerang', 'Jakarta Timur'),
('rent-006', 6, 21, 'client-0005', '3600000', '-', 1, 2, 0, '2020-06-30 00:00:00', '2020-07-01', '2020-07-04', '-', 'belum selesai', 0, 'bogor', 'bogor, tanggerang', 'Jakarta'),
('rent-007', 11, 7, 'client-0005', '900000', '-', 1, 2, 0, '2020-06-30 00:00:00', '2020-07-01', '2020-07-03', '-', 'belum selesai', 0, 'depok', 'tanggerang', 'asdadaagag'),
('rent-008', 12, 21, 'client-0005', '1420000', '-', 1, 1, 0, '2020-06-30 00:00:00', '2020-07-01', '2020-07-03', '-', 'belum selesai', 0, 'bogor', 'depok, tanggerang', ''),
('rent-009', 14, 21, 'client-0005', '750000', '-', 1, 3, 0, '2020-06-30 00:00:00', '2020-07-01', '2020-07-04', '-', 'belum selesai', 0, 'jakarta', 'bogor, depok', 'kkkkk'),
('rent-010', 10, 21, 'client-0005', '10000000', '-', 1, 1, 0, '2020-06-30 04:39:58', '2020-07-01', '2020-07-09', '-', 'belum selesai', 0, 'bogor', 'bogor, tanggerang', ''),
('rent-011', 3, 22, 'client-0005', '2200000', '-', 1, 2, 0, '2020-07-01 01:27:17', '2020-07-02', '2020-07-06', '-', 'belum selesai', 0, 'jakarta', 'bogor, depok', 'Haiii'),
('rent-012', 14, 22, 'client-0005', '750000', '-', 1, 1, 0, '2020-07-01 10:38:03', '2020-07-02', '2020-07-05', '-', 'belum selesai', 0, 'jakarta', 'jakarta, bogor', ''),
('rent-013', 2, 23, 'client-0005', '2000000', '-', 1, 1, 0, '2020-07-01 05:45:27', '2020-07-02', '2020-07-07', '-', 'belum selesai', 0, 'jakarta', 'bogor, tanggerang', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
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
(1, '!Special', 'akbar@gmail.com', '$2y$10$O2O2UT0ZmgB7kH1gGf0feed7Wzd8lgZX/L8FJTEG3BfFPR75o7kPy', 1, 'online', 1, 'ava-1592925379.jpg', 1586709933),
(7, 'Micky mouse', 'unit@gmail.com', '$2y$10$w1BLTRD7ulChWu.dHP7JcuWkEtQtLMGWW4F8p4xyyIU/o4epvHKxy', 3, 'online', 1, 'ava-1593375243.png', 1587143179),
(10, 'mr.simple', 'simpleadmin@gmail.com', '$2y$10$vE10Bq8Iv07GAMtXdMO/6uj2PQzSbh/Nt4GSAeJKOUbznnEughIVe', 4, 'online', 1, 'ava-1587887732.jpg ', 1587882883),
(11, 'driver 1', 'driver1@gmail.com', '$2y$10$MAvviaQiyRJNxoDYzSR73OPbhAI45Yr4XqdY6gnX69T8Op7VijUwy', 7, 'online', 1, 'default.png', 1588410171),
(12, 'driver2', 'driver2@gmail.com', '$2y$10$oWNJiHqVa/BU7C0BKeqV8.10Vy9ywKXpWDq8MrUwcCDXm3CrCK.fa', 7, 'online', 1, 'default.png', 1588431176),
(13, 'driver3', 'driver3@gmail.com', '$2y$10$Da76VsMrE55cScYlsRJV1eS0PLn/KFAUQaplbg6xnzuahx5ZOjSqC', 7, 'online', 1, 'default.png', 1588431200),
(18, 'Wili', 'register1@gmail.com', '$2y$10$32eQSIvPTLADmDNm1ZGDlO9XrYAz3XyOBMe1Yemx/Jm5SOTnb9gLS', 4, 'online', 1, 'ava-1592975571.png', 1590981586),
(19, 'register2', 'register2@gmail.com', '$2y$10$.9zsiAiFSj.a85s.jeRDTeHCnHbe04hAysm4qW.Av.Gw6XxlFFR2C', 3, 'online', 1, 'ava-1592925888.jpg', 1590981641),
(20, 'Giant', 'register3@gmail.com', '$2y$10$L.TxKCsv/O1oigXkJMHI1eTDjqT3t0at0rNprYqiJJ1dP/p2T.mgm', 3, 'online', 1, 'ava-1592924387.jpeg', 1590995687),
(21, 'ZeroTwo', 'zero.two@gmail.com', '$2y$10$38SSXBzK/e5H9dmUX1YYeOjtF2CIsPmZQizNoIiXL0MEPJpshdMHG', 3, 'online', 1, 'ava-1593481964.jpeg', 1591608060),
(22, 'Unit001', 'unit001@gmail.com', '$2y$10$12z8PhGnndytSH4wOXHVtuNbtSyvF0HI04WcuFg4tInMgwk5DRQwG', 3, 'online', 1, 'ava-1593062987.jpg', 1592971028),
(23, 'wahidin', 'wahidin@gmail.com', '$2y$10$YJ6XL5Exg7mtEcyizq7PAOB8CeOoOM6N.NAJ3Nrh23QLh2LZD4xXO', 3, 'online', 1, 'ava-1593602234.jpg', 1593592356);

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
(56, 1, 41);

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
(7, 'Driver'),
(15, 'customer');

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
(34, 6, 'General', 'general', 1, 'null', 1),
(35, 6, 'Admin', 'admin', 1, 'null', 1),
(37, 6, 'Drivers', 'drivers', 1, 'null', 1),
(39, 1, 'Dashboard', 'dash', 1, 'null', 1),
(40, 6, 'Costumer', 'customer', 1, 'null', 1),
(41, 12, 'Rental', 'rent', 1, 'null', 1);

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
-- Indeks untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`cos_id`);

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indeks untuk tabel `payment_trans`
--
ALTER TABLE `payment_trans`
  ADD PRIMARY KEY (`payment_id`);

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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `car_types`
--
ALTER TABLE `car_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `costumer`
--
ALTER TABLE `costumer`
  MODIFY `cos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
