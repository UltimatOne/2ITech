-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 jan. 2024 à 15:55
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `blog_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `blog_state` enum('Brouillon','Prêt','Publié') COLLATE utf8mb4_general_ci NOT NULL,
  `blog_user_pseudo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `blog_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`),
  UNIQUE KEY `blog_title` (`blog_title`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_content`, `blog_state`, `blog_user_pseudo`, `blog_create_date`) VALUES
(1, 'Test1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, exercitationem quis provident molestiae culpa nam maiores recusandae perferendis doloremque totam veritatis corrupti sapiente aliquid architecto praesentium consectetur ullam ab quos id illum accusamus, aspernatur ipsum sit. Architecto quidem tempora, cum quae ipsum et dignissimos officiis! Maxime molestias enim eligendi facilis ea eius consequatur ullam adipisci aut illum. Eum quia, a, iste voluptatibus suscipit earum in ipsa saepe dignissimos velit debitis quisquam dicta non aliquid ipsam quas? Vero culpa, distinctio quasi excepturi reiciendis sequi officiis numquam quaerat quae minus ducimus doloribus rem fuga optio expedita praesentium nesciunt quia placeat ipsa esse. +1', 'Publié', 'Ultimat', '2024-01-04 11:06:01'),
(4, 'test 4', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Publié', 'user2', '2024-01-04 18:46:44'),
(5, 'test 5', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Publié', 'user1', '2024-01-04 18:48:06'),
(6, 'test 6', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Publié', 'user3', '2024-01-04 18:53:11'),
(8, 'test 7', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Publié', 'Ultimat', '2024-01-05 14:09:29'),
(9, 'test 8', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Brouillon', 'user2', '2024-01-05 14:10:07'),
(12, 'test 2', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Prêt', 'Ultimat', '2024-01-05 15:39:00'),
(13, 'titre 9', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Prêt', 'Ultimat', '2024-01-05 16:38:52');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_role` enum('administrator','user') COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_firstname` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pswrd` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `user_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_role`, `user_pseudo`, `user_name`, `user_firstname`, `user_email`, `user_pswrd`, `user_create`) VALUES
(1, 'administrator', 'Ultimat', NULL, NULL, 'jj.goddet@icloud.com', '$2y$10$q87uKJfxLSI/sE2efe7YYu9cPAgXPzquHhsIdB5h3uYVamg2NdR9u', '2024-01-04 10:15:24'),
(2, 'user', 'user1', NULL, NULL, 'user1@test.com', '$2y$10$PXnrJ7Jcm3Xsqnq0m19HIO5.PTjMu5jSTxkMCHC7sgLwr3SRGdmGu', '2024-01-04 14:33:27'),
(3, 'user', 'user2', 'user2', 'user2', 'user2@test.com', '$2y$10$H7rray/VJrWu.AdX4D2WiO0fqcLgofjJlF9MZRx2/KbeBTzNPJ6/.', '2024-01-04 14:55:09'),
(4, 'user', 'user3', 'user3', 'user3', 'user3@test.com', '$2y$10$8Y9s5tcHvCOSATvnp8zpDe4VhfEYA3VL21jTzmYFvl1NhD93J7fdS', '2024-01-04 18:40:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
