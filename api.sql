-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 09:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_number` varchar(10) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_balance` decimal(10,2) NOT NULL,
  `account_type` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_number`, `account_name`, `account_balance`, `account_type`) VALUES
(1, '0123456789', 'Adedayo', '300.00', 'savings'),
(4, '1133456716', 'JJJJ', '199300.00', 'current'),
(7, '0112345672', 'Adedaoyin Adedayo Joshua', '19900.00', 'Savings'),
(9, '4112327672', 'Johnson James', '350000.00', 'Current'),
(10, '4012327672', 'Samson Jonathan', '15100.00', 'Savings');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `senders_acc_num` varchar(50) NOT NULL,
  `senders_acc_name` varchar(100) NOT NULL,
  `receivers_acc_num` varchar(50) NOT NULL,
  `receivers_acc_name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `senders_acc_num`, `senders_acc_name`, `receivers_acc_num`, `receivers_acc_name`, `amount`, `created_at`) VALUES
(5, '1133456716', 'JJJJ', '0123456789', 'Adedayo', '100.00', '2023-06-23 07:31:35'),
(6, '1133456716', 'JJJJ', '0123456789', 'Adedayo', '100.00', '2023-06-23 07:34:35'),
(7, '1133456716', 'JJJJ', '0123456789', 'Adedayo', '100.00', '2023-06-23 07:36:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
