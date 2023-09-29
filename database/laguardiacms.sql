-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 10:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laguardiacms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `cn` char(11) NOT NULL,
  `addrss` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `cn`, `addrss`, `email`, `uname`, `password`) VALUES
(5, 'Spongebob Squarepants', '09516895890', 'Bikini Bottom', 'sponge@gmail.com', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `addrss` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cn` char(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `fname`, `addrss`, `email`, `cn`, `date`, `time`, `remarks`, `status`) VALUES
(1, 'frederick villa', 'Diaz', 'frederickvilla001@gmail.com', '09516895890', '2023-06-30', '11:22:00', 'masakit ang aking panga', 1),
(6, '', '', '', '', '2023-06-24', '16:31:00', 'headache', 0),
(7, '', '', '', '', '2023-06-24', '16:41:00', 'dqwdqwdqwd', 0),
(8, 'frederick villa', 'Bikini Bottom', 'frederickvilla001@gmail.com', '09516895890', '2023-05-29', '12:35:00', 'jhjhhbhgf', 0),
(9, '', '', '', '', '2023-06-30', '23:38:00', 'dwqdqwd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `cn` char(11) NOT NULL,
  `addrss` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `fname`, `cn`, `addrss`, `uname`, `email`, `password`) VALUES
(4, 'frederick villa', '09516895890', 'Diaz', 'erick', 'frederickvilla001@gmail.com', 'cool1'),
(6, 'Spongebob Squarepants', '09516895890', 'Diaz', 'erick', 'sponge@gmail.com', 'cool1'),
(9, 'Rhenalyn Junio', '09307980400', 'Korea', 'Rheyna', 'rhenalynjunio0830@gmail.com', 'Love_022521');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `si` varchar(155) NOT NULL,
  `disc` varchar(155) NOT NULL,
  `price` char(50) NOT NULL,
  `ps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `si`, `disc`, `price`, `ps`) VALUES
(3, 'martilyo', 'laki ulo', '201', '2023-06-24 15:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `mn` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `mt` varchar(255) NOT NULL,
  `price` char(155) NOT NULL,
  `stock` char(155) NOT NULL,
  `ed` date NOT NULL DEFAULT current_timestamp(),
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `mn`, `disc`, `mt`, `price`, `stock`, `ed`, `posting_date`) VALUES
(15, 'alacsan', 'fr', 'Tablet', '10', '111', '2023-06-24', '2023-06-24 13:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fname` varchar(155) NOT NULL,
  `age` char(155) NOT NULL,
  `cn` char(11) NOT NULL,
  `gender` varchar(155) NOT NULL,
  `cs` varchar(155) NOT NULL,
  `addrss` varchar(155) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remark` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fname`, `age`, `cn`, `gender`, `cs`, `addrss`, `uname`, `email`, `password`, `date`, `time`, `remark`, `status`) VALUES
(4, 'frederick villa', '21', '09516895890', 'Male', 'Single', ' Diaz, Bautista, Pangasinan', 'patient', 'frederickvilla001@gmail.com', 'patient123', '0000-00-00', '00:00:00', '', 0),
(5, '', '', '', '', '', '', '', '', '', '2023-06-28', '14:09:00', 'headache', 0),
(6, '', '', '', '', '', '', '', '', '', '2023-06-30', '15:16:00', 'polyo', 0),
(7, 'Rhenalyn Junio', '20', '09516895890', 'Female', 'Single', ' Korea', 'Kikay', 'rhenalynjunio0830@gmail.com', 'Love_022521', '0000-00-00', '00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `cn` char(11) NOT NULL,
  `addrss` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `cn`, `addrss`, `uname`, `email`, `password`) VALUES
(5, 'Alyssa Dela Cruz', '09516895890', 'Vacante, Bautista, Pangasinan', 'staff', 'alyssa@gmail,com', 'staff123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
