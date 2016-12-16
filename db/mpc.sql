-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2016 at 12:02 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `prenom`) VALUES
(1, 'Jackson', 'Michael'),
(2, 'Zola', 'Emile');

-- --------------------------------------------------------

--
-- Table structure for table `bd`
--

CREATE TABLE `bd` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd`
--

INSERT INTO `bd` (`id`, `ouvrage_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) DEFAULT NULL,
  `artist` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`id`, `ouvrage_id`, `artist`) VALUES
(2, 3, 'Metallica');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) DEFAULT NULL,
  `date_retour` date NOT NULL,
  `date_emprunt` date NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`id`, `ouvrage_id`, `date_retour`, `date_emprunt`, `utilisateur_id`) VALUES
(1, 3, '2016-12-10', '2016-12-08', 5);

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`id`, `ouvrage_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `annee` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `titre`, `auteur_id`, `annee`, `date`) VALUES
(1, 'Asterix Chez Les Bretons', 1, 1999, '2016-12-01'),
(2, 'Titeuf - C\'est pô juste !', 2, 2002, '2016-11-09'),
(3, 'Ride The Lightning', 1, 1984, '2016-10-25'),
(4, 'Le seigneurs des anneaux', NULL, 1981, '2016-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ouvrage_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date`, `ouvrage_id`, `utilisateur_id`) VALUES
(17, '2016-12-16', 1, NULL),
(18, '2016-12-16', 1, NULL),
(19, '2016-12-16', 4, NULL),
(20, '2016-12-16', 1, NULL),
(21, '2016-12-16', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `username` varchar(180) NOT NULL,
  `username_canonical` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `email_canonical` varchar(180) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(2, NULL, NULL, 'add', 'add', 'add@add.add', 'add@add.add', 1, NULL, '$2y$13$fvkKqBPYNR0Z1ye4wU1WTeYGQFQGoB1VJcTBGEiUa8ONauBpbJkVm', '2016-12-16 09:00:47', NULL, NULL, 'a:0:{}'),
(3, NULL, NULL, 'admin', 'admin', 'admin@admin.admin', 'admin@admin.admin', 1, NULL, '$2y$13$it43c46j0Rc5FbWdn9Mq0.2S/KtMqyqOeRYM8B6bu2jn9F/A1vNTe', '2016-12-15 16:21:56', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}'),
(4, NULL, NULL, 'azerty', 'azerty', 'hello@hello.hello', 'hello@hello.hello', 1, NULL, '$2y$13$2GcKXm0RwGMkCXcEmnA5Ses8iutDz8k4A3WDJsbBrGx4VguMHgeei', '2016-12-15 09:36:00', NULL, NULL, 'a:0:{}'),
(5, NULL, NULL, 'aaa', 'aaa', 'a@a.a', 'a@a.a', 1, NULL, '$2y$13$vVI6EI9vmxPGjwbPXnIq.e56FrjStuuVR166y2TKKyLkHb9bvW8eK', '2016-12-15 09:43:56', NULL, NULL, 'a:0:{}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bd`
--
ALTER TABLE `bd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`),
  ADD KEY `IDX_364071D7FB88E14F` (`utilisateur_id`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrage_id` (`ouvrage_id`),
  ADD KEY `IDX_42C84955FB88E14F` (`utilisateur_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_497B315E92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_497B315EA0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_497B315EC05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bd`
--
ALTER TABLE `bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bd`
--
ALTER TABLE `bd`
  ADD CONSTRAINT `FK_5CCDBE9B15D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`);

--
-- Constraints for table `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `FK_45D68FDA15D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`);

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_364071D715D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`),
  ADD CONSTRAINT `FK_364071D7FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_AC634F9915D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`);

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `FK_52A8CBD860BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteurs` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C8495515D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`),
  ADD CONSTRAINT `FK_42C84955FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
