-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 27, 2021 at 06:45 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mon_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `article_excerpt` varchar(1000) NOT NULL,
  `article_content` varchar(5000) NOT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`article_id`, `article_title`, `article_excerpt`, `article_content`, `date_creation`, `date_modification`, `category_id`, `user_id`) VALUES
(37, 'MVC : Créer des sites web PHP performants et organisés !', '<p><span style=\"box-sizing: border-box; font-size: 16px; font-family: Quicksand, sans-serif; background-color: #ffffff; color: #626262;\">Cours de Bryan P. en Fran&ccedil;ais pour c</span><span style=\"box-sizing: border-box; font-size: 16px; font-family: Quicksand, sans-serif; background-color: #ffffff; color: #626262;\">r&eacute;er et comprendre la structure Model View Controller en PHP</span></p>', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-size: 16px; color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Cours de Bryan P. en Fran&ccedil;ais pour c</span><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">r&eacute;er et comprendre la structure Model View Controller en PHP</span></p>\r\n<ul style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; font-size: 1rem;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Cr&eacute;er &amp; comprendre la structure MVC</span></li>\r\n<li style=\"box-sizing: border-box; font-size: 1rem;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Utiliser l\'outil SASS</span></li>\r\n<li style=\"box-sizing: border-box; font-size: 1rem;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Utiliser des classes PHP</span></li>\r\n<li style=\"box-sizing: border-box; font-size: 1rem;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Construire un syst&egrave;me multi-langages performant</span></li>\r\n<li style=\"box-sizing: border-box; font-size: 1rem;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Cr&eacute;er un blog avec la structure MVC</span></li>\r\n<li style=\"box-sizing: border-box; font-size: 1rem;\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Simplifier les requ&ecirc;tes SQL</span></li>\r\n</ul>\r\n<p><a href=\"https://www.udemy.com/course/stucture-mvc-php/\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-size: 1rem; color: #626262;\">Voir le cours</span></a></p>', '2021-10-26 18:19:16', '2021-10-26 20:19:16', 1, 3),
(38, 'Construisez un site web à l’aide du framework Symfony 5', '<p><span style=\"color: #626262; font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">Ce cours vous permettra de prendre en main Symfony, le framework PHP de r&eacute;f&eacute;rence.</span></p>', '<p><span style=\"color: #626262; font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">En&nbsp;r&eacute;alisant&nbsp;</span><span style=\"box-sizing: border-box; font-size: 16px; color: #626262; font-family: Quicksand, sans-serif; background-color: #ffffff; font-weight: bold;\">un site web complet</span><span style=\"color: #626262; font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">, vous apprendrez &agrave; int&eacute;grer des vues avec le moteur de gabarits&nbsp;</span><span style=\"box-sizing: border-box; font-size: 16px; color: #626262; font-family: Quicksand, sans-serif; background-color: #ffffff; font-weight: bold;\">Twig</span><span style=\"color: #626262; font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">, &agrave; manipuler une base de donn&eacute;es &agrave; l\'aide de l\'</span><span style=\"box-sizing: border-box; font-size: 16px; color: #626262; font-family: Quicksand, sans-serif; background-color: #ffffff; font-weight: bold;\">ORM Doctrine</span><span style=\"color: #626262; font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;et &agrave; interagir avec vos utilisateurs &agrave; l\'aide de&nbsp;</span><span style=\"box-sizing: border-box; font-size: 16px; color: #626262; font-family: Quicksand, sans-serif; background-color: #ffffff; font-weight: bold;\">formulaires parfaitement int&eacute;gr&eacute;s et valid&eacute;s.</span></p>\r\n<p><a href=\"https://openclassrooms.com/fr/courses/5489656-construisez-un-site-web-a-l-aide-du-framework-symfony-5\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-size: 16px; color: #626262; font-family: Quicksand, sans-serif; background-color: #ffffff; font-weight: bold;\">Voir le cours</span></a></p>', '2021-10-26 18:20:54', '2021-10-26 20:20:54', 3, 3),
(39, 'A Complete Guide to Flexbox', '<p><span style=\"color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">Ce guide explique tout ce qui concerne flexbox, en se concentrant sur les diff&eacute;rentes propri&eacute;t&eacute;s possibles pour l\'&eacute;l&eacute;ment parent (le conteneur flex) et les &eacute;l&eacute;ments enfants (les &eacute;l&eacute;ments flex).</span></p>', '<p><span style=\"color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">Ce guide explique tout ce qui concerne flexbox, en se concentrant sur les diff&eacute;rentes propri&eacute;t&eacute;s possibles pour l\'&eacute;l&eacute;ment parent (le conteneur flex) et les &eacute;l&eacute;ments enfants (les &eacute;l&eacute;ments flex).</span></p>\r\n<p><a href=\"https://css-tricks.com/snippets/css/a-guide-to-flexbox/\" target=\"_blank\" rel=\"noopener\">Voir le guide</a></p>', '2021-10-26 18:22:25', '2021-10-26 20:22:25', 5, 3),
(40, 'Flexbox Froggy', '<p><span style=\"color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">Jeu o&ugrave; vous aidez Froggy la grenouille et ses amis en &eacute;crivant du code CSS (flexbox).</span></p>', '<p><span style=\"color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">Jeu o&ugrave; vous aidez Froggy la grenouille et ses amis en &eacute;crivant du code CSS (flexbox).</span></p>\r\n<p><a href=\"https://flexboxfroggy.com/#fr\" target=\"_blank\" rel=\"noopener\"><span style=\"color: rgba(0, 0, 0, 0.7); font-family: Quicksand, sans-serif; font-size: 16px; background-color: #ffffff;\">Voir le jeu</span></a></p>', '2021-10-26 18:23:59', '2021-10-26 20:23:59', 5, 3),
(47, 'nouvel article', '<p>this is the exerpt of the article</p>\r\n<p>&nbsp;</p>', '<p>content of the article</p>', '2021-10-27 12:43:41', '2021-10-27 14:43:41', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`category_id`, `category_title`) VALUES
(1, 'PHP'),
(2, 'WordPress'),
(3, 'Symfony'),
(5, 'Flexbox');

-- --------------------------------------------------------

--
-- Table structure for table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `commentaire_id` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Commentaires`
--

INSERT INTO `Commentaires` (`commentaire_id`, `contenu`, `date_posted`, `user_id`, `article_id`, `comment_status`) VALUES
(7, 'Excellent cours, super complet.\r\nMaintenant, je pars sur des bonnes bases.', '2021-10-26 20:40:00', 10, 37, 1),
(8, 'Le cours est super, on comprend assez vite le fonctionnement d\'une structure MVC.', '2021-10-26 20:41:52', 9, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Image`
--

CREATE TABLE `Image` (
  `id_Image` int(11) NOT NULL,
  `libelle_image` varchar(45) NOT NULL,
  `url_image` varchar(100) NOT NULL,
  `description_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Image`
--

INSERT INTO `Image` (`id_Image`, `libelle_image`, `url_image`, `description_image`) VALUES
(2, 'libelle_image', 'avatar.png', 'description_image'),
(3, 'libelle_image_2', 'url_image_2', 'description_image_2'),
(4, 'libelle_image', 'url_image', 'description_image'),
(5, 'libelle_image_2', 'url_image_2', 'description_image_2');

-- --------------------------------------------------------

--
-- Table structure for table `UserRole`
--

CREATE TABLE `UserRole` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserRole`
--

INSERT INTO `UserRole` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_role`) VALUES
(3, 'Julia', 'Assad', 'juliasajah85@gmail.com', '$2y$10$WdKfjCGZuEDY.cEZYWlcuulbZjS5TNJogeCJspekTr/UcDKdxg1Qm', 1),
(9, 'Julie', 'Delion', 'delion@gmail.com', '$2y$10$28kfx9vWHdrfscFkseWNNOyNOguIBVZU910zeCGRFfAW0SfEQc6Sm', 1),
(10, 'Chris', 'Bulhe', 'bulhe@gmail.com', '$2y$10$K74h3PyynX5Bp6IrTsGCy.R1msJHQUm1NnawkfvlCNbvD1N7bk6Dq', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`commentaire_id`),
  ADD KEY `actualite_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`id_Image`);

--
-- Indexes for table `UserRole`
--
ALTER TABLE `UserRole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `commentaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Image`
--
ALTER TABLE `Image`
  MODIFY `id_Image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `UserRole`
--
ALTER TABLE `UserRole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`),
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `Articles` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `UserRole` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
