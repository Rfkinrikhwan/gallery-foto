-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 01:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galleryfoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `AlbumID` int NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`) VALUES
(9, 'Lycoris Recoil', 'Images lycoris recoil\r\n', '2024-04-22', 1),
(10, 'High Card', 'for save images anime high card', '2024-04-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `FotoID` int NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int NOT NULL,
  `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES
(23, 'Chisato 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/2.png', 9, 1),
(24, 'Chisato 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/3.png', 9, 1),
(25, 'Chisato 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/4.png', 9, 1),
(26, 'Takina Inoue', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/5.png', 9, 1),
(27, 'Chisato & Takina', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/6.png', 9, 1),
(28, 'Kurumi ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/7.png', 9, 1),
(29, 'Kurumi 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/8.png', 9, 1),
(30, 'Chisato', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/1.png', 9, 1),
(32, 'Rfkinrikhwan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/kikiw.jpg', 10, 1),
(33, 'Rio Rapansyah', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eveniet amet adipisci autem minima, temporibus placeat? Deserunt, porro possimus non saepe modi ratione minus nihil impedit ipsa quae. Aperiam optio adipisci eveniet amet. Nam, praesentium? Dolores hic sit voluptatem vitae cumque exercitationem sunt sapiente. Nisi, nam! Minima laboriosam totam ipsa aspernatur labore praesentium quia, exercitationem velit ad optio expedita aperiam quibusdam dolores error quam atque, commodi corporis, asperiores maiores est quo doloremque vel. Fugiat hic, repudiandae maxime rem optio iure culpa doloremque repellendus consectetur dolor aliquid. Fugit repellendus, expedita adipisci cupiditate saepe rerum quisquam. Iure ea laboriosam sit praesentium! Laudantium esse exercitationem excepturi reprehenderit facilis! Molestiae, dolorum. Soluta expedita pariatur aliquam voluptatibus minima quibusdam tempore sed deleniti voluptatem natus, ipsa officiis iusto illo corporis doloribus non quisquam eius, totam porro odio. Pariatur, quia. Asperiores laudantium laboriosam et dolor numquam quidem minima. Natus molestiae optio id iste laborum suscipit dolore ex, incidunt iure repellat dolor eaque rem provident porro adipisci alias ipsam fugiat tempore assumenda voluptate itaque. Iusto error expedita, odio et id ad, quia saepe, ut vero aliquam magnam. Eius reiciendis cum eligendi, neque accusantium ad facilis fuga blanditiis! Dignissimos est earum, facere porro mollitia corporis hic possimus et consequatur!', '2024-04-22', 'uploads/rio.jpg', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int NOT NULL,
  `FotoID` int NOT NULL,
  `UserID` int NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int NOT NULL,
  `FotoID` int NOT NULL,
  `UserID` int NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'rifki', '2a5c4c5a5ba1c332279685ddec507cd9', 'rifki@gmail.com', 'Rifki Nur Ikhwan', 'Jl. Kangkung Perumahan Alum Permai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AlbumID_2` (`AlbumID`,`UserID`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FotoID` (`FotoID`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `UserID_2` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`AlbumID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`),
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`),
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
