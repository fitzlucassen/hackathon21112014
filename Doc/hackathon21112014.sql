-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 23 Novembre 2014 à 13:06
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `childfirstname`, `childlastname`, `age`, `gender`, `email`, `password`, `creationdate`) VALUES
(1, 'mael', 'dulon', 4, 0, 'maeldulon@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-11-22'),
(6, 'zefzfz', '', 4, 0, 'efzfez@zefef.fe', 'b989dec164c74a80b1dd4ad63fcb5280', '2014-11-22'),
(7, 'Romain', '', 4, 0, 'cocuou@zezef.fe', 'f614be5c658acd76f5c71592b6ec09e6', '2014-11-22'),
(8, 'justine', '', 8, 0, 'zefzf@zefzef.fe', '5436088c2e41a20902bba03f186a2b84', '2014-11-23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user_wishlist`
--

INSERT INTO `user_wishlist` (`id`, `idUser`, `letterurl`, `creationdate`) VALUES
(1, 1, '/1/lettre-afficher.html', '2014-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `user_wishlist_products`
--

CREATE TABLE IF NOT EXISTS `user_wishlist_products` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idUserwishlist` int(5) NOT NULL,
  `idProduct` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `creationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user_wishlist_products`
--

INSERT INTO `user_wishlist_products` (`id`, `idUserwishlist`, `idProduct`, `title`, `description`, `price`, `image`, `url`, `creationdate`) VALUES
(1, 1, 'MOD42YW2999111', 'Coffret Course-Poursuite RC 1/16e', 'MODELCO - Coffret Course - Poursuite  1/16 RC - Lot de 2 voitures RC ss  licence 1/16e:Nissan GT-R& Lamborghini Gallardo Police.Phares s’allument, voitures toutes fonctions. vitesse turbo de 11 à 13km/h - Packaging £TRY ME£ marche ac 6x1,5V AA LR06 non incluses - Garçon - Dès 8 Ans - Livre A L''Unité', '26.77', 'http://i2.cdscdn.com/pdt2/1/1/1/1/300x300/MOD42YW2999111.jpg', 'http://www.cdiscount.com/opa.aspx/?trackingid=ftLxm5znoqWbofIq1gmwntfFgYtgDCKx9_2fVyd8HxQhRTZLrX0MlVIOjCAaxQYk&action=product&id=MOD42YW2999111', '2014-11-23'),
(2, 1, 'MOD3700463104150', 'SKU PERE MODELCO 4Truck RC prêt à rouler 1/14e', 'Véhicule type 4 x 4 radio commandé 2WD à l’échelle 1/14. Livré prêt à rouler: 1 x 9V pour la radio, accu (7,2V nimh) et chargeur pour le véhicule inclus. Garçon. A partir de 6 ans. Livré à l''unité.', '27.55', 'http://i2.cdscdn.com/pdt2/1/5/0/1/300x300/MOD3700463104150.jpg', 'http://www.cdiscount.com/opa.aspx/?trackingid=ftLxm5znoqWbofIq1gmwntfFgYtgDCKx9_2fVyd8HxQhRTZLrX0MlVIOjCAaxQYk&action=product&id=MOD3700463104150', '2014-11-23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
