-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2022 pada 13.57
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aranastudio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'programming'),
(2, 'desain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `user_id`, `judul`, `link`, `kategori`, `gambar`, `deskripsi`) VALUES
(1, 1, 'Disain.id', 'https://disain.id/', 'programming', '2729-projek1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et placerat tortor. Mauris laoreet, eros ac auctor pellentesque, augue urna faucibus felis, in ultricies arcu odio in est. In hac habitasse platea dictumst. Fusce hendrerit lorem sapien, in commodo nunc suscipit eu. Pellentesque rutrum efficitur tempor. Fusce nec leo eros. Nunc lorem risus, ultricies id consectetur eu, dapibus eu lectus. Mauris iaculis lacinia enim, ut euismod tellus mollis vel. Vestibulum sodales ante et fermentum congue.\r\n\r\nDuis varius odio vitae arcu volutpat, et tempor leo tempus. Aliquam sem arcu, elementum ac pellentesque sed, efficitur vel tortor. Vestibulum non lorem mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum et dui mollis, elementum velit ac, gravida arcu. Curabitur nibh quam, auctor ut velit eget, condimentum aliquet orci. Etiam efficitur, dolor sed lacinia accumsan, magna metus porta tellus, et lacinia velit purus at tortor. Aenean venenatis faucibus mauris, tincidunt tempor metus semper et. Proin arcu sem, iaculis sed aliquam ut, pellentesque eu libero.\r\n\r\nInteger pharetra pretium egestas. Aliquam erat volutpat. Etiam scelerisque finibus tortor et feugiat. Nunc convallis tincidunt orci, pulvinar sollicitudin nunc blandit et. Sed sollicitudin suscipit mi nec porta. Nunc et quam porta, auctor odio sed, malesuada nisi. Quisque non turpis in eros ornare auctor at sed sem. Cras non interdum ante, nec volutpat risus. Aenean accumsan ullamcorper odio, sed iaculis quam condimentum ut. Vestibulum laoreet vulputate ipsum. Suspendisse euismod egestas volutpat. Proin ultricies ipsum ac leo sodales, sit amet vehicula ex commodo. Maecenas porttitor metus turpis, ac suscipit libero sollicitudin sed.'),
(2, 1, 'proyek kedua 2', '#', 'desain', '2071-projek1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et placerat tortor. Mauris laoreet, eros ac auctor pellentesque, augue urna faucibus felis, in ultricies arcu odio in est. In hac habitasse platea dictumst. Fusce hendrerit lorem sapien, in commodo nunc suscipit eu. Pellentesque rutrum efficitur tempor. Fusce nec leo eros. Nunc lorem risus, ultricies id consectetur eu, dapibus eu lectus. Mauris iaculis lacinia enim, ut euismod tellus mollis vel. Vestibulum sodales ante et fermentum congue.\r\n\r\nDuis varius odio vitae arcu volutpat, et tempor leo tempus. Aliquam sem arcu, elementum ac pellentesque sed, efficitur vel tortor. Vestibulum non lorem mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum et dui mollis, elementum velit ac, gravida arcu. Curabitur nibh quam, auctor ut velit eget, condimentum aliquet orci. Etiam efficitur, dolor sed lacinia accumsan, magna metus porta tellus, et lacinia velit purus at tortor. Aenean venenatis faucibus mauris, tincidunt tempor metus semper et. Proin arcu sem, iaculis sed aliquam ut, pellentesque eu libero.\r\n\r\nInteger pharetra pretium egestas. Aliquam erat volutpat. Etiam scelerisque finibus tortor et feugiat. Nunc convallis tincidunt orci, pulvinar sollicitudin nunc blandit et. Sed sollicitudin suscipit mi nec porta. Nunc et quam porta, auctor odio sed, malesuada nisi. Quisque non turpis in eros ornare auctor at sed sem. Cras non interdum ante, nec volutpat risus. Aenean accumsan ullamcorper odio, sed iaculis quam condimentum ut. Vestibulum laoreet vulputate ipsum. Suspendisse euismod egestas volutpat. Proin ultricies ipsum ac leo sodales, sit amet vehicula ex commodo. Maecenas porttitor metus turpis, ac suscipit libero sollicitudin sed.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` bigint(13) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `telp`, `username`, `password`) VALUES
(1, 'Rifaldy Elninoru', 'rifaldielninoru2@gmail.com', 89539274122, 'rifaldi11', '$2y$10$iPMI3UfABiG7kE7LlUGha.vzbn1ql6gw7i2GB1mkBZOpjn1xPi5DG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
