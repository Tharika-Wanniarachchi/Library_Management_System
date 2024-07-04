-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 09:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` varchar(5) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `category_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `category_id`) VALUES
('B001', 'Harry Potter 1', 'C001'),
('B002', 'Amma', 'C002');

-- --------------------------------------------------------

--
-- Table structure for table `bookborrower`
--

CREATE TABLE `bookborrower` (
  `borrow_id` varchar(5) NOT NULL,
  `book_id` varchar(5) NOT NULL,
  `member_id` varchar(5) NOT NULL,
  `borrow_status` varchar(100) NOT NULL,
  `borrower_date_modified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookborrower`
--

INSERT INTO `bookborrower` (`borrow_id`, `book_id`, `member_id`, `borrow_status`, `borrower_date_modified`) VALUES
('BR001', 'B001', 'M001', 'borrowed', '2014-08-10 11:14:54am'),
('BR002', 'B002', 'M002', 'borrowed', '2024-07-04T21:29');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `category_id` varchar(5) NOT NULL,
  `category_Name` varchar(100) NOT NULL,
  `date_modified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`category_id`, `category_Name`, `date_modified`) VALUES
('C001', 'Sci-fi', '2014-08-12 11:14:54am'),
('C002', 'Adventure', '2014-08-13 11:14:54am');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fine_id` varchar(5) NOT NULL,
  `book_id` varchar(5) NOT NULL,
  `member_id` varchar(5) NOT NULL,
  `fine_amount` varchar(100) NOT NULL,
  `fine_date_modified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`fine_id`, `book_id`, `member_id`, `fine_amount`, `fine_date_modified`) VALUES
('F001', 'B001', 'M001', '200', '2014-08-18 11:14:54am'),
('F002', 'B002', 'M002', '300', '2024-07-04T21:30');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(5) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `birthday`, `email`) VALUES
('M001', 'Shan', 'Jayasekar', '12/02/2000', 'shan@gmail.com'),
('M002', 'Nimali', 'Jayashika', '2002-06-10', 'nimali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `first_name`, `last_name`, `username`, `password`) VALUES
('U001', 'kamal@gmail.com', 'Kamal', 'Perera', 'k_perera', 'admin123'),
('U002', 'tharikawanniarachchi0@gmail.com', 'Tharika', 'Lakshani', 't_lakshani', '$2y$10$W5wSUzSYGj5fpGMq3TptPenGl9yeWMjl2Xc1EieP76ejWIWY31L2q'),
('U003', 'shanu@gmail.com', 'shanu', 'lakshani', 's_lakshani', '$2y$10$PCp8EcUeYccTTCCJ.IiNrOJ31KEOd.QjDSC1S4zGvvXNF6gyenJdm'),
('U004', 'admin@gmail.com', 'admin', 'tharika', 'admin', '$2y$10$/lzloiaWEHxIQK0cn/oSoOR0N08UYJ/yO3mNGVUirBNe/s8DFcmz.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_cat_id` (`category_id`);

--
-- Indexes for table `bookborrower`
--
ALTER TABLE `bookborrower`
  ADD PRIMARY KEY (`borrow_id`,`book_id`,`member_id`),
  ADD KEY `fk_book_id` (`book_id`),
  ADD KEY `fk_member_id` (`member_id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fine_id`),
  ADD KEY `fk_book_id_fine` (`book_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`category_id`) REFERENCES `bookcategory` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookborrower`
--
ALTER TABLE `bookborrower`
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON UPDATE CASCADE;

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fk_book_id_fine` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
