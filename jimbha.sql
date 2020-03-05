-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 avr. 2019 à 07:30
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jimbha`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomArticle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `id_objet` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_id_objet` (`id_objet`),
  KEY `FK_article_id_membre` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nomArticle`, `description`, `prix`, `lieu`, `etat`, `marque`, `id_objet`, `id_membre`) VALUES
(1, 'ESC500 G4', 'Processeur Intel Xeon, 8 Go de RAM et bon espace de stockage évolutif.', 1249, 'Paris', 'Neuf', 'Asus', 1, 3),
(2, 'Predator Helios 300', 'Intel Core i7-8750H, 16 Go de RAM DDR4.', 1349, 'LILLE', 'Reconditionné', 'Acer', 2, 3),
(3, 'Ipad_2018', 'Processeur A10, Wi-fi, 32 Go, Argent.', 357, 'Paris', 'Reconditionné', 'Apple', 3, 3),
(4, 'WD Elements Portable', 'USB 3.0 - 2 To.', 89, 'Marseille', 'Neuf', 'Western Digital', 4, 3),
(5, 'DataTraveler SE9 G2', '16 Go.', 12, 'Paris', 'Neuf', 'Kingston', 5, 3),
(6, 'S24F350FHU', 'Très bonne résolution Full HD, technologie AMD FreeSync.', 129, 'Lille', 'D\'occasion', 'Samsung', 6, 4),
(7, 'SO-DIMM Sport LT', 'DDR4 2 x 8 Go 2666 Mhz.', 132, 'Marseille', 'Neuf', 'Ballistix', 7, 4),
(8, 'Souris gaming Clutch GM60', 'Capteur optique PixArt PMW3330 d\'une résolution de 10800 dpi.', 89, 'Paris', 'Neuf', 'MSI', 8, 4),
(9, 'Wirelles K2500', 'Sans-fil, classique (Membrane).', 29, 'Lille', 'Neuf', 'HP', 9, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Ordinateur'),
(2, 'Stockage'),
(3, 'Ecrans'),
(4, 'Mémoire'),
(5, 'Périphérique');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAcheteur` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_panier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_commande_id_panier` (`id_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_commentaire_id_membre` (`id_membre`),
  KEY `FK_commentaire_id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`) VALUES
(1, 'acheteur1', '1234'),
(2, 'acheteur2', '2345'),
(3, 'vendeur1', 'azert'),
(4, 'vendeur2', 'zerty'),
(5, 'administrateur', '123aze');

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_objet_id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id`, `nom`, `id_categorie`) VALUES
(1, 'Ordi_Fixe', 1),
(2, 'Ordi_Portable', 1),
(3, 'Tablette', 1),
(4, 'DisqueDur', 2),
(5, 'CleUSB', 2),
(6, 'Ecran', 3),
(7, 'RAM', 4),
(8, 'Souris', 5),
(9, 'Clavier', 5);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL,
  `idObjet` int(11) NOT NULL,
  `idAcheteur` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `idVendeur` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_panier_id_commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_article_id_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_commande_id_panier` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_commentaire_id_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_commentaire_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `FK_objet_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_panier_id_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
