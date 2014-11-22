-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 22 Novembre 2014 à 23:58
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hackathon21112014`
--

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `metaDescription` text NOT NULL,
  `metaKeywords` text NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `header`
--

INSERT INTO `header` (`id`, `title`, `metaDescription`, `metaKeywords`, `lang`) VALUES
(1, '', '', '', 'fr'),
(2, '', '', '', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `code`) VALUES
(1, 'fr'),
(2, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `rewrittingurl`
--

CREATE TABLE IF NOT EXISTS `rewrittingurl` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `idRouteUrl` tinyint(5) NOT NULL,
  `urlMatched` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `rewrittingurl`
--

INSERT INTO `rewrittingurl` (`id`, `idRouteUrl`, `urlMatched`, `lang`) VALUES
(1, 1, '/accueil.html', 'fr'),
(2, 1, '/en/home.html', 'en'),
(3, 2, '/404.html', 'fr'),
(4, 2, '/en/404.html', 'en'),
(5, 3, '/lettre.html', 'fr'),
(6, 8, '/{login}/lettre-afficher.html', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `routeurl`
--

CREATE TABLE IF NOT EXISTS `routeurl` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `controller` varchar(100) NOT NULL DEFAULT '',
  `action` varchar(100) NOT NULL DEFAULT '',
  `order` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `routeurl`
--

INSERT INTO `routeurl` (`id`, `name`, `controller`, `action`, `order`) VALUES
(1, 'home', 'home', 'index', 0),
(2, 'error404', 'home', 'error404', 0),
(3, 'letter', 'letter', 'index', 1),
(7, 'login', 'home', 'login', 0),
(8, 'publicLetter', 'letter', 'publicLetter', 0),
(9, 'apiconnect', 'webservice', 'connect', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `childfirstname` varchar(255) NOT NULL,
  `childlastname` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` int(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `childfirstname`, `childlastname`, `age`, `gender`, `email`, `password`, `creationdate`) VALUES
(1, 'mael', 'dulon', 4, 0, 'maeldulon@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-11-22'),
(6, 'zefzfz', '', 4, 0, 'efzfez@zefef.fe', 'b989dec164c74a80b1dd4ad63fcb5280', '2014-11-22'),
(7, 'Romain', '', 4, 0, 'cocuou@zezef.fe', 'f614be5c658acd76f5c71592b6ec09e6', '2014-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `user_wishlist`
--

CREATE TABLE IF NOT EXISTS `user_wishlist` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idUser` int(5) NOT NULL,
  `letterurl` varchar(255) NOT NULL,
  `creationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user_wishlist`
--

INSERT INTO `user_wishlist` (`id`, `idUser`, `letterurl`, `creationdate`) VALUES
(1, 1, 'hack-cdiscount.thibaultdulon.com/1/lettre-afficher.html', '2014-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `user_wishlist_products`
--

CREATE TABLE IF NOT EXISTS `user_wishlist_products` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idUserwishlist` int(5) NOT NULL,
  `idProduct` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `creationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user_wishlist_products`
--

INSERT INTO `user_wishlist_products` (`id`, `idUserwishlist`, `idProduct`, `title`, `description`, `price`, `image`, `creationdate`) VALUES
(1, 1, 1, 'produit test', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '25.99', 'http://houstin.info/wp-content/uploads/2010/03/lapin-cretin1.jpg', '2014-11-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
