-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 25 Mai 2016 à 13:28
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `creparts`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Idclient` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ville` varchar(15) CHARACTER SET utf8 NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `numtel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `question_secrete` varchar(255) NOT NULL,
  `reponse_secrete` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--


-- --------------------------------------------------------

--
-- Structure de la table `commande_domicile`
--

CREATE TABLE `commande_domicile` (
  `idcommande` int(11) NOT NULL,
  `Idclient` int(11) NOT NULL,
  `nb_prod_commande` int(5) NOT NULL,
  `facture` decimal(6,2) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `idcommande` varchar(4) CHARACTER SET utf8 NOT NULL,
  `idprod` varchar(2) NOT NULL,
  `produit_command` varchar(25) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idprod` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `libelle` varchar(255) CHARACTER SET utf8 NOT NULL,
  `images` text NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idprod`, `type`, `libelle`, `images`, `description`, `prix`) VALUES
(1, 'galette', 'Saint-jacques', 'galette_st_jacques', 'Noix de Saint Jacques – Fondue de poireaux à la crème', '15.90'),
(2, 'galette', 'Suedoise', 'galette_suedoise', 'Saumon fumé – Crème au citron – Pommes de terre – Aneth – Œufs de lump', '14.50'),
(3, 'galette', 'Tartiflette', 'galette_tartiflette', 'Jambon cru – Reblochon – Pommes de terre – Oignons – Lardons – Crème fraiche', '13.90'),
(4, 'galette', 'Fromagere', 'galette_fromagere', 'Chèvre – Emmental – Sauce Roquefort – Magret fumé – Tomate – Salade', '11.90'),
(5, 'galette', 'Frenchie', 'galette_frenchie', 'Steak haché frais – Raclette – Sauce cocktail – Lardons – Tomate – Salade', '11.90'),
(6, 'galette', 'Provencale', 'galette_provencale', 'Chèvre – Miel – Légumes grillés (aubergines, poivrons, oignons, tomates)', '9.70'),
(7, 'galette', 'Complète', 'galette_complete', 'Oeuf - Jambon - Emmental', '8.90'),
(8, 'crepe', 'Normande', 'crepe_normande', 'Pomme caramélisés – glace vanille – glace caramel au beurre salé – amandes grillées – caramel - chantilly', '10.20'),
(9, 'crepe', 'Spéculoos', 'crepe_speculoos', 'Mousseline au spéculoos – crème anglaise – glace caramel au beurre salé – speculoos concassé', '9.50'),
(10, 'crepe', 'Fascinante', 'crepe_fascinante', 'Mousseline au Nutella – Glace vanille – Crème anglaise', '9.50'),
(11, 'crepe', 'Caramel au beurre salé', 'crepe_caramel', '', '5.70'),
(12, 'crepe', 'Nutella', 'crepe_nutella', '', '5.70'),
(13, 'crepe', 'Sucrées', 'crepe_sucrees', '', '3.90'),
(14, 'boisson_alcool', 'Cidre fermier *', 'boisson_cidre_fermier', '75 cl:', '12.00'),
(15, 'boisson_alcool', 'Cide cru : brut ou doux *\n', 'boisson_cidre_cru', '75 cl:', '11.00'),
(16, 'boisson_alcool', 'Biere bretonne aux fruits\r\n', 'boisson_biere_fruit', '33 cl:', '5.00'),
(17, 'boisson_alcool', 'Biere bretonne blonde', 'boisson_biere_blonde', '33 cl:', '4.80'),
(18, 'boisson_alcool', 'Biere bretonne brune', 'boisson_biere_brune', '33 cl:', '4.80'),
(19, 'boisson_sans_alcool', 'Evian', 'boisson_evian', '50 cl:', '3.00'),
(20, 'boisson_sans_alcool', 'Perrier', 'boisson_perrier', '50 cl:', '3.00'),
(21, 'boisson_sans_alcool', 'Breizh cola', 'boisson_breizhcola', '33 cl:', '3.50'),
(22, 'boisson_sans_alcool', 'Orangina', 'boisson_orangina', '33 cl:', '3.50'),
(23, 'boisson_sans_alcool', 'Cafe', 'boisson_cafe', '', '2.00'),
(24, 'boisson_sans_alcool', 'Chocolat chaud', 'boisson_chocolat', '', '2.00'),
(25, 'boisson_sans_alcool', 'The', 'boisson_the', '', '2.00');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` int(11) NOT NULL,
  `Idclient` int(11) NOT NULL,
  `nb_place_reserve` varchar(2) NOT NULL,
  `date_reservation` date NOT NULL,
  `heure_reservation` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`idreservation`, `Idclient`, `nb_place_reserve`, `date_reservation`, `heure_reservation`) VALUES
(71, 38, '2', '2016-08-05', '20:00:00'),
(72, 38, '2', '2016-05-22', '20:30:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Idclient`,`email`);

--
-- Index pour la table `commande_domicile`
--
ALTER TABLE `commande_domicile`
  ADD PRIMARY KEY (`idcommande`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`idcommande`,`idprod`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idprod`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`,`date_reservation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `Idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `commande_domicile`
--
ALTER TABLE `commande_domicile`
  MODIFY `idcommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idreservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
