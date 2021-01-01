-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 26 jan. 2020 à 09:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
USE `dbs273640`;

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `titre`, `contenu`) VALUES
(17, 'Chapitre 5', '<p>Etiam leo nisl, lacinia non aliquam id, aliquam eget massa. Mauris quis tellus neque. Phasellus rutrum massa a lectus posuere porttitor. Curabitur massa lectus, sodales a tempus non, facilisis ut elit. Sed aliquam libero vitae ante faucibus, ut malesuada neque accumsan. Nulla facilisi. Nulla facilisi. Nam eleifend mattis nibh.</p>'),
(14, 'Chapitre 3', '<p>Praesent vel tortor luctus, vulputate sem in, fermentum neque. Aenean ac nisl enim. Praesent eu tellus tincidunt, porta ligula eget, feugiat felis. Vivamus a sagittis neque. In hac habitasse platea dictumst. Mauris varius, metus eu ullamcorper sagittis, odio nulla posuere massa, et elementum purus turpis ac nunc. Pellentesque id semper tortor, id dignissim libero. Mauris varius lacus non tellus mattis, eu commodo purus vestibulum. Morbi eget dui justo. Vestibulum facilisis augue eget turpis elementum, et fringilla erat tempor. Etiam et sollicitudin arcu. Nam sodales eros at blandit molestie. Etiam lacus ante, tincidunt ut risus ac, lacinia consectetur sapien. In eget commodo velit.</p>'),
(15, 'Chapitre 4', '<p>Suspendisse vel porta nulla. Curabitur velit orci, pellentesque sed ipsum non, venenatis ultricies lorem. Nunc a risus enim. Fusce ac lorem eu turpis tristique auctor. Mauris quis leo ac urna posuere fringilla. Proin quis tristique nulla, finibus ornare massa. Sed tempus lacus sagittis eros dapibus, quis rutrum enim cursus. Donec eu urna ac purus ultrices venenatis. Donec tincidunt in risus eget posuere. Phasellus ut aliquet enim, non suscipit augue. Integer mollis dui et augue hendrerit, at vestibulum lorem fermentum. Nulla id dui vehicula dui viverra condimentum. Donec lectus nunc, mattis ut tellus varius, eleifend suscipit felis.</p>'),
(13, 'Chapitre 2', '<p>Cras sed laoreet libero. In porttitor lectus non congue volutpat. Suspendisse elementum eros non nisl pharetra aliquet ac vel erat. Fusce lorem turpis, mattis sit amet lorem quis, ullamcorper dictum magna. Vestibulum varius dignissim ultrices. Mauris non imperdiet leo. Integer est nisl, condimentum ac justo id, fermentum vulputate sapien. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque sollicitudin euismod urna et aliquet. Ut pulvinar laoreet arcu, dictum viverra lectus tincidunt id.</p>'),
(12, 'Chapitre 1 ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et magna tempus, viverra neque vitae, vehicula lectus. Fusce vulputate dolor nec mattis egestas. Donec et ante finibus, fringilla mauris eu, vehicula dolor. Phasellus et metus mauris. Proin eleifend suscipit auctor. Nulla sodales turpis maximus erat tincidunt, ac placerat nisl viverra. Etiam congue, justo sed pretium accumsan, leo eros vulputate est, id fermentum purus magna fringilla nunc. Pellentesque et orci laoreet, tempus sem vestibulum, pretium augue. Donec turpis velit, sodales non urna id, porttitor malesuada diam. Aenean auctor at mauris et volutpat.</p>'),
(18, 'Chapitre 6', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis vestibulum tellus, non consequat massa. Sed convallis a elit pellentesque malesuada. Duis augue massa, molestie et auctor non, feugiat vel orci. Praesent egestas a quam ut gravida. Cras malesuada pulvinar ex. Pellentesque placerat turpis eget mi bibendum rhoncus. Nullam eu semper sem. Mauris eu eros mollis, varius purus pharetra, ultrices metus. Nunc vitae blandit turpis, id vehicula velit. Mauris elementum ligula in justo scelerisque, dapibus rhoncus eros hendrerit. Morbi consequat fermentum lacus, sit amet vehicula odio hendrerit sit amet. Donec mattis nunc sit amet orci dignissim molestie. Nullam semper blandit mi, nec suscipit felis auctor sed. Ut non commodo velit. Donec auctor rutrum sapien, a volutpat nisi.</p>'),
(20, 'Chapitre 7 ', '<p>Suspendisse vel porta nulla. Curabitur velit orci, pellentesque sed ipsum non, venenatis ultricies lorem. Nunc a risus enim. Fusce ac lorem eu turpis tristique auctor. Mauris quis leo ac urna posuere fringilla. Proin quis tristique nulla, finibus ornare massa. Sed tempus lacus sagittis eros dapibus, quis rutrum enim cursus. Donec eu urna ac purus ultrices venenatis. Donec tincidunt in risus eget posuere. Phasellus ut aliquet enim, non suscipit augue. Integer mollis dui et augue hendrerit, at vestibulum lorem fermentum. Nulla id dui vehicula dui viverra condimentum. Donec lectus nunc, mattis ut tellus varius, eleifend suscipit felis.</p>'),
(21, 'Chapitre 8', '<p>Etiam leo nisl, lacinia non aliquam id, aliquam eget massa. Mauris quis tellus neque. Phasellus rutrum massa a lectus posuere porttitor. Curabitur massa lectus, sodales a tempus non, facilisis ut elit. Sed aliquam libero vitae ante faucibus, ut malesuada neque accumsan. Nulla facilisi. Nulla facilisi. Nam eleifend mattis nibh.</p>'),
(53, 'ex', '<p>test</p>');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapitre` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_chapitre`, `pseudo`, `commentaire`, `flag`) VALUES
(2, 22, 'Evabas', 'Super!!', 0),
(3, 22, 'Evabas', 'génial!!', 0),
(4, 22, 'evabas', 'cool!!', 0),
(5, 22, 'Evabas', 'coucou', 0),
(6, 21, 'lou', 'super chapitre !!', 0),
(7, 22, 'lou', 'salut', 0),
(8, 22, 'lou', 'He he', 0),
(9, 22, 'lou', 'bonjour', 0),
(10, 27, 'Evabas', 'Quelle suite !!!', 0),
(11, 27, 'Lou', 'top!!', 0),
(12, 20, 'Evabas', 'intéressant', 0),
(13, 44, 'lili', 'Géniale cette intrigue !', 0),
(14, 53, 'Evabas', 'blabla', 0),
(15, 53, 'Evabas', ' coucou', 0),
(16, 53, 'lili', 'bof', 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(11) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_groupe` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_id_groupe` (`id_groupe`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `id_groupe`) VALUES
(80, 'adam', '$2y$10$3YgU1plPp8ivl5NWcAmj9uYtxe82SuisWwWbN8wCB6OSpgFLT/8wa', 'adam@mail.com', 1),
(79, 'paul', '$2y$10$97SbLmaS25zY8opqZeOrKeWQH./fVink2wBtCXRPbONqOJcQHeHwy', 'paul@mail.com', 1),
(78, 'aze', '$2y$10$jZxshf5uSr6qUOutOA7aNeq1DDYoHN0euRGoCJr7eA2hZTn3Rzjm6', 'aze@mail.com', 1),
(77, 'tom', '$2y$10$O4O.34TNUSM9U/1nuWSQ6.5yKplfNfgq4g6iWjil0eLF8qZmPTq4.', 'tom@mail.com', 1),
(75, 'lou', '$2y$10$6E/FW71hL9TiZ9amcjTchuusBBCoZL/D3qUFftEWSApe3rF4at2xS', 'lou@mail.com', 1),
(76, 'lili', '$2y$10$68X4gi.66ic4kGia/5Bt1.a.OQpIx04X3SX9ASWXVoOinI8GKQAA6', 'lili@gmail.com', 1),
(73, 'Bob', '$2y$10$J6Z7EiJ7PoIdXJ0i/Kf1reTFHBumJx5xi1KFG1lNzdFr146hMBVza', 'bob@mail.com', 1),
(74, 'jeanForteroche', '$2y$10$jH/q84TWImglo5ispWCmtucWxDspirmuTdYwCnFj5QgDt/rgmCcI2', 'jean@mail.com', 2),
(72, 'Evabas', '$2y$10$7gHxbkUSReHu39aoZnhZ1.H5wFdGKHmfRxnrTvmaSPIjITamEeDA.', 'evabas@mail.com', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
