-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 03:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spanchill`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `image`, `created_at`) VALUES
(23, 3228, 'Second Post', 'asdasd', '5e44ba6cb46160.12393369.jpg', '2020-02-13 02:21:38'),
(24, 3228, 'Test Post', 'this is test post', 'noimage.jpg', '2020-02-13 03:36:42'),
(31, 3232, 'Review', 'We are a family of six. After our long day at Batam (4 played golf while 2 were shopping), we went to WellAsih Spa in early evening.\r\n\r\nA driver came to pick us from the resort. Massages were good. We had Hot Stones and Indonesian massages.\r\n\r\nAfter a qui', 'noimage.jpg', '2020-02-13 04:07:51'),
(32, 3232, 'my review', 'We are a family of six. After our long day at Batam (4 played golf while 2 were shopping), we went to WellAsih Spa in early evening.\r\n\r\nA driver came to pick us from the resort. Massages were good. We had Hot Stones and Indonesian massages.\r\n\r\nAfter a quick local meal next door, WellAsih Spa arranged our return drive back.\r\n\r\nWell done and thank you.', 'noimage.jpg', '2020-02-13 04:10:17'),
(33, 3235, 'Kappau', 'ugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyuugsughglhlifgirsgj;irhzexdgbhjesdrhusxedgyior8cvbnjbnt86butyb gbnyghd5 f7gynyu', 'noimage.jpg', '2020-02-13 08:46:36'),
(34, 1, 'qwe', 'After read review then we shortlisted some massage place, due to city area massage is full house today so i tried to call this place and got slot for us so we went to this place and try it out. They provide pick up from batam centre and nongsa area. The massage is better than some massage place we went previously in batam. But after massage, they don\'t offer us shower. Overall it\'s a nice experience. Will come back next time.', 'noimage.jpg', '2020-02-13 13:35:52'),
(38, 3233, 'MY BEST EXp', 'After read review then we shortlisted some massage place, due to city area massage is full house today so i tried to call this place and got slot for us so we went to this place and try it out. They provide pick up from batam centre and nongsa area. The massage is better than some massage place we went previously in batam. But after massage, they don\'t offer us shower. Overall it\'s a nice experience. Will come back next time.', 'noimage.jpg', '2020-02-13 14:25:47'),
(40, 3238, 'Great Service', 'well train therapist and good service they even provide transfer two way from you pick up point and its convenience for us no need to think about the transfer anymore.', '5e455d7c21d7d8.08957956.jpg', '2020-02-13 14:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `firstName` varchar(191) NOT NULL,
  `lastName` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `created_at`) VALUES
(3202, 'bgemry', '4297f44b13955235245b2497399d7a93', 'gem', 'bulante', '2020-02-12 14:53:09'),
(3225, 'bgemry2', 'a8f5f167f44f4964e6c998dee827110c', 'fsdfds', 'asasd', '2020-02-12 17:22:49'),
(3226, 'kaneki123', '4297f44b13955235245b2497399d7a93', 'kaneki', 'ken', '2020-02-12 17:33:24'),
(3227, 'tubig123', '4297f44b13955235245b2497399d7a93', '123123', '12123', '2020-02-12 17:34:56'),
(3228, 'malong', '4297f44b13955235245b2497399d7a93', 'ma', 'long', '2020-02-12 17:42:29'),
(3229, 'mrChloe04', '005cc06bbaf1d8675db8d08a54bf2858', 'Chloe', 'Moretz', '2020-02-13 03:46:20'),
(3230, 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', '2020-02-13 03:46:29'),
(3231, 'mrChloe05', '005cc06bbaf1d8675db8d08a54bf2858', 'chloe', 'moretz', '2020-02-13 03:47:06'),
(3232, 'AlingRosa23', '005cc06bbaf1d8675db8d08a54bf2858', 'aling', 'rosa', '2020-02-13 03:50:09'),
(3233, 'hasss', '4297f44b13955235245b2497399d7a93', 'hasss', 'hasss', '2020-02-13 04:11:51'),
(3234, 'test12312', '7815696ecbf1c96e6894b779456d330e', 'gemry', 'gemry', '2020-02-13 08:42:44'),
(3235, 'barbie123', '202cb962ac59075b964b07152d234b70', 'asd', 'asd', '2020-02-13 08:43:56'),
(3236, 'CardoDalisay20', 'eac9ac0acb2797c4860d9130b5f18d08', 'Cardo', 'Dalisay', '2020-02-13 13:23:44'),
(3237, 'CardoDalisay21', 'd53d950f67531506e96d40bf13f3052a', 'cardo', 'dalisay', '2020-02-13 13:24:20'),
(3238, 'frederik23', '5a937bf334042317cb9b87cabdf2034d', 'fred', 'ceb', '2020-02-13 14:28:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
