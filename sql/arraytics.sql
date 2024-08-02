-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 07:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arraytics`
--

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) DEFAULT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) DEFAULT NULL,
  `entry_at` date DEFAULT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(1, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', 'd0ce994787800ca25f6065ef3d4bc470e8995f611277b3fe4c38137a63dc898599b6d36ab3a116c9690db2f8740f9e5428994eabf5476304916ceda51b8f21ee', '2024-08-01', 2),
(2, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', '9b2514ac49a85ba05b7500001494ce55be01bd0f5c2059faa97c7958cf1cfaa78056fdb66c65d2968ae3eb186021370196f012e8a6154ec39a463c117fb2567c', '2024-08-01', 2),
(3, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', 'e723f8e8ad4775916121cf2f4ef0c1dca69afa76b88a34944d81276fda33f741b67298ce67d241568c3294dc3380c1b6181c0a2325fef5ff73aa512a3a22258f', '2024-08-01', 3),
(4, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', '1471521437c5461de676386c5e8c08d32d62e3d90bbebc01ca455e7ec3f07759c91f65cc849ee80eea8891074058dbdd1934a66e6d3079d84fbbb260af65f2bb', '2024-08-01', 1),
(5, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', 'a516214df085044a74cb43b1b2a02bc0f4331efc27bef37e7e780cb5c22ea5b9f1cce76aed38273b7ceaf81de52ad0de66838957af388675bcf1b9ffd173d2c5', '2024-08-01', 5),
(6, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', '64df8d2d67e620c321bf67101e459038f8c4c1f82ffff431ee21158761ea3380aa173e6f759072fce9b1563c9f28e9c922ae1c45ccddb9d7e138ac26470001f9', '2024-08-01', 5),
(7, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', 'a36239ca69433b42f8ba043a67bca55459994aaeb4483f93a17b6bc5ee65c2ddbd02fe8eb83941cd62fa2bde81356331412cc1a680a8b5fbb9906f1f66ed20ab', '2024-08-01', 5),
(8, 50, 'test', 'test', 'test', 'jahid@gmail.com', '::1', 'test', 'test', 'test', '3f88ab252fd83a7f9e85fd0905635c236dcf3b4d931874bd57453bd79129930f387a9d87031094d8d0533911754f35a8a6aef1ccdccfc799948ea727a532d4f2', '2024-08-01', 5),
(9, 50, 'fgjh', 'fgh', 'fgh', 'jahid@gmail.com', '::1', 'asjkdg', 'asldkh', '880154646', 'eb8db30d687826c69e587cdc2d260a3a7bf59507debb694ecf3d2b25c49894fce1eddb63b6cd7e65660bc54553262f7b16286722b5a18151a270728c6b138ea9', '2024-08-01', 1),
(10, 50, 'fgjh', 'fgh', 'fgh', 'jahid@gmail.com', '::1', 'asjkdg', 'asldkh', '880154646', '500681706f211ea654f7c07444413f84c983a7d4d7ab9d01d61bbaad48205bcc58b1adb7aa8ae974937f9869079d74fbe3c03289f251e5f28ac5266187fdef69', '2024-08-01', 1),
(11, 50, 'ghj', 'sdf', 'sdf', 'jahid@gmail.com', '::1', 'kasgd', 'lakhsd', '8800214454', '0072aa9a0e6a7573a7a8ee59a9f26480f1b8399a5b28c41829ed37dbf8dc6fdabee0c2364e3a90f1a3faa0bca2d57391093733ba7adbfa38bc13b1134b3d14c8', '2024-08-01', 1),
(12, 5600, 'jahid', 'jd', 'apple, orange', 'ajhid@gmail.com', '::1', 'jahduady aosiufdyauoifya aosiu fyoasdufy aaouisyf aosufy asofy aosuify', 'Nabinagar', '88001627809808', 'ae9001dfce3a936644f2e5a1dcd3eb4c539dfb9048fefcb4a58d9ac93932a81c36d7560a42c81cfe287a4c1618de73a815d45f85c31b9f559e4817eb20e01b41', '2024-08-02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
