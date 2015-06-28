-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 28 Juin 2015 à 20:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mewpipedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `users_id` int(11) NOT NULL,
  `videos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `videos_id` (`videos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `text`, `users_id`, `videos_id`) VALUES
(1, 'Wooooa bsahtek le panda', 1, 1),
(2, 'Trop chaud le panda', 2, 1),
(3, 'L''ours ilest costaud', 2, 2),
(4, 'c''est un tueur l''ours !', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'http://localhost/avatar/1.png',
  `datecreation` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `avatar`, `datecreation`) VALUES
(1, 'samy', 'samy', '', 'http://localhost/avatar/1.png', '0000-00-00 00:00:00'),
(2, 'flo', 'flo', '', 'http://localhost/avatar/1.png', '0000-00-00 00:00:00'),
(3, 'Hicham', 'ed64637559a0bc0a206af5f36955f589ac367756', '', 'http://localhost/avatar/1.png', '0000-00-00 00:00:00'),
(4, 'admin', '442dbbc8dc23a4e1a121581bab9e4390a72e2d14', '', 'http://localhost/avatar/1.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `url` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `datecreated` timestamp NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users_id_fk` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id`, `name`, `description`, `url`, `users_id`, `status`, `datecreated`, `thumbnail`, `views`) VALUES
(1, 'Panda', 'Video d''un enfoiré de panda', 'http://localhost/videos/1.mp4', 1, 0, '0000-00-00 00:00:00', NULL, 6),
(2, 'Ours', 'Video d''un enfoiré d''ours', 'http://localhost/videos/1.mp4', 1, 0, '0000-00-00 00:00:00', NULL, 2),
(4, 'horses', 'horses test', 'localhost/videos/Wildlife.wmv', 1, 1, '2015-06-27 18:42:19', 'de', 4);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `users_comments_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_comments_id` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `users_id_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
