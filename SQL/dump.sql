-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 07 Mars 2014 à 00:40
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `phpgenerator`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `pubDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` varchar(1000) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `author`, `pubDate`, `modifDate`, `content`, `tags`, `category`, `picture`) VALUES
(1, 'John DOE', '2014-01-24 17:43:13', '2014-01-23 23:00:00', 'Voyez ce jeu exquis wallon, de graphie en kit mais bref.  Portez ce vieux whisky au juge blond qui fume sur son île intérieure, à côté de l''alcôve ovoïde, où les bûches se consument dans l''âtre, ce qui lui permet de penser à la cænogenèse de l''être dont il est question dans la cause ambiguë entendue à Moÿ, dans un capharnaüm qui, pense-t-il, diminue çà et là la qualité de son œuvre.', 'jeu,kit,wallon,ciel', 'voyages', 'http://www.voyageur-independant.com/wp-content/uploads/2011/10/evaneos-voyage_7co1.jpg'),
(2, 'Mike EVANWOOD', '2014-01-01 23:00:00', '2014-01-15 23:00:00', 'Dès Noël où un zéphyr haï me vêt de glaçons würmiens, je dîne d’exquis rôtis de bœuf au kir à l’aÿ d’âge mûr & cætera ! Fougueux, j''enivre la squaw au pack de beau zythum.  Ketch, yawl, jonque flambant neuve… jugez des prix ! Voyez le brick géant que j''examine près du wharf. Portez ce vieux whisky au juge blond qui fume. Bâchez la queue du wagon-taxi avec les pyjamas du fakir. Voix ambiguë d''un cœur qui, au zéphyr, préfère les jattes de kiwis. Mon pauvre zébu ankylosé choque deux', 'kiwi,zéphir,accents', 'fourberie', 'http://ulule.me/projects/44/dessine-moi-decor-jeu-video-avec-pixia-13.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `currentuser`
--

DROP TABLE IF EXISTS `currentuser`;
CREATE TABLE `currentuser` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `registrated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `currentuser`
--

INSERT INTO `currentuser` (`id`, `username`, `password`, `mail`, `registrated`) VALUES
(1, 'pierrot', '1b0eb89f1fb9c49018006e9666ecde13', 'pierre.guilhou14@gmail.com', '2014-01-31 13:36:38');

-- --------------------------------------------------------

--
-- Structure de la table `dates`
--

DROP TABLE IF EXISTS `dates`;
CREATE TABLE `dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dateTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateToString` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `dates`
--

INSERT INTO `dates` (`id`, `dateTimestamp`, `dateToString`) VALUES
(1, '2014-01-25 14:59:03', 'Mon. 12, October 2007'),
(2, '2014-01-02 11:07:36', 'Sun. 05, February 2012');

-- --------------------------------------------------------

--
-- Structure de la table `fbpost`
--

DROP TABLE IF EXISTS `fbpost`;
CREATE TABLE `fbpost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `pubDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` varchar(255) NOT NULL,
  `likeCounter` int(9) unsigned NOT NULL DEFAULT '0',
  `comments` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `fbpost`
--

INSERT INTO `fbpost` (`id`, `firstname`, `lastname`, `pubDate`, `content`, `likeCounter`, `comments`) VALUES
(1, 'Mike', 'JOLI', '2014-01-08 02:15:00', 'Hey, I just found out a new data generator was available; AWESOME !', 7, '[{''comUserName'':''Jesse'',''comeDate'':''2014-01-08 03:15:32'',''comLikeCounter'':''2'',''comContent'':''Yeah, an other useful tool!''}]');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` float unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `inStock` int(1) unsigned NOT NULL,
  `storageCounter` int(9) unsigned NOT NULL,
  `picture` varchar(255) NOT NULL,
  `recommandations` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `price`, `name`, `description`, `inStock`, `storageCounter`, `picture`, `recommandations`) VALUES
(1, 24, 'Wine bottle', 'A 2003 Grand Cru bottle of red french wine', 1, 67, 'http://www.drycreekvineyard.com/images/bottles/xlg/2007_cabernet_sauvignon_btl_xlg.jpg', '[{''username'':''Gérard D.'',''content'':''Très bonne bouteille !''}]'),
(2, 965, 'Sony Vaio VPCSA4', 'Brand new Sony Vaio, 13&#34; Full HD screen, 128 GB SSD, 8GB RAM, Intel I5', 1, 672, 'http://www.01net.com/images/produit/full/sony-vpc-sa4b4e-x-2.jpg', '[{}]');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `city` varchar(256) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`city`, `id`, `longitude`, `latitude`) VALUES
('Paris', 1, 2.333, 48.833),
('London', 2, -81.25, 42.967),
('New York', 3, 40.667, -73.833),
('Copenaghen', 4, 55.717, 12.567);

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `release_date` date NOT NULL,
  `popularity` int(2) NOT NULL,
  `vote_rating` float NOT NULL,
  `vote_counter` int(9) NOT NULL,
  `short_image` varchar(256) NOT NULL,
  `poster_image` varchar(256) NOT NULL,
  `adult` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE `tweet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `pubDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` varchar(140) NOT NULL,
  `reTweetCounter` int(9) unsigned NOT NULL,
  `favoriteCounter` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `tweet`
--

INSERT INTO `tweet` (`id`, `username`, `pseudo`, `pubDate`, `content`, `reTweetCounter`, `favoriteCounter`) VALUES
(7, 'emeric', 'memeric', '0000-00-00 00:00:00', 'Nothing to do there... #WebSchoolFactory', 118, 67),
(8, 'guillaume', 'gb2b', '0000-00-00 00:00:00', 'I''ll try to get up early this morning... #Rodrigue', 12, 9),
(9, 'sara', 'sh', '0000-00-00 00:00:00', 'Hey guys, we''re up all night to get lucky ! #daftPunk', 82, 34),
(10, 'pharell', 'pha', '0000-00-00 00:00:00', 'Clap along if you feel that happiness is the truth ! #HAPPY', 0, 0),
(11, 'cocoxchanel', 'Pierre L.', '0000-00-00 00:00:00', 'Aujourd''hui fin des partiels !', 4, 10),
(12, 'bufferdu91', 'Thierry G.', '0000-00-00 00:00:00', 'Vends places pour le concert de ce soir, MP si intéressé.', 2, 3),
(13, 'samxel', 'Sam', '0000-00-00 00:00:00', 'Cherche stage à Londres, si vous avez des contacts ?', 1, 2),
(14, 'letmefree', 'Fat.', '0000-00-00 00:00:00', 'Non mais allo.', 11, 6),
(15, 'drupalrocks', 'Mister Drupal', '0000-00-00 00:00:00', 'Drupal 4vah !', 50, 34),
(16, 'dafturpunk', 'Daft ur Punk', '0000-00-00 00:00:00', 'I''m happy.', 10, 0),
(17, 'lejaponiais', 'Le japon niais', '0000-00-00 00:00:00', 'So kawaiiiiiii', 100, 0),
(18, 'suchwoow', 'S. Wow', '0000-00-00 00:00:00', 'Such wow everywhere', 30, 0),
(19, 'selfiiie', 'Sophie selfie.', '0000-00-00 00:00:00', 'Selfie du jour !', 500, 0),
(20, 'supermedianjv', 'Super média jeux vidéo.', '0000-00-00 00:00:00', 'RT pour gagner des places pour le nouveau spectacle de FF.', 1000, 0),
(21, 'lemagconcours', 'Le magasine du concours', '0000-00-00 00:00:00', 'A 1000 RT j''offre un abonnements CloupUp !', 90, 0),
(22, 'Eric', 'Drupal', '0000-00-00 00:00:00', 'Je m''appelle Eric Drupal', 50, 0),
(23, 'Johanna', 'Lim', '0000-00-00 00:00:00', 'Grosse promotion sur les nouveaux noms de domaines', 30, 0),
(24, 'Serina', 'Celest', '0000-00-00 00:00:00', 'De retour de vacances, so sad...', 18, 0),
(25, 'Jean', 'Pied', '0000-00-00 00:00:00', 'J''ai peut être un peu trop mangé...', 1, 0),
(26, 'Erika', 'Gonon', '0000-00-00 00:00:00', 'J''ai mon permis !', 200, 0),
(27, 'Quentin', 'Poncha', '0000-00-00 00:00:00', 'C''est mon anniversaire !', 50, 0),
(28, 'Xavier', 'Hoot', '0000-00-00 00:00:00', 'Paris by night is wonderful', 2, 0),
(29, 'Manon', 'Oups', '0000-00-00 00:00:00', 'I did it again', 3, 0),
(30, 'Aude', 'Dark', '0000-00-00 00:00:00', 'Franchement le dernier film de Di Caprio est juste génial', 5, 0),
(31, 'Juste', 'Leblanc', '0000-00-00 00:00:00', 'Quel diner de con !', 300, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `gender` varchar(10) NOT NULL,
  `title` varchar(5) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `street` varchar(256) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `currentLong` double NOT NULL,
  `currentLat` double NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sha1Password` varchar(150) NOT NULL,
  `registrated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `phone` varchar(15) NOT NULL,
  `picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`gender`, `title`, `firstName`, `lastName`, `street`, `zip`, `city`, `currentLong`, `currentLat`, `email`, `userName`, `password`, `sha1Password`, `registrated`, `phone`, `picture`) VALUES
('Male', 'Mr', 'John', 'DOE', '16 Wall Street avenue', '15686', 'New York', 1234567.867654, 6884561.623738, 'johndoe@gmail.com', 'JohnDoe', 'azerty', 'fbd12ghfdgjkfghg4654fdfhf4545g', '2014-01-20 13:52:20', '0685967412', 'http://fatfreeframework.com/gui/img/logo-dark.png'),
('Female', 'Mrs', 'Audrey', 'Hepburn', '7 Hollywood Street', '14453', 'Manhattan', 145452141.12215, 454575528.75112, 'audreyHepburn@gmail.com', 'azerty', 'fj12gjfhghg5g4f545', 'fgfh542g4df22ghg2g2f', '2014-01-20 14:14:57', '4521212525', 'http://fatfreeframework.com/gui/img/logo-dark.png');
