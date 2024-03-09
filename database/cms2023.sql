-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2024 at 05:09 PM
-- Server version: 5.7.44-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdrtechn_db_cms_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`, `token`) VALUES
(2, 'admin', '327488e331b8b64e5794da3fa4eb10ad5d32', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `rating` int(5) NOT NULL COMMENT '1=Sangat Baik\r\n2=Baik\r\n3=Kurang Baik\r\n4=Sangat Buruk\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `rating`) VALUES
(1, 3),
(2, 3),
(3, 1),
(4, 2),
(5, 4),
(6, 2),
(7, 4),
(8, 4),
(9, 1),
(10, 1),
(11, 3),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id_footer` int(11) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id_footer`, `footer`) VALUES
(1, 'Copyright@2024 | PDR Technology');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `foto`) VALUES
(1, '2kpzyb5ry3auex3lswd7u7vk5-5tu4vxd6bhgj7q1k015zrii5n.png');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id_map` int(11) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id_map`, `location`) VALUES
(1, 'SMPN 11 JAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id_navbar` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id_navbar`, `title`, `link`) VALUES
(16, 'Profile', 'profile'),
(17, 'About', 'about'),
(18, 'Contact', 'contact'),
(19, 'Social Media', 'social-media'),
(20, 'Visi-Misi', 'visi-misi');

-- --------------------------------------------------------

--
-- Table structure for table `navbar_child`
--

CREATE TABLE `navbar_child` (
  `id_navbar_child` int(11) NOT NULL,
  `id_navbar` int(11) NOT NULL,
  `title_child` varchar(255) NOT NULL,
  `link_child` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navbar_child`
--

INSERT INTO `navbar_child` (`id_navbar_child`, `id_navbar`, `title_child`, `link_child`) VALUES
(3, 13, 'Visi Misi', 'visi-misi'),
(4, 13, 'Mantap', 'ready'),
(8, 14, 'Visi Misi', 'visi-misi');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `name`, `slug`, `description`, `date_created`, `time_created`) VALUES
(10, 'Profile', 'profile', '-', '2022-09-05', '12:54:00'),
(13, 'Contact', 'contact', '<p>Contact</p>\n', '2022-10-06', '12:20:00'),
(14, 'About', 'about', '<p>Labore irure adipisicing nostrud id non occaecat ad. Minim ex ex enim commodo aliqua cupidatat cupidatat Lorem exercitation deserunt consequat incididunt sunt. Pariatur enim ullamco nisi non non dolor aliqua. Dolore incididunt quis voluptate ut fugiat ', '2022-10-06', '12:20:00'),
(15, 'Social Media', 'social-media', '<p>Facebook</p>\n', '2023-08-25', '19:35:00'),
(16, 'Visi-Misi', 'visi-misi', '<p>Labore irure adipisicing nostrud id non occaecat ad. Minim ex ex enim commodo aliqua cupidatat cupidatat Lorem exercitation deserunt consequat incididunt sunt. Pariatur enim ullamco nisi non non dolor aliqua. Dolore incididunt quis voluptate ut fugiat ', '2024-02-21', '19:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id_partner` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id_partner`, `title`, `image`, `link`) VALUES
(9, 'Kominfo', 'g68qk92lbncjuiu73ghg41230-xjbpmykq9xp29ppbukuma4x87.png', 'https://www.kominfo.go.id/');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `title`, `description`, `cover`, `date_created`, `time_created`) VALUES
(10, 'Lorem Ipsum Dot Semir', '<p>Duis dolor quis mollit quis non ipsum enim ut deserunt. Laboris anim enim laborum quis laborum. Deserunt officia esse culpa velit nisi magna enim adipisicing dolor deserunt magna quis cillum.</p>\n', '02k0gaqqmc6laugtexsofgks4-wag8cz3otfrofmmdezfxg1qdr.jpg', '2022-10-06', '12:16:00'),
(11, 'Lorem Ipsum Belanda', '<p>Nisi nostrud id anim sit dolore esse incididunt qui cillum dolore aute occaecat non reprehenderit.</p>\n', 'hxo5etwfjsv0307xrsswwjcyy-ovtgvja0fimo6wpsappxng4vd.jpg', '2022-10-06', '12:40:00'),
(12, 'Lorem Ipsum Dot Semir', '<p>Lorem ipsum dot semir bla bla</p>\n', '9ahme30rxxxw9hrakl11tvg87-dzdqcaq5120jt809wtw1bpd7o.jpg', '2022-10-06', '13:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id_school` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id_school`, `nama`, `alamat`, `hp`, `foto`) VALUES
(1, 'SMP N 11', 'Jakarta Pusat', '0812123123', 'v4dkq4vhrx7cluj01hw0im7ca-nij6yj0y9u7xi762wc7cmibse.png');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE `slideshows` (
  `id_slideshow` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id_slideshow`, `image`, `title`, `description`, `date_created`) VALUES
(5, 'ojju7dxy735owqs624w56kpmv-n55uejvrtxdpdys34sxaddvc4.png', 'Profile', 'Enim eiusmod laborum commodo culpa culpa incididunt minim reprehenderit excepteur in laborum dolor consequat velit. Est mollit amet nulla do. Ullamco tempor commodo cillum fugiat labore eiusmod commodo et deserunt ut et. Esse anim eiusmod veniam et deseru', '2022-09-05'),
(6, 'n4sd4gq7ohd939l60ayboop5u-pvzz12dzs36622051iz9sh3n2.jpg', 'Home', 'Enim eiusmod laborum commodo culpa culpa incididunt minim reprehenderit excepteur in laborum dolor consequat velit. Est mollit amet nulla do. Ullamco tempor commodo cillum fugiat labore eiusmod commodo et deserunt ut et. Esse anim eiusmod veniam et deseru', '2022-10-06'),
(7, '2hotdn5ygcqq6101lqoj1jdtt-taa6e4unmqws31iqil4kx8z1v.jpg', 'SMP 11 N Jakarta', 'Lorem Ipsum', '2023-08-25'),
(8, '4ugt5etb8a0uwvlxhuebc2abg-8qbkw57ew2vtrypknyk7dvzqo.jpg', 'Lorem Ipsum', 'Labore irure adipisicing nostrud id non occaecat ad. Minim ex ex enim commodo aliqua cupidatat cupidatat Lorem exercitation deserunt consequat incididunt sunt. Pariatur enim ullamco nisi non non dolor aliqua. Dolore incididunt quis voluptate ut fugiat ani', '2024-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id_social_media` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id_social_media`, `facebook`, `instagram`, `twitter`, `youtube`) VALUES
(1, 'https://web.facebook.com/abcdef/', 'https://www.instagram.com/abcdef/', 'https://twitter.com/abcdef/', 'https://youtube.com/abcdef/');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `name`, `ket`, `foto`) VALUES
(2, 'Pak Santoso', 'Guru IPA', 'sc5zdhcvintyb20v7grlkufz2-cpisesl1rdwwamqaqlkfbvibs.jpg'),
(3, 'Pak Budiman', 'Guru IPS', 'giqmlj68t68icn1znqd542azz-pvm0gwnry9os3hehc56rpcuix.jpg'),
(4, 'Pak Apriyanto', 'Guru Matematika', 'cnsx9mxe8htv0vjucb4qlzfqk-dgogfzslgrkrkmzy7l2x0rgpm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id_footer`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id_map`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id_navbar`);

--
-- Indexes for table `navbar_child`
--
ALTER TABLE `navbar_child`
  ADD PRIMARY KEY (`id_navbar_child`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id_school`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id_social_media`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id_navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `navbar_child`
--
ALTER TABLE `navbar_child`
  MODIFY `id_navbar_child` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id_school` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id_social_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
