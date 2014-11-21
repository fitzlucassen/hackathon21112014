-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 06 Novembre 2014 à 23:19
-- Version du serveur :  5.5.40-0+wheezy1-log
-- Version de PHP :  5.4.34-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `portfoliov2`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `period` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `company`
--

INSERT INTO `company` (`id`, `title`, `description`, `period`, `image`, `url`) VALUES
(1, '1000mercis', '- Réalisation d''un site B2C de liste de naissance en .NET MVC3/JQuery/Razor HTML/Entiity Framework/Solrnet\r\n* Implémentation de l''API de paiement MERCANET et réalisation d''un tunnel d''achat en Front-Office. Réalisation d''un Back-Office de gestion de la comptabilité et de gestion automatique des remises bancaire.\r\n* Développement d''un catalogue de produits en Front-Office, Implémentation et utilisation de l''API Solrnet afin d''utiliser le moteur d''indexation Solr, développement d''un Back-Office de modération et de gestion des produits du catalogue.\r\n* Réflexion, analyse et développement d''une structure de site modulable et réutilisable à l''avenir, notion d''AGILE, de couche d''abstraction (layer)...etc.\r\n\r\n\r\n- Maintenance de site B2C déjà existant en ASP.NET/Javascript', 'septembre 2012 - août 2015', 'numberly.png', 'http://www.1000mercis.com/home.html'),
(2, 'Advisto SAS', '- Développement de différents modules PHP pour le CMS e-commerce PEEL Shopping\r\n- Maintenance du CMS e-commerce PEEL Shopping et développement d''une nouvelle version\r\n- Intégration de sites clients en HTML/CSS/jQuery\r\n- Utilisation d''outils de bug tracking (Mantis) et de versioning (SVN)', 'avril 2012 - juillet 2012', 'advisto.png', 'https://www.advisto.fr/');

-- --------------------------------------------------------

--
-- Structure de la table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
`id` tinyint(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `school` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `degree`
--

INSERT INTO `degree` (`id`, `title`, `description`, `school`, `period`) VALUES
(1, 'Licence web et e-business', 'Obtention d''une licence (BAC +3) dans le domaine du développement web et de la culture du e-business.', 'à l''ESGI (Paris)', 'juillet 2013'),
(2, 'DUT Informatique', 'Obtention d''un DUT Informatique en étant classé 8ème de ma promotion', 'à l''IUT d''Orsay (Orsay)', 'juin 2012'),
(3, 'BAC S', 'Obtention d''un bac S mention assez bien. ', 'au Lycée Geoffroy Saint Hilaire (Étampes)', 'juillet 2010');

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
`id` tinyint(5) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `metaDescription` text NOT NULL,
  `metaKeywords` text NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
`id` tinyint(5) NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT 'fr'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `code`) VALUES
(1, 'fr'),
(2, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`id` tinyint(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dCrea` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `link`, `image`, `dCrea`) VALUES
(1, 'PassAnger', '- Intégration et développement du site vitrine de mon groupe de musique (HTML5 / CSS3 / Javascript / jQuery / PHP)<br/>\n- Développement d''un Back-office de gestion du contenu', 'http://passanger.thibaultdulon.com', 'passanger.png', '2013-01-01'),
(2, 'Dis Merci à la dame', 'Intégration et développement entier d''un site de liste de cadeaux de naissance (.NET MVC3, HTML5, CSS3, JQuery...etc.)\nAnalyse et développement d''une structure de site modulable et réutilisable.', 'http://www.dismerci.com', 'dismerci.jpg', '2013-05-01'),
(3, 'BornWorm', 'Intégration et développement d''une WebApp permettant de jouer avec ses amis facebook (deviner leur lieu de naissance) (HTML5 / CSS3 / jQuery / Javascript / FB.API, GMaps.API)\n', 'http://bornworm.thibaultdulon.com', 'bornworm.png', '2014-01-01'),
(4, 'MilleMercisMariage', 'Intégration et développement d''un site de liste de cadeau de mariage (ASP.NET, HTML5, CSS3, JQuery...etc.)', 'http://www.millemercismariage.com', 'millemercismariage.jpg', '2014-06-01'),
(5, 'FLFramework', 'Développement de mon propre framework PHP5. Utilisé pour tous mes projets. Fiable, simple et réunissant tous les helpers communs', 'https://github.com/fitzlucassen/FLFramework', 'flframework.png', '2014-09-01'),
(6, 'Room25', 'Intégration et développement du jeu de plateau Room25 (HTML5 / CSS3 / jQuery / Javascript/ NodeJS / Socket.io / AngularJS / Grunt)', 'http://room25.thibaultdulon.com', 'room25.png', '2014-10-01'),
(8, 'Ocito', '- Développement du site vitrine d''Ocito via wordpress<br/>\n- Prise de connaissance de la structure du CMS<br/>\n- Recherche de module wordpress<br/>\n- Intégration spécifique', 'http://www.ocito.com/', 'ocito.png', '2014-02-01'),
(9, 'Matiro', '- Développement du site vitrine de Matiro via wordpress<br/>\n- Prise de connaissance de la structure du CMS<br/>\n- Recherche de module wordpress<br/>\n- Intégration spécifique', 'http://www.matiro.com/', 'matiro.png', '2014-02-01'),
(10, 'Webtuts', 'Développement et intégration d''un site/blog from scratch de tutoriaux sur les technologies du web (HTML5, CSS3, jQuery, PHP5)', 'webtuts.thibaultdulon.com', 'webtuts.png', '2014-11-06');

-- --------------------------------------------------------

--
-- Structure de la table `rewrittingurl`
--

CREATE TABLE IF NOT EXISTS `rewrittingurl` (
`id` tinyint(5) NOT NULL,
  `idRouteUrl` tinyint(5) NOT NULL,
  `urlMatched` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'fr'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rewrittingurl`
--

INSERT INTO `rewrittingurl` (`id`, `idRouteUrl`, `urlMatched`, `lang`) VALUES
(1, 1, '/accueil.html', 'fr'),
(2, 1, '/en/home.html', 'en'),
(3, 2, '/404.html', 'fr'),
(4, 2, '/en/404.html', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `routeurl`
--

CREATE TABLE IF NOT EXISTS `routeurl` (
`id` tinyint(5) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `controller` varchar(100) NOT NULL DEFAULT '',
  `action` varchar(100) NOT NULL DEFAULT '',
  `order` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `routeurl`
--

INSERT INTO `routeurl` (`id`, `name`, `controller`, `action`, `order`) VALUES
(1, 'home', 'home', 'index', 0),
(2, 'error404', 'home', 'error404', 0);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
`id` tinyint(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mark` int(2) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Front-End',
  `dCrea` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `title`, `mark`, `category`, `dCrea`) VALUES
(1, 'HTML5 / CSS3', 17, 'Front-End', '2014-02-04'),
(3, '.NET MVC4', 16, 'Back-End', '2014-02-04'),
(4, 'jQuery / JS', 18, 'Front-End', '2014-02-04'),
(5, 'PHP5', 18, 'Back-End', '2014-02-04'),
(6, 'Compass', 14, 'Framework/API', '2014-02-04'),
(7, 'Solr(Solrnet)', 18, 'Back-End', '2014-02-04'),
(8, 'SEO', 20, 'Front-End', '2014-02-04'),
(9, 'FB API', 16, 'Framework/API', '2014-02-04'),
(10, 'GMaps API', 18, 'Framework/API', '2014-02-04'),
(11, 'ASP.NET', 16, 'Back-End', '2014-02-04'),
(12, 'MySQL', 16, 'Base de données', '2014-02-04'),
(13, 'T-SQL', 15, 'Base de données', '2014-02-04'),
(16, 'NodeJS', 14, 'Back-End', '2014-05-30'),
(17, 'Socket.IO', 18, 'Framework/API', '2014-05-30'),
(18, 'Yeoman', 12, 'Framework/API', '2014-06-18'),
(19, 'Grunt/Bower', 17, 'Framework/API', '2014-06-18'),
(20, 'AngularJS', 13, 'Framework/API', '2014-06-18');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `degree`
--
ALTER TABLE `degree`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `header`
--
ALTER TABLE `header`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lang`
--
ALTER TABLE `lang`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rewrittingurl`
--
ALTER TABLE `rewrittingurl`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `routeurl`
--
ALTER TABLE `routeurl`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `degree`
--
ALTER TABLE `degree`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `header`
--
ALTER TABLE `header`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `lang`
--
ALTER TABLE `lang`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `rewrittingurl`
--
ALTER TABLE `rewrittingurl`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `routeurl`
--
ALTER TABLE `routeurl`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
