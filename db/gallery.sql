-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 12, 2025 at 11:37 AM
-- Server version: 12.0.2-MariaDB-ubu2404
-- PHP Version: 8.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `northstage`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `img_id` int(11) NOT NULL,
  `img_src` text NOT NULL,
  `img_alt` text NOT NULL,
  `img_inc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`img_id`, `img_src`, `img_alt`, `img_inc`) VALUES
(1, 'https://images.pexels.com/photos/346529/pexels-photo-346529.jpeg?_gl=1*1aavnhf*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2Nzk1NDgkbzEkZzEkdDE3NjI2Nzk1NTIkajU2JGwwJGgw', 'Blue Mountains', 1),
(2, 'https://images.pexels.com/photos/34155611/pexels-photo-34155611.jpeg?_gl=1*swq3pr*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2ODI2MDIkbzIkZzEkdDE3NjI2ODI2MDMkajU5JGwwJGgw', 'Lake Sunset', 1),
(3, 'https://images.pexels.com/photos/2166711/pexels-photo-2166711.jpeg?_gl=1*hnej8i*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2ODI2MDIkbzIkZzEkdDE3NjI2ODI2NzIkajUwJGwwJGgw', 'Misty Lake', 1),
(4, 'https://images.pexels.com/photos/206359/pexels-photo-206359.jpeg?_gl=1*117qa85*_ga*NjczMjg4Njc4LjE3NjI2Nzk1NDg.*_ga_8JE65Q40S6*czE3NjI2ODI2MDIkbzIkZzEkdDE3NjI2ODI2NTAkajEyJGwwJGgw', 'Red Sunset over Water', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
