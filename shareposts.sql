-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 06:36 AM
-- Server version: 10.1.36-MariaDB
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
-- Database: `shareposts`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(2, 2, 'Post Two', 'My Second Post', '2019-03-11 01:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(2, 'Ryan Michael', 'ryan_michael@yahoo.com', '$2y$10$F9GPJOJFHouy90e2OkdA9eWbHEWts4eico8XKy4kw22LZD73W9cY.', '2019-03-09 18:21:01'),
(3, 'Michael Ryan', 'Michael_Ryan@yahoo.com', '$2y$10$JhBHhzLcdG6hsdYr6Qj8cudYfohsZxaZy8hLcoCpPFNfD2ewAT4DG', '2019-03-09 18:27:12'),
(4, 'Rye', 'ManticoreRye@yahoo.com', '$2y$10$a1nFNoBqUGzjengRwusVMen2fu5WwGuBzClBpUNEBQBNPjIVL9xZy', '2019-03-09 19:24:27'),
(5, 'Mike', 'mike@yahoo.com', '$2y$10$zIj2QUZVq9m7YAFhFsjKUumX.xdg2rE3HMUXN5qXN.bUc4TdIpDZG', '2019-03-09 19:26:08'),
(6, 'Wews', 'wews@yahoo.com', '$2y$10$dvwvlnBFAC9RbZdaSW0jHuXdZo2hldO4jHxNWwPXAk6RiSyuMXoom', '2019-03-09 19:30:51'),
(7, 'wews', 'wews2@yahoo.com', '$2y$10$yX2QeJ9sXqtdys.rhixh/..qwcgMIhdYlhWMkW8KNTdg6tKWLoZiq', '2019-03-09 19:31:13'),
(8, 'Rye Mike', 'ryemike@gmail.com', '$2y$10$a6FJvqHgbQk8qgi7BHi8eOA6m8BxDsC1Vf.1BocAtlvdLqW9h6zN2', '2019-10-14 12:34:36');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
